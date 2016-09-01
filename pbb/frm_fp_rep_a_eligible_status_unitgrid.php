<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$frm_fp_rep_a_eligible_status_unit_grid = new cfrm_fp_rep_a_eligible_status_unit_grid();
$MasterPage =& $Page;
$Page =& $frm_fp_rep_a_eligible_status_unit_grid;

// Page init
$frm_fp_rep_a_eligible_status_unit_grid->Page_Init();

// Page main
$frm_fp_rep_a_eligible_status_unit_grid->Page_Main();
?>
<?php if ($frm_fp_rep_a_eligible_status_unit->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_rep_a_eligible_status_unit_grid = new up_Page("frm_fp_rep_a_eligible_status_unit_grid");

// page properties
frm_fp_rep_a_eligible_status_unit_grid.PageID = "grid"; // page ID
frm_fp_rep_a_eligible_status_unit_grid.FormID = "ffrm_fp_rep_a_eligible_status_unitgrid"; // form ID
var UP_PAGE_ID = frm_fp_rep_a_eligible_status_unit_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_fp_rep_a_eligible_status_unit_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_personnel_count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit->personnel_count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Participated_MFO_Count"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_Participated_MFO_Count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Not_Started_MFO_Count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_z25_Not_Started_MFO"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Status"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit->Status->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_Not_Eligible_MFO_Count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_z25_Not_Eligible_MFO_Count"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Eligible_MFO_Count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_z25_Eligible_MFO_Count"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Remarks"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit->Remarks->FldCaption()) ?>");

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
frm_fp_rep_a_eligible_status_unit_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "cu_unit_name", false)) return false;
	if (up_ValueChanged(fobj, infix, "personnel_count", false)) return false;
	if (up_ValueChanged(fobj, infix, "Participated_MFO_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "Not_Started_MFO_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "z25_Not_Started_MFO", false)) return false;
	if (up_ValueChanged(fobj, infix, "Status", false)) return false;
	if (up_ValueChanged(fobj, infix, "Not_Eligible_MFO_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "z25_Not_Eligible_MFO_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "Eligible_MFO_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "z25_Eligible_MFO_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "Remarks", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
frm_fp_rep_a_eligible_status_unit_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_rep_a_eligible_status_unit_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_rep_a_eligible_status_unit_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_rep_a_eligible_status_unit_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridadd") {
	if ($frm_fp_rep_a_eligible_status_unit->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$frm_fp_rep_a_eligible_status_unit_grid->TotalRecs = $frm_fp_rep_a_eligible_status_unit->SelectRecordCount();
			$frm_fp_rep_a_eligible_status_unit_grid->Recordset = $frm_fp_rep_a_eligible_status_unit_grid->LoadRecordset($frm_fp_rep_a_eligible_status_unit_grid->StartRec-1, $frm_fp_rep_a_eligible_status_unit_grid->DisplayRecs);
		} else {
			if ($frm_fp_rep_a_eligible_status_unit_grid->Recordset = $frm_fp_rep_a_eligible_status_unit_grid->LoadRecordset())
				$frm_fp_rep_a_eligible_status_unit_grid->TotalRecs = $frm_fp_rep_a_eligible_status_unit_grid->Recordset->RecordCount();
		}
		$frm_fp_rep_a_eligible_status_unit_grid->StartRec = 1;
		$frm_fp_rep_a_eligible_status_unit_grid->DisplayRecs = $frm_fp_rep_a_eligible_status_unit_grid->TotalRecs;
	} else {
		$frm_fp_rep_a_eligible_status_unit->CurrentFilter = "0=1";
		$frm_fp_rep_a_eligible_status_unit_grid->StartRec = 1;
		$frm_fp_rep_a_eligible_status_unit_grid->DisplayRecs = $frm_fp_rep_a_eligible_status_unit->GridAddRowCount;
	}
	$frm_fp_rep_a_eligible_status_unit_grid->TotalRecs = $frm_fp_rep_a_eligible_status_unit_grid->DisplayRecs;
	$frm_fp_rep_a_eligible_status_unit_grid->StopRec = $frm_fp_rep_a_eligible_status_unit_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_fp_rep_a_eligible_status_unit_grid->TotalRecs = $frm_fp_rep_a_eligible_status_unit->SelectRecordCount();
	} else {
		if ($frm_fp_rep_a_eligible_status_unit_grid->Recordset = $frm_fp_rep_a_eligible_status_unit_grid->LoadRecordset())
			$frm_fp_rep_a_eligible_status_unit_grid->TotalRecs = $frm_fp_rep_a_eligible_status_unit_grid->Recordset->RecordCount();
	}
	$frm_fp_rep_a_eligible_status_unit_grid->StartRec = 1;
	$frm_fp_rep_a_eligible_status_unit_grid->DisplayRecs = $frm_fp_rep_a_eligible_status_unit_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$frm_fp_rep_a_eligible_status_unit_grid->Recordset = $frm_fp_rep_a_eligible_status_unit_grid->LoadRecordset($frm_fp_rep_a_eligible_status_unit_grid->StartRec-1, $frm_fp_rep_a_eligible_status_unit_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($frm_fp_rep_a_eligible_status_unit->CurrentMode == "add" || $frm_fp_rep_a_eligible_status_unit->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($frm_fp_rep_a_eligible_status_unit->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_rep_a_eligible_status_unit->TableCaption() ?></p>
</p>
<?php $frm_fp_rep_a_eligible_status_unit_grid->ShowPageHeader(); ?>
<?php
$frm_fp_rep_a_eligible_status_unit_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($frm_fp_rep_a_eligible_status_unit->CurrentMode == "add" || $frm_fp_rep_a_eligible_status_unit->CurrentMode == "copy" || $frm_fp_rep_a_eligible_status_unit->CurrentMode == "edit") && $frm_fp_rep_a_eligible_status_unit->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_frm_fp_rep_a_eligible_status_unit" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_fp_rep_a_eligible_status_unit->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_fp_rep_a_eligible_status_unit_grid->RenderListOptions();

// Render list options (header, left)
$frm_fp_rep_a_eligible_status_unit_grid->ListOptions->Render("header", "left");
?>
<?php if ($frm_fp_rep_a_eligible_status_unit->cu_unit_name->Visible) { // cu_unit_name ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->SortUrl($frm_fp_rep_a_eligible_status_unit->cu_unit_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit->cu_unit_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit->cu_unit_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit->personnel_count->Visible) { // personnel_count ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->SortUrl($frm_fp_rep_a_eligible_status_unit->personnel_count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit->personnel_count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit->personnel_count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->Visible) { // Participated MFO Count ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->SortUrl($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->Visible) { // Not Started MFO Count ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->SortUrl($frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->Visible) { // % Not Started MFO ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->SortUrl($frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit->Status->Visible) { // Status ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->SortUrl($frm_fp_rep_a_eligible_status_unit->Status) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->Status->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit->Status->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit->Status->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit->Status->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->Visible) { // Not Eligible MFO Count ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->SortUrl($frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->Visible) { // % Not Eligible MFO Count ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->SortUrl($frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->Visible) { // Eligible MFO Count ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->SortUrl($frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->Visible) { // % Eligible MFO Count ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->SortUrl($frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit->Remarks->Visible) { // Remarks ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->SortUrl($frm_fp_rep_a_eligible_status_unit->Remarks) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit->Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit->Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_fp_rep_a_eligible_status_unit_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$frm_fp_rep_a_eligible_status_unit_grid->StartRec = 1;
$frm_fp_rep_a_eligible_status_unit_grid->StopRec = $frm_fp_rep_a_eligible_status_unit_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridadd" || $frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridedit" || $frm_fp_rep_a_eligible_status_unit->CurrentAction == "F")) {
		$frm_fp_rep_a_eligible_status_unit_grid->KeyCount = $objForm->GetValue("key_count");
		$frm_fp_rep_a_eligible_status_unit_grid->StopRec = $frm_fp_rep_a_eligible_status_unit_grid->KeyCount;
	}
}
$frm_fp_rep_a_eligible_status_unit_grid->RecCnt = $frm_fp_rep_a_eligible_status_unit_grid->StartRec - 1;
if ($frm_fp_rep_a_eligible_status_unit_grid->Recordset && !$frm_fp_rep_a_eligible_status_unit_grid->Recordset->EOF) {
	$frm_fp_rep_a_eligible_status_unit_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_fp_rep_a_eligible_status_unit_grid->StartRec > 1)
		$frm_fp_rep_a_eligible_status_unit_grid->Recordset->Move($frm_fp_rep_a_eligible_status_unit_grid->StartRec - 1);
} elseif (!$frm_fp_rep_a_eligible_status_unit->AllowAddDeleteRow && $frm_fp_rep_a_eligible_status_unit_grid->StopRec == 0) {
	$frm_fp_rep_a_eligible_status_unit_grid->StopRec = $frm_fp_rep_a_eligible_status_unit->GridAddRowCount;
}

// Initialize aggregate
$frm_fp_rep_a_eligible_status_unit->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_fp_rep_a_eligible_status_unit->ResetAttrs();
$frm_fp_rep_a_eligible_status_unit_grid->RenderRow();
$frm_fp_rep_a_eligible_status_unit_grid->RowCnt = 0;
if ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridadd")
	$frm_fp_rep_a_eligible_status_unit_grid->RowIndex = 0;
if ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridedit")
	$frm_fp_rep_a_eligible_status_unit_grid->RowIndex = 0;
while ($frm_fp_rep_a_eligible_status_unit_grid->RecCnt < $frm_fp_rep_a_eligible_status_unit_grid->StopRec) {
	$frm_fp_rep_a_eligible_status_unit_grid->RecCnt++;
	if (intval($frm_fp_rep_a_eligible_status_unit_grid->RecCnt) >= intval($frm_fp_rep_a_eligible_status_unit_grid->StartRec)) {
		$frm_fp_rep_a_eligible_status_unit_grid->RowCnt++;
		if ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridadd" || $frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridedit" || $frm_fp_rep_a_eligible_status_unit->CurrentAction == "F")
			$frm_fp_rep_a_eligible_status_unit_grid->RowIndex++;

		// Set up key count
		$frm_fp_rep_a_eligible_status_unit_grid->KeyCount = $frm_fp_rep_a_eligible_status_unit_grid->RowIndex;

		// Init row class and style
		$frm_fp_rep_a_eligible_status_unit->ResetAttrs();
		$frm_fp_rep_a_eligible_status_unit->CssClass = "";
		if ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridadd") {
			if ($frm_fp_rep_a_eligible_status_unit->CurrentMode == "copy") {
				$frm_fp_rep_a_eligible_status_unit_grid->LoadRowValues($frm_fp_rep_a_eligible_status_unit_grid->Recordset); // Load row values
				$frm_fp_rep_a_eligible_status_unit_grid->SetRecordKey($frm_fp_rep_a_eligible_status_unit_grid->RowOldKey, $frm_fp_rep_a_eligible_status_unit_grid->Recordset); // Set old record key
			} else {
				$frm_fp_rep_a_eligible_status_unit_grid->LoadDefaultValues(); // Load default values
				$frm_fp_rep_a_eligible_status_unit_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridedit") {
			$frm_fp_rep_a_eligible_status_unit_grid->LoadRowValues($frm_fp_rep_a_eligible_status_unit_grid->Recordset); // Load row values
		}
		$frm_fp_rep_a_eligible_status_unit->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridadd") // Grid add
			$frm_fp_rep_a_eligible_status_unit->RowType = UP_ROWTYPE_ADD; // Render add
		if ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridadd" && $frm_fp_rep_a_eligible_status_unit->EventCancelled) // Insert failed
			$frm_fp_rep_a_eligible_status_unit_grid->RestoreCurrentRowFormValues($frm_fp_rep_a_eligible_status_unit_grid->RowIndex); // Restore form values
		if ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridedit") { // Grid edit
			if ($frm_fp_rep_a_eligible_status_unit->EventCancelled) {
				$frm_fp_rep_a_eligible_status_unit_grid->RestoreCurrentRowFormValues($frm_fp_rep_a_eligible_status_unit_grid->RowIndex); // Restore form values
			}
			if ($frm_fp_rep_a_eligible_status_unit_grid->RowAction == "insert")
				$frm_fp_rep_a_eligible_status_unit->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$frm_fp_rep_a_eligible_status_unit->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "gridedit" && ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT || $frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) && $frm_fp_rep_a_eligible_status_unit->EventCancelled) // Update failed
			$frm_fp_rep_a_eligible_status_unit_grid->RestoreCurrentRowFormValues($frm_fp_rep_a_eligible_status_unit_grid->RowIndex); // Restore form values
		if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) // Edit row
			$frm_fp_rep_a_eligible_status_unit_grid->EditRowCnt++;
		if ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "F") // Confirm row
			$frm_fp_rep_a_eligible_status_unit_grid->RestoreCurrentRowFormValues($frm_fp_rep_a_eligible_status_unit_grid->RowIndex); // Restore form values
		if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD || $frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($frm_fp_rep_a_eligible_status_unit->CurrentAction == "edit") {
				$frm_fp_rep_a_eligible_status_unit->RowAttrs = array();
				$frm_fp_rep_a_eligible_status_unit->CssClass = "upTableEditRow";
			} else {
				$frm_fp_rep_a_eligible_status_unit->RowAttrs = array();
			}
			if (!empty($frm_fp_rep_a_eligible_status_unit_grid->RowIndex))
				$frm_fp_rep_a_eligible_status_unit->RowAttrs = array_merge($frm_fp_rep_a_eligible_status_unit->RowAttrs, array('data-rowindex'=>$frm_fp_rep_a_eligible_status_unit_grid->RowIndex, 'id'=>'r' . $frm_fp_rep_a_eligible_status_unit_grid->RowIndex . '_frm_fp_rep_a_eligible_status_unit'));
		} else {
			$frm_fp_rep_a_eligible_status_unit->RowAttrs = array();
		}

		// Render row
		$frm_fp_rep_a_eligible_status_unit_grid->RenderRow();

		// Render list options
		$frm_fp_rep_a_eligible_status_unit_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($frm_fp_rep_a_eligible_status_unit_grid->RowAction <> "delete" && $frm_fp_rep_a_eligible_status_unit_grid->RowAction <> "insertdelete" && !($frm_fp_rep_a_eligible_status_unit_grid->RowAction == "insert" && $frm_fp_rep_a_eligible_status_unit->CurrentAction == "F" && $frm_fp_rep_a_eligible_status_unit_grid->EmptyRow())) {
?>
	<tr<?php echo $frm_fp_rep_a_eligible_status_unit->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_rep_a_eligible_status_unit_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->cu_unit_name->Visible) { // cu_unit_name ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->cu_unit_name->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->cu_unit_name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->cu_unit_name->OldValue) ?>">
<?php } ?>
<a name="<?php echo $frm_fp_rep_a_eligible_status_unit_grid->PageObjName . "_row_" . $frm_fp_rep_a_eligible_status_unit_grid->RowCnt ?>" id="<?php echo $frm_fp_rep_a_eligible_status_unit_grid->PageObjName . "_row_" . $frm_fp_rep_a_eligible_status_unit_grid->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->personnel_count->Visible) { // personnel_count ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->personnel_count->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->personnel_count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->personnel_count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->Visible) { // Participated MFO Count ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->Visible) { // Not Started MFO Count ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->Visible) { // % Not Started MFO ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->Status->Visible) { // Status ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->Status->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" size="30" maxlength="11" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Status->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Status->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Status->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" size="30" maxlength="11" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Status->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Status->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Status->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Status->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Status->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Status->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->Visible) { // Not Eligible MFO Count ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->Visible) { // % Not Eligible MFO Count ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->Visible) { // Eligible MFO Count ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->Visible) { // % Eligible MFO Count ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->Remarks->Visible) { // Remarks ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" size="30" maxlength="17" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Remarks->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" size="30" maxlength="17" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Remarks->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Remarks->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_rep_a_eligible_status_unit_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($frm_fp_rep_a_eligible_status_unit->CurrentAction <> "gridadd" || $frm_fp_rep_a_eligible_status_unit->CurrentMode == "copy")
		if (!$frm_fp_rep_a_eligible_status_unit_grid->Recordset->EOF) $frm_fp_rep_a_eligible_status_unit_grid->Recordset->MoveNext();
}
?>
<?php
	if ($frm_fp_rep_a_eligible_status_unit->CurrentMode == "add" || $frm_fp_rep_a_eligible_status_unit->CurrentMode == "copy" || $frm_fp_rep_a_eligible_status_unit->CurrentMode == "edit") {
		$frm_fp_rep_a_eligible_status_unit_grid->RowIndex = '$rowindex$';
		$frm_fp_rep_a_eligible_status_unit_grid->LoadDefaultValues();

		// Set row properties
		$frm_fp_rep_a_eligible_status_unit->ResetAttrs();
		$frm_fp_rep_a_eligible_status_unit->RowAttrs = array();
		if (!empty($frm_fp_rep_a_eligible_status_unit_grid->RowIndex))
			$frm_fp_rep_a_eligible_status_unit->RowAttrs = array_merge($frm_fp_rep_a_eligible_status_unit->RowAttrs, array('data-rowindex'=>$frm_fp_rep_a_eligible_status_unit_grid->RowIndex, 'id'=>'r' . $frm_fp_rep_a_eligible_status_unit_grid->RowIndex . '_frm_fp_rep_a_eligible_status_unit'));
		$frm_fp_rep_a_eligible_status_unit->RowType = UP_ROWTYPE_ADD;

		// Render row
		$frm_fp_rep_a_eligible_status_unit_grid->RenderRow();

		// Render list options
		$frm_fp_rep_a_eligible_status_unit_grid->RenderListOptions();

		// Add id and class to the template row
		$frm_fp_rep_a_eligible_status_unit->RowAttrs["id"] = "r0_frm_fp_rep_a_eligible_status_unit";
		up_AppendClass($frm_fp_rep_a_eligible_status_unit->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $frm_fp_rep_a_eligible_status_unit->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_rep_a_eligible_status_unit_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->cu_unit_name->Visible) { // cu_unit_name ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->cu_unit_name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->personnel_count->Visible) { // personnel_count ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_personnel_count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->personnel_count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->Visible) { // Participated MFO Count ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Participated_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->Visible) { // Not Started MFO Count ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Started_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->Visible) { // % Not Started MFO ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Started_MFO" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->Status->Visible) { // Status ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" size="30" maxlength="11" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Status->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Status->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Status->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Status->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Status" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Status->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->Visible) { // Not Eligible MFO Count ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Not_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->Visible) { // % Not Eligible MFO Count ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Not_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->Visible) { // Eligible MFO Count ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->Visible) { // % Eligible MFO Count ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_z25_Eligible_MFO_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit->Remarks->Visible) { // Remarks ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" size="30" maxlength="17" value="<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_grid->RowIndex ?>_Remarks" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit->Remarks->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_rep_a_eligible_status_unit_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentMode == "add" || $frm_fp_rep_a_eligible_status_unit->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_fp_rep_a_eligible_status_unit_grid->KeyCount ?>">
<?php echo $frm_fp_rep_a_eligible_status_unit_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_fp_rep_a_eligible_status_unit_grid->KeyCount ?>">
<?php echo $frm_fp_rep_a_eligible_status_unit_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="frm_fp_rep_a_eligible_status_unit_grid">
</div>
<?php

// Close recordset
if ($frm_fp_rep_a_eligible_status_unit_grid->Recordset)
	$frm_fp_rep_a_eligible_status_unit_grid->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_fp_rep_a_eligible_status_unit->Export == "" && $frm_fp_rep_a_eligible_status_unit->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_fp_rep_a_eligible_status_unit_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$frm_fp_rep_a_eligible_status_unit_grid->Page_Terminate();
$Page =& $MasterPage;
?>
