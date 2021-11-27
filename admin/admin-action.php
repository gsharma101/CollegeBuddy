<?php
require_once('connection.php');
require_once('function.php');

if(isset($_POST['login'])){

	$fname = InputValidate($_POST['fname']);
	$lname = InputValidate($_POST['lname']);
	$email = InputValidate($_POST['email']);
	$sec = InputValidate($_POST['sec']);
	$sem = InputValidate($_POST['sem']);
	$branch = InputValidate($_POST['branch']);
	$college = InputValidate($_POST['college']);
	$password = InputValidate($_POST['password']);
	$password2 = InputValidate($_POST['password2']);
	$phone = InputValidate($_POST['phoneN']);
	$uni_roll =InputPassword($_POST['uni_roll']);
	$date = date("Y-m-d");

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: sign.php?msg=invalidemail");
		exit();
	} elseif (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
	   	header("Location: sign.php?msg=invalidname");
		exit();
	}elseif (strlen($password)<6) {
		header("Location: sign.php?msg=passwordshort");
		exit();
	}elseif(!preg_match("/^[0-9]*$/", $uni_roll)){
		header("Location: sign.php?msg=invalidroll");
		exit();
	}elseif(strlen($uni_roll) !== 7){
		header("Location: sign.php?msg=invalidroll");
		exit();
	}elseif($password !== $password2){
		header("Location: sign.php?msg=passwordnotmatch");
		exit();
	}elseif(!preg_match("/^[a-zA-Z]*$/", $sec)){
		header("Location: sign.php?msg=invalidsection");
		exit();
	}else{

		$query = "SELECT email FROM student_info WHERE email=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param('s',$email);
		$stmt->execute();
		$stmt->store_result();

		$resultCheck = $stmt->num_rows();
		if($resultCheck > 0){
			header("Location: sign.php?msg=emailtaken");
		}else{
			$hashPassword = password_hash($password, PASSWORD_DEFAULT);
			
			$query = "INSERT INTO student_info (register_date,fname,lname,college,branch,section,email,password,phone,uni_roll,sem) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
	        $stmt = $conn->prepare($query);
	        $stmt->bind_param('ssssssssddd',$date,$fname,$lname,$college,$branch,$sec,$email,$hashPassword,$phone,$uni_roll,$sem);
	        $stmt->execute();

	        if($stmt->affected_rows > 0){
			header("Location: sign.php?msg=success");
			exit();
	    } else{
		   header("Location: sign.php?msg=SqlError");
		   exit();
	      }

 		}
  }
} else {

	header("Location: sign.php");
	exit();
}
?>