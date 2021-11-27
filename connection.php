<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "ptubuddy";

$conn = new mysqli($server,$user,$password,$database);

if(mysqli_connect_errno()){
	echo "Connection failed".mysqli_connect_errno();
}
?>