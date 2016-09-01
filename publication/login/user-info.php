<?php
				session_name("publication"); 
				session_start();
				// is the one accessing this page logged in or not?

				if ( !isset($_SESSION['user_id_publication']) || $_SESSION['user_id_publication'] !== true) {

				// not logged in, move to login page

				header('Location: login_mysqli.php');

				exit;

					}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>View Encoder</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <link href="../mystyle.css" rel="stylesheet" type="text/css" />
                <style> td
				{
				text-align:center;				
				}
				th
				{
				background-color:#B43C25;
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
						$user_name = $_GET['unid'];
						$query = "SELECT tbl_cu.short_name, emp_number, username, first_name, last_name, designation, telephone, office, email FROM tbl_users_publication INNER JOIN tbl_cu ON tbl_users_publication.cu = tbl_cu.id WHERE username = '$user_name' ";

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
												<th width='80' nowrap='nowrap'>Employee Number</th>
												<th width='80' nowrap='nowrap'>Firstname</th>
												<th width='80' nowrap='nowrap'>Lastname</th>
												<th width='80' nowrap='nowrap'>Designation</th>
												<th width='80' nowrap='nowrap'>Telephone</th>
												<th width='80' nowrap='nowrap'>Campus</th>
												<th width='80' nowrap='nowrap'>Office</th>
												<th width='80' nowrap='nowrap'>Email</th>
											</tr>";
										  
                                        		$ctr=1;
                                        while ($row = $result->fetch_object())
                                        {
                                                //alternate color of background
                                        		if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
												else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

												// set up a row for each record
                                                echo "<td>" . strtolower($row->username) . "</td>";
												echo "<td>" . $row->emp_number . "</td>";
                                                echo "<td nowrap='nowrap'>" . strtolower($row->first_name) . "</td>";
                                                echo "<td nowrap='nowrap'>" . strtolower($row->last_name) . "</td>";
                                                echo "<td nowrap='nowrap'>" . strtolower($row->designation) . "</td>";
												echo "<td>" . $row->telephone . "</td>";
                                                echo "<td>" . strtolower($row->short_name) . "</td>";
                                                echo "<td nowrap='nowrap'>" . strtolower($row->office) . "</td>";
                                                echo "<td>" . strtolower($row->email) . "</td>";
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