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
                <h2>Book Chapter: View Record</h2>
                <?php
                        // connect to the database
                        include('../connect-db.php');
                        
                        // number of results to show per page
                                        $per_page = 1;
                                        
										// get the id from the url
											$bcid = $_GET['id'];

                                        // figure out the total pages in the database
										$query = "SELECT year_cover, tbl_cu.short_name, unit, chapter_category, chapter_title, chapter_book_title, chapter_sub_author, chapter_author, chapter_book_publisher, chapter_book_editor, chapter_cit_dbase, chapter_book_year_published, chapter_book_edition, chapter_num_pages ,chapter_book_isbn,  chapter_book_circ_level, chapter_keyword, user_name, bcid FROM tbl_chapter_main_raw INNER JOIN tbl_cu ON tbl_chapter_main_raw.cu = tbl_cu.id WHERE bcid = " . $bcid ;

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
														echo "<p><a href='input-chapter.php'>Add New Book Chapter</a>";
														echo "</div>";
                                                        
                                                        // display data in table
                                                 echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        echo "<tr>
												<th></th>
												<th></th>
												<th>Data for the Year</th>
												<th nowrap='nowrap'>Campus</th>
												<th width='150' nowrap='nowrap'>Unit</th>
												<th>Category</th>
												<th width='200' nowrap='nowrap'>Title of Chapter</th>
												<th width='200' nowrap='nowrap'>Title of Book</th>
												<th width='200' nowrap='nowrap'>Submitting Author</th>
												<th width='200' nowrap='nowrap'>Author(s)</th>
												<th width='200' nowrap='nowrap'>Publisher(s)</th>
												<th width='200' nowrap='nowrap'>Editor(s)</th>
												<th width='200' nowrap='nowrap'>Citation Database(s)</th>
												<th>Year Published</th>
												<th>Edition</th>
												<th>Number of Pages</th>
												<th>ISBN</th>
												<th>Circulation Level</th>
												<th>Keyword(s)</th>
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
														echo '<td><a href="delete-chapter.php?id=' . $row[18] . '" onclick="return checkDelete()">Delete</a></td>';
                                                        echo '<td><a href="edit-chapter.php?id=' . $row[18] . '">Edit</a></td>';                                                     					
                                                        /*echo '<td nowrap="nowrap"><a href="award-input-chapter.php?id=' . $row[12] . '">Add Award</a></td>';*/
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
                                                        echo '<td nowrap="nowrap">' . $row[15] . '</td>';
                                                        echo '<td nowrap="nowrap">' . $row[16] . '</td>';
                                                		echo "<td id='txtright'><a href='../login/user-info.php?unid=" . $row[17] . "'>" . $row[17] . "</a></td>";
                                                        /*echo '<td nowrap="nowrap"><a href="award-input-chapter.php?id=' . $row[12] . '">Add Award</a></td>';*/                                                        echo '<td><a href="edit-chapter.php?id=' . $row[18] . '">Edit</a></td>';
                                                        echo '<td><a href="delete-chapter.php?id=' . $row[18] . '" onclick="return checkDelete()">Delete</a></td>';
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
