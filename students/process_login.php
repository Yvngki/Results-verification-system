<?php
include("connect.php");
$error = ''; // Variable to store error message
session_start();
if (isset($_POST['submit'])) {
  // Get form inputs
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate input
  if (empty($username) || empty($password)) {
    $error = 'All fields are required.';
  } else {
    // Retrieve rows with matching username
    $sql = "SELECT * FROM Administrator WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful and if any rows were returned
    if ($result && mysqli_num_rows($result) > 0) {
      // Iterate through the rows
      while ($row = mysqli_fetch_assoc($result)) {
        // Verify the password for each row
        if (password_verify($password, $row['Password'])) {
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
      $error = 'Invalid username or password.';
    } else {
      // No matching user found
      $error = 'Invalid username or password.';
    }
  }
}
?>