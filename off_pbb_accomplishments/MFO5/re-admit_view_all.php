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

$query = "SELECT tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_id,
		tbl_sd_5_mfo5_9_readmitted_cases.unit_delivery_name_cu,
		tbl_sd_5_mfo5_9_readmitted_cases.unit_contributor_name,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_jan_discharges,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_jan_readmitted_within_3months,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_feb_discharges,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_feb_readmitted_within_3months,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_mar_discharges,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_mar_readmitted_within_3months,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_qtr1_percentage,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_apr_discharges,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_apr_readmitted_within_3months,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_may_discharges,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_may_readmitted_within_3months,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_jun_discharges,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_jun_readmitted_within_3months,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_qtr2_percentage,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_jul_discharges,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_jul_readmitted_within_3months,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_aug_discharges,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_aug_readmitted_within_3months,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_sep_discharges,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_sep_readmitted_within_3months,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_qtr3_percentage,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_oct_discharges,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_oct_readmitted_within_3months,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_nov_discharges,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_nov_readmitted_within_3months,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_dec_discharges,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_dec_readmitted_within_3months,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_qtr4_percentage,
		tbl_sd_5_mfo5_9_readmitted_cases.mfo5_9_readmitted_cases_all_percentage
	FROM tbl_sd_5_mfo5_9_readmitted_cases INNER JOIN tbl_units_contributor ON tbl_sd_5_mfo5_9_readmitted_cases.unit_contributor_id=tbl_units_contributor.unit_contributor_id
	WHERE '$sd_users_username'='admin' OR tbl_sd_5_mfo5_9_readmitted_cases.unit_contributor_id='$unit_contributor_id';";
// #headerunit

$result = $mysqli->query($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>Mental and Drug Rehab Readmission Rates - View All</title>
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
                <h2>MFO 5: Mental and Drug Rehabilitation Readmission Rates - View Records</h2>

                <?php
						if ($result)
						{									
								// display records if there are records to display
                                if ($result->num_rows > 0)
                                {
										// #headerunit <a href="re-admit_view_use_per_page.php?page=1">
										echo '<div class="viewlinks">';
										// Changed next line - Add New not allowed anymore if at least one record exists
										// echo '<p><a href="re-admit_input.php">Add New Record</a> | <b>View All</b> | <a href="re-admit_view_per_page.php?page=1">View Page</a></p>';
										echo '<p><b>View All</b> | <a href="re-admit_view_per_page.php?page=1">View Page</a></p>';
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
											<th width='150' nowrap='nowrap'>Jan Patients Discharged</th>
											<th width='150' nowrap='nowrap'>Jan Readmitted within 3 Months</th>
											<th width='150' nowrap='nowrap'>Feb Patients Discharged</th>
											<th width='150' nowrap='nowrap'>Feb Readmitted within 3 Months</th>
											<th width='150' nowrap='nowrap'>Mar Patients Discharged</th>
											<th width='150' nowrap='nowrap'>Mar Readmitted within 3 Months</th>
											<th width='150' nowrap='nowrap'>Qtr 1 Rate %</th>
											<th width='150' nowrap='nowrap'>Apr Patients Discharged</th>
											<th width='150' nowrap='nowrap'>Apr Readmitted within 3 Months</th>
											<th width='150' nowrap='nowrap'>May Patients Discharged</th>
											<th width='150' nowrap='nowrap'>May Readmitted within 3 Months</th>
											<th width='150' nowrap='nowrap'>Jun Patients Discharged</th>
											<th width='150' nowrap='nowrap'>Jun Readmitted within 3 Months</th>
											<th width='150' nowrap='nowrap'>Qtr 2 Rate %</th>
											<th width='150' nowrap='nowrap'>Jul Patients Discharged</th>
											<th width='150' nowrap='nowrap'>Jul Readmitted within 3 Months</th>
											<th width='150' nowrap='nowrap'>Aug Patients Discharged</th>
											<th width='150' nowrap='nowrap'>Aug Readmitted within 3 Months</th>
											<th width='150' nowrap='nowrap'>Sep Patients Discharged</th>
											<th width='150' nowrap='nowrap'>Sep Readmitted within 3 Months</th>
											<th width='150' nowrap='nowrap'>Qtr 3 Rate %</th>
											<th width='150' nowrap='nowrap'>Oct Patients Discharged</th>
											<th width='150' nowrap='nowrap'>Oct Readmitted within 3 Months</th>
											<th width='150' nowrap='nowrap'>Nov Patients Discharged</th>
											<th width='150' nowrap='nowrap'>Nov Readmitted within 3 Months</th>
											<th width='150' nowrap='nowrap'>Dec Patients Discharged</th>
											<th width='150' nowrap='nowrap'>Dec Readmitted within 3 Months</th>
											<th width='150' nowrap='nowrap'>Qtr 4 Rate %</th>
											<th width='150' nowrap='nowrap'>Year's Rate %</th>
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
                                                echo "<td><a href='re-admit_delete.php?id=" . $row[0] . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='re-admit_edit.php?id=" . $row[0] . "'>Edit</a></td>";
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
													
                                                echo "<td><a href='re-admit_edit.php?id=" . $row[0] . "'>Edit</a></td>";
                                                echo '<td><a href="re-admit_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
												echo "</tr>";
                                        }
                                        
                                        echo "</table>";
                                }
								
                                // if there are no records in the database, display an alert message
                                else
                                {
										// #headerunit <a href="re-admit_view_use_per_page.php?page=1">
										echo '<div class="viewlinks">';
										echo '<p><a href="re-admit_input.php">Add New Record</a> | No record to display!</p>';
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