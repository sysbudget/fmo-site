<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_1_t_fi_pbb_detail_contributorinfo.php" ?>
<?php include_once "frm_1_t_fi_contributor_mfo_statusinfo.php" ?>
<?php include_once "frm_1_t_fi_contributor_pi_statusinfo.php" ?>
<?php include_once "frm_1_t_fi_cu_statusinfo.php" ?>
<?php include_once "frm_1_t_fi_delivery_pi_statusinfo.php" ?>
<?php include_once "frm_1_t_fi_delivery_statusinfo.php" ?>
<?php include_once "frm_1_t_fi_pbb_detail_deliveryinfo.php" ?>
<?php include_once "frm_2_a_fi_pbb_detail_deliveryinfo.php" ?>
<?php include_once "frm_2_a_fi_rep_form_a_raw_data_cuinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_1_t_fi_pbb_detail_contributor_list = new cfrm_1_t_fi_pbb_detail_contributor_list();
$Page =& $frm_1_t_fi_pbb_detail_contributor_list;

// Page init
$frm_1_t_fi_pbb_detail_contributor_list->Page_Init();

// Page main
$frm_1_t_fi_pbb_detail_contributor_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_1_t_fi_pbb_detail_contributor->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_1_t_fi_pbb_detail_contributor_list = new up_Page("frm_1_t_fi_pbb_detail_contributor_list");

// page properties
frm_1_t_fi_pbb_detail_contributor_list.PageID = "list"; // page ID
frm_1_t_fi_pbb_detail_contributor_list.FormID = "ffrm_1_t_fi_pbb_detail_contributorlist"; // form ID
var UP_PAGE_ID = frm_1_t_fi_pbb_detail_contributor_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_1_t_fi_pbb_detail_contributor_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_1_t_fi_pbb_detail_contributor_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_1_t_fi_pbb_detail_contributor_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_1_t_fi_pbb_detail_contributor_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_1_t_fi_pbb_detail_contributor->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_1_t_fi_pbb_detail_contributor->Export == "print")) { ?>
<?php
$gsMasterReturnUrl = "frm_1_t_fi_pbb_detail_deliverylist.php";
if ($frm_1_t_fi_pbb_detail_contributor_list->DbMasterFilter <> "" && $frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == "frm_1_t_fi_pbb_detail_delivery") {
	if ($frm_1_t_fi_pbb_detail_contributor_list->MasterRecordExists) {
		if ($frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == $frm_1_t_fi_pbb_detail_contributor->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $frm_1_t_fi_pbb_detail_delivery->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_1_t_fi_pbb_detail_contributor_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($frm_1_t_fi_pbb_detail_contributor->Export == "") { ?>
<p class="upbudgetofficeclass"><a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></p>
<?php } ?>
<?php include_once "frm_1_t_fi_pbb_detail_deliverymaster.php" ?>
<?php
	}
}
?>
<?php
$gsMasterReturnUrl = "frm_1_t_fi_contributor_pi_statuslist.php";
if ($frm_1_t_fi_pbb_detail_contributor_list->DbMasterFilter <> "" && $frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == "frm_1_t_fi_contributor_pi_status") {
	if ($frm_1_t_fi_pbb_detail_contributor_list->MasterRecordExists) {
		if ($frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == $frm_1_t_fi_pbb_detail_contributor->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $frm_1_t_fi_contributor_pi_status->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_1_t_fi_pbb_detail_contributor_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($frm_1_t_fi_pbb_detail_contributor->Export == "") { ?>
<p class="upbudgetofficeclass"><a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></p>
<?php } ?>
<?php include_once "frm_1_t_fi_contributor_pi_statusmaster.php" ?>
<?php
	}
}
?>
<?php
$gsMasterReturnUrl = "frm_2_a_fi_pbb_detail_deliverylist.php";
if ($frm_1_t_fi_pbb_detail_contributor_list->DbMasterFilter <> "" && $frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == "frm_2_a_fi_pbb_detail_delivery") {
	if ($frm_1_t_fi_pbb_detail_contributor_list->MasterRecordExists) {
		if ($frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == $frm_1_t_fi_pbb_detail_contributor->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $frm_2_a_fi_pbb_detail_delivery->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_1_t_fi_pbb_detail_contributor_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($frm_1_t_fi_pbb_detail_contributor->Export == "") { ?>
<p class="upbudgetofficeclass"><a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></p>
<?php } ?>
<?php include_once "frm_2_a_fi_pbb_detail_deliverymaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_1_t_fi_pbb_detail_contributor_list->TotalRecs = $frm_1_t_fi_pbb_detail_contributor->SelectRecordCount();
	} else {
		if ($frm_1_t_fi_pbb_detail_contributor_list->Recordset = $frm_1_t_fi_pbb_detail_contributor_list->LoadRecordset())
			$frm_1_t_fi_pbb_detail_contributor_list->TotalRecs = $frm_1_t_fi_pbb_detail_contributor_list->Recordset->RecordCount();
	}
	$frm_1_t_fi_pbb_detail_contributor_list->StartRec = 1;
	if ($frm_1_t_fi_pbb_detail_contributor_list->DisplayRecs <= 0 || ($frm_1_t_fi_pbb_detail_contributor->Export <> "" && $frm_1_t_fi_pbb_detail_contributor->ExportAll)) // Display all records
		$frm_1_t_fi_pbb_detail_contributor_list->DisplayRecs = $frm_1_t_fi_pbb_detail_contributor_list->TotalRecs;
	if (!($frm_1_t_fi_pbb_detail_contributor->Export <> "" && $frm_1_t_fi_pbb_detail_contributor->ExportAll))
		$frm_1_t_fi_pbb_detail_contributor_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_1_t_fi_pbb_detail_contributor_list->Recordset = $frm_1_t_fi_pbb_detail_contributor_list->LoadRecordset($frm_1_t_fi_pbb_detail_contributor_list->StartRec-1, $frm_1_t_fi_pbb_detail_contributor_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_1_t_fi_pbb_detail_contributor->TableCaption() ?>
<?php if ($frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == "") { ?>
&nbsp;&nbsp;<?php $frm_1_t_fi_pbb_detail_contributor_list->ExportOptions->Render("body"); ?>
<?php } ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_1_t_fi_pbb_detail_contributor->Export == "" && $frm_1_t_fi_pbb_detail_contributor->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_1_t_fi_pbb_detail_contributor_list);" style="text-decoration: none;"><img id="frm_1_t_fi_pbb_detail_contributor_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_1_t_fi_pbb_detail_contributor_list_SearchPanel">
<form name="ffrm_1_t_fi_pbb_detail_contributorlistsrch" id="ffrm_1_t_fi_pbb_detail_contributorlistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_1_t_fi_pbb_detail_contributor">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_1_t_fi_pbb_detail_contributor->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_1_t_fi_pbb_detail_contributor_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_1_t_fi_pbb_detail_contributor->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_1_t_fi_pbb_detail_contributor->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_1_t_fi_pbb_detail_contributor->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_1_t_fi_pbb_detail_contributor_list->ShowPageHeader(); ?>
<?php
$frm_1_t_fi_pbb_detail_contributor_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_1_t_fi_pbb_detail_contributor->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_1_t_fi_pbb_detail_contributor->CurrentAction <> "gridadd" && $frm_1_t_fi_pbb_detail_contributor->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_1_t_fi_pbb_detail_contributor_list->Pager)) $frm_1_t_fi_pbb_detail_contributor_list->Pager = new cPrevNextPager($frm_1_t_fi_pbb_detail_contributor_list->StartRec, $frm_1_t_fi_pbb_detail_contributor_list->DisplayRecs, $frm_1_t_fi_pbb_detail_contributor_list->TotalRecs) ?>
<?php if ($frm_1_t_fi_pbb_detail_contributor_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_1_t_fi_pbb_detail_contributor_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_1_t_fi_pbb_detail_contributor_list->PageUrl() ?>start=<?php echo $frm_1_t_fi_pbb_detail_contributor_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_1_t_fi_pbb_detail_contributor_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_1_t_fi_pbb_detail_contributor_list->PageUrl() ?>start=<?php echo $frm_1_t_fi_pbb_detail_contributor_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_1_t_fi_pbb_detail_contributor_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_1_t_fi_pbb_detail_contributor_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_1_t_fi_pbb_detail_contributor_list->PageUrl() ?>start=<?php echo $frm_1_t_fi_pbb_detail_contributor_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_1_t_fi_pbb_detail_contributor_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_1_t_fi_pbb_detail_contributor_list->PageUrl() ?>start=<?php echo $frm_1_t_fi_pbb_detail_contributor_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_1_t_fi_pbb_detail_contributor_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_1_t_fi_pbb_detail_contributor_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_1_t_fi_pbb_detail_contributor_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_1_t_fi_pbb_detail_contributor_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor_list->SearchWhere == "0=101") { ?>
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
<form name="ffrm_1_t_fi_pbb_detail_contributorlist" id="ffrm_1_t_fi_pbb_detail_contributorlist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_1_t_fi_pbb_detail_contributor">
<div id="gmp_frm_1_t_fi_pbb_detail_contributor" class="upGridMiddlePanel">
<?php if ($frm_1_t_fi_pbb_detail_contributor_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_1_t_fi_pbb_detail_contributor->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_1_t_fi_pbb_detail_contributor_list->RenderListOptions();

// Render list options (header, left)
$frm_1_t_fi_pbb_detail_contributor_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->Visible) { // Contributing Unit ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Contributing_Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Contributing_Unit) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_pbb_detail_contributor->MFO->Visible) { // MFO ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->MFO) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_fi_pbb_detail_contributor->MFO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->MFO) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_fi_pbb_detail_contributor->MFO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_pbb_detail_contributor->MFO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_pbb_detail_contributor->MFO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_pbb_detail_contributor->Question->Visible) { // Question ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Question) == "") { ?>
		<td><?php echo $frm_1_t_fi_pbb_detail_contributor->Question->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Question) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_fi_pbb_detail_contributor->Question->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_pbb_detail_contributor->Question->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_pbb_detail_contributor->Question->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_pbb_detail_contributor->Applicable->Visible) { // Applicable ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Applicable) == "") { ?>
		<td><?php echo $frm_1_t_fi_pbb_detail_contributor->Applicable->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Applicable) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_fi_pbb_detail_contributor->Applicable->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_pbb_detail_contributor->Applicable->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_pbb_detail_contributor->Applicable->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_pbb_detail_contributor->Target->Visible) { // Target ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Target) == "") { ?>
		<td><?php echo $frm_1_t_fi_pbb_detail_contributor->Target->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Target) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_fi_pbb_detail_contributor->Target->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_pbb_detail_contributor->Target->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_pbb_detail_contributor->Target->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_pbb_detail_contributor->Target_Remarks->Visible) { // Target Remarks ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Target_Remarks) == "") { ?>
		<td><?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Target_Remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_pbb_detail_contributor->Target_Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_pbb_detail_contributor->Target_Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->Visible) { // Target Cut-Off Date ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_1_t_fi_pbb_detail_contributor->Target_Message->Visible) { // Target Message ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Target_Message) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Message->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_1_t_fi_pbb_detail_contributor->SortUrl($frm_1_t_fi_pbb_detail_contributor->Target_Message) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Message->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_1_t_fi_pbb_detail_contributor->Target_Message->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_1_t_fi_pbb_detail_contributor->Target_Message->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_1_t_fi_pbb_detail_contributor_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_1_t_fi_pbb_detail_contributor->ExportAll && $frm_1_t_fi_pbb_detail_contributor->Export <> "") {
	$frm_1_t_fi_pbb_detail_contributor_list->StopRec = $frm_1_t_fi_pbb_detail_contributor_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_1_t_fi_pbb_detail_contributor_list->TotalRecs > $frm_1_t_fi_pbb_detail_contributor_list->StartRec + $frm_1_t_fi_pbb_detail_contributor_list->DisplayRecs - 1)
		$frm_1_t_fi_pbb_detail_contributor_list->StopRec = $frm_1_t_fi_pbb_detail_contributor_list->StartRec + $frm_1_t_fi_pbb_detail_contributor_list->DisplayRecs - 1;
	else
		$frm_1_t_fi_pbb_detail_contributor_list->StopRec = $frm_1_t_fi_pbb_detail_contributor_list->TotalRecs;
}
$frm_1_t_fi_pbb_detail_contributor_list->RecCnt = $frm_1_t_fi_pbb_detail_contributor_list->StartRec - 1;
if ($frm_1_t_fi_pbb_detail_contributor_list->Recordset && !$frm_1_t_fi_pbb_detail_contributor_list->Recordset->EOF) {
	$frm_1_t_fi_pbb_detail_contributor_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_1_t_fi_pbb_detail_contributor_list->StartRec > 1)
		$frm_1_t_fi_pbb_detail_contributor_list->Recordset->Move($frm_1_t_fi_pbb_detail_contributor_list->StartRec - 1);
} elseif (!$frm_1_t_fi_pbb_detail_contributor->AllowAddDeleteRow && $frm_1_t_fi_pbb_detail_contributor_list->StopRec == 0) {
	$frm_1_t_fi_pbb_detail_contributor_list->StopRec = $frm_1_t_fi_pbb_detail_contributor->GridAddRowCount;
}

// Initialize aggregate
$frm_1_t_fi_pbb_detail_contributor->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_1_t_fi_pbb_detail_contributor->ResetAttrs();
$frm_1_t_fi_pbb_detail_contributor_list->RenderRow();
$frm_1_t_fi_pbb_detail_contributor_list->RowCnt = 0;
while ($frm_1_t_fi_pbb_detail_contributor_list->RecCnt < $frm_1_t_fi_pbb_detail_contributor_list->StopRec) {
	$frm_1_t_fi_pbb_detail_contributor_list->RecCnt++;
	if (intval($frm_1_t_fi_pbb_detail_contributor_list->RecCnt) >= intval($frm_1_t_fi_pbb_detail_contributor_list->StartRec)) {
		$frm_1_t_fi_pbb_detail_contributor_list->RowCnt++;

		// Set up key count
		$frm_1_t_fi_pbb_detail_contributor_list->KeyCount = $frm_1_t_fi_pbb_detail_contributor_list->RowIndex;

		// Init row class and style
		$frm_1_t_fi_pbb_detail_contributor->ResetAttrs();
		$frm_1_t_fi_pbb_detail_contributor->CssClass = "";
		if ($frm_1_t_fi_pbb_detail_contributor->CurrentAction == "gridadd") {
		} else {
			$frm_1_t_fi_pbb_detail_contributor_list->LoadRowValues($frm_1_t_fi_pbb_detail_contributor_list->Recordset); // Load row values
		}
		$frm_1_t_fi_pbb_detail_contributor->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_1_t_fi_pbb_detail_contributor->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_1_t_fi_pbb_detail_contributor_list->RenderRow();

		// Render list options
		$frm_1_t_fi_pbb_detail_contributor_list->RenderListOptions();
?>
	<tr<?php echo $frm_1_t_fi_pbb_detail_contributor->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_1_t_fi_pbb_detail_contributor_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->Visible) { // Contributing Unit ?>
		<td<?php echo $frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->ListViewValue() ?></div>
<a name="<?php echo $frm_1_t_fi_pbb_detail_contributor_list->PageObjName . "_row_" . $frm_1_t_fi_pbb_detail_contributor_list->RowCnt ?>" id="<?php echo $frm_1_t_fi_pbb_detail_contributor_list->PageObjName . "_row_" . $frm_1_t_fi_pbb_detail_contributor_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->MFO->Visible) { // MFO ?>
		<td<?php echo $frm_1_t_fi_pbb_detail_contributor->MFO->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_contributor->MFO->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_contributor->MFO->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->Question->Visible) { // Question ?>
		<td<?php echo $frm_1_t_fi_pbb_detail_contributor->Question->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_contributor->Question->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_contributor->Question->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->Applicable->Visible) { // Applicable ?>
		<td<?php echo $frm_1_t_fi_pbb_detail_contributor->Applicable->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_contributor->Applicable->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_contributor->Applicable->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->Target->Visible) { // Target ?>
		<td<?php echo $frm_1_t_fi_pbb_detail_contributor->Target->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_contributor->Target->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_contributor->Target->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->Target_Remarks->Visible) { // Target Remarks ?>
		<td<?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Remarks->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Remarks->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->Visible) { // Target Cut-Off Date ?>
		<td<?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_1_t_fi_pbb_detail_contributor->Target_Message->Visible) { // Target Message ?>
		<td<?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Message->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Message->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_contributor->Target_Message->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_1_t_fi_pbb_detail_contributor_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_1_t_fi_pbb_detail_contributor->CurrentAction <> "gridadd")
		$frm_1_t_fi_pbb_detail_contributor_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_1_t_fi_pbb_detail_contributor_list->Recordset)
	$frm_1_t_fi_pbb_detail_contributor_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_1_t_fi_pbb_detail_contributor->Export == "" && $frm_1_t_fi_pbb_detail_contributor->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_1_t_fi_pbb_detail_contributor_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_1_t_fi_pbb_detail_contributor->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_1_t_fi_pbb_detail_contributor_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_1_t_fi_pbb_detail_contributor_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_1_t_fi_pbb_detail_contributor';

	// Page object name
	var $PageObjName = 'frm_1_t_fi_pbb_detail_contributor_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_1_t_fi_pbb_detail_contributor;
		if ($frm_1_t_fi_pbb_detail_contributor->UseTokenInUrl) $PageUrl .= "t=" . $frm_1_t_fi_pbb_detail_contributor->TableVar . "&"; // Add page token
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
		global $objForm, $frm_1_t_fi_pbb_detail_contributor;
		if ($frm_1_t_fi_pbb_detail_contributor->UseTokenInUrl) {
			if ($objForm)
				return ($frm_1_t_fi_pbb_detail_contributor->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_1_t_fi_pbb_detail_contributor->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_1_t_fi_pbb_detail_contributor_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_1_t_fi_pbb_detail_contributor)
		if (!isset($GLOBALS["frm_1_t_fi_pbb_detail_contributor"])) {
			$GLOBALS["frm_1_t_fi_pbb_detail_contributor"] = new cfrm_1_t_fi_pbb_detail_contributor();
			$GLOBALS["Table"] =& $GLOBALS["frm_1_t_fi_pbb_detail_contributor"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_1_t_fi_pbb_detail_contributoradd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_1_t_fi_pbb_detail_contributordelete.php";
		$this->MultiUpdateUrl = "frm_1_t_fi_pbb_detail_contributorupdate.php";

		// Table object (frm_1_t_fi_contributor_mfo_status)
		if (!isset($GLOBALS['frm_1_t_fi_contributor_mfo_status'])) $GLOBALS['frm_1_t_fi_contributor_mfo_status'] = new cfrm_1_t_fi_contributor_mfo_status();

		// Table object (frm_1_t_fi_contributor_pi_status)
		if (!isset($GLOBALS['frm_1_t_fi_contributor_pi_status'])) $GLOBALS['frm_1_t_fi_contributor_pi_status'] = new cfrm_1_t_fi_contributor_pi_status();

		// Table object (frm_1_t_fi_cu_status)
		if (!isset($GLOBALS['frm_1_t_fi_cu_status'])) $GLOBALS['frm_1_t_fi_cu_status'] = new cfrm_1_t_fi_cu_status();

		// Table object (frm_1_t_fi_delivery_pi_status)
		if (!isset($GLOBALS['frm_1_t_fi_delivery_pi_status'])) $GLOBALS['frm_1_t_fi_delivery_pi_status'] = new cfrm_1_t_fi_delivery_pi_status();

		// Table object (frm_1_t_fi_delivery_status)
		if (!isset($GLOBALS['frm_1_t_fi_delivery_status'])) $GLOBALS['frm_1_t_fi_delivery_status'] = new cfrm_1_t_fi_delivery_status();

		// Table object (frm_1_t_fi_pbb_detail_delivery)
		if (!isset($GLOBALS['frm_1_t_fi_pbb_detail_delivery'])) $GLOBALS['frm_1_t_fi_pbb_detail_delivery'] = new cfrm_1_t_fi_pbb_detail_delivery();

		// Table object (frm_2_a_fi_pbb_detail_delivery)
		if (!isset($GLOBALS['frm_2_a_fi_pbb_detail_delivery'])) $GLOBALS['frm_2_a_fi_pbb_detail_delivery'] = new cfrm_2_a_fi_pbb_detail_delivery();

		// Table object (frm_2_a_fi_rep_form_a_raw_data_cu)
		if (!isset($GLOBALS['frm_2_a_fi_rep_form_a_raw_data_cu'])) $GLOBALS['frm_2_a_fi_rep_form_a_raw_data_cu'] = new cfrm_2_a_fi_rep_form_a_raw_data_cu();

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_1_t_fi_pbb_detail_contributor', TRUE);

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
		global $frm_1_t_fi_pbb_detail_contributor;

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
			$frm_1_t_fi_pbb_detail_contributor->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_1_t_fi_pbb_detail_contributor;

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
			if ($frm_1_t_fi_pbb_detail_contributor->Export <> "" ||
				$frm_1_t_fi_pbb_detail_contributor->CurrentAction == "gridadd" ||
				$frm_1_t_fi_pbb_detail_contributor->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_1_t_fi_pbb_detail_contributor->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_1_t_fi_pbb_detail_contributor->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_1_t_fi_pbb_detail_contributor->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_1_t_fi_pbb_detail_contributor->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_1_t_fi_pbb_detail_contributor->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_1_t_fi_pbb_detail_contributor->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_1_t_fi_pbb_detail_contributor->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $frm_1_t_fi_pbb_detail_contributor->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_1_t_fi_pbb_detail_contributor->getDetailFilter(); // Restore detail filter

		// Add master User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			if ($frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == "frm_1_t_fi_pbb_detail_delivery")
				$this->DbMasterFilter = $frm_1_t_fi_pbb_detail_contributor->AddMasterUserIDFilter($this->DbMasterFilter, "frm_1_t_fi_pbb_detail_delivery"); // Add master User ID filter
			if ($frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == "frm_1_t_fi_contributor_pi_status")
				$this->DbMasterFilter = $frm_1_t_fi_pbb_detail_contributor->AddMasterUserIDFilter($this->DbMasterFilter, "frm_1_t_fi_contributor_pi_status"); // Add master User ID filter
			if ($frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == "frm_2_a_fi_pbb_detail_delivery")
				$this->DbMasterFilter = $frm_1_t_fi_pbb_detail_contributor->AddMasterUserIDFilter($this->DbMasterFilter, "frm_2_a_fi_pbb_detail_delivery"); // Add master User ID filter
		}
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_1_t_fi_pbb_detail_contributor->getMasterFilter() <> "" && $frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == "frm_1_t_fi_pbb_detail_delivery") {
			global $frm_1_t_fi_pbb_detail_delivery;
			$rsmaster = $frm_1_t_fi_pbb_detail_delivery->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_1_t_fi_pbb_detail_contributor->getReturnUrl()); // Return to caller
			} else {
				$frm_1_t_fi_pbb_detail_delivery->LoadListRowValues($rsmaster);
				$frm_1_t_fi_pbb_detail_delivery->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_1_t_fi_pbb_detail_delivery->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Load master record
		if ($frm_1_t_fi_pbb_detail_contributor->getMasterFilter() <> "" && $frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == "frm_1_t_fi_contributor_pi_status") {
			global $frm_1_t_fi_contributor_pi_status;
			$rsmaster = $frm_1_t_fi_contributor_pi_status->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_1_t_fi_pbb_detail_contributor->getReturnUrl()); // Return to caller
			} else {
				$frm_1_t_fi_contributor_pi_status->LoadListRowValues($rsmaster);
				$frm_1_t_fi_contributor_pi_status->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_1_t_fi_contributor_pi_status->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Load master record
		if ($frm_1_t_fi_pbb_detail_contributor->getMasterFilter() <> "" && $frm_1_t_fi_pbb_detail_contributor->getCurrentMasterTable() == "frm_2_a_fi_pbb_detail_delivery") {
			global $frm_2_a_fi_pbb_detail_delivery;
			$rsmaster = $frm_2_a_fi_pbb_detail_delivery->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_1_t_fi_pbb_detail_contributor->getReturnUrl()); // Return to caller
			} else {
				$frm_2_a_fi_pbb_detail_delivery->LoadListRowValues($rsmaster);
				$frm_2_a_fi_pbb_detail_delivery->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_2_a_fi_pbb_detail_delivery->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_1_t_fi_pbb_detail_contributor->setSessionWhere($sFilter);
		$frm_1_t_fi_pbb_detail_contributor->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_1_t_fi_pbb_detail_contributor;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->Delivery_Unit, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->Contributing_Unit, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->MFO, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->Question, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->mfo_question_online_insert_question_mfo_name_rep, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->Applicable, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->Target_Remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->Target_Message, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->pbb_contributor_derived_from_supporting_documents, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->Accomplishment_Remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->a_cutOffDate_remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->CU, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_1_t_fi_pbb_detail_contributor->mfo_question_report_mfo_name, $Keyword);
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
		global $Security, $frm_1_t_fi_pbb_detail_contributor;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_1_t_fi_pbb_detail_contributor->BasicSearchKeyword;
		$sSearchType = $frm_1_t_fi_pbb_detail_contributor->BasicSearchType;
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
			$frm_1_t_fi_pbb_detail_contributor->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_1_t_fi_pbb_detail_contributor->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_1_t_fi_pbb_detail_contributor;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_1_t_fi_pbb_detail_contributor->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_1_t_fi_pbb_detail_contributor;
		$frm_1_t_fi_pbb_detail_contributor->setSessionBasicSearchKeyword("");
		$frm_1_t_fi_pbb_detail_contributor->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_1_t_fi_pbb_detail_contributor;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_1_t_fi_pbb_detail_contributor->BasicSearchKeyword = $frm_1_t_fi_pbb_detail_contributor->getSessionBasicSearchKeyword();
			$frm_1_t_fi_pbb_detail_contributor->BasicSearchType = $frm_1_t_fi_pbb_detail_contributor->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_1_t_fi_pbb_detail_contributor;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_1_t_fi_pbb_detail_contributor->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_1_t_fi_pbb_detail_contributor->CurrentOrderType = @$_GET["ordertype"];
			$frm_1_t_fi_pbb_detail_contributor->UpdateSort($frm_1_t_fi_pbb_detail_contributor->Contributing_Unit); // Contributing Unit
			$frm_1_t_fi_pbb_detail_contributor->UpdateSort($frm_1_t_fi_pbb_detail_contributor->MFO); // MFO
			$frm_1_t_fi_pbb_detail_contributor->UpdateSort($frm_1_t_fi_pbb_detail_contributor->Question); // Question
			$frm_1_t_fi_pbb_detail_contributor->UpdateSort($frm_1_t_fi_pbb_detail_contributor->Applicable); // Applicable
			$frm_1_t_fi_pbb_detail_contributor->UpdateSort($frm_1_t_fi_pbb_detail_contributor->Target); // Target
			$frm_1_t_fi_pbb_detail_contributor->UpdateSort($frm_1_t_fi_pbb_detail_contributor->Target_Remarks); // Target Remarks
			$frm_1_t_fi_pbb_detail_contributor->UpdateSort($frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date); // Target Cut-Off Date
			$frm_1_t_fi_pbb_detail_contributor->UpdateSort($frm_1_t_fi_pbb_detail_contributor->Target_Message); // Target Message
			$frm_1_t_fi_pbb_detail_contributor->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_1_t_fi_pbb_detail_contributor;
		$sOrderBy = $frm_1_t_fi_pbb_detail_contributor->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_1_t_fi_pbb_detail_contributor->SqlOrderBy() <> "") {
				$sOrderBy = $frm_1_t_fi_pbb_detail_contributor->SqlOrderBy();
				$frm_1_t_fi_pbb_detail_contributor->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_1_t_fi_pbb_detail_contributor;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_1_t_fi_pbb_detail_contributor->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->setSessionValue("");
				$frm_1_t_fi_pbb_detail_contributor->unit_contributor_id->setSessionValue("");
				$frm_1_t_fi_pbb_detail_contributor->mfo_question_online_insert_question_mfo_name_rep->setSessionValue("");
				$frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_1_t_fi_pbb_detail_contributor->setSessionOrderBy($sOrderBy);
				$frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->setSort("");
				$frm_1_t_fi_pbb_detail_contributor->MFO->setSort("");
				$frm_1_t_fi_pbb_detail_contributor->Question->setSort("");
				$frm_1_t_fi_pbb_detail_contributor->Applicable->setSort("");
				$frm_1_t_fi_pbb_detail_contributor->Target->setSort("");
				$frm_1_t_fi_pbb_detail_contributor->Target_Remarks->setSort("");
				$frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->setSort("");
				$frm_1_t_fi_pbb_detail_contributor->Target_Message->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_1_t_fi_pbb_detail_contributor->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_1_t_fi_pbb_detail_contributor;

		// "edit"
		$item =& $this->ListOptions->Add("edit");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanEdit();
		$item->OnLeft = TRUE;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_1_t_fi_pbb_detail_contributor, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $this->ShowOptionLink() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_1_t_fi_pbb_detail_contributor;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_1_t_fi_pbb_detail_contributor;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_1_t_fi_pbb_detail_contributor->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_1_t_fi_pbb_detail_contributor->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_1_t_fi_pbb_detail_contributor->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_1_t_fi_pbb_detail_contributor->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_1_t_fi_pbb_detail_contributor->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_1_t_fi_pbb_detail_contributor->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_1_t_fi_pbb_detail_contributor;
		$frm_1_t_fi_pbb_detail_contributor->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_1_t_fi_pbb_detail_contributor->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_1_t_fi_pbb_detail_contributor;

		// Call Recordset Selecting event
		$frm_1_t_fi_pbb_detail_contributor->Recordset_Selecting($frm_1_t_fi_pbb_detail_contributor->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_1_t_fi_pbb_detail_contributor->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_1_t_fi_pbb_detail_contributor->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_1_t_fi_pbb_detail_contributor;
		$sFilter = $frm_1_t_fi_pbb_detail_contributor->KeyFilter();

		// Call Row Selecting event
		$frm_1_t_fi_pbb_detail_contributor->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_1_t_fi_pbb_detail_contributor->CurrentFilter = $sFilter;
		$sSql = $frm_1_t_fi_pbb_detail_contributor->SQL();
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
		global $conn, $frm_1_t_fi_pbb_detail_contributor;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_1_t_fi_pbb_detail_contributor->Row_Selected($row);
		$frm_1_t_fi_pbb_detail_contributor->pbb_contributor_id->setDbValue($rs->fields('pbb_contributor_id'));
		$frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->setDbValue($rs->fields('pbb_delivery_id'));
		$frm_1_t_fi_pbb_detail_contributor->unit_contributor_id->setDbValue($rs->fields('unit_contributor_id'));
		$frm_1_t_fi_pbb_detail_contributor->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_1_t_fi_pbb_detail_contributor->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_1_t_fi_pbb_detail_contributor->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_1_t_fi_pbb_detail_contributor->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->setDbValue($rs->fields('Contributing Unit'));
		$frm_1_t_fi_pbb_detail_contributor->mfo_question_id->setDbValue($rs->fields('mfo_question_id'));
		$frm_1_t_fi_pbb_detail_contributor->mfo_question_online_pi_seq->setDbValue($rs->fields('mfo_question_online_pi_seq'));
		$frm_1_t_fi_pbb_detail_contributor->MFO->setDbValue($rs->fields('MFO'));
		$frm_1_t_fi_pbb_detail_contributor->Question->setDbValue($rs->fields('Question'));
		$frm_1_t_fi_pbb_detail_contributor->mfo_question_online_insert_question_mfo->setDbValue($rs->fields('mfo_question_online_insert_question_mfo'));
		$frm_1_t_fi_pbb_detail_contributor->mfo_question_online_insert_question_mfo_name_rep->setDbValue($rs->fields('mfo_question_online_insert_question_mfo_name_rep'));
		$frm_1_t_fi_pbb_detail_contributor->Applicable->setDbValue($rs->fields('Applicable'));
		$frm_1_t_fi_pbb_detail_contributor->Target->setDbValue($rs->fields('Target'));
		$frm_1_t_fi_pbb_detail_contributor->Target_Remarks->setDbValue($rs->fields('Target Remarks'));
		$frm_1_t_fi_pbb_detail_contributor->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_1_t_fi_pbb_detail_contributor->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_1_t_fi_pbb_detail_contributor->t_cutOffDate_contributor->setDbValue($rs->fields('t_cutOffDate_contributor'));
		$frm_1_t_fi_pbb_detail_contributor->t_cutOffDate_delivery->setDbValue($rs->fields('t_cutOffDate_delivery'));
		$frm_1_t_fi_pbb_detail_contributor->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->setDbValue($rs->fields('Target Cut-Off Date'));
		$frm_1_t_fi_pbb_detail_contributor->Target_Message->setDbValue($rs->fields('Target Message'));
		$frm_1_t_fi_pbb_detail_contributor->pbb_contributor_derived_from_supporting_documents->setDbValue($rs->fields('pbb_contributor_derived_from_supporting_documents'));
		$frm_1_t_fi_pbb_detail_contributor->Accomplishment->setDbValue($rs->fields('Accomplishment'));
		$frm_1_t_fi_pbb_detail_contributor->Numerator->setDbValue($rs->fields('Numerator'));
		$frm_1_t_fi_pbb_detail_contributor->Jan2DMar_28N29->setDbValue($rs->fields('Jan-Mar (N)'));
		$frm_1_t_fi_pbb_detail_contributor->Apr2DJun_28N29->setDbValue($rs->fields('Apr-Jun (N)'));
		$frm_1_t_fi_pbb_detail_contributor->Jul2DSep_28N29->setDbValue($rs->fields('Jul-Sep (N)'));
		$frm_1_t_fi_pbb_detail_contributor->Oct2DNov_28N29->setDbValue($rs->fields('Oct-Nov (N)'));
		$frm_1_t_fi_pbb_detail_contributor->Denominator->setDbValue($rs->fields('Denominator'));
		$frm_1_t_fi_pbb_detail_contributor->Jan2DMar_28D29->setDbValue($rs->fields('Jan-Mar (D)'));
		$frm_1_t_fi_pbb_detail_contributor->Apr2DJun_28D29->setDbValue($rs->fields('Apr-Jun (D)'));
		$frm_1_t_fi_pbb_detail_contributor->Jul2DSep_28D29->setDbValue($rs->fields('Jul-Sep (D)'));
		$frm_1_t_fi_pbb_detail_contributor->Oct2DNov_28D29->setDbValue($rs->fields('Oct-Nov (D)'));
		$frm_1_t_fi_pbb_detail_contributor->Accomplishment_Remarks->setDbValue($rs->fields('Accomplishment Remarks'));
		$frm_1_t_fi_pbb_detail_contributor->a_startDate->setDbValue($rs->fields('a_startDate'));
		$frm_1_t_fi_pbb_detail_contributor->a_cutOffDate_contributor->setDbValue($rs->fields('a_cutOffDate_contributor'));
		$frm_1_t_fi_pbb_detail_contributor->a_cutOffDate_delivery->setDbValue($rs->fields('a_cutOffDate_delivery'));
		$frm_1_t_fi_pbb_detail_contributor->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_1_t_fi_pbb_detail_contributor->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
		$frm_1_t_fi_pbb_detail_contributor->pbb_contributor_a_rating->setDbValue($rs->fields('pbb_contributor_a_rating'));
		$frm_1_t_fi_pbb_detail_contributor->Below_10025_Performance_Rating->setDbValue($rs->fields('Below 100% Performance Rating'));
		$frm_1_t_fi_pbb_detail_contributor->CU->setDbValue($rs->fields('CU'));
		$frm_1_t_fi_pbb_detail_contributor->mfo_question_report_mfo_name->setDbValue($rs->fields('mfo_question_report_mfo_name'));
		$frm_1_t_fi_pbb_detail_contributor->mfo_question_report_form_a_1_mfo->setDbValue($rs->fields('mfo_question_report_form_a_1_mfo'));
		$frm_1_t_fi_pbb_detail_contributor->mfo_question_report_form_a_1_sequence->setDbValue($rs->fields('mfo_question_report_form_a_1_sequence'));
		$frm_1_t_fi_pbb_detail_contributor->z10025_to_12025_Performance_Rating->setDbValue($rs->fields('100% to 120% Performance Rating'));
		$frm_1_t_fi_pbb_detail_contributor->Above_12025_Performance_Rating->setDbValue($rs->fields('Above 120% Performance Rating'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_1_t_fi_pbb_detail_contributor;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_1_t_fi_pbb_detail_contributor->getKey("pbb_contributor_id")) <> "")
			$frm_1_t_fi_pbb_detail_contributor->pbb_contributor_id->CurrentValue = $frm_1_t_fi_pbb_detail_contributor->getKey("pbb_contributor_id"); // pbb_contributor_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_1_t_fi_pbb_detail_contributor->CurrentFilter = $frm_1_t_fi_pbb_detail_contributor->KeyFilter();
			$sSql = $frm_1_t_fi_pbb_detail_contributor->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_1_t_fi_pbb_detail_contributor;

		// Initialize URLs
		$this->ViewUrl = $frm_1_t_fi_pbb_detail_contributor->ViewUrl();
		$this->EditUrl = $frm_1_t_fi_pbb_detail_contributor->EditUrl();
		$this->InlineEditUrl = $frm_1_t_fi_pbb_detail_contributor->InlineEditUrl();
		$this->CopyUrl = $frm_1_t_fi_pbb_detail_contributor->CopyUrl();
		$this->InlineCopyUrl = $frm_1_t_fi_pbb_detail_contributor->InlineCopyUrl();
		$this->DeleteUrl = $frm_1_t_fi_pbb_detail_contributor->DeleteUrl();

		// Call Row_Rendering event
		$frm_1_t_fi_pbb_detail_contributor->Row_Rendering();

		// Common render codes for all row types
		// pbb_contributor_id
		// pbb_delivery_id
		// unit_contributor_id
		// unit_delivery_id
		// focal_person_id
		// cu_sequence
		// Delivery Unit

		$frm_1_t_fi_pbb_detail_contributor->Delivery_Unit->CellCssStyle = "white-space: nowrap;";

		// Contributing Unit
		$frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->CellCssStyle = "white-space: nowrap;";

		// mfo_question_id
		// mfo_question_online_pi_seq
		// MFO

		$frm_1_t_fi_pbb_detail_contributor->MFO->CellCssStyle = "white-space: nowrap;";

		// Question
		// mfo_question_online_insert_question_mfo
		// mfo_question_online_insert_question_mfo_name_rep
		// Applicable
		// Target
		// Target Remarks
		// cutOffDate_id
		// t_startDate
		// t_cutOffDate_contributor
		// t_cutOffDate_delivery
		// t_cutOffDate_fp
		// Target Cut-Off Date

		$frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->CellCssStyle = "white-space: nowrap;";

		// Target Message
		$frm_1_t_fi_pbb_detail_contributor->Target_Message->CellCssStyle = "white-space: nowrap;";

		// pbb_contributor_derived_from_supporting_documents
		// Accomplishment
		// Numerator
		// Jan-Mar (N)
		// Apr-Jun (N)
		// Jul-Sep (N)
		// Oct-Nov (N)
		// Denominator
		// Jan-Mar (D)
		// Apr-Jun (D)
		// Jul-Sep (D)
		// Oct-Nov (D)
		// Accomplishment Remarks
		// a_startDate
		// a_cutOffDate_contributor
		// a_cutOffDate_delivery
		// a_cutOffDate_fp
		// a_cutOffDate_remarks
		// pbb_contributor_a_rating
		// Below 100% Performance Rating
		// CU
		// mfo_question_report_mfo_name
		// mfo_question_report_form_a_1_mfo
		// mfo_question_report_form_a_1_sequence
		// 100% to 120% Performance Rating
		// Above 120% Performance Rating

		if ($frm_1_t_fi_pbb_detail_contributor->RowType == UP_ROWTYPE_VIEW) { // View row

			// Contributing Unit
			$frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->ViewValue = $frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->CurrentValue;
			$frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->ViewCustomAttributes = "";

			// MFO
			$frm_1_t_fi_pbb_detail_contributor->MFO->ViewValue = $frm_1_t_fi_pbb_detail_contributor->MFO->CurrentValue;
			$frm_1_t_fi_pbb_detail_contributor->MFO->ViewCustomAttributes = "";

			// Question
			$frm_1_t_fi_pbb_detail_contributor->Question->ViewValue = $frm_1_t_fi_pbb_detail_contributor->Question->CurrentValue;
			$frm_1_t_fi_pbb_detail_contributor->Question->ViewCustomAttributes = "";

			// Applicable
			if (strval($frm_1_t_fi_pbb_detail_contributor->Applicable->CurrentValue) <> "") {
				switch ($frm_1_t_fi_pbb_detail_contributor->Applicable->CurrentValue) {
					case "Y":
						$frm_1_t_fi_pbb_detail_contributor->Applicable->ViewValue = $frm_1_t_fi_pbb_detail_contributor->Applicable->FldTagCaption(1) <> "" ? $frm_1_t_fi_pbb_detail_contributor->Applicable->FldTagCaption(1) : $frm_1_t_fi_pbb_detail_contributor->Applicable->CurrentValue;
						break;
					case "N":
						$frm_1_t_fi_pbb_detail_contributor->Applicable->ViewValue = $frm_1_t_fi_pbb_detail_contributor->Applicable->FldTagCaption(2) <> "" ? $frm_1_t_fi_pbb_detail_contributor->Applicable->FldTagCaption(2) : $frm_1_t_fi_pbb_detail_contributor->Applicable->CurrentValue;
						break;
					default:
						$frm_1_t_fi_pbb_detail_contributor->Applicable->ViewValue = $frm_1_t_fi_pbb_detail_contributor->Applicable->CurrentValue;
				}
			} else {
				$frm_1_t_fi_pbb_detail_contributor->Applicable->ViewValue = NULL;
			}
			$frm_1_t_fi_pbb_detail_contributor->Applicable->ViewCustomAttributes = "";

			// Target
			$frm_1_t_fi_pbb_detail_contributor->Target->ViewValue = $frm_1_t_fi_pbb_detail_contributor->Target->CurrentValue;
			$frm_1_t_fi_pbb_detail_contributor->Target->CssStyle = "font-weight:bold;text-align:right;";
			$frm_1_t_fi_pbb_detail_contributor->Target->ViewCustomAttributes = "";

			// Target Remarks
			$frm_1_t_fi_pbb_detail_contributor->Target_Remarks->ViewValue = $frm_1_t_fi_pbb_detail_contributor->Target_Remarks->CurrentValue;
			$frm_1_t_fi_pbb_detail_contributor->Target_Remarks->ViewCustomAttributes = "";

			// Target Cut-Off Date
			$frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->ViewValue = $frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->CurrentValue;
			$frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->ViewCustomAttributes = "";

			// Target Message
			$frm_1_t_fi_pbb_detail_contributor->Target_Message->ViewValue = $frm_1_t_fi_pbb_detail_contributor->Target_Message->CurrentValue;
			$frm_1_t_fi_pbb_detail_contributor->Target_Message->ViewCustomAttributes = "";

			// Contributing Unit
			$frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->LinkCustomAttributes = "";
			$frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->HrefValue = "";
			$frm_1_t_fi_pbb_detail_contributor->Contributing_Unit->TooltipValue = "";

			// MFO
			$frm_1_t_fi_pbb_detail_contributor->MFO->LinkCustomAttributes = "";
			$frm_1_t_fi_pbb_detail_contributor->MFO->HrefValue = "";
			$frm_1_t_fi_pbb_detail_contributor->MFO->TooltipValue = "";

			// Question
			$frm_1_t_fi_pbb_detail_contributor->Question->LinkCustomAttributes = "";
			$frm_1_t_fi_pbb_detail_contributor->Question->HrefValue = "";
			$frm_1_t_fi_pbb_detail_contributor->Question->TooltipValue = "";

			// Applicable
			$frm_1_t_fi_pbb_detail_contributor->Applicable->LinkCustomAttributes = "";
			$frm_1_t_fi_pbb_detail_contributor->Applicable->HrefValue = "";
			$frm_1_t_fi_pbb_detail_contributor->Applicable->TooltipValue = "";

			// Target
			$frm_1_t_fi_pbb_detail_contributor->Target->LinkCustomAttributes = "";
			$frm_1_t_fi_pbb_detail_contributor->Target->HrefValue = "";
			$frm_1_t_fi_pbb_detail_contributor->Target->TooltipValue = "";

			// Target Remarks
			$frm_1_t_fi_pbb_detail_contributor->Target_Remarks->LinkCustomAttributes = "";
			$frm_1_t_fi_pbb_detail_contributor->Target_Remarks->HrefValue = "";
			$frm_1_t_fi_pbb_detail_contributor->Target_Remarks->TooltipValue = "";

			// Target Cut-Off Date
			$frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->LinkCustomAttributes = "";
			$frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->HrefValue = "";
			$frm_1_t_fi_pbb_detail_contributor->Target_Cut2DOff_Date->TooltipValue = "";

			// Target Message
			$frm_1_t_fi_pbb_detail_contributor->Target_Message->LinkCustomAttributes = "";
			$frm_1_t_fi_pbb_detail_contributor->Target_Message->HrefValue = "";
			$frm_1_t_fi_pbb_detail_contributor->Target_Message->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_1_t_fi_pbb_detail_contributor->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_1_t_fi_pbb_detail_contributor->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_1_t_fi_pbb_detail_contributor;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_1_t_fi_pbb_detail_contributor->focal_person_id->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_1_t_fi_pbb_detail_contributor;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "frm_1_t_fi_pbb_detail_delivery") {
				$bValidMaster = TRUE;
				if (@$_GET["pbb_delivery_id"] <> "") {
					$GLOBALS["frm_1_t_fi_pbb_detail_delivery"]->pbb_delivery_id->setQueryStringValue($_GET["pbb_delivery_id"]);
					$frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->setQueryStringValue($GLOBALS["frm_1_t_fi_pbb_detail_delivery"]->pbb_delivery_id->QueryStringValue);
					$frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->setSessionValue($frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_1_t_fi_pbb_detail_delivery"]->pbb_delivery_id->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
			if ($sMasterTblVar == "frm_1_t_fi_contributor_pi_status") {
				$bValidMaster = TRUE;
				if (@$_GET["unit_contributor_id"] <> "") {
					$GLOBALS["frm_1_t_fi_contributor_pi_status"]->unit_contributor_id->setQueryStringValue($_GET["unit_contributor_id"]);
					$frm_1_t_fi_pbb_detail_contributor->unit_contributor_id->setQueryStringValue($GLOBALS["frm_1_t_fi_contributor_pi_status"]->unit_contributor_id->QueryStringValue);
					$frm_1_t_fi_pbb_detail_contributor->unit_contributor_id->setSessionValue($frm_1_t_fi_pbb_detail_contributor->unit_contributor_id->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_1_t_fi_contributor_pi_status"]->unit_contributor_id->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
				if (@$_GET["MFO"] <> "") {
					$GLOBALS["frm_1_t_fi_contributor_pi_status"]->MFO->setQueryStringValue($_GET["MFO"]);
					$frm_1_t_fi_pbb_detail_contributor->mfo_question_online_insert_question_mfo_name_rep->setQueryStringValue($GLOBALS["frm_1_t_fi_contributor_pi_status"]->MFO->QueryStringValue);
					$frm_1_t_fi_pbb_detail_contributor->mfo_question_online_insert_question_mfo_name_rep->setSessionValue($frm_1_t_fi_pbb_detail_contributor->mfo_question_online_insert_question_mfo_name_rep->QueryStringValue);
				} else {
					$bValidMaster = FALSE;
				}
			}
			if ($sMasterTblVar == "frm_2_a_fi_pbb_detail_delivery") {
				$bValidMaster = TRUE;
				if (@$_GET["pbb_delivery_id"] <> "") {
					$GLOBALS["frm_2_a_fi_pbb_detail_delivery"]->pbb_delivery_id->setQueryStringValue($_GET["pbb_delivery_id"]);
					$frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->setQueryStringValue($GLOBALS["frm_2_a_fi_pbb_detail_delivery"]->pbb_delivery_id->QueryStringValue);
					$frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->setSessionValue($frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_2_a_fi_pbb_detail_delivery"]->pbb_delivery_id->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$frm_1_t_fi_pbb_detail_contributor->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$frm_1_t_fi_pbb_detail_contributor->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "frm_1_t_fi_pbb_detail_delivery") {
				if ($frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->QueryStringValue == "") $frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->setSessionValue("");
			}
			if ($sMasterTblVar <> "frm_1_t_fi_contributor_pi_status") {
				if ($frm_1_t_fi_pbb_detail_contributor->unit_contributor_id->QueryStringValue == "") $frm_1_t_fi_pbb_detail_contributor->unit_contributor_id->setSessionValue("");
				if ($frm_1_t_fi_pbb_detail_contributor->mfo_question_online_insert_question_mfo_name_rep->QueryStringValue == "") $frm_1_t_fi_pbb_detail_contributor->mfo_question_online_insert_question_mfo_name_rep->setSessionValue("");
			}
			if ($sMasterTblVar <> "frm_2_a_fi_pbb_detail_delivery") {
				if ($frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->QueryStringValue == "") $frm_1_t_fi_pbb_detail_contributor->pbb_delivery_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $frm_1_t_fi_pbb_detail_contributor->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_1_t_fi_pbb_detail_contributor->getDetailFilter(); // Get detail filter
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
