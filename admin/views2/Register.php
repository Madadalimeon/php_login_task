<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #ff9966, #ff5e62);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .register-card {
      background: #fff;
      border-radius: 15px;
      padding: 40px 30px;
      box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 450px;
    }
    .register-card h3 {
      font-weight: bold;
      color: #333;
    }
    .form-control {
      border-radius: 10px;
    }
    .btn-custom {
      background: #ff5e62;
      border: none;
      border-radius: 10px;
      padding: 10px;
      font-weight: bold;
      transition: 0.3s;
      color: #fff;
    }
    .btn-custom:hover {
      background: #ff9966;
    }
    .login-link {
      display: block;
      text-align: center;
      margin-top: 15px;
      text-decoration: none;
      /* color: #ff5e62; */
      color:white;
      font-weight: 500;
    }
    .login-link:hover {
      color: #ff9966;
    }
  </style>
</head>
<body>
  <div class="register-card">
    <h3 class="text-center mb-4">Register</h3>
    <!-- Backend script ko correct karen -->
    <form action="login.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required>
      </div>
      <div class="mb-3">
        <label for="first_name" class="form-label">First name</label>
        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter First name" required>
      </div>
      <div class="mb-3">
        <label for="last_name" class="form-label">Last name</label>
        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter Last name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>
      <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Enter phone number" required>
      </div>
      <input type="submit" name="submit" value='Register'; class="btn btn-custom w-100">
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
