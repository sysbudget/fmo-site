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

var x=document.forms["input_creative_form"]["unit"].value;
if (x==null || x=="")
  {
  alert("Please select a unit");
  return false;
  }  

var x=document.forms["input_creative_form"]["creative_type"].value;
if (x==null || x=="")
  {
  alert("Please enter the creative type");
  return false;
  }  

var x=document.forms["input_creative_form"]["creative_title"].value;
if (x==null || x=="")
  {
  alert("Please enter the creative title");
  return false;
  }  

var x=document.forms["input_creative_form"]["creative_sub_author"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of the submitting author");
  return false;
  }  

var x=document.forms["input_creative_form"]["creative_author"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of the author(s)");
  return false;
  }  

var x=document.forms["input_creative_form"]["creative_publisher"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of the publisher");
  return false;
  }  

var x=document.forms["input_creative_form"]["creative_editor"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of the editor");
  return false;
  }  

var x=document.forms["input_creative_form"]["creative_year_published"].value;
if (x==null || x=="")
  {
  alert("Please enter the year the creative was published");
  return false;
  }  

var x=document.forms["input_creative_form"]["creative_circ_level"].value;
if (x==null || x=="")
  {
  alert("Please select what is the circulation level");
  return false;
  }  

var x=document.forms["input_creative_form"]["creative_keyword"].value;
if (x==null || x=="")
  {
  alert("Please enter the edition of the creative");
  return false;
  }  

}
</script>

</head>
<body onload='loadCategories()'>
<h2>Creative Work: Input Form</h2><hr/>
<?php
	//get session values
	$usercu = $_SESSION['user_cu'];
	$user_name = $_SESSION['user_name'];
	$acad_yr = $_SESSION['acad_yr'];

	//Query the database for the results we want
	$query1 = $mysqli->query("SELECT id, short_name FROM tbl_cu WHERE id = '$usercu'");
	$query3 = $mysqli->query("SELECT id, CU_id, name FROM tbl_unit WHERE CU_id = '$usercu' ORDER BY name ASC");
	$query5 = $mysqli->query("SELECT * FROM `tbl_jur_nonjur`");
	$query7 = $mysqli->query("SELECT * FROM `tbl_place_published`");

	//Create an array of objects for each returned row
	while($array1[] = $query1->fetch_object());
	while($array3[] = $query3->fetch_object());
	while($array5[] = $query5->fetch_object());
	while($array7[] = $query7->fetch_object());

	//Remove the blank entry at end of array
	array_pop($array1);
	array_pop($array3);
	array_pop($array5);
	array_pop($array7);
?>

<form name="input_creative_form" action="insert-creative.php" method="post" onsubmit="return validateForm()">
<table>

<?php
echo "<td><input name='user_name' type='hidden' value=";
echo $user_name;
echo "></td>";

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
    <td><div align='right'>Unit</div></td>
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
	foreach($array1 as $option1) : 
echo $option1->short_name;
echo "</div></td>";
echo "<input name='cu' type='hidden' value=";
echo $option1->id;
echo ">";
	endforeach; 	

echo "<tr>
    <td><div align='right'>Unit</div></td>
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
    <td><input name="publication_type" type="hidden" value="Creative Work"/></td>
</tr>

<tr>
    <td><div align="right">Discipline</div></td>
    <td><select name="creative_discipline" size="1" id="categoriesSelect1" required></select></td>
</tr>
<tr>
    <td><div align="right">Type</div></td>
    <td><select name="creative_type" size="1" id="subcatsSelect1" required></select></td>
</tr>
  
<tr>
    <td><div align="right">Peer Review</div></td>
    <td><select name="creative_review" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array5 as $option5) : ?>
      <option value="<?php echo $option5->jur_nonjur_choice; ?>"><?php echo $option5->jur_nonjur_choice; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>

<tr>
    <td><div align="right">Title of Creative Work</div><div align="right">(use 255 char. max)</div></td>
    <td><textarea name="creative_title" cols="50" rows="6" onkeyup="limit(creative_title)" onblur="limit(creative_title)" required></textarea></td>
</tr>

<tr>
    <td width="150"><div align="right">Submitting Artist/Art Scholar<br/>(Unit Personnel</div><div align="right">use 255 char. max)</div></td>
    <td width="500"><textarea name="creative_sub_artist" cols="50" rows="6" onkeyup="limit(creative_sub_author)" onblur="limit(creative_sub_author)" required></textarea></td>
</tr>

<tr>
    <td width="150"><div align="right">Artist(s)/Art Scholar(s)</div><div align="right">(use 255 char. max and<br />separate authors with ";")</div></td>
    <td width="500"><textarea name="creative_artist" cols="50" rows="6" onkeyup="limit(creative_author)" onblur="limit(creative_author)" required></textarea></td>
</tr>

<tr>
    <td><div align="right">Publisher(s)</div><div align="right">(use 255 char. max and<br />separate publishers with ";")</div></td>
    <td><textarea name="creative_publisher" cols="50" rows="6" onkeyup="limit(creative_publisher)" onblur="limit(creative_publisher)" required></textarea></td>
</tr>

<tr>
    <td><div align="right">Editor(s)</div><div align="right">(use 255 char. max and<br />separate editors with ";")</div></td>
    <td><textarea name="creative_editor" cols="50" rows="6" onkeyup="limit(creative_editor)" onblur="limit(creative_editor)" required></textarea></td>
</tr>

<tr>
    <td><div align="right">Citation Database(s)</div><div align="right">(use 255 char. max and<br />separate citation database with ";")</div></td>
    <td><textarea name="creative_cit_dbase" cols="50" rows="6" onkeyup="limit(creative_cit_dbase)" onblur="limit(creative_cit_dbase)"></textarea></td>
</tr>

<tr>
    <td><div align="right">Year Published</div></td>
    <td><input name="creative_year_published" type="text" value="" size="4" required="required" /></td>
</tr>

<tr>
    <td><div align="right">Circulation Level</div></td>
    <td><select name="creative_circ_level" size="1" required>
    <option value="">Please Select :</option>
      <?php foreach($array7 as $option7) : ?>
      <option value="<?php echo $option7->place_published; ?>"><?php echo $option7->place_published; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>

<tr>
    <td><div align="right">Award(s)</div><div align="right">(use 255 char. max and<br />separate awards with ";")</div></td>
    <td><textarea name="creative_award" cols="50" rows="6" onkeyup="limit(creative_award)" onblur="limit(creative_award)"></textarea></td>
</tr>

<tr>
    <td><div align="right">Keyword(s)</div><div align="right">(use 255 char. max and<br />separate keywords with ";")</div></td>
    <td><textarea name="creative_keyword" cols="50" rows="6" onkeyup="limit(creative_keyword)" onblur="limit(creative_keyword)" required></textarea></td>
</tr>

<tr>
    <th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" />
       <input type="submit" value="Submit" />
     </div></th>
</tr>
</table>
</form>
<?php
	//Free result set and close connection 
	$query1->close();
	$query3->close();
	$query7->close();
	$mysqli->close();
?>
</body>
</html>