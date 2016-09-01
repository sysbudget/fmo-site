<?php

include 'PasswordHash.php';

/**
 * Don't use mysql_ functions. These are for MySQL 4.x and have been deprecated
 * since 2004. MySQLi is fine if you know you'll only be using MySQL databases.
 * PDO doesn't tie you to a specific RDBMS.
 */
$sql = new PDO('mysql:host=localhost;dbname=database_name;', 'username', 'password');

// Create an array to catch any errors in the registration form.
$errors = array();

/**
 * Make sure the form has been submitted before trying to process it. This is
 * the single most common cause of 'undefined index' notices.
 */
if (!empty($_POST))
{
    // First check that required fields have been filled in.
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
     * Check that the username and email aren't already in our database.
     * Note the use of prepared statements. If you aren't using prepared
     * statements, be sure to escape your data before passing it to the query.
     *
     * Note also the absence of SELECT *
     * Grab the columns you need, nothing more.
     */
    $query = "SELECT username, email
              FROM users
              WHERE username = :username OR email = :email";
    $stmt = $sql->prepare($query);
    $stmt->execute(array(
        ':username' => $_POST['username'],
        ':email' => $email
    ));

    /**
     * There may well be more than one point of failure, but all we really need
     * is the first one.
     */
    $existing = $stmt->fetchObject();

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

    /**
     * I'm going to mention it again because it's important; if you aren't using
     * prepared statements, be sure to escape your data before passing it to
     * your query.
     */
    $query = "INSERT INTO users (username, password, email, created)
              VALUES (:username, :password, :email, NOW())";
    $stmt = $sql->prepare($query);
    $success = $stmt->execute(array(
        ':username' => $_POST['username'],
        ':password' => $password,
        ':email'    => $_POST['email'],
    ));

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

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>User Registration</title>
    </head>
    <body>
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
                <label for="username">Username</label>
                <input type="text" id="username" name="username" />
                <span class="error">
                    <?php echo isset($errors['username']) ? $errors['username'] : ''; ?>
                </span><br />

                <label for="email">Email Address</label>
                <input type="text" id="email" name="email" />
                <span class="error">
                    <?php echo isset($errors['email']) ? $errors['email'] : ''; ?>
                </span><br />

                <label for="password">Password</label>
                <input type="password" id="password" name="password" />
                <span class="error">
                    <?php echo isset($errors['password']) ? $errors['password'] : ''; ?>
                </span><br />

                <label for="password_confirm">Confirm Password</label>
                <input type="password" id="password_confirm" name="password_confirm" />
                <span class="error">
                    <?php echo isset($errors['password_confirm']) ? $errors['password_confirm'] : ''; ?>
                </span><br />

                <input type="submit" value="Submit" />
            </fieldset>
        </form>
    </body>
</html>