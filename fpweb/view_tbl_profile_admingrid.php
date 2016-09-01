<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$view_tbl_profile_admin_grid = new cview_tbl_profile_admin_grid();
$MasterPage =& $Page;
$Page =& $view_tbl_profile_admin_grid;

// Page init
$view_tbl_profile_admin_grid->Page_Init();

// Page main
$view_tbl_profile_admin_grid->Page_Main();
?>
<?php if ($view_tbl_profile_admin->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var view_tbl_profile_admin_grid = new up_Page("view_tbl_profile_admin_grid");

// page properties
view_tbl_profile_admin_grid.PageID = "grid"; // page ID
view_tbl_profile_admin_grid.FormID = "fview_tbl_profile_admingrid"; // form ID
var UP_PAGE_ID = view_tbl_profile_admin_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
view_tbl_profile_admin_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_facultyprofile_specificDiscipline_1_primaryTeachingLoad"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalHrs_basic"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_profile_admin->facultyprofile_totalHrs_basic->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalSCH_basic"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_profile_admin->facultyprofile_totalSCH_basic->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalCr_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalHrs_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalSCH_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalCr_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_profile_admin->facultyprofile_totalCr_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalHrs_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalSCH_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_total_nonTeachingLoad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_totalWorkloadInCreditUnits_gen"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->FldErrMsg()) ?>");

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
view_tbl_profile_admin_grid.EmptyRow = function(fobj, infix) {
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
view_tbl_profile_admin_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
view_tbl_profile_admin_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
view_tbl_profile_admin_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
view_tbl_profile_admin_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($view_tbl_profile_admin->CurrentAction == "gridadd") {
	if ($view_tbl_profile_admin->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$view_tbl_profile_admin_grid->TotalRecs = $view_tbl_profile_admin->SelectRecordCount();
			$view_tbl_profile_admin_grid->Recordset = $view_tbl_profile_admin_grid->LoadRecordset($view_tbl_profile_admin_grid->StartRec-1, $view_tbl_profile_admin_grid->DisplayRecs);
		} else {
			if ($view_tbl_profile_admin_grid->Recordset = $view_tbl_profile_admin_grid->LoadRecordset())
				$view_tbl_profile_admin_grid->TotalRecs = $view_tbl_profile_admin_grid->Recordset->RecordCount();
		}
		$view_tbl_profile_admin_grid->StartRec = 1;
		$view_tbl_profile_admin_grid->DisplayRecs = $view_tbl_profile_admin_grid->TotalRecs;
	} else {
		$view_tbl_profile_admin->CurrentFilter = "0=1";
		$view_tbl_profile_admin_grid->StartRec = 1;
		$view_tbl_profile_admin_grid->DisplayRecs = $view_tbl_profile_admin->GridAddRowCount;
	}
	$view_tbl_profile_admin_grid->TotalRecs = $view_tbl_profile_admin_grid->DisplayRecs;
	$view_tbl_profile_admin_grid->StopRec = $view_tbl_profile_admin_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$view_tbl_profile_admin_grid->TotalRecs = $view_tbl_profile_admin->SelectRecordCount();
	} else {
		if ($view_tbl_profile_admin_grid->Recordset = $view_tbl_profile_admin_grid->LoadRecordset())
			$view_tbl_profile_admin_grid->TotalRecs = $view_tbl_profile_admin_grid->Recordset->RecordCount();
	}
	$view_tbl_profile_admin_grid->StartRec = 1;
	$view_tbl_profile_admin_grid->DisplayRecs = $view_tbl_profile_admin_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$view_tbl_profile_admin_grid->Recordset = $view_tbl_profile_admin_grid->LoadRecordset($view_tbl_profile_admin_grid->StartRec-1, $view_tbl_profile_admin_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($view_tbl_profile_admin->CurrentMode == "add" || $view_tbl_profile_admin->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($view_tbl_profile_admin->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $view_tbl_profile_admin->TableCaption() ?></p>
</p>
<?php $view_tbl_profile_admin_grid->ShowPageHeader(); ?>
<?php
$view_tbl_profile_admin_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($view_tbl_profile_admin->CurrentMode == "add" || $view_tbl_profile_admin->CurrentMode == "copy" || $view_tbl_profile_admin->CurrentMode == "edit") && $view_tbl_profile_admin->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_view_tbl_profile_admin" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $view_tbl_profile_admin->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$view_tbl_profile_admin_grid->RenderListOptions();

// Render list options (header, left)
$view_tbl_profile_admin_grid->ListOptions->Render("header", "left");
?>
<?php if ($view_tbl_profile_admin->faculty_name->Visible) { // faculty_name ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->faculty_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->faculty_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->faculty_name->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->faculty_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->faculty_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyGroup_CHEDCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyGroup_CHEDCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyGroup_CHEDCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyRank_ID->Visible) { // facultyRank_ID ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyRank_ID) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyRank_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyRank_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyRank_ID->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyRank_ID->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_tenureCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_tenureCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_tenureCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_leaveCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_leaveCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_leaveCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_basic->Visible) { // facultyprofile_totalHrs_basic ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalHrs_basic) == "") { ?>
		<td><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_basic->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalHrs_basic->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_basic->Visible) { // facultyprofile_totalSCH_basic ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalSCH_basic) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_basic->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalSCH_basic->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->Visible) { // facultyprofile_totalCr_ugrad ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalCr_ugrad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->Visible) { // facultyprofile_totalHrs_ugrad ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->Visible) { // facultyprofile_totalSCH_ugrad ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalCr_graduate->Visible) { // facultyprofile_totalCr_graduate ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalCr_graduate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalCr_graduate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalCr_graduate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->Visible) { // facultyprofile_totalHrs_graduate ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalHrs_graduate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->Visible) { // facultyprofile_totalSCH_graduate ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalSCH_graduate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->Visible) { // facultyprofile_total_nonTeachingLoad ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$view_tbl_profile_admin_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$view_tbl_profile_admin_grid->StartRec = 1;
$view_tbl_profile_admin_grid->StopRec = $view_tbl_profile_admin_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($view_tbl_profile_admin->CurrentAction == "gridadd" || $view_tbl_profile_admin->CurrentAction == "gridedit" || $view_tbl_profile_admin->CurrentAction == "F")) {
		$view_tbl_profile_admin_grid->KeyCount = $objForm->GetValue("key_count");
		$view_tbl_profile_admin_grid->StopRec = $view_tbl_profile_admin_grid->KeyCount;
	}
}
$view_tbl_profile_admin_grid->RecCnt = $view_tbl_profile_admin_grid->StartRec - 1;
if ($view_tbl_profile_admin_grid->Recordset && !$view_tbl_profile_admin_grid->Recordset->EOF) {
	$view_tbl_profile_admin_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $view_tbl_profile_admin_grid->StartRec > 1)
		$view_tbl_profile_admin_grid->Recordset->Move($view_tbl_profile_admin_grid->StartRec - 1);
} elseif (!$view_tbl_profile_admin->AllowAddDeleteRow && $view_tbl_profile_admin_grid->StopRec == 0) {
	$view_tbl_profile_admin_grid->StopRec = $view_tbl_profile_admin->GridAddRowCount;
}

// Initialize aggregate
$view_tbl_profile_admin->RowType = UP_ROWTYPE_AGGREGATEINIT;
$view_tbl_profile_admin->ResetAttrs();
$view_tbl_profile_admin_grid->RenderRow();
$view_tbl_profile_admin_grid->RowCnt = 0;
if ($view_tbl_profile_admin->CurrentAction == "gridadd")
	$view_tbl_profile_admin_grid->RowIndex = 0;
if ($view_tbl_profile_admin->CurrentAction == "gridedit")
	$view_tbl_profile_admin_grid->RowIndex = 0;
while ($view_tbl_profile_admin_grid->RecCnt < $view_tbl_profile_admin_grid->StopRec) {
	$view_tbl_profile_admin_grid->RecCnt++;
	if (intval($view_tbl_profile_admin_grid->RecCnt) >= intval($view_tbl_profile_admin_grid->StartRec)) {
		$view_tbl_profile_admin_grid->RowCnt++;
		if ($view_tbl_profile_admin->CurrentAction == "gridadd" || $view_tbl_profile_admin->CurrentAction == "gridedit" || $view_tbl_profile_admin->CurrentAction == "F")
			$view_tbl_profile_admin_grid->RowIndex++;

		// Set up key count
		$view_tbl_profile_admin_grid->KeyCount = $view_tbl_profile_admin_grid->RowIndex;

		// Init row class and style
		$view_tbl_profile_admin->ResetAttrs();
		$view_tbl_profile_admin->CssClass = "";
		if ($view_tbl_profile_admin->CurrentAction == "gridadd") {
			if ($view_tbl_profile_admin->CurrentMode == "copy") {
				$view_tbl_profile_admin_grid->LoadRowValues($view_tbl_profile_admin_grid->Recordset); // Load row values
				$view_tbl_profile_admin_grid->SetRecordKey($view_tbl_profile_admin_grid->RowOldKey, $view_tbl_profile_admin_grid->Recordset); // Set old record key
			} else {
				$view_tbl_profile_admin_grid->LoadDefaultValues(); // Load default values
				$view_tbl_profile_admin_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($view_tbl_profile_admin->CurrentAction == "gridedit") {
			$view_tbl_profile_admin_grid->LoadRowValues($view_tbl_profile_admin_grid->Recordset); // Load row values
		}
		$view_tbl_profile_admin->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($view_tbl_profile_admin->CurrentAction == "gridadd") // Grid add
			$view_tbl_profile_admin->RowType = UP_ROWTYPE_ADD; // Render add
		if ($view_tbl_profile_admin->CurrentAction == "gridadd" && $view_tbl_profile_admin->EventCancelled) // Insert failed
			$view_tbl_profile_admin_grid->RestoreCurrentRowFormValues($view_tbl_profile_admin_grid->RowIndex); // Restore form values
		if ($view_tbl_profile_admin->CurrentAction == "gridedit") { // Grid edit
			if ($view_tbl_profile_admin->EventCancelled) {
				$view_tbl_profile_admin_grid->RestoreCurrentRowFormValues($view_tbl_profile_admin_grid->RowIndex); // Restore form values
			}
			if ($view_tbl_profile_admin_grid->RowAction == "insert")
				$view_tbl_profile_admin->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$view_tbl_profile_admin->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($view_tbl_profile_admin->CurrentAction == "gridedit" && ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT || $view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) && $view_tbl_profile_admin->EventCancelled) // Update failed
			$view_tbl_profile_admin_grid->RestoreCurrentRowFormValues($view_tbl_profile_admin_grid->RowIndex); // Restore form values
		if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) // Edit row
			$view_tbl_profile_admin_grid->EditRowCnt++;
		if ($view_tbl_profile_admin->CurrentAction == "F") // Confirm row
			$view_tbl_profile_admin_grid->RestoreCurrentRowFormValues($view_tbl_profile_admin_grid->RowIndex); // Restore form values
		if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD || $view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($view_tbl_profile_admin->CurrentAction == "edit") {
				$view_tbl_profile_admin->RowAttrs = array();
				$view_tbl_profile_admin->CssClass = "upTableEditRow";
			} else {
				$view_tbl_profile_admin->RowAttrs = array();
			}
			if (!empty($view_tbl_profile_admin_grid->RowIndex))
				$view_tbl_profile_admin->RowAttrs = array_merge($view_tbl_profile_admin->RowAttrs, array('data-rowindex'=>$view_tbl_profile_admin_grid->RowIndex, 'id'=>'r' . $view_tbl_profile_admin_grid->RowIndex . '_view_tbl_profile_admin'));
		} else {
			$view_tbl_profile_admin->RowAttrs = array();
		}

		// Render row
		$view_tbl_profile_admin_grid->RenderRow();

		// Render list options
		$view_tbl_profile_admin_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($view_tbl_profile_admin_grid->RowAction <> "delete" && $view_tbl_profile_admin_grid->RowAction <> "insertdelete" && !($view_tbl_profile_admin_grid->RowAction == "insert" && $view_tbl_profile_admin->CurrentAction == "F" && $view_tbl_profile_admin_grid->EmptyRow())) {
?>
	<tr<?php echo $view_tbl_profile_admin->RowAttributes() ?>>
<?php

// Render list options (body, left)
$view_tbl_profile_admin_grid->ListOptions->Render("body", "left");
?>
	<?php if ($view_tbl_profile_admin->faculty_name->Visible) { // faculty_name ?>
		<td<?php echo $view_tbl_profile_admin->faculty_name->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" size="30" maxlength="255" value="<?php echo $view_tbl_profile_admin->faculty_name->EditValue ?>"<?php echo $view_tbl_profile_admin->faculty_name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->faculty_name->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" size="30" maxlength="255" value="<?php echo $view_tbl_profile_admin->faculty_name->EditValue ?>"<?php echo $view_tbl_profile_admin->faculty_name->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->faculty_name->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->faculty_name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->faculty_name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->faculty_name->OldValue) ?>">
<?php } ?>
<a name="<?php echo $view_tbl_profile_admin_grid->PageObjName . "_row_" . $view_tbl_profile_admin_grid->RowCnt ?>" id="<?php echo $view_tbl_profile_admin_grid->PageObjName . "_row_" . $view_tbl_profile_admin_grid->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
		<td<?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<select id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode"<?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->EditAttributes() ?>>
<?php
if (is_array($view_tbl_profile_admin->facultyGroup_CHEDCode->EditValue)) {
	$arwrk = $view_tbl_profile_admin->facultyGroup_CHEDCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $view_tbl_profile_admin->facultyGroup_CHEDCode->OldValue = "";
?>
</select>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyGroup_CHEDCode->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<select id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode"<?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->EditAttributes() ?>>
<?php
if (is_array($view_tbl_profile_admin->facultyGroup_CHEDCode->EditValue)) {
	$arwrk = $view_tbl_profile_admin->facultyGroup_CHEDCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $view_tbl_profile_admin->facultyGroup_CHEDCode->OldValue = "";
?>
</select>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyGroup_CHEDCode->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyRank_ID->Visible) { // facultyRank_ID ?>
		<td<?php echo $view_tbl_profile_admin->facultyRank_ID->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<select id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID"<?php echo $view_tbl_profile_admin->facultyRank_ID->EditAttributes() ?>>
<?php
if (is_array($view_tbl_profile_admin->facultyRank_ID->EditValue)) {
	$arwrk = $view_tbl_profile_admin->facultyRank_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_profile_admin->facultyRank_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $view_tbl_profile_admin->facultyRank_ID->OldValue = "";
?>
</select>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyRank_ID->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<select id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID"<?php echo $view_tbl_profile_admin->facultyRank_ID->EditAttributes() ?>>
<?php
if (is_array($view_tbl_profile_admin->facultyRank_ID->EditValue)) {
	$arwrk = $view_tbl_profile_admin->facultyRank_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_profile_admin->facultyRank_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $view_tbl_profile_admin->facultyRank_ID->OldValue = "";
?>
</select>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyRank_ID->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyRank_ID->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyRank_ID->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyRank_ID->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<select id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode"<?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->EditAttributes() ?>>
<?php
if (is_array($view_tbl_profile_admin->facultyprofile_tenureCode->EditValue)) {
	$arwrk = $view_tbl_profile_admin->facultyprofile_tenureCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $view_tbl_profile_admin->facultyprofile_tenureCode->OldValue = "";
?>
</select>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_tenureCode->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<select id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode"<?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->EditAttributes() ?>>
<?php
if (is_array($view_tbl_profile_admin->facultyprofile_tenureCode->EditValue)) {
	$arwrk = $view_tbl_profile_admin->facultyprofile_tenureCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $view_tbl_profile_admin->facultyprofile_tenureCode->OldValue = "";
?>
</select>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_tenureCode->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<select id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode"<?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->EditAttributes() ?>>
<?php
if (is_array($view_tbl_profile_admin->facultyprofile_leaveCode->EditValue)) {
	$arwrk = $view_tbl_profile_admin->facultyprofile_leaveCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $view_tbl_profile_admin->facultyprofile_leaveCode->OldValue = "";
?>
</select>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_leaveCode->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<select id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode"<?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->EditAttributes() ?>>
<?php
if (is_array($view_tbl_profile_admin->facultyprofile_leaveCode->EditValue)) {
	$arwrk = $view_tbl_profile_admin->facultyprofile_leaveCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $view_tbl_profile_admin->facultyprofile_leaveCode->OldValue = "";
?>
</select>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_leaveCode->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_basic->Visible) { // facultyprofile_totalHrs_basic ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_basic->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_basic->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_basic->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_basic->Visible) { // facultyprofile_totalSCH_basic ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_basic->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_basic->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_basic->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->Visible) { // facultyprofile_totalCr_ugrad ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->Visible) { // facultyprofile_totalHrs_ugrad ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->Visible) { // facultyprofile_totalSCH_ugrad ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalCr_graduate->Visible) { // facultyprofile_totalCr_graduate ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalCr_graduate->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalCr_graduate->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalCr_graduate->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->Visible) { // facultyprofile_totalHrs_graduate ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->Visible) { // facultyprofile_totalSCH_graduate ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->Visible) { // facultyprofile_total_nonTeachingLoad ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CellAttributes() ?>>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->OldValue) ?>">
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->EditAttributes() ?>>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="o<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_tbl_profile_admin_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($view_tbl_profile_admin->CurrentAction <> "gridadd" || $view_tbl_profile_admin->CurrentMode == "copy")
		if (!$view_tbl_profile_admin_grid->Recordset->EOF) $view_tbl_profile_admin_grid->Recordset->MoveNext();
}
?>
<?php
	if ($view_tbl_profile_admin->CurrentMode == "add" || $view_tbl_profile_admin->CurrentMode == "copy" || $view_tbl_profile_admin->CurrentMode == "edit") {
		$view_tbl_profile_admin_grid->RowIndex = '$rowindex$';
		$view_tbl_profile_admin_grid->LoadDefaultValues();

		// Set row properties
		$view_tbl_profile_admin->ResetAttrs();
		$view_tbl_profile_admin->RowAttrs = array();
		if (!empty($view_tbl_profile_admin_grid->RowIndex))
			$view_tbl_profile_admin->RowAttrs = array_merge($view_tbl_profile_admin->RowAttrs, array('data-rowindex'=>$view_tbl_profile_admin_grid->RowIndex, 'id'=>'r' . $view_tbl_profile_admin_grid->RowIndex . '_view_tbl_profile_admin'));
		$view_tbl_profile_admin->RowType = UP_ROWTYPE_ADD;

		// Render row
		$view_tbl_profile_admin_grid->RenderRow();

		// Render list options
		$view_tbl_profile_admin_grid->RenderListOptions();

		// Add id and class to the template row
		$view_tbl_profile_admin->RowAttrs["id"] = "r0_view_tbl_profile_admin";
		up_AppendClass($view_tbl_profile_admin->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $view_tbl_profile_admin->RowAttributes() ?>>
<?php

// Render list options (body, left)
$view_tbl_profile_admin_grid->ListOptions->Render("body", "left");
?>
	<?php if ($view_tbl_profile_admin->faculty_name->Visible) { // faculty_name ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" size="30" maxlength="255" value="<?php echo $view_tbl_profile_admin->faculty_name->EditValue ?>"<?php echo $view_tbl_profile_admin->faculty_name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->faculty_name->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->faculty_name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_faculty_name" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->faculty_name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<select id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode"<?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->EditAttributes() ?>>
<?php
if (is_array($view_tbl_profile_admin->facultyGroup_CHEDCode->EditValue)) {
	$arwrk = $view_tbl_profile_admin->facultyGroup_CHEDCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $view_tbl_profile_admin->facultyGroup_CHEDCode->OldValue = "";
?>
</select>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyGroup_CHEDCode" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyGroup_CHEDCode->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyRank_ID->Visible) { // facultyRank_ID ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<select id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID"<?php echo $view_tbl_profile_admin->facultyRank_ID->EditAttributes() ?>>
<?php
if (is_array($view_tbl_profile_admin->facultyRank_ID->EditValue)) {
	$arwrk = $view_tbl_profile_admin->facultyRank_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_profile_admin->facultyRank_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $view_tbl_profile_admin->facultyRank_ID->OldValue = "";
?>
</select>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyRank_ID->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyRank_ID->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyRank_ID" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyRank_ID->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<select id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode"<?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->EditAttributes() ?>>
<?php
if (is_array($view_tbl_profile_admin->facultyprofile_tenureCode->EditValue)) {
	$arwrk = $view_tbl_profile_admin->facultyprofile_tenureCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $view_tbl_profile_admin->facultyprofile_tenureCode->OldValue = "";
?>
</select>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_tenureCode" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_tenureCode->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<select id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode"<?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->EditAttributes() ?>>
<?php
if (is_array($view_tbl_profile_admin->facultyprofile_leaveCode->EditValue)) {
	$arwrk = $view_tbl_profile_admin->facultyprofile_leaveCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
if (@$emptywrk) $view_tbl_profile_admin->facultyprofile_leaveCode->OldValue = "";
?>
</select>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_leaveCode" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_leaveCode->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_specificDiscipline_1_primaryTeachingLoad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_basic->Visible) { // facultyprofile_totalHrs_basic ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_basic" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_basic->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_basic->Visible) { // facultyprofile_totalSCH_basic ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_basic" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_basic->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->Visible) { // facultyprofile_totalCr_ugrad ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_ugrad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->Visible) { // facultyprofile_totalHrs_ugrad ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_ugrad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->Visible) { // facultyprofile_totalSCH_ugrad ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_ugrad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalCr_graduate->Visible) { // facultyprofile_totalCr_graduate ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalCr_graduate" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalCr_graduate->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->Visible) { // facultyprofile_totalHrs_graduate ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalHrs_graduate" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->Visible) { // facultyprofile_totalSCH_graduate ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalSCH_graduate" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->Visible) { // facultyprofile_total_nonTeachingLoad ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_total_nonTeachingLoad" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
		<td>
<?php if ($view_tbl_profile_admin->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" size="30" value="<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->EditValue ?>"<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ViewValue ?></div>
<input type="hidden" name="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" id="x<?php echo $view_tbl_profile_admin_grid->RowIndex ?>_facultyprofile_totalWorkloadInCreditUnits_gen" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_tbl_profile_admin_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($view_tbl_profile_admin->CurrentMode == "add" || $view_tbl_profile_admin->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $view_tbl_profile_admin_grid->KeyCount ?>">
<?php echo $view_tbl_profile_admin_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($view_tbl_profile_admin->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $view_tbl_profile_admin_grid->KeyCount ?>">
<?php echo $view_tbl_profile_admin_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="view_tbl_profile_admin_grid">
</div>
<?php

// Close recordset
if ($view_tbl_profile_admin_grid->Recordset)
	$view_tbl_profile_admin_grid->Recordset->Close();
?>
<?php if (($view_tbl_profile_admin->CurrentMode == "add" || $view_tbl_profile_admin->CurrentMode == "copy" || $view_tbl_profile_admin->CurrentMode == "edit") && $view_tbl_profile_admin->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridLowerPanel">
</div>
<?php } ?>
</td></tr></table>
<?php if ($view_tbl_profile_admin->Export == "" && $view_tbl_profile_admin->CurrentAction == "") { ?>
<?php } ?>
<?php
$view_tbl_profile_admin_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$view_tbl_profile_admin_grid->Page_Terminate();
$Page =& $MasterPage;
?>
