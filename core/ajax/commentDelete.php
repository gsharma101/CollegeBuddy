<?php
include_once('../init.php');
$getFromU->preventAccess($_SERVER['REQUEST_METHOD'] ,realpath(__FILE__),realpath($_SERVER['SCRIPT_FILENAME']));
if(isset($_POST['commentid']) && !empty($_POST['commentid'])){
    $commentID = $_POST['commentid'];
    $user_id = @$_SESSION['userid'];
    $query = "DELETE FROM comments WHERE comment_id=:comment_id AND comment_by=:comment_by";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":comment_id",$commentID,PDO::PARAM_INT);
    $stmt->bindParam(":comment_by",$user_id,PDO::PARAM_INT);
    $stmt->execute();
}
?>