<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$tbl_profile_grid = new ctbl_profile_grid();
$MasterPage =& $Page;
$Page =& $tbl_profile_grid;

// Page init
$tbl_profile_grid->Page_Init();

// Page main
$tbl_profile_grid->Page_Main();
?>
<?php if ($tbl_profile->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_profile_grid = new up_Page("tbl_profile_grid");

// page properties
tbl_profile_grid.PageID = "grid"; // page ID
tbl_profile_grid.FormID = "ftbl_profilegrid"; // form ID
var UP_PAGE_ID = tbl_profile_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_profile_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_faculty_name"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($tbl_profile->faculty_name->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalHrs_basic"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_totalHrs_basic->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalSCH_basic"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_totalSCH_basic->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalCr_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_totalCr_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalHrs_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_totalHrs_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalSCH_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_totalSCH_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalCr_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_totalCr_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalHrs_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_totalHrs_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalSCH_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_totalSCH_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_total_nonTeachingLoad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_total_nonTeachingLoad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalWorkloadInCreditUnits_gen"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->FldErrMsg()) ?>");

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
tbl_profile_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "faculty_name", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyGroup_CHEDCode", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyRank_ID", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_tenureCode", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_leaveCode", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_specificDiscipline_1_primaryTeachingLoad", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_totalHrs_basic", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_totalSCH_basic", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_totalCr_ugrad", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_totalHrs_ugrad", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_totalSCH_ugrad", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_totalCr_graduate", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_totalHrs_graduate", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_totalSCH_graduate", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_total_nonTeachingLoad", false)) return false;
	if (up_ValueChanged(fobj, infix, "facultyprofile_totalWorkloadInCreditUnits_gen", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
tbl_profile_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_profile_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_profile_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_profile_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($tbl_profile->CurrentAction == "gridadd") {
	if ($tbl_profile->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$tbl_profile_grid->TotalRecs = $tbl_profile->SelectRecordCount();
			$tbl_profile_grid->Recordset = $tbl_profile_grid->LoadRecordset($tbl_profile_grid->StartRec-1, $tbl_profile_grid->DisplayRecs);
		} else {
			if ($tbl_profile_grid->Recordset = $tbl_profile_grid->LoadRecordset())
				$tbl_profile_grid->TotalRecs = $tbl_profile_grid->Recordset->RecordCount();
		}
		$tbl_profile_grid->StartRec = 1;
		$tbl_profile_grid->DisplayRecs = $tbl_profile_grid->TotalRecs;
	} else {
		$tbl_profile->CurrentFilter = "0=1";
		$tbl_profile_grid->StartRec = 1;
		$tbl_profile_grid->DisplayRecs = $tbl_profile->GridAddRowCount;
	}
	$tbl_profile_grid->TotalRecs = $tbl_profile_grid->DisplayRecs;
	$tbl_profile_grid->StopRec = $tbl_profile_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_profile_grid->TotalRecs = $tbl_profile->SelectRecordCount();
	} else {
		if ($tbl_profile_grid->Recordset = $tbl_profile_grid->LoadRecordset())
			$tbl_profile_grid->TotalRecs = $tbl_profile_grid->Recordset->RecordCount();
	}
	$tbl_profile_grid->StartRec = 1;
	$tbl_profile_grid->DisplayRecs = $tbl_profile_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$tbl_profile_grid->Recordset = $tbl_profile_grid->LoadRecordset($tbl_profile_grid->StartRec-1, $tbl_profile_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($tbl_profile->CurrentMode == "add" || $tbl_profile->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($tbl_profile->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_profile->TableCaption() ?></p>
</p>
<?php $tbl_profile_grid->ShowPageHeader(); ?>
<?php
$tbl_profile_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($tbl_profile->CurrentMode == "add" || $tbl_profile->CurrentMode == "copy" || $tbl_profile->CurrentMode == "edit") && $tbl_profile->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
<?php if ($tbl_profile->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><img src='phpimages/addblankrow.gif' alt='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' title='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' width='16' height='16' border='0'></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
<div id="gmp_tbl_profile" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_profile->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_profile_grid->RenderListOptions();

// Render list options (header, left)
$tbl_profile_grid->ListOptions->Render("header", "left");
?>
<?php if ($tbl_profile->faculty_name->Visible) { // faculty_name ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->faculty_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->faculty_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->faculty_name->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->faculty_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->faculty_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyGroup_CHEDCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyGroup_CHEDCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyGroup_CHEDCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyGroup_CHEDCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyGroup_CHEDCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyRank_ID->Visible) { // facultyRank_ID ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyRank_ID) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyRank_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyRank_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyRank_ID->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyRank_ID->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_tenureCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_tenureCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_tenureCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_tenureCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_tenureCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_leaveCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_leaveCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_leaveCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_leaveCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_leaveCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalHrs_basic->Visible) { // facultyprofile_totalHrs_basic ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalHrs_basic) == "") { ?>
		<td><?php echo $tbl_profile->facultyprofile_totalHrs_basic->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalHrs_basic->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalHrs_basic->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalHrs_basic->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalSCH_basic->Visible) { // facultyprofile_totalSCH_basic ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalSCH_basic) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalSCH_basic->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalSCH_basic->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalSCH_basic->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalSCH_basic->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalCr_ugrad->Visible) { // facultyprofile_totalCr_ugrad ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalCr_ugrad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalCr_ugrad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalCr_ugrad->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalCr_ugrad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalCr_ugrad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalHrs_ugrad->Visible) { // facultyprofile_totalHrs_ugrad ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalHrs_ugrad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalHrs_ugrad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalHrs_ugrad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalSCH_ugrad->Visible) { // facultyprofile_totalSCH_ugrad ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalSCH_ugrad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalSCH_ugrad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalSCH_ugrad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalCr_graduate->Visible) { // facultyprofile_totalCr_graduate ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalCr_graduate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalCr_graduate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalCr_graduate->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalCr_graduate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalCr_graduate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalHrs_graduate->Visible) { // facultyprofile_totalHrs_graduate ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalHrs_graduate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalHrs_graduate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalHrs_graduate->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalHrs_graduate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalHrs_graduate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalSCH_graduate->Visible) { // facultyprofile_totalSCH_graduate ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalSCH_graduate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalSCH_graduate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalSCH_graduate->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalSCH_graduate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalSCH_graduate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_total_nonTeachingLoad->Visible) { // facultyprofile_total_nonTeachingLoad ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_total_nonTeachingLoad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_total_nonTeachingLoad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_total_nonTeachingLoad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_profile_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$tbl_profile_grid->StartRec = 1;
$tbl_profile_grid->StopRec = $tbl_profile_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($tbl_profile->CurrentAction == "gridadd" || $tbl_profile->CurrentAction == "gridedit" || $tbl_profile->CurrentAction == "F")) {
		$tbl_profile_grid->KeyCount = $objForm->GetValue("key_count");
		$tbl_profile_grid->StopRec = $tbl_profile_grid->KeyCount;
	}
}
$tbl_profile_grid->RecCnt = $tbl_profile_grid->StartRec - 1;
if ($tbl_profile_grid->Recordset && !$tbl_profile_grid->Recordset->EOF) {
	$tbl_profile_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_profile_grid->StartRec > 1)
		$tbl_profile_grid->Recordset->Move($tbl_profile_grid->StartRec - 1);
} elseif (!$tbl_profile->AllowAddDeleteRow && $tbl_profile_grid->StopRec == 0) {
	$tbl_profile_grid->StopRec = $tbl_profile->GridAddRowCount;
}

// Initialize aggregate
$tbl_profile->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_profile->ResetAttrs();
$tbl_profile_grid->RenderRow();
$tbl_profile_grid->RowCnt = 0;
if ($tbl_profile->CurrentAction == "gridadd")
	$tbl_profile_grid->RowIndex = 0;
if ($tbl_profile->CurrentAction == "gridedit")
	$tbl_profile_grid->RowIndex = 0;
while ($tbl_profile_grid->RecCnt < $tbl_profile_grid->StopRec) {
	$tbl_profile_grid->RecCnt++;
	if (intval($tbl_profile_grid->RecCnt) >= intval($tbl_profile_grid->StartRec)) {
		$tbl_profile_grid->RowCnt++;
		if ($tbl_profile->CurrentAction == "gridadd" || $tbl_profile->CurrentAction == "gridedit" || $tbl_profile->CurrentAction == "F")
			$tbl_profile_grid->RowIndex++;

		// Set up key count
		$tbl_profile_grid->KeyCount = $tbl_profile_grid->RowIndex;

		// Init row class and style
		$tbl_profile->ResetAttrs();
		$tbl_profile->CssClass = "";
		if ($tbl_profile->CurrentAction == "gridadd") {
			if ($tbl_profile->CurrentMode == "copy") {
				$tbl_profile_grid->LoadRowValues($tbl_profile_grid->Recordset); // Load row values
				$tbl_profile_grid->SetRecordKey($tbl_profile_grid->RowOldKey, $tbl_profile_grid->Recordset); // Set old record key
			} else {
				$tbl_profile_grid->LoadDefaultValues(); // Load default values
				$tbl_profile_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($tbl_profile->CurrentAction == "gridedit") {
			$tbl_profile_grid->LoadRowValues($tbl_profile_grid->Recordset); // Load row values
		}
		$tbl_profile->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($tbl_profile->CurrentAction == "gridadd") // Grid add
			$tbl_profile->RowType = UP_ROWTYPE_ADD; // Render add
		if ($tbl_profile->CurrentAction == "gridadd" && $tbl_profile->EventCancelled) // Insert failed
			$tbl_profile_grid->RestoreCurrentRowFormValues($tbl_profile_grid->RowIndex); // Restore form values
		if ($tbl_profile->CurrentAction == "gridedit") { // Grid edit
			if ($tbl_profile->EventCancelled) {
				$tbl_profile_grid->RestoreCurrentRowFormValues($tbl_profile_grid->RowIndex); // Restore form values
			}
			if ($tbl_profile_grid->RowAction == "insert")
				$tbl_profile->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$tbl_profile->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($tbl_profile->CurrentAction == "gridedit" && ($tbl_profile->RowType == UP_ROWTYPE_EDIT || $tbl_profile->RowType == UP_ROWTYPE_ADD) && $tbl_profile->EventCancelled) // Update failed
			$tbl_profile_grid->RestoreCurrentRowFormValues($tbl_profile_grid->RowIndex); // Restore form values
		if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) // Edit row
			$tbl_profile_grid->EditRowCnt++;
		if ($tbl_profile->CurrentAction == "F") // Confirm row
			$tbl_profile_grid->RestoreCurrentRowFormValues($tbl_profile_grid->RowIndex); // Restore form values
		if ($tbl_profile->RowType == UP_ROWTYPE_ADD || $tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($tbl_profile->CurrentAction == "edit") {
				$tbl_profile->RowAttrs = array();
				$tbl_profile->CssClass = "upTableEditRow";
			} else {
				$tbl_profile->RowAttrs = array();
			}
			if (!empty($tbl_profile_grid->RowIndex))
				$tbl_profile->RowAttrs = array_merge($tbl_profile->RowAttrs, array('data-rowindex'=>$tbl_profile_grid->RowIndex, 'id'=>'r' . $tbl_profile_grid->RowIndex . '_tbl_profile'));
		} else {
			$tbl_profile->RowAttrs = array();
		}

		// Render row
		$tbl_profile_grid->RenderRow();

		// Render list options
		$tbl_profile_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($tbl_profile_grid->RowAction <> "delete" && $tbl_profile_grid->RowAction <> "insertdelete" && !($tbl_profile_grid->RowAction == "insert" && $tbl_profile->CurrentAction == "F" && $tbl_profile_grid->EmptyRow())) {
?>
	<tr<?php echo $tbl_profile->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_profile_grid->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_profile->faculty_name->Visible) { // faculty_name ?>
		<td<?php echo $tbl_profile->faculty_name->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" id="x<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" size="30" maxlength="255" value="<?php echo $tbl_profile->faculty_name->EditValue ?>"<?php echo $tbl_profile->faculty_name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" id="o<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" value="<?php echo up_HtmlEncode($tbl_profile->faculty_name->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" id="x<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" size="30" maxlength="255" value="<?php echo $tbl_profile->faculty_name->EditValue ?>"<?php echo $tbl_profile->faculty_name->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->faculty_name->ViewAttributes() ?>><?php echo $tbl_profile->faculty_name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" id="x<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" value="<?php echo up_HtmlEncode($tbl_profile->faculty_name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" id="o<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" value="<?php echo up_HtmlEncode($tbl_profile->faculty_name->OldValue) ?>">
<?php } ?>
<a name="<?php echo $tbl_profile_grid->PageObjName . "_row_" . $tbl_profile_grid->RowCnt ?>" id="<?php echo $tbl_profile_grid->PageObjName . "_row_" . $tbl_profile_grid->RowCnt ?>"></a>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_ID" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_ID" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_ID->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_ID" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_ID" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_ID->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
		<td<?php echo $tbl_profile->facultyGroup_CHEDCode->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode"<?php echo $tbl_profile->facultyGroup_CHEDCode->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyGroup_CHEDCode->EditValue)) {
	$arwrk = $tbl_profile->facultyGroup_CHEDCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyGroup_CHEDCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyGroup_CHEDCode->OldValue = "";
?>
</select>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode" value="<?php echo up_HtmlEncode($tbl_profile->facultyGroup_CHEDCode->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode"<?php echo $tbl_profile->facultyGroup_CHEDCode->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyGroup_CHEDCode->EditValue)) {
	$arwrk = $tbl_profile->facultyGroup_CHEDCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyGroup_CHEDCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyGroup_CHEDCode->OldValue = "";
?>
</select>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyGroup_CHEDCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyGroup_CHEDCode->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode" value="<?php echo up_HtmlEncode($tbl_profile->facultyGroup_CHEDCode->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode" value="<?php echo up_HtmlEncode($tbl_profile->facultyGroup_CHEDCode->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyRank_ID->Visible) { // facultyRank_ID ?>
		<td<?php echo $tbl_profile->facultyRank_ID->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID"<?php echo $tbl_profile->facultyRank_ID->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyRank_ID->EditValue)) {
	$arwrk = $tbl_profile->facultyRank_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyRank_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyRank_ID->OldValue = "";
?>
</select>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID" value="<?php echo up_HtmlEncode($tbl_profile->facultyRank_ID->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID"<?php echo $tbl_profile->facultyRank_ID->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyRank_ID->EditValue)) {
	$arwrk = $tbl_profile->facultyRank_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyRank_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyRank_ID->OldValue = "";
?>
</select>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyRank_ID->ViewAttributes() ?>><?php echo $tbl_profile->facultyRank_ID->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID" value="<?php echo up_HtmlEncode($tbl_profile->facultyRank_ID->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID" value="<?php echo up_HtmlEncode($tbl_profile->facultyRank_ID->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
		<td<?php echo $tbl_profile->facultyprofile_tenureCode->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode"<?php echo $tbl_profile->facultyprofile_tenureCode->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_tenureCode->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_tenureCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_tenureCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyprofile_tenureCode->OldValue = "";
?>
</select>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_tenureCode->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode"<?php echo $tbl_profile->facultyprofile_tenureCode->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_tenureCode->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_tenureCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_tenureCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyprofile_tenureCode->OldValue = "";
?>
</select>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_tenureCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_tenureCode->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_tenureCode->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_tenureCode->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
		<td<?php echo $tbl_profile->facultyprofile_leaveCode->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode"<?php echo $tbl_profile->facultyprofile_leaveCode->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_leaveCode->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_leaveCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_leaveCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyprofile_leaveCode->OldValue = "";
?>
</select>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_leaveCode->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode"<?php echo $tbl_profile->facultyprofile_leaveCode->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_leaveCode->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_leaveCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_leaveCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyprofile_leaveCode->OldValue = "";
?>
</select>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_leaveCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_leaveCode->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_leaveCode->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_leaveCode->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
		<td<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad"<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->OldValue = "";
?>
</select>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad"<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->OldValue = "";
?>
</select>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalHrs_basic->Visible) { // facultyprofile_totalHrs_basic ?>
		<td<?php echo $tbl_profile->facultyprofile_totalHrs_basic->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" size="30" value="<?php echo $tbl_profile->facultyprofile_totalHrs_basic->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalHrs_basic->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_basic->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" size="30" value="<?php echo $tbl_profile->facultyprofile_totalHrs_basic->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalHrs_basic->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_basic->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_basic->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_basic->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_basic->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalSCH_basic->Visible) { // facultyprofile_totalSCH_basic ?>
		<td<?php echo $tbl_profile->facultyprofile_totalSCH_basic->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" size="30" value="<?php echo $tbl_profile->facultyprofile_totalSCH_basic->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalSCH_basic->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_basic->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" size="30" value="<?php echo $tbl_profile->facultyprofile_totalSCH_basic->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalSCH_basic->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_basic->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_basic->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_basic->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_basic->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalCr_ugrad->Visible) { // facultyprofile_totalCr_ugrad ?>
		<td<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalCr_ugrad->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalCr_ugrad->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalCr_ugrad->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalHrs_ugrad->Visible) { // facultyprofile_totalHrs_ugrad ?>
		<td<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_ugrad->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_ugrad->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalSCH_ugrad->Visible) { // facultyprofile_totalSCH_ugrad ?>
		<td<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_ugrad->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_ugrad->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalCr_graduate->Visible) { // facultyprofile_totalCr_graduate ?>
		<td<?php echo $tbl_profile->facultyprofile_totalCr_graduate->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_totalCr_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalCr_graduate->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalCr_graduate->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_totalCr_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalCr_graduate->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_totalCr_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalCr_graduate->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalCr_graduate->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalCr_graduate->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalHrs_graduate->Visible) { // facultyprofile_totalHrs_graduate ?>
		<td<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_graduate->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_graduate->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_graduate->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalSCH_graduate->Visible) { // facultyprofile_totalSCH_graduate ?>
		<td<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_graduate->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_graduate->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_graduate->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_total_nonTeachingLoad->Visible) { // facultyprofile_total_nonTeachingLoad ?>
		<td<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" size="30" value="<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_total_nonTeachingLoad->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" size="30" value="<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_total_nonTeachingLoad->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
		<td<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CellAttributes() ?>>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" size="30" value="<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->OldValue) ?>">
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" size="30" value="<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->EditAttributes() ?>>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="o<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_profile_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($tbl_profile->CurrentAction <> "gridadd" || $tbl_profile->CurrentMode == "copy")
		if (!$tbl_profile_grid->Recordset->EOF) $tbl_profile_grid->Recordset->MoveNext();
}
?>
<?php
	if ($tbl_profile->CurrentMode == "add" || $tbl_profile->CurrentMode == "copy" || $tbl_profile->CurrentMode == "edit") {
		$tbl_profile_grid->RowIndex = '$rowindex$';
		$tbl_profile_grid->LoadDefaultValues();

		// Set row properties
		$tbl_profile->ResetAttrs();
		$tbl_profile->RowAttrs = array();
		if (!empty($tbl_profile_grid->RowIndex))
			$tbl_profile->RowAttrs = array_merge($tbl_profile->RowAttrs, array('data-rowindex'=>$tbl_profile_grid->RowIndex, 'id'=>'r' . $tbl_profile_grid->RowIndex . '_tbl_profile'));
		$tbl_profile->RowType = UP_ROWTYPE_ADD;

		// Render row
		$tbl_profile_grid->RenderRow();

		// Render list options
		$tbl_profile_grid->RenderListOptions();

		// Add id and class to the template row
		$tbl_profile->RowAttrs["id"] = "r0_tbl_profile";
		up_AppendClass($tbl_profile->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $tbl_profile->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_profile_grid->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_profile->faculty_name->Visible) { // faculty_name ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" id="x<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" size="30" maxlength="255" value="<?php echo $tbl_profile->faculty_name->EditValue ?>"<?php echo $tbl_profile->faculty_name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_profile->faculty_name->ViewAttributes() ?>><?php echo $tbl_profile->faculty_name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" id="x<?php echo $tbl_profile_grid->RowIndex ?>_faculty_name" value="<?php echo up_HtmlEncode($tbl_profile->faculty_name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode"<?php echo $tbl_profile->facultyGroup_CHEDCode->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyGroup_CHEDCode->EditValue)) {
	$arwrk = $tbl_profile->facultyGroup_CHEDCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyGroup_CHEDCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyGroup_CHEDCode->OldValue = "";
?>
</select>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyGroup_CHEDCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyGroup_CHEDCode->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyGroup_CHEDCode" value="<?php echo up_HtmlEncode($tbl_profile->facultyGroup_CHEDCode->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyRank_ID->Visible) { // facultyRank_ID ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID"<?php echo $tbl_profile->facultyRank_ID->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyRank_ID->EditValue)) {
	$arwrk = $tbl_profile->facultyRank_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyRank_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyRank_ID->OldValue = "";
?>
</select>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyRank_ID->ViewAttributes() ?>><?php echo $tbl_profile->facultyRank_ID->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyRank_ID" value="<?php echo up_HtmlEncode($tbl_profile->facultyRank_ID->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode"<?php echo $tbl_profile->facultyprofile_tenureCode->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_tenureCode->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_tenureCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_tenureCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyprofile_tenureCode->OldValue = "";
?>
</select>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_tenureCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_tenureCode->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_tenureCode" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_tenureCode->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode"<?php echo $tbl_profile->facultyprofile_leaveCode->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_leaveCode->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_leaveCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_leaveCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyprofile_leaveCode->OldValue = "";
?>
</select>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_leaveCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_leaveCode->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_leaveCode" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_leaveCode->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<select id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad"<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->OldValue = "";
?>
</select>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalHrs_basic->Visible) { // facultyprofile_totalHrs_basic ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" size="30" value="<?php echo $tbl_profile->facultyprofile_totalHrs_basic->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalHrs_basic->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_basic->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_basic->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_basic" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_basic->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalSCH_basic->Visible) { // facultyprofile_totalSCH_basic ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" size="30" value="<?php echo $tbl_profile->facultyprofile_totalSCH_basic->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalSCH_basic->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_basic->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_basic->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_basic" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_basic->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalCr_ugrad->Visible) { // facultyprofile_totalCr_ugrad ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalCr_ugrad->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalCr_ugrad->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalHrs_ugrad->Visible) { // facultyprofile_totalHrs_ugrad ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_ugrad->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalSCH_ugrad->Visible) { // facultyprofile_totalSCH_ugrad ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_ugrad->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalCr_graduate->Visible) { // facultyprofile_totalCr_graduate ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_totalCr_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalCr_graduate->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_totalCr_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalCr_graduate->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalCr_graduate" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalCr_graduate->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalHrs_graduate->Visible) { // facultyprofile_totalHrs_graduate ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_graduate->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalHrs_graduate->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalSCH_graduate->Visible) { // facultyprofile_totalSCH_graduate ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_graduate->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalSCH_graduate->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_total_nonTeachingLoad->Visible) { // facultyprofile_total_nonTeachingLoad ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" size="30" value="<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_total_nonTeachingLoad->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
		<td>
<?php if ($tbl_profile->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" size="30" value="<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->EditValue ?>"<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewValue ?></div>
<input type="hidden" name="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="x<?php echo $tbl_profile_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_profile_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($tbl_profile->CurrentMode == "add" || $tbl_profile->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $tbl_profile_grid->KeyCount ?>">
<?php echo $tbl_profile_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($tbl_profile->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $tbl_profile_grid->KeyCount ?>">
<?php echo $tbl_profile_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="tbl_profile_grid">
</div>
<?php

// Close recordset
if ($tbl_profile_grid->Recordset)
	$tbl_profile_grid->Recordset->Close();
?>
<?php if (($tbl_profile->CurrentMode == "add" || $tbl_profile->CurrentMode == "copy" || $tbl_profile->CurrentMode == "edit") && $tbl_profile->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridLowerPanel">
<?php if ($tbl_profile->AllowAddDeleteRow) { ?>
<?php if ($Security->CanAdd()) { ?>
<span class="upbudgetofficeclass">
<a href="javascript:void(0);" onclick="up_AddGridRow(this);"><img src='phpimages/addblankrow.gif' alt='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' title='<?php echo up_HtmlEncode($Language->Phrase("AddBlankRow")) ?>' width='16' height='16' border='0'></a>&nbsp;&nbsp;
</span>
<?php } ?>
<?php } ?>
</div>
<?php } ?>
</td></tr></table>
<?php if ($tbl_profile->Export == "" && $tbl_profile->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_profile_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$tbl_profile_grid->Page_Terminate();
$Page =& $MasterPage;
?>
