<?php
				session_name("pbb");
				session_start();
				// is the one accessing this page logged in or not?

				if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

				// not logged in, move to login page

				header('Location: ../login/login_mysqli.php');

				exit;

				}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>View Records</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <link href="../mystyle.css" rel="stylesheet" type="text/css" />
                <style> td
				{
				text-align:center;				
				}
				th
				{
				background-color:#565422;
				color:white;
				}
				</style>
        </head>
        <body>
                <div class="viewbody">
                <h2>User Details</h2><hr />
                <?php
				// connect to the database
					include('../connect-db.php');

                        // get the records from the database
						$sd_users_username = $_GET['unid'];
						$query = "SELECT cu_short_name, unit_delivery_name_cu, unit_contributor_name, sd_users_username FROM tbl_sd_users WHERE sd_users_username = '$sd_users_username' ";

						if ($result = $mysqli->query($query))
						{									
                                // display records if there are records to display
                                if ($result->num_rows > 0)
                                {
										
										// display records in a table
                                        echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        
                                        // set table headers
                                        
										echo "<tr>
												<th width='80' nowrap='nowrap'>Username</th>
												<th width='80' nowrap='nowrap'>CU</th>
												<th width='80' nowrap='nowrap'>Delivery Unit</th>
												<th width='80' nowrap='nowrap'>Contributor</th>
											</tr>";
										  
                                        		$ctr=1;
                                        while ($row = $result->fetch_object())
                                        {
                                                //alternate color of background
                                        		if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
												else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

												// set up a row for each record
                                                echo "<td>" . strtolower($row->sd_users_username) . "</td>";
                                                echo "<td nowrap='nowrap'>" . strtolower($row->cu_short_name) . "</td>";
                                                echo "<td nowrap='nowrap'>" . strtolower($row->unit_delivery_name_cu) . "</td>";
                                                echo "<td nowrap='nowrap'>" . strtolower($row->unit_contributor_name) . "</td>";
                                        }
                                        
                                        echo "</table>";
                                }
                                // if there are no records in the database, display an alert message
                                else
                                {
                                        echo "No results to display!";
                                }
                        }
                        // show an error if there is an issue with the database query
                        else
                        {
                                echo "Error: " . $mysqli->error;
                        }
                        
                        // close database connection
                        $mysqli->close();
                
                ?>
                
        	</div>        
        </body>
</html>