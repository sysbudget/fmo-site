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

$query = "SELECT tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_id,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forma_program_id,
		tbl_sd_2_mfo2_forme_timeliness.unit_delivery_name_cu,
		tbl_sd_2_mfo2_forme_timeliness.unit_contributor_name,
		tbl_sd_2_mfo2_forma_program.ref_program_level_name,
		tbl_sd_2_mfo2_forma_program.mfo2_forma_program_name,
		DATE_FORMAT(tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_survey_date, '%m/%d/%Y') AS survey_datestr,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_survey_mode,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_enrollment,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_respondents_with_no_answer,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_respondents_with_bad_rating,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_respondents_with_fair_rating,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_respondents_with_good_rating,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_respondents_with_better_rating,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_respondents_with_best_rating,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_respondents_with_good_or_better,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_respondents,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_attachment_survey_tally_sheet,
		tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_attachment_survey_sample
	FROM tbl_sd_2_mfo2_forme_timeliness INNER JOIN tbl_sd_2_mfo2_forma_program ON tbl_sd_2_mfo2_forme_timeliness.mfo2_forma_program_id = tbl_sd_2_mfo2_forma_program.mfo2_forma_program_id
	WHERE ('$sd_users_username'='admin') OR (tbl_sd_2_mfo2_forme_timeliness.unit_contributor_id='$unit_contributor_id')
	ORDER BY tbl_sd_2_mfo2_forme_timeliness.ref_program_level_id, tbl_sd_2_mfo2_forma_program.mfo2_forma_program_name, tbl_sd_2_mfo2_forme_timeliness.mfo2_forme_timeliness_survey_date;";

$result = $mysqli->query($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>Timeliness of Education Service Delivery - View All</title>
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
				<h2>MFO 2: Timeliness of Education Service Delivery - View Records</h2>
				
                <?php
						if ($result)
						{
							if ($result->num_rows != 0)
							{
								echo '<div class="viewlinks">';
								echo '<p><a href="gradprogtimely_view_use_per_page.php?page=1">Add New Record</a> | <b>View All</b> | <a href="gradprogtimely_view_per_page.php?page=1">View Page</a></p>';
								echo '</div>';

								// display data in table
								echo "<table border='1' cellpadding='2' cellspacing='1'>";
								
								// set table headers
								echo "<tr>
									<th></th>
									<th></th>
									<th>Seq No</th>
									<th width='150' nowrap='nowrap'>Delivery Unit</th>
									<th width='150' nowrap='nowrap'>Contributing Unit</th>
									<th width='150' nowrap='nowrap'>Program Level</th>
									<th width='150' nowrap='nowrap'>Official Program Name</th>
									<th width='150' nowrap='nowrap'>Survey Date</th>
									<th width='150' nowrap='nowrap'>Survey Mode</th>
									<th width='150' nowrap='nowrap'>Total Students Enrolled</th>
									<th width='150' nowrap='nowrap'>No Answer to Survey</th>
									<th width='150' nowrap='nowrap'>Poor/Below Fair</th>
									<th width='150' nowrap='nowrap'>Fair</th>
									<th width='150' nowrap='nowrap'>Good</th>
									<th width='150' nowrap='nowrap'>Better</th>
									<th width='150' nowrap='nowrap'>Best</th>
									<th width='150' nowrap='nowrap'>Sub-total: Good, Better and Best</th>
									<th width='150' nowrap='nowrap'>Total No. of Students Surveyed</th>
									<th width='150' nowrap='nowrap'>Tabulated Results: Attachment 1</th>
									<th width='150' nowrap='nowrap'>Sample Accomplished Timeliness Survey Form: Attachment 2</th>
									<th></th>
									<th></th>
									</tr>";
														
								// loop through results of database query, displaying them in the table 
								$nctr=1;
								$ctr=1;

								while ($row = $result->fetch_row())
								{
									//alternate color of background
									if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
									else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

									// echo out the contents of each row into a table
                                                        
									echo '<td><a href="gradprogtimely_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
									echo '<td><a href="gradprogtimely_edit.php?id=' . $row[0] . '">Edit</a></td>';

									// counter
									echo "<td id='txtright'>" . $nctr. "</td>";
									$nctr=$nctr+1;
									
											// display row data in columns
											for ($j = 2; $j < 19; $j++)
											{
												echo '<td nowrap="nowrap" ';
												if ( !($j<=5 || $j==7 || $j==17 || $j==18) )
												{
													echo 'id = "txtright" >';
													if ($j==6)
														echo $row[$j];
													else echo number_format($row[$j]);
												}
												else
													if ($j==7)
														if ($row[$j]=='1')
															echo '>Conventional';
														else
															echo '>Online';
													else
														if ($j==17 || $j==18)
															echo '><a href="'. 'uploads/' . $cu_short_name . '/' . $row[$j]. '">'. $row[$j] . '</a>';
														else
															echo '>' . $row[$j];

												echo '</td>';
											}
													
									echo '<td><a href="gradprogtimely_edit.php?id=' . $row[0] . '">Edit</a></td>';
									echo '<td><a href="gradprogtimely_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
									echo "</tr>";
								}

								// close table>
								echo "</table>";
							}
							else
							{
								echo '<div class="viewlinks">';
								echo '<p><a href="gradprogtimely_input.php">Add New Record</a> | No record to display!</p>';
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
