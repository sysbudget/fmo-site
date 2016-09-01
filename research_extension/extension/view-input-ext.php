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
                <h2>Extension Service: View Record</h2>
                <?php
                        // connect to the database
                        include('../connect-db.php');
                        
                        // number of results to show per page
                                        $per_page = 1;
                                        
                                        // figure out the total pages in the database
										$usercu = $_SESSION['user_cu'];
										$username = $_SESSION['user_name'];
										if ($usercu == !'') {
$query = "SELECT year_cover, tbl_cu.short_name, unit, extension_title, prep_edate, sign_edate, imple_sdate, imple_edate, close_edate, num_session, hrs_session, objective, out_imp, interest_ext, prog_class, activity_type, client_type, client_count, sponsor, curr_gen_fund, gen_fund, curr_revolv_fund, revolv_fund, curr_oth_fund, other_fund, curr_npriv_fund, npriv_fund, curr_ipriv_fund, ipriv_fund, faculty, reps, other_staff, adj_ladder, user_name, eid FROM tbl_extension_main_raw INNER JOIN tbl_cu ON tbl_extension_main_raw.cu = tbl_cu.id WHERE user_name =  '$username' ORDER BY eid DESC" ;
}
else {
$query = "SELECT year_cover, tbl_cu.short_name, unit, extension_title, prep_edate, sign_edate, imple_sdate, imple_edate, close_edate, num_session, hrs_session, objective, out_imp, interest_ext, prog_class, activity_type, client_type, client_count, sponsor, curr_gen_fund, gen_fund, curr_revolv_fund, revolv_fund, curr_oth_fund, other_fund, curr_npriv_fund, npriv_fund, curr_ipriv_fund, ipriv_fund, faculty, reps, other_staff, adj_ladder, user_name, eid FROM tbl_extension_main_raw INNER JOIN tbl_cu ON tbl_extension_main_raw.cu = tbl_cu.id ORDER BY eid DESC" ;
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
														echo "<p><a href='input-ext.php'>Add New Record</a>";
                                                        echo "</div>";
														//echo "<p><a href='view.php'>View All</a> | <b>View Page:</b> ";
                                                        //for ($i = 1; $i <= $total_pages; $i++)
                                                        //{
                                                        //        if (isset($_GET['page']) && $_GET['page'] == $i)
                                                        //        {
                                                        //                echo $i . " ";
                                                        //        }
                                                        //        else
                                                        //        {
                                                        //                echo "<a href='view-paginated.php?page=$i'>$i</a> ";
                                                        //        }
                                                        //}
                                                        //echo "</p>";
                                                        
                                                        // display data in table
                                                 echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        echo "<tr>
												<th></th>
												<th></th>
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
                                                
                                                        // loop through results of database query, displaying them in the table 
                                                        for ($i = $start; $i < $end; $i++)
                                                        {
                                                                // make sure that PHP doesn't try to show results that don't exist
                                                        if ($i == $total_results) { break; }
                                                        
                                                                // find specific row
                                                                $result->data_seek($i);
                                                                        $row = $result->fetch_row();
                                                                        
                                                                        // echo out the contents of each row into a table
                                                        echo '<tr bgcolor="#F3AA2C">';

														echo '<td><a href="delete-ext.php?id=' . $row[34] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        echo '<td><a href="edit-extension.php?id=' . $row[34] . '">Edit</a></td>';
                                                        
														echo '<td id="txtright">' . $row[0] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[1] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[2] . '</td>';
														echo '<td nowrap="nowrap">' . $row[3] . '</td>';
                                                        
														$prep_edate = strtotime($row[4]);
                                                        echo '<td id="txtright">' . date("m/d/Y",$prep_edate) . '</td>';
														$sign_edate = strtotime($row[5]);
                                                        echo '<td id="txtright">' . date("m/d/Y",$sign_edate) . '</td>';
														$imple_sdate = strtotime($row[6]);
                                                        echo '<td id="txtright">' . date("m/d/Y",$imple_sdate) . '</td>';
														$imple_edate = strtotime($row[7]);
                                                        echo '<td id="txtright">' . date("m/d/Y",$imple_edate) . '</td>';
														$close_edate = strtotime($row[8]);
                                                        echo '<td id="txtright">' . date("m/d/Y",$close_edate) . '</td>';
														
                                                        echo '<td id="txtright">' . $row[9] . '</td>';
                                                        echo '<td id="txtright">' . $row[10] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[11] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[12] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[13] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[14] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[15] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[16] . '</td>';
                                                        echo '<td id="txtright">' . $row[17] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[18] . '</td>';
                                                        echo '<td>' . $row[19] . '</td>';
                                                        echo '<td id="txtright">' . number_format($row[20],2) . '</td>';
                                                        echo '<td>' . $row[21] . '</td>';
                                                        echo '<td id="txtright">' . number_format($row[22],2) . '</td>';
                                                        echo '<td>' . $row[23] . '</td>';
                                                        echo '<td id="txtright">' . number_format($row[24],2) . '</td>';
                                                        echo '<td>' . $row[25] . '</td>';
                                                        echo '<td id="txtright">' . number_format($row[26],2) . '</td>';
                                                        echo '<td>' . $row[27] . '</td>';
                                                        echo '<td id="txtright">' . number_format($row[28],2) . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[29] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[30] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[31] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[32] . '</td>';
														
                                                		echo "<td id='txtright'><a href='../login/user-info.php?unid=" . $row[33] . "'>" . $row[33] . "</a></td>";
                                                        
                                                        echo '<td><a href="edit-extension.php?id=' . $row[34] . '">Edit</a></td>';
														echo '<td><a href="delete-ext.php?id=' . $row[34] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        
														echo "</tr>";
                                                        }

                                                        // close table>
                                                        echo "</table>";
                                                }
                                                else
                                                {
                                                        echo "No results to display!";
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
