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

$query = "SELECT tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1_2_10_inpatients_outpatient_id,
    tbl_units_contributor.unit_delivery_name_cu,
    tbl_units_contributor.unit_contributor_name,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1__inpatients_jan_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_2_outpatient_jan_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_jan_attended_in_2hrs,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1__inpatients_feb_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_2_outpatient_feb_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_feb_attended_in_2hrs,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1__inpatients_mar_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_2_outpatient_mar_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_mar_attended_in_2hrs,
	tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_qtr1_attended_in_2hrs_percent,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1__inpatients_apr_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_2_outpatient_apr_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_apr_attended_in_2hrs,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1__inpatients_may_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_2_outpatient_may_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_may_attended_in_2hrs,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1__inpatients_jun_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_2_outpatient_jun_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_jun_attended_in_2hrs,
	tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_qtr2_attended_in_2hrs_percent,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1__inpatients_jul_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_2_outpatient_jul_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_jul_attended_in_2hrs,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1__inpatients_aug_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_2_outpatient_aug_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_aug_attended_in_2hrs,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1__inpatients_sep_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_2_outpatient_sep_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_sep_attended_in_2hrs,
	tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_qtr3_attended_in_2hrs_percent,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1__inpatients_oct_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_2_outpatient_oct_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_oct_attended_in_2hrs,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1__inpatients_nov_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_2_outpatient_nov_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_nov_attended_in_2hrs,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_1__inpatients_dec_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_2_outpatient_dec_count,
    tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_dec_attended_in_2hrs,
	tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.mfo5_10_outpatient_qtr4_attended_in_2hrs_percent
	FROM tbl_sd_5_mfo5_1_2_10_inpatients_outpatient INNER JOIN tbl_units_contributor ON tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.unit_contributor_id=tbl_units_contributor.unit_contributor_id
	WHERE '$sd_users_username'='admin' OR tbl_sd_5_mfo5_1_2_10_inpatients_outpatient.unit_contributor_id='$unit_contributor_id';";
// #headerunit

$result = $mysqli->query($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>In-Patient and Out-Patient Care - View All</title>
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
                <h2>MFO 5: In-Patient and Out-Patient Care - View Records</h2>

                <?php
						if ($result)
						{									
								// display records if there are records to display
                                if ($result->num_rows > 0)
                                {
										// #headerunit <a href="in-outpatients_view_use_per_page.php?page=1">
										echo '<div class="viewlinks">';
										// Changed next line - Add New not allowed anymore if at least one record exists
										// echo '<p><a href="in-outpatients_input.php">Add New Record</a> | <b>View All</b> | <a href="in-outpatients_view_per_page.php?page=1">View Page</a></p>';
										echo '<p><b>View All</b> | <a href="in-outpatients_view_per_page.php?page=1">View Page</a></p>';
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
											<th width='150' nowrap='nowrap'>Jan In-Patients</th>
											<th width='150' nowrap='nowrap'>Jan Out-Patients</th>
											<th width='150' nowrap='nowrap'>Jan Out-Patients Attended To within 2 hours</th>
											<th width='150' nowrap='nowrap'>Feb In-Patients</th>
											<th width='150' nowrap='nowrap'>Feb Out-Patients</th>
											<th width='150' nowrap='nowrap'>Feb Out-Patients Attended To within 2 hours</th>
											<th width='150' nowrap='nowrap'>Mar In-Patients</th>
											<th width='150' nowrap='nowrap'>Mar Out-Patients</th>
											<th width='150' nowrap='nowrap'>Mar Out-Patients Attended To within 2 hours</th>
											<th width='150' nowrap='nowrap'>Qtr 1 Rate % </th>
											<th width='150' nowrap='nowrap'>Apr In-Patients</th>
											<th width='150' nowrap='nowrap'>Apr Out-Patients</th>
											<th width='150' nowrap='nowrap'>Apr Out-Patients Attended To within 2 hours</th>
											<th width='150' nowrap='nowrap'>May In-Patients</th>
											<th width='150' nowrap='nowrap'>May Out-Patients</th>
											<th width='150' nowrap='nowrap'>May Out-Patients Attended To within 2 hours</th>
											<th width='150' nowrap='nowrap'>Jun In-Patients</th>
											<th width='150' nowrap='nowrap'>Jun Out-Patients</th>
											<th width='150' nowrap='nowrap'>Jun Out-Patients Attended To within 2 hours</th>
											<th width='150' nowrap='nowrap'>Qtr 2 Rate % </th>
											<th width='150' nowrap='nowrap'>Jul In-Patients</th>
											<th width='150' nowrap='nowrap'>Jul Out-Patients</th>
											<th width='150' nowrap='nowrap'>Jul Out-Patients Attended To within 2 hours</th>
											<th width='150' nowrap='nowrap'>Aug In-Patients</th>
											<th width='150' nowrap='nowrap'>Aug Out-Patients</th>
											<th width='150' nowrap='nowrap'>Aug Out-Patients Attended To within 2 hours</th>
											<th width='150' nowrap='nowrap'>Sep In-Patients</th>
											<th width='150' nowrap='nowrap'>Sep Out-Patients</th>
											<th width='150' nowrap='nowrap'>Sep Out-Patients Attended To within 2 hours</th>
											<th width='150' nowrap='nowrap'>Qtr 3 Rate % </th>
											<th width='150' nowrap='nowrap'>Oct In-Patients</th>
											<th width='150' nowrap='nowrap'>Oct Out-Patients</th>
											<th width='150' nowrap='nowrap'>Oct Out-Patients Attended To within 2 hours</th>
											<th width='150' nowrap='nowrap'>Nov In-Patients</th>
											<th width='150' nowrap='nowrap'>Nov Out-Patients</th>
											<th width='150' nowrap='nowrap'>Nov Out-Patients Attended To within 2 hours</th>
											<th width='150' nowrap='nowrap'>Dec In-Patients</th>
											<th width='150' nowrap='nowrap'>Dec Out-Patients</th>
											<th width='150' nowrap='nowrap'>Dec Out-Patients Attended To within 2 hours</th>
											<th width='150' nowrap='nowrap'>Qtr 4 Rate % </th>
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
                                                echo "<td><a href='in-outpatients_delete.php?id=" . $row[0] . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='in-outpatients_edit.php?id=" . $row[0] . "'>Edit</a></td>";
												// counter
												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												
												// display row data in columns
												for ($j = 1; $j < 43; $j++)
													{
														echo '<td nowrap="nowrap" ';
														if ($j == 1 || $j == 2)
															echo '>' . $row[$j];
														else
															if (($j-12)%10 == 0)
																echo ' align="right">'. number_format($row[$j], 2);
															else
																echo ' align="right">'. number_format($row[$j]);
														
														echo '</td>';
													}
													
                                                echo "<td><a href='in-outpatients_edit.php?id=" . $row[0] . "'>Edit</a></td>";
                                                echo '<td><a href="in-outpatients_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
												echo "</tr>";
                                        }
                                        
                                        echo "</table>";
                                }
								
                                // if there are no records in the database, display an alert message
                                else
                                {
										// #headerunit <a href="in-outpatients_view_use_per_page.php?page=1">
										echo '<div class="viewlinks">';
										echo '<p><a href="in-outpatients_input.php">Add New Record</a> | No record to display!</p>';
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