<?php

// Global variable for table object
$frm_9_m_sa_mfo_questions = NULL;

//
// Table class for frm_9_m_sa_mfo_questions
//
class cfrm_9_m_sa_mfo_questions {
	var $TableVar = 'frm_9_m_sa_mfo_questions';
	var $TableName = 'frm_9_m_sa_mfo_questions';
	var $TableType = 'TABLE';
	var $mfo_question_id;
	var $mfo_question_online_pi_seq;
	var $mfo_question_online_mfo_name;
	var $mfo_question_online_pi_question;
	var $mfo_question_expected_answer;
	var $mfo_question_online_insert_question_mfo;
	var $mfo_question_online_insert_question_mfo_name_rep;
	var $mfo_question_online_computation_du_cu_summary;
	var $mfo_question_online_computation_du_cu_summary_name;
	var $mfo_question_online_computation_denominator;
	var $mfo_question_supporting_document_requirement;
	var $mfo_question_expected_trend;
	var $mfo_question_online_ask_y_n;
	var $mfo_question_online_pi_question_numerator;
	var $mfo_question_online_pi_question_denominator;
	var $mfo_question_expected_numerator;
	var $mfo_question_expected_denominator;
	var $mfo_question_report_mfo_name;
	var $mfo_question_report_form_a_pi_question;
	var $mfo_question_report_form_a_1_mfo;
	var $mfo_question_report_form_a_1_sequence;
	var $mfo_question_report_form_a_gaa_value;
	var $pi_no;
	var $pi_sub;
	var $iatf_2013;
	var $iatf_2014;
	var $fields = array();
	var $UseTokenInUrl = UP_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = UP_EXPORT_ORIGINAL_VALUE;
	var $ExportAll = TRUE;
	var $ExportPageBreakCount = 0; // Page break per every n record (PDF only)
	var $SendEmail; // Send email
	var $TableCustomInnerHtml; // Custom inner HTML
	var $BasicSearchKeyword; // Basic search keyword
	var $BasicSearchType; // Basic search type
	var $CurrentFilter; // Current filter
	var $CurrentOrder; // Current order
	var $CurrentOrderType; // Current order type
	var $RowType; // Row type
	var $CssClass; // CSS class
	var $CssStyle; // CSS style
	var $RowAttrs = array(); // Row custom attributes

	// Reset attributes for table object
	function ResetAttrs() {
		$this->CssClass = "";
		$this->CssStyle = "";
    	$this->RowAttrs = array();
		foreach ($this->fields as $fld) {
			$fld->ResetAttrs();
		}
	}

	// Setup field titles
	function SetupFieldTitles() {
		foreach ($this->fields as &$fld) {
			if (strval($fld->FldTitle()) <> "") {
				$fld->EditAttrs["onmouseover"] = "up_ShowTitle(this, '" . up_JsEncode3($fld->FldTitle()) . "');";
				$fld->EditAttrs["onmouseout"] = "up_HideTooltip();";
			}
		}
	}
	var $TableFilter = "";
	var $CurrentAction; // Current action
	var $LastAction; // Last action
	var $CurrentMode = ""; // Current mode
	var $UpdateConflict; // Update conflict
	var $EventName; // Event name
	var $EventCancelled; // Event cancelled
	var $CancelMessage; // Cancel message
	var $AllowAddDeleteRow = TRUE; // Allow add/delete row
	var $DetailAdd = FALSE; // Allow detail add
	var $DetailEdit = FALSE; // Allow detail edit
	var $GridAddRowCount = 5;

	// Check current action
	// - Add
	function IsAdd() {
		return $this->CurrentAction == "add";
	}

	// - Copy
	function IsCopy() {
		return $this->CurrentAction == "copy" || $this->CurrentAction == "C";
	}

	// - Edit
	function IsEdit() {
		return $this->CurrentAction == "edit";
	}

	// - Delete
	function IsDelete() {
		return $this->CurrentAction == "D";
	}

	// - Confirm
	function IsConfirm() {
		return $this->CurrentAction == "F";
	}

	// - Overwrite
	function IsOverwrite() {
		return $this->CurrentAction == "overwrite";
	}

	// - Cancel
	function IsCancel() {
		return $this->CurrentAction == "cancel";
	}

	// - Grid add
	function IsGridAdd() {
		return $this->CurrentAction == "gridadd";
	}

	// - Grid edit
	function IsGridEdit() {
		return $this->CurrentAction == "gridedit";
	}

	// - Insert
	function IsInsert() {
		return $this->CurrentAction == "insert" || $this->CurrentAction == "A";
	}

	// - Update
	function IsUpdate() {
		return $this->CurrentAction == "update" || $this->CurrentAction == "U";
	}

	// - Grid update
	function IsGridUpdate() {
		return $this->CurrentAction == "gridupdate";
	}

	// - Grid insert
	function IsGridInsert() {
		return $this->CurrentAction == "gridinsert";
	}

	// - Grid overwrite
	function IsGridOverwrite() {
		return $this->CurrentAction == "gridoverwrite";
	}

	// Check last action
	// - Cancelled
	function IsCanceled() {
		return $this->LastAction == "cancel" && $this->CurrentAction == "";
	}

	// - Inline inserted
	function IsInlineInserted() {
		return $this->LastAction == "insert" && $this->CurrentAction == "";
	}

	// - Inline updated
	function IsInlineUpdated() {
		return $this->LastAction == "update" && $this->CurrentAction == "";
	}

	// - Grid updated
	function IsGridUpdated() {
		return $this->LastAction == "gridupdate" && $this->CurrentAction == "";
	}

	// - Grid inserted
	function IsGridInserted() {
		return $this->LastAction == "gridinsert" && $this->CurrentAction == "";
	}

	//
	// Table class constructor
	//
	function cfrm_9_m_sa_mfo_questions() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// mfo_question_id
		$this->mfo_question_id = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_id', 'mfo_question_id', '`mfo_question_id`', 3, -1, FALSE, '`mfo_question_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_question_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_question_id'] =& $this->mfo_question_id;

		// mfo_question_online_pi_seq
		$this->mfo_question_online_pi_seq = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_online_pi_seq', 'mfo_question_online_pi_seq', '`mfo_question_online_pi_seq`', 3, -1, FALSE, '`mfo_question_online_pi_seq`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_question_online_pi_seq->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_question_online_pi_seq'] =& $this->mfo_question_online_pi_seq;

		// mfo_question_online_mfo_name
		$this->mfo_question_online_mfo_name = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_online_mfo_name', 'mfo_question_online_mfo_name', '`mfo_question_online_mfo_name`', 200, -1, FALSE, '`mfo_question_online_mfo_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_online_mfo_name'] =& $this->mfo_question_online_mfo_name;

		// mfo_question_online_pi_question
		$this->mfo_question_online_pi_question = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_online_pi_question', 'mfo_question_online_pi_question', '`mfo_question_online_pi_question`', 200, -1, FALSE, '`mfo_question_online_pi_question`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_online_pi_question'] =& $this->mfo_question_online_pi_question;

		// mfo_question_expected_answer
		$this->mfo_question_expected_answer = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_expected_answer', 'mfo_question_expected_answer', '`mfo_question_expected_answer`', 200, -1, FALSE, '`mfo_question_expected_answer`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_expected_answer'] =& $this->mfo_question_expected_answer;

		// mfo_question_online_insert_question_mfo
		$this->mfo_question_online_insert_question_mfo = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_online_insert_question_mfo', 'mfo_question_online_insert_question_mfo', '`mfo_question_online_insert_question_mfo`', 3, -1, FALSE, '`mfo_question_online_insert_question_mfo`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_question_online_insert_question_mfo->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_question_online_insert_question_mfo'] =& $this->mfo_question_online_insert_question_mfo;

		// mfo_question_online_insert_question_mfo_name_rep
		$this->mfo_question_online_insert_question_mfo_name_rep = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_online_insert_question_mfo_name_rep', 'mfo_question_online_insert_question_mfo_name_rep', '`mfo_question_online_insert_question_mfo_name_rep`', 200, -1, FALSE, '`mfo_question_online_insert_question_mfo_name_rep`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_online_insert_question_mfo_name_rep'] =& $this->mfo_question_online_insert_question_mfo_name_rep;

		// mfo_question_online_computation_du_cu_summary
		$this->mfo_question_online_computation_du_cu_summary = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_online_computation_du_cu_summary', 'mfo_question_online_computation_du_cu_summary', '`mfo_question_online_computation_du_cu_summary`', 3, -1, FALSE, '`mfo_question_online_computation_du_cu_summary`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_question_online_computation_du_cu_summary->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_question_online_computation_du_cu_summary'] =& $this->mfo_question_online_computation_du_cu_summary;

		// mfo_question_online_computation_du_cu_summary_name
		$this->mfo_question_online_computation_du_cu_summary_name = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_online_computation_du_cu_summary_name', 'mfo_question_online_computation_du_cu_summary_name', '`mfo_question_online_computation_du_cu_summary_name`', 200, -1, FALSE, '`mfo_question_online_computation_du_cu_summary_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_online_computation_du_cu_summary_name'] =& $this->mfo_question_online_computation_du_cu_summary_name;

		// mfo_question_online_computation_denominator
		$this->mfo_question_online_computation_denominator = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_online_computation_denominator', 'mfo_question_online_computation_denominator', '`mfo_question_online_computation_denominator`', 200, -1, FALSE, '`mfo_question_online_computation_denominator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_online_computation_denominator'] =& $this->mfo_question_online_computation_denominator;

		// mfo_question_supporting_document_requirement
		$this->mfo_question_supporting_document_requirement = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_supporting_document_requirement', 'mfo_question_supporting_document_requirement', '`mfo_question_supporting_document_requirement`', 200, -1, FALSE, '`mfo_question_supporting_document_requirement`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_supporting_document_requirement'] =& $this->mfo_question_supporting_document_requirement;

		// mfo_question_expected_trend
		$this->mfo_question_expected_trend = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_expected_trend', 'mfo_question_expected_trend', '`mfo_question_expected_trend`', 200, -1, FALSE, '`mfo_question_expected_trend`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_expected_trend'] =& $this->mfo_question_expected_trend;

		// mfo_question_online_ask_y_n
		$this->mfo_question_online_ask_y_n = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_online_ask_y_n', 'mfo_question_online_ask_y_n', '`mfo_question_online_ask_y_n`', 200, -1, FALSE, '`mfo_question_online_ask_y_n`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_online_ask_y_n'] =& $this->mfo_question_online_ask_y_n;

		// mfo_question_online_pi_question_numerator
		$this->mfo_question_online_pi_question_numerator = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_online_pi_question_numerator', 'mfo_question_online_pi_question_numerator', '`mfo_question_online_pi_question_numerator`', 200, -1, FALSE, '`mfo_question_online_pi_question_numerator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_online_pi_question_numerator'] =& $this->mfo_question_online_pi_question_numerator;

		// mfo_question_online_pi_question_denominator
		$this->mfo_question_online_pi_question_denominator = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_online_pi_question_denominator', 'mfo_question_online_pi_question_denominator', '`mfo_question_online_pi_question_denominator`', 200, -1, FALSE, '`mfo_question_online_pi_question_denominator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_online_pi_question_denominator'] =& $this->mfo_question_online_pi_question_denominator;

		// mfo_question_expected_numerator
		$this->mfo_question_expected_numerator = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_expected_numerator', 'mfo_question_expected_numerator', '`mfo_question_expected_numerator`', 200, -1, FALSE, '`mfo_question_expected_numerator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_expected_numerator'] =& $this->mfo_question_expected_numerator;

		// mfo_question_expected_denominator
		$this->mfo_question_expected_denominator = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_expected_denominator', 'mfo_question_expected_denominator', '`mfo_question_expected_denominator`', 200, -1, FALSE, '`mfo_question_expected_denominator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_expected_denominator'] =& $this->mfo_question_expected_denominator;

		// mfo_question_report_mfo_name
		$this->mfo_question_report_mfo_name = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_report_mfo_name', 'mfo_question_report_mfo_name', '`mfo_question_report_mfo_name`', 200, -1, FALSE, '`mfo_question_report_mfo_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_report_mfo_name'] =& $this->mfo_question_report_mfo_name;

		// mfo_question_report_form_a_pi_question
		$this->mfo_question_report_form_a_pi_question = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_report_form_a_pi_question', 'mfo_question_report_form_a_pi_question', '`mfo_question_report_form_a_pi_question`', 200, -1, FALSE, '`mfo_question_report_form_a_pi_question`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_report_form_a_pi_question'] =& $this->mfo_question_report_form_a_pi_question;

		// mfo_question_report_form_a_1_mfo
		$this->mfo_question_report_form_a_1_mfo = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_report_form_a_1_mfo', 'mfo_question_report_form_a_1_mfo', '`mfo_question_report_form_a_1_mfo`', 3, -1, FALSE, '`mfo_question_report_form_a_1_mfo`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_question_report_form_a_1_mfo->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_question_report_form_a_1_mfo'] =& $this->mfo_question_report_form_a_1_mfo;

		// mfo_question_report_form_a_1_sequence
		$this->mfo_question_report_form_a_1_sequence = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_report_form_a_1_sequence', 'mfo_question_report_form_a_1_sequence', '`mfo_question_report_form_a_1_sequence`', 3, -1, FALSE, '`mfo_question_report_form_a_1_sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_question_report_form_a_1_sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_question_report_form_a_1_sequence'] =& $this->mfo_question_report_form_a_1_sequence;

		// mfo_question_report_form_a_gaa_value
		$this->mfo_question_report_form_a_gaa_value = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_mfo_question_report_form_a_gaa_value', 'mfo_question_report_form_a_gaa_value', '`mfo_question_report_form_a_gaa_value`', 5, -1, FALSE, '`mfo_question_report_form_a_gaa_value`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_question_report_form_a_gaa_value->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['mfo_question_report_form_a_gaa_value'] =& $this->mfo_question_report_form_a_gaa_value;

		// pi_no
		$this->pi_no = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_pi_no', 'pi_no', '`pi_no`', 20, -1, FALSE, '`pi_no`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->pi_no->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['pi_no'] =& $this->pi_no;

		// pi_sub
		$this->pi_sub = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_pi_sub', 'pi_sub', '`pi_sub`', 200, -1, FALSE, '`pi_sub`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['pi_sub'] =& $this->pi_sub;

		// iatf_2013
		$this->iatf_2013 = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_iatf_2013', 'iatf_2013', '`iatf_2013`', 5, -1, FALSE, '`iatf_2013`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->iatf_2013->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['iatf_2013'] =& $this->iatf_2013;

		// iatf_2014
		$this->iatf_2014 = new cField('frm_9_m_sa_mfo_questions', 'frm_9_m_sa_mfo_questions', 'x_iatf_2014', 'iatf_2014', '`iatf_2014`', 5, -1, FALSE, '`iatf_2014`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->iatf_2014->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['iatf_2014'] =& $this->iatf_2014;
	}

	// Get field values
	function GetFieldValues($propertyname) {
		$values = array();
		foreach ($this->fields as $fldname => $fld)
			$values[$fldname] =& $fld->$propertyname;
		return $values;
	}

	// Table caption
	function TableCaption() {
		global $Language;
		return $Language->TablePhrase($this->TableVar, "TblCaption");
	}

	// Page caption
	function PageCaption($Page) {
		global $Language;
		$Caption = $Language->TablePhrase($this->TableVar, "TblPageCaption" . $Page);
		if ($Caption == "") $Caption = "Page " . $Page;
		return $Caption;
	}

	// Export return page
	function ExportReturnUrl() {
		$url = @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_EXPORT_RETURN_URL];
		return ($url <> "") ? $url : up_CurrentPage();
	}

	function setExportReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_EXPORT_RETURN_URL] = $v;
	}

	// Records per page
	function getRecordsPerPage() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_REC_PER_PAGE];
	}

	function setRecordsPerPage($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_REC_PER_PAGE] = $v;
	}

	// Start record number
	function getStartRecordNumber() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_START_REC];
	}

	function setStartRecordNumber($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_START_REC] = $v;
	}

	// Search highlight name
	function HighlightName() {
		return "frm_9_m_sa_mfo_questions_Highlight";
	}

	// Advanced search
	function getAdvancedSearch($fld) {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ADVANCED_SEARCH . "_" . $fld];
	}

	function setAdvancedSearch($fld, $v) {
		if (@$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ADVANCED_SEARCH . "_" . $fld] <> $v) {
			$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ADVANCED_SEARCH . "_" . $fld] = $v;
		}
	}

	// Basic search keyword
	function getSessionBasicSearchKeyword() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_BASIC_SEARCH];
	}

	function setSessionBasicSearchKeyword($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_BASIC_SEARCH] = $v;
	}

	// Basic search type
	function getSessionBasicSearchType() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_BASIC_SEARCH_TYPE];
	}

	function setSessionBasicSearchType($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_BASIC_SEARCH_TYPE] = $v;
	}

	// Search WHERE clause
	function getSearchWhere() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_SEARCH_WHERE];
	}

	function setSearchWhere($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_SEARCH_WHERE] = $v;
	}

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			$this->setSessionOrderBy($sSortField . " " . $sThisSort); // Save to Session
		} else {
			$ofld->setSort("");
		}
	}

	// Session WHERE clause
	function getSessionWhere() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_WHERE];
	}

	function setSessionWhere($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_WHERE] = $v;
	}

	// Session ORDER BY
	function getSessionOrderBy() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ORDER_BY];
	}

	function setSessionOrderBy($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_ORDER_BY] = $v;
	}

	// Session key
	function getKey($fld) {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_KEY . "_" . $fld];
	}

	function setKey($fld, $v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_KEY . "_" . $fld] = $v;
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`frm_9_m_sa_mfo_questions`";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
		$sWhere = "";
		$this->TableFilter = "";
		up_AddFilter($sWhere, $this->TableFilter);
		return $sWhere;
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "";
	}

	// Check if Anonymous User is allowed
	function AllowAnonymousUser() {
		switch (UP_PAGE_ID) {
			case "add":
			case "register":
			case "addopt":
				return FALSE;
			case "edit":
			case "update":
				return FALSE;
			case "delete":
				return FALSE;
			case "view":
				return FALSE;
			case "search":
				return FALSE;
			default:
				return FALSE;
		}
	}

	// Apply User ID filters
	function ApplyUserIDFilters($sFilter) {
		return $sFilter;
	}

	// Get SQL
	function GetSQL($where, $orderby) {
		return up_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$where, $orderby);
	}

	// Table SQL
	function SQL() {
		$sFilter = $this->CurrentFilter;
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = $this->getSessionOrderBy();
		return up_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Table SQL with List page filter
	function SelectSQL() {
		$sFilter = $this->getSessionWhere();
		up_AddFilter($sFilter, $this->CurrentFilter);
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = $this->getSessionOrderBy();
		return up_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(), $this->SqlGroupBy(),
			$this->SqlHaving(), $this->SqlOrderBy(), $sFilter, $sSort);
	}

	// Try to get record count
	function TryGetRecordCount($sSql) {
		global $conn;
		$cnt = -1;
		if ($this->TableType == 'TABLE' || $this->TableType == 'VIEW') {
			$sSql = "SELECT COUNT(*) FROM" . substr($sSql, 13);
		} else {
			$sSql = "SELECT COUNT(*) FROM (" . $sSql . ") UP_COUNT_TABLE";
		}
		if ($rs = $conn->Execute($sSql)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->Close();
			}
		}
		return intval($cnt);
	}

	// Get record count based on filter (for detail record count in master table pages)
	function LoadRecordCount($sFilter) {
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $sFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$sSql = $this->SQL();
		$cnt = $this->TryGetRecordCount($sSql);
		if ($cnt == -1) {
			if ($rs = $this->LoadRs($this->CurrentFilter)) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $origFilter;
		return intval($cnt);
	}

	// Get record count (for current List page)
	function SelectRecordCount() {
		global $conn;
		$origFilter = $this->CurrentFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$sSql = $this->SelectSQL();
		$cnt = $this->TryGetRecordCount($sSql);
		if ($cnt == -1) {
			if ($rs = $conn->Execute($this->SelectSQL())) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $origFilter;
		return intval($cnt);
	}

	// INSERT statement
	function InsertSQL(&$rs) {
		global $conn;
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= up_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `frm_9_m_sa_mfo_questions` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_9_m_sa_mfo_questions` SET ";
		foreach ($rs as $name => $value) {
			$SQL .= $this->fields[$name]->FldExpression . "=";
			$SQL .= up_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM `frm_9_m_sa_mfo_questions` WHERE ";
		$SQL .= up_QuotedName('mfo_question_id') . '=' . up_QuotedValue($rs['mfo_question_id'], $this->mfo_question_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`mfo_question_id` = @mfo_question_id@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->mfo_question_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@mfo_question_id@", up_AdjustSql($this->mfo_question_id->CurrentValue), $sKeyFilter); // Replace key value
		return $sKeyFilter;
	}

	// Return page URL
	function getReturnUrl() {
		$name = UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL;

		// Get referer URL automatically
		if (up_ServerVar("HTTP_REFERER") <> "" && up_ReferPage() <> up_CurrentPage() && up_ReferPage() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = up_ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "frm_9_m_sa_mfo_questionslist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_9_m_sa_mfo_questionslist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_9_m_sa_mfo_questionsview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_9_m_sa_mfo_questionsadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_9_m_sa_mfo_questionsedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_9_m_sa_mfo_questionsadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_9_m_sa_mfo_questionsdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->mfo_question_id->CurrentValue)) {
			$sUrl .= "mfo_question_id=" . urlencode($this->mfo_question_id->CurrentValue);
		} else {
			return "javascript:alert(upLanguage.Phrase('InvalidRecord'));";
		}
		return $sUrl;
	}

	// Sort URL
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			in_array($fld->FldType, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$sUrlParm = $this->UrlParm("order=" . urlencode($fld->FldName) . "&ordertype=" . $fld->ReverseSort());
			return up_CurrentPage() . "?" . $sUrlParm;
		} else {
			return "";
		}
	}

	// Add URL parameter
	function UrlParm($parm = "") {
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_9_m_sa_mfo_questions" : "";
		if ($parm <> "") {
			if ($UrlParm <> "")
				$UrlParm .= "&";
			$UrlParm .= $parm;
		}
		return $UrlParm;
	}

	// Get record keys from $_POST/$_GET/$_SESSION
	function GetRecordKeys() {
		$arKeys = array();
		$arKey = array();
		if (isset($_POST["key_m"])) {
			$arKeys = up_StripSlashes($_POST["key_m"]);
			$cnt = count($arKeys);
		} elseif (isset($_GET["key_m"])) {
			$arKeys = up_StripSlashes($_GET["key_m"]);
			$cnt = count($arKeys);
		} elseif (isset($_GET)) {
			$arKeys[] = @$_GET["mfo_question_id"]; // mfo_question_id

			//return $arKeys; // do not return yet, so the values will also be checked by the following code
		}

		// check keys
		$ar = array();
		foreach ($arKeys as $key) {
			if (!is_numeric($key))
				continue;
			$ar[] = $key;
		}
		return $ar;
	}

	// Get key filter
	function GetKeyFilter() {
		$arKeys = $this->GetRecordKeys();
		$sKeyFilter = "";
		foreach ($arKeys as $key) {
			if ($sKeyFilter <> "") $sKeyFilter .= " OR ";
			$this->mfo_question_id->CurrentValue = $key;
			$sKeyFilter .= "(" . $this->KeyFilter() . ")";
		}
		return $sKeyFilter;
	}

	// Load rows based on filter
	function &LoadRs($sFilter) {
		global $conn;

		// Set up filter (SQL WHERE clause) and get return SQL
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		$rs = $conn->Execute($sSql);
		return $rs;
	}

	// Load row values from recordset
	function LoadListRowValues(&$rs) {
		$this->mfo_question_id->setDbValue($rs->fields('mfo_question_id'));
		$this->mfo_question_online_pi_seq->setDbValue($rs->fields('mfo_question_online_pi_seq'));
		$this->mfo_question_online_mfo_name->setDbValue($rs->fields('mfo_question_online_mfo_name'));
		$this->mfo_question_online_pi_question->setDbValue($rs->fields('mfo_question_online_pi_question'));
		$this->mfo_question_expected_answer->setDbValue($rs->fields('mfo_question_expected_answer'));
		$this->mfo_question_online_insert_question_mfo->setDbValue($rs->fields('mfo_question_online_insert_question_mfo'));
		$this->mfo_question_online_insert_question_mfo_name_rep->setDbValue($rs->fields('mfo_question_online_insert_question_mfo_name_rep'));
		$this->mfo_question_online_computation_du_cu_summary->setDbValue($rs->fields('mfo_question_online_computation_du_cu_summary'));
		$this->mfo_question_online_computation_du_cu_summary_name->setDbValue($rs->fields('mfo_question_online_computation_du_cu_summary_name'));
		$this->mfo_question_online_computation_denominator->setDbValue($rs->fields('mfo_question_online_computation_denominator'));
		$this->mfo_question_supporting_document_requirement->setDbValue($rs->fields('mfo_question_supporting_document_requirement'));
		$this->mfo_question_expected_trend->setDbValue($rs->fields('mfo_question_expected_trend'));
		$this->mfo_question_online_ask_y_n->setDbValue($rs->fields('mfo_question_online_ask_y_n'));
		$this->mfo_question_online_pi_question_numerator->setDbValue($rs->fields('mfo_question_online_pi_question_numerator'));
		$this->mfo_question_online_pi_question_denominator->setDbValue($rs->fields('mfo_question_online_pi_question_denominator'));
		$this->mfo_question_expected_numerator->setDbValue($rs->fields('mfo_question_expected_numerator'));
		$this->mfo_question_expected_denominator->setDbValue($rs->fields('mfo_question_expected_denominator'));
		$this->mfo_question_report_mfo_name->setDbValue($rs->fields('mfo_question_report_mfo_name'));
		$this->mfo_question_report_form_a_pi_question->setDbValue($rs->fields('mfo_question_report_form_a_pi_question'));
		$this->mfo_question_report_form_a_1_mfo->setDbValue($rs->fields('mfo_question_report_form_a_1_mfo'));
		$this->mfo_question_report_form_a_1_sequence->setDbValue($rs->fields('mfo_question_report_form_a_1_sequence'));
		$this->mfo_question_report_form_a_gaa_value->setDbValue($rs->fields('mfo_question_report_form_a_gaa_value'));
		$this->pi_no->setDbValue($rs->fields('pi_no'));
		$this->pi_sub->setDbValue($rs->fields('pi_sub'));
		$this->iatf_2013->setDbValue($rs->fields('iatf_2013'));
		$this->iatf_2014->setDbValue($rs->fields('iatf_2014'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// mfo_question_id
		// mfo_question_online_pi_seq
		// mfo_question_online_mfo_name
		// mfo_question_online_pi_question
		// mfo_question_expected_answer
		// mfo_question_online_insert_question_mfo
		// mfo_question_online_insert_question_mfo_name_rep
		// mfo_question_online_computation_du_cu_summary
		// mfo_question_online_computation_du_cu_summary_name
		// mfo_question_online_computation_denominator
		// mfo_question_supporting_document_requirement
		// mfo_question_expected_trend
		// mfo_question_online_ask_y_n
		// mfo_question_online_pi_question_numerator
		// mfo_question_online_pi_question_denominator
		// mfo_question_expected_numerator
		// mfo_question_expected_denominator
		// mfo_question_report_mfo_name
		// mfo_question_report_form_a_pi_question
		// mfo_question_report_form_a_1_mfo
		// mfo_question_report_form_a_1_sequence
		// mfo_question_report_form_a_gaa_value
		// pi_no
		// pi_sub
		// iatf_2013
		// iatf_2014
		// mfo_question_id

		$this->mfo_question_id->ViewValue = $this->mfo_question_id->CurrentValue;
		$this->mfo_question_id->ViewCustomAttributes = "";

		// mfo_question_online_pi_seq
		$this->mfo_question_online_pi_seq->ViewValue = $this->mfo_question_online_pi_seq->CurrentValue;
		$this->mfo_question_online_pi_seq->ViewCustomAttributes = "";

		// mfo_question_online_mfo_name
		$this->mfo_question_online_mfo_name->ViewValue = $this->mfo_question_online_mfo_name->CurrentValue;
		$this->mfo_question_online_mfo_name->ViewCustomAttributes = "";

		// mfo_question_online_pi_question
		$this->mfo_question_online_pi_question->ViewValue = $this->mfo_question_online_pi_question->CurrentValue;
		$this->mfo_question_online_pi_question->ViewCustomAttributes = "";

		// mfo_question_expected_answer
		$this->mfo_question_expected_answer->ViewValue = $this->mfo_question_expected_answer->CurrentValue;
		$this->mfo_question_expected_answer->ViewCustomAttributes = "";

		// mfo_question_online_insert_question_mfo
		$this->mfo_question_online_insert_question_mfo->ViewValue = $this->mfo_question_online_insert_question_mfo->CurrentValue;
		$this->mfo_question_online_insert_question_mfo->ViewCustomAttributes = "";

		// mfo_question_online_insert_question_mfo_name_rep
		$this->mfo_question_online_insert_question_mfo_name_rep->ViewValue = $this->mfo_question_online_insert_question_mfo_name_rep->CurrentValue;
		$this->mfo_question_online_insert_question_mfo_name_rep->ViewCustomAttributes = "";

		// mfo_question_online_computation_du_cu_summary
		$this->mfo_question_online_computation_du_cu_summary->ViewValue = $this->mfo_question_online_computation_du_cu_summary->CurrentValue;
		$this->mfo_question_online_computation_du_cu_summary->ViewCustomAttributes = "";

		// mfo_question_online_computation_du_cu_summary_name
		$this->mfo_question_online_computation_du_cu_summary_name->ViewValue = $this->mfo_question_online_computation_du_cu_summary_name->CurrentValue;
		$this->mfo_question_online_computation_du_cu_summary_name->ViewCustomAttributes = "";

		// mfo_question_online_computation_denominator
		$this->mfo_question_online_computation_denominator->ViewValue = $this->mfo_question_online_computation_denominator->CurrentValue;
		$this->mfo_question_online_computation_denominator->ViewCustomAttributes = "";

		// mfo_question_supporting_document_requirement
		$this->mfo_question_supporting_document_requirement->ViewValue = $this->mfo_question_supporting_document_requirement->CurrentValue;
		$this->mfo_question_supporting_document_requirement->ViewCustomAttributes = "";

		// mfo_question_expected_trend
		$this->mfo_question_expected_trend->ViewValue = $this->mfo_question_expected_trend->CurrentValue;
		$this->mfo_question_expected_trend->ViewCustomAttributes = "";

		// mfo_question_online_ask_y_n
		$this->mfo_question_online_ask_y_n->ViewValue = $this->mfo_question_online_ask_y_n->CurrentValue;
		$this->mfo_question_online_ask_y_n->ViewCustomAttributes = "";

		// mfo_question_online_pi_question_numerator
		$this->mfo_question_online_pi_question_numerator->ViewValue = $this->mfo_question_online_pi_question_numerator->CurrentValue;
		$this->mfo_question_online_pi_question_numerator->ViewCustomAttributes = "";

		// mfo_question_online_pi_question_denominator
		$this->mfo_question_online_pi_question_denominator->ViewValue = $this->mfo_question_online_pi_question_denominator->CurrentValue;
		$this->mfo_question_online_pi_question_denominator->ViewCustomAttributes = "";

		// mfo_question_expected_numerator
		$this->mfo_question_expected_numerator->ViewValue = $this->mfo_question_expected_numerator->CurrentValue;
		$this->mfo_question_expected_numerator->ViewCustomAttributes = "";

		// mfo_question_expected_denominator
		$this->mfo_question_expected_denominator->ViewValue = $this->mfo_question_expected_denominator->CurrentValue;
		$this->mfo_question_expected_denominator->ViewCustomAttributes = "";

		// mfo_question_report_mfo_name
		$this->mfo_question_report_mfo_name->ViewValue = $this->mfo_question_report_mfo_name->CurrentValue;
		$this->mfo_question_report_mfo_name->ViewCustomAttributes = "";

		// mfo_question_report_form_a_pi_question
		$this->mfo_question_report_form_a_pi_question->ViewValue = $this->mfo_question_report_form_a_pi_question->CurrentValue;
		$this->mfo_question_report_form_a_pi_question->ViewCustomAttributes = "";

		// mfo_question_report_form_a_1_mfo
		$this->mfo_question_report_form_a_1_mfo->ViewValue = $this->mfo_question_report_form_a_1_mfo->CurrentValue;
		$this->mfo_question_report_form_a_1_mfo->ViewCustomAttributes = "";

		// mfo_question_report_form_a_1_sequence
		$this->mfo_question_report_form_a_1_sequence->ViewValue = $this->mfo_question_report_form_a_1_sequence->CurrentValue;
		$this->mfo_question_report_form_a_1_sequence->ViewCustomAttributes = "";

		// mfo_question_report_form_a_gaa_value
		$this->mfo_question_report_form_a_gaa_value->ViewValue = $this->mfo_question_report_form_a_gaa_value->CurrentValue;
		$this->mfo_question_report_form_a_gaa_value->ViewCustomAttributes = "";

		// pi_no
		$this->pi_no->ViewValue = $this->pi_no->CurrentValue;
		$this->pi_no->ViewCustomAttributes = "";

		// pi_sub
		$this->pi_sub->ViewValue = $this->pi_sub->CurrentValue;
		$this->pi_sub->ViewCustomAttributes = "";

		// iatf_2013
		$this->iatf_2013->ViewValue = $this->iatf_2013->CurrentValue;
		$this->iatf_2013->ViewCustomAttributes = "";

		// iatf_2014
		$this->iatf_2014->ViewValue = $this->iatf_2014->CurrentValue;
		$this->iatf_2014->ViewCustomAttributes = "";

		// mfo_question_id
		$this->mfo_question_id->LinkCustomAttributes = "";
		$this->mfo_question_id->HrefValue = "";
		$this->mfo_question_id->TooltipValue = "";

		// mfo_question_online_pi_seq
		$this->mfo_question_online_pi_seq->LinkCustomAttributes = "";
		$this->mfo_question_online_pi_seq->HrefValue = "";
		$this->mfo_question_online_pi_seq->TooltipValue = "";

		// mfo_question_online_mfo_name
		$this->mfo_question_online_mfo_name->LinkCustomAttributes = "";
		$this->mfo_question_online_mfo_name->HrefValue = "";
		$this->mfo_question_online_mfo_name->TooltipValue = "";

		// mfo_question_online_pi_question
		$this->mfo_question_online_pi_question->LinkCustomAttributes = "";
		$this->mfo_question_online_pi_question->HrefValue = "";
		$this->mfo_question_online_pi_question->TooltipValue = "";

		// mfo_question_expected_answer
		$this->mfo_question_expected_answer->LinkCustomAttributes = "";
		$this->mfo_question_expected_answer->HrefValue = "";
		$this->mfo_question_expected_answer->TooltipValue = "";

		// mfo_question_online_insert_question_mfo
		$this->mfo_question_online_insert_question_mfo->LinkCustomAttributes = "";
		$this->mfo_question_online_insert_question_mfo->HrefValue = "";
		$this->mfo_question_online_insert_question_mfo->TooltipValue = "";

		// mfo_question_online_insert_question_mfo_name_rep
		$this->mfo_question_online_insert_question_mfo_name_rep->LinkCustomAttributes = "";
		$this->mfo_question_online_insert_question_mfo_name_rep->HrefValue = "";
		$this->mfo_question_online_insert_question_mfo_name_rep->TooltipValue = "";

		// mfo_question_online_computation_du_cu_summary
		$this->mfo_question_online_computation_du_cu_summary->LinkCustomAttributes = "";
		$this->mfo_question_online_computation_du_cu_summary->HrefValue = "";
		$this->mfo_question_online_computation_du_cu_summary->TooltipValue = "";

		// mfo_question_online_computation_du_cu_summary_name
		$this->mfo_question_online_computation_du_cu_summary_name->LinkCustomAttributes = "";
		$this->mfo_question_online_computation_du_cu_summary_name->HrefValue = "";
		$this->mfo_question_online_computation_du_cu_summary_name->TooltipValue = "";

		// mfo_question_online_computation_denominator
		$this->mfo_question_online_computation_denominator->LinkCustomAttributes = "";
		$this->mfo_question_online_computation_denominator->HrefValue = "";
		$this->mfo_question_online_computation_denominator->TooltipValue = "";

		// mfo_question_supporting_document_requirement
		$this->mfo_question_supporting_document_requirement->LinkCustomAttributes = "";
		$this->mfo_question_supporting_document_requirement->HrefValue = "";
		$this->mfo_question_supporting_document_requirement->TooltipValue = "";

		// mfo_question_expected_trend
		$this->mfo_question_expected_trend->LinkCustomAttributes = "";
		$this->mfo_question_expected_trend->HrefValue = "";
		$this->mfo_question_expected_trend->TooltipValue = "";

		// mfo_question_online_ask_y_n
		$this->mfo_question_online_ask_y_n->LinkCustomAttributes = "";
		$this->mfo_question_online_ask_y_n->HrefValue = "";
		$this->mfo_question_online_ask_y_n->TooltipValue = "";

		// mfo_question_online_pi_question_numerator
		$this->mfo_question_online_pi_question_numerator->LinkCustomAttributes = "";
		$this->mfo_question_online_pi_question_numerator->HrefValue = "";
		$this->mfo_question_online_pi_question_numerator->TooltipValue = "";

		// mfo_question_online_pi_question_denominator
		$this->mfo_question_online_pi_question_denominator->LinkCustomAttributes = "";
		$this->mfo_question_online_pi_question_denominator->HrefValue = "";
		$this->mfo_question_online_pi_question_denominator->TooltipValue = "";

		// mfo_question_expected_numerator
		$this->mfo_question_expected_numerator->LinkCustomAttributes = "";
		$this->mfo_question_expected_numerator->HrefValue = "";
		$this->mfo_question_expected_numerator->TooltipValue = "";

		// mfo_question_expected_denominator
		$this->mfo_question_expected_denominator->LinkCustomAttributes = "";
		$this->mfo_question_expected_denominator->HrefValue = "";
		$this->mfo_question_expected_denominator->TooltipValue = "";

		// mfo_question_report_mfo_name
		$this->mfo_question_report_mfo_name->LinkCustomAttributes = "";
		$this->mfo_question_report_mfo_name->HrefValue = "";
		$this->mfo_question_report_mfo_name->TooltipValue = "";

		// mfo_question_report_form_a_pi_question
		$this->mfo_question_report_form_a_pi_question->LinkCustomAttributes = "";
		$this->mfo_question_report_form_a_pi_question->HrefValue = "";
		$this->mfo_question_report_form_a_pi_question->TooltipValue = "";

		// mfo_question_report_form_a_1_mfo
		$this->mfo_question_report_form_a_1_mfo->LinkCustomAttributes = "";
		$this->mfo_question_report_form_a_1_mfo->HrefValue = "";
		$this->mfo_question_report_form_a_1_mfo->TooltipValue = "";

		// mfo_question_report_form_a_1_sequence
		$this->mfo_question_report_form_a_1_sequence->LinkCustomAttributes = "";
		$this->mfo_question_report_form_a_1_sequence->HrefValue = "";
		$this->mfo_question_report_form_a_1_sequence->TooltipValue = "";

		// mfo_question_report_form_a_gaa_value
		$this->mfo_question_report_form_a_gaa_value->LinkCustomAttributes = "";
		$this->mfo_question_report_form_a_gaa_value->HrefValue = "";
		$this->mfo_question_report_form_a_gaa_value->TooltipValue = "";

		// pi_no
		$this->pi_no->LinkCustomAttributes = "";
		$this->pi_no->HrefValue = "";
		$this->pi_no->TooltipValue = "";

		// pi_sub
		$this->pi_sub->LinkCustomAttributes = "";
		$this->pi_sub->HrefValue = "";
		$this->pi_sub->TooltipValue = "";

		// iatf_2013
		$this->iatf_2013->LinkCustomAttributes = "";
		$this->iatf_2013->HrefValue = "";
		$this->iatf_2013->TooltipValue = "";

		// iatf_2014
		$this->iatf_2014->LinkCustomAttributes = "";
		$this->iatf_2014->HrefValue = "";
		$this->iatf_2014->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	function AggregateListRowValues() {
	}

	// Aggregate list row (for rendering)
	function AggregateListRow() {
	}

	// Export data in Xml Format
	function ExportXmlDocument(&$XmlDoc, $HasParent, &$Recordset, $StartRec, $StopRec, $ExportPageType = "") {
		if (!$Recordset || !$XmlDoc)
			return;
		if (!$HasParent)
			$XmlDoc->AddRoot($this->TableVar);

		// Move to first record
		$RecCnt = $StartRec - 1;
		if (!$Recordset->EOF) {
			$Recordset->MoveFirst();
			if ($StartRec > 1)
				$Recordset->Move($StartRec - 1);
		}
		while (!$Recordset->EOF && $RecCnt < $StopRec) {
			$RecCnt++;
			if (intval($RecCnt) >= intval($StartRec)) {
				$RowCnt = intval($RecCnt) - intval($StartRec) + 1;
				$this->LoadListRowValues($Recordset);

				// Render row
				$this->RowType = UP_ROWTYPE_VIEW; // Render view
				$this->ResetAttrs();
				$this->RenderListRow();
				if ($HasParent)
					$XmlDoc->AddRow($this->TableVar);
				else
					$XmlDoc->AddRow();
				if ($ExportPageType == "view") {
					$XmlDoc->AddField('mfo_question_id', $this->mfo_question_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_pi_seq', $this->mfo_question_online_pi_seq->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_mfo_name', $this->mfo_question_online_mfo_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_pi_question', $this->mfo_question_online_pi_question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_expected_answer', $this->mfo_question_expected_answer->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_insert_question_mfo', $this->mfo_question_online_insert_question_mfo->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_insert_question_mfo_name_rep', $this->mfo_question_online_insert_question_mfo_name_rep->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_computation_du_cu_summary', $this->mfo_question_online_computation_du_cu_summary->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_computation_du_cu_summary_name', $this->mfo_question_online_computation_du_cu_summary_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_computation_denominator', $this->mfo_question_online_computation_denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_supporting_document_requirement', $this->mfo_question_supporting_document_requirement->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_expected_trend', $this->mfo_question_expected_trend->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_ask_y_n', $this->mfo_question_online_ask_y_n->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_pi_question_numerator', $this->mfo_question_online_pi_question_numerator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_pi_question_denominator', $this->mfo_question_online_pi_question_denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_expected_numerator', $this->mfo_question_expected_numerator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_expected_denominator', $this->mfo_question_expected_denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_mfo_name', $this->mfo_question_report_mfo_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_form_a_pi_question', $this->mfo_question_report_form_a_pi_question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_form_a_1_mfo', $this->mfo_question_report_form_a_1_mfo->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_form_a_1_sequence', $this->mfo_question_report_form_a_1_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_form_a_gaa_value', $this->mfo_question_report_form_a_gaa_value->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_no', $this->pi_no->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_sub', $this->pi_sub->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('iatf_2013', $this->iatf_2013->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('iatf_2014', $this->iatf_2014->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('mfo_question_id', $this->mfo_question_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_pi_seq', $this->mfo_question_online_pi_seq->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_mfo_name', $this->mfo_question_online_mfo_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_pi_question', $this->mfo_question_online_pi_question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_expected_answer', $this->mfo_question_expected_answer->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_insert_question_mfo', $this->mfo_question_online_insert_question_mfo->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_insert_question_mfo_name_rep', $this->mfo_question_online_insert_question_mfo_name_rep->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_computation_du_cu_summary', $this->mfo_question_online_computation_du_cu_summary->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_computation_du_cu_summary_name', $this->mfo_question_online_computation_du_cu_summary_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_computation_denominator', $this->mfo_question_online_computation_denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_supporting_document_requirement', $this->mfo_question_supporting_document_requirement->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_expected_trend', $this->mfo_question_expected_trend->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_ask_y_n', $this->mfo_question_online_ask_y_n->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_pi_question_numerator', $this->mfo_question_online_pi_question_numerator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_pi_question_denominator', $this->mfo_question_online_pi_question_denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_expected_numerator', $this->mfo_question_expected_numerator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_expected_denominator', $this->mfo_question_expected_denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_mfo_name', $this->mfo_question_report_mfo_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_form_a_pi_question', $this->mfo_question_report_form_a_pi_question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_form_a_1_mfo', $this->mfo_question_report_form_a_1_mfo->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_form_a_1_sequence', $this->mfo_question_report_form_a_1_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_form_a_gaa_value', $this->mfo_question_report_form_a_gaa_value->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_no', $this->pi_no->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_sub', $this->pi_sub->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('iatf_2013', $this->iatf_2013->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('iatf_2014', $this->iatf_2014->ExportValue($this->Export, $this->ExportOriginalValue));
				}
			}
			$Recordset->MoveNext();
		}
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	function ExportDocument(&$Doc, &$Recordset, $StartRec, $StopRec, $ExportPageType = "") {
		if (!$Recordset || !$Doc)
			return;

		// Write header
		$Doc->ExportTableHeader();
		if ($Doc->Horizontal) { // Horizontal format, write header
			$Doc->BeginExportRow();
			if ($ExportPageType == "view") {
				$Doc->ExportCaption($this->mfo_question_id);
				$Doc->ExportCaption($this->mfo_question_online_pi_seq);
				$Doc->ExportCaption($this->mfo_question_online_mfo_name);
				$Doc->ExportCaption($this->mfo_question_online_pi_question);
				$Doc->ExportCaption($this->mfo_question_expected_answer);
				$Doc->ExportCaption($this->mfo_question_online_insert_question_mfo);
				$Doc->ExportCaption($this->mfo_question_online_insert_question_mfo_name_rep);
				$Doc->ExportCaption($this->mfo_question_online_computation_du_cu_summary);
				$Doc->ExportCaption($this->mfo_question_online_computation_du_cu_summary_name);
				$Doc->ExportCaption($this->mfo_question_online_computation_denominator);
				$Doc->ExportCaption($this->mfo_question_supporting_document_requirement);
				$Doc->ExportCaption($this->mfo_question_expected_trend);
				$Doc->ExportCaption($this->mfo_question_online_ask_y_n);
				$Doc->ExportCaption($this->mfo_question_online_pi_question_numerator);
				$Doc->ExportCaption($this->mfo_question_online_pi_question_denominator);
				$Doc->ExportCaption($this->mfo_question_expected_numerator);
				$Doc->ExportCaption($this->mfo_question_expected_denominator);
				$Doc->ExportCaption($this->mfo_question_report_mfo_name);
				$Doc->ExportCaption($this->mfo_question_report_form_a_pi_question);
				$Doc->ExportCaption($this->mfo_question_report_form_a_1_mfo);
				$Doc->ExportCaption($this->mfo_question_report_form_a_1_sequence);
				$Doc->ExportCaption($this->mfo_question_report_form_a_gaa_value);
				$Doc->ExportCaption($this->pi_no);
				$Doc->ExportCaption($this->pi_sub);
				$Doc->ExportCaption($this->iatf_2013);
				$Doc->ExportCaption($this->iatf_2014);
			} else {
				$Doc->ExportCaption($this->mfo_question_id);
				$Doc->ExportCaption($this->mfo_question_online_pi_seq);
				$Doc->ExportCaption($this->mfo_question_online_mfo_name);
				$Doc->ExportCaption($this->mfo_question_online_pi_question);
				$Doc->ExportCaption($this->mfo_question_expected_answer);
				$Doc->ExportCaption($this->mfo_question_online_insert_question_mfo);
				$Doc->ExportCaption($this->mfo_question_online_insert_question_mfo_name_rep);
				$Doc->ExportCaption($this->mfo_question_online_computation_du_cu_summary);
				$Doc->ExportCaption($this->mfo_question_online_computation_du_cu_summary_name);
				$Doc->ExportCaption($this->mfo_question_online_computation_denominator);
				$Doc->ExportCaption($this->mfo_question_supporting_document_requirement);
				$Doc->ExportCaption($this->mfo_question_expected_trend);
				$Doc->ExportCaption($this->mfo_question_online_ask_y_n);
				$Doc->ExportCaption($this->mfo_question_online_pi_question_numerator);
				$Doc->ExportCaption($this->mfo_question_online_pi_question_denominator);
				$Doc->ExportCaption($this->mfo_question_expected_numerator);
				$Doc->ExportCaption($this->mfo_question_expected_denominator);
				$Doc->ExportCaption($this->mfo_question_report_mfo_name);
				$Doc->ExportCaption($this->mfo_question_report_form_a_pi_question);
				$Doc->ExportCaption($this->mfo_question_report_form_a_1_mfo);
				$Doc->ExportCaption($this->mfo_question_report_form_a_1_sequence);
				$Doc->ExportCaption($this->mfo_question_report_form_a_gaa_value);
				$Doc->ExportCaption($this->pi_no);
				$Doc->ExportCaption($this->pi_sub);
				$Doc->ExportCaption($this->iatf_2013);
				$Doc->ExportCaption($this->iatf_2014);
			}
			if ($this->Export == "pdf") {
				$Doc->EndExportRow(TRUE);
			} else {
				$Doc->EndExportRow();
			}
		}

		// Move to first record
		$RecCnt = $StartRec - 1;
		if (!$Recordset->EOF) {
			$Recordset->MoveFirst();
			if ($StartRec > 1)
				$Recordset->Move($StartRec - 1);
		}
		while (!$Recordset->EOF && $RecCnt < $StopRec) {
			$RecCnt++;
			if (intval($RecCnt) >= intval($StartRec)) {
				$RowCnt = intval($RecCnt) - intval($StartRec) + 1;

				// Page break for PDF
				if ($this->Export == "pdf" && $this->ExportPageBreakCount > 0) {
					if ($RowCnt > 1 && ($RowCnt - 1) % $this->ExportPageBreakCount == 0)
						$Doc->ExportPageBreak();
				}
				$this->LoadListRowValues($Recordset);

				// Render row
				$this->RowType = UP_ROWTYPE_VIEW; // Render view
				$this->ResetAttrs();
				$this->RenderListRow();
				$Doc->BeginExportRow($RowCnt); // Allow CSS styles if enabled
				if ($ExportPageType == "view") {
					$Doc->ExportField($this->mfo_question_id);
					$Doc->ExportField($this->mfo_question_online_pi_seq);
					$Doc->ExportField($this->mfo_question_online_mfo_name);
					$Doc->ExportField($this->mfo_question_online_pi_question);
					$Doc->ExportField($this->mfo_question_expected_answer);
					$Doc->ExportField($this->mfo_question_online_insert_question_mfo);
					$Doc->ExportField($this->mfo_question_online_insert_question_mfo_name_rep);
					$Doc->ExportField($this->mfo_question_online_computation_du_cu_summary);
					$Doc->ExportField($this->mfo_question_online_computation_du_cu_summary_name);
					$Doc->ExportField($this->mfo_question_online_computation_denominator);
					$Doc->ExportField($this->mfo_question_supporting_document_requirement);
					$Doc->ExportField($this->mfo_question_expected_trend);
					$Doc->ExportField($this->mfo_question_online_ask_y_n);
					$Doc->ExportField($this->mfo_question_online_pi_question_numerator);
					$Doc->ExportField($this->mfo_question_online_pi_question_denominator);
					$Doc->ExportField($this->mfo_question_expected_numerator);
					$Doc->ExportField($this->mfo_question_expected_denominator);
					$Doc->ExportField($this->mfo_question_report_mfo_name);
					$Doc->ExportField($this->mfo_question_report_form_a_pi_question);
					$Doc->ExportField($this->mfo_question_report_form_a_1_mfo);
					$Doc->ExportField($this->mfo_question_report_form_a_1_sequence);
					$Doc->ExportField($this->mfo_question_report_form_a_gaa_value);
					$Doc->ExportField($this->pi_no);
					$Doc->ExportField($this->pi_sub);
					$Doc->ExportField($this->iatf_2013);
					$Doc->ExportField($this->iatf_2014);
				} else {
					$Doc->ExportField($this->mfo_question_id);
					$Doc->ExportField($this->mfo_question_online_pi_seq);
					$Doc->ExportField($this->mfo_question_online_mfo_name);
					$Doc->ExportField($this->mfo_question_online_pi_question);
					$Doc->ExportField($this->mfo_question_expected_answer);
					$Doc->ExportField($this->mfo_question_online_insert_question_mfo);
					$Doc->ExportField($this->mfo_question_online_insert_question_mfo_name_rep);
					$Doc->ExportField($this->mfo_question_online_computation_du_cu_summary);
					$Doc->ExportField($this->mfo_question_online_computation_du_cu_summary_name);
					$Doc->ExportField($this->mfo_question_online_computation_denominator);
					$Doc->ExportField($this->mfo_question_supporting_document_requirement);
					$Doc->ExportField($this->mfo_question_expected_trend);
					$Doc->ExportField($this->mfo_question_online_ask_y_n);
					$Doc->ExportField($this->mfo_question_online_pi_question_numerator);
					$Doc->ExportField($this->mfo_question_online_pi_question_denominator);
					$Doc->ExportField($this->mfo_question_expected_numerator);
					$Doc->ExportField($this->mfo_question_expected_denominator);
					$Doc->ExportField($this->mfo_question_report_mfo_name);
					$Doc->ExportField($this->mfo_question_report_form_a_pi_question);
					$Doc->ExportField($this->mfo_question_report_form_a_1_mfo);
					$Doc->ExportField($this->mfo_question_report_form_a_1_sequence);
					$Doc->ExportField($this->mfo_question_report_form_a_gaa_value);
					$Doc->ExportField($this->pi_no);
					$Doc->ExportField($this->pi_sub);
					$Doc->ExportField($this->iatf_2013);
					$Doc->ExportField($this->iatf_2014);
				}
				$Doc->EndExportRow();
			}
			$Recordset->MoveNext();
		}
		$Doc->ExportTableFooter();
	}

	// Row styles
	function RowStyles() {
		$sAtt = "";
		$sStyle = trim($this->CssStyle);
		if (@$this->RowAttrs["style"] <> "")
			$sStyle .= " " . $this->RowAttrs["style"];
		$sClass = trim($this->CssClass);
		if (@$this->RowAttrs["class"] <> "")
			$sClass .= " " . $this->RowAttrs["class"];
		if (trim($sStyle) <> "")
			$sAtt .= " style=\"" . trim($sStyle) . "\"";
		if (trim($sClass) <> "")
			$sAtt .= " class=\"" . trim($sClass) . "\"";
		return $sAtt;
	}

	// Row attributes
	function RowAttributes() {
		$sAtt = $this->RowStyles();
		if ($this->Export == "") {
			foreach ($this->RowAttrs as $k => $v) {
				if ($k <> "class" && $k <> "style" && trim($v) <> "")
					$sAtt .= " " . $k . "=\"" . trim($v) . "\"";
			}
		}
		return $sAtt;
	}

	// Field object by name
	function fields($fldname) {
		return $this->fields[$fldname];
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here	
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here	
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here	
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here	
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>); 

	}
}
?>
