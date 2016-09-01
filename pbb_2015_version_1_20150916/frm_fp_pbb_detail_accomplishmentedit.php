<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_fp_pbb_detail_accomplishmentinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_fp_pbb_detail_accomplishment_edit = new cfrm_fp_pbb_detail_accomplishment_edit();
$Page =& $frm_fp_pbb_detail_accomplishment_edit;

// Page init
$frm_fp_pbb_detail_accomplishment_edit->Page_Init();

// Page main
$frm_fp_pbb_detail_accomplishment_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_pbb_detail_accomplishment_edit = new up_Page("frm_fp_pbb_detail_accomplishment_edit");

// page properties
frm_fp_pbb_detail_accomplishment_edit.PageID = "edit"; // page ID
frm_fp_pbb_detail_accomplishment_edit.FormID = "ffrm_fp_pbb_detail_accomplishmentedit"; // form ID
var UP_PAGE_ID = frm_fp_pbb_detail_accomplishment_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_fp_pbb_detail_accomplishment_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_cu_sequence"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->cu_sequence->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_focal_person_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->focal_person_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_mfo_sequence"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->mfo_sequence->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_mfo"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->mfo->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_pi_no"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->pi_no->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_pi_no"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->pi_no->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_target"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->target->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_numerator"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->t_numerator->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_numerator_qtr1"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_numerator_qtr2"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_numerator_qtr3"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_numerator_qtr4"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_denominator"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->t_denominator->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_denominator_qtr1"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_denominator_qtr2"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_denominator_qtr3"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_denominator_qtr4"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_cutOffDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->t_cutOffDate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_accomplishment"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->accomplishment->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_numerator"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_numerator->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_numerator_qtr1"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_numerator_qtr2"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_numerator_qtr3"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_numerator_qtr4"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_denominator"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_denominator->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_denominator_qtr1"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_denominator_qtr2"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_denominator_qtr3"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_denominator_qtr4"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_supporting_docs"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_supporting_docs->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_supporting_docs_qtr1"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_supporting_docs_qtr2"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_supporting_docs_qtr3"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_supporting_docs_qtr4"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_rating_above_90"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_rating_above_90->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_rating_below_90"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_rating_below_90->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_cutOffDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_cutOffDate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_units_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->units_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_rating"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_rating->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_mfo_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->mfo_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_cutOffDate_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->cutOffDate_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_cutOffDate_fp"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_cutOffDate_fp"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->FldErrMsg()) ?>");

		// Set up row object
		var row = {};
		row["index"] = infix;
		for (var j = 0; j < fobj.elements.length; j++) {
			var el = fobj.elements[j];
			var len = infix.length + 2;
			if (el.name.substr(0, len) == "x" + infix + "_") {
				var elname = "x_" + el.name.substr(len);
				if (upLang.isObject(row[elname])) { // already exists
					if (upLang.isArray(row[elname])) {
						row[elname][row[elname].length] = el; // add to array
					} else {
						row[elname] = [row[elname], el]; // convert to array
					}
				} else {
					row[elname] = el;
				}
			}
		}
		fobj.row = row;

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}

	// Process detail page
	var detailpage = (fobj.detailpage) ? fobj.detailpage.value : "";
	if (detailpage != "") {
		return eval(detailpage+".ValidateForm(fobj)");
	}
	return true;
}

// extend page with Form_CustomValidate function
frm_fp_pbb_detail_accomplishment_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_pbb_detail_accomplishment_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_pbb_detail_accomplishment_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_pbb_detail_accomplishment_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_pbb_detail_accomplishment->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_fp_pbb_detail_accomplishment->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_fp_pbb_detail_accomplishment_edit->ShowPageHeader(); ?>
<?php
$frm_fp_pbb_detail_accomplishment_edit->ShowMessage();
?>
<form name="ffrm_fp_pbb_detail_accomplishmentedit" id="ffrm_fp_pbb_detail_accomplishmentedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return frm_fp_pbb_detail_accomplishment_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="frm_fp_pbb_detail_accomplishment">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_fp_pbb_detail_accomplishment->pbb_id->Visible) { // pbb_id ?>
	<tr id="r_pbb_id"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->CellAttributes() ?>><span id="el_pbb_id">
<div<?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->EditValue ?></div>
<input type="hidden" name="x_pbb_id" id="x_pbb_id" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->pbb_id->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->cu_sequence->Visible) { // cu_sequence ?>
	<tr id="r_cu_sequence"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->CellAttributes() ?>><span id="el_cu_sequence">
<input type="text" name="x_cu_sequence" id="x_cu_sequence" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->cu_short_name->Visible) { // cu_short_name ?>
	<tr id="r_cu_short_name"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->CellAttributes() ?>><span id="el_cu_short_name">
<input type="text" name="x_cu_short_name" id="x_cu_short_name" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->cu_unit_name->Visible) { // cu_unit_name ?>
	<tr id="r_cu_unit_name"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->CellAttributes() ?>><span id="el_cu_unit_name">
<input type="text" name="x_cu_unit_name" id="x_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->focal_person_id->Visible) { // focal_person_id ?>
	<tr id="r_focal_person_id"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->CellAttributes() ?>><span id="el_focal_person_id">
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->EditValue ?></div>
<input type="hidden" name="x_focal_person_id" id="x_focal_person_id" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->focal_person_id->CurrentValue) ?>">
<?php } else { ?>
<input type="text" name="x_focal_person_id" id="x_focal_person_id" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->EditAttributes() ?>>
<?php } ?>
</span><?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->mfo_sequence->Visible) { // mfo_sequence ?>
	<tr id="r_mfo_sequence"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->CellAttributes() ?>><span id="el_mfo_sequence">
<input type="text" name="x_mfo_sequence" id="x_mfo_sequence" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->mfo->Visible) { // mfo ?>
	<tr id="r_mfo"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->mfo->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo->CellAttributes() ?>><span id="el_mfo">
<input type="text" name="x_mfo" id="x_mfo" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->mfo->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->mfo->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->mfo->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->pi_no->Visible) { // pi_no ?>
	<tr id="r_pi_no"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->pi_no->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pi_no->CellAttributes() ?>><span id="el_pi_no">
<input type="text" name="x_pi_no" id="x_pi_no" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->pi_no->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->pi_no->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->pi_no->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->pi_sub->Visible) { // pi_sub ?>
	<tr id="r_pi_sub"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->CellAttributes() ?>><span id="el_pi_sub">
<input type="text" name="x_pi_sub" id="x_pi_sub" size="30" maxlength="10" value="<?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->mfo_name->Visible) { // mfo_name ?>
	<tr id="r_mfo_name"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->CellAttributes() ?>><span id="el_mfo_name">
<input type="text" name="x_mfo_name" id="x_mfo_name" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->pi_question->Visible) { // pi_question ?>
	<tr id="r_pi_question"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->pi_question->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pi_question->CellAttributes() ?>><span id="el_pi_question">
<input type="text" name="x_pi_question" id="x_pi_question" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->pi_question->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->pi_question->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->pi_question->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->target->Visible) { // target ?>
	<tr id="r_target"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->target->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->target->CellAttributes() ?>><span id="el_target">
<input type="text" name="x_target" id="x_target" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->target->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->target->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->target->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator->Visible) { // t_numerator ?>
	<tr id="r_t_numerator"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->CellAttributes() ?>><span id="el_t_numerator">
<input type="text" name="x_t_numerator" id="x_t_numerator" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->Visible) { // t_numerator_qtr1 ?>
	<tr id="r_t_numerator_qtr1"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CellAttributes() ?>><span id="el_t_numerator_qtr1">
<input type="text" name="x_t_numerator_qtr1" id="x_t_numerator_qtr1" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->Visible) { // t_numerator_qtr2 ?>
	<tr id="r_t_numerator_qtr2"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CellAttributes() ?>><span id="el_t_numerator_qtr2">
<input type="text" name="x_t_numerator_qtr2" id="x_t_numerator_qtr2" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->Visible) { // t_numerator_qtr3 ?>
	<tr id="r_t_numerator_qtr3"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CellAttributes() ?>><span id="el_t_numerator_qtr3">
<input type="text" name="x_t_numerator_qtr3" id="x_t_numerator_qtr3" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->Visible) { // t_numerator_qtr4 ?>
	<tr id="r_t_numerator_qtr4"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CellAttributes() ?>><span id="el_t_numerator_qtr4">
<input type="text" name="x_t_numerator_qtr4" id="x_t_numerator_qtr4" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator->Visible) { // t_denominator ?>
	<tr id="r_t_denominator"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->CellAttributes() ?>><span id="el_t_denominator">
<input type="text" name="x_t_denominator" id="x_t_denominator" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->Visible) { // t_denominator_qtr1 ?>
	<tr id="r_t_denominator_qtr1"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CellAttributes() ?>><span id="el_t_denominator_qtr1">
<input type="text" name="x_t_denominator_qtr1" id="x_t_denominator_qtr1" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->Visible) { // t_denominator_qtr2 ?>
	<tr id="r_t_denominator_qtr2"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CellAttributes() ?>><span id="el_t_denominator_qtr2">
<input type="text" name="x_t_denominator_qtr2" id="x_t_denominator_qtr2" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->Visible) { // t_denominator_qtr3 ?>
	<tr id="r_t_denominator_qtr3"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CellAttributes() ?>><span id="el_t_denominator_qtr3">
<input type="text" name="x_t_denominator_qtr3" id="x_t_denominator_qtr3" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->Visible) { // t_denominator_qtr4 ?>
	<tr id="r_t_denominator_qtr4"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CellAttributes() ?>><span id="el_t_denominator_qtr4">
<input type="text" name="x_t_denominator_qtr4" id="x_t_denominator_qtr4" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_remarks->Visible) { // t_remarks ?>
	<tr id="r_t_remarks"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->CellAttributes() ?>><span id="el_t_remarks">
<input type="text" name="x_t_remarks" id="x_t_remarks" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate->Visible) { // t_cutOffDate ?>
	<tr id="r_t_cutOffDate"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->CellAttributes() ?>><span id="el_t_cutOffDate">
<input type="text" name="x_t_cutOffDate" id="x_t_cutOffDate" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
	<tr id="r_t_cutOffDate_remarks"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CellAttributes() ?>><span id="el_t_cutOffDate_remarks">
<input type="text" name="x_t_cutOffDate_remarks" id="x_t_cutOffDate_remarks" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->accomplishment->Visible) { // accomplishment ?>
	<tr id="r_accomplishment"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->CellAttributes() ?>><span id="el_accomplishment">
<input type="text" name="x_accomplishment" id="x_accomplishment" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator->Visible) { // a_numerator ?>
	<tr id="r_a_numerator"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->CellAttributes() ?>><span id="el_a_numerator">
<input type="text" name="x_a_numerator" id="x_a_numerator" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->Visible) { // a_numerator_qtr1 ?>
	<tr id="r_a_numerator_qtr1"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->CellAttributes() ?>><span id="el_a_numerator_qtr1">
<input type="text" name="x_a_numerator_qtr1" id="x_a_numerator_qtr1" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->Visible) { // a_numerator_qtr2 ?>
	<tr id="r_a_numerator_qtr2"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->CellAttributes() ?>><span id="el_a_numerator_qtr2">
<input type="text" name="x_a_numerator_qtr2" id="x_a_numerator_qtr2" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->Visible) { // a_numerator_qtr3 ?>
	<tr id="r_a_numerator_qtr3"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->CellAttributes() ?>><span id="el_a_numerator_qtr3">
<input type="text" name="x_a_numerator_qtr3" id="x_a_numerator_qtr3" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->Visible) { // a_numerator_qtr4 ?>
	<tr id="r_a_numerator_qtr4"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->CellAttributes() ?>><span id="el_a_numerator_qtr4">
<input type="text" name="x_a_numerator_qtr4" id="x_a_numerator_qtr4" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator->Visible) { // a_denominator ?>
	<tr id="r_a_denominator"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->CellAttributes() ?>><span id="el_a_denominator">
<input type="text" name="x_a_denominator" id="x_a_denominator" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->Visible) { // a_denominator_qtr1 ?>
	<tr id="r_a_denominator_qtr1"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->CellAttributes() ?>><span id="el_a_denominator_qtr1">
<input type="text" name="x_a_denominator_qtr1" id="x_a_denominator_qtr1" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->Visible) { // a_denominator_qtr2 ?>
	<tr id="r_a_denominator_qtr2"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->CellAttributes() ?>><span id="el_a_denominator_qtr2">
<input type="text" name="x_a_denominator_qtr2" id="x_a_denominator_qtr2" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->Visible) { // a_denominator_qtr3 ?>
	<tr id="r_a_denominator_qtr3"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->CellAttributes() ?>><span id="el_a_denominator_qtr3">
<input type="text" name="x_a_denominator_qtr3" id="x_a_denominator_qtr3" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->Visible) { // a_denominator_qtr4 ?>
	<tr id="r_a_denominator_qtr4"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->CellAttributes() ?>><span id="el_a_denominator_qtr4">
<input type="text" name="x_a_denominator_qtr4" id="x_a_denominator_qtr4" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs->Visible) { // a_supporting_docs ?>
	<tr id="r_a_supporting_docs"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->CellAttributes() ?>><span id="el_a_supporting_docs">
<input type="text" name="x_a_supporting_docs" id="x_a_supporting_docs" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->Visible) { // a_supporting_docs_qtr1 ?>
	<tr id="r_a_supporting_docs_qtr1"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->CellAttributes() ?>><span id="el_a_supporting_docs_qtr1">
<input type="text" name="x_a_supporting_docs_qtr1" id="x_a_supporting_docs_qtr1" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->Visible) { // a_supporting_docs_qtr2 ?>
	<tr id="r_a_supporting_docs_qtr2"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->CellAttributes() ?>><span id="el_a_supporting_docs_qtr2">
<input type="text" name="x_a_supporting_docs_qtr2" id="x_a_supporting_docs_qtr2" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->Visible) { // a_supporting_docs_qtr3 ?>
	<tr id="r_a_supporting_docs_qtr3"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->CellAttributes() ?>><span id="el_a_supporting_docs_qtr3">
<input type="text" name="x_a_supporting_docs_qtr3" id="x_a_supporting_docs_qtr3" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->Visible) { // a_supporting_docs_qtr4 ?>
	<tr id="r_a_supporting_docs_qtr4"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->CellAttributes() ?>><span id="el_a_supporting_docs_qtr4">
<input type="text" name="x_a_supporting_docs_qtr4" id="x_a_supporting_docs_qtr4" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_remarks->Visible) { // a_remarks ?>
	<tr id="r_a_remarks"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->CellAttributes() ?>><span id="el_a_remarks">
<input type="text" name="x_a_remarks" id="x_a_remarks" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_rating_above_90->Visible) { // a_rating_above_90 ?>
	<tr id="r_a_rating_above_90"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->CellAttributes() ?>><span id="el_a_rating_above_90">
<input type="text" name="x_a_rating_above_90" id="x_a_rating_above_90" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_rating_below_90->Visible) { // a_rating_below_90 ?>
	<tr id="r_a_rating_below_90"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->CellAttributes() ?>><span id="el_a_rating_below_90">
<input type="text" name="x_a_rating_below_90" id="x_a_rating_below_90" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate->Visible) { // a_cutOffDate ?>
	<tr id="r_a_cutOffDate"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->CellAttributes() ?>><span id="el_a_cutOffDate">
<input type="text" name="x_a_cutOffDate" id="x_a_cutOffDate" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->Visible) { // a_cutOffDate_remarks ?>
	<tr id="r_a_cutOffDate_remarks"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CellAttributes() ?>><span id="el_a_cutOffDate_remarks">
<input type="text" name="x_a_cutOffDate_remarks" id="x_a_cutOffDate_remarks" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->units_id->Visible) { // units_id ?>
	<tr id="r_units_id"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->units_id->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->units_id->CellAttributes() ?>><span id="el_units_id">
<input type="text" name="x_units_id" id="x_units_id" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->units_id->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->units_id->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->units_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_rating->Visible) { // a_rating ?>
	<tr id="r_a_rating"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_rating->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_rating->CellAttributes() ?>><span id="el_a_rating">
<input type="text" name="x_a_rating" id="x_a_rating" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_rating->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_rating->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_rating->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->mfo_id->Visible) { // mfo_id ?>
	<tr id="r_mfo_id"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->CellAttributes() ?>><span id="el_mfo_id">
<input type="text" name="x_mfo_id" id="x_mfo_id" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->Visible) { // a_supporting_docs_comparison ?>
	<tr id="r_a_supporting_docs_comparison"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->CellAttributes() ?>><span id="el_a_supporting_docs_comparison">
<input type="text" name="x_a_supporting_docs_comparison" id="x_a_supporting_docs_comparison" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->cutOffDate_id->Visible) { // cutOffDate_id ?>
	<tr id="r_cutOffDate_id"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->CellAttributes() ?>><span id="el_cutOffDate_id">
<input type="text" name="x_cutOffDate_id" id="x_cutOffDate_id" size="30" value="<?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->mfo_name_rep->Visible) { // mfo_name_rep ?>
	<tr id="r_mfo_name_rep"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->CellAttributes() ?>><span id="el_mfo_name_rep">
<input type="text" name="x_mfo_name_rep" id="x_mfo_name_rep" size="30" maxlength="255" value="<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->Visible) { // t_cutOffDate_fp ?>
	<tr id="r_t_cutOffDate_fp"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CellAttributes() ?>><span id="el_t_cutOffDate_fp">
<input type="text" name="x_t_cutOffDate_fp" id="x_t_cutOffDate_fp" value="<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->Visible) { // a_cutOffDate_fp ?>
	<tr id="r_a_cutOffDate_fp"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CellAttributes() ?>><span id="el_a_cutOffDate_fp">
<input type="text" name="x_a_cutOffDate_fp" id="x_a_cutOffDate_fp" value="<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->applicable->Visible) { // applicable ?>
	<tr id="r_applicable"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->applicable->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->applicable->CellAttributes() ?>><span id="el_applicable">
<input type="text" name="x_applicable" id="x_applicable" size="30" maxlength="1" value="<?php echo $frm_fp_pbb_detail_accomplishment->applicable->EditValue ?>"<?php echo $frm_fp_pbb_detail_accomplishment->applicable->EditAttributes() ?>>
</span><?php echo $frm_fp_pbb_detail_accomplishment->applicable->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$frm_fp_pbb_detail_accomplishment_edit->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include_once "footer.php" ?>
<?php
$frm_fp_pbb_detail_accomplishment_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_pbb_detail_accomplishment_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'frm_fp_pbb_detail_accomplishment';

	// Page object name
	var $PageObjName = 'frm_fp_pbb_detail_accomplishment_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_pbb_detail_accomplishment;
		if ($frm_fp_pbb_detail_accomplishment->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_pbb_detail_accomplishment->TableVar . "&"; // Add page token
		return $PageUrl;
	}

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
		global $objForm, $frm_fp_pbb_detail_accomplishment;
		if ($frm_fp_pbb_detail_accomplishment->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_pbb_detail_accomplishment->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_pbb_detail_accomplishment->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_pbb_detail_accomplishment_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_pbb_detail_accomplishment)
		if (!isset($GLOBALS["frm_fp_pbb_detail_accomplishment"])) {
			$GLOBALS["frm_fp_pbb_detail_accomplishment"] = new cfrm_fp_pbb_detail_accomplishment();
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_pbb_detail_accomplishment"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_pbb_detail_accomplishment', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"])) $GLOBALS["gTimer"] = new cTimer();

		// Open connection
		if (!isset($conn)) $conn = up_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		global $frm_fp_pbb_detail_accomplishment;

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
		if (!$Security->CanEdit()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("frm_fp_pbb_detail_accomplishmentlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_fp_pbb_detail_accomplishmentlist.php");
		}

		// Create form object
		$objForm = new cFormObj();

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
	var $DbMasterFilter;
	var $DbDetailFilter;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $frm_fp_pbb_detail_accomplishment;

		// Load key from QueryString
		if (@$_GET["pbb_id"] <> "")
			$frm_fp_pbb_detail_accomplishment->pbb_id->setQueryStringValue($_GET["pbb_id"]);
		if (@$_POST["a_edit"] <> "") {
			$frm_fp_pbb_detail_accomplishment->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$frm_fp_pbb_detail_accomplishment->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$frm_fp_pbb_detail_accomplishment->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$frm_fp_pbb_detail_accomplishment->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($frm_fp_pbb_detail_accomplishment->pbb_id->CurrentValue == "")
			$this->Page_Terminate("frm_fp_pbb_detail_accomplishmentlist.php"); // Invalid key, return to list
		switch ($frm_fp_pbb_detail_accomplishment->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("frm_fp_pbb_detail_accomplishmentlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$frm_fp_pbb_detail_accomplishment->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $frm_fp_pbb_detail_accomplishment->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$frm_fp_pbb_detail_accomplishment->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$frm_fp_pbb_detail_accomplishment->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$frm_fp_pbb_detail_accomplishment->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_fp_pbb_detail_accomplishment;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_fp_pbb_detail_accomplishment;
		if (!$frm_fp_pbb_detail_accomplishment->pbb_id->FldIsDetailKey)
			$frm_fp_pbb_detail_accomplishment->pbb_id->setFormValue($objForm->GetValue("x_pbb_id"));
		if (!$frm_fp_pbb_detail_accomplishment->cu_sequence->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->cu_sequence->setFormValue($objForm->GetValue("x_cu_sequence"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->cu_short_name->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->cu_short_name->setFormValue($objForm->GetValue("x_cu_short_name"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->cu_unit_name->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->setFormValue($objForm->GetValue("x_cu_unit_name"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->focal_person_id->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->focal_person_id->setFormValue($objForm->GetValue("x_focal_person_id"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->mfo_sequence->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->setFormValue($objForm->GetValue("x_mfo_sequence"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->mfo->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->mfo->setFormValue($objForm->GetValue("x_mfo"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->pi_no->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->pi_no->setFormValue($objForm->GetValue("x_pi_no"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->pi_sub->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->pi_sub->setFormValue($objForm->GetValue("x_pi_sub"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->mfo_name->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->mfo_name->setFormValue($objForm->GetValue("x_mfo_name"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->pi_question->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->pi_question->setFormValue($objForm->GetValue("x_pi_question"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->target->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->target->setFormValue($objForm->GetValue("x_target"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_numerator->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_numerator->setFormValue($objForm->GetValue("x_t_numerator"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->setFormValue($objForm->GetValue("x_t_numerator_qtr1"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->setFormValue($objForm->GetValue("x_t_numerator_qtr2"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->setFormValue($objForm->GetValue("x_t_numerator_qtr3"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->setFormValue($objForm->GetValue("x_t_numerator_qtr4"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_denominator->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_denominator->setFormValue($objForm->GetValue("x_t_denominator"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->setFormValue($objForm->GetValue("x_t_denominator_qtr1"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->setFormValue($objForm->GetValue("x_t_denominator_qtr2"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->setFormValue($objForm->GetValue("x_t_denominator_qtr3"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->setFormValue($objForm->GetValue("x_t_denominator_qtr4"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_remarks->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_remarks->setFormValue($objForm->GetValue("x_t_remarks"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_cutOffDate->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->setFormValue($objForm->GetValue("x_t_cutOffDate"));
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->CurrentValue = up_UnFormatDateTime($frm_fp_pbb_detail_accomplishment->t_cutOffDate->CurrentValue, 6);
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->setFormValue($objForm->GetValue("x_t_cutOffDate_remarks"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->accomplishment->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->accomplishment->setFormValue($objForm->GetValue("x_accomplishment"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_numerator->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_numerator->setFormValue($objForm->GetValue("x_a_numerator"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->setFormValue($objForm->GetValue("x_a_numerator_qtr1"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->setFormValue($objForm->GetValue("x_a_numerator_qtr2"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->setFormValue($objForm->GetValue("x_a_numerator_qtr3"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->setFormValue($objForm->GetValue("x_a_numerator_qtr4"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_denominator->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_denominator->setFormValue($objForm->GetValue("x_a_denominator"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->setFormValue($objForm->GetValue("x_a_denominator_qtr1"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->setFormValue($objForm->GetValue("x_a_denominator_qtr2"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->setFormValue($objForm->GetValue("x_a_denominator_qtr3"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->setFormValue($objForm->GetValue("x_a_denominator_qtr4"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_supporting_docs->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->setFormValue($objForm->GetValue("x_a_supporting_docs"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->setFormValue($objForm->GetValue("x_a_supporting_docs_qtr1"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->setFormValue($objForm->GetValue("x_a_supporting_docs_qtr2"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->setFormValue($objForm->GetValue("x_a_supporting_docs_qtr3"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->setFormValue($objForm->GetValue("x_a_supporting_docs_qtr4"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_remarks->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_remarks->setFormValue($objForm->GetValue("x_a_remarks"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_rating_above_90->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->setFormValue($objForm->GetValue("x_a_rating_above_90"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_rating_below_90->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->setFormValue($objForm->GetValue("x_a_rating_below_90"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_cutOffDate->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->setFormValue($objForm->GetValue("x_a_cutOffDate"));
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->CurrentValue = up_UnFormatDateTime($frm_fp_pbb_detail_accomplishment->a_cutOffDate->CurrentValue, 6);
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->setFormValue($objForm->GetValue("x_a_cutOffDate_remarks"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->units_id->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->units_id->setFormValue($objForm->GetValue("x_units_id"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_rating->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_rating->setFormValue($objForm->GetValue("x_a_rating"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->mfo_id->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->mfo_id->setFormValue($objForm->GetValue("x_mfo_id"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->setFormValue($objForm->GetValue("x_a_supporting_docs_comparison"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->cutOffDate_id->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->setFormValue($objForm->GetValue("x_cutOffDate_id"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->mfo_name_rep->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->setFormValue($objForm->GetValue("x_mfo_name_rep"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->setFormValue($objForm->GetValue("x_t_cutOffDate_fp"));
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CurrentValue = up_UnFormatDateTime($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CurrentValue, 6);
		}
		if (!$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->setFormValue($objForm->GetValue("x_a_cutOffDate_fp"));
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CurrentValue = up_UnFormatDateTime($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CurrentValue, 6);
		}
		if (!$frm_fp_pbb_detail_accomplishment->applicable->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->applicable->setFormValue($objForm->GetValue("x_applicable"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_fp_pbb_detail_accomplishment;
		$this->LoadRow();
		$frm_fp_pbb_detail_accomplishment->pbb_id->CurrentValue = $frm_fp_pbb_detail_accomplishment->pbb_id->FormValue;
		$frm_fp_pbb_detail_accomplishment->cu_sequence->CurrentValue = $frm_fp_pbb_detail_accomplishment->cu_sequence->FormValue;
		$frm_fp_pbb_detail_accomplishment->cu_short_name->CurrentValue = $frm_fp_pbb_detail_accomplishment->cu_short_name->FormValue;
		$frm_fp_pbb_detail_accomplishment->cu_unit_name->CurrentValue = $frm_fp_pbb_detail_accomplishment->cu_unit_name->FormValue;
		$frm_fp_pbb_detail_accomplishment->focal_person_id->CurrentValue = $frm_fp_pbb_detail_accomplishment->focal_person_id->FormValue;
		$frm_fp_pbb_detail_accomplishment->mfo_sequence->CurrentValue = $frm_fp_pbb_detail_accomplishment->mfo_sequence->FormValue;
		$frm_fp_pbb_detail_accomplishment->mfo->CurrentValue = $frm_fp_pbb_detail_accomplishment->mfo->FormValue;
		$frm_fp_pbb_detail_accomplishment->pi_no->CurrentValue = $frm_fp_pbb_detail_accomplishment->pi_no->FormValue;
		$frm_fp_pbb_detail_accomplishment->pi_sub->CurrentValue = $frm_fp_pbb_detail_accomplishment->pi_sub->FormValue;
		$frm_fp_pbb_detail_accomplishment->mfo_name->CurrentValue = $frm_fp_pbb_detail_accomplishment->mfo_name->FormValue;
		$frm_fp_pbb_detail_accomplishment->pi_question->CurrentValue = $frm_fp_pbb_detail_accomplishment->pi_question->FormValue;
		$frm_fp_pbb_detail_accomplishment->target->CurrentValue = $frm_fp_pbb_detail_accomplishment->target->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_numerator->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_numerator->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_denominator->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_denominator->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_remarks->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_remarks->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_cutOffDate->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_cutOffDate->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_cutOffDate->CurrentValue = up_UnFormatDateTime($frm_fp_pbb_detail_accomplishment->t_cutOffDate->CurrentValue, 6);
		$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->FormValue;
		$frm_fp_pbb_detail_accomplishment->accomplishment->CurrentValue = $frm_fp_pbb_detail_accomplishment->accomplishment->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_numerator->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_numerator->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_denominator->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_denominator->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_remarks->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_remarks->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_rating_above_90->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_rating_above_90->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_rating_below_90->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_rating_below_90->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_cutOffDate->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate->CurrentValue = up_UnFormatDateTime($frm_fp_pbb_detail_accomplishment->a_cutOffDate->CurrentValue, 6);
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->FormValue;
		$frm_fp_pbb_detail_accomplishment->units_id->CurrentValue = $frm_fp_pbb_detail_accomplishment->units_id->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_rating->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_rating->FormValue;
		$frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue = $frm_fp_pbb_detail_accomplishment->mfo_id->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->FormValue;
		$frm_fp_pbb_detail_accomplishment->cutOffDate_id->CurrentValue = $frm_fp_pbb_detail_accomplishment->cutOffDate_id->FormValue;
		$frm_fp_pbb_detail_accomplishment->mfo_name_rep->CurrentValue = $frm_fp_pbb_detail_accomplishment->mfo_name_rep->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CurrentValue = $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->FormValue;
		$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CurrentValue = up_UnFormatDateTime($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CurrentValue, 6);
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->FormValue;
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CurrentValue = up_UnFormatDateTime($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CurrentValue, 6);
		$frm_fp_pbb_detail_accomplishment->applicable->CurrentValue = $frm_fp_pbb_detail_accomplishment->applicable->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_pbb_detail_accomplishment;
		$sFilter = $frm_fp_pbb_detail_accomplishment->KeyFilter();

		// Call Row Selecting event
		$frm_fp_pbb_detail_accomplishment->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_pbb_detail_accomplishment->CurrentFilter = $sFilter;
		$sSql = $frm_fp_pbb_detail_accomplishment->SQL();
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
		global $conn, $frm_fp_pbb_detail_accomplishment;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_pbb_detail_accomplishment->Row_Selected($row);
		$frm_fp_pbb_detail_accomplishment->pbb_id->setDbValue($rs->fields('pbb_id'));
		$frm_fp_pbb_detail_accomplishment->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_fp_pbb_detail_accomplishment->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_fp_pbb_detail_accomplishment->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_fp_pbb_detail_accomplishment->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_pbb_detail_accomplishment->mfo_sequence->setDbValue($rs->fields('mfo_sequence'));
		$frm_fp_pbb_detail_accomplishment->mfo->setDbValue($rs->fields('mfo'));
		$frm_fp_pbb_detail_accomplishment->pi_no->setDbValue($rs->fields('pi_no'));
		$frm_fp_pbb_detail_accomplishment->pi_sub->setDbValue($rs->fields('pi_sub'));
		$frm_fp_pbb_detail_accomplishment->mfo_name->setDbValue($rs->fields('mfo_name'));
		$frm_fp_pbb_detail_accomplishment->pi_question->setDbValue($rs->fields('pi_question'));
		$frm_fp_pbb_detail_accomplishment->target->setDbValue($rs->fields('target'));
		$frm_fp_pbb_detail_accomplishment->t_numerator->setDbValue($rs->fields('t_numerator'));
		$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->setDbValue($rs->fields('t_numerator_qtr1'));
		$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->setDbValue($rs->fields('t_numerator_qtr2'));
		$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->setDbValue($rs->fields('t_numerator_qtr3'));
		$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->setDbValue($rs->fields('t_numerator_qtr4'));
		$frm_fp_pbb_detail_accomplishment->t_denominator->setDbValue($rs->fields('t_denominator'));
		$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->setDbValue($rs->fields('t_denominator_qtr1'));
		$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->setDbValue($rs->fields('t_denominator_qtr2'));
		$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->setDbValue($rs->fields('t_denominator_qtr3'));
		$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->setDbValue($rs->fields('t_denominator_qtr4'));
		$frm_fp_pbb_detail_accomplishment->t_remarks->setDbValue($rs->fields('t_remarks'));
		$frm_fp_pbb_detail_accomplishment->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_fp_pbb_detail_accomplishment->accomplishment->setDbValue($rs->fields('accomplishment'));
		$frm_fp_pbb_detail_accomplishment->a_numerator->setDbValue($rs->fields('a_numerator'));
		$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->setDbValue($rs->fields('a_numerator_qtr1'));
		$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->setDbValue($rs->fields('a_numerator_qtr2'));
		$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->setDbValue($rs->fields('a_numerator_qtr3'));
		$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->setDbValue($rs->fields('a_numerator_qtr4'));
		$frm_fp_pbb_detail_accomplishment->a_denominator->setDbValue($rs->fields('a_denominator'));
		$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->setDbValue($rs->fields('a_denominator_qtr1'));
		$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->setDbValue($rs->fields('a_denominator_qtr2'));
		$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->setDbValue($rs->fields('a_denominator_qtr3'));
		$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->setDbValue($rs->fields('a_denominator_qtr4'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs->setDbValue($rs->fields('a_supporting_docs'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->setDbValue($rs->fields('a_supporting_docs_qtr1'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->setDbValue($rs->fields('a_supporting_docs_qtr2'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->setDbValue($rs->fields('a_supporting_docs_qtr3'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->setDbValue($rs->fields('a_supporting_docs_qtr4'));
		$frm_fp_pbb_detail_accomplishment->a_remarks->setDbValue($rs->fields('a_remarks'));
		$frm_fp_pbb_detail_accomplishment->a_rating_above_90->setDbValue($rs->fields('a_rating_above_90'));
		$frm_fp_pbb_detail_accomplishment->a_rating_below_90->setDbValue($rs->fields('a_rating_below_90'));
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate->setDbValue($rs->fields('a_cutOffDate'));
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
		$frm_fp_pbb_detail_accomplishment->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_pbb_detail_accomplishment->a_rating->setDbValue($rs->fields('a_rating'));
		$frm_fp_pbb_detail_accomplishment->mfo_id->setDbValue($rs->fields('mfo_id'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->setDbValue($rs->fields('a_supporting_docs_comparison'));
		$frm_fp_pbb_detail_accomplishment->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_fp_pbb_detail_accomplishment->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_fp_pbb_detail_accomplishment->applicable->setDbValue($rs->fields('applicable'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_pbb_detail_accomplishment;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_fp_pbb_detail_accomplishment->Row_Rendering();

		// Common render codes for all row types
		// pbb_id
		// cu_sequence
		// cu_short_name
		// cu_unit_name
		// focal_person_id
		// mfo_sequence
		// mfo
		// pi_no
		// pi_sub
		// mfo_name
		// pi_question
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
		// a_rating_above_90
		// a_rating_below_90
		// a_cutOffDate
		// a_cutOffDate_remarks
		// units_id
		// a_rating
		// mfo_id
		// a_supporting_docs_comparison
		// cutOffDate_id
		// mfo_name_rep
		// t_cutOffDate_fp
		// a_cutOffDate_fp
		// applicable

		if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View row

			// pbb_id
			$frm_fp_pbb_detail_accomplishment->pbb_id->ViewValue = $frm_fp_pbb_detail_accomplishment->pbb_id->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->pbb_id->ViewCustomAttributes = "";

			// cu_sequence
			$frm_fp_pbb_detail_accomplishment->cu_sequence->ViewValue = $frm_fp_pbb_detail_accomplishment->cu_sequence->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->cu_sequence->ViewCustomAttributes = "";

			// cu_short_name
			$frm_fp_pbb_detail_accomplishment->cu_short_name->ViewValue = $frm_fp_pbb_detail_accomplishment->cu_short_name->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->cu_short_name->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewValue = $frm_fp_pbb_detail_accomplishment->cu_unit_name->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewCustomAttributes = "";

			// focal_person_id
			$frm_fp_pbb_detail_accomplishment->focal_person_id->ViewValue = $frm_fp_pbb_detail_accomplishment->focal_person_id->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->focal_person_id->ViewCustomAttributes = "";

			// mfo_sequence
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo_sequence->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->ViewCustomAttributes = "";

			// mfo
			$frm_fp_pbb_detail_accomplishment->mfo->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->mfo->ViewCustomAttributes = "";

			// pi_no
			$frm_fp_pbb_detail_accomplishment->pi_no->ViewValue = $frm_fp_pbb_detail_accomplishment->pi_no->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->pi_no->ViewCustomAttributes = "";

			// pi_sub
			$frm_fp_pbb_detail_accomplishment->pi_sub->ViewValue = $frm_fp_pbb_detail_accomplishment->pi_sub->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->pi_sub->ViewCustomAttributes = "";

			// mfo_name
			$frm_fp_pbb_detail_accomplishment->mfo_name->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo_name->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->mfo_name->ViewCustomAttributes = "";

			// pi_question
			$frm_fp_pbb_detail_accomplishment->pi_question->ViewValue = $frm_fp_pbb_detail_accomplishment->pi_question->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->pi_question->ViewCustomAttributes = "";

			// target
			$frm_fp_pbb_detail_accomplishment->target->ViewValue = $frm_fp_pbb_detail_accomplishment->target->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->target->ViewCustomAttributes = "";

			// t_numerator
			$frm_fp_pbb_detail_accomplishment->t_numerator->ViewValue = $frm_fp_pbb_detail_accomplishment->t_numerator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator->ViewCustomAttributes = "";

			// t_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->ViewValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->ViewCustomAttributes = "";

			// t_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->ViewValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->ViewCustomAttributes = "";

			// t_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->ViewValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->ViewCustomAttributes = "";

			// t_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->ViewValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->ViewCustomAttributes = "";

			// t_denominator
			$frm_fp_pbb_detail_accomplishment->t_denominator->ViewValue = $frm_fp_pbb_detail_accomplishment->t_denominator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator->ViewCustomAttributes = "";

			// t_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->ViewValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->ViewCustomAttributes = "";

			// t_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->ViewValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->ViewCustomAttributes = "";

			// t_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->ViewValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->ViewCustomAttributes = "";

			// t_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->ViewValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->ViewCustomAttributes = "";

			// t_remarks
			$frm_fp_pbb_detail_accomplishment->t_remarks->ViewValue = $frm_fp_pbb_detail_accomplishment->t_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_remarks->ViewCustomAttributes = "";

			// t_cutOffDate
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->ViewValue = $frm_fp_pbb_detail_accomplishment->t_cutOffDate->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->ViewValue = up_FormatDateTime($frm_fp_pbb_detail_accomplishment->t_cutOffDate->ViewValue, 6);
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ViewValue = $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// accomplishment
			$frm_fp_pbb_detail_accomplishment->accomplishment->ViewValue = $frm_fp_pbb_detail_accomplishment->accomplishment->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$frm_fp_pbb_detail_accomplishment->a_numerator->ViewValue = $frm_fp_pbb_detail_accomplishment->a_numerator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_numerator->ViewCustomAttributes = "";

			// a_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->ViewValue = $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->ViewCustomAttributes = "";

			// a_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->ViewValue = $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->ViewCustomAttributes = "";

			// a_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->ViewValue = $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->ViewCustomAttributes = "";

			// a_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->ViewValue = $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->ViewCustomAttributes = "";

			// a_denominator
			$frm_fp_pbb_detail_accomplishment->a_denominator->ViewValue = $frm_fp_pbb_detail_accomplishment->a_denominator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_denominator->ViewCustomAttributes = "";

			// a_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->ViewValue = $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->ViewCustomAttributes = "";

			// a_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->ViewValue = $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->ViewCustomAttributes = "";

			// a_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->ViewValue = $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->ViewCustomAttributes = "";

			// a_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->ViewValue = $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->ViewCustomAttributes = "";

			// a_supporting_docs
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->ViewValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->ViewCustomAttributes = "";

			// a_supporting_docs_qtr1
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->ViewValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->ViewCustomAttributes = "";

			// a_supporting_docs_qtr2
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->ViewValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->ViewCustomAttributes = "";

			// a_supporting_docs_qtr3
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->ViewValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->ViewCustomAttributes = "";

			// a_supporting_docs_qtr4
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->ViewValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->ViewCustomAttributes = "";

			// a_remarks
			$frm_fp_pbb_detail_accomplishment->a_remarks->ViewValue = $frm_fp_pbb_detail_accomplishment->a_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_remarks->ViewCustomAttributes = "";

			// a_rating_above_90
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->ViewValue = $frm_fp_pbb_detail_accomplishment->a_rating_above_90->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->ViewCustomAttributes = "";

			// a_rating_below_90
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->ViewValue = $frm_fp_pbb_detail_accomplishment->a_rating_below_90->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->ViewCustomAttributes = "";

			// a_cutOffDate
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->ViewValue = $frm_fp_pbb_detail_accomplishment->a_cutOffDate->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->ViewValue = up_FormatDateTime($frm_fp_pbb_detail_accomplishment->a_cutOffDate->ViewValue, 6);
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->ViewCustomAttributes = "";

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewValue = $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// units_id
			$frm_fp_pbb_detail_accomplishment->units_id->ViewValue = $frm_fp_pbb_detail_accomplishment->units_id->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->units_id->ViewCustomAttributes = "";

			// a_rating
			$frm_fp_pbb_detail_accomplishment->a_rating->ViewValue = $frm_fp_pbb_detail_accomplishment->a_rating->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_rating->ViewCustomAttributes = "";

			// mfo_id
			$frm_fp_pbb_detail_accomplishment->mfo_id->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->mfo_id->ViewCustomAttributes = "";

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ViewValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ViewCustomAttributes = "";

			// cutOffDate_id
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->ViewValue = $frm_fp_pbb_detail_accomplishment->cutOffDate_id->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->ViewCustomAttributes = "";

			// mfo_name_rep
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo_name_rep->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->ViewCustomAttributes = "";

			// t_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ViewValue = $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ViewValue = up_FormatDateTime($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ViewValue, 6);
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ViewCustomAttributes = "";

			// a_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ViewValue = $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ViewValue = up_FormatDateTime($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ViewValue, 6);
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ViewCustomAttributes = "";

			// applicable
			$frm_fp_pbb_detail_accomplishment->applicable->ViewValue = $frm_fp_pbb_detail_accomplishment->applicable->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->applicable->ViewCustomAttributes = "";

			// pbb_id
			$frm_fp_pbb_detail_accomplishment->pbb_id->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pbb_id->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->pbb_id->TooltipValue = "";

			// cu_sequence
			$frm_fp_pbb_detail_accomplishment->cu_sequence->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cu_sequence->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->cu_sequence->TooltipValue = "";

			// cu_short_name
			$frm_fp_pbb_detail_accomplishment->cu_short_name->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cu_short_name->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->cu_short_name->TooltipValue = "";

			// cu_unit_name
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->TooltipValue = "";

			// focal_person_id
			$frm_fp_pbb_detail_accomplishment->focal_person_id->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->focal_person_id->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->focal_person_id->TooltipValue = "";

			// mfo_sequence
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->TooltipValue = "";

			// mfo
			$frm_fp_pbb_detail_accomplishment->mfo->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->mfo->TooltipValue = "";

			// pi_no
			$frm_fp_pbb_detail_accomplishment->pi_no->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pi_no->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->pi_no->TooltipValue = "";

			// pi_sub
			$frm_fp_pbb_detail_accomplishment->pi_sub->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pi_sub->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->pi_sub->TooltipValue = "";

			// mfo_name
			$frm_fp_pbb_detail_accomplishment->mfo_name->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_name->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->mfo_name->TooltipValue = "";

			// pi_question
			$frm_fp_pbb_detail_accomplishment->pi_question->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pi_question->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->pi_question->TooltipValue = "";

			// target
			$frm_fp_pbb_detail_accomplishment->target->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->target->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->target->TooltipValue = "";

			// t_numerator
			$frm_fp_pbb_detail_accomplishment->t_numerator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator->TooltipValue = "";

			// t_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->TooltipValue = "";

			// t_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->TooltipValue = "";

			// t_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->TooltipValue = "";

			// t_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->TooltipValue = "";

			// t_denominator
			$frm_fp_pbb_detail_accomplishment->t_denominator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator->TooltipValue = "";

			// t_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->TooltipValue = "";

			// t_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->TooltipValue = "";

			// t_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->TooltipValue = "";

			// t_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->TooltipValue = "";

			// t_remarks
			$frm_fp_pbb_detail_accomplishment->t_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_remarks->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_remarks->TooltipValue = "";

			// t_cutOffDate
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->TooltipValue = "";

			// accomplishment
			$frm_fp_pbb_detail_accomplishment->accomplishment->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->accomplishment->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->accomplishment->TooltipValue = "";

			// a_numerator
			$frm_fp_pbb_detail_accomplishment->a_numerator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator->TooltipValue = "";

			// a_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->TooltipValue = "";

			// a_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->TooltipValue = "";

			// a_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->TooltipValue = "";

			// a_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->TooltipValue = "";

			// a_denominator
			$frm_fp_pbb_detail_accomplishment->a_denominator->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator->TooltipValue = "";

			// a_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->TooltipValue = "";

			// a_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->TooltipValue = "";

			// a_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->TooltipValue = "";

			// a_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->TooltipValue = "";

			// a_supporting_docs
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->TooltipValue = "";

			// a_supporting_docs_qtr1
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->TooltipValue = "";

			// a_supporting_docs_qtr2
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->TooltipValue = "";

			// a_supporting_docs_qtr3
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->TooltipValue = "";

			// a_supporting_docs_qtr4
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->TooltipValue = "";

			// a_remarks
			$frm_fp_pbb_detail_accomplishment->a_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_remarks->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_remarks->TooltipValue = "";

			// a_rating_above_90
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->TooltipValue = "";

			// a_rating_below_90
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->TooltipValue = "";

			// a_cutOffDate
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->TooltipValue = "";

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->TooltipValue = "";

			// units_id
			$frm_fp_pbb_detail_accomplishment->units_id->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->units_id->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->units_id->TooltipValue = "";

			// a_rating
			$frm_fp_pbb_detail_accomplishment->a_rating->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_rating->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_rating->TooltipValue = "";

			// mfo_id
			$frm_fp_pbb_detail_accomplishment->mfo_id->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_id->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->mfo_id->TooltipValue = "";

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->TooltipValue = "";

			// cutOffDate_id
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->TooltipValue = "";

			// mfo_name_rep
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->TooltipValue = "";

			// t_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->TooltipValue = "";

			// a_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->TooltipValue = "";

			// applicable
			$frm_fp_pbb_detail_accomplishment->applicable->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->applicable->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->applicable->TooltipValue = "";
		} elseif ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// pbb_id
			$frm_fp_pbb_detail_accomplishment->pbb_id->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pbb_id->EditValue = $frm_fp_pbb_detail_accomplishment->pbb_id->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->pbb_id->ViewCustomAttributes = "";

			// cu_sequence
			$frm_fp_pbb_detail_accomplishment->cu_sequence->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cu_sequence->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->cu_sequence->CurrentValue);

			// cu_short_name
			$frm_fp_pbb_detail_accomplishment->cu_short_name->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cu_short_name->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->cu_short_name->CurrentValue);

			// cu_unit_name
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->cu_unit_name->CurrentValue);

			// focal_person_id
			$frm_fp_pbb_detail_accomplishment->focal_person_id->EditCustomAttributes = "";
			if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
				$frm_fp_pbb_detail_accomplishment->focal_person_id->CurrentValue = CurrentUserID();
			$frm_fp_pbb_detail_accomplishment->focal_person_id->EditValue = $frm_fp_pbb_detail_accomplishment->focal_person_id->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->focal_person_id->ViewCustomAttributes = "";
			} else {
			$frm_fp_pbb_detail_accomplishment->focal_person_id->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->focal_person_id->CurrentValue);
			}

			// mfo_sequence
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->mfo_sequence->CurrentValue);

			// mfo
			$frm_fp_pbb_detail_accomplishment->mfo->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->mfo->CurrentValue);

			// pi_no
			$frm_fp_pbb_detail_accomplishment->pi_no->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pi_no->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->pi_no->CurrentValue);

			// pi_sub
			$frm_fp_pbb_detail_accomplishment->pi_sub->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pi_sub->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->pi_sub->CurrentValue);

			// mfo_name
			$frm_fp_pbb_detail_accomplishment->mfo_name->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_name->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->mfo_name->CurrentValue);

			// pi_question
			$frm_fp_pbb_detail_accomplishment->pi_question->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pi_question->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->pi_question->CurrentValue);

			// target
			$frm_fp_pbb_detail_accomplishment->target->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->target->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->target->CurrentValue);

			// t_numerator
			$frm_fp_pbb_detail_accomplishment->t_numerator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator->CurrentValue);

			// t_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CurrentValue);

			// t_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CurrentValue);

			// t_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CurrentValue);

			// t_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CurrentValue);

			// t_denominator
			$frm_fp_pbb_detail_accomplishment->t_denominator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator->CurrentValue);

			// t_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CurrentValue);

			// t_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CurrentValue);

			// t_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CurrentValue);

			// t_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CurrentValue);

			// t_remarks
			$frm_fp_pbb_detail_accomplishment->t_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_remarks->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_remarks->CurrentValue);

			// t_cutOffDate
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->EditValue = up_HtmlEncode(up_FormatDateTime($frm_fp_pbb_detail_accomplishment->t_cutOffDate->CurrentValue, 6));

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CurrentValue);

			// accomplishment
			$frm_fp_pbb_detail_accomplishment->accomplishment->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->accomplishment->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->accomplishment->CurrentValue);

			// a_numerator
			$frm_fp_pbb_detail_accomplishment->a_numerator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_numerator->CurrentValue);

			// a_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->CurrentValue);

			// a_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->CurrentValue);

			// a_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->CurrentValue);

			// a_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->CurrentValue);

			// a_denominator
			$frm_fp_pbb_detail_accomplishment->a_denominator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_denominator->CurrentValue);

			// a_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->CurrentValue);

			// a_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->CurrentValue);

			// a_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->CurrentValue);

			// a_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->CurrentValue);

			// a_supporting_docs
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs->CurrentValue);

			// a_supporting_docs_qtr1
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->CurrentValue);

			// a_supporting_docs_qtr2
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->CurrentValue);

			// a_supporting_docs_qtr3
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->CurrentValue);

			// a_supporting_docs_qtr4
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->CurrentValue);

			// a_remarks
			$frm_fp_pbb_detail_accomplishment->a_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_remarks->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_remarks->CurrentValue);

			// a_rating_above_90
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_rating_above_90->CurrentValue);

			// a_rating_below_90
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_rating_below_90->CurrentValue);

			// a_cutOffDate
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->EditValue = up_HtmlEncode(up_FormatDateTime($frm_fp_pbb_detail_accomplishment->a_cutOffDate->CurrentValue, 6));

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CurrentValue);

			// units_id
			$frm_fp_pbb_detail_accomplishment->units_id->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->units_id->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->units_id->CurrentValue);

			// a_rating
			$frm_fp_pbb_detail_accomplishment->a_rating->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_rating->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_rating->CurrentValue);

			// mfo_id
			$frm_fp_pbb_detail_accomplishment->mfo_id->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_id->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue);

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->CurrentValue);

			// cutOffDate_id
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->cutOffDate_id->CurrentValue);

			// mfo_name_rep
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->mfo_name_rep->CurrentValue);

			// t_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->EditValue = up_HtmlEncode(up_FormatDateTime($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CurrentValue, 6));

			// a_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->EditValue = up_HtmlEncode(up_FormatDateTime($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CurrentValue, 6));

			// applicable
			$frm_fp_pbb_detail_accomplishment->applicable->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->applicable->EditValue = up_HtmlEncode($frm_fp_pbb_detail_accomplishment->applicable->CurrentValue);

			// Edit refer script
			// pbb_id

			$frm_fp_pbb_detail_accomplishment->pbb_id->HrefValue = "";

			// cu_sequence
			$frm_fp_pbb_detail_accomplishment->cu_sequence->HrefValue = "";

			// cu_short_name
			$frm_fp_pbb_detail_accomplishment->cu_short_name->HrefValue = "";

			// cu_unit_name
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->HrefValue = "";

			// focal_person_id
			$frm_fp_pbb_detail_accomplishment->focal_person_id->HrefValue = "";

			// mfo_sequence
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->HrefValue = "";

			// mfo
			$frm_fp_pbb_detail_accomplishment->mfo->HrefValue = "";

			// pi_no
			$frm_fp_pbb_detail_accomplishment->pi_no->HrefValue = "";

			// pi_sub
			$frm_fp_pbb_detail_accomplishment->pi_sub->HrefValue = "";

			// mfo_name
			$frm_fp_pbb_detail_accomplishment->mfo_name->HrefValue = "";

			// pi_question
			$frm_fp_pbb_detail_accomplishment->pi_question->HrefValue = "";

			// target
			$frm_fp_pbb_detail_accomplishment->target->HrefValue = "";

			// t_numerator
			$frm_fp_pbb_detail_accomplishment->t_numerator->HrefValue = "";

			// t_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->HrefValue = "";

			// t_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->HrefValue = "";

			// t_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->HrefValue = "";

			// t_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->HrefValue = "";

			// t_denominator
			$frm_fp_pbb_detail_accomplishment->t_denominator->HrefValue = "";

			// t_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->HrefValue = "";

			// t_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->HrefValue = "";

			// t_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->HrefValue = "";

			// t_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->HrefValue = "";

			// t_remarks
			$frm_fp_pbb_detail_accomplishment->t_remarks->HrefValue = "";

			// t_cutOffDate
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->HrefValue = "";

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->HrefValue = "";

			// accomplishment
			$frm_fp_pbb_detail_accomplishment->accomplishment->HrefValue = "";

			// a_numerator
			$frm_fp_pbb_detail_accomplishment->a_numerator->HrefValue = "";

			// a_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->HrefValue = "";

			// a_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->HrefValue = "";

			// a_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->HrefValue = "";

			// a_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->HrefValue = "";

			// a_denominator
			$frm_fp_pbb_detail_accomplishment->a_denominator->HrefValue = "";

			// a_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->HrefValue = "";

			// a_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->HrefValue = "";

			// a_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->HrefValue = "";

			// a_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->HrefValue = "";

			// a_supporting_docs
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->HrefValue = "";

			// a_supporting_docs_qtr1
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->HrefValue = "";

			// a_supporting_docs_qtr2
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->HrefValue = "";

			// a_supporting_docs_qtr3
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->HrefValue = "";

			// a_supporting_docs_qtr4
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->HrefValue = "";

			// a_remarks
			$frm_fp_pbb_detail_accomplishment->a_remarks->HrefValue = "";

			// a_rating_above_90
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->HrefValue = "";

			// a_rating_below_90
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->HrefValue = "";

			// a_cutOffDate
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->HrefValue = "";

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->HrefValue = "";

			// units_id
			$frm_fp_pbb_detail_accomplishment->units_id->HrefValue = "";

			// a_rating
			$frm_fp_pbb_detail_accomplishment->a_rating->HrefValue = "";

			// mfo_id
			$frm_fp_pbb_detail_accomplishment->mfo_id->HrefValue = "";

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->HrefValue = "";

			// cutOffDate_id
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->HrefValue = "";

			// mfo_name_rep
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->HrefValue = "";

			// t_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->HrefValue = "";

			// a_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->HrefValue = "";

			// applicable
			$frm_fp_pbb_detail_accomplishment->applicable->HrefValue = "";
		}
		if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_ADD ||
			$frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT ||
			$frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_fp_pbb_detail_accomplishment->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_fp_pbb_detail_accomplishment->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_pbb_detail_accomplishment->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_fp_pbb_detail_accomplishment;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($frm_fp_pbb_detail_accomplishment->cu_sequence->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->cu_sequence->FldErrMsg());
		}
		if (!up_CheckInteger($frm_fp_pbb_detail_accomplishment->focal_person_id->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->focal_person_id->FldErrMsg());
		}
		if (!up_CheckInteger($frm_fp_pbb_detail_accomplishment->mfo_sequence->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->mfo_sequence->FldErrMsg());
		}
		if (!up_CheckInteger($frm_fp_pbb_detail_accomplishment->mfo->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->mfo->FldErrMsg());
		}
		if (!is_null($frm_fp_pbb_detail_accomplishment->pi_no->FormValue) && $frm_fp_pbb_detail_accomplishment->pi_no->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_pbb_detail_accomplishment->pi_no->FldCaption());
		}
		if (!up_CheckInteger($frm_fp_pbb_detail_accomplishment->pi_no->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->pi_no->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->target->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->target->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->t_numerator->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->t_numerator->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->t_denominator->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->t_denominator->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_fp_pbb_detail_accomplishment->t_cutOffDate->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->t_cutOffDate->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->accomplishment->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->accomplishment->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_numerator->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_numerator->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_denominator->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_denominator->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_supporting_docs->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_supporting_docs->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_rating_above_90->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_rating_above_90->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_rating_below_90->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_rating_below_90->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_fp_pbb_detail_accomplishment->a_cutOffDate->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_cutOffDate->FldErrMsg());
		}
		if (!up_CheckInteger($frm_fp_pbb_detail_accomplishment->units_id->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->units_id->FldErrMsg());
		}
		if (!up_CheckNumber($frm_fp_pbb_detail_accomplishment->a_rating->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_rating->FldErrMsg());
		}
		if (!up_CheckInteger($frm_fp_pbb_detail_accomplishment->mfo_id->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->mfo_id->FldErrMsg());
		}
		if (!up_CheckInteger($frm_fp_pbb_detail_accomplishment->cutOffDate_id->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->cutOffDate_id->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->FldErrMsg());
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			up_AddMessage($gsFormError, $sFormCustomError);
		}
		return $ValidateForm;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language, $frm_fp_pbb_detail_accomplishment;
		$sFilter = $frm_fp_pbb_detail_accomplishment->KeyFilter();
		$frm_fp_pbb_detail_accomplishment->CurrentFilter = $sFilter;
		$sSql = $frm_fp_pbb_detail_accomplishment->SQL();
		$conn->raiseErrorFn = 'up_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// cu_sequence
			$frm_fp_pbb_detail_accomplishment->cu_sequence->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->cu_sequence->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->cu_sequence->ReadOnly);

			// cu_short_name
			$frm_fp_pbb_detail_accomplishment->cu_short_name->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->cu_short_name->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->cu_short_name->ReadOnly);

			// cu_unit_name
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->cu_unit_name->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->cu_unit_name->ReadOnly);

			// focal_person_id
			$frm_fp_pbb_detail_accomplishment->focal_person_id->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->focal_person_id->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->focal_person_id->ReadOnly);

			// mfo_sequence
			$frm_fp_pbb_detail_accomplishment->mfo_sequence->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->mfo_sequence->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->mfo_sequence->ReadOnly);

			// mfo
			$frm_fp_pbb_detail_accomplishment->mfo->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->mfo->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->mfo->ReadOnly);

			// pi_no
			$frm_fp_pbb_detail_accomplishment->pi_no->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->pi_no->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->pi_no->ReadOnly);

			// pi_sub
			$frm_fp_pbb_detail_accomplishment->pi_sub->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->pi_sub->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->pi_sub->ReadOnly);

			// mfo_name
			$frm_fp_pbb_detail_accomplishment->mfo_name->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->mfo_name->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->mfo_name->ReadOnly);

			// pi_question
			$frm_fp_pbb_detail_accomplishment->pi_question->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->pi_question->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->pi_question->ReadOnly);

			// target
			$frm_fp_pbb_detail_accomplishment->target->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->target->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->target->ReadOnly);

			// t_numerator
			$frm_fp_pbb_detail_accomplishment->t_numerator->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->t_numerator->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->t_numerator->ReadOnly);

			// t_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->ReadOnly);

			// t_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->ReadOnly);

			// t_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->ReadOnly);

			// t_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->ReadOnly);

			// t_denominator
			$frm_fp_pbb_detail_accomplishment->t_denominator->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->t_denominator->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->t_denominator->ReadOnly);

			// t_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->ReadOnly);

			// t_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->ReadOnly);

			// t_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->ReadOnly);

			// t_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->ReadOnly);

			// t_remarks
			$frm_fp_pbb_detail_accomplishment->t_remarks->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->t_remarks->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->t_remarks->ReadOnly);

			// t_cutOffDate
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_fp_pbb_detail_accomplishment->t_cutOffDate->CurrentValue, 6), NULL, $frm_fp_pbb_detail_accomplishment->t_cutOffDate->ReadOnly);

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ReadOnly);

			// accomplishment
			$frm_fp_pbb_detail_accomplishment->accomplishment->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->accomplishment->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->accomplishment->ReadOnly);

			// a_numerator
			$frm_fp_pbb_detail_accomplishment->a_numerator->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_numerator->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_numerator->ReadOnly);

			// a_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->ReadOnly);

			// a_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->ReadOnly);

			// a_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->ReadOnly);

			// a_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->ReadOnly);

			// a_denominator
			$frm_fp_pbb_detail_accomplishment->a_denominator->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_denominator->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_denominator->ReadOnly);

			// a_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->ReadOnly);

			// a_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->ReadOnly);

			// a_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->ReadOnly);

			// a_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->ReadOnly);

			// a_supporting_docs
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_supporting_docs->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_supporting_docs->ReadOnly);

			// a_supporting_docs_qtr1
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->ReadOnly);

			// a_supporting_docs_qtr2
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->ReadOnly);

			// a_supporting_docs_qtr3
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->ReadOnly);

			// a_supporting_docs_qtr4
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->ReadOnly);

			// a_remarks
			$frm_fp_pbb_detail_accomplishment->a_remarks->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_remarks->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_remarks->ReadOnly);

			// a_rating_above_90
			$frm_fp_pbb_detail_accomplishment->a_rating_above_90->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_rating_above_90->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_rating_above_90->ReadOnly);

			// a_rating_below_90
			$frm_fp_pbb_detail_accomplishment->a_rating_below_90->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_rating_below_90->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_rating_below_90->ReadOnly);

			// a_cutOffDate
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_fp_pbb_detail_accomplishment->a_cutOffDate->CurrentValue, 6), NULL, $frm_fp_pbb_detail_accomplishment->a_cutOffDate->ReadOnly);

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ReadOnly);

			// units_id
			$frm_fp_pbb_detail_accomplishment->units_id->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->units_id->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->units_id->ReadOnly);

			// a_rating
			$frm_fp_pbb_detail_accomplishment->a_rating->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_rating->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_rating->ReadOnly);

			// mfo_id
			$frm_fp_pbb_detail_accomplishment->mfo_id->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->mfo_id->ReadOnly);

			// a_supporting_docs_comparison
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ReadOnly);

			// cutOffDate_id
			$frm_fp_pbb_detail_accomplishment->cutOffDate_id->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->cutOffDate_id->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->cutOffDate_id->ReadOnly);

			// mfo_name_rep
			$frm_fp_pbb_detail_accomplishment->mfo_name_rep->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->mfo_name_rep->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->mfo_name_rep->ReadOnly);

			// t_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CurrentValue, 6), NULL, $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ReadOnly);

			// a_cutOffDate_fp
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CurrentValue, 6), NULL, $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ReadOnly);

			// applicable
			$frm_fp_pbb_detail_accomplishment->applicable->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->applicable->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->applicable->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_fp_pbb_detail_accomplishment->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_fp_pbb_detail_accomplishment->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_fp_pbb_detail_accomplishment->CancelMessage <> "") {
					$this->setFailureMessage($frm_fp_pbb_detail_accomplishment->CancelMessage);
					$frm_fp_pbb_detail_accomplishment->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_fp_pbb_detail_accomplishment->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
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
}
?>
