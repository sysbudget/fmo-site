<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_sam_mfo_questionsinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_sam_mfo_questions_list = new cfrm_sam_mfo_questions_list();
$Page =& $frm_sam_mfo_questions_list;

// Page init
$frm_sam_mfo_questions_list->Page_Init();

// Page main
$frm_sam_mfo_questions_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_sam_mfo_questions->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_mfo_questions_list = new up_Page("frm_sam_mfo_questions_list");

// page properties
frm_sam_mfo_questions_list.PageID = "list"; // page ID
frm_sam_mfo_questions_list.FormID = "ffrm_sam_mfo_questionslist"; // form ID
var UP_PAGE_ID = frm_sam_mfo_questions_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_sam_mfo_questions_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_mfo_questions_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_mfo_questions_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_mfo_questions_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_sam_mfo_questions->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_sam_mfo_questions->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_sam_mfo_questions_list->TotalRecs = $frm_sam_mfo_questions->SelectRecordCount();
	} else {
		if ($frm_sam_mfo_questions_list->Recordset = $frm_sam_mfo_questions_list->LoadRecordset())
			$frm_sam_mfo_questions_list->TotalRecs = $frm_sam_mfo_questions_list->Recordset->RecordCount();
	}
	$frm_sam_mfo_questions_list->StartRec = 1;
	if ($frm_sam_mfo_questions_list->DisplayRecs <= 0 || ($frm_sam_mfo_questions->Export <> "" && $frm_sam_mfo_questions->ExportAll)) // Display all records
		$frm_sam_mfo_questions_list->DisplayRecs = $frm_sam_mfo_questions_list->TotalRecs;
	if (!($frm_sam_mfo_questions->Export <> "" && $frm_sam_mfo_questions->ExportAll))
		$frm_sam_mfo_questions_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_sam_mfo_questions_list->Recordset = $frm_sam_mfo_questions_list->LoadRecordset($frm_sam_mfo_questions_list->StartRec-1, $frm_sam_mfo_questions_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_mfo_questions->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_sam_mfo_questions_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_sam_mfo_questions->Export == "" && $frm_sam_mfo_questions->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_sam_mfo_questions_list);" style="text-decoration: none;"><img id="frm_sam_mfo_questions_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_sam_mfo_questions_list_SearchPanel">
<form name="ffrm_sam_mfo_questionslistsrch" id="ffrm_sam_mfo_questionslistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_sam_mfo_questions">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_sam_mfo_questions->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_sam_mfo_questions_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_sam_mfo_questions->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_sam_mfo_questions->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_sam_mfo_questions->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_sam_mfo_questions_list->ShowPageHeader(); ?>
<?php
$frm_sam_mfo_questions_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_sam_mfo_questions->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_sam_mfo_questions->CurrentAction <> "gridadd" && $frm_sam_mfo_questions->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_sam_mfo_questions_list->Pager)) $frm_sam_mfo_questions_list->Pager = new cPrevNextPager($frm_sam_mfo_questions_list->StartRec, $frm_sam_mfo_questions_list->DisplayRecs, $frm_sam_mfo_questions_list->TotalRecs) ?>
<?php if ($frm_sam_mfo_questions_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_sam_mfo_questions_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_sam_mfo_questions_list->PageUrl() ?>start=<?php echo $frm_sam_mfo_questions_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_sam_mfo_questions_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_sam_mfo_questions_list->PageUrl() ?>start=<?php echo $frm_sam_mfo_questions_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_sam_mfo_questions_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_sam_mfo_questions_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_sam_mfo_questions_list->PageUrl() ?>start=<?php echo $frm_sam_mfo_questions_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_sam_mfo_questions_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_sam_mfo_questions_list->PageUrl() ?>start=<?php echo $frm_sam_mfo_questions_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_sam_mfo_questions_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_sam_mfo_questions_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_sam_mfo_questions_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_sam_mfo_questions_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_sam_mfo_questions_list->SearchWhere == "0=101") { ?>
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
<form name="ffrm_sam_mfo_questionslist" id="ffrm_sam_mfo_questionslist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_sam_mfo_questions">
<div id="gmp_frm_sam_mfo_questions" class="upGridMiddlePanel">
<?php if ($frm_sam_mfo_questions_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_sam_mfo_questions->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_sam_mfo_questions_list->RenderListOptions();

// Render list options (header, left)
$frm_sam_mfo_questions_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_sam_mfo_questions->mfo_sequence->Visible) { // mfo_sequence ?>
	<?php if ($frm_sam_mfo_questions->SortUrl($frm_sam_mfo_questions->mfo_sequence) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_mfo_questions->mfo_sequence->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_mfo_questions->SortUrl($frm_sam_mfo_questions->mfo_sequence) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_mfo_questions->mfo_sequence->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_mfo_questions->mfo_sequence->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_mfo_questions->mfo_sequence->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_mfo_questions->mfo_name->Visible) { // mfo_name ?>
	<?php if ($frm_sam_mfo_questions->SortUrl($frm_sam_mfo_questions->mfo_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_mfo_questions->mfo_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_mfo_questions->SortUrl($frm_sam_mfo_questions->mfo_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_mfo_questions->mfo_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_sam_mfo_questions->mfo_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_mfo_questions->mfo_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_mfo_questions->pi_question->Visible) { // pi_question ?>
	<?php if ($frm_sam_mfo_questions->SortUrl($frm_sam_mfo_questions->pi_question) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_mfo_questions->pi_question->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_mfo_questions->SortUrl($frm_sam_mfo_questions->pi_question) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_mfo_questions->pi_question->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_sam_mfo_questions->pi_question->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_mfo_questions->pi_question->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_mfo_questions->gaa_value->Visible) { // gaa_value ?>
	<?php if ($frm_sam_mfo_questions->SortUrl($frm_sam_mfo_questions->gaa_value) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_mfo_questions->gaa_value->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_mfo_questions->SortUrl($frm_sam_mfo_questions->gaa_value) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_mfo_questions->gaa_value->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_mfo_questions->gaa_value->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_mfo_questions->gaa_value->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_mfo_questions->expectations->Visible) { // expectations ?>
	<?php if ($frm_sam_mfo_questions->SortUrl($frm_sam_mfo_questions->expectations) == "") { ?>
		<td><?php echo $frm_sam_mfo_questions->expectations->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_mfo_questions->SortUrl($frm_sam_mfo_questions->expectations) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_mfo_questions->expectations->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_sam_mfo_questions->expectations->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_mfo_questions->expectations->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_mfo_questions->form_a_1_sequence->Visible) { // form_a_1_sequence ?>
	<?php if ($frm_sam_mfo_questions->SortUrl($frm_sam_mfo_questions->form_a_1_sequence) == "") { ?>
		<td><?php echo $frm_sam_mfo_questions->form_a_1_sequence->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_mfo_questions->SortUrl($frm_sam_mfo_questions->form_a_1_sequence) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_sam_mfo_questions->form_a_1_sequence->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_mfo_questions->form_a_1_sequence->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_mfo_questions->form_a_1_sequence->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_sam_mfo_questions_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_sam_mfo_questions->ExportAll && $frm_sam_mfo_questions->Export <> "") {
	$frm_sam_mfo_questions_list->StopRec = $frm_sam_mfo_questions_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_sam_mfo_questions_list->TotalRecs > $frm_sam_mfo_questions_list->StartRec + $frm_sam_mfo_questions_list->DisplayRecs - 1)
		$frm_sam_mfo_questions_list->StopRec = $frm_sam_mfo_questions_list->StartRec + $frm_sam_mfo_questions_list->DisplayRecs - 1;
	else
		$frm_sam_mfo_questions_list->StopRec = $frm_sam_mfo_questions_list->TotalRecs;
}
$frm_sam_mfo_questions_list->RecCnt = $frm_sam_mfo_questions_list->StartRec - 1;
if ($frm_sam_mfo_questions_list->Recordset && !$frm_sam_mfo_questions_list->Recordset->EOF) {
	$frm_sam_mfo_questions_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_sam_mfo_questions_list->StartRec > 1)
		$frm_sam_mfo_questions_list->Recordset->Move($frm_sam_mfo_questions_list->StartRec - 1);
} elseif (!$frm_sam_mfo_questions->AllowAddDeleteRow && $frm_sam_mfo_questions_list->StopRec == 0) {
	$frm_sam_mfo_questions_list->StopRec = $frm_sam_mfo_questions->GridAddRowCount;
}

// Initialize aggregate
$frm_sam_mfo_questions->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_sam_mfo_questions->ResetAttrs();
$frm_sam_mfo_questions_list->RenderRow();
$frm_sam_mfo_questions_list->RowCnt = 0;
while ($frm_sam_mfo_questions_list->RecCnt < $frm_sam_mfo_questions_list->StopRec) {
	$frm_sam_mfo_questions_list->RecCnt++;
	if (intval($frm_sam_mfo_questions_list->RecCnt) >= intval($frm_sam_mfo_questions_list->StartRec)) {
		$frm_sam_mfo_questions_list->RowCnt++;

		// Set up key count
		$frm_sam_mfo_questions_list->KeyCount = $frm_sam_mfo_questions_list->RowIndex;

		// Init row class and style
		$frm_sam_mfo_questions->ResetAttrs();
		$frm_sam_mfo_questions->CssClass = "";
		if ($frm_sam_mfo_questions->CurrentAction == "gridadd") {
		} else {
			$frm_sam_mfo_questions_list->LoadRowValues($frm_sam_mfo_questions_list->Recordset); // Load row values
		}
		$frm_sam_mfo_questions->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_sam_mfo_questions->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_sam_mfo_questions_list->RenderRow();

		// Render list options
		$frm_sam_mfo_questions_list->RenderListOptions();
?>
	<tr<?php echo $frm_sam_mfo_questions->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_sam_mfo_questions_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_sam_mfo_questions->mfo_sequence->Visible) { // mfo_sequence ?>
		<td<?php echo $frm_sam_mfo_questions->mfo_sequence->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions->mfo_sequence->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions->mfo_sequence->ListViewValue() ?></div>
<a name="<?php echo $frm_sam_mfo_questions_list->PageObjName . "_row_" . $frm_sam_mfo_questions_list->RowCnt ?>" id="<?php echo $frm_sam_mfo_questions_list->PageObjName . "_row_" . $frm_sam_mfo_questions_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_sam_mfo_questions->mfo_name->Visible) { // mfo_name ?>
		<td<?php echo $frm_sam_mfo_questions->mfo_name->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions->mfo_name->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions->mfo_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_mfo_questions->pi_question->Visible) { // pi_question ?>
		<td<?php echo $frm_sam_mfo_questions->pi_question->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions->pi_question->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions->pi_question->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_mfo_questions->gaa_value->Visible) { // gaa_value ?>
		<td<?php echo $frm_sam_mfo_questions->gaa_value->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions->gaa_value->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions->gaa_value->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_mfo_questions->expectations->Visible) { // expectations ?>
		<td<?php echo $frm_sam_mfo_questions->expectations->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions->expectations->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions->expectations->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_mfo_questions->form_a_1_sequence->Visible) { // form_a_1_sequence ?>
		<td<?php echo $frm_sam_mfo_questions->form_a_1_sequence->CellAttributes() ?>>
<div<?php echo $frm_sam_mfo_questions->form_a_1_sequence->ViewAttributes() ?>><?php echo $frm_sam_mfo_questions->form_a_1_sequence->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_sam_mfo_questions_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_sam_mfo_questions->CurrentAction <> "gridadd")
		$frm_sam_mfo_questions_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_sam_mfo_questions_list->Recordset)
	$frm_sam_mfo_questions_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_sam_mfo_questions->Export == "" && $frm_sam_mfo_questions->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_sam_mfo_questions_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_sam_mfo_questions->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_sam_mfo_questions_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_mfo_questions_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_sam_mfo_questions';

	// Page object name
	var $PageObjName = 'frm_sam_mfo_questions_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_mfo_questions;
		if ($frm_sam_mfo_questions->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_mfo_questions->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_mfo_questions;
		if ($frm_sam_mfo_questions->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_mfo_questions->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_mfo_questions->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_mfo_questions_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_mfo_questions)
		if (!isset($GLOBALS["frm_sam_mfo_questions"])) {
			$GLOBALS["frm_sam_mfo_questions"] = new cfrm_sam_mfo_questions();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_mfo_questions"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_sam_mfo_questionsadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_sam_mfo_questionsdelete.php";
		$this->MultiUpdateUrl = "frm_sam_mfo_questionsupdate.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_mfo_questions', TRUE);

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
		global $frm_sam_mfo_questions;

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

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$frm_sam_mfo_questions->Export = $_GET["export"];
		} elseif (up_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$frm_sam_mfo_questions->Export = $_POST["exporttype"];
		} else {
			$frm_sam_mfo_questions->setExportReturnUrl(up_CurrentUrl());
		}
		$gsExport = $frm_sam_mfo_questions->Export; // Get export parameter, used in header
		$gsExportFile = $frm_sam_mfo_questions->TableVar; // Get export file, used in header
		$Charset = (UP_CHARSET <> "") ? ";charset=" . UP_CHARSET : ""; // Charset used in header
		if ($frm_sam_mfo_questions->Export == "csv") {
			header('Content-Type: application/csv' . $Charset);
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_sam_mfo_questions->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->SetupListOptions();

		// Setup export options
		$this->SetupExportOptions();

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_sam_mfo_questions;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($frm_sam_mfo_questions->Export <> "" ||
				$frm_sam_mfo_questions->CurrentAction == "gridadd" ||
				$frm_sam_mfo_questions->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_sam_mfo_questions->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_sam_mfo_questions->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_sam_mfo_questions->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_sam_mfo_questions->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_sam_mfo_questions->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_sam_mfo_questions->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_sam_mfo_questions->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$frm_sam_mfo_questions->setSessionWhere($sFilter);
		$frm_sam_mfo_questions->CurrentFilter = "";

		// Export data only
		if (in_array($frm_sam_mfo_questions->Export, array("html","word","excel","xml","csv","email","pdf"))) {
			$this->ExportData();
			if ($frm_sam_mfo_questions->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_sam_mfo_questions;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_sam_mfo_questions->mfo_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_sam_mfo_questions->pi_question, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_sam_mfo_questions->expectations, $Keyword);
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
		global $Security, $frm_sam_mfo_questions;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_sam_mfo_questions->BasicSearchKeyword;
		$sSearchType = $frm_sam_mfo_questions->BasicSearchType;
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
			$frm_sam_mfo_questions->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_sam_mfo_questions->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_sam_mfo_questions;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_sam_mfo_questions->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_sam_mfo_questions;
		$frm_sam_mfo_questions->setSessionBasicSearchKeyword("");
		$frm_sam_mfo_questions->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_sam_mfo_questions;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_sam_mfo_questions->BasicSearchKeyword = $frm_sam_mfo_questions->getSessionBasicSearchKeyword();
			$frm_sam_mfo_questions->BasicSearchType = $frm_sam_mfo_questions->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_sam_mfo_questions;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_sam_mfo_questions->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_sam_mfo_questions->CurrentOrderType = @$_GET["ordertype"];
			$frm_sam_mfo_questions->UpdateSort($frm_sam_mfo_questions->mfo_sequence); // mfo_sequence
			$frm_sam_mfo_questions->UpdateSort($frm_sam_mfo_questions->mfo_name); // mfo_name
			$frm_sam_mfo_questions->UpdateSort($frm_sam_mfo_questions->pi_question); // pi_question
			$frm_sam_mfo_questions->UpdateSort($frm_sam_mfo_questions->gaa_value); // gaa_value
			$frm_sam_mfo_questions->UpdateSort($frm_sam_mfo_questions->expectations); // expectations
			$frm_sam_mfo_questions->UpdateSort($frm_sam_mfo_questions->form_a_1_sequence); // form_a_1_sequence
			$frm_sam_mfo_questions->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_sam_mfo_questions;
		$sOrderBy = $frm_sam_mfo_questions->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_sam_mfo_questions->SqlOrderBy() <> "") {
				$sOrderBy = $frm_sam_mfo_questions->SqlOrderBy();
				$frm_sam_mfo_questions->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_sam_mfo_questions;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_sam_mfo_questions->setSessionOrderBy($sOrderBy);
				$frm_sam_mfo_questions->mfo_sequence->setSort("");
				$frm_sam_mfo_questions->mfo_name->setSort("");
				$frm_sam_mfo_questions->pi_question->setSort("");
				$frm_sam_mfo_questions->gaa_value->setSort("");
				$frm_sam_mfo_questions->expectations->setSort("");
				$frm_sam_mfo_questions->form_a_1_sequence->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_sam_mfo_questions->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_sam_mfo_questions;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_sam_mfo_questions, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_sam_mfo_questions;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_sam_mfo_questions;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_sam_mfo_questions->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_sam_mfo_questions->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_sam_mfo_questions->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_sam_mfo_questions->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_sam_mfo_questions->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_sam_mfo_questions->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_sam_mfo_questions;
		$frm_sam_mfo_questions->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_sam_mfo_questions->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_sam_mfo_questions;

		// Call Recordset Selecting event
		$frm_sam_mfo_questions->Recordset_Selecting($frm_sam_mfo_questions->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_sam_mfo_questions->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_sam_mfo_questions->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_mfo_questions;
		$sFilter = $frm_sam_mfo_questions->KeyFilter();

		// Call Row Selecting event
		$frm_sam_mfo_questions->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_mfo_questions->CurrentFilter = $sFilter;
		$sSql = $frm_sam_mfo_questions->SQL();
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
		global $conn, $frm_sam_mfo_questions;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_mfo_questions->Row_Selected($row);
		$frm_sam_mfo_questions->mfo_id->setDbValue($rs->fields('mfo_id'));
		$frm_sam_mfo_questions->mfo_sequence->setDbValue($rs->fields('mfo_sequence'));
		$frm_sam_mfo_questions->mfo->setDbValue($rs->fields('mfo'));
		$frm_sam_mfo_questions->pi_no->setDbValue($rs->fields('pi_no'));
		$frm_sam_mfo_questions->pi_sub->setDbValue($rs->fields('pi_sub'));
		$frm_sam_mfo_questions->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$frm_sam_mfo_questions->mfo_name->setDbValue($rs->fields('mfo_name'));
		$frm_sam_mfo_questions->pi_question->setDbValue($rs->fields('pi_question'));
		$frm_sam_mfo_questions->gaa_value->setDbValue($rs->fields('gaa_value'));
		$frm_sam_mfo_questions->denominator->setDbValue($rs->fields('denominator'));
		$frm_sam_mfo_questions->pi_type->setDbValue($rs->fields('pi_type'));
		$frm_sam_mfo_questions->expectations->setDbValue($rs->fields('expectations'));
		$frm_sam_mfo_questions->form_a_1_sequence->setDbValue($rs->fields('form_a_1_sequence'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_sam_mfo_questions;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_sam_mfo_questions->getKey("mfo_id")) <> "")
			$frm_sam_mfo_questions->mfo_id->CurrentValue = $frm_sam_mfo_questions->getKey("mfo_id"); // mfo_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_sam_mfo_questions->CurrentFilter = $frm_sam_mfo_questions->KeyFilter();
			$sSql = $frm_sam_mfo_questions->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_mfo_questions;

		// Initialize URLs
		$this->ViewUrl = $frm_sam_mfo_questions->ViewUrl();
		$this->EditUrl = $frm_sam_mfo_questions->EditUrl();
		$this->InlineEditUrl = $frm_sam_mfo_questions->InlineEditUrl();
		$this->CopyUrl = $frm_sam_mfo_questions->CopyUrl();
		$this->InlineCopyUrl = $frm_sam_mfo_questions->InlineCopyUrl();
		$this->DeleteUrl = $frm_sam_mfo_questions->DeleteUrl();

		// Call Row_Rendering event
		$frm_sam_mfo_questions->Row_Rendering();

		// Common render codes for all row types
		// mfo_id

		$frm_sam_mfo_questions->mfo_id->CellCssStyle = "white-space: nowrap;";

		// mfo_sequence
		$frm_sam_mfo_questions->mfo_sequence->CellCssStyle = "white-space: nowrap;";

		// mfo
		$frm_sam_mfo_questions->mfo->CellCssStyle = "white-space: nowrap;";

		// pi_no
		$frm_sam_mfo_questions->pi_no->CellCssStyle = "white-space: nowrap;";

		// pi_sub
		$frm_sam_mfo_questions->pi_sub->CellCssStyle = "white-space: nowrap;";

		// mfo_name_rep
		$frm_sam_mfo_questions->mfo_name_rep->CellCssStyle = "white-space: nowrap;";

		// mfo_name
		$frm_sam_mfo_questions->mfo_name->CellCssStyle = "white-space: nowrap;";

		// pi_question
		$frm_sam_mfo_questions->pi_question->CellCssStyle = "white-space: nowrap;";

		// gaa_value
		$frm_sam_mfo_questions->gaa_value->CellCssStyle = "white-space: nowrap;";

		// denominator
		$frm_sam_mfo_questions->denominator->CellCssStyle = "white-space: nowrap;";

		// pi_type
		$frm_sam_mfo_questions->pi_type->CellCssStyle = "white-space: nowrap;";

		// expectations
		// form_a_1_sequence

		if ($frm_sam_mfo_questions->RowType == UP_ROWTYPE_VIEW) { // View row

			// mfo_sequence
			$frm_sam_mfo_questions->mfo_sequence->ViewValue = $frm_sam_mfo_questions->mfo_sequence->CurrentValue;
			$frm_sam_mfo_questions->mfo_sequence->ViewCustomAttributes = "";

			// mfo_name
			$frm_sam_mfo_questions->mfo_name->ViewValue = $frm_sam_mfo_questions->mfo_name->CurrentValue;
			$frm_sam_mfo_questions->mfo_name->ViewCustomAttributes = "";

			// pi_question
			$frm_sam_mfo_questions->pi_question->ViewValue = $frm_sam_mfo_questions->pi_question->CurrentValue;
			$frm_sam_mfo_questions->pi_question->ViewCustomAttributes = "";

			// gaa_value
			$frm_sam_mfo_questions->gaa_value->ViewValue = $frm_sam_mfo_questions->gaa_value->CurrentValue;
			$frm_sam_mfo_questions->gaa_value->ViewCustomAttributes = "";

			// expectations
			$frm_sam_mfo_questions->expectations->ViewValue = $frm_sam_mfo_questions->expectations->CurrentValue;
			$frm_sam_mfo_questions->expectations->ViewCustomAttributes = "";

			// form_a_1_sequence
			$frm_sam_mfo_questions->form_a_1_sequence->ViewValue = $frm_sam_mfo_questions->form_a_1_sequence->CurrentValue;
			$frm_sam_mfo_questions->form_a_1_sequence->ViewCustomAttributes = "";

			// mfo_sequence
			$frm_sam_mfo_questions->mfo_sequence->LinkCustomAttributes = "";
			$frm_sam_mfo_questions->mfo_sequence->HrefValue = "";
			$frm_sam_mfo_questions->mfo_sequence->TooltipValue = "";

			// mfo_name
			$frm_sam_mfo_questions->mfo_name->LinkCustomAttributes = "";
			$frm_sam_mfo_questions->mfo_name->HrefValue = "";
			$frm_sam_mfo_questions->mfo_name->TooltipValue = "";

			// pi_question
			$frm_sam_mfo_questions->pi_question->LinkCustomAttributes = "";
			$frm_sam_mfo_questions->pi_question->HrefValue = "";
			$frm_sam_mfo_questions->pi_question->TooltipValue = "";

			// gaa_value
			$frm_sam_mfo_questions->gaa_value->LinkCustomAttributes = "";
			$frm_sam_mfo_questions->gaa_value->HrefValue = "";
			$frm_sam_mfo_questions->gaa_value->TooltipValue = "";

			// expectations
			$frm_sam_mfo_questions->expectations->LinkCustomAttributes = "";
			$frm_sam_mfo_questions->expectations->HrefValue = "";
			$frm_sam_mfo_questions->expectations->TooltipValue = "";

			// form_a_1_sequence
			$frm_sam_mfo_questions->form_a_1_sequence->LinkCustomAttributes = "";
			$frm_sam_mfo_questions->form_a_1_sequence->HrefValue = "";
			$frm_sam_mfo_questions->form_a_1_sequence->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_sam_mfo_questions->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_mfo_questions->Row_Rendered();
	}

	// Set up export options
	function SetupExportOptions() {
		global $Language, $frm_sam_mfo_questions;

		// Printer friendly
		$item =& $this->ExportOptions->Add("print");
		$item->Body = "<a href=\"" . $this->ExportPrintUrl . "\">" . $Language->Phrase("PrinterFriendly") . "</a>";
		$item->Visible = FALSE;

		// Export to Excel
		$item =& $this->ExportOptions->Add("excel");
		$item->Body = "<a href=\"" . $this->ExportExcelUrl . "\">" . $Language->Phrase("ExportToExcel") . "</a>";
		$item->Visible = FALSE;

		// Export to Word
		$item =& $this->ExportOptions->Add("word");
		$item->Body = "<a href=\"" . $this->ExportWordUrl . "\">" . $Language->Phrase("ExportToWord") . "</a>";
		$item->Visible = FALSE;

		// Export to Html
		$item =& $this->ExportOptions->Add("html");
		$item->Body = "<a href=\"" . $this->ExportHtmlUrl . "\">" . $Language->Phrase("ExportToHtml") . "</a>";
		$item->Visible = FALSE;

		// Export to Xml
		$item =& $this->ExportOptions->Add("xml");
		$item->Body = "<a href=\"" . $this->ExportXmlUrl . "\">" . $Language->Phrase("ExportToXml") . "</a>";
		$item->Visible = FALSE;

		// Export to Csv
		$item =& $this->ExportOptions->Add("csv");
		$item->Body = "<a href=\"" . $this->ExportCsvUrl . "\">" . $Language->Phrase("ExportToCsv") . "</a>";
		$item->Visible = FALSE;

		// Export to Pdf
		$item =& $this->ExportOptions->Add("pdf");
		$item->Body = "<a href=\"" . $this->ExportPdfUrl . "\">" . $Language->Phrase("ExportToPDF") . "</a>";
		$item->Visible = FALSE;

		// Export to Email
		$item =& $this->ExportOptions->Add("email");
		$item->Body = "<a name=\"emf_frm_sam_mfo_questions\" id=\"emf_frm_sam_mfo_questions\" href=\"javascript:void(0);\" onclick=\"up_EmailDialogShow({lnk:'emf_frm_sam_mfo_questions',hdr:upLanguage.Phrase('ExportToEmail'),f:document.ffrm_sam_mfo_questionslist,sel:false});\">" . $Language->Phrase("ExportToEmail") . "</a>";
		$item->Visible = FALSE;

		// Hide options for export/action
		if ($frm_sam_mfo_questions->Export <> "" ||
			$frm_sam_mfo_questions->CurrentAction <> "")
			$this->ExportOptions->HideAllOptions();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	function ExportData() {
		global $frm_sam_mfo_questions;
		$utf8 = (strtolower(UP_CHARSET) == "utf-8");
		$bSelectLimit = UP_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->TotalRecs = $frm_sam_mfo_questions->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;

		// Export all
		if ($frm_sam_mfo_questions->ExportAll) {
			$this->DisplayRecs = $this->TotalRecs;
			$this->StopRec = $this->TotalRecs;
		} else { // Export one page only
			$this->SetUpStartRec(); // Set up start record position

			// Set the last record to display
			if ($this->DisplayRecs < 0) {
				$this->StopRec = $this->TotalRecs;
			} else {
				$this->StopRec = $this->StartRec + $this->DisplayRecs - 1;
			}
		}
		if ($bSelectLimit)
			$rs = $this->LoadRecordset($this->StartRec-1, $this->DisplayRecs);
		if (!$rs) {
			header("Content-Type:"); // Remove header
			header("Content-Disposition:");
			$this->ShowMessage();
			return;
		}
		if ($frm_sam_mfo_questions->Export == "xml") {
			$XmlDoc = new cXMLDocument(UP_XML_ENCODING);
		} else {
			$ExportDoc = new cExportDocument($frm_sam_mfo_questions, "h");
		}
		$ParentTable = "";
		if ($bSelectLimit) {
			$StartRec = 1;
			$StopRec = $this->DisplayRecs;
		} else {
			$StartRec = $this->StartRec;
			$StopRec = $this->StopRec;
		}
		if ($frm_sam_mfo_questions->Export == "xml") {
			$frm_sam_mfo_questions->ExportXmlDocument($XmlDoc, ($ParentTable <> ""), $rs, $StartRec, $StopRec, "");
		} else {
			$sHeader = $this->PageHeader;
			$this->Page_DataRendering($sHeader);
			$ExportDoc->Text .= $sHeader;
			$frm_sam_mfo_questions->ExportDocument($ExportDoc, $rs, $StartRec, $StopRec, "");
			$sFooter = $this->PageFooter;
			$this->Page_DataRendered($sFooter);
			$ExportDoc->Text .= $sFooter;
		}

		// Close recordset
		$rs->Close();

		// Export header and footer
		if ($frm_sam_mfo_questions->Export <> "xml") {
			$ExportDoc->ExportHeaderAndFooter();
		}

		// Clean output buffer
		if (!UP_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($frm_sam_mfo_questions->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (UP_DEBUG_ENABLED)
			echo up_DebugMsg();

		// Output data
		if ($frm_sam_mfo_questions->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($frm_sam_mfo_questions->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($frm_sam_mfo_questions->ExportReturnUrl());
		} elseif ($frm_sam_mfo_questions->Export == "pdf") {
			$this->ExportPDF($ExportDoc->Text);
		} else {
			echo $ExportDoc->Text;
		}
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