<?php
include_once('../core/init.php');
$user_id = @$_SESSION['userid'];
$user = $getFromU->UserData($user_id);
if ($getFromU->loggedIn() === false) {
    header("Location: index.php");
    exit();
}else{
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];
    
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
    
        $fileExt = explode('.', $fileName);
    
        $fileActualExt  = strtolower(end($fileExt));
    
        $allowed = array('jpg','jpeg','png');
    
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    $fileNameNew = "profile".$user->uni_roll.".".$fileActualExt;
                    $fileDestination = '../students'.'/'.$user->uni_roll.'/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $query = "UPDATE student_info SET profile_image=:profile_image WHERE user_id=:user_id;";
                    $stmt  = $conn->prepare($query);
                    $stmt->bindParam(':profile_image',$fileDestination,PDO::PARAM_STR);
                    $stmt->bindParam(':user_id',$user_id,PDO::PARAM_INT);
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
}

?>