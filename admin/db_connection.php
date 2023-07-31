
<?php
// db_connection.php
$db = new mysqli('localhost', 'root', '', 'rev');
if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}
?>
