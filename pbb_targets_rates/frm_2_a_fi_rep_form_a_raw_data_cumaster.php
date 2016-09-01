<?php

// Call Row_Rendering event
$frm_2_a_fi_rep_form_a_raw_data_cu->Row_Rendering();

// CU Name
// MFO
// Question
// Target
// Target Remarks
// Accomplishment
// Numerator (A)
// Denominator (A)
// Accomplishment Remarks
// Below 100% Performance Rating
// 100% to 120% Performance Rating
// Above 120% Performance Rating
// Call Row_Rendered event

$frm_2_a_fi_rep_form_a_raw_data_cu->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->FldCaption() ?></td>
			<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->CU_Name->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->MFO->FldCaption() ?></td>
			<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->MFO->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->MFO->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->MFO->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Question->FldCaption() ?></td>
			<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Question->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Question->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Question->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target->FldCaption() ?></td>
			<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->FldCaption() ?></td>
			<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Target_Remarks->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->FldCaption() ?></td>
			<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->FldCaption() ?></td>
			<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Numerator_28A29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->FldCaption() ?></td>
			<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Denominator_28A29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->FldCaption() ?></td>
			<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Accomplishment_Remarks->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->FldCaption() ?></td>
			<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Below_10025_Performance_Rating->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->FldCaption() ?></td>
			<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->z10025_to_12025_Performance_Rating->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->FldCaption() ?></td>
			<td<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->CellAttributes() ?>>
<div<?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_2_a_fi_rep_form_a_raw_data_cu->Above_12025_Performance_Rating->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
