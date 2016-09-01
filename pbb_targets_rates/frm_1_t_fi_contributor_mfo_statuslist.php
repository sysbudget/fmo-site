<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_1_t_fi_contributor_mfo_statusinfo.php" ?>
<?php include_once "frm_1_t_fi_cu_statusinfo.php" ?>
<?php include_once "frm_1_t_fi_delivery_statusinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_1_t_fi_contributor_mfo_status_list = new cfrm_1_t_fi_contributor_mfo_status_list();
$Page =& $frm_1_t_fi_contributor_mfo_status_list;

// Page init
$frm_1_t_fi_contributor_mfo_status_list->Page_Init();

// Page main
$frm_1_t_fi_contributor_mfo_status_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_1_t_fi_contributor_mfo_status->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_1_t_fi_contributor_mfo_status_list = new up_Page("frm_1_t_fi_contributor_mfo_status_list");

// page properties
frm_1_t_fi_contributor_mfo_status_list.PageID = "list"; // page ID
frm_1_t_fi_contributor_mfo_status_list.FormID = "ffrm_1_t_fi_contributor_mfo_statuslist"; // form ID
var UP_PAGE_ID = frm_1_t_fi_contributor_mfo_status_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_1_t_fi_contributor_mfo_status_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_1_t_fi_contributor_mfo_status_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_1_t_fi_contributor_mfo_status_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_1_t_fi_contributor_mfo_status_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_1_t_fi_contributor_mfo_status->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_1_t_fi_contributor_mfo_status->Export == "print")) { ?>
<?php
$gsMasterReturnUrl = "frm_1_t_fi_delivery_statuslist.php";
if ($frm_1_t_fi_contributor_mfo_status_list->DbMasterFilter <> "" && $frm_1_t_fi_contributor_mfo_status->getCurrentMasterTable() == "frm_1_t_fi_delivery_status") {
	if ($frm_1_t_fi_contributor_mfo_status_list->MasterRecordExists) {
		if ($frm_1_t_fi_contributor_mfo_status->getCurrentMasterTable() == $frm_1_t_fi_contributor_mfo_status->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $frm_1_t_fi_delivery_status->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_1_t_fi_contributor_mfo_status_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($frm_1_t_fi_contributor_mfo_status->Export == "") { ?>
<p class="upbudgetofficeclass"><a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></p>
<?php } ?>
<?php include_once "frm_1_t_fi_delivery_statusmaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_1_t_fi_contributor_mfo_status_list->TotalRecs = $frm_1_t_fi_contributor_mfo_status->SelectRecordCount();
	} else {
		if ($frm_1_t_fi_contributor_mfo_status_list->Recordset = $frm_1_t_fi_contributor_mfo_status_list->LoadRecordset())
			$frm_1_t_fi_contributor_mfo_status_list->TotalRecs = $frm_1_t_fi_contributor_mfo_status_list->Recordset->RecordCount();
	}
	$frm_1_t_fi_contributor_mfo_status_list->StartRec = 1;
	if ($frm_1_t_fi_contributor_mfo_status_list->DisplayRecs <= 0 || ($frm_1_t_fi_contributor_mfo_status->Export <> "" && $frm_1_t_fi_contributor_mfo_status->ExportAll)) // Display all records
		$frm_1_t_fi_contributor_mfo_status_list->DisplayRecs = $frm_1_t_fi_contributor_mfo_status_list->TotalRecs;
	if (!($frm_1_t_fi_contributor_mfo_status->Export <> "" && $frm_1_t_fi_contributor_mfo_status->ExportAll))
		$frm_1_t_fi_contributor_mfo_status_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_1_t_fi_contributor_mfo_status_list->Recordset = $frm_1_t_fi_contributor_mfo_status_list->LoadRecordset($frm_1_t_fi_contributor_mfo_status_list->StartRec-1, $frm_1_t_fi_contributor_mfo_status_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_1_t_fi_contributor_mfo_status->TableCaption() ?>
<?php if ($frm_1_t_fi_contributor_mfo_status->getCurrentMasterTable() == "") { ?>
&nbsp;&nbsp;<?php $frm_1_t_fi_contributor_mfo_status_list->ExportOptions->Render("body"); ?>
<?php } ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_1_t_fi_contributor_mfo_status->Export == "" && $frm_1_t_fi_contributor_mfo_status->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_1_t_fi_contributor_mfo_status_list);" style="text-decoration: none;"><img id="frm_1_t_fi_contributor_mfo_status_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_1_t_fi_contributor_mfo_status_list_SearchPanel">
<form name="ffrm_1_t_fi_contributor_mfo_statuslistsrch" id="ffrm_1_t_fi_contributor_mfo_statuslistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_1_t_fi_contributor_mfo_status">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_1_t_fi_contributor_mfo_status->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_1_t_fi_contributor_mfo_status_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_1_t_fi_contributor_mfo_status->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_1_t_fi_contributor_mfo_status->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_1_t_fi_contributor_mfo_status->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_1_t_fi_contributor_mfo_status_list->ShowPageHeader(); ?>
<?php
$frm_1_t_fi_contributor_mfo_status_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_1_t_fi_contributor_mfo_status->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_1_t_fi_contributor_mfo_status->CurrentAction <> "gridadd" && $frm_1_t_fi_contributor_mfo_status->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_1_t_fi_contributor_mfo_status_list->Pager)) $frm_1_t_fi_contributor_mfo_status_list->Pager = new cPrevNextPager($frm_1_t_fi_contributor_mfo_status_list->StartRec, $frm_1_t_fi_contributor_mfo_status_list->DisplayRecs, $frm_1_t_fi_contributor_mfo_status_list->TotalRecs) ?>
<?php if ($frm_1_t_fi_contributor_mfo_status_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_1_t_fi_contributor_mfo_status_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_1_t_fi_contributor_mfo_status_list->PageUrl() ?>start=<?php echo $frm_1_t_fi_contributor_mfo_status_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_1_t_fi_contributor_mfo_status_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_1_t_fi_contributor_mfo_status_list->PageUrl() ?>start=<?php echo $frm_1_t_fi_contributor_mfo_status_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_1_t_fi_contributor_mfo_status_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_1_t_fi_contributor_mfo_status_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_1_t_fi_contributor_mfo_status_list->PageUrl() ?>start=<?php echo $frm_1_t_fi_contributor_mfo_status_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_1_t_fi_contributor_mfo_status_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_1_t_fi_contributor_mfo_status_list->PageUrl() ?>start=<?php echo $frm_1_t_fi_contributor_mfo_status_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_1_t_fi_contributor_mfo_status_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_1_t_fi_contributor_mfo_status_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_1_t_fi_contributor_mfo_status_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_1_t_fi_contributor_mfo_status_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status_list->SearchWhere == "0=101") { ?>
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
<form name="ffrm_1_t_fi_contributor_mfo_statuslist" id="ffrm_1_t_fi_contributor_mfo_statuslist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_1_t_fi_contributor_mfo_status">
<div id="gmp_frm_1_t_fi_contributor_mfo_status" class="upGridMiddlePanel">
<?php if ($frm_1_t_fi_contributor_mfo_status_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_1_t_fi_contributor_mfo_status->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_1_t_fi_contributor_mfo_status_list->RenderListOptions();

// Render list options (header, left)
$frm_1_t_fi_contributor_mfo_status_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_1_t_fi_contributor_mfo_status->Delivery_Unit->Visible) { // Delivery Unit ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->Delivery_Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_fi_contributor_mfo_status->Delivery_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->Delivery_Unit) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_fi_contributor_mfo_status->Delivery_Unit->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_contributor_mfo_status->Delivery_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_contributor_mfo_status->Delivery_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_contributor_mfo_status->Contributing_Unit->Visible) { // Contributing Unit ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->Contributing_Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_fi_contributor_mfo_status->Contributing_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->Contributing_Unit) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_fi_contributor_mfo_status->Contributing_Unit->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_contributor_mfo_status->Contributing_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_contributor_mfo_status->Contributing_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->Visible) { // Participated MFO Count ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count) == "") { ?>
		<td><?php echo $frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->Visible) { // Not Started MFO Count ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count) == "") { ?>
		<td><?php echo $frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->Visible) { // In Progress MFO Count ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count) == "") { ?>
		<td><?php echo $frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->Visible) { // Completed Target MFO Count ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count) == "") { ?>
		<td><?php echo $frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_contributor_mfo_status->Remarks->Visible) { // Remarks ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->Remarks) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_fi_contributor_mfo_status->Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_contributor_mfo_status->SortUrl($frm_1_t_fi_contributor_mfo_status->Remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_fi_contributor_mfo_status->Remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_contributor_mfo_status->Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_contributor_mfo_status->Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_1_t_fi_contributor_mfo_status_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_1_t_fi_contributor_mfo_status->ExportAll && $frm_1_t_fi_contributor_mfo_status->Export <> "") {
	$frm_1_t_fi_contributor_mfo_status_list->StopRec = $frm_1_t_fi_contributor_mfo_status_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_1_t_fi_contributor_mfo_status_list->TotalRecs > $frm_1_t_fi_contributor_mfo_status_list->StartRec + $frm_1_t_fi_contributor_mfo_status_list->DisplayRecs - 1)
		$frm_1_t_fi_contributor_mfo_status_list->StopRec = $frm_1_t_fi_contributor_mfo_status_list->StartRec + $frm_1_t_fi_contributor_mfo_status_list->DisplayRecs - 1;
	else
		$frm_1_t_fi_contributor_mfo_status_list->StopRec = $frm_1_t_fi_contributor_mfo_status_list->TotalRecs;
}
$frm_1_t_fi_contributor_mfo_status_list->RecCnt = $frm_1_t_fi_contributor_mfo_status_list->StartRec - 1;
if ($frm_1_t_fi_contributor_mfo_status_list->Recordset && !$frm_1_t_fi_contributor_mfo_status_list->Recordset->EOF) {
	$frm_1_t_fi_contributor_mfo_status_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_1_t_fi_contributor_mfo_status_list->StartRec > 1)
		$frm_1_t_fi_contributor_mfo_status_list->Recordset->Move($frm_1_t_fi_contributor_mfo_status_list->StartRec - 1);
} elseif (!$frm_1_t_fi_contributor_mfo_status->AllowAddDeleteRow && $frm_1_t_fi_contributor_mfo_status_list->StopRec == 0) {
	$frm_1_t_fi_contributor_mfo_status_list->StopRec = $frm_1_t_fi_contributor_mfo_status->GridAddRowCount;
}

// Initialize aggregate
$frm_1_t_fi_contributor_mfo_status->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_1_t_fi_contributor_mfo_status->ResetAttrs();
$frm_1_t_fi_contributor_mfo_status_list->RenderRow();
$frm_1_t_fi_contributor_mfo_status_list->RowCnt = 0;
while ($frm_1_t_fi_contributor_mfo_status_list->RecCnt < $frm_1_t_fi_contributor_mfo_status_list->StopRec) {
	$frm_1_t_fi_contributor_mfo_status_list->RecCnt++;
	if (intval($frm_1_t_fi_contributor_mfo_status_list->RecCnt) >= intval($frm_1_t_fi_contributor_mfo_status_list->StartRec)) {
		$frm_1_t_fi_contributor_mfo_status_list->RowCnt++;

		// Set up key count
		$frm_1_t_fi_contributor_mfo_status_list->KeyCount = $frm_1_t_fi_contributor_mfo_status_list->RowIndex;

		// Init row class and style
		$frm_1_t_fi_contributor_mfo_status->ResetAttrs();
		$frm_1_t_fi_contributor_mfo_status->CssClass = "";
		if ($frm_1_t_fi_contributor_mfo_status->CurrentAction == "gridadd") {
		} else {
			$frm_1_t_fi_contributor_mfo_status_list->LoadRowValues($frm_1_t_fi_contributor_mfo_status_list->Recordset); // Load row values
		}
		$frm_1_t_fi_contributor_mfo_status->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_1_t_fi_contributor_mfo_status->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_1_t_fi_contributor_mfo_status_list->RenderRow();

		// Render list options
		$frm_1_t_fi_contributor_mfo_status_list->RenderListOptions();
?>
	<tr<?php echo $frm_1_t_fi_contributor_mfo_status->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_1_t_fi_contributor_mfo_status_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->Delivery_Unit->Visible) { // Delivery Unit ?>
		<td<?php echo $frm_1_t_fi_contributor_mfo_status->Delivery_Unit->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_mfo_status->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_mfo_status->Delivery_Unit->ListViewValue() ?></div>
<a name="<?php echo $frm_1_t_fi_contributor_mfo_status_list->PageObjName . "_row_" . $frm_1_t_fi_contributor_mfo_status_list->RowCnt ?>" id="<?php echo $frm_1_t_fi_contributor_mfo_status_list->PageObjName . "_row_" . $frm_1_t_fi_contributor_mfo_status_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->Contributing_Unit->Visible) { // Contributing Unit ?>
		<td<?php echo $frm_1_t_fi_contributor_mfo_status->Contributing_Unit->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_mfo_status->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_mfo_status->Contributing_Unit->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->Visible) { // Participated MFO Count ?>
		<td<?php echo $frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->Visible) { // Not Started MFO Count ?>
		<td<?php echo $frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->Visible) { // In Progress MFO Count ?>
		<td<?php echo $frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->Visible) { // Completed Target MFO Count ?>
		<td<?php echo $frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_1_t_fi_contributor_mfo_status->Remarks->Visible) { // Remarks ?>
		<td<?php echo $frm_1_t_fi_contributor_mfo_status->Remarks->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_mfo_status->Remarks->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_mfo_status->Remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_1_t_fi_contributor_mfo_status_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_1_t_fi_contributor_mfo_status->CurrentAction <> "gridadd")
		$frm_1_t_fi_contributor_mfo_status_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_1_t_fi_contributor_mfo_status_list->Recordset)
	$frm_1_t_fi_contributor_mfo_status_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_1_t_fi_contributor_mfo_status->Export == "" && $frm_1_t_fi_contributor_mfo_status->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_1_t_fi_contributor_mfo_status_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_1_t_fi_contributor_mfo_status->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_1_t_fi_contributor_mfo_status_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_1_t_fi_contributor_mfo_status_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_1_t_fi_contributor_mfo_status';

	// Page object name
	var $PageObjName = 'frm_1_t_fi_contributor_mfo_status_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_1_t_fi_contributor_mfo_status;
		if ($frm_1_t_fi_contributor_mfo_status->UseTokenInUrl) $PageUrl .= "t=" . $frm_1_t_fi_contributor_mfo_status->TableVar . "&"; // Add page token
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
		global $objForm, $frm_1_t_fi_contributor_mfo_status;
		if ($frm_1_t_fi_contributor_mfo_status->UseTokenInUrl) {
			if ($objForm)
				return ($frm_1_t_fi_contributor_mfo_status->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_1_t_fi_contributor_mfo_status->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_1_t_fi_contributor_mfo_status_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_1_t_fi_contributor_mfo_status)
		if (!isset($GLOBALS["frm_1_t_fi_contributor_mfo_status"])) {
			$GLOBALS["frm_1_t_fi_contributor_mfo_status"] = new cfrm_1_t_fi_contributor_mfo_status();
			$GLOBALS["Table"] =& $GLOBALS["frm_1_t_fi_contributor_mfo_status"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_1_t_fi_contributor_mfo_statusadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_1_t_fi_contributor_mfo_statusdelete.php";
		$this->MultiUpdateUrl = "frm_1_t_fi_contributor_mfo_statusupdate.php";

		// Table object (frm_1_t_fi_cu_status)
		if (!isset($GLOBALS['frm_1_t_fi_cu_status'])) $GLOBALS['frm_1_t_fi_cu_status'] = new cfrm_1_t_fi_cu_status();

		// Table object (frm_1_t_fi_delivery_status)
		if (!isset($GLOBALS['frm_1_t_fi_delivery_status'])) $GLOBALS['frm_1_t_fi_delivery_status'] = new cfrm_1_t_fi_delivery_status();

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_1_t_fi_contributor_mfo_status', TRUE);

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
		global $frm_1_t_fi_contributor_mfo_status;

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

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$frm_1_t_fi_contributor_mfo_status->Export = $_GET["export"];
		} elseif (up_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$frm_1_t_fi_contributor_mfo_status->Export = $_POST["exporttype"];
		} else {
			$frm_1_t_fi_contributor_mfo_status->setExportReturnUrl(up_CurrentUrl());
		}
		$gsExport = $frm_1_t_fi_contributor_mfo_status->Export; // Get export parameter, used in header
		$gsExportFile = $frm_1_t_fi_contributor_mfo_status->TableVar; // Get export file, used in header
		$Charset = (UP_CHARSET <> "") ? ";charset=" . UP_CHARSET : ""; // Charset used in header
		if ($frm_1_t_fi_contributor_mfo_status->Export == "csv") {
			header('Content-Type: application/csv' . $Charset);
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_1_t_fi_contributor_mfo_status->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_1_t_fi_contributor_mfo_status;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Set up master detail parameters
			$this->SetUpMasterParms();

			// Hide all options
			if ($frm_1_t_fi_contributor_mfo_status->Export <> "" ||
				$frm_1_t_fi_contributor_mfo_status->CurrentAction == "gridadd" ||
				$frm_1_t_fi_contributor_mfo_status->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_1_t_fi_contributor_mfo_status->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_1_t_fi_contributor_mfo_status->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_1_t_fi_contributor_mfo_status->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_1_t_fi_contributor_mfo_status->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_1_t_fi_contributor_mfo_status->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_1_t_fi_contributor_mfo_status->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_1_t_fi_contributor_mfo_status->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $frm_1_t_fi_contributor_mfo_status->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_1_t_fi_contributor_mfo_status->getDetailFilter(); // Restore detail filter

		// Add master User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			if ($frm_1_t_fi_contributor_mfo_status->getCurrentMasterTable() == "frm_1_t_fi_delivery_status")
				$this->DbMasterFilter = $frm_1_t_fi_contributor_mfo_status->AddMasterUserIDFilter($this->DbMasterFilter, "frm_1_t_fi_delivery_status"); // Add master User ID filter
		}
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_1_t_fi_contributor_mfo_status->getMasterFilter() <> "" && $frm_1_t_fi_contributor_mfo_status->getCurrentMasterTable() == "frm_1_t_fi_delivery_status") {
			global $frm_1_t_fi_delivery_status;
			$rsmaster = $frm_1_t_fi_delivery_status->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_1_t_fi_contributor_mfo_status->getReturnUrl()); // Return to caller
			} else {
				$frm_1_t_fi_delivery_status->LoadListRowValues($rsmaster);
				$frm_1_t_fi_delivery_status->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_1_t_fi_delivery_status->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_1_t_fi_contributor_mfo_status->setSessionWhere($sFilter);
		$frm_1_t_fi_contributor_mfo_status->CurrentFilter = "";

		// Export data only
		if (in_array($frm_1_t_fi_contributor_mfo_status->Export, array("html","word","excel","xml","csv","email","pdf"))) {
			$this->ExportData();
			if ($frm_1_t_fi_contributor_mfo_status->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_1_t_fi_contributor_mfo_status;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_contributor_mfo_status->CU, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_contributor_mfo_status->Delivery_Unit, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_contributor_mfo_status->Contributing_Unit, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_contributor_mfo_status->Remarks, $Keyword);
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
		global $Security, $frm_1_t_fi_contributor_mfo_status;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_1_t_fi_contributor_mfo_status->BasicSearchKeyword;
		$sSearchType = $frm_1_t_fi_contributor_mfo_status->BasicSearchType;
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
			$frm_1_t_fi_contributor_mfo_status->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_1_t_fi_contributor_mfo_status->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_1_t_fi_contributor_mfo_status;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_1_t_fi_contributor_mfo_status->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_1_t_fi_contributor_mfo_status;
		$frm_1_t_fi_contributor_mfo_status->setSessionBasicSearchKeyword("");
		$frm_1_t_fi_contributor_mfo_status->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_1_t_fi_contributor_mfo_status;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_1_t_fi_contributor_mfo_status->BasicSearchKeyword = $frm_1_t_fi_contributor_mfo_status->getSessionBasicSearchKeyword();
			$frm_1_t_fi_contributor_mfo_status->BasicSearchType = $frm_1_t_fi_contributor_mfo_status->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_1_t_fi_contributor_mfo_status;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_1_t_fi_contributor_mfo_status->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_1_t_fi_contributor_mfo_status->CurrentOrderType = @$_GET["ordertype"];
			$frm_1_t_fi_contributor_mfo_status->UpdateSort($frm_1_t_fi_contributor_mfo_status->Delivery_Unit); // Delivery Unit
			$frm_1_t_fi_contributor_mfo_status->UpdateSort($frm_1_t_fi_contributor_mfo_status->Contributing_Unit); // Contributing Unit
			$frm_1_t_fi_contributor_mfo_status->UpdateSort($frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count); // Participated MFO Count
			$frm_1_t_fi_contributor_mfo_status->UpdateSort($frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count); // Not Started MFO Count
			$frm_1_t_fi_contributor_mfo_status->UpdateSort($frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count); // In Progress MFO Count
			$frm_1_t_fi_contributor_mfo_status->UpdateSort($frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count); // Completed Target MFO Count
			$frm_1_t_fi_contributor_mfo_status->UpdateSort($frm_1_t_fi_contributor_mfo_status->Remarks); // Remarks
			$frm_1_t_fi_contributor_mfo_status->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_1_t_fi_contributor_mfo_status;
		$sOrderBy = $frm_1_t_fi_contributor_mfo_status->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_1_t_fi_contributor_mfo_status->SqlOrderBy() <> "") {
				$sOrderBy = $frm_1_t_fi_contributor_mfo_status->SqlOrderBy();
				$frm_1_t_fi_contributor_mfo_status->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_1_t_fi_contributor_mfo_status;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_1_t_fi_contributor_mfo_status->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_1_t_fi_contributor_mfo_status->unit_delivery_id->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_1_t_fi_contributor_mfo_status->setSessionOrderBy($sOrderBy);
				$frm_1_t_fi_contributor_mfo_status->Delivery_Unit->setSort("");
				$frm_1_t_fi_contributor_mfo_status->Contributing_Unit->setSort("");
				$frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->setSort("");
				$frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->setSort("");
				$frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->setSort("");
				$frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->setSort("");
				$frm_1_t_fi_contributor_mfo_status->Remarks->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_1_t_fi_contributor_mfo_status->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_1_t_fi_contributor_mfo_status;

		// "detail_frm_1_t_fi_contributor_pi_status"
		$item =& $this->ListOptions->Add("detail_frm_1_t_fi_contributor_pi_status");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->AllowList('frm_1_t_fi_contributor_pi_status');
		$item->OnLeft = TRUE;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_1_t_fi_contributor_mfo_status, $objForm;
		$this->ListOptions->LoadDefault();

		// "detail_frm_1_t_fi_contributor_pi_status"
		$oListOpt =& $this->ListOptions->Items["detail_frm_1_t_fi_contributor_pi_status"];
		if ($Security->AllowList('frm_1_t_fi_contributor_pi_status') && $this->ShowOptionLink()) {
			$oListOpt->Body = $Language->Phrase("DetailLink") . $Language->TablePhrase("frm_1_t_fi_contributor_pi_status", "TblCaption");
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"frm_1_t_fi_contributor_pi_statuslist.php?" . UP_TABLE_SHOW_MASTER . "=frm_1_t_fi_contributor_mfo_status&unit_contributor_id=" . urlencode(strval($frm_1_t_fi_contributor_mfo_status->unit_contributor_id->CurrentValue)) . "\">" . $oListOpt->Body . "</a>";
			$links = "";
			if ($links <> "") $oListOpt->Body .= "<br>" . $links;
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_1_t_fi_contributor_mfo_status;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_1_t_fi_contributor_mfo_status;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_1_t_fi_contributor_mfo_status->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_1_t_fi_contributor_mfo_status->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_1_t_fi_contributor_mfo_status->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_1_t_fi_contributor_mfo_status->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_1_t_fi_contributor_mfo_status->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_1_t_fi_contributor_mfo_status->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_1_t_fi_contributor_mfo_status;
		$frm_1_t_fi_contributor_mfo_status->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_1_t_fi_contributor_mfo_status->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_1_t_fi_contributor_mfo_status;

		// Call Recordset Selecting event
		$frm_1_t_fi_contributor_mfo_status->Recordset_Selecting($frm_1_t_fi_contributor_mfo_status->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_1_t_fi_contributor_mfo_status->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_1_t_fi_contributor_mfo_status->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_1_t_fi_contributor_mfo_status;
		$sFilter = $frm_1_t_fi_contributor_mfo_status->KeyFilter();

		// Call Row Selecting event
		$frm_1_t_fi_contributor_mfo_status->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_1_t_fi_contributor_mfo_status->CurrentFilter = $sFilter;
		$sSql = $frm_1_t_fi_contributor_mfo_status->SQL();
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
		global $conn, $frm_1_t_fi_contributor_mfo_status;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_1_t_fi_contributor_mfo_status->Row_Selected($row);
		$frm_1_t_fi_contributor_mfo_status->unit_contributor_id->setDbValue($rs->fields('unit_contributor_id'));
		$frm_1_t_fi_contributor_mfo_status->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_1_t_fi_contributor_mfo_status->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_1_t_fi_contributor_mfo_status->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_1_t_fi_contributor_mfo_status->CU->setDbValue($rs->fields('CU'));
		$frm_1_t_fi_contributor_mfo_status->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$frm_1_t_fi_contributor_mfo_status->Contributing_Unit->setDbValue($rs->fields('Contributing Unit'));
		$frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->setDbValue($rs->fields('Participated MFO Count'));
		$frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->setDbValue($rs->fields('Not Started MFO Count'));
		$frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->setDbValue($rs->fields('In Progress MFO Count'));
		$frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->setDbValue($rs->fields('Completed Target MFO Count'));
		$frm_1_t_fi_contributor_mfo_status->Remarks->setDbValue($rs->fields('Remarks'));
		$frm_1_t_fi_contributor_mfo_status->cu_sequence->setDbValue($rs->fields('cu_sequence'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_1_t_fi_contributor_mfo_status;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$frm_1_t_fi_contributor_mfo_status->CurrentFilter = $frm_1_t_fi_contributor_mfo_status->KeyFilter();
			$sSql = $frm_1_t_fi_contributor_mfo_status->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_1_t_fi_contributor_mfo_status;

		// Initialize URLs
		$this->ViewUrl = $frm_1_t_fi_contributor_mfo_status->ViewUrl();
		$this->EditUrl = $frm_1_t_fi_contributor_mfo_status->EditUrl();
		$this->InlineEditUrl = $frm_1_t_fi_contributor_mfo_status->InlineEditUrl();
		$this->CopyUrl = $frm_1_t_fi_contributor_mfo_status->CopyUrl();
		$this->InlineCopyUrl = $frm_1_t_fi_contributor_mfo_status->InlineCopyUrl();
		$this->DeleteUrl = $frm_1_t_fi_contributor_mfo_status->DeleteUrl();

		// Call Row_Rendering event
		$frm_1_t_fi_contributor_mfo_status->Row_Rendering();

		// Common render codes for all row types
		// unit_contributor_id
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// CU
		// Delivery Unit

		$frm_1_t_fi_contributor_mfo_status->Delivery_Unit->CellCssStyle = "white-space: nowrap;";

		// Contributing Unit
		$frm_1_t_fi_contributor_mfo_status->Contributing_Unit->CellCssStyle = "white-space: nowrap;";

		// Participated MFO Count
		// Not Started MFO Count
		// In Progress MFO Count
		// Completed Target MFO Count
		// Remarks

		$frm_1_t_fi_contributor_mfo_status->Remarks->CellCssStyle = "white-space: nowrap;";

		// cu_sequence
		if ($frm_1_t_fi_contributor_mfo_status->RowType == UP_ROWTYPE_VIEW) { // View row

			// Delivery Unit
			$frm_1_t_fi_contributor_mfo_status->Delivery_Unit->ViewValue = $frm_1_t_fi_contributor_mfo_status->Delivery_Unit->CurrentValue;
			$frm_1_t_fi_contributor_mfo_status->Delivery_Unit->ViewCustomAttributes = "";

			// Contributing Unit
			$frm_1_t_fi_contributor_mfo_status->Contributing_Unit->ViewValue = $frm_1_t_fi_contributor_mfo_status->Contributing_Unit->CurrentValue;
			$frm_1_t_fi_contributor_mfo_status->Contributing_Unit->ViewCustomAttributes = "";

			// Participated MFO Count
			$frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->ViewValue = $frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->CurrentValue;
			$frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->ViewCustomAttributes = "";

			// Not Started MFO Count
			$frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->ViewValue = $frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->CurrentValue;
			$frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->ViewCustomAttributes = "";

			// In Progress MFO Count
			$frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->ViewValue = $frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->CurrentValue;
			$frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->ViewCustomAttributes = "";

			// Completed Target MFO Count
			$frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->ViewValue = $frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->CurrentValue;
			$frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->ViewCustomAttributes = "";

			// Remarks
			$frm_1_t_fi_contributor_mfo_status->Remarks->ViewValue = $frm_1_t_fi_contributor_mfo_status->Remarks->CurrentValue;
			$frm_1_t_fi_contributor_mfo_status->Remarks->ViewCustomAttributes = "";

			// Delivery Unit
			$frm_1_t_fi_contributor_mfo_status->Delivery_Unit->LinkCustomAttributes = "";
			$frm_1_t_fi_contributor_mfo_status->Delivery_Unit->HrefValue = "";
			$frm_1_t_fi_contributor_mfo_status->Delivery_Unit->TooltipValue = "";

			// Contributing Unit
			$frm_1_t_fi_contributor_mfo_status->Contributing_Unit->LinkCustomAttributes = "";
			$frm_1_t_fi_contributor_mfo_status->Contributing_Unit->HrefValue = "";
			$frm_1_t_fi_contributor_mfo_status->Contributing_Unit->TooltipValue = "";

			// Participated MFO Count
			$frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->LinkCustomAttributes = "";
			$frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->HrefValue = "";
			$frm_1_t_fi_contributor_mfo_status->Participated_MFO_Count->TooltipValue = "";

			// Not Started MFO Count
			$frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->LinkCustomAttributes = "";
			$frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->HrefValue = "";
			$frm_1_t_fi_contributor_mfo_status->Not_Started_MFO_Count->TooltipValue = "";

			// In Progress MFO Count
			$frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->LinkCustomAttributes = "";
			$frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->HrefValue = "";
			$frm_1_t_fi_contributor_mfo_status->In_Progress_MFO_Count->TooltipValue = "";

			// Completed Target MFO Count
			$frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->LinkCustomAttributes = "";
			$frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->HrefValue = "";
			$frm_1_t_fi_contributor_mfo_status->Completed_Target_MFO_Count->TooltipValue = "";

			// Remarks
			$frm_1_t_fi_contributor_mfo_status->Remarks->LinkCustomAttributes = "";
			$frm_1_t_fi_contributor_mfo_status->Remarks->HrefValue = "";
			$frm_1_t_fi_contributor_mfo_status->Remarks->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_1_t_fi_contributor_mfo_status->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_1_t_fi_contributor_mfo_status->Row_Rendered();
	}

	// Set up export options
	function SetupExportOptions() {
		global $Language, $frm_1_t_fi_contributor_mfo_status;

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
		$item->Body = "<a name=\"emf_frm_1_t_fi_contributor_mfo_status\" id=\"emf_frm_1_t_fi_contributor_mfo_status\" href=\"javascript:void(0);\" onclick=\"up_EmailDialogShow({lnk:'emf_frm_1_t_fi_contributor_mfo_status',hdr:upLanguage.Phrase('ExportToEmail'),f:document.ffrm_1_t_fi_contributor_mfo_statuslist,sel:false});\">" . $Language->Phrase("ExportToEmail") . "</a>";
		$item->Visible = FALSE;

		// Hide options for export/action
		if ($frm_1_t_fi_contributor_mfo_status->Export <> "" ||
			$frm_1_t_fi_contributor_mfo_status->CurrentAction <> "")
			$this->ExportOptions->HideAllOptions();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	function ExportData() {
		global $frm_1_t_fi_contributor_mfo_status;
		$utf8 = (strtolower(UP_CHARSET) == "utf-8");
		$bSelectLimit = UP_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->TotalRecs = $frm_1_t_fi_contributor_mfo_status->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;

		// Export all
		if ($frm_1_t_fi_contributor_mfo_status->ExportAll) {
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
		if ($frm_1_t_fi_contributor_mfo_status->Export == "xml") {
			$XmlDoc = new cXMLDocument(UP_XML_ENCODING);
		} else {
			$ExportDoc = new cExportDocument($frm_1_t_fi_contributor_mfo_status, "h");
		}
		$ParentTable = "";

		// Export master record
		if (UP_EXPORT_MASTER_RECORD && $frm_1_t_fi_contributor_mfo_status->getMasterFilter() <> "" && $frm_1_t_fi_contributor_mfo_status->getCurrentMasterTable() == "frm_1_t_fi_delivery_status") {
			global $frm_1_t_fi_delivery_status;
			$rsmaster = $frm_1_t_fi_delivery_status->LoadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				if ($frm_1_t_fi_contributor_mfo_status->Export == "xml") {
					$ParentTable = "frm_1_t_fi_delivery_status";
					$frm_1_t_fi_delivery_status->ExportXmlDocument($XmlDoc, '', $rsmaster, 1, 1);
				} else {
					$ExportStyle = $ExportDoc->Style;
					$ExportDoc->ChangeStyle("v"); // Change to vertical
					if ($frm_1_t_fi_contributor_mfo_status->Export <> "csv" || UP_EXPORT_MASTER_RECORD_FOR_CSV) {
						$frm_1_t_fi_delivery_status->ExportDocument($ExportDoc, $rsmaster, 1, 1);
						$ExportDoc->ExportEmptyLine();
					}
					$ExportDoc->ChangeStyle($ExportStyle); // Restore
				}
				$rsmaster->Close();
			}
		}
		if ($bSelectLimit) {
			$StartRec = 1;
			$StopRec = $this->DisplayRecs;
		} else {
			$StartRec = $this->StartRec;
			$StopRec = $this->StopRec;
		}
		if ($frm_1_t_fi_contributor_mfo_status->Export == "xml") {
			$frm_1_t_fi_contributor_mfo_status->ExportXmlDocument($XmlDoc, ($ParentTable <> ""), $rs, $StartRec, $StopRec, "");
		} else {
			$sHeader = $this->PageHeader;
			$this->Page_DataRendering($sHeader);
			$ExportDoc->Text .= $sHeader;
			$frm_1_t_fi_contributor_mfo_status->ExportDocument($ExportDoc, $rs, $StartRec, $StopRec, "");
			$sFooter = $this->PageFooter;
			$this->Page_DataRendered($sFooter);
			$ExportDoc->Text .= $sFooter;
		}

		// Close recordset
		$rs->Close();

		// Export header and footer
		if ($frm_1_t_fi_contributor_mfo_status->Export <> "xml") {
			$ExportDoc->ExportHeaderAndFooter();
		}

		// Clean output buffer
		if (!UP_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($frm_1_t_fi_contributor_mfo_status->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (UP_DEBUG_ENABLED)
			echo up_DebugMsg();

		// Output data
		if ($frm_1_t_fi_contributor_mfo_status->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($frm_1_t_fi_contributor_mfo_status->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($frm_1_t_fi_contributor_mfo_status->ExportReturnUrl());
		} elseif ($frm_1_t_fi_contributor_mfo_status->Export == "pdf") {
			$this->ExportPDF($ExportDoc->Text);
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_1_t_fi_contributor_mfo_status;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_1_t_fi_contributor_mfo_status->focal_person_id->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_1_t_fi_contributor_mfo_status;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "frm_1_t_fi_delivery_status") {
				$bValidMaster = TRUE;
				if (@$_GET["unit_delivery_id"] <> "") {
					$GLOBALS["frm_1_t_fi_delivery_status"]->unit_delivery_id->setQueryStringValue($_GET["unit_delivery_id"]);
					$frm_1_t_fi_contributor_mfo_status->unit_delivery_id->setQueryStringValue($GLOBALS["frm_1_t_fi_delivery_status"]->unit_delivery_id->QueryStringValue);
					$frm_1_t_fi_contributor_mfo_status->unit_delivery_id->setSessionValue($frm_1_t_fi_contributor_mfo_status->unit_delivery_id->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_1_t_fi_delivery_status"]->unit_delivery_id->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$frm_1_t_fi_contributor_mfo_status->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$frm_1_t_fi_contributor_mfo_status->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "frm_1_t_fi_delivery_status") {
				if ($frm_1_t_fi_contributor_mfo_status->unit_delivery_id->QueryStringValue == "") $frm_1_t_fi_contributor_mfo_status->unit_delivery_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $frm_1_t_fi_contributor_mfo_status->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_1_t_fi_contributor_mfo_status->getDetailFilter(); // Get detail filter
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
