<?php 

	function initDatabase($table,&$link){
		$link = mysqli_connect('localhost','phpmyadmin','password',$table);
		return mysqli_connect_errno($link);
	};

	function closeDatabase($link){
		return mysqli_close($link);
	}

	function insertUser($login,$email,$password,$link){
		$query ="INSERT INTO users ( login,email, password) VALUES ('$login','$email','$password')" ;
    	mysqli_query($link, $query);
    	return  mysqli_errno($link);
	}

	function selectPasswords($login,&$password,$link){
		$query ="SELECT password FROM users WHERE  login = '$login' " ;
    	$password=mysqli_fetch_all(mysqli_query($link, $query),MYSQLI_ASSOC); 
    	return mysqli_errno($link);
	}

	function isUnblocked($login,$link){
		$query ="SELECT status FROM users WHERE  login = '$login' " ;
    	$user=mysqli_fetch_all(mysqli_query($link, $query),MYSQLI_ASSOC);
    	return (!mysqli_errno($link) && count($user)==1 && $user[0]['status']=='Free');    	
	}

	function updateLastEnter($login,$link){
		$query ="UPDATE users SET dateOfLastEnter = NOW() WHERE login = '$login'" ;
    	mysqli_query($link, $query); 
    	return mysqli_errno($link);
	}

	function getForTable($link,&$users){
		$query ="SELECT login,email,dateOfReg,dateOfLastEnter,status FROM users";
		$users=mysqli_fetch_all(mysqli_query($link, $query),MYSQLI_ASSOC); 
		return mysqli_errno($link);
	}

	function deleteUser($login,$link){
		$query ="DELETE FROM users WHERE login = '$login'";
		$users=mysqli_fetch_all(mysqli_query($link, $query),MYSQLI_ASSOC); 
		return mysqli_errno($link);	
	}

	function deleteAll($link){
		$query ="DELETE FROM users";
		$users=mysqli_fetch_all(mysqli_query($link, $query),MYSQLI_ASSOC); 
		return mysqli_errno($link);	
	}

	function blockUser($login,$link){
		$query ="UPDATE users SET status='Blocked' WHERE login = '$login'";
		$users=mysqli_fetch_all(mysqli_query($link, $query),MYSQLI_ASSOC); 
		return mysqli_errno($link);	
	}

	function blockAll($link){
		$query ="UPDATE users SET status='Blocked'";
		$users=mysqli_fetch_all(mysqli_query($link, $query),MYSQLI_ASSOC); 
		return mysqli_errno($link);	
	}

	function unblockUser($login,$link){
		$query ="UPDATE users SET status='Free' WHERE login = '$login'";
		$users=mysqli_fetch_all(mysqli_query($link, $query),MYSQLI_ASSOC); 
		return mysqli_errno($link);	
	}

	function unblockAll($link){
		$query ="UPDATE users SET status='Free'";
		$users=mysqli_fetch_all(mysqli_query($link, $query),MYSQLI_ASSOC); 
		return mysqli_errno($link);	
	}
    
 ?>