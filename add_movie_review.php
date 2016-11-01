<?php require_once('header.php'); ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Movie Review</h1>
                </div>
            </div>  
<?php
    $db = new mysqli('localhost', 'cs143', '', 'CS143');
    $user_query = "SELECT title FROM Movie;";
    $result = $db->query($user_query); 
    $nameErr = $titleErr = $commentErr = "";
    if(isset($_GET['submit'])){
         if($_GET["r_title"] == "Select a movie..."){ 
             $titleErr = "Must choose a movie";
         } else {
             $newTitle = $_GET["r_title"];
         }
         if(empty($_GET["r_name"])){ 
             $nameErr = "Must enter your name";
         } else {
             $newName = "'".$_GET["r_name"]."'";
         } 
         if(empty($_GET["r_comment"])){ 
             $commentErr = "Must enter comments";
         } else {
             $newComment = "'".$_GET["r_comment"]."'";
         } }
?>
    
<form method="get">
  <div class="form-group">
    <label for="r_name">Your Name:</label>
    <input type="text" class="form-control" name="r_name" placeholder="Enter Your Name..."><span class="error" style="color:red"><?php echo $nameErr;?></span>
  </div>
    
 <div class="form-group">
        <label>Movie Title: </label>
        <select name="r_title" class="form-control">";
            <?php
            echo "<option hidden>Select a movie...</option>";
            while($row = mysqli_fetch_row($result))
            {
            echo "<option>";
            // $row is array... foreach( .. ) puts every element
            // of $row to $cell variable
            foreach($row as $cell)
                echo "$cell";
            echo "</option>";
            } ?>
        </select><span class="error" style="color:red"><?php echo $titleErr;?></span>
    </div>
 
    <div class="form-group">
        <label>Rating: </label>
        <select name='r_rating' class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select></div>
    
    <div class="form-group">
        <label>Comments: </label>
        <textarea class="form-control" name='r_comment' rows="3"></textarea><span class="error" style="color:red"><?php echo $commentErr;?></span>
    </div><br>
    
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
    
<?php
   
    $newRating = $_GET["r_rating"];
    
    
    $mid_query = "SELECT id FROM Movie WHERE title='". $newTitle. "'";
         
    $mid = mysqli_query($db, $mid_query);
    $row = mysqli_fetch_row($mid);
    
    $insert_query = "INSERT INTO Review(name,time,mid,rating,comment) VALUES ($newName, NOW(), '$row[0]', '$newRating',$newComment)";
   
    if ( $db->query($insert_query) === TRUE ){
        echo "<br>"."New record created successfully";
    } 
    $db->close();
?>    
    
</div>



















