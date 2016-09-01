<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$frm_sam_units_grid = new cfrm_sam_units_grid();
$MasterPage =& $Page;
$Page =& $frm_sam_units_grid;

// Page init
$frm_sam_units_grid->Page_Init();

// Page main
$frm_sam_units_grid->Page_Main();
?>
<?php if ($frm_sam_units->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_units_grid = new up_Page("frm_sam_units_grid");

// page properties
frm_sam_units_grid.PageID = "grid"; // page ID
frm_sam_units_grid.FormID = "ffrm_sam_unitsgrid"; // form ID
var UP_PAGE_ID = frm_sam_units_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_sam_units_grid.ValidateForm = function(fobj) {
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
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_units->personnel_count->FldErrMsg()) ?>");

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
frm_sam_units_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "cu_unit_name", false)) return false;
	if (up_ValueChanged(fobj, infix, "personnel_count", false)) return false;
	if (up_ValueChanged(fobj, infix, "mfo_1", false)) return false;
	if (up_ValueChanged(fobj, infix, "mfo_2", false)) return false;
	if (up_ValueChanged(fobj, infix, "mfo_3", false)) return false;
	if (up_ValueChanged(fobj, infix, "mfo_4", false)) return false;
	if (up_ValueChanged(fobj, infix, "mfo_5", false)) return false;
	if (up_ValueChanged(fobj, infix, "sto", false)) return false;
	if (up_ValueChanged(fobj, infix, "gass", false)) return false;
	if (up_ValueChanged(fobj, infix, "t_cutOffDate_remarks", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
frm_sam_units_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_units_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_units_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_units_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($frm_sam_units->CurrentAction == "gridadd") {
	if ($frm_sam_units->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$frm_sam_units_grid->TotalRecs = $frm_sam_units->SelectRecordCount();
			$frm_sam_units_grid->Recordset = $frm_sam_units_grid->LoadRecordset($frm_sam_units_grid->StartRec-1, $frm_sam_units_grid->DisplayRecs);
		} else {
			if ($frm_sam_units_grid->Recordset = $frm_sam_units_grid->LoadRecordset())
				$frm_sam_units_grid->TotalRecs = $frm_sam_units_grid->Recordset->RecordCount();
		}
		$frm_sam_units_grid->StartRec = 1;
		$frm_sam_units_grid->DisplayRecs = $frm_sam_units_grid->TotalRecs;
	} else {
		$frm_sam_units->CurrentFilter = "0=1";
		$frm_sam_units_grid->StartRec = 1;
		$frm_sam_units_grid->DisplayRecs = $frm_sam_units->GridAddRowCount;
	}
	$frm_sam_units_grid->TotalRecs = $frm_sam_units_grid->DisplayRecs;
	$frm_sam_units_grid->StopRec = $frm_sam_units_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_sam_units_grid->TotalRecs = $frm_sam_units->SelectRecordCount();
	} else {
		if ($frm_sam_units_grid->Recordset = $frm_sam_units_grid->LoadRecordset())
			$frm_sam_units_grid->TotalRecs = $frm_sam_units_grid->Recordset->RecordCount();
	}
	$frm_sam_units_grid->StartRec = 1;
	$frm_sam_units_grid->DisplayRecs = $frm_sam_units_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$frm_sam_units_grid->Recordset = $frm_sam_units_grid->LoadRecordset($frm_sam_units_grid->StartRec-1, $frm_sam_units_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($frm_sam_units->CurrentMode == "add" || $frm_sam_units->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($frm_sam_units->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_units->TableCaption() ?></p>
</p>
<?php $frm_sam_units_grid->ShowPageHeader(); ?>
<?php
$frm_sam_units_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($frm_sam_units->CurrentMode == "add" || $frm_sam_units->CurrentMode == "copy" || $frm_sam_units->CurrentMode == "edit") && $frm_sam_units->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
<?php if ($frm_sam_units->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><?php echo $Language->Phrase("AddBlankRow") ?></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
<div id="gmp_frm_sam_units" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_sam_units->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_sam_units_grid->RenderListOptions();

// Render list options (header, left)
$frm_sam_units_grid->ListOptions->Render("header", "left");
?>
<?php if ($frm_sam_units->cu_unit_name->Visible) { // cu_unit_name ?>
	<?php if ($frm_sam_units->SortUrl($frm_sam_units->cu_unit_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_units->cu_unit_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_units->cu_unit_name->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_units->cu_unit_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_units->cu_unit_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_units->personnel_count->Visible) { // personnel_count ?>
	<?php if ($frm_sam_units->SortUrl($frm_sam_units->personnel_count) == "") { ?>
		<td><?php echo $frm_sam_units->personnel_count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_units->personnel_count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_units->personnel_count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_units->personnel_count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_units->mfo_1->Visible) { // mfo_1 ?>
	<?php if ($frm_sam_units->SortUrl($frm_sam_units->mfo_1) == "") { ?>
		<td><?php echo $frm_sam_units->mfo_1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_units->mfo_1->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_units->mfo_1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_units->mfo_1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_units->mfo_2->Visible) { // mfo_2 ?>
	<?php if ($frm_sam_units->SortUrl($frm_sam_units->mfo_2) == "") { ?>
		<td><?php echo $frm_sam_units->mfo_2->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_units->mfo_2->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_units->mfo_2->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_units->mfo_2->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_units->mfo_3->Visible) { // mfo_3 ?>
	<?php if ($frm_sam_units->SortUrl($frm_sam_units->mfo_3) == "") { ?>
		<td><?php echo $frm_sam_units->mfo_3->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_units->mfo_3->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_units->mfo_3->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_units->mfo_3->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_units->mfo_4->Visible) { // mfo_4 ?>
	<?php if ($frm_sam_units->SortUrl($frm_sam_units->mfo_4) == "") { ?>
		<td><?php echo $frm_sam_units->mfo_4->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_units->mfo_4->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_units->mfo_4->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_units->mfo_4->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_units->mfo_5->Visible) { // mfo_5 ?>
	<?php if ($frm_sam_units->SortUrl($frm_sam_units->mfo_5) == "") { ?>
		<td><?php echo $frm_sam_units->mfo_5->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_units->mfo_5->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_units->mfo_5->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_units->mfo_5->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_units->sto->Visible) { // sto ?>
	<?php if ($frm_sam_units->SortUrl($frm_sam_units->sto) == "") { ?>
		<td><?php echo $frm_sam_units->sto->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_units->sto->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_units->sto->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_units->sto->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_units->gass->Visible) { // gass ?>
	<?php if ($frm_sam_units->SortUrl($frm_sam_units->gass) == "") { ?>
		<td><?php echo $frm_sam_units->gass->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_units->gass->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_units->gass->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_units->gass->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_units->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
	<?php if ($frm_sam_units->SortUrl($frm_sam_units->t_cutOffDate_remarks) == "") { ?>
		<td><?php echo $frm_sam_units->t_cutOffDate_remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_units->t_cutOffDate_remarks->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_units->t_cutOffDate_remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_units->t_cutOffDate_remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_sam_units_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$frm_sam_units_grid->StartRec = 1;
$frm_sam_units_grid->StopRec = $frm_sam_units_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($frm_sam_units->CurrentAction == "gridadd" || $frm_sam_units->CurrentAction == "gridedit" || $frm_sam_units->CurrentAction == "F")) {
		$frm_sam_units_grid->KeyCount = $objForm->GetValue("key_count");
		$frm_sam_units_grid->StopRec = $frm_sam_units_grid->KeyCount;
	}
}
$frm_sam_units_grid->RecCnt = $frm_sam_units_grid->StartRec - 1;
if ($frm_sam_units_grid->Recordset && !$frm_sam_units_grid->Recordset->EOF) {
	$frm_sam_units_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_sam_units_grid->StartRec > 1)
		$frm_sam_units_grid->Recordset->Move($frm_sam_units_grid->StartRec - 1);
} elseif (!$frm_sam_units->AllowAddDeleteRow && $frm_sam_units_grid->StopRec == 0) {
	$frm_sam_units_grid->StopRec = $frm_sam_units->GridAddRowCount;
}

// Initialize aggregate
$frm_sam_units->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_sam_units->ResetAttrs();
$frm_sam_units_grid->RenderRow();
$frm_sam_units_grid->RowCnt = 0;
if ($frm_sam_units->CurrentAction == "gridadd")
	$frm_sam_units_grid->RowIndex = 0;
if ($frm_sam_units->CurrentAction == "gridedit")
	$frm_sam_units_grid->RowIndex = 0;
while ($frm_sam_units_grid->RecCnt < $frm_sam_units_grid->StopRec) {
	$frm_sam_units_grid->RecCnt++;
	if (intval($frm_sam_units_grid->RecCnt) >= intval($frm_sam_units_grid->StartRec)) {
		$frm_sam_units_grid->RowCnt++;
		if ($frm_sam_units->CurrentAction == "gridadd" || $frm_sam_units->CurrentAction == "gridedit" || $frm_sam_units->CurrentAction == "F")
			$frm_sam_units_grid->RowIndex++;

		// Set up key count
		$frm_sam_units_grid->KeyCount = $frm_sam_units_grid->RowIndex;

		// Init row class and style
		$frm_sam_units->ResetAttrs();
		$frm_sam_units->CssClass = "";
		if ($frm_sam_units->CurrentAction == "gridadd") {
			if ($frm_sam_units->CurrentMode == "copy") {
				$frm_sam_units_grid->LoadRowValues($frm_sam_units_grid->Recordset); // Load row values
				$frm_sam_units_grid->SetRecordKey($frm_sam_units_grid->RowOldKey, $frm_sam_units_grid->Recordset); // Set old record key
			} else {
				$frm_sam_units_grid->LoadDefaultValues(); // Load default values
				$frm_sam_units_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($frm_sam_units->CurrentAction == "gridedit") {
			$frm_sam_units_grid->LoadRowValues($frm_sam_units_grid->Recordset); // Load row values
		}
		$frm_sam_units->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($frm_sam_units->CurrentAction == "gridadd") // Grid add
			$frm_sam_units->RowType = UP_ROWTYPE_ADD; // Render add
		if ($frm_sam_units->CurrentAction == "gridadd" && $frm_sam_units->EventCancelled) // Insert failed
			$frm_sam_units_grid->RestoreCurrentRowFormValues($frm_sam_units_grid->RowIndex); // Restore form values
		if ($frm_sam_units->CurrentAction == "gridedit") { // Grid edit
			if ($frm_sam_units->EventCancelled) {
				$frm_sam_units_grid->RestoreCurrentRowFormValues($frm_sam_units_grid->RowIndex); // Restore form values
			}
			if ($frm_sam_units_grid->RowAction == "insert")
				$frm_sam_units->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$frm_sam_units->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($frm_sam_units->CurrentAction == "gridedit" && ($frm_sam_units->RowType == UP_ROWTYPE_EDIT || $frm_sam_units->RowType == UP_ROWTYPE_ADD) && $frm_sam_units->EventCancelled) // Update failed
			$frm_sam_units_grid->RestoreCurrentRowFormValues($frm_sam_units_grid->RowIndex); // Restore form values
		if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) // Edit row
			$frm_sam_units_grid->EditRowCnt++;
		if ($frm_sam_units->CurrentAction == "F") // Confirm row
			$frm_sam_units_grid->RestoreCurrentRowFormValues($frm_sam_units_grid->RowIndex); // Restore form values
		if ($frm_sam_units->RowType == UP_ROWTYPE_ADD || $frm_sam_units->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($frm_sam_units->CurrentAction == "edit") {
				$frm_sam_units->RowAttrs = array();
				$frm_sam_units->CssClass = "upTableEditRow";
			} else {
				$frm_sam_units->RowAttrs = array();
			}
			if (!empty($frm_sam_units_grid->RowIndex))
				$frm_sam_units->RowAttrs = array_merge($frm_sam_units->RowAttrs, array('data-rowindex'=>$frm_sam_units_grid->RowIndex, 'id'=>'r' . $frm_sam_units_grid->RowIndex . '_frm_sam_units'));
		} else {
			$frm_sam_units->RowAttrs = array();
		}

		// Render row
		$frm_sam_units_grid->RenderRow();

		// Render list options
		$frm_sam_units_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($frm_sam_units_grid->RowAction <> "delete" && $frm_sam_units_grid->RowAction <> "insertdelete" && !($frm_sam_units_grid->RowAction == "insert" && $frm_sam_units->CurrentAction == "F" && $frm_sam_units_grid->EmptyRow())) {
?>
	<tr<?php echo $frm_sam_units->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_sam_units_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_sam_units->cu_unit_name->Visible) { // cu_unit_name ?>
		<td<?php echo $frm_sam_units->cu_unit_name->CellAttributes() ?>>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_sam_units->cu_unit_name->EditValue ?>"<?php echo $frm_sam_units->cu_unit_name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_sam_units->cu_unit_name->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_sam_units->cu_unit_name->EditValue ?>"<?php echo $frm_sam_units->cu_unit_name->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_units->cu_unit_name->ViewAttributes() ?>><?php echo $frm_sam_units->cu_unit_name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_sam_units->cu_unit_name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_sam_units->cu_unit_name->OldValue) ?>">
<?php } ?>
<a name="<?php echo $frm_sam_units_grid->PageObjName . "_row_" . $frm_sam_units_grid->RowCnt ?>" id="<?php echo $frm_sam_units_grid->PageObjName . "_row_" . $frm_sam_units_grid->RowCnt ?>"></a>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_units_id" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_units_id" value="<?php echo up_HtmlEncode($frm_sam_units->units_id->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_units_id" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_units_id" value="<?php echo up_HtmlEncode($frm_sam_units->units_id->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->personnel_count->Visible) { // personnel_count ?>
		<td<?php echo $frm_sam_units->personnel_count->CellAttributes() ?>>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" size="30" value="<?php echo $frm_sam_units->personnel_count->EditValue ?>"<?php echo $frm_sam_units->personnel_count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" value="<?php echo up_HtmlEncode($frm_sam_units->personnel_count->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" size="30" value="<?php echo $frm_sam_units->personnel_count->EditValue ?>"<?php echo $frm_sam_units->personnel_count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_units->personnel_count->ViewAttributes() ?>><?php echo $frm_sam_units->personnel_count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" value="<?php echo up_HtmlEncode($frm_sam_units->personnel_count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" value="<?php echo up_HtmlEncode($frm_sam_units->personnel_count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->mfo_1->Visible) { // mfo_1 ?>
		<td<?php echo $frm_sam_units->mfo_1->CellAttributes() ?>>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" value="{value}"<?php echo $frm_sam_units->mfo_1->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_1->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_1->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_1->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_1->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_1->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" value="{value}"<?php echo $frm_sam_units->mfo_1->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_1->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_1->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_1->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_1->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_units->mfo_1->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_1->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_1->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_1->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->mfo_2->Visible) { // mfo_2 ?>
		<td<?php echo $frm_sam_units->mfo_2->CellAttributes() ?>>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" value="{value}"<?php echo $frm_sam_units->mfo_2->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_2->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_2->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_2->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_2->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_2->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" value="{value}"<?php echo $frm_sam_units->mfo_2->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_2->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_2->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_2->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_2->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_units->mfo_2->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_2->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_2->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_2->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->mfo_3->Visible) { // mfo_3 ?>
		<td<?php echo $frm_sam_units->mfo_3->CellAttributes() ?>>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" value="{value}"<?php echo $frm_sam_units->mfo_3->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_3->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_3->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_3->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_3->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_3->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" value="{value}"<?php echo $frm_sam_units->mfo_3->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_3->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_3->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_3->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_3->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_units->mfo_3->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_3->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_3->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_3->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->mfo_4->Visible) { // mfo_4 ?>
		<td<?php echo $frm_sam_units->mfo_4->CellAttributes() ?>>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" value="{value}"<?php echo $frm_sam_units->mfo_4->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_4->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_4->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_4->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_4->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_4->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" value="{value}"<?php echo $frm_sam_units->mfo_4->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_4->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_4->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_4->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_4->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_units->mfo_4->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_4->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_4->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_4->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->mfo_5->Visible) { // mfo_5 ?>
		<td<?php echo $frm_sam_units->mfo_5->CellAttributes() ?>>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" value="{value}"<?php echo $frm_sam_units->mfo_5->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_5->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_5->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_5->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_5->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_5->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" value="{value}"<?php echo $frm_sam_units->mfo_5->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_5->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_5->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_5->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_5->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_units->mfo_5->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_5->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_5->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_5->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->sto->Visible) { // sto ?>
		<td<?php echo $frm_sam_units->sto->CellAttributes() ?>>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" value="{value}"<?php echo $frm_sam_units->sto->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->sto->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->sto->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->sto->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->sto->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_sto" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_sto" value="<?php echo up_HtmlEncode($frm_sam_units->sto->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" value="{value}"<?php echo $frm_sam_units->sto->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->sto->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->sto->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->sto->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->sto->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_units->sto->ViewAttributes() ?>><?php echo $frm_sam_units->sto->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" value="<?php echo up_HtmlEncode($frm_sam_units->sto->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_sto" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_sto" value="<?php echo up_HtmlEncode($frm_sam_units->sto->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->gass->Visible) { // gass ?>
		<td<?php echo $frm_sam_units->gass->CellAttributes() ?>>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" value="{value}"<?php echo $frm_sam_units->gass->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->gass->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->gass->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->gass->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->gass->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_gass" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_gass" value="<?php echo up_HtmlEncode($frm_sam_units->gass->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" value="{value}"<?php echo $frm_sam_units->gass->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->gass->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->gass->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->gass->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->gass->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_units->gass->ViewAttributes() ?>><?php echo $frm_sam_units->gass->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" value="<?php echo up_HtmlEncode($frm_sam_units->gass->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_gass" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_gass" value="<?php echo up_HtmlEncode($frm_sam_units->gass->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
		<td<?php echo $frm_sam_units->t_cutOffDate_remarks->CellAttributes() ?>>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" size="30" maxlength="255" value="<?php echo $frm_sam_units->t_cutOffDate_remarks->EditValue ?>"<?php echo $frm_sam_units->t_cutOffDate_remarks->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" value="<?php echo up_HtmlEncode($frm_sam_units->t_cutOffDate_remarks->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_sam_units->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_sam_units->t_cutOffDate_remarks->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" value="<?php echo up_HtmlEncode($frm_sam_units->t_cutOffDate_remarks->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_units->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_sam_units->t_cutOffDate_remarks->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" value="<?php echo up_HtmlEncode($frm_sam_units->t_cutOffDate_remarks->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" id="o<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" value="<?php echo up_HtmlEncode($frm_sam_units->t_cutOffDate_remarks->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_sam_units_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($frm_sam_units->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($frm_sam_units->CurrentAction <> "gridadd" || $frm_sam_units->CurrentMode == "copy")
		if (!$frm_sam_units_grid->Recordset->EOF) $frm_sam_units_grid->Recordset->MoveNext();
}
?>
<?php
	if ($frm_sam_units->CurrentMode == "add" || $frm_sam_units->CurrentMode == "copy" || $frm_sam_units->CurrentMode == "edit") {
		$frm_sam_units_grid->RowIndex = '$rowindex$';
		$frm_sam_units_grid->LoadDefaultValues();

		// Set row properties
		$frm_sam_units->ResetAttrs();
		$frm_sam_units->RowAttrs = array();
		if (!empty($frm_sam_units_grid->RowIndex))
			$frm_sam_units->RowAttrs = array_merge($frm_sam_units->RowAttrs, array('data-rowindex'=>$frm_sam_units_grid->RowIndex, 'id'=>'r' . $frm_sam_units_grid->RowIndex . '_frm_sam_units'));
		$frm_sam_units->RowType = UP_ROWTYPE_ADD;

		// Render row
		$frm_sam_units_grid->RenderRow();

		// Render list options
		$frm_sam_units_grid->RenderListOptions();

		// Add id and class to the template row
		$frm_sam_units->RowAttrs["id"] = "r0_frm_sam_units";
		up_AppendClass($frm_sam_units->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $frm_sam_units->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_sam_units_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_sam_units->cu_unit_name->Visible) { // cu_unit_name ?>
		<td>
<?php if ($frm_sam_units->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_sam_units->cu_unit_name->EditValue ?>"<?php echo $frm_sam_units->cu_unit_name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_units->cu_unit_name->ViewAttributes() ?>><?php echo $frm_sam_units->cu_unit_name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_sam_units->cu_unit_name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->personnel_count->Visible) { // personnel_count ?>
		<td>
<?php if ($frm_sam_units->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" size="30" value="<?php echo $frm_sam_units->personnel_count->EditValue ?>"<?php echo $frm_sam_units->personnel_count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_units->personnel_count->ViewAttributes() ?>><?php echo $frm_sam_units->personnel_count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_personnel_count" value="<?php echo up_HtmlEncode($frm_sam_units->personnel_count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->mfo_1->Visible) { // mfo_1 ?>
		<td>
<?php if ($frm_sam_units->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" value="{value}"<?php echo $frm_sam_units->mfo_1->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_1->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_1->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_1->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_1->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $frm_sam_units->mfo_1->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_1->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_1" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_1->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->mfo_2->Visible) { // mfo_2 ?>
		<td>
<?php if ($frm_sam_units->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" value="{value}"<?php echo $frm_sam_units->mfo_2->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_2->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_2->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_2->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_2->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $frm_sam_units->mfo_2->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_2->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_2" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_2->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->mfo_3->Visible) { // mfo_3 ?>
		<td>
<?php if ($frm_sam_units->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" value="{value}"<?php echo $frm_sam_units->mfo_3->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_3->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_3->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_3->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_3->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $frm_sam_units->mfo_3->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_3->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_3" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_3->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->mfo_4->Visible) { // mfo_4 ?>
		<td>
<?php if ($frm_sam_units->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" value="{value}"<?php echo $frm_sam_units->mfo_4->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_4->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_4->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_4->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_4->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $frm_sam_units->mfo_4->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_4->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_4" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_4->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->mfo_5->Visible) { // mfo_5 ?>
		<td>
<?php if ($frm_sam_units->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" value="{value}"<?php echo $frm_sam_units->mfo_5->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->mfo_5->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->mfo_5->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->mfo_5->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->mfo_5->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $frm_sam_units->mfo_5->ViewAttributes() ?>><?php echo $frm_sam_units->mfo_5->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_mfo_5" value="<?php echo up_HtmlEncode($frm_sam_units->mfo_5->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->sto->Visible) { // sto ?>
		<td>
<?php if ($frm_sam_units->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" value="{value}"<?php echo $frm_sam_units->sto->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->sto->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->sto->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->sto->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->sto->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $frm_sam_units->sto->ViewAttributes() ?>><?php echo $frm_sam_units->sto->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_sto" value="<?php echo up_HtmlEncode($frm_sam_units->sto->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->gass->Visible) { // gass ?>
		<td>
<?php if ($frm_sam_units->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" value="{value}"<?php echo $frm_sam_units->gass->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $frm_sam_units->gass->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($frm_sam_units->gass->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $frm_sam_units->gass->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $frm_sam_units->gass->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $frm_sam_units->gass->ViewAttributes() ?>><?php echo $frm_sam_units->gass->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_gass" value="<?php echo up_HtmlEncode($frm_sam_units->gass->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_units->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
		<td>
<?php if ($frm_sam_units->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" size="30" maxlength="255" value="<?php echo $frm_sam_units->t_cutOffDate_remarks->EditValue ?>"<?php echo $frm_sam_units->t_cutOffDate_remarks->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_units->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_sam_units->t_cutOffDate_remarks->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" id="x<?php echo $frm_sam_units_grid->RowIndex ?>_t_cutOffDate_remarks" value="<?php echo up_HtmlEncode($frm_sam_units->t_cutOffDate_remarks->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_sam_units_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($frm_sam_units->CurrentMode == "add" || $frm_sam_units->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_sam_units_grid->KeyCount ?>">
<?php echo $frm_sam_units_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($frm_sam_units->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_sam_units_grid->KeyCount ?>">
<?php echo $frm_sam_units_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="frm_sam_units_grid">
</div>
<?php

// Close recordset
if ($frm_sam_units_grid->Recordset)
	$frm_sam_units_grid->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_sam_units->Export == "" && $frm_sam_units->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_sam_units_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$frm_sam_units_grid->Page_Terminate();
$Page =& $MasterPage;
?>
