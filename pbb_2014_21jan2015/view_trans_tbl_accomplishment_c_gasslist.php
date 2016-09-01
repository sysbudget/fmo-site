<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "view_trans_tbl_accomplishment_c_gassinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$view_trans_tbl_accomplishment_c_gass_list = new cview_trans_tbl_accomplishment_c_gass_list();
$Page =& $view_trans_tbl_accomplishment_c_gass_list;

// Page init
$view_trans_tbl_accomplishment_c_gass_list->Page_Init();

// Page main
$view_trans_tbl_accomplishment_c_gass_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($view_trans_tbl_accomplishment_c_gass->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var view_trans_tbl_accomplishment_c_gass_list = new up_Page("view_trans_tbl_accomplishment_c_gass_list");

// page properties
view_trans_tbl_accomplishment_c_gass_list.PageID = "list"; // page ID
view_trans_tbl_accomplishment_c_gass_list.FormID = "fview_trans_tbl_accomplishment_c_gasslist"; // form ID
var UP_PAGE_ID = view_trans_tbl_accomplishment_c_gass_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
view_trans_tbl_accomplishment_c_gass_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
view_trans_tbl_accomplishment_c_gass_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
view_trans_tbl_accomplishment_c_gass_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
view_trans_tbl_accomplishment_c_gass_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($view_trans_tbl_accomplishment_c_gass->Export == "") || (UP_EXPORT_MASTER_RECORD && $view_trans_tbl_accomplishment_c_gass->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$view_trans_tbl_accomplishment_c_gass_list->TotalRecs = $view_trans_tbl_accomplishment_c_gass->SelectRecordCount();
	} else {
		if ($view_trans_tbl_accomplishment_c_gass_list->Recordset = $view_trans_tbl_accomplishment_c_gass_list->LoadRecordset())
			$view_trans_tbl_accomplishment_c_gass_list->TotalRecs = $view_trans_tbl_accomplishment_c_gass_list->Recordset->RecordCount();
	}
	$view_trans_tbl_accomplishment_c_gass_list->StartRec = 1;
	if ($view_trans_tbl_accomplishment_c_gass_list->DisplayRecs <= 0 || ($view_trans_tbl_accomplishment_c_gass->Export <> "" && $view_trans_tbl_accomplishment_c_gass->ExportAll)) // Display all records
		$view_trans_tbl_accomplishment_c_gass_list->DisplayRecs = $view_trans_tbl_accomplishment_c_gass_list->TotalRecs;
	if (!($view_trans_tbl_accomplishment_c_gass->Export <> "" && $view_trans_tbl_accomplishment_c_gass->ExportAll))
		$view_trans_tbl_accomplishment_c_gass_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$view_trans_tbl_accomplishment_c_gass_list->Recordset = $view_trans_tbl_accomplishment_c_gass_list->LoadRecordset($view_trans_tbl_accomplishment_c_gass_list->StartRec-1, $view_trans_tbl_accomplishment_c_gass_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $view_trans_tbl_accomplishment_c_gass->TableCaption() ?>
&nbsp;&nbsp;<?php $view_trans_tbl_accomplishment_c_gass_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($view_trans_tbl_accomplishment_c_gass->Export == "" && $view_trans_tbl_accomplishment_c_gass->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(view_trans_tbl_accomplishment_c_gass_list);" style="text-decoration: none;"><img id="view_trans_tbl_accomplishment_c_gass_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="view_trans_tbl_accomplishment_c_gass_list_SearchPanel">
<form name="fview_trans_tbl_accomplishment_c_gasslistsrch" id="fview_trans_tbl_accomplishment_c_gasslistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="view_trans_tbl_accomplishment_c_gass">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_c_gass->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $view_trans_tbl_accomplishment_c_gass_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($view_trans_tbl_accomplishment_c_gass->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($view_trans_tbl_accomplishment_c_gass->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($view_trans_tbl_accomplishment_c_gass->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $view_trans_tbl_accomplishment_c_gass_list->ShowPageHeader(); ?>
<?php
$view_trans_tbl_accomplishment_c_gass_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($view_trans_tbl_accomplishment_c_gass->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($view_trans_tbl_accomplishment_c_gass->CurrentAction <> "gridadd" && $view_trans_tbl_accomplishment_c_gass->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($view_trans_tbl_accomplishment_c_gass_list->Pager)) $view_trans_tbl_accomplishment_c_gass_list->Pager = new cPrevNextPager($view_trans_tbl_accomplishment_c_gass_list->StartRec, $view_trans_tbl_accomplishment_c_gass_list->DisplayRecs, $view_trans_tbl_accomplishment_c_gass_list->TotalRecs) ?>
<?php if ($view_trans_tbl_accomplishment_c_gass_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($view_trans_tbl_accomplishment_c_gass_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $view_trans_tbl_accomplishment_c_gass_list->PageUrl() ?>start=<?php echo $view_trans_tbl_accomplishment_c_gass_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_trans_tbl_accomplishment_c_gass_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $view_trans_tbl_accomplishment_c_gass_list->PageUrl() ?>start=<?php echo $view_trans_tbl_accomplishment_c_gass_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $view_trans_tbl_accomplishment_c_gass_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($view_trans_tbl_accomplishment_c_gass_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $view_trans_tbl_accomplishment_c_gass_list->PageUrl() ?>start=<?php echo $view_trans_tbl_accomplishment_c_gass_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($view_trans_tbl_accomplishment_c_gass_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $view_trans_tbl_accomplishment_c_gass_list->PageUrl() ?>start=<?php echo $view_trans_tbl_accomplishment_c_gass_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $view_trans_tbl_accomplishment_c_gass_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_trans_tbl_accomplishment_c_gass_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_trans_tbl_accomplishment_c_gass_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_trans_tbl_accomplishment_c_gass_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass_list->SearchWhere == "0=101") { ?>
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
<form name="fview_trans_tbl_accomplishment_c_gasslist" id="fview_trans_tbl_accomplishment_c_gasslist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="view_trans_tbl_accomplishment_c_gass">
<div id="gmp_view_trans_tbl_accomplishment_c_gass" class="upGridMiddlePanel">
<?php if ($view_trans_tbl_accomplishment_c_gass_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $view_trans_tbl_accomplishment_c_gass->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$view_trans_tbl_accomplishment_c_gass_list->RenderListOptions();

// Render list options (header, left)
$view_trans_tbl_accomplishment_c_gass_list->ListOptions->Render("header", "left");
?>
<?php if ($view_trans_tbl_accomplishment_c_gass->unit_bo->Visible) { // unit_bo ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->unit_bo) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_trans_tbl_accomplishment_c_gass->unit_bo->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->unit_bo) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->unit_bo->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->unit_bo->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->unit_bo->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_trans_tbl_accomplishment_c_gass->pi_no->Visible) { // pi_no ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->pi_no) == "") { ?>
		<td><?php echo $view_trans_tbl_accomplishment_c_gass->pi_no->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->pi_no) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->pi_no->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->pi_no->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->pi_no->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_trans_tbl_accomplishment_c_gass->pi_1->Visible) { // pi_1 ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->pi_1) == "") { ?>
		<td><?php echo $view_trans_tbl_accomplishment_c_gass->pi_1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->pi_1) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->pi_1->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->pi_1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->pi_1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_trans_tbl_accomplishment_c_gass->target->Visible) { // target ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->target) == "") { ?>
		<td><?php echo $view_trans_tbl_accomplishment_c_gass->target->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->target) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->target->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->target->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->target->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_trans_tbl_accomplishment_c_gass->t_numerator->Visible) { // t_numerator ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->t_numerator) == "") { ?>
		<td><?php echo $view_trans_tbl_accomplishment_c_gass->t_numerator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->t_numerator) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->t_numerator->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->t_numerator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->t_numerator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_trans_tbl_accomplishment_c_gass->t_denominator->Visible) { // t_denominator ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->t_denominator) == "") { ?>
		<td><?php echo $view_trans_tbl_accomplishment_c_gass->t_denominator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->t_denominator) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->t_denominator->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->t_denominator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->t_denominator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_trans_tbl_accomplishment_c_gass->accomplishment->Visible) { // accomplishment ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->accomplishment) == "") { ?>
		<td><?php echo $view_trans_tbl_accomplishment_c_gass->accomplishment->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->accomplishment) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->accomplishment->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->accomplishment->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->accomplishment->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_trans_tbl_accomplishment_c_gass->a_numerator->Visible) { // a_numerator ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->a_numerator) == "") { ?>
		<td><?php echo $view_trans_tbl_accomplishment_c_gass->a_numerator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->a_numerator) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->a_numerator->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->a_numerator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->a_numerator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_trans_tbl_accomplishment_c_gass->a_denominator->Visible) { // a_denominator ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->a_denominator) == "") { ?>
		<td><?php echo $view_trans_tbl_accomplishment_c_gass->a_denominator->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->a_denominator) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->a_denominator->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->a_denominator->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->a_denominator->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_trans_tbl_accomplishment_c_gass->remarks->Visible) { // remarks ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->remarks) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_trans_tbl_accomplishment_c_gass->remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->remarks->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_trans_tbl_accomplishment_c_gass->above_90->Visible) { // above_90 ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->above_90) == "") { ?>
		<td><?php echo $view_trans_tbl_accomplishment_c_gass->above_90->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->above_90) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->above_90->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->above_90->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->above_90->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_trans_tbl_accomplishment_c_gass->below_90->Visible) { // below_90 ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->below_90) == "") { ?>
		<td><?php echo $view_trans_tbl_accomplishment_c_gass->below_90->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->below_90) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->below_90->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->below_90->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->below_90->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->Visible) { // remarks_cutOffDate ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_trans_tbl_accomplishment_c_gass->SortUrl($view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$view_trans_tbl_accomplishment_c_gass_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($view_trans_tbl_accomplishment_c_gass->ExportAll && $view_trans_tbl_accomplishment_c_gass->Export <> "") {
	$view_trans_tbl_accomplishment_c_gass_list->StopRec = $view_trans_tbl_accomplishment_c_gass_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_trans_tbl_accomplishment_c_gass_list->TotalRecs > $view_trans_tbl_accomplishment_c_gass_list->StartRec + $view_trans_tbl_accomplishment_c_gass_list->DisplayRecs - 1)
		$view_trans_tbl_accomplishment_c_gass_list->StopRec = $view_trans_tbl_accomplishment_c_gass_list->StartRec + $view_trans_tbl_accomplishment_c_gass_list->DisplayRecs - 1;
	else
		$view_trans_tbl_accomplishment_c_gass_list->StopRec = $view_trans_tbl_accomplishment_c_gass_list->TotalRecs;
}
$view_trans_tbl_accomplishment_c_gass_list->RecCnt = $view_trans_tbl_accomplishment_c_gass_list->StartRec - 1;
if ($view_trans_tbl_accomplishment_c_gass_list->Recordset && !$view_trans_tbl_accomplishment_c_gass_list->Recordset->EOF) {
	$view_trans_tbl_accomplishment_c_gass_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $view_trans_tbl_accomplishment_c_gass_list->StartRec > 1)
		$view_trans_tbl_accomplishment_c_gass_list->Recordset->Move($view_trans_tbl_accomplishment_c_gass_list->StartRec - 1);
} elseif (!$view_trans_tbl_accomplishment_c_gass->AllowAddDeleteRow && $view_trans_tbl_accomplishment_c_gass_list->StopRec == 0) {
	$view_trans_tbl_accomplishment_c_gass_list->StopRec = $view_trans_tbl_accomplishment_c_gass->GridAddRowCount;
}

// Initialize aggregate
$view_trans_tbl_accomplishment_c_gass->RowType = UP_ROWTYPE_AGGREGATEINIT;
$view_trans_tbl_accomplishment_c_gass->ResetAttrs();
$view_trans_tbl_accomplishment_c_gass_list->RenderRow();
$view_trans_tbl_accomplishment_c_gass_list->RowCnt = 0;
while ($view_trans_tbl_accomplishment_c_gass_list->RecCnt < $view_trans_tbl_accomplishment_c_gass_list->StopRec) {
	$view_trans_tbl_accomplishment_c_gass_list->RecCnt++;
	if (intval($view_trans_tbl_accomplishment_c_gass_list->RecCnt) >= intval($view_trans_tbl_accomplishment_c_gass_list->StartRec)) {
		$view_trans_tbl_accomplishment_c_gass_list->RowCnt++;

		// Set up key count
		$view_trans_tbl_accomplishment_c_gass_list->KeyCount = $view_trans_tbl_accomplishment_c_gass_list->RowIndex;

		// Init row class and style
		$view_trans_tbl_accomplishment_c_gass->ResetAttrs();
		$view_trans_tbl_accomplishment_c_gass->CssClass = "";
		if ($view_trans_tbl_accomplishment_c_gass->CurrentAction == "gridadd") {
		} else {
			$view_trans_tbl_accomplishment_c_gass_list->LoadRowValues($view_trans_tbl_accomplishment_c_gass_list->Recordset); // Load row values
		}
		$view_trans_tbl_accomplishment_c_gass->RowType = UP_ROWTYPE_VIEW; // Render view
		$view_trans_tbl_accomplishment_c_gass->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$view_trans_tbl_accomplishment_c_gass_list->RenderRow();

		// Render list options
		$view_trans_tbl_accomplishment_c_gass_list->RenderListOptions();
?>
	<tr<?php echo $view_trans_tbl_accomplishment_c_gass->RowAttributes() ?>>
<?php

// Render list options (body, left)
$view_trans_tbl_accomplishment_c_gass_list->ListOptions->Render("body", "left");
?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->unit_bo->Visible) { // unit_bo ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->unit_bo->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->unit_bo->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->unit_bo->ListViewValue() ?></div>
<a name="<?php echo $view_trans_tbl_accomplishment_c_gass_list->PageObjName . "_row_" . $view_trans_tbl_accomplishment_c_gass_list->RowCnt ?>" id="<?php echo $view_trans_tbl_accomplishment_c_gass_list->PageObjName . "_row_" . $view_trans_tbl_accomplishment_c_gass_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->pi_no->Visible) { // pi_no ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->pi_no->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->pi_no->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->pi_no->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->pi_1->Visible) { // pi_1 ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->pi_1->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->pi_1->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->pi_1->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->target->Visible) { // target ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->target->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->target->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->target->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->t_numerator->Visible) { // t_numerator ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->t_numerator->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->t_numerator->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->t_numerator->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->t_denominator->Visible) { // t_denominator ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->t_denominator->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->t_denominator->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->t_denominator->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->accomplishment->Visible) { // accomplishment ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->accomplishment->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->accomplishment->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->accomplishment->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->a_numerator->Visible) { // a_numerator ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->a_numerator->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->a_numerator->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->a_numerator->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->a_denominator->Visible) { // a_denominator ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->a_denominator->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->a_denominator->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->a_denominator->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->remarks->Visible) { // remarks ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->remarks->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->remarks->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->above_90->Visible) { // above_90 ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->above_90->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->above_90->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->above_90->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->below_90->Visible) { // below_90 ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->below_90->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->below_90->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->below_90->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->Visible) { // remarks_cutOffDate ?>
		<td<?php echo $view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->CellAttributes() ?>>
<div<?php echo $view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_trans_tbl_accomplishment_c_gass_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($view_trans_tbl_accomplishment_c_gass->CurrentAction <> "gridadd")
		$view_trans_tbl_accomplishment_c_gass_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($view_trans_tbl_accomplishment_c_gass_list->Recordset)
	$view_trans_tbl_accomplishment_c_gass_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($view_trans_tbl_accomplishment_c_gass->Export == "" && $view_trans_tbl_accomplishment_c_gass->CurrentAction == "") { ?>
<?php } ?>
<?php
$view_trans_tbl_accomplishment_c_gass_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($view_trans_tbl_accomplishment_c_gass->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_trans_tbl_accomplishment_c_gass_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cview_trans_tbl_accomplishment_c_gass_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'view_trans_tbl_accomplishment_c_gass';

	// Page object name
	var $PageObjName = 'view_trans_tbl_accomplishment_c_gass_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $view_trans_tbl_accomplishment_c_gass;
		if ($view_trans_tbl_accomplishment_c_gass->UseTokenInUrl) $PageUrl .= "t=" . $view_trans_tbl_accomplishment_c_gass->TableVar . "&"; // Add page token
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
		global $objForm, $view_trans_tbl_accomplishment_c_gass;
		if ($view_trans_tbl_accomplishment_c_gass->UseTokenInUrl) {
			if ($objForm)
				return ($view_trans_tbl_accomplishment_c_gass->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($view_trans_tbl_accomplishment_c_gass->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cview_trans_tbl_accomplishment_c_gass_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (view_trans_tbl_accomplishment_c_gass)
		if (!isset($GLOBALS["view_trans_tbl_accomplishment_c_gass"])) {
			$GLOBALS["view_trans_tbl_accomplishment_c_gass"] = new cview_trans_tbl_accomplishment_c_gass();
			$GLOBALS["Table"] =& $GLOBALS["view_trans_tbl_accomplishment_c_gass"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "view_trans_tbl_accomplishment_c_gassadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "view_trans_tbl_accomplishment_c_gassdelete.php";
		$this->MultiUpdateUrl = "view_trans_tbl_accomplishment_c_gassupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'view_trans_tbl_accomplishment_c_gass', TRUE);

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
		global $view_trans_tbl_accomplishment_c_gass;

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
			$view_trans_tbl_accomplishment_c_gass->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $view_trans_tbl_accomplishment_c_gass;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($view_trans_tbl_accomplishment_c_gass->Export <> "" ||
				$view_trans_tbl_accomplishment_c_gass->CurrentAction == "gridadd" ||
				$view_trans_tbl_accomplishment_c_gass->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$view_trans_tbl_accomplishment_c_gass->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($view_trans_tbl_accomplishment_c_gass->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $view_trans_tbl_accomplishment_c_gass->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$view_trans_tbl_accomplishment_c_gass->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$view_trans_tbl_accomplishment_c_gass->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$view_trans_tbl_accomplishment_c_gass->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $view_trans_tbl_accomplishment_c_gass->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$view_trans_tbl_accomplishment_c_gass->setSessionWhere($sFilter);
		$view_trans_tbl_accomplishment_c_gass->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $view_trans_tbl_accomplishment_c_gass;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $view_trans_tbl_accomplishment_c_gass->unit_bo, $Keyword);
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
		global $Security, $view_trans_tbl_accomplishment_c_gass;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $view_trans_tbl_accomplishment_c_gass->BasicSearchKeyword;
		$sSearchType = $view_trans_tbl_accomplishment_c_gass->BasicSearchType;
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
			$view_trans_tbl_accomplishment_c_gass->setSessionBasicSearchKeyword($sSearchKeyword);
			$view_trans_tbl_accomplishment_c_gass->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $view_trans_tbl_accomplishment_c_gass;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$view_trans_tbl_accomplishment_c_gass->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $view_trans_tbl_accomplishment_c_gass;
		$view_trans_tbl_accomplishment_c_gass->setSessionBasicSearchKeyword("");
		$view_trans_tbl_accomplishment_c_gass->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $view_trans_tbl_accomplishment_c_gass;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$view_trans_tbl_accomplishment_c_gass->BasicSearchKeyword = $view_trans_tbl_accomplishment_c_gass->getSessionBasicSearchKeyword();
			$view_trans_tbl_accomplishment_c_gass->BasicSearchType = $view_trans_tbl_accomplishment_c_gass->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $view_trans_tbl_accomplishment_c_gass;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$view_trans_tbl_accomplishment_c_gass->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$view_trans_tbl_accomplishment_c_gass->CurrentOrderType = @$_GET["ordertype"];
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->unit_bo); // unit_bo
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->pi_no); // pi_no
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->pi_1); // pi_1
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->target); // target
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->t_numerator); // t_numerator
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->t_denominator); // t_denominator
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->accomplishment); // accomplishment
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->a_numerator); // a_numerator
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->a_denominator); // a_denominator
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->remarks); // remarks
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->above_90); // above_90
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->below_90); // below_90
			$view_trans_tbl_accomplishment_c_gass->UpdateSort($view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate); // remarks_cutOffDate
			$view_trans_tbl_accomplishment_c_gass->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $view_trans_tbl_accomplishment_c_gass;
		$sOrderBy = $view_trans_tbl_accomplishment_c_gass->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($view_trans_tbl_accomplishment_c_gass->SqlOrderBy() <> "") {
				$sOrderBy = $view_trans_tbl_accomplishment_c_gass->SqlOrderBy();
				$view_trans_tbl_accomplishment_c_gass->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $view_trans_tbl_accomplishment_c_gass;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$view_trans_tbl_accomplishment_c_gass->setSessionOrderBy($sOrderBy);
				$view_trans_tbl_accomplishment_c_gass->unit_bo->setSort("");
				$view_trans_tbl_accomplishment_c_gass->pi_no->setSort("");
				$view_trans_tbl_accomplishment_c_gass->pi_1->setSort("");
				$view_trans_tbl_accomplishment_c_gass->target->setSort("");
				$view_trans_tbl_accomplishment_c_gass->t_numerator->setSort("");
				$view_trans_tbl_accomplishment_c_gass->t_denominator->setSort("");
				$view_trans_tbl_accomplishment_c_gass->accomplishment->setSort("");
				$view_trans_tbl_accomplishment_c_gass->a_numerator->setSort("");
				$view_trans_tbl_accomplishment_c_gass->a_denominator->setSort("");
				$view_trans_tbl_accomplishment_c_gass->remarks->setSort("");
				$view_trans_tbl_accomplishment_c_gass->above_90->setSort("");
				$view_trans_tbl_accomplishment_c_gass->below_90->setSort("");
				$view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$view_trans_tbl_accomplishment_c_gass->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $view_trans_tbl_accomplishment_c_gass;

		// "edit"
		$item =& $this->ListOptions->Add("edit");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanEdit();
		$item->OnLeft = TRUE;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $view_trans_tbl_accomplishment_c_gass, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $this->ShowOptionLink() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $view_trans_tbl_accomplishment_c_gass;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $view_trans_tbl_accomplishment_c_gass;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$view_trans_tbl_accomplishment_c_gass->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$view_trans_tbl_accomplishment_c_gass->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $view_trans_tbl_accomplishment_c_gass->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$view_trans_tbl_accomplishment_c_gass->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$view_trans_tbl_accomplishment_c_gass->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$view_trans_tbl_accomplishment_c_gass->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $view_trans_tbl_accomplishment_c_gass;
		$view_trans_tbl_accomplishment_c_gass->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$view_trans_tbl_accomplishment_c_gass->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $view_trans_tbl_accomplishment_c_gass;

		// Call Recordset Selecting event
		$view_trans_tbl_accomplishment_c_gass->Recordset_Selecting($view_trans_tbl_accomplishment_c_gass->CurrentFilter);

		// Load List page SQL
		$sSql = $view_trans_tbl_accomplishment_c_gass->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$view_trans_tbl_accomplishment_c_gass->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $view_trans_tbl_accomplishment_c_gass;
		$sFilter = $view_trans_tbl_accomplishment_c_gass->KeyFilter();

		// Call Row Selecting event
		$view_trans_tbl_accomplishment_c_gass->Row_Selecting($sFilter);

		// Load SQL based on filter
		$view_trans_tbl_accomplishment_c_gass->CurrentFilter = $sFilter;
		$sSql = $view_trans_tbl_accomplishment_c_gass->SQL();
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
		global $conn, $view_trans_tbl_accomplishment_c_gass;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$view_trans_tbl_accomplishment_c_gass->Row_Selected($row);
		$view_trans_tbl_accomplishment_c_gass->pi_id->setDbValue($rs->fields('pi_id'));
		$view_trans_tbl_accomplishment_c_gass->id->setDbValue($rs->fields('id'));
		$view_trans_tbl_accomplishment_c_gass->unit_bo->setDbValue($rs->fields('unit_bo'));
		$view_trans_tbl_accomplishment_c_gass->unit_cu->setDbValue($rs->fields('unit_cu'));
		$view_trans_tbl_accomplishment_c_gass->pi->setDbValue($rs->fields('pi'));
		$view_trans_tbl_accomplishment_c_gass->pi_no->setDbValue($rs->fields('pi_no'));
		$view_trans_tbl_accomplishment_c_gass->pi_description->setDbValue($rs->fields('pi_description'));
		$view_trans_tbl_accomplishment_c_gass->pi_1->setDbValue($rs->fields('pi_1'));
		$view_trans_tbl_accomplishment_c_gass->target->setDbValue($rs->fields('target'));
		$view_trans_tbl_accomplishment_c_gass->t_numerator->setDbValue($rs->fields('t_numerator'));
		$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr1->setDbValue($rs->fields('t_numerator_qtr1'));
		$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr2->setDbValue($rs->fields('t_numerator_qtr2'));
		$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr3->setDbValue($rs->fields('t_numerator_qtr3'));
		$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr4->setDbValue($rs->fields('t_numerator_qtr4'));
		$view_trans_tbl_accomplishment_c_gass->t_denominator->setDbValue($rs->fields('t_denominator'));
		$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr1->setDbValue($rs->fields('t_denominator_qtr1'));
		$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr2->setDbValue($rs->fields('t_denominator_qtr2'));
		$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr3->setDbValue($rs->fields('t_denominator_qtr3'));
		$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr4->setDbValue($rs->fields('t_denominator_qtr4'));
		$view_trans_tbl_accomplishment_c_gass->accomplishment->setDbValue($rs->fields('accomplishment'));
		$view_trans_tbl_accomplishment_c_gass->a_numerator->setDbValue($rs->fields('a_numerator'));
		$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr1->setDbValue($rs->fields('a_numerator_qtr1'));
		$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr2->setDbValue($rs->fields('a_numerator_qtr2'));
		$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr3->setDbValue($rs->fields('a_numerator_qtr3'));
		$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr4->setDbValue($rs->fields('a_numerator_qtr4'));
		$view_trans_tbl_accomplishment_c_gass->a_denominator->setDbValue($rs->fields('a_denominator'));
		$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr1->setDbValue($rs->fields('a_denominator_qtr1'));
		$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr2->setDbValue($rs->fields('a_denominator_qtr2'));
		$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr3->setDbValue($rs->fields('a_denominator_qtr3'));
		$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr4->setDbValue($rs->fields('a_denominator_qtr4'));
		$view_trans_tbl_accomplishment_c_gass->remarks->setDbValue($rs->fields('remarks'));
		$view_trans_tbl_accomplishment_c_gass->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$view_trans_tbl_accomplishment_c_gass->id_units->setDbValue($rs->fields('id_units'));
		$view_trans_tbl_accomplishment_c_gass->id_cu->setDbValue($rs->fields('id_cu'));
		$view_trans_tbl_accomplishment_c_gass->above_90->setDbValue($rs->fields('above_90'));
		$view_trans_tbl_accomplishment_c_gass->below_90->setDbValue($rs->fields('below_90'));
		$view_trans_tbl_accomplishment_c_gass->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
		$view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->setDbValue($rs->fields('remarks_cutOffDate'));
	}

	// Load old record
	function LoadOldRecord() {
		global $view_trans_tbl_accomplishment_c_gass;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($view_trans_tbl_accomplishment_c_gass->getKey("pi_id")) <> "")
			$view_trans_tbl_accomplishment_c_gass->pi_id->CurrentValue = $view_trans_tbl_accomplishment_c_gass->getKey("pi_id"); // pi_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$view_trans_tbl_accomplishment_c_gass->CurrentFilter = $view_trans_tbl_accomplishment_c_gass->KeyFilter();
			$sSql = $view_trans_tbl_accomplishment_c_gass->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $view_trans_tbl_accomplishment_c_gass;

		// Initialize URLs
		$this->ViewUrl = $view_trans_tbl_accomplishment_c_gass->ViewUrl();
		$this->EditUrl = $view_trans_tbl_accomplishment_c_gass->EditUrl();
		$this->InlineEditUrl = $view_trans_tbl_accomplishment_c_gass->InlineEditUrl();
		$this->CopyUrl = $view_trans_tbl_accomplishment_c_gass->CopyUrl();
		$this->InlineCopyUrl = $view_trans_tbl_accomplishment_c_gass->InlineCopyUrl();
		$this->DeleteUrl = $view_trans_tbl_accomplishment_c_gass->DeleteUrl();

		// Call Row_Rendering event
		$view_trans_tbl_accomplishment_c_gass->Row_Rendering();

		// Common render codes for all row types
		// pi_id
		// id
		// unit_bo

		$view_trans_tbl_accomplishment_c_gass->unit_bo->CellCssStyle = "white-space: nowrap;";

		// unit_cu
		$view_trans_tbl_accomplishment_c_gass->unit_cu->CellCssStyle = "white-space: nowrap;";

		// pi
		// pi_no
		// pi_description

		$view_trans_tbl_accomplishment_c_gass->pi_description->CellCssStyle = "white-space: nowrap;";

		// pi_1
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
		// remarks

		$view_trans_tbl_accomplishment_c_gass->remarks->CellCssStyle = "white-space: nowrap;";

		// cu_sequence
		// id_units
		// id_cu
		// above_90
		// below_90
		// collectionPeriod_status
		// remarks_cutOffDate

		$view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->CellCssStyle = "white-space: nowrap;";
		if ($view_trans_tbl_accomplishment_c_gass->RowType == UP_ROWTYPE_VIEW) { // View row

			// pi_id
			$view_trans_tbl_accomplishment_c_gass->pi_id->ViewValue = $view_trans_tbl_accomplishment_c_gass->pi_id->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->pi_id->ViewCustomAttributes = "";

			// id
			$view_trans_tbl_accomplishment_c_gass->id->ViewValue = $view_trans_tbl_accomplishment_c_gass->id->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->id->ViewCustomAttributes = "";

			// unit_bo
			$view_trans_tbl_accomplishment_c_gass->unit_bo->ViewValue = $view_trans_tbl_accomplishment_c_gass->unit_bo->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->unit_bo->ViewCustomAttributes = "";

			// unit_cu
			$view_trans_tbl_accomplishment_c_gass->unit_cu->ViewValue = $view_trans_tbl_accomplishment_c_gass->unit_cu->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->unit_cu->ViewCustomAttributes = "";

			// pi
			$view_trans_tbl_accomplishment_c_gass->pi->ViewValue = $view_trans_tbl_accomplishment_c_gass->pi->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->pi->ViewCustomAttributes = "";

			// pi_no
			$view_trans_tbl_accomplishment_c_gass->pi_no->ViewValue = $view_trans_tbl_accomplishment_c_gass->pi_no->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->pi_no->ViewCustomAttributes = "";

			// pi_description
			$view_trans_tbl_accomplishment_c_gass->pi_description->ViewValue = $view_trans_tbl_accomplishment_c_gass->pi_description->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->pi_description->ViewCustomAttributes = "";

			// pi_1
			$view_trans_tbl_accomplishment_c_gass->pi_1->ViewValue = $view_trans_tbl_accomplishment_c_gass->pi_1->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->pi_1->ViewCustomAttributes = "";

			// target
			$view_trans_tbl_accomplishment_c_gass->target->ViewValue = $view_trans_tbl_accomplishment_c_gass->target->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->target->CssStyle = "font-weight:bold;text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->target->ViewCustomAttributes = "";

			// t_numerator
			$view_trans_tbl_accomplishment_c_gass->t_numerator->ViewValue = $view_trans_tbl_accomplishment_c_gass->t_numerator->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->t_numerator->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->t_numerator->ViewCustomAttributes = "";

			// t_numerator_qtr1
			$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr1->ViewValue = $view_trans_tbl_accomplishment_c_gass->t_numerator_qtr1->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr1->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr1->ViewCustomAttributes = "";

			// t_numerator_qtr2
			$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr2->ViewValue = $view_trans_tbl_accomplishment_c_gass->t_numerator_qtr2->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr2->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr2->ViewCustomAttributes = "";

			// t_numerator_qtr3
			$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr3->ViewValue = $view_trans_tbl_accomplishment_c_gass->t_numerator_qtr3->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr3->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr3->ViewCustomAttributes = "";

			// t_numerator_qtr4
			$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr4->ViewValue = $view_trans_tbl_accomplishment_c_gass->t_numerator_qtr4->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr4->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->t_numerator_qtr4->ViewCustomAttributes = "";

			// t_denominator
			$view_trans_tbl_accomplishment_c_gass->t_denominator->ViewValue = $view_trans_tbl_accomplishment_c_gass->t_denominator->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->t_denominator->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->t_denominator->ViewCustomAttributes = "";

			// t_denominator_qtr1
			$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr1->ViewValue = $view_trans_tbl_accomplishment_c_gass->t_denominator_qtr1->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr1->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr1->ViewCustomAttributes = "";

			// t_denominator_qtr2
			$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr2->ViewValue = $view_trans_tbl_accomplishment_c_gass->t_denominator_qtr2->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr2->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr2->ViewCustomAttributes = "";

			// t_denominator_qtr3
			$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr3->ViewValue = $view_trans_tbl_accomplishment_c_gass->t_denominator_qtr3->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr3->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr3->ViewCustomAttributes = "";

			// t_denominator_qtr4
			$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr4->ViewValue = $view_trans_tbl_accomplishment_c_gass->t_denominator_qtr4->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr4->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->t_denominator_qtr4->ViewCustomAttributes = "";

			// accomplishment
			$view_trans_tbl_accomplishment_c_gass->accomplishment->ViewValue = $view_trans_tbl_accomplishment_c_gass->accomplishment->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->accomplishment->CssStyle = "font-weight:bold;text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$view_trans_tbl_accomplishment_c_gass->a_numerator->ViewValue = $view_trans_tbl_accomplishment_c_gass->a_numerator->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->a_numerator->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->a_numerator->ViewCustomAttributes = "";

			// a_numerator_qtr1
			$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr1->ViewValue = $view_trans_tbl_accomplishment_c_gass->a_numerator_qtr1->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr1->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr1->ViewCustomAttributes = "";

			// a_numerator_qtr2
			$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr2->ViewValue = $view_trans_tbl_accomplishment_c_gass->a_numerator_qtr2->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr2->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr2->ViewCustomAttributes = "";

			// a_numerator_qtr3
			$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr3->ViewValue = $view_trans_tbl_accomplishment_c_gass->a_numerator_qtr3->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr3->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr3->ViewCustomAttributes = "";

			// a_numerator_qtr4
			$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr4->ViewValue = $view_trans_tbl_accomplishment_c_gass->a_numerator_qtr4->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr4->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->a_numerator_qtr4->ViewCustomAttributes = "";

			// a_denominator
			$view_trans_tbl_accomplishment_c_gass->a_denominator->ViewValue = $view_trans_tbl_accomplishment_c_gass->a_denominator->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->a_denominator->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->a_denominator->ViewCustomAttributes = "";

			// a_denominator_qtr1
			$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr1->ViewValue = $view_trans_tbl_accomplishment_c_gass->a_denominator_qtr1->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr1->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr1->ViewCustomAttributes = "";

			// a_denominator_qtr2
			$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr2->ViewValue = $view_trans_tbl_accomplishment_c_gass->a_denominator_qtr2->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr2->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr2->ViewCustomAttributes = "";

			// a_denominator_qtr3
			$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr3->ViewValue = $view_trans_tbl_accomplishment_c_gass->a_denominator_qtr3->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr3->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr3->ViewCustomAttributes = "";

			// a_denominator_qtr4
			$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr4->ViewValue = $view_trans_tbl_accomplishment_c_gass->a_denominator_qtr4->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr4->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->a_denominator_qtr4->ViewCustomAttributes = "";

			// remarks
			$view_trans_tbl_accomplishment_c_gass->remarks->ViewValue = $view_trans_tbl_accomplishment_c_gass->remarks->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->remarks->ViewCustomAttributes = "";

			// cu_sequence
			$view_trans_tbl_accomplishment_c_gass->cu_sequence->ViewValue = $view_trans_tbl_accomplishment_c_gass->cu_sequence->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->cu_sequence->ViewCustomAttributes = "";

			// id_units
			$view_trans_tbl_accomplishment_c_gass->id_units->ViewValue = $view_trans_tbl_accomplishment_c_gass->id_units->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->id_units->ViewCustomAttributes = "";

			// id_cu
			$view_trans_tbl_accomplishment_c_gass->id_cu->ViewValue = $view_trans_tbl_accomplishment_c_gass->id_cu->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->id_cu->ViewCustomAttributes = "";

			// above_90
			$view_trans_tbl_accomplishment_c_gass->above_90->ViewValue = $view_trans_tbl_accomplishment_c_gass->above_90->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->above_90->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->above_90->ViewCustomAttributes = "";

			// below_90
			$view_trans_tbl_accomplishment_c_gass->below_90->ViewValue = $view_trans_tbl_accomplishment_c_gass->below_90->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->below_90->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_c_gass->below_90->ViewCustomAttributes = "";

			// remarks_cutOffDate
			$view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->ViewValue = $view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->CurrentValue;
			$view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->ViewValue = up_FormatDateTime($view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->ViewValue, 6);
			$view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->ViewCustomAttributes = "";

			// unit_bo
			$view_trans_tbl_accomplishment_c_gass->unit_bo->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->unit_bo->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->unit_bo->TooltipValue = "";

			// pi_no
			$view_trans_tbl_accomplishment_c_gass->pi_no->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->pi_no->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->pi_no->TooltipValue = "";

			// pi_1
			$view_trans_tbl_accomplishment_c_gass->pi_1->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->pi_1->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->pi_1->TooltipValue = "";

			// target
			$view_trans_tbl_accomplishment_c_gass->target->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->target->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->target->TooltipValue = "";

			// t_numerator
			$view_trans_tbl_accomplishment_c_gass->t_numerator->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->t_numerator->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->t_numerator->TooltipValue = "";

			// t_denominator
			$view_trans_tbl_accomplishment_c_gass->t_denominator->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->t_denominator->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->t_denominator->TooltipValue = "";

			// accomplishment
			$view_trans_tbl_accomplishment_c_gass->accomplishment->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->accomplishment->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->accomplishment->TooltipValue = "";

			// a_numerator
			$view_trans_tbl_accomplishment_c_gass->a_numerator->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->a_numerator->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->a_numerator->TooltipValue = "";

			// a_denominator
			$view_trans_tbl_accomplishment_c_gass->a_denominator->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->a_denominator->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->a_denominator->TooltipValue = "";

			// remarks
			$view_trans_tbl_accomplishment_c_gass->remarks->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->remarks->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->remarks->TooltipValue = "";

			// above_90
			$view_trans_tbl_accomplishment_c_gass->above_90->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->above_90->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->above_90->TooltipValue = "";

			// below_90
			$view_trans_tbl_accomplishment_c_gass->below_90->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->below_90->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->below_90->TooltipValue = "";

			// remarks_cutOffDate
			$view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->HrefValue = "";
			$view_trans_tbl_accomplishment_c_gass->remarks_cutOffDate->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($view_trans_tbl_accomplishment_c_gass->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$view_trans_tbl_accomplishment_c_gass->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $view_trans_tbl_accomplishment_c_gass;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($view_trans_tbl_accomplishment_c_gass->id_units->CurrentValue);
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

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'view_trans_tbl_accomplishment_c_gass';
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
