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
                <h2>Book Chapter: View Records</h2>
                <div class="viewlinks">
                <p><a href="input-chapter.php">Add New Record</a> | <b>View All</b> | <a href="view-paginated-chapter.php">View Page</a> </p>
                </div>
                <?php
                        // connect to the database
                        include('../connect-db.php');
                        
                        // get the records from the database
						$usercu = $_SESSION['user_cu'];
						$username = $_SESSION['user_name'];
						$acad_yr = $_SESSION['acad_yr'];
						
						if ($usercu == !'') {
										$query = "SELECT year_cover, tbl_cu.short_name, unit, chapter_category, chapter_title, chapter_book_title, chapter_sub_author, chapter_author, chapter_book_publisher, chapter_book_editor, chapter_cit_dbase, chapter_book_year_published, chapter_book_edition, chapter_num_pages ,chapter_book_isbn,  chapter_book_circ_level, chapter_keyword, user_name, bcid FROM tbl_chapter_main_raw INNER JOIN tbl_cu ON tbl_chapter_main_raw.cu = tbl_cu.id WHERE user_name =  '$username'  and year_cover = '$acad_yr' ORDER BY year_cover DESC, user_name ASC, unit ASC, chapter_title ASC, chapter_book_title ASC, bcid DESC" ;
}
else {						
										$query = "SELECT year_cover, tbl_cu.short_name, unit, chapter_category, chapter_title, chapter_book_title, chapter_sub_author, chapter_author, chapter_book_publisher, chapter_book_editor, chapter_cit_dbase, chapter_book_year_published, chapter_book_edition, chapter_num_pages ,chapter_book_isbn,  chapter_book_circ_level, chapter_keyword, user_name, bcid FROM tbl_chapter_main_raw INNER JOIN tbl_cu ON tbl_chapter_main_raw.cu = tbl_cu.id ORDER BY year_cover DESC, user_name ASC, unit ASC, chapter_title ASC, chapter_book_title ASC, bcid DESC" ;
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
										
										$nctr=1;											
                                        $ctr=1;
                                        while ($row = $result->fetch_object())
                                        {
                                                //alternate color of background
                                        		if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
												else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

												// set up a row for each record
                                                echo "<td><a href='delete-chapter.php?id=" . $row->bcid . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='edit-chapter.php?id=" . $row->bcid . "'>Edit</a></td>";                                               
                                                /*echo "<td nowrap='nowrap'><a href='award-input-chapter.php?id=" . $row->bcid . "'>Add Award</a></td>";*/
                                                echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												echo "<td id='txtright'>" . $row->year_cover . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->short_name . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->chapter_category . "</td>";
												echo "<td nowrap='nowrap'>" . $row->chapter_title . "</td>";
												echo "<td nowrap='nowrap'>" . $row->chapter_book_title . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->chapter_sub_author . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->chapter_author . "</td>";
												echo "<td nowrap='nowrap'>" . $row->chapter_book_publisher . "</td>";
												echo "<td nowrap='nowrap'>" . $row->chapter_book_editor . "</td>";
												echo "<td nowrap='nowrap'>" . $row->chapter_cit_dbase . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->chapter_book_year_published . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->chapter_book_edition . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->chapter_num_pages . "</td>";
                                                echo "<td id='txtright' nowrap='nowrap'>" . $row->chapter_book_isbn . "</td>";
												echo "<td nowrap='nowrap'>" . $row->chapter_book_circ_level . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->chapter_keyword . "</td>";
                                                echo "<td id='txtright'><a href='../login/user-info.php?unid=" . $row->user_name . "'>" . $row->user_name . "</a></td>";
                                                /*echo "<td nowrap='nowrap'><a href='award-input-chapter.php?id=" . $row->bcid . "'>Add Award</a></td>";*/
												echo "<td><a href='edit-chapter.php?id=" . $row->bcid . "'>Edit</a></td>";
                                                echo "<td><a href='delete-chapter.php?id=" . $row->bcid . "' onclick='return checkDelete()'>Delete</a></td>";
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