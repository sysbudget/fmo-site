<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$tbl_degrees_grid = new ctbl_degrees_grid();
$MasterPage =& $Page;
$Page =& $tbl_degrees_grid;

// Page init
$tbl_degrees_grid->Page_Init();

// Page main
$tbl_degrees_grid->Page_Main();
?>
<?php if ($tbl_degrees->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_degrees_grid = new up_Page("tbl_degrees_grid");

// page properties
tbl_degrees_grid.PageID = "grid"; // page ID
tbl_degrees_grid.FormID = "ftbl_degreesgrid"; // form ID
var UP_PAGE_ID = tbl_degrees_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_degrees_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_degrees_level"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_degrees->degrees_level->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_degrees_fieldOfStudy"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_degrees->degrees_fieldOfStudy->FldCaption()) ?>");

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
tbl_degrees_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "degrees_level", false)) return false;
	if (up_ValueChanged(fobj, infix, "degrees_disciplineCode", false)) return false;
	if (up_ValueChanged(fobj, infix, "degrees_fieldOfStudy", false)) return false;
	if (up_ValueChanged(fobj, infix, "degrees_wroteThesisDissertation", false)) return false;
	if (up_ValueChanged(fobj, infix, "degrees_primaryDegree", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
tbl_degrees_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_degrees_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_degrees_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_degrees_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($tbl_degrees->CurrentAction == "gridadd") {
	if ($tbl_degrees->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$tbl_degrees_grid->TotalRecs = $tbl_degrees->SelectRecordCount();
			$tbl_degrees_grid->Recordset = $tbl_degrees_grid->LoadRecordset($tbl_degrees_grid->StartRec-1, $tbl_degrees_grid->DisplayRecs);
		} else {
			if ($tbl_degrees_grid->Recordset = $tbl_degrees_grid->LoadRecordset())
				$tbl_degrees_grid->TotalRecs = $tbl_degrees_grid->Recordset->RecordCount();
		}
		$tbl_degrees_grid->StartRec = 1;
		$tbl_degrees_grid->DisplayRecs = $tbl_degrees_grid->TotalRecs;
	} else {
		$tbl_degrees->CurrentFilter = "0=1";
		$tbl_degrees_grid->StartRec = 1;
		$tbl_degrees_grid->DisplayRecs = $tbl_degrees->GridAddRowCount;
	}
	$tbl_degrees_grid->TotalRecs = $tbl_degrees_grid->DisplayRecs;
	$tbl_degrees_grid->StopRec = $tbl_degrees_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_degrees_grid->TotalRecs = $tbl_degrees->SelectRecordCount();
	} else {
		if ($tbl_degrees_grid->Recordset = $tbl_degrees_grid->LoadRecordset())
			$tbl_degrees_grid->TotalRecs = $tbl_degrees_grid->Recordset->RecordCount();
	}
	$tbl_degrees_grid->StartRec = 1;
	$tbl_degrees_grid->DisplayRecs = $tbl_degrees_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$tbl_degrees_grid->Recordset = $tbl_degrees_grid->LoadRecordset($tbl_degrees_grid->StartRec-1, $tbl_degrees_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($tbl_degrees->CurrentMode == "add" || $tbl_degrees->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($tbl_degrees->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_degrees->TableCaption() ?></p>
</p>
<?php $tbl_degrees_grid->ShowPageHeader(); ?>
<?php
$tbl_degrees_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($tbl_degrees->CurrentMode == "add" || $tbl_degrees->CurrentMode == "copy" || $tbl_degrees->CurrentMode == "edit") && $tbl_degrees->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
<?php if ($tbl_degrees->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><img src='phpimages/addblankrow.gif' alt='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' title='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' width='16' height='16' border='0'></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
<div id="gmp_tbl_degrees" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_degrees->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_degrees_grid->RenderListOptions();

// Render list options (header, left)
$tbl_degrees_grid->ListOptions->Render("header", "left");
?>
<?php if ($tbl_degrees->degrees_level->Visible) { // degrees_level ?>
	<?php if ($tbl_degrees->SortUrl($tbl_degrees->degrees_level) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_level->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_degrees->degrees_level->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_degrees->degrees_level->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_degrees->degrees_level->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_degrees->degrees_disciplineCode->Visible) { // degrees_disciplineCode ?>
	<?php if ($tbl_degrees->SortUrl($tbl_degrees->degrees_disciplineCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_disciplineCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_degrees->degrees_disciplineCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_degrees->degrees_disciplineCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_degrees->degrees_disciplineCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_degrees->degrees_fieldOfStudy->Visible) { // degrees_fieldOfStudy ?>
	<?php if ($tbl_degrees->SortUrl($tbl_degrees->degrees_fieldOfStudy) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_fieldOfStudy->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_degrees->degrees_fieldOfStudy->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_degrees->degrees_fieldOfStudy->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_degrees->degrees_fieldOfStudy->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_degrees->degrees_wroteThesisDissertation->Visible) { // degrees_wroteThesisDissertation ?>
	<?php if ($tbl_degrees->SortUrl($tbl_degrees->degrees_wroteThesisDissertation) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_wroteThesisDissertation->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_degrees->degrees_wroteThesisDissertation->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_degrees->degrees_wroteThesisDissertation->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_degrees->degrees_wroteThesisDissertation->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_degrees->degrees_primaryDegree->Visible) { // degrees_primaryDegree ?>
	<?php if ($tbl_degrees->SortUrl($tbl_degrees->degrees_primaryDegree) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_primaryDegree->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_degrees->degrees_primaryDegree->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_degrees->degrees_primaryDegree->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_degrees->degrees_primaryDegree->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_degrees_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$tbl_degrees_grid->StartRec = 1;
$tbl_degrees_grid->StopRec = $tbl_degrees_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($tbl_degrees->CurrentAction == "gridadd" || $tbl_degrees->CurrentAction == "gridedit" || $tbl_degrees->CurrentAction == "F")) {
		$tbl_degrees_grid->KeyCount = $objForm->GetValue("key_count");
		$tbl_degrees_grid->StopRec = $tbl_degrees_grid->KeyCount;
	}
}
$tbl_degrees_grid->RecCnt = $tbl_degrees_grid->StartRec - 1;
if ($tbl_degrees_grid->Recordset && !$tbl_degrees_grid->Recordset->EOF) {
	$tbl_degrees_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_degrees_grid->StartRec > 1)
		$tbl_degrees_grid->Recordset->Move($tbl_degrees_grid->StartRec - 1);
} elseif (!$tbl_degrees->AllowAddDeleteRow && $tbl_degrees_grid->StopRec == 0) {
	$tbl_degrees_grid->StopRec = $tbl_degrees->GridAddRowCount;
}

// Initialize aggregate
$tbl_degrees->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_degrees->ResetAttrs();
$tbl_degrees_grid->RenderRow();
$tbl_degrees_grid->RowCnt = 0;
if ($tbl_degrees->CurrentAction == "gridadd")
	$tbl_degrees_grid->RowIndex = 0;
if ($tbl_degrees->CurrentAction == "gridedit")
	$tbl_degrees_grid->RowIndex = 0;
while ($tbl_degrees_grid->RecCnt < $tbl_degrees_grid->StopRec) {
	$tbl_degrees_grid->RecCnt++;
	if (intval($tbl_degrees_grid->RecCnt) >= intval($tbl_degrees_grid->StartRec)) {
		$tbl_degrees_grid->RowCnt++;
		if ($tbl_degrees->CurrentAction == "gridadd" || $tbl_degrees->CurrentAction == "gridedit" || $tbl_degrees->CurrentAction == "F")
			$tbl_degrees_grid->RowIndex++;

		// Set up key count
		$tbl_degrees_grid->KeyCount = $tbl_degrees_grid->RowIndex;

		// Init row class and style
		$tbl_degrees->ResetAttrs();
		$tbl_degrees->CssClass = "";
		if ($tbl_degrees->CurrentAction == "gridadd") {
			if ($tbl_degrees->CurrentMode == "copy") {
				$tbl_degrees_grid->LoadRowValues($tbl_degrees_grid->Recordset); // Load row values
				$tbl_degrees_grid->SetRecordKey($tbl_degrees_grid->RowOldKey, $tbl_degrees_grid->Recordset); // Set old record key
			} else {
				$tbl_degrees_grid->LoadDefaultValues(); // Load default values
				$tbl_degrees_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($tbl_degrees->CurrentAction == "gridedit") {
			$tbl_degrees_grid->LoadRowValues($tbl_degrees_grid->Recordset); // Load row values
		}
		$tbl_degrees->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($tbl_degrees->CurrentAction == "gridadd") // Grid add
			$tbl_degrees->RowType = UP_ROWTYPE_ADD; // Render add
		if ($tbl_degrees->CurrentAction == "gridadd" && $tbl_degrees->EventCancelled) // Insert failed
			$tbl_degrees_grid->RestoreCurrentRowFormValues($tbl_degrees_grid->RowIndex); // Restore form values
		if ($tbl_degrees->CurrentAction == "gridedit") { // Grid edit
			if ($tbl_degrees->EventCancelled) {
				$tbl_degrees_grid->RestoreCurrentRowFormValues($tbl_degrees_grid->RowIndex); // Restore form values
			}
			if ($tbl_degrees_grid->RowAction == "insert")
				$tbl_degrees->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$tbl_degrees->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($tbl_degrees->CurrentAction == "gridedit" && ($tbl_degrees->RowType == UP_ROWTYPE_EDIT || $tbl_degrees->RowType == UP_ROWTYPE_ADD) && $tbl_degrees->EventCancelled) // Update failed
			$tbl_degrees_grid->RestoreCurrentRowFormValues($tbl_degrees_grid->RowIndex); // Restore form values
		if ($tbl_degrees->RowType == UP_ROWTYPE_EDIT) // Edit row
			$tbl_degrees_grid->EditRowCnt++;
		if ($tbl_degrees->CurrentAction == "F") // Confirm row
			$tbl_degrees_grid->RestoreCurrentRowFormValues($tbl_degrees_grid->RowIndex); // Restore form values
		if ($tbl_degrees->RowType == UP_ROWTYPE_ADD || $tbl_degrees->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($tbl_degrees->CurrentAction == "edit") {
				$tbl_degrees->RowAttrs = array();
				$tbl_degrees->CssClass = "upTableEditRow";
			} else {
				$tbl_degrees->RowAttrs = array();
			}
			if (!empty($tbl_degrees_grid->RowIndex))
				$tbl_degrees->RowAttrs = array_merge($tbl_degrees->RowAttrs, array('data-rowindex'=>$tbl_degrees_grid->RowIndex, 'id'=>'r' . $tbl_degrees_grid->RowIndex . '_tbl_degrees'));
		} else {
			$tbl_degrees->RowAttrs = array();
		}

		// Render row
		$tbl_degrees_grid->RenderRow();

		// Render list options
		$tbl_degrees_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($tbl_degrees_grid->RowAction <> "delete" && $tbl_degrees_grid->RowAction <> "insertdelete" && !($tbl_degrees_grid->RowAction == "insert" && $tbl_degrees->CurrentAction == "F" && $tbl_degrees_grid->EmptyRow())) {
?>
	<tr<?php echo $tbl_degrees->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_degrees_grid->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_degrees->degrees_level->Visible) { // degrees_level ?>
		<td<?php echo $tbl_degrees->degrees_level->CellAttributes() ?>>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<select id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level"<?php echo $tbl_degrees->degrees_level->EditAttributes() ?>>
<?php
if (is_array($tbl_degrees->degrees_level->EditValue)) {
	$arwrk = $tbl_degrees->degrees_level->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_level->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_degrees->degrees_level->OldValue = "";
?>
</select>
<input type="hidden" name="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level" id="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_level->OldValue) ?>">
<?php } ?>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<select id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level"<?php echo $tbl_degrees->degrees_level->EditAttributes() ?>>
<?php
if (is_array($tbl_degrees->degrees_level->EditValue)) {
	$arwrk = $tbl_degrees->degrees_level->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_level->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_degrees->degrees_level->OldValue = "";
?>
</select>
<?php } ?>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_degrees->degrees_level->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_level->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_level->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level" id="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_level->OldValue) ?>">
<?php } ?>
<a name="<?php echo $tbl_degrees_grid->PageObjName . "_row_" . $tbl_degrees_grid->RowCnt ?>" id="<?php echo $tbl_degrees_grid->PageObjName . "_row_" . $tbl_degrees_grid->RowCnt ?>"></a>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" name="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_ID" id="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_ID" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_ID->OldValue) ?>">
<?php } ?>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_ID" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_ID" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_ID->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_degrees->degrees_disciplineCode->Visible) { // degrees_disciplineCode ?>
		<td<?php echo $tbl_degrees->degrees_disciplineCode->CellAttributes() ?>>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<select id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode"<?php echo $tbl_degrees->degrees_disciplineCode->EditAttributes() ?>>
<?php
if (is_array($tbl_degrees->degrees_disciplineCode->EditValue)) {
	$arwrk = $tbl_degrees->degrees_disciplineCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_disciplineCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_degrees->degrees_disciplineCode->OldValue = "";
?>
</select>
<input type="hidden" name="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode" id="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_disciplineCode->OldValue) ?>">
<?php } ?>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<select id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode"<?php echo $tbl_degrees->degrees_disciplineCode->EditAttributes() ?>>
<?php
if (is_array($tbl_degrees->degrees_disciplineCode->EditValue)) {
	$arwrk = $tbl_degrees->degrees_disciplineCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_disciplineCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_degrees->degrees_disciplineCode->OldValue = "";
?>
</select>
<?php } ?>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_degrees->degrees_disciplineCode->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_disciplineCode->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_disciplineCode->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode" id="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_disciplineCode->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_degrees->degrees_fieldOfStudy->Visible) { // degrees_fieldOfStudy ?>
		<td<?php echo $tbl_degrees->degrees_fieldOfStudy->CellAttributes() ?>>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" size="30" maxlength="255" value="<?php echo $tbl_degrees->degrees_fieldOfStudy->EditValue ?>"<?php echo $tbl_degrees->degrees_fieldOfStudy->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" id="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_fieldOfStudy->OldValue) ?>">
<?php } ?>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" size="30" maxlength="255" value="<?php echo $tbl_degrees->degrees_fieldOfStudy->EditValue ?>"<?php echo $tbl_degrees->degrees_fieldOfStudy->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_degrees->degrees_fieldOfStudy->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_fieldOfStudy->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_fieldOfStudy->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" id="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_fieldOfStudy->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_degrees->degrees_wroteThesisDissertation->Visible) { // degrees_wroteThesisDissertation ?>
		<td<?php echo $tbl_degrees->degrees_wroteThesisDissertation->CellAttributes() ?>>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" value="{value}"<?php echo $tbl_degrees->degrees_wroteThesisDissertation->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_degrees->degrees_wroteThesisDissertation->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_degrees->degrees_wroteThesisDissertation->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $tbl_degrees->degrees_wroteThesisDissertation->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" id="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_wroteThesisDissertation->OldValue) ?>">
<?php } ?>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" value="{value}"<?php echo $tbl_degrees->degrees_wroteThesisDissertation->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_degrees->degrees_wroteThesisDissertation->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_degrees->degrees_wroteThesisDissertation->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $tbl_degrees->degrees_wroteThesisDissertation->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_degrees->degrees_wroteThesisDissertation->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_wroteThesisDissertation->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" id="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_wroteThesisDissertation->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_degrees->degrees_primaryDegree->Visible) { // degrees_primaryDegree ?>
		<td<?php echo $tbl_degrees->degrees_primaryDegree->CellAttributes() ?>>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" value="{value}"<?php echo $tbl_degrees->degrees_primaryDegree->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_degrees->degrees_primaryDegree->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_primaryDegree->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_degrees->degrees_primaryDegree->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $tbl_degrees->degrees_primaryDegree->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" id="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_primaryDegree->OldValue) ?>">
<?php } ?>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" value="{value}"<?php echo $tbl_degrees->degrees_primaryDegree->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_degrees->degrees_primaryDegree->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_primaryDegree->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_degrees->degrees_primaryDegree->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $tbl_degrees->degrees_primaryDegree->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_degrees->degrees_primaryDegree->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_primaryDegree->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_primaryDegree->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" id="o<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_primaryDegree->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_degrees_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($tbl_degrees->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($tbl_degrees->CurrentAction <> "gridadd" || $tbl_degrees->CurrentMode == "copy")
		if (!$tbl_degrees_grid->Recordset->EOF) $tbl_degrees_grid->Recordset->MoveNext();
}
?>
<?php
	if ($tbl_degrees->CurrentMode == "add" || $tbl_degrees->CurrentMode == "copy" || $tbl_degrees->CurrentMode == "edit") {
		$tbl_degrees_grid->RowIndex = '$rowindex$';
		$tbl_degrees_grid->LoadDefaultValues();

		// Set row properties
		$tbl_degrees->ResetAttrs();
		$tbl_degrees->RowAttrs = array();
		if (!empty($tbl_degrees_grid->RowIndex))
			$tbl_degrees->RowAttrs = array_merge($tbl_degrees->RowAttrs, array('data-rowindex'=>$tbl_degrees_grid->RowIndex, 'id'=>'r' . $tbl_degrees_grid->RowIndex . '_tbl_degrees'));
		$tbl_degrees->RowType = UP_ROWTYPE_ADD;

		// Render row
		$tbl_degrees_grid->RenderRow();

		// Render list options
		$tbl_degrees_grid->RenderListOptions();

		// Add id and class to the template row
		$tbl_degrees->RowAttrs["id"] = "r0_tbl_degrees";
		up_AppendClass($tbl_degrees->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $tbl_degrees->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_degrees_grid->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_degrees->degrees_level->Visible) { // degrees_level ?>
		<td>
<?php if ($tbl_degrees->CurrentAction <> "F") { ?>
<select id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level"<?php echo $tbl_degrees->degrees_level->EditAttributes() ?>>
<?php
if (is_array($tbl_degrees->degrees_level->EditValue)) {
	$arwrk = $tbl_degrees->degrees_level->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_level->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_degrees->degrees_level->OldValue = "";
?>
</select>
<?php } else { ?>
<div<?php echo $tbl_degrees->degrees_level->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_level->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_level" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_level->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_degrees->degrees_disciplineCode->Visible) { // degrees_disciplineCode ?>
		<td>
<?php if ($tbl_degrees->CurrentAction <> "F") { ?>
<select id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode"<?php echo $tbl_degrees->degrees_disciplineCode->EditAttributes() ?>>
<?php
if (is_array($tbl_degrees->degrees_disciplineCode->EditValue)) {
	$arwrk = $tbl_degrees->degrees_disciplineCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_disciplineCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_degrees->degrees_disciplineCode->OldValue = "";
?>
</select>
<?php } else { ?>
<div<?php echo $tbl_degrees->degrees_disciplineCode->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_disciplineCode->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_disciplineCode" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_disciplineCode->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_degrees->degrees_fieldOfStudy->Visible) { // degrees_fieldOfStudy ?>
		<td>
<?php if ($tbl_degrees->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" size="30" maxlength="255" value="<?php echo $tbl_degrees->degrees_fieldOfStudy->EditValue ?>"<?php echo $tbl_degrees->degrees_fieldOfStudy->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_degrees->degrees_fieldOfStudy->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_fieldOfStudy->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_fieldOfStudy" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_fieldOfStudy->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_degrees->degrees_wroteThesisDissertation->Visible) { // degrees_wroteThesisDissertation ?>
		<td>
<?php if ($tbl_degrees->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" value="{value}"<?php echo $tbl_degrees->degrees_wroteThesisDissertation->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_degrees->degrees_wroteThesisDissertation->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_degrees->degrees_wroteThesisDissertation->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $tbl_degrees->degrees_wroteThesisDissertation->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $tbl_degrees->degrees_wroteThesisDissertation->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_wroteThesisDissertation->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_wroteThesisDissertation" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_wroteThesisDissertation->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_degrees->degrees_primaryDegree->Visible) { // degrees_primaryDegree ?>
		<td>
<?php if ($tbl_degrees->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" value="{value}"<?php echo $tbl_degrees->degrees_primaryDegree->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_degrees->degrees_primaryDegree->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_degrees->degrees_primaryDegree->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_degrees->degrees_primaryDegree->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $tbl_degrees->degrees_primaryDegree->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $tbl_degrees->degrees_primaryDegree->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_primaryDegree->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" id="x<?php echo $tbl_degrees_grid->RowIndex ?>_degrees_primaryDegree" value="<?php echo up_HtmlEncode($tbl_degrees->degrees_primaryDegree->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_degrees_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($tbl_degrees->CurrentMode == "add" || $tbl_degrees->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $tbl_degrees_grid->KeyCount ?>">
<?php echo $tbl_degrees_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($tbl_degrees->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $tbl_degrees_grid->KeyCount ?>">
<?php echo $tbl_degrees_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="tbl_degrees_grid">
</div>
<?php

// Close recordset
if ($tbl_degrees_grid->Recordset)
	$tbl_degrees_grid->Recordset->Close();
?>
<?php if (($tbl_degrees->CurrentMode == "add" || $tbl_degrees->CurrentMode == "copy" || $tbl_degrees->CurrentMode == "edit") && $tbl_degrees->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridLowerPanel">
<?php if ($tbl_degrees->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><img src='phpimages/addblankrow.gif' alt='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' title='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' width='16' height='16' border='0'></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
</td></tr></table>
<?php if ($tbl_degrees->Export == "" && $tbl_degrees->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_degrees_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$tbl_degrees_grid->Page_Terminate();
$Page =& $MasterPage;
?>
