<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_fp_rep_ta_form_a_1_iatfinfo.php" ?>
<?php include_once "frm_fp_rep_ta_form_a_1_iatf_headerinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_fp_rep_ta_form_a_1_iatf_list = new cfrm_fp_rep_ta_form_a_1_iatf_list();
$Page =& $frm_fp_rep_ta_form_a_1_iatf_list;

// Page init
$frm_fp_rep_ta_form_a_1_iatf_list->Page_Init();

// Page main
$frm_fp_rep_ta_form_a_1_iatf_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_rep_ta_form_a_1_iatf_list = new up_Page("frm_fp_rep_ta_form_a_1_iatf_list");

// page properties
frm_fp_rep_ta_form_a_1_iatf_list.PageID = "list"; // page ID
frm_fp_rep_ta_form_a_1_iatf_list.FormID = "ffrm_fp_rep_ta_form_a_1_iatflist"; // form ID
var UP_PAGE_ID = frm_fp_rep_ta_form_a_1_iatf_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_fp_rep_ta_form_a_1_iatf_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_rep_ta_form_a_1_iatf_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_rep_ta_form_a_1_iatf_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_rep_ta_form_a_1_iatf_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_fp_rep_ta_form_a_1_iatf->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_fp_rep_ta_form_a_1_iatf->Export == "print")) { ?>
<?php
$gsMasterReturnUrl = "frm_fp_rep_ta_form_a_1_iatf_headerlist.php";
if ($frm_fp_rep_ta_form_a_1_iatf_list->DbMasterFilter <> "" && $frm_fp_rep_ta_form_a_1_iatf->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_1_iatf_header") {
	if ($frm_fp_rep_ta_form_a_1_iatf_list->MasterRecordExists) {
		if ($frm_fp_rep_ta_form_a_1_iatf->getCurrentMasterTable() == $frm_fp_rep_ta_form_a_1_iatf->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $frm_fp_rep_ta_form_a_1_iatf_header->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_fp_rep_ta_form_a_1_iatf_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Export == "") { ?>
<p class="upbudgetofficeclass"><a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></p>
<?php } ?>
<?php include_once "frm_fp_rep_ta_form_a_1_iatf_headermaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_fp_rep_ta_form_a_1_iatf_list->TotalRecs = $frm_fp_rep_ta_form_a_1_iatf->SelectRecordCount();
	} else {
		if ($frm_fp_rep_ta_form_a_1_iatf_list->Recordset = $frm_fp_rep_ta_form_a_1_iatf_list->LoadRecordset())
			$frm_fp_rep_ta_form_a_1_iatf_list->TotalRecs = $frm_fp_rep_ta_form_a_1_iatf_list->Recordset->RecordCount();
	}
	$frm_fp_rep_ta_form_a_1_iatf_list->StartRec = 1;
	if ($frm_fp_rep_ta_form_a_1_iatf_list->DisplayRecs <= 0 || ($frm_fp_rep_ta_form_a_1_iatf->Export <> "" && $frm_fp_rep_ta_form_a_1_iatf->ExportAll)) // Display all records
		$frm_fp_rep_ta_form_a_1_iatf_list->DisplayRecs = $frm_fp_rep_ta_form_a_1_iatf_list->TotalRecs;
	if (!($frm_fp_rep_ta_form_a_1_iatf->Export <> "" && $frm_fp_rep_ta_form_a_1_iatf->ExportAll))
		$frm_fp_rep_ta_form_a_1_iatf_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_fp_rep_ta_form_a_1_iatf_list->Recordset = $frm_fp_rep_ta_form_a_1_iatf_list->LoadRecordset($frm_fp_rep_ta_form_a_1_iatf_list->StartRec-1, $frm_fp_rep_ta_form_a_1_iatf_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_rep_ta_form_a_1_iatf->TableCaption() ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->getCurrentMasterTable() == "") { ?>
&nbsp;&nbsp;<?php $frm_fp_rep_ta_form_a_1_iatf_list->ExportOptions->Render("body"); ?>
<?php } ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Export == "" && $frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_fp_rep_ta_form_a_1_iatf_list);" style="text-decoration: none;"><img id="frm_fp_rep_ta_form_a_1_iatf_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_fp_rep_ta_form_a_1_iatf_list_SearchPanel">
<form name="ffrm_fp_rep_ta_form_a_1_iatflistsrch" id="ffrm_fp_rep_ta_form_a_1_iatflistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_fp_rep_ta_form_a_1_iatf">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1_iatf->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_fp_rep_ta_form_a_1_iatf->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_fp_rep_ta_form_a_1_iatf->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_fp_rep_ta_form_a_1_iatf->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_fp_rep_ta_form_a_1_iatf_list->ShowPageHeader(); ?>
<?php
$frm_fp_rep_ta_form_a_1_iatf_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "gridadd" && $frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_fp_rep_ta_form_a_1_iatf_list->Pager)) $frm_fp_rep_ta_form_a_1_iatf_list->Pager = new cPrevNextPager($frm_fp_rep_ta_form_a_1_iatf_list->StartRec, $frm_fp_rep_ta_form_a_1_iatf_list->DisplayRecs, $frm_fp_rep_ta_form_a_1_iatf_list->TotalRecs) ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_fp_rep_ta_form_a_1_iatf_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->PageUrl() ?>start=<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_fp_rep_ta_form_a_1_iatf_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->PageUrl() ?>start=<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_fp_rep_ta_form_a_1_iatf_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->PageUrl() ?>start=<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_fp_rep_ta_form_a_1_iatf_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->PageUrl() ?>start=<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf_list->SearchWhere == "0=101") { ?>
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
<form name="ffrm_fp_rep_ta_form_a_1_iatflist" id="ffrm_fp_rep_ta_form_a_1_iatflist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_fp_rep_ta_form_a_1_iatf">
<div id="gmp_frm_fp_rep_ta_form_a_1_iatf" class="upGridMiddlePanel">
<?php if ($frm_fp_rep_ta_form_a_1_iatf_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_fp_rep_ta_form_a_1_iatf->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_fp_rep_ta_form_a_1_iatf_list->RenderListOptions();

// Render list options (header, left)
$frm_fp_rep_ta_form_a_1_iatf_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->Visible) { // Responsible Bureaus (1) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->MFOs->Visible) { // MFOs ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->MFOs) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->MFOs) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->MFOs->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->MFOs->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->Visible) { // Performance Indicator 1 (2) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->Visible) { // FY 2015 TARGET for Performance Indicator 1 (3) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->Visible) { // Performance Indicator 2 (5) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->Visible) { // FY 2015 TARGET for Performance Indicator 2 (6) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->Visible) { // Performance Indicator 3 (8) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->Visible) { // FY 2015 TARGET for Performance Indicator 3 (9) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->Visible) { // Performance Indicator 4 (11) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->Visible) { // FY 2015 TARGET for Performance Indicator 4 (12) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->Visible) { // Performance Indicator 5 (14) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->Visible) { // FY 2015 TARGET for Performance Indicator 5 (15) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->Visible) { // Performance Indicator 6 (17) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->Visible) { // FY 2015 TARGET for Performance Indicator 6 (18) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->Visible) { // Performance Indicator 7 (20) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->Visible) { // FY 2015 TARGET for Performance Indicator 7 (21) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->Visible) { // Performance Indicator 8 (23) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->Visible) { // FY 2015 TARGET for Performance Indicator 8 (24) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->Visible) { // Performance Indicator 9 (26) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->Visible) { // FY 2015 TARGET for Performance Indicator 9 (27) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->Visible) { // Performance Indicator 10 (29) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->Visible) { // FY 2015 TARGET for Performance Indicator 10 (30) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->Visible) { // Performance Indicator 11 (32) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->Visible) { // FY 2015 TARGET for Performance Indicator 11 (33) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->Visible) { // Performance Indicator 12 (35) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->Visible) { // FY 2015 TARGET for Performance Indicator 12 (36) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37) ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1_iatf->SortUrl($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_fp_rep_ta_form_a_1_iatf_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_fp_rep_ta_form_a_1_iatf->ExportAll && $frm_fp_rep_ta_form_a_1_iatf->Export <> "") {
	$frm_fp_rep_ta_form_a_1_iatf_list->StopRec = $frm_fp_rep_ta_form_a_1_iatf_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_fp_rep_ta_form_a_1_iatf_list->TotalRecs > $frm_fp_rep_ta_form_a_1_iatf_list->StartRec + $frm_fp_rep_ta_form_a_1_iatf_list->DisplayRecs - 1)
		$frm_fp_rep_ta_form_a_1_iatf_list->StopRec = $frm_fp_rep_ta_form_a_1_iatf_list->StartRec + $frm_fp_rep_ta_form_a_1_iatf_list->DisplayRecs - 1;
	else
		$frm_fp_rep_ta_form_a_1_iatf_list->StopRec = $frm_fp_rep_ta_form_a_1_iatf_list->TotalRecs;
}
$frm_fp_rep_ta_form_a_1_iatf_list->RecCnt = $frm_fp_rep_ta_form_a_1_iatf_list->StartRec - 1;
if ($frm_fp_rep_ta_form_a_1_iatf_list->Recordset && !$frm_fp_rep_ta_form_a_1_iatf_list->Recordset->EOF) {
	$frm_fp_rep_ta_form_a_1_iatf_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_fp_rep_ta_form_a_1_iatf_list->StartRec > 1)
		$frm_fp_rep_ta_form_a_1_iatf_list->Recordset->Move($frm_fp_rep_ta_form_a_1_iatf_list->StartRec - 1);
} elseif (!$frm_fp_rep_ta_form_a_1_iatf->AllowAddDeleteRow && $frm_fp_rep_ta_form_a_1_iatf_list->StopRec == 0) {
	$frm_fp_rep_ta_form_a_1_iatf_list->StopRec = $frm_fp_rep_ta_form_a_1_iatf->GridAddRowCount;
}

// Initialize aggregate
$frm_fp_rep_ta_form_a_1_iatf->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_fp_rep_ta_form_a_1_iatf->ResetAttrs();
$frm_fp_rep_ta_form_a_1_iatf_list->RenderRow();
$frm_fp_rep_ta_form_a_1_iatf_list->RowCnt = 0;
while ($frm_fp_rep_ta_form_a_1_iatf_list->RecCnt < $frm_fp_rep_ta_form_a_1_iatf_list->StopRec) {
	$frm_fp_rep_ta_form_a_1_iatf_list->RecCnt++;
	if (intval($frm_fp_rep_ta_form_a_1_iatf_list->RecCnt) >= intval($frm_fp_rep_ta_form_a_1_iatf_list->StartRec)) {
		$frm_fp_rep_ta_form_a_1_iatf_list->RowCnt++;

		// Set up key count
		$frm_fp_rep_ta_form_a_1_iatf_list->KeyCount = $frm_fp_rep_ta_form_a_1_iatf_list->RowIndex;

		// Init row class and style
		$frm_fp_rep_ta_form_a_1_iatf->ResetAttrs();
		$frm_fp_rep_ta_form_a_1_iatf->CssClass = "";
		if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridadd") {
		} else {
			$frm_fp_rep_ta_form_a_1_iatf_list->LoadRowValues($frm_fp_rep_ta_form_a_1_iatf_list->Recordset); // Load row values
		}
		$frm_fp_rep_ta_form_a_1_iatf->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_fp_rep_ta_form_a_1_iatf->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_fp_rep_ta_form_a_1_iatf_list->RenderRow();

		// Render list options
		$frm_fp_rep_ta_form_a_1_iatf_list->RenderListOptions();
?>
	<tr<?php echo $frm_fp_rep_ta_form_a_1_iatf->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_rep_ta_form_a_1_iatf_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->Visible) { // Responsible Bureaus (1) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ListViewValue() ?></div>
<a name="<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->PageObjName . "_row_" . $frm_fp_rep_ta_form_a_1_iatf_list->RowCnt ?>" id="<?php echo $frm_fp_rep_ta_form_a_1_iatf_list->PageObjName . "_row_" . $frm_fp_rep_ta_form_a_1_iatf_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->MFOs->Visible) { // MFOs ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->Visible) { // Performance Indicator 1 (2) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->Visible) { // FY 2015 TARGET for Performance Indicator 1 (3) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->Visible) { // Performance Indicator 2 (5) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->Visible) { // FY 2015 TARGET for Performance Indicator 2 (6) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->Visible) { // Performance Indicator 3 (8) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->Visible) { // FY 2015 TARGET for Performance Indicator 3 (9) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->Visible) { // Performance Indicator 4 (11) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->Visible) { // FY 2015 TARGET for Performance Indicator 4 (12) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->Visible) { // Performance Indicator 5 (14) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->Visible) { // FY 2015 TARGET for Performance Indicator 5 (15) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->Visible) { // Performance Indicator 6 (17) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->Visible) { // FY 2015 TARGET for Performance Indicator 6 (18) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->Visible) { // Performance Indicator 7 (20) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->Visible) { // FY 2015 TARGET for Performance Indicator 7 (21) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->Visible) { // Performance Indicator 8 (23) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->Visible) { // FY 2015 TARGET for Performance Indicator 8 (24) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->Visible) { // Performance Indicator 9 (26) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->Visible) { // FY 2015 TARGET for Performance Indicator 9 (27) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->Visible) { // Performance Indicator 10 (29) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->Visible) { // FY 2015 TARGET for Performance Indicator 10 (30) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->Visible) { // Performance Indicator 11 (32) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->Visible) { // FY 2015 TARGET for Performance Indicator 11 (33) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->Visible) { // Performance Indicator 12 (35) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->Visible) { // FY 2015 TARGET for Performance Indicator 12 (36) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_rep_ta_form_a_1_iatf_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "gridadd")
		$frm_fp_rep_ta_form_a_1_iatf_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_fp_rep_ta_form_a_1_iatf_list->Recordset)
	$frm_fp_rep_ta_form_a_1_iatf_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Export == "" && $frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_fp_rep_ta_form_a_1_iatf_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_fp_rep_ta_form_a_1_iatf_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_rep_ta_form_a_1_iatf_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_fp_rep_ta_form_a_1_iatf';

	// Page object name
	var $PageObjName = 'frm_fp_rep_ta_form_a_1_iatf_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_rep_ta_form_a_1_iatf;
		if ($frm_fp_rep_ta_form_a_1_iatf->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_rep_ta_form_a_1_iatf->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_rep_ta_form_a_1_iatf;
		if ($frm_fp_rep_ta_form_a_1_iatf->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_rep_ta_form_a_1_iatf->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_rep_ta_form_a_1_iatf->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_rep_ta_form_a_1_iatf_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_rep_ta_form_a_1_iatf)
		if (!isset($GLOBALS["frm_fp_rep_ta_form_a_1_iatf"])) {
			$GLOBALS["frm_fp_rep_ta_form_a_1_iatf"] = new cfrm_fp_rep_ta_form_a_1_iatf();
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_rep_ta_form_a_1_iatf"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_fp_rep_ta_form_a_1_iatfadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_fp_rep_ta_form_a_1_iatfdelete.php";
		$this->MultiUpdateUrl = "frm_fp_rep_ta_form_a_1_iatfupdate.php";

		// Table object (frm_fp_rep_ta_form_a_1_iatf_header)
		if (!isset($GLOBALS['frm_fp_rep_ta_form_a_1_iatf_header'])) $GLOBALS['frm_fp_rep_ta_form_a_1_iatf_header'] = new cfrm_fp_rep_ta_form_a_1_iatf_header();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_rep_ta_form_a_1_iatf', TRUE);

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
		global $frm_fp_rep_ta_form_a_1_iatf;

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

		// Get export parameters
		if (@$_GET["export"] <> "") {
			$frm_fp_rep_ta_form_a_1_iatf->Export = $_GET["export"];
		} elseif (up_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$frm_fp_rep_ta_form_a_1_iatf->Export = $_POST["exporttype"];
		} else {
			$frm_fp_rep_ta_form_a_1_iatf->setExportReturnUrl(up_CurrentUrl());
		}
		$gsExport = $frm_fp_rep_ta_form_a_1_iatf->Export; // Get export parameter, used in header
		$gsExportFile = $frm_fp_rep_ta_form_a_1_iatf->TableVar; // Get export file, used in header
		$Charset = (UP_CHARSET <> "") ? ";charset=" . UP_CHARSET : ""; // Charset used in header
		if ($frm_fp_rep_ta_form_a_1_iatf->Export == "csv") {
			header('Content-Type: application/csv' . $Charset);
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_fp_rep_ta_form_a_1_iatf->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_fp_rep_ta_form_a_1_iatf;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Set up master detail parameters
			$this->SetUpMasterParms();

			// Hide all options
			if ($frm_fp_rep_ta_form_a_1_iatf->Export <> "" ||
				$frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridadd" ||
				$frm_fp_rep_ta_form_a_1_iatf->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_fp_rep_ta_form_a_1_iatf->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_fp_rep_ta_form_a_1_iatf->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_fp_rep_ta_form_a_1_iatf->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_fp_rep_ta_form_a_1_iatf->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_fp_rep_ta_form_a_1_iatf->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_fp_rep_ta_form_a_1_iatf->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $frm_fp_rep_ta_form_a_1_iatf->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $frm_fp_rep_ta_form_a_1_iatf->getDetailFilter(); // Restore detail filter

		// Add master User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			if ($frm_fp_rep_ta_form_a_1_iatf->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_1_iatf_header")
				$this->DbMasterFilter = $frm_fp_rep_ta_form_a_1_iatf->AddMasterUserIDFilter($this->DbMasterFilter, "frm_fp_rep_ta_form_a_1_iatf_header"); // Add master User ID filter
		}
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($frm_fp_rep_ta_form_a_1_iatf->getMasterFilter() <> "" && $frm_fp_rep_ta_form_a_1_iatf->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_1_iatf_header") {
			global $frm_fp_rep_ta_form_a_1_iatf_header;
			$rsmaster = $frm_fp_rep_ta_form_a_1_iatf_header->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($frm_fp_rep_ta_form_a_1_iatf->getReturnUrl()); // Return to caller
			} else {
				$frm_fp_rep_ta_form_a_1_iatf_header->LoadListRowValues($rsmaster);
				$frm_fp_rep_ta_form_a_1_iatf_header->RowType = UP_ROWTYPE_MASTER; // Master row
				$frm_fp_rep_ta_form_a_1_iatf_header->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$frm_fp_rep_ta_form_a_1_iatf->setSessionWhere($sFilter);
		$frm_fp_rep_ta_form_a_1_iatf->CurrentFilter = "";

		// Export data only
		if (in_array($frm_fp_rep_ta_form_a_1_iatf->Export, array("html","word","excel","xml","csv","email","pdf"))) {
			$this->ExportData();
			if ($frm_fp_rep_ta_form_a_1_iatf->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_fp_rep_ta_form_a_1_iatf;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->MFOs, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629, $Keyword);
		if (is_numeric($Keyword)) $this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729, $Keyword);
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
		global $Security, $frm_fp_rep_ta_form_a_1_iatf;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_fp_rep_ta_form_a_1_iatf->BasicSearchKeyword;
		$sSearchType = $frm_fp_rep_ta_form_a_1_iatf->BasicSearchType;
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
			$frm_fp_rep_ta_form_a_1_iatf->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_fp_rep_ta_form_a_1_iatf->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_fp_rep_ta_form_a_1_iatf;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_fp_rep_ta_form_a_1_iatf->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_fp_rep_ta_form_a_1_iatf;
		$frm_fp_rep_ta_form_a_1_iatf->setSessionBasicSearchKeyword("");
		$frm_fp_rep_ta_form_a_1_iatf->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_fp_rep_ta_form_a_1_iatf;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_fp_rep_ta_form_a_1_iatf->BasicSearchKeyword = $frm_fp_rep_ta_form_a_1_iatf->getSessionBasicSearchKeyword();
			$frm_fp_rep_ta_form_a_1_iatf->BasicSearchType = $frm_fp_rep_ta_form_a_1_iatf->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_fp_rep_ta_form_a_1_iatf;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_fp_rep_ta_form_a_1_iatf->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_fp_rep_ta_form_a_1_iatf->CurrentOrderType = @$_GET["ordertype"];
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129); // Responsible Bureaus (1)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->MFOs); // MFOs
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229); // Performance Indicator 1 (2)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329); // FY 2015 TARGET for Performance Indicator 1 (3)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429); // FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529); // Performance Indicator 2 (5)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629); // FY 2015 TARGET for Performance Indicator 2 (6)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729); // FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829); // Performance Indicator 3 (8)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929); // FY 2015 TARGET for Performance Indicator 3 (9)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029); // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129); // Performance Indicator 4 (11)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229); // FY 2015 TARGET for Performance Indicator 4 (12)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329); // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429); // Performance Indicator 5 (14)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529); // FY 2015 TARGET for Performance Indicator 5 (15)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629); // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729); // Performance Indicator 6 (17)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829); // FY 2015 TARGET for Performance Indicator 6 (18)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929); // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029); // Performance Indicator 7 (20)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129); // FY 2015 TARGET for Performance Indicator 7 (21)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229); // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329); // Performance Indicator 8 (23)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429); // FY 2015 TARGET for Performance Indicator 8 (24)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529); // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629); // Performance Indicator 9 (26)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729); // FY 2015 TARGET for Performance Indicator 9 (27)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829); // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929); // Performance Indicator 10 (29)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029); // FY 2015 TARGET for Performance Indicator 10 (30)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129); // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229); // Performance Indicator 11 (32)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329); // FY 2015 TARGET for Performance Indicator 11 (33)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429); // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529); // Performance Indicator 12 (35)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629); // FY 2015 TARGET for Performance Indicator 12 (36)
			$frm_fp_rep_ta_form_a_1_iatf->UpdateSort($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729); // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
			$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_fp_rep_ta_form_a_1_iatf;
		$sOrderBy = $frm_fp_rep_ta_form_a_1_iatf->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_fp_rep_ta_form_a_1_iatf->SqlOrderBy() <> "") {
				$sOrderBy = $frm_fp_rep_ta_form_a_1_iatf->SqlOrderBy();
				$frm_fp_rep_ta_form_a_1_iatf->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_fp_rep_ta_form_a_1_iatf;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$frm_fp_rep_ta_form_a_1_iatf->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$frm_fp_rep_ta_form_a_1_iatf->units_id->setSessionValue("");
				$frm_fp_rep_ta_form_a_1_iatf->focal_person_id->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_fp_rep_ta_form_a_1_iatf->setSessionOrderBy($sOrderBy);
				$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->MFOs->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->setSort("");
				$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_fp_rep_ta_form_a_1_iatf;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_fp_rep_ta_form_a_1_iatf, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_fp_rep_ta_form_a_1_iatf;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_fp_rep_ta_form_a_1_iatf;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_fp_rep_ta_form_a_1_iatf->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_fp_rep_ta_form_a_1_iatf;
		$frm_fp_rep_ta_form_a_1_iatf->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_fp_rep_ta_form_a_1_iatf->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_fp_rep_ta_form_a_1_iatf;

		// Call Recordset Selecting event
		$frm_fp_rep_ta_form_a_1_iatf->Recordset_Selecting($frm_fp_rep_ta_form_a_1_iatf->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_fp_rep_ta_form_a_1_iatf->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_fp_rep_ta_form_a_1_iatf->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_rep_ta_form_a_1_iatf;
		$sFilter = $frm_fp_rep_ta_form_a_1_iatf->KeyFilter();

		// Call Row Selecting event
		$frm_fp_rep_ta_form_a_1_iatf->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_rep_ta_form_a_1_iatf->CurrentFilter = $sFilter;
		$sSql = $frm_fp_rep_ta_form_a_1_iatf->SQL();
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
		global $conn, $frm_fp_rep_ta_form_a_1_iatf;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_rep_ta_form_a_1_iatf->Row_Selected($row);
		$frm_fp_rep_ta_form_a_1_iatf->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_rep_ta_form_a_1_iatf->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_rep_ta_form_a_1_iatf->Constituent_University->setDbValue($rs->fields('Constituent University'));
		$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->setDbValue($rs->fields('Responsible Bureaus (1)'));
		$frm_fp_rep_ta_form_a_1_iatf->MFOs->setDbValue($rs->fields('MFOs'));
		$frm_fp_rep_ta_form_a_1_iatf->form_a_1_mfo->setDbValue($rs->fields('form_a_1_mfo'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->setDbValue($rs->fields('Performance Indicator 1 (2)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 1 (3)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->setDbValue($rs->fields('Performance Indicator 2 (5)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 2 (6)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->setDbValue($rs->fields('Performance Indicator 3 (8)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 3 (9)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->setDbValue($rs->fields('Performance Indicator 4 (11)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 4 (12)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->setDbValue($rs->fields('Performance Indicator 5 (14)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 5 (15)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->setDbValue($rs->fields('Performance Indicator 6 (17)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 6 (18)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->setDbValue($rs->fields('Performance Indicator 7 (20)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 7 (21)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->setDbValue($rs->fields('Performance Indicator 8 (23)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 8 (24)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->setDbValue($rs->fields('Performance Indicator 9 (26)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 9 (27)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->setDbValue($rs->fields('Performance Indicator 10 (29)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 10 (30)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->setDbValue($rs->fields('Performance Indicator 11 (32)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 11 (33)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)'));
		$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->setDbValue($rs->fields('Performance Indicator 12 (35)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 12 (36)'));
		$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_fp_rep_ta_form_a_1_iatf;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$frm_fp_rep_ta_form_a_1_iatf->CurrentFilter = $frm_fp_rep_ta_form_a_1_iatf->KeyFilter();
			$sSql = $frm_fp_rep_ta_form_a_1_iatf->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_rep_ta_form_a_1_iatf;

		// Initialize URLs
		$this->ViewUrl = $frm_fp_rep_ta_form_a_1_iatf->ViewUrl();
		$this->EditUrl = $frm_fp_rep_ta_form_a_1_iatf->EditUrl();
		$this->InlineEditUrl = $frm_fp_rep_ta_form_a_1_iatf->InlineEditUrl();
		$this->CopyUrl = $frm_fp_rep_ta_form_a_1_iatf->CopyUrl();
		$this->InlineCopyUrl = $frm_fp_rep_ta_form_a_1_iatf->InlineCopyUrl();
		$this->DeleteUrl = $frm_fp_rep_ta_form_a_1_iatf->DeleteUrl();

		// Call Row_Rendering event
		$frm_fp_rep_ta_form_a_1_iatf->Row_Rendering();

		// Common render codes for all row types
		// units_id

		$frm_fp_rep_ta_form_a_1_iatf->units_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$frm_fp_rep_ta_form_a_1_iatf->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// Constituent University
		$frm_fp_rep_ta_form_a_1_iatf->Constituent_University->CellCssStyle = "white-space: nowrap;";

		// Responsible Bureaus (1)
		// MFOs
		// form_a_1_mfo

		$frm_fp_rep_ta_form_a_1_iatf->form_a_1_mfo->CellCssStyle = "white-space: nowrap;";

		// Performance Indicator 1 (2)
		// FY 2015 TARGET for Performance Indicator 1 (3)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
		// Performance Indicator 2 (5)
		// FY 2015 TARGET for Performance Indicator 2 (6)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
		// Performance Indicator 3 (8)
		// FY 2015 TARGET for Performance Indicator 3 (9)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
		// Performance Indicator 4 (11)
		// FY 2015 TARGET for Performance Indicator 4 (12)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
		// Performance Indicator 5 (14)
		// FY 2015 TARGET for Performance Indicator 5 (15)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
		// Performance Indicator 6 (17)
		// FY 2015 TARGET for Performance Indicator 6 (18)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
		// Performance Indicator 7 (20)
		// FY 2015 TARGET for Performance Indicator 7 (21)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
		// Performance Indicator 8 (23)
		// FY 2015 TARGET for Performance Indicator 8 (24)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
		// Performance Indicator 9 (26)
		// FY 2015 TARGET for Performance Indicator 9 (27)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
		// Performance Indicator 10 (29)
		// FY 2015 TARGET for Performance Indicator 10 (30)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
		// Performance Indicator 11 (32)
		// FY 2015 TARGET for Performance Indicator 11 (33)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
		// Performance Indicator 12 (35)
		// FY 2015 TARGET for Performance Indicator 12 (36)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)

		if ($frm_fp_rep_ta_form_a_1_iatf->RowType == UP_ROWTYPE_VIEW) { // View row

			// Responsible Bureaus (1)
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ViewCustomAttributes = "";

			// MFOs
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->MFOs->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->ViewCustomAttributes = "";

			// Performance Indicator 1 (2)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 1 (3)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ViewCustomAttributes = "";

			// Performance Indicator 2 (5)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 2 (6)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ViewCustomAttributes = "";

			// Performance Indicator 3 (8)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 3 (9)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ViewCustomAttributes = "";

			// Performance Indicator 4 (11)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 4 (12)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ViewCustomAttributes = "";

			// Performance Indicator 5 (14)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 5 (15)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ViewCustomAttributes = "";

			// Performance Indicator 6 (17)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 6 (18)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ViewCustomAttributes = "";

			// Performance Indicator 7 (20)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 7 (21)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ViewCustomAttributes = "";

			// Performance Indicator 8 (23)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 8 (24)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ViewCustomAttributes = "";

			// Performance Indicator 9 (26)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 9 (27)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ViewCustomAttributes = "";

			// Performance Indicator 10 (29)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 10 (30)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ViewCustomAttributes = "";

			// Performance Indicator 11 (32)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 11 (33)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ViewCustomAttributes = "";

			// Performance Indicator 12 (35)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ViewCustomAttributes = "";

			// FY 2015 TARGET for Performance Indicator 12 (36)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ViewCustomAttributes = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ViewValue = $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CurrentValue;
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ViewCustomAttributes = "";

			// Responsible Bureaus (1)
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->TooltipValue = "";

			// MFOs
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->MFOs->TooltipValue = "";

			// Performance Indicator 1 (2)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 1 (3)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->TooltipValue = "";

			// Performance Indicator 2 (5)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 2 (6)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->TooltipValue = "";

			// Performance Indicator 3 (8)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 3 (9)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->TooltipValue = "";

			// Performance Indicator 4 (11)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 4 (12)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->TooltipValue = "";

			// Performance Indicator 5 (14)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 5 (15)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->TooltipValue = "";

			// Performance Indicator 6 (17)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 6 (18)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->TooltipValue = "";

			// Performance Indicator 7 (20)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 7 (21)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->TooltipValue = "";

			// Performance Indicator 8 (23)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 8 (24)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->TooltipValue = "";

			// Performance Indicator 9 (26)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 9 (27)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->TooltipValue = "";

			// Performance Indicator 10 (29)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 10 (30)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->TooltipValue = "";

			// Performance Indicator 11 (32)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 11 (33)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->TooltipValue = "";

			// Performance Indicator 12 (35)
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->TooltipValue = "";

			// FY 2015 TARGET for Performance Indicator 12 (36)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->TooltipValue = "";

			// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_fp_rep_ta_form_a_1_iatf->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_rep_ta_form_a_1_iatf->Row_Rendered();
	}

	// Set up export options
	function SetupExportOptions() {
		global $Language, $frm_fp_rep_ta_form_a_1_iatf;

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
		$item->Visible = TRUE;

		// Export to Pdf
		$item =& $this->ExportOptions->Add("pdf");
		$item->Body = "<a href=\"" . $this->ExportPdfUrl . "\">" . $Language->Phrase("ExportToPDF") . "</a>";
		$item->Visible = FALSE;

		// Export to Email
		$item =& $this->ExportOptions->Add("email");
		$item->Body = "<a name=\"emf_frm_fp_rep_ta_form_a_1_iatf\" id=\"emf_frm_fp_rep_ta_form_a_1_iatf\" href=\"javascript:void(0);\" onclick=\"up_EmailDialogShow({lnk:'emf_frm_fp_rep_ta_form_a_1_iatf',hdr:upLanguage.Phrase('ExportToEmail'),f:document.ffrm_fp_rep_ta_form_a_1_iatflist,sel:false});\">" . $Language->Phrase("ExportToEmail") . "</a>";
		$item->Visible = FALSE;

		// Hide options for export/action
		if ($frm_fp_rep_ta_form_a_1_iatf->Export <> "" ||
			$frm_fp_rep_ta_form_a_1_iatf->CurrentAction <> "")
			$this->ExportOptions->HideAllOptions();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	function ExportData() {
		global $frm_fp_rep_ta_form_a_1_iatf;
		$utf8 = (strtolower(UP_CHARSET) == "utf-8");
		$bSelectLimit = UP_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->TotalRecs = $frm_fp_rep_ta_form_a_1_iatf->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;

		// Export all
		if ($frm_fp_rep_ta_form_a_1_iatf->ExportAll) {
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
		if ($frm_fp_rep_ta_form_a_1_iatf->Export == "xml") {
			$XmlDoc = new cXMLDocument(UP_XML_ENCODING);
		} else {
			$ExportDoc = new cExportDocument($frm_fp_rep_ta_form_a_1_iatf, "h");
		}
		$ParentTable = "";

		// Export master record
		if (UP_EXPORT_MASTER_RECORD && $frm_fp_rep_ta_form_a_1_iatf->getMasterFilter() <> "" && $frm_fp_rep_ta_form_a_1_iatf->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_1_iatf_header") {
			global $frm_fp_rep_ta_form_a_1_iatf_header;
			$rsmaster = $frm_fp_rep_ta_form_a_1_iatf_header->LoadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				if ($frm_fp_rep_ta_form_a_1_iatf->Export == "xml") {
					$ParentTable = "frm_fp_rep_ta_form_a_1_iatf_header";
					$frm_fp_rep_ta_form_a_1_iatf_header->ExportXmlDocument($XmlDoc, '', $rsmaster, 1, 1);
				} else {
					$ExportStyle = $ExportDoc->Style;
					$ExportDoc->ChangeStyle("v"); // Change to vertical
					if ($frm_fp_rep_ta_form_a_1_iatf->Export <> "csv" || UP_EXPORT_MASTER_RECORD_FOR_CSV) {
						$frm_fp_rep_ta_form_a_1_iatf_header->ExportDocument($ExportDoc, $rsmaster, 1, 1);
						$ExportDoc->ExportEmptyLine();
					}
					$ExportDoc->ChangeStyle($ExportStyle); // Restore
				}
				$rsmaster->Close();
			}
		}
		if ($bSelectLimit) {
			$StartRec = 1;
			$StopRec = $this->DisplayRecs;
		} else {
			$StartRec = $this->StartRec;
			$StopRec = $this->StopRec;
		}
		if ($frm_fp_rep_ta_form_a_1_iatf->Export == "xml") {
			$frm_fp_rep_ta_form_a_1_iatf->ExportXmlDocument($XmlDoc, ($ParentTable <> ""), $rs, $StartRec, $StopRec, "");
		} else {
			$sHeader = $this->PageHeader;
			$this->Page_DataRendering($sHeader);
			$ExportDoc->Text .= $sHeader;
			$frm_fp_rep_ta_form_a_1_iatf->ExportDocument($ExportDoc, $rs, $StartRec, $StopRec, "");
			$sFooter = $this->PageFooter;
			$this->Page_DataRendered($sFooter);
			$ExportDoc->Text .= $sFooter;
		}

		// Close recordset
		$rs->Close();

		// Export header and footer
		if ($frm_fp_rep_ta_form_a_1_iatf->Export <> "xml") {
			$ExportDoc->ExportHeaderAndFooter();
		}

		// Clean output buffer
		if (!UP_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($frm_fp_rep_ta_form_a_1_iatf->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (UP_DEBUG_ENABLED)
			echo up_DebugMsg();

		// Output data
		if ($frm_fp_rep_ta_form_a_1_iatf->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($frm_fp_rep_ta_form_a_1_iatf->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($frm_fp_rep_ta_form_a_1_iatf->ExportReturnUrl());
		} elseif ($frm_fp_rep_ta_form_a_1_iatf->Export == "pdf") {
			$this->ExportPDF($ExportDoc->Text);
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_fp_rep_ta_form_a_1_iatf;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_fp_rep_ta_form_a_1_iatf;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "frm_fp_rep_ta_form_a_1_iatf_header") {
				$bValidMaster = TRUE;
				if (@$_GET["units_id"] <> "") {
					$GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->units_id->setQueryStringValue($_GET["units_id"]);
					$frm_fp_rep_ta_form_a_1_iatf->units_id->setQueryStringValue($GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->units_id->QueryStringValue);
					$frm_fp_rep_ta_form_a_1_iatf->units_id->setSessionValue($frm_fp_rep_ta_form_a_1_iatf->units_id->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->units_id->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
				if (@$_GET["focal_person_id"] <> "") {
					$GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->focal_person_id->setQueryStringValue($_GET["focal_person_id"]);
					$frm_fp_rep_ta_form_a_1_iatf->focal_person_id->setQueryStringValue($GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->focal_person_id->QueryStringValue);
					$frm_fp_rep_ta_form_a_1_iatf->focal_person_id->setSessionValue($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->focal_person_id->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$frm_fp_rep_ta_form_a_1_iatf->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$frm_fp_rep_ta_form_a_1_iatf->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "frm_fp_rep_ta_form_a_1_iatf_header") {
				if ($frm_fp_rep_ta_form_a_1_iatf->units_id->QueryStringValue == "") $frm_fp_rep_ta_form_a_1_iatf->units_id->setSessionValue("");
				if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->QueryStringValue == "") $frm_fp_rep_ta_form_a_1_iatf->focal_person_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $frm_fp_rep_ta_form_a_1_iatf->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_fp_rep_ta_form_a_1_iatf->getDetailFilter(); // Get detail filter
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