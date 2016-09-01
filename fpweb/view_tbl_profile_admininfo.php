<?php

// Global variable for table object
$view_tbl_profile_admin = NULL;

//
// Table class for view_tbl_profile_admin
//
class cview_tbl_profile_admin {
	var $TableVar = 'view_tbl_profile_admin';
	var $TableName = 'view_tbl_profile_admin';
	var $TableType = 'TABLE';
	var $facultyprofile_ID;
	var $faculty_ID;
	var $faculty_name;
	var $collectionPeriod_ID;
	var $cu;
	var $collectionPeriod_ay;
	var $collectionPeriod_sem;
	var $collectionPeriod_cutOffDate;
	var $collectionPeriod_status;
	var $unitID;
	var $facultyprofile_homeUnit_ID;
	var $facultyprofile_isHomeUnit;
	var $facultyGroup_CHEDCode;
	var $facultyRank_ID;
	var $facultyprofile_sg;
	var $facultyprofile_annualSalary;
	var $facultyprofile_fte;
	var $facultyprofile_tenureCode;
	var $facultyprofile_leaveCode;
	var $facultyprofile_disCHED_disciplineMajorCode_gen;
	var $disCHED_disciplineCode_gen;
	var $facultyprofile_specificDiscipline_1_primaryTeachingLoad;
	var $facultyprofile_specificDiscipline_2_primaryTeachingLoad;
	var $facultyprofile_labHrs_basic;
	var $facultyprofile_lecHrs_basic;
	var $facultyprofile_totalHrs_basic;
	var $facultyprofile_labSCH_basic;
	var $facultyprofile_lecSCH_basic;
	var $facultyprofile_totalSCH_basic;
	var $facultyprofile_labCr_ugrad;
	var $facultyprofile_lecCr_ugrad;
	var $facultyprofile_mixedLabLecCr_ugrad;
	var $facultyprofile_totalCr_ugrad;
	var $facultyprofile_labHrs_ugrad;
	var $facultyprofile_lecHrs_ugrad;
	var $facultyprofile_mixedLabLecHrs_ugrad;
	var $facultyprofile_totalHrs_ugrad;
	var $facultyprofile_labSCH_ugrad;
	var $facultyprofile_lecSCH_ugrad;
	var $facultyprofile_mixedLabLecSCH_ugrad;
	var $facultyprofile_totalSCH_ugrad;
	var $facultyprofile_labCr_graduate;
	var $facultyprofile_lecCr_graduate;
	var $facultyprofile_mixedLabLecCr_graduate;
	var $facultyprofile_totalCr_graduate;
	var $facultyprofile_labHrs_graduate;
	var $facultyprofile_lecHrs_graduate;
	var $facultyprofile_mixedLabLecHrs_graduate;
	var $facultyprofile_totalHrs_graduate;
	var $facultyprofile_labSCH_graduate;
	var $facultyprofile_lecSCH_graduate;
	var $facultyprofile_mixedLabLecSCH_graduate;
	var $facultyprofile_totalSCH_graduate;
	var $facultyprofile_researchLoad;
	var $facultyprofile_extensionServicesLoad;
	var $facultyprofile_studyLoad;
	var $facultyprofile_forProductionLoad;
	var $facultyprofile_administrativeLoad;
	var $facultyprofile_otherLoadCredits;
	var $facultyprofile_total_nonTeachingLoad;
	var $facultyprofile_totalWorkloadInCreditUnits_gen;
	var $facultyprofile_remarks;
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
	function cview_tbl_profile_admin() {
		global $Language;
		$this->AllowAddDeleteRow = up_AllowAddDeleteRow(); // Allow add/delete row

		// facultyprofile_ID
		$this->facultyprofile_ID = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_ID', 'facultyprofile_ID', '`facultyprofile_ID`', 3, -1, FALSE, '`facultyprofile_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyprofile_ID'] =& $this->facultyprofile_ID;

		// faculty_ID
		$this->faculty_ID = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_faculty_ID', 'faculty_ID', '`faculty_ID`', 3, -1, FALSE, '`faculty_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->faculty_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['faculty_ID'] =& $this->faculty_ID;

		// faculty_name
		$this->faculty_name = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_faculty_name', 'faculty_name', '`faculty_name`', 200, -1, FALSE, '`faculty_name`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['faculty_name'] =& $this->faculty_name;

		// collectionPeriod_ID
		$this->collectionPeriod_ID = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_collectionPeriod_ID', 'collectionPeriod_ID', '`collectionPeriod_ID`', 3, -1, FALSE, '`collectionPeriod_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->collectionPeriod_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['collectionPeriod_ID'] =& $this->collectionPeriod_ID;

		// cu
		$this->cu = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_cu', 'cu', '`cu`', 5, -1, FALSE, '`cu`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->cu->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['cu'] =& $this->cu;

		// collectionPeriod_ay
		$this->collectionPeriod_ay = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_collectionPeriod_ay', 'collectionPeriod_ay', '`collectionPeriod_ay`', 3, -1, FALSE, '`collectionPeriod_ay`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->collectionPeriod_ay->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['collectionPeriod_ay'] =& $this->collectionPeriod_ay;

		// collectionPeriod_sem
		$this->collectionPeriod_sem = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_collectionPeriod_sem', 'collectionPeriod_sem', '`collectionPeriod_sem`', 3, -1, FALSE, '`collectionPeriod_sem`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->collectionPeriod_sem->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['collectionPeriod_sem'] =& $this->collectionPeriod_sem;

		// collectionPeriod_cutOffDate
		$this->collectionPeriod_cutOffDate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_collectionPeriod_cutOffDate', 'collectionPeriod_cutOffDate', '`collectionPeriod_cutOffDate`', 135, 6, FALSE, '`collectionPeriod_cutOffDate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->collectionPeriod_cutOffDate->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateMDY"));
		$this->fields['collectionPeriod_cutOffDate'] =& $this->collectionPeriod_cutOffDate;

		// collectionPeriod_status
		$this->collectionPeriod_status = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_collectionPeriod_status', 'collectionPeriod_status', '`collectionPeriod_status`', 3, -1, FALSE, '`collectionPeriod_status`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->collectionPeriod_status->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['collectionPeriod_status'] =& $this->collectionPeriod_status;

		// unitID
		$this->unitID = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_unitID', 'unitID', '`unitID`', 3, -1, FALSE, '`unitID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->unitID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['unitID'] =& $this->unitID;

		// facultyprofile_homeUnit_ID
		$this->facultyprofile_homeUnit_ID = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_homeUnit_ID', 'facultyprofile_homeUnit_ID', '`facultyprofile_homeUnit_ID`', 3, -1, FALSE, '`facultyprofile_homeUnit_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_homeUnit_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyprofile_homeUnit_ID'] =& $this->facultyprofile_homeUnit_ID;

		// facultyprofile_isHomeUnit
		$this->facultyprofile_isHomeUnit = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_isHomeUnit', 'facultyprofile_isHomeUnit', '`facultyprofile_isHomeUnit`', 200, -1, FALSE, '`facultyprofile_isHomeUnit`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['facultyprofile_isHomeUnit'] =& $this->facultyprofile_isHomeUnit;

		// facultyGroup_CHEDCode
		$this->facultyGroup_CHEDCode = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyGroup_CHEDCode', 'facultyGroup_CHEDCode', '`facultyGroup_CHEDCode`', 200, -1, FALSE, '`facultyGroup_CHEDCode`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['facultyGroup_CHEDCode'] =& $this->facultyGroup_CHEDCode;

		// facultyRank_ID
		$this->facultyRank_ID = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyRank_ID', 'facultyRank_ID', '`facultyRank_ID`', 3, -1, FALSE, '`facultyRank_ID`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyRank_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyRank_ID'] =& $this->facultyRank_ID;

		// facultyprofile_sg
		$this->facultyprofile_sg = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_sg', 'facultyprofile_sg', '`facultyprofile_sg`', 3, -1, FALSE, '`facultyprofile_sg`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_sg->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyprofile_sg'] =& $this->facultyprofile_sg;

		// facultyprofile_annualSalary
		$this->facultyprofile_annualSalary = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_annualSalary', 'facultyprofile_annualSalary', '`facultyprofile_annualSalary`', 5, -1, FALSE, '`facultyprofile_annualSalary`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_annualSalary->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_annualSalary'] =& $this->facultyprofile_annualSalary;

		// facultyprofile_fte
		$this->facultyprofile_fte = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_fte', 'facultyprofile_fte', '`facultyprofile_fte`', 5, -1, FALSE, '`facultyprofile_fte`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_fte->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_fte'] =& $this->facultyprofile_fte;

		// facultyprofile_tenureCode
		$this->facultyprofile_tenureCode = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_tenureCode', 'facultyprofile_tenureCode', '`facultyprofile_tenureCode`', 3, -1, FALSE, '`facultyprofile_tenureCode`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_tenureCode->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyprofile_tenureCode'] =& $this->facultyprofile_tenureCode;

		// facultyprofile_leaveCode
		$this->facultyprofile_leaveCode = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_leaveCode', 'facultyprofile_leaveCode', '`facultyprofile_leaveCode`', 3, -1, FALSE, '`facultyprofile_leaveCode`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_leaveCode->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyprofile_leaveCode'] =& $this->facultyprofile_leaveCode;

		// facultyprofile_disCHED_disciplineMajorCode_gen
		$this->facultyprofile_disCHED_disciplineMajorCode_gen = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_disCHED_disciplineMajorCode_gen', 'facultyprofile_disCHED_disciplineMajorCode_gen', '`facultyprofile_disCHED_disciplineMajorCode_gen`', 3, -1, FALSE, '`facultyprofile_disCHED_disciplineMajorCode_gen`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_disCHED_disciplineMajorCode_gen->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyprofile_disCHED_disciplineMajorCode_gen'] =& $this->facultyprofile_disCHED_disciplineMajorCode_gen;

		// disCHED_disciplineCode_gen
		$this->disCHED_disciplineCode_gen = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_disCHED_disciplineCode_gen', 'disCHED_disciplineCode_gen', '`disCHED_disciplineCode_gen`', 3, -1, FALSE, '`disCHED_disciplineCode_gen`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->disCHED_disciplineCode_gen->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['disCHED_disciplineCode_gen'] =& $this->disCHED_disciplineCode_gen;

		// facultyprofile_specificDiscipline_1_primaryTeachingLoad
		$this->facultyprofile_specificDiscipline_1_primaryTeachingLoad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_specificDiscipline_1_primaryTeachingLoad', 'facultyprofile_specificDiscipline_1_primaryTeachingLoad', '`facultyprofile_specificDiscipline_1_primaryTeachingLoad`', 3, -1, FALSE, '`facultyprofile_specificDiscipline_1_primaryTeachingLoad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyprofile_specificDiscipline_1_primaryTeachingLoad'] =& $this->facultyprofile_specificDiscipline_1_primaryTeachingLoad;

		// facultyprofile_specificDiscipline_2_primaryTeachingLoad
		$this->facultyprofile_specificDiscipline_2_primaryTeachingLoad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_specificDiscipline_2_primaryTeachingLoad', 'facultyprofile_specificDiscipline_2_primaryTeachingLoad', '`facultyprofile_specificDiscipline_2_primaryTeachingLoad`', 3, -1, FALSE, '`facultyprofile_specificDiscipline_2_primaryTeachingLoad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_specificDiscipline_2_primaryTeachingLoad->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['facultyprofile_specificDiscipline_2_primaryTeachingLoad'] =& $this->facultyprofile_specificDiscipline_2_primaryTeachingLoad;

		// facultyprofile_labHrs_basic
		$this->facultyprofile_labHrs_basic = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_labHrs_basic', 'facultyprofile_labHrs_basic', '`facultyprofile_labHrs_basic`', 5, -1, FALSE, '`facultyprofile_labHrs_basic`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_labHrs_basic->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_labHrs_basic'] =& $this->facultyprofile_labHrs_basic;

		// facultyprofile_lecHrs_basic
		$this->facultyprofile_lecHrs_basic = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_lecHrs_basic', 'facultyprofile_lecHrs_basic', '`facultyprofile_lecHrs_basic`', 5, -1, FALSE, '`facultyprofile_lecHrs_basic`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_lecHrs_basic->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_lecHrs_basic'] =& $this->facultyprofile_lecHrs_basic;

		// facultyprofile_totalHrs_basic
		$this->facultyprofile_totalHrs_basic = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_totalHrs_basic', 'facultyprofile_totalHrs_basic', '`facultyprofile_totalHrs_basic`', 5, -1, FALSE, '`facultyprofile_totalHrs_basic`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_totalHrs_basic->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_totalHrs_basic'] =& $this->facultyprofile_totalHrs_basic;

		// facultyprofile_labSCH_basic
		$this->facultyprofile_labSCH_basic = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_labSCH_basic', 'facultyprofile_labSCH_basic', '`facultyprofile_labSCH_basic`', 5, -1, FALSE, '`facultyprofile_labSCH_basic`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_labSCH_basic->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_labSCH_basic'] =& $this->facultyprofile_labSCH_basic;

		// facultyprofile_lecSCH_basic
		$this->facultyprofile_lecSCH_basic = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_lecSCH_basic', 'facultyprofile_lecSCH_basic', '`facultyprofile_lecSCH_basic`', 5, -1, FALSE, '`facultyprofile_lecSCH_basic`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_lecSCH_basic->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_lecSCH_basic'] =& $this->facultyprofile_lecSCH_basic;

		// facultyprofile_totalSCH_basic
		$this->facultyprofile_totalSCH_basic = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_totalSCH_basic', 'facultyprofile_totalSCH_basic', '`facultyprofile_totalSCH_basic`', 5, -1, FALSE, '`facultyprofile_totalSCH_basic`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_totalSCH_basic->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_totalSCH_basic'] =& $this->facultyprofile_totalSCH_basic;

		// facultyprofile_labCr_ugrad
		$this->facultyprofile_labCr_ugrad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_labCr_ugrad', 'facultyprofile_labCr_ugrad', '`facultyprofile_labCr_ugrad`', 5, -1, FALSE, '`facultyprofile_labCr_ugrad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_labCr_ugrad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_labCr_ugrad'] =& $this->facultyprofile_labCr_ugrad;

		// facultyprofile_lecCr_ugrad
		$this->facultyprofile_lecCr_ugrad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_lecCr_ugrad', 'facultyprofile_lecCr_ugrad', '`facultyprofile_lecCr_ugrad`', 5, -1, FALSE, '`facultyprofile_lecCr_ugrad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_lecCr_ugrad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_lecCr_ugrad'] =& $this->facultyprofile_lecCr_ugrad;

		// facultyprofile_mixedLabLecCr_ugrad
		$this->facultyprofile_mixedLabLecCr_ugrad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_mixedLabLecCr_ugrad', 'facultyprofile_mixedLabLecCr_ugrad', '`facultyprofile_mixedLabLecCr_ugrad`', 5, -1, FALSE, '`facultyprofile_mixedLabLecCr_ugrad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_mixedLabLecCr_ugrad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_mixedLabLecCr_ugrad'] =& $this->facultyprofile_mixedLabLecCr_ugrad;

		// facultyprofile_totalCr_ugrad
		$this->facultyprofile_totalCr_ugrad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_totalCr_ugrad', 'facultyprofile_totalCr_ugrad', '`facultyprofile_totalCr_ugrad`', 5, -1, FALSE, '`facultyprofile_totalCr_ugrad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_totalCr_ugrad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_totalCr_ugrad'] =& $this->facultyprofile_totalCr_ugrad;

		// facultyprofile_labHrs_ugrad
		$this->facultyprofile_labHrs_ugrad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_labHrs_ugrad', 'facultyprofile_labHrs_ugrad', '`facultyprofile_labHrs_ugrad`', 5, -1, FALSE, '`facultyprofile_labHrs_ugrad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_labHrs_ugrad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_labHrs_ugrad'] =& $this->facultyprofile_labHrs_ugrad;

		// facultyprofile_lecHrs_ugrad
		$this->facultyprofile_lecHrs_ugrad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_lecHrs_ugrad', 'facultyprofile_lecHrs_ugrad', '`facultyprofile_lecHrs_ugrad`', 5, -1, FALSE, '`facultyprofile_lecHrs_ugrad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_lecHrs_ugrad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_lecHrs_ugrad'] =& $this->facultyprofile_lecHrs_ugrad;

		// facultyprofile_mixedLabLecHrs_ugrad
		$this->facultyprofile_mixedLabLecHrs_ugrad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_mixedLabLecHrs_ugrad', 'facultyprofile_mixedLabLecHrs_ugrad', '`facultyprofile_mixedLabLecHrs_ugrad`', 5, -1, FALSE, '`facultyprofile_mixedLabLecHrs_ugrad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_mixedLabLecHrs_ugrad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_mixedLabLecHrs_ugrad'] =& $this->facultyprofile_mixedLabLecHrs_ugrad;

		// facultyprofile_totalHrs_ugrad
		$this->facultyprofile_totalHrs_ugrad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_totalHrs_ugrad', 'facultyprofile_totalHrs_ugrad', '`facultyprofile_totalHrs_ugrad`', 5, -1, FALSE, '`facultyprofile_totalHrs_ugrad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_totalHrs_ugrad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_totalHrs_ugrad'] =& $this->facultyprofile_totalHrs_ugrad;

		// facultyprofile_labSCH_ugrad
		$this->facultyprofile_labSCH_ugrad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_labSCH_ugrad', 'facultyprofile_labSCH_ugrad', '`facultyprofile_labSCH_ugrad`', 5, -1, FALSE, '`facultyprofile_labSCH_ugrad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_labSCH_ugrad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_labSCH_ugrad'] =& $this->facultyprofile_labSCH_ugrad;

		// facultyprofile_lecSCH_ugrad
		$this->facultyprofile_lecSCH_ugrad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_lecSCH_ugrad', 'facultyprofile_lecSCH_ugrad', '`facultyprofile_lecSCH_ugrad`', 5, -1, FALSE, '`facultyprofile_lecSCH_ugrad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_lecSCH_ugrad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_lecSCH_ugrad'] =& $this->facultyprofile_lecSCH_ugrad;

		// facultyprofile_mixedLabLecSCH_ugrad
		$this->facultyprofile_mixedLabLecSCH_ugrad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_mixedLabLecSCH_ugrad', 'facultyprofile_mixedLabLecSCH_ugrad', '`facultyprofile_mixedLabLecSCH_ugrad`', 5, -1, FALSE, '`facultyprofile_mixedLabLecSCH_ugrad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_mixedLabLecSCH_ugrad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_mixedLabLecSCH_ugrad'] =& $this->facultyprofile_mixedLabLecSCH_ugrad;

		// facultyprofile_totalSCH_ugrad
		$this->facultyprofile_totalSCH_ugrad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_totalSCH_ugrad', 'facultyprofile_totalSCH_ugrad', '`facultyprofile_totalSCH_ugrad`', 5, -1, FALSE, '`facultyprofile_totalSCH_ugrad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_totalSCH_ugrad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_totalSCH_ugrad'] =& $this->facultyprofile_totalSCH_ugrad;

		// facultyprofile_labCr_graduate
		$this->facultyprofile_labCr_graduate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_labCr_graduate', 'facultyprofile_labCr_graduate', '`facultyprofile_labCr_graduate`', 5, -1, FALSE, '`facultyprofile_labCr_graduate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_labCr_graduate->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_labCr_graduate'] =& $this->facultyprofile_labCr_graduate;

		// facultyprofile_lecCr_graduate
		$this->facultyprofile_lecCr_graduate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_lecCr_graduate', 'facultyprofile_lecCr_graduate', '`facultyprofile_lecCr_graduate`', 5, -1, FALSE, '`facultyprofile_lecCr_graduate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_lecCr_graduate->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_lecCr_graduate'] =& $this->facultyprofile_lecCr_graduate;

		// facultyprofile_mixedLabLecCr_graduate
		$this->facultyprofile_mixedLabLecCr_graduate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_mixedLabLecCr_graduate', 'facultyprofile_mixedLabLecCr_graduate', '`facultyprofile_mixedLabLecCr_graduate`', 5, -1, FALSE, '`facultyprofile_mixedLabLecCr_graduate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_mixedLabLecCr_graduate->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_mixedLabLecCr_graduate'] =& $this->facultyprofile_mixedLabLecCr_graduate;

		// facultyprofile_totalCr_graduate
		$this->facultyprofile_totalCr_graduate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_totalCr_graduate', 'facultyprofile_totalCr_graduate', '`facultyprofile_totalCr_graduate`', 5, -1, FALSE, '`facultyprofile_totalCr_graduate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_totalCr_graduate->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_totalCr_graduate'] =& $this->facultyprofile_totalCr_graduate;

		// facultyprofile_labHrs_graduate
		$this->facultyprofile_labHrs_graduate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_labHrs_graduate', 'facultyprofile_labHrs_graduate', '`facultyprofile_labHrs_graduate`', 5, -1, FALSE, '`facultyprofile_labHrs_graduate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_labHrs_graduate->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_labHrs_graduate'] =& $this->facultyprofile_labHrs_graduate;

		// facultyprofile_lecHrs_graduate
		$this->facultyprofile_lecHrs_graduate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_lecHrs_graduate', 'facultyprofile_lecHrs_graduate', '`facultyprofile_lecHrs_graduate`', 5, -1, FALSE, '`facultyprofile_lecHrs_graduate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_lecHrs_graduate->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_lecHrs_graduate'] =& $this->facultyprofile_lecHrs_graduate;

		// facultyprofile_mixedLabLecHrs_graduate
		$this->facultyprofile_mixedLabLecHrs_graduate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_mixedLabLecHrs_graduate', 'facultyprofile_mixedLabLecHrs_graduate', '`facultyprofile_mixedLabLecHrs_graduate`', 5, -1, FALSE, '`facultyprofile_mixedLabLecHrs_graduate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_mixedLabLecHrs_graduate->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_mixedLabLecHrs_graduate'] =& $this->facultyprofile_mixedLabLecHrs_graduate;

		// facultyprofile_totalHrs_graduate
		$this->facultyprofile_totalHrs_graduate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_totalHrs_graduate', 'facultyprofile_totalHrs_graduate', '`facultyprofile_totalHrs_graduate`', 5, -1, FALSE, '`facultyprofile_totalHrs_graduate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_totalHrs_graduate->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_totalHrs_graduate'] =& $this->facultyprofile_totalHrs_graduate;

		// facultyprofile_labSCH_graduate
		$this->facultyprofile_labSCH_graduate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_labSCH_graduate', 'facultyprofile_labSCH_graduate', '`facultyprofile_labSCH_graduate`', 5, -1, FALSE, '`facultyprofile_labSCH_graduate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_labSCH_graduate->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_labSCH_graduate'] =& $this->facultyprofile_labSCH_graduate;

		// facultyprofile_lecSCH_graduate
		$this->facultyprofile_lecSCH_graduate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_lecSCH_graduate', 'facultyprofile_lecSCH_graduate', '`facultyprofile_lecSCH_graduate`', 5, -1, FALSE, '`facultyprofile_lecSCH_graduate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_lecSCH_graduate->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_lecSCH_graduate'] =& $this->facultyprofile_lecSCH_graduate;

		// facultyprofile_mixedLabLecSCH_graduate
		$this->facultyprofile_mixedLabLecSCH_graduate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_mixedLabLecSCH_graduate', 'facultyprofile_mixedLabLecSCH_graduate', '`facultyprofile_mixedLabLecSCH_graduate`', 5, -1, FALSE, '`facultyprofile_mixedLabLecSCH_graduate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_mixedLabLecSCH_graduate->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_mixedLabLecSCH_graduate'] =& $this->facultyprofile_mixedLabLecSCH_graduate;

		// facultyprofile_totalSCH_graduate
		$this->facultyprofile_totalSCH_graduate = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_totalSCH_graduate', 'facultyprofile_totalSCH_graduate', '`facultyprofile_totalSCH_graduate`', 5, -1, FALSE, '`facultyprofile_totalSCH_graduate`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_totalSCH_graduate->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_totalSCH_graduate'] =& $this->facultyprofile_totalSCH_graduate;

		// facultyprofile_researchLoad
		$this->facultyprofile_researchLoad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_researchLoad', 'facultyprofile_researchLoad', '`facultyprofile_researchLoad`', 5, -1, FALSE, '`facultyprofile_researchLoad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_researchLoad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_researchLoad'] =& $this->facultyprofile_researchLoad;

		// facultyprofile_extensionServicesLoad
		$this->facultyprofile_extensionServicesLoad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_extensionServicesLoad', 'facultyprofile_extensionServicesLoad', '`facultyprofile_extensionServicesLoad`', 5, -1, FALSE, '`facultyprofile_extensionServicesLoad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_extensionServicesLoad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_extensionServicesLoad'] =& $this->facultyprofile_extensionServicesLoad;

		// facultyprofile_studyLoad
		$this->facultyprofile_studyLoad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_studyLoad', 'facultyprofile_studyLoad', '`facultyprofile_studyLoad`', 5, -1, FALSE, '`facultyprofile_studyLoad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_studyLoad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_studyLoad'] =& $this->facultyprofile_studyLoad;

		// facultyprofile_forProductionLoad
		$this->facultyprofile_forProductionLoad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_forProductionLoad', 'facultyprofile_forProductionLoad', '`facultyprofile_forProductionLoad`', 5, -1, FALSE, '`facultyprofile_forProductionLoad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_forProductionLoad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_forProductionLoad'] =& $this->facultyprofile_forProductionLoad;

		// facultyprofile_administrativeLoad
		$this->facultyprofile_administrativeLoad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_administrativeLoad', 'facultyprofile_administrativeLoad', '`facultyprofile_administrativeLoad`', 5, -1, FALSE, '`facultyprofile_administrativeLoad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_administrativeLoad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_administrativeLoad'] =& $this->facultyprofile_administrativeLoad;

		// facultyprofile_otherLoadCredits
		$this->facultyprofile_otherLoadCredits = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_otherLoadCredits', 'facultyprofile_otherLoadCredits', '`facultyprofile_otherLoadCredits`', 5, -1, FALSE, '`facultyprofile_otherLoadCredits`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_otherLoadCredits->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_otherLoadCredits'] =& $this->facultyprofile_otherLoadCredits;

		// facultyprofile_total_nonTeachingLoad
		$this->facultyprofile_total_nonTeachingLoad = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_total_nonTeachingLoad', 'facultyprofile_total_nonTeachingLoad', '`facultyprofile_total_nonTeachingLoad`', 5, -1, FALSE, '`facultyprofile_total_nonTeachingLoad`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_total_nonTeachingLoad->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_total_nonTeachingLoad'] =& $this->facultyprofile_total_nonTeachingLoad;

		// facultyprofile_totalWorkloadInCreditUnits_gen
		$this->facultyprofile_totalWorkloadInCreditUnits_gen = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_totalWorkloadInCreditUnits_gen', 'facultyprofile_totalWorkloadInCreditUnits_gen', '`facultyprofile_totalWorkloadInCreditUnits_gen`', 5, -1, FALSE, '`facultyprofile_totalWorkloadInCreditUnits_gen`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->facultyprofile_totalWorkloadInCreditUnits_gen->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['facultyprofile_totalWorkloadInCreditUnits_gen'] =& $this->facultyprofile_totalWorkloadInCreditUnits_gen;

		// facultyprofile_remarks
		$this->facultyprofile_remarks = new cField('view_tbl_profile_admin', 'view_tbl_profile_admin', 'x_facultyprofile_remarks', 'facultyprofile_remarks', '`facultyprofile_remarks`', 200, -1, FALSE, '`facultyprofile_remarks`', FALSE, FALSE, 'FORMATTED TEXT');
		$this->fields['facultyprofile_remarks'] =& $this->facultyprofile_remarks;
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
		return "view_tbl_profile_admin_Highlight";
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
		if ($this->getCurrentMasterTable() == "view_tbl_collectionperiod_admin") {
			if ($this->collectionPeriod_ID->getSessionValue() <> "")
				$sMasterFilter .= "`collectionPeriod_ID`=" . up_QuotedValue($this->collectionPeriod_ID->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sMasterFilter;
	}

	// Session detail WHERE clause
	function getDetailFilter() {

		// Detail filter
		$sDetailFilter = "";
		if ($this->getCurrentMasterTable() == "view_tbl_collectionperiod_admin") {
			if ($this->collectionPeriod_ID->getSessionValue() <> "")
				$sDetailFilter .= "`collectionPeriod_ID`=" . up_QuotedValue($this->collectionPeriod_ID->getSessionValue(), UP_DATATYPE_NUMBER);
			else
				return "";
		}
		return $sDetailFilter;
	}

	// Master filter
	function SqlMasterFilter_view_tbl_collectionperiod_admin() {
		return "`collectionPeriod_ID`=@collectionPeriod_ID@";
	}

	// Detail filter
	function SqlDetailFilter_view_tbl_collectionperiod_admin() {
		return "`collectionPeriod_ID`=@collectionPeriod_ID@";
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`view_tbl_profile_admin`";
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
		return "INSERT INTO `view_tbl_profile_admin` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `view_tbl_profile_admin` SET ";
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
		$SQL = "DELETE FROM `view_tbl_profile_admin` WHERE ";
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
			return "view_tbl_profile_adminlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[UP_PROJECT_NAME . "_" . $this->TableVar . "_" . UP_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "view_tbl_profile_adminlist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("view_tbl_profile_adminview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "view_tbl_profile_adminadd.php";

//		$sUrlParm = $this->UrlParm();
//		if ($sUrlParm <> "")
//			$AddUrl .= "?" . $sUrlParm;

		return $AddUrl;
	}

	// Edit URL
	function EditUrl($parm = "") {
		return $this->KeyUrl("view_tbl_profile_adminedit.php", $this->UrlParm($parm));
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl($parm = "") {
		return $this->KeyUrl("view_tbl_profile_adminadd.php", $this->UrlParm($parm));
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(up_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("view_tbl_profile_admindelete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=view_tbl_profile_admin" : "";
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
		$this->facultyprofile_ID->setDbValue($rs->fields('facultyprofile_ID'));
		$this->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$this->faculty_name->setDbValue($rs->fields('faculty_name'));
		$this->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$this->cu->setDbValue($rs->fields('cu'));
		$this->collectionPeriod_ay->setDbValue($rs->fields('collectionPeriod_ay'));
		$this->collectionPeriod_sem->setDbValue($rs->fields('collectionPeriod_sem'));
		$this->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$this->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
		$this->unitID->setDbValue($rs->fields('unitID'));
		$this->facultyprofile_homeUnit_ID->setDbValue($rs->fields('facultyprofile_homeUnit_ID'));
		$this->facultyprofile_isHomeUnit->setDbValue($rs->fields('facultyprofile_isHomeUnit'));
		$this->facultyGroup_CHEDCode->setDbValue($rs->fields('facultyGroup_CHEDCode'));
		$this->facultyRank_ID->setDbValue($rs->fields('facultyRank_ID'));
		$this->facultyprofile_sg->setDbValue($rs->fields('facultyprofile_sg'));
		$this->facultyprofile_annualSalary->setDbValue($rs->fields('facultyprofile_annualSalary'));
		$this->facultyprofile_fte->setDbValue($rs->fields('facultyprofile_fte'));
		$this->facultyprofile_tenureCode->setDbValue($rs->fields('facultyprofile_tenureCode'));
		$this->facultyprofile_leaveCode->setDbValue($rs->fields('facultyprofile_leaveCode'));
		$this->facultyprofile_disCHED_disciplineMajorCode_gen->setDbValue($rs->fields('facultyprofile_disCHED_disciplineMajorCode_gen'));
		$this->disCHED_disciplineCode_gen->setDbValue($rs->fields('disCHED_disciplineCode_gen'));
		$this->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_1_primaryTeachingLoad'));
		$this->facultyprofile_specificDiscipline_2_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_2_primaryTeachingLoad'));
		$this->facultyprofile_labHrs_basic->setDbValue($rs->fields('facultyprofile_labHrs_basic'));
		$this->facultyprofile_lecHrs_basic->setDbValue($rs->fields('facultyprofile_lecHrs_basic'));
		$this->facultyprofile_totalHrs_basic->setDbValue($rs->fields('facultyprofile_totalHrs_basic'));
		$this->facultyprofile_labSCH_basic->setDbValue($rs->fields('facultyprofile_labSCH_basic'));
		$this->facultyprofile_lecSCH_basic->setDbValue($rs->fields('facultyprofile_lecSCH_basic'));
		$this->facultyprofile_totalSCH_basic->setDbValue($rs->fields('facultyprofile_totalSCH_basic'));
		$this->facultyprofile_labCr_ugrad->setDbValue($rs->fields('facultyprofile_labCr_ugrad'));
		$this->facultyprofile_lecCr_ugrad->setDbValue($rs->fields('facultyprofile_lecCr_ugrad'));
		$this->facultyprofile_mixedLabLecCr_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_ugrad'));
		$this->facultyprofile_totalCr_ugrad->setDbValue($rs->fields('facultyprofile_totalCr_ugrad'));
		$this->facultyprofile_labHrs_ugrad->setDbValue($rs->fields('facultyprofile_labHrs_ugrad'));
		$this->facultyprofile_lecHrs_ugrad->setDbValue($rs->fields('facultyprofile_lecHrs_ugrad'));
		$this->facultyprofile_mixedLabLecHrs_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_ugrad'));
		$this->facultyprofile_totalHrs_ugrad->setDbValue($rs->fields('facultyprofile_totalHrs_ugrad'));
		$this->facultyprofile_labSCH_ugrad->setDbValue($rs->fields('facultyprofile_labSCH_ugrad'));
		$this->facultyprofile_lecSCH_ugrad->setDbValue($rs->fields('facultyprofile_lecSCH_ugrad'));
		$this->facultyprofile_mixedLabLecSCH_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_ugrad'));
		$this->facultyprofile_totalSCH_ugrad->setDbValue($rs->fields('facultyprofile_totalSCH_ugrad'));
		$this->facultyprofile_labCr_graduate->setDbValue($rs->fields('facultyprofile_labCr_graduate'));
		$this->facultyprofile_lecCr_graduate->setDbValue($rs->fields('facultyprofile_lecCr_graduate'));
		$this->facultyprofile_mixedLabLecCr_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_graduate'));
		$this->facultyprofile_totalCr_graduate->setDbValue($rs->fields('facultyprofile_totalCr_graduate'));
		$this->facultyprofile_labHrs_graduate->setDbValue($rs->fields('facultyprofile_labHrs_graduate'));
		$this->facultyprofile_lecHrs_graduate->setDbValue($rs->fields('facultyprofile_lecHrs_graduate'));
		$this->facultyprofile_mixedLabLecHrs_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_graduate'));
		$this->facultyprofile_totalHrs_graduate->setDbValue($rs->fields('facultyprofile_totalHrs_graduate'));
		$this->facultyprofile_labSCH_graduate->setDbValue($rs->fields('facultyprofile_labSCH_graduate'));
		$this->facultyprofile_lecSCH_graduate->setDbValue($rs->fields('facultyprofile_lecSCH_graduate'));
		$this->facultyprofile_mixedLabLecSCH_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_graduate'));
		$this->facultyprofile_totalSCH_graduate->setDbValue($rs->fields('facultyprofile_totalSCH_graduate'));
		$this->facultyprofile_researchLoad->setDbValue($rs->fields('facultyprofile_researchLoad'));
		$this->facultyprofile_extensionServicesLoad->setDbValue($rs->fields('facultyprofile_extensionServicesLoad'));
		$this->facultyprofile_studyLoad->setDbValue($rs->fields('facultyprofile_studyLoad'));
		$this->facultyprofile_forProductionLoad->setDbValue($rs->fields('facultyprofile_forProductionLoad'));
		$this->facultyprofile_administrativeLoad->setDbValue($rs->fields('facultyprofile_administrativeLoad'));
		$this->facultyprofile_otherLoadCredits->setDbValue($rs->fields('facultyprofile_otherLoadCredits'));
		$this->facultyprofile_total_nonTeachingLoad->setDbValue($rs->fields('facultyprofile_total_nonTeachingLoad'));
		$this->facultyprofile_totalWorkloadInCreditUnits_gen->setDbValue($rs->fields('facultyprofile_totalWorkloadInCreditUnits_gen'));
		$this->facultyprofile_remarks->setDbValue($rs->fields('facultyprofile_remarks'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// facultyprofile_ID

		$this->facultyprofile_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_ID
		$this->faculty_ID->CellCssStyle = "white-space: nowrap;";

		// faculty_name
		$this->faculty_name->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ID
		$this->collectionPeriod_ID->CellCssStyle = "white-space: nowrap;";

		// cu
		$this->cu->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_ay
		$this->collectionPeriod_ay->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_sem
		$this->collectionPeriod_sem->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_cutOffDate
		$this->collectionPeriod_cutOffDate->CellCssStyle = "white-space: nowrap;";

		// collectionPeriod_status
		$this->collectionPeriod_status->CellCssStyle = "white-space: nowrap;";

		// unitID
		$this->unitID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_homeUnit_ID
		$this->facultyprofile_homeUnit_ID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_isHomeUnit
		$this->facultyprofile_isHomeUnit->CellCssStyle = "white-space: nowrap;";

		// facultyGroup_CHEDCode
		$this->facultyGroup_CHEDCode->CellCssStyle = "white-space: nowrap;";

		// facultyRank_ID
		$this->facultyRank_ID->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_sg
		$this->facultyprofile_sg->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_annualSalary
		$this->facultyprofile_annualSalary->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_fte
		$this->facultyprofile_fte->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_tenureCode
		$this->facultyprofile_tenureCode->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_leaveCode
		$this->facultyprofile_leaveCode->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_disCHED_disciplineMajorCode_gen
		$this->facultyprofile_disCHED_disciplineMajorCode_gen->CellCssStyle = "white-space: nowrap;";

		// disCHED_disciplineCode_gen
		$this->disCHED_disciplineCode_gen->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_specificDiscipline_1_primaryTeachingLoad
		$this->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_specificDiscipline_2_primaryTeachingLoad
		$this->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_basic
		$this->facultyprofile_labHrs_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_basic
		$this->facultyprofile_lecHrs_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_basic
		// facultyprofile_labSCH_basic

		$this->facultyprofile_labSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_basic
		$this->facultyprofile_lecSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_basic
		$this->facultyprofile_totalSCH_basic->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labCr_ugrad
		$this->facultyprofile_labCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecCr_ugrad
		$this->facultyprofile_lecCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecCr_ugrad
		$this->facultyprofile_mixedLabLecCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalCr_ugrad
		$this->facultyprofile_totalCr_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_ugrad
		$this->facultyprofile_labHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_ugrad
		$this->facultyprofile_lecHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecHrs_ugrad
		$this->facultyprofile_mixedLabLecHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_ugrad
		$this->facultyprofile_totalHrs_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labSCH_ugrad
		$this->facultyprofile_labSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_ugrad
		$this->facultyprofile_lecSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecSCH_ugrad
		$this->facultyprofile_mixedLabLecSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_ugrad
		$this->facultyprofile_totalSCH_ugrad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labCr_graduate
		$this->facultyprofile_labCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecCr_graduate
		$this->facultyprofile_lecCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecCr_graduate
		$this->facultyprofile_mixedLabLecCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalCr_graduate
		$this->facultyprofile_totalCr_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labHrs_graduate
		$this->facultyprofile_labHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecHrs_graduate
		$this->facultyprofile_lecHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecHrs_graduate
		$this->facultyprofile_mixedLabLecHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalHrs_graduate
		$this->facultyprofile_totalHrs_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_labSCH_graduate
		$this->facultyprofile_labSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_lecSCH_graduate
		$this->facultyprofile_lecSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_mixedLabLecSCH_graduate
		$this->facultyprofile_mixedLabLecSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalSCH_graduate
		$this->facultyprofile_totalSCH_graduate->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_researchLoad
		$this->facultyprofile_researchLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_extensionServicesLoad
		$this->facultyprofile_extensionServicesLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_studyLoad
		$this->facultyprofile_studyLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_forProductionLoad
		$this->facultyprofile_forProductionLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_administrativeLoad
		$this->facultyprofile_administrativeLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_otherLoadCredits
		$this->facultyprofile_otherLoadCredits->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_total_nonTeachingLoad
		$this->facultyprofile_total_nonTeachingLoad->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_totalWorkloadInCreditUnits_gen
		$this->facultyprofile_totalWorkloadInCreditUnits_gen->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_remarks
		$this->facultyprofile_remarks->CellCssStyle = "white-space: nowrap;";

		// facultyprofile_ID
		$this->facultyprofile_ID->ViewValue = $this->facultyprofile_ID->CurrentValue;
		$this->facultyprofile_ID->ViewCustomAttributes = "";

		// faculty_ID
		$this->faculty_ID->ViewValue = $this->faculty_ID->CurrentValue;
		if (strval($this->faculty_ID->CurrentValue) <> "") {
			$sFilterWrk = "`faculty_ID` = " . up_AdjustSql($this->faculty_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `faculty_name` FROM `tbl_faculty`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
		$sSqlWrk .= " ORDER BY `faculty_name` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->faculty_ID->ViewValue = $rswrk->fields('faculty_name');
				$rswrk->Close();
			} else {
				$this->faculty_ID->ViewValue = $this->faculty_ID->CurrentValue;
			}
		} else {
			$this->faculty_ID->ViewValue = NULL;
		}
		$this->faculty_ID->ViewCustomAttributes = "";

		// faculty_name
		$this->faculty_name->ViewValue = $this->faculty_name->CurrentValue;
		$this->faculty_name->ViewCustomAttributes = "";

		// collectionPeriod_ID
		$this->collectionPeriod_ID->ViewValue = $this->collectionPeriod_ID->CurrentValue;
		$this->collectionPeriod_ID->ViewCustomAttributes = "";

		// cu
		$this->cu->ViewValue = $this->cu->CurrentValue;
		$this->cu->ViewCustomAttributes = "";

		// collectionPeriod_ay
		$this->collectionPeriod_ay->ViewValue = $this->collectionPeriod_ay->CurrentValue;
		$this->collectionPeriod_ay->ViewCustomAttributes = "";

		// collectionPeriod_sem
		$this->collectionPeriod_sem->ViewValue = $this->collectionPeriod_sem->CurrentValue;
		$this->collectionPeriod_sem->ViewCustomAttributes = "";

		// collectionPeriod_cutOffDate
		$this->collectionPeriod_cutOffDate->ViewValue = $this->collectionPeriod_cutOffDate->CurrentValue;
		$this->collectionPeriod_cutOffDate->ViewValue = up_FormatDateTime($this->collectionPeriod_cutOffDate->ViewValue, 6);
		$this->collectionPeriod_cutOffDate->ViewCustomAttributes = "";

		// collectionPeriod_status
		$this->collectionPeriod_status->ViewValue = $this->collectionPeriod_status->CurrentValue;
		$this->collectionPeriod_status->ViewCustomAttributes = "";

		// unitID
		$this->unitID->ViewValue = $this->unitID->CurrentValue;
		$this->unitID->ViewCustomAttributes = "";

		// facultyprofile_homeUnit_ID
		$this->facultyprofile_homeUnit_ID->ViewValue = $this->facultyprofile_homeUnit_ID->CurrentValue;
		$this->facultyprofile_homeUnit_ID->ViewCustomAttributes = "";

		// facultyprofile_isHomeUnit
		if (strval($this->facultyprofile_isHomeUnit->CurrentValue) <> "") {
			switch ($this->facultyprofile_isHomeUnit->CurrentValue) {
				case "Y":
					$this->facultyprofile_isHomeUnit->ViewValue = $this->facultyprofile_isHomeUnit->FldTagCaption(1) <> "" ? $this->facultyprofile_isHomeUnit->FldTagCaption(1) : $this->facultyprofile_isHomeUnit->CurrentValue;
					break;
				case "N":
					$this->facultyprofile_isHomeUnit->ViewValue = $this->facultyprofile_isHomeUnit->FldTagCaption(2) <> "" ? $this->facultyprofile_isHomeUnit->FldTagCaption(2) : $this->facultyprofile_isHomeUnit->CurrentValue;
					break;
				default:
					$this->facultyprofile_isHomeUnit->ViewValue = $this->facultyprofile_isHomeUnit->CurrentValue;
			}
		} else {
			$this->facultyprofile_isHomeUnit->ViewValue = NULL;
		}
		$this->facultyprofile_isHomeUnit->ViewCustomAttributes = "";

		// facultyGroup_CHEDCode
		if (strval($this->facultyGroup_CHEDCode->CurrentValue) <> "") {
			$sFilterWrk = "`facultyGroup_CHEDCode` = '" . up_AdjustSql($this->facultyGroup_CHEDCode->CurrentValue) . "'";
		$sSqlWrk = "SELECT `facultyGroup_description` FROM `ref_facultygroup`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
		$sSqlWrk .= " ORDER BY `facultyGroup_description` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->facultyGroup_CHEDCode->ViewValue = $rswrk->fields('facultyGroup_description');
				$rswrk->Close();
			} else {
				$this->facultyGroup_CHEDCode->ViewValue = $this->facultyGroup_CHEDCode->CurrentValue;
			}
		} else {
			$this->facultyGroup_CHEDCode->ViewValue = NULL;
		}
		$this->facultyGroup_CHEDCode->ViewCustomAttributes = "";

		// facultyRank_ID
		if (strval($this->facultyRank_ID->CurrentValue) <> "") {
			$sFilterWrk = "`facultyRank_ID` = " . up_AdjustSql($this->facultyRank_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `facultyRank_UPRank` FROM `ref_facultyrank`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
		$sSqlWrk .= " ORDER BY `facultyRank_UPRank` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->facultyRank_ID->ViewValue = $rswrk->fields('facultyRank_UPRank');
				$rswrk->Close();
			} else {
				$this->facultyRank_ID->ViewValue = $this->facultyRank_ID->CurrentValue;
			}
		} else {
			$this->facultyRank_ID->ViewValue = NULL;
		}
		$this->facultyRank_ID->ViewCustomAttributes = "";

		// facultyprofile_sg
		$this->facultyprofile_sg->ViewValue = $this->facultyprofile_sg->CurrentValue;
		$this->facultyprofile_sg->ViewCustomAttributes = "";

		// facultyprofile_annualSalary
		$this->facultyprofile_annualSalary->ViewValue = $this->facultyprofile_annualSalary->CurrentValue;
		$this->facultyprofile_annualSalary->ViewCustomAttributes = "";

		// facultyprofile_fte
		$this->facultyprofile_fte->ViewValue = $this->facultyprofile_fte->CurrentValue;
		$this->facultyprofile_fte->ViewCustomAttributes = "";

		// facultyprofile_tenureCode
		if (strval($this->facultyprofile_tenureCode->CurrentValue) <> "") {
			$sFilterWrk = "`tenureCode_ID` = " . up_AdjustSql($this->facultyprofile_tenureCode->CurrentValue) . "";
		$sSqlWrk = "SELECT `tenureCode_description` FROM `ref_tenurecode`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
		$sSqlWrk .= " ORDER BY `tenureCode_description` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->facultyprofile_tenureCode->ViewValue = $rswrk->fields('tenureCode_description');
				$rswrk->Close();
			} else {
				$this->facultyprofile_tenureCode->ViewValue = $this->facultyprofile_tenureCode->CurrentValue;
			}
		} else {
			$this->facultyprofile_tenureCode->ViewValue = NULL;
		}
		$this->facultyprofile_tenureCode->ViewCustomAttributes = "";

		// facultyprofile_leaveCode
		if (strval($this->facultyprofile_leaveCode->CurrentValue) <> "") {
			$sFilterWrk = "`leaveCode_ID` = " . up_AdjustSql($this->facultyprofile_leaveCode->CurrentValue) . "";
		$sSqlWrk = "SELECT `leaveCode_description` FROM `ref_leavecode`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
		$sSqlWrk .= " ORDER BY `leaveCode_description` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->facultyprofile_leaveCode->ViewValue = $rswrk->fields('leaveCode_description');
				$rswrk->Close();
			} else {
				$this->facultyprofile_leaveCode->ViewValue = $this->facultyprofile_leaveCode->CurrentValue;
			}
		} else {
			$this->facultyprofile_leaveCode->ViewValue = NULL;
		}
		$this->facultyprofile_leaveCode->ViewCustomAttributes = "";

		// facultyprofile_disCHED_disciplineMajorCode_gen
		$this->facultyprofile_disCHED_disciplineMajorCode_gen->ViewValue = $this->facultyprofile_disCHED_disciplineMajorCode_gen->CurrentValue;
		$this->facultyprofile_disCHED_disciplineMajorCode_gen->ViewCustomAttributes = "";

		// disCHED_disciplineCode_gen
		$this->disCHED_disciplineCode_gen->ViewValue = $this->disCHED_disciplineCode_gen->CurrentValue;
		$this->disCHED_disciplineCode_gen->ViewCustomAttributes = "";

		// facultyprofile_specificDiscipline_1_primaryTeachingLoad
		$this->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = $this->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue;
		$this->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewCustomAttributes = "";

		// facultyprofile_specificDiscipline_2_primaryTeachingLoad
		$this->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = $this->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue;
		$this->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewCustomAttributes = "";

		// facultyprofile_labHrs_basic
		$this->facultyprofile_labHrs_basic->ViewValue = $this->facultyprofile_labHrs_basic->CurrentValue;
		$this->facultyprofile_labHrs_basic->ViewCustomAttributes = "";

		// facultyprofile_lecHrs_basic
		$this->facultyprofile_lecHrs_basic->ViewValue = $this->facultyprofile_lecHrs_basic->CurrentValue;
		$this->facultyprofile_lecHrs_basic->ViewCustomAttributes = "";

		// facultyprofile_totalHrs_basic
		$this->facultyprofile_totalHrs_basic->ViewValue = $this->facultyprofile_totalHrs_basic->CurrentValue;
		$this->facultyprofile_totalHrs_basic->ViewCustomAttributes = "";

		// facultyprofile_labSCH_basic
		$this->facultyprofile_labSCH_basic->ViewValue = $this->facultyprofile_labSCH_basic->CurrentValue;
		$this->facultyprofile_labSCH_basic->ViewCustomAttributes = "";

		// facultyprofile_lecSCH_basic
		$this->facultyprofile_lecSCH_basic->ViewValue = $this->facultyprofile_lecSCH_basic->CurrentValue;
		$this->facultyprofile_lecSCH_basic->ViewCustomAttributes = "";

		// facultyprofile_totalSCH_basic
		$this->facultyprofile_totalSCH_basic->ViewValue = $this->facultyprofile_totalSCH_basic->CurrentValue;
		$this->facultyprofile_totalSCH_basic->ViewCustomAttributes = "";

		// facultyprofile_labCr_ugrad
		$this->facultyprofile_labCr_ugrad->ViewValue = $this->facultyprofile_labCr_ugrad->CurrentValue;
		$this->facultyprofile_labCr_ugrad->ViewCustomAttributes = "";

		// facultyprofile_lecCr_ugrad
		$this->facultyprofile_lecCr_ugrad->ViewValue = $this->facultyprofile_lecCr_ugrad->CurrentValue;
		$this->facultyprofile_lecCr_ugrad->ViewCustomAttributes = "";

		// facultyprofile_mixedLabLecCr_ugrad
		$this->facultyprofile_mixedLabLecCr_ugrad->ViewValue = $this->facultyprofile_mixedLabLecCr_ugrad->CurrentValue;
		$this->facultyprofile_mixedLabLecCr_ugrad->ViewCustomAttributes = "";

		// facultyprofile_totalCr_ugrad
		$this->facultyprofile_totalCr_ugrad->ViewValue = $this->facultyprofile_totalCr_ugrad->CurrentValue;
		$this->facultyprofile_totalCr_ugrad->ViewCustomAttributes = "";

		// facultyprofile_labHrs_ugrad
		$this->facultyprofile_labHrs_ugrad->ViewValue = $this->facultyprofile_labHrs_ugrad->CurrentValue;
		$this->facultyprofile_labHrs_ugrad->ViewCustomAttributes = "";

		// facultyprofile_lecHrs_ugrad
		$this->facultyprofile_lecHrs_ugrad->ViewValue = $this->facultyprofile_lecHrs_ugrad->CurrentValue;
		$this->facultyprofile_lecHrs_ugrad->ViewCustomAttributes = "";

		// facultyprofile_mixedLabLecHrs_ugrad
		$this->facultyprofile_mixedLabLecHrs_ugrad->ViewValue = $this->facultyprofile_mixedLabLecHrs_ugrad->CurrentValue;
		$this->facultyprofile_mixedLabLecHrs_ugrad->ViewCustomAttributes = "";

		// facultyprofile_totalHrs_ugrad
		$this->facultyprofile_totalHrs_ugrad->ViewValue = $this->facultyprofile_totalHrs_ugrad->CurrentValue;
		$this->facultyprofile_totalHrs_ugrad->ViewCustomAttributes = "";

		// facultyprofile_labSCH_ugrad
		$this->facultyprofile_labSCH_ugrad->ViewValue = $this->facultyprofile_labSCH_ugrad->CurrentValue;
		$this->facultyprofile_labSCH_ugrad->ViewCustomAttributes = "";

		// facultyprofile_lecSCH_ugrad
		$this->facultyprofile_lecSCH_ugrad->ViewValue = $this->facultyprofile_lecSCH_ugrad->CurrentValue;
		$this->facultyprofile_lecSCH_ugrad->ViewCustomAttributes = "";

		// facultyprofile_mixedLabLecSCH_ugrad
		$this->facultyprofile_mixedLabLecSCH_ugrad->ViewValue = $this->facultyprofile_mixedLabLecSCH_ugrad->CurrentValue;
		$this->facultyprofile_mixedLabLecSCH_ugrad->ViewCustomAttributes = "";

		// facultyprofile_totalSCH_ugrad
		$this->facultyprofile_totalSCH_ugrad->ViewValue = $this->facultyprofile_totalSCH_ugrad->CurrentValue;
		$this->facultyprofile_totalSCH_ugrad->ViewCustomAttributes = "";

		// facultyprofile_labCr_graduate
		$this->facultyprofile_labCr_graduate->ViewValue = $this->facultyprofile_labCr_graduate->CurrentValue;
		$this->facultyprofile_labCr_graduate->ViewCustomAttributes = "";

		// facultyprofile_lecCr_graduate
		$this->facultyprofile_lecCr_graduate->ViewValue = $this->facultyprofile_lecCr_graduate->CurrentValue;
		$this->facultyprofile_lecCr_graduate->ViewCustomAttributes = "";

		// facultyprofile_mixedLabLecCr_graduate
		$this->facultyprofile_mixedLabLecCr_graduate->ViewValue = $this->facultyprofile_mixedLabLecCr_graduate->CurrentValue;
		$this->facultyprofile_mixedLabLecCr_graduate->ViewCustomAttributes = "";

		// facultyprofile_totalCr_graduate
		$this->facultyprofile_totalCr_graduate->ViewValue = $this->facultyprofile_totalCr_graduate->CurrentValue;
		$this->facultyprofile_totalCr_graduate->ViewCustomAttributes = "";

		// facultyprofile_labHrs_graduate
		$this->facultyprofile_labHrs_graduate->ViewValue = $this->facultyprofile_labHrs_graduate->CurrentValue;
		$this->facultyprofile_labHrs_graduate->ViewCustomAttributes = "";

		// facultyprofile_lecHrs_graduate
		$this->facultyprofile_lecHrs_graduate->ViewValue = $this->facultyprofile_lecHrs_graduate->CurrentValue;
		$this->facultyprofile_lecHrs_graduate->ViewCustomAttributes = "";

		// facultyprofile_mixedLabLecHrs_graduate
		$this->facultyprofile_mixedLabLecHrs_graduate->ViewValue = $this->facultyprofile_mixedLabLecHrs_graduate->CurrentValue;
		$this->facultyprofile_mixedLabLecHrs_graduate->ViewCustomAttributes = "";

		// facultyprofile_totalHrs_graduate
		$this->facultyprofile_totalHrs_graduate->ViewValue = $this->facultyprofile_totalHrs_graduate->CurrentValue;
		$this->facultyprofile_totalHrs_graduate->ViewCustomAttributes = "";

		// facultyprofile_labSCH_graduate
		$this->facultyprofile_labSCH_graduate->ViewValue = $this->facultyprofile_labSCH_graduate->CurrentValue;
		$this->facultyprofile_labSCH_graduate->ViewCustomAttributes = "";

		// facultyprofile_lecSCH_graduate
		$this->facultyprofile_lecSCH_graduate->ViewValue = $this->facultyprofile_lecSCH_graduate->CurrentValue;
		$this->facultyprofile_lecSCH_graduate->ViewCustomAttributes = "";

		// facultyprofile_mixedLabLecSCH_graduate
		$this->facultyprofile_mixedLabLecSCH_graduate->ViewValue = $this->facultyprofile_mixedLabLecSCH_graduate->CurrentValue;
		$this->facultyprofile_mixedLabLecSCH_graduate->ViewCustomAttributes = "";

		// facultyprofile_totalSCH_graduate
		$this->facultyprofile_totalSCH_graduate->ViewValue = $this->facultyprofile_totalSCH_graduate->CurrentValue;
		$this->facultyprofile_totalSCH_graduate->ViewCustomAttributes = "";

		// facultyprofile_researchLoad
		$this->facultyprofile_researchLoad->ViewValue = $this->facultyprofile_researchLoad->CurrentValue;
		$this->facultyprofile_researchLoad->ViewCustomAttributes = "";

		// facultyprofile_extensionServicesLoad
		$this->facultyprofile_extensionServicesLoad->ViewValue = $this->facultyprofile_extensionServicesLoad->CurrentValue;
		$this->facultyprofile_extensionServicesLoad->ViewCustomAttributes = "";

		// facultyprofile_studyLoad
		$this->facultyprofile_studyLoad->ViewValue = $this->facultyprofile_studyLoad->CurrentValue;
		$this->facultyprofile_studyLoad->ViewCustomAttributes = "";

		// facultyprofile_forProductionLoad
		$this->facultyprofile_forProductionLoad->ViewValue = $this->facultyprofile_forProductionLoad->CurrentValue;
		$this->facultyprofile_forProductionLoad->ViewCustomAttributes = "";

		// facultyprofile_administrativeLoad
		$this->facultyprofile_administrativeLoad->ViewValue = $this->facultyprofile_administrativeLoad->CurrentValue;
		$this->facultyprofile_administrativeLoad->ViewCustomAttributes = "";

		// facultyprofile_otherLoadCredits
		$this->facultyprofile_otherLoadCredits->ViewValue = $this->facultyprofile_otherLoadCredits->CurrentValue;
		$this->facultyprofile_otherLoadCredits->ViewCustomAttributes = "";

		// facultyprofile_total_nonTeachingLoad
		$this->facultyprofile_total_nonTeachingLoad->ViewValue = $this->facultyprofile_total_nonTeachingLoad->CurrentValue;
		$this->facultyprofile_total_nonTeachingLoad->ViewCustomAttributes = "";

		// facultyprofile_totalWorkloadInCreditUnits_gen
		$this->facultyprofile_totalWorkloadInCreditUnits_gen->ViewValue = $this->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue;
		$this->facultyprofile_totalWorkloadInCreditUnits_gen->ViewCustomAttributes = "";

		// facultyprofile_remarks
		$this->facultyprofile_remarks->ViewValue = $this->facultyprofile_remarks->CurrentValue;
		$this->facultyprofile_remarks->ViewCustomAttributes = "";

		// facultyprofile_ID
		$this->facultyprofile_ID->LinkCustomAttributes = "";
		$this->facultyprofile_ID->HrefValue = "";
		$this->facultyprofile_ID->TooltipValue = "";

		// faculty_ID
		$this->faculty_ID->LinkCustomAttributes = "";
		$this->faculty_ID->HrefValue = "";
		$this->faculty_ID->TooltipValue = "";

		// faculty_name
		$this->faculty_name->LinkCustomAttributes = "";
		$this->faculty_name->HrefValue = "";
		$this->faculty_name->TooltipValue = "";

		// collectionPeriod_ID
		$this->collectionPeriod_ID->LinkCustomAttributes = "";
		$this->collectionPeriod_ID->HrefValue = "";
		$this->collectionPeriod_ID->TooltipValue = "";

		// cu
		$this->cu->LinkCustomAttributes = "";
		$this->cu->HrefValue = "";
		$this->cu->TooltipValue = "";

		// collectionPeriod_ay
		$this->collectionPeriod_ay->LinkCustomAttributes = "";
		$this->collectionPeriod_ay->HrefValue = "";
		$this->collectionPeriod_ay->TooltipValue = "";

		// collectionPeriod_sem
		$this->collectionPeriod_sem->LinkCustomAttributes = "";
		$this->collectionPeriod_sem->HrefValue = "";
		$this->collectionPeriod_sem->TooltipValue = "";

		// collectionPeriod_cutOffDate
		$this->collectionPeriod_cutOffDate->LinkCustomAttributes = "";
		$this->collectionPeriod_cutOffDate->HrefValue = "";
		$this->collectionPeriod_cutOffDate->TooltipValue = "";

		// collectionPeriod_status
		$this->collectionPeriod_status->LinkCustomAttributes = "";
		$this->collectionPeriod_status->HrefValue = "";
		$this->collectionPeriod_status->TooltipValue = "";

		// unitID
		$this->unitID->LinkCustomAttributes = "";
		$this->unitID->HrefValue = "";
		$this->unitID->TooltipValue = "";

		// facultyprofile_homeUnit_ID
		$this->facultyprofile_homeUnit_ID->LinkCustomAttributes = "";
		$this->facultyprofile_homeUnit_ID->HrefValue = "";
		$this->facultyprofile_homeUnit_ID->TooltipValue = "";

		// facultyprofile_isHomeUnit
		$this->facultyprofile_isHomeUnit->LinkCustomAttributes = "";
		$this->facultyprofile_isHomeUnit->HrefValue = "";
		$this->facultyprofile_isHomeUnit->TooltipValue = "";

		// facultyGroup_CHEDCode
		$this->facultyGroup_CHEDCode->LinkCustomAttributes = "";
		$this->facultyGroup_CHEDCode->HrefValue = "";
		$this->facultyGroup_CHEDCode->TooltipValue = "";

		// facultyRank_ID
		$this->facultyRank_ID->LinkCustomAttributes = "";
		$this->facultyRank_ID->HrefValue = "";
		$this->facultyRank_ID->TooltipValue = "";

		// facultyprofile_sg
		$this->facultyprofile_sg->LinkCustomAttributes = "";
		$this->facultyprofile_sg->HrefValue = "";
		$this->facultyprofile_sg->TooltipValue = "";

		// facultyprofile_annualSalary
		$this->facultyprofile_annualSalary->LinkCustomAttributes = "";
		$this->facultyprofile_annualSalary->HrefValue = "";
		$this->facultyprofile_annualSalary->TooltipValue = "";

		// facultyprofile_fte
		$this->facultyprofile_fte->LinkCustomAttributes = "";
		$this->facultyprofile_fte->HrefValue = "";
		$this->facultyprofile_fte->TooltipValue = "";

		// facultyprofile_tenureCode
		$this->facultyprofile_tenureCode->LinkCustomAttributes = "";
		$this->facultyprofile_tenureCode->HrefValue = "";
		$this->facultyprofile_tenureCode->TooltipValue = "";

		// facultyprofile_leaveCode
		$this->facultyprofile_leaveCode->LinkCustomAttributes = "";
		$this->facultyprofile_leaveCode->HrefValue = "";
		$this->facultyprofile_leaveCode->TooltipValue = "";

		// facultyprofile_disCHED_disciplineMajorCode_gen
		$this->facultyprofile_disCHED_disciplineMajorCode_gen->LinkCustomAttributes = "";
		$this->facultyprofile_disCHED_disciplineMajorCode_gen->HrefValue = "";
		$this->facultyprofile_disCHED_disciplineMajorCode_gen->TooltipValue = "";

		// disCHED_disciplineCode_gen
		$this->disCHED_disciplineCode_gen->LinkCustomAttributes = "";
		$this->disCHED_disciplineCode_gen->HrefValue = "";
		$this->disCHED_disciplineCode_gen->TooltipValue = "";

		// facultyprofile_specificDiscipline_1_primaryTeachingLoad
		$this->facultyprofile_specificDiscipline_1_primaryTeachingLoad->LinkCustomAttributes = "";
		$this->facultyprofile_specificDiscipline_1_primaryTeachingLoad->HrefValue = "";
		$this->facultyprofile_specificDiscipline_1_primaryTeachingLoad->TooltipValue = "";

		// facultyprofile_specificDiscipline_2_primaryTeachingLoad
		$this->facultyprofile_specificDiscipline_2_primaryTeachingLoad->LinkCustomAttributes = "";
		$this->facultyprofile_specificDiscipline_2_primaryTeachingLoad->HrefValue = "";
		$this->facultyprofile_specificDiscipline_2_primaryTeachingLoad->TooltipValue = "";

		// facultyprofile_labHrs_basic
		$this->facultyprofile_labHrs_basic->LinkCustomAttributes = "";
		$this->facultyprofile_labHrs_basic->HrefValue = "";
		$this->facultyprofile_labHrs_basic->TooltipValue = "";

		// facultyprofile_lecHrs_basic
		$this->facultyprofile_lecHrs_basic->LinkCustomAttributes = "";
		$this->facultyprofile_lecHrs_basic->HrefValue = "";
		$this->facultyprofile_lecHrs_basic->TooltipValue = "";

		// facultyprofile_totalHrs_basic
		$this->facultyprofile_totalHrs_basic->LinkCustomAttributes = "";
		$this->facultyprofile_totalHrs_basic->HrefValue = "";
		$this->facultyprofile_totalHrs_basic->TooltipValue = "";

		// facultyprofile_labSCH_basic
		$this->facultyprofile_labSCH_basic->LinkCustomAttributes = "";
		$this->facultyprofile_labSCH_basic->HrefValue = "";
		$this->facultyprofile_labSCH_basic->TooltipValue = "";

		// facultyprofile_lecSCH_basic
		$this->facultyprofile_lecSCH_basic->LinkCustomAttributes = "";
		$this->facultyprofile_lecSCH_basic->HrefValue = "";
		$this->facultyprofile_lecSCH_basic->TooltipValue = "";

		// facultyprofile_totalSCH_basic
		$this->facultyprofile_totalSCH_basic->LinkCustomAttributes = "";
		$this->facultyprofile_totalSCH_basic->HrefValue = "";
		$this->facultyprofile_totalSCH_basic->TooltipValue = "";

		// facultyprofile_labCr_ugrad
		$this->facultyprofile_labCr_ugrad->LinkCustomAttributes = "";
		$this->facultyprofile_labCr_ugrad->HrefValue = "";
		$this->facultyprofile_labCr_ugrad->TooltipValue = "";

		// facultyprofile_lecCr_ugrad
		$this->facultyprofile_lecCr_ugrad->LinkCustomAttributes = "";
		$this->facultyprofile_lecCr_ugrad->HrefValue = "";
		$this->facultyprofile_lecCr_ugrad->TooltipValue = "";

		// facultyprofile_mixedLabLecCr_ugrad
		$this->facultyprofile_mixedLabLecCr_ugrad->LinkCustomAttributes = "";
		$this->facultyprofile_mixedLabLecCr_ugrad->HrefValue = "";
		$this->facultyprofile_mixedLabLecCr_ugrad->TooltipValue = "";

		// facultyprofile_totalCr_ugrad
		$this->facultyprofile_totalCr_ugrad->LinkCustomAttributes = "";
		$this->facultyprofile_totalCr_ugrad->HrefValue = "";
		$this->facultyprofile_totalCr_ugrad->TooltipValue = "";

		// facultyprofile_labHrs_ugrad
		$this->facultyprofile_labHrs_ugrad->LinkCustomAttributes = "";
		$this->facultyprofile_labHrs_ugrad->HrefValue = "";
		$this->facultyprofile_labHrs_ugrad->TooltipValue = "";

		// facultyprofile_lecHrs_ugrad
		$this->facultyprofile_lecHrs_ugrad->LinkCustomAttributes = "";
		$this->facultyprofile_lecHrs_ugrad->HrefValue = "";
		$this->facultyprofile_lecHrs_ugrad->TooltipValue = "";

		// facultyprofile_mixedLabLecHrs_ugrad
		$this->facultyprofile_mixedLabLecHrs_ugrad->LinkCustomAttributes = "";
		$this->facultyprofile_mixedLabLecHrs_ugrad->HrefValue = "";
		$this->facultyprofile_mixedLabLecHrs_ugrad->TooltipValue = "";

		// facultyprofile_totalHrs_ugrad
		$this->facultyprofile_totalHrs_ugrad->LinkCustomAttributes = "";
		$this->facultyprofile_totalHrs_ugrad->HrefValue = "";
		$this->facultyprofile_totalHrs_ugrad->TooltipValue = "";

		// facultyprofile_labSCH_ugrad
		$this->facultyprofile_labSCH_ugrad->LinkCustomAttributes = "";
		$this->facultyprofile_labSCH_ugrad->HrefValue = "";
		$this->facultyprofile_labSCH_ugrad->TooltipValue = "";

		// facultyprofile_lecSCH_ugrad
		$this->facultyprofile_lecSCH_ugrad->LinkCustomAttributes = "";
		$this->facultyprofile_lecSCH_ugrad->HrefValue = "";
		$this->facultyprofile_lecSCH_ugrad->TooltipValue = "";

		// facultyprofile_mixedLabLecSCH_ugrad
		$this->facultyprofile_mixedLabLecSCH_ugrad->LinkCustomAttributes = "";
		$this->facultyprofile_mixedLabLecSCH_ugrad->HrefValue = "";
		$this->facultyprofile_mixedLabLecSCH_ugrad->TooltipValue = "";

		// facultyprofile_totalSCH_ugrad
		$this->facultyprofile_totalSCH_ugrad->LinkCustomAttributes = "";
		$this->facultyprofile_totalSCH_ugrad->HrefValue = "";
		$this->facultyprofile_totalSCH_ugrad->TooltipValue = "";

		// facultyprofile_labCr_graduate
		$this->facultyprofile_labCr_graduate->LinkCustomAttributes = "";
		$this->facultyprofile_labCr_graduate->HrefValue = "";
		$this->facultyprofile_labCr_graduate->TooltipValue = "";

		// facultyprofile_lecCr_graduate
		$this->facultyprofile_lecCr_graduate->LinkCustomAttributes = "";
		$this->facultyprofile_lecCr_graduate->HrefValue = "";
		$this->facultyprofile_lecCr_graduate->TooltipValue = "";

		// facultyprofile_mixedLabLecCr_graduate
		$this->facultyprofile_mixedLabLecCr_graduate->LinkCustomAttributes = "";
		$this->facultyprofile_mixedLabLecCr_graduate->HrefValue = "";
		$this->facultyprofile_mixedLabLecCr_graduate->TooltipValue = "";

		// facultyprofile_totalCr_graduate
		$this->facultyprofile_totalCr_graduate->LinkCustomAttributes = "";
		$this->facultyprofile_totalCr_graduate->HrefValue = "";
		$this->facultyprofile_totalCr_graduate->TooltipValue = "";

		// facultyprofile_labHrs_graduate
		$this->facultyprofile_labHrs_graduate->LinkCustomAttributes = "";
		$this->facultyprofile_labHrs_graduate->HrefValue = "";
		$this->facultyprofile_labHrs_graduate->TooltipValue = "";

		// facultyprofile_lecHrs_graduate
		$this->facultyprofile_lecHrs_graduate->LinkCustomAttributes = "";
		$this->facultyprofile_lecHrs_graduate->HrefValue = "";
		$this->facultyprofile_lecHrs_graduate->TooltipValue = "";

		// facultyprofile_mixedLabLecHrs_graduate
		$this->facultyprofile_mixedLabLecHrs_graduate->LinkCustomAttributes = "";
		$this->facultyprofile_mixedLabLecHrs_graduate->HrefValue = "";
		$this->facultyprofile_mixedLabLecHrs_graduate->TooltipValue = "";

		// facultyprofile_totalHrs_graduate
		$this->facultyprofile_totalHrs_graduate->LinkCustomAttributes = "";
		$this->facultyprofile_totalHrs_graduate->HrefValue = "";
		$this->facultyprofile_totalHrs_graduate->TooltipValue = "";

		// facultyprofile_labSCH_graduate
		$this->facultyprofile_labSCH_graduate->LinkCustomAttributes = "";
		$this->facultyprofile_labSCH_graduate->HrefValue = "";
		$this->facultyprofile_labSCH_graduate->TooltipValue = "";

		// facultyprofile_lecSCH_graduate
		$this->facultyprofile_lecSCH_graduate->LinkCustomAttributes = "";
		$this->facultyprofile_lecSCH_graduate->HrefValue = "";
		$this->facultyprofile_lecSCH_graduate->TooltipValue = "";

		// facultyprofile_mixedLabLecSCH_graduate
		$this->facultyprofile_mixedLabLecSCH_graduate->LinkCustomAttributes = "";
		$this->facultyprofile_mixedLabLecSCH_graduate->HrefValue = "";
		$this->facultyprofile_mixedLabLecSCH_graduate->TooltipValue = "";

		// facultyprofile_totalSCH_graduate
		$this->facultyprofile_totalSCH_graduate->LinkCustomAttributes = "";
		$this->facultyprofile_totalSCH_graduate->HrefValue = "";
		$this->facultyprofile_totalSCH_graduate->TooltipValue = "";

		// facultyprofile_researchLoad
		$this->facultyprofile_researchLoad->LinkCustomAttributes = "";
		$this->facultyprofile_researchLoad->HrefValue = "";
		$this->facultyprofile_researchLoad->TooltipValue = "";

		// facultyprofile_extensionServicesLoad
		$this->facultyprofile_extensionServicesLoad->LinkCustomAttributes = "";
		$this->facultyprofile_extensionServicesLoad->HrefValue = "";
		$this->facultyprofile_extensionServicesLoad->TooltipValue = "";

		// facultyprofile_studyLoad
		$this->facultyprofile_studyLoad->LinkCustomAttributes = "";
		$this->facultyprofile_studyLoad->HrefValue = "";
		$this->facultyprofile_studyLoad->TooltipValue = "";

		// facultyprofile_forProductionLoad
		$this->facultyprofile_forProductionLoad->LinkCustomAttributes = "";
		$this->facultyprofile_forProductionLoad->HrefValue = "";
		$this->facultyprofile_forProductionLoad->TooltipValue = "";

		// facultyprofile_administrativeLoad
		$this->facultyprofile_administrativeLoad->LinkCustomAttributes = "";
		$this->facultyprofile_administrativeLoad->HrefValue = "";
		$this->facultyprofile_administrativeLoad->TooltipValue = "";

		// facultyprofile_otherLoadCredits
		$this->facultyprofile_otherLoadCredits->LinkCustomAttributes = "";
		$this->facultyprofile_otherLoadCredits->HrefValue = "";
		$this->facultyprofile_otherLoadCredits->TooltipValue = "";

		// facultyprofile_total_nonTeachingLoad
		$this->facultyprofile_total_nonTeachingLoad->LinkCustomAttributes = "";
		$this->facultyprofile_total_nonTeachingLoad->HrefValue = "";
		$this->facultyprofile_total_nonTeachingLoad->TooltipValue = "";

		// facultyprofile_totalWorkloadInCreditUnits_gen
		$this->facultyprofile_totalWorkloadInCreditUnits_gen->LinkCustomAttributes = "";
		$this->facultyprofile_totalWorkloadInCreditUnits_gen->HrefValue = "";
		$this->facultyprofile_totalWorkloadInCreditUnits_gen->TooltipValue = "";

		// facultyprofile_remarks
		$this->facultyprofile_remarks->LinkCustomAttributes = "";
		$this->facultyprofile_remarks->HrefValue = "";
		$this->facultyprofile_remarks->TooltipValue = "";

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
					$XmlDoc->AddField('facultyprofile_isHomeUnit', $this->facultyprofile_isHomeUnit->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyGroup_CHEDCode', $this->facultyGroup_CHEDCode->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_ID', $this->facultyRank_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_tenureCode', $this->facultyprofile_tenureCode->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_leaveCode', $this->facultyprofile_leaveCode->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_specificDiscipline_1_primaryTeachingLoad', $this->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_specificDiscipline_2_primaryTeachingLoad', $this->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labHrs_basic', $this->facultyprofile_labHrs_basic->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecHrs_basic', $this->facultyprofile_lecHrs_basic->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labSCH_basic', $this->facultyprofile_labSCH_basic->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecSCH_basic', $this->facultyprofile_lecSCH_basic->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labCr_ugrad', $this->facultyprofile_labCr_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecCr_ugrad', $this->facultyprofile_lecCr_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_mixedLabLecCr_ugrad', $this->facultyprofile_mixedLabLecCr_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labHrs_ugrad', $this->facultyprofile_labHrs_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecHrs_ugrad', $this->facultyprofile_lecHrs_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_mixedLabLecHrs_ugrad', $this->facultyprofile_mixedLabLecHrs_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labSCH_ugrad', $this->facultyprofile_labSCH_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecSCH_ugrad', $this->facultyprofile_lecSCH_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_mixedLabLecSCH_ugrad', $this->facultyprofile_mixedLabLecSCH_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labCr_graduate', $this->facultyprofile_labCr_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecCr_graduate', $this->facultyprofile_lecCr_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_mixedLabLecCr_graduate', $this->facultyprofile_mixedLabLecCr_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labHrs_graduate', $this->facultyprofile_labHrs_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecHrs_graduate', $this->facultyprofile_lecHrs_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_mixedLabLecHrs_graduate', $this->facultyprofile_mixedLabLecHrs_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labSCH_graduate', $this->facultyprofile_labSCH_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecSCH_graduate', $this->facultyprofile_lecSCH_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_mixedLabLecSCH_graduate', $this->facultyprofile_mixedLabLecSCH_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_researchLoad', $this->facultyprofile_researchLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_extensionServicesLoad', $this->facultyprofile_extensionServicesLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_studyLoad', $this->facultyprofile_studyLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_forProductionLoad', $this->facultyprofile_forProductionLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_administrativeLoad', $this->facultyprofile_administrativeLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_otherLoadCredits', $this->facultyprofile_otherLoadCredits->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_remarks', $this->facultyprofile_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
				} else {
					$XmlDoc->AddField('faculty_name', $this->faculty_name->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyGroup_CHEDCode', $this->facultyGroup_CHEDCode->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyRank_ID', $this->facultyRank_ID->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_sg', $this->facultyprofile_sg->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_annualSalary', $this->facultyprofile_annualSalary->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_tenureCode', $this->facultyprofile_tenureCode->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_leaveCode', $this->facultyprofile_leaveCode->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_specificDiscipline_1_primaryTeachingLoad', $this->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_specificDiscipline_2_primaryTeachingLoad', $this->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labHrs_basic', $this->facultyprofile_labHrs_basic->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecHrs_basic', $this->facultyprofile_lecHrs_basic->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_totalHrs_basic', $this->facultyprofile_totalHrs_basic->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labSCH_basic', $this->facultyprofile_labSCH_basic->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecSCH_basic', $this->facultyprofile_lecSCH_basic->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_totalSCH_basic', $this->facultyprofile_totalSCH_basic->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labCr_ugrad', $this->facultyprofile_labCr_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecCr_ugrad', $this->facultyprofile_lecCr_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_mixedLabLecCr_ugrad', $this->facultyprofile_mixedLabLecCr_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_totalCr_ugrad', $this->facultyprofile_totalCr_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labHrs_ugrad', $this->facultyprofile_labHrs_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecHrs_ugrad', $this->facultyprofile_lecHrs_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_mixedLabLecHrs_ugrad', $this->facultyprofile_mixedLabLecHrs_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_totalHrs_ugrad', $this->facultyprofile_totalHrs_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labSCH_ugrad', $this->facultyprofile_labSCH_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecSCH_ugrad', $this->facultyprofile_lecSCH_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_mixedLabLecSCH_ugrad', $this->facultyprofile_mixedLabLecSCH_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_totalSCH_ugrad', $this->facultyprofile_totalSCH_ugrad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labCr_graduate', $this->facultyprofile_labCr_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecCr_graduate', $this->facultyprofile_lecCr_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_mixedLabLecCr_graduate', $this->facultyprofile_mixedLabLecCr_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_totalCr_graduate', $this->facultyprofile_totalCr_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labHrs_graduate', $this->facultyprofile_labHrs_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecHrs_graduate', $this->facultyprofile_lecHrs_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_mixedLabLecHrs_graduate', $this->facultyprofile_mixedLabLecHrs_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_totalHrs_graduate', $this->facultyprofile_totalHrs_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_labSCH_graduate', $this->facultyprofile_labSCH_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_lecSCH_graduate', $this->facultyprofile_lecSCH_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_mixedLabLecSCH_graduate', $this->facultyprofile_mixedLabLecSCH_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_totalSCH_graduate', $this->facultyprofile_totalSCH_graduate->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_researchLoad', $this->facultyprofile_researchLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_extensionServicesLoad', $this->facultyprofile_extensionServicesLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_studyLoad', $this->facultyprofile_studyLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_forProductionLoad', $this->facultyprofile_forProductionLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_administrativeLoad', $this->facultyprofile_administrativeLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_otherLoadCredits', $this->facultyprofile_otherLoadCredits->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_total_nonTeachingLoad', $this->facultyprofile_total_nonTeachingLoad->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_totalWorkloadInCreditUnits_gen', $this->facultyprofile_totalWorkloadInCreditUnits_gen->ExportValue($this->Export, $this->ExportOriginalValue));
					$XmlDoc->AddField('facultyprofile_remarks', $this->facultyprofile_remarks->ExportValue($this->Export, $this->ExportOriginalValue));
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
				$Doc->ExportCaption($this->facultyprofile_isHomeUnit);
				$Doc->ExportCaption($this->facultyGroup_CHEDCode);
				$Doc->ExportCaption($this->facultyRank_ID);
				$Doc->ExportCaption($this->facultyprofile_tenureCode);
				$Doc->ExportCaption($this->facultyprofile_leaveCode);
				$Doc->ExportCaption($this->facultyprofile_specificDiscipline_1_primaryTeachingLoad);
				$Doc->ExportCaption($this->facultyprofile_specificDiscipline_2_primaryTeachingLoad);
				$Doc->ExportCaption($this->facultyprofile_labHrs_basic);
				$Doc->ExportCaption($this->facultyprofile_lecHrs_basic);
				$Doc->ExportCaption($this->facultyprofile_labSCH_basic);
				$Doc->ExportCaption($this->facultyprofile_lecSCH_basic);
				$Doc->ExportCaption($this->facultyprofile_labCr_ugrad);
				$Doc->ExportCaption($this->facultyprofile_lecCr_ugrad);
				$Doc->ExportCaption($this->facultyprofile_mixedLabLecCr_ugrad);
				$Doc->ExportCaption($this->facultyprofile_labHrs_ugrad);
				$Doc->ExportCaption($this->facultyprofile_lecHrs_ugrad);
				$Doc->ExportCaption($this->facultyprofile_mixedLabLecHrs_ugrad);
				$Doc->ExportCaption($this->facultyprofile_labSCH_ugrad);
				$Doc->ExportCaption($this->facultyprofile_lecSCH_ugrad);
				$Doc->ExportCaption($this->facultyprofile_mixedLabLecSCH_ugrad);
				$Doc->ExportCaption($this->facultyprofile_labCr_graduate);
				$Doc->ExportCaption($this->facultyprofile_lecCr_graduate);
				$Doc->ExportCaption($this->facultyprofile_mixedLabLecCr_graduate);
				$Doc->ExportCaption($this->facultyprofile_labHrs_graduate);
				$Doc->ExportCaption($this->facultyprofile_lecHrs_graduate);
				$Doc->ExportCaption($this->facultyprofile_mixedLabLecHrs_graduate);
				$Doc->ExportCaption($this->facultyprofile_labSCH_graduate);
				$Doc->ExportCaption($this->facultyprofile_lecSCH_graduate);
				$Doc->ExportCaption($this->facultyprofile_mixedLabLecSCH_graduate);
				$Doc->ExportCaption($this->facultyprofile_researchLoad);
				$Doc->ExportCaption($this->facultyprofile_extensionServicesLoad);
				$Doc->ExportCaption($this->facultyprofile_studyLoad);
				$Doc->ExportCaption($this->facultyprofile_forProductionLoad);
				$Doc->ExportCaption($this->facultyprofile_administrativeLoad);
				$Doc->ExportCaption($this->facultyprofile_otherLoadCredits);
				$Doc->ExportCaption($this->facultyprofile_remarks);
			} else {
				$Doc->ExportCaption($this->faculty_name);
				$Doc->ExportCaption($this->facultyGroup_CHEDCode);
				$Doc->ExportCaption($this->facultyRank_ID);
				$Doc->ExportCaption($this->facultyprofile_sg);
				$Doc->ExportCaption($this->facultyprofile_annualSalary);
				$Doc->ExportCaption($this->facultyprofile_tenureCode);
				$Doc->ExportCaption($this->facultyprofile_leaveCode);
				$Doc->ExportCaption($this->facultyprofile_specificDiscipline_1_primaryTeachingLoad);
				$Doc->ExportCaption($this->facultyprofile_specificDiscipline_2_primaryTeachingLoad);
				$Doc->ExportCaption($this->facultyprofile_labHrs_basic);
				$Doc->ExportCaption($this->facultyprofile_lecHrs_basic);
				$Doc->ExportCaption($this->facultyprofile_totalHrs_basic);
				$Doc->ExportCaption($this->facultyprofile_labSCH_basic);
				$Doc->ExportCaption($this->facultyprofile_lecSCH_basic);
				$Doc->ExportCaption($this->facultyprofile_totalSCH_basic);
				$Doc->ExportCaption($this->facultyprofile_labCr_ugrad);
				$Doc->ExportCaption($this->facultyprofile_lecCr_ugrad);
				$Doc->ExportCaption($this->facultyprofile_mixedLabLecCr_ugrad);
				$Doc->ExportCaption($this->facultyprofile_totalCr_ugrad);
				$Doc->ExportCaption($this->facultyprofile_labHrs_ugrad);
				$Doc->ExportCaption($this->facultyprofile_lecHrs_ugrad);
				$Doc->ExportCaption($this->facultyprofile_mixedLabLecHrs_ugrad);
				$Doc->ExportCaption($this->facultyprofile_totalHrs_ugrad);
				$Doc->ExportCaption($this->facultyprofile_labSCH_ugrad);
				$Doc->ExportCaption($this->facultyprofile_lecSCH_ugrad);
				$Doc->ExportCaption($this->facultyprofile_mixedLabLecSCH_ugrad);
				$Doc->ExportCaption($this->facultyprofile_totalSCH_ugrad);
				$Doc->ExportCaption($this->facultyprofile_labCr_graduate);
				$Doc->ExportCaption($this->facultyprofile_lecCr_graduate);
				$Doc->ExportCaption($this->facultyprofile_mixedLabLecCr_graduate);
				$Doc->ExportCaption($this->facultyprofile_totalCr_graduate);
				$Doc->ExportCaption($this->facultyprofile_labHrs_graduate);
				$Doc->ExportCaption($this->facultyprofile_lecHrs_graduate);
				$Doc->ExportCaption($this->facultyprofile_mixedLabLecHrs_graduate);
				$Doc->ExportCaption($this->facultyprofile_totalHrs_graduate);
				$Doc->ExportCaption($this->facultyprofile_labSCH_graduate);
				$Doc->ExportCaption($this->facultyprofile_lecSCH_graduate);
				$Doc->ExportCaption($this->facultyprofile_mixedLabLecSCH_graduate);
				$Doc->ExportCaption($this->facultyprofile_totalSCH_graduate);
				$Doc->ExportCaption($this->facultyprofile_researchLoad);
				$Doc->ExportCaption($this->facultyprofile_extensionServicesLoad);
				$Doc->ExportCaption($this->facultyprofile_studyLoad);
				$Doc->ExportCaption($this->facultyprofile_forProductionLoad);
				$Doc->ExportCaption($this->facultyprofile_administrativeLoad);
				$Doc->ExportCaption($this->facultyprofile_otherLoadCredits);
				$Doc->ExportCaption($this->facultyprofile_total_nonTeachingLoad);
				$Doc->ExportCaption($this->facultyprofile_totalWorkloadInCreditUnits_gen);
				$Doc->ExportCaption($this->facultyprofile_remarks);
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
					$Doc->ExportField($this->facultyprofile_isHomeUnit);
					$Doc->ExportField($this->facultyGroup_CHEDCode);
					$Doc->ExportField($this->facultyRank_ID);
					$Doc->ExportField($this->facultyprofile_tenureCode);
					$Doc->ExportField($this->facultyprofile_leaveCode);
					$Doc->ExportField($this->facultyprofile_specificDiscipline_1_primaryTeachingLoad);
					$Doc->ExportField($this->facultyprofile_specificDiscipline_2_primaryTeachingLoad);
					$Doc->ExportField($this->facultyprofile_labHrs_basic);
					$Doc->ExportField($this->facultyprofile_lecHrs_basic);
					$Doc->ExportField($this->facultyprofile_labSCH_basic);
					$Doc->ExportField($this->facultyprofile_lecSCH_basic);
					$Doc->ExportField($this->facultyprofile_labCr_ugrad);
					$Doc->ExportField($this->facultyprofile_lecCr_ugrad);
					$Doc->ExportField($this->facultyprofile_mixedLabLecCr_ugrad);
					$Doc->ExportField($this->facultyprofile_labHrs_ugrad);
					$Doc->ExportField($this->facultyprofile_lecHrs_ugrad);
					$Doc->ExportField($this->facultyprofile_mixedLabLecHrs_ugrad);
					$Doc->ExportField($this->facultyprofile_labSCH_ugrad);
					$Doc->ExportField($this->facultyprofile_lecSCH_ugrad);
					$Doc->ExportField($this->facultyprofile_mixedLabLecSCH_ugrad);
					$Doc->ExportField($this->facultyprofile_labCr_graduate);
					$Doc->ExportField($this->facultyprofile_lecCr_graduate);
					$Doc->ExportField($this->facultyprofile_mixedLabLecCr_graduate);
					$Doc->ExportField($this->facultyprofile_labHrs_graduate);
					$Doc->ExportField($this->facultyprofile_lecHrs_graduate);
					$Doc->ExportField($this->facultyprofile_mixedLabLecHrs_graduate);
					$Doc->ExportField($this->facultyprofile_labSCH_graduate);
					$Doc->ExportField($this->facultyprofile_lecSCH_graduate);
					$Doc->ExportField($this->facultyprofile_mixedLabLecSCH_graduate);
					$Doc->ExportField($this->facultyprofile_researchLoad);
					$Doc->ExportField($this->facultyprofile_extensionServicesLoad);
					$Doc->ExportField($this->facultyprofile_studyLoad);
					$Doc->ExportField($this->facultyprofile_forProductionLoad);
					$Doc->ExportField($this->facultyprofile_administrativeLoad);
					$Doc->ExportField($this->facultyprofile_otherLoadCredits);
					$Doc->ExportField($this->facultyprofile_remarks);
				} else {
					$Doc->ExportField($this->faculty_name);
					$Doc->ExportField($this->facultyGroup_CHEDCode);
					$Doc->ExportField($this->facultyRank_ID);
					$Doc->ExportField($this->facultyprofile_sg);
					$Doc->ExportField($this->facultyprofile_annualSalary);
					$Doc->ExportField($this->facultyprofile_tenureCode);
					$Doc->ExportField($this->facultyprofile_leaveCode);
					$Doc->ExportField($this->facultyprofile_specificDiscipline_1_primaryTeachingLoad);
					$Doc->ExportField($this->facultyprofile_specificDiscipline_2_primaryTeachingLoad);
					$Doc->ExportField($this->facultyprofile_labHrs_basic);
					$Doc->ExportField($this->facultyprofile_lecHrs_basic);
					$Doc->ExportField($this->facultyprofile_totalHrs_basic);
					$Doc->ExportField($this->facultyprofile_labSCH_basic);
					$Doc->ExportField($this->facultyprofile_lecSCH_basic);
					$Doc->ExportField($this->facultyprofile_totalSCH_basic);
					$Doc->ExportField($this->facultyprofile_labCr_ugrad);
					$Doc->ExportField($this->facultyprofile_lecCr_ugrad);
					$Doc->ExportField($this->facultyprofile_mixedLabLecCr_ugrad);
					$Doc->ExportField($this->facultyprofile_totalCr_ugrad);
					$Doc->ExportField($this->facultyprofile_labHrs_ugrad);
					$Doc->ExportField($this->facultyprofile_lecHrs_ugrad);
					$Doc->ExportField($this->facultyprofile_mixedLabLecHrs_ugrad);
					$Doc->ExportField($this->facultyprofile_totalHrs_ugrad);
					$Doc->ExportField($this->facultyprofile_labSCH_ugrad);
					$Doc->ExportField($this->facultyprofile_lecSCH_ugrad);
					$Doc->ExportField($this->facultyprofile_mixedLabLecSCH_ugrad);
					$Doc->ExportField($this->facultyprofile_totalSCH_ugrad);
					$Doc->ExportField($this->facultyprofile_labCr_graduate);
					$Doc->ExportField($this->facultyprofile_lecCr_graduate);
					$Doc->ExportField($this->facultyprofile_mixedLabLecCr_graduate);
					$Doc->ExportField($this->facultyprofile_totalCr_graduate);
					$Doc->ExportField($this->facultyprofile_labHrs_graduate);
					$Doc->ExportField($this->facultyprofile_lecHrs_graduate);
					$Doc->ExportField($this->facultyprofile_mixedLabLecHrs_graduate);
					$Doc->ExportField($this->facultyprofile_totalHrs_graduate);
					$Doc->ExportField($this->facultyprofile_labSCH_graduate);
					$Doc->ExportField($this->facultyprofile_lecSCH_graduate);
					$Doc->ExportField($this->facultyprofile_mixedLabLecSCH_graduate);
					$Doc->ExportField($this->facultyprofile_totalSCH_graduate);
					$Doc->ExportField($this->facultyprofile_researchLoad);
					$Doc->ExportField($this->facultyprofile_extensionServicesLoad);
					$Doc->ExportField($this->facultyprofile_studyLoad);
					$Doc->ExportField($this->facultyprofile_forProductionLoad);
					$Doc->ExportField($this->facultyprofile_administrativeLoad);
					$Doc->ExportField($this->facultyprofile_otherLoadCredits);
					$Doc->ExportField($this->facultyprofile_total_nonTeachingLoad);
					$Doc->ExportField($this->facultyprofile_totalWorkloadInCreditUnits_gen);
					$Doc->ExportField($this->facultyprofile_remarks);
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
