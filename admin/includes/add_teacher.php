<?php
include_once('../../core/init.php');
if(isset($_POST['addtech'])){
	$fname = $getFromU->InputValidate($_POST['fname']);
	$lname = $getFromU->InputValidate($_POST['lname']);
	$email = $getFromU->InputValidate($_POST['email']);
	$password = $getFromU->InputPassword($_POST['password']);
	$phone = $getFromU->InputValidate($_POST['phone']);

	$query = "INSERT INTO buddy_teachers (fname,lname,email,phoneNumber,Tpassword) VALUES(:fname,:lname,:email,:phoneNumber,:Tpassword)";
	$stmt = $conn->prepare($query);
	$hash_password = password_hash($password, PASSWORD_DEFAULT);
	$stmt->bindParam(':fname',$fname,PDO::PARAM_STR);
	$stmt->bindParam(':lname',$lname,PDO::PARAM_STR);
	$stmt->bindParam(':email',$email,PDO::PARAM_STR);
	$stmt->bindParam(':phoneNumber',$phone,PDO::PARAM_STR);
	$stmt->bindParam(':Tpassword',$hash_password,PDO::PARAM_STR);
	$stmt->execute();
	header("Location: ../admin_profile.php");
	exit();
}else{
	header("Location: ../admin_profile.php");
	exit();
}
?>