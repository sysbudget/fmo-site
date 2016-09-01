<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>GASS</title>

<style>
body {margin:1; font-family:Calibri; font-size:14px;}
div.tabs {font-family:calibri; font-size:14px; padding-left:5px;}
</style>

<link rel="stylesheet" href="../includes/jquery-ui.css">
<script src="../includes/jquery-1.9.1.js"></script>
<script src="../includes/jquery-ui.js"></script>

<script type="text/javascript">
var maxChar=255;
function limit(obj){
while(obj.value.length>maxChar){
obj.value=obj.value.replace(/.$/,'');//removes the last character
}
}
</script>

<script type="text/javascript" language="JavaScript">
function validateForm()
{
  //Check number of trainees and request acted upon
	var y = document.inputForm.request_count.value;
	var z = document.inputForm.request_acted.value;
	if (y < z)
	{
        alert("The number of request acted within 3 days can not be more than the request count!");
		document.inputForm.request_count.value = 0;
		document.inputForm.request_acted.value = 0;
        return false;
	}

 //Date Checker
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

//Check if whole number//
function checkban(obj)
{
    var x = obj.value;
    if ((x%1) != 0) 
    {
		obj.value=obj.value.replace(/.$/,'');
        alert("Please input a whole number!");
        return false;
    }
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
<body>

<h2>MFO4: Training/Extension Services - Input Form</h2>
<a href="training_view_all.php">View All Records</a>
<hr/>

<form name="inputForm" action="training_insert.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
<div class="tabs" id="tabs">
  <ul>
    <li><a href="#fragment-1"><span>One</span></a></li>
    <li><a href="#fragment-2"><span>Two</span></a></li>
    <li><a href="#fragment-3"><span>Three</span></a></li>
  </ul>

<!-- Tab 1 -->
 <div id="fragment-1">

<table>

<tr>
   	<td width="155"><div align="right">
	<strong>Extension Service</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Title</div><div align="right"></div></td> 
    <td width="500"><textarea name="ext_title" cols="50" rows="6" onkeyup="limit(ext_title)" onblur="limit(ext_title)" required></textarea></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(use 255 char. max.)</i><br/></div>
	   	</td>
</tr>

<tr>
    <td width="155"><div align="right">Venue</div><div align="right"></div></td> 
    <td width="500"><textarea name="ext_venue" cols="50" rows="6" onkeyup="limit(ext_venue)" onblur="limit(ext_venue)" required></textarea></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(use 255 char. max.)</i><br/></div>
	   	</td>
</tr>

<tr>
    <td width="155"><div align="right">Duration</div><div align="right"></div></td> 
    <td width="500"><textarea name="ext_duration" cols="50" rows="6" onkeyup="limit(ext_duration)" onblur="limit(ext_duration)" required></textarea></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(As officially stated in the certificate)</i><br/></div>
	   	</td>
</tr>

<tr>
    <td width="155"><div align="right">Date Started</div></td>
    <td width="500"><input name="start_date" type="text" required id="start_date" value="" size="11"/></td>
</tr>

	<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar)</i><br/></div>
	   	</td>
	</tr>

<tr>
    <td width="155"><div align="right">Request Mode</div></td>
 	<td width="500">
    <input type="radio" name="request_mode" checked <?php if (isset($request_mode) && $request_mode=="Informal/Oral") echo "checked";?>  value="Informal/Oral">Informal/Oral
   	<input type="radio" name="request_mode" <?php if (isset($request_mode) && $request_mode=="Formal/Written") echo "checked";?>  value="Formal/Written">Formal/Written
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Requester</div></td>
 	<td width="500">
    <input type="radio" name="requester" checked <?php if (isset($requester) && $requester=="Head of Agency") echo "checked";?>  value="Head of Agency">Head of Agency
   	<input type="radio" name="requester" <?php if (isset($requester) && $requester=="Scheduled") echo "checked";?>  value="Scheduled">Scheduled
    <input type="radio" name="requester" <?php if (isset($requester) && $requester=="Individual") echo "checked";?>  value="Individual">Individual
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Request Count</div></td>
    <td width="500"><input name="request_count" type="text" required id="request_count" value=0 size="11" onkeyup="checkban(request_count)" onblur="checkban(request_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Number of Requests<br/>Acted Within 3 Days</div></td>
    <td width="500"><input name="request_acted" type="text" required id="request_acted" value=0 size="11" onkeyup="checkban(request_acted)" onblur="checkban(request_acted)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Number of Trainees</div></td>
    <td width="500"><input name="trainees_count" type="text" required id="trainees_count" value=0 size="11" onkeyup="checkban(trainees_count)" onblur="checkban(trainees_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Number of Training Hours</div></td>
    <td width="500"><input name="training_hours" type="text" required id="training_hours" value=0 size="11" onkeyup="checkban(training_hours)" onblur="checkban(training_hours)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Attachment</div></td>
    <td width="500"><input name="attach_ext_service_req" type="text" required id="attach_ext_service_req" value="" size="49"/></td>
</tr>

<tr>
		<td>
        </td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Extension Service Request (Filename))</i><br/></div>
	   	</td>
</tr>

<tr>
    <td width="155"><div align="right">Survey Conducted</div></td>
 	<td width="500">
    <input type="radio" name="survey_conducted" checked <?php if (isset($survey_conducted) && $survey_conducted=="Yes") echo "checked";?>  value="Y">Yes
   	<input type="radio" name="survey_conducted" <?php if (isset($survey_conducted) && $survey_conducted=="No") echo "checked";?>  value="N">No
	</td>
</tr>
</table>
  </div>

<!-- Tab 2 -->
  <div id="fragment-2">
<table>
<tr>
   	<td width="155"><div align="right">
	<strong>Rating Survey</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Conducted</div></td>
 	<td width="500">
    <input type="radio" name="rating_conducted" checked <?php if (isset($rating_conducted) && $rating_conducted=="Y") echo "checked";?>  value="Y">Yes
   	<input type="radio" name="rating_conducted" <?php if (isset($rating_conducted) && $rating_conducted=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Mode</div></td>
 	<td width="500">
    <input type="radio" name="rating_mode" checked <?php if (isset($rating_mode) && $rating_mode=="Conventional") echo "checked";?>  value="Conventional">Conventional
   	<input type="radio" name="rating_mode" <?php if (isset($rating_mode) && $rating_mode=="Online") echo "checked";?>  value="Online">Online
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Size</div></td>
    <td width="500"><input name="rating_survey_size" type="text" required id="rating_survey_size" value=0 size="11" onkeyup="checkban(rating_survey_size)" onblur="checkban(rating_survey_size)" /></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Number of Clients who Rate the Training as</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">No Answer Count on Rating</div></td>
    <td width="500"><input name="no_rating_count" type="text" required id="no_rating_count" value=0 size="11" onkeyup="checkban(no_rating_count)" onblur="checkban(no_rating_count)" /></td>
</tr>

<tr>
    <td><div align="right">Poor Count on Rating</div></td>
    <td><input name="poor_rating_count" type="text" required id="poor_rating_count" value=0 size="11" onkeyup="checkban(poor_rating_count)" onblur="checkban(poor_rating_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Good Count on Rating</div></td>
    <td width="500"><input name="good_rating_count" type="text" required id="good_rating_count" value=0 size="11" onkeyup="checkban(good_rating_count)" onblur="checkban(good_rating_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Better Count on Rating</div></td>
    <td width="500"><input name="better_rating_count" type="text" required id="better_rating_count" value=0 size="11" onkeyup="checkban(better_rating_count)" onblur="checkban(better_rating_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Best Count on Rating</div></td>
    <td width="500"><input name="best_rating_count" type="text" required id="best_rating_count" value=0 size="11" onkeyup="checkban(best_rating_count)" onblur="checkban(best_rating_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Attachment</div></td>
    <td width="500"><input name="attach_rating_sample" type="text" required id="attach_rating_sample" value="" size="49"/></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(An Accomplished Extension Service Rating Survey Form Sample (Filename))</i><br/></div>
	   	</td>
</tr>
</table>
  </div>

<!-- Tab 3 -->
  <div id="fragment-3">
<table>
<tr>
   	<td width="155"><div align="right">
	<strong>Timelines Survey</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Conducted</div></td>
 	<td width="500">
    <input type="radio" name="timeliness_conducted" checked <?php if (isset($timeliness_conducted) && $timeliness_conducted=="Y") echo "checked";?>  value="Y">Yes
    <input type="radio" name="timeliness_conducted" <?php if (isset($timeliness_conducted) && $timeliness_conducted=="N") echo "checked";?>  value="N">No
	</td>
</tr>

<tr>
    <td width="155"><div align="right">Size</div></td>
    <td width="500"><input name="timeliness_survey_size" type="text" required id="timeliness_survey_size" value=0 size="11" onkeyup="checkban(timeliness_survey_size)" onblur="checkban(timeliness_survey_size)" /></td>
</tr>

<tr>
   	<td width="155"><div align="right">
	<strong>Number of Clients Trained who Rate Timeliness of Training as</strong></div>
	</td>
</tr>

<tr>
    <td width="155"><div align="right">No Answer Count on Timeliness</div></td>
    <td width="500"><input name="no_timeliness_count" type="text" required id="no_timeliness_count" value=0 size="11" onkeyup="checkban(no_timeliness_count)" onblur="checkban(no_timeliness_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Poor Count on Timeliness</div></td>
    <td width="500"><input name="poor_timeliness_count" type="text" required id="poor_timeliness_count" value=0 size="11" onkeyup="checkban(poor_timeliness_count)" onblur="checkban(poor_timeliness_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Good Count on Timeliness</div></td>
    <td width="500"><input name="good_timeliness_count" type="text" required id="good_timeliness_count" value=0 size="11" onkeyup="checkban(good_timeliness_count)" onblur="checkban(good_timeliness_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Better Count on Timeliness</div></td>
    <td width="500"><input name="better_timeliness_count" type="text" required id="better_timeliness_count" value=0 size="11" onkeyup="checkban(better_timeliness_count)" onblur="checkban(better_timeliness_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Best Count on Timeliness</div></td>
    <td width="500"><input name="best_timeliness_count" type="text" required id="best_timeliness_count" value=0 size="11" onkeyup="checkban(best_timeliness_count)" onblur="checkban(best_timeliness_count)" /></td>
</tr>

<tr>
    <td width="155"><div align="right">Attachment</div></td>
    <td width="500"><input name="attach_timeliness_sample" type="text" required id="attach_timeliness_sample" value="" size="49"/></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(An Accomplished Extension Service Timeliness Survey Form Sample (Filename))</i><br/></div>
	   	</td>
</tr>

<tr>
    <td width="155"><div align="right">Attachment</div></td>
    <td width="500"><input name="attach_tally_sheet" type="text" required id="attach_tally_sheet" value="" size="49"/></td>
</tr>

<tr>
		<tr></tr>
        <td></td>
    	<td colspan="2" scope="row"><div align="left">
        <i>(Extension Service Survey Tally Sheets Endorsed by the Unit Head (Filename))</i><br/></div>
	   	</td>
</tr>
<!--
<tr>
    <th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" />
       <input type="submit" name="submit" value="Submit"/>
     </div></th>
</tr>
-->
</table>
  </div>
       <input type="reset" value="Clear" />
       <input type="submit" name="submit" value="Submit"/>

</form> 

<script>
$( "#tabs" ).tabs();
</script>
 
</body>
</html>