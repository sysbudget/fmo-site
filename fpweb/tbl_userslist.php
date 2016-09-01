<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "view_tbl_uporgchart_cu_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_users_list = new ctbl_users_list();
$Page =& $tbl_users_list;

// Page init
$tbl_users_list->Page_Init();

// Page main
$tbl_users_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($tbl_users->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_users_list = new up_Page("tbl_users_list");

// page properties
tbl_users_list.PageID = "list"; // page ID
tbl_users_list.FormID = "ftbl_userslist"; // form ID
var UP_PAGE_ID = tbl_users_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_users_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_users_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_users_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_users_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($tbl_users->Export == "") || (UP_EXPORT_MASTER_RECORD && $tbl_users->Export == "print")) { ?>
<?php
$gsMasterReturnUrl = "view_tbl_uporgchart_cu_userslist.php";
if ($tbl_users_list->DbMasterFilter <> "" && $tbl_users->getCurrentMasterTable() == "view_tbl_uporgchart_cu_users") {
	if ($tbl_users_list->MasterRecordExists) {
		if ($tbl_users->getCurrentMasterTable() == $tbl_users->TableVar) $gsMasterReturnUrl .= "?" . UP_TABLE_SHOW_MASTER . "=";
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $view_tbl_uporgchart_cu_users->TableCaption() ?>
&nbsp;&nbsp;<?php $tbl_users_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($tbl_users->Export == "") { ?>
<p class="upbudgetofficeclass"><a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></p>
<?php } ?>
<?php include_once "view_tbl_uporgchart_cu_usersmaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_users_list->TotalRecs = $tbl_users->SelectRecordCount();
	} else {
		if ($tbl_users_list->Recordset = $tbl_users_list->LoadRecordset())
			$tbl_users_list->TotalRecs = $tbl_users_list->Recordset->RecordCount();
	}
	$tbl_users_list->StartRec = 1;
	if ($tbl_users_list->DisplayRecs <= 0 || ($tbl_users->Export <> "" && $tbl_users->ExportAll)) // Display all records
		$tbl_users_list->DisplayRecs = $tbl_users_list->TotalRecs;
	if (!($tbl_users->Export <> "" && $tbl_users->ExportAll))
		$tbl_users_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$tbl_users_list->Recordset = $tbl_users_list->LoadRecordset($tbl_users_list->StartRec-1, $tbl_users_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_users->TableCaption() ?>
<?php if ($tbl_users->getCurrentMasterTable() == "") { ?>
&nbsp;&nbsp;<?php $tbl_users_list->ExportOptions->Render("body"); ?>
<?php } ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($tbl_users->Export == "" && $tbl_users->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(tbl_users_list);" style="text-decoration: none;"><img id="tbl_users_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="tbl_users_list_SearchPanel">
<form name="ftbl_userslistsrch" id="ftbl_userslistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="tbl_users">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($tbl_users->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $tbl_users_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($tbl_users->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_users->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_users->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $tbl_users_list->ShowPageHeader(); ?>
<?php
$tbl_users_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($tbl_users->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($tbl_users->CurrentAction <> "gridadd" && $tbl_users->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_users_list->Pager)) $tbl_users_list->Pager = new cPrevNextPager($tbl_users_list->StartRec, $tbl_users_list->DisplayRecs, $tbl_users_list->TotalRecs) ?>
<?php if ($tbl_users_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_users_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_users_list->PageUrl() ?>start=<?php echo $tbl_users_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_users_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_users_list->PageUrl() ?>start=<?php echo $tbl_users_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_users_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_users_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_users_list->PageUrl() ?>start=<?php echo $tbl_users_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_users_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_users_list->PageUrl() ?>start=<?php echo $tbl_users_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_users_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_users_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_users_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_users_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_users_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $tbl_users_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_users_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ftbl_userslist, '<?php echo $tbl_users_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<form name="ftbl_userslist" id="ftbl_userslist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="tbl_users">
<div id="gmp_tbl_users" class="upGridMiddlePanel">
<?php if ($tbl_users_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_users->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_users_list->RenderListOptions();

// Render list options (header, left)
$tbl_users_list->ListOptions->Render("header", "left");
?>
<?php if ($tbl_users->users_ID->Visible) { // users_ID ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_ID) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_ID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_users->SortUrl($tbl_users->users_ID) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_ID->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_users->users_ID->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_ID->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->unitID->Visible) { // unitID ?>
	<?php if ($tbl_users->SortUrl($tbl_users->unitID) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->unitID->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_users->SortUrl($tbl_users->unitID) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->unitID->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_users->unitID->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->unitID->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->users_name->Visible) { // users_name ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_name) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_users->SortUrl($tbl_users->users_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_users->users_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->users_userLoginName->Visible) { // users_userLoginName ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_userLoginName) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_userLoginName->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_users->SortUrl($tbl_users->users_userLoginName) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_userLoginName->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_users->users_userLoginName->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_userLoginName->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->users_password->Visible) { // users_password ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_password) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_password->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_users->SortUrl($tbl_users->users_password) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_password->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_users->users_password->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_password->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->users_userLevel->Visible) { // users_userLevel ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_userLevel) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_userLevel->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_users->SortUrl($tbl_users->users_userLevel) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_userLevel->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_users->users_userLevel->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_userLevel->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->users_email->Visible) { // users_email ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_email) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_email->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_users->SortUrl($tbl_users->users_email) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_email->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_users->users_email->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_email->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_users->users_contactNo->Visible) { // users_contactNo ?>
	<?php if ($tbl_users->SortUrl($tbl_users->users_contactNo) == "") { ?>
		<td style="white-space: nowrap;"><?php echo $tbl_users->users_contactNo->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_users->SortUrl($tbl_users->users_contactNo) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn" style="white-space: nowrap;"><thead><tr><td><?php echo $tbl_users->users_contactNo->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_users->users_contactNo->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_users->users_contactNo->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_users_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($tbl_users->ExportAll && $tbl_users->Export <> "") {
	$tbl_users_list->StopRec = $tbl_users_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tbl_users_list->TotalRecs > $tbl_users_list->StartRec + $tbl_users_list->DisplayRecs - 1)
		$tbl_users_list->StopRec = $tbl_users_list->StartRec + $tbl_users_list->DisplayRecs - 1;
	else
		$tbl_users_list->StopRec = $tbl_users_list->TotalRecs;
}
$tbl_users_list->RecCnt = $tbl_users_list->StartRec - 1;
if ($tbl_users_list->Recordset && !$tbl_users_list->Recordset->EOF) {
	$tbl_users_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_users_list->StartRec > 1)
		$tbl_users_list->Recordset->Move($tbl_users_list->StartRec - 1);
} elseif (!$tbl_users->AllowAddDeleteRow && $tbl_users_list->StopRec == 0) {
	$tbl_users_list->StopRec = $tbl_users->GridAddRowCount;
}

// Initialize aggregate
$tbl_users->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_users->ResetAttrs();
$tbl_users_list->RenderRow();
$tbl_users_list->RowCnt = 0;
while ($tbl_users_list->RecCnt < $tbl_users_list->StopRec) {
	$tbl_users_list->RecCnt++;
	if (intval($tbl_users_list->RecCnt) >= intval($tbl_users_list->StartRec)) {
		$tbl_users_list->RowCnt++;

		// Set up key count
		$tbl_users_list->KeyCount = $tbl_users_list->RowIndex;

		// Init row class and style
		$tbl_users->ResetAttrs();
		$tbl_users->CssClass = "";
		if ($tbl_users->CurrentAction == "gridadd") {
		} else {
			$tbl_users_list->LoadRowValues($tbl_users_list->Recordset); // Load row values
		}
		$tbl_users->RowType = UP_ROWTYPE_VIEW; // Render view
		$tbl_users->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$tbl_users_list->RenderRow();

		// Render list options
		$tbl_users_list->RenderListOptions();
?>
	<tr<?php echo $tbl_users->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_users_list->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_users->users_ID->Visible) { // users_ID ?>
		<td<?php echo $tbl_users->users_ID->CellAttributes() ?>>
<div<?php echo $tbl_users->users_ID->ViewAttributes() ?>><?php echo $tbl_users->users_ID->ListViewValue() ?></div>
<a name="<?php echo $tbl_users_list->PageObjName . "_row_" . $tbl_users_list->RowCnt ?>" id="<?php echo $tbl_users_list->PageObjName . "_row_" . $tbl_users_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($tbl_users->unitID->Visible) { // unitID ?>
		<td<?php echo $tbl_users->unitID->CellAttributes() ?>>
<div<?php echo $tbl_users->unitID->ViewAttributes() ?>><?php echo $tbl_users->unitID->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_name->Visible) { // users_name ?>
		<td<?php echo $tbl_users->users_name->CellAttributes() ?>>
<div<?php echo $tbl_users->users_name->ViewAttributes() ?>><?php echo $tbl_users->users_name->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_userLoginName->Visible) { // users_userLoginName ?>
		<td<?php echo $tbl_users->users_userLoginName->CellAttributes() ?>>
<div<?php echo $tbl_users->users_userLoginName->ViewAttributes() ?>><?php echo $tbl_users->users_userLoginName->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_password->Visible) { // users_password ?>
		<td<?php echo $tbl_users->users_password->CellAttributes() ?>>
<div<?php echo $tbl_users->users_password->ViewAttributes() ?>><?php echo $tbl_users->users_password->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_userLevel->Visible) { // users_userLevel ?>
		<td<?php echo $tbl_users->users_userLevel->CellAttributes() ?>>
<div<?php echo $tbl_users->users_userLevel->ViewAttributes() ?>><?php echo $tbl_users->users_userLevel->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_email->Visible) { // users_email ?>
		<td<?php echo $tbl_users->users_email->CellAttributes() ?>>
<div<?php echo $tbl_users->users_email->ViewAttributes() ?>><?php echo $tbl_users->users_email->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($tbl_users->users_contactNo->Visible) { // users_contactNo ?>
		<td<?php echo $tbl_users->users_contactNo->CellAttributes() ?>>
<div<?php echo $tbl_users->users_contactNo->ViewAttributes() ?>><?php echo $tbl_users->users_contactNo->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_users_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($tbl_users->CurrentAction <> "gridadd")
		$tbl_users_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($tbl_users_list->Recordset)
	$tbl_users_list->Recordset->Close();
?>
<?php if ($tbl_users_list->TotalRecs > 0) { ?>
<?php if ($tbl_users->Export == "") { ?>
<div class="upGridLowerPanel">
<?php if ($tbl_users->CurrentAction <> "gridadd" && $tbl_users->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_users_list->Pager)) $tbl_users_list->Pager = new cPrevNextPager($tbl_users_list->StartRec, $tbl_users_list->DisplayRecs, $tbl_users_list->TotalRecs) ?>
<?php if ($tbl_users_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_users_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_users_list->PageUrl() ?>start=<?php echo $tbl_users_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_users_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_users_list->PageUrl() ?>start=<?php echo $tbl_users_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_users_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_users_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_users_list->PageUrl() ?>start=<?php echo $tbl_users_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_users_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_users_list->PageUrl() ?>start=<?php echo $tbl_users_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_users_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_users_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_users_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_users_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_users_list->SearchWhere == "0=101") { ?>
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
<a class="upGridLink" href="<?php echo $tbl_users_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($tbl_users_list->TotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a class="upGridLink" href="" onclick="up_SubmitSelected(document.ftbl_userslist, '<?php echo $tbl_users_list->MultiDeleteUrl ?>');return false;"><?php echo $Language->Phrase("DeleteSelectedLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($tbl_users->Export == "" && $tbl_users->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_users_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($tbl_users->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tbl_users_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_users_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'tbl_users';

	// Page object name
	var $PageObjName = 'tbl_users_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_users;
		if ($tbl_users->UseTokenInUrl) $PageUrl .= "t=" . $tbl_users->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_users;
		if ($tbl_users->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_users->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_users->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_users_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_users)
		if (!isset($GLOBALS["tbl_users"])) {
			$GLOBALS["tbl_users"] = new ctbl_users();
			$GLOBALS["Table"] =& $GLOBALS["tbl_users"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "tbl_usersadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "tbl_usersdelete.php";
		$this->MultiUpdateUrl = "tbl_usersupdate.php";

		// Table object (view_tbl_uporgchart_cu_users)
		if (!isset($GLOBALS['view_tbl_uporgchart_cu_users'])) $GLOBALS['view_tbl_uporgchart_cu_users'] = new cview_tbl_uporgchart_cu_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_users', TRUE);

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
		global $tbl_users;

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
			$tbl_users->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_users;

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
			if ($tbl_users->Export <> "" ||
				$tbl_users->CurrentAction == "gridadd" ||
				$tbl_users->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$tbl_users->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($tbl_users->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_users->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$tbl_users->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$tbl_users->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$tbl_users->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $tbl_users->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $tbl_users->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $tbl_users->getDetailFilter(); // Restore detail filter
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($tbl_users->getMasterFilter() <> "" && $tbl_users->getCurrentMasterTable() == "view_tbl_uporgchart_cu_users") {
			global $view_tbl_uporgchart_cu_users;
			$rsmaster = $view_tbl_uporgchart_cu_users->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate($tbl_users->getReturnUrl()); // Return to caller
			} else {
				$view_tbl_uporgchart_cu_users->LoadListRowValues($rsmaster);
				$view_tbl_uporgchart_cu_users->RowType = UP_ROWTYPE_MASTER; // Master row
				$view_tbl_uporgchart_cu_users->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$tbl_users->setSessionWhere($sFilter);
		$tbl_users->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $tbl_users;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $tbl_users->users_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_users->users_nameLast, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_users->users_nameFirst, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_users->users_nameMiddle, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_users->users_userLoginName, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_users->users_password, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_users->users_email, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $tbl_users->users_contactNo, $Keyword);
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
		global $Security, $tbl_users;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $tbl_users->BasicSearchKeyword;
		$sSearchType = $tbl_users->BasicSearchType;
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
			$tbl_users->setSessionBasicSearchKeyword($sSearchKeyword);
			$tbl_users->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $tbl_users;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$tbl_users->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $tbl_users;
		$tbl_users->setSessionBasicSearchKeyword("");
		$tbl_users->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $tbl_users;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$tbl_users->BasicSearchKeyword = $tbl_users->getSessionBasicSearchKeyword();
			$tbl_users->BasicSearchType = $tbl_users->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_users;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_users->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_users->CurrentOrderType = @$_GET["ordertype"];
			$tbl_users->UpdateSort($tbl_users->users_ID); // users_ID
			$tbl_users->UpdateSort($tbl_users->unitID); // unitID
			$tbl_users->UpdateSort($tbl_users->users_name); // users_name
			$tbl_users->UpdateSort($tbl_users->users_userLoginName); // users_userLoginName
			$tbl_users->UpdateSort($tbl_users->users_password); // users_password
			$tbl_users->UpdateSort($tbl_users->users_userLevel); // users_userLevel
			$tbl_users->UpdateSort($tbl_users->users_email); // users_email
			$tbl_users->UpdateSort($tbl_users->users_contactNo); // users_contactNo
			$tbl_users->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_users;
		$sOrderBy = $tbl_users->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_users->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_users->SqlOrderBy();
				$tbl_users->setSessionOrderBy($sOrderBy);
				$tbl_users->unitID->setSort("ASC");
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_users;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$tbl_users->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$tbl_users->cu->setSessionValue("");
			}

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_users->setSessionOrderBy($sOrderBy);
				$tbl_users->users_ID->setSort("");
				$tbl_users->unitID->setSort("");
				$tbl_users->users_name->setSort("");
				$tbl_users->users_userLoginName->setSort("");
				$tbl_users->users_password->setSort("");
				$tbl_users->users_userLevel->setSort("");
				$tbl_users->users_email->setSort("");
				$tbl_users->users_contactNo->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_users->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_users;

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
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" class=\"upbudgetofficeclass\" onclick=\"tbl_users_list.SelectAllKey(this);\">";
		$item->MoveTo(0);

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $tbl_users, $objForm;
		$this->ListOptions->LoadDefault();

		// "edit"
		$oListOpt =& $this->ListOptions->Items["edit"];
		if ($Security->CanEdit() && $this->ShowOptionLink() && $oListOpt->Visible) {
			$oListOpt->Body = "<a class=\"upRowLink\" href=\"" . $this->EditUrl . "\">" . "<img src=\"phpimages/edit.gif\" alt=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" title=\"" . up_HtmlEncode($Language->Phrase("EditLink")) . "\" width=\"16\" height=\"16\" border=\"0\">" . "</a>";
		}

		// "checkbox"
		$oListOpt =& $this->ListOptions->Items["checkbox"];
		if ($Security->CanDelete() && $this->ShowOptionLink() && $oListOpt->Visible)
			$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" id=\"key_m[]\" value=\"" . up_HtmlEncode($tbl_users->users_ID->CurrentValue) . "\" class=\"upbudgetofficeclass\" onclick='up_ClickMultiCheckbox(this);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_users;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_users;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_users->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_users->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_users->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_users->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_users->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_users->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $tbl_users;
		$tbl_users->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$tbl_users->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_users;

		// Call Recordset Selecting event
		$tbl_users->Recordset_Selecting($tbl_users->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_users->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_users->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_users;
		$sFilter = $tbl_users->KeyFilter();

		// Call Row Selecting event
		$tbl_users->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_users->CurrentFilter = $sFilter;
		$sSql = $tbl_users->SQL();
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
		global $conn, $tbl_users;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_users->Row_Selected($row);
		$tbl_users->users_ID->setDbValue($rs->fields('users_ID'));
		$tbl_users->cu->setDbValue($rs->fields('cu'));
		$tbl_users->unitID->setDbValue($rs->fields('unitID'));
		$tbl_users->users_name->setDbValue($rs->fields('users_name'));
		$tbl_users->users_nameLast->setDbValue($rs->fields('users_nameLast'));
		$tbl_users->users_nameFirst->setDbValue($rs->fields('users_nameFirst'));
		$tbl_users->users_nameMiddle->setDbValue($rs->fields('users_nameMiddle'));
		$tbl_users->users_userLoginName->setDbValue($rs->fields('users_userLoginName'));
		$tbl_users->users_password->setDbValue($rs->fields('users_password'));
		$tbl_users->users_userLevel->setDbValue($rs->fields('users_userLevel'));
		$tbl_users->users_email->setDbValue($rs->fields('users_email'));
		$tbl_users->users_contactNo->setDbValue($rs->fields('users_contactNo'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_users;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($tbl_users->getKey("users_ID")) <> "")
			$tbl_users->users_ID->CurrentValue = $tbl_users->getKey("users_ID"); // users_ID
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_users->CurrentFilter = $tbl_users->KeyFilter();
			$sSql = $tbl_users->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_users;

		// Initialize URLs
		$this->ViewUrl = $tbl_users->ViewUrl();
		$this->EditUrl = $tbl_users->EditUrl();
		$this->InlineEditUrl = $tbl_users->InlineEditUrl();
		$this->CopyUrl = $tbl_users->CopyUrl();
		$this->InlineCopyUrl = $tbl_users->InlineCopyUrl();
		$this->DeleteUrl = $tbl_users->DeleteUrl();

		// Call Row_Rendering event
		$tbl_users->Row_Rendering();

		// Common render codes for all row types
		// users_ID

		$tbl_users->users_ID->CellCssStyle = "white-space: nowrap;";

		// cu
		$tbl_users->cu->CellCssStyle = "white-space: nowrap;";

		// unitID
		$tbl_users->unitID->CellCssStyle = "white-space: nowrap;";

		// users_name
		$tbl_users->users_name->CellCssStyle = "white-space: nowrap;";

		// users_nameLast
		$tbl_users->users_nameLast->CellCssStyle = "white-space: nowrap;";

		// users_nameFirst
		$tbl_users->users_nameFirst->CellCssStyle = "white-space: nowrap;";

		// users_nameMiddle
		$tbl_users->users_nameMiddle->CellCssStyle = "white-space: nowrap;";

		// users_userLoginName
		$tbl_users->users_userLoginName->CellCssStyle = "white-space: nowrap;";

		// users_password
		$tbl_users->users_password->CellCssStyle = "white-space: nowrap;";

		// users_userLevel
		$tbl_users->users_userLevel->CellCssStyle = "white-space: nowrap;";

		// users_email
		$tbl_users->users_email->CellCssStyle = "white-space: nowrap;";

		// users_contactNo
		$tbl_users->users_contactNo->CellCssStyle = "white-space: nowrap;";
		if ($tbl_users->RowType == UP_ROWTYPE_VIEW) { // View row

			// users_ID
			$tbl_users->users_ID->ViewValue = $tbl_users->users_ID->CurrentValue;
			$tbl_users->users_ID->ViewCustomAttributes = "";

			// unitID
			if (strval($tbl_users->unitID->CurrentValue) <> "") {
				$sFilterWrk = "`unitID` = " . up_AdjustSql($tbl_users->unitID->CurrentValue) . "";
			$sSqlWrk = "SELECT `cuUnitName` FROM `tbl_uporgchart_unit`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `cuUnitName` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_users->unitID->ViewValue = $rswrk->fields('cuUnitName');
					$rswrk->Close();
				} else {
					$tbl_users->unitID->ViewValue = $tbl_users->unitID->CurrentValue;
				}
			} else {
				$tbl_users->unitID->ViewValue = NULL;
			}
			$tbl_users->unitID->ViewCustomAttributes = "";

			// users_name
			$tbl_users->users_name->ViewValue = $tbl_users->users_name->CurrentValue;
			$tbl_users->users_name->ViewCustomAttributes = "";

			// users_userLoginName
			$tbl_users->users_userLoginName->ViewValue = $tbl_users->users_userLoginName->CurrentValue;
			$tbl_users->users_userLoginName->ViewCustomAttributes = "";

			// users_password
			$tbl_users->users_password->ViewValue = "********";
			$tbl_users->users_password->ViewCustomAttributes = "";

			// users_userLevel
			if ($Security->CanAdmin()) { // System admin
			if (strval($tbl_users->users_userLevel->CurrentValue) <> "") {
				switch ($tbl_users->users_userLevel->CurrentValue) {
					case "1":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(1) <> "" ? $tbl_users->users_userLevel->FldTagCaption(1) : $tbl_users->users_userLevel->CurrentValue;
						break;
					case "-1":
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->FldTagCaption(2) <> "" ? $tbl_users->users_userLevel->FldTagCaption(2) : $tbl_users->users_userLevel->CurrentValue;
						break;
					default:
						$tbl_users->users_userLevel->ViewValue = $tbl_users->users_userLevel->CurrentValue;
				}
			} else {
				$tbl_users->users_userLevel->ViewValue = NULL;
			}
			} else {
				$tbl_users->users_userLevel->ViewValue = "********";
			}
			$tbl_users->users_userLevel->ViewCustomAttributes = "";

			// users_email
			$tbl_users->users_email->ViewValue = $tbl_users->users_email->CurrentValue;
			$tbl_users->users_email->ViewCustomAttributes = "";

			// users_contactNo
			$tbl_users->users_contactNo->ViewValue = $tbl_users->users_contactNo->CurrentValue;
			$tbl_users->users_contactNo->ViewCustomAttributes = "";

			// users_ID
			$tbl_users->users_ID->LinkCustomAttributes = "";
			$tbl_users->users_ID->HrefValue = "";
			$tbl_users->users_ID->TooltipValue = "";

			// unitID
			$tbl_users->unitID->LinkCustomAttributes = "";
			$tbl_users->unitID->HrefValue = "";
			$tbl_users->unitID->TooltipValue = "";

			// users_name
			$tbl_users->users_name->LinkCustomAttributes = "";
			$tbl_users->users_name->HrefValue = "";
			$tbl_users->users_name->TooltipValue = "";

			// users_userLoginName
			$tbl_users->users_userLoginName->LinkCustomAttributes = "";
			$tbl_users->users_userLoginName->HrefValue = "";
			$tbl_users->users_userLoginName->TooltipValue = "";

			// users_password
			$tbl_users->users_password->LinkCustomAttributes = "";
			$tbl_users->users_password->HrefValue = "";
			$tbl_users->users_password->TooltipValue = "";

			// users_userLevel
			$tbl_users->users_userLevel->LinkCustomAttributes = "";
			$tbl_users->users_userLevel->HrefValue = "";
			$tbl_users->users_userLevel->TooltipValue = "";

			// users_email
			$tbl_users->users_email->LinkCustomAttributes = "";
			$tbl_users->users_email->HrefValue = "";
			$tbl_users->users_email->TooltipValue = "";

			// users_contactNo
			$tbl_users->users_contactNo->LinkCustomAttributes = "";
			$tbl_users->users_contactNo->HrefValue = "";
			$tbl_users->users_contactNo->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_users->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_users->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $tbl_users;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($tbl_users->unitID->CurrentValue);
			}
		}
		return TRUE;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_users;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "view_tbl_uporgchart_cu_users") {
				$bValidMaster = TRUE;
				if (@$_GET["code"] <> "") {
					$GLOBALS["view_tbl_uporgchart_cu_users"]->code->setQueryStringValue($_GET["code"]);
					$tbl_users->cu->setQueryStringValue($GLOBALS["view_tbl_uporgchart_cu_users"]->code->QueryStringValue);
					$tbl_users->cu->setSessionValue($tbl_users->cu->QueryStringValue);
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$tbl_users->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$tbl_users->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "view_tbl_uporgchart_cu_users") {
				if ($tbl_users->cu->QueryStringValue == "") $tbl_users->cu->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $tbl_users->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_users->getDetailFilter(); // Get detail filter
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
		$table = 'tbl_users';
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
