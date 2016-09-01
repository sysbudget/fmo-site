<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_sam_rep_a_monitor_above_100info.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_sam_rep_a_monitor_above_100_list = new cfrm_sam_rep_a_monitor_above_100_list();
$Page =& $frm_sam_rep_a_monitor_above_100_list;

// Page init
$frm_sam_rep_a_monitor_above_100_list->Page_Init();

// Page main
$frm_sam_rep_a_monitor_above_100_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_sam_rep_a_monitor_above_100->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_sam_rep_a_monitor_above_100_list = new up_Page("frm_sam_rep_a_monitor_above_100_list");

// page properties
frm_sam_rep_a_monitor_above_100_list.PageID = "list"; // page ID
frm_sam_rep_a_monitor_above_100_list.FormID = "ffrm_sam_rep_a_monitor_above_100list"; // form ID
var UP_PAGE_ID = frm_sam_rep_a_monitor_above_100_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_sam_rep_a_monitor_above_100_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_sam_rep_a_monitor_above_100_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_sam_rep_a_monitor_above_100_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_sam_rep_a_monitor_above_100_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_sam_rep_a_monitor_above_100->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_sam_rep_a_monitor_above_100->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_sam_rep_a_monitor_above_100_list->TotalRecs = $frm_sam_rep_a_monitor_above_100->SelectRecordCount();
	} else {
		if ($frm_sam_rep_a_monitor_above_100_list->Recordset = $frm_sam_rep_a_monitor_above_100_list->LoadRecordset())
			$frm_sam_rep_a_monitor_above_100_list->TotalRecs = $frm_sam_rep_a_monitor_above_100_list->Recordset->RecordCount();
	}
	$frm_sam_rep_a_monitor_above_100_list->StartRec = 1;
	if ($frm_sam_rep_a_monitor_above_100_list->DisplayRecs <= 0 || ($frm_sam_rep_a_monitor_above_100->Export <> "" && $frm_sam_rep_a_monitor_above_100->ExportAll)) // Display all records
		$frm_sam_rep_a_monitor_above_100_list->DisplayRecs = $frm_sam_rep_a_monitor_above_100_list->TotalRecs;
	if (!($frm_sam_rep_a_monitor_above_100->Export <> "" && $frm_sam_rep_a_monitor_above_100->ExportAll))
		$frm_sam_rep_a_monitor_above_100_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_sam_rep_a_monitor_above_100_list->Recordset = $frm_sam_rep_a_monitor_above_100_list->LoadRecordset($frm_sam_rep_a_monitor_above_100_list->StartRec-1, $frm_sam_rep_a_monitor_above_100_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_sam_rep_a_monitor_above_100->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_sam_rep_a_monitor_above_100_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_sam_rep_a_monitor_above_100->Export == "" && $frm_sam_rep_a_monitor_above_100->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_sam_rep_a_monitor_above_100_list);" style="text-decoration: none;"><img id="frm_sam_rep_a_monitor_above_100_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_sam_rep_a_monitor_above_100_list_SearchPanel">
<form name="ffrm_sam_rep_a_monitor_above_100listsrch" id="ffrm_sam_rep_a_monitor_above_100listsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_sam_rep_a_monitor_above_100">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_sam_rep_a_monitor_above_100->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_sam_rep_a_monitor_above_100_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_sam_rep_a_monitor_above_100->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_sam_rep_a_monitor_above_100->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_sam_rep_a_monitor_above_100->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_sam_rep_a_monitor_above_100_list->ShowPageHeader(); ?>
<?php
$frm_sam_rep_a_monitor_above_100_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_sam_rep_a_monitor_above_100->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_sam_rep_a_monitor_above_100->CurrentAction <> "gridadd" && $frm_sam_rep_a_monitor_above_100->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_sam_rep_a_monitor_above_100_list->Pager)) $frm_sam_rep_a_monitor_above_100_list->Pager = new cPrevNextPager($frm_sam_rep_a_monitor_above_100_list->StartRec, $frm_sam_rep_a_monitor_above_100_list->DisplayRecs, $frm_sam_rep_a_monitor_above_100_list->TotalRecs) ?>
<?php if ($frm_sam_rep_a_monitor_above_100_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_sam_rep_a_monitor_above_100_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_sam_rep_a_monitor_above_100_list->PageUrl() ?>start=<?php echo $frm_sam_rep_a_monitor_above_100_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_sam_rep_a_monitor_above_100_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_sam_rep_a_monitor_above_100_list->PageUrl() ?>start=<?php echo $frm_sam_rep_a_monitor_above_100_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_sam_rep_a_monitor_above_100_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_sam_rep_a_monitor_above_100_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_sam_rep_a_monitor_above_100_list->PageUrl() ?>start=<?php echo $frm_sam_rep_a_monitor_above_100_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_sam_rep_a_monitor_above_100_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_sam_rep_a_monitor_above_100_list->PageUrl() ?>start=<?php echo $frm_sam_rep_a_monitor_above_100_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_sam_rep_a_monitor_above_100_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_sam_rep_a_monitor_above_100_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_sam_rep_a_monitor_above_100_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_sam_rep_a_monitor_above_100_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_sam_rep_a_monitor_above_100_list->SearchWhere == "0=101") { ?>
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
<form name="ffrm_sam_rep_a_monitor_above_100list" id="ffrm_sam_rep_a_monitor_above_100list" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_sam_rep_a_monitor_above_100">
<div id="gmp_frm_sam_rep_a_monitor_above_100" class="upGridMiddlePanel">
<?php if ($frm_sam_rep_a_monitor_above_100_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_sam_rep_a_monitor_above_100->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_sam_rep_a_monitor_above_100_list->RenderListOptions();

// Render list options (header, left)
$frm_sam_rep_a_monitor_above_100_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_sam_rep_a_monitor_above_100->Delivery_Unit->Visible) { // Delivery Unit ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Delivery_Unit) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->Delivery_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Delivery_Unit) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->Delivery_Unit->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->Delivery_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->Delivery_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->MFO->Visible) { // MFO ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->MFO) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->MFO->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->MFO) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->MFO->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->MFO->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->MFO->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->Question->Visible) { // Question ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Question) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->Question->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Question) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->Question->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->Question->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->Question->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->Target->Visible) { // Target ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Target) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->Target->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Target) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->Target->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->Target->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->Target->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->Visible) { // Target Numerator (TN) ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->Visible) { // Target Denominator (TD) ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->Accomplishment->Visible) { // Accomplishment ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Accomplishment) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Accomplishment) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->Accomplishment->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->Accomplishment->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->Visible) { // Accomplishment Numerator (AN) ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->Visible) { // Accomplishment Denominator (AD) ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->Visible) { // Performance Rating (PR) ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->PR_Below_9025->Visible) { // PR Below 90% ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->PR_Below_9025) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->PR_Below_9025->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->PR_Below_9025) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->PR_Below_9025->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->PR_Below_9025->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->PR_Below_9025->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->Visible) { // PR 90% and Above ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->PR_9025_and_Above) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->PR_9025_and_Above) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->Visible) { // Over 110 Performance Rating ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->Visible) { // Numerator Difference (AN - TN) ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->Visible) { // AN is higher than TD (AN - TD) ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_sam_rep_a_monitor_above_100->SortUrl($frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_sam_rep_a_monitor_above_100_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_sam_rep_a_monitor_above_100->ExportAll && $frm_sam_rep_a_monitor_above_100->Export <> "") {
	$frm_sam_rep_a_monitor_above_100_list->StopRec = $frm_sam_rep_a_monitor_above_100_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_sam_rep_a_monitor_above_100_list->TotalRecs > $frm_sam_rep_a_monitor_above_100_list->StartRec + $frm_sam_rep_a_monitor_above_100_list->DisplayRecs - 1)
		$frm_sam_rep_a_monitor_above_100_list->StopRec = $frm_sam_rep_a_monitor_above_100_list->StartRec + $frm_sam_rep_a_monitor_above_100_list->DisplayRecs - 1;
	else
		$frm_sam_rep_a_monitor_above_100_list->StopRec = $frm_sam_rep_a_monitor_above_100_list->TotalRecs;
}
$frm_sam_rep_a_monitor_above_100_list->RecCnt = $frm_sam_rep_a_monitor_above_100_list->StartRec - 1;
if ($frm_sam_rep_a_monitor_above_100_list->Recordset && !$frm_sam_rep_a_monitor_above_100_list->Recordset->EOF) {
	$frm_sam_rep_a_monitor_above_100_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_sam_rep_a_monitor_above_100_list->StartRec > 1)
		$frm_sam_rep_a_monitor_above_100_list->Recordset->Move($frm_sam_rep_a_monitor_above_100_list->StartRec - 1);
} elseif (!$frm_sam_rep_a_monitor_above_100->AllowAddDeleteRow && $frm_sam_rep_a_monitor_above_100_list->StopRec == 0) {
	$frm_sam_rep_a_monitor_above_100_list->StopRec = $frm_sam_rep_a_monitor_above_100->GridAddRowCount;
}

// Initialize aggregate
$frm_sam_rep_a_monitor_above_100->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_sam_rep_a_monitor_above_100->ResetAttrs();
$frm_sam_rep_a_monitor_above_100_list->RenderRow();
$frm_sam_rep_a_monitor_above_100_list->RowCnt = 0;
while ($frm_sam_rep_a_monitor_above_100_list->RecCnt < $frm_sam_rep_a_monitor_above_100_list->StopRec) {
	$frm_sam_rep_a_monitor_above_100_list->RecCnt++;
	if (intval($frm_sam_rep_a_monitor_above_100_list->RecCnt) >= intval($frm_sam_rep_a_monitor_above_100_list->StartRec)) {
		$frm_sam_rep_a_monitor_above_100_list->RowCnt++;

		// Set up key count
		$frm_sam_rep_a_monitor_above_100_list->KeyCount = $frm_sam_rep_a_monitor_above_100_list->RowIndex;

		// Init row class and style
		$frm_sam_rep_a_monitor_above_100->ResetAttrs();
		$frm_sam_rep_a_monitor_above_100->CssClass = "";
		if ($frm_sam_rep_a_monitor_above_100->CurrentAction == "gridadd") {
		} else {
			$frm_sam_rep_a_monitor_above_100_list->LoadRowValues($frm_sam_rep_a_monitor_above_100_list->Recordset); // Load row values
		}
		$frm_sam_rep_a_monitor_above_100->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_sam_rep_a_monitor_above_100->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_sam_rep_a_monitor_above_100_list->RenderRow();

		// Render list options
		$frm_sam_rep_a_monitor_above_100_list->RenderListOptions();
?>
	<tr<?php echo $frm_sam_rep_a_monitor_above_100->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_sam_rep_a_monitor_above_100_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_sam_rep_a_monitor_above_100->Delivery_Unit->Visible) { // Delivery Unit ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->Delivery_Unit->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Delivery_Unit->ListViewValue() ?></div>
<a name="<?php echo $frm_sam_rep_a_monitor_above_100_list->PageObjName . "_row_" . $frm_sam_rep_a_monitor_above_100_list->RowCnt ?>" id="<?php echo $frm_sam_rep_a_monitor_above_100_list->PageObjName . "_row_" . $frm_sam_rep_a_monitor_above_100_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->MFO->Visible) { // MFO ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->MFO->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->MFO->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->MFO->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->Question->Visible) { // Question ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->Question->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Question->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Question->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->Target->Visible) { // Target ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->Target->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Target->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Target->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->Visible) { // Target Numerator (TN) ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->Visible) { // Target Denominator (TD) ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->Accomplishment->Visible) { // Accomplishment ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->Visible) { // Accomplishment Numerator (AN) ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->Visible) { // Accomplishment Denominator (AD) ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->Visible) { // Performance Rating (PR) ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->PR_Below_9025->Visible) { // PR Below 90% ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->PR_Below_9025->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->PR_Below_9025->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->PR_Below_9025->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->Visible) { // PR 90% and Above ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->Visible) { // Over 110 Performance Rating ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->Visible) { // Numerator Difference (AN - TN) ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->Visible) { // AN is higher than TD (AN - TD) ?>
		<td<?php echo $frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_sam_rep_a_monitor_above_100_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_sam_rep_a_monitor_above_100->CurrentAction <> "gridadd")
		$frm_sam_rep_a_monitor_above_100_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_sam_rep_a_monitor_above_100_list->Recordset)
	$frm_sam_rep_a_monitor_above_100_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_sam_rep_a_monitor_above_100->Export == "" && $frm_sam_rep_a_monitor_above_100->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_sam_rep_a_monitor_above_100_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_sam_rep_a_monitor_above_100->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_sam_rep_a_monitor_above_100_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_sam_rep_a_monitor_above_100_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_sam_rep_a_monitor_above_100';

	// Page object name
	var $PageObjName = 'frm_sam_rep_a_monitor_above_100_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_sam_rep_a_monitor_above_100;
		if ($frm_sam_rep_a_monitor_above_100->UseTokenInUrl) $PageUrl .= "t=" . $frm_sam_rep_a_monitor_above_100->TableVar . "&"; // Add page token
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
		global $objForm, $frm_sam_rep_a_monitor_above_100;
		if ($frm_sam_rep_a_monitor_above_100->UseTokenInUrl) {
			if ($objForm)
				return ($frm_sam_rep_a_monitor_above_100->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_sam_rep_a_monitor_above_100->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_sam_rep_a_monitor_above_100_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_sam_rep_a_monitor_above_100)
		if (!isset($GLOBALS["frm_sam_rep_a_monitor_above_100"])) {
			$GLOBALS["frm_sam_rep_a_monitor_above_100"] = new cfrm_sam_rep_a_monitor_above_100();
			$GLOBALS["Table"] =& $GLOBALS["frm_sam_rep_a_monitor_above_100"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_sam_rep_a_monitor_above_100add.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_sam_rep_a_monitor_above_100delete.php";
		$this->MultiUpdateUrl = "frm_sam_rep_a_monitor_above_100update.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_sam_rep_a_monitor_above_100', TRUE);

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
		global $frm_sam_rep_a_monitor_above_100;

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
			$frm_sam_rep_a_monitor_above_100->Export = $_GET["export"];
		} elseif (up_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$frm_sam_rep_a_monitor_above_100->Export = $_POST["exporttype"];
		} else {
			$frm_sam_rep_a_monitor_above_100->setExportReturnUrl(up_CurrentUrl());
		}
		$gsExport = $frm_sam_rep_a_monitor_above_100->Export; // Get export parameter, used in header
		$gsExportFile = $frm_sam_rep_a_monitor_above_100->TableVar; // Get export file, used in header
		$Charset = (UP_CHARSET <> "") ? ";charset=" . UP_CHARSET : ""; // Charset used in header
		if ($frm_sam_rep_a_monitor_above_100->Export == "csv") {
			header('Content-Type: application/csv' . $Charset);
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_sam_rep_a_monitor_above_100->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_sam_rep_a_monitor_above_100;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($frm_sam_rep_a_monitor_above_100->Export <> "" ||
				$frm_sam_rep_a_monitor_above_100->CurrentAction == "gridadd" ||
				$frm_sam_rep_a_monitor_above_100->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_sam_rep_a_monitor_above_100->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_sam_rep_a_monitor_above_100->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_sam_rep_a_monitor_above_100->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_sam_rep_a_monitor_above_100->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_sam_rep_a_monitor_above_100->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_sam_rep_a_monitor_above_100->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_sam_rep_a_monitor_above_100->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$frm_sam_rep_a_monitor_above_100->setSessionWhere($sFilter);
		$frm_sam_rep_a_monitor_above_100->CurrentFilter = "";

		// Export data only
		if (in_array($frm_sam_rep_a_monitor_above_100->Export, array("html","word","excel","xml","csv","email","pdf"))) {
			$this->ExportData();
			if ($frm_sam_rep_a_monitor_above_100->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_sam_rep_a_monitor_above_100;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_sam_rep_a_monitor_above_100->Delivery_Unit, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_sam_rep_a_monitor_above_100->MFO, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_sam_rep_a_monitor_above_100->Question, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating, $Keyword);
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
		global $Security, $frm_sam_rep_a_monitor_above_100;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_sam_rep_a_monitor_above_100->BasicSearchKeyword;
		$sSearchType = $frm_sam_rep_a_monitor_above_100->BasicSearchType;
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
			$frm_sam_rep_a_monitor_above_100->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_sam_rep_a_monitor_above_100->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_sam_rep_a_monitor_above_100;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_sam_rep_a_monitor_above_100->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_sam_rep_a_monitor_above_100;
		$frm_sam_rep_a_monitor_above_100->setSessionBasicSearchKeyword("");
		$frm_sam_rep_a_monitor_above_100->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_sam_rep_a_monitor_above_100;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_sam_rep_a_monitor_above_100->BasicSearchKeyword = $frm_sam_rep_a_monitor_above_100->getSessionBasicSearchKeyword();
			$frm_sam_rep_a_monitor_above_100->BasicSearchType = $frm_sam_rep_a_monitor_above_100->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_sam_rep_a_monitor_above_100;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_sam_rep_a_monitor_above_100->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_sam_rep_a_monitor_above_100->CurrentOrderType = @$_GET["ordertype"];
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->Delivery_Unit); // Delivery Unit
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->MFO); // MFO
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->Question); // Question
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->Target); // Target
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29); // Target Numerator (TN)
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29); // Target Denominator (TD)
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->Accomplishment); // Accomplishment
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29); // Accomplishment Numerator (AN)
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29); // Accomplishment Denominator (AD)
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29); // Performance Rating (PR)
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->PR_Below_9025); // PR Below 90%
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->PR_9025_and_Above); // PR 90% and Above
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating); // Over 110 Performance Rating
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29); // Numerator Difference (AN - TN)
			$frm_sam_rep_a_monitor_above_100->UpdateSort($frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29); // AN is higher than TD (AN - TD)
			$frm_sam_rep_a_monitor_above_100->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_sam_rep_a_monitor_above_100;
		$sOrderBy = $frm_sam_rep_a_monitor_above_100->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_sam_rep_a_monitor_above_100->SqlOrderBy() <> "") {
				$sOrderBy = $frm_sam_rep_a_monitor_above_100->SqlOrderBy();
				$frm_sam_rep_a_monitor_above_100->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_sam_rep_a_monitor_above_100;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_sam_rep_a_monitor_above_100->setSessionOrderBy($sOrderBy);
				$frm_sam_rep_a_monitor_above_100->Delivery_Unit->setSort("");
				$frm_sam_rep_a_monitor_above_100->MFO->setSort("");
				$frm_sam_rep_a_monitor_above_100->Question->setSort("");
				$frm_sam_rep_a_monitor_above_100->Target->setSort("");
				$frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->setSort("");
				$frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->setSort("");
				$frm_sam_rep_a_monitor_above_100->Accomplishment->setSort("");
				$frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->setSort("");
				$frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->setSort("");
				$frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->setSort("");
				$frm_sam_rep_a_monitor_above_100->PR_Below_9025->setSort("");
				$frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->setSort("");
				$frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->setSort("");
				$frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->setSort("");
				$frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_sam_rep_a_monitor_above_100->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_sam_rep_a_monitor_above_100;

		// "detail_frm_fp_pbb_detail_accomplishment"
		$item =& $this->ListOptions->Add("detail_frm_fp_pbb_detail_accomplishment");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->AllowList('frm_fp_pbb_detail_accomplishment');
		$item->OnLeft = TRUE;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_sam_rep_a_monitor_above_100, $objForm;
		$this->ListOptions->LoadDefault();

		// "detail_frm_fp_pbb_detail_accomplishment"
		$oListOpt =& $this->ListOptions->Items["detail_frm_fp_pbb_detail_accomplishment"];
		if ($Security->AllowList('frm_fp_pbb_detail_accomplishment')) {
			$oListOpt->Body = $Language->Phrase("DetailLink") . $Language->TablePhrase("frm_fp_pbb_detail_accomplishment", "TblCaption");
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"frm_fp_pbb_detail_accomplishmentlist.php?" . UP_TABLE_SHOW_MASTER . "=frm_sam_rep_a_monitor_above_100&units_id=" . urlencode(strval($frm_sam_rep_a_monitor_above_100->units_id->CurrentValue)) . "&MFO=" . urlencode(strval($frm_sam_rep_a_monitor_above_100->MFO->CurrentValue)) . "\">" . $oListOpt->Body . "</a>";
			$links = "";
			if ($links <> "") $oListOpt->Body .= "<br>" . $links;
		}
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_sam_rep_a_monitor_above_100;
		$sSqlWrk = "`units_id`=" . up_AdjustSql($frm_sam_rep_a_monitor_above_100->units_id->CurrentValue) . "";
		$sSqlWrk = $sSqlWrk . " AND " . "`mfo_sequence`=" . up_AdjustSql($frm_sam_rep_a_monitor_above_100->MFO->CurrentValue) . "";
		$sSqlWrk = TEAencrypt($sSqlWrk, UP_RANDOM_KEY);
		$sSqlWrk = str_replace("'", "\'", $sSqlWrk);
		$sHyperLinkParm = " href=\"frm_fp_pbb_detail_accomplishmentlist.php?" . UP_TABLE_SHOW_MASTER . "=frm_sam_rep_a_monitor_above_100&units_id=" . urlencode(strval($frm_sam_rep_a_monitor_above_100->units_id->CurrentValue)) . "&MFO=" . urlencode(strval($frm_sam_rep_a_monitor_above_100->MFO->CurrentValue)) . "\"";
		$oListOpt =& $this->ListOptions->Items["detail_frm_fp_pbb_detail_accomplishment"];
		$oListOpt->Body = $Language->TablePhrase("frm_fp_pbb_detail_accomplishment", "TblCaption");
		$oListOpt->Body = "<a class=\"upRowLink\"" . $sHyperLinkParm . ">" . $oListOpt->Body . "</a>";
		$sHyperLinkParm = " href=\"javascript:void(0);\" name=\"dl%i_frm_sam_rep_a_monitor_above_100_frm_fp_pbb_detail_accomplishment\" id=\"dl%i_frm_sam_rep_a_monitor_above_100_frm_fp_pbb_detail_accomplishment\" onclick=\"up_AjaxShowDetails2(event, this, 'frm_fp_pbb_detail_accomplishmentpreview.php?f=%s')\"";		
		$sHyperLinkParm = str_replace("%i", $this->RowCnt, $sHyperLinkParm);
		$sHyperLinkParm = str_replace("%s", $sSqlWrk, $sHyperLinkParm);
		$oListOpt->Body = "<a" . $sHyperLinkParm . "><img class=\"upPreviewRowImage\" src=\"phpimages/expand.gif\" width=\"9\" height=\"9\" border=\"0\"></a>&nbsp;" . $oListOpt->Body;
		$links = "";
		if ($links <> "") $oListOpt->Body .= "<br>" . $links;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_sam_rep_a_monitor_above_100;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_sam_rep_a_monitor_above_100->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_sam_rep_a_monitor_above_100->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_sam_rep_a_monitor_above_100->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_sam_rep_a_monitor_above_100->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_sam_rep_a_monitor_above_100->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_sam_rep_a_monitor_above_100->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_sam_rep_a_monitor_above_100;
		$frm_sam_rep_a_monitor_above_100->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_sam_rep_a_monitor_above_100->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_sam_rep_a_monitor_above_100;

		// Call Recordset Selecting event
		$frm_sam_rep_a_monitor_above_100->Recordset_Selecting($frm_sam_rep_a_monitor_above_100->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_sam_rep_a_monitor_above_100->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_sam_rep_a_monitor_above_100->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_sam_rep_a_monitor_above_100;
		$sFilter = $frm_sam_rep_a_monitor_above_100->KeyFilter();

		// Call Row Selecting event
		$frm_sam_rep_a_monitor_above_100->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_sam_rep_a_monitor_above_100->CurrentFilter = $sFilter;
		$sSql = $frm_sam_rep_a_monitor_above_100->SQL();
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
		global $conn, $frm_sam_rep_a_monitor_above_100;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_sam_rep_a_monitor_above_100->Row_Selected($row);
		$frm_sam_rep_a_monitor_above_100->units_id->setDbValue($rs->fields('units_id'));
		$frm_sam_rep_a_monitor_above_100->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_sam_rep_a_monitor_above_100->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$frm_sam_rep_a_monitor_above_100->MFO->setDbValue($rs->fields('MFO'));
		$frm_sam_rep_a_monitor_above_100->Question->setDbValue($rs->fields('Question'));
		$frm_sam_rep_a_monitor_above_100->Target->setDbValue($rs->fields('Target'));
		$frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->setDbValue($rs->fields('Target Numerator (TN)'));
		$frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->setDbValue($rs->fields('Target Denominator (TD)'));
		$frm_sam_rep_a_monitor_above_100->Accomplishment->setDbValue($rs->fields('Accomplishment'));
		$frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->setDbValue($rs->fields('Accomplishment Numerator (AN)'));
		$frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->setDbValue($rs->fields('Accomplishment Denominator (AD)'));
		$frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->setDbValue($rs->fields('Performance Rating (PR)'));
		$frm_sam_rep_a_monitor_above_100->PR_Below_9025->setDbValue($rs->fields('PR Below 90%'));
		$frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->setDbValue($rs->fields('PR 90% and Above'));
		$frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->setDbValue($rs->fields('Over 110 Performance Rating'));
		$frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->setDbValue($rs->fields('Numerator Difference (AN - TN)'));
		$frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->setDbValue($rs->fields('AN is higher than TD (AN - TD)'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_sam_rep_a_monitor_above_100;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$frm_sam_rep_a_monitor_above_100->CurrentFilter = $frm_sam_rep_a_monitor_above_100->KeyFilter();
			$sSql = $frm_sam_rep_a_monitor_above_100->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_sam_rep_a_monitor_above_100;

		// Initialize URLs
		$this->ViewUrl = $frm_sam_rep_a_monitor_above_100->ViewUrl();
		$this->EditUrl = $frm_sam_rep_a_monitor_above_100->EditUrl();
		$this->InlineEditUrl = $frm_sam_rep_a_monitor_above_100->InlineEditUrl();
		$this->CopyUrl = $frm_sam_rep_a_monitor_above_100->CopyUrl();
		$this->InlineCopyUrl = $frm_sam_rep_a_monitor_above_100->InlineCopyUrl();
		$this->DeleteUrl = $frm_sam_rep_a_monitor_above_100->DeleteUrl();

		// Call Row_Rendering event
		$frm_sam_rep_a_monitor_above_100->Row_Rendering();

		// Common render codes for all row types
		// units_id

		$frm_sam_rep_a_monitor_above_100->units_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$frm_sam_rep_a_monitor_above_100->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// Delivery Unit
		$frm_sam_rep_a_monitor_above_100->Delivery_Unit->CellCssStyle = "white-space: nowrap;";

		// MFO
		$frm_sam_rep_a_monitor_above_100->MFO->CellCssStyle = "white-space: nowrap;";

		// Question
		$frm_sam_rep_a_monitor_above_100->Question->CellCssStyle = "white-space: nowrap;";

		// Target
		$frm_sam_rep_a_monitor_above_100->Target->CellCssStyle = "white-space: nowrap;";

		// Target Numerator (TN)
		$frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->CellCssStyle = "white-space: nowrap;";

		// Target Denominator (TD)
		$frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->CellCssStyle = "white-space: nowrap;";

		// Accomplishment
		$frm_sam_rep_a_monitor_above_100->Accomplishment->CellCssStyle = "white-space: nowrap;";

		// Accomplishment Numerator (AN)
		$frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->CellCssStyle = "white-space: nowrap;";

		// Accomplishment Denominator (AD)
		$frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->CellCssStyle = "white-space: nowrap;";

		// Performance Rating (PR)
		$frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->CellCssStyle = "white-space: nowrap;";

		// PR Below 90%
		$frm_sam_rep_a_monitor_above_100->PR_Below_9025->CellCssStyle = "white-space: nowrap;";

		// PR 90% and Above
		$frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->CellCssStyle = "white-space: nowrap;";

		// Over 110 Performance Rating
		$frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->CellCssStyle = "white-space: nowrap;";

		// Numerator Difference (AN - TN)
		$frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->CellCssStyle = "white-space: nowrap;";

		// AN is higher than TD (AN - TD)
		$frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->CellCssStyle = "white-space: nowrap;";
		if ($frm_sam_rep_a_monitor_above_100->RowType == UP_ROWTYPE_VIEW) { // View row

			// Delivery Unit
			$frm_sam_rep_a_monitor_above_100->Delivery_Unit->ViewValue = $frm_sam_rep_a_monitor_above_100->Delivery_Unit->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->Delivery_Unit->ViewCustomAttributes = "";

			// MFO
			$frm_sam_rep_a_monitor_above_100->MFO->ViewValue = $frm_sam_rep_a_monitor_above_100->MFO->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->MFO->ViewCustomAttributes = "";

			// Question
			$frm_sam_rep_a_monitor_above_100->Question->ViewValue = $frm_sam_rep_a_monitor_above_100->Question->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->Question->ViewCustomAttributes = "";

			// Target
			$frm_sam_rep_a_monitor_above_100->Target->ViewValue = $frm_sam_rep_a_monitor_above_100->Target->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->Target->ViewCustomAttributes = "";

			// Target Numerator (TN)
			$frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->ViewValue = $frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->ViewCustomAttributes = "";

			// Target Denominator (TD)
			$frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->ViewValue = $frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->ViewCustomAttributes = "";

			// Accomplishment
			$frm_sam_rep_a_monitor_above_100->Accomplishment->ViewValue = $frm_sam_rep_a_monitor_above_100->Accomplishment->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->Accomplishment->ViewCustomAttributes = "";

			// Accomplishment Numerator (AN)
			$frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->ViewValue = $frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->ViewCustomAttributes = "";

			// Accomplishment Denominator (AD)
			$frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->ViewValue = $frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->ViewCustomAttributes = "";

			// Performance Rating (PR)
			$frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->ViewValue = $frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->ViewCustomAttributes = "";

			// PR Below 90%
			$frm_sam_rep_a_monitor_above_100->PR_Below_9025->ViewValue = $frm_sam_rep_a_monitor_above_100->PR_Below_9025->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->PR_Below_9025->ViewCustomAttributes = "";

			// PR 90% and Above
			$frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->ViewValue = $frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->ViewCustomAttributes = "";

			// Over 110 Performance Rating
			$frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->ViewValue = $frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->ViewCustomAttributes = "";

			// Numerator Difference (AN - TN)
			$frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->ViewValue = $frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->ViewCustomAttributes = "";

			// AN is higher than TD (AN - TD)
			$frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->ViewValue = $frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->CurrentValue;
			$frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->ViewCustomAttributes = "";

			// Delivery Unit
			$frm_sam_rep_a_monitor_above_100->Delivery_Unit->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->Delivery_Unit->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->Delivery_Unit->TooltipValue = "";

			// MFO
			$frm_sam_rep_a_monitor_above_100->MFO->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->MFO->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->MFO->TooltipValue = "";

			// Question
			$frm_sam_rep_a_monitor_above_100->Question->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->Question->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->Question->TooltipValue = "";

			// Target
			$frm_sam_rep_a_monitor_above_100->Target->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->Target->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->Target->TooltipValue = "";

			// Target Numerator (TN)
			$frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->TooltipValue = "";

			// Target Denominator (TD)
			$frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->TooltipValue = "";

			// Accomplishment
			$frm_sam_rep_a_monitor_above_100->Accomplishment->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->Accomplishment->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->Accomplishment->TooltipValue = "";

			// Accomplishment Numerator (AN)
			$frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->TooltipValue = "";

			// Accomplishment Denominator (AD)
			$frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->TooltipValue = "";

			// Performance Rating (PR)
			$frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->TooltipValue = "";

			// PR Below 90%
			$frm_sam_rep_a_monitor_above_100->PR_Below_9025->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->PR_Below_9025->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->PR_Below_9025->TooltipValue = "";

			// PR 90% and Above
			$frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->TooltipValue = "";

			// Over 110 Performance Rating
			$frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->TooltipValue = "";

			// Numerator Difference (AN - TN)
			$frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->TooltipValue = "";

			// AN is higher than TD (AN - TD)
			$frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->LinkCustomAttributes = "";
			$frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->HrefValue = "";
			$frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_sam_rep_a_monitor_above_100->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_sam_rep_a_monitor_above_100->Row_Rendered();
	}

	// Set up export options
	function SetupExportOptions() {
		global $Language, $frm_sam_rep_a_monitor_above_100;

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
		$item->Body = "<a name=\"emf_frm_sam_rep_a_monitor_above_100\" id=\"emf_frm_sam_rep_a_monitor_above_100\" href=\"javascript:void(0);\" onclick=\"up_EmailDialogShow({lnk:'emf_frm_sam_rep_a_monitor_above_100',hdr:upLanguage.Phrase('ExportToEmail'),f:document.ffrm_sam_rep_a_monitor_above_100list,sel:false});\">" . $Language->Phrase("ExportToEmail") . "</a>";
		$item->Visible = FALSE;

		// Hide options for export/action
		if ($frm_sam_rep_a_monitor_above_100->Export <> "" ||
			$frm_sam_rep_a_monitor_above_100->CurrentAction <> "")
			$this->ExportOptions->HideAllOptions();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	function ExportData() {
		global $frm_sam_rep_a_monitor_above_100;
		$utf8 = (strtolower(UP_CHARSET) == "utf-8");
		$bSelectLimit = UP_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->TotalRecs = $frm_sam_rep_a_monitor_above_100->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;

		// Export all
		if ($frm_sam_rep_a_monitor_above_100->ExportAll) {
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
		if ($frm_sam_rep_a_monitor_above_100->Export == "xml") {
			$XmlDoc = new cXMLDocument(UP_XML_ENCODING);
		} else {
			$ExportDoc = new cExportDocument($frm_sam_rep_a_monitor_above_100, "h");
		}
		$ParentTable = "";
		if ($bSelectLimit) {
			$StartRec = 1;
			$StopRec = $this->DisplayRecs;
		} else {
			$StartRec = $this->StartRec;
			$StopRec = $this->StopRec;
		}
		if ($frm_sam_rep_a_monitor_above_100->Export == "xml") {
			$frm_sam_rep_a_monitor_above_100->ExportXmlDocument($XmlDoc, ($ParentTable <> ""), $rs, $StartRec, $StopRec, "");
		} else {
			$sHeader = $this->PageHeader;
			$this->Page_DataRendering($sHeader);
			$ExportDoc->Text .= $sHeader;
			$frm_sam_rep_a_monitor_above_100->ExportDocument($ExportDoc, $rs, $StartRec, $StopRec, "");
			$sFooter = $this->PageFooter;
			$this->Page_DataRendered($sFooter);
			$ExportDoc->Text .= $sFooter;
		}

		// Close recordset
		$rs->Close();

		// Export header and footer
		if ($frm_sam_rep_a_monitor_above_100->Export <> "xml") {
			$ExportDoc->ExportHeaderAndFooter();
		}

		// Clean output buffer
		if (!UP_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($frm_sam_rep_a_monitor_above_100->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (UP_DEBUG_ENABLED)
			echo up_DebugMsg();

		// Output data
		if ($frm_sam_rep_a_monitor_above_100->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($frm_sam_rep_a_monitor_above_100->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($frm_sam_rep_a_monitor_above_100->ExportReturnUrl());
		} elseif ($frm_sam_rep_a_monitor_above_100->Export == "pdf") {
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
