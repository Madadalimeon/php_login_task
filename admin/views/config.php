<?php
$host = "localhost";
$user = "root";  
$pass = ""; 
$db   = "login_system"; 
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error)}
// Insert data into database
if (isset($_POST['submit'])) {
  $username    = $_POST['username'];       // Undefined array key "user_name" of this varliber error
  $first_name   = $_POST['first_name'];     
  $last_name    = $_POST['last_name'];       
  $email        = $_POST['email'];               
  $password     = $_POST['password'];       
  $phone_number = $_POST['phone_number']; 
  $sql = "INSERT INTO users (username,first_name,last_name,email,password,phone_number) 
  VALUES ('$username','$first_name','$last_name','$email','$password','$phone_number')";
  // write a condition if for changing my query is working 
  if($conn->query($sql) === TRUE){
      header("Location: login.php"); // redirect to home page
  }else{
    echo('your connect in not working');
  }
  // Fetch all users
$result = $conn->query("SELECT * FROM users");

}
?>
