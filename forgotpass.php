<!DOCTYPE html>
<html>
<head>
	<title>Campus Ecosystem</title>
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
       <link rel="stylesheet" type="text/css" href="files/css/logs.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="jumbotron">
                <h1 style="text-transform: uppercase; text-align: center; font-family: lato;">Welcome to Campus Ecosystem</h1>
            </div>
        </div>
    </header>
	   <div class="buddy-sign-form">
      <div class="container">
       <h2 class="text-dark" style="text-align: center; font-weight: bold; font-family: arial">Reset Password</h2>
      </div>
      <form method="POST" name="buddy-form-log" action="#">
       <div class="form-group">
           <label for="email">Email or Phone Number</label>
           <input type="text" name="email" placeholder="Enter your email or Phone number" class="form-control" required>
      </div>
      <div class="form-group">
          <input type="submit" id="submit" name="changepass" value="Submit" class="btn btn-success" />
           </form><br>
          <a href="index.php">Have an Account?Log in here</a><br>
            <a href="sign.php">Don't have an account?Sign up here</a>
     </div>
</body>
</html>