<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "rep_3_1_formainfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$rep_3_1_forma_list = new crep_3_1_forma_list();
$Page =& $rep_3_1_forma_list;

// Page init
$rep_3_1_forma_list->Page_Init();

// Page main
$rep_3_1_forma_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($rep_3_1_forma->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var rep_3_1_forma_list = new up_Page("rep_3_1_forma_list");

// page properties
rep_3_1_forma_list.PageID = "list"; // page ID
rep_3_1_forma_list.FormID = "frep_3_1_formalist"; // form ID
var UP_PAGE_ID = rep_3_1_forma_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
rep_3_1_forma_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
rep_3_1_forma_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
rep_3_1_forma_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
rep_3_1_forma_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($rep_3_1_forma->Export == "") || (UP_EXPORT_MASTER_RECORD && $rep_3_1_forma->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$rep_3_1_forma_list->TotalRecs = $rep_3_1_forma->SelectRecordCount();
	} else {
		if ($rep_3_1_forma_list->Recordset = $rep_3_1_forma_list->LoadRecordset())
			$rep_3_1_forma_list->TotalRecs = $rep_3_1_forma_list->Recordset->RecordCount();
	}
	$rep_3_1_forma_list->StartRec = 1;
	if ($rep_3_1_forma_list->DisplayRecs <= 0 || ($rep_3_1_forma->Export <> "" && $rep_3_1_forma->ExportAll)) // Display all records
		$rep_3_1_forma_list->DisplayRecs = $rep_3_1_forma_list->TotalRecs;
	if (!($rep_3_1_forma->Export <> "" && $rep_3_1_forma->ExportAll))
		$rep_3_1_forma_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rep_3_1_forma_list->Recordset = $rep_3_1_forma_list->LoadRecordset($rep_3_1_forma_list->StartRec-1, $rep_3_1_forma_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeVIEW") ?><?php echo $rep_3_1_forma->TableCaption() ?>
&nbsp;&nbsp;<?php $rep_3_1_forma_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($rep_3_1_forma->Export == "" && $rep_3_1_forma->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(rep_3_1_forma_list);" style="text-decoration: none;"><img id="rep_3_1_forma_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="rep_3_1_forma_list_SearchPanel">
<form name="frep_3_1_formalistsrch" id="frep_3_1_formalistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="rep_3_1_forma">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($rep_3_1_forma->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $rep_3_1_forma_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($rep_3_1_forma->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($rep_3_1_forma->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($rep_3_1_forma->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $rep_3_1_forma_list->ShowPageHeader(); ?>
<?php
$rep_3_1_forma_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($rep_3_1_forma->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($rep_3_1_forma->CurrentAction <> "gridadd" && $rep_3_1_forma->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($rep_3_1_forma_list->Pager)) $rep_3_1_forma_list->Pager = new cPrevNextPager($rep_3_1_forma_list->StartRec, $rep_3_1_forma_list->DisplayRecs, $rep_3_1_forma_list->TotalRecs) ?>
<?php if ($rep_3_1_forma_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($rep_3_1_forma_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $rep_3_1_forma_list->PageUrl() ?>start=<?php echo $rep_3_1_forma_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($rep_3_1_forma_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $rep_3_1_forma_list->PageUrl() ?>start=<?php echo $rep_3_1_forma_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $rep_3_1_forma_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($rep_3_1_forma_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $rep_3_1_forma_list->PageUrl() ?>start=<?php echo $rep_3_1_forma_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($rep_3_1_forma_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $rep_3_1_forma_list->PageUrl() ?>start=<?php echo $rep_3_1_forma_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $rep_3_1_forma_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $rep_3_1_forma_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $rep_3_1_forma_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $rep_3_1_forma_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($rep_3_1_forma_list->SearchWhere == "0=101") { ?>
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
<form name="frep_3_1_formalist" id="frep_3_1_formalist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="rep_3_1_forma">
<div id="gmp_rep_3_1_forma" class="upGridMiddlePanel">
<?php if ($rep_3_1_forma_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $rep_3_1_forma->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$rep_3_1_forma_list->RenderListOptions();

// Render list options (header, left)
$rep_3_1_forma_list->ListOptions->Render("header", "left");
?>
<?php if ($rep_3_1_forma->MFO->Visible) { // MFO ?>
	<?php if ($rep_3_1_forma->SortUrl($rep_3_1_forma->MFO) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $rep_3_1_forma->MFO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $rep_3_1_forma->SortUrl($rep_3_1_forma->MFO) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $rep_3_1_forma->MFO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($rep_3_1_forma->MFO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($rep_3_1_forma->MFO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($rep_3_1_forma->Question->Visible) { // Question ?>
	<?php if ($rep_3_1_forma->SortUrl($rep_3_1_forma->Question) == "") { ?>
		<td style="width: 400px;"><?php echo $rep_3_1_forma->Question->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $rep_3_1_forma->SortUrl($rep_3_1_forma->Question) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="width: 400px;"><thead><tr><td><?php echo $rep_3_1_forma->Question->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($rep_3_1_forma->Question->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($rep_3_1_forma->Question->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($rep_3_1_forma->Sum_2F_Avg->Visible) { // Sum / Avg ?>
	<?php if ($rep_3_1_forma->SortUrl($rep_3_1_forma->Sum_2F_Avg) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $rep_3_1_forma->Sum_2F_Avg->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $rep_3_1_forma->SortUrl($rep_3_1_forma->Sum_2F_Avg) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $rep_3_1_forma->Sum_2F_Avg->FldCaption() ?></td><td style="width: 10px;"><?php if ($rep_3_1_forma->Sum_2F_Avg->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($rep_3_1_forma->Sum_2F_Avg->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($rep_3_1_forma->GAA->Visible) { // GAA ?>
	<?php if ($rep_3_1_forma->SortUrl($rep_3_1_forma->GAA) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $rep_3_1_forma->GAA->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $rep_3_1_forma->SortUrl($rep_3_1_forma->GAA) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $rep_3_1_forma->GAA->FldCaption() ?></td><td style="width: 10px;"><?php if ($rep_3_1_forma->GAA->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($rep_3_1_forma->GAA->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($rep_3_1_forma->Remarks->Visible) { // Remarks ?>
	<?php if ($rep_3_1_forma->SortUrl($rep_3_1_forma->Remarks) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $rep_3_1_forma->Remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $rep_3_1_forma->SortUrl($rep_3_1_forma->Remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $rep_3_1_forma->Remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($rep_3_1_forma->Remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($rep_3_1_forma->Remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($rep_3_1_forma->Participating_Units_Count->Visible) { // Participating Units Count ?>
	<?php if ($rep_3_1_forma->SortUrl($rep_3_1_forma->Participating_Units_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $rep_3_1_forma->Participating_Units_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $rep_3_1_forma->SortUrl($rep_3_1_forma->Participating_Units_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $rep_3_1_forma->Participating_Units_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($rep_3_1_forma->Participating_Units_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($rep_3_1_forma->Participating_Units_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$rep_3_1_forma_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($rep_3_1_forma->ExportAll && $rep_3_1_forma->Export <> "") {
	$rep_3_1_forma_list->StopRec = $rep_3_1_forma_list->TotalRecs;
} else {

	// Set the last record to display
	if ($rep_3_1_forma_list->TotalRecs > $rep_3_1_forma_list->StartRec + $rep_3_1_forma_list->DisplayRecs - 1)
		$rep_3_1_forma_list->StopRec = $rep_3_1_forma_list->StartRec + $rep_3_1_forma_list->DisplayRecs - 1;
	else
		$rep_3_1_forma_list->StopRec = $rep_3_1_forma_list->TotalRecs;
}
$rep_3_1_forma_list->RecCnt = $rep_3_1_forma_list->StartRec - 1;
if ($rep_3_1_forma_list->Recordset && !$rep_3_1_forma_list->Recordset->EOF) {
	$rep_3_1_forma_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $rep_3_1_forma_list->StartRec > 1)
		$rep_3_1_forma_list->Recordset->Move($rep_3_1_forma_list->StartRec - 1);
} elseif (!$rep_3_1_forma->AllowAddDeleteRow && $rep_3_1_forma_list->StopRec == 0) {
	$rep_3_1_forma_list->StopRec = $rep_3_1_forma->GridAddRowCount;
}

// Initialize aggregate
$rep_3_1_forma->RowType = UP_ROWTYPE_AGGREGATEINIT;
$rep_3_1_forma->ResetAttrs();
$rep_3_1_forma_list->RenderRow();
$rep_3_1_forma_list->RowCnt = 0;
while ($rep_3_1_forma_list->RecCnt < $rep_3_1_forma_list->StopRec) {
	$rep_3_1_forma_list->RecCnt++;
	if (intval($rep_3_1_forma_list->RecCnt) >= intval($rep_3_1_forma_list->StartRec)) {
		$rep_3_1_forma_list->RowCnt++;

		// Set up key count
		$rep_3_1_forma_list->KeyCount = $rep_3_1_forma_list->RowIndex;

		// Init row class and style
		$rep_3_1_forma->ResetAttrs();
		$rep_3_1_forma->CssClass = "";
		if ($rep_3_1_forma->CurrentAction == "gridadd") {
		} else {
			$rep_3_1_forma_list->LoadRowValues($rep_3_1_forma_list->Recordset); // Load row values
		}
		$rep_3_1_forma->RowType = UP_ROWTYPE_VIEW; // Render view
		$rep_3_1_forma->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$rep_3_1_forma_list->RenderRow();

		// Render list options
		$rep_3_1_forma_list->RenderListOptions();
?>
	<tr<?php echo $rep_3_1_forma->RowAttributes() ?>>
<?php

// Render list options (body, left)
$rep_3_1_forma_list->ListOptions->Render("body", "left");
?>
	<?php if ($rep_3_1_forma->MFO->Visible) { // MFO ?>
		<td<?php echo $rep_3_1_forma->MFO->CellAttributes() ?>>
<div<?php echo $rep_3_1_forma->MFO->ViewAttributes() ?>><?php echo $rep_3_1_forma->MFO->ListViewValue() ?></div>
<a name="<?php echo $rep_3_1_forma_list->PageObjName . "_row_" . $rep_3_1_forma_list->RowCnt ?>" id="<?php echo $rep_3_1_forma_list->PageObjName . "_row_" . $rep_3_1_forma_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($rep_3_1_forma->Question->Visible) { // Question ?>
		<td<?php echo $rep_3_1_forma->Question->CellAttributes() ?>>
<div<?php echo $rep_3_1_forma->Question->ViewAttributes() ?>><?php echo $rep_3_1_forma->Question->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($rep_3_1_forma->Sum_2F_Avg->Visible) { // Sum / Avg ?>
		<td<?php echo $rep_3_1_forma->Sum_2F_Avg->CellAttributes() ?>>
<div<?php echo $rep_3_1_forma->Sum_2F_Avg->ViewAttributes() ?>><?php echo $rep_3_1_forma->Sum_2F_Avg->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($rep_3_1_forma->GAA->Visible) { // GAA ?>
		<td<?php echo $rep_3_1_forma->GAA->CellAttributes() ?>>
<div<?php echo $rep_3_1_forma->GAA->ViewAttributes() ?>><?php echo $rep_3_1_forma->GAA->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($rep_3_1_forma->Remarks->Visible) { // Remarks ?>
		<td<?php echo $rep_3_1_forma->Remarks->CellAttributes() ?>>
<div<?php echo $rep_3_1_forma->Remarks->ViewAttributes() ?>><?php echo $rep_3_1_forma->Remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($rep_3_1_forma->Participating_Units_Count->Visible) { // Participating Units Count ?>
		<td<?php echo $rep_3_1_forma->Participating_Units_Count->CellAttributes() ?>>
<div<?php echo $rep_3_1_forma->Participating_Units_Count->ViewAttributes() ?>><?php echo $rep_3_1_forma->Participating_Units_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$rep_3_1_forma_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($rep_3_1_forma->CurrentAction <> "gridadd")
		$rep_3_1_forma_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($rep_3_1_forma_list->Recordset)
	$rep_3_1_forma_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($rep_3_1_forma->Export == "" && $rep_3_1_forma->CurrentAction == "") { ?>
<?php } ?>
<?php
$rep_3_1_forma_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($rep_3_1_forma->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$rep_3_1_forma_list->Page_Terminate();
?>
<?php

//
// Page class
//
class crep_3_1_forma_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'rep_3_1_forma';

	// Page object name
	var $PageObjName = 'rep_3_1_forma_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $rep_3_1_forma;
		if ($rep_3_1_forma->UseTokenInUrl) $PageUrl .= "t=" . $rep_3_1_forma->TableVar . "&"; // Add page token
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
		global $objForm, $rep_3_1_forma;
		if ($rep_3_1_forma->UseTokenInUrl) {
			if ($objForm)
				return ($rep_3_1_forma->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($rep_3_1_forma->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function crep_3_1_forma_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (rep_3_1_forma)
		if (!isset($GLOBALS["rep_3_1_forma"])) {
			$GLOBALS["rep_3_1_forma"] = new crep_3_1_forma();
			$GLOBALS["Table"] =& $GLOBALS["rep_3_1_forma"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "rep_3_1_formaadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "rep_3_1_formadelete.php";
		$this->MultiUpdateUrl = "rep_3_1_formaupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'rep_3_1_forma', TRUE);

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
		global $rep_3_1_forma;

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
			$rep_3_1_forma->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $rep_3_1_forma;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($rep_3_1_forma->Export <> "" ||
				$rep_3_1_forma->CurrentAction == "gridadd" ||
				$rep_3_1_forma->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$rep_3_1_forma->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($rep_3_1_forma->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $rep_3_1_forma->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$rep_3_1_forma->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$rep_3_1_forma->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$rep_3_1_forma->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $rep_3_1_forma->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$rep_3_1_forma->setSessionWhere($sFilter);
		$rep_3_1_forma->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $rep_3_1_forma;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $rep_3_1_forma->MFO, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $rep_3_1_forma->Question, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $rep_3_1_forma->Remarks, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $rep_3_1_forma->Participating_Units, $Keyword);
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
		global $Security, $rep_3_1_forma;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $rep_3_1_forma->BasicSearchKeyword;
		$sSearchType = $rep_3_1_forma->BasicSearchType;
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
			$rep_3_1_forma->setSessionBasicSearchKeyword($sSearchKeyword);
			$rep_3_1_forma->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $rep_3_1_forma;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$rep_3_1_forma->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $rep_3_1_forma;
		$rep_3_1_forma->setSessionBasicSearchKeyword("");
		$rep_3_1_forma->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $rep_3_1_forma;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$rep_3_1_forma->BasicSearchKeyword = $rep_3_1_forma->getSessionBasicSearchKeyword();
			$rep_3_1_forma->BasicSearchType = $rep_3_1_forma->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $rep_3_1_forma;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$rep_3_1_forma->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$rep_3_1_forma->CurrentOrderType = @$_GET["ordertype"];
			$rep_3_1_forma->UpdateSort($rep_3_1_forma->MFO); // MFO
			$rep_3_1_forma->UpdateSort($rep_3_1_forma->Question); // Question
			$rep_3_1_forma->UpdateSort($rep_3_1_forma->Sum_2F_Avg); // Sum / Avg
			$rep_3_1_forma->UpdateSort($rep_3_1_forma->GAA); // GAA
			$rep_3_1_forma->UpdateSort($rep_3_1_forma->Remarks); // Remarks
			$rep_3_1_forma->UpdateSort($rep_3_1_forma->Participating_Units_Count); // Participating Units Count
			$rep_3_1_forma->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $rep_3_1_forma;
		$sOrderBy = $rep_3_1_forma->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($rep_3_1_forma->SqlOrderBy() <> "") {
				$sOrderBy = $rep_3_1_forma->SqlOrderBy();
				$rep_3_1_forma->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $rep_3_1_forma;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$rep_3_1_forma->setSessionOrderBy($sOrderBy);
				$rep_3_1_forma->MFO->setSort("");
				$rep_3_1_forma->Question->setSort("");
				$rep_3_1_forma->Sum_2F_Avg->setSort("");
				$rep_3_1_forma->GAA->setSort("");
				$rep_3_1_forma->Remarks->setSort("");
				$rep_3_1_forma->Participating_Units_Count->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$rep_3_1_forma->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $rep_3_1_forma;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $rep_3_1_forma, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $rep_3_1_forma;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $rep_3_1_forma;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$rep_3_1_forma->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$rep_3_1_forma->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $rep_3_1_forma->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$rep_3_1_forma->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$rep_3_1_forma->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$rep_3_1_forma->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $rep_3_1_forma;
		$rep_3_1_forma->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$rep_3_1_forma->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $rep_3_1_forma;

		// Call Recordset Selecting event
		$rep_3_1_forma->Recordset_Selecting($rep_3_1_forma->CurrentFilter);

		// Load List page SQL
		$sSql = $rep_3_1_forma->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$rep_3_1_forma->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $rep_3_1_forma;
		$sFilter = $rep_3_1_forma->KeyFilter();

		// Call Row Selecting event
		$rep_3_1_forma->Row_Selecting($sFilter);

		// Load SQL based on filter
		$rep_3_1_forma->CurrentFilter = $sFilter;
		$sSql = $rep_3_1_forma->SQL();
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
		global $conn, $rep_3_1_forma;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$rep_3_1_forma->Row_Selected($row);
		$rep_3_1_forma->Sequence->setDbValue($rs->fields('Sequence'));
		$rep_3_1_forma->MFO->setDbValue($rs->fields('MFO'));
		$rep_3_1_forma->Question->setDbValue($rs->fields('Question'));
		$rep_3_1_forma->Sum_2F_Avg->setDbValue($rs->fields('Sum / Avg'));
		$rep_3_1_forma->GAA->setDbValue($rs->fields('GAA'));
		$rep_3_1_forma->Remarks->setDbValue($rs->fields('Remarks'));
		$rep_3_1_forma->Participating_Units_Count->setDbValue($rs->fields('Participating Units Count'));
		$rep_3_1_forma->Participating_Units->setDbValue($rs->fields('Participating Units'));
	}

	// Load old record
	function LoadOldRecord() {
		global $rep_3_1_forma;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$rep_3_1_forma->CurrentFilter = $rep_3_1_forma->KeyFilter();
			$sSql = $rep_3_1_forma->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $rep_3_1_forma;

		// Initialize URLs
		$this->ViewUrl = $rep_3_1_forma->ViewUrl();
		$this->EditUrl = $rep_3_1_forma->EditUrl();
		$this->InlineEditUrl = $rep_3_1_forma->InlineEditUrl();
		$this->CopyUrl = $rep_3_1_forma->CopyUrl();
		$this->InlineCopyUrl = $rep_3_1_forma->InlineCopyUrl();
		$this->DeleteUrl = $rep_3_1_forma->DeleteUrl();

		// Call Row_Rendering event
		$rep_3_1_forma->Row_Rendering();

		// Common render codes for all row types
		// Sequence

		$rep_3_1_forma->Sequence->CellCssStyle = "white-space: nowrap;";

		// MFO
		$rep_3_1_forma->MFO->CellCssStyle = "white-space: nowrap;";

		// Question
		$rep_3_1_forma->Question->CellCssStyle = "width: 400px;";

		// Sum / Avg
		$rep_3_1_forma->Sum_2F_Avg->CellCssStyle = "white-space: nowrap;";

		// GAA
		$rep_3_1_forma->GAA->CellCssStyle = "white-space: nowrap;";

		// Remarks
		$rep_3_1_forma->Remarks->CellCssStyle = "white-space: nowrap;";

		// Participating Units Count
		$rep_3_1_forma->Participating_Units_Count->CellCssStyle = "white-space: nowrap;";

		// Participating Units
		$rep_3_1_forma->Participating_Units->CellCssStyle = "white-space: nowrap;";
		if ($rep_3_1_forma->RowType == UP_ROWTYPE_VIEW) { // View row

			// MFO
			$rep_3_1_forma->MFO->ViewValue = $rep_3_1_forma->MFO->CurrentValue;
			$rep_3_1_forma->MFO->ViewCustomAttributes = "";

			// Question
			$rep_3_1_forma->Question->ViewValue = $rep_3_1_forma->Question->CurrentValue;
			$rep_3_1_forma->Question->ViewCustomAttributes = "";

			// Sum / Avg
			$rep_3_1_forma->Sum_2F_Avg->ViewValue = $rep_3_1_forma->Sum_2F_Avg->CurrentValue;
			$rep_3_1_forma->Sum_2F_Avg->ViewCustomAttributes = "";

			// GAA
			$rep_3_1_forma->GAA->ViewValue = $rep_3_1_forma->GAA->CurrentValue;
			$rep_3_1_forma->GAA->ViewCustomAttributes = "";

			// Remarks
			$rep_3_1_forma->Remarks->ViewValue = $rep_3_1_forma->Remarks->CurrentValue;
			$rep_3_1_forma->Remarks->ViewCustomAttributes = "";

			// Participating Units Count
			$rep_3_1_forma->Participating_Units_Count->ViewValue = $rep_3_1_forma->Participating_Units_Count->CurrentValue;
			$rep_3_1_forma->Participating_Units_Count->ViewCustomAttributes = "";

			// MFO
			$rep_3_1_forma->MFO->LinkCustomAttributes = "";
			$rep_3_1_forma->MFO->HrefValue = "";
			$rep_3_1_forma->MFO->TooltipValue = "";

			// Question
			$rep_3_1_forma->Question->LinkCustomAttributes = "";
			$rep_3_1_forma->Question->HrefValue = "";
			$rep_3_1_forma->Question->TooltipValue = "";

			// Sum / Avg
			$rep_3_1_forma->Sum_2F_Avg->LinkCustomAttributes = "";
			$rep_3_1_forma->Sum_2F_Avg->HrefValue = "";
			$rep_3_1_forma->Sum_2F_Avg->TooltipValue = "";

			// GAA
			$rep_3_1_forma->GAA->LinkCustomAttributes = "";
			$rep_3_1_forma->GAA->HrefValue = "";
			$rep_3_1_forma->GAA->TooltipValue = "";

			// Remarks
			$rep_3_1_forma->Remarks->LinkCustomAttributes = "";
			$rep_3_1_forma->Remarks->HrefValue = "";
			$rep_3_1_forma->Remarks->TooltipValue = "";

			// Participating Units Count
			$rep_3_1_forma->Participating_Units_Count->LinkCustomAttributes = "";
			$rep_3_1_forma->Participating_Units_Count->HrefValue = "";
			$rep_3_1_forma->Participating_Units_Count->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($rep_3_1_forma->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$rep_3_1_forma->Row_Rendered();
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
