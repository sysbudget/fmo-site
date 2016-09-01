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

$query = "SELECT
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_4_11_surgeries_id,
	tbl_units_contributor.unit_delivery_name_cu,
	tbl_units_contributor.unit_contributor_name,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_4_surgeries_jan_emergency,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_surgeries_jan_elective,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_jan_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_4_surgeries_feb_emergency,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_surgeries_feb_elective,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_feb_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_4_surgeries_mar_emergency,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_surgeries_mar_elective,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_mar_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_qtr1_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_4_surgeries_apr_emergency,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_surgeries_apr_elective,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_apr_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_4_surgeries_may_emergency,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_surgeries_may_elective,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_may_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_4_surgeries_jun_emergency,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_surgeries_jun_elective,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_jun_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_qtr2_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_4_surgeries_jul_emergency,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_surgeries_jul_elective,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_jul_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_4_surgeries_aug_emergency,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_surgeries_aug_elective,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_aug_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_4_surgeries_sep_emergency,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_surgeries_sep_elective,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_sep_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_qtr3_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_4_surgeries_oct_emergency,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_surgeries_oct_elective,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_oct_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_4_surgeries_nov_emergency,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_surgeries_nov_elective,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_nov_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_4_surgeries_dec_emergency,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_3_surgeries_dec_elective,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_dec_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_qtr4_elective_waiting,
	tbl_sd_5_mfo5_3_4_11_surgeries.mfo5_11_surgeries_all_elective_waiting
	FROM tbl_sd_5_mfo5_3_4_11_surgeries INNER JOIN tbl_units_contributor ON tbl_sd_5_mfo5_3_4_11_surgeries.unit_contributor_id=tbl_units_contributor.unit_contributor_id
	WHERE '$sd_users_username'='admin' OR tbl_sd_5_mfo5_3_4_11_surgeries.unit_contributor_id='$unit_contributor_id';";
// #headerunit

$result = $mysqli->query($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>Surgical Operations - View All</title>
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
               	<script language="JavaScript" type="text/javascript">
				function checkDelete(){
    			return confirm('Delete this record and any related records. Are you sure?');
				}
				</script>
        </head>
        <body>
                <div class="viewbody">
                <h2>MFO 5: Surgical Operations - View Records</h2>

                <?php
						if ($result)
						{									
								// display records if there are records to display
                                if ($result->num_rows > 0)
                                {
										// #headerunit <a href="surgery_view_use_per_page.php?page=1">
										echo '<div class="viewlinks">';
										// Changed next line - Add New not allowed anymore if at least one record exists
										// echo '<p><a href="surgery_input.php">Add New Record</a> | <b>View All</b> | <a href="surgery_view_per_page.php?page=1">View Page</a></p>';
										echo '<p><b>View All</b> | <a href="surgery_view_per_page.php?page=1">View Page</a></p>';
										echo '</div>';
							
										// display records in a table
                                        echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        
										// set table headers
                                        echo "<tr>
											<th></th>
											<th></th>
											<th>Seq No</th>
											<th width='150' nowrap='nowrap'>Delivery Unit</th>
											<th width='150' nowrap='nowrap'>Contributing Unit</th>
											<th width='150' nowrap='nowrap'>Jan Emergency Surgeries</th>
											<th width='150' nowrap='nowrap'>Jan Elective Surgeries</th>
											<th width='150' nowrap='nowrap'>Jan Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Feb Emergency Surgeries</th>
											<th width='150' nowrap='nowrap'>Feb Elective Surgeries</th>
											<th width='150' nowrap='nowrap'>Feb Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Mar Emergency Surgeries</th>
											<th width='150' nowrap='nowrap'>Mar Elective Surgeries</th>
											<th width='150' nowrap='nowrap'>Mar Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Qtr 1 Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Apr Emergency Surgeries</th>
											<th width='150' nowrap='nowrap'>Apr Elective Surgeries</th>
											<th width='150' nowrap='nowrap'>Apr Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>May Emergency Surgeries</th>
											<th width='150' nowrap='nowrap'>May Elective Surgeries</th>
											<th width='150' nowrap='nowrap'>May Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Jun Emergency Surgeries</th>
											<th width='150' nowrap='nowrap'>Jun Elective Surgeries</th>
											<th width='150' nowrap='nowrap'>Jun Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Qtr 2 Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Jul Emergency Surgeries</th>
											<th width='150' nowrap='nowrap'>Jul Elective Surgeries</th>
											<th width='150' nowrap='nowrap'>Jul Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Aug Emergency Surgeries</th>
											<th width='150' nowrap='nowrap'>Aug Elective Surgeries</th>
											<th width='150' nowrap='nowrap'>Aug Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Sep Emergency Surgeries</th>
											<th width='150' nowrap='nowrap'>Sep Elective Surgeries</th>
											<th width='150' nowrap='nowrap'>Sep Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Qtr 3 Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Oct Emergency Surgeries</th>
											<th width='150' nowrap='nowrap'>Oct Elective Surgeries</th>
											<th width='150' nowrap='nowrap'>Oct Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Nov Emergency Surgeries</th>
											<th width='150' nowrap='nowrap'>Nov Elective Surgeries</th>
											<th width='150' nowrap='nowrap'>Nov Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Dec Emergency Surgeries</th>
											<th width='150' nowrap='nowrap'>Dec Elective Surgeries</th>
											<th width='150' nowrap='nowrap'>Dec Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Qtr 4 Waiting Period for Elective (in Weeks)</th>
											<th width='150' nowrap='nowrap'>Year's Waiting Period for Elective (in Weeks)</th>
											<th></th>
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
                                                echo "<td><a href='surgery_delete.php?id=" . $row[0] . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='surgery_edit.php?id=" . $row[0] . "'>Edit</a></td>";
												// counter
												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												
												// display row data in columns
												for ($j = 1; $j < 44; $j++)
													{
														echo '<td nowrap="nowrap" ';
														if ($j == 1 || $j == 2)
															echo '>' . $row[$j];
														else
															echo ' align="right">'. number_format($row[$j]);
														
														echo '</td>';
													}
													
                                                echo "<td><a href='surgery_edit.php?id=" . $row[0] . "'>Edit</a></td>";
                                                echo '<td><a href="surgery_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
												echo "</tr>";
                                        }
                                        
                                        echo "</table>";
                                }
								
                                // if there are no records in the database, display an alert message
                                else
                                {
										// #headerunit <a href="surgery_view_use_per_page.php?page=1">
										echo '<div class="viewlinks">';
										echo '<p><a href="surgery_input.php">Add New Record</a> | No record to display!</p>';
										echo '</div>';
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