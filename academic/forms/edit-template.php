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

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);
$mysqli->set_charset("utf8");

//query for cu and units
		
    $query = "SELECT id, short_name FROM tbl_cu ORDER BY seq_num ASC";
  	$result = $mysqli->query($query);

  	while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['id'], "val" => $row['short_name']);
  	}

  	$query = "SELECT cid, cuid, coll_nm FROM tbl_coll ORDER BY cu_shrtnm ASC";
  	$result = $mysqli->query($query);

  	while($row = $result->fetch_assoc()){
    $subcats[$row['cuid']][] = array("cid" => $row['coll_nm'], "val" => $row['coll_nm']);
  	}

  	$jsonCats = json_encode($categories);
  	$jsonSubCats = json_encode($subcats); 

//query for educ level and years to complete
    $query = "SELECT educ_lvl_id,educ_lvl FROM tbl_educ_lvl ORDER BY educ_lvl_id ASC";
  	$result = $mysqli->query($query);

  	while($row = $result->fetch_assoc()){
    $categories1[] = array("id" => $row['educ_lvl_id'], "val" => $row['educ_lvl']);
  	}

  	$query = "SELECT ycid,educ_lvl_id,yr_comp FROM tbl_yr_comp ORDER BY ycid ASC";
  	$result = $mysqli->query($query);

  	while($row = $result->fetch_assoc()){
    $subcats1[$row['educ_lvl_id']][] = array("id" => $row['yr_comp'], "val" => $row['yr_comp']);
  	}

  	$jsonCats1 = json_encode($categories1);
  	$jsonSubCats1 = json_encode($subcats1); 

//Return an error if we have connection issues
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}
// get the id from the url
	$pid = $_GET['id'];

$query = "SELECT tbl_main.pid, tbl_main.user_name, tbl_main.ay, tbl_main.cu, tbl_cu.id, tbl_cu.short_name, tbl_main.coll_nm, tbl_main.dept_nm,  tbl_main.prog_nm, tbl_main.ched_disp, tbl_main.up_disp, tbl_main.educ_lvl, tbl_main.prog_wt, tbl_main.prog_prof, tbl_main.prog_stat, tbl_main.prog_stat_yr, tbl_main.approv_body, tbl_main.yr_grant, tbl_main.prog_cal, tbl_main.prog_del, tbl_main.prog_len, tbl_main.prog_tot_unit, tbl_main.new_male_ft, tbl_main.new_male_pt, tbl_main.new_fem_ft, tbl_main.new_fem_pt, tbl_main.new_ft, tbl_main.new_pt, tbl_main.int_new_male_ft , tbl_main.int_new_male_pt , tbl_main.int_new_fem_ft, tbl_main.int_new_fem_pt, tbl_main.int_new_ft, tbl_main.int_new_pt, tbl_main.male1_ft, tbl_main.male1_pt, tbl_main.fem1_ft, tbl_main.fem1_pt, tbl_main.ft1, tbl_main.pt1, tbl_main.male2_ft, tbl_main.male2_pt, tbl_main.fem2_ft, tbl_main.fem2_pt, tbl_main.ft2, tbl_main.pt2, tbl_main.male3_ft, tbl_main.male3_pt, tbl_main.fem3_ft, tbl_main.fem3_pt, tbl_main.ft3, tbl_main.pt3, tbl_main.male4_ft, tbl_main.male4_pt, tbl_main.fem4_ft, tbl_main.fem4_pt, tbl_main.ft4, tbl_main.pt4, tbl_main.male5_ft, tbl_main.male5_pt, tbl_main.fem5_ft, tbl_main.fem5_pt, tbl_main.ft5, tbl_main.pt5, tbl_main.male6_ft, tbl_main.male6_pt, tbl_main.fem6_ft, tbl_main.fem6_pt, tbl_main.ft6, tbl_main.pt6, tbl_main.male7_ft, tbl_main.male7_pt, tbl_main.fem7_ft, tbl_main.fem7_pt, tbl_main.ft7, tbl_main.pt7, tbl_main.male8_ft, tbl_main.male8_pt, tbl_main.fem8_ft, tbl_main.fem8_pt, tbl_main.ft8, tbl_main.pt8, tbl_main.male9_ft, tbl_main.male9_pt, tbl_main.fem9_ft, tbl_main.fem9_pt, tbl_main.ft9, tbl_main.pt9, tbl_main.int_male1_ft, tbl_main.int_male1_pt, tbl_main.int_fem1_ft, tbl_main.int_fem1_pt, tbl_main.int_ft1, tbl_main.int_pt1, tbl_main.int_male2_ft, tbl_main.int_male2_pt, tbl_main.int_fem2_ft, tbl_main.int_fem2_pt, tbl_main.int_ft2, tbl_main.int_pt2, tbl_main.int_male3_ft, tbl_main.int_male3_pt, tbl_main.int_fem3_ft, tbl_main.int_fem3_pt, tbl_main.int_ft3, tbl_main.int_pt3, tbl_main.int_male4_ft, tbl_main.int_male4_pt, tbl_main.int_fem4_ft, tbl_main.int_fem4_pt, tbl_main.int_ft4, tbl_main.int_pt4, tbl_main.int_male5_ft, tbl_main.int_male5_pt, tbl_main.int_fem5_ft, tbl_main.int_fem5_pt, tbl_main.int_ft5, tbl_main.int_pt5, tbl_main.int_male6_ft, tbl_main.int_male6_pt, tbl_main.int_fem6_ft, tbl_main.int_fem6_pt, tbl_main.int_ft6, tbl_main.int_pt6, tbl_main.int_male7_ft, tbl_main.int_male7_pt, tbl_main.int_fem7_ft, tbl_main.int_fem7_pt, tbl_main.int_ft7, tbl_main.int_pt7, tbl_main.int_male8_ft, tbl_main.int_male8_pt, tbl_main.int_fem8_ft, tbl_main.int_fem8_pt, tbl_main.int_ft8, tbl_main.int_pt8, tbl_main.int_exch_in, tbl_main.int_exch_out, tbl_main.non_up_scho, tbl_main.up_scho, tbl_main.grad_1term_male, tbl_main.grad_1term_fem, tbl_main.grad_1term_ns, tbl_main.grad_2term_male, tbl_main.grad_2term_fem, tbl_main.grad_2term_ns, tbl_main.grad_3term_male, tbl_main.grad_3term_fem, tbl_main.grad_3term_ns, tbl_main.grad_4term_male, tbl_main.grad_4term_fem, tbl_main.grad_4term_ns, tbl_main.grad_sumr_male, tbl_main.grad_sumr_fem, tbl_main.grad_sumr_ns FROM tbl_main INNER JOIN tbl_cu ON tbl_main.cu = tbl_cu.id WHERE tbl_main.pid = " . $pid;;

$record_set = $mysqli->query($query);
$row = $record_set->fetch_assoc();

//Extract fields
$year_cover = $row['ay']+1;
$cu1 = $row['id'];
$cu2 = $row['short_name'];
$coll = $row['coll_nm'];
$dept = $row['dept_nm'];
$prog_nm = $row['prog_nm'];
$ched_disp = $row['ched_disp'];
$up_disp = $row['up_disp'];
$educ_lvl = $row['educ_lvl'];
$prog_prof = $row['prog_prof'];
$prog_stat = $row['prog_stat'];
$prog_stat_yr = $row['prog_stat_yr'];
$approv_body = $row['approv_body'];
$yr_grant = $row['yr_grant'];
$prog_cal = $row['prog_cal'];
$prog_del = $row['prog_del'];
$prog_len = $row['prog_len'];
$prog_tot_unit = $row['prog_tot_unit'];
$new_male_ft = $row['new_male_ft'];
$new_male_pt = $row['new_male_pt'];
$new_fem_ft = $row['new_fem_ft'];
$new_fem_pt = $row['new_fem_pt'];
$new_ft = $row['new_ft'];
$new_pt = $row['new_pt'];
$int_new_male_ft = $row['int_new_male_ft'];
$int_new_male_pt = $row['int_new_male_pt'];
$int_new_fem_ft = $row['int_new_fem_ft'];
$int_new_fem_pt = $row['int_new_fem_pt'];
$int_new_ft = $row['int_new_ft'];
$int_new_pt = $row['int_new_pt'];
$male1_ft = $row['male1_ft'];
$male1_pt = $row['male1_pt'];
$fem1_ft = $row['fem1_ft'];
$fem1_pt = $row['fem1_pt'];
$ft1 = $row['ft1'];
$pt1 = $row['pt1'];
$male2_ft = $row['male2_ft'];
$male2_pt = $row['male2_pt'];
$fem2_ft = $row['fem2_ft'];
$fem2_pt = $row['fem2_pt'];
$ft2 = $row['ft2'];
$pt2 = $row['pt2'];
$male3_ft = $row['male3_ft'];
$male3_pt = $row['male3_pt'];
$fem3_ft = $row['fem3_ft'];
$fem3_pt = $row['fem3_pt'];
$ft3 = $row['ft3'];
$pt3 = $row['pt3'];
$male4_ft = $row['male4_ft'];
$male4_pt = $row['male4_pt'];
$fem4_ft = $row['fem4_ft'];
$fem4_pt = $row['fem4_pt'];
$ft4 = $row['ft4'];
$pt4 = $row['pt4'];
$male5_ft = $row['male5_ft'];
$male5_pt = $row['male5_pt'];
$fem5_ft = $row['fem5_ft'];
$fem5_pt = $row['fem5_pt'];
$ft5 = $row['ft5'];
$pt5 = $row['pt5'];
$male6_ft = $row['male6_ft'];
$male6_pt = $row['male6_pt'];
$fem6_ft = $row['fem6_ft'];
$fem6_pt = $row['fem6_pt'];
$ft6 = $row['ft6'];
$pt6 = $row['pt6'];
$male7_ft = $row['male7_ft'];
$male7_pt = $row['male7_pt'];
$fem7_ft = $row['fem7_ft'];
$fem7_pt = $row['fem7_pt'];
$ft7 = $row['ft7'];
$pt7 = $row['pt7'];
$male8_ft = $row['male8_ft'];
$male8_pt = $row['male8_pt'];
$fem8_ft = $row['fem8_ft'];
$fem8_pt = $row['fem8_pt'];
$ft8 = $row['ft8'];
$pt8 = $row['pt8'];
$male9_ft = $row['male9_ft'];
$male9_pt = $row['male9_pt'];
$fem9_ft = $row['fem9_ft'];
$fem9_pt = $row['fem9_pt'];
$ft9 = $row['ft9'];
$pt9 = $row['pt9'];
$int_male1_ft = $row['int_male1_ft'];
$int_male1_pt = $row['int_male1_pt'];
$int_fem1_ft = $row['int_fem1_ft'];
$int_fem1_pt = $row['int_fem1_pt'];
$int_ft1 = $row['int_ft1'];
$int_pt1 = $row['int_pt1'];
$int_male2_ft = $row['int_male2_ft'];
$int_male2_pt = $row['int_male2_pt'];
$int_fem2_ft = $row['int_fem2_ft'];
$int_fem2_pt = $row['int_fem2_pt'];
$int_ft2 = $row['int_ft2'];
$int_pt2 = $row['int_pt2'];
$int_male3_ft = $row['int_male3_ft'];
$int_male3_pt = $row['int_male3_pt'];
$int_fem3_ft = $row['int_fem3_ft'];
$int_fem3_pt = $row['int_fem3_pt'];
$int_ft3 = $row['int_ft3'];
$int_pt3 = $row['int_pt3'];
$int_male4_ft = $row['int_male4_ft'];
$int_male4_pt = $row['int_male4_pt'];
$int_fem4_ft = $row['int_fem4_ft'];
$int_fem4_pt = $row['int_fem4_pt'];
$int_ft4 = $row['int_ft4'];
$int_pt4 = $row['int_pt4'];
$int_male5_ft = $row['int_male5_ft'];
$int_male5_pt = $row['int_male5_pt'];
$int_fem5_ft = $row['int_fem5_ft'];
$int_fem5_pt = $row['int_fem5_pt'];
$int_ft5 = $row['int_ft5'];
$int_pt5 = $row['int_pt5'];
$int_male6_ft = $row['int_male6_ft'];
$int_male6_pt = $row['int_male6_pt'];
$int_fem6_ft = $row['int_fem6_ft'];
$int_fem6_pt = $row['int_fem6_pt'];
$int_ft6 = $row['int_ft6'];
$int_pt6 = $row['int_pt6'];
$int_male7_ft = $row['int_male7_ft'];
$int_male7_pt = $row['int_male7_pt'];
$int_fem7_ft = $row['int_fem7_ft'];
$int_fem7_pt = $row['int_fem7_pt'];
$int_ft7 = $row['int_ft7'];
$int_pt7 = $row['int_pt7'];
$int_male8_ft = $row['int_male8_ft'];
$int_male8_pt = $row['int_male8_pt'];
$int_fem8_ft = $row['int_fem8_ft'];
$int_fem8_pt = $row['int_fem8_pt'];
$int_ft8 = $row['int_ft8'];
$int_pt8 = $row['int_pt8'];
$int_exch_in = $row['int_exch_in'];
$int_exch_out = $row['int_exch_out'];
$non_up_scho = $row['non_up_scho'];
$up_scho = $row['up_scho'];
$grad_1term_male = $row['grad_1term_male'];
$grad_1term_fem = $row['grad_1term_fem'];
$grad_1term_ns = $row['grad_1term_ns'];
$grad_2term_male = $row['grad_2term_male'];
$grad_2term_fem = $row['grad_2term_fem'];
$grad_2term_ns = $row['grad_2term_ns'];
$grad_3term_male = $row['grad_3term_male'];
$grad_3term_fem = $row['grad_3term_fem'];
$grad_3term_ns = $row['grad_3term_ns'];
$grad_4term_male = $row['grad_4term_male'];
$grad_4term_fem = $row['grad_4term_fem'];
$grad_4term_ns = $row['grad_4term_ns'];
$grad_sumr_male = $row['grad_sumr_male'];
$grad_sumr_fem = $row['grad_sumr_fem'];
$grad_sumr_ns = $row['grad_sumr_ns'];

//get session values
$usercu = $_SESSION['user_cu'];
$user_name = $_SESSION['user_name'];
$acad_yr = $_SESSION['acad_yr'];

//Query the database for the results we want
$query1 = $mysqli->query("SELECT id, short_name FROM `tbl_cu` WHERE id = '$usercu'");
$query2 = $mysqli->query("SELECT cid, coll_nm FROM `tbl_coll` WHERE cuid = '$usercu' ORDER BY `coll_nm` ASC");
$query3 = $mysqli->query("SELECT did, dept_nm FROM `tbl_dept` WHERE cuid = '$usercu' ORDER BY `dept_nm` ASC");
$query4 = $mysqli->query("SELECT pid, prog_nm FROM `tbl_prog` WHERE cuid = '$usercu' ORDER BY `prog_nm` ASC");
$query5 = $mysqli->query("SELECT * FROM `tbl_ched_disp` ORDER BY `ched_min` ASC");
$query6 = $mysqli->query("SELECT * FROM `tbl_up_disp` ORDER BY `updid` ASC");
$query7 = $mysqli->query("SELECT * FROM `tbl_educ_lvl` ORDER BY `educ_lvl` ASC");
$query8 = $mysqli->query("SELECT * FROM `tbl_answer` ORDER BY `ynid` ASC");
$query9 = $mysqli->query("SELECT * FROM `tbl_prog_stat` ORDER BY `psid` ASC");
$query10 = $mysqli->query("SELECT * FROM `tbl_prog_cal` ORDER BY `pcid` ASC");
$query11 = $mysqli->query("SELECT * FROM `tbl_prog_del` ORDER BY `pdid` ASC");

//find record with apostrophe in record e.g. Master's
$query12 = $mysqli->query('SELECT * FROM `tbl_yr_comp` WHERE educ_lvl_id = "$educ_lvl" "$educ_lvl" ORDER BY `ycid` ASC');

//Create an array of objects for each returned row
while($array1[] = $query1->fetch_object());
while($array2[] = $query2->fetch_object());
while($array3[] = $query3->fetch_object());
while($array4[] = $query4->fetch_object());
while($array5[] = $query5->fetch_object());
while($array6[] = $query6->fetch_object());
while($array7[] = $query7->fetch_object());
while($array8[] = $query8->fetch_object());
while($array9[] = $query9->fetch_object());
while($array10[] = $query10->fetch_object());
while($array11[] = $query11->fetch_object());
while($array12[] = $query12->fetch_object());
		
//Remove the blank entry at end of array
array_pop($array1);
array_pop($array2);
array_pop($array3);
array_pop($array4);
array_pop($array5);
array_pop($array6);
array_pop($array7);
array_pop($array8);
array_pop($array9);
array_pop($array10);
array_pop($array11);
array_pop($array12);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Form</title>

<style>
	body {margin:1; font-family:Calibri; font-size:14px;}
</style>

<style>
	input {
   		resize: horizontal;
		width:	100px;
		text-align:right;
			}

	input:active {
		width: 100px;   
    		}

    input:focus {
   		min-width: 100px;
    			}
	input#button{
		text-align:center;
		width: 50px;
				}
	select {font-family:Calibri; font-size:14px;}
</style>

<script type='text/javascript'>
      <?php
        echo "var categories1 = $jsonCats1; \n";
        echo "var subcats1 = $jsonSubCats1; \n";

      ?>
      function loadCategories(){

        var select = document.getElementById("categoriesSelect1");
        select.onchange = updateSubCats1;
        for(var i = 0; i < categories1.length; i++){
          select.options[i] = new Option(categories1[i].val,categories1[i].id);          
        }
	  }

      function updateSubCats1(){
        var catSelect = this;
        var catid = this.value;
        var subcatSelect = document.getElementById("subcatsSelect1");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats1[catid].length; i++){
          subcatSelect.options[i] = new Option(subcats1[catid][i].val,subcats1[catid][i].id);
        }
      }
</script>


<script type="text/javascript">
var maxChar=255;
function limit(obj){
while(obj.value.length>maxChar){
obj.value=obj.value.replace(/.$/,'');//removes the last character
}
}
</script>

<script type='text/javascript'>
function validateForm()
{
var x=document.forms["input_acad_form"]["prog_len"].value;
if (x==null || x=="" || x=="Please Select :")
  {
  alert("Please select number of years to complete");
  return false;
  } 
}
</script>

</head>
<body onload='loadCategories()'>
<h2>Academic Programs Profile: Edit Record</h2><hr/>
<form id="edit_template_form" method="post" action="save-edited-template.php" onsubmit="return validateForm()">
<table>

<?php
echo "<input name='user_name' type='hidden' value=";
echo $user_name;
echo ">";

echo  "<tr>
    <td><div align='right'>Data for Academic Year</td></div>";
echo "<td><div align='left'>";
echo $year_cover; echo '-'; echo $year_cover + 1;
echo  "</div></td>";
echo  "<td><input name='year_cover' type='hidden' value=";
echo $year_cover;
echo  "/></td></tr>";

echo "<tr>";
echo "<td><div align='right'>Constituent University</div></td>";
echo "<td><div align='left'>";
echo $cu2;
echo "</div></td>";
echo "<input name='cu' type='hidden' value=";
echo $cu1;
echo ">";

echo "<tr>
    <td><div align='right'>College</div></td>
    <td><select name='coll_nm' size='1' required>";
echo "<option value=";
print "'$coll'";
echo ">";
print $coll;
echo "</option>";
	foreach($array2 as $option2) : 
echo "<option>";
echo $option2->coll_nm;
echo "</option>";
	endforeach; 	
echo"</select></td></tr>"; 

echo "<tr>
    <td><div align='right'>Department</div></td>
    <td><select name='dept_nm' size='1' required>";
echo "<option value=";
print "'$dept'";
echo ">";
print $dept;
echo "</option>";
	foreach($array3 as $option3) : 
echo "<option>";
echo $option3->dept_nm;
echo "</option>";
	endforeach; 	
echo"</select></td></tr>"; 

echo "<tr>
    <td><div align='right'>Program Name</div></td>
    <td><select name='prog_nm' size='1' required>";
echo "<option value=";
print "'$prog_nm'";
echo ">";
print $prog_nm;
echo "</option>";
	foreach($array4 as $option4) : 
echo "<option>";
echo $option4->prog_nm;
echo "</option>";
	endforeach; 	
echo"</select></td></tr>"; 

?>

	<tr>
		<td><input name='ched_disp' type='hidden' value="<?php print $ched_disp;?>"/></td>
    </tr>

	<tr>
    	<td><div align="right">UP Discipline</div></td>
    	<td><select name="up_disp" size="1" required>
    		<option value="<?php print $up_disp; ?>"><?php print $up_disp; ?></option>
      		<?php foreach($array6 as $option6) : ?>
      		<option value="<?php echo $option6->up_disp; ?>"><?php echo $option6->up_disp; ?></option>
      		<?php endforeach; ?>
     		</select>
		</td>
	</tr>
<tr>
    <td><div align="right">Education Level</br><b>Last Selected: <?php echo $educ_lvl ?></b></div></td>
   	<td><select name="educ_lvl" size="1" id="categoriesSelect1" required></select></td>
</tr>
<tr>
    <td><div align="right">Years to Complete</br><b>Last Selected: <?php echo $prog_len ?></b></div></td>
   	<td><select name="prog_len" size="1" id="subcatsSelect1" required></select></td>
</tr>
	<tr>
    	<td rowspan='3' scope='row'><div align="right">Professional program</br>with corresponding</br>licensure</div></td>
    	<td rowspan='3' scope='row'><select name="prog_prof" size="1" required>
    		<option value="<?php print $prog_prof; ?>"><?php print $prog_prof; ?></option>
      		<?php foreach($array8 as $option8) : ?>
      		<option value="<?php echo $option8->answer; ?>"><?php echo $option8->answer; ?></option>
      		<?php endforeach; ?>
     		</select>
		</td>
	</tr>
    <tr></tr>
    <tr></tr>
	<tr>
    	<td><div align="right">Status</div></td>
    	<td><select name="prog_stat" size="1" required>
    		<option value="<?php print $prog_stat; ?>"><?php print $prog_stat; ?></option>
      		<?php foreach($array9 as $option9) : ?>
      		<option value="<?php echo $option9->prog_stat; ?>"><?php echo $option9->prog_stat; ?></option>
      		<?php endforeach; ?>
     		</select>
		</td>
	</tr>
    <tr>
	    <td><div align="right">Status Year<br/>(<i>Indicate Year</i>)</div></td>
		<td><input name='prog_stat_yr' type='text' style="text-align:left" value='<?php print $prog_stat_yr;?>'/></td>
	</tr>
    <tr>
    	<td><div align="right">Approving Body</div></td>
	   	<td><textarea name="approv_body" cols="25" rows="3" onkeyup="limit(approv_body)" onblur="limit(approv_body)" required style='text-align:left'><?php print $approv_body; ?></textarea></td>
  	</tr>
	<tr>
	    <td><div align="right">Year Granted</div></td>
		<td><input name='yr_grant' type='text' style='text-align:left' value='<?php print $yr_grant;?>'/></td>
    </tr>
	<tr>
    	<td><div align="right">Calendar</div></td>
    	<td><select name="prog_cal" size="1" required>
    		<option value="<?php print $prog_cal; ?>"><?php print $prog_cal; ?></option>
      		<?php foreach($array10 as $option10) : ?>
      		<option value="<?php echo $option10->prog_cal; ?>"><?php echo $option10->prog_cal; ?></option>
      		<?php endforeach; ?>
     		</select>
		</td>
	</tr>
	<tr>
    	<td><div align="right">Delivery Mode</div></td>
    	<td><select name="prog_del" size="1" required>
    		<option value="<?php print $prog_del; ?>"><?php print $prog_del; ?></option>
      		<?php foreach($array11 as $option11) : ?>
      		<option value="<?php echo $option11->prog_del; ?>"><?php echo $option11->prog_del; ?></option>
      		<?php endforeach; ?>
     		</select>
		</td>
	</tr>
	<tr>
	    <td rowspan='2' scope='row'><div align="right">Total Prescribed<br/>Credit Unit</div></td>
		<td rowspan='2' scope='row'><input name='prog_tot_unit' type='text' required style='text-align:left' value='<?php print $prog_tot_unit;?>'/></td>
    </tr>
<tr>
		<tr></tr>
    	<td colspan="2" scope="row"><div align="left">
		<strong>NEW STUDENT (1st time to enroll in UP, includes transferees 
        from other schools but NOT shiftees)<br />A. Filipino Citizens<br/></strong></div>
	   	</td>
</tr>
</table>
<table border="1" cellpadding="1" cellspacing="0">
    <tr>
    <td colspan="2" scope="col" align="center">Male</td>
    <td colspan="2" scope="col" align="center">Female</td>
    <td colspan="2" scope="col" align="center">Sex Not Indicated</td>
	</tr>
    <tr>
    <td width="100" align="center">Full-Time</td>
    <td width="100" align="center">Part-Time</div></td>
    <td width="100" align="center">Full-Time</div></td>
    <td width="100" align="center">Part-Time</div></td>
    <td width="100" align="center">Full-Time</div></td>
    <td width="100" align="center">Part-Time</div></td>
	</tr>

    <tr>
    <td><input name='new_male_ft' type='text' value=0 /></td>
    <td><input name='new_male_pt' type='text' value=0 /></td>
    <td><input name='new_fem_ft' type='text' value=0 /></td>
    <td><input name='new_fem_pt' type='text' value=0 /></td>
    <td><input name='new_ft' type='text' value=0 /></td>
    <td><input name='new_pt' type='text' value=0 /></td>
    </tr>
</table>
<table>
<tr>
		<tr></tr>
    	<td colspan="2" scope="row"><div align="left">
		<strong>B. Non-Filipino Citizens</strong><br /></div>
	   	</td>
</tr>
</table>
<table border="1" cellpadding="1" cellspacing="0">
    <tr>
    <td colspan="2" scope="col" align="center">Male</td>
    <td colspan="2" scope="col" align="center">Female</td>
    <td colspan="2" scope="col" align="center">Sex Not Indicated</td>
	</tr>
    <tr>
    <td width="100" align="center">Full-Time</td>
    <td width="100" align="center">Part-Time</div></td>
    <td width="100" align="center">Full-Time</div></td>
    <td width="100" align="center">Part-Time</div></td>
    <td width="100" align="center">Full-Time</div></td>
    <td width="100" align="center">Part-Time</div></td>
	</tr>

    <tr>
    <td><input name='int_new_male_ft' type='text' value=0 /></td>
    <td><input name='int_new_male_pt' type='text' value=0 /></td>
    <td><input name='int_new_fem_ft' type='text' value=0 /></td>
    <td><input name='int_new_fem_pt' type='text' value=0 /></td>
    <td><input name='int_new_ft' type='text' value=0 /></td>
    <td><input name='int_new_pt' type='text' value=0 /></td>
    </tr>
</table>
<table>
<tr>
		<tr></tr>
    	<td colspan="2" scope="row"><div align="left">
		<strong>CONTINUING STUDENTS (student year level based on curriculum) <br/>
        A. Filipino Citizens</strong><br /></div>
	   	</td>
</tr>
</table>
<table border="1" cellpadding="1" cellspacing="0">
    <tr>
    <td rowspan="2" scope="row" align="center">Year Level</td>
    <td colspan="2" scope="col" align="center">Male</td>
    <td colspan="2" scope="col" align="center">Female</td>
    <td colspan="2" scope="col" align="center">Sex Not Indicated</td>
	</tr>
    <tr>
    <td width="100" align="center">Full-Time</td>
    <td width="100" align="center">Part-Time</div></td>
    <td width="100" align="center">Full-Time</div></td>
    <td width="100" align="center">Part-Time</div></td>
    <td width="100" align="center">Full-Time</div></td>
    <td width="100" align="center">Part-Time</div></td>
	</tr>
	
    <tr>
    <td width="100" align="center">Other 1st Year</td>
    <td><input name='male1_ft' type='text' value=0 /></td>
    <td><input name='male1_pt' type='text' value=0 /></td>
    <td><input name='fem1_ft' type='text' value=0 /></td>
    <td><input name='fem1_pt' type='text' value=0 /></td>
    <td><input name='ft1' type='text' value=0 /></td>
    <td><input name='pt1' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">2nd</td>
    <td><input name='male2_ft' type='text' value=0 /></td>
    <td><input name='male2_pt' type='text' value=0 /></td>
    <td><input name='fem2_ft' type='text' value=0 /></td>
    <td><input name='fem2_pt' type='text' value=0 /></td>
    <td><input name='ft2' type='text' value=0 /></td>
    <td><input name='pt2' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">3rd</td>
    <td><input name='male3_ft' type='text' value=0 /></td>
    <td><input name='male3_pt' type='text' value=0 /></td>
    <td><input name='fem3_ft' type='text' value=0 /></td>
    <td><input name='fem3_pt' type='text' value=0 /></td>
    <td><input name='ft3' type='text' value=0 /></td>
    <td><input name='pt3' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">4th</td>
    <td><input name='male4_ft' type='text' value=0 /></td>
    <td><input name='male4_pt' type='text' value=0 /></td>
    <td><input name='fem4_ft' type='text' value=0 /></td>
    <td><input name='fem4_pt' type='text' value=0 /></td>
    <td><input name='ft4' type='text' value=0 /></td>
    <td><input name='pt4' type='text' value=0 /></td>
    </tr>
    <td width="100" align="Center">5th</td>
    <td><input name='male5_ft' type='text' value=0 /></td>
    <td><input name='male5_pt' type='text' value=0 /></td>
    <td><input name='fem5_ft' type='text' value=0 /></td>
    <td><input name='fem5_pt' type='text' value=0 /></td>
    <td><input name='ft5' type='text' value=0 /></td>
    <td><input name='pt5' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">6th</td>
    <td><input name='male6_ft' type='text' value=0 /></td>
    <td><input name='male6_pt' type='text' value=0 /></td>
    <td><input name='fem6_ft' type='text' value=0 /></td>
    <td><input name='fem6_pt' type='text' value=0 /></td>
    <td><input name='ft6' type='text' value=0 /></td>
    <td><input name='pt6' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">7th</td>
    <td><input name='male7_ft' type='text' value=0 /></td>
    <td><input name='male7_pt' type='text' value=0 /></td>
    <td><input name='fem7_ft' type='text' value=0 /></td>
    <td><input name='fem7_pt' type='text' value=0 /></td>
    <td><input name='ft7' type='text' value=0 /></td>
    <td><input name='pt7' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">Beyond 7 Years</td>
    <td><input name='male8_ft' type='text' value=0 /></td>
    <td><input name='male8_pt' type='text' value=0 /></td>
    <td><input name='fem8_ft' type='text' value=0 /></td>
    <td><input name='fem8_pt' type='text' value=0 /></td>
    <td><input name='ft8' type='text' value=0 /></td>
    <td><input name='pt8' type='text' value=0 /></td>
    </tr>
</table>
<table>
<tr>
		<tr></tr>
    	<td colspan="2" scope="row"><div align="left">
		<strong>B. Non-Filipino Citizens</strong><br /></div>
	   	</td>
</tr>
</table>
<table border="1" cellpadding="1" cellspacing="0">
    <tr>
    <td rowspan="2" scope="row" align="center">Year Level</td>
    <td colspan="2" scope="col" align="center">Male</td>
    <td colspan="2" scope="col" align="center">Female</td>
    <td colspan="2" scope="col" align="center">Sex Not Indicated</td>
	</tr>
    <tr>
    <td width="100" align="center">Full-Time</td>
    <td width="100" align="center">Part-Time</div></td>
    <td width="100" align="center">Full-Time</div></td>
    <td width="100" align="center">Part-Time</div></td>
    <td width="100" align="center">Full-Time</div></td>
    <td width="100" align="center">Part-Time</div></td>
	</tr>
	
    <tr>
    <td width="100" align="center">Other 1st Year</td>
    <td><input name='int_male1_ft' type='text' value=0 /></td>
    <td><input name='int_male1_pt' type='text' value=0 /></td>
    <td><input name='int_fem1_ft' type='text' value=0 /></td>
    <td><input name='int_fem1_pt' type='text' value=0 /></td>
    <td><input name='int_ft1' type='text' value=0 /></td>
    <td><input name='int_pt1' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">2nd</td>
    <td><input name='int_male2_ft' type='text' value=0 /></td>
    <td><input name='int_male2_pt' type='text' value=0 /></td>
    <td><input name='int_fem2_ft' type='text' value=0 /></td>
    <td><input name='int_fem2_pt' type='text' value=0 /></td>
    <td><input name='int_ft2' type='text' value=0 /></td>
    <td><input name='int_pt2' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">3rd</td>
    <td><input name='int_male3_ft' type='text' value=0 /></td>
    <td><input name='int_male3_pt' type='text' value=0 /></td>
    <td><input name='int_fem3_ft' type='text' value=0 /></td>
    <td><input name='int_fem3_pt' type='text' value=0 /></td>
    <td><input name='int_ft3' type='text' value=0 /></td>
    <td><input name='int_pt3' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">4th</td>
    <td><input name='int_male4_ft' type='text' value=0 /></td>
    <td><input name='int_male4_pt' type='text' value=0 /></td>
    <td><input name='int_fem4_ft' type='text' value=0 /></td>
    <td><input name='int_fem4_pt' type='text' value=0 /></td>
    <td><input name='int_ft4' type='text' value=0 /></td>
    <td><input name='int_pt4' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">5th</td>
    <td><input name='int_male5_ft' type='text' value=0 /></td>
    <td><input name='int_male5_pt' type='text' value=0 /></td>
    <td><input name='int_fem5_ft' type='text' value=0 /></td>
    <td><input name='int_fem5_pt' type='text' value=0 /></td>
    <td><input name='int_ft5' type='text' value=0 /></td>
    <td><input name='int_pt5' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">6th</td>
    <td><input name='int_male6_ft' type='text' value=0 /></td>
    <td><input name='int_male6_pt' type='text' value=0 /></td>
    <td><input name='int_fem6_ft' type='text' value=0 /></td>
    <td><input name='int_fem6_pt' type='text' value=0 /></td>
    <td><input name='int_ft6' type='text' value=0 /></td>
    <td><input name='int_pt6' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">7th</td>
    <td><input name='int_male7_ft' type='text' value=0 /></td>
    <td><input name='int_male7_pt' type='text' value=0 /></td>
    <td><input name='int_fem7_ft' type='text' value=0 /></td>
    <td><input name='int_fem7_pt' type='text' value=0 /></td>
    <td><input name='int_ft7' type='text' value=0 /></td>
    <td><input name='int_pt7' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">Beyond 7 Years</td>
    <td><input name='int_male8_ft' type='text' value=0 /></td>
    <td><input name='int_male8_pt' type='text' value=0 /></td>
    <td><input name='int_fem8_ft' type='text' value=0 /></td>
    <td><input name='int_fem8_pt' type='text' value=0 /></td>
    <td><input name='int_ft8' type='text' value=0 /></td>
    <td><input name='int_pt8' type='text' value=0 /></td>
    </tr>
</table>
<table>
<tr>
		<tr></tr>
    	<td colspan="2" scope="row"><div align="left">
		<strong>Cross-Registrant; Non-Degree; Non-Major; Non-Regular</strong><br /></div>
	   	</td>
</tr>
</table>
<table border="1" cellpadding="1" cellspacing="0">
    <tr>
    <td rowspan="2" scope="row" align="center">Year Level</td>
    <td colspan="2" scope="col" align="center">Male</td>
    <td colspan="2" scope="col" align="center">Female</td>
    <td colspan="2" scope="col" align="center">Sex Not Indicated</td>
	</tr>
    <tr>
    <td width="100" align="center">Full-Time</td>
    <td width="100" align="center">Part-Time</div></td>
    <td width="100" align="center">Full-Time</div></td>
    <td width="100" align="center">Part-Time</div></td>
    <td width="100" align="center">Full-Time</div></td>
    <td width="100" align="center">Part-Time</div></td>
	</tr>
	
    <tr>
    <td width="100" align="center">Not Applicable</td>
    <td><input name='male9_ft' type='text' value=0 /></td>
    <td><input name='male9_pt' type='text' value=0 /></td>
    <td><input name='fem9_ft' type='text' value=0 /></td>
    <td><input name='fem9_pt' type='text' value=0 /></td>
    <td><input name='ft9' type='text' value=0 /></td>
    <td><input name='pt9' type='text' value=0 /></td>
    </tr>
</table>
<table>
<tr>
		<tr></tr>
    	<td colspan="2" scope="row"><div align="left">
		<strong>UP INTERNATIONAL EXCHANGE STUDENTS</strong><br /></div>
	   	</td>
</tr>
</table>
<table border="1" cellpadding="1" cellspacing="0">
    <td width="100" align="center">Inbound</td>
    <td width="100" align="center">Outbound</div></td>
	
    <tr>
    <td><input name='int_exch_in' type='text' value=0 /></td>
    <td><input name='int_exch_out' type='text' value=0 /></td>
    </tr>
</table>
<table>
<tr>
		<tr></tr>
    	<td colspan="2" scope="row"><div align="left">
		<strong>SCHOLARS (based on merit)</strong><br /></div>
	   	</td>
</tr>
</table>
<table border="1" cellpadding="1" cellspacing="0">
    <td width="100" align="center">Non-UP Scholar</td>
    <td width="100" align="center">UP Scholars</div></td>
	
    <tr>
    <td><input name='non_up_scho' type='text' value=0 /></td>
    <td><input name='up_scho' type='text' value=0 /></td>
    </tr>
</table>
<table>
<tr>
		<tr></tr>
    	<td colspan="2" scope="row"><div align="left">
		<strong>GRADUATES of Previous Academic Year</strong><br /></div>
	   	</td>
</tr>
</table>
<table border="1" cellpadding="1" cellspacing="0">
    <td width="100" align="center">Term</td>
    <td width="100" align="center">Male</div></td>
    <td width="100" align="center">Female</div></td>
    <td width="100" align="center">Sex Not Indicated</div></td>
	
    <tr>
    <td width="100" align="center">1st</div></td>
    <td><input name='grad_1term_male' type='text' value=0 /></td>
    <td><input name='grad_1term_fem' type='text' value=0 /></td>
    <td><input name='grad_1term_ns' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">2nd</div></td>
    <td><input name='grad_2term_male' type='text' value=0 /></td>
    <td><input name='grad_2term_fem' type='text' value=0 /></td>
    <td><input name='grad_2term_ns' type='text' value=0 /></td>
    </tr>
    <td width="100" align="center">3rd</div></td>
    <td><input name='grad_3term_male' type='text' value=0 /></td>
    <td><input name='grad_3term_fem' type='text' value=0 /></td>
    <td><input name='grad_3term_ns' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">4th</div></td>
    <td><input name='grad_4term_male' type='text' value=0 /></td>
    <td><input name='grad_4term_fem' type='text' value=0 /></td>
    <td><input name='grad_4term_ns' type='text' value=0 /></td>
    </tr>
    <tr>
    <td width="100" align="center">Summer/Midyear</div></td>
    <td><input name='grad_sumr_male' type='text' value=0 /></td>
    <td><input name='grad_sumr_fem' type='text' value=0 /></td>
    <td><input name='grad_sumr_ns' type='text' value=0 /></td>
    </tr>
</table>
<table>    
    <tr>
   	<th rowspan="4" scope="row"><div align="center">
       <input type="reset" value="Clear" id="button" />
       <input type="hidden" name="pid" value="<?php print $pid; ?>" id="button" ><button type="submit">Submit</button>
		</div></th>
    </tr>
</table>
</form>
<?php
	//Free result set and close connection 
	$query1->close();
	$query2->close();
	$query3->close();
	$query4->close();
	$query5->close();
	$query6->close();
	$query7->close();
	$query8->close();
	$query9->close();
	$query10->close();
	$query11->close();
	
	$mysqli->close();
?>
</body>
</html>