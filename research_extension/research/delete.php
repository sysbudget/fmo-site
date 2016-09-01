<?php
session_name("research_extension");
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

// not logged in, move to login page

header('Location: ../login/login_mysqli.php');

exit;

}

		// connect to the database
			include('../connect-db.php');
        
        // confirm that the 'id' variable has been set
        if (isset($_GET['id']) && is_numeric($_GET['id']))
        {
                // get the 'id' variable from the URL
                $rid = $_GET['id'];
                
				// delete record from database
                if ($stmt = $mysqli->prepare("DELETE FROM tbl_research_main_raw WHERE rid = ? LIMIT 1"))
                {
                        $stmt->bind_param("i",$rid);     
                        $stmt->execute();
                        $stmt->close();
                }
                else
                {
                        echo "ERROR: could not prepare SQL statement.";
                }
                $mysqli->close();
                
                // redirect user after delete is successful
                header("Location: view.php");
        }
        else
        // if the 'id' variable isn't set, redirect the user
        {
                header("Location: view.php");
        }

?>