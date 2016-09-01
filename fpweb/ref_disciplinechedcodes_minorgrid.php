<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$ref_disciplinechedcodes_minor_grid = new cref_disciplinechedcodes_minor_grid();
$MasterPage =& $Page;
$Page =& $ref_disciplinechedcodes_minor_grid;

// Page init
$ref_disciplinechedcodes_minor_grid->Page_Init();

// Page main
$ref_disciplinechedcodes_minor_grid->Page_Main();
?>
<?php if ($ref_disciplinechedcodes_minor->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var ref_disciplinechedcodes_minor_grid = new up_Page("ref_disciplinechedcodes_minor_grid");

// page properties
ref_disciplinechedcodes_minor_grid.PageID = "grid"; // page ID
ref_disciplinechedcodes_minor_grid.FormID = "fref_disciplinechedcodes_minorgrid"; // form ID
var UP_PAGE_ID = ref_disciplinechedcodes_minor_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
ref_disciplinechedcodes_minor_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_disCHED_disciplineSpecific_id"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_disCHED_disciplineSpecific_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_disCHED_disciplineSpecific_code"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_disCHED_disciplineSpecific_academicUse"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_disCHED_disciplineSpecific_academicUse"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldErrMsg()) ?>");

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
ref_disciplinechedcodes_minor_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "disCHED_disciplineSpecific_id", false)) return false;
	if (up_ValueChanged(fobj, infix, "disCHED_disciplineSpecific_code", false)) return false;
	if (up_ValueChanged(fobj, infix, "disCHED_disciplineSpecific_name", false)) return false;
	if (up_ValueChanged(fobj, infix, "disCHED_discipline_code", false)) return false;
	if (up_ValueChanged(fobj, infix, "disCHED_disciplineSpecific_academicUse", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
ref_disciplinechedcodes_minor_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_disciplinechedcodes_minor_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_disciplinechedcodes_minor_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_disciplinechedcodes_minor_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($ref_disciplinechedcodes_minor->CurrentAction == "gridadd") {
	if ($ref_disciplinechedcodes_minor->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$ref_disciplinechedcodes_minor_grid->TotalRecs = $ref_disciplinechedcodes_minor->SelectRecordCount();
			$ref_disciplinechedcodes_minor_grid->Recordset = $ref_disciplinechedcodes_minor_grid->LoadRecordset($ref_disciplinechedcodes_minor_grid->StartRec-1, $ref_disciplinechedcodes_minor_grid->DisplayRecs);
		} else {
			if ($ref_disciplinechedcodes_minor_grid->Recordset = $ref_disciplinechedcodes_minor_grid->LoadRecordset())
				$ref_disciplinechedcodes_minor_grid->TotalRecs = $ref_disciplinechedcodes_minor_grid->Recordset->RecordCount();
		}
		$ref_disciplinechedcodes_minor_grid->StartRec = 1;
		$ref_disciplinechedcodes_minor_grid->DisplayRecs = $ref_disciplinechedcodes_minor_grid->TotalRecs;
	} else {
		$ref_disciplinechedcodes_minor->CurrentFilter = "0=1";
		$ref_disciplinechedcodes_minor_grid->StartRec = 1;
		$ref_disciplinechedcodes_minor_grid->DisplayRecs = $ref_disciplinechedcodes_minor->GridAddRowCount;
	}
	$ref_disciplinechedcodes_minor_grid->TotalRecs = $ref_disciplinechedcodes_minor_grid->DisplayRecs;
	$ref_disciplinechedcodes_minor_grid->StopRec = $ref_disciplinechedcodes_minor_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$ref_disciplinechedcodes_minor_grid->TotalRecs = $ref_disciplinechedcodes_minor->SelectRecordCount();
	} else {
		if ($ref_disciplinechedcodes_minor_grid->Recordset = $ref_disciplinechedcodes_minor_grid->LoadRecordset())
			$ref_disciplinechedcodes_minor_grid->TotalRecs = $ref_disciplinechedcodes_minor_grid->Recordset->RecordCount();
	}
	$ref_disciplinechedcodes_minor_grid->StartRec = 1;
	$ref_disciplinechedcodes_minor_grid->DisplayRecs = $ref_disciplinechedcodes_minor_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$ref_disciplinechedcodes_minor_grid->Recordset = $ref_disciplinechedcodes_minor_grid->LoadRecordset($ref_disciplinechedcodes_minor_grid->StartRec-1, $ref_disciplinechedcodes_minor_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($ref_disciplinechedcodes_minor->CurrentMode == "add" || $ref_disciplinechedcodes_minor->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($ref_disciplinechedcodes_minor->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_disciplinechedcodes_minor->TableCaption() ?></p>
</p>
<?php $ref_disciplinechedcodes_minor_grid->ShowPageHeader(); ?>
<?php
$ref_disciplinechedcodes_minor_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($ref_disciplinechedcodes_minor->CurrentMode == "add" || $ref_disciplinechedcodes_minor->CurrentMode == "copy" || $ref_disciplinechedcodes_minor->CurrentMode == "edit") && $ref_disciplinechedcodes_minor->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
<?php if ($ref_disciplinechedcodes_minor->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><img src='phpimages/addblankrow.gif' alt='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' title='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' width='16' height='16' border='0'></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
<div id="gmp_ref_disciplinechedcodes_minor" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $ref_disciplinechedcodes_minor->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$ref_disciplinechedcodes_minor_grid->RenderListOptions();

// Render list options (header, left)
$ref_disciplinechedcodes_minor_grid->ListOptions->Render("header", "left");
?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->Visible) { // disCHED_disciplineSpecific_id ?>
	<?php if ($ref_disciplinechedcodes_minor->SortUrl($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id) == "") { ?>
		<td><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FldCaption() ?></td><td style="width: 10px;"><?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->Visible) { // disCHED_disciplineSpecific_code ?>
	<?php if ($ref_disciplinechedcodes_minor->SortUrl($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code) == "") { ?>
		<td><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FldCaption() ?></td><td style="width: 10px;"><?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->Visible) { // disCHED_disciplineSpecific_name ?>
	<?php if ($ref_disciplinechedcodes_minor->SortUrl($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name) == "") { ?>
		<td><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->FldCaption() ?></td><td style="width: 10px;"><?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->Visible) { // disCHED_discipline_code ?>
	<?php if ($ref_disciplinechedcodes_minor->SortUrl($ref_disciplinechedcodes_minor->disCHED_discipline_code) == "") { ?>
		<td><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->FldCaption() ?></td><td style="width: 10px;"><?php if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_disciplinechedcodes_minor->disCHED_discipline_code->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->Visible) { // disCHED_disciplineSpecific_academicUse ?>
	<?php if ($ref_disciplinechedcodes_minor->SortUrl($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse) == "") { ?>
		<td><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FldCaption() ?></td><td style="width: 10px;"><?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$ref_disciplinechedcodes_minor_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$ref_disciplinechedcodes_minor_grid->StartRec = 1;
$ref_disciplinechedcodes_minor_grid->StopRec = $ref_disciplinechedcodes_minor_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($ref_disciplinechedcodes_minor->CurrentAction == "gridadd" || $ref_disciplinechedcodes_minor->CurrentAction == "gridedit" || $ref_disciplinechedcodes_minor->CurrentAction == "F")) {
		$ref_disciplinechedcodes_minor_grid->KeyCount = $objForm->GetValue("key_count");
		$ref_disciplinechedcodes_minor_grid->StopRec = $ref_disciplinechedcodes_minor_grid->KeyCount;
	}
}
$ref_disciplinechedcodes_minor_grid->RecCnt = $ref_disciplinechedcodes_minor_grid->StartRec - 1;
if ($ref_disciplinechedcodes_minor_grid->Recordset && !$ref_disciplinechedcodes_minor_grid->Recordset->EOF) {
	$ref_disciplinechedcodes_minor_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $ref_disciplinechedcodes_minor_grid->StartRec > 1)
		$ref_disciplinechedcodes_minor_grid->Recordset->Move($ref_disciplinechedcodes_minor_grid->StartRec - 1);
} elseif (!$ref_disciplinechedcodes_minor->AllowAddDeleteRow && $ref_disciplinechedcodes_minor_grid->StopRec == 0) {
	$ref_disciplinechedcodes_minor_grid->StopRec = $ref_disciplinechedcodes_minor->GridAddRowCount;
}

// Initialize aggregate
$ref_disciplinechedcodes_minor->RowType = UP_ROWTYPE_AGGREGATEINIT;
$ref_disciplinechedcodes_minor->ResetAttrs();
$ref_disciplinechedcodes_minor_grid->RenderRow();
$ref_disciplinechedcodes_minor_grid->RowCnt = 0;
if ($ref_disciplinechedcodes_minor->CurrentAction == "gridadd")
	$ref_disciplinechedcodes_minor_grid->RowIndex = 0;
if ($ref_disciplinechedcodes_minor->CurrentAction == "gridedit")
	$ref_disciplinechedcodes_minor_grid->RowIndex = 0;
while ($ref_disciplinechedcodes_minor_grid->RecCnt < $ref_disciplinechedcodes_minor_grid->StopRec) {
	$ref_disciplinechedcodes_minor_grid->RecCnt++;
	if (intval($ref_disciplinechedcodes_minor_grid->RecCnt) >= intval($ref_disciplinechedcodes_minor_grid->StartRec)) {
		$ref_disciplinechedcodes_minor_grid->RowCnt++;
		if ($ref_disciplinechedcodes_minor->CurrentAction == "gridadd" || $ref_disciplinechedcodes_minor->CurrentAction == "gridedit" || $ref_disciplinechedcodes_minor->CurrentAction == "F")
			$ref_disciplinechedcodes_minor_grid->RowIndex++;

		// Set up key count
		$ref_disciplinechedcodes_minor_grid->KeyCount = $ref_disciplinechedcodes_minor_grid->RowIndex;

		// Init row class and style
		$ref_disciplinechedcodes_minor->ResetAttrs();
		$ref_disciplinechedcodes_minor->CssClass = "";
		if ($ref_disciplinechedcodes_minor->CurrentAction == "gridadd") {
			if ($ref_disciplinechedcodes_minor->CurrentMode == "copy") {
				$ref_disciplinechedcodes_minor_grid->LoadRowValues($ref_disciplinechedcodes_minor_grid->Recordset); // Load row values
				$ref_disciplinechedcodes_minor_grid->SetRecordKey($ref_disciplinechedcodes_minor_grid->RowOldKey, $ref_disciplinechedcodes_minor_grid->Recordset); // Set old record key
			} else {
				$ref_disciplinechedcodes_minor_grid->LoadDefaultValues(); // Load default values
				$ref_disciplinechedcodes_minor_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($ref_disciplinechedcodes_minor->CurrentAction == "gridedit") {
			$ref_disciplinechedcodes_minor_grid->LoadRowValues($ref_disciplinechedcodes_minor_grid->Recordset); // Load row values
		}
		$ref_disciplinechedcodes_minor->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($ref_disciplinechedcodes_minor->CurrentAction == "gridadd") // Grid add
			$ref_disciplinechedcodes_minor->RowType = UP_ROWTYPE_ADD; // Render add
		if ($ref_disciplinechedcodes_minor->CurrentAction == "gridadd" && $ref_disciplinechedcodes_minor->EventCancelled) // Insert failed
			$ref_disciplinechedcodes_minor_grid->RestoreCurrentRowFormValues($ref_disciplinechedcodes_minor_grid->RowIndex); // Restore form values
		if ($ref_disciplinechedcodes_minor->CurrentAction == "gridedit") { // Grid edit
			if ($ref_disciplinechedcodes_minor->EventCancelled) {
				$ref_disciplinechedcodes_minor_grid->RestoreCurrentRowFormValues($ref_disciplinechedcodes_minor_grid->RowIndex); // Restore form values
			}
			if ($ref_disciplinechedcodes_minor_grid->RowAction == "insert")
				$ref_disciplinechedcodes_minor->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$ref_disciplinechedcodes_minor->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($ref_disciplinechedcodes_minor->CurrentAction == "gridedit" && ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT || $ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_ADD) && $ref_disciplinechedcodes_minor->EventCancelled) // Update failed
			$ref_disciplinechedcodes_minor_grid->RestoreCurrentRowFormValues($ref_disciplinechedcodes_minor_grid->RowIndex); // Restore form values
		if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT) // Edit row
			$ref_disciplinechedcodes_minor_grid->EditRowCnt++;
		if ($ref_disciplinechedcodes_minor->CurrentAction == "F") // Confirm row
			$ref_disciplinechedcodes_minor_grid->RestoreCurrentRowFormValues($ref_disciplinechedcodes_minor_grid->RowIndex); // Restore form values
		if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_ADD || $ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($ref_disciplinechedcodes_minor->CurrentAction == "edit") {
				$ref_disciplinechedcodes_minor->RowAttrs = array();
				$ref_disciplinechedcodes_minor->CssClass = "upTableEditRow";
			} else {
				$ref_disciplinechedcodes_minor->RowAttrs = array();
			}
			if (!empty($ref_disciplinechedcodes_minor_grid->RowIndex))
				$ref_disciplinechedcodes_minor->RowAttrs = array_merge($ref_disciplinechedcodes_minor->RowAttrs, array('data-rowindex'=>$ref_disciplinechedcodes_minor_grid->RowIndex, 'id'=>'r' . $ref_disciplinechedcodes_minor_grid->RowIndex . '_ref_disciplinechedcodes_minor'));
		} else {
			$ref_disciplinechedcodes_minor->RowAttrs = array();
		}

		// Render row
		$ref_disciplinechedcodes_minor_grid->RenderRow();

		// Render list options
		$ref_disciplinechedcodes_minor_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ref_disciplinechedcodes_minor_grid->RowAction <> "delete" && $ref_disciplinechedcodes_minor_grid->RowAction <> "insertdelete" && !($ref_disciplinechedcodes_minor_grid->RowAction == "insert" && $ref_disciplinechedcodes_minor->CurrentAction == "F" && $ref_disciplinechedcodes_minor_grid->EmptyRow())) {
?>
	<tr<?php echo $ref_disciplinechedcodes_minor->RowAttributes() ?>>
<?php

// Render list options (body, left)
$ref_disciplinechedcodes_minor_grid->ListOptions->Render("body", "left");
?>
	<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->Visible) { // disCHED_disciplineSpecific_id ?>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CellAttributes() ?>>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" size="30" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" id="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->OldValue) ?>">
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->EditValue ?></div>
<input type="hidden" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue) ?>">
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" id="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->OldValue) ?>">
<?php } ?>
<a name="<?php echo $ref_disciplinechedcodes_minor_grid->PageObjName . "_row_" . $ref_disciplinechedcodes_minor_grid->RowCnt ?>" id="<?php echo $ref_disciplinechedcodes_minor_grid->PageObjName . "_row_" . $ref_disciplinechedcodes_minor_grid->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->Visible) { // disCHED_disciplineSpecific_code ?>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CellAttributes() ?>>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" size="30" maxlength="255" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" id="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->OldValue) ?>">
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" size="30" maxlength="255" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditAttributes() ?>>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" id="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->Visible) { // disCHED_disciplineSpecific_name ?>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CellAttributes() ?>>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" size="30" maxlength="255" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" id="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->OldValue) ?>">
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" size="30" maxlength="255" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditAttributes() ?>>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" id="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->Visible) { // disCHED_discipline_code ?>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->CellAttributes() ?>>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->getSessionValue() <> "") { ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ListViewValue() ?></div>
<input type="hidden" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue) ?>">
<?php } else { ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" size="30" maxlength="255" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->EditAttributes() ?>>
<?php } ?>
<input type="hidden" name="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" id="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_discipline_code->OldValue) ?>">
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->getSessionValue() <> "") { ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ListViewValue() ?></div>
<input type="hidden" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue) ?>">
<?php } else { ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" size="30" maxlength="255" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->EditAttributes() ?>>
<?php } ?>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" id="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_discipline_code->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->Visible) { // disCHED_disciplineSpecific_academicUse ?>
		<td<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CellAttributes() ?>>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" size="30" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" id="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->OldValue) ?>">
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" size="30" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditAttributes() ?>>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" id="o<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ref_disciplinechedcodes_minor_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($ref_disciplinechedcodes_minor->CurrentAction <> "gridadd" || $ref_disciplinechedcodes_minor->CurrentMode == "copy")
		if (!$ref_disciplinechedcodes_minor_grid->Recordset->EOF) $ref_disciplinechedcodes_minor_grid->Recordset->MoveNext();
}
?>
<?php
	if ($ref_disciplinechedcodes_minor->CurrentMode == "add" || $ref_disciplinechedcodes_minor->CurrentMode == "copy" || $ref_disciplinechedcodes_minor->CurrentMode == "edit") {
		$ref_disciplinechedcodes_minor_grid->RowIndex = '$rowindex$';
		$ref_disciplinechedcodes_minor_grid->LoadDefaultValues();

		// Set row properties
		$ref_disciplinechedcodes_minor->ResetAttrs();
		$ref_disciplinechedcodes_minor->RowAttrs = array();
		if (!empty($ref_disciplinechedcodes_minor_grid->RowIndex))
			$ref_disciplinechedcodes_minor->RowAttrs = array_merge($ref_disciplinechedcodes_minor->RowAttrs, array('data-rowindex'=>$ref_disciplinechedcodes_minor_grid->RowIndex, 'id'=>'r' . $ref_disciplinechedcodes_minor_grid->RowIndex . '_ref_disciplinechedcodes_minor'));
		$ref_disciplinechedcodes_minor->RowType = UP_ROWTYPE_ADD;

		// Render row
		$ref_disciplinechedcodes_minor_grid->RenderRow();

		// Render list options
		$ref_disciplinechedcodes_minor_grid->RenderListOptions();

		// Add id and class to the template row
		$ref_disciplinechedcodes_minor->RowAttrs["id"] = "r0_ref_disciplinechedcodes_minor";
		up_AppendClass($ref_disciplinechedcodes_minor->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $ref_disciplinechedcodes_minor->RowAttributes() ?>>
<?php

// Render list options (body, left)
$ref_disciplinechedcodes_minor_grid->ListOptions->Render("body", "left");
?>
	<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->Visible) { // disCHED_disciplineSpecific_id ?>
		<td>
<?php if ($ref_disciplinechedcodes_minor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" size="30" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->ViewValue ?></div>
<input type="hidden" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_id" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_id->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->Visible) { // disCHED_disciplineSpecific_code ?>
		<td>
<?php if ($ref_disciplinechedcodes_minor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" size="30" maxlength="255" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->ViewValue ?></div>
<input type="hidden" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_code" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_code->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->Visible) { // disCHED_disciplineSpecific_name ?>
		<td>
<?php if ($ref_disciplinechedcodes_minor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" size="30" maxlength="255" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_name" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->Visible) { // disCHED_discipline_code ?>
		<td>
<?php if ($ref_disciplinechedcodes_minor->CurrentAction <> "F") { ?>
<?php if ($ref_disciplinechedcodes_minor->disCHED_discipline_code->getSessionValue() <> "") { ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ListViewValue() ?></div>
<input type="hidden" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_discipline_code->CurrentValue) ?>">
<?php } else { ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" size="30" maxlength="255" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->EditAttributes() ?>>
<?php } ?>
<?php } else { ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_discipline_code->ViewValue ?></div>
<input type="hidden" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_discipline_code" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_discipline_code->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->Visible) { // disCHED_disciplineSpecific_academicUse ?>
		<td>
<?php if ($ref_disciplinechedcodes_minor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" size="30" value="<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditValue ?>"<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->ViewValue ?></div>
<input type="hidden" name="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" id="x<?php echo $ref_disciplinechedcodes_minor_grid->RowIndex ?>_disCHED_disciplineSpecific_academicUse" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_minor->disCHED_disciplineSpecific_academicUse->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ref_disciplinechedcodes_minor_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($ref_disciplinechedcodes_minor->CurrentMode == "add" || $ref_disciplinechedcodes_minor->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $ref_disciplinechedcodes_minor_grid->KeyCount ?>">
<?php echo $ref_disciplinechedcodes_minor_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ref_disciplinechedcodes_minor->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $ref_disciplinechedcodes_minor_grid->KeyCount ?>">
<?php echo $ref_disciplinechedcodes_minor_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="ref_disciplinechedcodes_minor_grid">
</div>
<?php

// Close recordset
if ($ref_disciplinechedcodes_minor_grid->Recordset)
	$ref_disciplinechedcodes_minor_grid->Recordset->Close();
?>
<?php if (($ref_disciplinechedcodes_minor->CurrentMode == "add" || $ref_disciplinechedcodes_minor->CurrentMode == "copy" || $ref_disciplinechedcodes_minor->CurrentMode == "edit") && $ref_disciplinechedcodes_minor->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridLowerPanel">
<?php if ($ref_disciplinechedcodes_minor->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><img src='phpimages/addblankrow.gif' alt='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' title='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' width='16' height='16' border='0'></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
</td></tr></table>
<?php if ($ref_disciplinechedcodes_minor->Export == "" && $ref_disciplinechedcodes_minor->CurrentAction == "") { ?>
<?php } ?>
<?php
$ref_disciplinechedcodes_minor_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$ref_disciplinechedcodes_minor_grid->Page_Terminate();
$Page =& $MasterPage;
?>
