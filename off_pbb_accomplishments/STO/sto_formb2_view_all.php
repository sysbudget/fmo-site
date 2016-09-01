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
                <h2>STO B.2: ISO-Aligned QMS Documentation - View Records</h2>
                
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
						
                        //get selected records based on user privilege
						if ($sd_users_username == 'admin') {
                            $query = "SELECT unit_delivery_name_cu, unit_contributor_name, sto_formb2_iso_aligned_quarter, sto_formb2_iso_aligned_aspired_standard, sto_formb2_iso_aligned_aspired_certification_date, sto_formb2_iso_aligned_qms_holder, sto_formb2_iso_aligned_qms_scope, sto_formb2_iso_aligned_qms_manual_approval_date, sto_formb2_iso_aligned_attachment_quality_manual, sto_formb2_iso_aligned_attachment_procedures_manual, sto_formb2_iso_aligned_id FROM tbl_sd_6_sto_formb2_iso_aligned ORDER BY sto_formb2_iso_aligned_aspired_standard ASC" ;	
                        
}
else {
						    $query = "SELECT unit_delivery_name_cu, unit_contributor_name, sto_formb2_iso_aligned_quarter, sto_formb2_iso_aligned_aspired_standard, sto_formb2_iso_aligned_aspired_certification_date, sto_formb2_iso_aligned_qms_holder, sto_formb2_iso_aligned_qms_scope, sto_formb2_iso_aligned_qms_manual_approval_date, sto_formb2_iso_aligned_attachment_quality_manual, sto_formb2_iso_aligned_attachment_procedures_manual, sto_formb2_iso_aligned_id FROM tbl_sd_6_sto_formb2_iso_aligned WHERE unit_contributor_id = '$unit_contributor_id' ORDER BY sto_formb2_iso_aligned_aspired_standard ASC" ;	
                        											
}
						if ($result = $mysqli->query($query))
						{									
                                //display records
                                if ($result->num_rows > 0)
                                {
										
                                        echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        echo "<div class='viewlinks'>";
                                        echo "<p><a href='sto_formb2_input.php'>Add New Record</a> | ";
                                        echo "<b href='sto_formb2_view_all.php'>View All</b> | ";
										echo "<a href='sto_formb2_view_per_page.php?page=1'>View Page:</a>";
										echo "</div>";
                                        echo "</p>"; 
										
		                                        //set the table headers
                                        		echo "<tr>
													    <th></th>
														<th></th>
														<th>Seq. No.</th>
														<th width='150' nowrap='nowrap'>Delivery Unit</th>
														<th width='150' nowrap='nowrap'>Contributing Unit</th>
														<th width='150' nowrap='nowrap'>Aspired ISO Standard</th>
														<th width='150' nowrap='nowrap'>ISO Certification Target Date</th>
														<th width='150' nowrap='nowrap'>QMS Holder</th>
														<th width='150' nowrap='nowrap'>QMS Scope</th>
														<th width='150' nowrap='nowrap'>Approval Date of Required QMS Manuals</th>
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

												//set up the row for each record
												echo "<td><a href='sto_formb2_delete.php?id=" . $row->sto_formb2_iso_aligned_id . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='sto_formb2_edit.php?id=" . $row->sto_formb2_iso_aligned_id . "'>Edit</a></td>";
												
												//counter
												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												
												//display data
												echo "<td nowrap='nowrap'>" . $row->unit_delivery_name_cu . "</td>";
												echo "<td nowrap='nowrap'>" . $row->unit_contributor_name . "</td>";
                                                echo "<td nowrap='nowrap'>" . $row->sto_formb2_iso_aligned_aspired_standard . "</td>";
                                                $target_date = strtotime($row->sto_formb2_iso_aligned_aspired_certification_date);
                                                echo '<td id="txtright">' . date("m/d/Y",$target_date) . '</td>';
												echo "<td nowrap='nowrap'>" . $row->sto_formb2_iso_aligned_qms_holder . "</td>";
												echo "<td nowrap='nowrap'>" . $row->sto_formb2_iso_aligned_qms_scope . "</td>";
												$approved_date = strtotime($row->sto_formb2_iso_aligned_qms_manual_approval_date);
                                                echo '<td id="txtright">' . date("m/d/Y",$approved_date) . '</td>';
												
												//view pdf attachment
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->sto_formb2_iso_aligned_attachment_quality_manual . ">" . $row->sto_formb2_iso_aligned_attachment_quality_manual . "</a></td>";
												echo "<td nowrap='nowrap'><a href = " . "uploads/" . $cu_short_name . "/" . $row->sto_formb2_iso_aligned_attachment_procedures_manual . ">" . $row->sto_formb2_iso_aligned_attachment_procedures_manual . "</a></td>";
												
                                                echo "<td><a href='sto_formb2_edit.php?id=" . $row->sto_formb2_iso_aligned_id . "'>Edit</a></td>";
                                                echo "<td><a href='sto_formb2_delete.php?id=" . $row->sto_formb2_iso_aligned_id . "' onclick='return checkDelete()'>Delete</a></td>";
                                        }
                                        
                                        echo "</table>";
                                }
                                //if there are no records in the database, display an alert message
                                else
                                {
                                        echo "<p><a href='sto_formb2_input.php'>Add New Record</a> | ";
            							echo "No record to display!";										
                                }
                        }
                        //show an error if there is an issue with the database query
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
