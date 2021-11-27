<?php
include_once('core/init.php');
$user_id = @$_SESSION['userid'];
$user = $getFromU->UserData($user_id);
if ($getFromU->loggedIn() === false) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ptu Buddy - Settings</title>
    <?php include_once("includes/backHeader.php"); ?>
    <style>
        .padding-0 {
            padding-right: 0;
            padding-left: 0;
        }
    </style>
</head>

<body>
    <?php include_once("includes/profileNevigation.php"); ?>
    <?php include_once("includes/SideNav.php"); ?>
    <div class="container-fluid" style="margin-top:5rem;">
        <div class="container bg-white">
            <div class="row">
                <div class="col-md-3 list-group-flush padding-0">
                    <ul class="list-group">
                        <a href="settings" class="list-group-item">General Settings</a>
                        <a href="account" class="list-group-item">Account Settings</a>
                        <a href="changepassword" class="list-group-item">Change Password</a>
                        <a href="closeaccount" class="list-group-item bg-primary text-white">Close Account</a>
                    </ul>
                </div>
                <div class="col-md-9 padding-0">
                    <div class="container p-3 bg-white">
                        <h5 class="text-center text-uppercase">Close Account</h5>
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                                <div class="container">
                                    <h5><span class="badge badge-secondary">Desable my account</span></h5>
                                    <h6>Temporarily Desable my account. You can later active your account when ever you want</h6>
                                    <form>
                                        <div class="form-group">
                                            <input class="form-control" name="desable" type="password" placeholder="Enter your password" require>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary">Desable Account</button>
                                        </div>
                                    </form>
                                    <hr style=" color:black; font-weight:bold;">
                                    <h5><span class="badge badge-secondary">Permanently Delete My Account</span></h5>
                                    <h6>By Permanently deleating your account you will lost all your data.</h6>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <button class="btn btn-danger btn-sm-block">Delete Account</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<script src="https://kit.fontawesome.com/1b8b2eefd1.js" crossorigin="anonymous"></script>
<script src="assets/js/sidenav.js" crossorigin="anonymous"></script>

</html>