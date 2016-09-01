<?php

function copyFiletoSrvr($uploadfile, $targetname, $pathname)
{

if (isset($_FILES[$uploadfile]))
{
	if (!is_uploaded_file($_FILES[$uploadfile]['tmp_name']))
	{
		if  ($_FILES[$uploadfile]['error'] != 0 && $_FILES[$uploadfile]['error'] != UPLOAD_ERR_NO_FILE)
		{
			echo "<p>" . $_FILES[$uploadfile]['name'] . " err# ". $_FILES[$uploadfile]['error']. " Error: File upload error. File not saved.</p>";
			return false;
		}
    }
	else
	{
        $allowed = array("pdf" => "application/pdf");
        $filename = basename($_FILES[$uploadfile]["name"]);
        $filetype = $_FILES[$uploadfile]["type"];
        $filesize = $_FILES[$uploadfile]["size"];

		// Verify match to desired file name
		if ($filename != $targetname)
		{
			echo "<p>" . $filename . "  Error: File name is not an exact match to prescribed name " . $targetname . ". File not saved.</p>";
			return false;
		}
		
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed))
		{
			echo "<p>" . $filename . "  Error: PDF files only. File not saved.</p>";
			return false;
		}

		// Verify file not empty
        if ($filesize == 0)
		{
			echo "<p>" . $filename . "  Error: File size is 0. File not saved.</p>";
			return false;
		}

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize)
		{
			echo "<p>" . $filename . "  Error: File size is larger than the allowed limit of 5MB. File not saved.</p>";
			return false;
		}
		
        // Verify MIME type of the file
        if (in_array($filetype, $allowed))
		{
			echo "<p>Please wait while " . $_FILES[$uploadfile]["name"] . " is being uploaded...";
			if (!move_uploaded_file($_FILES[$uploadfile]["tmp_name"], "$pathname/$filename"))
			{
				echo $_FILES[$uploadfile]["tmp_name"] . " was not moved to " . $pathname . "/" . $filename . "  Upload Error: File not saved.</p>";
				return false;
			}
			else
			{
				echo "File saved ok.</p>";
			}
		}
    	else
		{
			echo "<p>" . $filename . "  Error: File type not allowed. File not saved.</p>";
			return false;
		}
	}
}

return true;

}

function mysql_entities_fix_string($conn, $string)
{
	return htmlentities(mysql_fix_string($conn, $string));
}

function mysql_fix_string($conn, $string)
{
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return $conn->real_escape_string($string);
}

?>
