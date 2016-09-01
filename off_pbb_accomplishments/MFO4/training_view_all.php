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
                <h2>MFO4: Training/Extension Services - View Records</h2>
                <?php
				// connect to the database
					include('../connect-db.php');
                        
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

if ($sd_users_username == 'admin') {
$query = "SELECT 
unit_delivery_name_cu,
unit_contributor_name,
mfo4_forma_trainings_title_of_training,
mfo4_forma_trainings_place_venue,
mfo4_forma_trainings_date_description,
mfo4_forma_trainings_date,
mfo4_forma_trainings_request_mode,
mfo4_forma_trainings_requested_by,
mfo4_forma_trainings_no_of_clients_who_requested,
mfo4_forma_trainings_no_of_requests_responded_witin_3_days,
mfo4_forma_trainings_no_of_persons_trained,
mfo4_forma_trainings_training_hours,
mfo4_forma_trainings_request_attachment,
mfo4_forma_trainings_considered_in_gaa,
mfo4_forma_trainings_survey_conducted,
mfo4_forma_trainings_was_a_survey_conducted_to_rate_training,
mfo4_forma_trainings_surveyed_to_rate_training_survey_mode,
mfo4_forma_trainings_no_of_persons_surveyed_to_rate_training,
mfo4_forma_trainings_surveyed_to_rate_training_no_answer,
mfo4_forma_trainings_surveyed_to_rate_training_bad,
mfo4_forma_trainings_surveyed_to_rate_training_fair,
mfo4_forma_trainings_surveyed_to_rate_training_good,
mfo4_forma_trainings_surveyed_to_rate_training_better,
mfo4_forma_trainings_surveyed_to_rate_training_best,
mfo4_forma_trainings_survey_form_to_rate_training_attachment,
mfo4_forma_trainings_was_a_survey_conducted_to_ask_if_timely,
mfo4_forma_trainings_no_of_persons_surveyed_to_ask_if_timely,
mfo4_forma_trainings_surveyed_to_ask_if_timely_no_answer,
mfo4_forma_trainings_surveyed_to_ask_if_timely_bad,
mfo4_forma_trainings_surveyed_to_ask_if_timely_fair,
mfo4_forma_trainings_surveyed_to_ask_if_timely_good,
mfo4_forma_trainings_surveyed_to_ask_if_timely_better,
mfo4_forma_trainings_surveyed_to_ask_if_timely_best,
mfo4_forma_trainings_surveyed_to_ask_if_timely_attachment,
mfo4_forma_trainings_survey_tally_sheet_attachment,
mfo4_forma_trainings_id
FROM tbl_sd_4_mfo4_forma_trainings 
ORDER BY mfo4_forma_trainings_title_of_training ASC,
mfo4_forma_trainings_id DESC" ;
}
else {
$query = "SELECT 
unit_delivery_name_cu,
unit_contributor_name,
mfo4_forma_trainings_title_of_training,
mfo4_forma_trainings_place_venue,
mfo4_forma_trainings_date_description,
mfo4_forma_trainings_date,
mfo4_forma_trainings_request_mode,
mfo4_forma_trainings_requested_by,
mfo4_forma_trainings_no_of_clients_who_requested,
mfo4_forma_trainings_no_of_requests_responded_witin_3_days,
mfo4_forma_trainings_no_of_persons_trained,
mfo4_forma_trainings_training_hours,
mfo4_forma_trainings_request_attachment,
mfo4_forma_trainings_considered_in_gaa,
mfo4_forma_trainings_survey_conducted,
mfo4_forma_trainings_was_a_survey_conducted_to_rate_training,
mfo4_forma_trainings_surveyed_to_rate_training_survey_mode,
mfo4_forma_trainings_no_of_persons_surveyed_to_rate_training,
mfo4_forma_trainings_surveyed_to_rate_training_no_answer,
mfo4_forma_trainings_surveyed_to_rate_training_bad,
mfo4_forma_trainings_surveyed_to_rate_training_fair,
mfo4_forma_trainings_surveyed_to_rate_training_good,
mfo4_forma_trainings_surveyed_to_rate_training_better,
mfo4_forma_trainings_surveyed_to_rate_training_best,
mfo4_forma_trainings_survey_form_to_rate_training_attachment,
mfo4_forma_trainings_was_a_survey_conducted_to_ask_if_timely,
mfo4_forma_trainings_no_of_persons_surveyed_to_ask_if_timely,
mfo4_forma_trainings_surveyed_to_ask_if_timely_no_answer,
mfo4_forma_trainings_surveyed_to_ask_if_timely_bad,
mfo4_forma_trainings_surveyed_to_ask_if_timely_fair,
mfo4_forma_trainings_surveyed_to_ask_if_timely_good,
mfo4_forma_trainings_surveyed_to_ask_if_timely_better,
mfo4_forma_trainings_surveyed_to_ask_if_timely_best,
mfo4_forma_trainings_surveyed_to_ask_if_timely_attachment,
mfo4_forma_trainings_survey_tally_sheet_attachment,
mfo4_forma_trainings_id
FROM tbl_sd_4_mfo4_forma_trainings
WHERE unit_contributor_id = '$unit_contributor_id' 
ORDER BY mfo4_forma_trainings_title_of_training ASC,
mfo4_forma_trainings_id DESC" ;
}
						if ($result = $mysqli->query($query))
						{									
                                // display records if there are records to display
                                if ($result->num_rows > 0)
                                {
										
										// display records in a table
                                        echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        echo "<div class='viewlinks'>";
										echo "<p><a href='training_input.php'>Add New Record</a> | ";
										echo "<b>View All</b> | <a href='training_view_per_page.php'>View Page:</a> ";
                                        echo "</div>";
										
		                                        // set table headers
                                        		echo 
												"<tr>
													<th></th>
													<th></th>
													<th>Seq. No.</th>
														<th width='150' nowrap='nowrap'>Delivery Unit</th>
														<th width='150' nowrap='nowrap'>Contributing Unit</th>
														<th width='150' nowrap='nowrap'>Extension Title</th>
														<th width='150' nowrap='nowrap'>Extension Venue</th>
														<th width='150' nowrap='nowrap'>Date Certificate Granted</th>
														<th width='150' nowrap='nowrap'>Date Started</th>
														<th width='150' nowrap='nowrap'>Request Mode</th>
														<th width='150' nowrap='nowrap'>Requester</th>
														<th width='150' nowrap='nowrap'>Request Count</th>
														<th width='150' nowrap='nowrap'>Request Acted<br/>w/in 3 Days</th>
														<th width='150' nowrap='nowrap'>Trainees Count</th>
														<th width='150' nowrap='nowrap'>Training Hours</th>
														<th width='150' nowrap='nowrap'>Attachment 1</th>
														<th width='150' nowrap='nowrap'>Considered for GAA/BP</th>
														<th width='150' nowrap='nowrap'>Survey Conducted</th>
														<th width='150' nowrap='nowrap'>Rating Survey Mode</th>
														<th width='150' nowrap='nowrap'>Training Rating<br/>Conducted</th>
														<th width='150' nowrap='nowrap'>Rating Survey Size</th>
														<th width='150' nowrap='nowrap'>No Answer Count<br/>on Rating</th>
														<th width='150' nowrap='nowrap'>Poor Count<br/>on Rating</th>
														<th width='150' nowrap='nowrap'>Fair Count<br/>on Rating</th>
														<th width='150' nowrap='nowrap'>Good Count<br/>on Rating</th>
														<th width='150' nowrap='nowrap'>Better Count<br/>on Rating</th>
														<th width='150' nowrap='nowrap'>Best Count<br/>on Rating</th>
														<th width='150' nowrap='nowrap'>Attachment 2</th>
														<th width='150' nowrap='nowrap'>Timeliness Rating<br/>Conducted</th>
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
											
										$nctr=1;
                                        $ctr=1;
                                        while ($row = $result->fetch_object())
                                        {
                                                // alternate color of background
                                        		if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
												else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

												// set up a row for each record
                                                echo "<td><a href='training_delete.php?id=" . $row->mfo4_forma_trainings_id . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='training_edit.php?id=" . $row->mfo4_forma_trainings_id . "'>Edit</a></td>";
												// counter
												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												// records
												echo "<td nowrap='nowrap'>" . $row->unit_delivery_name_cu . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit_contributor_name . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->mfo4_forma_trainings_title_of_training . "</td>";
												echo "<td nowrap='nowrap'>" . $row->mfo4_forma_trainings_place_venue . "</td>";
												echo "<td nowrap='nowrap'>" . $row->mfo4_forma_trainings_date_description . "</td>";
												$start_date = strtotime($row->mfo4_forma_trainings_date);
                                                echo '<td id="txtright">' . date("m/d/Y",$start_date) . '</td>';
                                                echo "<td nowrap='nowrap'>" . $row->mfo4_forma_trainings_request_mode . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->mfo4_forma_trainings_requested_by . "</td>";
												echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_no_of_clients_who_requested . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_no_of_requests_responded_witin_3_days . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_no_of_persons_trained . "</td>";
												echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_training_hours . "</td>";
												//View PDF
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->mfo4_forma_trainings_request_attachment . ">" . $row->mfo4_forma_trainings_request_attachment . "</a></td>";

														$temp0 = $row->mfo4_forma_trainings_considered_in_gaa;
														if ( $temp0 == 'Y'){
															$temp0 = 'Yes';
															}
															else
															{
															$temp0 = 'No';
															}

                                                echo "<td nowrap='nowrap'>" . $temp0 . "</td>";

														$temp1 = $row->mfo4_forma_trainings_survey_conducted;
														if ( $temp1 == 'Y'){
															$temp1 = 'Yes';
															}
															else
															{
															$temp1 = 'No';
															}

                                                echo "<td nowrap='nowrap'>" . $temp1 . "</td>";
												echo "<td nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_rate_training_survey_mode . "</td>";

														$temp2 = $row->mfo4_forma_trainings_was_a_survey_conducted_to_rate_training;
														if ( $temp2 == 'Y'){
															$temp2 = 'Yes';
															}
															else
															{
															$temp2 = 'No';
															}

                                                echo "<td nowrap='nowrap'>" . $temp2 . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_no_of_persons_surveyed_to_rate_training . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_rate_training_no_answer . "</td>";
												echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_rate_training_bad . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_rate_training_fair . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_rate_training_good . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_rate_training_better . "</td>";
												echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_rate_training_best . "</td>";
												//View PDF
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->mfo4_forma_trainings_survey_form_to_rate_training_attachment . ">" . $row->mfo4_forma_trainings_survey_form_to_rate_training_attachment . "</a></td>";

														$temp3 = $row->mfo4_forma_trainings_was_a_survey_conducted_to_ask_if_timely;
														if ( $temp3 == 'Y'){
															$temp3 = 'Yes';
															}
															else
															{
															$temp3 = 'No';
															}

                                                echo "<td nowrap='nowrap'>" . $temp3 . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_no_of_persons_surveyed_to_ask_if_timely . "</td>";
												echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_ask_if_timely_no_answer . "</td>";
                                                echo "<td id='txtright'  nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_ask_if_timely_bad . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_ask_if_timely_fair . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_ask_if_timely_good . "</td>";
												echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_ask_if_timely_better . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->mfo4_forma_trainings_surveyed_to_ask_if_timely_best . "</td>";
												//View PDF
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->mfo4_forma_trainings_surveyed_to_ask_if_timely_attachment . ">" . $row->mfo4_forma_trainings_surveyed_to_ask_if_timely_attachment . "</a></td>";
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->mfo4_forma_trainings_survey_tally_sheet_attachment . ">" . $row->mfo4_forma_trainings_survey_tally_sheet_attachment . "</a></td>";
												
                                                echo "<td><a href='training_edit.php?id=" . $row->mfo4_forma_trainings_id . "'>Edit</a></td>";
                                                echo "<td><a href='training_delete.php?id=" . $row->mfo4_forma_trainings_id . "' onclick='return checkDelete()'>Delete</a></td>";

										}
                                        
                                        echo "</table>";
                                }
                                // if there are no records in the database, display an alert message
                                else
                                {
										echo "<p><a href='training_input.php'>Add New Record</a> | ";
										echo "No record to display!";
                                }
                        }
                        // show an error if there is an issue with the database query
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