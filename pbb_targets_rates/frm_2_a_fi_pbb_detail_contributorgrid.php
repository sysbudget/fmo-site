<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php

// Create page object
$frm_2_a_fi_pbb_detail_contributor_grid = new cfrm_2_a_fi_pbb_detail_contributor_grid();
$MasterPage =& $Page;
$Page =& $frm_2_a_fi_pbb_detail_contributor_grid;

// Page init
$frm_2_a_fi_pbb_detail_contributor_grid->Page_Init();

// Page main
$frm_2_a_fi_pbb_detail_contributor_grid->Page_Main();
?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_2_a_fi_pbb_detail_contributor_grid = new up_Page("frm_2_a_fi_pbb_detail_contributor_grid");

// page properties
frm_2_a_fi_pbb_detail_contributor_grid.PageID = "grid"; // page ID
frm_2_a_fi_pbb_detail_contributor_grid.FormID = "ffrm_2_a_fi_pbb_detail_contributorgrid"; // form ID
var UP_PAGE_ID = frm_2_a_fi_pbb_detail_contributor_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_2_a_fi_pbb_detail_contributor_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_Target"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Target->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Accomplishment"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Accomplishment->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Numerator"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Numerator->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Jan2DMar_28N29"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Apr2DJun_28N29"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Jul2DSep_28N29"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Oct2DNov_28N29"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Denominator"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Denominator->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Jan2DMar_28D29"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Apr2DJun_28D29"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Jul2DSep_28D29"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Oct2DNov_28D29"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Below_10025_Performance_Rating"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_z10025_to_12025_Performance_Rating"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Above_12025_Performance_Rating"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->FldErrMsg()) ?>");

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
frm_2_a_fi_pbb_detail_contributor_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "Contributing_Unit", false)) return false;
	if (up_ValueChanged(fobj, infix, "MFO", false)) return false;
	if (up_ValueChanged(fobj, infix, "Question", false)) return false;
	if (up_ValueChanged(fobj, infix, "Applicable", false)) return false;
	if (up_ValueChanged(fobj, infix, "Target", false)) return false;
	if (up_ValueChanged(fobj, infix, "Target_Remarks", false)) return false;
	if (up_ValueChanged(fobj, infix, "Target_Cut2DOff_Date", false)) return false;
	if (up_ValueChanged(fobj, infix, "Target_Message", false)) return false;
	if (up_ValueChanged(fobj, infix, "Accomplishment", false)) return false;
	if (up_ValueChanged(fobj, infix, "Numerator", false)) return false;
	if (up_ValueChanged(fobj, infix, "Jan2DMar_28N29", false)) return false;
	if (up_ValueChanged(fobj, infix, "Apr2DJun_28N29", false)) return false;
	if (up_ValueChanged(fobj, infix, "Jul2DSep_28N29", false)) return false;
	if (up_ValueChanged(fobj, infix, "Oct2DNov_28N29", false)) return false;
	if (up_ValueChanged(fobj, infix, "Denominator", false)) return false;
	if (up_ValueChanged(fobj, infix, "Jan2DMar_28D29", false)) return false;
	if (up_ValueChanged(fobj, infix, "Apr2DJun_28D29", false)) return false;
	if (up_ValueChanged(fobj, infix, "Jul2DSep_28D29", false)) return false;
	if (up_ValueChanged(fobj, infix, "Oct2DNov_28D29", false)) return false;
	if (up_ValueChanged(fobj, infix, "Accomplishment_Remarks", false)) return false;
	if (up_ValueChanged(fobj, infix, "Below_10025_Performance_Rating", false)) return false;
	if (up_ValueChanged(fobj, infix, "z10025_to_12025_Performance_Rating", false)) return false;
	if (up_ValueChanged(fobj, infix, "Above_12025_Performance_Rating", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
frm_2_a_fi_pbb_detail_contributor_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_2_a_fi_pbb_detail_contributor_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_2_a_fi_pbb_detail_contributor_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_2_a_fi_pbb_detail_contributor_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridadd") {
	if ($frm_2_a_fi_pbb_detail_contributor->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$frm_2_a_fi_pbb_detail_contributor_grid->TotalRecs = $frm_2_a_fi_pbb_detail_contributor->SelectRecordCount();
			$frm_2_a_fi_pbb_detail_contributor_grid->Recordset = $frm_2_a_fi_pbb_detail_contributor_grid->LoadRecordset($frm_2_a_fi_pbb_detail_contributor_grid->StartRec-1, $frm_2_a_fi_pbb_detail_contributor_grid->DisplayRecs);
		} else {
			if ($frm_2_a_fi_pbb_detail_contributor_grid->Recordset = $frm_2_a_fi_pbb_detail_contributor_grid->LoadRecordset())
				$frm_2_a_fi_pbb_detail_contributor_grid->TotalRecs = $frm_2_a_fi_pbb_detail_contributor_grid->Recordset->RecordCount();
		}
		$frm_2_a_fi_pbb_detail_contributor_grid->StartRec = 1;
		$frm_2_a_fi_pbb_detail_contributor_grid->DisplayRecs = $frm_2_a_fi_pbb_detail_contributor_grid->TotalRecs;
	} else {
		$frm_2_a_fi_pbb_detail_contributor->CurrentFilter = "0=1";
		$frm_2_a_fi_pbb_detail_contributor_grid->StartRec = 1;
		$frm_2_a_fi_pbb_detail_contributor_grid->DisplayRecs = $frm_2_a_fi_pbb_detail_contributor->GridAddRowCount;
	}
	$frm_2_a_fi_pbb_detail_contributor_grid->TotalRecs = $frm_2_a_fi_pbb_detail_contributor_grid->DisplayRecs;
	$frm_2_a_fi_pbb_detail_contributor_grid->StopRec = $frm_2_a_fi_pbb_detail_contributor_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_2_a_fi_pbb_detail_contributor_grid->TotalRecs = $frm_2_a_fi_pbb_detail_contributor->SelectRecordCount();
	} else {
		if ($frm_2_a_fi_pbb_detail_contributor_grid->Recordset = $frm_2_a_fi_pbb_detail_contributor_grid->LoadRecordset())
			$frm_2_a_fi_pbb_detail_contributor_grid->TotalRecs = $frm_2_a_fi_pbb_detail_contributor_grid->Recordset->RecordCount();
	}
	$frm_2_a_fi_pbb_detail_contributor_grid->StartRec = 1;
	$frm_2_a_fi_pbb_detail_contributor_grid->DisplayRecs = $frm_2_a_fi_pbb_detail_contributor_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$frm_2_a_fi_pbb_detail_contributor_grid->Recordset = $frm_2_a_fi_pbb_detail_contributor_grid->LoadRecordset($frm_2_a_fi_pbb_detail_contributor_grid->StartRec-1, $frm_2_a_fi_pbb_detail_contributor_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentMode == "add" || $frm_2_a_fi_pbb_detail_contributor->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_2_a_fi_pbb_detail_contributor->TableCaption() ?></p>
</p>
<?php $frm_2_a_fi_pbb_detail_contributor_grid->ShowPageHeader(); ?>
<?php
$frm_2_a_fi_pbb_detail_contributor_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($frm_2_a_fi_pbb_detail_contributor->CurrentMode == "add" || $frm_2_a_fi_pbb_detail_contributor->CurrentMode == "copy" || $frm_2_a_fi_pbb_detail_contributor->CurrentMode == "edit") && $frm_2_a_fi_pbb_detail_contributor->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_frm_2_a_fi_pbb_detail_contributor" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_2_a_fi_pbb_detail_contributor->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_2_a_fi_pbb_detail_contributor_grid->RenderListOptions();

// Render list options (header, left)
$frm_2_a_fi_pbb_detail_contributor_grid->ListOptions->Render("header", "left");
?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->Visible) { // Contributing Unit ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Contributing_Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->MFO->Visible) { // MFO ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->MFO) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->MFO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->MFO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Question->Visible) { // Question ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Question) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Question->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Question->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Question->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Question->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Applicable->Visible) { // Applicable ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Applicable) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Applicable->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Applicable->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Target->Visible) { // Target ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Target) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Target->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Target->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Target->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Target->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Target_Remarks->Visible) { // Target Remarks ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Target_Remarks) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Target_Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Target_Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->Visible) { // Target Cut-Off Date ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Target_Message->Visible) { // Target Message ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Target_Message) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Target_Message->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Target_Message->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Accomplishment->Visible) { // Accomplishment ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Accomplishment) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Accomplishment->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Accomplishment->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Numerator->Visible) { // Numerator ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Numerator) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Numerator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Numerator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->Visible) { // Jan-Mar (N) ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->Visible) { // Apr-Jun (N) ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->Visible) { // Jul-Sep (N) ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->Visible) { // Oct-Nov (N) ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Denominator->Visible) { // Denominator ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Denominator) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Denominator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Denominator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->Visible) { // Jan-Mar (D) ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->Visible) { // Apr-Jun (D) ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->Visible) { // Jul-Sep (D) ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->Visible) { // Oct-Nov (D) ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->Visible) { // Accomplishment Remarks ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->Visible) { // Below 100% Performance Rating ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->Visible) { // 100% to 120% Performance Rating ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->Visible) { // Above 120% Performance Rating ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->SortUrl($frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_2_a_fi_pbb_detail_contributor_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$frm_2_a_fi_pbb_detail_contributor_grid->StartRec = 1;
$frm_2_a_fi_pbb_detail_contributor_grid->StopRec = $frm_2_a_fi_pbb_detail_contributor_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridadd" || $frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridedit" || $frm_2_a_fi_pbb_detail_contributor->CurrentAction == "F")) {
		$frm_2_a_fi_pbb_detail_contributor_grid->KeyCount = $objForm->GetValue("key_count");
		$frm_2_a_fi_pbb_detail_contributor_grid->StopRec = $frm_2_a_fi_pbb_detail_contributor_grid->KeyCount;
	}
}
$frm_2_a_fi_pbb_detail_contributor_grid->RecCnt = $frm_2_a_fi_pbb_detail_contributor_grid->StartRec - 1;
if ($frm_2_a_fi_pbb_detail_contributor_grid->Recordset && !$frm_2_a_fi_pbb_detail_contributor_grid->Recordset->EOF) {
	$frm_2_a_fi_pbb_detail_contributor_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_2_a_fi_pbb_detail_contributor_grid->StartRec > 1)
		$frm_2_a_fi_pbb_detail_contributor_grid->Recordset->Move($frm_2_a_fi_pbb_detail_contributor_grid->StartRec - 1);
} elseif (!$frm_2_a_fi_pbb_detail_contributor->AllowAddDeleteRow && $frm_2_a_fi_pbb_detail_contributor_grid->StopRec == 0) {
	$frm_2_a_fi_pbb_detail_contributor_grid->StopRec = $frm_2_a_fi_pbb_detail_contributor->GridAddRowCount;
}

// Initialize aggregate
$frm_2_a_fi_pbb_detail_contributor->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_2_a_fi_pbb_detail_contributor->ResetAttrs();
$frm_2_a_fi_pbb_detail_contributor_grid->RenderRow();
$frm_2_a_fi_pbb_detail_contributor_grid->RowCnt = 0;
if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridadd")
	$frm_2_a_fi_pbb_detail_contributor_grid->RowIndex = 0;
if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridedit")
	$frm_2_a_fi_pbb_detail_contributor_grid->RowIndex = 0;
while ($frm_2_a_fi_pbb_detail_contributor_grid->RecCnt < $frm_2_a_fi_pbb_detail_contributor_grid->StopRec) {
	$frm_2_a_fi_pbb_detail_contributor_grid->RecCnt++;
	if (intval($frm_2_a_fi_pbb_detail_contributor_grid->RecCnt) >= intval($frm_2_a_fi_pbb_detail_contributor_grid->StartRec)) {
		$frm_2_a_fi_pbb_detail_contributor_grid->RowCnt++;
		if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridadd" || $frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridedit" || $frm_2_a_fi_pbb_detail_contributor->CurrentAction == "F")
			$frm_2_a_fi_pbb_detail_contributor_grid->RowIndex++;

		// Set up key count
		$frm_2_a_fi_pbb_detail_contributor_grid->KeyCount = $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex;

		// Init row class and style
		$frm_2_a_fi_pbb_detail_contributor->ResetAttrs();
		$frm_2_a_fi_pbb_detail_contributor->CssClass = "";
		if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridadd") {
			if ($frm_2_a_fi_pbb_detail_contributor->CurrentMode == "copy") {
				$frm_2_a_fi_pbb_detail_contributor_grid->LoadRowValues($frm_2_a_fi_pbb_detail_contributor_grid->Recordset); // Load row values
				$frm_2_a_fi_pbb_detail_contributor_grid->SetRecordKey($frm_2_a_fi_pbb_detail_contributor_grid->RowOldKey, $frm_2_a_fi_pbb_detail_contributor_grid->Recordset); // Set old record key
			} else {
				$frm_2_a_fi_pbb_detail_contributor_grid->LoadDefaultValues(); // Load default values
				$frm_2_a_fi_pbb_detail_contributor_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridedit") {
			$frm_2_a_fi_pbb_detail_contributor_grid->LoadRowValues($frm_2_a_fi_pbb_detail_contributor_grid->Recordset); // Load row values
		}
		$frm_2_a_fi_pbb_detail_contributor->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridadd") // Grid add
			$frm_2_a_fi_pbb_detail_contributor->RowType = UP_ROWTYPE_ADD; // Render add
		if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridadd" && $frm_2_a_fi_pbb_detail_contributor->EventCancelled) // Insert failed
			$frm_2_a_fi_pbb_detail_contributor_grid->RestoreCurrentRowFormValues($frm_2_a_fi_pbb_detail_contributor_grid->RowIndex); // Restore form values
		if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridedit") { // Grid edit
			if ($frm_2_a_fi_pbb_detail_contributor->EventCancelled) {
				$frm_2_a_fi_pbb_detail_contributor_grid->RestoreCurrentRowFormValues($frm_2_a_fi_pbb_detail_contributor_grid->RowIndex); // Restore form values
			}
			if ($frm_2_a_fi_pbb_detail_contributor_grid->RowAction == "insert")
				$frm_2_a_fi_pbb_detail_contributor->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$frm_2_a_fi_pbb_detail_contributor->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "gridedit" && ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT || $frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) && $frm_2_a_fi_pbb_detail_contributor->EventCancelled) // Update failed
			$frm_2_a_fi_pbb_detail_contributor_grid->RestoreCurrentRowFormValues($frm_2_a_fi_pbb_detail_contributor_grid->RowIndex); // Restore form values
		if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) // Edit row
			$frm_2_a_fi_pbb_detail_contributor_grid->EditRowCnt++;
		if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "F") // Confirm row
			$frm_2_a_fi_pbb_detail_contributor_grid->RestoreCurrentRowFormValues($frm_2_a_fi_pbb_detail_contributor_grid->RowIndex); // Restore form values
		if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD || $frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction == "edit") {
				$frm_2_a_fi_pbb_detail_contributor->RowAttrs = array();
				$frm_2_a_fi_pbb_detail_contributor->CssClass = "upTableEditRow";
			} else {
				$frm_2_a_fi_pbb_detail_contributor->RowAttrs = array();
			}
			if (!empty($frm_2_a_fi_pbb_detail_contributor_grid->RowIndex))
				$frm_2_a_fi_pbb_detail_contributor->RowAttrs = array_merge($frm_2_a_fi_pbb_detail_contributor->RowAttrs, array('data-rowindex'=>$frm_2_a_fi_pbb_detail_contributor_grid->RowIndex, 'id'=>'r' . $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex . '_frm_2_a_fi_pbb_detail_contributor'));
		} else {
			$frm_2_a_fi_pbb_detail_contributor->RowAttrs = array();
		}

		// Render row
		$frm_2_a_fi_pbb_detail_contributor_grid->RenderRow();

		// Render list options
		$frm_2_a_fi_pbb_detail_contributor_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($frm_2_a_fi_pbb_detail_contributor_grid->RowAction <> "delete" && $frm_2_a_fi_pbb_detail_contributor_grid->RowAction <> "insertdelete" && !($frm_2_a_fi_pbb_detail_contributor_grid->RowAction == "insert" && $frm_2_a_fi_pbb_detail_contributor->CurrentAction == "F" && $frm_2_a_fi_pbb_detail_contributor_grid->EmptyRow())) {
?>
	<tr<?php echo $frm_2_a_fi_pbb_detail_contributor->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_2_a_fi_pbb_detail_contributor_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->Visible) { // Contributing Unit ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->OldValue) ?>">
<?php } ?>
<a name="<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->PageObjName . "_row_" . $frm_2_a_fi_pbb_detail_contributor_grid->RowCnt ?>" id="<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->PageObjName . "_row_" . $frm_2_a_fi_pbb_detail_contributor_grid->RowCnt ?>"></a>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_pbb_contributor_id" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_pbb_contributor_id" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->pbb_contributor_id->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_pbb_contributor_id" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_pbb_contributor_id" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->pbb_contributor_id->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->MFO->Visible) { // MFO ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->MFO->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->MFO->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->MFO->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->MFO->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Question->Visible) { // Question ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Question->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Question->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Question->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Question->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Question->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Question->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Question->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Question->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Question->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Question->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Question->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Applicable->Visible) { // Applicable ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="{value}"<?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_2_a_fi_pbb_detail_contributor->Applicable->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_2_a_fi_pbb_detail_contributor->Applicable->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_2_a_fi_pbb_detail_contributor->Applicable->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Applicable->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="{value}"<?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_2_a_fi_pbb_detail_contributor->Applicable->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_2_a_fi_pbb_detail_contributor->Applicable->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_2_a_fi_pbb_detail_contributor->Applicable->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Applicable->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Applicable->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Target->Visible) { // Target ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Target->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Target->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Target->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Target->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Target->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Target->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Target_Remarks->Visible) { // Target Remarks ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<textarea name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" cols="0" rows="0"<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->EditAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->EditValue ?></textarea>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Remarks->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<textarea name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" cols="0" rows="0"<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->EditAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->EditValue ?></textarea>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Remarks->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Remarks->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->Visible) { // Target Cut-Off Date ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Target_Message->Visible) { // Target Message ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Message->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Message->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Message->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Message->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Accomplishment->Visible) { // Accomplishment ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Accomplishment->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Accomplishment->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Accomplishment->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Numerator->Visible) { // Numerator ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Numerator->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Numerator->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Numerator->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->Visible) { // Jan-Mar (N) ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->Visible) { // Apr-Jun (N) ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->Visible) { // Jul-Sep (N) ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->Visible) { // Oct-Nov (N) ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Denominator->Visible) { // Denominator ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Denominator->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Denominator->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Denominator->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->Visible) { // Jan-Mar (D) ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->Visible) { // Apr-Jun (D) ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->Visible) { // Jul-Sep (D) ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->Visible) { // Oct-Nov (D) ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->Visible) { // Accomplishment Remarks ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" size="30" maxlength="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" size="30" maxlength="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->Visible) { // Below 100% Performance Rating ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->Visible) { // 100% to 120% Performance Rating ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->Visible) { // Above 120% Performance Rating ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" id="o<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_2_a_fi_pbb_detail_contributor_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "gridadd" || $frm_2_a_fi_pbb_detail_contributor->CurrentMode == "copy")
		if (!$frm_2_a_fi_pbb_detail_contributor_grid->Recordset->EOF) $frm_2_a_fi_pbb_detail_contributor_grid->Recordset->MoveNext();
}
?>
<?php
	if ($frm_2_a_fi_pbb_detail_contributor->CurrentMode == "add" || $frm_2_a_fi_pbb_detail_contributor->CurrentMode == "copy" || $frm_2_a_fi_pbb_detail_contributor->CurrentMode == "edit") {
		$frm_2_a_fi_pbb_detail_contributor_grid->RowIndex = '$rowindex$';
		$frm_2_a_fi_pbb_detail_contributor_grid->LoadDefaultValues();

		// Set row properties
		$frm_2_a_fi_pbb_detail_contributor->ResetAttrs();
		$frm_2_a_fi_pbb_detail_contributor->RowAttrs = array();
		if (!empty($frm_2_a_fi_pbb_detail_contributor_grid->RowIndex))
			$frm_2_a_fi_pbb_detail_contributor->RowAttrs = array_merge($frm_2_a_fi_pbb_detail_contributor->RowAttrs, array('data-rowindex'=>$frm_2_a_fi_pbb_detail_contributor_grid->RowIndex, 'id'=>'r' . $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex . '_frm_2_a_fi_pbb_detail_contributor'));
		$frm_2_a_fi_pbb_detail_contributor->RowType = UP_ROWTYPE_ADD;

		// Render row
		$frm_2_a_fi_pbb_detail_contributor_grid->RenderRow();

		// Render list options
		$frm_2_a_fi_pbb_detail_contributor_grid->RenderListOptions();

		// Add id and class to the template row
		$frm_2_a_fi_pbb_detail_contributor->RowAttrs["id"] = "r0_frm_2_a_fi_pbb_detail_contributor";
		up_AppendClass($frm_2_a_fi_pbb_detail_contributor->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $frm_2_a_fi_pbb_detail_contributor->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_2_a_fi_pbb_detail_contributor_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->Visible) { // Contributing Unit ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Contributing_Unit->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->MFO->Visible) { // MFO ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->MFO->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->MFO->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Question->Visible) { // Question ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Question->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Question->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Question->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Question->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Question" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Question->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Applicable->Visible) { // Applicable ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="{value}"<?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_2_a_fi_pbb_detail_contributor->Applicable->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_2_a_fi_pbb_detail_contributor->Applicable->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_2_a_fi_pbb_detail_contributor->Applicable->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Applicable->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Applicable->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Target->Visible) { // Target ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Target->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Target->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Target->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Target_Remarks->Visible) { // Target Remarks ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<textarea name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" cols="0" rows="0"<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->EditAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->EditValue ?></textarea>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Remarks->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Remarks->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->Visible) { // Target Cut-Off Date ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Cut2DOff_Date->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Target_Message->Visible) { // Target Message ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Target_Message->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Target_Message->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Accomplishment->Visible) { // Accomplishment ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Accomplishment->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Numerator->Visible) { // Numerator ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Numerator->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Numerator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Numerator->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->Visible) { // Jan-Mar (N) ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28N29->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->Visible) { // Apr-Jun (N) ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28N29->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->Visible) { // Jul-Sep (N) ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28N29->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->Visible) { // Oct-Nov (N) ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28N29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28N29->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Denominator->Visible) { // Denominator ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Denominator->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Denominator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Denominator->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->Visible) { // Jan-Mar (D) ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jan2DMar_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jan2DMar_28D29->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->Visible) { // Apr-Jun (D) ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Apr2DJun_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Apr2DJun_28D29->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->Visible) { // Jul-Sep (D) ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Jul2DSep_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Jul2DSep_28D29->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->Visible) { // Oct-Nov (D) ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Oct2DNov_28D29" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Oct2DNov_28D29->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->Visible) { // Accomplishment Remarks ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" size="30" maxlength="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Accomplishment_Remarks" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Accomplishment_Remarks->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->Visible) { // Below 100% Performance Rating ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Below_10025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Below_10025_Performance_Rating->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->Visible) { // 100% to 120% Performance Rating ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->Visible) { // Above 120% Performance Rating ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->RowIndex ?>_Above_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_contributor->Above_12025_Performance_Rating->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_2_a_fi_pbb_detail_contributor_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentMode == "add" || $frm_2_a_fi_pbb_detail_contributor->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->KeyCount ?>">
<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_contributor->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->KeyCount ?>">
<?php echo $frm_2_a_fi_pbb_detail_contributor_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="frm_2_a_fi_pbb_detail_contributor_grid">
</div>
<?php

// Close recordset
if ($frm_2_a_fi_pbb_detail_contributor_grid->Recordset)
	$frm_2_a_fi_pbb_detail_contributor_grid->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_2_a_fi_pbb_detail_contributor->Export == "" && $frm_2_a_fi_pbb_detail_contributor->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_2_a_fi_pbb_detail_contributor_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$frm_2_a_fi_pbb_detail_contributor_grid->Page_Terminate();
$Page =& $MasterPage;
?>
