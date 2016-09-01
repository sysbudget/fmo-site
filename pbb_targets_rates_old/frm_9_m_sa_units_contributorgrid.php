<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php

// Create page object
$frm_9_m_sa_units_contributor_grid = new cfrm_9_m_sa_units_contributor_grid();
$MasterPage =& $Page;
$Page =& $frm_9_m_sa_units_contributor_grid;

// Page init
$frm_9_m_sa_units_contributor_grid->Page_Init();

// Page main
$frm_9_m_sa_units_contributor_grid->Page_Main();
?>
<?php if ($frm_9_m_sa_units_contributor->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_9_m_sa_units_contributor_grid = new up_Page("frm_9_m_sa_units_contributor_grid");

// page properties
frm_9_m_sa_units_contributor_grid.PageID = "grid"; // page ID
frm_9_m_sa_units_contributor_grid.FormID = "ffrm_9_m_sa_units_contributorgrid"; // form ID
var UP_PAGE_ID = frm_9_m_sa_units_contributor_grid.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_9_m_sa_units_contributor_grid.ValidateForm = function(fobj) {
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
		elm = fobj.elements["x" + infix + "_Personnel_Count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_units_contributor->Personnel_Count->FldErrMsg()) ?>");

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
frm_9_m_sa_units_contributor_grid.EmptyRow = function(fobj, infix) {
	if (up_ValueChanged(fobj, infix, "CU", false)) return false;
	if (up_ValueChanged(fobj, infix, "DU_Office_Name", false)) return false;
	if (up_ValueChanged(fobj, infix, "ConU_Office_Name", false)) return false;
	if (up_ValueChanged(fobj, infix, "ConU_Short_Name", false)) return false;
	if (up_ValueChanged(fobj, infix, "Personnel_Count", false)) return false;
	if (up_ValueChanged(fobj, infix, "MFO_1", false)) return false;
	if (up_ValueChanged(fobj, infix, "MFO_2", false)) return false;
	if (up_ValueChanged(fobj, infix, "MFO_3", false)) return false;
	if (up_ValueChanged(fobj, infix, "MFO_4", false)) return false;
	if (up_ValueChanged(fobj, infix, "MFO_5", false)) return false;
	if (up_ValueChanged(fobj, infix, "STO", false)) return false;
	if (up_ValueChanged(fobj, infix, "GASS_AB", false)) return false;
	if (up_ValueChanged(fobj, infix, "GASS_CD", false)) return false;
	if (up_ValueChanged(fobj, infix, "GASS", false)) return false;
	return true;
}

// extend page with Form_CustomValidate function
frm_9_m_sa_units_contributor_grid.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_9_m_sa_units_contributor_grid.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_9_m_sa_units_contributor_grid.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_9_m_sa_units_contributor_grid.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<?php } ?>
<?php
if ($frm_9_m_sa_units_contributor->CurrentAction == "gridadd") {
	if ($frm_9_m_sa_units_contributor->CurrentMode == "copy") {
		$bSelectLimit = UP_SELECT_LIMIT;
		if ($bSelectLimit) {
			$frm_9_m_sa_units_contributor_grid->TotalRecs = $frm_9_m_sa_units_contributor->SelectRecordCount();
			$frm_9_m_sa_units_contributor_grid->Recordset = $frm_9_m_sa_units_contributor_grid->LoadRecordset($frm_9_m_sa_units_contributor_grid->StartRec-1, $frm_9_m_sa_units_contributor_grid->DisplayRecs);
		} else {
			if ($frm_9_m_sa_units_contributor_grid->Recordset = $frm_9_m_sa_units_contributor_grid->LoadRecordset())
				$frm_9_m_sa_units_contributor_grid->TotalRecs = $frm_9_m_sa_units_contributor_grid->Recordset->RecordCount();
		}
		$frm_9_m_sa_units_contributor_grid->StartRec = 1;
		$frm_9_m_sa_units_contributor_grid->DisplayRecs = $frm_9_m_sa_units_contributor_grid->TotalRecs;
	} else {
		$frm_9_m_sa_units_contributor->CurrentFilter = "0=1";
		$frm_9_m_sa_units_contributor_grid->StartRec = 1;
		$frm_9_m_sa_units_contributor_grid->DisplayRecs = $frm_9_m_sa_units_contributor->GridAddRowCount;
	}
	$frm_9_m_sa_units_contributor_grid->TotalRecs = $frm_9_m_sa_units_contributor_grid->DisplayRecs;
	$frm_9_m_sa_units_contributor_grid->StopRec = $frm_9_m_sa_units_contributor_grid->DisplayRecs;
} else {
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_9_m_sa_units_contributor_grid->TotalRecs = $frm_9_m_sa_units_contributor->SelectRecordCount();
	} else {
		if ($frm_9_m_sa_units_contributor_grid->Recordset = $frm_9_m_sa_units_contributor_grid->LoadRecordset())
			$frm_9_m_sa_units_contributor_grid->TotalRecs = $frm_9_m_sa_units_contributor_grid->Recordset->RecordCount();
	}
	$frm_9_m_sa_units_contributor_grid->StartRec = 1;
	$frm_9_m_sa_units_contributor_grid->DisplayRecs = $frm_9_m_sa_units_contributor_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$frm_9_m_sa_units_contributor_grid->Recordset = $frm_9_m_sa_units_contributor_grid->LoadRecordset($frm_9_m_sa_units_contributor_grid->StartRec-1, $frm_9_m_sa_units_contributor_grid->DisplayRecs);
}
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php if ($frm_9_m_sa_units_contributor->CurrentMode == "add" || $frm_9_m_sa_units_contributor->CurrentMode == "copy") { ?><?php echo $Language->Phrase("Add") ?><?php } elseif ($frm_9_m_sa_units_contributor->CurrentMode == "edit") { ?><?php echo $Language->Phrase("Edit") ?><?php } ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_9_m_sa_units_contributor->TableCaption() ?></p>
</p>
<?php $frm_9_m_sa_units_contributor_grid->ShowPageHeader(); ?>
<?php
$frm_9_m_sa_units_contributor_grid->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if (($frm_9_m_sa_units_contributor->CurrentMode == "add" || $frm_9_m_sa_units_contributor->CurrentMode == "copy" || $frm_9_m_sa_units_contributor->CurrentMode == "edit") && $frm_9_m_sa_units_contributor->CurrentAction != "F") { // add/copy/edit mode ?>
<div class="upGridUpperPanel">
</div>
<?php } ?>
<div id="gmp_frm_9_m_sa_units_contributor" class="upGridMiddlePanel">
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_9_m_sa_units_contributor->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_9_m_sa_units_contributor_grid->RenderListOptions();

// Render list options (header, left)
$frm_9_m_sa_units_contributor_grid->ListOptions->Render("header", "left");
?>
<?php if ($frm_9_m_sa_units_contributor->CU->Visible) { // CU ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->CU) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->CU->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->CU->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->CU->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->CU->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->DU_Office_Name->Visible) { // DU Office Name ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->DU_Office_Name) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->DU_Office_Name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->DU_Office_Name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->ConU_Office_Name->Visible) { // ConU Office Name ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->ConU_Office_Name) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->ConU_Office_Name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->ConU_Office_Name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->ConU_Short_Name->Visible) { // ConU Short Name ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->ConU_Short_Name) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->ConU_Short_Name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->ConU_Short_Name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->Personnel_Count->Visible) { // Personnel Count ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->Personnel_Count) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->Personnel_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->Personnel_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->Personnel_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->Personnel_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->MFO_1->Visible) { // MFO 1 ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_1) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->MFO_1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->MFO_1->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->MFO_1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->MFO_1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->MFO_2->Visible) { // MFO 2 ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_2) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->MFO_2->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->MFO_2->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->MFO_2->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->MFO_2->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->MFO_3->Visible) { // MFO 3 ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_3) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->MFO_3->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->MFO_3->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->MFO_3->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->MFO_3->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->MFO_4->Visible) { // MFO 4 ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_4) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->MFO_4->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->MFO_4->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->MFO_4->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->MFO_4->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->MFO_5->Visible) { // MFO 5 ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_5) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->MFO_5->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->MFO_5->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->MFO_5->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->MFO_5->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->STO->Visible) { // STO ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->STO) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->STO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->STO->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->STO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->STO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->GASS_AB->Visible) { // GASS AB ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->GASS_AB) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->GASS_AB->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->GASS_AB->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->GASS_AB->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->GASS_AB->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->GASS_CD->Visible) { // GASS CD ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->GASS_CD) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->GASS_CD->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->GASS_CD->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->GASS_CD->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->GASS_CD->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->GASS->Visible) { // GASS ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->GASS) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->GASS->FldCaption() ?></td>
	<?php } else { ?>
		<td><div>
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->GASS->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->GASS->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->GASS->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_9_m_sa_units_contributor_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
$frm_9_m_sa_units_contributor_grid->StartRec = 1;
$frm_9_m_sa_units_contributor_grid->StopRec = $frm_9_m_sa_units_contributor_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = 0;
	if ($objForm->HasValue("key_count") && ($frm_9_m_sa_units_contributor->CurrentAction == "gridadd" || $frm_9_m_sa_units_contributor->CurrentAction == "gridedit" || $frm_9_m_sa_units_contributor->CurrentAction == "F")) {
		$frm_9_m_sa_units_contributor_grid->KeyCount = $objForm->GetValue("key_count");
		$frm_9_m_sa_units_contributor_grid->StopRec = $frm_9_m_sa_units_contributor_grid->KeyCount;
	}
}
$frm_9_m_sa_units_contributor_grid->RecCnt = $frm_9_m_sa_units_contributor_grid->StartRec - 1;
if ($frm_9_m_sa_units_contributor_grid->Recordset && !$frm_9_m_sa_units_contributor_grid->Recordset->EOF) {
	$frm_9_m_sa_units_contributor_grid->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_9_m_sa_units_contributor_grid->StartRec > 1)
		$frm_9_m_sa_units_contributor_grid->Recordset->Move($frm_9_m_sa_units_contributor_grid->StartRec - 1);
} elseif (!$frm_9_m_sa_units_contributor->AllowAddDeleteRow && $frm_9_m_sa_units_contributor_grid->StopRec == 0) {
	$frm_9_m_sa_units_contributor_grid->StopRec = $frm_9_m_sa_units_contributor->GridAddRowCount;
}

// Initialize aggregate
$frm_9_m_sa_units_contributor->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_9_m_sa_units_contributor->ResetAttrs();
$frm_9_m_sa_units_contributor_grid->RenderRow();
$frm_9_m_sa_units_contributor_grid->RowCnt = 0;
if ($frm_9_m_sa_units_contributor->CurrentAction == "gridadd")
	$frm_9_m_sa_units_contributor_grid->RowIndex = 0;
if ($frm_9_m_sa_units_contributor->CurrentAction == "gridedit")
	$frm_9_m_sa_units_contributor_grid->RowIndex = 0;
while ($frm_9_m_sa_units_contributor_grid->RecCnt < $frm_9_m_sa_units_contributor_grid->StopRec) {
	$frm_9_m_sa_units_contributor_grid->RecCnt++;
	if (intval($frm_9_m_sa_units_contributor_grid->RecCnt) >= intval($frm_9_m_sa_units_contributor_grid->StartRec)) {
		$frm_9_m_sa_units_contributor_grid->RowCnt++;
		if ($frm_9_m_sa_units_contributor->CurrentAction == "gridadd" || $frm_9_m_sa_units_contributor->CurrentAction == "gridedit" || $frm_9_m_sa_units_contributor->CurrentAction == "F")
			$frm_9_m_sa_units_contributor_grid->RowIndex++;

		// Set up key count
		$frm_9_m_sa_units_contributor_grid->KeyCount = $frm_9_m_sa_units_contributor_grid->RowIndex;

		// Init row class and style
		$frm_9_m_sa_units_contributor->ResetAttrs();
		$frm_9_m_sa_units_contributor->CssClass = "";
		if ($frm_9_m_sa_units_contributor->CurrentAction == "gridadd") {
			if ($frm_9_m_sa_units_contributor->CurrentMode == "copy") {
				$frm_9_m_sa_units_contributor_grid->LoadRowValues($frm_9_m_sa_units_contributor_grid->Recordset); // Load row values
				$frm_9_m_sa_units_contributor_grid->SetRecordKey($frm_9_m_sa_units_contributor_grid->RowOldKey, $frm_9_m_sa_units_contributor_grid->Recordset); // Set old record key
			} else {
				$frm_9_m_sa_units_contributor_grid->LoadDefaultValues(); // Load default values
				$frm_9_m_sa_units_contributor_grid->RowOldKey = ""; // Clear old key value
			}
		} elseif ($frm_9_m_sa_units_contributor->CurrentAction == "gridedit") {
			$frm_9_m_sa_units_contributor_grid->LoadRowValues($frm_9_m_sa_units_contributor_grid->Recordset); // Load row values
		}
		$frm_9_m_sa_units_contributor->RowType = UP_ROWTYPE_VIEW; // Render view
		if ($frm_9_m_sa_units_contributor->CurrentAction == "gridadd") // Grid add
			$frm_9_m_sa_units_contributor->RowType = UP_ROWTYPE_ADD; // Render add
		if ($frm_9_m_sa_units_contributor->CurrentAction == "gridadd" && $frm_9_m_sa_units_contributor->EventCancelled) // Insert failed
			$frm_9_m_sa_units_contributor_grid->RestoreCurrentRowFormValues($frm_9_m_sa_units_contributor_grid->RowIndex); // Restore form values
		if ($frm_9_m_sa_units_contributor->CurrentAction == "gridedit") { // Grid edit
			if ($frm_9_m_sa_units_contributor->EventCancelled) {
				$frm_9_m_sa_units_contributor_grid->RestoreCurrentRowFormValues($frm_9_m_sa_units_contributor_grid->RowIndex); // Restore form values
			}
			if ($frm_9_m_sa_units_contributor_grid->RowAction == "insert")
				$frm_9_m_sa_units_contributor->RowType = UP_ROWTYPE_ADD; // Render add
			else
				$frm_9_m_sa_units_contributor->RowType = UP_ROWTYPE_EDIT; // Render edit
		}
		if ($frm_9_m_sa_units_contributor->CurrentAction == "gridedit" && ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT || $frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) && $frm_9_m_sa_units_contributor->EventCancelled) // Update failed
			$frm_9_m_sa_units_contributor_grid->RestoreCurrentRowFormValues($frm_9_m_sa_units_contributor_grid->RowIndex); // Restore form values
		if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) // Edit row
			$frm_9_m_sa_units_contributor_grid->EditRowCnt++;
		if ($frm_9_m_sa_units_contributor->CurrentAction == "F") // Confirm row
			$frm_9_m_sa_units_contributor_grid->RestoreCurrentRowFormValues($frm_9_m_sa_units_contributor_grid->RowIndex); // Restore form values
		if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD || $frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Add / Edit row
			if ($frm_9_m_sa_units_contributor->CurrentAction == "edit") {
				$frm_9_m_sa_units_contributor->RowAttrs = array();
				$frm_9_m_sa_units_contributor->CssClass = "upTableEditRow";
			} else {
				$frm_9_m_sa_units_contributor->RowAttrs = array();
			}
			if (!empty($frm_9_m_sa_units_contributor_grid->RowIndex))
				$frm_9_m_sa_units_contributor->RowAttrs = array_merge($frm_9_m_sa_units_contributor->RowAttrs, array('data-rowindex'=>$frm_9_m_sa_units_contributor_grid->RowIndex, 'id'=>'r' . $frm_9_m_sa_units_contributor_grid->RowIndex . '_frm_9_m_sa_units_contributor'));
		} else {
			$frm_9_m_sa_units_contributor->RowAttrs = array();
		}

		// Render row
		$frm_9_m_sa_units_contributor_grid->RenderRow();

		// Render list options
		$frm_9_m_sa_units_contributor_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($frm_9_m_sa_units_contributor_grid->RowAction <> "delete" && $frm_9_m_sa_units_contributor_grid->RowAction <> "insertdelete" && !($frm_9_m_sa_units_contributor_grid->RowAction == "insert" && $frm_9_m_sa_units_contributor->CurrentAction == "F" && $frm_9_m_sa_units_contributor_grid->EmptyRow())) {
?>
	<tr<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_9_m_sa_units_contributor_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_9_m_sa_units_contributor->CU->Visible) { // CU ?>
		<td<?php echo $frm_9_m_sa_units_contributor->CU->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->CU->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->CU->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->CU->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->CU->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->CU->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->CU->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->CU->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->CU->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->CU->OldValue) ?>">
<?php } ?>
<a name="<?php echo $frm_9_m_sa_units_contributor_grid->PageObjName . "_row_" . $frm_9_m_sa_units_contributor_grid->RowCnt ?>" id="<?php echo $frm_9_m_sa_units_contributor_grid->PageObjName . "_row_" . $frm_9_m_sa_units_contributor_grid->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->DU_Office_Name->Visible) { // DU Office Name ?>
		<td<?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->DU_Office_Name->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->DU_Office_Name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->DU_Office_Name->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->ConU_Office_Name->Visible) { // ConU Office Name ?>
		<td<?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->ConU_Office_Name->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->ConU_Office_Name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->ConU_Office_Name->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->ConU_Short_Name->Visible) { // ConU Short Name ?>
		<td<?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" size="30" maxlength="10" value="<?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->ConU_Short_Name->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" size="30" maxlength="10" value="<?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->ConU_Short_Name->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->ConU_Short_Name->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->Personnel_Count->Visible) { // Personnel Count ?>
		<td<?php echo $frm_9_m_sa_units_contributor->Personnel_Count->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" size="30" value="<?php echo $frm_9_m_sa_units_contributor->Personnel_Count->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->Personnel_Count->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->Personnel_Count->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" size="30" value="<?php echo $frm_9_m_sa_units_contributor->Personnel_Count->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->Personnel_Count->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->Personnel_Count->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->Personnel_Count->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->Personnel_Count->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->Personnel_Count->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_1->Visible) { // MFO 1 ?>
		<td<?php echo $frm_9_m_sa_units_contributor->MFO_1->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_1->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_1->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_1->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_1->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_1->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_1->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_1->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_1->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_1->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_2->Visible) { // MFO 2 ?>
		<td<?php echo $frm_9_m_sa_units_contributor->MFO_2->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_2->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_2->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_2->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_2->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_2->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_2->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_2->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_2->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_2->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_3->Visible) { // MFO 3 ?>
		<td<?php echo $frm_9_m_sa_units_contributor->MFO_3->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_3->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_3->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_3->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_3->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_3->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_3->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_3->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_3->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_3->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_4->Visible) { // MFO 4 ?>
		<td<?php echo $frm_9_m_sa_units_contributor->MFO_4->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_4->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_4->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_4->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_4->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_4->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_4->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_4->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_4->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_4->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_5->Visible) { // MFO 5 ?>
		<td<?php echo $frm_9_m_sa_units_contributor->MFO_5->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_5->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_5->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_5->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_5->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_5->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_5->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_5->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_5->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_5->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->STO->Visible) { // STO ?>
		<td<?php echo $frm_9_m_sa_units_contributor->STO->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->STO->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->STO->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->STO->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->STO->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->STO->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->STO->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->STO->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->STO->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->STO->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->GASS_AB->Visible) { // GASS AB ?>
		<td<?php echo $frm_9_m_sa_units_contributor->GASS_AB->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->GASS_AB->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->GASS_AB->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->GASS_AB->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->GASS_AB->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->GASS_AB->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->GASS_AB->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->GASS_AB->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->GASS_AB->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->GASS_AB->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->GASS_CD->Visible) { // GASS CD ?>
		<td<?php echo $frm_9_m_sa_units_contributor->GASS_CD->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->GASS_CD->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->GASS_CD->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->GASS_CD->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->GASS_CD->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->GASS_CD->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->GASS_CD->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->GASS_CD->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->GASS_CD->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->GASS_CD->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->GASS->Visible) { // GASS ?>
		<td<?php echo $frm_9_m_sa_units_contributor->GASS->CellAttributes() ?>>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { // Add record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->GASS->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->GASS->EditAttributes() ?>>
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->GASS->OldValue) ?>">
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit record ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->GASS->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->GASS->EditAttributes() ?>>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View record ?>
<div<?php echo $frm_9_m_sa_units_contributor->GASS->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->GASS->ListViewValue() ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->GASS->CurrentValue) ?>">
<input type="hidden" name="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" id="o<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->GASS->OldValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_9_m_sa_units_contributor_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD) { ?>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { ?>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($frm_9_m_sa_units_contributor->CurrentAction <> "gridadd" || $frm_9_m_sa_units_contributor->CurrentMode == "copy")
		if (!$frm_9_m_sa_units_contributor_grid->Recordset->EOF) $frm_9_m_sa_units_contributor_grid->Recordset->MoveNext();
}
?>
<?php
	if ($frm_9_m_sa_units_contributor->CurrentMode == "add" || $frm_9_m_sa_units_contributor->CurrentMode == "copy" || $frm_9_m_sa_units_contributor->CurrentMode == "edit") {
		$frm_9_m_sa_units_contributor_grid->RowIndex = '$rowindex$';
		$frm_9_m_sa_units_contributor_grid->LoadDefaultValues();

		// Set row properties
		$frm_9_m_sa_units_contributor->ResetAttrs();
		$frm_9_m_sa_units_contributor->RowAttrs = array();
		if (!empty($frm_9_m_sa_units_contributor_grid->RowIndex))
			$frm_9_m_sa_units_contributor->RowAttrs = array_merge($frm_9_m_sa_units_contributor->RowAttrs, array('data-rowindex'=>$frm_9_m_sa_units_contributor_grid->RowIndex, 'id'=>'r' . $frm_9_m_sa_units_contributor_grid->RowIndex . '_frm_9_m_sa_units_contributor'));
		$frm_9_m_sa_units_contributor->RowType = UP_ROWTYPE_ADD;

		// Render row
		$frm_9_m_sa_units_contributor_grid->RenderRow();

		// Render list options
		$frm_9_m_sa_units_contributor_grid->RenderListOptions();

		// Add id and class to the template row
		$frm_9_m_sa_units_contributor->RowAttrs["id"] = "r0_frm_9_m_sa_units_contributor";
		up_AppendClass($frm_9_m_sa_units_contributor->RowAttrs["class"], "upTemplate");
?>
	<tr<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_9_m_sa_units_contributor_grid->ListOptions->Render("body", "left");
?>
	<?php if ($frm_9_m_sa_units_contributor->CU->Visible) { // CU ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->CU->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->CU->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->CU->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->CU->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_CU" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->CU->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->DU_Office_Name->Visible) { // DU Office Name ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_DU_Office_Name" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->DU_Office_Name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->ConU_Office_Name->Visible) { // ConU Office Name ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Office_Name" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->ConU_Office_Name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->ConU_Short_Name->Visible) { // ConU Short Name ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" size="30" maxlength="10" value="<?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_ConU_Short_Name" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->ConU_Short_Name->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->Personnel_Count->Visible) { // Personnel Count ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" size="30" value="<?php echo $frm_9_m_sa_units_contributor->Personnel_Count->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->Personnel_Count->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->Personnel_Count->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->Personnel_Count->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_Personnel_Count" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->Personnel_Count->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_1->Visible) { // MFO 1 ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_1->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_1->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_1->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_1->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_1" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_1->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_2->Visible) { // MFO 2 ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_2->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_2->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_2->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_2->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_2" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_2->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_3->Visible) { // MFO 3 ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_3->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_3->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_3->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_3->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_3" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_3->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_4->Visible) { // MFO 4 ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_4->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_4->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_4->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_4->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_4" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_4->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_5->Visible) { // MFO 5 ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->MFO_5->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->MFO_5->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_5->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_5->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_MFO_5" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->MFO_5->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->STO->Visible) { // STO ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->STO->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->STO->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->STO->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->STO->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_STO" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->STO->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->GASS_AB->Visible) { // GASS AB ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->GASS_AB->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->GASS_AB->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->GASS_AB->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->GASS_AB->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_AB" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->GASS_AB->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->GASS_CD->Visible) { // GASS CD ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->GASS_CD->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->GASS_CD->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->GASS_CD->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->GASS_CD->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS_CD" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->GASS_CD->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->GASS->Visible) { // GASS ?>
		<td>
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "F") { ?>
<input type="text" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->GASS->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->GASS->EditAttributes() ?>>
<?php } else { ?>
<div<?php echo $frm_9_m_sa_units_contributor->GASS->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->GASS->ViewValue ?></div>
<input type="hidden" name="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" id="x<?php echo $frm_9_m_sa_units_contributor_grid->RowIndex ?>_GASS" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->GASS->FormValue) ?>">
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_9_m_sa_units_contributor_grid->ListOptions->Render("body", "right");
?>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($frm_9_m_sa_units_contributor->CurrentMode == "add" || $frm_9_m_sa_units_contributor->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_9_m_sa_units_contributor_grid->KeyCount ?>">
<?php echo $frm_9_m_sa_units_contributor_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="key_count" id="key_count" value="<?php echo $frm_9_m_sa_units_contributor_grid->KeyCount ?>">
<?php echo $frm_9_m_sa_units_contributor_grid->MultiSelectKey ?>
<?php } ?>
<input type="hidden" name="detailpage" id="detailpage" value="frm_9_m_sa_units_contributor_grid">
</div>
<?php

// Close recordset
if ($frm_9_m_sa_units_contributor_grid->Recordset)
	$frm_9_m_sa_units_contributor_grid->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_9_m_sa_units_contributor->Export == "" && $frm_9_m_sa_units_contributor->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_9_m_sa_units_contributor_grid->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
$frm_9_m_sa_units_contributor_grid->Page_Terminate();
$Page =& $MasterPage;
?>
