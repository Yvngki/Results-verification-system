<?php
include 'connect.php';
session_start();

$error = ''; // Variable to store error message
if(isset($_POST['submit'])){
    $student_id = $_POST['student_id'];
    $school = $_POST['school'];

      // Validate input
  if (empty($student_id)) {
    $error = 'Student ID and School fields cannot be empty.';
  } elseif (!is_numeric($student_id)) {
    $error = 'Student ID must be Postive numbers.';
  } elseif (empty($school)) {
    $error = 'All fields are required.';
  } elseif (!preg_match('/^[a-zA-Z\s]+$/', $school)) {
    $error = 'School name must only contain letters and spaces.';
  }

  else{
    $sql = "SELECT Result.StudentID, Result.Grade, student.Firstname, student.Lastname,student.Balance, course.CourseName,collegeuniversity.Name,Verification.VerificationStatus
    FROM ((((Result
    INNER JOIN student ON result.StudentID = student.StudentID)
    INNER JOIN course ON result.CourseID = course.CourseID)
    INNER JOIN collegeuniversity ON result.CollegeUniversityID = collegeuniversity.CollegeUniversityID)
    INNER JOIN Verification  ON Result.StudentID = Verification.StudentID)
    WHERE $student_id = Result.studentID and '$school' = collegeuniversity.Name";

    $result = mysqli_query($conn,$sql);
    
    $row = mysqli_fetch_assoc($result);

    if($row){     
            $_SESSION['studentID'] =$row['StudentID'];
            $_SESSION['firstname'] =$row['Firstname'];
            $_SESSION['lastname'] =$row['Lastname'];
            $_SESSION['Grade'] =$row['Grade'];
            $_SESSION['CourseName'] = $row['CourseName'];
            $_SESSION['Name'] = $row['Name']; 
            $_SESSION['Balance'] = $row['Balance']; 
            $_SESSION['VerificationStatus'] = $row['VerificationStatus'];   
            header("Location:clearance2.php");
            
    } 
    else{
        header("Location:notfound.php");
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons-1.9.1/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="clear.css">

    <title>Clearance</title>
    <style>
        #hom {
            margin: 0;
            padding: 20px;
            background-color: #004466;
        }
        
        #house-icon {
            color: #fff;
            font-size: large;
            padding-left: 10px;
        }
        
        #house-icon:hover {
            background-color: #fff;
            color: #004466;
            padding: 10px;
            border-radius: 30px;
            font-size: larger;
        }
    </style>


</head>

<body>




    <div class="container">
        <main>
            
            <div class="text-center" style="margin-top:-60px;">
               
                <img class="d-block mx-auto mb-4" src="imag/REV.png" alt="" width="100" height="50">
                <h2>FILL IN YOUR DETAILS</h2>
                <p class="lead">Please note that all areas must be filled</p>

                <div>
                <?php if ($error) { ?>
  <div style="color: red;"><?php echo $error; ?></div>
<?php } ?>
                </div>
            </div>
            


            <div class="col-md-7 col-lg-8 " id="main_container">

                <form class="needs-validation" novalidate method="post" action="clearance2.php">
                    <div class="row g-3">

                        <div class="col-12">
                            <label for="student ID" class="form-label">Student ID</label>
                            <input type="text" name="student_id" class="form-control" id="student ID" required>
                            <div class="invalid-feedback">
                                The student ID cannot be empty
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="school" class="form-label">School</label>
                            <input type="text" name="school" class="form-control" id="school" required>

                            <div class="invalid-feedback">
                                School name cannot be empty
                            </div>
                        </div>



                        <hr class="my-4">



                        
                       
                        <button class="w-100 btn  btn-lg text-light" type="submit" id="butnn" name="submit"> <a href="admin.php?q=clearance">Submit</a></button>
                </form>
                </div>
            </div>
        </main>

       
    </div>




    <script src="js/bootstrap.bundle.js"></script>
    <script src="clearance.js"></script>
</body>

</html>