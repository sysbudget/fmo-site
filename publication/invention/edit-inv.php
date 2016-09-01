<?php
				session_name("publication"); 
				session_start();
				// is the one accessing this page logged in or not?

				if ( !isset($_SESSION['user_id_publication']) || $_SESSION['user_id_publication'] !== true) {

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


//Return an error if we have connection issues
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}
// get the id from the url
	$invid = $_GET['id'];

$query = "SELECT year_cover, tbl_cu.id, tbl_cu.short_name, unit, inv_sub_inventor, inv_inventor, inv_invention, inv_applied, inv_patented, inv_commercial, inv_adopted, inv_patent_num, inv_date_issue, inv_development, inv_service, inv_end_product, inv_product_name, inv_award, inv_keyword, user_name, invid FROM tbl_invention_main_raw INNER JOIN tbl_cu ON tbl_invention_main_raw.cu = tbl_cu.id WHERE invid = " . $invid ;

$record_set = $mysqli->query($query);
$row = $record_set->fetch_assoc();

//Extract the fields.
$year_cover = $row['year_cover'];
$cu1 = $row['id'];
$cu2 = $row['short_name'];
$unit = $row['unit'];
$inv_sub_inventor = $row['inv_sub_inventor'];
$inv_inventor = $row['inv_inventor'];
$inv_invention = $row['inv_invention'];
$inv_applied = $row['inv_applied'];
$inv_patented = $row['inv_patented'];
$inv_commercial = $row['inv_commercial'];
$inv_adopted = $row['inv_adopted'];
$inv_patent_num = $row['inv_patent_num'];
$start_date = strtotime($row['inv_date_issue']);
$inv_development = $row['inv_development'];
$inv_service = $row['inv_service'];
$inv_end_product = $row['inv_end_product'];
$inv_product_name = $row['inv_product_name'];
$inv_award = $row['inv_award'];
$inv_keyword = $row['inv_keyword'];

	//get session values
	$usercu = $_SESSION['user_cu'];
	$user_name = $_SESSION['user_name'];

	//Query the database for the results we want
	$query1 = $mysqli->query("SELECT id, short_name FROM tbl_cu WHERE id = '$usercu'");
	$query3 = $mysqli->query("SELECT id, CU_id, name FROM tbl_unit WHERE CU_id = '$usercu' ORDER BY name ASC");

	//Create an array of objects for each returned row
	while($array1[] = $query1->fetch_object());
	while($array3[] = $query3->fetch_object());

	//Remove the blank entry at end of array
	array_pop($array1);
	array_pop($array3);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Form</title>

<style>
body {margin:1; font-family:Calibri; font-size:14px;}
</style>

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

<script type="text/javascript">
var maxChar=255;
function limit(obj){
while(obj.value.length>maxChar){
obj.value=obj.value.replace(/.$/,'');//removes the last character
}
}
</script>

<script type='text/javascript'>
var d = new Date();
var y = d.getFullYear();

function validateForm()
{

var x=document.forms["edit_inv_form"]["cu"].value;
if (x==null || x=="" || x=="Please Select :")
  {
  alert("Please select a campus");
  return false;
  }  

var x=document.forms["edit_inv_form"]["unit"].value;
if (x==null || x=="")
  {
  alert("Please select a unit");
  return false;
  }  

var x=document.forms["edit_inv_form"]["inv_sub_inventor"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of submitting inventor");
  return false;
  }  

var x=document.forms["edit_inv_form"]["inv_inventor"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of inventor");
  return false;
  }  

var x=document.forms["edit_inv_form"]["inv_invention"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of invention");
  return false;
  }  

var x=document.forms["edit_inv_form"]["inv_patent_num"].value;
if (x==null || x=="")
  {
  alert("Please enter the patent number");
  return false;
  }  

var x=document.forms["edit_inv_form"]["inv_product_name"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of commercial product");
  return false;
  }  

}
</script>

<link rel="stylesheet" href="../includes/jquery-ui.css" />

<script src="../includes/jquery-1.9.1.js"></script>
<script src="../includes/jquery-ui.js"></script>

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
<h2>Invention: Edit Record</h2><hr/>

<form name="edit_inv_form" action="save-edited-inv.php" method="post" onsubmit="return validateForm()">
<table>
<?php
echo "<td><input name='user_name' type='hidden' value=";
echo $user_name;
echo "></td>";

if  ( $usercu == ''){
echo  "<tr><td><div align='right'>Data for the Year</td></div>";
echo  "<td><div align='left'><input name='year_cover' size='4' type='text' value=";
echo $year_cover;
echo  "></div></td></tr>";

echo "<tr>
    <td><div align='right'>Constituent University</div></td>
    <td><select name='cu' size='1' id='categoriesSelect' required>    
      </select> 
    </td>";
echo "<td>Last Selected : ";
echo $cu2;
echo "</td></tr>";  
echo"
  <tr>
    <td><div align='right'>Unit</div></td>
    <td><select name='unit' size='1' id='subcatsSelect' required >    
    </select>
    </td>";
echo "<td>Last Selected : ";
echo $unit;
echo "</td>";	
echo "</tr>";
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
echo $cu2;
echo "</div></td>";
echo "<input name='cu' type='hidden' value=";
echo $cu1;
echo ">";

echo "<tr>
    <td><div align='right'>Unit</div></td>
    <td><select name='unit' size='1' required>";
echo "<option value=";
print "'$unit'";
echo ">";
print $unit;
echo "</option>";
	foreach($array3 as $option3) : 
echo "<option>";
echo $option3->name;
echo "</option>";
	endforeach; 	
echo"</select></td></tr>"; 
}
?>
<tr>
    <td width="150"><div align="right">Product Invented</div><div align="right">(use 255 char. max)</div></td>
    <td width="500"><textarea name="inv_invention" cols="50" rows="6" onkeyup="limit(inv_invention)" onblur="limit(inv_invention)" required><?php print $inv_invention; ?></textarea></td>
</tr>

<tr>
    <td width="150"><div align="right">Submitting Inventor<br/>(Unit Personnel</div><div align="right">use 255 char. max)</div></td>
    <td><textarea name="inv_sub_inventor" cols="50" rows="6" onkeyup="limit(inv_sub_inventor)" onblur="limit(inv_sub_inventor)" required><?php print $inv_sub_inventor; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Inventor(s)</div><div align="right">(use 255 char. max and<br />separate inventors with ";")</div></td>
    <td><textarea name="inv_inventor" cols="50" rows="6" onkeyup="limit(inv_inventor)" onblur="limit(inv_inventor)" required><?php print $inv_inventor; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Status</div></td>
    <?php
    if ($inv_applied == "Yes") {
	echo "<td><input type='checkbox' name='inv_applied' value='Yes' checked> Applied for Patenting</td>";
	}
	else
	{
	echo "<td><input type='checkbox' name='inv_applied' value='Yes'> Applied for Patenting</td>";
	}
	?>
</tr>

<tr>
    <td></td>
    <?php
	if ($inv_patented == "Yes") {
    echo "<td><input type='checkbox' name='inv_patented' value='Yes' checked> Patented</td>";
	}
	else
	{
    echo "<td><input type='checkbox' name='inv_patented' value='Yes'> Patented</td>";
	}
	?>
</tr>

<tr>
    <td></td>
    <?php
	if ($inv_commercial == "Yes") {
    echo "<td><input type='checkbox' name='inv_commercial' value='Yes' checked> Commercialized</td>";
	}
	else
	{
    echo "<td><input type='checkbox' name='inv_commercial' value='Yes'> Commercialized</td>";
	}
	?>
</tr>

<tr>
    <td></td>
    <?php
	if ($inv_adopted == "Yes") {
    echo "<td><input type='checkbox' name='inv_adopted' value='Yes' checked> Adopted by Industry</td>";
	}
	else
	{
    echo "<td><input type='checkbox' name='inv_adopted' value='Yes'> Adopted by Industry</td>";
	}
	?>
</tr>

<tr>
    <td><div align="right">Patent Number</div></td>
    <td><input name="inv_patent_num" type="text" value="<?php print $inv_patent_num; ?>" size="49" required/></td>
</tr>

<tr>
    <td><div align="right">Date of Issue</div></td>
    <td><input name="start_date" type="text" id="start_date" value="<?php print date("m/d/Y",$start_date); ?>" size="10" required/></td>
</tr>

<tr>
    <td><div align="right">Utilization of Invention</div></td>
    <?php
    if ($inv_development == "Yes") {
	echo "<td><input type='checkbox' name='inv_development' value='Yes' checked> Development</td>";
	}
	else
	{
	echo "<td><input type='checkbox' name='inv_development' value='Yes'> Development</td>";
	}
	?>
</tr>

<tr>
    <td></td>
    <?php
	if ($inv_service == "Yes") {
    echo "<td><input type='checkbox' name='inv_service' value='Yes' checked> Service</td>";
	}
	else
	{
    echo "<td><input type='checkbox' name='inv_service' value='Yes'> Service</td>";
	}
	?>
</tr>

<tr>
    <td></td>
    <?php
	if ($inv_end_product == "Yes") {
    echo "<td><input type='checkbox' name='inv_end_product' value='Yes' checked> End-Product</td>";
	}
	else
	{
    echo "<td><input type='checkbox' name='inv_end_product' value='Yes'> End-Product</td>";
	}
	?>
</tr>

<tr>
    <td><div align="right">Name of Commmercial Product</div><div align="right">(use 255 char. max)</div></td>
    <td><textarea name="inv_product_name" cols="50" rows="6" onkeyup="limit(inv_product_name)" onblur="limit(inv_produc_name)" required><?php print $inv_product_name; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Award(s) Received</div><div align="right">(use 255 char. max and<br />separate awards with ";")</div></td>
    <td><textarea name="inv_award" cols="50" rows="6" onkeyup="limit(inv_award)" onblur="limit(inv_award)"><?php print $inv_award; ?></textarea></td>
</tr>

<tr>
    <td width="150"><div align="right">Keyword(s)</div><div align="right">(use 255 char. max and<br />separate keywords with ";")</div></td>
    <td width="500"><textarea name="inv_keyword" cols="50" rows="6" onkeyup="limit(inv_keyword)" onblur="limit(inv_keyword)"><?php print $inv_keyword; ?></textarea></td>
</tr>

 	<tr>
   	<th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" />
       <input type="hidden" name="invid" value="<?php print $invid; ?>"><button type="submit">Submit</button>
		</div></th>
    </tr>
</table>
</form>
<?php
	//Free result set and close connection 
	$query1->close();
	$query3->close();
	$mysqli->close();
?>
</body>
</html>