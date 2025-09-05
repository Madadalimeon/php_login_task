<?php
$host = "localhost";
$user = "root";  
$pass = ""; 
$db   = "login_system"; 
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Insert data into database
if (isset($_SERVER['REQUEST_METHOD']) === 'submit') {
    $username     = $_POST['username'];
    $first_name   = $_POST['first_name'];
    $last_name    = $_POST['last_name'];
    $email        = $_POST['email'];
    $password     = $_POST['password'];
    $phone_number = $_POST['phone_number'];

    $sql = "INSERT INTO users (username, first_name, last_name, email, password, phone_number) 
            VALUES('$username', '$first_name', '$last_name', '$email', '$password', '$phone_number')";
    if($username === ""){
        echo "<p style='color:red;'>Username field is no working.</p>";
        exit();
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php"); // redirect to login page
        exit();
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}
// Fetch all users
$result = $conn->query("SELECT * FROM users");
?>