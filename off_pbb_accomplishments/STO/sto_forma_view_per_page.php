<?php

session_name("pbb");
session_start();

//is the user logged in or not
if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

//if not, redirect the user
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
                <h2>STO A: Service Satisfaction Survey - View Records</h2>
 
                <?php
				//connect to the database
					include('../connect-db.php');
                        
                        //number of results to show per page
                                        $per_page = 25;
                                        
						//get the session values
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
							
	                                     //figure out the total pages to show
										if ($sd_users_username == 'admin') {
                                           $query = "SELECT unit_delivery_name_cu, unit_contributor_name, sto_forma_rated_service_conu_provided_with_service, sto_forma_rated_service_head_of_serviced_conu, ref_service_received_name, sto_forma_rated_service_received, sto_forma_rated_service_financed_general_fund, sto_forma_rated_service_survey_date, sto_forma_rated_service_survey_mode, ref_service_rating_name, sto_forma_rated_service_attachment_questionnaire, sto_forma_rated_service_id FROM tbl_sd_6_sto_forma_rated_service ORDER BY ref_service_received_id ASC, sto_forma_rated_service_id DESC" ;
}
else {
										   $query = "SELECT unit_delivery_name_cu, unit_contributor_name, sto_forma_rated_service_conu_provided_with_service, sto_forma_rated_service_head_of_serviced_conu, ref_service_received_name, sto_forma_rated_service_received, sto_forma_rated_service_financed_general_fund, sto_forma_rated_service_survey_date, sto_forma_rated_service_survey_mode, ref_service_rating_name, sto_forma_rated_service_attachment_questionnaire, sto_forma_rated_service_id FROM tbl_sd_6_sto_forma_rated_service WHERE unit_contributor_id = '$unit_contributor_id' ORDER BY ref_service_received_name, sto_forma_rated_service_id DESC" ;
}
										if ($result = $mysqli->query($query))
                                        {
                                                if ($result->num_rows != 0)
                                                {
                                                        $total_results = $result->num_rows;
														
                                                        //ceil() returns the roundedg up value
                                                        $total_pages = ceil($total_results / $per_page);
                                                        
                                                        //check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
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
                                                                        //if not, show the first set of results
                                                                        $start = 0;
                                                                        $end = $per_page; 
                                                                }               
                                                        }
                                                        else
                                                        {
                                                                //if page isn't set, show the first set of results
                                                                $start = 0;
                                                                $end = $per_page; 
                                                        }
                                                        
                                                        //display the pagination
                                                        echo "<div class='viewlinks'>";
                                                        echo "<p><a href='sto_forma_input.php'>Add New Record</a> | ";
                                                        echo "<a href='sto_forma_view_all.php'>View All</a> | <b>View Page:</b> ";
                                                        for ($i = 1; $i <= $total_pages; $i++)
                                                        {
                                                                if (isset($_GET['page']) && $_GET['page'] == $i)
                                                                {
                                                                        echo $i . " ";
                                                                }
                                                                else
                                                                {
                                                                        echo "<a href='sto_forma_view_per_page.php?page=$i'>$i</a> ";
                                                                }
                                                        }
                                                        echo "</div>";
                                                        echo "</p>";

                                                        
                                                        //display the column headings	
                                                echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        		echo "<tr>
														<th></th>
														<th></th>
														<th>Seq. No.</th>
														<th width='150' nowrap='nowrap'>Delivery Unit</th>
														<th width='150' nowrap='nowrap'>Contributing Unit</th>
														<th width='150' nowrap='nowrap'>UP Unit of Survey Respondent</th>
														<th width='150' nowrap='nowrap'>Name of Survey Respondent and UP Position</th>
														<th width='150' nowrap='nowrap'>STO Service Received</th>
														<th width='150' nowrap='nowrap'>Details of STO Service Received</th>
														<th width='150' nowarp='nowrap'>STO Service Funded by GAA</th>
														<th width='150' nowrap='nowrap'>Survey Date</th>
														<th width='150' nowrap='nowrap'>Survey Mode</th>
														<th width='150' nowrap='nowrap'>Rating of STO Service</th>
														<th width='150' nowrap='nowrap'>Attachment</th>
														<th></th>
														<th></th>												
													</tr>";
                                            		
                                                        //loop through the result of query 
														$nctr=1;
                                        				$ctr=1;

                                                        for ($i = $start; $i < $end; $i++)
                                                        {
                                                                //make sure that PHP doesn't try to show results that don't exist
                                                        if ($i == $total_results) { break; }
                                                        
                                                                //find the specific row
                                                                $result->data_seek($i);
                                                                        $row = $result->fetch_row();
                                                                        
		                                                //alternate the color of background
        		                                		if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
														else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

                                                        //echo out the contents of each row
														echo '<td><a href="sto_forma_delete.php?id=' . $row[11] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        echo '<td><a href="sto_forma_edit.php?id=' . $row[11] . '">Edit</a></td>';

														//counter
														echo "<td id='txtright'>" . $nctr. "</td>";
														$nctr=$nctr+1;
														
														//records
                                                        echo '<td nowrap="nowrap">' . $row[0] . '</td>';
														echo '<td nowrap="nowrap">' . $row[1] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[2] . '</td>';
														echo '<td nowrap="nowrap">' . $row[3] . '</td>';
														echo '<td nowrap="nowrap">' . $row[4] . '</td>';
														echo '<td nowrap="nowrap">' . $row[5] . '</td>';
														
														$gaa='';
														if ($row[6] == 'Y'){
															$gaa = 'Yes';
															}
															else
															{
															$gaa = 'No';
															}
                                                        echo '<td nowrap="nowrap">' . $gaa . '</td>';
														
														$survey_date = strtotime($row[7]);
                                                        echo '<td id="txtright">' . date("m/d/Y",$survey_date) . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[8] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[9] . '</td>';
                                                        
														//view pdf attachment
														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[10] . ">" . $row[10] . "</a></td>";
																												
                                                        echo '<td><a href="sto_forma_edit.php?id=' . $row[11] . '">Edit</a></td>';
                                                        echo '<td><a href="sto_forma_delete.php?id=' . $row[11] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        
														echo "</tr>";
                                                        }

                                                        //close the table>
                                                        echo "</table>";
                                                }
                                                else
                                                {
														echo "<p><a href='sto_forma_input.php'>Add New Record</a> | ";
                                                        echo "No record to display!";
                                                } 
                                        }
                                        //error with the query
                                        else
                                        {
                                                echo "Error: " . $mysqli->error;
                                        }
                                                
                        // close the database connection
                        $mysqli->close();
                ?>
             </div> 
        </body>
</html>
