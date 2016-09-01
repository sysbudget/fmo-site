<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "view_reps_2_2_forma_1info.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$view_reps_2_2_forma_1_list = new cview_reps_2_2_forma_1_list();
$Page =& $view_reps_2_2_forma_1_list;

// Page init
$view_reps_2_2_forma_1_list->Page_Init();

// Page main
$view_reps_2_2_forma_1_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($view_reps_2_2_forma_1->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var view_reps_2_2_forma_1_list = new up_Page("view_reps_2_2_forma_1_list");

// page properties
view_reps_2_2_forma_1_list.PageID = "list"; // page ID
view_reps_2_2_forma_1_list.FormID = "fview_reps_2_2_forma_1list"; // form ID
var UP_PAGE_ID = view_reps_2_2_forma_1_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
view_reps_2_2_forma_1_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
view_reps_2_2_forma_1_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
view_reps_2_2_forma_1_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
view_reps_2_2_forma_1_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($view_reps_2_2_forma_1->Export == "") || (UP_EXPORT_MASTER_RECORD && $view_reps_2_2_forma_1->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$view_reps_2_2_forma_1_list->TotalRecs = $view_reps_2_2_forma_1->SelectRecordCount();
	} else {
		if ($view_reps_2_2_forma_1_list->Recordset = $view_reps_2_2_forma_1_list->LoadRecordset())
			$view_reps_2_2_forma_1_list->TotalRecs = $view_reps_2_2_forma_1_list->Recordset->RecordCount();
	}
	$view_reps_2_2_forma_1_list->StartRec = 1;
	if ($view_reps_2_2_forma_1_list->DisplayRecs <= 0 || ($view_reps_2_2_forma_1->Export <> "" && $view_reps_2_2_forma_1->ExportAll)) // Display all records
		$view_reps_2_2_forma_1_list->DisplayRecs = $view_reps_2_2_forma_1_list->TotalRecs;
	if (!($view_reps_2_2_forma_1->Export <> "" && $view_reps_2_2_forma_1->ExportAll))
		$view_reps_2_2_forma_1_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$view_reps_2_2_forma_1_list->Recordset = $view_reps_2_2_forma_1_list->LoadRecordset($view_reps_2_2_forma_1_list->StartRec-1, $view_reps_2_2_forma_1_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeVIEW") ?><?php echo $view_reps_2_2_forma_1->TableCaption() ?>
&nbsp;&nbsp;<?php $view_reps_2_2_forma_1_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($view_reps_2_2_forma_1->Export == "" && $view_reps_2_2_forma_1->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(view_reps_2_2_forma_1_list);" style="text-decoration: none;"><img id="view_reps_2_2_forma_1_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="view_reps_2_2_forma_1_list_SearchPanel">
<form name="fview_reps_2_2_forma_1listsrch" id="fview_reps_2_2_forma_1listsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="view_reps_2_2_forma_1">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($view_reps_2_2_forma_1->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $view_reps_2_2_forma_1_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($view_reps_2_2_forma_1->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($view_reps_2_2_forma_1->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($view_reps_2_2_forma_1->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $view_reps_2_2_forma_1_list->ShowPageHeader(); ?>
<?php
$view_reps_2_2_forma_1_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($view_reps_2_2_forma_1->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($view_reps_2_2_forma_1->CurrentAction <> "gridadd" && $view_reps_2_2_forma_1->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($view_reps_2_2_forma_1_list->Pager)) $view_reps_2_2_forma_1_list->Pager = new cPrevNextPager($view_reps_2_2_forma_1_list->StartRec, $view_reps_2_2_forma_1_list->DisplayRecs, $view_reps_2_2_forma_1_list->TotalRecs) ?>
<?php if ($view_reps_2_2_forma_1_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($view_reps_2_2_forma_1_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $view_reps_2_2_forma_1_list->PageUrl() ?>start=<?php echo $view_reps_2_2_forma_1_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_reps_2_2_forma_1_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $view_reps_2_2_forma_1_list->PageUrl() ?>start=<?php echo $view_reps_2_2_forma_1_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $view_reps_2_2_forma_1_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($view_reps_2_2_forma_1_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $view_reps_2_2_forma_1_list->PageUrl() ?>start=<?php echo $view_reps_2_2_forma_1_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($view_reps_2_2_forma_1_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $view_reps_2_2_forma_1_list->PageUrl() ?>start=<?php echo $view_reps_2_2_forma_1_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $view_reps_2_2_forma_1_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_reps_2_2_forma_1_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_reps_2_2_forma_1_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_reps_2_2_forma_1_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($view_reps_2_2_forma_1_list->SearchWhere == "0=101") { ?>
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
<form name="fview_reps_2_2_forma_1list" id="fview_reps_2_2_forma_1list" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="view_reps_2_2_forma_1">
<div id="gmp_view_reps_2_2_forma_1" class="upGridMiddlePanel">
<?php if ($view_reps_2_2_forma_1_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $view_reps_2_2_forma_1->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$view_reps_2_2_forma_1_list->RenderListOptions();

// Render list options (header, left)
$view_reps_2_2_forma_1_list->ListOptions->Render("header", "left");
?>
<?php if ($view_reps_2_2_forma_1->Constituent_University->Visible) { // Constituent University ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Constituent_University) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Constituent_University->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Constituent_University) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Constituent_University->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Constituent_University->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Constituent_University->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Unit->Visible) { // Unit ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Unit) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Unit->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->MFO->Visible) { // MFO ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->MFO) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->MFO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->MFO) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->MFO->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->MFO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->MFO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_1->Visible) { // PI 1 ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_1) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->PI_1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_1) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_1->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_Sub->Visible) { // PI Sub ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_Sub) == "") { ?>
		<td><?php echo $view_reps_2_2_forma_1->PI_Sub->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_Sub) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_Sub->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_Sub->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_Sub->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Target_28129->Visible) { // Target (1) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28129) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Target_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Target_28129->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Target_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Target_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Accomplishment_28129->Visible) { // Accomplishment (1) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28129) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Accomplishment_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Accomplishment_28129->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Accomplishment_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Accomplishment_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28129->Visible) { // 90% and Above (1) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28129) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28129->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->z9025_and_Above_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->z9025_and_Above_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Below_9025_28129->Visible) { // Below 90% (1) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28129) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Below_9025_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Below_9025_28129->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Below_9025_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Below_9025_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_2->Visible) { // PI 2 ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_2) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->PI_2->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_2) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_2->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_2->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_2->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Target_28229->Visible) { // Target (2) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28229) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Target_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Target_28229->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Target_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Target_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Accomplishment_28229->Visible) { // Accomplishment (2) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28229) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Accomplishment_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Accomplishment_28229->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Accomplishment_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Accomplishment_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28229->Visible) { // 90% and Above (2) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28229) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28229->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->z9025_and_Above_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->z9025_and_Above_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Below_9025_28229->Visible) { // Below 90% (2) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28229) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Below_9025_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Below_9025_28229->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Below_9025_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Below_9025_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_3->Visible) { // PI 3 ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_3) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->PI_3->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_3) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_3->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_3->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_3->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Target_28329->Visible) { // Target (3) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28329) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Target_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Target_28329->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Target_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Target_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Accomplishment_28329->Visible) { // Accomplishment (3) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28329) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Accomplishment_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Accomplishment_28329->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Accomplishment_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Accomplishment_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28329->Visible) { // 90% and Above (3) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28329) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28329->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->z9025_and_Above_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->z9025_and_Above_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Below_9025_28329->Visible) { // Below 90% (3) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28329) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Below_9025_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Below_9025_28329->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Below_9025_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Below_9025_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_4->Visible) { // PI 4 ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_4) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->PI_4->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_4) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_4->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_4->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_4->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Target_28429->Visible) { // Target (4) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28429) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Target_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Target_28429->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Target_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Target_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Accomplishment_28429->Visible) { // Accomplishment (4) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28429) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Accomplishment_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Accomplishment_28429->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Accomplishment_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Accomplishment_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28429->Visible) { // 90% and Above (4) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28429) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28429->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->z9025_and_Above_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->z9025_and_Above_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Below_9025_28429->Visible) { // Below 90% (4) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28429) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Below_9025_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Below_9025_28429->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Below_9025_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Below_9025_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_5->Visible) { // PI 5 ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_5) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->PI_5->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_5) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_5->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_5->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_5->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Target_28529->Visible) { // Target (5) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28529) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Target_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Target_28529->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Target_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Target_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Accomplishment_28529->Visible) { // Accomplishment (5) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28529) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Accomplishment_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Accomplishment_28529->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Accomplishment_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Accomplishment_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28529->Visible) { // 90% and Above (5) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28529) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28529->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->z9025_and_Above_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->z9025_and_Above_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Below_9025_28529->Visible) { // Below 90% (5) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28529) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Below_9025_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Below_9025_28529->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Below_9025_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Below_9025_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_6->Visible) { // PI 6 ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_6) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->PI_6->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_6) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_6->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_6->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_6->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Target_28629->Visible) { // Target (6) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28629) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Target_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Target_28629->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Target_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Target_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Accomplishment_28629->Visible) { // Accomplishment (6) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28629) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Accomplishment_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Accomplishment_28629->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Accomplishment_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Accomplishment_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28629->Visible) { // 90% and Above (6) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28629) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28629->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->z9025_and_Above_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->z9025_and_Above_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Below_9025_28629->Visible) { // Below 90% (6) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28629) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Below_9025_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Below_9025_28629->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Below_9025_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Below_9025_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_7->Visible) { // PI 7 ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_7) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->PI_7->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_7) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_7->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_7->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_7->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Target_28729->Visible) { // Target (7) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28729) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Target_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Target_28729->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Target_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Target_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Accomplishment_28729->Visible) { // Accomplishment (7) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28729) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Accomplishment_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Accomplishment_28729->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Accomplishment_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Accomplishment_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28729->Visible) { // 90% and Above (7) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28729) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28729->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->z9025_and_Above_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->z9025_and_Above_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Below_9025_28729->Visible) { // Below 90% (7) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28729) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Below_9025_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Below_9025_28729->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Below_9025_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Below_9025_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_8->Visible) { // PI 8 ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_8) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->PI_8->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_8) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_8->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_8->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_8->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Target_28829->Visible) { // Target (8) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28829) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Target_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Target_28829->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Target_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Target_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Accomplishment_28829->Visible) { // Accomplishment (8) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28829) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Accomplishment_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Accomplishment_28829->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Accomplishment_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Accomplishment_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28829->Visible) { // 90% and Above (8) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28829) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28829->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->z9025_and_Above_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->z9025_and_Above_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Below_9025_28829->Visible) { // Below 90% (8) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28829) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Below_9025_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Below_9025_28829->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Below_9025_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Below_9025_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_9->Visible) { // PI 9 ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_9) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->PI_9->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_9) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_9->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_9->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_9->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Target_28929->Visible) { // Target (9) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28929) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Target_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Target_28929->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Target_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Target_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Accomplishment_28929->Visible) { // Accomplishment (9) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28929) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Accomplishment_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Accomplishment_28929->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Accomplishment_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Accomplishment_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28929->Visible) { // 90% and Above (9) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28929) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28929->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->z9025_and_Above_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->z9025_and_Above_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Below_9025_28929->Visible) { // Below 90% (9) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28929) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Below_9025_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Below_9025_28929->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Below_9025_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Below_9025_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_10->Visible) { // PI 10 ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_10) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->PI_10->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_10) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_10->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_10->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_10->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Target_281029->Visible) { // Target (10) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_281029) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Target_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Target_281029->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Target_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Target_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Accomplishment_281029->Visible) { // Accomplishment (10) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_281029) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Accomplishment_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Accomplishment_281029->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Accomplishment_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Accomplishment_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->z9025_and_Above_281029->Visible) { // 90% and Above (10) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_281029) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->z9025_and_Above_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->z9025_and_Above_281029->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->z9025_and_Above_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->z9025_and_Above_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Below_9025_281029->Visible) { // Below 90% (10) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_281029) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Below_9025_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Below_9025_281029->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Below_9025_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Below_9025_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_11->Visible) { // PI 11 ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_11) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->PI_11->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_11) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_11->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_11->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_11->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Target_281129->Visible) { // Target (11) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_281129) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Target_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Target_281129->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Target_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Target_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Accomplishment_281129->Visible) { // Accomplishment (11) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_281129) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Accomplishment_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Accomplishment_281129->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Accomplishment_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Accomplishment_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->z9025_and_Above_281129->Visible) { // 90% and Above (11) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_281129) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->z9025_and_Above_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->z9025_and_Above_281129->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->z9025_and_Above_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->z9025_and_Above_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Below_9025_281129->Visible) { // Below 90% (11) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_281129) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Below_9025_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Below_9025_281129->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Below_9025_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Below_9025_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->PI_12->Visible) { // PI 12 ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_12) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->PI_12->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->PI_12) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->PI_12->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->PI_12->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->PI_12->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Target_281229->Visible) { // Target (12) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_281229) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Target_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Target_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Target_281229->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Target_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Target_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Accomplishment_281229->Visible) { // Accomplishment (12) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_281229) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Accomplishment_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Accomplishment_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Accomplishment_281229->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Accomplishment_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Accomplishment_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->z9025_and_Above_281229->Visible) { // 90% and Above (12) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_281229) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->z9025_and_Above_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->z9025_and_Above_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->z9025_and_Above_281229->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->z9025_and_Above_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->z9025_and_Above_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_reps_2_2_forma_1->Below_9025_281229->Visible) { // Below 90% (12) ?>
	<?php if ($view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_281229) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_reps_2_2_forma_1->Below_9025_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_reps_2_2_forma_1->SortUrl($view_reps_2_2_forma_1->Below_9025_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_reps_2_2_forma_1->Below_9025_281229->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_reps_2_2_forma_1->Below_9025_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_reps_2_2_forma_1->Below_9025_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$view_reps_2_2_forma_1_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($view_reps_2_2_forma_1->ExportAll && $view_reps_2_2_forma_1->Export <> "") {
	$view_reps_2_2_forma_1_list->StopRec = $view_reps_2_2_forma_1_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_reps_2_2_forma_1_list->TotalRecs > $view_reps_2_2_forma_1_list->StartRec + $view_reps_2_2_forma_1_list->DisplayRecs - 1)
		$view_reps_2_2_forma_1_list->StopRec = $view_reps_2_2_forma_1_list->StartRec + $view_reps_2_2_forma_1_list->DisplayRecs - 1;
	else
		$view_reps_2_2_forma_1_list->StopRec = $view_reps_2_2_forma_1_list->TotalRecs;
}
$view_reps_2_2_forma_1_list->RecCnt = $view_reps_2_2_forma_1_list->StartRec - 1;
if ($view_reps_2_2_forma_1_list->Recordset && !$view_reps_2_2_forma_1_list->Recordset->EOF) {
	$view_reps_2_2_forma_1_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $view_reps_2_2_forma_1_list->StartRec > 1)
		$view_reps_2_2_forma_1_list->Recordset->Move($view_reps_2_2_forma_1_list->StartRec - 1);
} elseif (!$view_reps_2_2_forma_1->AllowAddDeleteRow && $view_reps_2_2_forma_1_list->StopRec == 0) {
	$view_reps_2_2_forma_1_list->StopRec = $view_reps_2_2_forma_1->GridAddRowCount;
}

// Initialize aggregate
$view_reps_2_2_forma_1->RowType = UP_ROWTYPE_AGGREGATEINIT;
$view_reps_2_2_forma_1->ResetAttrs();
$view_reps_2_2_forma_1_list->RenderRow();
$view_reps_2_2_forma_1_list->RowCnt = 0;
while ($view_reps_2_2_forma_1_list->RecCnt < $view_reps_2_2_forma_1_list->StopRec) {
	$view_reps_2_2_forma_1_list->RecCnt++;
	if (intval($view_reps_2_2_forma_1_list->RecCnt) >= intval($view_reps_2_2_forma_1_list->StartRec)) {
		$view_reps_2_2_forma_1_list->RowCnt++;

		// Set up key count
		$view_reps_2_2_forma_1_list->KeyCount = $view_reps_2_2_forma_1_list->RowIndex;

		// Init row class and style
		$view_reps_2_2_forma_1->ResetAttrs();
		$view_reps_2_2_forma_1->CssClass = "";
		if ($view_reps_2_2_forma_1->CurrentAction == "gridadd") {
		} else {
			$view_reps_2_2_forma_1_list->LoadRowValues($view_reps_2_2_forma_1_list->Recordset); // Load row values
		}
		$view_reps_2_2_forma_1->RowType = UP_ROWTYPE_VIEW; // Render view
		$view_reps_2_2_forma_1->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$view_reps_2_2_forma_1_list->RenderRow();

		// Render list options
		$view_reps_2_2_forma_1_list->RenderListOptions();
?>
	<tr<?php echo $view_reps_2_2_forma_1->RowAttributes() ?>>
<?php

// Render list options (body, left)
$view_reps_2_2_forma_1_list->ListOptions->Render("body", "left");
?>
	<?php if ($view_reps_2_2_forma_1->Constituent_University->Visible) { // Constituent University ?>
		<td<?php echo $view_reps_2_2_forma_1->Constituent_University->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Constituent_University->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Constituent_University->ListViewValue() ?></div>
<a name="<?php echo $view_reps_2_2_forma_1_list->PageObjName . "_row_" . $view_reps_2_2_forma_1_list->RowCnt ?>" id="<?php echo $view_reps_2_2_forma_1_list->PageObjName . "_row_" . $view_reps_2_2_forma_1_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Unit->Visible) { // Unit ?>
		<td<?php echo $view_reps_2_2_forma_1->Unit->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Unit->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Unit->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->MFO->Visible) { // MFO ?>
		<td<?php echo $view_reps_2_2_forma_1->MFO->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->MFO->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->MFO->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_1->Visible) { // PI 1 ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_1->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_1->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_1->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_Sub->Visible) { // PI Sub ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_Sub->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_Sub->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_Sub->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Target_28129->Visible) { // Target (1) ?>
		<td<?php echo $view_reps_2_2_forma_1->Target_28129->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Target_28129->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Target_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Accomplishment_28129->Visible) { // Accomplishment (1) ?>
		<td<?php echo $view_reps_2_2_forma_1->Accomplishment_28129->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Accomplishment_28129->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Accomplishment_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28129->Visible) { // 90% and Above (1) ?>
		<td<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28129->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28129->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Below_9025_28129->Visible) { // Below 90% (1) ?>
		<td<?php echo $view_reps_2_2_forma_1->Below_9025_28129->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Below_9025_28129->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Below_9025_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_2->Visible) { // PI 2 ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_2->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_2->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_2->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Target_28229->Visible) { // Target (2) ?>
		<td<?php echo $view_reps_2_2_forma_1->Target_28229->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Target_28229->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Target_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Accomplishment_28229->Visible) { // Accomplishment (2) ?>
		<td<?php echo $view_reps_2_2_forma_1->Accomplishment_28229->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Accomplishment_28229->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Accomplishment_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28229->Visible) { // 90% and Above (2) ?>
		<td<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28229->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28229->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Below_9025_28229->Visible) { // Below 90% (2) ?>
		<td<?php echo $view_reps_2_2_forma_1->Below_9025_28229->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Below_9025_28229->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Below_9025_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_3->Visible) { // PI 3 ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_3->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_3->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_3->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Target_28329->Visible) { // Target (3) ?>
		<td<?php echo $view_reps_2_2_forma_1->Target_28329->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Target_28329->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Target_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Accomplishment_28329->Visible) { // Accomplishment (3) ?>
		<td<?php echo $view_reps_2_2_forma_1->Accomplishment_28329->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Accomplishment_28329->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Accomplishment_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28329->Visible) { // 90% and Above (3) ?>
		<td<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28329->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28329->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Below_9025_28329->Visible) { // Below 90% (3) ?>
		<td<?php echo $view_reps_2_2_forma_1->Below_9025_28329->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Below_9025_28329->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Below_9025_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_4->Visible) { // PI 4 ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_4->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_4->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_4->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Target_28429->Visible) { // Target (4) ?>
		<td<?php echo $view_reps_2_2_forma_1->Target_28429->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Target_28429->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Target_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Accomplishment_28429->Visible) { // Accomplishment (4) ?>
		<td<?php echo $view_reps_2_2_forma_1->Accomplishment_28429->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Accomplishment_28429->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Accomplishment_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28429->Visible) { // 90% and Above (4) ?>
		<td<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28429->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28429->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Below_9025_28429->Visible) { // Below 90% (4) ?>
		<td<?php echo $view_reps_2_2_forma_1->Below_9025_28429->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Below_9025_28429->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Below_9025_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_5->Visible) { // PI 5 ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_5->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_5->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_5->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Target_28529->Visible) { // Target (5) ?>
		<td<?php echo $view_reps_2_2_forma_1->Target_28529->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Target_28529->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Target_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Accomplishment_28529->Visible) { // Accomplishment (5) ?>
		<td<?php echo $view_reps_2_2_forma_1->Accomplishment_28529->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Accomplishment_28529->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Accomplishment_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28529->Visible) { // 90% and Above (5) ?>
		<td<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28529->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28529->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Below_9025_28529->Visible) { // Below 90% (5) ?>
		<td<?php echo $view_reps_2_2_forma_1->Below_9025_28529->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Below_9025_28529->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Below_9025_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_6->Visible) { // PI 6 ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_6->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_6->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_6->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Target_28629->Visible) { // Target (6) ?>
		<td<?php echo $view_reps_2_2_forma_1->Target_28629->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Target_28629->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Target_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Accomplishment_28629->Visible) { // Accomplishment (6) ?>
		<td<?php echo $view_reps_2_2_forma_1->Accomplishment_28629->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Accomplishment_28629->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Accomplishment_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28629->Visible) { // 90% and Above (6) ?>
		<td<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28629->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28629->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Below_9025_28629->Visible) { // Below 90% (6) ?>
		<td<?php echo $view_reps_2_2_forma_1->Below_9025_28629->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Below_9025_28629->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Below_9025_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_7->Visible) { // PI 7 ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_7->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_7->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_7->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Target_28729->Visible) { // Target (7) ?>
		<td<?php echo $view_reps_2_2_forma_1->Target_28729->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Target_28729->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Target_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Accomplishment_28729->Visible) { // Accomplishment (7) ?>
		<td<?php echo $view_reps_2_2_forma_1->Accomplishment_28729->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Accomplishment_28729->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Accomplishment_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28729->Visible) { // 90% and Above (7) ?>
		<td<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28729->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28729->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Below_9025_28729->Visible) { // Below 90% (7) ?>
		<td<?php echo $view_reps_2_2_forma_1->Below_9025_28729->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Below_9025_28729->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Below_9025_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_8->Visible) { // PI 8 ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_8->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_8->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_8->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Target_28829->Visible) { // Target (8) ?>
		<td<?php echo $view_reps_2_2_forma_1->Target_28829->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Target_28829->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Target_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Accomplishment_28829->Visible) { // Accomplishment (8) ?>
		<td<?php echo $view_reps_2_2_forma_1->Accomplishment_28829->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Accomplishment_28829->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Accomplishment_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28829->Visible) { // 90% and Above (8) ?>
		<td<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28829->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28829->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Below_9025_28829->Visible) { // Below 90% (8) ?>
		<td<?php echo $view_reps_2_2_forma_1->Below_9025_28829->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Below_9025_28829->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Below_9025_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_9->Visible) { // PI 9 ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_9->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_9->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_9->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Target_28929->Visible) { // Target (9) ?>
		<td<?php echo $view_reps_2_2_forma_1->Target_28929->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Target_28929->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Target_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Accomplishment_28929->Visible) { // Accomplishment (9) ?>
		<td<?php echo $view_reps_2_2_forma_1->Accomplishment_28929->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Accomplishment_28929->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Accomplishment_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->z9025_and_Above_28929->Visible) { // 90% and Above (9) ?>
		<td<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28929->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->z9025_and_Above_28929->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->z9025_and_Above_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Below_9025_28929->Visible) { // Below 90% (9) ?>
		<td<?php echo $view_reps_2_2_forma_1->Below_9025_28929->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Below_9025_28929->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Below_9025_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_10->Visible) { // PI 10 ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_10->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_10->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_10->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Target_281029->Visible) { // Target (10) ?>
		<td<?php echo $view_reps_2_2_forma_1->Target_281029->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Target_281029->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Target_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Accomplishment_281029->Visible) { // Accomplishment (10) ?>
		<td<?php echo $view_reps_2_2_forma_1->Accomplishment_281029->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Accomplishment_281029->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Accomplishment_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->z9025_and_Above_281029->Visible) { // 90% and Above (10) ?>
		<td<?php echo $view_reps_2_2_forma_1->z9025_and_Above_281029->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->z9025_and_Above_281029->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->z9025_and_Above_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Below_9025_281029->Visible) { // Below 90% (10) ?>
		<td<?php echo $view_reps_2_2_forma_1->Below_9025_281029->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Below_9025_281029->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Below_9025_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_11->Visible) { // PI 11 ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_11->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_11->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_11->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Target_281129->Visible) { // Target (11) ?>
		<td<?php echo $view_reps_2_2_forma_1->Target_281129->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Target_281129->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Target_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Accomplishment_281129->Visible) { // Accomplishment (11) ?>
		<td<?php echo $view_reps_2_2_forma_1->Accomplishment_281129->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Accomplishment_281129->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Accomplishment_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->z9025_and_Above_281129->Visible) { // 90% and Above (11) ?>
		<td<?php echo $view_reps_2_2_forma_1->z9025_and_Above_281129->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->z9025_and_Above_281129->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->z9025_and_Above_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Below_9025_281129->Visible) { // Below 90% (11) ?>
		<td<?php echo $view_reps_2_2_forma_1->Below_9025_281129->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Below_9025_281129->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Below_9025_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->PI_12->Visible) { // PI 12 ?>
		<td<?php echo $view_reps_2_2_forma_1->PI_12->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->PI_12->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->PI_12->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Target_281229->Visible) { // Target (12) ?>
		<td<?php echo $view_reps_2_2_forma_1->Target_281229->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Target_281229->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Target_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Accomplishment_281229->Visible) { // Accomplishment (12) ?>
		<td<?php echo $view_reps_2_2_forma_1->Accomplishment_281229->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Accomplishment_281229->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Accomplishment_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->z9025_and_Above_281229->Visible) { // 90% and Above (12) ?>
		<td<?php echo $view_reps_2_2_forma_1->z9025_and_Above_281229->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->z9025_and_Above_281229->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->z9025_and_Above_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_reps_2_2_forma_1->Below_9025_281229->Visible) { // Below 90% (12) ?>
		<td<?php echo $view_reps_2_2_forma_1->Below_9025_281229->CellAttributes() ?>>
<div<?php echo $view_reps_2_2_forma_1->Below_9025_281229->ViewAttributes() ?>><?php echo $view_reps_2_2_forma_1->Below_9025_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_reps_2_2_forma_1_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($view_reps_2_2_forma_1->CurrentAction <> "gridadd")
		$view_reps_2_2_forma_1_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($view_reps_2_2_forma_1_list->Recordset)
	$view_reps_2_2_forma_1_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($view_reps_2_2_forma_1->Export == "" && $view_reps_2_2_forma_1->CurrentAction == "") { ?>
<?php } ?>
<?php
$view_reps_2_2_forma_1_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($view_reps_2_2_forma_1->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_reps_2_2_forma_1_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cview_reps_2_2_forma_1_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'view_reps_2_2_forma_1';

	// Page object name
	var $PageObjName = 'view_reps_2_2_forma_1_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $view_reps_2_2_forma_1;
		if ($view_reps_2_2_forma_1->UseTokenInUrl) $PageUrl .= "t=" . $view_reps_2_2_forma_1->TableVar . "&"; // Add page token
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
		global $objForm, $view_reps_2_2_forma_1;
		if ($view_reps_2_2_forma_1->UseTokenInUrl) {
			if ($objForm)
				return ($view_reps_2_2_forma_1->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($view_reps_2_2_forma_1->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cview_reps_2_2_forma_1_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (view_reps_2_2_forma_1)
		if (!isset($GLOBALS["view_reps_2_2_forma_1"])) {
			$GLOBALS["view_reps_2_2_forma_1"] = new cview_reps_2_2_forma_1();
			$GLOBALS["Table"] =& $GLOBALS["view_reps_2_2_forma_1"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "view_reps_2_2_forma_1add.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "view_reps_2_2_forma_1delete.php";
		$this->MultiUpdateUrl = "view_reps_2_2_forma_1update.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'view_reps_2_2_forma_1', TRUE);

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
		global $view_reps_2_2_forma_1;

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
			$view_reps_2_2_forma_1->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $view_reps_2_2_forma_1;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($view_reps_2_2_forma_1->Export <> "" ||
				$view_reps_2_2_forma_1->CurrentAction == "gridadd" ||
				$view_reps_2_2_forma_1->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$view_reps_2_2_forma_1->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($view_reps_2_2_forma_1->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $view_reps_2_2_forma_1->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$view_reps_2_2_forma_1->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$view_reps_2_2_forma_1->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$view_reps_2_2_forma_1->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $view_reps_2_2_forma_1->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$view_reps_2_2_forma_1->setSessionWhere($sFilter);
		$view_reps_2_2_forma_1->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $view_reps_2_2_forma_1;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $view_reps_2_2_forma_1->Constituent_University, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $view_reps_2_2_forma_1->Unit, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $view_reps_2_2_forma_1->PI_Sub, $Keyword);
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
		global $Security, $view_reps_2_2_forma_1;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $view_reps_2_2_forma_1->BasicSearchKeyword;
		$sSearchType = $view_reps_2_2_forma_1->BasicSearchType;
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
			$view_reps_2_2_forma_1->setSessionBasicSearchKeyword($sSearchKeyword);
			$view_reps_2_2_forma_1->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $view_reps_2_2_forma_1;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$view_reps_2_2_forma_1->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $view_reps_2_2_forma_1;
		$view_reps_2_2_forma_1->setSessionBasicSearchKeyword("");
		$view_reps_2_2_forma_1->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $view_reps_2_2_forma_1;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$view_reps_2_2_forma_1->BasicSearchKeyword = $view_reps_2_2_forma_1->getSessionBasicSearchKeyword();
			$view_reps_2_2_forma_1->BasicSearchType = $view_reps_2_2_forma_1->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $view_reps_2_2_forma_1;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$view_reps_2_2_forma_1->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$view_reps_2_2_forma_1->CurrentOrderType = @$_GET["ordertype"];
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Constituent_University); // Constituent University
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Unit); // Unit
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->MFO); // MFO
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_1); // PI 1
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_Sub); // PI Sub
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Target_28129); // Target (1)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Accomplishment_28129); // Accomplishment (1)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->z9025_and_Above_28129); // 90% and Above (1)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Below_9025_28129); // Below 90% (1)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_2); // PI 2
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Target_28229); // Target (2)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Accomplishment_28229); // Accomplishment (2)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->z9025_and_Above_28229); // 90% and Above (2)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Below_9025_28229); // Below 90% (2)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_3); // PI 3
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Target_28329); // Target (3)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Accomplishment_28329); // Accomplishment (3)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->z9025_and_Above_28329); // 90% and Above (3)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Below_9025_28329); // Below 90% (3)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_4); // PI 4
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Target_28429); // Target (4)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Accomplishment_28429); // Accomplishment (4)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->z9025_and_Above_28429); // 90% and Above (4)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Below_9025_28429); // Below 90% (4)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_5); // PI 5
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Target_28529); // Target (5)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Accomplishment_28529); // Accomplishment (5)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->z9025_and_Above_28529); // 90% and Above (5)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Below_9025_28529); // Below 90% (5)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_6); // PI 6
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Target_28629); // Target (6)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Accomplishment_28629); // Accomplishment (6)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->z9025_and_Above_28629); // 90% and Above (6)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Below_9025_28629); // Below 90% (6)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_7); // PI 7
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Target_28729); // Target (7)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Accomplishment_28729); // Accomplishment (7)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->z9025_and_Above_28729); // 90% and Above (7)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Below_9025_28729); // Below 90% (7)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_8); // PI 8
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Target_28829); // Target (8)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Accomplishment_28829); // Accomplishment (8)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->z9025_and_Above_28829); // 90% and Above (8)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Below_9025_28829); // Below 90% (8)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_9); // PI 9
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Target_28929); // Target (9)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Accomplishment_28929); // Accomplishment (9)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->z9025_and_Above_28929); // 90% and Above (9)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Below_9025_28929); // Below 90% (9)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_10); // PI 10
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Target_281029); // Target (10)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Accomplishment_281029); // Accomplishment (10)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->z9025_and_Above_281029); // 90% and Above (10)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Below_9025_281029); // Below 90% (10)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_11); // PI 11
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Target_281129); // Target (11)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Accomplishment_281129); // Accomplishment (11)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->z9025_and_Above_281129); // 90% and Above (11)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Below_9025_281129); // Below 90% (11)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->PI_12); // PI 12
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Target_281229); // Target (12)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Accomplishment_281229); // Accomplishment (12)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->z9025_and_Above_281229); // 90% and Above (12)
			$view_reps_2_2_forma_1->UpdateSort($view_reps_2_2_forma_1->Below_9025_281229); // Below 90% (12)
			$view_reps_2_2_forma_1->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $view_reps_2_2_forma_1;
		$sOrderBy = $view_reps_2_2_forma_1->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($view_reps_2_2_forma_1->SqlOrderBy() <> "") {
				$sOrderBy = $view_reps_2_2_forma_1->SqlOrderBy();
				$view_reps_2_2_forma_1->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $view_reps_2_2_forma_1;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$view_reps_2_2_forma_1->setSessionOrderBy($sOrderBy);
				$view_reps_2_2_forma_1->Constituent_University->setSort("");
				$view_reps_2_2_forma_1->Unit->setSort("");
				$view_reps_2_2_forma_1->MFO->setSort("");
				$view_reps_2_2_forma_1->PI_1->setSort("");
				$view_reps_2_2_forma_1->PI_Sub->setSort("");
				$view_reps_2_2_forma_1->Target_28129->setSort("");
				$view_reps_2_2_forma_1->Accomplishment_28129->setSort("");
				$view_reps_2_2_forma_1->z9025_and_Above_28129->setSort("");
				$view_reps_2_2_forma_1->Below_9025_28129->setSort("");
				$view_reps_2_2_forma_1->PI_2->setSort("");
				$view_reps_2_2_forma_1->Target_28229->setSort("");
				$view_reps_2_2_forma_1->Accomplishment_28229->setSort("");
				$view_reps_2_2_forma_1->z9025_and_Above_28229->setSort("");
				$view_reps_2_2_forma_1->Below_9025_28229->setSort("");
				$view_reps_2_2_forma_1->PI_3->setSort("");
				$view_reps_2_2_forma_1->Target_28329->setSort("");
				$view_reps_2_2_forma_1->Accomplishment_28329->setSort("");
				$view_reps_2_2_forma_1->z9025_and_Above_28329->setSort("");
				$view_reps_2_2_forma_1->Below_9025_28329->setSort("");
				$view_reps_2_2_forma_1->PI_4->setSort("");
				$view_reps_2_2_forma_1->Target_28429->setSort("");
				$view_reps_2_2_forma_1->Accomplishment_28429->setSort("");
				$view_reps_2_2_forma_1->z9025_and_Above_28429->setSort("");
				$view_reps_2_2_forma_1->Below_9025_28429->setSort("");
				$view_reps_2_2_forma_1->PI_5->setSort("");
				$view_reps_2_2_forma_1->Target_28529->setSort("");
				$view_reps_2_2_forma_1->Accomplishment_28529->setSort("");
				$view_reps_2_2_forma_1->z9025_and_Above_28529->setSort("");
				$view_reps_2_2_forma_1->Below_9025_28529->setSort("");
				$view_reps_2_2_forma_1->PI_6->setSort("");
				$view_reps_2_2_forma_1->Target_28629->setSort("");
				$view_reps_2_2_forma_1->Accomplishment_28629->setSort("");
				$view_reps_2_2_forma_1->z9025_and_Above_28629->setSort("");
				$view_reps_2_2_forma_1->Below_9025_28629->setSort("");
				$view_reps_2_2_forma_1->PI_7->setSort("");
				$view_reps_2_2_forma_1->Target_28729->setSort("");
				$view_reps_2_2_forma_1->Accomplishment_28729->setSort("");
				$view_reps_2_2_forma_1->z9025_and_Above_28729->setSort("");
				$view_reps_2_2_forma_1->Below_9025_28729->setSort("");
				$view_reps_2_2_forma_1->PI_8->setSort("");
				$view_reps_2_2_forma_1->Target_28829->setSort("");
				$view_reps_2_2_forma_1->Accomplishment_28829->setSort("");
				$view_reps_2_2_forma_1->z9025_and_Above_28829->setSort("");
				$view_reps_2_2_forma_1->Below_9025_28829->setSort("");
				$view_reps_2_2_forma_1->PI_9->setSort("");
				$view_reps_2_2_forma_1->Target_28929->setSort("");
				$view_reps_2_2_forma_1->Accomplishment_28929->setSort("");
				$view_reps_2_2_forma_1->z9025_and_Above_28929->setSort("");
				$view_reps_2_2_forma_1->Below_9025_28929->setSort("");
				$view_reps_2_2_forma_1->PI_10->setSort("");
				$view_reps_2_2_forma_1->Target_281029->setSort("");
				$view_reps_2_2_forma_1->Accomplishment_281029->setSort("");
				$view_reps_2_2_forma_1->z9025_and_Above_281029->setSort("");
				$view_reps_2_2_forma_1->Below_9025_281029->setSort("");
				$view_reps_2_2_forma_1->PI_11->setSort("");
				$view_reps_2_2_forma_1->Target_281129->setSort("");
				$view_reps_2_2_forma_1->Accomplishment_281129->setSort("");
				$view_reps_2_2_forma_1->z9025_and_Above_281129->setSort("");
				$view_reps_2_2_forma_1->Below_9025_281129->setSort("");
				$view_reps_2_2_forma_1->PI_12->setSort("");
				$view_reps_2_2_forma_1->Target_281229->setSort("");
				$view_reps_2_2_forma_1->Accomplishment_281229->setSort("");
				$view_reps_2_2_forma_1->z9025_and_Above_281229->setSort("");
				$view_reps_2_2_forma_1->Below_9025_281229->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$view_reps_2_2_forma_1->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $view_reps_2_2_forma_1;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $view_reps_2_2_forma_1, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $view_reps_2_2_forma_1;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $view_reps_2_2_forma_1;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$view_reps_2_2_forma_1->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$view_reps_2_2_forma_1->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $view_reps_2_2_forma_1->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$view_reps_2_2_forma_1->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$view_reps_2_2_forma_1->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$view_reps_2_2_forma_1->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $view_reps_2_2_forma_1;
		$view_reps_2_2_forma_1->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$view_reps_2_2_forma_1->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $view_reps_2_2_forma_1;

		// Call Recordset Selecting event
		$view_reps_2_2_forma_1->Recordset_Selecting($view_reps_2_2_forma_1->CurrentFilter);

		// Load List page SQL
		$sSql = $view_reps_2_2_forma_1->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$view_reps_2_2_forma_1->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $view_reps_2_2_forma_1;
		$sFilter = $view_reps_2_2_forma_1->KeyFilter();

		// Call Row Selecting event
		$view_reps_2_2_forma_1->Row_Selecting($sFilter);

		// Load SQL based on filter
		$view_reps_2_2_forma_1->CurrentFilter = $sFilter;
		$sSql = $view_reps_2_2_forma_1->SQL();
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
		global $conn, $view_reps_2_2_forma_1;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$view_reps_2_2_forma_1->Row_Selected($row);
		$view_reps_2_2_forma_1->Constituent_University->setDbValue($rs->fields('Constituent University'));
		$view_reps_2_2_forma_1->Unit->setDbValue($rs->fields('Unit'));
		$view_reps_2_2_forma_1->MFO->setDbValue($rs->fields('MFO'));
		$view_reps_2_2_forma_1->PI_1->setDbValue($rs->fields('PI 1'));
		$view_reps_2_2_forma_1->PI_Sub->setDbValue($rs->fields('PI Sub'));
		$view_reps_2_2_forma_1->Target_28129->setDbValue($rs->fields('Target (1)'));
		$view_reps_2_2_forma_1->Accomplishment_28129->setDbValue($rs->fields('Accomplishment (1)'));
		$view_reps_2_2_forma_1->z9025_and_Above_28129->setDbValue($rs->fields('90% and Above (1)'));
		$view_reps_2_2_forma_1->Below_9025_28129->setDbValue($rs->fields('Below 90% (1)'));
		$view_reps_2_2_forma_1->PI_2->setDbValue($rs->fields('PI 2'));
		$view_reps_2_2_forma_1->Target_28229->setDbValue($rs->fields('Target (2)'));
		$view_reps_2_2_forma_1->Accomplishment_28229->setDbValue($rs->fields('Accomplishment (2)'));
		$view_reps_2_2_forma_1->z9025_and_Above_28229->setDbValue($rs->fields('90% and Above (2)'));
		$view_reps_2_2_forma_1->Below_9025_28229->setDbValue($rs->fields('Below 90% (2)'));
		$view_reps_2_2_forma_1->PI_3->setDbValue($rs->fields('PI 3'));
		$view_reps_2_2_forma_1->Target_28329->setDbValue($rs->fields('Target (3)'));
		$view_reps_2_2_forma_1->Accomplishment_28329->setDbValue($rs->fields('Accomplishment (3)'));
		$view_reps_2_2_forma_1->z9025_and_Above_28329->setDbValue($rs->fields('90% and Above (3)'));
		$view_reps_2_2_forma_1->Below_9025_28329->setDbValue($rs->fields('Below 90% (3)'));
		$view_reps_2_2_forma_1->PI_4->setDbValue($rs->fields('PI 4'));
		$view_reps_2_2_forma_1->Target_28429->setDbValue($rs->fields('Target (4)'));
		$view_reps_2_2_forma_1->Accomplishment_28429->setDbValue($rs->fields('Accomplishment (4)'));
		$view_reps_2_2_forma_1->z9025_and_Above_28429->setDbValue($rs->fields('90% and Above (4)'));
		$view_reps_2_2_forma_1->Below_9025_28429->setDbValue($rs->fields('Below 90% (4)'));
		$view_reps_2_2_forma_1->PI_5->setDbValue($rs->fields('PI 5'));
		$view_reps_2_2_forma_1->Target_28529->setDbValue($rs->fields('Target (5)'));
		$view_reps_2_2_forma_1->Accomplishment_28529->setDbValue($rs->fields('Accomplishment (5)'));
		$view_reps_2_2_forma_1->z9025_and_Above_28529->setDbValue($rs->fields('90% and Above (5)'));
		$view_reps_2_2_forma_1->Below_9025_28529->setDbValue($rs->fields('Below 90% (5)'));
		$view_reps_2_2_forma_1->PI_6->setDbValue($rs->fields('PI 6'));
		$view_reps_2_2_forma_1->Target_28629->setDbValue($rs->fields('Target (6)'));
		$view_reps_2_2_forma_1->Accomplishment_28629->setDbValue($rs->fields('Accomplishment (6)'));
		$view_reps_2_2_forma_1->z9025_and_Above_28629->setDbValue($rs->fields('90% and Above (6)'));
		$view_reps_2_2_forma_1->Below_9025_28629->setDbValue($rs->fields('Below 90% (6)'));
		$view_reps_2_2_forma_1->PI_7->setDbValue($rs->fields('PI 7'));
		$view_reps_2_2_forma_1->Target_28729->setDbValue($rs->fields('Target (7)'));
		$view_reps_2_2_forma_1->Accomplishment_28729->setDbValue($rs->fields('Accomplishment (7)'));
		$view_reps_2_2_forma_1->z9025_and_Above_28729->setDbValue($rs->fields('90% and Above (7)'));
		$view_reps_2_2_forma_1->Below_9025_28729->setDbValue($rs->fields('Below 90% (7)'));
		$view_reps_2_2_forma_1->PI_8->setDbValue($rs->fields('PI 8'));
		$view_reps_2_2_forma_1->Target_28829->setDbValue($rs->fields('Target (8)'));
		$view_reps_2_2_forma_1->Accomplishment_28829->setDbValue($rs->fields('Accomplishment (8)'));
		$view_reps_2_2_forma_1->z9025_and_Above_28829->setDbValue($rs->fields('90% and Above (8)'));
		$view_reps_2_2_forma_1->Below_9025_28829->setDbValue($rs->fields('Below 90% (8)'));
		$view_reps_2_2_forma_1->PI_9->setDbValue($rs->fields('PI 9'));
		$view_reps_2_2_forma_1->Target_28929->setDbValue($rs->fields('Target (9)'));
		$view_reps_2_2_forma_1->Accomplishment_28929->setDbValue($rs->fields('Accomplishment (9)'));
		$view_reps_2_2_forma_1->z9025_and_Above_28929->setDbValue($rs->fields('90% and Above (9)'));
		$view_reps_2_2_forma_1->Below_9025_28929->setDbValue($rs->fields('Below 90% (9)'));
		$view_reps_2_2_forma_1->PI_10->setDbValue($rs->fields('PI 10'));
		$view_reps_2_2_forma_1->Target_281029->setDbValue($rs->fields('Target (10)'));
		$view_reps_2_2_forma_1->Accomplishment_281029->setDbValue($rs->fields('Accomplishment (10)'));
		$view_reps_2_2_forma_1->z9025_and_Above_281029->setDbValue($rs->fields('90% and Above (10)'));
		$view_reps_2_2_forma_1->Below_9025_281029->setDbValue($rs->fields('Below 90% (10)'));
		$view_reps_2_2_forma_1->PI_11->setDbValue($rs->fields('PI 11'));
		$view_reps_2_2_forma_1->Target_281129->setDbValue($rs->fields('Target (11)'));
		$view_reps_2_2_forma_1->Accomplishment_281129->setDbValue($rs->fields('Accomplishment (11)'));
		$view_reps_2_2_forma_1->z9025_and_Above_281129->setDbValue($rs->fields('90% and Above (11)'));
		$view_reps_2_2_forma_1->Below_9025_281129->setDbValue($rs->fields('Below 90% (11)'));
		$view_reps_2_2_forma_1->PI_12->setDbValue($rs->fields('PI 12'));
		$view_reps_2_2_forma_1->Target_281229->setDbValue($rs->fields('Target (12)'));
		$view_reps_2_2_forma_1->Accomplishment_281229->setDbValue($rs->fields('Accomplishment (12)'));
		$view_reps_2_2_forma_1->z9025_and_Above_281229->setDbValue($rs->fields('90% and Above (12)'));
		$view_reps_2_2_forma_1->Below_9025_281229->setDbValue($rs->fields('Below 90% (12)'));
	}

	// Load old record
	function LoadOldRecord() {
		global $view_reps_2_2_forma_1;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$view_reps_2_2_forma_1->CurrentFilter = $view_reps_2_2_forma_1->KeyFilter();
			$sSql = $view_reps_2_2_forma_1->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $view_reps_2_2_forma_1;

		// Initialize URLs
		$this->ViewUrl = $view_reps_2_2_forma_1->ViewUrl();
		$this->EditUrl = $view_reps_2_2_forma_1->EditUrl();
		$this->InlineEditUrl = $view_reps_2_2_forma_1->InlineEditUrl();
		$this->CopyUrl = $view_reps_2_2_forma_1->CopyUrl();
		$this->InlineCopyUrl = $view_reps_2_2_forma_1->InlineCopyUrl();
		$this->DeleteUrl = $view_reps_2_2_forma_1->DeleteUrl();

		// Call Row_Rendering event
		$view_reps_2_2_forma_1->Row_Rendering();

		// Common render codes for all row types
		// Constituent University

		$view_reps_2_2_forma_1->Constituent_University->CellCssStyle = "white-space: nowrap;";

		// Unit
		$view_reps_2_2_forma_1->Unit->CellCssStyle = "white-space: nowrap;";

		// MFO
		$view_reps_2_2_forma_1->MFO->CellCssStyle = "white-space: nowrap;";

		// PI 1
		$view_reps_2_2_forma_1->PI_1->CellCssStyle = "white-space: nowrap;";

		// PI Sub
		// Target (1)

		$view_reps_2_2_forma_1->Target_28129->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (1)
		$view_reps_2_2_forma_1->Accomplishment_28129->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (1)
		$view_reps_2_2_forma_1->z9025_and_Above_28129->CellCssStyle = "white-space: nowrap;";

		// Below 90% (1)
		$view_reps_2_2_forma_1->Below_9025_28129->CellCssStyle = "white-space: nowrap;";

		// PI 2
		$view_reps_2_2_forma_1->PI_2->CellCssStyle = "white-space: nowrap;";

		// Target (2)
		$view_reps_2_2_forma_1->Target_28229->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (2)
		$view_reps_2_2_forma_1->Accomplishment_28229->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (2)
		$view_reps_2_2_forma_1->z9025_and_Above_28229->CellCssStyle = "white-space: nowrap;";

		// Below 90% (2)
		$view_reps_2_2_forma_1->Below_9025_28229->CellCssStyle = "white-space: nowrap;";

		// PI 3
		$view_reps_2_2_forma_1->PI_3->CellCssStyle = "white-space: nowrap;";

		// Target (3)
		$view_reps_2_2_forma_1->Target_28329->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (3)
		$view_reps_2_2_forma_1->Accomplishment_28329->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (3)
		$view_reps_2_2_forma_1->z9025_and_Above_28329->CellCssStyle = "white-space: nowrap;";

		// Below 90% (3)
		$view_reps_2_2_forma_1->Below_9025_28329->CellCssStyle = "white-space: nowrap;";

		// PI 4
		$view_reps_2_2_forma_1->PI_4->CellCssStyle = "white-space: nowrap;";

		// Target (4)
		$view_reps_2_2_forma_1->Target_28429->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (4)
		$view_reps_2_2_forma_1->Accomplishment_28429->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (4)
		$view_reps_2_2_forma_1->z9025_and_Above_28429->CellCssStyle = "white-space: nowrap;";

		// Below 90% (4)
		$view_reps_2_2_forma_1->Below_9025_28429->CellCssStyle = "white-space: nowrap;";

		// PI 5
		$view_reps_2_2_forma_1->PI_5->CellCssStyle = "white-space: nowrap;";

		// Target (5)
		$view_reps_2_2_forma_1->Target_28529->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (5)
		$view_reps_2_2_forma_1->Accomplishment_28529->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (5)
		$view_reps_2_2_forma_1->z9025_and_Above_28529->CellCssStyle = "white-space: nowrap;";

		// Below 90% (5)
		$view_reps_2_2_forma_1->Below_9025_28529->CellCssStyle = "white-space: nowrap;";

		// PI 6
		$view_reps_2_2_forma_1->PI_6->CellCssStyle = "white-space: nowrap;";

		// Target (6)
		$view_reps_2_2_forma_1->Target_28629->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (6)
		$view_reps_2_2_forma_1->Accomplishment_28629->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (6)
		$view_reps_2_2_forma_1->z9025_and_Above_28629->CellCssStyle = "white-space: nowrap;";

		// Below 90% (6)
		$view_reps_2_2_forma_1->Below_9025_28629->CellCssStyle = "white-space: nowrap;";

		// PI 7
		$view_reps_2_2_forma_1->PI_7->CellCssStyle = "white-space: nowrap;";

		// Target (7)
		$view_reps_2_2_forma_1->Target_28729->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (7)
		$view_reps_2_2_forma_1->Accomplishment_28729->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (7)
		$view_reps_2_2_forma_1->z9025_and_Above_28729->CellCssStyle = "white-space: nowrap;";

		// Below 90% (7)
		$view_reps_2_2_forma_1->Below_9025_28729->CellCssStyle = "white-space: nowrap;";

		// PI 8
		$view_reps_2_2_forma_1->PI_8->CellCssStyle = "white-space: nowrap;";

		// Target (8)
		$view_reps_2_2_forma_1->Target_28829->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (8)
		$view_reps_2_2_forma_1->Accomplishment_28829->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (8)
		$view_reps_2_2_forma_1->z9025_and_Above_28829->CellCssStyle = "white-space: nowrap;";

		// Below 90% (8)
		$view_reps_2_2_forma_1->Below_9025_28829->CellCssStyle = "white-space: nowrap;";

		// PI 9
		$view_reps_2_2_forma_1->PI_9->CellCssStyle = "white-space: nowrap;";

		// Target (9)
		$view_reps_2_2_forma_1->Target_28929->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (9)
		$view_reps_2_2_forma_1->Accomplishment_28929->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (9)
		$view_reps_2_2_forma_1->z9025_and_Above_28929->CellCssStyle = "white-space: nowrap;";

		// Below 90% (9)
		$view_reps_2_2_forma_1->Below_9025_28929->CellCssStyle = "white-space: nowrap;";

		// PI 10
		$view_reps_2_2_forma_1->PI_10->CellCssStyle = "white-space: nowrap;";

		// Target (10)
		$view_reps_2_2_forma_1->Target_281029->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (10)
		$view_reps_2_2_forma_1->Accomplishment_281029->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (10)
		$view_reps_2_2_forma_1->z9025_and_Above_281029->CellCssStyle = "white-space: nowrap;";

		// Below 90% (10)
		$view_reps_2_2_forma_1->Below_9025_281029->CellCssStyle = "white-space: nowrap;";

		// PI 11
		$view_reps_2_2_forma_1->PI_11->CellCssStyle = "white-space: nowrap;";

		// Target (11)
		$view_reps_2_2_forma_1->Target_281129->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (11)
		$view_reps_2_2_forma_1->Accomplishment_281129->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (11)
		$view_reps_2_2_forma_1->z9025_and_Above_281129->CellCssStyle = "white-space: nowrap;";

		// Below 90% (11)
		$view_reps_2_2_forma_1->Below_9025_281129->CellCssStyle = "white-space: nowrap;";

		// PI 12
		$view_reps_2_2_forma_1->PI_12->CellCssStyle = "white-space: nowrap;";

		// Target (12)
		$view_reps_2_2_forma_1->Target_281229->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (12)
		$view_reps_2_2_forma_1->Accomplishment_281229->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (12)
		$view_reps_2_2_forma_1->z9025_and_Above_281229->CellCssStyle = "white-space: nowrap;";

		// Below 90% (12)
		$view_reps_2_2_forma_1->Below_9025_281229->CellCssStyle = "white-space: nowrap;";
		if ($view_reps_2_2_forma_1->RowType == UP_ROWTYPE_VIEW) { // View row

			// Constituent University
			$view_reps_2_2_forma_1->Constituent_University->ViewValue = $view_reps_2_2_forma_1->Constituent_University->CurrentValue;
			$view_reps_2_2_forma_1->Constituent_University->ViewCustomAttributes = "";

			// Unit
			$view_reps_2_2_forma_1->Unit->ViewValue = $view_reps_2_2_forma_1->Unit->CurrentValue;
			$view_reps_2_2_forma_1->Unit->ViewCustomAttributes = "";

			// MFO
			$view_reps_2_2_forma_1->MFO->ViewValue = $view_reps_2_2_forma_1->MFO->CurrentValue;
			$view_reps_2_2_forma_1->MFO->ViewCustomAttributes = "";

			// PI 1
			$view_reps_2_2_forma_1->PI_1->ViewValue = $view_reps_2_2_forma_1->PI_1->CurrentValue;
			$view_reps_2_2_forma_1->PI_1->ViewCustomAttributes = "";

			// PI Sub
			$view_reps_2_2_forma_1->PI_Sub->ViewValue = $view_reps_2_2_forma_1->PI_Sub->CurrentValue;
			$view_reps_2_2_forma_1->PI_Sub->ViewCustomAttributes = "";

			// Target (1)
			$view_reps_2_2_forma_1->Target_28129->ViewValue = $view_reps_2_2_forma_1->Target_28129->CurrentValue;
			$view_reps_2_2_forma_1->Target_28129->ViewCustomAttributes = "";

			// Accomplishment (1)
			$view_reps_2_2_forma_1->Accomplishment_28129->ViewValue = $view_reps_2_2_forma_1->Accomplishment_28129->CurrentValue;
			$view_reps_2_2_forma_1->Accomplishment_28129->ViewCustomAttributes = "";

			// 90% and Above (1)
			$view_reps_2_2_forma_1->z9025_and_Above_28129->ViewValue = $view_reps_2_2_forma_1->z9025_and_Above_28129->CurrentValue;
			$view_reps_2_2_forma_1->z9025_and_Above_28129->ViewCustomAttributes = "";

			// Below 90% (1)
			$view_reps_2_2_forma_1->Below_9025_28129->ViewValue = $view_reps_2_2_forma_1->Below_9025_28129->CurrentValue;
			$view_reps_2_2_forma_1->Below_9025_28129->ViewCustomAttributes = "";

			// PI 2
			$view_reps_2_2_forma_1->PI_2->ViewValue = $view_reps_2_2_forma_1->PI_2->CurrentValue;
			$view_reps_2_2_forma_1->PI_2->ViewCustomAttributes = "";

			// Target (2)
			$view_reps_2_2_forma_1->Target_28229->ViewValue = $view_reps_2_2_forma_1->Target_28229->CurrentValue;
			$view_reps_2_2_forma_1->Target_28229->ViewCustomAttributes = "";

			// Accomplishment (2)
			$view_reps_2_2_forma_1->Accomplishment_28229->ViewValue = $view_reps_2_2_forma_1->Accomplishment_28229->CurrentValue;
			$view_reps_2_2_forma_1->Accomplishment_28229->ViewCustomAttributes = "";

			// 90% and Above (2)
			$view_reps_2_2_forma_1->z9025_and_Above_28229->ViewValue = $view_reps_2_2_forma_1->z9025_and_Above_28229->CurrentValue;
			$view_reps_2_2_forma_1->z9025_and_Above_28229->ViewCustomAttributes = "";

			// Below 90% (2)
			$view_reps_2_2_forma_1->Below_9025_28229->ViewValue = $view_reps_2_2_forma_1->Below_9025_28229->CurrentValue;
			$view_reps_2_2_forma_1->Below_9025_28229->ViewCustomAttributes = "";

			// PI 3
			$view_reps_2_2_forma_1->PI_3->ViewValue = $view_reps_2_2_forma_1->PI_3->CurrentValue;
			$view_reps_2_2_forma_1->PI_3->ViewCustomAttributes = "";

			// Target (3)
			$view_reps_2_2_forma_1->Target_28329->ViewValue = $view_reps_2_2_forma_1->Target_28329->CurrentValue;
			$view_reps_2_2_forma_1->Target_28329->ViewCustomAttributes = "";

			// Accomplishment (3)
			$view_reps_2_2_forma_1->Accomplishment_28329->ViewValue = $view_reps_2_2_forma_1->Accomplishment_28329->CurrentValue;
			$view_reps_2_2_forma_1->Accomplishment_28329->ViewCustomAttributes = "";

			// 90% and Above (3)
			$view_reps_2_2_forma_1->z9025_and_Above_28329->ViewValue = $view_reps_2_2_forma_1->z9025_and_Above_28329->CurrentValue;
			$view_reps_2_2_forma_1->z9025_and_Above_28329->ViewCustomAttributes = "";

			// Below 90% (3)
			$view_reps_2_2_forma_1->Below_9025_28329->ViewValue = $view_reps_2_2_forma_1->Below_9025_28329->CurrentValue;
			$view_reps_2_2_forma_1->Below_9025_28329->ViewCustomAttributes = "";

			// PI 4
			$view_reps_2_2_forma_1->PI_4->ViewValue = $view_reps_2_2_forma_1->PI_4->CurrentValue;
			$view_reps_2_2_forma_1->PI_4->ViewCustomAttributes = "";

			// Target (4)
			$view_reps_2_2_forma_1->Target_28429->ViewValue = $view_reps_2_2_forma_1->Target_28429->CurrentValue;
			$view_reps_2_2_forma_1->Target_28429->ViewCustomAttributes = "";

			// Accomplishment (4)
			$view_reps_2_2_forma_1->Accomplishment_28429->ViewValue = $view_reps_2_2_forma_1->Accomplishment_28429->CurrentValue;
			$view_reps_2_2_forma_1->Accomplishment_28429->ViewCustomAttributes = "";

			// 90% and Above (4)
			$view_reps_2_2_forma_1->z9025_and_Above_28429->ViewValue = $view_reps_2_2_forma_1->z9025_and_Above_28429->CurrentValue;
			$view_reps_2_2_forma_1->z9025_and_Above_28429->ViewCustomAttributes = "";

			// Below 90% (4)
			$view_reps_2_2_forma_1->Below_9025_28429->ViewValue = $view_reps_2_2_forma_1->Below_9025_28429->CurrentValue;
			$view_reps_2_2_forma_1->Below_9025_28429->ViewCustomAttributes = "";

			// PI 5
			$view_reps_2_2_forma_1->PI_5->ViewValue = $view_reps_2_2_forma_1->PI_5->CurrentValue;
			$view_reps_2_2_forma_1->PI_5->ViewCustomAttributes = "";

			// Target (5)
			$view_reps_2_2_forma_1->Target_28529->ViewValue = $view_reps_2_2_forma_1->Target_28529->CurrentValue;
			$view_reps_2_2_forma_1->Target_28529->ViewCustomAttributes = "";

			// Accomplishment (5)
			$view_reps_2_2_forma_1->Accomplishment_28529->ViewValue = $view_reps_2_2_forma_1->Accomplishment_28529->CurrentValue;
			$view_reps_2_2_forma_1->Accomplishment_28529->ViewCustomAttributes = "";

			// 90% and Above (5)
			$view_reps_2_2_forma_1->z9025_and_Above_28529->ViewValue = $view_reps_2_2_forma_1->z9025_and_Above_28529->CurrentValue;
			$view_reps_2_2_forma_1->z9025_and_Above_28529->ViewCustomAttributes = "";

			// Below 90% (5)
			$view_reps_2_2_forma_1->Below_9025_28529->ViewValue = $view_reps_2_2_forma_1->Below_9025_28529->CurrentValue;
			$view_reps_2_2_forma_1->Below_9025_28529->ViewCustomAttributes = "";

			// PI 6
			$view_reps_2_2_forma_1->PI_6->ViewValue = $view_reps_2_2_forma_1->PI_6->CurrentValue;
			$view_reps_2_2_forma_1->PI_6->ViewCustomAttributes = "";

			// Target (6)
			$view_reps_2_2_forma_1->Target_28629->ViewValue = $view_reps_2_2_forma_1->Target_28629->CurrentValue;
			$view_reps_2_2_forma_1->Target_28629->ViewCustomAttributes = "";

			// Accomplishment (6)
			$view_reps_2_2_forma_1->Accomplishment_28629->ViewValue = $view_reps_2_2_forma_1->Accomplishment_28629->CurrentValue;
			$view_reps_2_2_forma_1->Accomplishment_28629->ViewCustomAttributes = "";

			// 90% and Above (6)
			$view_reps_2_2_forma_1->z9025_and_Above_28629->ViewValue = $view_reps_2_2_forma_1->z9025_and_Above_28629->CurrentValue;
			$view_reps_2_2_forma_1->z9025_and_Above_28629->ViewCustomAttributes = "";

			// Below 90% (6)
			$view_reps_2_2_forma_1->Below_9025_28629->ViewValue = $view_reps_2_2_forma_1->Below_9025_28629->CurrentValue;
			$view_reps_2_2_forma_1->Below_9025_28629->ViewCustomAttributes = "";

			// PI 7
			$view_reps_2_2_forma_1->PI_7->ViewValue = $view_reps_2_2_forma_1->PI_7->CurrentValue;
			$view_reps_2_2_forma_1->PI_7->ViewCustomAttributes = "";

			// Target (7)
			$view_reps_2_2_forma_1->Target_28729->ViewValue = $view_reps_2_2_forma_1->Target_28729->CurrentValue;
			$view_reps_2_2_forma_1->Target_28729->ViewCustomAttributes = "";

			// Accomplishment (7)
			$view_reps_2_2_forma_1->Accomplishment_28729->ViewValue = $view_reps_2_2_forma_1->Accomplishment_28729->CurrentValue;
			$view_reps_2_2_forma_1->Accomplishment_28729->ViewCustomAttributes = "";

			// 90% and Above (7)
			$view_reps_2_2_forma_1->z9025_and_Above_28729->ViewValue = $view_reps_2_2_forma_1->z9025_and_Above_28729->CurrentValue;
			$view_reps_2_2_forma_1->z9025_and_Above_28729->ViewCustomAttributes = "";

			// Below 90% (7)
			$view_reps_2_2_forma_1->Below_9025_28729->ViewValue = $view_reps_2_2_forma_1->Below_9025_28729->CurrentValue;
			$view_reps_2_2_forma_1->Below_9025_28729->ViewCustomAttributes = "";

			// PI 8
			$view_reps_2_2_forma_1->PI_8->ViewValue = $view_reps_2_2_forma_1->PI_8->CurrentValue;
			$view_reps_2_2_forma_1->PI_8->ViewCustomAttributes = "";

			// Target (8)
			$view_reps_2_2_forma_1->Target_28829->ViewValue = $view_reps_2_2_forma_1->Target_28829->CurrentValue;
			$view_reps_2_2_forma_1->Target_28829->ViewCustomAttributes = "";

			// Accomplishment (8)
			$view_reps_2_2_forma_1->Accomplishment_28829->ViewValue = $view_reps_2_2_forma_1->Accomplishment_28829->CurrentValue;
			$view_reps_2_2_forma_1->Accomplishment_28829->ViewCustomAttributes = "";

			// 90% and Above (8)
			$view_reps_2_2_forma_1->z9025_and_Above_28829->ViewValue = $view_reps_2_2_forma_1->z9025_and_Above_28829->CurrentValue;
			$view_reps_2_2_forma_1->z9025_and_Above_28829->ViewCustomAttributes = "";

			// Below 90% (8)
			$view_reps_2_2_forma_1->Below_9025_28829->ViewValue = $view_reps_2_2_forma_1->Below_9025_28829->CurrentValue;
			$view_reps_2_2_forma_1->Below_9025_28829->ViewCustomAttributes = "";

			// PI 9
			$view_reps_2_2_forma_1->PI_9->ViewValue = $view_reps_2_2_forma_1->PI_9->CurrentValue;
			$view_reps_2_2_forma_1->PI_9->ViewCustomAttributes = "";

			// Target (9)
			$view_reps_2_2_forma_1->Target_28929->ViewValue = $view_reps_2_2_forma_1->Target_28929->CurrentValue;
			$view_reps_2_2_forma_1->Target_28929->ViewCustomAttributes = "";

			// Accomplishment (9)
			$view_reps_2_2_forma_1->Accomplishment_28929->ViewValue = $view_reps_2_2_forma_1->Accomplishment_28929->CurrentValue;
			$view_reps_2_2_forma_1->Accomplishment_28929->ViewCustomAttributes = "";

			// 90% and Above (9)
			$view_reps_2_2_forma_1->z9025_and_Above_28929->ViewValue = $view_reps_2_2_forma_1->z9025_and_Above_28929->CurrentValue;
			$view_reps_2_2_forma_1->z9025_and_Above_28929->ViewCustomAttributes = "";

			// Below 90% (9)
			$view_reps_2_2_forma_1->Below_9025_28929->ViewValue = $view_reps_2_2_forma_1->Below_9025_28929->CurrentValue;
			$view_reps_2_2_forma_1->Below_9025_28929->ViewCustomAttributes = "";

			// PI 10
			$view_reps_2_2_forma_1->PI_10->ViewValue = $view_reps_2_2_forma_1->PI_10->CurrentValue;
			$view_reps_2_2_forma_1->PI_10->ViewCustomAttributes = "";

			// Target (10)
			$view_reps_2_2_forma_1->Target_281029->ViewValue = $view_reps_2_2_forma_1->Target_281029->CurrentValue;
			$view_reps_2_2_forma_1->Target_281029->ViewCustomAttributes = "";

			// Accomplishment (10)
			$view_reps_2_2_forma_1->Accomplishment_281029->ViewValue = $view_reps_2_2_forma_1->Accomplishment_281029->CurrentValue;
			$view_reps_2_2_forma_1->Accomplishment_281029->ViewCustomAttributes = "";

			// 90% and Above (10)
			$view_reps_2_2_forma_1->z9025_and_Above_281029->ViewValue = $view_reps_2_2_forma_1->z9025_and_Above_281029->CurrentValue;
			$view_reps_2_2_forma_1->z9025_and_Above_281029->ViewCustomAttributes = "";

			// Below 90% (10)
			$view_reps_2_2_forma_1->Below_9025_281029->ViewValue = $view_reps_2_2_forma_1->Below_9025_281029->CurrentValue;
			$view_reps_2_2_forma_1->Below_9025_281029->ViewCustomAttributes = "";

			// PI 11
			$view_reps_2_2_forma_1->PI_11->ViewValue = $view_reps_2_2_forma_1->PI_11->CurrentValue;
			$view_reps_2_2_forma_1->PI_11->ViewCustomAttributes = "";

			// Target (11)
			$view_reps_2_2_forma_1->Target_281129->ViewValue = $view_reps_2_2_forma_1->Target_281129->CurrentValue;
			$view_reps_2_2_forma_1->Target_281129->ViewCustomAttributes = "";

			// Accomplishment (11)
			$view_reps_2_2_forma_1->Accomplishment_281129->ViewValue = $view_reps_2_2_forma_1->Accomplishment_281129->CurrentValue;
			$view_reps_2_2_forma_1->Accomplishment_281129->ViewCustomAttributes = "";

			// 90% and Above (11)
			$view_reps_2_2_forma_1->z9025_and_Above_281129->ViewValue = $view_reps_2_2_forma_1->z9025_and_Above_281129->CurrentValue;
			$view_reps_2_2_forma_1->z9025_and_Above_281129->ViewCustomAttributes = "";

			// Below 90% (11)
			$view_reps_2_2_forma_1->Below_9025_281129->ViewValue = $view_reps_2_2_forma_1->Below_9025_281129->CurrentValue;
			$view_reps_2_2_forma_1->Below_9025_281129->ViewCustomAttributes = "";

			// PI 12
			$view_reps_2_2_forma_1->PI_12->ViewValue = $view_reps_2_2_forma_1->PI_12->CurrentValue;
			$view_reps_2_2_forma_1->PI_12->ViewCustomAttributes = "";

			// Target (12)
			$view_reps_2_2_forma_1->Target_281229->ViewValue = $view_reps_2_2_forma_1->Target_281229->CurrentValue;
			$view_reps_2_2_forma_1->Target_281229->ViewCustomAttributes = "";

			// Accomplishment (12)
			$view_reps_2_2_forma_1->Accomplishment_281229->ViewValue = $view_reps_2_2_forma_1->Accomplishment_281229->CurrentValue;
			$view_reps_2_2_forma_1->Accomplishment_281229->ViewCustomAttributes = "";

			// 90% and Above (12)
			$view_reps_2_2_forma_1->z9025_and_Above_281229->ViewValue = $view_reps_2_2_forma_1->z9025_and_Above_281229->CurrentValue;
			$view_reps_2_2_forma_1->z9025_and_Above_281229->ViewCustomAttributes = "";

			// Below 90% (12)
			$view_reps_2_2_forma_1->Below_9025_281229->ViewValue = $view_reps_2_2_forma_1->Below_9025_281229->CurrentValue;
			$view_reps_2_2_forma_1->Below_9025_281229->ViewCustomAttributes = "";

			// Constituent University
			$view_reps_2_2_forma_1->Constituent_University->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Constituent_University->HrefValue = "";
			$view_reps_2_2_forma_1->Constituent_University->TooltipValue = "";

			// Unit
			$view_reps_2_2_forma_1->Unit->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Unit->HrefValue = "";
			$view_reps_2_2_forma_1->Unit->TooltipValue = "";

			// MFO
			$view_reps_2_2_forma_1->MFO->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->MFO->HrefValue = "";
			$view_reps_2_2_forma_1->MFO->TooltipValue = "";

			// PI 1
			$view_reps_2_2_forma_1->PI_1->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_1->HrefValue = "";
			$view_reps_2_2_forma_1->PI_1->TooltipValue = "";

			// PI Sub
			$view_reps_2_2_forma_1->PI_Sub->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_Sub->HrefValue = "";
			$view_reps_2_2_forma_1->PI_Sub->TooltipValue = "";

			// Target (1)
			$view_reps_2_2_forma_1->Target_28129->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Target_28129->HrefValue = "";
			$view_reps_2_2_forma_1->Target_28129->TooltipValue = "";

			// Accomplishment (1)
			$view_reps_2_2_forma_1->Accomplishment_28129->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Accomplishment_28129->HrefValue = "";
			$view_reps_2_2_forma_1->Accomplishment_28129->TooltipValue = "";

			// 90% and Above (1)
			$view_reps_2_2_forma_1->z9025_and_Above_28129->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28129->HrefValue = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28129->TooltipValue = "";

			// Below 90% (1)
			$view_reps_2_2_forma_1->Below_9025_28129->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Below_9025_28129->HrefValue = "";
			$view_reps_2_2_forma_1->Below_9025_28129->TooltipValue = "";

			// PI 2
			$view_reps_2_2_forma_1->PI_2->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_2->HrefValue = "";
			$view_reps_2_2_forma_1->PI_2->TooltipValue = "";

			// Target (2)
			$view_reps_2_2_forma_1->Target_28229->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Target_28229->HrefValue = "";
			$view_reps_2_2_forma_1->Target_28229->TooltipValue = "";

			// Accomplishment (2)
			$view_reps_2_2_forma_1->Accomplishment_28229->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Accomplishment_28229->HrefValue = "";
			$view_reps_2_2_forma_1->Accomplishment_28229->TooltipValue = "";

			// 90% and Above (2)
			$view_reps_2_2_forma_1->z9025_and_Above_28229->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28229->HrefValue = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28229->TooltipValue = "";

			// Below 90% (2)
			$view_reps_2_2_forma_1->Below_9025_28229->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Below_9025_28229->HrefValue = "";
			$view_reps_2_2_forma_1->Below_9025_28229->TooltipValue = "";

			// PI 3
			$view_reps_2_2_forma_1->PI_3->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_3->HrefValue = "";
			$view_reps_2_2_forma_1->PI_3->TooltipValue = "";

			// Target (3)
			$view_reps_2_2_forma_1->Target_28329->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Target_28329->HrefValue = "";
			$view_reps_2_2_forma_1->Target_28329->TooltipValue = "";

			// Accomplishment (3)
			$view_reps_2_2_forma_1->Accomplishment_28329->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Accomplishment_28329->HrefValue = "";
			$view_reps_2_2_forma_1->Accomplishment_28329->TooltipValue = "";

			// 90% and Above (3)
			$view_reps_2_2_forma_1->z9025_and_Above_28329->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28329->HrefValue = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28329->TooltipValue = "";

			// Below 90% (3)
			$view_reps_2_2_forma_1->Below_9025_28329->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Below_9025_28329->HrefValue = "";
			$view_reps_2_2_forma_1->Below_9025_28329->TooltipValue = "";

			// PI 4
			$view_reps_2_2_forma_1->PI_4->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_4->HrefValue = "";
			$view_reps_2_2_forma_1->PI_4->TooltipValue = "";

			// Target (4)
			$view_reps_2_2_forma_1->Target_28429->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Target_28429->HrefValue = "";
			$view_reps_2_2_forma_1->Target_28429->TooltipValue = "";

			// Accomplishment (4)
			$view_reps_2_2_forma_1->Accomplishment_28429->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Accomplishment_28429->HrefValue = "";
			$view_reps_2_2_forma_1->Accomplishment_28429->TooltipValue = "";

			// 90% and Above (4)
			$view_reps_2_2_forma_1->z9025_and_Above_28429->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28429->HrefValue = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28429->TooltipValue = "";

			// Below 90% (4)
			$view_reps_2_2_forma_1->Below_9025_28429->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Below_9025_28429->HrefValue = "";
			$view_reps_2_2_forma_1->Below_9025_28429->TooltipValue = "";

			// PI 5
			$view_reps_2_2_forma_1->PI_5->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_5->HrefValue = "";
			$view_reps_2_2_forma_1->PI_5->TooltipValue = "";

			// Target (5)
			$view_reps_2_2_forma_1->Target_28529->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Target_28529->HrefValue = "";
			$view_reps_2_2_forma_1->Target_28529->TooltipValue = "";

			// Accomplishment (5)
			$view_reps_2_2_forma_1->Accomplishment_28529->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Accomplishment_28529->HrefValue = "";
			$view_reps_2_2_forma_1->Accomplishment_28529->TooltipValue = "";

			// 90% and Above (5)
			$view_reps_2_2_forma_1->z9025_and_Above_28529->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28529->HrefValue = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28529->TooltipValue = "";

			// Below 90% (5)
			$view_reps_2_2_forma_1->Below_9025_28529->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Below_9025_28529->HrefValue = "";
			$view_reps_2_2_forma_1->Below_9025_28529->TooltipValue = "";

			// PI 6
			$view_reps_2_2_forma_1->PI_6->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_6->HrefValue = "";
			$view_reps_2_2_forma_1->PI_6->TooltipValue = "";

			// Target (6)
			$view_reps_2_2_forma_1->Target_28629->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Target_28629->HrefValue = "";
			$view_reps_2_2_forma_1->Target_28629->TooltipValue = "";

			// Accomplishment (6)
			$view_reps_2_2_forma_1->Accomplishment_28629->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Accomplishment_28629->HrefValue = "";
			$view_reps_2_2_forma_1->Accomplishment_28629->TooltipValue = "";

			// 90% and Above (6)
			$view_reps_2_2_forma_1->z9025_and_Above_28629->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28629->HrefValue = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28629->TooltipValue = "";

			// Below 90% (6)
			$view_reps_2_2_forma_1->Below_9025_28629->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Below_9025_28629->HrefValue = "";
			$view_reps_2_2_forma_1->Below_9025_28629->TooltipValue = "";

			// PI 7
			$view_reps_2_2_forma_1->PI_7->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_7->HrefValue = "";
			$view_reps_2_2_forma_1->PI_7->TooltipValue = "";

			// Target (7)
			$view_reps_2_2_forma_1->Target_28729->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Target_28729->HrefValue = "";
			$view_reps_2_2_forma_1->Target_28729->TooltipValue = "";

			// Accomplishment (7)
			$view_reps_2_2_forma_1->Accomplishment_28729->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Accomplishment_28729->HrefValue = "";
			$view_reps_2_2_forma_1->Accomplishment_28729->TooltipValue = "";

			// 90% and Above (7)
			$view_reps_2_2_forma_1->z9025_and_Above_28729->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28729->HrefValue = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28729->TooltipValue = "";

			// Below 90% (7)
			$view_reps_2_2_forma_1->Below_9025_28729->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Below_9025_28729->HrefValue = "";
			$view_reps_2_2_forma_1->Below_9025_28729->TooltipValue = "";

			// PI 8
			$view_reps_2_2_forma_1->PI_8->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_8->HrefValue = "";
			$view_reps_2_2_forma_1->PI_8->TooltipValue = "";

			// Target (8)
			$view_reps_2_2_forma_1->Target_28829->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Target_28829->HrefValue = "";
			$view_reps_2_2_forma_1->Target_28829->TooltipValue = "";

			// Accomplishment (8)
			$view_reps_2_2_forma_1->Accomplishment_28829->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Accomplishment_28829->HrefValue = "";
			$view_reps_2_2_forma_1->Accomplishment_28829->TooltipValue = "";

			// 90% and Above (8)
			$view_reps_2_2_forma_1->z9025_and_Above_28829->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28829->HrefValue = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28829->TooltipValue = "";

			// Below 90% (8)
			$view_reps_2_2_forma_1->Below_9025_28829->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Below_9025_28829->HrefValue = "";
			$view_reps_2_2_forma_1->Below_9025_28829->TooltipValue = "";

			// PI 9
			$view_reps_2_2_forma_1->PI_9->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_9->HrefValue = "";
			$view_reps_2_2_forma_1->PI_9->TooltipValue = "";

			// Target (9)
			$view_reps_2_2_forma_1->Target_28929->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Target_28929->HrefValue = "";
			$view_reps_2_2_forma_1->Target_28929->TooltipValue = "";

			// Accomplishment (9)
			$view_reps_2_2_forma_1->Accomplishment_28929->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Accomplishment_28929->HrefValue = "";
			$view_reps_2_2_forma_1->Accomplishment_28929->TooltipValue = "";

			// 90% and Above (9)
			$view_reps_2_2_forma_1->z9025_and_Above_28929->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28929->HrefValue = "";
			$view_reps_2_2_forma_1->z9025_and_Above_28929->TooltipValue = "";

			// Below 90% (9)
			$view_reps_2_2_forma_1->Below_9025_28929->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Below_9025_28929->HrefValue = "";
			$view_reps_2_2_forma_1->Below_9025_28929->TooltipValue = "";

			// PI 10
			$view_reps_2_2_forma_1->PI_10->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_10->HrefValue = "";
			$view_reps_2_2_forma_1->PI_10->TooltipValue = "";

			// Target (10)
			$view_reps_2_2_forma_1->Target_281029->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Target_281029->HrefValue = "";
			$view_reps_2_2_forma_1->Target_281029->TooltipValue = "";

			// Accomplishment (10)
			$view_reps_2_2_forma_1->Accomplishment_281029->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Accomplishment_281029->HrefValue = "";
			$view_reps_2_2_forma_1->Accomplishment_281029->TooltipValue = "";

			// 90% and Above (10)
			$view_reps_2_2_forma_1->z9025_and_Above_281029->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->z9025_and_Above_281029->HrefValue = "";
			$view_reps_2_2_forma_1->z9025_and_Above_281029->TooltipValue = "";

			// Below 90% (10)
			$view_reps_2_2_forma_1->Below_9025_281029->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Below_9025_281029->HrefValue = "";
			$view_reps_2_2_forma_1->Below_9025_281029->TooltipValue = "";

			// PI 11
			$view_reps_2_2_forma_1->PI_11->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_11->HrefValue = "";
			$view_reps_2_2_forma_1->PI_11->TooltipValue = "";

			// Target (11)
			$view_reps_2_2_forma_1->Target_281129->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Target_281129->HrefValue = "";
			$view_reps_2_2_forma_1->Target_281129->TooltipValue = "";

			// Accomplishment (11)
			$view_reps_2_2_forma_1->Accomplishment_281129->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Accomplishment_281129->HrefValue = "";
			$view_reps_2_2_forma_1->Accomplishment_281129->TooltipValue = "";

			// 90% and Above (11)
			$view_reps_2_2_forma_1->z9025_and_Above_281129->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->z9025_and_Above_281129->HrefValue = "";
			$view_reps_2_2_forma_1->z9025_and_Above_281129->TooltipValue = "";

			// Below 90% (11)
			$view_reps_2_2_forma_1->Below_9025_281129->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Below_9025_281129->HrefValue = "";
			$view_reps_2_2_forma_1->Below_9025_281129->TooltipValue = "";

			// PI 12
			$view_reps_2_2_forma_1->PI_12->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->PI_12->HrefValue = "";
			$view_reps_2_2_forma_1->PI_12->TooltipValue = "";

			// Target (12)
			$view_reps_2_2_forma_1->Target_281229->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Target_281229->HrefValue = "";
			$view_reps_2_2_forma_1->Target_281229->TooltipValue = "";

			// Accomplishment (12)
			$view_reps_2_2_forma_1->Accomplishment_281229->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Accomplishment_281229->HrefValue = "";
			$view_reps_2_2_forma_1->Accomplishment_281229->TooltipValue = "";

			// 90% and Above (12)
			$view_reps_2_2_forma_1->z9025_and_Above_281229->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->z9025_and_Above_281229->HrefValue = "";
			$view_reps_2_2_forma_1->z9025_and_Above_281229->TooltipValue = "";

			// Below 90% (12)
			$view_reps_2_2_forma_1->Below_9025_281229->LinkCustomAttributes = "";
			$view_reps_2_2_forma_1->Below_9025_281229->HrefValue = "";
			$view_reps_2_2_forma_1->Below_9025_281229->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($view_reps_2_2_forma_1->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$view_reps_2_2_forma_1->Row_Rendered();
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
