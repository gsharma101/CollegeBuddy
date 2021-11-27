<?php
require_once('../../connection.php');
require_once('../../function.php');
if (isset($_POST['resetnewpwdbtn'])) {

	$selector = $_POST['selector'];
	$validator = $_POST['validator'];
	$password = InputPassword($_POST['resetnewpwd1']);
	$resetpassword = InputPassword($_POST['resetnewpwd2']);

	if(empty($password) || empty($resetpassword)){

		header("Location: ../create-new-password.php?field=fieldsempty");
		exit();

	} elseif ($password != $resetpassword) {
		header("Location: ../create-new-password.php?field=pwdnotmatch");
		exit();
	}

	$currentDate = date("U");

	$query = "SELECT * from pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?;";
	$stmt = $conn->prepare($query);
	$stmt->bind_param('ss',$selector,$currentDate);
	$stmt->execute();
	$result = $stmt->get_result();
	if(!$row = $result->fetch_assoc()){
		header("Location: ../create-new-password.php?field=resubmit");
		exit();
	}else{
		$tokenBin = hex2bin($validator);
		$tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);
		if($tokenCheck === false){
			header("Location: ../create-new-password.php?field=resubmit");
			exit();
		}elseif($tokenCheck == true){
			$tokenEmail = $row['pwdResetEmail'];
			$query = "SELECT * FROM student_info WHERE email=?;";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('s',$tokenEmail);
			$stmt->execute();
			$result = $stmt->get_result();
			if(!$row = $result->fetch_assoc()){
			     header("Location: ../create-new-password.php?field=sqlerror");
			     exit();
				}else{
					$query = "UPDATE student_info SET password=? where email=?;";
					$stmt = $conn->prepare($query);
					$hashPassword = password_hash($password, PASSWORD_DEFAULT);
					$stmt->bind_param('ss',$hashPassword,$tokenEmail);
					$stmt->execute();

					$query = "DELETE FROM pwdReset where pwdResetEmail=?;";
					$stmt = $conn->prepare($query);
					$stmt->bind_param('s',$tokenEmail);
					$stmt->execute();
					header("Location: ../../index.php?field=changed");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../../index.php");
	exit();
}
?>