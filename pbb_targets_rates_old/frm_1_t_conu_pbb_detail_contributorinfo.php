<?php

// Global variable for table object
$frm_1_t_conu_pbb_detail_contributor = NULL;

//
// Table class for frm_1_t_conu_pbb_detail_contributor
//
class cfrm_1_t_conu_pbb_detail_contributor {
	var $TableVar = 'frm_1_t_conu_pbb_detail_contributor';
	var $TableName = 'frm_1_t_conu_pbb_detail_contributor';
	var $TableType = 'TABLE';
	var $pbb_contributor_id;
	var $pbb_delivery_id;
	var $unit_contributor_id;
	var $unit_delivery_id;
	var $focal_person_id;
	var $cu_sequence;
	var $CU;
	var $Delivery_Unit;
	var $Contributing_Unit;
	var $mfo_question_id;
	var $mfo_question_online_pi_seq;
	var $MFO;
	var $Question;
	var $mfo_question_online_insert_question_mfo;
	var $mfo_question_online_insert_question_mfo_name_rep;
	var $Applicable;
	var $Target;
	var $Target_Remarks;
	var $cutOffDate_id;
	var $t_startDate;
	var $t_cutOffDate_contributor;
	var $t_cutOffDate_delivery;
	var $t_cutOffDate_fp;
	var $Target_Cut2DOff_Date;
	var $Target_Message;
	var $pbb_contributor_derived_from_supporting_documents;
	var $Accomplishment;
	var $Numerator;
	var $Jan2DMar_28N29;
	var $Apr2DJun_28N29;
	var $Jul2DSep_28N29;
	var $Oct2DNov_28N29;
	var $Denominator;
	var $Jan2DMar_28D29;
	var $Apr2DJun_28D29;
	var $Jul2DSep_28D29;
	var $Oct2DNov_28D29;
	var $Accomplishment_Remarks;
	var $a_startDate;
	var $a_cutOffDate_contributor;
	var $a_cutOffDate_delivery;
	var $a_cutOffDate_fp;
	var $a_cutOffDate_remarks;
	var $pbb_contributor_a_rating;
	var $Below_10025_Performance_Rating;
	var $mfo_question_report_mfo_name;
	var $mfo_question_report_form_a_1_mfo;
	var $mfo_question_report_form_a_1_sequence;
	var $z10025_to_12025_Performance_Rating;
	var $Above_12025_Performance_Rating;
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
	function cfrm_1_t_conu_pbb_detail_contributor() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// pbb_contributor_id
		$this->pbb_contributor_id = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_pbb_contributor_id', 'pbb_contributor_id', '`pbb_contributor_id`', 3, -1, FALSE, '`pbb_contributor_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->pbb_contributor_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['pbb_contributor_id'] =& $this->pbb_contributor_id;

		// pbb_delivery_id
		$this->pbb_delivery_id = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_pbb_delivery_id', 'pbb_delivery_id', '`pbb_delivery_id`', 3, -1, FALSE, '`pbb_delivery_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->pbb_delivery_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['pbb_delivery_id'] =& $this->pbb_delivery_id;

		// unit_contributor_id
		$this->unit_contributor_id = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_unit_contributor_id', 'unit_contributor_id', '`unit_contributor_id`', 3, -1, FALSE, '`unit_contributor_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->unit_contributor_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['unit_contributor_id'] =& $this->unit_contributor_id;

		// unit_delivery_id
		$this->unit_delivery_id = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_unit_delivery_id', 'unit_delivery_id', '`unit_delivery_id`', 3, -1, FALSE, '`unit_delivery_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->unit_delivery_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['unit_delivery_id'] =& $this->unit_delivery_id;

		// focal_person_id
		$this->focal_person_id = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_focal_person_id', 'focal_person_id', '`focal_person_id`', 3, -1, FALSE, '`focal_person_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focal_person_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focal_person_id'] =& $this->focal_person_id;

		// cu_sequence
		$this->cu_sequence = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_cu_sequence', 'cu_sequence', '`cu_sequence`', 3, -1, FALSE, '`cu_sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cu_sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cu_sequence'] =& $this->cu_sequence;

		// CU
		$this->CU = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_CU', 'CU', '`CU`', 200, -1, FALSE, '`CU`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['CU'] =& $this->CU;

		// Delivery Unit
		$this->Delivery_Unit = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Delivery_Unit', 'Delivery Unit', '`Delivery Unit`', 200, -1, FALSE, '`Delivery Unit`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Delivery Unit'] =& $this->Delivery_Unit;

		// Contributing Unit
		$this->Contributing_Unit = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Contributing_Unit', 'Contributing Unit', '`Contributing Unit`', 200, -1, FALSE, '`Contributing Unit`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Contributing Unit'] =& $this->Contributing_Unit;

		// mfo_question_id
		$this->mfo_question_id = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_mfo_question_id', 'mfo_question_id', '`mfo_question_id`', 3, -1, FALSE, '`mfo_question_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_question_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_question_id'] =& $this->mfo_question_id;

		// mfo_question_online_pi_seq
		$this->mfo_question_online_pi_seq = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_mfo_question_online_pi_seq', 'mfo_question_online_pi_seq', '`mfo_question_online_pi_seq`', 3, -1, FALSE, '`mfo_question_online_pi_seq`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_question_online_pi_seq->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_question_online_pi_seq'] =& $this->mfo_question_online_pi_seq;

		// MFO
		$this->MFO = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_MFO', 'MFO', '`MFO`', 200, -1, FALSE, '`MFO`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['MFO'] =& $this->MFO;

		// Question
		$this->Question = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Question', 'Question', '`Question`', 200, -1, FALSE, '`Question`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Question'] =& $this->Question;

		// mfo_question_online_insert_question_mfo
		$this->mfo_question_online_insert_question_mfo = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_mfo_question_online_insert_question_mfo', 'mfo_question_online_insert_question_mfo', '`mfo_question_online_insert_question_mfo`', 3, -1, FALSE, '`mfo_question_online_insert_question_mfo`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_question_online_insert_question_mfo->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_question_online_insert_question_mfo'] =& $this->mfo_question_online_insert_question_mfo;

		// mfo_question_online_insert_question_mfo_name_rep
		$this->mfo_question_online_insert_question_mfo_name_rep = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_mfo_question_online_insert_question_mfo_name_rep', 'mfo_question_online_insert_question_mfo_name_rep', '`mfo_question_online_insert_question_mfo_name_rep`', 200, -1, FALSE, '`mfo_question_online_insert_question_mfo_name_rep`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_online_insert_question_mfo_name_rep'] =& $this->mfo_question_online_insert_question_mfo_name_rep;

		// Applicable
		$this->Applicable = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Applicable', 'Applicable', '`Applicable`', 200, -1, FALSE, '`Applicable`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Applicable'] =& $this->Applicable;

		// Target
		$this->Target = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Target', 'Target', '`Target`', 5, -1, FALSE, '`Target`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target'] =& $this->Target;

		// Target Remarks
		$this->Target_Remarks = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Target_Remarks', 'Target Remarks', '`Target Remarks`', 200, -1, FALSE, '`Target Remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Target Remarks'] =& $this->Target_Remarks;

		// cutOffDate_id
		$this->cutOffDate_id = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_cutOffDate_id', 'cutOffDate_id', '`cutOffDate_id`', 3, -1, FALSE, '`cutOffDate_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cutOffDate_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cutOffDate_id'] =& $this->cutOffDate_id;

		// t_startDate
		$this->t_startDate = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_t_startDate', 't_startDate', '`t_startDate`', 135, 6, FALSE, '`t_startDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_startDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['t_startDate'] =& $this->t_startDate;

		// t_cutOffDate_contributor
		$this->t_cutOffDate_contributor = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_t_cutOffDate_contributor', 't_cutOffDate_contributor', '`t_cutOffDate_contributor`', 135, 6, FALSE, '`t_cutOffDate_contributor`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_cutOffDate_contributor->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['t_cutOffDate_contributor'] =& $this->t_cutOffDate_contributor;

		// t_cutOffDate_delivery
		$this->t_cutOffDate_delivery = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_t_cutOffDate_delivery', 't_cutOffDate_delivery', '`t_cutOffDate_delivery`', 135, 6, FALSE, '`t_cutOffDate_delivery`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_cutOffDate_delivery->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['t_cutOffDate_delivery'] =& $this->t_cutOffDate_delivery;

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_t_cutOffDate_fp', 't_cutOffDate_fp', '`t_cutOffDate_fp`', 135, 6, FALSE, '`t_cutOffDate_fp`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_cutOffDate_fp->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['t_cutOffDate_fp'] =& $this->t_cutOffDate_fp;

		// Target Cut-Off Date
		$this->Target_Cut2DOff_Date = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Target_Cut2DOff_Date', 'Target Cut-Off Date', '`Target Cut-Off Date`', 200, -1, FALSE, '`Target Cut-Off Date`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Target Cut-Off Date'] =& $this->Target_Cut2DOff_Date;

		// Target Message
		$this->Target_Message = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Target_Message', 'Target Message', '`Target Message`', 200, -1, FALSE, '`Target Message`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Target Message'] =& $this->Target_Message;

		// pbb_contributor_derived_from_supporting_documents
		$this->pbb_contributor_derived_from_supporting_documents = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_pbb_contributor_derived_from_supporting_documents', 'pbb_contributor_derived_from_supporting_documents', '`pbb_contributor_derived_from_supporting_documents`', 200, -1, FALSE, '`pbb_contributor_derived_from_supporting_documents`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['pbb_contributor_derived_from_supporting_documents'] =& $this->pbb_contributor_derived_from_supporting_documents;

		// Accomplishment
		$this->Accomplishment = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Accomplishment', 'Accomplishment', '`Accomplishment`', 5, -1, FALSE, '`Accomplishment`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment'] =& $this->Accomplishment;

		// Numerator
		$this->Numerator = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Numerator', 'Numerator', '`Numerator`', 5, -1, FALSE, '`Numerator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Numerator->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Numerator'] =& $this->Numerator;

		// Jan-Mar (N)
		$this->Jan2DMar_28N29 = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Jan2DMar_28N29', 'Jan-Mar (N)', '`Jan-Mar (N)`', 5, -1, FALSE, '`Jan-Mar (N)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Jan2DMar_28N29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Jan-Mar (N)'] =& $this->Jan2DMar_28N29;

		// Apr-Jun (N)
		$this->Apr2DJun_28N29 = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Apr2DJun_28N29', 'Apr-Jun (N)', '`Apr-Jun (N)`', 5, -1, FALSE, '`Apr-Jun (N)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Apr2DJun_28N29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Apr-Jun (N)'] =& $this->Apr2DJun_28N29;

		// Jul-Sep (N)
		$this->Jul2DSep_28N29 = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Jul2DSep_28N29', 'Jul-Sep (N)', '`Jul-Sep (N)`', 5, -1, FALSE, '`Jul-Sep (N)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Jul2DSep_28N29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Jul-Sep (N)'] =& $this->Jul2DSep_28N29;

		// Oct-Nov (N)
		$this->Oct2DNov_28N29 = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Oct2DNov_28N29', 'Oct-Nov (N)', '`Oct-Nov (N)`', 5, -1, FALSE, '`Oct-Nov (N)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Oct2DNov_28N29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Oct-Nov (N)'] =& $this->Oct2DNov_28N29;

		// Denominator
		$this->Denominator = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Denominator', 'Denominator', '`Denominator`', 5, -1, FALSE, '`Denominator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Denominator->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Denominator'] =& $this->Denominator;

		// Jan-Mar (D)
		$this->Jan2DMar_28D29 = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Jan2DMar_28D29', 'Jan-Mar (D)', '`Jan-Mar (D)`', 5, -1, FALSE, '`Jan-Mar (D)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Jan2DMar_28D29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Jan-Mar (D)'] =& $this->Jan2DMar_28D29;

		// Apr-Jun (D)
		$this->Apr2DJun_28D29 = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Apr2DJun_28D29', 'Apr-Jun (D)', '`Apr-Jun (D)`', 5, -1, FALSE, '`Apr-Jun (D)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Apr2DJun_28D29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Apr-Jun (D)'] =& $this->Apr2DJun_28D29;

		// Jul-Sep (D)
		$this->Jul2DSep_28D29 = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Jul2DSep_28D29', 'Jul-Sep (D)', '`Jul-Sep (D)`', 5, -1, FALSE, '`Jul-Sep (D)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Jul2DSep_28D29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Jul-Sep (D)'] =& $this->Jul2DSep_28D29;

		// Oct-Nov (D)
		$this->Oct2DNov_28D29 = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Oct2DNov_28D29', 'Oct-Nov (D)', '`Oct-Nov (D)`', 5, -1, FALSE, '`Oct-Nov (D)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Oct2DNov_28D29->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Oct-Nov (D)'] =& $this->Oct2DNov_28D29;

		// Accomplishment Remarks
		$this->Accomplishment_Remarks = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Accomplishment_Remarks', 'Accomplishment Remarks', '`Accomplishment Remarks`', 200, -1, FALSE, '`Accomplishment Remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Accomplishment Remarks'] =& $this->Accomplishment_Remarks;

		// a_startDate
		$this->a_startDate = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_a_startDate', 'a_startDate', '`a_startDate`', 135, 6, FALSE, '`a_startDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_startDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['a_startDate'] =& $this->a_startDate;

		// a_cutOffDate_contributor
		$this->a_cutOffDate_contributor = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_a_cutOffDate_contributor', 'a_cutOffDate_contributor', '`a_cutOffDate_contributor`', 135, 6, FALSE, '`a_cutOffDate_contributor`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_cutOffDate_contributor->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['a_cutOffDate_contributor'] =& $this->a_cutOffDate_contributor;

		// a_cutOffDate_delivery
		$this->a_cutOffDate_delivery = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_a_cutOffDate_delivery', 'a_cutOffDate_delivery', '`a_cutOffDate_delivery`', 135, 6, FALSE, '`a_cutOffDate_delivery`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_cutOffDate_delivery->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['a_cutOffDate_delivery'] =& $this->a_cutOffDate_delivery;

		// a_cutOffDate_fp
		$this->a_cutOffDate_fp = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_a_cutOffDate_fp', 'a_cutOffDate_fp', '`a_cutOffDate_fp`', 135, 6, FALSE, '`a_cutOffDate_fp`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_cutOffDate_fp->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['a_cutOffDate_fp'] =& $this->a_cutOffDate_fp;

		// a_cutOffDate_remarks
		$this->a_cutOffDate_remarks = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_a_cutOffDate_remarks', 'a_cutOffDate_remarks', '`a_cutOffDate_remarks`', 200, -1, FALSE, '`a_cutOffDate_remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['a_cutOffDate_remarks'] =& $this->a_cutOffDate_remarks;

		// pbb_contributor_a_rating
		$this->pbb_contributor_a_rating = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_pbb_contributor_a_rating', 'pbb_contributor_a_rating', '`pbb_contributor_a_rating`', 5, -1, FALSE, '`pbb_contributor_a_rating`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->pbb_contributor_a_rating->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['pbb_contributor_a_rating'] =& $this->pbb_contributor_a_rating;

		// Below 100% Performance Rating
		$this->Below_10025_Performance_Rating = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Below_10025_Performance_Rating', 'Below 100% Performance Rating', '`Below 100% Performance Rating`', 5, -1, FALSE, '`Below 100% Performance Rating`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_10025_Performance_Rating->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 100% Performance Rating'] =& $this->Below_10025_Performance_Rating;

		// mfo_question_report_mfo_name
		$this->mfo_question_report_mfo_name = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_mfo_question_report_mfo_name', 'mfo_question_report_mfo_name', '`mfo_question_report_mfo_name`', 200, -1, FALSE, '`mfo_question_report_mfo_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_question_report_mfo_name'] =& $this->mfo_question_report_mfo_name;

		// mfo_question_report_form_a_1_mfo
		$this->mfo_question_report_form_a_1_mfo = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_mfo_question_report_form_a_1_mfo', 'mfo_question_report_form_a_1_mfo', '`mfo_question_report_form_a_1_mfo`', 3, -1, FALSE, '`mfo_question_report_form_a_1_mfo`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_question_report_form_a_1_mfo->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_question_report_form_a_1_mfo'] =& $this->mfo_question_report_form_a_1_mfo;

		// mfo_question_report_form_a_1_sequence
		$this->mfo_question_report_form_a_1_sequence = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_mfo_question_report_form_a_1_sequence', 'mfo_question_report_form_a_1_sequence', '`mfo_question_report_form_a_1_sequence`', 3, -1, FALSE, '`mfo_question_report_form_a_1_sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_question_report_form_a_1_sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_question_report_form_a_1_sequence'] =& $this->mfo_question_report_form_a_1_sequence;

		// 100% to 120% Performance Rating
		$this->z10025_to_12025_Performance_Rating = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_z10025_to_12025_Performance_Rating', '100% to 120% Performance Rating', '`100% to 120% Performance Rating`', 5, -1, FALSE, '`100% to 120% Performance Rating`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z10025_to_12025_Performance_Rating->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['100% to 120% Performance Rating'] =& $this->z10025_to_12025_Performance_Rating;

		// Above 120% Performance Rating
		$this->Above_12025_Performance_Rating = new cField('frm_1_t_conu_pbb_detail_contributor', 'frm_1_t_conu_pbb_detail_contributor', 'x_Above_12025_Performance_Rating', 'Above 120% Performance Rating', '`Above 120% Performance Rating`', 5, -1, FALSE, '`Above 120% Performance Rating`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Above_12025_Performance_Rating->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Above 120% Performance Rating'] =& $this->Above_12025_Performance_Rating;
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
		return "frm_1_t_conu_pbb_detail_contributor_Highlight";
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

	// Current master table name
	function getCurrentMasterTable() {
		return @$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_MASTER_TABLE];
	}

	function setCurrentMasterTable($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_MASTER_TABLE] = $v;
	}

	// Session master WHERE clause
	function getMasterFilter() {

		// Master filter
		$sMasterFilter = "";
		if ($this->getCurrentMasterTable() == "frm_1_t_conu_contributor_pi_status") {
			if ($this->unit_contributor_id->getSessionValue() <> "")
				$sMasterFilter .= "`unit_contributor_id`=" . up_QuotedValue($this->unit_contributor_id->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
			if ($this->mfo_question_online_insert_question_mfo->getSessionValue() <> "")
				$sMasterFilter .= " AND `MFO SEQ`=" . up_QuotedValue($this->mfo_question_online_insert_question_mfo->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sMasterFilter;
	}

	// Session detail WHERE clause
	function getDetailFilter() {

		// Detail filter
		$sDetailFilter = "";
		if ($this->getCurrentMasterTable() == "frm_1_t_conu_contributor_pi_status") {
			if ($this->unit_contributor_id->getSessionValue() <> "")
				$sDetailFilter .= "`unit_contributor_id`=" . up_QuotedValue($this->unit_contributor_id->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
			if ($this->mfo_question_online_insert_question_mfo->getSessionValue() <> "")
				$sDetailFilter .= " AND `mfo_question_online_insert_question_mfo`=" . up_QuotedValue($this->mfo_question_online_insert_question_mfo->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sDetailFilter;
	}

	// Master filter
	function SqlMasterFilter_frm_1_t_conu_contributor_pi_status() {
		return "`unit_contributor_id`=@unit_contributor_id@ AND `MFO SEQ`=@MFO_SEQ@";
	}

	// Detail filter
	function SqlDetailFilter_frm_1_t_conu_contributor_pi_status() {
		return "`unit_contributor_id`=@unit_contributor_id@ AND `mfo_question_online_insert_question_mfo`=@mfo_question_online_insert_question_mfo@";
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`frm_1_t_conu_pbb_detail_contributor`";
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
		global $Security;

		// Add User ID filter
		if (!$this->AllowAnonymousUser() && $Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $this->AddUserIDFilter($sFilter);
		}
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
		return "INSERT INTO `frm_1_t_conu_pbb_detail_contributor` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_1_t_conu_pbb_detail_contributor` SET ";
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
		$SQL = "DELETE FROM `frm_1_t_conu_pbb_detail_contributor` WHERE ";
		$SQL .= up_QuotedName('pbb_contributor_id') . '=' . up_QuotedValue($rs['pbb_contributor_id'], $this->pbb_contributor_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`pbb_contributor_id` = @pbb_contributor_id@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->pbb_contributor_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@pbb_contributor_id@", up_AdjustSql($this->pbb_contributor_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "frm_1_t_conu_pbb_detail_contributorlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_1_t_conu_pbb_detail_contributorlist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_1_t_conu_pbb_detail_contributorview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_1_t_conu_pbb_detail_contributoradd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_1_t_conu_pbb_detail_contributoredit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_1_t_conu_pbb_detail_contributoradd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_1_t_conu_pbb_detail_contributordelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->pbb_contributor_id->CurrentValue)) {
			$sUrl .= "pbb_contributor_id=" . urlencode($this->pbb_contributor_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_1_t_conu_pbb_detail_contributor" : "";
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
			$arKeys[] = @$_GET["pbb_contributor_id"]; // pbb_contributor_id

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
			$this->pbb_contributor_id->CurrentValue = $key;
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
		$this->pbb_contributor_id->setDbValue($rs->fields('pbb_contributor_id'));
		$this->pbb_delivery_id->setDbValue($rs->fields('pbb_delivery_id'));
		$this->unit_contributor_id->setDbValue($rs->fields('unit_contributor_id'));
		$this->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$this->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$this->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$this->CU->setDbValue($rs->fields('CU'));
		$this->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$this->Contributing_Unit->setDbValue($rs->fields('Contributing Unit'));
		$this->mfo_question_id->setDbValue($rs->fields('mfo_question_id'));
		$this->mfo_question_online_pi_seq->setDbValue($rs->fields('mfo_question_online_pi_seq'));
		$this->MFO->setDbValue($rs->fields('MFO'));
		$this->Question->setDbValue($rs->fields('Question'));
		$this->mfo_question_online_insert_question_mfo->setDbValue($rs->fields('mfo_question_online_insert_question_mfo'));
		$this->mfo_question_online_insert_question_mfo_name_rep->setDbValue($rs->fields('mfo_question_online_insert_question_mfo_name_rep'));
		$this->Applicable->setDbValue($rs->fields('Applicable'));
		$this->Target->setDbValue($rs->fields('Target'));
		$this->Target_Remarks->setDbValue($rs->fields('Target Remarks'));
		$this->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$this->t_startDate->setDbValue($rs->fields('t_startDate'));
		$this->t_cutOffDate_contributor->setDbValue($rs->fields('t_cutOffDate_contributor'));
		$this->t_cutOffDate_delivery->setDbValue($rs->fields('t_cutOffDate_delivery'));
		$this->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$this->Target_Cut2DOff_Date->setDbValue($rs->fields('Target Cut-Off Date'));
		$this->Target_Message->setDbValue($rs->fields('Target Message'));
		$this->pbb_contributor_derived_from_supporting_documents->setDbValue($rs->fields('pbb_contributor_derived_from_supporting_documents'));
		$this->Accomplishment->setDbValue($rs->fields('Accomplishment'));
		$this->Numerator->setDbValue($rs->fields('Numerator'));
		$this->Jan2DMar_28N29->setDbValue($rs->fields('Jan-Mar (N)'));
		$this->Apr2DJun_28N29->setDbValue($rs->fields('Apr-Jun (N)'));
		$this->Jul2DSep_28N29->setDbValue($rs->fields('Jul-Sep (N)'));
		$this->Oct2DNov_28N29->setDbValue($rs->fields('Oct-Nov (N)'));
		$this->Denominator->setDbValue($rs->fields('Denominator'));
		$this->Jan2DMar_28D29->setDbValue($rs->fields('Jan-Mar (D)'));
		$this->Apr2DJun_28D29->setDbValue($rs->fields('Apr-Jun (D)'));
		$this->Jul2DSep_28D29->setDbValue($rs->fields('Jul-Sep (D)'));
		$this->Oct2DNov_28D29->setDbValue($rs->fields('Oct-Nov (D)'));
		$this->Accomplishment_Remarks->setDbValue($rs->fields('Accomplishment Remarks'));
		$this->a_startDate->setDbValue($rs->fields('a_startDate'));
		$this->a_cutOffDate_contributor->setDbValue($rs->fields('a_cutOffDate_contributor'));
		$this->a_cutOffDate_delivery->setDbValue($rs->fields('a_cutOffDate_delivery'));
		$this->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$this->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
		$this->pbb_contributor_a_rating->setDbValue($rs->fields('pbb_contributor_a_rating'));
		$this->Below_10025_Performance_Rating->setDbValue($rs->fields('Below 100% Performance Rating'));
		$this->mfo_question_report_mfo_name->setDbValue($rs->fields('mfo_question_report_mfo_name'));
		$this->mfo_question_report_form_a_1_mfo->setDbValue($rs->fields('mfo_question_report_form_a_1_mfo'));
		$this->mfo_question_report_form_a_1_sequence->setDbValue($rs->fields('mfo_question_report_form_a_1_sequence'));
		$this->z10025_to_12025_Performance_Rating->setDbValue($rs->fields('100% to 120% Performance Rating'));
		$this->Above_12025_Performance_Rating->setDbValue($rs->fields('Above 120% Performance Rating'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// pbb_contributor_id
		// pbb_delivery_id
		// unit_contributor_id
		// unit_delivery_id
		// focal_person_id
		// cu_sequence
		// CU

		$this->CU->CellCssStyle = "white-space: nowrap;";

		// Delivery Unit
		$this->Delivery_Unit->CellCssStyle = "white-space: nowrap;";

		// Contributing Unit
		$this->Contributing_Unit->CellCssStyle = "white-space: nowrap;";

		// mfo_question_id
		// mfo_question_online_pi_seq
		// MFO

		$this->MFO->CellCssStyle = "white-space: nowrap;";

		// Question
		// mfo_question_online_insert_question_mfo
		// mfo_question_online_insert_question_mfo_name_rep
		// Applicable
		// Target
		// Target Remarks
		// cutOffDate_id
		// t_startDate
		// t_cutOffDate_contributor
		// t_cutOffDate_delivery
		// t_cutOffDate_fp
		// Target Cut-Off Date

		$this->Target_Cut2DOff_Date->CellCssStyle = "white-space: nowrap;";

		// Target Message
		$this->Target_Message->CellCssStyle = "white-space: nowrap;";

		// pbb_contributor_derived_from_supporting_documents
		// Accomplishment
		// Numerator
		// Jan-Mar (N)
		// Apr-Jun (N)
		// Jul-Sep (N)
		// Oct-Nov (N)
		// Denominator
		// Jan-Mar (D)
		// Apr-Jun (D)
		// Jul-Sep (D)
		// Oct-Nov (D)
		// Accomplishment Remarks
		// a_startDate
		// a_cutOffDate_contributor
		// a_cutOffDate_delivery
		// a_cutOffDate_fp
		// a_cutOffDate_remarks
		// pbb_contributor_a_rating
		// Below 100% Performance Rating
		// mfo_question_report_mfo_name
		// mfo_question_report_form_a_1_mfo
		// mfo_question_report_form_a_1_sequence
		// 100% to 120% Performance Rating
		// Above 120% Performance Rating
		// pbb_contributor_id

		$this->pbb_contributor_id->ViewValue = $this->pbb_contributor_id->CurrentValue;
		$this->pbb_contributor_id->ViewCustomAttributes = "";

		// pbb_delivery_id
		$this->pbb_delivery_id->ViewValue = $this->pbb_delivery_id->CurrentValue;
		$this->pbb_delivery_id->ViewCustomAttributes = "";

		// unit_contributor_id
		$this->unit_contributor_id->ViewValue = $this->unit_contributor_id->CurrentValue;
		$this->unit_contributor_id->ViewCustomAttributes = "";

		// unit_delivery_id
		$this->unit_delivery_id->ViewValue = $this->unit_delivery_id->CurrentValue;
		$this->unit_delivery_id->ViewCustomAttributes = "";

		// focal_person_id
		$this->focal_person_id->ViewValue = $this->focal_person_id->CurrentValue;
		$this->focal_person_id->ViewCustomAttributes = "";

		// cu_sequence
		$this->cu_sequence->ViewValue = $this->cu_sequence->CurrentValue;
		$this->cu_sequence->ViewCustomAttributes = "";

		// CU
		$this->CU->ViewValue = $this->CU->CurrentValue;
		$this->CU->ViewCustomAttributes = "";

		// Delivery Unit
		$this->Delivery_Unit->ViewValue = $this->Delivery_Unit->CurrentValue;
		$this->Delivery_Unit->ViewCustomAttributes = "";

		// Contributing Unit
		$this->Contributing_Unit->ViewValue = $this->Contributing_Unit->CurrentValue;
		$this->Contributing_Unit->ViewCustomAttributes = "";

		// mfo_question_id
		$this->mfo_question_id->ViewValue = $this->mfo_question_id->CurrentValue;
		$this->mfo_question_id->ViewCustomAttributes = "";

		// mfo_question_online_pi_seq
		$this->mfo_question_online_pi_seq->ViewValue = $this->mfo_question_online_pi_seq->CurrentValue;
		$this->mfo_question_online_pi_seq->ViewCustomAttributes = "";

		// MFO
		$this->MFO->ViewValue = $this->MFO->CurrentValue;
		$this->MFO->ViewCustomAttributes = "";

		// Question
		$this->Question->ViewValue = $this->Question->CurrentValue;
		$this->Question->ViewCustomAttributes = "";

		// mfo_question_online_insert_question_mfo
		$this->mfo_question_online_insert_question_mfo->ViewValue = $this->mfo_question_online_insert_question_mfo->CurrentValue;
		$this->mfo_question_online_insert_question_mfo->ViewCustomAttributes = "";

		// mfo_question_online_insert_question_mfo_name_rep
		$this->mfo_question_online_insert_question_mfo_name_rep->ViewValue = $this->mfo_question_online_insert_question_mfo_name_rep->CurrentValue;
		$this->mfo_question_online_insert_question_mfo_name_rep->ViewCustomAttributes = "";

		// Applicable
		if (strval($this->Applicable->CurrentValue) <> "") {
			switch ($this->Applicable->CurrentValue) {
				case "Y":
					$this->Applicable->ViewValue = $this->Applicable->FldTagCaption(1) <> "" ? $this->Applicable->FldTagCaption(1) : $this->Applicable->CurrentValue;
					break;
				case "N":
					$this->Applicable->ViewValue = $this->Applicable->FldTagCaption(2) <> "" ? $this->Applicable->FldTagCaption(2) : $this->Applicable->CurrentValue;
					break;
				default:
					$this->Applicable->ViewValue = $this->Applicable->CurrentValue;
			}
		} else {
			$this->Applicable->ViewValue = NULL;
		}
		$this->Applicable->ViewCustomAttributes = "";

		// Target
		$this->Target->ViewValue = $this->Target->CurrentValue;
		$this->Target->CssStyle = "font-weight:bold;text-align:right;";
		$this->Target->ViewCustomAttributes = "";

		// Target Remarks
		$this->Target_Remarks->ViewValue = $this->Target_Remarks->CurrentValue;
		$this->Target_Remarks->ViewCustomAttributes = "";

		// cutOffDate_id
		$this->cutOffDate_id->ViewValue = $this->cutOffDate_id->CurrentValue;
		$this->cutOffDate_id->ViewCustomAttributes = "";

		// t_startDate
		$this->t_startDate->ViewValue = $this->t_startDate->CurrentValue;
		$this->t_startDate->ViewValue = up_FormatDateTime($this->t_startDate->ViewValue, 6);
		$this->t_startDate->ViewCustomAttributes = "";

		// t_cutOffDate_contributor
		$this->t_cutOffDate_contributor->ViewValue = $this->t_cutOffDate_contributor->CurrentValue;
		$this->t_cutOffDate_contributor->ViewValue = up_FormatDateTime($this->t_cutOffDate_contributor->ViewValue, 6);
		$this->t_cutOffDate_contributor->ViewCustomAttributes = "";

		// t_cutOffDate_delivery
		$this->t_cutOffDate_delivery->ViewValue = $this->t_cutOffDate_delivery->CurrentValue;
		$this->t_cutOffDate_delivery->ViewValue = up_FormatDateTime($this->t_cutOffDate_delivery->ViewValue, 6);
		$this->t_cutOffDate_delivery->ViewCustomAttributes = "";

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp->ViewValue = $this->t_cutOffDate_fp->CurrentValue;
		$this->t_cutOffDate_fp->ViewValue = up_FormatDateTime($this->t_cutOffDate_fp->ViewValue, 6);
		$this->t_cutOffDate_fp->ViewCustomAttributes = "";

		// Target Cut-Off Date
		$this->Target_Cut2DOff_Date->ViewValue = $this->Target_Cut2DOff_Date->CurrentValue;
		$this->Target_Cut2DOff_Date->ViewCustomAttributes = "";

		// Target Message
		$this->Target_Message->ViewValue = $this->Target_Message->CurrentValue;
		$this->Target_Message->ViewCustomAttributes = "";

		// pbb_contributor_derived_from_supporting_documents
		$this->pbb_contributor_derived_from_supporting_documents->ViewValue = $this->pbb_contributor_derived_from_supporting_documents->CurrentValue;
		$this->pbb_contributor_derived_from_supporting_documents->ViewCustomAttributes = "";

		// Accomplishment
		$this->Accomplishment->ViewValue = $this->Accomplishment->CurrentValue;
		$this->Accomplishment->ViewCustomAttributes = "";

		// Numerator
		$this->Numerator->ViewValue = $this->Numerator->CurrentValue;
		$this->Numerator->ViewCustomAttributes = "";

		// Jan-Mar (N)
		$this->Jan2DMar_28N29->ViewValue = $this->Jan2DMar_28N29->CurrentValue;
		$this->Jan2DMar_28N29->ViewCustomAttributes = "";

		// Apr-Jun (N)
		$this->Apr2DJun_28N29->ViewValue = $this->Apr2DJun_28N29->CurrentValue;
		$this->Apr2DJun_28N29->ViewCustomAttributes = "";

		// Jul-Sep (N)
		$this->Jul2DSep_28N29->ViewValue = $this->Jul2DSep_28N29->CurrentValue;
		$this->Jul2DSep_28N29->ViewCustomAttributes = "";

		// Oct-Nov (N)
		$this->Oct2DNov_28N29->ViewValue = $this->Oct2DNov_28N29->CurrentValue;
		$this->Oct2DNov_28N29->ViewCustomAttributes = "";

		// Denominator
		$this->Denominator->ViewValue = $this->Denominator->CurrentValue;
		$this->Denominator->ViewCustomAttributes = "";

		// Jan-Mar (D)
		$this->Jan2DMar_28D29->ViewValue = $this->Jan2DMar_28D29->CurrentValue;
		$this->Jan2DMar_28D29->ViewCustomAttributes = "";

		// Apr-Jun (D)
		$this->Apr2DJun_28D29->ViewValue = $this->Apr2DJun_28D29->CurrentValue;
		$this->Apr2DJun_28D29->ViewCustomAttributes = "";

		// Jul-Sep (D)
		$this->Jul2DSep_28D29->ViewValue = $this->Jul2DSep_28D29->CurrentValue;
		$this->Jul2DSep_28D29->ViewCustomAttributes = "";

		// Oct-Nov (D)
		$this->Oct2DNov_28D29->ViewValue = $this->Oct2DNov_28D29->CurrentValue;
		$this->Oct2DNov_28D29->ViewCustomAttributes = "";

		// Accomplishment Remarks
		$this->Accomplishment_Remarks->ViewValue = $this->Accomplishment_Remarks->CurrentValue;
		$this->Accomplishment_Remarks->ViewCustomAttributes = "";

		// a_startDate
		$this->a_startDate->ViewValue = $this->a_startDate->CurrentValue;
		$this->a_startDate->ViewValue = up_FormatDateTime($this->a_startDate->ViewValue, 6);
		$this->a_startDate->ViewCustomAttributes = "";

		// a_cutOffDate_contributor
		$this->a_cutOffDate_contributor->ViewValue = $this->a_cutOffDate_contributor->CurrentValue;
		$this->a_cutOffDate_contributor->ViewValue = up_FormatDateTime($this->a_cutOffDate_contributor->ViewValue, 6);
		$this->a_cutOffDate_contributor->ViewCustomAttributes = "";

		// a_cutOffDate_delivery
		$this->a_cutOffDate_delivery->ViewValue = $this->a_cutOffDate_delivery->CurrentValue;
		$this->a_cutOffDate_delivery->ViewValue = up_FormatDateTime($this->a_cutOffDate_delivery->ViewValue, 6);
		$this->a_cutOffDate_delivery->ViewCustomAttributes = "";

		// a_cutOffDate_fp
		$this->a_cutOffDate_fp->ViewValue = $this->a_cutOffDate_fp->CurrentValue;
		$this->a_cutOffDate_fp->ViewValue = up_FormatDateTime($this->a_cutOffDate_fp->ViewValue, 6);
		$this->a_cutOffDate_fp->ViewCustomAttributes = "";

		// a_cutOffDate_remarks
		$this->a_cutOffDate_remarks->ViewValue = $this->a_cutOffDate_remarks->CurrentValue;
		$this->a_cutOffDate_remarks->ViewCustomAttributes = "";

		// pbb_contributor_a_rating
		$this->pbb_contributor_a_rating->ViewValue = $this->pbb_contributor_a_rating->CurrentValue;
		$this->pbb_contributor_a_rating->ViewCustomAttributes = "";

		// Below 100% Performance Rating
		$this->Below_10025_Performance_Rating->ViewValue = $this->Below_10025_Performance_Rating->CurrentValue;
		$this->Below_10025_Performance_Rating->ViewCustomAttributes = "";

		// mfo_question_report_mfo_name
		$this->mfo_question_report_mfo_name->ViewValue = $this->mfo_question_report_mfo_name->CurrentValue;
		$this->mfo_question_report_mfo_name->ViewCustomAttributes = "";

		// mfo_question_report_form_a_1_mfo
		$this->mfo_question_report_form_a_1_mfo->ViewValue = $this->mfo_question_report_form_a_1_mfo->CurrentValue;
		$this->mfo_question_report_form_a_1_mfo->ViewCustomAttributes = "";

		// mfo_question_report_form_a_1_sequence
		$this->mfo_question_report_form_a_1_sequence->ViewValue = $this->mfo_question_report_form_a_1_sequence->CurrentValue;
		$this->mfo_question_report_form_a_1_sequence->ViewCustomAttributes = "";

		// 100% to 120% Performance Rating
		$this->z10025_to_12025_Performance_Rating->ViewValue = $this->z10025_to_12025_Performance_Rating->CurrentValue;
		$this->z10025_to_12025_Performance_Rating->ViewCustomAttributes = "";

		// Above 120% Performance Rating
		$this->Above_12025_Performance_Rating->ViewValue = $this->Above_12025_Performance_Rating->CurrentValue;
		$this->Above_12025_Performance_Rating->ViewCustomAttributes = "";

		// pbb_contributor_id
		$this->pbb_contributor_id->LinkCustomAttributes = "";
		$this->pbb_contributor_id->HrefValue = "";
		$this->pbb_contributor_id->TooltipValue = "";

		// pbb_delivery_id
		$this->pbb_delivery_id->LinkCustomAttributes = "";
		$this->pbb_delivery_id->HrefValue = "";
		$this->pbb_delivery_id->TooltipValue = "";

		// unit_contributor_id
		$this->unit_contributor_id->LinkCustomAttributes = "";
		$this->unit_contributor_id->HrefValue = "";
		$this->unit_contributor_id->TooltipValue = "";

		// unit_delivery_id
		$this->unit_delivery_id->LinkCustomAttributes = "";
		$this->unit_delivery_id->HrefValue = "";
		$this->unit_delivery_id->TooltipValue = "";

		// focal_person_id
		$this->focal_person_id->LinkCustomAttributes = "";
		$this->focal_person_id->HrefValue = "";
		$this->focal_person_id->TooltipValue = "";

		// cu_sequence
		$this->cu_sequence->LinkCustomAttributes = "";
		$this->cu_sequence->HrefValue = "";
		$this->cu_sequence->TooltipValue = "";

		// CU
		$this->CU->LinkCustomAttributes = "";
		$this->CU->HrefValue = "";
		$this->CU->TooltipValue = "";

		// Delivery Unit
		$this->Delivery_Unit->LinkCustomAttributes = "";
		$this->Delivery_Unit->HrefValue = "";
		$this->Delivery_Unit->TooltipValue = "";

		// Contributing Unit
		$this->Contributing_Unit->LinkCustomAttributes = "";
		$this->Contributing_Unit->HrefValue = "";
		$this->Contributing_Unit->TooltipValue = "";

		// mfo_question_id
		$this->mfo_question_id->LinkCustomAttributes = "";
		$this->mfo_question_id->HrefValue = "";
		$this->mfo_question_id->TooltipValue = "";

		// mfo_question_online_pi_seq
		$this->mfo_question_online_pi_seq->LinkCustomAttributes = "";
		$this->mfo_question_online_pi_seq->HrefValue = "";
		$this->mfo_question_online_pi_seq->TooltipValue = "";

		// MFO
		$this->MFO->LinkCustomAttributes = "";
		$this->MFO->HrefValue = "";
		$this->MFO->TooltipValue = "";

		// Question
		$this->Question->LinkCustomAttributes = "";
		$this->Question->HrefValue = "";
		$this->Question->TooltipValue = "";

		// mfo_question_online_insert_question_mfo
		$this->mfo_question_online_insert_question_mfo->LinkCustomAttributes = "";
		$this->mfo_question_online_insert_question_mfo->HrefValue = "";
		$this->mfo_question_online_insert_question_mfo->TooltipValue = "";

		// mfo_question_online_insert_question_mfo_name_rep
		$this->mfo_question_online_insert_question_mfo_name_rep->LinkCustomAttributes = "";
		$this->mfo_question_online_insert_question_mfo_name_rep->HrefValue = "";
		$this->mfo_question_online_insert_question_mfo_name_rep->TooltipValue = "";

		// Applicable
		$this->Applicable->LinkCustomAttributes = "";
		$this->Applicable->HrefValue = "";
		$this->Applicable->TooltipValue = "";

		// Target
		$this->Target->LinkCustomAttributes = "";
		$this->Target->HrefValue = "";
		$this->Target->TooltipValue = "";

		// Target Remarks
		$this->Target_Remarks->LinkCustomAttributes = "";
		$this->Target_Remarks->HrefValue = "";
		$this->Target_Remarks->TooltipValue = "";

		// cutOffDate_id
		$this->cutOffDate_id->LinkCustomAttributes = "";
		$this->cutOffDate_id->HrefValue = "";
		$this->cutOffDate_id->TooltipValue = "";

		// t_startDate
		$this->t_startDate->LinkCustomAttributes = "";
		$this->t_startDate->HrefValue = "";
		$this->t_startDate->TooltipValue = "";

		// t_cutOffDate_contributor
		$this->t_cutOffDate_contributor->LinkCustomAttributes = "";
		$this->t_cutOffDate_contributor->HrefValue = "";
		$this->t_cutOffDate_contributor->TooltipValue = "";

		// t_cutOffDate_delivery
		$this->t_cutOffDate_delivery->LinkCustomAttributes = "";
		$this->t_cutOffDate_delivery->HrefValue = "";
		$this->t_cutOffDate_delivery->TooltipValue = "";

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp->LinkCustomAttributes = "";
		$this->t_cutOffDate_fp->HrefValue = "";
		$this->t_cutOffDate_fp->TooltipValue = "";

		// Target Cut-Off Date
		$this->Target_Cut2DOff_Date->LinkCustomAttributes = "";
		$this->Target_Cut2DOff_Date->HrefValue = "";
		$this->Target_Cut2DOff_Date->TooltipValue = "";

		// Target Message
		$this->Target_Message->LinkCustomAttributes = "";
		$this->Target_Message->HrefValue = "";
		$this->Target_Message->TooltipValue = "";

		// pbb_contributor_derived_from_supporting_documents
		$this->pbb_contributor_derived_from_supporting_documents->LinkCustomAttributes = "";
		$this->pbb_contributor_derived_from_supporting_documents->HrefValue = "";
		$this->pbb_contributor_derived_from_supporting_documents->TooltipValue = "";

		// Accomplishment
		$this->Accomplishment->LinkCustomAttributes = "";
		$this->Accomplishment->HrefValue = "";
		$this->Accomplishment->TooltipValue = "";

		// Numerator
		$this->Numerator->LinkCustomAttributes = "";
		$this->Numerator->HrefValue = "";
		$this->Numerator->TooltipValue = "";

		// Jan-Mar (N)
		$this->Jan2DMar_28N29->LinkCustomAttributes = "";
		$this->Jan2DMar_28N29->HrefValue = "";
		$this->Jan2DMar_28N29->TooltipValue = "";

		// Apr-Jun (N)
		$this->Apr2DJun_28N29->LinkCustomAttributes = "";
		$this->Apr2DJun_28N29->HrefValue = "";
		$this->Apr2DJun_28N29->TooltipValue = "";

		// Jul-Sep (N)
		$this->Jul2DSep_28N29->LinkCustomAttributes = "";
		$this->Jul2DSep_28N29->HrefValue = "";
		$this->Jul2DSep_28N29->TooltipValue = "";

		// Oct-Nov (N)
		$this->Oct2DNov_28N29->LinkCustomAttributes = "";
		$this->Oct2DNov_28N29->HrefValue = "";
		$this->Oct2DNov_28N29->TooltipValue = "";

		// Denominator
		$this->Denominator->LinkCustomAttributes = "";
		$this->Denominator->HrefValue = "";
		$this->Denominator->TooltipValue = "";

		// Jan-Mar (D)
		$this->Jan2DMar_28D29->LinkCustomAttributes = "";
		$this->Jan2DMar_28D29->HrefValue = "";
		$this->Jan2DMar_28D29->TooltipValue = "";

		// Apr-Jun (D)
		$this->Apr2DJun_28D29->LinkCustomAttributes = "";
		$this->Apr2DJun_28D29->HrefValue = "";
		$this->Apr2DJun_28D29->TooltipValue = "";

		// Jul-Sep (D)
		$this->Jul2DSep_28D29->LinkCustomAttributes = "";
		$this->Jul2DSep_28D29->HrefValue = "";
		$this->Jul2DSep_28D29->TooltipValue = "";

		// Oct-Nov (D)
		$this->Oct2DNov_28D29->LinkCustomAttributes = "";
		$this->Oct2DNov_28D29->HrefValue = "";
		$this->Oct2DNov_28D29->TooltipValue = "";

		// Accomplishment Remarks
		$this->Accomplishment_Remarks->LinkCustomAttributes = "";
		$this->Accomplishment_Remarks->HrefValue = "";
		$this->Accomplishment_Remarks->TooltipValue = "";

		// a_startDate
		$this->a_startDate->LinkCustomAttributes = "";
		$this->a_startDate->HrefValue = "";
		$this->a_startDate->TooltipValue = "";

		// a_cutOffDate_contributor
		$this->a_cutOffDate_contributor->LinkCustomAttributes = "";
		$this->a_cutOffDate_contributor->HrefValue = "";
		$this->a_cutOffDate_contributor->TooltipValue = "";

		// a_cutOffDate_delivery
		$this->a_cutOffDate_delivery->LinkCustomAttributes = "";
		$this->a_cutOffDate_delivery->HrefValue = "";
		$this->a_cutOffDate_delivery->TooltipValue = "";

		// a_cutOffDate_fp
		$this->a_cutOffDate_fp->LinkCustomAttributes = "";
		$this->a_cutOffDate_fp->HrefValue = "";
		$this->a_cutOffDate_fp->TooltipValue = "";

		// a_cutOffDate_remarks
		$this->a_cutOffDate_remarks->LinkCustomAttributes = "";
		$this->a_cutOffDate_remarks->HrefValue = "";
		$this->a_cutOffDate_remarks->TooltipValue = "";

		// pbb_contributor_a_rating
		$this->pbb_contributor_a_rating->LinkCustomAttributes = "";
		$this->pbb_contributor_a_rating->HrefValue = "";
		$this->pbb_contributor_a_rating->TooltipValue = "";

		// Below 100% Performance Rating
		$this->Below_10025_Performance_Rating->LinkCustomAttributes = "";
		$this->Below_10025_Performance_Rating->HrefValue = "";
		$this->Below_10025_Performance_Rating->TooltipValue = "";

		// mfo_question_report_mfo_name
		$this->mfo_question_report_mfo_name->LinkCustomAttributes = "";
		$this->mfo_question_report_mfo_name->HrefValue = "";
		$this->mfo_question_report_mfo_name->TooltipValue = "";

		// mfo_question_report_form_a_1_mfo
		$this->mfo_question_report_form_a_1_mfo->LinkCustomAttributes = "";
		$this->mfo_question_report_form_a_1_mfo->HrefValue = "";
		$this->mfo_question_report_form_a_1_mfo->TooltipValue = "";

		// mfo_question_report_form_a_1_sequence
		$this->mfo_question_report_form_a_1_sequence->LinkCustomAttributes = "";
		$this->mfo_question_report_form_a_1_sequence->HrefValue = "";
		$this->mfo_question_report_form_a_1_sequence->TooltipValue = "";

		// 100% to 120% Performance Rating
		$this->z10025_to_12025_Performance_Rating->LinkCustomAttributes = "";
		$this->z10025_to_12025_Performance_Rating->HrefValue = "";
		$this->z10025_to_12025_Performance_Rating->TooltipValue = "";

		// Above 120% Performance Rating
		$this->Above_12025_Performance_Rating->LinkCustomAttributes = "";
		$this->Above_12025_Performance_Rating->HrefValue = "";
		$this->Above_12025_Performance_Rating->TooltipValue = "";

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
					$XmlDoc->AddField('pbb_contributor_id', $this->pbb_contributor_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pbb_delivery_id', $this->pbb_delivery_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('unit_contributor_id', $this->unit_contributor_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('unit_delivery_id', $this->unit_delivery_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focal_person_id', $this->focal_person_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_sequence', $this->cu_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('CU', $this->CU->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Delivery_Unit', $this->Delivery_Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Contributing_Unit', $this->Contributing_Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_id', $this->mfo_question_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_pi_seq', $this->mfo_question_online_pi_seq->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Question', $this->Question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_insert_question_mfo', $this->mfo_question_online_insert_question_mfo->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_online_insert_question_mfo_name_rep', $this->mfo_question_online_insert_question_mfo_name_rep->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Applicable', $this->Applicable->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target', $this->Target->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Remarks', $this->Target_Remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cutOffDate_id', $this->cutOffDate_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_startDate', $this->t_startDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_contributor', $this->t_cutOffDate_contributor->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_delivery', $this->t_cutOffDate_delivery->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_fp', $this->t_cutOffDate_fp->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Cut2DOff_Date', $this->Target_Cut2DOff_Date->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Message', $this->Target_Message->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pbb_contributor_derived_from_supporting_documents', $this->pbb_contributor_derived_from_supporting_documents->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment', $this->Accomplishment->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Numerator', $this->Numerator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Jan2DMar_28N29', $this->Jan2DMar_28N29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Apr2DJun_28N29', $this->Apr2DJun_28N29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Jul2DSep_28N29', $this->Jul2DSep_28N29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Oct2DNov_28N29', $this->Oct2DNov_28N29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Denominator', $this->Denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Jan2DMar_28D29', $this->Jan2DMar_28D29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Apr2DJun_28D29', $this->Apr2DJun_28D29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Jul2DSep_28D29', $this->Jul2DSep_28D29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Oct2DNov_28D29', $this->Oct2DNov_28D29->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_Remarks', $this->Accomplishment_Remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_startDate', $this->a_startDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate_contributor', $this->a_cutOffDate_contributor->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate_delivery', $this->a_cutOffDate_delivery->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate_fp', $this->a_cutOffDate_fp->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate_remarks', $this->a_cutOffDate_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pbb_contributor_a_rating', $this->pbb_contributor_a_rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_10025_Performance_Rating', $this->Below_10025_Performance_Rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_mfo_name', $this->mfo_question_report_mfo_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_form_a_1_mfo', $this->mfo_question_report_form_a_1_mfo->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_question_report_form_a_1_sequence', $this->mfo_question_report_form_a_1_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z10025_to_12025_Performance_Rating', $this->z10025_to_12025_Performance_Rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Above_12025_Performance_Rating', $this->Above_12025_Performance_Rating->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('Delivery_Unit', $this->Delivery_Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Contributing_Unit', $this->Contributing_Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Question', $this->Question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Applicable', $this->Applicable->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target', $this->Target->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Remarks', $this->Target_Remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Cut2DOff_Date', $this->Target_Cut2DOff_Date->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_Message', $this->Target_Message->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->pbb_contributor_id);
				$Doc->ExportCaption($this->pbb_delivery_id);
				$Doc->ExportCaption($this->unit_contributor_id);
				$Doc->ExportCaption($this->unit_delivery_id);
				$Doc->ExportCaption($this->focal_person_id);
				$Doc->ExportCaption($this->cu_sequence);
				$Doc->ExportCaption($this->CU);
				$Doc->ExportCaption($this->Delivery_Unit);
				$Doc->ExportCaption($this->Contributing_Unit);
				$Doc->ExportCaption($this->mfo_question_id);
				$Doc->ExportCaption($this->mfo_question_online_pi_seq);
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->Question);
				$Doc->ExportCaption($this->mfo_question_online_insert_question_mfo);
				$Doc->ExportCaption($this->mfo_question_online_insert_question_mfo_name_rep);
				$Doc->ExportCaption($this->Applicable);
				$Doc->ExportCaption($this->Target);
				$Doc->ExportCaption($this->Target_Remarks);
				$Doc->ExportCaption($this->cutOffDate_id);
				$Doc->ExportCaption($this->t_startDate);
				$Doc->ExportCaption($this->t_cutOffDate_contributor);
				$Doc->ExportCaption($this->t_cutOffDate_delivery);
				$Doc->ExportCaption($this->t_cutOffDate_fp);
				$Doc->ExportCaption($this->Target_Cut2DOff_Date);
				$Doc->ExportCaption($this->Target_Message);
				$Doc->ExportCaption($this->pbb_contributor_derived_from_supporting_documents);
				$Doc->ExportCaption($this->Accomplishment);
				$Doc->ExportCaption($this->Numerator);
				$Doc->ExportCaption($this->Jan2DMar_28N29);
				$Doc->ExportCaption($this->Apr2DJun_28N29);
				$Doc->ExportCaption($this->Jul2DSep_28N29);
				$Doc->ExportCaption($this->Oct2DNov_28N29);
				$Doc->ExportCaption($this->Denominator);
				$Doc->ExportCaption($this->Jan2DMar_28D29);
				$Doc->ExportCaption($this->Apr2DJun_28D29);
				$Doc->ExportCaption($this->Jul2DSep_28D29);
				$Doc->ExportCaption($this->Oct2DNov_28D29);
				$Doc->ExportCaption($this->Accomplishment_Remarks);
				$Doc->ExportCaption($this->a_startDate);
				$Doc->ExportCaption($this->a_cutOffDate_contributor);
				$Doc->ExportCaption($this->a_cutOffDate_delivery);
				$Doc->ExportCaption($this->a_cutOffDate_fp);
				$Doc->ExportCaption($this->a_cutOffDate_remarks);
				$Doc->ExportCaption($this->pbb_contributor_a_rating);
				$Doc->ExportCaption($this->Below_10025_Performance_Rating);
				$Doc->ExportCaption($this->mfo_question_report_mfo_name);
				$Doc->ExportCaption($this->mfo_question_report_form_a_1_mfo);
				$Doc->ExportCaption($this->mfo_question_report_form_a_1_sequence);
				$Doc->ExportCaption($this->z10025_to_12025_Performance_Rating);
				$Doc->ExportCaption($this->Above_12025_Performance_Rating);
			} else {
				$Doc->ExportCaption($this->Delivery_Unit);
				$Doc->ExportCaption($this->Contributing_Unit);
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->Question);
				$Doc->ExportCaption($this->Applicable);
				$Doc->ExportCaption($this->Target);
				$Doc->ExportCaption($this->Target_Remarks);
				$Doc->ExportCaption($this->Target_Cut2DOff_Date);
				$Doc->ExportCaption($this->Target_Message);
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
					$Doc->ExportField($this->pbb_contributor_id);
					$Doc->ExportField($this->pbb_delivery_id);
					$Doc->ExportField($this->unit_contributor_id);
					$Doc->ExportField($this->unit_delivery_id);
					$Doc->ExportField($this->focal_person_id);
					$Doc->ExportField($this->cu_sequence);
					$Doc->ExportField($this->CU);
					$Doc->ExportField($this->Delivery_Unit);
					$Doc->ExportField($this->Contributing_Unit);
					$Doc->ExportField($this->mfo_question_id);
					$Doc->ExportField($this->mfo_question_online_pi_seq);
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->Question);
					$Doc->ExportField($this->mfo_question_online_insert_question_mfo);
					$Doc->ExportField($this->mfo_question_online_insert_question_mfo_name_rep);
					$Doc->ExportField($this->Applicable);
					$Doc->ExportField($this->Target);
					$Doc->ExportField($this->Target_Remarks);
					$Doc->ExportField($this->cutOffDate_id);
					$Doc->ExportField($this->t_startDate);
					$Doc->ExportField($this->t_cutOffDate_contributor);
					$Doc->ExportField($this->t_cutOffDate_delivery);
					$Doc->ExportField($this->t_cutOffDate_fp);
					$Doc->ExportField($this->Target_Cut2DOff_Date);
					$Doc->ExportField($this->Target_Message);
					$Doc->ExportField($this->pbb_contributor_derived_from_supporting_documents);
					$Doc->ExportField($this->Accomplishment);
					$Doc->ExportField($this->Numerator);
					$Doc->ExportField($this->Jan2DMar_28N29);
					$Doc->ExportField($this->Apr2DJun_28N29);
					$Doc->ExportField($this->Jul2DSep_28N29);
					$Doc->ExportField($this->Oct2DNov_28N29);
					$Doc->ExportField($this->Denominator);
					$Doc->ExportField($this->Jan2DMar_28D29);
					$Doc->ExportField($this->Apr2DJun_28D29);
					$Doc->ExportField($this->Jul2DSep_28D29);
					$Doc->ExportField($this->Oct2DNov_28D29);
					$Doc->ExportField($this->Accomplishment_Remarks);
					$Doc->ExportField($this->a_startDate);
					$Doc->ExportField($this->a_cutOffDate_contributor);
					$Doc->ExportField($this->a_cutOffDate_delivery);
					$Doc->ExportField($this->a_cutOffDate_fp);
					$Doc->ExportField($this->a_cutOffDate_remarks);
					$Doc->ExportField($this->pbb_contributor_a_rating);
					$Doc->ExportField($this->Below_10025_Performance_Rating);
					$Doc->ExportField($this->mfo_question_report_mfo_name);
					$Doc->ExportField($this->mfo_question_report_form_a_1_mfo);
					$Doc->ExportField($this->mfo_question_report_form_a_1_sequence);
					$Doc->ExportField($this->z10025_to_12025_Performance_Rating);
					$Doc->ExportField($this->Above_12025_Performance_Rating);
				} else {
					$Doc->ExportField($this->Delivery_Unit);
					$Doc->ExportField($this->Contributing_Unit);
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->Question);
					$Doc->ExportField($this->Applicable);
					$Doc->ExportField($this->Target);
					$Doc->ExportField($this->Target_Remarks);
					$Doc->ExportField($this->Target_Cut2DOff_Date);
					$Doc->ExportField($this->Target_Message);
				}
				$Doc->EndExportRow();
			}
			$Recordset->MoveNext();
		}
		$Doc->ExportTableFooter();
	}

	// Add User ID filter
	function AddUserIDFilter($sFilter) {
		global $Security;
		if (!$Security->IsAdmin()) {
			$sFilterWrk = $Security->UserIDList();
			if ($sFilterWrk <> "")
				$sFilterWrk = '`unit_contributor_id` IN (' . $sFilterWrk . ')';
			up_AddFilter($sFilterWrk, $sFilter);
			return $sFilterWrk;
		} else {
			return $sFilter;
		}
	}

	// User ID subquery
	function GetUserIDSubquery(&$fld, &$masterfld) {
		global $conn;
		$sWrk = "";
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `frm_1_t_conu_pbb_detail_contributor` WHERE " . $this->AddUserIDFilter("");

		// List all values
		if ($rs = $conn->Execute($sSql)) {
			while (!$rs->EOF) {
				if ($sWrk <> "") $sWrk .= ",";
				$sWrk .= up_QuotedValue($rs->fields[0], $masterfld->FldDataType);
				$rs->MoveNext();
			}
			$rs->Close();
		}
		if ($sWrk <> "") {
			$sWrk = $fld->FldExpression . " IN (" . $sWrk . ")";
		}
		return $sWrk;
	}

	// Add master User ID filter
	function AddMasterUserIDFilter($sFilter, $sCurrentMasterTable) {
		$sFilterWrk = $sFilter;
		if ($sCurrentMasterTable == "frm_1_t_conu_contributor_pi_status") {
			$sFilterWrk = $GLOBALS["frm_1_t_conu_contributor_pi_status"]->AddUserIDFilter($sFilterWrk);
		}
		return $sFilterWrk;
	}

	// Add detail User ID filter
	function AddDetailUserIDFilter($sFilter, $sCurrentMasterTable) {
		$sFilterWrk = $sFilter;
		if ($sCurrentMasterTable == "frm_1_t_conu_contributor_pi_status") {
			$sSubqueryWrk = $GLOBALS["frm_1_t_conu_contributor_pi_status"]->GetUserIDSubquery($this->unit_contributor_id, $GLOBALS["frm_1_t_conu_contributor_pi_status"]->unit_contributor_id);
			if ($sSubqueryWrk <> "") {
				if ($sFilterWrk <> "") {
					$sFilterWrk = "($sFilterWrk) AND ($sSubqueryWrk)";
				} else {
					$sFilterWrk = $sSubqueryWrk;
				}
			}
			$sSubqueryWrk = $GLOBALS["frm_1_t_conu_contributor_pi_status"]->GetUserIDSubquery($this->mfo_question_online_insert_question_mfo, $GLOBALS["frm_1_t_conu_contributor_pi_status"]->MFO_SEQ);
			if ($sSubqueryWrk <> "") {
				if ($sFilterWrk <> "") {
					$sFilterWrk = "($sFilterWrk) AND ($sSubqueryWrk)";
				} else {
					$sFilterWrk = $sSubqueryWrk;
				}
			}
		}
		return $sFilterWrk;
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
