<?php require_once('header.php'); ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Movie Review</h1>
                </div>
            </div>  
    
<form>
  <div class="form-group">
    <label for="r_name">Your Name:</label>
    <input type="text" class="form-control" id="r_name" placeholder="Enter Your Name...">
  </div>
    
<?php

$db = new mysqli('localhost', 'cs143', '', 'CS143');

$user_query = "SELECT title FROM Movie;";
$result = $db->query($user_query);

echo "<div class=\"form-group\"><label>Movie Title: </label><select name='title' class=\"form-control\">";
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
 
    <div class="form-group">
        <label>Rating: </label>
        <select name='title' class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select></div>
    
    <div class="form-group">
        <label>Comments: </label>
        <textarea class="form-control" rows="3"></textarea>
    </div>
    
  <button type="submit" class="btn btn-default">Submit</button>
</form>
    
</div>