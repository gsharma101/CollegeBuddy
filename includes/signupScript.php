<?php
if($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
    header('Location: ../index.php');
}
if(isset($_POST['login'])){
	$fname = $getFromU->InputValidate($_POST['fname']);
	$lname = $getFromU->InputValidate($_POST['lname']);
	$email = $getFromU->InputValidateEmail($_POST['email']);
	$sec = $getFromU->InputValidate($_POST['sec']);
	$sem = $getFromU->InputValidate($_POST['sem']);
	$branch = $getFromU->InputValidate($_POST['branch']);
	$college = $getFromU->InputValidate($_POST['college']);
	$password = $getFromU->InputValidate($_POST['password']);
	$password2 = $getFromU->InputValidate($_POST['password2']);
	$phone = $getFromU->InputValidate($_POST['phoneN']);
	$uni_roll =$getFromU->InputPassword($_POST['uni_roll']);
	$date = date("Y-m-d h:i:s");
	$selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "www.booknerd.in/verifi/verifi.php?selector=". $selector."&validator=".bin2hex($token)."&email=".$email;
	$expires = date("U")+1800;
	$error = " ";

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error="Please enter a valid email";
	} elseif (!preg_match("/^[a-zA-Z]+$/", $fname) || !preg_match("/^[a-zA-Z]+$/", $lname)) {
	   	$error="Please enter a valid name";
	}elseif (strlen($password)<6) {
		$error="Password to small";
	}elseif(!preg_match("/^[0-9]*$/", $uni_roll) ||strlen($uni_roll) !== 7){
		$error="Invalid university Rollnumber";
	}elseif(!preg_match("/^[0-9]*$/", $phone) || strlen($phone) !== 10){
		$error="Invalid Phone number";
	}elseif($password !== $password2){
		$error="Password not matched";
	}elseif(!preg_match("/^[a-gA-G1-2].$/", $sec)){
		$error="Invalid Section";
	}else{
		if($getFromU->checkUser($email,$uni_roll,$phone) === true){
			$error = "Email , Phone number or Rollnumber is taken";
		}else{
			$hashPassword = password_hash($password, PASSWORD_DEFAULT);

			$getFromU->SignUp($date,$fname,$lname,$email,$sec,$sem,$branch,$college,$hashPassword,$phone,$uni_roll);
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);

           if($getFromU->VerifiEmail($email,$uni_roll,$hashedToken,$selector,$expires) === true){
			 $getFromU->SendEmail($email,$url);
			 mkdir("../students/$uni_roll");
           	 header("Location: verifi.php");
           	 exit();
           }else{
           	 $error = "Please try again later";
           }
 		}
  }
}
?>