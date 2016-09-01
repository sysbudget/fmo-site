<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg8.php" ?>
<?php include_once "upmysql8.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "view_trans_tbl_accomplishment_a_mfo_2info.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn8.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$view_trans_tbl_accomplishment_a_mfo_2_edit = new cview_trans_tbl_accomplishment_a_mfo_2_edit();
$Page =& $view_trans_tbl_accomplishment_a_mfo_2_edit;

// Page init
$view_trans_tbl_accomplishment_a_mfo_2_edit->Page_Init();

// Page main
$view_trans_tbl_accomplishment_a_mfo_2_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var view_trans_tbl_accomplishment_a_mfo_2_edit = new up_Page("view_trans_tbl_accomplishment_a_mfo_2_edit");

// page properties
view_trans_tbl_accomplishment_a_mfo_2_edit.PageID = "edit"; // page ID
view_trans_tbl_accomplishment_a_mfo_2_edit.FormID = "fview_trans_tbl_accomplishment_a_mfo_2edit"; // form ID
var UP_PAGE_ID = view_trans_tbl_accomplishment_a_mfo_2_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
view_trans_tbl_accomplishment_a_mfo_2_edit.ValidateForm = function(fobj) {
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
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_numerator_qtr2"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_numerator_qtr3"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_numerator_qtr4"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_denominator_qtr1"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_denominator_qtr2"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_denominator_qtr3"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_denominator_qtr4"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->FldErrMsg()) ?>");

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
view_trans_tbl_accomplishment_a_mfo_2_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
view_trans_tbl_accomplishment_a_mfo_2_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
view_trans_tbl_accomplishment_a_mfo_2_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
view_trans_tbl_accomplishment_a_mfo_2_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

// multi page properties
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage = new up_MultiPage();
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_unit_bo", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_pi_no", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_pi_description", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_target", 2);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_t_numerator", 2);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_t_numerator_qtr1", 2);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_t_numerator_qtr2", 2);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_t_numerator_qtr3", 2);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_t_numerator_qtr4", 2);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_t_denominator", 2);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_t_denominator_qtr1", 2);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_t_denominator_qtr2", 2);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_t_denominator_qtr3", 2);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_t_denominator_qtr4", 2);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_accomplishment", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_a_numerator", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_a_numerator_qtr1", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_a_numerator_qtr2", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_a_numerator_qtr3", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_a_numerator_qtr4", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_a_denominator", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_a_denominator_qtr1", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_a_denominator_qtr2", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_a_denominator_qtr3", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_a_denominator_qtr4", 1);
view_trans_tbl_accomplishment_a_mfo_2_edit.MultiPage.AddElement("x_remarks", 1);

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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $view_trans_tbl_accomplishment_a_mfo_2->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $view_trans_tbl_accomplishment_a_mfo_2->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $view_trans_tbl_accomplishment_a_mfo_2_edit->ShowPageHeader(); ?>
<?php
$view_trans_tbl_accomplishment_a_mfo_2_edit->ShowMessage();
?>
<form name="fview_trans_tbl_accomplishment_a_mfo_2edit" id="fview_trans_tbl_accomplishment_a_mfo_2edit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return view_trans_tbl_accomplishment_a_mfo_2_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="view_trans_tbl_accomplishment_a_mfo_2">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" cellpadding="0"><tr><td>
<div id="view_trans_tbl_accomplishment_a_mfo_2_edit" class="yui-navset">
	<ul class="yui-nav">
		<li class="selected"><a href="#tab_view_trans_tbl_accomplishment_a_mfo_2_1"><em><span class="upbudgetofficeclass"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->PageCaption(1) ?></span></em></a></li>
		<li><a href="#tab_view_trans_tbl_accomplishment_a_mfo_2_2"><em><span class="upbudgetofficeclass"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->PageCaption(2) ?></span></em></a></li>
	</ul>            
	<div class="yui-content">
		<div id="tab_view_trans_tbl_accomplishment_a_mfo_2_1">
<table cellspacing="0" class="upGrid" style="width: 100%"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->unit_bo->Visible) { // unit_bo ?>
	<tr id="r_unit_bo"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->unit_bo->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->unit_bo->CellAttributes() ?>><span id="el_unit_bo">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->unit_bo->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->unit_bo->EditValue ?></div>
<input type="hidden" name="x_unit_bo" id="x_unit_bo" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->unit_bo->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->unit_bo->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->pi_no->Visible) { // pi_no ?>
	<tr id="r_pi_no"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->pi_no->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->pi_no->CellAttributes() ?>><span id="el_pi_no">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->pi_no->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->pi_no->EditValue ?></div>
<input type="hidden" name="x_pi_no" id="x_pi_no" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->pi_no->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->pi_no->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->pi_description->Visible) { // pi_description ?>
	<tr id="r_pi_description"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->pi_description->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->pi_description->CellAttributes() ?>><span id="el_pi_description">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->pi_description->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->pi_description->EditValue ?></div>
<input type="hidden" name="x_pi_description" id="x_pi_description" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->pi_description->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->pi_description->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->accomplishment->Visible) { // accomplishment ?>
	<tr id="r_accomplishment"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->accomplishment->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->accomplishment->CellAttributes() ?>><span id="el_accomplishment">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->accomplishment->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->accomplishment->EditValue ?></div>
<input type="hidden" name="x_accomplishment" id="x_accomplishment" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->accomplishment->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->accomplishment->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->a_numerator->Visible) { // a_numerator ?>
	<tr id="r_a_numerator"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator->CellAttributes() ?>><span id="el_a_numerator">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator->EditValue ?></div>
<input type="hidden" name="x_a_numerator" id="x_a_numerator" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->a_numerator->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->Visible) { // a_numerator_qtr1 ?>
	<tr id="r_a_numerator_qtr1"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->CellAttributes() ?>><span id="el_a_numerator_qtr1">
<input type="text" name="x_a_numerator_qtr1" id="x_a_numerator_qtr1" size="30" value="<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->EditValue ?>"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->EditAttributes() ?>>
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->Visible) { // a_numerator_qtr2 ?>
	<tr id="r_a_numerator_qtr2"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->CellAttributes() ?>><span id="el_a_numerator_qtr2">
<input type="text" name="x_a_numerator_qtr2" id="x_a_numerator_qtr2" size="30" value="<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->EditValue ?>"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->EditAttributes() ?>>
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->Visible) { // a_numerator_qtr3 ?>
	<tr id="r_a_numerator_qtr3"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->CellAttributes() ?>><span id="el_a_numerator_qtr3">
<input type="text" name="x_a_numerator_qtr3" id="x_a_numerator_qtr3" size="30" value="<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->EditValue ?>"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->EditAttributes() ?>>
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->Visible) { // a_numerator_qtr4 ?>
	<tr id="r_a_numerator_qtr4"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->CellAttributes() ?>><span id="el_a_numerator_qtr4">
<input type="text" name="x_a_numerator_qtr4" id="x_a_numerator_qtr4" size="30" value="<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->EditValue ?>"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->EditAttributes() ?>>
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->a_denominator->Visible) { // a_denominator ?>
	<tr id="r_a_denominator"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator->CellAttributes() ?>><span id="el_a_denominator">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator->EditValue ?></div>
<input type="hidden" name="x_a_denominator" id="x_a_denominator" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->a_denominator->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->Visible) { // a_denominator_qtr1 ?>
	<tr id="r_a_denominator_qtr1"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->CellAttributes() ?>><span id="el_a_denominator_qtr1">
<input type="text" name="x_a_denominator_qtr1" id="x_a_denominator_qtr1" size="30" value="<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->EditValue ?>"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->EditAttributes() ?>>
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->Visible) { // a_denominator_qtr2 ?>
	<tr id="r_a_denominator_qtr2"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->CellAttributes() ?>><span id="el_a_denominator_qtr2">
<input type="text" name="x_a_denominator_qtr2" id="x_a_denominator_qtr2" size="30" value="<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->EditValue ?>"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->EditAttributes() ?>>
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->Visible) { // a_denominator_qtr3 ?>
	<tr id="r_a_denominator_qtr3"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->CellAttributes() ?>><span id="el_a_denominator_qtr3">
<input type="text" name="x_a_denominator_qtr3" id="x_a_denominator_qtr3" size="30" value="<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->EditValue ?>"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->EditAttributes() ?>>
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->Visible) { // a_denominator_qtr4 ?>
	<tr id="r_a_denominator_qtr4"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->CellAttributes() ?>><span id="el_a_denominator_qtr4">
<input type="text" name="x_a_denominator_qtr4" id="x_a_denominator_qtr4" size="30" value="<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->EditValue ?>"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->EditAttributes() ?>>
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->remarks->Visible) { // remarks ?>
	<tr id="r_remarks"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->remarks->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->remarks->CellAttributes() ?>><span id="el_remarks">
<input type="text" name="x_remarks" id="x_remarks" size="30" maxlength="255" value="<?php echo $view_trans_tbl_accomplishment_a_mfo_2->remarks->EditValue ?>"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->remarks->EditAttributes() ?>>
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
		</div>
		<div id="tab_view_trans_tbl_accomplishment_a_mfo_2_2">
<table cellspacing="0" class="upGrid" style="width: 100%"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->target->Visible) { // target ?>
	<tr id="r_target"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->target->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->target->CellAttributes() ?>><span id="el_target">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->target->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->target->EditValue ?></div>
<input type="hidden" name="x_target" id="x_target" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->target->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->target->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->t_numerator->Visible) { // t_numerator ?>
	<tr id="r_t_numerator"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator->CellAttributes() ?>><span id="el_t_numerator">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator->EditValue ?></div>
<input type="hidden" name="x_t_numerator" id="x_t_numerator" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->t_numerator->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->Visible) { // t_numerator_qtr1 ?>
	<tr id="r_t_numerator_qtr1"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->CellAttributes() ?>><span id="el_t_numerator_qtr1">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->EditValue ?></div>
<input type="hidden" name="x_t_numerator_qtr1" id="x_t_numerator_qtr1" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->Visible) { // t_numerator_qtr2 ?>
	<tr id="r_t_numerator_qtr2"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->CellAttributes() ?>><span id="el_t_numerator_qtr2">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->EditValue ?></div>
<input type="hidden" name="x_t_numerator_qtr2" id="x_t_numerator_qtr2" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->Visible) { // t_numerator_qtr3 ?>
	<tr id="r_t_numerator_qtr3"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->CellAttributes() ?>><span id="el_t_numerator_qtr3">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->EditValue ?></div>
<input type="hidden" name="x_t_numerator_qtr3" id="x_t_numerator_qtr3" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->Visible) { // t_numerator_qtr4 ?>
	<tr id="r_t_numerator_qtr4"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->CellAttributes() ?>><span id="el_t_numerator_qtr4">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->EditValue ?></div>
<input type="hidden" name="x_t_numerator_qtr4" id="x_t_numerator_qtr4" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->t_denominator->Visible) { // t_denominator ?>
	<tr id="r_t_denominator"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator->CellAttributes() ?>><span id="el_t_denominator">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator->EditValue ?></div>
<input type="hidden" name="x_t_denominator" id="x_t_denominator" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->t_denominator->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->Visible) { // t_denominator_qtr1 ?>
	<tr id="r_t_denominator_qtr1"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->CellAttributes() ?>><span id="el_t_denominator_qtr1">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->EditValue ?></div>
<input type="hidden" name="x_t_denominator_qtr1" id="x_t_denominator_qtr1" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->Visible) { // t_denominator_qtr2 ?>
	<tr id="r_t_denominator_qtr2"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->CellAttributes() ?>><span id="el_t_denominator_qtr2">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->EditValue ?></div>
<input type="hidden" name="x_t_denominator_qtr2" id="x_t_denominator_qtr2" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->Visible) { // t_denominator_qtr3 ?>
	<tr id="r_t_denominator_qtr3"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->CellAttributes() ?>><span id="el_t_denominator_qtr3">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->EditValue ?></div>
<input type="hidden" name="x_t_denominator_qtr3" id="x_t_denominator_qtr3" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->Visible) { // t_denominator_qtr4 ?>
	<tr id="r_t_denominator_qtr4"<?php echo $view_trans_tbl_accomplishment_a_mfo_2->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->FldCaption() ?></td>
		<td<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->CellAttributes() ?>><span id="el_t_denominator_qtr4">
<div<?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->ViewAttributes() ?>><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->EditValue ?></div>
<input type="hidden" name="x_t_denominator_qtr4" id="x_t_denominator_qtr4" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->CurrentValue) ?>">
</span><?php echo $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->CustomMsg ?></td>
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
up_TabView(view_trans_tbl_accomplishment_a_mfo_2_edit);

//-->
</script>	
<input type="hidden" name="x_pi_id" id="x_pi_id" value="<?php echo up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->pi_id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$view_trans_tbl_accomplishment_a_mfo_2_edit->ShowPageFooter();
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
$view_trans_tbl_accomplishment_a_mfo_2_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cview_trans_tbl_accomplishment_a_mfo_2_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'view_trans_tbl_accomplishment_a_mfo_2';

	// Page object name
	var $PageObjName = 'view_trans_tbl_accomplishment_a_mfo_2_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $view_trans_tbl_accomplishment_a_mfo_2;
		if ($view_trans_tbl_accomplishment_a_mfo_2->UseTokenInUrl) $PageUrl .= "t=" . $view_trans_tbl_accomplishment_a_mfo_2->TableVar . "&"; // Add page token
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
		global $objForm, $view_trans_tbl_accomplishment_a_mfo_2;
		if ($view_trans_tbl_accomplishment_a_mfo_2->UseTokenInUrl) {
			if ($objForm)
				return ($view_trans_tbl_accomplishment_a_mfo_2->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($view_trans_tbl_accomplishment_a_mfo_2->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cview_trans_tbl_accomplishment_a_mfo_2_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (view_trans_tbl_accomplishment_a_mfo_2)
		if (!isset($GLOBALS["view_trans_tbl_accomplishment_a_mfo_2"])) {
			$GLOBALS["view_trans_tbl_accomplishment_a_mfo_2"] = new cview_trans_tbl_accomplishment_a_mfo_2();
			$GLOBALS["Table"] =& $GLOBALS["view_trans_tbl_accomplishment_a_mfo_2"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'view_trans_tbl_accomplishment_a_mfo_2', TRUE);

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
		global $view_trans_tbl_accomplishment_a_mfo_2;

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
			$this->Page_Terminate("view_trans_tbl_accomplishment_a_mfo_2list.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("view_trans_tbl_accomplishment_a_mfo_2list.php");
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
		global $objForm, $Language, $gsFormError, $view_trans_tbl_accomplishment_a_mfo_2;

		// Load key from QueryString
		if (@$_GET["pi_id"] <> "")
			$view_trans_tbl_accomplishment_a_mfo_2->pi_id->setQueryStringValue($_GET["pi_id"]);
		if (@$_POST["a_edit"] <> "") {
			$view_trans_tbl_accomplishment_a_mfo_2->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$view_trans_tbl_accomplishment_a_mfo_2->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$view_trans_tbl_accomplishment_a_mfo_2->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$view_trans_tbl_accomplishment_a_mfo_2->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($view_trans_tbl_accomplishment_a_mfo_2->pi_id->CurrentValue == "")
			$this->Page_Terminate("view_trans_tbl_accomplishment_a_mfo_2list.php"); // Invalid key, return to list
		switch ($view_trans_tbl_accomplishment_a_mfo_2->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("view_trans_tbl_accomplishment_a_mfo_2list.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$view_trans_tbl_accomplishment_a_mfo_2->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $view_trans_tbl_accomplishment_a_mfo_2->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$view_trans_tbl_accomplishment_a_mfo_2->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$view_trans_tbl_accomplishment_a_mfo_2->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$view_trans_tbl_accomplishment_a_mfo_2->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $view_trans_tbl_accomplishment_a_mfo_2;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $view_trans_tbl_accomplishment_a_mfo_2;
		if (!$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->setFormValue($objForm->GetValue("x_unit_bo"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->pi_no->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->pi_no->setFormValue($objForm->GetValue("x_pi_no"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->pi_description->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->pi_description->setFormValue($objForm->GetValue("x_pi_description"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->target->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->target->setFormValue($objForm->GetValue("x_target"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->setFormValue($objForm->GetValue("x_t_numerator"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->setFormValue($objForm->GetValue("x_t_numerator_qtr1"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->setFormValue($objForm->GetValue("x_t_numerator_qtr2"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->setFormValue($objForm->GetValue("x_t_numerator_qtr3"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->setFormValue($objForm->GetValue("x_t_numerator_qtr4"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->setFormValue($objForm->GetValue("x_t_denominator"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->setFormValue($objForm->GetValue("x_t_denominator_qtr1"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->setFormValue($objForm->GetValue("x_t_denominator_qtr2"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->setFormValue($objForm->GetValue("x_t_denominator_qtr3"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->setFormValue($objForm->GetValue("x_t_denominator_qtr4"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->setFormValue($objForm->GetValue("x_accomplishment"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->setFormValue($objForm->GetValue("x_a_numerator"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->setFormValue($objForm->GetValue("x_a_numerator_qtr1"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->setFormValue($objForm->GetValue("x_a_numerator_qtr2"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->setFormValue($objForm->GetValue("x_a_numerator_qtr3"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->setFormValue($objForm->GetValue("x_a_numerator_qtr4"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->setFormValue($objForm->GetValue("x_a_denominator"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->setFormValue($objForm->GetValue("x_a_denominator_qtr1"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->setFormValue($objForm->GetValue("x_a_denominator_qtr2"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->setFormValue($objForm->GetValue("x_a_denominator_qtr3"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->setFormValue($objForm->GetValue("x_a_denominator_qtr4"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->remarks->FldIsDetailKey) {
			$view_trans_tbl_accomplishment_a_mfo_2->remarks->setFormValue($objForm->GetValue("x_remarks"));
		}
		if (!$view_trans_tbl_accomplishment_a_mfo_2->pi_id->FldIsDetailKey)
			$view_trans_tbl_accomplishment_a_mfo_2->pi_id->setFormValue($objForm->GetValue("x_pi_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $view_trans_tbl_accomplishment_a_mfo_2;
		$this->LoadRow();
		$view_trans_tbl_accomplishment_a_mfo_2->pi_id->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->pi_id->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->unit_bo->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->pi_no->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->pi_no->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->pi_description->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->pi_description->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->target->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->target->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->accomplishment->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->a_numerator->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->a_denominator->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->FormValue;
		$view_trans_tbl_accomplishment_a_mfo_2->remarks->CurrentValue = $view_trans_tbl_accomplishment_a_mfo_2->remarks->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $view_trans_tbl_accomplishment_a_mfo_2;
		$sFilter = $view_trans_tbl_accomplishment_a_mfo_2->KeyFilter();

		// Call Row Selecting event
		$view_trans_tbl_accomplishment_a_mfo_2->Row_Selecting($sFilter);

		// Load SQL based on filter
		$view_trans_tbl_accomplishment_a_mfo_2->CurrentFilter = $sFilter;
		$sSql = $view_trans_tbl_accomplishment_a_mfo_2->SQL();
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
		global $conn, $view_trans_tbl_accomplishment_a_mfo_2;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$view_trans_tbl_accomplishment_a_mfo_2->Row_Selected($row);
		$view_trans_tbl_accomplishment_a_mfo_2->pi_id->setDbValue($rs->fields('pi_id'));
		$view_trans_tbl_accomplishment_a_mfo_2->id->setDbValue($rs->fields('id'));
		$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->setDbValue($rs->fields('unit_bo'));
		$view_trans_tbl_accomplishment_a_mfo_2->unit_cu->setDbValue($rs->fields('unit_cu'));
		$view_trans_tbl_accomplishment_a_mfo_2->pi->setDbValue($rs->fields('pi'));
		$view_trans_tbl_accomplishment_a_mfo_2->pi_no->setDbValue($rs->fields('pi_no'));
		$view_trans_tbl_accomplishment_a_mfo_2->pi_description->setDbValue($rs->fields('pi_description'));
		$view_trans_tbl_accomplishment_a_mfo_2->pi_1->setDbValue($rs->fields('pi_1'));
		$view_trans_tbl_accomplishment_a_mfo_2->target->setDbValue($rs->fields('target'));
		$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->setDbValue($rs->fields('t_numerator'));
		$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->setDbValue($rs->fields('t_numerator_qtr1'));
		$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->setDbValue($rs->fields('t_numerator_qtr2'));
		$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->setDbValue($rs->fields('t_numerator_qtr3'));
		$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->setDbValue($rs->fields('t_numerator_qtr4'));
		$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->setDbValue($rs->fields('t_denominator'));
		$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->setDbValue($rs->fields('t_denominator_qtr1'));
		$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->setDbValue($rs->fields('t_denominator_qtr2'));
		$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->setDbValue($rs->fields('t_denominator_qtr3'));
		$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->setDbValue($rs->fields('t_denominator_qtr4'));
		$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->setDbValue($rs->fields('accomplishment'));
		$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->setDbValue($rs->fields('a_numerator'));
		$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->setDbValue($rs->fields('a_numerator_qtr1'));
		$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->setDbValue($rs->fields('a_numerator_qtr2'));
		$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->setDbValue($rs->fields('a_numerator_qtr3'));
		$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->setDbValue($rs->fields('a_numerator_qtr4'));
		$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->setDbValue($rs->fields('a_denominator'));
		$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->setDbValue($rs->fields('a_denominator_qtr1'));
		$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->setDbValue($rs->fields('a_denominator_qtr2'));
		$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->setDbValue($rs->fields('a_denominator_qtr3'));
		$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->setDbValue($rs->fields('a_denominator_qtr4'));
		$view_trans_tbl_accomplishment_a_mfo_2->remarks->setDbValue($rs->fields('remarks'));
		$view_trans_tbl_accomplishment_a_mfo_2->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$view_trans_tbl_accomplishment_a_mfo_2->id_units->setDbValue($rs->fields('id_units'));
		$view_trans_tbl_accomplishment_a_mfo_2->id_cu->setDbValue($rs->fields('id_cu'));
		$view_trans_tbl_accomplishment_a_mfo_2->above_90->setDbValue($rs->fields('above_90'));
		$view_trans_tbl_accomplishment_a_mfo_2->below_90->setDbValue($rs->fields('below_90'));
		$view_trans_tbl_accomplishment_a_mfo_2->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
		$view_trans_tbl_accomplishment_a_mfo_2->remarks_cutOffDate->setDbValue($rs->fields('remarks_cutOffDate'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $view_trans_tbl_accomplishment_a_mfo_2;

		// Initialize URLs
		// Call Row_Rendering event

		$view_trans_tbl_accomplishment_a_mfo_2->Row_Rendering();

		// Common render codes for all row types
		// pi_id
		// id
		// unit_bo
		// unit_cu
		// pi
		// pi_no
		// pi_description
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
		// cu_sequence
		// id_units
		// id_cu
		// above_90
		// below_90
		// collectionPeriod_status
		// remarks_cutOffDate

		if ($view_trans_tbl_accomplishment_a_mfo_2->RowType == UP_ROWTYPE_VIEW) { // View row

			// pi_id
			$view_trans_tbl_accomplishment_a_mfo_2->pi_id->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->pi_id->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->pi_id->ViewCustomAttributes = "";

			// id
			$view_trans_tbl_accomplishment_a_mfo_2->id->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->id->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->id->ViewCustomAttributes = "";

			// unit_bo
			$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->unit_bo->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->ViewCustomAttributes = "";

			// unit_cu
			$view_trans_tbl_accomplishment_a_mfo_2->unit_cu->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->unit_cu->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->unit_cu->ViewCustomAttributes = "";

			// pi
			$view_trans_tbl_accomplishment_a_mfo_2->pi->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->pi->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->pi->ViewCustomAttributes = "";

			// pi_no
			$view_trans_tbl_accomplishment_a_mfo_2->pi_no->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->pi_no->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->pi_no->ViewCustomAttributes = "";

			// pi_description
			$view_trans_tbl_accomplishment_a_mfo_2->pi_description->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->pi_description->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->pi_description->ViewCustomAttributes = "";

			// pi_1
			$view_trans_tbl_accomplishment_a_mfo_2->pi_1->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->pi_1->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->pi_1->ViewCustomAttributes = "";

			// target
			$view_trans_tbl_accomplishment_a_mfo_2->target->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->target->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->target->CssStyle = "font-weight:bold;text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->target->ViewCustomAttributes = "";

			// t_numerator
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->ViewCustomAttributes = "";

			// t_numerator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->ViewCustomAttributes = "";

			// t_numerator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->ViewCustomAttributes = "";

			// t_numerator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->ViewCustomAttributes = "";

			// t_numerator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->ViewCustomAttributes = "";

			// t_denominator
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->ViewCustomAttributes = "";

			// t_denominator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->ViewCustomAttributes = "";

			// t_denominator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->ViewCustomAttributes = "";

			// t_denominator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->ViewCustomAttributes = "";

			// t_denominator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->ViewCustomAttributes = "";

			// accomplishment
			$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->accomplishment->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->CssStyle = "font-weight:bold;text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->a_numerator->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->ViewCustomAttributes = "";

			// a_numerator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->ViewCustomAttributes = "";

			// a_numerator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->ViewCustomAttributes = "";

			// a_numerator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->ViewCustomAttributes = "";

			// a_numerator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->ViewCustomAttributes = "";

			// a_denominator
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->a_denominator->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->ViewCustomAttributes = "";

			// a_denominator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->ViewCustomAttributes = "";

			// a_denominator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->ViewCustomAttributes = "";

			// a_denominator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->ViewCustomAttributes = "";

			// a_denominator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->ViewCustomAttributes = "";

			// remarks
			$view_trans_tbl_accomplishment_a_mfo_2->remarks->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->remarks->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->remarks->ViewCustomAttributes = "";

			// cu_sequence
			$view_trans_tbl_accomplishment_a_mfo_2->cu_sequence->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->cu_sequence->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->cu_sequence->ViewCustomAttributes = "";

			// id_units
			$view_trans_tbl_accomplishment_a_mfo_2->id_units->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->id_units->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->id_units->ViewCustomAttributes = "";

			// id_cu
			$view_trans_tbl_accomplishment_a_mfo_2->id_cu->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->id_cu->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->id_cu->ViewCustomAttributes = "";

			// above_90
			$view_trans_tbl_accomplishment_a_mfo_2->above_90->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->above_90->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->above_90->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->above_90->ViewCustomAttributes = "";

			// below_90
			$view_trans_tbl_accomplishment_a_mfo_2->below_90->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->below_90->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->below_90->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->below_90->ViewCustomAttributes = "";

			// remarks_cutOffDate
			$view_trans_tbl_accomplishment_a_mfo_2->remarks_cutOffDate->ViewValue = $view_trans_tbl_accomplishment_a_mfo_2->remarks_cutOffDate->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->remarks_cutOffDate->ViewValue = up_FormatDateTime($view_trans_tbl_accomplishment_a_mfo_2->remarks_cutOffDate->ViewValue, 6);
			$view_trans_tbl_accomplishment_a_mfo_2->remarks_cutOffDate->ViewCustomAttributes = "";

			// unit_bo
			$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->TooltipValue = "";

			// pi_no
			$view_trans_tbl_accomplishment_a_mfo_2->pi_no->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->pi_no->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->pi_no->TooltipValue = "";

			// pi_description
			$view_trans_tbl_accomplishment_a_mfo_2->pi_description->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->pi_description->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->pi_description->TooltipValue = "";

			// target
			$view_trans_tbl_accomplishment_a_mfo_2->target->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->target->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->target->TooltipValue = "";

			// t_numerator
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->TooltipValue = "";

			// t_numerator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->TooltipValue = "";

			// t_numerator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->TooltipValue = "";

			// t_numerator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->TooltipValue = "";

			// t_numerator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->TooltipValue = "";

			// t_denominator
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->TooltipValue = "";

			// t_denominator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->TooltipValue = "";

			// t_denominator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->TooltipValue = "";

			// t_denominator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->TooltipValue = "";

			// t_denominator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->TooltipValue = "";

			// accomplishment
			$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->TooltipValue = "";

			// a_numerator
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->TooltipValue = "";

			// a_numerator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->TooltipValue = "";

			// a_numerator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->TooltipValue = "";

			// a_numerator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->TooltipValue = "";

			// a_numerator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->TooltipValue = "";

			// a_denominator
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->TooltipValue = "";

			// a_denominator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->TooltipValue = "";

			// a_denominator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->TooltipValue = "";

			// a_denominator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->TooltipValue = "";

			// a_denominator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->TooltipValue = "";

			// remarks
			$view_trans_tbl_accomplishment_a_mfo_2->remarks->LinkCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->remarks->HrefValue = "";
			$view_trans_tbl_accomplishment_a_mfo_2->remarks->TooltipValue = "";
		} elseif ($view_trans_tbl_accomplishment_a_mfo_2->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// unit_bo
			$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->unit_bo->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->ViewCustomAttributes = "";

			// pi_no
			$view_trans_tbl_accomplishment_a_mfo_2->pi_no->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->pi_no->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->pi_no->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->pi_no->ViewCustomAttributes = "";

			// pi_description
			$view_trans_tbl_accomplishment_a_mfo_2->pi_description->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->pi_description->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->pi_description->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->pi_description->ViewCustomAttributes = "";

			// target
			$view_trans_tbl_accomplishment_a_mfo_2->target->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->target->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->target->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->target->CssStyle = "font-weight:bold;text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->target->ViewCustomAttributes = "";

			// t_numerator
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->ViewCustomAttributes = "";

			// t_numerator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->ViewCustomAttributes = "";

			// t_numerator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->ViewCustomAttributes = "";

			// t_numerator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->ViewCustomAttributes = "";

			// t_numerator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->ViewCustomAttributes = "";

			// t_denominator
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->ViewCustomAttributes = "";

			// t_denominator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->ViewCustomAttributes = "";

			// t_denominator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->ViewCustomAttributes = "";

			// t_denominator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->ViewCustomAttributes = "";

			// t_denominator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->ViewCustomAttributes = "";

			// accomplishment
			$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->accomplishment->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->CssStyle = "font-weight:bold;text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->ViewCustomAttributes = "";

			// a_numerator
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->a_numerator->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->ViewCustomAttributes = "";

			// a_numerator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->EditValue = up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->CurrentValue);

			// a_numerator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->EditValue = up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->CurrentValue);

			// a_numerator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->EditValue = up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->CurrentValue);

			// a_numerator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->EditValue = up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->CurrentValue);

			// a_denominator
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->EditValue = $view_trans_tbl_accomplishment_a_mfo_2->a_denominator->CurrentValue;
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->CssStyle = "text-align:right;";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->ViewCustomAttributes = "";

			// a_denominator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->EditValue = up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->CurrentValue);

			// a_denominator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->EditValue = up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->CurrentValue);

			// a_denominator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->EditValue = up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->CurrentValue);

			// a_denominator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->EditValue = up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->CurrentValue);

			// remarks
			$view_trans_tbl_accomplishment_a_mfo_2->remarks->EditCustomAttributes = "";
			$view_trans_tbl_accomplishment_a_mfo_2->remarks->EditValue = up_HtmlEncode($view_trans_tbl_accomplishment_a_mfo_2->remarks->CurrentValue);

			// Edit refer script
			// unit_bo

			$view_trans_tbl_accomplishment_a_mfo_2->unit_bo->HrefValue = "";

			// pi_no
			$view_trans_tbl_accomplishment_a_mfo_2->pi_no->HrefValue = "";

			// pi_description
			$view_trans_tbl_accomplishment_a_mfo_2->pi_description->HrefValue = "";

			// target
			$view_trans_tbl_accomplishment_a_mfo_2->target->HrefValue = "";

			// t_numerator
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator->HrefValue = "";

			// t_numerator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr1->HrefValue = "";

			// t_numerator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr2->HrefValue = "";

			// t_numerator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr3->HrefValue = "";

			// t_numerator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->t_numerator_qtr4->HrefValue = "";

			// t_denominator
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator->HrefValue = "";

			// t_denominator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr1->HrefValue = "";

			// t_denominator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr2->HrefValue = "";

			// t_denominator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr3->HrefValue = "";

			// t_denominator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->t_denominator_qtr4->HrefValue = "";

			// accomplishment
			$view_trans_tbl_accomplishment_a_mfo_2->accomplishment->HrefValue = "";

			// a_numerator
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator->HrefValue = "";

			// a_numerator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->HrefValue = "";

			// a_numerator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->HrefValue = "";

			// a_numerator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->HrefValue = "";

			// a_numerator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->HrefValue = "";

			// a_denominator
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator->HrefValue = "";

			// a_denominator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->HrefValue = "";

			// a_denominator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->HrefValue = "";

			// a_denominator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->HrefValue = "";

			// a_denominator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->HrefValue = "";

			// remarks
			$view_trans_tbl_accomplishment_a_mfo_2->remarks->HrefValue = "";
		}
		if ($view_trans_tbl_accomplishment_a_mfo_2->RowType == UP_ROWTYPE_ADD ||
			$view_trans_tbl_accomplishment_a_mfo_2->RowType == UP_ROWTYPE_EDIT ||
			$view_trans_tbl_accomplishment_a_mfo_2->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$view_trans_tbl_accomplishment_a_mfo_2->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($view_trans_tbl_accomplishment_a_mfo_2->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$view_trans_tbl_accomplishment_a_mfo_2->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $view_trans_tbl_accomplishment_a_mfo_2;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckNumber($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->FormValue)) {
			up_AddMessage($gsFormError, $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->FldErrMsg());
		}
		if (!up_CheckNumber($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->FormValue)) {
			up_AddMessage($gsFormError, $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->FldErrMsg());
		}
		if (!up_CheckNumber($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->FormValue)) {
			up_AddMessage($gsFormError, $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->FldErrMsg());
		}
		if (!up_CheckNumber($view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->FormValue)) {
			up_AddMessage($gsFormError, $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->FldErrMsg());
		}
		if (!up_CheckNumber($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->FormValue)) {
			up_AddMessage($gsFormError, $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->FldErrMsg());
		}
		if (!up_CheckNumber($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->FormValue)) {
			up_AddMessage($gsFormError, $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->FldErrMsg());
		}
		if (!up_CheckNumber($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->FormValue)) {
			up_AddMessage($gsFormError, $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->FldErrMsg());
		}
		if (!up_CheckNumber($view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->FormValue)) {
			up_AddMessage($gsFormError, $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->FldErrMsg());
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
		global $conn, $Security, $Language, $view_trans_tbl_accomplishment_a_mfo_2;
		$sFilter = $view_trans_tbl_accomplishment_a_mfo_2->KeyFilter();
		$view_trans_tbl_accomplishment_a_mfo_2->CurrentFilter = $sFilter;
		$sSql = $view_trans_tbl_accomplishment_a_mfo_2->SQL();
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
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->SetDbValueDef($rsnew, $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->CurrentValue, NULL, $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr1->ReadOnly);

			// a_numerator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->SetDbValueDef($rsnew, $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->CurrentValue, NULL, $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr2->ReadOnly);

			// a_numerator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->SetDbValueDef($rsnew, $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->CurrentValue, NULL, $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr3->ReadOnly);

			// a_numerator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->SetDbValueDef($rsnew, $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->CurrentValue, NULL, $view_trans_tbl_accomplishment_a_mfo_2->a_numerator_qtr4->ReadOnly);

			// a_denominator_qtr1
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->SetDbValueDef($rsnew, $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->CurrentValue, NULL, $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr1->ReadOnly);

			// a_denominator_qtr2
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->SetDbValueDef($rsnew, $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->CurrentValue, NULL, $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr2->ReadOnly);

			// a_denominator_qtr3
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->SetDbValueDef($rsnew, $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->CurrentValue, NULL, $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr3->ReadOnly);

			// a_denominator_qtr4
			$view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->SetDbValueDef($rsnew, $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->CurrentValue, NULL, $view_trans_tbl_accomplishment_a_mfo_2->a_denominator_qtr4->ReadOnly);

			// remarks
			$view_trans_tbl_accomplishment_a_mfo_2->remarks->SetDbValueDef($rsnew, $view_trans_tbl_accomplishment_a_mfo_2->remarks->CurrentValue, NULL, $view_trans_tbl_accomplishment_a_mfo_2->remarks->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $view_trans_tbl_accomplishment_a_mfo_2->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($view_trans_tbl_accomplishment_a_mfo_2->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($view_trans_tbl_accomplishment_a_mfo_2->CancelMessage <> "") {
					$this->setFailureMessage($view_trans_tbl_accomplishment_a_mfo_2->CancelMessage);
					$view_trans_tbl_accomplishment_a_mfo_2->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$view_trans_tbl_accomplishment_a_mfo_2->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'view_trans_tbl_accomplishment_a_mfo_2';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $view_trans_tbl_accomplishment_a_mfo_2;
		$table = 'view_trans_tbl_accomplishment_a_mfo_2';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['pi_id'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($view_trans_tbl_accomplishment_a_mfo_2->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($view_trans_tbl_accomplishment_a_mfo_2->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($view_trans_tbl_accomplishment_a_mfo_2->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($view_trans_tbl_accomplishment_a_mfo_2->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
						$oldvalue = "[XML]";
						$newvalue = "[XML]";
					} else {
						$oldvalue = $rsold[$fldname];
						$newvalue = $rsnew[$fldname];
					}
					up_WriteAuditTrail("log", $dt, $id, $usr, "U", $table, $fldname, $key, $oldvalue, $newvalue);
				}
			}
		}
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
