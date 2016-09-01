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
                <h2>MFO3: Paper Presented - Select Research Paper to Present</h2>
                <div class="viewlinks">
                <p><!--<a href="research_input.php">Add New Research</a> | --><b>View All</b> | <a href="presented_view_use_per_page.php">View Page</a> </p>
                </div>
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
						$query = "SELECT unit_delivery_name_cu, unit_contributor_name, research_type_name, mfo3_form_research_title, mfo3_form_research_duration_in_months_plan,  mfo3_form_research_month_year_started, mfo3_form_research_month_year_completed, mfo3_form_research_completed, mfo3_form_research_name_of_authors, mfo3_form_research_attachment, mfo3_form_program_id FROM tbl_sd_3_mfo3_form_research ORDER BY mfo3_form_research_title ASC, mfo3_form_program_id DESC" ;
}
else {
						$query = "SELECT unit_delivery_name_cu, unit_contributor_name, research_type_name, mfo3_form_research_title, mfo3_form_research_duration_in_months_plan,  mfo3_form_research_month_year_started, mfo3_form_research_month_year_completed, mfo3_form_research_completed, mfo3_form_research_name_of_authors, mfo3_form_research_attachment, mfo3_form_program_id FROM tbl_sd_3_mfo3_form_research WHERE unit_contributor_id = '$unit_contributor_id' ORDER BY mfo3_form_research_title ASC, mfo3_form_program_id DESC" ;
}
						if ($result = $mysqli->query($query))
						{									
                                // display records if there are records to display
                                if ($result->num_rows > 0)
                                {
										
										// display records in a table
                                        echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        
		                                        // set table headers
                                        		echo 
													"<tr>
															<th></th>
															<th>Seq. No.</th>
															<th width='150' nowrap='nowrap'>Delivery Unit</th>
															<th width='150' nowrap='nowrap'>Contributing Unit</th>
															<th width='150' nowrap='nowrap'>Research Type</th>
															<th width='150' nowrap='nowrap'>Research Title</th>
															<th width='150' nowrap='nowrap'>Research Duration<br/>(in months)</th>
															<th width='150' nowrap='nowrap'>Date Started</th>
															<th width='150' nowrap='nowrap'>Date Closed</th>
															<th width='150' nowrap='nowrap'>Completed</th>
															<th width='150' nowrap='nowrap'>Name of Author/s</th>
															<th width='150' nowrap='nowrap'>Attachment</th>
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
                                                echo "<td nowrap='nowrap'><a href='presented_input.php?id=" . $row->mfo3_form_program_id . "'>Select</a></td>";
												// counter
												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												// records
												echo "<td nowrap='nowrap'>" . $row->unit_delivery_name_cu . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit_contributor_name . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->research_type_name . "</td>";
												echo "<td nowrap='nowrap'>" . $row->mfo3_form_research_title . "</td>";
												echo "<td id='txtright'>" . $row->mfo3_form_research_duration_in_months_plan . "</td>";
												$start_date = strtotime($row->mfo3_form_research_month_year_started);
                                                echo '<td id="txtright">' . date("m/d/Y",$start_date) . '</td>';
												$end_date = strtotime($row->mfo3_form_research_month_year_completed);
														if (is_null($end_date)||$end_date == 0){
                                                        	echo '<td id="txtright">' . "" . '</td>';
														}
														else{
                                                			echo '<td id="txtright">' . date("m/d/Y",$end_date) . '</td>';
														}				
														$temp1 = $row->mfo3_form_research_completed;
														if ( $temp1 == 'Y'){
															$temp1 = 'Yes';
															}
															else
															{
															$temp1 = 'No';
															}
                                                echo "<td nowrap='nowrap'>" . $temp1 . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->mfo3_form_research_name_of_authors . "</td>";
												//View PDF
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->mfo3_form_research_attachment . ">" . $row->mfo3_form_research_attachment . "</a></td>";

                                                echo "<td><a href='presented_input.php?id=" . $row->mfo3_form_program_id . "'>Select</a></td>";
                                        }
                                        
                                        echo "</table>";
                                }
                                // if there are no records in the database, display an alert message
                                else
                                {
														echo "No record to select!";
														echo '<script language="javascript">';
														echo 'alert("Go to RESEARCH PROJECT to add required record")';
														echo '</script>';
														//echo "<a href='research_input.php'>Add New Record</a>";
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