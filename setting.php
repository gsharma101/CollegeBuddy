<?php
include_once('core/init.php');
$user_id = @$_SESSION['userid'];
$user = $getFromU->UserData($user_id);
if ($getFromU->loggedIn() === false) {
  header("Location: index.php");
  exit();
}
include_once('includes/generalScript.php');
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
            <a href="settings" class="list-group-item bg-primary text-white">General Settings</a>
            <a href="account" class="list-group-item">Account Settings</a>
            <a href="changepassword" class="list-group-item">Change Password</a>
            <a href="closeaccount" class="list-group-item">Close Account</a>
          </ul>
        </div>
        <div class="col-md-9 padding-0">
          <div class="container p-3 bg-white">
            <h5 class="text-center text-uppercase">General Settings</h5>
            <?php if(isset($error)){
              echo '<h6 class="alert text-center alert-danger">'.$error.'</h6>';
            }
            ?>
            <?php if(isset($successMsg)){
              echo '<h6 class="alert text-center alert-success">'.$successMsg.'</h6>';
            }
            ?>
            <div class="tab-content">
              <div id="home" class="container tab-pane active"><br>
                <div class="container">
                  <form id="general_settings" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <strong><label>First Name</label></strong>
                          <input type="text" value="<?php echo $user->fname; ?>" class="form-control" name="fname">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <strong><label>Last Name</label></strong>
                          <input type="text" value="<?php echo $user->lname; ?>" class="form-control" name="lname">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <strong><label for="college">College</label></strong>
                      <select name="college" class="form-control" required>
                        <option selected value="<?php echo strtoupper($user->college); ?>"><?php echo strtoupper($user->college); ?></option>
                        <option value="cec">CEC</option>
                        <option value="coe">COE</option>
                      </select>
                    </div>
                    <div class="row">
                      <div class=" col-sm-6 form-group">
                        <strong><label for="branch">Branch</label></strong>
                        <select name="branch" class="form-control" required>
                          <option value="<?php echo strtoupper($user->branch); ?>" selected><?php echo strtoupper($user->branch); ?></option>
                          <option value="cse">CSE</option>
                          <option value="me">ME</option>
                          <option value="it">IT</option>
                          <option value="ece">ECE</option>
                        </select>
                      </div>
                      <div class=" col-sm-6 form-group">
                        <strong><label for="sem">Semester</label></strong>
                        <input type="number" name="sem" min="1" max="8" value="<?php echo $user->sem; ?>" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <strong><label for="sec">Section</label></strong>
                      <input type="text" name="sec" value="<?php echo strtoupper($user->section); ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="update_general" class="btn btn-warning">Update</button>
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