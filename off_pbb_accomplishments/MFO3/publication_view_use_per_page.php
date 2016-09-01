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
                <h2>MFO3: Publication - Select Research Paper for Publication</h2>
                
                <?php
				// connect to the database
					include('../connect-db.php');
                        
                        // number of results to show per page
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

						$unit_delivery_name_short = $_SESSION['unit_delivery_name_short'];
						$unit_contributor_name_short = $_SESSION['unit_contributor_name_short'];
										
	                                     // figure out the total pages in the database
										if ($sd_users_username == 'admin') {
										$query = "SELECT unit_delivery_name_cu, unit_contributor_name, research_type_name, mfo3_form_research_title, mfo3_form_research_duration_in_months_plan,  mfo3_form_research_month_year_started, mfo3_form_research_month_year_completed, mfo3_form_research_completed, mfo3_form_research_name_of_authors, mfo3_form_research_attachment, mfo3_form_program_id  FROM tbl_sd_3_mfo3_form_research ORDER BY mfo3_form_research_title ASC, mfo3_form_program_id DESC" ;
}
else {
										$query = "SELECT unit_delivery_name_cu, unit_contributor_name, research_type_name, mfo3_form_research_title, mfo3_form_research_duration_in_months_plan,  mfo3_form_research_month_year_started, mfo3_form_research_month_year_completed, mfo3_form_research_completed, mfo3_form_research_name_of_authors, mfo3_form_research_attachment, mfo3_form_program_id FROM tbl_sd_3_mfo3_form_research WHERE unit_contributor_id = '$unit_contributor_id' ORDER BY mfo3_form_research_title ASC, mfo3_form_program_id DESC" ;
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
														//echo "<p><a href='research_input.php'>Add New Research</a> | ";
														echo "<a href='publication_view_use_all.php'>View All</a> | <b>View Page:</b> ";
                                                        for ($i = 1; $i <= $total_pages; $i++)
                                                        {
                                                                if (isset($_GET['page']) && $_GET['page'] == $i)
                                                                {
                                                                        echo $i . " ";
                                                                }
                                                                else
                                                                {
                                                                        echo "<a href='publication_view_use_per_page.php?page=$i'>$i</a> ";
                                                                }
                                                        }
                                                        echo "</div>";
                                                        echo "</p>";

                                                        
                                                        // display data in table
														echo "<table border='1' cellpadding='2' cellspacing='1'>";
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
                                                        
														//echo '<td><a href="delete.php?id=' . $row[13] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        echo '<td nowrap="nowrap"><a href="publication_input.php?id=' . $row[10] . '">Select</a></td>';
														// counter
														echo "<td id='txtright'>" . $nctr . "</td>";
														$nctr=$nctr+1;
                                                		echo '<td nowrap="nowrap">' . $row[0] . '</td>';												       
                                                        echo '<td nowrap="nowrap">' . $row[1] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[2] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[3] . '</td>';
														echo '<td id="txtright" nowrap="nowrap">' . $row[4] . '</td>';
														
														$start_date = strtotime($row[5]);
                                                        echo '<td id="txtright">' . date("m/d/Y",$start_date) . '</td>';

														$end_date = strtotime($row[6]);
														if (is_null($end_date)||$end_date == 0){
                                                        echo '<td id="txtright">' . "" . '</td>';
														}
														else{
                                                        echo '<td id="txtright">' . date("m/d/Y",$end_date) . '</td>';
														}

                                                        $temp1='';
														if ($row[7] == 'Y'){
															$temp1 = 'Yes';
															}
															else
															{
															$temp1 = 'No';
															}													
                                                        echo '<td nowrap="nowrap">' . $temp1 . '</td>';

                                                        echo '<td nowrap="nowrap">' . $row[8] . '</td>';
														//View PDF
														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[9] . ">" . $row[9] . "</a></td>";
                                                        
                                                        echo '<td><a href="publication_input.php?id=' . $row[10] . '">Select</a></td>';
                                                        //echo '<td><a href="delete.php?id=' . $row[13] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        
														echo "</tr>";
                                                        }

                                                        // close table>
                                                        echo "</table>";
                                                }
                                                else
                                                {
														echo "No record to select!";
														echo '<script language="javascript">';
														echo 'alert("Go to RESEARCH PROJECT to add required record")';
														echo '</script>';
														//echo "<a href='research_input.php'>Add New Record</a>";
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
