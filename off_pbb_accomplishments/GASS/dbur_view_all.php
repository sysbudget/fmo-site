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
                <h2>GASS: OBUR - View Records</h2>
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
/*
if ($sd_users_username == 'admin') {
$query = "SELECT 
unit_delivery_name_cu,
unit_contributor_name,
gass_forma_dbur_qtr1_obligation_mooe,
gass_forma_dbur_qtr1_obligation_co,
gass_forma_dbur_qtr1_obligation_total,
gass_forma_dbur_qtr1_disbursement_ps,
gass_forma_dbur_qtr1_disbursement_mooe,
gass_forma_dbur_qtr1_disbursement_co,
gass_forma_dbur_qtr1_disbursement_total,
gass_forma_dbur_qtr1_disbursement_total_mooe_co,
gass_forma_dbur_qtr2_obligation_mooe,
gass_forma_dbur_qtr2_obligation_co,
gass_forma_dbur_qtr2_obligation_total,
gass_forma_dbur_qtr2_disbursement_ps,
gass_forma_dbur_qtr2_disbursement_mooe,
gass_forma_dbur_qtr2_disbursement_co,
gass_forma_dbur_qtr2_disbursement_total,
gass_forma_dbur_qtr2_disbursement_total_mooe_co,
gass_forma_dbur_qtr3_obligation_mooe,
gass_forma_dbur_qtr3_obligation_co,
gass_forma_dbur_qtr3_obligation_total,
gass_forma_dbur_qtr3_disbursement_ps,
gass_forma_dbur_qtr3_disbursement_mooe,
gass_forma_dbur_qtr3_disbursement_co,
gass_forma_dbur_qtr3_disbursement_total,
gass_forma_dbur_qtr3_disbursement_total_mooe_co,
gass_forma_dbur_qtr4_obligation_mooe,
gass_forma_dbur_qtr4_obligation_co,
gass_forma_dbur_qtr4_obligation_total,
gass_forma_dbur_qtr4_disbursement_ps,
gass_forma_dbur_qtr4_disbursement_mooe,
gass_forma_dbur_qtr4_disbursement_co,
gass_forma_dbur_qtr4_disbursement_total,
gass_forma_dbur_qtr4_disbursement_total_mooe_co,
gass_forma_dbur_qtr1_attachment_bfar1,
gass_forma_dbur_qtr2_attachment_bfar1,
gass_forma_dbur_qtr3_attachment_bfar1,
gass_forma_dbur_qtr4_attachment_bfar1,
gass_forma_dbur_id
FROM tbl_sd_7_gass_forma_dbur
ORDER BY gass_forma_dbur_id ASC" ;
}
else {
$query = "SELECT 
unit_delivery_name_cu,
unit_contributor_name,
gass_forma_dbur_qtr1_obligation_mooe,
gass_forma_dbur_qtr1_obligation_co,
gass_forma_dbur_qtr1_obligation_total,
gass_forma_dbur_qtr1_disbursement_ps,
gass_forma_dbur_qtr1_disbursement_mooe,
gass_forma_dbur_qtr1_disbursement_co,
gass_forma_dbur_qtr1_disbursement_total,
gass_forma_dbur_qtr1_disbursement_total_mooe_co,
gass_forma_dbur_qtr2_obligation_mooe,
gass_forma_dbur_qtr2_obligation_co,
gass_forma_dbur_qtr2_obligation_total,
gass_forma_dbur_qtr2_disbursement_ps,
gass_forma_dbur_qtr2_disbursement_mooe,
gass_forma_dbur_qtr2_disbursement_co,
gass_forma_dbur_qtr2_disbursement_total,
gass_forma_dbur_qtr2_disbursement_total_mooe_co,
gass_forma_dbur_qtr3_obligation_mooe,
gass_forma_dbur_qtr3_obligation_co,
gass_forma_dbur_qtr3_obligation_total,
gass_forma_dbur_qtr3_disbursement_ps,
gass_forma_dbur_qtr3_disbursement_mooe,
gass_forma_dbur_qtr3_disbursement_co,
gass_forma_dbur_qtr3_disbursement_total,
gass_forma_dbur_qtr3_disbursement_total_mooe_co,
gass_forma_dbur_qtr4_obligation_mooe,
gass_forma_dbur_qtr4_obligation_co,
gass_forma_dbur_qtr4_obligation_total,
gass_forma_dbur_qtr4_disbursement_ps,
gass_forma_dbur_qtr4_disbursement_mooe,
gass_forma_dbur_qtr4_disbursement_co,
gass_forma_dbur_qtr4_disbursement_total,
gass_forma_dbur_qtr4_disbursement_total_mooe_co,
gass_forma_dbur_qtr1_attachment_bfar1,
gass_forma_dbur_qtr2_attachment_bfar1,
gass_forma_dbur_qtr3_attachment_bfar1,
gass_forma_dbur_qtr4_attachment_bfar1,
gass_forma_dbur_id
FROM tbl_sd_7_gass_forma_dbur
WHERE unit_contributor_id = '$unit_contributor_id' 
ORDER BY gass_forma_dbur_id ASC" ;
}
*/

// figure out the total pages in the database
if ($sd_users_username == 'admin') {
$query = "SELECT 
unit_delivery_name_cu,
unit_contributor_name,
gass_forma_dbur_qtr1_disbursement_ps,
gass_forma_dbur_qtr1_disbursement_mooe,
gass_forma_dbur_qtr1_disbursement_co,
gass_forma_dbur_qtr1_disbursement_total,
gass_forma_dbur_qtr2_disbursement_ps,
gass_forma_dbur_qtr2_disbursement_mooe,
gass_forma_dbur_qtr2_disbursement_co,
gass_forma_dbur_qtr2_disbursement_total,
gass_forma_dbur_qtr3_disbursement_ps,
gass_forma_dbur_qtr3_disbursement_mooe,
gass_forma_dbur_qtr3_disbursement_co,
gass_forma_dbur_qtr3_disbursement_total,
gass_forma_dbur_qtr4_disbursement_ps,
gass_forma_dbur_qtr4_disbursement_mooe,
gass_forma_dbur_qtr4_disbursement_co,
gass_forma_dbur_qtr4_disbursement_total,
gass_forma_dbur_qtr1_attachment_bfar1,
gass_forma_dbur_qtr2_attachment_bfar1,
gass_forma_dbur_qtr3_attachment_bfar1,
gass_forma_dbur_qtr4_attachment_bfar1,
gass_forma_dbur_id
FROM tbl_sd_7_gass_forma_dbur
ORDER BY gass_forma_dbur_id ASC" ;
}
else {
$query = "SELECT 
unit_delivery_name_cu,
unit_contributor_name,
gass_forma_dbur_qtr1_disbursement_ps,
gass_forma_dbur_qtr1_disbursement_mooe,
gass_forma_dbur_qtr1_disbursement_co,
gass_forma_dbur_qtr1_disbursement_total,
gass_forma_dbur_qtr2_disbursement_ps,
gass_forma_dbur_qtr2_disbursement_mooe,
gass_forma_dbur_qtr2_disbursement_co,
gass_forma_dbur_qtr2_disbursement_total,
gass_forma_dbur_qtr3_disbursement_ps,
gass_forma_dbur_qtr3_disbursement_mooe,
gass_forma_dbur_qtr3_disbursement_co,
gass_forma_dbur_qtr3_disbursement_total,
gass_forma_dbur_qtr4_disbursement_ps,
gass_forma_dbur_qtr4_disbursement_mooe,
gass_forma_dbur_qtr4_disbursement_co,
gass_forma_dbur_qtr4_disbursement_total,
gass_forma_dbur_qtr1_attachment_bfar1,
gass_forma_dbur_qtr2_attachment_bfar1,
gass_forma_dbur_qtr3_attachment_bfar1,
gass_forma_dbur_qtr4_attachment_bfar1,
gass_forma_dbur_id
FROM tbl_sd_7_gass_forma_dbur
WHERE unit_contributor_id = '$unit_contributor_id' 
ORDER BY gass_forma_dbur_id ASC" ;
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
										echo "<b>View All</b> | <a href='dbur_view_per_page.php'>View Page:</a> ";
                                        echo "</div>";
/*										
		                                        // set table headers
                                        		echo "<tr>
		 												<th colspan='5' scope='col'></th>
														<th colspan='8' scope='col'>1st Quarter</th>
														<th colspan='8' scope='col'>2nd Quarter</th>
														<th colspan='8' scope='col'>3rd Quarter</th>
														<th colspan='8' scope='col'>4th Quarter</th>
														<th colspan='8' scope='col'></th>
													  <tr/>
													  
													  <tr>
		 												<th colspan='5' scope='col'></th>
														<th colspan='3' scope='col'>Obigation</th>
														<th colspan='5' scope='col'>Disbursement</th>
														<th colspan='3' scope='col'>Obigation</th>
														<th colspan='5' scope='col'>Disbursement</th>
														<th colspan='3' scope='col'>Obigation</th>
														<th colspan='5' scope='col'>Disbursement</th>
														<th colspan='3' scope='col'>Obigation</th>
														<th colspan='5' scope='col'>Disbursement</th>
														<th colspan='8' scope='col'></th>
													  <tr/>
													  
													  <tr>
														<th></th>
														<th></th>
														<th>Seq. No.</th>
														<th width='150' nowrap='nowrap'>Delivery Unit</th>
														<th width='150' nowrap='nowrap'>Contributing Unit</th>
														<th width='50' nowrap='nowrap'>MOOE</th>
														<th width='50' nowrap='nowrap'>CO</th>
														<th width='50' nowrap='nowrap'>Total</th>
														<th width='50' nowrap='nowrap'>PS</th>
														<th width='50' nowrap='nowrap'>MOOE</th>
														<th width='50' nowrap='nowrap'>CO</th>
														<th width='50' nowrap='nowrap'>Total</th>
														<th width='50' nowrap='nowrap'>MOOE + CO</th>
														<th width='50' nowrap='nowrap'>MOOE</th>
														<th width='50' nowrap='nowrap'>CO</th>
														<th width='50' nowrap='nowrap'>Total</th>
														<th width='50' nowrap='nowrap'>PS</th>
														<th width='50' nowrap='nowrap'>MOOE</th>
														<th width='50' nowrap='nowrap'>CO</th>
														<th width='50' nowrap='nowrap'>Total</th>
														<th width='50' nowrap='nowrap'>MOOE + CO</th>
														<th width='50' nowrap='nowrap'>MOOE</th>
														<th width='50' nowrap='nowrap'>CO</th>
														<th width='50' nowrap='nowrap'>Total</th>
														<th width='50' nowrap='nowrap'>PS</th>
														<th width='50' nowrap='nowrap'>MOOE</th>
														<th width='50' nowrap='nowrap'>CO</th>
														<th width='50' nowrap='nowrap'>Total</th>
														<th width='50' nowrap='nowrap'>MOOE + CO</th>
														<th width='50' nowrap='nowrap'>MOOE</th>
														<th width='50' nowrap='nowrap'>CO</th>
														<th width='50' nowrap='nowrap'>Total</th>
														<th width='50' nowrap='nowrap'>PS</th>
														<th width='50' nowrap='nowrap'>MOOE</th>
														<th width='50' nowrap='nowrap'>CO</th>
														<th width='50' nowrap='nowrap'>Total</th>
														<th width='50' nowrap='nowrap'>MOOE + CO</th>
														<th width='150' nowrap='nowrap'>Attachment1</th>
														<th width='150' nowrap='nowrap'>Attachment2</th>
														<th width='150' nowrap='nowrap'>Attachment3</th>
														<th width='150' nowrap='nowrap'>Attachment4</th>
														<th></th>
														<th></th>
													</tr>";
*/

												echo "<tr>
		 												<th colspan='5' scope='col'></th>
														<th colspan='4' scope='col'>1st Quarter Disbursements</th>
														<th colspan='4' scope='col'>2nd Quarter Disbursements</th>
														<th colspan='4' scope='col'>3rd Quarter Disbursements</th>
														<th colspan='4' scope='col'>4th Quarter Disbursements</th>
														<th colspan='8' scope='col'></th>
													  <tr/>
													  
													  <tr>
														<th></th>
														<th></th>
														<th>Seq. No.</th>
														<th width='150' nowrap='nowrap'>Delivery Unit</th>
														<th width='150' nowrap='nowrap'>Contributing Unit</th>
														<th width='50' nowrap='nowrap'>PS</th>
														<th width='50' nowrap='nowrap'>MOOE</th>
														<th width='50' nowrap='nowrap'>CO</th>
														<th width='50' nowrap='nowrap'>Total</th>
														<th width='50' nowrap='nowrap'>PS</th>
														<th width='50' nowrap='nowrap'>MOOE</th>
														<th width='50' nowrap='nowrap'>CO</th>
														<th width='50' nowrap='nowrap'>Total</th>
														<th width='50' nowrap='nowrap'>PS</th>
														<th width='50' nowrap='nowrap'>MOOE</th>
														<th width='50' nowrap='nowrap'>CO</th>
														<th width='50' nowrap='nowrap'>Total</th>
														<th width='50' nowrap='nowrap'>PS</th>
														<th width='50' nowrap='nowrap'>MOOE</th>
														<th width='50' nowrap='nowrap'>CO</th>
														<th width='50' nowrap='nowrap'>Total</th>
														<th width='150' nowrap='nowrap'>Attachment 1</th>
														<th width='150' nowrap='nowrap'>Attachment 2</th>
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
                                                echo "<td><a href='dbur_delete.php?id=" . $row->gass_forma_dbur_id . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='dbur_edit.php?id=" . $row->gass_forma_dbur_id . "'>Edit</a></td>";
												// counter
												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
/*
												// records
												echo "<td nowrap='nowrap'>" . $row->unit_delivery_name_cu . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit_contributor_name . "</td>";

                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr1_obligation_mooe . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr1_obligation_co . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr1_obligation_total . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr1_disbursement_ps . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr1_disbursement_mooe . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr1_disbursement_co . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr1_disbursement_total . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr1_disbursement_total_mooe_co . "</td>";

                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr2_obligation_mooe . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr2_obligation_co . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr2_obligation_total . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr2_disbursement_ps . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr2_disbursement_mooe . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr2_disbursement_co . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr2_disbursement_total . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr2_disbursement_total_mooe_co . "</td>";

                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr3_obligation_mooe . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr3_obligation_co . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr3_obligation_total . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr3_disbursement_ps . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr3_disbursement_mooe . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr3_disbursement_co . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr3_disbursement_total . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr3_disbursement_total_mooe_co . "</td>";

                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr4_obligation_mooe . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr4_obligation_co . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr4_obligation_total . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr4_disbursement_ps . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr4_disbursement_mooe . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr4_disbursement_co . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr4_disbursement_total . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr4_disbursement_total_mooe_co . "</td>";
*/

												// records
												echo "<td nowrap='nowrap'>" . $row->unit_delivery_name_cu . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit_contributor_name . "</td>";

                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr1_disbursement_ps . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr1_disbursement_mooe . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr1_disbursement_co . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr1_disbursement_total . "</td>";

                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr2_disbursement_ps . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr2_disbursement_mooe . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr2_disbursement_co . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr2_disbursement_total . "</td>";

                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr3_disbursement_ps . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr3_disbursement_mooe . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr3_disbursement_co . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr3_disbursement_total . "</td>";

                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr4_disbursement_ps . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr4_disbursement_mooe . "</td>";
												echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr4_disbursement_co . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->gass_forma_dbur_qtr4_disbursement_total . "</td>";

												//View PDF
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_forma_dbur_qtr1_attachment_bfar1 . ">" . $row->gass_forma_dbur_qtr1_attachment_bfar1 . "</a></td>";

												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_forma_dbur_qtr2_attachment_bfar1 . ">" . $row->gass_forma_dbur_qtr2_attachment_bfar1 . "</a></td>";

												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_forma_dbur_qtr3_attachment_bfar1 . ">" . $row->gass_forma_dbur_qtr3_attachment_bfar1 . "</a></td>";

												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_forma_dbur_qtr4_attachment_bfar1 . ">" . $row->gass_forma_dbur_qtr4_attachment_bfar1 . "</a></td>";
												
                                                echo "<td><a href='dbur_edit.php?id=" . $row->gass_forma_dbur_id . "'>Edit</a></td>";
                                                echo "<td><a href='dbur_delete.php?id=" . $row->gass_forma_dbur_id . "' onclick='return checkDelete()'>Delete</a></td>";

										}
                                        
                                        echo "</table>";
                                }
                                // if there are no records in the database, display an alert message
                                else
                                {
										echo "<p><a href='dbur_input.php'>Add New Record</a> | ";
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