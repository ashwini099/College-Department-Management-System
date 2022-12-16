<?php
$server="localhost";
$email="root";
$password="";
$database="user912";
$conn = mysqli_connect("$server", "$email","$password", "$database");
if(!$conn){
die("Error".mysqli_connect_error());
}
?>