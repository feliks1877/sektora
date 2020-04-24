<?php 
require "core.php";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//$conn->set_charset('Win-1252');

if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
$conn->set_charset('utf8');
?>