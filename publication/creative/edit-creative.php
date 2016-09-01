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

// get the id from the url
	$cwid = $_GET['id'];

$query = "SELECT year_cover, tbl_cu.id, tbl_cu.short_name, unit, creative_discipline, creative_type, creative_review, creative_title, creative_sub_artist, creative_artist, creative_publisher, creative_editor, creative_cit_dbase, creative_year_published, creative_circ_level, creative_award, creative_keyword, user_name, cwid FROM tbl_creative_main_raw INNER JOIN tbl_cu ON tbl_creative_main_raw.cu = tbl_cu.id WHERE cwid = " . $cwid ;

$record_set = $mysqli->query($query);
$row = $record_set->fetch_assoc();

//Extract the fields.
$year_cover = $row['year_cover'];
$cu1 = $row['id'];
$cu2 = $row['short_name'];
$unit = $row['unit'];
$creative_discipline = $row['creative_discipline'];
$creative_type = $row['creative_type'];
$creative_review = $row['creative_review'];
$creative_title = $row['creative_title'];
$creative_sub_artist = $row['creative_sub_artist'];
$creative_artist = $row['creative_artist'];
$creative_publisher = $row['creative_publisher'];
$creative_editor = $row['creative_editor'];
$creative_cit_dbase = $row['creative_cit_dbase'];
$creative_year_published = $row['creative_year_published'];
$creative_circ_level = $row['creative_circ_level'];
$creative_award = $row['creative_award'];
$creative_keyword = $row['creative_keyword'];

	//get session values
	$usercu = $_SESSION['user_cu'];
	$user_name = $_SESSION['user_name'];

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

//query for design and types
    $query = "SELECT disc_id,discipline FROM tbl_discipline ORDER BY disc_id ASC";
  	$result = $mysqli->query($query);

  	while($row = $result->fetch_assoc()){
    $categories1[] = array("id" => $row['disc_id'], "val" => $row['discipline']);
  	}

  	$query = "SELECT dtid,disc_id,d_type FROM tbl_disc_type ORDER BY d_type ASC";
  	$result = $mysqli->query($query);

  	while($row = $result->fetch_assoc()){
    $subcats1[$row['disc_id']][] = array("id" => $row['d_type'], "val" => $row['d_type']);
  	}

  	$jsonCats1 = json_encode($categories1);
  	$jsonSubCats1 = json_encode($subcats1); 

//Return an error if we have connection issues
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}

	//Query the database for the results we want
	$query1 = $mysqli->query("SELECT id, short_name FROM tbl_cu WHERE id = '$usercu'");
	$query3 = $mysqli->query("SELECT id, CU_id, name FROM tbl_unit WHERE CU_id = '$usercu' ORDER BY name ASC");
	$query5 = $mysqli->query("SELECT * FROM tbl_disc_type WHERE disc_id = '$creative_discipline' ORDER BY d_type ASC");
	$query6 = $mysqli->query("SELECT * FROM `tbl_jur_nonjur`");
	$query7 = $mysqli->query("SELECT * FROM `tbl_place_published`");

	//Create an array of objects for each returned row
	while($array1[] = $query1->fetch_object());
	while($array3[] = $query3->fetch_object());
	while($array5[] = $query5->fetch_object());
	while($array6[] = $query6->fetch_object());
	while($array7[] = $query7->fetch_object());

	//Remove the blank entry at end of array
	array_pop($array1);
	array_pop($array3);
	array_pop($array5);
	array_pop($array6);
	array_pop($array7);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Form</title>

<style>
body {margin:1; font-family:Calibri; font-size:14px;}
</style>

<script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
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
var d = new Date();
var y = d.getFullYear();

function validateForm()
{

var x=document.forms["edit_pub_form"]["cu"].value;
if (x==null || x=="" || x=="Please Select :")
  {
  alert("Please select a campus");
  return false;
  }  

var x=document.forms["edit_pub_form"]["unit"].value;
if (x==null || x=="")
  {
  alert("Please select a unit");
  return false;
  }  

var x=document.forms["edit_pub_form"]["creative_type"].value;
if (x==null || x=="")
  {
  alert("Please enter the creative type");
  return false;
  }  

var x=document.forms["edit_pub_form"]["creative_artist"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of the artist(s)");
  return false;
  }  

var x=document.forms["edit_pub_form"]["creative_title"].value;
if (x==null || x=="")
  {
  alert("Please enter the creative title");
  return false;
  }  

var x=document.forms["edit_pub_form"]["creative_publisher"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of the publisher");
  return false;
  }  

var x=document.forms["edit_pub_form"]["creative_place_published"].value;
if (x==null || x=="")
  {
  alert("Please select where the creative was published");
  return false;
  }  

var x=document.forms["edit_pub_form"]["creative_year_published"].value;
if (x==null || x=="")
  {
  alert("Please enter the year the creative was published");
  return false;
  }  

var x=document.forms["edit_pub_form"]["creative_edition"].value;
if (x==null || x=="")
  {
  alert("Please enter the edition of the creative");
  return false;
  }  

}
</script>

</head>
<body onload='loadCategories()'>
<h2>Creative Work: Edit Record</h2><hr/>

<form name="edit_creative_form" action="save-edited-creative.php" method="post" onsubmit="return validateForm()">
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

<!-- <tr>
    <td><div align="right">Discipline</div></td>
	<td><?php /* echo $creative_discipline */ ?></td>
    <input name="creative_discipline" type="hidden" value="<?php /* print $creative_discipline */ ?>">
</tr> -->

<tr>
    <td><div align="right">Discipline</div></td>
    <td><select name="creative_discipline" size="1" required id="categoriesSelect1">
	<option value="<?php print $creative_discipline; ?>"><?php print $creative_discipline; ?></option>
    </select></td>
    <td><div align="left">Last Selected:<br/><b><?php echo $creative_discipline ?></b></div></td>

</tr>

<tr>
    <td><div align="right">Type</div></td>
    <td><select name="creative_type" size="1" required id="subcatsSelect1">
	<option value="<?php print $creative_type; ?>">Please Select :</option>
      <?php foreach($array5 as $option5) : ?>
    <option value="<?php echo $option5->d_type; ?>"><?php echo $option5->d_type; ?></option>
      <?php endforeach; ?>
    </select></td>
    <td><div align="left">Last Selected:<br/><b><?php echo $creative_type ?></b></div></td>
</tr>

<tr>
    <td><div align="right">Peer Review</div></td>
    <td><select name="creative_review" size="1" required>
	<option value="<?php print $creative_review; ?>"><?php print $creative_review; ?></option>
      <?php foreach($array6 as $option6) : ?>
      <option value="<?php echo $option6->jur_nonjur_choice; ?>"><?php echo $option6->jur_nonjur_choice; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>

<tr>
    <td width="150"><div align="right">Title of Creative Work</div></td>
    <td width="400"><textarea name="creative_title" cols="50" rows="6" onkeyup="limit(creative_title)" onblur="limit(creative_title)" required><?php print $creative_title; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Submitting Artist/Art Scholar<br/>(Unit Personnel</div><div align="right">use 255 char. max)</div></td>
    <td><textarea name="creative_sub_artist" cols="50" rows="6" onkeyup="limit(creative_sub_artist)" onblur="limit(creative_sub_artist)" required><?php print $creative_sub_artist; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Artist(s)/Art Scholar(s)</div><div align="right">(use 255 char. max and<br />separate artists with ";")</div></td>
    <td><textarea name="creative_artist" cols="50" rows="6"  onkeyup="limit(creative_artist)" onblur="limit(creative_artist)" required><?php print $creative_artist; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Publisher(s)</div><div align="right">(use 255 char. max and<br />separate publishers with ";")</div></td>
    <td><textarea name="creative_publisher" cols="50" rows="6" onkeyup="limit(creative_publisher)" onblur="limit(creative_publisher)" required><?php print $creative_publisher; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Editor(s)</div><div align="right">(use 255 char. max and<br />separate editors with ";")</div></td>
    <td><textarea name="creative_editor" cols="50" rows="6" onkeyup="limit(creative_editor)" onblur="limit(creative_editor)" required><?php print $creative_editor; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Citation Database(s)</div><div align="right">(use 255 char. max and<br />separate citation database with ";")</div></td>
    <td><textarea name="creative_cit_dbase" cols="50" rows="6" onkeyup="limit(creative_cit_dbase)" onblur="limit(creative_cit_dbase)"><?php print $creative_cit_dbase; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Year Published</div></td>
    <td><input name="creative_year_published" type="text" value="<?php print $creative_year_published; ?>" size="4" required/></td>
</tr>

<tr>
    <td><div align="right">Circulation Level</div></td>
    <td><select name="creative_circ_level" size="1" required>
    <option value="<?php print $creative_circ_level; ?>"><?php print $creative_circ_level; ?></option>
      <?php foreach($array7 as $option7) : ?>
      <option value="<?php echo $option7->place_published; ?>"><?php echo $option7->place_published; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>

<tr>
    <td><div align="right">Award(s)</div><div align="right">(use 255 char. max and<br />separate awards with ";")</div></td>
    <td><textarea name="creative_award" cols="50" rows="6" onkeyup="limit(creative_award)" onblur="limit(creative_award)"><?php print $creative_award; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Keyword(s)</div><div align="right">(use 255 char. max and<br />separate keywords with ";")</div></td>
    <td><textarea name="creative_keyword" cols="50" rows="6" required><?php print $creative_keyword; ?></textarea></td>
</tr>

  	<tr>
   	<th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" />
       <input type="hidden" name="cwid" value="<?php print $cwid; ?>"><button type="submit">Submit</button>
		</div></th>
    </tr>
</table>
</form>
<?php
	//Free result set and close connection 
	$query1->close();
	$query3->close();
	$query5->close();
	$query6->close();
	$query7->close();
	$mysqli->close();
?>
</body>
</html>