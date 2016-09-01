<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_fp_unitsinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_fp_units_list = new cfrm_fp_units_list();
$Page =& $frm_fp_units_list;

// Page init
$frm_fp_units_list->Page_Init();

// Page main
$frm_fp_units_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_fp_units->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_units_list = new up_Page("frm_fp_units_list");

// page properties
frm_fp_units_list.PageID = "list"; // page ID
frm_fp_units_list.FormID = "ffrm_fp_unitslist"; // form ID
var UP_PAGE_ID = frm_fp_units_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_fp_units_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_units_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_units_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_units_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_fp_units->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_fp_units->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_fp_units_list->TotalRecs = $frm_fp_units->SelectRecordCount();
	} else {
		if ($frm_fp_units_list->Recordset = $frm_fp_units_list->LoadRecordset())
			$frm_fp_units_list->TotalRecs = $frm_fp_units_list->Recordset->RecordCount();
	}
	$frm_fp_units_list->StartRec = 1;
	if ($frm_fp_units_list->DisplayRecs <= 0 || ($frm_fp_units->Export <> "" && $frm_fp_units->ExportAll)) // Display all records
		$frm_fp_units_list->DisplayRecs = $frm_fp_units_list->TotalRecs;
	if (!($frm_fp_units->Export <> "" && $frm_fp_units->ExportAll))
		$frm_fp_units_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_fp_units_list->Recordset = $frm_fp_units_list->LoadRecordset($frm_fp_units_list->StartRec-1, $frm_fp_units_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_units->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_fp_units_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_fp_units->Export == "" && $frm_fp_units->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_fp_units_list);" style="text-decoration: none;"><img id="frm_fp_units_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_fp_units_list_SearchPanel">
<form name="ffrm_fp_unitslistsrch" id="ffrm_fp_unitslistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_fp_units">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_fp_units->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_fp_units_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_fp_units->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_fp_units->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_fp_units->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_fp_units_list->ShowPageHeader(); ?>
<?php
$frm_fp_units_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_fp_units->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_fp_units->CurrentAction <> "gridadd" && $frm_fp_units->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_fp_units_list->Pager)) $frm_fp_units_list->Pager = new cPrevNextPager($frm_fp_units_list->StartRec, $frm_fp_units_list->DisplayRecs, $frm_fp_units_list->TotalRecs) ?>
<?php if ($frm_fp_units_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_fp_units_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_units_list->PageUrl() ?>start=<?php echo $frm_fp_units_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_fp_units_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_units_list->PageUrl() ?>start=<?php echo $frm_fp_units_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_fp_units_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_fp_units_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_units_list->PageUrl() ?>start=<?php echo $frm_fp_units_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_fp_units_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_units_list->PageUrl() ?>start=<?php echo $frm_fp_units_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_fp_units_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_fp_units_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_fp_units_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_fp_units_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_fp_units_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $frm_fp_units_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($frm_fp_units_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ffrm_fp_unitslist, '<?php echo $frm_fp_units_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ffrm_fp_unitslist" id="ffrm_fp_unitslist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_fp_units">
<div id="gmp_frm_fp_units" class="upGridMiddlePanel">
<?php if ($frm_fp_units_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_fp_units->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_fp_units_list->RenderListOptions();

// Render list options (header, left)
$frm_fp_units_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_fp_units->cu_unit_name->Visible) { // cu_unit_name ?>
	<?php if ($frm_fp_units->SortUrl($frm_fp_units->cu_unit_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_units->cu_unit_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_units->SortUrl($frm_fp_units->cu_unit_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_units->cu_unit_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_units->cu_unit_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_units->cu_unit_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_units->personnel_count->Visible) { // personnel_count ?>
	<?php if ($frm_fp_units->SortUrl($frm_fp_units->personnel_count) == "") { ?>
		<td><?php echo $frm_fp_units->personnel_count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_units->SortUrl($frm_fp_units->personnel_count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_units->personnel_count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_units->personnel_count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_units->personnel_count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_units->mfo_1->Visible) { // mfo_1 ?>
	<?php if ($frm_fp_units->SortUrl($frm_fp_units->mfo_1) == "") { ?>
		<td><?php echo $frm_fp_units->mfo_1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_units->SortUrl($frm_fp_units->mfo_1) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_units->mfo_1->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_units->mfo_1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_units->mfo_1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_units->mfo_2->Visible) { // mfo_2 ?>
	<?php if ($frm_fp_units->SortUrl($frm_fp_units->mfo_2) == "") { ?>
		<td><?php echo $frm_fp_units->mfo_2->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_units->SortUrl($frm_fp_units->mfo_2) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_units->mfo_2->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_units->mfo_2->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_units->mfo_2->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_units->mfo_3->Visible) { // mfo_3 ?>
	<?php if ($frm_fp_units->SortUrl($frm_fp_units->mfo_3) == "") { ?>
		<td><?php echo $frm_fp_units->mfo_3->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_units->SortUrl($frm_fp_units->mfo_3) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_units->mfo_3->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_units->mfo_3->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_units->mfo_3->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_units->mfo_4->Visible) { // mfo_4 ?>
	<?php if ($frm_fp_units->SortUrl($frm_fp_units->mfo_4) == "") { ?>
		<td><?php echo $frm_fp_units->mfo_4->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_units->SortUrl($frm_fp_units->mfo_4) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_units->mfo_4->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_units->mfo_4->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_units->mfo_4->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_units->mfo_5->Visible) { // mfo_5 ?>
	<?php if ($frm_fp_units->SortUrl($frm_fp_units->mfo_5) == "") { ?>
		<td><?php echo $frm_fp_units->mfo_5->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_units->SortUrl($frm_fp_units->mfo_5) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_units->mfo_5->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_units->mfo_5->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_units->mfo_5->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_units->sto->Visible) { // sto ?>
	<?php if ($frm_fp_units->SortUrl($frm_fp_units->sto) == "") { ?>
		<td><?php echo $frm_fp_units->sto->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_units->SortUrl($frm_fp_units->sto) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_units->sto->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_units->sto->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_units->sto->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_units->gass->Visible) { // gass ?>
	<?php if ($frm_fp_units->SortUrl($frm_fp_units->gass) == "") { ?>
		<td><?php echo $frm_fp_units->gass->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_units->SortUrl($frm_fp_units->gass) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_units->gass->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_units->gass->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_units->gass->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_units->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
	<?php if ($frm_fp_units->SortUrl($frm_fp_units->t_cutOffDate_remarks) == "") { ?>
		<td><?php echo $frm_fp_units->t_cutOffDate_remarks->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_units->SortUrl($frm_fp_units->t_cutOffDate_remarks) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_units->t_cutOffDate_remarks->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_units->t_cutOffDate_remarks->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_units->t_cutOffDate_remarks->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_fp_units_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_fp_units->ExportAll && $frm_fp_units->Export <> "") {
	$frm_fp_units_list->StopRec = $frm_fp_units_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_fp_units_list->TotalRecs > $frm_fp_units_list->StartRec + $frm_fp_units_list->DisplayRecs - 1)
		$frm_fp_units_list->StopRec = $frm_fp_units_list->StartRec + $frm_fp_units_list->DisplayRecs - 1;
	else
		$frm_fp_units_list->StopRec = $frm_fp_units_list->TotalRecs;
}
$frm_fp_units_list->RecCnt = $frm_fp_units_list->StartRec - 1;
if ($frm_fp_units_list->Recordset && !$frm_fp_units_list->Recordset->EOF) {
	$frm_fp_units_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_fp_units_list->StartRec > 1)
		$frm_fp_units_list->Recordset->Move($frm_fp_units_list->StartRec - 1);
} elseif (!$frm_fp_units->AllowAddDeleteRow && $frm_fp_units_list->StopRec == 0) {
	$frm_fp_units_list->StopRec = $frm_fp_units->GridAddRowCount;
}

// Initialize aggregate
$frm_fp_units->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_fp_units->ResetAttrs();
$frm_fp_units_list->RenderRow();
$frm_fp_units_list->RowCnt = 0;
while ($frm_fp_units_list->RecCnt < $frm_fp_units_list->StopRec) {
	$frm_fp_units_list->RecCnt++;
	if (intval($frm_fp_units_list->RecCnt) >= intval($frm_fp_units_list->StartRec)) {
		$frm_fp_units_list->RowCnt++;

		// Set up key count
		$frm_fp_units_list->KeyCount = $frm_fp_units_list->RowIndex;

		// Init row class and style
		$frm_fp_units->ResetAttrs();
		$frm_fp_units->CssClass = "";
		if ($frm_fp_units->CurrentAction == "gridadd") {
		} else {
			$frm_fp_units_list->LoadRowValues($frm_fp_units_list->Recordset); // Load row values
		}
		$frm_fp_units->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_fp_units->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_fp_units_list->RenderRow();

		// Render list options
		$frm_fp_units_list->RenderListOptions();
?>
	<tr<?php echo $frm_fp_units->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_units_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_units->cu_unit_name->Visible) { // cu_unit_name ?>
		<td<?php echo $frm_fp_units->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_fp_units->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_units->cu_unit_name->ListViewValue() ?></div>
<a name="<?php echo $frm_fp_units_list->PageObjName . "_row_" . $frm_fp_units_list->RowCnt ?>" id="<?php echo $frm_fp_units_list->PageObjName . "_row_" . $frm_fp_units_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_fp_units->personnel_count->Visible) { // personnel_count ?>
		<td<?php echo $frm_fp_units->personnel_count->CellAttributes() ?>>
<div<?php echo $frm_fp_units->personnel_count->ViewAttributes() ?>><?php echo $frm_fp_units->personnel_count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_units->mfo_1->Visible) { // mfo_1 ?>
		<td<?php echo $frm_fp_units->mfo_1->CellAttributes() ?>>
<div<?php echo $frm_fp_units->mfo_1->ViewAttributes() ?>><?php echo $frm_fp_units->mfo_1->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_units->mfo_2->Visible) { // mfo_2 ?>
		<td<?php echo $frm_fp_units->mfo_2->CellAttributes() ?>>
<div<?php echo $frm_fp_units->mfo_2->ViewAttributes() ?>><?php echo $frm_fp_units->mfo_2->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_units->mfo_3->Visible) { // mfo_3 ?>
		<td<?php echo $frm_fp_units->mfo_3->CellAttributes() ?>>
<div<?php echo $frm_fp_units->mfo_3->ViewAttributes() ?>><?php echo $frm_fp_units->mfo_3->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_units->mfo_4->Visible) { // mfo_4 ?>
		<td<?php echo $frm_fp_units->mfo_4->CellAttributes() ?>>
<div<?php echo $frm_fp_units->mfo_4->ViewAttributes() ?>><?php echo $frm_fp_units->mfo_4->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_units->mfo_5->Visible) { // mfo_5 ?>
		<td<?php echo $frm_fp_units->mfo_5->CellAttributes() ?>>
<div<?php echo $frm_fp_units->mfo_5->ViewAttributes() ?>><?php echo $frm_fp_units->mfo_5->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_units->sto->Visible) { // sto ?>
		<td<?php echo $frm_fp_units->sto->CellAttributes() ?>>
<div<?php echo $frm_fp_units->sto->ViewAttributes() ?>><?php echo $frm_fp_units->sto->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_units->gass->Visible) { // gass ?>
		<td<?php echo $frm_fp_units->gass->CellAttributes() ?>>
<div<?php echo $frm_fp_units->gass->ViewAttributes() ?>><?php echo $frm_fp_units->gass->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_units->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
		<td<?php echo $frm_fp_units->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_units->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_units->t_cutOffDate_remarks->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_units_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_fp_units->CurrentAction <> "gridadd")
		$frm_fp_units_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_fp_units_list->Recordset)
	$frm_fp_units_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_fp_units->Export == "" && $frm_fp_units->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_fp_units_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_fp_units->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_fp_units_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_units_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_fp_units';

	// Page object name
	var $PageObjName = 'frm_fp_units_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_units;
		if ($frm_fp_units->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_units->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_units;
		if ($frm_fp_units->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_units->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_units->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_units_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_units)
		if (!isset($GLOBALS["frm_fp_units"])) {
			$GLOBALS["frm_fp_units"] = new cfrm_fp_units();
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_units"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_fp_unitsadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_fp_unitsdelete.php";
		$this->MultiUpdateUrl = "frm_fp_unitsupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_units', TRUE);

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
		global $frm_fp_units;

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
			$frm_fp_units->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_fp_units;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($frm_fp_units->Export <> "" ||
				$frm_fp_units->CurrentAction == "gridadd" ||
				$frm_fp_units->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_fp_units->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_fp_units->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_fp_units->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_fp_units->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_fp_units->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_fp_units->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_fp_units->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$frm_fp_units->setSessionWhere($sFilter);
		$frm_fp_units->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_fp_units;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_units->cu_short_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_units->cu_unit_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_units->unit_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_units->unit_name_short, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_units->mfo_1, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_units->mfo_2, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_units->mfo_3, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_units->mfo_4, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_units->mfo_5, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_units->sto, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_units->gass, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_units->t_cutOffDate_remarks, $Keyword);
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
		global $Security, $frm_fp_units;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_fp_units->BasicSearchKeyword;
		$sSearchType = $frm_fp_units->BasicSearchType;
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
			$frm_fp_units->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_fp_units->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_fp_units;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_fp_units->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_fp_units;
		$frm_fp_units->setSessionBasicSearchKeyword("");
		$frm_fp_units->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_fp_units;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_fp_units->BasicSearchKeyword = $frm_fp_units->getSessionBasicSearchKeyword();
			$frm_fp_units->BasicSearchType = $frm_fp_units->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_fp_units;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_fp_units->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_fp_units->CurrentOrderType = @$_GET["ordertype"];
			$frm_fp_units->UpdateSort($frm_fp_units->cu_unit_name); // cu_unit_name
			$frm_fp_units->UpdateSort($frm_fp_units->personnel_count); // personnel_count
			$frm_fp_units->UpdateSort($frm_fp_units->mfo_1); // mfo_1
			$frm_fp_units->UpdateSort($frm_fp_units->mfo_2); // mfo_2
			$frm_fp_units->UpdateSort($frm_fp_units->mfo_3); // mfo_3
			$frm_fp_units->UpdateSort($frm_fp_units->mfo_4); // mfo_4
			$frm_fp_units->UpdateSort($frm_fp_units->mfo_5); // mfo_5
			$frm_fp_units->UpdateSort($frm_fp_units->sto); // sto
			$frm_fp_units->UpdateSort($frm_fp_units->gass); // gass
			$frm_fp_units->UpdateSort($frm_fp_units->t_cutOffDate_remarks); // t_cutOffDate_remarks
			$frm_fp_units->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_fp_units;
		$sOrderBy = $frm_fp_units->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_fp_units->SqlOrderBy() <> "") {
				$sOrderBy = $frm_fp_units->SqlOrderBy();
				$frm_fp_units->setSessionOrderBy($sOrderBy);
				$frm_fp_units->cu_unit_name->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_fp_units;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_fp_units->setSessionOrderBy($sOrderBy);
				$frm_fp_units->cu_unit_name->setSort("");
				$frm_fp_units->personnel_count->setSort("");
				$frm_fp_units->mfo_1->setSort("");
				$frm_fp_units->mfo_2->setSort("");
				$frm_fp_units->mfo_3->setSort("");
				$frm_fp_units->mfo_4->setSort("");
				$frm_fp_units->mfo_5->setSort("");
				$frm_fp_units->sto->setSort("");
				$frm_fp_units->gass->setSort("");
				$frm_fp_units->t_cutOffDate_remarks->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_fp_units->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_fp_units;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"frm_fp_units_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_fp_units, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $this->ShowOptionLink() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $this->ShowOptionLink() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($frm_fp_units->units_id->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_fp_units;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_fp_units;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_fp_units->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_fp_units->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_fp_units->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_fp_units->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_fp_units->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_fp_units->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_fp_units;
		$frm_fp_units->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_fp_units->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_fp_units;

		// Call Recordset Selecting event
		$frm_fp_units->Recordset_Selecting($frm_fp_units->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_fp_units->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_fp_units->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_units;
		$sFilter = $frm_fp_units->KeyFilter();

		// Call Row Selecting event
		$frm_fp_units->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_units->CurrentFilter = $sFilter;
		$sSql = $frm_fp_units->SQL();
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
		global $conn, $frm_fp_units;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_units->Row_Selected($row);
		$frm_fp_units->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_units->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_units->unit_id->setDbValue($rs->fields('unit_id'));
		$frm_fp_units->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_fp_units->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_fp_units->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_fp_units->unit_name->setDbValue($rs->fields('unit_name'));
		$frm_fp_units->unit_name_short->setDbValue($rs->fields('unit_name_short'));
		$frm_fp_units->personnel_count->setDbValue($rs->fields('personnel_count'));
		$frm_fp_units->mfo_1->setDbValue($rs->fields('mfo_1'));
		$frm_fp_units->mfo_2->setDbValue($rs->fields('mfo_2'));
		$frm_fp_units->mfo_3->setDbValue($rs->fields('mfo_3'));
		$frm_fp_units->mfo_4->setDbValue($rs->fields('mfo_4'));
		$frm_fp_units->mfo_5->setDbValue($rs->fields('mfo_5'));
		$frm_fp_units->sto->setDbValue($rs->fields('sto'));
		$frm_fp_units->gass->setDbValue($rs->fields('gass'));
		$frm_fp_units->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_fp_units->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_fp_units->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_fp_units->cu_id->setDbValue($rs->fields('cu_id'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_fp_units;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_fp_units->getKey("units_id")) <> "")
			$frm_fp_units->units_id->CurrentValue = $frm_fp_units->getKey("units_id"); // units_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_fp_units->CurrentFilter = $frm_fp_units->KeyFilter();
			$sSql = $frm_fp_units->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_units;

		// Initialize URLs
		$this->ViewUrl = $frm_fp_units->ViewUrl();
		$this->EditUrl = $frm_fp_units->EditUrl();
		$this->InlineEditUrl = $frm_fp_units->InlineEditUrl();
		$this->CopyUrl = $frm_fp_units->CopyUrl();
		$this->InlineCopyUrl = $frm_fp_units->InlineCopyUrl();
		$this->DeleteUrl = $frm_fp_units->DeleteUrl();

		// Call Row_Rendering event
		$frm_fp_units->Row_Rendering();

		// Common render codes for all row types
		// units_id

		$frm_fp_units->units_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		// unit_id
		// cu_sequence
		// cu_short_name

		$frm_fp_units->cu_short_name->CellCssStyle = "white-space: nowrap;";

		// cu_unit_name
		$frm_fp_units->cu_unit_name->CellCssStyle = "white-space: nowrap;";

		// unit_name
		// unit_name_short
		// personnel_count
		// mfo_1
		// mfo_2
		// mfo_3
		// mfo_4
		// mfo_5
		// sto
		// gass
		// cutOffDate_id

		$frm_fp_units->cutOffDate_id->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_fp
		$frm_fp_units->t_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_remarks
		// cu_id

		$frm_fp_units->cu_id->CellCssStyle = "white-space: nowrap;";
		if ($frm_fp_units->RowType == UP_ROWTYPE_VIEW) { // View row

			// cu_unit_name
			$frm_fp_units->cu_unit_name->ViewValue = $frm_fp_units->cu_unit_name->CurrentValue;
			$frm_fp_units->cu_unit_name->ViewCustomAttributes = "";

			// personnel_count
			$frm_fp_units->personnel_count->ViewValue = $frm_fp_units->personnel_count->CurrentValue;
			$frm_fp_units->personnel_count->ViewCustomAttributes = "";

			// mfo_1
			if (strval($frm_fp_units->mfo_1->CurrentValue) <> "") {
				switch ($frm_fp_units->mfo_1->CurrentValue) {
					case "Y":
						$frm_fp_units->mfo_1->ViewValue = $frm_fp_units->mfo_1->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_1->FldTagCaption(1) : $frm_fp_units->mfo_1->CurrentValue;
						break;
					case "N":
						$frm_fp_units->mfo_1->ViewValue = $frm_fp_units->mfo_1->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_1->FldTagCaption(2) : $frm_fp_units->mfo_1->CurrentValue;
						break;
					default:
						$frm_fp_units->mfo_1->ViewValue = $frm_fp_units->mfo_1->CurrentValue;
				}
			} else {
				$frm_fp_units->mfo_1->ViewValue = NULL;
			}
			$frm_fp_units->mfo_1->ViewCustomAttributes = "";

			// mfo_2
			if (strval($frm_fp_units->mfo_2->CurrentValue) <> "") {
				switch ($frm_fp_units->mfo_2->CurrentValue) {
					case "Y":
						$frm_fp_units->mfo_2->ViewValue = $frm_fp_units->mfo_2->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_2->FldTagCaption(1) : $frm_fp_units->mfo_2->CurrentValue;
						break;
					case "N":
						$frm_fp_units->mfo_2->ViewValue = $frm_fp_units->mfo_2->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_2->FldTagCaption(2) : $frm_fp_units->mfo_2->CurrentValue;
						break;
					default:
						$frm_fp_units->mfo_2->ViewValue = $frm_fp_units->mfo_2->CurrentValue;
				}
			} else {
				$frm_fp_units->mfo_2->ViewValue = NULL;
			}
			$frm_fp_units->mfo_2->ViewCustomAttributes = "";

			// mfo_3
			if (strval($frm_fp_units->mfo_3->CurrentValue) <> "") {
				switch ($frm_fp_units->mfo_3->CurrentValue) {
					case "Y":
						$frm_fp_units->mfo_3->ViewValue = $frm_fp_units->mfo_3->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_3->FldTagCaption(1) : $frm_fp_units->mfo_3->CurrentValue;
						break;
					case "N":
						$frm_fp_units->mfo_3->ViewValue = $frm_fp_units->mfo_3->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_3->FldTagCaption(2) : $frm_fp_units->mfo_3->CurrentValue;
						break;
					default:
						$frm_fp_units->mfo_3->ViewValue = $frm_fp_units->mfo_3->CurrentValue;
				}
			} else {
				$frm_fp_units->mfo_3->ViewValue = NULL;
			}
			$frm_fp_units->mfo_3->ViewCustomAttributes = "";

			// mfo_4
			if (strval($frm_fp_units->mfo_4->CurrentValue) <> "") {
				switch ($frm_fp_units->mfo_4->CurrentValue) {
					case "Y":
						$frm_fp_units->mfo_4->ViewValue = $frm_fp_units->mfo_4->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_4->FldTagCaption(1) : $frm_fp_units->mfo_4->CurrentValue;
						break;
					case "N":
						$frm_fp_units->mfo_4->ViewValue = $frm_fp_units->mfo_4->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_4->FldTagCaption(2) : $frm_fp_units->mfo_4->CurrentValue;
						break;
					default:
						$frm_fp_units->mfo_4->ViewValue = $frm_fp_units->mfo_4->CurrentValue;
				}
			} else {
				$frm_fp_units->mfo_4->ViewValue = NULL;
			}
			$frm_fp_units->mfo_4->ViewCustomAttributes = "";

			// mfo_5
			if (strval($frm_fp_units->mfo_5->CurrentValue) <> "") {
				switch ($frm_fp_units->mfo_5->CurrentValue) {
					case "Y":
						$frm_fp_units->mfo_5->ViewValue = $frm_fp_units->mfo_5->FldTagCaption(1) <> "" ? $frm_fp_units->mfo_5->FldTagCaption(1) : $frm_fp_units->mfo_5->CurrentValue;
						break;
					case "N":
						$frm_fp_units->mfo_5->ViewValue = $frm_fp_units->mfo_5->FldTagCaption(2) <> "" ? $frm_fp_units->mfo_5->FldTagCaption(2) : $frm_fp_units->mfo_5->CurrentValue;
						break;
					default:
						$frm_fp_units->mfo_5->ViewValue = $frm_fp_units->mfo_5->CurrentValue;
				}
			} else {
				$frm_fp_units->mfo_5->ViewValue = NULL;
			}
			$frm_fp_units->mfo_5->ViewCustomAttributes = "";

			// sto
			if (strval($frm_fp_units->sto->CurrentValue) <> "") {
				switch ($frm_fp_units->sto->CurrentValue) {
					case "Y":
						$frm_fp_units->sto->ViewValue = $frm_fp_units->sto->FldTagCaption(1) <> "" ? $frm_fp_units->sto->FldTagCaption(1) : $frm_fp_units->sto->CurrentValue;
						break;
					case "N":
						$frm_fp_units->sto->ViewValue = $frm_fp_units->sto->FldTagCaption(2) <> "" ? $frm_fp_units->sto->FldTagCaption(2) : $frm_fp_units->sto->CurrentValue;
						break;
					default:
						$frm_fp_units->sto->ViewValue = $frm_fp_units->sto->CurrentValue;
				}
			} else {
				$frm_fp_units->sto->ViewValue = NULL;
			}
			$frm_fp_units->sto->ViewCustomAttributes = "";

			// gass
			if (strval($frm_fp_units->gass->CurrentValue) <> "") {
				switch ($frm_fp_units->gass->CurrentValue) {
					case "Y":
						$frm_fp_units->gass->ViewValue = $frm_fp_units->gass->FldTagCaption(1) <> "" ? $frm_fp_units->gass->FldTagCaption(1) : $frm_fp_units->gass->CurrentValue;
						break;
					case "N":
						$frm_fp_units->gass->ViewValue = $frm_fp_units->gass->FldTagCaption(2) <> "" ? $frm_fp_units->gass->FldTagCaption(2) : $frm_fp_units->gass->CurrentValue;
						break;
					default:
						$frm_fp_units->gass->ViewValue = $frm_fp_units->gass->CurrentValue;
				}
			} else {
				$frm_fp_units->gass->ViewValue = NULL;
			}
			$frm_fp_units->gass->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_fp_units->t_cutOffDate_remarks->ViewValue = $frm_fp_units->t_cutOffDate_remarks->CurrentValue;
			$frm_fp_units->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_fp_units->cu_unit_name->LinkCustomAttributes = "";
			$frm_fp_units->cu_unit_name->HrefValue = "";
			$frm_fp_units->cu_unit_name->TooltipValue = "";

			// personnel_count
			$frm_fp_units->personnel_count->LinkCustomAttributes = "";
			$frm_fp_units->personnel_count->HrefValue = "";
			$frm_fp_units->personnel_count->TooltipValue = "";

			// mfo_1
			$frm_fp_units->mfo_1->LinkCustomAttributes = "";
			$frm_fp_units->mfo_1->HrefValue = "";
			$frm_fp_units->mfo_1->TooltipValue = "";

			// mfo_2
			$frm_fp_units->mfo_2->LinkCustomAttributes = "";
			$frm_fp_units->mfo_2->HrefValue = "";
			$frm_fp_units->mfo_2->TooltipValue = "";

			// mfo_3
			$frm_fp_units->mfo_3->LinkCustomAttributes = "";
			$frm_fp_units->mfo_3->HrefValue = "";
			$frm_fp_units->mfo_3->TooltipValue = "";

			// mfo_4
			$frm_fp_units->mfo_4->LinkCustomAttributes = "";
			$frm_fp_units->mfo_4->HrefValue = "";
			$frm_fp_units->mfo_4->TooltipValue = "";

			// mfo_5
			$frm_fp_units->mfo_5->LinkCustomAttributes = "";
			$frm_fp_units->mfo_5->HrefValue = "";
			$frm_fp_units->mfo_5->TooltipValue = "";

			// sto
			$frm_fp_units->sto->LinkCustomAttributes = "";
			$frm_fp_units->sto->HrefValue = "";
			$frm_fp_units->sto->TooltipValue = "";

			// gass
			$frm_fp_units->gass->LinkCustomAttributes = "";
			$frm_fp_units->gass->HrefValue = "";
			$frm_fp_units->gass->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_fp_units->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_fp_units->t_cutOffDate_remarks->HrefValue = "";
			$frm_fp_units->t_cutOffDate_remarks->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_fp_units->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_units->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_fp_units;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_fp_units->focal_person_id->CurrentValue);
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
