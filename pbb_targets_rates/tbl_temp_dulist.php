<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_temp_duinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_temp_du_list = new ctbl_temp_du_list();
$Page =& $tbl_temp_du_list;

// Page init
$tbl_temp_du_list->Page_Init();

// Page main
$tbl_temp_du_list->Page_Main();
?>
<?php include_once "header.php" ?>
<?php if ($tbl_temp_du->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_temp_du_list = new up_Page("tbl_temp_du_list");

// page properties
tbl_temp_du_list.PageID = "list"; // page ID
tbl_temp_du_list.FormID = "ftbl_temp_dulist"; // form ID
var UP_PAGE_ID = tbl_temp_du_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_temp_du_list.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_temp_du_list.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_temp_du_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_temp_du_list.ValidateRequired = false; // no JavaScript validation
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
<?php if (($tbl_temp_du->Export == "") || (UP_EXPORT_MASTER_RECORD && $tbl_temp_du->Export == "print")) { ?>
<?php } ?>
<?php
	$bSelectLimit = UP_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_temp_du_list->TotalRecs = $tbl_temp_du->SelectRecordCount();
	} else {
		if ($tbl_temp_du_list->Recordset = $tbl_temp_du_list->LoadRecordset())
			$tbl_temp_du_list->TotalRecs = $tbl_temp_du_list->Recordset->RecordCount();
	}
	$tbl_temp_du_list->StartRec = 1;
	if ($tbl_temp_du_list->DisplayRecs <= 0 || ($tbl_temp_du->Export <> "" && $tbl_temp_du->ExportAll)) // Display all records
		$tbl_temp_du_list->DisplayRecs = $tbl_temp_du_list->TotalRecs;
	if (!($tbl_temp_du->Export <> "" && $tbl_temp_du->ExportAll))
		$tbl_temp_du_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$tbl_temp_du_list->Recordset = $tbl_temp_du_list->LoadRecordset($tbl_temp_du_list->StartRec-1, $tbl_temp_du_list->DisplayRecs);
?>
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_temp_du->TableCaption() ?>
&nbsp;&nbsp;<?php $tbl_temp_du_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($tbl_temp_du->Export == "" && $tbl_temp_du->CurrentAction == "") { ?>
<a href="javascript:up_ToggleSearchPanel(tbl_temp_du_list);" style="text-decoration: none;"><img id="tbl_temp_du_list_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="tbl_temp_du_list_SearchPanel">
<form name="ftbl_temp_dulistsrch" id="ftbl_temp_dulistsrch" class="upForm" action="<?php echo up_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="tbl_temp_du">
<div class="upBasicSearch">
<div id="xsr_1" class="upCssTableRow">
	<input type="text" name="<?php echo UP_TABLE_BASIC_SEARCH ?>" id="<?php echo UP_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo up_HtmlEncode($tbl_temp_du->getSessionBasicSearchKeyword()) ?>">
	<input type="Submit" name="Submit" id="Submit" value="<?php echo up_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $tbl_temp_du_list->PageUrl() ?>cmd=reset"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="upCssTableRow">
	<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($tbl_temp_du->getSessionBasicSearchType() == "") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_temp_du->getSessionBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo UP_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_temp_du->getSessionBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $tbl_temp_du_list->ShowPageHeader(); ?>
<?php
$tbl_temp_du_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<?php if ($tbl_temp_du->Export == "") { ?>
<div class="upGridUpperPanel">
<?php if ($tbl_temp_du->CurrentAction <> "gridadd" && $tbl_temp_du->CurrentAction <> "gridedit") { ?>
<form name="uppagerform" id="uppagerform" class="upForm" action="<?php echo up_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="upPager">
	<tr>
		<td nowrap>
<?php if (!isset($tbl_temp_du_list->Pager)) $tbl_temp_du_list->Pager = new cPrevNextPager($tbl_temp_du_list->StartRec, $tbl_temp_du_list->DisplayRecs, $tbl_temp_du_list->TotalRecs) ?>
<?php if ($tbl_temp_du_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="upbudgetofficeclass"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_temp_du_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_temp_du_list->PageUrl() ?>start=<?php echo $tbl_temp_du_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_temp_du_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_temp_du_list->PageUrl() ?>start=<?php echo $tbl_temp_du_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo UP_TABLE_PAGE_NO ?>" id="<?php echo UP_TABLE_PAGE_NO ?>" value="<?php echo $tbl_temp_du_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_temp_du_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_temp_du_list->PageUrl() ?>start=<?php echo $tbl_temp_du_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_temp_du_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_temp_du_list->PageUrl() ?>start=<?php echo $tbl_temp_du_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="upbudgetofficeclass">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_temp_du_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="upbudgetofficeclass"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_temp_du_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_temp_du_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_temp_du_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_temp_du_list->SearchWhere == "0=101") { ?>
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
<form name="ftbl_temp_dulist" id="ftbl_temp_dulist" class="upForm" action="" method="post">
<input type="hidden" name="t" id="t" value="tbl_temp_du">
<div id="gmp_tbl_temp_du" class="upGridMiddlePanel">
<?php if ($tbl_temp_du_list->TotalRecs > 0) { ?>
<table cellspacing="0" data-rowhighlightclass="upTableHighlightRow" data-rowselectclass="upTableSelectRow" data-roweditclass="upTableEditRow" class="upTable upTableSeparate">
<?php echo $tbl_temp_du->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="upTableHeader">
<?php

// Render list options
$tbl_temp_du_list->RenderListOptions();

// Render list options (header, left)
$tbl_temp_du_list->ListOptions->Render("header", "left");
?>
<?php if ($tbl_temp_du->temp_id->Visible) { // temp_id ?>
	<?php if ($tbl_temp_du->SortUrl($tbl_temp_du->temp_id) == "") { ?>
		<td><?php echo $tbl_temp_du->temp_id->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_temp_du->SortUrl($tbl_temp_du->temp_id) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $tbl_temp_du->temp_id->FldCaption() ?></td><td style="width: 10px;"><?php if ($tbl_temp_du->temp_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_temp_du->temp_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_temp_du->temp_name->Visible) { // temp_name ?>
	<?php if ($tbl_temp_du->SortUrl($tbl_temp_du->temp_name) == "") { ?>
		<td><?php echo $tbl_temp_du->temp_name->FldCaption() ?></td>
	<?php } else { ?>
		<td><div class="upPointer" onmousedown="up_Sort(event,'<?php echo $tbl_temp_du->SortUrl($tbl_temp_du->temp_name) ?>',1);">
			<table cellspacing="0" class="upTableHeaderBtn"><thead><tr><td><?php echo $tbl_temp_du->temp_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td style="width: 10px;"><?php if ($tbl_temp_du->temp_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" border="0"><?php } elseif ($tbl_temp_du->temp_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></thead></table>
		</div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_temp_du_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<?php
if ($tbl_temp_du->ExportAll && $tbl_temp_du->Export <> "") {
	$tbl_temp_du_list->StopRec = $tbl_temp_du_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tbl_temp_du_list->TotalRecs > $tbl_temp_du_list->StartRec + $tbl_temp_du_list->DisplayRecs - 1)
		$tbl_temp_du_list->StopRec = $tbl_temp_du_list->StartRec + $tbl_temp_du_list->DisplayRecs - 1;
	else
		$tbl_temp_du_list->StopRec = $tbl_temp_du_list->TotalRecs;
}
$tbl_temp_du_list->RecCnt = $tbl_temp_du_list->StartRec - 1;
if ($tbl_temp_du_list->Recordset && !$tbl_temp_du_list->Recordset->EOF) {
	$tbl_temp_du_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_temp_du_list->StartRec > 1)
		$tbl_temp_du_list->Recordset->Move($tbl_temp_du_list->StartRec - 1);
} elseif (!$tbl_temp_du->AllowAddDeleteRow && $tbl_temp_du_list->StopRec == 0) {
	$tbl_temp_du_list->StopRec = $tbl_temp_du->GridAddRowCount;
}

// Initialize aggregate
$tbl_temp_du->RowType = UP_ROWTYPE_AGGREGATEINIT;
$tbl_temp_du->ResetAttrs();
$tbl_temp_du_list->RenderRow();
$tbl_temp_du_list->RowCnt = 0;
while ($tbl_temp_du_list->RecCnt < $tbl_temp_du_list->StopRec) {
	$tbl_temp_du_list->RecCnt++;
	if (intval($tbl_temp_du_list->RecCnt) >= intval($tbl_temp_du_list->StartRec)) {
		$tbl_temp_du_list->RowCnt++;

		// Set up key count
		$tbl_temp_du_list->KeyCount = $tbl_temp_du_list->RowIndex;

		// Init row class and style
		$tbl_temp_du->ResetAttrs();
		$tbl_temp_du->CssClass = "";
		if ($tbl_temp_du->CurrentAction == "gridadd") {
		} else {
			$tbl_temp_du_list->LoadRowValues($tbl_temp_du_list->Recordset); // Load row values
		}
		$tbl_temp_du->RowType = UP_ROWTYPE_VIEW; // Render view
		$tbl_temp_du->RowAttrs = array('onmouseover'=>'up_MouseOver(event, this);', 'onmouseout'=>'up_MouseOut(event, this);', 'onclick'=>'up_Click(event, this);');

		// Render row
		$tbl_temp_du_list->RenderRow();

		// Render list options
		$tbl_temp_du_list->RenderListOptions();
?>
	<tr<?php echo $tbl_temp_du->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_temp_du_list->ListOptions->Render("body", "left");
?>
	<?php if ($tbl_temp_du->temp_id->Visible) { // temp_id ?>
		<td<?php echo $tbl_temp_du->temp_id->CellAttributes() ?>>
<div<?php echo $tbl_temp_du->temp_id->ViewAttributes() ?>><?php echo $tbl_temp_du->temp_id->ListViewValue() ?></div>
<a name="<?php echo $tbl_temp_du_list->PageObjName . "_row_" . $tbl_temp_du_list->RowCnt ?>" id="<?php echo $tbl_temp_du_list->PageObjName . "_row_" . $tbl_temp_du_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($tbl_temp_du->temp_name->Visible) { // temp_name ?>
		<td<?php echo $tbl_temp_du->temp_name->CellAttributes() ?>>
<div<?php echo $tbl_temp_du->temp_name->ViewAttributes() ?>><?php echo $tbl_temp_du->temp_name->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_temp_du_list->ListOptions->Render("body", "right");
?>
	</tr>
<?php
	}
	if ($tbl_temp_du->CurrentAction <> "gridadd")
		$tbl_temp_du_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($tbl_temp_du_list->Recordset)
	$tbl_temp_du_list->Recordset->Close();
?>
</td></tr></table>
<?php if ($tbl_temp_du->Export == "" && $tbl_temp_du->CurrentAction == "") { ?>
<?php } ?>
<?php
$tbl_temp_du_list->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php if ($tbl_temp_du->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tbl_temp_du_list->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_temp_du_list {

	// Page ID
	var $PageID = 'list';

	// Table name
	var $TableName = 'tbl_temp_du';

	// Page object name
	var $PageObjName = 'tbl_temp_du_list';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_temp_du;
		if ($tbl_temp_du->UseTokenInUrl) $PageUrl .= "t=" . $tbl_temp_du->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_temp_du;
		if ($tbl_temp_du->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_temp_du->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_temp_du->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_temp_du_list() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_temp_du)
		if (!isset($GLOBALS["tbl_temp_du"])) {
			$GLOBALS["tbl_temp_du"] = new ctbl_temp_du();
			$GLOBALS["Table"] =& $GLOBALS["tbl_temp_du"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "tbl_temp_duadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "tbl_temp_dudelete.php";
		$this->MultiUpdateUrl = "tbl_temp_duupdate.php";

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_temp_du', TRUE);

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
		global $tbl_temp_du;

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
			$tbl_temp_du->Export = $_GET["export"];
		} elseif (up_IsHttpPost()) {
			if (@$_POST["exporttype"] <> "")
				$tbl_temp_du->Export = $_POST["exporttype"];
		} else {
			$tbl_temp_du->setExportReturnUrl(up_CurrentUrl());
		}
		$gsExport = $tbl_temp_du->Export; // Get export parameter, used in header
		$gsExportFile = $tbl_temp_du->TableVar; // Get export file, used in header
		$Charset = (UP_CHARSET <> "") ? ";charset=" . UP_CHARSET : ""; // Charset used in header
		if ($tbl_temp_du->Export == "csv") {
			header('Content-Type: application/csv' . $Charset);
			header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
		}

		// Get grid add count
		$gridaddcnt = @$_GET[UP_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$tbl_temp_du->GridAddRowCount = $gridaddcnt;

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
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security, $tbl_temp_du;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($tbl_temp_du->Export <> "" ||
				$tbl_temp_du->CurrentAction == "gridadd" ||
				$tbl_temp_du->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session
			$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$tbl_temp_du->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($tbl_temp_du->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $tbl_temp_du->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		up_AddFilter($this->SearchWhere, $sSrchAdvanced);
		up_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$tbl_temp_du->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->SearchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$tbl_temp_du->setSearchWhere($this->SearchWhere); // Save to Session
			if (!$this->RestoreSearch) {
				$this->StartRec = 1; // Reset start record counter
				$tbl_temp_du->setStartRecordNumber($this->StartRec);
			}
		} else {
			$this->SearchWhere = $tbl_temp_du->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList())
			$sFilter = "(0=1)"; // Filter all records
		up_AddFilter($sFilter, $this->DbDetailFilter);
		up_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$tbl_temp_du->setSessionWhere($sFilter);
		$tbl_temp_du->CurrentFilter = "";

		// Export data only
		if (in_array($tbl_temp_du->Export, array("html","word","excel","xml","csv","email","pdf"))) {
			$this->ExportData();
			if ($tbl_temp_du->Export <> "email")
				$this->Page_Terminate(); // Terminate response
			exit();
		}
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		global $tbl_temp_du;
		$sKeyword = up_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $tbl_temp_du->temp_name, $Keyword);
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
		global $Security, $tbl_temp_du;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = $tbl_temp_du->BasicSearchKeyword;
		$sSearchType = $tbl_temp_du->BasicSearchType;
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
			$tbl_temp_du->setSessionBasicSearchKeyword($sSearchKeyword);
			$tbl_temp_du->setSessionBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {
		global $tbl_temp_du;

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$tbl_temp_du->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		global $tbl_temp_du;
		$tbl_temp_du->setSessionBasicSearchKeyword("");
		$tbl_temp_du->setSessionBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $tbl_temp_du;
		$bRestore = TRUE;
		if (@$_GET[UP_TABLE_BASIC_SEARCH] <> "") $bRestore = FALSE;
		$this->RestoreSearch = $bRestore;
		if ($bRestore) {

			// Restore basic search values
			$tbl_temp_du->BasicSearchKeyword = $tbl_temp_du->getSessionBasicSearchKeyword();
			$tbl_temp_du->BasicSearchType = $tbl_temp_du->getSessionBasicSearchType();
		}
	}

	// Set up sort parameters
	function SetUpSortOrder() {
		global $tbl_temp_du;

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$tbl_temp_du->CurrentOrder = up_StripSlashes(@$_GET["order"]);
			$tbl_temp_du->CurrentOrderType = @$_GET["ordertype"];
			$tbl_temp_du->UpdateSort($tbl_temp_du->temp_id); // temp_id
			$tbl_temp_du->UpdateSort($tbl_temp_du->temp_name); // temp_name
			$tbl_temp_du->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		global $tbl_temp_du;
		$sOrderBy = $tbl_temp_du->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($tbl_temp_du->SqlOrderBy() <> "") {
				$sOrderBy = $tbl_temp_du->SqlOrderBy();
				$tbl_temp_du->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {
		global $tbl_temp_du;

		// Get reset command
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$tbl_temp_du->setSessionOrderBy($sOrderBy);
				$tbl_temp_du->temp_id->setSort("");
				$tbl_temp_du->temp_name->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$tbl_temp_du->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language, $tbl_temp_du;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $tbl_temp_du, $objForm;
		$this->ListOptions->LoadDefault();
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language, $tbl_temp_du;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		global $tbl_temp_du;
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[UP_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[UP_TABLE_START_REC];
				$tbl_temp_du->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[UP_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[UP_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$tbl_temp_du->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $tbl_temp_du->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$tbl_temp_du->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$tbl_temp_du->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$tbl_temp_du->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		global $tbl_temp_du;
		$tbl_temp_du->BasicSearchKeyword = @$_GET[UP_TABLE_BASIC_SEARCH];
		$tbl_temp_du->BasicSearchType = @$_GET[UP_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_temp_du;

		// Call Recordset Selecting event
		$tbl_temp_du->Recordset_Selecting($tbl_temp_du->CurrentFilter);

		// Load List page SQL
		$sSql = $tbl_temp_du->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$tbl_temp_du->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_temp_du;
		$sFilter = $tbl_temp_du->KeyFilter();

		// Call Row Selecting event
		$tbl_temp_du->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_temp_du->CurrentFilter = $sFilter;
		$sSql = $tbl_temp_du->SQL();
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
		global $conn, $tbl_temp_du;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_temp_du->Row_Selected($row);
		$tbl_temp_du->temp_id->setDbValue($rs->fields('temp_id'));
		$tbl_temp_du->temp_name->setDbValue($rs->fields('temp_name'));
	}

	// Load old record
	function LoadOldRecord() {
		global $tbl_temp_du;

		// Load key values from Session
		$bValidKey = TRUE;

		// Load old recordset
		if ($bValidKey) {
			$tbl_temp_du->CurrentFilter = $tbl_temp_du->KeyFilter();
			$sSql = $tbl_temp_du->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_temp_du;

		// Initialize URLs
		$this->ViewUrl = $tbl_temp_du->ViewUrl();
		$this->EditUrl = $tbl_temp_du->EditUrl();
		$this->InlineEditUrl = $tbl_temp_du->InlineEditUrl();
		$this->CopyUrl = $tbl_temp_du->CopyUrl();
		$this->InlineCopyUrl = $tbl_temp_du->InlineCopyUrl();
		$this->DeleteUrl = $tbl_temp_du->DeleteUrl();

		// Call Row_Rendering event
		$tbl_temp_du->Row_Rendering();

		// Common render codes for all row types
		// temp_id
		// temp_name

		if ($tbl_temp_du->RowType == UP_ROWTYPE_VIEW) { // View row

			// temp_id
			$tbl_temp_du->temp_id->ViewValue = $tbl_temp_du->temp_id->CurrentValue;
			$tbl_temp_du->temp_id->ViewCustomAttributes = "";

			// temp_name
			$tbl_temp_du->temp_name->ViewValue = $tbl_temp_du->temp_name->CurrentValue;
			$tbl_temp_du->temp_name->ViewCustomAttributes = "";

			// temp_id
			$tbl_temp_du->temp_id->LinkCustomAttributes = "";
			$tbl_temp_du->temp_id->HrefValue = "";
			$tbl_temp_du->temp_id->TooltipValue = "";

			// temp_name
			$tbl_temp_du->temp_name->LinkCustomAttributes = "";
			$tbl_temp_du->temp_name->HrefValue = "";
			$tbl_temp_du->temp_name->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($tbl_temp_du->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_temp_du->Row_Rendered();
	}

	// Set up export options
	function SetupExportOptions() {
		global $Language, $tbl_temp_du;

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
		$item->Body = "<a name=\"emf_tbl_temp_du\" id=\"emf_tbl_temp_du\" href=\"javascript:void(0);\" onclick=\"up_EmailDialogShow({lnk:'emf_tbl_temp_du',hdr:upLanguage.Phrase('ExportToEmail'),f:document.ftbl_temp_dulist,sel:false});\">" . $Language->Phrase("ExportToEmail") . "</a>";
		$item->Visible = FALSE;

		// Hide options for export/action
		if ($tbl_temp_du->Export <> "" ||
			$tbl_temp_du->CurrentAction <> "")
			$this->ExportOptions->HideAllOptions();
	}

	// Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	function ExportData() {
		global $tbl_temp_du;
		$utf8 = (strtolower(UP_CHARSET) == "utf-8");
		$bSelectLimit = UP_SELECT_LIMIT;

		// Load recordset
		if ($bSelectLimit) {
			$this->TotalRecs = $tbl_temp_du->SelectRecordCount();
		} else {
			if ($rs = $this->LoadRecordset())
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;

		// Export all
		if ($tbl_temp_du->ExportAll) {
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
		if ($tbl_temp_du->Export == "xml") {
			$XmlDoc = new cXMLDocument(UP_XML_ENCODING);
		} else {
			$ExportDoc = new cExportDocument($tbl_temp_du, "h");
		}
		$ParentTable = "";
		if ($bSelectLimit) {
			$StartRec = 1;
			$StopRec = $this->DisplayRecs;
		} else {
			$StartRec = $this->StartRec;
			$StopRec = $this->StopRec;
		}
		if ($tbl_temp_du->Export == "xml") {
			$tbl_temp_du->ExportXmlDocument($XmlDoc, ($ParentTable <> ""), $rs, $StartRec, $StopRec, "");
		} else {
			$sHeader = $this->PageHeader;
			$this->Page_DataRendering($sHeader);
			$ExportDoc->Text .= $sHeader;
			$tbl_temp_du->ExportDocument($ExportDoc, $rs, $StartRec, $StopRec, "");
			$sFooter = $this->PageFooter;
			$this->Page_DataRendered($sFooter);
			$ExportDoc->Text .= $sFooter;
		}

		// Close recordset
		$rs->Close();

		// Export header and footer
		if ($tbl_temp_du->Export <> "xml") {
			$ExportDoc->ExportHeaderAndFooter();
		}

		// Clean output buffer
		if (!UP_DEBUG_ENABLED && ob_get_length())
			ob_end_clean();

		// Write BOM if utf-8
		if ($utf8 && !in_array($tbl_temp_du->Export, array("email", "xml")))
			echo "\xEF\xBB\xBF";

		// Write debug message if enabled
		if (UP_DEBUG_ENABLED)
			echo up_DebugMsg();

		// Output data
		if ($tbl_temp_du->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} elseif ($tbl_temp_du->Export == "email") {
			$this->ExportEmail($ExportDoc->Text);
			$this->Page_Terminate($tbl_temp_du->ExportReturnUrl());
		} elseif ($tbl_temp_du->Export == "pdf") {
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
