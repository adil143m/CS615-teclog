<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-10-25 09:10:26
         compiled from ".\templates\admin_signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115305629bfd34aee50-60427460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39b182a42b7ca9f48f6adeca3bb8dda175df0c35' => 
    array (
      0 => '.\\templates\\admin_signup.tpl',
      1 => 1445754066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115305629bfd34aee50-60427460',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5629bfd3b02d92_49124404',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5629bfd3b02d92_49124404')) {function content_5629bfd3b02d92_49124404($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"miNotes"), 0);?>


<div id="container">
    

    
    <div id="notepad">
        <div id="notepad-header" class="header">
        </div>



        <!-- form for admin signup contains full name, selected user name, and password twise for compare each others -->
    <div align="center">
        <form action="admin_signup.php" method="POST" id="updateForm">
        <div id="tinymce-holder">Fullname: <input type="text" name="fullname"></div><br />
        <div id="tinymce-holder">Username: <input type="text" name="admin_username"></div><br />
        <div id="tinymce-holder"> Password: <input type="password" name="password1"></div><br />
        <div id="tinymce-holder">Password: <input type="password" name="password2"></div><br />
        <div id="tinymce-holder"></div> 
        <br />
        <input type="submit" name="adminSignup" value="adminSignup"/>
        </form>
    </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
