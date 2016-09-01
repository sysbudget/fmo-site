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
	$bid = $_GET['id'];

$query = "SELECT year_cover, tbl_cu.id, tbl_cu.short_name, unit, book_category, book_title, book_sub_author, book_author, book_publisher, book_editor, book_cit_dbase, book_year_published, book_edition, book_num_pages, book_isbn, book_circ_level, book_keyword, user_name, bid FROM tbl_book_main_raw INNER JOIN tbl_cu ON tbl_book_main_raw.cu = tbl_cu.id WHERE bid = " . $bid ;

$record_set = $mysqli->query($query);
$row = $record_set->fetch_assoc();

//Extract the fields.
$year_cover = $row['year_cover'];
$cu1 = $row['id'];
$cu2 = $row['short_name'];
$unit = $row['unit'];
$book_category = $row['book_category'];
$book_title = $row['book_title'];
$book_sub_author = $row['book_sub_author'];
$book_author = $row['book_author'];
$book_publisher = $row['book_publisher'];
$book_editor = $row['book_editor'];
$book_cit_dbase = $row['book_cit_dbase'];
$book_year_published = $row['book_year_published'];
$book_edition = $row['book_edition'];
$book_num_pages = $row['book_num_pages'];
$book_isbn = $row['book_isbn'];
$book_circ_level = $row['book_circ_level'];
$book_keyword = $row['book_keyword'];

	//get session values
	$usercu = $_SESSION['user_cu'];
	$user_name = $_SESSION['user_name'];

	//Query the database for the results we want
	$query1 = $mysqli->query("SELECT id, short_name FROM tbl_cu WHERE id = '$usercu'");
	$query3 = $mysqli->query("SELECT id, CU_id, name FROM tbl_unit WHERE CU_id = '$usercu' ORDER BY name ASC");
	$query5 = $mysqli->query("SELECT * FROM `tbl_ref_unref`");
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

var x=document.forms["edit_pub_form"]["book_type"].value;
if (x==null || x=="")
  {
  alert("Please enter the book type");
  return false;
  }  

var x=document.forms["edit_pub_form"]["book_author"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of the author(s)");
  return false;
  }  

var x=document.forms["edit_pub_form"]["book_title"].value;
if (x==null || x=="")
  {
  alert("Please enter the book title");
  return false;
  }  

var x=document.forms["edit_pub_form"]["book_publisher"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of the publisher");
  return false;
  }  

var x=document.forms["edit_pub_form"]["book_place_published"].value;
if (x==null || x=="")
  {
  alert("Please select where the book was published");
  return false;
  }  

var x=document.forms["edit_pub_form"]["book_year_published"].value;
if (x==null || x=="")
  {
  alert("Please enter the year the book was published");
  return false;
  }  

var x=document.forms["edit_pub_form"]["book_edition"].value;
if (x==null || x=="")
  {
  alert("Please enter the edition of the book");
  return false;
  }  

}
</script>

</head>
<body onload='loadCategories()'>
<h2>Book: Edit Record</h2><hr/>

<form name="edit_pub_form" action="save-edited-book.php" method="post" onsubmit="return validateForm()">
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
    <td><div align="right">Category</div></td>
    <td><select name="book_category" size="1" required>
	<option value="<?php print $book_category; ?>"><?php print $book_category; ?></option>
      <?php foreach($array5 as $option5) : ?>
    <option value="<?php echo $option5->ref_unref_choice; ?>"><?php echo $option5->ref_unref_choice; ?></option>
      <?php endforeach; ?>
    </select></td>
</tr>

<tr>
    <td><div align="right">Title of Book</div></td>
    <td><textarea name="book_title" cols="50" rows="6" onkeyup="limit(book_title)" onblur="limit(book_title)" required><?php print $book_title; ?></textarea></td>
</tr>

<tr>
    <td width="150"><div align="right">Submitting Author<br/>(Unit Personnel</div><div align="right">use 255 char. max)</div></td>
    <td><textarea name="book_sub_author" cols="50" rows="6" onkeyup="limit(book_sub_author)" onblur="limit(book_sub_author)" required><?php print $book_sub_author; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Author(s)</div><div align="right">(use 255 char. max and<br />separate authors with ";")</div></td>
    <td><textarea name="book_author" cols="50" rows="6"  onkeyup="limit(book_author)" onblur="limit(book_author)" required><?php print $book_author; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Publisher(s)</div><div align="right">(use 255 char. max and<br />separate publishers with ";")</div></td>
    <td><textarea name="book_publisher" cols="50" rows="6" onkeyup="limit(book_publisher)" onblur="limit(book_publisher)" required><?php print $book_publisher; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Editor(s)</div><div align="right">(use 255 char. max and<br />separate editors with ";")</div></td>
    <td><textarea name="book_editor" cols="50" rows="6" onkeyup="limit(book_editor)" onblur="limit(book_editor)" required><?php print $book_editor; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Citation Database(s)</div><div align="right">(use 255 char. max and<br />separate citation database with ";")</div></td>
    <td><textarea name="book_cit_dbase" cols="50" rows="6" onkeyup="limit(book_cit_dbase)" onblur="limit(book_cit_dbase)"><?php print $book_cit_dbase; ?></textarea></td>
</tr>

<tr>
    <td><div align="right">Year Published</div></td>
    <td><input name="book_year_published" type="text" value="<?php print $book_year_published; ?>" size="4" required/></td>
</tr>

<tr>
    <td><div align="right">Edition</div></td>
    <td><input name="book_edition" type="text" value="<?php print $book_edition; ?>" size="4" required/></td>
</tr>

<tr>
    <td><div align="right">Number of Pages</div></td>
    <td><input name="book_num_pages" type="text" value="<?php print $book_num_pages; ?>" size="4" required/></td>
</tr>

<tr>
    <td><div align="right">ISBN</div></td>
    <td><input name="book_isbn" type="text" value="<?php print $book_isbn; ?>" size="20"/></td>
</tr>

<tr>
    <td><div align="right">Circulation Level</div></td>
    <td><select name="book_circ_level" size="1" required>
    <option value="<?php print $book_circ_level; ?>"><?php print $book_circ_level; ?></option>
      <?php foreach($array7 as $option7) : ?>
      <option value="<?php echo $option7->place_published; ?>"><?php echo $option7->place_published; ?></option>
      <?php endforeach; ?>
     </select></td>
</tr>

<tr>
    <td><div align="right">Keyword(s)</div><div align="right">(use 255 char. max and<br />separate keywords with ";")</div></td>
    <td><textarea name="book_keyword" cols="50" rows="6" required><?php print $book_keyword; ?></textarea></td>
</tr>

  	<tr>
   	<th colspan="2" scope="row"><div align="left">
       <input type="reset" value="Clear" />
       <input type="hidden" name="bid" value="<?php print $bid; ?>"><button type="submit">Submit</button>
		</div></th>
    </tr>
</table>
</form>
<?php
	//Free result set and close connection 
	$query1->close();
	$query3->close();
	$query5->close();
	$query7->close();
	$mysqli->close();
?>
</body>
</html>