<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$tbl_collectionperiod_grid = new ctbl_collectionperiod_grid();
$MasterPage =& $Page;
$Page =& $tbl_collectionperiod_grid;

// Page init
$tbl_collectionperiod_grid->Page_Init();

// Page main
$tbl_collectionperiod_grid->Page_Main();
?>
<?php if ($tbl_collectionperiod->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_collectionperiod_grid = new up_Page("tbl_collectionperiod_grid");

// page properties
tbl_collectionperiod_grid.PageID = "grid"; // page ID
tbl_collectionperiod_grid.FormID = "ftbl_collectionperiodgrid"; // form ID
var UP_PAGE_ID = tbl_collectionperiod_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_collectionperiod_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_collectionPeriod_ay"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_collectionperiod->collectionPeriod_ay->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_collectionPeriod_sem"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_collectionperiod->collectionPeriod_sem->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_collectionPeriod_cutOffDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_collectionperiod->collectionPeriod_cutOffDate->FldErrMsg()) ?>");

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
tbl_collectionperiod_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "collectionPeriod_ay", false)) return false;
	if (up_ValueChanged(fobj, infix, "collectionPeriod_sem", false)) return false;
	if (up_ValueChanged(fobj, infix, "collectionPeriod_cutOffDate", false)) return false;
	if (up_ValueChanged(fobj, infix, "collectionPeriod_status", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
tbl_collectionperiod_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_collectionperiod_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_collectionperiod_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_collectionperiod_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($tbl_collectionperiod->CurrentAction == "gridadd") {
	if ($tbl_collectionperiod->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$tbl_collectionperiod_grid->TotalRecs = $tbl_collectionperiod->SelectRecordCount();
			$tbl_collectionperiod_grid->Recordset = $tbl_collectionperiod_grid->LoadRecordset($tbl_collectionperiod_grid->StartRec-1, $tbl_collectionperiod_grid->DisplayRecs);
		} else {
			if ($tbl_collectionperiod_grid->Recordset = $tbl_collectionperiod_grid->LoadRecordset())
				$tbl_collectionperiod_grid->TotalRecs = $tbl_collectionperiod_grid->Recordset->RecordCount();
		}
		$tbl_collectionperiod_grid->StartRec = 1;
		$tbl_collectionperiod_grid->DisplayRecs = $tbl_collectionperiod_grid->TotalRecs;
	} else {
		$tbl_collectionperiod->CurrentFilter = "0=1";
		$tbl_collectionperiod_grid->StartRec = 1;
		$tbl_collectionperiod_grid->DisplayRecs = $tbl_collectionperiod->GridAddRowCount;
	}
	$tbl_collectionperiod_grid->TotalRecs = $tbl_collectionperiod_grid->DisplayRecs;
	$tbl_collectionperiod_grid->StopRec = $tbl_collectionperiod_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_collectionperiod_grid->TotalRecs = $tbl_collectionperiod->SelectRecordCount();
	} else {
		if ($tbl_collectionperiod_grid->Recordset = $tbl_collectionperiod_grid->LoadRecordset())
			$tbl_collectionperiod_grid->TotalRecs = $tbl_collectionperiod_grid->Recordset->RecordCount();
	}
	$tbl_collectionperiod_grid->StartRec = 1;
	$tbl_collectionperiod_grid->DisplayRecs = $tbl_collectionperiod_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$tbl_collectionperiod_grid->Recordset = $tbl_collectionperiod_grid->LoadRecordset($tbl_collectionperiod_grid->StartRec-1, $tbl_collectionperiod_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($tbl_collectionperiod->CurrentMode == "add" || $tbl_collectionperiod->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($tbl_collectionperiod->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_collectionperiod->TableCaption() ?></p>
</p>
<?php $tbl_collectionperiod_grid->ShowPageHeader(); ?>
<?php
$tbl_collectionperiod_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($tbl_collectionperiod->CurrentMode == "add" || $tbl_collectionperiod->CurrentMode == "copy" || $tbl_collectionperiod->CurrentMode == "edit") && $tbl_collectionperiod->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_tbl_collectionperiod" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_collectionperiod->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_collectionperiod_grid->RenderListOptions();

// Render list options (header, left)
$tbl_collectionperiod_grid->ListOptions->Render("header", "left");
?>
<?php if ($tbl_collectionperiod->collectionPeriod_ay->Visible) { // collectionPeriod_ay ?>
	<?php if ($tbl_collectionperiod->SortUrl($tbl_collectionperiod->collectionPeriod_ay) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_collectionperiod->collectionPeriod_ay->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_collectionperiod->collectionPeriod_ay->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_collectionperiod->collectionPeriod_ay->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_collectionperiod->collectionPeriod_ay->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_collectionperiod->collectionPeriod_sem->Visible) { // collectionPeriod_sem ?>
	<?php if ($tbl_collectionperiod->SortUrl($tbl_collectionperiod->collectionPeriod_sem) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_collectionperiod->collectionPeriod_sem->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_collectionperiod->collectionPeriod_sem->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_collectionperiod->collectionPeriod_sem->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_collectionperiod->collectionPeriod_sem->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_collectionperiod->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
	<?php if ($tbl_collectionperiod->SortUrl($tbl_collectionperiod->collectionPeriod_cutOffDate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_collectionperiod->collectionPeriod_cutOffDate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_collectionperiod->collectionPeriod_cutOffDate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_collectionperiod->collectionPeriod_status->Visible) { // collectionPeriod_status ?>
	<?php if ($tbl_collectionperiod->SortUrl($tbl_collectionperiod->collectionPeriod_status) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_collectionperiod->collectionPeriod_status->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_collectionperiod->collectionPeriod_status->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_collectionperiod->collectionPeriod_status->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_collectionperiod->collectionPeriod_status->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_collectionperiod_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$tbl_collectionperiod_grid->StartRec = 1;
$tbl_collectionperiod_grid->StopRec = $tbl_collectionperiod_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($tbl_collectionperiod->CurrentAction == "gridadd" || $tbl_collectionperiod->CurrentAction == "gridedit" || $tbl_collectionperiod->CurrentAction == "F")) {
		$tbl_collectionperiod_grid->KeyCount = $objForm->GetValue("key_count");
		$tbl_collectionperiod_grid->StopRec = $tbl_collectionperiod_grid->KeyCount;
	}
}
$tbl_collectionperiod_grid->RecCnt = $tbl_collectionperiod_grid->StartRec - 1;
if ($tbl_collectionperiod_grid->Recordset && !$tbl_collectionperiod_grid->Recordset->EOF) {
	$tbl_collectionperiod_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_collectionperiod_grid->StartRec > 1)
		$tbl_collectionperiod_grid->Recordset->Move($tbl_collectionperiod_grid->StartRec - 1);
} elseif (!$tbl_collectionperiod->AllowAddDeleteRow && $tbl_collectionperiod_grid->StopRec == 0) {
	$tbl_collectionperiod_grid->StopRec = $tbl_collectionperiod->GridAddRowCount;
}

// Initialize aggregate
$tbl_collectionperiod->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_collectionperiod->ResetAttrs();
$tbl_collectionperiod_grid->RenderRow();
$tbl_collectionperiod_grid->RowCnt = 0;
if ($tbl_collectionperiod->CurrentAction == "gridadd")
	$tbl_collectionperiod_grid->RowIndex = 0;
if ($tbl_collectionperiod->CurrentAction == "gridedit")
	$tbl_collectionperiod_grid->RowIndex = 0;
while ($tbl_collectionperiod_grid->RecCnt < $tbl_collectionperiod_grid->StopRec) {
	$tbl_collectionperiod_grid->RecCnt++;
	if (intval($tbl_collectionperiod_grid->RecCnt) >= intval($tbl_collectionperiod_grid->StartRec)) {
		$tbl_collectionperiod_grid->RowCnt++;
		if ($tbl_collectionperiod->CurrentAction == "gridadd" || $tbl_collectionperiod->CurrentAction == "gridedit" || $tbl_collectionperiod->CurrentAction == "F")
			$tbl_collectionperiod_grid->RowIndex++;

		// Set up key count
		$tbl_collectionperiod_grid->KeyCount = $tbl_collectionperiod_grid->RowIndex;

		// Init row class and style
		$tbl_collectionperiod->ResetAttrs();
		$tbl_collectionperiod->CssClass = "";
		if ($tbl_collectionperiod->CurrentAction == "gridadd") {
			if ($tbl_collectionperiod->CurrentMode == "copy") {
				$tbl_collectionperiod_grid->LoadRowValues($tbl_collectionperiod_grid->Recordset); // Load row values
				$tbl_collectionperiod_grid->SetRecordKey($tbl_collectionperiod_grid->RowOldKey, $tbl_collectionperiod_grid->Recordset); // Set old record key
			} else {
				$tbl_collectionperiod_grid->LoadDefaultValues(); // Load default values
				$tbl_collectionperiod_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($tbl_collectionperiod->CurrentAction == "gridedit") {
			$tbl_collectionperiod_grid->LoadRowValues($tbl_collectionperiod_grid->Recordset); // Load row values
		}
		$tbl_collectionperiod->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($tbl_collectionperiod->CurrentAction == "gridadd") // Grid add
			$tbl_collectionperiod->RowType = UP_ROWTYPE_ADD; // Render add
		if ($tbl_collectionperiod->CurrentAction == "gridadd" && $tbl_collectionperiod->EventCancelled) // Insert failed
			$tbl_collectionperiod_grid->RestoreCurrentRowFormValues($tbl_collectionperiod_grid->RowIndex); // Restore form values
		if ($tbl_collectionperiod->CurrentAction == "gridedit") { // Grid edit
			if ($tbl_collectionperiod->EventCancelled) {
				$tbl_collectionperiod_grid->RestoreCurrentRowFormValues($tbl_collectionperiod_grid->RowIndex); // Restore form values
			}
			if ($tbl_collectionperiod_grid->RowAction == "insert")
				$tbl_collectionperiod->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$tbl_collectionperiod->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($tbl_collectionperiod->CurrentAction == "gridedit" && ($tbl_collectionperiod->RowType == UP_ROWTYPE_EDIT || $tbl_collectionperiod->RowType == UP_ROWTYPE_ADD) && $tbl_collectionperiod->EventCancelled) // Update failed
			$tbl_collectionperiod_grid->RestoreCurrentRowFormValues($tbl_collectionperiod_grid->RowIndex); // Restore form values
		if ($tbl_collectionperiod->RowType == UP_ROWTYPE_EDIT) // Edit row
			$tbl_collectionperiod_grid->EditRowCnt++;
		if ($tbl_collectionperiod->CurrentAction == "F") // Confirm row
			$tbl_collectionperiod_grid->RestoreCurrentRowFormValues($tbl_collectionperiod_grid->RowIndex); // Restore form values
		if ($tbl_collectionperiod->RowType == UP_ROWTYPE_ADD || $tbl_collectionperiod->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($tbl_collectionperiod->CurrentAction == "edit") {
				$tbl_collectionperiod->RowAttrs = array();
				$tbl_collectionperiod->CssClass = "upTableEditRow";
			} else {
				$tbl_collectionperiod->RowAttrs = array();
			}
			if (!empty($tbl_collectionperiod_grid->RowIndex))
				$tbl_collectionperiod->RowAttrs = array_merge($tbl_collectionperiod->RowAttrs, array('data-rowindex'=>$tbl_collectionperiod_grid->RowIndex, 'id'=>'r' . $tbl_collectionperiod_grid->RowIndex . '_tbl_collectionperiod'));
		} else {
			$tbl_collectionperiod->RowAttrs = array();
		}

		// Render row
		$tbl_collectionperiod_grid->RenderRow();

		// Render list options
		$tbl_collectionperiod_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($tbl_collectionperiod_grid->RowAction <> "delete" && $tbl_collectionperiod_grid->RowAction <> "insertdelete" && !($tbl_collectionperiod_grid->RowAction == "insert" && $tbl_collectionperiod->CurrentAction == "F" && $tbl_collectionperiod_grid->EmptyRow())) {
?>
	<tr<?php echo $tbl_collectionperiod->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_collectionperiod_grid->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_collectionperiod->collectionPeriod_ay->Visible) { // collectionPeriod_ay ?>
		<td<?php echo $tbl_collectionperiod->collectionPeriod_ay->CellAttributes() ?>>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" size="30" value="<?php echo $tbl_collectionperiod->collectionPeriod_ay->EditValue ?>"<?php echo $tbl_collectionperiod->collectionPeriod_ay->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" id="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_ay->OldValue) ?>">
<?php } ?>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" size="30" value="<?php echo $tbl_collectionperiod->collectionPeriod_ay->EditValue ?>"<?php echo $tbl_collectionperiod->collectionPeriod_ay->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_collectionperiod->collectionPeriod_ay->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_ay->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_ay->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" id="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_ay->OldValue) ?>">
<?php } ?>
<a name="<?php echo $tbl_collectionperiod_grid->PageObjName . "_row_" . $tbl_collectionperiod_grid->RowCnt ?>" id="<?php echo $tbl_collectionperiod_grid->PageObjName . "_row_" . $tbl_collectionperiod_grid->RowCnt ?>"></a>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" name="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ID" id="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ID" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_ID->OldValue) ?>">
<?php } ?>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ID" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ID" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_ID->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_collectionperiod->collectionPeriod_sem->Visible) { // collectionPeriod_sem ?>
		<td<?php echo $tbl_collectionperiod->collectionPeriod_sem->CellAttributes() ?>>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" size="30" value="<?php echo $tbl_collectionperiod->collectionPeriod_sem->EditValue ?>"<?php echo $tbl_collectionperiod->collectionPeriod_sem->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" id="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_sem->OldValue) ?>">
<?php } ?>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" size="30" value="<?php echo $tbl_collectionperiod->collectionPeriod_sem->EditValue ?>"<?php echo $tbl_collectionperiod->collectionPeriod_sem->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_collectionperiod->collectionPeriod_sem->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_sem->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_sem->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" id="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_sem->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_collectionperiod->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
		<td<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->CellAttributes() ?>>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->EditValue ?>"<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->EditAttributes() ?>>
<input type="hidden" name="fo<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="fo<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo up_HtmlEncode(up_FormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->OldValue, 6)) ?>">
<input type="hidden" name="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_cutOffDate->OldValue) ?>">
<?php } ?>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->EditValue ?>"<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_cutOffDate->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_collectionperiod->collectionPeriod_status->Visible) { // collectionPeriod_status ?>
		<td<?php echo $tbl_collectionperiod->collectionPeriod_status->CellAttributes() ?>>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" value="{value}"<?php echo $tbl_collectionperiod->collectionPeriod_status->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_collectionperiod->collectionPeriod_status->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_collectionperiod->collectionPeriod_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_collectionperiod->collectionPeriod_status->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $tbl_collectionperiod->collectionPeriod_status->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" id="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_status->OldValue) ?>">
<?php } ?>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" value="{value}"<?php echo $tbl_collectionperiod->collectionPeriod_status->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_collectionperiod->collectionPeriod_status->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_collectionperiod->collectionPeriod_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_collectionperiod->collectionPeriod_status->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $tbl_collectionperiod->collectionPeriod_status->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_collectionperiod->collectionPeriod_status->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_status->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_status->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" id="o<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_status->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_collectionperiod_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($tbl_collectionperiod->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($tbl_collectionperiod->CurrentAction <> "gridadd" || $tbl_collectionperiod->CurrentMode == "copy")
		if (!$tbl_collectionperiod_grid->Recordset->EOF) $tbl_collectionperiod_grid->Recordset->MoveNext();
}
?>
<?php
	if ($tbl_collectionperiod->CurrentMode == "add" || $tbl_collectionperiod->CurrentMode == "copy" || $tbl_collectionperiod->CurrentMode == "edit") {
		$tbl_collectionperiod_grid->RowIndex = '$rowindex$';
		$tbl_collectionperiod_grid->LoadDefaultValues();

		// Set row properties
		$tbl_collectionperiod->ResetAttrs();
		$tbl_collectionperiod->RowAttrs = array();
		if (!empty($tbl_collectionperiod_grid->RowIndex))
			$tbl_collectionperiod->RowAttrs = array_merge($tbl_collectionperiod->RowAttrs, array('data-rowindex'=>$tbl_collectionperiod_grid->RowIndex, 'id'=>'r' . $tbl_collectionperiod_grid->RowIndex . '_tbl_collectionperiod'));
		$tbl_collectionperiod->RowType = UP_ROWTYPE_ADD;

		// Render row
		$tbl_collectionperiod_grid->RenderRow();

		// Render list options
		$tbl_collectionperiod_grid->RenderListOptions();

		// Add id and class to the template row
		$tbl_collectionperiod->RowAttrs["id"] = "r0_tbl_collectionperiod";
		up_AppendClass($tbl_collectionperiod->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $tbl_collectionperiod->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_collectionperiod_grid->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_collectionperiod->collectionPeriod_ay->Visible) { // collectionPeriod_ay ?>
		<td>
<?php if ($tbl_collectionperiod->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" size="30" value="<?php echo $tbl_collectionperiod->collectionPeriod_ay->EditValue ?>"<?php echo $tbl_collectionperiod->collectionPeriod_ay->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_collectionperiod->collectionPeriod_ay->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_ay->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_ay" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_ay->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_collectionperiod->collectionPeriod_sem->Visible) { // collectionPeriod_sem ?>
		<td>
<?php if ($tbl_collectionperiod->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" size="30" value="<?php echo $tbl_collectionperiod->collectionPeriod_sem->EditValue ?>"<?php echo $tbl_collectionperiod->collectionPeriod_sem->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_collectionperiod->collectionPeriod_sem->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_sem->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_sem" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_sem->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_collectionperiod->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
		<td>
<?php if ($tbl_collectionperiod->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->EditValue ?>"<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_cutOffDate->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_collectionperiod->collectionPeriod_status->Visible) { // collectionPeriod_status ?>
		<td>
<?php if ($tbl_collectionperiod->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" value="{value}"<?php echo $tbl_collectionperiod->collectionPeriod_status->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_collectionperiod->collectionPeriod_status->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_collectionperiod->collectionPeriod_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_collectionperiod->collectionPeriod_status->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $tbl_collectionperiod->collectionPeriod_status->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $tbl_collectionperiod->collectionPeriod_status->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_status->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $tbl_collectionperiod_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($tbl_collectionperiod->collectionPeriod_status->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_collectionperiod_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($tbl_collectionperiod->CurrentMode == "add" || $tbl_collectionperiod->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $tbl_collectionperiod_grid->KeyCount ?>">
<?php echo $tbl_collectionperiod_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($tbl_collectionperiod->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $tbl_collectionperiod_grid->KeyCount ?>">
<?php echo $tbl_collectionperiod_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="tbl_collectionperiod_grid">
</div>
<?php

// Close recordset
if ($tbl_collectionperiod_grid->Recordset)
	$tbl_collectionperiod_grid->Recordset->Close();
?>
<?php if (($tbl_collectionperiod->CurrentMode == "add" || $tbl_collectionperiod->CurrentMode == "copy" || $tbl_collectionperiod->CurrentMode == "edit") && $tbl_collectionperiod->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridLowerPanel">
</div>
<?php } ?>
</td></tr></table>
<?php if ($tbl_collectionperiod->Export == "" && $tbl_collectionperiod->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_collectionperiod_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$tbl_collectionperiod_grid->Page_Terminate();
$Page =& $MasterPage;
?>
