<?php
include("../inc/connect.php");
session_start();
$error = ''; // Variable to store error message

if (isset($_POST['submit'])) {
  // Get form inputs
  $student_id = $_POST['student_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $College_id = $_POST['college_id'];
  $course_id = $_POST['course_id'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $security_question_1 = $_POST['question1'];
  $security_answer_1 = $_POST['answer1'];
  $security_question_2 = $_POST['question2'];
  $security_answer_2 = $_POST['answer2'];

  // Validate input
  if (!is_numeric($student_id) || !preg_match('/^\d+$/', $student_id)) {
    $error = 'Student ID must be a positive integer.';
  } elseif (!ctype_alpha(str_replace(' ', '', $firstname)) || !ctype_alpha(str_replace(' ', '', $lastname))) {
    $error = 'First name and last name must only contain letters and spaces.';
  } elseif ($password !== $confirm_password) {
    $error = 'Passwords do not match.';
  } else {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the student data into the database
    $stmt = $conn->prepare("INSERT INTO student (StudentID, Firstname, Lastname, Email, Passcode, CollegeID, CourseID, security_question_1, security_answer_1, security_question_2, security_answer_2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssssiiss", $student_id, $firstname, $lastname, $email, $hashed_password, $College_id, $course_id, $security_question_1, $security_answer_1, $security_question_2, $security_answer_2);

    if ($stmt->execute()) {
      // Registration successful
      // Redirect user to success page or perform other actions
      $_SESSION['firstname'] = $firstname;
      $_SESSION['lastname'] = $lastname;
       $_SESSION['StudentID'] = $student_id;
       $_SESSION['collegeid'] = $College_id;
       $_SESSION['courseid'] = $course_id;
      header('Location: ../students/success.php');
      exit;
    } else {
      $error = "Registration failed. Please try again later.";
    }
  }
}

// Display error message if any
if (!empty($error)) {
  echo "<p>Error: $error</p>";
}
?>
