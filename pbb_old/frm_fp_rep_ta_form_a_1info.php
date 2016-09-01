<?php

// Global variable for table object
$frm_fp_rep_ta_form_a_1 = NULL;

//
// Table class for frm_fp_rep_ta_form_a_1
//
class cfrm_fp_rep_ta_form_a_1 {
	var $TableVar = 'frm_fp_rep_ta_form_a_1';
	var $TableName = 'frm_fp_rep_ta_form_a_1';
	var $TableType = 'TABLE';
	var $units_id;
	var $focal_person_id;
	var $Constituent_University;
	var $Delivery_Unit;
	var $PI_1;
	var $PI_Question_28129;
	var $Target_28129;
	var $Target_N_28129;
	var $Target_D_28129;
	var $Remarks_28129;
	var $PI_2;
	var $PI_Question_28229;
	var $Target_28229;
	var $Target_N_28229;
	var $Target_D_28229;
	var $Remarks_28229;
	var $PI_3;
	var $PI_Question_28329;
	var $Target_28329;
	var $Target_N_28329;
	var $Target_D_28329;
	var $Remarks_28329;
	var $PI_4;
	var $PI_Question_28429;
	var $Target_28429;
	var $Target_N_28429;
	var $Target_D_28429;
	var $Remarks_28429;
	var $PI_5;
	var $PI_Question_28529;
	var $Target_28529;
	var $Target_N_28529;
	var $Target_D_28529;
	var $Remarks_28529;
	var $PI_6;
	var $PI_Question_28629;
	var $Target_28629;
	var $Target_N_28629;
	var $Target_D_28629;
	var $Remarks_28629;
	var $PI_7;
	var $PI_Question_28729;
	var $Target_28729;
	var $Target_N_28729;
	var $Target_D_28729;
	var $Remarks_28729;
	var $PI_8;
	var $PI_Question_28829;
	var $Target_28829;
	var $Target_N_28829;
	var $Target_D_28829;
	var $Remarks_28829;
	var $PI_9;
	var $PI_Question_28929;
	var $Target_28929;
	var $Target_N_28929;
	var $Target_D_28929;
	var $Remarks_28929;
	var $PI_10;
	var $PI_Question_281029;
	var $Target_281029;
	var $Target_N_281029;
	var $Target_D_281029;
	var $Remarks_281029;
	var $PI_11;
	var $PI_Question_281129;
	var $Target_281129;
	var $Target_N_281129;
	var $Target_D_281129;
	var $Remarks_281129;
	var $PI_12;
	var $PI_Question_281229;
	var $Target_281229;
	var $Target_N_281229;
	var $Target_D_281229;
	var $Remarks_281229;
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
	function cfrm_fp_rep_ta_form_a_1() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// units_id
		$this->units_id = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_units_id', 'units_id', '`units_id`', 3, -1, FALSE, '`units_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->units_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['units_id'] =& $this->units_id;

		// focal_person_id
		$this->focal_person_id = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_focal_person_id', 'focal_person_id', '`focal_person_id`', 3, -1, FALSE, '`focal_person_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focal_person_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focal_person_id'] =& $this->focal_person_id;

		// Constituent University
		$this->Constituent_University = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Constituent_University', 'Constituent University', '`Constituent University`', 200, -1, FALSE, '`Constituent University`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Constituent University'] =& $this->Constituent_University;

		// Delivery Unit
		$this->Delivery_Unit = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Delivery_Unit', 'Delivery Unit', '`Delivery Unit`', 200, -1, FALSE, '`Delivery Unit`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Delivery Unit'] =& $this->Delivery_Unit;

		// PI 1
		$this->PI_1 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_1', 'PI 1', '`PI 1`', 200, -1, FALSE, '`PI 1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI 1'] =& $this->PI_1;

		// PI Question (1)
		$this->PI_Question_28129 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_Question_28129', 'PI Question (1)', '`PI Question (1)`', 200, -1, FALSE, '`PI Question (1)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Question (1)'] =& $this->PI_Question_28129;

		// Target (1)
		$this->Target_28129 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_28129', 'Target (1)', '`Target (1)`', 5, -1, FALSE, '`Target (1)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (1)'] =& $this->Target_28129;

		// Target N (1)
		$this->Target_N_28129 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_N_28129', 'Target N (1)', '`Target N (1)`', 5, -1, FALSE, '`Target N (1)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_N_28129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target N (1)'] =& $this->Target_N_28129;

		// Target D (1)
		$this->Target_D_28129 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_D_28129', 'Target D (1)', '`Target D (1)`', 5, -1, FALSE, '`Target D (1)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_D_28129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target D (1)'] =& $this->Target_D_28129;

		// Remarks (1)
		$this->Remarks_28129 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Remarks_28129', 'Remarks (1)', '`Remarks (1)`', 200, -1, FALSE, '`Remarks (1)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (1)'] =& $this->Remarks_28129;

		// PI 2
		$this->PI_2 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_2', 'PI 2', '`PI 2`', 200, -1, FALSE, '`PI 2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI 2'] =& $this->PI_2;

		// PI Question (2)
		$this->PI_Question_28229 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_Question_28229', 'PI Question (2)', '`PI Question (2)`', 200, -1, FALSE, '`PI Question (2)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Question (2)'] =& $this->PI_Question_28229;

		// Target (2)
		$this->Target_28229 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_28229', 'Target (2)', '`Target (2)`', 5, -1, FALSE, '`Target (2)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (2)'] =& $this->Target_28229;

		// Target N (2)
		$this->Target_N_28229 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_N_28229', 'Target N (2)', '`Target N (2)`', 5, -1, FALSE, '`Target N (2)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_N_28229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target N (2)'] =& $this->Target_N_28229;

		// Target D (2)
		$this->Target_D_28229 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_D_28229', 'Target D (2)', '`Target D (2)`', 5, -1, FALSE, '`Target D (2)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_D_28229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target D (2)'] =& $this->Target_D_28229;

		// Remarks (2)
		$this->Remarks_28229 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Remarks_28229', 'Remarks (2)', '`Remarks (2)`', 200, -1, FALSE, '`Remarks (2)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (2)'] =& $this->Remarks_28229;

		// PI 3
		$this->PI_3 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_3', 'PI 3', '`PI 3`', 200, -1, FALSE, '`PI 3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI 3'] =& $this->PI_3;

		// PI Question (3)
		$this->PI_Question_28329 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_Question_28329', 'PI Question (3)', '`PI Question (3)`', 200, -1, FALSE, '`PI Question (3)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Question (3)'] =& $this->PI_Question_28329;

		// Target (3)
		$this->Target_28329 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_28329', 'Target (3)', '`Target (3)`', 5, -1, FALSE, '`Target (3)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28329->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (3)'] =& $this->Target_28329;

		// Target N (3)
		$this->Target_N_28329 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_N_28329', 'Target N (3)', '`Target N (3)`', 5, -1, FALSE, '`Target N (3)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_N_28329->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target N (3)'] =& $this->Target_N_28329;

		// Target D (3)
		$this->Target_D_28329 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_D_28329', 'Target D (3)', '`Target D (3)`', 5, -1, FALSE, '`Target D (3)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_D_28329->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target D (3)'] =& $this->Target_D_28329;

		// Remarks (3)
		$this->Remarks_28329 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Remarks_28329', 'Remarks (3)', '`Remarks (3)`', 200, -1, FALSE, '`Remarks (3)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (3)'] =& $this->Remarks_28329;

		// PI 4
		$this->PI_4 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_4', 'PI 4', '`PI 4`', 200, -1, FALSE, '`PI 4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI 4'] =& $this->PI_4;

		// PI Question (4)
		$this->PI_Question_28429 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_Question_28429', 'PI Question (4)', '`PI Question (4)`', 200, -1, FALSE, '`PI Question (4)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Question (4)'] =& $this->PI_Question_28429;

		// Target (4)
		$this->Target_28429 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_28429', 'Target (4)', '`Target (4)`', 5, -1, FALSE, '`Target (4)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28429->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (4)'] =& $this->Target_28429;

		// Target N (4)
		$this->Target_N_28429 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_N_28429', 'Target N (4)', '`Target N (4)`', 5, -1, FALSE, '`Target N (4)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_N_28429->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target N (4)'] =& $this->Target_N_28429;

		// Target D (4)
		$this->Target_D_28429 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_D_28429', 'Target D (4)', '`Target D (4)`', 5, -1, FALSE, '`Target D (4)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_D_28429->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target D (4)'] =& $this->Target_D_28429;

		// Remarks (4)
		$this->Remarks_28429 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Remarks_28429', 'Remarks (4)', '`Remarks (4)`', 200, -1, FALSE, '`Remarks (4)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (4)'] =& $this->Remarks_28429;

		// PI 5
		$this->PI_5 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_5', 'PI 5', '`PI 5`', 200, -1, FALSE, '`PI 5`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI 5'] =& $this->PI_5;

		// PI Question (5)
		$this->PI_Question_28529 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_Question_28529', 'PI Question (5)', '`PI Question (5)`', 200, -1, FALSE, '`PI Question (5)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Question (5)'] =& $this->PI_Question_28529;

		// Target (5)
		$this->Target_28529 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_28529', 'Target (5)', '`Target (5)`', 5, -1, FALSE, '`Target (5)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28529->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (5)'] =& $this->Target_28529;

		// Target N (5)
		$this->Target_N_28529 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_N_28529', 'Target N (5)', '`Target N (5)`', 5, -1, FALSE, '`Target N (5)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_N_28529->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target N (5)'] =& $this->Target_N_28529;

		// Target D (5)
		$this->Target_D_28529 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_D_28529', 'Target D (5)', '`Target D (5)`', 5, -1, FALSE, '`Target D (5)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_D_28529->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target D (5)'] =& $this->Target_D_28529;

		// Remarks (5)
		$this->Remarks_28529 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Remarks_28529', 'Remarks (5)', '`Remarks (5)`', 200, -1, FALSE, '`Remarks (5)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (5)'] =& $this->Remarks_28529;

		// PI 6
		$this->PI_6 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_6', 'PI 6', '`PI 6`', 200, -1, FALSE, '`PI 6`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI 6'] =& $this->PI_6;

		// PI Question (6)
		$this->PI_Question_28629 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_Question_28629', 'PI Question (6)', '`PI Question (6)`', 200, -1, FALSE, '`PI Question (6)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Question (6)'] =& $this->PI_Question_28629;

		// Target (6)
		$this->Target_28629 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_28629', 'Target (6)', '`Target (6)`', 5, -1, FALSE, '`Target (6)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28629->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (6)'] =& $this->Target_28629;

		// Target N (6)
		$this->Target_N_28629 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_N_28629', 'Target N (6)', '`Target N (6)`', 5, -1, FALSE, '`Target N (6)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_N_28629->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target N (6)'] =& $this->Target_N_28629;

		// Target D (6)
		$this->Target_D_28629 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_D_28629', 'Target D (6)', '`Target D (6)`', 5, -1, FALSE, '`Target D (6)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_D_28629->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target D (6)'] =& $this->Target_D_28629;

		// Remarks (6)
		$this->Remarks_28629 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Remarks_28629', 'Remarks (6)', '`Remarks (6)`', 200, -1, FALSE, '`Remarks (6)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (6)'] =& $this->Remarks_28629;

		// PI 7
		$this->PI_7 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_7', 'PI 7', '`PI 7`', 200, -1, FALSE, '`PI 7`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI 7'] =& $this->PI_7;

		// PI Question (7)
		$this->PI_Question_28729 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_Question_28729', 'PI Question (7)', '`PI Question (7)`', 200, -1, FALSE, '`PI Question (7)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Question (7)'] =& $this->PI_Question_28729;

		// Target (7)
		$this->Target_28729 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_28729', 'Target (7)', '`Target (7)`', 5, -1, FALSE, '`Target (7)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28729->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (7)'] =& $this->Target_28729;

		// Target N (7)
		$this->Target_N_28729 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_N_28729', 'Target N (7)', '`Target N (7)`', 5, -1, FALSE, '`Target N (7)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_N_28729->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target N (7)'] =& $this->Target_N_28729;

		// Target D (7)
		$this->Target_D_28729 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_D_28729', 'Target D (7)', '`Target D (7)`', 5, -1, FALSE, '`Target D (7)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_D_28729->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target D (7)'] =& $this->Target_D_28729;

		// Remarks (7)
		$this->Remarks_28729 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Remarks_28729', 'Remarks (7)', '`Remarks (7)`', 200, -1, FALSE, '`Remarks (7)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (7)'] =& $this->Remarks_28729;

		// PI 8
		$this->PI_8 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_8', 'PI 8', '`PI 8`', 200, -1, FALSE, '`PI 8`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI 8'] =& $this->PI_8;

		// PI Question (8)
		$this->PI_Question_28829 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_Question_28829', 'PI Question (8)', '`PI Question (8)`', 200, -1, FALSE, '`PI Question (8)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Question (8)'] =& $this->PI_Question_28829;

		// Target (8)
		$this->Target_28829 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_28829', 'Target (8)', '`Target (8)`', 5, -1, FALSE, '`Target (8)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28829->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (8)'] =& $this->Target_28829;

		// Target N (8)
		$this->Target_N_28829 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_N_28829', 'Target N (8)', '`Target N (8)`', 5, -1, FALSE, '`Target N (8)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_N_28829->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target N (8)'] =& $this->Target_N_28829;

		// Target D (8)
		$this->Target_D_28829 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_D_28829', 'Target D (8)', '`Target D (8)`', 5, -1, FALSE, '`Target D (8)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_D_28829->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target D (8)'] =& $this->Target_D_28829;

		// Remarks (8)
		$this->Remarks_28829 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Remarks_28829', 'Remarks (8)', '`Remarks (8)`', 200, -1, FALSE, '`Remarks (8)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (8)'] =& $this->Remarks_28829;

		// PI 9
		$this->PI_9 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_9', 'PI 9', '`PI 9`', 200, -1, FALSE, '`PI 9`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI 9'] =& $this->PI_9;

		// PI Question (9)
		$this->PI_Question_28929 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_Question_28929', 'PI Question (9)', '`PI Question (9)`', 200, -1, FALSE, '`PI Question (9)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Question (9)'] =& $this->PI_Question_28929;

		// Target (9)
		$this->Target_28929 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_28929', 'Target (9)', '`Target (9)`', 5, -1, FALSE, '`Target (9)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28929->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (9)'] =& $this->Target_28929;

		// Target N (9)
		$this->Target_N_28929 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_N_28929', 'Target N (9)', '`Target N (9)`', 5, -1, FALSE, '`Target N (9)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_N_28929->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target N (9)'] =& $this->Target_N_28929;

		// Target D (9)
		$this->Target_D_28929 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_D_28929', 'Target D (9)', '`Target D (9)`', 5, -1, FALSE, '`Target D (9)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_D_28929->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target D (9)'] =& $this->Target_D_28929;

		// Remarks (9)
		$this->Remarks_28929 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Remarks_28929', 'Remarks (9)', '`Remarks (9)`', 200, -1, FALSE, '`Remarks (9)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (9)'] =& $this->Remarks_28929;

		// PI 10
		$this->PI_10 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_10', 'PI 10', '`PI 10`', 200, -1, FALSE, '`PI 10`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI 10'] =& $this->PI_10;

		// PI Question (10)
		$this->PI_Question_281029 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_Question_281029', 'PI Question (10)', '`PI Question (10)`', 200, -1, FALSE, '`PI Question (10)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Question (10)'] =& $this->PI_Question_281029;

		// Target (10)
		$this->Target_281029 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_281029', 'Target (10)', '`Target (10)`', 5, -1, FALSE, '`Target (10)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_281029->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (10)'] =& $this->Target_281029;

		// Target N (10)
		$this->Target_N_281029 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_N_281029', 'Target N (10)', '`Target N (10)`', 5, -1, FALSE, '`Target N (10)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_N_281029->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target N (10)'] =& $this->Target_N_281029;

		// Target D (10)
		$this->Target_D_281029 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_D_281029', 'Target D (10)', '`Target D (10)`', 5, -1, FALSE, '`Target D (10)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_D_281029->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target D (10)'] =& $this->Target_D_281029;

		// Remarks (10)
		$this->Remarks_281029 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Remarks_281029', 'Remarks (10)', '`Remarks (10)`', 200, -1, FALSE, '`Remarks (10)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (10)'] =& $this->Remarks_281029;

		// PI 11
		$this->PI_11 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_11', 'PI 11', '`PI 11`', 200, -1, FALSE, '`PI 11`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI 11'] =& $this->PI_11;

		// PI Question (11)
		$this->PI_Question_281129 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_Question_281129', 'PI Question (11)', '`PI Question (11)`', 200, -1, FALSE, '`PI Question (11)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Question (11)'] =& $this->PI_Question_281129;

		// Target (11)
		$this->Target_281129 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_281129', 'Target (11)', '`Target (11)`', 5, -1, FALSE, '`Target (11)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_281129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (11)'] =& $this->Target_281129;

		// Target N (11)
		$this->Target_N_281129 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_N_281129', 'Target N (11)', '`Target N (11)`', 5, -1, FALSE, '`Target N (11)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_N_281129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target N (11)'] =& $this->Target_N_281129;

		// Target D (11)
		$this->Target_D_281129 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_D_281129', 'Target D (11)', '`Target D (11)`', 5, -1, FALSE, '`Target D (11)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_D_281129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target D (11)'] =& $this->Target_D_281129;

		// Remarks (11)
		$this->Remarks_281129 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Remarks_281129', 'Remarks (11)', '`Remarks (11)`', 200, -1, FALSE, '`Remarks (11)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (11)'] =& $this->Remarks_281129;

		// PI 12
		$this->PI_12 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_12', 'PI 12', '`PI 12`', 200, -1, FALSE, '`PI 12`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI 12'] =& $this->PI_12;

		// PI Question (12)
		$this->PI_Question_281229 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_PI_Question_281229', 'PI Question (12)', '`PI Question (12)`', 200, -1, FALSE, '`PI Question (12)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Question (12)'] =& $this->PI_Question_281229;

		// Target (12)
		$this->Target_281229 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_281229', 'Target (12)', '`Target (12)`', 5, -1, FALSE, '`Target (12)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_281229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (12)'] =& $this->Target_281229;

		// Target N (12)
		$this->Target_N_281229 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_N_281229', 'Target N (12)', '`Target N (12)`', 5, -1, FALSE, '`Target N (12)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_N_281229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target N (12)'] =& $this->Target_N_281229;

		// Target D (12)
		$this->Target_D_281229 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Target_D_281229', 'Target D (12)', '`Target D (12)`', 5, -1, FALSE, '`Target D (12)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_D_281229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target D (12)'] =& $this->Target_D_281229;

		// Remarks (12)
		$this->Remarks_281229 = new cField('frm_fp_rep_ta_form_a_1', 'frm_fp_rep_ta_form_a_1', 'x_Remarks_281229', 'Remarks (12)', '`Remarks (12)`', 200, -1, FALSE, '`Remarks (12)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Remarks (12)'] =& $this->Remarks_281229;
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
		return "frm_fp_rep_ta_form_a_1_Highlight";
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
		return "`frm_fp_rep_ta_form_a_1`";
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
		return "INSERT INTO `frm_fp_rep_ta_form_a_1` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_fp_rep_ta_form_a_1` SET ";
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
		$SQL = "DELETE FROM `frm_fp_rep_ta_form_a_1` WHERE ";
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
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
			return "frm_fp_rep_ta_form_a_1list.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_fp_rep_ta_form_a_1list.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_fp_rep_ta_form_a_1view.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_fp_rep_ta_form_a_1add.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_fp_rep_ta_form_a_1edit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_fp_rep_ta_form_a_1add.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_fp_rep_ta_form_a_1delete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_fp_rep_ta_form_a_1" : "";
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

			//return $arKeys; // do not return yet, so the values will also be checked by the following code
		}

		// check keys
		$ar = array();
		foreach ($arKeys as $key) {
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
		$this->units_id->setDbValue($rs->fields('units_id'));
		$this->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$this->Constituent_University->setDbValue($rs->fields('Constituent University'));
		$this->Delivery_Unit->setDbValue($rs->fields('Delivery Unit'));
		$this->PI_1->setDbValue($rs->fields('PI 1'));
		$this->PI_Question_28129->setDbValue($rs->fields('PI Question (1)'));
		$this->Target_28129->setDbValue($rs->fields('Target (1)'));
		$this->Target_N_28129->setDbValue($rs->fields('Target N (1)'));
		$this->Target_D_28129->setDbValue($rs->fields('Target D (1)'));
		$this->Remarks_28129->setDbValue($rs->fields('Remarks (1)'));
		$this->PI_2->setDbValue($rs->fields('PI 2'));
		$this->PI_Question_28229->setDbValue($rs->fields('PI Question (2)'));
		$this->Target_28229->setDbValue($rs->fields('Target (2)'));
		$this->Target_N_28229->setDbValue($rs->fields('Target N (2)'));
		$this->Target_D_28229->setDbValue($rs->fields('Target D (2)'));
		$this->Remarks_28229->setDbValue($rs->fields('Remarks (2)'));
		$this->PI_3->setDbValue($rs->fields('PI 3'));
		$this->PI_Question_28329->setDbValue($rs->fields('PI Question (3)'));
		$this->Target_28329->setDbValue($rs->fields('Target (3)'));
		$this->Target_N_28329->setDbValue($rs->fields('Target N (3)'));
		$this->Target_D_28329->setDbValue($rs->fields('Target D (3)'));
		$this->Remarks_28329->setDbValue($rs->fields('Remarks (3)'));
		$this->PI_4->setDbValue($rs->fields('PI 4'));
		$this->PI_Question_28429->setDbValue($rs->fields('PI Question (4)'));
		$this->Target_28429->setDbValue($rs->fields('Target (4)'));
		$this->Target_N_28429->setDbValue($rs->fields('Target N (4)'));
		$this->Target_D_28429->setDbValue($rs->fields('Target D (4)'));
		$this->Remarks_28429->setDbValue($rs->fields('Remarks (4)'));
		$this->PI_5->setDbValue($rs->fields('PI 5'));
		$this->PI_Question_28529->setDbValue($rs->fields('PI Question (5)'));
		$this->Target_28529->setDbValue($rs->fields('Target (5)'));
		$this->Target_N_28529->setDbValue($rs->fields('Target N (5)'));
		$this->Target_D_28529->setDbValue($rs->fields('Target D (5)'));
		$this->Remarks_28529->setDbValue($rs->fields('Remarks (5)'));
		$this->PI_6->setDbValue($rs->fields('PI 6'));
		$this->PI_Question_28629->setDbValue($rs->fields('PI Question (6)'));
		$this->Target_28629->setDbValue($rs->fields('Target (6)'));
		$this->Target_N_28629->setDbValue($rs->fields('Target N (6)'));
		$this->Target_D_28629->setDbValue($rs->fields('Target D (6)'));
		$this->Remarks_28629->setDbValue($rs->fields('Remarks (6)'));
		$this->PI_7->setDbValue($rs->fields('PI 7'));
		$this->PI_Question_28729->setDbValue($rs->fields('PI Question (7)'));
		$this->Target_28729->setDbValue($rs->fields('Target (7)'));
		$this->Target_N_28729->setDbValue($rs->fields('Target N (7)'));
		$this->Target_D_28729->setDbValue($rs->fields('Target D (7)'));
		$this->Remarks_28729->setDbValue($rs->fields('Remarks (7)'));
		$this->PI_8->setDbValue($rs->fields('PI 8'));
		$this->PI_Question_28829->setDbValue($rs->fields('PI Question (8)'));
		$this->Target_28829->setDbValue($rs->fields('Target (8)'));
		$this->Target_N_28829->setDbValue($rs->fields('Target N (8)'));
		$this->Target_D_28829->setDbValue($rs->fields('Target D (8)'));
		$this->Remarks_28829->setDbValue($rs->fields('Remarks (8)'));
		$this->PI_9->setDbValue($rs->fields('PI 9'));
		$this->PI_Question_28929->setDbValue($rs->fields('PI Question (9)'));
		$this->Target_28929->setDbValue($rs->fields('Target (9)'));
		$this->Target_N_28929->setDbValue($rs->fields('Target N (9)'));
		$this->Target_D_28929->setDbValue($rs->fields('Target D (9)'));
		$this->Remarks_28929->setDbValue($rs->fields('Remarks (9)'));
		$this->PI_10->setDbValue($rs->fields('PI 10'));
		$this->PI_Question_281029->setDbValue($rs->fields('PI Question (10)'));
		$this->Target_281029->setDbValue($rs->fields('Target (10)'));
		$this->Target_N_281029->setDbValue($rs->fields('Target N (10)'));
		$this->Target_D_281029->setDbValue($rs->fields('Target D (10)'));
		$this->Remarks_281029->setDbValue($rs->fields('Remarks (10)'));
		$this->PI_11->setDbValue($rs->fields('PI 11'));
		$this->PI_Question_281129->setDbValue($rs->fields('PI Question (11)'));
		$this->Target_281129->setDbValue($rs->fields('Target (11)'));
		$this->Target_N_281129->setDbValue($rs->fields('Target N (11)'));
		$this->Target_D_281129->setDbValue($rs->fields('Target D (11)'));
		$this->Remarks_281129->setDbValue($rs->fields('Remarks (11)'));
		$this->PI_12->setDbValue($rs->fields('PI 12'));
		$this->PI_Question_281229->setDbValue($rs->fields('PI Question (12)'));
		$this->Target_281229->setDbValue($rs->fields('Target (12)'));
		$this->Target_N_281229->setDbValue($rs->fields('Target N (12)'));
		$this->Target_D_281229->setDbValue($rs->fields('Target D (12)'));
		$this->Remarks_281229->setDbValue($rs->fields('Remarks (12)'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// units_id

		$this->units_id->CellCssStyle = "white-space: nowrap;";

		// focal_person_id
		$this->focal_person_id->CellCssStyle = "white-space: nowrap;";

		// Constituent University
		$this->Constituent_University->CellCssStyle = "white-space: nowrap;";

		// Delivery Unit
		// PI 1
		// PI Question (1)
		// Target (1)
		// Target N (1)
		// Target D (1)
		// Remarks (1)
		// PI 2
		// PI Question (2)
		// Target (2)
		// Target N (2)
		// Target D (2)
		// Remarks (2)
		// PI 3
		// PI Question (3)
		// Target (3)
		// Target N (3)
		// Target D (3)
		// Remarks (3)
		// PI 4
		// PI Question (4)
		// Target (4)
		// Target N (4)
		// Target D (4)
		// Remarks (4)
		// PI 5
		// PI Question (5)
		// Target (5)
		// Target N (5)
		// Target D (5)
		// Remarks (5)
		// PI 6
		// PI Question (6)
		// Target (6)
		// Target N (6)
		// Target D (6)
		// Remarks (6)
		// PI 7
		// PI Question (7)
		// Target (7)
		// Target N (7)
		// Target D (7)
		// Remarks (7)
		// PI 8
		// PI Question (8)
		// Target (8)
		// Target N (8)
		// Target D (8)
		// Remarks (8)
		// PI 9
		// PI Question (9)
		// Target (9)
		// Target N (9)
		// Target D (9)
		// Remarks (9)
		// PI 10
		// PI Question (10)
		// Target (10)
		// Target N (10)
		// Target D (10)
		// Remarks (10)
		// PI 11
		// PI Question (11)
		// Target (11)
		// Target N (11)
		// Target D (11)
		// Remarks (11)
		// PI 12
		// PI Question (12)
		// Target (12)
		// Target N (12)
		// Target D (12)
		// Remarks (12)
		// units_id

		$this->units_id->ViewValue = $this->units_id->CurrentValue;
		$this->units_id->ViewCustomAttributes = "";

		// focal_person_id
		$this->focal_person_id->ViewValue = $this->focal_person_id->CurrentValue;
		$this->focal_person_id->ViewCustomAttributes = "";

		// Constituent University
		$this->Constituent_University->ViewValue = $this->Constituent_University->CurrentValue;
		$this->Constituent_University->ViewCustomAttributes = "";

		// Delivery Unit
		$this->Delivery_Unit->ViewValue = $this->Delivery_Unit->CurrentValue;
		$this->Delivery_Unit->ViewCustomAttributes = "";

		// PI 1
		$this->PI_1->ViewValue = $this->PI_1->CurrentValue;
		$this->PI_1->ViewCustomAttributes = "";

		// PI Question (1)
		$this->PI_Question_28129->ViewValue = $this->PI_Question_28129->CurrentValue;
		$this->PI_Question_28129->ViewCustomAttributes = "";

		// Target (1)
		$this->Target_28129->ViewValue = $this->Target_28129->CurrentValue;
		$this->Target_28129->ViewCustomAttributes = "";

		// Target N (1)
		$this->Target_N_28129->ViewValue = $this->Target_N_28129->CurrentValue;
		$this->Target_N_28129->ViewCustomAttributes = "";

		// Target D (1)
		$this->Target_D_28129->ViewValue = $this->Target_D_28129->CurrentValue;
		$this->Target_D_28129->ViewCustomAttributes = "";

		// Remarks (1)
		$this->Remarks_28129->ViewValue = $this->Remarks_28129->CurrentValue;
		$this->Remarks_28129->ViewCustomAttributes = "";

		// PI 2
		$this->PI_2->ViewValue = $this->PI_2->CurrentValue;
		$this->PI_2->ViewCustomAttributes = "";

		// PI Question (2)
		$this->PI_Question_28229->ViewValue = $this->PI_Question_28229->CurrentValue;
		$this->PI_Question_28229->ViewCustomAttributes = "";

		// Target (2)
		$this->Target_28229->ViewValue = $this->Target_28229->CurrentValue;
		$this->Target_28229->ViewCustomAttributes = "";

		// Target N (2)
		$this->Target_N_28229->ViewValue = $this->Target_N_28229->CurrentValue;
		$this->Target_N_28229->ViewCustomAttributes = "";

		// Target D (2)
		$this->Target_D_28229->ViewValue = $this->Target_D_28229->CurrentValue;
		$this->Target_D_28229->ViewCustomAttributes = "";

		// Remarks (2)
		$this->Remarks_28229->ViewValue = $this->Remarks_28229->CurrentValue;
		$this->Remarks_28229->ViewCustomAttributes = "";

		// PI 3
		$this->PI_3->ViewValue = $this->PI_3->CurrentValue;
		$this->PI_3->ViewCustomAttributes = "";

		// PI Question (3)
		$this->PI_Question_28329->ViewValue = $this->PI_Question_28329->CurrentValue;
		$this->PI_Question_28329->ViewCustomAttributes = "";

		// Target (3)
		$this->Target_28329->ViewValue = $this->Target_28329->CurrentValue;
		$this->Target_28329->ViewCustomAttributes = "";

		// Target N (3)
		$this->Target_N_28329->ViewValue = $this->Target_N_28329->CurrentValue;
		$this->Target_N_28329->ViewCustomAttributes = "";

		// Target D (3)
		$this->Target_D_28329->ViewValue = $this->Target_D_28329->CurrentValue;
		$this->Target_D_28329->ViewCustomAttributes = "";

		// Remarks (3)
		$this->Remarks_28329->ViewValue = $this->Remarks_28329->CurrentValue;
		$this->Remarks_28329->ViewCustomAttributes = "";

		// PI 4
		$this->PI_4->ViewValue = $this->PI_4->CurrentValue;
		$this->PI_4->ViewCustomAttributes = "";

		// PI Question (4)
		$this->PI_Question_28429->ViewValue = $this->PI_Question_28429->CurrentValue;
		$this->PI_Question_28429->ViewCustomAttributes = "";

		// Target (4)
		$this->Target_28429->ViewValue = $this->Target_28429->CurrentValue;
		$this->Target_28429->ViewCustomAttributes = "";

		// Target N (4)
		$this->Target_N_28429->ViewValue = $this->Target_N_28429->CurrentValue;
		$this->Target_N_28429->ViewCustomAttributes = "";

		// Target D (4)
		$this->Target_D_28429->ViewValue = $this->Target_D_28429->CurrentValue;
		$this->Target_D_28429->ViewCustomAttributes = "";

		// Remarks (4)
		$this->Remarks_28429->ViewValue = $this->Remarks_28429->CurrentValue;
		$this->Remarks_28429->ViewCustomAttributes = "";

		// PI 5
		$this->PI_5->ViewValue = $this->PI_5->CurrentValue;
		$this->PI_5->ViewCustomAttributes = "";

		// PI Question (5)
		$this->PI_Question_28529->ViewValue = $this->PI_Question_28529->CurrentValue;
		$this->PI_Question_28529->ViewCustomAttributes = "";

		// Target (5)
		$this->Target_28529->ViewValue = $this->Target_28529->CurrentValue;
		$this->Target_28529->ViewCustomAttributes = "";

		// Target N (5)
		$this->Target_N_28529->ViewValue = $this->Target_N_28529->CurrentValue;
		$this->Target_N_28529->ViewCustomAttributes = "";

		// Target D (5)
		$this->Target_D_28529->ViewValue = $this->Target_D_28529->CurrentValue;
		$this->Target_D_28529->ViewCustomAttributes = "";

		// Remarks (5)
		$this->Remarks_28529->ViewValue = $this->Remarks_28529->CurrentValue;
		$this->Remarks_28529->ViewCustomAttributes = "";

		// PI 6
		$this->PI_6->ViewValue = $this->PI_6->CurrentValue;
		$this->PI_6->ViewCustomAttributes = "";

		// PI Question (6)
		$this->PI_Question_28629->ViewValue = $this->PI_Question_28629->CurrentValue;
		$this->PI_Question_28629->ViewCustomAttributes = "";

		// Target (6)
		$this->Target_28629->ViewValue = $this->Target_28629->CurrentValue;
		$this->Target_28629->ViewCustomAttributes = "";

		// Target N (6)
		$this->Target_N_28629->ViewValue = $this->Target_N_28629->CurrentValue;
		$this->Target_N_28629->ViewCustomAttributes = "";

		// Target D (6)
		$this->Target_D_28629->ViewValue = $this->Target_D_28629->CurrentValue;
		$this->Target_D_28629->ViewCustomAttributes = "";

		// Remarks (6)
		$this->Remarks_28629->ViewValue = $this->Remarks_28629->CurrentValue;
		$this->Remarks_28629->ViewCustomAttributes = "";

		// PI 7
		$this->PI_7->ViewValue = $this->PI_7->CurrentValue;
		$this->PI_7->ViewCustomAttributes = "";

		// PI Question (7)
		$this->PI_Question_28729->ViewValue = $this->PI_Question_28729->CurrentValue;
		$this->PI_Question_28729->ViewCustomAttributes = "";

		// Target (7)
		$this->Target_28729->ViewValue = $this->Target_28729->CurrentValue;
		$this->Target_28729->ViewCustomAttributes = "";

		// Target N (7)
		$this->Target_N_28729->ViewValue = $this->Target_N_28729->CurrentValue;
		$this->Target_N_28729->ViewCustomAttributes = "";

		// Target D (7)
		$this->Target_D_28729->ViewValue = $this->Target_D_28729->CurrentValue;
		$this->Target_D_28729->ViewCustomAttributes = "";

		// Remarks (7)
		$this->Remarks_28729->ViewValue = $this->Remarks_28729->CurrentValue;
		$this->Remarks_28729->ViewCustomAttributes = "";

		// PI 8
		$this->PI_8->ViewValue = $this->PI_8->CurrentValue;
		$this->PI_8->ViewCustomAttributes = "";

		// PI Question (8)
		$this->PI_Question_28829->ViewValue = $this->PI_Question_28829->CurrentValue;
		$this->PI_Question_28829->ViewCustomAttributes = "";

		// Target (8)
		$this->Target_28829->ViewValue = $this->Target_28829->CurrentValue;
		$this->Target_28829->ViewCustomAttributes = "";

		// Target N (8)
		$this->Target_N_28829->ViewValue = $this->Target_N_28829->CurrentValue;
		$this->Target_N_28829->ViewCustomAttributes = "";

		// Target D (8)
		$this->Target_D_28829->ViewValue = $this->Target_D_28829->CurrentValue;
		$this->Target_D_28829->ViewCustomAttributes = "";

		// Remarks (8)
		$this->Remarks_28829->ViewValue = $this->Remarks_28829->CurrentValue;
		$this->Remarks_28829->ViewCustomAttributes = "";

		// PI 9
		$this->PI_9->ViewValue = $this->PI_9->CurrentValue;
		$this->PI_9->ViewCustomAttributes = "";

		// PI Question (9)
		$this->PI_Question_28929->ViewValue = $this->PI_Question_28929->CurrentValue;
		$this->PI_Question_28929->ViewCustomAttributes = "";

		// Target (9)
		$this->Target_28929->ViewValue = $this->Target_28929->CurrentValue;
		$this->Target_28929->ViewCustomAttributes = "";

		// Target N (9)
		$this->Target_N_28929->ViewValue = $this->Target_N_28929->CurrentValue;
		$this->Target_N_28929->ViewCustomAttributes = "";

		// Target D (9)
		$this->Target_D_28929->ViewValue = $this->Target_D_28929->CurrentValue;
		$this->Target_D_28929->ViewCustomAttributes = "";

		// Remarks (9)
		$this->Remarks_28929->ViewValue = $this->Remarks_28929->CurrentValue;
		$this->Remarks_28929->ViewCustomAttributes = "";

		// PI 10
		$this->PI_10->ViewValue = $this->PI_10->CurrentValue;
		$this->PI_10->ViewCustomAttributes = "";

		// PI Question (10)
		$this->PI_Question_281029->ViewValue = $this->PI_Question_281029->CurrentValue;
		$this->PI_Question_281029->ViewCustomAttributes = "";

		// Target (10)
		$this->Target_281029->ViewValue = $this->Target_281029->CurrentValue;
		$this->Target_281029->ViewCustomAttributes = "";

		// Target N (10)
		$this->Target_N_281029->ViewValue = $this->Target_N_281029->CurrentValue;
		$this->Target_N_281029->ViewCustomAttributes = "";

		// Target D (10)
		$this->Target_D_281029->ViewValue = $this->Target_D_281029->CurrentValue;
		$this->Target_D_281029->ViewCustomAttributes = "";

		// Remarks (10)
		$this->Remarks_281029->ViewValue = $this->Remarks_281029->CurrentValue;
		$this->Remarks_281029->ViewCustomAttributes = "";

		// PI 11
		$this->PI_11->ViewValue = $this->PI_11->CurrentValue;
		$this->PI_11->ViewCustomAttributes = "";

		// PI Question (11)
		$this->PI_Question_281129->ViewValue = $this->PI_Question_281129->CurrentValue;
		$this->PI_Question_281129->ViewCustomAttributes = "";

		// Target (11)
		$this->Target_281129->ViewValue = $this->Target_281129->CurrentValue;
		$this->Target_281129->ViewCustomAttributes = "";

		// Target N (11)
		$this->Target_N_281129->ViewValue = $this->Target_N_281129->CurrentValue;
		$this->Target_N_281129->ViewCustomAttributes = "";

		// Target D (11)
		$this->Target_D_281129->ViewValue = $this->Target_D_281129->CurrentValue;
		$this->Target_D_281129->ViewCustomAttributes = "";

		// Remarks (11)
		$this->Remarks_281129->ViewValue = $this->Remarks_281129->CurrentValue;
		$this->Remarks_281129->ViewCustomAttributes = "";

		// PI 12
		$this->PI_12->ViewValue = $this->PI_12->CurrentValue;
		$this->PI_12->ViewCustomAttributes = "";

		// PI Question (12)
		$this->PI_Question_281229->ViewValue = $this->PI_Question_281229->CurrentValue;
		$this->PI_Question_281229->ViewCustomAttributes = "";

		// Target (12)
		$this->Target_281229->ViewValue = $this->Target_281229->CurrentValue;
		$this->Target_281229->ViewCustomAttributes = "";

		// Target N (12)
		$this->Target_N_281229->ViewValue = $this->Target_N_281229->CurrentValue;
		$this->Target_N_281229->ViewCustomAttributes = "";

		// Target D (12)
		$this->Target_D_281229->ViewValue = $this->Target_D_281229->CurrentValue;
		$this->Target_D_281229->ViewCustomAttributes = "";

		// Remarks (12)
		$this->Remarks_281229->ViewValue = $this->Remarks_281229->CurrentValue;
		$this->Remarks_281229->ViewCustomAttributes = "";

		// units_id
		$this->units_id->LinkCustomAttributes = "";
		$this->units_id->HrefValue = "";
		$this->units_id->TooltipValue = "";

		// focal_person_id
		$this->focal_person_id->LinkCustomAttributes = "";
		$this->focal_person_id->HrefValue = "";
		$this->focal_person_id->TooltipValue = "";

		// Constituent University
		$this->Constituent_University->LinkCustomAttributes = "";
		$this->Constituent_University->HrefValue = "";
		$this->Constituent_University->TooltipValue = "";

		// Delivery Unit
		$this->Delivery_Unit->LinkCustomAttributes = "";
		$this->Delivery_Unit->HrefValue = "";
		$this->Delivery_Unit->TooltipValue = "";

		// PI 1
		$this->PI_1->LinkCustomAttributes = "";
		$this->PI_1->HrefValue = "";
		$this->PI_1->TooltipValue = "";

		// PI Question (1)
		$this->PI_Question_28129->LinkCustomAttributes = "";
		$this->PI_Question_28129->HrefValue = "";
		$this->PI_Question_28129->TooltipValue = "";

		// Target (1)
		$this->Target_28129->LinkCustomAttributes = "";
		$this->Target_28129->HrefValue = "";
		$this->Target_28129->TooltipValue = "";

		// Target N (1)
		$this->Target_N_28129->LinkCustomAttributes = "";
		$this->Target_N_28129->HrefValue = "";
		$this->Target_N_28129->TooltipValue = "";

		// Target D (1)
		$this->Target_D_28129->LinkCustomAttributes = "";
		$this->Target_D_28129->HrefValue = "";
		$this->Target_D_28129->TooltipValue = "";

		// Remarks (1)
		$this->Remarks_28129->LinkCustomAttributes = "";
		$this->Remarks_28129->HrefValue = "";
		$this->Remarks_28129->TooltipValue = "";

		// PI 2
		$this->PI_2->LinkCustomAttributes = "";
		$this->PI_2->HrefValue = "";
		$this->PI_2->TooltipValue = "";

		// PI Question (2)
		$this->PI_Question_28229->LinkCustomAttributes = "";
		$this->PI_Question_28229->HrefValue = "";
		$this->PI_Question_28229->TooltipValue = "";

		// Target (2)
		$this->Target_28229->LinkCustomAttributes = "";
		$this->Target_28229->HrefValue = "";
		$this->Target_28229->TooltipValue = "";

		// Target N (2)
		$this->Target_N_28229->LinkCustomAttributes = "";
		$this->Target_N_28229->HrefValue = "";
		$this->Target_N_28229->TooltipValue = "";

		// Target D (2)
		$this->Target_D_28229->LinkCustomAttributes = "";
		$this->Target_D_28229->HrefValue = "";
		$this->Target_D_28229->TooltipValue = "";

		// Remarks (2)
		$this->Remarks_28229->LinkCustomAttributes = "";
		$this->Remarks_28229->HrefValue = "";
		$this->Remarks_28229->TooltipValue = "";

		// PI 3
		$this->PI_3->LinkCustomAttributes = "";
		$this->PI_3->HrefValue = "";
		$this->PI_3->TooltipValue = "";

		// PI Question (3)
		$this->PI_Question_28329->LinkCustomAttributes = "";
		$this->PI_Question_28329->HrefValue = "";
		$this->PI_Question_28329->TooltipValue = "";

		// Target (3)
		$this->Target_28329->LinkCustomAttributes = "";
		$this->Target_28329->HrefValue = "";
		$this->Target_28329->TooltipValue = "";

		// Target N (3)
		$this->Target_N_28329->LinkCustomAttributes = "";
		$this->Target_N_28329->HrefValue = "";
		$this->Target_N_28329->TooltipValue = "";

		// Target D (3)
		$this->Target_D_28329->LinkCustomAttributes = "";
		$this->Target_D_28329->HrefValue = "";
		$this->Target_D_28329->TooltipValue = "";

		// Remarks (3)
		$this->Remarks_28329->LinkCustomAttributes = "";
		$this->Remarks_28329->HrefValue = "";
		$this->Remarks_28329->TooltipValue = "";

		// PI 4
		$this->PI_4->LinkCustomAttributes = "";
		$this->PI_4->HrefValue = "";
		$this->PI_4->TooltipValue = "";

		// PI Question (4)
		$this->PI_Question_28429->LinkCustomAttributes = "";
		$this->PI_Question_28429->HrefValue = "";
		$this->PI_Question_28429->TooltipValue = "";

		// Target (4)
		$this->Target_28429->LinkCustomAttributes = "";
		$this->Target_28429->HrefValue = "";
		$this->Target_28429->TooltipValue = "";

		// Target N (4)
		$this->Target_N_28429->LinkCustomAttributes = "";
		$this->Target_N_28429->HrefValue = "";
		$this->Target_N_28429->TooltipValue = "";

		// Target D (4)
		$this->Target_D_28429->LinkCustomAttributes = "";
		$this->Target_D_28429->HrefValue = "";
		$this->Target_D_28429->TooltipValue = "";

		// Remarks (4)
		$this->Remarks_28429->LinkCustomAttributes = "";
		$this->Remarks_28429->HrefValue = "";
		$this->Remarks_28429->TooltipValue = "";

		// PI 5
		$this->PI_5->LinkCustomAttributes = "";
		$this->PI_5->HrefValue = "";
		$this->PI_5->TooltipValue = "";

		// PI Question (5)
		$this->PI_Question_28529->LinkCustomAttributes = "";
		$this->PI_Question_28529->HrefValue = "";
		$this->PI_Question_28529->TooltipValue = "";

		// Target (5)
		$this->Target_28529->LinkCustomAttributes = "";
		$this->Target_28529->HrefValue = "";
		$this->Target_28529->TooltipValue = "";

		// Target N (5)
		$this->Target_N_28529->LinkCustomAttributes = "";
		$this->Target_N_28529->HrefValue = "";
		$this->Target_N_28529->TooltipValue = "";

		// Target D (5)
		$this->Target_D_28529->LinkCustomAttributes = "";
		$this->Target_D_28529->HrefValue = "";
		$this->Target_D_28529->TooltipValue = "";

		// Remarks (5)
		$this->Remarks_28529->LinkCustomAttributes = "";
		$this->Remarks_28529->HrefValue = "";
		$this->Remarks_28529->TooltipValue = "";

		// PI 6
		$this->PI_6->LinkCustomAttributes = "";
		$this->PI_6->HrefValue = "";
		$this->PI_6->TooltipValue = "";

		// PI Question (6)
		$this->PI_Question_28629->LinkCustomAttributes = "";
		$this->PI_Question_28629->HrefValue = "";
		$this->PI_Question_28629->TooltipValue = "";

		// Target (6)
		$this->Target_28629->LinkCustomAttributes = "";
		$this->Target_28629->HrefValue = "";
		$this->Target_28629->TooltipValue = "";

		// Target N (6)
		$this->Target_N_28629->LinkCustomAttributes = "";
		$this->Target_N_28629->HrefValue = "";
		$this->Target_N_28629->TooltipValue = "";

		// Target D (6)
		$this->Target_D_28629->LinkCustomAttributes = "";
		$this->Target_D_28629->HrefValue = "";
		$this->Target_D_28629->TooltipValue = "";

		// Remarks (6)
		$this->Remarks_28629->LinkCustomAttributes = "";
		$this->Remarks_28629->HrefValue = "";
		$this->Remarks_28629->TooltipValue = "";

		// PI 7
		$this->PI_7->LinkCustomAttributes = "";
		$this->PI_7->HrefValue = "";
		$this->PI_7->TooltipValue = "";

		// PI Question (7)
		$this->PI_Question_28729->LinkCustomAttributes = "";
		$this->PI_Question_28729->HrefValue = "";
		$this->PI_Question_28729->TooltipValue = "";

		// Target (7)
		$this->Target_28729->LinkCustomAttributes = "";
		$this->Target_28729->HrefValue = "";
		$this->Target_28729->TooltipValue = "";

		// Target N (7)
		$this->Target_N_28729->LinkCustomAttributes = "";
		$this->Target_N_28729->HrefValue = "";
		$this->Target_N_28729->TooltipValue = "";

		// Target D (7)
		$this->Target_D_28729->LinkCustomAttributes = "";
		$this->Target_D_28729->HrefValue = "";
		$this->Target_D_28729->TooltipValue = "";

		// Remarks (7)
		$this->Remarks_28729->LinkCustomAttributes = "";
		$this->Remarks_28729->HrefValue = "";
		$this->Remarks_28729->TooltipValue = "";

		// PI 8
		$this->PI_8->LinkCustomAttributes = "";
		$this->PI_8->HrefValue = "";
		$this->PI_8->TooltipValue = "";

		// PI Question (8)
		$this->PI_Question_28829->LinkCustomAttributes = "";
		$this->PI_Question_28829->HrefValue = "";
		$this->PI_Question_28829->TooltipValue = "";

		// Target (8)
		$this->Target_28829->LinkCustomAttributes = "";
		$this->Target_28829->HrefValue = "";
		$this->Target_28829->TooltipValue = "";

		// Target N (8)
		$this->Target_N_28829->LinkCustomAttributes = "";
		$this->Target_N_28829->HrefValue = "";
		$this->Target_N_28829->TooltipValue = "";

		// Target D (8)
		$this->Target_D_28829->LinkCustomAttributes = "";
		$this->Target_D_28829->HrefValue = "";
		$this->Target_D_28829->TooltipValue = "";

		// Remarks (8)
		$this->Remarks_28829->LinkCustomAttributes = "";
		$this->Remarks_28829->HrefValue = "";
		$this->Remarks_28829->TooltipValue = "";

		// PI 9
		$this->PI_9->LinkCustomAttributes = "";
		$this->PI_9->HrefValue = "";
		$this->PI_9->TooltipValue = "";

		// PI Question (9)
		$this->PI_Question_28929->LinkCustomAttributes = "";
		$this->PI_Question_28929->HrefValue = "";
		$this->PI_Question_28929->TooltipValue = "";

		// Target (9)
		$this->Target_28929->LinkCustomAttributes = "";
		$this->Target_28929->HrefValue = "";
		$this->Target_28929->TooltipValue = "";

		// Target N (9)
		$this->Target_N_28929->LinkCustomAttributes = "";
		$this->Target_N_28929->HrefValue = "";
		$this->Target_N_28929->TooltipValue = "";

		// Target D (9)
		$this->Target_D_28929->LinkCustomAttributes = "";
		$this->Target_D_28929->HrefValue = "";
		$this->Target_D_28929->TooltipValue = "";

		// Remarks (9)
		$this->Remarks_28929->LinkCustomAttributes = "";
		$this->Remarks_28929->HrefValue = "";
		$this->Remarks_28929->TooltipValue = "";

		// PI 10
		$this->PI_10->LinkCustomAttributes = "";
		$this->PI_10->HrefValue = "";
		$this->PI_10->TooltipValue = "";

		// PI Question (10)
		$this->PI_Question_281029->LinkCustomAttributes = "";
		$this->PI_Question_281029->HrefValue = "";
		$this->PI_Question_281029->TooltipValue = "";

		// Target (10)
		$this->Target_281029->LinkCustomAttributes = "";
		$this->Target_281029->HrefValue = "";
		$this->Target_281029->TooltipValue = "";

		// Target N (10)
		$this->Target_N_281029->LinkCustomAttributes = "";
		$this->Target_N_281029->HrefValue = "";
		$this->Target_N_281029->TooltipValue = "";

		// Target D (10)
		$this->Target_D_281029->LinkCustomAttributes = "";
		$this->Target_D_281029->HrefValue = "";
		$this->Target_D_281029->TooltipValue = "";

		// Remarks (10)
		$this->Remarks_281029->LinkCustomAttributes = "";
		$this->Remarks_281029->HrefValue = "";
		$this->Remarks_281029->TooltipValue = "";

		// PI 11
		$this->PI_11->LinkCustomAttributes = "";
		$this->PI_11->HrefValue = "";
		$this->PI_11->TooltipValue = "";

		// PI Question (11)
		$this->PI_Question_281129->LinkCustomAttributes = "";
		$this->PI_Question_281129->HrefValue = "";
		$this->PI_Question_281129->TooltipValue = "";

		// Target (11)
		$this->Target_281129->LinkCustomAttributes = "";
		$this->Target_281129->HrefValue = "";
		$this->Target_281129->TooltipValue = "";

		// Target N (11)
		$this->Target_N_281129->LinkCustomAttributes = "";
		$this->Target_N_281129->HrefValue = "";
		$this->Target_N_281129->TooltipValue = "";

		// Target D (11)
		$this->Target_D_281129->LinkCustomAttributes = "";
		$this->Target_D_281129->HrefValue = "";
		$this->Target_D_281129->TooltipValue = "";

		// Remarks (11)
		$this->Remarks_281129->LinkCustomAttributes = "";
		$this->Remarks_281129->HrefValue = "";
		$this->Remarks_281129->TooltipValue = "";

		// PI 12
		$this->PI_12->LinkCustomAttributes = "";
		$this->PI_12->HrefValue = "";
		$this->PI_12->TooltipValue = "";

		// PI Question (12)
		$this->PI_Question_281229->LinkCustomAttributes = "";
		$this->PI_Question_281229->HrefValue = "";
		$this->PI_Question_281229->TooltipValue = "";

		// Target (12)
		$this->Target_281229->LinkCustomAttributes = "";
		$this->Target_281229->HrefValue = "";
		$this->Target_281229->TooltipValue = "";

		// Target N (12)
		$this->Target_N_281229->LinkCustomAttributes = "";
		$this->Target_N_281229->HrefValue = "";
		$this->Target_N_281229->TooltipValue = "";

		// Target D (12)
		$this->Target_D_281229->LinkCustomAttributes = "";
		$this->Target_D_281229->HrefValue = "";
		$this->Target_D_281229->TooltipValue = "";

		// Remarks (12)
		$this->Remarks_281229->LinkCustomAttributes = "";
		$this->Remarks_281229->HrefValue = "";
		$this->Remarks_281229->TooltipValue = "";

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
					$XmlDoc->AddField('units_id', $this->units_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('focal_person_id', $this->focal_person_id->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Constituent_University', $this->Constituent_University->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Delivery_Unit', $this->Delivery_Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_1', $this->PI_1->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28129', $this->PI_Question_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28129', $this->Target_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28129', $this->Target_N_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28129', $this->Target_D_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28129', $this->Remarks_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_2', $this->PI_2->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28229', $this->PI_Question_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28229', $this->Target_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28229', $this->Target_N_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28229', $this->Target_D_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28229', $this->Remarks_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_3', $this->PI_3->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28329', $this->PI_Question_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28329', $this->Target_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28329', $this->Target_N_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28329', $this->Target_D_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28329', $this->Remarks_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_4', $this->PI_4->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28429', $this->PI_Question_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28429', $this->Target_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28429', $this->Target_N_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28429', $this->Target_D_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28429', $this->Remarks_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_5', $this->PI_5->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28529', $this->PI_Question_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28529', $this->Target_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28529', $this->Target_N_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28529', $this->Target_D_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28529', $this->Remarks_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_6', $this->PI_6->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28629', $this->PI_Question_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28629', $this->Target_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28629', $this->Target_N_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28629', $this->Target_D_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28629', $this->Remarks_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_7', $this->PI_7->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28729', $this->PI_Question_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28729', $this->Target_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28729', $this->Target_N_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28729', $this->Target_D_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28729', $this->Remarks_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_8', $this->PI_8->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28829', $this->PI_Question_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28829', $this->Target_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28829', $this->Target_N_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28829', $this->Target_D_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28829', $this->Remarks_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_9', $this->PI_9->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28929', $this->PI_Question_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28929', $this->Target_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28929', $this->Target_N_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28929', $this->Target_D_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28929', $this->Remarks_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_10', $this->PI_10->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_281029', $this->PI_Question_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_281029', $this->Target_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_281029', $this->Target_N_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_281029', $this->Target_D_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_281029', $this->Remarks_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_11', $this->PI_11->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_281129', $this->PI_Question_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_281129', $this->Target_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_281129', $this->Target_N_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_281129', $this->Target_D_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_281129', $this->Remarks_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_12', $this->PI_12->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_281229', $this->PI_Question_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_281229', $this->Target_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_281229', $this->Target_N_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_281229', $this->Target_D_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_281229', $this->Remarks_281229->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('Delivery_Unit', $this->Delivery_Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_1', $this->PI_1->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28129', $this->PI_Question_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28129', $this->Target_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28129', $this->Target_N_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28129', $this->Target_D_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28129', $this->Remarks_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_2', $this->PI_2->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28229', $this->PI_Question_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28229', $this->Target_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28229', $this->Target_N_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28229', $this->Target_D_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28229', $this->Remarks_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_3', $this->PI_3->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28329', $this->PI_Question_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28329', $this->Target_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28329', $this->Target_N_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28329', $this->Target_D_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28329', $this->Remarks_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_4', $this->PI_4->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28429', $this->PI_Question_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28429', $this->Target_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28429', $this->Target_N_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28429', $this->Target_D_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28429', $this->Remarks_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_5', $this->PI_5->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28529', $this->PI_Question_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28529', $this->Target_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28529', $this->Target_N_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28529', $this->Target_D_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28529', $this->Remarks_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_6', $this->PI_6->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28629', $this->PI_Question_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28629', $this->Target_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28629', $this->Target_N_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28629', $this->Target_D_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28629', $this->Remarks_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_7', $this->PI_7->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28729', $this->PI_Question_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28729', $this->Target_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28729', $this->Target_N_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28729', $this->Target_D_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28729', $this->Remarks_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_8', $this->PI_8->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28829', $this->PI_Question_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28829', $this->Target_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28829', $this->Target_N_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28829', $this->Target_D_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28829', $this->Remarks_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_9', $this->PI_9->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_28929', $this->PI_Question_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28929', $this->Target_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_28929', $this->Target_N_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_28929', $this->Target_D_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_28929', $this->Remarks_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_10', $this->PI_10->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_281029', $this->PI_Question_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_281029', $this->Target_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_281029', $this->Target_N_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_281029', $this->Target_D_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_281029', $this->Remarks_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_11', $this->PI_11->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_281129', $this->PI_Question_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_281129', $this->Target_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_281129', $this->Target_N_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_281129', $this->Target_D_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_281129', $this->Remarks_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_12', $this->PI_12->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Question_281229', $this->PI_Question_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_281229', $this->Target_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_N_281229', $this->Target_N_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_D_281229', $this->Target_D_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Remarks_281229', $this->Remarks_281229->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->units_id);
				$Doc->ExportCaption($this->focal_person_id);
				$Doc->ExportCaption($this->Constituent_University);
				$Doc->ExportCaption($this->Delivery_Unit);
				$Doc->ExportCaption($this->PI_1);
				$Doc->ExportCaption($this->PI_Question_28129);
				$Doc->ExportCaption($this->Target_28129);
				$Doc->ExportCaption($this->Target_N_28129);
				$Doc->ExportCaption($this->Target_D_28129);
				$Doc->ExportCaption($this->Remarks_28129);
				$Doc->ExportCaption($this->PI_2);
				$Doc->ExportCaption($this->PI_Question_28229);
				$Doc->ExportCaption($this->Target_28229);
				$Doc->ExportCaption($this->Target_N_28229);
				$Doc->ExportCaption($this->Target_D_28229);
				$Doc->ExportCaption($this->Remarks_28229);
				$Doc->ExportCaption($this->PI_3);
				$Doc->ExportCaption($this->PI_Question_28329);
				$Doc->ExportCaption($this->Target_28329);
				$Doc->ExportCaption($this->Target_N_28329);
				$Doc->ExportCaption($this->Target_D_28329);
				$Doc->ExportCaption($this->Remarks_28329);
				$Doc->ExportCaption($this->PI_4);
				$Doc->ExportCaption($this->PI_Question_28429);
				$Doc->ExportCaption($this->Target_28429);
				$Doc->ExportCaption($this->Target_N_28429);
				$Doc->ExportCaption($this->Target_D_28429);
				$Doc->ExportCaption($this->Remarks_28429);
				$Doc->ExportCaption($this->PI_5);
				$Doc->ExportCaption($this->PI_Question_28529);
				$Doc->ExportCaption($this->Target_28529);
				$Doc->ExportCaption($this->Target_N_28529);
				$Doc->ExportCaption($this->Target_D_28529);
				$Doc->ExportCaption($this->Remarks_28529);
				$Doc->ExportCaption($this->PI_6);
				$Doc->ExportCaption($this->PI_Question_28629);
				$Doc->ExportCaption($this->Target_28629);
				$Doc->ExportCaption($this->Target_N_28629);
				$Doc->ExportCaption($this->Target_D_28629);
				$Doc->ExportCaption($this->Remarks_28629);
				$Doc->ExportCaption($this->PI_7);
				$Doc->ExportCaption($this->PI_Question_28729);
				$Doc->ExportCaption($this->Target_28729);
				$Doc->ExportCaption($this->Target_N_28729);
				$Doc->ExportCaption($this->Target_D_28729);
				$Doc->ExportCaption($this->Remarks_28729);
				$Doc->ExportCaption($this->PI_8);
				$Doc->ExportCaption($this->PI_Question_28829);
				$Doc->ExportCaption($this->Target_28829);
				$Doc->ExportCaption($this->Target_N_28829);
				$Doc->ExportCaption($this->Target_D_28829);
				$Doc->ExportCaption($this->Remarks_28829);
				$Doc->ExportCaption($this->PI_9);
				$Doc->ExportCaption($this->PI_Question_28929);
				$Doc->ExportCaption($this->Target_28929);
				$Doc->ExportCaption($this->Target_N_28929);
				$Doc->ExportCaption($this->Target_D_28929);
				$Doc->ExportCaption($this->Remarks_28929);
				$Doc->ExportCaption($this->PI_10);
				$Doc->ExportCaption($this->PI_Question_281029);
				$Doc->ExportCaption($this->Target_281029);
				$Doc->ExportCaption($this->Target_N_281029);
				$Doc->ExportCaption($this->Target_D_281029);
				$Doc->ExportCaption($this->Remarks_281029);
				$Doc->ExportCaption($this->PI_11);
				$Doc->ExportCaption($this->PI_Question_281129);
				$Doc->ExportCaption($this->Target_281129);
				$Doc->ExportCaption($this->Target_N_281129);
				$Doc->ExportCaption($this->Target_D_281129);
				$Doc->ExportCaption($this->Remarks_281129);
				$Doc->ExportCaption($this->PI_12);
				$Doc->ExportCaption($this->PI_Question_281229);
				$Doc->ExportCaption($this->Target_281229);
				$Doc->ExportCaption($this->Target_N_281229);
				$Doc->ExportCaption($this->Target_D_281229);
				$Doc->ExportCaption($this->Remarks_281229);
			} else {
				$Doc->ExportCaption($this->Delivery_Unit);
				$Doc->ExportCaption($this->PI_1);
				$Doc->ExportCaption($this->PI_Question_28129);
				$Doc->ExportCaption($this->Target_28129);
				$Doc->ExportCaption($this->Target_N_28129);
				$Doc->ExportCaption($this->Target_D_28129);
				$Doc->ExportCaption($this->Remarks_28129);
				$Doc->ExportCaption($this->PI_2);
				$Doc->ExportCaption($this->PI_Question_28229);
				$Doc->ExportCaption($this->Target_28229);
				$Doc->ExportCaption($this->Target_N_28229);
				$Doc->ExportCaption($this->Target_D_28229);
				$Doc->ExportCaption($this->Remarks_28229);
				$Doc->ExportCaption($this->PI_3);
				$Doc->ExportCaption($this->PI_Question_28329);
				$Doc->ExportCaption($this->Target_28329);
				$Doc->ExportCaption($this->Target_N_28329);
				$Doc->ExportCaption($this->Target_D_28329);
				$Doc->ExportCaption($this->Remarks_28329);
				$Doc->ExportCaption($this->PI_4);
				$Doc->ExportCaption($this->PI_Question_28429);
				$Doc->ExportCaption($this->Target_28429);
				$Doc->ExportCaption($this->Target_N_28429);
				$Doc->ExportCaption($this->Target_D_28429);
				$Doc->ExportCaption($this->Remarks_28429);
				$Doc->ExportCaption($this->PI_5);
				$Doc->ExportCaption($this->PI_Question_28529);
				$Doc->ExportCaption($this->Target_28529);
				$Doc->ExportCaption($this->Target_N_28529);
				$Doc->ExportCaption($this->Target_D_28529);
				$Doc->ExportCaption($this->Remarks_28529);
				$Doc->ExportCaption($this->PI_6);
				$Doc->ExportCaption($this->PI_Question_28629);
				$Doc->ExportCaption($this->Target_28629);
				$Doc->ExportCaption($this->Target_N_28629);
				$Doc->ExportCaption($this->Target_D_28629);
				$Doc->ExportCaption($this->Remarks_28629);
				$Doc->ExportCaption($this->PI_7);
				$Doc->ExportCaption($this->PI_Question_28729);
				$Doc->ExportCaption($this->Target_28729);
				$Doc->ExportCaption($this->Target_N_28729);
				$Doc->ExportCaption($this->Target_D_28729);
				$Doc->ExportCaption($this->Remarks_28729);
				$Doc->ExportCaption($this->PI_8);
				$Doc->ExportCaption($this->PI_Question_28829);
				$Doc->ExportCaption($this->Target_28829);
				$Doc->ExportCaption($this->Target_N_28829);
				$Doc->ExportCaption($this->Target_D_28829);
				$Doc->ExportCaption($this->Remarks_28829);
				$Doc->ExportCaption($this->PI_9);
				$Doc->ExportCaption($this->PI_Question_28929);
				$Doc->ExportCaption($this->Target_28929);
				$Doc->ExportCaption($this->Target_N_28929);
				$Doc->ExportCaption($this->Target_D_28929);
				$Doc->ExportCaption($this->Remarks_28929);
				$Doc->ExportCaption($this->PI_10);
				$Doc->ExportCaption($this->PI_Question_281029);
				$Doc->ExportCaption($this->Target_281029);
				$Doc->ExportCaption($this->Target_N_281029);
				$Doc->ExportCaption($this->Target_D_281029);
				$Doc->ExportCaption($this->Remarks_281029);
				$Doc->ExportCaption($this->PI_11);
				$Doc->ExportCaption($this->PI_Question_281129);
				$Doc->ExportCaption($this->Target_281129);
				$Doc->ExportCaption($this->Target_N_281129);
				$Doc->ExportCaption($this->Target_D_281129);
				$Doc->ExportCaption($this->Remarks_281129);
				$Doc->ExportCaption($this->PI_12);
				$Doc->ExportCaption($this->PI_Question_281229);
				$Doc->ExportCaption($this->Target_281229);
				$Doc->ExportCaption($this->Target_N_281229);
				$Doc->ExportCaption($this->Target_D_281229);
				$Doc->ExportCaption($this->Remarks_281229);
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
					$Doc->ExportField($this->units_id);
					$Doc->ExportField($this->focal_person_id);
					$Doc->ExportField($this->Constituent_University);
					$Doc->ExportField($this->Delivery_Unit);
					$Doc->ExportField($this->PI_1);
					$Doc->ExportField($this->PI_Question_28129);
					$Doc->ExportField($this->Target_28129);
					$Doc->ExportField($this->Target_N_28129);
					$Doc->ExportField($this->Target_D_28129);
					$Doc->ExportField($this->Remarks_28129);
					$Doc->ExportField($this->PI_2);
					$Doc->ExportField($this->PI_Question_28229);
					$Doc->ExportField($this->Target_28229);
					$Doc->ExportField($this->Target_N_28229);
					$Doc->ExportField($this->Target_D_28229);
					$Doc->ExportField($this->Remarks_28229);
					$Doc->ExportField($this->PI_3);
					$Doc->ExportField($this->PI_Question_28329);
					$Doc->ExportField($this->Target_28329);
					$Doc->ExportField($this->Target_N_28329);
					$Doc->ExportField($this->Target_D_28329);
					$Doc->ExportField($this->Remarks_28329);
					$Doc->ExportField($this->PI_4);
					$Doc->ExportField($this->PI_Question_28429);
					$Doc->ExportField($this->Target_28429);
					$Doc->ExportField($this->Target_N_28429);
					$Doc->ExportField($this->Target_D_28429);
					$Doc->ExportField($this->Remarks_28429);
					$Doc->ExportField($this->PI_5);
					$Doc->ExportField($this->PI_Question_28529);
					$Doc->ExportField($this->Target_28529);
					$Doc->ExportField($this->Target_N_28529);
					$Doc->ExportField($this->Target_D_28529);
					$Doc->ExportField($this->Remarks_28529);
					$Doc->ExportField($this->PI_6);
					$Doc->ExportField($this->PI_Question_28629);
					$Doc->ExportField($this->Target_28629);
					$Doc->ExportField($this->Target_N_28629);
					$Doc->ExportField($this->Target_D_28629);
					$Doc->ExportField($this->Remarks_28629);
					$Doc->ExportField($this->PI_7);
					$Doc->ExportField($this->PI_Question_28729);
					$Doc->ExportField($this->Target_28729);
					$Doc->ExportField($this->Target_N_28729);
					$Doc->ExportField($this->Target_D_28729);
					$Doc->ExportField($this->Remarks_28729);
					$Doc->ExportField($this->PI_8);
					$Doc->ExportField($this->PI_Question_28829);
					$Doc->ExportField($this->Target_28829);
					$Doc->ExportField($this->Target_N_28829);
					$Doc->ExportField($this->Target_D_28829);
					$Doc->ExportField($this->Remarks_28829);
					$Doc->ExportField($this->PI_9);
					$Doc->ExportField($this->PI_Question_28929);
					$Doc->ExportField($this->Target_28929);
					$Doc->ExportField($this->Target_N_28929);
					$Doc->ExportField($this->Target_D_28929);
					$Doc->ExportField($this->Remarks_28929);
					$Doc->ExportField($this->PI_10);
					$Doc->ExportField($this->PI_Question_281029);
					$Doc->ExportField($this->Target_281029);
					$Doc->ExportField($this->Target_N_281029);
					$Doc->ExportField($this->Target_D_281029);
					$Doc->ExportField($this->Remarks_281029);
					$Doc->ExportField($this->PI_11);
					$Doc->ExportField($this->PI_Question_281129);
					$Doc->ExportField($this->Target_281129);
					$Doc->ExportField($this->Target_N_281129);
					$Doc->ExportField($this->Target_D_281129);
					$Doc->ExportField($this->Remarks_281129);
					$Doc->ExportField($this->PI_12);
					$Doc->ExportField($this->PI_Question_281229);
					$Doc->ExportField($this->Target_281229);
					$Doc->ExportField($this->Target_N_281229);
					$Doc->ExportField($this->Target_D_281229);
					$Doc->ExportField($this->Remarks_281229);
				} else {
					$Doc->ExportField($this->Delivery_Unit);
					$Doc->ExportField($this->PI_1);
					$Doc->ExportField($this->PI_Question_28129);
					$Doc->ExportField($this->Target_28129);
					$Doc->ExportField($this->Target_N_28129);
					$Doc->ExportField($this->Target_D_28129);
					$Doc->ExportField($this->Remarks_28129);
					$Doc->ExportField($this->PI_2);
					$Doc->ExportField($this->PI_Question_28229);
					$Doc->ExportField($this->Target_28229);
					$Doc->ExportField($this->Target_N_28229);
					$Doc->ExportField($this->Target_D_28229);
					$Doc->ExportField($this->Remarks_28229);
					$Doc->ExportField($this->PI_3);
					$Doc->ExportField($this->PI_Question_28329);
					$Doc->ExportField($this->Target_28329);
					$Doc->ExportField($this->Target_N_28329);
					$Doc->ExportField($this->Target_D_28329);
					$Doc->ExportField($this->Remarks_28329);
					$Doc->ExportField($this->PI_4);
					$Doc->ExportField($this->PI_Question_28429);
					$Doc->ExportField($this->Target_28429);
					$Doc->ExportField($this->Target_N_28429);
					$Doc->ExportField($this->Target_D_28429);
					$Doc->ExportField($this->Remarks_28429);
					$Doc->ExportField($this->PI_5);
					$Doc->ExportField($this->PI_Question_28529);
					$Doc->ExportField($this->Target_28529);
					$Doc->ExportField($this->Target_N_28529);
					$Doc->ExportField($this->Target_D_28529);
					$Doc->ExportField($this->Remarks_28529);
					$Doc->ExportField($this->PI_6);
					$Doc->ExportField($this->PI_Question_28629);
					$Doc->ExportField($this->Target_28629);
					$Doc->ExportField($this->Target_N_28629);
					$Doc->ExportField($this->Target_D_28629);
					$Doc->ExportField($this->Remarks_28629);
					$Doc->ExportField($this->PI_7);
					$Doc->ExportField($this->PI_Question_28729);
					$Doc->ExportField($this->Target_28729);
					$Doc->ExportField($this->Target_N_28729);
					$Doc->ExportField($this->Target_D_28729);
					$Doc->ExportField($this->Remarks_28729);
					$Doc->ExportField($this->PI_8);
					$Doc->ExportField($this->PI_Question_28829);
					$Doc->ExportField($this->Target_28829);
					$Doc->ExportField($this->Target_N_28829);
					$Doc->ExportField($this->Target_D_28829);
					$Doc->ExportField($this->Remarks_28829);
					$Doc->ExportField($this->PI_9);
					$Doc->ExportField($this->PI_Question_28929);
					$Doc->ExportField($this->Target_28929);
					$Doc->ExportField($this->Target_N_28929);
					$Doc->ExportField($this->Target_D_28929);
					$Doc->ExportField($this->Remarks_28929);
					$Doc->ExportField($this->PI_10);
					$Doc->ExportField($this->PI_Question_281029);
					$Doc->ExportField($this->Target_281029);
					$Doc->ExportField($this->Target_N_281029);
					$Doc->ExportField($this->Target_D_281029);
					$Doc->ExportField($this->Remarks_281029);
					$Doc->ExportField($this->PI_11);
					$Doc->ExportField($this->PI_Question_281129);
					$Doc->ExportField($this->Target_281129);
					$Doc->ExportField($this->Target_N_281129);
					$Doc->ExportField($this->Target_D_281129);
					$Doc->ExportField($this->Remarks_281129);
					$Doc->ExportField($this->PI_12);
					$Doc->ExportField($this->PI_Question_281229);
					$Doc->ExportField($this->Target_281229);
					$Doc->ExportField($this->Target_N_281229);
					$Doc->ExportField($this->Target_D_281229);
					$Doc->ExportField($this->Remarks_281229);
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
				$sFilterWrk = '`focal_person_id` IN (' . $sFilterWrk . ')';
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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `frm_fp_rep_ta_form_a_1` WHERE " . $this->AddUserIDFilter("");

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
