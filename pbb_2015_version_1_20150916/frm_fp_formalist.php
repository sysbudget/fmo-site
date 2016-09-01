<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_fp_formainfo.php" ?>
<?php include_once "frm_fp_pbb_detail_targetinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_fp_forma_list = new cfrm_fp_forma_list();
$Page =& $frm_fp_forma_list;

// Page init
$frm_fp_forma_list->Page_Init();

// Page main
$frm_fp_forma_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_fp_forma->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_forma_list = new up_Page("frm_fp_forma_list");

// page properties
frm_fp_forma_list.PageID = "list"; // page ID
frm_fp_forma_list.FormID = "ffrm_fp_formalist"; // form ID
var UP_PAGE_ID = frm_fp_forma_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_fp_forma_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_forma_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_forma_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_forma_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_fp_forma->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_fp_forma->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_fp_forma_list->TotalRecs = $frm_fp_forma->SelectRecordCount();
	} else {
		if ($frm_fp_forma_list->Recordset = $frm_fp_forma_list->LoadRecordset())
			$frm_fp_forma_list->TotalRecs = $frm_fp_forma_list->Recordset->RecordCount();
	}
	$frm_fp_forma_list->StartRec = 1;
	if ($frm_fp_forma_list->DisplayRecs <= 0 || ($frm_fp_forma->Export <> "" && $frm_fp_forma->ExportAll)) // Display all records
		$frm_fp_forma_list->DisplayRecs = $frm_fp_forma_list->TotalRecs;
	if (!($frm_fp_forma->Export <> "" && $frm_fp_forma->ExportAll))
		$frm_fp_forma_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_fp_forma_list->Recordset = $frm_fp_forma_list->LoadRecordset($frm_fp_forma_list->StartRec-1, $frm_fp_forma_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_forma->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_fp_forma_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_fp_forma->Export == "" && $frm_fp_forma->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_fp_forma_list);" style="text-decoration: none;"><img id="frm_fp_forma_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_fp_forma_list_SearchPanel">
<form name="ffrm_fp_formalistsrch" id="ffrm_fp_formalistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_fp_forma">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_fp_forma->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_fp_forma_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_fp_forma->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_fp_forma->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_fp_forma->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_fp_forma_list->ShowPageHeader(); ?>
<?php
$frm_fp_forma_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_fp_forma->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_fp_forma->CurrentAction <> "gridadd" && $frm_fp_forma->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_fp_forma_list->Pager)) $frm_fp_forma_list->Pager = new cPrevNextPager($frm_fp_forma_list->StartRec, $frm_fp_forma_list->DisplayRecs, $frm_fp_forma_list->TotalRecs) ?>
<?php if ($frm_fp_forma_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_fp_forma_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_forma_list->PageUrl() ?>start=<?php echo $frm_fp_forma_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_fp_forma_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_forma_list->PageUrl() ?>start=<?php echo $frm_fp_forma_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_fp_forma_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_fp_forma_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_forma_list->PageUrl() ?>start=<?php echo $frm_fp_forma_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_fp_forma_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_forma_list->PageUrl() ?>start=<?php echo $frm_fp_forma_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_fp_forma_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_fp_forma_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_fp_forma_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_fp_forma_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_fp_forma_list->SearchWhere == "0=101") { ?>
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
<form name="ffrm_fp_formalist" id="ffrm_fp_formalist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_fp_forma">
<div id="gmp_frm_fp_forma" class="upGridMiddlePanel">
<?php if ($frm_fp_forma_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_fp_forma->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_fp_forma_list->RenderListOptions();

// Render list options (header, left)
$frm_fp_forma_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_fp_forma->CU_Office->Visible) { // CU Office ?>
	<?php if ($frm_fp_forma->SortUrl($frm_fp_forma->CU_Office) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_forma->CU_Office->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_forma->SortUrl($frm_fp_forma->CU_Office) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_forma->CU_Office->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_forma->CU_Office->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_forma->CU_Office->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_forma->MFO->Visible) { // MFO ?>
	<?php if ($frm_fp_forma->SortUrl($frm_fp_forma->MFO) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_forma->MFO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_forma->SortUrl($frm_fp_forma->MFO) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_forma->MFO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_forma->MFO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_forma->MFO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_forma->Question->Visible) { // Question ?>
	<?php if ($frm_fp_forma->SortUrl($frm_fp_forma->Question) == "") { ?>
		<td style="width: 400px;"><?php echo $frm_fp_forma->Question->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_forma->SortUrl($frm_fp_forma->Question) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="width: 400px;"><thead><tr><td><?php echo $frm_fp_forma->Question->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_forma->Question->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_forma->Question->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_forma->Participating_Units_Count->Visible) { // Participating Units Count ?>
	<?php if ($frm_fp_forma->SortUrl($frm_fp_forma->Participating_Units_Count) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_fp_forma->Participating_Units_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_forma->SortUrl($frm_fp_forma->Participating_Units_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_fp_forma->Participating_Units_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_forma->Participating_Units_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_forma->Participating_Units_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_forma->Target->Visible) { // Target ?>
	<?php if ($frm_fp_forma->SortUrl($frm_fp_forma->Target) == "") { ?>
		<td><?php echo $frm_fp_forma->Target->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_forma->SortUrl($frm_fp_forma->Target) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_forma->Target->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_forma->Target->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_forma->Target->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_forma->Numerator_28T29->Visible) { // Numerator (T) ?>
	<?php if ($frm_fp_forma->SortUrl($frm_fp_forma->Numerator_28T29) == "") { ?>
		<td><?php echo $frm_fp_forma->Numerator_28T29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_forma->SortUrl($frm_fp_forma->Numerator_28T29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_forma->Numerator_28T29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_forma->Numerator_28T29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_forma->Numerator_28T29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_forma->Denominator_28T29->Visible) { // Denominator (T) ?>
	<?php if ($frm_fp_forma->SortUrl($frm_fp_forma->Denominator_28T29) == "") { ?>
		<td><?php echo $frm_fp_forma->Denominator_28T29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_forma->SortUrl($frm_fp_forma->Denominator_28T29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_forma->Denominator_28T29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_forma->Denominator_28T29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_forma->Denominator_28T29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_forma->Accomplishment->Visible) { // Accomplishment ?>
	<?php if ($frm_fp_forma->SortUrl($frm_fp_forma->Accomplishment) == "") { ?>
		<td><?php echo $frm_fp_forma->Accomplishment->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_forma->SortUrl($frm_fp_forma->Accomplishment) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_forma->Accomplishment->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_forma->Accomplishment->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_forma->Accomplishment->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_forma->Numerator_28A29->Visible) { // Numerator (A) ?>
	<?php if ($frm_fp_forma->SortUrl($frm_fp_forma->Numerator_28A29) == "") { ?>
		<td><?php echo $frm_fp_forma->Numerator_28A29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_forma->SortUrl($frm_fp_forma->Numerator_28A29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_forma->Numerator_28A29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_forma->Numerator_28A29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_forma->Numerator_28A29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_forma->Denominator_28A29->Visible) { // Denominator (A) ?>
	<?php if ($frm_fp_forma->SortUrl($frm_fp_forma->Denominator_28A29) == "") { ?>
		<td><?php echo $frm_fp_forma->Denominator_28A29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_forma->SortUrl($frm_fp_forma->Denominator_28A29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_forma->Denominator_28A29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_forma->Denominator_28A29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_forma->Denominator_28A29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_forma->Supporting_Documents_Count->Visible) { // Supporting Documents Count ?>
	<?php if ($frm_fp_forma->SortUrl($frm_fp_forma->Supporting_Documents_Count) == "") { ?>
		<td><?php echo $frm_fp_forma->Supporting_Documents_Count->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_forma->SortUrl($frm_fp_forma->Supporting_Documents_Count) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_forma->Supporting_Documents_Count->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_forma->Supporting_Documents_Count->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_forma->Supporting_Documents_Count->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_forma->Rating->Visible) { // Rating ?>
	<?php if ($frm_fp_forma->SortUrl($frm_fp_forma->Rating) == "") { ?>
		<td><?php echo $frm_fp_forma->Rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_forma->SortUrl($frm_fp_forma->Rating) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_forma->Rating->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_forma->Rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_forma->Rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_fp_forma_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_fp_forma->ExportAll && $frm_fp_forma->Export <> "") {
	$frm_fp_forma_list->StopRec = $frm_fp_forma_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_fp_forma_list->TotalRecs > $frm_fp_forma_list->StartRec + $frm_fp_forma_list->DisplayRecs - 1)
		$frm_fp_forma_list->StopRec = $frm_fp_forma_list->StartRec + $frm_fp_forma_list->DisplayRecs - 1;
	else
		$frm_fp_forma_list->StopRec = $frm_fp_forma_list->TotalRecs;
}
$frm_fp_forma_list->RecCnt = $frm_fp_forma_list->StartRec - 1;
if ($frm_fp_forma_list->Recordset && !$frm_fp_forma_list->Recordset->EOF) {
	$frm_fp_forma_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_fp_forma_list->StartRec > 1)
		$frm_fp_forma_list->Recordset->Move($frm_fp_forma_list->StartRec - 1);
} elseif (!$frm_fp_forma->AllowAddDeleteRow && $frm_fp_forma_list->StopRec == 0) {
	$frm_fp_forma_list->StopRec = $frm_fp_forma->GridAddRowCount;
}

// Initialize aggregate
$frm_fp_forma->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_fp_forma->ResetAttrs();
$frm_fp_forma_list->RenderRow();
$frm_fp_forma_list->RowCnt = 0;
while ($frm_fp_forma_list->RecCnt < $frm_fp_forma_list->StopRec) {
	$frm_fp_forma_list->RecCnt++;
	if (intval($frm_fp_forma_list->RecCnt) >= intval($frm_fp_forma_list->StartRec)) {
		$frm_fp_forma_list->RowCnt++;

		// Set up key count
		$frm_fp_forma_list->KeyCount = $frm_fp_forma_list->RowIndex;

		// Init row class and style
		$frm_fp_forma->ResetAttrs();
		$frm_fp_forma->CssClass = "";
		if ($frm_fp_forma->CurrentAction == "gridadd") {
		} else {
			$frm_fp_forma_list->LoadRowValues($frm_fp_forma_list->Recordset); // Load row values
		}
		$frm_fp_forma->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_fp_forma->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_fp_forma_list->RenderRow();

		// Render list options
		$frm_fp_forma_list->RenderListOptions();
?>
	<tr<?php echo $frm_fp_forma->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_forma_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_forma->CU_Office->Visible) { // CU Office ?>
		<td<?php echo $frm_fp_forma->CU_Office->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->CU_Office->ViewAttributes() ?>><?php echo $frm_fp_forma->CU_Office->ListViewValue() ?></div>
<a name="<?php echo $frm_fp_forma_list->PageObjName . "_row_" . $frm_fp_forma_list->RowCnt ?>" id="<?php echo $frm_fp_forma_list->PageObjName . "_row_" . $frm_fp_forma_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_fp_forma->MFO->Visible) { // MFO ?>
		<td<?php echo $frm_fp_forma->MFO->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->MFO->ViewAttributes() ?>><?php echo $frm_fp_forma->MFO->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_forma->Question->Visible) { // Question ?>
		<td<?php echo $frm_fp_forma->Question->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Question->ViewAttributes() ?>><?php echo $frm_fp_forma->Question->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_forma->Participating_Units_Count->Visible) { // Participating Units Count ?>
		<td<?php echo $frm_fp_forma->Participating_Units_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Participating_Units_Count->ViewAttributes() ?>><?php echo $frm_fp_forma->Participating_Units_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_forma->Target->Visible) { // Target ?>
		<td<?php echo $frm_fp_forma->Target->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Target->ViewAttributes() ?>><?php echo $frm_fp_forma->Target->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_forma->Numerator_28T29->Visible) { // Numerator (T) ?>
		<td<?php echo $frm_fp_forma->Numerator_28T29->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Numerator_28T29->ViewAttributes() ?>><?php echo $frm_fp_forma->Numerator_28T29->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_forma->Denominator_28T29->Visible) { // Denominator (T) ?>
		<td<?php echo $frm_fp_forma->Denominator_28T29->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Denominator_28T29->ViewAttributes() ?>><?php echo $frm_fp_forma->Denominator_28T29->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_forma->Accomplishment->Visible) { // Accomplishment ?>
		<td<?php echo $frm_fp_forma->Accomplishment->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Accomplishment->ViewAttributes() ?>><?php echo $frm_fp_forma->Accomplishment->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_forma->Numerator_28A29->Visible) { // Numerator (A) ?>
		<td<?php echo $frm_fp_forma->Numerator_28A29->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Numerator_28A29->ViewAttributes() ?>><?php echo $frm_fp_forma->Numerator_28A29->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_forma->Denominator_28A29->Visible) { // Denominator (A) ?>
		<td<?php echo $frm_fp_forma->Denominator_28A29->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Denominator_28A29->ViewAttributes() ?>><?php echo $frm_fp_forma->Denominator_28A29->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_forma->Supporting_Documents_Count->Visible) { // Supporting Documents Count ?>
		<td<?php echo $frm_fp_forma->Supporting_Documents_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Supporting_Documents_Count->ViewAttributes() ?>><?php echo $frm_fp_forma->Supporting_Documents_Count->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_forma->Rating->Visible) { // Rating ?>
		<td<?php echo $frm_fp_forma->Rating->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Rating->ViewAttributes() ?>><?php echo $frm_fp_forma->Rating->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_forma_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_fp_forma->CurrentAction <> "gridadd")
		$frm_fp_forma_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_fp_forma_list->Recordset)
	$frm_fp_forma_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_fp_forma->Export == "" && $frm_fp_forma->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_fp_forma_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_fp_forma->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_fp_forma_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_forma_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_fp_forma';

	// Page object name
	var $PageObjName = 'frm_fp_forma_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_forma;
		if ($frm_fp_forma->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_forma->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_forma;
		if ($frm_fp_forma->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_forma->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_forma->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_forma_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_forma)
		if (!isset($GLOBALS["frm_fp_forma"])) {
			$GLOBALS["frm_fp_forma"] = new cfrm_fp_forma();
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_forma"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_fp_formaadd.php?" . UP_TABLE_SHOW_DETAIL . "=";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_fp_formadelete.php";
		$this->MultiUpdateUrl = "frm_fp_formaupdate.php";

		// Table object (frm_fp_pbb_detail_target)
		if (!isset($GLOBALS['frm_fp_pbb_detail_target'])) $GLOBALS['frm_fp_pbb_detail_target'] = new cfrm_fp_pbb_detail_target();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_forma', TRUE);

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
		global $frm_fp_forma;

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
			$frm_fp_forma->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_fp_forma;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($frm_fp_forma->Export <> "" ||
				$frm_fp_forma->CurrentAction == "gridadd" ||
				$frm_fp_forma->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_fp_forma->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_fp_forma->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_fp_forma->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_fp_forma->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_fp_forma->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_fp_forma->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_fp_forma->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$frm_fp_forma->setSessionWhere($sFilter);
		$frm_fp_forma->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_fp_forma;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_forma->CU_Office, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_forma->MFO, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_forma->Question, $Keyword);
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
		global $Security, $frm_fp_forma;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_fp_forma->BasicSearchKeyword;
		$sSearchType = $frm_fp_forma->BasicSearchType;
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
			$frm_fp_forma->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_fp_forma->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_fp_forma;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_fp_forma->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_fp_forma;
		$frm_fp_forma->setSessionBasicSearchKeyword("");
		$frm_fp_forma->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_fp_forma;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_fp_forma->BasicSearchKeyword = $frm_fp_forma->getSessionBasicSearchKeyword();
			$frm_fp_forma->BasicSearchType = $frm_fp_forma->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_fp_forma;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_fp_forma->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_fp_forma->CurrentOrderType = @$_GET["ordertype"];
			$frm_fp_forma->UpdateSort($frm_fp_forma->CU_Office); // CU Office
			$frm_fp_forma->UpdateSort($frm_fp_forma->MFO); // MFO
			$frm_fp_forma->UpdateSort($frm_fp_forma->Question); // Question
			$frm_fp_forma->UpdateSort($frm_fp_forma->Participating_Units_Count); // Participating Units Count
			$frm_fp_forma->UpdateSort($frm_fp_forma->Target); // Target
			$frm_fp_forma->UpdateSort($frm_fp_forma->Numerator_28T29); // Numerator (T)
			$frm_fp_forma->UpdateSort($frm_fp_forma->Denominator_28T29); // Denominator (T)
			$frm_fp_forma->UpdateSort($frm_fp_forma->Accomplishment); // Accomplishment
			$frm_fp_forma->UpdateSort($frm_fp_forma->Numerator_28A29); // Numerator (A)
			$frm_fp_forma->UpdateSort($frm_fp_forma->Denominator_28A29); // Denominator (A)
			$frm_fp_forma->UpdateSort($frm_fp_forma->Supporting_Documents_Count); // Supporting Documents Count
			$frm_fp_forma->UpdateSort($frm_fp_forma->Rating); // Rating
			$frm_fp_forma->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_fp_forma;
		$sOrderBy = $frm_fp_forma->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_fp_forma->SqlOrderBy() <> "") {
				$sOrderBy = $frm_fp_forma->SqlOrderBy();
				$frm_fp_forma->setSessionOrderBy($sOrderBy);
				$frm_fp_forma->CU_Office->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_fp_forma;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_fp_forma->setSessionOrderBy($sOrderBy);
				$frm_fp_forma->CU_Office->setSort("");
				$frm_fp_forma->MFO->setSort("");
				$frm_fp_forma->Question->setSort("");
				$frm_fp_forma->Participating_Units_Count->setSort("");
				$frm_fp_forma->Target->setSort("");
				$frm_fp_forma->Numerator_28T29->setSort("");
				$frm_fp_forma->Denominator_28T29->setSort("");
				$frm_fp_forma->Accomplishment->setSort("");
				$frm_fp_forma->Numerator_28A29->setSort("");
				$frm_fp_forma->Denominator_28A29->setSort("");
				$frm_fp_forma->Supporting_Documents_Count->setSort("");
				$frm_fp_forma->Rating->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_fp_forma->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_fp_forma;

		// "detail_frm_fp_pbb_detail_target"
		$item =& $this->ListOptions->Add("detail_frm_fp_pbb_detail_target");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->AllowList('frm_fp_pbb_detail_target');
		$item->OnLeft = TRUE;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_fp_forma, $objForm;
		$this->ListOptions->LoadDefault();

		// "detail_frm_fp_pbb_detail_target"
		$oListOpt =& $this->ListOptions->Items["detail_frm_fp_pbb_detail_target"];
		if ($Security->AllowList('frm_fp_pbb_detail_target') && $this->ShowOptionLink()) {
			$oListOpt->Body = $Language->Phrase("DetailLink") . $Language->TablePhrase("frm_fp_pbb_detail_target", "TblCaption");
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"frm_fp_pbb_detail_targetlist.php?" . UP_TABLE_SHOW_MASTER . "=frm_fp_forma&Sequence=" . urlencode(strval($frm_fp_forma->Sequence->CurrentValue)) . "\">" . $oListOpt->Body . "</a>";
			$links = "";
			if ($links <> "") $oListOpt->Body .= "<br>" . $links;
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_fp_forma;
		$sSqlWrk = "`mfo_sequence`=" . up_AdjustSql($frm_fp_forma->Sequence->CurrentValue) . "";
		$sSqlWrk = TEAencrypt($sSqlWrk, UP_RANDOM_KEY);
		$sSqlWrk = str_replace("'", "\'", $sSqlWrk);
		$sHyperLinkParm = " href=\"frm_fp_pbb_detail_targetlist.php?" . UP_TABLE_SHOW_MASTER . "=frm_fp_forma&Sequence=" . urlencode(strval($frm_fp_forma->Sequence->CurrentValue)) . "\"";
		$oListOpt =& $this->ListOptions->Items["detail_frm_fp_pbb_detail_target"];
		$oListOpt->Body = $Language->TablePhrase("frm_fp_pbb_detail_target", "TblCaption");
		$oListOpt->Body = "<a class=\"upRowLink\"" . $sHyperLinkParm . ">" . $oListOpt->Body . "</a>";
		$sHyperLinkParm = " href=\"javascript:void(0);\" name=\"dl%i_frm_fp_forma_frm_fp_pbb_detail_target\" id=\"dl%i_frm_fp_forma_frm_fp_pbb_detail_target\" onclick=\"up_AjaxShowDetails2(event, this, 'frm_fp_pbb_detail_targetpreview.php?f=%s')\"";		
		$sHyperLinkParm = str_replace("%i", $this->RowCnt, $sHyperLinkParm);
		$sHyperLinkParm = str_replace("%s", $sSqlWrk, $sHyperLinkParm);
		$oListOpt->Body = "<a" . $sHyperLinkParm . "><img class=\"upPreviewRowImage\" src=\"phpimages/expand.gif\" width=\"9\" height=\"9\" border=\"0\"></a>&nbsp;" . $oListOpt->Body;
		$links = "";
		if ($links <> "") $oListOpt->Body .= "<br>" . $links;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_fp_forma;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_fp_forma->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_fp_forma->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_fp_forma->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_fp_forma->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_fp_forma->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_fp_forma->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_fp_forma;
		$frm_fp_forma->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_fp_forma->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_fp_forma;

		// Call Recordset Selecting event
		$frm_fp_forma->Recordset_Selecting($frm_fp_forma->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_fp_forma->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_fp_forma->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_forma;
		$sFilter = $frm_fp_forma->KeyFilter();

		// Call Row Selecting event
		$frm_fp_forma->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_forma->CurrentFilter = $sFilter;
		$sSql = $frm_fp_forma->SQL();
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
		global $conn, $frm_fp_forma;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_forma->Row_Selected($row);
		$frm_fp_forma->id->setDbValue($rs->fields('id'));
		$frm_fp_forma->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_forma->CU_Office->setDbValue($rs->fields('CU Office'));
		$frm_fp_forma->Sequence->setDbValue($rs->fields('Sequence'));
		$frm_fp_forma->MFO->setDbValue($rs->fields('MFO'));
		$frm_fp_forma->Question->setDbValue($rs->fields('Question'));
		$frm_fp_forma->Participating_Units_Count->setDbValue($rs->fields('Participating Units Count'));
		$frm_fp_forma->Target->setDbValue($rs->fields('Target'));
		$frm_fp_forma->Numerator_28T29->setDbValue($rs->fields('Numerator (T)'));
		$frm_fp_forma->Denominator_28T29->setDbValue($rs->fields('Denominator (T)'));
		$frm_fp_forma->Accomplishment->setDbValue($rs->fields('Accomplishment'));
		$frm_fp_forma->Numerator_28A29->setDbValue($rs->fields('Numerator (A)'));
		$frm_fp_forma->Denominator_28A29->setDbValue($rs->fields('Denominator (A)'));
		$frm_fp_forma->Supporting_Documents_Count->setDbValue($rs->fields('Supporting Documents Count'));
		$frm_fp_forma->Rating->setDbValue($rs->fields('Rating'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_fp_forma;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_fp_forma->getKey("id")) <> "")
			$frm_fp_forma->id->CurrentValue = $frm_fp_forma->getKey("id"); // id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_fp_forma->CurrentFilter = $frm_fp_forma->KeyFilter();
			$sSql = $frm_fp_forma->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_forma;

		// Initialize URLs
		$this->ViewUrl = $frm_fp_forma->ViewUrl();
		$this->EditUrl = $frm_fp_forma->EditUrl();
		$this->InlineEditUrl = $frm_fp_forma->InlineEditUrl();
		$this->CopyUrl = $frm_fp_forma->CopyUrl();
		$this->InlineCopyUrl = $frm_fp_forma->InlineCopyUrl();
		$this->DeleteUrl = $frm_fp_forma->DeleteUrl();

		// Call Row_Rendering event
		$frm_fp_forma->Row_Rendering();

		// Common render codes for all row types
		// id

		$frm_fp_forma->id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$frm_fp_forma->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// CU Office
		$frm_fp_forma->CU_Office->CellCssStyle = "white-space: nowrap;";

		// Sequence
		$frm_fp_forma->Sequence->CellCssStyle = "white-space: nowrap;";

		// MFO
		$frm_fp_forma->MFO->CellCssStyle = "white-space: nowrap;";

		// Question
		$frm_fp_forma->Question->CellCssStyle = "width: 400px;";

		// Participating Units Count
		$frm_fp_forma->Participating_Units_Count->CellCssStyle = "white-space: nowrap;";

		// Target
		// Numerator (T)
		// Denominator (T)
		// Accomplishment
		// Numerator (A)
		// Denominator (A)
		// Supporting Documents Count
		// Rating

		if ($frm_fp_forma->RowType == UP_ROWTYPE_VIEW) { // View row

			// id
			$frm_fp_forma->id->ViewValue = $frm_fp_forma->id->CurrentValue;
			$frm_fp_forma->id->ViewCustomAttributes = "";

			// CU Office
			$frm_fp_forma->CU_Office->ViewValue = $frm_fp_forma->CU_Office->CurrentValue;
			$frm_fp_forma->CU_Office->ViewCustomAttributes = "";

			// MFO
			$frm_fp_forma->MFO->ViewValue = $frm_fp_forma->MFO->CurrentValue;
			$frm_fp_forma->MFO->ViewCustomAttributes = "";

			// Question
			$frm_fp_forma->Question->ViewValue = $frm_fp_forma->Question->CurrentValue;
			$frm_fp_forma->Question->ViewCustomAttributes = "";

			// Participating Units Count
			$frm_fp_forma->Participating_Units_Count->ViewValue = $frm_fp_forma->Participating_Units_Count->CurrentValue;
			$frm_fp_forma->Participating_Units_Count->ViewCustomAttributes = "";

			// Target
			$frm_fp_forma->Target->ViewValue = $frm_fp_forma->Target->CurrentValue;
			$frm_fp_forma->Target->CssStyle = "font-weight:bold;text-align:right;";
			$frm_fp_forma->Target->ViewCustomAttributes = "";

			// Numerator (T)
			$frm_fp_forma->Numerator_28T29->ViewValue = $frm_fp_forma->Numerator_28T29->CurrentValue;
			$frm_fp_forma->Numerator_28T29->CssStyle = "text-align:right;";
			$frm_fp_forma->Numerator_28T29->ViewCustomAttributes = "";

			// Denominator (T)
			$frm_fp_forma->Denominator_28T29->ViewValue = $frm_fp_forma->Denominator_28T29->CurrentValue;
			$frm_fp_forma->Denominator_28T29->CssStyle = "text-align:right;";
			$frm_fp_forma->Denominator_28T29->ViewCustomAttributes = "";

			// Accomplishment
			$frm_fp_forma->Accomplishment->ViewValue = $frm_fp_forma->Accomplishment->CurrentValue;
			$frm_fp_forma->Accomplishment->CssStyle = "font-weight:bold;text-align:right;";
			$frm_fp_forma->Accomplishment->ViewCustomAttributes = "";

			// Numerator (A)
			$frm_fp_forma->Numerator_28A29->ViewValue = $frm_fp_forma->Numerator_28A29->CurrentValue;
			$frm_fp_forma->Numerator_28A29->CssStyle = "text-align:right;";
			$frm_fp_forma->Numerator_28A29->ViewCustomAttributes = "";

			// Denominator (A)
			$frm_fp_forma->Denominator_28A29->ViewValue = $frm_fp_forma->Denominator_28A29->CurrentValue;
			$frm_fp_forma->Denominator_28A29->CssStyle = "text-align:right;";
			$frm_fp_forma->Denominator_28A29->ViewCustomAttributes = "";

			// Supporting Documents Count
			$frm_fp_forma->Supporting_Documents_Count->ViewValue = $frm_fp_forma->Supporting_Documents_Count->CurrentValue;
			$frm_fp_forma->Supporting_Documents_Count->CssStyle = "font-weight:bold;text-align:right;";
			$frm_fp_forma->Supporting_Documents_Count->ViewCustomAttributes = "";

			// Rating
			$frm_fp_forma->Rating->ViewValue = $frm_fp_forma->Rating->CurrentValue;
			$frm_fp_forma->Rating->CssStyle = "font-weight:bold;text-align:right;";
			$frm_fp_forma->Rating->ViewCustomAttributes = "";

			// CU Office
			$frm_fp_forma->CU_Office->LinkCustomAttributes = "";
			$frm_fp_forma->CU_Office->HrefValue = "";
			$frm_fp_forma->CU_Office->TooltipValue = "";

			// MFO
			$frm_fp_forma->MFO->LinkCustomAttributes = "";
			$frm_fp_forma->MFO->HrefValue = "";
			$frm_fp_forma->MFO->TooltipValue = "";

			// Question
			$frm_fp_forma->Question->LinkCustomAttributes = "";
			$frm_fp_forma->Question->HrefValue = "";
			$frm_fp_forma->Question->TooltipValue = "";

			// Participating Units Count
			$frm_fp_forma->Participating_Units_Count->LinkCustomAttributes = "";
			$frm_fp_forma->Participating_Units_Count->HrefValue = "";
			$frm_fp_forma->Participating_Units_Count->TooltipValue = "";

			// Target
			$frm_fp_forma->Target->LinkCustomAttributes = "";
			$frm_fp_forma->Target->HrefValue = "";
			$frm_fp_forma->Target->TooltipValue = "";

			// Numerator (T)
			$frm_fp_forma->Numerator_28T29->LinkCustomAttributes = "";
			$frm_fp_forma->Numerator_28T29->HrefValue = "";
			$frm_fp_forma->Numerator_28T29->TooltipValue = "";

			// Denominator (T)
			$frm_fp_forma->Denominator_28T29->LinkCustomAttributes = "";
			$frm_fp_forma->Denominator_28T29->HrefValue = "";
			$frm_fp_forma->Denominator_28T29->TooltipValue = "";

			// Accomplishment
			$frm_fp_forma->Accomplishment->LinkCustomAttributes = "";
			$frm_fp_forma->Accomplishment->HrefValue = "";
			$frm_fp_forma->Accomplishment->TooltipValue = "";

			// Numerator (A)
			$frm_fp_forma->Numerator_28A29->LinkCustomAttributes = "";
			$frm_fp_forma->Numerator_28A29->HrefValue = "";
			$frm_fp_forma->Numerator_28A29->TooltipValue = "";

			// Denominator (A)
			$frm_fp_forma->Denominator_28A29->LinkCustomAttributes = "";
			$frm_fp_forma->Denominator_28A29->HrefValue = "";
			$frm_fp_forma->Denominator_28A29->TooltipValue = "";

			// Supporting Documents Count
			$frm_fp_forma->Supporting_Documents_Count->LinkCustomAttributes = "";
			$frm_fp_forma->Supporting_Documents_Count->HrefValue = "";
			$frm_fp_forma->Supporting_Documents_Count->TooltipValue = "";

			// Rating
			$frm_fp_forma->Rating->LinkCustomAttributes = "";
			$frm_fp_forma->Rating->HrefValue = "";
			$frm_fp_forma->Rating->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_fp_forma->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_forma->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_fp_forma;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_fp_forma->focal_person_id->CurrentValue);
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
