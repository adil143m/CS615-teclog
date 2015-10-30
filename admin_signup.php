<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once "lib/Smarty.class.php";
require_once "database.php";

//connect to our db
$db = new Db();



if(isset($_POST["adminSignup"])){
    
    $db->adminSignup($_POST);
}

$template = new Smarty();
//this session is created when signup was not successful to display error message
// otherwise this message will not displayed
if (isset($_SESSION['admin_signup_error'])) {
	?><div align="center" class="error"><?php echo "password are not matched!"; ?></div><?php
}
$template->display('admin_signup.tpl');

//disconnect 
//$db->disconnect();
?>