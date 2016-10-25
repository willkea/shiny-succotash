<?php require_once('header.php'); ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Movie/Actor Relation</h1>
                </div>
            </div>  

<?php
    $db = new mysqli('localhost', 'cs143', '', 'CS143');
    $user_query = "SELECT title FROM Movie;";
    $result = $db->query($user_query);
?>

<form method="post">
    <div class="form-group">
        <label>Movie Title: </label>
        <select name='title' class="form-control">";
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


<?php     
    $user_query2 = "SELECT concat(first,' ',last) FROM Actor;";
    $result = $db->query($user_query2); ?>

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
    

  <div class="form-group">
    <label for="role">Role:</label>
    <input type="text" class="form-control" name="role" placeholder="Enter Role...">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>
    
    
<?php
    //echo "selected movie: ". $_POST["title"] . "<br>"; 
    //echo "selected director: ". $_POST["director"] . "<br>";
    $newTitle = $_POST["title"];
    $newActor = $_POST["actor"];
    $newRole = $_POST["role"];
    $mid_query = "SELECT id FROM Movie WHERE title='". $newTitle. "'";
    $aid_query = "SELECT id FROM Actor WHERE CONCAT(first,' ',last)='". $newActor. "'";
    $mid = mysqli_query($db, $mid_query);
    $aid = mysqli_query($db, $aid_query);
    $row = mysqli_fetch_row($mid);
    $row2 = mysqli_fetch_row($aid);
    $insert_query = "INSERT INTO MovieActor(mid,aid,role) VALUES('".$row[0]."', '".$row2[0]."', '".$newRole."')";
    if ( $db->query($insert_query) === TRUE ){
        echo "<br>"."New record created successfully";
    } 
    $db->close();
?> 
    
    
</div>










