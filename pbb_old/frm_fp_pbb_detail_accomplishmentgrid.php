<?php include_once "tbl_usersinfo.php" ?>
<?php

// Create page object
$frm_fp_pbb_detail_accomplishment_grid = new cfrm_fp_pbb_detail_accomplishment_grid();
$MasterPage =& $Page;
$Page =& $frm_fp_pbb_detail_accomplishment_grid;

// Page init
$frm_fp_pbb_detail_accomplishment_grid->Page_Init();

// Page main
$frm_fp_pbb_detail_accomplishment_grid->Page_Main();
?>
<?php if ($frm_fp_pbb_detail_accomplishment->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_pbb_detail_accomplishment_grid = new up_Page("frm_fp_pbb_detail_accomplishment_grid");

// page properties
frm_fp_pbb_detail_accomplishment_grid.PageID = "grid"; // page ID
frm_fp_pbb_detail_accomplishment_grid.FormID = "ffrm_fp_pbb_detail_accomplishmentgrid"; // form ID
var UP_PAGE_ID = frm_fp_pbb_detail_accomplishment_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_fp_pbb_detail_accomplishment_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_a_rating_above_90"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_rating_above_90->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_rating_below_90"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_rating_below_90->FldErrMsg()) ?>");

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
frm_fp_pbb_detail_accomplishment_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "cu_unit_name", false)) return false;
	if (up_ValueChanged(fobj, infix, "mfo_name", false)) return false;
	if (up_ValueChanged(fobj, infix, "target", false)) return false;
	if (up_ValueChanged(fobj, infix, "t_numerator", false)) return false;
	if (up_ValueChanged(fobj, infix, "t_denominator", false)) return false;
	if (up_ValueChanged(fobj, infix, "t_remarks", false)) return false;
	if (up_ValueChanged(fobj, infix, "accomplishment", false)) return false;
	if (up_ValueChanged(fobj, infix, "a_numerator", false)) return false;
	if (up_ValueChanged(fobj, infix, "a_denominator", false)) return false;
	if (up_ValueChanged(fobj, infix, "a_supporting_docs", false)) return false;
	if (up_ValueChanged(fobj, infix, "a_remarks", false)) return false;
	if (up_ValueChanged(fobj, infix, "a_rating_above_90", false)) return false;
	if (up_ValueChanged(fobj, infix, "a_rating_below_90", false)) return false;
	if (up_ValueChanged(fobj, infix, "a_supporting_docs_comparison", false)) return false;
	if (up_ValueChanged(fobj, infix, "a_cutOffDate_remarks", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
frm_fp_pbb_detail_accomplishment_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_pbb_detail_accomplishment_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_pbb_detail_accomplishment_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_pbb_detail_accomplishment_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($frm_fp_pbb_detail_accomplishment->CurrentAction == "gridadd") {
	if ($frm_fp_pbb_detail_accomplishment->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$frm_fp_pbb_detail_accomplishment_grid->TotalRecs = $frm_fp_pbb_detail_accomplishment->SelectRecordCount();
			$frm_fp_pbb_detail_accomplishment_grid->Recordset = $frm_fp_pbb_detail_accomplishment_grid->LoadRecordset($frm_fp_pbb_detail_accomplishment_grid->StartRec-1, $frm_fp_pbb_detail_accomplishment_grid->DisplayRecs);
		} else {
			if ($frm_fp_pbb_detail_accomplishment_grid->Recordset = $frm_fp_pbb_detail_accomplishment_grid->LoadRecordset())
				$frm_fp_pbb_detail_accomplishment_grid->TotalRecs = $frm_fp_pbb_detail_accomplishment_grid->Recordset->RecordCount();
		}
		$frm_fp_pbb_detail_accomplishment_grid->StartRec = 1;
		$frm_fp_pbb_detail_accomplishment_grid->DisplayRecs = $frm_fp_pbb_detail_accomplishment_grid->TotalRecs;
	} else {
		$frm_fp_pbb_detail_accomplishment->CurrentFilter = "0=1";
		$frm_fp_pbb_detail_accomplishment_grid->StartRec = 1;
		$frm_fp_pbb_detail_accomplishment_grid->DisplayRecs = $frm_fp_pbb_detail_accomplishment->GridAddRowCount;
	}
	$frm_fp_pbb_detail_accomplishment_grid->TotalRecs = $frm_fp_pbb_detail_accomplishment_grid->DisplayRecs;
	$frm_fp_pbb_detail_accomplishment_grid->StopRec = $frm_fp_pbb_detail_accomplishment_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_fp_pbb_detail_accomplishment_grid->TotalRecs = $frm_fp_pbb_detail_accomplishment->SelectRecordCount();
	} else {
		if ($frm_fp_pbb_detail_accomplishment_grid->Recordset = $frm_fp_pbb_detail_accomplishment_grid->LoadRecordset())
			$frm_fp_pbb_detail_accomplishment_grid->TotalRecs = $frm_fp_pbb_detail_accomplishment_grid->Recordset->RecordCount();
	}
	$frm_fp_pbb_detail_accomplishment_grid->StartRec = 1;
	$frm_fp_pbb_detail_accomplishment_grid->DisplayRecs = $frm_fp_pbb_detail_accomplishment_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$frm_fp_pbb_detail_accomplishment_grid->Recordset = $frm_fp_pbb_detail_accomplishment_grid->LoadRecordset($frm_fp_pbb_detail_accomplishment_grid->StartRec-1, $frm_fp_pbb_detail_accomplishment_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($frm_fp_pbb_detail_accomplishment->CurrentMode == "add" || $frm_fp_pbb_detail_accomplishment->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($frm_fp_pbb_detail_accomplishment->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_pbb_detail_accomplishment->TableCaption() ?></p>
</p>
<?php $frm_fp_pbb_detail_accomplishment_grid->ShowPageHeader(); ?>
<?php
$frm_fp_pbb_detail_accomplishment_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($frm_fp_pbb_detail_accomplishment->CurrentMode == "add" || $frm_fp_pbb_detail_accomplishment->CurrentMode == "copy" || $frm_fp_pbb_detail_accomplishment->CurrentMode == "edit") && $frm_fp_pbb_detail_accomplishment->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_frm_fp_pbb_detail_accomplishment" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_fp_pbb_detail_accomplishment->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_fp_pbb_detail_accomplishment_grid->RenderListOptions();

// Render list options (header, left)
$frm_fp_pbb_detail_accomplishment_grid->ListOptions->Render("header", "left");
?>
<?php if ($frm_fp_pbb_detail_accomplishment->cu_unit_name->Visible) { // cu_unit_name ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->cu_unit_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->cu_unit_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->cu_unit_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->mfo_name->Visible) { // mfo_name ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->mfo_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->mfo_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->mfo_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->target->Visible) { // target ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->target) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->target->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->target->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->target->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->target->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator->Visible) { // t_numerator ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_numerator) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_numerator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_numerator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator->Visible) { // t_denominator ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_denominator) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_denominator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_denominator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_remarks->Visible) { // t_remarks ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_remarks) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->accomplishment->Visible) { // accomplishment ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->accomplishment) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->accomplishment->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->accomplishment->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator->Visible) { // a_numerator ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_numerator) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_numerator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_numerator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator->Visible) { // a_denominator ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_denominator) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_denominator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_denominator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs->Visible) { // a_supporting_docs ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_supporting_docs->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_remarks->Visible) { // a_remarks ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_remarks) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_rating_above_90->Visible) { // a_rating_above_90 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_rating_above_90) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_rating_above_90->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_rating_above_90->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_rating_below_90->Visible) { // a_rating_below_90 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_rating_below_90) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_rating_below_90->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_rating_below_90->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->Visible) { // a_supporting_docs_comparison ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->Visible) { // a_cutOffDate_remarks ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_fp_pbb_detail_accomplishment_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$frm_fp_pbb_detail_accomplishment_grid->StartRec = 1;
$frm_fp_pbb_detail_accomplishment_grid->StopRec = $frm_fp_pbb_detail_accomplishment_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($frm_fp_pbb_detail_accomplishment->CurrentAction == "gridadd" || $frm_fp_pbb_detail_accomplishment->CurrentAction == "gridedit" || $frm_fp_pbb_detail_accomplishment->CurrentAction == "F")) {
		$frm_fp_pbb_detail_accomplishment_grid->KeyCount = $objForm->GetValue("key_count");
		$frm_fp_pbb_detail_accomplishment_grid->StopRec = $frm_fp_pbb_detail_accomplishment_grid->KeyCount;
	}
}
$frm_fp_pbb_detail_accomplishment_grid->RecCnt = $frm_fp_pbb_detail_accomplishment_grid->StartRec - 1;
if ($frm_fp_pbb_detail_accomplishment_grid->Recordset && !$frm_fp_pbb_detail_accomplishment_grid->Recordset->EOF) {
	$frm_fp_pbb_detail_accomplishment_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_fp_pbb_detail_accomplishment_grid->StartRec > 1)
		$frm_fp_pbb_detail_accomplishment_grid->Recordset->Move($frm_fp_pbb_detail_accomplishment_grid->StartRec - 1);
} elseif (!$frm_fp_pbb_detail_accomplishment->AllowAddDeleteRow && $frm_fp_pbb_detail_accomplishment_grid->StopRec == 0) {
	$frm_fp_pbb_detail_accomplishment_grid->StopRec = $frm_fp_pbb_detail_accomplishment->GridAddRowCount;
}

// Initialize aggregate
$frm_fp_pbb_detail_accomplishment->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_fp_pbb_detail_accomplishment->ResetAttrs();
$frm_fp_pbb_detail_accomplishment_grid->RenderRow();
$frm_fp_pbb_detail_accomplishment_grid->RowCnt = 0;
if ($frm_fp_pbb_detail_accomplishment->CurrentAction == "gridadd")
	$frm_fp_pbb_detail_accomplishment_grid->RowIndex = 0;
if ($frm_fp_pbb_detail_accomplishment->CurrentAction == "gridedit")
	$frm_fp_pbb_detail_accomplishment_grid->RowIndex = 0;
while ($frm_fp_pbb_detail_accomplishment_grid->RecCnt < $frm_fp_pbb_detail_accomplishment_grid->StopRec) {
	$frm_fp_pbb_detail_accomplishment_grid->RecCnt++;
	if (intval($frm_fp_pbb_detail_accomplishment_grid->RecCnt) >= intval($frm_fp_pbb_detail_accomplishment_grid->StartRec)) {
		$frm_fp_pbb_detail_accomplishment_grid->RowCnt++;
		if ($frm_fp_pbb_detail_accomplishment->CurrentAction == "gridadd" || $frm_fp_pbb_detail_accomplishment->CurrentAction == "gridedit" || $frm_fp_pbb_detail_accomplishment->CurrentAction == "F")
			$frm_fp_pbb_detail_accomplishment_grid->RowIndex++;

		// Set up key count
		$frm_fp_pbb_detail_accomplishment_grid->KeyCount = $frm_fp_pbb_detail_accomplishment_grid->RowIndex;

		// Init row class and style
		$frm_fp_pbb_detail_accomplishment->ResetAttrs();
		$frm_fp_pbb_detail_accomplishment->CssClass = "";
		if ($frm_fp_pbb_detail_accomplishment->CurrentAction == "gridadd") {
			if ($frm_fp_pbb_detail_accomplishment->CurrentMode == "copy") {
				$frm_fp_pbb_detail_accomplishment_grid->LoadRowValues($frm_fp_pbb_detail_accomplishment_grid->Recordset); // Load row values
				$frm_fp_pbb_detail_accomplishment_grid->SetRecordKey($frm_fp_pbb_detail_accomplishment_grid->RowOldKey, $frm_fp_pbb_detail_accomplishment_grid->Recordset); // Set old record key
			} else {
				$frm_fp_pbb_detail_accomplishment_grid->LoadDefaultValues(); // Load default values
				$frm_fp_pbb_detail_accomplishment_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($frm_fp_pbb_detail_accomplishment->CurrentAction == "gridedit") {
			$frm_fp_pbb_detail_accomplishment_grid->LoadRowValues($frm_fp_pbb_detail_accomplishment_grid->Recordset); // Load row values
		}
		$frm_fp_pbb_detail_accomplishment->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($frm_fp_pbb_detail_accomplishment->CurrentAction == "gridadd") // Grid add
			$frm_fp_pbb_detail_accomplishment->RowType = UP_ROWTYPE_ADD; // Render add
		if ($frm_fp_pbb_detail_accomplishment->CurrentAction == "gridadd" && $frm_fp_pbb_detail_accomplishment->EventCancelled) // Insert failed
			$frm_fp_pbb_detail_accomplishment_grid->RestoreCurrentRowFormValues($frm_fp_pbb_detail_accomplishment_grid->RowIndex); // Restore form values
		if ($frm_fp_pbb_detail_accomplishment->CurrentAction == "gridedit") { // Grid edit
			if ($frm_fp_pbb_detail_accomplishment->EventCancelled) {
				$frm_fp_pbb_detail_accomplishment_grid->RestoreCurrentRowFormValues($frm_fp_pbb_detail_accomplishment_grid->RowIndex); // Restore form values
			}
			if ($frm_fp_pbb_detail_accomplishment_grid->RowAction == "insert")
				$frm_fp_pbb_detail_accomplishment->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$frm_fp_pbb_detail_accomplishment->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($frm_fp_pbb_detail_accomplishment->CurrentAction == "gridedit" && ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT || $frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) && $frm_fp_pbb_detail_accomplishment->EventCancelled) // Update failed
			$frm_fp_pbb_detail_accomplishment_grid->RestoreCurrentRowFormValues($frm_fp_pbb_detail_accomplishment_grid->RowIndex); // Restore form values
		if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) // Edit row
			$frm_fp_pbb_detail_accomplishment_grid->EditRowCnt++;
		if ($frm_fp_pbb_detail_accomplishment->CurrentAction == "F") // Confirm row
			$frm_fp_pbb_detail_accomplishment_grid->RestoreCurrentRowFormValues($frm_fp_pbb_detail_accomplishment_grid->RowIndex); // Restore form values
		if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD || $frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($frm_fp_pbb_detail_accomplishment->CurrentAction == "edit") {
				$frm_fp_pbb_detail_accomplishment->RowAttrs = array();
				$frm_fp_pbb_detail_accomplishment->CssClass = "upTableEditRow";
			} else {
				$frm_fp_pbb_detail_accomplishment->RowAttrs = array();
			}
			if (!empty($frm_fp_pbb_detail_accomplishment_grid->RowIndex))
				$frm_fp_pbb_detail_accomplishment->RowAttrs = array_merge($frm_fp_pbb_detail_accomplishment->RowAttrs, array('data-rowindex'=>$frm_fp_pbb_detail_accomplishment_grid->RowIndex, 'id'=>'r' . $frm_fp_pbb_detail_accomplishment_grid->RowIndex . '_frm_fp_pbb_detail_accomplishment'));
		} else {
			$frm_fp_pbb_detail_accomplishment->RowAttrs = array();
		}

		// Render row
		$frm_fp_pbb_detail_accomplishment_grid->RenderRow();

		// Render list options
		$frm_fp_pbb_detail_accomplishment_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($frm_fp_pbb_detail_accomplishment_grid->RowAction <> "delete" && $frm_fp_pbb_detail_accomplishment_grid->RowAction <> "insertdelete" && !($frm_fp_pbb_detail_accomplishment_grid->RowAction == "insert" && $frm_fp_pbb_detail_accomplishment->CurrentAction == "F" && $frm_fp_pbb_detail_accomplishment_grid->EmptyRow())) {
?>
	<tr<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_pbb_detail_accomplishment_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_pbb_detail_accomplishment->cu_unit_name->Visible) { // cu_unit_name ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->cu_unit_name->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->cu_unit_name->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->cu_unit_name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->cu_unit_name->OldValue) ?>">
<?php } ?>
<a name="<?php echo $frm_fp_pbb_detail_accomplishment_grid->PageObjName . "_row_" . $frm_fp_pbb_detail_accomplishment_grid->RowCnt ?>" id="<?php echo $frm_fp_pbb_detail_accomplishment_grid->PageObjName . "_row_" . $frm_fp_pbb_detail_accomplishment_grid->RowCnt ?>"></a>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_pbb_id" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_pbb_id" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->pbb_id->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { ?>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_pbb_id" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_pbb_id" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->pbb_id->CurrentValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->mfo_name->Visible) { // mfo_name ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->mfo_name->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->mfo_name->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->mfo_name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->mfo_name->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->target->Visible) { // target ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->target->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->target->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->target->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->target->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->target->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->target->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->target->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->target->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->target->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->target->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->target->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator->Visible) { // t_numerator ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator->Visible) { // t_denominator ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_remarks->Visible) { // t_remarks ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_remarks->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_remarks->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_remarks->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_remarks->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->accomplishment->Visible) { // accomplishment ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->accomplishment->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->accomplishment->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->accomplishment->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->accomplishment->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator->Visible) { // a_numerator ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_numerator->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_numerator->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_numerator->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_numerator->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator->Visible) { // a_denominator ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_denominator->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_denominator->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_denominator->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_denominator->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs->Visible) { // a_supporting_docs ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_remarks->Visible) { // a_remarks ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_remarks->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_remarks->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_remarks->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_rating_above_90->Visible) { // a_rating_above_90 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_rating_above_90->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_rating_above_90->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_rating_above_90->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_rating_below_90->Visible) { // a_rating_below_90 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_rating_below_90->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_rating_below_90->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_rating_below_90->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->Visible) { // a_supporting_docs_comparison ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->Visible) { // a_cutOffDate_remarks ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CellAttributes() ?>>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->OldValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->EditValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CurrentValue) ?>">
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" id="o<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_pbb_detail_accomplishment_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "gridadd" || $frm_fp_pbb_detail_accomplishment->CurrentMode == "copy")
		if (!$frm_fp_pbb_detail_accomplishment_grid->Recordset->EOF) $frm_fp_pbb_detail_accomplishment_grid->Recordset->MoveNext();
}
?>
<?php
	if ($frm_fp_pbb_detail_accomplishment->CurrentMode == "add" || $frm_fp_pbb_detail_accomplishment->CurrentMode == "copy" || $frm_fp_pbb_detail_accomplishment->CurrentMode == "edit") {
		$frm_fp_pbb_detail_accomplishment_grid->RowIndex = '$rowindex$';
		$frm_fp_pbb_detail_accomplishment_grid->LoadDefaultValues();

		// Set row properties
		$frm_fp_pbb_detail_accomplishment->ResetAttrs();
		$frm_fp_pbb_detail_accomplishment->RowAttrs = array();
		if (!empty($frm_fp_pbb_detail_accomplishment_grid->RowIndex))
			$frm_fp_pbb_detail_accomplishment->RowAttrs = array_merge($frm_fp_pbb_detail_accomplishment->RowAttrs, array('data-rowindex'=>$frm_fp_pbb_detail_accomplishment_grid->RowIndex, 'id'=>'r' . $frm_fp_pbb_detail_accomplishment_grid->RowIndex . '_frm_fp_pbb_detail_accomplishment'));
		$frm_fp_pbb_detail_accomplishment->RowType = UP_ROWTYPE_ADD;

		// Render row
		$frm_fp_pbb_detail_accomplishment_grid->RenderRow();

		// Render list options
		$frm_fp_pbb_detail_accomplishment_grid->RenderListOptions();

		// Add id and class to the template row
		$frm_fp_pbb_detail_accomplishment->RowAttrs["id"] = "r0_frm_fp_pbb_detail_accomplishment";
		up_AppendClass($frm_fp_pbb_detail_accomplishment->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_pbb_detail_accomplishment_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_pbb_detail_accomplishment->cu_unit_name->Visible) { // cu_unit_name ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->cu_unit_name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->mfo_name->Visible) { // mfo_name ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_mfo_name" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->mfo_name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->target->Visible) { // target ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->target->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->target->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->target->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->target->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_target" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->target->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator->Visible) { // t_numerator ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_numerator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator->Visible) { // t_denominator ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_denominator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_remarks->Visible) { // t_remarks ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_t_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_remarks->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->accomplishment->Visible) { // accomplishment ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_accomplishment" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->accomplishment->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator->Visible) { // a_numerator ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_numerator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_numerator->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator->Visible) { // a_denominator ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_denominator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_denominator->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs->Visible) { // a_supporting_docs ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_remarks->Visible) { // a_remarks ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_remarks->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_rating_above_90->Visible) { // a_rating_above_90 ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_above_90" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_rating_above_90->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_rating_below_90->Visible) { // a_rating_below_90 ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_rating_below_90" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_rating_below_90->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->Visible) { // a_supporting_docs_comparison ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_supporting_docs_comparison" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->Visible) { // a_cutOffDate_remarks ?>
		<td>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" id="x<?php echo $frm_fp_pbb_detail_accomplishment_grid->RowIndex ?>_a_cutOffDate_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_pbb_detail_accomplishment_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentMode == "add" || $frm_fp_pbb_detail_accomplishment->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_fp_pbb_detail_accomplishment_grid->KeyCount ?>">
<?php echo $frm_fp_pbb_detail_accomplishment_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_fp_pbb_detail_accomplishment_grid->KeyCount ?>">
<?php echo $frm_fp_pbb_detail_accomplishment_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="frm_fp_pbb_detail_accomplishment_grid">
</div>
<?php

// Close recordset
if ($frm_fp_pbb_detail_accomplishment_grid->Recordset)
	$frm_fp_pbb_detail_accomplishment_grid->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_fp_pbb_detail_accomplishment->Export == "" && $frm_fp_pbb_detail_accomplishment->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_fp_pbb_detail_accomplishment_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$frm_fp_pbb_detail_accomplishment_grid->Page_Terminate();
$Page =& $MasterPage;
?>
