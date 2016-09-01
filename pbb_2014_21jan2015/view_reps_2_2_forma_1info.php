<?php

// Global variable for table object
$view_reps_2_2_forma_1 = NULL;

//
// Table class for view_reps_2_2_forma_1
//
class cview_reps_2_2_forma_1 {
	var $TableVar = 'view_reps_2_2_forma_1';
	var $TableName = 'view_reps_2_2_forma_1';
	var $TableType = 'VIEW';
	var $Constituent_University;
	var $Unit;
	var $MFO;
	var $PI_1;
	var $PI_Sub;
	var $Target_28129;
	var $Accomplishment_28129;
	var $z9025_and_Above_28129;
	var $Below_9025_28129;
	var $PI_2;
	var $Target_28229;
	var $Accomplishment_28229;
	var $z9025_and_Above_28229;
	var $Below_9025_28229;
	var $PI_3;
	var $Target_28329;
	var $Accomplishment_28329;
	var $z9025_and_Above_28329;
	var $Below_9025_28329;
	var $PI_4;
	var $Target_28429;
	var $Accomplishment_28429;
	var $z9025_and_Above_28429;
	var $Below_9025_28429;
	var $PI_5;
	var $Target_28529;
	var $Accomplishment_28529;
	var $z9025_and_Above_28529;
	var $Below_9025_28529;
	var $PI_6;
	var $Target_28629;
	var $Accomplishment_28629;
	var $z9025_and_Above_28629;
	var $Below_9025_28629;
	var $PI_7;
	var $Target_28729;
	var $Accomplishment_28729;
	var $z9025_and_Above_28729;
	var $Below_9025_28729;
	var $PI_8;
	var $Target_28829;
	var $Accomplishment_28829;
	var $z9025_and_Above_28829;
	var $Below_9025_28829;
	var $PI_9;
	var $Target_28929;
	var $Accomplishment_28929;
	var $z9025_and_Above_28929;
	var $Below_9025_28929;
	var $PI_10;
	var $Target_281029;
	var $Accomplishment_281029;
	var $z9025_and_Above_281029;
	var $Below_9025_281029;
	var $PI_11;
	var $Target_281129;
	var $Accomplishment_281129;
	var $z9025_and_Above_281129;
	var $Below_9025_281129;
	var $PI_12;
	var $Target_281229;
	var $Accomplishment_281229;
	var $z9025_and_Above_281229;
	var $Below_9025_281229;
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
	function cview_reps_2_2_forma_1() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// Constituent University
		$this->Constituent_University = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Constituent_University', 'Constituent University', '`Constituent University`', 200, -1, FALSE, '`Constituent University`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Constituent University'] =& $this->Constituent_University;

		// Unit
		$this->Unit = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Unit', 'Unit', '`Unit`', 200, -1, FALSE, '`Unit`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['Unit'] =& $this->Unit;

		// MFO
		$this->MFO = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_MFO', 'MFO', '`MFO`', 3, -1, FALSE, '`MFO`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->MFO->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['MFO'] =& $this->MFO;

		// PI 1
		$this->PI_1 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_1', 'PI 1', '`PI 1`', 20, -1, FALSE, '`PI 1`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_1->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI 1'] =& $this->PI_1;

		// PI Sub
		$this->PI_Sub = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_Sub', 'PI Sub', '`PI Sub`', 200, -1, FALSE, '`PI Sub`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['PI Sub'] =& $this->PI_Sub;

		// Target (1)
		$this->Target_28129 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Target_28129', 'Target (1)', '`Target (1)`', 5, -1, FALSE, '`Target (1)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (1)'] =& $this->Target_28129;

		// Accomplishment (1)
		$this->Accomplishment_28129 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Accomplishment_28129', 'Accomplishment (1)', '`Accomplishment (1)`', 5, -1, FALSE, '`Accomplishment (1)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_28129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment (1)'] =& $this->Accomplishment_28129;

		// 90% and Above (1)
		$this->z9025_and_Above_28129 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_z9025_and_Above_28129', '90% and Above (1)', '`90% and Above (1)`', 5, -1, FALSE, '`90% and Above (1)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z9025_and_Above_28129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['90% and Above (1)'] =& $this->z9025_and_Above_28129;

		// Below 90% (1)
		$this->Below_9025_28129 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Below_9025_28129', 'Below 90% (1)', '`Below 90% (1)`', 5, -1, FALSE, '`Below 90% (1)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_28129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% (1)'] =& $this->Below_9025_28129;

		// PI 2
		$this->PI_2 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_2', 'PI 2', '`PI 2`', 20, -1, FALSE, '`PI 2`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_2->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI 2'] =& $this->PI_2;

		// Target (2)
		$this->Target_28229 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Target_28229', 'Target (2)', '`Target (2)`', 5, -1, FALSE, '`Target (2)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (2)'] =& $this->Target_28229;

		// Accomplishment (2)
		$this->Accomplishment_28229 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Accomplishment_28229', 'Accomplishment (2)', '`Accomplishment (2)`', 5, -1, FALSE, '`Accomplishment (2)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_28229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment (2)'] =& $this->Accomplishment_28229;

		// 90% and Above (2)
		$this->z9025_and_Above_28229 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_z9025_and_Above_28229', '90% and Above (2)', '`90% and Above (2)`', 5, -1, FALSE, '`90% and Above (2)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z9025_and_Above_28229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['90% and Above (2)'] =& $this->z9025_and_Above_28229;

		// Below 90% (2)
		$this->Below_9025_28229 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Below_9025_28229', 'Below 90% (2)', '`Below 90% (2)`', 5, -1, FALSE, '`Below 90% (2)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_28229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% (2)'] =& $this->Below_9025_28229;

		// PI 3
		$this->PI_3 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_3', 'PI 3', '`PI 3`', 20, -1, FALSE, '`PI 3`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_3->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI 3'] =& $this->PI_3;

		// Target (3)
		$this->Target_28329 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Target_28329', 'Target (3)', '`Target (3)`', 5, -1, FALSE, '`Target (3)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28329->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (3)'] =& $this->Target_28329;

		// Accomplishment (3)
		$this->Accomplishment_28329 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Accomplishment_28329', 'Accomplishment (3)', '`Accomplishment (3)`', 5, -1, FALSE, '`Accomplishment (3)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_28329->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment (3)'] =& $this->Accomplishment_28329;

		// 90% and Above (3)
		$this->z9025_and_Above_28329 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_z9025_and_Above_28329', '90% and Above (3)', '`90% and Above (3)`', 5, -1, FALSE, '`90% and Above (3)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z9025_and_Above_28329->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['90% and Above (3)'] =& $this->z9025_and_Above_28329;

		// Below 90% (3)
		$this->Below_9025_28329 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Below_9025_28329', 'Below 90% (3)', '`Below 90% (3)`', 5, -1, FALSE, '`Below 90% (3)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_28329->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% (3)'] =& $this->Below_9025_28329;

		// PI 4
		$this->PI_4 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_4', 'PI 4', '`PI 4`', 20, -1, FALSE, '`PI 4`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_4->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI 4'] =& $this->PI_4;

		// Target (4)
		$this->Target_28429 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Target_28429', 'Target (4)', '`Target (4)`', 5, -1, FALSE, '`Target (4)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28429->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (4)'] =& $this->Target_28429;

		// Accomplishment (4)
		$this->Accomplishment_28429 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Accomplishment_28429', 'Accomplishment (4)', '`Accomplishment (4)`', 5, -1, FALSE, '`Accomplishment (4)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_28429->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment (4)'] =& $this->Accomplishment_28429;

		// 90% and Above (4)
		$this->z9025_and_Above_28429 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_z9025_and_Above_28429', '90% and Above (4)', '`90% and Above (4)`', 5, -1, FALSE, '`90% and Above (4)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z9025_and_Above_28429->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['90% and Above (4)'] =& $this->z9025_and_Above_28429;

		// Below 90% (4)
		$this->Below_9025_28429 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Below_9025_28429', 'Below 90% (4)', '`Below 90% (4)`', 5, -1, FALSE, '`Below 90% (4)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_28429->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% (4)'] =& $this->Below_9025_28429;

		// PI 5
		$this->PI_5 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_5', 'PI 5', '`PI 5`', 20, -1, FALSE, '`PI 5`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_5->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI 5'] =& $this->PI_5;

		// Target (5)
		$this->Target_28529 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Target_28529', 'Target (5)', '`Target (5)`', 5, -1, FALSE, '`Target (5)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28529->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (5)'] =& $this->Target_28529;

		// Accomplishment (5)
		$this->Accomplishment_28529 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Accomplishment_28529', 'Accomplishment (5)', '`Accomplishment (5)`', 5, -1, FALSE, '`Accomplishment (5)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_28529->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment (5)'] =& $this->Accomplishment_28529;

		// 90% and Above (5)
		$this->z9025_and_Above_28529 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_z9025_and_Above_28529', '90% and Above (5)', '`90% and Above (5)`', 5, -1, FALSE, '`90% and Above (5)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z9025_and_Above_28529->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['90% and Above (5)'] =& $this->z9025_and_Above_28529;

		// Below 90% (5)
		$this->Below_9025_28529 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Below_9025_28529', 'Below 90% (5)', '`Below 90% (5)`', 5, -1, FALSE, '`Below 90% (5)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_28529->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% (5)'] =& $this->Below_9025_28529;

		// PI 6
		$this->PI_6 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_6', 'PI 6', '`PI 6`', 20, -1, FALSE, '`PI 6`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_6->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI 6'] =& $this->PI_6;

		// Target (6)
		$this->Target_28629 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Target_28629', 'Target (6)', '`Target (6)`', 5, -1, FALSE, '`Target (6)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28629->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (6)'] =& $this->Target_28629;

		// Accomplishment (6)
		$this->Accomplishment_28629 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Accomplishment_28629', 'Accomplishment (6)', '`Accomplishment (6)`', 5, -1, FALSE, '`Accomplishment (6)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_28629->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment (6)'] =& $this->Accomplishment_28629;

		// 90% and Above (6)
		$this->z9025_and_Above_28629 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_z9025_and_Above_28629', '90% and Above (6)', '`90% and Above (6)`', 5, -1, FALSE, '`90% and Above (6)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z9025_and_Above_28629->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['90% and Above (6)'] =& $this->z9025_and_Above_28629;

		// Below 90% (6)
		$this->Below_9025_28629 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Below_9025_28629', 'Below 90% (6)', '`Below 90% (6)`', 5, -1, FALSE, '`Below 90% (6)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_28629->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% (6)'] =& $this->Below_9025_28629;

		// PI 7
		$this->PI_7 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_7', 'PI 7', '`PI 7`', 20, -1, FALSE, '`PI 7`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_7->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI 7'] =& $this->PI_7;

		// Target (7)
		$this->Target_28729 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Target_28729', 'Target (7)', '`Target (7)`', 5, -1, FALSE, '`Target (7)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28729->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (7)'] =& $this->Target_28729;

		// Accomplishment (7)
		$this->Accomplishment_28729 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Accomplishment_28729', 'Accomplishment (7)', '`Accomplishment (7)`', 5, -1, FALSE, '`Accomplishment (7)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_28729->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment (7)'] =& $this->Accomplishment_28729;

		// 90% and Above (7)
		$this->z9025_and_Above_28729 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_z9025_and_Above_28729', '90% and Above (7)', '`90% and Above (7)`', 5, -1, FALSE, '`90% and Above (7)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z9025_and_Above_28729->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['90% and Above (7)'] =& $this->z9025_and_Above_28729;

		// Below 90% (7)
		$this->Below_9025_28729 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Below_9025_28729', 'Below 90% (7)', '`Below 90% (7)`', 5, -1, FALSE, '`Below 90% (7)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_28729->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% (7)'] =& $this->Below_9025_28729;

		// PI 8
		$this->PI_8 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_8', 'PI 8', '`PI 8`', 20, -1, FALSE, '`PI 8`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_8->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI 8'] =& $this->PI_8;

		// Target (8)
		$this->Target_28829 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Target_28829', 'Target (8)', '`Target (8)`', 5, -1, FALSE, '`Target (8)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28829->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (8)'] =& $this->Target_28829;

		// Accomplishment (8)
		$this->Accomplishment_28829 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Accomplishment_28829', 'Accomplishment (8)', '`Accomplishment (8)`', 5, -1, FALSE, '`Accomplishment (8)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_28829->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment (8)'] =& $this->Accomplishment_28829;

		// 90% and Above (8)
		$this->z9025_and_Above_28829 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_z9025_and_Above_28829', '90% and Above (8)', '`90% and Above (8)`', 5, -1, FALSE, '`90% and Above (8)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z9025_and_Above_28829->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['90% and Above (8)'] =& $this->z9025_and_Above_28829;

		// Below 90% (8)
		$this->Below_9025_28829 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Below_9025_28829', 'Below 90% (8)', '`Below 90% (8)`', 5, -1, FALSE, '`Below 90% (8)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_28829->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% (8)'] =& $this->Below_9025_28829;

		// PI 9
		$this->PI_9 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_9', 'PI 9', '`PI 9`', 20, -1, FALSE, '`PI 9`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_9->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI 9'] =& $this->PI_9;

		// Target (9)
		$this->Target_28929 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Target_28929', 'Target (9)', '`Target (9)`', 5, -1, FALSE, '`Target (9)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_28929->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (9)'] =& $this->Target_28929;

		// Accomplishment (9)
		$this->Accomplishment_28929 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Accomplishment_28929', 'Accomplishment (9)', '`Accomplishment (9)`', 5, -1, FALSE, '`Accomplishment (9)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_28929->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment (9)'] =& $this->Accomplishment_28929;

		// 90% and Above (9)
		$this->z9025_and_Above_28929 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_z9025_and_Above_28929', '90% and Above (9)', '`90% and Above (9)`', 5, -1, FALSE, '`90% and Above (9)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z9025_and_Above_28929->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['90% and Above (9)'] =& $this->z9025_and_Above_28929;

		// Below 90% (9)
		$this->Below_9025_28929 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Below_9025_28929', 'Below 90% (9)', '`Below 90% (9)`', 5, -1, FALSE, '`Below 90% (9)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_28929->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% (9)'] =& $this->Below_9025_28929;

		// PI 10
		$this->PI_10 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_10', 'PI 10', '`PI 10`', 20, -1, FALSE, '`PI 10`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_10->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI 10'] =& $this->PI_10;

		// Target (10)
		$this->Target_281029 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Target_281029', 'Target (10)', '`Target (10)`', 5, -1, FALSE, '`Target (10)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_281029->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (10)'] =& $this->Target_281029;

		// Accomplishment (10)
		$this->Accomplishment_281029 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Accomplishment_281029', 'Accomplishment (10)', '`Accomplishment (10)`', 5, -1, FALSE, '`Accomplishment (10)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_281029->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment (10)'] =& $this->Accomplishment_281029;

		// 90% and Above (10)
		$this->z9025_and_Above_281029 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_z9025_and_Above_281029', '90% and Above (10)', '`90% and Above (10)`', 5, -1, FALSE, '`90% and Above (10)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z9025_and_Above_281029->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['90% and Above (10)'] =& $this->z9025_and_Above_281029;

		// Below 90% (10)
		$this->Below_9025_281029 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Below_9025_281029', 'Below 90% (10)', '`Below 90% (10)`', 5, -1, FALSE, '`Below 90% (10)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_281029->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% (10)'] =& $this->Below_9025_281029;

		// PI 11
		$this->PI_11 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_11', 'PI 11', '`PI 11`', 20, -1, FALSE, '`PI 11`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_11->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI 11'] =& $this->PI_11;

		// Target (11)
		$this->Target_281129 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Target_281129', 'Target (11)', '`Target (11)`', 5, -1, FALSE, '`Target (11)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_281129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (11)'] =& $this->Target_281129;

		// Accomplishment (11)
		$this->Accomplishment_281129 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Accomplishment_281129', 'Accomplishment (11)', '`Accomplishment (11)`', 5, -1, FALSE, '`Accomplishment (11)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_281129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment (11)'] =& $this->Accomplishment_281129;

		// 90% and Above (11)
		$this->z9025_and_Above_281129 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_z9025_and_Above_281129', '90% and Above (11)', '`90% and Above (11)`', 5, -1, FALSE, '`90% and Above (11)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z9025_and_Above_281129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['90% and Above (11)'] =& $this->z9025_and_Above_281129;

		// Below 90% (11)
		$this->Below_9025_281129 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Below_9025_281129', 'Below 90% (11)', '`Below 90% (11)`', 5, -1, FALSE, '`Below 90% (11)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_281129->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% (11)'] =& $this->Below_9025_281129;

		// PI 12
		$this->PI_12 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_PI_12', 'PI 12', '`PI 12`', 20, -1, FALSE, '`PI 12`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->PI_12->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PI 12'] =& $this->PI_12;

		// Target (12)
		$this->Target_281229 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Target_281229', 'Target (12)', '`Target (12)`', 5, -1, FALSE, '`Target (12)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Target_281229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Target (12)'] =& $this->Target_281229;

		// Accomplishment (12)
		$this->Accomplishment_281229 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Accomplishment_281229', 'Accomplishment (12)', '`Accomplishment (12)`', 5, -1, FALSE, '`Accomplishment (12)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Accomplishment_281229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Accomplishment (12)'] =& $this->Accomplishment_281229;

		// 90% and Above (12)
		$this->z9025_and_Above_281229 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_z9025_and_Above_281229', '90% and Above (12)', '`90% and Above (12)`', 5, -1, FALSE, '`90% and Above (12)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->z9025_and_Above_281229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['90% and Above (12)'] =& $this->z9025_and_Above_281229;

		// Below 90% (12)
		$this->Below_9025_281229 = new cField('view_reps_2_2_forma_1', 'view_reps_2_2_forma_1', 'x_Below_9025_281229', 'Below 90% (12)', '`Below 90% (12)`', 5, -1, FALSE, '`Below 90% (12)`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->Below_9025_281229->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Below 90% (12)'] =& $this->Below_9025_281229;
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
		return "view_reps_2_2_forma_1_Highlight";
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
		return "`view_reps_2_2_forma_1`";
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
		return "INSERT INTO `view_reps_2_2_forma_1` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `view_reps_2_2_forma_1` SET ";
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
		$SQL = "DELETE FROM `view_reps_2_2_forma_1` WHERE ";
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
			return "view_reps_2_2_forma_1list.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "view_reps_2_2_forma_1list.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("view_reps_2_2_forma_1view.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "view_reps_2_2_forma_1add.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("view_reps_2_2_forma_1edit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("view_reps_2_2_forma_1add.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("view_reps_2_2_forma_1delete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=view_reps_2_2_forma_1" : "";
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
		$this->Constituent_University->setDbValue($rs->fields('Constituent University'));
		$this->Unit->setDbValue($rs->fields('Unit'));
		$this->MFO->setDbValue($rs->fields('MFO'));
		$this->PI_1->setDbValue($rs->fields('PI 1'));
		$this->PI_Sub->setDbValue($rs->fields('PI Sub'));
		$this->Target_28129->setDbValue($rs->fields('Target (1)'));
		$this->Accomplishment_28129->setDbValue($rs->fields('Accomplishment (1)'));
		$this->z9025_and_Above_28129->setDbValue($rs->fields('90% and Above (1)'));
		$this->Below_9025_28129->setDbValue($rs->fields('Below 90% (1)'));
		$this->PI_2->setDbValue($rs->fields('PI 2'));
		$this->Target_28229->setDbValue($rs->fields('Target (2)'));
		$this->Accomplishment_28229->setDbValue($rs->fields('Accomplishment (2)'));
		$this->z9025_and_Above_28229->setDbValue($rs->fields('90% and Above (2)'));
		$this->Below_9025_28229->setDbValue($rs->fields('Below 90% (2)'));
		$this->PI_3->setDbValue($rs->fields('PI 3'));
		$this->Target_28329->setDbValue($rs->fields('Target (3)'));
		$this->Accomplishment_28329->setDbValue($rs->fields('Accomplishment (3)'));
		$this->z9025_and_Above_28329->setDbValue($rs->fields('90% and Above (3)'));
		$this->Below_9025_28329->setDbValue($rs->fields('Below 90% (3)'));
		$this->PI_4->setDbValue($rs->fields('PI 4'));
		$this->Target_28429->setDbValue($rs->fields('Target (4)'));
		$this->Accomplishment_28429->setDbValue($rs->fields('Accomplishment (4)'));
		$this->z9025_and_Above_28429->setDbValue($rs->fields('90% and Above (4)'));
		$this->Below_9025_28429->setDbValue($rs->fields('Below 90% (4)'));
		$this->PI_5->setDbValue($rs->fields('PI 5'));
		$this->Target_28529->setDbValue($rs->fields('Target (5)'));
		$this->Accomplishment_28529->setDbValue($rs->fields('Accomplishment (5)'));
		$this->z9025_and_Above_28529->setDbValue($rs->fields('90% and Above (5)'));
		$this->Below_9025_28529->setDbValue($rs->fields('Below 90% (5)'));
		$this->PI_6->setDbValue($rs->fields('PI 6'));
		$this->Target_28629->setDbValue($rs->fields('Target (6)'));
		$this->Accomplishment_28629->setDbValue($rs->fields('Accomplishment (6)'));
		$this->z9025_and_Above_28629->setDbValue($rs->fields('90% and Above (6)'));
		$this->Below_9025_28629->setDbValue($rs->fields('Below 90% (6)'));
		$this->PI_7->setDbValue($rs->fields('PI 7'));
		$this->Target_28729->setDbValue($rs->fields('Target (7)'));
		$this->Accomplishment_28729->setDbValue($rs->fields('Accomplishment (7)'));
		$this->z9025_and_Above_28729->setDbValue($rs->fields('90% and Above (7)'));
		$this->Below_9025_28729->setDbValue($rs->fields('Below 90% (7)'));
		$this->PI_8->setDbValue($rs->fields('PI 8'));
		$this->Target_28829->setDbValue($rs->fields('Target (8)'));
		$this->Accomplishment_28829->setDbValue($rs->fields('Accomplishment (8)'));
		$this->z9025_and_Above_28829->setDbValue($rs->fields('90% and Above (8)'));
		$this->Below_9025_28829->setDbValue($rs->fields('Below 90% (8)'));
		$this->PI_9->setDbValue($rs->fields('PI 9'));
		$this->Target_28929->setDbValue($rs->fields('Target (9)'));
		$this->Accomplishment_28929->setDbValue($rs->fields('Accomplishment (9)'));
		$this->z9025_and_Above_28929->setDbValue($rs->fields('90% and Above (9)'));
		$this->Below_9025_28929->setDbValue($rs->fields('Below 90% (9)'));
		$this->PI_10->setDbValue($rs->fields('PI 10'));
		$this->Target_281029->setDbValue($rs->fields('Target (10)'));
		$this->Accomplishment_281029->setDbValue($rs->fields('Accomplishment (10)'));
		$this->z9025_and_Above_281029->setDbValue($rs->fields('90% and Above (10)'));
		$this->Below_9025_281029->setDbValue($rs->fields('Below 90% (10)'));
		$this->PI_11->setDbValue($rs->fields('PI 11'));
		$this->Target_281129->setDbValue($rs->fields('Target (11)'));
		$this->Accomplishment_281129->setDbValue($rs->fields('Accomplishment (11)'));
		$this->z9025_and_Above_281129->setDbValue($rs->fields('90% and Above (11)'));
		$this->Below_9025_281129->setDbValue($rs->fields('Below 90% (11)'));
		$this->PI_12->setDbValue($rs->fields('PI 12'));
		$this->Target_281229->setDbValue($rs->fields('Target (12)'));
		$this->Accomplishment_281229->setDbValue($rs->fields('Accomplishment (12)'));
		$this->z9025_and_Above_281229->setDbValue($rs->fields('90% and Above (12)'));
		$this->Below_9025_281229->setDbValue($rs->fields('Below 90% (12)'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// Constituent University

		$this->Constituent_University->CellCssStyle = "white-space: nowrap;";

		// Unit
		$this->Unit->CellCssStyle = "white-space: nowrap;";

		// MFO
		$this->MFO->CellCssStyle = "white-space: nowrap;";

		// PI 1
		$this->PI_1->CellCssStyle = "white-space: nowrap;";

		// PI Sub
		// Target (1)

		$this->Target_28129->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (1)
		$this->Accomplishment_28129->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (1)
		$this->z9025_and_Above_28129->CellCssStyle = "white-space: nowrap;";

		// Below 90% (1)
		$this->Below_9025_28129->CellCssStyle = "white-space: nowrap;";

		// PI 2
		$this->PI_2->CellCssStyle = "white-space: nowrap;";

		// Target (2)
		$this->Target_28229->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (2)
		$this->Accomplishment_28229->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (2)
		$this->z9025_and_Above_28229->CellCssStyle = "white-space: nowrap;";

		// Below 90% (2)
		$this->Below_9025_28229->CellCssStyle = "white-space: nowrap;";

		// PI 3
		$this->PI_3->CellCssStyle = "white-space: nowrap;";

		// Target (3)
		$this->Target_28329->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (3)
		$this->Accomplishment_28329->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (3)
		$this->z9025_and_Above_28329->CellCssStyle = "white-space: nowrap;";

		// Below 90% (3)
		$this->Below_9025_28329->CellCssStyle = "white-space: nowrap;";

		// PI 4
		$this->PI_4->CellCssStyle = "white-space: nowrap;";

		// Target (4)
		$this->Target_28429->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (4)
		$this->Accomplishment_28429->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (4)
		$this->z9025_and_Above_28429->CellCssStyle = "white-space: nowrap;";

		// Below 90% (4)
		$this->Below_9025_28429->CellCssStyle = "white-space: nowrap;";

		// PI 5
		$this->PI_5->CellCssStyle = "white-space: nowrap;";

		// Target (5)
		$this->Target_28529->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (5)
		$this->Accomplishment_28529->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (5)
		$this->z9025_and_Above_28529->CellCssStyle = "white-space: nowrap;";

		// Below 90% (5)
		$this->Below_9025_28529->CellCssStyle = "white-space: nowrap;";

		// PI 6
		$this->PI_6->CellCssStyle = "white-space: nowrap;";

		// Target (6)
		$this->Target_28629->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (6)
		$this->Accomplishment_28629->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (6)
		$this->z9025_and_Above_28629->CellCssStyle = "white-space: nowrap;";

		// Below 90% (6)
		$this->Below_9025_28629->CellCssStyle = "white-space: nowrap;";

		// PI 7
		$this->PI_7->CellCssStyle = "white-space: nowrap;";

		// Target (7)
		$this->Target_28729->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (7)
		$this->Accomplishment_28729->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (7)
		$this->z9025_and_Above_28729->CellCssStyle = "white-space: nowrap;";

		// Below 90% (7)
		$this->Below_9025_28729->CellCssStyle = "white-space: nowrap;";

		// PI 8
		$this->PI_8->CellCssStyle = "white-space: nowrap;";

		// Target (8)
		$this->Target_28829->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (8)
		$this->Accomplishment_28829->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (8)
		$this->z9025_and_Above_28829->CellCssStyle = "white-space: nowrap;";

		// Below 90% (8)
		$this->Below_9025_28829->CellCssStyle = "white-space: nowrap;";

		// PI 9
		$this->PI_9->CellCssStyle = "white-space: nowrap;";

		// Target (9)
		$this->Target_28929->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (9)
		$this->Accomplishment_28929->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (9)
		$this->z9025_and_Above_28929->CellCssStyle = "white-space: nowrap;";

		// Below 90% (9)
		$this->Below_9025_28929->CellCssStyle = "white-space: nowrap;";

		// PI 10
		$this->PI_10->CellCssStyle = "white-space: nowrap;";

		// Target (10)
		$this->Target_281029->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (10)
		$this->Accomplishment_281029->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (10)
		$this->z9025_and_Above_281029->CellCssStyle = "white-space: nowrap;";

		// Below 90% (10)
		$this->Below_9025_281029->CellCssStyle = "white-space: nowrap;";

		// PI 11
		$this->PI_11->CellCssStyle = "white-space: nowrap;";

		// Target (11)
		$this->Target_281129->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (11)
		$this->Accomplishment_281129->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (11)
		$this->z9025_and_Above_281129->CellCssStyle = "white-space: nowrap;";

		// Below 90% (11)
		$this->Below_9025_281129->CellCssStyle = "white-space: nowrap;";

		// PI 12
		$this->PI_12->CellCssStyle = "white-space: nowrap;";

		// Target (12)
		$this->Target_281229->CellCssStyle = "white-space: nowrap;";

		// Accomplishment (12)
		$this->Accomplishment_281229->CellCssStyle = "white-space: nowrap;";

		// 90% and Above (12)
		$this->z9025_and_Above_281229->CellCssStyle = "white-space: nowrap;";

		// Below 90% (12)
		$this->Below_9025_281229->CellCssStyle = "white-space: nowrap;";

		// Constituent University
		$this->Constituent_University->ViewValue = $this->Constituent_University->CurrentValue;
		$this->Constituent_University->ViewCustomAttributes = "";

		// Unit
		$this->Unit->ViewValue = $this->Unit->CurrentValue;
		$this->Unit->ViewCustomAttributes = "";

		// MFO
		$this->MFO->ViewValue = $this->MFO->CurrentValue;
		$this->MFO->ViewCustomAttributes = "";

		// PI 1
		$this->PI_1->ViewValue = $this->PI_1->CurrentValue;
		$this->PI_1->ViewCustomAttributes = "";

		// PI Sub
		$this->PI_Sub->ViewValue = $this->PI_Sub->CurrentValue;
		$this->PI_Sub->ViewCustomAttributes = "";

		// Target (1)
		$this->Target_28129->ViewValue = $this->Target_28129->CurrentValue;
		$this->Target_28129->ViewCustomAttributes = "";

		// Accomplishment (1)
		$this->Accomplishment_28129->ViewValue = $this->Accomplishment_28129->CurrentValue;
		$this->Accomplishment_28129->ViewCustomAttributes = "";

		// 90% and Above (1)
		$this->z9025_and_Above_28129->ViewValue = $this->z9025_and_Above_28129->CurrentValue;
		$this->z9025_and_Above_28129->ViewCustomAttributes = "";

		// Below 90% (1)
		$this->Below_9025_28129->ViewValue = $this->Below_9025_28129->CurrentValue;
		$this->Below_9025_28129->ViewCustomAttributes = "";

		// PI 2
		$this->PI_2->ViewValue = $this->PI_2->CurrentValue;
		$this->PI_2->ViewCustomAttributes = "";

		// Target (2)
		$this->Target_28229->ViewValue = $this->Target_28229->CurrentValue;
		$this->Target_28229->ViewCustomAttributes = "";

		// Accomplishment (2)
		$this->Accomplishment_28229->ViewValue = $this->Accomplishment_28229->CurrentValue;
		$this->Accomplishment_28229->ViewCustomAttributes = "";

		// 90% and Above (2)
		$this->z9025_and_Above_28229->ViewValue = $this->z9025_and_Above_28229->CurrentValue;
		$this->z9025_and_Above_28229->ViewCustomAttributes = "";

		// Below 90% (2)
		$this->Below_9025_28229->ViewValue = $this->Below_9025_28229->CurrentValue;
		$this->Below_9025_28229->ViewCustomAttributes = "";

		// PI 3
		$this->PI_3->ViewValue = $this->PI_3->CurrentValue;
		$this->PI_3->ViewCustomAttributes = "";

		// Target (3)
		$this->Target_28329->ViewValue = $this->Target_28329->CurrentValue;
		$this->Target_28329->ViewCustomAttributes = "";

		// Accomplishment (3)
		$this->Accomplishment_28329->ViewValue = $this->Accomplishment_28329->CurrentValue;
		$this->Accomplishment_28329->ViewCustomAttributes = "";

		// 90% and Above (3)
		$this->z9025_and_Above_28329->ViewValue = $this->z9025_and_Above_28329->CurrentValue;
		$this->z9025_and_Above_28329->ViewCustomAttributes = "";

		// Below 90% (3)
		$this->Below_9025_28329->ViewValue = $this->Below_9025_28329->CurrentValue;
		$this->Below_9025_28329->ViewCustomAttributes = "";

		// PI 4
		$this->PI_4->ViewValue = $this->PI_4->CurrentValue;
		$this->PI_4->ViewCustomAttributes = "";

		// Target (4)
		$this->Target_28429->ViewValue = $this->Target_28429->CurrentValue;
		$this->Target_28429->ViewCustomAttributes = "";

		// Accomplishment (4)
		$this->Accomplishment_28429->ViewValue = $this->Accomplishment_28429->CurrentValue;
		$this->Accomplishment_28429->ViewCustomAttributes = "";

		// 90% and Above (4)
		$this->z9025_and_Above_28429->ViewValue = $this->z9025_and_Above_28429->CurrentValue;
		$this->z9025_and_Above_28429->ViewCustomAttributes = "";

		// Below 90% (4)
		$this->Below_9025_28429->ViewValue = $this->Below_9025_28429->CurrentValue;
		$this->Below_9025_28429->ViewCustomAttributes = "";

		// PI 5
		$this->PI_5->ViewValue = $this->PI_5->CurrentValue;
		$this->PI_5->ViewCustomAttributes = "";

		// Target (5)
		$this->Target_28529->ViewValue = $this->Target_28529->CurrentValue;
		$this->Target_28529->ViewCustomAttributes = "";

		// Accomplishment (5)
		$this->Accomplishment_28529->ViewValue = $this->Accomplishment_28529->CurrentValue;
		$this->Accomplishment_28529->ViewCustomAttributes = "";

		// 90% and Above (5)
		$this->z9025_and_Above_28529->ViewValue = $this->z9025_and_Above_28529->CurrentValue;
		$this->z9025_and_Above_28529->ViewCustomAttributes = "";

		// Below 90% (5)
		$this->Below_9025_28529->ViewValue = $this->Below_9025_28529->CurrentValue;
		$this->Below_9025_28529->ViewCustomAttributes = "";

		// PI 6
		$this->PI_6->ViewValue = $this->PI_6->CurrentValue;
		$this->PI_6->ViewCustomAttributes = "";

		// Target (6)
		$this->Target_28629->ViewValue = $this->Target_28629->CurrentValue;
		$this->Target_28629->ViewCustomAttributes = "";

		// Accomplishment (6)
		$this->Accomplishment_28629->ViewValue = $this->Accomplishment_28629->CurrentValue;
		$this->Accomplishment_28629->ViewCustomAttributes = "";

		// 90% and Above (6)
		$this->z9025_and_Above_28629->ViewValue = $this->z9025_and_Above_28629->CurrentValue;
		$this->z9025_and_Above_28629->ViewCustomAttributes = "";

		// Below 90% (6)
		$this->Below_9025_28629->ViewValue = $this->Below_9025_28629->CurrentValue;
		$this->Below_9025_28629->ViewCustomAttributes = "";

		// PI 7
		$this->PI_7->ViewValue = $this->PI_7->CurrentValue;
		$this->PI_7->ViewCustomAttributes = "";

		// Target (7)
		$this->Target_28729->ViewValue = $this->Target_28729->CurrentValue;
		$this->Target_28729->ViewCustomAttributes = "";

		// Accomplishment (7)
		$this->Accomplishment_28729->ViewValue = $this->Accomplishment_28729->CurrentValue;
		$this->Accomplishment_28729->ViewCustomAttributes = "";

		// 90% and Above (7)
		$this->z9025_and_Above_28729->ViewValue = $this->z9025_and_Above_28729->CurrentValue;
		$this->z9025_and_Above_28729->ViewCustomAttributes = "";

		// Below 90% (7)
		$this->Below_9025_28729->ViewValue = $this->Below_9025_28729->CurrentValue;
		$this->Below_9025_28729->ViewCustomAttributes = "";

		// PI 8
		$this->PI_8->ViewValue = $this->PI_8->CurrentValue;
		$this->PI_8->ViewCustomAttributes = "";

		// Target (8)
		$this->Target_28829->ViewValue = $this->Target_28829->CurrentValue;
		$this->Target_28829->ViewCustomAttributes = "";

		// Accomplishment (8)
		$this->Accomplishment_28829->ViewValue = $this->Accomplishment_28829->CurrentValue;
		$this->Accomplishment_28829->ViewCustomAttributes = "";

		// 90% and Above (8)
		$this->z9025_and_Above_28829->ViewValue = $this->z9025_and_Above_28829->CurrentValue;
		$this->z9025_and_Above_28829->ViewCustomAttributes = "";

		// Below 90% (8)
		$this->Below_9025_28829->ViewValue = $this->Below_9025_28829->CurrentValue;
		$this->Below_9025_28829->ViewCustomAttributes = "";

		// PI 9
		$this->PI_9->ViewValue = $this->PI_9->CurrentValue;
		$this->PI_9->ViewCustomAttributes = "";

		// Target (9)
		$this->Target_28929->ViewValue = $this->Target_28929->CurrentValue;
		$this->Target_28929->ViewCustomAttributes = "";

		// Accomplishment (9)
		$this->Accomplishment_28929->ViewValue = $this->Accomplishment_28929->CurrentValue;
		$this->Accomplishment_28929->ViewCustomAttributes = "";

		// 90% and Above (9)
		$this->z9025_and_Above_28929->ViewValue = $this->z9025_and_Above_28929->CurrentValue;
		$this->z9025_and_Above_28929->ViewCustomAttributes = "";

		// Below 90% (9)
		$this->Below_9025_28929->ViewValue = $this->Below_9025_28929->CurrentValue;
		$this->Below_9025_28929->ViewCustomAttributes = "";

		// PI 10
		$this->PI_10->ViewValue = $this->PI_10->CurrentValue;
		$this->PI_10->ViewCustomAttributes = "";

		// Target (10)
		$this->Target_281029->ViewValue = $this->Target_281029->CurrentValue;
		$this->Target_281029->ViewCustomAttributes = "";

		// Accomplishment (10)
		$this->Accomplishment_281029->ViewValue = $this->Accomplishment_281029->CurrentValue;
		$this->Accomplishment_281029->ViewCustomAttributes = "";

		// 90% and Above (10)
		$this->z9025_and_Above_281029->ViewValue = $this->z9025_and_Above_281029->CurrentValue;
		$this->z9025_and_Above_281029->ViewCustomAttributes = "";

		// Below 90% (10)
		$this->Below_9025_281029->ViewValue = $this->Below_9025_281029->CurrentValue;
		$this->Below_9025_281029->ViewCustomAttributes = "";

		// PI 11
		$this->PI_11->ViewValue = $this->PI_11->CurrentValue;
		$this->PI_11->ViewCustomAttributes = "";

		// Target (11)
		$this->Target_281129->ViewValue = $this->Target_281129->CurrentValue;
		$this->Target_281129->ViewCustomAttributes = "";

		// Accomplishment (11)
		$this->Accomplishment_281129->ViewValue = $this->Accomplishment_281129->CurrentValue;
		$this->Accomplishment_281129->ViewCustomAttributes = "";

		// 90% and Above (11)
		$this->z9025_and_Above_281129->ViewValue = $this->z9025_and_Above_281129->CurrentValue;
		$this->z9025_and_Above_281129->ViewCustomAttributes = "";

		// Below 90% (11)
		$this->Below_9025_281129->ViewValue = $this->Below_9025_281129->CurrentValue;
		$this->Below_9025_281129->ViewCustomAttributes = "";

		// PI 12
		$this->PI_12->ViewValue = $this->PI_12->CurrentValue;
		$this->PI_12->ViewCustomAttributes = "";

		// Target (12)
		$this->Target_281229->ViewValue = $this->Target_281229->CurrentValue;
		$this->Target_281229->ViewCustomAttributes = "";

		// Accomplishment (12)
		$this->Accomplishment_281229->ViewValue = $this->Accomplishment_281229->CurrentValue;
		$this->Accomplishment_281229->ViewCustomAttributes = "";

		// 90% and Above (12)
		$this->z9025_and_Above_281229->ViewValue = $this->z9025_and_Above_281229->CurrentValue;
		$this->z9025_and_Above_281229->ViewCustomAttributes = "";

		// Below 90% (12)
		$this->Below_9025_281229->ViewValue = $this->Below_9025_281229->CurrentValue;
		$this->Below_9025_281229->ViewCustomAttributes = "";

		// Constituent University
		$this->Constituent_University->LinkCustomAttributes = "";
		$this->Constituent_University->HrefValue = "";
		$this->Constituent_University->TooltipValue = "";

		// Unit
		$this->Unit->LinkCustomAttributes = "";
		$this->Unit->HrefValue = "";
		$this->Unit->TooltipValue = "";

		// MFO
		$this->MFO->LinkCustomAttributes = "";
		$this->MFO->HrefValue = "";
		$this->MFO->TooltipValue = "";

		// PI 1
		$this->PI_1->LinkCustomAttributes = "";
		$this->PI_1->HrefValue = "";
		$this->PI_1->TooltipValue = "";

		// PI Sub
		$this->PI_Sub->LinkCustomAttributes = "";
		$this->PI_Sub->HrefValue = "";
		$this->PI_Sub->TooltipValue = "";

		// Target (1)
		$this->Target_28129->LinkCustomAttributes = "";
		$this->Target_28129->HrefValue = "";
		$this->Target_28129->TooltipValue = "";

		// Accomplishment (1)
		$this->Accomplishment_28129->LinkCustomAttributes = "";
		$this->Accomplishment_28129->HrefValue = "";
		$this->Accomplishment_28129->TooltipValue = "";

		// 90% and Above (1)
		$this->z9025_and_Above_28129->LinkCustomAttributes = "";
		$this->z9025_and_Above_28129->HrefValue = "";
		$this->z9025_and_Above_28129->TooltipValue = "";

		// Below 90% (1)
		$this->Below_9025_28129->LinkCustomAttributes = "";
		$this->Below_9025_28129->HrefValue = "";
		$this->Below_9025_28129->TooltipValue = "";

		// PI 2
		$this->PI_2->LinkCustomAttributes = "";
		$this->PI_2->HrefValue = "";
		$this->PI_2->TooltipValue = "";

		// Target (2)
		$this->Target_28229->LinkCustomAttributes = "";
		$this->Target_28229->HrefValue = "";
		$this->Target_28229->TooltipValue = "";

		// Accomplishment (2)
		$this->Accomplishment_28229->LinkCustomAttributes = "";
		$this->Accomplishment_28229->HrefValue = "";
		$this->Accomplishment_28229->TooltipValue = "";

		// 90% and Above (2)
		$this->z9025_and_Above_28229->LinkCustomAttributes = "";
		$this->z9025_and_Above_28229->HrefValue = "";
		$this->z9025_and_Above_28229->TooltipValue = "";

		// Below 90% (2)
		$this->Below_9025_28229->LinkCustomAttributes = "";
		$this->Below_9025_28229->HrefValue = "";
		$this->Below_9025_28229->TooltipValue = "";

		// PI 3
		$this->PI_3->LinkCustomAttributes = "";
		$this->PI_3->HrefValue = "";
		$this->PI_3->TooltipValue = "";

		// Target (3)
		$this->Target_28329->LinkCustomAttributes = "";
		$this->Target_28329->HrefValue = "";
		$this->Target_28329->TooltipValue = "";

		// Accomplishment (3)
		$this->Accomplishment_28329->LinkCustomAttributes = "";
		$this->Accomplishment_28329->HrefValue = "";
		$this->Accomplishment_28329->TooltipValue = "";

		// 90% and Above (3)
		$this->z9025_and_Above_28329->LinkCustomAttributes = "";
		$this->z9025_and_Above_28329->HrefValue = "";
		$this->z9025_and_Above_28329->TooltipValue = "";

		// Below 90% (3)
		$this->Below_9025_28329->LinkCustomAttributes = "";
		$this->Below_9025_28329->HrefValue = "";
		$this->Below_9025_28329->TooltipValue = "";

		// PI 4
		$this->PI_4->LinkCustomAttributes = "";
		$this->PI_4->HrefValue = "";
		$this->PI_4->TooltipValue = "";

		// Target (4)
		$this->Target_28429->LinkCustomAttributes = "";
		$this->Target_28429->HrefValue = "";
		$this->Target_28429->TooltipValue = "";

		// Accomplishment (4)
		$this->Accomplishment_28429->LinkCustomAttributes = "";
		$this->Accomplishment_28429->HrefValue = "";
		$this->Accomplishment_28429->TooltipValue = "";

		// 90% and Above (4)
		$this->z9025_and_Above_28429->LinkCustomAttributes = "";
		$this->z9025_and_Above_28429->HrefValue = "";
		$this->z9025_and_Above_28429->TooltipValue = "";

		// Below 90% (4)
		$this->Below_9025_28429->LinkCustomAttributes = "";
		$this->Below_9025_28429->HrefValue = "";
		$this->Below_9025_28429->TooltipValue = "";

		// PI 5
		$this->PI_5->LinkCustomAttributes = "";
		$this->PI_5->HrefValue = "";
		$this->PI_5->TooltipValue = "";

		// Target (5)
		$this->Target_28529->LinkCustomAttributes = "";
		$this->Target_28529->HrefValue = "";
		$this->Target_28529->TooltipValue = "";

		// Accomplishment (5)
		$this->Accomplishment_28529->LinkCustomAttributes = "";
		$this->Accomplishment_28529->HrefValue = "";
		$this->Accomplishment_28529->TooltipValue = "";

		// 90% and Above (5)
		$this->z9025_and_Above_28529->LinkCustomAttributes = "";
		$this->z9025_and_Above_28529->HrefValue = "";
		$this->z9025_and_Above_28529->TooltipValue = "";

		// Below 90% (5)
		$this->Below_9025_28529->LinkCustomAttributes = "";
		$this->Below_9025_28529->HrefValue = "";
		$this->Below_9025_28529->TooltipValue = "";

		// PI 6
		$this->PI_6->LinkCustomAttributes = "";
		$this->PI_6->HrefValue = "";
		$this->PI_6->TooltipValue = "";

		// Target (6)
		$this->Target_28629->LinkCustomAttributes = "";
		$this->Target_28629->HrefValue = "";
		$this->Target_28629->TooltipValue = "";

		// Accomplishment (6)
		$this->Accomplishment_28629->LinkCustomAttributes = "";
		$this->Accomplishment_28629->HrefValue = "";
		$this->Accomplishment_28629->TooltipValue = "";

		// 90% and Above (6)
		$this->z9025_and_Above_28629->LinkCustomAttributes = "";
		$this->z9025_and_Above_28629->HrefValue = "";
		$this->z9025_and_Above_28629->TooltipValue = "";

		// Below 90% (6)
		$this->Below_9025_28629->LinkCustomAttributes = "";
		$this->Below_9025_28629->HrefValue = "";
		$this->Below_9025_28629->TooltipValue = "";

		// PI 7
		$this->PI_7->LinkCustomAttributes = "";
		$this->PI_7->HrefValue = "";
		$this->PI_7->TooltipValue = "";

		// Target (7)
		$this->Target_28729->LinkCustomAttributes = "";
		$this->Target_28729->HrefValue = "";
		$this->Target_28729->TooltipValue = "";

		// Accomplishment (7)
		$this->Accomplishment_28729->LinkCustomAttributes = "";
		$this->Accomplishment_28729->HrefValue = "";
		$this->Accomplishment_28729->TooltipValue = "";

		// 90% and Above (7)
		$this->z9025_and_Above_28729->LinkCustomAttributes = "";
		$this->z9025_and_Above_28729->HrefValue = "";
		$this->z9025_and_Above_28729->TooltipValue = "";

		// Below 90% (7)
		$this->Below_9025_28729->LinkCustomAttributes = "";
		$this->Below_9025_28729->HrefValue = "";
		$this->Below_9025_28729->TooltipValue = "";

		// PI 8
		$this->PI_8->LinkCustomAttributes = "";
		$this->PI_8->HrefValue = "";
		$this->PI_8->TooltipValue = "";

		// Target (8)
		$this->Target_28829->LinkCustomAttributes = "";
		$this->Target_28829->HrefValue = "";
		$this->Target_28829->TooltipValue = "";

		// Accomplishment (8)
		$this->Accomplishment_28829->LinkCustomAttributes = "";
		$this->Accomplishment_28829->HrefValue = "";
		$this->Accomplishment_28829->TooltipValue = "";

		// 90% and Above (8)
		$this->z9025_and_Above_28829->LinkCustomAttributes = "";
		$this->z9025_and_Above_28829->HrefValue = "";
		$this->z9025_and_Above_28829->TooltipValue = "";

		// Below 90% (8)
		$this->Below_9025_28829->LinkCustomAttributes = "";
		$this->Below_9025_28829->HrefValue = "";
		$this->Below_9025_28829->TooltipValue = "";

		// PI 9
		$this->PI_9->LinkCustomAttributes = "";
		$this->PI_9->HrefValue = "";
		$this->PI_9->TooltipValue = "";

		// Target (9)
		$this->Target_28929->LinkCustomAttributes = "";
		$this->Target_28929->HrefValue = "";
		$this->Target_28929->TooltipValue = "";

		// Accomplishment (9)
		$this->Accomplishment_28929->LinkCustomAttributes = "";
		$this->Accomplishment_28929->HrefValue = "";
		$this->Accomplishment_28929->TooltipValue = "";

		// 90% and Above (9)
		$this->z9025_and_Above_28929->LinkCustomAttributes = "";
		$this->z9025_and_Above_28929->HrefValue = "";
		$this->z9025_and_Above_28929->TooltipValue = "";

		// Below 90% (9)
		$this->Below_9025_28929->LinkCustomAttributes = "";
		$this->Below_9025_28929->HrefValue = "";
		$this->Below_9025_28929->TooltipValue = "";

		// PI 10
		$this->PI_10->LinkCustomAttributes = "";
		$this->PI_10->HrefValue = "";
		$this->PI_10->TooltipValue = "";

		// Target (10)
		$this->Target_281029->LinkCustomAttributes = "";
		$this->Target_281029->HrefValue = "";
		$this->Target_281029->TooltipValue = "";

		// Accomplishment (10)
		$this->Accomplishment_281029->LinkCustomAttributes = "";
		$this->Accomplishment_281029->HrefValue = "";
		$this->Accomplishment_281029->TooltipValue = "";

		// 90% and Above (10)
		$this->z9025_and_Above_281029->LinkCustomAttributes = "";
		$this->z9025_and_Above_281029->HrefValue = "";
		$this->z9025_and_Above_281029->TooltipValue = "";

		// Below 90% (10)
		$this->Below_9025_281029->LinkCustomAttributes = "";
		$this->Below_9025_281029->HrefValue = "";
		$this->Below_9025_281029->TooltipValue = "";

		// PI 11
		$this->PI_11->LinkCustomAttributes = "";
		$this->PI_11->HrefValue = "";
		$this->PI_11->TooltipValue = "";

		// Target (11)
		$this->Target_281129->LinkCustomAttributes = "";
		$this->Target_281129->HrefValue = "";
		$this->Target_281129->TooltipValue = "";

		// Accomplishment (11)
		$this->Accomplishment_281129->LinkCustomAttributes = "";
		$this->Accomplishment_281129->HrefValue = "";
		$this->Accomplishment_281129->TooltipValue = "";

		// 90% and Above (11)
		$this->z9025_and_Above_281129->LinkCustomAttributes = "";
		$this->z9025_and_Above_281129->HrefValue = "";
		$this->z9025_and_Above_281129->TooltipValue = "";

		// Below 90% (11)
		$this->Below_9025_281129->LinkCustomAttributes = "";
		$this->Below_9025_281129->HrefValue = "";
		$this->Below_9025_281129->TooltipValue = "";

		// PI 12
		$this->PI_12->LinkCustomAttributes = "";
		$this->PI_12->HrefValue = "";
		$this->PI_12->TooltipValue = "";

		// Target (12)
		$this->Target_281229->LinkCustomAttributes = "";
		$this->Target_281229->HrefValue = "";
		$this->Target_281229->TooltipValue = "";

		// Accomplishment (12)
		$this->Accomplishment_281229->LinkCustomAttributes = "";
		$this->Accomplishment_281229->HrefValue = "";
		$this->Accomplishment_281229->TooltipValue = "";

		// 90% and Above (12)
		$this->z9025_and_Above_281229->LinkCustomAttributes = "";
		$this->z9025_and_Above_281229->HrefValue = "";
		$this->z9025_and_Above_281229->TooltipValue = "";

		// Below 90% (12)
		$this->Below_9025_281229->LinkCustomAttributes = "";
		$this->Below_9025_281229->HrefValue = "";
		$this->Below_9025_281229->TooltipValue = "";

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
					$XmlDoc->AddField('Constituent_University', $this->Constituent_University->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Unit', $this->Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_1', $this->PI_1->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Sub', $this->PI_Sub->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28129', $this->Target_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28129', $this->Accomplishment_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28129', $this->z9025_and_Above_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28129', $this->Below_9025_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_2', $this->PI_2->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28229', $this->Target_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28229', $this->Accomplishment_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28229', $this->z9025_and_Above_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28229', $this->Below_9025_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_3', $this->PI_3->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28329', $this->Target_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28329', $this->Accomplishment_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28329', $this->z9025_and_Above_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28329', $this->Below_9025_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_4', $this->PI_4->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28429', $this->Target_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28429', $this->Accomplishment_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28429', $this->z9025_and_Above_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28429', $this->Below_9025_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_5', $this->PI_5->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28529', $this->Target_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28529', $this->Accomplishment_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28529', $this->z9025_and_Above_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28529', $this->Below_9025_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_6', $this->PI_6->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28629', $this->Target_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28629', $this->Accomplishment_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28629', $this->z9025_and_Above_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28629', $this->Below_9025_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_7', $this->PI_7->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28729', $this->Target_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28729', $this->Accomplishment_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28729', $this->z9025_and_Above_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28729', $this->Below_9025_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_8', $this->PI_8->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28829', $this->Target_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28829', $this->Accomplishment_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28829', $this->z9025_and_Above_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28829', $this->Below_9025_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_9', $this->PI_9->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28929', $this->Target_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28929', $this->Accomplishment_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28929', $this->z9025_and_Above_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28929', $this->Below_9025_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_10', $this->PI_10->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_281029', $this->Target_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_281029', $this->Accomplishment_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_281029', $this->z9025_and_Above_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_281029', $this->Below_9025_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_11', $this->PI_11->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_281129', $this->Target_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_281129', $this->Accomplishment_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_281129', $this->z9025_and_Above_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_281129', $this->Below_9025_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_12', $this->PI_12->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_281229', $this->Target_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_281229', $this->Accomplishment_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_281229', $this->z9025_and_Above_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_281229', $this->Below_9025_281229->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('Constituent_University', $this->Constituent_University->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Unit', $this->Unit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('MFO', $this->MFO->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_1', $this->PI_1->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_Sub', $this->PI_Sub->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28129', $this->Target_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28129', $this->Accomplishment_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28129', $this->z9025_and_Above_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28129', $this->Below_9025_28129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_2', $this->PI_2->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28229', $this->Target_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28229', $this->Accomplishment_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28229', $this->z9025_and_Above_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28229', $this->Below_9025_28229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_3', $this->PI_3->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28329', $this->Target_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28329', $this->Accomplishment_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28329', $this->z9025_and_Above_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28329', $this->Below_9025_28329->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_4', $this->PI_4->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28429', $this->Target_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28429', $this->Accomplishment_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28429', $this->z9025_and_Above_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28429', $this->Below_9025_28429->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_5', $this->PI_5->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28529', $this->Target_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28529', $this->Accomplishment_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28529', $this->z9025_and_Above_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28529', $this->Below_9025_28529->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_6', $this->PI_6->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28629', $this->Target_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28629', $this->Accomplishment_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28629', $this->z9025_and_Above_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28629', $this->Below_9025_28629->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_7', $this->PI_7->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28729', $this->Target_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28729', $this->Accomplishment_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28729', $this->z9025_and_Above_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28729', $this->Below_9025_28729->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_8', $this->PI_8->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28829', $this->Target_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28829', $this->Accomplishment_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28829', $this->z9025_and_Above_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28829', $this->Below_9025_28829->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_9', $this->PI_9->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_28929', $this->Target_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_28929', $this->Accomplishment_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_28929', $this->z9025_and_Above_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_28929', $this->Below_9025_28929->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_10', $this->PI_10->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_281029', $this->Target_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_281029', $this->Accomplishment_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_281029', $this->z9025_and_Above_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_281029', $this->Below_9025_281029->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_11', $this->PI_11->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_281129', $this->Target_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_281129', $this->Accomplishment_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_281129', $this->z9025_and_Above_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_281129', $this->Below_9025_281129->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('PI_12', $this->PI_12->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Target_281229', $this->Target_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Accomplishment_281229', $this->Accomplishment_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('z9025_and_Above_281229', $this->z9025_and_Above_281229->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('Below_9025_281229', $this->Below_9025_281229->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->Constituent_University);
				$Doc->ExportCaption($this->Unit);
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->PI_1);
				$Doc->ExportCaption($this->PI_Sub);
				$Doc->ExportCaption($this->Target_28129);
				$Doc->ExportCaption($this->Accomplishment_28129);
				$Doc->ExportCaption($this->z9025_and_Above_28129);
				$Doc->ExportCaption($this->Below_9025_28129);
				$Doc->ExportCaption($this->PI_2);
				$Doc->ExportCaption($this->Target_28229);
				$Doc->ExportCaption($this->Accomplishment_28229);
				$Doc->ExportCaption($this->z9025_and_Above_28229);
				$Doc->ExportCaption($this->Below_9025_28229);
				$Doc->ExportCaption($this->PI_3);
				$Doc->ExportCaption($this->Target_28329);
				$Doc->ExportCaption($this->Accomplishment_28329);
				$Doc->ExportCaption($this->z9025_and_Above_28329);
				$Doc->ExportCaption($this->Below_9025_28329);
				$Doc->ExportCaption($this->PI_4);
				$Doc->ExportCaption($this->Target_28429);
				$Doc->ExportCaption($this->Accomplishment_28429);
				$Doc->ExportCaption($this->z9025_and_Above_28429);
				$Doc->ExportCaption($this->Below_9025_28429);
				$Doc->ExportCaption($this->PI_5);
				$Doc->ExportCaption($this->Target_28529);
				$Doc->ExportCaption($this->Accomplishment_28529);
				$Doc->ExportCaption($this->z9025_and_Above_28529);
				$Doc->ExportCaption($this->Below_9025_28529);
				$Doc->ExportCaption($this->PI_6);
				$Doc->ExportCaption($this->Target_28629);
				$Doc->ExportCaption($this->Accomplishment_28629);
				$Doc->ExportCaption($this->z9025_and_Above_28629);
				$Doc->ExportCaption($this->Below_9025_28629);
				$Doc->ExportCaption($this->PI_7);
				$Doc->ExportCaption($this->Target_28729);
				$Doc->ExportCaption($this->Accomplishment_28729);
				$Doc->ExportCaption($this->z9025_and_Above_28729);
				$Doc->ExportCaption($this->Below_9025_28729);
				$Doc->ExportCaption($this->PI_8);
				$Doc->ExportCaption($this->Target_28829);
				$Doc->ExportCaption($this->Accomplishment_28829);
				$Doc->ExportCaption($this->z9025_and_Above_28829);
				$Doc->ExportCaption($this->Below_9025_28829);
				$Doc->ExportCaption($this->PI_9);
				$Doc->ExportCaption($this->Target_28929);
				$Doc->ExportCaption($this->Accomplishment_28929);
				$Doc->ExportCaption($this->z9025_and_Above_28929);
				$Doc->ExportCaption($this->Below_9025_28929);
				$Doc->ExportCaption($this->PI_10);
				$Doc->ExportCaption($this->Target_281029);
				$Doc->ExportCaption($this->Accomplishment_281029);
				$Doc->ExportCaption($this->z9025_and_Above_281029);
				$Doc->ExportCaption($this->Below_9025_281029);
				$Doc->ExportCaption($this->PI_11);
				$Doc->ExportCaption($this->Target_281129);
				$Doc->ExportCaption($this->Accomplishment_281129);
				$Doc->ExportCaption($this->z9025_and_Above_281129);
				$Doc->ExportCaption($this->Below_9025_281129);
				$Doc->ExportCaption($this->PI_12);
				$Doc->ExportCaption($this->Target_281229);
				$Doc->ExportCaption($this->Accomplishment_281229);
				$Doc->ExportCaption($this->z9025_and_Above_281229);
				$Doc->ExportCaption($this->Below_9025_281229);
			} else {
				$Doc->ExportCaption($this->Constituent_University);
				$Doc->ExportCaption($this->Unit);
				$Doc->ExportCaption($this->MFO);
				$Doc->ExportCaption($this->PI_1);
				$Doc->ExportCaption($this->PI_Sub);
				$Doc->ExportCaption($this->Target_28129);
				$Doc->ExportCaption($this->Accomplishment_28129);
				$Doc->ExportCaption($this->z9025_and_Above_28129);
				$Doc->ExportCaption($this->Below_9025_28129);
				$Doc->ExportCaption($this->PI_2);
				$Doc->ExportCaption($this->Target_28229);
				$Doc->ExportCaption($this->Accomplishment_28229);
				$Doc->ExportCaption($this->z9025_and_Above_28229);
				$Doc->ExportCaption($this->Below_9025_28229);
				$Doc->ExportCaption($this->PI_3);
				$Doc->ExportCaption($this->Target_28329);
				$Doc->ExportCaption($this->Accomplishment_28329);
				$Doc->ExportCaption($this->z9025_and_Above_28329);
				$Doc->ExportCaption($this->Below_9025_28329);
				$Doc->ExportCaption($this->PI_4);
				$Doc->ExportCaption($this->Target_28429);
				$Doc->ExportCaption($this->Accomplishment_28429);
				$Doc->ExportCaption($this->z9025_and_Above_28429);
				$Doc->ExportCaption($this->Below_9025_28429);
				$Doc->ExportCaption($this->PI_5);
				$Doc->ExportCaption($this->Target_28529);
				$Doc->ExportCaption($this->Accomplishment_28529);
				$Doc->ExportCaption($this->z9025_and_Above_28529);
				$Doc->ExportCaption($this->Below_9025_28529);
				$Doc->ExportCaption($this->PI_6);
				$Doc->ExportCaption($this->Target_28629);
				$Doc->ExportCaption($this->Accomplishment_28629);
				$Doc->ExportCaption($this->z9025_and_Above_28629);
				$Doc->ExportCaption($this->Below_9025_28629);
				$Doc->ExportCaption($this->PI_7);
				$Doc->ExportCaption($this->Target_28729);
				$Doc->ExportCaption($this->Accomplishment_28729);
				$Doc->ExportCaption($this->z9025_and_Above_28729);
				$Doc->ExportCaption($this->Below_9025_28729);
				$Doc->ExportCaption($this->PI_8);
				$Doc->ExportCaption($this->Target_28829);
				$Doc->ExportCaption($this->Accomplishment_28829);
				$Doc->ExportCaption($this->z9025_and_Above_28829);
				$Doc->ExportCaption($this->Below_9025_28829);
				$Doc->ExportCaption($this->PI_9);
				$Doc->ExportCaption($this->Target_28929);
				$Doc->ExportCaption($this->Accomplishment_28929);
				$Doc->ExportCaption($this->z9025_and_Above_28929);
				$Doc->ExportCaption($this->Below_9025_28929);
				$Doc->ExportCaption($this->PI_10);
				$Doc->ExportCaption($this->Target_281029);
				$Doc->ExportCaption($this->Accomplishment_281029);
				$Doc->ExportCaption($this->z9025_and_Above_281029);
				$Doc->ExportCaption($this->Below_9025_281029);
				$Doc->ExportCaption($this->PI_11);
				$Doc->ExportCaption($this->Target_281129);
				$Doc->ExportCaption($this->Accomplishment_281129);
				$Doc->ExportCaption($this->z9025_and_Above_281129);
				$Doc->ExportCaption($this->Below_9025_281129);
				$Doc->ExportCaption($this->PI_12);
				$Doc->ExportCaption($this->Target_281229);
				$Doc->ExportCaption($this->Accomplishment_281229);
				$Doc->ExportCaption($this->z9025_and_Above_281229);
				$Doc->ExportCaption($this->Below_9025_281229);
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
					$Doc->ExportField($this->Constituent_University);
					$Doc->ExportField($this->Unit);
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->PI_1);
					$Doc->ExportField($this->PI_Sub);
					$Doc->ExportField($this->Target_28129);
					$Doc->ExportField($this->Accomplishment_28129);
					$Doc->ExportField($this->z9025_and_Above_28129);
					$Doc->ExportField($this->Below_9025_28129);
					$Doc->ExportField($this->PI_2);
					$Doc->ExportField($this->Target_28229);
					$Doc->ExportField($this->Accomplishment_28229);
					$Doc->ExportField($this->z9025_and_Above_28229);
					$Doc->ExportField($this->Below_9025_28229);
					$Doc->ExportField($this->PI_3);
					$Doc->ExportField($this->Target_28329);
					$Doc->ExportField($this->Accomplishment_28329);
					$Doc->ExportField($this->z9025_and_Above_28329);
					$Doc->ExportField($this->Below_9025_28329);
					$Doc->ExportField($this->PI_4);
					$Doc->ExportField($this->Target_28429);
					$Doc->ExportField($this->Accomplishment_28429);
					$Doc->ExportField($this->z9025_and_Above_28429);
					$Doc->ExportField($this->Below_9025_28429);
					$Doc->ExportField($this->PI_5);
					$Doc->ExportField($this->Target_28529);
					$Doc->ExportField($this->Accomplishment_28529);
					$Doc->ExportField($this->z9025_and_Above_28529);
					$Doc->ExportField($this->Below_9025_28529);
					$Doc->ExportField($this->PI_6);
					$Doc->ExportField($this->Target_28629);
					$Doc->ExportField($this->Accomplishment_28629);
					$Doc->ExportField($this->z9025_and_Above_28629);
					$Doc->ExportField($this->Below_9025_28629);
					$Doc->ExportField($this->PI_7);
					$Doc->ExportField($this->Target_28729);
					$Doc->ExportField($this->Accomplishment_28729);
					$Doc->ExportField($this->z9025_and_Above_28729);
					$Doc->ExportField($this->Below_9025_28729);
					$Doc->ExportField($this->PI_8);
					$Doc->ExportField($this->Target_28829);
					$Doc->ExportField($this->Accomplishment_28829);
					$Doc->ExportField($this->z9025_and_Above_28829);
					$Doc->ExportField($this->Below_9025_28829);
					$Doc->ExportField($this->PI_9);
					$Doc->ExportField($this->Target_28929);
					$Doc->ExportField($this->Accomplishment_28929);
					$Doc->ExportField($this->z9025_and_Above_28929);
					$Doc->ExportField($this->Below_9025_28929);
					$Doc->ExportField($this->PI_10);
					$Doc->ExportField($this->Target_281029);
					$Doc->ExportField($this->Accomplishment_281029);
					$Doc->ExportField($this->z9025_and_Above_281029);
					$Doc->ExportField($this->Below_9025_281029);
					$Doc->ExportField($this->PI_11);
					$Doc->ExportField($this->Target_281129);
					$Doc->ExportField($this->Accomplishment_281129);
					$Doc->ExportField($this->z9025_and_Above_281129);
					$Doc->ExportField($this->Below_9025_281129);
					$Doc->ExportField($this->PI_12);
					$Doc->ExportField($this->Target_281229);
					$Doc->ExportField($this->Accomplishment_281229);
					$Doc->ExportField($this->z9025_and_Above_281229);
					$Doc->ExportField($this->Below_9025_281229);
				} else {
					$Doc->ExportField($this->Constituent_University);
					$Doc->ExportField($this->Unit);
					$Doc->ExportField($this->MFO);
					$Doc->ExportField($this->PI_1);
					$Doc->ExportField($this->PI_Sub);
					$Doc->ExportField($this->Target_28129);
					$Doc->ExportField($this->Accomplishment_28129);
					$Doc->ExportField($this->z9025_and_Above_28129);
					$Doc->ExportField($this->Below_9025_28129);
					$Doc->ExportField($this->PI_2);
					$Doc->ExportField($this->Target_28229);
					$Doc->ExportField($this->Accomplishment_28229);
					$Doc->ExportField($this->z9025_and_Above_28229);
					$Doc->ExportField($this->Below_9025_28229);
					$Doc->ExportField($this->PI_3);
					$Doc->ExportField($this->Target_28329);
					$Doc->ExportField($this->Accomplishment_28329);
					$Doc->ExportField($this->z9025_and_Above_28329);
					$Doc->ExportField($this->Below_9025_28329);
					$Doc->ExportField($this->PI_4);
					$Doc->ExportField($this->Target_28429);
					$Doc->ExportField($this->Accomplishment_28429);
					$Doc->ExportField($this->z9025_and_Above_28429);
					$Doc->ExportField($this->Below_9025_28429);
					$Doc->ExportField($this->PI_5);
					$Doc->ExportField($this->Target_28529);
					$Doc->ExportField($this->Accomplishment_28529);
					$Doc->ExportField($this->z9025_and_Above_28529);
					$Doc->ExportField($this->Below_9025_28529);
					$Doc->ExportField($this->PI_6);
					$Doc->ExportField($this->Target_28629);
					$Doc->ExportField($this->Accomplishment_28629);
					$Doc->ExportField($this->z9025_and_Above_28629);
					$Doc->ExportField($this->Below_9025_28629);
					$Doc->ExportField($this->PI_7);
					$Doc->ExportField($this->Target_28729);
					$Doc->ExportField($this->Accomplishment_28729);
					$Doc->ExportField($this->z9025_and_Above_28729);
					$Doc->ExportField($this->Below_9025_28729);
					$Doc->ExportField($this->PI_8);
					$Doc->ExportField($this->Target_28829);
					$Doc->ExportField($this->Accomplishment_28829);
					$Doc->ExportField($this->z9025_and_Above_28829);
					$Doc->ExportField($this->Below_9025_28829);
					$Doc->ExportField($this->PI_9);
					$Doc->ExportField($this->Target_28929);
					$Doc->ExportField($this->Accomplishment_28929);
					$Doc->ExportField($this->z9025_and_Above_28929);
					$Doc->ExportField($this->Below_9025_28929);
					$Doc->ExportField($this->PI_10);
					$Doc->ExportField($this->Target_281029);
					$Doc->ExportField($this->Accomplishment_281029);
					$Doc->ExportField($this->z9025_and_Above_281029);
					$Doc->ExportField($this->Below_9025_281029);
					$Doc->ExportField($this->PI_11);
					$Doc->ExportField($this->Target_281129);
					$Doc->ExportField($this->Accomplishment_281129);
					$Doc->ExportField($this->z9025_and_Above_281129);
					$Doc->ExportField($this->Below_9025_281129);
					$Doc->ExportField($this->PI_12);
					$Doc->ExportField($this->Target_281229);
					$Doc->ExportField($this->Accomplishment_281229);
					$Doc->ExportField($this->z9025_and_Above_281229);
					$Doc->ExportField($this->Below_9025_281229);
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
