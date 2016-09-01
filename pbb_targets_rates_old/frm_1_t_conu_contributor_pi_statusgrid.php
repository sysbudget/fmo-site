<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php

// Create page object
$frm_1_t_conu_contributor_pi_status_grid = new cfrm_1_t_conu_contributor_pi_status_grid();
$MasterPage =& $Page;
$Page =& $frm_1_t_conu_contributor_pi_status_grid;

// Page init
$frm_1_t_conu_contributor_pi_status_grid->Page_Init();

// Page main
$frm_1_t_conu_contributor_pi_status_grid->Page_Main();
?>
<?php if ($frm_1_t_conu_contributor_pi_status->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_1_t_conu_contributor_pi_status_grid = new up_Page("frm_1_t_conu_contributor_pi_status_grid");

// page properties
frm_1_t_conu_contributor_pi_status_grid.PageID = "grid"; // page ID
frm_1_t_conu_contributor_pi_status_grid.FormID = "ffrm_1_t_conu_contributor_pi_statusgrid"; // form ID
var UP_PAGE_ID = frm_1_t_conu_contributor_pi_status_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_1_t_conu_contributor_pi_status_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_PI_Count_per_MFO"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Not_Applicable_PI_Count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Completed_Target_PI_Count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_No_Target_PI_Count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->FldErrMsg()) ?>");

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
frm_1_t_conu_contributor_pi_status_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "Delivery_Unit", false)) return false;
	if (up_ValueChanged(fobj, infix, "Contributing_Unit", false)) return false;
	if (up_ValueChanged(fobj, infix, "MFO", false)) return false;
	if (up_ValueChanged(fobj, infix, "PI_Count_per_MFO", false)) return false;
	if (up_ValueChanged(fobj, infix, "Not_Applicable_PI_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "Completed_Target_PI_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "No_Target_PI_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "Remarks", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
frm_1_t_conu_contributor_pi_status_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_1_t_conu_contributor_pi_status_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_1_t_conu_contributor_pi_status_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_1_t_conu_contributor_pi_status_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($frm_1_t_conu_contributor_pi_status->CurrentAction == "gridadd") {
	if ($frm_1_t_conu_contributor_pi_status->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$frm_1_t_conu_contributor_pi_status_grid->TotalRecs = $frm_1_t_conu_contributor_pi_status->SelectRecordCount();
			$frm_1_t_conu_contributor_pi_status_grid->Recordset = $frm_1_t_conu_contributor_pi_status_grid->LoadRecordset($frm_1_t_conu_contributor_pi_status_grid->StartRec-1, $frm_1_t_conu_contributor_pi_status_grid->DisplayRecs);
		} else {
			if ($frm_1_t_conu_contributor_pi_status_grid->Recordset = $frm_1_t_conu_contributor_pi_status_grid->LoadRecordset())
				$frm_1_t_conu_contributor_pi_status_grid->TotalRecs = $frm_1_t_conu_contributor_pi_status_grid->Recordset->RecordCount();
		}
		$frm_1_t_conu_contributor_pi_status_grid->StartRec = 1;
		$frm_1_t_conu_contributor_pi_status_grid->DisplayRecs = $frm_1_t_conu_contributor_pi_status_grid->TotalRecs;
	} else {
		$frm_1_t_conu_contributor_pi_status->CurrentFilter = "0=1";
		$frm_1_t_conu_contributor_pi_status_grid->StartRec = 1;
		$frm_1_t_conu_contributor_pi_status_grid->DisplayRecs = $frm_1_t_conu_contributor_pi_status->GridAddRowCount;
	}
	$frm_1_t_conu_contributor_pi_status_grid->TotalRecs = $frm_1_t_conu_contributor_pi_status_grid->DisplayRecs;
	$frm_1_t_conu_contributor_pi_status_grid->StopRec = $frm_1_t_conu_contributor_pi_status_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_1_t_conu_contributor_pi_status_grid->TotalRecs = $frm_1_t_conu_contributor_pi_status->SelectRecordCount();
	} else {
		if ($frm_1_t_conu_contributor_pi_status_grid->Recordset = $frm_1_t_conu_contributor_pi_status_grid->LoadRecordset())
			$frm_1_t_conu_contributor_pi_status_grid->TotalRecs = $frm_1_t_conu_contributor_pi_status_grid->Recordset->RecordCount();
	}
	$frm_1_t_conu_contributor_pi_status_grid->StartRec = 1;
	$frm_1_t_conu_contributor_pi_status_grid->DisplayRecs = $frm_1_t_conu_contributor_pi_status_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$frm_1_t_conu_contributor_pi_status_grid->Recordset = $frm_1_t_conu_contributor_pi_status_grid->LoadRecordset($frm_1_t_conu_contributor_pi_status_grid->StartRec-1, $frm_1_t_conu_contributor_pi_status_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($frm_1_t_conu_contributor_pi_status->CurrentMode == "add" || $frm_1_t_conu_contributor_pi_status->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($frm_1_t_conu_contributor_pi_status->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_1_t_conu_contributor_pi_status->TableCaption() ?></p>
</p>
<?php $frm_1_t_conu_contributor_pi_status_grid->ShowPageHeader(); ?>
<?php
$frm_1_t_conu_contributor_pi_status_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($frm_1_t_conu_contributor_pi_status->CurrentMode == "add" || $frm_1_t_conu_contributor_pi_status->CurrentMode == "copy" || $frm_1_t_conu_contributor_pi_status->CurrentMode == "edit") && $frm_1_t_conu_contributor_pi_status->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_frm_1_t_conu_contributor_pi_status" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_1_t_conu_contributor_pi_status->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_1_t_conu_contributor_pi_status_grid->RenderListOptions();

// Render list options (header, left)
$frm_1_t_conu_contributor_pi_status_grid->ListOptions->Render("header", "left");
?>
<?php if ($frm_1_t_conu_contributor_pi_status->Delivery_Unit->Visible) { // Delivery Unit ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->SortUrl($frm_1_t_conu_contributor_pi_status->Delivery_Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_contributor_pi_status->Delivery_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_contributor_pi_status->Delivery_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_contributor_pi_status->Contributing_Unit->Visible) { // Contributing Unit ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->SortUrl($frm_1_t_conu_contributor_pi_status->Contributing_Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_contributor_pi_status->Contributing_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_contributor_pi_status->Contributing_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_contributor_pi_status->MFO->Visible) { // MFO ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->SortUrl($frm_1_t_conu_contributor_pi_status->MFO) == "") { ?>
		<td><?php echo $frm_1_t_conu_contributor_pi_status->MFO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_conu_contributor_pi_status->MFO->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_contributor_pi_status->MFO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_contributor_pi_status->MFO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->Visible) { // PI Count per MFO ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->SortUrl($frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO) == "") { ?>
		<td><?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->Visible) { // Not Applicable PI Count ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->SortUrl($frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count) == "") { ?>
		<td><?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->Visible) { // Completed Target PI Count ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->SortUrl($frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count) == "") { ?>
		<td><?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->Visible) { // No Target PI Count ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->SortUrl($frm_1_t_conu_contributor_pi_status->No_Target_PI_Count) == "") { ?>
		<td><?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_contributor_pi_status->Remarks->Visible) { // Remarks ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->SortUrl($frm_1_t_conu_contributor_pi_status->Remarks) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_conu_contributor_pi_status->Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_conu_contributor_pi_status->Remarks->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_contributor_pi_status->Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_contributor_pi_status->Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_1_t_conu_contributor_pi_status_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$frm_1_t_conu_contributor_pi_status_grid->StartRec = 1;
$frm_1_t_conu_contributor_pi_status_grid->StopRec = $frm_1_t_conu_contributor_pi_status_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($frm_1_t_conu_contributor_pi_status->CurrentAction == "gridadd" || $frm_1_t_conu_contributor_pi_status->CurrentAction == "gridedit" || $frm_1_t_conu_contributor_pi_status->CurrentAction == "F")) {
		$frm_1_t_conu_contributor_pi_status_grid->KeyCount = $objForm->GetValue("key_count");
		$frm_1_t_conu_contributor_pi_status_grid->StopRec = $frm_1_t_conu_contributor_pi_status_grid->KeyCount;
	}
}
$frm_1_t_conu_contributor_pi_status_grid->RecCnt = $frm_1_t_conu_contributor_pi_status_grid->StartRec - 1;
if ($frm_1_t_conu_contributor_pi_status_grid->Recordset && !$frm_1_t_conu_contributor_pi_status_grid->Recordset->EOF) {
	$frm_1_t_conu_contributor_pi_status_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_1_t_conu_contributor_pi_status_grid->StartRec > 1)
		$frm_1_t_conu_contributor_pi_status_grid->Recordset->Move($frm_1_t_conu_contributor_pi_status_grid->StartRec - 1);
} elseif (!$frm_1_t_conu_contributor_pi_status->AllowAddDeleteRow && $frm_1_t_conu_contributor_pi_status_grid->StopRec == 0) {
	$frm_1_t_conu_contributor_pi_status_grid->StopRec = $frm_1_t_conu_contributor_pi_status->GridAddRowCount;
}

// Initialize aggregate
$frm_1_t_conu_contributor_pi_status->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_1_t_conu_contributor_pi_status->ResetAttrs();
$frm_1_t_conu_contributor_pi_status_grid->RenderRow();
$frm_1_t_conu_contributor_pi_status_grid->RowCnt = 0;
if ($frm_1_t_conu_contributor_pi_status->CurrentAction == "gridadd")
	$frm_1_t_conu_contributor_pi_status_grid->RowIndex = 0;
if ($frm_1_t_conu_contributor_pi_status->CurrentAction == "gridedit")
	$frm_1_t_conu_contributor_pi_status_grid->RowIndex = 0;
while ($frm_1_t_conu_contributor_pi_status_grid->RecCnt < $frm_1_t_conu_contributor_pi_status_grid->StopRec) {
	$frm_1_t_conu_contributor_pi_status_grid->RecCnt++;
	if (intval($frm_1_t_conu_contributor_pi_status_grid->RecCnt) >= intval($frm_1_t_conu_contributor_pi_status_grid->StartRec)) {
		$frm_1_t_conu_contributor_pi_status_grid->RowCnt++;
		if ($frm_1_t_conu_contributor_pi_status->CurrentAction == "gridadd" || $frm_1_t_conu_contributor_pi_status->CurrentAction == "gridedit" || $frm_1_t_conu_contributor_pi_status->CurrentAction == "F")
			$frm_1_t_conu_contributor_pi_status_grid->RowIndex++;

		// Set up key count
		$frm_1_t_conu_contributor_pi_status_grid->KeyCount = $frm_1_t_conu_contributor_pi_status_grid->RowIndex;

		// Init row class and style
		$frm_1_t_conu_contributor_pi_status->ResetAttrs();
		$frm_1_t_conu_contributor_pi_status->CssClass = "";
		if ($frm_1_t_conu_contributor_pi_status->CurrentAction == "gridadd") {
			if ($frm_1_t_conu_contributor_pi_status->CurrentMode == "copy") {
				$frm_1_t_conu_contributor_pi_status_grid->LoadRowValues($frm_1_t_conu_contributor_pi_status_grid->Recordset); // Load row values
				$frm_1_t_conu_contributor_pi_status_grid->SetRecordKey($frm_1_t_conu_contributor_pi_status_grid->RowOldKey, $frm_1_t_conu_contributor_pi_status_grid->Recordset); // Set old record key
			} else {
				$frm_1_t_conu_contributor_pi_status_grid->LoadDefaultValues(); // Load default values
				$frm_1_t_conu_contributor_pi_status_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($frm_1_t_conu_contributor_pi_status->CurrentAction == "gridedit") {
			$frm_1_t_conu_contributor_pi_status_grid->LoadRowValues($frm_1_t_conu_contributor_pi_status_grid->Recordset); // Load row values
		}
		$frm_1_t_conu_contributor_pi_status->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($frm_1_t_conu_contributor_pi_status->CurrentAction == "gridadd") // Grid add
			$frm_1_t_conu_contributor_pi_status->RowType = UP_ROWTYPE_ADD; // Render add
		if ($frm_1_t_conu_contributor_pi_status->CurrentAction == "gridadd" && $frm_1_t_conu_contributor_pi_status->EventCancelled) // Insert failed
			$frm_1_t_conu_contributor_pi_status_grid->RestoreCurrentRowFormValues($frm_1_t_conu_contributor_pi_status_grid->RowIndex); // Restore form values
		if ($frm_1_t_conu_contributor_pi_status->CurrentAction == "gridedit") { // Grid edit
			if ($frm_1_t_conu_contributor_pi_status->EventCancelled) {
				$frm_1_t_conu_contributor_pi_status_grid->RestoreCurrentRowFormValues($frm_1_t_conu_contributor_pi_status_grid->RowIndex); // Restore form values
			}
			if ($frm_1_t_conu_contributor_pi_status_grid->RowAction == "insert")
				$frm_1_t_conu_contributor_pi_status->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$frm_1_t_conu_contributor_pi_status->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($frm_1_t_conu_contributor_pi_status->CurrentAction == "gridedit" && ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_EDIT || $frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_ADD) && $frm_1_t_conu_contributor_pi_status->EventCancelled) // Update failed
			$frm_1_t_conu_contributor_pi_status_grid->RestoreCurrentRowFormValues($frm_1_t_conu_contributor_pi_status_grid->RowIndex); // Restore form values
		if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_EDIT) // Edit row
			$frm_1_t_conu_contributor_pi_status_grid->EditRowCnt++;
		if ($frm_1_t_conu_contributor_pi_status->CurrentAction == "F") // Confirm row
			$frm_1_t_conu_contributor_pi_status_grid->RestoreCurrentRowFormValues($frm_1_t_conu_contributor_pi_status_grid->RowIndex); // Restore form values
		if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_ADD || $frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($frm_1_t_conu_contributor_pi_status->CurrentAction == "edit") {
				$frm_1_t_conu_contributor_pi_status->RowAttrs = array();
				$frm_1_t_conu_contributor_pi_status->CssClass = "upTableEditRow";
			} else {
				$frm_1_t_conu_contributor_pi_status->RowAttrs = array();
			}
			if (!empty($frm_1_t_conu_contributor_pi_status_grid->RowIndex))
				$frm_1_t_conu_contributor_pi_status->RowAttrs = array_merge($frm_1_t_conu_contributor_pi_status->RowAttrs, array('data-rowindex'=>$frm_1_t_conu_contributor_pi_status_grid->RowIndex, 'id'=>'r' . $frm_1_t_conu_contributor_pi_status_grid->RowIndex . '_frm_1_t_conu_contributor_pi_status'));
		} else {
			$frm_1_t_conu_contributor_pi_status->RowAttrs = array();
		}

		// Render row
		$frm_1_t_conu_contributor_pi_status_grid->RenderRow();

		// Render list options
		$frm_1_t_conu_contributor_pi_status_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($frm_1_t_conu_contributor_pi_status_grid->RowAction <> "delete" && $frm_1_t_conu_contributor_pi_status_grid->RowAction <> "insertdelete" && !($frm_1_t_conu_contributor_pi_status_grid->RowAction == "insert" && $frm_1_t_conu_contributor_pi_status->CurrentAction == "F" && $frm_1_t_conu_contributor_pi_status_grid->EmptyRow())) {
?>
	<tr<?php echo $frm_1_t_conu_contributor_pi_status->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_1_t_conu_contributor_pi_status_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_1_t_conu_contributor_pi_status->Delivery_Unit->Visible) { // Delivery Unit ?>
		<td<?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->CellAttributes() ?>>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Delivery_Unit->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Delivery_Unit->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Delivery_Unit->OldValue) ?>">
<?php } ?>
<a name="<?php echo $frm_1_t_conu_contributor_pi_status_grid->PageObjName . "_row_" . $frm_1_t_conu_contributor_pi_status_grid->RowCnt ?>" id="<?php echo $frm_1_t_conu_contributor_pi_status_grid->PageObjName . "_row_" . $frm_1_t_conu_contributor_pi_status_grid->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->Contributing_Unit->Visible) { // Contributing Unit ?>
		<td<?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->CellAttributes() ?>>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Contributing_Unit->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Contributing_Unit->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Contributing_Unit->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->MFO->Visible) { // MFO ?>
		<td<?php echo $frm_1_t_conu_contributor_pi_status->MFO->CellAttributes() ?>>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_contributor_pi_status->MFO->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->MFO->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->MFO->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_contributor_pi_status->MFO->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->MFO->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->MFO->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->MFO->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->MFO->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->MFO->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->Visible) { // PI Count per MFO ?>
		<td<?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->CellAttributes() ?>>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" size="30" value="<?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" size="30" value="<?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->Visible) { // Not Applicable PI Count ?>
		<td<?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->CellAttributes() ?>>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" size="30" value="<?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" size="30" value="<?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->Visible) { // Completed Target PI Count ?>
		<td<?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->CellAttributes() ?>>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" size="30" value="<?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" size="30" value="<?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->Visible) { // No Target PI Count ?>
		<td<?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->CellAttributes() ?>>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" size="30" value="<?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" size="30" value="<?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->Remarks->Visible) { // Remarks ?>
		<td<?php echo $frm_1_t_conu_contributor_pi_status->Remarks->CellAttributes() ?>>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" size="30" maxlength="19" value="<?php echo $frm_1_t_conu_contributor_pi_status->Remarks->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Remarks->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Remarks->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" size="30" maxlength="19" value="<?php echo $frm_1_t_conu_contributor_pi_status->Remarks->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Remarks->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->Remarks->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->Remarks->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Remarks->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" id="o<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Remarks->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_1_t_conu_contributor_pi_status_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($frm_1_t_conu_contributor_pi_status->CurrentAction <> "gridadd" || $frm_1_t_conu_contributor_pi_status->CurrentMode == "copy")
		if (!$frm_1_t_conu_contributor_pi_status_grid->Recordset->EOF) $frm_1_t_conu_contributor_pi_status_grid->Recordset->MoveNext();
}
?>
<?php
	if ($frm_1_t_conu_contributor_pi_status->CurrentMode == "add" || $frm_1_t_conu_contributor_pi_status->CurrentMode == "copy" || $frm_1_t_conu_contributor_pi_status->CurrentMode == "edit") {
		$frm_1_t_conu_contributor_pi_status_grid->RowIndex = '$rowindex$';
		$frm_1_t_conu_contributor_pi_status_grid->LoadDefaultValues();

		// Set row properties
		$frm_1_t_conu_contributor_pi_status->ResetAttrs();
		$frm_1_t_conu_contributor_pi_status->RowAttrs = array();
		if (!empty($frm_1_t_conu_contributor_pi_status_grid->RowIndex))
			$frm_1_t_conu_contributor_pi_status->RowAttrs = array_merge($frm_1_t_conu_contributor_pi_status->RowAttrs, array('data-rowindex'=>$frm_1_t_conu_contributor_pi_status_grid->RowIndex, 'id'=>'r' . $frm_1_t_conu_contributor_pi_status_grid->RowIndex . '_frm_1_t_conu_contributor_pi_status'));
		$frm_1_t_conu_contributor_pi_status->RowType = UP_ROWTYPE_ADD;

		// Render row
		$frm_1_t_conu_contributor_pi_status_grid->RenderRow();

		// Render list options
		$frm_1_t_conu_contributor_pi_status_grid->RenderListOptions();

		// Add id and class to the template row
		$frm_1_t_conu_contributor_pi_status->RowAttrs["id"] = "r0_frm_1_t_conu_contributor_pi_status";
		up_AppendClass($frm_1_t_conu_contributor_pi_status->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $frm_1_t_conu_contributor_pi_status->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_1_t_conu_contributor_pi_status_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_1_t_conu_contributor_pi_status->Delivery_Unit->Visible) { // Delivery Unit ?>
		<td>
<?php if ($frm_1_t_conu_contributor_pi_status->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->Delivery_Unit->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Delivery_Unit->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->Contributing_Unit->Visible) { // Contributing Unit ?>
		<td>
<?php if ($frm_1_t_conu_contributor_pi_status->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->Contributing_Unit->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Contributing_Unit->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->MFO->Visible) { // MFO ?>
		<td>
<?php if ($frm_1_t_conu_contributor_pi_status->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_contributor_pi_status->MFO->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->MFO->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->MFO->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->MFO->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->MFO->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->Visible) { // PI Count per MFO ?>
		<td>
<?php if ($frm_1_t_conu_contributor_pi_status->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" size="30" value="<?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_PI_Count_per_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->PI_Count_per_MFO->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->Visible) { // Not Applicable PI Count ?>
		<td>
<?php if ($frm_1_t_conu_contributor_pi_status->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" size="30" value="<?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Not_Applicable_PI_Count" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Not_Applicable_PI_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->Visible) { // Completed Target PI Count ?>
		<td>
<?php if ($frm_1_t_conu_contributor_pi_status->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" size="30" value="<?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Completed_Target_PI_Count" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Completed_Target_PI_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->Visible) { // No Target PI Count ?>
		<td>
<?php if ($frm_1_t_conu_contributor_pi_status->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" size="30" value="<?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_No_Target_PI_Count" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->No_Target_PI_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_contributor_pi_status->Remarks->Visible) { // Remarks ?>
		<td>
<?php if ($frm_1_t_conu_contributor_pi_status->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" size="30" maxlength="19" value="<?php echo $frm_1_t_conu_contributor_pi_status->Remarks->EditValue ?>"<?php echo $frm_1_t_conu_contributor_pi_status->Remarks->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_contributor_pi_status->Remarks->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_pi_status->Remarks->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" id="x<?php echo $frm_1_t_conu_contributor_pi_status_grid->RowIndex ?>_Remarks" value="<?php echo up_HtmlEncode($frm_1_t_conu_contributor_pi_status->Remarks->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_1_t_conu_contributor_pi_status_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($frm_1_t_conu_contributor_pi_status->CurrentMode == "add" || $frm_1_t_conu_contributor_pi_status->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_1_t_conu_contributor_pi_status_grid->KeyCount ?>">
<?php echo $frm_1_t_conu_contributor_pi_status_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($frm_1_t_conu_contributor_pi_status->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_1_t_conu_contributor_pi_status_grid->KeyCount ?>">
<?php echo $frm_1_t_conu_contributor_pi_status_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="frm_1_t_conu_contributor_pi_status_grid">
</div>
<?php

// Close recordset
if ($frm_1_t_conu_contributor_pi_status_grid->Recordset)
	$frm_1_t_conu_contributor_pi_status_grid->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_1_t_conu_contributor_pi_status->Export == "" && $frm_1_t_conu_contributor_pi_status->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_1_t_conu_contributor_pi_status_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$frm_1_t_conu_contributor_pi_status_grid->Page_Terminate();
$Page =& $MasterPage;
?>
