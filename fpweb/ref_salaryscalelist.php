<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "ref_salaryscaleinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$ref_salaryscale_list = new cref_salaryscale_list();
$Page =& $ref_salaryscale_list;

// Page init
$ref_salaryscale_list->Page_Init();

// Page main
$ref_salaryscale_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($ref_salaryscale->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var ref_salaryscale_list = new up_Page("ref_salaryscale_list");

// page properties
ref_salaryscale_list.PageID = "list"; // page ID
ref_salaryscale_list.FormID = "fref_salaryscalelist"; // form ID
var UP_PAGE_ID = ref_salaryscale_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
ref_salaryscale_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ref_salaryscale_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
ref_salaryscale_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ref_salaryscale_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($ref_salaryscale->Export == "") || (UP_EXPORT_MASTER_RECORD && $ref_salaryscale->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$ref_salaryscale_list->TotalRecs = $ref_salaryscale->SelectRecordCount();
	} else {
		if ($ref_salaryscale_list->Recordset = $ref_salaryscale_list->LoadRecordset())
			$ref_salaryscale_list->TotalRecs = $ref_salaryscale_list->Recordset->RecordCount();
	}
	$ref_salaryscale_list->StartRec = 1;
	if ($ref_salaryscale_list->DisplayRecs <= 0 || ($ref_salaryscale->Export <> "" && $ref_salaryscale->ExportAll)) // Display all records
		$ref_salaryscale_list->DisplayRecs = $ref_salaryscale_list->TotalRecs;
	if (!($ref_salaryscale->Export <> "" && $ref_salaryscale->ExportAll))
		$ref_salaryscale_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$ref_salaryscale_list->Recordset = $ref_salaryscale_list->LoadRecordset($ref_salaryscale_list->StartRec-1, $ref_salaryscale_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $ref_salaryscale->TableCaption() ?>
&nbsp;&nbsp;<?php $ref_salaryscale_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($ref_salaryscale->Export == "" && $ref_salaryscale->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(ref_salaryscale_list);" style="text-decoration: none;"><img id="ref_salaryscale_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="ref_salaryscale_list_SearchPanel">
<form name="fref_salaryscalelistsrch" id="fref_salaryscalelistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="ref_salaryscale">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($ref_salaryscale->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $ref_salaryscale_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($ref_salaryscale->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($ref_salaryscale->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($ref_salaryscale->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $ref_salaryscale_list->ShowPageHeader(); ?>
<?php
$ref_salaryscale_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($ref_salaryscale->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($ref_salaryscale->CurrentAction <> "gridadd" && $ref_salaryscale->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($ref_salaryscale_list->Pager)) $ref_salaryscale_list->Pager = new cPrevNextPager($ref_salaryscale_list->StartRec, $ref_salaryscale_list->DisplayRecs, $ref_salaryscale_list->TotalRecs) ?>
<?php if ($ref_salaryscale_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($ref_salaryscale_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $ref_salaryscale_list->PageUrl() ?>start=<?php echo $ref_salaryscale_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($ref_salaryscale_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $ref_salaryscale_list->PageUrl() ?>start=<?php echo $ref_salaryscale_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $ref_salaryscale_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($ref_salaryscale_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $ref_salaryscale_list->PageUrl() ?>start=<?php echo $ref_salaryscale_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($ref_salaryscale_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $ref_salaryscale_list->PageUrl() ?>start=<?php echo $ref_salaryscale_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $ref_salaryscale_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ref_salaryscale_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ref_salaryscale_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ref_salaryscale_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($ref_salaryscale_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $ref_salaryscale_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($ref_salaryscale_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.fref_salaryscalelist, '<?php echo $ref_salaryscale_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="fref_salaryscalelist" id="fref_salaryscalelist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="ref_salaryscale">
<div id="gmp_ref_salaryscale" class="upGridMiddlePanel">
<?php if ($ref_salaryscale_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $ref_salaryscale->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$ref_salaryscale_list->RenderListOptions();

// Render list options (header, left)
$ref_salaryscale_list->ListOptions->Render("header", "left");
?>
<?php if ($ref_salaryscale->salaryScale_code->Visible) { // salaryScale_code ?>
	<?php if ($ref_salaryscale->SortUrl($ref_salaryscale->salaryScale_code) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $ref_salaryscale->salaryScale_code->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $ref_salaryscale->SortUrl($ref_salaryscale->salaryScale_code) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $ref_salaryscale->salaryScale_code->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($ref_salaryscale->salaryScale_code->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_salaryscale->salaryScale_code->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($ref_salaryscale->salaryScale_sg->Visible) { // salaryScale_sg ?>
	<?php if ($ref_salaryscale->SortUrl($ref_salaryscale->salaryScale_sg) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $ref_salaryscale->salaryScale_sg->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $ref_salaryscale->SortUrl($ref_salaryscale->salaryScale_sg) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $ref_salaryscale->salaryScale_sg->FldCaption() ?></td><td style="width: 10px;"><?php if ($ref_salaryscale->salaryScale_sg->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_salaryscale->salaryScale_sg->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($ref_salaryscale->salaryScale_step->Visible) { // salaryScale_step ?>
	<?php if ($ref_salaryscale->SortUrl($ref_salaryscale->salaryScale_step) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $ref_salaryscale->salaryScale_step->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $ref_salaryscale->SortUrl($ref_salaryscale->salaryScale_step) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $ref_salaryscale->salaryScale_step->FldCaption() ?></td><td style="width: 10px;"><?php if ($ref_salaryscale->salaryScale_step->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_salaryscale->salaryScale_step->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($ref_salaryscale->salaryScale_monthlyRate->Visible) { // salaryScale_monthlyRate ?>
	<?php if ($ref_salaryscale->SortUrl($ref_salaryscale->salaryScale_monthlyRate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $ref_salaryscale->salaryScale_monthlyRate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $ref_salaryscale->SortUrl($ref_salaryscale->salaryScale_monthlyRate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $ref_salaryscale->salaryScale_monthlyRate->FldCaption() ?></td><td style="width: 10px;"><?php if ($ref_salaryscale->salaryScale_monthlyRate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_salaryscale->salaryScale_monthlyRate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($ref_salaryscale->salaryScale_status->Visible) { // salaryScale_status ?>
	<?php if ($ref_salaryscale->SortUrl($ref_salaryscale->salaryScale_status) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $ref_salaryscale->salaryScale_status->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $ref_salaryscale->SortUrl($ref_salaryscale->salaryScale_status) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $ref_salaryscale->salaryScale_status->FldCaption() ?></td><td style="width: 10px;"><?php if ($ref_salaryscale->salaryScale_status->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($ref_salaryscale->salaryScale_status->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$ref_salaryscale_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($ref_salaryscale->ExportAll && $ref_salaryscale->Export <> "") {
	$ref_salaryscale_list->StopRec = $ref_salaryscale_list->TotalRecs;
} else {

	// Set the last record to display
	if ($ref_salaryscale_list->TotalRecs > $ref_salaryscale_list->StartRec + $ref_salaryscale_list->DisplayRecs - 1)
		$ref_salaryscale_list->StopRec = $ref_salaryscale_list->StartRec + $ref_salaryscale_list->DisplayRecs - 1;
	else
		$ref_salaryscale_list->StopRec = $ref_salaryscale_list->TotalRecs;
}
$ref_salaryscale_list->RecCnt = $ref_salaryscale_list->StartRec - 1;
if ($ref_salaryscale_list->Recordset && !$ref_salaryscale_list->Recordset->EOF) {
	$ref_salaryscale_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $ref_salaryscale_list->StartRec > 1)
		$ref_salaryscale_list->Recordset->Move($ref_salaryscale_list->StartRec - 1);
} elseif (!$ref_salaryscale->AllowAddDeleteRow && $ref_salaryscale_list->StopRec == 0) {
	$ref_salaryscale_list->StopRec = $ref_salaryscale->GridAddRowCount;
}

// Initialize aggregate
$ref_salaryscale->RowType = UP_ROWTYPE_AGGREGATEINIT;
$ref_salaryscale->ResetAttrs();
$ref_salaryscale_list->RenderRow();
$ref_salaryscale_list->RowCnt = 0;
while ($ref_salaryscale_list->RecCnt < $ref_salaryscale_list->StopRec) {
	$ref_salaryscale_list->RecCnt++;
	if (intval($ref_salaryscale_list->RecCnt) >= intval($ref_salaryscale_list->StartRec)) {
		$ref_salaryscale_list->RowCnt++;

		// Set up key count
		$ref_salaryscale_list->KeyCount = $ref_salaryscale_list->RowIndex;

		// Init row class and style
		$ref_salaryscale->ResetAttrs();
		$ref_salaryscale->CssClass = "";
		if ($ref_salaryscale->CurrentAction == "gridadd") {
		} else {
			$ref_salaryscale_list->LoadRowValues($ref_salaryscale_list->Recordset); // Load row values
		}
		$ref_salaryscale->RowType = UP_ROWTYPE_VIEW; // Render view
		$ref_salaryscale->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$ref_salaryscale_list->RenderRow();

		// Render list options
		$ref_salaryscale_list->RenderListOptions();
?>
	<tr<?php echo $ref_salaryscale->RowAttributes() ?>>
<?php

// Render list options (body, left)
$ref_salaryscale_list->ListOptions->Render("body", "left");
?>
	<?php if ($ref_salaryscale->salaryScale_code->Visible) { // salaryScale_code ?>
		<td<?php echo $ref_salaryscale->salaryScale_code->CellAttributes() ?>>
<div<?php echo $ref_salaryscale->salaryScale_code->ViewAttributes() ?>><?php echo $ref_salaryscale->salaryScale_code->ListViewValue() ?></div>
<a name="<?php echo $ref_salaryscale_list->PageObjName . "_row_" . $ref_salaryscale_list->RowCnt ?>" id="<?php echo $ref_salaryscale_list->PageObjName . "_row_" . $ref_salaryscale_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($ref_salaryscale->salaryScale_sg->Visible) { // salaryScale_sg ?>
		<td<?php echo $ref_salaryscale->salaryScale_sg->CellAttributes() ?>>
<div<?php echo $ref_salaryscale->salaryScale_sg->ViewAttributes() ?>><?php echo $ref_salaryscale->salaryScale_sg->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($ref_salaryscale->salaryScale_step->Visible) { // salaryScale_step ?>
		<td<?php echo $ref_salaryscale->salaryScale_step->CellAttributes() ?>>
<div<?php echo $ref_salaryscale->salaryScale_step->ViewAttributes() ?>><?php echo $ref_salaryscale->salaryScale_step->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($ref_salaryscale->salaryScale_monthlyRate->Visible) { // salaryScale_monthlyRate ?>
		<td<?php echo $ref_salaryscale->salaryScale_monthlyRate->CellAttributes() ?>>
<div<?php echo $ref_salaryscale->salaryScale_monthlyRate->ViewAttributes() ?>><?php echo $ref_salaryscale->salaryScale_monthlyRate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($ref_salaryscale->salaryScale_status->Visible) { // salaryScale_status ?>
		<td<?php echo $ref_salaryscale->salaryScale_status->CellAttributes() ?>>
<div<?php echo $ref_salaryscale->salaryScale_status->ViewAttributes() ?>><?php echo $ref_salaryscale->salaryScale_status->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ref_salaryscale_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($ref_salaryscale->CurrentAction <> "gridadd")
		$ref_salaryscale_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($ref_salaryscale_list->Recordset)
	$ref_salaryscale_list->Recordset->Close();
?>
<?php if ($ref_salaryscale_list->TotalRecs > 0) { ?>
<?php if ($ref_salaryscale->Export == "") { ?>
<div class="upGridLowerPanel">
<?php if ($ref_salaryscale->CurrentAction <> "gridadd" && $ref_salaryscale->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($ref_salaryscale_list->Pager)) $ref_salaryscale_list->Pager = new cPrevNextPager($ref_salaryscale_list->StartRec, $ref_salaryscale_list->DisplayRecs, $ref_salaryscale_list->TotalRecs) ?>
<?php if ($ref_salaryscale_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($ref_salaryscale_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $ref_salaryscale_list->PageUrl() ?>start=<?php echo $ref_salaryscale_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($ref_salaryscale_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $ref_salaryscale_list->PageUrl() ?>start=<?php echo $ref_salaryscale_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $ref_salaryscale_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($ref_salaryscale_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $ref_salaryscale_list->PageUrl() ?>start=<?php echo $ref_salaryscale_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($ref_salaryscale_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $ref_salaryscale_list->PageUrl() ?>start=<?php echo $ref_salaryscale_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $ref_salaryscale_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $ref_salaryscale_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $ref_salaryscale_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $ref_salaryscale_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($ref_salaryscale_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $ref_salaryscale_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($ref_salaryscale_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.fref_salaryscalelist, '<?php echo $ref_salaryscale_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($ref_salaryscale->Export == "" && $ref_salaryscale->CurrentAction == "") { ?>
<?php } ?>
<?php
$ref_salaryscale_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($ref_salaryscale->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ref_salaryscale_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cref_salaryscale_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'ref_salaryscale';

	// Page object name
	var $PageObjName = 'ref_salaryscale_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $ref_salaryscale;
		if ($ref_salaryscale->UseTokenInUrl) $PageUrl .= "t=" . $ref_salaryscale->TableVar . "&"; // Add page token
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
		global $objForm, $ref_salaryscale;
		if ($ref_salaryscale->UseTokenInUrl) {
			if ($objForm)
				return ($ref_salaryscale->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ref_salaryscale->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cref_salaryscale_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (ref_salaryscale)
		if (!isset($GLOBALS["ref_salaryscale"])) {
			$GLOBALS["ref_salaryscale"] = new cref_salaryscale();
			$GLOBALS["Table"] =& $GLOBALS["ref_salaryscale"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "ref_salaryscaleadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "ref_salaryscaledelete.php";
		$this->MultiUpdateUrl = "ref_salaryscaleupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'ref_salaryscale', TRUE);

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
		global $ref_salaryscale;

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
			$ref_salaryscale->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $ref_salaryscale;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($ref_salaryscale->Export <> "" ||
				$ref_salaryscale->CurrentAction == "gridadd" ||
				$ref_salaryscale->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$ref_salaryscale->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($ref_salaryscale->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $ref_salaryscale->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$ref_salaryscale->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$ref_salaryscale->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$ref_salaryscale->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $ref_salaryscale->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$ref_salaryscale->setSessionWhere($sFilter);
		$ref_salaryscale->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $ref_salaryscale;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $ref_salaryscale->salaryScale_ID, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $ref_salaryscale->salaryScale_code, $Keyword);
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
		global $Security, $ref_salaryscale;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $ref_salaryscale->BasicSearchKeyword;
		$sSearchType = $ref_salaryscale->BasicSearchType;
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
			$ref_salaryscale->setSessionBasicSearchKeyword($sSearchKeyword);
			$ref_salaryscale->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $ref_salaryscale;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$ref_salaryscale->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $ref_salaryscale;
		$ref_salaryscale->setSessionBasicSearchKeyword("");
		$ref_salaryscale->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $ref_salaryscale;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$ref_salaryscale->BasicSearchKeyword = $ref_salaryscale->getSessionBasicSearchKeyword();
			$ref_salaryscale->BasicSearchType = $ref_salaryscale->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $ref_salaryscale;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$ref_salaryscale->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$ref_salaryscale->CurrentOrderType = @$_GET["ordertype"];
			$ref_salaryscale->UpdateSort($ref_salaryscale->salaryScale_code); // salaryScale_code
			$ref_salaryscale->UpdateSort($ref_salaryscale->salaryScale_sg); // salaryScale_sg
			$ref_salaryscale->UpdateSort($ref_salaryscale->salaryScale_step); // salaryScale_step
			$ref_salaryscale->UpdateSort($ref_salaryscale->salaryScale_monthlyRate); // salaryScale_monthlyRate
			$ref_salaryscale->UpdateSort($ref_salaryscale->salaryScale_status); // salaryScale_status
			$ref_salaryscale->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $ref_salaryscale;
		$sOrderBy = $ref_salaryscale->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($ref_salaryscale->SqlOrderBy() <> "") {
				$sOrderBy = $ref_salaryscale->SqlOrderBy();
				$ref_salaryscale->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $ref_salaryscale;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$ref_salaryscale->setSessionOrderBy($sOrderBy);
				$ref_salaryscale->salaryScale_code->setSort("");
				$ref_salaryscale->salaryScale_sg->setSort("");
				$ref_salaryscale->salaryScale_step->setSort("");
				$ref_salaryscale->salaryScale_monthlyRate->setSort("");
				$ref_salaryscale->salaryScale_status->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$ref_salaryscale->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $ref_salaryscale;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"ref_salaryscale_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $ref_salaryscale, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($ref_salaryscale->salaryScale_ID->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $ref_salaryscale;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $ref_salaryscale;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$ref_salaryscale->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$ref_salaryscale->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $ref_salaryscale->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$ref_salaryscale->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$ref_salaryscale->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$ref_salaryscale->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $ref_salaryscale;
		$ref_salaryscale->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$ref_salaryscale->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $ref_salaryscale;

		// Call Recordset Selecting event
		$ref_salaryscale->Recordset_Selecting($ref_salaryscale->CurrentFilter);

		// Load List page SQL
		$sSql = $ref_salaryscale->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$ref_salaryscale->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ref_salaryscale;
		$sFilter = $ref_salaryscale->KeyFilter();

		// Call Row Selecting event
		$ref_salaryscale->Row_Selecting($sFilter);

		// Load SQL based on filter
		$ref_salaryscale->CurrentFilter = $sFilter;
		$sSql = $ref_salaryscale->SQL();
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
		global $conn, $ref_salaryscale;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$ref_salaryscale->Row_Selected($row);
		$ref_salaryscale->salaryScale_ID->setDbValue($rs->fields('salaryScale_ID'));
		$ref_salaryscale->salaryScale_code->setDbValue($rs->fields('salaryScale_code'));
		$ref_salaryscale->salaryScale_sg->setDbValue($rs->fields('salaryScale_sg'));
		$ref_salaryscale->salaryScale_step->setDbValue($rs->fields('salaryScale_step'));
		$ref_salaryscale->salaryScale_monthlyRate->setDbValue($rs->fields('salaryScale_monthlyRate'));
		$ref_salaryscale->salaryScale_annualSalary->setDbValue($rs->fields('salaryScale_annualSalary'));
		$ref_salaryscale->salaryScale_status->setDbValue($rs->fields('salaryScale_status'));
	}

	// Load old record
	function LoadOldRecord() {
		global $ref_salaryscale;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($ref_salaryscale->getKey("salaryScale_ID")) <> "")
			$ref_salaryscale->salaryScale_ID->CurrentValue = $ref_salaryscale->getKey("salaryScale_ID"); // salaryScale_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$ref_salaryscale->CurrentFilter = $ref_salaryscale->KeyFilter();
			$sSql = $ref_salaryscale->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $ref_salaryscale;

		// Initialize URLs
		$this->ViewUrl = $ref_salaryscale->ViewUrl();
		$this->EditUrl = $ref_salaryscale->EditUrl();
		$this->InlineEditUrl = $ref_salaryscale->InlineEditUrl();
		$this->CopyUrl = $ref_salaryscale->CopyUrl();
		$this->InlineCopyUrl = $ref_salaryscale->InlineCopyUrl();
		$this->DeleteUrl = $ref_salaryscale->DeleteUrl();

		// Call Row_Rendering event
		$ref_salaryscale->Row_Rendering();

		// Common render codes for all row types
		// salaryScale_ID

		$ref_salaryscale->salaryScale_ID->CellCssStyle = "white-space: nowrap;";

		// salaryScale_code
		$ref_salaryscale->salaryScale_code->CellCssStyle = "white-space: nowrap;";

		// salaryScale_sg
		$ref_salaryscale->salaryScale_sg->CellCssStyle = "white-space: nowrap;";

		// salaryScale_step
		$ref_salaryscale->salaryScale_step->CellCssStyle = "white-space: nowrap;";

		// salaryScale_monthlyRate
		$ref_salaryscale->salaryScale_monthlyRate->CellCssStyle = "white-space: nowrap;";

		// salaryScale_annualSalary
		$ref_salaryscale->salaryScale_annualSalary->CellCssStyle = "white-space: nowrap;";

		// salaryScale_status
		$ref_salaryscale->salaryScale_status->CellCssStyle = "white-space: nowrap;";
		if ($ref_salaryscale->RowType == UP_ROWTYPE_VIEW) { // View row

			// salaryScale_code
			$ref_salaryscale->salaryScale_code->ViewValue = $ref_salaryscale->salaryScale_code->CurrentValue;
			$ref_salaryscale->salaryScale_code->ViewCustomAttributes = "";

			// salaryScale_sg
			$ref_salaryscale->salaryScale_sg->ViewValue = $ref_salaryscale->salaryScale_sg->CurrentValue;
			$ref_salaryscale->salaryScale_sg->ViewCustomAttributes = "";

			// salaryScale_step
			$ref_salaryscale->salaryScale_step->ViewValue = $ref_salaryscale->salaryScale_step->CurrentValue;
			$ref_salaryscale->salaryScale_step->ViewCustomAttributes = "";

			// salaryScale_monthlyRate
			$ref_salaryscale->salaryScale_monthlyRate->ViewValue = $ref_salaryscale->salaryScale_monthlyRate->CurrentValue;
			$ref_salaryscale->salaryScale_monthlyRate->ViewCustomAttributes = "";

			// salaryScale_status
			if (strval($ref_salaryscale->salaryScale_status->CurrentValue) <> "") {
				switch ($ref_salaryscale->salaryScale_status->CurrentValue) {
					case "Y":
						$ref_salaryscale->salaryScale_status->ViewValue = $ref_salaryscale->salaryScale_status->FldTagCaption(1) <> "" ? $ref_salaryscale->salaryScale_status->FldTagCaption(1) : $ref_salaryscale->salaryScale_status->CurrentValue;
						break;
					case "N":
						$ref_salaryscale->salaryScale_status->ViewValue = $ref_salaryscale->salaryScale_status->FldTagCaption(2) <> "" ? $ref_salaryscale->salaryScale_status->FldTagCaption(2) : $ref_salaryscale->salaryScale_status->CurrentValue;
						break;
					default:
						$ref_salaryscale->salaryScale_status->ViewValue = $ref_salaryscale->salaryScale_status->CurrentValue;
				}
			} else {
				$ref_salaryscale->salaryScale_status->ViewValue = NULL;
			}
			$ref_salaryscale->salaryScale_status->ViewCustomAttributes = "";

			// salaryScale_code
			$ref_salaryscale->salaryScale_code->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_code->HrefValue = "";
			$ref_salaryscale->salaryScale_code->TooltipValue = "";

			// salaryScale_sg
			$ref_salaryscale->salaryScale_sg->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_sg->HrefValue = "";
			$ref_salaryscale->salaryScale_sg->TooltipValue = "";

			// salaryScale_step
			$ref_salaryscale->salaryScale_step->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_step->HrefValue = "";
			$ref_salaryscale->salaryScale_step->TooltipValue = "";

			// salaryScale_monthlyRate
			$ref_salaryscale->salaryScale_monthlyRate->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_monthlyRate->HrefValue = "";
			$ref_salaryscale->salaryScale_monthlyRate->TooltipValue = "";

			// salaryScale_status
			$ref_salaryscale->salaryScale_status->LinkCustomAttributes = "";
			$ref_salaryscale->salaryScale_status->HrefValue = "";
			$ref_salaryscale->salaryScale_status->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($ref_salaryscale->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$ref_salaryscale->Row_Rendered();
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
		$table = 'ref_salaryscale';
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
