
{include file="header.tpl" title="miNotes"}

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

{include file="footer.tpl"}
