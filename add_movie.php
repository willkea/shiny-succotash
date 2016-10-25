<?php require_once('header.php'); ?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Movie</h1>
                </div>
            </div>  
    
<form>
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
        </select></div>
    
    
  <button type="submit" class="btn btn-default">Submit</button>
</form>
    
</div>