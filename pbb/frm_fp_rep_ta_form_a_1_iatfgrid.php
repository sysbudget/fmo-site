<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$frm_fp_rep_ta_form_a_1_iatf_grid = new cfrm_fp_rep_ta_form_a_1_iatf_grid();
$MasterPage =& $Page;
$Page =& $frm_fp_rep_ta_form_a_1_iatf_grid;

// Page init
$frm_fp_rep_ta_form_a_1_iatf_grid->Page_Init();

// Page main
$frm_fp_rep_ta_form_a_1_iatf_grid->Page_Main();
?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_rep_ta_form_a_1_iatf_grid = new up_Page("frm_fp_rep_ta_form_a_1_iatf_grid");

// page properties
frm_fp_rep_ta_form_a_1_iatf_grid.PageID = "grid"; // page ID
frm_fp_rep_ta_form_a_1_iatf_grid.FormID = "ffrm_fp_rep_ta_form_a_1_iatfgrid"; // form ID
var UP_PAGE_ID = frm_fp_rep_ta_form_a_1_iatf_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_fp_rep_ta_form_a_1_iatf_grid.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	var addcnt = 0;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		var chkthisrow = true;
		if (fobj.a_list && fobj.a_list.value == "gridinsert")
			chkthisrow = !(this.EmptyRow(fobj, infix));
		else
			chkthisrow = true;
		if (chkthisrow) {
			addcnt += 1;
		elm = fobj.elements["x" + infix + "_Performance_Indicator_1_28229"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_TARGET_for_Performance_Indicator_1_28329"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Performance_Indicator_2_28529"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_TARGET_for_Performance_Indicator_2_28629"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Performance_Indicator_3_28829"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_TARGET_for_Performance_Indicator_3_28929"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Performance_Indicator_4_281129"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_TARGET_for_Performance_Indicator_4_281229"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Performance_Indicator_5_281429"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_TARGET_for_Performance_Indicator_5_281529"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Performance_Indicator_6_281729"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_TARGET_for_Performance_Indicator_6_281829"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Performance_Indicator_7_282029"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_TARGET_for_Performance_Indicator_7_282129"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Performance_Indicator_8_282329"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_TARGET_for_Performance_Indicator_8_282429"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Performance_Indicator_9_282629"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_TARGET_for_Performance_Indicator_9_282729"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Performance_Indicator_10_282929"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_TARGET_for_Performance_Indicator_10_283029"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Performance_Indicator_11_283229"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_TARGET_for_Performance_Indicator_11_283329"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Performance_Indicator_12_283529"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_TARGET_for_Performance_Indicator_12_283629"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->FldErrMsg()) ?>");

		// Set up row object
		var row = {};
		row["index"] = infix;
		for (var j = 0; j < fobj.elements.length; j++) {
			var el = fobj.elements[j];
			var len = infix.length + 2;
			if (el.name.substr(0, len) == "x" + infix + "_") {
				var elname = "x_" + el.name.substr(len);
				if (upLang.isObject(row[elname])) { // already exists
					if (upLang.isArray(row[elname])) {
						row[elname][row[elname].length] = el; // add to array
					} else {
						row[elname] = [row[elname], el]; // convert to array
					}
				} else {
					row[elname] = el;
				}
			}
		}
		fobj.row = row;

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
		} // End Grid Add checking
	}
	return true;
}

// Extend page with empty row check
frm_fp_rep_ta_form_a_1_iatf_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "Responsible_Bureaus_28129", false)) return false;
	if (up_ValueChanged(fobj, infix, "MFOs", false)) return false;
	if (up_ValueChanged(fobj, infix, "Performance_Indicator_1_28229", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_TARGET_for_Performance_Indicator_1_28329", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429", false)) return false;
	if (up_ValueChanged(fobj, infix, "Performance_Indicator_2_28529", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_TARGET_for_Performance_Indicator_2_28629", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729", false)) return false;
	if (up_ValueChanged(fobj, infix, "Performance_Indicator_3_28829", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_TARGET_for_Performance_Indicator_3_28929", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029", false)) return false;
	if (up_ValueChanged(fobj, infix, "Performance_Indicator_4_281129", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_TARGET_for_Performance_Indicator_4_281229", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329", false)) return false;
	if (up_ValueChanged(fobj, infix, "Performance_Indicator_5_281429", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_TARGET_for_Performance_Indicator_5_281529", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629", false)) return false;
	if (up_ValueChanged(fobj, infix, "Performance_Indicator_6_281729", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_TARGET_for_Performance_Indicator_6_281829", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929", false)) return false;
	if (up_ValueChanged(fobj, infix, "Performance_Indicator_7_282029", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_TARGET_for_Performance_Indicator_7_282129", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229", false)) return false;
	if (up_ValueChanged(fobj, infix, "Performance_Indicator_8_282329", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_TARGET_for_Performance_Indicator_8_282429", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529", false)) return false;
	if (up_ValueChanged(fobj, infix, "Performance_Indicator_9_282629", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_TARGET_for_Performance_Indicator_9_282729", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829", false)) return false;
	if (up_ValueChanged(fobj, infix, "Performance_Indicator_10_282929", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_TARGET_for_Performance_Indicator_10_283029", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129", false)) return false;
	if (up_ValueChanged(fobj, infix, "Performance_Indicator_11_283229", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_TARGET_for_Performance_Indicator_11_283329", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429", false)) return false;
	if (up_ValueChanged(fobj, infix, "Performance_Indicator_12_283529", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_TARGET_for_Performance_Indicator_12_283629", false)) return false;
	if (up_ValueChanged(fobj, infix, "FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
frm_fp_rep_ta_form_a_1_iatf_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_rep_ta_form_a_1_iatf_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_rep_ta_form_a_1_iatf_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_rep_ta_form_a_1_iatf_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridadd") {
	if ($frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$frm_fp_rep_ta_form_a_1_iatf_grid->TotalRecs = $frm_fp_rep_ta_form_a_1_iatf->SelectRecordCount();
			$frm_fp_rep_ta_form_a_1_iatf_grid->Recordset = $frm_fp_rep_ta_form_a_1_iatf_grid->LoadRecordset($frm_fp_rep_ta_form_a_1_iatf_grid->StartRec-1, $frm_fp_rep_ta_form_a_1_iatf_grid->DisplayRecs);
		} else {
			if ($frm_fp_rep_ta_form_a_1_iatf_grid->Recordset = $frm_fp_rep_ta_form_a_1_iatf_grid->LoadRecordset())
				$frm_fp_rep_ta_form_a_1_iatf_grid->TotalRecs = $frm_fp_rep_ta_form_a_1_iatf_grid->Recordset->RecordCount();
		}
		$frm_fp_rep_ta_form_a_1_iatf_grid->StartRec = 1;
		$frm_fp_rep_ta_form_a_1_iatf_grid->DisplayRecs = $frm_fp_rep_ta_form_a_1_iatf_grid->TotalRecs;
	} else {
		$frm_fp_rep_ta_form_a_1_iatf->CurrentFilter = "0=1";
		$frm_fp_rep_ta_form_a_1_iatf_grid->StartRec = 1;
		$frm_fp_rep_ta_form_a_1_iatf_grid->DisplayRecs = $frm_fp_rep_ta_form_a_1_iatf->GridAddRowCount;
	}
	$frm_fp_rep_ta_form_a_1_iatf_grid->TotalRecs = $frm_fp_rep_ta_form_a_1_iatf_grid->DisplayRecs;
	$frm_fp_rep_ta_form_a_1_iatf_grid->StopRec = $frm_fp_rep_ta_form_a_1_iatf_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_fp_rep_ta_form_a_1_iatf_grid->TotalRecs = $frm_fp_rep_ta_form_a_1_iatf->SelectRecordCount();
	} else {
		if ($frm_fp_rep_ta_form_a_1_iatf_grid->Recordset = $frm_fp_rep_ta_form_a_1_iatf_grid->LoadRecordset())
			$frm_fp_rep_ta_form_a_1_iatf_grid->TotalRecs = $frm_fp_rep_ta_form_a_1_iatf_grid->Recordset->RecordCount();
	}
	$frm_fp_rep_ta_form_a_1_iatf_grid->StartRec = 1;
	$frm_fp_rep_ta_form_a_1_iatf_grid->DisplayRecs = $frm_fp_rep_ta_form_a_1_iatf_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$frm_fp_rep_ta_form_a_1_iatf_grid->Recordset = $frm_fp_rep_ta_form_a_1_iatf_grid->LoadRecordset($frm_fp_rep_ta_form_a_1_iatf_grid->StartRec-1, $frm_fp_rep_ta_form_a_1_iatf_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "add" || $frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_rep_ta_form_a_1_iatf->TableCaption() ?></p>
</p>
<?php $frm_fp_rep_ta_form_a_1_iatf_grid->ShowPageHeader(); ?>
<?php
$frm_fp_rep_ta_form_a_1_iatf_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "add" || $frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "copy" || $frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "edit") && $frm_fp_rep_ta_form_a_1_iatf->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_frm_fp_rep_ta_form_a_1_iatf" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_fp_rep_ta_form_a_1_iatf->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_fp_rep_ta_form_a_1_iatf_grid->RenderListOptions();

// Render list options (header, left)
$frm_fp_rep_ta_form_a_1_iatf_grid->ListOptions->Render("header", "left");
?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->Visible) { // Responsible Bureaus (1) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->MFOs->Visible) { // MFOs ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->MFOs) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->MFOs->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->MFOs->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->Visible) { // Performance Indicator 1 (2) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->Visible) { // FY 2015 TARGET for Performance Indicator 1 (3) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->Visible) { // Performance Indicator 2 (5) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->Visible) { // FY 2015 TARGET for Performance Indicator 2 (6) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->Visible) { // Performance Indicator 3 (8) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->Visible) { // FY 2015 TARGET for Performance Indicator 3 (9) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->Visible) { // Performance Indicator 4 (11) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->Visible) { // FY 2015 TARGET for Performance Indicator 4 (12) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->Visible) { // Performance Indicator 5 (14) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->Visible) { // FY 2015 TARGET for Performance Indicator 5 (15) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->Visible) { // Performance Indicator 6 (17) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->Visible) { // FY 2015 TARGET for Performance Indicator 6 (18) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->Visible) { // Performance Indicator 7 (20) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->Visible) { // FY 2015 TARGET for Performance Indicator 7 (21) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->Visible) { // Performance Indicator 8 (23) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->Visible) { // FY 2015 TARGET for Performance Indicator 8 (24) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->Visible) { // Performance Indicator 9 (26) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->Visible) { // FY 2015 TARGET for Performance Indicator 9 (27) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->Visible) { // Performance Indicator 10 (29) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->Visible) { // FY 2015 TARGET for Performance Indicator 10 (30) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->Visible) { // Performance Indicator 11 (32) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->Visible) { // FY 2015 TARGET for Performance Indicator 11 (33) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->Visible) { // Performance Indicator 12 (35) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->Visible) { // FY 2015 TARGET for Performance Indicator 12 (36) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_fp_rep_ta_form_a_1_iatf_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$frm_fp_rep_ta_form_a_1_iatf_grid->StartRec = 1;
$frm_fp_rep_ta_form_a_1_iatf_grid->StopRec = $frm_fp_rep_ta_form_a_1_iatf_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridadd" || $frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridedit" || $frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "F")) {
		$frm_fp_rep_ta_form_a_1_iatf_grid->KeyCount = $objForm->GetValue("key_count");
		$frm_fp_rep_ta_form_a_1_iatf_grid->StopRec = $frm_fp_rep_ta_form_a_1_iatf_grid->KeyCount;
	}
}
$frm_fp_rep_ta_form_a_1_iatf_grid->RecCnt = $frm_fp_rep_ta_form_a_1_iatf_grid->StartRec - 1;
if ($frm_fp_rep_ta_form_a_1_iatf_grid->Recordset && !$frm_fp_rep_ta_form_a_1_iatf_grid->Recordset->EOF) {
	$frm_fp_rep_ta_form_a_1_iatf_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_fp_rep_ta_form_a_1_iatf_grid->StartRec > 1)
		$frm_fp_rep_ta_form_a_1_iatf_grid->Recordset->Move($frm_fp_rep_ta_form_a_1_iatf_grid->StartRec - 1);
} elseif (!$frm_fp_rep_ta_form_a_1_iatf->AllowAddDeleteRow && $frm_fp_rep_ta_form_a_1_iatf_grid->StopRec == 0) {
	$frm_fp_rep_ta_form_a_1_iatf_grid->StopRec = $frm_fp_rep_ta_form_a_1_iatf->GridAddRowCount;
}

// Initialize aggregate
$frm_fp_rep_ta_form_a_1_iatf->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_fp_rep_ta_form_a_1_iatf->ResetAttrs();
$frm_fp_rep_ta_form_a_1_iatf_grid->RenderRow();
$frm_fp_rep_ta_form_a_1_iatf_grid->RowCnt = 0;
if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridadd")
	$frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex = 0;
if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridedit")
	$frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex = 0;
while ($frm_fp_rep_ta_form_a_1_iatf_grid->RecCnt < $frm_fp_rep_ta_form_a_1_iatf_grid->StopRec) {
	$frm_fp_rep_ta_form_a_1_iatf_grid->RecCnt++;
	if (intval($frm_fp_rep_ta_form_a_1_iatf_grid->RecCnt) >= intval($frm_fp_rep_ta_form_a_1_iatf_grid->StartRec)) {
		$frm_fp_rep_ta_form_a_1_iatf_grid->RowCnt++;
		if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridadd" || $frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridedit" || $frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "F")
			$frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex++;

		// Set up key count
		$frm_fp_rep_ta_form_a_1_iatf_grid->KeyCount = $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex;

		// Init row class and style
		$frm_fp_rep_ta_form_a_1_iatf->ResetAttrs();
		$frm_fp_rep_ta_form_a_1_iatf->CssClass = "";
		if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridadd") {
			if ($frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "copy") {
				$frm_fp_rep_ta_form_a_1_iatf_grid->LoadRowValues($frm_fp_rep_ta_form_a_1_iatf_grid->Recordset); // Load row values
				$frm_fp_rep_ta_form_a_1_iatf_grid->SetRecordKey($frm_fp_rep_ta_form_a_1_iatf_grid->RowOldKey, $frm_fp_rep_ta_form_a_1_iatf_grid->Recordset); // Set old record key
			} else {
				$frm_fp_rep_ta_form_a_1_iatf_grid->LoadDefaultValues(); // Load default values
				$frm_fp_rep_ta_form_a_1_iatf_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridedit") {
			$frm_fp_rep_ta_form_a_1_iatf_grid->LoadRowValues($frm_fp_rep_ta_form_a_1_iatf_grid->Recordset); // Load row values
		}
		$frm_fp_rep_ta_form_a_1_iatf->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridadd") // Grid add
			$frm_fp_rep_ta_form_a_1_iatf->RowType = UP_ROWTYPE_ADD; // Render add
		if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridadd" && $frm_fp_rep_ta_form_a_1_iatf->EventCancelled) // Insert failed
			$frm_fp_rep_ta_form_a_1_iatf_grid->RestoreCurrentRowFormValues($frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex); // Restore form values
		if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridedit") { // Grid edit
			if ($frm_fp_rep_ta_form_a_1_iatf->EventCancelled) {
				$frm_fp_rep_ta_form_a_1_iatf_grid->RestoreCurrentRowFormValues($frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex); // Restore form values
			}
			if ($frm_fp_rep_ta_form_a_1_iatf_grid->RowAction == "insert")
				$frm_fp_rep_ta_form_a_1_iatf->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$frm_fp_rep_ta_form_a_1_iatf->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridedit" && ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT || $frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) && $frm_fp_rep_ta_form_a_1_iatf->EventCancelled) // Update failed
			$frm_fp_rep_ta_form_a_1_iatf_grid->RestoreCurrentRowFormValues($frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex); // Restore form values
		if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) // Edit row
			$frm_fp_rep_ta_form_a_1_iatf_grid->EditRowCnt++;
		if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "F") // Confirm row
			$frm_fp_rep_ta_form_a_1_iatf_grid->RestoreCurrentRowFormValues($frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex); // Restore form values
		if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD || $frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "edit") {
				$frm_fp_rep_ta_form_a_1_iatf->RowAttrs = array();
				$frm_fp_rep_ta_form_a_1_iatf->CssClass = "upTableEditRow";
			} else {
				$frm_fp_rep_ta_form_a_1_iatf->RowAttrs = array();
			}
			if (!empty($frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex))
				$frm_fp_rep_ta_form_a_1_iatf->RowAttrs = array_merge($frm_fp_rep_ta_form_a_1_iatf->RowAttrs, array('data-rowindex'=>$frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex, 'id'=>'r' . $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex . '_frm_fp_rep_ta_form_a_1_iatf'));
		} else {
			$frm_fp_rep_ta_form_a_1_iatf->RowAttrs = array();
		}

		// Render row
		$frm_fp_rep_ta_form_a_1_iatf_grid->RenderRow();

		// Render list options
		$frm_fp_rep_ta_form_a_1_iatf_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($frm_fp_rep_ta_form_a_1_iatf_grid->RowAction <> "delete" && $frm_fp_rep_ta_form_a_1_iatf_grid->RowAction <> "insertdelete" && !($frm_fp_rep_ta_form_a_1_iatf_grid->RowAction == "insert" && $frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "F" && $frm_fp_rep_ta_form_a_1_iatf_grid->EmptyRow())) {
?>
	<tr<?php echo $frm_fp_rep_ta_form_a_1_iatf->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_rep_ta_form_a_1_iatf_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->Visible) { // Responsible Bureaus (1) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" size="30" maxlength="255" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" size="30" maxlength="255" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->OldValue) ?>">
<?php } ?>
<a name="<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->PageObjName . "_row_" . $frm_fp_rep_ta_form_a_1_iatf_grid->RowCnt ?>" id="<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->PageObjName . "_row_" . $frm_fp_rep_ta_form_a_1_iatf_grid->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->MFOs->Visible) { // MFOs ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" size="30" maxlength="255" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->MFOs->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" size="30" maxlength="255" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->MFOs->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->MFOs->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->Visible) { // Performance Indicator 1 (2) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->Visible) { // FY 2015 TARGET for Performance Indicator 1 (3) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->Visible) { // Performance Indicator 2 (5) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->Visible) { // FY 2015 TARGET for Performance Indicator 2 (6) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->Visible) { // Performance Indicator 3 (8) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->Visible) { // FY 2015 TARGET for Performance Indicator 3 (9) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->Visible) { // Performance Indicator 4 (11) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->Visible) { // FY 2015 TARGET for Performance Indicator 4 (12) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->Visible) { // Performance Indicator 5 (14) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->Visible) { // FY 2015 TARGET for Performance Indicator 5 (15) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->Visible) { // Performance Indicator 6 (17) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->Visible) { // FY 2015 TARGET for Performance Indicator 6 (18) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->Visible) { // Performance Indicator 7 (20) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->Visible) { // FY 2015 TARGET for Performance Indicator 7 (21) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->Visible) { // Performance Indicator 8 (23) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->Visible) { // FY 2015 TARGET for Performance Indicator 8 (24) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->Visible) { // Performance Indicator 9 (26) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->Visible) { // FY 2015 TARGET for Performance Indicator 9 (27) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->Visible) { // Performance Indicator 10 (29) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->Visible) { // FY 2015 TARGET for Performance Indicator 10 (30) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->Visible) { // Performance Indicator 11 (32) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->Visible) { // FY 2015 TARGET for Performance Indicator 11 (33) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->Visible) { // Performance Indicator 12 (35) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->Visible) { // FY 2015 TARGET for Performance Indicator 12 (36) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CellAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" id="o<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_rep_ta_form_a_1_iatf_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "gridadd" || $frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "copy")
		if (!$frm_fp_rep_ta_form_a_1_iatf_grid->Recordset->EOF) $frm_fp_rep_ta_form_a_1_iatf_grid->Recordset->MoveNext();
}
?>
<?php
	if ($frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "add" || $frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "copy" || $frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "edit") {
		$frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex = '$rowindex$';
		$frm_fp_rep_ta_form_a_1_iatf_grid->LoadDefaultValues();

		// Set row properties
		$frm_fp_rep_ta_form_a_1_iatf->ResetAttrs();
		$frm_fp_rep_ta_form_a_1_iatf->RowAttrs = array();
		if (!empty($frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex))
			$frm_fp_rep_ta_form_a_1_iatf->RowAttrs = array_merge($frm_fp_rep_ta_form_a_1_iatf->RowAttrs, array('data-rowindex'=>$frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex, 'id'=>'r' . $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex . '_frm_fp_rep_ta_form_a_1_iatf'));
		$frm_fp_rep_ta_form_a_1_iatf->RowType = UP_ROWTYPE_ADD;

		// Render row
		$frm_fp_rep_ta_form_a_1_iatf_grid->RenderRow();

		// Render list options
		$frm_fp_rep_ta_form_a_1_iatf_grid->RenderListOptions();

		// Add id and class to the template row
		$frm_fp_rep_ta_form_a_1_iatf->RowAttrs["id"] = "r0_frm_fp_rep_ta_form_a_1_iatf";
		up_AppendClass($frm_fp_rep_ta_form_a_1_iatf->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $frm_fp_rep_ta_form_a_1_iatf->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_rep_ta_form_a_1_iatf_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->Visible) { // Responsible Bureaus (1) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" size="30" maxlength="255" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Responsible_Bureaus_28129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->MFOs->Visible) { // MFOs ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" size="30" maxlength="255" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_MFOs" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->MFOs->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->Visible) { // Performance Indicator 1 (2) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_1_28229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->Visible) { // FY 2015 TARGET for Performance Indicator 1 (3) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_1_28329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->Visible) { // Performance Indicator 2 (5) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_2_28529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->Visible) { // FY 2015 TARGET for Performance Indicator 2 (6) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_2_28629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->Visible) { // Performance Indicator 3 (8) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_3_28829" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->Visible) { // FY 2015 TARGET for Performance Indicator 3 (9) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_3_28929" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->Visible) { // Performance Indicator 4 (11) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_4_281129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->Visible) { // FY 2015 TARGET for Performance Indicator 4 (12) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_4_281229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->Visible) { // Performance Indicator 5 (14) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_5_281429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->Visible) { // FY 2015 TARGET for Performance Indicator 5 (15) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_5_281529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->Visible) { // Performance Indicator 6 (17) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_6_281729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->Visible) { // FY 2015 TARGET for Performance Indicator 6 (18) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_6_281829" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->Visible) { // Performance Indicator 7 (20) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_7_282029" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->Visible) { // FY 2015 TARGET for Performance Indicator 7 (21) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_7_282129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->Visible) { // Performance Indicator 8 (23) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_8_282329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->Visible) { // FY 2015 TARGET for Performance Indicator 8 (24) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_8_282429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->Visible) { // Performance Indicator 9 (26) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_9_282629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->Visible) { // FY 2015 TARGET for Performance Indicator 9 (27) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_9_282729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->Visible) { // Performance Indicator 10 (29) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_10_282929" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->Visible) { // FY 2015 TARGET for Performance Indicator 10 (30) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_10_283029" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->Visible) { // Performance Indicator 11 (32) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_11_283229" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->Visible) { // FY 2015 TARGET for Performance Indicator 11 (33) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_11_283329" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->Visible) { // Performance Indicator 12 (35) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" size="30" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_Performance_Indicator_12_283529" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->Visible) { // FY 2015 TARGET for Performance Indicator 12 (36) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_TARGET_for_Performance_Indicator_12_283629" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37) ?>
		<td>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" size="30" maxlength="53" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->EditValue ?>"<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" id="x<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->RowIndex ?>_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_rep_ta_form_a_1_iatf_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "add" || $frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->KeyCount ?>">
<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->KeyCount ?>">
<?php echo $frm_fp_rep_ta_form_a_1_iatf_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="frm_fp_rep_ta_form_a_1_iatf_grid">
</div>
<?php

// Close recordset
if ($frm_fp_rep_ta_form_a_1_iatf_grid->Recordset)
	$frm_fp_rep_ta_form_a_1_iatf_grid->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Export == "" && $frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_fp_rep_ta_form_a_1_iatf_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$frm_fp_rep_ta_form_a_1_iatf_grid->Page_Terminate();
$Page =& $MasterPage;
?>
