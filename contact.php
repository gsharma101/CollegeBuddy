<?php include_once('includes/contactScript.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Campus Ecosystem</title>
    <?php include_once("includes/frontHeader.php"); ?>
    <link rel="stylesheet" href="assets/css/contact.css">
</head>

<body>
    <?php include_once("includes/header.php"); ?>
    <section>
      <div class="container-fluid">
        <div class="jumbotron">
          <h1 class="text-uppercase" style="text-align: center;">contacts</h1>
          <hr>
        </div>
        <div class="container shadow contact-form" style="max-width:900px;">
            <form method="POST">
              <h3 class="message text-uppercase">Drop Us a Message</h3>
              <div class="contact-image">
                <img src="assets/images/logo.png" alt="rocket_contact">
            </div>
               <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message" style="width: 100%; height: 150px; resize: none;" required></textarea>
                        </div>
                        <div class="form-group">
                            <button name="contactus" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </form>
</div>
      </div>
    </section>
    <?php
    include_once('includes/footer.php');
    ?>
</body>

</html>