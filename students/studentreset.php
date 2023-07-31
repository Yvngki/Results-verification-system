<?php
// Include database connection file
include '../inc/connect.php';

// Start session
session_start();

// Initialize error message variable
$error = '';

if (isset($_POST['submit'])) {
  // Get form inputs
  $studentID = $_POST['studentID'];
  $question1 = $_POST['question1'];
  $answer1 = $_POST['answer1'];
  $question2 = $_POST['question2'];
  $answer2 = $_POST['answer2'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];

  // Prepare statement to select user with matching studentID and security questions
  $stmt = $conn->prepare("SELECT * FROM student WHERE StudentID = ? AND security_question_1 = ? AND security_answer_1 = ? AND security_question_2 = ? AND security_answer_2 = ?");
  $stmt->bind_param("issss", $studentID, $question1, $answer1, $question2, $answer2);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    // User exists and security questions are correct, update password
    $row = $result->fetch_assoc();
    $stmt = $conn->prepare("UPDATE student SET Password = ? WHERE StudentID = ?");
    $stmt->bind_param("si", $new_password, $row['StudentID']);
    $stmt->execute();
    $stmt->close();

    // Redirect user to success page
    header('Location: RequestClearance.php');
    $_SESSION['firstname'] = $row['Firstname'];
    $_SESSION['lastname'] = $row['Lastname'];
    exit;
  } else {
    // User does not exist or security questions are incorrect
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid username and security questions')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Password Reset</title>
  <style>
    .container{
      width: 500px;
      margin: auto;
      Padding:40px;
      background-color: #004460;
      color:#fff;
      border-radius:15px;
      font-size: 1.5vw;
    }
    td{
      padding:5px;
    }
    legend{
      text-align:center;
    }
    .forgot{
      text-align:center;
      margin-bottom: 10px;
    }
    p{
      color:red;
    }

    @media(max-width:768px){
      .container{
        width: 400px;
        margin:auto;
        padding:20px;
      }
    }
  </style>
</head>
<body>
<div class="forgot">
   <h1>FORGOT PASSWORD</h1>
  <p>Please answer your security questions to reset your password.</p>
   </div>
<div class="container">
      <fieldset>
      <legend>RESET PASSWORD</legend>
        <form action="#" method="post">
        <?php if ($error): ?>
      <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
      
      
        <table>
          <tr>
            <td><label for="studentID">Student ID:</label></td>
            <td><input type="text" name="studentID" required></td>
          </tr>
          <tr>
            <td><label for="question1">Security Question 1:</label></td>
            <td><select name="question1" id="question1" required>
      <option value="">Select a security question</option>
      <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
      <option value="What is your favorite movie?">What is your favorite movie?</option>
      <option value="What is your pet's name?">What is your pet's name?</option>
    </select></td>
          </tr>
          <tr>
            <td><label for="answer1">Answer 1:</label></td>
            <td><input type="text" name="answer1" required></td>
          </tr>
          <tr>
            <td><label for="question2">Security Question 2:</label></td>
            <td><select name="question2" id="question2" required>
      <option value="">Select a security question</option>
      <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
      <option value="What is your favorite movie?">What is your favorite movie?</option>
     
      <option value="What is your favorite book?">What is your favorite book?</option>
</select></td>
          </tr>
          <tr>
            <td><label for="answer2">Answer 2:</label></td>
            <td><input type="text" name="answer2" required></td>
          </tr>
          <tr>
            <td><label for="new_password">New Password:</label></td>
            <td><input type="password" name="new_password" required></td>
          </tr>
          <tr>
            <td><label for="confirm_password">Confirm Password:</label></td>
            <td><input type="password" name="confirm_password" required></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Reset Password"></td>
          </tr>
          
        </table>
     
</form>
</fieldset>

      </div>


</body>
</html>