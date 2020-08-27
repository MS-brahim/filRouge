<?php

include_once('../models/users.php');

$user = new User();
if(isset($_POST['register'])){
    $username = $user->santString($_POST['username']);
    $email = $user->santString($_POST['email']);
    $password = $user->santString($_POST['password']);
    // $pw1 = $user->escape_string($_POST['password1']);


    $registerValid = $user->register($username, $password,$email);
     
    if(!$registerValid){
        echo 'Invalid username or password';
        header('location: ../views/register.php');
        
	}
	else{
		$_SESSION['user'] = $registerValid;
		header('location: ../views/login.php');
	}
}

