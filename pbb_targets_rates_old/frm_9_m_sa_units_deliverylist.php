<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_9_m_sa_units_deliveryinfo.php" ?>
<?php include_once "frm_9_m_sa_units_cuinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_9_m_sa_units_delivery_list = new cfrm_9_m_sa_units_delivery_list();
$Page =& $frm_9_m_sa_units_delivery_list;

// Page init
$frm_9_m_sa_units_delivery_list->Page_Init();

// Page main
$frm_9_m_sa_units_delivery_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_9_m_sa_units_delivery->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_9_m_sa_units_delivery_list = new up_Page("frm_9_m_sa_units_delivery_list");

// page properties
frm_9_m_sa_units_delivery_list.PageID = "list"; // page ID
frm_9_m_sa_units_delivery_list.FormID = "ffrm_9_m_sa_units_deliverylist"; // form ID
var UP_PAGE_ID = frm_9_m_sa_units_delivery_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_9_m_sa_units_delivery_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_9_m_sa_units_delivery_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_9_m_sa_units_delivery_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_9_m_sa_units_delivery_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_9_m_sa_units_delivery->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_9_m_sa_units_delivery->Export == "print")) { ?>
<?php
$gsMasterReturnUrl = "frm_9_m_sa_units_culist.php";
if ($frm_9_m_sa_units_delivery_list->DbMasterFilter <> "" && $frm_9_m_sa_units_delivery->getCurrentMasterTable() == "frm_9_m_sa_units_cu") {
	if ($frm_9_m_sa_units_delivery_list->MasterRecordExists) {
		if ($frm_9_m_sa_units_delivery->getCurrentMasterTable() == $frm_9_m_sa_units_delivery->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $frm_9_m_sa_units_cu->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_9_m_sa_units_delivery_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($frm_9_m_sa_units_delivery->Export == "") { ?>
<p class="upbudgetofficeclass"><a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></p>
<?php } ?>
<?php include_once "frm_9_m_sa_units_cumaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_9_m_sa_units_delivery_list->TotalRecs = $frm_9_m_sa_units_delivery->SelectRecordCount();
	} else {
		if ($frm_9_m_sa_units_delivery_list->Recordset = $frm_9_m_sa_units_delivery_list->LoadRecordset())
			$frm_9_m_sa_units_delivery_list->TotalRecs = $frm_9_m_sa_units_delivery_list->Recordset->RecordCount();
	}
	$frm_9_m_sa_units_delivery_list->StartRec = 1;
	if ($frm_9_m_sa_units_delivery_list->DisplayRecs <= 0 || ($frm_9_m_sa_units_delivery->Export <> "" && $frm_9_m_sa_units_delivery->ExportAll)) // Display all records
		$frm_9_m_sa_units_delivery_list->DisplayRecs = $frm_9_m_sa_units_delivery_list->TotalRecs;
	if (!($frm_9_m_sa_units_delivery->Export <> "" && $frm_9_m_sa_units_delivery->ExportAll))
		$frm_9_m_sa_units_delivery_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_9_m_sa_units_delivery_list->Recordset = $frm_9_m_sa_units_delivery_list->LoadRecordset($frm_9_m_sa_units_delivery_list->StartRec-1, $frm_9_m_sa_units_delivery_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_9_m_sa_units_delivery->TableCaption() ?>
<?php if ($frm_9_m_sa_units_delivery->getCurrentMasterTable() == "") { ?>
&nbsp;&nbsp;<?php $frm_9_m_sa_units_delivery_list->ExportOptions->Render("body"); ?>
<?php } ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_9_m_sa_units_delivery->Export == "" && $frm_9_m_sa_units_delivery->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_9_m_sa_units_delivery_list);" style="text-decoration: none;"><img id="frm_9_m_sa_units_delivery_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_9_m_sa_units_delivery_list_SearchPanel">
<form name="ffrm_9_m_sa_units_deliverylistsrch" id="ffrm_9_m_sa_units_deliverylistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_9_m_sa_units_delivery">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_delivery->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_9_m_sa_units_delivery_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_9_m_sa_units_delivery->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_9_m_sa_units_delivery->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_9_m_sa_units_delivery->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_9_m_sa_units_delivery_list->ShowPageHeader(); ?>
<?php
$frm_9_m_sa_units_delivery_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_9_m_sa_units_delivery->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_9_m_sa_units_delivery->CurrentAction <> "gridadd" && $frm_9_m_sa_units_delivery->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_9_m_sa_units_delivery_list->Pager)) $frm_9_m_sa_units_delivery_list->Pager = new cPrevNextPager($frm_9_m_sa_units_delivery_list->StartRec, $frm_9_m_sa_units_delivery_list->DisplayRecs, $frm_9_m_sa_units_delivery_list->TotalRecs) ?>
<?php if ($frm_9_m_sa_units_delivery_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_9_m_sa_units_delivery_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_units_delivery_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_units_delivery_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_9_m_sa_units_delivery_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_units_delivery_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_units_delivery_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_9_m_sa_units_delivery_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_9_m_sa_units_delivery_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_units_delivery_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_units_delivery_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_9_m_sa_units_delivery_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_units_delivery_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_units_delivery_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_9_m_sa_units_delivery_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_9_m_sa_units_delivery_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_9_m_sa_units_delivery_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_9_m_sa_units_delivery_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_9_m_sa_units_delivery_list->SearchWhere == "0=101") { ?>
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
<form name="ffrm_9_m_sa_units_deliverylist" id="ffrm_9_m_sa_units_deliverylist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_9_m_sa_units_delivery">
<div id="gmp_frm_9_m_sa_units_delivery" class="upGridMiddlePanel">
<?php if ($frm_9_m_sa_units_delivery_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_9_m_sa_units_delivery->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_9_m_sa_units_delivery_list->RenderListOptions();

// Render list options (header, left)
$frm_9_m_sa_units_delivery_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_9_m_sa_units_delivery->cu_sequence->Visible) { // cu_sequence ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->cu_sequence) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->cu_sequence->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->cu_sequence) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->cu_sequence->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->cu_sequence->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->cu_sequence->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->t_cutOffDate_remarks) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->t_cutOffDate_remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->t_cutOffDate_remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->t_cutOffDate_remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->CU->Visible) { // CU ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->CU) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->CU->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->CU) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->CU->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->CU->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->CU->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->DU_Office_Name->Visible) { // DU Office Name ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->DU_Office_Name) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->DU_Office_Name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->DU_Office_Name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->DU_Office_Name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->DU_Office_Name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->DU_Office_Name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->DU_Short_Name->Visible) { // DU Short Name ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->DU_Short_Name) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->DU_Short_Name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->DU_Short_Name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->DU_Short_Name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->DU_Short_Name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->DU_Short_Name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->Personnel_Count->Visible) { // Personnel Count ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->Personnel_Count) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->Personnel_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->Personnel_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->Personnel_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->Personnel_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->Personnel_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->MFO_1->Visible) { // MFO 1 ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->MFO_1) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->MFO_1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->MFO_1) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->MFO_1->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->MFO_1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->MFO_1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->MFO_2->Visible) { // MFO 2 ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->MFO_2) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->MFO_2->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->MFO_2) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->MFO_2->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->MFO_2->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->MFO_2->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->MFO_3->Visible) { // MFO 3 ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->MFO_3) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->MFO_3->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->MFO_3) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->MFO_3->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->MFO_3->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->MFO_3->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->MFO_4->Visible) { // MFO 4 ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->MFO_4) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->MFO_4->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->MFO_4) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->MFO_4->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->MFO_4->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->MFO_4->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->MFO_5->Visible) { // MFO 5 ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->MFO_5) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->MFO_5->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->MFO_5) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->MFO_5->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->MFO_5->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->MFO_5->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->STO->Visible) { // STO ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->STO) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->STO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->STO) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->STO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->STO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->STO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->GASS_AB->Visible) { // GASS AB ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->GASS_AB) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->GASS_AB->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->GASS_AB) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->GASS_AB->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->GASS_AB->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->GASS_AB->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->GASS_CD->Visible) { // GASS CD ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->GASS_CD) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->GASS_CD->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->GASS_CD) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->GASS_CD->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->GASS_CD->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->GASS_CD->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_units_delivery->GASS->Visible) { // GASS ?>
	<?php if ($frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->GASS) == "") { ?>
		<td><?php echo $frm_9_m_sa_units_delivery->GASS->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_units_delivery->SortUrl($frm_9_m_sa_units_delivery->GASS) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_9_m_sa_units_delivery->GASS->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_units_delivery->GASS->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_units_delivery->GASS->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_9_m_sa_units_delivery_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_9_m_sa_units_delivery->ExportAll && $frm_9_m_sa_units_delivery->Export <> "") {
	$frm_9_m_sa_units_delivery_list->StopRec = $frm_9_m_sa_units_delivery_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_9_m_sa_units_delivery_list->TotalRecs > $frm_9_m_sa_units_delivery_list->StartRec + $frm_9_m_sa_units_delivery_list->DisplayRecs - 1)
		$frm_9_m_sa_units_delivery_list->StopRec = $frm_9_m_sa_units_delivery_list->StartRec + $frm_9_m_sa_units_delivery_list->DisplayRecs - 1;
	else
		$frm_9_m_sa_units_delivery_list->StopRec = $frm_9_m_sa_units_delivery_list->TotalRecs;
}
$frm_9_m_sa_units_delivery_list->RecCnt = $frm_9_m_sa_units_delivery_list->StartRec - 1;
if ($frm_9_m_sa_units_delivery_list->Recordset && !$frm_9_m_sa_units_delivery_list->Recordset->EOF) {
	$frm_9_m_sa_units_delivery_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_9_m_sa_units_delivery_list->StartRec > 1)
		$frm_9_m_sa_units_delivery_list->Recordset->Move($frm_9_m_sa_units_delivery_list->StartRec - 1);
} elseif (!$frm_9_m_sa_units_delivery->AllowAddDeleteRow && $frm_9_m_sa_units_delivery_list->StopRec == 0) {
	$frm_9_m_sa_units_delivery_list->StopRec = $frm_9_m_sa_units_delivery->GridAddRowCount;
}

// Initialize aggregate
$frm_9_m_sa_units_delivery->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_9_m_sa_units_delivery->ResetAttrs();
$frm_9_m_sa_units_delivery_list->RenderRow();
$frm_9_m_sa_units_delivery_list->RowCnt = 0;
while ($frm_9_m_sa_units_delivery_list->RecCnt < $frm_9_m_sa_units_delivery_list->StopRec) {
	$frm_9_m_sa_units_delivery_list->RecCnt++;
	if (intval($frm_9_m_sa_units_delivery_list->RecCnt) >= intval($frm_9_m_sa_units_delivery_list->StartRec)) {
		$frm_9_m_sa_units_delivery_list->RowCnt++;

		// Set up key count
		$frm_9_m_sa_units_delivery_list->KeyCount = $frm_9_m_sa_units_delivery_list->RowIndex;

		// Init row class and style
		$frm_9_m_sa_units_delivery->ResetAttrs();
		$frm_9_m_sa_units_delivery->CssClass = "";
		if ($frm_9_m_sa_units_delivery->CurrentAction == "gridadd") {
		} else {
			$frm_9_m_sa_units_delivery_list->LoadRowValues($frm_9_m_sa_units_delivery_list->Recordset); // Load row values
		}
		$frm_9_m_sa_units_delivery->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_9_m_sa_units_delivery->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_9_m_sa_units_delivery_list->RenderRow();

		// Render list options
		$frm_9_m_sa_units_delivery_list->RenderListOptions();
?>
	<tr<?php echo $frm_9_m_sa_units_delivery->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_9_m_sa_units_delivery_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_9_m_sa_units_delivery->cu_sequence->Visible) { // cu_sequence ?>
		<td<?php echo $frm_9_m_sa_units_delivery->cu_sequence->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->cu_sequence->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->cu_sequence->ListViewValue() ?></div>
<a name="<?php echo $frm_9_m_sa_units_delivery_list->PageObjName . "_row_" . $frm_9_m_sa_units_delivery_list->RowCnt ?>" id="<?php echo $frm_9_m_sa_units_delivery_list->PageObjName . "_row_" . $frm_9_m_sa_units_delivery_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
		<td<?php echo $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->CU->Visible) { // CU ?>
		<td<?php echo $frm_9_m_sa_units_delivery->CU->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->CU->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->CU->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->DU_Office_Name->Visible) { // DU Office Name ?>
		<td<?php echo $frm_9_m_sa_units_delivery->DU_Office_Name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->DU_Office_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->DU_Office_Name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->DU_Short_Name->Visible) { // DU Short Name ?>
		<td<?php echo $frm_9_m_sa_units_delivery->DU_Short_Name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->DU_Short_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->DU_Short_Name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->Personnel_Count->Visible) { // Personnel Count ?>
		<td<?php echo $frm_9_m_sa_units_delivery->Personnel_Count->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->Personnel_Count->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->Personnel_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->MFO_1->Visible) { // MFO 1 ?>
		<td<?php echo $frm_9_m_sa_units_delivery->MFO_1->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->MFO_1->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->MFO_1->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->MFO_2->Visible) { // MFO 2 ?>
		<td<?php echo $frm_9_m_sa_units_delivery->MFO_2->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->MFO_2->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->MFO_2->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->MFO_3->Visible) { // MFO 3 ?>
		<td<?php echo $frm_9_m_sa_units_delivery->MFO_3->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->MFO_3->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->MFO_3->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->MFO_4->Visible) { // MFO 4 ?>
		<td<?php echo $frm_9_m_sa_units_delivery->MFO_4->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->MFO_4->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->MFO_4->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->MFO_5->Visible) { // MFO 5 ?>
		<td<?php echo $frm_9_m_sa_units_delivery->MFO_5->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->MFO_5->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->MFO_5->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->STO->Visible) { // STO ?>
		<td<?php echo $frm_9_m_sa_units_delivery->STO->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->STO->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->STO->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->GASS_AB->Visible) { // GASS AB ?>
		<td<?php echo $frm_9_m_sa_units_delivery->GASS_AB->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->GASS_AB->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->GASS_AB->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->GASS_CD->Visible) { // GASS CD ?>
		<td<?php echo $frm_9_m_sa_units_delivery->GASS_CD->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->GASS_CD->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->GASS_CD->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_units_delivery->GASS->Visible) { // GASS ?>
		<td<?php echo $frm_9_m_sa_units_delivery->GASS->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_delivery->GASS->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_delivery->GASS->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_9_m_sa_units_delivery_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_9_m_sa_units_delivery->CurrentAction <> "gridadd")
		$frm_9_m_sa_units_delivery_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_9_m_sa_units_delivery_list->Recordset)
	$frm_9_m_sa_units_delivery_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_9_m_sa_units_delivery->Export == "" && $frm_9_m_sa_units_delivery->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_9_m_sa_units_delivery_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_9_m_sa_units_delivery->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_9_m_sa_units_delivery_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_9_m_sa_units_delivery_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_9_m_sa_units_delivery';

	// Page object name
	var $PageObjName = 'frm_9_m_sa_units_delivery_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_9_m_sa_units_delivery;
		if ($frm_9_m_sa_units_delivery->UseTokenInUrl) $PageUrl .= "t=" . $frm_9_m_sa_units_delivery->TableVar . "&"; // Add page token
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
		global $objForm, $frm_9_m_sa_units_delivery;
		if ($frm_9_m_sa_units_delivery->UseTokenInUrl) {
			if ($objForm)
				return ($frm_9_m_sa_units_delivery->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_9_m_sa_units_delivery->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_9_m_sa_units_delivery_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_units_delivery)
		if (!isset($GLOBALS["frm_9_m_sa_units_delivery"])) {
			$GLOBALS["frm_9_m_sa_units_delivery"] = new cfrm_9_m_sa_units_delivery();
			$GLOBALS["Table"] =& $GLOBALS["frm_9_m_sa_units_delivery"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_9_m_sa_units_deliveryadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_9_m_sa_units_deliverydelete.php";
		$this->MultiUpdateUrl = "frm_9_m_sa_units_deliveryupdate.php";

		// Table object (frm_9_m_sa_units_cu)
		if (!isset($GLOBALS['frm_9_m_sa_units_cu'])) $GLOBALS['frm_9_m_sa_units_cu'] = new cfrm_9_m_sa_units_cu();

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_9_m_sa_units_delivery', TRUE);

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
		global $frm_9_m_sa_units_delivery;

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

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_9_m_sa_units_delivery->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_9_m_sa_units_delivery;

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
			if ($frm_9_m_sa_units_delivery->Export <> "" ||
				$frm_9_m_sa_units_delivery->CurrentAction == "gridadd" ||
				$frm_9_m_sa_units_delivery->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_9_m_sa_units_delivery->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_9_m_sa_units_delivery->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_9_m_sa_units_delivery->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_9_m_sa_units_delivery->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_9_m_sa_units_delivery->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_9_m_sa_units_delivery->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $frm_9_m_sa_units_delivery->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_9_m_sa_units_delivery->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_9_m_sa_units_delivery->getMasterFilter() <> "" && $frm_9_m_sa_units_delivery->getCurrentMasterTable() == "frm_9_m_sa_units_cu") {
			global $frm_9_m_sa_units_cu;
			$rsmaster = $frm_9_m_sa_units_cu->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_9_m_sa_units_delivery->getReturnUrl()); // Return to caller
			} else {
				$frm_9_m_sa_units_cu->LoadListRowValues($rsmaster);
				$frm_9_m_sa_units_cu->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_9_m_sa_units_cu->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_9_m_sa_units_delivery->setSessionWhere($sFilter);
		$frm_9_m_sa_units_delivery->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_9_m_sa_units_delivery;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->unit_delivery_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->t_cutOffDate_remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->CU, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->DU_Office_Name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->DU_Short_Name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->MFO_1, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->MFO_2, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->MFO_3, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->MFO_4, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->MFO_5, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->STO, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->GASS_AB, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->GASS_CD, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_units_delivery->GASS, $Keyword);
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
		global $Security, $frm_9_m_sa_units_delivery;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_9_m_sa_units_delivery->BasicSearchKeyword;
		$sSearchType = $frm_9_m_sa_units_delivery->BasicSearchType;
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
			$frm_9_m_sa_units_delivery->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_9_m_sa_units_delivery->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_9_m_sa_units_delivery;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_9_m_sa_units_delivery->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_9_m_sa_units_delivery;
		$frm_9_m_sa_units_delivery->setSessionBasicSearchKeyword("");
		$frm_9_m_sa_units_delivery->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_9_m_sa_units_delivery;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_9_m_sa_units_delivery->BasicSearchKeyword = $frm_9_m_sa_units_delivery->getSessionBasicSearchKeyword();
			$frm_9_m_sa_units_delivery->BasicSearchType = $frm_9_m_sa_units_delivery->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_9_m_sa_units_delivery;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_9_m_sa_units_delivery->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_9_m_sa_units_delivery->CurrentOrderType = @$_GET["ordertype"];
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->cu_sequence); // cu_sequence
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->t_cutOffDate_remarks); // t_cutOffDate_remarks
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->CU); // CU
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->DU_Office_Name); // DU Office Name
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->DU_Short_Name); // DU Short Name
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->Personnel_Count); // Personnel Count
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->MFO_1); // MFO 1
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->MFO_2); // MFO 2
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->MFO_3); // MFO 3
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->MFO_4); // MFO 4
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->MFO_5); // MFO 5
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->STO); // STO
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->GASS_AB); // GASS AB
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->GASS_CD); // GASS CD
			$frm_9_m_sa_units_delivery->UpdateSort($frm_9_m_sa_units_delivery->GASS); // GASS
			$frm_9_m_sa_units_delivery->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_9_m_sa_units_delivery;
		$sOrderBy = $frm_9_m_sa_units_delivery->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_9_m_sa_units_delivery->SqlOrderBy() <> "") {
				$sOrderBy = $frm_9_m_sa_units_delivery->SqlOrderBy();
				$frm_9_m_sa_units_delivery->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_9_m_sa_units_delivery;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_9_m_sa_units_delivery->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_9_m_sa_units_delivery->cu_id->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_9_m_sa_units_delivery->setSessionOrderBy($sOrderBy);
				$frm_9_m_sa_units_delivery->cu_sequence->setSort("");
				$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->setSort("");
				$frm_9_m_sa_units_delivery->CU->setSort("");
				$frm_9_m_sa_units_delivery->DU_Office_Name->setSort("");
				$frm_9_m_sa_units_delivery->DU_Short_Name->setSort("");
				$frm_9_m_sa_units_delivery->Personnel_Count->setSort("");
				$frm_9_m_sa_units_delivery->MFO_1->setSort("");
				$frm_9_m_sa_units_delivery->MFO_2->setSort("");
				$frm_9_m_sa_units_delivery->MFO_3->setSort("");
				$frm_9_m_sa_units_delivery->MFO_4->setSort("");
				$frm_9_m_sa_units_delivery->MFO_5->setSort("");
				$frm_9_m_sa_units_delivery->STO->setSort("");
				$frm_9_m_sa_units_delivery->GASS_AB->setSort("");
				$frm_9_m_sa_units_delivery->GASS_CD->setSort("");
				$frm_9_m_sa_units_delivery->GASS->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_9_m_sa_units_delivery;

		// "detail_frm_9_m_sa_units_contributor"
		$item =& $this->ListOptions->Add("detail_frm_9_m_sa_units_contributor");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->AllowList('frm_9_m_sa_units_contributor');
		$item->OnLeft = TRUE;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_9_m_sa_units_delivery, $objForm;
		$this->ListOptions->LoadDefault();

		// "detail_frm_9_m_sa_units_contributor"
		$oListOpt =& $this->ListOptions->Items["detail_frm_9_m_sa_units_contributor"];
		if ($Security->AllowList('frm_9_m_sa_units_contributor')) {
			$oListOpt->Body = $Language->Phrase("DetailLink") . $Language->TablePhrase("frm_9_m_sa_units_contributor", "TblCaption");
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"frm_9_m_sa_units_contributorlist.php?" . UP_TABLE_SHOW_MASTER . "=frm_9_m_sa_units_delivery&unit_delivery_id=" . urlencode(strval($frm_9_m_sa_units_delivery->unit_delivery_id->CurrentValue)) . "\">" . $oListOpt->Body . "</a>";
			$links = "";
			if ($links <> "") $oListOpt->Body .= "<br>" . $links;
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_9_m_sa_units_delivery;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_9_m_sa_units_delivery;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_9_m_sa_units_delivery->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_9_m_sa_units_delivery;
		$frm_9_m_sa_units_delivery->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_9_m_sa_units_delivery->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_9_m_sa_units_delivery;

		// Call Recordset Selecting event
		$frm_9_m_sa_units_delivery->Recordset_Selecting($frm_9_m_sa_units_delivery->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_9_m_sa_units_delivery->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_9_m_sa_units_delivery->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_9_m_sa_units_delivery;
		$sFilter = $frm_9_m_sa_units_delivery->KeyFilter();

		// Call Row Selecting event
		$frm_9_m_sa_units_delivery->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_9_m_sa_units_delivery->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_units_delivery->SQL();
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
		global $conn, $frm_9_m_sa_units_delivery;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_9_m_sa_units_delivery->Row_Selected($row);
		$frm_9_m_sa_units_delivery->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_9_m_sa_units_delivery->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_9_m_sa_units_delivery->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_9_m_sa_units_delivery->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_9_m_sa_units_delivery->unit_delivery_name->setDbValue($rs->fields('unit_delivery_name'));
		$frm_9_m_sa_units_delivery->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_9_m_sa_units_delivery->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_9_m_sa_units_delivery->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_9_m_sa_units_delivery->CU->setDbValue($rs->fields('CU'));
		$frm_9_m_sa_units_delivery->DU_Office_Name->setDbValue($rs->fields('DU Office Name'));
		$frm_9_m_sa_units_delivery->DU_Short_Name->setDbValue($rs->fields('DU Short Name'));
		$frm_9_m_sa_units_delivery->Personnel_Count->setDbValue($rs->fields('Personnel Count'));
		$frm_9_m_sa_units_delivery->MFO_1->setDbValue($rs->fields('MFO 1'));
		$frm_9_m_sa_units_delivery->MFO_2->setDbValue($rs->fields('MFO 2'));
		$frm_9_m_sa_units_delivery->MFO_3->setDbValue($rs->fields('MFO 3'));
		$frm_9_m_sa_units_delivery->MFO_4->setDbValue($rs->fields('MFO 4'));
		$frm_9_m_sa_units_delivery->MFO_5->setDbValue($rs->fields('MFO 5'));
		$frm_9_m_sa_units_delivery->STO->setDbValue($rs->fields('STO'));
		$frm_9_m_sa_units_delivery->GASS_AB->setDbValue($rs->fields('GASS AB'));
		$frm_9_m_sa_units_delivery->GASS_CD->setDbValue($rs->fields('GASS CD'));
		$frm_9_m_sa_units_delivery->GASS->setDbValue($rs->fields('GASS'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_9_m_sa_units_delivery;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$frm_9_m_sa_units_delivery->CurrentFilter = $frm_9_m_sa_units_delivery->KeyFilter();
			$sSql = $frm_9_m_sa_units_delivery->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_units_delivery;

		// Initialize URLs
		$this->ViewUrl = $frm_9_m_sa_units_delivery->ViewUrl();
		$this->EditUrl = $frm_9_m_sa_units_delivery->EditUrl();
		$this->InlineEditUrl = $frm_9_m_sa_units_delivery->InlineEditUrl();
		$this->CopyUrl = $frm_9_m_sa_units_delivery->CopyUrl();
		$this->InlineCopyUrl = $frm_9_m_sa_units_delivery->InlineCopyUrl();
		$this->DeleteUrl = $frm_9_m_sa_units_delivery->DeleteUrl();

		// Call Row_Rendering event
		$frm_9_m_sa_units_delivery->Row_Rendering();

		// Common render codes for all row types
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// cu_sequence
		// unit_delivery_name
		// cutOffDate_id
		// t_startDate
		// t_cutOffDate_fp
		// t_cutOffDate_remarks
		// CU
		// DU Office Name
		// DU Short Name
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

		if ($frm_9_m_sa_units_delivery->RowType == UP_ROWTYPE_VIEW) { // View row

			// cu_sequence
			$frm_9_m_sa_units_delivery->cu_sequence->ViewValue = $frm_9_m_sa_units_delivery->cu_sequence->CurrentValue;
			$frm_9_m_sa_units_delivery->cu_sequence->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->ViewValue = $frm_9_m_sa_units_delivery->t_cutOffDate_remarks->CurrentValue;
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// CU
			$frm_9_m_sa_units_delivery->CU->ViewValue = $frm_9_m_sa_units_delivery->CU->CurrentValue;
			$frm_9_m_sa_units_delivery->CU->ViewCustomAttributes = "";

			// DU Office Name
			$frm_9_m_sa_units_delivery->DU_Office_Name->ViewValue = $frm_9_m_sa_units_delivery->DU_Office_Name->CurrentValue;
			$frm_9_m_sa_units_delivery->DU_Office_Name->ViewCustomAttributes = "";

			// DU Short Name
			$frm_9_m_sa_units_delivery->DU_Short_Name->ViewValue = $frm_9_m_sa_units_delivery->DU_Short_Name->CurrentValue;
			$frm_9_m_sa_units_delivery->DU_Short_Name->ViewCustomAttributes = "";

			// Personnel Count
			$frm_9_m_sa_units_delivery->Personnel_Count->ViewValue = $frm_9_m_sa_units_delivery->Personnel_Count->CurrentValue;
			$frm_9_m_sa_units_delivery->Personnel_Count->ViewCustomAttributes = "";

			// MFO 1
			$frm_9_m_sa_units_delivery->MFO_1->ViewValue = $frm_9_m_sa_units_delivery->MFO_1->CurrentValue;
			$frm_9_m_sa_units_delivery->MFO_1->ViewCustomAttributes = "";

			// MFO 2
			$frm_9_m_sa_units_delivery->MFO_2->ViewValue = $frm_9_m_sa_units_delivery->MFO_2->CurrentValue;
			$frm_9_m_sa_units_delivery->MFO_2->ViewCustomAttributes = "";

			// MFO 3
			$frm_9_m_sa_units_delivery->MFO_3->ViewValue = $frm_9_m_sa_units_delivery->MFO_3->CurrentValue;
			$frm_9_m_sa_units_delivery->MFO_3->ViewCustomAttributes = "";

			// MFO 4
			$frm_9_m_sa_units_delivery->MFO_4->ViewValue = $frm_9_m_sa_units_delivery->MFO_4->CurrentValue;
			$frm_9_m_sa_units_delivery->MFO_4->ViewCustomAttributes = "";

			// MFO 5
			$frm_9_m_sa_units_delivery->MFO_5->ViewValue = $frm_9_m_sa_units_delivery->MFO_5->CurrentValue;
			$frm_9_m_sa_units_delivery->MFO_5->ViewCustomAttributes = "";

			// STO
			$frm_9_m_sa_units_delivery->STO->ViewValue = $frm_9_m_sa_units_delivery->STO->CurrentValue;
			$frm_9_m_sa_units_delivery->STO->ViewCustomAttributes = "";

			// GASS AB
			$frm_9_m_sa_units_delivery->GASS_AB->ViewValue = $frm_9_m_sa_units_delivery->GASS_AB->CurrentValue;
			$frm_9_m_sa_units_delivery->GASS_AB->ViewCustomAttributes = "";

			// GASS CD
			$frm_9_m_sa_units_delivery->GASS_CD->ViewValue = $frm_9_m_sa_units_delivery->GASS_CD->CurrentValue;
			$frm_9_m_sa_units_delivery->GASS_CD->ViewCustomAttributes = "";

			// GASS
			$frm_9_m_sa_units_delivery->GASS->ViewValue = $frm_9_m_sa_units_delivery->GASS->CurrentValue;
			$frm_9_m_sa_units_delivery->GASS->ViewCustomAttributes = "";

			// cu_sequence
			$frm_9_m_sa_units_delivery->cu_sequence->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->cu_sequence->HrefValue = "";
			$frm_9_m_sa_units_delivery->cu_sequence->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->HrefValue = "";
			$frm_9_m_sa_units_delivery->t_cutOffDate_remarks->TooltipValue = "";

			// CU
			$frm_9_m_sa_units_delivery->CU->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->CU->HrefValue = "";
			$frm_9_m_sa_units_delivery->CU->TooltipValue = "";

			// DU Office Name
			$frm_9_m_sa_units_delivery->DU_Office_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->DU_Office_Name->HrefValue = "";
			$frm_9_m_sa_units_delivery->DU_Office_Name->TooltipValue = "";

			// DU Short Name
			$frm_9_m_sa_units_delivery->DU_Short_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->DU_Short_Name->HrefValue = "";
			$frm_9_m_sa_units_delivery->DU_Short_Name->TooltipValue = "";

			// Personnel Count
			$frm_9_m_sa_units_delivery->Personnel_Count->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->Personnel_Count->HrefValue = "";
			$frm_9_m_sa_units_delivery->Personnel_Count->TooltipValue = "";

			// MFO 1
			$frm_9_m_sa_units_delivery->MFO_1->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_1->HrefValue = "";
			$frm_9_m_sa_units_delivery->MFO_1->TooltipValue = "";

			// MFO 2
			$frm_9_m_sa_units_delivery->MFO_2->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_2->HrefValue = "";
			$frm_9_m_sa_units_delivery->MFO_2->TooltipValue = "";

			// MFO 3
			$frm_9_m_sa_units_delivery->MFO_3->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_3->HrefValue = "";
			$frm_9_m_sa_units_delivery->MFO_3->TooltipValue = "";

			// MFO 4
			$frm_9_m_sa_units_delivery->MFO_4->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_4->HrefValue = "";
			$frm_9_m_sa_units_delivery->MFO_4->TooltipValue = "";

			// MFO 5
			$frm_9_m_sa_units_delivery->MFO_5->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->MFO_5->HrefValue = "";
			$frm_9_m_sa_units_delivery->MFO_5->TooltipValue = "";

			// STO
			$frm_9_m_sa_units_delivery->STO->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->STO->HrefValue = "";
			$frm_9_m_sa_units_delivery->STO->TooltipValue = "";

			// GASS AB
			$frm_9_m_sa_units_delivery->GASS_AB->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->GASS_AB->HrefValue = "";
			$frm_9_m_sa_units_delivery->GASS_AB->TooltipValue = "";

			// GASS CD
			$frm_9_m_sa_units_delivery->GASS_CD->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->GASS_CD->HrefValue = "";
			$frm_9_m_sa_units_delivery->GASS_CD->TooltipValue = "";

			// GASS
			$frm_9_m_sa_units_delivery->GASS->LinkCustomAttributes = "";
			$frm_9_m_sa_units_delivery->GASS->HrefValue = "";
			$frm_9_m_sa_units_delivery->GASS->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_9_m_sa_units_delivery->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_9_m_sa_units_delivery->Row_Rendered();
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_9_m_sa_units_delivery;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "frm_9_m_sa_units_cu") {
				$bValidMaster = TRUE;
				if (@$_GET["cu_id"] <> "") {
					$GLOBALS["frm_9_m_sa_units_cu"]->cu_id->setQueryStringValue($_GET["cu_id"]);
					$frm_9_m_sa_units_delivery->cu_id->setQueryStringValue($GLOBALS["frm_9_m_sa_units_cu"]->cu_id->QueryStringValue);
					$frm_9_m_sa_units_delivery->cu_id->setSessionValue($frm_9_m_sa_units_delivery->cu_id->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_9_m_sa_units_cu"]->cu_id->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$frm_9_m_sa_units_delivery->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$frm_9_m_sa_units_delivery->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "frm_9_m_sa_units_cu") {
				if ($frm_9_m_sa_units_delivery->cu_id->QueryStringValue == "") $frm_9_m_sa_units_delivery->cu_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $frm_9_m_sa_units_delivery->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_9_m_sa_units_delivery->getDetailFilter(); // Get detail filter
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
