<?php

// Call Row_Rendering event
$frm_fp_rep_t_completion_status_unit_pi->Row_Rendering();

// Unit
// Personnel Count
// Total No. of PIs Participated
// PIs Not Yet Started
// PIs Started
// % Completed
// Completion Status
// Call Row_Rendered event

$frm_fp_rep_t_completion_status_unit_pi->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_pi->Unit->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_pi->Unit->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_pi->Unit->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_pi->Unit->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_pi->Personnel_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_pi->Personnel_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_pi->Personnel_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_pi->Personnel_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_pi->Total_No2E_of_PIs_Participated->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_pi->Total_No2E_of_PIs_Participated->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_pi->Total_No2E_of_PIs_Participated->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_pi->Total_No2E_of_PIs_Participated->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_pi->PIs_Not_Yet_Started->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_pi->PIs_Not_Yet_Started->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_pi->PIs_Not_Yet_Started->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_pi->PIs_Not_Yet_Started->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_pi->PIs_Started->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_pi->PIs_Started->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_pi->PIs_Started->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_pi->PIs_Started->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_pi->z25_Completed->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_pi->z25_Completed->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_pi->z25_Completed->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_pi->z25_Completed->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_pi->Completion_Status->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_pi->Completion_Status->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_pi->Completion_Status->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_pi->Completion_Status->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
