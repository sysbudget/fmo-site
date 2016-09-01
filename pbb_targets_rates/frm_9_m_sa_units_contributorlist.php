<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_9_m_sa_units_contributorinfo.php" ?>
<?php include_once "frm_9_m_sa_units_deliveryinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_9_m_sa_units_contributor_list = new cfrm_9_m_sa_units_contributor_list();
$Page =& $frm_9_m_sa_units_contributor_list;

// Page init
$frm_9_m_sa_units_contributor_list->Page_Init();

// Page main
$frm_9_m_sa_units_contributor_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_9_m_sa_units_contributor->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_9_m_sa_units_contributor_list = new up_Page("frm_9_m_sa_units_contributor_list");

// page properties
frm_9_m_sa_units_contributor_list.PageID = "list"; // page ID
frm_9_m_sa_units_contributor_list.FormID = "ffrm_9_m_sa_units_contributorlist"; // form ID
var UP_PAGE_ID = frm_9_m_sa_units_contributor_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_9_m_sa_units_contributor_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_9_m_sa_units_contributor_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_9_m_sa_units_contributor_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_9_m_sa_units_contributor_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_9_m_sa_units_contributor->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_9_m_sa_units_contributor->Export == "print")) { ?>
<?php
$gsMasterReturnUrl = "frm_9_m_sa_units_deliverylist.php";
if ($frm_9_m_sa_units_contributor_list->DbMasterFilter <> "" && $frm_9_m_sa_units_contributor->getCurrentMasterTable() == "frm_9_m_sa_units_delivery") {
	if ($frm_9_m_sa_units_contributor_list->MasterRecordExists) {
		if ($frm_9_m_sa_units_contributor->getCurrentMasterTable() == $frm_9_m_sa_units_contributor->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $frm_9_m_sa_units_delivery->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_9_m_sa_units_contributor_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($frm_9_m_sa_units_contributor->Export == "") { ?>
<p class="upbudgetofficeclass"><a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></p>
<?php } ?>
<?php include_once "frm_9_m_sa_units_deliverymaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_9_m_sa_units_contributor_list->TotalRecs = $frm_9_m_sa_units_contributor->SelectRecordCount();
	} else {
		if ($frm_9_m_sa_units_contributor_list->Recordset = $frm_9_m_sa_units_contributor_list->LoadRecordset())
			$frm_9_m_sa_units_contributor_list->TotalRecs = $frm_9_m_sa_units_contributor_list->Recordset->RecordCount();
	}
	$frm_9_m_sa_units_contributor_list->StartRec = 1;
	if ($frm_9_m_sa_units_contributor_list->DisplayRecs <= 0 || ($frm_9_m_sa_units_contributor->Export <> "" && $frm_9_m_sa_units_contributor->ExportAll)) // Display all records
		$frm_9_m_sa_units_contributor_list->DisplayRecs = $frm_9_m_sa_units_contributor_list->TotalRecs;
	if (!($frm_9_m_sa_units_contributor->Export <> "" && $frm_9_m_sa_units_contributor->ExportAll))
		$frm_9_m_sa_units_contributor_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_9_m_sa_units_contributor_list->Recordset = $frm_9_m_sa_units_contributor_list->LoadRecordset($frm_9_m_sa_units_contributor_list->StartRec-1, $frm_9_m_sa_units_contributor_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_9_m_sa_units_contributor->TableCaption() ?>
<?php if ($frm_9_m_sa_units_contributor->getCurrentMasterTable() == "") { ?>
&nbsp;&nbsp;<?php $frm_9_m_sa_units_contributor_list->ExportOptions->Render("body"); ?>
<?php } ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_9_m_sa_units_contributor->Export == "" && $frm_9_m_sa_units_contributor->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_9_m_sa_units_contributor_list);" style="text-decoration: none;"><img id="frm_9_m_sa_units_contributor_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_9_m_sa_units_contributor_list_SearchPanel">
<form name="ffrm_9_m_sa_units_contributorlistsrch" id="ffrm_9_m_sa_units_contributorlistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_9_m_sa_units_contributor">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_9_m_sa_units_contributor_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_9_m_sa_units_contributor->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_9_m_sa_units_contributor->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_9_m_sa_units_contributor->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_9_m_sa_units_contributor_list->ShowPageHeader(); ?>
<?php
$frm_9_m_sa_units_contributor_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_9_m_sa_units_contributor->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_9_m_sa_units_contributor->CurrentAction <> "gridadd" && $frm_9_m_sa_units_contributor->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_9_m_sa_units_contributor_list->Pager)) $frm_9_m_sa_units_contributor_list->Pager = new cPrevNextPager($frm_9_m_sa_units_contributor_list->StartRec, $frm_9_m_sa_units_contributor_list->DisplayRecs, $frm_9_m_sa_units_contributor_list->TotalRecs) ?>
<?php if ($frm_9_m_sa_units_contributor_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_9_m_sa_units_contributor_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_units_contributor_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_units_contributor_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_9_m_sa_units_contributor_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_units_contributor_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_units_contributor_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_9_m_sa_units_contributor_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_9_m_sa_units_contributor_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_units_contributor_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_units_contributor_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_9_m_sa_units_contributor_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_units_contributor_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_units_contributor_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_9_m_sa_units_contributor_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_9_m_sa_units_contributor_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_9_m_sa_units_contributor_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_9_m_sa_units_contributor_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_9_m_sa_units_contributor_list->SearchWhere == "0=101") { ?>
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
<form name="ffrm_9_m_sa_units_contributorlist" id="ffrm_9_m_sa_units_contributorlist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_9_m_sa_units_contributor">
<div id="gmp_frm_9_m_sa_units_contributor" class="upGridMiddlePanel">
<?php if ($frm_9_m_sa_units_contributor_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_9_m_sa_units_contributor->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_9_m_sa_units_contributor_list->RenderListOptions();

// Render list options (header, left)
$frm_9_m_sa_units_contributor_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_9_m_sa_units_contributor->CU->Visible) { // CU ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->CU) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->CU->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->CU) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->CU->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->CU->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->CU->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->DU_Office_Name->Visible) { // DU Office Name ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->DU_Office_Name) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->DU_Office_Name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->DU_Office_Name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->DU_Office_Name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->ConU_Office_Name->Visible) { // ConU Office Name ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->ConU_Office_Name) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->ConU_Office_Name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->ConU_Office_Name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->ConU_Office_Name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->ConU_Short_Name->Visible) { // ConU Short Name ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->ConU_Short_Name) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->ConU_Short_Name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->ConU_Short_Name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->ConU_Short_Name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->Personnel_Count->Visible) { // Personnel Count ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->Personnel_Count) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->Personnel_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->Personnel_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->Personnel_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->Personnel_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->Personnel_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->MFO_1->Visible) { // MFO 1 ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_1) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->MFO_1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_1) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->MFO_1->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->MFO_1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->MFO_1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->MFO_2->Visible) { // MFO 2 ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_2) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->MFO_2->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_2) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->MFO_2->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->MFO_2->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->MFO_2->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->MFO_3->Visible) { // MFO 3 ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_3) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->MFO_3->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_3) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->MFO_3->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->MFO_3->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->MFO_3->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->MFO_4->Visible) { // MFO 4 ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_4) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->MFO_4->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_4) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->MFO_4->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->MFO_4->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->MFO_4->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->MFO_5->Visible) { // MFO 5 ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_5) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->MFO_5->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->MFO_5) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->MFO_5->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->MFO_5->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->MFO_5->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->STO->Visible) { // STO ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->STO) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->STO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->STO) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->STO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->STO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->STO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->GASS_AB->Visible) { // GASS AB ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->GASS_AB) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->GASS_AB->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->GASS_AB) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->GASS_AB->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->GASS_AB->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->GASS_AB->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->GASS_CD->Visible) { // GASS CD ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->GASS_CD) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->GASS_CD->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->GASS_CD) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->GASS_CD->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->GASS_CD->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->GASS_CD->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_contributor->GASS->Visible) { // GASS ?>
	<?php if ($frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->GASS) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_contributor->GASS->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_contributor->SortUrl($frm_9_m_sa_units_contributor->GASS) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_contributor->GASS->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_contributor->GASS->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_contributor->GASS->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_9_m_sa_units_contributor_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_9_m_sa_units_contributor->ExportAll && $frm_9_m_sa_units_contributor->Export <> "") {
	$frm_9_m_sa_units_contributor_list->StopRec = $frm_9_m_sa_units_contributor_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_9_m_sa_units_contributor_list->TotalRecs > $frm_9_m_sa_units_contributor_list->StartRec + $frm_9_m_sa_units_contributor_list->DisplayRecs - 1)
		$frm_9_m_sa_units_contributor_list->StopRec = $frm_9_m_sa_units_contributor_list->StartRec + $frm_9_m_sa_units_contributor_list->DisplayRecs - 1;
	else
		$frm_9_m_sa_units_contributor_list->StopRec = $frm_9_m_sa_units_contributor_list->TotalRecs;
}
$frm_9_m_sa_units_contributor_list->RecCnt = $frm_9_m_sa_units_contributor_list->StartRec - 1;
if ($frm_9_m_sa_units_contributor_list->Recordset && !$frm_9_m_sa_units_contributor_list->Recordset->EOF) {
	$frm_9_m_sa_units_contributor_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_9_m_sa_units_contributor_list->StartRec > 1)
		$frm_9_m_sa_units_contributor_list->Recordset->Move($frm_9_m_sa_units_contributor_list->StartRec - 1);
} elseif (!$frm_9_m_sa_units_contributor->AllowAddDeleteRow && $frm_9_m_sa_units_contributor_list->StopRec == 0) {
	$frm_9_m_sa_units_contributor_list->StopRec = $frm_9_m_sa_units_contributor->GridAddRowCount;
}

// Initialize aggregate
$frm_9_m_sa_units_contributor->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_9_m_sa_units_contributor->ResetAttrs();
$frm_9_m_sa_units_contributor_list->RenderRow();
$frm_9_m_sa_units_contributor_list->RowCnt = 0;
while ($frm_9_m_sa_units_contributor_list->RecCnt < $frm_9_m_sa_units_contributor_list->StopRec) {
	$frm_9_m_sa_units_contributor_list->RecCnt++;
	if (intval($frm_9_m_sa_units_contributor_list->RecCnt) >= intval($frm_9_m_sa_units_contributor_list->StartRec)) {
		$frm_9_m_sa_units_contributor_list->RowCnt++;

		// Set up key count
		$frm_9_m_sa_units_contributor_list->KeyCount = $frm_9_m_sa_units_contributor_list->RowIndex;

		// Init row class and style
		$frm_9_m_sa_units_contributor->ResetAttrs();
		$frm_9_m_sa_units_contributor->CssClass = "";
		if ($frm_9_m_sa_units_contributor->CurrentAction == "gridadd") {
		} else {
			$frm_9_m_sa_units_contributor_list->LoadRowValues($frm_9_m_sa_units_contributor_list->Recordset); // Load row values
		}
		$frm_9_m_sa_units_contributor->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_9_m_sa_units_contributor->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_9_m_sa_units_contributor_list->RenderRow();

		// Render list options
		$frm_9_m_sa_units_contributor_list->RenderListOptions();
?>
	<tr<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_9_m_sa_units_contributor_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_9_m_sa_units_contributor->CU->Visible) { // CU ?>
		<td<?php echo $frm_9_m_sa_units_contributor->CU->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->CU->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->CU->ListViewValue() ?></div>
<a name="<?php echo $frm_9_m_sa_units_contributor_list->PageObjName . "_row_" . $frm_9_m_sa_units_contributor_list->RowCnt ?>" id="<?php echo $frm_9_m_sa_units_contributor_list->PageObjName . "_row_" . $frm_9_m_sa_units_contributor_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->DU_Office_Name->Visible) { // DU Office Name ?>
		<td<?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->DU_Office_Name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->ConU_Office_Name->Visible) { // ConU Office Name ?>
		<td<?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->ConU_Office_Name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->ConU_Short_Name->Visible) { // ConU Short Name ?>
		<td<?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->ConU_Short_Name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->Personnel_Count->Visible) { // Personnel Count ?>
		<td<?php echo $frm_9_m_sa_units_contributor->Personnel_Count->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->Personnel_Count->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->Personnel_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_1->Visible) { // MFO 1 ?>
		<td<?php echo $frm_9_m_sa_units_contributor->MFO_1->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_1->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_1->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_2->Visible) { // MFO 2 ?>
		<td<?php echo $frm_9_m_sa_units_contributor->MFO_2->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_2->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_2->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_3->Visible) { // MFO 3 ?>
		<td<?php echo $frm_9_m_sa_units_contributor->MFO_3->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_3->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_3->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_4->Visible) { // MFO 4 ?>
		<td<?php echo $frm_9_m_sa_units_contributor->MFO_4->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_4->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_4->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->MFO_5->Visible) { // MFO 5 ?>
		<td<?php echo $frm_9_m_sa_units_contributor->MFO_5->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->MFO_5->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->MFO_5->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->STO->Visible) { // STO ?>
		<td<?php echo $frm_9_m_sa_units_contributor->STO->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->STO->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->STO->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->GASS_AB->Visible) { // GASS AB ?>
		<td<?php echo $frm_9_m_sa_units_contributor->GASS_AB->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->GASS_AB->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->GASS_AB->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->GASS_CD->Visible) { // GASS CD ?>
		<td<?php echo $frm_9_m_sa_units_contributor->GASS_CD->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->GASS_CD->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->GASS_CD->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_contributor->GASS->Visible) { // GASS ?>
		<td<?php echo $frm_9_m_sa_units_contributor->GASS->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_contributor->GASS->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->GASS->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_9_m_sa_units_contributor_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_9_m_sa_units_contributor->CurrentAction <> "gridadd")
		$frm_9_m_sa_units_contributor_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_9_m_sa_units_contributor_list->Recordset)
	$frm_9_m_sa_units_contributor_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_9_m_sa_units_contributor->Export == "" && $frm_9_m_sa_units_contributor->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_9_m_sa_units_contributor_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_9_m_sa_units_contributor->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_9_m_sa_units_contributor_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_9_m_sa_units_contributor_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_9_m_sa_units_contributor';

	// Page object name
	var $PageObjName = 'frm_9_m_sa_units_contributor_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_9_m_sa_units_contributor;
		if ($frm_9_m_sa_units_contributor->UseTokenInUrl) $PageUrl .= "t=" . $frm_9_m_sa_units_contributor->TableVar . "&"; // Add page token
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
		global $objForm, $frm_9_m_sa_units_contributor;
		if ($frm_9_m_sa_units_contributor->UseTokenInUrl) {
			if ($objForm)
				return ($frm_9_m_sa_units_contributor->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_9_m_sa_units_contributor->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_9_m_sa_units_contributor_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_units_contributor)
		if (!isset($GLOBALS["frm_9_m_sa_units_contributor"])) {
			$GLOBALS["frm_9_m_sa_units_contributor"] = new cfrm_9_m_sa_units_contributor();
			$GLOBALS["Table"] =& $GLOBALS["frm_9_m_sa_units_contributor"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_9_m_sa_units_contributoradd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_9_m_sa_units_contributordelete.php";
		$this->MultiUpdateUrl = "frm_9_m_sa_units_contributorupdate.php";

		// Table object (frm_9_m_sa_units_delivery)
		if (!isset($GLOBALS['frm_9_m_sa_units_delivery'])) $GLOBALS['frm_9_m_sa_units_delivery'] = new cfrm_9_m_sa_units_delivery();

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_9_m_sa_units_contributor', TRUE);

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
		global $frm_9_m_sa_units_contributor;

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
			$frm_9_m_sa_units_contributor->Export = $_GET["export"];
		} elseif (up_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$frm_9_m_sa_units_contributor->Export = $_POST["exporttype"];
		} else {
			$frm_9_m_sa_units_contributor->setExportReturnUrl(up_CurrentUrl());
		}
		$gsExport = $frm_9_m_sa_units_contributor->Export; // Get export parameter, used in header
		$gsExportFile = $frm_9_m_sa_units_contributor->TableVar; // Get export file, used in header
		$Charset = (UP_CHARSET <> "") ? ";charset=" . UP_CHARSET : ""; // Charset used in header
		if ($frm_9_m_sa_units_contributor->Export == "csv") {
			header('Content-Type: application/csv' . $Charset);
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_9_m_sa_units_contributor->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_9_m_sa_units_contributor;

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
			if ($frm_9_m_sa_units_contributor->Export <> "" ||
				$frm_9_m_sa_units_contributor->CurrentAction == "gridadd" ||
				$frm_9_m_sa_units_contributor->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_9_m_sa_units_contributor->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_9_m_sa_units_contributor->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_9_m_sa_units_contributor->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_9_m_sa_units_contributor->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_9_m_sa_units_contributor->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_9_m_sa_units_contributor->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_9_m_sa_units_contributor->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $frm_9_m_sa_units_contributor->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_9_m_sa_units_contributor->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_9_m_sa_units_contributor->getMasterFilter() <> "" && $frm_9_m_sa_units_contributor->getCurrentMasterTable() == "frm_9_m_sa_units_delivery") {
			global $frm_9_m_sa_units_delivery;
			$rsmaster = $frm_9_m_sa_units_delivery->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_9_m_sa_units_contributor->getReturnUrl()); // Return to caller
			} else {
				$frm_9_m_sa_units_delivery->LoadListRowValues($rsmaster);
				$frm_9_m_sa_units_delivery->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_9_m_sa_units_delivery->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_9_m_sa_units_contributor->setSessionWhere($sFilter);
		$frm_9_m_sa_units_contributor->CurrentFilter = "";

		// Export data only
		if (in_array($frm_9_m_sa_units_contributor->Export, array("html","word","excel","xml","csv","email","pdf"))) {
			$this->ExportData();
			if ($frm_9_m_sa_units_contributor->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_9_m_sa_units_contributor;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->t_cutOffDate_remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->CU, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->DU_Office_Name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->ConU_Office_Name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->ConU_Short_Name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->MFO_1, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->MFO_2, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->MFO_3, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->MFO_4, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->MFO_5, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->STO, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->GASS_AB, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->GASS_CD, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_contributor->GASS, $Keyword);
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
		global $Security, $frm_9_m_sa_units_contributor;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_9_m_sa_units_contributor->BasicSearchKeyword;
		$sSearchType = $frm_9_m_sa_units_contributor->BasicSearchType;
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
			$frm_9_m_sa_units_contributor->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_9_m_sa_units_contributor->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_9_m_sa_units_contributor;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_9_m_sa_units_contributor->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_9_m_sa_units_contributor;
		$frm_9_m_sa_units_contributor->setSessionBasicSearchKeyword("");
		$frm_9_m_sa_units_contributor->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_9_m_sa_units_contributor;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_9_m_sa_units_contributor->BasicSearchKeyword = $frm_9_m_sa_units_contributor->getSessionBasicSearchKeyword();
			$frm_9_m_sa_units_contributor->BasicSearchType = $frm_9_m_sa_units_contributor->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_9_m_sa_units_contributor;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_9_m_sa_units_contributor->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_9_m_sa_units_contributor->CurrentOrderType = @$_GET["ordertype"];
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->CU); // CU
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->DU_Office_Name); // DU Office Name
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->ConU_Office_Name); // ConU Office Name
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->ConU_Short_Name); // ConU Short Name
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->Personnel_Count); // Personnel Count
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->MFO_1); // MFO 1
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->MFO_2); // MFO 2
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->MFO_3); // MFO 3
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->MFO_4); // MFO 4
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->MFO_5); // MFO 5
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->STO); // STO
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->GASS_AB); // GASS AB
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->GASS_CD); // GASS CD
			$frm_9_m_sa_units_contributor->UpdateSort($frm_9_m_sa_units_contributor->GASS); // GASS
			$frm_9_m_sa_units_contributor->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_9_m_sa_units_contributor;
		$sOrderBy = $frm_9_m_sa_units_contributor->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_9_m_sa_units_contributor->SqlOrderBy() <> "") {
				$sOrderBy = $frm_9_m_sa_units_contributor->SqlOrderBy();
				$frm_9_m_sa_units_contributor->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_9_m_sa_units_contributor;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_9_m_sa_units_contributor->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_9_m_sa_units_contributor->unit_delivery_id->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_9_m_sa_units_contributor->setSessionOrderBy($sOrderBy);
				$frm_9_m_sa_units_contributor->CU->setSort("");
				$frm_9_m_sa_units_contributor->DU_Office_Name->setSort("");
				$frm_9_m_sa_units_contributor->ConU_Office_Name->setSort("");
				$frm_9_m_sa_units_contributor->ConU_Short_Name->setSort("");
				$frm_9_m_sa_units_contributor->Personnel_Count->setSort("");
				$frm_9_m_sa_units_contributor->MFO_1->setSort("");
				$frm_9_m_sa_units_contributor->MFO_2->setSort("");
				$frm_9_m_sa_units_contributor->MFO_3->setSort("");
				$frm_9_m_sa_units_contributor->MFO_4->setSort("");
				$frm_9_m_sa_units_contributor->MFO_5->setSort("");
				$frm_9_m_sa_units_contributor->STO->setSort("");
				$frm_9_m_sa_units_contributor->GASS_AB->setSort("");
				$frm_9_m_sa_units_contributor->GASS_CD->setSort("");
				$frm_9_m_sa_units_contributor->GASS->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_9_m_sa_units_contributor->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_9_m_sa_units_contributor;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_9_m_sa_units_contributor, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_9_m_sa_units_contributor;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_9_m_sa_units_contributor;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_9_m_sa_units_contributor->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_9_m_sa_units_contributor->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_9_m_sa_units_contributor->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_9_m_sa_units_contributor->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_9_m_sa_units_contributor->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_9_m_sa_units_contributor->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_9_m_sa_units_contributor;
		$frm_9_m_sa_units_contributor->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_9_m_sa_units_contributor->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_9_m_sa_units_contributor;

		// Call Recordset Selecting event
		$frm_9_m_sa_units_contributor->Recordset_Selecting($frm_9_m_sa_units_contributor->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_9_m_sa_units_contributor->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_9_m_sa_units_contributor->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_9_m_sa_units_contributor;
		$sFilter = $frm_9_m_sa_units_contributor->KeyFilter();

		// Call Row Selecting event
		$frm_9_m_sa_units_contributor->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_9_m_sa_units_contributor->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_units_contributor->SQL();
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
		global $conn, $frm_9_m_sa_units_contributor;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_9_m_sa_units_contributor->Row_Selected($row);
		$frm_9_m_sa_units_contributor->unit_contributor_id->setDbValue($rs->fields('unit_contributor_id'));
		$frm_9_m_sa_units_contributor->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_9_m_sa_units_contributor->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_9_m_sa_units_contributor->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_9_m_sa_units_contributor->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_9_m_sa_units_contributor->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_9_m_sa_units_contributor->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_9_m_sa_units_contributor->a_startDate->setDbValue($rs->fields('a_startDate'));
		$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->setDbValue($rs->fields('a_cutOffDate_contributor'));
		$frm_9_m_sa_units_contributor->CU->setDbValue($rs->fields('CU'));
		$frm_9_m_sa_units_contributor->DU_Office_Name->setDbValue($rs->fields('DU Office Name'));
		$frm_9_m_sa_units_contributor->ConU_Office_Name->setDbValue($rs->fields('ConU Office Name'));
		$frm_9_m_sa_units_contributor->ConU_Short_Name->setDbValue($rs->fields('ConU Short Name'));
		$frm_9_m_sa_units_contributor->Personnel_Count->setDbValue($rs->fields('Personnel Count'));
		$frm_9_m_sa_units_contributor->MFO_1->setDbValue($rs->fields('MFO 1'));
		$frm_9_m_sa_units_contributor->MFO_2->setDbValue($rs->fields('MFO 2'));
		$frm_9_m_sa_units_contributor->MFO_3->setDbValue($rs->fields('MFO 3'));
		$frm_9_m_sa_units_contributor->MFO_4->setDbValue($rs->fields('MFO 4'));
		$frm_9_m_sa_units_contributor->MFO_5->setDbValue($rs->fields('MFO 5'));
		$frm_9_m_sa_units_contributor->STO->setDbValue($rs->fields('STO'));
		$frm_9_m_sa_units_contributor->GASS_AB->setDbValue($rs->fields('GASS AB'));
		$frm_9_m_sa_units_contributor->GASS_CD->setDbValue($rs->fields('GASS CD'));
		$frm_9_m_sa_units_contributor->GASS->setDbValue($rs->fields('GASS'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_9_m_sa_units_contributor;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$frm_9_m_sa_units_contributor->CurrentFilter = $frm_9_m_sa_units_contributor->KeyFilter();
			$sSql = $frm_9_m_sa_units_contributor->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_units_contributor;

		// Initialize URLs
		$this->ViewUrl = $frm_9_m_sa_units_contributor->ViewUrl();
		$this->EditUrl = $frm_9_m_sa_units_contributor->EditUrl();
		$this->InlineEditUrl = $frm_9_m_sa_units_contributor->InlineEditUrl();
		$this->CopyUrl = $frm_9_m_sa_units_contributor->CopyUrl();
		$this->InlineCopyUrl = $frm_9_m_sa_units_contributor->InlineCopyUrl();
		$this->DeleteUrl = $frm_9_m_sa_units_contributor->DeleteUrl();

		// Call Row_Rendering event
		$frm_9_m_sa_units_contributor->Row_Rendering();

		// Common render codes for all row types
		// unit_contributor_id
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// cutOffDate_id
		// t_startDate
		// t_cutOffDate_fp
		// t_cutOffDate_remarks
		// a_startDate
		// a_cutOffDate_contributor
		// CU
		// DU Office Name
		// ConU Office Name
		// ConU Short Name
		// Personnel Count
		// MFO 1
		// MFO 2
		// MFO 3
		// MFO 4
		// MFO 5
		// STO
		// GASS AB
		// GASS CD
		// GASS

		if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View row

			// CU
			$frm_9_m_sa_units_contributor->CU->ViewValue = $frm_9_m_sa_units_contributor->CU->CurrentValue;
			$frm_9_m_sa_units_contributor->CU->ViewCustomAttributes = "";

			// DU Office Name
			$frm_9_m_sa_units_contributor->DU_Office_Name->ViewValue = $frm_9_m_sa_units_contributor->DU_Office_Name->CurrentValue;
			$frm_9_m_sa_units_contributor->DU_Office_Name->ViewCustomAttributes = "";

			// ConU Office Name
			$frm_9_m_sa_units_contributor->ConU_Office_Name->ViewValue = $frm_9_m_sa_units_contributor->ConU_Office_Name->CurrentValue;
			$frm_9_m_sa_units_contributor->ConU_Office_Name->ViewCustomAttributes = "";

			// ConU Short Name
			$frm_9_m_sa_units_contributor->ConU_Short_Name->ViewValue = $frm_9_m_sa_units_contributor->ConU_Short_Name->CurrentValue;
			$frm_9_m_sa_units_contributor->ConU_Short_Name->ViewCustomAttributes = "";

			// Personnel Count
			$frm_9_m_sa_units_contributor->Personnel_Count->ViewValue = $frm_9_m_sa_units_contributor->Personnel_Count->CurrentValue;
			$frm_9_m_sa_units_contributor->Personnel_Count->ViewCustomAttributes = "";

			// MFO 1
			$frm_9_m_sa_units_contributor->MFO_1->ViewValue = $frm_9_m_sa_units_contributor->MFO_1->CurrentValue;
			$frm_9_m_sa_units_contributor->MFO_1->ViewCustomAttributes = "";

			// MFO 2
			$frm_9_m_sa_units_contributor->MFO_2->ViewValue = $frm_9_m_sa_units_contributor->MFO_2->CurrentValue;
			$frm_9_m_sa_units_contributor->MFO_2->ViewCustomAttributes = "";

			// MFO 3
			$frm_9_m_sa_units_contributor->MFO_3->ViewValue = $frm_9_m_sa_units_contributor->MFO_3->CurrentValue;
			$frm_9_m_sa_units_contributor->MFO_3->ViewCustomAttributes = "";

			// MFO 4
			$frm_9_m_sa_units_contributor->MFO_4->ViewValue = $frm_9_m_sa_units_contributor->MFO_4->CurrentValue;
			$frm_9_m_sa_units_contributor->MFO_4->ViewCustomAttributes = "";

			// MFO 5
			$frm_9_m_sa_units_contributor->MFO_5->ViewValue = $frm_9_m_sa_units_contributor->MFO_5->CurrentValue;
			$frm_9_m_sa_units_contributor->MFO_5->ViewCustomAttributes = "";

			// STO
			$frm_9_m_sa_units_contributor->STO->ViewValue = $frm_9_m_sa_units_contributor->STO->CurrentValue;
			$frm_9_m_sa_units_contributor->STO->ViewCustomAttributes = "";

			// GASS AB
			$frm_9_m_sa_units_contributor->GASS_AB->ViewValue = $frm_9_m_sa_units_contributor->GASS_AB->CurrentValue;
			$frm_9_m_sa_units_contributor->GASS_AB->ViewCustomAttributes = "";

			// GASS CD
			$frm_9_m_sa_units_contributor->GASS_CD->ViewValue = $frm_9_m_sa_units_contributor->GASS_CD->CurrentValue;
			$frm_9_m_sa_units_contributor->GASS_CD->ViewCustomAttributes = "";

			// GASS
			$frm_9_m_sa_units_contributor->GASS->ViewValue = $frm_9_m_sa_units_contributor->GASS->CurrentValue;
			$frm_9_m_sa_units_contributor->GASS->ViewCustomAttributes = "";

			// CU
			$frm_9_m_sa_units_contributor->CU->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->CU->HrefValue = "";
			$frm_9_m_sa_units_contributor->CU->TooltipValue = "";

			// DU Office Name
			$frm_9_m_sa_units_contributor->DU_Office_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->DU_Office_Name->HrefValue = "";
			$frm_9_m_sa_units_contributor->DU_Office_Name->TooltipValue = "";

			// ConU Office Name
			$frm_9_m_sa_units_contributor->ConU_Office_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->ConU_Office_Name->HrefValue = "";
			$frm_9_m_sa_units_contributor->ConU_Office_Name->TooltipValue = "";

			// ConU Short Name
			$frm_9_m_sa_units_contributor->ConU_Short_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->ConU_Short_Name->HrefValue = "";
			$frm_9_m_sa_units_contributor->ConU_Short_Name->TooltipValue = "";

			// Personnel Count
			$frm_9_m_sa_units_contributor->Personnel_Count->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->Personnel_Count->HrefValue = "";
			$frm_9_m_sa_units_contributor->Personnel_Count->TooltipValue = "";

			// MFO 1
			$frm_9_m_sa_units_contributor->MFO_1->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->MFO_1->HrefValue = "";
			$frm_9_m_sa_units_contributor->MFO_1->TooltipValue = "";

			// MFO 2
			$frm_9_m_sa_units_contributor->MFO_2->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->MFO_2->HrefValue = "";
			$frm_9_m_sa_units_contributor->MFO_2->TooltipValue = "";

			// MFO 3
			$frm_9_m_sa_units_contributor->MFO_3->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->MFO_3->HrefValue = "";
			$frm_9_m_sa_units_contributor->MFO_3->TooltipValue = "";

			// MFO 4
			$frm_9_m_sa_units_contributor->MFO_4->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->MFO_4->HrefValue = "";
			$frm_9_m_sa_units_contributor->MFO_4->TooltipValue = "";

			// MFO 5
			$frm_9_m_sa_units_contributor->MFO_5->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->MFO_5->HrefValue = "";
			$frm_9_m_sa_units_contributor->MFO_5->TooltipValue = "";

			// STO
			$frm_9_m_sa_units_contributor->STO->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->STO->HrefValue = "";
			$frm_9_m_sa_units_contributor->STO->TooltipValue = "";

			// GASS AB
			$frm_9_m_sa_units_contributor->GASS_AB->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->GASS_AB->HrefValue = "";
			$frm_9_m_sa_units_contributor->GASS_AB->TooltipValue = "";

			// GASS CD
			$frm_9_m_sa_units_contributor->GASS_CD->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->GASS_CD->HrefValue = "";
			$frm_9_m_sa_units_contributor->GASS_CD->TooltipValue = "";

			// GASS
			$frm_9_m_sa_units_contributor->GASS->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->GASS->HrefValue = "";
			$frm_9_m_sa_units_contributor->GASS->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_9_m_sa_units_contributor->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_9_m_sa_units_contributor->Row_Rendered();
	}

	// Set up export options
	function SetupExportOptions() {
		global $Language, $frm_9_m_sa_units_contributor;

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
		$item->Body = "<a name=\"emf_frm_9_m_sa_units_contributor\" id=\"emf_frm_9_m_sa_units_contributor\" href=\"javascript:void(0);\" onclick=\"up_EmailDialogShow({lnk:'emf_frm_9_m_sa_units_contributor',hdr:upLanguage.Phrase('ExportToEmail'),f:document.ffrm_9_m_sa_units_contributorlist,sel:false});\">" . $Language->Phrase("ExportToEmail") . "</a>";
		$item->Visible = FALSE;

		// Hide options for export/action
		if ($frm_9_m_sa_units_contributor->Export <> "" ||
			$frm_9_m_sa_units_contributor->CurrentAction <> "")
			$this->ExportOptions->HideAllOptions();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	function ExportData() {
		global $frm_9_m_sa_units_contributor;
		$utf8 = (strtolower(UP_CHARSET) == "utf-8");
		$bSelectLimit = UP_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->TotalRecs = $frm_9_m_sa_units_contributor->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;

		// Export all
		if ($frm_9_m_sa_units_contributor->ExportAll) {
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
		if ($frm_9_m_sa_units_contributor->Export == "xml") {
			$XmlDoc = new cXMLDocument(UP_XML_ENCODING);
		} else {
			$ExportDoc = new cExportDocument($frm_9_m_sa_units_contributor, "h");
		}
		$ParentTable = "";

		// Export master record
		if (UP_EXPORT_MASTER_RECORD && $frm_9_m_sa_units_contributor->getMasterFilter() <> "" && $frm_9_m_sa_units_contributor->getCurrentMasterTable() == "frm_9_m_sa_units_delivery") {
			global $frm_9_m_sa_units_delivery;
			$rsmaster = $frm_9_m_sa_units_delivery->LoadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				if ($frm_9_m_sa_units_contributor->Export == "xml") {
					$ParentTable = "frm_9_m_sa_units_delivery";
					$frm_9_m_sa_units_delivery->ExportXmlDocument($XmlDoc, '', $rsmaster, 1, 1);
				} else {
					$ExportStyle = $ExportDoc->Style;
					$ExportDoc->ChangeStyle("v"); // Change to vertical
					if ($frm_9_m_sa_units_contributor->Export <> "csv" || UP_EXPORT_MASTER_RECORD_FOR_CSV) {
						$frm_9_m_sa_units_delivery->ExportDocument($ExportDoc, $rsmaster, 1, 1);
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
		if ($frm_9_m_sa_units_contributor->Export == "xml") {
			$frm_9_m_sa_units_contributor->ExportXmlDocument($XmlDoc, ($ParentTable <> ""), $rs, $StartRec, $StopRec, "");
		} else {
			$sHeader = $this->PageHeader;
			$this->Page_DataRendering($sHeader);
			$ExportDoc->Text .= $sHeader;
			$frm_9_m_sa_units_contributor->ExportDocument($ExportDoc, $rs, $StartRec, $StopRec, "");
			$sFooter = $this->PageFooter;
			$this->Page_DataRendered($sFooter);
			$ExportDoc->Text .= $sFooter;
		}

		// Close recordset
		$rs->Close();

		// Export header and footer
		if ($frm_9_m_sa_units_contributor->Export <> "xml") {
			$ExportDoc->ExportHeaderAndFooter();
		}

		// Clean output buffer
		if (!UP_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($frm_9_m_sa_units_contributor->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (UP_DEBUG_ENABLED)
			echo up_DebugMsg();

		// Output data
		if ($frm_9_m_sa_units_contributor->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($frm_9_m_sa_units_contributor->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($frm_9_m_sa_units_contributor->ExportReturnUrl());
		} elseif ($frm_9_m_sa_units_contributor->Export == "pdf") {
			$this->ExportPDF($ExportDoc->Text);
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_9_m_sa_units_contributor;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "frm_9_m_sa_units_delivery") {
				$bValidMaster = TRUE;
				if (@$_GET["unit_delivery_id"] <> "") {
					$GLOBALS["frm_9_m_sa_units_delivery"]->unit_delivery_id->setQueryStringValue($_GET["unit_delivery_id"]);
					$frm_9_m_sa_units_contributor->unit_delivery_id->setQueryStringValue($GLOBALS["frm_9_m_sa_units_delivery"]->unit_delivery_id->QueryStringValue);
					$frm_9_m_sa_units_contributor->unit_delivery_id->setSessionValue($frm_9_m_sa_units_contributor->unit_delivery_id->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_9_m_sa_units_delivery"]->unit_delivery_id->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$frm_9_m_sa_units_contributor->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$frm_9_m_sa_units_contributor->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "frm_9_m_sa_units_delivery") {
				if ($frm_9_m_sa_units_contributor->unit_delivery_id->QueryStringValue == "") $frm_9_m_sa_units_contributor->unit_delivery_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $frm_9_m_sa_units_contributor->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_9_m_sa_units_contributor->getDetailFilter(); // Get detail filter
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
