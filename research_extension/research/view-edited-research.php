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
                
                <?php
				// connect to the database
					include('../connect-db.php');
                        
                        // number of results to show per page
                                        $per_page = 1;
                                        
										// get the id from the url
											$rid = $_GET['id'];

                                        // figure out the total pages in the database
                                        $query = "SELECT year_cover, tbl_cu.short_name, unit, rsrch_title, status, start_date, end_date, objective, rsrch_type, interest, out_imp, sponsor, curr_gen_fund, gen_fund, curr_revolv_fund, revolv_fund, curr_oth_fund, other_fund, curr_npriv_fund, npriv_fund, curr_ipriv_fund, ipriv_fund, faculty, reps, other_staff, user_name, rid FROM tbl_research_main_raw INNER JOIN tbl_cu ON tbl_research_main_raw.cu = tbl_cu.id WHERE rid = " . $rid ;

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
														echo "<p><a href='input.php'>Add New Record</a>";
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
                                                        echo '<td><a href="delete.php?id=' . $rid . '" onclick="return checkDelete()">Delete</a></td>';
                                                        echo '<td><a href="edit-research.php?id=' . $rid . '">Edit</a></td>';
                                                        
                                                		echo '<td id="txtright">' . $row[0] . '</td>';												       
                                                        echo '<td nowrap="nowrap">' . $row[1] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[2] . '</td>';
														echo '<td nowrap="nowrap">' . $row[3] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[4] . '</td>';
                                                        
														$start_date = strtotime($row[5]);
                                                        echo '<td id="txtright">' . date("m/d/Y",$start_date) . '</td>';
														$end_date = strtotime($row[6]);
                                                        echo '<td id="txtright">' . date("m/d/Y",$end_date) . '</td>';
																												
                                                        echo '<td nowrap="nowrap">' . $row[7] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[8] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[9] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[10] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[11] . '</td>';
                                                        echo '<td>' . $row[12] . '</td>';
                                                        echo '<td id="txtright">' . number_format($row[13],2) . '</td>';
                                                        echo '<td>' . $row[14] . '</td>';
                                                        echo '<td id="txtright">' . number_format($row[15],2) . '</td>';
                                                        echo '<td>' . $row[16] . '</td>';
                                                        echo '<td id="txtright">' . number_format($row[17],2) . '</td>';
                                                        echo '<td>' . $row[18] . '</td>';
                                                        echo '<td id="txtright">' . number_format($row[19],2) . '</td>';
                                                        echo '<td>' . $row[20] . '</td>';
                                                        echo '<td id="txtright">' . number_format($row[21],2) . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[22] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[23] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[24] . '</td>';
														
                                                		echo "<td id='txtright'><a href='../login/user-info.php?unid=" . $row[25] . "'>" . $row[25] . "</a></td>";
                                                        
                                                        echo '<td><a href="edit-research.php?id=' . $rid . '">Edit</a></td>';
                                                        echo '<td><a href="delete.php?id=' . $rid . '" onclick="return checkDelete()">Delete</a></td>';
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
