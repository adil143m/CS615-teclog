
{include file="header.tpl" title="miNotes"}

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
{include file="footer.tpl"}
