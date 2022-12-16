<?php
include 'partials/_dbconnect.php';
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<?php require 'partials/_nav.php'?>   
<?php if(isset($_SESSION['status'])){
    echo $_SESSION['status'];
    unset($_SESSION['status']);
  }?>
<section>
  <div class="container py-5">
   

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="image/blank-profile-picture-973460_1280.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
              <div class="form-group">
              <input class="form-control mt-md-4  " type="file" name="image" style="width:100%;" >
            </div>
      <div class="d-flex justify-content-center mt-md-4 pb-5">
              <button type="button" class="btn btn-outline-primary ms-1">Add Profile</button>
            </div>
          </div>
        </div>
    
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">First Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><span><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></span></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Last Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><span><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></span></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Password</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><span><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center  mt-md-3 ">
<button  type="Submit" name="save_assignment" class="btn btn-warning btn-lg">Upload</button>
</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>