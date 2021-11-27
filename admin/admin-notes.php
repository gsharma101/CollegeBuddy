<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Notes</title>
</head>
<body>
	<p >Download your asseignment</p>
<?php
	if($_SESSION['branch'] == 'cse'){
		echo "You are a cse student";
	}else {
		echo "You are not a cse student";
	}

?>
</body>
</html>