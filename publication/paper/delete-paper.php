<?php
				session_name("publication"); 
				session_start();
				// is the one accessing this page logged in or not?

				if ( !isset($_SESSION['user_id_publication']) || $_SESSION['user_id_publication'] !== true) {

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
                $pid = $_GET['id'];
                
                // delete record from database book
                if ($stmt = $mysqli->prepare("DELETE FROM tbl_paper_main_raw WHERE pid = ? LIMIT 1"))
                {
                        $stmt->bind_param("i",$pid);     
                        $stmt->execute();
                        $stmt->close();
                }
                else
                {
                        echo "ERROR: could not prepare SQL statement.";
                }
				
                // delete related record from database award
                if ($stmt = $mysqli->prepare("DELETE FROM tbl_award_main_raw WHERE refid = ? LIMIT 1"))
                {
                        $stmt->bind_param("i",$pid);     
                        $stmt->execute();
                        $stmt->close();
                }
                else
                {
                        echo "ERROR: could not prepare SQL statement.";
                }

                $mysqli->close();
                
                // redirect user after delete is successful
                header("Location: view-paper.php");
        }
        else
        // if the 'id' variable isn't set, redirect the user
        {
                header("Location: view-paper.php");
        }

?>