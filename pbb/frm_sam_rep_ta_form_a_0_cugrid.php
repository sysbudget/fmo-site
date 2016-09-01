<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$frm_sam_rep_ta_form_a_0_cu_grid = new cfrm_sam_rep_ta_form_a_0_cu_grid();
$MasterPage =& $Page;
$Page =& $frm_sam_rep_ta_form_a_0_cu_grid;

// Page init
$frm_sam_rep_ta_form_a_0_cu_grid->Page_Init();

// Page main
$frm_sam_rep_ta_form_a_0_cu_grid->Page_Main();
?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_rep_ta_form_a_0_cu_grid = new up_Page("frm_sam_rep_ta_form_a_0_cu_grid");

// page properties
frm_sam_rep_ta_form_a_0_cu_grid.PageID = "grid"; // page ID
frm_sam_rep_ta_form_a_0_cu_grid.FormID = "ffrm_sam_rep_ta_form_a_0_cugrid"; // form ID
var UP_PAGE_ID = frm_sam_rep_ta_form_a_0_cu_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_sam_rep_ta_form_a_0_cu_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_Participating_Units_Count"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_Participating_Units_Count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Target"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_rep_ta_form_a_0_cu->Target->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Numerator_28T29"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Denominator_28T29"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Accomplishment"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_rep_ta_form_a_0_cu->Accomplishment->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Numerator_28A29"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Denominator_28A29"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Supporting_Documents_Count"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_Rating"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_sam_rep_ta_form_a_0_cu->Rating->FldErrMsg()) ?>");

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
frm_sam_rep_ta_form_a_0_cu_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "CU_Office", false)) return false;
	if (up_ValueChanged(fobj, infix, "Participating_Units_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "Target", false)) return false;
	if (up_ValueChanged(fobj, infix, "Numerator_28T29", false)) return false;
	if (up_ValueChanged(fobj, infix, "Denominator_28T29", false)) return false;
	if (up_ValueChanged(fobj, infix, "Accomplishment", false)) return false;
	if (up_ValueChanged(fobj, infix, "Numerator_28A29", false)) return false;
	if (up_ValueChanged(fobj, infix, "Denominator_28A29", false)) return false;
	if (up_ValueChanged(fobj, infix, "Supporting_Documents_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "Rating", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
frm_sam_rep_ta_form_a_0_cu_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_rep_ta_form_a_0_cu_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_rep_ta_form_a_0_cu_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_rep_ta_form_a_0_cu_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridadd") {
	if ($frm_sam_rep_ta_form_a_0_cu->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$frm_sam_rep_ta_form_a_0_cu_grid->TotalRecs = $frm_sam_rep_ta_form_a_0_cu->SelectRecordCount();
			$frm_sam_rep_ta_form_a_0_cu_grid->Recordset = $frm_sam_rep_ta_form_a_0_cu_grid->LoadRecordset($frm_sam_rep_ta_form_a_0_cu_grid->StartRec-1, $frm_sam_rep_ta_form_a_0_cu_grid->DisplayRecs);
		} else {
			if ($frm_sam_rep_ta_form_a_0_cu_grid->Recordset = $frm_sam_rep_ta_form_a_0_cu_grid->LoadRecordset())
				$frm_sam_rep_ta_form_a_0_cu_grid->TotalRecs = $frm_sam_rep_ta_form_a_0_cu_grid->Recordset->RecordCount();
		}
		$frm_sam_rep_ta_form_a_0_cu_grid->StartRec = 1;
		$frm_sam_rep_ta_form_a_0_cu_grid->DisplayRecs = $frm_sam_rep_ta_form_a_0_cu_grid->TotalRecs;
	} else {
		$frm_sam_rep_ta_form_a_0_cu->CurrentFilter = "0=1";
		$frm_sam_rep_ta_form_a_0_cu_grid->StartRec = 1;
		$frm_sam_rep_ta_form_a_0_cu_grid->DisplayRecs = $frm_sam_rep_ta_form_a_0_cu->GridAddRowCount;
	}
	$frm_sam_rep_ta_form_a_0_cu_grid->TotalRecs = $frm_sam_rep_ta_form_a_0_cu_grid->DisplayRecs;
	$frm_sam_rep_ta_form_a_0_cu_grid->StopRec = $frm_sam_rep_ta_form_a_0_cu_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_sam_rep_ta_form_a_0_cu_grid->TotalRecs = $frm_sam_rep_ta_form_a_0_cu->SelectRecordCount();
	} else {
		if ($frm_sam_rep_ta_form_a_0_cu_grid->Recordset = $frm_sam_rep_ta_form_a_0_cu_grid->LoadRecordset())
			$frm_sam_rep_ta_form_a_0_cu_grid->TotalRecs = $frm_sam_rep_ta_form_a_0_cu_grid->Recordset->RecordCount();
	}
	$frm_sam_rep_ta_form_a_0_cu_grid->StartRec = 1;
	$frm_sam_rep_ta_form_a_0_cu_grid->DisplayRecs = $frm_sam_rep_ta_form_a_0_cu_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$frm_sam_rep_ta_form_a_0_cu_grid->Recordset = $frm_sam_rep_ta_form_a_0_cu_grid->LoadRecordset($frm_sam_rep_ta_form_a_0_cu_grid->StartRec-1, $frm_sam_rep_ta_form_a_0_cu_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentMode == "add" || $frm_sam_rep_ta_form_a_0_cu->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($frm_sam_rep_ta_form_a_0_cu->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_rep_ta_form_a_0_cu->TableCaption() ?></p>
</p>
<?php $frm_sam_rep_ta_form_a_0_cu_grid->ShowPageHeader(); ?>
<?php
$frm_sam_rep_ta_form_a_0_cu_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($frm_sam_rep_ta_form_a_0_cu->CurrentMode == "add" || $frm_sam_rep_ta_form_a_0_cu->CurrentMode == "copy" || $frm_sam_rep_ta_form_a_0_cu->CurrentMode == "edit") && $frm_sam_rep_ta_form_a_0_cu->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_frm_sam_rep_ta_form_a_0_cu" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_sam_rep_ta_form_a_0_cu->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_sam_rep_ta_form_a_0_cu_grid->RenderListOptions();

// Render list options (header, left)
$frm_sam_rep_ta_form_a_0_cu_grid->ListOptions->Render("header", "left");
?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CU_Office->Visible) { // CU Office ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->SortUrl($frm_sam_rep_ta_form_a_0_cu->CU_Office) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_ta_form_a_0_cu->CU_Office->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_ta_form_a_0_cu->CU_Office->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->Visible) { // Participating Units Count ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->SortUrl($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count) == "") { ?>
		<td><?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_ta_form_a_0_cu->Target->Visible) { // Target ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->SortUrl($frm_sam_rep_ta_form_a_0_cu->Target) == "") { ?>
		<td><?php echo $frm_sam_rep_ta_form_a_0_cu->Target->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_rep_ta_form_a_0_cu->Target->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_ta_form_a_0_cu->Target->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_ta_form_a_0_cu->Target->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->Visible) { // Numerator (T) ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->SortUrl($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29) == "") { ?>
		<td><?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->Visible) { // Denominator (T) ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->SortUrl($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29) == "") { ?>
		<td><?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_ta_form_a_0_cu->Accomplishment->Visible) { // Accomplishment ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->SortUrl($frm_sam_rep_ta_form_a_0_cu->Accomplishment) == "") { ?>
		<td><?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_ta_form_a_0_cu->Accomplishment->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_ta_form_a_0_cu->Accomplishment->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->Visible) { // Numerator (A) ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->SortUrl($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29) == "") { ?>
		<td><?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->Visible) { // Denominator (A) ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->SortUrl($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29) == "") { ?>
		<td><?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->Visible) { // Supporting Documents Count ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->SortUrl($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count) == "") { ?>
		<td><?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Rating ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->SortUrl($frm_sam_rep_ta_form_a_0_cu->Rating) == "") { ?>
		<td><?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_ta_form_a_0_cu->Rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_sam_rep_ta_form_a_0_cu_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$frm_sam_rep_ta_form_a_0_cu_grid->StartRec = 1;
$frm_sam_rep_ta_form_a_0_cu_grid->StopRec = $frm_sam_rep_ta_form_a_0_cu_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridadd" || $frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridedit" || $frm_sam_rep_ta_form_a_0_cu->CurrentAction == "F")) {
		$frm_sam_rep_ta_form_a_0_cu_grid->KeyCount = $objForm->GetValue("key_count");
		$frm_sam_rep_ta_form_a_0_cu_grid->StopRec = $frm_sam_rep_ta_form_a_0_cu_grid->KeyCount;
	}
}
$frm_sam_rep_ta_form_a_0_cu_grid->RecCnt = $frm_sam_rep_ta_form_a_0_cu_grid->StartRec - 1;
if ($frm_sam_rep_ta_form_a_0_cu_grid->Recordset && !$frm_sam_rep_ta_form_a_0_cu_grid->Recordset->EOF) {
	$frm_sam_rep_ta_form_a_0_cu_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_sam_rep_ta_form_a_0_cu_grid->StartRec > 1)
		$frm_sam_rep_ta_form_a_0_cu_grid->Recordset->Move($frm_sam_rep_ta_form_a_0_cu_grid->StartRec - 1);
} elseif (!$frm_sam_rep_ta_form_a_0_cu->AllowAddDeleteRow && $frm_sam_rep_ta_form_a_0_cu_grid->StopRec == 0) {
	$frm_sam_rep_ta_form_a_0_cu_grid->StopRec = $frm_sam_rep_ta_form_a_0_cu->GridAddRowCount;
}

// Initialize aggregate
$frm_sam_rep_ta_form_a_0_cu->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_sam_rep_ta_form_a_0_cu->ResetAttrs();
$frm_sam_rep_ta_form_a_0_cu_grid->RenderRow();
$frm_sam_rep_ta_form_a_0_cu_grid->RowCnt = 0;
if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridadd")
	$frm_sam_rep_ta_form_a_0_cu_grid->RowIndex = 0;
if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridedit")
	$frm_sam_rep_ta_form_a_0_cu_grid->RowIndex = 0;
while ($frm_sam_rep_ta_form_a_0_cu_grid->RecCnt < $frm_sam_rep_ta_form_a_0_cu_grid->StopRec) {
	$frm_sam_rep_ta_form_a_0_cu_grid->RecCnt++;
	if (intval($frm_sam_rep_ta_form_a_0_cu_grid->RecCnt) >= intval($frm_sam_rep_ta_form_a_0_cu_grid->StartRec)) {
		$frm_sam_rep_ta_form_a_0_cu_grid->RowCnt++;
		if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridadd" || $frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridedit" || $frm_sam_rep_ta_form_a_0_cu->CurrentAction == "F")
			$frm_sam_rep_ta_form_a_0_cu_grid->RowIndex++;

		// Set up key count
		$frm_sam_rep_ta_form_a_0_cu_grid->KeyCount = $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex;

		// Init row class and style
		$frm_sam_rep_ta_form_a_0_cu->ResetAttrs();
		$frm_sam_rep_ta_form_a_0_cu->CssClass = "";
		if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridadd") {
			if ($frm_sam_rep_ta_form_a_0_cu->CurrentMode == "copy") {
				$frm_sam_rep_ta_form_a_0_cu_grid->LoadRowValues($frm_sam_rep_ta_form_a_0_cu_grid->Recordset); // Load row values
				$frm_sam_rep_ta_form_a_0_cu_grid->SetRecordKey($frm_sam_rep_ta_form_a_0_cu_grid->RowOldKey, $frm_sam_rep_ta_form_a_0_cu_grid->Recordset); // Set old record key
			} else {
				$frm_sam_rep_ta_form_a_0_cu_grid->LoadDefaultValues(); // Load default values
				$frm_sam_rep_ta_form_a_0_cu_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridedit") {
			$frm_sam_rep_ta_form_a_0_cu_grid->LoadRowValues($frm_sam_rep_ta_form_a_0_cu_grid->Recordset); // Load row values
		}
		$frm_sam_rep_ta_form_a_0_cu->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridadd") // Grid add
			$frm_sam_rep_ta_form_a_0_cu->RowType = UP_ROWTYPE_ADD; // Render add
		if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridadd" && $frm_sam_rep_ta_form_a_0_cu->EventCancelled) // Insert failed
			$frm_sam_rep_ta_form_a_0_cu_grid->RestoreCurrentRowFormValues($frm_sam_rep_ta_form_a_0_cu_grid->RowIndex); // Restore form values
		if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridedit") { // Grid edit
			if ($frm_sam_rep_ta_form_a_0_cu->EventCancelled) {
				$frm_sam_rep_ta_form_a_0_cu_grid->RestoreCurrentRowFormValues($frm_sam_rep_ta_form_a_0_cu_grid->RowIndex); // Restore form values
			}
			if ($frm_sam_rep_ta_form_a_0_cu_grid->RowAction == "insert")
				$frm_sam_rep_ta_form_a_0_cu->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$frm_sam_rep_ta_form_a_0_cu->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "gridedit" && ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT || $frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) && $frm_sam_rep_ta_form_a_0_cu->EventCancelled) // Update failed
			$frm_sam_rep_ta_form_a_0_cu_grid->RestoreCurrentRowFormValues($frm_sam_rep_ta_form_a_0_cu_grid->RowIndex); // Restore form values
		if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) // Edit row
			$frm_sam_rep_ta_form_a_0_cu_grid->EditRowCnt++;
		if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "F") // Confirm row
			$frm_sam_rep_ta_form_a_0_cu_grid->RestoreCurrentRowFormValues($frm_sam_rep_ta_form_a_0_cu_grid->RowIndex); // Restore form values
		if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD || $frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction == "edit") {
				$frm_sam_rep_ta_form_a_0_cu->RowAttrs = array();
				$frm_sam_rep_ta_form_a_0_cu->CssClass = "upTableEditRow";
			} else {
				$frm_sam_rep_ta_form_a_0_cu->RowAttrs = array();
			}
			if (!empty($frm_sam_rep_ta_form_a_0_cu_grid->RowIndex))
				$frm_sam_rep_ta_form_a_0_cu->RowAttrs = array_merge($frm_sam_rep_ta_form_a_0_cu->RowAttrs, array('data-rowindex'=>$frm_sam_rep_ta_form_a_0_cu_grid->RowIndex, 'id'=>'r' . $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex . '_frm_sam_rep_ta_form_a_0_cu'));
		} else {
			$frm_sam_rep_ta_form_a_0_cu->RowAttrs = array();
		}

		// Render row
		$frm_sam_rep_ta_form_a_0_cu_grid->RenderRow();

		// Render list options
		$frm_sam_rep_ta_form_a_0_cu_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($frm_sam_rep_ta_form_a_0_cu_grid->RowAction <> "delete" && $frm_sam_rep_ta_form_a_0_cu_grid->RowAction <> "insertdelete" && !($frm_sam_rep_ta_form_a_0_cu_grid->RowAction == "insert" && $frm_sam_rep_ta_form_a_0_cu->CurrentAction == "F" && $frm_sam_rep_ta_form_a_0_cu_grid->EmptyRow())) {
?>
	<tr<?php echo $frm_sam_rep_ta_form_a_0_cu->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_sam_rep_ta_form_a_0_cu_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->CU_Office->Visible) { // CU Office ?>
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->CellAttributes() ?>>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" size="30" maxlength="255" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->CU_Office->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" size="30" maxlength="255" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->CU_Office->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->CU_Office->OldValue) ?>">
<?php } ?>
<a name="<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->PageObjName . "_row_" . $frm_sam_rep_ta_form_a_0_cu_grid->RowCnt ?>" id="<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->PageObjName . "_row_" . $frm_sam_rep_ta_form_a_0_cu_grid->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->Visible) { // Participating Units Count ?>
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CellAttributes() ?>>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Target->Visible) { // Target ?>
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Target->CellAttributes() ?>>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Target->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Target->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Target->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Target->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Target->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Target->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Target->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Target->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Target->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->Visible) { // Numerator (T) ?>
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CellAttributes() ?>>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->Visible) { // Denominator (T) ?>
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CellAttributes() ?>>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Accomplishment->Visible) { // Accomplishment ?>
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->CellAttributes() ?>>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Accomplishment->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Accomplishment->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Accomplishment->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->Visible) { // Numerator (A) ?>
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CellAttributes() ?>>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->Visible) { // Denominator (A) ?>
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CellAttributes() ?>>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->Visible) { // Supporting Documents Count ?>
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CellAttributes() ?>>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Rating ?>
		<td<?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->CellAttributes() ?>>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Rating->OldValue) ?>">
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Rating->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" id="o<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Rating->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_sam_rep_ta_form_a_0_cu_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction <> "gridadd" || $frm_sam_rep_ta_form_a_0_cu->CurrentMode == "copy")
		if (!$frm_sam_rep_ta_form_a_0_cu_grid->Recordset->EOF) $frm_sam_rep_ta_form_a_0_cu_grid->Recordset->MoveNext();
}
?>
<?php
	if ($frm_sam_rep_ta_form_a_0_cu->CurrentMode == "add" || $frm_sam_rep_ta_form_a_0_cu->CurrentMode == "copy" || $frm_sam_rep_ta_form_a_0_cu->CurrentMode == "edit") {
		$frm_sam_rep_ta_form_a_0_cu_grid->RowIndex = '$rowindex$';
		$frm_sam_rep_ta_form_a_0_cu_grid->LoadDefaultValues();

		// Set row properties
		$frm_sam_rep_ta_form_a_0_cu->ResetAttrs();
		$frm_sam_rep_ta_form_a_0_cu->RowAttrs = array();
		if (!empty($frm_sam_rep_ta_form_a_0_cu_grid->RowIndex))
			$frm_sam_rep_ta_form_a_0_cu->RowAttrs = array_merge($frm_sam_rep_ta_form_a_0_cu->RowAttrs, array('data-rowindex'=>$frm_sam_rep_ta_form_a_0_cu_grid->RowIndex, 'id'=>'r' . $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex . '_frm_sam_rep_ta_form_a_0_cu'));
		$frm_sam_rep_ta_form_a_0_cu->RowType = UP_ROWTYPE_ADD;

		// Render row
		$frm_sam_rep_ta_form_a_0_cu_grid->RenderRow();

		// Render list options
		$frm_sam_rep_ta_form_a_0_cu_grid->RenderListOptions();

		// Add id and class to the template row
		$frm_sam_rep_ta_form_a_0_cu->RowAttrs["id"] = "r0_frm_sam_rep_ta_form_a_0_cu";
		up_AppendClass($frm_sam_rep_ta_form_a_0_cu->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $frm_sam_rep_ta_form_a_0_cu->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_sam_rep_ta_form_a_0_cu_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->CU_Office->Visible) { // CU Office ?>
		<td>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" size="30" maxlength="255" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->CU_Office->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_CU_Office" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->CU_Office->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->Visible) { // Participating Units Count ?>
		<td>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Participating_Units_Count" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Participating_Units_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Target->Visible) { // Target ?>
		<td>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Target->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Target->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Target->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Target->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Target" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Target->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->Visible) { // Numerator (T) ?>
		<td>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28T29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Numerator_28T29->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->Visible) { // Denominator (T) ?>
		<td>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28T29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Denominator_28T29->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Accomplishment->Visible) { // Accomplishment ?>
		<td>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Accomplishment->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Accomplishment" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Accomplishment->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->Visible) { // Numerator (A) ?>
		<td>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Numerator_28A29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Numerator_28A29->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->Visible) { // Denominator (A) ?>
		<td>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Denominator_28A29" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Denominator_28A29->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->Visible) { // Supporting Documents Count ?>
		<td>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Supporting_Documents_Count" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Supporting_Documents_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_ta_form_a_0_cu->Rating->Visible) { // Rating ?>
		<td>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" size="30" value="<?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->EditValue ?>"<?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->ViewAttributes() ?>><?php echo $frm_sam_rep_ta_form_a_0_cu->Rating->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" id="x<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->RowIndex ?>_Rating" value="<?php echo up_HtmlEncode($frm_sam_rep_ta_form_a_0_cu->Rating->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_sam_rep_ta_form_a_0_cu_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentMode == "add" || $frm_sam_rep_ta_form_a_0_cu->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->KeyCount ?>">
<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($frm_sam_rep_ta_form_a_0_cu->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->KeyCount ?>">
<?php echo $frm_sam_rep_ta_form_a_0_cu_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="frm_sam_rep_ta_form_a_0_cu_grid">
</div>
<?php

// Close recordset
if ($frm_sam_rep_ta_form_a_0_cu_grid->Recordset)
	$frm_sam_rep_ta_form_a_0_cu_grid->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_sam_rep_ta_form_a_0_cu->Export == "" && $frm_sam_rep_ta_form_a_0_cu->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_sam_rep_ta_form_a_0_cu_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$frm_sam_rep_ta_form_a_0_cu_grid->Page_Terminate();
$Page =& $MasterPage;
?>
