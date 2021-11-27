<?php include_once('core/init.php');?>
<?php include_once('includes/signupScript.php');?>
<!DOCTYPE html>
<html>

<head>
    <title>Ptu BuddY</title>
    <?php include_once("includes/frontHeader.php"); ?>
</head>

<body>
<?php include_once("includes/header.php"); ?>
    <div class="container" style="padding: 20px;">
        <div class="card mx-auto  shadow" style="max-width: 400px; margin-top: 8rem;
    margin-bottom: 8rem;">
            <div class="card-header bg-dark text-white">
                <h4 style="text-align: center; font-family: lato; font-weight: bold;">Welcome to PTU BuddY</h4>
                <p class="text-center">Signup to continue with ptubuddy</p>
                <?php
                if (isset($error)) {
                    echo '<h6 class="text-danger text-center">' . $error . '</h6>';
                }
                ?>
                <form method="POST">
            </div>
            <div class="card-body">
                <div class="row">
                    <div class=" col-sm-6 form-group">
                        <input type="text" name="fname" placeholder="First Name" class=" form-control" required>
                    </div>
                    <div class=" col-sm-6 form-group">
                        <input type="text" name="lname" placeholder="Last Name" class=" form-control" required>
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
                            <option disabled selected>College</option>
                            <option value="cec">CEC</option>
                            <option value="coe">COE</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-sm-6 form-group">
                        <select name="branch" class="form-control" required>
                            <option disabled selected>Branch</option>
                            <option value="cse">CSE</option>
                            <option value="me">ME</option>
                            <option value="it">IT</option>
                            <option value="ece">ECE</option>
                        </select>
                    </div>
                    <div class=" col-sm-6 form-group">
                        <input type="number" min="1" max="8" name="sem" placeholder="Semester" class="form-control" required>
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
                    <p class="text-muted"><small>By clicking Sign Up, you agree to our Terms, Data Policy. You may receive verifiocation email from us.</small></p>
                </div>
                <div class="form-group">
                    <input type="submit" name="login" value="Sign Up" class="btn btn-primary btn btn-block" required>
                    </form><br>
                    <a href="index.php">Have an Account?Log in here</a>
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