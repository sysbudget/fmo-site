<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php

// Create page object
$frm_2_a_fi_pbb_detail_delivery_grid = new cfrm_2_a_fi_pbb_detail_delivery_grid();
$MasterPage =& $Page;
$Page =& $frm_2_a_fi_pbb_detail_delivery_grid;

// Page init
$frm_2_a_fi_pbb_detail_delivery_grid->Page_Init();

// Page main
$frm_2_a_fi_pbb_detail_delivery_grid->Page_Main();
?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_2_a_fi_pbb_detail_delivery_grid = new up_Page("frm_2_a_fi_pbb_detail_delivery_grid");

// page properties
frm_2_a_fi_pbb_detail_delivery_grid.PageID = "grid"; // page ID
frm_2_a_fi_pbb_detail_delivery_grid.FormID = "ffrm_2_a_fi_pbb_detail_deliverygrid"; // form ID
var UP_PAGE_ID = frm_2_a_fi_pbb_detail_delivery_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_2_a_fi_pbb_detail_delivery_grid.ValidateForm = function(fobj) {
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
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_delivery->Target->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Accomplishment"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_delivery->Accomplishment->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Numerator"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_delivery->Numerator->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Denominator"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_delivery->Denominator->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Below_10025_Performance_Rating"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_z10025_to_12025_Performance_Rating"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Above_12025_Performance_Rating"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->FldErrMsg()) ?>");

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
frm_2_a_fi_pbb_detail_delivery_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "Delivery_Unit", false)) return false;
	if (up_ValueChanged(fobj, infix, "MFO", false)) return false;
	if (up_ValueChanged(fobj, infix, "Applicable", false)) return false;
	if (up_ValueChanged(fobj, infix, "Target", false)) return false;
	if (up_ValueChanged(fobj, infix, "Target_Cut2DOff_Date", false)) return false;
	if (up_ValueChanged(fobj, infix, "Accomplishment", false)) return false;
	if (up_ValueChanged(fobj, infix, "Numerator", false)) return false;
	if (up_ValueChanged(fobj, infix, "Denominator", false)) return false;
	if (up_ValueChanged(fobj, infix, "Accomplishment_Remarks", false)) return false;
	if (up_ValueChanged(fobj, infix, "Below_10025_Performance_Rating", false)) return false;
	if (up_ValueChanged(fobj, infix, "z10025_to_12025_Performance_Rating", false)) return false;
	if (up_ValueChanged(fobj, infix, "Above_12025_Performance_Rating", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
frm_2_a_fi_pbb_detail_delivery_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_2_a_fi_pbb_detail_delivery_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_2_a_fi_pbb_detail_delivery_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_2_a_fi_pbb_detail_delivery_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridadd") {
	if ($frm_2_a_fi_pbb_detail_delivery->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$frm_2_a_fi_pbb_detail_delivery_grid->TotalRecs = $frm_2_a_fi_pbb_detail_delivery->SelectRecordCount();
			$frm_2_a_fi_pbb_detail_delivery_grid->Recordset = $frm_2_a_fi_pbb_detail_delivery_grid->LoadRecordset($frm_2_a_fi_pbb_detail_delivery_grid->StartRec-1, $frm_2_a_fi_pbb_detail_delivery_grid->DisplayRecs);
		} else {
			if ($frm_2_a_fi_pbb_detail_delivery_grid->Recordset = $frm_2_a_fi_pbb_detail_delivery_grid->LoadRecordset())
				$frm_2_a_fi_pbb_detail_delivery_grid->TotalRecs = $frm_2_a_fi_pbb_detail_delivery_grid->Recordset->RecordCount();
		}
		$frm_2_a_fi_pbb_detail_delivery_grid->StartRec = 1;
		$frm_2_a_fi_pbb_detail_delivery_grid->DisplayRecs = $frm_2_a_fi_pbb_detail_delivery_grid->TotalRecs;
	} else {
		$frm_2_a_fi_pbb_detail_delivery->CurrentFilter = "0=1";
		$frm_2_a_fi_pbb_detail_delivery_grid->StartRec = 1;
		$frm_2_a_fi_pbb_detail_delivery_grid->DisplayRecs = $frm_2_a_fi_pbb_detail_delivery->GridAddRowCount;
	}
	$frm_2_a_fi_pbb_detail_delivery_grid->TotalRecs = $frm_2_a_fi_pbb_detail_delivery_grid->DisplayRecs;
	$frm_2_a_fi_pbb_detail_delivery_grid->StopRec = $frm_2_a_fi_pbb_detail_delivery_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_2_a_fi_pbb_detail_delivery_grid->TotalRecs = $frm_2_a_fi_pbb_detail_delivery->SelectRecordCount();
	} else {
		if ($frm_2_a_fi_pbb_detail_delivery_grid->Recordset = $frm_2_a_fi_pbb_detail_delivery_grid->LoadRecordset())
			$frm_2_a_fi_pbb_detail_delivery_grid->TotalRecs = $frm_2_a_fi_pbb_detail_delivery_grid->Recordset->RecordCount();
	}
	$frm_2_a_fi_pbb_detail_delivery_grid->StartRec = 1;
	$frm_2_a_fi_pbb_detail_delivery_grid->DisplayRecs = $frm_2_a_fi_pbb_detail_delivery_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$frm_2_a_fi_pbb_detail_delivery_grid->Recordset = $frm_2_a_fi_pbb_detail_delivery_grid->LoadRecordset($frm_2_a_fi_pbb_detail_delivery_grid->StartRec-1, $frm_2_a_fi_pbb_detail_delivery_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentMode == "add" || $frm_2_a_fi_pbb_detail_delivery->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_2_a_fi_pbb_detail_delivery->TableCaption() ?></p>
</p>
<?php $frm_2_a_fi_pbb_detail_delivery_grid->ShowPageHeader(); ?>
<?php
$frm_2_a_fi_pbb_detail_delivery_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($frm_2_a_fi_pbb_detail_delivery->CurrentMode == "add" || $frm_2_a_fi_pbb_detail_delivery->CurrentMode == "copy" || $frm_2_a_fi_pbb_detail_delivery->CurrentMode == "edit") && $frm_2_a_fi_pbb_detail_delivery->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_frm_2_a_fi_pbb_detail_delivery" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_2_a_fi_pbb_detail_delivery->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_2_a_fi_pbb_detail_delivery_grid->RenderListOptions();

// Render list options (header, left)
$frm_2_a_fi_pbb_detail_delivery_grid->ListOptions->Render("header", "left");
?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->Visible) { // Delivery Unit ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->SortUrl($frm_2_a_fi_pbb_detail_delivery->Delivery_Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_delivery->MFO->Visible) { // MFO ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->SortUrl($frm_2_a_fi_pbb_detail_delivery->MFO) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_delivery->MFO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->MFO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_delivery->Applicable->Visible) { // Applicable ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->SortUrl($frm_2_a_fi_pbb_detail_delivery->Applicable) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_delivery->Applicable->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->Applicable->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_delivery->Target->Visible) { // Target ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->SortUrl($frm_2_a_fi_pbb_detail_delivery->Target) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_delivery->Target->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_delivery->Target->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_delivery->Target->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->Target->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->Visible) { // Target Cut-Off Date ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->SortUrl($frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_delivery->Accomplishment->Visible) { // Accomplishment ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->SortUrl($frm_2_a_fi_pbb_detail_delivery->Accomplishment) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_delivery->Accomplishment->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->Accomplishment->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_delivery->Numerator->Visible) { // Numerator ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->SortUrl($frm_2_a_fi_pbb_detail_delivery->Numerator) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_delivery->Numerator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->Numerator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_delivery->Denominator->Visible) { // Denominator ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->SortUrl($frm_2_a_fi_pbb_detail_delivery->Denominator) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_delivery->Denominator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->Denominator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->Visible) { // Accomplishment Remarks ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->SortUrl($frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->Visible) { // Below 100% Performance Rating ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->SortUrl($frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->Visible) { // 100% to 120% Performance Rating ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->SortUrl($frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->Visible) { // Above 120% Performance Rating ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->SortUrl($frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating) == "") { ?>
		<td><?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_2_a_fi_pbb_detail_delivery_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$frm_2_a_fi_pbb_detail_delivery_grid->StartRec = 1;
$frm_2_a_fi_pbb_detail_delivery_grid->StopRec = $frm_2_a_fi_pbb_detail_delivery_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridadd" || $frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridedit" || $frm_2_a_fi_pbb_detail_delivery->CurrentAction == "F")) {
		$frm_2_a_fi_pbb_detail_delivery_grid->KeyCount = $objForm->GetValue("key_count");
		$frm_2_a_fi_pbb_detail_delivery_grid->StopRec = $frm_2_a_fi_pbb_detail_delivery_grid->KeyCount;
	}
}
$frm_2_a_fi_pbb_detail_delivery_grid->RecCnt = $frm_2_a_fi_pbb_detail_delivery_grid->StartRec - 1;
if ($frm_2_a_fi_pbb_detail_delivery_grid->Recordset && !$frm_2_a_fi_pbb_detail_delivery_grid->Recordset->EOF) {
	$frm_2_a_fi_pbb_detail_delivery_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_2_a_fi_pbb_detail_delivery_grid->StartRec > 1)
		$frm_2_a_fi_pbb_detail_delivery_grid->Recordset->Move($frm_2_a_fi_pbb_detail_delivery_grid->StartRec - 1);
} elseif (!$frm_2_a_fi_pbb_detail_delivery->AllowAddDeleteRow && $frm_2_a_fi_pbb_detail_delivery_grid->StopRec == 0) {
	$frm_2_a_fi_pbb_detail_delivery_grid->StopRec = $frm_2_a_fi_pbb_detail_delivery->GridAddRowCount;
}

// Initialize aggregate
$frm_2_a_fi_pbb_detail_delivery->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_2_a_fi_pbb_detail_delivery->ResetAttrs();
$frm_2_a_fi_pbb_detail_delivery_grid->RenderRow();
$frm_2_a_fi_pbb_detail_delivery_grid->RowCnt = 0;
if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridadd")
	$frm_2_a_fi_pbb_detail_delivery_grid->RowIndex = 0;
if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridedit")
	$frm_2_a_fi_pbb_detail_delivery_grid->RowIndex = 0;
while ($frm_2_a_fi_pbb_detail_delivery_grid->RecCnt < $frm_2_a_fi_pbb_detail_delivery_grid->StopRec) {
	$frm_2_a_fi_pbb_detail_delivery_grid->RecCnt++;
	if (intval($frm_2_a_fi_pbb_detail_delivery_grid->RecCnt) >= intval($frm_2_a_fi_pbb_detail_delivery_grid->StartRec)) {
		$frm_2_a_fi_pbb_detail_delivery_grid->RowCnt++;
		if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridadd" || $frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridedit" || $frm_2_a_fi_pbb_detail_delivery->CurrentAction == "F")
			$frm_2_a_fi_pbb_detail_delivery_grid->RowIndex++;

		// Set up key count
		$frm_2_a_fi_pbb_detail_delivery_grid->KeyCount = $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex;

		// Init row class and style
		$frm_2_a_fi_pbb_detail_delivery->ResetAttrs();
		$frm_2_a_fi_pbb_detail_delivery->CssClass = "";
		if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridadd") {
			if ($frm_2_a_fi_pbb_detail_delivery->CurrentMode == "copy") {
				$frm_2_a_fi_pbb_detail_delivery_grid->LoadRowValues($frm_2_a_fi_pbb_detail_delivery_grid->Recordset); // Load row values
				$frm_2_a_fi_pbb_detail_delivery_grid->SetRecordKey($frm_2_a_fi_pbb_detail_delivery_grid->RowOldKey, $frm_2_a_fi_pbb_detail_delivery_grid->Recordset); // Set old record key
			} else {
				$frm_2_a_fi_pbb_detail_delivery_grid->LoadDefaultValues(); // Load default values
				$frm_2_a_fi_pbb_detail_delivery_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridedit") {
			$frm_2_a_fi_pbb_detail_delivery_grid->LoadRowValues($frm_2_a_fi_pbb_detail_delivery_grid->Recordset); // Load row values
		}
		$frm_2_a_fi_pbb_detail_delivery->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridadd") // Grid add
			$frm_2_a_fi_pbb_detail_delivery->RowType = UP_ROWTYPE_ADD; // Render add
		if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridadd" && $frm_2_a_fi_pbb_detail_delivery->EventCancelled) // Insert failed
			$frm_2_a_fi_pbb_detail_delivery_grid->RestoreCurrentRowFormValues($frm_2_a_fi_pbb_detail_delivery_grid->RowIndex); // Restore form values
		if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridedit") { // Grid edit
			if ($frm_2_a_fi_pbb_detail_delivery->EventCancelled) {
				$frm_2_a_fi_pbb_detail_delivery_grid->RestoreCurrentRowFormValues($frm_2_a_fi_pbb_detail_delivery_grid->RowIndex); // Restore form values
			}
			if ($frm_2_a_fi_pbb_detail_delivery_grid->RowAction == "insert")
				$frm_2_a_fi_pbb_detail_delivery->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$frm_2_a_fi_pbb_detail_delivery->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "gridedit" && ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT || $frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) && $frm_2_a_fi_pbb_detail_delivery->EventCancelled) // Update failed
			$frm_2_a_fi_pbb_detail_delivery_grid->RestoreCurrentRowFormValues($frm_2_a_fi_pbb_detail_delivery_grid->RowIndex); // Restore form values
		if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) // Edit row
			$frm_2_a_fi_pbb_detail_delivery_grid->EditRowCnt++;
		if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "F") // Confirm row
			$frm_2_a_fi_pbb_detail_delivery_grid->RestoreCurrentRowFormValues($frm_2_a_fi_pbb_detail_delivery_grid->RowIndex); // Restore form values
		if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD || $frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction == "edit") {
				$frm_2_a_fi_pbb_detail_delivery->RowAttrs = array();
				$frm_2_a_fi_pbb_detail_delivery->CssClass = "upTableEditRow";
			} else {
				$frm_2_a_fi_pbb_detail_delivery->RowAttrs = array();
			}
			if (!empty($frm_2_a_fi_pbb_detail_delivery_grid->RowIndex))
				$frm_2_a_fi_pbb_detail_delivery->RowAttrs = array_merge($frm_2_a_fi_pbb_detail_delivery->RowAttrs, array('data-rowindex'=>$frm_2_a_fi_pbb_detail_delivery_grid->RowIndex, 'id'=>'r' . $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex . '_frm_2_a_fi_pbb_detail_delivery'));
		} else {
			$frm_2_a_fi_pbb_detail_delivery->RowAttrs = array();
		}

		// Render row
		$frm_2_a_fi_pbb_detail_delivery_grid->RenderRow();

		// Render list options
		$frm_2_a_fi_pbb_detail_delivery_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($frm_2_a_fi_pbb_detail_delivery_grid->RowAction <> "delete" && $frm_2_a_fi_pbb_detail_delivery_grid->RowAction <> "insertdelete" && !($frm_2_a_fi_pbb_detail_delivery_grid->RowAction == "insert" && $frm_2_a_fi_pbb_detail_delivery->CurrentAction == "F" && $frm_2_a_fi_pbb_detail_delivery_grid->EmptyRow())) {
?>
	<tr<?php echo $frm_2_a_fi_pbb_detail_delivery->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_2_a_fi_pbb_detail_delivery_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->Visible) { // Delivery Unit ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->OldValue) ?>">
<?php } ?>
<a name="<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->PageObjName . "_row_" . $frm_2_a_fi_pbb_detail_delivery_grid->RowCnt ?>" id="<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->PageObjName . "_row_" . $frm_2_a_fi_pbb_detail_delivery_grid->RowCnt ?>"></a>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_pbb_delivery_id" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_pbb_delivery_id" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->pbb_delivery_id->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_pbb_delivery_id" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_pbb_delivery_id" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->pbb_delivery_id->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->MFO->Visible) { // MFO ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->MFO->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->MFO->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->MFO->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Applicable->Visible) { // Applicable ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" value="{value}"<?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_2_a_fi_pbb_detail_delivery->Applicable->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_2_a_fi_pbb_detail_delivery->Applicable->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_2_a_fi_pbb_detail_delivery->Applicable->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Applicable->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" value="{value}"<?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_2_a_fi_pbb_detail_delivery->Applicable->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_2_a_fi_pbb_detail_delivery->Applicable->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_2_a_fi_pbb_detail_delivery->Applicable->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Applicable->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Applicable->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Target->Visible) { // Target ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_delivery->Target->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Target->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Target->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Target->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Target->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Target->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Target->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Target->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Target->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Target->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->Visible) { // Target Cut-Off Date ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Accomplishment->Visible) { // Accomplishment ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Accomplishment->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Accomplishment->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Accomplishment->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Numerator->Visible) { // Numerator ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Numerator->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Numerator->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Numerator->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Denominator->Visible) { // Denominator ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Denominator->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Denominator->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Denominator->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->Visible) { // Accomplishment Remarks ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" size="30" maxlength="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" size="30" maxlength="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->Visible) { // Below 100% Performance Rating ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->Visible) { // 100% to 120% Performance Rating ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->Visible) { // Above 120% Performance Rating ?>
		<td<?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->CellAttributes() ?>>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->OldValue) ?>">
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" id="o<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_2_a_fi_pbb_detail_delivery_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "gridadd" || $frm_2_a_fi_pbb_detail_delivery->CurrentMode == "copy")
		if (!$frm_2_a_fi_pbb_detail_delivery_grid->Recordset->EOF) $frm_2_a_fi_pbb_detail_delivery_grid->Recordset->MoveNext();
}
?>
<?php
	if ($frm_2_a_fi_pbb_detail_delivery->CurrentMode == "add" || $frm_2_a_fi_pbb_detail_delivery->CurrentMode == "copy" || $frm_2_a_fi_pbb_detail_delivery->CurrentMode == "edit") {
		$frm_2_a_fi_pbb_detail_delivery_grid->RowIndex = '$rowindex$';
		$frm_2_a_fi_pbb_detail_delivery_grid->LoadDefaultValues();

		// Set row properties
		$frm_2_a_fi_pbb_detail_delivery->ResetAttrs();
		$frm_2_a_fi_pbb_detail_delivery->RowAttrs = array();
		if (!empty($frm_2_a_fi_pbb_detail_delivery_grid->RowIndex))
			$frm_2_a_fi_pbb_detail_delivery->RowAttrs = array_merge($frm_2_a_fi_pbb_detail_delivery->RowAttrs, array('data-rowindex'=>$frm_2_a_fi_pbb_detail_delivery_grid->RowIndex, 'id'=>'r' . $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex . '_frm_2_a_fi_pbb_detail_delivery'));
		$frm_2_a_fi_pbb_detail_delivery->RowType = UP_ROWTYPE_ADD;

		// Render row
		$frm_2_a_fi_pbb_detail_delivery_grid->RenderRow();

		// Render list options
		$frm_2_a_fi_pbb_detail_delivery_grid->RenderListOptions();

		// Add id and class to the template row
		$frm_2_a_fi_pbb_detail_delivery->RowAttrs["id"] = "r0_frm_2_a_fi_pbb_detail_delivery";
		up_AppendClass($frm_2_a_fi_pbb_detail_delivery->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $frm_2_a_fi_pbb_detail_delivery->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_2_a_fi_pbb_detail_delivery_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->Visible) { // Delivery Unit ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Delivery_Unit->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->MFO->Visible) { // MFO ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->MFO->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->MFO->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Applicable->Visible) { // Applicable ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" value="{value}"<?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_2_a_fi_pbb_detail_delivery->Applicable->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_2_a_fi_pbb_detail_delivery->Applicable->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_2_a_fi_pbb_detail_delivery->Applicable->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Applicable->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Applicable->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Target->Visible) { // Target ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Target->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Target->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Target->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Target->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Target->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->Visible) { // Target Cut-Off Date ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" size="30" maxlength="255" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Target_Cut2DOff_Date->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Accomplishment->Visible) { // Accomplishment ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Accomplishment->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Numerator->Visible) { // Numerator ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Numerator->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Numerator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Numerator->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Denominator->Visible) { // Denominator ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Denominator->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Denominator" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Denominator->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->Visible) { // Accomplishment Remarks ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" size="30" maxlength="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Accomplishment_Remarks" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Accomplishment_Remarks->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->Visible) { // Below 100% Performance Rating ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Below_10025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Below_10025_Performance_Rating->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->Visible) { // 100% to 120% Performance Rating ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_z10025_to_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->Visible) { // Above 120% Performance Rating ?>
		<td>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" size="30" value="<?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->EditValue ?>"<?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" id="x<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->RowIndex ?>_Above_12025_Performance_Rating" value="<?php echo up_HtmlEncode($frm_2_a_fi_pbb_detail_delivery->Above_12025_Performance_Rating->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_2_a_fi_pbb_detail_delivery_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentMode == "add" || $frm_2_a_fi_pbb_detail_delivery->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->KeyCount ?>">
<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($frm_2_a_fi_pbb_detail_delivery->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->KeyCount ?>">
<?php echo $frm_2_a_fi_pbb_detail_delivery_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="frm_2_a_fi_pbb_detail_delivery_grid">
</div>
<?php

// Close recordset
if ($frm_2_a_fi_pbb_detail_delivery_grid->Recordset)
	$frm_2_a_fi_pbb_detail_delivery_grid->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_2_a_fi_pbb_detail_delivery->Export == "" && $frm_2_a_fi_pbb_detail_delivery->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_2_a_fi_pbb_detail_delivery_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$frm_2_a_fi_pbb_detail_delivery_grid->Page_Terminate();
$Page =& $MasterPage;
?>
