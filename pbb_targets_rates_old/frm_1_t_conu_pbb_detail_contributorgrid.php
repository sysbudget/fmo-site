<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php

// Create page object
$frm_1_t_conu_pbb_detail_contributor_grid = new cfrm_1_t_conu_pbb_detail_contributor_grid();
$MasterPage =& $Page;
$Page =& $frm_1_t_conu_pbb_detail_contributor_grid;

// Page init
$frm_1_t_conu_pbb_detail_contributor_grid->Page_Init();

// Page main
$frm_1_t_conu_pbb_detail_contributor_grid->Page_Main();
?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_1_t_conu_pbb_detail_contributor_grid = new up_Page("frm_1_t_conu_pbb_detail_contributor_grid");

// page properties
frm_1_t_conu_pbb_detail_contributor_grid.PageID = "grid"; // page ID
frm_1_t_conu_pbb_detail_contributor_grid.FormID = "ffrm_1_t_conu_pbb_detail_contributorgrid"; // form ID
var UP_PAGE_ID = frm_1_t_conu_pbb_detail_contributor_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_1_t_conu_pbb_detail_contributor_grid.ValidateForm = function(fobj) {
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
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_1_t_conu_pbb_detail_contributor->Target->FldErrMsg()) ?>");

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
frm_1_t_conu_pbb_detail_contributor_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "Delivery_Unit", false)) return false;
	if (up_ValueChanged(fobj, infix, "Contributing_Unit", false)) return false;
	if (up_ValueChanged(fobj, infix, "MFO", false)) return false;
	if (up_ValueChanged(fobj, infix, "Question", false)) return false;
	if (up_ValueChanged(fobj, infix, "Applicable", false)) return false;
	if (up_ValueChanged(fobj, infix, "Target", false)) return false;
	if (up_ValueChanged(fobj, infix, "Target_Remarks", false)) return false;
	if (up_ValueChanged(fobj, infix, "Target_Cut2DOff_Date", false)) return false;
	if (up_ValueChanged(fobj, infix, "Target_Message", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
frm_1_t_conu_pbb_detail_contributor_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_1_t_conu_pbb_detail_contributor_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_1_t_conu_pbb_detail_contributor_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_1_t_conu_pbb_detail_contributor_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridadd") {
	if ($frm_1_t_conu_pbb_detail_contributor->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$frm_1_t_conu_pbb_detail_contributor_grid->TotalRecs = $frm_1_t_conu_pbb_detail_contributor->SelectRecordCount();
			$frm_1_t_conu_pbb_detail_contributor_grid->Recordset = $frm_1_t_conu_pbb_detail_contributor_grid->LoadRecordset($frm_1_t_conu_pbb_detail_contributor_grid->StartRec-1, $frm_1_t_conu_pbb_detail_contributor_grid->DisplayRecs);
		} else {
			if ($frm_1_t_conu_pbb_detail_contributor_grid->Recordset = $frm_1_t_conu_pbb_detail_contributor_grid->LoadRecordset())
				$frm_1_t_conu_pbb_detail_contributor_grid->TotalRecs = $frm_1_t_conu_pbb_detail_contributor_grid->Recordset->RecordCount();
		}
		$frm_1_t_conu_pbb_detail_contributor_grid->StartRec = 1;
		$frm_1_t_conu_pbb_detail_contributor_grid->DisplayRecs = $frm_1_t_conu_pbb_detail_contributor_grid->TotalRecs;
	} else {
		$frm_1_t_conu_pbb_detail_contributor->CurrentFilter = "0=1";
		$frm_1_t_conu_pbb_detail_contributor_grid->StartRec = 1;
		$frm_1_t_conu_pbb_detail_contributor_grid->DisplayRecs = $frm_1_t_conu_pbb_detail_contributor->GridAddRowCount;
	}
	$frm_1_t_conu_pbb_detail_contributor_grid->TotalRecs = $frm_1_t_conu_pbb_detail_contributor_grid->DisplayRecs;
	$frm_1_t_conu_pbb_detail_contributor_grid->StopRec = $frm_1_t_conu_pbb_detail_contributor_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_1_t_conu_pbb_detail_contributor_grid->TotalRecs = $frm_1_t_conu_pbb_detail_contributor->SelectRecordCount();
	} else {
		if ($frm_1_t_conu_pbb_detail_contributor_grid->Recordset = $frm_1_t_conu_pbb_detail_contributor_grid->LoadRecordset())
			$frm_1_t_conu_pbb_detail_contributor_grid->TotalRecs = $frm_1_t_conu_pbb_detail_contributor_grid->Recordset->RecordCount();
	}
	$frm_1_t_conu_pbb_detail_contributor_grid->StartRec = 1;
	$frm_1_t_conu_pbb_detail_contributor_grid->DisplayRecs = $frm_1_t_conu_pbb_detail_contributor_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$frm_1_t_conu_pbb_detail_contributor_grid->Recordset = $frm_1_t_conu_pbb_detail_contributor_grid->LoadRecordset($frm_1_t_conu_pbb_detail_contributor_grid->StartRec-1, $frm_1_t_conu_pbb_detail_contributor_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($frm_1_t_conu_pbb_detail_contributor->CurrentMode == "add" || $frm_1_t_conu_pbb_detail_contributor->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($frm_1_t_conu_pbb_detail_contributor->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_1_t_conu_pbb_detail_contributor->TableCaption() ?></p>
</p>
<?php $frm_1_t_conu_pbb_detail_contributor_grid->ShowPageHeader(); ?>
<?php
$frm_1_t_conu_pbb_detail_contributor_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($frm_1_t_conu_pbb_detail_contributor->CurrentMode == "add" || $frm_1_t_conu_pbb_detail_contributor->CurrentMode == "copy" || $frm_1_t_conu_pbb_detail_contributor->CurrentMode == "edit") && $frm_1_t_conu_pbb_detail_contributor->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_frm_1_t_conu_pbb_detail_contributor" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_1_t_conu_pbb_detail_contributor->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_1_t_conu_pbb_detail_contributor_grid->RenderListOptions();

// Render list options (header, left)
$frm_1_t_conu_pbb_detail_contributor_grid->ListOptions->Render("header", "left");
?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->Visible) { // Delivery Unit ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->SortUrl($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->Visible) { // Contributing Unit ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->SortUrl($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_pbb_detail_contributor->MFO->Visible) { // MFO ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->SortUrl($frm_1_t_conu_pbb_detail_contributor->MFO) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_pbb_detail_contributor->MFO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_pbb_detail_contributor->MFO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_pbb_detail_contributor->Question->Visible) { // Question ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->SortUrl($frm_1_t_conu_pbb_detail_contributor->Question) == "") { ?>
		<td><?php echo $frm_1_t_conu_pbb_detail_contributor->Question->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_conu_pbb_detail_contributor->Question->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_pbb_detail_contributor->Question->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_pbb_detail_contributor->Question->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_pbb_detail_contributor->Applicable->Visible) { // Applicable ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->SortUrl($frm_1_t_conu_pbb_detail_contributor->Applicable) == "") { ?>
		<td><?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_pbb_detail_contributor->Applicable->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_pbb_detail_contributor->Applicable->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_pbb_detail_contributor->Target->Visible) { // Target ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->SortUrl($frm_1_t_conu_pbb_detail_contributor->Target) == "") { ?>
		<td><?php echo $frm_1_t_conu_pbb_detail_contributor->Target->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_conu_pbb_detail_contributor->Target->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_pbb_detail_contributor->Target->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_pbb_detail_contributor->Target->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Remarks->Visible) { // Target Remarks ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->SortUrl($frm_1_t_conu_pbb_detail_contributor->Target_Remarks) == "") { ?>
		<td><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_pbb_detail_contributor->Target_Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->Visible) { // Target Cut-Off Date ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->SortUrl($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Message->Visible) { // Target Message ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->SortUrl($frm_1_t_conu_pbb_detail_contributor->Target_Message) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Message->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_conu_pbb_detail_contributor->Target_Message->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_1_t_conu_pbb_detail_contributor_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$frm_1_t_conu_pbb_detail_contributor_grid->StartRec = 1;
$frm_1_t_conu_pbb_detail_contributor_grid->StopRec = $frm_1_t_conu_pbb_detail_contributor_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridadd" || $frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridedit" || $frm_1_t_conu_pbb_detail_contributor->CurrentAction == "F")) {
		$frm_1_t_conu_pbb_detail_contributor_grid->KeyCount = $objForm->GetValue("key_count");
		$frm_1_t_conu_pbb_detail_contributor_grid->StopRec = $frm_1_t_conu_pbb_detail_contributor_grid->KeyCount;
	}
}
$frm_1_t_conu_pbb_detail_contributor_grid->RecCnt = $frm_1_t_conu_pbb_detail_contributor_grid->StartRec - 1;
if ($frm_1_t_conu_pbb_detail_contributor_grid->Recordset && !$frm_1_t_conu_pbb_detail_contributor_grid->Recordset->EOF) {
	$frm_1_t_conu_pbb_detail_contributor_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_1_t_conu_pbb_detail_contributor_grid->StartRec > 1)
		$frm_1_t_conu_pbb_detail_contributor_grid->Recordset->Move($frm_1_t_conu_pbb_detail_contributor_grid->StartRec - 1);
} elseif (!$frm_1_t_conu_pbb_detail_contributor->AllowAddDeleteRow && $frm_1_t_conu_pbb_detail_contributor_grid->StopRec == 0) {
	$frm_1_t_conu_pbb_detail_contributor_grid->StopRec = $frm_1_t_conu_pbb_detail_contributor->GridAddRowCount;
}

// Initialize aggregate
$frm_1_t_conu_pbb_detail_contributor->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_1_t_conu_pbb_detail_contributor->ResetAttrs();
$frm_1_t_conu_pbb_detail_contributor_grid->RenderRow();
$frm_1_t_conu_pbb_detail_contributor_grid->RowCnt = 0;
if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridadd")
	$frm_1_t_conu_pbb_detail_contributor_grid->RowIndex = 0;
if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridedit")
	$frm_1_t_conu_pbb_detail_contributor_grid->RowIndex = 0;
while ($frm_1_t_conu_pbb_detail_contributor_grid->RecCnt < $frm_1_t_conu_pbb_detail_contributor_grid->StopRec) {
	$frm_1_t_conu_pbb_detail_contributor_grid->RecCnt++;
	if (intval($frm_1_t_conu_pbb_detail_contributor_grid->RecCnt) >= intval($frm_1_t_conu_pbb_detail_contributor_grid->StartRec)) {
		$frm_1_t_conu_pbb_detail_contributor_grid->RowCnt++;
		if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridadd" || $frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridedit" || $frm_1_t_conu_pbb_detail_contributor->CurrentAction == "F")
			$frm_1_t_conu_pbb_detail_contributor_grid->RowIndex++;

		// Set up key count
		$frm_1_t_conu_pbb_detail_contributor_grid->KeyCount = $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex;

		// Init row class and style
		$frm_1_t_conu_pbb_detail_contributor->ResetAttrs();
		$frm_1_t_conu_pbb_detail_contributor->CssClass = "";
		if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridadd") {
			if ($frm_1_t_conu_pbb_detail_contributor->CurrentMode == "copy") {
				$frm_1_t_conu_pbb_detail_contributor_grid->LoadRowValues($frm_1_t_conu_pbb_detail_contributor_grid->Recordset); // Load row values
				$frm_1_t_conu_pbb_detail_contributor_grid->SetRecordKey($frm_1_t_conu_pbb_detail_contributor_grid->RowOldKey, $frm_1_t_conu_pbb_detail_contributor_grid->Recordset); // Set old record key
			} else {
				$frm_1_t_conu_pbb_detail_contributor_grid->LoadDefaultValues(); // Load default values
				$frm_1_t_conu_pbb_detail_contributor_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridedit") {
			$frm_1_t_conu_pbb_detail_contributor_grid->LoadRowValues($frm_1_t_conu_pbb_detail_contributor_grid->Recordset); // Load row values
		}
		$frm_1_t_conu_pbb_detail_contributor->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridadd") // Grid add
			$frm_1_t_conu_pbb_detail_contributor->RowType = UP_ROWTYPE_ADD; // Render add
		if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridadd" && $frm_1_t_conu_pbb_detail_contributor->EventCancelled) // Insert failed
			$frm_1_t_conu_pbb_detail_contributor_grid->RestoreCurrentRowFormValues($frm_1_t_conu_pbb_detail_contributor_grid->RowIndex); // Restore form values
		if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridedit") { // Grid edit
			if ($frm_1_t_conu_pbb_detail_contributor->EventCancelled) {
				$frm_1_t_conu_pbb_detail_contributor_grid->RestoreCurrentRowFormValues($frm_1_t_conu_pbb_detail_contributor_grid->RowIndex); // Restore form values
			}
			if ($frm_1_t_conu_pbb_detail_contributor_grid->RowAction == "insert")
				$frm_1_t_conu_pbb_detail_contributor->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$frm_1_t_conu_pbb_detail_contributor->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "gridedit" && ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT || $frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) && $frm_1_t_conu_pbb_detail_contributor->EventCancelled) // Update failed
			$frm_1_t_conu_pbb_detail_contributor_grid->RestoreCurrentRowFormValues($frm_1_t_conu_pbb_detail_contributor_grid->RowIndex); // Restore form values
		if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) // Edit row
			$frm_1_t_conu_pbb_detail_contributor_grid->EditRowCnt++;
		if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "F") // Confirm row
			$frm_1_t_conu_pbb_detail_contributor_grid->RestoreCurrentRowFormValues($frm_1_t_conu_pbb_detail_contributor_grid->RowIndex); // Restore form values
		if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD || $frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction == "edit") {
				$frm_1_t_conu_pbb_detail_contributor->RowAttrs = array();
				$frm_1_t_conu_pbb_detail_contributor->CssClass = "upTableEditRow";
			} else {
				$frm_1_t_conu_pbb_detail_contributor->RowAttrs = array();
			}
			if (!empty($frm_1_t_conu_pbb_detail_contributor_grid->RowIndex))
				$frm_1_t_conu_pbb_detail_contributor->RowAttrs = array_merge($frm_1_t_conu_pbb_detail_contributor->RowAttrs, array('data-rowindex'=>$frm_1_t_conu_pbb_detail_contributor_grid->RowIndex, 'id'=>'r' . $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex . '_frm_1_t_conu_pbb_detail_contributor'));
		} else {
			$frm_1_t_conu_pbb_detail_contributor->RowAttrs = array();
		}

		// Render row
		$frm_1_t_conu_pbb_detail_contributor_grid->RenderRow();

		// Render list options
		$frm_1_t_conu_pbb_detail_contributor_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($frm_1_t_conu_pbb_detail_contributor_grid->RowAction <> "delete" && $frm_1_t_conu_pbb_detail_contributor_grid->RowAction <> "insertdelete" && !($frm_1_t_conu_pbb_detail_contributor_grid->RowAction == "insert" && $frm_1_t_conu_pbb_detail_contributor->CurrentAction == "F" && $frm_1_t_conu_pbb_detail_contributor_grid->EmptyRow())) {
?>
	<tr<?php echo $frm_1_t_conu_pbb_detail_contributor->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_1_t_conu_pbb_detail_contributor_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->Visible) { // Delivery Unit ?>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->CellAttributes() ?>>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->OldValue) ?>">
<?php } ?>
<a name="<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->PageObjName . "_row_" . $frm_1_t_conu_pbb_detail_contributor_grid->RowCnt ?>" id="<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->PageObjName . "_row_" . $frm_1_t_conu_pbb_detail_contributor_grid->RowCnt ?>"></a>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_pbb_contributor_id" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_pbb_contributor_id" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->pbb_contributor_id->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_pbb_contributor_id" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_pbb_contributor_id" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->pbb_contributor_id->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->Visible) { // Contributing Unit ?>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->CellAttributes() ?>>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->MFO->Visible) { // MFO ?>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->CellAttributes() ?>>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->MFO->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->MFO->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->MFO->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->MFO->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Question->Visible) { // Question ?>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Question->CellAttributes() ?>>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Question->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Question->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Question->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Question->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Question->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Question->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Question->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Question->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Question->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Question->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Applicable->Visible) { // Applicable ?>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->CellAttributes() ?>>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="{value}"<?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_1_t_conu_pbb_detail_contributor->Applicable->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_1_t_conu_pbb_detail_contributor->Applicable->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_1_t_conu_pbb_detail_contributor->Applicable->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Applicable->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="{value}"<?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_1_t_conu_pbb_detail_contributor->Applicable->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_1_t_conu_pbb_detail_contributor->Applicable->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_1_t_conu_pbb_detail_contributor->Applicable->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Applicable->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Applicable->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Target->Visible) { // Target ?>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Target->CellAttributes() ?>>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" size="30" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Target->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Target->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" size="30" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Target->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Target->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Target->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Remarks->Visible) { // Target Remarks ?>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->CellAttributes() ?>>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<textarea name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" cols="0" rows="0"<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->EditAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->EditValue ?></textarea>
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Remarks->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<textarea name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" cols="0" rows="0"<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->EditAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->EditValue ?></textarea>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Remarks->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Remarks->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->Visible) { // Target Cut-Off Date ?>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->CellAttributes() ?>>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Message->Visible) { // Target Message ?>
		<td<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->CellAttributes() ?>>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Message->OldValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Message->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Message->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="o<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Message->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_1_t_conu_pbb_detail_contributor_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction <> "gridadd" || $frm_1_t_conu_pbb_detail_contributor->CurrentMode == "copy")
		if (!$frm_1_t_conu_pbb_detail_contributor_grid->Recordset->EOF) $frm_1_t_conu_pbb_detail_contributor_grid->Recordset->MoveNext();
}
?>
<?php
	if ($frm_1_t_conu_pbb_detail_contributor->CurrentMode == "add" || $frm_1_t_conu_pbb_detail_contributor->CurrentMode == "copy" || $frm_1_t_conu_pbb_detail_contributor->CurrentMode == "edit") {
		$frm_1_t_conu_pbb_detail_contributor_grid->RowIndex = '$rowindex$';
		$frm_1_t_conu_pbb_detail_contributor_grid->LoadDefaultValues();

		// Set row properties
		$frm_1_t_conu_pbb_detail_contributor->ResetAttrs();
		$frm_1_t_conu_pbb_detail_contributor->RowAttrs = array();
		if (!empty($frm_1_t_conu_pbb_detail_contributor_grid->RowIndex))
			$frm_1_t_conu_pbb_detail_contributor->RowAttrs = array_merge($frm_1_t_conu_pbb_detail_contributor->RowAttrs, array('data-rowindex'=>$frm_1_t_conu_pbb_detail_contributor_grid->RowIndex, 'id'=>'r' . $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex . '_frm_1_t_conu_pbb_detail_contributor'));
		$frm_1_t_conu_pbb_detail_contributor->RowType = UP_ROWTYPE_ADD;

		// Render row
		$frm_1_t_conu_pbb_detail_contributor_grid->RenderRow();

		// Render list options
		$frm_1_t_conu_pbb_detail_contributor_grid->RenderListOptions();

		// Add id and class to the template row
		$frm_1_t_conu_pbb_detail_contributor->RowAttrs["id"] = "r0_frm_1_t_conu_pbb_detail_contributor";
		up_AppendClass($frm_1_t_conu_pbb_detail_contributor->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $frm_1_t_conu_pbb_detail_contributor->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_1_t_conu_pbb_detail_contributor_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->Visible) { // Delivery Unit ?>
		<td>
<?php if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Delivery_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Delivery_Unit->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->Visible) { // Contributing Unit ?>
		<td>
<?php if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Contributing_Unit" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Contributing_Unit->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->MFO->Visible) { // MFO ?>
		<td>
<?php if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->MFO->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_MFO" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->MFO->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Question->Visible) { // Question ?>
		<td>
<?php if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Question->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Question->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Question->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Question->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Question" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Question->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Applicable->Visible) { // Applicable ?>
		<td>
<?php if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="{value}"<?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_1_t_conu_pbb_detail_contributor->Applicable->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_1_t_conu_pbb_detail_contributor->Applicable->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_1_t_conu_pbb_detail_contributor->Applicable->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Applicable->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Applicable" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Applicable->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Target->Visible) { // Target ?>
		<td>
<?php if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" size="30" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Target->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Target->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Target->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Remarks->Visible) { // Target Remarks ?>
		<td>
<?php if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction <> "F") { ?>
<textarea name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" cols="0" rows="0"<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->EditAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->EditValue ?></textarea>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Remarks->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Remarks" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Remarks->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->Visible) { // Target Cut-Off Date ?>
		<td>
<?php if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Cut2DOff_Date" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Cut2DOff_Date->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_1_t_conu_pbb_detail_contributor->Target_Message->Visible) { // Target Message ?>
		<td>
<?php if ($frm_1_t_conu_pbb_detail_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" size="30" maxlength="255" value="<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->EditValue ?>"<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->ViewAttributes() ?>><?php echo $frm_1_t_conu_pbb_detail_contributor->Target_Message->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" id="x<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->RowIndex ?>_Target_Message" value="<?php echo up_HtmlEncode($frm_1_t_conu_pbb_detail_contributor->Target_Message->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_1_t_conu_pbb_detail_contributor_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($frm_1_t_conu_pbb_detail_contributor->CurrentMode == "add" || $frm_1_t_conu_pbb_detail_contributor->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->KeyCount ?>">
<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($frm_1_t_conu_pbb_detail_contributor->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->KeyCount ?>">
<?php echo $frm_1_t_conu_pbb_detail_contributor_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="frm_1_t_conu_pbb_detail_contributor_grid">
</div>
<?php

// Close recordset
if ($frm_1_t_conu_pbb_detail_contributor_grid->Recordset)
	$frm_1_t_conu_pbb_detail_contributor_grid->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_1_t_conu_pbb_detail_contributor->Export == "" && $frm_1_t_conu_pbb_detail_contributor->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_1_t_conu_pbb_detail_contributor_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$frm_1_t_conu_pbb_detail_contributor_grid->Page_Terminate();
$Page =& $MasterPage;
?>
