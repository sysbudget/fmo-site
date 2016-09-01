<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_profileinfo.php" ?>
<?php include_once "tbl_collectionperiodinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_profile_list = new ctbl_profile_list();
$Page =& $tbl_profile_list;

// Page init
$tbl_profile_list->Page_Init();

// Page main
$tbl_profile_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($tbl_profile->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_profile_list = new up_Page("tbl_profile_list");

// page properties
tbl_profile_list.PageID = "list"; // page ID
tbl_profile_list.FormID = "ftbl_profilelist"; // form ID
var UP_PAGE_ID = tbl_profile_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_profile_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_profile_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_profile_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_profile_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<style type="text/css">

/* main table preview row color */
.upTablePreviewRow {
	background-color: inherit; /* preview row */
}
</style>
<script language="JavaScript" type="text/javascript">
<!--

// PreviewRow extension
var up_AjaxDetailsTimer = null;
var UP_PREVIEW_SINGLE_ROW = false;
var UP_PREVIEW_IMAGE_CLASSNAME = "upPreviewRowImage";
var UP_PREVIEW_SHOW_IMAGE = "phpimages/expand.gif";
var UP_PREVIEW_HIDE_IMAGE = "phpimages/collapse.gif";
var UP_PREVIEW_LOADING_IMAGE = "phpimages/loading.gif";
var UP_PREVIEW_LOADING_TEXT = upLanguage.Phrase("Loading"); // lang phrase for loading

// add row
function up_AddRowToTable(r) {
	var row, cell;
	var tb = upDom.getAncestorByTagName(r, "TBODY");
	if (UP_PREVIEW_SINGLE_ROW) {
		row = upDom.getElementBy(function(node) { return upDom.hasClass(node, UP_TABLE_PREVIEW_ROW_CLASSNAME)}, "TR", tb);
		up_RemoveRowFromTable(row);
	}
	var sr = upDom.getNextSiblingBy(r, function(node) { return node.tagName == "TR"});
	if (sr && upDom.hasClass(sr, UP_TABLE_PREVIEW_ROW_CLASSNAME)) {
		row = sr; // existing sibling row
		if (row && row.cells && row.cells[0])
			cell = row.cells[0];
	} else {
		row = tb.insertRow(r.rowIndex); // new row
		if (row) {
			row.className = UP_TABLE_PREVIEW_ROW_CLASSNAME;
			var cell = row.insertCell(0);
			cell.style.borderRight = "0";
			var colcnt = r.cells.length;
			if (r.cells) {
				var spancnt = 0;
				for (var i = 0; i < colcnt; i++)
					spancnt += r.cells[i].colSpan;
				if (spancnt > 0)
					cell.colSpan = spancnt;
			}
			var pt = upDom.getAncestorByTagName(row, "TABLE");
			if (pt) up_SetupTable(pt);
		}
	}
	if (cell)
		cell.innerHTML = "<img src=\"" + UP_PREVIEW_LOADING_IMAGE + "\" style=\"border: 0; vertical-align: middle;\"> " + UP_PREVIEW_LOADING_TEXT;
	return row;
}

// remove row
function up_RemoveRowFromTable(r) {
	if (r && r.parentNode)
		r.parentNode.removeChild(r);
}

// show results in new table row
var up_AjaxHandleSuccess2 = function(o) {
	if (o.responseText !== undefined) {
		var row = o.argument.row;
		if (!row || !row.cells || !row.cells[0]) return;
		row.cells[0].innerHTML = o.responseText;
		var ct = upDom.getElementBy(function(node) { return upDom.hasClass(node, UP_TABLE_CLASS)}, "TABLE", row);
		if (ct) up_SetupTable(ct);

		//clearTimeout(up_AjaxDetailsTimer);
		//setTimeout("alert(up_AjaxDetailsTimer);", 500);

	}
}

// show error in new table row
var up_AjaxHandleFailure2 = function(o) {
	var row = o.argument.row;
	if (!row || !row.cells || !row.cells[0]) return;
	row.cells[0].innerHTML = o.responseText;
}

// show detail preview by table row expansion
function up_AjaxShowDetails2(ev, link, url) {
	var img = upDom.getElementBy(function(node) { return true; }, "IMG", link);
	var r = upDom.getAncestorByTagName(link, "TR");
	if (!img || !r)
		return;
	var show = (img.src.substr(img.src.length - UP_PREVIEW_SHOW_IMAGE.length) == UP_PREVIEW_SHOW_IMAGE);
	if (show) {
		if (up_AjaxDetailsTimer)
			clearTimeout(up_AjaxDetailsTimer);		
		var row = up_AddRowToTable(r);
		up_AjaxDetailsTimer = setTimeout(function() { upConnect.asyncRequest('GET', url, {success: up_AjaxHandleSuccess2, failure: up_AjaxHandleFailure2, argument:{id: link, row: row}}) }, 200);
		upDom.getElementsByClassName(UP_PREVIEW_IMAGE_CLASSNAME, "IMG", r, function(node) {node.src = UP_PREVIEW_SHOW_IMAGE});
		img.src = UP_PREVIEW_HIDE_IMAGE;
	} else {	 
		var sr = upDom.getNextSiblingBy(r, function(node) { return node.tagName == "TR"});
		if (sr && upDom.hasClass(sr, UP_TABLE_PREVIEW_ROW_CLASSNAME))
			up_RemoveRowFromTable(sr);
		img.src = UP_PREVIEW_SHOW_IMAGE;
	}
}

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
<?php if (($tbl_profile->Export == "") || (UP_EXPORT_MASTER_RECORD && $tbl_profile->Export == "print")) { ?>
<?php
$gsMasterReturnUrl = "tbl_collectionperiodlist.php";
if ($tbl_profile_list->DbMasterFilter <> "" && $tbl_profile->getCurrentMasterTable() == "tbl_collectionperiod") {
	if ($tbl_profile_list->MasterRecordExists) {
		if ($tbl_profile->getCurrentMasterTable() == $tbl_profile->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $tbl_collectionperiod->TableCaption() ?>
&nbsp;&nbsp;<?php $tbl_profile_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($tbl_profile->Export == "") { ?>
<p class="upbudgetofficeclass"><a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></p>
<?php } ?>
<?php include_once "tbl_collectionperiodmaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_profile_list->TotalRecs = $tbl_profile->SelectRecordCount();
	} else {
		if ($tbl_profile_list->Recordset = $tbl_profile_list->LoadRecordset())
			$tbl_profile_list->TotalRecs = $tbl_profile_list->Recordset->RecordCount();
	}
	$tbl_profile_list->StartRec = 1;
	if ($tbl_profile_list->DisplayRecs <= 0 || ($tbl_profile->Export <> "" && $tbl_profile->ExportAll)) // Display all records
		$tbl_profile_list->DisplayRecs = $tbl_profile_list->TotalRecs;
	if (!($tbl_profile->Export <> "" && $tbl_profile->ExportAll))
		$tbl_profile_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$tbl_profile_list->Recordset = $tbl_profile_list->LoadRecordset($tbl_profile_list->StartRec-1, $tbl_profile_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_profile->TableCaption() ?>
<?php if ($tbl_profile->getCurrentMasterTable() == "") { ?>
&nbsp;&nbsp;<?php $tbl_profile_list->ExportOptions->Render("body"); ?>
<?php } ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($tbl_profile->Export == "" && $tbl_profile->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(tbl_profile_list);" style="text-decoration: none;"><img id="tbl_profile_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="tbl_profile_list_SearchPanel">
<form name="ftbl_profilelistsrch" id="ftbl_profilelistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="tbl_profile">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($tbl_profile->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $tbl_profile_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($tbl_profile->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_profile->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_profile->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $tbl_profile_list->ShowPageHeader(); ?>
<?php
$tbl_profile_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($tbl_profile->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($tbl_profile->CurrentAction <> "gridadd" && $tbl_profile->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_profile_list->Pager)) $tbl_profile_list->Pager = new cPrevNextPager($tbl_profile_list->StartRec, $tbl_profile_list->DisplayRecs, $tbl_profile_list->TotalRecs) ?>
<?php if ($tbl_profile_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_profile_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_profile_list->PageUrl() ?>start=<?php echo $tbl_profile_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_profile_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_profile_list->PageUrl() ?>start=<?php echo $tbl_profile_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_profile_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_profile_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_profile_list->PageUrl() ?>start=<?php echo $tbl_profile_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_profile_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_profile_list->PageUrl() ?>start=<?php echo $tbl_profile_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_profile_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_profile_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_profile_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_profile_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_profile_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $tbl_profile_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_profile_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ftbl_profilelist, '<?php echo $tbl_profile_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ftbl_profilelist" id="ftbl_profilelist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="tbl_profile">
<div id="gmp_tbl_profile" class="upGridMiddlePanel">
<?php if ($tbl_profile_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_profile->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_profile_list->RenderListOptions();

// Render list options (header, left)
$tbl_profile_list->ListOptions->Render("header", "left");
?>
<?php if ($tbl_profile->faculty_name->Visible) { // faculty_name ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->faculty_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->faculty_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->faculty_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->faculty_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_profile->faculty_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->faculty_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyGroup_CHEDCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyGroup_CHEDCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyGroup_CHEDCode) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyGroup_CHEDCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyGroup_CHEDCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyGroup_CHEDCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyRank_ID->Visible) { // facultyRank_ID ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyRank_ID) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyRank_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyRank_ID) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyRank_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyRank_ID->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyRank_ID->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_tenureCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_tenureCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_tenureCode) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_tenureCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_tenureCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_tenureCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_leaveCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_leaveCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_leaveCode) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_leaveCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_leaveCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_leaveCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalHrs_basic->Visible) { // facultyprofile_totalHrs_basic ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalHrs_basic) == "") { ?>
		<td><?php echo $tbl_profile->facultyprofile_totalHrs_basic->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_totalHrs_basic) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalHrs_basic->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalHrs_basic->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalHrs_basic->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalSCH_basic->Visible) { // facultyprofile_totalSCH_basic ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalSCH_basic) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalSCH_basic->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_totalSCH_basic) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalSCH_basic->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalSCH_basic->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalSCH_basic->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalCr_ugrad->Visible) { // facultyprofile_totalCr_ugrad ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalCr_ugrad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalCr_ugrad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_totalCr_ugrad) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalCr_ugrad->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalCr_ugrad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalCr_ugrad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalHrs_ugrad->Visible) { // facultyprofile_totalHrs_ugrad ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalHrs_ugrad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_totalHrs_ugrad) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalHrs_ugrad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalHrs_ugrad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalSCH_ugrad->Visible) { // facultyprofile_totalSCH_ugrad ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalSCH_ugrad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_totalSCH_ugrad) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalSCH_ugrad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalSCH_ugrad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalCr_graduate->Visible) { // facultyprofile_totalCr_graduate ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalCr_graduate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalCr_graduate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_totalCr_graduate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalCr_graduate->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalCr_graduate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalCr_graduate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalHrs_graduate->Visible) { // facultyprofile_totalHrs_graduate ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalHrs_graduate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalHrs_graduate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_totalHrs_graduate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalHrs_graduate->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalHrs_graduate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalHrs_graduate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalSCH_graduate->Visible) { // facultyprofile_totalSCH_graduate ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalSCH_graduate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalSCH_graduate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_totalSCH_graduate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalSCH_graduate->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalSCH_graduate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalSCH_graduate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_total_nonTeachingLoad->Visible) { // facultyprofile_total_nonTeachingLoad ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_total_nonTeachingLoad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_total_nonTeachingLoad) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_total_nonTeachingLoad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_total_nonTeachingLoad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
	<?php if ($tbl_profile->SortUrl($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_profile->SortUrl($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_profile_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($tbl_profile->ExportAll && $tbl_profile->Export <> "") {
	$tbl_profile_list->StopRec = $tbl_profile_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tbl_profile_list->TotalRecs > $tbl_profile_list->StartRec + $tbl_profile_list->DisplayRecs - 1)
		$tbl_profile_list->StopRec = $tbl_profile_list->StartRec + $tbl_profile_list->DisplayRecs - 1;
	else
		$tbl_profile_list->StopRec = $tbl_profile_list->TotalRecs;
}
$tbl_profile_list->RecCnt = $tbl_profile_list->StartRec - 1;
if ($tbl_profile_list->Recordset && !$tbl_profile_list->Recordset->EOF) {
	$tbl_profile_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_profile_list->StartRec > 1)
		$tbl_profile_list->Recordset->Move($tbl_profile_list->StartRec - 1);
} elseif (!$tbl_profile->AllowAddDeleteRow && $tbl_profile_list->StopRec == 0) {
	$tbl_profile_list->StopRec = $tbl_profile->GridAddRowCount;
}

// Initialize aggregate
$tbl_profile->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_profile->ResetAttrs();
$tbl_profile_list->RenderRow();
$tbl_profile_list->RowCnt = 0;
while ($tbl_profile_list->RecCnt < $tbl_profile_list->StopRec) {
	$tbl_profile_list->RecCnt++;
	if (intval($tbl_profile_list->RecCnt) >= intval($tbl_profile_list->StartRec)) {
		$tbl_profile_list->RowCnt++;

		// Set up key count
		$tbl_profile_list->KeyCount = $tbl_profile_list->RowIndex;

		// Init row class and style
		$tbl_profile->ResetAttrs();
		$tbl_profile->CssClass = "";
		if ($tbl_profile->CurrentAction == "gridadd") {
		} else {
			$tbl_profile_list->LoadRowValues($tbl_profile_list->Recordset); // Load row values
		}
		$tbl_profile->RowType = UP_ROWTYPE_VIEW; // Render view
		$tbl_profile->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$tbl_profile_list->RenderRow();

		// Render list options
		$tbl_profile_list->RenderListOptions();
?>
	<tr<?php echo $tbl_profile->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_profile_list->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_profile->faculty_name->Visible) { // faculty_name ?>
		<td<?php echo $tbl_profile->faculty_name->CellAttributes() ?>>
<div<?php echo $tbl_profile->faculty_name->ViewAttributes() ?>><?php echo $tbl_profile->faculty_name->ListViewValue() ?></div>
<a name="<?php echo $tbl_profile_list->PageObjName . "_row_" . $tbl_profile_list->RowCnt ?>" id="<?php echo $tbl_profile_list->PageObjName . "_row_" . $tbl_profile_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($tbl_profile->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
		<td<?php echo $tbl_profile->facultyGroup_CHEDCode->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyGroup_CHEDCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyGroup_CHEDCode->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyRank_ID->Visible) { // facultyRank_ID ?>
		<td<?php echo $tbl_profile->facultyRank_ID->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyRank_ID->ViewAttributes() ?>><?php echo $tbl_profile->facultyRank_ID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
		<td<?php echo $tbl_profile->facultyprofile_tenureCode->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_tenureCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_tenureCode->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
		<td<?php echo $tbl_profile->facultyprofile_leaveCode->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_leaveCode->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_leaveCode->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
		<td<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalHrs_basic->Visible) { // facultyprofile_totalHrs_basic ?>
		<td<?php echo $tbl_profile->facultyprofile_totalHrs_basic->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_basic->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_basic->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalSCH_basic->Visible) { // facultyprofile_totalSCH_basic ?>
		<td<?php echo $tbl_profile->facultyprofile_totalSCH_basic->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_basic->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_basic->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalCr_ugrad->Visible) { // facultyprofile_totalCr_ugrad ?>
		<td<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalCr_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalCr_ugrad->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalHrs_ugrad->Visible) { // facultyprofile_totalHrs_ugrad ?>
		<td<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_ugrad->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalSCH_ugrad->Visible) { // facultyprofile_totalSCH_ugrad ?>
		<td<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_ugrad->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalCr_graduate->Visible) { // facultyprofile_totalCr_graduate ?>
		<td<?php echo $tbl_profile->facultyprofile_totalCr_graduate->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalCr_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalCr_graduate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalHrs_graduate->Visible) { // facultyprofile_totalHrs_graduate ?>
		<td<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalHrs_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalHrs_graduate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalSCH_graduate->Visible) { // facultyprofile_totalSCH_graduate ?>
		<td<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalSCH_graduate->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalSCH_graduate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_total_nonTeachingLoad->Visible) { // facultyprofile_total_nonTeachingLoad ?>
		<td<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_total_nonTeachingLoad->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
		<td<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CellAttributes() ?>>
<div<?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewAttributes() ?>><?php echo $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_profile_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($tbl_profile->CurrentAction <> "gridadd")
		$tbl_profile_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($tbl_profile_list->Recordset)
	$tbl_profile_list->Recordset->Close();
?>
<?php if ($tbl_profile_list->TotalRecs > 0) { ?>
<?php if ($tbl_profile->Export == "") { ?>
<div class="upGridLowerPanel">
<?php if ($tbl_profile->CurrentAction <> "gridadd" && $tbl_profile->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_profile_list->Pager)) $tbl_profile_list->Pager = new cPrevNextPager($tbl_profile_list->StartRec, $tbl_profile_list->DisplayRecs, $tbl_profile_list->TotalRecs) ?>
<?php if ($tbl_profile_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_profile_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_profile_list->PageUrl() ?>start=<?php echo $tbl_profile_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_profile_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_profile_list->PageUrl() ?>start=<?php echo $tbl_profile_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_profile_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_profile_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_profile_list->PageUrl() ?>start=<?php echo $tbl_profile_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_profile_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_profile_list->PageUrl() ?>start=<?php echo $tbl_profile_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_profile_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_profile_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_profile_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_profile_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_profile_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $tbl_profile_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_profile_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ftbl_profilelist, '<?php echo $tbl_profile_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($tbl_profile->Export == "" && $tbl_profile->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_profile_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($tbl_profile->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tbl_profile_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_profile_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'tbl_profile';

	// Page object name
	var $PageObjName = 'tbl_profile_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_profile;
		if ($tbl_profile->UseTokenInUrl) $PageUrl .= "t=" . $tbl_profile->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_profile;
		if ($tbl_profile->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_profile->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_profile->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_profile_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_profile)
		if (!isset($GLOBALS["tbl_profile"])) {
			$GLOBALS["tbl_profile"] = new ctbl_profile();
			$GLOBALS["Table"] =& $GLOBALS["tbl_profile"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "tbl_profileadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "tbl_profiledelete.php";
		$this->MultiUpdateUrl = "tbl_profileupdate.php";

		// Table object (tbl_collectionperiod)
		if (!isset($GLOBALS['tbl_collectionperiod'])) $GLOBALS['tbl_collectionperiod'] = new ctbl_collectionperiod();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_profile', TRUE);

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
		global $tbl_profile;

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
			$tbl_profile->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_profile;

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
			if ($tbl_profile->Export <> "" ||
				$tbl_profile->CurrentAction == "gridadd" ||
				$tbl_profile->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$tbl_profile->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($tbl_profile->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_profile->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$tbl_profile->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$tbl_profile->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$tbl_profile->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $tbl_profile->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $tbl_profile->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $tbl_profile->getDetailFilter(); // Restore detail filter

		// Add master User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			if ($tbl_profile->getCurrentMasterTable() == "tbl_collectionperiod")
				$this->DbMasterFilter = $tbl_profile->AddMasterUserIDFilter($this->DbMasterFilter, "tbl_collectionperiod"); // Add master User ID filter
		}
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($tbl_profile->getMasterFilter() <> "" && $tbl_profile->getCurrentMasterTable() == "tbl_collectionperiod") {
			global $tbl_collectionperiod;
			$rsmaster = $tbl_collectionperiod->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($tbl_profile->getReturnUrl()); // Return to caller
			} else {
				$tbl_collectionperiod->LoadListRowValues($rsmaster);
				$tbl_collectionperiod->RowType = UP_ROWTYPE_MASTER; // Master row
				$tbl_collectionperiod->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$tbl_profile->setSessionWhere($sFilter);
		$tbl_profile->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $tbl_profile;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $tbl_profile->faculty_name, $Keyword);
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
		global $Security, $tbl_profile;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $tbl_profile->BasicSearchKeyword;
		$sSearchType = $tbl_profile->BasicSearchType;
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
			$tbl_profile->setSessionBasicSearchKeyword($sSearchKeyword);
			$tbl_profile->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $tbl_profile;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$tbl_profile->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $tbl_profile;
		$tbl_profile->setSessionBasicSearchKeyword("");
		$tbl_profile->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $tbl_profile;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$tbl_profile->BasicSearchKeyword = $tbl_profile->getSessionBasicSearchKeyword();
			$tbl_profile->BasicSearchType = $tbl_profile->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_profile;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_profile->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_profile->CurrentOrderType = @$_GET["ordertype"];
			$tbl_profile->UpdateSort($tbl_profile->faculty_name); // faculty_name
			$tbl_profile->UpdateSort($tbl_profile->facultyGroup_CHEDCode); // facultyGroup_CHEDCode
			$tbl_profile->UpdateSort($tbl_profile->facultyRank_ID); // facultyRank_ID
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_tenureCode); // facultyprofile_tenureCode
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_leaveCode); // facultyprofile_leaveCode
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad); // facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_totalHrs_basic); // facultyprofile_totalHrs_basic
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_totalSCH_basic); // facultyprofile_totalSCH_basic
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_totalCr_ugrad); // facultyprofile_totalCr_ugrad
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_totalHrs_ugrad); // facultyprofile_totalHrs_ugrad
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_totalSCH_ugrad); // facultyprofile_totalSCH_ugrad
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_totalCr_graduate); // facultyprofile_totalCr_graduate
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_totalHrs_graduate); // facultyprofile_totalHrs_graduate
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_totalSCH_graduate); // facultyprofile_totalSCH_graduate
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_total_nonTeachingLoad); // facultyprofile_total_nonTeachingLoad
			$tbl_profile->UpdateSort($tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen); // facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_profile;
		$sOrderBy = $tbl_profile->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_profile->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_profile->SqlOrderBy();
				$tbl_profile->setSessionOrderBy($sOrderBy);
				$tbl_profile->faculty_name->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_profile;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$tbl_profile->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$tbl_profile->collectionPeriod_ID->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_profile->setSessionOrderBy($sOrderBy);
				$tbl_profile->faculty_name->setSort("");
				$tbl_profile->facultyGroup_CHEDCode->setSort("");
				$tbl_profile->facultyRank_ID->setSort("");
				$tbl_profile->facultyprofile_tenureCode->setSort("");
				$tbl_profile->facultyprofile_leaveCode->setSort("");
				$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setSort("");
				$tbl_profile->facultyprofile_totalHrs_basic->setSort("");
				$tbl_profile->facultyprofile_totalSCH_basic->setSort("");
				$tbl_profile->facultyprofile_totalCr_ugrad->setSort("");
				$tbl_profile->facultyprofile_totalHrs_ugrad->setSort("");
				$tbl_profile->facultyprofile_totalSCH_ugrad->setSort("");
				$tbl_profile->facultyprofile_totalCr_graduate->setSort("");
				$tbl_profile->facultyprofile_totalHrs_graduate->setSort("");
				$tbl_profile->facultyprofile_totalSCH_graduate->setSort("");
				$tbl_profile->facultyprofile_total_nonTeachingLoad->setSort("");
				$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_profile->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_profile;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"tbl_profile_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $tbl_profile, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $this->ShowOptionLink() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $this->ShowOptionLink() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($tbl_profile->facultyprofile_ID->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_profile;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_profile;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_profile->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_profile->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_profile->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_profile->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_profile->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_profile->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $tbl_profile;
		$tbl_profile->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$tbl_profile->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_profile;

		// Call Recordset Selecting event
		$tbl_profile->Recordset_Selecting($tbl_profile->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_profile->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_profile->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_profile;
		$sFilter = $tbl_profile->KeyFilter();

		// Call Row Selecting event
		$tbl_profile->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_profile->CurrentFilter = $sFilter;
		$sSql = $tbl_profile->SQL();
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
		global $conn, $tbl_profile;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_profile->Row_Selected($row);
		$tbl_profile->facultyprofile_ID->setDbValue($rs->fields('facultyprofile_ID'));
		$tbl_profile->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$tbl_profile->faculty_name->setDbValue($rs->fields('faculty_name'));
		$tbl_profile->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$tbl_profile->cu->setDbValue($rs->fields('cu'));
		$tbl_profile->collectionPeriod_ay->setDbValue($rs->fields('collectionPeriod_ay'));
		$tbl_profile->collectionPeriod_sem->setDbValue($rs->fields('collectionPeriod_sem'));
		$tbl_profile->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$tbl_profile->unitID->setDbValue($rs->fields('unitID'));
		$tbl_profile->facultyprofile_homeUnit_ID->setDbValue($rs->fields('facultyprofile_homeUnit_ID'));
		$tbl_profile->facultyprofile_isHomeUnit->setDbValue($rs->fields('facultyprofile_isHomeUnit'));
		$tbl_profile->facultyGroup_CHEDCode->setDbValue($rs->fields('facultyGroup_CHEDCode'));
		$tbl_profile->facultyRank_ID->setDbValue($rs->fields('facultyRank_ID'));
		$tbl_profile->facultyprofile_sg->setDbValue($rs->fields('facultyprofile_sg'));
		$tbl_profile->facultyprofile_annualSalary->setDbValue($rs->fields('facultyprofile_annualSalary'));
		$tbl_profile->facultyprofile_fte->setDbValue($rs->fields('facultyprofile_fte'));
		$tbl_profile->facultyprofile_tenureCode->setDbValue($rs->fields('facultyprofile_tenureCode'));
		$tbl_profile->facultyprofile_leaveCode->setDbValue($rs->fields('facultyprofile_leaveCode'));
		$tbl_profile->facultyprofile_disCHED_disciplineMajorCode_gen->setDbValue($rs->fields('facultyprofile_disCHED_disciplineMajorCode_gen'));
		$tbl_profile->disCHED_disciplineCode_gen->setDbValue($rs->fields('disCHED_disciplineCode_gen'));
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_1_primaryTeachingLoad'));
		$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_2_primaryTeachingLoad'));
		$tbl_profile->facultyprofile_labHrs_basic->setDbValue($rs->fields('facultyprofile_labHrs_basic'));
		$tbl_profile->facultyprofile_lecHrs_basic->setDbValue($rs->fields('facultyprofile_lecHrs_basic'));
		$tbl_profile->facultyprofile_totalHrs_basic->setDbValue($rs->fields('facultyprofile_totalHrs_basic'));
		$tbl_profile->facultyprofile_labSCH_basic->setDbValue($rs->fields('facultyprofile_labSCH_basic'));
		$tbl_profile->facultyprofile_lecSCH_basic->setDbValue($rs->fields('facultyprofile_lecSCH_basic'));
		$tbl_profile->facultyprofile_totalSCH_basic->setDbValue($rs->fields('facultyprofile_totalSCH_basic'));
		$tbl_profile->facultyprofile_labCr_ugrad->setDbValue($rs->fields('facultyprofile_labCr_ugrad'));
		$tbl_profile->facultyprofile_lecCr_ugrad->setDbValue($rs->fields('facultyprofile_lecCr_ugrad'));
		$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_ugrad'));
		$tbl_profile->facultyprofile_totalCr_ugrad->setDbValue($rs->fields('facultyprofile_totalCr_ugrad'));
		$tbl_profile->facultyprofile_labHrs_ugrad->setDbValue($rs->fields('facultyprofile_labHrs_ugrad'));
		$tbl_profile->facultyprofile_lecHrs_ugrad->setDbValue($rs->fields('facultyprofile_lecHrs_ugrad'));
		$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_ugrad'));
		$tbl_profile->facultyprofile_totalHrs_ugrad->setDbValue($rs->fields('facultyprofile_totalHrs_ugrad'));
		$tbl_profile->facultyprofile_labSCH_ugrad->setDbValue($rs->fields('facultyprofile_labSCH_ugrad'));
		$tbl_profile->facultyprofile_lecSCH_ugrad->setDbValue($rs->fields('facultyprofile_lecSCH_ugrad'));
		$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_ugrad'));
		$tbl_profile->facultyprofile_totalSCH_ugrad->setDbValue($rs->fields('facultyprofile_totalSCH_ugrad'));
		$tbl_profile->facultyprofile_labCr_graduate->setDbValue($rs->fields('facultyprofile_labCr_graduate'));
		$tbl_profile->facultyprofile_lecCr_graduate->setDbValue($rs->fields('facultyprofile_lecCr_graduate'));
		$tbl_profile->facultyprofile_mixedLabLecCr_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_graduate'));
		$tbl_profile->facultyprofile_totalCr_graduate->setDbValue($rs->fields('facultyprofile_totalCr_graduate'));
		$tbl_profile->facultyprofile_labHrs_graduate->setDbValue($rs->fields('facultyprofile_labHrs_graduate'));
		$tbl_profile->facultyprofile_lecHrs_graduate->setDbValue($rs->fields('facultyprofile_lecHrs_graduate'));
		$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_graduate'));
		$tbl_profile->facultyprofile_totalHrs_graduate->setDbValue($rs->fields('facultyprofile_totalHrs_graduate'));
		$tbl_profile->facultyprofile_labSCH_graduate->setDbValue($rs->fields('facultyprofile_labSCH_graduate'));
		$tbl_profile->facultyprofile_lecSCH_graduate->setDbValue($rs->fields('facultyprofile_lecSCH_graduate'));
		$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_graduate'));
		$tbl_profile->facultyprofile_totalSCH_graduate->setDbValue($rs->fields('facultyprofile_totalSCH_graduate'));
		$tbl_profile->facultyprofile_researchLoad->setDbValue($rs->fields('facultyprofile_researchLoad'));
		$tbl_profile->facultyprofile_extensionServicesLoad->setDbValue($rs->fields('facultyprofile_extensionServicesLoad'));
		$tbl_profile->facultyprofile_studyLoad->setDbValue($rs->fields('facultyprofile_studyLoad'));
		$tbl_profile->facultyprofile_forProductionLoad->setDbValue($rs->fields('facultyprofile_forProductionLoad'));
		$tbl_profile->facultyprofile_administrativeLoad->setDbValue($rs->fields('facultyprofile_administrativeLoad'));
		$tbl_profile->facultyprofile_otherLoadCredits->setDbValue($rs->fields('facultyprofile_otherLoadCredits'));
		$tbl_profile->facultyprofile_total_nonTeachingLoad->setDbValue($rs->fields('facultyprofile_total_nonTeachingLoad'));
		$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->setDbValue($rs->fields('facultyprofile_totalWorkloadInCreditUnits_gen'));
		$tbl_profile->facultyprofile_remarks->setDbValue($rs->fields('facultyprofile_remarks'));
		$tbl_profile->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_profile;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($tbl_profile->getKey("facultyprofile_ID")) <> "")
			$tbl_profile->facultyprofile_ID->CurrentValue = $tbl_profile->getKey("facultyprofile_ID"); // facultyprofile_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_profile->CurrentFilter = $tbl_profile->KeyFilter();
			$sSql = $tbl_profile->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_profile;

		// Initialize URLs
		$this->ViewUrl = $tbl_profile->ViewUrl();
		$this->EditUrl = $tbl_profile->EditUrl();
		$this->InlineEditUrl = $tbl_profile->InlineEditUrl();
		$this->CopyUrl = $tbl_profile->CopyUrl();
		$this->InlineCopyUrl = $tbl_profile->InlineCopyUrl();
		$this->DeleteUrl = $tbl_profile->DeleteUrl();

		// Call Row_Rendering event
		$tbl_profile->Row_Rendering();

		// Common render codes for all row types
		// facultyprofile_ID

		$tbl_profile->facultyprofile_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_ID
		$tbl_profile->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_name
		$tbl_profile->faculty_name->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ID
		$tbl_profile->collectionPeriod_ID->CellCssStyle = "white-space: nowrap;";

		// cu
		$tbl_profile->cu->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ay
		$tbl_profile->collectionPeriod_ay->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_sem
		$tbl_profile->collectionPeriod_sem->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_cutOffDate
		$tbl_profile->collectionPeriod_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// unitID
		$tbl_profile->unitID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_homeUnit_ID
		$tbl_profile->facultyprofile_homeUnit_ID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_isHomeUnit
		$tbl_profile->facultyprofile_isHomeUnit->CellCssStyle = "white-space: nowrap;";

		// facultyGroup_CHEDCode
		$tbl_profile->facultyGroup_CHEDCode->CellCssStyle = "white-space: nowrap;";

		// facultyRank_ID
		$tbl_profile->facultyRank_ID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_sg
		$tbl_profile->facultyprofile_sg->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_annualSalary
		$tbl_profile->facultyprofile_annualSalary->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_fte
		$tbl_profile->facultyprofile_fte->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_tenureCode
		$tbl_profile->facultyprofile_tenureCode->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_leaveCode
		$tbl_profile->facultyprofile_leaveCode->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_disCHED_disciplineMajorCode_gen
		$tbl_profile->facultyprofile_disCHED_disciplineMajorCode_gen->CellCssStyle = "white-space: nowrap;";

		// disCHED_disciplineCode_gen
		$tbl_profile->disCHED_disciplineCode_gen->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_specificDiscipline_1_primaryTeachingLoad
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_specificDiscipline_2_primaryTeachingLoad
		$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_basic
		$tbl_profile->facultyprofile_labHrs_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_basic
		$tbl_profile->facultyprofile_lecHrs_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_basic
		// facultyprofile_labSCH_basic

		$tbl_profile->facultyprofile_labSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_basic
		$tbl_profile->facultyprofile_lecSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_basic
		$tbl_profile->facultyprofile_totalSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labCr_ugrad
		$tbl_profile->facultyprofile_labCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecCr_ugrad
		$tbl_profile->facultyprofile_lecCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecCr_ugrad
		$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalCr_ugrad
		$tbl_profile->facultyprofile_totalCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_ugrad
		$tbl_profile->facultyprofile_labHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_ugrad
		$tbl_profile->facultyprofile_lecHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecHrs_ugrad
		$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_ugrad
		$tbl_profile->facultyprofile_totalHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labSCH_ugrad
		$tbl_profile->facultyprofile_labSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_ugrad
		$tbl_profile->facultyprofile_lecSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecSCH_ugrad
		$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_ugrad
		$tbl_profile->facultyprofile_totalSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labCr_graduate
		$tbl_profile->facultyprofile_labCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecCr_graduate
		$tbl_profile->facultyprofile_lecCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecCr_graduate
		$tbl_profile->facultyprofile_mixedLabLecCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalCr_graduate
		$tbl_profile->facultyprofile_totalCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_graduate
		$tbl_profile->facultyprofile_labHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_graduate
		$tbl_profile->facultyprofile_lecHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecHrs_graduate
		$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_graduate
		$tbl_profile->facultyprofile_totalHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labSCH_graduate
		$tbl_profile->facultyprofile_labSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_graduate
		$tbl_profile->facultyprofile_lecSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecSCH_graduate
		$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_graduate
		$tbl_profile->facultyprofile_totalSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_researchLoad
		$tbl_profile->facultyprofile_researchLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_extensionServicesLoad
		$tbl_profile->facultyprofile_extensionServicesLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_studyLoad
		$tbl_profile->facultyprofile_studyLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_forProductionLoad
		$tbl_profile->facultyprofile_forProductionLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_administrativeLoad
		$tbl_profile->facultyprofile_administrativeLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_otherLoadCredits
		$tbl_profile->facultyprofile_otherLoadCredits->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_total_nonTeachingLoad
		$tbl_profile->facultyprofile_total_nonTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalWorkloadInCreditUnits_gen
		$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_remarks
		$tbl_profile->facultyprofile_remarks->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_status
		$tbl_profile->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";
		if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View row

			// faculty_name
			$tbl_profile->faculty_name->ViewValue = $tbl_profile->faculty_name->CurrentValue;
			$tbl_profile->faculty_name->ViewCustomAttributes = "";

			// facultyGroup_CHEDCode
			if (strval($tbl_profile->facultyGroup_CHEDCode->CurrentValue) <> "") {
				$sFilterWrk = "`facultyGroup_CHEDCode` = '" . up_AdjustSql($tbl_profile->facultyGroup_CHEDCode->CurrentValue) . "'";
			$sSqlWrk = "SELECT `facultyGroup_description` FROM `ref_facultygroup`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `facultyGroup_description` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyGroup_CHEDCode->ViewValue = $rswrk->fields('facultyGroup_description');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyGroup_CHEDCode->ViewValue = $tbl_profile->facultyGroup_CHEDCode->CurrentValue;
				}
			} else {
				$tbl_profile->facultyGroup_CHEDCode->ViewValue = NULL;
			}
			$tbl_profile->facultyGroup_CHEDCode->ViewCustomAttributes = "";

			// facultyRank_ID
			if (strval($tbl_profile->facultyRank_ID->CurrentValue) <> "") {
				$sFilterWrk = "`facultyRank_ID` = " . up_AdjustSql($tbl_profile->facultyRank_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `facultyRank_UPRank` FROM `ref_facultyrank`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `facultyRank_UPRank` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyRank_ID->ViewValue = $rswrk->fields('facultyRank_UPRank');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyRank_ID->ViewValue = $tbl_profile->facultyRank_ID->CurrentValue;
				}
			} else {
				$tbl_profile->facultyRank_ID->ViewValue = NULL;
			}
			$tbl_profile->facultyRank_ID->ViewCustomAttributes = "";

			// facultyprofile_sg
			$tbl_profile->facultyprofile_sg->ViewValue = $tbl_profile->facultyprofile_sg->CurrentValue;
			$tbl_profile->facultyprofile_sg->ViewCustomAttributes = "";

			// facultyprofile_annualSalary
			$tbl_profile->facultyprofile_annualSalary->ViewValue = $tbl_profile->facultyprofile_annualSalary->CurrentValue;
			$tbl_profile->facultyprofile_annualSalary->ViewCustomAttributes = "";

			// facultyprofile_tenureCode
			if (strval($tbl_profile->facultyprofile_tenureCode->CurrentValue) <> "") {
				$sFilterWrk = "`tenureCode_ID` = " . up_AdjustSql($tbl_profile->facultyprofile_tenureCode->CurrentValue) . "";
			$sSqlWrk = "SELECT `tenureCode_description` FROM `ref_tenurecode`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `tenureCode_description` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyprofile_tenureCode->ViewValue = $rswrk->fields('tenureCode_description');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_tenureCode->ViewValue = $tbl_profile->facultyprofile_tenureCode->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_tenureCode->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_tenureCode->ViewCustomAttributes = "";

			// facultyprofile_leaveCode
			if (strval($tbl_profile->facultyprofile_leaveCode->CurrentValue) <> "") {
				$sFilterWrk = "`leaveCode_ID` = " . up_AdjustSql($tbl_profile->facultyprofile_leaveCode->CurrentValue) . "";
			$sSqlWrk = "SELECT `leaveCode_description` FROM `ref_leavecode`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `leaveCode_description` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyprofile_leaveCode->ViewValue = $rswrk->fields('leaveCode_description');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_leaveCode->ViewValue = $tbl_profile->facultyprofile_leaveCode->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_leaveCode->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_leaveCode->ViewCustomAttributes = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			if (strval($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) <> "") {
				$sFilterWrk = "`disCHED_disciplineSpecific_code` = " . up_AdjustSql($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) . "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_nameList` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = $rswrk->fields('disCHED_disciplineSpecific_nameList');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_specificDiscipline_2_primaryTeachingLoad
			if (strval($tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue) <> "") {
				$sFilterWrk = "`disCHED_disciplineSpecific_code` = " . up_AdjustSql($tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue) . "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_nameList` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = $rswrk->fields('disCHED_disciplineSpecific_nameList');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = $tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_labHrs_basic
			$tbl_profile->facultyprofile_labHrs_basic->ViewValue = $tbl_profile->facultyprofile_labHrs_basic->CurrentValue;
			$tbl_profile->facultyprofile_labHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_basic
			$tbl_profile->facultyprofile_lecHrs_basic->ViewValue = $tbl_profile->facultyprofile_lecHrs_basic->CurrentValue;
			$tbl_profile->facultyprofile_lecHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_basic
			$tbl_profile->facultyprofile_totalHrs_basic->ViewValue = $tbl_profile->facultyprofile_totalHrs_basic->CurrentValue;
			$tbl_profile->facultyprofile_totalHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_labSCH_basic
			$tbl_profile->facultyprofile_labSCH_basic->ViewValue = $tbl_profile->facultyprofile_labSCH_basic->CurrentValue;
			$tbl_profile->facultyprofile_labSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_basic
			$tbl_profile->facultyprofile_lecSCH_basic->ViewValue = $tbl_profile->facultyprofile_lecSCH_basic->CurrentValue;
			$tbl_profile->facultyprofile_lecSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_basic
			$tbl_profile->facultyprofile_totalSCH_basic->ViewValue = $tbl_profile->facultyprofile_totalSCH_basic->CurrentValue;
			$tbl_profile->facultyprofile_totalSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_labCr_ugrad
			$tbl_profile->facultyprofile_labCr_ugrad->ViewValue = $tbl_profile->facultyprofile_labCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_labCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecCr_ugrad
			$tbl_profile->facultyprofile_lecCr_ugrad->ViewValue = $tbl_profile->facultyprofile_lecCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_lecCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecCr_ugrad
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->ViewValue = $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalCr_ugrad
			$tbl_profile->facultyprofile_totalCr_ugrad->ViewValue = $tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_totalCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labHrs_ugrad
			$tbl_profile->facultyprofile_labHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_labHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_labHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_ugrad
			$tbl_profile->facultyprofile_lecHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_lecHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_lecHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecHrs_ugrad
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_ugrad
			$tbl_profile->facultyprofile_totalHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_totalHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labSCH_ugrad
			$tbl_profile->facultyprofile_labSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_labSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_labSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_ugrad
			$tbl_profile->facultyprofile_lecSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_lecSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_lecSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecSCH_ugrad
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_ugrad
			$tbl_profile->facultyprofile_totalSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_totalSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labCr_graduate
			$tbl_profile->facultyprofile_labCr_graduate->ViewValue = $tbl_profile->facultyprofile_labCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_labCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecCr_graduate
			$tbl_profile->facultyprofile_lecCr_graduate->ViewValue = $tbl_profile->facultyprofile_lecCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_lecCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecCr_graduate
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->ViewValue = $tbl_profile->facultyprofile_mixedLabLecCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalCr_graduate
			$tbl_profile->facultyprofile_totalCr_graduate->ViewValue = $tbl_profile->facultyprofile_totalCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_totalCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_labHrs_graduate
			$tbl_profile->facultyprofile_labHrs_graduate->ViewValue = $tbl_profile->facultyprofile_labHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_labHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_graduate
			$tbl_profile->facultyprofile_lecHrs_graduate->ViewValue = $tbl_profile->facultyprofile_lecHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_lecHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecHrs_graduate
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->ViewValue = $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_graduate
			$tbl_profile->facultyprofile_totalHrs_graduate->ViewValue = $tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_totalHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_labSCH_graduate
			$tbl_profile->facultyprofile_labSCH_graduate->ViewValue = $tbl_profile->facultyprofile_labSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_labSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_graduate
			$tbl_profile->facultyprofile_lecSCH_graduate->ViewValue = $tbl_profile->facultyprofile_lecSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_lecSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecSCH_graduate
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->ViewValue = $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_graduate
			$tbl_profile->facultyprofile_totalSCH_graduate->ViewValue = $tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_totalSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_researchLoad
			$tbl_profile->facultyprofile_researchLoad->ViewValue = $tbl_profile->facultyprofile_researchLoad->CurrentValue;
			$tbl_profile->facultyprofile_researchLoad->ViewCustomAttributes = "";

			// facultyprofile_extensionServicesLoad
			$tbl_profile->facultyprofile_extensionServicesLoad->ViewValue = $tbl_profile->facultyprofile_extensionServicesLoad->CurrentValue;
			$tbl_profile->facultyprofile_extensionServicesLoad->ViewCustomAttributes = "";

			// facultyprofile_studyLoad
			$tbl_profile->facultyprofile_studyLoad->ViewValue = $tbl_profile->facultyprofile_studyLoad->CurrentValue;
			$tbl_profile->facultyprofile_studyLoad->ViewCustomAttributes = "";

			// facultyprofile_forProductionLoad
			$tbl_profile->facultyprofile_forProductionLoad->ViewValue = $tbl_profile->facultyprofile_forProductionLoad->CurrentValue;
			$tbl_profile->facultyprofile_forProductionLoad->ViewCustomAttributes = "";

			// facultyprofile_administrativeLoad
			$tbl_profile->facultyprofile_administrativeLoad->ViewValue = $tbl_profile->facultyprofile_administrativeLoad->CurrentValue;
			$tbl_profile->facultyprofile_administrativeLoad->ViewCustomAttributes = "";

			// facultyprofile_otherLoadCredits
			$tbl_profile->facultyprofile_otherLoadCredits->ViewValue = $tbl_profile->facultyprofile_otherLoadCredits->CurrentValue;
			$tbl_profile->facultyprofile_otherLoadCredits->ViewCustomAttributes = "";

			// facultyprofile_total_nonTeachingLoad
			$tbl_profile->facultyprofile_total_nonTeachingLoad->ViewValue = $tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue;
			$tbl_profile->facultyprofile_total_nonTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewValue = $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue;
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewCustomAttributes = "";

			// facultyprofile_remarks
			$tbl_profile->facultyprofile_remarks->ViewValue = $tbl_profile->facultyprofile_remarks->CurrentValue;
			$tbl_profile->facultyprofile_remarks->ViewCustomAttributes = "";

			// faculty_name
			$tbl_profile->faculty_name->LinkCustomAttributes = "";
			$tbl_profile->faculty_name->HrefValue = "";
			$tbl_profile->faculty_name->TooltipValue = "";

			// facultyGroup_CHEDCode
			$tbl_profile->facultyGroup_CHEDCode->LinkCustomAttributes = "";
			$tbl_profile->facultyGroup_CHEDCode->HrefValue = "";
			$tbl_profile->facultyGroup_CHEDCode->TooltipValue = "";

			// facultyRank_ID
			$tbl_profile->facultyRank_ID->LinkCustomAttributes = "";
			$tbl_profile->facultyRank_ID->HrefValue = "";
			$tbl_profile->facultyRank_ID->TooltipValue = "";

			// facultyprofile_tenureCode
			$tbl_profile->facultyprofile_tenureCode->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_tenureCode->HrefValue = "";
			$tbl_profile->facultyprofile_tenureCode->TooltipValue = "";

			// facultyprofile_leaveCode
			$tbl_profile->facultyprofile_leaveCode->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_leaveCode->HrefValue = "";
			$tbl_profile->facultyprofile_leaveCode->TooltipValue = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->HrefValue = "";
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->TooltipValue = "";

			// facultyprofile_totalHrs_basic
			$tbl_profile->facultyprofile_totalHrs_basic->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_basic->HrefValue = "";
			$tbl_profile->facultyprofile_totalHrs_basic->TooltipValue = "";

			// facultyprofile_totalSCH_basic
			$tbl_profile->facultyprofile_totalSCH_basic->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_basic->HrefValue = "";
			$tbl_profile->facultyprofile_totalSCH_basic->TooltipValue = "";

			// facultyprofile_totalCr_ugrad
			$tbl_profile->facultyprofile_totalCr_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalCr_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_totalCr_ugrad->TooltipValue = "";

			// facultyprofile_totalHrs_ugrad
			$tbl_profile->facultyprofile_totalHrs_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_totalHrs_ugrad->TooltipValue = "";

			// facultyprofile_totalSCH_ugrad
			$tbl_profile->facultyprofile_totalSCH_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_totalSCH_ugrad->TooltipValue = "";

			// facultyprofile_totalCr_graduate
			$tbl_profile->facultyprofile_totalCr_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalCr_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_totalCr_graduate->TooltipValue = "";

			// facultyprofile_totalHrs_graduate
			$tbl_profile->facultyprofile_totalHrs_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalHrs_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_totalHrs_graduate->TooltipValue = "";

			// facultyprofile_totalSCH_graduate
			$tbl_profile->facultyprofile_totalSCH_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalSCH_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_totalSCH_graduate->TooltipValue = "";

			// facultyprofile_total_nonTeachingLoad
			$tbl_profile->facultyprofile_total_nonTeachingLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_total_nonTeachingLoad->HrefValue = "";
			$tbl_profile->facultyprofile_total_nonTeachingLoad->TooltipValue = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->HrefValue = "";
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_profile->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_profile->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $tbl_profile;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($tbl_profile->unitID->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_profile;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "tbl_collectionperiod") {
				$bValidMaster = TRUE;
				if (@$_GET["collectionPeriod_ID"] <> "") {
					$GLOBALS["tbl_collectionperiod"]->collectionPeriod_ID->setQueryStringValue($_GET["collectionPeriod_ID"]);
					$tbl_profile->collectionPeriod_ID->setQueryStringValue($GLOBALS["tbl_collectionperiod"]->collectionPeriod_ID->QueryStringValue);
					$tbl_profile->collectionPeriod_ID->setSessionValue($tbl_profile->collectionPeriod_ID->QueryStringValue);
					if (!is_numeric($GLOBALS["tbl_collectionperiod"]->collectionPeriod_ID->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$tbl_profile->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$tbl_profile->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "tbl_collectionperiod") {
				if ($tbl_profile->collectionPeriod_ID->QueryStringValue == "") $tbl_profile->collectionPeriod_ID->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $tbl_profile->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_profile->getDetailFilter(); // Get detail filter
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

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_profile';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
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
