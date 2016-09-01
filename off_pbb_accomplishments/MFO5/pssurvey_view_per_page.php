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

// number of results to show per page - 25
$per_page = 25;

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

$query = "SELECT tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_id,
		tbl_units_contributor.unit_delivery_name_cu,
		tbl_units_contributor.unit_contributor_name,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_jan_clients_surveyed,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_jan_rate_satisfactory,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_jan_attachment,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_feb_clients_surveyed,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_feb_rate_satisfactory,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_feb_attachment,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_mar_clients_surveyed,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_mar_rate_satisfactory,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_mar_attachment,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_qtr1_percentage,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_apr_clients_surveyed,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_apr_rate_satisfactory,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_apr_attachment,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_may_clients_surveyed,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_may_rate_satisfactory,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_may_attachment,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_jun_clients_surveyed,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_jun_rate_satisfactory,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_jun_attachment,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_qtr2_percentage,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_jul_clients_surveyed,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_jul_rate_satisfactory,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_jul_attachment,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_aug_clients_surveyed,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_aug_rate_satisfactory,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_aug_attachment,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_sep_clients_surveyed,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_sep_rate_satisfactory,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_sep_attachment,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_qtr3_percentage,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_oct_clients_surveyed,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_oct_rate_satisfactory,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_oct_attachment,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_nov_clients_surveyed,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_nov_rate_satisfactory,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_nov_attachment,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_dec_clients_surveyed,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_dec_rate_satisfactory,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_dec_attachment,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_qtr4_percentage,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_all_percentage,
		tbl_sd_5_mfo5_7_rate_of_hospital_services.mfo5_7_rate_of_hospital_services_all_attachment_questionnaire
	FROM tbl_sd_5_mfo5_7_rate_of_hospital_services INNER JOIN tbl_units_contributor ON tbl_sd_5_mfo5_7_rate_of_hospital_services.unit_contributor_id=tbl_units_contributor.unit_contributor_id
	WHERE '$sd_users_username'='admin' OR tbl_sd_5_mfo5_7_rate_of_hospital_services.unit_contributor_id='$unit_contributor_id';";
// #headerunit

$result = $mysqli->query($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>Patient Satisfaction Survey - View Per Page</title>
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
				<h2>MFO 5: Patient Satisfaction Survey - View Records</h2>
                
                <?php
						if ($result)
						{
							
							if ($result->num_rows != 0)
							{
								echo '<div class="viewlinks">';
								// #headerunit <a href="pssurvey_view_use_per_page.php?page=1">
								echo "<p>";
								// Comment out next line - Add New not allowed anymore if at least one record exists
								// <a href="pssurvey_input.php">Add New Record</a> | ';
								echo '<a href="pssurvey_view_all.php">View All</a> | <b>View Page:</b> ';

								$total_results = $result->num_rows;
								// ceil() returns the next highest integer value by rounding up value if necessary
								$total_pages = ceil($total_results / $per_page);
                                                        
								// check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
								if (isset($_GET['page']) && is_numeric($_GET['page']))
								{
									$show_page = $_GET['page'];

									// make sure the $show_page value is valid
									if ($show_page > 0 && $show_page <= $total_pages)
									{
										$start = ($show_page -1) * $per_page;
										$end = $start + $per_page; 
									}
									else
									{
									// error - show first set of results
										$start = 0;
										$end = $per_page; 
									}
								}
								else
								{
									// if page isn't set, show first set of results
									$start = 0;
									$end = $per_page; 
								}
                                                        
								// display pagination
								for ($i = 1; $i <= $total_pages; $i++)
								{
									if (isset($_GET['page']) && $_GET['page'] == $i)
									{
										echo $i . " ";
									}
									else
									{
										echo "<a href='pssurvey_view_per_page.php?page=$i'>$i</a> ";
									}
                                 }
                                 echo "</p>";
                                 echo "</div>";

								// display data in table
								echo "<table border='1' cellpadding='2' cellspacing='1'>";
								
								// set table headers
								echo "<tr>
									<th></th>
									<th></th>
									<th>Seq No</th>
									<th width='150' nowrap='nowrap'>Delivery Unit</th>
									<th width='150' nowrap='nowrap'>Contributing Unit</th>
									<th width='150' nowrap='nowrap'>Jan Respondents</th>
									<th width='150' nowrap='nowrap'>Jan No. of Responses: Satisfactory and Above</th>
									<th width='150' nowrap='nowrap'>Jan Tabulated Results: Attachment 1</th>
									<th width='150' nowrap='nowrap'>Feb Respondents</th>
									<th width='150' nowrap='nowrap'>Feb No. of Responses: Satisfactory or Better</th>
									<th width='150' nowrap='nowrap'>Feb Tabulated Results: Attachment 2</th>
									<th width='150' nowrap='nowrap'>Mar Respondents</th>
									<th width='150' nowrap='nowrap'>Mar No. of Responses: Satisfactory or Better</th>
									<th width='150' nowrap='nowrap'>Mar Tabulated Results: Attachment 3</th>
									<th width='150' nowrap='nowrap'>Qtr 1 Satisfactory Rate %</th>
									<th width='150' nowrap='nowrap'>Apr Respondents</th>
									<th width='150' nowrap='nowrap'>Apr No. of Responses: Satisfactory or Better</th>
									<th width='150' nowrap='nowrap'>Apr Tabulated Results: Attachment 4</th>
									<th width='150' nowrap='nowrap'>May Respondents</th>
									<th width='150' nowrap='nowrap'>May No. of Responses: Satisfactory or Better</th>
									<th width='150' nowrap='nowrap'>May Tabulated Results: Attachment 5</th>
									<th width='150' nowrap='nowrap'>Jun Respondents</th>
									<th width='150' nowrap='nowrap'>Jun No. of Responses: Satisfactory or Better</th>
									<th width='150' nowrap='nowrap'>Jun Tabulated Results: Attachment 6</th>
									<th width='150' nowrap='nowrap'>Qtr 2 Satisfactory Rate %</th>
									<th width='150' nowrap='nowrap'>Jul Respondents</th>
									<th width='150' nowrap='nowrap'>Jul No. of Responses: Satisfactory or Better</th>
									<th width='150' nowrap='nowrap'>Jul Tabulated Results: Attachment 7</th>
									<th width='150' nowrap='nowrap'>Aug Respondents</th>
									<th width='150' nowrap='nowrap'>Aug No. of Responses: Satisfactory or Better</th>
									<th width='150' nowrap='nowrap'>Aug Tabulated Results: Attachment 8</th>
									<th width='150' nowrap='nowrap'>Sep Respondents</th>
									<th width='150' nowrap='nowrap'>Sep No. of Responses: Satisfactory or Better</th>
									<th width='150' nowrap='nowrap'>Sep Tabulated Results: Attachment 9</th>
									<th width='150' nowrap='nowrap'>Qtr 3 Satisfactory Rate %</th>
									<th width='150' nowrap='nowrap'>Oct Respondents</th>
									<th width='150' nowrap='nowrap'>Oct No. of Responses: Satisfactory or Better</th>
									<th width='150' nowrap='nowrap'>Oct Tabulated Results: Attachment 10</th>
									<th width='150' nowrap='nowrap'>Nov Respondents</th>
									<th width='150' nowrap='nowrap'>Nov No. of Responses: Satisfactory or Better</th>
									<th width='150' nowrap='nowrap'>Nov Tabulated Results: Attachment 11</th>
									<th width='150' nowrap='nowrap'>Dec Respondents</th>
									<th width='150' nowrap='nowrap'>Dec No. of Responses: Satisfactory or Better</th>
									<th width='150' nowrap='nowrap'>Dec Tabulated Results: Attachment 12</th>
									<th width='150' nowrap='nowrap'>Qtr 4 Satisfactory Rate %</th>
									<th width='150' nowrap='nowrap'>Year's Satisfactory Rate %</th>
									<th width='150' nowrap='nowrap'>Sample Accomplished Survey Form: Attachment 13</th>
									<th></th>
									<th></th>												
									</tr>";
														
								// loop through results of database query, displaying them in the table 
								$nctr=1;
								$ctr=1;

								for ($i = $start; $i < $end; $i++)
								{
									// make sure that PHP doesn't try to show results that don't exist
									if ($i == $total_results) { break; }
                                                        
									// find specific row
									$result->data_seek($i);
									$row = $result->fetch_row();
                                                                        
									//alternate color of background
									if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
									else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

									// echo out the contents of each row into a table
                                                        
									echo '<td><a href="pssurvey_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
									echo '<td><a href="pssurvey_edit.php?id=' . $row[0] . '">Edit</a></td>';

									// counter
									echo "<td id='txtright'>" . $nctr. "</td>";
									$nctr=$nctr+1;
									
												// display row data in columns
												for ($j = 1; $j < 45; $j++)
													{
														echo '<td nowrap="nowrap" ';
														if ($j == 1 || $j == 2)
															echo '>' . $row[$j];
														else
															if (($j-12)%10 == 0 || $j == 43)
																echo ' align="right">'. number_format($row[$j], 2);
															else
																if ((($j-2)%10)%3 == 0 || $j == 44)
																	echo '><a href="'. 'uploads/' . $cu_short_name . '/' . $row[$j]. '">'. $row[$j] . '</a>';
																else
																	echo ' align="right">'. number_format($row[$j]);
																
														echo '</td>';
													}
													
									echo '<td><a href="pssurvey_edit.php?id=' . $row[0] . '">Edit</a></td>';
									echo '<td><a href="pssurvey_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
									echo "</tr>";
								}

								// close table
								echo "</table>";
							}
							else
							{
								// #headerunit <a href="pssurvey_view_use_per_page.php?page=1">
								echo '<div class="viewlinks">';
								echo '<p><a href="pssurvey_input.php">Add New Record</a> | No record to display!</p>';
								echo '</div>';
							}
						}
						// error with the query
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
