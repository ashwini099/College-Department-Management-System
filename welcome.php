<?php
session_start();
include 'partials/_dbconnect.php';
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
  <title> Home -<?php $_SESSION['email']?></title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" 
  integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" 
  crossorigin="anonymous" 
  referrerpolicy="no-referrer"></script>

  <!-- CSS only -->
  <link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
<?php require 'partials/_nav.php'?>
<br>
  <div class="row container-fluid">
<div class="col-md-2" id="left_sidebar">
  <img src="image/blank-profile-picture-973460_1280.webp" class="image-rounded" width="200px" height="200px"><br>
  <b  class="mx-4"><?php echo $_SESSION['email']?></b><hr>
  <a href="edi.php"><button type="submit" class="btn btn-primary btn-block" id="edit_profile">Edit Profile</button></a>
  <a href="notice.php"><button type="button" class="btn btn-success btn-block"id="view_notice">View Notices</button></a>
</div>
<div class="col-md-8" id="main_content">
<div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome - <?php echo $_SESSION['email']?></h4>
      <p>Hey how are you doing? Welcome to iSecure. You are logged in as <?php echo $_SESSION['email']?>. Aww yeah, you successfully read this important alert message. 
      This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to logout <a href="/loginsystem/logout.php"> using this link.</a></p>
    </div>
  </div>
</div>
  </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>