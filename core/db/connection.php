<?php
$dns = 'mysql:host=localhost;dbname=ptubuddy';
$user = 'root';
$password = '';

date_default_timezone_set('Asia/kolkata');

try{
    $conn = new PDO($dns,$user,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection Error". $e->getMessage();
}
?>