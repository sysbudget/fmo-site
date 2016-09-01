<?php

// Call Row_Rendering event
$frm_fp_rep_ta_form_a_cu->Row_Rendering();

// CU Office
// MFO
// Question
// Participating Units Count
// Target
// Numerator (T)
// Denominator (T)
// Accomplishment
// Numerator (A)
// Denominator (A)
// Rating
// Supporting Documents Count
// Call Row_Rendered event

$frm_fp_rep_ta_form_a_cu->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_cu->CU_Office->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_cu->CU_Office->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_cu->CU_Office->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_cu->CU_Office->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_cu->MFO->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_cu->MFO->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_cu->MFO->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_cu->MFO->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_cu->Question->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_cu->Question->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_cu->Question->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_cu->Question->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_cu->Participating_Units_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_cu->Participating_Units_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_cu->Participating_Units_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_cu->Participating_Units_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_cu->Target->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_cu->Target->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_cu->Target->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_cu->Target->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_cu->Numerator_28T29->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_cu->Numerator_28T29->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_cu->Numerator_28T29->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_cu->Numerator_28T29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_cu->Denominator_28T29->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_cu->Denominator_28T29->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_cu->Denominator_28T29->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_cu->Denominator_28T29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_cu->Accomplishment->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_cu->Accomplishment->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_cu->Accomplishment->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_cu->Accomplishment->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_cu->Numerator_28A29->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_cu->Numerator_28A29->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_cu->Numerator_28A29->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_cu->Numerator_28A29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_cu->Denominator_28A29->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_cu->Denominator_28A29->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_cu->Denominator_28A29->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_cu->Denominator_28A29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_cu->Rating->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_cu->Rating->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_cu->Rating->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_cu->Rating->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_cu->Supporting_Documents_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_cu->Supporting_Documents_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_cu->Supporting_Documents_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_cu->Supporting_Documents_Count->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
