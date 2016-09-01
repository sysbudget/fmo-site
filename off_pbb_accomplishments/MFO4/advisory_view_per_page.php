<?php
				session_name("pbb");
				session_start();
				// is the one accessing this page logged in or not?

				if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

				// not logged in, move to login page

				header('Location: ../login/login_mysqli.php');

				exit;

				}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>View Records</title>
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
                <h2>MFO4: Advisory Services - View Records</h2>
                
                <?php
				// connect to the database
					include('../connect-db.php');
                        
                        // number of results to show per page
                                        $per_page = 50;
                                        
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

						$unit_delivery_name_short = $_SESSION['unit_delivery_name_short'];
						$unit_contributor_name_short = $_SESSION['unit_contributor_name_short'];

// figure out the total pages in the database
if ($sd_users_username == 'admin') {
$query = "SELECT 
unit_delivery_name_cu,
unit_contributor_name,
mfo4_formb_advisory_title,
mfo4_formb_advisory_place,
mfo4_formb_advisory_date,
mfo4_formb_advisory_request_mode,
mfo4_formb_advisory_no_of_persons_requested,
mfo4_formb_advisory_request_attachment,
mfo4_formb_advisory_no_of_requests_responded_witin_3_days,
mfo4_formb_advisory_no_of_persons_served,
mfo4_formb_advisory_considered_in_gaa,
mfo4_formb_advisory_survey_conducted,
mfo4_formb_advisory_survey_mode,
mfo4_formb_advisory_was_a_survey_conducted_to_rate_advisory,
mfo4_formb_advisory_no_of_presons_surveyed_to_rate_advisory,
mfo4_formb_advisory_surveyed_to_rate_advisory_no_answer,
mfo4_formb_advisory_surveyed_to_rate_advisory_bad,
mfo4_formb_advisory_surveyed_to_rate_advisory_fair,
mfo4_formb_advisory_surveyed_to_rate_advisory_good,
mfo4_formb_advisory_surveyed_to_rate_advisory_better,
mfo4_formb_advisory_surveyed_to_rate_advisory_best,
mfo4_formb_advisory_survey_form_to_rate_advisory_attachment,
mfo4_formb_advisory_no_of_lgu_communities_assisted,
mfo4_formb_advisory_was_a_survey_conducted_to_ask_if_timely,
mfo4_formb_advisory_no_of_presons_surveyed_to_ask_if_timely,
mfo4_formb_advisory_surveyed_to_ask_if_timely_no_answer,
mfo4_formb_advisory_surveyed_to_ask_if_timely_bad,
mfo4_formb_advisory_surveyed_to_ask_if_timely_fair,
mfo4_formb_advisory_surveyed_to_ask_if_timely_good,
mfo4_formb_advisory_surveyed_to_ask_if_timely_better,
mfo4_formb_advisory_surveyed_to_ask_if_timely_best,
mfo4_formb_advisory_survey_form_to_ask_if_timely_attachment,
mfo4_formb_advisory_survey_tally_sheet,
mfo4_formb_advisory_id
FROM tbl_sd_4_mfo4_formb_advisory 
ORDER BY mfo4_formb_advisory_title ASC,
mfo4_formb_advisory_id DESC" ;
}
else {
$query = "SELECT 
unit_delivery_name_cu,
unit_contributor_name,
mfo4_formb_advisory_title,
mfo4_formb_advisory_place,
mfo4_formb_advisory_date,
mfo4_formb_advisory_request_mode,
mfo4_formb_advisory_no_of_persons_requested,
mfo4_formb_advisory_request_attachment,
mfo4_formb_advisory_no_of_requests_responded_witin_3_days,
mfo4_formb_advisory_no_of_persons_served,
mfo4_formb_advisory_considered_in_gaa,
mfo4_formb_advisory_survey_conducted,
mfo4_formb_advisory_survey_mode,
mfo4_formb_advisory_was_a_survey_conducted_to_rate_advisory,
mfo4_formb_advisory_no_of_presons_surveyed_to_rate_advisory,
mfo4_formb_advisory_surveyed_to_rate_advisory_no_answer,
mfo4_formb_advisory_surveyed_to_rate_advisory_bad,
mfo4_formb_advisory_surveyed_to_rate_advisory_fair,
mfo4_formb_advisory_surveyed_to_rate_advisory_good,
mfo4_formb_advisory_surveyed_to_rate_advisory_better,
mfo4_formb_advisory_surveyed_to_rate_advisory_best,
mfo4_formb_advisory_survey_form_to_rate_advisory_attachment,
mfo4_formb_advisory_no_of_lgu_communities_assisted,
mfo4_formb_advisory_was_a_survey_conducted_to_ask_if_timely,
mfo4_formb_advisory_no_of_presons_surveyed_to_ask_if_timely,
mfo4_formb_advisory_surveyed_to_ask_if_timely_no_answer,
mfo4_formb_advisory_surveyed_to_ask_if_timely_bad,
mfo4_formb_advisory_surveyed_to_ask_if_timely_fair,
mfo4_formb_advisory_surveyed_to_ask_if_timely_good,
mfo4_formb_advisory_surveyed_to_ask_if_timely_better,
mfo4_formb_advisory_surveyed_to_ask_if_timely_best,
mfo4_formb_advisory_survey_form_to_ask_if_timely_attachment,
mfo4_formb_advisory_survey_tally_sheet,
mfo4_formb_advisory_id
FROM tbl_sd_4_mfo4_formb_advisory 
WHERE unit_contributor_id = '$unit_contributor_id' 
ORDER BY mfo4_formb_advisory_title ASC,
mfo4_formb_advisory_id DESC" ;
}
										if ($result = $mysqli->query($query))
                                        {
                                                if ($result->num_rows != 0)
                                                {
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
                                                        echo "<div class='viewlinks'>";
														echo "<p><a href='advisory_input.php'>Add New Record</a> | ";
														echo "<a href='advisory_view_all.php'>View All</a> | <b>View Page:</b> ";
                                                        for ($i = 1; $i <= $total_pages; $i++)
                                                        {
                                                                if (isset($_GET['page']) && $_GET['page'] == $i)
                                                                {
                                                                        echo $i . " ";
                                                                }
                                                                else
                                                                {
                                                                        echo "<a href='advisory_view_per_page.php?page=$i'>$i</a> ";
                                                                }
                                                        }
                                                        echo "</div>";
                                                        echo "</p>";

                                                        
                                                        // display data in table
														
                                                echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        		echo "<tr>
														<th></th>
														<th></th>
														<th>Seq. No.</th>
														<th width='150' nowrap='nowrap'>Delivery Unit</th>
														<th width='150' nowrap='nowrap'>Contributing Unit</th>
														<th width='150' nowrap='nowrap'>Advisory Service Title</th>
														<th width='150' nowrap='nowrap'>Advisory Service Venue</th>
														<th width='150' nowrap='nowrap'>Advisory Service Date</th>
														<th width='150' nowrap='nowrap'>Request Mode</th>
														<th width='150' nowrap='nowrap'>Request Count</th>
														<th width='150' nowrap='nowrap'>Attachment 1</th>
														<th width='150' nowrap='nowrap'>Request Acted<br/>w/in 3 Days</th>
														<th width='150' nowrap='nowrap'>Number of Clients</th>
														<th width='150' nowrap='nowrap'>Considered for GAA/BP</th>
														<th width='150' nowrap='nowrap'>Survey Conducted</th>
														<th width='150' nowrap='nowrap'>Rating Survey Mode</th>
														<th width='150' nowrap='nowrap'>Rating Survey<br/>Conducted</th>
														<th width='150' nowrap='nowrap'>Rating Survey Size</th>
														<th width='150' nowrap='nowrap'>No Answer Count<br/>on Rating</th>
														<th width='150' nowrap='nowrap'>Poor Count<br/>on Rating</th>
														<th width='150' nowrap='nowrap'>Fair Count<br/>on Rating</th>
														<th width='150' nowrap='nowrap'>Good Count<br/>on Rating</th>
														<th width='150' nowrap='nowrap'>Better Count<br/>on Rating</th>
														<th width='150' nowrap='nowrap'>Best Count<br/>on Rating</th>
														<th width='150' nowrap='nowrap'>Attachment 2</th>
														<th width='150' nowrap='nowrap'>LGU/Communities/Clientele<br/>Assisted Count</th>
														<th width='150' nowrap='nowrap'>Timeliness Survey<br/>Conducted</th>
														<th width='150' nowrap='nowrap'>Timeliness<br/>Survey Size</th>
														<th width='150' nowrap='nowrap'>No Answer Count<br/>on Timeliness</th>
														<th width='150' nowrap='nowrap'>Poor Count<br/>on Timeliness</th>
														<th width='150' nowrap='nowrap'>Fair Count<br/>on Timeliness</th>
														<th width='150' nowrap='nowrap'>Good Count<br/>on Timeliness</th>
														<th width='150' nowrap='nowrap'>Better Count<br/>on Timeliness</th>
														<th width='150' nowrap='nowrap'>Best Count<br/>on Timeliness</th>
														<th width='150' nowrap='nowrap'>Attachment 3</th>
														<th width='150' nowrap='nowrap'>Attachment 4</th>
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
                                                        
														echo '<td><a href="advisory_delete.php?id=' . $row[33] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        echo '<td><a href="advisory_edit.php?id=' . $row[33] . '">Edit</a></td>';

														// counter
														echo "<td id='txtright'>" . $nctr. "</td>";
														$nctr=$nctr+1;
														// records
                                                        echo '<td nowrap="nowrap">' . $row[0] . '</td>';
														echo '<td nowrap="nowrap">' . $row[1] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[2] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[3] . '</td>';
														$start_date = strtotime($row[4]);
                                                        echo '<td id="txtright">' . date("m/d/Y",$start_date) . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[5] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[6] . '</td>';
														//View PDF
														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[7] . ">" . $row[7] . "</a></td>";
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[8] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[9] . '</td>';

                                                        $temp0='';
														if ($row[10] == 'Y'){
															$temp0 = 'Yes';
															}
															else
															{
															$temp0 = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp0 . '</td>';

                                                        $temp1='';
														if ($row[11] == 'Y'){
															$temp1 = 'Yes';
															}
															else
															{
															$temp1 = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp1 . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[12] . '</td>';

                                                        $temp2='';
														if ($row[13] == 'Y'){
															$temp2 = 'Yes';
															}
															else
															{
															$temp2 = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp2 . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[14] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[15] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[16] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[17] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[18] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[19] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[20] . '</td>';
														//View PDF
														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[21] . ">" . $row[21] . "</a></td>";
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[22] . '</td>';

                                                        $temp3='';
														if ($row[23] == 'Y'){
															$temp3 = 'Yes';
															}
															else
															{
															$temp3 = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp3 . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[24] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[25] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[26] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[27] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[28] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[29] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[30] . '</td>';
														//View PDF
														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[31] . ">" . $row[31] . "</a></td>";
														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[32] . ">" . $row[32] . "</a></td>";
                                                        
                                                        echo '<td><a href="advisory_edit.php?id=' . $row[33] . '">Edit</a></td>';
                                                        echo '<td><a href="advisory_delete.php?id=' . $row[33] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        
														echo "</tr>";
                                                        }

                                                        // close table>
                                                        echo "</table>";
                                                }
                                                else
                                                {
														echo "<p><a href='advisory_input.php'>Add New Record</a> | ";
                                                        echo "No record to display!";
                                                } 
                                        }
                                        // error with the query
                                        else
                                        {
                                                echo "Error: " . $mysqli->error;
                                        }
                                                
                        // close database connection
                        $mysqli->close();
                ?>
             </div> 
        </body>
</html>
