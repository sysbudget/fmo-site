<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_9_m_sa_mfo_questionsinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_9_m_sa_mfo_questions_list = new cfrm_9_m_sa_mfo_questions_list();
$Page =& $frm_9_m_sa_mfo_questions_list;

// Page init
$frm_9_m_sa_mfo_questions_list->Page_Init();

// Page main
$frm_9_m_sa_mfo_questions_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_9_m_sa_mfo_questions->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_9_m_sa_mfo_questions_list = new up_Page("frm_9_m_sa_mfo_questions_list");

// page properties
frm_9_m_sa_mfo_questions_list.PageID = "list"; // page ID
frm_9_m_sa_mfo_questions_list.FormID = "ffrm_9_m_sa_mfo_questionslist"; // form ID
var UP_PAGE_ID = frm_9_m_sa_mfo_questions_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_9_m_sa_mfo_questions_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_9_m_sa_mfo_questions_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_9_m_sa_mfo_questions_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_9_m_sa_mfo_questions_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var up_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
//-->

</script>
<?php } ?>
<?php if (($frm_9_m_sa_mfo_questions->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_9_m_sa_mfo_questions->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_9_m_sa_mfo_questions_list->TotalRecs = $frm_9_m_sa_mfo_questions->SelectRecordCount();
	} else {
		if ($frm_9_m_sa_mfo_questions_list->Recordset = $frm_9_m_sa_mfo_questions_list->LoadRecordset())
			$frm_9_m_sa_mfo_questions_list->TotalRecs = $frm_9_m_sa_mfo_questions_list->Recordset->RecordCount();
	}
	$frm_9_m_sa_mfo_questions_list->StartRec = 1;
	if ($frm_9_m_sa_mfo_questions_list->DisplayRecs <= 0 || ($frm_9_m_sa_mfo_questions->Export <> "" && $frm_9_m_sa_mfo_questions->ExportAll)) // Display all records
		$frm_9_m_sa_mfo_questions_list->DisplayRecs = $frm_9_m_sa_mfo_questions_list->TotalRecs;
	if (!($frm_9_m_sa_mfo_questions->Export <> "" && $frm_9_m_sa_mfo_questions->ExportAll))
		$frm_9_m_sa_mfo_questions_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_9_m_sa_mfo_questions_list->Recordset = $frm_9_m_sa_mfo_questions_list->LoadRecordset($frm_9_m_sa_mfo_questions_list->StartRec-1, $frm_9_m_sa_mfo_questions_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_9_m_sa_mfo_questions->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_9_m_sa_mfo_questions_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_9_m_sa_mfo_questions->Export == "" && $frm_9_m_sa_mfo_questions->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_9_m_sa_mfo_questions_list);" style="text-decoration: none;"><img id="frm_9_m_sa_mfo_questions_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_9_m_sa_mfo_questions_list_SearchPanel">
<form name="ffrm_9_m_sa_mfo_questionslistsrch" id="ffrm_9_m_sa_mfo_questionslistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_9_m_sa_mfo_questions">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_9_m_sa_mfo_questions->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_9_m_sa_mfo_questions_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_9_m_sa_mfo_questions->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_9_m_sa_mfo_questions->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_9_m_sa_mfo_questions->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_9_m_sa_mfo_questions_list->ShowPageHeader(); ?>
<?php
$frm_9_m_sa_mfo_questions_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_9_m_sa_mfo_questions->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_9_m_sa_mfo_questions->CurrentAction <> "gridadd" && $frm_9_m_sa_mfo_questions->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_9_m_sa_mfo_questions_list->Pager)) $frm_9_m_sa_mfo_questions_list->Pager = new cPrevNextPager($frm_9_m_sa_mfo_questions_list->StartRec, $frm_9_m_sa_mfo_questions_list->DisplayRecs, $frm_9_m_sa_mfo_questions_list->TotalRecs) ?>
<?php if ($frm_9_m_sa_mfo_questions_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_9_m_sa_mfo_questions_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_mfo_questions_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_mfo_questions_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_9_m_sa_mfo_questions_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_mfo_questions_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_mfo_questions_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_9_m_sa_mfo_questions_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_9_m_sa_mfo_questions_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_mfo_questions_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_mfo_questions_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_9_m_sa_mfo_questions_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_mfo_questions_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_mfo_questions_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_9_m_sa_mfo_questions_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_9_m_sa_mfo_questions_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_9_m_sa_mfo_questions_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_9_m_sa_mfo_questions_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_9_m_sa_mfo_questions_list->SearchWhere == "0=101") { ?>
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
<?php if ($Security->CanAdd()) { ?>
<a class="upGridLink" href="<?php echo $frm_9_m_sa_mfo_questions_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ffrm_9_m_sa_mfo_questionslist, '<?php echo $frm_9_m_sa_mfo_questions_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ffrm_9_m_sa_mfo_questionslist" id="ffrm_9_m_sa_mfo_questionslist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_9_m_sa_mfo_questions">
<div id="gmp_frm_9_m_sa_mfo_questions" class="upGridMiddlePanel">
<?php if ($frm_9_m_sa_mfo_questions_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_9_m_sa_mfo_questions->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_9_m_sa_mfo_questions_list->RenderListOptions();

// Render list options (header, left)
$frm_9_m_sa_mfo_questions_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->Visible) { // mfo_question_online_pi_seq ?>
	<?php if ($frm_9_m_sa_mfo_questions->SortUrl($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq) == "") { ?>
		<td><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_mfo_questions->SortUrl($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->Visible) { // mfo_question_online_mfo_name ?>
	<?php if ($frm_9_m_sa_mfo_questions->SortUrl($frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name) == "") { ?>
		<td><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_mfo_questions->SortUrl($frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->Visible) { // mfo_question_online_pi_question ?>
	<?php if ($frm_9_m_sa_mfo_questions->SortUrl($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question) == "") { ?>
		<td><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_mfo_questions->SortUrl($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->Visible) { // mfo_question_online_computation_du_cu_summary_name ?>
	<?php if ($frm_9_m_sa_mfo_questions->SortUrl($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name) == "") { ?>
		<td><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_mfo_questions->SortUrl($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->Visible) { // mfo_question_online_computation_du_cu_summary ?>
	<?php if ($frm_9_m_sa_mfo_questions->SortUrl($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary) == "") { ?>
		<td><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_mfo_questions->SortUrl($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_9_m_sa_mfo_questions_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_9_m_sa_mfo_questions->ExportAll && $frm_9_m_sa_mfo_questions->Export <> "") {
	$frm_9_m_sa_mfo_questions_list->StopRec = $frm_9_m_sa_mfo_questions_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_9_m_sa_mfo_questions_list->TotalRecs > $frm_9_m_sa_mfo_questions_list->StartRec + $frm_9_m_sa_mfo_questions_list->DisplayRecs - 1)
		$frm_9_m_sa_mfo_questions_list->StopRec = $frm_9_m_sa_mfo_questions_list->StartRec + $frm_9_m_sa_mfo_questions_list->DisplayRecs - 1;
	else
		$frm_9_m_sa_mfo_questions_list->StopRec = $frm_9_m_sa_mfo_questions_list->TotalRecs;
}
$frm_9_m_sa_mfo_questions_list->RecCnt = $frm_9_m_sa_mfo_questions_list->StartRec - 1;
if ($frm_9_m_sa_mfo_questions_list->Recordset && !$frm_9_m_sa_mfo_questions_list->Recordset->EOF) {
	$frm_9_m_sa_mfo_questions_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_9_m_sa_mfo_questions_list->StartRec > 1)
		$frm_9_m_sa_mfo_questions_list->Recordset->Move($frm_9_m_sa_mfo_questions_list->StartRec - 1);
} elseif (!$frm_9_m_sa_mfo_questions->AllowAddDeleteRow && $frm_9_m_sa_mfo_questions_list->StopRec == 0) {
	$frm_9_m_sa_mfo_questions_list->StopRec = $frm_9_m_sa_mfo_questions->GridAddRowCount;
}

// Initialize aggregate
$frm_9_m_sa_mfo_questions->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_9_m_sa_mfo_questions->ResetAttrs();
$frm_9_m_sa_mfo_questions_list->RenderRow();
$frm_9_m_sa_mfo_questions_list->RowCnt = 0;
while ($frm_9_m_sa_mfo_questions_list->RecCnt < $frm_9_m_sa_mfo_questions_list->StopRec) {
	$frm_9_m_sa_mfo_questions_list->RecCnt++;
	if (intval($frm_9_m_sa_mfo_questions_list->RecCnt) >= intval($frm_9_m_sa_mfo_questions_list->StartRec)) {
		$frm_9_m_sa_mfo_questions_list->RowCnt++;

		// Set up key count
		$frm_9_m_sa_mfo_questions_list->KeyCount = $frm_9_m_sa_mfo_questions_list->RowIndex;

		// Init row class and style
		$frm_9_m_sa_mfo_questions->ResetAttrs();
		$frm_9_m_sa_mfo_questions->CssClass = "";
		if ($frm_9_m_sa_mfo_questions->CurrentAction == "gridadd") {
		} else {
			$frm_9_m_sa_mfo_questions_list->LoadRowValues($frm_9_m_sa_mfo_questions_list->Recordset); // Load row values
		}
		$frm_9_m_sa_mfo_questions->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_9_m_sa_mfo_questions->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_9_m_sa_mfo_questions_list->RenderRow();

		// Render list options
		$frm_9_m_sa_mfo_questions_list->RenderListOptions();
?>
	<tr<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_9_m_sa_mfo_questions_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->Visible) { // mfo_question_online_pi_seq ?>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->ViewAttributes() ?>><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->ListViewValue() ?></div>
<a name="<?php echo $frm_9_m_sa_mfo_questions_list->PageObjName . "_row_" . $frm_9_m_sa_mfo_questions_list->RowCnt ?>" id="<?php echo $frm_9_m_sa_mfo_questions_list->PageObjName . "_row_" . $frm_9_m_sa_mfo_questions_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->Visible) { // mfo_question_online_mfo_name ?>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->ViewAttributes() ?>><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->Visible) { // mfo_question_online_pi_question ?>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->ViewAttributes() ?>><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->Visible) { // mfo_question_online_computation_du_cu_summary_name ?>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->ViewAttributes() ?>><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->Visible) { // mfo_question_online_computation_du_cu_summary ?>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->ViewAttributes() ?>><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_9_m_sa_mfo_questions_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_9_m_sa_mfo_questions->CurrentAction <> "gridadd")
		$frm_9_m_sa_mfo_questions_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_9_m_sa_mfo_questions_list->Recordset)
	$frm_9_m_sa_mfo_questions_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_9_m_sa_mfo_questions->Export == "" && $frm_9_m_sa_mfo_questions->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_9_m_sa_mfo_questions_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_9_m_sa_mfo_questions->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_9_m_sa_mfo_questions_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_9_m_sa_mfo_questions_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_9_m_sa_mfo_questions';

	// Page object name
	var $PageObjName = 'frm_9_m_sa_mfo_questions_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_9_m_sa_mfo_questions;
		if ($frm_9_m_sa_mfo_questions->UseTokenInUrl) $PageUrl .= "t=" . $frm_9_m_sa_mfo_questions->TableVar . "&"; // Add page token
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
		global $objForm, $frm_9_m_sa_mfo_questions;
		if ($frm_9_m_sa_mfo_questions->UseTokenInUrl) {
			if ($objForm)
				return ($frm_9_m_sa_mfo_questions->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_9_m_sa_mfo_questions->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_9_m_sa_mfo_questions_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_mfo_questions)
		if (!isset($GLOBALS["frm_9_m_sa_mfo_questions"])) {
			$GLOBALS["frm_9_m_sa_mfo_questions"] = new cfrm_9_m_sa_mfo_questions();
			$GLOBALS["Table"] =& $GLOBALS["frm_9_m_sa_mfo_questions"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_9_m_sa_mfo_questionsadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_9_m_sa_mfo_questionsdelete.php";
		$this->MultiUpdateUrl = "frm_9_m_sa_mfo_questionsupdate.php";

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_9_m_sa_mfo_questions', TRUE);

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
		global $frm_9_m_sa_mfo_questions;

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

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$frm_9_m_sa_mfo_questions->Export = $_GET["export"];
		} elseif (up_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$frm_9_m_sa_mfo_questions->Export = $_POST["exporttype"];
		} else {
			$frm_9_m_sa_mfo_questions->setExportReturnUrl(up_CurrentUrl());
		}
		$gsExport = $frm_9_m_sa_mfo_questions->Export; // Get export parameter, used in header
		$gsExportFile = $frm_9_m_sa_mfo_questions->TableVar; // Get export file, used in header
		$Charset = (UP_CHARSET <> "") ? ";charset=" . UP_CHARSET : ""; // Charset used in header
		if ($frm_9_m_sa_mfo_questions->Export == "csv") {
			header('Content-Type: application/csv' . $Charset);
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_9_m_sa_mfo_questions->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->SetupListOptions();

		// Setup export options
		$this->SetupExportOptions();

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_9_m_sa_mfo_questions;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($frm_9_m_sa_mfo_questions->Export <> "" ||
				$frm_9_m_sa_mfo_questions->CurrentAction == "gridadd" ||
				$frm_9_m_sa_mfo_questions->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_9_m_sa_mfo_questions->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_9_m_sa_mfo_questions->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_9_m_sa_mfo_questions->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_9_m_sa_mfo_questions->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_9_m_sa_mfo_questions->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_9_m_sa_mfo_questions->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_9_m_sa_mfo_questions->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$frm_9_m_sa_mfo_questions->setSessionWhere($sFilter);
		$frm_9_m_sa_mfo_questions->CurrentFilter = "";

		// Export data only
		if (in_array($frm_9_m_sa_mfo_questions->Export, array("html","word","excel","xml","csv","email","pdf"))) {
			$this->ExportData();
			if ($frm_9_m_sa_mfo_questions->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_9_m_sa_mfo_questions;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_expected_answer, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_expected_trend, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_expected_numerator, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_expected_denominator, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_mfo_questions->pi_sub, $Keyword);
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
		global $Security, $frm_9_m_sa_mfo_questions;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_9_m_sa_mfo_questions->BasicSearchKeyword;
		$sSearchType = $frm_9_m_sa_mfo_questions->BasicSearchType;
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
			$frm_9_m_sa_mfo_questions->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_9_m_sa_mfo_questions->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_9_m_sa_mfo_questions;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_9_m_sa_mfo_questions->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_9_m_sa_mfo_questions;
		$frm_9_m_sa_mfo_questions->setSessionBasicSearchKeyword("");
		$frm_9_m_sa_mfo_questions->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_9_m_sa_mfo_questions;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_9_m_sa_mfo_questions->BasicSearchKeyword = $frm_9_m_sa_mfo_questions->getSessionBasicSearchKeyword();
			$frm_9_m_sa_mfo_questions->BasicSearchType = $frm_9_m_sa_mfo_questions->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_9_m_sa_mfo_questions;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_9_m_sa_mfo_questions->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_9_m_sa_mfo_questions->CurrentOrderType = @$_GET["ordertype"];
			$frm_9_m_sa_mfo_questions->UpdateSort($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq); // mfo_question_online_pi_seq
			$frm_9_m_sa_mfo_questions->UpdateSort($frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name); // mfo_question_online_mfo_name
			$frm_9_m_sa_mfo_questions->UpdateSort($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question); // mfo_question_online_pi_question
			$frm_9_m_sa_mfo_questions->UpdateSort($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name); // mfo_question_online_computation_du_cu_summary_name
			$frm_9_m_sa_mfo_questions->UpdateSort($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary); // mfo_question_online_computation_du_cu_summary
			$frm_9_m_sa_mfo_questions->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_9_m_sa_mfo_questions;
		$sOrderBy = $frm_9_m_sa_mfo_questions->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_9_m_sa_mfo_questions->SqlOrderBy() <> "") {
				$sOrderBy = $frm_9_m_sa_mfo_questions->SqlOrderBy();
				$frm_9_m_sa_mfo_questions->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_9_m_sa_mfo_questions;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_9_m_sa_mfo_questions->setSessionOrderBy($sOrderBy);
				$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->setSort("");
				$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->setSort("");
				$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->setSort("");
				$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->setSort("");
				$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_9_m_sa_mfo_questions->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_9_m_sa_mfo_questions;

		// "edit"
		$item =& $this->ListOptions->Add("edit");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanEdit();
		$item->OnLeft = TRUE;

		// "checkbox"
		$item =& $this->ListOptions->Add("checkbox");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanDelete();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"frm_9_m_sa_mfo_questions_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_9_m_sa_mfo_questions, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_id->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_9_m_sa_mfo_questions;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_9_m_sa_mfo_questions;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_9_m_sa_mfo_questions->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_9_m_sa_mfo_questions->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_9_m_sa_mfo_questions->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_9_m_sa_mfo_questions->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_9_m_sa_mfo_questions->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_9_m_sa_mfo_questions->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_9_m_sa_mfo_questions;
		$frm_9_m_sa_mfo_questions->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_9_m_sa_mfo_questions->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_9_m_sa_mfo_questions;

		// Call Recordset Selecting event
		$frm_9_m_sa_mfo_questions->Recordset_Selecting($frm_9_m_sa_mfo_questions->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_9_m_sa_mfo_questions->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_9_m_sa_mfo_questions->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_9_m_sa_mfo_questions;
		$sFilter = $frm_9_m_sa_mfo_questions->KeyFilter();

		// Call Row Selecting event
		$frm_9_m_sa_mfo_questions->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_9_m_sa_mfo_questions->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_mfo_questions->SQL();
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
		global $conn, $frm_9_m_sa_mfo_questions;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_9_m_sa_mfo_questions->Row_Selected($row);
		$frm_9_m_sa_mfo_questions->mfo_question_id->setDbValue($rs->fields('mfo_question_id'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->setDbValue($rs->fields('mfo_question_online_pi_seq'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->setDbValue($rs->fields('mfo_question_online_mfo_name'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->setDbValue($rs->fields('mfo_question_online_pi_question'));
		$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->setDbValue($rs->fields('mfo_question_expected_answer'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->setDbValue($rs->fields('mfo_question_online_insert_question_mfo'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->setDbValue($rs->fields('mfo_question_online_insert_question_mfo_name_rep'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->setDbValue($rs->fields('mfo_question_online_computation_du_cu_summary_name'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->setDbValue($rs->fields('mfo_question_online_computation_du_cu_summary'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->setDbValue($rs->fields('mfo_question_online_computation_denominator'));
		$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->setDbValue($rs->fields('mfo_question_supporting_document_requirement'));
		$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->setDbValue($rs->fields('mfo_question_expected_trend'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->setDbValue($rs->fields('mfo_question_online_ask_y_n'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->setDbValue($rs->fields('mfo_question_online_pi_question_numerator'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->setDbValue($rs->fields('mfo_question_online_pi_question_denominator'));
		$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->setDbValue($rs->fields('mfo_question_expected_numerator'));
		$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->setDbValue($rs->fields('mfo_question_expected_denominator'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->setDbValue($rs->fields('mfo_question_report_mfo_name'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->setDbValue($rs->fields('mfo_question_report_form_a_pi_question'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->setDbValue($rs->fields('mfo_question_report_form_a_1_mfo'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->setDbValue($rs->fields('mfo_question_report_form_a_1_sequence'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->setDbValue($rs->fields('mfo_question_report_form_a_gaa_value'));
		$frm_9_m_sa_mfo_questions->pi_no->setDbValue($rs->fields('pi_no'));
		$frm_9_m_sa_mfo_questions->pi_sub->setDbValue($rs->fields('pi_sub'));
		$frm_9_m_sa_mfo_questions->iatf_2013->setDbValue($rs->fields('iatf_2013'));
		$frm_9_m_sa_mfo_questions->iatf_2014->setDbValue($rs->fields('iatf_2014'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_9_m_sa_mfo_questions;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_9_m_sa_mfo_questions->getKey("mfo_question_id")) <> "")
			$frm_9_m_sa_mfo_questions->mfo_question_id->CurrentValue = $frm_9_m_sa_mfo_questions->getKey("mfo_question_id"); // mfo_question_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_9_m_sa_mfo_questions->CurrentFilter = $frm_9_m_sa_mfo_questions->KeyFilter();
			$sSql = $frm_9_m_sa_mfo_questions->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_mfo_questions;

		// Initialize URLs
		$this->ViewUrl = $frm_9_m_sa_mfo_questions->ViewUrl();
		$this->EditUrl = $frm_9_m_sa_mfo_questions->EditUrl();
		$this->InlineEditUrl = $frm_9_m_sa_mfo_questions->InlineEditUrl();
		$this->CopyUrl = $frm_9_m_sa_mfo_questions->CopyUrl();
		$this->InlineCopyUrl = $frm_9_m_sa_mfo_questions->InlineCopyUrl();
		$this->DeleteUrl = $frm_9_m_sa_mfo_questions->DeleteUrl();

		// Call Row_Rendering event
		$frm_9_m_sa_mfo_questions->Row_Rendering();

		// Common render codes for all row types
		// mfo_question_id
		// mfo_question_online_pi_seq
		// mfo_question_online_mfo_name
		// mfo_question_online_pi_question
		// mfo_question_expected_answer
		// mfo_question_online_insert_question_mfo
		// mfo_question_online_insert_question_mfo_name_rep
		// mfo_question_online_computation_du_cu_summary_name
		// mfo_question_online_computation_du_cu_summary
		// mfo_question_online_computation_denominator
		// mfo_question_supporting_document_requirement
		// mfo_question_expected_trend
		// mfo_question_online_ask_y_n
		// mfo_question_online_pi_question_numerator
		// mfo_question_online_pi_question_denominator
		// mfo_question_expected_numerator
		// mfo_question_expected_denominator
		// mfo_question_report_mfo_name
		// mfo_question_report_form_a_pi_question
		// mfo_question_report_form_a_1_mfo
		// mfo_question_report_form_a_1_sequence
		// mfo_question_report_form_a_gaa_value
		// pi_no
		// pi_sub
		// iatf_2013
		// iatf_2014

		if ($frm_9_m_sa_mfo_questions->RowType == UP_ROWTYPE_VIEW) { // View row

			// mfo_question_online_pi_seq
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->ViewCustomAttributes = "";

			// mfo_question_online_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->ViewCustomAttributes = "";

			// mfo_question_online_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->ViewCustomAttributes = "";

			// mfo_question_online_computation_du_cu_summary_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->ViewCustomAttributes = "";

			// mfo_question_online_computation_du_cu_summary
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->ViewCustomAttributes = "";

			// mfo_question_online_pi_seq
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->TooltipValue = "";

			// mfo_question_online_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->TooltipValue = "";

			// mfo_question_online_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->TooltipValue = "";

			// mfo_question_online_computation_du_cu_summary_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->TooltipValue = "";

			// mfo_question_online_computation_du_cu_summary
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_9_m_sa_mfo_questions->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_9_m_sa_mfo_questions->Row_Rendered();
	}

	// Set up export options
	function SetupExportOptions() {
		global $Language, $frm_9_m_sa_mfo_questions;

		// Printer friendly
		$item =& $this->ExportOptions->Add("print");
		$item->Body = "<a href=\"" . $this->ExportPrintUrl . "\">" . $Language->Phrase("PrinterFriendly") . "</a>";
		$item->Visible = FALSE;

		// Export to Excel
		$item =& $this->ExportOptions->Add("excel");
		$item->Body = "<a href=\"" . $this->ExportExcelUrl . "\">" . $Language->Phrase("ExportToExcel") . "</a>";
		$item->Visible = FALSE;

		// Export to Word
		$item =& $this->ExportOptions->Add("word");
		$item->Body = "<a href=\"" . $this->ExportWordUrl . "\">" . $Language->Phrase("ExportToWord") . "</a>";
		$item->Visible = FALSE;

		// Export to Html
		$item =& $this->ExportOptions->Add("html");
		$item->Body = "<a href=\"" . $this->ExportHtmlUrl . "\">" . $Language->Phrase("ExportToHtml") . "</a>";
		$item->Visible = FALSE;

		// Export to Xml
		$item =& $this->ExportOptions->Add("xml");
		$item->Body = "<a href=\"" . $this->ExportXmlUrl . "\">" . $Language->Phrase("ExportToXml") . "</a>";
		$item->Visible = FALSE;

		// Export to Csv
		$item =& $this->ExportOptions->Add("csv");
		$item->Body = "<a href=\"" . $this->ExportCsvUrl . "\">" . $Language->Phrase("ExportToCsv") . "</a>";
		$item->Visible = FALSE;

		// Export to Pdf
		$item =& $this->ExportOptions->Add("pdf");
		$item->Body = "<a href=\"" . $this->ExportPdfUrl . "\">" . $Language->Phrase("ExportToPDF") . "</a>";
		$item->Visible = FALSE;

		// Export to Email
		$item =& $this->ExportOptions->Add("email");
		$item->Body = "<a name=\"emf_frm_9_m_sa_mfo_questions\" id=\"emf_frm_9_m_sa_mfo_questions\" href=\"javascript:void(0);\" onclick=\"up_EmailDialogShow({lnk:'emf_frm_9_m_sa_mfo_questions',hdr:upLanguage.Phrase('ExportToEmail'),f:document.ffrm_9_m_sa_mfo_questionslist,sel:false});\">" . $Language->Phrase("ExportToEmail") . "</a>";
		$item->Visible = FALSE;

		// Hide options for export/action
		if ($frm_9_m_sa_mfo_questions->Export <> "" ||
			$frm_9_m_sa_mfo_questions->CurrentAction <> "")
			$this->ExportOptions->HideAllOptions();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	function ExportData() {
		global $frm_9_m_sa_mfo_questions;
		$utf8 = (strtolower(UP_CHARSET) == "utf-8");
		$bSelectLimit = UP_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->TotalRecs = $frm_9_m_sa_mfo_questions->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;

		// Export all
		if ($frm_9_m_sa_mfo_questions->ExportAll) {
			$this->DisplayRecs = $this->TotalRecs;
			$this->StopRec = $this->TotalRecs;
		} else { // Export one page only
			$this->SetUpStartRec(); // Set up start record position

			// Set the last record to display
			if ($this->DisplayRecs < 0) {
				$this->StopRec = $this->TotalRecs;
			} else {
				$this->StopRec = $this->StartRec + $this->DisplayRecs - 1;
			}
		}
		if ($bSelectLimit)
			$rs = $this->LoadRecordset($this->StartRec-1, $this->DisplayRecs);
		if (!$rs) {
			header("Content-Type:"); // Remove header
			header("Content-Disposition:");
			$this->ShowMessage();
			return;
		}
		if ($frm_9_m_sa_mfo_questions->Export == "xml") {
			$XmlDoc = new cXMLDocument(UP_XML_ENCODING);
		} else {
			$ExportDoc = new cExportDocument($frm_9_m_sa_mfo_questions, "h");
		}
		$ParentTable = "";
		if ($bSelectLimit) {
			$StartRec = 1;
			$StopRec = $this->DisplayRecs;
		} else {
			$StartRec = $this->StartRec;
			$StopRec = $this->StopRec;
		}
		if ($frm_9_m_sa_mfo_questions->Export == "xml") {
			$frm_9_m_sa_mfo_questions->ExportXmlDocument($XmlDoc, ($ParentTable <> ""), $rs, $StartRec, $StopRec, "");
		} else {
			$sHeader = $this->PageHeader;
			$this->Page_DataRendering($sHeader);
			$ExportDoc->Text .= $sHeader;
			$frm_9_m_sa_mfo_questions->ExportDocument($ExportDoc, $rs, $StartRec, $StopRec, "");
			$sFooter = $this->PageFooter;
			$this->Page_DataRendered($sFooter);
			$ExportDoc->Text .= $sFooter;
		}

		// Close recordset
		$rs->Close();

		// Export header and footer
		if ($frm_9_m_sa_mfo_questions->Export <> "xml") {
			$ExportDoc->ExportHeaderAndFooter();
		}

		// Clean output buffer
		if (!UP_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($frm_9_m_sa_mfo_questions->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (UP_DEBUG_ENABLED)
			echo up_DebugMsg();

		// Output data
		if ($frm_9_m_sa_mfo_questions->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($frm_9_m_sa_mfo_questions->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($frm_9_m_sa_mfo_questions->ExportReturnUrl());
		} elseif ($frm_9_m_sa_mfo_questions->Export == "pdf") {
			$this->ExportPDF($ExportDoc->Text);
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Export PDF
	function ExportPDF($html) {
		global $gsExportFile;
		include_once "dompdf060b2/dompdf_config.inc.php";
		@ini_set("memory_limit", UP_PDF_MEMORY_LIMIT);
		set_time_limit(UP_PDF_TIME_LIMIT);
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->set_paper("a4", "portrait");
		$dompdf->render();
		ob_end_clean();
		up_DeleteTmpImages();
		$dompdf->stream($gsExportFile . ".pdf", array("Attachment" => 1)); // 0 to open in browser, 1 to download

//		exit();
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
