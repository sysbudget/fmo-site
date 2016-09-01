<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_fp_pbb_detail_accomplishmentinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_fp_pbb_detail_accomplishment_list = new cfrm_fp_pbb_detail_accomplishment_list();
$Page =& $frm_fp_pbb_detail_accomplishment_list;

// Page init
$frm_fp_pbb_detail_accomplishment_list->Page_Init();

// Page main
$frm_fp_pbb_detail_accomplishment_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_fp_pbb_detail_accomplishment->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_pbb_detail_accomplishment_list = new up_Page("frm_fp_pbb_detail_accomplishment_list");

// page properties
frm_fp_pbb_detail_accomplishment_list.PageID = "list"; // page ID
frm_fp_pbb_detail_accomplishment_list.FormID = "ffrm_fp_pbb_detail_accomplishmentlist"; // form ID
var UP_PAGE_ID = frm_fp_pbb_detail_accomplishment_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_fp_pbb_detail_accomplishment_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_pbb_detail_accomplishment_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_pbb_detail_accomplishment_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_pbb_detail_accomplishment_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_fp_pbb_detail_accomplishment->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_fp_pbb_detail_accomplishment->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_fp_pbb_detail_accomplishment_list->TotalRecs = $frm_fp_pbb_detail_accomplishment->SelectRecordCount();
	} else {
		if ($frm_fp_pbb_detail_accomplishment_list->Recordset = $frm_fp_pbb_detail_accomplishment_list->LoadRecordset())
			$frm_fp_pbb_detail_accomplishment_list->TotalRecs = $frm_fp_pbb_detail_accomplishment_list->Recordset->RecordCount();
	}
	$frm_fp_pbb_detail_accomplishment_list->StartRec = 1;
	if ($frm_fp_pbb_detail_accomplishment_list->DisplayRecs <= 0 || ($frm_fp_pbb_detail_accomplishment->Export <> "" && $frm_fp_pbb_detail_accomplishment->ExportAll)) // Display all records
		$frm_fp_pbb_detail_accomplishment_list->DisplayRecs = $frm_fp_pbb_detail_accomplishment_list->TotalRecs;
	if (!($frm_fp_pbb_detail_accomplishment->Export <> "" && $frm_fp_pbb_detail_accomplishment->ExportAll))
		$frm_fp_pbb_detail_accomplishment_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_fp_pbb_detail_accomplishment_list->Recordset = $frm_fp_pbb_detail_accomplishment_list->LoadRecordset($frm_fp_pbb_detail_accomplishment_list->StartRec-1, $frm_fp_pbb_detail_accomplishment_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_pbb_detail_accomplishment->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_fp_pbb_detail_accomplishment_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_fp_pbb_detail_accomplishment->Export == "" && $frm_fp_pbb_detail_accomplishment->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_fp_pbb_detail_accomplishment_list);" style="text-decoration: none;"><img id="frm_fp_pbb_detail_accomplishment_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_fp_pbb_detail_accomplishment_list_SearchPanel">
<form name="ffrm_fp_pbb_detail_accomplishmentlistsrch" id="ffrm_fp_pbb_detail_accomplishmentlistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_fp_pbb_detail_accomplishment">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_fp_pbb_detail_accomplishment_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_fp_pbb_detail_accomplishment->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_fp_pbb_detail_accomplishment->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_fp_pbb_detail_accomplishment->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_fp_pbb_detail_accomplishment_list->ShowPageHeader(); ?>
<?php
$frm_fp_pbb_detail_accomplishment_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_fp_pbb_detail_accomplishment->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "gridadd" && $frm_fp_pbb_detail_accomplishment->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_fp_pbb_detail_accomplishment_list->Pager)) $frm_fp_pbb_detail_accomplishment_list->Pager = new cPrevNextPager($frm_fp_pbb_detail_accomplishment_list->StartRec, $frm_fp_pbb_detail_accomplishment_list->DisplayRecs, $frm_fp_pbb_detail_accomplishment_list->TotalRecs) ?>
<?php if ($frm_fp_pbb_detail_accomplishment_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_fp_pbb_detail_accomplishment_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_pbb_detail_accomplishment_list->PageUrl() ?>start=<?php echo $frm_fp_pbb_detail_accomplishment_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_fp_pbb_detail_accomplishment_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_pbb_detail_accomplishment_list->PageUrl() ?>start=<?php echo $frm_fp_pbb_detail_accomplishment_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_fp_pbb_detail_accomplishment_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_fp_pbb_detail_accomplishment_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_pbb_detail_accomplishment_list->PageUrl() ?>start=<?php echo $frm_fp_pbb_detail_accomplishment_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_fp_pbb_detail_accomplishment_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_pbb_detail_accomplishment_list->PageUrl() ?>start=<?php echo $frm_fp_pbb_detail_accomplishment_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_fp_pbb_detail_accomplishment_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_fp_pbb_detail_accomplishment_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_fp_pbb_detail_accomplishment_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_fp_pbb_detail_accomplishment_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_fp_pbb_detail_accomplishment_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $frm_fp_pbb_detail_accomplishment_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ffrm_fp_pbb_detail_accomplishmentlist, '<?php echo $frm_fp_pbb_detail_accomplishment_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ffrm_fp_pbb_detail_accomplishmentlist" id="ffrm_fp_pbb_detail_accomplishmentlist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_fp_pbb_detail_accomplishment">
<div id="gmp_frm_fp_pbb_detail_accomplishment" class="upGridMiddlePanel">
<?php if ($frm_fp_pbb_detail_accomplishment_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_fp_pbb_detail_accomplishment->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_fp_pbb_detail_accomplishment_list->RenderListOptions();

// Render list options (header, left)
$frm_fp_pbb_detail_accomplishment_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_fp_pbb_detail_accomplishment->pbb_id->Visible) { // pbb_id ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->pbb_id) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->pbb_id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->pbb_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->pbb_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->cu_sequence->Visible) { // cu_sequence ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->cu_sequence) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->cu_sequence) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->cu_sequence->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->cu_sequence->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->cu_short_name->Visible) { // cu_short_name ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->cu_short_name) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->cu_short_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->cu_short_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->cu_short_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->cu_unit_name->Visible) { // cu_unit_name ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->cu_unit_name) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->cu_unit_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->cu_unit_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->cu_unit_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->focal_person_id->Visible) { // focal_person_id ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->focal_person_id) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->focal_person_id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->focal_person_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->focal_person_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->mfo_sequence->Visible) { // mfo_sequence ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->mfo_sequence) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->mfo_sequence) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->mfo_sequence->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->mfo_sequence->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->mfo->Visible) { // mfo ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->mfo) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->mfo->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->mfo) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->mfo->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->mfo->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->mfo->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->pi_no->Visible) { // pi_no ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->pi_no) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->pi_no->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->pi_no) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->pi_no->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->pi_no->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->pi_no->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->pi_sub->Visible) { // pi_sub ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->pi_sub) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->pi_sub) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->pi_sub->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->pi_sub->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->mfo_name->Visible) { // mfo_name ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->mfo_name) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->mfo_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->mfo_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->mfo_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->pi_question->Visible) { // pi_question ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->pi_question) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->pi_question->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->pi_question) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->pi_question->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->pi_question->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->pi_question->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->target->Visible) { // target ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->target) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->target->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->target) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->target->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->target->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->target->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator->Visible) { // t_numerator ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_numerator) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_numerator) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_numerator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_numerator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->Visible) { // t_numerator_qtr1 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->Visible) { // t_numerator_qtr2 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->Visible) { // t_numerator_qtr3 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->Visible) { // t_numerator_qtr4 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator->Visible) { // t_denominator ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_denominator) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_denominator) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_denominator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_denominator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->Visible) { // t_denominator_qtr1 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->Visible) { // t_denominator_qtr2 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->Visible) { // t_denominator_qtr3 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->Visible) { // t_denominator_qtr4 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_remarks->Visible) { // t_remarks ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_remarks) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate->Visible) { // t_cutOffDate ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_cutOffDate) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_cutOffDate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_cutOffDate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->accomplishment->Visible) { // accomplishment ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->accomplishment) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->accomplishment) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->accomplishment->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->accomplishment->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator->Visible) { // a_numerator ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_numerator) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_numerator) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_numerator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_numerator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->Visible) { // a_numerator_qtr1 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_numerator_qtr1) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_numerator_qtr1) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->Visible) { // a_numerator_qtr2 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_numerator_qtr2) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_numerator_qtr2) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->Visible) { // a_numerator_qtr3 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_numerator_qtr3) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_numerator_qtr3) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->Visible) { // a_numerator_qtr4 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_numerator_qtr4) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_numerator_qtr4) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator->Visible) { // a_denominator ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_denominator) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_denominator) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_denominator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_denominator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->Visible) { // a_denominator_qtr1 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_denominator_qtr1) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_denominator_qtr1) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->Visible) { // a_denominator_qtr2 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_denominator_qtr2) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_denominator_qtr2) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->Visible) { // a_denominator_qtr3 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_denominator_qtr3) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_denominator_qtr3) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->Visible) { // a_denominator_qtr4 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_denominator_qtr4) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_denominator_qtr4) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs->Visible) { // a_supporting_docs ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_supporting_docs->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->Visible) { // a_supporting_docs_qtr1 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->Visible) { // a_supporting_docs_qtr2 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->Visible) { // a_supporting_docs_qtr3 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->Visible) { // a_supporting_docs_qtr4 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_remarks->Visible) { // a_remarks ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_remarks) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_rating_above_90->Visible) { // a_rating_above_90 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_rating_above_90) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_rating_above_90) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_rating_above_90->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_rating_above_90->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_rating_below_90->Visible) { // a_rating_below_90 ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_rating_below_90) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_rating_below_90) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_rating_below_90->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_rating_below_90->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate->Visible) { // a_cutOffDate ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_cutOffDate) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_cutOffDate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_cutOffDate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->Visible) { // a_cutOffDate_remarks ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->units_id->Visible) { // units_id ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->units_id) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->units_id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->units_id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->units_id->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->units_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->units_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_rating->Visible) { // a_rating ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_rating) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_rating) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_rating->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->mfo_id->Visible) { // mfo_id ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->mfo_id) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->mfo_id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->mfo_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->mfo_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->Visible) { // a_supporting_docs_comparison ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->cutOffDate_id->Visible) { // cutOffDate_id ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->cutOffDate_id) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->cutOffDate_id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->cutOffDate_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->cutOffDate_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->mfo_name_rep->Visible) { // mfo_name_rep ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->mfo_name_rep) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->mfo_name_rep) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->mfo_name_rep->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->mfo_name_rep->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->Visible) { // t_cutOffDate_fp ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->Visible) { // a_cutOffDate_fp ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_pbb_detail_accomplishment->applicable->Visible) { // applicable ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->applicable) == "") { ?>
		<td><?php echo $frm_fp_pbb_detail_accomplishment->applicable->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_pbb_detail_accomplishment->SortUrl($frm_fp_pbb_detail_accomplishment->applicable) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_pbb_detail_accomplishment->applicable->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_pbb_detail_accomplishment->applicable->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_pbb_detail_accomplishment->applicable->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_fp_pbb_detail_accomplishment_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_fp_pbb_detail_accomplishment->ExportAll && $frm_fp_pbb_detail_accomplishment->Export <> "") {
	$frm_fp_pbb_detail_accomplishment_list->StopRec = $frm_fp_pbb_detail_accomplishment_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_fp_pbb_detail_accomplishment_list->TotalRecs > $frm_fp_pbb_detail_accomplishment_list->StartRec + $frm_fp_pbb_detail_accomplishment_list->DisplayRecs - 1)
		$frm_fp_pbb_detail_accomplishment_list->StopRec = $frm_fp_pbb_detail_accomplishment_list->StartRec + $frm_fp_pbb_detail_accomplishment_list->DisplayRecs - 1;
	else
		$frm_fp_pbb_detail_accomplishment_list->StopRec = $frm_fp_pbb_detail_accomplishment_list->TotalRecs;
}
$frm_fp_pbb_detail_accomplishment_list->RecCnt = $frm_fp_pbb_detail_accomplishment_list->StartRec - 1;
if ($frm_fp_pbb_detail_accomplishment_list->Recordset && !$frm_fp_pbb_detail_accomplishment_list->Recordset->EOF) {
	$frm_fp_pbb_detail_accomplishment_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_fp_pbb_detail_accomplishment_list->StartRec > 1)
		$frm_fp_pbb_detail_accomplishment_list->Recordset->Move($frm_fp_pbb_detail_accomplishment_list->StartRec - 1);
} elseif (!$frm_fp_pbb_detail_accomplishment->AllowAddDeleteRow && $frm_fp_pbb_detail_accomplishment_list->StopRec == 0) {
	$frm_fp_pbb_detail_accomplishment_list->StopRec = $frm_fp_pbb_detail_accomplishment->GridAddRowCount;
}

// Initialize aggregate
$frm_fp_pbb_detail_accomplishment->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_fp_pbb_detail_accomplishment->ResetAttrs();
$frm_fp_pbb_detail_accomplishment_list->RenderRow();
$frm_fp_pbb_detail_accomplishment_list->RowCnt = 0;
while ($frm_fp_pbb_detail_accomplishment_list->RecCnt < $frm_fp_pbb_detail_accomplishment_list->StopRec) {
	$frm_fp_pbb_detail_accomplishment_list->RecCnt++;
	if (intval($frm_fp_pbb_detail_accomplishment_list->RecCnt) >= intval($frm_fp_pbb_detail_accomplishment_list->StartRec)) {
		$frm_fp_pbb_detail_accomplishment_list->RowCnt++;

		// Set up key count
		$frm_fp_pbb_detail_accomplishment_list->KeyCount = $frm_fp_pbb_detail_accomplishment_list->RowIndex;

		// Init row class and style
		$frm_fp_pbb_detail_accomplishment->ResetAttrs();
		$frm_fp_pbb_detail_accomplishment->CssClass = "";
		if ($frm_fp_pbb_detail_accomplishment->CurrentAction == "gridadd") {
		} else {
			$frm_fp_pbb_detail_accomplishment_list->LoadRowValues($frm_fp_pbb_detail_accomplishment_list->Recordset); // Load row values
		}
		$frm_fp_pbb_detail_accomplishment->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_fp_pbb_detail_accomplishment->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_fp_pbb_detail_accomplishment_list->RenderRow();

		// Render list options
		$frm_fp_pbb_detail_accomplishment_list->RenderListOptions();
?>
	<tr<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_pbb_detail_accomplishment_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_pbb_detail_accomplishment->pbb_id->Visible) { // pbb_id ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->ListViewValue() ?></div>
<a name="<?php echo $frm_fp_pbb_detail_accomplishment_list->PageObjName . "_row_" . $frm_fp_pbb_detail_accomplishment_list->RowCnt ?>" id="<?php echo $frm_fp_pbb_detail_accomplishment_list->PageObjName . "_row_" . $frm_fp_pbb_detail_accomplishment_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->cu_sequence->Visible) { // cu_sequence ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->cu_short_name->Visible) { // cu_short_name ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->cu_unit_name->Visible) { // cu_unit_name ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->focal_person_id->Visible) { // focal_person_id ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->mfo_sequence->Visible) { // mfo_sequence ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->mfo->Visible) { // mfo ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->pi_no->Visible) { // pi_no ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pi_no->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->pi_no->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->pi_no->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->pi_sub->Visible) { // pi_sub ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->mfo_name->Visible) { // mfo_name ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->pi_question->Visible) { // pi_question ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pi_question->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->pi_question->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->pi_question->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->target->Visible) { // target ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->target->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->target->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->target->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator->Visible) { // t_numerator ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->Visible) { // t_numerator_qtr1 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->Visible) { // t_numerator_qtr2 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->Visible) { // t_numerator_qtr3 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->Visible) { // t_numerator_qtr4 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator->Visible) { // t_denominator ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->Visible) { // t_denominator_qtr1 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->Visible) { // t_denominator_qtr2 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->Visible) { // t_denominator_qtr3 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->Visible) { // t_denominator_qtr4 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_remarks->Visible) { // t_remarks ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate->Visible) { // t_cutOffDate ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->accomplishment->Visible) { // accomplishment ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator->Visible) { // a_numerator ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->Visible) { // a_numerator_qtr1 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->Visible) { // a_numerator_qtr2 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->Visible) { // a_numerator_qtr3 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->Visible) { // a_numerator_qtr4 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator->Visible) { // a_denominator ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->Visible) { // a_denominator_qtr1 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->Visible) { // a_denominator_qtr2 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->Visible) { // a_denominator_qtr3 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->Visible) { // a_denominator_qtr4 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs->Visible) { // a_supporting_docs ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->Visible) { // a_supporting_docs_qtr1 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->Visible) { // a_supporting_docs_qtr2 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->Visible) { // a_supporting_docs_qtr3 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->Visible) { // a_supporting_docs_qtr4 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_remarks->Visible) { // a_remarks ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_rating_above_90->Visible) { // a_rating_above_90 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_rating_below_90->Visible) { // a_rating_below_90 ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate->Visible) { // a_cutOffDate ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->Visible) { // a_cutOffDate_remarks ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->units_id->Visible) { // units_id ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->units_id->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->units_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->units_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_rating->Visible) { // a_rating ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_rating->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_rating->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_rating->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->mfo_id->Visible) { // mfo_id ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->Visible) { // a_supporting_docs_comparison ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->cutOffDate_id->Visible) { // cutOffDate_id ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->mfo_name_rep->Visible) { // mfo_name_rep ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->Visible) { // t_cutOffDate_fp ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->Visible) { // a_cutOffDate_fp ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_pbb_detail_accomplishment->applicable->Visible) { // applicable ?>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->applicable->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->applicable->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->applicable->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_pbb_detail_accomplishment_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_fp_pbb_detail_accomplishment->CurrentAction <> "gridadd")
		$frm_fp_pbb_detail_accomplishment_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_fp_pbb_detail_accomplishment_list->Recordset)
	$frm_fp_pbb_detail_accomplishment_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_fp_pbb_detail_accomplishment->Export == "" && $frm_fp_pbb_detail_accomplishment->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_fp_pbb_detail_accomplishment_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_fp_pbb_detail_accomplishment->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_fp_pbb_detail_accomplishment_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_pbb_detail_accomplishment_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_fp_pbb_detail_accomplishment';

	// Page object name
	var $PageObjName = 'frm_fp_pbb_detail_accomplishment_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_pbb_detail_accomplishment;
		if ($frm_fp_pbb_detail_accomplishment->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_pbb_detail_accomplishment->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_pbb_detail_accomplishment;
		if ($frm_fp_pbb_detail_accomplishment->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_pbb_detail_accomplishment->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_pbb_detail_accomplishment->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_pbb_detail_accomplishment_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_pbb_detail_accomplishment)
		if (!isset($GLOBALS["frm_fp_pbb_detail_accomplishment"])) {
			$GLOBALS["frm_fp_pbb_detail_accomplishment"] = new cfrm_fp_pbb_detail_accomplishment();
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_pbb_detail_accomplishment"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_fp_pbb_detail_accomplishmentadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_fp_pbb_detail_accomplishmentdelete.php";
		$this->MultiUpdateUrl = "frm_fp_pbb_detail_accomplishmentupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_pbb_detail_accomplishment', TRUE);

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
		global $frm_fp_pbb_detail_accomplishment;

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
			$frm_fp_pbb_detail_accomplishment->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_fp_pbb_detail_accomplishment;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($frm_fp_pbb_detail_accomplishment->Export <> "" ||
				$frm_fp_pbb_detail_accomplishment->CurrentAction == "gridadd" ||
				$frm_fp_pbb_detail_accomplishment->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_fp_pbb_detail_accomplishment->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_fp_pbb_detail_accomplishment->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_fp_pbb_detail_accomplishment->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_fp_pbb_detail_accomplishment->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_fp_pbb_detail_accomplishment->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_fp_pbb_detail_accomplishment->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_fp_pbb_detail_accomplishment->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$frm_fp_pbb_detail_accomplishment->setSessionWhere($sFilter);
		$frm_fp_pbb_detail_accomplishment->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_fp_pbb_detail_accomplishment;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_pbb_detail_accomplishment->cu_short_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_pbb_detail_accomplishment->cu_unit_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_pbb_detail_accomplishment->pi_sub, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_pbb_detail_accomplishment->mfo_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_pbb_detail_accomplishment->pi_question, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_pbb_detail_accomplishment->t_remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_pbb_detail_accomplishment->a_remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_pbb_detail_accomplishment->mfo_name_rep, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_pbb_detail_accomplishment->applicable, $Keyword);
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
		global $Security, $frm_fp_pbb_detail_accomplishment;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_fp_pbb_detail_accomplishment->BasicSearchKeyword;
		$sSearchType = $frm_fp_pbb_detail_accomplishment->BasicSearchType;
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
			$frm_fp_pbb_detail_accomplishment->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_fp_pbb_detail_accomplishment->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_fp_pbb_detail_accomplishment;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_fp_pbb_detail_accomplishment->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_fp_pbb_detail_accomplishment;
		$frm_fp_pbb_detail_accomplishment->setSessionBasicSearchKeyword("");
		$frm_fp_pbb_detail_accomplishment->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_fp_pbb_detail_accomplishment;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_fp_pbb_detail_accomplishment->BasicSearchKeyword = $frm_fp_pbb_detail_accomplishment->getSessionBasicSearchKeyword();
			$frm_fp_pbb_detail_accomplishment->BasicSearchType = $frm_fp_pbb_detail_accomplishment->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_fp_pbb_detail_accomplishment;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_fp_pbb_detail_accomplishment->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_fp_pbb_detail_accomplishment->CurrentOrderType = @$_GET["ordertype"];
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->pbb_id); // pbb_id
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->cu_sequence); // cu_sequence
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->cu_short_name); // cu_short_name
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->cu_unit_name); // cu_unit_name
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->focal_person_id); // focal_person_id
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->mfo_sequence); // mfo_sequence
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->mfo); // mfo
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->pi_no); // pi_no
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->pi_sub); // pi_sub
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->mfo_name); // mfo_name
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->pi_question); // pi_question
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->target); // target
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_numerator); // t_numerator
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1); // t_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2); // t_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3); // t_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4); // t_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_denominator); // t_denominator
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1); // t_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2); // t_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3); // t_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4); // t_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_remarks); // t_remarks
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_cutOffDate); // t_cutOffDate
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks); // t_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->accomplishment); // accomplishment
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_numerator); // a_numerator
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_numerator_qtr1); // a_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_numerator_qtr2); // a_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_numerator_qtr3); // a_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_numerator_qtr4); // a_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_denominator); // a_denominator
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_denominator_qtr1); // a_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_denominator_qtr2); // a_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_denominator_qtr3); // a_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_denominator_qtr4); // a_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_supporting_docs); // a_supporting_docs
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1); // a_supporting_docs_qtr1
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2); // a_supporting_docs_qtr2
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3); // a_supporting_docs_qtr3
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4); // a_supporting_docs_qtr4
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_remarks); // a_remarks
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_rating_above_90); // a_rating_above_90
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_rating_below_90); // a_rating_below_90
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_cutOffDate); // a_cutOffDate
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks); // a_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->units_id); // units_id
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_rating); // a_rating
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->mfo_id); // mfo_id
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison); // a_supporting_docs_comparison
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->cutOffDate_id); // cutOffDate_id
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->mfo_name_rep); // mfo_name_rep
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp); // t_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp); // a_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->UpdateSort($frm_fp_pbb_detail_accomplishment->applicable); // applicable
			$frm_fp_pbb_detail_accomplishment->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_fp_pbb_detail_accomplishment;
		$sOrderBy = $frm_fp_pbb_detail_accomplishment->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_fp_pbb_detail_accomplishment->SqlOrderBy() <> "") {
				$sOrderBy = $frm_fp_pbb_detail_accomplishment->SqlOrderBy();
				$frm_fp_pbb_detail_accomplishment->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_fp_pbb_detail_accomplishment;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_fp_pbb_detail_accomplishment->setSessionOrderBy($sOrderBy);
				$frm_fp_pbb_detail_accomplishment->pbb_id->setSort("");
				$frm_fp_pbb_detail_accomplishment->cu_sequence->setSort("");
				$frm_fp_pbb_detail_accomplishment->cu_short_name->setSort("");
				$frm_fp_pbb_detail_accomplishment->cu_unit_name->setSort("");
				$frm_fp_pbb_detail_accomplishment->focal_person_id->setSort("");
				$frm_fp_pbb_detail_accomplishment->mfo_sequence->setSort("");
				$frm_fp_pbb_detail_accomplishment->mfo->setSort("");
				$frm_fp_pbb_detail_accomplishment->pi_no->setSort("");
				$frm_fp_pbb_detail_accomplishment->pi_sub->setSort("");
				$frm_fp_pbb_detail_accomplishment->mfo_name->setSort("");
				$frm_fp_pbb_detail_accomplishment->pi_question->setSort("");
				$frm_fp_pbb_detail_accomplishment->target->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_numerator->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_denominator->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_remarks->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_cutOffDate->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->setSort("");
				$frm_fp_pbb_detail_accomplishment->accomplishment->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_numerator->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_denominator->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_supporting_docs->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_remarks->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_rating_above_90->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_rating_below_90->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_cutOffDate->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->setSort("");
				$frm_fp_pbb_detail_accomplishment->units_id->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_rating->setSort("");
				$frm_fp_pbb_detail_accomplishment->mfo_id->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->setSort("");
				$frm_fp_pbb_detail_accomplishment->cutOffDate_id->setSort("");
				$frm_fp_pbb_detail_accomplishment->mfo_name_rep->setSort("");
				$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->setSort("");
				$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->setSort("");
				$frm_fp_pbb_detail_accomplishment->applicable->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_fp_pbb_detail_accomplishment->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_fp_pbb_detail_accomplishment;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"frm_fp_pbb_detail_accomplishment_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_fp_pbb_detail_accomplishment, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $this->ShowOptionLink() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $this->ShowOptionLink() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($frm_fp_pbb_detail_accomplishment->pbb_id->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_fp_pbb_detail_accomplishment;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_fp_pbb_detail_accomplishment;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_fp_pbb_detail_accomplishment->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_fp_pbb_detail_accomplishment->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_fp_pbb_detail_accomplishment->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_fp_pbb_detail_accomplishment->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_fp_pbb_detail_accomplishment->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_fp_pbb_detail_accomplishment->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_fp_pbb_detail_accomplishment;
		$frm_fp_pbb_detail_accomplishment->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_fp_pbb_detail_accomplishment->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_fp_pbb_detail_accomplishment;

		// Call Recordset Selecting event
		$frm_fp_pbb_detail_accomplishment->Recordset_Selecting($frm_fp_pbb_detail_accomplishment->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_fp_pbb_detail_accomplishment->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_fp_pbb_detail_accomplishment->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_pbb_detail_accomplishment;
		$sFilter = $frm_fp_pbb_detail_accomplishment->KeyFilter();

		// Call Row Selecting event
		$frm_fp_pbb_detail_accomplishment->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_pbb_detail_accomplishment->CurrentFilter = $sFilter;
		$sSql = $frm_fp_pbb_detail_accomplishment->SQL();
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
		global $conn, $frm_fp_pbb_detail_accomplishment;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_pbb_detail_accomplishment->Row_Selected($row);
		$frm_fp_pbb_detail_accomplishment->pbb_id->setDbValue($rs->fields('pbb_id'));
		$frm_fp_pbb_detail_accomplishment->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_fp_pbb_detail_accomplishment->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_fp_pbb_detail_accomplishment->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_fp_pbb_detail_accomplishment->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_pbb_detail_accomplishment->mfo_sequence->setDbValue($rs->fields('mfo_sequence'));
		$frm_fp_pbb_detail_accomplishment->mfo->setDbValue($rs->fields('mfo'));
		$frm_fp_pbb_detail_accomplishment->pi_no->setDbValue($rs->fields('pi_no'));
		$frm_fp_pbb_detail_accomplishment->pi_sub->setDbValue($rs->fields('pi_sub'));
		$frm_fp_pbb_detail_accomplishment->mfo_name->setDbValue($rs->fields('mfo_name'));
		$frm_fp_pbb_detail_accomplishment->pi_question->setDbValue($rs->fields('pi_question'));
		$frm_fp_pbb_detail_accomplishment->target->setDbValue($rs->fields('target'));
		$frm_fp_pbb_detail_accomplishment->t_numerator->setDbValue($rs->fields('t_numerator'));
		$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->setDbValue($rs->fields('t_numerator_qtr1'));
		$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->setDbValue($rs->fields('t_numerator_qtr2'));
		$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->setDbValue($rs->fields('t_numerator_qtr3'));
		$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->setDbValue($rs->fields('t_numerator_qtr4'));
		$frm_fp_pbb_detail_accomplishment->t_denominator->setDbValue($rs->fields('t_denominator'));
		$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->setDbValue($rs->fields('t_denominator_qtr1'));
		$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->setDbValue($rs->fields('t_denominator_qtr2'));
		$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->setDbValue($rs->fields('t_denominator_qtr3'));
		$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->setDbValue($rs->fields('t_denominator_qtr4'));
		$frm_fp_pbb_detail_accomplishment->t_remarks->setDbValue($rs->fields('t_remarks'));
		$frm_fp_pbb_detail_accomplishment->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_fp_pbb_detail_accomplishment->accomplishment->setDbValue($rs->fields('accomplishment'));
		$frm_fp_pbb_detail_accomplishment->a_numerator->setDbValue($rs->fields('a_numerator'));
		$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->setDbValue($rs->fields('a_numerator_qtr1'));
		$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->setDbValue($rs->fields('a_numerator_qtr2'));
		$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->setDbValue($rs->fields('a_numerator_qtr3'));
		$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->setDbValue($rs->fields('a_numerator_qtr4'));
		$frm_fp_pbb_detail_accomplishment->a_denominator->setDbValue($rs->fields('a_denominator'));
		$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->setDbValue($rs->fields('a_denominator_qtr1'));
		$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->setDbValue($rs->fields('a_denominator_qtr2'));
		$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->setDbValue($rs->fields('a_denominator_qtr3'));
		$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->setDbValue($rs->fields('a_denominator_qtr4'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs->setDbValue($rs->fields('a_supporting_docs'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->setDbValue($rs->fields('a_supporting_docs_qtr1'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->setDbValue($rs->fields('a_supporting_docs_qtr2'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->setDbValue($rs->fields('a_supporting_docs_qtr3'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->setDbValue($rs->fields('a_supporting_docs_qtr4'));
		$frm_fp_pbb_detail_accomplishment->a_remarks->setDbValue($rs->fields('a_remarks'));
		$frm_fp_pbb_detail_accomplishment->a_rating_above_90->setDbValue($rs->fields('a_rating_above_90'));
		$frm_fp_pbb_detail_accomplishment->a_rating_below_90->setDbValue($rs->fields('a_rating_below_90'));
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate->setDbValue($rs->fields('a_cutOffDate'));
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
		$frm_fp_pbb_detail_accomplishment->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_pbb_detail_accomplishment->a_rating->setDbValue($rs->fields('a_rating'));
		$frm_fp_pbb_detail_accomplishment->mfo_id->setDbValue($rs->fields('mfo_id'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->setDbValue($rs->fields('a_supporting_docs_comparison'));
		$frm_fp_pbb_detail_accomplishment->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_fp_pbb_detail_accomplishment->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_fp_pbb_detail_accomplishment->applicable->setDbValue($rs->fields('applicable'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_fp_pbb_detail_accomplishment;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_fp_pbb_detail_accomplishment->getKey("pbb_id")) <> "")
			$frm_fp_pbb_detail_accomplishment->pbb_id->CurrentValue = $frm_fp_pbb_detail_accomplishment->getKey("pbb_id"); // pbb_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_fp_pbb_detail_accomplishment->CurrentFilter = $frm_fp_pbb_detail_accomplishment->KeyFilter();
			$sSql = $frm_fp_pbb_detail_accomplishment->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_pbb_detail_accomplishment;

		// Initialize URLs
		$this->ViewUrl = $frm_fp_pbb_detail_accomplishment->ViewUrl();
		$this->EditUrl = $frm_fp_pbb_detail_accomplishment->EditUrl();
		$this->InlineEditUrl = $frm_fp_pbb_detail_accomplishment->InlineEditUrl();
		$this->CopyUrl = $frm_fp_pbb_detail_accomplishment->CopyUrl();
		$this->InlineCopyUrl = $frm_fp_pbb_detail_accomplishment->InlineCopyUrl();
		$this->DeleteUrl = $frm_fp_pbb_detail_accomplishment->DeleteUrl();

		// Call Row_Rendering event
		$frm_fp_pbb_detail_accomplishment->Row_Rendering();

		// Common render codes for all row types
		// pbb_id
		// cu_sequence
		// cu_short_name
		// cu_unit_name
		// focal_person_id
		// mfo_sequence
		// mfo
		// pi_no
		// pi_sub
		// mfo_name
		// pi_question
		// target
		// t_numerator
		// t_numerator_qtr1
		// t_numerator_qtr2
		// t_numerator_qtr3
		// t_numerator_qtr4
		// t_denominator
		// t_denominator_qtr1
		// t_denominator_qtr2
		// t_denominator_qtr3
		// t_denominator_qtr4
		// t_remarks
		// t_cutOffDate
		// t_cutOffDate_remarks
		// accomplishment
		// a_numerator
		// a_numerator_qtr1
		// a_numerator_qtr2
		// a_numerator_qtr3
		// a_numerator_qtr4
		// a_denominator
		// a_denominator_qtr1
		// a_denominator_qtr2
		// a_denominator_qtr3
		// a_denominator_qtr4
		// a_supporting_docs
		// a_supporting_docs_qtr1
		// a_supporting_docs_qtr2
		// a_supporting_docs_qtr3
		// a_supporting_docs_qtr4
		// a_remarks
		// a_rating_above_90
		// a_rating_below_90
		// a_cutOffDate
		// a_cutOffDate_remarks
		// units_id
		// a_rating
		// mfo_id
		// a_supporting_docs_comparison
		// cutOffDate_id
		// mfo_name_rep
		// t_cutOffDate_fp
		// a_cutOffDate_fp
		// applicable

		if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View row

			// pbb_id
			$frm_fp_pbb_detail_accomplishment->pbb_id->ViewValue = $frm_fp_pbb_detail_accomplishment->pbb_id->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->pbb_id->ViewCustomAttributes = "";

			// cu_sequence
			$frm_fp_pbb_detail_accomplishment->cu_sequence->ViewValue = $frm_fp_pbb_detail_accomplishment->cu_sequence->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->cu_sequence->ViewCustomAttributes = "";

			// cu_short_name
			$frm_fp_pbb_detail_accomplishment->cu_short_name->ViewValue = $frm_fp_pbb_detail_accomplishment->cu_short_name->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->cu_short_name->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewValue = $frm_fp_pbb_detail_accomplishment->cu_unit_name->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewCustomAttributes = "";

			// focal_person_id
			$frm_fp_pbb_detail_accomplishment->focal_person_id->ViewValue = $frm_fp_pbb_detail_accomplishment->focal_person_id->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->focal_person_id->ViewCustomAttributes = "";

			// mfo_sequence
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo_sequence->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->ViewCustomAttributes = "";

			// mfo
			$frm_fp_pbb_detail_accomplishment->mfo->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->mfo->ViewCustomAttributes = "";

			// pi_no
			$frm_fp_pbb_detail_accomplishment->pi_no->ViewValue = $frm_fp_pbb_detail_accomplishment->pi_no->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->pi_no->ViewCustomAttributes = "";

			// pi_sub
			$frm_fp_pbb_detail_accomplishment->pi_sub->ViewValue = $frm_fp_pbb_detail_accomplishment->pi_sub->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->pi_sub->ViewCustomAttributes = "";

			// mfo_name
			$frm_fp_pbb_detail_accomplishment->mfo_name->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo_name->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->mfo_name->ViewCustomAttributes = "";

			// pi_question
			$frm_fp_pbb_detail_accomplishment->pi_question->ViewValue = $frm_fp_pbb_detail_accomplishment->pi_question->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->pi_question->ViewCustomAttributes = "";

			// target
			$frm_fp_pbb_detail_accomplishment->target->ViewValue = $frm_fp_pbb_detail_accomplishment->target->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->target->ViewCustomAttributes = "";

			// t_numerator
			$frm_fp_pbb_detail_accomplishment->t_numerator->ViewValue = $frm_fp_pbb_detail_accomplishment->t_numerator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator->ViewCustomAttributes = "";

			// t_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->ViewValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->ViewCustomAttributes = "";

			// t_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->ViewValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->ViewCustomAttributes = "";

			// t_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->ViewValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->ViewCustomAttributes = "";

			// t_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->ViewValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->ViewCustomAttributes = "";

			// t_denominator
			$frm_fp_pbb_detail_accomplishment->t_denominator->ViewValue = $frm_fp_pbb_detail_accomplishment->t_denominator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator->ViewCustomAttributes = "";

			// t_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->ViewValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->ViewCustomAttributes = "";

			// t_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->ViewValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->ViewCustomAttributes = "";

			// t_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->ViewValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->ViewCustomAttributes = "";

			// t_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->ViewValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->ViewCustomAttributes = "";

			// t_remarks
			$frm_fp_pbb_detail_accomplishment->t_remarks->ViewValue = $frm_fp_pbb_detail_accomplishment->t_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_remarks->ViewCustomAttributes = "";

			// t_cutOffDate
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->ViewValue = $frm_fp_pbb_detail_accomplishment->t_cutOffDate->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->ViewValue = up_FormatDateTime($frm_fp_pbb_detail_accomplishment->t_cutOffDate->ViewValue, 6);
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ViewValue = $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// accomplishment
			$frm_fp_pbb_detail_accomplishment->accomplishment->ViewValue = $frm_fp_pbb_detail_accomplishment->accomplishment->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$frm_fp_pbb_detail_accomplishment->a_numerator->ViewValue = $frm_fp_pbb_detail_accomplishment->a_numerator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_numerator->ViewCustomAttributes = "";

			// a_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->ViewValue = $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->ViewCustomAttributes = "";

			// a_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->ViewValue = $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->ViewCustomAttributes = "";

			// a_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->ViewValue = $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->ViewCustomAttributes = "";

			// a_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->ViewValue = $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->ViewCustomAttributes = "";

			// a_denominator
			$frm_fp_pbb_detail_accomplishment->a_denominator->ViewValue = $frm_fp_pbb_detail_accomplishment->a_denominator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_denominator->ViewCustomAttributes = "";

			// a_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->ViewValue = $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->ViewCustomAttributes = "";

			// a_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->ViewValue = $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->ViewCustomAttributes = "";

			// a_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->ViewValue = $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->ViewCustomAttributes = "";

			// a_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->ViewValue = $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->ViewCustomAttributes = "";

			// a_supporting_docs
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->ViewValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->ViewCustomAttributes = "";

			// a_supporting_docs_qtr1
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->ViewValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->ViewCustomAttributes = "";

			// a_supporting_docs_qtr2
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->ViewValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->ViewCustomAttributes = "";

			// a_supporting_docs_qtr3
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->ViewValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->ViewCustomAttributes = "";

			// a_supporting_docs_qtr4
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->ViewValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->ViewCustomAttributes = "";

			// a_remarks
			$frm_fp_pbb_detail_accomplishment->a_remarks->ViewValue = $frm_fp_pbb_detail_accomplishment->a_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_remarks->ViewCustomAttributes = "";

			// a_rating_above_90
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->ViewValue = $frm_fp_pbb_detail_accomplishment->a_rating_above_90->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->ViewCustomAttributes = "";

			// a_rating_below_90
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->ViewValue = $frm_fp_pbb_detail_accomplishment->a_rating_below_90->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->ViewCustomAttributes = "";

			// a_cutOffDate
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->ViewValue = $frm_fp_pbb_detail_accomplishment->a_cutOffDate->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->ViewValue = up_FormatDateTime($frm_fp_pbb_detail_accomplishment->a_cutOffDate->ViewValue, 6);
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->ViewCustomAttributes = "";

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewValue = $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// units_id
			$frm_fp_pbb_detail_accomplishment->units_id->ViewValue = $frm_fp_pbb_detail_accomplishment->units_id->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->units_id->ViewCustomAttributes = "";

			// a_rating
			$frm_fp_pbb_detail_accomplishment->a_rating->ViewValue = $frm_fp_pbb_detail_accomplishment->a_rating->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_rating->ViewCustomAttributes = "";

			// mfo_id
			$frm_fp_pbb_detail_accomplishment->mfo_id->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->mfo_id->ViewCustomAttributes = "";

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ViewValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ViewCustomAttributes = "";

			// cutOffDate_id
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->ViewValue = $frm_fp_pbb_detail_accomplishment->cutOffDate_id->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->ViewCustomAttributes = "";

			// mfo_name_rep
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo_name_rep->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->ViewCustomAttributes = "";

			// t_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ViewValue = $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ViewValue = up_FormatDateTime($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ViewValue, 6);
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ViewCustomAttributes = "";

			// a_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ViewValue = $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ViewValue = up_FormatDateTime($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ViewValue, 6);
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ViewCustomAttributes = "";

			// applicable
			$frm_fp_pbb_detail_accomplishment->applicable->ViewValue = $frm_fp_pbb_detail_accomplishment->applicable->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->applicable->ViewCustomAttributes = "";

			// pbb_id
			$frm_fp_pbb_detail_accomplishment->pbb_id->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pbb_id->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->pbb_id->TooltipValue = "";

			// cu_sequence
			$frm_fp_pbb_detail_accomplishment->cu_sequence->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cu_sequence->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->cu_sequence->TooltipValue = "";

			// cu_short_name
			$frm_fp_pbb_detail_accomplishment->cu_short_name->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cu_short_name->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->cu_short_name->TooltipValue = "";

			// cu_unit_name
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->TooltipValue = "";

			// focal_person_id
			$frm_fp_pbb_detail_accomplishment->focal_person_id->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->focal_person_id->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->focal_person_id->TooltipValue = "";

			// mfo_sequence
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->TooltipValue = "";

			// mfo
			$frm_fp_pbb_detail_accomplishment->mfo->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->mfo->TooltipValue = "";

			// pi_no
			$frm_fp_pbb_detail_accomplishment->pi_no->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pi_no->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->pi_no->TooltipValue = "";

			// pi_sub
			$frm_fp_pbb_detail_accomplishment->pi_sub->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pi_sub->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->pi_sub->TooltipValue = "";

			// mfo_name
			$frm_fp_pbb_detail_accomplishment->mfo_name->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_name->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->mfo_name->TooltipValue = "";

			// pi_question
			$frm_fp_pbb_detail_accomplishment->pi_question->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pi_question->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->pi_question->TooltipValue = "";

			// target
			$frm_fp_pbb_detail_accomplishment->target->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->target->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->target->TooltipValue = "";

			// t_numerator
			$frm_fp_pbb_detail_accomplishment->t_numerator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator->TooltipValue = "";

			// t_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->TooltipValue = "";

			// t_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->TooltipValue = "";

			// t_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->TooltipValue = "";

			// t_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->TooltipValue = "";

			// t_denominator
			$frm_fp_pbb_detail_accomplishment->t_denominator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator->TooltipValue = "";

			// t_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->TooltipValue = "";

			// t_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->TooltipValue = "";

			// t_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->TooltipValue = "";

			// t_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->TooltipValue = "";

			// t_remarks
			$frm_fp_pbb_detail_accomplishment->t_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_remarks->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_remarks->TooltipValue = "";

			// t_cutOffDate
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->TooltipValue = "";

			// accomplishment
			$frm_fp_pbb_detail_accomplishment->accomplishment->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->accomplishment->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->accomplishment->TooltipValue = "";

			// a_numerator
			$frm_fp_pbb_detail_accomplishment->a_numerator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator->TooltipValue = "";

			// a_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->TooltipValue = "";

			// a_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->TooltipValue = "";

			// a_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->TooltipValue = "";

			// a_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->TooltipValue = "";

			// a_denominator
			$frm_fp_pbb_detail_accomplishment->a_denominator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator->TooltipValue = "";

			// a_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->TooltipValue = "";

			// a_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->TooltipValue = "";

			// a_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->TooltipValue = "";

			// a_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->TooltipValue = "";

			// a_supporting_docs
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->TooltipValue = "";

			// a_supporting_docs_qtr1
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->TooltipValue = "";

			// a_supporting_docs_qtr2
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->TooltipValue = "";

			// a_supporting_docs_qtr3
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->TooltipValue = "";

			// a_supporting_docs_qtr4
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->TooltipValue = "";

			// a_remarks
			$frm_fp_pbb_detail_accomplishment->a_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_remarks->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_remarks->TooltipValue = "";

			// a_rating_above_90
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->TooltipValue = "";

			// a_rating_below_90
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->TooltipValue = "";

			// a_cutOffDate
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->TooltipValue = "";

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->TooltipValue = "";

			// units_id
			$frm_fp_pbb_detail_accomplishment->units_id->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->units_id->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->units_id->TooltipValue = "";

			// a_rating
			$frm_fp_pbb_detail_accomplishment->a_rating->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_rating->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_rating->TooltipValue = "";

			// mfo_id
			$frm_fp_pbb_detail_accomplishment->mfo_id->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_id->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->mfo_id->TooltipValue = "";

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->TooltipValue = "";

			// cutOffDate_id
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->TooltipValue = "";

			// mfo_name_rep
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->TooltipValue = "";

			// t_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->TooltipValue = "";

			// a_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->TooltipValue = "";

			// applicable
			$frm_fp_pbb_detail_accomplishment->applicable->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->applicable->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->applicable->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_fp_pbb_detail_accomplishment->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_pbb_detail_accomplishment->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_fp_pbb_detail_accomplishment;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_fp_pbb_detail_accomplishment->focal_person_id->CurrentValue);
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
