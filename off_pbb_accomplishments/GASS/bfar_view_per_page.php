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
														echo "<a href='bfar_view_all.php'>View All</a> | <b>View Page:</b> ";
                                                        for ($i = 1; $i <= $total_pages; $i++)
                                                        {
                                                                if (isset($_GET['page']) && $_GET['page'] == $i)
                                                                {
                                                                        echo $i . " ";
                                                                }
                                                                else
                                                                {
                                                                        echo "<a href='bfar_view_per_page.php?page=$i'>$i</a> ";
                                                                }
                                                        }
                                                        echo "</div>";
                                                        echo "</p>";

                                                        
                                                        // display data in table
														
                                                echo "<table border='1' cellpadding='2' cellspacing='1'>";
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
                                                        
														echo '<td><a href="bfar_delete.php?id=' . $row[52] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        echo '<td><a href="bfar_edit.php?id=' . $row[52] . '">Edit</a></td>';

														// counter
														echo "<td id='txtright'>" . $nctr. "</td>";
														$nctr=$nctr+1;
														// records
                                                        echo '<td nowrap="nowrap">' . $row[0] . '</td>';
														echo '<td nowrap="nowrap">' . $row[1] . '</td>';

														for ($j=2; $j <= 4; $j++){ 
														if ($row[$j] == 'Y'){
															$temp = 'Yes';
															}
															else
															{
															$temp = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp . '</td>';
														}

														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[5] . ">" . $row[5] . "</a></td>";
                                                        
														for ($j=6; $j <= 8; $j++){ 
														if ($row[$j] == 'Y'){
															$temp = 'Yes';
															}
															else
															{
															$temp = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp . '</td>';
														}

														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[9] . ">" . $row[9] . "</a></td>";
														
														
														for ($j=10; $j <= 12; $j++){ 
														if ($row[$j] == 'Y'){
															$temp = 'Yes';
															}
															else
															{
															$temp = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp . '</td>';
														}

														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[13] . ">" . $row[13] . "</a></td>";

														for ($j=14; $j <= 16; $j++){ 
														if ($row[$j] == 'Y'){
															$temp = 'Yes';
															}
															else
															{
															$temp = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp . '</td>';
														}

														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[17] . ">" . $row[17] . "</a></td>";
														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[18] . ">" . $row[18] . "</a></td>";														

														for ($j=19; $j <= 26; $j++){ 
														if ($row[$j] == 'Y'){
															$temp = 'Yes';
															}
															else
															{
															$temp = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp . '</td>';
														}

														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[27] . ">" . $row[27] . "</a></td>";

														for ($j=28; $j <= 34; $j++){ 
														if ($row[$j] == 'Y'){
															$temp = 'Yes';
															}
															else
															{
															$temp = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp . '</td>';
														}

														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[35] . ">" . $row[35] . "</a></td>";

														for ($j=36; $j <= 42; $j++){ 
														if ($row[$j] == 'Y'){
															$temp = 'Yes';
															}
															else
															{
															$temp = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp . '</td>';
														}

														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[43] . ">" . $row[43] . "</a></td>";

														for ($j=44; $j <= 50; $j++){ 
														if ($row[$j] == 'Y'){
															$temp = 'Yes';
															}
															else
															{
															$temp = 'No';
															}
															
                                                        echo '<td nowrap="nowrap">' . $temp . '</td>';
														}

														echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row[51] . ">" . $row[51] . "</a></td>";

                                                        echo '<td><a href="bfar_edit.php?id=' . $row[52] . '">Edit</a></td>';
                                                        echo '<td><a href="bfar_delete.php?id=' . $row[52] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        
														echo "</tr>";
                                                        }

                                                        // close table>
                                                        echo "</table>";
                                                }
                                                else
                                                {
														echo "<p><a href='bfar_input.php'>Add New Record</a> | ";
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
