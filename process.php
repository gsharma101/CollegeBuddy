<?php
require_once('connection.php');
require_once('function.php');

if(isset($_POST['login'])){

	$email = InputValidate($_POST['email']);
	$password  = InputPassword($_POST['password']);

	$query = "SELECT * FROM student_info WHERE email=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param('s',$email);
	$stmt->execute();
	$result = $stmt->get_result();
	if($row = $result->fetch_assoc()){
		$passCheck = password_verify($password, $row['password']);
		if($passCheck == false){
			header("Location: index.php?msg=wrong");
			exit();
		}elseif ($passCheck == true) {
			session_start();
			$_SESSION['userID'] = $row['user_id'];
			$_SESSION['Fname'] = $row['fname'];
			$_SESSION['Lname'] = $row['lname'];
			$_SESSION['rollNo'] = $row['uni_roll'];
			$_SESSION['section'] = $row['section'];
			$_SESSION['branch'] = $row['branch'];
			$_SESSION['college'] = $row['college'];
			$_SESSION['sem'] = $row['sem'];
			header("Location: profile.php?welcome");
			exit();
		}else{
			header("Location: index.php?msg=wrongPassword");
			exit();
		}

	}else{
		header("Location: index.php?msg=nouser");
		exit();
	}



} else {
	header("Location: index.php");
	exit();
}

?>