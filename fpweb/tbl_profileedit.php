<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "tbl_profileinfo.php" ?>
<?php include_once "tbl_collectionperiodinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$tbl_profile_edit = new ctbl_profile_edit();
$Page =& $tbl_profile_edit;

// Page init
$tbl_profile_edit->Page_Init();

// Page main
$tbl_profile_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_profile_edit = new up_Page("tbl_profile_edit");

// page properties
tbl_profile_edit.PageID = "edit"; // page ID
tbl_profile_edit.FormID = "ftbl_profileedit"; // form ID
var UP_PAGE_ID = tbl_profile_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_profile_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_facultyprofile_labHrs_basic"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_labHrs_basic->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_lecHrs_basic"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_lecHrs_basic->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_labSCH_basic"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_labSCH_basic->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_lecSCH_basic"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_lecSCH_basic->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_labCr_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_labCr_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_lecCr_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_lecCr_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_mixedLabLecCr_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_mixedLabLecCr_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_labHrs_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_labHrs_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_lecHrs_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_lecHrs_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_mixedLabLecHrs_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_labSCH_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_labSCH_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_lecSCH_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_lecSCH_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_mixedLabLecSCH_ugrad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_labCr_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_labCr_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_lecCr_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_lecCr_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_mixedLabLecCr_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_mixedLabLecCr_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_labHrs_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_labHrs_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_lecHrs_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_lecHrs_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_mixedLabLecHrs_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_mixedLabLecHrs_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_labSCH_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_labSCH_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_lecSCH_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_lecSCH_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_mixedLabLecSCH_graduate"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_mixedLabLecSCH_graduate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_researchLoad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_researchLoad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_extensionServicesLoad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_extensionServicesLoad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_studyLoad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_studyLoad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_forProductionLoad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_forProductionLoad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_administrativeLoad"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_administrativeLoad->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_facultyprofile_otherLoadCredits"];
		if (elm && !up_CheckNumber(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($tbl_profile->facultyprofile_otherLoadCredits->FldErrMsg()) ?>");

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
tbl_profile_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_profile_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
tbl_profile_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_profile_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

// multi page properties
tbl_profile_edit.MultiPage = new up_MultiPage();
tbl_profile_edit.MultiPage.AddElement("x_faculty_ID", 1);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_isHomeUnit", 1);
tbl_profile_edit.MultiPage.AddElement("x_facultyGroup_CHEDCode", 1);
tbl_profile_edit.MultiPage.AddElement("x_facultyRank_ID", 1);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_tenureCode", 1);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_leaveCode", 1);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_specificDiscipline_1_primaryTeachingLoad", 1);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_specificDiscipline_2_primaryTeachingLoad", 1);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_labHrs_basic", 2);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_lecHrs_basic", 2);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_labSCH_basic", 2);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_lecSCH_basic", 2);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_labCr_ugrad", 3);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_lecCr_ugrad", 3);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_mixedLabLecCr_ugrad", 3);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_labHrs_ugrad", 3);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_lecHrs_ugrad", 3);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_mixedLabLecHrs_ugrad", 3);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_labSCH_ugrad", 3);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_lecSCH_ugrad", 3);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_mixedLabLecSCH_ugrad", 3);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_labCr_graduate", 4);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_lecCr_graduate", 4);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_mixedLabLecCr_graduate", 4);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_labHrs_graduate", 4);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_lecHrs_graduate", 4);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_mixedLabLecHrs_graduate", 4);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_labSCH_graduate", 4);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_lecSCH_graduate", 4);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_mixedLabLecSCH_graduate", 4);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_researchLoad", 5);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_extensionServicesLoad", 5);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_studyLoad", 5);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_forProductionLoad", 5);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_administrativeLoad", 5);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_otherLoadCredits", 5);
tbl_profile_edit.MultiPage.AddElement("x_facultyprofile_remarks", 1);

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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_profile->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $tbl_profile->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $tbl_profile_edit->ShowPageHeader(); ?>
<?php
$tbl_profile_edit->ShowMessage();
?>
<form name="ftbl_profileedit" id="ftbl_profileedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return tbl_profile_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="tbl_profile">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" cellpadding="0"><tr><td>
<div id="tbl_profile_edit" class="yui-navset">
	<ul class="yui-nav">
		<li class="selected"><a href="#tab_tbl_profile_1"><em><span class="upbudgetofficeclass"><?php echo $tbl_profile->PageCaption(1) ?></span></em></a></li>
		<li><a href="#tab_tbl_profile_2"><em><span class="upbudgetofficeclass"><?php echo $tbl_profile->PageCaption(2) ?></span></em></a></li>
		<li><a href="#tab_tbl_profile_3"><em><span class="upbudgetofficeclass"><?php echo $tbl_profile->PageCaption(3) ?></span></em></a></li>
		<li><a href="#tab_tbl_profile_4"><em><span class="upbudgetofficeclass"><?php echo $tbl_profile->PageCaption(4) ?></span></em></a></li>
		<li><a href="#tab_tbl_profile_5"><em><span class="upbudgetofficeclass"><?php echo $tbl_profile->PageCaption(5) ?></span></em></a></li>
	</ul>            
	<div class="yui-content">
		<div id="tab_tbl_profile_1">
<table cellspacing="0" class="upGrid" style="width: 100%"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_profile->faculty_ID->Visible) { // faculty_ID ?>
	<tr id="r_faculty_ID"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->faculty_ID->FldCaption() ?></td>
		<td<?php echo $tbl_profile->faculty_ID->CellAttributes() ?>><span id="el_faculty_ID">
<div<?php echo $tbl_profile->faculty_ID->ViewAttributes() ?>><?php echo $tbl_profile->faculty_ID->EditValue ?></div>
<input type="hidden" name="x_faculty_ID" id="x_faculty_ID" value="<?php echo up_HtmlEncode($tbl_profile->faculty_ID->CurrentValue) ?>">
</span><?php echo $tbl_profile->faculty_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_isHomeUnit->Visible) { // facultyprofile_isHomeUnit ?>
	<tr id="r_facultyprofile_isHomeUnit"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_isHomeUnit->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_isHomeUnit->CellAttributes() ?>><span id="el_facultyprofile_isHomeUnit">
<div id="tp_x_facultyprofile_isHomeUnit" class="<?php echo UP_ITEM_TEMPLATE_CLASSNAME ?>"><label><input type="radio" name="x_facultyprofile_isHomeUnit" id="x_facultyprofile_isHomeUnit" value="{value}"<?php echo $tbl_profile->facultyprofile_isHomeUnit->EditAttributes() ?>></label></div>
<div id="dsl_x_facultyprofile_isHomeUnit" data-repeatcolumn="5" class="upItemList">
<?php
$arwrk = $tbl_profile->facultyprofile_isHomeUnit->EditValue;
if (is_array($arwrk)) {
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_isHomeUnit->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " checked=\"checked\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;

		// Note: No spacing within the LABEL tag
?>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 1) ?>
<label><input type="radio" name="x_facultyprofile_isHomeUnit" id="x_facultyprofile_isHomeUnit" value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?><?php echo $tbl_profile->facultyprofile_isHomeUnit->EditAttributes() ?>><?php echo $arwrk[$rowcntwrk][1] ?></label>
<?php echo up_RepeatColumnTable($rowswrk, $rowcntwrk, 5, 2) ?>
<?php
	}
}
?>
</div>
</span><?php echo $tbl_profile->facultyprofile_isHomeUnit->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyGroup_CHEDCode->Visible) { // facultyGroup_CHEDCode ?>
	<tr id="r_facultyGroup_CHEDCode"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyGroup_CHEDCode->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyGroup_CHEDCode->CellAttributes() ?>><span id="el_facultyGroup_CHEDCode">
<select id="x_facultyGroup_CHEDCode" name="x_facultyGroup_CHEDCode"<?php echo $tbl_profile->facultyGroup_CHEDCode->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyGroup_CHEDCode->EditValue)) {
	$arwrk = $tbl_profile->facultyGroup_CHEDCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyGroup_CHEDCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $tbl_profile->facultyGroup_CHEDCode->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyRank_ID->Visible) { // facultyRank_ID ?>
	<tr id="r_facultyRank_ID"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyRank_ID->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyRank_ID->CellAttributes() ?>><span id="el_facultyRank_ID">
<select id="x_facultyRank_ID" name="x_facultyRank_ID"<?php echo $tbl_profile->facultyRank_ID->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyRank_ID->EditValue)) {
	$arwrk = $tbl_profile->facultyRank_ID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyRank_ID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $tbl_profile->facultyRank_ID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_tenureCode->Visible) { // facultyprofile_tenureCode ?>
	<tr id="r_facultyprofile_tenureCode"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_tenureCode->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_tenureCode->CellAttributes() ?>><span id="el_facultyprofile_tenureCode">
<select id="x_facultyprofile_tenureCode" name="x_facultyprofile_tenureCode"<?php echo $tbl_profile->facultyprofile_tenureCode->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_tenureCode->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_tenureCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_tenureCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $tbl_profile->facultyprofile_tenureCode->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_leaveCode->Visible) { // facultyprofile_leaveCode ?>
	<tr id="r_facultyprofile_leaveCode"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_leaveCode->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_leaveCode->CellAttributes() ?>><span id="el_facultyprofile_leaveCode">
<select id="x_facultyprofile_leaveCode" name="x_facultyprofile_leaveCode"<?php echo $tbl_profile->facultyprofile_leaveCode->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_leaveCode->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_leaveCode->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_leaveCode->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $tbl_profile->facultyprofile_leaveCode->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_1_primaryTeachingLoad ?>
	<tr id="r_facultyprofile_specificDiscipline_1_primaryTeachingLoad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CellAttributes() ?>><span id="el_facultyprofile_specificDiscipline_1_primaryTeachingLoad">
<select id="x_facultyprofile_specificDiscipline_1_primaryTeachingLoad" name="x_facultyprofile_specificDiscipline_1_primaryTeachingLoad"<?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->Visible) { // facultyprofile_specificDiscipline_2_primaryTeachingLoad ?>
	<tr id="r_facultyprofile_specificDiscipline_2_primaryTeachingLoad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CellAttributes() ?>><span id="el_facultyprofile_specificDiscipline_2_primaryTeachingLoad">
<select id="x_facultyprofile_specificDiscipline_2_primaryTeachingLoad" name="x_facultyprofile_specificDiscipline_2_primaryTeachingLoad"<?php echo $tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->EditAttributes() ?>>
<?php
if (is_array($tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->EditValue)) {
	$arwrk = $tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo up_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_remarks->Visible) { // facultyprofile_remarks ?>
	<tr id="r_facultyprofile_remarks"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_remarks->FldCaption() ?> (Page 19 of the User's Guide.)</td>
		<td<?php echo $tbl_profile->facultyprofile_remarks->CellAttributes() ?>><span id="el_facultyprofile_remarks">
<input type="text" name="x_facultyprofile_remarks" id="x_facultyprofile_remarks" size="70" maxlength="255" value="<?php echo $tbl_profile->facultyprofile_remarks->EditValue ?>"<?php echo $tbl_profile->facultyprofile_remarks->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
		</div>
		<div id="tab_tbl_profile_2">
<table cellspacing="0" class="upGrid" style="width: 100%"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_profile->facultyprofile_labHrs_basic->Visible) { // facultyprofile_labHrs_basic ?>
	<tr id="r_facultyprofile_labHrs_basic"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_labHrs_basic->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_labHrs_basic->CellAttributes() ?>><span id="el_facultyprofile_labHrs_basic">
<input type="text" name="x_facultyprofile_labHrs_basic" id="x_facultyprofile_labHrs_basic" size="30" value="<?php echo $tbl_profile->facultyprofile_labHrs_basic->EditValue ?>"<?php echo $tbl_profile->facultyprofile_labHrs_basic->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_labHrs_basic->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_lecHrs_basic->Visible) { // facultyprofile_lecHrs_basic ?>
	<tr id="r_facultyprofile_lecHrs_basic"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_lecHrs_basic->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_lecHrs_basic->CellAttributes() ?>><span id="el_facultyprofile_lecHrs_basic">
<input type="text" name="x_facultyprofile_lecHrs_basic" id="x_facultyprofile_lecHrs_basic" size="30" value="<?php echo $tbl_profile->facultyprofile_lecHrs_basic->EditValue ?>"<?php echo $tbl_profile->facultyprofile_lecHrs_basic->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_lecHrs_basic->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_labSCH_basic->Visible) { // facultyprofile_labSCH_basic ?>
	<tr id="r_facultyprofile_labSCH_basic"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_labSCH_basic->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_labSCH_basic->CellAttributes() ?>><span id="el_facultyprofile_labSCH_basic">
<input type="text" name="x_facultyprofile_labSCH_basic" id="x_facultyprofile_labSCH_basic" size="30" value="<?php echo $tbl_profile->facultyprofile_labSCH_basic->EditValue ?>"<?php echo $tbl_profile->facultyprofile_labSCH_basic->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_labSCH_basic->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_lecSCH_basic->Visible) { // facultyprofile_lecSCH_basic ?>
	<tr id="r_facultyprofile_lecSCH_basic"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_lecSCH_basic->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_lecSCH_basic->CellAttributes() ?>><span id="el_facultyprofile_lecSCH_basic">
<input type="text" name="x_facultyprofile_lecSCH_basic" id="x_facultyprofile_lecSCH_basic" size="30" value="<?php echo $tbl_profile->facultyprofile_lecSCH_basic->EditValue ?>"<?php echo $tbl_profile->facultyprofile_lecSCH_basic->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_lecSCH_basic->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
		</div>
		<div id="tab_tbl_profile_3">
<table cellspacing="0" class="upGrid" style="width: 100%"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_profile->facultyprofile_labCr_ugrad->Visible) { // facultyprofile_labCr_ugrad ?>
	<tr id="r_facultyprofile_labCr_ugrad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_labCr_ugrad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_labCr_ugrad->CellAttributes() ?>><span id="el_facultyprofile_labCr_ugrad">
<input type="text" name="x_facultyprofile_labCr_ugrad" id="x_facultyprofile_labCr_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_labCr_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_labCr_ugrad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_labCr_ugrad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_lecCr_ugrad->Visible) { // facultyprofile_lecCr_ugrad ?>
	<tr id="r_facultyprofile_lecCr_ugrad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_lecCr_ugrad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_lecCr_ugrad->CellAttributes() ?>><span id="el_facultyprofile_lecCr_ugrad">
<input type="text" name="x_facultyprofile_lecCr_ugrad" id="x_facultyprofile_lecCr_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_lecCr_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_lecCr_ugrad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_lecCr_ugrad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_mixedLabLecCr_ugrad->Visible) { // facultyprofile_mixedLabLecCr_ugrad ?>
	<tr id="r_facultyprofile_mixedLabLecCr_ugrad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->CellAttributes() ?>><span id="el_facultyprofile_mixedLabLecCr_ugrad">
<input type="text" name="x_facultyprofile_mixedLabLecCr_ugrad" id="x_facultyprofile_mixedLabLecCr_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_labHrs_ugrad->Visible) { // facultyprofile_labHrs_ugrad ?>
	<tr id="r_facultyprofile_labHrs_ugrad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_labHrs_ugrad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_labHrs_ugrad->CellAttributes() ?>><span id="el_facultyprofile_labHrs_ugrad">
<input type="text" name="x_facultyprofile_labHrs_ugrad" id="x_facultyprofile_labHrs_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_labHrs_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_labHrs_ugrad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_labHrs_ugrad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_lecHrs_ugrad->Visible) { // facultyprofile_lecHrs_ugrad ?>
	<tr id="r_facultyprofile_lecHrs_ugrad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_lecHrs_ugrad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_lecHrs_ugrad->CellAttributes() ?>><span id="el_facultyprofile_lecHrs_ugrad">
<input type="text" name="x_facultyprofile_lecHrs_ugrad" id="x_facultyprofile_lecHrs_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_lecHrs_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_lecHrs_ugrad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_lecHrs_ugrad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->Visible) { // facultyprofile_mixedLabLecHrs_ugrad ?>
	<tr id="r_facultyprofile_mixedLabLecHrs_ugrad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->CellAttributes() ?>><span id="el_facultyprofile_mixedLabLecHrs_ugrad">
<input type="text" name="x_facultyprofile_mixedLabLecHrs_ugrad" id="x_facultyprofile_mixedLabLecHrs_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_labSCH_ugrad->Visible) { // facultyprofile_labSCH_ugrad ?>
	<tr id="r_facultyprofile_labSCH_ugrad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_labSCH_ugrad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_labSCH_ugrad->CellAttributes() ?>><span id="el_facultyprofile_labSCH_ugrad">
<input type="text" name="x_facultyprofile_labSCH_ugrad" id="x_facultyprofile_labSCH_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_labSCH_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_labSCH_ugrad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_labSCH_ugrad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_lecSCH_ugrad->Visible) { // facultyprofile_lecSCH_ugrad ?>
	<tr id="r_facultyprofile_lecSCH_ugrad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_lecSCH_ugrad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_lecSCH_ugrad->CellAttributes() ?>><span id="el_facultyprofile_lecSCH_ugrad">
<input type="text" name="x_facultyprofile_lecSCH_ugrad" id="x_facultyprofile_lecSCH_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_lecSCH_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_lecSCH_ugrad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_lecSCH_ugrad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->Visible) { // facultyprofile_mixedLabLecSCH_ugrad ?>
	<tr id="r_facultyprofile_mixedLabLecSCH_ugrad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->CellAttributes() ?>><span id="el_facultyprofile_mixedLabLecSCH_ugrad">
<input type="text" name="x_facultyprofile_mixedLabLecSCH_ugrad" id="x_facultyprofile_mixedLabLecSCH_ugrad" size="30" value="<?php echo $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
		</div>
		<div id="tab_tbl_profile_4">
<table cellspacing="0" class="upGrid" style="width: 100%"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_profile->facultyprofile_labCr_graduate->Visible) { // facultyprofile_labCr_graduate ?>
	<tr id="r_facultyprofile_labCr_graduate"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_labCr_graduate->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_labCr_graduate->CellAttributes() ?>><span id="el_facultyprofile_labCr_graduate">
<input type="text" name="x_facultyprofile_labCr_graduate" id="x_facultyprofile_labCr_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_labCr_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_labCr_graduate->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_labCr_graduate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_lecCr_graduate->Visible) { // facultyprofile_lecCr_graduate ?>
	<tr id="r_facultyprofile_lecCr_graduate"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_lecCr_graduate->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_lecCr_graduate->CellAttributes() ?>><span id="el_facultyprofile_lecCr_graduate">
<input type="text" name="x_facultyprofile_lecCr_graduate" id="x_facultyprofile_lecCr_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_lecCr_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_lecCr_graduate->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_lecCr_graduate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_mixedLabLecCr_graduate->Visible) { // facultyprofile_mixedLabLecCr_graduate ?>
	<tr id="r_facultyprofile_mixedLabLecCr_graduate"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_mixedLabLecCr_graduate->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_mixedLabLecCr_graduate->CellAttributes() ?>><span id="el_facultyprofile_mixedLabLecCr_graduate">
<input type="text" name="x_facultyprofile_mixedLabLecCr_graduate" id="x_facultyprofile_mixedLabLecCr_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_mixedLabLecCr_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_mixedLabLecCr_graduate->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_mixedLabLecCr_graduate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_labHrs_graduate->Visible) { // facultyprofile_labHrs_graduate ?>
	<tr id="r_facultyprofile_labHrs_graduate"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_labHrs_graduate->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_labHrs_graduate->CellAttributes() ?>><span id="el_facultyprofile_labHrs_graduate">
<input type="text" name="x_facultyprofile_labHrs_graduate" id="x_facultyprofile_labHrs_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_labHrs_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_labHrs_graduate->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_labHrs_graduate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_lecHrs_graduate->Visible) { // facultyprofile_lecHrs_graduate ?>
	<tr id="r_facultyprofile_lecHrs_graduate"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_lecHrs_graduate->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_lecHrs_graduate->CellAttributes() ?>><span id="el_facultyprofile_lecHrs_graduate">
<input type="text" name="x_facultyprofile_lecHrs_graduate" id="x_facultyprofile_lecHrs_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_lecHrs_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_lecHrs_graduate->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_lecHrs_graduate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_mixedLabLecHrs_graduate->Visible) { // facultyprofile_mixedLabLecHrs_graduate ?>
	<tr id="r_facultyprofile_mixedLabLecHrs_graduate"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->CellAttributes() ?>><span id="el_facultyprofile_mixedLabLecHrs_graduate">
<input type="text" name="x_facultyprofile_mixedLabLecHrs_graduate" id="x_facultyprofile_mixedLabLecHrs_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_labSCH_graduate->Visible) { // facultyprofile_labSCH_graduate ?>
	<tr id="r_facultyprofile_labSCH_graduate"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_labSCH_graduate->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_labSCH_graduate->CellAttributes() ?>><span id="el_facultyprofile_labSCH_graduate">
<input type="text" name="x_facultyprofile_labSCH_graduate" id="x_facultyprofile_labSCH_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_labSCH_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_labSCH_graduate->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_labSCH_graduate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_lecSCH_graduate->Visible) { // facultyprofile_lecSCH_graduate ?>
	<tr id="r_facultyprofile_lecSCH_graduate"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_lecSCH_graduate->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_lecSCH_graduate->CellAttributes() ?>><span id="el_facultyprofile_lecSCH_graduate">
<input type="text" name="x_facultyprofile_lecSCH_graduate" id="x_facultyprofile_lecSCH_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_lecSCH_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_lecSCH_graduate->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_lecSCH_graduate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_mixedLabLecSCH_graduate->Visible) { // facultyprofile_mixedLabLecSCH_graduate ?>
	<tr id="r_facultyprofile_mixedLabLecSCH_graduate"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->CellAttributes() ?>><span id="el_facultyprofile_mixedLabLecSCH_graduate">
<input type="text" name="x_facultyprofile_mixedLabLecSCH_graduate" id="x_facultyprofile_mixedLabLecSCH_graduate" size="30" value="<?php echo $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->EditValue ?>"<?php echo $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
		</div>
		<div id="tab_tbl_profile_5">
<table cellspacing="0" class="upGrid" style="width: 100%"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($tbl_profile->facultyprofile_researchLoad->Visible) { // facultyprofile_researchLoad ?>
	<tr id="r_facultyprofile_researchLoad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_researchLoad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_researchLoad->CellAttributes() ?>><span id="el_facultyprofile_researchLoad">
<input type="text" name="x_facultyprofile_researchLoad" id="x_facultyprofile_researchLoad" size="30" value="<?php echo $tbl_profile->facultyprofile_researchLoad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_researchLoad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_researchLoad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_extensionServicesLoad->Visible) { // facultyprofile_extensionServicesLoad ?>
	<tr id="r_facultyprofile_extensionServicesLoad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_extensionServicesLoad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_extensionServicesLoad->CellAttributes() ?>><span id="el_facultyprofile_extensionServicesLoad">
<input type="text" name="x_facultyprofile_extensionServicesLoad" id="x_facultyprofile_extensionServicesLoad" size="30" value="<?php echo $tbl_profile->facultyprofile_extensionServicesLoad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_extensionServicesLoad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_extensionServicesLoad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_studyLoad->Visible) { // facultyprofile_studyLoad ?>
	<tr id="r_facultyprofile_studyLoad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_studyLoad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_studyLoad->CellAttributes() ?>><span id="el_facultyprofile_studyLoad">
<input type="text" name="x_facultyprofile_studyLoad" id="x_facultyprofile_studyLoad" size="30" value="<?php echo $tbl_profile->facultyprofile_studyLoad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_studyLoad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_studyLoad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_forProductionLoad->Visible) { // facultyprofile_forProductionLoad ?>
	<tr id="r_facultyprofile_forProductionLoad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_forProductionLoad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_forProductionLoad->CellAttributes() ?>><span id="el_facultyprofile_forProductionLoad">
<input type="text" name="x_facultyprofile_forProductionLoad" id="x_facultyprofile_forProductionLoad" size="30" value="<?php echo $tbl_profile->facultyprofile_forProductionLoad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_forProductionLoad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_forProductionLoad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_administrativeLoad->Visible) { // facultyprofile_administrativeLoad ?>
	<tr id="r_facultyprofile_administrativeLoad"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_administrativeLoad->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_administrativeLoad->CellAttributes() ?>><span id="el_facultyprofile_administrativeLoad">
<input type="text" name="x_facultyprofile_administrativeLoad" id="x_facultyprofile_administrativeLoad" size="30" value="<?php echo $tbl_profile->facultyprofile_administrativeLoad->EditValue ?>"<?php echo $tbl_profile->facultyprofile_administrativeLoad->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_administrativeLoad->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_profile->facultyprofile_otherLoadCredits->Visible) { // facultyprofile_otherLoadCredits ?>
	<tr id="r_facultyprofile_otherLoadCredits"<?php echo $tbl_profile->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $tbl_profile->facultyprofile_otherLoadCredits->FldCaption() ?></td>
		<td<?php echo $tbl_profile->facultyprofile_otherLoadCredits->CellAttributes() ?>><span id="el_facultyprofile_otherLoadCredits">
<input type="text" name="x_facultyprofile_otherLoadCredits" id="x_facultyprofile_otherLoadCredits" size="30" value="<?php echo $tbl_profile->facultyprofile_otherLoadCredits->EditValue ?>"<?php echo $tbl_profile->facultyprofile_otherLoadCredits->EditAttributes() ?>>
</span><?php echo $tbl_profile->facultyprofile_otherLoadCredits->CustomMsg ?></td>
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
up_TabView(tbl_profile_edit);

//-->
</script>	
<input type="hidden" name="x_facultyprofile_ID" id="x_facultyprofile_ID" value="<?php echo up_HtmlEncode($tbl_profile->facultyprofile_ID->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$tbl_profile_edit->ShowPageFooter();
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
$tbl_profile_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class ctbl_profile_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'tbl_profile';

	// Page object name
	var $PageObjName = 'tbl_profile_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $tbl_profile;
		if ($tbl_profile->UseTokenInUrl) $PageUrl .= "t=" . $tbl_profile->TableVar . "&"; // Add page token
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
		global $objForm, $tbl_profile;
		if ($tbl_profile->UseTokenInUrl) {
			if ($objForm)
				return ($tbl_profile->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_profile->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function ctbl_profile_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (tbl_profile)
		if (!isset($GLOBALS["tbl_profile"])) {
			$GLOBALS["tbl_profile"] = new ctbl_profile();
			$GLOBALS["Table"] =& $GLOBALS["tbl_profile"];
		}

		// Table object (tbl_collectionperiod)
		if (!isset($GLOBALS['tbl_collectionperiod'])) $GLOBALS['tbl_collectionperiod'] = new ctbl_collectionperiod();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'tbl_profile', TRUE);

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
		global $tbl_profile;

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
			$this->Page_Terminate("tbl_profilelist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("tbl_profilelist.php");
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
		global $objForm, $Language, $gsFormError, $tbl_profile;

		// Load key from QueryString
		if (@$_GET["facultyprofile_ID"] <> "")
			$tbl_profile->facultyprofile_ID->setQueryStringValue($_GET["facultyprofile_ID"]);

		// Set up master detail parameters
		$this->SetUpMasterParms();
		if (@$_POST["a_edit"] <> "") {
			$tbl_profile->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$tbl_profile->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$tbl_profile->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$tbl_profile->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($tbl_profile->facultyprofile_ID->CurrentValue == "")
			$this->Page_Terminate("tbl_profilelist.php"); // Invalid key, return to list
		switch ($tbl_profile->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("tbl_profilelist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$tbl_profile->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $tbl_profile->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$tbl_profile->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$tbl_profile->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$tbl_profile->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_profile;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_profile;
		if (!$tbl_profile->faculty_ID->FldIsDetailKey) {
			$tbl_profile->faculty_ID->setFormValue($objForm->GetValue("x_faculty_ID"));
		}
		if (!$tbl_profile->facultyprofile_isHomeUnit->FldIsDetailKey) {
			$tbl_profile->facultyprofile_isHomeUnit->setFormValue($objForm->GetValue("x_facultyprofile_isHomeUnit"));
		}
		if (!$tbl_profile->facultyGroup_CHEDCode->FldIsDetailKey) {
			$tbl_profile->facultyGroup_CHEDCode->setFormValue($objForm->GetValue("x_facultyGroup_CHEDCode"));
		}
		if (!$tbl_profile->facultyRank_ID->FldIsDetailKey) {
			$tbl_profile->facultyRank_ID->setFormValue($objForm->GetValue("x_facultyRank_ID"));
		}
		if (!$tbl_profile->facultyprofile_tenureCode->FldIsDetailKey) {
			$tbl_profile->facultyprofile_tenureCode->setFormValue($objForm->GetValue("x_facultyprofile_tenureCode"));
		}
		if (!$tbl_profile->facultyprofile_leaveCode->FldIsDetailKey) {
			$tbl_profile->facultyprofile_leaveCode->setFormValue($objForm->GetValue("x_facultyprofile_leaveCode"));
		}
		if (!$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setFormValue($objForm->GetValue("x_facultyprofile_specificDiscipline_1_primaryTeachingLoad"));
		}
		if (!$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->setFormValue($objForm->GetValue("x_facultyprofile_specificDiscipline_2_primaryTeachingLoad"));
		}
		if (!$tbl_profile->facultyprofile_labHrs_basic->FldIsDetailKey) {
			$tbl_profile->facultyprofile_labHrs_basic->setFormValue($objForm->GetValue("x_facultyprofile_labHrs_basic"));
		}
		if (!$tbl_profile->facultyprofile_lecHrs_basic->FldIsDetailKey) {
			$tbl_profile->facultyprofile_lecHrs_basic->setFormValue($objForm->GetValue("x_facultyprofile_lecHrs_basic"));
		}
		if (!$tbl_profile->facultyprofile_labSCH_basic->FldIsDetailKey) {
			$tbl_profile->facultyprofile_labSCH_basic->setFormValue($objForm->GetValue("x_facultyprofile_labSCH_basic"));
		}
		if (!$tbl_profile->facultyprofile_lecSCH_basic->FldIsDetailKey) {
			$tbl_profile->facultyprofile_lecSCH_basic->setFormValue($objForm->GetValue("x_facultyprofile_lecSCH_basic"));
		}
		if (!$tbl_profile->facultyprofile_labCr_ugrad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_labCr_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_labCr_ugrad"));
		}
		if (!$tbl_profile->facultyprofile_lecCr_ugrad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_lecCr_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_lecCr_ugrad"));
		}
		if (!$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_mixedLabLecCr_ugrad"));
		}
		if (!$tbl_profile->facultyprofile_labHrs_ugrad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_labHrs_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_labHrs_ugrad"));
		}
		if (!$tbl_profile->facultyprofile_lecHrs_ugrad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_lecHrs_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_lecHrs_ugrad"));
		}
		if (!$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_mixedLabLecHrs_ugrad"));
		}
		if (!$tbl_profile->facultyprofile_labSCH_ugrad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_labSCH_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_labSCH_ugrad"));
		}
		if (!$tbl_profile->facultyprofile_lecSCH_ugrad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_lecSCH_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_lecSCH_ugrad"));
		}
		if (!$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->setFormValue($objForm->GetValue("x_facultyprofile_mixedLabLecSCH_ugrad"));
		}
		if (!$tbl_profile->facultyprofile_labCr_graduate->FldIsDetailKey) {
			$tbl_profile->facultyprofile_labCr_graduate->setFormValue($objForm->GetValue("x_facultyprofile_labCr_graduate"));
		}
		if (!$tbl_profile->facultyprofile_lecCr_graduate->FldIsDetailKey) {
			$tbl_profile->facultyprofile_lecCr_graduate->setFormValue($objForm->GetValue("x_facultyprofile_lecCr_graduate"));
		}
		if (!$tbl_profile->facultyprofile_mixedLabLecCr_graduate->FldIsDetailKey) {
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->setFormValue($objForm->GetValue("x_facultyprofile_mixedLabLecCr_graduate"));
		}
		if (!$tbl_profile->facultyprofile_labHrs_graduate->FldIsDetailKey) {
			$tbl_profile->facultyprofile_labHrs_graduate->setFormValue($objForm->GetValue("x_facultyprofile_labHrs_graduate"));
		}
		if (!$tbl_profile->facultyprofile_lecHrs_graduate->FldIsDetailKey) {
			$tbl_profile->facultyprofile_lecHrs_graduate->setFormValue($objForm->GetValue("x_facultyprofile_lecHrs_graduate"));
		}
		if (!$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->FldIsDetailKey) {
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->setFormValue($objForm->GetValue("x_facultyprofile_mixedLabLecHrs_graduate"));
		}
		if (!$tbl_profile->facultyprofile_labSCH_graduate->FldIsDetailKey) {
			$tbl_profile->facultyprofile_labSCH_graduate->setFormValue($objForm->GetValue("x_facultyprofile_labSCH_graduate"));
		}
		if (!$tbl_profile->facultyprofile_lecSCH_graduate->FldIsDetailKey) {
			$tbl_profile->facultyprofile_lecSCH_graduate->setFormValue($objForm->GetValue("x_facultyprofile_lecSCH_graduate"));
		}
		if (!$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->FldIsDetailKey) {
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->setFormValue($objForm->GetValue("x_facultyprofile_mixedLabLecSCH_graduate"));
		}
		if (!$tbl_profile->facultyprofile_researchLoad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_researchLoad->setFormValue($objForm->GetValue("x_facultyprofile_researchLoad"));
		}
		if (!$tbl_profile->facultyprofile_extensionServicesLoad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_extensionServicesLoad->setFormValue($objForm->GetValue("x_facultyprofile_extensionServicesLoad"));
		}
		if (!$tbl_profile->facultyprofile_studyLoad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_studyLoad->setFormValue($objForm->GetValue("x_facultyprofile_studyLoad"));
		}
		if (!$tbl_profile->facultyprofile_forProductionLoad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_forProductionLoad->setFormValue($objForm->GetValue("x_facultyprofile_forProductionLoad"));
		}
		if (!$tbl_profile->facultyprofile_administrativeLoad->FldIsDetailKey) {
			$tbl_profile->facultyprofile_administrativeLoad->setFormValue($objForm->GetValue("x_facultyprofile_administrativeLoad"));
		}
		if (!$tbl_profile->facultyprofile_otherLoadCredits->FldIsDetailKey) {
			$tbl_profile->facultyprofile_otherLoadCredits->setFormValue($objForm->GetValue("x_facultyprofile_otherLoadCredits"));
		}
		if (!$tbl_profile->facultyprofile_remarks->FldIsDetailKey) {
			$tbl_profile->facultyprofile_remarks->setFormValue($objForm->GetValue("x_facultyprofile_remarks"));
		}
		if (!$tbl_profile->facultyprofile_ID->FldIsDetailKey)
			$tbl_profile->facultyprofile_ID->setFormValue($objForm->GetValue("x_facultyprofile_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $tbl_profile;
		$this->LoadRow();
		$tbl_profile->facultyprofile_ID->CurrentValue = $tbl_profile->facultyprofile_ID->FormValue;
		$tbl_profile->faculty_ID->CurrentValue = $tbl_profile->faculty_ID->FormValue;
		$tbl_profile->facultyprofile_isHomeUnit->CurrentValue = $tbl_profile->facultyprofile_isHomeUnit->FormValue;
		$tbl_profile->facultyGroup_CHEDCode->CurrentValue = $tbl_profile->facultyGroup_CHEDCode->FormValue;
		$tbl_profile->facultyRank_ID->CurrentValue = $tbl_profile->facultyRank_ID->FormValue;
		$tbl_profile->facultyprofile_tenureCode->CurrentValue = $tbl_profile->facultyprofile_tenureCode->FormValue;
		$tbl_profile->facultyprofile_leaveCode->CurrentValue = $tbl_profile->facultyprofile_leaveCode->FormValue;
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue = $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->FormValue;
		$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue = $tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->FormValue;
		$tbl_profile->facultyprofile_labHrs_basic->CurrentValue = $tbl_profile->facultyprofile_labHrs_basic->FormValue;
		$tbl_profile->facultyprofile_lecHrs_basic->CurrentValue = $tbl_profile->facultyprofile_lecHrs_basic->FormValue;
		$tbl_profile->facultyprofile_labSCH_basic->CurrentValue = $tbl_profile->facultyprofile_labSCH_basic->FormValue;
		$tbl_profile->facultyprofile_lecSCH_basic->CurrentValue = $tbl_profile->facultyprofile_lecSCH_basic->FormValue;
		$tbl_profile->facultyprofile_labCr_ugrad->CurrentValue = $tbl_profile->facultyprofile_labCr_ugrad->FormValue;
		$tbl_profile->facultyprofile_lecCr_ugrad->CurrentValue = $tbl_profile->facultyprofile_lecCr_ugrad->FormValue;
		$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->CurrentValue = $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->FormValue;
		$tbl_profile->facultyprofile_labHrs_ugrad->CurrentValue = $tbl_profile->facultyprofile_labHrs_ugrad->FormValue;
		$tbl_profile->facultyprofile_lecHrs_ugrad->CurrentValue = $tbl_profile->facultyprofile_lecHrs_ugrad->FormValue;
		$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->CurrentValue = $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->FormValue;
		$tbl_profile->facultyprofile_labSCH_ugrad->CurrentValue = $tbl_profile->facultyprofile_labSCH_ugrad->FormValue;
		$tbl_profile->facultyprofile_lecSCH_ugrad->CurrentValue = $tbl_profile->facultyprofile_lecSCH_ugrad->FormValue;
		$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->CurrentValue = $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->FormValue;
		$tbl_profile->facultyprofile_labCr_graduate->CurrentValue = $tbl_profile->facultyprofile_labCr_graduate->FormValue;
		$tbl_profile->facultyprofile_lecCr_graduate->CurrentValue = $tbl_profile->facultyprofile_lecCr_graduate->FormValue;
		$tbl_profile->facultyprofile_mixedLabLecCr_graduate->CurrentValue = $tbl_profile->facultyprofile_mixedLabLecCr_graduate->FormValue;
		$tbl_profile->facultyprofile_labHrs_graduate->CurrentValue = $tbl_profile->facultyprofile_labHrs_graduate->FormValue;
		$tbl_profile->facultyprofile_lecHrs_graduate->CurrentValue = $tbl_profile->facultyprofile_lecHrs_graduate->FormValue;
		$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->CurrentValue = $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->FormValue;
		$tbl_profile->facultyprofile_labSCH_graduate->CurrentValue = $tbl_profile->facultyprofile_labSCH_graduate->FormValue;
		$tbl_profile->facultyprofile_lecSCH_graduate->CurrentValue = $tbl_profile->facultyprofile_lecSCH_graduate->FormValue;
		$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->CurrentValue = $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->FormValue;
		$tbl_profile->facultyprofile_researchLoad->CurrentValue = $tbl_profile->facultyprofile_researchLoad->FormValue;
		$tbl_profile->facultyprofile_extensionServicesLoad->CurrentValue = $tbl_profile->facultyprofile_extensionServicesLoad->FormValue;
		$tbl_profile->facultyprofile_studyLoad->CurrentValue = $tbl_profile->facultyprofile_studyLoad->FormValue;
		$tbl_profile->facultyprofile_forProductionLoad->CurrentValue = $tbl_profile->facultyprofile_forProductionLoad->FormValue;
		$tbl_profile->facultyprofile_administrativeLoad->CurrentValue = $tbl_profile->facultyprofile_administrativeLoad->FormValue;
		$tbl_profile->facultyprofile_otherLoadCredits->CurrentValue = $tbl_profile->facultyprofile_otherLoadCredits->FormValue;
		$tbl_profile->facultyprofile_remarks->CurrentValue = $tbl_profile->facultyprofile_remarks->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_profile;
		$sFilter = $tbl_profile->KeyFilter();

		// Call Row Selecting event
		$tbl_profile->Row_Selecting($sFilter);

		// Load SQL based on filter
		$tbl_profile->CurrentFilter = $sFilter;
		$sSql = $tbl_profile->SQL();
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
		global $conn, $tbl_profile;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$tbl_profile->Row_Selected($row);
		$tbl_profile->facultyprofile_ID->setDbValue($rs->fields('facultyprofile_ID'));
		$tbl_profile->faculty_ID->setDbValue($rs->fields('faculty_ID'));
		$tbl_profile->faculty_name->setDbValue($rs->fields('faculty_name'));
		$tbl_profile->collectionPeriod_ID->setDbValue($rs->fields('collectionPeriod_ID'));
		$tbl_profile->cu->setDbValue($rs->fields('cu'));
		$tbl_profile->collectionPeriod_ay->setDbValue($rs->fields('collectionPeriod_ay'));
		$tbl_profile->collectionPeriod_sem->setDbValue($rs->fields('collectionPeriod_sem'));
		$tbl_profile->collectionPeriod_cutOffDate->setDbValue($rs->fields('collectionPeriod_cutOffDate'));
		$tbl_profile->unitID->setDbValue($rs->fields('unitID'));
		$tbl_profile->facultyprofile_homeUnit_ID->setDbValue($rs->fields('facultyprofile_homeUnit_ID'));
		$tbl_profile->facultyprofile_isHomeUnit->setDbValue($rs->fields('facultyprofile_isHomeUnit'));
		$tbl_profile->facultyGroup_CHEDCode->setDbValue($rs->fields('facultyGroup_CHEDCode'));
		$tbl_profile->facultyRank_ID->setDbValue($rs->fields('facultyRank_ID'));
		$tbl_profile->facultyprofile_sg->setDbValue($rs->fields('facultyprofile_sg'));
		$tbl_profile->facultyprofile_annualSalary->setDbValue($rs->fields('facultyprofile_annualSalary'));
		$tbl_profile->facultyprofile_fte->setDbValue($rs->fields('facultyprofile_fte'));
		$tbl_profile->facultyprofile_tenureCode->setDbValue($rs->fields('facultyprofile_tenureCode'));
		$tbl_profile->facultyprofile_leaveCode->setDbValue($rs->fields('facultyprofile_leaveCode'));
		$tbl_profile->facultyprofile_disCHED_disciplineMajorCode_gen->setDbValue($rs->fields('facultyprofile_disCHED_disciplineMajorCode_gen'));
		$tbl_profile->disCHED_disciplineCode_gen->setDbValue($rs->fields('disCHED_disciplineCode_gen'));
		$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_1_primaryTeachingLoad'));
		$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->setDbValue($rs->fields('facultyprofile_specificDiscipline_2_primaryTeachingLoad'));
		$tbl_profile->facultyprofile_labHrs_basic->setDbValue($rs->fields('facultyprofile_labHrs_basic'));
		$tbl_profile->facultyprofile_lecHrs_basic->setDbValue($rs->fields('facultyprofile_lecHrs_basic'));
		$tbl_profile->facultyprofile_totalHrs_basic->setDbValue($rs->fields('facultyprofile_totalHrs_basic'));
		$tbl_profile->facultyprofile_labSCH_basic->setDbValue($rs->fields('facultyprofile_labSCH_basic'));
		$tbl_profile->facultyprofile_lecSCH_basic->setDbValue($rs->fields('facultyprofile_lecSCH_basic'));
		$tbl_profile->facultyprofile_totalSCH_basic->setDbValue($rs->fields('facultyprofile_totalSCH_basic'));
		$tbl_profile->facultyprofile_labCr_ugrad->setDbValue($rs->fields('facultyprofile_labCr_ugrad'));
		$tbl_profile->facultyprofile_lecCr_ugrad->setDbValue($rs->fields('facultyprofile_lecCr_ugrad'));
		$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_ugrad'));
		$tbl_profile->facultyprofile_totalCr_ugrad->setDbValue($rs->fields('facultyprofile_totalCr_ugrad'));
		$tbl_profile->facultyprofile_labHrs_ugrad->setDbValue($rs->fields('facultyprofile_labHrs_ugrad'));
		$tbl_profile->facultyprofile_lecHrs_ugrad->setDbValue($rs->fields('facultyprofile_lecHrs_ugrad'));
		$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_ugrad'));
		$tbl_profile->facultyprofile_totalHrs_ugrad->setDbValue($rs->fields('facultyprofile_totalHrs_ugrad'));
		$tbl_profile->facultyprofile_labSCH_ugrad->setDbValue($rs->fields('facultyprofile_labSCH_ugrad'));
		$tbl_profile->facultyprofile_lecSCH_ugrad->setDbValue($rs->fields('facultyprofile_lecSCH_ugrad'));
		$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_ugrad'));
		$tbl_profile->facultyprofile_totalSCH_ugrad->setDbValue($rs->fields('facultyprofile_totalSCH_ugrad'));
		$tbl_profile->facultyprofile_labCr_graduate->setDbValue($rs->fields('facultyprofile_labCr_graduate'));
		$tbl_profile->facultyprofile_lecCr_graduate->setDbValue($rs->fields('facultyprofile_lecCr_graduate'));
		$tbl_profile->facultyprofile_mixedLabLecCr_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecCr_graduate'));
		$tbl_profile->facultyprofile_totalCr_graduate->setDbValue($rs->fields('facultyprofile_totalCr_graduate'));
		$tbl_profile->facultyprofile_labHrs_graduate->setDbValue($rs->fields('facultyprofile_labHrs_graduate'));
		$tbl_profile->facultyprofile_lecHrs_graduate->setDbValue($rs->fields('facultyprofile_lecHrs_graduate'));
		$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecHrs_graduate'));
		$tbl_profile->facultyprofile_totalHrs_graduate->setDbValue($rs->fields('facultyprofile_totalHrs_graduate'));
		$tbl_profile->facultyprofile_labSCH_graduate->setDbValue($rs->fields('facultyprofile_labSCH_graduate'));
		$tbl_profile->facultyprofile_lecSCH_graduate->setDbValue($rs->fields('facultyprofile_lecSCH_graduate'));
		$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->setDbValue($rs->fields('facultyprofile_mixedLabLecSCH_graduate'));
		$tbl_profile->facultyprofile_totalSCH_graduate->setDbValue($rs->fields('facultyprofile_totalSCH_graduate'));
		$tbl_profile->facultyprofile_researchLoad->setDbValue($rs->fields('facultyprofile_researchLoad'));
		$tbl_profile->facultyprofile_extensionServicesLoad->setDbValue($rs->fields('facultyprofile_extensionServicesLoad'));
		$tbl_profile->facultyprofile_studyLoad->setDbValue($rs->fields('facultyprofile_studyLoad'));
		$tbl_profile->facultyprofile_forProductionLoad->setDbValue($rs->fields('facultyprofile_forProductionLoad'));
		$tbl_profile->facultyprofile_administrativeLoad->setDbValue($rs->fields('facultyprofile_administrativeLoad'));
		$tbl_profile->facultyprofile_otherLoadCredits->setDbValue($rs->fields('facultyprofile_otherLoadCredits'));
		$tbl_profile->facultyprofile_total_nonTeachingLoad->setDbValue($rs->fields('facultyprofile_total_nonTeachingLoad'));
		$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->setDbValue($rs->fields('facultyprofile_totalWorkloadInCreditUnits_gen'));
		$tbl_profile->facultyprofile_remarks->setDbValue($rs->fields('facultyprofile_remarks'));
		$tbl_profile->collectionPeriod_status->setDbValue($rs->fields('collectionPeriod_status'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $tbl_profile;

		// Initialize URLs
		// Call Row_Rendering event

		$tbl_profile->Row_Rendering();

		// Common render codes for all row types
		// facultyprofile_ID
		// faculty_ID
		// faculty_name
		// collectionPeriod_ID
		// cu
		// collectionPeriod_ay
		// collectionPeriod_sem
		// collectionPeriod_cutOffDate
		// unitID
		// facultyprofile_homeUnit_ID
		// facultyprofile_isHomeUnit
		// facultyGroup_CHEDCode
		// facultyRank_ID
		// facultyprofile_sg
		// facultyprofile_annualSalary
		// facultyprofile_fte
		// facultyprofile_tenureCode
		// facultyprofile_leaveCode
		// facultyprofile_disCHED_disciplineMajorCode_gen
		// disCHED_disciplineCode_gen
		// facultyprofile_specificDiscipline_1_primaryTeachingLoad
		// facultyprofile_specificDiscipline_2_primaryTeachingLoad
		// facultyprofile_labHrs_basic
		// facultyprofile_lecHrs_basic
		// facultyprofile_totalHrs_basic
		// facultyprofile_labSCH_basic
		// facultyprofile_lecSCH_basic
		// facultyprofile_totalSCH_basic
		// facultyprofile_labCr_ugrad
		// facultyprofile_lecCr_ugrad
		// facultyprofile_mixedLabLecCr_ugrad
		// facultyprofile_totalCr_ugrad
		// facultyprofile_labHrs_ugrad
		// facultyprofile_lecHrs_ugrad
		// facultyprofile_mixedLabLecHrs_ugrad
		// facultyprofile_totalHrs_ugrad
		// facultyprofile_labSCH_ugrad
		// facultyprofile_lecSCH_ugrad
		// facultyprofile_mixedLabLecSCH_ugrad
		// facultyprofile_totalSCH_ugrad
		// facultyprofile_labCr_graduate
		// facultyprofile_lecCr_graduate
		// facultyprofile_mixedLabLecCr_graduate
		// facultyprofile_totalCr_graduate
		// facultyprofile_labHrs_graduate
		// facultyprofile_lecHrs_graduate
		// facultyprofile_mixedLabLecHrs_graduate
		// facultyprofile_totalHrs_graduate
		// facultyprofile_labSCH_graduate
		// facultyprofile_lecSCH_graduate
		// facultyprofile_mixedLabLecSCH_graduate
		// facultyprofile_totalSCH_graduate
		// facultyprofile_researchLoad
		// facultyprofile_extensionServicesLoad
		// facultyprofile_studyLoad
		// facultyprofile_forProductionLoad
		// facultyprofile_administrativeLoad
		// facultyprofile_otherLoadCredits
		// facultyprofile_total_nonTeachingLoad
		// facultyprofile_totalWorkloadInCreditUnits_gen
		// facultyprofile_remarks
		// collectionPeriod_status

		if ($tbl_profile->RowType == UP_ROWTYPE_VIEW) { // View row

			// faculty_ID
			$tbl_profile->faculty_ID->ViewValue = $tbl_profile->faculty_ID->CurrentValue;
			if (strval($tbl_profile->faculty_ID->CurrentValue) <> "") {
				$sFilterWrk = "`faculty_ID` = " . up_AdjustSql($tbl_profile->faculty_ID->CurrentValue) . "";
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
					$tbl_profile->faculty_ID->ViewValue = $rswrk->fields('faculty_name');
					$rswrk->Close();
				} else {
					$tbl_profile->faculty_ID->ViewValue = $tbl_profile->faculty_ID->CurrentValue;
				}
			} else {
				$tbl_profile->faculty_ID->ViewValue = NULL;
			}
			$tbl_profile->faculty_ID->ViewCustomAttributes = "";

			// faculty_name
			$tbl_profile->faculty_name->ViewValue = $tbl_profile->faculty_name->CurrentValue;
			$tbl_profile->faculty_name->ViewCustomAttributes = "";

			// facultyprofile_isHomeUnit
			if (strval($tbl_profile->facultyprofile_isHomeUnit->CurrentValue) <> "") {
				switch ($tbl_profile->facultyprofile_isHomeUnit->CurrentValue) {
					case "Y":
						$tbl_profile->facultyprofile_isHomeUnit->ViewValue = $tbl_profile->facultyprofile_isHomeUnit->FldTagCaption(1) <> "" ? $tbl_profile->facultyprofile_isHomeUnit->FldTagCaption(1) : $tbl_profile->facultyprofile_isHomeUnit->CurrentValue;
						break;
					case "N":
						$tbl_profile->facultyprofile_isHomeUnit->ViewValue = $tbl_profile->facultyprofile_isHomeUnit->FldTagCaption(2) <> "" ? $tbl_profile->facultyprofile_isHomeUnit->FldTagCaption(2) : $tbl_profile->facultyprofile_isHomeUnit->CurrentValue;
						break;
					default:
						$tbl_profile->facultyprofile_isHomeUnit->ViewValue = $tbl_profile->facultyprofile_isHomeUnit->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_isHomeUnit->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_isHomeUnit->ViewCustomAttributes = "";

			// facultyGroup_CHEDCode
			if (strval($tbl_profile->facultyGroup_CHEDCode->CurrentValue) <> "") {
				$sFilterWrk = "`facultyGroup_CHEDCode` = '" . up_AdjustSql($tbl_profile->facultyGroup_CHEDCode->CurrentValue) . "'";
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
					$tbl_profile->facultyGroup_CHEDCode->ViewValue = $rswrk->fields('facultyGroup_description');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyGroup_CHEDCode->ViewValue = $tbl_profile->facultyGroup_CHEDCode->CurrentValue;
				}
			} else {
				$tbl_profile->facultyGroup_CHEDCode->ViewValue = NULL;
			}
			$tbl_profile->facultyGroup_CHEDCode->ViewCustomAttributes = "";

			// facultyRank_ID
			if (strval($tbl_profile->facultyRank_ID->CurrentValue) <> "") {
				$sFilterWrk = "`facultyRank_ID` = " . up_AdjustSql($tbl_profile->facultyRank_ID->CurrentValue) . "";
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
					$tbl_profile->facultyRank_ID->ViewValue = $rswrk->fields('facultyRank_UPRank');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyRank_ID->ViewValue = $tbl_profile->facultyRank_ID->CurrentValue;
				}
			} else {
				$tbl_profile->facultyRank_ID->ViewValue = NULL;
			}
			$tbl_profile->facultyRank_ID->ViewCustomAttributes = "";

			// facultyprofile_sg
			$tbl_profile->facultyprofile_sg->ViewValue = $tbl_profile->facultyprofile_sg->CurrentValue;
			$tbl_profile->facultyprofile_sg->ViewCustomAttributes = "";

			// facultyprofile_annualSalary
			$tbl_profile->facultyprofile_annualSalary->ViewValue = $tbl_profile->facultyprofile_annualSalary->CurrentValue;
			$tbl_profile->facultyprofile_annualSalary->ViewCustomAttributes = "";

			// facultyprofile_tenureCode
			if (strval($tbl_profile->facultyprofile_tenureCode->CurrentValue) <> "") {
				$sFilterWrk = "`tenureCode_ID` = " . up_AdjustSql($tbl_profile->facultyprofile_tenureCode->CurrentValue) . "";
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
					$tbl_profile->facultyprofile_tenureCode->ViewValue = $rswrk->fields('tenureCode_description');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_tenureCode->ViewValue = $tbl_profile->facultyprofile_tenureCode->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_tenureCode->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_tenureCode->ViewCustomAttributes = "";

			// facultyprofile_leaveCode
			if (strval($tbl_profile->facultyprofile_leaveCode->CurrentValue) <> "") {
				$sFilterWrk = "`leaveCode_ID` = " . up_AdjustSql($tbl_profile->facultyprofile_leaveCode->CurrentValue) . "";
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
					$tbl_profile->facultyprofile_leaveCode->ViewValue = $rswrk->fields('leaveCode_description');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_leaveCode->ViewValue = $tbl_profile->facultyprofile_leaveCode->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_leaveCode->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_leaveCode->ViewCustomAttributes = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			if (strval($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) <> "") {
				$sFilterWrk = "`disCHED_disciplineSpecific_code` = " . up_AdjustSql($tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue) . "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_nameList` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = $rswrk->fields('disCHED_disciplineSpecific_nameList');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_specificDiscipline_2_primaryTeachingLoad
			if (strval($tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue) <> "") {
				$sFilterWrk = "`disCHED_disciplineSpecific_code` = " . up_AdjustSql($tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue) . "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_nameList` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = $rswrk->fields('disCHED_disciplineSpecific_nameList');
					$rswrk->Close();
				} else {
					$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = $tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue;
				}
			} else {
				$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewValue = NULL;
			}
			$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_labHrs_basic
			$tbl_profile->facultyprofile_labHrs_basic->ViewValue = $tbl_profile->facultyprofile_labHrs_basic->CurrentValue;
			$tbl_profile->facultyprofile_labHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_basic
			$tbl_profile->facultyprofile_lecHrs_basic->ViewValue = $tbl_profile->facultyprofile_lecHrs_basic->CurrentValue;
			$tbl_profile->facultyprofile_lecHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_basic
			$tbl_profile->facultyprofile_totalHrs_basic->ViewValue = $tbl_profile->facultyprofile_totalHrs_basic->CurrentValue;
			$tbl_profile->facultyprofile_totalHrs_basic->ViewCustomAttributes = "";

			// facultyprofile_labSCH_basic
			$tbl_profile->facultyprofile_labSCH_basic->ViewValue = $tbl_profile->facultyprofile_labSCH_basic->CurrentValue;
			$tbl_profile->facultyprofile_labSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_basic
			$tbl_profile->facultyprofile_lecSCH_basic->ViewValue = $tbl_profile->facultyprofile_lecSCH_basic->CurrentValue;
			$tbl_profile->facultyprofile_lecSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_basic
			$tbl_profile->facultyprofile_totalSCH_basic->ViewValue = $tbl_profile->facultyprofile_totalSCH_basic->CurrentValue;
			$tbl_profile->facultyprofile_totalSCH_basic->ViewCustomAttributes = "";

			// facultyprofile_labCr_ugrad
			$tbl_profile->facultyprofile_labCr_ugrad->ViewValue = $tbl_profile->facultyprofile_labCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_labCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecCr_ugrad
			$tbl_profile->facultyprofile_lecCr_ugrad->ViewValue = $tbl_profile->facultyprofile_lecCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_lecCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecCr_ugrad
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->ViewValue = $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalCr_ugrad
			$tbl_profile->facultyprofile_totalCr_ugrad->ViewValue = $tbl_profile->facultyprofile_totalCr_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_totalCr_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labHrs_ugrad
			$tbl_profile->facultyprofile_labHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_labHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_labHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_ugrad
			$tbl_profile->facultyprofile_lecHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_lecHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_lecHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecHrs_ugrad
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_ugrad
			$tbl_profile->facultyprofile_totalHrs_ugrad->ViewValue = $tbl_profile->facultyprofile_totalHrs_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_totalHrs_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labSCH_ugrad
			$tbl_profile->facultyprofile_labSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_labSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_labSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_ugrad
			$tbl_profile->facultyprofile_lecSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_lecSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_lecSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecSCH_ugrad
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_ugrad
			$tbl_profile->facultyprofile_totalSCH_ugrad->ViewValue = $tbl_profile->facultyprofile_totalSCH_ugrad->CurrentValue;
			$tbl_profile->facultyprofile_totalSCH_ugrad->ViewCustomAttributes = "";

			// facultyprofile_labCr_graduate
			$tbl_profile->facultyprofile_labCr_graduate->ViewValue = $tbl_profile->facultyprofile_labCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_labCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecCr_graduate
			$tbl_profile->facultyprofile_lecCr_graduate->ViewValue = $tbl_profile->facultyprofile_lecCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_lecCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecCr_graduate
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->ViewValue = $tbl_profile->facultyprofile_mixedLabLecCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalCr_graduate
			$tbl_profile->facultyprofile_totalCr_graduate->ViewValue = $tbl_profile->facultyprofile_totalCr_graduate->CurrentValue;
			$tbl_profile->facultyprofile_totalCr_graduate->ViewCustomAttributes = "";

			// facultyprofile_labHrs_graduate
			$tbl_profile->facultyprofile_labHrs_graduate->ViewValue = $tbl_profile->facultyprofile_labHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_labHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecHrs_graduate
			$tbl_profile->facultyprofile_lecHrs_graduate->ViewValue = $tbl_profile->facultyprofile_lecHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_lecHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecHrs_graduate
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->ViewValue = $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalHrs_graduate
			$tbl_profile->facultyprofile_totalHrs_graduate->ViewValue = $tbl_profile->facultyprofile_totalHrs_graduate->CurrentValue;
			$tbl_profile->facultyprofile_totalHrs_graduate->ViewCustomAttributes = "";

			// facultyprofile_labSCH_graduate
			$tbl_profile->facultyprofile_labSCH_graduate->ViewValue = $tbl_profile->facultyprofile_labSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_labSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_lecSCH_graduate
			$tbl_profile->facultyprofile_lecSCH_graduate->ViewValue = $tbl_profile->facultyprofile_lecSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_lecSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_mixedLabLecSCH_graduate
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->ViewValue = $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_totalSCH_graduate
			$tbl_profile->facultyprofile_totalSCH_graduate->ViewValue = $tbl_profile->facultyprofile_totalSCH_graduate->CurrentValue;
			$tbl_profile->facultyprofile_totalSCH_graduate->ViewCustomAttributes = "";

			// facultyprofile_researchLoad
			$tbl_profile->facultyprofile_researchLoad->ViewValue = $tbl_profile->facultyprofile_researchLoad->CurrentValue;
			$tbl_profile->facultyprofile_researchLoad->ViewCustomAttributes = "";

			// facultyprofile_extensionServicesLoad
			$tbl_profile->facultyprofile_extensionServicesLoad->ViewValue = $tbl_profile->facultyprofile_extensionServicesLoad->CurrentValue;
			$tbl_profile->facultyprofile_extensionServicesLoad->ViewCustomAttributes = "";

			// facultyprofile_studyLoad
			$tbl_profile->facultyprofile_studyLoad->ViewValue = $tbl_profile->facultyprofile_studyLoad->CurrentValue;
			$tbl_profile->facultyprofile_studyLoad->ViewCustomAttributes = "";

			// facultyprofile_forProductionLoad
			$tbl_profile->facultyprofile_forProductionLoad->ViewValue = $tbl_profile->facultyprofile_forProductionLoad->CurrentValue;
			$tbl_profile->facultyprofile_forProductionLoad->ViewCustomAttributes = "";

			// facultyprofile_administrativeLoad
			$tbl_profile->facultyprofile_administrativeLoad->ViewValue = $tbl_profile->facultyprofile_administrativeLoad->CurrentValue;
			$tbl_profile->facultyprofile_administrativeLoad->ViewCustomAttributes = "";

			// facultyprofile_otherLoadCredits
			$tbl_profile->facultyprofile_otherLoadCredits->ViewValue = $tbl_profile->facultyprofile_otherLoadCredits->CurrentValue;
			$tbl_profile->facultyprofile_otherLoadCredits->ViewCustomAttributes = "";

			// facultyprofile_total_nonTeachingLoad
			$tbl_profile->facultyprofile_total_nonTeachingLoad->ViewValue = $tbl_profile->facultyprofile_total_nonTeachingLoad->CurrentValue;
			$tbl_profile->facultyprofile_total_nonTeachingLoad->ViewCustomAttributes = "";

			// facultyprofile_totalWorkloadInCreditUnits_gen
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewValue = $tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->CurrentValue;
			$tbl_profile->facultyprofile_totalWorkloadInCreditUnits_gen->ViewCustomAttributes = "";

			// facultyprofile_remarks
			$tbl_profile->facultyprofile_remarks->ViewValue = $tbl_profile->facultyprofile_remarks->CurrentValue;
			$tbl_profile->facultyprofile_remarks->ViewCustomAttributes = "";

			// faculty_ID
			$tbl_profile->faculty_ID->LinkCustomAttributes = "";
			$tbl_profile->faculty_ID->HrefValue = "";
			$tbl_profile->faculty_ID->TooltipValue = "";

			// facultyprofile_isHomeUnit
			$tbl_profile->facultyprofile_isHomeUnit->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_isHomeUnit->HrefValue = "";
			$tbl_profile->facultyprofile_isHomeUnit->TooltipValue = "";

			// facultyGroup_CHEDCode
			$tbl_profile->facultyGroup_CHEDCode->LinkCustomAttributes = "";
			$tbl_profile->facultyGroup_CHEDCode->HrefValue = "";
			$tbl_profile->facultyGroup_CHEDCode->TooltipValue = "";

			// facultyRank_ID
			$tbl_profile->facultyRank_ID->LinkCustomAttributes = "";
			$tbl_profile->facultyRank_ID->HrefValue = "";
			$tbl_profile->facultyRank_ID->TooltipValue = "";

			// facultyprofile_tenureCode
			$tbl_profile->facultyprofile_tenureCode->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_tenureCode->HrefValue = "";
			$tbl_profile->facultyprofile_tenureCode->TooltipValue = "";

			// facultyprofile_leaveCode
			$tbl_profile->facultyprofile_leaveCode->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_leaveCode->HrefValue = "";
			$tbl_profile->facultyprofile_leaveCode->TooltipValue = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->HrefValue = "";
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->TooltipValue = "";

			// facultyprofile_specificDiscipline_2_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->HrefValue = "";
			$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->TooltipValue = "";

			// facultyprofile_labHrs_basic
			$tbl_profile->facultyprofile_labHrs_basic->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_labHrs_basic->HrefValue = "";
			$tbl_profile->facultyprofile_labHrs_basic->TooltipValue = "";

			// facultyprofile_lecHrs_basic
			$tbl_profile->facultyprofile_lecHrs_basic->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_lecHrs_basic->HrefValue = "";
			$tbl_profile->facultyprofile_lecHrs_basic->TooltipValue = "";

			// facultyprofile_labSCH_basic
			$tbl_profile->facultyprofile_labSCH_basic->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_labSCH_basic->HrefValue = "";
			$tbl_profile->facultyprofile_labSCH_basic->TooltipValue = "";

			// facultyprofile_lecSCH_basic
			$tbl_profile->facultyprofile_lecSCH_basic->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_lecSCH_basic->HrefValue = "";
			$tbl_profile->facultyprofile_lecSCH_basic->TooltipValue = "";

			// facultyprofile_labCr_ugrad
			$tbl_profile->facultyprofile_labCr_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_labCr_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_labCr_ugrad->TooltipValue = "";

			// facultyprofile_lecCr_ugrad
			$tbl_profile->facultyprofile_lecCr_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_lecCr_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_lecCr_ugrad->TooltipValue = "";

			// facultyprofile_mixedLabLecCr_ugrad
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->TooltipValue = "";

			// facultyprofile_labHrs_ugrad
			$tbl_profile->facultyprofile_labHrs_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_labHrs_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_labHrs_ugrad->TooltipValue = "";

			// facultyprofile_lecHrs_ugrad
			$tbl_profile->facultyprofile_lecHrs_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_lecHrs_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_lecHrs_ugrad->TooltipValue = "";

			// facultyprofile_mixedLabLecHrs_ugrad
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->TooltipValue = "";

			// facultyprofile_labSCH_ugrad
			$tbl_profile->facultyprofile_labSCH_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_labSCH_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_labSCH_ugrad->TooltipValue = "";

			// facultyprofile_lecSCH_ugrad
			$tbl_profile->facultyprofile_lecSCH_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_lecSCH_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_lecSCH_ugrad->TooltipValue = "";

			// facultyprofile_mixedLabLecSCH_ugrad
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->HrefValue = "";
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->TooltipValue = "";

			// facultyprofile_labCr_graduate
			$tbl_profile->facultyprofile_labCr_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_labCr_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_labCr_graduate->TooltipValue = "";

			// facultyprofile_lecCr_graduate
			$tbl_profile->facultyprofile_lecCr_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_lecCr_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_lecCr_graduate->TooltipValue = "";

			// facultyprofile_mixedLabLecCr_graduate
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->TooltipValue = "";

			// facultyprofile_labHrs_graduate
			$tbl_profile->facultyprofile_labHrs_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_labHrs_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_labHrs_graduate->TooltipValue = "";

			// facultyprofile_lecHrs_graduate
			$tbl_profile->facultyprofile_lecHrs_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_lecHrs_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_lecHrs_graduate->TooltipValue = "";

			// facultyprofile_mixedLabLecHrs_graduate
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->TooltipValue = "";

			// facultyprofile_labSCH_graduate
			$tbl_profile->facultyprofile_labSCH_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_labSCH_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_labSCH_graduate->TooltipValue = "";

			// facultyprofile_lecSCH_graduate
			$tbl_profile->facultyprofile_lecSCH_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_lecSCH_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_lecSCH_graduate->TooltipValue = "";

			// facultyprofile_mixedLabLecSCH_graduate
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->HrefValue = "";
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->TooltipValue = "";

			// facultyprofile_researchLoad
			$tbl_profile->facultyprofile_researchLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_researchLoad->HrefValue = "";
			$tbl_profile->facultyprofile_researchLoad->TooltipValue = "";

			// facultyprofile_extensionServicesLoad
			$tbl_profile->facultyprofile_extensionServicesLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_extensionServicesLoad->HrefValue = "";
			$tbl_profile->facultyprofile_extensionServicesLoad->TooltipValue = "";

			// facultyprofile_studyLoad
			$tbl_profile->facultyprofile_studyLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_studyLoad->HrefValue = "";
			$tbl_profile->facultyprofile_studyLoad->TooltipValue = "";

			// facultyprofile_forProductionLoad
			$tbl_profile->facultyprofile_forProductionLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_forProductionLoad->HrefValue = "";
			$tbl_profile->facultyprofile_forProductionLoad->TooltipValue = "";

			// facultyprofile_administrativeLoad
			$tbl_profile->facultyprofile_administrativeLoad->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_administrativeLoad->HrefValue = "";
			$tbl_profile->facultyprofile_administrativeLoad->TooltipValue = "";

			// facultyprofile_otherLoadCredits
			$tbl_profile->facultyprofile_otherLoadCredits->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_otherLoadCredits->HrefValue = "";
			$tbl_profile->facultyprofile_otherLoadCredits->TooltipValue = "";

			// facultyprofile_remarks
			$tbl_profile->facultyprofile_remarks->LinkCustomAttributes = "";
			$tbl_profile->facultyprofile_remarks->HrefValue = "";
			$tbl_profile->facultyprofile_remarks->TooltipValue = "";
		} elseif ($tbl_profile->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// faculty_ID
			$tbl_profile->faculty_ID->EditCustomAttributes = "";
			$tbl_profile->faculty_ID->EditValue = $tbl_profile->faculty_ID->CurrentValue;
			if (strval($tbl_profile->faculty_ID->CurrentValue) <> "") {
				$sFilterWrk = "`faculty_ID` = " . up_AdjustSql($tbl_profile->faculty_ID->CurrentValue) . "";
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
					$tbl_profile->faculty_ID->EditValue = $rswrk->fields('faculty_name');
					$rswrk->Close();
				} else {
					$tbl_profile->faculty_ID->EditValue = $tbl_profile->faculty_ID->CurrentValue;
				}
			} else {
				$tbl_profile->faculty_ID->EditValue = NULL;
			}
			$tbl_profile->faculty_ID->ViewCustomAttributes = "";

			// facultyprofile_isHomeUnit
			$tbl_profile->facultyprofile_isHomeUnit->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Y", $tbl_profile->facultyprofile_isHomeUnit->FldTagCaption(1) <> "" ? $tbl_profile->facultyprofile_isHomeUnit->FldTagCaption(1) : "Y");
			$arwrk[] = array("N", $tbl_profile->facultyprofile_isHomeUnit->FldTagCaption(2) <> "" ? $tbl_profile->facultyprofile_isHomeUnit->FldTagCaption(2) : "N");
			$tbl_profile->facultyprofile_isHomeUnit->EditValue = $arwrk;

			// facultyGroup_CHEDCode
			$tbl_profile->facultyGroup_CHEDCode->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `facultyGroup_CHEDCode`, `facultyGroup_description` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `ref_facultygroup`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `facultyGroup_description` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_profile->facultyGroup_CHEDCode->EditValue = $arwrk;

			// facultyRank_ID
			$tbl_profile->facultyRank_ID->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `facultyRank_ID`, `facultyRank_UPRank` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `ref_facultyrank`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `facultyRank_UPRank` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_profile->facultyRank_ID->EditValue = $arwrk;

			// facultyprofile_tenureCode
			$tbl_profile->facultyprofile_tenureCode->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `tenureCode_ID`, `tenureCode_description` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `ref_tenurecode`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `tenureCode_description` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_profile->facultyprofile_tenureCode->EditValue = $arwrk;

			// facultyprofile_leaveCode
			$tbl_profile->facultyprofile_leaveCode->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `leaveCode_ID`, `leaveCode_description` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `ref_leavecode`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `leaveCode_description` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_profile->facultyprofile_leaveCode->EditValue = $arwrk;

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_code`, `disCHED_disciplineSpecific_nameList` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->EditValue = $arwrk;

			// facultyprofile_specificDiscipline_2_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->EditCustomAttributes = "";
				$sFilterWrk = "";
			$sSqlWrk = "SELECT `disCHED_disciplineSpecific_code`, `disCHED_disciplineSpecific_nameList` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld`, '' AS `SelectFilterFld` FROM `ref_disciplinechedcodes_minor`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
				$sWhereWrk .= "(" . $sFilterWrk . ")";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$sSqlWrk .= " ORDER BY `disCHED_disciplineSpecific_nameList` Asc";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->EditValue = $arwrk;

			// facultyprofile_labHrs_basic
			$tbl_profile->facultyprofile_labHrs_basic->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_labHrs_basic->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_labHrs_basic->CurrentValue);

			// facultyprofile_lecHrs_basic
			$tbl_profile->facultyprofile_lecHrs_basic->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_lecHrs_basic->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_lecHrs_basic->CurrentValue);

			// facultyprofile_labSCH_basic
			$tbl_profile->facultyprofile_labSCH_basic->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_labSCH_basic->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_labSCH_basic->CurrentValue);

			// facultyprofile_lecSCH_basic
			$tbl_profile->facultyprofile_lecSCH_basic->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_lecSCH_basic->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_lecSCH_basic->CurrentValue);

			// facultyprofile_labCr_ugrad
			$tbl_profile->facultyprofile_labCr_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_labCr_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_labCr_ugrad->CurrentValue);

			// facultyprofile_lecCr_ugrad
			$tbl_profile->facultyprofile_lecCr_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_lecCr_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_lecCr_ugrad->CurrentValue);

			// facultyprofile_mixedLabLecCr_ugrad
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_mixedLabLecCr_ugrad->CurrentValue);

			// facultyprofile_labHrs_ugrad
			$tbl_profile->facultyprofile_labHrs_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_labHrs_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_labHrs_ugrad->CurrentValue);

			// facultyprofile_lecHrs_ugrad
			$tbl_profile->facultyprofile_lecHrs_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_lecHrs_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_lecHrs_ugrad->CurrentValue);

			// facultyprofile_mixedLabLecHrs_ugrad
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->CurrentValue);

			// facultyprofile_labSCH_ugrad
			$tbl_profile->facultyprofile_labSCH_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_labSCH_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_labSCH_ugrad->CurrentValue);

			// facultyprofile_lecSCH_ugrad
			$tbl_profile->facultyprofile_lecSCH_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_lecSCH_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_lecSCH_ugrad->CurrentValue);

			// facultyprofile_mixedLabLecSCH_ugrad
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->CurrentValue);

			// facultyprofile_labCr_graduate
			$tbl_profile->facultyprofile_labCr_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_labCr_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_labCr_graduate->CurrentValue);

			// facultyprofile_lecCr_graduate
			$tbl_profile->facultyprofile_lecCr_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_lecCr_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_lecCr_graduate->CurrentValue);

			// facultyprofile_mixedLabLecCr_graduate
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_mixedLabLecCr_graduate->CurrentValue);

			// facultyprofile_labHrs_graduate
			$tbl_profile->facultyprofile_labHrs_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_labHrs_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_labHrs_graduate->CurrentValue);

			// facultyprofile_lecHrs_graduate
			$tbl_profile->facultyprofile_lecHrs_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_lecHrs_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_lecHrs_graduate->CurrentValue);

			// facultyprofile_mixedLabLecHrs_graduate
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_mixedLabLecHrs_graduate->CurrentValue);

			// facultyprofile_labSCH_graduate
			$tbl_profile->facultyprofile_labSCH_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_labSCH_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_labSCH_graduate->CurrentValue);

			// facultyprofile_lecSCH_graduate
			$tbl_profile->facultyprofile_lecSCH_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_lecSCH_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_lecSCH_graduate->CurrentValue);

			// facultyprofile_mixedLabLecSCH_graduate
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_mixedLabLecSCH_graduate->CurrentValue);

			// facultyprofile_researchLoad
			$tbl_profile->facultyprofile_researchLoad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_researchLoad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_researchLoad->CurrentValue);

			// facultyprofile_extensionServicesLoad
			$tbl_profile->facultyprofile_extensionServicesLoad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_extensionServicesLoad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_extensionServicesLoad->CurrentValue);

			// facultyprofile_studyLoad
			$tbl_profile->facultyprofile_studyLoad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_studyLoad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_studyLoad->CurrentValue);

			// facultyprofile_forProductionLoad
			$tbl_profile->facultyprofile_forProductionLoad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_forProductionLoad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_forProductionLoad->CurrentValue);

			// facultyprofile_administrativeLoad
			$tbl_profile->facultyprofile_administrativeLoad->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_administrativeLoad->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_administrativeLoad->CurrentValue);

			// facultyprofile_otherLoadCredits
			$tbl_profile->facultyprofile_otherLoadCredits->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_otherLoadCredits->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_otherLoadCredits->CurrentValue);

			// facultyprofile_remarks
			$tbl_profile->facultyprofile_remarks->EditCustomAttributes = "";
			$tbl_profile->facultyprofile_remarks->EditValue = up_HtmlEncode($tbl_profile->facultyprofile_remarks->CurrentValue);

			// Edit refer script
			// faculty_ID

			$tbl_profile->faculty_ID->HrefValue = "";

			// facultyprofile_isHomeUnit
			$tbl_profile->facultyprofile_isHomeUnit->HrefValue = "";

			// facultyGroup_CHEDCode
			$tbl_profile->facultyGroup_CHEDCode->HrefValue = "";

			// facultyRank_ID
			$tbl_profile->facultyRank_ID->HrefValue = "";

			// facultyprofile_tenureCode
			$tbl_profile->facultyprofile_tenureCode->HrefValue = "";

			// facultyprofile_leaveCode
			$tbl_profile->facultyprofile_leaveCode->HrefValue = "";

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->HrefValue = "";

			// facultyprofile_specificDiscipline_2_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->HrefValue = "";

			// facultyprofile_labHrs_basic
			$tbl_profile->facultyprofile_labHrs_basic->HrefValue = "";

			// facultyprofile_lecHrs_basic
			$tbl_profile->facultyprofile_lecHrs_basic->HrefValue = "";

			// facultyprofile_labSCH_basic
			$tbl_profile->facultyprofile_labSCH_basic->HrefValue = "";

			// facultyprofile_lecSCH_basic
			$tbl_profile->facultyprofile_lecSCH_basic->HrefValue = "";

			// facultyprofile_labCr_ugrad
			$tbl_profile->facultyprofile_labCr_ugrad->HrefValue = "";

			// facultyprofile_lecCr_ugrad
			$tbl_profile->facultyprofile_lecCr_ugrad->HrefValue = "";

			// facultyprofile_mixedLabLecCr_ugrad
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->HrefValue = "";

			// facultyprofile_labHrs_ugrad
			$tbl_profile->facultyprofile_labHrs_ugrad->HrefValue = "";

			// facultyprofile_lecHrs_ugrad
			$tbl_profile->facultyprofile_lecHrs_ugrad->HrefValue = "";

			// facultyprofile_mixedLabLecHrs_ugrad
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->HrefValue = "";

			// facultyprofile_labSCH_ugrad
			$tbl_profile->facultyprofile_labSCH_ugrad->HrefValue = "";

			// facultyprofile_lecSCH_ugrad
			$tbl_profile->facultyprofile_lecSCH_ugrad->HrefValue = "";

			// facultyprofile_mixedLabLecSCH_ugrad
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->HrefValue = "";

			// facultyprofile_labCr_graduate
			$tbl_profile->facultyprofile_labCr_graduate->HrefValue = "";

			// facultyprofile_lecCr_graduate
			$tbl_profile->facultyprofile_lecCr_graduate->HrefValue = "";

			// facultyprofile_mixedLabLecCr_graduate
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->HrefValue = "";

			// facultyprofile_labHrs_graduate
			$tbl_profile->facultyprofile_labHrs_graduate->HrefValue = "";

			// facultyprofile_lecHrs_graduate
			$tbl_profile->facultyprofile_lecHrs_graduate->HrefValue = "";

			// facultyprofile_mixedLabLecHrs_graduate
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->HrefValue = "";

			// facultyprofile_labSCH_graduate
			$tbl_profile->facultyprofile_labSCH_graduate->HrefValue = "";

			// facultyprofile_lecSCH_graduate
			$tbl_profile->facultyprofile_lecSCH_graduate->HrefValue = "";

			// facultyprofile_mixedLabLecSCH_graduate
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->HrefValue = "";

			// facultyprofile_researchLoad
			$tbl_profile->facultyprofile_researchLoad->HrefValue = "";

			// facultyprofile_extensionServicesLoad
			$tbl_profile->facultyprofile_extensionServicesLoad->HrefValue = "";

			// facultyprofile_studyLoad
			$tbl_profile->facultyprofile_studyLoad->HrefValue = "";

			// facultyprofile_forProductionLoad
			$tbl_profile->facultyprofile_forProductionLoad->HrefValue = "";

			// facultyprofile_administrativeLoad
			$tbl_profile->facultyprofile_administrativeLoad->HrefValue = "";

			// facultyprofile_otherLoadCredits
			$tbl_profile->facultyprofile_otherLoadCredits->HrefValue = "";

			// facultyprofile_remarks
			$tbl_profile->facultyprofile_remarks->HrefValue = "";
		}
		if ($tbl_profile->RowType == UP_ROWTYPE_ADD ||
			$tbl_profile->RowType == UP_ROWTYPE_EDIT ||
			$tbl_profile->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$tbl_profile->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($tbl_profile->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$tbl_profile->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $tbl_profile;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckNumber($tbl_profile->facultyprofile_labHrs_basic->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_labHrs_basic->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_lecHrs_basic->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_lecHrs_basic->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_labSCH_basic->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_labSCH_basic->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_lecSCH_basic->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_lecSCH_basic->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_labCr_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_labCr_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_lecCr_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_lecCr_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_mixedLabLecCr_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_labHrs_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_labHrs_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_lecHrs_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_lecHrs_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_labSCH_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_labSCH_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_lecSCH_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_lecSCH_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_labCr_graduate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_labCr_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_lecCr_graduate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_lecCr_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_mixedLabLecCr_graduate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_mixedLabLecCr_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_labHrs_graduate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_labHrs_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_lecHrs_graduate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_lecHrs_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_mixedLabLecHrs_graduate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_labSCH_graduate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_labSCH_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_lecSCH_graduate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_lecSCH_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_mixedLabLecSCH_graduate->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_researchLoad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_researchLoad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_extensionServicesLoad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_extensionServicesLoad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_studyLoad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_studyLoad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_forProductionLoad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_forProductionLoad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_administrativeLoad->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_administrativeLoad->FldErrMsg());
		}
		if (!up_CheckNumber($tbl_profile->facultyprofile_otherLoadCredits->FormValue)) {
			up_AddMessage($gsFormError, $tbl_profile->facultyprofile_otherLoadCredits->FldErrMsg());
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
		global $conn, $Security, $Language, $tbl_profile;
		$sFilter = $tbl_profile->KeyFilter();
		$tbl_profile->CurrentFilter = $sFilter;
		$sSql = $tbl_profile->SQL();
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

			// facultyprofile_isHomeUnit
			$tbl_profile->facultyprofile_isHomeUnit->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_isHomeUnit->CurrentValue, NULL, $tbl_profile->facultyprofile_isHomeUnit->ReadOnly);

			// facultyGroup_CHEDCode
			$tbl_profile->facultyGroup_CHEDCode->SetDbValueDef($rsnew, $tbl_profile->facultyGroup_CHEDCode->CurrentValue, NULL, $tbl_profile->facultyGroup_CHEDCode->ReadOnly);

			// facultyRank_ID
			$tbl_profile->facultyRank_ID->SetDbValueDef($rsnew, $tbl_profile->facultyRank_ID->CurrentValue, NULL, $tbl_profile->facultyRank_ID->ReadOnly);

			// facultyprofile_tenureCode
			$tbl_profile->facultyprofile_tenureCode->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_tenureCode->CurrentValue, NULL, $tbl_profile->facultyprofile_tenureCode->ReadOnly);

			// facultyprofile_leaveCode
			$tbl_profile->facultyprofile_leaveCode->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_leaveCode->CurrentValue, NULL, $tbl_profile->facultyprofile_leaveCode->ReadOnly);

			// facultyprofile_specificDiscipline_1_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->CurrentValue, NULL, $tbl_profile->facultyprofile_specificDiscipline_1_primaryTeachingLoad->ReadOnly);

			// facultyprofile_specificDiscipline_2_primaryTeachingLoad
			$tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->CurrentValue, NULL, $tbl_profile->facultyprofile_specificDiscipline_2_primaryTeachingLoad->ReadOnly);

			// facultyprofile_labHrs_basic
			$tbl_profile->facultyprofile_labHrs_basic->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_labHrs_basic->CurrentValue, NULL, $tbl_profile->facultyprofile_labHrs_basic->ReadOnly);

			// facultyprofile_lecHrs_basic
			$tbl_profile->facultyprofile_lecHrs_basic->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_lecHrs_basic->CurrentValue, NULL, $tbl_profile->facultyprofile_lecHrs_basic->ReadOnly);

			// facultyprofile_labSCH_basic
			$tbl_profile->facultyprofile_labSCH_basic->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_labSCH_basic->CurrentValue, NULL, $tbl_profile->facultyprofile_labSCH_basic->ReadOnly);

			// facultyprofile_lecSCH_basic
			$tbl_profile->facultyprofile_lecSCH_basic->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_lecSCH_basic->CurrentValue, NULL, $tbl_profile->facultyprofile_lecSCH_basic->ReadOnly);

			// facultyprofile_labCr_ugrad
			$tbl_profile->facultyprofile_labCr_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_labCr_ugrad->CurrentValue, NULL, $tbl_profile->facultyprofile_labCr_ugrad->ReadOnly);

			// facultyprofile_lecCr_ugrad
			$tbl_profile->facultyprofile_lecCr_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_lecCr_ugrad->CurrentValue, NULL, $tbl_profile->facultyprofile_lecCr_ugrad->ReadOnly);

			// facultyprofile_mixedLabLecCr_ugrad
			$tbl_profile->facultyprofile_mixedLabLecCr_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->CurrentValue, NULL, $tbl_profile->facultyprofile_mixedLabLecCr_ugrad->ReadOnly);

			// facultyprofile_labHrs_ugrad
			$tbl_profile->facultyprofile_labHrs_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_labHrs_ugrad->CurrentValue, NULL, $tbl_profile->facultyprofile_labHrs_ugrad->ReadOnly);

			// facultyprofile_lecHrs_ugrad
			$tbl_profile->facultyprofile_lecHrs_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_lecHrs_ugrad->CurrentValue, NULL, $tbl_profile->facultyprofile_lecHrs_ugrad->ReadOnly);

			// facultyprofile_mixedLabLecHrs_ugrad
			$tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->CurrentValue, NULL, $tbl_profile->facultyprofile_mixedLabLecHrs_ugrad->ReadOnly);

			// facultyprofile_labSCH_ugrad
			$tbl_profile->facultyprofile_labSCH_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_labSCH_ugrad->CurrentValue, NULL, $tbl_profile->facultyprofile_labSCH_ugrad->ReadOnly);

			// facultyprofile_lecSCH_ugrad
			$tbl_profile->facultyprofile_lecSCH_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_lecSCH_ugrad->CurrentValue, NULL, $tbl_profile->facultyprofile_lecSCH_ugrad->ReadOnly);

			// facultyprofile_mixedLabLecSCH_ugrad
			$tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->CurrentValue, NULL, $tbl_profile->facultyprofile_mixedLabLecSCH_ugrad->ReadOnly);

			// facultyprofile_labCr_graduate
			$tbl_profile->facultyprofile_labCr_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_labCr_graduate->CurrentValue, NULL, $tbl_profile->facultyprofile_labCr_graduate->ReadOnly);

			// facultyprofile_lecCr_graduate
			$tbl_profile->facultyprofile_lecCr_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_lecCr_graduate->CurrentValue, NULL, $tbl_profile->facultyprofile_lecCr_graduate->ReadOnly);

			// facultyprofile_mixedLabLecCr_graduate
			$tbl_profile->facultyprofile_mixedLabLecCr_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_mixedLabLecCr_graduate->CurrentValue, NULL, $tbl_profile->facultyprofile_mixedLabLecCr_graduate->ReadOnly);

			// facultyprofile_labHrs_graduate
			$tbl_profile->facultyprofile_labHrs_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_labHrs_graduate->CurrentValue, NULL, $tbl_profile->facultyprofile_labHrs_graduate->ReadOnly);

			// facultyprofile_lecHrs_graduate
			$tbl_profile->facultyprofile_lecHrs_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_lecHrs_graduate->CurrentValue, NULL, $tbl_profile->facultyprofile_lecHrs_graduate->ReadOnly);

			// facultyprofile_mixedLabLecHrs_graduate
			$tbl_profile->facultyprofile_mixedLabLecHrs_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->CurrentValue, NULL, $tbl_profile->facultyprofile_mixedLabLecHrs_graduate->ReadOnly);

			// facultyprofile_labSCH_graduate
			$tbl_profile->facultyprofile_labSCH_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_labSCH_graduate->CurrentValue, NULL, $tbl_profile->facultyprofile_labSCH_graduate->ReadOnly);

			// facultyprofile_lecSCH_graduate
			$tbl_profile->facultyprofile_lecSCH_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_lecSCH_graduate->CurrentValue, NULL, $tbl_profile->facultyprofile_lecSCH_graduate->ReadOnly);

			// facultyprofile_mixedLabLecSCH_graduate
			$tbl_profile->facultyprofile_mixedLabLecSCH_graduate->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->CurrentValue, NULL, $tbl_profile->facultyprofile_mixedLabLecSCH_graduate->ReadOnly);

			// facultyprofile_researchLoad
			$tbl_profile->facultyprofile_researchLoad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_researchLoad->CurrentValue, NULL, $tbl_profile->facultyprofile_researchLoad->ReadOnly);

			// facultyprofile_extensionServicesLoad
			$tbl_profile->facultyprofile_extensionServicesLoad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_extensionServicesLoad->CurrentValue, NULL, $tbl_profile->facultyprofile_extensionServicesLoad->ReadOnly);

			// facultyprofile_studyLoad
			$tbl_profile->facultyprofile_studyLoad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_studyLoad->CurrentValue, NULL, $tbl_profile->facultyprofile_studyLoad->ReadOnly);

			// facultyprofile_forProductionLoad
			$tbl_profile->facultyprofile_forProductionLoad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_forProductionLoad->CurrentValue, NULL, $tbl_profile->facultyprofile_forProductionLoad->ReadOnly);

			// facultyprofile_administrativeLoad
			$tbl_profile->facultyprofile_administrativeLoad->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_administrativeLoad->CurrentValue, NULL, $tbl_profile->facultyprofile_administrativeLoad->ReadOnly);

			// facultyprofile_otherLoadCredits
			$tbl_profile->facultyprofile_otherLoadCredits->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_otherLoadCredits->CurrentValue, NULL, $tbl_profile->facultyprofile_otherLoadCredits->ReadOnly);

			// facultyprofile_remarks
			$tbl_profile->facultyprofile_remarks->SetDbValueDef($rsnew, $tbl_profile->facultyprofile_remarks->CurrentValue, NULL, $tbl_profile->facultyprofile_remarks->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $tbl_profile->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($tbl_profile->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_profile->CancelMessage <> "") {
					$this->setFailureMessage($tbl_profile->CancelMessage);
					$tbl_profile->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_profile->Row_Updated($rsold, $rsnew);
		if ($EditRow) {
			$this->WriteAuditTrailOnEdit($rsold, $rsnew);
		}
		$rs->Close();
		return $EditRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $tbl_profile;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "tbl_collectionperiod") {
				$bValidMaster = TRUE;
				if (@$_GET["collectionPeriod_ID"] <> "") {
					$GLOBALS["tbl_collectionperiod"]->collectionPeriod_ID->setQueryStringValue($_GET["collectionPeriod_ID"]);
					$tbl_profile->collectionPeriod_ID->setQueryStringValue($GLOBALS["tbl_collectionperiod"]->collectionPeriod_ID->QueryStringValue);
					$tbl_profile->collectionPeriod_ID->setSessionValue($tbl_profile->collectionPeriod_ID->QueryStringValue);
					if (!is_numeric($GLOBALS["tbl_collectionperiod"]->collectionPeriod_ID->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$tbl_profile->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$tbl_profile->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "tbl_collectionperiod") {
				if ($tbl_profile->collectionPeriod_ID->QueryStringValue == "") $tbl_profile->collectionPeriod_ID->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $tbl_profile->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $tbl_profile->getDetailFilter(); // Get detail filter
	}

	// Write Audit Trail start/end for grid update
	function WriteAuditTrailDummy($typ) {
		$table = 'tbl_profile';
	  $usr = CurrentUserID();
		up_WriteAuditTrail("log", up_StdCurrentDateTime(), up_ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (edit page)
	function WriteAuditTrailOnEdit(&$rsold, &$rsnew) {
		global $tbl_profile;
		$table = 'tbl_profile';

		// Get key value
		$key = "";
		if ($key <> "") $key .= UP_COMPOSITE_KEY_SEPARATOR;
		$key .= $rsold['facultyprofile_ID'];

		// Write Audit Trail
		$dt = up_StdCurrentDateTime();
		$id = up_ScriptName();
	  $usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if ($tbl_profile->fields[$fldname]->FldDataType <> UP_DATATYPE_BLOB) { // Ignore BLOB fields
				if ($tbl_profile->fields[$fldname]->FldDataType == UP_DATATYPE_DATE) { // DateTime field
					$modified = (up_FormatDateTime($rsold[$fldname], 0) <> up_FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !up_CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($tbl_profile->fields[$fldname]->FldDataType == UP_DATATYPE_MEMO) { // Memo field
						if (UP_AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($tbl_profile->fields[$fldname]->FldDataType == UP_DATATYPE_XML) { // XML field
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
