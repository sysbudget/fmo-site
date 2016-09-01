<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_fp_rep_ta_form_a_1info.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_fp_rep_ta_form_a_1_list = new cfrm_fp_rep_ta_form_a_1_list();
$Page =& $frm_fp_rep_ta_form_a_1_list;

// Page init
$frm_fp_rep_ta_form_a_1_list->Page_Init();

// Page main
$frm_fp_rep_ta_form_a_1_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($frm_fp_rep_ta_form_a_1->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_rep_ta_form_a_1_list = new up_Page("frm_fp_rep_ta_form_a_1_list");

// page properties
frm_fp_rep_ta_form_a_1_list.PageID = "list"; // page ID
frm_fp_rep_ta_form_a_1_list.FormID = "ffrm_fp_rep_ta_form_a_1list"; // form ID
var UP_PAGE_ID = frm_fp_rep_ta_form_a_1_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_fp_rep_ta_form_a_1_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_rep_ta_form_a_1_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_rep_ta_form_a_1_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_rep_ta_form_a_1_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($frm_fp_rep_ta_form_a_1->Export == "") || (UP_EXPORT_MASTER_RECORD && $frm_fp_rep_ta_form_a_1->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$frm_fp_rep_ta_form_a_1_list->TotalRecs = $frm_fp_rep_ta_form_a_1->SelectRecordCount();
	} else {
		if ($frm_fp_rep_ta_form_a_1_list->Recordset = $frm_fp_rep_ta_form_a_1_list->LoadRecordset())
			$frm_fp_rep_ta_form_a_1_list->TotalRecs = $frm_fp_rep_ta_form_a_1_list->Recordset->RecordCount();
	}
	$frm_fp_rep_ta_form_a_1_list->StartRec = 1;
	if ($frm_fp_rep_ta_form_a_1_list->DisplayRecs <= 0 || ($frm_fp_rep_ta_form_a_1->Export <> "" && $frm_fp_rep_ta_form_a_1->ExportAll)) // Display all records
		$frm_fp_rep_ta_form_a_1_list->DisplayRecs = $frm_fp_rep_ta_form_a_1_list->TotalRecs;
	if (!($frm_fp_rep_ta_form_a_1->Export <> "" && $frm_fp_rep_ta_form_a_1->ExportAll))
		$frm_fp_rep_ta_form_a_1_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$frm_fp_rep_ta_form_a_1_list->Recordset = $frm_fp_rep_ta_form_a_1_list->LoadRecordset($frm_fp_rep_ta_form_a_1_list->StartRec-1, $frm_fp_rep_ta_form_a_1_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_rep_ta_form_a_1->TableCaption() ?>
&nbsp;&nbsp;<?php $frm_fp_rep_ta_form_a_1_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($frm_fp_rep_ta_form_a_1->Export == "" && $frm_fp_rep_ta_form_a_1->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(frm_fp_rep_ta_form_a_1_list);" style="text-decoration: none;"><img id="frm_fp_rep_ta_form_a_1_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="frm_fp_rep_ta_form_a_1_list_SearchPanel">
<form name="ffrm_fp_rep_ta_form_a_1listsrch" id="ffrm_fp_rep_ta_form_a_1listsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="frm_fp_rep_ta_form_a_1">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($frm_fp_rep_ta_form_a_1->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $frm_fp_rep_ta_form_a_1_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($frm_fp_rep_ta_form_a_1->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($frm_fp_rep_ta_form_a_1->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($frm_fp_rep_ta_form_a_1->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $frm_fp_rep_ta_form_a_1_list->ShowPageHeader(); ?>
<?php
$frm_fp_rep_ta_form_a_1_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($frm_fp_rep_ta_form_a_1->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($frm_fp_rep_ta_form_a_1->CurrentAction <> "gridadd" && $frm_fp_rep_ta_form_a_1->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($frm_fp_rep_ta_form_a_1_list->Pager)) $frm_fp_rep_ta_form_a_1_list->Pager = new cPrevNextPager($frm_fp_rep_ta_form_a_1_list->StartRec, $frm_fp_rep_ta_form_a_1_list->DisplayRecs, $frm_fp_rep_ta_form_a_1_list->TotalRecs) ?>
<?php if ($frm_fp_rep_ta_form_a_1_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($frm_fp_rep_ta_form_a_1_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_rep_ta_form_a_1_list->PageUrl() ?>start=<?php echo $frm_fp_rep_ta_form_a_1_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($frm_fp_rep_ta_form_a_1_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_rep_ta_form_a_1_list->PageUrl() ?>start=<?php echo $frm_fp_rep_ta_form_a_1_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $frm_fp_rep_ta_form_a_1_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($frm_fp_rep_ta_form_a_1_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_rep_ta_form_a_1_list->PageUrl() ?>start=<?php echo $frm_fp_rep_ta_form_a_1_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($frm_fp_rep_ta_form_a_1_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $frm_fp_rep_ta_form_a_1_list->PageUrl() ?>start=<?php echo $frm_fp_rep_ta_form_a_1_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $frm_fp_rep_ta_form_a_1_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $frm_fp_rep_ta_form_a_1_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $frm_fp_rep_ta_form_a_1_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $frm_fp_rep_ta_form_a_1_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($frm_fp_rep_ta_form_a_1_list->SearchWhere == "0=101") { ?>
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
<form name="ffrm_fp_rep_ta_form_a_1list" id="ffrm_fp_rep_ta_form_a_1list" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="frm_fp_rep_ta_form_a_1">
<div id="gmp_frm_fp_rep_ta_form_a_1" class="upGridMiddlePanel">
<?php if ($frm_fp_rep_ta_form_a_1_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $frm_fp_rep_ta_form_a_1->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$frm_fp_rep_ta_form_a_1_list->RenderListOptions();

// Render list options (header, left)
$frm_fp_rep_ta_form_a_1_list->ListOptions->Render("header", "left");
?>
<?php if ($frm_fp_rep_ta_form_a_1->Constituent_University->Visible) { // Constituent University ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Constituent_University) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Constituent_University->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Constituent_University) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Constituent_University->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Constituent_University->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Constituent_University->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Delivery_Unit->Visible) { // Delivery Unit ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Delivery_Unit) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Delivery_Unit->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Delivery_Unit) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Delivery_Unit->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Delivery_Unit->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Delivery_Unit->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_1->Visible) { // PI 1 ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_1) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_1->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_1) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_1->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_1->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_1->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28129->Visible) { // PI Question (1) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28129->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_Question_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_28129->Visible) { // Target (1) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_28129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28129->Visible) { // Target N (1) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_N_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_N_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28129->Visible) { // Target D (1) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_D_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_D_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28129->Visible) { // Target Remarks (1) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28129->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_Remarks_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28129->Visible) { // Accomplishment (1) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->Visible) { // Accomplishment N (1) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->Visible) { // Accomplishment D (1) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->Visible) { // Supporting Documents (1) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->Visible) { // Accomplishment Remarks (1) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_2->Visible) { // PI 2 ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_2) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_2->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_2) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_2->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_2->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_2->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28229->Visible) { // PI Question (2) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28229->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_Question_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_28229->Visible) { // Target (2) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_28229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28229->Visible) { // Target N (2) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_N_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_N_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28229->Visible) { // Target D (2) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_D_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_D_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28229->Visible) { // Target Remarks (2) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28229->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_Remarks_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28229->Visible) { // Accomplishment (2) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->Visible) { // Accomplishment N (2) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->Visible) { // Accomplishment D (2) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->Visible) { // Supporting Documents (2) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->Visible) { // Accomplishment Remarks (2) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_3->Visible) { // PI 3 ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_3) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_3->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_3) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_3->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_3->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_3->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28329->Visible) { // PI Question (3) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28329->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_Question_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_28329->Visible) { // Target (3) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_28329->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28329->Visible) { // Target N (3) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28329->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_N_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_N_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28329->Visible) { // Target D (3) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28329->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_D_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_D_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28329->Visible) { // Target Remarks (3) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28329->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_Remarks_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28329->Visible) { // Accomplishment (3) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28329->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->Visible) { // Accomplishment N (3) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->Visible) { // Accomplishment D (3) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->Visible) { // Supporting Documents (3) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->Visible) { // Accomplishment Remarks (3) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_4->Visible) { // PI 4 ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_4) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_4->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_4) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_4->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_4->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_4->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28429->Visible) { // PI Question (4) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28429->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_Question_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_28429->Visible) { // Target (4) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_28429->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28429->Visible) { // Target N (4) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28429->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_N_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_N_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28429->Visible) { // Target D (4) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28429->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_D_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_D_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28429->Visible) { // Target Remarks (4) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28429->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_Remarks_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28429->Visible) { // Accomplishment (4) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28429->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->Visible) { // Accomplishment N (4) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->Visible) { // Accomplishment D (4) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->Visible) { // Supporting Documents (4) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->Visible) { // Accomplishment Remarks (4) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_5->Visible) { // PI 5 ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_5) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_5->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_5) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_5->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_5->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_5->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28529->Visible) { // PI Question (5) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28529->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_Question_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_28529->Visible) { // Target (5) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_28529->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28529->Visible) { // Target N (5) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28529->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_N_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_N_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28529->Visible) { // Target D (5) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28529->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_D_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_D_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28529->Visible) { // Target Remarks (5) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28529->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_Remarks_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28529->Visible) { // Accomplishment (5) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28529->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->Visible) { // Accomplishment N (5) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->Visible) { // Accomplishment D (5) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->Visible) { // Supporting Documents (5) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->Visible) { // Accomplishment Remarks (5) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_6->Visible) { // PI 6 ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_6) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_6->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_6) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_6->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_6->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_6->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28629->Visible) { // PI Question (6) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28629->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_Question_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_28629->Visible) { // Target (6) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_28629->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28629->Visible) { // Target N (6) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28629->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_N_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_N_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28629->Visible) { // Target D (6) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28629->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_D_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_D_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28629->Visible) { // Target Remarks (6) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28629->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_Remarks_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28629->Visible) { // Accomplishment (6) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28629->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->Visible) { // Accomplishment N (6) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->Visible) { // Accomplishment D (6) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->Visible) { // Supporting Documents (6) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->Visible) { // Accomplishment Remarks (6) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_7->Visible) { // PI 7 ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_7) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_7->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_7) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_7->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_7->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_7->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28729->Visible) { // PI Question (7) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28729->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_Question_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_28729->Visible) { // Target (7) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_28729->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28729->Visible) { // Target N (7) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28729->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_N_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_N_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28729->Visible) { // Target D (7) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28729->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_D_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_D_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28729->Visible) { // Target Remarks (7) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28729->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_Remarks_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28729->Visible) { // Accomplishment (7) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28729->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->Visible) { // Accomplishment N (7) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->Visible) { // Accomplishment D (7) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->Visible) { // Supporting Documents (7) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->Visible) { // Accomplishment Remarks (7) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_8->Visible) { // PI 8 ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_8) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_8->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_8) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_8->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_8->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_8->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28829->Visible) { // PI Question (8) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28829->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_Question_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_28829->Visible) { // Target (8) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_28829->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28829->Visible) { // Target N (8) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28829->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_N_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_N_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28829->Visible) { // Target D (8) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28829->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_D_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_D_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28829->Visible) { // Target Remarks (8) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28829->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_Remarks_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28829->Visible) { // Accomplishment (8) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28829->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->Visible) { // Accomplishment N (8) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->Visible) { // Accomplishment D (8) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->Visible) { // Supporting Documents (8) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->Visible) { // Accomplishment Remarks (8) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_9->Visible) { // PI 9 ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_9) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_9->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_9) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_9->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_9->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_9->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28929->Visible) { // PI Question (9) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28929->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_Question_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_28929->Visible) { // Target (9) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_28929->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28929->Visible) { // Target N (9) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28929->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_N_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_N_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28929->Visible) { // Target D (9) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28929->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_D_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_D_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28929->Visible) { // Target Remarks (9) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28929->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_Remarks_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28929->Visible) { // Accomplishment (9) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28929->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->Visible) { // Accomplishment N (9) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->Visible) { // Accomplishment D (9) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->Visible) { // Supporting Documents (9) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->Visible) { // Accomplishment Remarks (9) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_10->Visible) { // PI 10 ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_10) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_10->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_10) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_10->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_10->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_10->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_281029->Visible) { // PI Question (10) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_281029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281029->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_Question_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_Question_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_281029->Visible) { // Target (10) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_281029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_281029->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_N_281029->Visible) { // Target N (10) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_281029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_281029->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_N_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_N_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_D_281029->Visible) { // Target D (10) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_281029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_281029->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_D_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_D_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_281029->Visible) { // Target Remarks (10) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_281029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281029->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_Remarks_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_281029->Visible) { // Accomplishment (10) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_281029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281029->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->Visible) { // Accomplishment N (10) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_281029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->Visible) { // Accomplishment D (10) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_281029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->Visible) { // Supporting Documents (10) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_281029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->Visible) { // Accomplishment Remarks (10) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_11->Visible) { // PI 11 ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_11) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_11->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_11) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_11->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_11->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_11->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_281129->Visible) { // PI Question (11) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_281129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281129->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_Question_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_Question_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_281129->Visible) { // Target (11) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_281129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_281129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_N_281129->Visible) { // Target N (11) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_281129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_281129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_N_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_N_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_D_281129->Visible) { // Target D (11) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_281129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_281129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_D_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_D_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_281129->Visible) { // Target Remarks (11) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_281129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281129->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_Remarks_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_281129->Visible) { // Accomplishment (11) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_281129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->Visible) { // Accomplishment N (11) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_281129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->Visible) { // Accomplishment D (11) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_281129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->Visible) { // Supporting Documents (11) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_281129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->Visible) { // Accomplishment Remarks (11) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_12->Visible) { // PI 12 ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_12) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_12->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_12) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_12->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_12->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_12->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_281229->Visible) { // PI Question (12) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_281229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->PI_Question_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281229->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->PI_Question_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->PI_Question_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_281229->Visible) { // Target (12) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_281229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_281229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_N_281229->Visible) { // Target N (12) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_281229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_N_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_N_281229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_N_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_N_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_D_281229->Visible) { // Target D (12) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_281229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_D_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_D_281229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_D_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_D_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_281229->Visible) { // Target Remarks (12) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_281229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Target_Remarks_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281229->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Target_Remarks_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_281229->Visible) { // Accomplishment (12) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_281229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->Visible) { // Accomplishment N (12) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_281229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_N_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->Visible) { // Accomplishment D (12) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_281229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_D_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->Visible) { // Supporting Documents (12) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_281229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Supporting_Documents_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->FldCaption() ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->Visible) { // Accomplishment Remarks (12) ?>
	<?php if ($frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229) == "") { ?>
		<td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $frm_fp_rep_ta_form_a_1->SortUrl($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$frm_fp_rep_ta_form_a_1_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($frm_fp_rep_ta_form_a_1->ExportAll && $frm_fp_rep_ta_form_a_1->Export <> "") {
	$frm_fp_rep_ta_form_a_1_list->StopRec = $frm_fp_rep_ta_form_a_1_list->TotalRecs;
} else {

	// Set the last record to display
	if ($frm_fp_rep_ta_form_a_1_list->TotalRecs > $frm_fp_rep_ta_form_a_1_list->StartRec + $frm_fp_rep_ta_form_a_1_list->DisplayRecs - 1)
		$frm_fp_rep_ta_form_a_1_list->StopRec = $frm_fp_rep_ta_form_a_1_list->StartRec + $frm_fp_rep_ta_form_a_1_list->DisplayRecs - 1;
	else
		$frm_fp_rep_ta_form_a_1_list->StopRec = $frm_fp_rep_ta_form_a_1_list->TotalRecs;
}
$frm_fp_rep_ta_form_a_1_list->RecCnt = $frm_fp_rep_ta_form_a_1_list->StartRec - 1;
if ($frm_fp_rep_ta_form_a_1_list->Recordset && !$frm_fp_rep_ta_form_a_1_list->Recordset->EOF) {
	$frm_fp_rep_ta_form_a_1_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $frm_fp_rep_ta_form_a_1_list->StartRec > 1)
		$frm_fp_rep_ta_form_a_1_list->Recordset->Move($frm_fp_rep_ta_form_a_1_list->StartRec - 1);
} elseif (!$frm_fp_rep_ta_form_a_1->AllowAddDeleteRow && $frm_fp_rep_ta_form_a_1_list->StopRec == 0) {
	$frm_fp_rep_ta_form_a_1_list->StopRec = $frm_fp_rep_ta_form_a_1->GridAddRowCount;
}

// Initialize aggregate
$frm_fp_rep_ta_form_a_1->RowType = UP_ROWTYPE_AGGREGATEINIT;
$frm_fp_rep_ta_form_a_1->ResetAttrs();
$frm_fp_rep_ta_form_a_1_list->RenderRow();
$frm_fp_rep_ta_form_a_1_list->RowCnt = 0;
while ($frm_fp_rep_ta_form_a_1_list->RecCnt < $frm_fp_rep_ta_form_a_1_list->StopRec) {
	$frm_fp_rep_ta_form_a_1_list->RecCnt++;
	if (intval($frm_fp_rep_ta_form_a_1_list->RecCnt) >= intval($frm_fp_rep_ta_form_a_1_list->StartRec)) {
		$frm_fp_rep_ta_form_a_1_list->RowCnt++;

		// Set up key count
		$frm_fp_rep_ta_form_a_1_list->KeyCount = $frm_fp_rep_ta_form_a_1_list->RowIndex;

		// Init row class and style
		$frm_fp_rep_ta_form_a_1->ResetAttrs();
		$frm_fp_rep_ta_form_a_1->CssClass = "";
		if ($frm_fp_rep_ta_form_a_1->CurrentAction == "gridadd") {
		} else {
			$frm_fp_rep_ta_form_a_1_list->LoadRowValues($frm_fp_rep_ta_form_a_1_list->Recordset); // Load row values
		}
		$frm_fp_rep_ta_form_a_1->RowType = UP_ROWTYPE_VIEW; // Render view
		$frm_fp_rep_ta_form_a_1->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$frm_fp_rep_ta_form_a_1_list->RenderRow();

		// Render list options
		$frm_fp_rep_ta_form_a_1_list->RenderListOptions();
?>
	<tr<?php echo $frm_fp_rep_ta_form_a_1->RowAttributes() ?>>
<?php

// Render list options (body, left)
$frm_fp_rep_ta_form_a_1_list->ListOptions->Render("body", "left");
?>
	<?php if ($frm_fp_rep_ta_form_a_1->Constituent_University->Visible) { // Constituent University ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Constituent_University->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Constituent_University->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Constituent_University->ListViewValue() ?></div>
<a name="<?php echo $frm_fp_rep_ta_form_a_1_list->PageObjName . "_row_" . $frm_fp_rep_ta_form_a_1_list->RowCnt ?>" id="<?php echo $frm_fp_rep_ta_form_a_1_list->PageObjName . "_row_" . $frm_fp_rep_ta_form_a_1_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Delivery_Unit->Visible) { // Delivery Unit ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Delivery_Unit->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Delivery_Unit->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_1->Visible) { // PI 1 ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_1->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_1->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_1->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28129->Visible) { // PI Question (1) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_28129->Visible) { // Target (1) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_28129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28129->Visible) { // Target N (1) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28129->Visible) { // Target D (1) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28129->Visible) { // Target Remarks (1) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28129->Visible) { // Accomplishment (1) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->Visible) { // Accomplishment N (1) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->Visible) { // Accomplishment D (1) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->Visible) { // Supporting Documents (1) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->Visible) { // Accomplishment Remarks (1) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_2->Visible) { // PI 2 ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_2->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_2->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_2->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28229->Visible) { // PI Question (2) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_28229->Visible) { // Target (2) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_28229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28229->Visible) { // Target N (2) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28229->Visible) { // Target D (2) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28229->Visible) { // Target Remarks (2) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28229->Visible) { // Accomplishment (2) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->Visible) { // Accomplishment N (2) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->Visible) { // Accomplishment D (2) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->Visible) { // Supporting Documents (2) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->Visible) { // Accomplishment Remarks (2) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_3->Visible) { // PI 3 ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_3->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_3->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_3->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28329->Visible) { // PI Question (3) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_28329->Visible) { // Target (3) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_28329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28329->Visible) { // Target N (3) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28329->Visible) { // Target D (3) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28329->Visible) { // Target Remarks (3) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28329->Visible) { // Accomplishment (3) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->Visible) { // Accomplishment N (3) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->Visible) { // Accomplishment D (3) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->Visible) { // Supporting Documents (3) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->Visible) { // Accomplishment Remarks (3) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_4->Visible) { // PI 4 ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_4->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_4->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_4->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28429->Visible) { // PI Question (4) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_28429->Visible) { // Target (4) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_28429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28429->Visible) { // Target N (4) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28429->Visible) { // Target D (4) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28429->Visible) { // Target Remarks (4) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28429->Visible) { // Accomplishment (4) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->Visible) { // Accomplishment N (4) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->Visible) { // Accomplishment D (4) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->Visible) { // Supporting Documents (4) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->Visible) { // Accomplishment Remarks (4) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_5->Visible) { // PI 5 ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_5->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_5->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_5->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28529->Visible) { // PI Question (5) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_28529->Visible) { // Target (5) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_28529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28529->Visible) { // Target N (5) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28529->Visible) { // Target D (5) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28529->Visible) { // Target Remarks (5) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28529->Visible) { // Accomplishment (5) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->Visible) { // Accomplishment N (5) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->Visible) { // Accomplishment D (5) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->Visible) { // Supporting Documents (5) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->Visible) { // Accomplishment Remarks (5) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_6->Visible) { // PI 6 ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_6->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_6->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_6->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28629->Visible) { // PI Question (6) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_28629->Visible) { // Target (6) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_28629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28629->Visible) { // Target N (6) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28629->Visible) { // Target D (6) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28629->Visible) { // Target Remarks (6) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28629->Visible) { // Accomplishment (6) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->Visible) { // Accomplishment N (6) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->Visible) { // Accomplishment D (6) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->Visible) { // Supporting Documents (6) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->Visible) { // Accomplishment Remarks (6) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_7->Visible) { // PI 7 ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_7->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_7->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_7->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28729->Visible) { // PI Question (7) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_28729->Visible) { // Target (7) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_28729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28729->Visible) { // Target N (7) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28729->Visible) { // Target D (7) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28729->Visible) { // Target Remarks (7) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28729->Visible) { // Accomplishment (7) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->Visible) { // Accomplishment N (7) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->Visible) { // Accomplishment D (7) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->Visible) { // Supporting Documents (7) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->Visible) { // Accomplishment Remarks (7) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_8->Visible) { // PI 8 ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_8->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_8->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_8->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28829->Visible) { // PI Question (8) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_28829->Visible) { // Target (8) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_28829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28829->Visible) { // Target N (8) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28829->Visible) { // Target D (8) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28829->Visible) { // Target Remarks (8) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28829->Visible) { // Accomplishment (8) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->Visible) { // Accomplishment N (8) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->Visible) { // Accomplishment D (8) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->Visible) { // Supporting Documents (8) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->Visible) { // Accomplishment Remarks (8) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_9->Visible) { // PI 9 ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_9->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_9->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_9->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_28929->Visible) { // PI Question (9) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_28929->Visible) { // Target (9) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_28929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_N_28929->Visible) { // Target N (9) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_N_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_N_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_D_28929->Visible) { // Target D (9) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_D_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_D_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_28929->Visible) { // Target Remarks (9) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_28929->Visible) { // Accomplishment (9) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->Visible) { // Accomplishment N (9) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->Visible) { // Accomplishment D (9) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->Visible) { // Supporting Documents (9) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->Visible) { // Accomplishment Remarks (9) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_10->Visible) { // PI 10 ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_10->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_10->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_10->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_281029->Visible) { // PI Question (10) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_281029->Visible) { // Target (10) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_281029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_N_281029->Visible) { // Target N (10) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_N_281029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_N_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_N_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_D_281029->Visible) { // Target D (10) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_D_281029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_D_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_D_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_281029->Visible) { // Target Remarks (10) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_281029->Visible) { // Accomplishment (10) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->Visible) { // Accomplishment N (10) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->Visible) { // Accomplishment D (10) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->Visible) { // Supporting Documents (10) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->Visible) { // Accomplishment Remarks (10) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_11->Visible) { // PI 11 ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_11->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_11->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_11->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_281129->Visible) { // PI Question (11) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_281129->Visible) { // Target (11) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_281129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_N_281129->Visible) { // Target N (11) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_N_281129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_N_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_N_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_D_281129->Visible) { // Target D (11) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_D_281129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_D_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_D_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_281129->Visible) { // Target Remarks (11) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_281129->Visible) { // Accomplishment (11) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->Visible) { // Accomplishment N (11) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->Visible) { // Accomplishment D (11) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->Visible) { // Supporting Documents (11) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->Visible) { // Accomplishment Remarks (11) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_12->Visible) { // PI 12 ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_12->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_12->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_12->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->PI_Question_281229->Visible) { // PI Question (12) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->PI_Question_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_281229->Visible) { // Target (12) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_281229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_N_281229->Visible) { // Target N (12) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_N_281229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_N_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_N_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_D_281229->Visible) { // Target D (12) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_D_281229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_D_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_D_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Target_Remarks_281229->Visible) { // Target Remarks (12) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Target_Remarks_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_281229->Visible) { // Accomplishment (12) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->Visible) { // Accomplishment N (12) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->Visible) { // Accomplishment D (12) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->Visible) { // Supporting Documents (12) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->Visible) { // Accomplishment Remarks (12) ?>
		<td<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$frm_fp_rep_ta_form_a_1_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($frm_fp_rep_ta_form_a_1->CurrentAction <> "gridadd")
		$frm_fp_rep_ta_form_a_1_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($frm_fp_rep_ta_form_a_1_list->Recordset)
	$frm_fp_rep_ta_form_a_1_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($frm_fp_rep_ta_form_a_1->Export == "" && $frm_fp_rep_ta_form_a_1->CurrentAction == "") { ?>
<?php } ?>
<?php
$frm_fp_rep_ta_form_a_1_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($frm_fp_rep_ta_form_a_1->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$frm_fp_rep_ta_form_a_1_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_rep_ta_form_a_1_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'frm_fp_rep_ta_form_a_1';

	// Page object name
	var $PageObjName = 'frm_fp_rep_ta_form_a_1_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_rep_ta_form_a_1;
		if ($frm_fp_rep_ta_form_a_1->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_rep_ta_form_a_1->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_rep_ta_form_a_1;
		if ($frm_fp_rep_ta_form_a_1->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_rep_ta_form_a_1->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_rep_ta_form_a_1->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_rep_ta_form_a_1_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_rep_ta_form_a_1)
		if (!isset($GLOBALS["frm_fp_rep_ta_form_a_1"])) {
			$GLOBALS["frm_fp_rep_ta_form_a_1"] = new cfrm_fp_rep_ta_form_a_1();
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_rep_ta_form_a_1"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "frm_fp_rep_ta_form_a_1add.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "frm_fp_rep_ta_form_a_1delete.php";
		$this->MultiUpdateUrl = "frm_fp_rep_ta_form_a_1update.php";

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_rep_ta_form_a_1', TRUE);

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
		global $frm_fp_rep_ta_form_a_1;

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
			$frm_fp_rep_ta_form_a_1->Export = $_GET["export"];
		} elseif (up_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$frm_fp_rep_ta_form_a_1->Export = $_POST["exporttype"];
		} else {
			$frm_fp_rep_ta_form_a_1->setExportReturnUrl(up_CurrentUrl());
		}
		$gsExport = $frm_fp_rep_ta_form_a_1->Export; // Get export parameter, used in header
		$gsExportFile = $frm_fp_rep_ta_form_a_1->TableVar; // Get export file, used in header
		$Charset = (UP_CHARSET <> "") ? ";charset=" . UP_CHARSET : ""; // Charset used in header
		if ($frm_fp_rep_ta_form_a_1->Export == "csv") {
			header('Content-Type: application/csv' . $Charset);
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$frm_fp_rep_ta_form_a_1->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $frm_fp_rep_ta_form_a_1;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($frm_fp_rep_ta_form_a_1->Export <> "" ||
				$frm_fp_rep_ta_form_a_1->CurrentAction == "gridadd" ||
				$frm_fp_rep_ta_form_a_1->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$frm_fp_rep_ta_form_a_1->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($frm_fp_rep_ta_form_a_1->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $frm_fp_rep_ta_form_a_1->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$frm_fp_rep_ta_form_a_1->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$frm_fp_rep_ta_form_a_1->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$frm_fp_rep_ta_form_a_1->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $frm_fp_rep_ta_form_a_1->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$frm_fp_rep_ta_form_a_1->setSessionWhere($sFilter);
		$frm_fp_rep_ta_form_a_1->CurrentFilter = "";

		// Export data only
		if (in_array($frm_fp_rep_ta_form_a_1->Export, array("html","word","excel","xml","csv","email","pdf"))) {
			$this->ExportData();
			if ($frm_fp_rep_ta_form_a_1->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $frm_fp_rep_ta_form_a_1;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Constituent_University, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Delivery_Unit, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_1, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_Question_28129, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Target_Remarks_28129, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_2, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_Question_28229, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Target_Remarks_28229, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_3, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_Question_28329, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Target_Remarks_28329, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_4, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_Question_28429, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Target_Remarks_28429, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_5, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_Question_28529, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Target_Remarks_28529, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_6, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_Question_28629, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Target_Remarks_28629, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_7, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_Question_28729, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Target_Remarks_28729, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_8, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_Question_28829, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Target_Remarks_28829, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_9, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_Question_28929, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Target_Remarks_28929, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_10, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_Question_281029, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Target_Remarks_281029, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_11, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_Question_281129, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Target_Remarks_281129, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_12, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->PI_Question_281229, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Target_Remarks_281229, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229, $Keyword);
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
		global $Security, $frm_fp_rep_ta_form_a_1;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $frm_fp_rep_ta_form_a_1->BasicSearchKeyword;
		$sSearchType = $frm_fp_rep_ta_form_a_1->BasicSearchType;
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
			$frm_fp_rep_ta_form_a_1->setSessionBasicSearchKeyword($sSearchKeyword);
			$frm_fp_rep_ta_form_a_1->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $frm_fp_rep_ta_form_a_1;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$frm_fp_rep_ta_form_a_1->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $frm_fp_rep_ta_form_a_1;
		$frm_fp_rep_ta_form_a_1->setSessionBasicSearchKeyword("");
		$frm_fp_rep_ta_form_a_1->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $frm_fp_rep_ta_form_a_1;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$frm_fp_rep_ta_form_a_1->BasicSearchKeyword = $frm_fp_rep_ta_form_a_1->getSessionBasicSearchKeyword();
			$frm_fp_rep_ta_form_a_1->BasicSearchType = $frm_fp_rep_ta_form_a_1->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $frm_fp_rep_ta_form_a_1;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$frm_fp_rep_ta_form_a_1->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$frm_fp_rep_ta_form_a_1->CurrentOrderType = @$_GET["ordertype"];
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Constituent_University); // Constituent University
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Delivery_Unit); // Delivery Unit
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_1); // PI 1
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_Question_28129); // PI Question (1)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_28129); // Target (1)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_N_28129); // Target N (1)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_D_28129); // Target D (1)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_Remarks_28129); // Target Remarks (1)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_28129); // Accomplishment (1)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_N_28129); // Accomplishment N (1)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_D_28129); // Accomplishment D (1)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Supporting_Documents_28129); // Supporting Documents (1)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129); // Accomplishment Remarks (1)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_2); // PI 2
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_Question_28229); // PI Question (2)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_28229); // Target (2)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_N_28229); // Target N (2)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_D_28229); // Target D (2)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_Remarks_28229); // Target Remarks (2)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_28229); // Accomplishment (2)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_N_28229); // Accomplishment N (2)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_D_28229); // Accomplishment D (2)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Supporting_Documents_28229); // Supporting Documents (2)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229); // Accomplishment Remarks (2)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_3); // PI 3
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_Question_28329); // PI Question (3)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_28329); // Target (3)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_N_28329); // Target N (3)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_D_28329); // Target D (3)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_Remarks_28329); // Target Remarks (3)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_28329); // Accomplishment (3)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_N_28329); // Accomplishment N (3)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_D_28329); // Accomplishment D (3)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Supporting_Documents_28329); // Supporting Documents (3)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329); // Accomplishment Remarks (3)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_4); // PI 4
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_Question_28429); // PI Question (4)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_28429); // Target (4)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_N_28429); // Target N (4)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_D_28429); // Target D (4)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_Remarks_28429); // Target Remarks (4)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_28429); // Accomplishment (4)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_N_28429); // Accomplishment N (4)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_D_28429); // Accomplishment D (4)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Supporting_Documents_28429); // Supporting Documents (4)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429); // Accomplishment Remarks (4)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_5); // PI 5
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_Question_28529); // PI Question (5)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_28529); // Target (5)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_N_28529); // Target N (5)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_D_28529); // Target D (5)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_Remarks_28529); // Target Remarks (5)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_28529); // Accomplishment (5)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_N_28529); // Accomplishment N (5)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_D_28529); // Accomplishment D (5)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Supporting_Documents_28529); // Supporting Documents (5)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529); // Accomplishment Remarks (5)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_6); // PI 6
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_Question_28629); // PI Question (6)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_28629); // Target (6)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_N_28629); // Target N (6)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_D_28629); // Target D (6)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_Remarks_28629); // Target Remarks (6)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_28629); // Accomplishment (6)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_N_28629); // Accomplishment N (6)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_D_28629); // Accomplishment D (6)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Supporting_Documents_28629); // Supporting Documents (6)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629); // Accomplishment Remarks (6)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_7); // PI 7
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_Question_28729); // PI Question (7)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_28729); // Target (7)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_N_28729); // Target N (7)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_D_28729); // Target D (7)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_Remarks_28729); // Target Remarks (7)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_28729); // Accomplishment (7)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_N_28729); // Accomplishment N (7)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_D_28729); // Accomplishment D (7)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Supporting_Documents_28729); // Supporting Documents (7)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729); // Accomplishment Remarks (7)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_8); // PI 8
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_Question_28829); // PI Question (8)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_28829); // Target (8)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_N_28829); // Target N (8)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_D_28829); // Target D (8)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_Remarks_28829); // Target Remarks (8)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_28829); // Accomplishment (8)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_N_28829); // Accomplishment N (8)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_D_28829); // Accomplishment D (8)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Supporting_Documents_28829); // Supporting Documents (8)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829); // Accomplishment Remarks (8)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_9); // PI 9
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_Question_28929); // PI Question (9)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_28929); // Target (9)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_N_28929); // Target N (9)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_D_28929); // Target D (9)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_Remarks_28929); // Target Remarks (9)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_28929); // Accomplishment (9)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_N_28929); // Accomplishment N (9)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_D_28929); // Accomplishment D (9)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Supporting_Documents_28929); // Supporting Documents (9)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929); // Accomplishment Remarks (9)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_10); // PI 10
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_Question_281029); // PI Question (10)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_281029); // Target (10)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_N_281029); // Target N (10)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_D_281029); // Target D (10)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_Remarks_281029); // Target Remarks (10)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_281029); // Accomplishment (10)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_N_281029); // Accomplishment N (10)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_D_281029); // Accomplishment D (10)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Supporting_Documents_281029); // Supporting Documents (10)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029); // Accomplishment Remarks (10)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_11); // PI 11
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_Question_281129); // PI Question (11)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_281129); // Target (11)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_N_281129); // Target N (11)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_D_281129); // Target D (11)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_Remarks_281129); // Target Remarks (11)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_281129); // Accomplishment (11)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_N_281129); // Accomplishment N (11)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_D_281129); // Accomplishment D (11)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Supporting_Documents_281129); // Supporting Documents (11)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129); // Accomplishment Remarks (11)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_12); // PI 12
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->PI_Question_281229); // PI Question (12)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_281229); // Target (12)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_N_281229); // Target N (12)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_D_281229); // Target D (12)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Target_Remarks_281229); // Target Remarks (12)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_281229); // Accomplishment (12)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_N_281229); // Accomplishment N (12)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_D_281229); // Accomplishment D (12)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Supporting_Documents_281229); // Supporting Documents (12)
			$frm_fp_rep_ta_form_a_1->UpdateSort($frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229); // Accomplishment Remarks (12)
			$frm_fp_rep_ta_form_a_1->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $frm_fp_rep_ta_form_a_1;
		$sOrderBy = $frm_fp_rep_ta_form_a_1->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($frm_fp_rep_ta_form_a_1->SqlOrderBy() <> "") {
				$sOrderBy = $frm_fp_rep_ta_form_a_1->SqlOrderBy();
				$frm_fp_rep_ta_form_a_1->setSessionOrderBy($sOrderBy);
				$frm_fp_rep_ta_form_a_1->PI_1->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $frm_fp_rep_ta_form_a_1;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$frm_fp_rep_ta_form_a_1->setSessionOrderBy($sOrderBy);
				$frm_fp_rep_ta_form_a_1->Constituent_University->setSort("");
				$frm_fp_rep_ta_form_a_1->Delivery_Unit->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_1->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_Question_28129->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_28129->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_N_28129->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_D_28129->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_Remarks_28129->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_28129->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->setSort("");
				$frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_2->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_Question_28229->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_28229->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_N_28229->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_D_28229->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_Remarks_28229->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_28229->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->setSort("");
				$frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_3->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_Question_28329->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_28329->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_N_28329->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_D_28329->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_Remarks_28329->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_28329->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->setSort("");
				$frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_4->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_Question_28429->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_28429->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_N_28429->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_D_28429->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_Remarks_28429->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_28429->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->setSort("");
				$frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_5->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_Question_28529->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_28529->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_N_28529->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_D_28529->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_Remarks_28529->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_28529->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->setSort("");
				$frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_6->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_Question_28629->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_28629->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_N_28629->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_D_28629->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_Remarks_28629->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_28629->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->setSort("");
				$frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_7->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_Question_28729->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_28729->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_N_28729->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_D_28729->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_Remarks_28729->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_28729->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->setSort("");
				$frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_8->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_Question_28829->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_28829->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_N_28829->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_D_28829->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_Remarks_28829->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_28829->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->setSort("");
				$frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_9->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_Question_28929->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_28929->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_N_28929->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_D_28929->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_Remarks_28929->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_28929->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->setSort("");
				$frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_10->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_Question_281029->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_281029->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_N_281029->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_D_281029->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_Remarks_281029->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_281029->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->setSort("");
				$frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_11->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_Question_281129->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_281129->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_N_281129->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_D_281129->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_Remarks_281129->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_281129->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->setSort("");
				$frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_12->setSort("");
				$frm_fp_rep_ta_form_a_1->PI_Question_281229->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_281229->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_N_281229->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_D_281229->setSort("");
				$frm_fp_rep_ta_form_a_1->Target_Remarks_281229->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_281229->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->setSort("");
				$frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->setSort("");
				$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$frm_fp_rep_ta_form_a_1->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $frm_fp_rep_ta_form_a_1;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $frm_fp_rep_ta_form_a_1, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $frm_fp_rep_ta_form_a_1;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $frm_fp_rep_ta_form_a_1;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$frm_fp_rep_ta_form_a_1->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$frm_fp_rep_ta_form_a_1->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $frm_fp_rep_ta_form_a_1->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$frm_fp_rep_ta_form_a_1->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$frm_fp_rep_ta_form_a_1->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$frm_fp_rep_ta_form_a_1->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $frm_fp_rep_ta_form_a_1;
		$frm_fp_rep_ta_form_a_1->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$frm_fp_rep_ta_form_a_1->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_fp_rep_ta_form_a_1;

		// Call Recordset Selecting event
		$frm_fp_rep_ta_form_a_1->Recordset_Selecting($frm_fp_rep_ta_form_a_1->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_fp_rep_ta_form_a_1->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_fp_rep_ta_form_a_1->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_rep_ta_form_a_1;
		$sFilter = $frm_fp_rep_ta_form_a_1->KeyFilter();

		// Call Row Selecting event
		$frm_fp_rep_ta_form_a_1->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_rep_ta_form_a_1->CurrentFilter = $sFilter;
		$sSql = $frm_fp_rep_ta_form_a_1->SQL();
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
		global $conn, $frm_fp_rep_ta_form_a_1;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_rep_ta_form_a_1->Row_Selected($row);
		$frm_fp_rep_ta_form_a_1->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_rep_ta_form_a_1->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_rep_ta_form_a_1->Constituent_University->setDbValue($rs->fields('Constituent University'));
		$frm_fp_rep_ta_form_a_1->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$frm_fp_rep_ta_form_a_1->PI_1->setDbValue($rs->fields('PI 1'));
		$frm_fp_rep_ta_form_a_1->PI_Question_28129->setDbValue($rs->fields('PI Question (1)'));
		$frm_fp_rep_ta_form_a_1->Target_28129->setDbValue($rs->fields('Target (1)'));
		$frm_fp_rep_ta_form_a_1->Target_N_28129->setDbValue($rs->fields('Target N (1)'));
		$frm_fp_rep_ta_form_a_1->Target_D_28129->setDbValue($rs->fields('Target D (1)'));
		$frm_fp_rep_ta_form_a_1->Target_Remarks_28129->setDbValue($rs->fields('Target Remarks (1)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_28129->setDbValue($rs->fields('Accomplishment (1)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->setDbValue($rs->fields('Accomplishment N (1)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->setDbValue($rs->fields('Accomplishment D (1)'));
		$frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->setDbValue($rs->fields('Supporting Documents (1)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->setDbValue($rs->fields('Accomplishment Remarks (1)'));
		$frm_fp_rep_ta_form_a_1->PI_2->setDbValue($rs->fields('PI 2'));
		$frm_fp_rep_ta_form_a_1->PI_Question_28229->setDbValue($rs->fields('PI Question (2)'));
		$frm_fp_rep_ta_form_a_1->Target_28229->setDbValue($rs->fields('Target (2)'));
		$frm_fp_rep_ta_form_a_1->Target_N_28229->setDbValue($rs->fields('Target N (2)'));
		$frm_fp_rep_ta_form_a_1->Target_D_28229->setDbValue($rs->fields('Target D (2)'));
		$frm_fp_rep_ta_form_a_1->Target_Remarks_28229->setDbValue($rs->fields('Target Remarks (2)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_28229->setDbValue($rs->fields('Accomplishment (2)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->setDbValue($rs->fields('Accomplishment N (2)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->setDbValue($rs->fields('Accomplishment D (2)'));
		$frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->setDbValue($rs->fields('Supporting Documents (2)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->setDbValue($rs->fields('Accomplishment Remarks (2)'));
		$frm_fp_rep_ta_form_a_1->PI_3->setDbValue($rs->fields('PI 3'));
		$frm_fp_rep_ta_form_a_1->PI_Question_28329->setDbValue($rs->fields('PI Question (3)'));
		$frm_fp_rep_ta_form_a_1->Target_28329->setDbValue($rs->fields('Target (3)'));
		$frm_fp_rep_ta_form_a_1->Target_N_28329->setDbValue($rs->fields('Target N (3)'));
		$frm_fp_rep_ta_form_a_1->Target_D_28329->setDbValue($rs->fields('Target D (3)'));
		$frm_fp_rep_ta_form_a_1->Target_Remarks_28329->setDbValue($rs->fields('Target Remarks (3)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_28329->setDbValue($rs->fields('Accomplishment (3)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->setDbValue($rs->fields('Accomplishment N (3)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->setDbValue($rs->fields('Accomplishment D (3)'));
		$frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->setDbValue($rs->fields('Supporting Documents (3)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->setDbValue($rs->fields('Accomplishment Remarks (3)'));
		$frm_fp_rep_ta_form_a_1->PI_4->setDbValue($rs->fields('PI 4'));
		$frm_fp_rep_ta_form_a_1->PI_Question_28429->setDbValue($rs->fields('PI Question (4)'));
		$frm_fp_rep_ta_form_a_1->Target_28429->setDbValue($rs->fields('Target (4)'));
		$frm_fp_rep_ta_form_a_1->Target_N_28429->setDbValue($rs->fields('Target N (4)'));
		$frm_fp_rep_ta_form_a_1->Target_D_28429->setDbValue($rs->fields('Target D (4)'));
		$frm_fp_rep_ta_form_a_1->Target_Remarks_28429->setDbValue($rs->fields('Target Remarks (4)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_28429->setDbValue($rs->fields('Accomplishment (4)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->setDbValue($rs->fields('Accomplishment N (4)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->setDbValue($rs->fields('Accomplishment D (4)'));
		$frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->setDbValue($rs->fields('Supporting Documents (4)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->setDbValue($rs->fields('Accomplishment Remarks (4)'));
		$frm_fp_rep_ta_form_a_1->PI_5->setDbValue($rs->fields('PI 5'));
		$frm_fp_rep_ta_form_a_1->PI_Question_28529->setDbValue($rs->fields('PI Question (5)'));
		$frm_fp_rep_ta_form_a_1->Target_28529->setDbValue($rs->fields('Target (5)'));
		$frm_fp_rep_ta_form_a_1->Target_N_28529->setDbValue($rs->fields('Target N (5)'));
		$frm_fp_rep_ta_form_a_1->Target_D_28529->setDbValue($rs->fields('Target D (5)'));
		$frm_fp_rep_ta_form_a_1->Target_Remarks_28529->setDbValue($rs->fields('Target Remarks (5)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_28529->setDbValue($rs->fields('Accomplishment (5)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->setDbValue($rs->fields('Accomplishment N (5)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->setDbValue($rs->fields('Accomplishment D (5)'));
		$frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->setDbValue($rs->fields('Supporting Documents (5)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->setDbValue($rs->fields('Accomplishment Remarks (5)'));
		$frm_fp_rep_ta_form_a_1->PI_6->setDbValue($rs->fields('PI 6'));
		$frm_fp_rep_ta_form_a_1->PI_Question_28629->setDbValue($rs->fields('PI Question (6)'));
		$frm_fp_rep_ta_form_a_1->Target_28629->setDbValue($rs->fields('Target (6)'));
		$frm_fp_rep_ta_form_a_1->Target_N_28629->setDbValue($rs->fields('Target N (6)'));
		$frm_fp_rep_ta_form_a_1->Target_D_28629->setDbValue($rs->fields('Target D (6)'));
		$frm_fp_rep_ta_form_a_1->Target_Remarks_28629->setDbValue($rs->fields('Target Remarks (6)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_28629->setDbValue($rs->fields('Accomplishment (6)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->setDbValue($rs->fields('Accomplishment N (6)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->setDbValue($rs->fields('Accomplishment D (6)'));
		$frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->setDbValue($rs->fields('Supporting Documents (6)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->setDbValue($rs->fields('Accomplishment Remarks (6)'));
		$frm_fp_rep_ta_form_a_1->PI_7->setDbValue($rs->fields('PI 7'));
		$frm_fp_rep_ta_form_a_1->PI_Question_28729->setDbValue($rs->fields('PI Question (7)'));
		$frm_fp_rep_ta_form_a_1->Target_28729->setDbValue($rs->fields('Target (7)'));
		$frm_fp_rep_ta_form_a_1->Target_N_28729->setDbValue($rs->fields('Target N (7)'));
		$frm_fp_rep_ta_form_a_1->Target_D_28729->setDbValue($rs->fields('Target D (7)'));
		$frm_fp_rep_ta_form_a_1->Target_Remarks_28729->setDbValue($rs->fields('Target Remarks (7)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_28729->setDbValue($rs->fields('Accomplishment (7)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->setDbValue($rs->fields('Accomplishment N (7)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->setDbValue($rs->fields('Accomplishment D (7)'));
		$frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->setDbValue($rs->fields('Supporting Documents (7)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->setDbValue($rs->fields('Accomplishment Remarks (7)'));
		$frm_fp_rep_ta_form_a_1->PI_8->setDbValue($rs->fields('PI 8'));
		$frm_fp_rep_ta_form_a_1->PI_Question_28829->setDbValue($rs->fields('PI Question (8)'));
		$frm_fp_rep_ta_form_a_1->Target_28829->setDbValue($rs->fields('Target (8)'));
		$frm_fp_rep_ta_form_a_1->Target_N_28829->setDbValue($rs->fields('Target N (8)'));
		$frm_fp_rep_ta_form_a_1->Target_D_28829->setDbValue($rs->fields('Target D (8)'));
		$frm_fp_rep_ta_form_a_1->Target_Remarks_28829->setDbValue($rs->fields('Target Remarks (8)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_28829->setDbValue($rs->fields('Accomplishment (8)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->setDbValue($rs->fields('Accomplishment N (8)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->setDbValue($rs->fields('Accomplishment D (8)'));
		$frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->setDbValue($rs->fields('Supporting Documents (8)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->setDbValue($rs->fields('Accomplishment Remarks (8)'));
		$frm_fp_rep_ta_form_a_1->PI_9->setDbValue($rs->fields('PI 9'));
		$frm_fp_rep_ta_form_a_1->PI_Question_28929->setDbValue($rs->fields('PI Question (9)'));
		$frm_fp_rep_ta_form_a_1->Target_28929->setDbValue($rs->fields('Target (9)'));
		$frm_fp_rep_ta_form_a_1->Target_N_28929->setDbValue($rs->fields('Target N (9)'));
		$frm_fp_rep_ta_form_a_1->Target_D_28929->setDbValue($rs->fields('Target D (9)'));
		$frm_fp_rep_ta_form_a_1->Target_Remarks_28929->setDbValue($rs->fields('Target Remarks (9)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_28929->setDbValue($rs->fields('Accomplishment (9)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->setDbValue($rs->fields('Accomplishment N (9)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->setDbValue($rs->fields('Accomplishment D (9)'));
		$frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->setDbValue($rs->fields('Supporting Documents (9)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->setDbValue($rs->fields('Accomplishment Remarks (9)'));
		$frm_fp_rep_ta_form_a_1->PI_10->setDbValue($rs->fields('PI 10'));
		$frm_fp_rep_ta_form_a_1->PI_Question_281029->setDbValue($rs->fields('PI Question (10)'));
		$frm_fp_rep_ta_form_a_1->Target_281029->setDbValue($rs->fields('Target (10)'));
		$frm_fp_rep_ta_form_a_1->Target_N_281029->setDbValue($rs->fields('Target N (10)'));
		$frm_fp_rep_ta_form_a_1->Target_D_281029->setDbValue($rs->fields('Target D (10)'));
		$frm_fp_rep_ta_form_a_1->Target_Remarks_281029->setDbValue($rs->fields('Target Remarks (10)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_281029->setDbValue($rs->fields('Accomplishment (10)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->setDbValue($rs->fields('Accomplishment N (10)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->setDbValue($rs->fields('Accomplishment D (10)'));
		$frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->setDbValue($rs->fields('Supporting Documents (10)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->setDbValue($rs->fields('Accomplishment Remarks (10)'));
		$frm_fp_rep_ta_form_a_1->PI_11->setDbValue($rs->fields('PI 11'));
		$frm_fp_rep_ta_form_a_1->PI_Question_281129->setDbValue($rs->fields('PI Question (11)'));
		$frm_fp_rep_ta_form_a_1->Target_281129->setDbValue($rs->fields('Target (11)'));
		$frm_fp_rep_ta_form_a_1->Target_N_281129->setDbValue($rs->fields('Target N (11)'));
		$frm_fp_rep_ta_form_a_1->Target_D_281129->setDbValue($rs->fields('Target D (11)'));
		$frm_fp_rep_ta_form_a_1->Target_Remarks_281129->setDbValue($rs->fields('Target Remarks (11)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_281129->setDbValue($rs->fields('Accomplishment (11)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->setDbValue($rs->fields('Accomplishment N (11)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->setDbValue($rs->fields('Accomplishment D (11)'));
		$frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->setDbValue($rs->fields('Supporting Documents (11)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->setDbValue($rs->fields('Accomplishment Remarks (11)'));
		$frm_fp_rep_ta_form_a_1->PI_12->setDbValue($rs->fields('PI 12'));
		$frm_fp_rep_ta_form_a_1->PI_Question_281229->setDbValue($rs->fields('PI Question (12)'));
		$frm_fp_rep_ta_form_a_1->Target_281229->setDbValue($rs->fields('Target (12)'));
		$frm_fp_rep_ta_form_a_1->Target_N_281229->setDbValue($rs->fields('Target N (12)'));
		$frm_fp_rep_ta_form_a_1->Target_D_281229->setDbValue($rs->fields('Target D (12)'));
		$frm_fp_rep_ta_form_a_1->Target_Remarks_281229->setDbValue($rs->fields('Target Remarks (12)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_281229->setDbValue($rs->fields('Accomplishment (12)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->setDbValue($rs->fields('Accomplishment N (12)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->setDbValue($rs->fields('Accomplishment D (12)'));
		$frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->setDbValue($rs->fields('Supporting Documents (12)'));
		$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->setDbValue($rs->fields('Accomplishment Remarks (12)'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_fp_rep_ta_form_a_1;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$frm_fp_rep_ta_form_a_1->CurrentFilter = $frm_fp_rep_ta_form_a_1->KeyFilter();
			$sSql = $frm_fp_rep_ta_form_a_1->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_rep_ta_form_a_1;

		// Initialize URLs
		$this->ViewUrl = $frm_fp_rep_ta_form_a_1->ViewUrl();
		$this->EditUrl = $frm_fp_rep_ta_form_a_1->EditUrl();
		$this->InlineEditUrl = $frm_fp_rep_ta_form_a_1->InlineEditUrl();
		$this->CopyUrl = $frm_fp_rep_ta_form_a_1->CopyUrl();
		$this->InlineCopyUrl = $frm_fp_rep_ta_form_a_1->InlineCopyUrl();
		$this->DeleteUrl = $frm_fp_rep_ta_form_a_1->DeleteUrl();

		// Call Row_Rendering event
		$frm_fp_rep_ta_form_a_1->Row_Rendering();

		// Common render codes for all row types
		// units_id
		// focal_person_id
		// Constituent University
		// Delivery Unit
		// PI 1
		// PI Question (1)
		// Target (1)
		// Target N (1)
		// Target D (1)
		// Target Remarks (1)
		// Accomplishment (1)
		// Accomplishment N (1)
		// Accomplishment D (1)
		// Supporting Documents (1)
		// Accomplishment Remarks (1)
		// PI 2
		// PI Question (2)
		// Target (2)
		// Target N (2)
		// Target D (2)
		// Target Remarks (2)
		// Accomplishment (2)
		// Accomplishment N (2)
		// Accomplishment D (2)
		// Supporting Documents (2)
		// Accomplishment Remarks (2)
		// PI 3
		// PI Question (3)
		// Target (3)
		// Target N (3)
		// Target D (3)
		// Target Remarks (3)
		// Accomplishment (3)
		// Accomplishment N (3)
		// Accomplishment D (3)
		// Supporting Documents (3)
		// Accomplishment Remarks (3)
		// PI 4
		// PI Question (4)
		// Target (4)
		// Target N (4)
		// Target D (4)
		// Target Remarks (4)
		// Accomplishment (4)
		// Accomplishment N (4)
		// Accomplishment D (4)
		// Supporting Documents (4)
		// Accomplishment Remarks (4)
		// PI 5
		// PI Question (5)
		// Target (5)
		// Target N (5)
		// Target D (5)
		// Target Remarks (5)
		// Accomplishment (5)
		// Accomplishment N (5)
		// Accomplishment D (5)
		// Supporting Documents (5)
		// Accomplishment Remarks (5)
		// PI 6
		// PI Question (6)
		// Target (6)
		// Target N (6)
		// Target D (6)
		// Target Remarks (6)
		// Accomplishment (6)
		// Accomplishment N (6)
		// Accomplishment D (6)
		// Supporting Documents (6)
		// Accomplishment Remarks (6)
		// PI 7
		// PI Question (7)
		// Target (7)
		// Target N (7)
		// Target D (7)
		// Target Remarks (7)
		// Accomplishment (7)
		// Accomplishment N (7)
		// Accomplishment D (7)
		// Supporting Documents (7)
		// Accomplishment Remarks (7)
		// PI 8
		// PI Question (8)
		// Target (8)
		// Target N (8)
		// Target D (8)
		// Target Remarks (8)
		// Accomplishment (8)
		// Accomplishment N (8)
		// Accomplishment D (8)
		// Supporting Documents (8)
		// Accomplishment Remarks (8)
		// PI 9
		// PI Question (9)
		// Target (9)
		// Target N (9)
		// Target D (9)
		// Target Remarks (9)
		// Accomplishment (9)
		// Accomplishment N (9)
		// Accomplishment D (9)
		// Supporting Documents (9)
		// Accomplishment Remarks (9)
		// PI 10
		// PI Question (10)
		// Target (10)
		// Target N (10)
		// Target D (10)
		// Target Remarks (10)
		// Accomplishment (10)
		// Accomplishment N (10)
		// Accomplishment D (10)
		// Supporting Documents (10)
		// Accomplishment Remarks (10)
		// PI 11
		// PI Question (11)
		// Target (11)
		// Target N (11)
		// Target D (11)
		// Target Remarks (11)
		// Accomplishment (11)
		// Accomplishment N (11)
		// Accomplishment D (11)
		// Supporting Documents (11)
		// Accomplishment Remarks (11)
		// PI 12
		// PI Question (12)
		// Target (12)
		// Target N (12)
		// Target D (12)
		// Target Remarks (12)
		// Accomplishment (12)
		// Accomplishment N (12)
		// Accomplishment D (12)
		// Supporting Documents (12)
		// Accomplishment Remarks (12)

		if ($frm_fp_rep_ta_form_a_1->RowType == UP_ROWTYPE_VIEW) { // View row

			// Constituent University
			$frm_fp_rep_ta_form_a_1->Constituent_University->ViewValue = $frm_fp_rep_ta_form_a_1->Constituent_University->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Constituent_University->ViewCustomAttributes = "";

			// Delivery Unit
			$frm_fp_rep_ta_form_a_1->Delivery_Unit->ViewValue = $frm_fp_rep_ta_form_a_1->Delivery_Unit->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Delivery_Unit->ViewCustomAttributes = "";

			// PI 1
			$frm_fp_rep_ta_form_a_1->PI_1->ViewValue = $frm_fp_rep_ta_form_a_1->PI_1->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_1->ViewCustomAttributes = "";

			// PI Question (1)
			$frm_fp_rep_ta_form_a_1->PI_Question_28129->ViewValue = $frm_fp_rep_ta_form_a_1->PI_Question_28129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_Question_28129->ViewCustomAttributes = "";

			// Target (1)
			$frm_fp_rep_ta_form_a_1->Target_28129->ViewValue = $frm_fp_rep_ta_form_a_1->Target_28129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_28129->ViewCustomAttributes = "";

			// Target N (1)
			$frm_fp_rep_ta_form_a_1->Target_N_28129->ViewValue = $frm_fp_rep_ta_form_a_1->Target_N_28129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_N_28129->ViewCustomAttributes = "";

			// Target D (1)
			$frm_fp_rep_ta_form_a_1->Target_D_28129->ViewValue = $frm_fp_rep_ta_form_a_1->Target_D_28129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_D_28129->ViewCustomAttributes = "";

			// Target Remarks (1)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28129->ViewValue = $frm_fp_rep_ta_form_a_1->Target_Remarks_28129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28129->ViewCustomAttributes = "";

			// Accomplishment (1)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28129->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_28129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_28129->ViewCustomAttributes = "";

			// Accomplishment N (1)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->ViewCustomAttributes = "";

			// Accomplishment D (1)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->ViewCustomAttributes = "";

			// Supporting Documents (1)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->ViewValue = $frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->ViewCustomAttributes = "";

			// Accomplishment Remarks (1)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->ViewCustomAttributes = "";

			// PI 2
			$frm_fp_rep_ta_form_a_1->PI_2->ViewValue = $frm_fp_rep_ta_form_a_1->PI_2->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_2->ViewCustomAttributes = "";

			// PI Question (2)
			$frm_fp_rep_ta_form_a_1->PI_Question_28229->ViewValue = $frm_fp_rep_ta_form_a_1->PI_Question_28229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_Question_28229->ViewCustomAttributes = "";

			// Target (2)
			$frm_fp_rep_ta_form_a_1->Target_28229->ViewValue = $frm_fp_rep_ta_form_a_1->Target_28229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_28229->ViewCustomAttributes = "";

			// Target N (2)
			$frm_fp_rep_ta_form_a_1->Target_N_28229->ViewValue = $frm_fp_rep_ta_form_a_1->Target_N_28229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_N_28229->ViewCustomAttributes = "";

			// Target D (2)
			$frm_fp_rep_ta_form_a_1->Target_D_28229->ViewValue = $frm_fp_rep_ta_form_a_1->Target_D_28229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_D_28229->ViewCustomAttributes = "";

			// Target Remarks (2)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28229->ViewValue = $frm_fp_rep_ta_form_a_1->Target_Remarks_28229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28229->ViewCustomAttributes = "";

			// Accomplishment (2)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28229->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_28229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_28229->ViewCustomAttributes = "";

			// Accomplishment N (2)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->ViewCustomAttributes = "";

			// Accomplishment D (2)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->ViewCustomAttributes = "";

			// Supporting Documents (2)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->ViewValue = $frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->ViewCustomAttributes = "";

			// Accomplishment Remarks (2)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->ViewCustomAttributes = "";

			// PI 3
			$frm_fp_rep_ta_form_a_1->PI_3->ViewValue = $frm_fp_rep_ta_form_a_1->PI_3->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_3->ViewCustomAttributes = "";

			// PI Question (3)
			$frm_fp_rep_ta_form_a_1->PI_Question_28329->ViewValue = $frm_fp_rep_ta_form_a_1->PI_Question_28329->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_Question_28329->ViewCustomAttributes = "";

			// Target (3)
			$frm_fp_rep_ta_form_a_1->Target_28329->ViewValue = $frm_fp_rep_ta_form_a_1->Target_28329->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_28329->ViewCustomAttributes = "";

			// Target N (3)
			$frm_fp_rep_ta_form_a_1->Target_N_28329->ViewValue = $frm_fp_rep_ta_form_a_1->Target_N_28329->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_N_28329->ViewCustomAttributes = "";

			// Target D (3)
			$frm_fp_rep_ta_form_a_1->Target_D_28329->ViewValue = $frm_fp_rep_ta_form_a_1->Target_D_28329->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_D_28329->ViewCustomAttributes = "";

			// Target Remarks (3)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28329->ViewValue = $frm_fp_rep_ta_form_a_1->Target_Remarks_28329->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28329->ViewCustomAttributes = "";

			// Accomplishment (3)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28329->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_28329->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_28329->ViewCustomAttributes = "";

			// Accomplishment N (3)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->ViewCustomAttributes = "";

			// Accomplishment D (3)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->ViewCustomAttributes = "";

			// Supporting Documents (3)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->ViewValue = $frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->ViewCustomAttributes = "";

			// Accomplishment Remarks (3)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->ViewCustomAttributes = "";

			// PI 4
			$frm_fp_rep_ta_form_a_1->PI_4->ViewValue = $frm_fp_rep_ta_form_a_1->PI_4->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_4->ViewCustomAttributes = "";

			// PI Question (4)
			$frm_fp_rep_ta_form_a_1->PI_Question_28429->ViewValue = $frm_fp_rep_ta_form_a_1->PI_Question_28429->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_Question_28429->ViewCustomAttributes = "";

			// Target (4)
			$frm_fp_rep_ta_form_a_1->Target_28429->ViewValue = $frm_fp_rep_ta_form_a_1->Target_28429->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_28429->ViewCustomAttributes = "";

			// Target N (4)
			$frm_fp_rep_ta_form_a_1->Target_N_28429->ViewValue = $frm_fp_rep_ta_form_a_1->Target_N_28429->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_N_28429->ViewCustomAttributes = "";

			// Target D (4)
			$frm_fp_rep_ta_form_a_1->Target_D_28429->ViewValue = $frm_fp_rep_ta_form_a_1->Target_D_28429->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_D_28429->ViewCustomAttributes = "";

			// Target Remarks (4)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28429->ViewValue = $frm_fp_rep_ta_form_a_1->Target_Remarks_28429->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28429->ViewCustomAttributes = "";

			// Accomplishment (4)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28429->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_28429->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_28429->ViewCustomAttributes = "";

			// Accomplishment N (4)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->ViewCustomAttributes = "";

			// Accomplishment D (4)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->ViewCustomAttributes = "";

			// Supporting Documents (4)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->ViewValue = $frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->ViewCustomAttributes = "";

			// Accomplishment Remarks (4)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->ViewCustomAttributes = "";

			// PI 5
			$frm_fp_rep_ta_form_a_1->PI_5->ViewValue = $frm_fp_rep_ta_form_a_1->PI_5->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_5->ViewCustomAttributes = "";

			// PI Question (5)
			$frm_fp_rep_ta_form_a_1->PI_Question_28529->ViewValue = $frm_fp_rep_ta_form_a_1->PI_Question_28529->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_Question_28529->ViewCustomAttributes = "";

			// Target (5)
			$frm_fp_rep_ta_form_a_1->Target_28529->ViewValue = $frm_fp_rep_ta_form_a_1->Target_28529->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_28529->ViewCustomAttributes = "";

			// Target N (5)
			$frm_fp_rep_ta_form_a_1->Target_N_28529->ViewValue = $frm_fp_rep_ta_form_a_1->Target_N_28529->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_N_28529->ViewCustomAttributes = "";

			// Target D (5)
			$frm_fp_rep_ta_form_a_1->Target_D_28529->ViewValue = $frm_fp_rep_ta_form_a_1->Target_D_28529->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_D_28529->ViewCustomAttributes = "";

			// Target Remarks (5)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28529->ViewValue = $frm_fp_rep_ta_form_a_1->Target_Remarks_28529->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28529->ViewCustomAttributes = "";

			// Accomplishment (5)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28529->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_28529->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_28529->ViewCustomAttributes = "";

			// Accomplishment N (5)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->ViewCustomAttributes = "";

			// Accomplishment D (5)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->ViewCustomAttributes = "";

			// Supporting Documents (5)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->ViewValue = $frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->ViewCustomAttributes = "";

			// Accomplishment Remarks (5)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->ViewCustomAttributes = "";

			// PI 6
			$frm_fp_rep_ta_form_a_1->PI_6->ViewValue = $frm_fp_rep_ta_form_a_1->PI_6->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_6->ViewCustomAttributes = "";

			// PI Question (6)
			$frm_fp_rep_ta_form_a_1->PI_Question_28629->ViewValue = $frm_fp_rep_ta_form_a_1->PI_Question_28629->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_Question_28629->ViewCustomAttributes = "";

			// Target (6)
			$frm_fp_rep_ta_form_a_1->Target_28629->ViewValue = $frm_fp_rep_ta_form_a_1->Target_28629->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_28629->ViewCustomAttributes = "";

			// Target N (6)
			$frm_fp_rep_ta_form_a_1->Target_N_28629->ViewValue = $frm_fp_rep_ta_form_a_1->Target_N_28629->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_N_28629->ViewCustomAttributes = "";

			// Target D (6)
			$frm_fp_rep_ta_form_a_1->Target_D_28629->ViewValue = $frm_fp_rep_ta_form_a_1->Target_D_28629->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_D_28629->ViewCustomAttributes = "";

			// Target Remarks (6)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28629->ViewValue = $frm_fp_rep_ta_form_a_1->Target_Remarks_28629->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28629->ViewCustomAttributes = "";

			// Accomplishment (6)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28629->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_28629->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_28629->ViewCustomAttributes = "";

			// Accomplishment N (6)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->ViewCustomAttributes = "";

			// Accomplishment D (6)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->ViewCustomAttributes = "";

			// Supporting Documents (6)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->ViewValue = $frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->ViewCustomAttributes = "";

			// Accomplishment Remarks (6)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->ViewCustomAttributes = "";

			// PI 7
			$frm_fp_rep_ta_form_a_1->PI_7->ViewValue = $frm_fp_rep_ta_form_a_1->PI_7->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_7->ViewCustomAttributes = "";

			// PI Question (7)
			$frm_fp_rep_ta_form_a_1->PI_Question_28729->ViewValue = $frm_fp_rep_ta_form_a_1->PI_Question_28729->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_Question_28729->ViewCustomAttributes = "";

			// Target (7)
			$frm_fp_rep_ta_form_a_1->Target_28729->ViewValue = $frm_fp_rep_ta_form_a_1->Target_28729->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_28729->ViewCustomAttributes = "";

			// Target N (7)
			$frm_fp_rep_ta_form_a_1->Target_N_28729->ViewValue = $frm_fp_rep_ta_form_a_1->Target_N_28729->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_N_28729->ViewCustomAttributes = "";

			// Target D (7)
			$frm_fp_rep_ta_form_a_1->Target_D_28729->ViewValue = $frm_fp_rep_ta_form_a_1->Target_D_28729->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_D_28729->ViewCustomAttributes = "";

			// Target Remarks (7)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28729->ViewValue = $frm_fp_rep_ta_form_a_1->Target_Remarks_28729->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28729->ViewCustomAttributes = "";

			// Accomplishment (7)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28729->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_28729->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_28729->ViewCustomAttributes = "";

			// Accomplishment N (7)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->ViewCustomAttributes = "";

			// Accomplishment D (7)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->ViewCustomAttributes = "";

			// Supporting Documents (7)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->ViewValue = $frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->ViewCustomAttributes = "";

			// Accomplishment Remarks (7)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->ViewCustomAttributes = "";

			// PI 8
			$frm_fp_rep_ta_form_a_1->PI_8->ViewValue = $frm_fp_rep_ta_form_a_1->PI_8->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_8->ViewCustomAttributes = "";

			// PI Question (8)
			$frm_fp_rep_ta_form_a_1->PI_Question_28829->ViewValue = $frm_fp_rep_ta_form_a_1->PI_Question_28829->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_Question_28829->ViewCustomAttributes = "";

			// Target (8)
			$frm_fp_rep_ta_form_a_1->Target_28829->ViewValue = $frm_fp_rep_ta_form_a_1->Target_28829->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_28829->ViewCustomAttributes = "";

			// Target N (8)
			$frm_fp_rep_ta_form_a_1->Target_N_28829->ViewValue = $frm_fp_rep_ta_form_a_1->Target_N_28829->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_N_28829->ViewCustomAttributes = "";

			// Target D (8)
			$frm_fp_rep_ta_form_a_1->Target_D_28829->ViewValue = $frm_fp_rep_ta_form_a_1->Target_D_28829->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_D_28829->ViewCustomAttributes = "";

			// Target Remarks (8)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28829->ViewValue = $frm_fp_rep_ta_form_a_1->Target_Remarks_28829->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28829->ViewCustomAttributes = "";

			// Accomplishment (8)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28829->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_28829->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_28829->ViewCustomAttributes = "";

			// Accomplishment N (8)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->ViewCustomAttributes = "";

			// Accomplishment D (8)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->ViewCustomAttributes = "";

			// Supporting Documents (8)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->ViewValue = $frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->ViewCustomAttributes = "";

			// Accomplishment Remarks (8)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->ViewCustomAttributes = "";

			// PI 9
			$frm_fp_rep_ta_form_a_1->PI_9->ViewValue = $frm_fp_rep_ta_form_a_1->PI_9->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_9->ViewCustomAttributes = "";

			// PI Question (9)
			$frm_fp_rep_ta_form_a_1->PI_Question_28929->ViewValue = $frm_fp_rep_ta_form_a_1->PI_Question_28929->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_Question_28929->ViewCustomAttributes = "";

			// Target (9)
			$frm_fp_rep_ta_form_a_1->Target_28929->ViewValue = $frm_fp_rep_ta_form_a_1->Target_28929->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_28929->ViewCustomAttributes = "";

			// Target N (9)
			$frm_fp_rep_ta_form_a_1->Target_N_28929->ViewValue = $frm_fp_rep_ta_form_a_1->Target_N_28929->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_N_28929->ViewCustomAttributes = "";

			// Target D (9)
			$frm_fp_rep_ta_form_a_1->Target_D_28929->ViewValue = $frm_fp_rep_ta_form_a_1->Target_D_28929->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_D_28929->ViewCustomAttributes = "";

			// Target Remarks (9)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28929->ViewValue = $frm_fp_rep_ta_form_a_1->Target_Remarks_28929->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28929->ViewCustomAttributes = "";

			// Accomplishment (9)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28929->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_28929->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_28929->ViewCustomAttributes = "";

			// Accomplishment N (9)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->ViewCustomAttributes = "";

			// Accomplishment D (9)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->ViewCustomAttributes = "";

			// Supporting Documents (9)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->ViewValue = $frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->ViewCustomAttributes = "";

			// Accomplishment Remarks (9)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->ViewCustomAttributes = "";

			// PI 10
			$frm_fp_rep_ta_form_a_1->PI_10->ViewValue = $frm_fp_rep_ta_form_a_1->PI_10->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_10->ViewCustomAttributes = "";

			// PI Question (10)
			$frm_fp_rep_ta_form_a_1->PI_Question_281029->ViewValue = $frm_fp_rep_ta_form_a_1->PI_Question_281029->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_Question_281029->ViewCustomAttributes = "";

			// Target (10)
			$frm_fp_rep_ta_form_a_1->Target_281029->ViewValue = $frm_fp_rep_ta_form_a_1->Target_281029->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_281029->ViewCustomAttributes = "";

			// Target N (10)
			$frm_fp_rep_ta_form_a_1->Target_N_281029->ViewValue = $frm_fp_rep_ta_form_a_1->Target_N_281029->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_N_281029->ViewCustomAttributes = "";

			// Target D (10)
			$frm_fp_rep_ta_form_a_1->Target_D_281029->ViewValue = $frm_fp_rep_ta_form_a_1->Target_D_281029->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_D_281029->ViewCustomAttributes = "";

			// Target Remarks (10)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281029->ViewValue = $frm_fp_rep_ta_form_a_1->Target_Remarks_281029->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281029->ViewCustomAttributes = "";

			// Accomplishment (10)
			$frm_fp_rep_ta_form_a_1->Accomplishment_281029->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_281029->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_281029->ViewCustomAttributes = "";

			// Accomplishment N (10)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->ViewCustomAttributes = "";

			// Accomplishment D (10)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->ViewCustomAttributes = "";

			// Supporting Documents (10)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->ViewValue = $frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->ViewCustomAttributes = "";

			// Accomplishment Remarks (10)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->ViewCustomAttributes = "";

			// PI 11
			$frm_fp_rep_ta_form_a_1->PI_11->ViewValue = $frm_fp_rep_ta_form_a_1->PI_11->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_11->ViewCustomAttributes = "";

			// PI Question (11)
			$frm_fp_rep_ta_form_a_1->PI_Question_281129->ViewValue = $frm_fp_rep_ta_form_a_1->PI_Question_281129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_Question_281129->ViewCustomAttributes = "";

			// Target (11)
			$frm_fp_rep_ta_form_a_1->Target_281129->ViewValue = $frm_fp_rep_ta_form_a_1->Target_281129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_281129->ViewCustomAttributes = "";

			// Target N (11)
			$frm_fp_rep_ta_form_a_1->Target_N_281129->ViewValue = $frm_fp_rep_ta_form_a_1->Target_N_281129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_N_281129->ViewCustomAttributes = "";

			// Target D (11)
			$frm_fp_rep_ta_form_a_1->Target_D_281129->ViewValue = $frm_fp_rep_ta_form_a_1->Target_D_281129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_D_281129->ViewCustomAttributes = "";

			// Target Remarks (11)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281129->ViewValue = $frm_fp_rep_ta_form_a_1->Target_Remarks_281129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281129->ViewCustomAttributes = "";

			// Accomplishment (11)
			$frm_fp_rep_ta_form_a_1->Accomplishment_281129->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_281129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_281129->ViewCustomAttributes = "";

			// Accomplishment N (11)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->ViewCustomAttributes = "";

			// Accomplishment D (11)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->ViewCustomAttributes = "";

			// Supporting Documents (11)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->ViewValue = $frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->ViewCustomAttributes = "";

			// Accomplishment Remarks (11)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->ViewCustomAttributes = "";

			// PI 12
			$frm_fp_rep_ta_form_a_1->PI_12->ViewValue = $frm_fp_rep_ta_form_a_1->PI_12->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_12->ViewCustomAttributes = "";

			// PI Question (12)
			$frm_fp_rep_ta_form_a_1->PI_Question_281229->ViewValue = $frm_fp_rep_ta_form_a_1->PI_Question_281229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->PI_Question_281229->ViewCustomAttributes = "";

			// Target (12)
			$frm_fp_rep_ta_form_a_1->Target_281229->ViewValue = $frm_fp_rep_ta_form_a_1->Target_281229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_281229->ViewCustomAttributes = "";

			// Target N (12)
			$frm_fp_rep_ta_form_a_1->Target_N_281229->ViewValue = $frm_fp_rep_ta_form_a_1->Target_N_281229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_N_281229->ViewCustomAttributes = "";

			// Target D (12)
			$frm_fp_rep_ta_form_a_1->Target_D_281229->ViewValue = $frm_fp_rep_ta_form_a_1->Target_D_281229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_D_281229->ViewCustomAttributes = "";

			// Target Remarks (12)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281229->ViewValue = $frm_fp_rep_ta_form_a_1->Target_Remarks_281229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281229->ViewCustomAttributes = "";

			// Accomplishment (12)
			$frm_fp_rep_ta_form_a_1->Accomplishment_281229->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_281229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_281229->ViewCustomAttributes = "";

			// Accomplishment N (12)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->ViewCustomAttributes = "";

			// Accomplishment D (12)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->ViewCustomAttributes = "";

			// Supporting Documents (12)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->ViewValue = $frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->ViewCustomAttributes = "";

			// Accomplishment Remarks (12)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->ViewValue = $frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->CurrentValue;
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->ViewCustomAttributes = "";

			// Constituent University
			$frm_fp_rep_ta_form_a_1->Constituent_University->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Constituent_University->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Constituent_University->TooltipValue = "";

			// Delivery Unit
			$frm_fp_rep_ta_form_a_1->Delivery_Unit->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Delivery_Unit->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Delivery_Unit->TooltipValue = "";

			// PI 1
			$frm_fp_rep_ta_form_a_1->PI_1->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_1->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_1->TooltipValue = "";

			// PI Question (1)
			$frm_fp_rep_ta_form_a_1->PI_Question_28129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28129->TooltipValue = "";

			// Target (1)
			$frm_fp_rep_ta_form_a_1->Target_28129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_28129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_28129->TooltipValue = "";

			// Target N (1)
			$frm_fp_rep_ta_form_a_1->Target_N_28129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28129->TooltipValue = "";

			// Target D (1)
			$frm_fp_rep_ta_form_a_1->Target_D_28129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28129->TooltipValue = "";

			// Target Remarks (1)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28129->TooltipValue = "";

			// Accomplishment (1)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28129->TooltipValue = "";

			// Accomplishment N (1)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28129->TooltipValue = "";

			// Accomplishment D (1)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28129->TooltipValue = "";

			// Supporting Documents (1)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28129->TooltipValue = "";

			// Accomplishment Remarks (1)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28129->TooltipValue = "";

			// PI 2
			$frm_fp_rep_ta_form_a_1->PI_2->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_2->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_2->TooltipValue = "";

			// PI Question (2)
			$frm_fp_rep_ta_form_a_1->PI_Question_28229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28229->TooltipValue = "";

			// Target (2)
			$frm_fp_rep_ta_form_a_1->Target_28229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_28229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_28229->TooltipValue = "";

			// Target N (2)
			$frm_fp_rep_ta_form_a_1->Target_N_28229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28229->TooltipValue = "";

			// Target D (2)
			$frm_fp_rep_ta_form_a_1->Target_D_28229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28229->TooltipValue = "";

			// Target Remarks (2)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28229->TooltipValue = "";

			// Accomplishment (2)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28229->TooltipValue = "";

			// Accomplishment N (2)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28229->TooltipValue = "";

			// Accomplishment D (2)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28229->TooltipValue = "";

			// Supporting Documents (2)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28229->TooltipValue = "";

			// Accomplishment Remarks (2)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28229->TooltipValue = "";

			// PI 3
			$frm_fp_rep_ta_form_a_1->PI_3->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_3->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_3->TooltipValue = "";

			// PI Question (3)
			$frm_fp_rep_ta_form_a_1->PI_Question_28329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28329->TooltipValue = "";

			// Target (3)
			$frm_fp_rep_ta_form_a_1->Target_28329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_28329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_28329->TooltipValue = "";

			// Target N (3)
			$frm_fp_rep_ta_form_a_1->Target_N_28329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28329->TooltipValue = "";

			// Target D (3)
			$frm_fp_rep_ta_form_a_1->Target_D_28329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28329->TooltipValue = "";

			// Target Remarks (3)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28329->TooltipValue = "";

			// Accomplishment (3)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28329->TooltipValue = "";

			// Accomplishment N (3)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28329->TooltipValue = "";

			// Accomplishment D (3)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28329->TooltipValue = "";

			// Supporting Documents (3)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28329->TooltipValue = "";

			// Accomplishment Remarks (3)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28329->TooltipValue = "";

			// PI 4
			$frm_fp_rep_ta_form_a_1->PI_4->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_4->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_4->TooltipValue = "";

			// PI Question (4)
			$frm_fp_rep_ta_form_a_1->PI_Question_28429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28429->TooltipValue = "";

			// Target (4)
			$frm_fp_rep_ta_form_a_1->Target_28429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_28429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_28429->TooltipValue = "";

			// Target N (4)
			$frm_fp_rep_ta_form_a_1->Target_N_28429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28429->TooltipValue = "";

			// Target D (4)
			$frm_fp_rep_ta_form_a_1->Target_D_28429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28429->TooltipValue = "";

			// Target Remarks (4)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28429->TooltipValue = "";

			// Accomplishment (4)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28429->TooltipValue = "";

			// Accomplishment N (4)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28429->TooltipValue = "";

			// Accomplishment D (4)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28429->TooltipValue = "";

			// Supporting Documents (4)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28429->TooltipValue = "";

			// Accomplishment Remarks (4)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28429->TooltipValue = "";

			// PI 5
			$frm_fp_rep_ta_form_a_1->PI_5->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_5->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_5->TooltipValue = "";

			// PI Question (5)
			$frm_fp_rep_ta_form_a_1->PI_Question_28529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28529->TooltipValue = "";

			// Target (5)
			$frm_fp_rep_ta_form_a_1->Target_28529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_28529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_28529->TooltipValue = "";

			// Target N (5)
			$frm_fp_rep_ta_form_a_1->Target_N_28529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28529->TooltipValue = "";

			// Target D (5)
			$frm_fp_rep_ta_form_a_1->Target_D_28529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28529->TooltipValue = "";

			// Target Remarks (5)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28529->TooltipValue = "";

			// Accomplishment (5)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28529->TooltipValue = "";

			// Accomplishment N (5)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28529->TooltipValue = "";

			// Accomplishment D (5)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28529->TooltipValue = "";

			// Supporting Documents (5)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28529->TooltipValue = "";

			// Accomplishment Remarks (5)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28529->TooltipValue = "";

			// PI 6
			$frm_fp_rep_ta_form_a_1->PI_6->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_6->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_6->TooltipValue = "";

			// PI Question (6)
			$frm_fp_rep_ta_form_a_1->PI_Question_28629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28629->TooltipValue = "";

			// Target (6)
			$frm_fp_rep_ta_form_a_1->Target_28629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_28629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_28629->TooltipValue = "";

			// Target N (6)
			$frm_fp_rep_ta_form_a_1->Target_N_28629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28629->TooltipValue = "";

			// Target D (6)
			$frm_fp_rep_ta_form_a_1->Target_D_28629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28629->TooltipValue = "";

			// Target Remarks (6)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28629->TooltipValue = "";

			// Accomplishment (6)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28629->TooltipValue = "";

			// Accomplishment N (6)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28629->TooltipValue = "";

			// Accomplishment D (6)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28629->TooltipValue = "";

			// Supporting Documents (6)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28629->TooltipValue = "";

			// Accomplishment Remarks (6)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28629->TooltipValue = "";

			// PI 7
			$frm_fp_rep_ta_form_a_1->PI_7->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_7->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_7->TooltipValue = "";

			// PI Question (7)
			$frm_fp_rep_ta_form_a_1->PI_Question_28729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28729->TooltipValue = "";

			// Target (7)
			$frm_fp_rep_ta_form_a_1->Target_28729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_28729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_28729->TooltipValue = "";

			// Target N (7)
			$frm_fp_rep_ta_form_a_1->Target_N_28729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28729->TooltipValue = "";

			// Target D (7)
			$frm_fp_rep_ta_form_a_1->Target_D_28729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28729->TooltipValue = "";

			// Target Remarks (7)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28729->TooltipValue = "";

			// Accomplishment (7)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28729->TooltipValue = "";

			// Accomplishment N (7)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28729->TooltipValue = "";

			// Accomplishment D (7)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28729->TooltipValue = "";

			// Supporting Documents (7)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28729->TooltipValue = "";

			// Accomplishment Remarks (7)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28729->TooltipValue = "";

			// PI 8
			$frm_fp_rep_ta_form_a_1->PI_8->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_8->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_8->TooltipValue = "";

			// PI Question (8)
			$frm_fp_rep_ta_form_a_1->PI_Question_28829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28829->TooltipValue = "";

			// Target (8)
			$frm_fp_rep_ta_form_a_1->Target_28829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_28829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_28829->TooltipValue = "";

			// Target N (8)
			$frm_fp_rep_ta_form_a_1->Target_N_28829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28829->TooltipValue = "";

			// Target D (8)
			$frm_fp_rep_ta_form_a_1->Target_D_28829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28829->TooltipValue = "";

			// Target Remarks (8)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28829->TooltipValue = "";

			// Accomplishment (8)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28829->TooltipValue = "";

			// Accomplishment N (8)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28829->TooltipValue = "";

			// Accomplishment D (8)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28829->TooltipValue = "";

			// Supporting Documents (8)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28829->TooltipValue = "";

			// Accomplishment Remarks (8)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28829->TooltipValue = "";

			// PI 9
			$frm_fp_rep_ta_form_a_1->PI_9->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_9->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_9->TooltipValue = "";

			// PI Question (9)
			$frm_fp_rep_ta_form_a_1->PI_Question_28929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_28929->TooltipValue = "";

			// Target (9)
			$frm_fp_rep_ta_form_a_1->Target_28929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_28929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_28929->TooltipValue = "";

			// Target N (9)
			$frm_fp_rep_ta_form_a_1->Target_N_28929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_N_28929->TooltipValue = "";

			// Target D (9)
			$frm_fp_rep_ta_form_a_1->Target_D_28929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_D_28929->TooltipValue = "";

			// Target Remarks (9)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_28929->TooltipValue = "";

			// Accomplishment (9)
			$frm_fp_rep_ta_form_a_1->Accomplishment_28929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_28929->TooltipValue = "";

			// Accomplishment N (9)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_28929->TooltipValue = "";

			// Accomplishment D (9)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_28929->TooltipValue = "";

			// Supporting Documents (9)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_28929->TooltipValue = "";

			// Accomplishment Remarks (9)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_28929->TooltipValue = "";

			// PI 10
			$frm_fp_rep_ta_form_a_1->PI_10->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_10->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_10->TooltipValue = "";

			// PI Question (10)
			$frm_fp_rep_ta_form_a_1->PI_Question_281029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_281029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_281029->TooltipValue = "";

			// Target (10)
			$frm_fp_rep_ta_form_a_1->Target_281029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_281029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_281029->TooltipValue = "";

			// Target N (10)
			$frm_fp_rep_ta_form_a_1->Target_N_281029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_N_281029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_N_281029->TooltipValue = "";

			// Target D (10)
			$frm_fp_rep_ta_form_a_1->Target_D_281029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_D_281029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_D_281029->TooltipValue = "";

			// Target Remarks (10)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281029->TooltipValue = "";

			// Accomplishment (10)
			$frm_fp_rep_ta_form_a_1->Accomplishment_281029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_281029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_281029->TooltipValue = "";

			// Accomplishment N (10)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281029->TooltipValue = "";

			// Accomplishment D (10)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281029->TooltipValue = "";

			// Supporting Documents (10)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281029->TooltipValue = "";

			// Accomplishment Remarks (10)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281029->TooltipValue = "";

			// PI 11
			$frm_fp_rep_ta_form_a_1->PI_11->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_11->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_11->TooltipValue = "";

			// PI Question (11)
			$frm_fp_rep_ta_form_a_1->PI_Question_281129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_281129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_281129->TooltipValue = "";

			// Target (11)
			$frm_fp_rep_ta_form_a_1->Target_281129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_281129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_281129->TooltipValue = "";

			// Target N (11)
			$frm_fp_rep_ta_form_a_1->Target_N_281129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_N_281129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_N_281129->TooltipValue = "";

			// Target D (11)
			$frm_fp_rep_ta_form_a_1->Target_D_281129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_D_281129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_D_281129->TooltipValue = "";

			// Target Remarks (11)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281129->TooltipValue = "";

			// Accomplishment (11)
			$frm_fp_rep_ta_form_a_1->Accomplishment_281129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_281129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_281129->TooltipValue = "";

			// Accomplishment N (11)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281129->TooltipValue = "";

			// Accomplishment D (11)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281129->TooltipValue = "";

			// Supporting Documents (11)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281129->TooltipValue = "";

			// Accomplishment Remarks (11)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281129->TooltipValue = "";

			// PI 12
			$frm_fp_rep_ta_form_a_1->PI_12->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_12->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_12->TooltipValue = "";

			// PI Question (12)
			$frm_fp_rep_ta_form_a_1->PI_Question_281229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_281229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->PI_Question_281229->TooltipValue = "";

			// Target (12)
			$frm_fp_rep_ta_form_a_1->Target_281229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_281229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_281229->TooltipValue = "";

			// Target N (12)
			$frm_fp_rep_ta_form_a_1->Target_N_281229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_N_281229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_N_281229->TooltipValue = "";

			// Target D (12)
			$frm_fp_rep_ta_form_a_1->Target_D_281229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_D_281229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_D_281229->TooltipValue = "";

			// Target Remarks (12)
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Target_Remarks_281229->TooltipValue = "";

			// Accomplishment (12)
			$frm_fp_rep_ta_form_a_1->Accomplishment_281229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_281229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_281229->TooltipValue = "";

			// Accomplishment N (12)
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_N_281229->TooltipValue = "";

			// Accomplishment D (12)
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_D_281229->TooltipValue = "";

			// Supporting Documents (12)
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Supporting_Documents_281229->TooltipValue = "";

			// Accomplishment Remarks (12)
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->LinkCustomAttributes = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->HrefValue = "";
			$frm_fp_rep_ta_form_a_1->Accomplishment_Remarks_281229->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($frm_fp_rep_ta_form_a_1->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_rep_ta_form_a_1->Row_Rendered();
	}

	// Set up export options
	function SetupExportOptions() {
		global $Language, $frm_fp_rep_ta_form_a_1;

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
		$item->Body = "<a name=\"emf_frm_fp_rep_ta_form_a_1\" id=\"emf_frm_fp_rep_ta_form_a_1\" href=\"javascript:void(0);\" onclick=\"up_EmailDialogShow({lnk:'emf_frm_fp_rep_ta_form_a_1',hdr:upLanguage.Phrase('ExportToEmail'),f:document.ffrm_fp_rep_ta_form_a_1list,sel:false});\">" . $Language->Phrase("ExportToEmail") . "</a>";
		$item->Visible = FALSE;

		// Hide options for export/action
		if ($frm_fp_rep_ta_form_a_1->Export <> "" ||
			$frm_fp_rep_ta_form_a_1->CurrentAction <> "")
			$this->ExportOptions->HideAllOptions();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	function ExportData() {
		global $frm_fp_rep_ta_form_a_1;
		$utf8 = (strtolower(UP_CHARSET) == "utf-8");
		$bSelectLimit = UP_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->TotalRecs = $frm_fp_rep_ta_form_a_1->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;

		// Export all
		if ($frm_fp_rep_ta_form_a_1->ExportAll) {
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
		if ($frm_fp_rep_ta_form_a_1->Export == "xml") {
			$XmlDoc = new cXMLDocument(UP_XML_ENCODING);
		} else {
			$ExportDoc = new cExportDocument($frm_fp_rep_ta_form_a_1, "h");
		}
		$ParentTable = "";
		if ($bSelectLimit) {
			$StartRec = 1;
			$StopRec = $this->DisplayRecs;
		} else {
			$StartRec = $this->StartRec;
			$StopRec = $this->StopRec;
		}
		if ($frm_fp_rep_ta_form_a_1->Export == "xml") {
			$frm_fp_rep_ta_form_a_1->ExportXmlDocument($XmlDoc, ($ParentTable <> ""), $rs, $StartRec, $StopRec, "");
		} else {
			$sHeader = $this->PageHeader;
			$this->Page_DataRendering($sHeader);
			$ExportDoc->Text .= $sHeader;
			$frm_fp_rep_ta_form_a_1->ExportDocument($ExportDoc, $rs, $StartRec, $StopRec, "");
			$sFooter = $this->PageFooter;
			$this->Page_DataRendered($sFooter);
			$ExportDoc->Text .= $sFooter;
		}

		// Close recordset
		$rs->Close();

		// Export header and footer
		if ($frm_fp_rep_ta_form_a_1->Export <> "xml") {
			$ExportDoc->ExportHeaderAndFooter();
		}

		// Clean output buffer
		if (!UP_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($frm_fp_rep_ta_form_a_1->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (UP_DEBUG_ENABLED)
			echo up_DebugMsg();

		// Output data
		if ($frm_fp_rep_ta_form_a_1->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($frm_fp_rep_ta_form_a_1->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($frm_fp_rep_ta_form_a_1->ExportReturnUrl());
		} elseif ($frm_fp_rep_ta_form_a_1->Export == "pdf") {
			$this->ExportPDF($ExportDoc->Text);
		} else {
			echo $ExportDoc->Text;
		}
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $frm_fp_rep_ta_form_a_1;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($frm_fp_rep_ta_form_a_1->focal_person_id->CurrentValue);
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
