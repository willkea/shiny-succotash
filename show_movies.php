<?php require_once('header.php'); ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Browse Movies</h1>
                </div>
            </div>  
 
<?php
    $db = new mysqli('localhost', 'cs143', '', 'CS143');
    $user_query = "SELECT title FROM Movie;";
    $result = $db->query($user_query);
?>    
    
<form method="get">
    <div class="form-group">
        <label>Movie Title: </label>
        <select name="movie" class="form-control">";
            <?php
            echo "<option disabled selected>Select a movie...</option>";
            while($row = mysqli_fetch_row($result))
            {
            echo "<option>";
            // $row is array... foreach( .. ) puts every element
            // of $row to $cell variable
            foreach($row as $cell)
                echo "$cell";
            echo "</option>";
            } ?>
        </select>
    </div>
     <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form><br>    
    
    
<?php
     if(isset($_GET['submit'])){
         $newSearch = $_GET["movie"];
         $mid_query = "SELECT title, year, rating, company FROM Movie WHERE title='$newSearch'";
         
         $get_mid = "SELECT id from Movie WHERE title='$newSearch'";
         $got_mid = mysqli_query($db, $get_mid);
         $mid_val = mysqli_fetch_row($got_mid);
         
         $dir_query = "SELECT concat(first,' ',last) from Director WHERE id IN (SELECT did from MovieDirector where mid='$mid_val[0]')";
         
         $genre_query = "SELECT genre from MovieGenre WHERE mid='$mid_val[0]'";
        
         $result = mysqli_query($db, $mid_query); 
         $dir_result = mysqli_query($db, $dir_query);
         $dir = mysqli_fetch_row($dir_result)[0];
         $field_nums = mysqli_num_fields($result);
         
         $gen_result = mysqli_query($db,$genre_query);
         
          //movie table   
    echo "<div class='panel panel-default'><div class='panel-heading'>Movie Information:</div><div class='panel-body'><div class='table-responsive'><table class='table table-striped table-bordered table-hover'><thead><tr>";
    // printing table headers
    for($i=0; $i<$field_nums; $i++)
    {
        $field = $result->fetch_field();
        $fieldtitle = ucfirst($field->name);
        echo "<th>$fieldtitle</th>";
    }
    echo "<th>Director</th><th>Genre(s)</th>";
    echo "</tr></thead><tbody>";
    // printing table rows
    while($row = mysqli_fetch_row($result))
    {
        echo "<tr>";
        // $row is array... foreach( .. ) puts every element
        // of $row to $cell variable
        foreach($row as $cell)
            echo "<td>$cell</td>";
        echo "<td>$dir</td><td>";
        while($genre = mysqli_fetch_row($gen_result)){
        foreach($genre as $cell2)
            echo "$cell2; ";
        }
        echo "</td></tr>\n";
    }
        echo "</tbody></table></div></div></div>";
    $result->free();
         
         
         
         
         
         
         
     }
    
?>
    
</div>































    
    
    
    
    