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
            <a href="account" class="list-group-item bg-primary text-white">Account Settings</a>
            <a href="changepassword" class="list-group-item">Change Password</a>
            <a href="closeaccount" class="list-group-item">Close Account</a>
          </ul>
        </div>
        <div class="col-md-9 padding-0">
          <div class="container p-3 bg-white">
            <h5 class="text-center text-uppercase">Account Settings</h5>
            <div class="tab-content">
              <div id="home" class="container tab-pane active"><br>
                <div class="container">
                <form method="POST">
                    <div class="form-group">
                        <label><strong>Email</strong></label>
                        <input type="email" class="form-control" name="email" value="<?php echo $user->email; ?>">
                    </div>
                    <div class="form-group">
                        <label><strong>Phone Number</strong></label>
                        <input type="number" class="form-control" name="phone" value="<?php echo $user->user_phone; ?>">
                    </div>
                    <div class="form-group">
                        <label><strong>University Rollnumber</strong></label>
                        <input type="number" class="form-control" name="uni_roll" value="<?php echo $user->uni_roll; ?>">
                    </div>
                    <div class="form-group">
                        <button name="submitAccount" class="btn btn-warning">Update</button>
                    </div>
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