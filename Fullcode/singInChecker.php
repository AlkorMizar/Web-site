 <?php 
 	require "database.php" ;
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
	session_start();
	$login=trim($_POST['inputLogin']);
	$password=trim($_POST['inputPassword']);
	unset($_SESSION['errorSingIn']);

	if (!(preg_match('/\w{1,50}/',$login))) {
		$_SESSION['errorSingIn']='Invalid login format';
		header('Location: /singIn.php');
		exit();	
	}
	echo "1";
	if (!initDatabase('table',$link)) {
		echo "2";
        if(!selectPasswords($login,$userPassword,$link)){
	        echo "3";
	        print_r($userPassword);
	        if(count($userPassword)!=1 || !password_verify($password, $userPassword[0]['password'])){
				echo "4";
				$_SESSION['errorSingIn']='Invalid password or login';
				closeDatabase($link);	
				header('Location: /singIn.php');
				exit();
			}elseif (!isUnblocked($login,$link)) {
				closeDatabase($link);
				$_SESSION['errorSingIn']='You are blocked';	
				header('Location: /singIn.php');
				exit();
			}else{
				$_SESSION['user']=$login;
				updateLastEnter($login,$link);
				closeDatabase($link);
				header('Location: /');
				exit();
			}	
        }
        closeDatabase($link);
    }
    $_SESSION['errorSingIn']='Sorry something broke';	
	header('Location: /singIn.php');
	exit();
 ?>