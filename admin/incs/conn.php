<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "student_registraction";


$conn = mysqli_connect($servername,$username, $password,$databasename);

if(!$conn){
    die("connection Failed");
}
?>