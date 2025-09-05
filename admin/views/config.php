<?php
session_start();
$host = "localhost";
$user = "root";  
$pass = ""; 
$db   = "login_system"; 
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
  $username    = $_POST['username'];       
  $first_name  = $_POST['first_name'];     
  $last_name   = $_POST['last_name'];       
  $email       = $_POST['email'];               
  $password    = $_POST['password'];       
  $phone_number= $_POST['phone_number']; 

  // Check duplicate username
  $check = $conn->query("SELECT * FROM users WHERE username = '$username'");
  if ($check->num_rows > 0) {
      echo "<script>alert('Username already exists. Please try another.'); window.history.back();</script>";
      exit();
  }

  $sql = "INSERT INTO users (username, first_name, last_name, email, password, phone_number) 
          VALUES ('$username','$first_name','$last_name','$email','$password','$phone_number')";

  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Registration successful!'); window.location='login.php';</script>";
      exit();
  } else {
      echo "<script>alert('Error: " . $conn->error . "'); window.history.back();</script>";
  }
}
?>