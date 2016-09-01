<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$tbl_faculty_grid = new ctbl_faculty_grid();
$MasterPage =& $Page;
$Page =& $tbl_faculty_grid;

// Page init
$tbl_faculty_grid->Page_Init();

// Page main
$tbl_faculty_grid->Page_Main();
?>
<?php if ($tbl_faculty->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_faculty_grid = new up_Page("tbl_faculty_grid");

// page properties
tbl_faculty_grid.PageID = "grid"; // page ID
tbl_faculty_grid.FormID = "ftbl_facultygrid"; // form ID
var UP_PAGE_ID = tbl_faculty_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_faculty_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_faculty_birthDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_faculty->faculty_birthDate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_gender_ID"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_faculty->gender_ID->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_faculty_highestDegreeListed"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_faculty->faculty_highestDegreeListed->FldErrMsg()) ?>");

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
tbl_faculty_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "faculty_name", false)) return false;
	if (up_ValueChanged(fobj, infix, "faculty_birthDate", false)) return false;
	if (up_ValueChanged(fobj, infix, "gender_ID", false)) return false;
	if (up_ValueChanged(fobj, infix, "faculty_highestDegreeListed", false)) return false;
	if (up_ValueChanged(fobj, infix, "degreelevelFaculty_ID", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
tbl_faculty_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_faculty_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_faculty_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_faculty_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-cold-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<?php } ?>
<?php
if ($tbl_faculty->CurrentAction == "gridadd") {
	if ($tbl_faculty->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$tbl_faculty_grid->TotalRecs = $tbl_faculty->SelectRecordCount();
			$tbl_faculty_grid->Recordset = $tbl_faculty_grid->LoadRecordset($tbl_faculty_grid->StartRec-1, $tbl_faculty_grid->DisplayRecs);
		} else {
			if ($tbl_faculty_grid->Recordset = $tbl_faculty_grid->LoadRecordset())
				$tbl_faculty_grid->TotalRecs = $tbl_faculty_grid->Recordset->RecordCount();
		}
		$tbl_faculty_grid->StartRec = 1;
		$tbl_faculty_grid->DisplayRecs = $tbl_faculty_grid->TotalRecs;
	} else {
		$tbl_faculty->CurrentFilter = "0=1";
		$tbl_faculty_grid->StartRec = 1;
		$tbl_faculty_grid->DisplayRecs = $tbl_faculty->GridAddRowCount;
	}
	$tbl_faculty_grid->TotalRecs = $tbl_faculty_grid->DisplayRecs;
	$tbl_faculty_grid->StopRec = $tbl_faculty_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_faculty_grid->TotalRecs = $tbl_faculty->SelectRecordCount();
	} else {
		if ($tbl_faculty_grid->Recordset = $tbl_faculty_grid->LoadRecordset())
			$tbl_faculty_grid->TotalRecs = $tbl_faculty_grid->Recordset->RecordCount();
	}
	$tbl_faculty_grid->StartRec = 1;
	$tbl_faculty_grid->DisplayRecs = $tbl_faculty_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$tbl_faculty_grid->Recordset = $tbl_faculty_grid->LoadRecordset($tbl_faculty_grid->StartRec-1, $tbl_faculty_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($tbl_faculty->CurrentMode == "add" || $tbl_faculty->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($tbl_faculty->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_faculty->TableCaption() ?></p>
</p>
<?php $tbl_faculty_grid->ShowPageHeader(); ?>
<?php
$tbl_faculty_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($tbl_faculty->CurrentMode == "add" || $tbl_faculty->CurrentMode == "copy" || $tbl_faculty->CurrentMode == "edit") && $tbl_faculty->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
<?php if ($tbl_faculty->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><img src='phpimages/addblankrow.gif' alt='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' title='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' width='16' height='16' border='0'></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
<div id="gmp_tbl_faculty" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_faculty->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_faculty_grid->RenderListOptions();

// Render list options (header, left)
$tbl_faculty_grid->ListOptions->Render("header", "left");
?>
<?php if ($tbl_faculty->faculty_name->Visible) { // faculty_name ?>
	<?php if ($tbl_faculty->SortUrl($tbl_faculty->faculty_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_faculty->faculty_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_faculty->faculty_name->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_faculty->faculty_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_faculty->faculty_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_faculty->faculty_birthDate->Visible) { // faculty_birthDate ?>
	<?php if ($tbl_faculty->SortUrl($tbl_faculty->faculty_birthDate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_faculty->faculty_birthDate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_faculty->faculty_birthDate->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_faculty->faculty_birthDate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_faculty->faculty_birthDate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_faculty->gender_ID->Visible) { // gender_ID ?>
	<?php if ($tbl_faculty->SortUrl($tbl_faculty->gender_ID) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_faculty->gender_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_faculty->gender_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_faculty->gender_ID->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_faculty->gender_ID->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_faculty->faculty_highestDegreeListed->Visible) { // faculty_highestDegreeListed ?>
	<?php if ($tbl_faculty->SortUrl($tbl_faculty->faculty_highestDegreeListed) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_faculty->faculty_highestDegreeListed->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_faculty->faculty_highestDegreeListed->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_faculty->faculty_highestDegreeListed->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_faculty->faculty_highestDegreeListed->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_faculty->degreelevelFaculty_ID->Visible) { // degreelevelFaculty_ID ?>
	<?php if ($tbl_faculty->SortUrl($tbl_faculty->degreelevelFaculty_ID) == "") { ?>
		<td><?php echo $tbl_faculty->degreelevelFaculty_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $tbl_faculty->degreelevelFaculty_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_faculty->degreelevelFaculty_ID->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_faculty->degreelevelFaculty_ID->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_faculty_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$tbl_faculty_grid->StartRec = 1;
$tbl_faculty_grid->StopRec = $tbl_faculty_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($tbl_faculty->CurrentAction == "gridadd" || $tbl_faculty->CurrentAction == "gridedit" || $tbl_faculty->CurrentAction == "F")) {
		$tbl_faculty_grid->KeyCount = $objForm->GetValue("key_count");
		$tbl_faculty_grid->StopRec = $tbl_faculty_grid->KeyCount;
	}
}
$tbl_faculty_grid->RecCnt = $tbl_faculty_grid->StartRec - 1;
if ($tbl_faculty_grid->Recordset && !$tbl_faculty_grid->Recordset->EOF) {
	$tbl_faculty_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_faculty_grid->StartRec > 1)
		$tbl_faculty_grid->Recordset->Move($tbl_faculty_grid->StartRec - 1);
} elseif (!$tbl_faculty->AllowAddDeleteRow && $tbl_faculty_grid->StopRec == 0) {
	$tbl_faculty_grid->StopRec = $tbl_faculty->GridAddRowCount;
}

// Initialize aggregate
$tbl_faculty->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_faculty->ResetAttrs();
$tbl_faculty_grid->RenderRow();
$tbl_faculty_grid->RowCnt = 0;
if ($tbl_faculty->CurrentAction == "gridadd")
	$tbl_faculty_grid->RowIndex = 0;
if ($tbl_faculty->CurrentAction == "gridedit")
	$tbl_faculty_grid->RowIndex = 0;
while ($tbl_faculty_grid->RecCnt < $tbl_faculty_grid->StopRec) {
	$tbl_faculty_grid->RecCnt++;
	if (intval($tbl_faculty_grid->RecCnt) >= intval($tbl_faculty_grid->StartRec)) {
		$tbl_faculty_grid->RowCnt++;
		if ($tbl_faculty->CurrentAction == "gridadd" || $tbl_faculty->CurrentAction == "gridedit" || $tbl_faculty->CurrentAction == "F")
			$tbl_faculty_grid->RowIndex++;

		// Set up key count
		$tbl_faculty_grid->KeyCount = $tbl_faculty_grid->RowIndex;

		// Init row class and style
		$tbl_faculty->ResetAttrs();
		$tbl_faculty->CssClass = "";
		if ($tbl_faculty->CurrentAction == "gridadd") {
			if ($tbl_faculty->CurrentMode == "copy") {
				$tbl_faculty_grid->LoadRowValues($tbl_faculty_grid->Recordset); // Load row values
				$tbl_faculty_grid->SetRecordKey($tbl_faculty_grid->RowOldKey, $tbl_faculty_grid->Recordset); // Set old record key
			} else {
				$tbl_faculty_grid->LoadDefaultValues(); // Load default values
				$tbl_faculty_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($tbl_faculty->CurrentAction == "gridedit") {
			$tbl_faculty_grid->LoadRowValues($tbl_faculty_grid->Recordset); // Load row values
		}
		$tbl_faculty->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($tbl_faculty->CurrentAction == "gridadd") // Grid add
			$tbl_faculty->RowType = UP_ROWTYPE_ADD; // Render add
		if ($tbl_faculty->CurrentAction == "gridadd" && $tbl_faculty->EventCancelled) // Insert failed
			$tbl_faculty_grid->RestoreCurrentRowFormValues($tbl_faculty_grid->RowIndex); // Restore form values
		if ($tbl_faculty->CurrentAction == "gridedit") { // Grid edit
			if ($tbl_faculty->EventCancelled) {
				$tbl_faculty_grid->RestoreCurrentRowFormValues($tbl_faculty_grid->RowIndex); // Restore form values
			}
			if ($tbl_faculty_grid->RowAction == "insert")
				$tbl_faculty->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$tbl_faculty->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($tbl_faculty->CurrentAction == "gridedit" && ($tbl_faculty->RowType == UP_ROWTYPE_EDIT || $tbl_faculty->RowType == UP_ROWTYPE_ADD) && $tbl_faculty->EventCancelled) // Update failed
			$tbl_faculty_grid->RestoreCurrentRowFormValues($tbl_faculty_grid->RowIndex); // Restore form values
		if ($tbl_faculty->RowType == UP_ROWTYPE_EDIT) // Edit row
			$tbl_faculty_grid->EditRowCnt++;
		if ($tbl_faculty->CurrentAction == "F") // Confirm row
			$tbl_faculty_grid->RestoreCurrentRowFormValues($tbl_faculty_grid->RowIndex); // Restore form values
		if ($tbl_faculty->RowType == UP_ROWTYPE_ADD || $tbl_faculty->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($tbl_faculty->CurrentAction == "edit") {
				$tbl_faculty->RowAttrs = array();
				$tbl_faculty->CssClass = "upTableEditRow";
			} else {
				$tbl_faculty->RowAttrs = array();
			}
			if (!empty($tbl_faculty_grid->RowIndex))
				$tbl_faculty->RowAttrs = array_merge($tbl_faculty->RowAttrs, array('data-rowindex'=>$tbl_faculty_grid->RowIndex, 'id'=>'r' . $tbl_faculty_grid->RowIndex . '_tbl_faculty'));
		} else {
			$tbl_faculty->RowAttrs = array();
		}

		// Render row
		$tbl_faculty_grid->RenderRow();

		// Render list options
		$tbl_faculty_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($tbl_faculty_grid->RowAction <> "delete" && $tbl_faculty_grid->RowAction <> "insertdelete" && !($tbl_faculty_grid->RowAction == "insert" && $tbl_faculty->CurrentAction == "F" && $tbl_faculty_grid->EmptyRow())) {
?>
	<tr<?php echo $tbl_faculty->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_faculty_grid->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_faculty->faculty_name->Visible) { // faculty_name ?>
		<td<?php echo $tbl_faculty->faculty_name->CellAttributes() ?>>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" size="30" maxlength="255" value="<?php echo $tbl_faculty->faculty_name->EditValue ?>"<?php echo $tbl_faculty->faculty_name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" id="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_name->OldValue) ?>">
<?php } ?>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" size="30" maxlength="255" value="<?php echo $tbl_faculty->faculty_name->EditValue ?>"<?php echo $tbl_faculty->faculty_name->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_faculty->faculty_name->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" id="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_name->OldValue) ?>">
<?php } ?>
<a name="<?php echo $tbl_faculty_grid->PageObjName . "_row_" . $tbl_faculty_grid->RowCnt ?>" id="<?php echo $tbl_faculty_grid->PageObjName . "_row_" . $tbl_faculty_grid->RowCnt ?>"></a>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" name="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_ID" id="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_ID" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_ID->OldValue) ?>">
<?php } ?>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_ID" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_ID" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_ID->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_faculty->faculty_birthDate->Visible) { // faculty_birthDate ?>
		<td<?php echo $tbl_faculty->faculty_birthDate->CellAttributes() ?>>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" value="<?php echo $tbl_faculty->faculty_birthDate->EditValue ?>"<?php echo $tbl_faculty->faculty_birthDate->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" name="cal_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" // button id
});
</script>
<input type="hidden" name="fo<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" id="fo<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" value="<?php echo up_HtmlEncode(up_FormatDateTime($tbl_faculty->faculty_birthDate->OldValue, 6)) ?>">
<input type="hidden" name="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" id="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_birthDate->OldValue) ?>">
<?php } ?>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" value="<?php echo $tbl_faculty->faculty_birthDate->EditValue ?>"<?php echo $tbl_faculty->faculty_birthDate->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" name="cal_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" // button id
});
</script>
<?php } ?>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_faculty->faculty_birthDate->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_birthDate->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_birthDate->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" id="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_birthDate->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_faculty->gender_ID->Visible) { // gender_ID ?>
		<td<?php echo $tbl_faculty->gender_ID->CellAttributes() ?>>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<div id="tp_x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" value="{value}"<?php echo $tbl_faculty->gender_ID->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_faculty->gender_ID->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_faculty->gender_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_faculty->gender_ID->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $tbl_faculty->gender_ID->OldValue = "";
?>
</div>
<input type="hidden" name="o<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" id="o<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" value="<?php echo up_HtmlEncode($tbl_faculty->gender_ID->OldValue) ?>">
<?php } ?>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div id="tp_x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" value="{value}"<?php echo $tbl_faculty->gender_ID->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_faculty->gender_ID->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_faculty->gender_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_faculty->gender_ID->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $tbl_faculty->gender_ID->OldValue = "";
?>
</div>
<?php } ?>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_faculty->gender_ID->ViewAttributes() ?>><?php echo $tbl_faculty->gender_ID->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" value="<?php echo up_HtmlEncode($tbl_faculty->gender_ID->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" id="o<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" value="<?php echo up_HtmlEncode($tbl_faculty->gender_ID->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_faculty->faculty_highestDegreeListed->Visible) { // faculty_highestDegreeListed ?>
		<td<?php echo $tbl_faculty->faculty_highestDegreeListed->CellAttributes() ?>>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<span id="as_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" style="white-space: nowrap; z-index: <?php echo (9000 - $tbl_faculty_grid->RowIndex * 10) ?>">
	<input type="text" name="sv_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="sv_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo $tbl_faculty->faculty_highestDegreeListed->EditValue ?>" size="30"<?php echo $tbl_faculty->faculty_highestDegreeListed->EditAttributes() ?>>&nbsp;<span id="em_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" class="upMessage" style="display: none"><?php echo str_replace("%f", "phpimages/", $Language->Phrase("UnmatchedValue")) ?></span>
	<div id="sc_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" style="z-index: <?php echo (9000 - $tbl_faculty_grid->RowIndex * 10) ?>"></div>
</span>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo $tbl_faculty->faculty_highestDegreeListed->CurrentValue ?>">
<?php
 $sSqlWrk = "SELECT `degreeLevel_ID`, `degreeLevel_name` FROM `ref_degreelevel_degrees`";
 $sWhereWrk = "`degreeLevel_name`  LIKE '{query_value}%'";
 if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
 $sSqlWrk .= " LIMIT " . UP_AUTO_SUGGEST_MAX_ENTRIES;
	$sSqlWrk = TEAencrypt($sSqlWrk, UP_RANDOM_KEY);
?>
<input type="hidden" name="s_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="s_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo $sSqlWrk ?>">
<script type="text/javascript">
<!--
var oas_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed = new up_AutoSuggest("sv_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "sc_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "s_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "em_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "", false, UP_AUTO_SUGGEST_MAX_ENTRIES);
oas_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed.formatResult = function(ar) {	
	var df1 = ar[1];
	return df1;
};
oas_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed.ac.typeAhead = false;

//-->
</script>
<input type="hidden" name="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_highestDegreeListed->OldValue) ?>">
<?php } ?>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<span id="as_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" style="white-space: nowrap; z-index: <?php echo (9000 - $tbl_faculty_grid->RowIndex * 10) ?>">
	<input type="text" name="sv_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="sv_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo $tbl_faculty->faculty_highestDegreeListed->EditValue ?>" size="30"<?php echo $tbl_faculty->faculty_highestDegreeListed->EditAttributes() ?>>&nbsp;<span id="em_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" class="upMessage" style="display: none"><?php echo str_replace("%f", "phpimages/", $Language->Phrase("UnmatchedValue")) ?></span>
	<div id="sc_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" style="z-index: <?php echo (9000 - $tbl_faculty_grid->RowIndex * 10) ?>"></div>
</span>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo $tbl_faculty->faculty_highestDegreeListed->CurrentValue ?>">
<?php
 $sSqlWrk = "SELECT `degreeLevel_ID`, `degreeLevel_name` FROM `ref_degreelevel_degrees`";
 $sWhereWrk = "`degreeLevel_name`  LIKE '{query_value}%'";
 if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
 $sSqlWrk .= " LIMIT " . UP_AUTO_SUGGEST_MAX_ENTRIES;
	$sSqlWrk = TEAencrypt($sSqlWrk, UP_RANDOM_KEY);
?>
<input type="hidden" name="s_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="s_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo $sSqlWrk ?>">
<script type="text/javascript">
<!--
var oas_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed = new up_AutoSuggest("sv_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "sc_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "s_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "em_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "", false, UP_AUTO_SUGGEST_MAX_ENTRIES);
oas_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed.formatResult = function(ar) {	
	var df1 = ar[1];
	return df1;
};
oas_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed.ac.typeAhead = false;

//-->
</script>
<?php } ?>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_faculty->faculty_highestDegreeListed->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_highestDegreeListed->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_highestDegreeListed->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="o<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_highestDegreeListed->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_faculty->degreelevelFaculty_ID->Visible) { // degreelevelFaculty_ID ?>
		<td<?php echo $tbl_faculty->degreelevelFaculty_ID->CellAttributes() ?>>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<select id="x<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID"<?php echo $tbl_faculty->degreelevelFaculty_ID->EditAttributes() ?>>
<?php
if (is_array($tbl_faculty->degreelevelFaculty_ID->EditValue)) {
	$arwrk = $tbl_faculty->degreelevelFaculty_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_faculty->degreelevelFaculty_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_faculty->degreelevelFaculty_ID->OldValue = "";
?>
</select>
<input type="hidden" name="o<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID" id="o<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID" value="<?php echo up_HtmlEncode($tbl_faculty->degreelevelFaculty_ID->OldValue) ?>">
<?php } ?>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<select id="x<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID"<?php echo $tbl_faculty->degreelevelFaculty_ID->EditAttributes() ?>>
<?php
if (is_array($tbl_faculty->degreelevelFaculty_ID->EditValue)) {
	$arwrk = $tbl_faculty->degreelevelFaculty_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_faculty->degreelevelFaculty_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_faculty->degreelevelFaculty_ID->OldValue = "";
?>
</select>
<?php } ?>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_faculty->degreelevelFaculty_ID->ViewAttributes() ?>><?php echo $tbl_faculty->degreelevelFaculty_ID->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID" value="<?php echo up_HtmlEncode($tbl_faculty->degreelevelFaculty_ID->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID" id="o<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID" value="<?php echo up_HtmlEncode($tbl_faculty->degreelevelFaculty_ID->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_faculty_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($tbl_faculty->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($tbl_faculty->CurrentAction <> "gridadd" || $tbl_faculty->CurrentMode == "copy")
		if (!$tbl_faculty_grid->Recordset->EOF) $tbl_faculty_grid->Recordset->MoveNext();
}
?>
<?php
	if ($tbl_faculty->CurrentMode == "add" || $tbl_faculty->CurrentMode == "copy" || $tbl_faculty->CurrentMode == "edit") {
		$tbl_faculty_grid->RowIndex = '$rowindex$';
		$tbl_faculty_grid->LoadDefaultValues();

		// Set row properties
		$tbl_faculty->ResetAttrs();
		$tbl_faculty->RowAttrs = array();
		if (!empty($tbl_faculty_grid->RowIndex))
			$tbl_faculty->RowAttrs = array_merge($tbl_faculty->RowAttrs, array('data-rowindex'=>$tbl_faculty_grid->RowIndex, 'id'=>'r' . $tbl_faculty_grid->RowIndex . '_tbl_faculty'));
		$tbl_faculty->RowType = UP_ROWTYPE_ADD;

		// Render row
		$tbl_faculty_grid->RenderRow();

		// Render list options
		$tbl_faculty_grid->RenderListOptions();

		// Add id and class to the template row
		$tbl_faculty->RowAttrs["id"] = "r0_tbl_faculty";
		up_AppendClass($tbl_faculty->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $tbl_faculty->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_faculty_grid->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_faculty->faculty_name->Visible) { // faculty_name ?>
		<td>
<?php if ($tbl_faculty->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" size="30" maxlength="255" value="<?php echo $tbl_faculty->faculty_name->EditValue ?>"<?php echo $tbl_faculty->faculty_name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_faculty->faculty_name->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_name" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_faculty->faculty_birthDate->Visible) { // faculty_birthDate ?>
		<td>
<?php if ($tbl_faculty->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" value="<?php echo $tbl_faculty->faculty_birthDate->EditValue ?>"<?php echo $tbl_faculty->faculty_birthDate->EditAttributes() ?>>
&nbsp;<img src="phpimages/calendar.png" id="cal_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" name="cal_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" alt="<?php echo $Language->Phrase("PickDate") ?>" title="<?php echo $Language->Phrase("PickDate") ?>" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField: "x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate", // input field id
	ifFormat: "%m/%d/%Y", // date format
	button: "cal_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" // button id
});
</script>
<?php } else { ?>
<div<?php echo $tbl_faculty->faculty_birthDate->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_birthDate->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_birthDate" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_birthDate->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_faculty->gender_ID->Visible) { // gender_ID ?>
		<td>
<?php if ($tbl_faculty->CurrentAction <> "F") { ?>
<div id="tp_x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" value="{value}"<?php echo $tbl_faculty->gender_ID->EditAttributes() ?>></label></div>
<div id="dsl_x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_faculty->gender_ID->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_faculty->gender_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_faculty->gender_ID->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
if (@$emptywrk) $tbl_faculty->gender_ID->OldValue = "";
?>
</div>
<?php } else { ?>
<div<?php echo $tbl_faculty->gender_ID->ViewAttributes() ?>><?php echo $tbl_faculty->gender_ID->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_gender_ID" value="<?php echo up_HtmlEncode($tbl_faculty->gender_ID->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_faculty->faculty_highestDegreeListed->Visible) { // faculty_highestDegreeListed ?>
		<td>
<?php if ($tbl_faculty->CurrentAction <> "F") { ?>
<span id="as_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" style="white-space: nowrap; z-index: <?php echo (9000 - $tbl_faculty_grid->RowIndex * 10) ?>">
	<input type="text" name="sv_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="sv_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo $tbl_faculty->faculty_highestDegreeListed->EditValue ?>" size="30"<?php echo $tbl_faculty->faculty_highestDegreeListed->EditAttributes() ?>>&nbsp;<span id="em_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" class="upMessage" style="display: none"><?php echo str_replace("%f", "phpimages/", $Language->Phrase("UnmatchedValue")) ?></span>
	<div id="sc_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" style="z-index: <?php echo (9000 - $tbl_faculty_grid->RowIndex * 10) ?>"></div>
</span>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo $tbl_faculty->faculty_highestDegreeListed->CurrentValue ?>">
<?php
 $sSqlWrk = "SELECT `degreeLevel_ID`, `degreeLevel_name` FROM `ref_degreelevel_degrees`";
 $sWhereWrk = "`degreeLevel_name`  LIKE '{query_value}%'";
 if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
 $sSqlWrk .= " LIMIT " . UP_AUTO_SUGGEST_MAX_ENTRIES;
	$sSqlWrk = TEAencrypt($sSqlWrk, UP_RANDOM_KEY);
?>
<input type="hidden" name="s_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="s_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo $sSqlWrk ?>">
<script type="text/javascript">
<!--
var oas_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed = new up_AutoSuggest("sv_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "sc_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "s_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "em_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed", "", false, UP_AUTO_SUGGEST_MAX_ENTRIES);
oas_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed.formatResult = function(ar) {	
	var df1 = ar[1];
	return df1;
};
oas_x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed.ac.typeAhead = false;

//-->
</script>
<?php } else { ?>
<div<?php echo $tbl_faculty->faculty_highestDegreeListed->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_highestDegreeListed->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_faculty_highestDegreeListed" value="<?php echo up_HtmlEncode($tbl_faculty->faculty_highestDegreeListed->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_faculty->degreelevelFaculty_ID->Visible) { // degreelevelFaculty_ID ?>
		<td>
<?php if ($tbl_faculty->CurrentAction <> "F") { ?>
<select id="x<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID"<?php echo $tbl_faculty->degreelevelFaculty_ID->EditAttributes() ?>>
<?php
if (is_array($tbl_faculty->degreelevelFaculty_ID->EditValue)) {
	$arwrk = $tbl_faculty->degreelevelFaculty_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_faculty->degreelevelFaculty_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_faculty->degreelevelFaculty_ID->OldValue = "";
?>
</select>
<?php } else { ?>
<div<?php echo $tbl_faculty->degreelevelFaculty_ID->ViewAttributes() ?>><?php echo $tbl_faculty->degreelevelFaculty_ID->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID" id="x<?php echo $tbl_faculty_grid->RowIndex ?>_degreelevelFaculty_ID" value="<?php echo up_HtmlEncode($tbl_faculty->degreelevelFaculty_ID->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_faculty_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($tbl_faculty->CurrentMode == "add" || $tbl_faculty->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $tbl_faculty_grid->KeyCount ?>">
<?php echo $tbl_faculty_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($tbl_faculty->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $tbl_faculty_grid->KeyCount ?>">
<?php echo $tbl_faculty_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="tbl_faculty_grid">
</div>
<?php

// Close recordset
if ($tbl_faculty_grid->Recordset)
	$tbl_faculty_grid->Recordset->Close();
?>
<?php if (($tbl_faculty->CurrentMode == "add" || $tbl_faculty->CurrentMode == "copy" || $tbl_faculty->CurrentMode == "edit") && $tbl_faculty->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridLowerPanel">
<?php if ($tbl_faculty->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><img src='phpimages/addblankrow.gif' alt='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' title='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' width='16' height='16' border='0'></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
</td></tr></table>
<?php if ($tbl_faculty->Export == "" && $tbl_faculty->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_faculty_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$tbl_faculty_grid->Page_Terminate();
$Page =& $MasterPage;
?>
