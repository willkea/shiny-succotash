<?php require_once('header.php'); ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Movie</h1>
                </div>
            </div>  
    
<form method="post">
  <div class="form-group">
    <label for="m_title">Title:</label>
    <input type="text" class="form-control" name="m_title" placeholder="Enter Movie Title...">
  </div>
    
  <div class="form-group">
    <label for="m_company">Company:</label>
    <input type="text" class="form-control" name="m_company" placeholder="Enter Company Name...">
  </div>
    
    <div class="form-group">
    <label for="m_year">Release Year: i.e. 2016</label>
    <input type="text" class="form-control" name="m_year" placeholder="2016">
  </div>
    
    <div class="form-group">
        <label>MPAA Rating: </label>
        <select name='m_rating' class="form-control">
            <option>G</option>
            <option>PG</option>
            <option>PG-13</option>
            <option>R</option>
            <option>NC-17</option>
        </select>
    </div>
    

<label>Genre(s): </label>
    <div class="checkbox">
      <label><input type="checkbox" name="formDoor[]" value="Action">Action&emsp;</label>     
      <label><input type="checkbox" name="formDoor[]" value="Comedy">Comedy&emsp;</label> 
      <label><input type="checkbox" name="formDoor[]" value="Adventure">Adventure&emsp;</label>
      <label><input type="checkbox" name="formDoor[]" value="Drama">Drama&emsp;</label>
      <label><input type="checkbox" name="formDoor[]" value="Adult">Adult&emsp;</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="formDoor[]" value="Crime">Crime&emsp;</label> 
      <label><input type="checkbox" name="formDoor[]" value="Western">Western&emsp;</label> 
      <label><input type="checkbox" name="formDoor[]" value="Animation">Animation&emsp;</label>
      <label><input type="checkbox" name="formDoor[]" value="Family">Family&emsp;</label>
      <label><input type="checkbox" name="formDoor[]" value="Fantasy">Fantasy&emsp;</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="formDoor[]" value="Horror">Horror&emsp;</label> 
      <label><input type="checkbox" name="formDoor[]" value="Musical">Musical&emsp;</label> 
      <label><input type="checkbox" name="formDoor[]" value="Mystery">Mystery&emsp;&emsp;</label>
      <label><input type="checkbox" name="formDoor[]" value="Thriller">Thriller&emsp;</label>
      <label><input type="checkbox" name="formDoor[]" value="Sci-Fi">Sci-Fi&emsp;</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="formDoor[]" value="Short">Short&emsp;</label> 
      <label><input type="checkbox" name="formDoor[]" value="Romance">Romance&emsp;</label> 
      <label><input type="checkbox" name="formDoor[]" value="Documentary">Documentary&emsp;</label>
      <label><input type="checkbox" name="formDoor[]" value="War">War&emsp;</label>
    </div>
<br>
  <button type="submit" class="btn btn-default">Submit</button>
    
</form>
    
<?php
    $db = new mysqli('localhost', 'cs143', '', 'CS143'); 
    
    $newTitle = $_POST["m_title"];
    $newCompany = $_POST["m_company"];
    $newYear = $_POST["m_year"];
    $newRating = $_POST["m_rating"];
    $aDoor = $_POST['formDoor'];
    $N = count($aDoor);
    $mid_query = "SELECT id FROM MaxMovieID";
    $mid = mysqli_query($db, $mid_query);
    $row = mysqli_fetch_row($mid);
    $insert_query = "INSERT INTO Movie(id,title,year,rating,company) VALUES('$row[0]', '$newTitle', '$newYear', '$newRating','$newCompany')";
    
    if ( $db->query($insert_query) === TRUE ){
        $update_query = "UPDATE MaxMovieID SET id=id+1";
        $db->query($update_query);
        echo "<br>"."New record created successfully";
    } 
    $db->close();
?>
    
</div>






