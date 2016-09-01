<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_degreesinfo.php" ?>
<?php include_once "tbl_facultyinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_degrees_list = new ctbl_degrees_list();
$Page =& $tbl_degrees_list;

// Page init
$tbl_degrees_list->Page_Init();

// Page main
$tbl_degrees_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($tbl_degrees->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_degrees_list = new up_Page("tbl_degrees_list");

// page properties
tbl_degrees_list.PageID = "list"; // page ID
tbl_degrees_list.FormID = "ftbl_degreeslist"; // form ID
var UP_PAGE_ID = tbl_degrees_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_degrees_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_degrees_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_degrees_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_degrees_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($tbl_degrees->Export == "") || (UP_EXPORT_MASTER_RECORD && $tbl_degrees->Export == "print")) { ?>
<?php
$gsMasterReturnUrl = "tbl_facultylist.php";
if ($tbl_degrees_list->DbMasterFilter <> "" && $tbl_degrees->getCurrentMasterTable() == "tbl_faculty") {
	if ($tbl_degrees_list->MasterRecordExists) {
		if ($tbl_degrees->getCurrentMasterTable() == $tbl_degrees->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $tbl_faculty->TableCaption() ?>
&nbsp;&nbsp;<?php $tbl_degrees_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($tbl_degrees->Export == "") { ?>
<p class="upbudgetofficeclass"><a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></p>
<?php } ?>
<?php include_once "tbl_facultymaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_degrees_list->TotalRecs = $tbl_degrees->SelectRecordCount();
	} else {
		if ($tbl_degrees_list->Recordset = $tbl_degrees_list->LoadRecordset())
			$tbl_degrees_list->TotalRecs = $tbl_degrees_list->Recordset->RecordCount();
	}
	$tbl_degrees_list->StartRec = 1;
	if ($tbl_degrees_list->DisplayRecs <= 0 || ($tbl_degrees->Export <> "" && $tbl_degrees->ExportAll)) // Display all records
		$tbl_degrees_list->DisplayRecs = $tbl_degrees_list->TotalRecs;
	if (!($tbl_degrees->Export <> "" && $tbl_degrees->ExportAll))
		$tbl_degrees_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$tbl_degrees_list->Recordset = $tbl_degrees_list->LoadRecordset($tbl_degrees_list->StartRec-1, $tbl_degrees_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_degrees->TableCaption() ?>
<?php if ($tbl_degrees->getCurrentMasterTable() == "") { ?>
&nbsp;&nbsp;<?php $tbl_degrees_list->ExportOptions->Render("body"); ?>
<?php } ?>
</p>
<?php $tbl_degrees_list->ShowPageHeader(); ?>
<?php
$tbl_degrees_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($tbl_degrees->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($tbl_degrees->CurrentAction <> "gridadd" && $tbl_degrees->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_degrees_list->Pager)) $tbl_degrees_list->Pager = new cPrevNextPager($tbl_degrees_list->StartRec, $tbl_degrees_list->DisplayRecs, $tbl_degrees_list->TotalRecs) ?>
<?php if ($tbl_degrees_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_degrees_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_degrees_list->PageUrl() ?>start=<?php echo $tbl_degrees_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_degrees_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_degrees_list->PageUrl() ?>start=<?php echo $tbl_degrees_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_degrees_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_degrees_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_degrees_list->PageUrl() ?>start=<?php echo $tbl_degrees_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_degrees_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_degrees_list->PageUrl() ?>start=<?php echo $tbl_degrees_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_degrees_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_degrees_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_degrees_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_degrees_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_degrees_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $tbl_degrees_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_degrees_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ftbl_degreeslist, '<?php echo $tbl_degrees_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ftbl_degreeslist" id="ftbl_degreeslist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="tbl_degrees">
<div id="gmp_tbl_degrees" class="upGridMiddlePanel">
<?php if ($tbl_degrees_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_degrees->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_degrees_list->RenderListOptions();

// Render list options (header, left)
$tbl_degrees_list->ListOptions->Render("header", "left");
?>
<?php if ($tbl_degrees->degrees_level->Visible) { // degrees_level ?>
	<?php if ($tbl_degrees->SortUrl($tbl_degrees->degrees_level) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_level->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_degrees->SortUrl($tbl_degrees->degrees_level) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_degrees->degrees_level->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_degrees->degrees_level->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_degrees->degrees_level->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_degrees->degrees_disciplineCode->Visible) { // degrees_disciplineCode ?>
	<?php if ($tbl_degrees->SortUrl($tbl_degrees->degrees_disciplineCode) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_disciplineCode->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_degrees->SortUrl($tbl_degrees->degrees_disciplineCode) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_degrees->degrees_disciplineCode->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_degrees->degrees_disciplineCode->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_degrees->degrees_disciplineCode->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_degrees->degrees_fieldOfStudy->Visible) { // degrees_fieldOfStudy ?>
	<?php if ($tbl_degrees->SortUrl($tbl_degrees->degrees_fieldOfStudy) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_fieldOfStudy->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_degrees->SortUrl($tbl_degrees->degrees_fieldOfStudy) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_degrees->degrees_fieldOfStudy->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_degrees->degrees_fieldOfStudy->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_degrees->degrees_fieldOfStudy->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_degrees->degrees_wroteThesisDissertation->Visible) { // degrees_wroteThesisDissertation ?>
	<?php if ($tbl_degrees->SortUrl($tbl_degrees->degrees_wroteThesisDissertation) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_wroteThesisDissertation->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_degrees->SortUrl($tbl_degrees->degrees_wroteThesisDissertation) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_degrees->degrees_wroteThesisDissertation->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_degrees->degrees_wroteThesisDissertation->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_degrees->degrees_wroteThesisDissertation->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_degrees->degrees_primaryDegree->Visible) { // degrees_primaryDegree ?>
	<?php if ($tbl_degrees->SortUrl($tbl_degrees->degrees_primaryDegree) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_degrees->degrees_primaryDegree->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_degrees->SortUrl($tbl_degrees->degrees_primaryDegree) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_degrees->degrees_primaryDegree->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_degrees->degrees_primaryDegree->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_degrees->degrees_primaryDegree->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_degrees_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($tbl_degrees->ExportAll && $tbl_degrees->Export <> "") {
	$tbl_degrees_list->StopRec = $tbl_degrees_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tbl_degrees_list->TotalRecs > $tbl_degrees_list->StartRec + $tbl_degrees_list->DisplayRecs - 1)
		$tbl_degrees_list->StopRec = $tbl_degrees_list->StartRec + $tbl_degrees_list->DisplayRecs - 1;
	else
		$tbl_degrees_list->StopRec = $tbl_degrees_list->TotalRecs;
}
$tbl_degrees_list->RecCnt = $tbl_degrees_list->StartRec - 1;
if ($tbl_degrees_list->Recordset && !$tbl_degrees_list->Recordset->EOF) {
	$tbl_degrees_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_degrees_list->StartRec > 1)
		$tbl_degrees_list->Recordset->Move($tbl_degrees_list->StartRec - 1);
} elseif (!$tbl_degrees->AllowAddDeleteRow && $tbl_degrees_list->StopRec == 0) {
	$tbl_degrees_list->StopRec = $tbl_degrees->GridAddRowCount;
}

// Initialize aggregate
$tbl_degrees->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_degrees->ResetAttrs();
$tbl_degrees_list->RenderRow();
$tbl_degrees_list->RowCnt = 0;
while ($tbl_degrees_list->RecCnt < $tbl_degrees_list->StopRec) {
	$tbl_degrees_list->RecCnt++;
	if (intval($tbl_degrees_list->RecCnt) >= intval($tbl_degrees_list->StartRec)) {
		$tbl_degrees_list->RowCnt++;

		// Set up key count
		$tbl_degrees_list->KeyCount = $tbl_degrees_list->RowIndex;

		// Init row class and style
		$tbl_degrees->ResetAttrs();
		$tbl_degrees->CssClass = "";
		if ($tbl_degrees->CurrentAction == "gridadd") {
		} else {
			$tbl_degrees_list->LoadRowValues($tbl_degrees_list->Recordset); // Load row values
		}
		$tbl_degrees->RowType = UP_ROWTYPE_VIEW; // Render view
		$tbl_degrees->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$tbl_degrees_list->RenderRow();

		// Render list options
		$tbl_degrees_list->RenderListOptions();
?>
	<tr<?php echo $tbl_degrees->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_degrees_list->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_degrees->degrees_level->Visible) { // degrees_level ?>
		<td<?php echo $tbl_degrees->degrees_level->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_level->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_level->ListViewValue() ?></div>
<a name="<?php echo $tbl_degrees_list->PageObjName . "_row_" . $tbl_degrees_list->RowCnt ?>" id="<?php echo $tbl_degrees_list->PageObjName . "_row_" . $tbl_degrees_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($tbl_degrees->degrees_disciplineCode->Visible) { // degrees_disciplineCode ?>
		<td<?php echo $tbl_degrees->degrees_disciplineCode->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_disciplineCode->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_disciplineCode->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_degrees->degrees_fieldOfStudy->Visible) { // degrees_fieldOfStudy ?>
		<td<?php echo $tbl_degrees->degrees_fieldOfStudy->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_fieldOfStudy->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_fieldOfStudy->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_degrees->degrees_wroteThesisDissertation->Visible) { // degrees_wroteThesisDissertation ?>
		<td<?php echo $tbl_degrees->degrees_wroteThesisDissertation->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_wroteThesisDissertation->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_wroteThesisDissertation->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_degrees->degrees_primaryDegree->Visible) { // degrees_primaryDegree ?>
		<td<?php echo $tbl_degrees->degrees_primaryDegree->CellAttributes() ?>>
<div<?php echo $tbl_degrees->degrees_primaryDegree->ViewAttributes() ?>><?php echo $tbl_degrees->degrees_primaryDegree->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_degrees_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($tbl_degrees->CurrentAction <> "gridadd")
		$tbl_degrees_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($tbl_degrees_list->Recordset)
	$tbl_degrees_list->Recordset->Close();
?>
<?php if ($tbl_degrees_list->TotalRecs > 0) { ?>
<?php if ($tbl_degrees->Export == "") { ?>
<div class="upGridLowerPanel">
<?php if ($tbl_degrees->CurrentAction <> "gridadd" && $tbl_degrees->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_degrees_list->Pager)) $tbl_degrees_list->Pager = new cPrevNextPager($tbl_degrees_list->StartRec, $tbl_degrees_list->DisplayRecs, $tbl_degrees_list->TotalRecs) ?>
<?php if ($tbl_degrees_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_degrees_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_degrees_list->PageUrl() ?>start=<?php echo $tbl_degrees_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_degrees_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_degrees_list->PageUrl() ?>start=<?php echo $tbl_degrees_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_degrees_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_degrees_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_degrees_list->PageUrl() ?>start=<?php echo $tbl_degrees_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_degrees_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_degrees_list->PageUrl() ?>start=<?php echo $tbl_degrees_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_degrees_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_degrees_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_degrees_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_degrees_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_degrees_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $tbl_degrees_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_degrees_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ftbl_degreeslist, '<?php echo $tbl_degrees_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($tbl_degrees->Export == "" && $tbl_degrees->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_degrees_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($tbl_degrees->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tbl_degrees_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_degrees_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'tbl_degrees';

	// Page object name
	var $PageObjName = 'tbl_degrees_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_degrees;
		if ($tbl_degrees->UseTokenInUrl) $PageUrl .= "t=" . $tbl_degrees->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_degrees;
		if ($tbl_degrees->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_degrees->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_degrees->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_degrees_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_degrees)
		if (!isset($GLOBALS["tbl_degrees"])) {
			$GLOBALS["tbl_degrees"] = new ctbl_degrees();
			$GLOBALS["Table"] =& $GLOBALS["tbl_degrees"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "tbl_degreesadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "tbl_degreesdelete.php";
		$this->MultiUpdateUrl = "tbl_degreesupdate.php";

		// Table object (tbl_faculty)
		if (!isset($GLOBALS['tbl_faculty'])) $GLOBALS['tbl_faculty'] = new ctbl_faculty();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_degrees', TRUE);

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
		global $tbl_degrees;

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
			$tbl_degrees->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_degrees;

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
			if ($tbl_degrees->Export <> "" ||
				$tbl_degrees->CurrentAction == "gridadd" ||
				$tbl_degrees->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($tbl_degrees->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_degrees->getRecordsPerPage(); // Restore from Session
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
		$this->DbMasterFilter = $tbl_degrees->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $tbl_degrees->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($tbl_degrees->getMasterFilter() <> "" && $tbl_degrees->getCurrentMasterTable() == "tbl_faculty") {
			global $tbl_faculty;
			$rsmaster = $tbl_faculty->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($tbl_degrees->getReturnUrl()); // Return to caller
			} else {
				$tbl_faculty->LoadListRowValues($rsmaster);
				$tbl_faculty->RowType = UP_ROWTYPE_MASTER; // Master row
				$tbl_faculty->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$tbl_degrees->setSessionWhere($sFilter);
		$tbl_degrees->CurrentFilter = "";
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_degrees;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_degrees->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_degrees->CurrentOrderType = @$_GET["ordertype"];
			$tbl_degrees->UpdateSort($tbl_degrees->degrees_level); // degrees_level
			$tbl_degrees->UpdateSort($tbl_degrees->degrees_disciplineCode); // degrees_disciplineCode
			$tbl_degrees->UpdateSort($tbl_degrees->degrees_fieldOfStudy); // degrees_fieldOfStudy
			$tbl_degrees->UpdateSort($tbl_degrees->degrees_wroteThesisDissertation); // degrees_wroteThesisDissertation
			$tbl_degrees->UpdateSort($tbl_degrees->degrees_primaryDegree); // degrees_primaryDegree
			$tbl_degrees->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_degrees;
		$sOrderBy = $tbl_degrees->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_degrees->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_degrees->SqlOrderBy();
				$tbl_degrees->setSessionOrderBy($sOrderBy);
				$tbl_degrees->degrees_level->setSort("DESC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_degrees;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$tbl_degrees->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$tbl_degrees->faculty_ID->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_degrees->setSessionOrderBy($sOrderBy);
				$tbl_degrees->degrees_level->setSort("");
				$tbl_degrees->degrees_disciplineCode->setSort("");
				$tbl_degrees->degrees_fieldOfStudy->setSort("");
				$tbl_degrees->degrees_wroteThesisDissertation->setSort("");
				$tbl_degrees->degrees_primaryDegree->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_degrees->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_degrees;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"tbl_degrees_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $tbl_degrees, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($tbl_degrees->degrees_ID->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_degrees;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_degrees;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_degrees->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_degrees->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_degrees->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_degrees->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_degrees->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_degrees->setStartRecordNumber($this->StartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_degrees;

		// Call Recordset Selecting event
		$tbl_degrees->Recordset_Selecting($tbl_degrees->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_degrees->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_degrees->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_degrees;
		$sFilter = $tbl_degrees->KeyFilter();

		// Call Row Selecting event
		$tbl_degrees->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_degrees->CurrentFilter = $sFilter;
		$sSql = $tbl_degrees->SQL();
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
		global $conn, $tbl_degrees;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_degrees->Row_Selected($row);
		$tbl_degrees->degrees_ID->setDbValue($rs->fields('degrees_ID'));
		$tbl_degrees->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$tbl_degrees->degrees_level->setDbValue($rs->fields('degrees_level'));
		$tbl_degrees->degrees_disciplineCode->setDbValue($rs->fields('degrees_disciplineCode'));
		$tbl_degrees->degrees_fieldOfStudy->setDbValue($rs->fields('degrees_fieldOfStudy'));
		$tbl_degrees->degrees_wroteThesisDissertation->setDbValue($rs->fields('degrees_wroteThesisDissertation'));
		$tbl_degrees->degrees_primaryDegree->setDbValue($rs->fields('degrees_primaryDegree'));
		$tbl_degrees->degrees_authoritative_data->setDbValue($rs->fields('degrees_authoritative_data'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_degrees;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($tbl_degrees->getKey("degrees_ID")) <> "")
			$tbl_degrees->degrees_ID->CurrentValue = $tbl_degrees->getKey("degrees_ID"); // degrees_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_degrees->CurrentFilter = $tbl_degrees->KeyFilter();
			$sSql = $tbl_degrees->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_degrees;

		// Initialize URLs
		$this->ViewUrl = $tbl_degrees->ViewUrl();
		$this->EditUrl = $tbl_degrees->EditUrl();
		$this->InlineEditUrl = $tbl_degrees->InlineEditUrl();
		$this->CopyUrl = $tbl_degrees->CopyUrl();
		$this->InlineCopyUrl = $tbl_degrees->InlineCopyUrl();
		$this->DeleteUrl = $tbl_degrees->DeleteUrl();

		// Call Row_Rendering event
		$tbl_degrees->Row_Rendering();

		// Common render codes for all row types
		// degrees_ID

		$tbl_degrees->degrees_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_ID
		$tbl_degrees->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// degrees_level
		$tbl_degrees->degrees_level->CellCssStyle = "white-space: nowrap;";

		// degrees_disciplineCode
		$tbl_degrees->degrees_disciplineCode->CellCssStyle = "white-space: nowrap;";

		// degrees_fieldOfStudy
		$tbl_degrees->degrees_fieldOfStudy->CellCssStyle = "white-space: nowrap;";

		// degrees_wroteThesisDissertation
		$tbl_degrees->degrees_wroteThesisDissertation->CellCssStyle = "white-space: nowrap;";

		// degrees_primaryDegree
		$tbl_degrees->degrees_primaryDegree->CellCssStyle = "white-space: nowrap;";

		// degrees_authoritative_data
		$tbl_degrees->degrees_authoritative_data->CellCssStyle = "white-space: nowrap;";
		if ($tbl_degrees->RowType == UP_ROWTYPE_VIEW) { // View row

			// degrees_level
			if (strval($tbl_degrees->degrees_level->CurrentValue) <> "") {
				$sFilterWrk = "`degreeLevel_ID` = " . up_AdjustSql($tbl_degrees->degrees_level->CurrentValue) . "";
			$sSqlWrk = "SELECT `degreeLevel_name` FROM `ref_degreelevel_degrees`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_degrees->degrees_level->ViewValue = $rswrk->fields('degreeLevel_name');
					$rswrk->Close();
				} else {
					$tbl_degrees->degrees_level->ViewValue = $tbl_degrees->degrees_level->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_level->ViewValue = NULL;
			}
			$tbl_degrees->degrees_level->ViewCustomAttributes = "";

			// degrees_disciplineCode
			if (strval($tbl_degrees->degrees_disciplineCode->CurrentValue) <> "") {
				$sFilterWrk = "`disCHED_disciplineSpecific_code` = " . up_AdjustSql($tbl_degrees->degrees_disciplineCode->CurrentValue) . "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_nameList` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_degrees->degrees_disciplineCode->ViewValue = $rswrk->fields('disCHED_disciplineSpecific_nameList');
					$rswrk->Close();
				} else {
					$tbl_degrees->degrees_disciplineCode->ViewValue = $tbl_degrees->degrees_disciplineCode->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_disciplineCode->ViewValue = NULL;
			}
			$tbl_degrees->degrees_disciplineCode->ViewCustomAttributes = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->ViewValue = $tbl_degrees->degrees_fieldOfStudy->CurrentValue;
			$tbl_degrees->degrees_fieldOfStudy->ViewCustomAttributes = "";

			// degrees_wroteThesisDissertation
			if (strval($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) <> "") {
				switch ($tbl_degrees->degrees_wroteThesisDissertation->CurrentValue) {
					case "Y":
						$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(1) : $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
						break;
					case "N":
						$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_wroteThesisDissertation->FldTagCaption(2) : $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
						break;
					default:
						$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = $tbl_degrees->degrees_wroteThesisDissertation->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_wroteThesisDissertation->ViewValue = NULL;
			}
			$tbl_degrees->degrees_wroteThesisDissertation->ViewCustomAttributes = "";

			// degrees_primaryDegree
			if (strval($tbl_degrees->degrees_primaryDegree->CurrentValue) <> "") {
				switch ($tbl_degrees->degrees_primaryDegree->CurrentValue) {
					case "Y":
						$tbl_degrees->degrees_primaryDegree->ViewValue = $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(1) : $tbl_degrees->degrees_primaryDegree->CurrentValue;
						break;
					case "N":
						$tbl_degrees->degrees_primaryDegree->ViewValue = $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) <> "" ? $tbl_degrees->degrees_primaryDegree->FldTagCaption(2) : $tbl_degrees->degrees_primaryDegree->CurrentValue;
						break;
					default:
						$tbl_degrees->degrees_primaryDegree->ViewValue = $tbl_degrees->degrees_primaryDegree->CurrentValue;
				}
			} else {
				$tbl_degrees->degrees_primaryDegree->ViewValue = NULL;
			}
			$tbl_degrees->degrees_primaryDegree->ViewCustomAttributes = "";

			// degrees_level
			$tbl_degrees->degrees_level->LinkCustomAttributes = "";
			$tbl_degrees->degrees_level->HrefValue = "";
			$tbl_degrees->degrees_level->TooltipValue = "";

			// degrees_disciplineCode
			$tbl_degrees->degrees_disciplineCode->LinkCustomAttributes = "";
			$tbl_degrees->degrees_disciplineCode->HrefValue = "";
			$tbl_degrees->degrees_disciplineCode->TooltipValue = "";

			// degrees_fieldOfStudy
			$tbl_degrees->degrees_fieldOfStudy->LinkCustomAttributes = "";
			$tbl_degrees->degrees_fieldOfStudy->HrefValue = "";
			$tbl_degrees->degrees_fieldOfStudy->TooltipValue = "";

			// degrees_wroteThesisDissertation
			$tbl_degrees->degrees_wroteThesisDissertation->LinkCustomAttributes = "";
			$tbl_degrees->degrees_wroteThesisDissertation->HrefValue = "";
			$tbl_degrees->degrees_wroteThesisDissertation->TooltipValue = "";

			// degrees_primaryDegree
			$tbl_degrees->degrees_primaryDegree->LinkCustomAttributes = "";
			$tbl_degrees->degrees_primaryDegree->HrefValue = "";
			$tbl_degrees->degrees_primaryDegree->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_degrees->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_degrees->Row_Rendered();
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_degrees;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "tbl_faculty") {
				$bValidMaster = TRUE;
				if (@$_GET["faculty_ID"] <> "") {
					$GLOBALS["tbl_faculty"]->faculty_ID->setQueryStringValue($_GET["faculty_ID"]);
					$tbl_degrees->faculty_ID->setQueryStringValue($GLOBALS["tbl_faculty"]->faculty_ID->QueryStringValue);
					$tbl_degrees->faculty_ID->setSessionValue($tbl_degrees->faculty_ID->QueryStringValue);
					if (!is_numeric($GLOBALS["tbl_faculty"]->faculty_ID->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$tbl_degrees->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$tbl_degrees->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "tbl_faculty") {
				if ($tbl_degrees->faculty_ID->QueryStringValue == "") $tbl_degrees->faculty_ID->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $tbl_degrees->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_degrees->getDetailFilter(); // Get detail filter
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
		$table = 'tbl_degrees';
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
