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

$query = "SELECT tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_id,
			tbl_units_contributor.unit_delivery_name_cu,
			tbl_units_contributor.unit_contributor_name,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_jan_patients,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_jan_patients_infected,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_feb_patients,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_feb_patients_infected,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_mar_patients,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_mar_patients_infected,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_qtr1_percentage,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_apr_patients,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_apr_patients_infected,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_may_patients,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_may_patients_infected,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_jun_patients,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_jun_patients_infected,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_qtr2_percentage,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_jul_patients,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_jul_patients_infected,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_aug_patients,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_aug_patients_infected,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_sep_patients,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_sep_patients_infected,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_qtr3_percentage,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_oct_patients,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_oct_patients_infected,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_nov_patients,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_nov_patients_infected,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_dec_patients,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_dec_patients_infected,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_qtr4_percentage,
			tbl_sd_5_mfo5_8_infection_rate.mfo5_8_infection_rate_all_percentage
	FROM tbl_sd_5_mfo5_8_infection_rate INNER JOIN tbl_units_contributor ON tbl_sd_5_mfo5_8_infection_rate.unit_contributor_id=tbl_units_contributor.unit_contributor_id
	WHERE '$sd_users_username'='admin' OR tbl_sd_5_mfo5_8_infection_rate.unit_contributor_id='$unit_contributor_id';";
// #headerunit

$result = $mysqli->query($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>Hospital-Acquired Infection Rates - View All</title>
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
                <h2>MFO 5: Hospital-Acquired Infection (HAI) Rates - View Records</h2>

                <?php
						if ($result)
						{									
								// display records if there are records to display
                                if ($result->num_rows > 0)
                                {
										// #headerunit <a href="hai_view_use_per_page.php?page=1">
										echo '<div class="viewlinks">';
										// Changed next line - Add New not allowed anymore if at least one record exists
										// echo '<p><a href="hai_input.php">Add New Record</a> | <b>View All</b> | <a href="hai_view_per_page.php?page=1">View Page</a></p>';
										echo '<p><b>View All</b> | <a href="hai_view_per_page.php?page=1">View Page</a></p>';
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
											<th width='150' nowrap='nowrap'>Jan Patients under Surveillance</th>
											<th width='150' nowrap='nowrap'>Jan Patients with HAI</th>
											<th width='150' nowrap='nowrap'>Feb Patients under Surveillance</th>
											<th width='150' nowrap='nowrap'>Feb Patients with HAI</th>
											<th width='150' nowrap='nowrap'>Mar Patients under Surveillance</th>
											<th width='150' nowrap='nowrap'>Mar Patients with HAI</th>
											<th width='150' nowrap='nowrap'>Qtr 1 HAI Rate %</th>
											<th width='150' nowrap='nowrap'>Apr Patients under Surveillance</th>
											<th width='150' nowrap='nowrap'>Apr Patients with HAI</th>
											<th width='150' nowrap='nowrap'>May Patients under Surveillance</th>
											<th width='150' nowrap='nowrap'>May Patients with HAI</th>
											<th width='150' nowrap='nowrap'>Jun Patients under Surveillance</th>
											<th width='150' nowrap='nowrap'>Jun Patients with HAI</th>
											<th width='150' nowrap='nowrap'>Qtr 2 HAI Rate %</th>
											<th width='150' nowrap='nowrap'>Jul Patients under Surveillance</th>
											<th width='150' nowrap='nowrap'>Jul Patients with HAI</th>
											<th width='150' nowrap='nowrap'>Aug Patients under Surveillance</th>
											<th width='150' nowrap='nowrap'>Aug Patients with HAI</th>
											<th width='150' nowrap='nowrap'>Sep Patients under Surveillance</th>
											<th width='150' nowrap='nowrap'>Sep Patients with HAI</th>
											<th width='150' nowrap='nowrap'>Qtr 3 HAI Rate %</th>
											<th width='150' nowrap='nowrap'>Oct Patients under Surveillance</th>
											<th width='150' nowrap='nowrap'>Oct Patients with HAI</th>
											<th width='150' nowrap='nowrap'>Nov Patients under Surveillance</th>
											<th width='150' nowrap='nowrap'>Nov Patients with HAI</th>
											<th width='150' nowrap='nowrap'>Dec Patients under Surveillance</th>
											<th width='150' nowrap='nowrap'>Dec Patients with HAI</th>
											<th width='150' nowrap='nowrap'>Qtr 4 HAI Rate %</th>
											<th width='150' nowrap='nowrap'>Year's HAI Rate %</th>
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
                                                echo "<td><a href='hai_delete.php?id=" . $row[0] . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='hai_edit.php?id=" . $row[0] . "'>Edit</a></td>";
												// counter
												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												
												// display row data in columns
												for ($j = 1; $j < 32; $j++)
													{
														echo '<td nowrap="nowrap" ';
														if ($j == 1 || $j == 2)
															echo '>' . $row[$j];
														else
															if (($j-9)%7 == 0 || $j == 31)
																echo ' align="right">'. number_format($row[$j], 2);
															else
																echo ' align="right">'. number_format($row[$j]);
														
														echo '</td>';
													}
													
                                                echo "<td><a href='hai_edit.php?id=" . $row[0] . "'>Edit</a></td>";
                                                echo '<td><a href="hai_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
												echo "</tr>";
                                        }
                                        
                                        echo "</table>";
                                }
								
                                // if there are no records in the database, display an alert message
                                else
                                {
										// #headerunit <a href="hai_view_use_per_page.php?page=1">
										echo '<div class="viewlinks">';
										echo '<p><a href="hai_input.php">Add New Record</a> | No record to display!</p>';
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