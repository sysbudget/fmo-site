<?php

// Global variable for table object
$frm_u_pbb_detail_target = NULL;

//
// Table class for frm_u_pbb_detail_target
//
class cfrm_u_pbb_detail_target {
	var $TableVar = 'frm_u_pbb_detail_target';
	var $TableName = 'frm_u_pbb_detail_target';
	var $TableType = 'TABLE';
	var $pbb_id;
	var $applicable;
	var $units_id;
	var $cu_sequence;
	var $cu_short_name;
	var $cu_unit_name;
	var $focal_person_id;
	var $mfo_id;
	var $mfo_sequence;
	var $mfo;
	var $pi_no;
	var $pi_sub;
	var $mfo_name;
	var $pi_question;
	var $target;
	var $t_numerator;
	var $t_numerator_qtr1;
	var $t_numerator_qtr2;
	var $t_numerator_qtr3;
	var $t_numerator_qtr4;
	var $t_denominator;
	var $t_denominator_qtr1;
	var $t_denominator_qtr2;
	var $t_denominator_qtr3;
	var $t_denominator_qtr4;
	var $t_remarks;
	var $t_cutOffDate;
	var $t_cutOffDate_remarks;
	var $accomplishment;
	var $a_numerator;
	var $a_numerator_qtr1;
	var $a_numerator_qtr2;
	var $a_numerator_qtr3;
	var $a_numerator_qtr4;
	var $a_denominator;
	var $a_denominator_qtr1;
	var $a_denominator_qtr2;
	var $a_denominator_qtr3;
	var $a_denominator_qtr4;
	var $a_supporting_docs;
	var $a_supporting_docs_qtr1;
	var $a_supporting_docs_qtr2;
	var $a_supporting_docs_qtr3;
	var $a_supporting_docs_qtr4;
	var $a_remarks;
	var $a_cutOffDate;
	var $a_cutOffDate_remarks;
	var $a_rating;
	var $a_rating_above_90;
	var $a_rating_below_90;
	var $a_supporting_docs_comparison;
	var $cutOffDate_id;
	var $mfo_name_rep;
	var $t_cutOffDate_fp;
	var $a_cutOffDate_fp;
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
	function cfrm_u_pbb_detail_target() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// pbb_id
		$this->pbb_id = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_pbb_id', 'pbb_id', '`pbb_id`', 3, -1, FALSE, '`pbb_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->pbb_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['pbb_id'] =& $this->pbb_id;

		// applicable
		$this->applicable = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_applicable', 'applicable', '`applicable`', 200, -1, FALSE, '`applicable`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['applicable'] =& $this->applicable;

		// units_id
		$this->units_id = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_units_id', 'units_id', '`units_id`', 3, -1, FALSE, '`units_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->units_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['units_id'] =& $this->units_id;

		// cu_sequence
		$this->cu_sequence = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_cu_sequence', 'cu_sequence', '`cu_sequence`', 3, -1, FALSE, '`cu_sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cu_sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cu_sequence'] =& $this->cu_sequence;

		// cu_short_name
		$this->cu_short_name = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_cu_short_name', 'cu_short_name', '`cu_short_name`', 200, -1, FALSE, '`cu_short_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['cu_short_name'] =& $this->cu_short_name;

		// cu_unit_name
		$this->cu_unit_name = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_cu_unit_name', 'cu_unit_name', '`cu_unit_name`', 200, -1, FALSE, '`cu_unit_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['cu_unit_name'] =& $this->cu_unit_name;

		// focal_person_id
		$this->focal_person_id = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_focal_person_id', 'focal_person_id', '`focal_person_id`', 3, -1, FALSE, '`focal_person_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focal_person_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focal_person_id'] =& $this->focal_person_id;

		// mfo_id
		$this->mfo_id = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_mfo_id', 'mfo_id', '`mfo_id`', 3, -1, FALSE, '`mfo_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_id'] =& $this->mfo_id;

		// mfo_sequence
		$this->mfo_sequence = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_mfo_sequence', 'mfo_sequence', '`mfo_sequence`', 3, -1, FALSE, '`mfo_sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo_sequence->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo_sequence'] =& $this->mfo_sequence;

		// mfo
		$this->mfo = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_mfo', 'mfo', '`mfo`', 3, -1, FALSE, '`mfo`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->mfo->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['mfo'] =& $this->mfo;

		// pi_no
		$this->pi_no = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_pi_no', 'pi_no', '`pi_no`', 3, -1, FALSE, '`pi_no`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->pi_no->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['pi_no'] =& $this->pi_no;

		// pi_sub
		$this->pi_sub = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_pi_sub', 'pi_sub', '`pi_sub`', 200, -1, FALSE, '`pi_sub`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['pi_sub'] =& $this->pi_sub;

		// mfo_name
		$this->mfo_name = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_mfo_name', 'mfo_name', '`mfo_name`', 200, -1, FALSE, '`mfo_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_name'] =& $this->mfo_name;

		// pi_question
		$this->pi_question = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_pi_question', 'pi_question', '`pi_question`', 200, -1, FALSE, '`pi_question`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['pi_question'] =& $this->pi_question;

		// target
		$this->target = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_target', 'target', '`target`', 5, -1, FALSE, '`target`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->target->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['target'] =& $this->target;

		// t_numerator
		$this->t_numerator = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_numerator', 't_numerator', '`t_numerator`', 5, -1, FALSE, '`t_numerator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_numerator->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_numerator'] =& $this->t_numerator;

		// t_numerator_qtr1
		$this->t_numerator_qtr1 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_numerator_qtr1', 't_numerator_qtr1', '`t_numerator_qtr1`', 5, -1, FALSE, '`t_numerator_qtr1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_numerator_qtr1->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_numerator_qtr1'] =& $this->t_numerator_qtr1;

		// t_numerator_qtr2
		$this->t_numerator_qtr2 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_numerator_qtr2', 't_numerator_qtr2', '`t_numerator_qtr2`', 5, -1, FALSE, '`t_numerator_qtr2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_numerator_qtr2->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_numerator_qtr2'] =& $this->t_numerator_qtr2;

		// t_numerator_qtr3
		$this->t_numerator_qtr3 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_numerator_qtr3', 't_numerator_qtr3', '`t_numerator_qtr3`', 5, -1, FALSE, '`t_numerator_qtr3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_numerator_qtr3->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_numerator_qtr3'] =& $this->t_numerator_qtr3;

		// t_numerator_qtr4
		$this->t_numerator_qtr4 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_numerator_qtr4', 't_numerator_qtr4', '`t_numerator_qtr4`', 5, -1, FALSE, '`t_numerator_qtr4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_numerator_qtr4->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_numerator_qtr4'] =& $this->t_numerator_qtr4;

		// t_denominator
		$this->t_denominator = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_denominator', 't_denominator', '`t_denominator`', 5, -1, FALSE, '`t_denominator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_denominator->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_denominator'] =& $this->t_denominator;

		// t_denominator_qtr1
		$this->t_denominator_qtr1 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_denominator_qtr1', 't_denominator_qtr1', '`t_denominator_qtr1`', 5, -1, FALSE, '`t_denominator_qtr1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_denominator_qtr1->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_denominator_qtr1'] =& $this->t_denominator_qtr1;

		// t_denominator_qtr2
		$this->t_denominator_qtr2 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_denominator_qtr2', 't_denominator_qtr2', '`t_denominator_qtr2`', 5, -1, FALSE, '`t_denominator_qtr2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_denominator_qtr2->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_denominator_qtr2'] =& $this->t_denominator_qtr2;

		// t_denominator_qtr3
		$this->t_denominator_qtr3 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_denominator_qtr3', 't_denominator_qtr3', '`t_denominator_qtr3`', 5, -1, FALSE, '`t_denominator_qtr3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_denominator_qtr3->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_denominator_qtr3'] =& $this->t_denominator_qtr3;

		// t_denominator_qtr4
		$this->t_denominator_qtr4 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_denominator_qtr4', 't_denominator_qtr4', '`t_denominator_qtr4`', 5, -1, FALSE, '`t_denominator_qtr4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_denominator_qtr4->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_denominator_qtr4'] =& $this->t_denominator_qtr4;

		// t_remarks
		$this->t_remarks = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_remarks', 't_remarks', '`t_remarks`', 200, -1, FALSE, '`t_remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['t_remarks'] =& $this->t_remarks;

		// t_cutOffDate
		$this->t_cutOffDate = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_cutOffDate', 't_cutOffDate', '`t_cutOffDate`', 135, 6, FALSE, '`t_cutOffDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_cutOffDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['t_cutOffDate'] =& $this->t_cutOffDate;

		// t_cutOffDate_remarks
		$this->t_cutOffDate_remarks = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_cutOffDate_remarks', 't_cutOffDate_remarks', '`t_cutOffDate_remarks`', 200, -1, FALSE, '`t_cutOffDate_remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['t_cutOffDate_remarks'] =& $this->t_cutOffDate_remarks;

		// accomplishment
		$this->accomplishment = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_accomplishment', 'accomplishment', '`accomplishment`', 5, -1, FALSE, '`accomplishment`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->accomplishment->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['accomplishment'] =& $this->accomplishment;

		// a_numerator
		$this->a_numerator = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_numerator', 'a_numerator', '`a_numerator`', 5, -1, FALSE, '`a_numerator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_numerator->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_numerator'] =& $this->a_numerator;

		// a_numerator_qtr1
		$this->a_numerator_qtr1 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_numerator_qtr1', 'a_numerator_qtr1', '`a_numerator_qtr1`', 5, -1, FALSE, '`a_numerator_qtr1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_numerator_qtr1->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_numerator_qtr1'] =& $this->a_numerator_qtr1;

		// a_numerator_qtr2
		$this->a_numerator_qtr2 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_numerator_qtr2', 'a_numerator_qtr2', '`a_numerator_qtr2`', 5, -1, FALSE, '`a_numerator_qtr2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_numerator_qtr2->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_numerator_qtr2'] =& $this->a_numerator_qtr2;

		// a_numerator_qtr3
		$this->a_numerator_qtr3 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_numerator_qtr3', 'a_numerator_qtr3', '`a_numerator_qtr3`', 5, -1, FALSE, '`a_numerator_qtr3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_numerator_qtr3->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_numerator_qtr3'] =& $this->a_numerator_qtr3;

		// a_numerator_qtr4
		$this->a_numerator_qtr4 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_numerator_qtr4', 'a_numerator_qtr4', '`a_numerator_qtr4`', 5, -1, FALSE, '`a_numerator_qtr4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_numerator_qtr4->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_numerator_qtr4'] =& $this->a_numerator_qtr4;

		// a_denominator
		$this->a_denominator = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_denominator', 'a_denominator', '`a_denominator`', 5, -1, FALSE, '`a_denominator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_denominator->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_denominator'] =& $this->a_denominator;

		// a_denominator_qtr1
		$this->a_denominator_qtr1 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_denominator_qtr1', 'a_denominator_qtr1', '`a_denominator_qtr1`', 5, -1, FALSE, '`a_denominator_qtr1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_denominator_qtr1->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_denominator_qtr1'] =& $this->a_denominator_qtr1;

		// a_denominator_qtr2
		$this->a_denominator_qtr2 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_denominator_qtr2', 'a_denominator_qtr2', '`a_denominator_qtr2`', 5, -1, FALSE, '`a_denominator_qtr2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_denominator_qtr2->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_denominator_qtr2'] =& $this->a_denominator_qtr2;

		// a_denominator_qtr3
		$this->a_denominator_qtr3 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_denominator_qtr3', 'a_denominator_qtr3', '`a_denominator_qtr3`', 5, -1, FALSE, '`a_denominator_qtr3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_denominator_qtr3->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_denominator_qtr3'] =& $this->a_denominator_qtr3;

		// a_denominator_qtr4
		$this->a_denominator_qtr4 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_denominator_qtr4', 'a_denominator_qtr4', '`a_denominator_qtr4`', 5, -1, FALSE, '`a_denominator_qtr4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_denominator_qtr4->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_denominator_qtr4'] =& $this->a_denominator_qtr4;

		// a_supporting_docs
		$this->a_supporting_docs = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_supporting_docs', 'a_supporting_docs', '`a_supporting_docs`', 5, -1, FALSE, '`a_supporting_docs`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_supporting_docs->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_supporting_docs'] =& $this->a_supporting_docs;

		// a_supporting_docs_qtr1
		$this->a_supporting_docs_qtr1 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_supporting_docs_qtr1', 'a_supporting_docs_qtr1', '`a_supporting_docs_qtr1`', 5, -1, FALSE, '`a_supporting_docs_qtr1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_supporting_docs_qtr1->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_supporting_docs_qtr1'] =& $this->a_supporting_docs_qtr1;

		// a_supporting_docs_qtr2
		$this->a_supporting_docs_qtr2 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_supporting_docs_qtr2', 'a_supporting_docs_qtr2', '`a_supporting_docs_qtr2`', 5, -1, FALSE, '`a_supporting_docs_qtr2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_supporting_docs_qtr2->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_supporting_docs_qtr2'] =& $this->a_supporting_docs_qtr2;

		// a_supporting_docs_qtr3
		$this->a_supporting_docs_qtr3 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_supporting_docs_qtr3', 'a_supporting_docs_qtr3', '`a_supporting_docs_qtr3`', 5, -1, FALSE, '`a_supporting_docs_qtr3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_supporting_docs_qtr3->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_supporting_docs_qtr3'] =& $this->a_supporting_docs_qtr3;

		// a_supporting_docs_qtr4
		$this->a_supporting_docs_qtr4 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_supporting_docs_qtr4', 'a_supporting_docs_qtr4', '`a_supporting_docs_qtr4`', 5, -1, FALSE, '`a_supporting_docs_qtr4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_supporting_docs_qtr4->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_supporting_docs_qtr4'] =& $this->a_supporting_docs_qtr4;

		// a_remarks
		$this->a_remarks = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_remarks', 'a_remarks', '`a_remarks`', 200, -1, FALSE, '`a_remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['a_remarks'] =& $this->a_remarks;

		// a_cutOffDate
		$this->a_cutOffDate = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_cutOffDate', 'a_cutOffDate', '`a_cutOffDate`', 135, 6, FALSE, '`a_cutOffDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_cutOffDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['a_cutOffDate'] =& $this->a_cutOffDate;

		// a_cutOffDate_remarks
		$this->a_cutOffDate_remarks = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_cutOffDate_remarks', 'a_cutOffDate_remarks', '`a_cutOffDate_remarks`', 200, -1, FALSE, '`a_cutOffDate_remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['a_cutOffDate_remarks'] =& $this->a_cutOffDate_remarks;

		// a_rating
		$this->a_rating = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_rating', 'a_rating', '`a_rating`', 5, -1, FALSE, '`a_rating`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_rating->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_rating'] =& $this->a_rating;

		// a_rating_above_90
		$this->a_rating_above_90 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_rating_above_90', 'a_rating_above_90', '`a_rating_above_90`', 5, -1, FALSE, '`a_rating_above_90`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_rating_above_90->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_rating_above_90'] =& $this->a_rating_above_90;

		// a_rating_below_90
		$this->a_rating_below_90 = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_rating_below_90', 'a_rating_below_90', '`a_rating_below_90`', 5, -1, FALSE, '`a_rating_below_90`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_rating_below_90->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_rating_below_90'] =& $this->a_rating_below_90;

		// a_supporting_docs_comparison
		$this->a_supporting_docs_comparison = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_supporting_docs_comparison', 'a_supporting_docs_comparison', '`a_supporting_docs_comparison`', 200, -1, FALSE, '`a_supporting_docs_comparison`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['a_supporting_docs_comparison'] =& $this->a_supporting_docs_comparison;

		// cutOffDate_id
		$this->cutOffDate_id = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_cutOffDate_id', 'cutOffDate_id', '`cutOffDate_id`', 3, -1, FALSE, '`cutOffDate_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cutOffDate_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['cutOffDate_id'] =& $this->cutOffDate_id;

		// mfo_name_rep
		$this->mfo_name_rep = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_mfo_name_rep', 'mfo_name_rep', '`mfo_name_rep`', 200, -1, FALSE, '`mfo_name_rep`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['mfo_name_rep'] =& $this->mfo_name_rep;

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_t_cutOffDate_fp', 't_cutOffDate_fp', '`t_cutOffDate_fp`', 135, 6, FALSE, '`t_cutOffDate_fp`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_cutOffDate_fp->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['t_cutOffDate_fp'] =& $this->t_cutOffDate_fp;

		// a_cutOffDate_fp
		$this->a_cutOffDate_fp = new cField('frm_u_pbb_detail_target', 'frm_u_pbb_detail_target', 'x_a_cutOffDate_fp', 'a_cutOffDate_fp', '`a_cutOffDate_fp`', 135, 6, FALSE, '`a_cutOffDate_fp`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_cutOffDate_fp->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['a_cutOffDate_fp'] =& $this->a_cutOffDate_fp;
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
		return "frm_u_pbb_detail_target_Highlight";
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
		return "`frm_u_pbb_detail_target`";
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
		return "`applicable` DESC,`cu_unit_name` ASC,`mfo_sequence` ASC";
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
		return "INSERT INTO `frm_u_pbb_detail_target` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_u_pbb_detail_target` SET ";
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
		$SQL = "DELETE FROM `frm_u_pbb_detail_target` WHERE ";
		$SQL .= up_QuotedName('pbb_id') . '=' . up_QuotedValue($rs['pbb_id'], $this->pbb_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`pbb_id` = @pbb_id@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->pbb_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@pbb_id@", up_AdjustSql($this->pbb_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "frm_u_pbb_detail_targetlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_u_pbb_detail_targetlist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_u_pbb_detail_targetview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_u_pbb_detail_targetadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_u_pbb_detail_targetedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_u_pbb_detail_targetadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_u_pbb_detail_targetdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->pbb_id->CurrentValue)) {
			$sUrl .= "pbb_id=" . urlencode($this->pbb_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_u_pbb_detail_target" : "";
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
			$arKeys[] = @$_GET["pbb_id"]; // pbb_id

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
			$this->pbb_id->CurrentValue = $key;
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
		$this->pbb_id->setDbValue($rs->fields('pbb_id'));
		$this->applicable->setDbValue($rs->fields('applicable'));
		$this->units_id->setDbValue($rs->fields('units_id'));
		$this->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$this->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$this->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$this->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$this->mfo_id->setDbValue($rs->fields('mfo_id'));
		$this->mfo_sequence->setDbValue($rs->fields('mfo_sequence'));
		$this->mfo->setDbValue($rs->fields('mfo'));
		$this->pi_no->setDbValue($rs->fields('pi_no'));
		$this->pi_sub->setDbValue($rs->fields('pi_sub'));
		$this->mfo_name->setDbValue($rs->fields('mfo_name'));
		$this->pi_question->setDbValue($rs->fields('pi_question'));
		$this->target->setDbValue($rs->fields('target'));
		$this->t_numerator->setDbValue($rs->fields('t_numerator'));
		$this->t_numerator_qtr1->setDbValue($rs->fields('t_numerator_qtr1'));
		$this->t_numerator_qtr2->setDbValue($rs->fields('t_numerator_qtr2'));
		$this->t_numerator_qtr3->setDbValue($rs->fields('t_numerator_qtr3'));
		$this->t_numerator_qtr4->setDbValue($rs->fields('t_numerator_qtr4'));
		$this->t_denominator->setDbValue($rs->fields('t_denominator'));
		$this->t_denominator_qtr1->setDbValue($rs->fields('t_denominator_qtr1'));
		$this->t_denominator_qtr2->setDbValue($rs->fields('t_denominator_qtr2'));
		$this->t_denominator_qtr3->setDbValue($rs->fields('t_denominator_qtr3'));
		$this->t_denominator_qtr4->setDbValue($rs->fields('t_denominator_qtr4'));
		$this->t_remarks->setDbValue($rs->fields('t_remarks'));
		$this->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$this->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$this->accomplishment->setDbValue($rs->fields('accomplishment'));
		$this->a_numerator->setDbValue($rs->fields('a_numerator'));
		$this->a_numerator_qtr1->setDbValue($rs->fields('a_numerator_qtr1'));
		$this->a_numerator_qtr2->setDbValue($rs->fields('a_numerator_qtr2'));
		$this->a_numerator_qtr3->setDbValue($rs->fields('a_numerator_qtr3'));
		$this->a_numerator_qtr4->setDbValue($rs->fields('a_numerator_qtr4'));
		$this->a_denominator->setDbValue($rs->fields('a_denominator'));
		$this->a_denominator_qtr1->setDbValue($rs->fields('a_denominator_qtr1'));
		$this->a_denominator_qtr2->setDbValue($rs->fields('a_denominator_qtr2'));
		$this->a_denominator_qtr3->setDbValue($rs->fields('a_denominator_qtr3'));
		$this->a_denominator_qtr4->setDbValue($rs->fields('a_denominator_qtr4'));
		$this->a_supporting_docs->setDbValue($rs->fields('a_supporting_docs'));
		$this->a_supporting_docs_qtr1->setDbValue($rs->fields('a_supporting_docs_qtr1'));
		$this->a_supporting_docs_qtr2->setDbValue($rs->fields('a_supporting_docs_qtr2'));
		$this->a_supporting_docs_qtr3->setDbValue($rs->fields('a_supporting_docs_qtr3'));
		$this->a_supporting_docs_qtr4->setDbValue($rs->fields('a_supporting_docs_qtr4'));
		$this->a_remarks->setDbValue($rs->fields('a_remarks'));
		$this->a_cutOffDate->setDbValue($rs->fields('a_cutOffDate'));
		$this->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
		$this->a_rating->setDbValue($rs->fields('a_rating'));
		$this->a_rating_above_90->setDbValue($rs->fields('a_rating_above_90'));
		$this->a_rating_below_90->setDbValue($rs->fields('a_rating_below_90'));
		$this->a_supporting_docs_comparison->setDbValue($rs->fields('a_supporting_docs_comparison'));
		$this->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$this->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$this->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$this->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// pbb_id

		$this->pbb_id->CellCssStyle = "white-space: nowrap;";

		// applicable
		// units_id
		// cu_sequence

		$this->cu_sequence->CellCssStyle = "white-space: nowrap;";

		// cu_short_name
		$this->cu_short_name->CellCssStyle = "white-space: nowrap;";

		// cu_unit_name
		$this->cu_unit_name->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$this->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// mfo_id
		// mfo_sequence

		$this->mfo_sequence->CellCssStyle = "white-space: nowrap;";

		// mfo
		$this->mfo->CellCssStyle = "white-space: nowrap;";

		// pi_no
		$this->pi_no->CellCssStyle = "white-space: nowrap;";

		// pi_sub
		$this->pi_sub->CellCssStyle = "white-space: nowrap;";

		// mfo_name
		$this->mfo_name->CellCssStyle = "white-space: nowrap;";

		// pi_question
		$this->pi_question->CellCssStyle = "width: 400px;";

		// target
		// t_numerator
		// t_numerator_qtr1
		// t_numerator_qtr2
		// t_numerator_qtr3
		// t_numerator_qtr4
		// t_denominator
		// t_denominator_qtr1
		// t_denominator_qtr2
		// t_denominator_qtr3
		// t_denominator_qtr4
		// t_remarks
		// t_cutOffDate
		// t_cutOffDate_remarks
		// accomplishment
		// a_numerator
		// a_numerator_qtr1
		// a_numerator_qtr2
		// a_numerator_qtr3
		// a_numerator_qtr4
		// a_denominator
		// a_denominator_qtr1
		// a_denominator_qtr2
		// a_denominator_qtr3
		// a_denominator_qtr4
		// a_supporting_docs
		// a_supporting_docs_qtr1
		// a_supporting_docs_qtr2
		// a_supporting_docs_qtr3
		// a_supporting_docs_qtr4
		// a_remarks
		// a_cutOffDate
		// a_cutOffDate_remarks
		// a_rating
		// a_rating_above_90
		// a_rating_below_90
		// a_supporting_docs_comparison
		// cutOffDate_id

		$this->cutOffDate_id->CellCssStyle = "white-space: nowrap;";

		// mfo_name_rep
		$this->mfo_name_rep->CellCssStyle = "white-space: nowrap;";

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// a_cutOffDate_fp
		$this->a_cutOffDate_fp->CellCssStyle = "white-space: nowrap;";

		// pbb_id
		$this->pbb_id->ViewValue = $this->pbb_id->CurrentValue;
		$this->pbb_id->ViewCustomAttributes = "";

		// applicable
		if (strval($this->applicable->CurrentValue) <> "") {
			switch ($this->applicable->CurrentValue) {
				case "Y":
					$this->applicable->ViewValue = $this->applicable->FldTagCaption(1) <> "" ? $this->applicable->FldTagCaption(1) : $this->applicable->CurrentValue;
					break;
				case "N":
					$this->applicable->ViewValue = $this->applicable->FldTagCaption(2) <> "" ? $this->applicable->FldTagCaption(2) : $this->applicable->CurrentValue;
					break;
				default:
					$this->applicable->ViewValue = $this->applicable->CurrentValue;
			}
		} else {
			$this->applicable->ViewValue = NULL;
		}
		$this->applicable->ViewCustomAttributes = "";

		// units_id
		$this->units_id->ViewValue = $this->units_id->CurrentValue;
		$this->units_id->ViewCustomAttributes = "";

		// cu_sequence
		$this->cu_sequence->ViewValue = $this->cu_sequence->CurrentValue;
		$this->cu_sequence->ViewCustomAttributes = "";

		// cu_short_name
		$this->cu_short_name->ViewValue = $this->cu_short_name->CurrentValue;
		$this->cu_short_name->ViewCustomAttributes = "";

		// cu_unit_name
		$this->cu_unit_name->ViewValue = $this->cu_unit_name->CurrentValue;
		$this->cu_unit_name->ViewCustomAttributes = "";

		// focal_person_id
		$this->focal_person_id->ViewValue = $this->focal_person_id->CurrentValue;
		$this->focal_person_id->ViewCustomAttributes = "";

		// mfo_id
		$this->mfo_id->ViewValue = $this->mfo_id->CurrentValue;
		$this->mfo_id->ViewCustomAttributes = "";

		// mfo_sequence
		$this->mfo_sequence->ViewValue = $this->mfo_sequence->CurrentValue;
		$this->mfo_sequence->ViewCustomAttributes = "";

		// mfo
		$this->mfo->ViewValue = $this->mfo->CurrentValue;
		$this->mfo->ViewCustomAttributes = "";

		// pi_no
		$this->pi_no->ViewValue = $this->pi_no->CurrentValue;
		$this->pi_no->ViewCustomAttributes = "";

		// pi_sub
		$this->pi_sub->ViewValue = $this->pi_sub->CurrentValue;
		$this->pi_sub->ViewCustomAttributes = "";

		// mfo_name
		$this->mfo_name->ViewValue = $this->mfo_name->CurrentValue;
		$this->mfo_name->ViewCustomAttributes = "";

		// pi_question
		$this->pi_question->ViewValue = $this->pi_question->CurrentValue;
		$this->pi_question->ViewCustomAttributes = "";

		// target
		$this->target->ViewValue = $this->target->CurrentValue;
		$this->target->CssStyle = "font-weight:bold;text-align:right;";
		$this->target->ViewCustomAttributes = "";

		// t_numerator
		$this->t_numerator->ViewValue = $this->t_numerator->CurrentValue;
		$this->t_numerator->CssStyle = "text-align:right;";
		$this->t_numerator->ViewCustomAttributes = "";

		// t_numerator_qtr1
		$this->t_numerator_qtr1->ViewValue = $this->t_numerator_qtr1->CurrentValue;
		$this->t_numerator_qtr1->ViewCustomAttributes = "";

		// t_numerator_qtr2
		$this->t_numerator_qtr2->ViewValue = $this->t_numerator_qtr2->CurrentValue;
		$this->t_numerator_qtr2->ViewCustomAttributes = "";

		// t_numerator_qtr3
		$this->t_numerator_qtr3->ViewValue = $this->t_numerator_qtr3->CurrentValue;
		$this->t_numerator_qtr3->ViewCustomAttributes = "";

		// t_numerator_qtr4
		$this->t_numerator_qtr4->ViewValue = $this->t_numerator_qtr4->CurrentValue;
		$this->t_numerator_qtr4->ViewCustomAttributes = "";

		// t_denominator
		$this->t_denominator->ViewValue = $this->t_denominator->CurrentValue;
		$this->t_denominator->CssStyle = "text-align:right;";
		$this->t_denominator->ViewCustomAttributes = "";

		// t_denominator_qtr1
		$this->t_denominator_qtr1->ViewValue = $this->t_denominator_qtr1->CurrentValue;
		$this->t_denominator_qtr1->ViewCustomAttributes = "";

		// t_denominator_qtr2
		$this->t_denominator_qtr2->ViewValue = $this->t_denominator_qtr2->CurrentValue;
		$this->t_denominator_qtr2->ViewCustomAttributes = "";

		// t_denominator_qtr3
		$this->t_denominator_qtr3->ViewValue = $this->t_denominator_qtr3->CurrentValue;
		$this->t_denominator_qtr3->ViewCustomAttributes = "";

		// t_denominator_qtr4
		$this->t_denominator_qtr4->ViewValue = $this->t_denominator_qtr4->CurrentValue;
		$this->t_denominator_qtr4->ViewCustomAttributes = "";

		// t_remarks
		$this->t_remarks->ViewValue = $this->t_remarks->CurrentValue;
		$this->t_remarks->ViewCustomAttributes = "";

		// t_cutOffDate
		$this->t_cutOffDate->ViewValue = $this->t_cutOffDate->CurrentValue;
		$this->t_cutOffDate->ViewValue = up_FormatDateTime($this->t_cutOffDate->ViewValue, 6);
		$this->t_cutOffDate->ViewCustomAttributes = "";

		// t_cutOffDate_remarks
		$this->t_cutOffDate_remarks->ViewValue = $this->t_cutOffDate_remarks->CurrentValue;
		$this->t_cutOffDate_remarks->ViewCustomAttributes = "";

		// accomplishment
		$this->accomplishment->ViewValue = $this->accomplishment->CurrentValue;
		$this->accomplishment->CssStyle = "font-weight:bold;";
		$this->accomplishment->ViewCustomAttributes = "";

		// a_numerator
		$this->a_numerator->ViewValue = $this->a_numerator->CurrentValue;
		$this->a_numerator->ViewCustomAttributes = "";

		// a_numerator_qtr1
		$this->a_numerator_qtr1->ViewValue = $this->a_numerator_qtr1->CurrentValue;
		$this->a_numerator_qtr1->ViewCustomAttributes = "";

		// a_numerator_qtr2
		$this->a_numerator_qtr2->ViewValue = $this->a_numerator_qtr2->CurrentValue;
		$this->a_numerator_qtr2->ViewCustomAttributes = "";

		// a_numerator_qtr3
		$this->a_numerator_qtr3->ViewValue = $this->a_numerator_qtr3->CurrentValue;
		$this->a_numerator_qtr3->ViewCustomAttributes = "";

		// a_numerator_qtr4
		$this->a_numerator_qtr4->ViewValue = $this->a_numerator_qtr4->CurrentValue;
		$this->a_numerator_qtr4->ViewCustomAttributes = "";

		// a_denominator
		$this->a_denominator->ViewValue = $this->a_denominator->CurrentValue;
		$this->a_denominator->ViewCustomAttributes = "";

		// a_denominator_qtr1
		$this->a_denominator_qtr1->ViewValue = $this->a_denominator_qtr1->CurrentValue;
		$this->a_denominator_qtr1->ViewCustomAttributes = "";

		// a_denominator_qtr2
		$this->a_denominator_qtr2->ViewValue = $this->a_denominator_qtr2->CurrentValue;
		$this->a_denominator_qtr2->ViewCustomAttributes = "";

		// a_denominator_qtr3
		$this->a_denominator_qtr3->ViewValue = $this->a_denominator_qtr3->CurrentValue;
		$this->a_denominator_qtr3->ViewCustomAttributes = "";

		// a_denominator_qtr4
		$this->a_denominator_qtr4->ViewValue = $this->a_denominator_qtr4->CurrentValue;
		$this->a_denominator_qtr4->ViewCustomAttributes = "";

		// a_supporting_docs
		$this->a_supporting_docs->ViewValue = $this->a_supporting_docs->CurrentValue;
		$this->a_supporting_docs->CssStyle = "font-weight:bold;";
		$this->a_supporting_docs->ViewCustomAttributes = "";

		// a_supporting_docs_qtr1
		$this->a_supporting_docs_qtr1->ViewValue = $this->a_supporting_docs_qtr1->CurrentValue;
		$this->a_supporting_docs_qtr1->ViewCustomAttributes = "";

		// a_supporting_docs_qtr2
		$this->a_supporting_docs_qtr2->ViewValue = $this->a_supporting_docs_qtr2->CurrentValue;
		$this->a_supporting_docs_qtr2->ViewCustomAttributes = "";

		// a_supporting_docs_qtr3
		$this->a_supporting_docs_qtr3->ViewValue = $this->a_supporting_docs_qtr3->CurrentValue;
		$this->a_supporting_docs_qtr3->ViewCustomAttributes = "";

		// a_supporting_docs_qtr4
		$this->a_supporting_docs_qtr4->ViewValue = $this->a_supporting_docs_qtr4->CurrentValue;
		$this->a_supporting_docs_qtr4->ViewCustomAttributes = "";

		// a_remarks
		$this->a_remarks->ViewValue = $this->a_remarks->CurrentValue;
		$this->a_remarks->ViewCustomAttributes = "";

		// a_cutOffDate
		$this->a_cutOffDate->ViewValue = $this->a_cutOffDate->CurrentValue;
		$this->a_cutOffDate->ViewValue = up_FormatDateTime($this->a_cutOffDate->ViewValue, 6);
		$this->a_cutOffDate->ViewCustomAttributes = "";

		// a_cutOffDate_remarks
		$this->a_cutOffDate_remarks->ViewValue = $this->a_cutOffDate_remarks->CurrentValue;
		$this->a_cutOffDate_remarks->ViewCustomAttributes = "";

		// a_rating
		$this->a_rating->ViewValue = $this->a_rating->CurrentValue;
		$this->a_rating->ViewCustomAttributes = "";

		// a_rating_above_90
		$this->a_rating_above_90->ViewValue = $this->a_rating_above_90->CurrentValue;
		$this->a_rating_above_90->ViewCustomAttributes = "";

		// a_rating_below_90
		$this->a_rating_below_90->ViewValue = $this->a_rating_below_90->CurrentValue;
		$this->a_rating_below_90->ViewCustomAttributes = "";

		// a_supporting_docs_comparison
		$this->a_supporting_docs_comparison->ViewValue = $this->a_supporting_docs_comparison->CurrentValue;
		$this->a_supporting_docs_comparison->ViewCustomAttributes = "";

		// cutOffDate_id
		$this->cutOffDate_id->ViewValue = $this->cutOffDate_id->CurrentValue;
		$this->cutOffDate_id->ViewCustomAttributes = "";

		// mfo_name_rep
		$this->mfo_name_rep->ViewValue = $this->mfo_name_rep->CurrentValue;
		$this->mfo_name_rep->ViewCustomAttributes = "";

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp->ViewValue = $this->t_cutOffDate_fp->CurrentValue;
		$this->t_cutOffDate_fp->ViewValue = up_FormatDateTime($this->t_cutOffDate_fp->ViewValue, 6);
		$this->t_cutOffDate_fp->ViewCustomAttributes = "";

		// a_cutOffDate_fp
		$this->a_cutOffDate_fp->ViewValue = $this->a_cutOffDate_fp->CurrentValue;
		$this->a_cutOffDate_fp->ViewValue = up_FormatDateTime($this->a_cutOffDate_fp->ViewValue, 6);
		$this->a_cutOffDate_fp->ViewCustomAttributes = "";

		// pbb_id
		$this->pbb_id->LinkCustomAttributes = "";
		$this->pbb_id->HrefValue = "";
		$this->pbb_id->TooltipValue = "";

		// applicable
		$this->applicable->LinkCustomAttributes = "";
		$this->applicable->HrefValue = "";
		$this->applicable->TooltipValue = "";

		// units_id
		$this->units_id->LinkCustomAttributes = "";
		$this->units_id->HrefValue = "";
		$this->units_id->TooltipValue = "";

		// cu_sequence
		$this->cu_sequence->LinkCustomAttributes = "";
		$this->cu_sequence->HrefValue = "";
		$this->cu_sequence->TooltipValue = "";

		// cu_short_name
		$this->cu_short_name->LinkCustomAttributes = "";
		$this->cu_short_name->HrefValue = "";
		$this->cu_short_name->TooltipValue = "";

		// cu_unit_name
		$this->cu_unit_name->LinkCustomAttributes = "";
		$this->cu_unit_name->HrefValue = "";
		$this->cu_unit_name->TooltipValue = "";

		// focal_person_id
		$this->focal_person_id->LinkCustomAttributes = "";
		$this->focal_person_id->HrefValue = "";
		$this->focal_person_id->TooltipValue = "";

		// mfo_id
		$this->mfo_id->LinkCustomAttributes = "";
		$this->mfo_id->HrefValue = "";
		$this->mfo_id->TooltipValue = "";

		// mfo_sequence
		$this->mfo_sequence->LinkCustomAttributes = "";
		$this->mfo_sequence->HrefValue = "";
		$this->mfo_sequence->TooltipValue = "";

		// mfo
		$this->mfo->LinkCustomAttributes = "";
		$this->mfo->HrefValue = "";
		$this->mfo->TooltipValue = "";

		// pi_no
		$this->pi_no->LinkCustomAttributes = "";
		$this->pi_no->HrefValue = "";
		$this->pi_no->TooltipValue = "";

		// pi_sub
		$this->pi_sub->LinkCustomAttributes = "";
		$this->pi_sub->HrefValue = "";
		$this->pi_sub->TooltipValue = "";

		// mfo_name
		$this->mfo_name->LinkCustomAttributes = "";
		$this->mfo_name->HrefValue = "";
		$this->mfo_name->TooltipValue = "";

		// pi_question
		$this->pi_question->LinkCustomAttributes = "";
		$this->pi_question->HrefValue = "";
		$this->pi_question->TooltipValue = "";

		// target
		$this->target->LinkCustomAttributes = "";
		$this->target->HrefValue = "";
		$this->target->TooltipValue = "";

		// t_numerator
		$this->t_numerator->LinkCustomAttributes = "";
		$this->t_numerator->HrefValue = "";
		$this->t_numerator->TooltipValue = "";

		// t_numerator_qtr1
		$this->t_numerator_qtr1->LinkCustomAttributes = "";
		$this->t_numerator_qtr1->HrefValue = "";
		$this->t_numerator_qtr1->TooltipValue = "";

		// t_numerator_qtr2
		$this->t_numerator_qtr2->LinkCustomAttributes = "";
		$this->t_numerator_qtr2->HrefValue = "";
		$this->t_numerator_qtr2->TooltipValue = "";

		// t_numerator_qtr3
		$this->t_numerator_qtr3->LinkCustomAttributes = "";
		$this->t_numerator_qtr3->HrefValue = "";
		$this->t_numerator_qtr3->TooltipValue = "";

		// t_numerator_qtr4
		$this->t_numerator_qtr4->LinkCustomAttributes = "";
		$this->t_numerator_qtr4->HrefValue = "";
		$this->t_numerator_qtr4->TooltipValue = "";

		// t_denominator
		$this->t_denominator->LinkCustomAttributes = "";
		$this->t_denominator->HrefValue = "";
		$this->t_denominator->TooltipValue = "";

		// t_denominator_qtr1
		$this->t_denominator_qtr1->LinkCustomAttributes = "";
		$this->t_denominator_qtr1->HrefValue = "";
		$this->t_denominator_qtr1->TooltipValue = "";

		// t_denominator_qtr2
		$this->t_denominator_qtr2->LinkCustomAttributes = "";
		$this->t_denominator_qtr2->HrefValue = "";
		$this->t_denominator_qtr2->TooltipValue = "";

		// t_denominator_qtr3
		$this->t_denominator_qtr3->LinkCustomAttributes = "";
		$this->t_denominator_qtr3->HrefValue = "";
		$this->t_denominator_qtr3->TooltipValue = "";

		// t_denominator_qtr4
		$this->t_denominator_qtr4->LinkCustomAttributes = "";
		$this->t_denominator_qtr4->HrefValue = "";
		$this->t_denominator_qtr4->TooltipValue = "";

		// t_remarks
		$this->t_remarks->LinkCustomAttributes = "";
		$this->t_remarks->HrefValue = "";
		$this->t_remarks->TooltipValue = "";

		// t_cutOffDate
		$this->t_cutOffDate->LinkCustomAttributes = "";
		$this->t_cutOffDate->HrefValue = "";
		$this->t_cutOffDate->TooltipValue = "";

		// t_cutOffDate_remarks
		$this->t_cutOffDate_remarks->LinkCustomAttributes = "";
		$this->t_cutOffDate_remarks->HrefValue = "";
		$this->t_cutOffDate_remarks->TooltipValue = "";

		// accomplishment
		$this->accomplishment->LinkCustomAttributes = "";
		$this->accomplishment->HrefValue = "";
		$this->accomplishment->TooltipValue = "";

		// a_numerator
		$this->a_numerator->LinkCustomAttributes = "";
		$this->a_numerator->HrefValue = "";
		$this->a_numerator->TooltipValue = "";

		// a_numerator_qtr1
		$this->a_numerator_qtr1->LinkCustomAttributes = "";
		$this->a_numerator_qtr1->HrefValue = "";
		$this->a_numerator_qtr1->TooltipValue = "";

		// a_numerator_qtr2
		$this->a_numerator_qtr2->LinkCustomAttributes = "";
		$this->a_numerator_qtr2->HrefValue = "";
		$this->a_numerator_qtr2->TooltipValue = "";

		// a_numerator_qtr3
		$this->a_numerator_qtr3->LinkCustomAttributes = "";
		$this->a_numerator_qtr3->HrefValue = "";
		$this->a_numerator_qtr3->TooltipValue = "";

		// a_numerator_qtr4
		$this->a_numerator_qtr4->LinkCustomAttributes = "";
		$this->a_numerator_qtr4->HrefValue = "";
		$this->a_numerator_qtr4->TooltipValue = "";

		// a_denominator
		$this->a_denominator->LinkCustomAttributes = "";
		$this->a_denominator->HrefValue = "";
		$this->a_denominator->TooltipValue = "";

		// a_denominator_qtr1
		$this->a_denominator_qtr1->LinkCustomAttributes = "";
		$this->a_denominator_qtr1->HrefValue = "";
		$this->a_denominator_qtr1->TooltipValue = "";

		// a_denominator_qtr2
		$this->a_denominator_qtr2->LinkCustomAttributes = "";
		$this->a_denominator_qtr2->HrefValue = "";
		$this->a_denominator_qtr2->TooltipValue = "";

		// a_denominator_qtr3
		$this->a_denominator_qtr3->LinkCustomAttributes = "";
		$this->a_denominator_qtr3->HrefValue = "";
		$this->a_denominator_qtr3->TooltipValue = "";

		// a_denominator_qtr4
		$this->a_denominator_qtr4->LinkCustomAttributes = "";
		$this->a_denominator_qtr4->HrefValue = "";
		$this->a_denominator_qtr4->TooltipValue = "";

		// a_supporting_docs
		$this->a_supporting_docs->LinkCustomAttributes = "";
		$this->a_supporting_docs->HrefValue = "";
		$this->a_supporting_docs->TooltipValue = "";

		// a_supporting_docs_qtr1
		$this->a_supporting_docs_qtr1->LinkCustomAttributes = "";
		$this->a_supporting_docs_qtr1->HrefValue = "";
		$this->a_supporting_docs_qtr1->TooltipValue = "";

		// a_supporting_docs_qtr2
		$this->a_supporting_docs_qtr2->LinkCustomAttributes = "";
		$this->a_supporting_docs_qtr2->HrefValue = "";
		$this->a_supporting_docs_qtr2->TooltipValue = "";

		// a_supporting_docs_qtr3
		$this->a_supporting_docs_qtr3->LinkCustomAttributes = "";
		$this->a_supporting_docs_qtr3->HrefValue = "";
		$this->a_supporting_docs_qtr3->TooltipValue = "";

		// a_supporting_docs_qtr4
		$this->a_supporting_docs_qtr4->LinkCustomAttributes = "";
		$this->a_supporting_docs_qtr4->HrefValue = "";
		$this->a_supporting_docs_qtr4->TooltipValue = "";

		// a_remarks
		$this->a_remarks->LinkCustomAttributes = "";
		$this->a_remarks->HrefValue = "";
		$this->a_remarks->TooltipValue = "";

		// a_cutOffDate
		$this->a_cutOffDate->LinkCustomAttributes = "";
		$this->a_cutOffDate->HrefValue = "";
		$this->a_cutOffDate->TooltipValue = "";

		// a_cutOffDate_remarks
		$this->a_cutOffDate_remarks->LinkCustomAttributes = "";
		$this->a_cutOffDate_remarks->HrefValue = "";
		$this->a_cutOffDate_remarks->TooltipValue = "";

		// a_rating
		$this->a_rating->LinkCustomAttributes = "";
		$this->a_rating->HrefValue = "";
		$this->a_rating->TooltipValue = "";

		// a_rating_above_90
		$this->a_rating_above_90->LinkCustomAttributes = "";
		$this->a_rating_above_90->HrefValue = "";
		$this->a_rating_above_90->TooltipValue = "";

		// a_rating_below_90
		$this->a_rating_below_90->LinkCustomAttributes = "";
		$this->a_rating_below_90->HrefValue = "";
		$this->a_rating_below_90->TooltipValue = "";

		// a_supporting_docs_comparison
		$this->a_supporting_docs_comparison->LinkCustomAttributes = "";
		$this->a_supporting_docs_comparison->HrefValue = "";
		$this->a_supporting_docs_comparison->TooltipValue = "";

		// cutOffDate_id
		$this->cutOffDate_id->LinkCustomAttributes = "";
		$this->cutOffDate_id->HrefValue = "";
		$this->cutOffDate_id->TooltipValue = "";

		// mfo_name_rep
		$this->mfo_name_rep->LinkCustomAttributes = "";
		$this->mfo_name_rep->HrefValue = "";
		$this->mfo_name_rep->TooltipValue = "";

		// t_cutOffDate_fp
		$this->t_cutOffDate_fp->LinkCustomAttributes = "";
		$this->t_cutOffDate_fp->HrefValue = "";
		$this->t_cutOffDate_fp->TooltipValue = "";

		// a_cutOffDate_fp
		$this->a_cutOffDate_fp->LinkCustomAttributes = "";
		$this->a_cutOffDate_fp->HrefValue = "";
		$this->a_cutOffDate_fp->TooltipValue = "";

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
					$XmlDoc->AddField('pbb_id', $this->pbb_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('applicable', $this->applicable->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('units_id', $this->units_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_sequence', $this->cu_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_short_name', $this->cu_short_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_unit_name', $this->cu_unit_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focal_person_id', $this->focal_person_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_id', $this->mfo_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_sequence', $this->mfo_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo', $this->mfo->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_no', $this->pi_no->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_sub', $this->pi_sub->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_name', $this->mfo_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_question', $this->pi_question->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('target', $this->target->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_numerator', $this->t_numerator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_numerator_qtr1', $this->t_numerator_qtr1->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_numerator_qtr2', $this->t_numerator_qtr2->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_numerator_qtr3', $this->t_numerator_qtr3->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_numerator_qtr4', $this->t_numerator_qtr4->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_denominator', $this->t_denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_denominator_qtr1', $this->t_denominator_qtr1->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_denominator_qtr2', $this->t_denominator_qtr2->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_denominator_qtr3', $this->t_denominator_qtr3->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_denominator_qtr4', $this->t_denominator_qtr4->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_remarks', $this->t_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate', $this->t_cutOffDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_remarks', $this->t_cutOffDate_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('accomplishment', $this->accomplishment->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_numerator', $this->a_numerator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_numerator_qtr1', $this->a_numerator_qtr1->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_numerator_qtr2', $this->a_numerator_qtr2->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_numerator_qtr3', $this->a_numerator_qtr3->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_numerator_qtr4', $this->a_numerator_qtr4->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_denominator', $this->a_denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_denominator_qtr1', $this->a_denominator_qtr1->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_denominator_qtr2', $this->a_denominator_qtr2->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_denominator_qtr3', $this->a_denominator_qtr3->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_denominator_qtr4', $this->a_denominator_qtr4->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_supporting_docs', $this->a_supporting_docs->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_supporting_docs_qtr1', $this->a_supporting_docs_qtr1->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_supporting_docs_qtr2', $this->a_supporting_docs_qtr2->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_supporting_docs_qtr3', $this->a_supporting_docs_qtr3->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_supporting_docs_qtr4', $this->a_supporting_docs_qtr4->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_remarks', $this->a_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate', $this->a_cutOffDate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate_remarks', $this->a_cutOffDate_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_rating', $this->a_rating->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_rating_above_90', $this->a_rating_above_90->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_rating_below_90', $this->a_rating_below_90->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_supporting_docs_comparison', $this->a_supporting_docs_comparison->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('applicable', $this->applicable->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_unit_name', $this->cu_unit_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('mfo_name', $this->mfo_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('target', $this->target->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_numerator', $this->t_numerator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_denominator', $this->t_denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_remarks', $this->t_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('t_cutOffDate_remarks', $this->t_cutOffDate_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('accomplishment', $this->accomplishment->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_numerator', $this->a_numerator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_denominator', $this->a_denominator->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_supporting_docs', $this->a_supporting_docs->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_remarks', $this->a_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_cutOffDate_remarks', $this->a_cutOffDate_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_rating_above_90', $this->a_rating_above_90->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_rating_below_90', $this->a_rating_below_90->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('a_supporting_docs_comparison', $this->a_supporting_docs_comparison->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->pbb_id);
				$Doc->ExportCaption($this->applicable);
				$Doc->ExportCaption($this->units_id);
				$Doc->ExportCaption($this->cu_sequence);
				$Doc->ExportCaption($this->cu_short_name);
				$Doc->ExportCaption($this->cu_unit_name);
				$Doc->ExportCaption($this->focal_person_id);
				$Doc->ExportCaption($this->mfo_id);
				$Doc->ExportCaption($this->mfo_sequence);
				$Doc->ExportCaption($this->mfo);
				$Doc->ExportCaption($this->pi_no);
				$Doc->ExportCaption($this->pi_sub);
				$Doc->ExportCaption($this->mfo_name);
				$Doc->ExportCaption($this->pi_question);
				$Doc->ExportCaption($this->target);
				$Doc->ExportCaption($this->t_numerator);
				$Doc->ExportCaption($this->t_numerator_qtr1);
				$Doc->ExportCaption($this->t_numerator_qtr2);
				$Doc->ExportCaption($this->t_numerator_qtr3);
				$Doc->ExportCaption($this->t_numerator_qtr4);
				$Doc->ExportCaption($this->t_denominator);
				$Doc->ExportCaption($this->t_denominator_qtr1);
				$Doc->ExportCaption($this->t_denominator_qtr2);
				$Doc->ExportCaption($this->t_denominator_qtr3);
				$Doc->ExportCaption($this->t_denominator_qtr4);
				$Doc->ExportCaption($this->t_remarks);
				$Doc->ExportCaption($this->t_cutOffDate);
				$Doc->ExportCaption($this->t_cutOffDate_remarks);
				$Doc->ExportCaption($this->accomplishment);
				$Doc->ExportCaption($this->a_numerator);
				$Doc->ExportCaption($this->a_numerator_qtr1);
				$Doc->ExportCaption($this->a_numerator_qtr2);
				$Doc->ExportCaption($this->a_numerator_qtr3);
				$Doc->ExportCaption($this->a_numerator_qtr4);
				$Doc->ExportCaption($this->a_denominator);
				$Doc->ExportCaption($this->a_denominator_qtr1);
				$Doc->ExportCaption($this->a_denominator_qtr2);
				$Doc->ExportCaption($this->a_denominator_qtr3);
				$Doc->ExportCaption($this->a_denominator_qtr4);
				$Doc->ExportCaption($this->a_supporting_docs);
				$Doc->ExportCaption($this->a_supporting_docs_qtr1);
				$Doc->ExportCaption($this->a_supporting_docs_qtr2);
				$Doc->ExportCaption($this->a_supporting_docs_qtr3);
				$Doc->ExportCaption($this->a_supporting_docs_qtr4);
				$Doc->ExportCaption($this->a_remarks);
				$Doc->ExportCaption($this->a_cutOffDate);
				$Doc->ExportCaption($this->a_cutOffDate_remarks);
				$Doc->ExportCaption($this->a_rating);
				$Doc->ExportCaption($this->a_rating_above_90);
				$Doc->ExportCaption($this->a_rating_below_90);
				$Doc->ExportCaption($this->a_supporting_docs_comparison);
			} else {
				$Doc->ExportCaption($this->applicable);
				$Doc->ExportCaption($this->cu_unit_name);
				$Doc->ExportCaption($this->mfo_name);
				$Doc->ExportCaption($this->target);
				$Doc->ExportCaption($this->t_numerator);
				$Doc->ExportCaption($this->t_denominator);
				$Doc->ExportCaption($this->t_remarks);
				$Doc->ExportCaption($this->t_cutOffDate_remarks);
				$Doc->ExportCaption($this->accomplishment);
				$Doc->ExportCaption($this->a_numerator);
				$Doc->ExportCaption($this->a_denominator);
				$Doc->ExportCaption($this->a_supporting_docs);
				$Doc->ExportCaption($this->a_remarks);
				$Doc->ExportCaption($this->a_cutOffDate_remarks);
				$Doc->ExportCaption($this->a_rating_above_90);
				$Doc->ExportCaption($this->a_rating_below_90);
				$Doc->ExportCaption($this->a_supporting_docs_comparison);
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
					$Doc->ExportField($this->pbb_id);
					$Doc->ExportField($this->applicable);
					$Doc->ExportField($this->units_id);
					$Doc->ExportField($this->cu_sequence);
					$Doc->ExportField($this->cu_short_name);
					$Doc->ExportField($this->cu_unit_name);
					$Doc->ExportField($this->focal_person_id);
					$Doc->ExportField($this->mfo_id);
					$Doc->ExportField($this->mfo_sequence);
					$Doc->ExportField($this->mfo);
					$Doc->ExportField($this->pi_no);
					$Doc->ExportField($this->pi_sub);
					$Doc->ExportField($this->mfo_name);
					$Doc->ExportField($this->pi_question);
					$Doc->ExportField($this->target);
					$Doc->ExportField($this->t_numerator);
					$Doc->ExportField($this->t_numerator_qtr1);
					$Doc->ExportField($this->t_numerator_qtr2);
					$Doc->ExportField($this->t_numerator_qtr3);
					$Doc->ExportField($this->t_numerator_qtr4);
					$Doc->ExportField($this->t_denominator);
					$Doc->ExportField($this->t_denominator_qtr1);
					$Doc->ExportField($this->t_denominator_qtr2);
					$Doc->ExportField($this->t_denominator_qtr3);
					$Doc->ExportField($this->t_denominator_qtr4);
					$Doc->ExportField($this->t_remarks);
					$Doc->ExportField($this->t_cutOffDate);
					$Doc->ExportField($this->t_cutOffDate_remarks);
					$Doc->ExportField($this->accomplishment);
					$Doc->ExportField($this->a_numerator);
					$Doc->ExportField($this->a_numerator_qtr1);
					$Doc->ExportField($this->a_numerator_qtr2);
					$Doc->ExportField($this->a_numerator_qtr3);
					$Doc->ExportField($this->a_numerator_qtr4);
					$Doc->ExportField($this->a_denominator);
					$Doc->ExportField($this->a_denominator_qtr1);
					$Doc->ExportField($this->a_denominator_qtr2);
					$Doc->ExportField($this->a_denominator_qtr3);
					$Doc->ExportField($this->a_denominator_qtr4);
					$Doc->ExportField($this->a_supporting_docs);
					$Doc->ExportField($this->a_supporting_docs_qtr1);
					$Doc->ExportField($this->a_supporting_docs_qtr2);
					$Doc->ExportField($this->a_supporting_docs_qtr3);
					$Doc->ExportField($this->a_supporting_docs_qtr4);
					$Doc->ExportField($this->a_remarks);
					$Doc->ExportField($this->a_cutOffDate);
					$Doc->ExportField($this->a_cutOffDate_remarks);
					$Doc->ExportField($this->a_rating);
					$Doc->ExportField($this->a_rating_above_90);
					$Doc->ExportField($this->a_rating_below_90);
					$Doc->ExportField($this->a_supporting_docs_comparison);
				} else {
					$Doc->ExportField($this->applicable);
					$Doc->ExportField($this->cu_unit_name);
					$Doc->ExportField($this->mfo_name);
					$Doc->ExportField($this->target);
					$Doc->ExportField($this->t_numerator);
					$Doc->ExportField($this->t_denominator);
					$Doc->ExportField($this->t_remarks);
					$Doc->ExportField($this->t_cutOffDate_remarks);
					$Doc->ExportField($this->accomplishment);
					$Doc->ExportField($this->a_numerator);
					$Doc->ExportField($this->a_denominator);
					$Doc->ExportField($this->a_supporting_docs);
					$Doc->ExportField($this->a_remarks);
					$Doc->ExportField($this->a_cutOffDate_remarks);
					$Doc->ExportField($this->a_rating_above_90);
					$Doc->ExportField($this->a_rating_below_90);
					$Doc->ExportField($this->a_supporting_docs_comparison);
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
				$sFilterWrk = '`units_id` IN (' . $sFilterWrk . ')';
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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `frm_u_pbb_detail_target` WHERE " . $this->AddUserIDFilter("");

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
