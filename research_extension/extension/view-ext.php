<?php
				session_name("research_extension");
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
    			return confirm('Are you sure?');
				}
				</script>

        </head>
        <body>
                <div class="viewbody">
                <h2>Extension Service: View Records</h2>
                
                <p><a href="input-ext.php">Add New Record</a> | <b>View All</b> | <a href="view-paginated-ext.php">View Page</a> </p>
                <?php
                        // connect to the database
                        include('../connect-db.php');
                        
                        // get the records from the database
						$usercu = $_SESSION['user_cu'];
						$username = $_SESSION['user_name'];
						$acad_yr = $_SESSION['acad_yr'];

						if ($usercu == !'') {						
$query = "SELECT year_cover, tbl_cu.short_name, unit, extension_title, prep_edate, sign_edate, imple_sdate, imple_edate, close_edate, num_session, hrs_session, objective, out_imp, interest_ext, prog_class, activity_type, client_type, client_count, sponsor, curr_gen_fund, gen_fund, curr_revolv_fund, revolv_fund, curr_oth_fund, other_fund, curr_npriv_fund, npriv_fund, curr_ipriv_fund, ipriv_fund, faculty, reps, other_staff, adj_ladder, user_name, eid FROM tbl_extension_main_raw INNER JOIN tbl_cu ON tbl_extension_main_raw.cu = tbl_cu.id WHERE user_name = '$username' and year_cover = '$acad_yr'ORDER BY year_cover DESC, user_name ASC, unit ASC, extension_title ASC, prep_edate ASC, eid DESC" ;
}
else {
$query = "SELECT year_cover, tbl_cu.short_name, unit, extension_title, prep_edate, sign_edate, imple_sdate, imple_edate, close_edate, num_session, hrs_session, objective, out_imp, interest_ext, prog_class, activity_type, client_type, client_count, sponsor, curr_gen_fund, gen_fund, curr_revolv_fund, revolv_fund, curr_oth_fund, other_fund, curr_npriv_fund, npriv_fund, curr_ipriv_fund, ipriv_fund, faculty, reps, other_staff, adj_ladder, user_name, eid FROM tbl_extension_main_raw INNER JOIN tbl_cu ON tbl_extension_main_raw.cu = tbl_cu.id ORDER BY year_cover DESC, tbl_cu.short_name ASC, user_name ASC, unit ASC, extension_title ASC, prep_edate ASC, eid DESC" ;
}
						if ($result = $mysqli->query($query))
						{									
                                // display records if there are records to display
                                if ($result->num_rows > 0)
                                {
										
										// display records in a table
                                        echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        
                                        // set table headers
                                        echo "<tr>
												<th></th>
												<th></th>
												<th>No.</th>
												<th>Data for the Year</th>
												<th nowrap='nowrap'>Campus</th>
												<th width='150' nowrap='nowrap'>Parent Unit</th>
												<th width='150' nowrap='nowrap'>Extension Service Title</th>
												<th>Proposal Preparation Date</th>
												<th>MOU/MOA Signing Date</th>
												<th nowrap='nowrap' colspan='2'>Actual<br/>Implementation<br/>Start and End Date</th>
												<th>Closeout<br/>Date</th>
												<th>Number of Session</th>
												<th>Number of Hours Per Session</th>
												<th width='150' nowrap='nowrap'>Objective(s)</th>
												<th nowrap='nowrap'>Service Impact</th>
												<th nowrap='nowrap'>Interest</th>
												<th nowrap='nowrap'>Program<br/>Classification</th>
												<th nowrap='nowrap'>Type of Activity</th>
												<th nowrap='nowrap'>Sector</th>
												<th>Number of Participants</th>
												<th nowrap='nowrap'>Sponsor(s)</th>
												<th>Curr</th>
												<th width='80'>General Fund</th>
												<th>Curr</th>
												<th width='80'>Revolving Fund</th>
												<th>Curr</th>
												<th width='80'>Other Phil. Govt. Fund</th>
												<th>Curr</th>
												<th width='80'>Nat. Priv. Fund</th>
												<th>Curr</th>
												<th width='80'>Int. Priv. Fund</th>
												<th width='150' nowrap='nowrap'>Faculty Members</th>
												<th width='150' nowrap='nowrap'>REPs</th>
												<th width='150' nowrap='nowrap'>Other Staff</th>
												<th width='80' nowrap='nowrap'>Average Rank</th>
												<th>Encoded By</th>
												<th></th>
												<th></th>
											</tr>";

										$nctr=1;
                                   		$ctr=1;
                                        while ($row = $result->fetch_object())
                                        {
                                                //alternate color of background
                                        		if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
												else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

												// set up a row for each record
                                                echo "<td><a href='delete-ext.php?id=" . $row->eid . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='edit-extension.php?id=" . $row->eid . "'>Edit</a></td>";

												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
                                                
                                                echo "<td id='txtright'>" . $row->year_cover . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->short_name . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->extension_title . "</td>";
                                                
												$prep_edate = strtotime($row->prep_edate);
                                                echo '<td id="txtright">' . date("m/d/Y",$prep_edate) . '</td>';

												$sign_edate = strtotime($row->sign_edate);
                                                echo '<td id="txtright">' . date("m/d/Y",$sign_edate) . '</td>';
																						
												$imple_sdate = strtotime($row->imple_sdate);
                                                echo '<td id="txtright">' . date("m/d/Y",$imple_sdate) . '</td>';
												$imple_edate = strtotime($row->imple_edate);
                                                echo '<td id="txtright">' . date("m/d/Y",$imple_edate) . '</td>';

												$close_edate = strtotime($row->close_edate);
                                                echo '<td id="txtright">' . date("m/d/Y",$close_edate) . '</td>';

												echo "<td id='txtright'>" . $row->num_session . "</td>";
												echo "<td id='txtright'>" . $row->hrs_session . "</td>";
                                               	echo "<td nowrap='nowrap'>" . $row->objective . "</td>";
												echo "<td nowrap='nowrap'>" . $row->out_imp . "</td>";
												echo "<td nowrap='nowrap'>" . $row->interest_ext . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->prog_class . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->activity_type . "</td>";
												echo "<td nowrap='nowrap'>" . $row->client_type . "</td>";
												echo "<td id='txtright'>" . $row->client_count . "</td>";
												echo "<td nowrap='nowrap'>" . $row->sponsor . "</td>";
                                                echo "<td>" . $row->curr_gen_fund . "</td>";
                                                echo "<td id='txtright'>" . number_format($row->gen_fund,2) . "</td>";
												echo "<td>" . $row->curr_revolv_fund . "</td>";
                                                echo "<td id='txtright'>" . number_format($row->revolv_fund,2) . "</td>";
                                                echo "<td>" . $row->curr_oth_fund . "</td>";
												echo "<td id='txtright'>" . number_format($row->other_fund,2) . "</td>";
                                                echo "<td>" . $row->curr_npriv_fund . "</td>";
                                                echo "<td id='txtright'>" . number_format($row->npriv_fund,2) . "</td>";
                                                echo "<td>" . $row->curr_ipriv_fund . "</td>";
                                                echo "<td id='txtright'>" . number_format($row->ipriv_fund,2) . "</td>";
												echo "<td nowrap='nowrap'>" . $row->faculty . "</td>";
												echo "<td nowrap='nowrap'>" . $row->reps . "</td>";
												echo "<td nowrap='nowrap'>" . $row->other_staff . "</td>";
												echo "<td nowrap='nowrap'>" . $row->adj_ladder . "</td>";
                                                echo "<td id='txtright'><a href='../login/user-info.php?unid=" . $row->user_name . "'>" . $row->user_name . "</a></td>";
                        
                                                echo "<td><a href='edit-extension.php?id=" . $row->eid . "'>Edit</a></td>";
                                                echo "<td><a href='delete-ext.php?id=" . $row->eid . "' onclick='return checkDelete()'>Delete</a></td>";
                                        }
                                        
                                        echo "</table>";
                                }
                                // if there are no records in the database, display an alert message
                                else
                                {
                                        echo "No results to display!";
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