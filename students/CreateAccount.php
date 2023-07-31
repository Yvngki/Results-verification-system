<?php
// Assuming you have an active database connection called $connection
include("../inc/connect.php");
// Retrieve college data from the database
$collegeQuery = "SELECT CollegeUniversityID, Name FROM CollegeUniversity";
$collegeResult = mysqli_query($conn, $collegeQuery);

$colleges = [];
while ($row = mysqli_fetch_assoc($collegeResult)) {
    $colleges[] = $row;
}

// Retrieve course data from the database
$courseQuery = "SELECT CourseID, CourseName FROM Course";
$courseResult = mysqli_query($conn, $courseQuery);

$courses = [];
while ($row = mysqli_fetch_assoc($courseResult)) {
    $courses[] = $row;
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
    <script src="dist/jquery/jquery-3.6.1.js"></script>
    <!-- <link rel="stylesheet" href="forms.css" type="text/css"> -->
    <title>Register</title>
</head>
<body id="back_to_top" class="bg-light" style="height:100vh; width:100%;">
<header class="container-fluid bg-dark text-light" style="position:fixed;padding:10px;margin-top:-24px">
       <nav class="row" >
           <div class="col-4">
                <a class="text-decoration-none text-light" href="../index.php">
                    <i class="btn btn-light fs-6 bi bi-house-fill">Home</i>
                </a>  
           </div>
           <div class="col-8">
              
           </div>
       </nav>
    </header>
  <form action="../inc/createStudent.php" method="POST" class="form">
  <div class="container-fluid mt-4" style="padding:50px">
    <div class="container shadow p-3">
      <div class="row">
        <div class="row">
            <div class="col-6">
                <div class="fs-3">Student Details</div>
            </div>
            
        </div>
          <div class="col-12 col-lg-6">
              <div class="form-group">
                  <label for="">Student NO#:</label>
                  <input class="form-control" type="text" id="student_id" name="student_id" required>
              </div>
              <div class="form-group">
                  <label for="">Firstname:</label>
                  <input class="form-control" type="text" id="firstname" name="firstname" required>
              </div>
              <div class="form-group">
                  <label for="">Lastname:</label>
                  <input class="form-control" type="text" id="lastname" name="lastname" required>
              </div>
              <div class="form-group">
                  <label for="">Email:</label>
                  <input class="form-control" type="text" id="firstname" name="email" required>
              </div>
              <div class="form-group">
                  <label for="">Password:</label>
                  <input class="form-control" type="password" id="password" name="password" required>
              </div>
              <div class="form-group">
                  <label for="">Confirm Password:</label>
                  <input class="form-control" type="password" id="password" name="confirm_password" required>
              </div>
              <div class="form-group">
                <label for="">College:</label>
                <select class="form-control" name="college_id" required>
                    <option value="">Select a college</option>
                    <?php foreach ($colleges as $college): ?>
                        <option value="<?php echo $college['CollegeUniversityID']; ?>"><?php echo $college['Name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Course:</label>
                <select class="form-control" name="course_id" required>
                    <option value="">Select a course</option>
                    <?php foreach ($courses as $course): ?>
                        <option value="<?php echo $course['CourseID']; ?>"><?php echo $course['CourseName']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

          </div>
          
          <div class="col-12 col-lg-6">
          <div class="container"  style="margin-top:20px;">
                <div class="fs-5">Select security questions to be used during password reset</div>
    <div class="row">
          <div class="col-12">Security Question 1:</div>
          <div class="col-12">
             <select class="form-control" name="question1" id="question1" required>
                <option value="">Select a security question</option>
                <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                <option value="What is your favorite movie?">What is your favorite movie?</option>
                <option value="What is your pet's name?">What is your pet's name?</option>
              </select>
          </div>  
          <div class="col-12">
                <div class="fs-5">Answer One</div>
                <input class="form-control" type="text" id="answer1" name="answer1" placeholder="Answer One">
          </div>
    </div>
    <div class="row">
          <div class="col-12">Security Question 2:</div>
            <div class="col-12">
              <select class="form-control" name="question2" id="question2" required>
                    <option value="">Select a security question</option>
                    <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                    <option value="What is your favorite movie?">What is your favorite movie?</option>
                    <option value="What is your favorite book?">What is your favorite book?</option>
              </select>
            </div>
            <div class="col-12">
                  <div class="fs-5">Answer Two</div>
                  <input class="form-control" type="text" id="answer1" name="answer2" placeholder="Answer Two">
            </div>
    </div>
  </div>
</div>
      <div class="form-group text-center  mt-4" >
      <input class="btn w-50  text-light" type="submit" style="background:#004466;color:white;" name="submit" value="Register">
      </div>
  </form>   
  <a id="toTop" href="#back_to_top" class="btn " >
      <i class="bi bi-arrow-up-circle fs-4 text-light"></i>
  </a>

<style>
#toTop{
    position:fixed;
    background:#004466;
    width:50px;
    height:50px;
    bottom:50px;
    right:50px;
    z-index: 999;
    display:none;
}
</style>

 <script>
    $(document).ready(function(){
        $(window).scroll(function(){
            if($(this).scrollTop() > 100){
                $('#toTop').fadeIn(1000);
            }else{
                $('#toTop').fadeOut(1000);
            }
        });
    });
 </script>

</body>
</html>

