<?php
include_once('db/connection.php');
include_once('classes/user.php');
include_once('classes/post.php');
include_once('classes/follow.php');
include_once('classes/admin.php');
include_once('classes/teacher.php');

global $conn;

session_start();

$getFromU = new User($conn);
$getFromP = new Post($conn);
$getFromF = new Follow($conn);
$getFromA = new Admin($conn);
$getFromT = new Teacher($conn);

define('BASE_URL','http://localhost/buddy/');
?>