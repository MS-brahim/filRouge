<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:index.php');
}

include_once('../models/users.php');

$user = new User();

//fetch user data
$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
$row = $user->details($sql);
if($row['groupID']==1){
	header('location: admin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
</head>
<body>
	<?php include_once "includes/navbar.php"?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h2>Welcome to account </h2>
				<h4>User Info: </h4>
				<p>Email: <?php echo $row['email']; ?></p>
				<p>Username: <?php echo $row['username']; ?></p>
				<p>Password: <?php echo $row['password']; ?></p>
				<p>group: <?php echo $row['groupID']; ?></p>
				<a href="../controllers/logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
			</div>
		</div>
	</div>
	<?php 
    include_once "includes/footer.php";
    
    // Optional JavaScript 
    // jQuery first, then Popper.js, then Bootstrap JS 
    include_once "includes/scripts.php";
    ?>
</body>
</html>