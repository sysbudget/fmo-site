<?php
session_name("research_extension");
session_start();

// User is already logged in. Redirect them somewhere useful.
if (isset($_SESSION['user_id']))
{
    header('Location: ../blank.php');
    exit();
}

include 'phpass-0.3/PasswordHash.php';

// connect to the database
	include('../connect-db.php');
                        
$sql = new mysqli($server, $user, $pass, $db);
$sql->set_charset("utf8");

$hasher = new PasswordHash(8, FALSE);

if (!empty($_POST))
{
    // Again, never trust user input!
    $username = $sql->real_escape_string($_POST['username']);

    $query = "SELECT id, first_name, last_name, username, password, cu, UNIX_TIMESTAMP(created) AS salt
              FROM tbl_users
              WHERE username = '{$username}'";
    $user = $sql->query($query)->fetch_object();

	$query1 = "SELECT tbl_ay.acad_yr 
			   FROM tbl_ay
			   ORDER BY acad_yr DESC LIMIT 1";
    $ay_data = $sql->query($query1)->fetch_object();

    /**
     * Check that the query returned a result (otherwise user doesn't exist)
     * and that provided password is correct.
     */
    if ($user && $user->password == $hasher->CheckPassword($_POST['password'], $user->password))
    {
        /**
         * Set cookies here if/as needed.
         * Set session data as needed. DO NOT store user's password in
         * cookies or sessions!
         * Redirect the user if/as required.
         */
		
		session_regenerate_id();
        $_SESSION['user_id']       = $user->id;
        $_SESSION['user_id']       = TRUE;
		$_SESSION['authenticated'] = TRUE;
        $_SESSION['signature']     = md5($user->id . $_SERVER['HTTP_USER_AGENT'] . $user->salt);
	    $_SESSION['user_cu'] 	   = $user->cu;
	    $_SESSION['user_name'] 	   = $user->username;
	    $_SESSION['first_name']	   = $user->first_name;
	    $_SESSION['last_name'] 	   = $user->last_name;

	    $_SESSION['acad_yr'] 	   = $ay_data->acad_yr;

		header('Location: ../index.php');

    }
    /**
     * Don't provide specific details as to whether username or password was
     * incorrect. If an attacker knows they've found a valid username, you've
     * just made their life easier.
     */
    else
    {
        $error = "Login failed.";
    }
}

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
		<h1>U.P. Recognized Research Projects and Extension Services</h1>
        	<!--<h2>NOTE: Server is Closed </br> Final Report Generated March 24, 2015 </h2>-->
        	<h3>Login Area</h3><hr/>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
        <h2>Server is OPEN  for viewing 24/7<br />Final report generated March 8, 2016</h2>
        </form>
    </body>
</html>