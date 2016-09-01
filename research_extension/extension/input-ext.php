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
<!--<style>
td { border-color: #FFBD32; 
border-style: ridge; }
</style>-->

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
 
 var stdate = document.getElementById("prep_edate");
 var endate = document.getElementById("sign_edate");

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
 //FROMDATE.value= stdate.value;
 //TODATE.value= endate.value;

 var stdate = document.getElementById("sign_edate");
 var endate = document.getElementById("imple_sdate");

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
 //FROMDATE.value= stdate.value;
 //TODATE.value= endate.value;
 
 var stdate = document.getElementById("imple_sdate");
 var endate = document.getElementById("imple_edate");

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
 //FROMDATE.value= stdate.value;
 //TODATE.value= endate.value;

 var stdate = document.getElementById("imple_edate");
 var endate = document.getElementById("close_edate");

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
 //FROMDATE.value= stdate.value;
 //TODATE.value= endate.value;

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
  alert("Proposal date must be before Signing, Implementation and Closeout.\n\nSigning before Implementation and Closeout.\n\nImplementation before Closeout.");
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
$( "#prep_sdate" ).datepicker();
});

$(function() {
$( "#prep_edate" ).datepicker();
});

$(function() {
$( "#sign_sdate" ).datepicker();
});

$(function() {
$( "#sign_edate" ).datepicker();
});

$(function() {
$( "#imple_sdate" ).datepicker();
});

$(function() {
$( "#imple_edate" ).datepicker();
});

$(function() {
$( "#close_edate" ).datepicker();
});

</script>


</head>

<body onload='loadCategories()'>
<h2>Extension Service: Input Form</h2>
<ol>
	<li>For this purpose, Extension Service is counted as a service provided to <u>same</u> group of participant(s)/client(s)
    	<br/>conducted in a single or multiple sessions.</li>
	<li>Encode one(1) Extension Service per input form.  For an Extension Service offered in a series,
    	<br/>affix a batch identifier at the end of the title. - i.e. Community Development - <u>Batch 1</u></li>             
</ol>
<hr/>

<?php
	// connect to the database
    include('../includes/connect-db.php');

	//get session values
	$usercu = $_SESSION['user_cu'];
	$user_name = $_SESSION['user_name'];
	$acad_yr = $_SESSION['acad_yr'];

	//Query the database for the results we want
	
	//Query the database for the results we want
	$query1 = $mysqli->query("SELECT * FROM `tbl_prog_class_ext` ORDER BY `prog_class` ASC");
	$query2 = $mysqli->query("SELECT * FROM `tbl_out_imp_ext` ORDER BY `out_imp` ASC");
	$query3 = $mysqli->query("SELECT * FROM `tbl_client_ext` ORDER BY `client_type` ASC");
	$query5 = $mysqli->query("SELECT * FROM `tbl_status`");
	$query6 = $mysqli->query("SELECT * FROM `tbl_activity_ext` ORDER BY `activity_type` ASC");
	$query7 = $mysqli->query("SELECT * FROM `tbl_interest_ext` ORDER BY `interest_ext` ASC");
	$query8 = $mysqli->query("SELECT * FROM `tbl_currency`");
	$query10 = $mysqli->query("SELECT id, short_name FROM tbl_cu WHERE id = '$usercu'");
	$query11 = $mysqli->query("SELECT id, CU_id, name FROM tbl_unit WHERE CU_id = '$usercu' ORDER BY name ASC");
	$query12 = $mysqli->query("SELECT * FROM `tbl_rank`");

	//Create an array of objects for each returned row
	while($array1[] = $query1->fetch_object());
	while($array2[] = $query2->fetch_object());
	while($array3[] = $query3->fetch_object());
	while($array5[] = $query5->fetch_object());
	while($array6[] = $query6->fetch_object());
	while($array7[] = $query7->fetch_object());
	while($array8[] = $query8->fetch_object());
	while($array10[] = $query10->fetch_object());
	while($array11[] = $query11->fetch_object());
	while($array12[] = $query12->fetch_object());
		
	//Remove the blank entry at end of array
	array_pop($array1);
	array_pop($array2);
	array_pop($array3);
	array_pop($array5);
	array_pop($array6);
	array_pop($array7);
	array_pop($array8);
	array_pop($array10);
	array_pop($array11);
	array_pop($array12);
	
?>

<form name="input_extension_form" action="insert-ext.php" method="post" onsubmit="return validateForm()">
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
	foreach($array10 as $option10) : 
echo $option10->short_name;
echo "</div></td>";
echo "<input name='cu' type='hidden' value=";
echo $option10->id;
echo ">";
	endforeach; 	

/*echo "<tr>
    <td><div align='right'>Constituent University</div></td>
    <td><select name='cu' size='1' required>";
	foreach($array10 as $option10) : 
echo "<option value =";
echo $option10->id; 
echo ">";
echo $option10->short_name;
echo "</option>";
	endforeach; 	
echo"</select></td></tr>";*/

echo "<tr>
    <td><div align='right'>Parent Unit</div></td>
    <td><select name='unit' size='1' required>
    <option value=''>Please Select :</option>";
	foreach($array11 as $option11) : 
echo "<option>";
echo $option11->name;
echo "</option>";
	endforeach; 	
echo"</select></td></tr>";
}
?>  
<tr>
    <td width="155"><div align="right">Extension Title</div><div align="right">(use 255 char. max)</div></td>
    <td width="500"><textarea name="extension_title" cols="50" rows="6" onkeyup="limit(extension_title)" onblur="limit(extension_title)" required></textarea></td>
</tr>
</table>

<table>
<tr>
	<th width="155" align="right">Status</th>
	<td width"100" align="center">Proposal<br/>Preparation</td>
	<td width"100" align="center">MOU/MOA<br/>Signing or<br/>Equivalent</td>
	<td width"100" align="center">Actual<br/>Implementation</td>
	<td width"100" align="center">Closeout</td>

</tr>
<tr>
    <td><div align="right">From:</div></td>
    <td></td>
    <td></td>
    <td><input name="imple_sdate" type="text" required id="imple_sdate" value="MM/DD/YYYY" size="12"/></td>
    <td></td>
</tr>
<tr>
    <td><div align="right">To:</div></td>
    <td><input name="prep_edate" type="text" required id="prep_edate" value="MM/DD/YYYY" size="12"/></td>
    <td><input name="sign_edate" type="text" required id="sign_edate" value="MM/DD/YYYY" size="12"/></td>
    <td><input name="imple_edate" type="text" required id="imple_edate" value="MM/DD/YYYY" size="12"/></td>
    <td><input name="close_edate" type="text" required id="close_edate" value="MM/DD/YYYY" size="12"/></td>
</tr>
<tr>
   	<td><div align="right">Total Number of Session(s)</div></td>
	<td></td>
	<td></td>
   	<td><input name="num_session" type="text" value=0 size="12" required /></td>
	<td></td>
</tr>
<tr>
   	<td><div align="right">Total Number of<br/>Hours Per Session</div></td>
	<td></td>
	<td></td>
   	<td><input name="hrs_session" type="text" value=0 size="12" required /></td>
	<td></td>
</tr>

</table>

<table>
<!--
<tr>
    <td><div align="right">Status</div></td>
    <td><select name="status" size="1" required>
    <option value="">Please Select :</option>
      <?php /*
	  foreach($array5 as $option5) : ?>
      <option value="<?php echo $option5->status; ?>"><?php echo $option5->status; ?></option>
      <?php endforeach; 
	  */ ?>
     </select></td>
</tr>

<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
	Project Duration</div>
	</td>
</tr>

<tr>
    <td><div align="right">Start Date </div></td>
    <td><input name="start_date" type="text" required id="start_date" value="MM/DD/YYYY" size="10"/> </td>
</tr>

<tr>
    <td><div align="right">End Date</div></td>
    <td><input name="end_date" type="text" required id="end_date" value="MM/DD/YYYY" size="10"/></td>
</tr>
<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
	Number of Actual Training Days Given <br /> During the Duration of the Extension Service</div>
	</td>
</tr>

<tr>
	<td><div align="right">Training Days</div></td>
    <td><input name="tot_train_days" type="text" value=0 size="10" required /></td>
</tr>
-->

<tr>
    <td width="155"><div align="right">Objective(s) of the<br/>Extension Service</div><div align="right">(use 255 char. max)</div></td>
    <td width="500"><textarea name="objective" cols="50" rows="6" onkeyup="limit(objective)" onblur="limit(objective)" required></textarea></td>
</tr>

<tr>
	<tr></tr>
    <td></td>
   	<td colspan="2" scope="row"><div align="left">
	<strong>Select The Most Appropriate</strong></div>
	</td>
</tr>

<tr>
    <td><div align="right">Service Impact</div></td>
    <td><select name="out_imp" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array2 as $option2) : ?>
      <option value="<?php echo $option2->out_imp; ?>"><?php echo $option2->out_imp; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>
<tr>
    <td><div align="right">Main Area of Interest</div></td>
    <td><select name="interest_ext" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array7 as $option7) : ?>
      <option value="<?php echo $option7->interest_ext; ?>"><?php echo $option7->interest_ext; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>
<tr>
    <td><div align="right">Program Classification</div></td>
    <td><select name="prog_class" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array1 as $option1) : ?>
      <option value="<?php echo $option1->prog_class; ?>"><?php echo $option1->prog_class; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>
<tr>
    <td><div align="right">Main/Major Activity</div></td>
    <td><select name="activity_type" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array6 as $option6) : ?>
      <option value="<?php echo $option6->activity_type; ?>"><?php echo $option6->activity_type; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>
<tr>
	<tr></tr>
    <td></td>
    <td colspan="2" scope="row"><div align="left">
	<strong>Participant/Beneficiaries</strong></div>
	</td>
</tr>
<tr>
    <td><div align="right">Sector</div></td>
    <td><select name="client_type" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array3 as $option3) : ?>
      <option value="<?php echo $option3->client_type; ?>"><?php echo $option3->client_type; ?></option>
      <?php endforeach; ?>
     </select></td>
<tr>
   <td><div align="right">Number of Participant(s)</div></td>
   <td><input name="client_count" type="text" value=1 size="12" required /></td>
</tr>
<tr>
    <td><div align="right">Sponsor(s)</div> <div align="right">(use 255 char. max and <br /> separate sponsors with ";")</div></td>
    <td><textarea name="sponsor" cols="50" rows="6" onkeyup="limit(sponsor)" onblur="limit(sponsor)" required></textarea></td>
</tr>
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
      	<?php /*
		foreach($array8 as $option8) : ?>
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
		<strong>UP Personnel Involved in the Extension Service</strong><br />
        <i>(use 255 char. max and separate names with ";")</i></div>
	   	</td>
</tr>

<tr>
    <td><div align="right">Faculty Member(s)</div></td>
    <td><textarea name="faculty" cols="50" rows="6" onkeyup="limit(faculty)" onblur="limit(faculty)" required></textarea></td>
</tr>
<tr>
    <td><div align="right">REPS</div></td>
    <td><textarea name="reps" cols="50" rows="6" onkeyup="limit(reps)" onblur="limit(reps)"></textarea></td>
</tr>
<tr>
    <td><div align="right">Other Staff</div></td>
    <td><textarea name="other_staff" cols="50" rows="6" onkeyup="limit(other_staff)" onblur="limit(other_staff)"></textarea></td>
</tr>
</table>

<br/>

<table border="1" cellpadding="1" cellspacing="0">
      <th width="160" align="center" >Average Rating by Participant(s) at Closeout</th>
	  <td width="100" align="center" >Adjective Ranking</td>
	  <td width="100" align="center">Center-Weight</td>
	  <td width="100" align="center">Range</td>
	  <td width="100" align="center">Out of Ten</td>
<tr>
      <?php foreach($array12 as $option12) : ?>
      <tr><td align="center"><input type="radio" name="adj_ladder" required value="<?php echo $option12->adj_ladder; ?>"></td>
      <td align="center"><?php echo $option12->adj_ladder; ?></td>
      <td align="center"><?php echo $option12->c_weight; ?></td>
      <td align="center"><?php echo $option12->rank_range; ?></td>
      <td align="center"><?php echo $option12->out_of_ten; ?></td>
      </tr>
      <?php endforeach; ?>
</tr>
</table>

<br/>

<table>
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
	$query10->close();
	$query11->close();
	$query12->close();
	
	$mysqli->close();
?>
</body>
</html>