<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "tbl_temp_cuinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_temp_cu_list = new ctbl_temp_cu_list();
$Page =& $tbl_temp_cu_list;

// Page init
$tbl_temp_cu_list->Page_Init();

// Page main
$tbl_temp_cu_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($tbl_temp_cu->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_temp_cu_list = new up_Page("tbl_temp_cu_list");

// page properties
tbl_temp_cu_list.PageID = "list"; // page ID
tbl_temp_cu_list.FormID = "ftbl_temp_culist"; // form ID
var UP_PAGE_ID = tbl_temp_cu_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_temp_cu_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_temp_cu_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_temp_cu_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_temp_cu_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

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
<?php if (($tbl_temp_cu->Export == "") || (UP_EXPORT_MASTER_RECORD && $tbl_temp_cu->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_temp_cu_list->TotalRecs = $tbl_temp_cu->SelectRecordCount();
	} else {
		if ($tbl_temp_cu_list->Recordset = $tbl_temp_cu_list->LoadRecordset())
			$tbl_temp_cu_list->TotalRecs = $tbl_temp_cu_list->Recordset->RecordCount();
	}
	$tbl_temp_cu_list->StartRec = 1;
	if ($tbl_temp_cu_list->DisplayRecs <= 0 || ($tbl_temp_cu->Export <> "" && $tbl_temp_cu->ExportAll)) // Display all records
		$tbl_temp_cu_list->DisplayRecs = $tbl_temp_cu_list->TotalRecs;
	if (!($tbl_temp_cu->Export <> "" && $tbl_temp_cu->ExportAll))
		$tbl_temp_cu_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$tbl_temp_cu_list->Recordset = $tbl_temp_cu_list->LoadRecordset($tbl_temp_cu_list->StartRec-1, $tbl_temp_cu_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_temp_cu->TableCaption() ?>
&nbsp;&nbsp;<?php $tbl_temp_cu_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($tbl_temp_cu->Export == "" && $tbl_temp_cu->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(tbl_temp_cu_list);" style="text-decoration: none;"><img id="tbl_temp_cu_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="tbl_temp_cu_list_SearchPanel">
<form name="ftbl_temp_culistsrch" id="ftbl_temp_culistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="tbl_temp_cu">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($tbl_temp_cu->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $tbl_temp_cu_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($tbl_temp_cu->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_temp_cu->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_temp_cu->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $tbl_temp_cu_list->ShowPageHeader(); ?>
<?php
$tbl_temp_cu_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($tbl_temp_cu->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($tbl_temp_cu->CurrentAction <> "gridadd" && $tbl_temp_cu->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_temp_cu_list->Pager)) $tbl_temp_cu_list->Pager = new cPrevNextPager($tbl_temp_cu_list->StartRec, $tbl_temp_cu_list->DisplayRecs, $tbl_temp_cu_list->TotalRecs) ?>
<?php if ($tbl_temp_cu_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_temp_cu_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_temp_cu_list->PageUrl() ?>start=<?php echo $tbl_temp_cu_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_temp_cu_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_temp_cu_list->PageUrl() ?>start=<?php echo $tbl_temp_cu_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_temp_cu_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_temp_cu_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_temp_cu_list->PageUrl() ?>start=<?php echo $tbl_temp_cu_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_temp_cu_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_temp_cu_list->PageUrl() ?>start=<?php echo $tbl_temp_cu_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_temp_cu_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_temp_cu_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_temp_cu_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_temp_cu_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_temp_cu_list->SearchWhere == "0=101") { ?>
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
<form name="ftbl_temp_culist" id="ftbl_temp_culist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="tbl_temp_cu">
<div id="gmp_tbl_temp_cu" class="upGridMiddlePanel">
<?php if ($tbl_temp_cu_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_temp_cu->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_temp_cu_list->RenderListOptions();

// Render list options (header, left)
$tbl_temp_cu_list->ListOptions->Render("header", "left");
?>
<?php if ($tbl_temp_cu->temp_id->Visible) { // temp_id ?>
	<?php if ($tbl_temp_cu->SortUrl($tbl_temp_cu->temp_id) == "") { ?>
		<td><?php echo $tbl_temp_cu->temp_id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_temp_cu->SortUrl($tbl_temp_cu->temp_id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $tbl_temp_cu->temp_id->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_temp_cu->temp_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_temp_cu->temp_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_temp_cu->temp_name->Visible) { // temp_name ?>
	<?php if ($tbl_temp_cu->SortUrl($tbl_temp_cu->temp_name) == "") { ?>
		<td><?php echo $tbl_temp_cu->temp_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_temp_cu->SortUrl($tbl_temp_cu->temp_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $tbl_temp_cu->temp_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_temp_cu->temp_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_temp_cu->temp_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_temp_cu_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($tbl_temp_cu->ExportAll && $tbl_temp_cu->Export <> "") {
	$tbl_temp_cu_list->StopRec = $tbl_temp_cu_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tbl_temp_cu_list->TotalRecs > $tbl_temp_cu_list->StartRec + $tbl_temp_cu_list->DisplayRecs - 1)
		$tbl_temp_cu_list->StopRec = $tbl_temp_cu_list->StartRec + $tbl_temp_cu_list->DisplayRecs - 1;
	else
		$tbl_temp_cu_list->StopRec = $tbl_temp_cu_list->TotalRecs;
}
$tbl_temp_cu_list->RecCnt = $tbl_temp_cu_list->StartRec - 1;
if ($tbl_temp_cu_list->Recordset && !$tbl_temp_cu_list->Recordset->EOF) {
	$tbl_temp_cu_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_temp_cu_list->StartRec > 1)
		$tbl_temp_cu_list->Recordset->Move($tbl_temp_cu_list->StartRec - 1);
} elseif (!$tbl_temp_cu->AllowAddDeleteRow && $tbl_temp_cu_list->StopRec == 0) {
	$tbl_temp_cu_list->StopRec = $tbl_temp_cu->GridAddRowCount;
}

// Initialize aggregate
$tbl_temp_cu->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_temp_cu->ResetAttrs();
$tbl_temp_cu_list->RenderRow();
$tbl_temp_cu_list->RowCnt = 0;
while ($tbl_temp_cu_list->RecCnt < $tbl_temp_cu_list->StopRec) {
	$tbl_temp_cu_list->RecCnt++;
	if (intval($tbl_temp_cu_list->RecCnt) >= intval($tbl_temp_cu_list->StartRec)) {
		$tbl_temp_cu_list->RowCnt++;

		// Set up key count
		$tbl_temp_cu_list->KeyCount = $tbl_temp_cu_list->RowIndex;

		// Init row class and style
		$tbl_temp_cu->ResetAttrs();
		$tbl_temp_cu->CssClass = "";
		if ($tbl_temp_cu->CurrentAction == "gridadd") {
		} else {
			$tbl_temp_cu_list->LoadRowValues($tbl_temp_cu_list->Recordset); // Load row values
		}
		$tbl_temp_cu->RowType = UP_ROWTYPE_VIEW; // Render view
		$tbl_temp_cu->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$tbl_temp_cu_list->RenderRow();

		// Render list options
		$tbl_temp_cu_list->RenderListOptions();
?>
	<tr<?php echo $tbl_temp_cu->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_temp_cu_list->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_temp_cu->temp_id->Visible) { // temp_id ?>
		<td<?php echo $tbl_temp_cu->temp_id->CellAttributes() ?>>
<div<?php echo $tbl_temp_cu->temp_id->ViewAttributes() ?>><?php echo $tbl_temp_cu->temp_id->ListViewValue() ?></div>
<a name="<?php echo $tbl_temp_cu_list->PageObjName . "_row_" . $tbl_temp_cu_list->RowCnt ?>" id="<?php echo $tbl_temp_cu_list->PageObjName . "_row_" . $tbl_temp_cu_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($tbl_temp_cu->temp_name->Visible) { // temp_name ?>
		<td<?php echo $tbl_temp_cu->temp_name->CellAttributes() ?>>
<div<?php echo $tbl_temp_cu->temp_name->ViewAttributes() ?>><?php echo $tbl_temp_cu->temp_name->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_temp_cu_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($tbl_temp_cu->CurrentAction <> "gridadd")
		$tbl_temp_cu_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($tbl_temp_cu_list->Recordset)
	$tbl_temp_cu_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($tbl_temp_cu->Export == "" && $tbl_temp_cu->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_temp_cu_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($tbl_temp_cu->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tbl_temp_cu_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_temp_cu_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'tbl_temp_cu';

	// Page object name
	var $PageObjName = 'tbl_temp_cu_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_temp_cu;
		if ($tbl_temp_cu->UseTokenInUrl) $PageUrl .= "t=" . $tbl_temp_cu->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_temp_cu;
		if ($tbl_temp_cu->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_temp_cu->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_temp_cu->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_temp_cu_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_temp_cu)
		if (!isset($GLOBALS["tbl_temp_cu"])) {
			$GLOBALS["tbl_temp_cu"] = new ctbl_temp_cu();
			$GLOBALS["Table"] =& $GLOBALS["tbl_temp_cu"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "tbl_temp_cuadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "tbl_temp_cudelete.php";
		$this->MultiUpdateUrl = "tbl_temp_cuupdate.php";

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_temp_cu', TRUE);

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
		global $tbl_temp_cu;

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
			$tbl_temp_cu->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_temp_cu;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($tbl_temp_cu->Export <> "" ||
				$tbl_temp_cu->CurrentAction == "gridadd" ||
				$tbl_temp_cu->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$tbl_temp_cu->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($tbl_temp_cu->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_temp_cu->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$tbl_temp_cu->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$tbl_temp_cu->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$tbl_temp_cu->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $tbl_temp_cu->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$tbl_temp_cu->setSessionWhere($sFilter);
		$tbl_temp_cu->CurrentFilter = "";
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $tbl_temp_cu;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $tbl_temp_cu->temp_name, $Keyword);
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
		global $Security, $tbl_temp_cu;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $tbl_temp_cu->BasicSearchKeyword;
		$sSearchType = $tbl_temp_cu->BasicSearchType;
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
			$tbl_temp_cu->setSessionBasicSearchKeyword($sSearchKeyword);
			$tbl_temp_cu->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $tbl_temp_cu;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$tbl_temp_cu->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $tbl_temp_cu;
		$tbl_temp_cu->setSessionBasicSearchKeyword("");
		$tbl_temp_cu->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $tbl_temp_cu;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$tbl_temp_cu->BasicSearchKeyword = $tbl_temp_cu->getSessionBasicSearchKeyword();
			$tbl_temp_cu->BasicSearchType = $tbl_temp_cu->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_temp_cu;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_temp_cu->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_temp_cu->CurrentOrderType = @$_GET["ordertype"];
			$tbl_temp_cu->UpdateSort($tbl_temp_cu->temp_id); // temp_id
			$tbl_temp_cu->UpdateSort($tbl_temp_cu->temp_name); // temp_name
			$tbl_temp_cu->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_temp_cu;
		$sOrderBy = $tbl_temp_cu->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_temp_cu->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_temp_cu->SqlOrderBy();
				$tbl_temp_cu->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_temp_cu;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_temp_cu->setSessionOrderBy($sOrderBy);
				$tbl_temp_cu->temp_id->setSort("");
				$tbl_temp_cu->temp_name->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_temp_cu->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_temp_cu;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $tbl_temp_cu, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_temp_cu;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_temp_cu;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_temp_cu->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_temp_cu->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_temp_cu->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_temp_cu->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_temp_cu->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_temp_cu->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $tbl_temp_cu;
		$tbl_temp_cu->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$tbl_temp_cu->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_temp_cu;

		// Call Recordset Selecting event
		$tbl_temp_cu->Recordset_Selecting($tbl_temp_cu->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_temp_cu->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_temp_cu->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_temp_cu;
		$sFilter = $tbl_temp_cu->KeyFilter();

		// Call Row Selecting event
		$tbl_temp_cu->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_temp_cu->CurrentFilter = $sFilter;
		$sSql = $tbl_temp_cu->SQL();
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
		global $conn, $tbl_temp_cu;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_temp_cu->Row_Selected($row);
		$tbl_temp_cu->temp_id->setDbValue($rs->fields('temp_id'));
		$tbl_temp_cu->temp_name->setDbValue($rs->fields('temp_name'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_temp_cu;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_temp_cu->CurrentFilter = $tbl_temp_cu->KeyFilter();
			$sSql = $tbl_temp_cu->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_temp_cu;

		// Initialize URLs
		$this->ViewUrl = $tbl_temp_cu->ViewUrl();
		$this->EditUrl = $tbl_temp_cu->EditUrl();
		$this->InlineEditUrl = $tbl_temp_cu->InlineEditUrl();
		$this->CopyUrl = $tbl_temp_cu->CopyUrl();
		$this->InlineCopyUrl = $tbl_temp_cu->InlineCopyUrl();
		$this->DeleteUrl = $tbl_temp_cu->DeleteUrl();

		// Call Row_Rendering event
		$tbl_temp_cu->Row_Rendering();

		// Common render codes for all row types
		// temp_id
		// temp_name

		if ($tbl_temp_cu->RowType == UP_ROWTYPE_VIEW) { // View row

			// temp_id
			$tbl_temp_cu->temp_id->ViewValue = $tbl_temp_cu->temp_id->CurrentValue;
			$tbl_temp_cu->temp_id->ViewCustomAttributes = "";

			// temp_name
			$tbl_temp_cu->temp_name->ViewValue = $tbl_temp_cu->temp_name->CurrentValue;
			$tbl_temp_cu->temp_name->ViewCustomAttributes = "";

			// temp_id
			$tbl_temp_cu->temp_id->LinkCustomAttributes = "";
			$tbl_temp_cu->temp_id->HrefValue = "";
			$tbl_temp_cu->temp_id->TooltipValue = "";

			// temp_name
			$tbl_temp_cu->temp_name->LinkCustomAttributes = "";
			$tbl_temp_cu->temp_name->HrefValue = "";
			$tbl_temp_cu->temp_name->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_temp_cu->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_temp_cu->Row_Rendered();
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
