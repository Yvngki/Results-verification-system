<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Verification System</title>
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <style>
   header{
    display:flex;
    justify-content:space-between;
    background-color:#004460;
   }

   footer{
    background-color:#004460;
   }
   
   #navlinks{
     color:#fff;
     text-decoration:none;
     border-bottom: 2px solid #fff;
     margin: 20px 0 0 5px;
   }

   .table{
    overflow:auto;
   }

   
  </style>
</head>
<body>
  <header >
    <h1><?php echo $_SESSION['username']; ?></h1>
    <div>
    <a href="index.php" id="navlinks"> Home</a>
    <a href="login.php"id="navlinks" id="navlinks">Log out</a>
    </div>
  </header>
  
  <nav>
    <ul>
      <li><a href="admin.php?q=1">Dashboard</a></li>
      <li><a href="admin.php?q=4">Settings</a></li>
    </ul>
  </nav>
  
<form action="" method="POST">

<div class="row">
    <div class="col-6 text-center"><h2>Admin Dashboard</h2></div>
    <div class="col-6">
        <div class="row">
            <div class="col-6">
              <input type="search" name="id" class="form-control" placeholder="Search student id">
            </div>
            <div class="col-6">
                 <input class="btn btn-primary" name="submit" type="submit" value="Search">
            </div>
        </div>
    </div>
</div>
</form>
  <main>
    
    

    <div>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rev";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
 <div>

        <?php
    
// $sql = "SELECT* from verification";


error_reporting(0);

  if($_GET['q'] == 1 || $_GET['q'] == null){
  include "connect.php";

 if($_POST['submit']){
    $id = $_POST['id'];
    $sql1 = "SELECT * FROM student WHERE StudentID='$id'";
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_array($result1);

    $sql = "SELECT VerificationStatus from verification WHERE StudentID='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

        if(!$result){
            $msg = 'No records found!';
        }
        echo '
        <div class="container p-4">
      <table class="table">
        <tr>
          <th>Student id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Verification status</th>
        </tr>
        <tr>
        <td>'.$row1['StudentID'].'</td>
        <td>'.$row1['Firstname'].'</td>
        <td>'.$row1['Lastname'].'</td>
        <td>'.$row1['Email'].'</td>
        <td>'.$row['VerificationStatus'].'</td>
      </tr>
      </table>
    </div>
    
        ';
   }
   
  


}

  
  if($_GET['q']== 4){
    echo '
    <div class="container">
  <div class="row text-center">
    <div class="col-12 col-md-6">
        <img src="images/hero.jpg" width="300" style="border-radius:50%; height:300px;" alt="">
    </div>
    <div class="col-12 col-md-6">
    
    </div>
  </div>
</div>

    ';
  }
  if($_GET['q']== 'clearance'){
    include 'adminclearance.php';

  }
  




  ?>
  </table>
</div>


  </main>
  
  <footer>
    <p>&copy; <a href="https:tekrem-1.web.app" id="navlinks">2023 Tekrem</a></p>
  </footer>
  
</body>
</html>
