<?php
if(isset($_POST['changepass'])){

	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);

	$url = 


}else{
	header("Location: forgot.php");
	exit();
}
?>