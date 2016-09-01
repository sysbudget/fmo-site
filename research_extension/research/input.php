<?php
session_name("research_extension");
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
	
    $query = "SELECT id,short_name FROM tbl_cu ORDER BY seq_num ASC";
  	$result = $mysqli->query($query);

  	while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['id'], "val" => $row['short_name']);
	}

  	$query = "SELECT id,CU_id,name FROM tbl_unit ORDER BY name ASC";
  	$result = $mysqli->query($query);

  	while($row = $result->fetch_assoc()){
    $subcats[$row['CU_id']][] = array("id" => $row['name'], "val" => $row['name']);
  	}

  	$jsonCats = json_encode($categories);
  	$jsonSubCats = json_encode($subcats); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Form</title>

<style>
body {margin:1; font-family:Calibri; font-size:14px;}
</style>

<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->

<script type="text/javascript">
var maxChar=255;
function limit(obj){
while(obj.value.length>maxChar){
obj.value=obj.value.replace(/.$/,'');//removes the last character
}
}
</script>

    <script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);          
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var catid = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats[catid].length; i++){
          subcatSelect.options[i] = new Option(subcats[catid][i].val,subcats[catid][i].id);
        }
      }
</script>

<link rel="stylesheet" href="../includes/jquery-ui.css" />

<script src="../includes/jquery-1.9.1.js"></script>
<script src="../includes/jquery-ui.js"></script>
<!--<script src="../includes/formvalidator.js"></script>
<script src="checkdate.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />-->

<script type="text/javascript" language="JavaScript">

function validateForm()
{

 var stdate = document.getElementById("start_date");
 var endate = document.getElementById("end_date");

 //Validate the format of the start date
 if(isValidDate(stdate.value)==false){
  return false;
 }
 //Validate the format of the end date
 if(isValidDate(endate.value)==false){
  return false;
 }

 //Validate end date to find out if it is prior to start date
 if(checkEnteredDates(stdate.value,endate.value)==false){
  return false;
 } 
 //Set the values of the hidden variables
 FROMDATE.value= stdate.value;
 TODATE.value= endate.value;
 
 return true;
}

function checkEnteredDates(stdateval,endateval){

//seperate the year,month and day for the first date
 var stryear1 = stdateval.substring(6);
 var strmth1  = stdateval.substring(0,2);
 var strday1  = stdateval.substring(5,3);
 var date1    = new Date(stryear1 ,strmth1 ,strday1);
 
 //seperate the year,month and day for the second date
 var stryear2 = endateval.substring(6);
 var strmth2  = endateval.substring(0,2);
 var strday2  = endateval.substring(5,3);
 var date2    = new Date(stryear2 ,strmth2 ,strday2 );
 
 var datediffval = (date2 - date1 )/864e5;
 
 if(datediffval <= -1){
  alert("Start date must be before the end date");
  return false;
  }

return true;

}

</script>

<script type="text/javascript" language="JavaScript">
function isValidDate(dateStr) {
 
 // Checks for the following valid date formats:
 // MM/DD/YYYY
 // Also separates date into month, day, and year variables
 var datePat = /^(\d{2,2})(\/)(\d{2,2})\2(\d{4}|\d{4})$/;
 
 var matchArray = dateStr.match(datePat); // is the format ok?
 if (matchArray == null) {
  alert("Date must be in MM/DD/YYYY format")
  return false;
 }
 
 month = matchArray[1]; // parse date into variables
 day = matchArray[3];
 year = matchArray[4];
 if (month < 1 || month > 12) { // check month range
  alert("Month must be between 1 and 12");
  return false;
 }
 if (day < 1 || day > 31) {
  alert("Day must be between 1 and 31");
  return false;
 }
 if ((month==4 || month==6 || month==9 || month==11) && day==31) {
  alert("Month "+month+" doesn't have 31 days!")
  return false;
 }
 if (month == 2) { // check for february 29th
  var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
  if (day>29 || (day==29 && !isleap)) {
   alert("February " + year + " doesn't have " + day + " days!");
   return false;
    }
 }
 return true;  // date is valid
}

</script>

<script type="text/javascript" language="JavaScript">
$(function() {
$( "#start_date" ).datepicker();
});

$(function() {
$( "#end_date" ).datepicker();
});
</script>

</head>

<body onload='loadCategories()'>
<h2>Research Project: Input Form</h2><hr/>
<?php
	//get session values
	$usercu = $_SESSION['user_cu'];
	$user_name = $_SESSION['user_name'];
	$acad_yr = $_SESSION['acad_yr'];

	//Query the database for the results we want
	$query1 = $mysqli->query("SELECT id, short_name FROM tbl_cu WHERE id = '$usercu'");
	$query2 = $mysqli->query("SELECT * FROM `tbl_out_imp_ext` ORDER BY out_imp ASC");
	$query3 = $mysqli->query("SELECT id, CU_id, name FROM tbl_unit WHERE CU_id = '$usercu' ORDER BY name ASC");
	$query5 = $mysqli->query("SELECT * FROM `tbl_status`");
	$query6 = $mysqli->query("SELECT * FROM `tbl_rsrch_type` ORDER BY rsrch_type ASC");
	$query7 = $mysqli->query("SELECT * FROM `tbl_interest` ORDER BY interest ASC");
	$query8 = $mysqli->query("SELECT * FROM `tbl_currency`");

	//Create an array of objects for each returned row
	while($array1[] = $query1->fetch_object());
	while($array2[] = $query2->fetch_object());
	while($array3[] = $query3->fetch_object());
	while($array5[] = $query5->fetch_object());
	while($array6[] = $query6->fetch_object());
	while($array7[] = $query7->fetch_object());
	while($array8[] = $query8->fetch_object());
		
	//Remove the blank entry at end of array
	array_pop($array1);
	array_pop($array2);
	array_pop($array3);
	array_pop($array5);
	array_pop($array6);
	array_pop($array7);
	array_pop($array8);
	
?>

<form name="inputForm" action="insert.php" method="post" onsubmit="return validateForm()">
<table>
<!--<td><div align="right"><br />*<strong>required fields</strong></div></td>
<tr></tr>-->
<tr></tr>

<?php
echo "<input name='user_name' type='hidden' value=";
echo $user_name;
echo ">";

$year_cover = $acad_yr;

if  ( $usercu == ''){
echo  "<tr><td><div align='right'>Data for the Year</td></div>";
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
//$year_cover = (date("Y")-1);
echo  "<tr>
    <td><div align='right'>Data for the Year</td></div>";
echo "<td><div align='left'>";
echo $year_cover;
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
    <td><div align='right'>Parent Unit</div></td>
    <td><select name='unit' size='1' required>
    <option value=''>Please Select :</option>";
	foreach($array3 as $option3) : 
echo "<option>";
echo $option3->name;
echo "</option>";
	endforeach; 	
echo"</select></td></tr>";
}
?>
<tr>
    <td width="155"><div align="right">Research Title</div><div align="right">(use 255 char. max)</div></td> 
    <td width="500"><textarea name="rsrch_title" cols="50" rows="6" onkeyup="limit(rsrch_title)" onblur="limit(rsrch_title)" required></textarea></td>
</tr>
<tr>
    <td><div align="right">Status</div></td>
    <td><select name="status" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array5 as $option5) : ?>
      <option value="<?php echo $option5->status; ?>"><?php echo $option5->status; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>
<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
	<strong>Project Duration</strong></div>
	</td>
</tr>
<tr>
    <td><div align="right">Start Date</div></td>
    <td><input name="start_date" type="text" required id="start_date" value="MM/DD/YYYY" size="12"/></td>
</tr>
<tr>
    <td><div align="right">End Date</div></td>
    <td><input name="end_date" type="text" required id="end_date" value="MM/DD/YYYY" size="12"/></td>
</tr>
<tr>
    <td><div align="right">Objective(s) of the<br/>Research Project</div><div align="right">(use 255 char. max)</div></td>
    <td><textarea name="objective" cols="50" rows="6" onkeyup="limit(objective)" onblur="limit(objective)" required></textarea></td>
</tr>
<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
	<strong>Select The Most Appropriate</strong></div>
	</td>
</tr>
<tr>
    <td><div align="right">Research Type</div></td>
    <td><select name="rsrch_type" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array6 as $option6) : ?>
      <option value="<?php echo $option6->rsrch_type; ?>"><?php echo $option6->rsrch_type; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>
<tr>
    <td><div align="right">Main Area of Interest</div></td>
    <td><select name="interest" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array7 as $option7) : ?>
      <option value="<?php echo $option7->interest; ?>"><?php echo $option7->interest; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>
<tr>
    <td><div align="right">Project Impact</div></td>
    <td><select name="out_imp" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array2 as $option2) : ?>
      <option value="<?php echo $option2->out_imp; ?>"><?php echo $option2->out_imp; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>
<tr>
    <td><div align="right">Sponsor(s)</div> <div align="right">(use 255 char. max and <br /> separate sponsors with ";")</div></td>
    <td><textarea name="sponsor" cols="50" rows="6" onkeyup="limit(sponsor)" onblur="limit(sponsor)" required></textarea></td>
</tr>
	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
		<strong>Funding</strong><br /><i>(do not format the values)</i></div>
   	</td>
	</tr>
<tr>
    <td><div align="right">U.P. General Fund</div></td>
    <td><!--
    	<select name="curr_gen_fund" size="1" style="width:55px;">
    	<option value="PHP">PHP Philippine Peso</option>
      	<?php /*
		foreach($array8 as $option8) : ?>
      	<option value="<?php echo $option8->curr_code; ?>"><?php echo $option8->curr_code; echo " "; echo $option8->curr_name?></option>
      	<?php endforeach; 
		*/?>
     	</select>
        -->
     	PHP<input name="curr_gen_fund" type="text" value="PHP" hidden/>
     	<input name="gen_fund" type="text" value=0 />
     </td>
</tr>
<tr>
    <td><div align="right">U.P. Revolving Fund</div></td>
    <td><!--
    	<select name="curr_revolv_fund" size="1" style="width:55px;">
    	<option value="PHP">PHP Philippine Peso</option>
      	<?php /*foreach($array8 as $option8) : ?>
      	<option value="<?php echo $option8->curr_code; ?>"><?php echo $option8->curr_code; echo " "; echo $option8->curr_name?></option>
      	<?php endforeach; 
		*/?>
     	</select>
        -->
      	PHP<input name="curr_revolv_fund" type="text" value="PHP" hidden/>
     	<input name="revolv_fund" type="text" value=0 />
     </td>
</tr>
<tr>
    <td><div align="right">Other Phil. Govt. Fund</div></td>
    <td><!--
    	<select name="curr_oth_fund" size="1" style="width:55px;">
    	<option value="PHP">PHP Philippine Peso</option>
      	<?php /*
		foreach($array8 as $option8) : ?>
      	<option value="<?php echo $option8->curr_code; ?>"><?php echo $option8->curr_code; echo " "; echo $option8->curr_name?></option>
      	<?php endforeach; 
		*/?>
     	</select>
     	-->
      	PHP<input name="curr_oth_fund" type="text" value="PHP" hidden/>
        <input name="other_fund" type="text" value=0 />
     </td>
</tr>
<tr>
    <td><div align="right">National Private Fund</div></td>
    <td><select name="curr_npriv_fund" size="1" style="width:55px;">
    	<option value="PHP">PHP Philippine Peso</option>
      	<?php foreach($array8 as $option8) : ?>
      	<option value="<?php echo $option8->curr_code; ?>"><?php echo $option8->curr_code; echo " "; echo $option8->curr_name ?></option>
      	<?php endforeach; ?>
     	</select>
     	<input name="npriv_fund" type="text" value=0 />
     </td>
</tr>

<tr>
    <td><div align="right">International Private Fund</div></td>
    <td><select name="curr_ipriv_fund" size="1" style="width:55px;">
    	<option value="PHP">PHP Philippine Peso</option>
      	<?php foreach($array8 as $option8) : ?>
      	<option value="<?php echo $option8->curr_code; ?>"><?php echo $option8->curr_code; echo " "; echo $option8->curr_name ?></option>
      	<?php endforeach; ?>
     	</select>
     	<input name="ipriv_fund" type="text" value=0 />
     </td>
</tr>
<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
		<strong>UP Personnel Involved In The Research Project</strong><br />
        <i>(use 255 char. max and separate names with ";")</i></div>
	   	</td>
</tr>
<tr>
    <td><div align="right">Faculty Member(s)</div></td>
    <td><textarea name="faculty"  cols="50" rows="6" onkeyup="limit(faculty)" onblur="limit(faculty)" required></textarea></td>
</tr>
<tr>
    <td><div align="right">REPS</div></td>
    <td><textarea name="reps" cols="50" rows="6" onkeyup="limit(reps)" onblur="limit(reps)"></textarea></td>
</tr>
<tr>
    <td><div align="right">Other Staff</div></td>
    <td><textarea name="other_staff" cols="50" rows="6" onkeyup="limit(other_staff)" onblur="limit(other_staff)"></textarea></td>
</tr>

<tr>
    <th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" />
       <input type="submit"  value="Submit" />
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
	
	$mysqli->close();
?>
</body>
</html>