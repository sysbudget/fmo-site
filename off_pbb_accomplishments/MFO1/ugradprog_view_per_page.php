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

// path of upload after root
$path_name = "uploads/" . $cu_short_name;

// connect to the database
include_once('../connect-db.php');

$query = "SELECT mfo1_forma_program_id, unit_delivery_name_cu, unit_contributor_name, ref_program_level_name, mfo1_forma_program_name, mfo1_forma_program_normal_length, mfo1_forma_program_ra_9500_bor_approval_meeting_no, DATE_FORMAT(mfo1_forma_program_ra_9500_bor_approval_meeting_date, '%m/%d/%Y') AS bor_mtg_datestr, mfo1_forma_program_enrollment_in_terminal_year, mfo1_forma_program_graduates_qtr1, mfo1_forma_program_graduates_qtr1_within_timeframe, mfo1_forma_program_graduates_qtr1_attachment, mfo1_forma_program_graduates_qtr2, mfo1_forma_program_graduates_qtr2_within_timeframe, mfo1_forma_program_graduates_qtr2_attachment, mfo1_forma_program_graduates_qtr3, mfo1_forma_program_graduates_qtr3_within_timeframe, mfo1_forma_program_graduates_qtr3_attachment, mfo1_forma_program_graduates_qtr4, mfo1_forma_program_graduates_qtr4_within_timeframe, mfo1_forma_program_graduates_qtr4_attachment, mfo1_forma_program_graduates_total, mfo1_forma_program_graduates_total_within_timeframe, mfo1_forma_program_curriculum_attachment, mfo1_forma_program_with_board, unit_contributor_id FROM tbl_sd_1_mfo1_forma_program WHERE ('$sd_users_username'='admin') OR (unit_contributor_id='$unit_contributor_id') ORDER BY ref_program_level_id, mfo1_forma_program_name;" ;

$result = $mysqli->query($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>Undergraduate Degree Program - View Per Page</title>
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
				<h2>MFO 1: Undergraduate Degree Program - View Records</h2>
                
                <?php
						if ($result)
						{
							
							if ($result->num_rows != 0)
							{
								echo '<div class="viewlinks">';
								echo '<p><a href="ugradprog_input.php">Add New Record</a> | ';
								echo '<a href="ugradprog_view_all.php">View All</a> | <b>View Page:</b> ';

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
										echo "<a href='ugradprog_view_per_page.php?page=$i'>$i</a> ";
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
									<th width='150' nowrap='nowrap'>Length (in Years)</th>
									<th width='150' nowrap='nowrap'>BOR Approval: Meeting No.</th>
									<th width='150' nowrap='nowrap'>BOR Approval: Meeting Date</th>
									<th width='150' nowrap='nowrap'>Enrollment (Terminal Yr)</th>
									<th width='150' nowrap='nowrap'>Jan-Mar Diploma Recipients: Total</th>
									<th width='150' nowrap='nowrap'>Jan-Mar Diploma Recipients: Grad within Timeframe</th>
									<th width='150' nowrap='nowrap'>Jan-Mar List of Graduates: Attachment 1</th>
									<th width='150' nowrap='nowrap'>Apr-Jun Diploma Recipients: Total</th>
									<th width='150' nowrap='nowrap'>Apr-Jun Diploma Recipients: Grad within Timeframe</th>
									<th width='150' nowrap='nowrap'>Apr-Jun List of Graduates: Attachment 2</th>
									<th width='150' nowrap='nowrap'>Jul-Sep Diploma Recipients: Total</th>
									<th width='150' nowrap='nowrap'>Jul-Sep Diploma Recipients: Grad within Timeframe</th>
									<th width='150' nowrap='nowrap'>Jul-Sep List of Graduates: Attachment 3</th>
									<th width='150' nowrap='nowrap'>Oct-Dec Diploma Recipients: Total</th>
									<th width='150' nowrap='nowrap'>Oct-Dec Diploma Recipients: Grad within Timeframe</th>
									<th width='150' nowrap='nowrap'>Oct-Dec List of Graduates: Attachment 4</th>
									<th width='150' nowrap='nowrap'>Total for the Year</th>
									<th width='150' nowrap='nowrap'>Total for the Year: Grad within Timeframe</th>
									<th width='150' nowrap='nowrap'>Curriculum Checklist: Attachment 5</th>
									<th width='150' nowrap='nowrap'>Is a professional/board program?</th>
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
                                                        
									echo '<td><a href="ugradprog_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
									echo '<td><a href="ugradprog_edit.php?id=' . $row[0] . '">Edit</a></td>';

									// counter
									echo "<td id='txtright'>" . $nctr. "</td>";
									$nctr=$nctr+1;
									
												// display row data in columns
												for ($j = 1; $j < 25; $j++)
													{
														echo '<td nowrap="nowrap" ';
														
														switch ($j)
														{
															case 5:
																echo 'id = "txtright" >' . $row[$j];
																break;
															case 6:
																echo 'id = "txtright" >' . $row[$j];
																break;
															case 7:
																echo 'id = "txtright" >' . $row[$j];
																break;
															case 8:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															case 9:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															case 10:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															case 11:
																echo '><a href="'. $path_name . '/' . $row[$j]. '">'. $row[$j] . '</a>';
																break;
															case 12:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															case 13:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															case 14:
																echo '><a href="'. $path_name . '/' . $row[$j]. '">'. $row[$j] . '</a>';
																break;
															case 15:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															case 16:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															case 17:
																echo '><a href="'. $path_name . '/' . $row[$j]. '">'. $row[$j] . '</a>';
																break;
															case 18:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															case 19:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															case 20:
																echo '><a href="'. $path_name . '/' . $row[$j]. '">'. $row[$j] . '</a>';
																break;
															case 21:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															case 22:
																echo 'id = "txtright" >' . number_format($row[$j]);
																break;
															case 23:
																echo '><a href="'. $path_name . '/' . $row[$j]. '">'. $row[$j] . '</a>';
																break;
															case 24:
																if ($row[$j]=="1" || $row[$j]=="Y")
																	echo ">Yes";
																else
																	echo ">No";
																break;
															default:
																echo '>' . $row[$j];
																break;
														}
														
														echo '</td>';
													}
													
									echo '<td><a href="ugradprog_edit.php?id=' . $row[0] . '">Edit</a></td>';
									echo '<td><a href="ugradprog_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
									echo "</tr>";
								}

								// close table
								echo "</table>";
							}
							else
							{
								echo '<div class="viewlinks">';
								echo '<p><a href="ugradprog_input.php">Add New Record</a> | No record to display!</p>';
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
