<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-25 09:16:08
         compiled from ".\templates\admin_signin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19306562abed1808ac3-07279299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0906b93399fdc5249639411c4580663166daf736' => 
    array (
      0 => '.\\templates\\admin_signin.tpl',
      1 => 1445753812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19306562abed1808ac3-07279299',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_562abed1868b96_92094553',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562abed1868b96_92094553')) {function content_562abed1868b96_92094553($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"miNotes"), 0);?>


<div id="container">
    

    
    <div id="notepad">
        <div id="notepad-header" class="header">
        </div>
        <!-- form for admin login-->
        <div align="center">
            <form action="admin_signin.php" method="POST" id="updateForm">
            <div id="tinymce-holder">Username: <input type="text" name="admin_username"></div>
            <br />
            <div id="tinymce-holder"> Password: <input type="password" name="admin_password"></div>
            <br />
            <div id="tinymce-holder"></div> 
            <br />
            <input type="submit" name="adminSignin" value="Signin"/>
            </form>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
