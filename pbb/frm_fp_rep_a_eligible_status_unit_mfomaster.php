<?php

// Call Row_Rendering event
$frm_fp_rep_a_eligible_status_unit_mfo->Row_Rendering();

// cu_unit_name
// mfo_name_rep
// Participated PI
// Not Started PI
// % Not Started PI
// Status
// Not Eligible PI Count
// % Not Eligible PI Count
// Eligible PI Count
// % Eligible PI Count
// Remarks
// Call Row_Rendered event

$frm_fp_rep_a_eligible_status_unit_mfo->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->cu_unit_name->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->mfo_name_rep->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Participated_PI->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Started_PI->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Started_PI->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Status->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Not_Eligible_PI_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Not_Eligible_PI_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Eligible_PI_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->z25_Eligible_PI_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit_mfo->Remarks->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
