<?php

session_name("pbb");
session_start();

// is the one accessing this page logged in or not?
if ( !isset($_SESSION['user_id']) || !$_SESSION['user_id'])
{
	// not logged in, move to login page
	header('Location: ../login/login_mysqli.php');
	exit;
}

//get session values
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

// connect to the database
include_once('../connect-db.php');

$query = "SELECT tbl_sd_1_mfo1_formc_accreditation.mfo1_formc_accreditation_id,
	tbl_sd_1_mfo1_forma_program.mfo1_forma_program_id,
	tbl_sd_1_mfo1_formc_accreditation.unit_delivery_name_cu,
	tbl_sd_1_mfo1_formc_accreditation.unit_contributor_name,
	tbl_sd_1_mfo1_forma_program.ref_program_level_name,
	tbl_sd_1_mfo1_forma_program.mfo1_forma_program_name,
	tbl_sd_1_mfo1_formc_accreditation.mfo1_formc_accreditation_accreditable,
	tbl_sd_1_mfo1_formc_accreditation.ref_accrediting_body_name,
	tbl_sd_1_mfo1_formc_accreditation.ref_accreditation_classification_name,
	tbl_sd_1_mfo1_formc_accreditation.ref_accreditation_level_name,
	DATE_FORMAT(tbl_sd_1_mfo1_formc_accreditation.mfo1_formc_accreditation_validity_start, '%m/%d/%Y') as validity_start_datestr,
	DATE_FORMAT(tbl_sd_1_mfo1_formc_accreditation.mfo1_formc_accreditation_validity_end, '%m/%d/%Y') as validity_end_datestr,
	tbl_sd_1_mfo1_formc_accreditation.mfo1_formc_accreditation_attachment,
	tbl_sd_1_mfo1_formc_accreditation.mfo1_formc_accreditation_levelscheme_attachment,
	tbl_sd_1_mfo1_formc_accreditation.unit_contributor_id
	FROM tbl_sd_1_mfo1_forma_program, tbl_sd_1_mfo1_formc_accreditation
	WHERE tbl_sd_1_mfo1_forma_program.unit_contributor_id = tbl_sd_1_mfo1_formc_accreditation.unit_contributor_id
		AND tbl_sd_1_mfo1_forma_program.mfo1_forma_program_id = tbl_sd_1_mfo1_formc_accreditation.mfo1_forma_program_id
		AND NOT (tbl_sd_1_mfo1_formc_accreditation.ref_accrediting_body_id = 1)
		AND (('$sd_users_username'='admin') OR (tbl_sd_1_mfo1_forma_program.unit_contributor_id = '$unit_contributor_id'))
	ORDER BY tbl_sd_1_mfo1_forma_program.ref_program_level_id, tbl_sd_1_mfo1_forma_program.mfo1_forma_program_name;";
						
$result = $mysqli->query($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>  
                <title>Program Accreditation - View All</title>
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
                <h2>MFO 1: Program Accreditation - View Records</h2>

                <?php
						if ($result)
						{									
								// display records if there are records to display
                                if ($result->num_rows > 0)
                                {
										
										echo '<div class="viewlinks">';
										echo '<p><a href="ugradprogaccredit_view_use_per_page.php?page=1">Add New Record</a> | <b>View All</b> | <a href="ugradprogaccredit_view_per_page.php?page=1">View Page</a></p>';
										echo '</div>';
										// display records in a table
                                        echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        
										// set table headers
                                        echo "<tr>
											<th></th>
											<th></th>
											<th>Seq No</th>
											<th width='150' nowrap='nowrap'>Delivery Unit</th>
											<th width='150' nowrap='nowrap'>Contributing Unit</th>
											<th width='150' nowrap='nowrap'>Program Level</th>
											<th width='150' nowrap='nowrap'>Official Program Name</th>
											<th width='150' nowrap='nowrap'>Accreditable?</th>
											<th width='150' nowrap='nowrap'>Name of Accrediting Body</th>
											<th width='150' nowrap='nowrap'>Type of Accrediting Body</th>
											<th width='150' nowrap='nowrap'>Level</th>
											<th width='150' nowrap='nowrap'>Start Date of Validity</th>
											<th width='150' nowrap='nowrap'>End Date of Validity</th>
											<th width='150' nowrap='nowrap'>Certification: Attachment 1</th>
											<th width='150' nowrap='nowrap'>Levelling Scheme Used: Attachment 2</th>
											<th></th>
											<th></th>												
											</tr>";
																						
										$nctr=1;
                                        $ctr=1;
                                        while ($row = $result->fetch_row())
                                        {
                                                // alternate color of background
                                        		if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
												else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

												// set up a row for each record
                                                echo "<td><a href='ugradprogaccredit_delete.php?id=" . $row[0] . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='ugradprogaccredit_edit.php?id=" . $row[0] . "'>Edit</a></td>";
												// counter
												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												
												// display row data in columns
												for ($j = 2; $j < 14; $j++)
													{
														echo '<td nowrap="nowrap" ';
														
														switch ($j)
														{
															case 6:
																if ($row[$j]=="1" || $row[$j]=="Y")
																	echo ">Yes";
																else
																	echo ">No";
																break;
															case 9:
																echo " id='txtright'>" . $row[$j];
																break;
															case 10:
																echo " id='txtright'>" . $row[$j];
																break;
															case 11:
																echo " id='txtright'>" . $row[$j];
																break;
															case 12:
																echo '><a href="'. 'uploads/' . $cu_short_name . '/' . $row[$j]. '">'. $row[$j] . '</a>';
																break;
															case 13:
																echo '><a href="'. 'uploads/' . $cu_short_name . '/' . $row[$j]. '">'. $row[$j] . '</a>';
																break;
															default:
																echo '>' . $row[$j];
																break;
														}
														
														echo '</td>';
													}
                                                echo "<td><a href='ugradprogaccredit_edit.php?id=" . $row[0] . "'>Edit</a></td>";
                                                echo '<td><a href="ugradprogaccredit_delete.php?id=' . $row[0] . '" onclick="return checkDelete()">Delete</a></td>';
												echo "</tr>";
                                        }
                                        
                                        echo "</table>";
                                }
								
                                // if there are no records in the database, display an alert message
                                else
                                {
										echo '<div class="viewlinks">';
										echo '<p><a href="ugradprogaccredit_view_use_per_page.php?page=1">Add New Record</a> | No record to display!</p>';
										echo '</div>';
                                }

                        }
                        // show an error if there is an issue with the database query
                        else
                        {
                                echo "Error: " . $mysqli->error;
                        }
                        
                        // close database connection
						$result->close();
                        $mysqli->close();
                
                ?>
                
        	</div>        
        </body>
</html>