<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "audittrailinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$audittrail_list = new caudittrail_list();
$Page =& $audittrail_list;

// Page init
$audittrail_list->Page_Init();

// Page main
$audittrail_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($audittrail->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var audittrail_list = new up_Page("audittrail_list");

// page properties
audittrail_list.PageID = "list"; // page ID
audittrail_list.FormID = "faudittraillist"; // form ID
var UP_PAGE_ID = audittrail_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
audittrail_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
audittrail_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
audittrail_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
audittrail_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($audittrail->Export == "") || (UP_EXPORT_MASTER_RECORD && $audittrail->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$audittrail_list->TotalRecs = $audittrail->SelectRecordCount();
	} else {
		if ($audittrail_list->Recordset = $audittrail_list->LoadRecordset())
			$audittrail_list->TotalRecs = $audittrail_list->Recordset->RecordCount();
	}
	$audittrail_list->StartRec = 1;
	if ($audittrail_list->DisplayRecs <= 0 || ($audittrail->Export <> "" && $audittrail->ExportAll)) // Display all records
		$audittrail_list->DisplayRecs = $audittrail_list->TotalRecs;
	if (!($audittrail->Export <> "" && $audittrail->ExportAll))
		$audittrail_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$audittrail_list->Recordset = $audittrail_list->LoadRecordset($audittrail_list->StartRec-1, $audittrail_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $audittrail->TableCaption() ?>
&nbsp;&nbsp;<?php $audittrail_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($audittrail->Export == "" && $audittrail->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(audittrail_list);" style="text-decoration: none;"><img id="audittrail_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="audittrail_list_SearchPanel">
<form name="faudittraillistsrch" id="faudittraillistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="audittrail">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($audittrail->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $audittrail_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($audittrail->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($audittrail->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($audittrail->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $audittrail_list->ShowPageHeader(); ?>
<?php
$audittrail_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($audittrail->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($audittrail->CurrentAction <> "gridadd" && $audittrail->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($audittrail_list->Pager)) $audittrail_list->Pager = new cPrevNextPager($audittrail_list->StartRec, $audittrail_list->DisplayRecs, $audittrail_list->TotalRecs) ?>
<?php if ($audittrail_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($audittrail_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $audittrail_list->PageUrl() ?>start=<?php echo $audittrail_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($audittrail_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $audittrail_list->PageUrl() ?>start=<?php echo $audittrail_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $audittrail_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($audittrail_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $audittrail_list->PageUrl() ?>start=<?php echo $audittrail_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($audittrail_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $audittrail_list->PageUrl() ?>start=<?php echo $audittrail_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $audittrail_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $audittrail_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $audittrail_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $audittrail_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($audittrail_list->SearchWhere == "0=101") { ?>
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
<?php if ($audittrail_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.faudittraillist, '<?php echo $audittrail_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="faudittraillist" id="faudittraillist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="audittrail">
<div id="gmp_audittrail" class="upGridMiddlePanel">
<?php if ($audittrail_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $audittrail->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$audittrail_list->RenderListOptions();

// Render list options (header, left)
$audittrail_list->ListOptions->Render("header", "left");
?>
<?php if ($audittrail->id->Visible) { // id ?>
	<?php if ($audittrail->SortUrl($audittrail->id) == "") { ?>
		<td><?php echo $audittrail->id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $audittrail->SortUrl($audittrail->id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $audittrail->id->FldCaption() ?></td><td style="width: 10px;"><?php if ($audittrail->id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($audittrail->id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($audittrail->datetime->Visible) { // datetime ?>
	<?php if ($audittrail->SortUrl($audittrail->datetime) == "") { ?>
		<td><?php echo $audittrail->datetime->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $audittrail->SortUrl($audittrail->datetime) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $audittrail->datetime->FldCaption() ?></td><td style="width: 10px;"><?php if ($audittrail->datetime->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($audittrail->datetime->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($audittrail->script->Visible) { // script ?>
	<?php if ($audittrail->SortUrl($audittrail->script) == "") { ?>
		<td><?php echo $audittrail->script->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $audittrail->SortUrl($audittrail->script) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $audittrail->script->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($audittrail->script->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($audittrail->script->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($audittrail->user->Visible) { // user ?>
	<?php if ($audittrail->SortUrl($audittrail->user) == "") { ?>
		<td><?php echo $audittrail->user->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $audittrail->SortUrl($audittrail->user) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $audittrail->user->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($audittrail->user->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($audittrail->user->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($audittrail->action->Visible) { // action ?>
	<?php if ($audittrail->SortUrl($audittrail->action) == "") { ?>
		<td><?php echo $audittrail->action->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $audittrail->SortUrl($audittrail->action) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $audittrail->action->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($audittrail->action->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($audittrail->action->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($audittrail->ztable->Visible) { // table ?>
	<?php if ($audittrail->SortUrl($audittrail->ztable) == "") { ?>
		<td><?php echo $audittrail->ztable->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $audittrail->SortUrl($audittrail->ztable) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $audittrail->ztable->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($audittrail->ztable->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($audittrail->ztable->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($audittrail->zfield->Visible) { // field ?>
	<?php if ($audittrail->SortUrl($audittrail->zfield) == "") { ?>
		<td><?php echo $audittrail->zfield->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $audittrail->SortUrl($audittrail->zfield) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $audittrail->zfield->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($audittrail->zfield->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($audittrail->zfield->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$audittrail_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($audittrail->ExportAll && $audittrail->Export <> "") {
	$audittrail_list->StopRec = $audittrail_list->TotalRecs;
} else {

	// Set the last record to display
	if ($audittrail_list->TotalRecs > $audittrail_list->StartRec + $audittrail_list->DisplayRecs - 1)
		$audittrail_list->StopRec = $audittrail_list->StartRec + $audittrail_list->DisplayRecs - 1;
	else
		$audittrail_list->StopRec = $audittrail_list->TotalRecs;
}
$audittrail_list->RecCnt = $audittrail_list->StartRec - 1;
if ($audittrail_list->Recordset && !$audittrail_list->Recordset->EOF) {
	$audittrail_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $audittrail_list->StartRec > 1)
		$audittrail_list->Recordset->Move($audittrail_list->StartRec - 1);
} elseif (!$audittrail->AllowAddDeleteRow && $audittrail_list->StopRec == 0) {
	$audittrail_list->StopRec = $audittrail->GridAddRowCount;
}

// Initialize aggregate
$audittrail->RowType = UP_ROWTYPE_AGGREGATEINIT;
$audittrail->ResetAttrs();
$audittrail_list->RenderRow();
$audittrail_list->RowCnt = 0;
while ($audittrail_list->RecCnt < $audittrail_list->StopRec) {
	$audittrail_list->RecCnt++;
	if (intval($audittrail_list->RecCnt) >= intval($audittrail_list->StartRec)) {
		$audittrail_list->RowCnt++;

		// Set up key count
		$audittrail_list->KeyCount = $audittrail_list->RowIndex;

		// Init row class and style
		$audittrail->ResetAttrs();
		$audittrail->CssClass = "";
		if ($audittrail->CurrentAction == "gridadd") {
		} else {
			$audittrail_list->LoadRowValues($audittrail_list->Recordset); // Load row values
		}
		$audittrail->RowType = UP_ROWTYPE_VIEW; // Render view
		$audittrail->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$audittrail_list->RenderRow();

		// Render list options
		$audittrail_list->RenderListOptions();
?>
	<tr<?php echo $audittrail->RowAttributes() ?>>
<?php

// Render list options (body, left)
$audittrail_list->ListOptions->Render("body", "left");
?>
	<?php if ($audittrail->id->Visible) { // id ?>
		<td<?php echo $audittrail->id->CellAttributes() ?>>
<div<?php echo $audittrail->id->ViewAttributes() ?>><?php echo $audittrail->id->ListViewValue() ?></div>
<a name="<?php echo $audittrail_list->PageObjName . "_row_" . $audittrail_list->RowCnt ?>" id="<?php echo $audittrail_list->PageObjName . "_row_" . $audittrail_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($audittrail->datetime->Visible) { // datetime ?>
		<td<?php echo $audittrail->datetime->CellAttributes() ?>>
<div<?php echo $audittrail->datetime->ViewAttributes() ?>><?php echo $audittrail->datetime->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($audittrail->script->Visible) { // script ?>
		<td<?php echo $audittrail->script->CellAttributes() ?>>
<div<?php echo $audittrail->script->ViewAttributes() ?>><?php echo $audittrail->script->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($audittrail->user->Visible) { // user ?>
		<td<?php echo $audittrail->user->CellAttributes() ?>>
<div<?php echo $audittrail->user->ViewAttributes() ?>><?php echo $audittrail->user->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($audittrail->action->Visible) { // action ?>
		<td<?php echo $audittrail->action->CellAttributes() ?>>
<div<?php echo $audittrail->action->ViewAttributes() ?>><?php echo $audittrail->action->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($audittrail->ztable->Visible) { // table ?>
		<td<?php echo $audittrail->ztable->CellAttributes() ?>>
<div<?php echo $audittrail->ztable->ViewAttributes() ?>><?php echo $audittrail->ztable->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($audittrail->zfield->Visible) { // field ?>
		<td<?php echo $audittrail->zfield->CellAttributes() ?>>
<div<?php echo $audittrail->zfield->ViewAttributes() ?>><?php echo $audittrail->zfield->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$audittrail_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($audittrail->CurrentAction <> "gridadd")
		$audittrail_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($audittrail_list->Recordset)
	$audittrail_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($audittrail->Export == "" && $audittrail->CurrentAction == "") { ?>
<?php } ?>
<?php
$audittrail_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($audittrail->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$audittrail_list->Page_Terminate();
?>
<?php

//
// Page class
//
class caudittrail_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'audittrail';

	// Page object name
	var $PageObjName = 'audittrail_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $audittrail;
		if ($audittrail->UseTokenInUrl) $PageUrl .= "t=" . $audittrail->TableVar . "&"; // Add page token
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
		global $objForm, $audittrail;
		if ($audittrail->UseTokenInUrl) {
			if ($objForm)
				return ($audittrail->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($audittrail->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function caudittrail_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (audittrail)
		if (!isset($GLOBALS["audittrail"])) {
			$GLOBALS["audittrail"] = new caudittrail();
			$GLOBALS["Table"] =& $GLOBALS["audittrail"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "audittrailadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "audittraildelete.php";
		$this->MultiUpdateUrl = "audittrailupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'audittrail', TRUE);

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
		global $audittrail;

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
			$audittrail->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $audittrail;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($audittrail->Export <> "" ||
				$audittrail->CurrentAction == "gridadd" ||
				$audittrail->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$audittrail->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($audittrail->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $audittrail->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$audittrail->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$audittrail->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$audittrail->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $audittrail->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$audittrail->setSessionWhere($sFilter);
		$audittrail->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $audittrail;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $audittrail->script, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $audittrail->user, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $audittrail->action, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $audittrail->ztable, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $audittrail->zfield, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $audittrail->keyvalue, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $audittrail->oldvalue, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $audittrail->newvalue, $Keyword);
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
		global $Security, $audittrail;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $audittrail->BasicSearchKeyword;
		$sSearchType = $audittrail->BasicSearchType;
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
			$audittrail->setSessionBasicSearchKeyword($sSearchKeyword);
			$audittrail->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $audittrail;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$audittrail->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $audittrail;
		$audittrail->setSessionBasicSearchKeyword("");
		$audittrail->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $audittrail;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$audittrail->BasicSearchKeyword = $audittrail->getSessionBasicSearchKeyword();
			$audittrail->BasicSearchType = $audittrail->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $audittrail;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$audittrail->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$audittrail->CurrentOrderType = @$_GET["ordertype"];
			$audittrail->UpdateSort($audittrail->id); // id
			$audittrail->UpdateSort($audittrail->datetime); // datetime
			$audittrail->UpdateSort($audittrail->script); // script
			$audittrail->UpdateSort($audittrail->user); // user
			$audittrail->UpdateSort($audittrail->action); // action
			$audittrail->UpdateSort($audittrail->ztable); // table
			$audittrail->UpdateSort($audittrail->zfield); // field
			$audittrail->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $audittrail;
		$sOrderBy = $audittrail->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($audittrail->SqlOrderBy() <> "") {
				$sOrderBy = $audittrail->SqlOrderBy();
				$audittrail->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $audittrail;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$audittrail->setSessionOrderBy($sOrderBy);
				$audittrail->id->setSort("");
				$audittrail->datetime->setSort("");
				$audittrail->script->setSort("");
				$audittrail->user->setSort("");
				$audittrail->action->setSort("");
				$audittrail->ztable->setSort("");
				$audittrail->zfield->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$audittrail->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $audittrail;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"audittrail_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $audittrail, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($audittrail->id->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $audittrail;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $audittrail;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$audittrail->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$audittrail->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $audittrail->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$audittrail->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$audittrail->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$audittrail->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $audittrail;
		$audittrail->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$audittrail->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $audittrail;

		// Call Recordset Selecting event
		$audittrail->Recordset_Selecting($audittrail->CurrentFilter);

		// Load List page SQL
		$sSql = $audittrail->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$audittrail->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $audittrail;
		$sFilter = $audittrail->KeyFilter();

		// Call Row Selecting event
		$audittrail->Row_Selecting($sFilter);

		// Load SQL based on filter
		$audittrail->CurrentFilter = $sFilter;
		$sSql = $audittrail->SQL();
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
		global $conn, $audittrail;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$audittrail->Row_Selected($row);
		$audittrail->id->setDbValue($rs->fields('id'));
		$audittrail->datetime->setDbValue($rs->fields('datetime'));
		$audittrail->script->setDbValue($rs->fields('script'));
		$audittrail->user->setDbValue($rs->fields('user'));
		$audittrail->action->setDbValue($rs->fields('action'));
		$audittrail->ztable->setDbValue($rs->fields('table'));
		$audittrail->zfield->setDbValue($rs->fields('field'));
		$audittrail->keyvalue->setDbValue($rs->fields('keyvalue'));
		$audittrail->oldvalue->setDbValue($rs->fields('oldvalue'));
		$audittrail->newvalue->setDbValue($rs->fields('newvalue'));
	}

	// Load old record
	function LoadOldRecord() {
		global $audittrail;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($audittrail->getKey("id")) <> "")
			$audittrail->id->CurrentValue = $audittrail->getKey("id"); // id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$audittrail->CurrentFilter = $audittrail->KeyFilter();
			$sSql = $audittrail->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $audittrail;

		// Initialize URLs
		$this->ViewUrl = $audittrail->ViewUrl();
		$this->EditUrl = $audittrail->EditUrl();
		$this->InlineEditUrl = $audittrail->InlineEditUrl();
		$this->CopyUrl = $audittrail->CopyUrl();
		$this->InlineCopyUrl = $audittrail->InlineCopyUrl();
		$this->DeleteUrl = $audittrail->DeleteUrl();

		// Call Row_Rendering event
		$audittrail->Row_Rendering();

		// Common render codes for all row types
		// id
		// datetime
		// script
		// user
		// action
		// table
		// field
		// keyvalue
		// oldvalue
		// newvalue

		if ($audittrail->RowType == UP_ROWTYPE_VIEW) { // View row

			// id
			$audittrail->id->ViewValue = $audittrail->id->CurrentValue;
			$audittrail->id->ViewCustomAttributes = "";

			// datetime
			$audittrail->datetime->ViewValue = $audittrail->datetime->CurrentValue;
			$audittrail->datetime->ViewValue = up_FormatDateTime($audittrail->datetime->ViewValue, 6);
			$audittrail->datetime->ViewCustomAttributes = "";

			// script
			$audittrail->script->ViewValue = $audittrail->script->CurrentValue;
			$audittrail->script->ViewCustomAttributes = "";

			// user
			$audittrail->user->ViewValue = $audittrail->user->CurrentValue;
			$audittrail->user->ViewCustomAttributes = "";

			// action
			$audittrail->action->ViewValue = $audittrail->action->CurrentValue;
			$audittrail->action->ViewCustomAttributes = "";

			// table
			$audittrail->ztable->ViewValue = $audittrail->ztable->CurrentValue;
			$audittrail->ztable->ViewCustomAttributes = "";

			// field
			$audittrail->zfield->ViewValue = $audittrail->zfield->CurrentValue;
			$audittrail->zfield->ViewCustomAttributes = "";

			// id
			$audittrail->id->LinkCustomAttributes = "";
			$audittrail->id->HrefValue = "";
			$audittrail->id->TooltipValue = "";

			// datetime
			$audittrail->datetime->LinkCustomAttributes = "";
			$audittrail->datetime->HrefValue = "";
			$audittrail->datetime->TooltipValue = "";

			// script
			$audittrail->script->LinkCustomAttributes = "";
			$audittrail->script->HrefValue = "";
			$audittrail->script->TooltipValue = "";

			// user
			$audittrail->user->LinkCustomAttributes = "";
			$audittrail->user->HrefValue = "";
			$audittrail->user->TooltipValue = "";

			// action
			$audittrail->action->LinkCustomAttributes = "";
			$audittrail->action->HrefValue = "";
			$audittrail->action->TooltipValue = "";

			// table
			$audittrail->ztable->LinkCustomAttributes = "";
			$audittrail->ztable->HrefValue = "";
			$audittrail->ztable->TooltipValue = "";

			// field
			$audittrail->zfield->LinkCustomAttributes = "";
			$audittrail->zfield->HrefValue = "";
			$audittrail->zfield->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($audittrail->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$audittrail->Row_Rendered();
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
		$table = 'audittrail';
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
