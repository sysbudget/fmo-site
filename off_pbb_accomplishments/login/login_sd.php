<?php
session_name("pbb");
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>User Login</title>
		<style>
		body {margin:1; font-family:Calibri; font-size:14px;}
		</style>
    </head>
    <body>
		<h1>U.P. Performance Based Bonus Supporting Docs</h1>
        	<h3>Login Area</h3><hr/>
        <form action="login_sd_check.php" method="post" >
            <fieldset id="login">
                <table>
                <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" id="username" name="username" /></td>
				</tr>
                <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" id="password" name="password" /></td>
				</tr>
                <tr>
                <td><input type="submit" value="Login" /></td>
                <td><?php if (isset($error)): ?>
        		<p class="error"><?php echo $error; ?></p>
        		<?php endif; ?>
				</td>
                </tr>
                </table>
            </fieldset>
        <hr/>
        </form>
    </body>
</html>