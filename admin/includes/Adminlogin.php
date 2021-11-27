<?php
include_once("../../core/init.php");
if(isset($_POST['login'])){
	$email = $getFromU->InputValidateEmail($_POST['email']);
	$password  = $getFromU->InputPassword($_POST['password']);  
	if(empty($email) || empty($password)){
		header("Location: ../index.php?msg=empty");
		exit();
	}else{
	    if($getFromA->checkAdminEmail($email) === false){
	    	header("Location: ../index.php?msg=nouser");
			exit();
	    }else{
	       $admin = $getFromA->adminData($email);
	       $pwdCheck = $admin['admin_password'];
	       if($pwdCheck !== md5($password)){
	       	  header("Location: ../index.php?msg=wrongpwd");
			  exit();
	       }elseif($pwdCheck == md5($password)){
	       	  session_start();
			  $_SESSION['adminid'] = $admin['admin_id'];
			  header("Location: ../admin_profile.php");
			  exit();
	       }else{
	       	  header("Location: ../index.php?msg=wrongpwd");
			  exit();
	       }
	    }
	}
} else {
	header("Location: ../index.php");
	exit();
}
?>

