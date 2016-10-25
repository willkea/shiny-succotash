<?php require_once('header.php'); ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Movie/Director Relation</h1>
                </div>
            </div>  

<?php

$db = new mysqli('localhost', 'cs143', '', 'CS143');

$user_query = "SELECT title FROM Movie;";
$result = $db->query($user_query); 

echo "<div class=\"form-group\">
    <label>Movie Title: </label>
    <select name=\"title\" class=\"form-control\">";
while($row = mysqli_fetch_row($result))
    {
        echo "<option>";
        // $row is array... foreach( .. ) puts every element
        // of $row to $cell variable
        foreach($row as $cell)
            echo "$cell";
        echo "</option>";
    }
echo "</select></div>";

    
$user_query2 = "SELECT concat(first,' ',last) FROM Director;";
$result = $db->query($user_query2);

echo "<div class=\"form-group\"><label>Director: </label><select name='actor' class=\"form-control\">";
while($row = mysqli_fetch_row($result))
    {
        echo "<option>";
        // $row is array... foreach( .. ) puts every element
        // of $row to $cell variable
        foreach($row as $cell)
            echo "$cell";
        echo "</option>";
    }
echo "</select></div>";
?>    
    
    
<form>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
    
<?php
  echo "selected movie: ". $_POST["title"];
?>
    
</div>