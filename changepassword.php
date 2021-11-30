<?php
include_once('core/init.php');
$user_id = @$_SESSION['userid'];
$user = $getFromU->UserData($user_id);
if ($getFromU->loggedIn() === false) {
    header("Location: index.php");
    exit();
}
include_once('includes/changePasswordscript.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Campus Ecosystem - Settings</title>
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
                        <a href="changepassword" class="list-group-item bg-primary text-white">Change Password</a>
                        <a href="closeaccount" class="list-group-item">Close Account</a>
                    </ul>
                </div>
                <div class="col-md-9 padding-0">
                    <div class="container p-3 bg-white">
                        <h5 class="text-center text-uppercase">Change Password</h5>
                        <?php if (isset($error)) {
                            echo '<h6 class="alert text-center alert-danger">' . $error . '</h6>';
                        }
                        ?>
                        <?php if (isset($successMsg)) {
                            echo '<h6 class="alert text-center alert-success">' . $successMsg . '</h6>';
                        }
                        ?>
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                                <div class="container">
                                    <form id="change_password" class="form-group p-3" method="POST">
                                        <div class="form-group">
                                            <input type="password" name="cpassword" class="form-control" placeholder="Current password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="newpassword" class="form-control" placeholder="New password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="renewpassword" class="form-control" placeholder="Re-enter New password" required>
                                        </div>
                                        <button class="btn btn-success" name="changepwd">Change password</button>
                                    </form>
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