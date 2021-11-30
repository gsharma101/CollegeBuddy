<!DOCTYPE html>
<html>

<head>
    <title>Campus Ecosystem</title>
    <?php include_once("includes/frontHeader.php"); ?>
</head>

<body>
    <?php include_once("includes/header.php"); ?>
    <div class="container" style="padding: 20px;">
        <div class="card mx-auto" style="max-width: 400px; margin-top: 8rem;
    margin-bottom: 8rem;">
            <div class="card-header bg-dark text-white">
                <h4 style="text-align: center; font-family: lato; font-weight: bold; text-transform: uppercase;">reset password</h4>
                <p style="text-align: center;">Reset your password</p>
                <form method="POST" name="buddy-form-log" action="includes/forgotpass_script.php">
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" name="email" placeholder="Enter your email" class="form-control" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block" name="login">Send email</button>
                    </form><br>
                    <a href="index.php">Have an account.Login here</a><br>
                    <a href="signup.php">Don't have an account?Sign up here</a>
                </div>
            </div>
            </form>
            <div class="card-footer">
                <h6 class="text-center">Powered by <a href="https://www.cgc.edu.in/" target="_blank">CGC LANDRAN</a></h6>
            </div>
        </div>
    </div>
    <?php
    include_once('includes/footer.php');
    ?>
</body>

</html>