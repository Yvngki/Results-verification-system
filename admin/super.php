<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <style>
    .card-img-top{
        height:200px;
    }

    .navbar{
    background-color:#004460;
   }
   
   .nav-link{
     color:#fff;
     text-decoration:none;
     border-bottom: 2px solid #fff;
     margin: 20px 0 0 5px;
   }

   .nav-link:hover{
    background-color:#fff;
    color:#000;
   }
  </style>
 
</head>
<body>
<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand p-2 text-light ms-4" href="#">Admin Panel</a>
    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end px-4 py-2" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="super.php?op=dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="super.php?op=students">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="super.php?op=colleges">Colleges</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="super.php?op=admins">Admins</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php" onclick="return confirm('Are you sure you want to logout?');">logout</a>
        </li>
      </ul>
    </div>
  </nav>
      <!-- Content -->
     <main>

     <div class="container mt-4">
          <?php
      require 'db_connection.php';

      // Check if 'op' parameter is set
      if (isset($_GET['op'])) {
          $op = $_GET['op'];

          switch ($op) {
              case 'dashboard':
                  echo '<div class="container-fluid mt-3">
                      <!-- Dashboard section -->
                      <h2>Dashboard</h2>
                      <div class="row">
                        <div class="col-md-4 mb-4">
                          <div class="card shadow">
                            <img src="../images/student.jpg" class="card-img-top" alt="Student Image">
                            <div class="card-body">
                              <h5 class="card-title">Total Students</h5>';

                  // Execute the query to count the records in the student table
                  $studentCountQuery = $db->query("SELECT COUNT(*) FROM student");
                  // Retrieve the count from the result
                  $studentCount = $studentCountQuery->fetch_array()[0];

                  echo "<p class='card-text'>$studentCount</p>
                                  <a href='super.php?op=students' class='btn btn-primary'>Manage Students</a>
                                </div>
                              </div>
                            </div>
                            <div class='col-md-4 mb-4'>
                              <div class='card shadow'>
                                <img src='../images/college.png' class='card-img-top' alt='College Image'>
                                <div class='card-body'>
                                  <h5 class='card-title'>Total Colleges</h5>";

                  // Execute the query to count the records in the collegeuniversity table
                  $collegeCountQuery = $db->query("SELECT COUNT(*) FROM collegeuniversity");
                  // Retrieve the count from the result
                  $collegeCount = $collegeCountQuery->fetch_array()[0];

                  echo "<p class='card-text'>$collegeCount</p>
                                  <a href='super.php?op=colleges' class='btn btn-primary'>Manage Colleges</a>
                                </div>
                              </div>
                            </div>
                            <div class='col-md-4 mb-4'>
                              <div class='card shadow'>
                                <img src='../images/admin.png' class='card-img-top' alt='Admin Image'>
                                <div class='card-body'>
                                  <h5 class='card-title'>Total Admins</h5>";

                  // Execute the query to count the records in the administrator table
                  $adminCountQuery = $db->query("SELECT COUNT(*) FROM administrator");
                  // Retrieve the count from the result
                  $adminCount = $adminCountQuery->fetch_array()[0];

                  echo "<p class='card-text'>$adminCount</p>
                                  <a href='super.php?op=admins' class='btn btn-primary'>Manage Admins</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </main>";
                  break;
            case 'students':
              // Retrieve student information from the database
              $query = "SELECT s.StudentID, s.Firstname, s.Lastname, c.Name AS CollegeName, r.Grade, v.VerificationStatus, co.CourseName
          FROM student AS s
          INNER JOIN collegeuniversity AS c ON s.CollegeID = c.CollegeUniversityID
          INNER JOIN result AS r ON s.StudentID = r.StudentID
          INNER JOIN verification AS v ON s.StudentID = v.StudentID
          INNER JOIN course AS co ON s.CourseID = co.CourseID";

$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {
    // Display student information in a table
    echo '<div class="container-fluid mt-3 shadow p-3">
            <h2>Student Information</h2>
            <table class="table">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>College</th>
                  <th>Result</th>
                  <th>Verification</th>
                  <th>Course</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        $studentId = $row['StudentID'];
        $studentName = $row['Firstname'] . ' ' . $row['Lastname'];
        $collegeName = $row['CollegeName'];
        $resultGrade = $row['Grade'];
        $verificationStatus = $row['VerificationStatus'];
        $courseName = $row['CourseName'];

        echo '<tr>
                <td>'.$studentId.'</td>
                <td>'.$studentName.'</td>
                <td>'.$collegeName.'</td>
                <td>'.$resultGrade.'</td>
                <td>'.$verificationStatus.'</td>
                <td>'.$courseName.'</td>
                <td>
                  <button class="btn btn-primary" onclick="showMoreInfo('.$studentId.')">More Info</button>
                  <a onclick="return confirm(\'Are you sure you want to delete this Product?\')" class="btn btn-danger" href="delete_user.php?id=' . $studentId . '" >Delete</a>
                </td>
              </tr>';
    }

    echo '</tbody></table></div>';
} else {
    echo '<p>No students found.</p>';
}

            break;
              case 'colleges':
                include "colleges.php";
                break;

              case 'admins':
                break;
              case 'editCollege':
                include "editCollege.php";

                break;

              default:
                  echo "Invalid operation specified.";
                  break;
          }
      } else {
          echo "No 'op' parameter set.";
      }

      $db->close();
      ?>
     </div>
     </main>


  <!-- Include Bootstrap JS -->
<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
