<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php
up_Header(FALSE, 'utf-8');
$lookup = new clookup;
$lookup->Page_Main();

//
// Page class for lookup
//
class clookup {

	// Page ID
	var $PageID = "lookup";

	// Page object name
	var $PageObjName = "lookup";

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		return up_CurrentPage() . "?";
	}

	// Main
	function Page_Main() {
		$qs = new cQueryString();
		if ($qs->Count > 0) {
			$Sql = $qs->getValue("s");
			$Sql = TEAdecrypt($Sql, UP_RANDOM_KEY);
			if ($Sql <> "") {

				// Get the filter values (for "IN")
				$Value = up_AdjustSql($qs->getConvertedValue("f"));
				if ($Value <> "") {
					$arValue = explode(",", $Value);
					$FldType = $qs->getValue("lft"); // Filter field data type
					if (is_numeric($FldType))
						$FldType = intval($FldType);
					$cnt = count($arValue);
					for ($i=0; $i<$cnt; $i++) {
						$arValue[$i] = up_QuotedValue($arValue[$i], $FldType);
					}
					$Sql = str_replace("{filter_value}", implode(",", $arValue), $Sql);
				}

				// get the query value (for "LIKE" or "=")
				$Value = up_AdjustSql($qs->getConvertedValue("q"));
				if ($Value <> "") {
					$i = strpos($Sql, "LIKE '{query_value}%'");
					if ($i > 0)
						$Sql = str_replace("LIKE '{query_value}%'", up_Like("'" . $Value . "%'"), $Sql);
					else
						$Sql = str_replace("{query_value}", $Value, $Sql);
				}
				$this->GetLookupValues($Sql);
			}
		} else {
			die("Missing querystring.");
		}
	}

	// Get lookup values
	function GetLookupValues($Sql) {
		$rsarr = array();
		$rowcnt = 0;
		$conn = up_Connect();
		if ($rs = $conn->Execute($Sql)) {
			$rowcnt = $rs->RecordCount();
			$fldcnt = $rs->FieldCount();
			$rsarr = $rs->GetRows();
			$rs->Close();
		}
		$conn->Close();

		// Output
		if (is_array($rsarr) && $rowcnt > 0) {
			for ($i=0; $i<$rowcnt; $i++) {
				for ($j=0; $j<$fldcnt; $j++) {
					$str = strval($rsarr[$i][$j]);
					$str = $this->RemoveDelimiters($str);
					echo up_ConvertToUtf8($str . UP_FIELD_DELIMITER);
				}
				echo up_ConvertToUtf8(UP_RECORD_DELIMITER);
			}
		}
	}

	// Process values
	function RemoveDelimiters($s) {
		$wrkstr = $s;
		if (strlen($wrkstr) > 0) {
			$wrkstr = str_replace("\r", " ", $wrkstr);
			$wrkstr = str_replace("\n", " ", $wrkstr);
			$wrkstr = str_replace(UP_RECORD_DELIMITER, "", $wrkstr);
			$wrkstr = str_replace(UP_FIELD_DELIMITER, " ", $wrkstr);
		}
		return $wrkstr;
	}
}
?>
