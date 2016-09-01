<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$view_tbl_collectionperiod_admin_grid = new cview_tbl_collectionperiod_admin_grid();
$MasterPage =& $Page;
$Page =& $view_tbl_collectionperiod_admin_grid;

// Page init
$view_tbl_collectionperiod_admin_grid->Page_Init();

// Page main
$view_tbl_collectionperiod_admin_grid->Page_Main();
?>
<?php if ($view_tbl_collectionperiod_admin->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var view_tbl_collectionperiod_admin_grid = new up_Page("view_tbl_collectionperiod_admin_grid");

// page properties
view_tbl_collectionperiod_admin_grid.PageID = "grid"; // page ID
view_tbl_collectionperiod_admin_grid.FormID = "fview_tbl_collectionperiod_admingrid"; // form ID
var UP_PAGE_ID = view_tbl_collectionperiod_admin_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
view_tbl_collectionperiod_admin_grid.ValidateForm = function(fobj) {
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
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_collectionperiod_admin->collectionPeriod_ay->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_collectionPeriod_sem"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_collectionperiod_admin->collectionPeriod_sem->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_collectionPeriod_cutOffDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FldErrMsg()) ?>");

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
view_tbl_collectionperiod_admin_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "collectionPeriod_ay", false)) return false;
	if (up_ValueChanged(fobj, infix, "collectionPeriod_sem", false)) return false;
	if (up_ValueChanged(fobj, infix, "collectionPeriod_cutOffDate", false)) return false;
	if (up_ValueChanged(fobj, infix, "collectionPeriod_status", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
view_tbl_collectionperiod_admin_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
view_tbl_collectionperiod_admin_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
view_tbl_collectionperiod_admin_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
view_tbl_collectionperiod_admin_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($view_tbl_collectionperiod_admin->CurrentAction == "gridadd") {
	if ($view_tbl_collectionperiod_admin->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$view_tbl_collectionperiod_admin_grid->TotalRecs = $view_tbl_collectionperiod_admin->SelectRecordCount();
			$view_tbl_collectionperiod_admin_grid->Recordset = $view_tbl_collectionperiod_admin_grid->LoadRecordset($view_tbl_collectionperiod_admin_grid->StartRec-1, $view_tbl_collectionperiod_admin_grid->DisplayRecs);
		} else {
			if ($view_tbl_collectionperiod_admin_grid->Recordset = $view_tbl_collectionperiod_admin_grid->LoadRecordset())
				$view_tbl_collectionperiod_admin_grid->TotalRecs = $view_tbl_collectionperiod_admin_grid->Recordset->RecordCount();
		}
		$view_tbl_collectionperiod_admin_grid->StartRec = 1;
		$view_tbl_collectionperiod_admin_grid->DisplayRecs = $view_tbl_collectionperiod_admin_grid->TotalRecs;
	} else {
		$view_tbl_collectionperiod_admin->CurrentFilter = "0=1";
		$view_tbl_collectionperiod_admin_grid->StartRec = 1;
		$view_tbl_collectionperiod_admin_grid->DisplayRecs = $view_tbl_collectionperiod_admin->GridAddRowCount;
	}
	$view_tbl_collectionperiod_admin_grid->TotalRecs = $view_tbl_collectionperiod_admin_grid->DisplayRecs;
	$view_tbl_collectionperiod_admin_grid->StopRec = $view_tbl_collectionperiod_admin_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$view_tbl_collectionperiod_admin_grid->TotalRecs = $view_tbl_collectionperiod_admin->SelectRecordCount();
	} else {
		if ($view_tbl_collectionperiod_admin_grid->Recordset = $view_tbl_collectionperiod_admin_grid->LoadRecordset())
			$view_tbl_collectionperiod_admin_grid->TotalRecs = $view_tbl_collectionperiod_admin_grid->Recordset->RecordCount();
	}
	$view_tbl_collectionperiod_admin_grid->StartRec = 1;
	$view_tbl_collectionperiod_admin_grid->DisplayRecs = $view_tbl_collectionperiod_admin_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$view_tbl_collectionperiod_admin_grid->Recordset = $view_tbl_collectionperiod_admin_grid->LoadRecordset($view_tbl_collectionperiod_admin_grid->StartRec-1, $view_tbl_collectionperiod_admin_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($view_tbl_collectionperiod_admin->CurrentMode == "add" || $view_tbl_collectionperiod_admin->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($view_tbl_collectionperiod_admin->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $view_tbl_collectionperiod_admin->TableCaption() ?></p>
</p>
<?php $view_tbl_collectionperiod_admin_grid->ShowPageHeader(); ?>
<?php
$view_tbl_collectionperiod_admin_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($view_tbl_collectionperiod_admin->CurrentMode == "add" || $view_tbl_collectionperiod_admin->CurrentMode == "copy" || $view_tbl_collectionperiod_admin->CurrentMode == "edit") && $view_tbl_collectionperiod_admin->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_view_tbl_collectionperiod_admin" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $view_tbl_collectionperiod_admin->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$view_tbl_collectionperiod_admin_grid->RenderListOptions();

// Render list options (header, left)
$view_tbl_collectionperiod_admin_grid->ListOptions->Render("header", "left");
?>
<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_ay->Visible) { // collectionPeriod_ay ?>
	<?php if ($view_tbl_collectionperiod_admin->SortUrl($view_tbl_collectionperiod_admin->collectionPeriod_ay) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_collectionperiod_admin->collectionPeriod_ay->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_collectionperiod_admin->collectionPeriod_ay->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_sem->Visible) { // collectionPeriod_sem ?>
	<?php if ($view_tbl_collectionperiod_admin->SortUrl($view_tbl_collectionperiod_admin->collectionPeriod_sem) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_collectionperiod_admin->collectionPeriod_sem->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_collectionperiod_admin->collectionPeriod_sem->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
	<?php if ($view_tbl_collectionperiod_admin->SortUrl($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_status->Visible) { // collectionPeriod_status ?>
	<?php if ($view_tbl_collectionperiod_admin->SortUrl($view_tbl_collectionperiod_admin->collectionPeriod_status) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_collectionperiod_admin->collectionPeriod_status->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_collectionperiod_admin->collectionPeriod_status->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$view_tbl_collectionperiod_admin_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$view_tbl_collectionperiod_admin_grid->StartRec = 1;
$view_tbl_collectionperiod_admin_grid->StopRec = $view_tbl_collectionperiod_admin_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($view_tbl_collectionperiod_admin->CurrentAction == "gridadd" || $view_tbl_collectionperiod_admin->CurrentAction == "gridedit" || $view_tbl_collectionperiod_admin->CurrentAction == "F")) {
		$view_tbl_collectionperiod_admin_grid->KeyCount = $objForm->GetValue("key_count");
		$view_tbl_collectionperiod_admin_grid->StopRec = $view_tbl_collectionperiod_admin_grid->KeyCount;
	}
}
$view_tbl_collectionperiod_admin_grid->RecCnt = $view_tbl_collectionperiod_admin_grid->StartRec - 1;
if ($view_tbl_collectionperiod_admin_grid->Recordset && !$view_tbl_collectionperiod_admin_grid->Recordset->EOF) {
	$view_tbl_collectionperiod_admin_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $view_tbl_collectionperiod_admin_grid->StartRec > 1)
		$view_tbl_collectionperiod_admin_grid->Recordset->Move($view_tbl_collectionperiod_admin_grid->StartRec - 1);
} elseif (!$view_tbl_collectionperiod_admin->AllowAddDeleteRow && $view_tbl_collectionperiod_admin_grid->StopRec == 0) {
	$view_tbl_collectionperiod_admin_grid->StopRec = $view_tbl_collectionperiod_admin->GridAddRowCount;
}

// Initialize aggregate
$view_tbl_collectionperiod_admin->RowType = UP_ROWTYPE_AGGREGATEINIT;
$view_tbl_collectionperiod_admin->ResetAttrs();
$view_tbl_collectionperiod_admin_grid->RenderRow();
$view_tbl_collectionperiod_admin_grid->RowCnt = 0;
if ($view_tbl_collectionperiod_admin->CurrentAction == "gridadd")
	$view_tbl_collectionperiod_admin_grid->RowIndex = 0;
if ($view_tbl_collectionperiod_admin->CurrentAction == "gridedit")
	$view_tbl_collectionperiod_admin_grid->RowIndex = 0;
while ($view_tbl_collectionperiod_admin_grid->RecCnt < $view_tbl_collectionperiod_admin_grid->StopRec) {
	$view_tbl_collectionperiod_admin_grid->RecCnt++;
	if (intval($view_tbl_collectionperiod_admin_grid->RecCnt) >= intval($view_tbl_collectionperiod_admin_grid->StartRec)) {
		$view_tbl_collectionperiod_admin_grid->RowCnt++;
		if ($view_tbl_collectionperiod_admin->CurrentAction == "gridadd" || $view_tbl_collectionperiod_admin->CurrentAction == "gridedit" || $view_tbl_collectionperiod_admin->CurrentAction == "F")
			$view_tbl_collectionperiod_admin_grid->RowIndex++;

		// Set up key count
		$view_tbl_collectionperiod_admin_grid->KeyCount = $view_tbl_collectionperiod_admin_grid->RowIndex;

		// Init row class and style
		$view_tbl_collectionperiod_admin->ResetAttrs();
		$view_tbl_collectionperiod_admin->CssClass = "";
		if ($view_tbl_collectionperiod_admin->CurrentAction == "gridadd") {
			if ($view_tbl_collectionperiod_admin->CurrentMode == "copy") {
				$view_tbl_collectionperiod_admin_grid->LoadRowValues($view_tbl_collectionperiod_admin_grid->Recordset); // Load row values
				$view_tbl_collectionperiod_admin_grid->SetRecordKey($view_tbl_collectionperiod_admin_grid->RowOldKey, $view_tbl_collectionperiod_admin_grid->Recordset); // Set old record key
			} else {
				$view_tbl_collectionperiod_admin_grid->LoadDefaultValues(); // Load default values
				$view_tbl_collectionperiod_admin_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($view_tbl_collectionperiod_admin->CurrentAction == "gridedit") {
			$view_tbl_collectionperiod_admin_grid->LoadRowValues($view_tbl_collectionperiod_admin_grid->Recordset); // Load row values
		}
		$view_tbl_collectionperiod_admin->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($view_tbl_collectionperiod_admin->CurrentAction == "gridadd") // Grid add
			$view_tbl_collectionperiod_admin->RowType = UP_ROWTYPE_ADD; // Render add
		if ($view_tbl_collectionperiod_admin->CurrentAction == "gridadd" && $view_tbl_collectionperiod_admin->EventCancelled) // Insert failed
			$view_tbl_collectionperiod_admin_grid->RestoreCurrentRowFormValues($view_tbl_collectionperiod_admin_grid->RowIndex); // Restore form values
		if ($view_tbl_collectionperiod_admin->CurrentAction == "gridedit") { // Grid edit
			if ($view_tbl_collectionperiod_admin->EventCancelled) {
				$view_tbl_collectionperiod_admin_grid->RestoreCurrentRowFormValues($view_tbl_collectionperiod_admin_grid->RowIndex); // Restore form values
			}
			if ($view_tbl_collectionperiod_admin_grid->RowAction == "insert")
				$view_tbl_collectionperiod_admin->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$view_tbl_collectionperiod_admin->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($view_tbl_collectionperiod_admin->CurrentAction == "gridedit" && ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_EDIT || $view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_ADD) && $view_tbl_collectionperiod_admin->EventCancelled) // Update failed
			$view_tbl_collectionperiod_admin_grid->RestoreCurrentRowFormValues($view_tbl_collectionperiod_admin_grid->RowIndex); // Restore form values
		if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_EDIT) // Edit row
			$view_tbl_collectionperiod_admin_grid->EditRowCnt++;
		if ($view_tbl_collectionperiod_admin->CurrentAction == "F") // Confirm row
			$view_tbl_collectionperiod_admin_grid->RestoreCurrentRowFormValues($view_tbl_collectionperiod_admin_grid->RowIndex); // Restore form values
		if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_ADD || $view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($view_tbl_collectionperiod_admin->CurrentAction == "edit") {
				$view_tbl_collectionperiod_admin->RowAttrs = array();
				$view_tbl_collectionperiod_admin->CssClass = "upTableEditRow";
			} else {
				$view_tbl_collectionperiod_admin->RowAttrs = array();
			}
			if (!empty($view_tbl_collectionperiod_admin_grid->RowIndex))
				$view_tbl_collectionperiod_admin->RowAttrs = array_merge($view_tbl_collectionperiod_admin->RowAttrs, array('data-rowindex'=>$view_tbl_collectionperiod_admin_grid->RowIndex, 'id'=>'r' . $view_tbl_collectionperiod_admin_grid->RowIndex . '_view_tbl_collectionperiod_admin'));
		} else {
			$view_tbl_collectionperiod_admin->RowAttrs = array();
		}

		// Render row
		$view_tbl_collectionperiod_admin_grid->RenderRow();

		// Render list options
		$view_tbl_collectionperiod_admin_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_tbl_collectionperiod_admin_grid->RowAction <> "delete" && $view_tbl_collectionperiod_admin_grid->RowAction <> "insertdelete" && !($view_tbl_collectionperiod_admin_grid->RowAction == "insert" && $view_tbl_collectionperiod_admin->CurrentAction == "F" && $view_tbl_collectionperiod_admin_grid->EmptyRow())) {
?>
	<tr<?php echo $view_tbl_collectionperiod_admin->RowAttributes() ?>>
<?php

// Render list options (body, left)
$view_tbl_collectionperiod_admin_grid->ListOptions->Render("body", "left");
?>
	<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_ay->Visible) { // collectionPeriod_ay ?>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->CellAttributes() ?>>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" size="30" value="<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->EditValue ?>"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" id="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_ay->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" size="30" value="<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->EditValue ?>"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_ay->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" id="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_ay->OldValue) ?>">
<?php } ?>
<a name="<?php echo $view_tbl_collectionperiod_admin_grid->PageObjName . "_row_" . $view_tbl_collectionperiod_admin_grid->RowCnt ?>" id="<?php echo $view_tbl_collectionperiod_admin_grid->PageObjName . "_row_" . $view_tbl_collectionperiod_admin_grid->RowCnt ?>"></a>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" name="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ID" id="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ID" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_ID->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ID" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ID" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_ID->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_sem->Visible) { // collectionPeriod_sem ?>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->CellAttributes() ?>>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" size="30" value="<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->EditValue ?>"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" id="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_sem->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" size="30" value="<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->EditValue ?>"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_sem->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" id="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_sem->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CellAttributes() ?>>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->EditValue ?>"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->EditAttributes() ?>>
<input type="hidden" name="fo<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="fo<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo up_HtmlEncode(up_FormatDateTime($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->OldValue, 6)) ?>">
<input type="hidden" name="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->EditValue ?>"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_status->Visible) { // collectionPeriod_status ?>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->CellAttributes() ?>>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" value="{value}"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $view_tbl_collectionperiod_admin->collectionPeriod_status->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $view_tbl_collectionperiod_admin->collectionPeriod_status->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" id="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_status->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" value="{value}"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $view_tbl_collectionperiod_admin->collectionPeriod_status->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $view_tbl_collectionperiod_admin->collectionPeriod_status->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" id="o<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_status->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_tbl_collectionperiod_admin_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($view_tbl_collectionperiod_admin->CurrentAction <> "gridadd" || $view_tbl_collectionperiod_admin->CurrentMode == "copy")
		if (!$view_tbl_collectionperiod_admin_grid->Recordset->EOF) $view_tbl_collectionperiod_admin_grid->Recordset->MoveNext();
}
?>
<?php
	if ($view_tbl_collectionperiod_admin->CurrentMode == "add" || $view_tbl_collectionperiod_admin->CurrentMode == "copy" || $view_tbl_collectionperiod_admin->CurrentMode == "edit") {
		$view_tbl_collectionperiod_admin_grid->RowIndex = '$rowindex$';
		$view_tbl_collectionperiod_admin_grid->LoadDefaultValues();

		// Set row properties
		$view_tbl_collectionperiod_admin->ResetAttrs();
		$view_tbl_collectionperiod_admin->RowAttrs = array();
		if (!empty($view_tbl_collectionperiod_admin_grid->RowIndex))
			$view_tbl_collectionperiod_admin->RowAttrs = array_merge($view_tbl_collectionperiod_admin->RowAttrs, array('data-rowindex'=>$view_tbl_collectionperiod_admin_grid->RowIndex, 'id'=>'r' . $view_tbl_collectionperiod_admin_grid->RowIndex . '_view_tbl_collectionperiod_admin'));
		$view_tbl_collectionperiod_admin->RowType = UP_ROWTYPE_ADD;

		// Render row
		$view_tbl_collectionperiod_admin_grid->RenderRow();

		// Render list options
		$view_tbl_collectionperiod_admin_grid->RenderListOptions();

		// Add id and class to the template row
		$view_tbl_collectionperiod_admin->RowAttrs["id"] = "r0_view_tbl_collectionperiod_admin";
		up_AppendClass($view_tbl_collectionperiod_admin->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $view_tbl_collectionperiod_admin->RowAttributes() ?>>
<?php

// Render list options (body, left)
$view_tbl_collectionperiod_admin_grid->ListOptions->Render("body", "left");
?>
	<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_ay->Visible) { // collectionPeriod_ay ?>
		<td>
<?php if ($view_tbl_collectionperiod_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" size="30" value="<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->EditValue ?>"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_ay" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_ay->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_sem->Visible) { // collectionPeriod_sem ?>
		<td>
<?php if ($view_tbl_collectionperiod_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" size="30" value="<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->EditValue ?>"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_sem" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_sem->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
		<td>
<?php if ($view_tbl_collectionperiod_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->EditValue ?>"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_cutOffDate" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_status->Visible) { // collectionPeriod_status ?>
		<td>
<?php if ($view_tbl_collectionperiod_admin->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" value="{value}"<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $view_tbl_collectionperiod_admin->collectionPeriod_status->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $view_tbl_collectionperiod_admin->collectionPeriod_status->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" id="x<?php echo $view_tbl_collectionperiod_admin_grid->RowIndex ?>_collectionPeriod_status" value="<?php echo up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_status->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_tbl_collectionperiod_admin_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($view_tbl_collectionperiod_admin->CurrentMode == "add" || $view_tbl_collectionperiod_admin->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $view_tbl_collectionperiod_admin_grid->KeyCount ?>">
<?php echo $view_tbl_collectionperiod_admin_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_tbl_collectionperiod_admin->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $view_tbl_collectionperiod_admin_grid->KeyCount ?>">
<?php echo $view_tbl_collectionperiod_admin_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="view_tbl_collectionperiod_admin_grid">
</div>
<?php

// Close recordset
if ($view_tbl_collectionperiod_admin_grid->Recordset)
	$view_tbl_collectionperiod_admin_grid->Recordset->Close();
?>
<?php if (($view_tbl_collectionperiod_admin->CurrentMode == "add" || $view_tbl_collectionperiod_admin->CurrentMode == "copy" || $view_tbl_collectionperiod_admin->CurrentMode == "edit") && $view_tbl_collectionperiod_admin->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridLowerPanel">
</div>
<?php } ?>
</td></tr></table>
<?php if ($view_tbl_collectionperiod_admin->Export == "" && $view_tbl_collectionperiod_admin->CurrentAction == "") { ?>
<?php } ?>
<?php
$view_tbl_collectionperiod_admin_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$view_tbl_collectionperiod_admin_grid->Page_Terminate();
$Page =& $MasterPage;
?>
