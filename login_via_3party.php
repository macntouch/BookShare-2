<?php 
	require_once('util.php');
	require_once 'sns/google.php';
	
	if($_REQUEST['v']=='GOOGLE'){	
		$g = new GoogleUtil ( WEBSITE_URL . '/login_via_3party_callback.php' );
		return redirect($g->authURL());

	}elseif ($_REQUEST['v']=='FACEBOOK') {
		echo 'facebook';
	}elseif ($_REQUEST['v']=='YAHOO') {
		echo 'yahoo';
	}elseif ($_REQUEST['v']=='QQ') {
		echo 'qq';
	}else{
		message(_("Don't support such login method now!"));
		redirect('login.php');
	}
?>