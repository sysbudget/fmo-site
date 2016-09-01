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
                <h2>Conference Paper: View Records</h2>
                <div class="viewlinks">
                <p><a href="input-paper.php">Add New Record</a> | <b>View All</b> | <a href="view-paginated-paper.php">View Page</a> </p>
                </div>
                <?php
                        // connect to the database
                        include('../connect-db.php');
                        
                        // get the records from the database
						$usercu = $_SESSION['user_cu'];
						$username = $_SESSION['user_name'];
						$acad_yr = $_SESSION['acad_yr'];

						if ($usercu == !'') {
										$query = "SELECT year_cover, tbl_cu.short_name, unit, paper_category, paper_title_paper, paper_sub_researcher, paper_researcher, paper_publisher, paper_editor, paper_cit_dbase, paper_year_published, paper_vol, paper_issue_no, paper_num_pages, paper_circ_level, paper_title_conference, paper_venue_conference, paper_date_conference, paper_organizer_conference, paper_confe_level, paper_keyword, user_name, pid FROM tbl_paper_main_raw INNER JOIN tbl_cu ON tbl_paper_main_raw.cu = tbl_cu.id WHERE user_name =  '$username' and year_cover = '$acad_yr' ORDER BY year_cover DESC, user_name ASC, unit ASC, paper_title_paper ASC, pid DESC" ;
}
else {
										$query = "SELECT year_cover, tbl_cu.short_name, unit, paper_category, paper_title_paper, paper_sub_researcher, paper_researcher, paper_publisher, paper_editor, paper_cit_dbase, paper_year_published, paper_vol, paper_issue_no, paper_num_pages, paper_circ_level, paper_title_conference, paper_venue_conference, paper_date_conference, paper_organizer_conference, paper_confe_level, paper_keyword, user_name, pid FROM tbl_paper_main_raw INNER JOIN tbl_cu ON tbl_paper_main_raw.cu = tbl_cu.id ORDER BY year_cover DESC, user_name ASC, unit ASC, paper_title_paper ASC, pid DESC" ;
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
												<th width='150' nowrap='nowrap'>Paper Type</th>
												<th width='200' nowrap='nowrap'>Title of Conference Paper</th>
												<th width='200' nowrap='nowrap'>Submitting Researcher</th>
												<th width='200' nowrap='nowrap'>Researcher(s)</th>
												<th width='200' nowrap='nowrap'>Publisher(s)</th>
												<th width='200' nowrap='nowrap'>Editor(s)</th>
												<th width='200' nowrap='nowrap'>Citation Database(s)</th>
												<th>Year Published</th>
												<th>Vol</th>
												<th>Issue No.</th>
												<th>No. of Pages</th>
												<th>Circulation Level</th>
												<th width='200' nowrap='nowrap'>Title of Conference</th>												
												<th width='200' nowrap='nowrap'>Venue of Conference</th>												
												<th>Date of Conference</th>												
												<th width='200' nowrap='nowrap'>Organizer of Conference</th>												
												<th>Conference Level</th>
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
                                                echo "<td><a href='delete-paper.php?id=" . $row->pid . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='edit-paper.php?id=" . $row->pid . "'>Edit</a></td>";                                               
                                                /*echo "<td nowrap='nowrap'><a href='award-input-paper.php?id=" . $row->pid . "'>Add Award</a></td>";*/
                                                echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												echo "<td id='txtright'>" . $row->year_cover . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->short_name . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->paper_category . "</td>";
												echo "<td nowrap='nowrap'>" . $row->paper_title_paper . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->paper_sub_researcher . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->paper_researcher . "</td>";
												echo "<td nowrap='nowrap'>" . $row->paper_publisher . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->paper_editor . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->paper_cit_dbase . "</td>";
                                                echo "<td id='txtright'>" . $row->paper_year_published . "</td>";
                                                echo "<td id='txtright'>" . $row->paper_vol . "</td>";
                                                echo "<td id='txtright'>" . $row->paper_issue_no . "</td>";
                                                echo "<td id='txtright'>" . $row->paper_num_pages . "</td>";
												echo "<td nowrap='nowrap'>" . $row->paper_circ_level . "</td>";
												echo "<td nowrap='nowrap'>" . $row->paper_title_conference . "</td>";
												echo "<td nowrap='nowrap'>" . $row->paper_venue_conference . "</td>";
												$paper_date_conference = strtotime($row->paper_date_conference);
                                                echo '<td id="txtright">' . date("m/d/Y",$paper_date_conference) . '</td>';
												echo "<td nowrap='nowrap'>" . $row->paper_organizer_conference . "</td>";
												echo "<td nowrap='nowrap'>" . $row->paper_confe_level . "</td>";
												echo "<td nowrap='nowrap'>" . $row->paper_keyword . "</td>";
                                                echo "<td id='txtright'><a href='../login/user-info.php?unid=" . $row->user_name . "'>" . $row->user_name . "</a></td>";
                                                /*echo "<td nowrap='nowrap'><a href='award-input-paper.php?id=" . $row->pid . "'>Add Award</a></td>";*/
												echo "<td><a href='edit-paper.php?id=" . $row->pid . "'>Edit</a></td>";
                                                echo "<td><a href='delete-paper.php?id=" . $row->pid . "' onclick='return checkDelete()'>Delete</a></td>";
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