<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_cutoffdateinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_cutoffdate_list = new cfrm_cutoffdate_list();
$Page =& $frm_cutoffdate_list;

// Page init
$frm_cutoffdate_list->Page_Init();

// Page main
$frm_cutoffdate_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_cutoffdate->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_cutoffdate_list = new up_Page("frm_cutoffdate_list");

// page properties
frm_cutoffdate_list.PageID = "list"; // page ID
frm_cutoffdate_list.FormID = "ffrm_cutoffdatelist"; // form ID
var UP_PAGE_ID = frm_cutoffdate_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_cutoffdate_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_cutoffdate_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_cutoffdate_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_cutoffdate_list.ValidateRequired = false; // no JavaScript validation
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
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-cold-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
//-->

</script>
<?php } ?>
<?php if (($frm_cutoffdate->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_cutoffdate->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_cutoffdate_list->TotalRecs = $frm_cutoffdate->SelectRecordCount();
	} else {
		if ($frm_cutoffdate_list->Recordset = $frm_cutoffdate_list->LoadRecordset())
			$frm_cutoffdate_list->TotalRecs = $frm_cutoffdate_list->Recordset->RecordCount();
	}
	$frm_cutoffdate_list->StartRec = 1;
	if ($frm_cutoffdate_list->DisplayRecs <= 0 || ($frm_cutoffdate->Export <> "" && $frm_cutoffdate->ExportAll)) // Display all records
		$frm_cutoffdate_list->DisplayRecs = $frm_cutoffdate_list->TotalRecs;
	if (!($frm_cutoffdate->Export <> "" && $frm_cutoffdate->ExportAll))
		$frm_cutoffdate_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_cutoffdate_list->Recordset = $frm_cutoffdate_list->LoadRecordset($frm_cutoffdate_list->StartRec-1, $frm_cutoffdate_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_cutoffdate->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_cutoffdate_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_cutoffdate->Export == "" && $frm_cutoffdate->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_cutoffdate_list);" style="text-decoration: none;"><img id="frm_cutoffdate_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_cutoffdate_list_SearchPanel">
<form name="ffrm_cutoffdatelistsrch" id="ffrm_cutoffdatelistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_cutoffdate">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_cutoffdate->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_cutoffdate_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_cutoffdate->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_cutoffdate->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_cutoffdate->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_cutoffdate_list->ShowPageHeader(); ?>
<?php
$frm_cutoffdate_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_cutoffdate->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_cutoffdate->CurrentAction <> "gridadd" && $frm_cutoffdate->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_cutoffdate_list->Pager)) $frm_cutoffdate_list->Pager = new cPrevNextPager($frm_cutoffdate_list->StartRec, $frm_cutoffdate_list->DisplayRecs, $frm_cutoffdate_list->TotalRecs) ?>
<?php if ($frm_cutoffdate_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_cutoffdate_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_cutoffdate_list->PageUrl() ?>start=<?php echo $frm_cutoffdate_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_cutoffdate_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_cutoffdate_list->PageUrl() ?>start=<?php echo $frm_cutoffdate_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_cutoffdate_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_cutoffdate_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_cutoffdate_list->PageUrl() ?>start=<?php echo $frm_cutoffdate_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_cutoffdate_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_cutoffdate_list->PageUrl() ?>start=<?php echo $frm_cutoffdate_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_cutoffdate_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_cutoffdate_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_cutoffdate_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_cutoffdate_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_cutoffdate_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $frm_cutoffdate_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($frm_cutoffdate_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ffrm_cutoffdatelist, '<?php echo $frm_cutoffdate_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ffrm_cutoffdatelist" id="ffrm_cutoffdatelist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_cutoffdate">
<div id="gmp_frm_cutoffdate" class="upGridMiddlePanel">
<?php if ($frm_cutoffdate_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_cutoffdate->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_cutoffdate_list->RenderListOptions();

// Render list options (header, left)
$frm_cutoffdate_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_cutoffdate->focal_person_office->Visible) { // focal_person_office ?>
	<?php if ($frm_cutoffdate->SortUrl($frm_cutoffdate->focal_person_office) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_cutoffdate->focal_person_office->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_cutoffdate->SortUrl($frm_cutoffdate->focal_person_office) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_cutoffdate->focal_person_office->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_cutoffdate->focal_person_office->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_cutoffdate->focal_person_office->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_cutoffdate->t_cutOffDate->Visible) { // t_cutOffDate ?>
	<?php if ($frm_cutoffdate->SortUrl($frm_cutoffdate->t_cutOffDate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_cutoffdate->t_cutOffDate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_cutoffdate->SortUrl($frm_cutoffdate->t_cutOffDate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_cutoffdate->t_cutOffDate->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_cutoffdate->t_cutOffDate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_cutoffdate->t_cutOffDate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_cutoffdate->t_cutOffDate_fp->Visible) { // t_cutOffDate_fp ?>
	<?php if ($frm_cutoffdate->SortUrl($frm_cutoffdate->t_cutOffDate_fp) == "") { ?>
		<td><?php echo $frm_cutoffdate->t_cutOffDate_fp->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_cutoffdate->SortUrl($frm_cutoffdate->t_cutOffDate_fp) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_cutoffdate->t_cutOffDate_fp->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_cutoffdate->t_cutOffDate_fp->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_cutoffdate->t_cutOffDate_fp->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_cutoffdate->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
	<?php if ($frm_cutoffdate->SortUrl($frm_cutoffdate->t_cutOffDate_remarks) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_cutoffdate->t_cutOffDate_remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_cutoffdate->SortUrl($frm_cutoffdate->t_cutOffDate_remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_cutoffdate->t_cutOffDate_remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_cutoffdate->t_cutOffDate_remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_cutoffdate->t_cutOffDate_remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_cutoffdate->a_cutOffDate->Visible) { // a_cutOffDate ?>
	<?php if ($frm_cutoffdate->SortUrl($frm_cutoffdate->a_cutOffDate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_cutoffdate->a_cutOffDate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_cutoffdate->SortUrl($frm_cutoffdate->a_cutOffDate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_cutoffdate->a_cutOffDate->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_cutoffdate->a_cutOffDate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_cutoffdate->a_cutOffDate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_cutoffdate->a_cutOffDate_fp->Visible) { // a_cutOffDate_fp ?>
	<?php if ($frm_cutoffdate->SortUrl($frm_cutoffdate->a_cutOffDate_fp) == "") { ?>
		<td><?php echo $frm_cutoffdate->a_cutOffDate_fp->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_cutoffdate->SortUrl($frm_cutoffdate->a_cutOffDate_fp) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_cutoffdate->a_cutOffDate_fp->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_cutoffdate->a_cutOffDate_fp->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_cutoffdate->a_cutOffDate_fp->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_cutoffdate->a_cutOffDate_remarks->Visible) { // a_cutOffDate_remarks ?>
	<?php if ($frm_cutoffdate->SortUrl($frm_cutoffdate->a_cutOffDate_remarks) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_cutoffdate->a_cutOffDate_remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_cutoffdate->SortUrl($frm_cutoffdate->a_cutOffDate_remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_cutoffdate->a_cutOffDate_remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_cutoffdate->a_cutOffDate_remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_cutoffdate->a_cutOffDate_remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_cutoffdate_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_cutoffdate->ExportAll && $frm_cutoffdate->Export <> "") {
	$frm_cutoffdate_list->StopRec = $frm_cutoffdate_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_cutoffdate_list->TotalRecs > $frm_cutoffdate_list->StartRec + $frm_cutoffdate_list->DisplayRecs - 1)
		$frm_cutoffdate_list->StopRec = $frm_cutoffdate_list->StartRec + $frm_cutoffdate_list->DisplayRecs - 1;
	else
		$frm_cutoffdate_list->StopRec = $frm_cutoffdate_list->TotalRecs;
}
$frm_cutoffdate_list->RecCnt = $frm_cutoffdate_list->StartRec - 1;
if ($frm_cutoffdate_list->Recordset && !$frm_cutoffdate_list->Recordset->EOF) {
	$frm_cutoffdate_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_cutoffdate_list->StartRec > 1)
		$frm_cutoffdate_list->Recordset->Move($frm_cutoffdate_list->StartRec - 1);
} elseif (!$frm_cutoffdate->AllowAddDeleteRow && $frm_cutoffdate_list->StopRec == 0) {
	$frm_cutoffdate_list->StopRec = $frm_cutoffdate->GridAddRowCount;
}

// Initialize aggregate
$frm_cutoffdate->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_cutoffdate->ResetAttrs();
$frm_cutoffdate_list->RenderRow();
$frm_cutoffdate_list->RowCnt = 0;
while ($frm_cutoffdate_list->RecCnt < $frm_cutoffdate_list->StopRec) {
	$frm_cutoffdate_list->RecCnt++;
	if (intval($frm_cutoffdate_list->RecCnt) >= intval($frm_cutoffdate_list->StartRec)) {
		$frm_cutoffdate_list->RowCnt++;

		// Set up key count
		$frm_cutoffdate_list->KeyCount = $frm_cutoffdate_list->RowIndex;

		// Init row class and style
		$frm_cutoffdate->ResetAttrs();
		$frm_cutoffdate->CssClass = "";
		if ($frm_cutoffdate->CurrentAction == "gridadd") {
		} else {
			$frm_cutoffdate_list->LoadRowValues($frm_cutoffdate_list->Recordset); // Load row values
		}
		$frm_cutoffdate->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_cutoffdate->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_cutoffdate_list->RenderRow();

		// Render list options
		$frm_cutoffdate_list->RenderListOptions();
?>
	<tr<?php echo $frm_cutoffdate->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_cutoffdate_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_cutoffdate->focal_person_office->Visible) { // focal_person_office ?>
		<td<?php echo $frm_cutoffdate->focal_person_office->CellAttributes() ?>>
<div<?php echo $frm_cutoffdate->focal_person_office->ViewAttributes() ?>><?php echo $frm_cutoffdate->focal_person_office->ListViewValue() ?></div>
<a name="<?php echo $frm_cutoffdate_list->PageObjName . "_row_" . $frm_cutoffdate_list->RowCnt ?>" id="<?php echo $frm_cutoffdate_list->PageObjName . "_row_" . $frm_cutoffdate_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_cutoffdate->t_cutOffDate->Visible) { // t_cutOffDate ?>
		<td<?php echo $frm_cutoffdate->t_cutOffDate->CellAttributes() ?>>
<div<?php echo $frm_cutoffdate->t_cutOffDate->ViewAttributes() ?>><?php echo $frm_cutoffdate->t_cutOffDate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_cutoffdate->t_cutOffDate_fp->Visible) { // t_cutOffDate_fp ?>
		<td<?php echo $frm_cutoffdate->t_cutOffDate_fp->CellAttributes() ?>>
<div<?php echo $frm_cutoffdate->t_cutOffDate_fp->ViewAttributes() ?>><?php echo $frm_cutoffdate->t_cutOffDate_fp->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_cutoffdate->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
		<td<?php echo $frm_cutoffdate->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_cutoffdate->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_cutoffdate->t_cutOffDate_remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_cutoffdate->a_cutOffDate->Visible) { // a_cutOffDate ?>
		<td<?php echo $frm_cutoffdate->a_cutOffDate->CellAttributes() ?>>
<div<?php echo $frm_cutoffdate->a_cutOffDate->ViewAttributes() ?>><?php echo $frm_cutoffdate->a_cutOffDate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_cutoffdate->a_cutOffDate_fp->Visible) { // a_cutOffDate_fp ?>
		<td<?php echo $frm_cutoffdate->a_cutOffDate_fp->CellAttributes() ?>>
<div<?php echo $frm_cutoffdate->a_cutOffDate_fp->ViewAttributes() ?>><?php echo $frm_cutoffdate->a_cutOffDate_fp->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_cutoffdate->a_cutOffDate_remarks->Visible) { // a_cutOffDate_remarks ?>
		<td<?php echo $frm_cutoffdate->a_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_cutoffdate->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_cutoffdate->a_cutOffDate_remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_cutoffdate_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_cutoffdate->CurrentAction <> "gridadd")
		$frm_cutoffdate_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_cutoffdate_list->Recordset)
	$frm_cutoffdate_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_cutoffdate->Export == "" && $frm_cutoffdate->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_cutoffdate_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_cutoffdate->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_cutoffdate_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_cutoffdate_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_cutoffdate';

	// Page object name
	var $PageObjName = 'frm_cutoffdate_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_cutoffdate;
		if ($frm_cutoffdate->UseTokenInUrl) $PageUrl .= "t=" . $frm_cutoffdate->TableVar . "&"; // Add page token
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
		global $objForm, $frm_cutoffdate;
		if ($frm_cutoffdate->UseTokenInUrl) {
			if ($objForm)
				return ($frm_cutoffdate->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_cutoffdate->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_cutoffdate_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_cutoffdate)
		if (!isset($GLOBALS["frm_cutoffdate"])) {
			$GLOBALS["frm_cutoffdate"] = new cfrm_cutoffdate();
			$GLOBALS["Table"] =& $GLOBALS["frm_cutoffdate"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_cutoffdateadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_cutoffdatedelete.php";
		$this->MultiUpdateUrl = "frm_cutoffdateupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_cutoffdate', TRUE);

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
		global $frm_cutoffdate;

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
			$frm_cutoffdate->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_cutoffdate;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($frm_cutoffdate->Export <> "" ||
				$frm_cutoffdate->CurrentAction == "gridadd" ||
				$frm_cutoffdate->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_cutoffdate->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_cutoffdate->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_cutoffdate->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_cutoffdate->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_cutoffdate->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_cutoffdate->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_cutoffdate->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$frm_cutoffdate->setSessionWhere($sFilter);
		$frm_cutoffdate->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_cutoffdate;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_cutoffdate->focal_person_office, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_cutoffdate->t_cutOffDate_remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_cutoffdate->a_cutOffDate_remarks, $Keyword);
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
		global $Security, $frm_cutoffdate;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_cutoffdate->BasicSearchKeyword;
		$sSearchType = $frm_cutoffdate->BasicSearchType;
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
			$frm_cutoffdate->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_cutoffdate->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_cutoffdate;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_cutoffdate->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_cutoffdate;
		$frm_cutoffdate->setSessionBasicSearchKeyword("");
		$frm_cutoffdate->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_cutoffdate;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_cutoffdate->BasicSearchKeyword = $frm_cutoffdate->getSessionBasicSearchKeyword();
			$frm_cutoffdate->BasicSearchType = $frm_cutoffdate->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_cutoffdate;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_cutoffdate->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_cutoffdate->CurrentOrderType = @$_GET["ordertype"];
			$frm_cutoffdate->UpdateSort($frm_cutoffdate->focal_person_office); // focal_person_office
			$frm_cutoffdate->UpdateSort($frm_cutoffdate->t_cutOffDate); // t_cutOffDate
			$frm_cutoffdate->UpdateSort($frm_cutoffdate->t_cutOffDate_fp); // t_cutOffDate_fp
			$frm_cutoffdate->UpdateSort($frm_cutoffdate->t_cutOffDate_remarks); // t_cutOffDate_remarks
			$frm_cutoffdate->UpdateSort($frm_cutoffdate->a_cutOffDate); // a_cutOffDate
			$frm_cutoffdate->UpdateSort($frm_cutoffdate->a_cutOffDate_fp); // a_cutOffDate_fp
			$frm_cutoffdate->UpdateSort($frm_cutoffdate->a_cutOffDate_remarks); // a_cutOffDate_remarks
			$frm_cutoffdate->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_cutoffdate;
		$sOrderBy = $frm_cutoffdate->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_cutoffdate->SqlOrderBy() <> "") {
				$sOrderBy = $frm_cutoffdate->SqlOrderBy();
				$frm_cutoffdate->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_cutoffdate;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_cutoffdate->setSessionOrderBy($sOrderBy);
				$frm_cutoffdate->focal_person_office->setSort("");
				$frm_cutoffdate->t_cutOffDate->setSort("");
				$frm_cutoffdate->t_cutOffDate_fp->setSort("");
				$frm_cutoffdate->t_cutOffDate_remarks->setSort("");
				$frm_cutoffdate->a_cutOffDate->setSort("");
				$frm_cutoffdate->a_cutOffDate_fp->setSort("");
				$frm_cutoffdate->a_cutOffDate_remarks->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_cutoffdate->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_cutoffdate;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"frm_cutoffdate_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_cutoffdate, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($frm_cutoffdate->cutOffDate_id->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_cutoffdate;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_cutoffdate;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_cutoffdate->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_cutoffdate->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_cutoffdate->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_cutoffdate->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_cutoffdate->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_cutoffdate->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_cutoffdate;
		$frm_cutoffdate->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_cutoffdate->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_cutoffdate;

		// Call Recordset Selecting event
		$frm_cutoffdate->Recordset_Selecting($frm_cutoffdate->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_cutoffdate->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_cutoffdate->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_cutoffdate;
		$sFilter = $frm_cutoffdate->KeyFilter();

		// Call Row Selecting event
		$frm_cutoffdate->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_cutoffdate->CurrentFilter = $sFilter;
		$sSql = $frm_cutoffdate->SQL();
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
		global $conn, $frm_cutoffdate;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_cutoffdate->Row_Selected($row);
		$frm_cutoffdate->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_cutoffdate->collection_id->setDbValue($rs->fields('collection_id'));
		$frm_cutoffdate->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_cutoffdate->focal_person_office->setDbValue($rs->fields('focal_person_office'));
		$frm_cutoffdate->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$frm_cutoffdate->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_cutoffdate->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_cutoffdate->a_cutOffDate->setDbValue($rs->fields('a_cutOffDate'));
		$frm_cutoffdate->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_cutoffdate->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_cutoffdate;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_cutoffdate->getKey("cutOffDate_id")) <> "")
			$frm_cutoffdate->cutOffDate_id->CurrentValue = $frm_cutoffdate->getKey("cutOffDate_id"); // cutOffDate_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_cutoffdate->CurrentFilter = $frm_cutoffdate->KeyFilter();
			$sSql = $frm_cutoffdate->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_cutoffdate;

		// Initialize URLs
		$this->ViewUrl = $frm_cutoffdate->ViewUrl();
		$this->EditUrl = $frm_cutoffdate->EditUrl();
		$this->InlineEditUrl = $frm_cutoffdate->InlineEditUrl();
		$this->CopyUrl = $frm_cutoffdate->CopyUrl();
		$this->InlineCopyUrl = $frm_cutoffdate->InlineCopyUrl();
		$this->DeleteUrl = $frm_cutoffdate->DeleteUrl();

		// Call Row_Rendering event
		$frm_cutoffdate->Row_Rendering();

		// Common render codes for all row types
		// cutOffDate_id

		$frm_cutoffdate->cutOffDate_id->CellCssStyle = "white-space: nowrap;";

		// collection_id
		$frm_cutoffdate->collection_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$frm_cutoffdate->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_office
		$frm_cutoffdate->focal_person_office->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate
		$frm_cutoffdate->t_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_fp
		// t_cutOffDate_remarks

		$frm_cutoffdate->t_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate
		$frm_cutoffdate->a_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate_fp
		// a_cutOffDate_remarks

		$frm_cutoffdate->a_cutOffDate_remarks->CellCssStyle = "white-space: nowrap;";
		if ($frm_cutoffdate->RowType == UP_ROWTYPE_VIEW) { // View row

			// cutOffDate_id
			$frm_cutoffdate->cutOffDate_id->ViewValue = $frm_cutoffdate->cutOffDate_id->CurrentValue;
			$frm_cutoffdate->cutOffDate_id->ViewCustomAttributes = "";

			// focal_person_id
			if (strval($frm_cutoffdate->focal_person_id->CurrentValue) <> "") {
				$sFilterWrk = "`focal_person_id` = " . up_AdjustSql($frm_cutoffdate->focal_person_id->CurrentValue) . "";
			$sSqlWrk = "SELECT `focal_person_office` FROM `tbl_cu_executive_offices`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$frm_cutoffdate->focal_person_id->ViewValue = $rswrk->fields('focal_person_office');
					$rswrk->Close();
				} else {
					$frm_cutoffdate->focal_person_id->ViewValue = $frm_cutoffdate->focal_person_id->CurrentValue;
				}
			} else {
				$frm_cutoffdate->focal_person_id->ViewValue = NULL;
			}
			$frm_cutoffdate->focal_person_id->ViewCustomAttributes = "";

			// focal_person_office
			$frm_cutoffdate->focal_person_office->ViewValue = $frm_cutoffdate->focal_person_office->CurrentValue;
			$frm_cutoffdate->focal_person_office->ViewCustomAttributes = "";

			// t_cutOffDate
			$frm_cutoffdate->t_cutOffDate->ViewValue = $frm_cutoffdate->t_cutOffDate->CurrentValue;
			$frm_cutoffdate->t_cutOffDate->ViewValue = up_FormatDateTime($frm_cutoffdate->t_cutOffDate->ViewValue, 6);
			$frm_cutoffdate->t_cutOffDate->ViewCustomAttributes = "";

			// t_cutOffDate_fp
			$frm_cutoffdate->t_cutOffDate_fp->ViewValue = $frm_cutoffdate->t_cutOffDate_fp->CurrentValue;
			$frm_cutoffdate->t_cutOffDate_fp->ViewValue = up_FormatDateTime($frm_cutoffdate->t_cutOffDate_fp->ViewValue, 6);
			$frm_cutoffdate->t_cutOffDate_fp->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_cutoffdate->t_cutOffDate_remarks->ViewValue = $frm_cutoffdate->t_cutOffDate_remarks->CurrentValue;
			$frm_cutoffdate->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// a_cutOffDate
			$frm_cutoffdate->a_cutOffDate->ViewValue = $frm_cutoffdate->a_cutOffDate->CurrentValue;
			$frm_cutoffdate->a_cutOffDate->ViewValue = up_FormatDateTime($frm_cutoffdate->a_cutOffDate->ViewValue, 6);
			$frm_cutoffdate->a_cutOffDate->ViewCustomAttributes = "";

			// a_cutOffDate_fp
			$frm_cutoffdate->a_cutOffDate_fp->ViewValue = $frm_cutoffdate->a_cutOffDate_fp->CurrentValue;
			$frm_cutoffdate->a_cutOffDate_fp->ViewValue = up_FormatDateTime($frm_cutoffdate->a_cutOffDate_fp->ViewValue, 6);
			$frm_cutoffdate->a_cutOffDate_fp->ViewCustomAttributes = "";

			// a_cutOffDate_remarks
			$frm_cutoffdate->a_cutOffDate_remarks->ViewValue = $frm_cutoffdate->a_cutOffDate_remarks->CurrentValue;
			$frm_cutoffdate->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// focal_person_office
			$frm_cutoffdate->focal_person_office->LinkCustomAttributes = "";
			$frm_cutoffdate->focal_person_office->HrefValue = "";
			$frm_cutoffdate->focal_person_office->TooltipValue = "";

			// t_cutOffDate
			$frm_cutoffdate->t_cutOffDate->LinkCustomAttributes = "";
			$frm_cutoffdate->t_cutOffDate->HrefValue = "";
			$frm_cutoffdate->t_cutOffDate->TooltipValue = "";

			// t_cutOffDate_fp
			$frm_cutoffdate->t_cutOffDate_fp->LinkCustomAttributes = "";
			$frm_cutoffdate->t_cutOffDate_fp->HrefValue = "";
			$frm_cutoffdate->t_cutOffDate_fp->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_cutoffdate->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_cutoffdate->t_cutOffDate_remarks->HrefValue = "";
			$frm_cutoffdate->t_cutOffDate_remarks->TooltipValue = "";

			// a_cutOffDate
			$frm_cutoffdate->a_cutOffDate->LinkCustomAttributes = "";
			$frm_cutoffdate->a_cutOffDate->HrefValue = "";
			$frm_cutoffdate->a_cutOffDate->TooltipValue = "";

			// a_cutOffDate_fp
			$frm_cutoffdate->a_cutOffDate_fp->LinkCustomAttributes = "";
			$frm_cutoffdate->a_cutOffDate_fp->HrefValue = "";
			$frm_cutoffdate->a_cutOffDate_fp->TooltipValue = "";

			// a_cutOffDate_remarks
			$frm_cutoffdate->a_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_cutoffdate->a_cutOffDate_remarks->HrefValue = "";
			$frm_cutoffdate->a_cutOffDate_remarks->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_cutoffdate->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_cutoffdate->Row_Rendered();
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
