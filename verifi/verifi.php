<?php
     include_once('../core/init.php');
     $selector = $_GET["selector"];
     $validator = $_GET["validator"];
     $email = $_GET['email'];
     $verifi = 1;

     if(empty($selector) || empty($validator)){
        echo "Cannot verifi your email account";
      }else{
        if(ctype_xdigit($selector) !== $selector && ctype_xdigit($validator)!== false){
        $query = "UPDATE buddy_email_verifi SET verification_status=:account_status WHERE email=:email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':account_status',$verifi,PDO::PARAM_INT);
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->execute();
        mkdir("../students/$email");
        header("Location: ../index.php?verifi=success");
        exit();
      }
    }
?>