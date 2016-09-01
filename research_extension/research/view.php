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
                <h2>Research Project: View Records</h2>
                <div class="viewlinks">
                <p><a href="input.php">Add New Record</a> | <b>View All</b> | <a href="view-paginated.php">View Page</a> </p>
                </div>
                <?php
				// connect to the database
					include('../connect-db.php');
                        
                        // get the records from the database
						$usercu = $_SESSION['user_cu'];
						$username = $_SESSION['user_name'];
						$acad_yr = $_SESSION['acad_yr'];

						if ($usercu == !'') {
						$query = "SELECT year_cover, tbl_cu.short_name, unit, rsrch_title, status, start_date, end_date, objective, rsrch_type, interest, out_imp, sponsor, curr_gen_fund, gen_fund, curr_revolv_fund, revolv_fund, curr_oth_fund, other_fund, curr_npriv_fund, npriv_fund, curr_ipriv_fund, ipriv_fund, faculty, reps, other_staff, user_name, rid FROM tbl_research_main_raw INNER JOIN tbl_cu ON tbl_research_main_raw.cu = tbl_cu.id WHERE user_name =  '$username' and year_cover = '$acad_yr' ORDER BY year_cover DESC, user_name ASC, unit ASC, rsrch_title ASC, start_date ASC, rid DESC";
}
else {						
						$query = "SELECT year_cover, tbl_cu.short_name, unit, rsrch_title, status, start_date, end_date, objective, rsrch_type, interest, out_imp, sponsor, curr_gen_fund, gen_fund, curr_revolv_fund, revolv_fund, curr_oth_fund, other_fund, curr_npriv_fund, npriv_fund, curr_ipriv_fund, ipriv_fund, faculty, reps, other_staff, user_name, rid FROM tbl_research_main_raw INNER JOIN tbl_cu ON tbl_research_main_raw.cu = tbl_cu.id ORDER BY year_cover DESC, tbl_cu.short_name ASC, user_name ASC, unit ASC, rsrch_title ASC, start_date ASC, rid DESC" ;
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
												<th width='150' nowrap='nowrap'>Research Project Title</th>
												<th nowrap='nowrap'>Status</th>
												<th nowrap='nowrap'>Start Date</th>
												<th nowrap='nowrap'>End Date</th>
												<th width='150' nowrap='nowrap'>Objective(s)</th>
												<th nowrap='nowrap'>Research Type</th>
												<th nowrap='nowrap'>Interest</th>
												<th nowrap='nowrap'>Proj. Impact</th>
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
                                                echo "<td><a href='delete.php?id=" . $row->rid . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='edit-research.php?id=" . $row->rid . "'>Edit</a></td>";

												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;

                                                echo "<td id='txtright'>" . $row->year_cover . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->short_name . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->rsrch_title . "</td>";
												echo "<td nowrap='nowrap'>" . $row->status . "</td>";
                                                
												$start_date = strtotime($row->start_date);
                                                echo '<td id="txtright">' . date("m/d/Y",$start_date) . '</td>';
												$end_date = strtotime($row->end_date);
                                                echo '<td id="txtright">' . date("m/d/Y",$end_date) . '</td>';
																						
												echo "<td nowrap='nowrap'>" . $row->objective . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->rsrch_type . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->interest . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->out_imp . "</td>";
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

                                                echo "<td id='txtright'><a href='../login/user-info.php?unid=" . $row->user_name . "'>" . $row->user_name . "</a></td>";
												
                                                echo "<td><a href='edit-research.php?id=" . $row->rid . "'>Edit</a></td>";
                                                echo "<td><a href='delete.php?id=" . $row->rid . "' onclick='return checkDelete()'>Delete</a></td>";
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