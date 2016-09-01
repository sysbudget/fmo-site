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
                <h2>GASS B2: Report on Ageing of Cash Advance and GASS B3: COA Financial Reports - View Records</h2>
                
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
gass_formb2_cash_advance_submitted,
gass_formb2_cash_advance_attachment,
gass_formb3_coa_fr_financial_position,
gass_formb3_coa_fr_financial_performance,
gass_formb3_coa_fr_changes_in_net_asset,
gass_formb3_coa_fr_cash_flows,
gass_formb3_coa_fr_budget_and_actual_amounts,
gass_formb3_coa_fr_notes_to_financial_statements,
gass_formb3_coa_fr_attachment,
gass_formb23_cash_advance_coa_fr_id
FROM tbl_sd_7_gass_formb23_cash_advance_coa_fr
ORDER BY gass_formb23_cash_advance_coa_fr_id ASC" ;
}
else {
$query = "SELECT 
unit_delivery_name_cu,
unit_contributor_name,
gass_formb2_cash_advance_submitted,
gass_formb2_cash_advance_attachment,
gass_formb3_coa_fr_financial_position,
gass_formb3_coa_fr_financial_performance,
gass_formb3_coa_fr_changes_in_net_asset,
gass_formb3_coa_fr_cash_flows,
gass_formb3_coa_fr_budget_and_actual_amounts,
gass_formb3_coa_fr_notes_to_financial_statements,
gass_formb3_coa_fr_attachment,
gass_formb23_cash_advance_coa_fr_id
FROM tbl_sd_7_gass_formb23_cash_advance_coa_fr
WHERE cu_id = '$cu_id' 
ORDER BY gass_formb23_cash_advance_coa_fr_id ASC" ;
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
														//echo "<p><a href='obur_input.php'>Add New Record</a> | ";
														echo "<a href='ageing_pfm_view_all.php'>View All</a> | <b>View Page:</b> ";
                                                        for ($i = 1; $i <= $total_pages; $i++)
                                                        {
                                                                if (isset($_GET['page']) && $_GET['page'] == $i)
                                                                {
                                                                        echo $i . " ";
                                                                }
                                                                else
                                                                {
                                                                        echo "<a href='ageing_pfm_per_page.php?page=$i'>$i</a> ";
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
														<th width='50' nowrap='nowrap'>Ageing Cash Advance</th>
														<th width='150' nowrap='nowrap'>Attachment 1</th>
														<th width='50' nowrap='nowrap'>Financial Position</th>
														<th width='50' nowrap='nowrap'>Financial Performance</th>
														<th width='50' nowrap='nowrap'>Changes in Net Assets/Equity</th>
														<th width='50' nowrap='nowrap'>Cash Flows<</th>
														<th width='50' nowrap='nowrap'>Comparison of Budget and Actual Amounts</th>
														<th width='50' nowrap='nowrap'>Notes to Financial Statements</th>
														<th width='150' nowrap='nowrap'>Attachment 2</th>
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
                                                        
														echo '<td><a href="ageing_pfm_delete.php?id=' . $row[11] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        echo '<td><a href="ageing_pfm_edit.php?id=' . $row[11] . '">Edit</a></td>';

														// counter
														echo "<td id='txtright'>" . $nctr. "</td>";
														$nctr=$nctr+1;
														// records
                                                        echo '<td nowrap="nowrap">' . $row[0] . '</td>';
														echo '<td nowrap="nowrap">' . $row[1] . '</td>';

														for ($j=2; $j <= 2; $j++){ 
														if ($row[$j] == 'Y'){
															$temp = 'Yes';
															}
															else
															{
															$temp = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp . '</td>';
														}

														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[3] . ">" . $row[3] . "</a></td>";
                                                        
														for ($j=4; $j <= 9; $j++){ 
														if ($row[$j] == 'Y'){
															$temp = 'Yes';
															}
															else
															{
															$temp = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp . '</td>';
														}

														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[10] . ">" . $row[10] . "</a></td>";

                                                        echo '<td><a href="ageing_pfm_edit.php?id=' . $row[11] . '">Edit</a></td>';
                                                        echo '<td><a href="ageing_pfm_delete.php?id=' . $row[11] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        
														echo "</tr>";
                                                        }

                                                        // close table>
                                                        echo "</table>";
                                                }
                                                else
                                                {
														echo "<p><a href='ageing_pfm_input.php'>Add New Record</a> | ";
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
