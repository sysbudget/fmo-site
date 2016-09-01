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
                                // display records if there are records to display
                                if ($result->num_rows > 0)
                                {
										
										// display records in a table
                                        echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        echo "<div class='viewlinks'>";
										echo "<p>";
										//echo "<p><a href='obur_input.php'>Add New Record</a> | ";
										echo "<b>View All</b> | <a href='ageing_pfm_view_per_page.php'>View Page:</a> ";
                                        echo "</div>";
										
		                                        // set table headers
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
											
										$nctr=1;
                                        $ctr=1;
                                        while ($row = $result->fetch_object())
                                        {
                                                // alternate color of background
                                        		if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
												else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

												// set up a row for each record
                                                echo "<td><a href='ageing_pfm_delete.php?id=" . $row->gass_formb23_cash_advance_coa_fr_id . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='ageing_pfm_edit.php?id=" . $row->gass_formb23_cash_advance_coa_fr_id . "'>Edit</a></td>";
												// counter
												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												// records

												echo "<td nowrap='nowrap'>" . $row->unit_delivery_name_cu . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit_contributor_name . "</td>";

														$temp0 = $row->gass_formb2_cash_advance_submitted;
														if ( $temp0 == 'Y'){
															$temp0 = 'Yes';
															}
															else
															{
															$temp0 = 'No';
															}

                                                echo "<td nowrap='nowrap'>" . $temp0 . "</td>";

												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_formb2_cash_advance_attachment . ">" . $row->gass_formb2_cash_advance_attachment . "</a></td>";

												$fieldnames = array("gass_formb3_coa_fr_financial_position", "gass_formb3_coa_fr_financial_performance", "gass_formb3_coa_fr_changes_in_net_asset", "gass_formb3_coa_fr_cash_flows", "gass_formb3_coa_fr_budget_and_actual_amounts", "gass_formb3_coa_fr_notes_to_financial_statements");
												for ($j=0; $j <= 5; $j++){ 
													$ctr = $fieldnames[$j];
 
														$temp = $row->$ctr;
														if ( $temp == 'Y'){
															$temp = 'Yes';
															}
															else
															{
															$temp = 'No';
															}
														echo "<td nowrap='nowrap'>" . $temp . "</td>";
												}
												
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_formb3_coa_fr_attachment . ">" . $row->gass_formb3_coa_fr_attachment . "</a></td>";


                                                echo "<td><a href='ageing_pfm_edit.php?id=" . $row->gass_formb23_cash_advance_coa_fr_id . "'>Edit</a></td>";
                                                echo "<td><a href='ageing_pfm_delete.php?id=" . $row->gass_formb23_cash_advance_coa_fr_id . "' onclick='return checkDelete()'>Delete</a></td>";

										}
                                        
                                        echo "</table>";
                                }
                                // if there are no records in the database, display an alert message
                                else
                                {
										echo "<p><a href='ageing_pfm_input.php'>Add New Record</a> | ";
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