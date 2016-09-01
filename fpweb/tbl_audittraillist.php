<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_audittrailinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_audittrail_list = new ctbl_audittrail_list();
$Page =& $tbl_audittrail_list;

// Page init
$tbl_audittrail_list->Page_Init();

// Page main
$tbl_audittrail_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($tbl_audittrail->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_audittrail_list = new up_Page("tbl_audittrail_list");

// page properties
tbl_audittrail_list.PageID = "list"; // page ID
tbl_audittrail_list.FormID = "ftbl_audittraillist"; // form ID
var UP_PAGE_ID = tbl_audittrail_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_audittrail_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_audittrail_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_audittrail_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_audittrail_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($tbl_audittrail->Export == "") || (UP_EXPORT_MASTER_RECORD && $tbl_audittrail->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_audittrail_list->TotalRecs = $tbl_audittrail->SelectRecordCount();
	} else {
		if ($tbl_audittrail_list->Recordset = $tbl_audittrail_list->LoadRecordset())
			$tbl_audittrail_list->TotalRecs = $tbl_audittrail_list->Recordset->RecordCount();
	}
	$tbl_audittrail_list->StartRec = 1;
	if ($tbl_audittrail_list->DisplayRecs <= 0 || ($tbl_audittrail->Export <> "" && $tbl_audittrail->ExportAll)) // Display all records
		$tbl_audittrail_list->DisplayRecs = $tbl_audittrail_list->TotalRecs;
	if (!($tbl_audittrail->Export <> "" && $tbl_audittrail->ExportAll))
		$tbl_audittrail_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$tbl_audittrail_list->Recordset = $tbl_audittrail_list->LoadRecordset($tbl_audittrail_list->StartRec-1, $tbl_audittrail_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_audittrail->TableCaption() ?>
&nbsp;&nbsp;<?php $tbl_audittrail_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($tbl_audittrail->Export == "" && $tbl_audittrail->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(tbl_audittrail_list);" style="text-decoration: none;"><img id="tbl_audittrail_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="tbl_audittrail_list_SearchPanel">
<form name="ftbl_audittraillistsrch" id="ftbl_audittraillistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="tbl_audittrail">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($tbl_audittrail->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $tbl_audittrail_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($tbl_audittrail->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_audittrail->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_audittrail->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $tbl_audittrail_list->ShowPageHeader(); ?>
<?php
$tbl_audittrail_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($tbl_audittrail->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($tbl_audittrail->CurrentAction <> "gridadd" && $tbl_audittrail->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_audittrail_list->Pager)) $tbl_audittrail_list->Pager = new cPrevNextPager($tbl_audittrail_list->StartRec, $tbl_audittrail_list->DisplayRecs, $tbl_audittrail_list->TotalRecs) ?>
<?php if ($tbl_audittrail_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_audittrail_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_audittrail_list->PageUrl() ?>start=<?php echo $tbl_audittrail_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_audittrail_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_audittrail_list->PageUrl() ?>start=<?php echo $tbl_audittrail_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_audittrail_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_audittrail_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_audittrail_list->PageUrl() ?>start=<?php echo $tbl_audittrail_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_audittrail_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_audittrail_list->PageUrl() ?>start=<?php echo $tbl_audittrail_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_audittrail_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_audittrail_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_audittrail_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_audittrail_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_audittrail_list->SearchWhere == "0=101") { ?>
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
<form name="ftbl_audittraillist" id="ftbl_audittraillist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="tbl_audittrail">
<div id="gmp_tbl_audittrail" class="upGridMiddlePanel">
<?php if ($tbl_audittrail_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_audittrail->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_audittrail_list->RenderListOptions();

// Render list options (header, left)
$tbl_audittrail_list->ListOptions->Render("header", "left");
?>
<?php if ($tbl_audittrail->id->Visible) { // id ?>
	<?php if ($tbl_audittrail->SortUrl($tbl_audittrail->id) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_audittrail->id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_audittrail->SortUrl($tbl_audittrail->id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_audittrail->id->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_audittrail->id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_audittrail->id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_audittrail->user->Visible) { // user ?>
	<?php if ($tbl_audittrail->SortUrl($tbl_audittrail->user) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_audittrail->user->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_audittrail->SortUrl($tbl_audittrail->user) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_audittrail->user->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_audittrail->user->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_audittrail->user->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_audittrail->datetime->Visible) { // datetime ?>
	<?php if ($tbl_audittrail->SortUrl($tbl_audittrail->datetime) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_audittrail->datetime->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_audittrail->SortUrl($tbl_audittrail->datetime) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_audittrail->datetime->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_audittrail->datetime->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_audittrail->datetime->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_audittrail->script->Visible) { // script ?>
	<?php if ($tbl_audittrail->SortUrl($tbl_audittrail->script) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_audittrail->script->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_audittrail->SortUrl($tbl_audittrail->script) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_audittrail->script->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_audittrail->script->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_audittrail->script->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_audittrail->action->Visible) { // action ?>
	<?php if ($tbl_audittrail->SortUrl($tbl_audittrail->action) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_audittrail->action->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_audittrail->SortUrl($tbl_audittrail->action) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_audittrail->action->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_audittrail->action->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_audittrail->action->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_audittrail->ztable->Visible) { // table ?>
	<?php if ($tbl_audittrail->SortUrl($tbl_audittrail->ztable) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_audittrail->ztable->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_audittrail->SortUrl($tbl_audittrail->ztable) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_audittrail->ztable->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_audittrail->ztable->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_audittrail->ztable->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_audittrail->zfield->Visible) { // field ?>
	<?php if ($tbl_audittrail->SortUrl($tbl_audittrail->zfield) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_audittrail->zfield->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_audittrail->SortUrl($tbl_audittrail->zfield) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_audittrail->zfield->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_audittrail->zfield->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_audittrail->zfield->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_audittrail->keyvalue->Visible) { // keyvalue ?>
	<?php if ($tbl_audittrail->SortUrl($tbl_audittrail->keyvalue) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_audittrail->keyvalue->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_audittrail->SortUrl($tbl_audittrail->keyvalue) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_audittrail->keyvalue->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_audittrail->keyvalue->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_audittrail->keyvalue->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_audittrail->oldvalue->Visible) { // oldvalue ?>
	<?php if ($tbl_audittrail->SortUrl($tbl_audittrail->oldvalue) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_audittrail->oldvalue->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_audittrail->SortUrl($tbl_audittrail->oldvalue) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_audittrail->oldvalue->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_audittrail->oldvalue->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_audittrail->oldvalue->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_audittrail->newvalue->Visible) { // newvalue ?>
	<?php if ($tbl_audittrail->SortUrl($tbl_audittrail->newvalue) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_audittrail->newvalue->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_audittrail->SortUrl($tbl_audittrail->newvalue) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_audittrail->newvalue->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_audittrail->newvalue->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_audittrail->newvalue->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_audittrail_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($tbl_audittrail->ExportAll && $tbl_audittrail->Export <> "") {
	$tbl_audittrail_list->StopRec = $tbl_audittrail_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tbl_audittrail_list->TotalRecs > $tbl_audittrail_list->StartRec + $tbl_audittrail_list->DisplayRecs - 1)
		$tbl_audittrail_list->StopRec = $tbl_audittrail_list->StartRec + $tbl_audittrail_list->DisplayRecs - 1;
	else
		$tbl_audittrail_list->StopRec = $tbl_audittrail_list->TotalRecs;
}
$tbl_audittrail_list->RecCnt = $tbl_audittrail_list->StartRec - 1;
if ($tbl_audittrail_list->Recordset && !$tbl_audittrail_list->Recordset->EOF) {
	$tbl_audittrail_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_audittrail_list->StartRec > 1)
		$tbl_audittrail_list->Recordset->Move($tbl_audittrail_list->StartRec - 1);
} elseif (!$tbl_audittrail->AllowAddDeleteRow && $tbl_audittrail_list->StopRec == 0) {
	$tbl_audittrail_list->StopRec = $tbl_audittrail->GridAddRowCount;
}

// Initialize aggregate
$tbl_audittrail->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_audittrail->ResetAttrs();
$tbl_audittrail_list->RenderRow();
$tbl_audittrail_list->RowCnt = 0;
while ($tbl_audittrail_list->RecCnt < $tbl_audittrail_list->StopRec) {
	$tbl_audittrail_list->RecCnt++;
	if (intval($tbl_audittrail_list->RecCnt) >= intval($tbl_audittrail_list->StartRec)) {
		$tbl_audittrail_list->RowCnt++;

		// Set up key count
		$tbl_audittrail_list->KeyCount = $tbl_audittrail_list->RowIndex;

		// Init row class and style
		$tbl_audittrail->ResetAttrs();
		$tbl_audittrail->CssClass = "";
		if ($tbl_audittrail->CurrentAction == "gridadd") {
		} else {
			$tbl_audittrail_list->LoadRowValues($tbl_audittrail_list->Recordset); // Load row values
		}
		$tbl_audittrail->RowType = UP_ROWTYPE_VIEW; // Render view
		$tbl_audittrail->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$tbl_audittrail_list->RenderRow();

		// Render list options
		$tbl_audittrail_list->RenderListOptions();
?>
	<tr<?php echo $tbl_audittrail->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_audittrail_list->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_audittrail->id->Visible) { // id ?>
		<td<?php echo $tbl_audittrail->id->CellAttributes() ?>>
<div<?php echo $tbl_audittrail->id->ViewAttributes() ?>><?php echo $tbl_audittrail->id->ListViewValue() ?></div>
<a name="<?php echo $tbl_audittrail_list->PageObjName . "_row_" . $tbl_audittrail_list->RowCnt ?>" id="<?php echo $tbl_audittrail_list->PageObjName . "_row_" . $tbl_audittrail_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($tbl_audittrail->user->Visible) { // user ?>
		<td<?php echo $tbl_audittrail->user->CellAttributes() ?>>
<div<?php echo $tbl_audittrail->user->ViewAttributes() ?>><?php echo $tbl_audittrail->user->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_audittrail->datetime->Visible) { // datetime ?>
		<td<?php echo $tbl_audittrail->datetime->CellAttributes() ?>>
<div<?php echo $tbl_audittrail->datetime->ViewAttributes() ?>><?php echo $tbl_audittrail->datetime->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_audittrail->script->Visible) { // script ?>
		<td<?php echo $tbl_audittrail->script->CellAttributes() ?>>
<div<?php echo $tbl_audittrail->script->ViewAttributes() ?>><?php echo $tbl_audittrail->script->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_audittrail->action->Visible) { // action ?>
		<td<?php echo $tbl_audittrail->action->CellAttributes() ?>>
<div<?php echo $tbl_audittrail->action->ViewAttributes() ?>><?php echo $tbl_audittrail->action->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_audittrail->ztable->Visible) { // table ?>
		<td<?php echo $tbl_audittrail->ztable->CellAttributes() ?>>
<div<?php echo $tbl_audittrail->ztable->ViewAttributes() ?>><?php echo $tbl_audittrail->ztable->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_audittrail->zfield->Visible) { // field ?>
		<td<?php echo $tbl_audittrail->zfield->CellAttributes() ?>>
<div<?php echo $tbl_audittrail->zfield->ViewAttributes() ?>><?php echo $tbl_audittrail->zfield->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_audittrail->keyvalue->Visible) { // keyvalue ?>
		<td<?php echo $tbl_audittrail->keyvalue->CellAttributes() ?>>
<div<?php echo $tbl_audittrail->keyvalue->ViewAttributes() ?>><?php echo $tbl_audittrail->keyvalue->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_audittrail->oldvalue->Visible) { // oldvalue ?>
		<td<?php echo $tbl_audittrail->oldvalue->CellAttributes() ?>>
<div<?php echo $tbl_audittrail->oldvalue->ViewAttributes() ?>><?php echo $tbl_audittrail->oldvalue->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_audittrail->newvalue->Visible) { // newvalue ?>
		<td<?php echo $tbl_audittrail->newvalue->CellAttributes() ?>>
<div<?php echo $tbl_audittrail->newvalue->ViewAttributes() ?>><?php echo $tbl_audittrail->newvalue->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_audittrail_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($tbl_audittrail->CurrentAction <> "gridadd")
		$tbl_audittrail_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($tbl_audittrail_list->Recordset)
	$tbl_audittrail_list->Recordset->Close();
?>
<?php if ($tbl_audittrail_list->TotalRecs > 0) { ?>
<?php if ($tbl_audittrail->Export == "") { ?>
<div class="upGridLowerPanel">
<?php if ($tbl_audittrail->CurrentAction <> "gridadd" && $tbl_audittrail->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_audittrail_list->Pager)) $tbl_audittrail_list->Pager = new cPrevNextPager($tbl_audittrail_list->StartRec, $tbl_audittrail_list->DisplayRecs, $tbl_audittrail_list->TotalRecs) ?>
<?php if ($tbl_audittrail_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_audittrail_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_audittrail_list->PageUrl() ?>start=<?php echo $tbl_audittrail_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_audittrail_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_audittrail_list->PageUrl() ?>start=<?php echo $tbl_audittrail_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_audittrail_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_audittrail_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_audittrail_list->PageUrl() ?>start=<?php echo $tbl_audittrail_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_audittrail_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_audittrail_list->PageUrl() ?>start=<?php echo $tbl_audittrail_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_audittrail_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_audittrail_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_audittrail_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_audittrail_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_audittrail_list->SearchWhere == "0=101") { ?>
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
<?php if ($tbl_audittrail->Export == "" && $tbl_audittrail->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_audittrail_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($tbl_audittrail->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tbl_audittrail_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_audittrail_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'tbl_audittrail';

	// Page object name
	var $PageObjName = 'tbl_audittrail_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_audittrail;
		if ($tbl_audittrail->UseTokenInUrl) $PageUrl .= "t=" . $tbl_audittrail->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_audittrail;
		if ($tbl_audittrail->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_audittrail->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_audittrail->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_audittrail_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_audittrail)
		if (!isset($GLOBALS["tbl_audittrail"])) {
			$GLOBALS["tbl_audittrail"] = new ctbl_audittrail();
			$GLOBALS["Table"] =& $GLOBALS["tbl_audittrail"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "tbl_audittrailadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "tbl_audittraildelete.php";
		$this->MultiUpdateUrl = "tbl_audittrailupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_audittrail', TRUE);

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
		global $tbl_audittrail;

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
			$tbl_audittrail->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_audittrail;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($tbl_audittrail->Export <> "" ||
				$tbl_audittrail->CurrentAction == "gridadd" ||
				$tbl_audittrail->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$tbl_audittrail->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($tbl_audittrail->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_audittrail->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$tbl_audittrail->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$tbl_audittrail->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$tbl_audittrail->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $tbl_audittrail->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$tbl_audittrail->setSessionWhere($sFilter);
		$tbl_audittrail->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $tbl_audittrail;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $tbl_audittrail->user, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_audittrail->script, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_audittrail->action, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_audittrail->ztable, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_audittrail->zfield, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_audittrail->keyvalue, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_audittrail->oldvalue, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_audittrail->newvalue, $Keyword);
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
		global $Security, $tbl_audittrail;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $tbl_audittrail->BasicSearchKeyword;
		$sSearchType = $tbl_audittrail->BasicSearchType;
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
			$tbl_audittrail->setSessionBasicSearchKeyword($sSearchKeyword);
			$tbl_audittrail->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $tbl_audittrail;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$tbl_audittrail->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $tbl_audittrail;
		$tbl_audittrail->setSessionBasicSearchKeyword("");
		$tbl_audittrail->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $tbl_audittrail;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$tbl_audittrail->BasicSearchKeyword = $tbl_audittrail->getSessionBasicSearchKeyword();
			$tbl_audittrail->BasicSearchType = $tbl_audittrail->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_audittrail;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_audittrail->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_audittrail->CurrentOrderType = @$_GET["ordertype"];
			$tbl_audittrail->UpdateSort($tbl_audittrail->id); // id
			$tbl_audittrail->UpdateSort($tbl_audittrail->user); // user
			$tbl_audittrail->UpdateSort($tbl_audittrail->datetime); // datetime
			$tbl_audittrail->UpdateSort($tbl_audittrail->script); // script
			$tbl_audittrail->UpdateSort($tbl_audittrail->action); // action
			$tbl_audittrail->UpdateSort($tbl_audittrail->ztable); // table
			$tbl_audittrail->UpdateSort($tbl_audittrail->zfield); // field
			$tbl_audittrail->UpdateSort($tbl_audittrail->keyvalue); // keyvalue
			$tbl_audittrail->UpdateSort($tbl_audittrail->oldvalue); // oldvalue
			$tbl_audittrail->UpdateSort($tbl_audittrail->newvalue); // newvalue
			$tbl_audittrail->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_audittrail;
		$sOrderBy = $tbl_audittrail->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_audittrail->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_audittrail->SqlOrderBy();
				$tbl_audittrail->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_audittrail;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_audittrail->setSessionOrderBy($sOrderBy);
				$tbl_audittrail->id->setSort("");
				$tbl_audittrail->user->setSort("");
				$tbl_audittrail->datetime->setSort("");
				$tbl_audittrail->script->setSort("");
				$tbl_audittrail->action->setSort("");
				$tbl_audittrail->ztable->setSort("");
				$tbl_audittrail->zfield->setSort("");
				$tbl_audittrail->keyvalue->setSort("");
				$tbl_audittrail->oldvalue->setSort("");
				$tbl_audittrail->newvalue->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_audittrail->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_audittrail;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $tbl_audittrail, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_audittrail;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_audittrail;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_audittrail->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_audittrail->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_audittrail->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_audittrail->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_audittrail->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_audittrail->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $tbl_audittrail;
		$tbl_audittrail->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$tbl_audittrail->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_audittrail;

		// Call Recordset Selecting event
		$tbl_audittrail->Recordset_Selecting($tbl_audittrail->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_audittrail->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_audittrail->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_audittrail;
		$sFilter = $tbl_audittrail->KeyFilter();

		// Call Row Selecting event
		$tbl_audittrail->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_audittrail->CurrentFilter = $sFilter;
		$sSql = $tbl_audittrail->SQL();
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
		global $conn, $tbl_audittrail;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_audittrail->Row_Selected($row);
		$tbl_audittrail->id->setDbValue($rs->fields('id'));
		$tbl_audittrail->user->setDbValue($rs->fields('user'));
		$tbl_audittrail->datetime->setDbValue($rs->fields('datetime'));
		$tbl_audittrail->script->setDbValue($rs->fields('script'));
		$tbl_audittrail->action->setDbValue($rs->fields('action'));
		$tbl_audittrail->ztable->setDbValue($rs->fields('table'));
		$tbl_audittrail->zfield->setDbValue($rs->fields('field'));
		$tbl_audittrail->keyvalue->setDbValue($rs->fields('keyvalue'));
		$tbl_audittrail->oldvalue->setDbValue($rs->fields('oldvalue'));
		$tbl_audittrail->newvalue->setDbValue($rs->fields('newvalue'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_audittrail;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($tbl_audittrail->getKey("id")) <> "")
			$tbl_audittrail->id->CurrentValue = $tbl_audittrail->getKey("id"); // id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_audittrail->CurrentFilter = $tbl_audittrail->KeyFilter();
			$sSql = $tbl_audittrail->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_audittrail;

		// Initialize URLs
		$this->ViewUrl = $tbl_audittrail->ViewUrl();
		$this->EditUrl = $tbl_audittrail->EditUrl();
		$this->InlineEditUrl = $tbl_audittrail->InlineEditUrl();
		$this->CopyUrl = $tbl_audittrail->CopyUrl();
		$this->InlineCopyUrl = $tbl_audittrail->InlineCopyUrl();
		$this->DeleteUrl = $tbl_audittrail->DeleteUrl();

		// Call Row_Rendering event
		$tbl_audittrail->Row_Rendering();

		// Common render codes for all row types
		// id

		$tbl_audittrail->id->CellCssStyle = "white-space: nowrap;";

		// user
		$tbl_audittrail->user->CellCssStyle = "white-space: nowrap;";

		// datetime
		$tbl_audittrail->datetime->CellCssStyle = "white-space: nowrap;";

		// script
		$tbl_audittrail->script->CellCssStyle = "white-space: nowrap;";

		// action
		$tbl_audittrail->action->CellCssStyle = "white-space: nowrap;";

		// table
		$tbl_audittrail->ztable->CellCssStyle = "white-space: nowrap;";

		// field
		$tbl_audittrail->zfield->CellCssStyle = "white-space: nowrap;";

		// keyvalue
		$tbl_audittrail->keyvalue->CellCssStyle = "white-space: nowrap;";

		// oldvalue
		$tbl_audittrail->oldvalue->CellCssStyle = "white-space: nowrap;";

		// newvalue
		$tbl_audittrail->newvalue->CellCssStyle = "white-space: nowrap;";
		if ($tbl_audittrail->RowType == UP_ROWTYPE_VIEW) { // View row

			// id
			$tbl_audittrail->id->ViewValue = $tbl_audittrail->id->CurrentValue;
			$tbl_audittrail->id->ViewCustomAttributes = "";

			// user
			$tbl_audittrail->user->ViewValue = $tbl_audittrail->user->CurrentValue;
			$tbl_audittrail->user->ViewCustomAttributes = "";

			// datetime
			$tbl_audittrail->datetime->ViewValue = $tbl_audittrail->datetime->CurrentValue;
			$tbl_audittrail->datetime->ViewValue = up_FormatDateTime($tbl_audittrail->datetime->ViewValue, 6);
			$tbl_audittrail->datetime->ViewCustomAttributes = "";

			// script
			$tbl_audittrail->script->ViewValue = $tbl_audittrail->script->CurrentValue;
			$tbl_audittrail->script->ViewCustomAttributes = "";

			// action
			$tbl_audittrail->action->ViewValue = $tbl_audittrail->action->CurrentValue;
			$tbl_audittrail->action->ViewCustomAttributes = "";

			// table
			$tbl_audittrail->ztable->ViewValue = $tbl_audittrail->ztable->CurrentValue;
			$tbl_audittrail->ztable->ViewCustomAttributes = "";

			// field
			$tbl_audittrail->zfield->ViewValue = $tbl_audittrail->zfield->CurrentValue;
			$tbl_audittrail->zfield->ViewCustomAttributes = "";

			// keyvalue
			$tbl_audittrail->keyvalue->ViewValue = $tbl_audittrail->keyvalue->CurrentValue;
			$tbl_audittrail->keyvalue->ViewCustomAttributes = "";

			// oldvalue
			$tbl_audittrail->oldvalue->ViewValue = $tbl_audittrail->oldvalue->CurrentValue;
			$tbl_audittrail->oldvalue->ViewCustomAttributes = "";

			// newvalue
			$tbl_audittrail->newvalue->ViewValue = $tbl_audittrail->newvalue->CurrentValue;
			$tbl_audittrail->newvalue->ViewCustomAttributes = "";

			// id
			$tbl_audittrail->id->LinkCustomAttributes = "";
			$tbl_audittrail->id->HrefValue = "";
			$tbl_audittrail->id->TooltipValue = "";

			// user
			$tbl_audittrail->user->LinkCustomAttributes = "";
			$tbl_audittrail->user->HrefValue = "";
			$tbl_audittrail->user->TooltipValue = "";

			// datetime
			$tbl_audittrail->datetime->LinkCustomAttributes = "";
			$tbl_audittrail->datetime->HrefValue = "";
			$tbl_audittrail->datetime->TooltipValue = "";

			// script
			$tbl_audittrail->script->LinkCustomAttributes = "";
			$tbl_audittrail->script->HrefValue = "";
			$tbl_audittrail->script->TooltipValue = "";

			// action
			$tbl_audittrail->action->LinkCustomAttributes = "";
			$tbl_audittrail->action->HrefValue = "";
			$tbl_audittrail->action->TooltipValue = "";

			// table
			$tbl_audittrail->ztable->LinkCustomAttributes = "";
			$tbl_audittrail->ztable->HrefValue = "";
			$tbl_audittrail->ztable->TooltipValue = "";

			// field
			$tbl_audittrail->zfield->LinkCustomAttributes = "";
			$tbl_audittrail->zfield->HrefValue = "";
			$tbl_audittrail->zfield->TooltipValue = "";

			// keyvalue
			$tbl_audittrail->keyvalue->LinkCustomAttributes = "";
			$tbl_audittrail->keyvalue->HrefValue = "";
			$tbl_audittrail->keyvalue->TooltipValue = "";

			// oldvalue
			$tbl_audittrail->oldvalue->LinkCustomAttributes = "";
			$tbl_audittrail->oldvalue->HrefValue = "";
			$tbl_audittrail->oldvalue->TooltipValue = "";

			// newvalue
			$tbl_audittrail->newvalue->LinkCustomAttributes = "";
			$tbl_audittrail->newvalue->HrefValue = "";
			$tbl_audittrail->newvalue->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_audittrail->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_audittrail->Row_Rendered();
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
		$table = 'tbl_audittrail';
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
