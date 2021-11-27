<?php
if (isset($_POST['update_general'])) {
    $fname = $getFromU->InputValidate($_POST['fname']);
    $lname = $getFromU->InputValidate($_POST['lname']);
    $college = $getFromU->InputValidate($_POST['college']);
    $branch = $getFromU->InputValidate($_POST['branch']);
    $sem = $getFromU->InputValidate($_POST['sem']);
    $section = $getFromU->InputValidate($_POST['sec']);

    if (!preg_match("/^[a-zA-Z]+$/", $fname) || !preg_match("/^[a-zA-Z]+$/", $lname)) {
        $error = "Please enter a valid name";
    }elseif(!preg_match("/^[a-gA-G1-2].$/", $section)){
        $error = "Please enter a valid section";
    } else {
        $query = "UPDATE student_info SET fname=:fname,lname=:lname,college=:college,branch=:branch,sem=:sem,section=:section WHERE user_id=:user_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
        $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
        $stmt->bindParam(":college", $college, PDO::PARAM_STR);
        $stmt->bindParam(":branch", $branch, PDO::PARAM_STR);
        $stmt->bindParam(":sem", $sem, PDO::PARAM_INT);
        $stmt->bindParam(":section", $section, PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $successMsg = "Updated Successfully";
    }
}
