<?php
function InputValidate($data){

	$data = htmlspecialchars($data);
	$data = trim($data);
	$data = strip_tags($data);
	$data = strtolower($data);
	return $data;
}
function InputPassword($data){

	$data = htmlspecialchars($data);
	$data = trim($data);
	$data = strip_tags($data);
	return $data;
}

function alert($msg) {
    echo "<script type='text/javascript'>
    alert('$msg');
    </script>";
}
?>