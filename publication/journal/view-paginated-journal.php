<?php
				session_name("publication"); 
				session_start();
				// is the one accessing this page logged in or not?

				if ( !isset($_SESSION['user_id_publication']) || $_SESSION['user_id_publication'] !== true) {

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
				background-color:#B43C25;
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
                <h2>Journal Article: View Records</h2>
                <?php
                        // connect to the database
                        include('../connect-db.php');
                        
                        // number of results to show per page
                                        $per_page = 50;
                                        
                                        // figure out the total pages in the database
                        $usercu = $_SESSION['user_cu'];
						$username = $_SESSION['user_name'];
						$acad_yr = $_SESSION['acad_yr'];

						if ($usercu == !'') {
										$query = "SELECT year_cover, tbl_cu.short_name, unit, journal_category, journal_title_article, journal_name, journal_sub_author, journal_author, journal_publisher, journal_editor, journal_cit_dbase, journal_year_published, journal_vol, journal_issue_no, journal_num_pages, journal_issn, journal_circ_level, journal_keyword, user_name, jid FROM tbl_journal_main_raw INNER JOIN tbl_cu ON tbl_journal_main_raw.cu = tbl_cu.id WHERE user_name =  '$username' and year_cover = '$acad_yr' ORDER BY year_cover DESC, user_name ASC, unit ASC, journal_title_article ASC, jid DESC" ;
}
else {
										$query = "SELECT year_cover, tbl_cu.short_name, unit, journal_category, journal_title_article, journal_name, journal_sub_author, journal_author, journal_publisher, journal_editor, journal_cit_dbase, journal_year_published, journal_vol, journal_issue_no, journal_num_pages, journal_issn, journal_circ_level, journal_keyword, user_name, jid FROM tbl_journal_main_raw INNER JOIN tbl_cu ON tbl_journal_main_raw.cu = tbl_cu.id ORDER BY year_cover DESC, user_name ASC, unit ASC, journal_title_article ASC, jid DESC" ;
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
                                                        echo "<p><a href='input-journal.php'>Add New Record</a> | <a href='view-journal.php'>View All</a> | <b>View Page:</b>";
                                                        for ($i = 1; $i <= $total_pages; $i++)
                                                        {
                                                                if (isset($_GET['page']) && $_GET['page'] == $i)
                                                                {
                                                                        echo $i . " ";
                                                                }
                                                                else
                                                                {
                                                                        echo "<a href='view-paginated-journal.php?page=$i'>$i</a> ";
                                                                }
                                                        }
                                                        echo "</p>";
                                                        echo "</div>";
                                                        // display data in table
                                                        echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        echo "<tr>
												<th></th>
												<th></th>
												<th>No.</th>
												<th>Data for the Year</th>
												<th nowrap='nowrap'>Campus</th>
												<th width='150' nowrap='nowrap'>Unit</th>
												<th width='150' nowrap='nowrap'>Journal Category</th>
												<th width='200' nowrap='nowrap'>Title of Journal Article</th>
												<th width='200' nowrap='nowrap'>Name of Journal</th>
												<th width='200' nowrap='nowrap'>Submitting Author</th>
												<th width='200' nowrap='nowrap'>Author(s)</th>
												<th width='200' nowrap='nowrap'>Publisher(s)</th>
												<th width='200' nowrap='nowrap'>Editor(s)</th>
												<th width='200' nowrap='nowrap'>Citation Database(s)</th>
												<th>Year Published</th>
												<th>Vol</th>
												<th>Issue No.</th>
												<th>No. of Pages</th>
												<th>ISSN</th>
												<th>Circulation Level</th>
												<th width='200' nowrap='nowrap'>Keyword(s)</th>
												<th>Encoded By</th>
												<th></th>
												<th></th>
											</tr>";
                                                		$nctr=1;
                                                        $ctr=1;
														// loop through results of database query, displaying them in the table 
                                                        for ($i = $start; $i < $end; $i++)
                                                        {
                                                        
														//alternate color of background
                                        				if ($ctr==1) {echo "<tr bgcolor='#F3AA2C'>"; $ctr=0;}
														else {echo "<tr bgcolor='#FFFFFF'>"; $ctr=1;}
														
														        // make sure that PHP doesn't try to show results that don't exist
                                                        if ($i == $total_results) { break; }
                                                        
                                                                // find specific row
                                                                $result->data_seek($i);
                                                                        $row = $result->fetch_row();
                                                                        
                                                        // echo out the contents of each row into a table
														echo '<td><a href="delete-journal.php?id=' . $row[19] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        echo '<td><a href="edit-journal.php?id=' . $row[19] . '">Edit</a></td>';                                                        /*echo '<td nowrap="nowrap"><a href="award-input-journal.php?id=' . $row[15] . '">Add Award</a></td>';*/
														echo "<td id='txtright'>" . $nctr. "</td>";
														$nctr=$nctr+1;
														echo '<td id="txtright">' . $row[0] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[1] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[2] . '</td>';
														echo '<td nowrap="nowrap">' . $row[3] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[4] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[5] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[6] . '</td>';
														echo '<td nowrap="nowrap">' . $row[7] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[8] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[9] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[10] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[11] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[12] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[13] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[14] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[15] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[16] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[17] . '</td>';
                                                		echo "<td id='txtright'><a href='../login/user-info.php?unid=" . $row[18] . "'>" . $row[18] . "</a></td>";
                                                        /*echo '<td nowrap="nowrap"><a href="award-input-journal.php?id=' . $row[15] . '">Add Award</a></td>';*/                                                        echo '<td><a href="edit-journal.php?id=' . $row[19] . '">Edit</a></td>';
                                                        echo '<td><a href="delete-journal.php?id=' . $row[19] . '" onclick="return checkDelete()">Delete</a></td>';
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