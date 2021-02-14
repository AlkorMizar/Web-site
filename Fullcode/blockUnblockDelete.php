<?php 
	require "database.php";
	session_start();
	if (!initDatabase('table',$link)) {
    	if(!isUnblocked($_SESSION['user'],$link)){
    		closeDatabase($link);
    		session_destroy();
    		header('Location: /singIn.php');
			exit();	
    	}
    }

	$mode=$_POST['button'];
	$all=isset($_POST['checkAll']);
	$users=$_POST['checkList'];

	if ($mode==1) {
		$doWithUsers='unblock';
	}elseif ($mode==2) {
		$doWithUsers='block';
	}else{
		$doWithUsers='delete';
	}

	initDatabase('table',$link);

	if($all){
		($doWithUsers.'All')($link);
	}else{
		print_r($users);
		foreach ($users as $login) {
			print_r($login.'<br>');
			($doWithUsers.'User')($login,$link);
			if ($login==$_SESSION['user']) {
					print_r($_SESSION['user']);
					session_destroy();
					print_r($_SESSION['user']);
				}	
		}
	}

	header('Location: /');

 ?>