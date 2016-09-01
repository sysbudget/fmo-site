<?php
				session_name("scholarship"); 
				session_start();
				// is the one accessing this page logged in or not?

				if ( !isset($_SESSION['user_id_scholarship']) || $_SESSION['user_id_scholarship'] !== true) {

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
                <h2>Scholarship/Fellowship: View Record</h2>
                <?php
                        // connect to the database
                        include('../connect-db.php');
                        
                        // number of results to show per page
                                        $per_page = 1;
                                        
                                        // figure out the total pages in the database
                                        $usercu = $_SESSION['user_cu'];
										$username = $_SESSION['user_name'];
										if ($usercu == !'') {
										$query = "SELECT year_cover, tbl_cu.short_name, coll_nm,  scho_nm_list, scho_nm_alt, fund_source, sponsor, pre_bacc, bacc, post_bacc, master, doctor, ni, user_name, sid FROM tbl_main INNER JOIN tbl_cu ON tbl_main.cu = tbl_cu.id WHERE user_name =  '$username' ORDER BY sid DESC" ;
}
else {
										$query = "SELECT year_cover, tbl_cu.short_name, coll_nm,  scho_nm_list, scho_nm_alt, fund_source, sponsor, pre_bacc, bacc, post_bacc, master, doctor, ni, user_name, sid FROM tbl_main INNER JOIN tbl_cu ON tbl_main.cu = tbl_cu.id ORDER BY sid DESC" ;

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
														echo "<p><a href='input-scholar.php'>Add New Record</a>";
                                                        echo "</div>";
                                                        
                                                        // display data in table
                                                 echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        echo "<tr>
												<th></th>
												<th></th>
												<th>Data for the Year</th>
												<th nowrap='nowrap'>Campus</th>
												<th width='150' nowrap='nowrap'>Recipient College/<br/>Institue</th>
												<th width='200' nowrap='nowrap'>Name of Sholarship/Fellowship (Listed)</th>
												<th width='200' nowrap='nowrap'>Name of Sholarship/Fellowship (Encoded)</th>
												<th width='150' nowrap='nowrap'>Type of Funding</th>
												<th width='200' nowrap='nowrap'>Sponsor(s)</th>
												<th width='100' nowrap='nowrap'>Pre-Bacc<br/>Certificate/Diploma</th>
												<th width='100' nowrap='nowrap'>Baccalaureate</th>
												<th width='100' nowrap='nowrap'>Post-Bacc<br/>Certificate/Diploma</th>
												<th width='100' nowrap='nowrap'>Master's</th>
												<th width='100' nowrap='nowrap'>Doctorate</th>
												<th width='100' nowrap='nowrap'>Education Level<br/>Not Indicated</th>
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
														echo '<td><a href="delete-scholar.php?id=' . $row[14] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        echo '<td><a href="edit-scholar.php?id=' . $row[14] . '">Edit</a></td>'; 
														echo '<td id="txtright">' . $row[0] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[1] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[2] . '</td>';
														echo '<td nowrap="nowrap">' . $row[3] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[4] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[5] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[6] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[7] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[8] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[9] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[10] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[11] . '</td>';
                                                        echo '<td id="txtright" nowrap="nowrap">' . $row[12] . '</td>';
                                                		echo "<td id='txtright'><a href='../login/user-info.php?unid=" . $row[13] . "'>" . $row[13] . "</a></td>";
                                                        echo '<td><a href="edit-scholar.php?id=' . $row[14] . '">Edit</a></td>';
                                                        echo '<td><a href="delete-scholar.php?id=' . $row[14] . '" onclick="return checkDelete()">Delete</a></td>';
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
