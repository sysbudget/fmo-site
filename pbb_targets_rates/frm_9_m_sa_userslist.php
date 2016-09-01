<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_9_m_sa_users_list = new cfrm_9_m_sa_users_list();
$Page =& $frm_9_m_sa_users_list;

// Page init
$frm_9_m_sa_users_list->Page_Init();

// Page main
$frm_9_m_sa_users_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_9_m_sa_users->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_9_m_sa_users_list = new up_Page("frm_9_m_sa_users_list");

// page properties
frm_9_m_sa_users_list.PageID = "list"; // page ID
frm_9_m_sa_users_list.FormID = "ffrm_9_m_sa_userslist"; // form ID
var UP_PAGE_ID = frm_9_m_sa_users_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_9_m_sa_users_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_9_m_sa_users_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_9_m_sa_users_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_9_m_sa_users_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_9_m_sa_users->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_9_m_sa_users->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_9_m_sa_users_list->TotalRecs = $frm_9_m_sa_users->SelectRecordCount();
	} else {
		if ($frm_9_m_sa_users_list->Recordset = $frm_9_m_sa_users_list->LoadRecordset())
			$frm_9_m_sa_users_list->TotalRecs = $frm_9_m_sa_users_list->Recordset->RecordCount();
	}
	$frm_9_m_sa_users_list->StartRec = 1;
	if ($frm_9_m_sa_users_list->DisplayRecs <= 0 || ($frm_9_m_sa_users->Export <> "" && $frm_9_m_sa_users->ExportAll)) // Display all records
		$frm_9_m_sa_users_list->DisplayRecs = $frm_9_m_sa_users_list->TotalRecs;
	if (!($frm_9_m_sa_users->Export <> "" && $frm_9_m_sa_users->ExportAll))
		$frm_9_m_sa_users_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_9_m_sa_users_list->Recordset = $frm_9_m_sa_users_list->LoadRecordset($frm_9_m_sa_users_list->StartRec-1, $frm_9_m_sa_users_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_9_m_sa_users->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_9_m_sa_users_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_9_m_sa_users->Export == "" && $frm_9_m_sa_users->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_9_m_sa_users_list);" style="text-decoration: none;"><img id="frm_9_m_sa_users_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_9_m_sa_users_list_SearchPanel">
<form name="ffrm_9_m_sa_userslistsrch" id="ffrm_9_m_sa_userslistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_9_m_sa_users">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_9_m_sa_users->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_9_m_sa_users_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_9_m_sa_users->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_9_m_sa_users->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_9_m_sa_users->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_9_m_sa_users_list->ShowPageHeader(); ?>
<?php
$frm_9_m_sa_users_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_9_m_sa_users->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_9_m_sa_users->CurrentAction <> "gridadd" && $frm_9_m_sa_users->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_9_m_sa_users_list->Pager)) $frm_9_m_sa_users_list->Pager = new cPrevNextPager($frm_9_m_sa_users_list->StartRec, $frm_9_m_sa_users_list->DisplayRecs, $frm_9_m_sa_users_list->TotalRecs) ?>
<?php if ($frm_9_m_sa_users_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_9_m_sa_users_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_users_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_users_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_9_m_sa_users_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_users_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_users_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_9_m_sa_users_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_9_m_sa_users_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_users_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_users_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_9_m_sa_users_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_9_m_sa_users_list->PageUrl() ?>start=<?php echo $frm_9_m_sa_users_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_9_m_sa_users_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_9_m_sa_users_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_9_m_sa_users_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_9_m_sa_users_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_9_m_sa_users_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $frm_9_m_sa_users_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($frm_9_m_sa_users_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ffrm_9_m_sa_userslist, '<?php echo $frm_9_m_sa_users_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ffrm_9_m_sa_userslist" id="ffrm_9_m_sa_userslist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_9_m_sa_users">
<div id="gmp_frm_9_m_sa_users" class="upGridMiddlePanel">
<?php if ($frm_9_m_sa_users_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_9_m_sa_users->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_9_m_sa_users_list->RenderListOptions();

// Render list options (header, left)
$frm_9_m_sa_users_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_9_m_sa_users->CU->Visible) { // CU ?>
	<?php if ($frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->CU) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_9_m_sa_users->CU->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->CU) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_9_m_sa_users->CU->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_users->CU->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_users->CU->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_users->Delivery_Unit->Visible) { // Delivery Unit ?>
	<?php if ($frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->Delivery_Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_9_m_sa_users->Delivery_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->Delivery_Unit) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_9_m_sa_users->Delivery_Unit->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_users->Delivery_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_users->Delivery_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_users->Contributor_Unit->Visible) { // Contributor Unit ?>
	<?php if ($frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->Contributor_Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_9_m_sa_users->Contributor_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->Contributor_Unit) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_9_m_sa_users->Contributor_Unit->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_users->Contributor_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_users->Contributor_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_users->Login_Name->Visible) { // Login Name ?>
	<?php if ($frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->Login_Name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_9_m_sa_users->Login_Name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->Login_Name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_9_m_sa_users->Login_Name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_users->Login_Name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_users->Login_Name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_users->Password->Visible) { // Password ?>
	<?php if ($frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->Password) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_9_m_sa_users->Password->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->Password) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_9_m_sa_users->Password->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_users->Password->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_users->Password->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_users->User_Level->Visible) { // User Level ?>
	<?php if ($frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->User_Level) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_9_m_sa_users->User_Level->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->User_Level) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_9_m_sa_users->User_Level->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_users->User_Level->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_users->User_Level->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_users->User_Name->Visible) { // User Name ?>
	<?php if ($frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->User_Name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_9_m_sa_users->User_Name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->User_Name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_9_m_sa_users->User_Name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_users->User_Name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_users->User_Name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_users->zEmail->Visible) { // Email ?>
	<?php if ($frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->zEmail) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_9_m_sa_users->zEmail->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->zEmail) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_9_m_sa_users->zEmail->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_users->zEmail->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_users->zEmail->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_9_m_sa_users->Contact_No2E->Visible) { // Contact No. ?>
	<?php if ($frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->Contact_No2E) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_9_m_sa_users->Contact_No2E->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_9_m_sa_users->SortUrl($frm_9_m_sa_users->Contact_No2E) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_9_m_sa_users->Contact_No2E->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_9_m_sa_users->Contact_No2E->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_9_m_sa_users->Contact_No2E->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_9_m_sa_users_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_9_m_sa_users->ExportAll && $frm_9_m_sa_users->Export <> "") {
	$frm_9_m_sa_users_list->StopRec = $frm_9_m_sa_users_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_9_m_sa_users_list->TotalRecs > $frm_9_m_sa_users_list->StartRec + $frm_9_m_sa_users_list->DisplayRecs - 1)
		$frm_9_m_sa_users_list->StopRec = $frm_9_m_sa_users_list->StartRec + $frm_9_m_sa_users_list->DisplayRecs - 1;
	else
		$frm_9_m_sa_users_list->StopRec = $frm_9_m_sa_users_list->TotalRecs;
}
$frm_9_m_sa_users_list->RecCnt = $frm_9_m_sa_users_list->StartRec - 1;
if ($frm_9_m_sa_users_list->Recordset && !$frm_9_m_sa_users_list->Recordset->EOF) {
	$frm_9_m_sa_users_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_9_m_sa_users_list->StartRec > 1)
		$frm_9_m_sa_users_list->Recordset->Move($frm_9_m_sa_users_list->StartRec - 1);
} elseif (!$frm_9_m_sa_users->AllowAddDeleteRow && $frm_9_m_sa_users_list->StopRec == 0) {
	$frm_9_m_sa_users_list->StopRec = $frm_9_m_sa_users->GridAddRowCount;
}

// Initialize aggregate
$frm_9_m_sa_users->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_9_m_sa_users->ResetAttrs();
$frm_9_m_sa_users_list->RenderRow();
$frm_9_m_sa_users_list->RowCnt = 0;
while ($frm_9_m_sa_users_list->RecCnt < $frm_9_m_sa_users_list->StopRec) {
	$frm_9_m_sa_users_list->RecCnt++;
	if (intval($frm_9_m_sa_users_list->RecCnt) >= intval($frm_9_m_sa_users_list->StartRec)) {
		$frm_9_m_sa_users_list->RowCnt++;

		// Set up key count
		$frm_9_m_sa_users_list->KeyCount = $frm_9_m_sa_users_list->RowIndex;

		// Init row class and style
		$frm_9_m_sa_users->ResetAttrs();
		$frm_9_m_sa_users->CssClass = "";
		if ($frm_9_m_sa_users->CurrentAction == "gridadd") {
		} else {
			$frm_9_m_sa_users_list->LoadRowValues($frm_9_m_sa_users_list->Recordset); // Load row values
		}
		$frm_9_m_sa_users->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_9_m_sa_users->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_9_m_sa_users_list->RenderRow();

		// Render list options
		$frm_9_m_sa_users_list->RenderListOptions();
?>
	<tr<?php echo $frm_9_m_sa_users->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_9_m_sa_users_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_9_m_sa_users->CU->Visible) { // CU ?>
		<td<?php echo $frm_9_m_sa_users->CU->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->CU->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->CU->ListViewValue() ?></div>
<a name="<?php echo $frm_9_m_sa_users_list->PageObjName . "_row_" . $frm_9_m_sa_users_list->RowCnt ?>" id="<?php echo $frm_9_m_sa_users_list->PageObjName . "_row_" . $frm_9_m_sa_users_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_9_m_sa_users->Delivery_Unit->Visible) { // Delivery Unit ?>
		<td<?php echo $frm_9_m_sa_users->Delivery_Unit->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->Delivery_Unit->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_users->Contributor_Unit->Visible) { // Contributor Unit ?>
		<td<?php echo $frm_9_m_sa_users->Contributor_Unit->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->Contributor_Unit->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->Contributor_Unit->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_users->Login_Name->Visible) { // Login Name ?>
		<td<?php echo $frm_9_m_sa_users->Login_Name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->Login_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->Login_Name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_users->Password->Visible) { // Password ?>
		<td<?php echo $frm_9_m_sa_users->Password->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->Password->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->Password->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_users->User_Level->Visible) { // User Level ?>
		<td<?php echo $frm_9_m_sa_users->User_Level->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->User_Level->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->User_Level->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_users->User_Name->Visible) { // User Name ?>
		<td<?php echo $frm_9_m_sa_users->User_Name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->User_Name->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->User_Name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_users->zEmail->Visible) { // Email ?>
		<td<?php echo $frm_9_m_sa_users->zEmail->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->zEmail->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->zEmail->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_9_m_sa_users->Contact_No2E->Visible) { // Contact No. ?>
		<td<?php echo $frm_9_m_sa_users->Contact_No2E->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_users->Contact_No2E->ViewAttributes() ?>><?php echo $frm_9_m_sa_users->Contact_No2E->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_9_m_sa_users_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_9_m_sa_users->CurrentAction <> "gridadd")
		$frm_9_m_sa_users_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_9_m_sa_users_list->Recordset)
	$frm_9_m_sa_users_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_9_m_sa_users->Export == "" && $frm_9_m_sa_users->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_9_m_sa_users_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_9_m_sa_users->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_9_m_sa_users_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_9_m_sa_users_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_9_m_sa_users';

	// Page object name
	var $PageObjName = 'frm_9_m_sa_users_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_9_m_sa_users;
		if ($frm_9_m_sa_users->UseTokenInUrl) $PageUrl .= "t=" . $frm_9_m_sa_users->TableVar . "&"; // Add page token
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
		global $objForm, $frm_9_m_sa_users;
		if ($frm_9_m_sa_users->UseTokenInUrl) {
			if ($objForm)
				return ($frm_9_m_sa_users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_9_m_sa_users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_9_m_sa_users_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS["frm_9_m_sa_users"])) {
			$GLOBALS["frm_9_m_sa_users"] = new cfrm_9_m_sa_users();
			$GLOBALS["Table"] =& $GLOBALS["frm_9_m_sa_users"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_9_m_sa_usersadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_9_m_sa_usersdelete.php";
		$this->MultiUpdateUrl = "frm_9_m_sa_usersupdate.php";

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_9_m_sa_users', TRUE);

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
		global $frm_9_m_sa_users;

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
			$frm_9_m_sa_users->Export = $_GET["export"];
		} elseif (up_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$frm_9_m_sa_users->Export = $_POST["exporttype"];
		} else {
			$frm_9_m_sa_users->setExportReturnUrl(up_CurrentUrl());
		}
		$gsExport = $frm_9_m_sa_users->Export; // Get export parameter, used in header
		$gsExportFile = $frm_9_m_sa_users->TableVar; // Get export file, used in header
		$Charset = (UP_CHARSET <> "") ? ";charset=" . UP_CHARSET : ""; // Charset used in header
		if ($frm_9_m_sa_users->Export == "csv") {
			header('Content-Type: application/csv' . $Charset);
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_9_m_sa_users->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_9_m_sa_users;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($frm_9_m_sa_users->Export <> "" ||
				$frm_9_m_sa_users->CurrentAction == "gridadd" ||
				$frm_9_m_sa_users->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_9_m_sa_users->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_9_m_sa_users->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_9_m_sa_users->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_9_m_sa_users->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_9_m_sa_users->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_9_m_sa_users->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_9_m_sa_users->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$frm_9_m_sa_users->setSessionWhere($sFilter);
		$frm_9_m_sa_users->CurrentFilter = "";

		// Export data only
		if (in_array($frm_9_m_sa_users->Export, array("html","word","excel","xml","csv","email","pdf"))) {
			$this->ExportData();
			if ($frm_9_m_sa_users->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_9_m_sa_users;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_users->CU, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_users->Delivery_Unit, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_users->Contributor_Unit, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_users->Login_Name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_users->Password, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_users->User_Name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_users->zEmail, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_9_m_sa_users->Contact_No2E, $Keyword);
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
		global $Security, $frm_9_m_sa_users;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_9_m_sa_users->BasicSearchKeyword;
		$sSearchType = $frm_9_m_sa_users->BasicSearchType;
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
			$frm_9_m_sa_users->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_9_m_sa_users->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_9_m_sa_users;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_9_m_sa_users->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_9_m_sa_users;
		$frm_9_m_sa_users->setSessionBasicSearchKeyword("");
		$frm_9_m_sa_users->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_9_m_sa_users;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_9_m_sa_users->BasicSearchKeyword = $frm_9_m_sa_users->getSessionBasicSearchKeyword();
			$frm_9_m_sa_users->BasicSearchType = $frm_9_m_sa_users->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_9_m_sa_users;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_9_m_sa_users->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_9_m_sa_users->CurrentOrderType = @$_GET["ordertype"];
			$frm_9_m_sa_users->UpdateSort($frm_9_m_sa_users->CU); // CU
			$frm_9_m_sa_users->UpdateSort($frm_9_m_sa_users->Delivery_Unit); // Delivery Unit
			$frm_9_m_sa_users->UpdateSort($frm_9_m_sa_users->Contributor_Unit); // Contributor Unit
			$frm_9_m_sa_users->UpdateSort($frm_9_m_sa_users->Login_Name); // Login Name
			$frm_9_m_sa_users->UpdateSort($frm_9_m_sa_users->Password); // Password
			$frm_9_m_sa_users->UpdateSort($frm_9_m_sa_users->User_Level); // User Level
			$frm_9_m_sa_users->UpdateSort($frm_9_m_sa_users->User_Name); // User Name
			$frm_9_m_sa_users->UpdateSort($frm_9_m_sa_users->zEmail); // Email
			$frm_9_m_sa_users->UpdateSort($frm_9_m_sa_users->Contact_No2E); // Contact No.
			$frm_9_m_sa_users->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_9_m_sa_users;
		$sOrderBy = $frm_9_m_sa_users->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_9_m_sa_users->SqlOrderBy() <> "") {
				$sOrderBy = $frm_9_m_sa_users->SqlOrderBy();
				$frm_9_m_sa_users->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_9_m_sa_users;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_9_m_sa_users->setSessionOrderBy($sOrderBy);
				$frm_9_m_sa_users->CU->setSort("");
				$frm_9_m_sa_users->Delivery_Unit->setSort("");
				$frm_9_m_sa_users->Contributor_Unit->setSort("");
				$frm_9_m_sa_users->Login_Name->setSort("");
				$frm_9_m_sa_users->Password->setSort("");
				$frm_9_m_sa_users->User_Level->setSort("");
				$frm_9_m_sa_users->User_Name->setSort("");
				$frm_9_m_sa_users->zEmail->setSort("");
				$frm_9_m_sa_users->Contact_No2E->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_9_m_sa_users->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_9_m_sa_users;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"frm_9_m_sa_users_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_9_m_sa_users, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $this->ShowOptionLink() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $this->ShowOptionLink() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($frm_9_m_sa_users->users_id->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_9_m_sa_users;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_9_m_sa_users;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_9_m_sa_users->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_9_m_sa_users->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_9_m_sa_users->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_9_m_sa_users->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_9_m_sa_users->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_9_m_sa_users->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_9_m_sa_users;
		$frm_9_m_sa_users->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_9_m_sa_users->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_9_m_sa_users;

		// Call Recordset Selecting event
		$frm_9_m_sa_users->Recordset_Selecting($frm_9_m_sa_users->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_9_m_sa_users->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_9_m_sa_users->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_9_m_sa_users;
		$sFilter = $frm_9_m_sa_users->KeyFilter();

		// Call Row Selecting event
		$frm_9_m_sa_users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_9_m_sa_users->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_users->SQL();
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
		global $conn, $frm_9_m_sa_users;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_9_m_sa_users->Row_Selected($row);
		$frm_9_m_sa_users->users_id->setDbValue($rs->fields('users_id'));
		$frm_9_m_sa_users->unit_contributor_id->setDbValue($rs->fields('unit_contributor_id'));
		$frm_9_m_sa_users->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_9_m_sa_users->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_9_m_sa_users->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_9_m_sa_users->CU->setDbValue($rs->fields('CU'));
		$frm_9_m_sa_users->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$frm_9_m_sa_users->Contributor_Unit->setDbValue($rs->fields('Contributor Unit'));
		$frm_9_m_sa_users->Login_Name->setDbValue($rs->fields('Login Name'));
		$frm_9_m_sa_users->Password->setDbValue($rs->fields('Password'));
		$frm_9_m_sa_users->User_Level->setDbValue($rs->fields('User Level'));
		$frm_9_m_sa_users->User_Name->setDbValue($rs->fields('User Name'));
		$frm_9_m_sa_users->Last_Name->setDbValue($rs->fields('Last Name'));
		$frm_9_m_sa_users->First_Name->setDbValue($rs->fields('First Name'));
		$frm_9_m_sa_users->Middle_Name->setDbValue($rs->fields('Middle Name'));
		$frm_9_m_sa_users->zEmail->setDbValue($rs->fields('Email'));
		$frm_9_m_sa_users->Contact_No2E->setDbValue($rs->fields('Contact No.'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_9_m_sa_users;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_9_m_sa_users->getKey("users_id")) <> "")
			$frm_9_m_sa_users->users_id->CurrentValue = $frm_9_m_sa_users->getKey("users_id"); // users_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_9_m_sa_users->CurrentFilter = $frm_9_m_sa_users->KeyFilter();
			$sSql = $frm_9_m_sa_users->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_users;

		// Initialize URLs
		$this->ViewUrl = $frm_9_m_sa_users->ViewUrl();
		$this->EditUrl = $frm_9_m_sa_users->EditUrl();
		$this->InlineEditUrl = $frm_9_m_sa_users->InlineEditUrl();
		$this->CopyUrl = $frm_9_m_sa_users->CopyUrl();
		$this->InlineCopyUrl = $frm_9_m_sa_users->InlineCopyUrl();
		$this->DeleteUrl = $frm_9_m_sa_users->DeleteUrl();

		// Call Row_Rendering event
		$frm_9_m_sa_users->Row_Rendering();

		// Common render codes for all row types
		// users_id
		// unit_contributor_id
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// CU

		$frm_9_m_sa_users->CU->CellCssStyle = "white-space: nowrap;";

		// Delivery Unit
		$frm_9_m_sa_users->Delivery_Unit->CellCssStyle = "white-space: nowrap;";

		// Contributor Unit
		$frm_9_m_sa_users->Contributor_Unit->CellCssStyle = "white-space: nowrap;";

		// Login Name
		$frm_9_m_sa_users->Login_Name->CellCssStyle = "white-space: nowrap;";

		// Password
		$frm_9_m_sa_users->Password->CellCssStyle = "white-space: nowrap;";

		// User Level
		$frm_9_m_sa_users->User_Level->CellCssStyle = "white-space: nowrap;";

		// User Name
		$frm_9_m_sa_users->User_Name->CellCssStyle = "white-space: nowrap;";

		// Last Name
		$frm_9_m_sa_users->Last_Name->CellCssStyle = "white-space: nowrap;";

		// First Name
		$frm_9_m_sa_users->First_Name->CellCssStyle = "white-space: nowrap;";

		// Middle Name
		$frm_9_m_sa_users->Middle_Name->CellCssStyle = "white-space: nowrap;";

		// Email
		$frm_9_m_sa_users->zEmail->CellCssStyle = "white-space: nowrap;";

		// Contact No.
		$frm_9_m_sa_users->Contact_No2E->CellCssStyle = "white-space: nowrap;";
		if ($frm_9_m_sa_users->RowType == UP_ROWTYPE_VIEW) { // View row

			// CU
			$frm_9_m_sa_users->CU->ViewValue = $frm_9_m_sa_users->CU->CurrentValue;
			$frm_9_m_sa_users->CU->ViewCustomAttributes = "";

			// Delivery Unit
			$frm_9_m_sa_users->Delivery_Unit->ViewValue = $frm_9_m_sa_users->Delivery_Unit->CurrentValue;
			$frm_9_m_sa_users->Delivery_Unit->ViewCustomAttributes = "";

			// Contributor Unit
			$frm_9_m_sa_users->Contributor_Unit->ViewValue = $frm_9_m_sa_users->Contributor_Unit->CurrentValue;
			$frm_9_m_sa_users->Contributor_Unit->ViewCustomAttributes = "";

			// Login Name
			$frm_9_m_sa_users->Login_Name->ViewValue = $frm_9_m_sa_users->Login_Name->CurrentValue;
			$frm_9_m_sa_users->Login_Name->ViewCustomAttributes = "";

			// Password
			$frm_9_m_sa_users->Password->ViewValue = "********";
			$frm_9_m_sa_users->Password->ViewCustomAttributes = "";

			// User Level
			if ($Security->CanAdmin()) { // System admin
			if (strval($frm_9_m_sa_users->User_Level->CurrentValue) <> "") {
				switch ($frm_9_m_sa_users->User_Level->CurrentValue) {
					case "-1":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(1) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(1) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "0":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(2) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(2) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "1":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(3) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(3) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "2":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(4) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(4) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "3":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(5) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(5) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					case "4":
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->FldTagCaption(6) <> "" ? $frm_9_m_sa_users->User_Level->FldTagCaption(6) : $frm_9_m_sa_users->User_Level->CurrentValue;
						break;
					default:
						$frm_9_m_sa_users->User_Level->ViewValue = $frm_9_m_sa_users->User_Level->CurrentValue;
				}
			} else {
				$frm_9_m_sa_users->User_Level->ViewValue = NULL;
			}
			} else {
				$frm_9_m_sa_users->User_Level->ViewValue = "********";
			}
			$frm_9_m_sa_users->User_Level->ViewCustomAttributes = "";

			// User Name
			$frm_9_m_sa_users->User_Name->ViewValue = $frm_9_m_sa_users->User_Name->CurrentValue;
			$frm_9_m_sa_users->User_Name->ViewCustomAttributes = "";

			// Email
			$frm_9_m_sa_users->zEmail->ViewValue = $frm_9_m_sa_users->zEmail->CurrentValue;
			$frm_9_m_sa_users->zEmail->ViewCustomAttributes = "";

			// Contact No.
			$frm_9_m_sa_users->Contact_No2E->ViewValue = $frm_9_m_sa_users->Contact_No2E->CurrentValue;
			$frm_9_m_sa_users->Contact_No2E->ViewCustomAttributes = "";

			// CU
			$frm_9_m_sa_users->CU->LinkCustomAttributes = "";
			$frm_9_m_sa_users->CU->HrefValue = "";
			$frm_9_m_sa_users->CU->TooltipValue = "";

			// Delivery Unit
			$frm_9_m_sa_users->Delivery_Unit->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Delivery_Unit->HrefValue = "";
			$frm_9_m_sa_users->Delivery_Unit->TooltipValue = "";

			// Contributor Unit
			$frm_9_m_sa_users->Contributor_Unit->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Contributor_Unit->HrefValue = "";
			$frm_9_m_sa_users->Contributor_Unit->TooltipValue = "";

			// Login Name
			$frm_9_m_sa_users->Login_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Login_Name->HrefValue = "";
			$frm_9_m_sa_users->Login_Name->TooltipValue = "";

			// Password
			$frm_9_m_sa_users->Password->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Password->HrefValue = "";
			$frm_9_m_sa_users->Password->TooltipValue = "";

			// User Level
			$frm_9_m_sa_users->User_Level->LinkCustomAttributes = "";
			$frm_9_m_sa_users->User_Level->HrefValue = "";
			$frm_9_m_sa_users->User_Level->TooltipValue = "";

			// User Name
			$frm_9_m_sa_users->User_Name->LinkCustomAttributes = "";
			$frm_9_m_sa_users->User_Name->HrefValue = "";
			$frm_9_m_sa_users->User_Name->TooltipValue = "";

			// Email
			$frm_9_m_sa_users->zEmail->LinkCustomAttributes = "";
			$frm_9_m_sa_users->zEmail->HrefValue = "";
			$frm_9_m_sa_users->zEmail->TooltipValue = "";

			// Contact No.
			$frm_9_m_sa_users->Contact_No2E->LinkCustomAttributes = "";
			$frm_9_m_sa_users->Contact_No2E->HrefValue = "";
			$frm_9_m_sa_users->Contact_No2E->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_9_m_sa_users->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_9_m_sa_users->Row_Rendered();
	}

	// Set up export options
	function SetupExportOptions() {
		global $Language, $frm_9_m_sa_users;

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
		$item->Body = "<a name=\"emf_frm_9_m_sa_users\" id=\"emf_frm_9_m_sa_users\" href=\"javascript:void(0);\" onclick=\"up_EmailDialogShow({lnk:'emf_frm_9_m_sa_users',hdr:upLanguage.Phrase('ExportToEmail'),f:document.ffrm_9_m_sa_userslist,sel:false});\">" . $Language->Phrase("ExportToEmail") . "</a>";
		$item->Visible = FALSE;

		// Hide options for export/action
		if ($frm_9_m_sa_users->Export <> "" ||
			$frm_9_m_sa_users->CurrentAction <> "")
			$this->ExportOptions->HideAllOptions();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	function ExportData() {
		global $frm_9_m_sa_users;
		$utf8 = (strtolower(UP_CHARSET) == "utf-8");
		$bSelectLimit = UP_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->TotalRecs = $frm_9_m_sa_users->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;

		// Export all
		if ($frm_9_m_sa_users->ExportAll) {
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
		if ($frm_9_m_sa_users->Export == "xml") {
			$XmlDoc = new cXMLDocument(UP_XML_ENCODING);
		} else {
			$ExportDoc = new cExportDocument($frm_9_m_sa_users, "h");
		}
		$ParentTable = "";
		if ($bSelectLimit) {
			$StartRec = 1;
			$StopRec = $this->DisplayRecs;
		} else {
			$StartRec = $this->StartRec;
			$StopRec = $this->StopRec;
		}
		if ($frm_9_m_sa_users->Export == "xml") {
			$frm_9_m_sa_users->ExportXmlDocument($XmlDoc, ($ParentTable <> ""), $rs, $StartRec, $StopRec, "");
		} else {
			$sHeader = $this->PageHeader;
			$this->Page_DataRendering($sHeader);
			$ExportDoc->Text .= $sHeader;
			$frm_9_m_sa_users->ExportDocument($ExportDoc, $rs, $StartRec, $StopRec, "");
			$sFooter = $this->PageFooter;
			$this->Page_DataRendered($sFooter);
			$ExportDoc->Text .= $sFooter;
		}

		// Close recordset
		$rs->Close();

		// Export header and footer
		if ($frm_9_m_sa_users->Export <> "xml") {
			$ExportDoc->ExportHeaderAndFooter();
		}

		// Clean output buffer
		if (!UP_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($frm_9_m_sa_users->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (UP_DEBUG_ENABLED)
			echo up_DebugMsg();

		// Output data
		if ($frm_9_m_sa_users->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($frm_9_m_sa_users->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($frm_9_m_sa_users->ExportReturnUrl());
		} elseif ($frm_9_m_sa_users->Export == "pdf") {
			$this->ExportPDF($ExportDoc->Text);
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_9_m_sa_users;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_9_m_sa_users->users_id->CurrentValue);
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
