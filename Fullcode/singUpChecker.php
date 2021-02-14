<?php 
	require "database.php" ;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

	define("DUPLICATE_IN_SQL",   1062);

	session_start();

	$login=trim($_POST['inputLogin']);
	$email=trim($_POST['inputEmail']);
	$password1=trim($_POST['inputPassword1']);
	$password2=trim($_POST['inputPassword2']);

	unset($_SESSION['errorSingUp']);

	if (!(preg_match("/\w{1,50}$/",$login))) {
		$_SESSION['errorSingUp']='Invalid login format';
		header('Location: /singUp.php');
		exit();	
	}
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$_SESSION['errorSingUp']= "Invalid email format";
		header('Location: /singUp.php');
		exit();
	}
	
	if (!(preg_match("/[\w\.\*-]+$/",$password1))) {
		$_SESSION['errorSingUp']='Invalid password format';
		header('Location: /singUp.php');
		exit();	
	}
	
	if (strcmp($password1,$password2) ) {
		echo "pass3<br>";
		$_SESSION['errorSingUp']="Passwords don't mathc";
		header('Location: /singUp.php');
		exit();
	}

	$password=password_hash($password1, PASSWORD_DEFAULT);

	$_SESSION['errorSingUp']='Sorry something broke'; 
	if (!initDatabase('table',$link)) {

		$error=insertUser($login,$email,$password,$link);
		print_r($error);
		closeDatabase($link);
        
        if($error==0){
        	unset($_SESSION['errorSingUp']);
        	$_SESSION['user']=$login;
			header('Location: /');
			exit();
        }elseif($error===DUPLICATE_IN_SQL){
        	$_SESSION['errorSingUp']='Such email or login already exists';
        }
    }    
	header('Location: /singUp.php');
	exit();	
?>