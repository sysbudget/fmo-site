<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_2_a_fi_rep_form_a_raw_data_cuinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_2_a_fi_rep_form_a_raw_data_cu_list = new cfrm_2_a_fi_rep_form_a_raw_data_cu_list();
$Page =& $frm_2_a_fi_rep_form_a_raw_data_cu_list;

// Page init
$frm_2_a_fi_rep_form_a_raw_data_cu_list->Page_Init();

// Page main
$frm_2_a_fi_rep_form_a_raw_data_cu_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_2_a_fi_rep_form_a_raw_data_cu_list = new up_Page("frm_2_a_fi_rep_form_a_raw_data_cu_list");

// page properties
frm_2_a_fi_rep_form_a_raw_data_cu_list.PageID = "list"; // page ID
frm_2_a_fi_rep_form_a_raw_data_cu_list.FormID = "ffrm_2_a_fi_rep_form_a_raw_data_culist"; // form ID
var UP_PAGE_ID = frm_2_a_fi_rep_form_a_raw_data_cu_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_2_a_fi_rep_form_a_raw_data_cu_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_2_a_fi_rep_form_a_raw_data_cu_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_2_a_fi_rep_form_a_raw_data_cu_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_2_a_fi_rep_form_a_raw_data_cu_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_2_a_fi_rep_form_a_raw_data_cu->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_2_a_fi_rep_form_a_raw_data_cu->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_2_a_fi_rep_form_a_raw_data_cu_list->TotalRecs = $frm_2_a_fi_rep_form_a_raw_data_cu->SelectRecordCount();
	} else {
		if ($frm_2_a_fi_rep_form_a_raw_data_cu_list->Recordset = $frm_2_a_fi_rep_form_a_raw_data_cu_list->LoadRecordset())
			$frm_2_a_fi_rep_form_a_raw_data_cu_list->TotalRecs = $frm_2_a_fi_rep_form_a_raw_data_cu_list->Recordset->RecordCount();
	}
	$frm_2_a_fi_rep_form_a_raw_data_cu_list->StartRec = 1;
	if ($frm_2_a_fi_rep_form_a_raw_data_cu_list->DisplayRecs <= 0 || ($frm_2_a_fi_rep_form_a_raw_data_cu->Export <> "" && $frm_2_a_fi_rep_form_a_raw_data_cu->ExportAll)) // Display all records
		$frm_2_a_fi_rep_form_a_raw_data_cu_list->DisplayRecs = $frm_2_a_fi_rep_form_a_raw_data_cu_list->TotalRecs;
	if (!($frm_2_a_fi_rep_form_a_raw_data_cu->Export <> "" && $frm_2_a_fi_rep_form_a_raw_data_cu->ExportAll))
		$frm_2_a_fi_rep_form_a_raw_data_cu_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_2_a_fi_rep_form_a_raw_data_cu_list->Recordset = $frm_2_a_fi_rep_form_a_raw_data_cu_list->LoadRecordset($frm_2_a_fi_rep_form_a_raw_data_cu_list->StartRec-1, $frm_2_a_fi_rep_form_a_raw_data_cu_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_2_a_fi_rep_form_a_raw_data_cu_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Export == "" && $frm_2_a_fi_rep_form_a_raw_data_cu->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_2_a_fi_rep_form_a_raw_data_cu_list);" style="text-decoration: none;"><img id="frm_2_a_fi_rep_form_a_raw_data_cu_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_2_a_fi_rep_form_a_raw_data_cu_list_SearchPanel">
<form name="ffrm_2_a_fi_rep_form_a_raw_data_culistsrch" id="ffrm_2_a_fi_rep_form_a_raw_data_culistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_2_a_fi_rep_form_a_raw_data_cu">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_2_a_fi_rep_form_a_raw_data_cu->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_2_a_fi_rep_form_a_raw_data_cu_list->ShowPageHeader(); ?>
<?php
$frm_2_a_fi_rep_form_a_raw_data_cu_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->CurrentAction <> "gridadd" && $frm_2_a_fi_rep_form_a_raw_data_cu->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager)) $frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager = new cPrevNextPager($frm_2_a_fi_rep_form_a_raw_data_cu_list->StartRec, $frm_2_a_fi_rep_form_a_raw_data_cu_list->DisplayRecs, $frm_2_a_fi_rep_form_a_raw_data_cu_list->TotalRecs) ?>
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->PageUrl() ?>start=<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->PageUrl() ?>start=<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->PageUrl() ?>start=<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->PageUrl() ?>start=<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu_list->SearchWhere == "0=101") { ?>
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
<form name="ffrm_2_a_fi_rep_form_a_raw_data_culist" id="ffrm_2_a_fi_rep_form_a_raw_data_culist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_2_a_fi_rep_form_a_raw_data_cu">
<div id="gmp_frm_2_a_fi_rep_form_a_raw_data_cu" class="upGridMiddlePanel">
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_2_a_fi_rep_form_a_raw_data_cu_list->RenderListOptions();

// Render list options (header, left)
$frm_2_a_fi_rep_form_a_raw_data_cu_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->Visible) { // CU Name ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->MFO->Visible) { // MFO ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->MFO) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->MFO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->MFO) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->MFO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->MFO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_rep_form_a_raw_data_cu->MFO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Question->Visible) { // Question ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Question) == "") { ?>
		<td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Question->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Question) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Question->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Question->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_rep_form_a_raw_data_cu->Question->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Target->Visible) { // Target ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Target) == "") { ?>
		<td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Target) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Target->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_rep_form_a_raw_data_cu->Target->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->Visible) { // Target Remarks ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks) == "") { ?>
		<td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->Visible) { // Accomplishment ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment) == "") { ?>
		<td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->Visible) { // Numerator (A) ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29) == "") { ?>
		<td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->Visible) { // Denominator (A) ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29) == "") { ?>
		<td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->Visible) { // Accomplishment Remarks ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks) == "") { ?>
		<td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->Visible) { // Below 100% Performance Rating ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating) == "") { ?>
		<td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->Visible) { // 100% to 120% Performance Rating ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating) == "") { ?>
		<td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->Visible) { // Above 120% Performance Rating ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating) == "") { ?>
		<td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->SortUrl($frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_2_a_fi_rep_form_a_raw_data_cu_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_2_a_fi_rep_form_a_raw_data_cu->ExportAll && $frm_2_a_fi_rep_form_a_raw_data_cu->Export <> "") {
	$frm_2_a_fi_rep_form_a_raw_data_cu_list->StopRec = $frm_2_a_fi_rep_form_a_raw_data_cu_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_2_a_fi_rep_form_a_raw_data_cu_list->TotalRecs > $frm_2_a_fi_rep_form_a_raw_data_cu_list->StartRec + $frm_2_a_fi_rep_form_a_raw_data_cu_list->DisplayRecs - 1)
		$frm_2_a_fi_rep_form_a_raw_data_cu_list->StopRec = $frm_2_a_fi_rep_form_a_raw_data_cu_list->StartRec + $frm_2_a_fi_rep_form_a_raw_data_cu_list->DisplayRecs - 1;
	else
		$frm_2_a_fi_rep_form_a_raw_data_cu_list->StopRec = $frm_2_a_fi_rep_form_a_raw_data_cu_list->TotalRecs;
}
$frm_2_a_fi_rep_form_a_raw_data_cu_list->RecCnt = $frm_2_a_fi_rep_form_a_raw_data_cu_list->StartRec - 1;
if ($frm_2_a_fi_rep_form_a_raw_data_cu_list->Recordset && !$frm_2_a_fi_rep_form_a_raw_data_cu_list->Recordset->EOF) {
	$frm_2_a_fi_rep_form_a_raw_data_cu_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_2_a_fi_rep_form_a_raw_data_cu_list->StartRec > 1)
		$frm_2_a_fi_rep_form_a_raw_data_cu_list->Recordset->Move($frm_2_a_fi_rep_form_a_raw_data_cu_list->StartRec - 1);
} elseif (!$frm_2_a_fi_rep_form_a_raw_data_cu->AllowAddDeleteRow && $frm_2_a_fi_rep_form_a_raw_data_cu_list->StopRec == 0) {
	$frm_2_a_fi_rep_form_a_raw_data_cu_list->StopRec = $frm_2_a_fi_rep_form_a_raw_data_cu->GridAddRowCount;
}

// Initialize aggregate
$frm_2_a_fi_rep_form_a_raw_data_cu->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_2_a_fi_rep_form_a_raw_data_cu->ResetAttrs();
$frm_2_a_fi_rep_form_a_raw_data_cu_list->RenderRow();
$frm_2_a_fi_rep_form_a_raw_data_cu_list->RowCnt = 0;
while ($frm_2_a_fi_rep_form_a_raw_data_cu_list->RecCnt < $frm_2_a_fi_rep_form_a_raw_data_cu_list->StopRec) {
	$frm_2_a_fi_rep_form_a_raw_data_cu_list->RecCnt++;
	if (intval($frm_2_a_fi_rep_form_a_raw_data_cu_list->RecCnt) >= intval($frm_2_a_fi_rep_form_a_raw_data_cu_list->StartRec)) {
		$frm_2_a_fi_rep_form_a_raw_data_cu_list->RowCnt++;

		// Set up key count
		$frm_2_a_fi_rep_form_a_raw_data_cu_list->KeyCount = $frm_2_a_fi_rep_form_a_raw_data_cu_list->RowIndex;

		// Init row class and style
		$frm_2_a_fi_rep_form_a_raw_data_cu->ResetAttrs();
		$frm_2_a_fi_rep_form_a_raw_data_cu->CssClass = "";
		if ($frm_2_a_fi_rep_form_a_raw_data_cu->CurrentAction == "gridadd") {
		} else {
			$frm_2_a_fi_rep_form_a_raw_data_cu_list->LoadRowValues($frm_2_a_fi_rep_form_a_raw_data_cu_list->Recordset); // Load row values
		}
		$frm_2_a_fi_rep_form_a_raw_data_cu->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_2_a_fi_rep_form_a_raw_data_cu->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_2_a_fi_rep_form_a_raw_data_cu_list->RenderRow();

		// Render list options
		$frm_2_a_fi_rep_form_a_raw_data_cu_list->RenderListOptions();
?>
	<tr<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_2_a_fi_rep_form_a_raw_data_cu_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->Visible) { // CU Name ?>
		<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->ListViewValue() ?></div>
<a name="<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->PageObjName . "_row_" . $frm_2_a_fi_rep_form_a_raw_data_cu_list->RowCnt ?>" id="<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu_list->PageObjName . "_row_" . $frm_2_a_fi_rep_form_a_raw_data_cu_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->MFO->Visible) { // MFO ?>
		<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->MFO->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->MFO->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->MFO->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Question->Visible) { // Question ?>
		<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Question->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Question->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Question->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Target->Visible) { // Target ?>
		<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->Visible) { // Target Remarks ?>
		<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->Visible) { // Accomplishment ?>
		<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->Visible) { // Numerator (A) ?>
		<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->Visible) { // Denominator (A) ?>
		<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->Visible) { // Accomplishment Remarks ?>
		<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->Visible) { // Below 100% Performance Rating ?>
		<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->Visible) { // 100% to 120% Performance Rating ?>
		<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->Visible) { // Above 120% Performance Rating ?>
		<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_2_a_fi_rep_form_a_raw_data_cu_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_2_a_fi_rep_form_a_raw_data_cu->CurrentAction <> "gridadd")
		$frm_2_a_fi_rep_form_a_raw_data_cu_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_2_a_fi_rep_form_a_raw_data_cu_list->Recordset)
	$frm_2_a_fi_rep_form_a_raw_data_cu_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Export == "" && $frm_2_a_fi_rep_form_a_raw_data_cu->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_2_a_fi_rep_form_a_raw_data_cu_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_2_a_fi_rep_form_a_raw_data_cu->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_2_a_fi_rep_form_a_raw_data_cu_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_2_a_fi_rep_form_a_raw_data_cu_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_2_a_fi_rep_form_a_raw_data_cu';

	// Page object name
	var $PageObjName = 'frm_2_a_fi_rep_form_a_raw_data_cu_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_2_a_fi_rep_form_a_raw_data_cu;
		if ($frm_2_a_fi_rep_form_a_raw_data_cu->UseTokenInUrl) $PageUrl .= "t=" . $frm_2_a_fi_rep_form_a_raw_data_cu->TableVar . "&"; // Add page token
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
		global $objForm, $frm_2_a_fi_rep_form_a_raw_data_cu;
		if ($frm_2_a_fi_rep_form_a_raw_data_cu->UseTokenInUrl) {
			if ($objForm)
				return ($frm_2_a_fi_rep_form_a_raw_data_cu->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_2_a_fi_rep_form_a_raw_data_cu->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_2_a_fi_rep_form_a_raw_data_cu_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_2_a_fi_rep_form_a_raw_data_cu)
		if (!isset($GLOBALS["frm_2_a_fi_rep_form_a_raw_data_cu"])) {
			$GLOBALS["frm_2_a_fi_rep_form_a_raw_data_cu"] = new cfrm_2_a_fi_rep_form_a_raw_data_cu();
			$GLOBALS["Table"] =& $GLOBALS["frm_2_a_fi_rep_form_a_raw_data_cu"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_2_a_fi_rep_form_a_raw_data_cuadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_2_a_fi_rep_form_a_raw_data_cudelete.php";
		$this->MultiUpdateUrl = "frm_2_a_fi_rep_form_a_raw_data_cuupdate.php";

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_2_a_fi_rep_form_a_raw_data_cu', TRUE);

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
		global $frm_2_a_fi_rep_form_a_raw_data_cu;

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
			$frm_2_a_fi_rep_form_a_raw_data_cu->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_2_a_fi_rep_form_a_raw_data_cu;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($frm_2_a_fi_rep_form_a_raw_data_cu->Export <> "" ||
				$frm_2_a_fi_rep_form_a_raw_data_cu->CurrentAction == "gridadd" ||
				$frm_2_a_fi_rep_form_a_raw_data_cu->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_2_a_fi_rep_form_a_raw_data_cu->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_2_a_fi_rep_form_a_raw_data_cu->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_2_a_fi_rep_form_a_raw_data_cu->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_2_a_fi_rep_form_a_raw_data_cu->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_2_a_fi_rep_form_a_raw_data_cu->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_2_a_fi_rep_form_a_raw_data_cu->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_2_a_fi_rep_form_a_raw_data_cu->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$frm_2_a_fi_rep_form_a_raw_data_cu->setSessionWhere($sFilter);
		$frm_2_a_fi_rep_form_a_raw_data_cu->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_2_a_fi_rep_form_a_raw_data_cu;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->CU, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->MFO, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Question, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Applicable, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_Qtr1_28A29, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_Qtr2_28A29, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_Qtr3_28A29, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_Qtr4_28A29, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_Qtr1_28A29, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_Qtr2_28A29, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_Qtr3_28A29, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_Qtr4_28A29, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating, $Keyword);
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
		global $Security, $frm_2_a_fi_rep_form_a_raw_data_cu;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_2_a_fi_rep_form_a_raw_data_cu->BasicSearchKeyword;
		$sSearchType = $frm_2_a_fi_rep_form_a_raw_data_cu->BasicSearchType;
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
			$frm_2_a_fi_rep_form_a_raw_data_cu->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_2_a_fi_rep_form_a_raw_data_cu->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_2_a_fi_rep_form_a_raw_data_cu;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_2_a_fi_rep_form_a_raw_data_cu->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_2_a_fi_rep_form_a_raw_data_cu;
		$frm_2_a_fi_rep_form_a_raw_data_cu->setSessionBasicSearchKeyword("");
		$frm_2_a_fi_rep_form_a_raw_data_cu->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_2_a_fi_rep_form_a_raw_data_cu;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_2_a_fi_rep_form_a_raw_data_cu->BasicSearchKeyword = $frm_2_a_fi_rep_form_a_raw_data_cu->getSessionBasicSearchKeyword();
			$frm_2_a_fi_rep_form_a_raw_data_cu->BasicSearchType = $frm_2_a_fi_rep_form_a_raw_data_cu->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_2_a_fi_rep_form_a_raw_data_cu;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_2_a_fi_rep_form_a_raw_data_cu->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_2_a_fi_rep_form_a_raw_data_cu->CurrentOrderType = @$_GET["ordertype"];
			$frm_2_a_fi_rep_form_a_raw_data_cu->UpdateSort($frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name); // CU Name
			$frm_2_a_fi_rep_form_a_raw_data_cu->UpdateSort($frm_2_a_fi_rep_form_a_raw_data_cu->MFO); // MFO
			$frm_2_a_fi_rep_form_a_raw_data_cu->UpdateSort($frm_2_a_fi_rep_form_a_raw_data_cu->Question); // Question
			$frm_2_a_fi_rep_form_a_raw_data_cu->UpdateSort($frm_2_a_fi_rep_form_a_raw_data_cu->Target); // Target
			$frm_2_a_fi_rep_form_a_raw_data_cu->UpdateSort($frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks); // Target Remarks
			$frm_2_a_fi_rep_form_a_raw_data_cu->UpdateSort($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment); // Accomplishment
			$frm_2_a_fi_rep_form_a_raw_data_cu->UpdateSort($frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29); // Numerator (A)
			$frm_2_a_fi_rep_form_a_raw_data_cu->UpdateSort($frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29); // Denominator (A)
			$frm_2_a_fi_rep_form_a_raw_data_cu->UpdateSort($frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks); // Accomplishment Remarks
			$frm_2_a_fi_rep_form_a_raw_data_cu->UpdateSort($frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating); // Below 100% Performance Rating
			$frm_2_a_fi_rep_form_a_raw_data_cu->UpdateSort($frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating); // 100% to 120% Performance Rating
			$frm_2_a_fi_rep_form_a_raw_data_cu->UpdateSort($frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating); // Above 120% Performance Rating
			$frm_2_a_fi_rep_form_a_raw_data_cu->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_2_a_fi_rep_form_a_raw_data_cu;
		$sOrderBy = $frm_2_a_fi_rep_form_a_raw_data_cu->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_2_a_fi_rep_form_a_raw_data_cu->SqlOrderBy() <> "") {
				$sOrderBy = $frm_2_a_fi_rep_form_a_raw_data_cu->SqlOrderBy();
				$frm_2_a_fi_rep_form_a_raw_data_cu->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_2_a_fi_rep_form_a_raw_data_cu;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_2_a_fi_rep_form_a_raw_data_cu->setSessionOrderBy($sOrderBy);
				$frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->setSort("");
				$frm_2_a_fi_rep_form_a_raw_data_cu->MFO->setSort("");
				$frm_2_a_fi_rep_form_a_raw_data_cu->Question->setSort("");
				$frm_2_a_fi_rep_form_a_raw_data_cu->Target->setSort("");
				$frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->setSort("");
				$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->setSort("");
				$frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->setSort("");
				$frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->setSort("");
				$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->setSort("");
				$frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->setSort("");
				$frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->setSort("");
				$frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_2_a_fi_rep_form_a_raw_data_cu->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_2_a_fi_rep_form_a_raw_data_cu;

		// "detail_frm_2_a_fi_pbb_detail_delivery"
		$item =& $this->ListOptions->Add("detail_frm_2_a_fi_pbb_detail_delivery");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->AllowList('frm_2_a_fi_pbb_detail_delivery');
		$item->OnLeft = TRUE;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_2_a_fi_rep_form_a_raw_data_cu, $objForm;
		$this->ListOptions->LoadDefault();

		// "detail_frm_2_a_fi_pbb_detail_delivery"
		$oListOpt =& $this->ListOptions->Items["detail_frm_2_a_fi_pbb_detail_delivery"];
		if ($Security->AllowList('frm_2_a_fi_pbb_detail_delivery') && $this->ShowOptionLink()) {
			$oListOpt->Body = $Language->Phrase("DetailLink") . $Language->TablePhrase("frm_2_a_fi_pbb_detail_delivery", "TblCaption");
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"frm_2_a_fi_pbb_detail_deliverylist.php?" . UP_TABLE_SHOW_MASTER . "=frm_2_a_fi_rep_form_a_raw_data_cu&focal_person_id=" . urlencode(strval($frm_2_a_fi_rep_form_a_raw_data_cu->focal_person_id->CurrentValue)) . "&mfo_question_online_pi_seq=" . urlencode(strval($frm_2_a_fi_rep_form_a_raw_data_cu->mfo_question_online_pi_seq->CurrentValue)) . "\">" . $oListOpt->Body . "</a>";
			$links = "";
			if ($links <> "") $oListOpt->Body .= "<br>" . $links;
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_2_a_fi_rep_form_a_raw_data_cu;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_2_a_fi_rep_form_a_raw_data_cu;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_2_a_fi_rep_form_a_raw_data_cu->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_2_a_fi_rep_form_a_raw_data_cu->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_2_a_fi_rep_form_a_raw_data_cu->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_2_a_fi_rep_form_a_raw_data_cu->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_2_a_fi_rep_form_a_raw_data_cu->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_2_a_fi_rep_form_a_raw_data_cu->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_2_a_fi_rep_form_a_raw_data_cu;
		$frm_2_a_fi_rep_form_a_raw_data_cu->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_2_a_fi_rep_form_a_raw_data_cu->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_2_a_fi_rep_form_a_raw_data_cu;

		// Call Recordset Selecting event
		$frm_2_a_fi_rep_form_a_raw_data_cu->Recordset_Selecting($frm_2_a_fi_rep_form_a_raw_data_cu->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_2_a_fi_rep_form_a_raw_data_cu->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_2_a_fi_rep_form_a_raw_data_cu->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_2_a_fi_rep_form_a_raw_data_cu;
		$sFilter = $frm_2_a_fi_rep_form_a_raw_data_cu->KeyFilter();

		// Call Row Selecting event
		$frm_2_a_fi_rep_form_a_raw_data_cu->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_2_a_fi_rep_form_a_raw_data_cu->CurrentFilter = $sFilter;
		$sSql = $frm_2_a_fi_rep_form_a_raw_data_cu->SQL();
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
		global $conn, $frm_2_a_fi_rep_form_a_raw_data_cu;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_2_a_fi_rep_form_a_raw_data_cu->Row_Selected($row);
		$frm_2_a_fi_rep_form_a_raw_data_cu->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->CU->setDbValue($rs->fields('CU'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->setDbValue($rs->fields('CU Name'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->mfo_question_id->setDbValue($rs->fields('mfo_question_id'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->mfo_question_online_pi_seq->setDbValue($rs->fields('mfo_question_online_pi_seq'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->MFO->setDbValue($rs->fields('MFO'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Question->setDbValue($rs->fields('Question'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Applicable->setDbValue($rs->fields('Applicable'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Target->setDbValue($rs->fields('Target'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->setDbValue($rs->fields('Target Remarks'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->setDbValue($rs->fields('Accomplishment'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->setDbValue($rs->fields('Numerator (A)'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_Qtr1_28A29->setDbValue($rs->fields('Numerator Qtr1 (A)'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_Qtr2_28A29->setDbValue($rs->fields('Numerator Qtr2 (A)'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_Qtr3_28A29->setDbValue($rs->fields('Numerator Qtr3 (A)'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_Qtr4_28A29->setDbValue($rs->fields('Numerator Qtr4 (A)'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->setDbValue($rs->fields('Denominator (A)'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_Qtr1_28A29->setDbValue($rs->fields('Denominator Qtr1 (A)'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_Qtr2_28A29->setDbValue($rs->fields('Denominator Qtr2 (A)'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_Qtr3_28A29->setDbValue($rs->fields('Denominator Qtr3 (A)'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_Qtr4_28A29->setDbValue($rs->fields('Denominator Qtr4 (A)'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->setDbValue($rs->fields('Accomplishment Remarks'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Performance_Rating->setDbValue($rs->fields('Performance Rating'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->setDbValue($rs->fields('Below 100% Performance Rating'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->setDbValue($rs->fields('100% to 120% Performance Rating'));
		$frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->setDbValue($rs->fields('Above 120% Performance Rating'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_2_a_fi_rep_form_a_raw_data_cu;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$frm_2_a_fi_rep_form_a_raw_data_cu->CurrentFilter = $frm_2_a_fi_rep_form_a_raw_data_cu->KeyFilter();
			$sSql = $frm_2_a_fi_rep_form_a_raw_data_cu->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_2_a_fi_rep_form_a_raw_data_cu;

		// Initialize URLs
		$this->ViewUrl = $frm_2_a_fi_rep_form_a_raw_data_cu->ViewUrl();
		$this->EditUrl = $frm_2_a_fi_rep_form_a_raw_data_cu->EditUrl();
		$this->InlineEditUrl = $frm_2_a_fi_rep_form_a_raw_data_cu->InlineEditUrl();
		$this->CopyUrl = $frm_2_a_fi_rep_form_a_raw_data_cu->CopyUrl();
		$this->InlineCopyUrl = $frm_2_a_fi_rep_form_a_raw_data_cu->InlineCopyUrl();
		$this->DeleteUrl = $frm_2_a_fi_rep_form_a_raw_data_cu->DeleteUrl();

		// Call Row_Rendering event
		$frm_2_a_fi_rep_form_a_raw_data_cu->Row_Rendering();

		// Common render codes for all row types
		// focal_person_id
		// cu_sequence
		// CU

		$frm_2_a_fi_rep_form_a_raw_data_cu->CU->CellCssStyle = "white-space: nowrap;";

		// CU Name
		$frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->CellCssStyle = "white-space: nowrap;";

		// mfo_question_id
		// mfo_question_online_pi_seq
		// MFO

		$frm_2_a_fi_rep_form_a_raw_data_cu->MFO->CellCssStyle = "white-space: nowrap;";

		// Question
		// Applicable
		// Target
		// Target Remarks
		// Accomplishment
		// Numerator (A)
		// Numerator Qtr1 (A)
		// Numerator Qtr2 (A)
		// Numerator Qtr3 (A)
		// Numerator Qtr4 (A)
		// Denominator (A)
		// Denominator Qtr1 (A)
		// Denominator Qtr2 (A)
		// Denominator Qtr3 (A)
		// Denominator Qtr4 (A)
		// Accomplishment Remarks
		// Performance Rating
		// Below 100% Performance Rating
		// 100% to 120% Performance Rating
		// Above 120% Performance Rating

		if ($frm_2_a_fi_rep_form_a_raw_data_cu->RowType == UP_ROWTYPE_VIEW) { // View row

			// CU Name
			$frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->ViewValue = $frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->CurrentValue;
			$frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->ViewCustomAttributes = "";

			// MFO
			$frm_2_a_fi_rep_form_a_raw_data_cu->MFO->ViewValue = $frm_2_a_fi_rep_form_a_raw_data_cu->MFO->CurrentValue;
			$frm_2_a_fi_rep_form_a_raw_data_cu->MFO->ViewCustomAttributes = "";

			// Question
			$frm_2_a_fi_rep_form_a_raw_data_cu->Question->ViewValue = $frm_2_a_fi_rep_form_a_raw_data_cu->Question->CurrentValue;
			$frm_2_a_fi_rep_form_a_raw_data_cu->Question->ViewCustomAttributes = "";

			// Target
			$frm_2_a_fi_rep_form_a_raw_data_cu->Target->ViewValue = $frm_2_a_fi_rep_form_a_raw_data_cu->Target->CurrentValue;
			$frm_2_a_fi_rep_form_a_raw_data_cu->Target->ViewCustomAttributes = "";

			// Target Remarks
			$frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->ViewValue = $frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->CurrentValue;
			$frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->ViewCustomAttributes = "";

			// Accomplishment
			$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->ViewValue = $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->CurrentValue;
			$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->ViewCustomAttributes = "";

			// Numerator (A)
			$frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->ViewValue = $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->CurrentValue;
			$frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->ViewCustomAttributes = "";

			// Denominator (A)
			$frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->ViewValue = $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->CurrentValue;
			$frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->ViewCustomAttributes = "";

			// Accomplishment Remarks
			$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->ViewValue = $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->CurrentValue;
			$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->ViewCustomAttributes = "";

			// Below 100% Performance Rating
			$frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->ViewValue = $frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->CurrentValue;
			$frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->ViewCustomAttributes = "";

			// 100% to 120% Performance Rating
			$frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->ViewValue = $frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->CurrentValue;
			$frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->ViewCustomAttributes = "";

			// Above 120% Performance Rating
			$frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->ViewValue = $frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->CurrentValue;
			$frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->ViewCustomAttributes = "";

			// CU Name
			$frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->LinkCustomAttributes = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->HrefValue = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->TooltipValue = "";

			// MFO
			$frm_2_a_fi_rep_form_a_raw_data_cu->MFO->LinkCustomAttributes = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->MFO->HrefValue = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->MFO->TooltipValue = "";

			// Question
			$frm_2_a_fi_rep_form_a_raw_data_cu->Question->LinkCustomAttributes = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Question->HrefValue = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Question->TooltipValue = "";

			// Target
			$frm_2_a_fi_rep_form_a_raw_data_cu->Target->LinkCustomAttributes = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Target->HrefValue = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Target->TooltipValue = "";

			// Target Remarks
			$frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->LinkCustomAttributes = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->HrefValue = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->TooltipValue = "";

			// Accomplishment
			$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->LinkCustomAttributes = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->HrefValue = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->TooltipValue = "";

			// Numerator (A)
			$frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->LinkCustomAttributes = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->HrefValue = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->TooltipValue = "";

			// Denominator (A)
			$frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->LinkCustomAttributes = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->HrefValue = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->TooltipValue = "";

			// Accomplishment Remarks
			$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->LinkCustomAttributes = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->HrefValue = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->TooltipValue = "";

			// Below 100% Performance Rating
			$frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->LinkCustomAttributes = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->HrefValue = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->TooltipValue = "";

			// 100% to 120% Performance Rating
			$frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->LinkCustomAttributes = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->HrefValue = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->TooltipValue = "";

			// Above 120% Performance Rating
			$frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->LinkCustomAttributes = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->HrefValue = "";
			$frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_2_a_fi_rep_form_a_raw_data_cu->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_2_a_fi_rep_form_a_raw_data_cu->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_2_a_fi_rep_form_a_raw_data_cu;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_2_a_fi_rep_form_a_raw_data_cu->focal_person_id->CurrentValue);
			}
		}
		return TRUE;
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
