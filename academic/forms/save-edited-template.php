<?php
session_name("academic");
session_start();
// is the one accessing this page logged in or not?

if ( !isset($_SESSION['user_id']) || $_SESSION['user_id'] !== true) {

// not logged in, move to login page

header('Location: ../login/login_mysqli.php');

exit;

}

// connect to the database
	include('../connect-db.php');

//Get the form fields.
$pid = stripslashes($_POST['pid']);
$user_name = stripslashes($_POST['user_name']);
$year_cover = stripslashes($_POST['year_cover']);
$cu = stripslashes($_POST['cu']);
$coll_nm = stripslashes($_POST['coll_nm']);
$dept_nm = stripslashes($_POST['dept_nm']);
$prog_nm = stripslashes($_POST['prog_nm']);
$ched_disp = stripslashes($_POST['ched_disp']);
$up_disp = stripslashes($_POST['up_disp']);
$educ_lvl = stripslashes($_POST['educ_lvl']);
$prog_prof = stripslashes($_POST['prog_prof']);
$prog_stat = stripslashes($_POST['prog_stat']);
$prog_stat_yr = stripslashes($_POST['prog_stat_yr']);
$approv_body = stripslashes($_POST['approv_body']);
$yr_grant = stripslashes($_POST['yr_grant']);
$prog_cal = stripslashes($_POST['prog_cal']);
$prog_del = stripslashes($_POST['prog_del']);
$prog_len = stripslashes($_POST['prog_len']);
$prog_tot_unit = stripslashes($_POST['prog_tot_unit']);
$new_male_ft = stripslashes($_POST['new_male_ft']);
$new_male_pt = stripslashes($_POST['new_male_pt']);
$new_fem_ft = stripslashes($_POST['new_fem_ft']);
$new_fem_pt = stripslashes($_POST['new_fem_pt']);
$new_ft = stripslashes($_POST['new_ft']);
$new_pt = stripslashes($_POST['new_pt']);
$int_new_male_ft = stripslashes($_POST['int_new_male_ft']);
$int_new_male_pt = stripslashes($_POST['int_new_male_pt']);
$int_new_fem_ft = stripslashes($_POST['int_new_fem_ft']);
$int_new_fem_pt = stripslashes($_POST['int_new_fem_pt']);
$int_new_ft = stripslashes($_POST['int_new_ft']);
$int_new_pt = stripslashes($_POST['int_new_pt']);
$male1_ft = stripslashes($_POST['male1_ft']);
$male1_pt = stripslashes($_POST['male1_pt']);
$fem1_ft = stripslashes($_POST['fem1_ft']);
$fem1_pt = stripslashes($_POST['fem1_pt']);
$ft1 = stripslashes($_POST['ft1']);
$pt1 = stripslashes($_POST['pt1']);
$male2_ft = stripslashes($_POST['male2_ft']);
$male2_pt = stripslashes($_POST['male2_pt']);
$fem2_ft = stripslashes($_POST['fem2_ft']);
$fem2_pt = stripslashes($_POST['fem2_pt']);
$ft2 = stripslashes($_POST['ft2']);
$pt2 = stripslashes($_POST['pt2']);
$male3_ft = stripslashes($_POST['male3_ft']);
$male3_pt = stripslashes($_POST['male3_pt']);
$fem3_ft = stripslashes($_POST['fem3_ft']);
$fem3_pt = stripslashes($_POST['fem3_pt']);
$ft3 = stripslashes($_POST['ft3']);
$pt3 = stripslashes($_POST['pt3']);
$male4_ft = stripslashes($_POST['male4_ft']);
$male4_pt = stripslashes($_POST['male4_pt']);
$fem4_ft = stripslashes($_POST['fem4_ft']);
$fem4_pt = stripslashes($_POST['fem4_pt']);
$ft4 = stripslashes($_POST['ft4']);
$pt4 = stripslashes($_POST['pt4']);
$male5_ft = stripslashes($_POST['male5_ft']);
$male5_pt = stripslashes($_POST['male5_pt']);
$fem5_ft = stripslashes($_POST['fem5_ft']);
$fem5_pt = stripslashes($_POST['fem5_pt']);
$ft5 = stripslashes($_POST['ft5']);
$pt5 = stripslashes($_POST['pt5']);
$male6_ft = stripslashes($_POST['male6_ft']);
$male6_pt = stripslashes($_POST['male6_pt']);
$fem6_ft = stripslashes($_POST['fem6_ft']);
$fem6_pt = stripslashes($_POST['fem6_pt']);
$ft6 = stripslashes($_POST['ft6']);
$pt6 = stripslashes($_POST['pt6']);
$male7_ft = stripslashes($_POST['male7_ft']);
$male7_pt = stripslashes($_POST['male7_pt']);
$fem7_ft = stripslashes($_POST['fem7_ft']);
$fem7_pt = stripslashes($_POST['fem7_pt']);
$ft7 = stripslashes($_POST['ft7']);
$pt7 = stripslashes($_POST['pt7']);
$male8_ft = stripslashes($_POST['male8_ft']);
$male8_pt = stripslashes($_POST['male8_pt']);
$fem8_ft = stripslashes($_POST['fem8_ft']);
$fem8_pt = stripslashes($_POST['fem8_pt']);
$ft8 = stripslashes($_POST['ft8']);
$pt8 = stripslashes($_POST['pt8']);
$male9_ft = stripslashes($_POST['male9_ft']);
$male9_pt = stripslashes($_POST['male9_pt']);
$fem9_ft = stripslashes($_POST['fem9_ft']);
$fem9_pt = stripslashes($_POST['fem9_pt']);
$ft9 = stripslashes($_POST['ft9']);
$pt9 = stripslashes($_POST['pt9']);
$int_male1_ft = stripslashes($_POST['int_male1_ft']);
$int_male1_pt = stripslashes($_POST['int_male1_pt']);
$int_fem1_ft = stripslashes($_POST['int_fem1_ft']);
$int_fem1_pt = stripslashes($_POST['int_fem1_pt']);
$int_ft1 = stripslashes($_POST['int_ft1']);
$int_pt1 = stripslashes($_POST['int_pt1']);
$int_male2_ft = stripslashes($_POST['int_male2_ft']);
$int_male2_pt = stripslashes($_POST['int_male2_pt']);
$int_fem2_ft = stripslashes($_POST['int_fem2_ft']);
$int_fem2_pt = stripslashes($_POST['int_fem2_pt']);
$int_ft2 = stripslashes($_POST['int_ft2']);
$int_pt2 = stripslashes($_POST['int_pt2']);
$int_male3_ft = stripslashes($_POST['int_male3_ft']);
$int_male3_pt = stripslashes($_POST['int_male3_pt']);
$int_fem3_ft = stripslashes($_POST['int_fem3_ft']);
$int_fem3_pt = stripslashes($_POST['int_fem3_pt']);
$int_ft3 = stripslashes($_POST['int_ft3']);
$int_pt3 = stripslashes($_POST['int_pt3']);
$int_male4_ft = stripslashes($_POST['int_male4_ft']);
$int_male4_pt = stripslashes($_POST['int_male4_pt']);
$int_fem4_ft = stripslashes($_POST['int_fem4_ft']);
$int_fem4_pt = stripslashes($_POST['int_fem4_pt']);
$int_ft4 = stripslashes($_POST['int_ft4']);
$int_pt4 = stripslashes($_POST['int_pt4']);
$int_male5_ft = stripslashes($_POST['int_male5_ft']);
$int_male5_pt = stripslashes($_POST['int_male5_pt']);
$int_fem5_ft = stripslashes($_POST['int_fem5_ft']);
$int_fem5_pt = stripslashes($_POST['int_fem5_pt']);
$int_ft5 = stripslashes($_POST['int_ft5']);
$int_pt5 = stripslashes($_POST['int_pt5']);
$int_male6_ft = stripslashes($_POST['int_male6_ft']);
$int_male6_pt = stripslashes($_POST['int_male6_pt']);
$int_fem6_ft = stripslashes($_POST['int_fem6_ft']);
$int_fem6_pt = stripslashes($_POST['int_fem6_pt']);
$int_ft6 = stripslashes($_POST['int_ft6']);
$int_pt6 = stripslashes($_POST['int_pt6']);
$int_male7_ft = stripslashes($_POST['int_male7_ft']);
$int_male7_pt = stripslashes($_POST['int_male7_pt']);
$int_fem7_ft = stripslashes($_POST['int_fem7_ft']);
$int_fem7_pt = stripslashes($_POST['int_fem7_pt']);
$int_ft7 = stripslashes($_POST['int_ft7']);
$int_pt7 = stripslashes($_POST['int_pt7']);
$int_male8_ft = stripslashes($_POST['int_male8_ft']);
$int_male8_pt = stripslashes($_POST['int_male8_pt']);
$int_fem8_ft = stripslashes($_POST['int_fem8_ft']);
$int_fem8_pt = stripslashes($_POST['int_fem8_pt']);
$int_ft8 = stripslashes($_POST['int_ft8']);
$int_pt8 = stripslashes($_POST['int_pt8']);
$int_exch_in = stripslashes($_POST['int_exch_in']);
$int_exch_out = stripslashes($_POST['int_exch_out']);
$non_up_scho = stripslashes($_POST['non_up_scho']);
$up_scho = stripslashes($_POST['up_scho']);
$grad_1term_male = stripslashes($_POST['grad_1term_male']);
$grad_1term_fem = stripslashes($_POST['grad_1term_fem']);
$grad_1term_ns = stripslashes($_POST['grad_1term_ns']);
$grad_2term_male = stripslashes($_POST['grad_2term_male']);
$grad_2term_fem = stripslashes($_POST['grad_2term_fem']);
$grad_2term_ns = stripslashes($_POST['grad_2term_ns']);
$grad_3term_male = stripslashes($_POST['grad_3term_male']);
$grad_3term_fem = stripslashes($_POST['grad_3term_fem']);
$grad_3term_ns = stripslashes($_POST['grad_3term_ns']);
$grad_4term_male = stripslashes($_POST['grad_4term_male']);
$grad_4term_fem = stripslashes($_POST['grad_4term_fem']);
$grad_4term_ns = stripslashes($_POST['grad_4term_ns']);
$grad_sumr_male = stripslashes($_POST['grad_sumr_male']);
$grad_sumr_fem = stripslashes($_POST['grad_sumr_fem']);
$grad_sumr_ns = stripslashes($_POST['grad_sumr_ns']);

//Make the fields safe.
$pid = $mysqli->escape_string($pid);
$user_name = $mysqli->escape_string($user_name);
$year_cover = $mysqli->escape_string($year_cover);
$cu = $mysqli->escape_string($cu);
$coll_nm = $mysqli->escape_string($coll_nm);
$dept_nm = $mysqli->escape_string($dept_nm);
$prog_nm = $mysqli->escape_string($prog_nm);
$ched_disp = $mysqli->escape_string($ched_disp);
$up_disp = $mysqli->escape_string($up_disp);
$educ_lvl = $mysqli->escape_string($educ_lvl);
$prog_prof = $mysqli->escape_string($prog_prof);
$prog_stat = $mysqli->escape_string($prog_stat);
$prog_stat_yr = $mysqli->escape_string($prog_stat_yr);
$approv_body = $mysqli->escape_string($approv_body);
$yr_grant = $mysqli->escape_string($yr_grant);
$prog_cal = $mysqli->escape_string($prog_cal);
$prog_del = $mysqli->escape_string($prog_del);
$prog_len = $mysqli->escape_string($prog_len);
$prog_tot_unit = $mysqli->escape_string($prog_tot_unit);
$new_male_ft = $mysqli->escape_string($new_male_ft);
$new_male_pt = $mysqli->escape_string($new_male_pt);
$new_fem_ft = $mysqli->escape_string($new_fem_ft);
$new_fem_pt = $mysqli->escape_string($new_fem_pt);
$new_ft = $mysqli->escape_string($new_ft);
$new_pt = $mysqli->escape_string($new_pt);
$int_new_male_ft = $mysqli->escape_string($int_new_male_ft);
$int_new_male_pt = $mysqli->escape_string($int_new_male_pt);
$int_new_fem_ft = $mysqli->escape_string($int_new_fem_ft);
$int_new_fem_pt = $mysqli->escape_string($int_new_fem_pt);
$int_new_ft = $mysqli->escape_string($int_new_ft);
$int_new_pt = $mysqli->escape_string($int_new_pt);
$male1_ft = $mysqli->escape_string($male1_ft);
$male1_pt = $mysqli->escape_string($male1_pt);
$fem1_ft = $mysqli->escape_string($fem1_ft);
$fem1_pt = $mysqli->escape_string($fem1_pt);
$ft1 = $mysqli->escape_string($ft1);
$pt1 = $mysqli->escape_string($pt1);
$male2_ft = $mysqli->escape_string($male2_ft);
$male2_pt = $mysqli->escape_string($male2_pt);
$fem2_ft = $mysqli->escape_string($fem2_ft);
$fem2_pt = $mysqli->escape_string($fem2_pt);
$ft2 = $mysqli->escape_string($ft2);
$pt2 = $mysqli->escape_string($pt2);
$male3_ft = $mysqli->escape_string($male3_ft);
$male3_pt = $mysqli->escape_string($male3_pt);
$fem3_ft = $mysqli->escape_string($fem3_ft);
$fem3_pt = $mysqli->escape_string($fem3_pt);
$ft3 = $mysqli->escape_string($ft3);
$pt3 = $mysqli->escape_string($pt3);
$male4_ft = $mysqli->escape_string($male4_ft);
$male4_pt = $mysqli->escape_string($male4_pt);
$fem4_ft = $mysqli->escape_string($fem4_ft);
$fem4_pt = $mysqli->escape_string($fem4_pt);
$ft4 = $mysqli->escape_string($ft4);
$pt4 = $mysqli->escape_string($pt4);
$male5_ft = $mysqli->escape_string($male5_ft);
$male5_pt = $mysqli->escape_string($male5_pt);
$fem5_ft = $mysqli->escape_string($fem5_ft);
$fem5_pt = $mysqli->escape_string($fem5_pt);
$ft5 = $mysqli->escape_string($ft5);
$pt5 = $mysqli->escape_string($pt5);
$male6_ft = $mysqli->escape_string($male6_ft);
$male6_pt = $mysqli->escape_string($male6_pt);
$fem6_ft = $mysqli->escape_string($fem6_ft);
$fem6_pt = $mysqli->escape_string($fem6_pt);
$ft6 = $mysqli->escape_string($ft6);
$pt6 = $mysqli->escape_string($pt6);
$male7_ft = $mysqli->escape_string($male7_ft);
$male7_pt = $mysqli->escape_string($male7_pt);
$fem7_ft = $mysqli->escape_string($fem7_ft);
$fem7_pt = $mysqli->escape_string($fem7_pt);
$ft7 = $mysqli->escape_string($ft7);
$pt7 = $mysqli->escape_string($pt7);
$male8_ft = $mysqli->escape_string($male8_ft);
$male8_pt = $mysqli->escape_string($male8_pt);
$fem8_ft = $mysqli->escape_string($fem8_ft);
$fem8_pt = $mysqli->escape_string($fem8_pt);
$ft8 = $mysqli->escape_string($ft8);
$pt8 = $mysqli->escape_string($pt8);
$male9_ft = $mysqli->escape_string($male9_ft);
$male9_pt = $mysqli->escape_string($male9_pt);
$fem9_ft = $mysqli->escape_string($fem9_ft);
$fem9_pt = $mysqli->escape_string($fem9_pt);
$ft9 = $mysqli->escape_string($ft9);
$pt9 = $mysqli->escape_string($pt9);
$int_male1_ft = $mysqli->escape_string($int_male1_ft);
$int_male1_pt = $mysqli->escape_string($int_male1_pt);
$int_fem1_ft = $mysqli->escape_string($int_fem1_ft);
$int_fem1_pt = $mysqli->escape_string($int_fem1_pt);
$int_ft1 = $mysqli->escape_string($int_ft1);
$int_pt1 = $mysqli->escape_string($int_pt1);
$int_male2_ft = $mysqli->escape_string($int_male2_ft);
$int_male2_pt = $mysqli->escape_string($int_male2_pt);
$int_fem2_ft = $mysqli->escape_string($int_fem2_ft);
$int_fem2_pt = $mysqli->escape_string($int_fem2_pt);
$int_ft2 = $mysqli->escape_string($int_ft2);
$int_pt2 = $mysqli->escape_string($int_pt2);
$int_male3_ft = $mysqli->escape_string($int_male3_ft);
$int_male3_pt = $mysqli->escape_string($int_male3_pt);
$int_fem3_ft = $mysqli->escape_string($int_fem3_ft);
$int_fem3_pt = $mysqli->escape_string($int_fem3_pt);
$int_ft3 = $mysqli->escape_string($int_ft3);
$int_pt3 = $mysqli->escape_string($int_pt3);
$int_male4_ft = $mysqli->escape_string($int_male4_ft);
$int_male4_pt = $mysqli->escape_string($int_male4_pt);
$int_fem4_ft = $mysqli->escape_string($int_fem4_ft);
$int_fem4_pt = $mysqli->escape_string($int_fem4_pt);
$int_ft4 = $mysqli->escape_string($int_ft4);
$int_pt4 = $mysqli->escape_string($int_pt4);
$int_male5_ft = $mysqli->escape_string($int_male5_ft);
$int_male5_pt = $mysqli->escape_string($int_male5_pt);
$int_fem5_ft = $mysqli->escape_string($int_fem5_ft);
$int_fem5_pt = $mysqli->escape_string($int_fem5_pt);
$int_ft5 = $mysqli->escape_string($int_ft5);
$int_pt5 = $mysqli->escape_string($int_pt5);
$int_male6_ft = $mysqli->escape_string($int_male6_ft);
$int_male6_pt = $mysqli->escape_string($int_male6_pt);
$int_fem6_ft = $mysqli->escape_string($int_fem6_ft);
$int_fem6_pt = $mysqli->escape_string($int_fem6_pt);
$int_ft6 = $mysqli->escape_string($int_ft6);
$int_pt6 = $mysqli->escape_string($int_pt6);
$int_male7_ft = $mysqli->escape_string($int_male7_ft);
$int_male7_pt = $mysqli->escape_string($int_male7_pt);
$int_fem7_ft = $mysqli->escape_string($int_fem7_ft);
$int_fem7_pt = $mysqli->escape_string($int_fem7_pt);
$int_ft7 = $mysqli->escape_string($int_ft7);
$int_pt7 = $mysqli->escape_string($int_pt7);
$int_male8_ft = $mysqli->escape_string($int_male8_ft);
$int_male8_pt = $mysqli->escape_string($int_male8_pt);
$int_fem8_ft = $mysqli->escape_string($int_fem8_ft);
$int_fem8_pt = $mysqli->escape_string($int_fem8_pt);
$int_ft8 = $mysqli->escape_string($int_ft8);
$int_pt8 = $mysqli->escape_string($int_pt8);
$int_exch_in = $mysqli->escape_string($int_exch_in);
$int_exch_out = $mysqli->escape_string($int_exch_out);
$non_up_scho = $mysqli->escape_string($non_up_scho);
$up_scho = $mysqli->escape_string($up_scho);
$grad_1term_male = $mysqli->escape_string($grad_1term_male);
$grad_1term_fem = $mysqli->escape_string($grad_1term_fem);
$grad_1term_ns = $mysqli->escape_string($grad_1term_ns);
$grad_2term_male = $mysqli->escape_string($grad_2term_male);
$grad_2term_fem = $mysqli->escape_string($grad_2term_fem);
$grad_2term_ns = $mysqli->escape_string($grad_2term_ns);
$grad_3term_male = $mysqli->escape_string($grad_3term_male);
$grad_3term_fem = $mysqli->escape_string($grad_3term_fem);
$grad_3term_ns = $mysqli->escape_string($grad_3term_ns);
$grad_4term_male = $mysqli->escape_string($grad_4term_male);
$grad_4term_fem = $mysqli->escape_string($grad_4term_fem);
$grad_4term_ns = $mysqli->escape_string($grad_4term_ns);
$grad_sumr_male = $mysqli->escape_string($grad_sumr_male);
$grad_sumr_fem = $mysqli->escape_string($grad_sumr_fem);
$grad_sumr_ns = $mysqli->escape_string($grad_sumr_ns);

//Create and run the SQL.
$query = "
INSERT INTO tbl_main
(created, user_name, ay, cu, coll_nm, dept_nm, prog_nm, ched_disp, up_disp, educ_lvl, prog_prof, prog_stat, prog_stat_yr, approv_body, yr_grant, prog_cal, prog_del, prog_len, prog_tot_unit, new_male_ft, new_male_pt, new_fem_ft, 
new_fem_pt, new_ft, new_pt, int_new_male_ft, int_new_male_pt, int_new_fem_ft, int_new_fem_pt, int_new_ft, int_new_pt, male1_ft, 
male1_pt, fem1_ft, fem1_pt, ft1, pt1, male2_ft, male2_pt, fem2_ft, fem2_pt, ft2, pt2, male3_ft, male3_pt, fem3_ft, fem3_pt,
ft3, pt3, male4_ft, male4_pt, fem4_ft, fem4_pt, ft4, pt4, male5_ft, male5_pt, fem5_ft, fem5_pt, ft5, pt5, male6_ft, male6_pt, fem6_ft, fem6_pt, ft6, pt6, male7_ft, male7_pt, fem7_ft, fem7_pt, ft7, pt7, male8_ft, male8_pt, fem8_ft, fem8_pt, ft8, pt8, male9_ft, male9_pt, fem9_ft, fem9_pt, ft9, pt9, int_male1_ft, int_male1_pt, int_fem1_ft, int_fem1_pt, int_ft1, int_pt1, int_male2_ft, int_male2_pt, int_fem2_ft, int_fem2_pt, int_ft2, int_pt2, int_male3_ft, int_male3_pt, int_fem3_ft, int_fem3_pt, int_ft3, int_pt3, int_male4_ft, int_male4_pt, int_fem4_ft, int_fem4_pt, int_ft4, int_pt4, int_male5_ft, int_male5_pt, int_fem5_ft, int_fem5_pt, int_ft5, int_pt5, int_male6_ft, int_male6_pt, int_fem6_ft, int_fem6_pt, int_ft6, int_pt6, int_male7_ft, int_male7_pt, int_fem7_ft, int_fem7_pt, int_ft7, int_pt7, int_male8_ft, int_male8_pt, int_fem8_ft, int_fem8_pt, int_ft8, int_pt8, int_exch_in, int_exch_out, non_up_scho, up_scho, grad_1term_male, grad_1term_fem, grad_1term_ns, grad_2term_male, grad_2term_fem, grad_2term_ns, grad_3term_male, grad_3term_fem, grad_3term_ns, grad_4term_male, grad_4term_fem, grad_4term_ns, grad_sumr_male, grad_sumr_fem , grad_sumr_ns)

VALUES 
(NOW(), '$user_name', '$year_cover', '$cu', '$coll_nm', '$dept_nm', '$prog_nm', '$ched_disp', '$up_disp', '$educ_lvl', '$prog_prof', '$prog_stat', '$prog_stat_yr', '$approv_body', '$yr_grant', '$prog_cal', '$prog_del', '$prog_len', '$prog_tot_unit',
'$new_male_ft', '$new_male_pt', '$new_fem_ft', '$new_fem_pt', '$new_ft', '$new_pt', '$int_new_male_ft', '$int_new_male_pt', '$int_new_fem_ft', '$int_new_fem_pt', '$int_new_ft', '$int_new_pt', '$male1_ft', '$male1_pt', '$fem1_ft', '$fem1_pt', '$ft1', '$pt1', '$male2_ft', '$male2_pt', '$fem2_ft', '$fem2_pt', '$ft2', '$pt2', '$male3_ft', '$male3_pt', '$fem3_ft', '$fem3_pt', '$ft3', '$pt3', '$male4_ft', '$male4_pt', '$fem4_ft', '$fem4_pt', '$ft4', '$pt4', '$male5_ft', '$male5_pt', 
'$fem5_ft', '$fem5_pt', '$ft5', '$pt5', '$male6_ft', '$male6_pt', '$fem6_ft', '$fem6_pt', '$ft6', '$pt6', '$male7_ft', '$male7_pt', '$fem7_ft', '$fem7_pt', '$ft7', '$pt7', '$male8_ft', '$male8_pt', '$fem8_ft', '$fem8_pt', '$ft8', '$pt8', '$male9_ft', '$male9_pt', '$fem9_ft', '$fem9_pt', '$ft9', '$pt9', '$int_male1_ft', '$int_male1_pt', '$int_fem1_ft', '$int_fem1_pt', '$int_ft1', '$int_pt1', '$int_male2_ft', '$int_male2_pt', '$int_fem2_ft', '$int_fem2_pt', '$int_ft2', '$int_pt2', '$int_male3_ft', '$int_male3_pt', '$int_fem3_ft', '$int_fem3_pt', '$int_ft3', '$int_pt3', '$int_male4_ft', '$int_male4_pt', '$int_fem4_ft', '$int_fem4_pt', '$int_ft4', '$int_pt4', '$int_male5_ft',
'$int_male5_pt', '$int_fem5_ft', '$int_fem5_pt', '$int_ft5', '$int_pt5', '$int_male6_ft', '$int_male6_pt', '$int_fem6_ft', '$int_fem6_pt', '$int_ft6', '$int_pt6', '$int_male7_ft', '$int_male7_pt', '$int_fem7_ft', '$int_fem7_pt', '$int_ft7', '$int_pt7', 
'$int_male8_ft', '$int_male8_pt', '$int_fem8_ft', '$int_fem8_pt', '$int_ft8', '$int_pt8', '$int_exch_in', '$int_exch_out', 
'$non_up_scho', '$up_scho', '$grad_1term_male', '$grad_1term_fem', '$grad_1term_ns', '$grad_2term_male', '$grad_2term_fem', '$grad_2term_ns', '$grad_3term_male', '$grad_3term_fem', '$grad_3term_ns', '$grad_4term_male', '$grad_4term_fem', '$grad_4term_ns', '$grad_sumr_male', '$grad_sumr_fem', '$grad_sumr_ns')";

if (!mysqli_query($mysqli,$query))
  {
  die('Error: ' . mysqli_error($mysqli));
  }
//echo "1 record added";
//header("Location: ../research/view-input.php");
header("Location: ../forms/view-paginated-acad.php");

mysqli_close($mysqli);

?>
