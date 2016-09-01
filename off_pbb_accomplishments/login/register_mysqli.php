<?php
session_name("pbb");
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

// not logged in, move to login page

header('Location: ../login/login_mysqli.php');

exit;

}

include 'phpass-0.3/PasswordHash.php';

/**
 * Don't use mysql_ functions. These are for MySQL 4.x and have been deprecated
 * since 2004. MySQLi is fine if you know you'll only be using MySQL databases.
 * PDO doesn't tie you to a specific RDBMS.
 */

// connect to the database
include('../connect-db.php');
                        
$sql = new mysqli($server, $user, $pass, $db);
$sql->set_charset("utf8");

// Create an array to catch any errors in the registration form.
$errors = array();

/**
 * Make sure the form has been submitted before trying to process it. This is
 * single most common cause of 'undefined index' notices.
 */

//Constituent University 
 	$query1 = $sql->query("SELECT id, short_name FROM tbl_cu ORDER BY seq_num ASC");
	while($array1[] = $query1->fetch_object());
	array_pop($array1);

if (!empty($_POST))
{
    // First check that required fields have been filled in.
    if (empty($_POST['emp_number']))
    {
        $errors['emp_number'] = "Employee number cannot be empty.";
    }

    if (empty($_POST['first_name']))
    {
        $errors['first_name'] = "Firstname cannot be empty.";
    }

    if (empty($_POST['last_name']))
    {
        $errors['last_name'] = "Lastname cannot be empty.";
    }

    if (empty($_POST['designation']))
    {
        $errors['designation'] = "Designation cannot be empty.";
    }

    if (empty($_POST['telephone']))
    {
        $errors['telephone'] = "Telephone numbers cannot be empty.";
    }

    if (empty($_POST['office']))
    {
        $errors['office'] = "Office cannot be empty.";
    }

    if (empty($_POST['cu']))
    {
        $errors['cu'] = "Constituent Unversity cannot be empty.";
    }

    if (empty($_POST['username']))
    {
        $errors['username'] = "Username cannot be empty.";
    }

    // OPTIONAL
    // Restrict usernames to alphanumeric plus space, dot, dash, and underscore.
    /*
    if (preg_match('/[^a-zA-Z0-9 .-_]/', $_POST['username']))
    {
        $errors['username'] = "Username contains illegal characters.";
    }
    */

    if (empty($_POST['password']))
    {
        $errors['password'] = "Password cannot be empty.";
    }

    /**
     * Note there's no upper limit to password length.
     */
    if (strlen($_POST['password']) < 8)
    {
        $errors['password'] = "Password must be at least 8 charcaters.";
    }

    // OPTIONAL
    // Force passwords to contain at least one number and one special character.
    /*
    if (!preg_match('/[0-9]/', $_POST['password']))
    {
        $errors['password'] = "Password must contain at least one number.";
    }
    if (!preg_match('/[\W]/', $_POST['password']))
    {
        $errors['password'] = "Password must contain at least one special character.";
    }
    */

    if (empty($_POST['password_confirm']))
    {
        $errors['password_confirm'] = "Please confirm password.";
    }

    if ($_POST['password'] != $_POST['password_confirm'])
    {
        $errors['password'] = "Passwords do not match.";
    }

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!$email)
    {
        $errors['email'] = "Not a valid email address.";
    }

    /**
     * Escape the data we're going to use in our query. Never trust user input.
     */
	$emp_number = $sql->real_escape_string($_POST['emp_number']);
	$first_name = $sql->real_escape_string($_POST['first_name']);
	$last_name = $sql->real_escape_string($_POST['last_name']);
	$designation = $sql->real_escape_string($_POST['designation']);
	$telephone = $sql->real_escape_string($_POST['telephone']);
	$office = $sql->real_escape_string($_POST['office']);
	$cu = $sql->real_escape_string($_POST['cu']);
	$username = $sql->real_escape_string($_POST['username']);
    $email    = $sql->real_escape_string($email);
	$pwconfirm = $sql->real_escape_string($_POST['password_confirm']);

    /**
     * Check that the username and email aren't already in our database.
     *
     * Note also the absence of SELECT *
     * Grab the columns you need, nothing more.
     */
    $query  = "SELECT username, email
               FROM tbl_users
               WHERE username = '{$username}' OR email = '{$email}'";
    $result = $sql->query($query);

    /**
     * There may well be more than one point of failure, but all we really need
     * is the first one.
     */
    $existing = $result->fetch_object();

    if ($existing)
    {
        if ($existing->username == $_POST['username'])
        {
            $errors['username'] = "That username is already in use.";
        }
        if ($existing->email == $email)
        {
            $errors['email'] = "That email address is already in use.";
        }
    }
}

/**
 * If the form has been submitted and no errors were detected, we can proceed
 * to account creation.
 */
if (!empty($_POST) && empty($errors))
{
    /**
     * Hash password before storing in database
     */
    $hasher = new PasswordHash(8, FALSE);
    $password = $hasher->HashPassword($_POST['password']);

    $query = "INSERT INTO tbl_users (emp_number, first_name, last_name, designation, telephone, office, cu, username, password, pwconfirm, email, created)
              VALUES ('{$emp_number}', '{$first_name}', '{$last_name}', '{$designation}', '{$telephone}', '{$office}', '{$cu}', '{$username}', '{$password}', '{$pwconfirm}', '{$email}', NOW() )";

    $success = $sql->query($query);

    if ($success)
    {
        $message = "Account created.";
    }
    else
    {
        $errors['registration'] = "Account could not be created. Please try again later.";
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>User Registration</title>
		<style>
		body {margin:1; font-family:Calibri; font-size:14px;}
		</style>
    </head>
    <body>
	    <h2>U.P. Research Projects and Extension Services</h2>
        <h3>Registration Area</h3><hr/>
        <?php if (isset($message)): ?>
        <p class="success"><?php echo $message; ?></p>
        <?php endif; ?>

        <!-- Note that we're again checking that each array key exists before
             trying to use it, in order to prevent undefined index notices. -->
        <?php if (isset($errors['registration'])): ?>
        <p class="error"><?php echo $errors['registration']; ?></p>
        <?php endif; ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset id="registration">
            <table>
              <tr>
                <td><label for="username">Employee Number</label></td>
                <td><input type="text" id="emp_number" name="emp_number" />
                <span class="error">
                    <?php echo isset($errors['emp_number']) ? $errors['emp_number'] : ''; ?>
                </span><br />
                </td>
			  </tr>
              <tr>
                <td><label for="username">Firstname</label></td>
                <td><input type="text" id="first_name" name="first_name" />
                <span class="error">
                    <?php echo isset($errors['first_name']) ? $errors['first_name'] : ''; ?>
                </span><br />
                </td>
			  </tr>
              <tr>
                <td><label for="username">Lastname</label></td>
                <td><input type="text" id="last_name" name="last_name" />
                <span class="error">
                    <?php echo isset($errors['last_name']) ? $errors['last_name'] : ''; ?>
                </span><br />
                </td>
			  </tr>
              <tr>
                <td><label for="username">Designation</label></td>
                <td><input type="text" id="designation" name="designation" />
                <span class="error">
                    <?php echo isset($errors['designation']) ? $errors['designation'] : ''; ?>
                </span><br />
                </td>
			  </tr>
              <tr>
                <td><label for="telephone">Telephone Number</label></td>
                <td><input type="text" id="telephone" name="telephone" />
                <span class="error">
                    <?php echo isset($errors['telephone']) ? $errors['telephone'] : ''; ?>
                </span><br />
                </td>
			  </tr>
              <tr>
			    <td><div align="cu">Constituent University</div></td>
    			<td><select name="cu" size="1" required>
    			<option value="">Please Select :</option>
      				<?php foreach($array1 as $option1) : ?>
      			<option value="<?php echo $option1->id; ?>"><?php echo $option1->short_name; ?></option>
      				<?php endforeach; ?>
     			</select></td>
			  </tr>
              <tr>
                <td><label for="office">Office/Unit</label></td>
                <td><input type="text" id="office" name="office" />
                <span class="error">
                    <?php echo isset($errors['office']) ? $errors['office'] : ''; ?>
                </span><br />
                </td>
			  </tr>
              <tr>
                <td><label for="email">Email Address</label></td>
                <td><input type="text" id="email" name="email" />
                <span class="error">
                    <?php echo isset($errors['email']) ? $errors['email'] : ''; ?>
                </span><br /></td>
			  </tr>
              <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" id="username" name="username" />
                <span class="error">
                    <?php echo isset($errors['username']) ? $errors['username'] : ''; ?>
                </span><br />
                </td>
			  </tr>
              <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" id="password" name="password" />
                <span class="error">
                    <?php echo isset($errors['password']) ? $errors['password'] : ''; ?>
                </span><br /></td>
			   </tr>
               <tr>
                <td><label for="password_confirm">Confirm Password</label></td>
                <td><input type="password" id="password_confirm" name="password_confirm" />
                <span class="error">
                    <?php echo isset($errors['password_confirm']) ? $errors['password_confirm'] : ''; ?>
                </span><br /></td>
				</tr>
                <tr>
                <td><input type="submit" value="Submit" /></td>
                </tr>
            </table>
            </fieldset>

        </form>
    </body>
</html>