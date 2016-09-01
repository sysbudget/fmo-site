<?php
session_name("pbb");
session_start();

// User is already logged in. Redirect them somewhere useful.
if (isset($_SESSION['user_id']))
{
    header('Location: ../blank.php');
    exit();
}

// tracy commented out next line
// include 'phpass-0.3/PasswordHash.php';

// connect to the database
include('../connect-db.php');

// tracy commented out next 3 lines                        
// $sql = new mysqli($server, $user, $pass, $db);
// $sql->set_charset("utf8");
// $hasher = new PasswordHash(8, FALSE);

if (!empty($_POST))
{
    // Again, never trust user input!
	// tracy changed next line
	// $username = $sql->real_escape_string($_POST['username']);
	$username = mysql_entities_fix_string($mysqli, $_POST['username']);
	
	// tracy added next line
	$password = mysql_entities_fix_string($mysqli, $_POST['password']);

    $query = "SELECT sd_users_id,
					unit_contributor_id,
					unit_delivery_id,
					focal_person_id,
					cu_id,
					cu_short_name,
					unit_delivery_name_cu,
					unit_contributor_name,
					unit_delivery_name_short,
					unit_contributor_name_short,
					sd_users_username,
					sd_users_password,
					cutOffDate_id,
					t_startDate,
					a_cutOffDate_contributor,
					a_cutOffDate_delivery,
					a_cutOffDate_fp,
					a_cutOffDate_remarks,
					UNIX_TIMESTAMP() AS salt
					FROM tbl_sd_users WHERE sd_users_username = '$username';";

	// tracy changed next line			
	// $user = $sql->query($query)->fetch_object();
	$user = $mysqli->query($query)->fetch_object();
     /**
     * Check that the query returned a result (otherwise user doesn't exist)
     * and that provided password is correct.
     */
    // 3c2c changed next line
	// if ($user && $user->sd_users_password == $hasher->CheckPassword($_POST['password'], $user->sd_users_password))
    if ($user && ($username == $user->sd_users_username) && ($password == $user->sd_users_password))
    {
        /**
         * Set cookies here if/as needed.
         * Set session data as needed. DO NOT store user's password in
         * cookies or sessions!
         * Redirect the user if/as required.
         */

		session_regenerate_id();
        $_SESSION['user_id']       				= $user->sd_users_id;
        $_SESSION['user_id']       				= TRUE;
		$_SESSION['authenticated'] 				= TRUE;
	    $_SESSION['signature']     				= md5($user->id . $_SERVER['HTTP_USER_AGENT'] . $user->salt);
	    $_SESSION['unit_contributor_id']		= $user->unit_contributor_id;
	    $_SESSION['unit_delivery_id'] 	   		= $user->unit_delivery_id;
	    $_SESSION['focal_person_id']			= $user->focal_person_id;
	    $_SESSION['cu_id']	 	   				= $user->cu_id;
	    $_SESSION['cu_short_name'] 				= $user->cu_short_name;
	    $_SESSION['unit_delivery_name_cu'] 		= $user->unit_delivery_name_cu;
	    $_SESSION['unit_contributor_name'] 		= $user->unit_contributor_name;
	    $_SESSION['sd_users_username'] 			= $user->sd_users_username;
	    $_SESSION['cutOffDate_id']				= $user->cutOffDate_id;
	    $_SESSION['t_startDate'] 	   			= $user->t_startDate;
	    $_SESSION['a_cutOffDate_contributor']	= $user->a_cutOffDate_contributor;
	    $_SESSION['a_cutOffDate_delivery']	 	= $user->a_cutOffDate_delivery;
	    $_SESSION['a_cutOffDate_fp'] 			= $user->a_cutOffDate_fp;
	    $_SESSION['a_cutOffDate_remarks'] 		= $user->a_cutOffDate_remarks;

	    $_SESSION['unit_delivery_name_short'] 	= $user->unit_delivery_name_short;
	    $_SESSION['unit_contributor_name_short']= $user->unit_contributor_name_short;

		// tracy added next line
		$mysqli->close();
		
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
		
		// tracy added next line
		$mysqli->close();
    }
}

// tracy added next function (1 of 2) for sanitizing user input
function mysql_entities_fix_string($conn, $string)
{
	return htmlentities(mysql_fix_string($conn, $string));
}

// tracy added next function (2 of 2) for sanitizing user input
function mysql_fix_string($conn, $string)
{
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return $conn->real_escape_string($string);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>UP PBB Accomplishments</title>
		<style>
		body {margin:1; font-family:Calibri; font-size:14px;}
		</style>
		<script>
			<!-- Added next js function by tracy July 29 2016 to break out of iframe (see body onload) -->
			function breakout()
			{
				if (window.top != window.self) {
					window.top.location = "login_mysqli.php";
				}
			}
		</script>
    </head>
    <body onload="breakout()">
		<h1>U.P. Performance-Based Bonus Accomplishments</h1>
        	<h3>Login Area</h3><hr/>
        <form action="login_mysqli.php" method="post" target="_top">
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