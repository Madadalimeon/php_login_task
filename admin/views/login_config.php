<?php
include('config.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<script>alert('Login Successful!'); window.location='home.php';</script>";
    } else {
        echo "<script>alert('Invalid Email or Password!'); window.location='login.php';</script>";
        }
    }
?>