<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$tbl_uporgchart_unit_grid = new ctbl_uporgchart_unit_grid();
$MasterPage =& $Page;
$Page =& $tbl_uporgchart_unit_grid;

// Page init
$tbl_uporgchart_unit_grid->Page_Init();

// Page main
$tbl_uporgchart_unit_grid->Page_Main();
?>
<?php if ($tbl_uporgchart_unit->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_uporgchart_unit_grid = new up_Page("tbl_uporgchart_unit_grid");

// page properties
tbl_uporgchart_unit_grid.PageID = "grid"; // page ID
tbl_uporgchart_unit_grid.FormID = "ftbl_uporgchart_unitgrid"; // form ID
var UP_PAGE_ID = tbl_uporgchart_unit_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_uporgchart_unit_grid.ValidateForm = function(fobj) {
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
tbl_uporgchart_unit_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "nameOfUnit", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
tbl_uporgchart_unit_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_uporgchart_unit_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_uporgchart_unit_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_uporgchart_unit_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($tbl_uporgchart_unit->CurrentAction == "gridadd") {
	if ($tbl_uporgchart_unit->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$tbl_uporgchart_unit_grid->TotalRecs = $tbl_uporgchart_unit->SelectRecordCount();
			$tbl_uporgchart_unit_grid->Recordset = $tbl_uporgchart_unit_grid->LoadRecordset($tbl_uporgchart_unit_grid->StartRec-1, $tbl_uporgchart_unit_grid->DisplayRecs);
		} else {
			if ($tbl_uporgchart_unit_grid->Recordset = $tbl_uporgchart_unit_grid->LoadRecordset())
				$tbl_uporgchart_unit_grid->TotalRecs = $tbl_uporgchart_unit_grid->Recordset->RecordCount();
		}
		$tbl_uporgchart_unit_grid->StartRec = 1;
		$tbl_uporgchart_unit_grid->DisplayRecs = $tbl_uporgchart_unit_grid->TotalRecs;
	} else {
		$tbl_uporgchart_unit->CurrentFilter = "0=1";
		$tbl_uporgchart_unit_grid->StartRec = 1;
		$tbl_uporgchart_unit_grid->DisplayRecs = $tbl_uporgchart_unit->GridAddRowCount;
	}
	$tbl_uporgchart_unit_grid->TotalRecs = $tbl_uporgchart_unit_grid->DisplayRecs;
	$tbl_uporgchart_unit_grid->StopRec = $tbl_uporgchart_unit_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_uporgchart_unit_grid->TotalRecs = $tbl_uporgchart_unit->SelectRecordCount();
	} else {
		if ($tbl_uporgchart_unit_grid->Recordset = $tbl_uporgchart_unit_grid->LoadRecordset())
			$tbl_uporgchart_unit_grid->TotalRecs = $tbl_uporgchart_unit_grid->Recordset->RecordCount();
	}
	$tbl_uporgchart_unit_grid->StartRec = 1;
	$tbl_uporgchart_unit_grid->DisplayRecs = $tbl_uporgchart_unit_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$tbl_uporgchart_unit_grid->Recordset = $tbl_uporgchart_unit_grid->LoadRecordset($tbl_uporgchart_unit_grid->StartRec-1, $tbl_uporgchart_unit_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($tbl_uporgchart_unit->CurrentMode == "add" || $tbl_uporgchart_unit->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($tbl_uporgchart_unit->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_uporgchart_unit->TableCaption() ?></p>
</p>
<?php $tbl_uporgchart_unit_grid->ShowPageHeader(); ?>
<?php
$tbl_uporgchart_unit_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($tbl_uporgchart_unit->CurrentMode == "add" || $tbl_uporgchart_unit->CurrentMode == "copy" || $tbl_uporgchart_unit->CurrentMode == "edit") && $tbl_uporgchart_unit->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
<?php if ($tbl_uporgchart_unit->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><img src='phpimages/addblankrow.gif' alt='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' title='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' width='16' height='16' border='0'></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
<div id="gmp_tbl_uporgchart_unit" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_uporgchart_unit->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_uporgchart_unit_grid->RenderListOptions();

// Render list options (header, left)
$tbl_uporgchart_unit_grid->ListOptions->Render("header", "left");
?>
<?php if ($tbl_uporgchart_unit->nameOfUnit->Visible) { // nameOfUnit ?>
	<?php if ($tbl_uporgchart_unit->SortUrl($tbl_uporgchart_unit->nameOfUnit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_uporgchart_unit->nameOfUnit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_uporgchart_unit->nameOfUnit->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_uporgchart_unit->nameOfUnit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_uporgchart_unit->nameOfUnit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_uporgchart_unit_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$tbl_uporgchart_unit_grid->StartRec = 1;
$tbl_uporgchart_unit_grid->StopRec = $tbl_uporgchart_unit_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($tbl_uporgchart_unit->CurrentAction == "gridadd" || $tbl_uporgchart_unit->CurrentAction == "gridedit" || $tbl_uporgchart_unit->CurrentAction == "F")) {
		$tbl_uporgchart_unit_grid->KeyCount = $objForm->GetValue("key_count");
		$tbl_uporgchart_unit_grid->StopRec = $tbl_uporgchart_unit_grid->KeyCount;
	}
}
$tbl_uporgchart_unit_grid->RecCnt = $tbl_uporgchart_unit_grid->StartRec - 1;
if ($tbl_uporgchart_unit_grid->Recordset && !$tbl_uporgchart_unit_grid->Recordset->EOF) {
	$tbl_uporgchart_unit_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_uporgchart_unit_grid->StartRec > 1)
		$tbl_uporgchart_unit_grid->Recordset->Move($tbl_uporgchart_unit_grid->StartRec - 1);
} elseif (!$tbl_uporgchart_unit->AllowAddDeleteRow && $tbl_uporgchart_unit_grid->StopRec == 0) {
	$tbl_uporgchart_unit_grid->StopRec = $tbl_uporgchart_unit->GridAddRowCount;
}

// Initialize aggregate
$tbl_uporgchart_unit->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_uporgchart_unit->ResetAttrs();
$tbl_uporgchart_unit_grid->RenderRow();
$tbl_uporgchart_unit_grid->RowCnt = 0;
if ($tbl_uporgchart_unit->CurrentAction == "gridadd")
	$tbl_uporgchart_unit_grid->RowIndex = 0;
if ($tbl_uporgchart_unit->CurrentAction == "gridedit")
	$tbl_uporgchart_unit_grid->RowIndex = 0;
while ($tbl_uporgchart_unit_grid->RecCnt < $tbl_uporgchart_unit_grid->StopRec) {
	$tbl_uporgchart_unit_grid->RecCnt++;
	if (intval($tbl_uporgchart_unit_grid->RecCnt) >= intval($tbl_uporgchart_unit_grid->StartRec)) {
		$tbl_uporgchart_unit_grid->RowCnt++;
		if ($tbl_uporgchart_unit->CurrentAction == "gridadd" || $tbl_uporgchart_unit->CurrentAction == "gridedit" || $tbl_uporgchart_unit->CurrentAction == "F")
			$tbl_uporgchart_unit_grid->RowIndex++;

		// Set up key count
		$tbl_uporgchart_unit_grid->KeyCount = $tbl_uporgchart_unit_grid->RowIndex;

		// Init row class and style
		$tbl_uporgchart_unit->ResetAttrs();
		$tbl_uporgchart_unit->CssClass = "";
		if ($tbl_uporgchart_unit->CurrentAction == "gridadd") {
			if ($tbl_uporgchart_unit->CurrentMode == "copy") {
				$tbl_uporgchart_unit_grid->LoadRowValues($tbl_uporgchart_unit_grid->Recordset); // Load row values
				$tbl_uporgchart_unit_grid->SetRecordKey($tbl_uporgchart_unit_grid->RowOldKey, $tbl_uporgchart_unit_grid->Recordset); // Set old record key
			} else {
				$tbl_uporgchart_unit_grid->LoadDefaultValues(); // Load default values
				$tbl_uporgchart_unit_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($tbl_uporgchart_unit->CurrentAction == "gridedit") {
			$tbl_uporgchart_unit_grid->LoadRowValues($tbl_uporgchart_unit_grid->Recordset); // Load row values
		}
		$tbl_uporgchart_unit->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($tbl_uporgchart_unit->CurrentAction == "gridadd") // Grid add
			$tbl_uporgchart_unit->RowType = UP_ROWTYPE_ADD; // Render add
		if ($tbl_uporgchart_unit->CurrentAction == "gridadd" && $tbl_uporgchart_unit->EventCancelled) // Insert failed
			$tbl_uporgchart_unit_grid->RestoreCurrentRowFormValues($tbl_uporgchart_unit_grid->RowIndex); // Restore form values
		if ($tbl_uporgchart_unit->CurrentAction == "gridedit") { // Grid edit
			if ($tbl_uporgchart_unit->EventCancelled) {
				$tbl_uporgchart_unit_grid->RestoreCurrentRowFormValues($tbl_uporgchart_unit_grid->RowIndex); // Restore form values
			}
			if ($tbl_uporgchart_unit_grid->RowAction == "insert")
				$tbl_uporgchart_unit->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$tbl_uporgchart_unit->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($tbl_uporgchart_unit->CurrentAction == "gridedit" && ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_EDIT || $tbl_uporgchart_unit->RowType == UP_ROWTYPE_ADD) && $tbl_uporgchart_unit->EventCancelled) // Update failed
			$tbl_uporgchart_unit_grid->RestoreCurrentRowFormValues($tbl_uporgchart_unit_grid->RowIndex); // Restore form values
		if ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_EDIT) // Edit row
			$tbl_uporgchart_unit_grid->EditRowCnt++;
		if ($tbl_uporgchart_unit->CurrentAction == "F") // Confirm row
			$tbl_uporgchart_unit_grid->RestoreCurrentRowFormValues($tbl_uporgchart_unit_grid->RowIndex); // Restore form values
		if ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_ADD || $tbl_uporgchart_unit->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($tbl_uporgchart_unit->CurrentAction == "edit") {
				$tbl_uporgchart_unit->RowAttrs = array();
				$tbl_uporgchart_unit->CssClass = "upTableEditRow";
			} else {
				$tbl_uporgchart_unit->RowAttrs = array();
			}
			if (!empty($tbl_uporgchart_unit_grid->RowIndex))
				$tbl_uporgchart_unit->RowAttrs = array_merge($tbl_uporgchart_unit->RowAttrs, array('data-rowindex'=>$tbl_uporgchart_unit_grid->RowIndex, 'id'=>'r' . $tbl_uporgchart_unit_grid->RowIndex . '_tbl_uporgchart_unit'));
		} else {
			$tbl_uporgchart_unit->RowAttrs = array();
		}

		// Render row
		$tbl_uporgchart_unit_grid->RenderRow();

		// Render list options
		$tbl_uporgchart_unit_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($tbl_uporgchart_unit_grid->RowAction <> "delete" && $tbl_uporgchart_unit_grid->RowAction <> "insertdelete" && !($tbl_uporgchart_unit_grid->RowAction == "insert" && $tbl_uporgchart_unit->CurrentAction == "F" && $tbl_uporgchart_unit_grid->EmptyRow())) {
?>
	<tr<?php echo $tbl_uporgchart_unit->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_uporgchart_unit_grid->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_uporgchart_unit->nameOfUnit->Visible) { // nameOfUnit ?>
		<td<?php echo $tbl_uporgchart_unit->nameOfUnit->CellAttributes() ?>>
<?php if ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" id="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_unit->nameOfUnit->EditValue ?>"<?php echo $tbl_uporgchart_unit->nameOfUnit->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" id="o<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" value="<?php echo up_HtmlEncode($tbl_uporgchart_unit->nameOfUnit->OldValue) ?>">
<?php } ?>
<?php if ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" id="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_unit->nameOfUnit->EditValue ?>"<?php echo $tbl_uporgchart_unit->nameOfUnit->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_uporgchart_unit->nameOfUnit->ViewAttributes() ?>><?php echo $tbl_uporgchart_unit->nameOfUnit->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" id="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" value="<?php echo up_HtmlEncode($tbl_uporgchart_unit->nameOfUnit->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" id="o<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" value="<?php echo up_HtmlEncode($tbl_uporgchart_unit->nameOfUnit->OldValue) ?>">
<?php } ?>
<a name="<?php echo $tbl_uporgchart_unit_grid->PageObjName . "_row_" . $tbl_uporgchart_unit_grid->RowCnt ?>" id="<?php echo $tbl_uporgchart_unit_grid->PageObjName . "_row_" . $tbl_uporgchart_unit_grid->RowCnt ?>"></a>
<?php if ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_unitID" id="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_unitID" size="30" value="<?php echo $tbl_uporgchart_unit->unitID->EditValue ?>"<?php echo $tbl_uporgchart_unit->unitID->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_unitID" id="o<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_unitID" value="<?php echo up_HtmlEncode($tbl_uporgchart_unit->unitID->OldValue) ?>">
<?php } ?>
<?php if ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_unitID" id="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_unitID" value="<?php echo up_HtmlEncode($tbl_uporgchart_unit->unitID->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_uporgchart_unit_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($tbl_uporgchart_unit->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($tbl_uporgchart_unit->CurrentAction <> "gridadd" || $tbl_uporgchart_unit->CurrentMode == "copy")
		if (!$tbl_uporgchart_unit_grid->Recordset->EOF) $tbl_uporgchart_unit_grid->Recordset->MoveNext();
}
?>
<?php
	if ($tbl_uporgchart_unit->CurrentMode == "add" || $tbl_uporgchart_unit->CurrentMode == "copy" || $tbl_uporgchart_unit->CurrentMode == "edit") {
		$tbl_uporgchart_unit_grid->RowIndex = '$rowindex$';
		$tbl_uporgchart_unit_grid->LoadDefaultValues();

		// Set row properties
		$tbl_uporgchart_unit->ResetAttrs();
		$tbl_uporgchart_unit->RowAttrs = array();
		if (!empty($tbl_uporgchart_unit_grid->RowIndex))
			$tbl_uporgchart_unit->RowAttrs = array_merge($tbl_uporgchart_unit->RowAttrs, array('data-rowindex'=>$tbl_uporgchart_unit_grid->RowIndex, 'id'=>'r' . $tbl_uporgchart_unit_grid->RowIndex . '_tbl_uporgchart_unit'));
		$tbl_uporgchart_unit->RowType = UP_ROWTYPE_ADD;

		// Render row
		$tbl_uporgchart_unit_grid->RenderRow();

		// Render list options
		$tbl_uporgchart_unit_grid->RenderListOptions();

		// Add id and class to the template row
		$tbl_uporgchart_unit->RowAttrs["id"] = "r0_tbl_uporgchart_unit";
		up_AppendClass($tbl_uporgchart_unit->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $tbl_uporgchart_unit->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_uporgchart_unit_grid->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_uporgchart_unit->nameOfUnit->Visible) { // nameOfUnit ?>
		<td>
<?php if ($tbl_uporgchart_unit->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" id="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" size="30" maxlength="255" value="<?php echo $tbl_uporgchart_unit->nameOfUnit->EditValue ?>"<?php echo $tbl_uporgchart_unit->nameOfUnit->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_uporgchart_unit->nameOfUnit->ViewAttributes() ?>><?php echo $tbl_uporgchart_unit->nameOfUnit->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" id="x<?php echo $tbl_uporgchart_unit_grid->RowIndex ?>_nameOfUnit" value="<?php echo up_HtmlEncode($tbl_uporgchart_unit->nameOfUnit->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_uporgchart_unit_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($tbl_uporgchart_unit->CurrentMode == "add" || $tbl_uporgchart_unit->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $tbl_uporgchart_unit_grid->KeyCount ?>">
<?php echo $tbl_uporgchart_unit_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($tbl_uporgchart_unit->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $tbl_uporgchart_unit_grid->KeyCount ?>">
<?php echo $tbl_uporgchart_unit_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="tbl_uporgchart_unit_grid">
</div>
<?php

// Close recordset
if ($tbl_uporgchart_unit_grid->Recordset)
	$tbl_uporgchart_unit_grid->Recordset->Close();
?>
<?php if (($tbl_uporgchart_unit->CurrentMode == "add" || $tbl_uporgchart_unit->CurrentMode == "copy" || $tbl_uporgchart_unit->CurrentMode == "edit") && $tbl_uporgchart_unit->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridLowerPanel">
<?php if ($tbl_uporgchart_unit->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><img src='phpimages/addblankrow.gif' alt='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' title='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' width='16' height='16' border='0'></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
</td></tr></table>
<?php if ($tbl_uporgchart_unit->Export == "" && $tbl_uporgchart_unit->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_uporgchart_unit_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$tbl_uporgchart_unit_grid->Page_Terminate();
$Page =& $MasterPage;
?>
