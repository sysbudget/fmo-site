<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_disciplinechedcodes_majorinfo.php" ?>
<?php include_once "ref_disciplinechedcodes_minorinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_disciplinechedcodes_major_list = new cref_disciplinechedcodes_major_list();
$Page =& $ref_disciplinechedcodes_major_list;

// Page init
$ref_disciplinechedcodes_major_list->Page_Init();

// Page main
$ref_disciplinechedcodes_major_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($ref_disciplinechedcodes_major->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var ref_disciplinechedcodes_major_list = new up_Page("ref_disciplinechedcodes_major_list");

// page properties
ref_disciplinechedcodes_major_list.PageID = "list"; // page ID
ref_disciplinechedcodes_major_list.FormID = "fref_disciplinechedcodes_majorlist"; // form ID
var UP_PAGE_ID = ref_disciplinechedcodes_major_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
ref_disciplinechedcodes_major_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_disciplinechedcodes_major_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_disciplinechedcodes_major_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_disciplinechedcodes_major_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($ref_disciplinechedcodes_major->Export == "") || (UP_EXPORT_MASTER_RECORD && $ref_disciplinechedcodes_major->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$ref_disciplinechedcodes_major_list->TotalRecs = $ref_disciplinechedcodes_major->SelectRecordCount();
	} else {
		if ($ref_disciplinechedcodes_major_list->Recordset = $ref_disciplinechedcodes_major_list->LoadRecordset())
			$ref_disciplinechedcodes_major_list->TotalRecs = $ref_disciplinechedcodes_major_list->Recordset->RecordCount();
	}
	$ref_disciplinechedcodes_major_list->StartRec = 1;
	if ($ref_disciplinechedcodes_major_list->DisplayRecs <= 0 || ($ref_disciplinechedcodes_major->Export <> "" && $ref_disciplinechedcodes_major->ExportAll)) // Display all records
		$ref_disciplinechedcodes_major_list->DisplayRecs = $ref_disciplinechedcodes_major_list->TotalRecs;
	if (!($ref_disciplinechedcodes_major->Export <> "" && $ref_disciplinechedcodes_major->ExportAll))
		$ref_disciplinechedcodes_major_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$ref_disciplinechedcodes_major_list->Recordset = $ref_disciplinechedcodes_major_list->LoadRecordset($ref_disciplinechedcodes_major_list->StartRec-1, $ref_disciplinechedcodes_major_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_disciplinechedcodes_major->TableCaption() ?>
&nbsp;&nbsp;<?php $ref_disciplinechedcodes_major_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($ref_disciplinechedcodes_major->Export == "" && $ref_disciplinechedcodes_major->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(ref_disciplinechedcodes_major_list);" style="text-decoration: none;"><img id="ref_disciplinechedcodes_major_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="ref_disciplinechedcodes_major_list_SearchPanel">
<form name="fref_disciplinechedcodes_majorlistsrch" id="fref_disciplinechedcodes_majorlistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="ref_disciplinechedcodes_major">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($ref_disciplinechedcodes_major->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $ref_disciplinechedcodes_major_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($ref_disciplinechedcodes_major->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($ref_disciplinechedcodes_major->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($ref_disciplinechedcodes_major->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $ref_disciplinechedcodes_major_list->ShowPageHeader(); ?>
<?php
$ref_disciplinechedcodes_major_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($ref_disciplinechedcodes_major->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($ref_disciplinechedcodes_major->CurrentAction <> "gridadd" && $ref_disciplinechedcodes_major->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($ref_disciplinechedcodes_major_list->Pager)) $ref_disciplinechedcodes_major_list->Pager = new cPrevNextPager($ref_disciplinechedcodes_major_list->StartRec, $ref_disciplinechedcodes_major_list->DisplayRecs, $ref_disciplinechedcodes_major_list->TotalRecs) ?>
<?php if ($ref_disciplinechedcodes_major_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($ref_disciplinechedcodes_major_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $ref_disciplinechedcodes_major_list->PageUrl() ?>start=<?php echo $ref_disciplinechedcodes_major_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($ref_disciplinechedcodes_major_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $ref_disciplinechedcodes_major_list->PageUrl() ?>start=<?php echo $ref_disciplinechedcodes_major_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $ref_disciplinechedcodes_major_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($ref_disciplinechedcodes_major_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $ref_disciplinechedcodes_major_list->PageUrl() ?>start=<?php echo $ref_disciplinechedcodes_major_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($ref_disciplinechedcodes_major_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $ref_disciplinechedcodes_major_list->PageUrl() ?>start=<?php echo $ref_disciplinechedcodes_major_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $ref_disciplinechedcodes_major_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ref_disciplinechedcodes_major_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ref_disciplinechedcodes_major_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ref_disciplinechedcodes_major_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($ref_disciplinechedcodes_major_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $ref_disciplinechedcodes_major_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php if ($ref_disciplinechedcodes_minor->DetailAdd && $Security->AllowAdd('ref_disciplinechedcodes_minor')) { ?>
<a class="upGridLink" href="<?php echo $ref_disciplinechedcodes_major->AddUrl() . "?" . UP_TABLE_SHOW_DETAIL . "=ref_disciplinechedcodes_minor" ?>"><?php echo $Language->Phrase("AddLink") ?>&nbsp;<?php echo $ref_disciplinechedcodes_major->TableCaption() ?>/<?php echo $ref_disciplinechedcodes_minor->TableCaption() ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
<?php if ($ref_disciplinechedcodes_major_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.fref_disciplinechedcodes_majorlist, '<?php echo $ref_disciplinechedcodes_major_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="fref_disciplinechedcodes_majorlist" id="fref_disciplinechedcodes_majorlist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="ref_disciplinechedcodes_major">
<div id="gmp_ref_disciplinechedcodes_major" class="upGridMiddlePanel">
<?php if ($ref_disciplinechedcodes_major_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $ref_disciplinechedcodes_major->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$ref_disciplinechedcodes_major_list->RenderListOptions();

// Render list options (header, left)
$ref_disciplinechedcodes_major_list->ListOptions->Render("header", "left");
?>
<?php if ($ref_disciplinechedcodes_major->disCHED_discipline_id->Visible) { // disCHED_discipline_id ?>
	<?php if ($ref_disciplinechedcodes_major->SortUrl($ref_disciplinechedcodes_major->disCHED_discipline_id) == "") { ?>
		<td><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $ref_disciplinechedcodes_major->SortUrl($ref_disciplinechedcodes_major->disCHED_discipline_id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_id->FldCaption() ?></td><td style="width: 10px;"><?php if ($ref_disciplinechedcodes_major->disCHED_discipline_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_disciplinechedcodes_major->disCHED_discipline_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($ref_disciplinechedcodes_major->disCHED_discipline_code->Visible) { // disCHED_discipline_code ?>
	<?php if ($ref_disciplinechedcodes_major->SortUrl($ref_disciplinechedcodes_major->disCHED_discipline_code) == "") { ?>
		<td><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_code->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $ref_disciplinechedcodes_major->SortUrl($ref_disciplinechedcodes_major->disCHED_discipline_code) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_code->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($ref_disciplinechedcodes_major->disCHED_discipline_code->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_disciplinechedcodes_major->disCHED_discipline_code->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($ref_disciplinechedcodes_major->disCHED_discipline_name->Visible) { // disCHED_discipline_name ?>
	<?php if ($ref_disciplinechedcodes_major->SortUrl($ref_disciplinechedcodes_major->disCHED_discipline_name) == "") { ?>
		<td><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $ref_disciplinechedcodes_major->SortUrl($ref_disciplinechedcodes_major->disCHED_discipline_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($ref_disciplinechedcodes_major->disCHED_discipline_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_disciplinechedcodes_major->disCHED_discipline_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($ref_disciplinechedcodes_major->disCHED_discipline_acronym->Visible) { // disCHED_discipline_acronym ?>
	<?php if ($ref_disciplinechedcodes_major->SortUrl($ref_disciplinechedcodes_major->disCHED_discipline_acronym) == "") { ?>
		<td><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_acronym->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $ref_disciplinechedcodes_major->SortUrl($ref_disciplinechedcodes_major->disCHED_discipline_acronym) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_acronym->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($ref_disciplinechedcodes_major->disCHED_discipline_acronym->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_disciplinechedcodes_major->disCHED_discipline_acronym->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$ref_disciplinechedcodes_major_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($ref_disciplinechedcodes_major->ExportAll && $ref_disciplinechedcodes_major->Export <> "") {
	$ref_disciplinechedcodes_major_list->StopRec = $ref_disciplinechedcodes_major_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ref_disciplinechedcodes_major_list->TotalRecs > $ref_disciplinechedcodes_major_list->StartRec + $ref_disciplinechedcodes_major_list->DisplayRecs - 1)
		$ref_disciplinechedcodes_major_list->StopRec = $ref_disciplinechedcodes_major_list->StartRec + $ref_disciplinechedcodes_major_list->DisplayRecs - 1;
	else
		$ref_disciplinechedcodes_major_list->StopRec = $ref_disciplinechedcodes_major_list->TotalRecs;
}
$ref_disciplinechedcodes_major_list->RecCnt = $ref_disciplinechedcodes_major_list->StartRec - 1;
if ($ref_disciplinechedcodes_major_list->Recordset && !$ref_disciplinechedcodes_major_list->Recordset->EOF) {
	$ref_disciplinechedcodes_major_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $ref_disciplinechedcodes_major_list->StartRec > 1)
		$ref_disciplinechedcodes_major_list->Recordset->Move($ref_disciplinechedcodes_major_list->StartRec - 1);
} elseif (!$ref_disciplinechedcodes_major->AllowAddDeleteRow && $ref_disciplinechedcodes_major_list->StopRec == 0) {
	$ref_disciplinechedcodes_major_list->StopRec = $ref_disciplinechedcodes_major->GridAddRowCount;
}

// Initialize aggregate
$ref_disciplinechedcodes_major->RowType = UP_ROWTYPE_AGGREGATEINIT;
$ref_disciplinechedcodes_major->ResetAttrs();
$ref_disciplinechedcodes_major_list->RenderRow();
$ref_disciplinechedcodes_major_list->RowCnt = 0;
while ($ref_disciplinechedcodes_major_list->RecCnt < $ref_disciplinechedcodes_major_list->StopRec) {
	$ref_disciplinechedcodes_major_list->RecCnt++;
	if (intval($ref_disciplinechedcodes_major_list->RecCnt) >= intval($ref_disciplinechedcodes_major_list->StartRec)) {
		$ref_disciplinechedcodes_major_list->RowCnt++;

		// Set up key count
		$ref_disciplinechedcodes_major_list->KeyCount = $ref_disciplinechedcodes_major_list->RowIndex;

		// Init row class and style
		$ref_disciplinechedcodes_major->ResetAttrs();
		$ref_disciplinechedcodes_major->CssClass = "";
		if ($ref_disciplinechedcodes_major->CurrentAction == "gridadd") {
		} else {
			$ref_disciplinechedcodes_major_list->LoadRowValues($ref_disciplinechedcodes_major_list->Recordset); // Load row values
		}
		$ref_disciplinechedcodes_major->RowType = UP_ROWTYPE_VIEW; // Render view
		$ref_disciplinechedcodes_major->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$ref_disciplinechedcodes_major_list->RenderRow();

		// Render list options
		$ref_disciplinechedcodes_major_list->RenderListOptions();
?>
	<tr<?php echo $ref_disciplinechedcodes_major->RowAttributes() ?>>
<?php

// Render list options (body, left)
$ref_disciplinechedcodes_major_list->ListOptions->Render("body", "left");
?>
	<?php if ($ref_disciplinechedcodes_major->disCHED_discipline_id->Visible) { // disCHED_discipline_id ?>
		<td<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_id->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_id->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_id->ListViewValue() ?></div>
<a name="<?php echo $ref_disciplinechedcodes_major_list->PageObjName . "_row_" . $ref_disciplinechedcodes_major_list->RowCnt ?>" id="<?php echo $ref_disciplinechedcodes_major_list->PageObjName . "_row_" . $ref_disciplinechedcodes_major_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($ref_disciplinechedcodes_major->disCHED_discipline_code->Visible) { // disCHED_discipline_code ?>
		<td<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_code->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_code->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($ref_disciplinechedcodes_major->disCHED_discipline_name->Visible) { // disCHED_discipline_name ?>
		<td<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_name->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_name->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($ref_disciplinechedcodes_major->disCHED_discipline_acronym->Visible) { // disCHED_discipline_acronym ?>
		<td<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_acronym->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_acronym->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_acronym->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ref_disciplinechedcodes_major_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($ref_disciplinechedcodes_major->CurrentAction <> "gridadd")
		$ref_disciplinechedcodes_major_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($ref_disciplinechedcodes_major_list->Recordset)
	$ref_disciplinechedcodes_major_list->Recordset->Close();
?>
<?php if ($ref_disciplinechedcodes_major_list->TotalRecs > 0) { ?>
<?php if ($ref_disciplinechedcodes_major->Export == "") { ?>
<div class="upGridLowerPanel">
<?php if ($ref_disciplinechedcodes_major->CurrentAction <> "gridadd" && $ref_disciplinechedcodes_major->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($ref_disciplinechedcodes_major_list->Pager)) $ref_disciplinechedcodes_major_list->Pager = new cPrevNextPager($ref_disciplinechedcodes_major_list->StartRec, $ref_disciplinechedcodes_major_list->DisplayRecs, $ref_disciplinechedcodes_major_list->TotalRecs) ?>
<?php if ($ref_disciplinechedcodes_major_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($ref_disciplinechedcodes_major_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $ref_disciplinechedcodes_major_list->PageUrl() ?>start=<?php echo $ref_disciplinechedcodes_major_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($ref_disciplinechedcodes_major_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $ref_disciplinechedcodes_major_list->PageUrl() ?>start=<?php echo $ref_disciplinechedcodes_major_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $ref_disciplinechedcodes_major_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($ref_disciplinechedcodes_major_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $ref_disciplinechedcodes_major_list->PageUrl() ?>start=<?php echo $ref_disciplinechedcodes_major_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($ref_disciplinechedcodes_major_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $ref_disciplinechedcodes_major_list->PageUrl() ?>start=<?php echo $ref_disciplinechedcodes_major_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $ref_disciplinechedcodes_major_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ref_disciplinechedcodes_major_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ref_disciplinechedcodes_major_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ref_disciplinechedcodes_major_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($ref_disciplinechedcodes_major_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $ref_disciplinechedcodes_major_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php if ($ref_disciplinechedcodes_minor->DetailAdd && $Security->AllowAdd('ref_disciplinechedcodes_minor')) { ?>
<a class="upGridLink" href="<?php echo $ref_disciplinechedcodes_major->AddUrl() . "?" . UP_TABLE_SHOW_DETAIL . "=ref_disciplinechedcodes_minor" ?>"><?php echo $Language->Phrase("AddLink") ?>&nbsp;<?php echo $ref_disciplinechedcodes_major->TableCaption() ?>/<?php echo $ref_disciplinechedcodes_minor->TableCaption() ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
<?php if ($ref_disciplinechedcodes_major_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.fref_disciplinechedcodes_majorlist, '<?php echo $ref_disciplinechedcodes_major_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($ref_disciplinechedcodes_major->Export == "" && $ref_disciplinechedcodes_major->CurrentAction == "") { ?>
<?php } ?>
<?php
$ref_disciplinechedcodes_major_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($ref_disciplinechedcodes_major->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ref_disciplinechedcodes_major_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_disciplinechedcodes_major_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'ref_disciplinechedcodes_major';

	// Page object name
	var $PageObjName = 'ref_disciplinechedcodes_major_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_disciplinechedcodes_major;
		if ($ref_disciplinechedcodes_major->UseTokenInUrl) $PageUrl .= "t=" . $ref_disciplinechedcodes_major->TableVar . "&"; // Add page token
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
		global $objForm, $ref_disciplinechedcodes_major;
		if ($ref_disciplinechedcodes_major->UseTokenInUrl) {
			if ($objForm)
				return ($ref_disciplinechedcodes_major->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_disciplinechedcodes_major->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_disciplinechedcodes_major_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_disciplinechedcodes_major)
		if (!isset($GLOBALS["ref_disciplinechedcodes_major"])) {
			$GLOBALS["ref_disciplinechedcodes_major"] = new cref_disciplinechedcodes_major();
			$GLOBALS["Table"] =& $GLOBALS["ref_disciplinechedcodes_major"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "ref_disciplinechedcodes_majoradd.php?" . UP_TABLE_SHOW_DETAIL . "=";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "ref_disciplinechedcodes_majordelete.php";
		$this->MultiUpdateUrl = "ref_disciplinechedcodes_majorupdate.php";

		// Table object (ref_disciplinechedcodes_minor)
		if (!isset($GLOBALS['ref_disciplinechedcodes_minor'])) $GLOBALS['ref_disciplinechedcodes_minor'] = new cref_disciplinechedcodes_minor();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_disciplinechedcodes_major', TRUE);

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
		global $ref_disciplinechedcodes_major;

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
			$ref_disciplinechedcodes_major->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $ref_disciplinechedcodes_major;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($ref_disciplinechedcodes_major->Export <> "" ||
				$ref_disciplinechedcodes_major->CurrentAction == "gridadd" ||
				$ref_disciplinechedcodes_major->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$ref_disciplinechedcodes_major->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($ref_disciplinechedcodes_major->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $ref_disciplinechedcodes_major->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$ref_disciplinechedcodes_major->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$ref_disciplinechedcodes_major->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$ref_disciplinechedcodes_major->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $ref_disciplinechedcodes_major->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$ref_disciplinechedcodes_major->setSessionWhere($sFilter);
		$ref_disciplinechedcodes_major->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $ref_disciplinechedcodes_major;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $ref_disciplinechedcodes_major->disCHED_discipline_code, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $ref_disciplinechedcodes_major->disCHED_discipline_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $ref_disciplinechedcodes_major->disCHED_discipline_acronym, $Keyword);
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
		global $Security, $ref_disciplinechedcodes_major;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $ref_disciplinechedcodes_major->BasicSearchKeyword;
		$sSearchType = $ref_disciplinechedcodes_major->BasicSearchType;
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
			$ref_disciplinechedcodes_major->setSessionBasicSearchKeyword($sSearchKeyword);
			$ref_disciplinechedcodes_major->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $ref_disciplinechedcodes_major;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$ref_disciplinechedcodes_major->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $ref_disciplinechedcodes_major;
		$ref_disciplinechedcodes_major->setSessionBasicSearchKeyword("");
		$ref_disciplinechedcodes_major->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $ref_disciplinechedcodes_major;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$ref_disciplinechedcodes_major->BasicSearchKeyword = $ref_disciplinechedcodes_major->getSessionBasicSearchKeyword();
			$ref_disciplinechedcodes_major->BasicSearchType = $ref_disciplinechedcodes_major->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $ref_disciplinechedcodes_major;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$ref_disciplinechedcodes_major->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$ref_disciplinechedcodes_major->CurrentOrderType = @$_GET["ordertype"];
			$ref_disciplinechedcodes_major->UpdateSort($ref_disciplinechedcodes_major->disCHED_discipline_id); // disCHED_discipline_id
			$ref_disciplinechedcodes_major->UpdateSort($ref_disciplinechedcodes_major->disCHED_discipline_code); // disCHED_discipline_code
			$ref_disciplinechedcodes_major->UpdateSort($ref_disciplinechedcodes_major->disCHED_discipline_name); // disCHED_discipline_name
			$ref_disciplinechedcodes_major->UpdateSort($ref_disciplinechedcodes_major->disCHED_discipline_acronym); // disCHED_discipline_acronym
			$ref_disciplinechedcodes_major->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $ref_disciplinechedcodes_major;
		$sOrderBy = $ref_disciplinechedcodes_major->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($ref_disciplinechedcodes_major->SqlOrderBy() <> "") {
				$sOrderBy = $ref_disciplinechedcodes_major->SqlOrderBy();
				$ref_disciplinechedcodes_major->setSessionOrderBy($sOrderBy);
				$ref_disciplinechedcodes_major->disCHED_discipline_name->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $ref_disciplinechedcodes_major;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$ref_disciplinechedcodes_major->setSessionOrderBy($sOrderBy);
				$ref_disciplinechedcodes_major->disCHED_discipline_id->setSort("");
				$ref_disciplinechedcodes_major->disCHED_discipline_code->setSort("");
				$ref_disciplinechedcodes_major->disCHED_discipline_name->setSort("");
				$ref_disciplinechedcodes_major->disCHED_discipline_acronym->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$ref_disciplinechedcodes_major->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $ref_disciplinechedcodes_major;

		// "edit"
		$item =& $this->ListOptions->Add("edit");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanEdit();
		$item->OnLeft = TRUE;

		// "detail_ref_disciplinechedcodes_minor"
		$item =& $this->ListOptions->Add("detail_ref_disciplinechedcodes_minor");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->AllowList('ref_disciplinechedcodes_minor');
		$item->OnLeft = TRUE;

		// "checkbox"
		$item =& $this->ListOptions->Add("checkbox");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanDelete();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"ref_disciplinechedcodes_major_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $ref_disciplinechedcodes_major, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
		}

		// "detail_ref_disciplinechedcodes_minor"
		$oListOpt =& $this->ListOptions->Items["detail_ref_disciplinechedcodes_minor"];
		if ($Security->AllowList('ref_disciplinechedcodes_minor')) {
			$oListOpt->Body = "<img src=\"phpimages/detail.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("DetailLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("DetailLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . $Language->TablePhrase("ref_disciplinechedcodes_minor", "TblCaption");
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"ref_disciplinechedcodes_minorlist.php?" . UP_TABLE_SHOW_MASTER . "=ref_disciplinechedcodes_major&disCHED_discipline_code=" . urlencode(strval($ref_disciplinechedcodes_major->disCHED_discipline_code->CurrentValue)) . "\">" . $oListOpt->Body . "</a>";
			$links = "";
			if ($GLOBALS["ref_disciplinechedcodes_minor"]->DetailEdit && $Security->CanEdit() && $Security->AllowEdit('ref_disciplinechedcodes_minor'))
				$links .= "<a class=\"upRowLink\" href=\"" . $ref_disciplinechedcodes_major->EditUrl(UP_TABLE_SHOW_DETAIL . "=ref_disciplinechedcodes_minor") . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>&nbsp;";
			if ($links <> "") $oListOpt->Body .= "<br>" . $links;
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($ref_disciplinechedcodes_major->disCHED_discipline_id->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $ref_disciplinechedcodes_major;
		$sSqlWrk = "`disCHED_discipline_code`='" . up_AdjustSql($ref_disciplinechedcodes_major->disCHED_discipline_code->CurrentValue) . "'";
		$sSqlWrk = TEAencrypt($sSqlWrk, UP_RANDOM_KEY);
		$sSqlWrk = str_replace("'", "\'", $sSqlWrk);
		$sHyperLinkParm = " href=\"ref_disciplinechedcodes_minorlist.php?" . UP_TABLE_SHOW_MASTER . "=ref_disciplinechedcodes_major&disCHED_discipline_code=" . urlencode(strval($ref_disciplinechedcodes_major->disCHED_discipline_code->CurrentValue)) . "\"";
		$oListOpt =& $this->ListOptions->Items["detail_ref_disciplinechedcodes_minor"];
		$oListOpt->Body = $Language->TablePhrase("ref_disciplinechedcodes_minor", "TblCaption");
		$oListOpt->Body = "<a class=\"upRowLink\"" . $sHyperLinkParm . ">" . $oListOpt->Body . "</a>";
		$sHyperLinkParm = " href=\"javascript:void(0);\" name=\"dl%i_ref_disciplinechedcodes_major_ref_disciplinechedcodes_minor\" id=\"dl%i_ref_disciplinechedcodes_major_ref_disciplinechedcodes_minor\" onclick=\"up_AjaxShowDetails2(event, this, 'ref_disciplinechedcodes_minorpreview.php?f=%s')\"";		
		$sHyperLinkParm = str_replace("%i", $this->RowCnt, $sHyperLinkParm);
		$sHyperLinkParm = str_replace("%s", $sSqlWrk, $sHyperLinkParm);
		$oListOpt->Body = "<a" . $sHyperLinkParm . "><img class=\"upPreviewRowImage\" src=\"phpimages/expand.gif\" width=\"9\" height=\"9\" border=\"0\"></a>&nbsp;" . $oListOpt->Body;
		$links = "";
		if ($GLOBALS["ref_disciplinechedcodes_minor"]->DetailEdit && $Security->CanEdit() && $Security->AllowEdit('ref_disciplinechedcodes_minor'))
			$links .= "<a class=\"upRowLink\" href=\"" . $ref_disciplinechedcodes_major->EditUrl(UP_TABLE_SHOW_DETAIL . "=ref_disciplinechedcodes_minor") . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>&nbsp;";
		if ($links <> "") $oListOpt->Body .= "<br>" . $links;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $ref_disciplinechedcodes_major;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$ref_disciplinechedcodes_major->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$ref_disciplinechedcodes_major->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $ref_disciplinechedcodes_major->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$ref_disciplinechedcodes_major->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$ref_disciplinechedcodes_major->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$ref_disciplinechedcodes_major->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $ref_disciplinechedcodes_major;
		$ref_disciplinechedcodes_major->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$ref_disciplinechedcodes_major->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $ref_disciplinechedcodes_major;

		// Call Recordset Selecting event
		$ref_disciplinechedcodes_major->Recordset_Selecting($ref_disciplinechedcodes_major->CurrentFilter);

		// Load List page SQL
		$sSql = $ref_disciplinechedcodes_major->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$ref_disciplinechedcodes_major->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_disciplinechedcodes_major;
		$sFilter = $ref_disciplinechedcodes_major->KeyFilter();

		// Call Row Selecting event
		$ref_disciplinechedcodes_major->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_disciplinechedcodes_major->CurrentFilter = $sFilter;
		$sSql = $ref_disciplinechedcodes_major->SQL();
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
		global $conn, $ref_disciplinechedcodes_major;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_disciplinechedcodes_major->Row_Selected($row);
		$ref_disciplinechedcodes_major->disCHED_discipline_id->setDbValue($rs->fields('disCHED_discipline_id'));
		$ref_disciplinechedcodes_major->disCHED_discipline_code->setDbValue($rs->fields('disCHED_discipline_code'));
		$ref_disciplinechedcodes_major->disCHED_discipline_name->setDbValue($rs->fields('disCHED_discipline_name'));
		$ref_disciplinechedcodes_major->disCHED_discipline_acronym->setDbValue($rs->fields('disCHED_discipline_acronym'));
	}

	// Load old record
	function LoadOldRecord() {
		global $ref_disciplinechedcodes_major;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($ref_disciplinechedcodes_major->getKey("disCHED_discipline_id")) <> "")
			$ref_disciplinechedcodes_major->disCHED_discipline_id->CurrentValue = $ref_disciplinechedcodes_major->getKey("disCHED_discipline_id"); // disCHED_discipline_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$ref_disciplinechedcodes_major->CurrentFilter = $ref_disciplinechedcodes_major->KeyFilter();
			$sSql = $ref_disciplinechedcodes_major->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_disciplinechedcodes_major;

		// Initialize URLs
		$this->ViewUrl = $ref_disciplinechedcodes_major->ViewUrl();
		$this->EditUrl = $ref_disciplinechedcodes_major->EditUrl();
		$this->InlineEditUrl = $ref_disciplinechedcodes_major->InlineEditUrl();
		$this->CopyUrl = $ref_disciplinechedcodes_major->CopyUrl();
		$this->InlineCopyUrl = $ref_disciplinechedcodes_major->InlineCopyUrl();
		$this->DeleteUrl = $ref_disciplinechedcodes_major->DeleteUrl();

		// Call Row_Rendering event
		$ref_disciplinechedcodes_major->Row_Rendering();

		// Common render codes for all row types
		// disCHED_discipline_id
		// disCHED_discipline_code
		// disCHED_discipline_name
		// disCHED_discipline_acronym

		if ($ref_disciplinechedcodes_major->RowType == UP_ROWTYPE_VIEW) { // View row

			// disCHED_discipline_id
			$ref_disciplinechedcodes_major->disCHED_discipline_id->ViewValue = $ref_disciplinechedcodes_major->disCHED_discipline_id->CurrentValue;
			$ref_disciplinechedcodes_major->disCHED_discipline_id->ViewCustomAttributes = "";

			// disCHED_discipline_code
			$ref_disciplinechedcodes_major->disCHED_discipline_code->ViewValue = $ref_disciplinechedcodes_major->disCHED_discipline_code->CurrentValue;
			$ref_disciplinechedcodes_major->disCHED_discipline_code->ViewCustomAttributes = "";

			// disCHED_discipline_name
			$ref_disciplinechedcodes_major->disCHED_discipline_name->ViewValue = $ref_disciplinechedcodes_major->disCHED_discipline_name->CurrentValue;
			$ref_disciplinechedcodes_major->disCHED_discipline_name->ViewCustomAttributes = "";

			// disCHED_discipline_acronym
			$ref_disciplinechedcodes_major->disCHED_discipline_acronym->ViewValue = $ref_disciplinechedcodes_major->disCHED_discipline_acronym->CurrentValue;
			$ref_disciplinechedcodes_major->disCHED_discipline_acronym->ViewCustomAttributes = "";

			// disCHED_discipline_id
			$ref_disciplinechedcodes_major->disCHED_discipline_id->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_major->disCHED_discipline_id->HrefValue = "";
			$ref_disciplinechedcodes_major->disCHED_discipline_id->TooltipValue = "";

			// disCHED_discipline_code
			$ref_disciplinechedcodes_major->disCHED_discipline_code->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_major->disCHED_discipline_code->HrefValue = "";
			$ref_disciplinechedcodes_major->disCHED_discipline_code->TooltipValue = "";

			// disCHED_discipline_name
			$ref_disciplinechedcodes_major->disCHED_discipline_name->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_major->disCHED_discipline_name->HrefValue = "";
			$ref_disciplinechedcodes_major->disCHED_discipline_name->TooltipValue = "";

			// disCHED_discipline_acronym
			$ref_disciplinechedcodes_major->disCHED_discipline_acronym->LinkCustomAttributes = "";
			$ref_disciplinechedcodes_major->disCHED_discipline_acronym->HrefValue = "";
			$ref_disciplinechedcodes_major->disCHED_discipline_acronym->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($ref_disciplinechedcodes_major->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_disciplinechedcodes_major->Row_Rendered();
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
		$table = 'ref_disciplinechedcodes_major';
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
