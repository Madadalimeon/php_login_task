<?php
include('config.php');
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #3773afff;
    }
    .navbar {
      background: linear-gradient(90deg, #4facfe, #00f2fe);
    }
    .navbar .nav-link, .navbar-brand {
      color: white !important;
      font-weight: 500;
    }
    .navbar .nav-link:hover {
      text-decoration: underline;
    }
    .table-container {
      background: order-radius: 12px;
      border-radius: 12px;
      box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
      padding: 25px;
    }
    h3 {
      font-size:60px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-weight: 800;
      color:white;
    }
    table th {
      background: #4facfe;
      color: white;
      text-align: center;
    }
    table td {
      text-align: center;
      vertical-align: middle;
    }
  </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">MyApp</a>
    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="Register.php">Register</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- User List -->
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-10 mx-auto table-container">
      <h3 class="text-center mb-4">User List</h3>
      <table class="table table-hover table-bordered align-middle">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>First</th>
            <th>Last</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if ($result && $result->num_rows > 0) {
            $i = 1;
            while($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>".$i++."</td>
                      <td>".$row['username']."</td>
                      <td>".$row['first_name']."</td>
                      <td>".$row['last_name']."</td>
                      <td>".$row['email']."</td>
                      <td>".$row['phone_number']."</td>
                      <td><a href='update.php?id=".$row['id']."' class='btn btn-sm btn-primary'>Update</a></td>
                      <td><a href='delete.php?id=".$row['id']."' class='btn btn-sm btn-danger'>Delete</a></td>
                    </tr>";
            }
          } else {
            echo "<tr><td colspan='6' class='text-center text-muted'>No users found</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
