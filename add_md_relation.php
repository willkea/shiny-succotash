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
    $titleErr = $dirErr = "";
         if(isset($_POST['submit'])){
         if($_POST["title"] == "Select a movie..."){ 
             $titleErr = "Must choose a movie";
         } else {
             $newTitle = $_POST["title"];
         }
         if($_POST["director"] == "Select a director..."){ 
             $dirErr = "Must choose a director";
         } else {
             $newDirector = $_POST["director"];
         } }
?>
    
<form method="post">
    <div class="form-group">
        <label>Movie Title: </label>
        <select name="title" class="form-control">
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
        </select><span class="error"><?php echo $titleErr;?></span>
    </div>

    
<?php 
    $user_query2 = "SELECT concat(first,' ',last) FROM Director;";
    $result = $db->query($user_query2); 
?>

<div class="form-group">
    <label>Director: </label>
    <select name="director" class="form-control">";
        <?php 
        echo "<option hidden>Select a director...</option>";
        while($row = mysqli_fetch_row($result))
        {
        echo "<option>";
        // $row is array... foreach( .. ) puts every element
        // of $row to $cell variable
        foreach($row as $cell)
            echo "$cell";
        echo "</option>";
        } ?>
    </select><span class="error"><?php echo $dirErr;?></span>
</div><br>

    <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
    
<?php
    
    

         
    //echo "selected movie: ". $_POST["title"] . "<br>"; 
    //echo "selected director: ". $_POST["director"] . "<br>";
    
    $mid_query = "SELECT id FROM Movie WHERE title='". $newTitle. "'";
    $did_query = "SELECT id FROM Director WHERE CONCAT(first,' ',last)='". $newDirector. "'";
    $mid = mysqli_query($db, $mid_query);
    $did = mysqli_query($db, $did_query);
    $row = mysqli_fetch_row($mid);
    $row2 = mysqli_fetch_row($did);
    $insert_query = "INSERT INTO MovieDirector(mid,did) VALUES('".$row[0]."', '".$row2[0]."')";
    if ( $db->query($insert_query) === TRUE ){
        echo "<br>"."New record created successfully";
    } 
    
    $db->close();
?>
    
</div>