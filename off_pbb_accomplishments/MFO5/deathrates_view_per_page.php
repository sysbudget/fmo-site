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

$query = "SELECT tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_id,
		tbl_units_contributor.unit_delivery_name_cu,
		tbl_units_contributor.unit_contributor_name,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_jan_discharges,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_jan_deaths,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_jan_deaths_less_48hrs,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_feb_discharges,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_feb_deaths,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_feb_deaths_less_48hrs,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_mar_discharges,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_mar_deaths,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_mar_deaths_less_48hrs,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_qtr1_net_death_rate,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_apr_discharges,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_apr_deaths,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_apr_deaths_less_48hrs,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_may_discharges,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_may_deaths,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_may_deaths_less_48hrs,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_jun_discharges,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_jun_deaths,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_jun_deaths_less_48hrs,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_qtr2_net_death_rate,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_jul_discharges,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_jul_deaths,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_jul_deaths_less_48hrs,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_aug_discharges,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_aug_deaths,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_aug_deaths_less_48hrs,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_sep_discharges,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_sep_deaths,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_sep_deaths_less_48hrs,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_qtr3_net_death_rate,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_oct_discharges,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_oct_deaths,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_oct_deaths_less_48hrs,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_nov_discharges,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_nov_deaths,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_nov_deaths_less_48hrs,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_dec_discharges,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_dec_deaths,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_dec_deaths_less_48hrs,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_qtr4_net_death_rate,
		tbl_sd_5_mfo5_6_death_rate.mfo5_6_death_rate_all_net_death_rate
	FROM tbl_sd_5_mfo5_6_death_rate INNER JOIN tbl_units_contributor ON tbl_sd_5_mfo5_6_death_rate.unit_contributor_id=tbl_units_contributor.unit_contributor_id
	WHERE '$sd_users_username'='admin' OR tbl_sd_5_mfo5_6_death_rate.unit_contributor_id='$unit_contributor_id';";
// #headerunit

$result = $mysqli->query($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>In-Patient Net Death Rates - View Per Page</title>
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
				<h2>MFO 5: In-Patient Net Death Rates - View Records</h2>
                
                <?php
						if ($result)
						{
							
							if ($result->num_rows != 0)
							{
								echo '<div class="viewlinks">';
								// #headerunit <a href="deathrates_view_use_per_page.php?page=1">
								echo "<p>";
								// Comment out next line - Add New not allowed anymore if at least one record exists
								// <a href="deathrates_input.php">Add New Record</a> | ';
								echo '<a href="deathrates_view_all.php">View All</a> | <b>View Page:</b> ';

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
										echo "<a href='deathrates_view_per_page.php?page=$i'>$i</a> ";
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
									<th width='150' nowrap='nowrap'>Jan Discharges</th>
									<th width='150' nowrap='nowrap'>Jan Deaths</th>
									<th width='150' nowrap='nowrap'>Jan Deaths less than 48 hrs</th>
									<th width='150' nowrap='nowrap'>Feb Discharges</th>
									<th width='150' nowrap='nowrap'>Feb Deaths</th>
									<th width='150' nowrap='nowrap'>Feb Deaths less than 48 hrs</th>
									<th width='150' nowrap='nowrap'>Mar Discharges</th>
									<th width='150' nowrap='nowrap'>Mar Deaths</th>
									<th width='150' nowrap='nowrap'>Mar Deaths less than 48 hrs</th>
									<th width='150' nowrap='nowrap'>Qtr 1 Net Death Rate %</th>
									<th width='150' nowrap='nowrap'>Apr Discharges</th>
									<th width='150' nowrap='nowrap'>Apr Deaths</th>
									<th width='150' nowrap='nowrap'>Apr Deaths less than 48 hrs</th>
									<th width='150' nowrap='nowrap'>May Discharges</th>
									<th width='150' nowrap='nowrap'>May Deaths</th>
									<th width='150' nowrap='nowrap'>May Deaths less than 48 hrs</th>
									<th width='150' nowrap='nowrap'>Jun Discharges</th>
									<th width='150' nowrap='nowrap'>Jun Deaths</th>
									<th width='150' nowrap='nowrap'>Jun Deaths less than 48 hrs</th>
									<th width='150' nowrap='nowrap'>Qtr 2 Net Death Rate %</th>
									<th width='150' nowrap='nowrap'>Jul Discharges</th>
									<th width='150' nowrap='nowrap'>Jul Deaths</th>
									<th width='150' nowrap='nowrap'>Jul Deaths less than 48 hrs</th>
									<th width='150' nowrap='nowrap'>Aug Discharges</th>
									<th width='150' nowrap='nowrap'>Aug Deaths</th>
									<th width='150' nowrap='nowrap'>Aug Deaths less than 48 hrs</th>
									<th width='150' nowrap='nowrap'>Sep Discharges</th>
									<th width='150' nowrap='nowrap'>Sep Deaths</th>
									<th width='150' nowrap='nowrap'>Sep Deaths less than 48 hrs</th>
									<th width='150' nowrap='nowrap'>Qtr 3 Net Death Rate %</th>
									<th width='150' nowrap='nowrap'>Oct Discharges</th>
									<th width='150' nowrap='nowrap'>Oct Deaths</th>
									<th width='150' nowrap='nowrap'>Oct Deaths less than 48 hrs</th>
									<th width='150' nowrap='nowrap'>Nov Discharges</th>
									<th width='150' nowrap='nowrap'>Nov Deaths</th>
									<th width='150' nowrap='nowrap'>Nov Deaths less than 48 hrs</th>
									<th width='150' nowrap='nowrap'>Dec Discharges</th>
									<th width='150' nowrap='nowrap'>Dec Deaths</th>
									<th width='150' nowrap='nowrap'>Dec Deaths less than 48 hrs</th>
									<th width='150' nowrap='nowrap'>Qtr 4 Net Death Rate %</th>
									<th width='150' nowrap='nowrap'>Year's Net Death Rate %</th>
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
                                                        
									echo '<td><a href="deathrates_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
									echo '<td><a href="deathrates_edit.php?id=' . $row[0] . '">Edit</a></td>';

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
															if (($j-12)%10 == 0 || $j == 43)
																echo ' align="right">'. number_format($row[$j], 2);
															else
																echo ' align="right">'. number_format($row[$j]);
														
														echo '</td>';
													}
													
									echo '<td><a href="deathrates_edit.php?id=' . $row[0] . '">Edit</a></td>';
									echo '<td><a href="deathrates_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
									echo "</tr>";
								}

								// close table
								echo "</table>";
							}
							else
							{
								// #headerunit <a href="deathrates_view_use_per_page.php?page=1">
								echo '<div class="viewlinks">';
								echo '<p><a href="deathrates_input.php">Add New Record</a> | No record to display!</p>';
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
