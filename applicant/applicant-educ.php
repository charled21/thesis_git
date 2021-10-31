<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Attainment</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    
<form action="" method="POST">
<div class="container">

<div class="form-row">
    <div class="form-group col-md-4">
      <label>Educational Attainment</label>
      <input type="text" class="form-control" id="educ_attain" placeholder="ex. College Graduate">
    </div>
    <div class="form-group col-md-4">
      <label>Degree Received</label>
      <input type="text" class="form-control" id="educ_attain_deg" name="educ_attain_deg" placeholder="ex. Cum Laude">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
      <label>University / School</label>
      <input type="text" class="form-control" id="univ" placeholder="ex. Father Saturnino Urios University">
    </div>
    <div class="form-group col-md-4">
      <label>Year Graduated</label>
      <input type="text" class="form-control" id="yr_grad" name="yr_grad_3" placeholder="ex. 1988">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
      <label>Secondary Education</label>
      <input type="text" class="form-control" id="hs" placeholder="ex. Agusan National High School">
    </div>
    <div class="form-group col-md-4">
      <label>Year Graduated</label>
      <input type="text" class="form-control" id="yr_grad_2" name="yr_grad_2" placeholder="ex. 1984">
    </div>
</div>

<hr class="mb-4 mt-4">

<h5>Contact Details</h5>
<div class="form-row">
    <div class="form-group col-md-3">
      <label>Telephone / Landline</label>
      <input type="text" class="form-control" id="landline" placeholder="ex. 341-4111">
    </div>
    <div class="form-group col-md-3">
      <label>Cellphone / Mobile No.</label>
      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="ex. 0999-999-9999">
    </div>
    <div class="form-group col-md-3">
      <label>Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="ex. email@sample.com">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-3">
      <label>Civil Status</label>
      <input type="text" class="form-control" id="civil" placeholder="ex. Married">
    </div>
    <div class="form-group col-md-3">
      <label>Citizenship</label>
      <input type="text" class="form-control" id="citizen" name="citizen" placeholder="ex. Filipino">
    </div>
    <div class="form-group col-md-3">
      <label>Religion</label>
      <input type="text" class="form-control" id="religion" name="religion" placeholder="ex.Roman Catholic">
    </div>
</div>


<button type="submit" class="btn btn-success" >Submit</button>
</div>


</form>

</body>
</html>