<?php
include('login_config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      background: #fff;
      border-radius: 15px;
      padding: 40px 30px;
      box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
    }
    .login-card h3 {
      font-weight: bold;
      color: #333;
    }
    .form-control {
      border-radius: 10px;
    }
    .btn-custom {
      background: #6a11cb;
      border: none;
      border-radius: 10px;
      padding: 10px;
      font-weight: bold;
    }
    .btn-custom:hover {
      background: #2575fc;
    }
    .register-link {
      display: block;
      text-align: center;
      margin-top: 15px;
      text-decoration: none;
      color: #6a11cb;
      font-weight: 500;
    }
    .register-link:hover {
      color: #2575fc;
    }
  </style>
</head>
<body>
  <div class="login-card col-md-4">
    <h3 class="text-center mb-4">Login</h3>
    <form action="login.php" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>
      <button type="login" class="btn btn-custom w-100">Login</button>
      <a href="Register.php" class="register-link">Don’t have an account? Register</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
