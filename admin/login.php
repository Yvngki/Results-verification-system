<?php
include("../inc/connect.php");
$error = ''; // Variable to store error message
session_start();
if (isset($_POST['submit'])) {
  // Get form inputs
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate input
  if (empty($username) || empty($password)) {
    $error = 'All fields are required.';
  } elseif (!preg_match('/^[a-zA-Z]+$/', $username)) {
    $error = '<div class="text-center text-danger">Username must only contain letters.</div>';
  } else {
    // Prepare the SQL statement with username
    $sql = "SELECT * FROM Administrator WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful and if any rows were returned
    if ($result && mysqli_num_rows($result) > 0) {
      // Iterate through the rows
      while ($row = mysqli_fetch_assoc($result)) {
        // Verify the password for each row
        if (password_verify($password, $row['passcode'])) {
          // Password is correct, redirect based on role
          if ($row['role'] == 'admin') {
            // Redirect admin to admin.php
            $_SESSION['username'] = $row['Username'];
            header('Location: admin.php');
            exit;
          } elseif ($row['role'] == 'super') {
            // Redirect super user to super.php
            $_SESSION['username'] = $row['Username'];
            header('Location: super.php');
            exit;
          } else {
            // Redirect to a default page for other users
            $_SESSION['username'] = $row['Username'];
            header('Location: default.php');
            exit;
          }
        }
      }
      // If none of the passwords match
      $error = '<div class="text-center text-danger">Invalid username or password.</div>';
    } else {
      // No matching user found
      $error = '<div class="text-center text-danger">Invalid username or password.</div>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons-1.9.1/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="forms.css"> -->
    <title>Login</title>
</head>
<body>
    <header class="container-fluid p-4" style="background:#004466">
       <nav class="row" >
          <div class="col-4">
            <a class="btn btn-light text-dark" href="../index.php">
              <i class="bi bi-house">Home</i>
            </a>
          </div>
          <div class="col-8"></div>
       </nav>
    </header>

<div class="row">
  <div class="col-12 col-md-3 col-lg-3"></div>
  <div class="col-12 col-md-6 col-lg-6 p-4">
  <div class="container-fluid" style="padding:100px 0">
  <div class="container">
    <form method="POST" action="login.php">
      <div class="card text-dark shadow">
          <div class="card-header text-light"  style="background:#004466">
              <legend>ADMIN LOGIN</legend>
          </div>
          <div class="card-body">
            <?php echo $error; ?>
            <div class="form-group">
                <label for="username">username:</label><br>
                <input type="text" id="username" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                  <label for="password">Password:</label><br>
                  <input type="password" class="form-control" id="password" name="password" required>
            </div>
          </div>
          <div class="card-footer">
                <div class="row">
                      <div class="col-4">
                          <a class="text-dark text-decoration-underline" href="../forgotpassword.php">Forgot Password?</a>
                      </div>
                      <div class="col-4">
                          <input type="submit" name="submit" class="btn" style="background:#004466;color:white;">
                      </div>
                      <div class="col-4">
                          <a class="text-dark text-decoration-underline" href="Register.php">Register</a>
                      </div>
                </div>
          </div>
      </div>
    </form>
  </div>
</div>

  </div>
  <div class="col-12 col-md-3 col-lg-3"></div>
</div>
    
</body>
</html>
