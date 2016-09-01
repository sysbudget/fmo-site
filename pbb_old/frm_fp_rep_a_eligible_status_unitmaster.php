<?php

// Call Row_Rendering event
$frm_fp_rep_a_eligible_status_unit->Row_Rendering();

// cu_unit_name
// personnel_count
// Participated MFO Count
// Not Started MFO Count
// % Not Started MFO
// Status
// Not Eligible MFO Count
// % Not Eligible MFO Count
// Eligible MFO Count
// % Eligible MFO Count
// Remarks
// Call Row_Rendered event

$frm_fp_rep_a_eligible_status_unit->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->cu_unit_name->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->personnel_count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Participated_MFO_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Started_MFO_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Started_MFO->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit->Status->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit->Status->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Status->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Status->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Not_Eligible_MFO_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Not_Eligible_MFO_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Eligible_MFO_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->z25_Eligible_MFO_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status_unit->Remarks->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
