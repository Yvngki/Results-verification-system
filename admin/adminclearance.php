<?php
session_start();
if(!isset($_SESSION["studentID"])){
    header("Location:clearance.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <link rel = "stylesheet" type ="text/css" href="styl.css">
    <title>Student Status</title>
</head>
<body>
    

  <center  style="overflow: auto;">
    <table >
        <tr>
            
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Grade</th>
            <th>Course</th>
            <th>School</th>
            <th>Balance (ZMW)</th>
            <th>Status</th>
            
        </tr>
        <tr>
            <td><?php echo $_SESSION['studentID']?></td>
            <td><?php echo $_SESSION['firstname']?></td>
            <td><?php echo $_SESSION['lastname']?></td>
            <td><?php echo $_SESSION['Grade']?></td>  
            <td><?php echo $_SESSION['CourseName']?></td>
            <td><?php echo $_SESSION['Name']?></td>
            <td><?php echo $_SESSION['Balance']?></td>
            <td><?php echo $_SESSION['VerificationStatus']?></td>
            
            
        </tr>

        
       
        
    </table>
  </center>
   <script src="assets_clearance2/app.js"> </script>
</body>
</html>