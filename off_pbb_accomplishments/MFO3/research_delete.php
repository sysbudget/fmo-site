<?php
session_name("pbb");
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

// not logged in, move to login page

header('Location: ../login/login_mysqli.php');

exit;

}

// delete patent record related to research
		// connect to the database
			include('../connect-db.php');
        
        // confirm that the 'id' variable has been set
        if (isset($_GET['id']) && is_numeric($_GET['id']))
        {
                // get the 'id' variable from the URL
                $mfo3_form_program_id = $_GET['id'];
                
				// delete record from database
                if ($stmt = $mysqli->prepare("DELETE FROM tbl_sd_3_mfo3_formc_patented WHERE mfo3_form_program_id = ?"))
                {
                        $stmt->bind_param("i",$mfo3_form_program_id);     
                        $stmt->execute();
                        $stmt->close();
                }

                if ($stmt = $mysqli->prepare("DELETE FROM tbl_sd_3_mfo3_formb_published WHERE mfo3_form_program_id = ?"))
                {
                        $stmt->bind_param("i",$mfo3_form_program_id);     
                        $stmt->execute();
                        $stmt->close();
                }

                if ($stmt = $mysqli->prepare("DELETE FROM tbl_sd_3_mfo3_forma_presented WHERE mfo3_form_program_id = ?"))
                {
                        $stmt->bind_param("i",$mfo3_form_program_id);     
                        $stmt->execute();
                        $stmt->close();
                }

                if ($stmt = $mysqli->prepare("DELETE FROM tbl_sd_3_mfo3_form_research WHERE mfo3_form_program_id = ? LIMIT 1"))
                {
                        $stmt->bind_param("i",$mfo3_form_program_id);     
                        $stmt->execute();
                        $stmt->close();
                }

                else
                {
                        echo "ERROR: could not prepare SQL statement.";
                }
                $mysqli->close();
                header("Location: ../MFO3/research_view_per_page.php");
				
        }
        else
        // if the 'id' variable isn't set, redirect the user
        {
                header("Location: ../MFO3/research_view_per_page.php");
        }

?>