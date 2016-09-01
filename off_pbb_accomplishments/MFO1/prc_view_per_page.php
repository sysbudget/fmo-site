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
										
$query = "SELECT tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_id,
    tbl_sd_1_mfo1_forma_program.mfo1_forma_program_id,
    tbl_sd_1_mfo1_formb_prc.unit_delivery_name_cu,
    tbl_sd_1_mfo1_formb_prc.unit_contributor_name,
	tbl_sd_1_mfo1_forma_program.ref_program_level_name,
	tbl_sd_1_mfo1_forma_program.mfo1_forma_program_name,
    tbl_sd_ref_prc_profession.prc_profession_name,
    DATE_FORMAT(tbl_sd_ref_prc.prc_examination_date, '%b-%Y') AS examdatestr,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_name_of_school,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_1st_time_takers_passers,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_1st_time_takers_failed,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_1st_time_takers_conditional,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_1st_time_takers,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_1st_time_takers_percent_passed,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_repeaters_takers_passers,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_repeaters_takers_failed,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_repeaters_takers_conditional,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_repeaters_takers,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_repeaters_takers_percent_passed,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_overall_takers_passers,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_overall_takers_failed,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_overall_takers_conditional,
	tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_overall_takers,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_up_overall_takers_percent_passed,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_source_link,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_attachment,
    tbl_sd_1_mfo1_formb_prc.mfo1_formb_prc_attachment_on_discrepancy
FROM tbl_sd_1_mfo1_forma_program, tbl_sd_1_mfo1_formb_prc, tbl_sd_ref_prc, tbl_sd_ref_prc_profession
WHERE tbl_sd_1_mfo1_forma_program.unit_contributor_id = tbl_sd_1_mfo1_formb_prc.unit_contributor_id
	AND tbl_sd_1_mfo1_forma_program.mfo1_forma_program_id = tbl_sd_1_mfo1_formb_prc.mfo1_forma_program_id
	AND tbl_sd_1_mfo1_formb_prc.prc_id = tbl_sd_ref_prc.prc_id
	AND tbl_sd_ref_prc.prc_profession_id = tbl_sd_ref_prc_profession.prc_profession_id
	AND (('$sd_users_username'='admin') OR (tbl_sd_1_mfo1_forma_program.unit_contributor_id = '$unit_contributor_id'))
ORDER BY tbl_sd_1_mfo1_forma_program.ref_program_level_id, tbl_sd_1_mfo1_forma_program.mfo1_forma_program_name, tbl_sd_ref_prc_profession.prc_profession_name, tbl_sd_ref_prc.prc_examination_date;";

$result = $mysqli->query($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>PRC Licensure Exam - View Per Page</title>
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
				<h2>MFO 1: PRC Licensure Examination - View Records</h2>
                
                <?php
						if ($result)
						{

							if ($result->num_rows != 0)
							{
								echo "<div class='viewlinks'>";
								echo "<p><a href='prc_view_use_per_page.php?page=1'>Add New Record</a> | ";
								echo "<a href='prc_view_all.php'>View All</a> | <b>View Page:</b> ";

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
										echo "<a href='prc_view_per_page.php?page=$i'>$i</a> ";
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
									<th width='150' nowrap='nowrap'>Program Level</th>
									<th width='150' nowrap='nowrap'>Official Program Name</th>
									<th width='150' nowrap='nowrap'>PRC Licensure Examination</th>
									<th width='150' nowrap='nowrap'>Examination Date</th>
									<th width='150' nowrap='nowrap'>Name of School</th>
									<th width='150' nowrap='nowrap'>UP First-timers: Passed</th>
									<th width='150' nowrap='nowrap'>UP First-timers: Failed</th>
									<th width='150' nowrap='nowrap'>UP First-timers: Conditional</th>
									<th width='150' nowrap='nowrap'>UP First-timers: Total</th>
									<th width='150' nowrap='nowrap'>UP First-timers: % Passed</th>
									<th width='150' nowrap='nowrap'>UP Repeaters: Passed</th>
									<th width='150' nowrap='nowrap'>UP Repeaters: Failed</th>
									<th width='150' nowrap='nowrap'>UP Repeaters: Conditional</th>
									<th width='150' nowrap='nowrap'>UP Repeaters: Total</th>
									<th width='150' nowrap='nowrap'>UP Repeaters: % Passed</th>
									<th width='150' nowrap='nowrap'>UP Overall: Passed</th>
									<th width='150' nowrap='nowrap'>UP Overall: Failed</th>
									<th width='150' nowrap='nowrap'>UP Overall: Conditional</th>
									<th width='150' nowrap='nowrap'>UP Overall: Total</th>
									<th width='150' nowrap='nowrap'>UP Overall: % Passed</th>
									<th width='150' nowrap='nowrap'>Source Document Link (PRC Website)</th>
									<th width='150' nowrap='nowrap'>UP Official Results from PRC: Attachment 1</th>
									<th width='150' nowrap='nowrap'>Results from Source Other Than PRC: Attachment 2</th>
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
                                                        
									echo '<td><a href="prc_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
									echo '<td><a href="prc_edit.php?id=' . $row[0] . '">Edit</a></td>';

									// counter
									echo "<td id='txtright'>" . $nctr. "</td>";
									$nctr=$nctr+1;
									
												// display row data in columns
												for ($j = 2; $j < 27; $j++)
													{
														echo '<td nowrap="nowrap" ';
														if ($j >= 7 && $j <=23)
														{ 
															echo 'id = "txtright">';
															if ($j==13 || $j==18 || $j==23)
																echo number_format($row[$j], 2);
															else
															{
																if ($j==7 || $j==8)
																	echo $row[$j];
																else
																	echo number_format($row[$j]);
															}
														}
														else
															switch ($j)
															{
																case 24:
																	echo '><a href="' . $row[$j] . '" target="_blank">'. $row[$j] . '</a>';
																	break;
																case 25:
																	echo '><a href="'. 'uploads/' . $cu_short_name . '/' . $row[$j]. '">'. $row[$j] . '</a>';
																	break;
																case 26:
																	echo '><a href="'. 'uploads/' . $cu_short_name . '/' . $row[$j]. '">'. $row[$j] . '</a>';
																	break;
																default:
																	echo '>' . $row[$j];
																	break;
															}

														echo '</td>';
													}
													
									echo '<td><a href="prc_edit.php?id=' . $row[0] . '">Edit</a></td>';
									echo '<td><a href="prc_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
									echo "</tr>";
								}

								// close table
								echo "</table>";
							}
							else
							{
								echo "<div class='viewlinks'>";
								echo "<p><a href='prc_view_use_per_page.php?page=1'>Add New Record</a> | No record to display!";
								echo '</p></div>';
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
