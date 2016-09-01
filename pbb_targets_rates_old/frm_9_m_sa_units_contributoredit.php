<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn8.php" ?>
<?php include_once "frm_9_m_sa_units_contributorinfo.php" ?>
<?php include_once "frm_9_m_sa_units_deliveryinfo.php" ?>
<?php include_once "frm_9_m_sa_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE) ?>
<?php

// Create page object
$frm_9_m_sa_units_contributor_edit = new cfrm_9_m_sa_units_contributor_edit();
$Page =& $frm_9_m_sa_units_contributor_edit;

// Page init
$frm_9_m_sa_units_contributor_edit->Page_Init();

// Page main
$frm_9_m_sa_units_contributor_edit->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_9_m_sa_units_contributor_edit = new up_Page("frm_9_m_sa_units_contributor_edit");

// page properties
frm_9_m_sa_units_contributor_edit.PageID = "edit"; // page ID
frm_9_m_sa_units_contributor_edit.FormID = "ffrm_9_m_sa_units_contributoredit"; // form ID
var UP_PAGE_ID = frm_9_m_sa_units_contributor_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
frm_9_m_sa_units_contributor_edit.ValidateForm = function(fobj) {
	up_PostAutoSuggest(fobj);
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = 1;
	for (i=0; i<rowcnt; i++) {
		infix = "";
		elm = fobj.elements["x" + infix + "_unit_delivery_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_units_contributor->unit_delivery_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_focal_person_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_units_contributor->focal_person_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_cu_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_units_contributor->cu_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_unit_contributor_personnel_count"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_units_contributor->unit_contributor_personnel_count->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_cutOffDate_id"];
		if (elm && !up_CheckInteger(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_units_contributor->cutOffDate_id->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_startDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_units_contributor->t_startDate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_t_cutOffDate_fp"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_units_contributor->t_cutOffDate_fp->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_startDate"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_units_contributor->a_startDate->FldErrMsg()) ?>");
		elm = fobj.elements["x" + infix + "_a_cutOffDate_contributor"];
		if (elm && !up_CheckUSDate(elm.value))
			return up_OnError(this, elm, "<?php echo up_JsEncode2($frm_9_m_sa_units_contributor->a_cutOffDate_contributor->FldErrMsg()) ?>");

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
frm_9_m_sa_units_contributor_edit.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_9_m_sa_units_contributor_edit.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_9_m_sa_units_contributor_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_9_m_sa_units_contributor_edit.ValidateRequired = false; // no JavaScript validation
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
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Edit") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_9_m_sa_units_contributor->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_9_m_sa_units_contributor->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_9_m_sa_units_contributor_edit->ShowPageHeader(); ?>
<?php
$frm_9_m_sa_units_contributor_edit->ShowMessage();
?>
<form name="ffrm_9_m_sa_units_contributoredit" id="ffrm_9_m_sa_units_contributoredit" action="<?php echo up_CurrentPage() ?>" method="post" onsubmit="return frm_9_m_sa_units_contributor_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="frm_9_m_sa_units_contributor">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable">
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_id->Visible) { // unit_contributor_id ?>
	<tr id="r_unit_contributor_id"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_id->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_id->CellAttributes() ?>><span id="el_unit_contributor_id">
<div<?php echo $frm_9_m_sa_units_contributor->unit_contributor_id->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_contributor_id->EditValue ?></div>
<input type="hidden" name="x_unit_contributor_id" id="x_unit_contributor_id" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_id->CurrentValue) ?>">
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_delivery_id->Visible) { // unit_delivery_id ?>
	<tr id="r_unit_delivery_id"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_delivery_id->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_delivery_id->CellAttributes() ?>><span id="el_unit_delivery_id">
<?php if ($frm_9_m_sa_units_contributor->unit_delivery_id->getSessionValue() <> "") { ?>
<div<?php echo $frm_9_m_sa_units_contributor->unit_delivery_id->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_contributor->unit_delivery_id->ViewValue ?></div>
<input type="hidden" id="x_unit_delivery_id" name="x_unit_delivery_id" value="<?php echo up_HtmlEncode($frm_9_m_sa_units_contributor->unit_delivery_id->CurrentValue) ?>">
<?php } else { ?>
<input type="text" name="x_unit_delivery_id" id="x_unit_delivery_id" size="30" value="<?php echo $frm_9_m_sa_units_contributor->unit_delivery_id->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_delivery_id->EditAttributes() ?>>
<?php } ?>
</span><?php echo $frm_9_m_sa_units_contributor->unit_delivery_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->focal_person_id->Visible) { // focal_person_id ?>
	<tr id="r_focal_person_id"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->focal_person_id->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->focal_person_id->CellAttributes() ?>><span id="el_focal_person_id">
<input type="text" name="x_focal_person_id" id="x_focal_person_id" size="30" value="<?php echo $frm_9_m_sa_units_contributor->focal_person_id->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->focal_person_id->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->focal_person_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->cu_id->Visible) { // cu_id ?>
	<tr id="r_cu_id"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->cu_id->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->cu_id->CellAttributes() ?>><span id="el_cu_id">
<input type="text" name="x_cu_id" id="x_cu_id" size="30" value="<?php echo $frm_9_m_sa_units_contributor->cu_id->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->cu_id->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->cu_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->cu_short_name->Visible) { // cu_short_name ?>
	<tr id="r_cu_short_name"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->cu_short_name->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->cu_short_name->CellAttributes() ?>><span id="el_cu_short_name">
<input type="text" name="x_cu_short_name" id="x_cu_short_name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->cu_short_name->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->cu_short_name->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->cu_short_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_delivery_name_cu->Visible) { // unit_delivery_name_cu ?>
	<tr id="r_unit_delivery_name_cu"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_delivery_name_cu->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_delivery_name_cu->CellAttributes() ?>><span id="el_unit_delivery_name_cu">
<input type="text" name="x_unit_delivery_name_cu" id="x_unit_delivery_name_cu" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->unit_delivery_name_cu->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_delivery_name_cu->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_delivery_name_cu->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_name->Visible) { // unit_contributor_name ?>
	<tr id="r_unit_contributor_name"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_name->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_name->CellAttributes() ?>><span id="el_unit_contributor_name">
<input type="text" name="x_unit_contributor_name" id="x_unit_contributor_name" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->unit_contributor_name->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_contributor_name->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_name_short->Visible) { // unit_contributor_name_short ?>
	<tr id="r_unit_contributor_name_short"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_name_short->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_name_short->CellAttributes() ?>><span id="el_unit_contributor_name_short">
<input type="text" name="x_unit_contributor_name_short" id="x_unit_contributor_name_short" size="30" maxlength="10" value="<?php echo $frm_9_m_sa_units_contributor->unit_contributor_name_short->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_contributor_name_short->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_name_short->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_personnel_count->Visible) { // unit_contributor_personnel_count ?>
	<tr id="r_unit_contributor_personnel_count"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->CellAttributes() ?>><span id="el_unit_contributor_personnel_count">
<input type="text" name="x_unit_contributor_personnel_count" id="x_unit_contributor_personnel_count" size="30" value="<?php echo $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_mfo_1->Visible) { // unit_contributor_mfo_1 ?>
	<tr id="r_unit_contributor_mfo_1"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->CellAttributes() ?>><span id="el_unit_contributor_mfo_1">
<input type="text" name="x_unit_contributor_mfo_1" id="x_unit_contributor_mfo_1" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_mfo_2->Visible) { // unit_contributor_mfo_2 ?>
	<tr id="r_unit_contributor_mfo_2"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->CellAttributes() ?>><span id="el_unit_contributor_mfo_2">
<input type="text" name="x_unit_contributor_mfo_2" id="x_unit_contributor_mfo_2" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_mfo_3->Visible) { // unit_contributor_mfo_3 ?>
	<tr id="r_unit_contributor_mfo_3"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->CellAttributes() ?>><span id="el_unit_contributor_mfo_3">
<input type="text" name="x_unit_contributor_mfo_3" id="x_unit_contributor_mfo_3" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_mfo_4->Visible) { // unit_contributor_mfo_4 ?>
	<tr id="r_unit_contributor_mfo_4"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->CellAttributes() ?>><span id="el_unit_contributor_mfo_4">
<input type="text" name="x_unit_contributor_mfo_4" id="x_unit_contributor_mfo_4" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_mfo_5->Visible) { // unit_contributor_mfo_5 ?>
	<tr id="r_unit_contributor_mfo_5"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->CellAttributes() ?>><span id="el_unit_contributor_mfo_5">
<input type="text" name="x_unit_contributor_mfo_5" id="x_unit_contributor_mfo_5" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_sto->Visible) { // unit_contributor_sto ?>
	<tr id="r_unit_contributor_sto"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_sto->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_sto->CellAttributes() ?>><span id="el_unit_contributor_sto">
<input type="text" name="x_unit_contributor_sto" id="x_unit_contributor_sto" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->unit_contributor_sto->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_contributor_sto->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_sto->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_gass_ab->Visible) { // unit_contributor_gass_ab ?>
	<tr id="r_unit_contributor_gass_ab"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->CellAttributes() ?>><span id="el_unit_contributor_gass_ab">
<input type="text" name="x_unit_contributor_gass_ab" id="x_unit_contributor_gass_ab" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_gass_cd->Visible) { // unit_contributor_gass_cd ?>
	<tr id="r_unit_contributor_gass_cd"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->CellAttributes() ?>><span id="el_unit_contributor_gass_cd">
<input type="text" name="x_unit_contributor_gass_cd" id="x_unit_contributor_gass_cd" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->unit_contributor_gass->Visible) { // unit_contributor_gass ?>
	<tr id="r_unit_contributor_gass"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass->CellAttributes() ?>><span id="el_unit_contributor_gass">
<input type="text" name="x_unit_contributor_gass" id="x_unit_contributor_gass" size="30" maxlength="1" value="<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->unit_contributor_gass->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->cutOffDate_id->Visible) { // cutOffDate_id ?>
	<tr id="r_cutOffDate_id"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->cutOffDate_id->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->cutOffDate_id->CellAttributes() ?>><span id="el_cutOffDate_id">
<input type="text" name="x_cutOffDate_id" id="x_cutOffDate_id" size="30" value="<?php echo $frm_9_m_sa_units_contributor->cutOffDate_id->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->cutOffDate_id->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->cutOffDate_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->t_startDate->Visible) { // t_startDate ?>
	<tr id="r_t_startDate"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->t_startDate->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->t_startDate->CellAttributes() ?>><span id="el_t_startDate">
<input type="text" name="x_t_startDate" id="x_t_startDate" value="<?php echo $frm_9_m_sa_units_contributor->t_startDate->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->t_startDate->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->t_startDate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->t_cutOffDate_fp->Visible) { // t_cutOffDate_fp ?>
	<tr id="r_t_cutOffDate_fp"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->t_cutOffDate_fp->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->t_cutOffDate_fp->CellAttributes() ?>><span id="el_t_cutOffDate_fp">
<input type="text" name="x_t_cutOffDate_fp" id="x_t_cutOffDate_fp" value="<?php echo $frm_9_m_sa_units_contributor->t_cutOffDate_fp->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->t_cutOffDate_fp->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->t_cutOffDate_fp->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->t_cutOffDate_remarks->Visible) { // t_cutOffDate_remarks ?>
	<tr id="r_t_cutOffDate_remarks"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->t_cutOffDate_remarks->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->t_cutOffDate_remarks->CellAttributes() ?>><span id="el_t_cutOffDate_remarks">
<input type="text" name="x_t_cutOffDate_remarks" id="x_t_cutOffDate_remarks" size="30" maxlength="255" value="<?php echo $frm_9_m_sa_units_contributor->t_cutOffDate_remarks->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->t_cutOffDate_remarks->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->t_cutOffDate_remarks->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->a_startDate->Visible) { // a_startDate ?>
	<tr id="r_a_startDate"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->a_startDate->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->a_startDate->CellAttributes() ?>><span id="el_a_startDate">
<input type="text" name="x_a_startDate" id="x_a_startDate" value="<?php echo $frm_9_m_sa_units_contributor->a_startDate->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->a_startDate->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->a_startDate->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($frm_9_m_sa_units_contributor->a_cutOffDate_contributor->Visible) { // a_cutOffDate_contributor ?>
	<tr id="r_a_cutOffDate_contributor"<?php echo $frm_9_m_sa_units_contributor->RowAttributes() ?>>
		<td class="upTableHeader"><?php echo $frm_9_m_sa_units_contributor->a_cutOffDate_contributor->FldCaption() ?></td>
		<td<?php echo $frm_9_m_sa_units_contributor->a_cutOffDate_contributor->CellAttributes() ?>><span id="el_a_cutOffDate_contributor">
<input type="text" name="x_a_cutOffDate_contributor" id="x_a_cutOffDate_contributor" value="<?php echo $frm_9_m_sa_units_contributor->a_cutOffDate_contributor->EditValue ?>"<?php echo $frm_9_m_sa_units_contributor->a_cutOffDate_contributor->EditAttributes() ?>>
</span><?php echo $frm_9_m_sa_units_contributor->a_cutOffDate_contributor->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="<?php echo up_BtnCaption($Language->Phrase("EditBtn")) ?>">
</form>
<?php
$frm_9_m_sa_units_contributor_edit->ShowPageFooter();
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
$frm_9_m_sa_units_contributor_edit->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_9_m_sa_units_contributor_edit {

	// Page ID
	var $PageID = 'edit';

	// Table name
	var $TableName = 'frm_9_m_sa_units_contributor';

	// Page object name
	var $PageObjName = 'frm_9_m_sa_units_contributor_edit';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_9_m_sa_units_contributor;
		if ($frm_9_m_sa_units_contributor->UseTokenInUrl) $PageUrl .= "t=" . $frm_9_m_sa_units_contributor->TableVar . "&"; // Add page token
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
		global $objForm, $frm_9_m_sa_units_contributor;
		if ($frm_9_m_sa_units_contributor->UseTokenInUrl) {
			if ($objForm)
				return ($frm_9_m_sa_units_contributor->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_9_m_sa_units_contributor->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_9_m_sa_units_contributor_edit() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_9_m_sa_units_contributor)
		if (!isset($GLOBALS["frm_9_m_sa_units_contributor"])) {
			$GLOBALS["frm_9_m_sa_units_contributor"] = new cfrm_9_m_sa_units_contributor();
			$GLOBALS["Table"] =& $GLOBALS["frm_9_m_sa_units_contributor"];
		}

		// Table object (frm_9_m_sa_units_delivery)
		if (!isset($GLOBALS['frm_9_m_sa_units_delivery'])) $GLOBALS['frm_9_m_sa_units_delivery'] = new cfrm_9_m_sa_units_delivery();

		// Table object (frm_9_m_sa_users)
		if (!isset($GLOBALS['frm_9_m_sa_users'])) $GLOBALS['frm_9_m_sa_users'] = new cfrm_9_m_sa_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_9_m_sa_units_contributor', TRUE);

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
		global $frm_9_m_sa_units_contributor;

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
			$this->Page_Terminate("frm_9_m_sa_units_contributorlist.php");
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
	var $DbMasterFilter;
	var $DbDetailFilter;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $frm_9_m_sa_units_contributor;

		// Load key from QueryString
		if (@$_GET["unit_contributor_id"] <> "")
			$frm_9_m_sa_units_contributor->unit_contributor_id->setQueryStringValue($_GET["unit_contributor_id"]);

		// Set up master detail parameters
		$this->SetUpMasterParms();
		if (@$_POST["a_edit"] <> "") {
			$frm_9_m_sa_units_contributor->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate form
			if (!$this->ValidateForm()) {
				$frm_9_m_sa_units_contributor->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$frm_9_m_sa_units_contributor->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		} else {
			$frm_9_m_sa_units_contributor->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($frm_9_m_sa_units_contributor->unit_contributor_id->CurrentValue == "")
			$this->Page_Terminate("frm_9_m_sa_units_contributorlist.php"); // Invalid key, return to list
		switch ($frm_9_m_sa_units_contributor->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("frm_9_m_sa_units_contributorlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$frm_9_m_sa_units_contributor->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $frm_9_m_sa_units_contributor->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$frm_9_m_sa_units_contributor->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$frm_9_m_sa_units_contributor->RowType = UP_ROWTYPE_EDIT; // Render as Edit
		$frm_9_m_sa_units_contributor->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $frm_9_m_sa_units_contributor;

		// Get upload data
		$index = $objForm->Index; // Save form index
		$objForm->Index = 0;
		$confirmPage = (strval($objForm->GetValue("a_confirm")) <> "");
		$objForm->Index = $index; // Restore form index
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $frm_9_m_sa_units_contributor;
		if (!$frm_9_m_sa_units_contributor->unit_contributor_id->FldIsDetailKey)
			$frm_9_m_sa_units_contributor->unit_contributor_id->setFormValue($objForm->GetValue("x_unit_contributor_id"));
		if (!$frm_9_m_sa_units_contributor->unit_delivery_id->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_delivery_id->setFormValue($objForm->GetValue("x_unit_delivery_id"));
		}
		if (!$frm_9_m_sa_units_contributor->focal_person_id->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->focal_person_id->setFormValue($objForm->GetValue("x_focal_person_id"));
		}
		if (!$frm_9_m_sa_units_contributor->cu_id->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->cu_id->setFormValue($objForm->GetValue("x_cu_id"));
		}
		if (!$frm_9_m_sa_units_contributor->cu_short_name->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->cu_short_name->setFormValue($objForm->GetValue("x_cu_short_name"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_delivery_name_cu->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_delivery_name_cu->setFormValue($objForm->GetValue("x_unit_delivery_name_cu"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_contributor_name->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_contributor_name->setFormValue($objForm->GetValue("x_unit_contributor_name"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_contributor_name_short->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->setFormValue($objForm->GetValue("x_unit_contributor_name_short"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->setFormValue($objForm->GetValue("x_unit_contributor_personnel_count"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->setFormValue($objForm->GetValue("x_unit_contributor_mfo_1"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->setFormValue($objForm->GetValue("x_unit_contributor_mfo_2"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->setFormValue($objForm->GetValue("x_unit_contributor_mfo_3"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->setFormValue($objForm->GetValue("x_unit_contributor_mfo_4"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->setFormValue($objForm->GetValue("x_unit_contributor_mfo_5"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_contributor_sto->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_contributor_sto->setFormValue($objForm->GetValue("x_unit_contributor_sto"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->setFormValue($objForm->GetValue("x_unit_contributor_gass_ab"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->setFormValue($objForm->GetValue("x_unit_contributor_gass_cd"));
		}
		if (!$frm_9_m_sa_units_contributor->unit_contributor_gass->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->unit_contributor_gass->setFormValue($objForm->GetValue("x_unit_contributor_gass"));
		}
		if (!$frm_9_m_sa_units_contributor->cutOffDate_id->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->cutOffDate_id->setFormValue($objForm->GetValue("x_cutOffDate_id"));
		}
		if (!$frm_9_m_sa_units_contributor->t_startDate->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->t_startDate->setFormValue($objForm->GetValue("x_t_startDate"));
			$frm_9_m_sa_units_contributor->t_startDate->CurrentValue = up_UnFormatDateTime($frm_9_m_sa_units_contributor->t_startDate->CurrentValue, 6);
		}
		if (!$frm_9_m_sa_units_contributor->t_cutOffDate_fp->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->t_cutOffDate_fp->setFormValue($objForm->GetValue("x_t_cutOffDate_fp"));
			$frm_9_m_sa_units_contributor->t_cutOffDate_fp->CurrentValue = up_UnFormatDateTime($frm_9_m_sa_units_contributor->t_cutOffDate_fp->CurrentValue, 6);
		}
		if (!$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->setFormValue($objForm->GetValue("x_t_cutOffDate_remarks"));
		}
		if (!$frm_9_m_sa_units_contributor->a_startDate->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->a_startDate->setFormValue($objForm->GetValue("x_a_startDate"));
			$frm_9_m_sa_units_contributor->a_startDate->CurrentValue = up_UnFormatDateTime($frm_9_m_sa_units_contributor->a_startDate->CurrentValue, 6);
		}
		if (!$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->FldIsDetailKey) {
			$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->setFormValue($objForm->GetValue("x_a_cutOffDate_contributor"));
			$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->CurrentValue = up_UnFormatDateTime($frm_9_m_sa_units_contributor->a_cutOffDate_contributor->CurrentValue, 6);
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm, $frm_9_m_sa_units_contributor;
		$this->LoadRow();
		$frm_9_m_sa_units_contributor->unit_contributor_id->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_id->FormValue;
		$frm_9_m_sa_units_contributor->unit_delivery_id->CurrentValue = $frm_9_m_sa_units_contributor->unit_delivery_id->FormValue;
		$frm_9_m_sa_units_contributor->focal_person_id->CurrentValue = $frm_9_m_sa_units_contributor->focal_person_id->FormValue;
		$frm_9_m_sa_units_contributor->cu_id->CurrentValue = $frm_9_m_sa_units_contributor->cu_id->FormValue;
		$frm_9_m_sa_units_contributor->cu_short_name->CurrentValue = $frm_9_m_sa_units_contributor->cu_short_name->FormValue;
		$frm_9_m_sa_units_contributor->unit_delivery_name_cu->CurrentValue = $frm_9_m_sa_units_contributor->unit_delivery_name_cu->FormValue;
		$frm_9_m_sa_units_contributor->unit_contributor_name->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_name->FormValue;
		$frm_9_m_sa_units_contributor->unit_contributor_name_short->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_name_short->FormValue;
		$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->FormValue;
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->FormValue;
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->FormValue;
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->FormValue;
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->FormValue;
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->FormValue;
		$frm_9_m_sa_units_contributor->unit_contributor_sto->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_sto->FormValue;
		$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->FormValue;
		$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->FormValue;
		$frm_9_m_sa_units_contributor->unit_contributor_gass->CurrentValue = $frm_9_m_sa_units_contributor->unit_contributor_gass->FormValue;
		$frm_9_m_sa_units_contributor->cutOffDate_id->CurrentValue = $frm_9_m_sa_units_contributor->cutOffDate_id->FormValue;
		$frm_9_m_sa_units_contributor->t_startDate->CurrentValue = $frm_9_m_sa_units_contributor->t_startDate->FormValue;
		$frm_9_m_sa_units_contributor->t_startDate->CurrentValue = up_UnFormatDateTime($frm_9_m_sa_units_contributor->t_startDate->CurrentValue, 6);
		$frm_9_m_sa_units_contributor->t_cutOffDate_fp->CurrentValue = $frm_9_m_sa_units_contributor->t_cutOffDate_fp->FormValue;
		$frm_9_m_sa_units_contributor->t_cutOffDate_fp->CurrentValue = up_UnFormatDateTime($frm_9_m_sa_units_contributor->t_cutOffDate_fp->CurrentValue, 6);
		$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->CurrentValue = $frm_9_m_sa_units_contributor->t_cutOffDate_remarks->FormValue;
		$frm_9_m_sa_units_contributor->a_startDate->CurrentValue = $frm_9_m_sa_units_contributor->a_startDate->FormValue;
		$frm_9_m_sa_units_contributor->a_startDate->CurrentValue = up_UnFormatDateTime($frm_9_m_sa_units_contributor->a_startDate->CurrentValue, 6);
		$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->CurrentValue = $frm_9_m_sa_units_contributor->a_cutOffDate_contributor->FormValue;
		$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->CurrentValue = up_UnFormatDateTime($frm_9_m_sa_units_contributor->a_cutOffDate_contributor->CurrentValue, 6);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $frm_9_m_sa_units_contributor;
		$sFilter = $frm_9_m_sa_units_contributor->KeyFilter();

		// Call Row Selecting event
		$frm_9_m_sa_units_contributor->Row_Selecting($sFilter);

		// Load SQL based on filter
		$frm_9_m_sa_units_contributor->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_units_contributor->SQL();
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
		global $conn, $frm_9_m_sa_units_contributor;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row =& $rs->fields;
		$frm_9_m_sa_units_contributor->Row_Selected($row);
		$frm_9_m_sa_units_contributor->unit_contributor_id->setDbValue($rs->fields('unit_contributor_id'));
		$frm_9_m_sa_units_contributor->unit_delivery_id->setDbValue($rs->fields('unit_delivery_id'));
		$frm_9_m_sa_units_contributor->focal_person_id->setDbValue($rs->fields('focal_person_id'));
		$frm_9_m_sa_units_contributor->cu_id->setDbValue($rs->fields('cu_id'));
		$frm_9_m_sa_units_contributor->cu_short_name->setDbValue($rs->fields('cu_short_name'));
		$frm_9_m_sa_units_contributor->unit_delivery_name_cu->setDbValue($rs->fields('unit_delivery_name_cu'));
		$frm_9_m_sa_units_contributor->unit_contributor_name->setDbValue($rs->fields('unit_contributor_name'));
		$frm_9_m_sa_units_contributor->unit_contributor_name_short->setDbValue($rs->fields('unit_contributor_name_short'));
		$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->setDbValue($rs->fields('unit_contributor_personnel_count'));
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->setDbValue($rs->fields('unit_contributor_mfo_1'));
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->setDbValue($rs->fields('unit_contributor_mfo_2'));
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->setDbValue($rs->fields('unit_contributor_mfo_3'));
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->setDbValue($rs->fields('unit_contributor_mfo_4'));
		$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->setDbValue($rs->fields('unit_contributor_mfo_5'));
		$frm_9_m_sa_units_contributor->unit_contributor_sto->setDbValue($rs->fields('unit_contributor_sto'));
		$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->setDbValue($rs->fields('unit_contributor_gass_ab'));
		$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->setDbValue($rs->fields('unit_contributor_gass_cd'));
		$frm_9_m_sa_units_contributor->unit_contributor_gass->setDbValue($rs->fields('unit_contributor_gass'));
		$frm_9_m_sa_units_contributor->cutOffDate_id->setDbValue($rs->fields('cutOffDate_id'));
		$frm_9_m_sa_units_contributor->t_startDate->setDbValue($rs->fields('t_startDate'));
		$frm_9_m_sa_units_contributor->t_cutOffDate_fp->setDbValue($rs->fields('t_cutOffDate_fp'));
		$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->setDbValue($rs->fields('t_cutOffDate_remarks'));
		$frm_9_m_sa_units_contributor->a_startDate->setDbValue($rs->fields('a_startDate'));
		$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->setDbValue($rs->fields('a_cutOffDate_contributor'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language, $frm_9_m_sa_units_contributor;

		// Initialize URLs
		// Call Row_Rendering event

		$frm_9_m_sa_units_contributor->Row_Rendering();

		// Common render codes for all row types
		// unit_contributor_id
		// unit_delivery_id
		// focal_person_id
		// cu_id
		// cu_short_name
		// unit_delivery_name_cu
		// unit_contributor_name
		// unit_contributor_name_short
		// unit_contributor_personnel_count
		// unit_contributor_mfo_1
		// unit_contributor_mfo_2
		// unit_contributor_mfo_3
		// unit_contributor_mfo_4
		// unit_contributor_mfo_5
		// unit_contributor_sto
		// unit_contributor_gass_ab
		// unit_contributor_gass_cd
		// unit_contributor_gass
		// cutOffDate_id
		// t_startDate
		// t_cutOffDate_fp
		// t_cutOffDate_remarks
		// a_startDate
		// a_cutOffDate_contributor

		if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_VIEW) { // View row

			// unit_contributor_id
			$frm_9_m_sa_units_contributor->unit_contributor_id->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_id->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_id->ViewCustomAttributes = "";

			// unit_delivery_id
			$frm_9_m_sa_units_contributor->unit_delivery_id->ViewValue = $frm_9_m_sa_units_contributor->unit_delivery_id->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_delivery_id->ViewCustomAttributes = "";

			// focal_person_id
			$frm_9_m_sa_units_contributor->focal_person_id->ViewValue = $frm_9_m_sa_units_contributor->focal_person_id->CurrentValue;
			$frm_9_m_sa_units_contributor->focal_person_id->ViewCustomAttributes = "";

			// cu_id
			$frm_9_m_sa_units_contributor->cu_id->ViewValue = $frm_9_m_sa_units_contributor->cu_id->CurrentValue;
			$frm_9_m_sa_units_contributor->cu_id->ViewCustomAttributes = "";

			// cu_short_name
			$frm_9_m_sa_units_contributor->cu_short_name->ViewValue = $frm_9_m_sa_units_contributor->cu_short_name->CurrentValue;
			$frm_9_m_sa_units_contributor->cu_short_name->ViewCustomAttributes = "";

			// unit_delivery_name_cu
			$frm_9_m_sa_units_contributor->unit_delivery_name_cu->ViewValue = $frm_9_m_sa_units_contributor->unit_delivery_name_cu->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_delivery_name_cu->ViewCustomAttributes = "";

			// unit_contributor_name
			$frm_9_m_sa_units_contributor->unit_contributor_name->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_name->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_name->ViewCustomAttributes = "";

			// unit_contributor_name_short
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_name_short->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->ViewCustomAttributes = "";

			// unit_contributor_personnel_count
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->ViewCustomAttributes = "";

			// unit_contributor_mfo_1
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->ViewCustomAttributes = "";

			// unit_contributor_mfo_2
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->ViewCustomAttributes = "";

			// unit_contributor_mfo_3
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->ViewCustomAttributes = "";

			// unit_contributor_mfo_4
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->ViewCustomAttributes = "";

			// unit_contributor_mfo_5
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->ViewCustomAttributes = "";

			// unit_contributor_sto
			$frm_9_m_sa_units_contributor->unit_contributor_sto->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_sto->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_sto->ViewCustomAttributes = "";

			// unit_contributor_gass_ab
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->ViewCustomAttributes = "";

			// unit_contributor_gass_cd
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->ViewCustomAttributes = "";

			// unit_contributor_gass
			$frm_9_m_sa_units_contributor->unit_contributor_gass->ViewValue = $frm_9_m_sa_units_contributor->unit_contributor_gass->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_gass->ViewCustomAttributes = "";

			// cutOffDate_id
			$frm_9_m_sa_units_contributor->cutOffDate_id->ViewValue = $frm_9_m_sa_units_contributor->cutOffDate_id->CurrentValue;
			$frm_9_m_sa_units_contributor->cutOffDate_id->ViewCustomAttributes = "";

			// t_startDate
			$frm_9_m_sa_units_contributor->t_startDate->ViewValue = $frm_9_m_sa_units_contributor->t_startDate->CurrentValue;
			$frm_9_m_sa_units_contributor->t_startDate->ViewValue = up_FormatDateTime($frm_9_m_sa_units_contributor->t_startDate->ViewValue, 6);
			$frm_9_m_sa_units_contributor->t_startDate->ViewCustomAttributes = "";

			// t_cutOffDate_fp
			$frm_9_m_sa_units_contributor->t_cutOffDate_fp->ViewValue = $frm_9_m_sa_units_contributor->t_cutOffDate_fp->CurrentValue;
			$frm_9_m_sa_units_contributor->t_cutOffDate_fp->ViewValue = up_FormatDateTime($frm_9_m_sa_units_contributor->t_cutOffDate_fp->ViewValue, 6);
			$frm_9_m_sa_units_contributor->t_cutOffDate_fp->ViewCustomAttributes = "";

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->ViewValue = $frm_9_m_sa_units_contributor->t_cutOffDate_remarks->CurrentValue;
			$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->ViewCustomAttributes = "";

			// a_startDate
			$frm_9_m_sa_units_contributor->a_startDate->ViewValue = $frm_9_m_sa_units_contributor->a_startDate->CurrentValue;
			$frm_9_m_sa_units_contributor->a_startDate->ViewValue = up_FormatDateTime($frm_9_m_sa_units_contributor->a_startDate->ViewValue, 6);
			$frm_9_m_sa_units_contributor->a_startDate->ViewCustomAttributes = "";

			// a_cutOffDate_contributor
			$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->ViewValue = $frm_9_m_sa_units_contributor->a_cutOffDate_contributor->CurrentValue;
			$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->ViewValue = up_FormatDateTime($frm_9_m_sa_units_contributor->a_cutOffDate_contributor->ViewValue, 6);
			$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->ViewCustomAttributes = "";

			// unit_contributor_id
			$frm_9_m_sa_units_contributor->unit_contributor_id->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_id->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_id->TooltipValue = "";

			// unit_delivery_id
			$frm_9_m_sa_units_contributor->unit_delivery_id->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_delivery_id->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_delivery_id->TooltipValue = "";

			// focal_person_id
			$frm_9_m_sa_units_contributor->focal_person_id->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->focal_person_id->HrefValue = "";
			$frm_9_m_sa_units_contributor->focal_person_id->TooltipValue = "";

			// cu_id
			$frm_9_m_sa_units_contributor->cu_id->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->cu_id->HrefValue = "";
			$frm_9_m_sa_units_contributor->cu_id->TooltipValue = "";

			// cu_short_name
			$frm_9_m_sa_units_contributor->cu_short_name->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->cu_short_name->HrefValue = "";
			$frm_9_m_sa_units_contributor->cu_short_name->TooltipValue = "";

			// unit_delivery_name_cu
			$frm_9_m_sa_units_contributor->unit_delivery_name_cu->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_delivery_name_cu->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_delivery_name_cu->TooltipValue = "";

			// unit_contributor_name
			$frm_9_m_sa_units_contributor->unit_contributor_name->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_name->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_name->TooltipValue = "";

			// unit_contributor_name_short
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->TooltipValue = "";

			// unit_contributor_personnel_count
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->TooltipValue = "";

			// unit_contributor_mfo_1
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->TooltipValue = "";

			// unit_contributor_mfo_2
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->TooltipValue = "";

			// unit_contributor_mfo_3
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->TooltipValue = "";

			// unit_contributor_mfo_4
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->TooltipValue = "";

			// unit_contributor_mfo_5
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->TooltipValue = "";

			// unit_contributor_sto
			$frm_9_m_sa_units_contributor->unit_contributor_sto->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_sto->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_sto->TooltipValue = "";

			// unit_contributor_gass_ab
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->TooltipValue = "";

			// unit_contributor_gass_cd
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->TooltipValue = "";

			// unit_contributor_gass
			$frm_9_m_sa_units_contributor->unit_contributor_gass->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass->HrefValue = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass->TooltipValue = "";

			// cutOffDate_id
			$frm_9_m_sa_units_contributor->cutOffDate_id->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->cutOffDate_id->HrefValue = "";
			$frm_9_m_sa_units_contributor->cutOffDate_id->TooltipValue = "";

			// t_startDate
			$frm_9_m_sa_units_contributor->t_startDate->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->t_startDate->HrefValue = "";
			$frm_9_m_sa_units_contributor->t_startDate->TooltipValue = "";

			// t_cutOffDate_fp
			$frm_9_m_sa_units_contributor->t_cutOffDate_fp->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->t_cutOffDate_fp->HrefValue = "";
			$frm_9_m_sa_units_contributor->t_cutOffDate_fp->TooltipValue = "";

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->HrefValue = "";
			$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->TooltipValue = "";

			// a_startDate
			$frm_9_m_sa_units_contributor->a_startDate->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->a_startDate->HrefValue = "";
			$frm_9_m_sa_units_contributor->a_startDate->TooltipValue = "";

			// a_cutOffDate_contributor
			$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->LinkCustomAttributes = "";
			$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->HrefValue = "";
			$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->TooltipValue = "";
		} elseif ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT) { // Edit row

			// unit_contributor_id
			$frm_9_m_sa_units_contributor->unit_contributor_id->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_id->EditValue = $frm_9_m_sa_units_contributor->unit_contributor_id->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_contributor_id->ViewCustomAttributes = "";

			// unit_delivery_id
			$frm_9_m_sa_units_contributor->unit_delivery_id->EditCustomAttributes = "";
			if ($frm_9_m_sa_units_contributor->unit_delivery_id->getSessionValue() <> "") {
				$frm_9_m_sa_units_contributor->unit_delivery_id->CurrentValue = $frm_9_m_sa_units_contributor->unit_delivery_id->getSessionValue();
			$frm_9_m_sa_units_contributor->unit_delivery_id->ViewValue = $frm_9_m_sa_units_contributor->unit_delivery_id->CurrentValue;
			$frm_9_m_sa_units_contributor->unit_delivery_id->ViewCustomAttributes = "";
			} else {
			$frm_9_m_sa_units_contributor->unit_delivery_id->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_delivery_id->CurrentValue);
			}

			// focal_person_id
			$frm_9_m_sa_units_contributor->focal_person_id->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->focal_person_id->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->focal_person_id->CurrentValue);

			// cu_id
			$frm_9_m_sa_units_contributor->cu_id->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->cu_id->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->cu_id->CurrentValue);

			// cu_short_name
			$frm_9_m_sa_units_contributor->cu_short_name->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->cu_short_name->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->cu_short_name->CurrentValue);

			// unit_delivery_name_cu
			$frm_9_m_sa_units_contributor->unit_delivery_name_cu->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_delivery_name_cu->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_delivery_name_cu->CurrentValue);

			// unit_contributor_name
			$frm_9_m_sa_units_contributor->unit_contributor_name->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_name->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_name->CurrentValue);

			// unit_contributor_name_short
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_name_short->CurrentValue);

			// unit_contributor_personnel_count
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_personnel_count->CurrentValue);

			// unit_contributor_mfo_1
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_mfo_1->CurrentValue);

			// unit_contributor_mfo_2
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_mfo_2->CurrentValue);

			// unit_contributor_mfo_3
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_mfo_3->CurrentValue);

			// unit_contributor_mfo_4
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_mfo_4->CurrentValue);

			// unit_contributor_mfo_5
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_mfo_5->CurrentValue);

			// unit_contributor_sto
			$frm_9_m_sa_units_contributor->unit_contributor_sto->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_sto->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_sto->CurrentValue);

			// unit_contributor_gass_ab
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_gass_ab->CurrentValue);

			// unit_contributor_gass_cd
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_gass_cd->CurrentValue);

			// unit_contributor_gass
			$frm_9_m_sa_units_contributor->unit_contributor_gass->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->unit_contributor_gass->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->unit_contributor_gass->CurrentValue);

			// cutOffDate_id
			$frm_9_m_sa_units_contributor->cutOffDate_id->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->cutOffDate_id->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->cutOffDate_id->CurrentValue);

			// t_startDate
			$frm_9_m_sa_units_contributor->t_startDate->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->t_startDate->EditValue = up_HtmlEncode(up_FormatDateTime($frm_9_m_sa_units_contributor->t_startDate->CurrentValue, 6));

			// t_cutOffDate_fp
			$frm_9_m_sa_units_contributor->t_cutOffDate_fp->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->t_cutOffDate_fp->EditValue = up_HtmlEncode(up_FormatDateTime($frm_9_m_sa_units_contributor->t_cutOffDate_fp->CurrentValue, 6));

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->EditValue = up_HtmlEncode($frm_9_m_sa_units_contributor->t_cutOffDate_remarks->CurrentValue);

			// a_startDate
			$frm_9_m_sa_units_contributor->a_startDate->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->a_startDate->EditValue = up_HtmlEncode(up_FormatDateTime($frm_9_m_sa_units_contributor->a_startDate->CurrentValue, 6));

			// a_cutOffDate_contributor
			$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->EditCustomAttributes = "";
			$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->EditValue = up_HtmlEncode(up_FormatDateTime($frm_9_m_sa_units_contributor->a_cutOffDate_contributor->CurrentValue, 6));

			// Edit refer script
			// unit_contributor_id

			$frm_9_m_sa_units_contributor->unit_contributor_id->HrefValue = "";

			// unit_delivery_id
			$frm_9_m_sa_units_contributor->unit_delivery_id->HrefValue = "";

			// focal_person_id
			$frm_9_m_sa_units_contributor->focal_person_id->HrefValue = "";

			// cu_id
			$frm_9_m_sa_units_contributor->cu_id->HrefValue = "";

			// cu_short_name
			$frm_9_m_sa_units_contributor->cu_short_name->HrefValue = "";

			// unit_delivery_name_cu
			$frm_9_m_sa_units_contributor->unit_delivery_name_cu->HrefValue = "";

			// unit_contributor_name
			$frm_9_m_sa_units_contributor->unit_contributor_name->HrefValue = "";

			// unit_contributor_name_short
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->HrefValue = "";

			// unit_contributor_personnel_count
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->HrefValue = "";

			// unit_contributor_mfo_1
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->HrefValue = "";

			// unit_contributor_mfo_2
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->HrefValue = "";

			// unit_contributor_mfo_3
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->HrefValue = "";

			// unit_contributor_mfo_4
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->HrefValue = "";

			// unit_contributor_mfo_5
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->HrefValue = "";

			// unit_contributor_sto
			$frm_9_m_sa_units_contributor->unit_contributor_sto->HrefValue = "";

			// unit_contributor_gass_ab
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->HrefValue = "";

			// unit_contributor_gass_cd
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->HrefValue = "";

			// unit_contributor_gass
			$frm_9_m_sa_units_contributor->unit_contributor_gass->HrefValue = "";

			// cutOffDate_id
			$frm_9_m_sa_units_contributor->cutOffDate_id->HrefValue = "";

			// t_startDate
			$frm_9_m_sa_units_contributor->t_startDate->HrefValue = "";

			// t_cutOffDate_fp
			$frm_9_m_sa_units_contributor->t_cutOffDate_fp->HrefValue = "";

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->HrefValue = "";

			// a_startDate
			$frm_9_m_sa_units_contributor->a_startDate->HrefValue = "";

			// a_cutOffDate_contributor
			$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->HrefValue = "";
		}
		if ($frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_ADD ||
			$frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_EDIT ||
			$frm_9_m_sa_units_contributor->RowType == UP_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$frm_9_m_sa_units_contributor->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($frm_9_m_sa_units_contributor->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_9_m_sa_units_contributor->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError, $frm_9_m_sa_units_contributor;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!UP_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!up_CheckInteger($frm_9_m_sa_units_contributor->unit_delivery_id->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_units_contributor->unit_delivery_id->FldErrMsg());
		}
		if (!up_CheckInteger($frm_9_m_sa_units_contributor->focal_person_id->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_units_contributor->focal_person_id->FldErrMsg());
		}
		if (!up_CheckInteger($frm_9_m_sa_units_contributor->cu_id->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_units_contributor->cu_id->FldErrMsg());
		}
		if (!up_CheckInteger($frm_9_m_sa_units_contributor->unit_contributor_personnel_count->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->FldErrMsg());
		}
		if (!up_CheckInteger($frm_9_m_sa_units_contributor->cutOffDate_id->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_units_contributor->cutOffDate_id->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_9_m_sa_units_contributor->t_startDate->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_units_contributor->t_startDate->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_9_m_sa_units_contributor->t_cutOffDate_fp->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_units_contributor->t_cutOffDate_fp->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_9_m_sa_units_contributor->a_startDate->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_units_contributor->a_startDate->FldErrMsg());
		}
		if (!up_CheckUSDate($frm_9_m_sa_units_contributor->a_cutOffDate_contributor->FormValue)) {
			up_AddMessage($gsFormError, $frm_9_m_sa_units_contributor->a_cutOffDate_contributor->FldErrMsg());
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
		global $conn, $Security, $Language, $frm_9_m_sa_units_contributor;
		$sFilter = $frm_9_m_sa_units_contributor->KeyFilter();
		$frm_9_m_sa_units_contributor->CurrentFilter = $sFilter;
		$sSql = $frm_9_m_sa_units_contributor->SQL();
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

			// unit_delivery_id
			$frm_9_m_sa_units_contributor->unit_delivery_id->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_delivery_id->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_delivery_id->ReadOnly);

			// focal_person_id
			$frm_9_m_sa_units_contributor->focal_person_id->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->focal_person_id->CurrentValue, NULL, $frm_9_m_sa_units_contributor->focal_person_id->ReadOnly);

			// cu_id
			$frm_9_m_sa_units_contributor->cu_id->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->cu_id->CurrentValue, NULL, $frm_9_m_sa_units_contributor->cu_id->ReadOnly);

			// cu_short_name
			$frm_9_m_sa_units_contributor->cu_short_name->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->cu_short_name->CurrentValue, NULL, $frm_9_m_sa_units_contributor->cu_short_name->ReadOnly);

			// unit_delivery_name_cu
			$frm_9_m_sa_units_contributor->unit_delivery_name_cu->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_delivery_name_cu->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_delivery_name_cu->ReadOnly);

			// unit_contributor_name
			$frm_9_m_sa_units_contributor->unit_contributor_name->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_contributor_name->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_contributor_name->ReadOnly);

			// unit_contributor_name_short
			$frm_9_m_sa_units_contributor->unit_contributor_name_short->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_contributor_name_short->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_contributor_name_short->ReadOnly);

			// unit_contributor_personnel_count
			$frm_9_m_sa_units_contributor->unit_contributor_personnel_count->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_contributor_personnel_count->ReadOnly);

			// unit_contributor_mfo_1
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_1->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_contributor_mfo_1->ReadOnly);

			// unit_contributor_mfo_2
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_2->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_contributor_mfo_2->ReadOnly);

			// unit_contributor_mfo_3
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_3->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_contributor_mfo_3->ReadOnly);

			// unit_contributor_mfo_4
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_4->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_contributor_mfo_4->ReadOnly);

			// unit_contributor_mfo_5
			$frm_9_m_sa_units_contributor->unit_contributor_mfo_5->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_contributor_mfo_5->ReadOnly);

			// unit_contributor_sto
			$frm_9_m_sa_units_contributor->unit_contributor_sto->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_contributor_sto->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_contributor_sto->ReadOnly);

			// unit_contributor_gass_ab
			$frm_9_m_sa_units_contributor->unit_contributor_gass_ab->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_contributor_gass_ab->ReadOnly);

			// unit_contributor_gass_cd
			$frm_9_m_sa_units_contributor->unit_contributor_gass_cd->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_contributor_gass_cd->ReadOnly);

			// unit_contributor_gass
			$frm_9_m_sa_units_contributor->unit_contributor_gass->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->unit_contributor_gass->CurrentValue, NULL, $frm_9_m_sa_units_contributor->unit_contributor_gass->ReadOnly);

			// cutOffDate_id
			$frm_9_m_sa_units_contributor->cutOffDate_id->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->cutOffDate_id->CurrentValue, NULL, $frm_9_m_sa_units_contributor->cutOffDate_id->ReadOnly);

			// t_startDate
			$frm_9_m_sa_units_contributor->t_startDate->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_9_m_sa_units_contributor->t_startDate->CurrentValue, 6), NULL, $frm_9_m_sa_units_contributor->t_startDate->ReadOnly);

			// t_cutOffDate_fp
			$frm_9_m_sa_units_contributor->t_cutOffDate_fp->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_9_m_sa_units_contributor->t_cutOffDate_fp->CurrentValue, 6), NULL, $frm_9_m_sa_units_contributor->t_cutOffDate_fp->ReadOnly);

			// t_cutOffDate_remarks
			$frm_9_m_sa_units_contributor->t_cutOffDate_remarks->SetDbValueDef($rsnew, $frm_9_m_sa_units_contributor->t_cutOffDate_remarks->CurrentValue, NULL, $frm_9_m_sa_units_contributor->t_cutOffDate_remarks->ReadOnly);

			// a_startDate
			$frm_9_m_sa_units_contributor->a_startDate->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_9_m_sa_units_contributor->a_startDate->CurrentValue, 6), NULL, $frm_9_m_sa_units_contributor->a_startDate->ReadOnly);

			// a_cutOffDate_contributor
			$frm_9_m_sa_units_contributor->a_cutOffDate_contributor->SetDbValueDef($rsnew, up_UnFormatDateTime($frm_9_m_sa_units_contributor->a_cutOffDate_contributor->CurrentValue, 6), NULL, $frm_9_m_sa_units_contributor->a_cutOffDate_contributor->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $frm_9_m_sa_units_contributor->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'up_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $conn->Execute($frm_9_m_sa_units_contributor->UpdateSQL($rsnew));
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
			} else {
				if ($frm_9_m_sa_units_contributor->CancelMessage <> "") {
					$this->setFailureMessage($frm_9_m_sa_units_contributor->CancelMessage);
					$frm_9_m_sa_units_contributor->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$frm_9_m_sa_units_contributor->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		global $frm_9_m_sa_units_contributor;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[UP_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[UP_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "frm_9_m_sa_units_delivery") {
				$bValidMaster = TRUE;
				if (@$_GET["unit_delivery_id"] <> "") {
					$GLOBALS["frm_9_m_sa_units_delivery"]->unit_delivery_id->setQueryStringValue($_GET["unit_delivery_id"]);
					$frm_9_m_sa_units_contributor->unit_delivery_id->setQueryStringValue($GLOBALS["frm_9_m_sa_units_delivery"]->unit_delivery_id->QueryStringValue);
					$frm_9_m_sa_units_contributor->unit_delivery_id->setSessionValue($frm_9_m_sa_units_contributor->unit_delivery_id->QueryStringValue);
					if (!is_numeric($GLOBALS["frm_9_m_sa_units_delivery"]->unit_delivery_id->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$frm_9_m_sa_units_contributor->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$frm_9_m_sa_units_contributor->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "frm_9_m_sa_units_delivery") {
				if ($frm_9_m_sa_units_contributor->unit_delivery_id->QueryStringValue == "") $frm_9_m_sa_units_contributor->unit_delivery_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $frm_9_m_sa_units_contributor->getMasterFilter(); //  Get master filter
		$this->DbDetailFilter = $frm_9_m_sa_units_contributor->getDetailFilter(); // Get detail filter
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
