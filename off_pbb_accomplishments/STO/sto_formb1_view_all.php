<?php

session_name("pbb");
session_start();

//is the user logged in or not
if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

//if not, redirect the user
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
    			return confirm('Delete this record and any related records. Are you sure?');
				}
				</script>
        </head>
        <body>
                <div class="viewbody">
                <h2>STO B.1: International QMS Certificate - View Records</h2>
                
                <?php
				//connect to the database
					include('../connect-db.php');
                        
						//get the session values
	    				$unit_contributor_id = $_SESSION['unit_contributor_id'];
	   					$unit_delivery_id = $_SESSION['unit_delivery_id'];
	   					$focal_person_id = $_SESSION['focal_person_id'];
	   					$cu_id = $_SESSION['cu_id'];
	  					$cu_short_name = $_SESSION['cu_short_name'];
						$unit_delivery_name_cu = $_SESSION['unit_delivery_name_cu'];
	   					$unit_contributor_name = $_SESSION['unit_contributor_name'];
	   					$sd_users_username = $_SESSION['sd_users_username'];
	   					$cutOffDate_id = $_SESSION['cutOffDate_id'];
	   					$t_startDate = $_SESSION['t_startDate'];
	   					$a_cutOffDate_contributor = $_SESSION['a_cutOffDate_contributor'];
	   					$a_cutOffDate_delivery = $_SESSION['a_cutOffDate_delivery'];
	   					$a_cutOffDate_fp = $_SESSION['a_cutOffDate_fp'];
	   					$a_cutOffDate_remarks = $_SESSION['a_cutOffDate_remarks'];

                        $unit_delivery_name_short = $_SESSION['unit_delivery_name_short'];
						$unit_contributor_name_short = $_SESSION['unit_contributor_name_short'];
						
                        //query the records from the primary table based on the username privilege
						if ($sd_users_username == 'admin') {
                        $query = "SELECT unit_delivery_name_cu, unit_contributor_name, ref_quality_assessment_standard_name, sto_formb1_quality_assessment_type, sto_formb1_quality_assessment_certificate_holder, sto_formb1_quality_assessment_scope, sto_formb1_quality_assessment_certificate_number,  sto_formb1_quality_assessment_certificate_date_reregistration, sto_formb1_quality_assessment_inquiry_date, sto_formb1_quality_assessment_attachment_levelling_scheme, sto_formb1_quality_assessment_attachment_certificate, sto_formb1_quality_assessment_id FROM tbl_sd_6_sto_formb1_quality_assessment ORDER BY ref_quality_assessment_standard_name ASC, sto_formb1_quality_assessment_id DESC" ;
}
else {					
                        $query = "SELECT unit_delivery_name_cu, unit_contributor_name, ref_quality_assessment_standard_name, sto_formb1_quality_assessment_type, sto_formb1_quality_assessment_certificate_holder, sto_formb1_quality_assessment_scope, sto_formb1_quality_assessment_certificate_number, sto_formb1_quality_assessment_certificate_date_reregistration, sto_formb1_quality_assessment_inquiry_date, sto_formb1_quality_assessment_attachment_levelling_scheme, sto_formb1_quality_assessment_attachment_certificate, sto_formb1_quality_assessment_id FROM tbl_sd_6_sto_formb1_quality_assessment WHERE unit_contributor_id = '$unit_contributor_id' ORDER BY ref_quality_assessment_standard_name ASC, sto_formb1_quality_assessment_id DESC" ;						
}
						if ($result = $mysqli->query($query))
						{									
                                // display the records
                                if ($result->num_rows > 0)
                                {
                                        echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        echo "<div class='viewlinks'>";
                                        echo "<p><a href='sto_formb1_input.php'>Add New Record</a> | ";
                                        echo "<b href='sto_formb1_view_all.php'>View All</b> | ";
										echo "<a href='sto_formb1_view_per_page.php?page=1'>View Page:</a>";
										echo "</div>";
                                        echo "</p>"; 
																				
		                                        // set the table headers
                                        		echo "<tr>
													    <th></th>
														<th></th>
														<th>Seq. No.</th>
														<th width='150' nowrap='nowrap'>Delivery Unit</th>
														<th width='150' nowrap='nowrap'>Contributing Unit</th>
														<th width='150' nowrap='nowrap'>QMS Standard</th>
														<th width='150' nowrap='nowrap'>Certificate Holder</th>
														<th width='150' nowrap='nowrap'>Scope</th>
														<th width='150' nowrap='nowrap'>Certificate/Appendix Number</th>
														<th width='150' nowrap='nowrap'>Date of Registration</th>
														<th width='150' nowrap='nowrap'>Expiry Date</th>
														<th width='150' nowrap='nowrap'>Attachment 1:</th>
														<th width='150' nowrap='nowrap'>Attachment 2:</th>
													<th></th>
													<th></th>												
												</tr>";
											
										$nctr=1;
                                        $ctr=1;
                                        while ($row = $result->fetch_object())
                                        {
                                                //alternate the color of background
                                        		if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
												else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

												//set up a row for each record
												echo "<td><a href='sto_formb1_delete.php?id=" . $row->sto_formb1_quality_assessment_id . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='sto_formb1_edit.php?id=" . $row->sto_formb1_quality_assessment_id . "'>Edit</a></td>";
												
												//counter
												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												
												//display the data
												echo "<td nowrap='nowrap'>" . $row->unit_delivery_name_cu . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit_contributor_name . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->ref_quality_assessment_standard_name . "</td>";
												//provision for the echo "<td nowrap='nowrap'>" . $row->sto_formb1_quality_assessment_type . "</td>";
												echo "<td nowrap='nowrap'>" . $row->sto_formb1_quality_assessment_certificate_holder . "</td>";
												echo "<td nowrap='nowrap'>" . $row->sto_formb1_quality_assessment_scope . "</td>";
												echo "<td nowrap='nowrap'>" . $row->sto_formb1_quality_assessment_certificate_number . "</td>";								
												$re_reg_date = strtotime($row->sto_formb1_quality_assessment_certificate_date_reregistration);
                                                echo '<td id="txtright">' . date("m/d/Y",$re_reg_date) . '</td>';
												$expiry_date = strtotime($row->sto_formb1_quality_assessment_inquiry_date);
                                                echo '<td id="txtright">' . date("m/d/Y",$expiry_date) . '</td>';
												
												//view pdf attachment
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->sto_formb1_quality_assessment_attachment_levelling_scheme . ">" . $row->sto_formb1_quality_assessment_attachment_levelling_scheme . "</a></td>";
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->sto_formb1_quality_assessment_attachment_certificate . ">" . $row->sto_formb1_quality_assessment_attachment_certificate . "</a></td>";
												
                                                echo "<td><a href='sto_formb1_edit.php?id=" . $row->sto_formb1_quality_assessment_id . "'>Edit</a></td>";
                                                echo "<td><a href='sto_formb1_delete.php?id=" . $row->sto_formb1_quality_assessment_id . "' onclick='return checkDelete()'>Delete</a></td>";
                                        }
                                        
                                        echo "</table>";
                                }
                                // if there are no records in the database, display an alert message
                                else
                                {
                                        echo "<p><a href='sto_formb1_input.php'>Add New Record</a> | ";
            							echo "No record to display!";										
                                }
                        }
                        //show an error message if there is an issue with the database query
                        else
                        {
                                echo "Error: " . $mysqli->error;
                        }
                        
                        //close the database connection
                        $mysqli->close();
                
                ?>
                
        	</div>        
        </body>
</html>
