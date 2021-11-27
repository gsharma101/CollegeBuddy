<?php
include_once('../core/init.php');

if(isset($_POST['forgotpass'])){
 
 $selector = bin2hex(random_bytes(8));
 $token = random_bytes(32);

 $url = "www.ptubuddy.com/forggotenpassword/user_password.php?selector=". $selector."validator=".bin2hex($token);

 $expires = date("U")+1800;

 $email = $getFromU->InputValidate($_POST['email']);

 $query = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
 $stmt  = $conn->prepare($query);
 $stmt->bind_param('s',$email);
 $stmt->execute();

 $query = "INSERT INTO pwdReset (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires
) VALUES (?,?,?,?);";
 $hashedToken = password_hash($token, PASSWORD_DEFAULT);//error1
 $stmt  = $conn->prepare($query);
 $stmt->bind_param('ssss',$email,$selector,$hashedToken,$expires);
 $stmt->execute();
 $stmt->close();

 $to = $email;

 $subject = 'Reset your password for ptubuddy';

 $message = '<p><strong>We received a password reset request. The link to reset your password
 make this request, you can ignore this email</strong></p>';

 $message .='<p>Here is your password reset link: <br></p>';

 $message .='<a href="'.$url.'">'.$url.'</a></p>';

 $headers = "From: ptubuddy <ptubuddy@booknerd.in>\r\n";

 $headers .= "Reply-To: ptubuddy ptubuddy@booknerd.in\r\n";

 $headers .= "Content-type: text/html\r\n";

 mail($to,$subject,$message,$headers);

 header("Location: forgotpass.php?reset=success");
 exit();

}else{
  header('location: index.php');
  exit();
}
?>