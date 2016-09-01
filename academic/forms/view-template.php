<?php
				session_name("academic");
				session_start();
				// is the one accessing this page logged in or not?

				if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

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
				th#thsize
				{
				width:60px;
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
                <h2>Academic Programs Profile: Template (Data from AY 
				<?php $acad_yr =$_SESSION['acad_yr'];
				print $acad_yr;?>)</h2>
                <div class="viewlinks"><p><a href="input-acad.php">Add New Record</a> | <b>View All</b> | <a href="view-paginated-template.php">View Page</a> </p></div>
                <?php
				// connect to the database
					include('../connect-db.php');
                        
                        // get the records from the database
						$usercu = $_SESSION['user_cu'];
						$username = $_SESSION['user_name'];
												
						if ($usercu == !'') {
						$query = "SELECT tbl_main.pid, tbl_main.user_name, tbl_main.ay, tbl_main.cu, tbl_cu.id, tbl_cu.short_name, tbl_main.coll_nm, tbl_main.dept_nm,  tbl_main.prog_nm, tbl_main.ched_disp, tbl_main.up_disp, tbl_main.educ_lvl, tbl_main.prog_prof, tbl_main.prog_stat, tbl_main.prog_stat_yr, tbl_main.approv_body, tbl_main.yr_grant, tbl_main.prog_cal, tbl_main.prog_del, tbl_main.prog_len, tbl_main.prog_tot_unit, tbl_main.new_male_ft, tbl_main.new_male_pt, tbl_main.new_fem_ft, tbl_main.new_fem_pt, tbl_main.new_ft, tbl_main.new_pt, tbl_main.int_new_male_ft , tbl_main.int_new_male_pt , tbl_main.int_new_fem_ft, tbl_main.int_new_fem_pt, tbl_main.int_new_ft, tbl_main.int_new_pt, tbl_main.male1_ft, tbl_main.male1_pt, tbl_main.fem1_ft, tbl_main.fem1_pt, tbl_main.ft1, tbl_main.pt1, tbl_main.male2_ft, tbl_main.male2_pt, tbl_main.fem2_ft, tbl_main.fem2_pt, tbl_main.ft2, tbl_main.pt2, tbl_main.male3_ft, tbl_main.male3_pt, tbl_main.fem3_ft, tbl_main.fem3_pt, tbl_main.ft3, tbl_main.pt3, tbl_main.male4_ft, tbl_main.male4_pt, tbl_main.fem4_ft, tbl_main.fem4_pt, tbl_main.ft4, tbl_main.pt4, tbl_main.male5_ft, tbl_main.male5_pt, tbl_main.fem5_ft, tbl_main.fem5_pt, tbl_main.ft5, tbl_main.pt5, tbl_main.male6_ft, tbl_main.male6_pt, tbl_main.fem6_ft, tbl_main.fem6_pt, tbl_main.ft6, tbl_main.pt6, tbl_main.male7_ft, tbl_main.male7_pt, tbl_main.fem7_ft, tbl_main.fem7_pt, tbl_main.ft7, tbl_main.pt7, tbl_main.male8_ft, tbl_main.male8_pt, tbl_main.fem8_ft, tbl_main.fem8_pt, tbl_main.ft8, tbl_main.pt8, tbl_main.int_male1_ft, tbl_main.int_male1_pt, tbl_main.int_fem1_ft, tbl_main.int_fem1_pt, tbl_main.int_ft1, tbl_main.int_pt1, tbl_main.int_male2_ft, tbl_main.int_male2_pt, tbl_main.int_fem2_ft, tbl_main.int_fem2_pt, tbl_main.int_ft2, tbl_main.int_pt2, tbl_main.int_male3_ft, tbl_main.int_male3_pt, tbl_main.int_fem3_ft, tbl_main.int_fem3_pt, tbl_main.int_ft3, tbl_main.int_pt3, tbl_main.int_male4_ft, tbl_main.int_male4_pt, tbl_main.int_fem4_ft, tbl_main.int_fem4_pt, tbl_main.int_ft4, tbl_main.int_pt4, tbl_main.int_male5_ft, tbl_main.int_male5_pt, tbl_main.int_fem5_ft, tbl_main.int_fem5_pt, tbl_main.int_ft5, tbl_main.int_pt5, tbl_main.int_male6_ft, tbl_main.int_male6_pt, tbl_main.int_fem6_ft, tbl_main.int_fem6_pt, tbl_main.int_ft6, tbl_main.int_pt6, tbl_main.int_male7_ft, tbl_main.int_male7_pt, tbl_main.int_fem7_ft, tbl_main.int_fem7_pt, tbl_main.int_ft7, tbl_main.int_pt7, tbl_main.int_male8_ft, tbl_main.int_male8_pt, tbl_main.int_fem8_ft, tbl_main.int_fem8_pt, tbl_main.int_ft8, tbl_main.int_pt8, tbl_main.male9_ft, tbl_main.male9_pt, tbl_main.fem9_ft, tbl_main.fem9_pt, tbl_main.ft9, tbl_main.pt9, tbl_main.int_exch_in, tbl_main.int_exch_out, tbl_main.non_up_scho, tbl_main.up_scho, tbl_main.grad_1term_male, tbl_main.grad_1term_fem, tbl_main.grad_1term_ns, tbl_main.grad_2term_male, tbl_main.grad_2term_fem, tbl_main.grad_2term_ns, tbl_main.grad_3term_male, tbl_main.grad_3term_fem, tbl_main.grad_3term_ns, tbl_main.grad_4term_male, tbl_main.grad_4term_fem, tbl_main.grad_4term_ns, tbl_main.grad_sumr_male, tbl_main.grad_sumr_fem, tbl_main.grad_sumr_ns FROM tbl_main INNER JOIN tbl_cu ON tbl_main.cu = tbl_cu.id WHERE tbl_main.cu = '$usercu' AND tbl_main.ay = '$acad_yr' ORDER BY tbl_main.coll_nm, tbl_main.prog_nm ASC";
}
else {						
						$query = "SELECT tbl_main.pid, tbl_main.user_name, tbl_main.ay, tbl_main.cu, tbl_cu.id, tbl_cu.short_name, tbl_main.coll_nm, tbl_main.dept_nm,  tbl_main.prog_nm, tbl_main.ched_disp, tbl_main.up_disp, tbl_main.educ_lvl, tbl_main.prog_prof, tbl_main.prog_stat, tbl_main.prog_stat_yr, tbl_main.approv_body, tbl_main.yr_grant, tbl_main.prog_cal, tbl_main.prog_del, tbl_main.prog_len, tbl_main.prog_tot_unit, tbl_main.new_male_ft, tbl_main.new_male_pt, tbl_main.new_fem_ft, tbl_main.new_fem_pt, tbl_main.new_ft, tbl_main.new_pt, tbl_main.int_new_male_ft , tbl_main.int_new_male_pt , tbl_main.int_new_fem_ft, tbl_main.int_new_fem_pt, tbl_main.int_new_ft, tbl_main.int_new_pt, tbl_main.male1_ft, tbl_main.male1_pt, tbl_main.fem1_ft, tbl_main.fem1_pt, tbl_main.ft1, tbl_main.pt1, tbl_main.male2_ft, tbl_main.male2_pt, tbl_main.fem2_ft, tbl_main.fem2_pt, tbl_main.ft2, tbl_main.pt2, tbl_main.male3_ft, tbl_main.male3_pt, tbl_main.fem3_ft, tbl_main.fem3_pt, tbl_main.ft3, tbl_main.pt3, tbl_main.male4_ft, tbl_main.male4_pt, tbl_main.fem4_ft, tbl_main.fem4_pt, tbl_main.ft4, tbl_main.pt4, tbl_main.male5_ft, tbl_main.male5_pt, tbl_main.fem5_ft, tbl_main.fem5_pt, tbl_main.ft5, tbl_main.pt5, tbl_main.male6_ft, tbl_main.male6_pt, tbl_main.fem6_ft, tbl_main.fem6_pt, tbl_main.ft6, tbl_main.pt6, tbl_main.male7_ft, tbl_main.male7_pt, tbl_main.fem7_ft, tbl_main.fem7_pt, tbl_main.ft7, tbl_main.pt7, tbl_main.male8_ft, tbl_main.male8_pt, tbl_main.fem8_ft, tbl_main.fem8_pt, tbl_main.ft8, tbl_main.pt8, tbl_main.int_male1_ft, tbl_main.int_male1_pt, tbl_main.int_fem1_ft, tbl_main.int_fem1_pt, tbl_main.int_ft1, tbl_main.int_pt1, tbl_main.int_male2_ft, tbl_main.int_male2_pt, tbl_main.int_fem2_ft, tbl_main.int_fem2_pt, tbl_main.int_ft2, tbl_main.int_pt2, tbl_main.int_male3_ft, tbl_main.int_male3_pt, tbl_main.int_fem3_ft, tbl_main.int_fem3_pt, tbl_main.int_ft3, tbl_main.int_pt3, tbl_main.int_male4_ft, tbl_main.int_male4_pt, tbl_main.int_fem4_ft, tbl_main.int_fem4_pt, tbl_main.int_ft4, tbl_main.int_pt4, tbl_main.int_male5_ft, tbl_main.int_male5_pt, tbl_main.int_fem5_ft, tbl_main.int_fem5_pt, tbl_main.int_ft5, tbl_main.int_pt5, tbl_main.int_male6_ft, tbl_main.int_male6_pt, tbl_main.int_fem6_ft, tbl_main.int_fem6_pt, tbl_main.int_ft6, tbl_main.int_pt6, tbl_main.int_male7_ft, tbl_main.int_male7_pt, tbl_main.int_fem7_ft, tbl_main.int_fem7_pt, tbl_main.int_ft7, tbl_main.int_pt7, tbl_main.int_male8_ft, tbl_main.int_male8_pt, tbl_main.int_fem8_ft, tbl_main.int_fem8_pt, tbl_main.int_ft8, tbl_main.int_pt8, tbl_main.male9_ft, tbl_main.male9_pt, tbl_main.fem9_ft, tbl_main.fem9_pt, tbl_main.ft9, tbl_main.pt9, tbl_main.int_exch_in, tbl_main.int_exch_out, tbl_main.non_up_scho, tbl_main.up_scho, tbl_main.grad_1term_male, tbl_main.grad_1term_fem, tbl_main.grad_1term_ns, tbl_main.grad_2term_male, tbl_main.grad_2term_fem, tbl_main.grad_2term_ns, tbl_main.grad_3term_male, tbl_main.grad_3term_fem, tbl_main.grad_3term_ns, tbl_main.grad_4term_male, tbl_main.grad_4term_fem, tbl_main.grad_4term_ns, tbl_main.grad_sumr_male, tbl_main.grad_sumr_fem, tbl_main.grad_sumr_ns FROM tbl_main INNER JOIN tbl_cu ON tbl_main.cu = tbl_cu.id ORDER BY tbl_main.ay DESC, tbl_main.cu ASC, tbl_main.coll_nm, tbl_main.prog_nm ASC";
}

						if ($result = $mysqli->query($query))
						{									
                                // display records if there are records to display
                                if ($result->num_rows > 0)
                                {
										// display records in a table
                                        echo "<table border='1' cellpadding='2' cellspacing='1'>";
                                        
                                                        // display data in table
                                                        echo "<table width='200' border='1' cellpadding='2' cellspacing='1'>";
                                          echo "<tr>
    												<th colspan='6' scope='col'></th>
													<th colspan='6' scope='col'>New Student: Filipino Citizens</th>
    												<th colspan='6' scope='col'>New Student: Non-Filipino Citizens</th>
													<th colspan='6' scope='col'>Continuing Students (Filipino): 1nd Year</th>
													<th colspan='6' scope='col'>Continuing Students (Filipino): 2nd Year</th>
    												<th colspan='6' scope='col'>Continuing Students (Filipino): 3rd Year</th>
    												<th colspan='6' scope='col'>Continuing Students (Filipino): 4th Year</th>
    												<th colspan='6' scope='col'>Continuing Students (Filipino): 5th Year</th>
    												<th colspan='6' scope='col'>Continuing Students (Filipino): 6th Year</th>
    												<th colspan='6' scope='col'>Continuing Students (Filipino): 7th Year</th>
    												<th colspan='6' scope='col'>Continuing Students (Filipino): Beyond 7 Years</th>
													<th colspan='6' scope='col'>Continuing Students (Non-Filipino): 1nd Year</th>
													<th colspan='6' scope='col'>Continuing Students (Non-Filipino): 2nd Year</th>
    												<th colspan='6' scope='col'>Continuing Students (Non-Filipino): 3rd Year</th>
    												<th colspan='6' scope='col'>Continuing Students (Non-Filipino): 4th Year</th>
    												<th colspan='6' scope='col'>Continuing Students (Non-Filipino): 5th Year</th>
    												<th colspan='6' scope='col'>Continuing Students (Non-Filipino): 6th Year</th>
    												<th colspan='6' scope='col'>Continuing Students (Non-Filipino): 7th Year</th>
    												<th colspan='6' scope='col'>Continuing Students (Non-Filipino): Beyond 7 Years</th>
    												<th colspan='6' scope='col'>Cross-Registrant; Non-Degree; Non-Major; Non-Regular</th>
    												<th colspan='2' scope='col' rowspan='2' scope='row'>UP International Exchange Students</th>
    												<th colspan='2' scope='col' rowspan='2' scope='row'>Scholars (based on merit)</th>
    												<th colspan='15' scope='col'>Graduates of Previous Academic Year</th>
													<th colspan='2' scope='col'></th>
												</tr>
												<tr>
    												<th colspan='6' scope='col'></th>";
													for ($x = 1; $x <= 19; $x++) {
													   echo "
															<th colspan='2' scope='col'>Male</th> 
															<th colspan='2' scope='col'>Female</th>
															<th colspan='2' scope='col'>Sex Not Indicated</th>";
															}
													   echo "
															<th colspan='3' scope='col'>1st Term</th> 
															<th colspan='3' scope='col'>2nd Term</th>
															<th colspan='3' scope='col'>3rd Term</th>
															<th colspan='3' scope='col'>4th Term</th>
															<th colspan='3' scope='col'>Summer</th>";
														echo "<th colspan='2' scope='col'></th>
												</tr><tr>
												<th></th>
												<th>No.</th>
												<th nowrap='nowrap'>AY</th>
												<th nowrap='nowrap'>CU</th>
												<th nowrap='nowrap'>College</th>
												<th nowrap='nowrap'>Program</th>";
													for ($x = 1; $x <= 19; $x++) {
													   echo "
															<th nowrap='nowrap' id='thsize'>Full-Time</th>
															<th nowrap='nowrap' id='thsize'>Part-Time</th>
															<th nowrap='nowrap' id='thsize'>Full-Time</th>
															<th nowrap='nowrap' id='thsize'>Part-Time</th>
															<th nowrap='nowrap' id='thsize'>Full-Time</th>
															<th nowrap='nowrap' id='thsize'>Part-Time</th>";
															}
														echo"
															<th nowrap='nowrap' id='thsize'>Inbound</th>
															<th nowrap='nowrap' id='thsize'>Outbound</th>
															<th nowrap='nowrap' id='thsize'>Non-UP</th>
															<th nowrap='nowrap' id='thsize'>UP</th>";
													for ($x = 1; $x <= 5; $x++) {
													   echo "
															<th nowrap='nowrap' id='thsize'>Male</th>
															<th nowrap='nowrap' id='thsize'>Female</th>
															<th id='thsize'>Sex Not Indicated</th>";
															}
														echo"
															<th nowrap='nowrap' id='thsize'>Username</th>
												<th></th>
												</tr>										
												";
										$nctr=1;
                                        $ctr=1;
										while ($row = $result->fetch_object())
                                        {
                                                //alternate color of background
                                        		if ($ctr==1) {echo '<tr bgcolor="#F3AA2C">'; $ctr=0;}
												else {echo '<tr bgcolor="#FFFFFF">'; $ctr=1;}

												// set up a row for each record
                                                //echo "<td><a href='delete.php?id=" . $row->pid . "' onclick='return checkDelete()'>Delete</a></td>";
                                                echo "<td><a href='edit-template.php?id=" . $row->pid . "'>Use</a></td>";

												echo "<td id='txtright'>" . $nctr. "</td>";
												$nctr=$nctr+1;
												echo "<td nowrap='nowrap'>" . $row->ay . "</td>";
												echo "<td nowrap='nowrap'>" . $row->short_name . "</td>";
												echo "<td nowrap='nowrap'>" . $row->coll_nm . "</td>";
												echo "<td nowrap='nowrap'>" . $row->prog_nm . "</td>";
												echo "<td id='txtright'>" . $row->new_male_ft . "</td>";
												echo "<td id='txtright'>" . $row->new_male_pt . "</td>";
												echo "<td id='txtright'>" . $row->new_fem_ft . "</td>";
												echo "<td id='txtright'>" . $row->new_fem_pt . "</td>";
												echo "<td id='txtright'>" . $row->new_ft . "</td>";
												echo "<td id='txtright'>" . $row->new_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_new_male_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_new_male_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_new_fem_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_new_fem_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_new_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_new_pt . "</td>";
												echo "<td id='txtright'>" . $row->male1_ft . "</td>";
												echo "<td id='txtright'>" . $row->male1_pt . "</td>";
												echo "<td id='txtright'>" . $row->fem1_ft . "</td>";
												echo "<td id='txtright'>" . $row->fem1_pt . "</td>";
												echo "<td id='txtright'>" . $row->ft1 . "</td>";
												echo "<td id='txtright'>" . $row->pt1 . "</td>";
												echo "<td id='txtright'>" . $row->male2_ft . "</td>";
												echo "<td id='txtright'>" . $row->male2_pt . "</td>";
												echo "<td id='txtright'>" . $row->fem2_ft . "</td>";
												echo "<td id='txtright'>" . $row->fem2_pt . "</td>";
												echo "<td id='txtright'>" . $row->ft2 . "</td>";
												echo "<td id='txtright'>" . $row->pt2 . "</td>";
												echo "<td id='txtright'>" . $row->male3_ft . "</td>";
												echo "<td id='txtright'>" . $row->male3_pt . "</td>";
												echo "<td id='txtright'>" . $row->fem3_ft . "</td>";
												echo "<td id='txtright'>" . $row->fem3_pt . "</td>";
												echo "<td id='txtright'>" . $row->ft3 . "</td>";
												echo "<td id='txtright'>" . $row->pt3 . "</td>";
												echo "<td id='txtright'>" . $row->male4_ft . "</td>";
												echo "<td id='txtright'>" . $row->male4_pt . "</td>";
												echo "<td id='txtright'>" . $row->fem4_ft . "</td>";
												echo "<td id='txtright'>" . $row->fem4_pt . "</td>";
												echo "<td id='txtright'>" . $row->ft4 . "</td>";
												echo "<td id='txtright'>" . $row->pt4 . "</td>";
												echo "<td id='txtright'>" . $row->male5_ft . "</td>";
												echo "<td id='txtright'>" . $row->male5_pt . "</td>";
												echo "<td id='txtright'>" . $row->fem5_ft . "</td>";
												echo "<td id='txtright'>" . $row->fem5_pt . "</td>";
												echo "<td id='txtright'>" . $row->ft5 . "</td>";
												echo "<td id='txtright'>" . $row->pt5 . "</td>";
												echo "<td id='txtright'>" . $row->male6_ft . "</td>";
												echo "<td id='txtright'>" . $row->male6_pt . "</td>";
												echo "<td id='txtright'>" . $row->fem6_ft . "</td>";
												echo "<td id='txtright'>" . $row->fem6_pt . "</td>";
												echo "<td id='txtright'>" . $row->ft6 . "</td>";
												echo "<td id='txtright'>" . $row->pt6 . "</td>";
												echo "<td id='txtright'>" . $row->male7_ft . "</td>";
												echo "<td id='txtright'>" . $row->male7_pt . "</td>";
												echo "<td id='txtright'>" . $row->fem7_ft . "</td>";
												echo "<td id='txtright'>" . $row->fem7_pt . "</td>";
												echo "<td id='txtright'>" . $row->ft7 . "</td>";
												echo "<td id='txtright'>" . $row->pt7 . "</td>";
												echo "<td id='txtright'>" . $row->male8_ft . "</td>";
												echo "<td id='txtright'>" . $row->male8_pt . "</td>";
												echo "<td id='txtright'>" . $row->fem8_ft . "</td>";
												echo "<td id='txtright'>" . $row->fem8_pt . "</td>";
												echo "<td id='txtright'>" . $row->ft8 . "</td>";
												echo "<td id='txtright'>" . $row->pt8 . "</td>";
												echo "<td id='txtright'>" . $row->int_male1_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_male1_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_fem1_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_fem1_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_ft1 . "</td>";
												echo "<td id='txtright'>" . $row->int_pt1 . "</td>";
												echo "<td id='txtright'>" . $row->int_male2_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_male2_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_fem2_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_fem2_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_ft2 . "</td>";
												echo "<td id='txtright'>" . $row->int_pt2 . "</td>";
												echo "<td id='txtright'>" . $row->int_male3_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_male3_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_fem3_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_fem3_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_ft3 . "</td>";
												echo "<td id='txtright'>" . $row->int_pt3 . "</td>";
												echo "<td id='txtright'>" . $row->int_male4_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_male4_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_fem4_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_fem4_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_ft4 . "</td>";
												echo "<td id='txtright'>" . $row->int_pt4 . "</td>";
												echo "<td id='txtright'>" . $row->int_male5_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_male5_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_fem5_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_fem5_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_ft5 . "</td>";
												echo "<td id='txtright'>" . $row->int_pt5 . "</td>";
												echo "<td id='txtright'>" . $row->int_male6_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_male6_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_fem6_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_fem6_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_ft6 . "</td>";
												echo "<td id='txtright'>" . $row->int_pt6 . "</td>";
												echo "<td id='txtright'>" . $row->int_male7_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_male7_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_fem7_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_fem7_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_ft7 . "</td>";
												echo "<td id='txtright'>" . $row->int_pt7 . "</td>";
												echo "<td id='txtright'>" . $row->int_male8_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_male8_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_fem8_ft . "</td>";
												echo "<td id='txtright'>" . $row->int_fem8_pt . "</td>";
												echo "<td id='txtright'>" . $row->int_ft8 . "</td>";
												echo "<td id='txtright'>" . $row->int_pt8 . "</td>";
												echo "<td id='txtright'>" . $row->male9_ft . "</td>";
												echo "<td id='txtright'>" . $row->male9_pt . "</td>";
												echo "<td id='txtright'>" . $row->fem9_ft . "</td>";
												echo "<td id='txtright'>" . $row->fem9_pt . "</td>";
												echo "<td id='txtright'>" . $row->ft9 . "</td>";
												echo "<td id='txtright'>" . $row->pt9 . "</td>";
												echo "<td id='txtright'>" . $row->int_exch_in . "</td>";
												echo "<td id='txtright'>" . $row->int_exch_out . "</td>";
												echo "<td id='txtright'>" . $row->non_up_scho . "</td>";
												echo "<td id='txtright'>" . $row->up_scho . "</td>";
												echo "<td id='txtright'>" . $row->grad_1term_male . "</td>";
												echo "<td id='txtright'>" . $row->grad_1term_fem . "</td>";
												echo "<td id='txtright'>" . $row->grad_1term_ns . "</td>";
												echo "<td id='txtright'>" . $row->grad_2term_male . "</td>";
												echo "<td id='txtright'>" . $row->grad_2term_fem . "</td>";
												echo "<td id='txtright'>" . $row->grad_2term_ns . "</td>";
												echo "<td id='txtright'>" . $row->grad_3term_male . "</td>";
												echo "<td id='txtright'>" . $row->grad_3term_fem . "</td>";
												echo "<td id='txtright'>" . $row->grad_3term_ns . "</td>";
												echo "<td id='txtright'>" . $row->grad_4term_male . "</td>";
												echo "<td id='txtright'>" . $row->grad_4term_fem . "</td>";
												echo "<td id='txtright'>" . $row->grad_4term_ns . "</td>";
												echo "<td id='txtright'>" . $row->grad_sumr_male . "</td>";
												echo "<td id='txtright'>" . $row->grad_sumr_fem . "</td>";
												echo "<td id='txtright'>" . $row->grad_sumr_ns . "</td>";
                                                echo "<td id='txtright'><a href='../login/user-info.php?unid=" . $row->user_name . "'>" . $row->user_name . "</a></td>";
                                                echo "<td><a href='edit-template.php?id=" . $row->pid . "'>Use</a></td>";
                                                //echo "<td><a href='delete.php?id=" . $row->pid . "' onclick='return checkDelete()'>Delete</a></td>";
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