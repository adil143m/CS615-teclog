<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once "lib/Smarty.class.php";
require_once "database.php";

//connect to our db
$db = new Db();

if(isset($_POST["adminSignin"])){
    $db->adminSignin($_POST);
}

$template = new Smarty();
//if admin login was not success so there created this session to display error message otherwise not dispaly this message
if (isset($_SESSION['admin_login_error'])) {
	?><div align="center" class="error"><?php echo "username or password are not matched!"; ?></div><?php
}

$template->display('admin_signin.tpl');


//disconnect 
//$db->disconnect();
?>