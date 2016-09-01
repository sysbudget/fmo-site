<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_9_m_sa_mfo_questionsinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_9_m_sa_mfo_questions_add = new cfrm_9_m_sa_mfo_questions_add();
$Page =& $frm_9_m_sa_mfo_questions_add;

// Page init
$frm_9_m_sa_mfo_questions_add->Page_Init();

// Page main
$frm_9_m_sa_mfo_questions_add->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_9_m_sa_mfo_questions_add = new up_Page("frm_9_m_sa_mfo_questions_add");

// page properties
frm_9_m_sa_mfo_questions_add.PageID = "add"; // page ID
frm_9_m_sa_mfo_questions_add.FormID = "ffrm_9_m_sa_mfo_questionsadd"; // form ID
var UP_PAGE_ID = frm_9_m_sa_mfo_questions_add.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_9_m_sa_mfo_questions_add.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_mfo_question_online_pi_seq"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_mfo_question_online_insert_question_mfo"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_mfo_question_online_computation_du_cu_summary"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_mfo_question_report_form_a_1_mfo"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_mfo_question_report_form_a_1_sequence"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_mfo_question_report_form_a_gaa_value"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_pi_no"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_9_m_sa_mfo_questions->pi_no->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_pi_no"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_mfo_questions->pi_no->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_iatf_2013"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_mfo_questions->iatf_2013->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_iatf_2014"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_mfo_questions->iatf_2014->FldErrMsg()) ?>");

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
frm_9_m_sa_mfo_questions_add.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_9_m_sa_mfo_questions_add.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_9_m_sa_mfo_questions_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_9_m_sa_mfo_questions_add.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Add") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_9_m_sa_mfo_questions->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_9_m_sa_mfo_questions->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_9_m_sa_mfo_questions_add->ShowPageHeader(); ?>
<?php
$frm_9_m_sa_mfo_questions_add->ShowMessage();
?>
<form name="ffrm_9_m_sa_mfo_questionsadd" id="ffrm_9_m_sa_mfo_questionsadd" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return frm_9_m_sa_mfo_questions_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="frm_9_m_sa_mfo_questions">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->Visible) { // mfo_question_online_pi_seq ?>
	<tr id="r_mfo_question_online_pi_seq"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CellAttributes() ?>><span id="el_mfo_question_online_pi_seq">
<input type="text" name="x_mfo_question_online_pi_seq" id="x_mfo_question_online_pi_seq" size="30" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->Visible) { // mfo_question_online_mfo_name ?>
	<tr id="r_mfo_question_online_mfo_name"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CellAttributes() ?>><span id="el_mfo_question_online_mfo_name">
<input type="text" name="x_mfo_question_online_mfo_name" id="x_mfo_question_online_mfo_name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->Visible) { // mfo_question_online_pi_question ?>
	<tr id="r_mfo_question_online_pi_question"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CellAttributes() ?>><span id="el_mfo_question_online_pi_question">
<input type="text" name="x_mfo_question_online_pi_question" id="x_mfo_question_online_pi_question" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_expected_answer->Visible) { // mfo_question_expected_answer ?>
	<tr id="r_mfo_question_expected_answer"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_answer->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_answer->CellAttributes() ?>><span id="el_mfo_question_expected_answer">
<input type="text" name="x_mfo_question_expected_answer" id="x_mfo_question_expected_answer" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_answer->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_answer->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_answer->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->Visible) { // mfo_question_online_insert_question_mfo ?>
	<tr id="r_mfo_question_online_insert_question_mfo"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->CellAttributes() ?>><span id="el_mfo_question_online_insert_question_mfo">
<input type="text" name="x_mfo_question_online_insert_question_mfo" id="x_mfo_question_online_insert_question_mfo" size="30" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->Visible) { // mfo_question_online_insert_question_mfo_name_rep ?>
	<tr id="r_mfo_question_online_insert_question_mfo_name_rep"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->CellAttributes() ?>><span id="el_mfo_question_online_insert_question_mfo_name_rep">
<input type="text" name="x_mfo_question_online_insert_question_mfo_name_rep" id="x_mfo_question_online_insert_question_mfo_name_rep" size="30" maxlength="45" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->Visible) { // mfo_question_online_computation_du_cu_summary ?>
	<tr id="r_mfo_question_online_computation_du_cu_summary"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CellAttributes() ?>><span id="el_mfo_question_online_computation_du_cu_summary">
<input type="text" name="x_mfo_question_online_computation_du_cu_summary" id="x_mfo_question_online_computation_du_cu_summary" size="30" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->Visible) { // mfo_question_online_computation_du_cu_summary_name ?>
	<tr id="r_mfo_question_online_computation_du_cu_summary_name"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CellAttributes() ?>><span id="el_mfo_question_online_computation_du_cu_summary_name">
<input type="text" name="x_mfo_question_online_computation_du_cu_summary_name" id="x_mfo_question_online_computation_du_cu_summary_name" size="30" maxlength="45" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->Visible) { // mfo_question_online_computation_denominator ?>
	<tr id="r_mfo_question_online_computation_denominator"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->CellAttributes() ?>><span id="el_mfo_question_online_computation_denominator">
<input type="text" name="x_mfo_question_online_computation_denominator" id="x_mfo_question_online_computation_denominator" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->Visible) { // mfo_question_supporting_document_requirement ?>
	<tr id="r_mfo_question_supporting_document_requirement"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->CellAttributes() ?>><span id="el_mfo_question_supporting_document_requirement">
<input type="text" name="x_mfo_question_supporting_document_requirement" id="x_mfo_question_supporting_document_requirement" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_expected_trend->Visible) { // mfo_question_expected_trend ?>
	<tr id="r_mfo_question_expected_trend"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_trend->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_trend->CellAttributes() ?>><span id="el_mfo_question_expected_trend">
<input type="text" name="x_mfo_question_expected_trend" id="x_mfo_question_expected_trend" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_trend->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_trend->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_trend->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->Visible) { // mfo_question_online_ask_y_n ?>
	<tr id="r_mfo_question_online_ask_y_n"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->CellAttributes() ?>><span id="el_mfo_question_online_ask_y_n">
<input type="text" name="x_mfo_question_online_ask_y_n" id="x_mfo_question_online_ask_y_n" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->Visible) { // mfo_question_online_pi_question_numerator ?>
	<tr id="r_mfo_question_online_pi_question_numerator"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->CellAttributes() ?>><span id="el_mfo_question_online_pi_question_numerator">
<input type="text" name="x_mfo_question_online_pi_question_numerator" id="x_mfo_question_online_pi_question_numerator" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->Visible) { // mfo_question_online_pi_question_denominator ?>
	<tr id="r_mfo_question_online_pi_question_denominator"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->CellAttributes() ?>><span id="el_mfo_question_online_pi_question_denominator">
<input type="text" name="x_mfo_question_online_pi_question_denominator" id="x_mfo_question_online_pi_question_denominator" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->Visible) { // mfo_question_expected_numerator ?>
	<tr id="r_mfo_question_expected_numerator"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->CellAttributes() ?>><span id="el_mfo_question_expected_numerator">
<input type="text" name="x_mfo_question_expected_numerator" id="x_mfo_question_expected_numerator" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->Visible) { // mfo_question_expected_denominator ?>
	<tr id="r_mfo_question_expected_denominator"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->CellAttributes() ?>><span id="el_mfo_question_expected_denominator">
<input type="text" name="x_mfo_question_expected_denominator" id="x_mfo_question_expected_denominator" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->Visible) { // mfo_question_report_mfo_name ?>
	<tr id="r_mfo_question_report_mfo_name"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->CellAttributes() ?>><span id="el_mfo_question_report_mfo_name">
<input type="text" name="x_mfo_question_report_mfo_name" id="x_mfo_question_report_mfo_name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->Visible) { // mfo_question_report_form_a_pi_question ?>
	<tr id="r_mfo_question_report_form_a_pi_question"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->CellAttributes() ?>><span id="el_mfo_question_report_form_a_pi_question">
<input type="text" name="x_mfo_question_report_form_a_pi_question" id="x_mfo_question_report_form_a_pi_question" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->Visible) { // mfo_question_report_form_a_1_mfo ?>
	<tr id="r_mfo_question_report_form_a_1_mfo"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->CellAttributes() ?>><span id="el_mfo_question_report_form_a_1_mfo">
<input type="text" name="x_mfo_question_report_form_a_1_mfo" id="x_mfo_question_report_form_a_1_mfo" size="30" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->Visible) { // mfo_question_report_form_a_1_sequence ?>
	<tr id="r_mfo_question_report_form_a_1_sequence"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->CellAttributes() ?>><span id="el_mfo_question_report_form_a_1_sequence">
<input type="text" name="x_mfo_question_report_form_a_1_sequence" id="x_mfo_question_report_form_a_1_sequence" size="30" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->Visible) { // mfo_question_report_form_a_gaa_value ?>
	<tr id="r_mfo_question_report_form_a_gaa_value"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->CellAttributes() ?>><span id="el_mfo_question_report_form_a_gaa_value">
<input type="text" name="x_mfo_question_report_form_a_gaa_value" id="x_mfo_question_report_form_a_gaa_value" size="30" value="<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->pi_no->Visible) { // pi_no ?>
	<tr id="r_pi_no"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->pi_no->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->pi_no->CellAttributes() ?>><span id="el_pi_no">
<input type="text" name="x_pi_no" id="x_pi_no" size="30" value="<?php echo $frm_9_m_sa_mfo_questions->pi_no->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->pi_no->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->pi_no->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->pi_sub->Visible) { // pi_sub ?>
	<tr id="r_pi_sub"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->pi_sub->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->pi_sub->CellAttributes() ?>><span id="el_pi_sub">
<input type="text" name="x_pi_sub" id="x_pi_sub" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_mfo_questions->pi_sub->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->pi_sub->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->pi_sub->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->iatf_2013->Visible) { // iatf_2013 ?>
	<tr id="r_iatf_2013"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->iatf_2013->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->iatf_2013->CellAttributes() ?>><span id="el_iatf_2013">
<input type="text" name="x_iatf_2013" id="x_iatf_2013" size="30" value="<?php echo $frm_9_m_sa_mfo_questions->iatf_2013->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->iatf_2013->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->iatf_2013->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_mfo_questions->iatf_2014->Visible) { // iatf_2014 ?>
	<tr id="r_iatf_2014"<?php echo $frm_9_m_sa_mfo_questions->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_mfo_questions->iatf_2014->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_mfo_questions->iatf_2014->CellAttributes() ?>><span id="el_iatf_2014">
<input type="text" name="x_iatf_2014" id="x_iatf_2014" size="30" value="<?php echo $frm_9_m_sa_mfo_questions->iatf_2014->EditValue ?>"<?php echo $frm_9_m_sa_mfo_questions->iatf_2014->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_mfo_questions->iatf_2014->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("AddBtn")) ?>">
</form>
<?php
$frm_9_m_sa_mfo_questions_add->ShowPageFooter();
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
$frm_9_m_sa_mfo_questions_add->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_9_m_sa_mfo_questions_add {

	// Page ID
	var $PageID = 'add';

	// Table name
	var $TableName = 'frm_9_m_sa_mfo_questions';

	// Page object name
	var $PageObjName = 'frm_9_m_sa_mfo_questions_add';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_9_m_sa_mfo_questions;
		if ($frm_9_m_sa_mfo_questions->UseTokenInUrl) $PageUrl .= "t=" . $frm_9_m_sa_mfo_questions->TableVar . "&"; // Add page token
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
		global $objForm, $frm_9_m_sa_mfo_questions;
		if ($frm_9_m_sa_mfo_questions->UseTokenInUrl) {
			if ($objForm)
				return ($frm_9_m_sa_mfo_questions->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_9_m_sa_mfo_questions->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_9_m_sa_mfo_questions_add() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_mfo_questions)
		if (!isset($GLOBALS["frm_9_m_sa_mfo_questions"])) {
			$GLOBALS["frm_9_m_sa_mfo_questions"] = new cfrm_9_m_sa_mfo_questions();
			$GLOBALS["Table"] =& $GLOBALS["frm_9_m_sa_mfo_questions"];
		}

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_9_m_sa_mfo_questions', TRUE);

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
		global $frm_9_m_sa_mfo_questions;

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
		if (!$Security->CanAdd()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("frm_9_m_sa_mfo_questionslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

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
	var $DbMasterFilter = "";
	var $DbDetailFilter = "";
	var $Priv = 0;
	var $OldRecordset;
	var $CopyRecord;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $frm_9_m_sa_mfo_questions;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$frm_9_m_sa_mfo_questions->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values

			// Validate form
			if (!$this->ValidateForm()) {
				$frm_9_m_sa_mfo_questions->CurrentAction = "I"; // Form error, reset action
				$frm_9_m_sa_mfo_questions->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["mfo_question_id"] != "") {
				$frm_9_m_sa_mfo_questions->mfo_question_id->setQueryStringValue($_GET["mfo_question_id"]);
				$frm_9_m_sa_mfo_questions->setKey("mfo_question_id", $frm_9_m_sa_mfo_questions->mfo_question_id->CurrentValue); // Set up key
			} else {
				$frm_9_m_sa_mfo_questions->setKey("mfo_question_id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$frm_9_m_sa_mfo_questions->CurrentAction = "C"; // Copy record
			} else {
				$frm_9_m_sa_mfo_questions->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Perform action based on action code
		switch ($frm_9_m_sa_mfo_questions->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("frm_9_m_sa_mfo_questionslist.php"); // No matching record, return to list
				}
				break;
			case "A": // ' Add new record
				$frm_9_m_sa_mfo_questions->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $frm_9_m_sa_mfo_questions->getReturnUrl();
					if (up_GetPageName($sReturnUrl) == "frm_9_m_sa_mfo_questionsview.php")
						$sReturnUrl = $frm_9_m_sa_mfo_questions->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$frm_9_m_sa_mfo_questions->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$frm_9_m_sa_mfo_questions->RowType = UP_ROWTYPE_ADD;  // Render add type

		// Render row
		$frm_9_m_sa_mfo_questions->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_9_m_sa_mfo_questions;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load default values
	function LoadDefaultValues() {
		global $frm_9_m_sa_mfo_questions;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_expected_answer->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_expected_trend->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->OldValue = $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->CurrentValue;
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->CurrentValue = 0.00;
		$frm_9_m_sa_mfo_questions->pi_no->CurrentValue = 0;
		$frm_9_m_sa_mfo_questions->pi_sub->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->pi_sub->OldValue = $frm_9_m_sa_mfo_questions->pi_sub->CurrentValue;
		$frm_9_m_sa_mfo_questions->iatf_2013->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->iatf_2013->OldValue = $frm_9_m_sa_mfo_questions->iatf_2013->CurrentValue;
		$frm_9_m_sa_mfo_questions->iatf_2014->CurrentValue = NULL;
		$frm_9_m_sa_mfo_questions->iatf_2014->OldValue = $frm_9_m_sa_mfo_questions->iatf_2014->CurrentValue;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_9_m_sa_mfo_questions;
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->setFormValue($objForm->GetValue("x_mfo_question_online_pi_seq"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->setFormValue($objForm->GetValue("x_mfo_question_online_mfo_name"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->setFormValue($objForm->GetValue("x_mfo_question_online_pi_question"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->setFormValue($objForm->GetValue("x_mfo_question_expected_answer"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->setFormValue($objForm->GetValue("x_mfo_question_online_insert_question_mfo"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->setFormValue($objForm->GetValue("x_mfo_question_online_insert_question_mfo_name_rep"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->setFormValue($objForm->GetValue("x_mfo_question_online_computation_du_cu_summary"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->setFormValue($objForm->GetValue("x_mfo_question_online_computation_du_cu_summary_name"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->setFormValue($objForm->GetValue("x_mfo_question_online_computation_denominator"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->setFormValue($objForm->GetValue("x_mfo_question_supporting_document_requirement"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->setFormValue($objForm->GetValue("x_mfo_question_expected_trend"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->setFormValue($objForm->GetValue("x_mfo_question_online_ask_y_n"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->setFormValue($objForm->GetValue("x_mfo_question_online_pi_question_numerator"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->setFormValue($objForm->GetValue("x_mfo_question_online_pi_question_denominator"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->setFormValue($objForm->GetValue("x_mfo_question_expected_numerator"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->setFormValue($objForm->GetValue("x_mfo_question_expected_denominator"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->setFormValue($objForm->GetValue("x_mfo_question_report_mfo_name"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->setFormValue($objForm->GetValue("x_mfo_question_report_form_a_pi_question"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->setFormValue($objForm->GetValue("x_mfo_question_report_form_a_1_mfo"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->setFormValue($objForm->GetValue("x_mfo_question_report_form_a_1_sequence"));
		}
		if (!$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->setFormValue($objForm->GetValue("x_mfo_question_report_form_a_gaa_value"));
		}
		if (!$frm_9_m_sa_mfo_questions->pi_no->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->pi_no->setFormValue($objForm->GetValue("x_pi_no"));
		}
		if (!$frm_9_m_sa_mfo_questions->pi_sub->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->pi_sub->setFormValue($objForm->GetValue("x_pi_sub"));
		}
		if (!$frm_9_m_sa_mfo_questions->iatf_2013->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->iatf_2013->setFormValue($objForm->GetValue("x_iatf_2013"));
		}
		if (!$frm_9_m_sa_mfo_questions->iatf_2014->FldIsDetailKey) {
			$frm_9_m_sa_mfo_questions->iatf_2014->setFormValue($objForm->GetValue("x_iatf_2014"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_9_m_sa_mfo_questions;
		$this->LoadOldRecord();
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_expected_answer->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_expected_trend->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->FormValue;
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->CurrentValue = $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->FormValue;
		$frm_9_m_sa_mfo_questions->pi_no->CurrentValue = $frm_9_m_sa_mfo_questions->pi_no->FormValue;
		$frm_9_m_sa_mfo_questions->pi_sub->CurrentValue = $frm_9_m_sa_mfo_questions->pi_sub->FormValue;
		$frm_9_m_sa_mfo_questions->iatf_2013->CurrentValue = $frm_9_m_sa_mfo_questions->iatf_2013->FormValue;
		$frm_9_m_sa_mfo_questions->iatf_2014->CurrentValue = $frm_9_m_sa_mfo_questions->iatf_2014->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_9_m_sa_mfo_questions;
		$sFilter = $frm_9_m_sa_mfo_questions->KeyFilter();

		// Call Row Selecting event
		$frm_9_m_sa_mfo_questions->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_9_m_sa_mfo_questions->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_mfo_questions->SQL();
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
		global $conn, $frm_9_m_sa_mfo_questions;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_9_m_sa_mfo_questions->Row_Selected($row);
		$frm_9_m_sa_mfo_questions->mfo_question_id->setDbValue($rs->fields('mfo_question_id'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->setDbValue($rs->fields('mfo_question_online_pi_seq'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->setDbValue($rs->fields('mfo_question_online_mfo_name'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->setDbValue($rs->fields('mfo_question_online_pi_question'));
		$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->setDbValue($rs->fields('mfo_question_expected_answer'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->setDbValue($rs->fields('mfo_question_online_insert_question_mfo'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->setDbValue($rs->fields('mfo_question_online_insert_question_mfo_name_rep'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->setDbValue($rs->fields('mfo_question_online_computation_du_cu_summary'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->setDbValue($rs->fields('mfo_question_online_computation_du_cu_summary_name'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->setDbValue($rs->fields('mfo_question_online_computation_denominator'));
		$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->setDbValue($rs->fields('mfo_question_supporting_document_requirement'));
		$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->setDbValue($rs->fields('mfo_question_expected_trend'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->setDbValue($rs->fields('mfo_question_online_ask_y_n'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->setDbValue($rs->fields('mfo_question_online_pi_question_numerator'));
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->setDbValue($rs->fields('mfo_question_online_pi_question_denominator'));
		$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->setDbValue($rs->fields('mfo_question_expected_numerator'));
		$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->setDbValue($rs->fields('mfo_question_expected_denominator'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->setDbValue($rs->fields('mfo_question_report_mfo_name'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->setDbValue($rs->fields('mfo_question_report_form_a_pi_question'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->setDbValue($rs->fields('mfo_question_report_form_a_1_mfo'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->setDbValue($rs->fields('mfo_question_report_form_a_1_sequence'));
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->setDbValue($rs->fields('mfo_question_report_form_a_gaa_value'));
		$frm_9_m_sa_mfo_questions->pi_no->setDbValue($rs->fields('pi_no'));
		$frm_9_m_sa_mfo_questions->pi_sub->setDbValue($rs->fields('pi_sub'));
		$frm_9_m_sa_mfo_questions->iatf_2013->setDbValue($rs->fields('iatf_2013'));
		$frm_9_m_sa_mfo_questions->iatf_2014->setDbValue($rs->fields('iatf_2014'));
	}

	// Load old record
	function LoadOldRecord() {
		global $frm_9_m_sa_mfo_questions;

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($frm_9_m_sa_mfo_questions->getKey("mfo_question_id")) <> "")
			$frm_9_m_sa_mfo_questions->mfo_question_id->CurrentValue = $frm_9_m_sa_mfo_questions->getKey("mfo_question_id"); // mfo_question_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$frm_9_m_sa_mfo_questions->CurrentFilter = $frm_9_m_sa_mfo_questions->KeyFilter();
			$sSql = $frm_9_m_sa_mfo_questions->SQL();
			$this->OldRecordset = up_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_mfo_questions;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_9_m_sa_mfo_questions->Row_Rendering();

		// Common render codes for all row types
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

		if ($frm_9_m_sa_mfo_questions->RowType == UP_ROWTYPE_VIEW) { // View row

			// mfo_question_id
			$frm_9_m_sa_mfo_questions->mfo_question_id->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_id->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_id->ViewCustomAttributes = "";

			// mfo_question_online_pi_seq
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->ViewCustomAttributes = "";

			// mfo_question_online_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->ViewCustomAttributes = "";

			// mfo_question_online_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->ViewCustomAttributes = "";

			// mfo_question_expected_answer
			$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_expected_answer->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->ViewCustomAttributes = "";

			// mfo_question_online_insert_question_mfo
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->ViewCustomAttributes = "";

			// mfo_question_online_insert_question_mfo_name_rep
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->ViewCustomAttributes = "";

			// mfo_question_online_computation_du_cu_summary
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->ViewCustomAttributes = "";

			// mfo_question_online_computation_du_cu_summary_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->ViewCustomAttributes = "";

			// mfo_question_online_computation_denominator
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->ViewCustomAttributes = "";

			// mfo_question_supporting_document_requirement
			$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->ViewCustomAttributes = "";

			// mfo_question_expected_trend
			$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_expected_trend->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->ViewCustomAttributes = "";

			// mfo_question_online_ask_y_n
			$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->ViewCustomAttributes = "";

			// mfo_question_online_pi_question_numerator
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->ViewCustomAttributes = "";

			// mfo_question_online_pi_question_denominator
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->ViewCustomAttributes = "";

			// mfo_question_expected_numerator
			$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->ViewCustomAttributes = "";

			// mfo_question_expected_denominator
			$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->ViewCustomAttributes = "";

			// mfo_question_report_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->ViewCustomAttributes = "";

			// mfo_question_report_form_a_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->ViewCustomAttributes = "";

			// mfo_question_report_form_a_1_mfo
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->ViewCustomAttributes = "";

			// mfo_question_report_form_a_1_sequence
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->ViewCustomAttributes = "";

			// mfo_question_report_form_a_gaa_value
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->ViewValue = $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->CurrentValue;
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->ViewCustomAttributes = "";

			// pi_no
			$frm_9_m_sa_mfo_questions->pi_no->ViewValue = $frm_9_m_sa_mfo_questions->pi_no->CurrentValue;
			$frm_9_m_sa_mfo_questions->pi_no->ViewCustomAttributes = "";

			// pi_sub
			$frm_9_m_sa_mfo_questions->pi_sub->ViewValue = $frm_9_m_sa_mfo_questions->pi_sub->CurrentValue;
			$frm_9_m_sa_mfo_questions->pi_sub->ViewCustomAttributes = "";

			// iatf_2013
			$frm_9_m_sa_mfo_questions->iatf_2013->ViewValue = $frm_9_m_sa_mfo_questions->iatf_2013->CurrentValue;
			$frm_9_m_sa_mfo_questions->iatf_2013->ViewCustomAttributes = "";

			// iatf_2014
			$frm_9_m_sa_mfo_questions->iatf_2014->ViewValue = $frm_9_m_sa_mfo_questions->iatf_2014->CurrentValue;
			$frm_9_m_sa_mfo_questions->iatf_2014->ViewCustomAttributes = "";

			// mfo_question_online_pi_seq
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->TooltipValue = "";

			// mfo_question_online_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->TooltipValue = "";

			// mfo_question_online_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->TooltipValue = "";

			// mfo_question_expected_answer
			$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->TooltipValue = "";

			// mfo_question_online_insert_question_mfo
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->TooltipValue = "";

			// mfo_question_online_insert_question_mfo_name_rep
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->TooltipValue = "";

			// mfo_question_online_computation_du_cu_summary
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->TooltipValue = "";

			// mfo_question_online_computation_du_cu_summary_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->TooltipValue = "";

			// mfo_question_online_computation_denominator
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->TooltipValue = "";

			// mfo_question_supporting_document_requirement
			$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->TooltipValue = "";

			// mfo_question_expected_trend
			$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->TooltipValue = "";

			// mfo_question_online_ask_y_n
			$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->TooltipValue = "";

			// mfo_question_online_pi_question_numerator
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->TooltipValue = "";

			// mfo_question_online_pi_question_denominator
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->TooltipValue = "";

			// mfo_question_expected_numerator
			$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->TooltipValue = "";

			// mfo_question_expected_denominator
			$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->TooltipValue = "";

			// mfo_question_report_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->TooltipValue = "";

			// mfo_question_report_form_a_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->TooltipValue = "";

			// mfo_question_report_form_a_1_mfo
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->TooltipValue = "";

			// mfo_question_report_form_a_1_sequence
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->TooltipValue = "";

			// mfo_question_report_form_a_gaa_value
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->HrefValue = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->TooltipValue = "";

			// pi_no
			$frm_9_m_sa_mfo_questions->pi_no->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->pi_no->HrefValue = "";
			$frm_9_m_sa_mfo_questions->pi_no->TooltipValue = "";

			// pi_sub
			$frm_9_m_sa_mfo_questions->pi_sub->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->pi_sub->HrefValue = "";
			$frm_9_m_sa_mfo_questions->pi_sub->TooltipValue = "";

			// iatf_2013
			$frm_9_m_sa_mfo_questions->iatf_2013->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->iatf_2013->HrefValue = "";
			$frm_9_m_sa_mfo_questions->iatf_2013->TooltipValue = "";

			// iatf_2014
			$frm_9_m_sa_mfo_questions->iatf_2014->LinkCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->iatf_2014->HrefValue = "";
			$frm_9_m_sa_mfo_questions->iatf_2014->TooltipValue = "";
		} elseif ($frm_9_m_sa_mfo_questions->RowType == UP_ROWTYPE_ADD) { // Add row

			// mfo_question_online_pi_seq
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CurrentValue);

			// mfo_question_online_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CurrentValue);

			// mfo_question_online_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CurrentValue);

			// mfo_question_expected_answer
			$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_expected_answer->CurrentValue);

			// mfo_question_online_insert_question_mfo
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->CurrentValue);

			// mfo_question_online_insert_question_mfo_name_rep
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->CurrentValue);

			// mfo_question_online_computation_du_cu_summary
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CurrentValue);

			// mfo_question_online_computation_du_cu_summary_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CurrentValue);

			// mfo_question_online_computation_denominator
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->CurrentValue);

			// mfo_question_supporting_document_requirement
			$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->CurrentValue);

			// mfo_question_expected_trend
			$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_expected_trend->CurrentValue);

			// mfo_question_online_ask_y_n
			$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->CurrentValue);

			// mfo_question_online_pi_question_numerator
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->CurrentValue);

			// mfo_question_online_pi_question_denominator
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->CurrentValue);

			// mfo_question_expected_numerator
			$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->CurrentValue);

			// mfo_question_expected_denominator
			$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->CurrentValue);

			// mfo_question_report_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->CurrentValue);

			// mfo_question_report_form_a_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->CurrentValue);

			// mfo_question_report_form_a_1_mfo
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->CurrentValue);

			// mfo_question_report_form_a_1_sequence
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->CurrentValue);

			// mfo_question_report_form_a_gaa_value
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->CurrentValue);

			// pi_no
			$frm_9_m_sa_mfo_questions->pi_no->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->pi_no->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->pi_no->CurrentValue);

			// pi_sub
			$frm_9_m_sa_mfo_questions->pi_sub->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->pi_sub->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->pi_sub->CurrentValue);

			// iatf_2013
			$frm_9_m_sa_mfo_questions->iatf_2013->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->iatf_2013->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->iatf_2013->CurrentValue);

			// iatf_2014
			$frm_9_m_sa_mfo_questions->iatf_2014->EditCustomAttributes = "";
			$frm_9_m_sa_mfo_questions->iatf_2014->EditValue = up_HtmlEncode($frm_9_m_sa_mfo_questions->iatf_2014->CurrentValue);

			// Edit refer script
			// mfo_question_online_pi_seq

			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->HrefValue = "";

			// mfo_question_online_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->HrefValue = "";

			// mfo_question_online_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->HrefValue = "";

			// mfo_question_expected_answer
			$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->HrefValue = "";

			// mfo_question_online_insert_question_mfo
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->HrefValue = "";

			// mfo_question_online_insert_question_mfo_name_rep
			$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->HrefValue = "";

			// mfo_question_online_computation_du_cu_summary
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->HrefValue = "";

			// mfo_question_online_computation_du_cu_summary_name
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->HrefValue = "";

			// mfo_question_online_computation_denominator
			$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->HrefValue = "";

			// mfo_question_supporting_document_requirement
			$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->HrefValue = "";

			// mfo_question_expected_trend
			$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->HrefValue = "";

			// mfo_question_online_ask_y_n
			$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->HrefValue = "";

			// mfo_question_online_pi_question_numerator
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->HrefValue = "";

			// mfo_question_online_pi_question_denominator
			$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->HrefValue = "";

			// mfo_question_expected_numerator
			$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->HrefValue = "";

			// mfo_question_expected_denominator
			$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->HrefValue = "";

			// mfo_question_report_mfo_name
			$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->HrefValue = "";

			// mfo_question_report_form_a_pi_question
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->HrefValue = "";

			// mfo_question_report_form_a_1_mfo
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->HrefValue = "";

			// mfo_question_report_form_a_1_sequence
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->HrefValue = "";

			// mfo_question_report_form_a_gaa_value
			$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->HrefValue = "";

			// pi_no
			$frm_9_m_sa_mfo_questions->pi_no->HrefValue = "";

			// pi_sub
			$frm_9_m_sa_mfo_questions->pi_sub->HrefValue = "";

			// iatf_2013
			$frm_9_m_sa_mfo_questions->iatf_2013->HrefValue = "";

			// iatf_2014
			$frm_9_m_sa_mfo_questions->iatf_2014->HrefValue = "";
		}
		if ($frm_9_m_sa_mfo_questions->RowType == UP_ROWTYPE_ADD ||
			$frm_9_m_sa_mfo_questions->RowType == UP_ROWTYPE_EDIT ||
			$frm_9_m_sa_mfo_questions->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_9_m_sa_mfo_questions->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_9_m_sa_mfo_questions->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_9_m_sa_mfo_questions->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_9_m_sa_mfo_questions;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->FldErrMsg());
		}
		if (!up_CheckInteger($frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->FldErrMsg());
		}
		if (!up_CheckInteger($frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->FldErrMsg());
		}
		if (!up_CheckInteger($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->FldErrMsg());
		}
		if (!up_CheckInteger($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->FldErrMsg());
		}
		if (!up_CheckNumber($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->FldErrMsg());
		}
		if (!is_null($frm_9_m_sa_mfo_questions->pi_no->FormValue) && $frm_9_m_sa_mfo_questions->pi_no->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_9_m_sa_mfo_questions->pi_no->FldCaption());
		}
		if (!up_CheckInteger($frm_9_m_sa_mfo_questions->pi_no->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_mfo_questions->pi_no->FldErrMsg());
		}
		if (!up_CheckNumber($frm_9_m_sa_mfo_questions->iatf_2013->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_mfo_questions->iatf_2013->FldErrMsg());
		}
		if (!up_CheckNumber($frm_9_m_sa_mfo_questions->iatf_2014->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_mfo_questions->iatf_2014->FldErrMsg());
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

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security, $frm_9_m_sa_mfo_questions;
		$rsnew = array();

		// mfo_question_online_pi_seq
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_seq->CurrentValue, NULL, FALSE);

		// mfo_question_online_mfo_name
		$frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_mfo_name->CurrentValue, NULL, FALSE);

		// mfo_question_online_pi_question
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question->CurrentValue, NULL, FALSE);

		// mfo_question_expected_answer
		$frm_9_m_sa_mfo_questions->mfo_question_expected_answer->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_expected_answer->CurrentValue, NULL, FALSE);

		// mfo_question_online_insert_question_mfo
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo->CurrentValue, NULL, FALSE);

		// mfo_question_online_insert_question_mfo_name_rep
		$frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_insert_question_mfo_name_rep->CurrentValue, NULL, FALSE);

		// mfo_question_online_computation_du_cu_summary
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary->CurrentValue, NULL, FALSE);

		// mfo_question_online_computation_du_cu_summary_name
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_computation_du_cu_summary_name->CurrentValue, NULL, FALSE);

		// mfo_question_online_computation_denominator
		$frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_computation_denominator->CurrentValue, NULL, FALSE);

		// mfo_question_supporting_document_requirement
		$frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_supporting_document_requirement->CurrentValue, NULL, FALSE);

		// mfo_question_expected_trend
		$frm_9_m_sa_mfo_questions->mfo_question_expected_trend->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_expected_trend->CurrentValue, NULL, FALSE);

		// mfo_question_online_ask_y_n
		$frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_ask_y_n->CurrentValue, NULL, FALSE);

		// mfo_question_online_pi_question_numerator
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_numerator->CurrentValue, NULL, FALSE);

		// mfo_question_online_pi_question_denominator
		$frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_online_pi_question_denominator->CurrentValue, NULL, FALSE);

		// mfo_question_expected_numerator
		$frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_expected_numerator->CurrentValue, NULL, FALSE);

		// mfo_question_expected_denominator
		$frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_expected_denominator->CurrentValue, NULL, FALSE);

		// mfo_question_report_mfo_name
		$frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_report_mfo_name->CurrentValue, NULL, FALSE);

		// mfo_question_report_form_a_pi_question
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_pi_question->CurrentValue, NULL, FALSE);

		// mfo_question_report_form_a_1_mfo
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_mfo->CurrentValue, NULL, FALSE);

		// mfo_question_report_form_a_1_sequence
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_1_sequence->CurrentValue, NULL, FALSE);

		// mfo_question_report_form_a_gaa_value
		$frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->CurrentValue, NULL, strval($frm_9_m_sa_mfo_questions->mfo_question_report_form_a_gaa_value->CurrentValue) == "");

		// pi_no
		$frm_9_m_sa_mfo_questions->pi_no->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->pi_no->CurrentValue, 0, strval($frm_9_m_sa_mfo_questions->pi_no->CurrentValue) == "");

		// pi_sub
		$frm_9_m_sa_mfo_questions->pi_sub->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->pi_sub->CurrentValue, NULL, FALSE);

		// iatf_2013
		$frm_9_m_sa_mfo_questions->iatf_2013->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->iatf_2013->CurrentValue, NULL, FALSE);

		// iatf_2014
		$frm_9_m_sa_mfo_questions->iatf_2014->SetDbValueDef($rsnew, $frm_9_m_sa_mfo_questions->iatf_2014->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $frm_9_m_sa_mfo_questions->Row_Inserting($rs, $rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'up_ErrorFn';
			$AddRow = $conn->Execute($frm_9_m_sa_mfo_questions->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($frm_9_m_sa_mfo_questions->CancelMessage <> "") {
				$this->setFailureMessage($frm_9_m_sa_mfo_questions->CancelMessage);
				$frm_9_m_sa_mfo_questions->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
			$frm_9_m_sa_mfo_questions->mfo_question_id->setDbValue($conn->Insert_ID());
			$rsnew['mfo_question_id'] = $frm_9_m_sa_mfo_questions->mfo_question_id->DbValue;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$frm_9_m_sa_mfo_questions->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
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
