<?php require_once('header.php'); ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Search Results</h1>
                </div>
            </div>  
    
<form method="GET">
  <div class="form-group">
    <label for="r_name">Search:</label>
    <input type="text" class="form-control" name="search" placeholder="Search...">
  </div><br>
    
 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form><br>
    
  <?php
    $db = new mysqli('localhost', 'cs143', '', 'CS143');

    if(isset($_GET['submit'])){
    //echo "selected movie: ". $_POST["title"] . "<br>"; 
    //echo "selected director: ". $_POST["director"] . "<br>";
    $newSearch = $_GET["search"];
    $pieces = explode(' ',$newSearch);
    $full = "";
    $full_m = "";
    for($i=0;$i<count($pieces);$i++){
        $x = "CONCAT(first,' ',last) LIKE '%$pieces[$i]%' AND ";
        $full = $full . $x;
    }
    $full = substr($full,0,-5);
    for($i=0;$i<count($pieces);$i++){
        $x = "title LIKE '%$pieces[$i]%' AND ";
        $full_m = $full_m . $x;
    }
    $full_m = substr($full_m,0,-5);
    $aid_query = "SELECT CONCAT(first,' ',last) Name, dob AS DOB FROM Actor WHERE $full";//CONCAT(first,' ',last) LIKE '%$newSearch%'";
      
    $mid_query = "SELECT title,year FROM Movie WHERE $full_m";//title LIKE '%$newSearch%'";
    echo $mid_query;   
    $result = mysqli_query($db, $mid_query);
    $result2 = mysqli_query($db, $aid_query);
    //$row = mysqli_fetch_row($mid);
    
    $field_nums = mysqli_num_fields($result);
    $field_nums2 = mysqli_num_fields($result2);
        
   //actor table     
   echo "<div class='panel panel-default'><div class='panel-heading'>Matching Actors:</div><div class='panel-body'><div class='table-responsive'><table class='table table-striped table-bordered table-hover'><thead><tr>";
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
        foreach($row as $cell)
            echo "<td>$cell</td>";
        echo "</tr>\n";
    }
        echo "</tbody></table></div></div></div>";
    $result2->free();     
        
     //movie table   
    echo "<div class='panel panel-default'><div class='panel-heading'>Matching Movies:</div><div class='panel-body'><div class='table-responsive'><table class='table table-striped table-bordered table-hover'><thead><tr>";
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
    }
?>    
      
    
</div>









