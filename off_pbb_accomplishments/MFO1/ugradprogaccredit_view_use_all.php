<?php

session_name("pbb");
session_start();

// is the one accessing this page logged in or not?
if ( !isset($_SESSION['user_id']) || !$_SESSION['user_id'])
{
	// not logged in, move to login page
	header('Location: ../login/login_mysqli.php');
	exit;
}

//get session values
$unit_contributor_id = $_SESSION['unit_contributor_id'];
$unit_delivery_id = $_SESSION['unit_delivery_id'];
$focal_person_id = $_SESSION['focal_person_id'];
$cu_id = $_SESSION['cu_id'];
$cu_short_name = $_SESSION['cu_short_name'];
$unit_delivery_name_cu = $_SESSION['unit_delivery_name_cu'];
$unit_contributor_name = $_SESSION['unit_contributor_name'];
$sd_users_username = $_SESSION['sd_users_username'];
$cutOffDate_id = $_SESSION['cutOffDate_id'];
$t_startDate = $_SESSION['t_startDate'];
$a_cutOffDate_contributor = $_SESSION['a_cutOffDate_contributor'];
$a_cutOffDate_delivery = $_SESSION['a_cutOffDate_delivery'];
$a_cutOffDate_fp = $_SESSION['a_cutOffDate_fp'];
$a_cutOffDate_remarks = $_SESSION['a_cutOffDate_remarks'];

// connect to the database
include_once('../connect-db.php');

$query = "SELECT mfo1_forma_program_id, unit_delivery_name_cu, unit_contributor_name, ref_program_level_name, mfo1_forma_program_name,  mfo1_forma_program_enrollment_in_terminal_year, mfo1_forma_program_graduates_total, mfo1_forma_program_graduates_total_within_timeframe, unit_contributor_id FROM tbl_sd_1_mfo1_forma_program WHERE ('$sd_users_username'='admin') OR (unit_contributor_id='$unit_contributor_id') ORDER BY ref_program_level_id, mfo1_forma_program_name;" ;
						
$result = $mysqli->query($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>Program Accreditation</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <link href="../mystyle.css" rel="stylesheet" type="text/css" />
                <style>
				table, th, td,
				{width:200%; border-collapse:separate; border:1px solid black;
				}
				td#txtright
				{text-align:right;
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
                <h2>MFO 1: Program Accreditation - Select Undergraduate Degree Program</h2>

                <?php
						if ($result)
						{									
								// display records if there are records to display
                                if ($result->num_rows > 0)
                                {
										echo '<div class="viewlinks">';
										echo '<p><b>View All</b> | <a href="ugradprogaccredit_view_use_per_page.php?page=1">View Page</a></p>';
										echo '</div>';
										
										// display records in a table
                                        echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        
										// set table headers
                                        echo "<tr>
											<th></th>
											<th>Seq No</th>
											<th width='150' nowrap='nowrap'>Delivery Unit</th>
											<th width='150' nowrap='nowrap'>Contributing Unit</th>
											<th width='150' nowrap='nowrap'>Program Level</th>
											<th width='150' nowrap='nowrap'>Official Program Name</th>
											<th width='150' nowrap='nowrap'>Enrollment (Terminal Yr)</th>
											<th width='150' nowrap='nowrap'>Total Diploma Recipients for the Year</th>
											<th></th>
											</tr>";
																						
										$nctr=1;
                                        $ctr=1;
                                        while ($row = $result->fetch_row())
                                        {
                                                // alternate color of background
                                        		if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
												else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

												// set up a row for each record
                                                echo '<td><a href="ugradprogaccredit_input.php?id=' . $row[0] . '">Select</a></td>';

												// counter
												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												
												for ($j = 1; $j < 7; $j++)
													{
														echo '<td nowrap="nowrap" ';
														
														switch ($j)
														{
															case 5:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															case 6:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															default:
																echo '>' . $row[$j];
																break;
														}
														
														echo '</td>';
													}

                                                echo '<td><a href="ugradprogaccredit_input.php?id=' . $row[0] . '">Select</a></td>';
												echo "</tr>";
                                        }
                                        
                                        echo "</table>";
                                }
								
                                // if there are no records in the database, display an alert message
                                else
                                {
									// echo "<p><a href='ugradprog_input.php'>Go to Undergraduate Degree Program - Add New Record</a> | ";
									// echo "No record to select!</p>";
									echo "<p>No record to select!</p>";
									echo '<script language="javascript">';
									echo 'alert("Go to UNDERGRADUATE DEGREE PROGRAM to add required record")';
									echo '</script>';
                                }

                        }
                        // show an error if there is an issue with the database query
                        else
                        {
                                echo "Error: " . $mysqli->error;
                        }
                        
                        // close database connection
						$result->close();
                        $mysqli->close();
                
                ?>
                
        	</div>        
        </body>
</html>