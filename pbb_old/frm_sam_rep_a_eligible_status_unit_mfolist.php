<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_sam_rep_a_eligible_status_unit_mfoinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_sam_rep_a_eligible_status_unit_mfo_list = new cfrm_sam_rep_a_eligible_status_unit_mfo_list();
$Page =& $frm_sam_rep_a_eligible_status_unit_mfo_list;

// Page init
$frm_sam_rep_a_eligible_status_unit_mfo_list->Page_Init();

// Page main
$frm_sam_rep_a_eligible_status_unit_mfo_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_rep_a_eligible_status_unit_mfo_list = new up_Page("frm_sam_rep_a_eligible_status_unit_mfo_list");

// page properties
frm_sam_rep_a_eligible_status_unit_mfo_list.PageID = "list"; // page ID
frm_sam_rep_a_eligible_status_unit_mfo_list.FormID = "ffrm_sam_rep_a_eligible_status_unit_mfolist"; // form ID
var UP_PAGE_ID = frm_sam_rep_a_eligible_status_unit_mfo_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_sam_rep_a_eligible_status_unit_mfo_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_rep_a_eligible_status_unit_mfo_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_rep_a_eligible_status_unit_mfo_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_rep_a_eligible_status_unit_mfo_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_sam_rep_a_eligible_status_unit_mfo->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_sam_rep_a_eligible_status_unit_mfo->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_sam_rep_a_eligible_status_unit_mfo_list->TotalRecs = $frm_sam_rep_a_eligible_status_unit_mfo->SelectRecordCount();
	} else {
		if ($frm_sam_rep_a_eligible_status_unit_mfo_list->Recordset = $frm_sam_rep_a_eligible_status_unit_mfo_list->LoadRecordset())
			$frm_sam_rep_a_eligible_status_unit_mfo_list->TotalRecs = $frm_sam_rep_a_eligible_status_unit_mfo_list->Recordset->RecordCount();
	}
	$frm_sam_rep_a_eligible_status_unit_mfo_list->StartRec = 1;
	if ($frm_sam_rep_a_eligible_status_unit_mfo_list->DisplayRecs <= 0 || ($frm_sam_rep_a_eligible_status_unit_mfo->Export <> "" && $frm_sam_rep_a_eligible_status_unit_mfo->ExportAll)) // Display all records
		$frm_sam_rep_a_eligible_status_unit_mfo_list->DisplayRecs = $frm_sam_rep_a_eligible_status_unit_mfo_list->TotalRecs;
	if (!($frm_sam_rep_a_eligible_status_unit_mfo->Export <> "" && $frm_sam_rep_a_eligible_status_unit_mfo->ExportAll))
		$frm_sam_rep_a_eligible_status_unit_mfo_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_sam_rep_a_eligible_status_unit_mfo_list->Recordset = $frm_sam_rep_a_eligible_status_unit_mfo_list->LoadRecordset($frm_sam_rep_a_eligible_status_unit_mfo_list->StartRec-1, $frm_sam_rep_a_eligible_status_unit_mfo_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_sam_rep_a_eligible_status_unit_mfo_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Export == "" && $frm_sam_rep_a_eligible_status_unit_mfo->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_sam_rep_a_eligible_status_unit_mfo_list);" style="text-decoration: none;"><img id="frm_sam_rep_a_eligible_status_unit_mfo_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_sam_rep_a_eligible_status_unit_mfo_list_SearchPanel">
<form name="ffrm_sam_rep_a_eligible_status_unit_mfolistsrch" id="ffrm_sam_rep_a_eligible_status_unit_mfolistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_sam_rep_a_eligible_status_unit_mfo">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_sam_rep_a_eligible_status_unit_mfo->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_sam_rep_a_eligible_status_unit_mfo_list->ShowPageHeader(); ?>
<?php
$frm_sam_rep_a_eligible_status_unit_mfo_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->CurrentAction <> "gridadd" && $frm_sam_rep_a_eligible_status_unit_mfo->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_sam_rep_a_eligible_status_unit_mfo_list->Pager)) $frm_sam_rep_a_eligible_status_unit_mfo_list->Pager = new cPrevNextPager($frm_sam_rep_a_eligible_status_unit_mfo_list->StartRec, $frm_sam_rep_a_eligible_status_unit_mfo_list->DisplayRecs, $frm_sam_rep_a_eligible_status_unit_mfo_list->TotalRecs) ?>
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->PageUrl() ?>start=<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->PageUrl() ?>start=<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->PageUrl() ?>start=<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->PageUrl() ?>start=<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo_list->SearchWhere == "0=101") { ?>
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
<form name="ffrm_sam_rep_a_eligible_status_unit_mfolist" id="ffrm_sam_rep_a_eligible_status_unit_mfolist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_sam_rep_a_eligible_status_unit_mfo">
<div id="gmp_frm_sam_rep_a_eligible_status_unit_mfo" class="upGridMiddlePanel">
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_sam_rep_a_eligible_status_unit_mfo_list->RenderListOptions();

// Render list options (header, left)
$frm_sam_rep_a_eligible_status_unit_mfo_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->Visible) { // focal_person_id ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->Visible) { // cu_short_name ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->Visible) { // cu_sequence ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->units_id->Visible) { // units_id ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->units_id) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->units_id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->units_id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->units_id->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->units_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->units_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->Visible) { // cu_unit_name ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->mfo->Visible) { // mfo ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->mfo) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->mfo->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->mfo) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->mfo->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->mfo->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->mfo->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->Visible) { // mfo_name_rep ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->Visible) { // Participated PI ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->Visible) { // Not Started PI ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->Visible) { // % Not Started PI ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Status->Visible) { // Status ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->Status) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Status->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->Status) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Status->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Status->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->Status->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->Visible) { // Not Eligible PI Count ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->Visible) { // % Not Eligible PI Count ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->Visible) { // Eligible PI Count ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->Visible) { // % Eligible PI Count ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Remarks->Visible) { // Remarks ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->Remarks) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->Remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->budget->Visible) { // budget ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->budget) == "") { ?>
		<td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->budget->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->SortUrl($frm_sam_rep_a_eligible_status_unit_mfo->budget) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->budget->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_eligible_status_unit_mfo->budget->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_eligible_status_unit_mfo->budget->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_sam_rep_a_eligible_status_unit_mfo_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_sam_rep_a_eligible_status_unit_mfo->ExportAll && $frm_sam_rep_a_eligible_status_unit_mfo->Export <> "") {
	$frm_sam_rep_a_eligible_status_unit_mfo_list->StopRec = $frm_sam_rep_a_eligible_status_unit_mfo_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_sam_rep_a_eligible_status_unit_mfo_list->TotalRecs > $frm_sam_rep_a_eligible_status_unit_mfo_list->StartRec + $frm_sam_rep_a_eligible_status_unit_mfo_list->DisplayRecs - 1)
		$frm_sam_rep_a_eligible_status_unit_mfo_list->StopRec = $frm_sam_rep_a_eligible_status_unit_mfo_list->StartRec + $frm_sam_rep_a_eligible_status_unit_mfo_list->DisplayRecs - 1;
	else
		$frm_sam_rep_a_eligible_status_unit_mfo_list->StopRec = $frm_sam_rep_a_eligible_status_unit_mfo_list->TotalRecs;
}
$frm_sam_rep_a_eligible_status_unit_mfo_list->RecCnt = $frm_sam_rep_a_eligible_status_unit_mfo_list->StartRec - 1;
if ($frm_sam_rep_a_eligible_status_unit_mfo_list->Recordset && !$frm_sam_rep_a_eligible_status_unit_mfo_list->Recordset->EOF) {
	$frm_sam_rep_a_eligible_status_unit_mfo_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_sam_rep_a_eligible_status_unit_mfo_list->StartRec > 1)
		$frm_sam_rep_a_eligible_status_unit_mfo_list->Recordset->Move($frm_sam_rep_a_eligible_status_unit_mfo_list->StartRec - 1);
} elseif (!$frm_sam_rep_a_eligible_status_unit_mfo->AllowAddDeleteRow && $frm_sam_rep_a_eligible_status_unit_mfo_list->StopRec == 0) {
	$frm_sam_rep_a_eligible_status_unit_mfo_list->StopRec = $frm_sam_rep_a_eligible_status_unit_mfo->GridAddRowCount;
}

// Initialize aggregate
$frm_sam_rep_a_eligible_status_unit_mfo->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_sam_rep_a_eligible_status_unit_mfo->ResetAttrs();
$frm_sam_rep_a_eligible_status_unit_mfo_list->RenderRow();
$frm_sam_rep_a_eligible_status_unit_mfo_list->RowCnt = 0;
while ($frm_sam_rep_a_eligible_status_unit_mfo_list->RecCnt < $frm_sam_rep_a_eligible_status_unit_mfo_list->StopRec) {
	$frm_sam_rep_a_eligible_status_unit_mfo_list->RecCnt++;
	if (intval($frm_sam_rep_a_eligible_status_unit_mfo_list->RecCnt) >= intval($frm_sam_rep_a_eligible_status_unit_mfo_list->StartRec)) {
		$frm_sam_rep_a_eligible_status_unit_mfo_list->RowCnt++;

		// Set up key count
		$frm_sam_rep_a_eligible_status_unit_mfo_list->KeyCount = $frm_sam_rep_a_eligible_status_unit_mfo_list->RowIndex;

		// Init row class and style
		$frm_sam_rep_a_eligible_status_unit_mfo->ResetAttrs();
		$frm_sam_rep_a_eligible_status_unit_mfo->CssClass = "";
		if ($frm_sam_rep_a_eligible_status_unit_mfo->CurrentAction == "gridadd") {
		} else {
			$frm_sam_rep_a_eligible_status_unit_mfo_list->LoadRowValues($frm_sam_rep_a_eligible_status_unit_mfo_list->Recordset); // Load row values
		}
		$frm_sam_rep_a_eligible_status_unit_mfo->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_sam_rep_a_eligible_status_unit_mfo->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_sam_rep_a_eligible_status_unit_mfo_list->RenderRow();

		// Render list options
		$frm_sam_rep_a_eligible_status_unit_mfo_list->RenderListOptions();
?>
	<tr<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_sam_rep_a_eligible_status_unit_mfo_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->Visible) { // focal_person_id ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->ListViewValue() ?></div>
<a name="<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->PageObjName . "_row_" . $frm_sam_rep_a_eligible_status_unit_mfo_list->RowCnt ?>" id="<?php echo $frm_sam_rep_a_eligible_status_unit_mfo_list->PageObjName . "_row_" . $frm_sam_rep_a_eligible_status_unit_mfo_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->Visible) { // cu_short_name ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->Visible) { // cu_sequence ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->units_id->Visible) { // units_id ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->units_id->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->units_id->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->units_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->Visible) { // cu_unit_name ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->mfo->Visible) { // mfo ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->mfo->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->mfo->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->mfo->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->Visible) { // mfo_name_rep ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->Visible) { // Participated PI ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->Visible) { // Not Started PI ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->Visible) { // % Not Started PI ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Status->Visible) { // Status ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Status->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Status->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Status->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->Visible) { // Not Eligible PI Count ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->Visible) { // % Not Eligible PI Count ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->Visible) { // Eligible PI Count ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->Visible) { // % Eligible PI Count ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Remarks->Visible) { // Remarks ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Remarks->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Remarks->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->Remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->budget->Visible) { // budget ?>
		<td<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->budget->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_eligible_status_unit_mfo->budget->ViewAttributes() ?>><?php echo $frm_sam_rep_a_eligible_status_unit_mfo->budget->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_sam_rep_a_eligible_status_unit_mfo_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_sam_rep_a_eligible_status_unit_mfo->CurrentAction <> "gridadd")
		$frm_sam_rep_a_eligible_status_unit_mfo_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_sam_rep_a_eligible_status_unit_mfo_list->Recordset)
	$frm_sam_rep_a_eligible_status_unit_mfo_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Export == "" && $frm_sam_rep_a_eligible_status_unit_mfo->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_sam_rep_a_eligible_status_unit_mfo_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_sam_rep_a_eligible_status_unit_mfo->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_sam_rep_a_eligible_status_unit_mfo_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_rep_a_eligible_status_unit_mfo_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_sam_rep_a_eligible_status_unit_mfo';

	// Page object name
	var $PageObjName = 'frm_sam_rep_a_eligible_status_unit_mfo_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_rep_a_eligible_status_unit_mfo;
		if ($frm_sam_rep_a_eligible_status_unit_mfo->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_rep_a_eligible_status_unit_mfo->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_rep_a_eligible_status_unit_mfo;
		if ($frm_sam_rep_a_eligible_status_unit_mfo->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_rep_a_eligible_status_unit_mfo->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_rep_a_eligible_status_unit_mfo->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_rep_a_eligible_status_unit_mfo_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_rep_a_eligible_status_unit_mfo)
		if (!isset($GLOBALS["frm_sam_rep_a_eligible_status_unit_mfo"])) {
			$GLOBALS["frm_sam_rep_a_eligible_status_unit_mfo"] = new cfrm_sam_rep_a_eligible_status_unit_mfo();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_rep_a_eligible_status_unit_mfo"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_sam_rep_a_eligible_status_unit_mfoadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_sam_rep_a_eligible_status_unit_mfodelete.php";
		$this->MultiUpdateUrl = "frm_sam_rep_a_eligible_status_unit_mfoupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_rep_a_eligible_status_unit_mfo', TRUE);

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
		global $frm_sam_rep_a_eligible_status_unit_mfo;

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
			$frm_sam_rep_a_eligible_status_unit_mfo->Export = $_GET["export"];
		} elseif (up_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$frm_sam_rep_a_eligible_status_unit_mfo->Export = $_POST["exporttype"];
		} else {
			$frm_sam_rep_a_eligible_status_unit_mfo->setExportReturnUrl(up_CurrentUrl());
		}
		$gsExport = $frm_sam_rep_a_eligible_status_unit_mfo->Export; // Get export parameter, used in header
		$gsExportFile = $frm_sam_rep_a_eligible_status_unit_mfo->TableVar; // Get export file, used in header
		$Charset = (UP_CHARSET <> "") ? ";charset=" . UP_CHARSET : ""; // Charset used in header
		if ($frm_sam_rep_a_eligible_status_unit_mfo->Export == "csv") {
			header('Content-Type: application/csv' . $Charset);
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_sam_rep_a_eligible_status_unit_mfo->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_sam_rep_a_eligible_status_unit_mfo;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($frm_sam_rep_a_eligible_status_unit_mfo->Export <> "" ||
				$frm_sam_rep_a_eligible_status_unit_mfo->CurrentAction == "gridadd" ||
				$frm_sam_rep_a_eligible_status_unit_mfo->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_sam_rep_a_eligible_status_unit_mfo->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_sam_rep_a_eligible_status_unit_mfo->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_sam_rep_a_eligible_status_unit_mfo->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_sam_rep_a_eligible_status_unit_mfo->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_sam_rep_a_eligible_status_unit_mfo->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_sam_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_sam_rep_a_eligible_status_unit_mfo->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$frm_sam_rep_a_eligible_status_unit_mfo->setSessionWhere($sFilter);
		$frm_sam_rep_a_eligible_status_unit_mfo->CurrentFilter = "";

		// Export data only
		if (in_array($frm_sam_rep_a_eligible_status_unit_mfo->Export, array("html","word","excel","xml","csv","email","pdf"))) {
			$this->ExportData();
			if ($frm_sam_rep_a_eligible_status_unit_mfo->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_sam_rep_a_eligible_status_unit_mfo;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_sam_rep_a_eligible_status_unit_mfo->Status, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_sam_rep_a_eligible_status_unit_mfo->Remarks, $Keyword);
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
		global $Security, $frm_sam_rep_a_eligible_status_unit_mfo;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_sam_rep_a_eligible_status_unit_mfo->BasicSearchKeyword;
		$sSearchType = $frm_sam_rep_a_eligible_status_unit_mfo->BasicSearchType;
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
			$frm_sam_rep_a_eligible_status_unit_mfo->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_sam_rep_a_eligible_status_unit_mfo->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_sam_rep_a_eligible_status_unit_mfo;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_sam_rep_a_eligible_status_unit_mfo->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_sam_rep_a_eligible_status_unit_mfo;
		$frm_sam_rep_a_eligible_status_unit_mfo->setSessionBasicSearchKeyword("");
		$frm_sam_rep_a_eligible_status_unit_mfo->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_sam_rep_a_eligible_status_unit_mfo;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_sam_rep_a_eligible_status_unit_mfo->BasicSearchKeyword = $frm_sam_rep_a_eligible_status_unit_mfo->getSessionBasicSearchKeyword();
			$frm_sam_rep_a_eligible_status_unit_mfo->BasicSearchType = $frm_sam_rep_a_eligible_status_unit_mfo->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_sam_rep_a_eligible_status_unit_mfo;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_sam_rep_a_eligible_status_unit_mfo->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_sam_rep_a_eligible_status_unit_mfo->CurrentOrderType = @$_GET["ordertype"];
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id); // focal_person_id
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name); // cu_short_name
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence); // cu_sequence
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->units_id); // units_id
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name); // cu_unit_name
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->mfo); // mfo
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep); // mfo_name_rep
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI); // Participated PI
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI); // Not Started PI
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI); // % Not Started PI
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->Status); // Status
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count); // Not Eligible PI Count
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count); // % Not Eligible PI Count
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count); // Eligible PI Count
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count); // % Eligible PI Count
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->Remarks); // Remarks
			$frm_sam_rep_a_eligible_status_unit_mfo->UpdateSort($frm_sam_rep_a_eligible_status_unit_mfo->budget); // budget
			$frm_sam_rep_a_eligible_status_unit_mfo->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_sam_rep_a_eligible_status_unit_mfo;
		$sOrderBy = $frm_sam_rep_a_eligible_status_unit_mfo->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_sam_rep_a_eligible_status_unit_mfo->SqlOrderBy() <> "") {
				$sOrderBy = $frm_sam_rep_a_eligible_status_unit_mfo->SqlOrderBy();
				$frm_sam_rep_a_eligible_status_unit_mfo->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_sam_rep_a_eligible_status_unit_mfo;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_sam_rep_a_eligible_status_unit_mfo->setSessionOrderBy($sOrderBy);
				$frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->units_id->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->mfo->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->Status->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->Remarks->setSort("");
				$frm_sam_rep_a_eligible_status_unit_mfo->budget->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_sam_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_sam_rep_a_eligible_status_unit_mfo;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_sam_rep_a_eligible_status_unit_mfo, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_sam_rep_a_eligible_status_unit_mfo;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_sam_rep_a_eligible_status_unit_mfo;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_sam_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_sam_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_sam_rep_a_eligible_status_unit_mfo->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_sam_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_sam_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_sam_rep_a_eligible_status_unit_mfo->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_sam_rep_a_eligible_status_unit_mfo;
		$frm_sam_rep_a_eligible_status_unit_mfo->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_sam_rep_a_eligible_status_unit_mfo->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_sam_rep_a_eligible_status_unit_mfo;

		// Call Recordset Selecting event
		$frm_sam_rep_a_eligible_status_unit_mfo->Recordset_Selecting($frm_sam_rep_a_eligible_status_unit_mfo->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_sam_rep_a_eligible_status_unit_mfo->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_sam_rep_a_eligible_status_unit_mfo->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_rep_a_eligible_status_unit_mfo;
		$sFilter = $frm_sam_rep_a_eligible_status_unit_mfo->KeyFilter();

		// Call Row Selecting event
		$frm_sam_rep_a_eligible_status_unit_mfo->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_rep_a_eligible_status_unit_mfo->CurrentFilter = $sFilter;
		$sSql = $frm_sam_rep_a_eligible_status_unit_mfo->SQL();
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
		global $conn, $frm_sam_rep_a_eligible_status_unit_mfo;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_rep_a_eligible_status_unit_mfo->Row_Selected($row);
		$frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_sam_rep_a_eligible_status_unit_mfo->units_id->setDbValue($rs->fields('units_id'));
		$frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_sam_rep_a_eligible_status_unit_mfo->mfo->setDbValue($rs->fields('mfo'));
		$frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->setDbValue($rs->fields('Participated PI'));
		$frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->setDbValue($rs->fields('Not Started PI'));
		$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->setDbValue($rs->fields('% Not Started PI'));
		$frm_sam_rep_a_eligible_status_unit_mfo->Status->setDbValue($rs->fields('Status'));
		$frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->setDbValue($rs->fields('Not Eligible PI Count'));
		$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->setDbValue($rs->fields('% Not Eligible PI Count'));
		$frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->setDbValue($rs->fields('Eligible PI Count'));
		$frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->setDbValue($rs->fields('% Eligible PI Count'));
		$frm_sam_rep_a_eligible_status_unit_mfo->Remarks->setDbValue($rs->fields('Remarks'));
		$frm_sam_rep_a_eligible_status_unit_mfo->budget->setDbValue($rs->fields('budget'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_sam_rep_a_eligible_status_unit_mfo;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$frm_sam_rep_a_eligible_status_unit_mfo->CurrentFilter = $frm_sam_rep_a_eligible_status_unit_mfo->KeyFilter();
			$sSql = $frm_sam_rep_a_eligible_status_unit_mfo->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_rep_a_eligible_status_unit_mfo;

		// Initialize URLs
		$this->ViewUrl = $frm_sam_rep_a_eligible_status_unit_mfo->ViewUrl();
		$this->EditUrl = $frm_sam_rep_a_eligible_status_unit_mfo->EditUrl();
		$this->InlineEditUrl = $frm_sam_rep_a_eligible_status_unit_mfo->InlineEditUrl();
		$this->CopyUrl = $frm_sam_rep_a_eligible_status_unit_mfo->CopyUrl();
		$this->InlineCopyUrl = $frm_sam_rep_a_eligible_status_unit_mfo->InlineCopyUrl();
		$this->DeleteUrl = $frm_sam_rep_a_eligible_status_unit_mfo->DeleteUrl();

		// Call Row_Rendering event
		$frm_sam_rep_a_eligible_status_unit_mfo->Row_Rendering();

		// Common render codes for all row types
		// focal_person_id

		$frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// cu_short_name
		$frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->CellCssStyle = "white-space: nowrap;";

		// cu_sequence
		$frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->CellCssStyle = "white-space: nowrap;";

		// units_id
		$frm_sam_rep_a_eligible_status_unit_mfo->units_id->CellCssStyle = "white-space: nowrap;";

		// cu_unit_name
		$frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->CellCssStyle = "white-space: nowrap;";

		// mfo
		$frm_sam_rep_a_eligible_status_unit_mfo->mfo->CellCssStyle = "white-space: nowrap;";

		// mfo_name_rep
		$frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->CellCssStyle = "white-space: nowrap;";

		// Participated PI
		$frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->CellCssStyle = "white-space: nowrap;";

		// Not Started PI
		$frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->CellCssStyle = "white-space: nowrap;";

		// % Not Started PI
		$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CellCssStyle = "white-space: nowrap;";

		// Status
		$frm_sam_rep_a_eligible_status_unit_mfo->Status->CellCssStyle = "white-space: nowrap;";

		// Not Eligible PI Count
		$frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CellCssStyle = "white-space: nowrap;";

		// % Not Eligible PI Count
		$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CellCssStyle = "white-space: nowrap;";

		// Eligible PI Count
		$frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CellCssStyle = "white-space: nowrap;";

		// % Eligible PI Count
		$frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CellCssStyle = "white-space: nowrap;";

		// Remarks
		$frm_sam_rep_a_eligible_status_unit_mfo->Remarks->CellCssStyle = "white-space: nowrap;";

		// budget
		if ($frm_sam_rep_a_eligible_status_unit_mfo->RowType == UP_ROWTYPE_VIEW) { // View row

			// focal_person_id
			$frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->ViewCustomAttributes = "";

			// cu_short_name
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->ViewCustomAttributes = "";

			// cu_sequence
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->ViewCustomAttributes = "";

			// units_id
			$frm_sam_rep_a_eligible_status_unit_mfo->units_id->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->units_id->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->units_id->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->ViewCustomAttributes = "";

			// mfo
			$frm_sam_rep_a_eligible_status_unit_mfo->mfo->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->mfo->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->mfo->ViewCustomAttributes = "";

			// mfo_name_rep
			$frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->ViewCustomAttributes = "";

			// Participated PI
			$frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->ViewCustomAttributes = "";

			// Not Started PI
			$frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->ViewCustomAttributes = "";

			// % Not Started PI
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ViewCustomAttributes = "";

			// Status
			$frm_sam_rep_a_eligible_status_unit_mfo->Status->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->Status->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->Status->ViewCustomAttributes = "";

			// Not Eligible PI Count
			$frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ViewCustomAttributes = "";

			// % Not Eligible PI Count
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ViewCustomAttributes = "";

			// Eligible PI Count
			$frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ViewCustomAttributes = "";

			// % Eligible PI Count
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ViewCustomAttributes = "";

			// Remarks
			$frm_sam_rep_a_eligible_status_unit_mfo->Remarks->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->Remarks->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->Remarks->ViewCustomAttributes = "";

			// budget
			$frm_sam_rep_a_eligible_status_unit_mfo->budget->ViewValue = $frm_sam_rep_a_eligible_status_unit_mfo->budget->CurrentValue;
			$frm_sam_rep_a_eligible_status_unit_mfo->budget->ViewCustomAttributes = "";

			// focal_person_id
			$frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->focal_person_id->TooltipValue = "";

			// cu_short_name
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_short_name->TooltipValue = "";

			// cu_sequence
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_sequence->TooltipValue = "";

			// units_id
			$frm_sam_rep_a_eligible_status_unit_mfo->units_id->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->units_id->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->units_id->TooltipValue = "";

			// cu_unit_name
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->cu_unit_name->TooltipValue = "";

			// mfo
			$frm_sam_rep_a_eligible_status_unit_mfo->mfo->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->mfo->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->mfo->TooltipValue = "";

			// mfo_name_rep
			$frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->mfo_name_rep->TooltipValue = "";

			// Participated PI
			$frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->Participated_PI->TooltipValue = "";

			// Not Started PI
			$frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->Not_Started_PI->TooltipValue = "";

			// % Not Started PI
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->TooltipValue = "";

			// Status
			$frm_sam_rep_a_eligible_status_unit_mfo->Status->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->Status->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->Status->TooltipValue = "";

			// Not Eligible PI Count
			$frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->TooltipValue = "";

			// % Not Eligible PI Count
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->TooltipValue = "";

			// Eligible PI Count
			$frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->TooltipValue = "";

			// % Eligible PI Count
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->TooltipValue = "";

			// Remarks
			$frm_sam_rep_a_eligible_status_unit_mfo->Remarks->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->Remarks->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->Remarks->TooltipValue = "";

			// budget
			$frm_sam_rep_a_eligible_status_unit_mfo->budget->LinkCustomAttributes = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->budget->HrefValue = "";
			$frm_sam_rep_a_eligible_status_unit_mfo->budget->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_sam_rep_a_eligible_status_unit_mfo->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_rep_a_eligible_status_unit_mfo->Row_Rendered();
	}

	// Set up export options
	function SetupExportOptions() {
		global $Language, $frm_sam_rep_a_eligible_status_unit_mfo;

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
		$item->Body = "<a name=\"emf_frm_sam_rep_a_eligible_status_unit_mfo\" id=\"emf_frm_sam_rep_a_eligible_status_unit_mfo\" href=\"javascript:void(0);\" onclick=\"up_EmailDialogShow({lnk:'emf_frm_sam_rep_a_eligible_status_unit_mfo',hdr:upLanguage.Phrase('ExportToEmail'),f:document.ffrm_sam_rep_a_eligible_status_unit_mfolist,sel:false});\">" . $Language->Phrase("ExportToEmail") . "</a>";
		$item->Visible = FALSE;

		// Hide options for export/action
		if ($frm_sam_rep_a_eligible_status_unit_mfo->Export <> "" ||
			$frm_sam_rep_a_eligible_status_unit_mfo->CurrentAction <> "")
			$this->ExportOptions->HideAllOptions();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	function ExportData() {
		global $frm_sam_rep_a_eligible_status_unit_mfo;
		$utf8 = (strtolower(UP_CHARSET) == "utf-8");
		$bSelectLimit = UP_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->TotalRecs = $frm_sam_rep_a_eligible_status_unit_mfo->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;

		// Export all
		if ($frm_sam_rep_a_eligible_status_unit_mfo->ExportAll) {
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
		if ($frm_sam_rep_a_eligible_status_unit_mfo->Export == "xml") {
			$XmlDoc = new cXMLDocument(UP_XML_ENCODING);
		} else {
			$ExportDoc = new cExportDocument($frm_sam_rep_a_eligible_status_unit_mfo, "h");
		}
		$ParentTable = "";
		if ($bSelectLimit) {
			$StartRec = 1;
			$StopRec = $this->DisplayRecs;
		} else {
			$StartRec = $this->StartRec;
			$StopRec = $this->StopRec;
		}
		if ($frm_sam_rep_a_eligible_status_unit_mfo->Export == "xml") {
			$frm_sam_rep_a_eligible_status_unit_mfo->ExportXmlDocument($XmlDoc, ($ParentTable <> ""), $rs, $StartRec, $StopRec, "");
		} else {
			$sHeader = $this->PageHeader;
			$this->Page_DataRendering($sHeader);
			$ExportDoc->Text .= $sHeader;
			$frm_sam_rep_a_eligible_status_unit_mfo->ExportDocument($ExportDoc, $rs, $StartRec, $StopRec, "");
			$sFooter = $this->PageFooter;
			$this->Page_DataRendered($sFooter);
			$ExportDoc->Text .= $sFooter;
		}

		// Close recordset
		$rs->Close();

		// Export header and footer
		if ($frm_sam_rep_a_eligible_status_unit_mfo->Export <> "xml") {
			$ExportDoc->ExportHeaderAndFooter();
		}

		// Clean output buffer
		if (!UP_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($frm_sam_rep_a_eligible_status_unit_mfo->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (UP_DEBUG_ENABLED)
			echo up_DebugMsg();

		// Output data
		if ($frm_sam_rep_a_eligible_status_unit_mfo->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($frm_sam_rep_a_eligible_status_unit_mfo->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($frm_sam_rep_a_eligible_status_unit_mfo->ExportReturnUrl());
		} elseif ($frm_sam_rep_a_eligible_status_unit_mfo->Export == "pdf") {
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
