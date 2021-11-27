<?php
require_once('../connection.php');
require_once('../function.php');

if(isset($_POST['post-btn'])){

	$postarea = InputValidate($_POST['post-area']);

	$sql = "INSERT INTO buddy_quote (quote) VALUES (?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s',$postarea);
	$stmt->execute();

	if($stmt->affected_rows > 0){
		header("Location: admin-profile.php?post=success");
		exit();
	}
}

?>