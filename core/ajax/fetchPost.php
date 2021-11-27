<?php
include_once('../init.php');
$getFromU->preventAccess($_SERVER['REQUEST_METHOD'] ,realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));
if(isset($_POST['fetchPost']) && !empty($_POST['fetchPost'])){
    $user_id = @$_SESSION['userid'];
    $limit = (int) trim($_POST['fetchPost']);
    $getFromP->posts($user_id,$limit);
}
?>