<?php
//start session
session_start();

include_once('../models/users.php');

$user = new User();

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
	$auth = $user->check_login($username, $password);

	if(!$auth){
		$_SESSION['message'] = 'Invalid username or password';
    	header('location:../views/login.php');
	}
	else{
		$_SESSION['user'] = $auth;
		$_SESSION['groupID'] = $grpID;
		if($grpID==1){
			header('location: ../views/admin.php');
		}else{
			header('location: ../views/account.php');
		}
	}
}
else{
	$_SESSION['message'] = 'You need to login first';
	header('location:index.php');
}
?>