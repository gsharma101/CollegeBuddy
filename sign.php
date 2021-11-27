<?php
require_once('connection.php');
require_once('function.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>PTU BuddY</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- Latest compiled and minified CSS -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

       <!-- jQuery library -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

       <!-- Popper JS -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

       <!-- Latest compiled JavaScript -->
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
       <link rel="stylesheet" type="text/css" href="files/css/logs.css">
       <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap" rel="stylesheet">
</head>
<body>
     <div class="container-fluid">
            <div class="jumbotron">
                <h1 style="text-transform: uppercase; text-align: center; font-family: lato;">Welcome to PTU BuddY</h1>
            </div>
     </div>
    <div class="buddy-sign-form">
      <div class="container">
        <p>Sign up for PTU BuddY</p>
         <?php 
         if(isset($_GET['msg'])){
            if($_GET['msg']=="invalidemail"){
              echo "<p class='error'><strong>Invalid Email</strong></p>";
            }elseif ($_GET['msg']=="passwordshort") {
              echo "<p class='error'><strong>Password is to short</strong></p>";
            }elseif($_GET['msg']=="invalidroll"){
              echo "<p class='error'><strong>Incorrect Rollno</strong></p>";
            }elseif ($_GET['msg']=="passwordnotmatch") {
              echo "<p class='error'><strong>Password not matched</strong></p>";
            }elseif ($_GET['msg']=="emailtaken") {
              echo "<p class='error'><strong>Email already exist</strong></p>";
            }elseif ($_GET['msg']=="invalidsection") {
              echo "<p class='error'><strong>Invalid section</strong></p>";
            }elseif ($_GET['msg']=="success") {
               echo "<p class='success-msg'><strong>Registration Successfull</strong></p>";
            }else{
                echo "<p class='error'><strong>Please try later</strong></p>";
            }
         }

          ?>
      </div>
      <form method="POST" name="buddy-form-log" action="action.php">
        <div class="row">
             <div class=" col-sm-6 form-group">
                  <input type="text" name="fname" placeholder="First Name" class="form-control" required>
             </div>
             <div class=" col-sm-6 form-group">
                  <input type="text" name="lname" placeholder="Last Name" class="form-control" required>
             </div>
        </div>
        <div class="row">
             <div class=" col-sm-6 form-group">
                  <input type="email" name="email" placeholder="Email" class="form-control" required>
             </div>
             <div class=" col-sm-6 form-group">
                  <input type="text" name="phoneN" placeholder="Phone Number" class="form-control" required>
             </div>
        </div>
        <div class="row">
             <div class=" col-sm-6 form-group">
                  <input type="text" name="uni_roll" placeholder="University Rollno" class="form-control" required>
             </div>
             <div class=" col-sm-6 form-group">
                  <select name="college" class="form-control" required>
                    <option value="" disabled selected >College</option>
                    <option value="cec">CEC</option>
                    <option value="coe">COE</option>
                  </select>
             </div>
        </div>
         <div class="row">
             <div class=" col-sm-6 form-group">
                   <select name="branch" class="form-control" required>
                    <option value="" disabled selected >Branch</option>
                    <option value="cse">CSE</option>
                    <option value="me">ME</option>
                    <option value="it">IT</option>
                    <option value="ece">ECE</option>
                  </select>
             </div>
             <div class=" col-sm-6 form-group">
                  <select name="sem" class="form-control" required>
                    <option value="" disabled selected >Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
             </div>
        </div>
        <div class="form-group">
            <input type="text" name="sec" placeholder="Section" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="password" name="password2" placeholder="Confirm Password" class="form-control" required>
        </div>
      <div class="form-group">
          <input type="submit"name="login" value="Submit"class="btn btn-success" required>
      </form><br>
          <a href="index.php">Have an Account?Log in here</a>
     </div>
</body>
</html>
