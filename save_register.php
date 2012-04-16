<?php
	require_once('util.php');
	require_once('db_helper.php');
	
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$repassword = $_REQUEST['repassword'];
	
	$msg = array();
	
	#check the email format
	if(!preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/",$email)){
		array_push($msg, _('Please provide a valid email address!'));
	}
	
	
	if($password != $repassword){
		array_push($msg, _('Password and Confirmed Password are not the same!'));
	}
	
	if(count($msg) > 0){
		message(implode('\n',$msg));
		return redirect('register.php');
	}
	
	$db = getDBInstance();
	$check = checkUserByEmail ( $db, $email, 'normal' );
	if(count($check)>0){
		message(_('This account has been registered!'));
		return redirect('register.php');
	}
	
	$user = addUser($db,$email,$password,null);	
	if($user){
		message(_('Register successfully,please login.'));		
		redirect('login.php');
	}else {
		redirect('register.php');
	}
		
?>