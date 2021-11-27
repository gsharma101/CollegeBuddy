<!DOCTYPE html>
<html>
<head>
  <title>Change your password</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="pwdstyle.css">
</head>
<body>
  <section>
        <header>
            <div class="buddy-header">
                    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                        <!--ptubuddy-->
                        <a class="navbar-brand" href="index.php">PTU BuddY</a>
                      
                        <!-- Toggler/collapsibe Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <!-- Navbar links -->
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                          <ul class="navbar-nav" style="font-size: 20px;">
                            <li class="nav-item">
                              <a class="nav-link" href="Teachers/t_index.php">Teacher/Lecturer</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="aboutus.php">About us</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="contactus.php">Contacts</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" target="_blank" href="https://www.youtube.com/channel/UCBwt55ujaLmHtyI8nZ7vrzw">Audiobooks</a>
                            </li>
                          </ul>
                        </div>
                      </nav>
            </div>
        </header>
    </section>
     <?php
     $selector = $_GET["selector"];
     $validator = $_GET["validator"];

     if(empty($selector) || empty($validator)){
        echo "Could not validate your request";
      }else{
        if(ctype_xdigit($selector) !== $selector && ctype_xdigit($validator)!== false){
         echo '  <section>
        <div class="container">
            <div class="card" style="margin: 0 auto; max-width: 500px; margin-top: 20px;">
                <div class="card-header text-center text-white bg-dark p-2 text-uppercase">
                    <h4>Reset your password</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="includes/reset-password.php">
                        <input type="hidden" name="selector" value="<?php echo $selector;?>">
                        <input type="hidden" name="validator" value="<?php echo $validator;?>">
                        <div class="form-group">
                            <input type="password" class="form-control" name="resetnewpwd1" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="resetnewpwd2" placeholder="Conferm Password" required>
                        </div>
                        <button class="btn btn-success" type="submit" name="resetnewpwdbtn">Reset password</button>
                    </form>
                </div>
            </div>
        </div>
    </section>';
      }
    }
     ?>
</body>
</html>
