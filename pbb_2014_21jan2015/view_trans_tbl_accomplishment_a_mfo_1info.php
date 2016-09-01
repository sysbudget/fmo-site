<?php

// Global variable for table object
$view_trans_tbl_accomplishment_a_mfo_1 = NULL;

//
// Table class for view_trans_tbl_accomplishment_a_mfo_1
//
class cview_trans_tbl_accomplishment_a_mfo_1 {
	var $TableVar = 'view_trans_tbl_accomplishment_a_mfo_1';
	var $TableName = 'view_trans_tbl_accomplishment_a_mfo_1';
	var $TableType = 'TABLE';
	var $pi_id;
	var $id;
	var $unit_bo;
	var $unit_cu;
	var $pi;
	var $pi_no;
	var $pi_description;
	var $pi_1;
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
	var $remarks;
	var $cu_sequence;
	var $id_units;
	var $id_cu;
	var $above_90;
	var $below_90;
	var $collectionPeriod_status;
	var $remarks_cutOffDate;
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
	function cview_trans_tbl_accomplishment_a_mfo_1() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// pi_id
		$this->pi_id = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_pi_id', 'pi_id', '`pi_id`', 3, -1, FALSE, '`pi_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->pi_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['pi_id'] =& $this->pi_id;

		// id
		$this->id = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_id', 'id', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['id'] =& $this->id;

		// unit_bo
		$this->unit_bo = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_unit_bo', 'unit_bo', '`unit_bo`', 200, -1, FALSE, '`unit_bo`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['unit_bo'] =& $this->unit_bo;

		// unit_cu
		$this->unit_cu = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_unit_cu', 'unit_cu', '`unit_cu`', 200, -1, FALSE, '`unit_cu`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['unit_cu'] =& $this->unit_cu;

		// pi
		$this->pi = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_pi', 'pi', '`pi`', 3, -1, FALSE, '`pi`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->pi->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['pi'] =& $this->pi;

		// pi_no
		$this->pi_no = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_pi_no', 'pi_no', '`pi_no`', 20, -1, FALSE, '`pi_no`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->pi_no->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['pi_no'] =& $this->pi_no;

		// pi_description
		$this->pi_description = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_pi_description', 'pi_description', '`pi_description`', 200, -1, FALSE, '`pi_description`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['pi_description'] =& $this->pi_description;

		// pi_1
		$this->pi_1 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_pi_1', 'pi_1', '`pi_1`', 200, -1, FALSE, '`pi_1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['pi_1'] =& $this->pi_1;

		// target
		$this->target = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_target', 'target', '`target`', 5, -1, FALSE, '`target`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->target->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['target'] =& $this->target;

		// t_numerator
		$this->t_numerator = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_t_numerator', 't_numerator', '`t_numerator`', 5, -1, FALSE, '`t_numerator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_numerator->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_numerator'] =& $this->t_numerator;

		// t_numerator_qtr1
		$this->t_numerator_qtr1 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_t_numerator_qtr1', 't_numerator_qtr1', '`t_numerator_qtr1`', 5, -1, FALSE, '`t_numerator_qtr1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_numerator_qtr1->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_numerator_qtr1'] =& $this->t_numerator_qtr1;

		// t_numerator_qtr2
		$this->t_numerator_qtr2 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_t_numerator_qtr2', 't_numerator_qtr2', '`t_numerator_qtr2`', 5, -1, FALSE, '`t_numerator_qtr2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_numerator_qtr2->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_numerator_qtr2'] =& $this->t_numerator_qtr2;

		// t_numerator_qtr3
		$this->t_numerator_qtr3 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_t_numerator_qtr3', 't_numerator_qtr3', '`t_numerator_qtr3`', 5, -1, FALSE, '`t_numerator_qtr3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_numerator_qtr3->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_numerator_qtr3'] =& $this->t_numerator_qtr3;

		// t_numerator_qtr4
		$this->t_numerator_qtr4 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_t_numerator_qtr4', 't_numerator_qtr4', '`t_numerator_qtr4`', 5, -1, FALSE, '`t_numerator_qtr4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_numerator_qtr4->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_numerator_qtr4'] =& $this->t_numerator_qtr4;

		// t_denominator
		$this->t_denominator = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_t_denominator', 't_denominator', '`t_denominator`', 5, -1, FALSE, '`t_denominator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_denominator->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_denominator'] =& $this->t_denominator;

		// t_denominator_qtr1
		$this->t_denominator_qtr1 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_t_denominator_qtr1', 't_denominator_qtr1', '`t_denominator_qtr1`', 5, -1, FALSE, '`t_denominator_qtr1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_denominator_qtr1->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_denominator_qtr1'] =& $this->t_denominator_qtr1;

		// t_denominator_qtr2
		$this->t_denominator_qtr2 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_t_denominator_qtr2', 't_denominator_qtr2', '`t_denominator_qtr2`', 5, -1, FALSE, '`t_denominator_qtr2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_denominator_qtr2->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_denominator_qtr2'] =& $this->t_denominator_qtr2;

		// t_denominator_qtr3
		$this->t_denominator_qtr3 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_t_denominator_qtr3', 't_denominator_qtr3', '`t_denominator_qtr3`', 5, -1, FALSE, '`t_denominator_qtr3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_denominator_qtr3->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_denominator_qtr3'] =& $this->t_denominator_qtr3;

		// t_denominator_qtr4
		$this->t_denominator_qtr4 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_t_denominator_qtr4', 't_denominator_qtr4', '`t_denominator_qtr4`', 5, -1, FALSE, '`t_denominator_qtr4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->t_denominator_qtr4->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['t_denominator_qtr4'] =& $this->t_denominator_qtr4;

		// accomplishment
		$this->accomplishment = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_accomplishment', 'accomplishment', '`accomplishment`', 5, -1, FALSE, '`accomplishment`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->accomplishment->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['accomplishment'] =& $this->accomplishment;

		// a_numerator
		$this->a_numerator = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_a_numerator', 'a_numerator', '`a_numerator`', 5, -1, FALSE, '`a_numerator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_numerator->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_numerator'] =& $this->a_numerator;

		// a_numerator_qtr1
		$this->a_numerator_qtr1 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_a_numerator_qtr1', 'a_numerator_qtr1', '`a_numerator_qtr1`', 5, -1, FALSE, '`a_numerator_qtr1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_numerator_qtr1->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_numerator_qtr1'] =& $this->a_numerator_qtr1;

		// a_numerator_qtr2
		$this->a_numerator_qtr2 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_a_numerator_qtr2', 'a_numerator_qtr2', '`a_numerator_qtr2`', 5, -1, FALSE, '`a_numerator_qtr2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_numerator_qtr2->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_numerator_qtr2'] =& $this->a_numerator_qtr2;

		// a_numerator_qtr3
		$this->a_numerator_qtr3 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_a_numerator_qtr3', 'a_numerator_qtr3', '`a_numerator_qtr3`', 5, -1, FALSE, '`a_numerator_qtr3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_numerator_qtr3->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_numerator_qtr3'] =& $this->a_numerator_qtr3;

		// a_numerator_qtr4
		$this->a_numerator_qtr4 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_a_numerator_qtr4', 'a_numerator_qtr4', '`a_numerator_qtr4`', 5, -1, FALSE, '`a_numerator_qtr4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_numerator_qtr4->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_numerator_qtr4'] =& $this->a_numerator_qtr4;

		// a_denominator
		$this->a_denominator = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_a_denominator', 'a_denominator', '`a_denominator`', 5, -1, FALSE, '`a_denominator`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_denominator->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_denominator'] =& $this->a_denominator;

		// a_denominator_qtr1
		$this->a_denominator_qtr1 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_a_denominator_qtr1', 'a_denominator_qtr1', '`a_denominator_qtr1`', 5, -1, FALSE, '`a_denominator_qtr1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_denominator_qtr1->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_denominator_qtr1'] =& $this->a_denominator_qtr1;

		// a_denominator_qtr2
		$this->a_denominator_qtr2 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_a_denominator_qtr2', 'a_denominator_qtr2', '`a_denominator_qtr2`', 5, -1, FALSE, '`a_denominator_qtr2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_denominator_qtr2->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_denominator_qtr2'] =& $this->a_denominator_qtr2;

		// a_denominator_qtr3
		$this->a_denominator_qtr3 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_a_denominator_qtr3', 'a_denominator_qtr3', '`a_denominator_qtr3`', 5, -1, FALSE, '`a_denominator_qtr3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_denominator_qtr3->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_denominator_qtr3'] =& $this->a_denominator_qtr3;

		// a_denominator_qtr4
		$this->a_denominator_qtr4 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_a_denominator_qtr4', 'a_denominator_qtr4', '`a_denominator_qtr4`', 5, -1, FALSE, '`a_denominator_qtr4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->a_denominator_qtr4->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_denominator_qtr4'] =& $this->a_denominator_qtr4;

		// remarks
		$this->remarks = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_remarks', 'remarks', '`remarks`', 200, -1, FALSE, '`remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['remarks'] =& $this->remarks;

		// cu_sequence
		$this->cu_sequence = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_cu_sequence', 'cu_sequence', '`cu_sequence`', 200, -1, FALSE, '`cu_sequence`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['cu_sequence'] =& $this->cu_sequence;

		// id_units
		$this->id_units = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_id_units', 'id_units', '`id_units`', 3, -1, FALSE, '`id_units`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->id_units->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['id_units'] =& $this->id_units;

		// id_cu
		$this->id_cu = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_id_cu', 'id_cu', '`id_cu`', 3, -1, FALSE, '`id_cu`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->id_cu->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['id_cu'] =& $this->id_cu;

		// above_90
		$this->above_90 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_above_90', 'above_90', '`above_90`', 5, -1, FALSE, '`above_90`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->above_90->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['above_90'] =& $this->above_90;

		// below_90
		$this->below_90 = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_below_90', 'below_90', '`below_90`', 5, -1, FALSE, '`below_90`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->below_90->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['below_90'] =& $this->below_90;

		// collectionPeriod_status
		$this->collectionPeriod_status = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_collectionPeriod_status', 'collectionPeriod_status', '`collectionPeriod_status`', 200, -1, FALSE, '`collectionPeriod_status`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['collectionPeriod_status'] =& $this->collectionPeriod_status;

		// remarks_cutOffDate
		$this->remarks_cutOffDate = new cField('view_trans_tbl_accomplishment_a_mfo_1', 'view_trans_tbl_accomplishment_a_mfo_1', 'x_remarks_cutOffDate', 'remarks_cutOffDate', '`remarks_cutOffDate`', 135, 6, FALSE, '`remarks_cutOffDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->remarks_cutOffDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['remarks_cutOffDate'] =& $this->remarks_cutOffDate;
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
		return "view_trans_tbl_accomplishment_a_mfo_1_Highlight";
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
		return "`view_trans_tbl_accomplishment_a_mfo_1`";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
		$sWhere = "";
		$this->TableFilter = " `target` <> 0.00 AND `pi` = '1' AND `collectionPeriod_status` = 'A' ";
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
		return "INSERT INTO `view_trans_tbl_accomplishment_a_mfo_1` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `view_trans_tbl_accomplishment_a_mfo_1` SET ";
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
		$SQL = "DELETE FROM `view_trans_tbl_accomplishment_a_mfo_1` WHERE ";
		$SQL .= up_QuotedName('pi_id') . '=' . up_QuotedValue($rs['pi_id'], $this->pi_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`pi_id` = @pi_id@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->pi_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@pi_id@", up_AdjustSql($this->pi_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "view_trans_tbl_accomplishment_a_mfo_1list.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "view_trans_tbl_accomplishment_a_mfo_1list.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("view_trans_tbl_accomplishment_a_mfo_1view.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "view_trans_tbl_accomplishment_a_mfo_1add.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("view_trans_tbl_accomplishment_a_mfo_1edit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("view_trans_tbl_accomplishment_a_mfo_1add.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("view_trans_tbl_accomplishment_a_mfo_1delete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->pi_id->CurrentValue)) {
			$sUrl .= "pi_id=" . urlencode($this->pi_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=view_trans_tbl_accomplishment_a_mfo_1" : "";
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
			$arKeys[] = @$_GET["pi_id"]; // pi_id

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
			$this->pi_id->CurrentValue = $key;
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
		$this->pi_id->setDbValue($rs->fields('pi_id'));
		$this->id->setDbValue($rs->fields('id'));
		$this->unit_bo->setDbValue($rs->fields('unit_bo'));
		$this->unit_cu->setDbValue($rs->fields('unit_cu'));
		$this->pi->setDbValue($rs->fields('pi'));
		$this->pi_no->setDbValue($rs->fields('pi_no'));
		$this->pi_description->setDbValue($rs->fields('pi_description'));
		$this->pi_1->setDbValue($rs->fields('pi_1'));
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
		$this->remarks->setDbValue($rs->fields('remarks'));
		$this->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$this->id_units->setDbValue($rs->fields('id_units'));
		$this->id_cu->setDbValue($rs->fields('id_cu'));
		$this->above_90->setDbValue($rs->fields('above_90'));
		$this->below_90->setDbValue($rs->fields('below_90'));
		$this->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
		$this->remarks_cutOffDate->setDbValue($rs->fields('remarks_cutOffDate'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// pi_id
		// id
		// unit_bo

		$this->unit_bo->CellCssStyle = "white-space: nowrap;";

		// unit_cu
		$this->unit_cu->CellCssStyle = "white-space: nowrap;";

		// pi
		// pi_no
		// pi_description

		$this->pi_description->CellCssStyle = "white-space: nowrap;";

		// pi_1
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
		// remarks

		$this->remarks->CellCssStyle = "white-space: nowrap;";

		// cu_sequence
		// id_units
		// id_cu
		// above_90
		// below_90
		// collectionPeriod_status

		$this->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";

		// remarks_cutOffDate
		$this->remarks_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// pi_id
		$this->pi_id->ViewValue = $this->pi_id->CurrentValue;
		$this->pi_id->ViewCustomAttributes = "";

		// id
		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// unit_bo
		$this->unit_bo->ViewValue = $this->unit_bo->CurrentValue;
		$this->unit_bo->ViewCustomAttributes = "";

		// unit_cu
		$this->unit_cu->ViewValue = $this->unit_cu->CurrentValue;
		$this->unit_cu->ViewCustomAttributes = "";

		// pi
		$this->pi->ViewValue = $this->pi->CurrentValue;
		$this->pi->ViewCustomAttributes = "";

		// pi_no
		$this->pi_no->ViewValue = $this->pi_no->CurrentValue;
		$this->pi_no->ViewCustomAttributes = "";

		// pi_description
		$this->pi_description->ViewValue = $this->pi_description->CurrentValue;
		$this->pi_description->ViewCustomAttributes = "";

		// pi_1
		$this->pi_1->ViewValue = $this->pi_1->CurrentValue;
		$this->pi_1->ViewCustomAttributes = "";

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
		$this->t_numerator_qtr1->CssStyle = "text-align:right;";
		$this->t_numerator_qtr1->ViewCustomAttributes = "";

		// t_numerator_qtr2
		$this->t_numerator_qtr2->ViewValue = $this->t_numerator_qtr2->CurrentValue;
		$this->t_numerator_qtr2->CssStyle = "text-align:right;";
		$this->t_numerator_qtr2->ViewCustomAttributes = "";

		// t_numerator_qtr3
		$this->t_numerator_qtr3->ViewValue = $this->t_numerator_qtr3->CurrentValue;
		$this->t_numerator_qtr3->CssStyle = "text-align:right;";
		$this->t_numerator_qtr3->ViewCustomAttributes = "";

		// t_numerator_qtr4
		$this->t_numerator_qtr4->ViewValue = $this->t_numerator_qtr4->CurrentValue;
		$this->t_numerator_qtr4->CssStyle = "text-align:right;";
		$this->t_numerator_qtr4->ViewCustomAttributes = "";

		// t_denominator
		$this->t_denominator->ViewValue = $this->t_denominator->CurrentValue;
		$this->t_denominator->CssStyle = "text-align:right;";
		$this->t_denominator->ViewCustomAttributes = "";

		// t_denominator_qtr1
		$this->t_denominator_qtr1->ViewValue = $this->t_denominator_qtr1->CurrentValue;
		$this->t_denominator_qtr1->CssStyle = "text-align:right;";
		$this->t_denominator_qtr1->ViewCustomAttributes = "";

		// t_denominator_qtr2
		$this->t_denominator_qtr2->ViewValue = $this->t_denominator_qtr2->CurrentValue;
		$this->t_denominator_qtr2->CssStyle = "text-align:right;";
		$this->t_denominator_qtr2->ViewCustomAttributes = "";

		// t_denominator_qtr3
		$this->t_denominator_qtr3->ViewValue = $this->t_denominator_qtr3->CurrentValue;
		$this->t_denominator_qtr3->CssStyle = "text-align:right;";
		$this->t_denominator_qtr3->ViewCustomAttributes = "";

		// t_denominator_qtr4
		$this->t_denominator_qtr4->ViewValue = $this->t_denominator_qtr4->CurrentValue;
		$this->t_denominator_qtr4->CssStyle = "text-align:right;";
		$this->t_denominator_qtr4->ViewCustomAttributes = "";

		// accomplishment
		$this->accomplishment->ViewValue = $this->accomplishment->CurrentValue;
		$this->accomplishment->CssStyle = "font-weight:bold;text-align:right;";
		$this->accomplishment->ViewCustomAttributes = "";

		// a_numerator
		$this->a_numerator->ViewValue = $this->a_numerator->CurrentValue;
		$this->a_numerator->CssStyle = "text-align:right;";
		$this->a_numerator->ViewCustomAttributes = "";

		// a_numerator_qtr1
		$this->a_numerator_qtr1->ViewValue = $this->a_numerator_qtr1->CurrentValue;
		$this->a_numerator_qtr1->CssStyle = "text-align:right;";
		$this->a_numerator_qtr1->ViewCustomAttributes = "";

		// a_numerator_qtr2
		$this->a_numerator_qtr2->ViewValue = $this->a_numerator_qtr2->CurrentValue;
		$this->a_numerator_qtr2->CssStyle = "text-align:right;";
		$this->a_numerator_qtr2->ViewCustomAttributes = "";

		// a_numerator_qtr3
		$this->a_numerator_qtr3->ViewValue = $this->a_numerator_qtr3->CurrentValue;
		$this->a_numerator_qtr3->CssStyle = "text-align:right;";
		$this->a_numerator_qtr3->ViewCustomAttributes = "";

		// a_numerator_qtr4
		$this->a_numerator_qtr4->ViewValue = $this->a_numerator_qtr4->CurrentValue;
		$this->a_numerator_qtr4->CssStyle = "text-align:right;";
		$this->a_numerator_qtr4->ViewCustomAttributes = "";

		// a_denominator
		$this->a_denominator->ViewValue = $this->a_denominator->CurrentValue;
		$this->a_denominator->CssStyle = "text-align:right;";
		$this->a_denominator->ViewCustomAttributes = "";

		// a_denominator_qtr1
		$this->a_denominator_qtr1->ViewValue = $this->a_denominator_qtr1->CurrentValue;
		$this->a_denominator_qtr1->CssStyle = "text-align:right;";
		$this->a_denominator_qtr1->ViewCustomAttributes = "";

		// a_denominator_qtr2
		$this->a_denominator_qtr2->ViewValue = $this->a_denominator_qtr2->CurrentValue;
		$this->a_denominator_qtr2->CssStyle = "text-align:right;";
		$this->a_denominator_qtr2->ViewCustomAttributes = "";

		// a_denominator_qtr3
		$this->a_denominator_qtr3->ViewValue = $this->a_denominator_qtr3->CurrentValue;
		$this->a_denominator_qtr3->CssStyle = "text-align:right;";
		$this->a_denominator_qtr3->ViewCustomAttributes = "";

		// a_denominator_qtr4
		$this->a_denominator_qtr4->ViewValue = $this->a_denominator_qtr4->CurrentValue;
		$this->a_denominator_qtr4->CssStyle = "text-align:right;";
		$this->a_denominator_qtr4->ViewCustomAttributes = "";

		// remarks
		$this->remarks->ViewValue = $this->remarks->CurrentValue;
		$this->remarks->ViewCustomAttributes = "";

		// cu_sequence
		$this->cu_sequence->ViewValue = $this->cu_sequence->CurrentValue;
		$this->cu_sequence->ViewCustomAttributes = "";

		// id_units
		$this->id_units->ViewValue = $this->id_units->CurrentValue;
		$this->id_units->ViewCustomAttributes = "";

		// id_cu
		$this->id_cu->ViewValue = $this->id_cu->CurrentValue;
		$this->id_cu->ViewCustomAttributes = "";

		// above_90
		$this->above_90->ViewValue = $this->above_90->CurrentValue;
		$this->above_90->CssStyle = "text-align:right;";
		$this->above_90->ViewCustomAttributes = "";

		// below_90
		$this->below_90->ViewValue = $this->below_90->CurrentValue;
		$this->below_90->CssStyle = "text-align:right;";
		$this->below_90->ViewCustomAttributes = "";

		// collectionPeriod_status
		$this->collectionPeriod_status->ViewValue = $this->collectionPeriod_status->CurrentValue;
		$this->collectionPeriod_status->ViewCustomAttributes = "";

		// remarks_cutOffDate
		$this->remarks_cutOffDate->ViewValue = $this->remarks_cutOffDate->CurrentValue;
		$this->remarks_cutOffDate->ViewValue = up_FormatDateTime($this->remarks_cutOffDate->ViewValue, 6);
		$this->remarks_cutOffDate->ViewCustomAttributes = "";

		// pi_id
		$this->pi_id->LinkCustomAttributes = "";
		$this->pi_id->HrefValue = "";
		$this->pi_id->TooltipValue = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// unit_bo
		$this->unit_bo->LinkCustomAttributes = "";
		$this->unit_bo->HrefValue = "";
		$this->unit_bo->TooltipValue = "";

		// unit_cu
		$this->unit_cu->LinkCustomAttributes = "";
		$this->unit_cu->HrefValue = "";
		$this->unit_cu->TooltipValue = "";

		// pi
		$this->pi->LinkCustomAttributes = "";
		$this->pi->HrefValue = "";
		$this->pi->TooltipValue = "";

		// pi_no
		$this->pi_no->LinkCustomAttributes = "";
		$this->pi_no->HrefValue = "";
		$this->pi_no->TooltipValue = "";

		// pi_description
		$this->pi_description->LinkCustomAttributes = "";
		$this->pi_description->HrefValue = "";
		$this->pi_description->TooltipValue = "";

		// pi_1
		$this->pi_1->LinkCustomAttributes = "";
		$this->pi_1->HrefValue = "";
		$this->pi_1->TooltipValue = "";

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

		// remarks
		$this->remarks->LinkCustomAttributes = "";
		$this->remarks->HrefValue = "";
		$this->remarks->TooltipValue = "";

		// cu_sequence
		$this->cu_sequence->LinkCustomAttributes = "";
		$this->cu_sequence->HrefValue = "";
		$this->cu_sequence->TooltipValue = "";

		// id_units
		$this->id_units->LinkCustomAttributes = "";
		$this->id_units->HrefValue = "";
		$this->id_units->TooltipValue = "";

		// id_cu
		$this->id_cu->LinkCustomAttributes = "";
		$this->id_cu->HrefValue = "";
		$this->id_cu->TooltipValue = "";

		// above_90
		$this->above_90->LinkCustomAttributes = "";
		$this->above_90->HrefValue = "";
		$this->above_90->TooltipValue = "";

		// below_90
		$this->below_90->LinkCustomAttributes = "";
		$this->below_90->HrefValue = "";
		$this->below_90->TooltipValue = "";

		// collectionPeriod_status
		$this->collectionPeriod_status->LinkCustomAttributes = "";
		$this->collectionPeriod_status->HrefValue = "";
		$this->collectionPeriod_status->TooltipValue = "";

		// remarks_cutOffDate
		$this->remarks_cutOffDate->LinkCustomAttributes = "";
		$this->remarks_cutOffDate->HrefValue = "";
		$this->remarks_cutOffDate->TooltipValue = "";

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
				} else {
					$XmlDoc->AddField('pi_id', $this->pi_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('id', $this->id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('unit_bo', $this->unit_bo->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('unit_cu', $this->unit_cu->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi', $this->pi->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_no', $this->pi_no->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_description', $this->pi_description->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('pi_1', $this->pi_1->ExportValue($this->Export, $this->ExportOriginalValue));
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
					$XmlDoc->AddField('remarks', $this->remarks->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('cu_sequence', $this->cu_sequence->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('id_units', $this->id_units->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('id_cu', $this->id_cu->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('above_90', $this->above_90->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('below_90', $this->below_90->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('remarks_cutOffDate', $this->remarks_cutOffDate->ExportValue($this->Export, $this->ExportOriginalValue));
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
			} else {
				$Doc->ExportCaption($this->pi_id);
				$Doc->ExportCaption($this->id);
				$Doc->ExportCaption($this->unit_bo);
				$Doc->ExportCaption($this->unit_cu);
				$Doc->ExportCaption($this->pi);
				$Doc->ExportCaption($this->pi_no);
				$Doc->ExportCaption($this->pi_description);
				$Doc->ExportCaption($this->pi_1);
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
				$Doc->ExportCaption($this->remarks);
				$Doc->ExportCaption($this->cu_sequence);
				$Doc->ExportCaption($this->id_units);
				$Doc->ExportCaption($this->id_cu);
				$Doc->ExportCaption($this->above_90);
				$Doc->ExportCaption($this->below_90);
				$Doc->ExportCaption($this->remarks_cutOffDate);
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
				} else {
					$Doc->ExportField($this->pi_id);
					$Doc->ExportField($this->id);
					$Doc->ExportField($this->unit_bo);
					$Doc->ExportField($this->unit_cu);
					$Doc->ExportField($this->pi);
					$Doc->ExportField($this->pi_no);
					$Doc->ExportField($this->pi_description);
					$Doc->ExportField($this->pi_1);
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
					$Doc->ExportField($this->remarks);
					$Doc->ExportField($this->cu_sequence);
					$Doc->ExportField($this->id_units);
					$Doc->ExportField($this->id_cu);
					$Doc->ExportField($this->above_90);
					$Doc->ExportField($this->below_90);
					$Doc->ExportField($this->remarks_cutOffDate);
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
				$sFilterWrk = '`id_units` IN (' . $sFilterWrk . ')';
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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `view_trans_tbl_accomplishment_a_mfo_1` WHERE " . $this->AddUserIDFilter("");

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
