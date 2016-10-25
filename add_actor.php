<?php require_once('header.php'); ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Actor</h1>
                </div>
            </div>  
    
<form>
  <div class="form-group">
    <label for="a_f_name">First Name:</label>
    <input type="text" class="form-control" id="a_f_name" placeholder="Enter First Name...">
  </div>
    
  <div class="form-group">
    <label for="a_l_name">Last Name:</label>
    <input type="text" class="form-control" id="a_l_name" placeholder="Enter Last Name...">
  </div>
    
    <div class="form-group">
    <label for="dob">Date of Birth: i.e. 1960-09-09</label>
    <input type="text" class="form-control" id="dob" placeholder="1960-09-09">
  </div>
    <div class="form-group">
    <label for="dod">Date of Death: i.e. 1960-09-09, leave blank if alive</label>
    <input type="text" class="form-control" id="dod" placeholder="1960-09-09">
  </div>
    
  <div class="checkbox">
    <label class="radio-inline"><input type="radio" name="optradio">Male</label>
<label class="radio-inline"><input type="radio" name="optradio">Female</label>
  </div>
    
    
  <button type="submit" class="btn btn-default">Submit</button>
</form>
    
</div>