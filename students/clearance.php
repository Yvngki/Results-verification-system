<?php
include '../inc/connect.php';
session_start();
if(!isset($_SESSION['StudentID'])){
header('location:index.php');
}

$studentId = $_SESSION['StudentID'];
$schoolID = $_SESSION['collegeid'];
$schoolName ="";
$error = "";

$q = mysqli_query($conn,'SELECT * FROM result WHERE StudentID = '.$studentId.'' );
if($result = mysqli_fetch_array($q)){
    $schoolID = $result['CollegeUniversityID'];
}else{
    $error = "<div class='alert alert-danger'>User Profile not found!</div>";
}



$q = mysqli_query($conn,'SELECT * FROM collegeuniversity WHERE CollegeUniversityID="'.$schoolID.'"' );
if($results = mysqli_fetch_array($q)){
$schoolName = $results['Name'];
}else{
    $error = "<div class='alert alert-danger'>User Profile not found!</div>";
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
    <div class="container-fluid p-2"  style="background:#004466; position:fixed;" >
        <div class="row">
            <div class="col-4">
                <a href="../index.php" class="text-decoration-none text-light">
                    <i class="bi bi-house-fill fs-4">Home</i>
                </a>
            </div>
            <div class="col-8"></div>
        </div>
    </div>



    <div class="container">
        <main>
            <div class=" text-center" style="padding:80px 0;">
                <img class="d-block mx-auto mb-4" src="../imag/REV.png" alt="" width="100" height="50">
                <h4>FILL IN YOUR DETAILS</h4>
                <p class="lead">Please note that all areas must be filled</p>

                <div>

                </div>
            </div>
            

            <div class="row">
                <div class="col-12 col-md-2 col-lg-2"></div>
                <div class="col-12 col-md-8 col-lg-8 p-2">
                <div class="container" style=";margin-top:-120px">

                    <form class="needs-validation" novalidate class="p-4" method="POST" action="clearance2.php">
                        <div class="row g-3">

                            <div class="col-12">
                                <label for="student ID" class="form-label">Student ID</label>
                                <input type="text" name="student_id" class="form-control" value="<?php echo $studentId; ?>" id="student ID" required>
                                <div class="invalid-feedback">
                                    The student ID cannot be empty
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="school" class="form-label">School</label>
                                <input type="text" name="school" class="form-control" value="<?php echo $schoolName; ?>" id="school" required>

                                <div class="invalid-feedback">
                                    School name cannot be empty
                                </div>
                            </div> 

                            <div class="form-group text-center">
                                <button class="w-50 btn  btn-lg text-light" style="background:#004466;" type="submit" name="submit">Submit</button>
                            </div>
                    </form>
                    </div>

                </div>
                <div class="col-12 col-md-2 col-lg-2"></div>
            </div>
            </div>
        </main>

     
    </div>
   <div class="container-fluid text-muted text-center text-small" style="bottom:0;background:#004466; position:fixed;">
            <p class="mb-1 text-light">&copy; 2017–2022 </p>
            <a class="text-light text-decoration-none" href="https:tekrem-1.web.app">Tekrem IT Solution</a>
            <ul class="list-inline">
                <li class="list-inline-item"><a class="text-light text-decoration-none" href="#">Privacy</a></li>
                <li class="list-inline-item"><a class="text-light text-decoration-none" href="#">Terms</a></li>
                <li class="list-inline-item"><a class="text-light text-decoration-none" href="#">Support</a></li>
            </ul>
        </div>



    <script src="js/bootstrap.bundle.js"></script>
    <script src="clearance.js"></script>
</body>

</html>