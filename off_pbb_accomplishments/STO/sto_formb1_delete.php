<?php

session_name("pbb");
session_start();

//is the user logged in or not
if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

//if not, redirect the user
header('Location: ../login/login_mysqli.php');

exit;

}

//delete the record
		//connect to the database
			include('../connect-db.php');
        
        //confirm that the 'id' variable has been set
        if (isset($_GET['id']) && is_numeric($_GET['id']))
        {
                //get the 'id' variable from the URL
				   $sto_formb1_quality_assessment_id = $_GET['id'];
                
				//delete the record from the database
				if ($stmt = $mysqli->prepare("DELETE FROM tbl_sd_6_sto_formb1_quality_assessment WHERE sto_formb1_quality_assessment_id = ?"))
                {
                        $stmt->bind_param("i",$sto_formb1_quality_assessment_id);     
                        $stmt->execute();
                        $stmt->close();
                }

                else
                {
                        echo "ERROR: could not prepare SQL statement.";
                }
                $mysqli->close();
                header("Location: ../STO/sto_formb1_view_per_page.php");
        }
        else
        //if the 'id' variable was not set, redirect the user
        {
				header("Location: ../STO/sto_formb1_view_per_page.php");
        }

?>