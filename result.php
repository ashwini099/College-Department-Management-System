<?php
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
    <title>result</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<?php require 'partials/_nav.php'?>

<div class="container mt-5 md-5 p-3">
    
    <div class="row mx-5 px-3 p-5">
    <div class="card text-center text-white bg-dark mb-3 mx-5" style="max-width: 18rem;">
  <div class="card-header bg-warning text-black ">University Result</div>
  <div class="card-body">
    <h5 class="card-title">University Result</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="http://results.akuexam.net/Default.aspx" target="_blank" class="btn btn-outline-warning">Click Here</a>
  </div>
</div>
<div class="card text-center text-white bg-dark mb-3 mx-5" style="max-width: 18rem;">
  <div class="card-header bg-warning text-black ">Mid-Semester Result</div>
  <div class="card-body">
    <h5 class="card-title">Mid-Semester Result</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-outline-warning">Click Here</a>
  </div>
</div>

<div class="card text-center text-white bg-dark mb-3 mx-5" style="max-width: 18rem;">
  <div class="card-header bg-warning text-black  ">Test Result</div>
  <div class="card-body">
    <h5 class="card-title">Test Result</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-outline-warning">Click Here</a>
  </div>
</div>   
    </div>
    </div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
</body>
</html>
