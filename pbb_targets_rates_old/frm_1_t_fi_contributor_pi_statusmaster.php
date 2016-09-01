<?php

// Call Row_Rendering event
$frm_1_t_fi_contributor_pi_status->Row_Rendering();

// Delivery Unit
// Contributing Unit
// MFO
// PI Count per MFO
// Not Applicable PI Count
// Completed Target PI Count
// No Target PI Count
// Remarks
// Call Row_Rendered event

$frm_1_t_fi_contributor_pi_status->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_contributor_pi_status->Delivery_Unit->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_contributor_pi_status->Delivery_Unit->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_pi_status->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_pi_status->Delivery_Unit->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_contributor_pi_status->Contributing_Unit->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_contributor_pi_status->Contributing_Unit->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_pi_status->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_pi_status->Contributing_Unit->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_contributor_pi_status->MFO->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_contributor_pi_status->MFO->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_pi_status->MFO->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_pi_status->MFO->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_contributor_pi_status->PI_Count_per_MFO->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_contributor_pi_status->PI_Count_per_MFO->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_pi_status->PI_Count_per_MFO->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_pi_status->PI_Count_per_MFO->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_contributor_pi_status->Not_Applicable_PI_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_contributor_pi_status->Not_Applicable_PI_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_pi_status->Not_Applicable_PI_Count->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_pi_status->Not_Applicable_PI_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_contributor_pi_status->Completed_Target_PI_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_contributor_pi_status->Completed_Target_PI_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_pi_status->Completed_Target_PI_Count->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_pi_status->Completed_Target_PI_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_contributor_pi_status->No_Target_PI_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_contributor_pi_status->No_Target_PI_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_pi_status->No_Target_PI_Count->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_pi_status->No_Target_PI_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_contributor_pi_status->Remarks->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_contributor_pi_status->Remarks->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_contributor_pi_status->Remarks->ViewAttributes() ?>><?php echo $frm_1_t_fi_contributor_pi_status->Remarks->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
