<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "view_tbl_collectionperiod_admininfo.php" ?>
<?php include_once "tbl_uporgchart_unitinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "view_tbl_profile_admininfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$view_tbl_collectionperiod_admin_list = new cview_tbl_collectionperiod_admin_list();
$Page =& $view_tbl_collectionperiod_admin_list;

// Page init
$view_tbl_collectionperiod_admin_list->Page_Init();

// Page main
$view_tbl_collectionperiod_admin_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($view_tbl_collectionperiod_admin->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var view_tbl_collectionperiod_admin_list = new up_Page("view_tbl_collectionperiod_admin_list");

// page properties
view_tbl_collectionperiod_admin_list.PageID = "list"; // page ID
view_tbl_collectionperiod_admin_list.FormID = "fview_tbl_collectionperiod_adminlist"; // form ID
var UP_PAGE_ID = view_tbl_collectionperiod_admin_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
view_tbl_collectionperiod_admin_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
view_tbl_collectionperiod_admin_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
view_tbl_collectionperiod_admin_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
view_tbl_collectionperiod_admin_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($view_tbl_collectionperiod_admin->Export == "") || (UP_EXPORT_MASTER_RECORD && $view_tbl_collectionperiod_admin->Export == "print")) { ?>
<?php
$gsMasterReturnUrl = "tbl_uporgchart_unitlist.php";
if ($view_tbl_collectionperiod_admin_list->DbMasterFilter <> "" && $view_tbl_collectionperiod_admin->getCurrentMasterTable() == "tbl_uporgchart_unit") {
	if ($view_tbl_collectionperiod_admin_list->MasterRecordExists) {
		if ($view_tbl_collectionperiod_admin->getCurrentMasterTable() == $view_tbl_collectionperiod_admin->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $tbl_uporgchart_unit->TableCaption() ?>
&nbsp;&nbsp;<?php $view_tbl_collectionperiod_admin_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($view_tbl_collectionperiod_admin->Export == "") { ?>
<p class="upbudgetofficeclass"><a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></p>
<?php } ?>
<?php include_once "tbl_uporgchart_unitmaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$view_tbl_collectionperiod_admin_list->TotalRecs = $view_tbl_collectionperiod_admin->SelectRecordCount();
	} else {
		if ($view_tbl_collectionperiod_admin_list->Recordset = $view_tbl_collectionperiod_admin_list->LoadRecordset())
			$view_tbl_collectionperiod_admin_list->TotalRecs = $view_tbl_collectionperiod_admin_list->Recordset->RecordCount();
	}
	$view_tbl_collectionperiod_admin_list->StartRec = 1;
	if ($view_tbl_collectionperiod_admin_list->DisplayRecs <= 0 || ($view_tbl_collectionperiod_admin->Export <> "" && $view_tbl_collectionperiod_admin->ExportAll)) // Display all records
		$view_tbl_collectionperiod_admin_list->DisplayRecs = $view_tbl_collectionperiod_admin_list->TotalRecs;
	if (!($view_tbl_collectionperiod_admin->Export <> "" && $view_tbl_collectionperiod_admin->ExportAll))
		$view_tbl_collectionperiod_admin_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$view_tbl_collectionperiod_admin_list->Recordset = $view_tbl_collectionperiod_admin_list->LoadRecordset($view_tbl_collectionperiod_admin_list->StartRec-1, $view_tbl_collectionperiod_admin_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $view_tbl_collectionperiod_admin->TableCaption() ?>
<?php if ($view_tbl_collectionperiod_admin->getCurrentMasterTable() == "") { ?>
&nbsp;&nbsp;<?php $view_tbl_collectionperiod_admin_list->ExportOptions->Render("body"); ?>
<?php } ?>
</p>
<?php $view_tbl_collectionperiod_admin_list->ShowPageHeader(); ?>
<?php
$view_tbl_collectionperiod_admin_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($view_tbl_collectionperiod_admin->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($view_tbl_collectionperiod_admin->CurrentAction <> "gridadd" && $view_tbl_collectionperiod_admin->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($view_tbl_collectionperiod_admin_list->Pager)) $view_tbl_collectionperiod_admin_list->Pager = new cPrevNextPager($view_tbl_collectionperiod_admin_list->StartRec, $view_tbl_collectionperiod_admin_list->DisplayRecs, $view_tbl_collectionperiod_admin_list->TotalRecs) ?>
<?php if ($view_tbl_collectionperiod_admin_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($view_tbl_collectionperiod_admin_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_collectionperiod_admin_list->PageUrl() ?>start=<?php echo $view_tbl_collectionperiod_admin_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_tbl_collectionperiod_admin_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_collectionperiod_admin_list->PageUrl() ?>start=<?php echo $view_tbl_collectionperiod_admin_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $view_tbl_collectionperiod_admin_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($view_tbl_collectionperiod_admin_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_collectionperiod_admin_list->PageUrl() ?>start=<?php echo $view_tbl_collectionperiod_admin_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($view_tbl_collectionperiod_admin_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_collectionperiod_admin_list->PageUrl() ?>start=<?php echo $view_tbl_collectionperiod_admin_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $view_tbl_collectionperiod_admin_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_tbl_collectionperiod_admin_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_tbl_collectionperiod_admin_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_tbl_collectionperiod_admin_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($view_tbl_collectionperiod_admin_list->SearchWhere == "0=101") { ?>
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
<?php if ($view_tbl_collectionperiod_admin_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.fview_tbl_collectionperiod_adminlist, '<?php echo $view_tbl_collectionperiod_admin_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="fview_tbl_collectionperiod_adminlist" id="fview_tbl_collectionperiod_adminlist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="view_tbl_collectionperiod_admin">
<div id="gmp_view_tbl_collectionperiod_admin" class="upGridMiddlePanel">
<?php if ($view_tbl_collectionperiod_admin_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $view_tbl_collectionperiod_admin->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$view_tbl_collectionperiod_admin_list->RenderListOptions();

// Render list options (header, left)
$view_tbl_collectionperiod_admin_list->ListOptions->Render("header", "left");
?>
<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_ay->Visible) { // collectionPeriod_ay ?>
	<?php if ($view_tbl_collectionperiod_admin->SortUrl($view_tbl_collectionperiod_admin->collectionPeriod_ay) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_collectionperiod_admin->SortUrl($view_tbl_collectionperiod_admin->collectionPeriod_ay) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_collectionperiod_admin->collectionPeriod_ay->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_collectionperiod_admin->collectionPeriod_ay->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_sem->Visible) { // collectionPeriod_sem ?>
	<?php if ($view_tbl_collectionperiod_admin->SortUrl($view_tbl_collectionperiod_admin->collectionPeriod_sem) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_collectionperiod_admin->SortUrl($view_tbl_collectionperiod_admin->collectionPeriod_sem) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_collectionperiod_admin->collectionPeriod_sem->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_collectionperiod_admin->collectionPeriod_sem->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
	<?php if ($view_tbl_collectionperiod_admin->SortUrl($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_collectionperiod_admin->SortUrl($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_status->Visible) { // collectionPeriod_status ?>
	<?php if ($view_tbl_collectionperiod_admin->SortUrl($view_tbl_collectionperiod_admin->collectionPeriod_status) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $view_tbl_collectionperiod_admin->SortUrl($view_tbl_collectionperiod_admin->collectionPeriod_status) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->FldCaption() ?></td><td style="width: 10px;"><?php if ($view_tbl_collectionperiod_admin->collectionPeriod_status->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($view_tbl_collectionperiod_admin->collectionPeriod_status->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$view_tbl_collectionperiod_admin_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($view_tbl_collectionperiod_admin->ExportAll && $view_tbl_collectionperiod_admin->Export <> "") {
	$view_tbl_collectionperiod_admin_list->StopRec = $view_tbl_collectionperiod_admin_list->TotalRecs;
} else {

	// Set the last record to display
	if ($view_tbl_collectionperiod_admin_list->TotalRecs > $view_tbl_collectionperiod_admin_list->StartRec + $view_tbl_collectionperiod_admin_list->DisplayRecs - 1)
		$view_tbl_collectionperiod_admin_list->StopRec = $view_tbl_collectionperiod_admin_list->StartRec + $view_tbl_collectionperiod_admin_list->DisplayRecs - 1;
	else
		$view_tbl_collectionperiod_admin_list->StopRec = $view_tbl_collectionperiod_admin_list->TotalRecs;
}
$view_tbl_collectionperiod_admin_list->RecCnt = $view_tbl_collectionperiod_admin_list->StartRec - 1;
if ($view_tbl_collectionperiod_admin_list->Recordset && !$view_tbl_collectionperiod_admin_list->Recordset->EOF) {
	$view_tbl_collectionperiod_admin_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $view_tbl_collectionperiod_admin_list->StartRec > 1)
		$view_tbl_collectionperiod_admin_list->Recordset->Move($view_tbl_collectionperiod_admin_list->StartRec - 1);
} elseif (!$view_tbl_collectionperiod_admin->AllowAddDeleteRow && $view_tbl_collectionperiod_admin_list->StopRec == 0) {
	$view_tbl_collectionperiod_admin_list->StopRec = $view_tbl_collectionperiod_admin->GridAddRowCount;
}

// Initialize aggregate
$view_tbl_collectionperiod_admin->RowType = UP_ROWTYPE_AGGREGATEINIT;
$view_tbl_collectionperiod_admin->ResetAttrs();
$view_tbl_collectionperiod_admin_list->RenderRow();
$view_tbl_collectionperiod_admin_list->RowCnt = 0;
while ($view_tbl_collectionperiod_admin_list->RecCnt < $view_tbl_collectionperiod_admin_list->StopRec) {
	$view_tbl_collectionperiod_admin_list->RecCnt++;
	if (intval($view_tbl_collectionperiod_admin_list->RecCnt) >= intval($view_tbl_collectionperiod_admin_list->StartRec)) {
		$view_tbl_collectionperiod_admin_list->RowCnt++;

		// Set up key count
		$view_tbl_collectionperiod_admin_list->KeyCount = $view_tbl_collectionperiod_admin_list->RowIndex;

		// Init row class and style
		$view_tbl_collectionperiod_admin->ResetAttrs();
		$view_tbl_collectionperiod_admin->CssClass = "";
		if ($view_tbl_collectionperiod_admin->CurrentAction == "gridadd") {
		} else {
			$view_tbl_collectionperiod_admin_list->LoadRowValues($view_tbl_collectionperiod_admin_list->Recordset); // Load row values
		}
		$view_tbl_collectionperiod_admin->RowType = UP_ROWTYPE_VIEW; // Render view
		$view_tbl_collectionperiod_admin->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$view_tbl_collectionperiod_admin_list->RenderRow();

		// Render list options
		$view_tbl_collectionperiod_admin_list->RenderListOptions();
?>
	<tr<?php echo $view_tbl_collectionperiod_admin->RowAttributes() ?>>
<?php

// Render list options (body, left)
$view_tbl_collectionperiod_admin_list->ListOptions->Render("body", "left");
?>
	<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_ay->Visible) { // collectionPeriod_ay ?>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->CellAttributes() ?>>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->ListViewValue() ?></div>
<a name="<?php echo $view_tbl_collectionperiod_admin_list->PageObjName . "_row_" . $view_tbl_collectionperiod_admin_list->RowCnt ?>" id="<?php echo $view_tbl_collectionperiod_admin_list->PageObjName . "_row_" . $view_tbl_collectionperiod_admin_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_sem->Visible) { // collectionPeriod_sem ?>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->CellAttributes() ?>>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->Visible) { // collectionPeriod_cutOffDate ?>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CellAttributes() ?>>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($view_tbl_collectionperiod_admin->collectionPeriod_status->Visible) { // collectionPeriod_status ?>
		<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->CellAttributes() ?>>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_tbl_collectionperiod_admin_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($view_tbl_collectionperiod_admin->CurrentAction <> "gridadd")
		$view_tbl_collectionperiod_admin_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($view_tbl_collectionperiod_admin_list->Recordset)
	$view_tbl_collectionperiod_admin_list->Recordset->Close();
?>
<?php if ($view_tbl_collectionperiod_admin_list->TotalRecs > 0) { ?>
<?php if ($view_tbl_collectionperiod_admin->Export == "") { ?>
<div class="upGridLowerPanel">
<?php if ($view_tbl_collectionperiod_admin->CurrentAction <> "gridadd" && $view_tbl_collectionperiod_admin->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($view_tbl_collectionperiod_admin_list->Pager)) $view_tbl_collectionperiod_admin_list->Pager = new cPrevNextPager($view_tbl_collectionperiod_admin_list->StartRec, $view_tbl_collectionperiod_admin_list->DisplayRecs, $view_tbl_collectionperiod_admin_list->TotalRecs) ?>
<?php if ($view_tbl_collectionperiod_admin_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($view_tbl_collectionperiod_admin_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_collectionperiod_admin_list->PageUrl() ?>start=<?php echo $view_tbl_collectionperiod_admin_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($view_tbl_collectionperiod_admin_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_collectionperiod_admin_list->PageUrl() ?>start=<?php echo $view_tbl_collectionperiod_admin_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $view_tbl_collectionperiod_admin_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($view_tbl_collectionperiod_admin_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_collectionperiod_admin_list->PageUrl() ?>start=<?php echo $view_tbl_collectionperiod_admin_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($view_tbl_collectionperiod_admin_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $view_tbl_collectionperiod_admin_list->PageUrl() ?>start=<?php echo $view_tbl_collectionperiod_admin_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $view_tbl_collectionperiod_admin_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $view_tbl_collectionperiod_admin_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $view_tbl_collectionperiod_admin_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $view_tbl_collectionperiod_admin_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($view_tbl_collectionperiod_admin_list->SearchWhere == "0=101") { ?>
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
<?php if ($view_tbl_collectionperiod_admin_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.fview_tbl_collectionperiod_adminlist, '<?php echo $view_tbl_collectionperiod_admin_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($view_tbl_collectionperiod_admin->Export == "" && $view_tbl_collectionperiod_admin->CurrentAction == "") { ?>
<?php } ?>
<?php
$view_tbl_collectionperiod_admin_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($view_tbl_collectionperiod_admin->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_tbl_collectionperiod_admin_list->Page_Terminate();
?>
<?php

//
// Page class
//
class cview_tbl_collectionperiod_admin_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'view_tbl_collectionperiod_admin';

	// Page object name
	var $PageObjName = 'view_tbl_collectionperiod_admin_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $view_tbl_collectionperiod_admin;
		if ($view_tbl_collectionperiod_admin->UseTokenInUrl) $PageUrl .= "t=" . $view_tbl_collectionperiod_admin->TableVar . "&"; // Add page token
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
		global $objForm, $view_tbl_collectionperiod_admin;
		if ($view_tbl_collectionperiod_admin->UseTokenInUrl) {
			if ($objForm)
				return ($view_tbl_collectionperiod_admin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($view_tbl_collectionperiod_admin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cview_tbl_collectionperiod_admin_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (view_tbl_collectionperiod_admin)
		if (!isset($GLOBALS["view_tbl_collectionperiod_admin"])) {
			$GLOBALS["view_tbl_collectionperiod_admin"] = new cview_tbl_collectionperiod_admin();
			$GLOBALS["Table"] =& $GLOBALS["view_tbl_collectionperiod_admin"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "view_tbl_collectionperiod_adminadd.php?" . UP_TABLE_SHOW_DETAIL . "=";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "view_tbl_collectionperiod_admindelete.php";
		$this->MultiUpdateUrl = "view_tbl_collectionperiod_adminupdate.php";

		// Table object (tbl_uporgchart_unit)
		if (!isset($GLOBALS['tbl_uporgchart_unit'])) $GLOBALS['tbl_uporgchart_unit'] = new ctbl_uporgchart_unit();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Table object (view_tbl_profile_admin)
		if (!isset($GLOBALS['view_tbl_profile_admin'])) $GLOBALS['view_tbl_profile_admin'] = new cview_tbl_profile_admin();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'view_tbl_collectionperiod_admin', TRUE);

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
		global $view_tbl_collectionperiod_admin;

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
			$view_tbl_collectionperiod_admin->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $view_tbl_collectionperiod_admin;

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
			if ($view_tbl_collectionperiod_admin->Export <> "" ||
				$view_tbl_collectionperiod_admin->CurrentAction == "gridadd" ||
				$view_tbl_collectionperiod_admin->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($view_tbl_collectionperiod_admin->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $view_tbl_collectionperiod_admin->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $view_tbl_collectionperiod_admin->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $view_tbl_collectionperiod_admin->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($view_tbl_collectionperiod_admin->getMasterFilter() <> "" && $view_tbl_collectionperiod_admin->getCurrentMasterTable() == "tbl_uporgchart_unit") {
			global $tbl_uporgchart_unit;
			$rsmaster = $tbl_uporgchart_unit->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($view_tbl_collectionperiod_admin->getReturnUrl()); // Return to caller
			} else {
				$tbl_uporgchart_unit->LoadListRowValues($rsmaster);
				$tbl_uporgchart_unit->RowType = UP_ROWTYPE_MASTER; // Master row
				$tbl_uporgchart_unit->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$view_tbl_collectionperiod_admin->setSessionWhere($sFilter);
		$view_tbl_collectionperiod_admin->CurrentFilter = "";
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $view_tbl_collectionperiod_admin;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$view_tbl_collectionperiod_admin->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$view_tbl_collectionperiod_admin->CurrentOrderType = @$_GET["ordertype"];
			$view_tbl_collectionperiod_admin->UpdateSort($view_tbl_collectionperiod_admin->collectionPeriod_ay); // collectionPeriod_ay
			$view_tbl_collectionperiod_admin->UpdateSort($view_tbl_collectionperiod_admin->collectionPeriod_sem); // collectionPeriod_sem
			$view_tbl_collectionperiod_admin->UpdateSort($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate); // collectionPeriod_cutOffDate
			$view_tbl_collectionperiod_admin->UpdateSort($view_tbl_collectionperiod_admin->collectionPeriod_status); // collectionPeriod_status
			$view_tbl_collectionperiod_admin->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $view_tbl_collectionperiod_admin;
		$sOrderBy = $view_tbl_collectionperiod_admin->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($view_tbl_collectionperiod_admin->SqlOrderBy() <> "") {
				$sOrderBy = $view_tbl_collectionperiod_admin->SqlOrderBy();
				$view_tbl_collectionperiod_admin->setSessionOrderBy($sOrderBy);
				$view_tbl_collectionperiod_admin->collectionPeriod_ay->setSort("DESC");
				$view_tbl_collectionperiod_admin->collectionPeriod_sem->setSort("DESC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $view_tbl_collectionperiod_admin;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$view_tbl_collectionperiod_admin->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$view_tbl_collectionperiod_admin->unitID->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$view_tbl_collectionperiod_admin->setSessionOrderBy($sOrderBy);
				$view_tbl_collectionperiod_admin->collectionPeriod_ay->setSort("");
				$view_tbl_collectionperiod_admin->collectionPeriod_sem->setSort("");
				$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->setSort("");
				$view_tbl_collectionperiod_admin->collectionPeriod_status->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$view_tbl_collectionperiod_admin->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $view_tbl_collectionperiod_admin;

		// "edit"
		$item =& $this->ListOptions->Add("edit");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanEdit();
		$item->OnLeft = TRUE;

		// "detail_view_tbl_profile_admin"
		$item =& $this->ListOptions->Add("detail_view_tbl_profile_admin");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->AllowList('view_tbl_profile_admin');
		$item->OnLeft = TRUE;

		// "checkbox"
		$item =& $this->ListOptions->Add("checkbox");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanDelete();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"view_tbl_collectionperiod_admin_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $view_tbl_collectionperiod_admin, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
		}

		// "detail_view_tbl_profile_admin"
		$oListOpt =& $this->ListOptions->Items["detail_view_tbl_profile_admin"];
		if ($Security->AllowList('view_tbl_profile_admin')) {
			$oListOpt->Body = "<img src=\"phpimages/detail.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("DetailLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("DetailLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . $Language->TablePhrase("view_tbl_profile_admin", "TblCaption");
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"view_tbl_profile_adminlist.php?" . UP_TABLE_SHOW_MASTER . "=view_tbl_collectionperiod_admin&collectionPeriod_ID=" . urlencode(strval($view_tbl_collectionperiod_admin->collectionPeriod_ID->CurrentValue)) . "\">" . $oListOpt->Body . "</a>";
			$links = "";
			if ($GLOBALS["view_tbl_profile_admin"]->DetailEdit && $Security->CanEdit() && $Security->AllowEdit('view_tbl_profile_admin'))
				$links .= "<a class=\"upRowLink\" href=\"" . $view_tbl_collectionperiod_admin->EditUrl(UP_TABLE_SHOW_DETAIL . "=view_tbl_profile_admin") . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>&nbsp;";
			if ($links <> "") $oListOpt->Body .= "<br>" . $links;
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($view_tbl_collectionperiod_admin->collectionPeriod_ID->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $view_tbl_collectionperiod_admin;
		$sSqlWrk = "`collectionPeriod_ID`=" . up_AdjustSql($view_tbl_collectionperiod_admin->collectionPeriod_ID->CurrentValue) . "";
		$sSqlWrk = TEAencrypt($sSqlWrk, UP_RANDOM_KEY);
		$sSqlWrk = str_replace("'", "\'", $sSqlWrk);
		$sHyperLinkParm = " href=\"view_tbl_profile_adminlist.php?" . UP_TABLE_SHOW_MASTER . "=view_tbl_collectionperiod_admin&collectionPeriod_ID=" . urlencode(strval($view_tbl_collectionperiod_admin->collectionPeriod_ID->CurrentValue)) . "\"";
		$oListOpt =& $this->ListOptions->Items["detail_view_tbl_profile_admin"];
		$oListOpt->Body = $Language->TablePhrase("view_tbl_profile_admin", "TblCaption");
		$oListOpt->Body = "<a class=\"upRowLink\"" . $sHyperLinkParm . ">" . $oListOpt->Body . "</a>";
		$sHyperLinkParm = " href=\"javascript:void(0);\" name=\"dl%i_view_tbl_collectionperiod_admin_view_tbl_profile_admin\" id=\"dl%i_view_tbl_collectionperiod_admin_view_tbl_profile_admin\" onclick=\"up_AjaxShowDetails2(event, this, 'view_tbl_profile_adminpreview.php?f=%s')\"";		
		$sHyperLinkParm = str_replace("%i", $this->RowCnt, $sHyperLinkParm);
		$sHyperLinkParm = str_replace("%s", $sSqlWrk, $sHyperLinkParm);
		$oListOpt->Body = "<a" . $sHyperLinkParm . "><img class=\"upPreviewRowImage\" src=\"phpimages/expand.gif\" width=\"9\" height=\"9\" border=\"0\"></a>&nbsp;" . $oListOpt->Body;
		$links = "";
		if ($GLOBALS["view_tbl_profile_admin"]->DetailEdit && $Security->CanEdit() && $Security->AllowEdit('view_tbl_profile_admin'))
			$links .= "<a class=\"upRowLink\" href=\"" . $view_tbl_collectionperiod_admin->EditUrl(UP_TABLE_SHOW_DETAIL . "=view_tbl_profile_admin") . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>&nbsp;";
		if ($links <> "") $oListOpt->Body .= "<br>" . $links;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $view_tbl_collectionperiod_admin;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$view_tbl_collectionperiod_admin->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$view_tbl_collectionperiod_admin->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $view_tbl_collectionperiod_admin->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$view_tbl_collectionperiod_admin->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$view_tbl_collectionperiod_admin->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$view_tbl_collectionperiod_admin->setStartRecordNumber($this->StartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $view_tbl_collectionperiod_admin;

		// Call Recordset Selecting event
		$view_tbl_collectionperiod_admin->Recordset_Selecting($view_tbl_collectionperiod_admin->CurrentFilter);

		// Load List page SQL
		$sSql = $view_tbl_collectionperiod_admin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$view_tbl_collectionperiod_admin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $view_tbl_collectionperiod_admin;
		$sFilter = $view_tbl_collectionperiod_admin->KeyFilter();

		// Call Row Selecting event
		$view_tbl_collectionperiod_admin->Row_Selecting($sFilter);

		// Load SQL based on filter
		$view_tbl_collectionperiod_admin->CurrentFilter = $sFilter;
		$sSql = $view_tbl_collectionperiod_admin->SQL();
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
		global $conn, $view_tbl_collectionperiod_admin;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$view_tbl_collectionperiod_admin->Row_Selected($row);
		$view_tbl_collectionperiod_admin->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$view_tbl_collectionperiod_admin->cu->setDbValue($rs->fields('cu'));
		$view_tbl_collectionperiod_admin->unitID->setDbValue($rs->fields('unitID'));
		$view_tbl_collectionperiod_admin->academicYear_ID->setDbValue($rs->fields('academicYear_ID'));
		$view_tbl_collectionperiod_admin->collectionPeriod_ay->setDbValue($rs->fields('collectionPeriod_ay'));
		$view_tbl_collectionperiod_admin->collectionPeriod_sem->setDbValue($rs->fields('collectionPeriod_sem'));
		$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$view_tbl_collectionperiod_admin->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
	}

	// Load old record
	function LoadOldRecord() {
		global $view_tbl_collectionperiod_admin;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($view_tbl_collectionperiod_admin->getKey("collectionPeriod_ID")) <> "")
			$view_tbl_collectionperiod_admin->collectionPeriod_ID->CurrentValue = $view_tbl_collectionperiod_admin->getKey("collectionPeriod_ID"); // collectionPeriod_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$view_tbl_collectionperiod_admin->CurrentFilter = $view_tbl_collectionperiod_admin->KeyFilter();
			$sSql = $view_tbl_collectionperiod_admin->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $view_tbl_collectionperiod_admin;

		// Initialize URLs
		$this->ViewUrl = $view_tbl_collectionperiod_admin->ViewUrl();
		$this->EditUrl = $view_tbl_collectionperiod_admin->EditUrl();
		$this->InlineEditUrl = $view_tbl_collectionperiod_admin->InlineEditUrl();
		$this->CopyUrl = $view_tbl_collectionperiod_admin->CopyUrl();
		$this->InlineCopyUrl = $view_tbl_collectionperiod_admin->InlineCopyUrl();
		$this->DeleteUrl = $view_tbl_collectionperiod_admin->DeleteUrl();

		// Call Row_Rendering event
		$view_tbl_collectionperiod_admin->Row_Rendering();

		// Common render codes for all row types
		// collectionPeriod_ID

		$view_tbl_collectionperiod_admin->collectionPeriod_ID->CellCssStyle = "white-space: nowrap;";

		// cu
		$view_tbl_collectionperiod_admin->cu->CellCssStyle = "white-space: nowrap;";

		// unitID
		$view_tbl_collectionperiod_admin->unitID->CellCssStyle = "white-space: nowrap;";

		// academicYear_ID
		$view_tbl_collectionperiod_admin->academicYear_ID->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ay
		$view_tbl_collectionperiod_admin->collectionPeriod_ay->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_sem
		$view_tbl_collectionperiod_admin->collectionPeriod_sem->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_cutOffDate
		$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_status
		$view_tbl_collectionperiod_admin->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";
		if ($view_tbl_collectionperiod_admin->RowType == UP_ROWTYPE_VIEW) { // View row

			// collectionPeriod_ay
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_ay->CurrentValue;
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->ViewCustomAttributes = "";

			// collectionPeriod_sem
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_sem->CurrentValue;
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->ViewCustomAttributes = "";

			// collectionPeriod_cutOffDate
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CurrentValue;
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewValue = up_FormatDateTime($view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewValue, 6);
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewCustomAttributes = "";

			// collectionPeriod_status
			if (strval($view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue) <> "") {
				switch ($view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue) {
					case "1":
						$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(1) <> "" ? $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(1) : $view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue;
						break;
					case "2":
						$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(2) <> "" ? $view_tbl_collectionperiod_admin->collectionPeriod_status->FldTagCaption(2) : $view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue;
						break;
					default:
						$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue = $view_tbl_collectionperiod_admin->collectionPeriod_status->CurrentValue;
				}
			} else {
				$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewValue = NULL;
			}
			$view_tbl_collectionperiod_admin->collectionPeriod_status->ViewCustomAttributes = "";

			// collectionPeriod_ay
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->LinkCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->HrefValue = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_ay->TooltipValue = "";

			// collectionPeriod_sem
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->LinkCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->HrefValue = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_sem->TooltipValue = "";

			// collectionPeriod_cutOffDate
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->LinkCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->HrefValue = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->TooltipValue = "";

			// collectionPeriod_status
			$view_tbl_collectionperiod_admin->collectionPeriod_status->LinkCustomAttributes = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_status->HrefValue = "";
			$view_tbl_collectionperiod_admin->collectionPeriod_status->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($view_tbl_collectionperiod_admin->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$view_tbl_collectionperiod_admin->Row_Rendered();
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $view_tbl_collectionperiod_admin;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "tbl_uporgchart_unit") {
				$bValidMaster = TRUE;
				if (@$_GET["unitID"] <> "") {
					$GLOBALS["tbl_uporgchart_unit"]->unitID->setQueryStringValue($_GET["unitID"]);
					$view_tbl_collectionperiod_admin->unitID->setQueryStringValue($GLOBALS["tbl_uporgchart_unit"]->unitID->QueryStringValue);
					$view_tbl_collectionperiod_admin->unitID->setSessionValue($view_tbl_collectionperiod_admin->unitID->QueryStringValue);
					if (!is_numeric($GLOBALS["tbl_uporgchart_unit"]->unitID->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$view_tbl_collectionperiod_admin->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$view_tbl_collectionperiod_admin->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "tbl_uporgchart_unit") {
				if ($view_tbl_collectionperiod_admin->unitID->QueryStringValue == "") $view_tbl_collectionperiod_admin->unitID->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $view_tbl_collectionperiod_admin->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $view_tbl_collectionperiod_admin->getDetailFilter(); // Get detail filter
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
		$table = 'view_tbl_collectionperiod_admin';
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
