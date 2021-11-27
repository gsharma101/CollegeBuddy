<?php
include_once('../../core/init.php');
$admin_id = $_SESSION['adminid'];
if(isset($_POST['post_submit'])){
    $name = "Admin";
    $post_area = $getFromU->InputValidateEmail($_POST['post_area']);
    $posted_on = date('d M Y h:ia');
    $getFromA->create('posts',array('posted_by'=>$admin_id ,'name'=>$name,'body'=>$post_area,'posted_on'=>$posted_on));
    header("Location: ../admin_profile.php");
    exit();
}
?>