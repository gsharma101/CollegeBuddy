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
  <title>Ptu Buddy - <?php echo ucfirst($user->fname) . " " . ucfirst($user->lname); ?></title>
  <?php include_once("includes/backHeader.php"); ?>
</head>

<body>
  <?php include_once("includes/profileNevigation.php"); ?>
  <?php include_once("includes/SideNav.php"); ?>
  <div class="container" style="margin-top:5rem;">
    <div class="row">
      <div class="col-md-4">
        <div class="container">
          <div class="card">
            <div class="card-header">
              <form method="post" action="#" enctype="multipart/form-data">
                <a data-toggle="modal" data-target="#changeprofile" class="btn btn-warning btn-sm"><i class="fas fa-camera"></i>&nbsp;Change profile</a>
              </form>
            </div>
            <div class="card-body text-center">
              <img class="" src="<?php echo $user->profile_image; ?>" alt="Avatar" style="width:81.2%;padding:5px; border-radius:5px; margin: 0 auto;">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="container">
          <div class="card">
            <div class="card-header">
              <h4>Profile Details</h4>
            </div>
            <div class="card-body">
              <div class=".table-responsive-md">
                <table class="table table-sm table-borderless table-striped" style="font-size: 18px; font-family: lato;">
                  <tr>
                    <th>NAME</th>
                    <th><?php echo ucfirst($user->fname) . " " . ucfirst($user->lname); ?></th>
                  </tr>
                  <tr>
                    <th>COLLEGE</th>
                    <th><?php echo strtoupper($user->college); ?></th>
                  </tr>
                  <tr>
                    <th>BRANCH</th>
                    <th><?php echo strtoupper($user->branch); ?></th>
                  </tr>
                  <tr>
                    <th>SEMESTER</th>
                    <th><?php echo strtoupper($user->sem); ?></th>
                  </tr>
                  <tr>
                    <th>SECTION</th>
                    <th><?php echo strtoupper($user->section); ?></th>
                  </tr>
                  <tr>
                    <th>ROLL NUMBER</th>
                    <th><?php echo strtoupper($user->uni_roll); ?></th>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="changeprofile">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Profile</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="includes/upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <input type="file" name="file" placeholder="Upload Profile">
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-primary">Upload Profile</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
    include_once('includes/footer.php');
    ?>
  </div>
</body>
<script src="https://kit.fontawesome.com/1b8b2eefd1.js" crossorigin="anonymous"></script>
<script src="assets/js/sidenav.js" crossorigin="anonymous"></script>

</html>