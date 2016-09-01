<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "upcfg1.php" ?>
<?php include_once "upmysql1.php" ?>
<?php include_once "phpfn1.php" ?>
<?php include_once "frm_fp_rep_ta_form_a_1_iatfinfo.php" ?>
<?php include_once "frm_fp_rep_ta_form_a_1_iatf_headerinfo.php" ?>
<?php include_once "tbl_usersinfo.php" ?>
<?php include_once "userfn1.php" ?>
<?php up_Header(FALSE, 'utf-8') ?>
<?php

// Create page object
$frm_fp_rep_ta_form_a_1_iatf_preview = new cfrm_fp_rep_ta_form_a_1_iatf_preview();
$Page =& $frm_fp_rep_ta_form_a_1_iatf_preview;

// Page init
$frm_fp_rep_ta_form_a_1_iatf_preview->Page_Init();

// Page main
$frm_fp_rep_ta_form_a_1_iatf_preview->Page_Main();
?>
<link href="phpcss/db_pbb_2015.css" rel="stylesheet" type="text/css">
<p class="upbudgetofficeclass upTitle" style="white-space: nowrap;"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo  $frm_fp_rep_ta_form_a_1_iatf->TableCaption() ?>&nbsp;
<?php if ($frm_fp_rep_ta_form_a_1_iatf_preview->TotalRecs > 0) { ?>
(<?php echo $frm_fp_rep_ta_form_a_1_iatf_preview->TotalRecs ?>&nbsp;<?php echo $Language->Phrase("Record") ?>)
<?php } else { ?>
(<?php echo $Language->Phrase("NoRecord") ?>)
<?php } ?>
</p>
<?php $frm_fp_rep_ta_form_a_1_iatf_preview->ShowPageHeader(); ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf_preview->TotalRecs > 0) { ?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table id="upDetailsPreviewTable" name="upDetailsPreviewTable" cellspacing="0" class="upTable upTableSeparate">
	<thead><!-- Table header -->
		<tr class="upTableHeader">
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Responsible Bureaus (1) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // MFOs ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Performance Indicator 1 (2) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 TARGET for Performance Indicator 1 (3) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Performance Indicator 2 (5) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 TARGET for Performance Indicator 2 (6) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Performance Indicator 3 (8) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 TARGET for Performance Indicator 3 (9) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Performance Indicator 4 (11) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 TARGET for Performance Indicator 4 (12) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Performance Indicator 5 (14) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 TARGET for Performance Indicator 5 (15) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Performance Indicator 6 (17) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 TARGET for Performance Indicator 6 (18) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Performance Indicator 7 (20) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 TARGET for Performance Indicator 7 (21) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Performance Indicator 8 (23) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 TARGET for Performance Indicator 8 (24) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Performance Indicator 9 (26) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 TARGET for Performance Indicator 9 (27) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Performance Indicator 10 (29) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 TARGET for Performance Indicator 10 (30) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Performance Indicator 11 (32) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 TARGET for Performance Indicator 11 (33) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // Performance Indicator 12 (35) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 TARGET for Performance Indicator 12 (36) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->FldCaption() ?></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->focal_person_id->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37) ?>
			<td valign="top"><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->FldCaption() ?></td>
<?php } ?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$frm_fp_rep_ta_form_a_1_iatf_preview->RecCount = 0;
while ($frm_fp_rep_ta_form_a_1_iatf_preview->Recordset && !$frm_fp_rep_ta_form_a_1_iatf_preview->Recordset->EOF) {

	// Init row class and style
	$frm_fp_rep_ta_form_a_1_iatf_preview->RecCount++;
	$frm_fp_rep_ta_form_a_1_iatf->CssClass = "";
	$frm_fp_rep_ta_form_a_1_iatf->CssStyle = "";
	$frm_fp_rep_ta_form_a_1_iatf->LoadListRowValues($frm_fp_rep_ta_form_a_1_iatf_preview->Recordset);

	// Render row
	$frm_fp_rep_ta_form_a_1_iatf->RowType = UP_ROWTYPE_PREVIEW; // Preview record
	$frm_fp_rep_ta_form_a_1_iatf->RenderListRow();
?>
	<tr<?php echo $frm_fp_rep_ta_form_a_1_iatf->RowAttributes() ?>>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->Visible) { // Responsible Bureaus (1) ?>
		<!-- Responsible Bureaus (1) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Responsible_Bureaus_28129->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->MFOs->Visible) { // MFOs ?>
		<!-- MFOs -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->MFOs->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->Visible) { // Performance Indicator 1 (2) ?>
		<!-- Performance Indicator 1 (2) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_1_28229->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->Visible) { // FY 2015 TARGET for Performance Indicator 1 (3) ?>
		<!-- FY 2015 TARGET for Performance Indicator 1 (3) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_1_28329->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4) ?>
		<!-- FY 2015 ACCOMPLISHMENT for Performance Indicator 1 (4) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_1_28429->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->Visible) { // Performance Indicator 2 (5) ?>
		<!-- Performance Indicator 2 (5) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_2_28529->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->Visible) { // FY 2015 TARGET for Performance Indicator 2 (6) ?>
		<!-- FY 2015 TARGET for Performance Indicator 2 (6) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_2_28629->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7) ?>
		<!-- FY 2015 ACCOMPLISHMENT for Performance Indicator 2 (7) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_2_28729->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->Visible) { // Performance Indicator 3 (8) ?>
		<!-- Performance Indicator 3 (8) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_3_28829->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->Visible) { // FY 2015 TARGET for Performance Indicator 3 (9) ?>
		<!-- FY 2015 TARGET for Performance Indicator 3 (9) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_3_28929->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10) ?>
		<!-- FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (10) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281029->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->Visible) { // Performance Indicator 4 (11) ?>
		<!-- Performance Indicator 4 (11) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_4_281129->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->Visible) { // FY 2015 TARGET for Performance Indicator 4 (12) ?>
		<!-- FY 2015 TARGET for Performance Indicator 4 (12) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_4_281229->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13) ?>
		<!-- FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (13) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281329->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->Visible) { // Performance Indicator 5 (14) ?>
		<!-- Performance Indicator 5 (14) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_5_281429->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->Visible) { // FY 2015 TARGET for Performance Indicator 5 (15) ?>
		<!-- FY 2015 TARGET for Performance Indicator 5 (15) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_5_281529->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16) ?>
		<!-- FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (16) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281629->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->Visible) { // Performance Indicator 6 (17) ?>
		<!-- Performance Indicator 6 (17) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_6_281729->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->Visible) { // FY 2015 TARGET for Performance Indicator 6 (18) ?>
		<!-- FY 2015 TARGET for Performance Indicator 6 (18) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_6_281829->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19) ?>
		<!-- FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (19) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_281929->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->Visible) { // Performance Indicator 7 (20) ?>
		<!-- Performance Indicator 7 (20) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_7_282029->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->Visible) { // FY 2015 TARGET for Performance Indicator 7 (21) ?>
		<!-- FY 2015 TARGET for Performance Indicator 7 (21) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_7_282129->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22) ?>
		<!-- FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (22) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282229->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->Visible) { // Performance Indicator 8 (23) ?>
		<!-- Performance Indicator 8 (23) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_8_282329->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->Visible) { // FY 2015 TARGET for Performance Indicator 8 (24) ?>
		<!-- FY 2015 TARGET for Performance Indicator 8 (24) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_8_282429->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25) ?>
		<!-- FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (25) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282529->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->Visible) { // Performance Indicator 9 (26) ?>
		<!-- Performance Indicator 9 (26) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_9_282629->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->Visible) { // FY 2015 TARGET for Performance Indicator 9 (27) ?>
		<!-- FY 2015 TARGET for Performance Indicator 9 (27) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_9_282729->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28) ?>
		<!-- FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (28) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_282829->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->Visible) { // Performance Indicator 10 (29) ?>
		<!-- Performance Indicator 10 (29) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_10_282929->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->Visible) { // FY 2015 TARGET for Performance Indicator 10 (30) ?>
		<!-- FY 2015 TARGET for Performance Indicator 10 (30) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_10_283029->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31) ?>
		<!-- FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (31) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283129->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->Visible) { // Performance Indicator 11 (32) ?>
		<!-- Performance Indicator 11 (32) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_11_283229->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->Visible) { // FY 2015 TARGET for Performance Indicator 11 (33) ?>
		<!-- FY 2015 TARGET for Performance Indicator 11 (33) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_11_283329->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34) ?>
		<!-- FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (34) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283429->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->Visible) { // Performance Indicator 12 (35) ?>
		<!-- Performance Indicator 12 (35) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->Performance_Indicator_12_283529->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->Visible) { // FY 2015 TARGET for Performance Indicator 12 (36) ?>
		<!-- FY 2015 TARGET for Performance Indicator 12 (36) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_TARGET_for_Performance_Indicator_12_283629->ListViewValue() ?></div></td>
<?php } ?>
<?php if ($frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->Visible) { // FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37) ?>
		<!-- FY 2015 ACCOMPLISHMENT for Performance Indicator 3 (37) -->
		<td<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf->FY_2015_ACCOMPLISHMENT_for_Performance_Indicator_3_283729->ListViewValue() ?></div></td>
<?php } ?>
	</tr>
<?php
	$frm_fp_rep_ta_form_a_1_iatf_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table>
</div>
</td></tr></table>
<?php
$frm_fp_rep_ta_form_a_1_iatf_preview->ShowPageFooter();
if (UP_DEBUG_ENABLED)
	echo up_DebugMsg();
?>
<?php
if ($frm_fp_rep_ta_form_a_1_iatf_preview->Recordset)
	$frm_fp_rep_ta_form_a_1_iatf_preview->Recordset->Close();
}
$content = ob_get_contents();
ob_end_clean();
echo up_ConvertToUtf8($content);
?>
<?php
$frm_fp_rep_ta_form_a_1_iatf_preview->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_rep_ta_form_a_1_iatf_preview {

	// Page ID
	var $PageID = 'preview';

	// Table name
	var $TableName = 'frm_fp_rep_ta_form_a_1_iatf';

	// Page object name
	var $PageObjName = 'frm_fp_rep_ta_form_a_1_iatf_preview';

	// Page name
	function PageName() {
		return up_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = up_CurrentPage() . "?";
		global $frm_fp_rep_ta_form_a_1_iatf;
		if ($frm_fp_rep_ta_form_a_1_iatf->UseTokenInUrl) $PageUrl .= "t=" . $frm_fp_rep_ta_form_a_1_iatf->TableVar . "&"; // Add page token
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
		global $objForm, $frm_fp_rep_ta_form_a_1_iatf;
		if ($frm_fp_rep_ta_form_a_1_iatf->UseTokenInUrl) {
			if ($objForm)
				return ($frm_fp_rep_ta_form_a_1_iatf->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($frm_fp_rep_ta_form_a_1_iatf->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function cfrm_fp_rep_ta_form_a_1_iatf_preview() {
		global $conn, $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Table object (frm_fp_rep_ta_form_a_1_iatf)
		if (!isset($GLOBALS["frm_fp_rep_ta_form_a_1_iatf"])) {
			$GLOBALS["frm_fp_rep_ta_form_a_1_iatf"] = new cfrm_fp_rep_ta_form_a_1_iatf();
			$GLOBALS["Table"] =& $GLOBALS["frm_fp_rep_ta_form_a_1_iatf"];
		}

		// Table object (frm_fp_rep_ta_form_a_1_iatf_header)
		if (!isset($GLOBALS['frm_fp_rep_ta_form_a_1_iatf_header'])) $GLOBALS['frm_fp_rep_ta_form_a_1_iatf_header'] = new cfrm_fp_rep_ta_form_a_1_iatf_header();

		// Table object (tbl_users)
		if (!isset($GLOBALS['tbl_users'])) $GLOBALS['tbl_users'] = new ctbl_users();

		// Page ID
		if (!defined("UP_PAGE_ID"))
			define("UP_PAGE_ID", 'preview', TRUE);

		// Table name (for backward compatibility)
		if (!defined("UP_TABLE_NAME"))
			define("UP_TABLE_NAME", 'frm_fp_rep_ta_form_a_1_iatf', TRUE);

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
		global $frm_fp_rep_ta_form_a_1_iatf;

		// Security
		$Security = new cAdvancedSecurity();
		if (is_null($Security)) $Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel('frm_fp_rep_ta_form_a_1_iatf');
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			echo $Language->Phrase("NoPermission");
			exit();
		}
		if (!$Security->CanList()) {
			echo $Language->Phrase("NoPermission");
			exit();
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && strval($Security->CurrentUserID()) == "") {
			echo $Language->Phrase("NoPermission");
			exit();
		}

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
	var $Recordset;
	var $TotalRecs;
	var $RecCount;

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $frm_fp_rep_ta_form_a_1_iatf;

		// Load filter
		$qs = new cQueryString();
		$filter = $qs->GetValue("f");
		$filter = TEAdecrypt($filter, UP_RANDOM_KEY);
		if ($filter == "") $filter = "0=1";

		// Load recordset
		// Call Recordset Selecting event

		$frm_fp_rep_ta_form_a_1_iatf->Recordset_Selecting($filter);
		$this->Recordset = $frm_fp_rep_ta_form_a_1_iatf->LoadRs($filter);
		$this->TotalRecs = ($this->Recordset) ? $this->Recordset->RecordCount() : 0;

		// Call Recordset Selected event
		$frm_fp_rep_ta_form_a_1_iatf->Recordset_Selected($this->Recordset);
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
}
?>
