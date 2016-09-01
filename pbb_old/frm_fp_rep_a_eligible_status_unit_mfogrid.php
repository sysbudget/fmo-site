<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$frm_fp_rep_a_eligible_status_unit_mfo_grid = new cfrm_fp_rep_a_eligible_status_unit_mfo_grid();
$MasterPage =& $Page;
$Page =& $frm_fp_rep_a_eligible_status_unit_mfo_grid;

// Page init
$frm_fp_rep_a_eligible_status_unit_mfo_grid->Page_Init();

// Page main
$frm_fp_rep_a_eligible_status_unit_mfo_grid->Page_Main();
?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_rep_a_eligible_status_unit_mfo_grid = new up_Page("frm_fp_rep_a_eligible_status_unit_mfo_grid");

// page properties
frm_fp_rep_a_eligible_status_unit_mfo_grid.PageID = "grid"; // page ID
frm_fp_rep_a_eligible_status_unit_mfo_grid.FormID = "ffrm_fp_rep_a_eligible_status_unit_mfogrid"; // form ID
var UP_PAGE_ID = frm_fp_rep_a_eligible_status_unit_mfo_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_fp_rep_a_eligible_status_unit_mfo_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_Participated_PI"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_Participated_PI"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Not_Started_PI"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_z25_Not_Started_PI"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Status"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit_mfo->Status->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_Not_Eligible_PI_Count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_z25_Not_Eligible_PI_Count"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Eligible_PI_Count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_z25_Eligible_PI_Count"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Remarks"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->FldCaption()) ?>");

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
frm_fp_rep_a_eligible_status_unit_mfo_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "cu_unit_name", false)) return false;
	if (up_ValueChanged(fobj, infix, "mfo_name_rep", false)) return false;
	if (up_ValueChanged(fobj, infix, "Participated_PI", false)) return false;
	if (up_ValueChanged(fobj, infix, "Not_Started_PI", false)) return false;
	if (up_ValueChanged(fobj, infix, "z25_Not_Started_PI", false)) return false;
	if (up_ValueChanged(fobj, infix, "Status", false)) return false;
	if (up_ValueChanged(fobj, infix, "Not_Eligible_PI_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "z25_Not_Eligible_PI_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "Eligible_PI_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "z25_Eligible_PI_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "Remarks", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
frm_fp_rep_a_eligible_status_unit_mfo_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_rep_a_eligible_status_unit_mfo_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_rep_a_eligible_status_unit_mfo_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_rep_a_eligible_status_unit_mfo_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridadd") {
	if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$frm_fp_rep_a_eligible_status_unit_mfo_grid->TotalRecs = $frm_fp_rep_a_eligible_status_unit_mfo->SelectRecordCount();
			$frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset = $frm_fp_rep_a_eligible_status_unit_mfo_grid->LoadRecordset($frm_fp_rep_a_eligible_status_unit_mfo_grid->StartRec-1, $frm_fp_rep_a_eligible_status_unit_mfo_grid->DisplayRecs);
		} else {
			if ($frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset = $frm_fp_rep_a_eligible_status_unit_mfo_grid->LoadRecordset())
				$frm_fp_rep_a_eligible_status_unit_mfo_grid->TotalRecs = $frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset->RecordCount();
		}
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->StartRec = 1;
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->DisplayRecs = $frm_fp_rep_a_eligible_status_unit_mfo_grid->TotalRecs;
	} else {
		$frm_fp_rep_a_eligible_status_unit_mfo->CurrentFilter = "0=1";
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->StartRec = 1;
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->DisplayRecs = $frm_fp_rep_a_eligible_status_unit_mfo->GridAddRowCount;
	}
	$frm_fp_rep_a_eligible_status_unit_mfo_grid->TotalRecs = $frm_fp_rep_a_eligible_status_unit_mfo_grid->DisplayRecs;
	$frm_fp_rep_a_eligible_status_unit_mfo_grid->StopRec = $frm_fp_rep_a_eligible_status_unit_mfo_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->TotalRecs = $frm_fp_rep_a_eligible_status_unit_mfo->SelectRecordCount();
	} else {
		if ($frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset = $frm_fp_rep_a_eligible_status_unit_mfo_grid->LoadRecordset())
			$frm_fp_rep_a_eligible_status_unit_mfo_grid->TotalRecs = $frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset->RecordCount();
	}
	$frm_fp_rep_a_eligible_status_unit_mfo_grid->StartRec = 1;
	$frm_fp_rep_a_eligible_status_unit_mfo_grid->DisplayRecs = $frm_fp_rep_a_eligible_status_unit_mfo_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset = $frm_fp_rep_a_eligible_status_unit_mfo_grid->LoadRecordset($frm_fp_rep_a_eligible_status_unit_mfo_grid->StartRec-1, $frm_fp_rep_a_eligible_status_unit_mfo_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "add" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->TableCaption() ?></p>
</p>
<?php $frm_fp_rep_a_eligible_status_unit_mfo_grid->ShowPageHeader(); ?>
<?php
$frm_fp_rep_a_eligible_status_unit_mfo_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "add" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "copy" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "edit") && $frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_frm_fp_rep_a_eligible_status_unit_mfo" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_fp_rep_a_eligible_status_unit_mfo_grid->RenderListOptions();

// Render list options (header, left)
$frm_fp_rep_a_eligible_status_unit_mfo_grid->ListOptions->Render("header", "left");
?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->Visible) { // cu_unit_name ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->SortUrl($frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->Visible) { // mfo_name_rep ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->SortUrl($frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->Visible) { // Participated PI ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->SortUrl($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->Visible) { // Not Started PI ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->SortUrl($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->Visible) { // % Not Started PI ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->SortUrl($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Status->Visible) { // Status ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->SortUrl($frm_fp_rep_a_eligible_status_unit_mfo->Status) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Status->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit_mfo->Status->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->Visible) { // Not Eligible PI Count ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->SortUrl($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->Visible) { // % Not Eligible PI Count ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->SortUrl($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->Visible) { // Eligible PI Count ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->SortUrl($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->Visible) { // % Eligible PI Count ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->SortUrl($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->Visible) { // Remarks ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->SortUrl($frm_fp_rep_a_eligible_status_unit_mfo->Remarks) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_fp_rep_a_eligible_status_unit_mfo_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$frm_fp_rep_a_eligible_status_unit_mfo_grid->StartRec = 1;
$frm_fp_rep_a_eligible_status_unit_mfo_grid->StopRec = $frm_fp_rep_a_eligible_status_unit_mfo_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridadd" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridedit" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "F")) {
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->KeyCount = $objForm->GetValue("key_count");
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->StopRec = $frm_fp_rep_a_eligible_status_unit_mfo_grid->KeyCount;
	}
}
$frm_fp_rep_a_eligible_status_unit_mfo_grid->RecCnt = $frm_fp_rep_a_eligible_status_unit_mfo_grid->StartRec - 1;
if ($frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset && !$frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset->EOF) {
	$frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_fp_rep_a_eligible_status_unit_mfo_grid->StartRec > 1)
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset->Move($frm_fp_rep_a_eligible_status_unit_mfo_grid->StartRec - 1);
} elseif (!$frm_fp_rep_a_eligible_status_unit_mfo->AllowAddDeleteRow && $frm_fp_rep_a_eligible_status_unit_mfo_grid->StopRec == 0) {
	$frm_fp_rep_a_eligible_status_unit_mfo_grid->StopRec = $frm_fp_rep_a_eligible_status_unit_mfo->GridAddRowCount;
}

// Initialize aggregate
$frm_fp_rep_a_eligible_status_unit_mfo->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_fp_rep_a_eligible_status_unit_mfo->ResetAttrs();
$frm_fp_rep_a_eligible_status_unit_mfo_grid->RenderRow();
$frm_fp_rep_a_eligible_status_unit_mfo_grid->RowCnt = 0;
if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridadd")
	$frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex = 0;
if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridedit")
	$frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex = 0;
while ($frm_fp_rep_a_eligible_status_unit_mfo_grid->RecCnt < $frm_fp_rep_a_eligible_status_unit_mfo_grid->StopRec) {
	$frm_fp_rep_a_eligible_status_unit_mfo_grid->RecCnt++;
	if (intval($frm_fp_rep_a_eligible_status_unit_mfo_grid->RecCnt) >= intval($frm_fp_rep_a_eligible_status_unit_mfo_grid->StartRec)) {
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->RowCnt++;
		if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridadd" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridedit" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "F")
			$frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex++;

		// Set up key count
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->KeyCount = $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex;

		// Init row class and style
		$frm_fp_rep_a_eligible_status_unit_mfo->ResetAttrs();
		$frm_fp_rep_a_eligible_status_unit_mfo->CssClass = "";
		if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridadd") {
			if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "copy") {
				$frm_fp_rep_a_eligible_status_unit_mfo_grid->LoadRowValues($frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset); // Load row values
				$frm_fp_rep_a_eligible_status_unit_mfo_grid->SetRecordKey($frm_fp_rep_a_eligible_status_unit_mfo_grid->RowOldKey, $frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset); // Set old record key
			} else {
				$frm_fp_rep_a_eligible_status_unit_mfo_grid->LoadDefaultValues(); // Load default values
				$frm_fp_rep_a_eligible_status_unit_mfo_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridedit") {
			$frm_fp_rep_a_eligible_status_unit_mfo_grid->LoadRowValues($frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset); // Load row values
		}
		$frm_fp_rep_a_eligible_status_unit_mfo->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridadd") // Grid add
			$frm_fp_rep_a_eligible_status_unit_mfo->RowType = UP_ROWTYPE_ADD; // Render add
		if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridadd" && $frm_fp_rep_a_eligible_status_unit_mfo->EventCancelled) // Insert failed
			$frm_fp_rep_a_eligible_status_unit_mfo_grid->RestoreCurrentRowFormValues($frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex); // Restore form values
		if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridedit") { // Grid edit
			if ($frm_fp_rep_a_eligible_status_unit_mfo->EventCancelled) {
				$frm_fp_rep_a_eligible_status_unit_mfo_grid->RestoreCurrentRowFormValues($frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex); // Restore form values
			}
			if ($frm_fp_rep_a_eligible_status_unit_mfo_grid->RowAction == "insert")
				$frm_fp_rep_a_eligible_status_unit_mfo->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$frm_fp_rep_a_eligible_status_unit_mfo->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "gridedit" && ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT || $frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) && $frm_fp_rep_a_eligible_status_unit_mfo->EventCancelled) // Update failed
			$frm_fp_rep_a_eligible_status_unit_mfo_grid->RestoreCurrentRowFormValues($frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex); // Restore form values
		if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) // Edit row
			$frm_fp_rep_a_eligible_status_unit_mfo_grid->EditRowCnt++;
		if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "F") // Confirm row
			$frm_fp_rep_a_eligible_status_unit_mfo_grid->RestoreCurrentRowFormValues($frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex); // Restore form values
		if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD || $frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "edit") {
				$frm_fp_rep_a_eligible_status_unit_mfo->RowAttrs = array();
				$frm_fp_rep_a_eligible_status_unit_mfo->CssClass = "upTableEditRow";
			} else {
				$frm_fp_rep_a_eligible_status_unit_mfo->RowAttrs = array();
			}
			if (!empty($frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex))
				$frm_fp_rep_a_eligible_status_unit_mfo->RowAttrs = array_merge($frm_fp_rep_a_eligible_status_unit_mfo->RowAttrs, array('data-rowindex'=>$frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex, 'id'=>'r' . $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex . '_frm_fp_rep_a_eligible_status_unit_mfo'));
		} else {
			$frm_fp_rep_a_eligible_status_unit_mfo->RowAttrs = array();
		}

		// Render row
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->RenderRow();

		// Render list options
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($frm_fp_rep_a_eligible_status_unit_mfo_grid->RowAction <> "delete" && $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowAction <> "insertdelete" && !($frm_fp_rep_a_eligible_status_unit_mfo_grid->RowAction == "insert" && $frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "F" && $frm_fp_rep_a_eligible_status_unit_mfo_grid->EmptyRow())) {
?>
	<tr<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_rep_a_eligible_status_unit_mfo_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->Visible) { // cu_unit_name ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->OldValue) ?>">
<?php } ?>
<a name="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->PageObjName . "_row_" . $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowCnt ?>" id="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->PageObjName . "_row_" . $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->Visible) { // mfo_name_rep ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" size="30" maxlength="255" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" size="30" maxlength="255" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->Visible) { // Participated PI ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->Visible) { // Not Started PI ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->Visible) { // % Not Started PI ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Status->Visible) { // Status ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" size="30" maxlength="255" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Status->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" size="30" maxlength="255" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Status->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Status->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->Visible) { // Not Eligible PI Count ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->Visible) { // % Not Eligible PI Count ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->Visible) { // Eligible PI Count ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->Visible) { // % Eligible PI Count ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->Visible) { // Remarks ?>
		<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CellAttributes() ?>>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" size="30" maxlength="16" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" size="30" maxlength="16" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" id="o<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_rep_a_eligible_status_unit_mfo_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction <> "gridadd" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "copy")
		if (!$frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset->EOF) $frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset->MoveNext();
}
?>
<?php
	if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "add" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "copy" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "edit") {
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex = '$rowindex$';
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->LoadDefaultValues();

		// Set row properties
		$frm_fp_rep_a_eligible_status_unit_mfo->ResetAttrs();
		$frm_fp_rep_a_eligible_status_unit_mfo->RowAttrs = array();
		if (!empty($frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex))
			$frm_fp_rep_a_eligible_status_unit_mfo->RowAttrs = array_merge($frm_fp_rep_a_eligible_status_unit_mfo->RowAttrs, array('data-rowindex'=>$frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex, 'id'=>'r' . $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex . '_frm_fp_rep_a_eligible_status_unit_mfo'));
		$frm_fp_rep_a_eligible_status_unit_mfo->RowType = UP_ROWTYPE_ADD;

		// Render row
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->RenderRow();

		// Render list options
		$frm_fp_rep_a_eligible_status_unit_mfo_grid->RenderListOptions();

		// Add id and class to the template row
		$frm_fp_rep_a_eligible_status_unit_mfo->RowAttrs["id"] = "r0_frm_fp_rep_a_eligible_status_unit_mfo";
		up_AppendClass($frm_fp_rep_a_eligible_status_unit_mfo->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_rep_a_eligible_status_unit_mfo_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->Visible) { // cu_unit_name ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->Visible) { // mfo_name_rep ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" size="30" maxlength="255" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_mfo_name_rep" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->Visible) { // Participated PI ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Participated_PI" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->Visible) { // Not Started PI ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Started_PI" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->Visible) { // % Not Started PI ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Started_PI" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Status->Visible) { // Status ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" size="30" maxlength="255" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Status" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Status->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->Visible) { // Not Eligible PI Count ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Not_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->Visible) { // % Not Eligible PI Count ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Not_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->Visible) { // Eligible PI Count ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->Visible) { // % Eligible PI Count ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" size="30" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_z25_Eligible_PI_Count" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->Visible) { // Remarks ?>
		<td>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" size="30" maxlength="16" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->EditValue ?>"<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->RowIndex ?>_Remarks" value="<?php echo up_HtmlEncode($frm_fp_rep_a_eligible_status_unit_mfo->Remarks->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_rep_a_eligible_status_unit_mfo_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "add" || $frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->KeyCount ?>">
<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->KeyCount ?>">
<?php echo $frm_fp_rep_a_eligible_status_unit_mfo_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="frm_fp_rep_a_eligible_status_unit_mfo_grid">
</div>
<?php

// Close recordset
if ($frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset)
	$frm_fp_rep_a_eligible_status_unit_mfo_grid->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_fp_rep_a_eligible_status_unit_mfo->Export == "" && $frm_fp_rep_a_eligible_status_unit_mfo->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_fp_rep_a_eligible_status_unit_mfo_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$frm_fp_rep_a_eligible_status_unit_mfo_grid->Page_Terminate();
$Page =& $MasterPage;
?>
