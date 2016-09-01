<?php

// connect to the database
include_once('../connect-db.php');

$var_accrediting_body_id = $_GET['id'];

$sql="SELECT tbl_sd_ref_accreditation_classification.ref_accreditation_classification_name
	FROM tbl_sd_ref_accrediting_body INNER JOIN tbl_sd_ref_accreditation_classification
		ON tbl_sd_ref_accrediting_body.ref_accreditation_classification_id=tbl_sd_ref_accreditation_classification.ref_accreditation_classification_id
	WHERE tbl_sd_ref_accrediting_body.ref_accrediting_body_id = '$var_accrediting_body_id';";

$result = mysqli_query($mysqli, $sql);

while ( $row = mysqli_fetch_array($result) )
{
	echo '<input name="var_accreditation_classification_name" type="text" id="var_accreditation_classification_name" disabled size="50" value="';
	echo $row['ref_accreditation_classification_name'] . '" >';
}

$result->close();
mysqli_close($mysqli);

?>