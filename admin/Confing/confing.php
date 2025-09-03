<?php

$host="localhost";
$user="root";
$pass="";
$db="login_system";
$conn= new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
die("Connection failed: ". $conn->connect_error);
}else{
  echo "Connected successfully";
}

if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $phone_number=$_POST['phone_number'];
}

 echo "<pre>";
  print_r($_POST);
   echo "</pre>";
    die('>>');


$sql="SELECT * FROM register_system(id,username,email,password,phone_number) VALUES ('1','admin','";




?>