<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "view_reps_5_2_units_requiring_justification_summaryinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$view_reps_5_2_units_requiring_justification_summary_list = new cview_reps_5_2_units_requiring_justification_summary_list();
$Page =& $view_reps_5_2_units_requiring_justification_summary_list;

// Page init
$view_reps_5_2_units_requiring_justification_summary_list->Page_Init();

// Page main
$view_reps_5_2_units_requiring_justification_summary_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($view_reps_5_2_units_requiring_justification_summary->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var view_reps_5_2_units_requiring_justification_summary_list = new up_Page("view_reps_5_2_units_requiring_justification_summary_list");

// page properties
view_reps_5_2_units_requiring_justification_summary_list.PageID = "list"; // page ID
view_reps_5_2_units_requiring_justification_summary_list.FormID = "fview_reps_5_2_units_requiring_justification_summarylist"; // form ID
var UP_PAGE_ID = view_reps_5_2_units_requiring_justification_summary_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
view_reps_5_2_units_requiring_justification_summary_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (UP_CLIENT_VALIDATE) { ?>
view_reps_5_2_units_requiring_justification_summary_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
view_reps_5_2_units_requiring_justification_summary_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
//-->

</script>
<?php } ?>
<?php if (($view_reps_5_2_units_requiring_justification_summary->Export == "") || (UP_EXPORT_MASTER_RECORD && $view_reps_5_2_units_requiring_justification_summary->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$view_reps_5_2_units_requiring_justification_summary_list->TotalRecs = $view_reps_5_2_units_requiring_justification_summary->SelectRecordCount();
	} else {
		if ($view_reps_5_2_units_requiring_justification_summary_list->Recordset = $view_reps_5_2_units_requiring_justification_summary_list->LoadRecordset())
			$view_reps_5_2_units_requiring_justification_summary_list->TotalRecs = $view_reps_5_2_units_requiring_justification_summary_list->Recordset->RecordCount();
	}
	$view_reps_5_2_units_requiring_justification_summary_list->StartRec = 1;
	if ($view_reps_5_2_units_requiring_justification_summary_list->DisplayRecs <= 0 || ($view_reps_5_2_units_requiring_justification_summary->Export <> "" && $view_reps_5_2_units_requiring_justification_summary->ExportAll)) // Display all records
		$view_reps_5_2_units_requiring_justification_summary_list->DisplayRecs = $view_reps_5_2_units_requiring_justification_summary_list->TotalRecs;
	if (!($view_reps_5_2_units_requiring_justification_summary->Export <> "" && $view_reps_5_2_units_requiring_justification_summary->ExportAll))
		$view_reps_5_2_units_requiring_justification_summary_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$view_reps_5_2_units_requiring_justification_summary_list->Recordset = $view_reps_5_2_units_requiring_justification_summary_list->LoadRecordset($view_reps_5_2_units_requiring_justification_summary_list->StartRec-1, $view_reps_5_2_units_requiring_justification_summary_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeVIEW") ?><?php echo $view_reps_5_2_units_requiring_justification_summary->TableCaption() ?>
&nbsp;&nbsp;<?php $view_reps_5_2_units_requiring_justification_summary_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($view_reps_5_2_units_requiring_justification_summary->Export == "" && $view_reps_5_2_units_requiring_justification_summary->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(view_reps_5_2_units_requiring_justification_summary_list);" style="text-decoration: none;"><img id="view_reps_5_2_units_requiring_justification_summary_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="view_reps_5_2_units_requiring_justification_summary_list_SearchPanel">
<form name="fview_reps_5_2_units_requiring_justification_summarylistsrch" id="fview_reps_5_2_units_requiring_justification_summarylistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="view_reps_5_2_units_requiring_justification_summary">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($view_reps_5_2_units_requiring_justification_summary->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $view_reps_5_2_units_requiring_justification_summary_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($view_reps_5_2_units_requiring_justification_summary->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($view_reps_5_2_units_requiring_justification_summary->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($view_reps_5_2_units_requiring_justification_summary->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $view_reps_5_2_units_requiring_justification_summary_list->ShowPageHeader(); ?>
<?php
$view_reps_5_2_units_requiring_justification_summary_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<form name="fview_reps_5_2_units_requiring_justification_summarylist" id="fview_reps_5_2_units_requiring_justification_summarylist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="view_reps_5_2_units_requiring_justification_summary">
<div id="gmp_view_reps_5_2_units_requiring_justification_summary" class="upGridMiddlePanel">
<?php if ($view_reps_5_2_units_requiring_justification_summary_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $view_reps_5_2_units_requiring_justification_summary->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$view_reps_5_2_units_requiring_justification_summary_list->RenderListOptions();

// Render list options (header, left)
$view_reps_5_2_units_requiring_justification_summary_list->ListOptions->Render("header", "left");
?>
<?php if ($view_reps_5_2_units_requiring_justification_summary->Constituent_University->Visible) { // Constituent University ?>
	<?php if ($view_reps_5_2_units_requiring_justification_summary->SortUrl($view_reps_5_2_units_requiring_justification_summary->Constituent_University) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_5_2_units_requiring_justification_summary->Constituent_University->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_5_2_units_requiring_justification_summary->SortUrl($view_reps_5_2_units_requiring_justification_summary->Constituent_University) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_5_2_units_requiring_justification_summary->Constituent_University->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($view_reps_5_2_units_requiring_justification_summary->Constituent_University->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_5_2_units_requiring_justification_summary->Constituent_University->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->Visible) { // PIs that Passed ?>
	<?php if ($view_reps_5_2_units_requiring_justification_summary->SortUrl($view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_5_2_units_requiring_justification_summary->SortUrl($view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->Visible) { // PIs that Requires Justificiation ?>
	<?php if ($view_reps_5_2_units_requiring_justification_summary->SortUrl($view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_5_2_units_requiring_justification_summary->SortUrl($view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->Visible) { // PIs with No Accomplishment ?>
	<?php if ($view_reps_5_2_units_requiring_justification_summary->SortUrl($view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_5_2_units_requiring_justification_summary->SortUrl($view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->Visible) { // No. of PI Participated ?>
	<?php if ($view_reps_5_2_units_requiring_justification_summary->SortUrl($view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_5_2_units_requiring_justification_summary->SortUrl($view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$view_reps_5_2_units_requiring_justification_summary_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($view_reps_5_2_units_requiring_justification_summary->ExportAll && $view_reps_5_2_units_requiring_justification_summary->Export <> "") {
	$view_reps_5_2_units_requiring_justification_summary_list->StopRec = $view_reps_5_2_units_requiring_justification_summary_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_reps_5_2_units_requiring_justification_summary_list->TotalRecs > $view_reps_5_2_units_requiring_justification_summary_list->StartRec + $view_reps_5_2_units_requiring_justification_summary_list->DisplayRecs - 1)
		$view_reps_5_2_units_requiring_justification_summary_list->StopRec = $view_reps_5_2_units_requiring_justification_summary_list->StartRec + $view_reps_5_2_units_requiring_justification_summary_list->DisplayRecs - 1;
	else
		$view_reps_5_2_units_requiring_justification_summary_list->StopRec = $view_reps_5_2_units_requiring_justification_summary_list->TotalRecs;
}
$view_reps_5_2_units_requiring_justification_summary_list->RecCnt = $view_reps_5_2_units_requiring_justification_summary_list->StartRec - 1;
if ($view_reps_5_2_units_requiring_justification_summary_list->Recordset && !$view_reps_5_2_units_requiring_justification_summary_list->Recordset->EOF) {
	$view_reps_5_2_units_requiring_justification_summary_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $view_reps_5_2_units_requiring_justification_summary_list->StartRec > 1)
		$view_reps_5_2_units_requiring_justification_summary_list->Recordset->Move($view_reps_5_2_units_requiring_justification_summary_list->StartRec - 1);
} elseif (!$view_reps_5_2_units_requiring_justification_summary->AllowAddDeleteRow && $view_reps_5_2_units_requiring_justification_summary_list->StopRec == 0) {
	$view_reps_5_2_units_requiring_justification_summary_list->StopRec = $view_reps_5_2_units_requiring_justification_summary->GridAddRowCount;
}

// Initialize aggregate
$view_reps_5_2_units_requiring_justification_summary->RowType = UP_ROWTYPE_AGGREGATEINIT;
$view_reps_5_2_units_requiring_justification_summary->ResetAttrs();
$view_reps_5_2_units_requiring_justification_summary_list->RenderRow();
$view_reps_5_2_units_requiring_justification_summary_list->RowCnt = 0;
while ($view_reps_5_2_units_requiring_justification_summary_list->RecCnt < $view_reps_5_2_units_requiring_justification_summary_list->StopRec) {
	$view_reps_5_2_units_requiring_justification_summary_list->RecCnt++;
	if (intval($view_reps_5_2_units_requiring_justification_summary_list->RecCnt) >= intval($view_reps_5_2_units_requiring_justification_summary_list->StartRec)) {
		$view_reps_5_2_units_requiring_justification_summary_list->RowCnt++;

		// Set up key count
		$view_reps_5_2_units_requiring_justification_summary_list->KeyCount = $view_reps_5_2_units_requiring_justification_summary_list->RowIndex;

		// Init row class and style
		$view_reps_5_2_units_requiring_justification_summary->ResetAttrs();
		$view_reps_5_2_units_requiring_justification_summary->CssClass = "";
		if ($view_reps_5_2_units_requiring_justification_summary->CurrentAction == "gridadd") {
		} else {
			$view_reps_5_2_units_requiring_justification_summary_list->LoadRowValues($view_reps_5_2_units_requiring_justification_summary_list->Recordset); // Load row values
		}
		$view_reps_5_2_units_requiring_justification_summary->RowType = UP_ROWTYPE_VIEW; // Render view
		$view_reps_5_2_units_requiring_justification_summary->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$view_reps_5_2_units_requiring_justification_summary_list->RenderRow();

		// Render list options
		$view_reps_5_2_units_requiring_justification_summary_list->RenderListOptions();
?>
	<tr<?php echo $view_reps_5_2_units_requiring_justification_summary->RowAttributes() ?>>
<?php

// Render list options (body, left)
$view_reps_5_2_units_requiring_justification_summary_list->ListOptions->Render("body", "left");
?>
	<?php if ($view_reps_5_2_units_requiring_justification_summary->Constituent_University->Visible) { // Constituent University ?>
		<td<?php echo $view_reps_5_2_units_requiring_justification_summary->Constituent_University->CellAttributes() ?>>
<div<?php echo $view_reps_5_2_units_requiring_justification_summary->Constituent_University->ViewAttributes() ?>><?php echo $view_reps_5_2_units_requiring_justification_summary->Constituent_University->ListViewValue() ?></div>
<a name="<?php echo $view_reps_5_2_units_requiring_justification_summary_list->PageObjName . "_row_" . $view_reps_5_2_units_requiring_justification_summary_list->RowCnt ?>" id="<?php echo $view_reps_5_2_units_requiring_justification_summary_list->PageObjName . "_row_" . $view_reps_5_2_units_requiring_justification_summary_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->Visible) { // PIs that Passed ?>
		<td<?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->CellAttributes() ?>>
<div<?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->ViewAttributes() ?>><?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->Visible) { // PIs that Requires Justificiation ?>
		<td<?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->CellAttributes() ?>>
<div<?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->ViewAttributes() ?>><?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->Visible) { // PIs with No Accomplishment ?>
		<td<?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->CellAttributes() ?>>
<div<?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->ViewAttributes() ?>><?php echo $view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->Visible) { // No. of PI Participated ?>
		<td<?php echo $view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->CellAttributes() ?>>
<div<?php echo $view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->ViewAttributes() ?>><?php echo $view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_reps_5_2_units_requiring_justification_summary_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($view_reps_5_2_units_requiring_justification_summary->CurrentAction <> "gridadd")
		$view_reps_5_2_units_requiring_justification_summary_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($view_reps_5_2_units_requiring_justification_summary_list->Recordset)
	$view_reps_5_2_units_requiring_justification_summary_list->Recordset->Close();
?>
<?php if ($view_reps_5_2_units_requiring_justification_summary->Export == "") { ?>
<div class="upGridLowerPanel">
<?php if ($view_reps_5_2_units_requiring_justification_summary->CurrentAction <> "gridadd" && $view_reps_5_2_units_requiring_justification_summary->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($view_reps_5_2_units_requiring_justification_summary_list->Pager)) $view_reps_5_2_units_requiring_justification_summary_list->Pager = new cPrevNextPager($view_reps_5_2_units_requiring_justification_summary_list->StartRec, $view_reps_5_2_units_requiring_justification_summary_list->DisplayRecs, $view_reps_5_2_units_requiring_justification_summary_list->TotalRecs) ?>
<?php if ($view_reps_5_2_units_requiring_justification_summary_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($view_reps_5_2_units_requiring_justification_summary_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $view_reps_5_2_units_requiring_justification_summary_list->PageUrl() ?>start=<?php echo $view_reps_5_2_units_requiring_justification_summary_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_reps_5_2_units_requiring_justification_summary_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $view_reps_5_2_units_requiring_justification_summary_list->PageUrl() ?>start=<?php echo $view_reps_5_2_units_requiring_justification_summary_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $view_reps_5_2_units_requiring_justification_summary_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($view_reps_5_2_units_requiring_justification_summary_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $view_reps_5_2_units_requiring_justification_summary_list->PageUrl() ?>start=<?php echo $view_reps_5_2_units_requiring_justification_summary_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($view_reps_5_2_units_requiring_justification_summary_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $view_reps_5_2_units_requiring_justification_summary_list->PageUrl() ?>start=<?php echo $view_reps_5_2_units_requiring_justification_summary_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $view_reps_5_2_units_requiring_justification_summary_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_reps_5_2_units_requiring_justification_summary_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_reps_5_2_units_requiring_justification_summary_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_reps_5_2_units_requiring_justification_summary_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($view_reps_5_2_units_requiring_justification_summary_list->SearchWhere == "0=101") { ?>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("EnterSearchCriteria") ?></span>
	<?php } else { ?>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("NoRecord") ?></span>
	<?php } ?>
	<?php } else { ?>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("NoPermission") ?></span>
	<?php } ?>
<?php } ?>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<span class="upbudgetofficeclass">
</span>
</div>
<?php } ?>
</td></tr></table>
<?php if ($view_reps_5_2_units_requiring_justification_summary->Export == "" && $view_reps_5_2_units_requiring_justification_summary->CurrentAction == "") { ?>
<?php } ?>
<?php
$view_reps_5_2_units_requiring_justification_summary_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($view_reps_5_2_units_requiring_justification_summary->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_reps_5_2_units_requiring_justification_summary_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cview_reps_5_2_units_requiring_justification_summary_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'view_reps_5_2_units_requiring_justification_summary';

	// Page object name
	var $PageObjName = 'view_reps_5_2_units_requiring_justification_summary_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $view_reps_5_2_units_requiring_justification_summary;
		if ($view_reps_5_2_units_requiring_justification_summary->UseTokenInUrl) $PageUrl .= "t=" . $view_reps_5_2_units_requiring_justification_summary->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Page URLs
	var $AddUrl;
	var $EditUrl;
	var $CopyUrl;
	var $DeleteUrl;
	var $ViewUrl;
	var $ListUrl;

	// Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;
	var $ExportPdfUrl;

	// Update URLs
	var $InlineAddUrl;
	var $InlineCopyUrl;
	var $InlineEditUrl;
	var $GridAddUrl;
	var $GridEditUrl;
	var $MultiDeleteUrl;
	var $MultiUpdateUrl;

	// Message
	function getMessage() {
		return @$_SESSION[UP_SESSION_MESSAGE];
	}

	function setMessage($v) {
		up_AddMessage($_SESSION[UP_SESSION_MESSAGE], $v);
	}

	function getFailureMessage() {
		return @$_SESSION[UP_SESSION_FAILURE_MESSAGE];
	}

	function setFailureMessage($v) {
		up_AddMessage($_SESSION[UP_SESSION_FAILURE_MESSAGE], $v);
	}

	function getSuccessMessage() {
		return @$_SESSION[UP_SESSION_SUCCESS_MESSAGE];
	}

	function setSuccessMessage($v) {
		up_AddMessage($_SESSION[UP_SESSION_SUCCESS_MESSAGE], $v);
	}

	// Show message
	function ShowMessage() {
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage, "");
		if ($sMessage <> "") { // Message in Session, display
			echo "<p class=\"upMessage\">" . $sMessage . "</p>";
			$_SESSION[UP_SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$sSuccessMessage = $this->getSuccessMessage();
		$this->Message_Showing($sSuccessMessage, "success");
		if ($sSuccessMessage <> "") { // Message in Session, display
			echo "<p class=\"upSuccessMessage\">" . $sSuccessMessage . "</p>";
			$_SESSION[UP_SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$sErrorMessage = $this->getFailureMessage();
		$this->Message_Showing($sErrorMessage, "failure");
		if ($sErrorMessage <> "") { // Message in Session, display
			echo "<p class=\"upErrorMessage\">" . $sErrorMessage . "</p>";
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
	}
	var $PageHeader;
	var $PageFooter;

	// Show Page Header
	function ShowPageHeader() {
		$sHeader = $this->PageHeader;
		$this->Page_DataRendering($sHeader);
		if ($sHeader <> "") { // Header exists, display
			echo "<p class=\"upbudgetofficeclass\">" . $sHeader . "</p>";
		}
	}

	// Show Page Footer
	function ShowPageFooter() {
		$sFooter = $this->PageFooter;
		$this->Page_DataRendered($sFooter);
		if ($sFooter <> "") { // Fotoer exists, display
			echo "<p class=\"upbudgetofficeclass\">" . $sFooter . "</p>";
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm, $view_reps_5_2_units_requiring_justification_summary;
		if ($view_reps_5_2_units_requiring_justification_summary->UseTokenInUrl) {
			if ($objForm)
				return ($view_reps_5_2_units_requiring_justification_summary->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($view_reps_5_2_units_requiring_justification_summary->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cview_reps_5_2_units_requiring_justification_summary_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (view_reps_5_2_units_requiring_justification_summary)
		if (!isset($GLOBALS["view_reps_5_2_units_requiring_justification_summary"])) {
			$GLOBALS["view_reps_5_2_units_requiring_justification_summary"] = new cview_reps_5_2_units_requiring_justification_summary();
			$GLOBALS["Table"] =& $GLOBALS["view_reps_5_2_units_requiring_justification_summary"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "view_reps_5_2_units_requiring_justification_summaryadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "view_reps_5_2_units_requiring_justification_summarydelete.php";
		$this->MultiUpdateUrl = "view_reps_5_2_units_requiring_justification_summaryupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'view_reps_5_2_units_requiring_justification_summary', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"])) $GLOBALS["gTimer"] = new cTimer();

		// Open connection
		if (!isset($conn)) $conn = up_Connect();

		// List options
		$this->ListOptions = new cListOptions();

		// Export options
		$this->ExportOptions = new cListOptions();
		$this->ExportOptions->Tag = "span";
		$this->ExportOptions->Separator = "&nbsp;&nbsp;";
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		global $view_reps_5_2_units_requiring_justification_summary;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->TableName);
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanList()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate();
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$view_reps_5_2_units_requiring_justification_summary->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->SetupListOptions();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		$this->Page_Redirecting($url);

		 // Close connection
		$conn->Close();

		// Go to URL if specified
		if ($url <> "") {
			if (!UP_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
		exit();
	}

	// Class variables
	var $ListOptions; // List options
	var $ExportOptions; // Export options
	var $DisplayRecs = 20;
	var $StartRec;
	var $StopRec;
	var $TotalRecs = 0;
	var $RecRange = 10;
	var $SearchWhere = ""; // Search WHERE clause
	var $RecCnt = 0; // Record count
	var $EditRowCnt;
	var $RowCnt;
	var $RowIndex = 0; // Row index
	var $KeyCount = 0; // Key count
	var $RowAction = ""; // Row action
	var $RowOldKey = ""; // Row old key (for copy)
	var $RecPerRow = 0;
	var $ColCnt = 0;
	var $DbMasterFilter = ""; // Master filter
	var $DbDetailFilter = ""; // Detail filter
	var $MasterRecordExists;	
	var $MultiSelectKey;
	var $RestoreSearch;
	var $Recordset;
	var $OldRecordset;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $view_reps_5_2_units_requiring_justification_summary;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($view_reps_5_2_units_requiring_justification_summary->Export <> "" ||
				$view_reps_5_2_units_requiring_justification_summary->CurrentAction == "gridadd" ||
				$view_reps_5_2_units_requiring_justification_summary->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$view_reps_5_2_units_requiring_justification_summary->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($view_reps_5_2_units_requiring_justification_summary->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $view_reps_5_2_units_requiring_justification_summary->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$view_reps_5_2_units_requiring_justification_summary->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$view_reps_5_2_units_requiring_justification_summary->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$view_reps_5_2_units_requiring_justification_summary->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $view_reps_5_2_units_requiring_justification_summary->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$view_reps_5_2_units_requiring_justification_summary->setSessionWhere($sFilter);
		$view_reps_5_2_units_requiring_justification_summary->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $view_reps_5_2_units_requiring_justification_summary;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $view_reps_5_2_units_requiring_justification_summary->Constituent_University, $Keyword);
		return $sWhere;
	}

	// Build basic search SQL
	function BuildBasicSearchSql(&$Where, &$Fld, $Keyword) {
		$sFldExpression = ($Fld->FldVirtualExpression <> "") ? $Fld->FldVirtualExpression : $Fld->FldExpression;
		$lFldDataType = ($Fld->FldIsVirtual) ? UP_DATATYPE_STRING : $Fld->FldDataType;
		if ($lFldDataType == UP_DATATYPE_NUMBER) {
			$sWrk = $sFldExpression . " = " . up_QuotedValue($Keyword, $lFldDataType);
		} else {
			$sWrk = $sFldExpression . up_Like(up_QuotedValue("%" . $Keyword . "%", $lFldDataType));
		}
		if ($Where <> "") $Where .= " OR ";
		$Where .= $sWrk;
	}

	// Return basic search WHERE clause based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $view_reps_5_2_units_requiring_justification_summary;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $view_reps_5_2_units_requiring_justification_summary->BasicSearchKeyword;
		$sSearchType = $view_reps_5_2_units_requiring_justification_summary->BasicSearchType;
		if ($sSearchKeyword <> "") {
			$sSearch = trim($sSearchKeyword);
			if ($sSearchType <> "") {
				while (strpos($sSearch, "  ") !== FALSE)
					$sSearch = str_replace("  ", " ", $sSearch);
				$arKeyword = explode(" ", trim($sSearch));
				foreach ($arKeyword as $sKeyword) {
					if ($sSearchStr <> "") $sSearchStr .= " " . $sSearchType . " ";
					$sSearchStr .= "(" . $this->BasicSearchSQL($sKeyword) . ")";
				}
			} else {
				$sSearchStr = $this->BasicSearchSQL($sSearch);
			}
		}
		if ($sSearchKeyword <> "") {
			$view_reps_5_2_units_requiring_justification_summary->setSessionBasicSearchKeyword($sSearchKeyword);
			$view_reps_5_2_units_requiring_justification_summary->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $view_reps_5_2_units_requiring_justification_summary;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$view_reps_5_2_units_requiring_justification_summary->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $view_reps_5_2_units_requiring_justification_summary;
		$view_reps_5_2_units_requiring_justification_summary->setSessionBasicSearchKeyword("");
		$view_reps_5_2_units_requiring_justification_summary->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $view_reps_5_2_units_requiring_justification_summary;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$view_reps_5_2_units_requiring_justification_summary->BasicSearchKeyword = $view_reps_5_2_units_requiring_justification_summary->getSessionBasicSearchKeyword();
			$view_reps_5_2_units_requiring_justification_summary->BasicSearchType = $view_reps_5_2_units_requiring_justification_summary->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $view_reps_5_2_units_requiring_justification_summary;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$view_reps_5_2_units_requiring_justification_summary->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$view_reps_5_2_units_requiring_justification_summary->CurrentOrderType = @$_GET["ordertype"];
			$view_reps_5_2_units_requiring_justification_summary->UpdateSort($view_reps_5_2_units_requiring_justification_summary->Constituent_University); // Constituent University
			$view_reps_5_2_units_requiring_justification_summary->UpdateSort($view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed); // PIs that Passed
			$view_reps_5_2_units_requiring_justification_summary->UpdateSort($view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation); // PIs that Requires Justificiation
			$view_reps_5_2_units_requiring_justification_summary->UpdateSort($view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment); // PIs with No Accomplishment
			$view_reps_5_2_units_requiring_justification_summary->UpdateSort($view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated); // No. of PI Participated
			$view_reps_5_2_units_requiring_justification_summary->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $view_reps_5_2_units_requiring_justification_summary;
		$sOrderBy = $view_reps_5_2_units_requiring_justification_summary->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($view_reps_5_2_units_requiring_justification_summary->SqlOrderBy() <> "") {
				$sOrderBy = $view_reps_5_2_units_requiring_justification_summary->SqlOrderBy();
				$view_reps_5_2_units_requiring_justification_summary->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $view_reps_5_2_units_requiring_justification_summary;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$view_reps_5_2_units_requiring_justification_summary->setSessionOrderBy($sOrderBy);
				$view_reps_5_2_units_requiring_justification_summary->Constituent_University->setSort("");
				$view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->setSort("");
				$view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->setSort("");
				$view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->setSort("");
				$view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$view_reps_5_2_units_requiring_justification_summary->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $view_reps_5_2_units_requiring_justification_summary;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $view_reps_5_2_units_requiring_justification_summary, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $view_reps_5_2_units_requiring_justification_summary;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $view_reps_5_2_units_requiring_justification_summary;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$view_reps_5_2_units_requiring_justification_summary->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$view_reps_5_2_units_requiring_justification_summary->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $view_reps_5_2_units_requiring_justification_summary->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$view_reps_5_2_units_requiring_justification_summary->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$view_reps_5_2_units_requiring_justification_summary->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$view_reps_5_2_units_requiring_justification_summary->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $view_reps_5_2_units_requiring_justification_summary;
		$view_reps_5_2_units_requiring_justification_summary->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$view_reps_5_2_units_requiring_justification_summary->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $view_reps_5_2_units_requiring_justification_summary;

		// Call Recordset Selecting event
		$view_reps_5_2_units_requiring_justification_summary->Recordset_Selecting($view_reps_5_2_units_requiring_justification_summary->CurrentFilter);

		// Load List page SQL
		$sSql = $view_reps_5_2_units_requiring_justification_summary->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$view_reps_5_2_units_requiring_justification_summary->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $view_reps_5_2_units_requiring_justification_summary;
		$sFilter = $view_reps_5_2_units_requiring_justification_summary->KeyFilter();

		// Call Row Selecting event
		$view_reps_5_2_units_requiring_justification_summary->Row_Selecting($sFilter);

		// Load SQL based on filter
		$view_reps_5_2_units_requiring_justification_summary->CurrentFilter = $sFilter;
		$sSql = $view_reps_5_2_units_requiring_justification_summary->SQL();
		$res = FALSE;
		$rs = up_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn, $view_reps_5_2_units_requiring_justification_summary;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$view_reps_5_2_units_requiring_justification_summary->Row_Selected($row);
		$view_reps_5_2_units_requiring_justification_summary->Constituent_University->setDbValue($rs->fields('Constituent University'));
		$view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->setDbValue($rs->fields('PIs that Passed'));
		$view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->setDbValue($rs->fields('PIs that Requires Justificiation'));
		$view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->setDbValue($rs->fields('PIs with No Accomplishment'));
		$view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->setDbValue($rs->fields('No. of PI Participated'));
		$view_reps_5_2_units_requiring_justification_summary->Sequence->setDbValue($rs->fields('Sequence'));
		$view_reps_5_2_units_requiring_justification_summary->focalperson_ID->setDbValue($rs->fields('focalperson_ID'));
	}

	// Load old record
	function LoadOldRecord() {
		global $view_reps_5_2_units_requiring_justification_summary;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$view_reps_5_2_units_requiring_justification_summary->CurrentFilter = $view_reps_5_2_units_requiring_justification_summary->KeyFilter();
			$sSql = $view_reps_5_2_units_requiring_justification_summary->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $view_reps_5_2_units_requiring_justification_summary;

		// Initialize URLs
		$this->ViewUrl = $view_reps_5_2_units_requiring_justification_summary->ViewUrl();
		$this->EditUrl = $view_reps_5_2_units_requiring_justification_summary->EditUrl();
		$this->InlineEditUrl = $view_reps_5_2_units_requiring_justification_summary->InlineEditUrl();
		$this->CopyUrl = $view_reps_5_2_units_requiring_justification_summary->CopyUrl();
		$this->InlineCopyUrl = $view_reps_5_2_units_requiring_justification_summary->InlineCopyUrl();
		$this->DeleteUrl = $view_reps_5_2_units_requiring_justification_summary->DeleteUrl();

		// Call Row_Rendering event
		$view_reps_5_2_units_requiring_justification_summary->Row_Rendering();

		// Common render codes for all row types
		// Constituent University

		$view_reps_5_2_units_requiring_justification_summary->Constituent_University->CellCssStyle = "white-space: nowrap;";

		// PIs that Passed
		$view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->CellCssStyle = "white-space: nowrap;";

		// PIs that Requires Justificiation
		$view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->CellCssStyle = "white-space: nowrap;";

		// PIs with No Accomplishment
		$view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->CellCssStyle = "white-space: nowrap;";

		// No. of PI Participated
		$view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->CellCssStyle = "white-space: nowrap;";

		// Sequence
		// focalperson_ID

		if ($view_reps_5_2_units_requiring_justification_summary->RowType == UP_ROWTYPE_VIEW) { // View row

			// Constituent University
			$view_reps_5_2_units_requiring_justification_summary->Constituent_University->ViewValue = $view_reps_5_2_units_requiring_justification_summary->Constituent_University->CurrentValue;
			$view_reps_5_2_units_requiring_justification_summary->Constituent_University->ViewCustomAttributes = "";

			// PIs that Passed
			$view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->ViewValue = $view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->CurrentValue;
			$view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->ViewCustomAttributes = "";

			// PIs that Requires Justificiation
			$view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->ViewValue = $view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->CurrentValue;
			$view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->ViewCustomAttributes = "";

			// PIs with No Accomplishment
			$view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->ViewValue = $view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->CurrentValue;
			$view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->ViewCustomAttributes = "";

			// No. of PI Participated
			$view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->ViewValue = $view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->CurrentValue;
			$view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->ViewCustomAttributes = "";

			// Sequence
			$view_reps_5_2_units_requiring_justification_summary->Sequence->ViewValue = $view_reps_5_2_units_requiring_justification_summary->Sequence->CurrentValue;
			$view_reps_5_2_units_requiring_justification_summary->Sequence->ViewCustomAttributes = "";

			// focalperson_ID
			$view_reps_5_2_units_requiring_justification_summary->focalperson_ID->ViewValue = $view_reps_5_2_units_requiring_justification_summary->focalperson_ID->CurrentValue;
			$view_reps_5_2_units_requiring_justification_summary->focalperson_ID->ViewCustomAttributes = "";

			// Constituent University
			$view_reps_5_2_units_requiring_justification_summary->Constituent_University->LinkCustomAttributes = "";
			$view_reps_5_2_units_requiring_justification_summary->Constituent_University->HrefValue = "";
			$view_reps_5_2_units_requiring_justification_summary->Constituent_University->TooltipValue = "";

			// PIs that Passed
			$view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->LinkCustomAttributes = "";
			$view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->HrefValue = "";
			$view_reps_5_2_units_requiring_justification_summary->PIs_that_Passed->TooltipValue = "";

			// PIs that Requires Justificiation
			$view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->LinkCustomAttributes = "";
			$view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->HrefValue = "";
			$view_reps_5_2_units_requiring_justification_summary->PIs_that_Requires_Justificiation->TooltipValue = "";

			// PIs with No Accomplishment
			$view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->LinkCustomAttributes = "";
			$view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->HrefValue = "";
			$view_reps_5_2_units_requiring_justification_summary->PIs_with_No_Accomplishment->TooltipValue = "";

			// No. of PI Participated
			$view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->LinkCustomAttributes = "";
			$view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->HrefValue = "";
			$view_reps_5_2_units_requiring_justification_summary->No2E_of_PI_Participated->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($view_reps_5_2_units_requiring_justification_summary->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$view_reps_5_2_units_requiring_justification_summary->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $view_reps_5_2_units_requiring_justification_summary;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($view_reps_5_2_units_requiring_justification_summary->focalperson_ID->CurrentValue);
			}
		}
		return TRUE;
	}

	// PDF Export
	function ExportPDF($html) {
		echo($html);
		up_DeleteTmpImages();
		exit();
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'
	function Message_Showing(&$msg, $type) {

		// Example:
		//if ($type == 'success') $msg = "your success message";

	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt =& $this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example: 
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}
}
?>
