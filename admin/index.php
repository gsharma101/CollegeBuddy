<!DOCTYPE html>
<html>
<head>
	<title>Admin Pannel</title>
	<?php include_once("includes/adminFrontHeader.php");?>
	<style type="text/css">
		.error {
			color: red !important;
			text-align: center !important;
		}

		.success-msg {
			color: green !important;
			text-align: center !important;
		}
	</style>
</head>

<body>
<?php include_once("includes/adminHeader.php"); ?>
	<div class="container" style="padding: 20px;">
		<div class="card mx-auto shadow" style="max-width: 400px; margin-top: 8rem;
    margin-bottom: 8rem;">
			<div class="card-header bg-dark text-white">
				<h4 style="text-align: center; font-family: lato; font-weight: bold;">Welcome to PTU BuddY</h4>
				<h6 class="text-warning" style="text-align: center; font-family: lato;">Admin Panel</h6>
				<form method="POST" action="includes/Adminlogin.php">
			</div>
			<div class="card-body">
				<?php
				if (isset($_GET['msg'])) {
					if ($_GET['msg'] == "wrongpwd") {
						echo "<p class='error'><strong>Invalid Email,phone no , rollnumber or password</strong></p>";
					} elseif ($_GET['msg'] == "nouser") {
						echo "<p class='error'><strong>No user exist</strong></p>";
					} else {
						echo "<p class='error'><strong>Please try later</strong></p>";
					}
				}
				?>
				<div class="form-group">
					<input type="text" name="email" placeholder="Email" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Password" class="form-control" required>
				</div>
				<div class="form-group">
					<button class="btn btn-success btn-block" name="login">Log In</button>
					</form>
				</div>
			</div>
			</form>
			<div class="card-footer">
				<h6 class="text-center">Powered by <a href="https://www.cgc.edu.in/" target="_blank">CGC LANDRAN</a></h6>
			</div>
		</div>
	</div>
	<?php
	include_once('../includes/footer.php');
	?>
</body>

</html>