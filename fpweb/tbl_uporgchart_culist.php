<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_uporgchart_cuinfo.php" ?>
<?php include_once "tbl_uporgchart_unitinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_uporgchart_cu_list = new ctbl_uporgchart_cu_list();
$Page =& $tbl_uporgchart_cu_list;

// Page init
$tbl_uporgchart_cu_list->Page_Init();

// Page main
$tbl_uporgchart_cu_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($tbl_uporgchart_cu->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_uporgchart_cu_list = new up_Page("tbl_uporgchart_cu_list");

// page properties
tbl_uporgchart_cu_list.PageID = "list"; // page ID
tbl_uporgchart_cu_list.FormID = "ftbl_uporgchart_culist"; // form ID
var UP_PAGE_ID = tbl_uporgchart_cu_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_uporgchart_cu_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_uporgchart_cu_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_uporgchart_cu_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_uporgchart_cu_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($tbl_uporgchart_cu->Export == "") || (UP_EXPORT_MASTER_RECORD && $tbl_uporgchart_cu->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_uporgchart_cu_list->TotalRecs = $tbl_uporgchart_cu->SelectRecordCount();
	} else {
		if ($tbl_uporgchart_cu_list->Recordset = $tbl_uporgchart_cu_list->LoadRecordset())
			$tbl_uporgchart_cu_list->TotalRecs = $tbl_uporgchart_cu_list->Recordset->RecordCount();
	}
	$tbl_uporgchart_cu_list->StartRec = 1;
	if ($tbl_uporgchart_cu_list->DisplayRecs <= 0 || ($tbl_uporgchart_cu->Export <> "" && $tbl_uporgchart_cu->ExportAll)) // Display all records
		$tbl_uporgchart_cu_list->DisplayRecs = $tbl_uporgchart_cu_list->TotalRecs;
	if (!($tbl_uporgchart_cu->Export <> "" && $tbl_uporgchart_cu->ExportAll))
		$tbl_uporgchart_cu_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$tbl_uporgchart_cu_list->Recordset = $tbl_uporgchart_cu_list->LoadRecordset($tbl_uporgchart_cu_list->StartRec-1, $tbl_uporgchart_cu_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_uporgchart_cu->TableCaption() ?>
&nbsp;&nbsp;<?php $tbl_uporgchart_cu_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($tbl_uporgchart_cu->Export == "" && $tbl_uporgchart_cu->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(tbl_uporgchart_cu_list);" style="text-decoration: none;"><img id="tbl_uporgchart_cu_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="tbl_uporgchart_cu_list_SearchPanel">
<form name="ftbl_uporgchart_culistsrch" id="ftbl_uporgchart_culistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="tbl_uporgchart_cu">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($tbl_uporgchart_cu->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $tbl_uporgchart_cu_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($tbl_uporgchart_cu->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_uporgchart_cu->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_uporgchart_cu->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $tbl_uporgchart_cu_list->ShowPageHeader(); ?>
<?php
$tbl_uporgchart_cu_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($tbl_uporgchart_cu->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($tbl_uporgchart_cu->CurrentAction <> "gridadd" && $tbl_uporgchart_cu->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_uporgchart_cu_list->Pager)) $tbl_uporgchart_cu_list->Pager = new cPrevNextPager($tbl_uporgchart_cu_list->StartRec, $tbl_uporgchart_cu_list->DisplayRecs, $tbl_uporgchart_cu_list->TotalRecs) ?>
<?php if ($tbl_uporgchart_cu_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_uporgchart_cu_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_uporgchart_cu_list->PageUrl() ?>start=<?php echo $tbl_uporgchart_cu_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_uporgchart_cu_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_uporgchart_cu_list->PageUrl() ?>start=<?php echo $tbl_uporgchart_cu_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_uporgchart_cu_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_uporgchart_cu_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_uporgchart_cu_list->PageUrl() ?>start=<?php echo $tbl_uporgchart_cu_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_uporgchart_cu_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_uporgchart_cu_list->PageUrl() ?>start=<?php echo $tbl_uporgchart_cu_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_uporgchart_cu_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_uporgchart_cu_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_uporgchart_cu_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_uporgchart_cu_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_uporgchart_cu_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $tbl_uporgchart_cu_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php if ($tbl_uporgchart_unit->DetailAdd && $Security->AllowAdd('tbl_uporgchart_unit')) { ?>
<a class="upGridLink" href="<?php echo $tbl_uporgchart_cu->AddUrl() . "?" . UP_TABLE_SHOW_DETAIL . "=tbl_uporgchart_unit" ?>"><?php echo $Language->Phrase("AddLink") ?>&nbsp;<?php echo $tbl_uporgchart_cu->TableCaption() ?>/<?php echo $tbl_uporgchart_unit->TableCaption() ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
<?php if ($tbl_uporgchart_cu_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ftbl_uporgchart_culist, '<?php echo $tbl_uporgchart_cu_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ftbl_uporgchart_culist" id="ftbl_uporgchart_culist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="tbl_uporgchart_cu">
<div id="gmp_tbl_uporgchart_cu" class="upGridMiddlePanel">
<?php if ($tbl_uporgchart_cu_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_uporgchart_cu->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_uporgchart_cu_list->RenderListOptions();

// Render list options (header, left)
$tbl_uporgchart_cu_list->ListOptions->Render("header", "left");
?>
<?php if ($tbl_uporgchart_cu->shortName->Visible) { // shortName ?>
	<?php if ($tbl_uporgchart_cu->SortUrl($tbl_uporgchart_cu->shortName) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_uporgchart_cu->shortName->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_uporgchart_cu->SortUrl($tbl_uporgchart_cu->shortName) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_uporgchart_cu->shortName->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_uporgchart_cu->shortName->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_uporgchart_cu->shortName->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_uporgchart_cu->name->Visible) { // name ?>
	<?php if ($tbl_uporgchart_cu->SortUrl($tbl_uporgchart_cu->name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_uporgchart_cu->name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_uporgchart_cu->SortUrl($tbl_uporgchart_cu->name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_uporgchart_cu->name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_uporgchart_cu->name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_uporgchart_cu->name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_uporgchart_cu_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($tbl_uporgchart_cu->ExportAll && $tbl_uporgchart_cu->Export <> "") {
	$tbl_uporgchart_cu_list->StopRec = $tbl_uporgchart_cu_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tbl_uporgchart_cu_list->TotalRecs > $tbl_uporgchart_cu_list->StartRec + $tbl_uporgchart_cu_list->DisplayRecs - 1)
		$tbl_uporgchart_cu_list->StopRec = $tbl_uporgchart_cu_list->StartRec + $tbl_uporgchart_cu_list->DisplayRecs - 1;
	else
		$tbl_uporgchart_cu_list->StopRec = $tbl_uporgchart_cu_list->TotalRecs;
}
$tbl_uporgchart_cu_list->RecCnt = $tbl_uporgchart_cu_list->StartRec - 1;
if ($tbl_uporgchart_cu_list->Recordset && !$tbl_uporgchart_cu_list->Recordset->EOF) {
	$tbl_uporgchart_cu_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_uporgchart_cu_list->StartRec > 1)
		$tbl_uporgchart_cu_list->Recordset->Move($tbl_uporgchart_cu_list->StartRec - 1);
} elseif (!$tbl_uporgchart_cu->AllowAddDeleteRow && $tbl_uporgchart_cu_list->StopRec == 0) {
	$tbl_uporgchart_cu_list->StopRec = $tbl_uporgchart_cu->GridAddRowCount;
}

// Initialize aggregate
$tbl_uporgchart_cu->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_uporgchart_cu->ResetAttrs();
$tbl_uporgchart_cu_list->RenderRow();
$tbl_uporgchart_cu_list->RowCnt = 0;
while ($tbl_uporgchart_cu_list->RecCnt < $tbl_uporgchart_cu_list->StopRec) {
	$tbl_uporgchart_cu_list->RecCnt++;
	if (intval($tbl_uporgchart_cu_list->RecCnt) >= intval($tbl_uporgchart_cu_list->StartRec)) {
		$tbl_uporgchart_cu_list->RowCnt++;

		// Set up key count
		$tbl_uporgchart_cu_list->KeyCount = $tbl_uporgchart_cu_list->RowIndex;

		// Init row class and style
		$tbl_uporgchart_cu->ResetAttrs();
		$tbl_uporgchart_cu->CssClass = "";
		if ($tbl_uporgchart_cu->CurrentAction == "gridadd") {
		} else {
			$tbl_uporgchart_cu_list->LoadRowValues($tbl_uporgchart_cu_list->Recordset); // Load row values
		}
		$tbl_uporgchart_cu->RowType = UP_ROWTYPE_VIEW; // Render view
		$tbl_uporgchart_cu->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$tbl_uporgchart_cu_list->RenderRow();

		// Render list options
		$tbl_uporgchart_cu_list->RenderListOptions();
?>
	<tr<?php echo $tbl_uporgchart_cu->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_uporgchart_cu_list->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_uporgchart_cu->shortName->Visible) { // shortName ?>
		<td<?php echo $tbl_uporgchart_cu->shortName->CellAttributes() ?>>
<div<?php echo $tbl_uporgchart_cu->shortName->ViewAttributes() ?>><?php echo $tbl_uporgchart_cu->shortName->ListViewValue() ?></div>
<a name="<?php echo $tbl_uporgchart_cu_list->PageObjName . "_row_" . $tbl_uporgchart_cu_list->RowCnt ?>" id="<?php echo $tbl_uporgchart_cu_list->PageObjName . "_row_" . $tbl_uporgchart_cu_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($tbl_uporgchart_cu->name->Visible) { // name ?>
		<td<?php echo $tbl_uporgchart_cu->name->CellAttributes() ?>>
<div<?php echo $tbl_uporgchart_cu->name->ViewAttributes() ?>><?php echo $tbl_uporgchart_cu->name->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_uporgchart_cu_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($tbl_uporgchart_cu->CurrentAction <> "gridadd")
		$tbl_uporgchart_cu_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($tbl_uporgchart_cu_list->Recordset)
	$tbl_uporgchart_cu_list->Recordset->Close();
?>
<?php if ($tbl_uporgchart_cu_list->TotalRecs > 0) { ?>
<?php if ($tbl_uporgchart_cu->Export == "") { ?>
<div class="upGridLowerPanel">
<?php if ($tbl_uporgchart_cu->CurrentAction <> "gridadd" && $tbl_uporgchart_cu->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_uporgchart_cu_list->Pager)) $tbl_uporgchart_cu_list->Pager = new cPrevNextPager($tbl_uporgchart_cu_list->StartRec, $tbl_uporgchart_cu_list->DisplayRecs, $tbl_uporgchart_cu_list->TotalRecs) ?>
<?php if ($tbl_uporgchart_cu_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_uporgchart_cu_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_uporgchart_cu_list->PageUrl() ?>start=<?php echo $tbl_uporgchart_cu_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_uporgchart_cu_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_uporgchart_cu_list->PageUrl() ?>start=<?php echo $tbl_uporgchart_cu_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_uporgchart_cu_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_uporgchart_cu_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_uporgchart_cu_list->PageUrl() ?>start=<?php echo $tbl_uporgchart_cu_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_uporgchart_cu_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_uporgchart_cu_list->PageUrl() ?>start=<?php echo $tbl_uporgchart_cu_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_uporgchart_cu_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_uporgchart_cu_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_uporgchart_cu_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_uporgchart_cu_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_uporgchart_cu_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $tbl_uporgchart_cu_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php if ($tbl_uporgchart_unit->DetailAdd && $Security->AllowAdd('tbl_uporgchart_unit')) { ?>
<a class="upGridLink" href="<?php echo $tbl_uporgchart_cu->AddUrl() . "?" . UP_TABLE_SHOW_DETAIL . "=tbl_uporgchart_unit" ?>"><?php echo $Language->Phrase("AddLink") ?>&nbsp;<?php echo $tbl_uporgchart_cu->TableCaption() ?>/<?php echo $tbl_uporgchart_unit->TableCaption() ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
<?php if ($tbl_uporgchart_cu_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ftbl_uporgchart_culist, '<?php echo $tbl_uporgchart_cu_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($tbl_uporgchart_cu->Export == "" && $tbl_uporgchart_cu->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_uporgchart_cu_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($tbl_uporgchart_cu->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tbl_uporgchart_cu_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_uporgchart_cu_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'tbl_uporgchart_cu';

	// Page object name
	var $PageObjName = 'tbl_uporgchart_cu_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_uporgchart_cu;
		if ($tbl_uporgchart_cu->UseTokenInUrl) $PageUrl .= "t=" . $tbl_uporgchart_cu->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_uporgchart_cu;
		if ($tbl_uporgchart_cu->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_uporgchart_cu->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_uporgchart_cu->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_uporgchart_cu_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_uporgchart_cu)
		if (!isset($GLOBALS["tbl_uporgchart_cu"])) {
			$GLOBALS["tbl_uporgchart_cu"] = new ctbl_uporgchart_cu();
			$GLOBALS["Table"] =& $GLOBALS["tbl_uporgchart_cu"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "tbl_uporgchart_cuadd.php?" . UP_TABLE_SHOW_DETAIL . "=";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "tbl_uporgchart_cudelete.php";
		$this->MultiUpdateUrl = "tbl_uporgchart_cuupdate.php";

		// Table object (tbl_uporgchart_unit)
		if (!isset($GLOBALS['tbl_uporgchart_unit'])) $GLOBALS['tbl_uporgchart_unit'] = new ctbl_uporgchart_unit();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_uporgchart_cu', TRUE);

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
		global $tbl_uporgchart_cu;

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
			$tbl_uporgchart_cu->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_uporgchart_cu;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($tbl_uporgchart_cu->Export <> "" ||
				$tbl_uporgchart_cu->CurrentAction == "gridadd" ||
				$tbl_uporgchart_cu->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$tbl_uporgchart_cu->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($tbl_uporgchart_cu->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_uporgchart_cu->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$tbl_uporgchart_cu->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$tbl_uporgchart_cu->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$tbl_uporgchart_cu->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $tbl_uporgchart_cu->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$tbl_uporgchart_cu->setSessionWhere($sFilter);
		$tbl_uporgchart_cu->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $tbl_uporgchart_cu;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $tbl_uporgchart_cu->shortName, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_uporgchart_cu->name, $Keyword);
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
		global $Security, $tbl_uporgchart_cu;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $tbl_uporgchart_cu->BasicSearchKeyword;
		$sSearchType = $tbl_uporgchart_cu->BasicSearchType;
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
			$tbl_uporgchart_cu->setSessionBasicSearchKeyword($sSearchKeyword);
			$tbl_uporgchart_cu->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $tbl_uporgchart_cu;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$tbl_uporgchart_cu->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $tbl_uporgchart_cu;
		$tbl_uporgchart_cu->setSessionBasicSearchKeyword("");
		$tbl_uporgchart_cu->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $tbl_uporgchart_cu;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$tbl_uporgchart_cu->BasicSearchKeyword = $tbl_uporgchart_cu->getSessionBasicSearchKeyword();
			$tbl_uporgchart_cu->BasicSearchType = $tbl_uporgchart_cu->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_uporgchart_cu;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_uporgchart_cu->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_uporgchart_cu->CurrentOrderType = @$_GET["ordertype"];
			$tbl_uporgchart_cu->UpdateSort($tbl_uporgchart_cu->shortName); // shortName
			$tbl_uporgchart_cu->UpdateSort($tbl_uporgchart_cu->name); // name
			$tbl_uporgchart_cu->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_uporgchart_cu;
		$sOrderBy = $tbl_uporgchart_cu->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_uporgchart_cu->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_uporgchart_cu->SqlOrderBy();
				$tbl_uporgchart_cu->setSessionOrderBy($sOrderBy);
				$tbl_uporgchart_cu->shortName->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_uporgchart_cu;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_uporgchart_cu->setSessionOrderBy($sOrderBy);
				$tbl_uporgchart_cu->shortName->setSort("");
				$tbl_uporgchart_cu->name->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_uporgchart_cu->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_uporgchart_cu;

		// "edit"
		$item =& $this->ListOptions->Add("edit");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanEdit();
		$item->OnLeft = TRUE;

		// "detail_tbl_uporgchart_unit"
		$item =& $this->ListOptions->Add("detail_tbl_uporgchart_unit");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->AllowList('tbl_uporgchart_unit');
		$item->OnLeft = TRUE;

		// "checkbox"
		$item =& $this->ListOptions->Add("checkbox");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanDelete();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"tbl_uporgchart_cu_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $tbl_uporgchart_cu, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
		}

		// "detail_tbl_uporgchart_unit"
		$oListOpt =& $this->ListOptions->Items["detail_tbl_uporgchart_unit"];
		if ($Security->AllowList('tbl_uporgchart_unit')) {
			$oListOpt->Body = "<img src=\"phpimages/detail.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("DetailLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("DetailLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . $Language->TablePhrase("tbl_uporgchart_unit", "TblCaption");
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"tbl_uporgchart_unitlist.php?" . UP_TABLE_SHOW_MASTER . "=tbl_uporgchart_cu&code=" . urlencode(strval($tbl_uporgchart_cu->code->CurrentValue)) . "\">" . $oListOpt->Body . "</a>";
			$links = "";
			if ($GLOBALS["tbl_uporgchart_unit"]->DetailEdit && $Security->CanEdit() && $Security->AllowEdit('tbl_uporgchart_unit'))
				$links .= "<a class=\"upRowLink\" href=\"" . $tbl_uporgchart_cu->EditUrl(UP_TABLE_SHOW_DETAIL . "=tbl_uporgchart_unit") . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>&nbsp;";
			if ($links <> "") $oListOpt->Body .= "<br>" . $links;
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($tbl_uporgchart_cu->ID->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_uporgchart_cu;
		$sSqlWrk = "`cu`='" . up_AdjustSql($tbl_uporgchart_cu->code->CurrentValue) . "'";
		$sSqlWrk = TEAencrypt($sSqlWrk, UP_RANDOM_KEY);
		$sSqlWrk = str_replace("'", "\'", $sSqlWrk);
		$sHyperLinkParm = " href=\"tbl_uporgchart_unitlist.php?" . UP_TABLE_SHOW_MASTER . "=tbl_uporgchart_cu&code=" . urlencode(strval($tbl_uporgchart_cu->code->CurrentValue)) . "\"";
		$oListOpt =& $this->ListOptions->Items["detail_tbl_uporgchart_unit"];
		$oListOpt->Body = $Language->TablePhrase("tbl_uporgchart_unit", "TblCaption");
		$oListOpt->Body = "<a class=\"upRowLink\"" . $sHyperLinkParm . ">" . $oListOpt->Body . "</a>";
		$sHyperLinkParm = " href=\"javascript:void(0);\" name=\"dl%i_tbl_uporgchart_cu_tbl_uporgchart_unit\" id=\"dl%i_tbl_uporgchart_cu_tbl_uporgchart_unit\" onclick=\"up_AjaxShowDetails2(event, this, 'tbl_uporgchart_unitpreview.php?f=%s')\"";		
		$sHyperLinkParm = str_replace("%i", $this->RowCnt, $sHyperLinkParm);
		$sHyperLinkParm = str_replace("%s", $sSqlWrk, $sHyperLinkParm);
		$oListOpt->Body = "<a" . $sHyperLinkParm . "><img class=\"upPreviewRowImage\" src=\"phpimages/expand.gif\" width=\"9\" height=\"9\" border=\"0\"></a>&nbsp;" . $oListOpt->Body;
		$links = "";
		if ($GLOBALS["tbl_uporgchart_unit"]->DetailEdit && $Security->CanEdit() && $Security->AllowEdit('tbl_uporgchart_unit'))
			$links .= "<a class=\"upRowLink\" href=\"" . $tbl_uporgchart_cu->EditUrl(UP_TABLE_SHOW_DETAIL . "=tbl_uporgchart_unit") . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>&nbsp;";
		if ($links <> "") $oListOpt->Body .= "<br>" . $links;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_uporgchart_cu;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_uporgchart_cu->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_uporgchart_cu->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_uporgchart_cu->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_uporgchart_cu->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_uporgchart_cu->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_uporgchart_cu->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $tbl_uporgchart_cu;
		$tbl_uporgchart_cu->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$tbl_uporgchart_cu->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_uporgchart_cu;

		// Call Recordset Selecting event
		$tbl_uporgchart_cu->Recordset_Selecting($tbl_uporgchart_cu->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_uporgchart_cu->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_uporgchart_cu->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_uporgchart_cu;
		$sFilter = $tbl_uporgchart_cu->KeyFilter();

		// Call Row Selecting event
		$tbl_uporgchart_cu->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_uporgchart_cu->CurrentFilter = $sFilter;
		$sSql = $tbl_uporgchart_cu->SQL();
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
		global $conn, $tbl_uporgchart_cu;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_uporgchart_cu->Row_Selected($row);
		$tbl_uporgchart_cu->ID->setDbValue($rs->fields('ID'));
		$tbl_uporgchart_cu->code->setDbValue($rs->fields('code'));
		$tbl_uporgchart_cu->shortName->setDbValue($rs->fields('shortName'));
		$tbl_uporgchart_cu->name->setDbValue($rs->fields('name'));
		$tbl_uporgchart_cu->acronym->setDbValue($rs->fields('acronym'));
		$tbl_uporgchart_cu->address->setDbValue($rs->fields('address'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_uporgchart_cu;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($tbl_uporgchart_cu->getKey("ID")) <> "")
			$tbl_uporgchart_cu->ID->CurrentValue = $tbl_uporgchart_cu->getKey("ID"); // ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_uporgchart_cu->CurrentFilter = $tbl_uporgchart_cu->KeyFilter();
			$sSql = $tbl_uporgchart_cu->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_uporgchart_cu;

		// Initialize URLs
		$this->ViewUrl = $tbl_uporgchart_cu->ViewUrl();
		$this->EditUrl = $tbl_uporgchart_cu->EditUrl();
		$this->InlineEditUrl = $tbl_uporgchart_cu->InlineEditUrl();
		$this->CopyUrl = $tbl_uporgchart_cu->CopyUrl();
		$this->InlineCopyUrl = $tbl_uporgchart_cu->InlineCopyUrl();
		$this->DeleteUrl = $tbl_uporgchart_cu->DeleteUrl();

		// Call Row_Rendering event
		$tbl_uporgchart_cu->Row_Rendering();

		// Common render codes for all row types
		// ID

		$tbl_uporgchart_cu->ID->CellCssStyle = "white-space: nowrap;";

		// code
		$tbl_uporgchart_cu->code->CellCssStyle = "white-space: nowrap;";

		// shortName
		$tbl_uporgchart_cu->shortName->CellCssStyle = "white-space: nowrap;";

		// name
		$tbl_uporgchart_cu->name->CellCssStyle = "white-space: nowrap;";

		// acronym
		$tbl_uporgchart_cu->acronym->CellCssStyle = "white-space: nowrap;";

		// address
		$tbl_uporgchart_cu->address->CellCssStyle = "white-space: nowrap;";
		if ($tbl_uporgchart_cu->RowType == UP_ROWTYPE_VIEW) { // View row

			// shortName
			$tbl_uporgchart_cu->shortName->ViewValue = $tbl_uporgchart_cu->shortName->CurrentValue;
			$tbl_uporgchart_cu->shortName->ViewCustomAttributes = "";

			// name
			$tbl_uporgchart_cu->name->ViewValue = $tbl_uporgchart_cu->name->CurrentValue;
			$tbl_uporgchart_cu->name->ViewCustomAttributes = "";

			// shortName
			$tbl_uporgchart_cu->shortName->LinkCustomAttributes = "";
			$tbl_uporgchart_cu->shortName->HrefValue = "";
			$tbl_uporgchart_cu->shortName->TooltipValue = "";

			// name
			$tbl_uporgchart_cu->name->LinkCustomAttributes = "";
			$tbl_uporgchart_cu->name->HrefValue = "";
			$tbl_uporgchart_cu->name->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_uporgchart_cu->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_uporgchart_cu->Row_Rendered();
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
		$table = 'tbl_uporgchart_cu';
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
