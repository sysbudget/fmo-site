<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "tbl_collectionperiodinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_collectionperiod_list = new ctbl_collectionperiod_list();
$Page =& $tbl_collectionperiod_list;

// Page init
$tbl_collectionperiod_list->Page_Init();

// Page main
$tbl_collectionperiod_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($tbl_collectionperiod->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_collectionperiod_list = new up_Page("tbl_collectionperiod_list");

// page properties
tbl_collectionperiod_list.PageID = "list"; // page ID
tbl_collectionperiod_list.FormID = "ftbl_collectionperiodlist"; // form ID
var UP_PAGE_ID = tbl_collectionperiod_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_collectionperiod_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_collectionperiod_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_collectionperiod_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_collectionperiod_list.ValidateRequired = false; // no JavaScript validation
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
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-cold-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
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
<?php if (($tbl_collectionperiod->Export == "") || (UP_EXPORT_MASTER_RECORD && $tbl_collectionperiod->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_collectionperiod_list->TotalRecs = $tbl_collectionperiod->SelectRecordCount();
	} else {
		if ($tbl_collectionperiod_list->Recordset = $tbl_collectionperiod_list->LoadRecordset())
			$tbl_collectionperiod_list->TotalRecs = $tbl_collectionperiod_list->Recordset->RecordCount();
	}
	$tbl_collectionperiod_list->StartRec = 1;
	if ($tbl_collectionperiod_list->DisplayRecs <= 0 || ($tbl_collectionperiod->Export <> "" && $tbl_collectionperiod->ExportAll)) // Display all records
		$tbl_collectionperiod_list->DisplayRecs = $tbl_collectionperiod_list->TotalRecs;
	if (!($tbl_collectionperiod->Export <> "" && $tbl_collectionperiod->ExportAll))
		$tbl_collectionperiod_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$tbl_collectionperiod_list->Recordset = $tbl_collectionperiod_list->LoadRecordset($tbl_collectionperiod_list->StartRec-1, $tbl_collectionperiod_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_collectionperiod->TableCaption() ?>
&nbsp;&nbsp;<?php $tbl_collectionperiod_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($tbl_collectionperiod->Export == "" && $tbl_collectionperiod->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(tbl_collectionperiod_list);" style="text-decoration: none;"><img id="tbl_collectionperiod_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="tbl_collectionperiod_list_SearchPanel">
<form name="ftbl_collectionperiodlistsrch" id="ftbl_collectionperiodlistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="tbl_collectionperiod">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($tbl_collectionperiod->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $tbl_collectionperiod_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($tbl_collectionperiod->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_collectionperiod->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_collectionperiod->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $tbl_collectionperiod_list->ShowPageHeader(); ?>
<?php
$tbl_collectionperiod_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($tbl_collectionperiod->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($tbl_collectionperiod->CurrentAction <> "gridadd" && $tbl_collectionperiod->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_collectionperiod_list->Pager)) $tbl_collectionperiod_list->Pager = new cPrevNextPager($tbl_collectionperiod_list->StartRec, $tbl_collectionperiod_list->DisplayRecs, $tbl_collectionperiod_list->TotalRecs) ?>
<?php if ($tbl_collectionperiod_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_collectionperiod_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_collectionperiod_list->PageUrl() ?>start=<?php echo $tbl_collectionperiod_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_collectionperiod_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_collectionperiod_list->PageUrl() ?>start=<?php echo $tbl_collectionperiod_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_collectionperiod_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_collectionperiod_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_collectionperiod_list->PageUrl() ?>start=<?php echo $tbl_collectionperiod_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_collectionperiod_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_collectionperiod_list->PageUrl() ?>start=<?php echo $tbl_collectionperiod_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_collectionperiod_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_collectionperiod_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_collectionperiod_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_collectionperiod_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_collectionperiod_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $tbl_collectionperiod_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_collectionperiod_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ftbl_collectionperiodlist, '<?php echo $tbl_collectionperiod_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ftbl_collectionperiodlist" id="ftbl_collectionperiodlist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="tbl_collectionperiod">
<div id="gmp_tbl_collectionperiod" class="upGridMiddlePanel">
<?php if ($tbl_collectionperiod_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_collectionperiod->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_collectionperiod_list->RenderListOptions();

// Render list options (header, left)
$tbl_collectionperiod_list->ListOptions->Render("header", "left");
?>
<?php if ($tbl_collectionperiod->id_cu->Visible) { // id_cu ?>
	<?php if ($tbl_collectionperiod->SortUrl($tbl_collectionperiod->id_cu) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_collectionperiod->id_cu->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_collectionperiod->SortUrl($tbl_collectionperiod->id_cu) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_collectionperiod->id_cu->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_collectionperiod->id_cu->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_collectionperiod->id_cu->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_collectionperiod->cu_name->Visible) { // cu_name ?>
	<?php if ($tbl_collectionperiod->SortUrl($tbl_collectionperiod->cu_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_collectionperiod->cu_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_collectionperiod->SortUrl($tbl_collectionperiod->cu_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_collectionperiod->cu_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_collectionperiod->cu_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_collectionperiod->cu_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_collectionperiod->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
	<?php if ($tbl_collectionperiod->SortUrl($tbl_collectionperiod->collectionPeriod_cutOffDate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_collectionperiod->SortUrl($tbl_collectionperiod->collectionPeriod_cutOffDate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_collectionperiod->collectionPeriod_cutOffDate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_collectionperiod->collectionPeriod_cutOffDate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_collectionperiod->collectionPeriod_status->Visible) { // collectionPeriod_status ?>
	<?php if ($tbl_collectionperiod->SortUrl($tbl_collectionperiod->collectionPeriod_status) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_collectionperiod->collectionPeriod_status->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_collectionperiod->SortUrl($tbl_collectionperiod->collectionPeriod_status) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_collectionperiod->collectionPeriod_status->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_collectionperiod->collectionPeriod_status->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_collectionperiod->collectionPeriod_status->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_collectionperiod->remarks_cutOffDate->Visible) { // remarks_cutOffDate ?>
	<?php if ($tbl_collectionperiod->SortUrl($tbl_collectionperiod->remarks_cutOffDate) == "") { ?>
		<td><?php echo $tbl_collectionperiod->remarks_cutOffDate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_collectionperiod->SortUrl($tbl_collectionperiod->remarks_cutOffDate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $tbl_collectionperiod->remarks_cutOffDate->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_collectionperiod->remarks_cutOffDate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_collectionperiod->remarks_cutOffDate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_collectionperiod_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($tbl_collectionperiod->ExportAll && $tbl_collectionperiod->Export <> "") {
	$tbl_collectionperiod_list->StopRec = $tbl_collectionperiod_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tbl_collectionperiod_list->TotalRecs > $tbl_collectionperiod_list->StartRec + $tbl_collectionperiod_list->DisplayRecs - 1)
		$tbl_collectionperiod_list->StopRec = $tbl_collectionperiod_list->StartRec + $tbl_collectionperiod_list->DisplayRecs - 1;
	else
		$tbl_collectionperiod_list->StopRec = $tbl_collectionperiod_list->TotalRecs;
}
$tbl_collectionperiod_list->RecCnt = $tbl_collectionperiod_list->StartRec - 1;
if ($tbl_collectionperiod_list->Recordset && !$tbl_collectionperiod_list->Recordset->EOF) {
	$tbl_collectionperiod_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_collectionperiod_list->StartRec > 1)
		$tbl_collectionperiod_list->Recordset->Move($tbl_collectionperiod_list->StartRec - 1);
} elseif (!$tbl_collectionperiod->AllowAddDeleteRow && $tbl_collectionperiod_list->StopRec == 0) {
	$tbl_collectionperiod_list->StopRec = $tbl_collectionperiod->GridAddRowCount;
}

// Initialize aggregate
$tbl_collectionperiod->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_collectionperiod->ResetAttrs();
$tbl_collectionperiod_list->RenderRow();
$tbl_collectionperiod_list->RowCnt = 0;
while ($tbl_collectionperiod_list->RecCnt < $tbl_collectionperiod_list->StopRec) {
	$tbl_collectionperiod_list->RecCnt++;
	if (intval($tbl_collectionperiod_list->RecCnt) >= intval($tbl_collectionperiod_list->StartRec)) {
		$tbl_collectionperiod_list->RowCnt++;

		// Set up key count
		$tbl_collectionperiod_list->KeyCount = $tbl_collectionperiod_list->RowIndex;

		// Init row class and style
		$tbl_collectionperiod->ResetAttrs();
		$tbl_collectionperiod->CssClass = "";
		if ($tbl_collectionperiod->CurrentAction == "gridadd") {
		} else {
			$tbl_collectionperiod_list->LoadRowValues($tbl_collectionperiod_list->Recordset); // Load row values
		}
		$tbl_collectionperiod->RowType = UP_ROWTYPE_VIEW; // Render view
		$tbl_collectionperiod->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$tbl_collectionperiod_list->RenderRow();

		// Render list options
		$tbl_collectionperiod_list->RenderListOptions();
?>
	<tr<?php echo $tbl_collectionperiod->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_collectionperiod_list->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_collectionperiod->id_cu->Visible) { // id_cu ?>
		<td<?php echo $tbl_collectionperiod->id_cu->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->id_cu->ViewAttributes() ?>><?php echo $tbl_collectionperiod->id_cu->ListViewValue() ?></div>
<a name="<?php echo $tbl_collectionperiod_list->PageObjName . "_row_" . $tbl_collectionperiod_list->RowCnt ?>" id="<?php echo $tbl_collectionperiod_list->PageObjName . "_row_" . $tbl_collectionperiod_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($tbl_collectionperiod->cu_name->Visible) { // cu_name ?>
		<td<?php echo $tbl_collectionperiod->cu_name->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->cu_name->ViewAttributes() ?>><?php echo $tbl_collectionperiod->cu_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_collectionperiod->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
		<td<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_collectionperiod->collectionPeriod_status->Visible) { // collectionPeriod_status ?>
		<td<?php echo $tbl_collectionperiod->collectionPeriod_status->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->collectionPeriod_status->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_status->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_collectionperiod->remarks_cutOffDate->Visible) { // remarks_cutOffDate ?>
		<td<?php echo $tbl_collectionperiod->remarks_cutOffDate->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->remarks_cutOffDate->ViewAttributes() ?>><?php echo $tbl_collectionperiod->remarks_cutOffDate->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_collectionperiod_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($tbl_collectionperiod->CurrentAction <> "gridadd")
		$tbl_collectionperiod_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($tbl_collectionperiod_list->Recordset)
	$tbl_collectionperiod_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($tbl_collectionperiod->Export == "" && $tbl_collectionperiod->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_collectionperiod_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($tbl_collectionperiod->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tbl_collectionperiod_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_collectionperiod_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'tbl_collectionperiod';

	// Page object name
	var $PageObjName = 'tbl_collectionperiod_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_collectionperiod;
		if ($tbl_collectionperiod->UseTokenInUrl) $PageUrl .= "t=" . $tbl_collectionperiod->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_collectionperiod;
		if ($tbl_collectionperiod->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_collectionperiod->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_collectionperiod->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_collectionperiod_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_collectionperiod)
		if (!isset($GLOBALS["tbl_collectionperiod"])) {
			$GLOBALS["tbl_collectionperiod"] = new ctbl_collectionperiod();
			$GLOBALS["Table"] =& $GLOBALS["tbl_collectionperiod"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "tbl_collectionperiodadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "tbl_collectionperioddelete.php";
		$this->MultiUpdateUrl = "tbl_collectionperiodupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_collectionperiod', TRUE);

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
		global $tbl_collectionperiod;

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
			$tbl_collectionperiod->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_collectionperiod;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($tbl_collectionperiod->Export <> "" ||
				$tbl_collectionperiod->CurrentAction == "gridadd" ||
				$tbl_collectionperiod->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$tbl_collectionperiod->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($tbl_collectionperiod->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_collectionperiod->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$tbl_collectionperiod->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$tbl_collectionperiod->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $tbl_collectionperiod->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$tbl_collectionperiod->setSessionWhere($sFilter);
		$tbl_collectionperiod->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $tbl_collectionperiod;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $tbl_collectionperiod->cu_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_collectionperiod->collectionPeriod_status, $Keyword);
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
		global $Security, $tbl_collectionperiod;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $tbl_collectionperiod->BasicSearchKeyword;
		$sSearchType = $tbl_collectionperiod->BasicSearchType;
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
			$tbl_collectionperiod->setSessionBasicSearchKeyword($sSearchKeyword);
			$tbl_collectionperiod->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $tbl_collectionperiod;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$tbl_collectionperiod->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $tbl_collectionperiod;
		$tbl_collectionperiod->setSessionBasicSearchKeyword("");
		$tbl_collectionperiod->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $tbl_collectionperiod;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$tbl_collectionperiod->BasicSearchKeyword = $tbl_collectionperiod->getSessionBasicSearchKeyword();
			$tbl_collectionperiod->BasicSearchType = $tbl_collectionperiod->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_collectionperiod;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_collectionperiod->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_collectionperiod->CurrentOrderType = @$_GET["ordertype"];
			$tbl_collectionperiod->UpdateSort($tbl_collectionperiod->id_cu); // id_cu
			$tbl_collectionperiod->UpdateSort($tbl_collectionperiod->cu_name); // cu_name
			$tbl_collectionperiod->UpdateSort($tbl_collectionperiod->collectionPeriod_cutOffDate); // collectionPeriod_cutOffDate
			$tbl_collectionperiod->UpdateSort($tbl_collectionperiod->collectionPeriod_status); // collectionPeriod_status
			$tbl_collectionperiod->UpdateSort($tbl_collectionperiod->remarks_cutOffDate); // remarks_cutOffDate
			$tbl_collectionperiod->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_collectionperiod;
		$sOrderBy = $tbl_collectionperiod->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_collectionperiod->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_collectionperiod->SqlOrderBy();
				$tbl_collectionperiod->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_collectionperiod;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_collectionperiod->setSessionOrderBy($sOrderBy);
				$tbl_collectionperiod->id_cu->setSort("");
				$tbl_collectionperiod->cu_name->setSort("");
				$tbl_collectionperiod->collectionPeriod_cutOffDate->setSort("");
				$tbl_collectionperiod->collectionPeriod_status->setSort("");
				$tbl_collectionperiod->remarks_cutOffDate->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_collectionperiod;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"tbl_collectionperiod_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $tbl_collectionperiod, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($tbl_collectionperiod->collectionPeriod_ID->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_collectionperiod;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_collectionperiod;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_collectionperiod->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_collectionperiod->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $tbl_collectionperiod;
		$tbl_collectionperiod->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$tbl_collectionperiod->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_collectionperiod;

		// Call Recordset Selecting event
		$tbl_collectionperiod->Recordset_Selecting($tbl_collectionperiod->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_collectionperiod->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_collectionperiod->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_collectionperiod;
		$sFilter = $tbl_collectionperiod->KeyFilter();

		// Call Row Selecting event
		$tbl_collectionperiod->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_collectionperiod->CurrentFilter = $sFilter;
		$sSql = $tbl_collectionperiod->SQL();
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
		global $conn, $tbl_collectionperiod;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_collectionperiod->Row_Selected($row);
		$tbl_collectionperiod->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$tbl_collectionperiod->id_cu->setDbValue($rs->fields('id_cu'));
		$tbl_collectionperiod->cu_name->setDbValue($rs->fields('cu_name'));
		$tbl_collectionperiod->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$tbl_collectionperiod->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
		$tbl_collectionperiod->remarks_cutOffDate->setDbValue($rs->fields('remarks_cutOffDate'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_collectionperiod;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($tbl_collectionperiod->getKey("collectionPeriod_ID")) <> "")
			$tbl_collectionperiod->collectionPeriod_ID->CurrentValue = $tbl_collectionperiod->getKey("collectionPeriod_ID"); // collectionPeriod_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_collectionperiod->CurrentFilter = $tbl_collectionperiod->KeyFilter();
			$sSql = $tbl_collectionperiod->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_collectionperiod;

		// Initialize URLs
		$this->ViewUrl = $tbl_collectionperiod->ViewUrl();
		$this->EditUrl = $tbl_collectionperiod->EditUrl();
		$this->InlineEditUrl = $tbl_collectionperiod->InlineEditUrl();
		$this->CopyUrl = $tbl_collectionperiod->CopyUrl();
		$this->InlineCopyUrl = $tbl_collectionperiod->InlineCopyUrl();
		$this->DeleteUrl = $tbl_collectionperiod->DeleteUrl();

		// Call Row_Rendering event
		$tbl_collectionperiod->Row_Rendering();

		// Common render codes for all row types
		// collectionPeriod_ID

		$tbl_collectionperiod->collectionPeriod_ID->CellCssStyle = "white-space: nowrap;";

		// id_cu
		$tbl_collectionperiod->id_cu->CellCssStyle = "white-space: nowrap;";

		// cu_name
		$tbl_collectionperiod->cu_name->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_cutOffDate
		$tbl_collectionperiod->collectionPeriod_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_status
		$tbl_collectionperiod->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";

		// remarks_cutOffDate
		if ($tbl_collectionperiod->RowType == UP_ROWTYPE_VIEW) { // View row

			// id_cu
			$tbl_collectionperiod->id_cu->ViewValue = $tbl_collectionperiod->id_cu->CurrentValue;
			$tbl_collectionperiod->id_cu->ViewCustomAttributes = "";

			// cu_name
			$tbl_collectionperiod->cu_name->ViewValue = $tbl_collectionperiod->cu_name->CurrentValue;
			$tbl_collectionperiod->cu_name->ViewCustomAttributes = "";

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue = $tbl_collectionperiod->collectionPeriod_cutOffDate->CurrentValue;
			$tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue = up_FormatDateTime($tbl_collectionperiod->collectionPeriod_cutOffDate->ViewValue, 6);
			$tbl_collectionperiod->collectionPeriod_cutOffDate->ViewCustomAttributes = "";

			// collectionPeriod_status
			if (strval($tbl_collectionperiod->collectionPeriod_status->CurrentValue) <> "") {
				switch ($tbl_collectionperiod->collectionPeriod_status->CurrentValue) {
					case "A":
						$tbl_collectionperiod->collectionPeriod_status->ViewValue = $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(1) <> "" ? $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(1) : $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
						break;
					case "I":
						$tbl_collectionperiod->collectionPeriod_status->ViewValue = $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(2) <> "" ? $tbl_collectionperiod->collectionPeriod_status->FldTagCaption(2) : $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
						break;
					default:
						$tbl_collectionperiod->collectionPeriod_status->ViewValue = $tbl_collectionperiod->collectionPeriod_status->CurrentValue;
				}
			} else {
				$tbl_collectionperiod->collectionPeriod_status->ViewValue = NULL;
			}
			$tbl_collectionperiod->collectionPeriod_status->ViewCustomAttributes = "";

			// remarks_cutOffDate
			$tbl_collectionperiod->remarks_cutOffDate->ViewValue = $tbl_collectionperiod->remarks_cutOffDate->CurrentValue;
			$tbl_collectionperiod->remarks_cutOffDate->ViewValue = up_FormatDateTime($tbl_collectionperiod->remarks_cutOffDate->ViewValue, 6);
			$tbl_collectionperiod->remarks_cutOffDate->ViewCustomAttributes = "";

			// id_cu
			$tbl_collectionperiod->id_cu->LinkCustomAttributes = "";
			$tbl_collectionperiod->id_cu->HrefValue = "";
			$tbl_collectionperiod->id_cu->TooltipValue = "";

			// cu_name
			$tbl_collectionperiod->cu_name->LinkCustomAttributes = "";
			$tbl_collectionperiod->cu_name->HrefValue = "";
			$tbl_collectionperiod->cu_name->TooltipValue = "";

			// collectionPeriod_cutOffDate
			$tbl_collectionperiod->collectionPeriod_cutOffDate->LinkCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_cutOffDate->HrefValue = "";
			$tbl_collectionperiod->collectionPeriod_cutOffDate->TooltipValue = "";

			// collectionPeriod_status
			$tbl_collectionperiod->collectionPeriod_status->LinkCustomAttributes = "";
			$tbl_collectionperiod->collectionPeriod_status->HrefValue = "";
			$tbl_collectionperiod->collectionPeriod_status->TooltipValue = "";

			// remarks_cutOffDate
			$tbl_collectionperiod->remarks_cutOffDate->LinkCustomAttributes = "";
			$tbl_collectionperiod->remarks_cutOffDate->HrefValue = "";
			$tbl_collectionperiod->remarks_cutOffDate->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_collectionperiod->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_collectionperiod->Row_Rendered();
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
		$table = 'tbl_collectionperiod';
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
