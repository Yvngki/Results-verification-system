<?php
// // Connect to database
// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "example";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// // Generate reset code
// $reset_code = rand(100000, 999999);

// // Check if reset code already exists in table
// $sql_check = "SELECT reset_code FROM exampletable WHERE reset_code = '$reset_code'";
// $result = $conn->query($sql_check);

// if ($result->num_rows > 0) {
//   // If reset code already exists, generate a new one
//   $reset_code = rand(100000, 999999);
// }

// // Insert reset code into table
// $sql_insert = "INSERT INTO exampletable (reset_code) VALUES ('$reset_code')";

// if ($conn->query($sql_insert) === TRUE) {
//   echo "Reset code generated and stored successfully.";
// } else {
//   echo "Error storing reset code: " . $conn->error;
// }

// $conn->close();
?>