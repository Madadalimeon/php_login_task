<?php
include('config.php');
// Get user data
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}
// Update user data
if (isset($_POST['update'])) {
    $username   = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone_number'];
    $sql = "UPDATE users SET 
                username='$username', 
                first_name='$first_name', 
                last_name='$last_name', 
                email='$email', 
                phone_number='$phone'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: userlist.php?msg=User updated successfully");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card shadow-lg p-4">
        <h3 class="text-center mb-4">Update User</h3>
        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" value="<?php echo $user['first_name']; ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="<?php echo $user['last_name']; ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" value="<?php echo $user['phone_number']; ?>" required>
          </div>
          <button type="submit" name="update" class="btn btn-primary w-100">Update</button>
          <a href="userlist.php" class="btn btn-secondary w-100 mt-2">Back</a>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
