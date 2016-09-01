<?php

// Call Row_Rendering event
$frm_1_t_fi_cu_status->Row_Rendering();

// CU
// CU Name
// Delivery Units Count
// Not Started Delivery Units Count
// In Progress Delivery Units Count
// Completed Target Delivery Units Count
// Remarks
// Call Row_Rendered event

$frm_1_t_fi_cu_status->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_cu_status->CU->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_cu_status->CU->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_cu_status->CU->ViewAttributes() ?>><?php echo $frm_1_t_fi_cu_status->CU->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_cu_status->CU_Name->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_cu_status->CU_Name->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_cu_status->CU_Name->ViewAttributes() ?>><?php echo $frm_1_t_fi_cu_status->CU_Name->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_cu_status->Delivery_Units_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_cu_status->Delivery_Units_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_cu_status->Delivery_Units_Count->ViewAttributes() ?>><?php echo $frm_1_t_fi_cu_status->Delivery_Units_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_cu_status->Not_Started_Delivery_Units_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_cu_status->Not_Started_Delivery_Units_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_cu_status->Not_Started_Delivery_Units_Count->ViewAttributes() ?>><?php echo $frm_1_t_fi_cu_status->Not_Started_Delivery_Units_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_cu_status->In_Progress_Delivery_Units_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_cu_status->In_Progress_Delivery_Units_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_cu_status->In_Progress_Delivery_Units_Count->ViewAttributes() ?>><?php echo $frm_1_t_fi_cu_status->In_Progress_Delivery_Units_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_cu_status->Completed_Target_Delivery_Units_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_cu_status->Completed_Target_Delivery_Units_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_cu_status->Completed_Target_Delivery_Units_Count->ViewAttributes() ?>><?php echo $frm_1_t_fi_cu_status->Completed_Target_Delivery_Units_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_cu_status->Remarks->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_cu_status->Remarks->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_cu_status->Remarks->ViewAttributes() ?>><?php echo $frm_1_t_fi_cu_status->Remarks->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
