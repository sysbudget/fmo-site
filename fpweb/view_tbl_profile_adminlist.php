<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "view_tbl_profile_admininfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "view_tbl_collectionperiod_admininfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$view_tbl_profile_admin_list = new cview_tbl_profile_admin_list();
$Page =& $view_tbl_profile_admin_list;

// Page init
$view_tbl_profile_admin_list->Page_Init();

// Page main
$view_tbl_profile_admin_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($view_tbl_profile_admin->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var view_tbl_profile_admin_list = new up_Page("view_tbl_profile_admin_list");

// page properties
view_tbl_profile_admin_list.PageID = "list"; // page ID
view_tbl_profile_admin_list.FormID = "fview_tbl_profile_adminlist"; // form ID
var UP_PAGE_ID = view_tbl_profile_admin_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
view_tbl_profile_admin_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
view_tbl_profile_admin_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
view_tbl_profile_admin_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
view_tbl_profile_admin_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($view_tbl_profile_admin->Export == "") || (UP_EXPORT_MASTER_RECORD && $view_tbl_profile_admin->Export == "print")) { ?>
<?php
$gsMasterReturnUrl = "view_tbl_collectionperiod_adminlist.php";
if ($view_tbl_profile_admin_list->DbMasterFilter <> "" && $view_tbl_profile_admin->getCurrentMasterTable() == "view_tbl_collectionperiod_admin") {
	if ($view_tbl_profile_admin_list->MasterRecordExists) {
		if ($view_tbl_profile_admin->getCurrentMasterTable() == $view_tbl_profile_admin->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $view_tbl_collectionperiod_admin->TableCaption() ?>
&nbsp;&nbsp;<?php $view_tbl_profile_admin_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($view_tbl_profile_admin->Export == "") { ?>
<p class="upbudgetofficeclass"><a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></p>
<?php } ?>
<?php include_once "view_tbl_collectionperiod_adminmaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$view_tbl_profile_admin_list->TotalRecs = $view_tbl_profile_admin->SelectRecordCount();
	} else {
		if ($view_tbl_profile_admin_list->Recordset = $view_tbl_profile_admin_list->LoadRecordset())
			$view_tbl_profile_admin_list->TotalRecs = $view_tbl_profile_admin_list->Recordset->RecordCount();
	}
	$view_tbl_profile_admin_list->StartRec = 1;
	if ($view_tbl_profile_admin_list->DisplayRecs <= 0 || ($view_tbl_profile_admin->Export <> "" && $view_tbl_profile_admin->ExportAll)) // Display all records
		$view_tbl_profile_admin_list->DisplayRecs = $view_tbl_profile_admin_list->TotalRecs;
	if (!($view_tbl_profile_admin->Export <> "" && $view_tbl_profile_admin->ExportAll))
		$view_tbl_profile_admin_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$view_tbl_profile_admin_list->Recordset = $view_tbl_profile_admin_list->LoadRecordset($view_tbl_profile_admin_list->StartRec-1, $view_tbl_profile_admin_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $view_tbl_profile_admin->TableCaption() ?>
<?php if ($view_tbl_profile_admin->getCurrentMasterTable() == "") { ?>
&nbsp;&nbsp;<?php $view_tbl_profile_admin_list->ExportOptions->Render("body"); ?>
<?php } ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($view_tbl_profile_admin->Export == "" && $view_tbl_profile_admin->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(view_tbl_profile_admin_list);" style="text-decoration: none;"><img id="view_tbl_profile_admin_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="view_tbl_profile_admin_list_SearchPanel">
<form name="fview_tbl_profile_adminlistsrch" id="fview_tbl_profile_adminlistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="view_tbl_profile_admin">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($view_tbl_profile_admin->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $view_tbl_profile_admin_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($view_tbl_profile_admin->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($view_tbl_profile_admin->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($view_tbl_profile_admin->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $view_tbl_profile_admin_list->ShowPageHeader(); ?>
<?php
$view_tbl_profile_admin_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($view_tbl_profile_admin->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($view_tbl_profile_admin->CurrentAction <> "gridadd" && $view_tbl_profile_admin->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($view_tbl_profile_admin_list->Pager)) $view_tbl_profile_admin_list->Pager = new cPrevNextPager($view_tbl_profile_admin_list->StartRec, $view_tbl_profile_admin_list->DisplayRecs, $view_tbl_profile_admin_list->TotalRecs) ?>
<?php if ($view_tbl_profile_admin_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($view_tbl_profile_admin_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_profile_admin_list->PageUrl() ?>start=<?php echo $view_tbl_profile_admin_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_tbl_profile_admin_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_profile_admin_list->PageUrl() ?>start=<?php echo $view_tbl_profile_admin_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $view_tbl_profile_admin_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($view_tbl_profile_admin_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_profile_admin_list->PageUrl() ?>start=<?php echo $view_tbl_profile_admin_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($view_tbl_profile_admin_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_profile_admin_list->PageUrl() ?>start=<?php echo $view_tbl_profile_admin_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $view_tbl_profile_admin_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_tbl_profile_admin_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_tbl_profile_admin_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_tbl_profile_admin_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($view_tbl_profile_admin_list->SearchWhere == "0=101") { ?>
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
<form name="fview_tbl_profile_adminlist" id="fview_tbl_profile_adminlist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="view_tbl_profile_admin">
<div id="gmp_view_tbl_profile_admin" class="upGridMiddlePanel">
<?php if ($view_tbl_profile_admin_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $view_tbl_profile_admin->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$view_tbl_profile_admin_list->RenderListOptions();

// Render list options (header, left)
$view_tbl_profile_admin_list->ListOptions->Render("header", "left");
?>
<?php if ($view_tbl_profile_admin->faculty_name->Visible) { // faculty_name ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->faculty_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->faculty_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->faculty_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->faculty_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->faculty_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->faculty_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyGroup_CHEDCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyGroup_CHEDCode) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyGroup_CHEDCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyGroup_CHEDCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyRank_ID->Visible) { // facultyRank_ID ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyRank_ID) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyRank_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyRank_ID) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyRank_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyRank_ID->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyRank_ID->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_tenureCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_tenureCode) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_tenureCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_tenureCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_leaveCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_leaveCode) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_leaveCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_leaveCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_basic->Visible) { // facultyprofile_totalHrs_basic ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalHrs_basic) == "") { ?>
		<td><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalHrs_basic) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_basic->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalHrs_basic->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_basic->Visible) { // facultyprofile_totalSCH_basic ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalSCH_basic) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalSCH_basic) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_basic->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalSCH_basic->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->Visible) { // facultyprofile_totalCr_ugrad ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalCr_ugrad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalCr_ugrad) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->Visible) { // facultyprofile_totalHrs_ugrad ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->Visible) { // facultyprofile_totalSCH_ugrad ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalCr_graduate->Visible) { // facultyprofile_totalCr_graduate ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalCr_graduate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalCr_graduate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalCr_graduate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalCr_graduate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->Visible) { // facultyprofile_totalHrs_graduate ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalHrs_graduate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalHrs_graduate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->Visible) { // facultyprofile_totalSCH_graduate ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalSCH_graduate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalSCH_graduate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->Visible) { // facultyprofile_total_nonTeachingLoad ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
	<?php if ($view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_profile_admin->SortUrl($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$view_tbl_profile_admin_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($view_tbl_profile_admin->ExportAll && $view_tbl_profile_admin->Export <> "") {
	$view_tbl_profile_admin_list->StopRec = $view_tbl_profile_admin_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_tbl_profile_admin_list->TotalRecs > $view_tbl_profile_admin_list->StartRec + $view_tbl_profile_admin_list->DisplayRecs - 1)
		$view_tbl_profile_admin_list->StopRec = $view_tbl_profile_admin_list->StartRec + $view_tbl_profile_admin_list->DisplayRecs - 1;
	else
		$view_tbl_profile_admin_list->StopRec = $view_tbl_profile_admin_list->TotalRecs;
}
$view_tbl_profile_admin_list->RecCnt = $view_tbl_profile_admin_list->StartRec - 1;
if ($view_tbl_profile_admin_list->Recordset && !$view_tbl_profile_admin_list->Recordset->EOF) {
	$view_tbl_profile_admin_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $view_tbl_profile_admin_list->StartRec > 1)
		$view_tbl_profile_admin_list->Recordset->Move($view_tbl_profile_admin_list->StartRec - 1);
} elseif (!$view_tbl_profile_admin->AllowAddDeleteRow && $view_tbl_profile_admin_list->StopRec == 0) {
	$view_tbl_profile_admin_list->StopRec = $view_tbl_profile_admin->GridAddRowCount;
}

// Initialize aggregate
$view_tbl_profile_admin->RowType = UP_ROWTYPE_AGGREGATEINIT;
$view_tbl_profile_admin->ResetAttrs();
$view_tbl_profile_admin_list->RenderRow();
$view_tbl_profile_admin_list->RowCnt = 0;
while ($view_tbl_profile_admin_list->RecCnt < $view_tbl_profile_admin_list->StopRec) {
	$view_tbl_profile_admin_list->RecCnt++;
	if (intval($view_tbl_profile_admin_list->RecCnt) >= intval($view_tbl_profile_admin_list->StartRec)) {
		$view_tbl_profile_admin_list->RowCnt++;

		// Set up key count
		$view_tbl_profile_admin_list->KeyCount = $view_tbl_profile_admin_list->RowIndex;

		// Init row class and style
		$view_tbl_profile_admin->ResetAttrs();
		$view_tbl_profile_admin->CssClass = "";
		if ($view_tbl_profile_admin->CurrentAction == "gridadd") {
		} else {
			$view_tbl_profile_admin_list->LoadRowValues($view_tbl_profile_admin_list->Recordset); // Load row values
		}
		$view_tbl_profile_admin->RowType = UP_ROWTYPE_VIEW; // Render view
		$view_tbl_profile_admin->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$view_tbl_profile_admin_list->RenderRow();

		// Render list options
		$view_tbl_profile_admin_list->RenderListOptions();
?>
	<tr<?php echo $view_tbl_profile_admin->RowAttributes() ?>>
<?php

// Render list options (body, left)
$view_tbl_profile_admin_list->ListOptions->Render("body", "left");
?>
	<?php if ($view_tbl_profile_admin->faculty_name->Visible) { // faculty_name ?>
		<td<?php echo $view_tbl_profile_admin->faculty_name->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->faculty_name->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->faculty_name->ListViewValue() ?></div>
<a name="<?php echo $view_tbl_profile_admin_list->PageObjName . "_row_" . $view_tbl_profile_admin_list->RowCnt ?>" id="<?php echo $view_tbl_profile_admin_list->PageObjName . "_row_" . $view_tbl_profile_admin_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
		<td<?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyGroup_CHEDCode->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyRank_ID->Visible) { // facultyRank_ID ?>
		<td<?php echo $view_tbl_profile_admin->facultyRank_ID->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyRank_ID->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyRank_ID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_tenureCode->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_leaveCode->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_basic->Visible) { // facultyprofile_totalHrs_basic ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_basic->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_basic->Visible) { // facultyprofile_totalSCH_basic ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_basic->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalCr_ugrad->Visible) { // facultyprofile_totalCr_ugrad ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->Visible) { // facultyprofile_totalHrs_ugrad ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->Visible) { // facultyprofile_totalSCH_ugrad ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalCr_graduate->Visible) { // facultyprofile_totalCr_graduate ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalCr_graduate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalHrs_graduate->Visible) { // facultyprofile_totalHrs_graduate ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalSCH_graduate->Visible) { // facultyprofile_totalSCH_graduate ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->Visible) { // facultyprofile_total_nonTeachingLoad ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->Visible) { // facultyprofile_totalWorkloadInCreditUnits_gen ?>
		<td<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CellAttributes() ?>>
<div<?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ViewAttributes() ?>><?php echo $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_tbl_profile_admin_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($view_tbl_profile_admin->CurrentAction <> "gridadd")
		$view_tbl_profile_admin_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($view_tbl_profile_admin_list->Recordset)
	$view_tbl_profile_admin_list->Recordset->Close();
?>
<?php if ($view_tbl_profile_admin_list->TotalRecs > 0) { ?>
<?php if ($view_tbl_profile_admin->Export == "") { ?>
<div class="upGridLowerPanel">
<?php if ($view_tbl_profile_admin->CurrentAction <> "gridadd" && $view_tbl_profile_admin->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($view_tbl_profile_admin_list->Pager)) $view_tbl_profile_admin_list->Pager = new cPrevNextPager($view_tbl_profile_admin_list->StartRec, $view_tbl_profile_admin_list->DisplayRecs, $view_tbl_profile_admin_list->TotalRecs) ?>
<?php if ($view_tbl_profile_admin_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($view_tbl_profile_admin_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_profile_admin_list->PageUrl() ?>start=<?php echo $view_tbl_profile_admin_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_tbl_profile_admin_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_profile_admin_list->PageUrl() ?>start=<?php echo $view_tbl_profile_admin_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $view_tbl_profile_admin_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($view_tbl_profile_admin_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_profile_admin_list->PageUrl() ?>start=<?php echo $view_tbl_profile_admin_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($view_tbl_profile_admin_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_profile_admin_list->PageUrl() ?>start=<?php echo $view_tbl_profile_admin_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $view_tbl_profile_admin_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_tbl_profile_admin_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_tbl_profile_admin_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_tbl_profile_admin_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($view_tbl_profile_admin_list->SearchWhere == "0=101") { ?>
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
<?php } ?>
</td></tr></table>
<?php if ($view_tbl_profile_admin->Export == "" && $view_tbl_profile_admin->CurrentAction == "") { ?>
<?php } ?>
<?php
$view_tbl_profile_admin_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($view_tbl_profile_admin->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_tbl_profile_admin_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cview_tbl_profile_admin_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'view_tbl_profile_admin';

	// Page object name
	var $PageObjName = 'view_tbl_profile_admin_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $view_tbl_profile_admin;
		if ($view_tbl_profile_admin->UseTokenInUrl) $PageUrl .= "t=" . $view_tbl_profile_admin->TableVar . "&"; // Add page token
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
		global $objForm, $view_tbl_profile_admin;
		if ($view_tbl_profile_admin->UseTokenInUrl) {
			if ($objForm)
				return ($view_tbl_profile_admin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($view_tbl_profile_admin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cview_tbl_profile_admin_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (view_tbl_profile_admin)
		if (!isset($GLOBALS["view_tbl_profile_admin"])) {
			$GLOBALS["view_tbl_profile_admin"] = new cview_tbl_profile_admin();
			$GLOBALS["Table"] =& $GLOBALS["view_tbl_profile_admin"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "view_tbl_profile_adminadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "view_tbl_profile_admindelete.php";
		$this->MultiUpdateUrl = "view_tbl_profile_adminupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Table object (view_tbl_collectionperiod_admin)
		if (!isset($GLOBALS['view_tbl_collectionperiod_admin'])) $GLOBALS['view_tbl_collectionperiod_admin'] = new cview_tbl_collectionperiod_admin();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'view_tbl_profile_admin', TRUE);

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
		global $view_tbl_profile_admin;

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
			$view_tbl_profile_admin->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $view_tbl_profile_admin;

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
			if ($view_tbl_profile_admin->Export <> "" ||
				$view_tbl_profile_admin->CurrentAction == "gridadd" ||
				$view_tbl_profile_admin->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$view_tbl_profile_admin->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($view_tbl_profile_admin->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $view_tbl_profile_admin->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$view_tbl_profile_admin->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$view_tbl_profile_admin->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $view_tbl_profile_admin->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $view_tbl_profile_admin->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $view_tbl_profile_admin->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($view_tbl_profile_admin->getMasterFilter() <> "" && $view_tbl_profile_admin->getCurrentMasterTable() == "view_tbl_collectionperiod_admin") {
			global $view_tbl_collectionperiod_admin;
			$rsmaster = $view_tbl_collectionperiod_admin->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($view_tbl_profile_admin->getReturnUrl()); // Return to caller
			} else {
				$view_tbl_collectionperiod_admin->LoadListRowValues($rsmaster);
				$view_tbl_collectionperiod_admin->RowType = UP_ROWTYPE_MASTER; // Master row
				$view_tbl_collectionperiod_admin->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$view_tbl_profile_admin->setSessionWhere($sFilter);
		$view_tbl_profile_admin->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $view_tbl_profile_admin;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $view_tbl_profile_admin->faculty_name, $Keyword);
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
		global $Security, $view_tbl_profile_admin;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $view_tbl_profile_admin->BasicSearchKeyword;
		$sSearchType = $view_tbl_profile_admin->BasicSearchType;
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
			$view_tbl_profile_admin->setSessionBasicSearchKeyword($sSearchKeyword);
			$view_tbl_profile_admin->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $view_tbl_profile_admin;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$view_tbl_profile_admin->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $view_tbl_profile_admin;
		$view_tbl_profile_admin->setSessionBasicSearchKeyword("");
		$view_tbl_profile_admin->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $view_tbl_profile_admin;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$view_tbl_profile_admin->BasicSearchKeyword = $view_tbl_profile_admin->getSessionBasicSearchKeyword();
			$view_tbl_profile_admin->BasicSearchType = $view_tbl_profile_admin->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $view_tbl_profile_admin;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$view_tbl_profile_admin->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$view_tbl_profile_admin->CurrentOrderType = @$_GET["ordertype"];
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->faculty_name); // faculty_name
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyGroup_CHEDCode); // facultyGroup_CHEDCode
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyRank_ID); // facultyRank_ID
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_tenureCode); // facultyprofile_tenureCode
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_leaveCode); // facultyprofile_leaveCode
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad); // facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_totalHrs_basic); // facultyprofile_totalHrs_basic
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_totalSCH_basic); // facultyprofile_totalSCH_basic
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_totalCr_ugrad); // facultyprofile_totalCr_ugrad
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_totalHrs_ugrad); // facultyprofile_totalHrs_ugrad
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_totalSCH_ugrad); // facultyprofile_totalSCH_ugrad
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_totalCr_graduate); // facultyprofile_totalCr_graduate
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_totalHrs_graduate); // facultyprofile_totalHrs_graduate
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_totalSCH_graduate); // facultyprofile_totalSCH_graduate
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad); // facultyprofile_total_nonTeachingLoad
			$view_tbl_profile_admin->UpdateSort($view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen); // facultyprofile_totalWorkloadInCreditUnits_gen
			$view_tbl_profile_admin->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $view_tbl_profile_admin;
		$sOrderBy = $view_tbl_profile_admin->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($view_tbl_profile_admin->SqlOrderBy() <> "") {
				$sOrderBy = $view_tbl_profile_admin->SqlOrderBy();
				$view_tbl_profile_admin->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $view_tbl_profile_admin;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$view_tbl_profile_admin->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$view_tbl_profile_admin->collectionPeriod_ID->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$view_tbl_profile_admin->setSessionOrderBy($sOrderBy);
				$view_tbl_profile_admin->faculty_name->setSort("");
				$view_tbl_profile_admin->facultyGroup_CHEDCode->setSort("");
				$view_tbl_profile_admin->facultyRank_ID->setSort("");
				$view_tbl_profile_admin->facultyprofile_tenureCode->setSort("");
				$view_tbl_profile_admin->facultyprofile_leaveCode->setSort("");
				$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setSort("");
				$view_tbl_profile_admin->facultyprofile_totalHrs_basic->setSort("");
				$view_tbl_profile_admin->facultyprofile_totalSCH_basic->setSort("");
				$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->setSort("");
				$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->setSort("");
				$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->setSort("");
				$view_tbl_profile_admin->facultyprofile_totalCr_graduate->setSort("");
				$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->setSort("");
				$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->setSort("");
				$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->setSort("");
				$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $view_tbl_profile_admin;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $view_tbl_profile_admin, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $view_tbl_profile_admin;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $view_tbl_profile_admin;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $view_tbl_profile_admin->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $view_tbl_profile_admin;
		$view_tbl_profile_admin->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$view_tbl_profile_admin->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $view_tbl_profile_admin;

		// Call Recordset Selecting event
		$view_tbl_profile_admin->Recordset_Selecting($view_tbl_profile_admin->CurrentFilter);

		// Load List page SQL
		$sSql = $view_tbl_profile_admin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$view_tbl_profile_admin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $view_tbl_profile_admin;
		$sFilter = $view_tbl_profile_admin->KeyFilter();

		// Call Row Selecting event
		$view_tbl_profile_admin->Row_Selecting($sFilter);

		// Load SQL based on filter
		$view_tbl_profile_admin->CurrentFilter = $sFilter;
		$sSql = $view_tbl_profile_admin->SQL();
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
		global $conn, $view_tbl_profile_admin;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$view_tbl_profile_admin->Row_Selected($row);
		$view_tbl_profile_admin->facultyprofile_ID->setDbValue($rs->fields('facultyprofile_ID'));
		$view_tbl_profile_admin->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$view_tbl_profile_admin->faculty_name->setDbValue($rs->fields('faculty_name'));
		$view_tbl_profile_admin->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$view_tbl_profile_admin->cu->setDbValue($rs->fields('cu'));
		$view_tbl_profile_admin->collectionPeriod_ay->setDbValue($rs->fields('collectionPeriod_ay'));
		$view_tbl_profile_admin->collectionPeriod_sem->setDbValue($rs->fields('collectionPeriod_sem'));
		$view_tbl_profile_admin->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$view_tbl_profile_admin->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
		$view_tbl_profile_admin->unitID->setDbValue($rs->fields('unitID'));
		$view_tbl_profile_admin->facultyprofile_homeUnit_ID->setDbValue($rs->fields('facultyprofile_homeUnit_ID'));
		$view_tbl_profile_admin->facultyprofile_isHomeUnit->setDbValue($rs->fields('facultyprofile_isHomeUnit'));
		$view_tbl_profile_admin->facultyGroup_CHEDCode->setDbValue($rs->fields('facultyGroup_CHEDCode'));
		$view_tbl_profile_admin->facultyRank_ID->setDbValue($rs->fields('facultyRank_ID'));
		$view_tbl_profile_admin->facultyprofile_sg->setDbValue($rs->fields('facultyprofile_sg'));
		$view_tbl_profile_admin->facultyprofile_annualSalary->setDbValue($rs->fields('facultyprofile_annualSalary'));
		$view_tbl_profile_admin->facultyprofile_fte->setDbValue($rs->fields('facultyprofile_fte'));
		$view_tbl_profile_admin->facultyprofile_tenureCode->setDbValue($rs->fields('facultyprofile_tenureCode'));
		$view_tbl_profile_admin->facultyprofile_leaveCode->setDbValue($rs->fields('facultyprofile_leaveCode'));
		$view_tbl_profile_admin->facultyprofile_disCHED_disciplineMajorCode_gen->setDbValue($rs->fields('facultyprofile_disCHED_disciplineMajorCode_gen'));
		$view_tbl_profile_admin->disCHED_disciplineCode_gen->setDbValue($rs->fields('disCHED_disciplineCode_gen'));
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_1_primaryTeachingLoad'));
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_2_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_2_primaryTeachingLoad'));
		$view_tbl_profile_admin->facultyprofile_labHrs_basic->setDbValue($rs->fields('facultyprofile_labHrs_basic'));
		$view_tbl_profile_admin->facultyprofile_lecHrs_basic->setDbValue($rs->fields('facultyprofile_lecHrs_basic'));
		$view_tbl_profile_admin->facultyprofile_totalHrs_basic->setDbValue($rs->fields('facultyprofile_totalHrs_basic'));
		$view_tbl_profile_admin->facultyprofile_labSCH_basic->setDbValue($rs->fields('facultyprofile_labSCH_basic'));
		$view_tbl_profile_admin->facultyprofile_lecSCH_basic->setDbValue($rs->fields('facultyprofile_lecSCH_basic'));
		$view_tbl_profile_admin->facultyprofile_totalSCH_basic->setDbValue($rs->fields('facultyprofile_totalSCH_basic'));
		$view_tbl_profile_admin->facultyprofile_labCr_ugrad->setDbValue($rs->fields('facultyprofile_labCr_ugrad'));
		$view_tbl_profile_admin->facultyprofile_lecCr_ugrad->setDbValue($rs->fields('facultyprofile_lecCr_ugrad'));
		$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_ugrad'));
		$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->setDbValue($rs->fields('facultyprofile_totalCr_ugrad'));
		$view_tbl_profile_admin->facultyprofile_labHrs_ugrad->setDbValue($rs->fields('facultyprofile_labHrs_ugrad'));
		$view_tbl_profile_admin->facultyprofile_lecHrs_ugrad->setDbValue($rs->fields('facultyprofile_lecHrs_ugrad'));
		$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_ugrad'));
		$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->setDbValue($rs->fields('facultyprofile_totalHrs_ugrad'));
		$view_tbl_profile_admin->facultyprofile_labSCH_ugrad->setDbValue($rs->fields('facultyprofile_labSCH_ugrad'));
		$view_tbl_profile_admin->facultyprofile_lecSCH_ugrad->setDbValue($rs->fields('facultyprofile_lecSCH_ugrad'));
		$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_ugrad'));
		$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->setDbValue($rs->fields('facultyprofile_totalSCH_ugrad'));
		$view_tbl_profile_admin->facultyprofile_labCr_graduate->setDbValue($rs->fields('facultyprofile_labCr_graduate'));
		$view_tbl_profile_admin->facultyprofile_lecCr_graduate->setDbValue($rs->fields('facultyprofile_lecCr_graduate'));
		$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_graduate'));
		$view_tbl_profile_admin->facultyprofile_totalCr_graduate->setDbValue($rs->fields('facultyprofile_totalCr_graduate'));
		$view_tbl_profile_admin->facultyprofile_labHrs_graduate->setDbValue($rs->fields('facultyprofile_labHrs_graduate'));
		$view_tbl_profile_admin->facultyprofile_lecHrs_graduate->setDbValue($rs->fields('facultyprofile_lecHrs_graduate'));
		$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_graduate'));
		$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->setDbValue($rs->fields('facultyprofile_totalHrs_graduate'));
		$view_tbl_profile_admin->facultyprofile_labSCH_graduate->setDbValue($rs->fields('facultyprofile_labSCH_graduate'));
		$view_tbl_profile_admin->facultyprofile_lecSCH_graduate->setDbValue($rs->fields('facultyprofile_lecSCH_graduate'));
		$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_graduate'));
		$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->setDbValue($rs->fields('facultyprofile_totalSCH_graduate'));
		$view_tbl_profile_admin->facultyprofile_researchLoad->setDbValue($rs->fields('facultyprofile_researchLoad'));
		$view_tbl_profile_admin->facultyprofile_extensionServicesLoad->setDbValue($rs->fields('facultyprofile_extensionServicesLoad'));
		$view_tbl_profile_admin->facultyprofile_studyLoad->setDbValue($rs->fields('facultyprofile_studyLoad'));
		$view_tbl_profile_admin->facultyprofile_forProductionLoad->setDbValue($rs->fields('facultyprofile_forProductionLoad'));
		$view_tbl_profile_admin->facultyprofile_administrativeLoad->setDbValue($rs->fields('facultyprofile_administrativeLoad'));
		$view_tbl_profile_admin->facultyprofile_otherLoadCredits->setDbValue($rs->fields('facultyprofile_otherLoadCredits'));
		$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->setDbValue($rs->fields('facultyprofile_total_nonTeachingLoad'));
		$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->setDbValue($rs->fields('facultyprofile_totalWorkloadInCreditUnits_gen'));
		$view_tbl_profile_admin->facultyprofile_remarks->setDbValue($rs->fields('facultyprofile_remarks'));
	}

	// Load old record
	function LoadOldRecord() {
		global $view_tbl_profile_admin;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$view_tbl_profile_admin->CurrentFilter = $view_tbl_profile_admin->KeyFilter();
			$sSql = $view_tbl_profile_admin->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $view_tbl_profile_admin;

		// Initialize URLs
		$this->ViewUrl = $view_tbl_profile_admin->ViewUrl();
		$this->EditUrl = $view_tbl_profile_admin->EditUrl();
		$this->InlineEditUrl = $view_tbl_profile_admin->InlineEditUrl();
		$this->CopyUrl = $view_tbl_profile_admin->CopyUrl();
		$this->InlineCopyUrl = $view_tbl_profile_admin->InlineCopyUrl();
		$this->DeleteUrl = $view_tbl_profile_admin->DeleteUrl();

		// Call Row_Rendering event
		$view_tbl_profile_admin->Row_Rendering();

		// Common render codes for all row types
		// facultyprofile_ID

		$view_tbl_profile_admin->facultyprofile_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_ID
		$view_tbl_profile_admin->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_name
		$view_tbl_profile_admin->faculty_name->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ID
		$view_tbl_profile_admin->collectionPeriod_ID->CellCssStyle = "white-space: nowrap;";

		// cu
		$view_tbl_profile_admin->cu->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ay
		$view_tbl_profile_admin->collectionPeriod_ay->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_sem
		$view_tbl_profile_admin->collectionPeriod_sem->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_cutOffDate
		$view_tbl_profile_admin->collectionPeriod_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_status
		$view_tbl_profile_admin->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";

		// unitID
		$view_tbl_profile_admin->unitID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_homeUnit_ID
		$view_tbl_profile_admin->facultyprofile_homeUnit_ID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_isHomeUnit
		$view_tbl_profile_admin->facultyprofile_isHomeUnit->CellCssStyle = "white-space: nowrap;";

		// facultyGroup_CHEDCode
		$view_tbl_profile_admin->facultyGroup_CHEDCode->CellCssStyle = "white-space: nowrap;";

		// facultyRank_ID
		$view_tbl_profile_admin->facultyRank_ID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_sg
		$view_tbl_profile_admin->facultyprofile_sg->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_annualSalary
		$view_tbl_profile_admin->facultyprofile_annualSalary->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_fte
		$view_tbl_profile_admin->facultyprofile_fte->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_tenureCode
		$view_tbl_profile_admin->facultyprofile_tenureCode->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_leaveCode
		$view_tbl_profile_admin->facultyprofile_leaveCode->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_disCHED_disciplineMajorCode_gen
		$view_tbl_profile_admin->facultyprofile_disCHED_disciplineMajorCode_gen->CellCssStyle = "white-space: nowrap;";

		// disCHED_disciplineCode_gen
		$view_tbl_profile_admin->disCHED_disciplineCode_gen->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_specificDiscipline_1_primaryTeachingLoad
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_specificDiscipline_2_primaryTeachingLoad
		$view_tbl_profile_admin->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_basic
		$view_tbl_profile_admin->facultyprofile_labHrs_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_basic
		$view_tbl_profile_admin->facultyprofile_lecHrs_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_basic
		// facultyprofile_labSCH_basic

		$view_tbl_profile_admin->facultyprofile_labSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_basic
		$view_tbl_profile_admin->facultyprofile_lecSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_basic
		$view_tbl_profile_admin->facultyprofile_totalSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labCr_ugrad
		$view_tbl_profile_admin->facultyprofile_labCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecCr_ugrad
		$view_tbl_profile_admin->facultyprofile_lecCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecCr_ugrad
		$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalCr_ugrad
		$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_ugrad
		$view_tbl_profile_admin->facultyprofile_labHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_ugrad
		$view_tbl_profile_admin->facultyprofile_lecHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecHrs_ugrad
		$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_ugrad
		$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labSCH_ugrad
		$view_tbl_profile_admin->facultyprofile_labSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_ugrad
		$view_tbl_profile_admin->facultyprofile_lecSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecSCH_ugrad
		$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_ugrad
		$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labCr_graduate
		$view_tbl_profile_admin->facultyprofile_labCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecCr_graduate
		$view_tbl_profile_admin->facultyprofile_lecCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecCr_graduate
		$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalCr_graduate
		$view_tbl_profile_admin->facultyprofile_totalCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_graduate
		$view_tbl_profile_admin->facultyprofile_labHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_graduate
		$view_tbl_profile_admin->facultyprofile_lecHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecHrs_graduate
		$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_graduate
		$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labSCH_graduate
		$view_tbl_profile_admin->facultyprofile_labSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_graduate
		$view_tbl_profile_admin->facultyprofile_lecSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecSCH_graduate
		$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_graduate
		$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_researchLoad
		$view_tbl_profile_admin->facultyprofile_researchLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_extensionServicesLoad
		$view_tbl_profile_admin->facultyprofile_extensionServicesLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_studyLoad
		$view_tbl_profile_admin->facultyprofile_studyLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_forProductionLoad
		$view_tbl_profile_admin->facultyprofile_forProductionLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_administrativeLoad
		$view_tbl_profile_admin->facultyprofile_administrativeLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_otherLoadCredits
		$view_tbl_profile_admin->facultyprofile_otherLoadCredits->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_total_nonTeachingLoad
		$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalWorkloadInCreditUnits_gen
		$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_remarks
		$view_tbl_profile_admin->facultyprofile_remarks->CellCssStyle = "white-space: nowrap;";
		if ($view_tbl_profile_admin->RowType == UP_ROWTYPE_VIEW) { // View row

			// faculty_name
			$view_tbl_profile_admin->faculty_name->ViewValue = $view_tbl_profile_admin->faculty_name->CurrentValue;
			$view_tbl_profile_admin->faculty_name->ViewCustomAttributes = "";

			// facultyGroup_CHEDCode
			if (strval($view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue) <> "") {
				$sFilterWrk = "`facultyGroup_CHEDCode` = '" . up_AdjustSql($view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue) . "'";
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
					$view_tbl_profile_admin->facultyGroup_CHEDCode->ViewValue = $rswrk->fields('facultyGroup_description');
					$rswrk->Close();
				} else {
					$view_tbl_profile_admin->facultyGroup_CHEDCode->ViewValue = $view_tbl_profile_admin->facultyGroup_CHEDCode->CurrentValue;
				}
			} else {
				$view_tbl_profile_admin->facultyGroup_CHEDCode->ViewValue = NULL;
			}
			$view_tbl_profile_admin->facultyGroup_CHEDCode->ViewCustomAttributes = "";

			// facultyRank_ID
			if (strval($view_tbl_profile_admin->facultyRank_ID->CurrentValue) <> "") {
				$sFilterWrk = "`facultyRank_ID` = " . up_AdjustSql($view_tbl_profile_admin->facultyRank_ID->CurrentValue) . "";
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
					$view_tbl_profile_admin->facultyRank_ID->ViewValue = $rswrk->fields('facultyRank_UPRank');
					$rswrk->Close();
				} else {
					$view_tbl_profile_admin->facultyRank_ID->ViewValue = $view_tbl_profile_admin->facultyRank_ID->CurrentValue;
				}
			} else {
				$view_tbl_profile_admin->facultyRank_ID->ViewValue = NULL;
			}
			$view_tbl_profile_admin->facultyRank_ID->ViewCustomAttributes = "";

			// facultyprofile_sg
			$view_tbl_profile_admin->facultyprofile_sg->ViewValue = $view_tbl_profile_admin->facultyprofile_sg->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_sg->ViewCustomAttributes = "";

			// facultyprofile_annualSalary
			$view_tbl_profile_admin->facultyprofile_annualSalary->ViewValue = $view_tbl_profile_admin->facultyprofile_annualSalary->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_annualSalary->ViewCustomAttributes = "";

			// facultyprofile_tenureCode
			if (strval($view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue) <> "") {
				$sFilterWrk = "`tenureCode_ID` = " . up_AdjustSql($view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue) . "";
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
					$view_tbl_profile_admin->facultyprofile_tenureCode->ViewValue = $rswrk->fields('tenureCode_description');
					$rswrk->Close();
				} else {
					$view_tbl_profile_admin->facultyprofile_tenureCode->ViewValue = $view_tbl_profile_admin->facultyprofile_tenureCode->CurrentValue;
				}
			} else {
				$view_tbl_profile_admin->facultyprofile_tenureCode->ViewValue = NULL;
			}
			$view_tbl_profile_admin->facultyprofile_tenureCode->ViewCustomAttributes = "";

			// facultyprofile_leaveCode
			if (strval($view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue) <> "") {
				$sFilterWrk = "`leaveCode_ID` = " . up_AdjustSql($view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue) . "";
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
					$view_tbl_profile_admin->facultyprofile_leaveCode->ViewValue = $rswrk->fields('leaveCode_description');
					$rswrk->Close();
				} else {
					$view_tbl_profile_admin->facultyprofile_leaveCode->ViewValue = $view_tbl_profile_admin->facultyprofile_leaveCode->CurrentValue;
				}
			} else {
				$view_tbl_profile_admin->facultyprofile_leaveCode->ViewValue = NULL;
			}
			$view_tbl_profile_admin->facultyprofile_leaveCode->ViewCustomAttributes = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_specificDiscipline_2_primaryTeachingLoad
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_labHrs_basic
			$view_tbl_profile_admin->facultyprofile_labHrs_basic->ViewValue = $view_tbl_profile_admin->facultyprofile_labHrs_basic->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_basic
			$view_tbl_profile_admin->facultyprofile_lecHrs_basic->ViewValue = $view_tbl_profile_admin->facultyprofile_lecHrs_basic->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_basic
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->ViewValue = $view_tbl_profile_admin->facultyprofile_totalHrs_basic->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_labSCH_basic
			$view_tbl_profile_admin->facultyprofile_labSCH_basic->ViewValue = $view_tbl_profile_admin->facultyprofile_labSCH_basic->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_basic
			$view_tbl_profile_admin->facultyprofile_lecSCH_basic->ViewValue = $view_tbl_profile_admin->facultyprofile_lecSCH_basic->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_basic
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->ViewValue = $view_tbl_profile_admin->facultyprofile_totalSCH_basic->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_labCr_ugrad
			$view_tbl_profile_admin->facultyprofile_labCr_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_labCr_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecCr_ugrad
			$view_tbl_profile_admin->facultyprofile_lecCr_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_lecCr_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecCr_ugrad
			$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_mixedLabLecCr_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalCr_ugrad
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_totalCr_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_labHrs_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_labHrs_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_lecHrs_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_lecHrs_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_labSCH_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_labSCH_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_lecSCH_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_lecSCH_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ViewValue = $view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labCr_graduate
			$view_tbl_profile_admin->facultyprofile_labCr_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_labCr_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecCr_graduate
			$view_tbl_profile_admin->facultyprofile_lecCr_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_lecCr_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecCr_graduate
			$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_mixedLabLecCr_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_mixedLabLecCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalCr_graduate
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_totalCr_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_labHrs_graduate
			$view_tbl_profile_admin->facultyprofile_labHrs_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_labHrs_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_graduate
			$view_tbl_profile_admin->facultyprofile_lecHrs_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_lecHrs_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecHrs_graduate
			$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_mixedLabLecHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_graduate
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_totalHrs_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_labSCH_graduate
			$view_tbl_profile_admin->facultyprofile_labSCH_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_labSCH_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_labSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_graduate
			$view_tbl_profile_admin->facultyprofile_lecSCH_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_lecSCH_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_lecSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecSCH_graduate
			$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_mixedLabLecSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_graduate
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ViewValue = $view_tbl_profile_admin->facultyprofile_totalSCH_graduate->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_researchLoad
			$view_tbl_profile_admin->facultyprofile_researchLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_researchLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_researchLoad->ViewCustomAttributes = "";

			// facultyprofile_extensionServicesLoad
			$view_tbl_profile_admin->facultyprofile_extensionServicesLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_extensionServicesLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_extensionServicesLoad->ViewCustomAttributes = "";

			// facultyprofile_studyLoad
			$view_tbl_profile_admin->facultyprofile_studyLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_studyLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_studyLoad->ViewCustomAttributes = "";

			// facultyprofile_forProductionLoad
			$view_tbl_profile_admin->facultyprofile_forProductionLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_forProductionLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_forProductionLoad->ViewCustomAttributes = "";

			// facultyprofile_administrativeLoad
			$view_tbl_profile_admin->facultyprofile_administrativeLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_administrativeLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_administrativeLoad->ViewCustomAttributes = "";

			// facultyprofile_otherLoadCredits
			$view_tbl_profile_admin->facultyprofile_otherLoadCredits->ViewValue = $view_tbl_profile_admin->facultyprofile_otherLoadCredits->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_otherLoadCredits->ViewCustomAttributes = "";

			// facultyprofile_total_nonTeachingLoad
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ViewValue = $view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ViewValue = $view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->ViewCustomAttributes = "";

			// facultyprofile_remarks
			$view_tbl_profile_admin->facultyprofile_remarks->ViewValue = $view_tbl_profile_admin->facultyprofile_remarks->CurrentValue;
			$view_tbl_profile_admin->facultyprofile_remarks->ViewCustomAttributes = "";

			// faculty_name
			$view_tbl_profile_admin->faculty_name->LinkCustomAttributes = "";
			$view_tbl_profile_admin->faculty_name->HrefValue = "";
			$view_tbl_profile_admin->faculty_name->TooltipValue = "";

			// facultyGroup_CHEDCode
			$view_tbl_profile_admin->facultyGroup_CHEDCode->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyGroup_CHEDCode->HrefValue = "";
			$view_tbl_profile_admin->facultyGroup_CHEDCode->TooltipValue = "";

			// facultyRank_ID
			$view_tbl_profile_admin->facultyRank_ID->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyRank_ID->HrefValue = "";
			$view_tbl_profile_admin->facultyRank_ID->TooltipValue = "";

			// facultyprofile_tenureCode
			$view_tbl_profile_admin->facultyprofile_tenureCode->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_tenureCode->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_tenureCode->TooltipValue = "";

			// facultyprofile_leaveCode
			$view_tbl_profile_admin->facultyprofile_leaveCode->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_leaveCode->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_leaveCode->TooltipValue = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_specificDiscipline_1_primaryTeachingLoad->TooltipValue = "";

			// facultyprofile_totalHrs_basic
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_basic->TooltipValue = "";

			// facultyprofile_totalSCH_basic
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_basic->TooltipValue = "";

			// facultyprofile_totalCr_ugrad
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalCr_ugrad->TooltipValue = "";

			// facultyprofile_totalHrs_ugrad
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_ugrad->TooltipValue = "";

			// facultyprofile_totalSCH_ugrad
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_ugrad->TooltipValue = "";

			// facultyprofile_totalCr_graduate
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalCr_graduate->TooltipValue = "";

			// facultyprofile_totalHrs_graduate
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalHrs_graduate->TooltipValue = "";

			// facultyprofile_totalSCH_graduate
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalSCH_graduate->TooltipValue = "";

			// facultyprofile_total_nonTeachingLoad
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_total_nonTeachingLoad->TooltipValue = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->LinkCustomAttributes = "";
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->HrefValue = "";
			$view_tbl_profile_admin->facultyprofile_totalWorkloadInCreditUnits_gen->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($view_tbl_profile_admin->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$view_tbl_profile_admin->Row_Rendered();
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $view_tbl_profile_admin;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "view_tbl_collectionperiod_admin") {
				$bValidMaster = TRUE;
				if (@$_GET["collectionPeriod_ID"] <> "") {
					$GLOBALS["view_tbl_collectionperiod_admin"]->collectionPeriod_ID->setQueryStringValue($_GET["collectionPeriod_ID"]);
					$view_tbl_profile_admin->collectionPeriod_ID->setQueryStringValue($GLOBALS["view_tbl_collectionperiod_admin"]->collectionPeriod_ID->QueryStringValue);
					$view_tbl_profile_admin->collectionPeriod_ID->setSessionValue($view_tbl_profile_admin->collectionPeriod_ID->QueryStringValue);
					if (!is_numeric($GLOBALS["view_tbl_collectionperiod_admin"]->collectionPeriod_ID->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$view_tbl_profile_admin->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$view_tbl_profile_admin->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "view_tbl_collectionperiod_admin") {
				if ($view_tbl_profile_admin->collectionPeriod_ID->QueryStringValue == "") $view_tbl_profile_admin->collectionPeriod_ID->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $view_tbl_profile_admin->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $view_tbl_profile_admin->getDetailFilter(); // Get detail filter
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
		$table = 'view_tbl_profile_admin';
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
