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
                <h2>GASS B1: Budget and Financial Accountability Reports (BFARs) - View Records</h2>
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
gass_formb_bfar_4_jan,
gass_formb_bfar_4_feb,
gass_formb_bfar_4_mar,
gass_formb_bfar_4_qtr1_attachment,
gass_formb_bfar_4_apr,
gass_formb_bfar_4_may,
gass_formb_bfar_4_jun,
gass_formb_bfar_4_qtr2_attachment,
gass_formb_bfar_4_jul,
gass_formb_bfar_4_aug,
gass_formb_bfar_4_sep,
gass_formb_bfar_4_qtr3_attachment,
gass_formb_bfar_4_oct,
gass_formb_bfar_4_nov,
gass_formb_bfar_4_dec,
gass_formb_bfar_4_qtr4_attachment1,
gass_formb_bfar_4_qtr4_attachment2,
gass_formb_bar_1_qtr4,
gass_formb_bfar_1_qtr4,
gass_formb_bfar_1a_qtr4,
gass_formb_bfar_1b_qtr4,
gass_formb_bfar_2_qtr4,
gass_formb_bfar_2a_qtr4,
gass_formb_bfar_3_qtr4,
gass_formb_bfar_5_qtr4,
gass_formb_bfar_qtr4_attachment,
gass_formb_bar_1_qtr1,
gass_formb_bfar_1_qtr1,
gass_formb_bfar_1a_qtr1,
gass_formb_bfar_1b_qtr1,
gass_formb_bfar_2_qtr1,
gass_formb_bfar_2a_qtr1,
gass_formb_bfar_5_qtr1,
gass_formb_bfar_qtr1_attachment,
gass_formb_bar_1_qtr2,
gass_formb_bfar_1_qtr2,
gass_formb_bfar_1a_qtr2,
gass_formb_bfar_1b_qtr2,
gass_formb_bfar_2_qtr2,
gass_formb_bfar_2a_qtr2,
gass_formb_bfar_5_qtr2,
gass_formb_bfar_qtr2_attachment,
gass_formb_bar_1_qtr3,
gass_formb_bfar_1_qtr3,
gass_formb_bfar_1a_qtr3,
gass_formb_bfar_1b_qtr3,
gass_formb_bfar_2_qtr3,
gass_formb_bfar_2a_qtr3,
gass_formb_bfar_5_qtr3,
gass_formb_bfar_qtr3_attachment,
gass_formb_bfar_id
FROM tbl_sd_7_gass_formb_bfar
ORDER BY gass_formb_bfar_id ASC" ;
}
else {
$query = "SELECT 
unit_delivery_name_cu,
unit_contributor_name,
gass_formb_bfar_4_jan,
gass_formb_bfar_4_feb,
gass_formb_bfar_4_mar,
gass_formb_bfar_4_qtr1_attachment,
gass_formb_bfar_4_apr,
gass_formb_bfar_4_may,
gass_formb_bfar_4_jun,
gass_formb_bfar_4_qtr2_attachment,
gass_formb_bfar_4_jul,
gass_formb_bfar_4_aug,
gass_formb_bfar_4_sep,
gass_formb_bfar_4_qtr3_attachment,
gass_formb_bfar_4_oct,
gass_formb_bfar_4_nov,
gass_formb_bfar_4_dec,
gass_formb_bfar_4_qtr4_attachment1,
gass_formb_bfar_4_qtr4_attachment2,
gass_formb_bar_1_qtr4,
gass_formb_bfar_1_qtr4,
gass_formb_bfar_1a_qtr4,
gass_formb_bfar_1b_qtr4,
gass_formb_bfar_2_qtr4,
gass_formb_bfar_2a_qtr4,
gass_formb_bfar_3_qtr4,
gass_formb_bfar_5_qtr4,
gass_formb_bfar_qtr4_attachment,
gass_formb_bar_1_qtr1,
gass_formb_bfar_1_qtr1,
gass_formb_bfar_1a_qtr1,
gass_formb_bfar_1b_qtr1,
gass_formb_bfar_2_qtr1,
gass_formb_bfar_2a_qtr1,
gass_formb_bfar_5_qtr1,
gass_formb_bfar_qtr1_attachment,
gass_formb_bar_1_qtr2,
gass_formb_bfar_1_qtr2,
gass_formb_bfar_1a_qtr2,
gass_formb_bfar_1b_qtr2,
gass_formb_bfar_2_qtr2,
gass_formb_bfar_2a_qtr2,
gass_formb_bfar_5_qtr2,
gass_formb_bfar_qtr2_attachment,
gass_formb_bar_1_qtr3,
gass_formb_bfar_1_qtr3,
gass_formb_bfar_1a_qtr3,
gass_formb_bfar_1b_qtr3,
gass_formb_bfar_2_qtr3,
gass_formb_bfar_2a_qtr3,
gass_formb_bfar_5_qtr3,
gass_formb_bfar_qtr3_attachment,
gass_formb_bfar_id
FROM tbl_sd_7_gass_formb_bfar
WHERE unit_contributor_id = '$unit_contributor_id' 
ORDER BY gass_formb_bfar_id ASC" ;
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
										echo "<b>View All</b> | <a href='bfar_view_per_page.php'>View Page:</a> ";
                                        echo "</div>";
										
		                                        // set table headers
												echo "<tr>
		 												<th colspan='5' scope='col'></th>
														<th colspan='4' scope='col'>1st Qtr MRD</th>
														<th colspan='4' scope='col'>2nd Qtr MRD</th>
														<th colspan='4' scope='col'>3rd Qtr MRD</th>
														<th colspan='5' scope='col'>4th Quarter MRD</th>
														<th colspan='9' scope='col'>Prev Yr 4th Qtr BFAR Reports</th>
														<th colspan='8' scope='col'>Current Yr 1st Qtr BFAR Reports</th>
														<th colspan='8' scope='col'>Current Yr 2nd Qtr BFAR Reports</th>
														<th colspan='8' scope='col'>Current Yr 3rd Qtr BFAR Reports</th>
														<th colspan='8' scope='col'></th>
													  <tr/>
													  
													  <tr>
														<th></th>
														<th></th>
														<th>Seq. No.</th>
														<th width='150' nowrap='nowrap'>Delivery Unit</th>
														<th width='150' nowrap='nowrap'>Contributing Unit</th>
														<th width='50' nowrap='nowrap'>Jan</th>
														<th width='50' nowrap='nowrap'>Feb</th>
														<th width='50' nowrap='nowrap'>Mar</th>
														<th width='150' nowrap='nowrap'>Attachment 1</th>
														<th width='50' nowrap='nowrap'>Apr</th>
														<th width='50' nowrap='nowrap'>May</th>
														<th width='50' nowrap='nowrap'>Jun</th>
														<th width='150' nowrap='nowrap'>Attachment 2</th>
														<th width='50' nowrap='nowrap'>Jul</th>
														<th width='50' nowrap='nowrap'>Aug</th>
														<th width='50' nowrap='nowrap'>Sep</th>
														<th width='150' nowrap='nowrap'>Attachment 3</th>
														<th width='50' nowrap='nowrap'>Oct</th>
														<th width='50' nowrap='nowrap'>Nov</th>
														<th width='50' nowrap='nowrap'>Dec</th>
														<th width='150' nowrap='nowrap'>Attachment 4</th>
														<th width='150' nowrap='nowrap'>Attachment 5</th>
														<th width='50' nowrap='nowrap'>QPRO</th>
														<th width='50' nowrap='nowrap'>SAAODB</th>
														<th width='50' nowrap='nowrap'>SAAODBOE</th>
														<th width='50' nowrap='nowrap'>LASA</th>
														<th width='50' nowrap='nowrap'>SABUDB</th>
														<th width='50' nowrap='nowrap'>SABUDBOE</th>
														<th width='50' nowrap='nowrap'>ADDO</th>
														<th width='50' nowrap='nowrap'>QRROR</th>
														<th width='150' nowrap='nowrap'>Attachment 6</th>
														<th width='50' nowrap='nowrap'>QPRO</th>
														<th width='50' nowrap='nowrap'>SAAODB</th>
														<th width='50' nowrap='nowrap'>SAAODBOE</th>
														<th width='50' nowrap='nowrap'>LASA</th>
														<th width='50' nowrap='nowrap'>SABUDB</th>
														<th width='50' nowrap='nowrap'>SABUDBOE</th>
														<th width='50' nowrap='nowrap'>QRROR</th>
														<th width='150' nowrap='nowrap'>Attachment 7</th>
														<th width='50' nowrap='nowrap'>QPRO</th>
														<th width='50' nowrap='nowrap'>SAAODB</th>
														<th width='50' nowrap='nowrap'>SAAODBOE</th>
														<th width='50' nowrap='nowrap'>LASA</th>
														<th width='50' nowrap='nowrap'>SABUDB</th>
														<th width='50' nowrap='nowrap'>SABUDBOE</th>
														<th width='50' nowrap='nowrap'>QRROR</th>
														<th width='150' nowrap='nowrap'>Attachment 8</th>
														<th width='50' nowrap='nowrap'>QPRO</th>
														<th width='50' nowrap='nowrap'>SAAODB</th>
														<th width='50' nowrap='nowrap'>SAAODBOE</th>
														<th width='50' nowrap='nowrap'>LASA</th>
														<th width='50' nowrap='nowrap'>SABUDB</th>
														<th width='50' nowrap='nowrap'>SABUDBOE</th>
														<th width='50' nowrap='nowrap'>QRROR</th>
														<th width='150' nowrap='nowrap'>Attachment 9</th>
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
                                                echo "<td><a href='bfar_delete.php?id=" . $row->gass_formb_bfar_id . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='bfar_edit.php?id=" . $row->gass_formb_bfar_id . "'>Edit</a></td>";
												// counter
												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												// records

												echo "<td nowrap='nowrap'>" . $row->unit_delivery_name_cu . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit_contributor_name . "</td>";
												
												$months = array("jan", "feb", "mar");
												for ($j=0; $j <= 2; $j++){ 
													$ctr = 'gass_formb_bfar_4_' . $months[$j];
 
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

												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_formb_bfar_4_qtr1_attachment . ">" . $row->gass_formb_bfar_4_qtr1_attachment . "</a></td>";

												$months = array("apr", "may", "jun");
												for ($j=0; $j <= 2; $j++){ 
													$ctr = 'gass_formb_bfar_4_' . $months[$j];
 
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
												
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_formb_bfar_4_qtr2_attachment . ">" . $row->gass_formb_bfar_4_qtr2_attachment . "</a></td>";

												$months = array("jul", "aug", "sep");
												for ($j=0; $j <= 2; $j++){ 
													$ctr = 'gass_formb_bfar_4_' . $months[$j];
 
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

												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_formb_bfar_4_qtr3_attachment . ">" . $row->gass_formb_bfar_4_qtr3_attachment . "</a></td>";

												$months = array("oct", "nov", "dec");
												for ($j=0; $j <= 2; $j++){ 
													$ctr = 'gass_formb_bfar_4_' . $months[$j];
 
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

												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_formb_bfar_4_qtr4_attachment1 . ">" . $row->gass_formb_bfar_4_qtr4_attachment1 . "</a></td>";
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_formb_bfar_4_qtr4_attachment2 . ">" . $row->gass_formb_bfar_4_qtr4_attachment2 . "</a></td>";

												$temp0 = $row->gass_formb_bar_1_qtr4;
													if ( $temp0 == 'Y'){
														$temp0 = 'Yes';
														}
													else
														{
														$temp0 = 'No';
														}

                                                echo "<td nowrap='nowrap'>" . $temp0 . "</td>";

												$num = array("1", "1a", "1b", "2", "2a", "3", "5");
												for ($j=0; $j <= 6; $j++){ 
													$ctr = 'gass_formb_bfar_' . $num[$j] . '_qtr4';
 
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

												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_formb_bfar_qtr4_attachment . ">" . $row->gass_formb_bfar_qtr4_attachment . "</a></td>";

												$temp1 = $row->gass_formb_bar_1_qtr1;
													if ( $temp1 == 'Y'){
														$temp1 = 'Yes';
														}
													else
														{
														$temp1 = 'No';
														}

                                                echo "<td nowrap='nowrap'>" . $temp1 . "</td>";

												$num = array("1", "1a", "1b", "2", "2a", "5");
												for ($j=0; $j <= 5; $j++){ 
													$ctr = 'gass_formb_bfar_' . $num[$j] . '_qtr1';
 
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

												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_formb_bfar_qtr1_attachment . ">" . $row->gass_formb_bfar_qtr1_attachment . "</a></td>";

												$temp2 = $row->gass_formb_bar_1_qtr2;
													if ( $temp2 == 'Y'){
														$temp2 = 'Yes';
														}
													else
														{
														$temp2 = 'No';
														}

                                                echo "<td nowrap='nowrap'>" . $temp2 . "</td>";
												
												$num = array("1", "1a", "1b", "2", "2a", "5");
												for ($j=0; $j <= 5; $j++){ 
													$ctr = 'gass_formb_bfar_' . $num[$j] . '_qtr2';
 
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

												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_formb_bfar_qtr2_attachment . ">" . $row->gass_formb_bfar_qtr2_attachment . "</a></td>";

												$temp3 = $row->gass_formb_bar_1_qtr3;
													if ( $temp3 == 'Y'){
														$temp3 = 'Yes';
														}
													else
														{
														$temp3 = 'No';
														}

                                                echo "<td nowrap='nowrap'>" . $temp3 . "</td>";

												$num = array("1", "1a", "1b", "2", "2a", "5");
												for ($j=0; $j <= 5; $j++){ 
													$ctr = 'gass_formb_bfar_' . $num[$j] . '_qtr3';
 
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
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->gass_formb_bfar_qtr3_attachment . ">" . $row->gass_formb_bfar_qtr3_attachment . "</a></td>";

                                                echo "<td><a href='bfar_edit.php?id=" . $row->gass_formb_bfar_id . "'>Edit</a></td>";
                                                echo "<td><a href='bfar_delete.php?id=" . $row->gass_formb_bfar_id . "' onclick='return checkDelete()'>Delete</a></td>";

										}
                                        
                                        echo "</table>";
                                }
                                // if there are no records in the database, display an alert message
                                else
                                {
										echo "<p><a href='bfar_input.php'>Add New Record</a> | ";
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