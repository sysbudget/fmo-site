<?php

// Global variable for table object
$frm_fp_rep_ta_form_a_1_iatf = NULL;

//
// Table class for frm_fp_rep_ta_form_a_1_iatf
//
class cfrm_fp_rep_ta_form_a_1_iatf {
	var $TableVar = 'frm_fp_rep_ta_form_a_1_iatf';
	var $TableName = 'frm_fp_rep_ta_form_a_1_iatf';
	var $TableType = 'TABLE';
	var $units_id;
	var $focal_person_id;
	var $Constituent_University;
	var $Responsible_Bureaus_28129;
	var $MFOs;
	var $form_a_1_mfo;
	var $Performance_Indicator_1_28229;
	var $FY_2015_TARGET_for_Performance_Indicator_1_28329;
	var $FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429;
	var $Performance_Indicator_2_28529;
	var $FY_2015_TARGET_for_Performance_Indicator_2_28629;
	var $FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729;
	var $Performance_Indicator_3_28829;
	var $FY_2015_TARGET_for_Performance_Indicator_3_28929;
	var $FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029;
	var $Performance_Indicator_4_281129;
	var $FY_2015_TARGET_for_Performance_Indicator_4_281229;
	var $FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329;
	var $Performance_Indicator_5_281429;
	var $FY_2015_TARGET_for_Performance_Indicator_5_281529;
	var $FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629;
	var $Performance_Indicator_6_281729;
	var $FY_2015_TARGET_for_Performance_Indicator_6_281829;
	var $FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929;
	var $Performance_Indicator_7_282029;
	var $FY_2015_TARGET_for_Performance_Indicator_7_282129;
	var $FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229;
	var $Performance_Indicator_8_282329;
	var $FY_2015_TARGET_for_Performance_Indicator_8_282429;
	var $FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529;
	var $Performance_Indicator_9_282629;
	var $FY_2015_TARGET_for_Performance_Indicator_9_282729;
	var $FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829;
	var $Performance_Indicator_10_282929;
	var $FY_2015_TARGET_for_Performance_Indicator_10_283029;
	var $FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129;
	var $Performance_Indicator_11_283229;
	var $FY_2015_TARGET_for_Performance_Indicator_11_283329;
	var $FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429;
	var $Performance_Indicator_12_283529;
	var $FY_2015_TARGET_for_Performance_Indicator_12_283629;
	var $FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729;
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
	function cfrm_fp_rep_ta_form_a_1_iatf() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// units_id
		$this->units_id = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_units_id', 'units_id', '`units_id`', 3, -1, FALSE, '`units_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->units_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['units_id'] =& $this->units_id;

		// focal_person_id
		$this->focal_person_id = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_focal_person_id', 'focal_person_id', '`focal_person_id`', 3, -1, FALSE, '`focal_person_id`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->focal_person_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['focal_person_id'] =& $this->focal_person_id;

		// Constituent University
		$this->Constituent_University = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Constituent_University', 'Constituent University', '`Constituent University`', 200, -1, FALSE, '`Constituent University`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Constituent University'] =& $this->Constituent_University;

		// Responsible Bureaus (1)
		$this->Responsible_Bureaus_28129 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Responsible_Bureaus_28129', 'Responsible Bureaus (1)', '`Responsible Bureaus (1)`', 200, -1, FALSE, '`Responsible Bureaus (1)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Responsible Bureaus (1)'] =& $this->Responsible_Bureaus_28129;

		// MFOs
		$this->MFOs = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_MFOs', 'MFOs', '`MFOs`', 200, -1, FALSE, '`MFOs`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['MFOs'] =& $this->MFOs;

		// form_a_1_mfo
		$this->form_a_1_mfo = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_form_a_1_mfo', 'form_a_1_mfo', '`form_a_1_mfo`', 3, -1, FALSE, '`form_a_1_mfo`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->form_a_1_mfo->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['form_a_1_mfo'] =& $this->form_a_1_mfo;

		// Performance Indicator 1 (2)
		$this->Performance_Indicator_1_28229 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Performance_Indicator_1_28229', 'Performance Indicator 1 (2)', '`Performance Indicator 1 (2)`', 200, -1, FALSE, '`Performance Indicator 1 (2)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Performance Indicator 1 (2)'] =& $this->Performance_Indicator_1_28229;

		// FY 2015 TARGET for Performance Indicator 1 (3)
		$this->FY_2015_TARGET_for_Performance_Indicator_1_28329 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_TARGET_for_Performance_Indicator_1_28329', 'FY 2015 TARGET for Performance Indicator 1 (3)', '`FY 2015 TARGET for Performance Indicator 1 (3)`', 5, -1, FALSE, '`FY 2015 TARGET for Performance Indicator 1 (3)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_TARGET_for_Performance_Indicator_1_28329->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 TARGET for Performance Indicator 1 (3)'] =& $this->FY_2015_TARGET_for_Performance_Indicator_1_28329;

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429', 'FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)', '`FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)`', 5, -1, FALSE, '`FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)'] =& $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429;

		// Performance Indicator 2 (5)
		$this->Performance_Indicator_2_28529 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Performance_Indicator_2_28529', 'Performance Indicator 2 (5)', '`Performance Indicator 2 (5)`', 200, -1, FALSE, '`Performance Indicator 2 (5)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Performance Indicator 2 (5)'] =& $this->Performance_Indicator_2_28529;

		// FY 2015 TARGET for Performance Indicator 2 (6)
		$this->FY_2015_TARGET_for_Performance_Indicator_2_28629 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_TARGET_for_Performance_Indicator_2_28629', 'FY 2015 TARGET for Performance Indicator 2 (6)', '`FY 2015 TARGET for Performance Indicator 2 (6)`', 5, -1, FALSE, '`FY 2015 TARGET for Performance Indicator 2 (6)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_TARGET_for_Performance_Indicator_2_28629->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 TARGET for Performance Indicator 2 (6)'] =& $this->FY_2015_TARGET_for_Performance_Indicator_2_28629;

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729', 'FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)', '`FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)`', 5, -1, FALSE, '`FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)'] =& $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729;

		// Performance Indicator 3 (8)
		$this->Performance_Indicator_3_28829 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Performance_Indicator_3_28829', 'Performance Indicator 3 (8)', '`Performance Indicator 3 (8)`', 200, -1, FALSE, '`Performance Indicator 3 (8)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Performance Indicator 3 (8)'] =& $this->Performance_Indicator_3_28829;

		// FY 2015 TARGET for Performance Indicator 3 (9)
		$this->FY_2015_TARGET_for_Performance_Indicator_3_28929 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_TARGET_for_Performance_Indicator_3_28929', 'FY 2015 TARGET for Performance Indicator 3 (9)', '`FY 2015 TARGET for Performance Indicator 3 (9)`', 5, -1, FALSE, '`FY 2015 TARGET for Performance Indicator 3 (9)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_TARGET_for_Performance_Indicator_3_28929->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 TARGET for Performance Indicator 3 (9)'] =& $this->FY_2015_TARGET_for_Performance_Indicator_3_28929;

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029', 'FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)', '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)`', 5, -1, FALSE, '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)'] =& $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029;

		// Performance Indicator 4 (11)
		$this->Performance_Indicator_4_281129 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Performance_Indicator_4_281129', 'Performance Indicator 4 (11)', '`Performance Indicator 4 (11)`', 200, -1, FALSE, '`Performance Indicator 4 (11)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Performance Indicator 4 (11)'] =& $this->Performance_Indicator_4_281129;

		// FY 2015 TARGET for Performance Indicator 4 (12)
		$this->FY_2015_TARGET_for_Performance_Indicator_4_281229 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_TARGET_for_Performance_Indicator_4_281229', 'FY 2015 TARGET for Performance Indicator 4 (12)', '`FY 2015 TARGET for Performance Indicator 4 (12)`', 5, -1, FALSE, '`FY 2015 TARGET for Performance Indicator 4 (12)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_TARGET_for_Performance_Indicator_4_281229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 TARGET for Performance Indicator 4 (12)'] =& $this->FY_2015_TARGET_for_Performance_Indicator_4_281229;

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329', 'FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)', '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)`', 5, -1, FALSE, '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)'] =& $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329;

		// Performance Indicator 5 (14)
		$this->Performance_Indicator_5_281429 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Performance_Indicator_5_281429', 'Performance Indicator 5 (14)', '`Performance Indicator 5 (14)`', 200, -1, FALSE, '`Performance Indicator 5 (14)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Performance Indicator 5 (14)'] =& $this->Performance_Indicator_5_281429;

		// FY 2015 TARGET for Performance Indicator 5 (15)
		$this->FY_2015_TARGET_for_Performance_Indicator_5_281529 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_TARGET_for_Performance_Indicator_5_281529', 'FY 2015 TARGET for Performance Indicator 5 (15)', '`FY 2015 TARGET for Performance Indicator 5 (15)`', 5, -1, FALSE, '`FY 2015 TARGET for Performance Indicator 5 (15)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_TARGET_for_Performance_Indicator_5_281529->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 TARGET for Performance Indicator 5 (15)'] =& $this->FY_2015_TARGET_for_Performance_Indicator_5_281529;

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629', 'FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)', '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)`', 5, -1, FALSE, '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)'] =& $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629;

		// Performance Indicator 6 (17)
		$this->Performance_Indicator_6_281729 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Performance_Indicator_6_281729', 'Performance Indicator 6 (17)', '`Performance Indicator 6 (17)`', 200, -1, FALSE, '`Performance Indicator 6 (17)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Performance Indicator 6 (17)'] =& $this->Performance_Indicator_6_281729;

		// FY 2015 TARGET for Performance Indicator 6 (18)
		$this->FY_2015_TARGET_for_Performance_Indicator_6_281829 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_TARGET_for_Performance_Indicator_6_281829', 'FY 2015 TARGET for Performance Indicator 6 (18)', '`FY 2015 TARGET for Performance Indicator 6 (18)`', 5, -1, FALSE, '`FY 2015 TARGET for Performance Indicator 6 (18)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_TARGET_for_Performance_Indicator_6_281829->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 TARGET for Performance Indicator 6 (18)'] =& $this->FY_2015_TARGET_for_Performance_Indicator_6_281829;

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929', 'FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)', '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)`', 5, -1, FALSE, '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)'] =& $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929;

		// Performance Indicator 7 (20)
		$this->Performance_Indicator_7_282029 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Performance_Indicator_7_282029', 'Performance Indicator 7 (20)', '`Performance Indicator 7 (20)`', 200, -1, FALSE, '`Performance Indicator 7 (20)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Performance Indicator 7 (20)'] =& $this->Performance_Indicator_7_282029;

		// FY 2015 TARGET for Performance Indicator 7 (21)
		$this->FY_2015_TARGET_for_Performance_Indicator_7_282129 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_TARGET_for_Performance_Indicator_7_282129', 'FY 2015 TARGET for Performance Indicator 7 (21)', '`FY 2015 TARGET for Performance Indicator 7 (21)`', 5, -1, FALSE, '`FY 2015 TARGET for Performance Indicator 7 (21)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_TARGET_for_Performance_Indicator_7_282129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 TARGET for Performance Indicator 7 (21)'] =& $this->FY_2015_TARGET_for_Performance_Indicator_7_282129;

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229', 'FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)', '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)`', 5, -1, FALSE, '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)'] =& $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229;

		// Performance Indicator 8 (23)
		$this->Performance_Indicator_8_282329 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Performance_Indicator_8_282329', 'Performance Indicator 8 (23)', '`Performance Indicator 8 (23)`', 200, -1, FALSE, '`Performance Indicator 8 (23)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Performance Indicator 8 (23)'] =& $this->Performance_Indicator_8_282329;

		// FY 2015 TARGET for Performance Indicator 8 (24)
		$this->FY_2015_TARGET_for_Performance_Indicator_8_282429 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_TARGET_for_Performance_Indicator_8_282429', 'FY 2015 TARGET for Performance Indicator 8 (24)', '`FY 2015 TARGET for Performance Indicator 8 (24)`', 5, -1, FALSE, '`FY 2015 TARGET for Performance Indicator 8 (24)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_TARGET_for_Performance_Indicator_8_282429->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 TARGET for Performance Indicator 8 (24)'] =& $this->FY_2015_TARGET_for_Performance_Indicator_8_282429;

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529', 'FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)', '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)`', 5, -1, FALSE, '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)'] =& $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529;

		// Performance Indicator 9 (26)
		$this->Performance_Indicator_9_282629 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Performance_Indicator_9_282629', 'Performance Indicator 9 (26)', '`Performance Indicator 9 (26)`', 200, -1, FALSE, '`Performance Indicator 9 (26)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Performance Indicator 9 (26)'] =& $this->Performance_Indicator_9_282629;

		// FY 2015 TARGET for Performance Indicator 9 (27)
		$this->FY_2015_TARGET_for_Performance_Indicator_9_282729 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_TARGET_for_Performance_Indicator_9_282729', 'FY 2015 TARGET for Performance Indicator 9 (27)', '`FY 2015 TARGET for Performance Indicator 9 (27)`', 5, -1, FALSE, '`FY 2015 TARGET for Performance Indicator 9 (27)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_TARGET_for_Performance_Indicator_9_282729->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 TARGET for Performance Indicator 9 (27)'] =& $this->FY_2015_TARGET_for_Performance_Indicator_9_282729;

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829', 'FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)', '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)`', 5, -1, FALSE, '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)'] =& $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829;

		// Performance Indicator 10 (29)
		$this->Performance_Indicator_10_282929 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Performance_Indicator_10_282929', 'Performance Indicator 10 (29)', '`Performance Indicator 10 (29)`', 200, -1, FALSE, '`Performance Indicator 10 (29)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Performance Indicator 10 (29)'] =& $this->Performance_Indicator_10_282929;

		// FY 2015 TARGET for Performance Indicator 10 (30)
		$this->FY_2015_TARGET_for_Performance_Indicator_10_283029 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_TARGET_for_Performance_Indicator_10_283029', 'FY 2015 TARGET for Performance Indicator 10 (30)', '`FY 2015 TARGET for Performance Indicator 10 (30)`', 5, -1, FALSE, '`FY 2015 TARGET for Performance Indicator 10 (30)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_TARGET_for_Performance_Indicator_10_283029->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 TARGET for Performance Indicator 10 (30)'] =& $this->FY_2015_TARGET_for_Performance_Indicator_10_283029;

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129', 'FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)', '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)`', 5, -1, FALSE, '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)'] =& $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129;

		// Performance Indicator 11 (32)
		$this->Performance_Indicator_11_283229 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Performance_Indicator_11_283229', 'Performance Indicator 11 (32)', '`Performance Indicator 11 (32)`', 200, -1, FALSE, '`Performance Indicator 11 (32)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Performance Indicator 11 (32)'] =& $this->Performance_Indicator_11_283229;

		// FY 2015 TARGET for Performance Indicator 11 (33)
		$this->FY_2015_TARGET_for_Performance_Indicator_11_283329 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_TARGET_for_Performance_Indicator_11_283329', 'FY 2015 TARGET for Performance Indicator 11 (33)', '`FY 2015 TARGET for Performance Indicator 11 (33)`', 5, -1, FALSE, '`FY 2015 TARGET for Performance Indicator 11 (33)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_TARGET_for_Performance_Indicator_11_283329->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 TARGET for Performance Indicator 11 (33)'] =& $this->FY_2015_TARGET_for_Performance_Indicator_11_283329;

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429', 'FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)', '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)`', 5, -1, FALSE, '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)'] =& $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429;

		// Performance Indicator 12 (35)
		$this->Performance_Indicator_12_283529 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_Performance_Indicator_12_283529', 'Performance Indicator 12 (35)', '`Performance Indicator 12 (35)`', 200, -1, FALSE, '`Performance Indicator 12 (35)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Performance Indicator 12 (35)'] =& $this->Performance_Indicator_12_283529;

		// FY 2015 TARGET for Performance Indicator 12 (36)
		$this->FY_2015_TARGET_for_Performance_Indicator_12_283629 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_TARGET_for_Performance_Indicator_12_283629', 'FY 2015 TARGET for Performance Indicator 12 (36)', '`FY 2015 TARGET for Performance Indicator 12 (36)`', 5, -1, FALSE, '`FY 2015 TARGET for Performance Indicator 12 (36)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_TARGET_for_Performance_Indicator_12_283629->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 TARGET for Performance Indicator 12 (36)'] =& $this->FY_2015_TARGET_for_Performance_Indicator_12_283629;

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729 = new cField('frm_fp_rep_ta_form_a_1_iatf', 'frm_fp_rep_ta_form_a_1_iatf', 'x_FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729', 'FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)', '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)`', 5, -1, FALSE, '`FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)'] =& $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729;
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
		return "frm_fp_rep_ta_form_a_1_iatf_Highlight";
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
		if ($this->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_1_iatf_header") {
			if ($this->units_id->getSessionValue() <> "")
				$sMasterFilter .= "`units_id`=" . up_QuotedValue($this->units_id->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
			if ($this->focal_person_id->getSessionValue() <> "")
				$sMasterFilter .= " AND `focal_person_id`=" . up_QuotedValue($this->focal_person_id->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sMasterFilter;
	}

	// Session detail WHERE clause
	function getDetailFilter() {

		// Detail filter
		$sDetailFilter = "";
		if ($this->getCurrentMasterTable() == "frm_fp_rep_ta_form_a_1_iatf_header") {
			if ($this->units_id->getSessionValue() <> "")
				$sDetailFilter .= "`units_id`=" . up_QuotedValue($this->units_id->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
			if ($this->focal_person_id->getSessionValue() <> "")
				$sDetailFilter .= " AND `focal_person_id`=" . up_QuotedValue($this->focal_person_id->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sDetailFilter;
	}

	// Master filter
	function SqlMasterFilter_frm_fp_rep_ta_form_a_1_iatf_header() {
		return "`units_id`=@units_id@ AND `focal_person_id`=@focal_person_id@";
	}

	// Detail filter
	function SqlDetailFilter_frm_fp_rep_ta_form_a_1_iatf_header() {
		return "`units_id`=@units_id@ AND `focal_person_id`=@focal_person_id@";
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`frm_fp_rep_ta_form_a_1_iatf`";
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
		return "INSERT INTO `frm_fp_rep_ta_form_a_1_iatf` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `frm_fp_rep_ta_form_a_1_iatf` SET ";
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
		$SQL = "DELETE FROM `frm_fp_rep_ta_form_a_1_iatf` WHERE ";
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
			return "frm_fp_rep_ta_form_a_1_iatflist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "frm_fp_rep_ta_form_a_1_iatflist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("frm_fp_rep_ta_form_a_1_iatfview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "frm_fp_rep_ta_form_a_1_iatfadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("frm_fp_rep_ta_form_a_1_iatfedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("frm_fp_rep_ta_form_a_1_iatfadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("frm_fp_rep_ta_form_a_1_iatfdelete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=frm_fp_rep_ta_form_a_1_iatf" : "";
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
		$this->Responsible_Bureaus_28129->setDbValue($rs->fields('Responsible Bureaus (1)'));
		$this->MFOs->setDbValue($rs->fields('MFOs'));
		$this->form_a_1_mfo->setDbValue($rs->fields('form_a_1_mfo'));
		$this->Performance_Indicator_1_28229->setDbValue($rs->fields('Performance Indicator 1 (2)'));
		$this->FY_2015_TARGET_for_Performance_Indicator_1_28329->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 1 (3)'));
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)'));
		$this->Performance_Indicator_2_28529->setDbValue($rs->fields('Performance Indicator 2 (5)'));
		$this->FY_2015_TARGET_for_Performance_Indicator_2_28629->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 2 (6)'));
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)'));
		$this->Performance_Indicator_3_28829->setDbValue($rs->fields('Performance Indicator 3 (8)'));
		$this->FY_2015_TARGET_for_Performance_Indicator_3_28929->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 3 (9)'));
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)'));
		$this->Performance_Indicator_4_281129->setDbValue($rs->fields('Performance Indicator 4 (11)'));
		$this->FY_2015_TARGET_for_Performance_Indicator_4_281229->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 4 (12)'));
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)'));
		$this->Performance_Indicator_5_281429->setDbValue($rs->fields('Performance Indicator 5 (14)'));
		$this->FY_2015_TARGET_for_Performance_Indicator_5_281529->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 5 (15)'));
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)'));
		$this->Performance_Indicator_6_281729->setDbValue($rs->fields('Performance Indicator 6 (17)'));
		$this->FY_2015_TARGET_for_Performance_Indicator_6_281829->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 6 (18)'));
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)'));
		$this->Performance_Indicator_7_282029->setDbValue($rs->fields('Performance Indicator 7 (20)'));
		$this->FY_2015_TARGET_for_Performance_Indicator_7_282129->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 7 (21)'));
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)'));
		$this->Performance_Indicator_8_282329->setDbValue($rs->fields('Performance Indicator 8 (23)'));
		$this->FY_2015_TARGET_for_Performance_Indicator_8_282429->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 8 (24)'));
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)'));
		$this->Performance_Indicator_9_282629->setDbValue($rs->fields('Performance Indicator 9 (26)'));
		$this->FY_2015_TARGET_for_Performance_Indicator_9_282729->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 9 (27)'));
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)'));
		$this->Performance_Indicator_10_282929->setDbValue($rs->fields('Performance Indicator 10 (29)'));
		$this->FY_2015_TARGET_for_Performance_Indicator_10_283029->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 10 (30)'));
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)'));
		$this->Performance_Indicator_11_283229->setDbValue($rs->fields('Performance Indicator 11 (32)'));
		$this->FY_2015_TARGET_for_Performance_Indicator_11_283329->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 11 (33)'));
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)'));
		$this->Performance_Indicator_12_283529->setDbValue($rs->fields('Performance Indicator 12 (35)'));
		$this->FY_2015_TARGET_for_Performance_Indicator_12_283629->setDbValue($rs->fields('FY 2015 TARGET for Performance Indicator 12 (36)'));
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->setDbValue($rs->fields('FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)'));
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

		// Responsible Bureaus (1)
		// MFOs
		// form_a_1_mfo

		$this->form_a_1_mfo->CellCssStyle = "white-space: nowrap;";

		// Performance Indicator 1 (2)
		// FY 2015 TARGET for Performance Indicator 1 (3)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
		// Performance Indicator 2 (5)
		// FY 2015 TARGET for Performance Indicator 2 (6)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
		// Performance Indicator 3 (8)
		// FY 2015 TARGET for Performance Indicator 3 (9)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
		// Performance Indicator 4 (11)
		// FY 2015 TARGET for Performance Indicator 4 (12)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
		// Performance Indicator 5 (14)
		// FY 2015 TARGET for Performance Indicator 5 (15)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
		// Performance Indicator 6 (17)
		// FY 2015 TARGET for Performance Indicator 6 (18)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
		// Performance Indicator 7 (20)
		// FY 2015 TARGET for Performance Indicator 7 (21)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
		// Performance Indicator 8 (23)
		// FY 2015 TARGET for Performance Indicator 8 (24)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
		// Performance Indicator 9 (26)
		// FY 2015 TARGET for Performance Indicator 9 (27)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
		// Performance Indicator 10 (29)
		// FY 2015 TARGET for Performance Indicator 10 (30)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
		// Performance Indicator 11 (32)
		// FY 2015 TARGET for Performance Indicator 11 (33)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
		// Performance Indicator 12 (35)
		// FY 2015 TARGET for Performance Indicator 12 (36)
		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
		// units_id

		$this->units_id->ViewValue = $this->units_id->CurrentValue;
		$this->units_id->ViewCustomAttributes = "";

		// focal_person_id
		$this->focal_person_id->ViewValue = $this->focal_person_id->CurrentValue;
		$this->focal_person_id->ViewCustomAttributes = "";

		// Constituent University
		$this->Constituent_University->ViewValue = $this->Constituent_University->CurrentValue;
		$this->Constituent_University->ViewCustomAttributes = "";

		// Responsible Bureaus (1)
		$this->Responsible_Bureaus_28129->ViewValue = $this->Responsible_Bureaus_28129->CurrentValue;
		$this->Responsible_Bureaus_28129->ViewCustomAttributes = "";

		// MFOs
		$this->MFOs->ViewValue = $this->MFOs->CurrentValue;
		$this->MFOs->ViewCustomAttributes = "";

		// form_a_1_mfo
		$this->form_a_1_mfo->ViewValue = $this->form_a_1_mfo->CurrentValue;
		$this->form_a_1_mfo->ViewCustomAttributes = "";

		// Performance Indicator 1 (2)
		$this->Performance_Indicator_1_28229->ViewValue = $this->Performance_Indicator_1_28229->CurrentValue;
		$this->Performance_Indicator_1_28229->ViewCustomAttributes = "";

		// FY 2015 TARGET for Performance Indicator 1 (3)
		$this->FY_2015_TARGET_for_Performance_Indicator_1_28329->ViewValue = $this->FY_2015_TARGET_for_Performance_Indicator_1_28329->CurrentValue;
		$this->FY_2015_TARGET_for_Performance_Indicator_1_28329->ViewCustomAttributes = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ViewValue = $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CurrentValue;
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ViewCustomAttributes = "";

		// Performance Indicator 2 (5)
		$this->Performance_Indicator_2_28529->ViewValue = $this->Performance_Indicator_2_28529->CurrentValue;
		$this->Performance_Indicator_2_28529->ViewCustomAttributes = "";

		// FY 2015 TARGET for Performance Indicator 2 (6)
		$this->FY_2015_TARGET_for_Performance_Indicator_2_28629->ViewValue = $this->FY_2015_TARGET_for_Performance_Indicator_2_28629->CurrentValue;
		$this->FY_2015_TARGET_for_Performance_Indicator_2_28629->ViewCustomAttributes = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ViewValue = $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CurrentValue;
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ViewCustomAttributes = "";

		// Performance Indicator 3 (8)
		$this->Performance_Indicator_3_28829->ViewValue = $this->Performance_Indicator_3_28829->CurrentValue;
		$this->Performance_Indicator_3_28829->ViewCustomAttributes = "";

		// FY 2015 TARGET for Performance Indicator 3 (9)
		$this->FY_2015_TARGET_for_Performance_Indicator_3_28929->ViewValue = $this->FY_2015_TARGET_for_Performance_Indicator_3_28929->CurrentValue;
		$this->FY_2015_TARGET_for_Performance_Indicator_3_28929->ViewCustomAttributes = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ViewValue = $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CurrentValue;
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ViewCustomAttributes = "";

		// Performance Indicator 4 (11)
		$this->Performance_Indicator_4_281129->ViewValue = $this->Performance_Indicator_4_281129->CurrentValue;
		$this->Performance_Indicator_4_281129->ViewCustomAttributes = "";

		// FY 2015 TARGET for Performance Indicator 4 (12)
		$this->FY_2015_TARGET_for_Performance_Indicator_4_281229->ViewValue = $this->FY_2015_TARGET_for_Performance_Indicator_4_281229->CurrentValue;
		$this->FY_2015_TARGET_for_Performance_Indicator_4_281229->ViewCustomAttributes = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ViewValue = $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CurrentValue;
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ViewCustomAttributes = "";

		// Performance Indicator 5 (14)
		$this->Performance_Indicator_5_281429->ViewValue = $this->Performance_Indicator_5_281429->CurrentValue;
		$this->Performance_Indicator_5_281429->ViewCustomAttributes = "";

		// FY 2015 TARGET for Performance Indicator 5 (15)
		$this->FY_2015_TARGET_for_Performance_Indicator_5_281529->ViewValue = $this->FY_2015_TARGET_for_Performance_Indicator_5_281529->CurrentValue;
		$this->FY_2015_TARGET_for_Performance_Indicator_5_281529->ViewCustomAttributes = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ViewValue = $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CurrentValue;
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ViewCustomAttributes = "";

		// Performance Indicator 6 (17)
		$this->Performance_Indicator_6_281729->ViewValue = $this->Performance_Indicator_6_281729->CurrentValue;
		$this->Performance_Indicator_6_281729->ViewCustomAttributes = "";

		// FY 2015 TARGET for Performance Indicator 6 (18)
		$this->FY_2015_TARGET_for_Performance_Indicator_6_281829->ViewValue = $this->FY_2015_TARGET_for_Performance_Indicator_6_281829->CurrentValue;
		$this->FY_2015_TARGET_for_Performance_Indicator_6_281829->ViewCustomAttributes = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ViewValue = $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CurrentValue;
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ViewCustomAttributes = "";

		// Performance Indicator 7 (20)
		$this->Performance_Indicator_7_282029->ViewValue = $this->Performance_Indicator_7_282029->CurrentValue;
		$this->Performance_Indicator_7_282029->ViewCustomAttributes = "";

		// FY 2015 TARGET for Performance Indicator 7 (21)
		$this->FY_2015_TARGET_for_Performance_Indicator_7_282129->ViewValue = $this->FY_2015_TARGET_for_Performance_Indicator_7_282129->CurrentValue;
		$this->FY_2015_TARGET_for_Performance_Indicator_7_282129->ViewCustomAttributes = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ViewValue = $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CurrentValue;
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ViewCustomAttributes = "";

		// Performance Indicator 8 (23)
		$this->Performance_Indicator_8_282329->ViewValue = $this->Performance_Indicator_8_282329->CurrentValue;
		$this->Performance_Indicator_8_282329->ViewCustomAttributes = "";

		// FY 2015 TARGET for Performance Indicator 8 (24)
		$this->FY_2015_TARGET_for_Performance_Indicator_8_282429->ViewValue = $this->FY_2015_TARGET_for_Performance_Indicator_8_282429->CurrentValue;
		$this->FY_2015_TARGET_for_Performance_Indicator_8_282429->ViewCustomAttributes = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ViewValue = $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CurrentValue;
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ViewCustomAttributes = "";

		// Performance Indicator 9 (26)
		$this->Performance_Indicator_9_282629->ViewValue = $this->Performance_Indicator_9_282629->CurrentValue;
		$this->Performance_Indicator_9_282629->ViewCustomAttributes = "";

		// FY 2015 TARGET for Performance Indicator 9 (27)
		$this->FY_2015_TARGET_for_Performance_Indicator_9_282729->ViewValue = $this->FY_2015_TARGET_for_Performance_Indicator_9_282729->CurrentValue;
		$this->FY_2015_TARGET_for_Performance_Indicator_9_282729->ViewCustomAttributes = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ViewValue = $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CurrentValue;
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ViewCustomAttributes = "";

		// Performance Indicator 10 (29)
		$this->Performance_Indicator_10_282929->ViewValue = $this->Performance_Indicator_10_282929->CurrentValue;
		$this->Performance_Indicator_10_282929->ViewCustomAttributes = "";

		// FY 2015 TARGET for Performance Indicator 10 (30)
		$this->FY_2015_TARGET_for_Performance_Indicator_10_283029->ViewValue = $this->FY_2015_TARGET_for_Performance_Indicator_10_283029->CurrentValue;
		$this->FY_2015_TARGET_for_Performance_Indicator_10_283029->ViewCustomAttributes = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ViewValue = $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CurrentValue;
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ViewCustomAttributes = "";

		// Performance Indicator 11 (32)
		$this->Performance_Indicator_11_283229->ViewValue = $this->Performance_Indicator_11_283229->CurrentValue;
		$this->Performance_Indicator_11_283229->ViewCustomAttributes = "";

		// FY 2015 TARGET for Performance Indicator 11 (33)
		$this->FY_2015_TARGET_for_Performance_Indicator_11_283329->ViewValue = $this->FY_2015_TARGET_for_Performance_Indicator_11_283329->CurrentValue;
		$this->FY_2015_TARGET_for_Performance_Indicator_11_283329->ViewCustomAttributes = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ViewValue = $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CurrentValue;
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ViewCustomAttributes = "";

		// Performance Indicator 12 (35)
		$this->Performance_Indicator_12_283529->ViewValue = $this->Performance_Indicator_12_283529->CurrentValue;
		$this->Performance_Indicator_12_283529->ViewCustomAttributes = "";

		// FY 2015 TARGET for Performance Indicator 12 (36)
		$this->FY_2015_TARGET_for_Performance_Indicator_12_283629->ViewValue = $this->FY_2015_TARGET_for_Performance_Indicator_12_283629->CurrentValue;
		$this->FY_2015_TARGET_for_Performance_Indicator_12_283629->ViewCustomAttributes = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ViewValue = $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CurrentValue;
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ViewCustomAttributes = "";

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

		// Responsible Bureaus (1)
		$this->Responsible_Bureaus_28129->LinkCustomAttributes = "";
		$this->Responsible_Bureaus_28129->HrefValue = "";
		$this->Responsible_Bureaus_28129->TooltipValue = "";

		// MFOs
		$this->MFOs->LinkCustomAttributes = "";
		$this->MFOs->HrefValue = "";
		$this->MFOs->TooltipValue = "";

		// form_a_1_mfo
		$this->form_a_1_mfo->LinkCustomAttributes = "";
		$this->form_a_1_mfo->HrefValue = "";
		$this->form_a_1_mfo->TooltipValue = "";

		// Performance Indicator 1 (2)
		$this->Performance_Indicator_1_28229->LinkCustomAttributes = "";
		$this->Performance_Indicator_1_28229->HrefValue = "";
		$this->Performance_Indicator_1_28229->TooltipValue = "";

		// FY 2015 TARGET for Performance Indicator 1 (3)
		$this->FY_2015_TARGET_for_Performance_Indicator_1_28329->LinkCustomAttributes = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_1_28329->HrefValue = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_1_28329->TooltipValue = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->LinkCustomAttributes = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->HrefValue = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->TooltipValue = "";

		// Performance Indicator 2 (5)
		$this->Performance_Indicator_2_28529->LinkCustomAttributes = "";
		$this->Performance_Indicator_2_28529->HrefValue = "";
		$this->Performance_Indicator_2_28529->TooltipValue = "";

		// FY 2015 TARGET for Performance Indicator 2 (6)
		$this->FY_2015_TARGET_for_Performance_Indicator_2_28629->LinkCustomAttributes = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_2_28629->HrefValue = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_2_28629->TooltipValue = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->LinkCustomAttributes = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->HrefValue = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->TooltipValue = "";

		// Performance Indicator 3 (8)
		$this->Performance_Indicator_3_28829->LinkCustomAttributes = "";
		$this->Performance_Indicator_3_28829->HrefValue = "";
		$this->Performance_Indicator_3_28829->TooltipValue = "";

		// FY 2015 TARGET for Performance Indicator 3 (9)
		$this->FY_2015_TARGET_for_Performance_Indicator_3_28929->LinkCustomAttributes = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_3_28929->HrefValue = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_3_28929->TooltipValue = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->LinkCustomAttributes = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->HrefValue = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->TooltipValue = "";

		// Performance Indicator 4 (11)
		$this->Performance_Indicator_4_281129->LinkCustomAttributes = "";
		$this->Performance_Indicator_4_281129->HrefValue = "";
		$this->Performance_Indicator_4_281129->TooltipValue = "";

		// FY 2015 TARGET for Performance Indicator 4 (12)
		$this->FY_2015_TARGET_for_Performance_Indicator_4_281229->LinkCustomAttributes = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_4_281229->HrefValue = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_4_281229->TooltipValue = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->LinkCustomAttributes = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->HrefValue = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->TooltipValue = "";

		// Performance Indicator 5 (14)
		$this->Performance_Indicator_5_281429->LinkCustomAttributes = "";
		$this->Performance_Indicator_5_281429->HrefValue = "";
		$this->Performance_Indicator_5_281429->TooltipValue = "";

		// FY 2015 TARGET for Performance Indicator 5 (15)
		$this->FY_2015_TARGET_for_Performance_Indicator_5_281529->LinkCustomAttributes = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_5_281529->HrefValue = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_5_281529->TooltipValue = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->LinkCustomAttributes = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->HrefValue = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->TooltipValue = "";

		// Performance Indicator 6 (17)
		$this->Performance_Indicator_6_281729->LinkCustomAttributes = "";
		$this->Performance_Indicator_6_281729->HrefValue = "";
		$this->Performance_Indicator_6_281729->TooltipValue = "";

		// FY 2015 TARGET for Performance Indicator 6 (18)
		$this->FY_2015_TARGET_for_Performance_Indicator_6_281829->LinkCustomAttributes = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_6_281829->HrefValue = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_6_281829->TooltipValue = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->LinkCustomAttributes = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->HrefValue = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->TooltipValue = "";

		// Performance Indicator 7 (20)
		$this->Performance_Indicator_7_282029->LinkCustomAttributes = "";
		$this->Performance_Indicator_7_282029->HrefValue = "";
		$this->Performance_Indicator_7_282029->TooltipValue = "";

		// FY 2015 TARGET for Performance Indicator 7 (21)
		$this->FY_2015_TARGET_for_Performance_Indicator_7_282129->LinkCustomAttributes = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_7_282129->HrefValue = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_7_282129->TooltipValue = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->LinkCustomAttributes = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->HrefValue = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->TooltipValue = "";

		// Performance Indicator 8 (23)
		$this->Performance_Indicator_8_282329->LinkCustomAttributes = "";
		$this->Performance_Indicator_8_282329->HrefValue = "";
		$this->Performance_Indicator_8_282329->TooltipValue = "";

		// FY 2015 TARGET for Performance Indicator 8 (24)
		$this->FY_2015_TARGET_for_Performance_Indicator_8_282429->LinkCustomAttributes = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_8_282429->HrefValue = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_8_282429->TooltipValue = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->LinkCustomAttributes = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->HrefValue = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->TooltipValue = "";

		// Performance Indicator 9 (26)
		$this->Performance_Indicator_9_282629->LinkCustomAttributes = "";
		$this->Performance_Indicator_9_282629->HrefValue = "";
		$this->Performance_Indicator_9_282629->TooltipValue = "";

		// FY 2015 TARGET for Performance Indicator 9 (27)
		$this->FY_2015_TARGET_for_Performance_Indicator_9_282729->LinkCustomAttributes = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_9_282729->HrefValue = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_9_282729->TooltipValue = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->LinkCustomAttributes = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->HrefValue = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->TooltipValue = "";

		// Performance Indicator 10 (29)
		$this->Performance_Indicator_10_282929->LinkCustomAttributes = "";
		$this->Performance_Indicator_10_282929->HrefValue = "";
		$this->Performance_Indicator_10_282929->TooltipValue = "";

		// FY 2015 TARGET for Performance Indicator 10 (30)
		$this->FY_2015_TARGET_for_Performance_Indicator_10_283029->LinkCustomAttributes = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_10_283029->HrefValue = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_10_283029->TooltipValue = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->LinkCustomAttributes = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->HrefValue = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->TooltipValue = "";

		// Performance Indicator 11 (32)
		$this->Performance_Indicator_11_283229->LinkCustomAttributes = "";
		$this->Performance_Indicator_11_283229->HrefValue = "";
		$this->Performance_Indicator_11_283229->TooltipValue = "";

		// FY 2015 TARGET for Performance Indicator 11 (33)
		$this->FY_2015_TARGET_for_Performance_Indicator_11_283329->LinkCustomAttributes = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_11_283329->HrefValue = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_11_283329->TooltipValue = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->LinkCustomAttributes = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->HrefValue = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->TooltipValue = "";

		// Performance Indicator 12 (35)
		$this->Performance_Indicator_12_283529->LinkCustomAttributes = "";
		$this->Performance_Indicator_12_283529->HrefValue = "";
		$this->Performance_Indicator_12_283529->TooltipValue = "";

		// FY 2015 TARGET for Performance Indicator 12 (36)
		$this->FY_2015_TARGET_for_Performance_Indicator_12_283629->LinkCustomAttributes = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_12_283629->HrefValue = "";
		$this->FY_2015_TARGET_for_Performance_Indicator_12_283629->TooltipValue = "";

		// FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37)
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->LinkCustomAttributes = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->HrefValue = "";
		$this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->TooltipValue = "";

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
					$XmlDoc->AddField('Responsible_Bureaus_28129', $this->Responsible_Bureaus_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFOs', $this->MFOs->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('form_a_1_mfo', $this->form_a_1_mfo->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_1_28229', $this->Performance_Indicator_1_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_1_28329', $this->FY_2015_TARGET_for_Performance_Indicator_1_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_2_28529', $this->Performance_Indicator_2_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_2_28629', $this->FY_2015_TARGET_for_Performance_Indicator_2_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_3_28829', $this->Performance_Indicator_3_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_3_28929', $this->FY_2015_TARGET_for_Performance_Indicator_3_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_4_281129', $this->Performance_Indicator_4_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_4_281229', $this->FY_2015_TARGET_for_Performance_Indicator_4_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_5_281429', $this->Performance_Indicator_5_281429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_5_281529', $this->FY_2015_TARGET_for_Performance_Indicator_5_281529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_6_281729', $this->Performance_Indicator_6_281729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_6_281829', $this->FY_2015_TARGET_for_Performance_Indicator_6_281829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_7_282029', $this->Performance_Indicator_7_282029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_7_282129', $this->FY_2015_TARGET_for_Performance_Indicator_7_282129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_8_282329', $this->Performance_Indicator_8_282329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_8_282429', $this->FY_2015_TARGET_for_Performance_Indicator_8_282429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_9_282629', $this->Performance_Indicator_9_282629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_9_282729', $this->FY_2015_TARGET_for_Performance_Indicator_9_282729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_10_282929', $this->Performance_Indicator_10_282929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_10_283029', $this->FY_2015_TARGET_for_Performance_Indicator_10_283029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_11_283229', $this->Performance_Indicator_11_283229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_11_283329', $this->FY_2015_TARGET_for_Performance_Indicator_11_283329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_12_283529', $this->Performance_Indicator_12_283529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_12_283629', $this->FY_2015_TARGET_for_Performance_Indicator_12_283629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('Responsible_Bureaus_28129', $this->Responsible_Bureaus_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFOs', $this->MFOs->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_1_28229', $this->Performance_Indicator_1_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_1_28329', $this->FY_2015_TARGET_for_Performance_Indicator_1_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_2_28529', $this->Performance_Indicator_2_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_2_28629', $this->FY_2015_TARGET_for_Performance_Indicator_2_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_3_28829', $this->Performance_Indicator_3_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_3_28929', $this->FY_2015_TARGET_for_Performance_Indicator_3_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_4_281129', $this->Performance_Indicator_4_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_4_281229', $this->FY_2015_TARGET_for_Performance_Indicator_4_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_5_281429', $this->Performance_Indicator_5_281429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_5_281529', $this->FY_2015_TARGET_for_Performance_Indicator_5_281529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_6_281729', $this->Performance_Indicator_6_281729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_6_281829', $this->FY_2015_TARGET_for_Performance_Indicator_6_281829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_7_282029', $this->Performance_Indicator_7_282029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_7_282129', $this->FY_2015_TARGET_for_Performance_Indicator_7_282129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_8_282329', $this->Performance_Indicator_8_282329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_8_282429', $this->FY_2015_TARGET_for_Performance_Indicator_8_282429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_9_282629', $this->Performance_Indicator_9_282629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_9_282729', $this->FY_2015_TARGET_for_Performance_Indicator_9_282729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_10_282929', $this->Performance_Indicator_10_282929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_10_283029', $this->FY_2015_TARGET_for_Performance_Indicator_10_283029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_11_283229', $this->Performance_Indicator_11_283229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_11_283329', $this->FY_2015_TARGET_for_Performance_Indicator_11_283329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Performance_Indicator_12_283529', $this->Performance_Indicator_12_283529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_TARGET_for_Performance_Indicator_12_283629', $this->FY_2015_TARGET_for_Performance_Indicator_12_283629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729', $this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->Responsible_Bureaus_28129);
				$Doc->ExportCaption($this->MFOs);
				$Doc->ExportCaption($this->form_a_1_mfo);
				$Doc->ExportCaption($this->Performance_Indicator_1_28229);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_1_28329);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429);
				$Doc->ExportCaption($this->Performance_Indicator_2_28529);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_2_28629);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729);
				$Doc->ExportCaption($this->Performance_Indicator_3_28829);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_3_28929);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029);
				$Doc->ExportCaption($this->Performance_Indicator_4_281129);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_4_281229);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329);
				$Doc->ExportCaption($this->Performance_Indicator_5_281429);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_5_281529);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629);
				$Doc->ExportCaption($this->Performance_Indicator_6_281729);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_6_281829);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929);
				$Doc->ExportCaption($this->Performance_Indicator_7_282029);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_7_282129);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229);
				$Doc->ExportCaption($this->Performance_Indicator_8_282329);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_8_282429);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529);
				$Doc->ExportCaption($this->Performance_Indicator_9_282629);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_9_282729);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829);
				$Doc->ExportCaption($this->Performance_Indicator_10_282929);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_10_283029);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129);
				$Doc->ExportCaption($this->Performance_Indicator_11_283229);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_11_283329);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429);
				$Doc->ExportCaption($this->Performance_Indicator_12_283529);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_12_283629);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729);
			} else {
				$Doc->ExportCaption($this->Responsible_Bureaus_28129);
				$Doc->ExportCaption($this->MFOs);
				$Doc->ExportCaption($this->Performance_Indicator_1_28229);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_1_28329);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429);
				$Doc->ExportCaption($this->Performance_Indicator_2_28529);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_2_28629);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729);
				$Doc->ExportCaption($this->Performance_Indicator_3_28829);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_3_28929);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029);
				$Doc->ExportCaption($this->Performance_Indicator_4_281129);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_4_281229);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329);
				$Doc->ExportCaption($this->Performance_Indicator_5_281429);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_5_281529);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629);
				$Doc->ExportCaption($this->Performance_Indicator_6_281729);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_6_281829);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929);
				$Doc->ExportCaption($this->Performance_Indicator_7_282029);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_7_282129);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229);
				$Doc->ExportCaption($this->Performance_Indicator_8_282329);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_8_282429);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529);
				$Doc->ExportCaption($this->Performance_Indicator_9_282629);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_9_282729);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829);
				$Doc->ExportCaption($this->Performance_Indicator_10_282929);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_10_283029);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129);
				$Doc->ExportCaption($this->Performance_Indicator_11_283229);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_11_283329);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429);
				$Doc->ExportCaption($this->Performance_Indicator_12_283529);
				$Doc->ExportCaption($this->FY_2015_TARGET_for_Performance_Indicator_12_283629);
				$Doc->ExportCaption($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729);
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
					$Doc->ExportField($this->Responsible_Bureaus_28129);
					$Doc->ExportField($this->MFOs);
					$Doc->ExportField($this->form_a_1_mfo);
					$Doc->ExportField($this->Performance_Indicator_1_28229);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_1_28329);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429);
					$Doc->ExportField($this->Performance_Indicator_2_28529);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_2_28629);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729);
					$Doc->ExportField($this->Performance_Indicator_3_28829);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_3_28929);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029);
					$Doc->ExportField($this->Performance_Indicator_4_281129);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_4_281229);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329);
					$Doc->ExportField($this->Performance_Indicator_5_281429);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_5_281529);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629);
					$Doc->ExportField($this->Performance_Indicator_6_281729);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_6_281829);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929);
					$Doc->ExportField($this->Performance_Indicator_7_282029);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_7_282129);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229);
					$Doc->ExportField($this->Performance_Indicator_8_282329);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_8_282429);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529);
					$Doc->ExportField($this->Performance_Indicator_9_282629);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_9_282729);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829);
					$Doc->ExportField($this->Performance_Indicator_10_282929);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_10_283029);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129);
					$Doc->ExportField($this->Performance_Indicator_11_283229);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_11_283329);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429);
					$Doc->ExportField($this->Performance_Indicator_12_283529);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_12_283629);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729);
				} else {
					$Doc->ExportField($this->Responsible_Bureaus_28129);
					$Doc->ExportField($this->MFOs);
					$Doc->ExportField($this->Performance_Indicator_1_28229);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_1_28329);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429);
					$Doc->ExportField($this->Performance_Indicator_2_28529);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_2_28629);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729);
					$Doc->ExportField($this->Performance_Indicator_3_28829);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_3_28929);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029);
					$Doc->ExportField($this->Performance_Indicator_4_281129);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_4_281229);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329);
					$Doc->ExportField($this->Performance_Indicator_5_281429);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_5_281529);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629);
					$Doc->ExportField($this->Performance_Indicator_6_281729);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_6_281829);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929);
					$Doc->ExportField($this->Performance_Indicator_7_282029);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_7_282129);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229);
					$Doc->ExportField($this->Performance_Indicator_8_282329);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_8_282429);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529);
					$Doc->ExportField($this->Performance_Indicator_9_282629);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_9_282729);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829);
					$Doc->ExportField($this->Performance_Indicator_10_282929);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_10_283029);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129);
					$Doc->ExportField($this->Performance_Indicator_11_283229);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_11_283329);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429);
					$Doc->ExportField($this->Performance_Indicator_12_283529);
					$Doc->ExportField($this->FY_2015_TARGET_for_Performance_Indicator_12_283629);
					$Doc->ExportField($this->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729);
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
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `frm_fp_rep_ta_form_a_1_iatf` WHERE " . $this->AddUserIDFilter("");

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
		if ($sCurrentMasterTable == "frm_fp_rep_ta_form_a_1_iatf_header") {
			$sFilterWrk = $GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->AddUserIDFilter($sFilterWrk);
		}
		return $sFilterWrk;
	}

	// Add detail User ID filter
	function AddDetailUserIDFilter($sFilter, $sCurrentMasterTable) {
		$sFilterWrk = $sFilter;
		if ($sCurrentMasterTable == "frm_fp_rep_ta_form_a_1_iatf_header") {
			$sSubqueryWrk = $GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->GetUserIDSubquery($this->units_id, $GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->units_id);
			if ($sSubqueryWrk <> "") {
				if ($sFilterWrk <> "") {
					$sFilterWrk = "($sFilterWrk) AND ($sSubqueryWrk)";
				} else {
					$sFilterWrk = $sSubqueryWrk;
				}
			}
			$sSubqueryWrk = $GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->GetUserIDSubquery($this->focal_person_id, $GLOBALS["frm_fp_rep_ta_form_a_1_iatf_header"]->focal_person_id);
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
