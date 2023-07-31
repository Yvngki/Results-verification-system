<?php
include("../inc/connect.php");
// Define variables and set to empty values
$company_name = $admin_username = $email = $question1 = $answer1 = $question2 = $answer2 = $password = $confirm_password = "";

// Check if form is submitted
if (isset($_POST['submit'])) {
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  // Sanitize and validate input fields
  $company_name = test_input($_POST["company_name"]);
  $admin_username = test_input($_POST["admin_username"]);
  $email = test_input($_POST["email"]);
  $question1 = test_input($_POST["question1"]);
  $answer1 = test_input($_POST["answer1"]);
  $question2 = test_input($_POST["question2"]);
  $answer2 = test_input($_POST["answer2"]);
  $password = test_input($_POST["password"]);
  $confirm_password = test_input($_POST["confirm_password"]);

  // Validate input fields
  if (empty($company_name)) {
    $company_name_error = "Company name is required";
  }

  if (empty($admin_username)) {
    $admin_username_error = "Admin username is required";
  }

  if (empty($email)) {
    $email_error = "Email is required";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format";
    }
  }

  if (empty($question1)) {
    $question1_error = "Security question 1 is required";
  }

  if (empty($answer1)) {
    $answer1_error = "Answer 1 is required";
  }

  if (empty($question2)) {
    $question2_error = "Security question 2 is required";
  }

  if (empty($answer2)) {
    $answer2_error = "Answer 2 is required";
  }

  if (empty($password)) {
    $password_error = "Password is required";
  } else {
    if (strlen($password) < 8) {
      $password_error = "Password must be at least 8 characters long";
    }
  }

  if (empty($confirm_password)) {
    $confirm_password_error = "Confirm password is required";
  } else {
    if ($password != $confirm_password) {
      $confirm_password_error = "Passwords do not match";
    }
  }

  // If there are no errors, store data in the database
  if (empty($company_name_error) && empty($admin_username_error) && empty($email_error) && empty($question1_error) && empty($answer1_error) && empty($question2_error) && empty($answer2_error) && empty($password_error) && empty($confirm_password_error)) {
    // Connect to database
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "rev";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into database
    $sql = "INSERT INTO administrator (Username, Email, CompanyName, passcode, security_question_1, security_answer_1, security_question_2, security_answer_2)
            VALUES ('$admin_username', '$email', '$company_name', '$hashed_password', '$question1', '$answer1', '$question2', '$answer2')";

    if ($conn->query($sql) === TRUE) {
      // Redirect user to success page
      header('Location: login.php');
    } else {
      echo "Error: " . $conn->error;
    }

    // Close database connection
    $conn->close();
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
    <!-- <link rel="stylesheet" href="forms.css"> -->
    <link rel="stylesheet" href="bootstrap-icons-1.9.1/bootstrap-icons.css">
    <script src="dist/jquery/jquery-3.6.1.js"></script>
    <title>Register</title>
</head>
<body>
<header id="top" class="container-fluid p-2" style="background:#004466;">
       <nav class="row">
            <div class="col-4">
                <a class="btn btn-light" href="../index.php">
                    <i class="bi bi-house-fill">Home</i>
                </a>
            </div>
            <div class="col-8"></div>
       </nav>
    </header>

  <div class="row">
      <div class="col-12 col-md-2 col-lg-2"></div>
      <div class="col-12 col-md-8 col-lg-8 p-4">
      <div class="container-fluid"  style="padding:0;">
<div class="container-fluid text-dark bg-light shadow px-5" style="padding:10px;">
   <form method="POST" id ="form" action="register.php">
        <div class="row ">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <div class="h4 p-4">Admin Information</div>
            <label for="company_name">Company Name:</label><br>
            <input type="text" id="company_name" required class="form-control" placeholder="Company Name" name="company_name">
        </div>
        <div class="form-group">
            <label for="admin_username">Admin Username:</label><br>
            <td><input type="text" id="admin_username" required class="form-control" placeholder="Admin Username" name="admin_username">
        </div>
        <div class="form-group">
            <label for="email">Email:</label><br>
            <input type="email" id="email" required class="form-control" placeholder="Email" name="email"> 
        </div>
        <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" required placeholder="Password" type="password" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" required class="form-control" id="confirm_password" name="confirm_password">
            </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">   
                <div class="h4 p-4">Add Security Questions</div>          
            <div class="row gy-2">
                <div class="col-12">
                    <label for="question1">Security Question 1:</label><br>
                    <select name="question1" class="form-control" placeholder="" id="question1" required>
                        <option value="">Select a security question</option>
                        <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                        <option value="What is your favorite movie?">What is your favorite movie?</option>
                        <option value="What is your pet's name?">What is your pet's name?</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="answer1">Answer 1:</label><br>
                    <input type="text" class="form-control" placeholder="Answer 1" id="answer1" name="answer1">
                </div>
            </div>
        </div>
        <div class="form-group">             
            <div class="row">
                    <div class="col-12">
                        <label for="question1">Security Question 2:</label><br>
                        <select class="form-control" name="question2" id="question2" required>
                            <option value="">Select a security question</option>
                            <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                            <option value="What is your favorite movie?">What is your favorite movie?</option>
                            <option value="What is your favorite book?">What is your favorite book?</option>
                        </select>
                    </div>
                <div class="col-12">         
                    <label for="answer2">Answer 2:</label><br>
                    <input type="text" class="form-control" placeholder="Answer 2" id="answer1" name="answer2">
                </div>
            </div>
        </div>
    </div>
</div>
            <div class="form-group mt-4 text-center">
                    <input class="btn w-50" type="submit"  style="background:#004466;color:white" name="submit" value="Register">  
            </div>    
</form>
   </div>
</div>
      </div>
      <div class="col-12 col-md-2 col-lg-2"></div>
  </div>
  

  <a href="#top" style="background:#004466;position:fixed;z-index:999;bottom:30px;right:50px;" class="btn" id="back_to_top">
      <i class="text-light fs-4 bi bi-arrow-up-circle"></i>
  </a>
</body>
<script>
    $(document).ready(function(){
        $(window).scroll(function(){
            if($(this).scrollTop() > 100){
                $('#back_to_top').fadeIn(1000);
            }else{
                $('#back_to_top').fadeOut(1000);
            }
        });
    });
</script>
<script src="js/bootstrap.bundle.min.js">
</script>
</html>