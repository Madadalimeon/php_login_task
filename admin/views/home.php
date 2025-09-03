<?php
include('../config/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h3 class="text-center mb-3">User List</h3>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>First</th>
              <th>Last</th>
              <th>Email</th>
              <th>Phone</th>
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
                      </tr>";
              }
            } else {
              echo "<tr><td colspan='6' class='text-center'>No users found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
