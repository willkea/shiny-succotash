<?php require_once('header.php'); ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Actor/Director</h1>
                </div>
            </div>  
    
<form method="post">
  <div class="form-group">
    <label for="firstName">First Name:</label>
    <input type="text" class="form-control" name="firstName" placeholder="Enter First Name...">
  </div>
    
  <div class="form-group">
    <label for="lastName">Last Name:</label>
    <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name...">
  </div>
    
    <div class="form-group">
    <label for="dob">Date of Birth: i.e. 1960-09-09</label>
    <input type="text" class="form-control" name="dob" placeholder="1960-09-09">
  </div>
    <div class="form-group">
    <label for="dod">Date of Death: i.e. 1960-09-09, leave blank if alive</label>
    <input type="text" class="form-control" name="dod" placeholder="1960-09-09">
  </div>
    
    <label>Gender: </label>
  <div class="checkbox">
      <label class="radio-inline"><input type="radio" name="optradio" value="Male">Male</label>
      <label class="radio-inline"><input type="radio" name="optradio" value="Female">Female</label>
    </div><br>
    
    <label>Title: </label>
  <div class="checkbox">
    <label class="radio-inline"><input type="radio" name="a_job" value='Actor'>Actor</label>
    <label class="radio-inline"><input type="radio" name="a_job" value='Director'>Director</label>
    <label class="radio-inline"><input type="radio" name="a_job" value='Both'>Both</label>
  </div><br>
    

  <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form><br>
    
    
<?php
if(isset($_POST["submit"])){
    $db = new mysqli('localhost', 'cs143', '', 'CS143'); 
    
    $newFirst = $_POST["firstName"];
    $newLast = $_POST["lastName"];
    $newDOB = $_POST["dob"];
    $newDOD = $_POST["dod"];
    $newGender = $_POST["optradio"];
    $newTitle = $_POST["a_job"];

    $pid_query = "SELECT id FROM MaxPersonID";
    $pid = mysqli_query($db, $pid_query);
    $row = mysqli_fetch_row($pid);
    $val = $row[0];
    
    if ($newDOD == NULL) {
    $insert_query = "INSERT INTO Actor(id,last,first,sex,dob,dod) VALUES('$val', '$newLast', '$newFirst', '$newGender', '$newDOB', NULL)";
    
    $insert_query_dir = "INSERT INTO Director(id,last,first,dob,dod) VALUES('$val', '$newLast', '$newFirst', '$newDOB', NULL)";
    } else {
        $insert_query = "INSERT INTO Actor(id,last,first,sex,dob,dod) VALUES('$val', '$newLast', '$newFirst', '$newGender', '$newDOB', '$newDOD')";
    
        $insert_query_dir = "INSERT INTO Director(id,last,first,dob,dod) VALUES('$val', '$newLast', '$newFirst', '$newDOB', '$newDOD')";
    }
    
  if ($newTitle == "Actor"){  
    if ( $db->query($insert_query) === TRUE ){
        $update_query = "UPDATE MaxPersonID SET id=id+1";
        $db->query($update_query);
        echo "<br>"."New record created successfully";
    }
  } elseif ($newTitle == "Director"){
    if ( $db->query($insert_query_dir) === TRUE ){
        $update_query = "UPDATE MaxPersonID SET id=id+1";
        $db->query($update_query);
        echo "<br>"."New record created successfully";      
    }
  } else {
    if ( $db->query($insert_query) === TRUE && $db->query($insert_query_dir) === TRUE){
        $update_query = "UPDATE MaxPersonID SET id=id+1";
        $db->query($update_query);
        echo "<br>"."New records created successfully";   
  }
}
}
    $db->close();
?>
    
    
    
</div>












