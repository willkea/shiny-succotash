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
?>
    
<form method="post">
    <div class="form-group">
        <label>Movie Title: </label>
        <select name="title" class="form-control">";
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
    $user_query2 = "SELECT concat(first,' ',last) FROM Director;";
    $result = $db->query($user_query2); 
?>

<div class="form-group">
    <label>Director: </label>
    <select name="director" class="form-control">";
        <?php 
        echo "<option disabled selected>Select a director...</option>";
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

    <button type="submit" class="btn btn-default">Submit</button>
</form>
    
<?php
    echo "selected movie: ". $_POST["title"] . "<br>"; 
    echo "selected director: ". $_POST["director"] . "<br>";
    $newTitle = $_POST["title"];
    $newDirector = $_POST["director"];
    $mid_query = "SELECT id FROM Movie WHERE title='". $newTitle. "'";
    $did_query = "SELECT id FROM Director WHERE CONCAT(first,' ',last)='". $newDirector. "'";
    $mid = mysqli_query($db, $mid_query);
    
    $did = $db->query($did_query); 
    echo $did;
    $insert_query = "INSERT INTO MovieDirector(mid,did) VALUES('".$mid."', '".$did."')";
    if ( $db->query($insert_query) === TRUE ){
        echo "New record created successfuly";
    } else {
        echo "Error: " . $insert_query . "<br>" . $db->error;
    }
    $db->close();
?>
    
</div>