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
$frm_fp_pbb_detail_accomplishment_delete = new cfrm_fp_pbb_detail_accomplishment_delete();
$Page =& $frm_fp_pbb_detail_accomplishment_delete;

// Page init
$frm_fp_pbb_detail_accomplishment_delete->Page_Init();

// Page main
$frm_fp_pbb_detail_accomplishment_delete->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var frm_fp_pbb_detail_accomplishment_delete = new up_Page("frm_fp_pbb_detail_accomplishment_delete");

// page properties
frm_fp_pbb_detail_accomplishment_delete.PageID = "delete"; // page ID
frm_fp_pbb_detail_accomplishment_delete.FormID = "ffrm_fp_pbb_detail_accomplishmentdelete"; // form ID
var UP_PAGE_ID = frm_fp_pbb_detail_accomplishment_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
frm_fp_pbb_detail_accomplishment_delete.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
frm_fp_pbb_detail_accomplishment_delete.SelectAllKey = function(elem) {
	up_SelectAll(elem);
	up_ClickAll(elem);
}
<?php if (UP_CLIENT_VALIDATE) { ?>
frm_fp_pbb_detail_accomplishment_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
frm_fp_pbb_detail_accomplishment_delete.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
//-->

</script>
<?php

// Load records for display
if ($frm_fp_pbb_detail_accomplishment_delete->Recordset = $frm_fp_pbb_detail_accomplishment_delete->LoadRecordset())
	$frm_fp_pbb_detail_accomplishment_deleteTotalRecs = $frm_fp_pbb_detail_accomplishment_delete->Recordset->RecordCount(); // Get record count
if ($frm_fp_pbb_detail_accomplishment_deleteTotalRecs <= 0) { // No record found, exit
	if ($frm_fp_pbb_detail_accomplishment_delete->Recordset)
		$frm_fp_pbb_detail_accomplishment_delete->Recordset->Close();
	$frm_fp_pbb_detail_accomplishment_delete->Page_Terminate("frm_fp_pbb_detail_accomplishmentlist.php"); // Return to list
}
?>
<p class="upbudgetofficeclass upTitle"><?php echo $Language->Phrase("Delete") ?>&nbsp;<?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $frm_fp_pbb_detail_accomplishment->TableCaption() ?></p>
<p class="upbudgetofficeclass"><a href="<?php echo $frm_fp_pbb_detail_accomplishment->getReturnUrl() ?>"><?php echo $Language->Phrase("GoBack") ?></a></p>
<?php $frm_fp_pbb_detail_accomplishment_delete->ShowPageHeader(); ?>
<?php
$frm_fp_pbb_detail_accomplishment_delete->ShowMessage();
?>
<form action="<?php echo up_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="frm_fp_pbb_detail_accomplishment">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($frm_fp_pbb_detail_accomplishment_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(UP_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo up_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
<?php echo $frm_fp_pbb_detail_accomplishment->TableCustomInnerHtml ?>
	<thead>
	<tr class="upTableHeader">
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->mfo->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->pi_no->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->pi_question->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->target->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->units_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_rating->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->FldCaption() ?></td>
		<td valign="top"><?php echo $frm_fp_pbb_detail_accomplishment->applicable->FldCaption() ?></td>
	</tr>
	</thead>
	<tbody>
<?php
$frm_fp_pbb_detail_accomplishment_delete->RecCnt = 0;
$i = 0;
while (!$frm_fp_pbb_detail_accomplishment_delete->Recordset->EOF) {
	$frm_fp_pbb_detail_accomplishment_delete->RecCnt++;

	// Set row properties
	$frm_fp_pbb_detail_accomplishment->ResetAttrs();
	$frm_fp_pbb_detail_accomplishment->RowType = UP_ROWTYPE_VIEW; // View

	// Get the field contents
	$frm_fp_pbb_detail_accomplishment_delete->LoadRowValues($frm_fp_pbb_detail_accomplishment_delete->Recordset);

	// Render row
	$frm_fp_pbb_detail_accomplishment_delete->RenderRow();
?>
	<tr<?php echo $frm_fp_pbb_detail_accomplishment->RowAttributes() ?>>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->pbb_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->cu_sequence->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->cu_short_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->cu_unit_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->focal_person_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_sequence->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pi_no->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->pi_no->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->pi_no->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->pi_sub->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->pi_question->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->pi_question->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->pi_question->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->target->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->target->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->target->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr1->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr2->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr3->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_numerator_qtr4->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr1->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr2->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr3->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_denominator_qtr4->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->accomplishment->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr1->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr2->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr3->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_numerator_qtr4->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr1->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr2->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr3->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_denominator_qtr4->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr1->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr2->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr3->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_qtr4->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_above_90->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_rating_below_90->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_remarks->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->units_id->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->units_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->units_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_rating->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_rating->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_rating->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_supporting_docs_comparison->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->cutOffDate_id->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->mfo_name_rep->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->t_cutOffDate_fp->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->a_cutOffDate_fp->ListViewValue() ?></div></td>
		<td<?php echo $frm_fp_pbb_detail_accomplishment->applicable->CellAttributes() ?>>
<div<?php echo $frm_fp_pbb_detail_accomplishment->applicable->ViewAttributes() ?>><?php echo $frm_fp_pbb_detail_accomplishment->applicable->ListViewValue() ?></div></td>
	</tr>
<?php
	$frm_fp_pbb_detail_accomplishment_delete->Recordset->MoveNext();
}
$frm_fp_pbb_detail_accomplishment_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="<?php echo up_BtnCaption($Language->Phrase("DeleteBtn")) ?>">
</form>
<?php
$frm_fp_pbb_detail_accomplishment_delete->ShowPageFooter();
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
$frm_fp_pbb_detail_accomplishment_delete->Page_Terminate();
?>
<?php

//
// Page class
//
class cfrm_fp_pbb_detail_accomplishment_delete {

	// Page ID
	var $PageID = 'delete';

	// Table name
	var $TableName = 'frm_fp_pbb_detail_accomplishment';

	// Page object name
	var $PageObjName = 'frm_fp_pbb_detail_accomplishment_delete';

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
	function cfrm_fp_pbb_detail_accomplishment_delete() {
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
			define("UP_PAGE_ID", 'delete', TRUE);

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
		if (!$Security->CanDelete()) {
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
	var $TotalRecs = 0;
	var $RecCnt;
	var $RecKeys = array();
	var $Recordset;

	//
	// Page main
	//
	function Page_Main() {
		global $Language, $frm_fp_pbb_detail_accomplishment;

		// Load key parameters
		$this->RecKeys = $frm_fp_pbb_detail_accomplishment->GetRecordKeys(); // Load record keys
		$sFilter = $frm_fp_pbb_detail_accomplishment->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("frm_fp_pbb_detail_accomplishmentlist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in frm_fp_pbb_detail_accomplishment class, frm_fp_pbb_detail_accomplishmentinfo.php

		$frm_fp_pbb_detail_accomplishment->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$frm_fp_pbb_detail_accomplishment->CurrentAction = $_POST["a_delete"];
		} else {
			$frm_fp_pbb_detail_accomplishment->CurrentAction = "I"; // Display record
		}
		switch ($frm_fp_pbb_detail_accomplishment->CurrentAction) {
			case "D": // Delete
				$frm_fp_pbb_detail_accomplishment->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($frm_fp_pbb_detail_accomplishment->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $frm_fp_pbb_detail_accomplishment;

		// Call Recordset Selecting event
		$frm_fp_pbb_detail_accomplishment->Recordset_Selecting($frm_fp_pbb_detail_accomplishment->CurrentFilter);

		// Load List page SQL
		$sSql = $frm_fp_pbb_detail_accomplishment->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = up_LoadRecordset($sSql);

		// Call Recordset Selected event
		$frm_fp_pbb_detail_accomplishment->Recordset_Selected($rs);
		return $rs;
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
		}

		// Call Row Rendered event
		if ($frm_fp_pbb_detail_accomplishment->RowType <> UP_ROWTYPE_AGGREGATEINIT)
			$frm_fp_pbb_detail_accomplishment->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security, $frm_fp_pbb_detail_accomplishment;
		$DeleteRows = TRUE;
		$sSql = $frm_fp_pbb_detail_accomplishment->SQL();
		$conn->raiseErrorFn = 'up_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
			$rs->Close();
			return FALSE;
		}
		if (!$Security->CanDelete()) {
			$this->setFailureMessage($Language->Phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$conn->BeginTrans();

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $frm_fp_pbb_detail_accomplishment->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= UP_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['pbb_id'];
				$conn->raiseErrorFn = 'up_ErrorFn';
				$DeleteRows = $conn->Execute($frm_fp_pbb_detail_accomplishment->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($frm_fp_pbb_detail_accomplishment->CancelMessage <> "") {
				$this->setFailureMessage($frm_fp_pbb_detail_accomplishment->CancelMessage);
				$frm_fp_pbb_detail_accomplishment->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$frm_fp_pbb_detail_accomplishment->Row_Deleted($row);
			}
		}
		return $DeleteRows;
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
