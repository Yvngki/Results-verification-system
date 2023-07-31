<?php
include("../inc/connect.php");
session_start();

$error = ''; // Variable to store error message

if (isset($_POST['submit'])) {
  // Get form inputs
  $student_id = $_POST['student_id'];
  $password = $_POST['password'];

  // Validate input
  if (empty($student_id) || empty($password)) {
    $error = 'Student ID and Password fields cannot be empty.';
  } elseif (!is_numeric($student_id) || !preg_match('/^\d+$/', $student_id)) {
    $error = 'Student ID must be a positive integer.';
  } else {
    // Check student ID and password against the database
    $sql = "SELECT * FROM student WHERE StudentID = $student_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $hash = $row['Passcode'];
      if (password_verify($password, $hash)) {
        // Login successful
        $_SESSION['StudentID'] = $student_id;
        header("location: ../students/Clearance.php");
        exit;
      } else {
        $error = 'Invalid password.';
        header("location:../students/RequestClearance.php?id=".$error."");
      }
    } else {
      $error = 'Invalid Student id.';
      header("location:../students/RequestClearance.php?id=".$error."");
    }
  }
}

// Display error message if any
if (!empty($error)) {
  echo "<p>Error: $error</p>";
}
?>
