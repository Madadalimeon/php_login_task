<?php
include('config.php');

// Fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
    
// Delete record
if (isset($_GET['delete_id'])) {
  $id = $_GET['delete_id'];
  $conn->query("DELETE FROM users WHERE id = $id"); // query of DELETE
  header("Location: ".$_SERVER['PHP_SELF']);
  exit();
}

// Update record
if (isset($_POST['update_user'])) {
  $id = $_POST['id'];
  $username = $_POST['username'];
  $first = $_POST['first_name'];
  $last = $_POST['last_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone_number'];

  $conn->query("UPDATE users SET username='$username', first_name='$first', last_name='$last', email='$email', phone_number='$phone' WHERE id=$id"); // query of UPDATE
  header("Location: ".$_SERVER['PHP_SELF']);
  exit();
}
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
      background: linear-gradient(135deg, #f8f9fa, #e9ecef);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar {
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }
    .card-header {
      font-size: 1.2rem;
      font-weight: bold;
      background-color: #0d6efd;
      color: #fff;
      text-align: center;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
    }
    .table thead {
      background-color: #f1f3f5;
    }
    .table-hover tbody tr:hover {
      background-color: #e7f1ff;
      cursor: pointer;
      transition: 0.3s;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">User Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="Register.php">Register</a></li>
        <li class="nav-item"><a class="nav-link active" href="login.php">login</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->

<div class="container mt-5 pt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">📋 User List</div>
        <div class="card-body">
          <table class="table table-bordered table-hover align-middle text-center">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>First</th>
                <th>Last</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Delete</th>
                <th>Update</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if ($result && $result->num_rows > 0) { // write a if and while cod for add datebass date
                $i = 1;
                while($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>".$i++."</td>
                          <td>".$row['username']."</td>
                          <td>".$row['first_name']."</td>
                          <td>".$row['last_name']."</td>
                          <td>".$row['email']."</td>
                          <td>".$row['phone_number']."</td>
                          <td><a href='?delete_id=".$row['id']."' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure to delete?')\">Delete</a></td>
                          <td>
                            <button type='button' class='btn btn-success btn-sm' 
                              data-bs-toggle='modal' 
                              data-bs-target='#updateModal' 
                              data-id='".$row['id']."'
                              data-username='".$row['username']."'
                              data-first='".$row['first_name']."'
                              data-last='".$row['last_name']."'
                              data-email='".$row['email']."'
                              data-phone='".$row['phone_number']."'>Update</button>
                          </td>
                        </tr>";
                }
              } else {
                echo "<tr><td colspan='8' class='text-center text-muted'>No users found</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
        <div class="modal-header">
          <h5 class="modal-title">Update User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="user_id">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone_number" id="phone" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="update_user" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Pass data to modal for update
var updateModal = document.getElementById('updateModal')
updateModal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget
  document.getElementById('user_id').value = button.getAttribute('data-id')
  document.getElementById('username').value = button.getAttribute('data-username')
  document.getElementById('first_name').value = button.getAttribute('data-first')
  document.getElementById('last_name').value = button.getAttribute('data-last')
  document.getElementById('email').value = button.getAttribute('data-email')
  document.getElementById('phone').value = button.getAttribute('data-phone')
})
</script>
</body>
</html>
