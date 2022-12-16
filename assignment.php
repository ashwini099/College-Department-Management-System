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
  <title>Assignment</title>
  <link rel="stylesheet" href="style.css">
 <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="login.js"></script>
</head>
<body>
  
  <?php require 'partials/_nav.php'?>
  <form action="Assignmentupload.php" method="post" enctype="multipart/form-data" >

<div class="container py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-lg-4 col-xl-6">
<div class="container">
<div class="text-center">

<h2>Assignment Upload</h2>

<div class="table-responsive mt-md-4">
    <table class="table table-striped  table-dark">
    <tbody>
    <tr>
        <td class="col-md-6">Course Name:</td>
        <td>
       <div  class="col-md-6">
       <select id="subject"  name="subject" for="subject" class="form-select" required aria-label="Default select example">
<option selected>select</option>
<option value="Problem for Program Solving">Problem for Program Solving</option>
<option value="Maths I">Maths I</option>
<option value="Chemistry">Chemistry</option>
<option value="Workshop">Workshop</option>
<option value="English">English</option>
<option value="Basic Electronic Engineering(BEE)">Basic Electronic Engineering(BEE)</option>
<option value="Maths II">Maths II</option>
<option value="Physics">Physics</option>
<option value="Engineering Graphics & Design">Engineering Graphics & Design</option>
<option value="Analog Electronic Circuits">Analog Electronic Circuits</option>
<option value="Object-Oriented Programming using C++">Object-Oriented Programming using C++</option>
<option value="Maths III">Maths III</option>
<option value="Technical Writing">Technical Writing</option>
<option value="Database Management System">Database Management System</option>
<option value="Formal Language & Automata Theory">Formal Language & Automata Theory</option>
<option value="Artificial Intelligence">Artificial Intelligence</option>
<option value="Software Engineering">Software Engineering</option>
<option value="Professional Skill Development">Professional Skill Development</option>
<option value="Machine Learning">Machine Learning</option>
<option value="Java">Java</option>
<option value="Python">Python</option>
<option value="Compiler Design">Compiler Design</option>
<option value="Computer Network">Computer Network </option>

</select>
       </div>
        </td>
    </tr>
    <tr>
        <td>Teacher Name:</td>
        <td>
<div  class="col-md-6 ">            
<select id="teacher_name"  name="teacher_name" for="teacher_name" class="form-select" required aria-label="Default select example">
<option selected>select</option>
<option value="Ranjeet Pandey">Ranjeet Pandey</option>
<option value="S.k Ojha">S.k Ojha</option>
<option value="Aakash Kumar">Aakash Kumar</option>
<option value="Bibha Kumari">Bibha Kumari</option>
<option value="Shivani Rai">Shivani Rai</option>
</select></div>
        </td>
    </tr>
    </tbody>
    </table>
</div>
</div>
<div class="form-group">
          <input class="form-control mt-md-4  " type="file" name="fileToUpload" id="fileToUpload" style="width:100%;" >
        </div>
<div class="text-center  mt-md-3 ">
<button  type="Submit" name="save_assignment" class="btn btn-warning btn-lg">Upload</button>
</div>
</div>
</div>
</div>
</form>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>

</html>