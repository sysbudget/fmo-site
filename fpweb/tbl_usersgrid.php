<?php

// Create page object
$tbl_users_grid = new ctbl_users_grid();
$MasterPage =& $Page;
$Page =& $tbl_users_grid;

// Page init
$tbl_users_grid->Page_Init();

// Page main
$tbl_users_grid->Page_Main();
?>
<?php if ($tbl_users->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_users_grid = new up_Page("tbl_users_grid");

// page properties
tbl_users_grid.PageID = "grid"; // page ID
tbl_users_grid.FormID = "ftbl_usersgrid"; // form ID
var UP_PAGE_ID = tbl_users_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_users_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_users_userLoginName"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_users->users_userLoginName->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_password"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_users->users_password->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_userLevel"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_users->users_userLevel->FldCaption()) ?>");

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
tbl_users_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "unitID", false)) return false;
	if (up_ValueChanged(fobj, infix, "users_name", false)) return false;
	if (up_ValueChanged(fobj, infix, "users_userLoginName", false)) return false;
	if (up_ValueChanged(fobj, infix, "users_password", false)) return false;
	if (up_ValueChanged(fobj, infix, "users_userLevel", false)) return false;
	if (up_ValueChanged(fobj, infix, "users_email", false)) return false;
	if (up_ValueChanged(fobj, infix, "users_contactNo", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
tbl_users_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_users_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_users_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_users_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($tbl_users->CurrentAction == "gridadd") {
	if ($tbl_users->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$tbl_users_grid->TotalRecs = $tbl_users->SelectRecordCount();
			$tbl_users_grid->Recordset = $tbl_users_grid->LoadRecordset($tbl_users_grid->StartRec-1, $tbl_users_grid->DisplayRecs);
		} else {
			if ($tbl_users_grid->Recordset = $tbl_users_grid->LoadRecordset())
				$tbl_users_grid->TotalRecs = $tbl_users_grid->Recordset->RecordCount();
		}
		$tbl_users_grid->StartRec = 1;
		$tbl_users_grid->DisplayRecs = $tbl_users_grid->TotalRecs;
	} else {
		$tbl_users->CurrentFilter = "0=1";
		$tbl_users_grid->StartRec = 1;
		$tbl_users_grid->DisplayRecs = $tbl_users->GridAddRowCount;
	}
	$tbl_users_grid->TotalRecs = $tbl_users_grid->DisplayRecs;
	$tbl_users_grid->StopRec = $tbl_users_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_users_grid->TotalRecs = $tbl_users->SelectRecordCount();
	} else {
		if ($tbl_users_grid->Recordset = $tbl_users_grid->LoadRecordset())
			$tbl_users_grid->TotalRecs = $tbl_users_grid->Recordset->RecordCount();
	}
	$tbl_users_grid->StartRec = 1;
	$tbl_users_grid->DisplayRecs = $tbl_users_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$tbl_users_grid->Recordset = $tbl_users_grid->LoadRecordset($tbl_users_grid->StartRec-1, $tbl_users_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($tbl_users->CurrentMode == "add" || $tbl_users->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($tbl_users->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_users->TableCaption() ?></p>
</p>
<?php $tbl_users_grid->ShowPageHeader(); ?>
<?php
$tbl_users_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($tbl_users->CurrentMode == "add" || $tbl_users->CurrentMode == "copy" || $tbl_users->CurrentMode == "edit") && $tbl_users->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
<?php if ($tbl_users->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><img src='phpimages/addblankrow.gif' alt='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' title='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' width='16' height='16' border='0'></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
<div id="gmp_tbl_users" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_users->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_users_grid->RenderListOptions();

// Render list options (header, left)
$tbl_users_grid->ListOptions->Render("header", "left");
?>
<?php if ($tbl_users->users_ID->Visible) { // users_ID ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_ID) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_users->users_ID->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_ID->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->unitID->Visible) { // unitID ?>
	<?php if ($tbl_users->SortUrl($tbl_users->unitID) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->unitID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->unitID->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_users->unitID->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->unitID->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->users_name->Visible) { // users_name ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_name->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_users->users_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->users_userLoginName->Visible) { // users_userLoginName ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_userLoginName) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_userLoginName->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_userLoginName->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_users->users_userLoginName->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_userLoginName->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->users_password->Visible) { // users_password ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_password) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_password->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_password->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_users->users_password->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_password->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->users_userLevel->Visible) { // users_userLevel ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_userLevel) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_userLevel->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_userLevel->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_users->users_userLevel->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_userLevel->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->users_email->Visible) { // users_email ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_email) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_email->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_email->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_users->users_email->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_email->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->users_contactNo->Visible) { // users_contactNo ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_contactNo) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_contactNo->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_contactNo->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_users->users_contactNo->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_contactNo->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_users_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$tbl_users_grid->StartRec = 1;
$tbl_users_grid->StopRec = $tbl_users_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($tbl_users->CurrentAction == "gridadd" || $tbl_users->CurrentAction == "gridedit" || $tbl_users->CurrentAction == "F")) {
		$tbl_users_grid->KeyCount = $objForm->GetValue("key_count");
		$tbl_users_grid->StopRec = $tbl_users_grid->KeyCount;
	}
}
$tbl_users_grid->RecCnt = $tbl_users_grid->StartRec - 1;
if ($tbl_users_grid->Recordset && !$tbl_users_grid->Recordset->EOF) {
	$tbl_users_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_users_grid->StartRec > 1)
		$tbl_users_grid->Recordset->Move($tbl_users_grid->StartRec - 1);
} elseif (!$tbl_users->AllowAddDeleteRow && $tbl_users_grid->StopRec == 0) {
	$tbl_users_grid->StopRec = $tbl_users->GridAddRowCount;
}

// Initialize aggregate
$tbl_users->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_users->ResetAttrs();
$tbl_users_grid->RenderRow();
$tbl_users_grid->RowCnt = 0;
if ($tbl_users->CurrentAction == "gridadd")
	$tbl_users_grid->RowIndex = 0;
if ($tbl_users->CurrentAction == "gridedit")
	$tbl_users_grid->RowIndex = 0;
while ($tbl_users_grid->RecCnt < $tbl_users_grid->StopRec) {
	$tbl_users_grid->RecCnt++;
	if (intval($tbl_users_grid->RecCnt) >= intval($tbl_users_grid->StartRec)) {
		$tbl_users_grid->RowCnt++;
		if ($tbl_users->CurrentAction == "gridadd" || $tbl_users->CurrentAction == "gridedit" || $tbl_users->CurrentAction == "F")
			$tbl_users_grid->RowIndex++;

		// Set up key count
		$tbl_users_grid->KeyCount = $tbl_users_grid->RowIndex;

		// Init row class and style
		$tbl_users->ResetAttrs();
		$tbl_users->CssClass = "";
		if ($tbl_users->CurrentAction == "gridadd") {
			if ($tbl_users->CurrentMode == "copy") {
				$tbl_users_grid->LoadRowValues($tbl_users_grid->Recordset); // Load row values
				$tbl_users_grid->SetRecordKey($tbl_users_grid->RowOldKey, $tbl_users_grid->Recordset); // Set old record key
			} else {
				$tbl_users_grid->LoadDefaultValues(); // Load default values
				$tbl_users_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($tbl_users->CurrentAction == "gridedit") {
			$tbl_users_grid->LoadRowValues($tbl_users_grid->Recordset); // Load row values
		}
		$tbl_users->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($tbl_users->CurrentAction == "gridadd") // Grid add
			$tbl_users->RowType = UP_ROWTYPE_ADD; // Render add
		if ($tbl_users->CurrentAction == "gridadd" && $tbl_users->EventCancelled) // Insert failed
			$tbl_users_grid->RestoreCurrentRowFormValues($tbl_users_grid->RowIndex); // Restore form values
		if ($tbl_users->CurrentAction == "gridedit") { // Grid edit
			if ($tbl_users->EventCancelled) {
				$tbl_users_grid->RestoreCurrentRowFormValues($tbl_users_grid->RowIndex); // Restore form values
			}
			if ($tbl_users_grid->RowAction == "insert")
				$tbl_users->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$tbl_users->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($tbl_users->CurrentAction == "gridedit" && ($tbl_users->RowType == UP_ROWTYPE_EDIT || $tbl_users->RowType == UP_ROWTYPE_ADD) && $tbl_users->EventCancelled) // Update failed
			$tbl_users_grid->RestoreCurrentRowFormValues($tbl_users_grid->RowIndex); // Restore form values
		if ($tbl_users->RowType == UP_ROWTYPE_EDIT) // Edit row
			$tbl_users_grid->EditRowCnt++;
		if ($tbl_users->CurrentAction == "F") // Confirm row
			$tbl_users_grid->RestoreCurrentRowFormValues($tbl_users_grid->RowIndex); // Restore form values
		if ($tbl_users->RowType == UP_ROWTYPE_ADD || $tbl_users->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($tbl_users->CurrentAction == "edit") {
				$tbl_users->RowAttrs = array();
				$tbl_users->CssClass = "upTableEditRow";
			} else {
				$tbl_users->RowAttrs = array();
			}
			if (!empty($tbl_users_grid->RowIndex))
				$tbl_users->RowAttrs = array_merge($tbl_users->RowAttrs, array('data-rowindex'=>$tbl_users_grid->RowIndex, 'id'=>'r' . $tbl_users_grid->RowIndex . '_tbl_users'));
		} else {
			$tbl_users->RowAttrs = array();
		}

		// Render row
		$tbl_users_grid->RenderRow();

		// Render list options
		$tbl_users_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($tbl_users_grid->RowAction <> "delete" && $tbl_users_grid->RowAction <> "insertdelete" && !($tbl_users_grid->RowAction == "insert" && $tbl_users->CurrentAction == "F" && $tbl_users_grid->EmptyRow())) {
?>
	<tr<?php echo $tbl_users->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_users_grid->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_users->users_ID->Visible) { // users_ID ?>
		<td<?php echo $tbl_users->users_ID->CellAttributes() ?>>
<?php if ($tbl_users->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_ID" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_ID" value="<?php echo up_HtmlEncode($tbl_users->users_ID->OldValue) ?>">
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $tbl_users->users_ID->ViewAttributes() ?>><?php echo $tbl_users->users_ID->EditValue ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_ID" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_ID" value="<?php echo up_HtmlEncode($tbl_users->users_ID->CurrentValue) ?>">
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_users->users_ID->ViewAttributes() ?>><?php echo $tbl_users->users_ID->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_ID" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_ID" value="<?php echo up_HtmlEncode($tbl_users->users_ID->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_ID" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_ID" value="<?php echo up_HtmlEncode($tbl_users->users_ID->OldValue) ?>">
<?php } ?>
<a name="<?php echo $tbl_users_grid->PageObjName . "_row_" . $tbl_users_grid->RowCnt ?>" id="<?php echo $tbl_users_grid->PageObjName . "_row_" . $tbl_users_grid->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($tbl_users->unitID->Visible) { // unitID ?>
		<td<?php echo $tbl_users->unitID->CellAttributes() ?>>
<?php if ($tbl_users->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $tbl_users->unitID->ViewAttributes() ?>><?php echo $tbl_users->unitID->EditValue ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" id="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" value="<?php echo up_HtmlEncode($tbl_users->unitID->CurrentValue) ?>">
<?php } else { ?>
<select id="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" name="x<?php echo $tbl_users_grid->RowIndex ?>_unitID"<?php echo $tbl_users->unitID->EditAttributes() ?>>
<?php
if (is_array($tbl_users->unitID->EditValue)) {
	$arwrk = $tbl_users->unitID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_users->unitID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_users->unitID->OldValue = "";
?>
</select>
<?php } ?>
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_unitID" id="o<?php echo $tbl_users_grid->RowIndex ?>_unitID" value="<?php echo up_HtmlEncode($tbl_users->unitID->OldValue) ?>">
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $tbl_users->unitID->ViewAttributes() ?>><?php echo $tbl_users->unitID->EditValue ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" id="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" value="<?php echo up_HtmlEncode($tbl_users->unitID->CurrentValue) ?>">
<?php } else { ?>
<select id="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" name="x<?php echo $tbl_users_grid->RowIndex ?>_unitID"<?php echo $tbl_users->unitID->EditAttributes() ?>>
<?php
if (is_array($tbl_users->unitID->EditValue)) {
	$arwrk = $tbl_users->unitID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_users->unitID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_users->unitID->OldValue = "";
?>
</select>
<?php } ?>
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_users->unitID->ViewAttributes() ?>><?php echo $tbl_users->unitID->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" id="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" value="<?php echo up_HtmlEncode($tbl_users->unitID->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_unitID" id="o<?php echo $tbl_users_grid->RowIndex ?>_unitID" value="<?php echo up_HtmlEncode($tbl_users->unitID->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_name->Visible) { // users_name ?>
		<td<?php echo $tbl_users->users_name->CellAttributes() ?>>
<?php if ($tbl_users->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_name" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_name" size="30" maxlength="255" value="<?php echo $tbl_users->users_name->EditValue ?>"<?php echo $tbl_users->users_name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_name" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_name" value="<?php echo up_HtmlEncode($tbl_users->users_name->OldValue) ?>">
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_name" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_name" size="30" maxlength="255" value="<?php echo $tbl_users->users_name->EditValue ?>"<?php echo $tbl_users->users_name->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_users->users_name->ViewAttributes() ?>><?php echo $tbl_users->users_name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_name" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_name" value="<?php echo up_HtmlEncode($tbl_users->users_name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_name" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_name" value="<?php echo up_HtmlEncode($tbl_users->users_name->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_userLoginName->Visible) { // users_userLoginName ?>
		<td<?php echo $tbl_users->users_userLoginName->CellAttributes() ?>>
<?php if ($tbl_users->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" size="30" maxlength="12" value="<?php echo $tbl_users->users_userLoginName->EditValue ?>"<?php echo $tbl_users->users_userLoginName->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" value="<?php echo up_HtmlEncode($tbl_users->users_userLoginName->OldValue) ?>">
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" size="30" maxlength="12" value="<?php echo $tbl_users->users_userLoginName->EditValue ?>"<?php echo $tbl_users->users_userLoginName->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_users->users_userLoginName->ViewAttributes() ?>><?php echo $tbl_users->users_userLoginName->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" value="<?php echo up_HtmlEncode($tbl_users->users_userLoginName->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" value="<?php echo up_HtmlEncode($tbl_users->users_userLoginName->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_password->Visible) { // users_password ?>
		<td<?php echo $tbl_users->users_password->CellAttributes() ?>>
<?php if ($tbl_users->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="password" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_password" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_password" size="30" maxlength="15"<?php echo $tbl_users->users_password->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_password" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_password" value="<?php echo up_HtmlEncode($tbl_users->users_password->OldValue) ?>">
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="password" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_password" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_password" value="<?php echo $tbl_users->users_password->EditValue ?>" size="30" maxlength="15"<?php echo $tbl_users->users_password->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_users->users_password->ViewAttributes() ?>><?php echo $tbl_users->users_password->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_password" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_password" value="<?php echo up_HtmlEncode($tbl_users->users_password->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_password" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_password" value="<?php echo up_HtmlEncode($tbl_users->users_password->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_userLevel->Visible) { // users_userLevel ?>
		<td<?php echo $tbl_users->users_userLevel->CellAttributes() ?>>
<?php if ($tbl_users->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $tbl_users->users_userLevel->ViewAttributes() ?>><?php echo $tbl_users->users_userLevel->EditValue ?></div>
<?php } else { ?>
<select id="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel"<?php echo $tbl_users->users_userLevel->EditAttributes() ?>>
<?php
if (is_array($tbl_users->users_userLevel->EditValue)) {
	$arwrk = $tbl_users->users_userLevel->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_users->users_userLevel->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_users->users_userLevel->OldValue = "";
?>
</select>
<?php } ?>
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel" value="<?php echo up_HtmlEncode($tbl_users->users_userLevel->OldValue) ?>">
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $tbl_users->users_userLevel->ViewAttributes() ?>><?php echo $tbl_users->users_userLevel->EditValue ?></div>
<?php } else { ?>
<select id="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel"<?php echo $tbl_users->users_userLevel->EditAttributes() ?>>
<?php
if (is_array($tbl_users->users_userLevel->EditValue)) {
	$arwrk = $tbl_users->users_userLevel->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_users->users_userLevel->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_users->users_userLevel->OldValue = "";
?>
</select>
<?php } ?>
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_users->users_userLevel->ViewAttributes() ?>><?php echo $tbl_users->users_userLevel->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel" value="<?php echo up_HtmlEncode($tbl_users->users_userLevel->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel" value="<?php echo up_HtmlEncode($tbl_users->users_userLevel->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_email->Visible) { // users_email ?>
		<td<?php echo $tbl_users->users_email->CellAttributes() ?>>
<?php if ($tbl_users->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_email" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_email" size="30" maxlength="255" value="<?php echo $tbl_users->users_email->EditValue ?>"<?php echo $tbl_users->users_email->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_email" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_email" value="<?php echo up_HtmlEncode($tbl_users->users_email->OldValue) ?>">
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_email" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_email" size="30" maxlength="255" value="<?php echo $tbl_users->users_email->EditValue ?>"<?php echo $tbl_users->users_email->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_users->users_email->ViewAttributes() ?>><?php echo $tbl_users->users_email->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_email" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_email" value="<?php echo up_HtmlEncode($tbl_users->users_email->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_email" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_email" value="<?php echo up_HtmlEncode($tbl_users->users_email->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_contactNo->Visible) { // users_contactNo ?>
		<td<?php echo $tbl_users->users_contactNo->CellAttributes() ?>>
<?php if ($tbl_users->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" size="30" maxlength="255" value="<?php echo $tbl_users->users_contactNo->EditValue ?>"<?php echo $tbl_users->users_contactNo->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" value="<?php echo up_HtmlEncode($tbl_users->users_contactNo->OldValue) ?>">
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" size="30" maxlength="255" value="<?php echo $tbl_users->users_contactNo->EditValue ?>"<?php echo $tbl_users->users_contactNo->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_users->users_contactNo->ViewAttributes() ?>><?php echo $tbl_users->users_contactNo->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" value="<?php echo up_HtmlEncode($tbl_users->users_contactNo->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" id="o<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" value="<?php echo up_HtmlEncode($tbl_users->users_contactNo->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_users_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($tbl_users->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($tbl_users->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($tbl_users->CurrentAction <> "gridadd" || $tbl_users->CurrentMode == "copy")
		if (!$tbl_users_grid->Recordset->EOF) $tbl_users_grid->Recordset->MoveNext();
}
?>
<?php
	if ($tbl_users->CurrentMode == "add" || $tbl_users->CurrentMode == "copy" || $tbl_users->CurrentMode == "edit") {
		$tbl_users_grid->RowIndex = '$rowindex$';
		$tbl_users_grid->LoadDefaultValues();

		// Set row properties
		$tbl_users->ResetAttrs();
		$tbl_users->RowAttrs = array();
		if (!empty($tbl_users_grid->RowIndex))
			$tbl_users->RowAttrs = array_merge($tbl_users->RowAttrs, array('data-rowindex'=>$tbl_users_grid->RowIndex, 'id'=>'r' . $tbl_users_grid->RowIndex . '_tbl_users'));
		$tbl_users->RowType = UP_ROWTYPE_ADD;

		// Render row
		$tbl_users_grid->RenderRow();

		// Render list options
		$tbl_users_grid->RenderListOptions();

		// Add id and class to the template row
		$tbl_users->RowAttrs["id"] = "r0_tbl_users";
		up_AppendClass($tbl_users->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $tbl_users->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_users_grid->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_users->users_ID->Visible) { // users_ID ?>
		<td>&nbsp;</td>
	<?php } ?>
	<?php if ($tbl_users->unitID->Visible) { // unitID ?>
		<td>
<?php if ($tbl_users->CurrentAction <> "F") { ?>
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $tbl_users->unitID->ViewAttributes() ?>><?php echo $tbl_users->unitID->EditValue ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" id="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" value="<?php echo up_HtmlEncode($tbl_users->unitID->CurrentValue) ?>">
<?php } else { ?>
<select id="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" name="x<?php echo $tbl_users_grid->RowIndex ?>_unitID"<?php echo $tbl_users->unitID->EditAttributes() ?>>
<?php
if (is_array($tbl_users->unitID->EditValue)) {
	$arwrk = $tbl_users->unitID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_users->unitID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_users->unitID->OldValue = "";
?>
</select>
<?php } ?>
<?php } else { ?>
<div<?php echo $tbl_users->unitID->ViewAttributes() ?>><?php echo $tbl_users->unitID->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" id="x<?php echo $tbl_users_grid->RowIndex ?>_unitID" value="<?php echo up_HtmlEncode($tbl_users->unitID->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_name->Visible) { // users_name ?>
		<td>
<?php if ($tbl_users->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_name" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_name" size="30" maxlength="255" value="<?php echo $tbl_users->users_name->EditValue ?>"<?php echo $tbl_users->users_name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_users->users_name->ViewAttributes() ?>><?php echo $tbl_users->users_name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_name" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_name" value="<?php echo up_HtmlEncode($tbl_users->users_name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_userLoginName->Visible) { // users_userLoginName ?>
		<td>
<?php if ($tbl_users->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" size="30" maxlength="12" value="<?php echo $tbl_users->users_userLoginName->EditValue ?>"<?php echo $tbl_users->users_userLoginName->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_users->users_userLoginName->ViewAttributes() ?>><?php echo $tbl_users->users_userLoginName->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLoginName" value="<?php echo up_HtmlEncode($tbl_users->users_userLoginName->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_password->Visible) { // users_password ?>
		<td>
<?php if ($tbl_users->CurrentAction <> "F") { ?>
<input type="password" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_password" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_password" size="30" maxlength="15"<?php echo $tbl_users->users_password->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_users->users_password->ViewAttributes() ?>><?php echo $tbl_users->users_password->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_password" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_password" value="<?php echo up_HtmlEncode($tbl_users->users_password->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_userLevel->Visible) { // users_userLevel ?>
		<td>
<?php if ($tbl_users->CurrentAction <> "F") { ?>
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $tbl_users->users_userLevel->ViewAttributes() ?>><?php echo $tbl_users->users_userLevel->EditValue ?></div>
<?php } else { ?>
<select id="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel"<?php echo $tbl_users->users_userLevel->EditAttributes() ?>>
<?php
if (is_array($tbl_users->users_userLevel->EditValue)) {
	$arwrk = $tbl_users->users_userLevel->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_users->users_userLevel->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_users->users_userLevel->OldValue = "";
?>
</select>
<?php } ?>
<?php } else { ?>
<div<?php echo $tbl_users->users_userLevel->ViewAttributes() ?>><?php echo $tbl_users->users_userLevel->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_userLevel" value="<?php echo up_HtmlEncode($tbl_users->users_userLevel->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_email->Visible) { // users_email ?>
		<td>
<?php if ($tbl_users->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_email" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_email" size="30" maxlength="255" value="<?php echo $tbl_users->users_email->EditValue ?>"<?php echo $tbl_users->users_email->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_users->users_email->ViewAttributes() ?>><?php echo $tbl_users->users_email->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_email" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_email" value="<?php echo up_HtmlEncode($tbl_users->users_email->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_contactNo->Visible) { // users_contactNo ?>
		<td>
<?php if ($tbl_users->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" size="30" maxlength="255" value="<?php echo $tbl_users->users_contactNo->EditValue ?>"<?php echo $tbl_users->users_contactNo->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_users->users_contactNo->ViewAttributes() ?>><?php echo $tbl_users->users_contactNo->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" id="x<?php echo $tbl_users_grid->RowIndex ?>_users_contactNo" value="<?php echo up_HtmlEncode($tbl_users->users_contactNo->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_users_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($tbl_users->CurrentMode == "add" || $tbl_users->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $tbl_users_grid->KeyCount ?>">
<?php echo $tbl_users_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($tbl_users->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $tbl_users_grid->KeyCount ?>">
<?php echo $tbl_users_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="tbl_users_grid">
</div>
<?php

// Close recordset
if ($tbl_users_grid->Recordset)
	$tbl_users_grid->Recordset->Close();
?>
<?php if (($tbl_users->CurrentMode == "add" || $tbl_users->CurrentMode == "copy" || $tbl_users->CurrentMode == "edit") && $tbl_users->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridLowerPanel">
<?php if ($tbl_users->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><img src='phpimages/addblankrow.gif' alt='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' title='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' width='16' height='16' border='0'></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
</td></tr></table>
<?php if ($tbl_users->Export == "" && $tbl_users->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_users_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$tbl_users_grid->Page_Terminate();
$Page =& $MasterPage;
?>
