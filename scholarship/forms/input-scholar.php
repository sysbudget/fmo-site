<?php
				session_name("scholarship"); 
				session_start();
				// is the one accessing this page logged in or not?

				if ( !isset($_SESSION['user_id_scholarship']) || $_SESSION['user_id_scholarship'] !== true) {

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

  	$query = "SELECT id, cu_id, name FROM tbl_coll ORDER BY name ASC";
  	$result = $mysqli->query($query);

  	while($row = $result->fetch_assoc()){
    $subcats[$row['cu_id']][] = array("id" => $row['name'], "val" => $row['name']);
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

<script type='text/javascript'>
function validateForm()
{
var x=document.forms["input_scholar_form"]["scho_nm_list"].value;
var y=document.forms["input_scholar_form"]["scho_nm_alt"].value;

if (y==null || y=="" && x=="-Not Listed-")
  {
  alert("Please enter the name of Scholarship/Fellowship at the space provided if it is -Not Listed-");
  return false;
  }  

if (y!=="" && x!=="-Not Listed-")
  {
  alert("Please select from the list or enter the name of Scholarship/Fellowship at the space provided");
  return false;
  }  
}
</script>

</head>

<body onload='loadCategories()'>
<h2>Scholarships and Fellowships Profile: Input New Record</h2><hr/>

<form id="input_scholar_form" method="post" action="insert-scholar.php" onsubmit="return validateForm()">
<table>

<?php
//get session values
$usercu = $_SESSION['user_cu'];
$user_name = $_SESSION['user_name'];
$acad_yr = $_SESSION['acad_yr'];

//Query the database for the results we want
$query1 = $mysqli->query("SELECT id, short_name FROM `tbl_cu` WHERE id = '$usercu'");
$query2 = $mysqli->query("SELECT id, name, refFunction FROM `tbl_coll` WHERE cu_id = '$usercu' and refFunction <> '8' ORDER BY `name` ASC");
$query3 = $mysqli->query("SELECT id, fund_source FROM `tbl_source` ORDER BY `id` ASC");
$query4 = $mysqli->query("SELECT * FROM `tbl_scho` ORDER BY `scho_nm` ASC");

//Create an array of objects for each returned row
while($array1[] = $query1->fetch_object());
while($array2[] = $query2->fetch_object());
while($array3[] = $query3->fetch_object());
while($array4[] = $query4->fetch_object());
		
//Remove the blank entry at end of array
array_pop($array1);
array_pop($array2);
array_pop($array3);
array_pop($array4);

?>

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
    <td><div align='right'>Recipient <br/>College/Institute</div></td>
    <td><select name='coll_nm' size='1' id='subcatsSelect' required >    
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
	foreach($array1 as $option1) : 
echo $option1->short_name;
echo "</div></td>";
echo "<input name='cu' type='hidden' value=";
echo $option1->id;
echo ">";
	endforeach; 	

echo "<tr>
    <td><div align='right'>Recipient <br/>College/Institute</div></td>
    <td><select name='coll_nm' size='1' required>
    <option value=''>Please Select :</option>";
	foreach($array2 as $option2) : 
echo "<option>";
echo $option2->name;
echo "</option>";
	endforeach; 	
echo"</select></td></tr>";
}
?>

<table border="1" cellpadding="1" cellspacing="0">
	<tr>
    <td colspan="3" scope="col" align="center">Name of Scholarship / Fellowship</td>
	</tr>
    <tr>
    	<td><div align="center">Select From List</div></td>
		<td><div align="center">Input Name If Not Listed</div></td>
    </tr>
    <tr>
    	<td><select name="scho_nm_list" size="1" required>
    	<option value="">Please Select :</option>
    	<?php foreach($array4 as $option4) : ?>
      	<option value="<?php echo $option4->scho_nm; ?>"><?php echo $option4->scho_nm; ?></option>
      	<?php endforeach; ?>
     	</select></td>
	   	<td><textarea name="scho_nm_alt" cols="30" rows="5" onkeyup="limit(scho_nm_alt)" onblur="limit(scho_nm_alt)" ></textarea></td>
    </tr> 

</table>

<table>
	<tr>
    	<td><div align="right">Funding Source</div></td>
    	<td><select name="fund_source" size="1" required>
    	<option value="">Please Select :</option>
    	<?php foreach($array3 as $option3) : ?>
      	<option value="<?php echo $option3->fund_source; ?>"><?php echo $option3->fund_source; ?></option>
      	<?php endforeach; ?>
     	</select></td>
	</tr>

    <tr>
    	<td><div align="right">Sponsor<br/>(<i>Write the fullname of the<br/>sponsor for this scholarship</i>)</div></td>
	   	<td><textarea name="sponsor" cols="50" rows="5" onkeyup="limit(sponsor)" onblur="limit(sponsor)" required></textarea></td>
  	</tr>
	<tr>
    <td colspan='2'><div align="left"><b>Number of Recipients by Education Level</b></div></td>
	</tr>
    <tr>
	<td><div align="right">Pre-Baccalaureate<br/>Certificate/Diploma</div></td>
    <td><input name='pre_bacc' type='text' value=0 /></td>
	</tr>
	<tr>
	<td><div align="right">Baccalaureate</div></td>
    <td><input name='bacc' type='text' value=0 /></td>
	</tr>
	<tr>
	<td><div align="right">Post-Baccalaureate<br/>Certificate/Diploma</div></td>
    <td><input name='post_bacc' type='text' value=0 /></td>
	</tr>
	<tr>
	<td><div align="right">Master's</div></td>
    <td><input name='master' type='text' value=0 /></td>
	</tr>
	<tr>
	<td><div align="right">Doctorate</div></td>
    <td><input name='doctor' type='text' value=0 /></td>
	</tr>
	<tr>
	<td><div align="right">Education Level<br/>Not Indicated</div></td>
    <td><input name='ni' type='text' value=0 /></td>
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
	$query4->close();
	
	$mysqli->close();
?>
</body>
</html>