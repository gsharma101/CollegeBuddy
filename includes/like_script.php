<?php
include_once('../core/init.php');
if(isset($_POST['postid'])){
    
    $postid = $_POST['postid'];
    $get_id = $_POST['userid'];
    $user_id = $_SESSION['userid'];
    $getFromP->addlike($user_id,$postid,$get_id);
}
if(isset($_POST['unlike'])){
    
    $unlike = $_POST['unlike'];
    $get_id = $_POST['userid'];
    $user_id = $_SESSION['userid'];
    $getFromP->dislike($user_id,$unlike,$getid);
}

?>