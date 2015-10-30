<?php 
session_start();
	//if admin is loged in
	if(isset($_SESSION['admin_login']))
	{		
		//unset all sessions created
	 unset($_SESSION['admin_login']);
	 unset($_SESSION['admin_login_error']);
	 unset($_SESSION['admin_signup_error']);
	 header('Location: index.php');
	}
?>



