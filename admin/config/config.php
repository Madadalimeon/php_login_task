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
if (isset($_POST['submit'])) {
    $username     = $_POST['username'];
    $first_name   = $_POST['first_name'];
    $last_name    = $_POST['last_name'];
    $email        = $_POST['email'];
    $password     = $_POST['password'];
    $phone_number = $_POST['phone_number'];

    $sql = "INSERT INTO users (username, first_name, last_name, email, password, phone_number) 
            VALUES ('$username', '$first_name', '$last_name', '$email', '$password', '$phone_number')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: home.php"); // redirect to home page
        exit();
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}

// Fetch all users
$result = $conn->query("SELECT * FROM users");
?>
