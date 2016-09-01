<?php

// Call Row_Rendering event
$frm_fp_rep_t_completion_status_unit_mfo->Row_Rendering();

// cu_unit_name
// mfo_name_rep
// No. of PIs (A)
// Applicable PIs (B)
// Not Applicable PIs (C)
// PI with Target (D)
// Remarks (A = C)
// Remarks (B > D)
// Remarks (D = 0)
// Call Row_Rendered event

$frm_fp_rep_t_completion_status_unit_mfo->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_mfo->cu_unit_name->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_mfo->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_mfo->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_mfo->cu_unit_name->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_mfo->mfo_name_rep->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_mfo->mfo_name_rep->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_mfo->mfo_name_rep->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_mfo->mfo_name_rep->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_mfo->No2E_of_PIs_28A29->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_mfo->No2E_of_PIs_28A29->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_mfo->No2E_of_PIs_28A29->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_mfo->No2E_of_PIs_28A29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_mfo->Applicable_PIs_28B29->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_mfo->Applicable_PIs_28B29->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_mfo->Applicable_PIs_28B29->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_mfo->Applicable_PIs_28B29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_mfo->Not_Applicable_PIs_28C29->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_mfo->Not_Applicable_PIs_28C29->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_mfo->Not_Applicable_PIs_28C29->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_mfo->Not_Applicable_PIs_28C29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_mfo->PI_with_Target_28D29->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_mfo->PI_with_Target_28D29->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_mfo->PI_with_Target_28D29->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_mfo->PI_with_Target_28D29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_mfo->Remarks_28A_3D_C29->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_mfo->Remarks_28A_3D_C29->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_mfo->Remarks_28A_3D_C29->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_mfo->Remarks_28A_3D_C29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_mfo->Remarks_28B_3E_D29->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_mfo->Remarks_28B_3E_D29->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_mfo->Remarks_28B_3E_D29->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_mfo->Remarks_28B_3E_D29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_t_completion_status_unit_mfo->Remarks_28D_3D_029->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_t_completion_status_unit_mfo->Remarks_28D_3D_029->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_t_completion_status_unit_mfo->Remarks_28D_3D_029->ViewAttributes() ?>><?php echo $frm_fp_rep_t_completion_status_unit_mfo->Remarks_28D_3D_029->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
