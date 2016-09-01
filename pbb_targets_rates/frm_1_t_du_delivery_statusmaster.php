<?php

// Call Row_Rendering event
$frm_1_t_du_delivery_status->Row_Rendering();

// Delivery Unit
// Contributing Unit/s Count
// Not Started Contributing Unit/s Count
// In Progress Contributing Unit/s Count
// Completed Target Contributing Unit/s Count
// Remarks
// Call Row_Rendered event

$frm_1_t_du_delivery_status->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_du_delivery_status->Delivery_Unit->FldCaption() ?></td>
			<td<?php echo $frm_1_t_du_delivery_status->Delivery_Unit->CellAttributes() ?>>
<div<?php echo $frm_1_t_du_delivery_status->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_1_t_du_delivery_status->Delivery_Unit->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_du_delivery_status->Contributing_Unit2Fs_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_du_delivery_status->Contributing_Unit2Fs_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_du_delivery_status->Contributing_Unit2Fs_Count->ViewAttributes() ?>><?php echo $frm_1_t_du_delivery_status->Contributing_Unit2Fs_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_du_delivery_status->Not_Started_Contributing_Unit2Fs_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_du_delivery_status->Not_Started_Contributing_Unit2Fs_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_du_delivery_status->Not_Started_Contributing_Unit2Fs_Count->ViewAttributes() ?>><?php echo $frm_1_t_du_delivery_status->Not_Started_Contributing_Unit2Fs_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_du_delivery_status->In_Progress_Contributing_Unit2Fs_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_du_delivery_status->In_Progress_Contributing_Unit2Fs_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_du_delivery_status->In_Progress_Contributing_Unit2Fs_Count->ViewAttributes() ?>><?php echo $frm_1_t_du_delivery_status->In_Progress_Contributing_Unit2Fs_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_du_delivery_status->Completed_Target_Contributing_Unit2Fs_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_du_delivery_status->Completed_Target_Contributing_Unit2Fs_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_du_delivery_status->Completed_Target_Contributing_Unit2Fs_Count->ViewAttributes() ?>><?php echo $frm_1_t_du_delivery_status->Completed_Target_Contributing_Unit2Fs_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_du_delivery_status->Remarks->FldCaption() ?></td>
			<td<?php echo $frm_1_t_du_delivery_status->Remarks->CellAttributes() ?>>
<div<?php echo $frm_1_t_du_delivery_status->Remarks->ViewAttributes() ?>><?php echo $frm_1_t_du_delivery_status->Remarks->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
