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
				td#txtcenter
				{text-align:center;
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
                <h2>Invention: View Records</h2>
                <div class="viewlinks">
                <p><a href="input-inv.php">Add New Record</a> | <b>View All</b> | <a href="view-paginated-inv.php">View Page</a> </p>
                </div>
                <?php
                        // connect to the database
                        include('../connect-db.php');
                        
                        // get the records from the database
						$usercu = $_SESSION['user_cu'];
						$username = $_SESSION['user_name'];
						$acad_yr = $_SESSION['acad_yr'];

						if ($usercu == !'') {
										$query = "SELECT year_cover, tbl_cu.short_name, unit, inv_invention, inv_sub_inventor, inv_inventor, inv_applied, inv_patented, inv_commercial, inv_adopted, inv_patent_num, inv_date_issue, inv_development, inv_service, inv_end_product, inv_product_name, inv_award, inv_keyword, user_name, invid FROM tbl_invention_main_raw INNER JOIN tbl_cu ON tbl_invention_main_raw.cu = tbl_cu.id WHERE user_name =  '$username' and year_cover = '$acad_yr' ORDER BY year_cover DESC, user_name ASC, unit ASC, inv_invention ASC, invid DESC" ;
}
else {						
										$query = "SELECT year_cover, tbl_cu.short_name, unit, inv_invention, inv_sub_inventor, inv_inventor, inv_applied, inv_patented, inv_commercial, inv_adopted, inv_patent_num, inv_date_issue, inv_development, inv_service, inv_end_product, inv_product_name, inv_award, inv_keyword, user_name, invid FROM tbl_invention_main_raw INNER JOIN tbl_cu ON tbl_invention_main_raw.cu = tbl_cu.id ORDER BY year_cover DESC, user_name ASC, unit ASC, inv_invention ASC, invid DESC" ;
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
												<th width='200' nowrap='nowrap'>Invention</th>
												<th width='200' nowrap='nowrap'>Submitting Inventor</th>
												<th width='200' nowrap='nowrap'>Inventor</th>
												<th>Applied for Patenting</th>
												<th>Patented</th>
												<th>Commercialized</th>
												<th>Adopted by Industry</th>
												<th>Patent Number</th>
												<th>Date of Issue</th>
												<th>Development</th>
												<th>Service</th>
												<th>End-Product</th>
												<th width='200'nowrap='nowrap'>Name of Commercial Product</th>
												<th width='200'nowrap='nowrap'>Awards Received</th>
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
                                                echo "<td><a href='delete-inv.php?id=" . $row->invid . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='edit-inv.php?id=" . $row->invid . "'>Edit</a></td>";                                               
                                                echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												echo "<td id='txtright'>" . $row->year_cover . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->short_name . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->inv_invention . "</td>";
												echo "<td nowrap='nowrap'>" . $row->inv_sub_inventor . "</td>";
												echo "<td nowrap='nowrap'>" . $row->inv_inventor . "</td>";
                                                echo "<td nowrap='nowrap' id='txtcenter'>" . $row->inv_applied . "</td>";
                                                echo "<td nowrap='nowrap' id='txtcenter'>" . $row->inv_patented . "</td>";
                                                echo "<td nowrap='nowrap' id='txtcenter'>" . $row->inv_commercial . "</td>";
                                                echo "<td nowrap='nowrap' id='txtcenter'>" . $row->inv_adopted . "</td>";
												echo "<td nowrap='nowrap'>" . $row->inv_patent_num . "</td>";
												$inv_date_issue = strtotime($row->inv_date_issue);
                                                echo "<td id='txtright'>" . date('m/d/Y',$inv_date_issue) . "</td>";
												echo "<td nowrap='nowrap' id='txtcenter'>" . $row->inv_development . "</td>";
                                                echo "<td nowrap='nowrap' id='txtcenter'>" . $row->inv_service . "</td>";
												echo "<td nowrap='nowrap' id='txtcenter'>" . $row->inv_end_product . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->inv_product_name . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->inv_award . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->inv_keyword . "</td>";
                                                echo "<td id='txtright'><a href='../login/user-info.php?unid=" . $row->user_name . "'>" . $row->user_name . "</a></td>";
												echo "<td><a href='edit-inv.php?id=" . $row->invid . "'>Edit</a></td>";
                                                echo "<td><a href='delete-inv.php?id=" . $row->invid . "' onclick='return checkDelete()'>Delete</a></td>";
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