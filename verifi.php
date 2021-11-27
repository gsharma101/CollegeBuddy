<!DOCTYPE html>
<html>

<head>
    <title>Ptu BuddY</title>
    <?php include_once("includes/frontHeader.php"); ?>
</head>

<body>
    <?php include_once("includes/header.php"); ?>
    <div class="container" style="padding: 20px;">
        <div class="card mx-auto shadow" style="max-width: 400px; margin-top: 8rem;
    margin-bottom: 8rem;">
            <div class="card-header bg-dark text-white">
                <h4 style="text-align: center; font-family: lato; font-weight: bold;">Welcome to PTU BuddY</h4>
            </div>
            <div class="card-body">
                <h4 class="text-center">A verification mail has been sent on your registered email</h4>
                <p class="text-center text-danger"><strong>Please verifi your Account</strong></p>
                <a href="index.php" class="btn btn-block btn-primary">Click here to login</a>
            </div>
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