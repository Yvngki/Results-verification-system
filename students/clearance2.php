<?php
session_start();
if (!isset($_SESSION['StudentID'])) {
    header("Location: clearance.php");
}

$id = $_SESSION['StudentID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styl.css">
    <title>Student Status</title>
    <style>
        header {
    background-color: #004466;
    color: #fff;
}
    </style>
</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand bg-light ms-3 p-2 rounded" href="#">
            <img src="../imag/REV.png" alt="logo" height="65" width="80" id="nav-image">
        </a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="clearance.php">Re-submit</a>
                </li>
            </ul>
        </div>
    </nav>
</header>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <?php
            // Database connection details
            include("../inc/connect.php");

            // Query to retrieve student details with joins
            $sql = "SELECT student.*, result.grade, course.courseName, collegeuniversity.Name 
                    FROM student 
                    INNER JOIN result ON student.studentid = result.studentid 
                    INNER JOIN course ON result.courseid = course.courseid 
                    INNER JOIN collegeuniversity ON course.collegeuniversityid = collegeuniversity.collegeuniversityid
                    WHERE student.studentid = $id";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Fetch the first row of the result as an associative array
                $student = mysqli_fetch_assoc($result);

                // Function to determine the status
                function getStatus($balance)
                {
                    return ($balance > 0) ? "Not Cleared" : "Cleared";
                }
            ?><div class="card shadow p-3">
            <div class="table-responsive">
                <h4 class="text-center p-2">Student Results verification Details</h4>
                <table class="table table-bordered">
                    <thead >
                        <tr>
                            <th class="text-dark">Student ID</th>
                            <td><?php echo $student['StudentID']; ?></td>
                        </tr>
                        <tr>
                            <th class="text-dark">First Name</th>
                            <td><?php echo $student['Firstname']; ?></td>
                        </tr>
                        <tr>
                            <th class="text-dark">Last Name</th>
                            <td><?php echo $student['Lastname']; ?></td>
                        </tr>
                        <tr>
                            <th class="text-dark">Grade</th>
                            <td><?php echo $student['grade']; ?></td>
                        </tr>
                        <tr>
                            <th class="text-dark">Course</th>
                            <td><?php echo $student['courseName']; ?></td>
                        </tr>
                        <tr>
                            <th class="text-dark">College/University</th>
                            <td><?php echo $student['Name']; ?></td>
                        </tr>
                        <tr>
                            <th class="text-dark">Balance (ZMW)</th>
                            <td><?php echo $student['Balance']; ?></td>
                        </tr>
                        <tr>
                            <th class="text-dark">Status</th>
                            <td><?php echo getStatus($student['Balance']); ?></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        
            <?php
            } else {
                echo "No student records found.";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <script src="assets_clearance2/app.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>
