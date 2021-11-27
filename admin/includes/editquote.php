<?php
include_once("../../core/init.php");
if(isset($_POST['edit'])){
	$quote = $_POST['edit'];
	$getFromA->EditQuote($quote);
	header("Location: ../admin_profile.php");
	exit();
}
?>