<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_facultyinfo.php" ?>
<?php include_once "tbl_degreesinfo.php" ?>
<?php include_once "tbl_uporgchart_unitinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_faculty_list = new ctbl_faculty_list();
$Page =& $tbl_faculty_list;

// Page init
$tbl_faculty_list->Page_Init();

// Page main
$tbl_faculty_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($tbl_faculty->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_faculty_list = new up_Page("tbl_faculty_list");

// page properties
tbl_faculty_list.PageID = "list"; // page ID
tbl_faculty_list.FormID = "ftbl_facultylist"; // form ID
var UP_PAGE_ID = tbl_faculty_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_faculty_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_faculty_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_faculty_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_faculty_list.ValidateRequired = false; // no JavaScript validation
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
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-cold-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
//-->

</script>
<?php } ?>
<?php if (($tbl_faculty->Export == "") || (UP_EXPORT_MASTER_RECORD && $tbl_faculty->Export == "print")) { ?>
<?php
$gsMasterReturnUrl = "tbl_uporgchart_unitlist.php";
if ($tbl_faculty_list->DbMasterFilter <> "" && $tbl_faculty->getCurrentMasterTable() == "tbl_uporgchart_unit") {
	if ($tbl_faculty_list->MasterRecordExists) {
		if ($tbl_faculty->getCurrentMasterTable() == $tbl_faculty->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $tbl_uporgchart_unit->TableCaption() ?>
&nbsp;&nbsp;<?php $tbl_faculty_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($tbl_faculty->Export == "") { ?>
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
		$tbl_faculty_list->TotalRecs = $tbl_faculty->SelectRecordCount();
	} else {
		if ($tbl_faculty_list->Recordset = $tbl_faculty_list->LoadRecordset())
			$tbl_faculty_list->TotalRecs = $tbl_faculty_list->Recordset->RecordCount();
	}
	$tbl_faculty_list->StartRec = 1;
	if ($tbl_faculty_list->DisplayRecs <= 0 || ($tbl_faculty->Export <> "" && $tbl_faculty->ExportAll)) // Display all records
		$tbl_faculty_list->DisplayRecs = $tbl_faculty_list->TotalRecs;
	if (!($tbl_faculty->Export <> "" && $tbl_faculty->ExportAll))
		$tbl_faculty_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$tbl_faculty_list->Recordset = $tbl_faculty_list->LoadRecordset($tbl_faculty_list->StartRec-1, $tbl_faculty_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_faculty->TableCaption() ?>
<?php if ($tbl_faculty->getCurrentMasterTable() == "") { ?>
&nbsp;&nbsp;<?php $tbl_faculty_list->ExportOptions->Render("body"); ?>
<?php } ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($tbl_faculty->Export == "" && $tbl_faculty->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(tbl_faculty_list);" style="text-decoration: none;"><img id="tbl_faculty_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="tbl_faculty_list_SearchPanel">
<form name="ftbl_facultylistsrch" id="ftbl_facultylistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="tbl_faculty">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($tbl_faculty->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $tbl_faculty_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($tbl_faculty->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_faculty->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_faculty->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $tbl_faculty_list->ShowPageHeader(); ?>
<?php
$tbl_faculty_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($tbl_faculty->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($tbl_faculty->CurrentAction <> "gridadd" && $tbl_faculty->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_faculty_list->Pager)) $tbl_faculty_list->Pager = new cPrevNextPager($tbl_faculty_list->StartRec, $tbl_faculty_list->DisplayRecs, $tbl_faculty_list->TotalRecs) ?>
<?php if ($tbl_faculty_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_faculty_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_faculty_list->PageUrl() ?>start=<?php echo $tbl_faculty_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_faculty_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_faculty_list->PageUrl() ?>start=<?php echo $tbl_faculty_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_faculty_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_faculty_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_faculty_list->PageUrl() ?>start=<?php echo $tbl_faculty_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_faculty_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_faculty_list->PageUrl() ?>start=<?php echo $tbl_faculty_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_faculty_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_faculty_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_faculty_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_faculty_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_faculty_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $tbl_faculty_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php if ($tbl_degrees->DetailAdd && $Security->AllowAdd('tbl_degrees')) { ?>
<a class="upGridLink" href="<?php echo $tbl_faculty->AddUrl() . "?" . UP_TABLE_SHOW_DETAIL . "=tbl_degrees" ?>"><?php echo $Language->Phrase("AddLink") ?>&nbsp;<?php echo $tbl_faculty->TableCaption() ?>/<?php echo $tbl_degrees->TableCaption() ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
<?php if ($tbl_faculty_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ftbl_facultylist, '<?php echo $tbl_faculty_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ftbl_facultylist" id="ftbl_facultylist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="tbl_faculty">
<div id="gmp_tbl_faculty" class="upGridMiddlePanel">
<?php if ($tbl_faculty_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_faculty->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_faculty_list->RenderListOptions();

// Render list options (header, left)
$tbl_faculty_list->ListOptions->Render("header", "left");
?>
<?php if ($tbl_faculty->faculty_name->Visible) { // faculty_name ?>
	<?php if ($tbl_faculty->SortUrl($tbl_faculty->faculty_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_faculty->faculty_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_faculty->SortUrl($tbl_faculty->faculty_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_faculty->faculty_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_faculty->faculty_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_faculty->faculty_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_faculty->faculty_birthDate->Visible) { // faculty_birthDate ?>
	<?php if ($tbl_faculty->SortUrl($tbl_faculty->faculty_birthDate) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_faculty->faculty_birthDate->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_faculty->SortUrl($tbl_faculty->faculty_birthDate) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_faculty->faculty_birthDate->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_faculty->faculty_birthDate->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_faculty->faculty_birthDate->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_faculty->gender_ID->Visible) { // gender_ID ?>
	<?php if ($tbl_faculty->SortUrl($tbl_faculty->gender_ID) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_faculty->gender_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_faculty->SortUrl($tbl_faculty->gender_ID) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_faculty->gender_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_faculty->gender_ID->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_faculty->gender_ID->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_faculty->faculty_highestDegreeListed->Visible) { // faculty_highestDegreeListed ?>
	<?php if ($tbl_faculty->SortUrl($tbl_faculty->faculty_highestDegreeListed) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_faculty->faculty_highestDegreeListed->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_faculty->SortUrl($tbl_faculty->faculty_highestDegreeListed) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_faculty->faculty_highestDegreeListed->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_faculty->faculty_highestDegreeListed->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_faculty->faculty_highestDegreeListed->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_faculty->degreelevelFaculty_ID->Visible) { // degreelevelFaculty_ID ?>
	<?php if ($tbl_faculty->SortUrl($tbl_faculty->degreelevelFaculty_ID) == "") { ?>
		<td><?php echo $tbl_faculty->degreelevelFaculty_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_faculty->SortUrl($tbl_faculty->degreelevelFaculty_ID) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $tbl_faculty->degreelevelFaculty_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_faculty->degreelevelFaculty_ID->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_faculty->degreelevelFaculty_ID->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_faculty_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($tbl_faculty->ExportAll && $tbl_faculty->Export <> "") {
	$tbl_faculty_list->StopRec = $tbl_faculty_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tbl_faculty_list->TotalRecs > $tbl_faculty_list->StartRec + $tbl_faculty_list->DisplayRecs - 1)
		$tbl_faculty_list->StopRec = $tbl_faculty_list->StartRec + $tbl_faculty_list->DisplayRecs - 1;
	else
		$tbl_faculty_list->StopRec = $tbl_faculty_list->TotalRecs;
}
$tbl_faculty_list->RecCnt = $tbl_faculty_list->StartRec - 1;
if ($tbl_faculty_list->Recordset && !$tbl_faculty_list->Recordset->EOF) {
	$tbl_faculty_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_faculty_list->StartRec > 1)
		$tbl_faculty_list->Recordset->Move($tbl_faculty_list->StartRec - 1);
} elseif (!$tbl_faculty->AllowAddDeleteRow && $tbl_faculty_list->StopRec == 0) {
	$tbl_faculty_list->StopRec = $tbl_faculty->GridAddRowCount;
}

// Initialize aggregate
$tbl_faculty->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_faculty->ResetAttrs();
$tbl_faculty_list->RenderRow();
$tbl_faculty_list->RowCnt = 0;
while ($tbl_faculty_list->RecCnt < $tbl_faculty_list->StopRec) {
	$tbl_faculty_list->RecCnt++;
	if (intval($tbl_faculty_list->RecCnt) >= intval($tbl_faculty_list->StartRec)) {
		$tbl_faculty_list->RowCnt++;

		// Set up key count
		$tbl_faculty_list->KeyCount = $tbl_faculty_list->RowIndex;

		// Init row class and style
		$tbl_faculty->ResetAttrs();
		$tbl_faculty->CssClass = "";
		if ($tbl_faculty->CurrentAction == "gridadd") {
		} else {
			$tbl_faculty_list->LoadRowValues($tbl_faculty_list->Recordset); // Load row values
		}
		$tbl_faculty->RowType = UP_ROWTYPE_VIEW; // Render view
		$tbl_faculty->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$tbl_faculty_list->RenderRow();

		// Render list options
		$tbl_faculty_list->RenderListOptions();
?>
	<tr<?php echo $tbl_faculty->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_faculty_list->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_faculty->faculty_name->Visible) { // faculty_name ?>
		<td<?php echo $tbl_faculty->faculty_name->CellAttributes() ?>>
<div<?php echo $tbl_faculty->faculty_name->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_name->ListViewValue() ?></div>
<a name="<?php echo $tbl_faculty_list->PageObjName . "_row_" . $tbl_faculty_list->RowCnt ?>" id="<?php echo $tbl_faculty_list->PageObjName . "_row_" . $tbl_faculty_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($tbl_faculty->faculty_birthDate->Visible) { // faculty_birthDate ?>
		<td<?php echo $tbl_faculty->faculty_birthDate->CellAttributes() ?>>
<div<?php echo $tbl_faculty->faculty_birthDate->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_birthDate->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_faculty->gender_ID->Visible) { // gender_ID ?>
		<td<?php echo $tbl_faculty->gender_ID->CellAttributes() ?>>
<div<?php echo $tbl_faculty->gender_ID->ViewAttributes() ?>><?php echo $tbl_faculty->gender_ID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_faculty->faculty_highestDegreeListed->Visible) { // faculty_highestDegreeListed ?>
		<td<?php echo $tbl_faculty->faculty_highestDegreeListed->CellAttributes() ?>>
<div<?php echo $tbl_faculty->faculty_highestDegreeListed->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_highestDegreeListed->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_faculty->degreelevelFaculty_ID->Visible) { // degreelevelFaculty_ID ?>
		<td<?php echo $tbl_faculty->degreelevelFaculty_ID->CellAttributes() ?>>
<div<?php echo $tbl_faculty->degreelevelFaculty_ID->ViewAttributes() ?>><?php echo $tbl_faculty->degreelevelFaculty_ID->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_faculty_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($tbl_faculty->CurrentAction <> "gridadd")
		$tbl_faculty_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($tbl_faculty_list->Recordset)
	$tbl_faculty_list->Recordset->Close();
?>
<?php if ($tbl_faculty_list->TotalRecs > 0) { ?>
<?php if ($tbl_faculty->Export == "") { ?>
<div class="upGridLowerPanel">
<?php if ($tbl_faculty->CurrentAction <> "gridadd" && $tbl_faculty->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_faculty_list->Pager)) $tbl_faculty_list->Pager = new cPrevNextPager($tbl_faculty_list->StartRec, $tbl_faculty_list->DisplayRecs, $tbl_faculty_list->TotalRecs) ?>
<?php if ($tbl_faculty_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_faculty_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_faculty_list->PageUrl() ?>start=<?php echo $tbl_faculty_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_faculty_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_faculty_list->PageUrl() ?>start=<?php echo $tbl_faculty_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_faculty_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_faculty_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_faculty_list->PageUrl() ?>start=<?php echo $tbl_faculty_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_faculty_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_faculty_list->PageUrl() ?>start=<?php echo $tbl_faculty_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_faculty_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_faculty_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_faculty_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_faculty_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_faculty_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $tbl_faculty_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php if ($tbl_degrees->DetailAdd && $Security->AllowAdd('tbl_degrees')) { ?>
<a class="upGridLink" href="<?php echo $tbl_faculty->AddUrl() . "?" . UP_TABLE_SHOW_DETAIL . "=tbl_degrees" ?>"><?php echo $Language->Phrase("AddLink") ?>&nbsp;<?php echo $tbl_faculty->TableCaption() ?>/<?php echo $tbl_degrees->TableCaption() ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
<?php if ($tbl_faculty_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ftbl_facultylist, '<?php echo $tbl_faculty_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($tbl_faculty->Export == "" && $tbl_faculty->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_faculty_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($tbl_faculty->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tbl_faculty_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_faculty_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'tbl_faculty';

	// Page object name
	var $PageObjName = 'tbl_faculty_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_faculty;
		if ($tbl_faculty->UseTokenInUrl) $PageUrl .= "t=" . $tbl_faculty->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_faculty;
		if ($tbl_faculty->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_faculty->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_faculty->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_faculty_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_faculty)
		if (!isset($GLOBALS["tbl_faculty"])) {
			$GLOBALS["tbl_faculty"] = new ctbl_faculty();
			$GLOBALS["Table"] =& $GLOBALS["tbl_faculty"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "tbl_facultyadd.php?" . UP_TABLE_SHOW_DETAIL . "=";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "tbl_facultydelete.php";
		$this->MultiUpdateUrl = "tbl_facultyupdate.php";

		// Table object (tbl_degrees)
		if (!isset($GLOBALS['tbl_degrees'])) $GLOBALS['tbl_degrees'] = new ctbl_degrees();

		// Table object (tbl_uporgchart_unit)
		if (!isset($GLOBALS['tbl_uporgchart_unit'])) $GLOBALS['tbl_uporgchart_unit'] = new ctbl_uporgchart_unit();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_faculty', TRUE);

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
		global $tbl_faculty;

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
			$tbl_faculty->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_faculty;

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
			if ($tbl_faculty->Export <> "" ||
				$tbl_faculty->CurrentAction == "gridadd" ||
				$tbl_faculty->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$tbl_faculty->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($tbl_faculty->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_faculty->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$tbl_faculty->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$tbl_faculty->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$tbl_faculty->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $tbl_faculty->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $tbl_faculty->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $tbl_faculty->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($tbl_faculty->getMasterFilter() <> "" && $tbl_faculty->getCurrentMasterTable() == "tbl_uporgchart_unit") {
			global $tbl_uporgchart_unit;
			$rsmaster = $tbl_uporgchart_unit->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($tbl_faculty->getReturnUrl()); // Return to caller
			} else {
				$tbl_uporgchart_unit->LoadListRowValues($rsmaster);
				$tbl_uporgchart_unit->RowType = UP_ROWTYPE_MASTER; // Master row
				$tbl_uporgchart_unit->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$tbl_faculty->setSessionWhere($sFilter);
		$tbl_faculty->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $tbl_faculty;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $tbl_faculty->faculty_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_faculty->faculty_lastName, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_faculty->faculty_firstName, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_faculty->faculty_middleName, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_faculty->gender_ID, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_faculty->faculty_isEnrolledOrInResidence, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_faculty->faculty_hasEarnedCreditUnits, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_faculty->faculty_candidate, $Keyword);
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
		global $Security, $tbl_faculty;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $tbl_faculty->BasicSearchKeyword;
		$sSearchType = $tbl_faculty->BasicSearchType;
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
			$tbl_faculty->setSessionBasicSearchKeyword($sSearchKeyword);
			$tbl_faculty->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $tbl_faculty;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$tbl_faculty->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $tbl_faculty;
		$tbl_faculty->setSessionBasicSearchKeyword("");
		$tbl_faculty->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $tbl_faculty;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$tbl_faculty->BasicSearchKeyword = $tbl_faculty->getSessionBasicSearchKeyword();
			$tbl_faculty->BasicSearchType = $tbl_faculty->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_faculty;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_faculty->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_faculty->CurrentOrderType = @$_GET["ordertype"];
			$tbl_faculty->UpdateSort($tbl_faculty->faculty_name); // faculty_name
			$tbl_faculty->UpdateSort($tbl_faculty->faculty_birthDate); // faculty_birthDate
			$tbl_faculty->UpdateSort($tbl_faculty->gender_ID); // gender_ID
			$tbl_faculty->UpdateSort($tbl_faculty->faculty_highestDegreeListed); // faculty_highestDegreeListed
			$tbl_faculty->UpdateSort($tbl_faculty->degreelevelFaculty_ID); // degreelevelFaculty_ID
			$tbl_faculty->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_faculty;
		$sOrderBy = $tbl_faculty->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_faculty->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_faculty->SqlOrderBy();
				$tbl_faculty->setSessionOrderBy($sOrderBy);
				$tbl_faculty->faculty_name->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_faculty;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$tbl_faculty->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$tbl_faculty->unitID->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_faculty->setSessionOrderBy($sOrderBy);
				$tbl_faculty->faculty_name->setSort("");
				$tbl_faculty->faculty_birthDate->setSort("");
				$tbl_faculty->gender_ID->setSort("");
				$tbl_faculty->faculty_highestDegreeListed->setSort("");
				$tbl_faculty->degreelevelFaculty_ID->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_faculty->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_faculty;

		// "edit"
		$item =& $this->ListOptions->Add("edit");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanEdit();
		$item->OnLeft = TRUE;

		// "detail_tbl_degrees"
		$item =& $this->ListOptions->Add("detail_tbl_degrees");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->AllowList('tbl_degrees');
		$item->OnLeft = TRUE;

		// "checkbox"
		$item =& $this->ListOptions->Add("checkbox");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->CanDelete();
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"tbl_faculty_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $tbl_faculty, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
		}

		// "detail_tbl_degrees"
		$oListOpt =& $this->ListOptions->Items["detail_tbl_degrees"];
		if ($Security->AllowList('tbl_degrees')) {
			$oListOpt->Body = "<img src=\"phpimages/detail.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("DetailLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("DetailLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . $Language->TablePhrase("tbl_degrees", "TblCaption");
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"tbl_degreeslist.php?" . UP_TABLE_SHOW_MASTER . "=tbl_faculty&faculty_ID=" . urlencode(strval($tbl_faculty->faculty_ID->CurrentValue)) . "\">" . $oListOpt->Body . "</a>";
			$links = "";
			if ($GLOBALS["tbl_degrees"]->DetailEdit && $Security->CanEdit() && $Security->AllowEdit('tbl_degrees'))
				$links .= "<a class=\"upRowLink\" href=\"" . $tbl_faculty->EditUrl(UP_TABLE_SHOW_DETAIL . "=tbl_degrees") . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>&nbsp;";
			if ($links <> "") $oListOpt->Body .= "<br>" . $links;
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($tbl_faculty->faculty_ID->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_faculty;
		$sSqlWrk = "`faculty_ID`=" . up_AdjustSql($tbl_faculty->faculty_ID->CurrentValue) . "";
		$sSqlWrk = TEAencrypt($sSqlWrk, UP_RANDOM_KEY);
		$sSqlWrk = str_replace("'", "\'", $sSqlWrk);
		$sHyperLinkParm = " href=\"tbl_degreeslist.php?" . UP_TABLE_SHOW_MASTER . "=tbl_faculty&faculty_ID=" . urlencode(strval($tbl_faculty->faculty_ID->CurrentValue)) . "\"";
		$oListOpt =& $this->ListOptions->Items["detail_tbl_degrees"];
		$oListOpt->Body = $Language->TablePhrase("tbl_degrees", "TblCaption");
		$oListOpt->Body = "<a class=\"upRowLink\"" . $sHyperLinkParm . ">" . $oListOpt->Body . "</a>";
		$sHyperLinkParm = " href=\"javascript:void(0);\" name=\"dl%i_tbl_faculty_tbl_degrees\" id=\"dl%i_tbl_faculty_tbl_degrees\" onclick=\"up_AjaxShowDetails2(event, this, 'tbl_degreespreview.php?f=%s')\"";		
		$sHyperLinkParm = str_replace("%i", $this->RowCnt, $sHyperLinkParm);
		$sHyperLinkParm = str_replace("%s", $sSqlWrk, $sHyperLinkParm);
		$oListOpt->Body = "<a" . $sHyperLinkParm . "><img class=\"upPreviewRowImage\" src=\"phpimages/expand.gif\" width=\"9\" height=\"9\" border=\"0\"></a>&nbsp;" . $oListOpt->Body;
		$links = "";
		if ($GLOBALS["tbl_degrees"]->DetailEdit && $Security->CanEdit() && $Security->AllowEdit('tbl_degrees'))
			$links .= "<a class=\"upRowLink\" href=\"" . $tbl_faculty->EditUrl(UP_TABLE_SHOW_DETAIL . "=tbl_degrees") . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>&nbsp;";
		if ($links <> "") $oListOpt->Body .= "<br>" . $links;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_faculty;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_faculty->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_faculty->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_faculty->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_faculty->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_faculty->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_faculty->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $tbl_faculty;
		$tbl_faculty->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$tbl_faculty->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_faculty;

		// Call Recordset Selecting event
		$tbl_faculty->Recordset_Selecting($tbl_faculty->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_faculty->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_faculty->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_faculty;
		$sFilter = $tbl_faculty->KeyFilter();

		// Call Row Selecting event
		$tbl_faculty->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_faculty->CurrentFilter = $sFilter;
		$sSql = $tbl_faculty->SQL();
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
		global $conn, $tbl_faculty;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_faculty->Row_Selected($row);
		$tbl_faculty->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$tbl_faculty->unitID->setDbValue($rs->fields('unitID'));
		$tbl_faculty->faculty_name->setDbValue($rs->fields('faculty_name'));
		$tbl_faculty->faculty_lastName->setDbValue($rs->fields('faculty_lastName'));
		$tbl_faculty->faculty_firstName->setDbValue($rs->fields('faculty_firstName'));
		$tbl_faculty->faculty_middleName->setDbValue($rs->fields('faculty_middleName'));
		$tbl_faculty->faculty_birthDate->setDbValue($rs->fields('faculty_birthDate'));
		$tbl_faculty->gender_ID->setDbValue($rs->fields('gender_ID'));
		$tbl_faculty->faculty_hda_gen->setDbValue($rs->fields('faculty_hda_gen'));
		$tbl_faculty->faculty_inActivePursuitofHigherDegree_gen->setDbValue($rs->fields('faculty_inActivePursuitofHigherDegree_gen'));
		$tbl_faculty->faculty_highestDegreeListed->setDbValue($rs->fields('faculty_highestDegreeListed'));
		$tbl_faculty->degreelevelFaculty_ID->setDbValue($rs->fields('degreelevelFaculty_ID'));
		$tbl_faculty->faculty_isEnrolledOrInResidence->setDbValue($rs->fields('faculty_isEnrolledOrInResidence'));
		$tbl_faculty->faculty_hasEarnedCreditUnits->setDbValue($rs->fields('faculty_hasEarnedCreditUnits'));
		$tbl_faculty->faculty_candidate->setDbValue($rs->fields('faculty_candidate'));
		$tbl_faculty->faculty_authoritative_data->setDbValue($rs->fields('faculty_authoritative_data'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_faculty;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($tbl_faculty->getKey("faculty_ID")) <> "")
			$tbl_faculty->faculty_ID->CurrentValue = $tbl_faculty->getKey("faculty_ID"); // faculty_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_faculty->CurrentFilter = $tbl_faculty->KeyFilter();
			$sSql = $tbl_faculty->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_faculty;

		// Initialize URLs
		$this->ViewUrl = $tbl_faculty->ViewUrl();
		$this->EditUrl = $tbl_faculty->EditUrl();
		$this->InlineEditUrl = $tbl_faculty->InlineEditUrl();
		$this->CopyUrl = $tbl_faculty->CopyUrl();
		$this->InlineCopyUrl = $tbl_faculty->InlineCopyUrl();
		$this->DeleteUrl = $tbl_faculty->DeleteUrl();

		// Call Row_Rendering event
		$tbl_faculty->Row_Rendering();

		// Common render codes for all row types
		// faculty_ID

		$tbl_faculty->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// unitID
		$tbl_faculty->unitID->CellCssStyle = "white-space: nowrap;";

		// faculty_name
		$tbl_faculty->faculty_name->CellCssStyle = "white-space: nowrap;";

		// faculty_lastName
		$tbl_faculty->faculty_lastName->CellCssStyle = "white-space: nowrap;";

		// faculty_firstName
		$tbl_faculty->faculty_firstName->CellCssStyle = "white-space: nowrap;";

		// faculty_middleName
		$tbl_faculty->faculty_middleName->CellCssStyle = "white-space: nowrap;";

		// faculty_birthDate
		$tbl_faculty->faculty_birthDate->CellCssStyle = "white-space: nowrap;";

		// gender_ID
		$tbl_faculty->gender_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_hda_gen
		$tbl_faculty->faculty_hda_gen->CellCssStyle = "white-space: nowrap;";

		// faculty_inActivePursuitofHigherDegree_gen
		$tbl_faculty->faculty_inActivePursuitofHigherDegree_gen->CellCssStyle = "white-space: nowrap;";

		// faculty_highestDegreeListed
		$tbl_faculty->faculty_highestDegreeListed->CellCssStyle = "white-space: nowrap;";

		// degreelevelFaculty_ID
		// faculty_isEnrolledOrInResidence

		$tbl_faculty->faculty_isEnrolledOrInResidence->CellCssStyle = "white-space: nowrap;";

		// faculty_hasEarnedCreditUnits
		$tbl_faculty->faculty_hasEarnedCreditUnits->CellCssStyle = "white-space: nowrap;";

		// faculty_candidate
		$tbl_faculty->faculty_candidate->CellCssStyle = "white-space: nowrap;";

		// faculty_authoritative_data
		$tbl_faculty->faculty_authoritative_data->CellCssStyle = "white-space: nowrap;";
		if ($tbl_faculty->RowType == UP_ROWTYPE_VIEW) { // View row

			// faculty_name
			$tbl_faculty->faculty_name->ViewValue = $tbl_faculty->faculty_name->CurrentValue;
			$tbl_faculty->faculty_name->ViewCustomAttributes = "";

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->ViewValue = $tbl_faculty->faculty_birthDate->CurrentValue;
			$tbl_faculty->faculty_birthDate->ViewValue = up_FormatDateTime($tbl_faculty->faculty_birthDate->ViewValue, 6);
			$tbl_faculty->faculty_birthDate->ViewCustomAttributes = "";

			// gender_ID
			if (strval($tbl_faculty->gender_ID->CurrentValue) <> "") {
				switch ($tbl_faculty->gender_ID->CurrentValue) {
					case "F":
						$tbl_faculty->gender_ID->ViewValue = $tbl_faculty->gender_ID->FldTagCaption(1) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(1) : $tbl_faculty->gender_ID->CurrentValue;
						break;
					case "M":
						$tbl_faculty->gender_ID->ViewValue = $tbl_faculty->gender_ID->FldTagCaption(2) <> "" ? $tbl_faculty->gender_ID->FldTagCaption(2) : $tbl_faculty->gender_ID->CurrentValue;
						break;
					default:
						$tbl_faculty->gender_ID->ViewValue = $tbl_faculty->gender_ID->CurrentValue;
				}
			} else {
				$tbl_faculty->gender_ID->ViewValue = NULL;
			}
			$tbl_faculty->gender_ID->ViewCustomAttributes = "";

			// faculty_highestDegreeListed
			$tbl_faculty->faculty_highestDegreeListed->ViewValue = $tbl_faculty->faculty_highestDegreeListed->CurrentValue;
			if (strval($tbl_faculty->faculty_highestDegreeListed->CurrentValue) <> "") {
				$sFilterWrk = "`degreeLevel_ID` = " . up_AdjustSql($tbl_faculty->faculty_highestDegreeListed->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreeLevel_name` FROM `ref_degreelevel_degrees`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_faculty->faculty_highestDegreeListed->ViewValue = $rswrk->fields('degreeLevel_name');
					$rswrk->Close();
				} else {
					$tbl_faculty->faculty_highestDegreeListed->ViewValue = $tbl_faculty->faculty_highestDegreeListed->CurrentValue;
				}
			} else {
				$tbl_faculty->faculty_highestDegreeListed->ViewValue = NULL;
			}
			$tbl_faculty->faculty_highestDegreeListed->ViewCustomAttributes = "";

			// degreelevelFaculty_ID
			if (strval($tbl_faculty->degreelevelFaculty_ID->CurrentValue) <> "") {
				$sFilterWrk = "`degreelevelFaculty_ID` = " . up_AdjustSql($tbl_faculty->degreelevelFaculty_ID->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreelevelFaculty_name` FROM `ref_degreelevel_faculty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `degreelevelFaculty_name` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_faculty->degreelevelFaculty_ID->ViewValue = $rswrk->fields('degreelevelFaculty_name');
					$rswrk->Close();
				} else {
					$tbl_faculty->degreelevelFaculty_ID->ViewValue = $tbl_faculty->degreelevelFaculty_ID->CurrentValue;
				}
			} else {
				$tbl_faculty->degreelevelFaculty_ID->ViewValue = NULL;
			}
			$tbl_faculty->degreelevelFaculty_ID->ViewCustomAttributes = "";

			// faculty_name
			$tbl_faculty->faculty_name->LinkCustomAttributes = "";
			$tbl_faculty->faculty_name->HrefValue = "";
			$tbl_faculty->faculty_name->TooltipValue = "";

			// faculty_birthDate
			$tbl_faculty->faculty_birthDate->LinkCustomAttributes = "";
			$tbl_faculty->faculty_birthDate->HrefValue = "";
			$tbl_faculty->faculty_birthDate->TooltipValue = "";

			// gender_ID
			$tbl_faculty->gender_ID->LinkCustomAttributes = "";
			$tbl_faculty->gender_ID->HrefValue = "";
			$tbl_faculty->gender_ID->TooltipValue = "";

			// faculty_highestDegreeListed
			$tbl_faculty->faculty_highestDegreeListed->LinkCustomAttributes = "";
			$tbl_faculty->faculty_highestDegreeListed->HrefValue = "";
			$tbl_faculty->faculty_highestDegreeListed->TooltipValue = "";

			// degreelevelFaculty_ID
			$tbl_faculty->degreelevelFaculty_ID->LinkCustomAttributes = "";
			$tbl_faculty->degreelevelFaculty_ID->HrefValue = "";
			$tbl_faculty->degreelevelFaculty_ID->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_faculty->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_faculty->Row_Rendered();
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_faculty;
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
					$tbl_faculty->unitID->setQueryStringValue($GLOBALS["tbl_uporgchart_unit"]->unitID->QueryStringValue);
					$tbl_faculty->unitID->setSessionValue($tbl_faculty->unitID->QueryStringValue);
					if (!is_numeric($GLOBALS["tbl_uporgchart_unit"]->unitID->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$tbl_faculty->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$tbl_faculty->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "tbl_uporgchart_unit") {
				if ($tbl_faculty->unitID->QueryStringValue == "") $tbl_faculty->unitID->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $tbl_faculty->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_faculty->getDetailFilter(); // Get detail filter
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
		$table = 'tbl_faculty';
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
