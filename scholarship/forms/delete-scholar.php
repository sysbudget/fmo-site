<?php
				session_name("scholarship"); 
				session_start();
				// is the one accessing this page logged in or not?

				if ( !isset($_SESSION['user_id_scholarship']) || $_SESSION['user_id_scholarship'] !== true) {

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
                $sid = $_GET['id'];
                
                // delete record from database book
                if ($stmt = $mysqli->prepare("DELETE FROM tbl_main WHERE sid = ? LIMIT 1"))
                {
                        $stmt->bind_param("i",$sid);     
                        $stmt->execute();
                        $stmt->close();
                }
                else
                {
                        echo "ERROR: could not prepare SQL statement.";
                }

                $mysqli->close();
                
                // redirect user after delete is successful
                header("Location: view-scholar.php");
        }
        else
        // if the 'id' variable isn't set, redirect the user
        {
                header("Location: view-scholar.php");
        }

?>