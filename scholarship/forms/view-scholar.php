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
                <h2>Scholarship/Fellowship: View Records</h2>
                <div class="viewlinks">
                <p><a href="input-scholar.php">Add New Record</a> | <b>View All</b> | <a href="view-paginated-scholar.php">View Page</a> </p>
                </div>
                <?php
                        // connect to the database
                        include('../connect-db.php');
                        
                        // get the records from the database
						$usercu = $_SESSION['user_cu'];
						$username = $_SESSION['user_name'];
						$acad_yr = $_SESSION['acad_yr'];

						if ($usercu == !'') {
										$query = "SELECT year_cover, tbl_cu.short_name, coll_nm,  scho_nm_list, scho_nm_alt, fund_source, sponsor, pre_bacc, bacc, post_bacc, master, doctor, ni, user_name, sid FROM tbl_main INNER JOIN tbl_cu ON tbl_main.cu = tbl_cu.id WHERE user_name =  '$username' and tbl_main.year_cover = '$acad_yr'  ORDER BY year_cover DESC, user_name ASC, coll_nm ASC, scho_nm_list ASC, scho_nm_alt ASC, sid DESC" ;
}
						else {						
										$query = "SELECT year_cover, tbl_cu.short_name, coll_nm,  scho_nm_list, scho_nm_alt, fund_source, sponsor, pre_bacc, bacc, post_bacc, master, doctor, ni, user_name, sid FROM tbl_main INNER JOIN tbl_cu ON tbl_main.cu = tbl_cu.id ORDER BY year_cover DESC, user_name ASC, coll_nm ASC, scho_nm_list ASC, scho_nm_alt ASC, sid DESC" ;
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
										
										$nctr=1;											
                                        $ctr=1;
                                        while ($row = $result->fetch_object())
                                        {
                                                //alternate color of background
                                        		if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
												else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

												// set up a row for each record
                                                echo "<td><a href='delete-scholar.php?id=" . $row->sid . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='edit-scholar.php?id=" . $row->sid . "'>Edit</a></td>";                                                echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												echo "<td id='txtright'>" . $row->year_cover . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->short_name . "</td>";
												echo "<td nowrap='nowrap'>" . $row->coll_nm . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->scho_nm_list . "</td>";
												echo "<td nowrap='nowrap'>" . $row->scho_nm_alt . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->fund_source . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->sponsor . "</td>";
												echo "<td id='txtright' nowrap='nowrap'>" . $row->pre_bacc . "</td>";
												echo "<td id='txtright' nowrap='nowrap'>" . $row->bacc . "</td>";
												echo "<td id='txtright' nowrap='nowrap'>" . $row->post_bacc . "</td>";
												echo "<td id='txtright' nowrap='nowrap'>" . $row->master . "</td>";
												echo "<td id='txtright' nowrap='nowrap'>" . $row->doctor . "</td>";
												echo "<td id='txtright' nowrap='nowrap'>" . $row->ni . "</td>";
                                                echo "<td id='txtright'><a href='../login/user-info.php?unid=" . $row->user_name . "'>" . $row->user_name . "</a></td>";
												echo "<td><a href='edit-scholar.php?id=" . $row->sid . "'>Edit</a></td>";
                                                echo "<td><a href='delete-scholar.php?id=" . $row->sid . "' onclick='return checkDelete()'>Delete</a></td>";
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