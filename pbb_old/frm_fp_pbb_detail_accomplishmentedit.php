<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_fp_pbb_detail_accomplishmentinfo.php" ?>
<?php include_once "frm_fp_rep_a_eligible_statusinfo.php" ?>
<?php include_once "frm_fp_rep_a_eligible_status_unitinfo.php" ?>
<?php include_once "frm_fp_rep_a_eligible_status_unit_mfoinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
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

// multi page properties
frm_fp_pbb_detail_accomplishment_edit.MultiPage = new up_MultiPage();
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_units_id", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_cu_unit_name", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_mfo_id", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_mfo_name", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_pi_question", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_target", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_t_numerator", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_t_numerator_qtr1", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_t_numerator_qtr2", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_t_numerator_qtr3", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_t_numerator_qtr4", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_t_denominator", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_t_denominator_qtr1", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_t_denominator_qtr2", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_t_denominator_qtr3", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_t_denominator_qtr4", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_t_remarks", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_t_cutOffDate_remarks", 2);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_accomplishment", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_numerator", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_numerator_qtr1", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_numerator_qtr2", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_numerator_qtr3", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_numerator_qtr4", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_denominator", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_denominator_qtr1", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_denominator_qtr2", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_denominator_qtr3", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_denominator_qtr4", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_supporting_docs", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_supporting_docs_qtr1", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_supporting_docs_qtr2", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_supporting_docs_qtr3", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_supporting_docs_qtr4", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_remarks", 1);
frm_fp_pbb_detail_accomplishment_edit.MultiPage.AddElement("x_a_cutOffDate_remarks", 1);

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
<table cellspacing="0" cellpadding="0"><tr><td>
<div id="frm_fp_pbb_detail_accomplishment_edit" class="yui-navset">
	<ul class="yui-nav">
		<li class="selected"><a href="#tab_frm_fp_pbb_detail_accomplishment_1"><em><span class="upbudgetofficeclass"><?php echo $frm_fp_pbb_detail_accomplishment->PageCaption(1) ?></span></em></a></li>
		<li><a href="#tab_frm_fp_pbb_detail_accomplishment_2"><em><span class="upbudgetofficeclass"><?php echo $frm_fp_pbb_detail_accomplishment->PageCaption(2) ?></span></em></a></li>
	</ul>            
	<div class="yui-content">
		<div id="tab_frm_fp_pbb_detail_accomplishment_1">
<table cellspacing="0" class="upGrid" style="width: 100%"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_fp_pbb_detail_accomplishment->cu_unit_name->Visible) { // cu_unit_name ?>
	<tr id="r_cu_unit_name"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->CellAttributes() ?>><span id="el_cu_unit_name">
<div<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->EditValue ?></div>
<input type="hidden" name="x_cu_unit_name" id="x_cu_unit_name" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->cu_unit_name->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->mfo_name->Visible) { // mfo_name ?>
	<tr id="r_mfo_name"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->CellAttributes() ?>><span id="el_mfo_name">
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->EditValue ?></div>
<input type="hidden" name="x_mfo_name" id="x_mfo_name" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->mfo_name->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->pi_question->Visible) { // pi_question ?>
	<tr id="r_pi_question"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->pi_question->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pi_question->CellAttributes() ?>><span id="el_pi_question">
<div<?php echo $frm_fp_pbb_detail_accomplishment->pi_question->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->pi_question->EditValue ?></div>
<input type="hidden" name="x_pi_question" id="x_pi_question" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->pi_question->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->pi_question->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->accomplishment->Visible) { // accomplishment ?>
	<tr id="r_accomplishment"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->CellAttributes() ?>><span id="el_accomplishment">
<div<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->EditValue ?></div>
<input type="hidden" name="x_accomplishment" id="x_accomplishment" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->accomplishment->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->a_numerator->Visible) { // a_numerator ?>
	<tr id="r_a_numerator"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->CellAttributes() ?>><span id="el_a_numerator">
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->EditValue ?></div>
<input type="hidden" name="x_a_numerator" id="x_a_numerator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_numerator->CurrentValue) ?>">
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
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->EditValue ?></div>
<input type="hidden" name="x_a_denominator" id="x_a_denominator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_denominator->CurrentValue) ?>">
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
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->EditValue ?></div>
<input type="hidden" name="x_a_supporting_docs" id="x_a_supporting_docs" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_supporting_docs->CurrentValue) ?>">
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
<?php if ($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->Visible) { // a_cutOffDate_remarks ?>
	<tr id="r_a_cutOffDate_remarks"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CellAttributes() ?>><span id="el_a_cutOffDate_remarks">
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->EditValue ?></div>
<input type="hidden" name="x_a_cutOffDate_remarks" id="x_a_cutOffDate_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
		</div>
		<div id="tab_frm_fp_pbb_detail_accomplishment_2">
<table cellspacing="0" class="upGrid" style="width: 100%"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_fp_pbb_detail_accomplishment->units_id->Visible) { // units_id ?>
	<tr id="r_units_id"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->units_id->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->units_id->CellAttributes() ?>><span id="el_units_id">
<div<?php echo $frm_fp_pbb_detail_accomplishment->units_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->units_id->EditValue ?></div>
<input type="hidden" name="x_units_id" id="x_units_id" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->units_id->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->units_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->mfo_id->Visible) { // mfo_id ?>
	<tr id="r_mfo_id"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->CellAttributes() ?>><span id="el_mfo_id">
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->EditValue ?></div>
<input type="hidden" name="x_mfo_id" id="x_mfo_id" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->target->Visible) { // target ?>
	<tr id="r_target"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->target->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->target->CellAttributes() ?>><span id="el_target">
<div<?php echo $frm_fp_pbb_detail_accomplishment->target->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->target->EditValue ?></div>
<input type="hidden" name="x_target" id="x_target" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->target->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->target->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator->Visible) { // t_numerator ?>
	<tr id="r_t_numerator"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->CellAttributes() ?>><span id="el_t_numerator">
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->EditValue ?></div>
<input type="hidden" name="x_t_numerator" id="x_t_numerator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->Visible) { // t_numerator_qtr1 ?>
	<tr id="r_t_numerator_qtr1"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CellAttributes() ?>><span id="el_t_numerator_qtr1">
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->EditValue ?></div>
<input type="hidden" name="x_t_numerator_qtr1" id="x_t_numerator_qtr1" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->Visible) { // t_numerator_qtr2 ?>
	<tr id="r_t_numerator_qtr2"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CellAttributes() ?>><span id="el_t_numerator_qtr2">
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->EditValue ?></div>
<input type="hidden" name="x_t_numerator_qtr2" id="x_t_numerator_qtr2" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->Visible) { // t_numerator_qtr3 ?>
	<tr id="r_t_numerator_qtr3"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CellAttributes() ?>><span id="el_t_numerator_qtr3">
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->EditValue ?></div>
<input type="hidden" name="x_t_numerator_qtr3" id="x_t_numerator_qtr3" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->Visible) { // t_numerator_qtr4 ?>
	<tr id="r_t_numerator_qtr4"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CellAttributes() ?>><span id="el_t_numerator_qtr4">
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->EditValue ?></div>
<input type="hidden" name="x_t_numerator_qtr4" id="x_t_numerator_qtr4" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator->Visible) { // t_denominator ?>
	<tr id="r_t_denominator"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->CellAttributes() ?>><span id="el_t_denominator">
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->EditValue ?></div>
<input type="hidden" name="x_t_denominator" id="x_t_denominator" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->Visible) { // t_denominator_qtr1 ?>
	<tr id="r_t_denominator_qtr1"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CellAttributes() ?>><span id="el_t_denominator_qtr1">
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->EditValue ?></div>
<input type="hidden" name="x_t_denominator_qtr1" id="x_t_denominator_qtr1" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->Visible) { // t_denominator_qtr2 ?>
	<tr id="r_t_denominator_qtr2"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CellAttributes() ?>><span id="el_t_denominator_qtr2">
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->EditValue ?></div>
<input type="hidden" name="x_t_denominator_qtr2" id="x_t_denominator_qtr2" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->Visible) { // t_denominator_qtr3 ?>
	<tr id="r_t_denominator_qtr3"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CellAttributes() ?>><span id="el_t_denominator_qtr3">
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->EditValue ?></div>
<input type="hidden" name="x_t_denominator_qtr3" id="x_t_denominator_qtr3" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->Visible) { // t_denominator_qtr4 ?>
	<tr id="r_t_denominator_qtr4"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CellAttributes() ?>><span id="el_t_denominator_qtr4">
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->EditValue ?></div>
<input type="hidden" name="x_t_denominator_qtr4" id="x_t_denominator_qtr4" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_remarks->Visible) { // t_remarks ?>
	<tr id="r_t_remarks"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->CellAttributes() ?>><span id="el_t_remarks">
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->EditValue ?></div>
<input type="hidden" name="x_t_remarks" id="x_t_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_remarks->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
	<tr id="r_t_cutOffDate_remarks"<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->FldCaption() ?></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CellAttributes() ?>><span id="el_t_cutOffDate_remarks">
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->EditValue ?></div>
<input type="hidden" name="x_t_cutOffDate_remarks" id="x_t_cutOffDate_remarks" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CurrentValue) ?>">
</span><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
		</div>
	</div>
</div>
</td></tr></table>
<script type="text/javascript">
<!--
up_TabView(frm_fp_pbb_detail_accomplishment_edit);

//-->
</script>	
<input type="hidden" name="x_pbb_id" id="x_pbb_id" value="<?php echo up_HtmlEncode($frm_fp_pbb_detail_accomplishment->pbb_id->CurrentValue) ?>">
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

		// Table object (frm_fp_rep_a_eligible_status)
		if (!isset($GLOBALS['frm_fp_rep_a_eligible_status'])) $GLOBALS['frm_fp_rep_a_eligible_status'] = new cfrm_fp_rep_a_eligible_status();

		// Table object (frm_fp_rep_a_eligible_status_unit)
		if (!isset($GLOBALS['frm_fp_rep_a_eligible_status_unit'])) $GLOBALS['frm_fp_rep_a_eligible_status_unit'] = new cfrm_fp_rep_a_eligible_status_unit();

		// Table object (frm_fp_rep_a_eligible_status_unit_mfo)
		if (!isset($GLOBALS['frm_fp_rep_a_eligible_status_unit_mfo'])) $GLOBALS['frm_fp_rep_a_eligible_status_unit_mfo'] = new cfrm_fp_rep_a_eligible_status_unit_mfo();

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

		// Set up master detail parameters
		$this->SetUpMasterParms();
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
		if (!$frm_fp_pbb_detail_accomplishment->units_id->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->units_id->setFormValue($objForm->GetValue("x_units_id"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->cu_unit_name->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->setFormValue($objForm->GetValue("x_cu_unit_name"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->mfo_id->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->mfo_id->setFormValue($objForm->GetValue("x_mfo_id"));
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
		if (!$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->FldIsDetailKey) {
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->setFormValue($objForm->GetValue("x_a_cutOffDate_remarks"));
		}
		if (!$frm_fp_pbb_detail_accomplishment->pbb_id->FldIsDetailKey)
			$frm_fp_pbb_detail_accomplishment->pbb_id->setFormValue($objForm->GetValue("x_pbb_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_fp_pbb_detail_accomplishment;
		$this->LoadRow();
		$frm_fp_pbb_detail_accomplishment->pbb_id->CurrentValue = $frm_fp_pbb_detail_accomplishment->pbb_id->FormValue;
		$frm_fp_pbb_detail_accomplishment->units_id->CurrentValue = $frm_fp_pbb_detail_accomplishment->units_id->FormValue;
		$frm_fp_pbb_detail_accomplishment->cu_unit_name->CurrentValue = $frm_fp_pbb_detail_accomplishment->cu_unit_name->FormValue;
		$frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue = $frm_fp_pbb_detail_accomplishment->mfo_id->FormValue;
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
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CurrentValue = $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->FormValue;
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
		$frm_fp_pbb_detail_accomplishment->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_pbb_detail_accomplishment->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_fp_pbb_detail_accomplishment->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_fp_pbb_detail_accomplishment->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_fp_pbb_detail_accomplishment->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_pbb_detail_accomplishment->mfo_id->setDbValue($rs->fields('mfo_id'));
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
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate->setDbValue($rs->fields('a_cutOffDate'));
		$frm_fp_pbb_detail_accomplishment->a_rating->setDbValue($rs->fields('a_rating'));
		$frm_fp_pbb_detail_accomplishment->a_rating_above_90->setDbValue($rs->fields('a_rating_above_90'));
		$frm_fp_pbb_detail_accomplishment->a_rating_below_90->setDbValue($rs->fields('a_rating_below_90'));
		$frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->setDbValue($rs->fields('a_supporting_docs_comparison'));
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->setDbValue($rs->fields('a_cutOffDate_remarks'));
		$frm_fp_pbb_detail_accomplishment->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_fp_pbb_detail_accomplishment->mfo_name_rep->setDbValue($rs->fields('mfo_name_rep'));
		$frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->setDbValue($rs->fields('a_cutOffDate_fp'));
		$frm_fp_pbb_detail_accomplishment->applicable->setDbValue($rs->fields('applicable'));
		$frm_fp_pbb_detail_accomplishment->form_a_1_sequence->setDbValue($rs->fields('form_a_1_sequence'));
		$frm_fp_pbb_detail_accomplishment->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_fp_pbb_detail_accomplishment->a_startDate->setDbValue($rs->fields('a_startDate'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_pbb_detail_accomplishment;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_fp_pbb_detail_accomplishment->Row_Rendering();

		// Common render codes for all row types
		// pbb_id
		// units_id
		// cu_sequence
		// cu_short_name
		// cu_unit_name
		// focal_person_id
		// mfo_id
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
		// a_cutOffDate
		// a_rating
		// a_rating_above_90
		// a_rating_below_90
		// a_supporting_docs_comparison
		// a_cutOffDate_remarks
		// cutOffDate_id
		// mfo_name_rep
		// t_cutOffDate_fp
		// a_cutOffDate_fp
		// applicable
		// form_a_1_sequence
		// t_startDate
		// a_startDate

		if ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View row

			// units_id
			$frm_fp_pbb_detail_accomplishment->units_id->ViewValue = $frm_fp_pbb_detail_accomplishment->units_id->CurrentValue;
			if (strval($frm_fp_pbb_detail_accomplishment->units_id->CurrentValue) <> "") {
				$sFilterWrk = "`units_id` = " . up_AdjustSql($frm_fp_pbb_detail_accomplishment->units_id->CurrentValue) . "";
			$sSqlWrk = "SELECT `cu_unit_name` FROM `tbl_units`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$frm_fp_pbb_detail_accomplishment->units_id->ViewValue = $rswrk->fields('cu_unit_name');
					$rswrk->Close();
				} else {
					$frm_fp_pbb_detail_accomplishment->units_id->ViewValue = $frm_fp_pbb_detail_accomplishment->units_id->CurrentValue;
				}
			} else {
				$frm_fp_pbb_detail_accomplishment->units_id->ViewValue = NULL;
			}
			$frm_fp_pbb_detail_accomplishment->units_id->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewValue = $frm_fp_pbb_detail_accomplishment->cu_unit_name->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewCustomAttributes = "";

			// mfo_id
			$frm_fp_pbb_detail_accomplishment->mfo_id->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue;
			if (strval($frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue) <> "") {
				$sFilterWrk = "`mfo_id` = " . up_AdjustSql($frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue) . "";
			$sSqlWrk = "SELECT `pi_question` FROM `tbl_mfo_questions`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$frm_fp_pbb_detail_accomplishment->mfo_id->ViewValue = $rswrk->fields('pi_question');
					$rswrk->Close();
				} else {
					$frm_fp_pbb_detail_accomplishment->mfo_id->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue;
				}
			} else {
				$frm_fp_pbb_detail_accomplishment->mfo_id->ViewValue = NULL;
			}
			$frm_fp_pbb_detail_accomplishment->mfo_id->ViewCustomAttributes = "";

			// mfo_name
			$frm_fp_pbb_detail_accomplishment->mfo_name->ViewValue = $frm_fp_pbb_detail_accomplishment->mfo_name->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->mfo_name->ViewCustomAttributes = "";

			// pi_question
			$frm_fp_pbb_detail_accomplishment->pi_question->ViewValue = $frm_fp_pbb_detail_accomplishment->pi_question->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->pi_question->ViewCustomAttributes = "";

			// target
			$frm_fp_pbb_detail_accomplishment->target->ViewValue = $frm_fp_pbb_detail_accomplishment->target->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->target->CssStyle = "font-weight:bold;text-align:right;";
			$frm_fp_pbb_detail_accomplishment->target->ViewCustomAttributes = "";

			// t_numerator
			$frm_fp_pbb_detail_accomplishment->t_numerator->ViewValue = $frm_fp_pbb_detail_accomplishment->t_numerator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator->CssStyle = "text-align:right;";
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
			$frm_fp_pbb_detail_accomplishment->t_denominator->CssStyle = "text-align:right;";
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

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ViewValue = $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// accomplishment
			$frm_fp_pbb_detail_accomplishment->accomplishment->ViewValue = $frm_fp_pbb_detail_accomplishment->accomplishment->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->accomplishment->CssStyle = "font-weight:bold;text-align:right;";
			$frm_fp_pbb_detail_accomplishment->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$frm_fp_pbb_detail_accomplishment->a_numerator->ViewValue = $frm_fp_pbb_detail_accomplishment->a_numerator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_numerator->CssStyle = "text-align:right;";
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
			$frm_fp_pbb_detail_accomplishment->a_denominator->CssStyle = "text-align:right;";
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
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->CssStyle = "font-weight:bold;text-align:right;";
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

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewValue = $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// units_id
			$frm_fp_pbb_detail_accomplishment->units_id->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->units_id->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->units_id->TooltipValue = "";

			// cu_unit_name
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->TooltipValue = "";

			// mfo_id
			$frm_fp_pbb_detail_accomplishment->mfo_id->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_id->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->mfo_id->TooltipValue = "";

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

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->HrefValue = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->TooltipValue = "";
		} elseif ($frm_fp_pbb_detail_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// units_id
			$frm_fp_pbb_detail_accomplishment->units_id->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->units_id->EditValue = $frm_fp_pbb_detail_accomplishment->units_id->CurrentValue;
			if (strval($frm_fp_pbb_detail_accomplishment->units_id->CurrentValue) <> "") {
				$sFilterWrk = "`units_id` = " . up_AdjustSql($frm_fp_pbb_detail_accomplishment->units_id->CurrentValue) . "";
			$sSqlWrk = "SELECT `cu_unit_name` FROM `tbl_units`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$frm_fp_pbb_detail_accomplishment->units_id->EditValue = $rswrk->fields('cu_unit_name');
					$rswrk->Close();
				} else {
					$frm_fp_pbb_detail_accomplishment->units_id->EditValue = $frm_fp_pbb_detail_accomplishment->units_id->CurrentValue;
				}
			} else {
				$frm_fp_pbb_detail_accomplishment->units_id->EditValue = NULL;
			}
			$frm_fp_pbb_detail_accomplishment->units_id->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->EditValue = $frm_fp_pbb_detail_accomplishment->cu_unit_name->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewCustomAttributes = "";

			// mfo_id
			$frm_fp_pbb_detail_accomplishment->mfo_id->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_id->EditValue = $frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue;
			if (strval($frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue) <> "") {
				$sFilterWrk = "`mfo_id` = " . up_AdjustSql($frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue) . "";
			$sSqlWrk = "SELECT `pi_question` FROM `tbl_mfo_questions`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$frm_fp_pbb_detail_accomplishment->mfo_id->EditValue = $rswrk->fields('pi_question');
					$rswrk->Close();
				} else {
					$frm_fp_pbb_detail_accomplishment->mfo_id->EditValue = $frm_fp_pbb_detail_accomplishment->mfo_id->CurrentValue;
				}
			} else {
				$frm_fp_pbb_detail_accomplishment->mfo_id->EditValue = NULL;
			}
			$frm_fp_pbb_detail_accomplishment->mfo_id->ViewCustomAttributes = "";

			// mfo_name
			$frm_fp_pbb_detail_accomplishment->mfo_name->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->mfo_name->EditValue = $frm_fp_pbb_detail_accomplishment->mfo_name->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->mfo_name->ViewCustomAttributes = "";

			// pi_question
			$frm_fp_pbb_detail_accomplishment->pi_question->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->pi_question->EditValue = $frm_fp_pbb_detail_accomplishment->pi_question->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->pi_question->ViewCustomAttributes = "";

			// target
			$frm_fp_pbb_detail_accomplishment->target->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->target->EditValue = $frm_fp_pbb_detail_accomplishment->target->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->target->CssStyle = "font-weight:bold;text-align:right;";
			$frm_fp_pbb_detail_accomplishment->target->ViewCustomAttributes = "";

			// t_numerator
			$frm_fp_pbb_detail_accomplishment->t_numerator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator->EditValue = $frm_fp_pbb_detail_accomplishment->t_numerator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator->CssStyle = "text-align:right;";
			$frm_fp_pbb_detail_accomplishment->t_numerator->ViewCustomAttributes = "";

			// t_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->EditValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->ViewCustomAttributes = "";

			// t_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->EditValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->ViewCustomAttributes = "";

			// t_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->EditValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->ViewCustomAttributes = "";

			// t_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->EditValue = $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->ViewCustomAttributes = "";

			// t_denominator
			$frm_fp_pbb_detail_accomplishment->t_denominator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator->EditValue = $frm_fp_pbb_detail_accomplishment->t_denominator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator->CssStyle = "text-align:right;";
			$frm_fp_pbb_detail_accomplishment->t_denominator->ViewCustomAttributes = "";

			// t_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->EditValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->ViewCustomAttributes = "";

			// t_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->EditValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->ViewCustomAttributes = "";

			// t_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->EditValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->ViewCustomAttributes = "";

			// t_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->EditValue = $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->ViewCustomAttributes = "";

			// t_remarks
			$frm_fp_pbb_detail_accomplishment->t_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_remarks->EditValue = $frm_fp_pbb_detail_accomplishment->t_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_remarks->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->EditValue = $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// accomplishment
			$frm_fp_pbb_detail_accomplishment->accomplishment->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->accomplishment->EditValue = $frm_fp_pbb_detail_accomplishment->accomplishment->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->accomplishment->CssStyle = "font-weight:bold;text-align:right;";
			$frm_fp_pbb_detail_accomplishment->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$frm_fp_pbb_detail_accomplishment->a_numerator->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_numerator->EditValue = $frm_fp_pbb_detail_accomplishment->a_numerator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_numerator->CssStyle = "text-align:right;";
			$frm_fp_pbb_detail_accomplishment->a_numerator->ViewCustomAttributes = "";

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
			$frm_fp_pbb_detail_accomplishment->a_denominator->EditValue = $frm_fp_pbb_detail_accomplishment->a_denominator->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_denominator->CssStyle = "text-align:right;";
			$frm_fp_pbb_detail_accomplishment->a_denominator->ViewCustomAttributes = "";

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
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->EditValue = $frm_fp_pbb_detail_accomplishment->a_supporting_docs->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->CssStyle = "font-weight:bold;text-align:right;";
			$frm_fp_pbb_detail_accomplishment->a_supporting_docs->ViewCustomAttributes = "";

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

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->EditValue = $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CurrentValue;
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewCustomAttributes = "";

			// Edit refer script
			// units_id

			$frm_fp_pbb_detail_accomplishment->units_id->HrefValue = "";

			// cu_unit_name
			$frm_fp_pbb_detail_accomplishment->cu_unit_name->HrefValue = "";

			// mfo_id
			$frm_fp_pbb_detail_accomplishment->mfo_id->HrefValue = "";

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

			// a_cutOffDate_remarks
			$frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->HrefValue = "";
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

			// a_numerator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->ReadOnly);

			// a_numerator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->ReadOnly);

			// a_numerator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->ReadOnly);

			// a_numerator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->ReadOnly);

			// a_denominator_qtr1
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->ReadOnly);

			// a_denominator_qtr2
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->ReadOnly);

			// a_denominator_qtr3
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->ReadOnly);

			// a_denominator_qtr4
			$frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->SetDbValueDef($rsnew, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->CurrentValue, NULL, $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->ReadOnly);

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

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_fp_pbb_detail_accomplishment;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "frm_fp_rep_a_eligible_status_unit_mfo") {
				$bValidMaster = TRUE;
				if (@$_GET["units_id"] <> "") {
					$GLOBALS["frm_fp_rep_a_eligible_status_unit_mfo"]->units_id->setQueryStringValue($_GET["units_id"]);
					$frm_fp_pbb_detail_accomplishment->units_id->setQueryStringValue($GLOBALS["frm_fp_rep_a_eligible_status_unit_mfo"]->units_id->QueryStringValue);
					$frm_fp_pbb_detail_accomplishment->units_id->setSessionValue($frm_fp_pbb_detail_accomplishment->units_id->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_fp_rep_a_eligible_status_unit_mfo"]->units_id->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
				if (@$_GET["mfo"] <> "") {
					$GLOBALS["frm_fp_rep_a_eligible_status_unit_mfo"]->mfo->setQueryStringValue($_GET["mfo"]);
					$frm_fp_pbb_detail_accomplishment->mfo->setQueryStringValue($GLOBALS["frm_fp_rep_a_eligible_status_unit_mfo"]->mfo->QueryStringValue);
					$frm_fp_pbb_detail_accomplishment->mfo->setSessionValue($frm_fp_pbb_detail_accomplishment->mfo->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_fp_rep_a_eligible_status_unit_mfo"]->mfo->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$frm_fp_pbb_detail_accomplishment->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$frm_fp_pbb_detail_accomplishment->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "frm_fp_rep_a_eligible_status_unit_mfo") {
				if ($frm_fp_pbb_detail_accomplishment->units_id->QueryStringValue == "") $frm_fp_pbb_detail_accomplishment->units_id->setSessionValue("");
				if ($frm_fp_pbb_detail_accomplishment->mfo->QueryStringValue == "") $frm_fp_pbb_detail_accomplishment->mfo->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $frm_fp_pbb_detail_accomplishment->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_fp_pbb_detail_accomplishment->getDetailFilter(); // Get detail filter
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
