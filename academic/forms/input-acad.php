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
		width: 60px;
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
<h2>Academic Programs Profile: Input New Record</h2><hr/>
<form id="input_acad_form" method="post" action="save-edited-template.php" onsubmit="return validateForm()">

<?php
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
?>

<table>

<?php
echo "<input name='user_name' type='hidden' value=";
echo $user_name;
echo ">";

$year_cover = $acad_yr + 1;

if  ( $usercu == ''){
echo  "<tr><td><div align='right'>Data for Academic Year</td></div>";
echo  "<td><div align='left'><input name='year_cover' size='4' type='text' value=";
echo $year_cover;
echo  "></div></td></tr>";

  echo "<tr>
    <td><div align='right'>Constituent University</div></td>
    <td><select name='cu' size='1' id='categoriesSelect' required>    
      </select> 
    </td>
  </tr>
  <tr>
    <td><div align='right'>Parent Unit</div></td>
    <td><select name='unit' size='1' id='subcatsSelect' required >    
    </select>
    </td>
  </tr>";
}
else {
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
	foreach($array1 as $option1) : 
echo $option1->short_name;
echo "</div></td>";
echo "<input name='cu' type='hidden' value=";
echo $option1->id;
echo ">";
	endforeach; 	

echo "<tr>
    <td><div align='right'>College</div></td>
    <td><select name='coll_nm' size='1' required>
    <option value=''>Please Select :</option>";
	foreach($array2 as $option2) : 
echo "<option>";
echo $option2->coll_nm;
echo "</option>";
	endforeach; 	
echo"</select></td></tr>";

echo "<tr>
    <td><div align='right'>Department</div></td>
    <td><select name='dept_nm' size='1' required>
    <option value=''>Please Select :</option>";
	foreach($array3 as $option3) : 
echo "<option>";
echo $option3->dept_nm;
echo "</option>";
	endforeach; 	
echo"</select></td></tr>";

echo "<tr>
    <td><div align='right'>Program Title</div></td>
    <td><select name='prog_nm' size='1' required>
    <option value=''>Please Select :</option>";
	foreach($array4 as $option4) : 
echo "<option>";
echo $option4->prog_nm;
echo "</option>";
	endforeach; 	
echo"</select></td></tr>";
}
?>

	<tr>
    	<td><div align="right">UP Discipline</div></td>
    	<td><select name="up_disp" size="1" required>
			<option value="">Please Select :</option>
      		<?php foreach($array6 as $option6) : ?>
      		<option value="<?php echo $option6->up_disp; ?>"><?php echo $option6->up_disp; ?></option>
      		<?php endforeach; ?>
     		</select>
		</td>
	</tr>
	<tr>
    	<td><div align="right">Education Level</div></td>
    	<td><select name="educ_lvl" size="1" id="categoriesSelect1" required></select></td>
	</tr>
	<tr>
    	<td><div align="right">Years to Complete</div></td>
    	<td><select name="prog_len" size="1" id="subcatsSelect1" required></select></td>
	</tr>
	<tr>
    	<td rowspan='3' scope='row'><div align="right">Professional program</br>with corresponding</br>licensure</div></td>
    	<td rowspan='3' scope='row'><select name="prog_prof" size="1" required>
			<option value="">Please Select :</option>
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
			<option value="">Please Select :</option>
      		<?php foreach($array9 as $option9) : ?>
      		<option value="<?php echo $option9->prog_stat; ?>"><?php echo $option9->prog_stat; ?></option>
      		<?php endforeach; ?>
     		</select>
		</td>
	</tr>
    <tr>
	    <td><div align="right">Status Year<br/>(<i>Indicate Year</i>)</div></td>
		<td><input name='prog_stat_yr' type='text' style='text-align:left' value='-'/></td>
	</tr>
    <tr>
    	<td><div align="right">Approving Body</div></td>
	   	<td><textarea name="approv_body" cols="25" rows="3" onkeyup="limit(approv_body)" onblur="limit(approv_body)" required style='text-align:left' >-</textarea></td>
  	</tr>
	<tr>
	    <td><div align="right">Year Granted</div></td>
		<td><input name='yr_grant' type='text' style='text-align:left' value='-'/></td>
    </tr>
	<tr>
    	<td><div align="right">Calendar</div></td>
    	<td><select name="prog_cal" size="1" required>
			<option value="">Please Select :</option>
      		<?php foreach($array10 as $option10) : ?>
      		<option value="<?php echo $option10->prog_cal; ?>"><?php echo $option10->prog_cal; ?></option>
      		<?php endforeach; ?>
     		</select>
		</td>
	</tr>
	<tr>
    	<td><div align="right">Delivery Mode</div></td>
    	<td><select name="prog_del" size="1" required>
			<option value="">Please Select :</option>
      		<?php foreach($array11 as $option11) : ?>
      		<option value="<?php echo $option11->prog_del; ?>"><?php echo $option11->prog_del; ?></option>
      		<?php endforeach; ?>
     		</select>
		</td>
	</tr>
	<tr>
	    <td rowspan='2' scope='row'><div align="right">Total Prescribed<br/>Credit Unit</div></td>
		<td rowspan='2' scope='row'><input name='prog_tot_unit' type='text' required style='text-align:left' value='-' /></td>
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
    <th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" id="button"/>
       <input type="submit" value="Submit" id="button"/>
     </div></th>
</tr>
</table>

</form>
<?php
	//Free result set and close connection 
	$query1->close();
	$query2->close();
	$query3->close();
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