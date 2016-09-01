<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_fp_units_accomplishmentinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_fp_units_accomplishment_edit = new cfrm_fp_units_accomplishment_edit();
$Page =& $frm_fp_units_accomplishment_edit;

// Page init
$frm_fp_units_accomplishment_edit->Page_Init();

// Page main
$frm_fp_units_accomplishment_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_units_accomplishment_edit = new up_Page("frm_fp_units_accomplishment_edit");

// page properties
frm_fp_units_accomplishment_edit.PageID = "edit"; // page ID
frm_fp_units_accomplishment_edit.FormID = "ffrm_fp_units_accomplishmentedit"; // form ID
var UP_PAGE_ID = frm_fp_units_accomplishment_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_fp_units_accomplishment_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_focal_person_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_units_accomplishment->focal_person_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_unit_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_units_accomplishment->unit_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_cu_sequence"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_units_accomplishment->cu_sequence->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_personnel_count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_units_accomplishment->personnel_count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_users_nameLast"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_units_accomplishment->users_nameLast->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_nameFirst"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_units_accomplishment->users_nameFirst->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_userLoginName"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_units_accomplishment->users_userLoginName->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_users_password"];
		if (elm && !up_HasValue(elm))
			return up_OnError(this, elm, upLanguage.Phrase("EnterRequiredField") + " - <?php echo up_JsEncode2($frm_fp_units_accomplishment->users_password->FldCaption()) ?>");
		elm = fobj.elements["x" + infix + "_tbl_cutOffDate_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_units_accomplishment->tbl_cutOffDate_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_cutOffDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_fp_units_accomplishment->t_cutOffDate->FldErrMsg()) ?>");

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
frm_fp_units_accomplishment_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_units_accomplishment_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_units_accomplishment_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_units_accomplishment_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_units_accomplishment->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_fp_units_accomplishment->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_fp_units_accomplishment_edit->ShowPageHeader(); ?>
<?php
$frm_fp_units_accomplishment_edit->ShowMessage();
?>
<form name="ffrm_fp_units_accomplishmentedit" id="ffrm_fp_units_accomplishmentedit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return frm_fp_units_accomplishment_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="frm_fp_units_accomplishment">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_fp_units_accomplishment->units_id->Visible) { // units_id ?>
	<tr id="r_units_id"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->units_id->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->units_id->CellAttributes() ?>><span id="el_units_id">
<div<?php echo $frm_fp_units_accomplishment->units_id->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->units_id->EditValue ?></div>
<input type="hidden" name="x_units_id" id="x_units_id" value="<?php echo up_HtmlEncode($frm_fp_units_accomplishment->units_id->CurrentValue) ?>">
</span><?php echo $frm_fp_units_accomplishment->units_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->focal_person_id->Visible) { // focal_person_id ?>
	<tr id="r_focal_person_id"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->focal_person_id->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->focal_person_id->CellAttributes() ?>><span id="el_focal_person_id">
<?php if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin ?>
<div<?php echo $frm_fp_units_accomplishment->focal_person_id->ViewAttributes() ?>><?php echo $frm_fp_units_accomplishment->focal_person_id->EditValue ?></div>
<input type="hidden" name="x_focal_person_id" id="x_focal_person_id" value="<?php echo up_HtmlEncode($frm_fp_units_accomplishment->focal_person_id->CurrentValue) ?>">
<?php } else { ?>
<input type="text" name="x_focal_person_id" id="x_focal_person_id" size="30" value="<?php echo $frm_fp_units_accomplishment->focal_person_id->EditValue ?>"<?php echo $frm_fp_units_accomplishment->focal_person_id->EditAttributes() ?>>
<?php } ?>
</span><?php echo $frm_fp_units_accomplishment->focal_person_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->unit_id->Visible) { // unit_id ?>
	<tr id="r_unit_id"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->unit_id->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->unit_id->CellAttributes() ?>><span id="el_unit_id">
<input type="text" name="x_unit_id" id="x_unit_id" size="30" value="<?php echo $frm_fp_units_accomplishment->unit_id->EditValue ?>"<?php echo $frm_fp_units_accomplishment->unit_id->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->unit_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->cu_sequence->Visible) { // cu_sequence ?>
	<tr id="r_cu_sequence"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->cu_sequence->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->cu_sequence->CellAttributes() ?>><span id="el_cu_sequence">
<input type="text" name="x_cu_sequence" id="x_cu_sequence" size="30" value="<?php echo $frm_fp_units_accomplishment->cu_sequence->EditValue ?>"<?php echo $frm_fp_units_accomplishment->cu_sequence->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->cu_sequence->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->cu_short_name->Visible) { // cu_short_name ?>
	<tr id="r_cu_short_name"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->cu_short_name->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->cu_short_name->CellAttributes() ?>><span id="el_cu_short_name">
<input type="text" name="x_cu_short_name" id="x_cu_short_name" size="30" maxlength="255" value="<?php echo $frm_fp_units_accomplishment->cu_short_name->EditValue ?>"<?php echo $frm_fp_units_accomplishment->cu_short_name->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->cu_short_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->cu_unit_name->Visible) { // cu_unit_name ?>
	<tr id="r_cu_unit_name"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->cu_unit_name->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->cu_unit_name->CellAttributes() ?>><span id="el_cu_unit_name">
<input type="text" name="x_cu_unit_name" id="x_cu_unit_name" size="30" maxlength="255" value="<?php echo $frm_fp_units_accomplishment->cu_unit_name->EditValue ?>"<?php echo $frm_fp_units_accomplishment->cu_unit_name->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->cu_unit_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->unit_name->Visible) { // unit_name ?>
	<tr id="r_unit_name"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->unit_name->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->unit_name->CellAttributes() ?>><span id="el_unit_name">
<input type="text" name="x_unit_name" id="x_unit_name" size="30" maxlength="255" value="<?php echo $frm_fp_units_accomplishment->unit_name->EditValue ?>"<?php echo $frm_fp_units_accomplishment->unit_name->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->unit_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->unit_name_short->Visible) { // unit_name_short ?>
	<tr id="r_unit_name_short"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->unit_name_short->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->unit_name_short->CellAttributes() ?>><span id="el_unit_name_short">
<input type="text" name="x_unit_name_short" id="x_unit_name_short" size="30" maxlength="255" value="<?php echo $frm_fp_units_accomplishment->unit_name_short->EditValue ?>"<?php echo $frm_fp_units_accomplishment->unit_name_short->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->unit_name_short->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->personnel_count->Visible) { // personnel_count ?>
	<tr id="r_personnel_count"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->personnel_count->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->personnel_count->CellAttributes() ?>><span id="el_personnel_count">
<input type="text" name="x_personnel_count" id="x_personnel_count" size="30" value="<?php echo $frm_fp_units_accomplishment->personnel_count->EditValue ?>"<?php echo $frm_fp_units_accomplishment->personnel_count->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->personnel_count->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->mfo_1->Visible) { // mfo_1 ?>
	<tr id="r_mfo_1"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->mfo_1->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->mfo_1->CellAttributes() ?>><span id="el_mfo_1">
<input type="text" name="x_mfo_1" id="x_mfo_1" size="30" maxlength="1" value="<?php echo $frm_fp_units_accomplishment->mfo_1->EditValue ?>"<?php echo $frm_fp_units_accomplishment->mfo_1->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->mfo_1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->mfo_2->Visible) { // mfo_2 ?>
	<tr id="r_mfo_2"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->mfo_2->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->mfo_2->CellAttributes() ?>><span id="el_mfo_2">
<input type="text" name="x_mfo_2" id="x_mfo_2" size="30" maxlength="1" value="<?php echo $frm_fp_units_accomplishment->mfo_2->EditValue ?>"<?php echo $frm_fp_units_accomplishment->mfo_2->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->mfo_2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->mfo_3->Visible) { // mfo_3 ?>
	<tr id="r_mfo_3"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->mfo_3->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->mfo_3->CellAttributes() ?>><span id="el_mfo_3">
<input type="text" name="x_mfo_3" id="x_mfo_3" size="30" maxlength="1" value="<?php echo $frm_fp_units_accomplishment->mfo_3->EditValue ?>"<?php echo $frm_fp_units_accomplishment->mfo_3->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->mfo_3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->mfo_4->Visible) { // mfo_4 ?>
	<tr id="r_mfo_4"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->mfo_4->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->mfo_4->CellAttributes() ?>><span id="el_mfo_4">
<input type="text" name="x_mfo_4" id="x_mfo_4" size="30" maxlength="1" value="<?php echo $frm_fp_units_accomplishment->mfo_4->EditValue ?>"<?php echo $frm_fp_units_accomplishment->mfo_4->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->mfo_4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->mfo_5->Visible) { // mfo_5 ?>
	<tr id="r_mfo_5"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->mfo_5->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->mfo_5->CellAttributes() ?>><span id="el_mfo_5">
<input type="text" name="x_mfo_5" id="x_mfo_5" size="30" maxlength="1" value="<?php echo $frm_fp_units_accomplishment->mfo_5->EditValue ?>"<?php echo $frm_fp_units_accomplishment->mfo_5->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->mfo_5->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->sto->Visible) { // sto ?>
	<tr id="r_sto"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->sto->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->sto->CellAttributes() ?>><span id="el_sto">
<input type="text" name="x_sto" id="x_sto" size="30" maxlength="1" value="<?php echo $frm_fp_units_accomplishment->sto->EditValue ?>"<?php echo $frm_fp_units_accomplishment->sto->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->sto->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->gass->Visible) { // gass ?>
	<tr id="r_gass"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->gass->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->gass->CellAttributes() ?>><span id="el_gass">
<input type="text" name="x_gass" id="x_gass" size="30" maxlength="1" value="<?php echo $frm_fp_units_accomplishment->gass->EditValue ?>"<?php echo $frm_fp_units_accomplishment->gass->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->gass->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->users_name->Visible) { // users_name ?>
	<tr id="r_users_name"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->users_name->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->users_name->CellAttributes() ?>><span id="el_users_name">
<input type="text" name="x_users_name" id="x_users_name" size="30" maxlength="255" value="<?php echo $frm_fp_units_accomplishment->users_name->EditValue ?>"<?php echo $frm_fp_units_accomplishment->users_name->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->users_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->users_nameLast->Visible) { // users_nameLast ?>
	<tr id="r_users_nameLast"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->users_nameLast->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_fp_units_accomplishment->users_nameLast->CellAttributes() ?>><span id="el_users_nameLast">
<input type="text" name="x_users_nameLast" id="x_users_nameLast" size="30" maxlength="255" value="<?php echo $frm_fp_units_accomplishment->users_nameLast->EditValue ?>"<?php echo $frm_fp_units_accomplishment->users_nameLast->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->users_nameLast->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->users_nameFirst->Visible) { // users_nameFirst ?>
	<tr id="r_users_nameFirst"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->users_nameFirst->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_fp_units_accomplishment->users_nameFirst->CellAttributes() ?>><span id="el_users_nameFirst">
<input type="text" name="x_users_nameFirst" id="x_users_nameFirst" size="30" maxlength="255" value="<?php echo $frm_fp_units_accomplishment->users_nameFirst->EditValue ?>"<?php echo $frm_fp_units_accomplishment->users_nameFirst->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->users_nameFirst->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->users_nameMiddle->Visible) { // users_nameMiddle ?>
	<tr id="r_users_nameMiddle"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->users_nameMiddle->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->users_nameMiddle->CellAttributes() ?>><span id="el_users_nameMiddle">
<input type="text" name="x_users_nameMiddle" id="x_users_nameMiddle" size="30" maxlength="255" value="<?php echo $frm_fp_units_accomplishment->users_nameMiddle->EditValue ?>"<?php echo $frm_fp_units_accomplishment->users_nameMiddle->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->users_nameMiddle->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->users_userLoginName->Visible) { // users_userLoginName ?>
	<tr id="r_users_userLoginName"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->users_userLoginName->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_fp_units_accomplishment->users_userLoginName->CellAttributes() ?>><span id="el_users_userLoginName">
<input type="text" name="x_users_userLoginName" id="x_users_userLoginName" size="30" maxlength="12" value="<?php echo $frm_fp_units_accomplishment->users_userLoginName->EditValue ?>"<?php echo $frm_fp_units_accomplishment->users_userLoginName->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->users_userLoginName->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->users_password->Visible) { // users_password ?>
	<tr id="r_users_password"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->users_password->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></td>
		<td<?php echo $frm_fp_units_accomplishment->users_password->CellAttributes() ?>><span id="el_users_password">
<input type="text" name="x_users_password" id="x_users_password" size="30" maxlength="15" value="<?php echo $frm_fp_units_accomplishment->users_password->EditValue ?>"<?php echo $frm_fp_units_accomplishment->users_password->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->users_password->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->users_email->Visible) { // users_email ?>
	<tr id="r_users_email"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->users_email->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->users_email->CellAttributes() ?>><span id="el_users_email">
<input type="text" name="x_users_email" id="x_users_email" size="30" maxlength="255" value="<?php echo $frm_fp_units_accomplishment->users_email->EditValue ?>"<?php echo $frm_fp_units_accomplishment->users_email->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->users_email->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->users_contactNo->Visible) { // users_contactNo ?>
	<tr id="r_users_contactNo"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->users_contactNo->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->users_contactNo->CellAttributes() ?>><span id="el_users_contactNo">
<input type="text" name="x_users_contactNo" id="x_users_contactNo" size="30" maxlength="255" value="<?php echo $frm_fp_units_accomplishment->users_contactNo->EditValue ?>"<?php echo $frm_fp_units_accomplishment->users_contactNo->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->users_contactNo->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->tbl_cutOffDate_id->Visible) { // tbl_cutOffDate_id ?>
	<tr id="r_tbl_cutOffDate_id"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->tbl_cutOffDate_id->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->tbl_cutOffDate_id->CellAttributes() ?>><span id="el_tbl_cutOffDate_id">
<input type="text" name="x_tbl_cutOffDate_id" id="x_tbl_cutOffDate_id" size="30" value="<?php echo $frm_fp_units_accomplishment->tbl_cutOffDate_id->EditValue ?>"<?php echo $frm_fp_units_accomplishment->tbl_cutOffDate_id->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->tbl_cutOffDate_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->t_cutOffDate->Visible) { // t_cutOffDate ?>
	<tr id="r_t_cutOffDate"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->t_cutOffDate->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->t_cutOffDate->CellAttributes() ?>><span id="el_t_cutOffDate">
<input type="text" name="x_t_cutOffDate" id="x_t_cutOffDate" value="<?php echo $frm_fp_units_accomplishment->t_cutOffDate->EditValue ?>"<?php echo $frm_fp_units_accomplishment->t_cutOffDate->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->t_cutOffDate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_fp_units_accomplishment->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
	<tr id="r_t_cutOffDate_remarks"<?php echo $frm_fp_units_accomplishment->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_fp_units_accomplishment->t_cutOffDate_remarks->FldCaption() ?></td>
		<td<?php echo $frm_fp_units_accomplishment->t_cutOffDate_remarks->CellAttributes() ?>><span id="el_t_cutOffDate_remarks">
<input type="text" name="x_t_cutOffDate_remarks" id="x_t_cutOffDate_remarks" size="30" maxlength="255" value="<?php echo $frm_fp_units_accomplishment->t_cutOffDate_remarks->EditValue ?>"<?php echo $frm_fp_units_accomplishment->t_cutOffDate_remarks->EditAttributes() ?>>
</span><?php echo $frm_fp_units_accomplishment->t_cutOffDate_remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$frm_fp_units_accomplishment_edit->ShowPageFooter();
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
$frm_fp_units_accomplishment_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_units_accomplishment_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'frm_fp_units_accomplishment';

	// Page object name
	var $PageObjName = 'frm_fp_units_accomplishment_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_units_accomplishment;
		if ($frm_fp_units_accomplishment->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_units_accomplishment->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_units_accomplishment;
		if ($frm_fp_units_accomplishment->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_units_accomplishment->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_units_accomplishment->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_units_accomplishment_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_units_accomplishment)
		if (!isset($GLOBALS["frm_fp_units_accomplishment"])) {
			$GLOBALS["frm_fp_units_accomplishment"] = new cfrm_fp_units_accomplishment();
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_units_accomplishment"];
		}

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_units_accomplishment', TRUE);

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
		global $frm_fp_units_accomplishment;

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
			$this->Page_Terminate("frm_fp_units_accomplishmentlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			$_SESSION[UP_SESSION_FAILURE_MESSAGE] = $Language->Phrase("NoPermission");
			$this->Page_Terminate("frm_fp_units_accomplishmentlist.php");
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
		global $objForm, $Language, $gsFormError, $frm_fp_units_accomplishment;

		// Load key from QueryString
		if (@$_GET["units_id"] <> "")
			$frm_fp_units_accomplishment->units_id->setQueryStringValue($_GET["units_id"]);
		if (@$_POST["a_edit"] <> "") {
			$frm_fp_units_accomplishment->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$frm_fp_units_accomplishment->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$frm_fp_units_accomplishment->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$frm_fp_units_accomplishment->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($frm_fp_units_accomplishment->units_id->CurrentValue == "")
			$this->Page_Terminate("frm_fp_units_accomplishmentlist.php"); // Invalid key, return to list
		switch ($frm_fp_units_accomplishment->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("frm_fp_units_accomplishmentlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$frm_fp_units_accomplishment->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $frm_fp_units_accomplishment->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$frm_fp_units_accomplishment->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$frm_fp_units_accomplishment->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$frm_fp_units_accomplishment->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_fp_units_accomplishment;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_fp_units_accomplishment;
		if (!$frm_fp_units_accomplishment->units_id->FldIsDetailKey)
			$frm_fp_units_accomplishment->units_id->setFormValue($objForm->GetValue("x_units_id"));
		if (!$frm_fp_units_accomplishment->focal_person_id->FldIsDetailKey) {
			$frm_fp_units_accomplishment->focal_person_id->setFormValue($objForm->GetValue("x_focal_person_id"));
		}
		if (!$frm_fp_units_accomplishment->unit_id->FldIsDetailKey) {
			$frm_fp_units_accomplishment->unit_id->setFormValue($objForm->GetValue("x_unit_id"));
		}
		if (!$frm_fp_units_accomplishment->cu_sequence->FldIsDetailKey) {
			$frm_fp_units_accomplishment->cu_sequence->setFormValue($objForm->GetValue("x_cu_sequence"));
		}
		if (!$frm_fp_units_accomplishment->cu_short_name->FldIsDetailKey) {
			$frm_fp_units_accomplishment->cu_short_name->setFormValue($objForm->GetValue("x_cu_short_name"));
		}
		if (!$frm_fp_units_accomplishment->cu_unit_name->FldIsDetailKey) {
			$frm_fp_units_accomplishment->cu_unit_name->setFormValue($objForm->GetValue("x_cu_unit_name"));
		}
		if (!$frm_fp_units_accomplishment->unit_name->FldIsDetailKey) {
			$frm_fp_units_accomplishment->unit_name->setFormValue($objForm->GetValue("x_unit_name"));
		}
		if (!$frm_fp_units_accomplishment->unit_name_short->FldIsDetailKey) {
			$frm_fp_units_accomplishment->unit_name_short->setFormValue($objForm->GetValue("x_unit_name_short"));
		}
		if (!$frm_fp_units_accomplishment->personnel_count->FldIsDetailKey) {
			$frm_fp_units_accomplishment->personnel_count->setFormValue($objForm->GetValue("x_personnel_count"));
		}
		if (!$frm_fp_units_accomplishment->mfo_1->FldIsDetailKey) {
			$frm_fp_units_accomplishment->mfo_1->setFormValue($objForm->GetValue("x_mfo_1"));
		}
		if (!$frm_fp_units_accomplishment->mfo_2->FldIsDetailKey) {
			$frm_fp_units_accomplishment->mfo_2->setFormValue($objForm->GetValue("x_mfo_2"));
		}
		if (!$frm_fp_units_accomplishment->mfo_3->FldIsDetailKey) {
			$frm_fp_units_accomplishment->mfo_3->setFormValue($objForm->GetValue("x_mfo_3"));
		}
		if (!$frm_fp_units_accomplishment->mfo_4->FldIsDetailKey) {
			$frm_fp_units_accomplishment->mfo_4->setFormValue($objForm->GetValue("x_mfo_4"));
		}
		if (!$frm_fp_units_accomplishment->mfo_5->FldIsDetailKey) {
			$frm_fp_units_accomplishment->mfo_5->setFormValue($objForm->GetValue("x_mfo_5"));
		}
		if (!$frm_fp_units_accomplishment->sto->FldIsDetailKey) {
			$frm_fp_units_accomplishment->sto->setFormValue($objForm->GetValue("x_sto"));
		}
		if (!$frm_fp_units_accomplishment->gass->FldIsDetailKey) {
			$frm_fp_units_accomplishment->gass->setFormValue($objForm->GetValue("x_gass"));
		}
		if (!$frm_fp_units_accomplishment->users_name->FldIsDetailKey) {
			$frm_fp_units_accomplishment->users_name->setFormValue($objForm->GetValue("x_users_name"));
		}
		if (!$frm_fp_units_accomplishment->users_nameLast->FldIsDetailKey) {
			$frm_fp_units_accomplishment->users_nameLast->setFormValue($objForm->GetValue("x_users_nameLast"));
		}
		if (!$frm_fp_units_accomplishment->users_nameFirst->FldIsDetailKey) {
			$frm_fp_units_accomplishment->users_nameFirst->setFormValue($objForm->GetValue("x_users_nameFirst"));
		}
		if (!$frm_fp_units_accomplishment->users_nameMiddle->FldIsDetailKey) {
			$frm_fp_units_accomplishment->users_nameMiddle->setFormValue($objForm->GetValue("x_users_nameMiddle"));
		}
		if (!$frm_fp_units_accomplishment->users_userLoginName->FldIsDetailKey) {
			$frm_fp_units_accomplishment->users_userLoginName->setFormValue($objForm->GetValue("x_users_userLoginName"));
		}
		if (!$frm_fp_units_accomplishment->users_password->FldIsDetailKey) {
			$frm_fp_units_accomplishment->users_password->setFormValue($objForm->GetValue("x_users_password"));
		}
		if (!$frm_fp_units_accomplishment->users_email->FldIsDetailKey) {
			$frm_fp_units_accomplishment->users_email->setFormValue($objForm->GetValue("x_users_email"));
		}
		if (!$frm_fp_units_accomplishment->users_contactNo->FldIsDetailKey) {
			$frm_fp_units_accomplishment->users_contactNo->setFormValue($objForm->GetValue("x_users_contactNo"));
		}
		if (!$frm_fp_units_accomplishment->tbl_cutOffDate_id->FldIsDetailKey) {
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->setFormValue($objForm->GetValue("x_tbl_cutOffDate_id"));
		}
		if (!$frm_fp_units_accomplishment->t_cutOffDate->FldIsDetailKey) {
			$frm_fp_units_accomplishment->t_cutOffDate->setFormValue($objForm->GetValue("x_t_cutOffDate"));
			$frm_fp_units_accomplishment->t_cutOffDate->CurrentValue = up_UnFormatDateTime($frm_fp_units_accomplishment->t_cutOffDate->CurrentValue, 6);
		}
		if (!$frm_fp_units_accomplishment->t_cutOffDate_remarks->FldIsDetailKey) {
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->setFormValue($objForm->GetValue("x_t_cutOffDate_remarks"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_fp_units_accomplishment;
		$this->LoadRow();
		$frm_fp_units_accomplishment->units_id->CurrentValue = $frm_fp_units_accomplishment->units_id->FormValue;
		$frm_fp_units_accomplishment->focal_person_id->CurrentValue = $frm_fp_units_accomplishment->focal_person_id->FormValue;
		$frm_fp_units_accomplishment->unit_id->CurrentValue = $frm_fp_units_accomplishment->unit_id->FormValue;
		$frm_fp_units_accomplishment->cu_sequence->CurrentValue = $frm_fp_units_accomplishment->cu_sequence->FormValue;
		$frm_fp_units_accomplishment->cu_short_name->CurrentValue = $frm_fp_units_accomplishment->cu_short_name->FormValue;
		$frm_fp_units_accomplishment->cu_unit_name->CurrentValue = $frm_fp_units_accomplishment->cu_unit_name->FormValue;
		$frm_fp_units_accomplishment->unit_name->CurrentValue = $frm_fp_units_accomplishment->unit_name->FormValue;
		$frm_fp_units_accomplishment->unit_name_short->CurrentValue = $frm_fp_units_accomplishment->unit_name_short->FormValue;
		$frm_fp_units_accomplishment->personnel_count->CurrentValue = $frm_fp_units_accomplishment->personnel_count->FormValue;
		$frm_fp_units_accomplishment->mfo_1->CurrentValue = $frm_fp_units_accomplishment->mfo_1->FormValue;
		$frm_fp_units_accomplishment->mfo_2->CurrentValue = $frm_fp_units_accomplishment->mfo_2->FormValue;
		$frm_fp_units_accomplishment->mfo_3->CurrentValue = $frm_fp_units_accomplishment->mfo_3->FormValue;
		$frm_fp_units_accomplishment->mfo_4->CurrentValue = $frm_fp_units_accomplishment->mfo_4->FormValue;
		$frm_fp_units_accomplishment->mfo_5->CurrentValue = $frm_fp_units_accomplishment->mfo_5->FormValue;
		$frm_fp_units_accomplishment->sto->CurrentValue = $frm_fp_units_accomplishment->sto->FormValue;
		$frm_fp_units_accomplishment->gass->CurrentValue = $frm_fp_units_accomplishment->gass->FormValue;
		$frm_fp_units_accomplishment->users_name->CurrentValue = $frm_fp_units_accomplishment->users_name->FormValue;
		$frm_fp_units_accomplishment->users_nameLast->CurrentValue = $frm_fp_units_accomplishment->users_nameLast->FormValue;
		$frm_fp_units_accomplishment->users_nameFirst->CurrentValue = $frm_fp_units_accomplishment->users_nameFirst->FormValue;
		$frm_fp_units_accomplishment->users_nameMiddle->CurrentValue = $frm_fp_units_accomplishment->users_nameMiddle->FormValue;
		$frm_fp_units_accomplishment->users_userLoginName->CurrentValue = $frm_fp_units_accomplishment->users_userLoginName->FormValue;
		$frm_fp_units_accomplishment->users_password->CurrentValue = $frm_fp_units_accomplishment->users_password->FormValue;
		$frm_fp_units_accomplishment->users_email->CurrentValue = $frm_fp_units_accomplishment->users_email->FormValue;
		$frm_fp_units_accomplishment->users_contactNo->CurrentValue = $frm_fp_units_accomplishment->users_contactNo->FormValue;
		$frm_fp_units_accomplishment->tbl_cutOffDate_id->CurrentValue = $frm_fp_units_accomplishment->tbl_cutOffDate_id->FormValue;
		$frm_fp_units_accomplishment->t_cutOffDate->CurrentValue = $frm_fp_units_accomplishment->t_cutOffDate->FormValue;
		$frm_fp_units_accomplishment->t_cutOffDate->CurrentValue = up_UnFormatDateTime($frm_fp_units_accomplishment->t_cutOffDate->CurrentValue, 6);
		$frm_fp_units_accomplishment->t_cutOffDate_remarks->CurrentValue = $frm_fp_units_accomplishment->t_cutOffDate_remarks->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_fp_units_accomplishment;
		$sFilter = $frm_fp_units_accomplishment->KeyFilter();

		// Call Row Selecting event
		$frm_fp_units_accomplishment->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_fp_units_accomplishment->CurrentFilter = $sFilter;
		$sSql = $frm_fp_units_accomplishment->SQL();
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
		global $conn, $frm_fp_units_accomplishment;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_fp_units_accomplishment->Row_Selected($row);
		$frm_fp_units_accomplishment->units_id->setDbValue($rs->fields('units_id'));
		$frm_fp_units_accomplishment->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_fp_units_accomplishment->unit_id->setDbValue($rs->fields('unit_id'));
		$frm_fp_units_accomplishment->cu_sequence->setDbValue($rs->fields('cu_sequence'));
		$frm_fp_units_accomplishment->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_fp_units_accomplishment->cu_unit_name->setDbValue($rs->fields('cu_unit_name'));
		$frm_fp_units_accomplishment->unit_name->setDbValue($rs->fields('unit_name'));
		$frm_fp_units_accomplishment->unit_name_short->setDbValue($rs->fields('unit_name_short'));
		$frm_fp_units_accomplishment->personnel_count->setDbValue($rs->fields('personnel_count'));
		$frm_fp_units_accomplishment->mfo_1->setDbValue($rs->fields('mfo_1'));
		$frm_fp_units_accomplishment->mfo_2->setDbValue($rs->fields('mfo_2'));
		$frm_fp_units_accomplishment->mfo_3->setDbValue($rs->fields('mfo_3'));
		$frm_fp_units_accomplishment->mfo_4->setDbValue($rs->fields('mfo_4'));
		$frm_fp_units_accomplishment->mfo_5->setDbValue($rs->fields('mfo_5'));
		$frm_fp_units_accomplishment->sto->setDbValue($rs->fields('sto'));
		$frm_fp_units_accomplishment->gass->setDbValue($rs->fields('gass'));
		$frm_fp_units_accomplishment->users_name->setDbValue($rs->fields('users_name'));
		$frm_fp_units_accomplishment->users_nameLast->setDbValue($rs->fields('users_nameLast'));
		$frm_fp_units_accomplishment->users_nameFirst->setDbValue($rs->fields('users_nameFirst'));
		$frm_fp_units_accomplishment->users_nameMiddle->setDbValue($rs->fields('users_nameMiddle'));
		$frm_fp_units_accomplishment->users_userLoginName->setDbValue($rs->fields('users_userLoginName'));
		$frm_fp_units_accomplishment->users_password->setDbValue($rs->fields('users_password'));
		$frm_fp_units_accomplishment->users_email->setDbValue($rs->fields('users_email'));
		$frm_fp_units_accomplishment->users_contactNo->setDbValue($rs->fields('users_contactNo'));
		$frm_fp_units_accomplishment->tbl_cutOffDate_id->setDbValue($rs->fields('tbl_cutOffDate_id'));
		$frm_fp_units_accomplishment->t_cutOffDate->setDbValue($rs->fields('t_cutOffDate'));
		$frm_fp_units_accomplishment->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_fp_units_accomplishment;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_fp_units_accomplishment->Row_Rendering();

		// Common render codes for all row types
		// units_id
		// focal_person_id
		// unit_id
		// cu_sequence
		// cu_short_name
		// cu_unit_name
		// unit_name
		// unit_name_short
		// personnel_count
		// mfo_1
		// mfo_2
		// mfo_3
		// mfo_4
		// mfo_5
		// sto
		// gass
		// users_name
		// users_nameLast
		// users_nameFirst
		// users_nameMiddle
		// users_userLoginName
		// users_password
		// users_email
		// users_contactNo
		// tbl_cutOffDate_id
		// t_cutOffDate
		// t_cutOffDate_remarks

		if ($frm_fp_units_accomplishment->RowType == UP_ROWTYPE_VIEW) { // View row

			// units_id
			$frm_fp_units_accomplishment->units_id->ViewValue = $frm_fp_units_accomplishment->units_id->CurrentValue;
			$frm_fp_units_accomplishment->units_id->ViewCustomAttributes = "";

			// focal_person_id
			$frm_fp_units_accomplishment->focal_person_id->ViewValue = $frm_fp_units_accomplishment->focal_person_id->CurrentValue;
			$frm_fp_units_accomplishment->focal_person_id->ViewCustomAttributes = "";

			// unit_id
			$frm_fp_units_accomplishment->unit_id->ViewValue = $frm_fp_units_accomplishment->unit_id->CurrentValue;
			$frm_fp_units_accomplishment->unit_id->ViewCustomAttributes = "";

			// cu_sequence
			$frm_fp_units_accomplishment->cu_sequence->ViewValue = $frm_fp_units_accomplishment->cu_sequence->CurrentValue;
			$frm_fp_units_accomplishment->cu_sequence->ViewCustomAttributes = "";

			// cu_short_name
			$frm_fp_units_accomplishment->cu_short_name->ViewValue = $frm_fp_units_accomplishment->cu_short_name->CurrentValue;
			$frm_fp_units_accomplishment->cu_short_name->ViewCustomAttributes = "";

			// cu_unit_name
			$frm_fp_units_accomplishment->cu_unit_name->ViewValue = $frm_fp_units_accomplishment->cu_unit_name->CurrentValue;
			$frm_fp_units_accomplishment->cu_unit_name->ViewCustomAttributes = "";

			// unit_name
			$frm_fp_units_accomplishment->unit_name->ViewValue = $frm_fp_units_accomplishment->unit_name->CurrentValue;
			$frm_fp_units_accomplishment->unit_name->ViewCustomAttributes = "";

			// unit_name_short
			$frm_fp_units_accomplishment->unit_name_short->ViewValue = $frm_fp_units_accomplishment->unit_name_short->CurrentValue;
			$frm_fp_units_accomplishment->unit_name_short->ViewCustomAttributes = "";

			// personnel_count
			$frm_fp_units_accomplishment->personnel_count->ViewValue = $frm_fp_units_accomplishment->personnel_count->CurrentValue;
			$frm_fp_units_accomplishment->personnel_count->ViewCustomAttributes = "";

			// mfo_1
			$frm_fp_units_accomplishment->mfo_1->ViewValue = $frm_fp_units_accomplishment->mfo_1->CurrentValue;
			$frm_fp_units_accomplishment->mfo_1->ViewCustomAttributes = "";

			// mfo_2
			$frm_fp_units_accomplishment->mfo_2->ViewValue = $frm_fp_units_accomplishment->mfo_2->CurrentValue;
			$frm_fp_units_accomplishment->mfo_2->ViewCustomAttributes = "";

			// mfo_3
			$frm_fp_units_accomplishment->mfo_3->ViewValue = $frm_fp_units_accomplishment->mfo_3->CurrentValue;
			$frm_fp_units_accomplishment->mfo_3->ViewCustomAttributes = "";

			// mfo_4
			$frm_fp_units_accomplishment->mfo_4->ViewValue = $frm_fp_units_accomplishment->mfo_4->CurrentValue;
			$frm_fp_units_accomplishment->mfo_4->ViewCustomAttributes = "";

			// mfo_5
			$frm_fp_units_accomplishment->mfo_5->ViewValue = $frm_fp_units_accomplishment->mfo_5->CurrentValue;
			$frm_fp_units_accomplishment->mfo_5->ViewCustomAttributes = "";

			// sto
			$frm_fp_units_accomplishment->sto->ViewValue = $frm_fp_units_accomplishment->sto->CurrentValue;
			$frm_fp_units_accomplishment->sto->ViewCustomAttributes = "";

			// gass
			$frm_fp_units_accomplishment->gass->ViewValue = $frm_fp_units_accomplishment->gass->CurrentValue;
			$frm_fp_units_accomplishment->gass->ViewCustomAttributes = "";

			// users_name
			$frm_fp_units_accomplishment->users_name->ViewValue = $frm_fp_units_accomplishment->users_name->CurrentValue;
			$frm_fp_units_accomplishment->users_name->ViewCustomAttributes = "";

			// users_nameLast
			$frm_fp_units_accomplishment->users_nameLast->ViewValue = $frm_fp_units_accomplishment->users_nameLast->CurrentValue;
			$frm_fp_units_accomplishment->users_nameLast->ViewCustomAttributes = "";

			// users_nameFirst
			$frm_fp_units_accomplishment->users_nameFirst->ViewValue = $frm_fp_units_accomplishment->users_nameFirst->CurrentValue;
			$frm_fp_units_accomplishment->users_nameFirst->ViewCustomAttributes = "";

			// users_nameMiddle
			$frm_fp_units_accomplishment->users_nameMiddle->ViewValue = $frm_fp_units_accomplishment->users_nameMiddle->CurrentValue;
			$frm_fp_units_accomplishment->users_nameMiddle->ViewCustomAttributes = "";

			// users_userLoginName
			$frm_fp_units_accomplishment->users_userLoginName->ViewValue = $frm_fp_units_accomplishment->users_userLoginName->CurrentValue;
			$frm_fp_units_accomplishment->users_userLoginName->ViewCustomAttributes = "";

			// users_password
			$frm_fp_units_accomplishment->users_password->ViewValue = $frm_fp_units_accomplishment->users_password->CurrentValue;
			$frm_fp_units_accomplishment->users_password->ViewCustomAttributes = "";

			// users_email
			$frm_fp_units_accomplishment->users_email->ViewValue = $frm_fp_units_accomplishment->users_email->CurrentValue;
			$frm_fp_units_accomplishment->users_email->ViewCustomAttributes = "";

			// users_contactNo
			$frm_fp_units_accomplishment->users_contactNo->ViewValue = $frm_fp_units_accomplishment->users_contactNo->CurrentValue;
			$frm_fp_units_accomplishment->users_contactNo->ViewCustomAttributes = "";

			// tbl_cutOffDate_id
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->ViewValue = $frm_fp_units_accomplishment->tbl_cutOffDate_id->CurrentValue;
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->ViewCustomAttributes = "";

			// t_cutOffDate
			$frm_fp_units_accomplishment->t_cutOffDate->ViewValue = $frm_fp_units_accomplishment->t_cutOffDate->CurrentValue;
			$frm_fp_units_accomplishment->t_cutOffDate->ViewValue = up_FormatDateTime($frm_fp_units_accomplishment->t_cutOffDate->ViewValue, 6);
			$frm_fp_units_accomplishment->t_cutOffDate->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->ViewValue = $frm_fp_units_accomplishment->t_cutOffDate_remarks->CurrentValue;
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// units_id
			$frm_fp_units_accomplishment->units_id->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->units_id->HrefValue = "";
			$frm_fp_units_accomplishment->units_id->TooltipValue = "";

			// focal_person_id
			$frm_fp_units_accomplishment->focal_person_id->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->focal_person_id->HrefValue = "";
			$frm_fp_units_accomplishment->focal_person_id->TooltipValue = "";

			// unit_id
			$frm_fp_units_accomplishment->unit_id->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->unit_id->HrefValue = "";
			$frm_fp_units_accomplishment->unit_id->TooltipValue = "";

			// cu_sequence
			$frm_fp_units_accomplishment->cu_sequence->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->cu_sequence->HrefValue = "";
			$frm_fp_units_accomplishment->cu_sequence->TooltipValue = "";

			// cu_short_name
			$frm_fp_units_accomplishment->cu_short_name->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->cu_short_name->HrefValue = "";
			$frm_fp_units_accomplishment->cu_short_name->TooltipValue = "";

			// cu_unit_name
			$frm_fp_units_accomplishment->cu_unit_name->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->cu_unit_name->HrefValue = "";
			$frm_fp_units_accomplishment->cu_unit_name->TooltipValue = "";

			// unit_name
			$frm_fp_units_accomplishment->unit_name->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->unit_name->HrefValue = "";
			$frm_fp_units_accomplishment->unit_name->TooltipValue = "";

			// unit_name_short
			$frm_fp_units_accomplishment->unit_name_short->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->unit_name_short->HrefValue = "";
			$frm_fp_units_accomplishment->unit_name_short->TooltipValue = "";

			// personnel_count
			$frm_fp_units_accomplishment->personnel_count->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->personnel_count->HrefValue = "";
			$frm_fp_units_accomplishment->personnel_count->TooltipValue = "";

			// mfo_1
			$frm_fp_units_accomplishment->mfo_1->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_1->HrefValue = "";
			$frm_fp_units_accomplishment->mfo_1->TooltipValue = "";

			// mfo_2
			$frm_fp_units_accomplishment->mfo_2->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_2->HrefValue = "";
			$frm_fp_units_accomplishment->mfo_2->TooltipValue = "";

			// mfo_3
			$frm_fp_units_accomplishment->mfo_3->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_3->HrefValue = "";
			$frm_fp_units_accomplishment->mfo_3->TooltipValue = "";

			// mfo_4
			$frm_fp_units_accomplishment->mfo_4->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_4->HrefValue = "";
			$frm_fp_units_accomplishment->mfo_4->TooltipValue = "";

			// mfo_5
			$frm_fp_units_accomplishment->mfo_5->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_5->HrefValue = "";
			$frm_fp_units_accomplishment->mfo_5->TooltipValue = "";

			// sto
			$frm_fp_units_accomplishment->sto->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->sto->HrefValue = "";
			$frm_fp_units_accomplishment->sto->TooltipValue = "";

			// gass
			$frm_fp_units_accomplishment->gass->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->gass->HrefValue = "";
			$frm_fp_units_accomplishment->gass->TooltipValue = "";

			// users_name
			$frm_fp_units_accomplishment->users_name->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_name->HrefValue = "";
			$frm_fp_units_accomplishment->users_name->TooltipValue = "";

			// users_nameLast
			$frm_fp_units_accomplishment->users_nameLast->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_nameLast->HrefValue = "";
			$frm_fp_units_accomplishment->users_nameLast->TooltipValue = "";

			// users_nameFirst
			$frm_fp_units_accomplishment->users_nameFirst->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_nameFirst->HrefValue = "";
			$frm_fp_units_accomplishment->users_nameFirst->TooltipValue = "";

			// users_nameMiddle
			$frm_fp_units_accomplishment->users_nameMiddle->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_nameMiddle->HrefValue = "";
			$frm_fp_units_accomplishment->users_nameMiddle->TooltipValue = "";

			// users_userLoginName
			$frm_fp_units_accomplishment->users_userLoginName->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_userLoginName->HrefValue = "";
			$frm_fp_units_accomplishment->users_userLoginName->TooltipValue = "";

			// users_password
			$frm_fp_units_accomplishment->users_password->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_password->HrefValue = "";
			$frm_fp_units_accomplishment->users_password->TooltipValue = "";

			// users_email
			$frm_fp_units_accomplishment->users_email->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_email->HrefValue = "";
			$frm_fp_units_accomplishment->users_email->TooltipValue = "";

			// users_contactNo
			$frm_fp_units_accomplishment->users_contactNo->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->users_contactNo->HrefValue = "";
			$frm_fp_units_accomplishment->users_contactNo->TooltipValue = "";

			// tbl_cutOffDate_id
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->HrefValue = "";
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->TooltipValue = "";

			// t_cutOffDate
			$frm_fp_units_accomplishment->t_cutOffDate->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->t_cutOffDate->HrefValue = "";
			$frm_fp_units_accomplishment->t_cutOffDate->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->HrefValue = "";
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->TooltipValue = "";
		} elseif ($frm_fp_units_accomplishment->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// units_id
			$frm_fp_units_accomplishment->units_id->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->units_id->EditValue = $frm_fp_units_accomplishment->units_id->CurrentValue;
			$frm_fp_units_accomplishment->units_id->ViewCustomAttributes = "";

			// focal_person_id
			$frm_fp_units_accomplishment->focal_person_id->EditCustomAttributes = "";
			if (!$Security->IsAdmin() && $Security->IsLoggedIn()) { // Non system admin
				$frm_fp_units_accomplishment->focal_person_id->CurrentValue = CurrentUserID();
			$frm_fp_units_accomplishment->focal_person_id->EditValue = $frm_fp_units_accomplishment->focal_person_id->CurrentValue;
			$frm_fp_units_accomplishment->focal_person_id->ViewCustomAttributes = "";
			} else {
			$frm_fp_units_accomplishment->focal_person_id->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->focal_person_id->CurrentValue);
			}

			// unit_id
			$frm_fp_units_accomplishment->unit_id->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->unit_id->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->unit_id->CurrentValue);

			// cu_sequence
			$frm_fp_units_accomplishment->cu_sequence->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->cu_sequence->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->cu_sequence->CurrentValue);

			// cu_short_name
			$frm_fp_units_accomplishment->cu_short_name->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->cu_short_name->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->cu_short_name->CurrentValue);

			// cu_unit_name
			$frm_fp_units_accomplishment->cu_unit_name->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->cu_unit_name->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->cu_unit_name->CurrentValue);

			// unit_name
			$frm_fp_units_accomplishment->unit_name->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->unit_name->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->unit_name->CurrentValue);

			// unit_name_short
			$frm_fp_units_accomplishment->unit_name_short->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->unit_name_short->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->unit_name_short->CurrentValue);

			// personnel_count
			$frm_fp_units_accomplishment->personnel_count->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->personnel_count->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->personnel_count->CurrentValue);

			// mfo_1
			$frm_fp_units_accomplishment->mfo_1->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_1->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->mfo_1->CurrentValue);

			// mfo_2
			$frm_fp_units_accomplishment->mfo_2->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_2->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->mfo_2->CurrentValue);

			// mfo_3
			$frm_fp_units_accomplishment->mfo_3->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_3->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->mfo_3->CurrentValue);

			// mfo_4
			$frm_fp_units_accomplishment->mfo_4->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_4->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->mfo_4->CurrentValue);

			// mfo_5
			$frm_fp_units_accomplishment->mfo_5->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->mfo_5->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->mfo_5->CurrentValue);

			// sto
			$frm_fp_units_accomplishment->sto->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->sto->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->sto->CurrentValue);

			// gass
			$frm_fp_units_accomplishment->gass->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->gass->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->gass->CurrentValue);

			// users_name
			$frm_fp_units_accomplishment->users_name->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->users_name->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->users_name->CurrentValue);

			// users_nameLast
			$frm_fp_units_accomplishment->users_nameLast->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->users_nameLast->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->users_nameLast->CurrentValue);

			// users_nameFirst
			$frm_fp_units_accomplishment->users_nameFirst->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->users_nameFirst->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->users_nameFirst->CurrentValue);

			// users_nameMiddle
			$frm_fp_units_accomplishment->users_nameMiddle->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->users_nameMiddle->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->users_nameMiddle->CurrentValue);

			// users_userLoginName
			$frm_fp_units_accomplishment->users_userLoginName->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->users_userLoginName->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->users_userLoginName->CurrentValue);

			// users_password
			$frm_fp_units_accomplishment->users_password->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->users_password->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->users_password->CurrentValue);

			// users_email
			$frm_fp_units_accomplishment->users_email->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->users_email->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->users_email->CurrentValue);

			// users_contactNo
			$frm_fp_units_accomplishment->users_contactNo->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->users_contactNo->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->users_contactNo->CurrentValue);

			// tbl_cutOffDate_id
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->tbl_cutOffDate_id->CurrentValue);

			// t_cutOffDate
			$frm_fp_units_accomplishment->t_cutOffDate->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->t_cutOffDate->EditValue = up_HtmlEncode(up_FormatDateTime($frm_fp_units_accomplishment->t_cutOffDate->CurrentValue, 6));

			// t_cutOffDate_remarks
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_fp_units_accomplishment->t_cutOffDate_remarks->CurrentValue);

			// Edit refer script
			// units_id

			$frm_fp_units_accomplishment->units_id->HrefValue = "";

			// focal_person_id
			$frm_fp_units_accomplishment->focal_person_id->HrefValue = "";

			// unit_id
			$frm_fp_units_accomplishment->unit_id->HrefValue = "";

			// cu_sequence
			$frm_fp_units_accomplishment->cu_sequence->HrefValue = "";

			// cu_short_name
			$frm_fp_units_accomplishment->cu_short_name->HrefValue = "";

			// cu_unit_name
			$frm_fp_units_accomplishment->cu_unit_name->HrefValue = "";

			// unit_name
			$frm_fp_units_accomplishment->unit_name->HrefValue = "";

			// unit_name_short
			$frm_fp_units_accomplishment->unit_name_short->HrefValue = "";

			// personnel_count
			$frm_fp_units_accomplishment->personnel_count->HrefValue = "";

			// mfo_1
			$frm_fp_units_accomplishment->mfo_1->HrefValue = "";

			// mfo_2
			$frm_fp_units_accomplishment->mfo_2->HrefValue = "";

			// mfo_3
			$frm_fp_units_accomplishment->mfo_3->HrefValue = "";

			// mfo_4
			$frm_fp_units_accomplishment->mfo_4->HrefValue = "";

			// mfo_5
			$frm_fp_units_accomplishment->mfo_5->HrefValue = "";

			// sto
			$frm_fp_units_accomplishment->sto->HrefValue = "";

			// gass
			$frm_fp_units_accomplishment->gass->HrefValue = "";

			// users_name
			$frm_fp_units_accomplishment->users_name->HrefValue = "";

			// users_nameLast
			$frm_fp_units_accomplishment->users_nameLast->HrefValue = "";

			// users_nameFirst
			$frm_fp_units_accomplishment->users_nameFirst->HrefValue = "";

			// users_nameMiddle
			$frm_fp_units_accomplishment->users_nameMiddle->HrefValue = "";

			// users_userLoginName
			$frm_fp_units_accomplishment->users_userLoginName->HrefValue = "";

			// users_password
			$frm_fp_units_accomplishment->users_password->HrefValue = "";

			// users_email
			$frm_fp_units_accomplishment->users_email->HrefValue = "";

			// users_contactNo
			$frm_fp_units_accomplishment->users_contactNo->HrefValue = "";

			// tbl_cutOffDate_id
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->HrefValue = "";

			// t_cutOffDate
			$frm_fp_units_accomplishment->t_cutOffDate->HrefValue = "";

			// t_cutOffDate_remarks
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->HrefValue = "";
		}
		if ($frm_fp_units_accomplishment->RowType == UP_ROWTYPE_ADD ||
			$frm_fp_units_accomplishment->RowType == UP_ROWTYPE_EDIT ||
			$frm_fp_units_accomplishment->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_fp_units_accomplishment->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_fp_units_accomplishment->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_units_accomplishment->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_fp_units_accomplishment;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($frm_fp_units_accomplishment->focal_person_id->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_units_accomplishment->focal_person_id->FldErrMsg());
		}
		if (!up_CheckInteger($frm_fp_units_accomplishment->unit_id->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_units_accomplishment->unit_id->FldErrMsg());
		}
		if (!up_CheckInteger($frm_fp_units_accomplishment->cu_sequence->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_units_accomplishment->cu_sequence->FldErrMsg());
		}
		if (!up_CheckInteger($frm_fp_units_accomplishment->personnel_count->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_units_accomplishment->personnel_count->FldErrMsg());
		}
		if (!is_null($frm_fp_units_accomplishment->users_nameLast->FormValue) && $frm_fp_units_accomplishment->users_nameLast->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_units_accomplishment->users_nameLast->FldCaption());
		}
		if (!is_null($frm_fp_units_accomplishment->users_nameFirst->FormValue) && $frm_fp_units_accomplishment->users_nameFirst->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_units_accomplishment->users_nameFirst->FldCaption());
		}
		if (!is_null($frm_fp_units_accomplishment->users_userLoginName->FormValue) && $frm_fp_units_accomplishment->users_userLoginName->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_units_accomplishment->users_userLoginName->FldCaption());
		}
		if (!is_null($frm_fp_units_accomplishment->users_password->FormValue) && $frm_fp_units_accomplishment->users_password->FormValue == "") {
			up_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $frm_fp_units_accomplishment->users_password->FldCaption());
		}
		if (!up_CheckInteger($frm_fp_units_accomplishment->tbl_cutOffDate_id->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_units_accomplishment->tbl_cutOffDate_id->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_fp_units_accomplishment->t_cutOffDate->FormValue)) {
			up_AddMessage($gsFormError, $frm_fp_units_accomplishment->t_cutOffDate->FldErrMsg());
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
		global $conn, $Security, $Language, $frm_fp_units_accomplishment;
		$sFilter = $frm_fp_units_accomplishment->KeyFilter();
		$frm_fp_units_accomplishment->CurrentFilter = $sFilter;
		$sSql = $frm_fp_units_accomplishment->SQL();
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

			// focal_person_id
			$frm_fp_units_accomplishment->focal_person_id->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->focal_person_id->CurrentValue, NULL, $frm_fp_units_accomplishment->focal_person_id->ReadOnly);

			// unit_id
			$frm_fp_units_accomplishment->unit_id->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->unit_id->CurrentValue, NULL, $frm_fp_units_accomplishment->unit_id->ReadOnly);

			// cu_sequence
			$frm_fp_units_accomplishment->cu_sequence->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->cu_sequence->CurrentValue, NULL, $frm_fp_units_accomplishment->cu_sequence->ReadOnly);

			// cu_short_name
			$frm_fp_units_accomplishment->cu_short_name->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->cu_short_name->CurrentValue, NULL, $frm_fp_units_accomplishment->cu_short_name->ReadOnly);

			// cu_unit_name
			$frm_fp_units_accomplishment->cu_unit_name->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->cu_unit_name->CurrentValue, NULL, $frm_fp_units_accomplishment->cu_unit_name->ReadOnly);

			// unit_name
			$frm_fp_units_accomplishment->unit_name->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->unit_name->CurrentValue, NULL, $frm_fp_units_accomplishment->unit_name->ReadOnly);

			// unit_name_short
			$frm_fp_units_accomplishment->unit_name_short->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->unit_name_short->CurrentValue, NULL, $frm_fp_units_accomplishment->unit_name_short->ReadOnly);

			// personnel_count
			$frm_fp_units_accomplishment->personnel_count->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->personnel_count->CurrentValue, NULL, $frm_fp_units_accomplishment->personnel_count->ReadOnly);

			// mfo_1
			$frm_fp_units_accomplishment->mfo_1->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->mfo_1->CurrentValue, NULL, $frm_fp_units_accomplishment->mfo_1->ReadOnly);

			// mfo_2
			$frm_fp_units_accomplishment->mfo_2->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->mfo_2->CurrentValue, NULL, $frm_fp_units_accomplishment->mfo_2->ReadOnly);

			// mfo_3
			$frm_fp_units_accomplishment->mfo_3->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->mfo_3->CurrentValue, NULL, $frm_fp_units_accomplishment->mfo_3->ReadOnly);

			// mfo_4
			$frm_fp_units_accomplishment->mfo_4->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->mfo_4->CurrentValue, NULL, $frm_fp_units_accomplishment->mfo_4->ReadOnly);

			// mfo_5
			$frm_fp_units_accomplishment->mfo_5->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->mfo_5->CurrentValue, NULL, $frm_fp_units_accomplishment->mfo_5->ReadOnly);

			// sto
			$frm_fp_units_accomplishment->sto->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->sto->CurrentValue, NULL, $frm_fp_units_accomplishment->sto->ReadOnly);

			// gass
			$frm_fp_units_accomplishment->gass->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->gass->CurrentValue, NULL, $frm_fp_units_accomplishment->gass->ReadOnly);

			// users_name
			$frm_fp_units_accomplishment->users_name->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->users_name->CurrentValue, NULL, $frm_fp_units_accomplishment->users_name->ReadOnly);

			// users_nameLast
			$frm_fp_units_accomplishment->users_nameLast->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->users_nameLast->CurrentValue, NULL, $frm_fp_units_accomplishment->users_nameLast->ReadOnly);

			// users_nameFirst
			$frm_fp_units_accomplishment->users_nameFirst->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->users_nameFirst->CurrentValue, NULL, $frm_fp_units_accomplishment->users_nameFirst->ReadOnly);

			// users_nameMiddle
			$frm_fp_units_accomplishment->users_nameMiddle->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->users_nameMiddle->CurrentValue, NULL, $frm_fp_units_accomplishment->users_nameMiddle->ReadOnly);

			// users_userLoginName
			$frm_fp_units_accomplishment->users_userLoginName->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->users_userLoginName->CurrentValue, NULL, $frm_fp_units_accomplishment->users_userLoginName->ReadOnly);

			// users_password
			$frm_fp_units_accomplishment->users_password->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->users_password->CurrentValue, NULL, $frm_fp_units_accomplishment->users_password->ReadOnly);

			// users_email
			$frm_fp_units_accomplishment->users_email->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->users_email->CurrentValue, NULL, $frm_fp_units_accomplishment->users_email->ReadOnly);

			// users_contactNo
			$frm_fp_units_accomplishment->users_contactNo->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->users_contactNo->CurrentValue, NULL, $frm_fp_units_accomplishment->users_contactNo->ReadOnly);

			// tbl_cutOffDate_id
			$frm_fp_units_accomplishment->tbl_cutOffDate_id->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->tbl_cutOffDate_id->CurrentValue, NULL, $frm_fp_units_accomplishment->tbl_cutOffDate_id->ReadOnly);

			// t_cutOffDate
			$frm_fp_units_accomplishment->t_cutOffDate->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_fp_units_accomplishment->t_cutOffDate->CurrentValue, 6), NULL, $frm_fp_units_accomplishment->t_cutOffDate->ReadOnly);

			// t_cutOffDate_remarks
			$frm_fp_units_accomplishment->t_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_fp_units_accomplishment->t_cutOffDate_remarks->CurrentValue, NULL, $frm_fp_units_accomplishment->t_cutOffDate_remarks->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_fp_units_accomplishment->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_fp_units_accomplishment->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_fp_units_accomplishment->CancelMessage <> "") {
					$this->setFailureMessage($frm_fp_units_accomplishment->CancelMessage);
					$frm_fp_units_accomplishment->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_fp_units_accomplishment->Row_Updated($rsold, $rsnew);
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
