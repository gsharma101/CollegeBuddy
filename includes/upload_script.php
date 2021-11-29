<?php
require_once('../core/init.php');
if(isset($_POST['submit'])){
	session_start();
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	$changeStatus = 1;

	$query = "SELECT uni_roll from student_info WHERE user_id=?;";
	$result = $conn->prepare($query);
	$userid = $_SESSION['userid'];
	$result->bind_param('i',$userid);
	$result->bind_result($rollnumber);
	$result->execute();
    $result->fetch();
    $result->close();

	$fileExt = explode('.', $fileName);

	$fileActualExt  = strtolower(end($fileExt));

	$allowed = array('jpg','jpeg','png');

	if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 1000000){
				$fileNameNew = "profile".$rollnumber.".".$fileActualExt;
				$fileDestination = 'students'.'/'.$rollnumber.'/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$query = "UPDATE student_info SET profile_image=? WHERE user_id=?;";
        		$stmt  = $conn->prepare($query);
        		$stmt->bind_param('si',$fileDestination,$userid);
        		$stmt->execute();
				header('Location:  ../profile.php?uploadSuccess');
				exit();
			} else {
				header('Location:  ../profile.php?filetobig');
				exit();
			}
		} else {
			header('Location:  ../profile.php?errorfound');
			exit();
		}
	} else {
		header('Location:  ../profile.php?filenotsupported');
	    exit();
	}
} 
?>