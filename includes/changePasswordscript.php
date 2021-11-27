<?php
if(isset($_POST['changepwd'])){
	$cpassword  = $getFromU->InputPassword($_POST['cpassword']);
	$newpassword  = $getFromU->InputPassword($_POST['newpassword']);
	$renewpassword  = $getFromU->InputPassword($_POST['renewpassword']);

	if(empty($cpassword) || empty($newpassword) || empty($renewpassword)){
		$error = "Please fill all fields";
	}elseif($newpassword !== $renewpassword){
		$error = "Password not match";
	}elseif(strlen($newpassword) < 6 ){
		$error = "Password is to short!";
	}else{
		$passwordCheck = password_verify($cpassword , $user->user_password);
		if($passwordCheck == false){
            $error = "Wrong Password";
        }elseif($passwordCheck == true){
			$newhashPassword = password_hash($newpassword,PASSWORD_DEFAULT);
			$query = "UPDATE student_info SET user_password=:user_password WHERE user_id=:user_id";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(':user_password',$newhashPassword,PDO::PARAM_STR);
			$stmt->bindParam(':user_id',$user_id,PDO::PARAM_INT);
			$stmt->execute();
			$successMsg = "Password changed Successfully";
		}else{
			$error = "Wrong Password";
		}
		
    } 
}
?>