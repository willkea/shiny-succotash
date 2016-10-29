<?php require_once('header.php'); ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Browse Actors</h1>
                </div>
            </div>  
 
<?php
    $db = new mysqli('localhost', 'cs143', '', 'CS143');
    $user_query = "SELECT concat(first,' ',last) FROM Actor;";
    $result = $db->query($user_query);
?>    
    
<form method="get">
    <div class="form-group">
    <label>Actor: </label>
    <select name='actor' class="form-control">";
        <?php 
        echo "<option disabled selected>Select an actor...</option>";
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
         $newSearch = $_GET["actor"];
         $aid_query = "SELECT CONCAT(first,' ',last) Name, sex, dob AS DOB, dod AS DOD FROM Actor WHERE CONCAT(first,' ',last)='$newSearch'";
         
         $roles_query = "SELECT title AS `Movie Title`, role FROM MovieActor,Actor,Movie WHERE CONCAT(first,' ',last)='$newSearch' AND Actor.id=aid AND mid=Movie.id";
         
         $result = mysqli_query($db, $aid_query);
         $result2 = mysqli_query($db, $roles_query);
         $field_nums = mysqli_num_fields($result);
         $field_nums2 = mysqli_num_fields($result2);
         
              //actor info table   
    echo "<div class='panel panel-default'><div class='panel-heading'>Actor Information:</div><div class='panel-body'><div class='table-responsive'><table class='table table-striped table-bordered table-hover'><thead><tr>";
    // printing table headers
    for($i=0; $i<$field_nums; $i++)
    {
        $field = $result->fetch_field();
        $fieldtitle = ucfirst($field->name);
        echo "<th>$fieldtitle</th>";
    }
    echo "</tr></thead><tbody>";
    // printing table rows
    while($row = mysqli_fetch_row($result))
    {
        echo "<tr>";
        // $row is array... foreach( .. ) puts every element
        // of $row to $cell variable
        foreach($row as $cell)
            echo "<td>$cell</td>";
        echo "</tr>\n";
    }
        echo "</tbody></table></div></div></div>";
    $result->free();
         
     //roles table     
   echo "<div class='panel panel-default'><div class='panel-heading'>Actor Movies and Roles:</div><div class='panel-body'><div class='table-responsive'><table class='table table-striped table-bordered table-hover'><thead><tr>";
    // printing table headers
    for($i=0; $i<$field_nums2; $i++)
    {
        $field2 = $result2->fetch_field();
        $fieldtitle2 = ucfirst($field2->name);
        echo "<th>$fieldtitle2</th>";
    }
    echo "</tr></thead><tbody>";
    // printing table rows
    while($row = mysqli_fetch_row($result2))
    {
        echo "<tr>";
        // $row is array... foreach( .. ) puts every element
        // of $row to $cell variable
        $title_url = $row[0];
        $title_url_plus = str_replace(' ','+',$title_url);
        $link = "show_movies.php?movie=$title_url_plus&submit=";
        foreach($row as $cell)
            echo "<td><a href='$link'>$cell</a></td>";
        echo "</tr>\n";
    }
        echo "</tbody></table></div></div></div>";
    $result2->free();         
         
     }
    
?>

</div>


















