<?php
function InputValidate($data){

	$data = htmlspecialchars($data);
	$data = trim($data);
	$data = strip_tags($data);
	$data = strtolower($data);
	$data = htmlentities($data);
	return $data;
}
function InputPassword($data){

	$data = htmlspecialchars($data);
	$data = trim($data);
	$data = strip_tags($data);
	return $data;
}
?>