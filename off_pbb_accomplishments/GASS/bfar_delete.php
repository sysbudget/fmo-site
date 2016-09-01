<?php
session_name("pbb");
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
                $gass_formb_bfar_id = $_GET['id'];
                
				// delete record from database
                if ($stmt = $mysqli->prepare("DELETE FROM tbl_sd_7_gass_formb_bfar WHERE gass_formb_bfar_id = ? LIMIT 1"))
                {
                        $stmt->bind_param("i",$gass_formb_bfar_id);     
                        $stmt->execute();
                        $stmt->close();
                }
                else
                {
                        echo "ERROR: could not prepare SQL statement.";
                }
                $mysqli->close();
                
                // redirect user after delete is successful
                header("Location: ../GASS/bfar_view_per_page.php");
        }
        else
        // if the 'id' variable isn't set, redirect the user
        {
                header("Location: mfo.php");
        }

?>