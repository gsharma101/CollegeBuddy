<?php
if($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
    header('Location: ../index.php');
}
if(isset($_POST['Tlogin'])){
	$email = $getFromU->InputValidate($_POST['email']);
	$password  = $getFromU->InputPassword($_POST['password']);

	if(empty($email) || empty($password)){
		$error = "Please fill all fields";
	}else{
	   if($getFromT->checkTeacher($email) == false){
	   	  $error = "No Teacher exist";
	   }else{
		   if($getFromT->loginTeacher($email,$password) == false ){
			   $error = "Wrong email or password";
		   }
	   }
	}
}
?>

