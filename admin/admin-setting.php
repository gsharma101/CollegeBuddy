<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Setting/<?php echo ucfirst($_SESSION['Fname']).' '.ucfirst($_SESSION['Lname'])?></title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="files/css/style.css">
    <link rel="stylesheet" type="text/css" href="files/css/side-navigation.css">
    <link rel="stylesheet" type="text/css" href="files/css/media-query.css">
    <style type="text/css">
       .info{
            color: white;
            margin-top: 20px;
       }
    </style>
</head>
<body>
<section>
    <nav>
        <ul class="buddy-hed-li">
            <li><a href="profile.php">PTU BuddY</a></li>
            <li>
                <form method="POST" action="#" >
                    <input class="buddy-search" type="text" name="Search" placeholder="Search">
                </form>
            </li>
            <li class="buddy-hed-right"><a href="#">Notification</a></li>
            <li class="buddy-hed-right"><a href="#">Settings</a></li>
            <li class="buddy-hed-right"><a href="profile-setting.php">Profile</a></li>
        </ul>
    </nav>
</section>
<div class="container">
    <div class="bg-dark" class="profile-header">
        <div class="row">
            <img class="card-img-top" src="files/css/img_avatar2.png" alt="Avatar" style="width:30%">
        <div style="margin: 0 auto;">
            <table class="table table-dark info table-hover">
                <tr>
                    <th>NAME</th>
                    <th><?php echo strtoupper($_SESSION['Fname'])."&nbsp;&nbsp;".strtoupper($_SESSION['Lname'])?></th>
                </tr>
                <tr>
                    <th>COLLEGE</th>
                    <th><?php echo strtoupper($_SESSION['college'])?></th>
                </tr>
                <tr>
                    <th>BRANCH</th>
                    <th><?php echo strtoupper($_SESSION['branch'])?></th>
                </tr>
                <tr>
                    <th>SEMESTER</th>
                    <th><?php echo strtoupper($_SESSION['sem'])?></th>
                </tr>
                <tr>
                    <th>SECTION</th>
                    <th><?php echo strtoupper($_SESSION['section'])?></th>
                </tr>
                <tr>
                    <th>ROLL NUMBER</th>
                    <th><?php echo strtoupper($_SESSION['rollNo'])?></th>
                </tr>
            </table>
        </div>
    </div>
</div>
</html>