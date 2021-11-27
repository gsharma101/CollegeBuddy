<?php
if($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
    header('Location: ../index.php');
}
if(isset($_POST['login'])){
	$email = $getFromU->InputValidate($_POST['email']);
	$password  = $getFromU->InputPassword($_POST['password']);

	if(empty($email) || empty($password)){
		$error = "Please fill all fields";
	}else{
	   if($getFromU->loginUser($email,$password) == false){
	   	  $error = "Wrong email or password";
	   }else{
		   if($getFromU->checkAccountStatus($email) == false ){
			   $error = "Account not verified";
		   }
	   }
	}
}
?>

