<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_collection_periodinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_collection_period_list = new cfrm_collection_period_list();
$Page =& $frm_collection_period_list;

// Page init
$frm_collection_period_list->Page_Init();

// Page main
$frm_collection_period_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_collection_period->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_collection_period_list = new up_Page("frm_collection_period_list");

// page properties
frm_collection_period_list.PageID = "list"; // page ID
frm_collection_period_list.FormID = "ffrm_collection_periodlist"; // form ID
var UP_PAGE_ID = frm_collection_period_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_collection_period_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_collection_period_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_collection_period_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_collection_period_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_collection_period->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_collection_period->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_collection_period_list->TotalRecs = $frm_collection_period->SelectRecordCount();
	} else {
		if ($frm_collection_period_list->Recordset = $frm_collection_period_list->LoadRecordset())
			$frm_collection_period_list->TotalRecs = $frm_collection_period_list->Recordset->RecordCount();
	}
	$frm_collection_period_list->StartRec = 1;
	if ($frm_collection_period_list->DisplayRecs <= 0 || ($frm_collection_period->Export <> "" && $frm_collection_period->ExportAll)) // Display all records
		$frm_collection_period_list->DisplayRecs = $frm_collection_period_list->TotalRecs;
	if (!($frm_collection_period->Export <> "" && $frm_collection_period->ExportAll))
		$frm_collection_period_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_collection_period_list->Recordset = $frm_collection_period_list->LoadRecordset($frm_collection_period_list->StartRec-1, $frm_collection_period_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_collection_period->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_collection_period_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_collection_period->Export == "" && $frm_collection_period->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_collection_period_list);" style="text-decoration: none;"><img id="frm_collection_period_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_collection_period_list_SearchPanel">
<form name="ffrm_collection_periodlistsrch" id="ffrm_collection_periodlistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_collection_period">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_collection_period->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_collection_period_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_collection_period->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_collection_period->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_collection_period->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_collection_period_list->ShowPageHeader(); ?>
<?php
$frm_collection_period_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_collection_period->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_collection_period->CurrentAction <> "gridadd" && $frm_collection_period->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_collection_period_list->Pager)) $frm_collection_period_list->Pager = new cPrevNextPager($frm_collection_period_list->StartRec, $frm_collection_period_list->DisplayRecs, $frm_collection_period_list->TotalRecs) ?>
<?php if ($frm_collection_period_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_collection_period_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_collection_period_list->PageUrl() ?>start=<?php echo $frm_collection_period_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_collection_period_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_collection_period_list->PageUrl() ?>start=<?php echo $frm_collection_period_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_collection_period_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_collection_period_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_collection_period_list->PageUrl() ?>start=<?php echo $frm_collection_period_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_collection_period_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_collection_period_list->PageUrl() ?>start=<?php echo $frm_collection_period_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_collection_period_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_collection_period_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_collection_period_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_collection_period_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_collection_period_list->SearchWhere == "0=101") { ?>
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
<form name="ffrm_collection_periodlist" id="ffrm_collection_periodlist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_collection_period">
<div id="gmp_frm_collection_period" class="upGridMiddlePanel">
<?php if ($frm_collection_period_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_collection_period->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_collection_period_list->RenderListOptions();

// Render list options (header, left)
$frm_collection_period_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_collection_period->collection_id->Visible) { // collection_id ?>
	<?php if ($frm_collection_period->SortUrl($frm_collection_period->collection_id) == "") { ?>
		<td><?php echo $frm_collection_period->collection_id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_collection_period->SortUrl($frm_collection_period->collection_id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_collection_period->collection_id->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_collection_period->collection_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_collection_period->collection_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_collection_period->collection_year->Visible) { // collection_year ?>
	<?php if ($frm_collection_period->SortUrl($frm_collection_period->collection_year) == "") { ?>
		<td><?php echo $frm_collection_period->collection_year->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_collection_period->SortUrl($frm_collection_period->collection_year) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_collection_period->collection_year->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_collection_period->collection_year->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_collection_period->collection_year->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_collection_period->collection_description->Visible) { // collection_description ?>
	<?php if ($frm_collection_period->SortUrl($frm_collection_period->collection_description) == "") { ?>
		<td><?php echo $frm_collection_period->collection_description->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_collection_period->SortUrl($frm_collection_period->collection_description) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_collection_period->collection_description->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_collection_period->collection_description->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_collection_period->collection_description->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_collection_period->collection_date->Visible) { // collection_date ?>
	<?php if ($frm_collection_period->SortUrl($frm_collection_period->collection_date) == "") { ?>
		<td><?php echo $frm_collection_period->collection_date->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_collection_period->SortUrl($frm_collection_period->collection_date) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_collection_period->collection_date->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_collection_period->collection_date->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_collection_period->collection_date->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_collection_period_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_collection_period->ExportAll && $frm_collection_period->Export <> "") {
	$frm_collection_period_list->StopRec = $frm_collection_period_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_collection_period_list->TotalRecs > $frm_collection_period_list->StartRec + $frm_collection_period_list->DisplayRecs - 1)
		$frm_collection_period_list->StopRec = $frm_collection_period_list->StartRec + $frm_collection_period_list->DisplayRecs - 1;
	else
		$frm_collection_period_list->StopRec = $frm_collection_period_list->TotalRecs;
}
$frm_collection_period_list->RecCnt = $frm_collection_period_list->StartRec - 1;
if ($frm_collection_period_list->Recordset && !$frm_collection_period_list->Recordset->EOF) {
	$frm_collection_period_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_collection_period_list->StartRec > 1)
		$frm_collection_period_list->Recordset->Move($frm_collection_period_list->StartRec - 1);
} elseif (!$frm_collection_period->AllowAddDeleteRow && $frm_collection_period_list->StopRec == 0) {
	$frm_collection_period_list->StopRec = $frm_collection_period->GridAddRowCount;
}

// Initialize aggregate
$frm_collection_period->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_collection_period->ResetAttrs();
$frm_collection_period_list->RenderRow();
$frm_collection_period_list->RowCnt = 0;
while ($frm_collection_period_list->RecCnt < $frm_collection_period_list->StopRec) {
	$frm_collection_period_list->RecCnt++;
	if (intval($frm_collection_period_list->RecCnt) >= intval($frm_collection_period_list->StartRec)) {
		$frm_collection_period_list->RowCnt++;

		// Set up key count
		$frm_collection_period_list->KeyCount = $frm_collection_period_list->RowIndex;

		// Init row class and style
		$frm_collection_period->ResetAttrs();
		$frm_collection_period->CssClass = "";
		if ($frm_collection_period->CurrentAction == "gridadd") {
		} else {
			$frm_collection_period_list->LoadRowValues($frm_collection_period_list->Recordset); // Load row values
		}
		$frm_collection_period->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_collection_period->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_collection_period_list->RenderRow();

		// Render list options
		$frm_collection_period_list->RenderListOptions();
?>
	<tr<?php echo $frm_collection_period->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_collection_period_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_collection_period->collection_id->Visible) { // collection_id ?>
		<td<?php echo $frm_collection_period->collection_id->CellAttributes() ?>>
<div<?php echo $frm_collection_period->collection_id->ViewAttributes() ?>><?php echo $frm_collection_period->collection_id->ListViewValue() ?></div>
<a name="<?php echo $frm_collection_period_list->PageObjName . "_row_" . $frm_collection_period_list->RowCnt ?>" id="<?php echo $frm_collection_period_list->PageObjName . "_row_" . $frm_collection_period_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_collection_period->collection_year->Visible) { // collection_year ?>
		<td<?php echo $frm_collection_period->collection_year->CellAttributes() ?>>
<div<?php echo $frm_collection_period->collection_year->ViewAttributes() ?>><?php echo $frm_collection_period->collection_year->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_collection_period->collection_description->Visible) { // collection_description ?>
		<td<?php echo $frm_collection_period->collection_description->CellAttributes() ?>>
<div<?php echo $frm_collection_period->collection_description->ViewAttributes() ?>><?php echo $frm_collection_period->collection_description->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_collection_period->collection_date->Visible) { // collection_date ?>
		<td<?php echo $frm_collection_period->collection_date->CellAttributes() ?>>
<div<?php echo $frm_collection_period->collection_date->ViewAttributes() ?>><?php echo $frm_collection_period->collection_date->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_collection_period_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_collection_period->CurrentAction <> "gridadd")
		$frm_collection_period_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_collection_period_list->Recordset)
	$frm_collection_period_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_collection_period->Export == "" && $frm_collection_period->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_collection_period_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_collection_period->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_collection_period_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_collection_period_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_collection_period';

	// Page object name
	var $PageObjName = 'frm_collection_period_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_collection_period;
		if ($frm_collection_period->UseTokenInUrl) $PageUrl .= "t=" . $frm_collection_period->TableVar . "&"; // Add page token
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
		global $objForm, $frm_collection_period;
		if ($frm_collection_period->UseTokenInUrl) {
			if ($objForm)
				return ($frm_collection_period->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_collection_period->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_collection_period_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_collection_period)
		if (!isset($GLOBALS["frm_collection_period"])) {
			$GLOBALS["frm_collection_period"] = new cfrm_collection_period();
			$GLOBALS["Table"] =& $GLOBALS["frm_collection_period"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_collection_periodadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_collection_perioddelete.php";
		$this->MultiUpdateUrl = "frm_collection_periodupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_collection_period', TRUE);

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
		global $frm_collection_period;

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
			$frm_collection_period->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_collection_period;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($frm_collection_period->Export <> "" ||
				$frm_collection_period->CurrentAction == "gridadd" ||
				$frm_collection_period->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_collection_period->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_collection_period->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_collection_period->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_collection_period->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_collection_period->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_collection_period->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_collection_period->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$frm_collection_period->setSessionWhere($sFilter);
		$frm_collection_period->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_collection_period;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_collection_period->collection_description, $Keyword);
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
		global $Security, $frm_collection_period;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_collection_period->BasicSearchKeyword;
		$sSearchType = $frm_collection_period->BasicSearchType;
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
			$frm_collection_period->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_collection_period->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_collection_period;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_collection_period->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_collection_period;
		$frm_collection_period->setSessionBasicSearchKeyword("");
		$frm_collection_period->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_collection_period;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_collection_period->BasicSearchKeyword = $frm_collection_period->getSessionBasicSearchKeyword();
			$frm_collection_period->BasicSearchType = $frm_collection_period->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_collection_period;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_collection_period->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_collection_period->CurrentOrderType = @$_GET["ordertype"];
			$frm_collection_period->UpdateSort($frm_collection_period->collection_id); // collection_id
			$frm_collection_period->UpdateSort($frm_collection_period->collection_year); // collection_year
			$frm_collection_period->UpdateSort($frm_collection_period->collection_description); // collection_description
			$frm_collection_period->UpdateSort($frm_collection_period->collection_date); // collection_date
			$frm_collection_period->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_collection_period;
		$sOrderBy = $frm_collection_period->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_collection_period->SqlOrderBy() <> "") {
				$sOrderBy = $frm_collection_period->SqlOrderBy();
				$frm_collection_period->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_collection_period;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_collection_period->setSessionOrderBy($sOrderBy);
				$frm_collection_period->collection_id->setSort("");
				$frm_collection_period->collection_year->setSort("");
				$frm_collection_period->collection_description->setSort("");
				$frm_collection_period->collection_date->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_collection_period->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_collection_period;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_collection_period, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_collection_period;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_collection_period;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_collection_period->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_collection_period->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_collection_period->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_collection_period->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_collection_period->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_collection_period->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_collection_period;
		$frm_collection_period->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_collection_period->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_collection_period;

		// Call Recordset Selecting event
		$frm_collection_period->Recordset_Selecting($frm_collection_period->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_collection_period->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_collection_period->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_collection_period;
		$sFilter = $frm_collection_period->KeyFilter();

		// Call Row Selecting event
		$frm_collection_period->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_collection_period->CurrentFilter = $sFilter;
		$sSql = $frm_collection_period->SQL();
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
		global $conn, $frm_collection_period;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_collection_period->Row_Selected($row);
		$frm_collection_period->collection_id->setDbValue($rs->fields('collection_id'));
		$frm_collection_period->collection_year->setDbValue($rs->fields('collection_year'));
		$frm_collection_period->collection_description->setDbValue($rs->fields('collection_description'));
		$frm_collection_period->collection_date->setDbValue($rs->fields('collection_date'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_collection_period;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_collection_period->getKey("collection_id")) <> "")
			$frm_collection_period->collection_id->CurrentValue = $frm_collection_period->getKey("collection_id"); // collection_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_collection_period->CurrentFilter = $frm_collection_period->KeyFilter();
			$sSql = $frm_collection_period->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_collection_period;

		// Initialize URLs
		$this->ViewUrl = $frm_collection_period->ViewUrl();
		$this->EditUrl = $frm_collection_period->EditUrl();
		$this->InlineEditUrl = $frm_collection_period->InlineEditUrl();
		$this->CopyUrl = $frm_collection_period->CopyUrl();
		$this->InlineCopyUrl = $frm_collection_period->InlineCopyUrl();
		$this->DeleteUrl = $frm_collection_period->DeleteUrl();

		// Call Row_Rendering event
		$frm_collection_period->Row_Rendering();

		// Common render codes for all row types
		// collection_id
		// collection_year
		// collection_description
		// collection_date

		if ($frm_collection_period->RowType == UP_ROWTYPE_VIEW) { // View row

			// collection_id
			$frm_collection_period->collection_id->ViewValue = $frm_collection_period->collection_id->CurrentValue;
			$frm_collection_period->collection_id->ViewCustomAttributes = "";

			// collection_year
			$frm_collection_period->collection_year->ViewValue = $frm_collection_period->collection_year->CurrentValue;
			$frm_collection_period->collection_year->ViewCustomAttributes = "";

			// collection_description
			$frm_collection_period->collection_description->ViewValue = $frm_collection_period->collection_description->CurrentValue;
			$frm_collection_period->collection_description->ViewCustomAttributes = "";

			// collection_date
			$frm_collection_period->collection_date->ViewValue = $frm_collection_period->collection_date->CurrentValue;
			$frm_collection_period->collection_date->ViewValue = up_FormatDateTime($frm_collection_period->collection_date->ViewValue, 6);
			$frm_collection_period->collection_date->ViewCustomAttributes = "";

			// collection_id
			$frm_collection_period->collection_id->LinkCustomAttributes = "";
			$frm_collection_period->collection_id->HrefValue = "";
			$frm_collection_period->collection_id->TooltipValue = "";

			// collection_year
			$frm_collection_period->collection_year->LinkCustomAttributes = "";
			$frm_collection_period->collection_year->HrefValue = "";
			$frm_collection_period->collection_year->TooltipValue = "";

			// collection_description
			$frm_collection_period->collection_description->LinkCustomAttributes = "";
			$frm_collection_period->collection_description->HrefValue = "";
			$frm_collection_period->collection_description->TooltipValue = "";

			// collection_date
			$frm_collection_period->collection_date->LinkCustomAttributes = "";
			$frm_collection_period->collection_date->HrefValue = "";
			$frm_collection_period->collection_date->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_collection_period->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_collection_period->Row_Rendered();
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
