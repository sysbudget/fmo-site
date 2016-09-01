<?php

// Call Row_Rendering event
$frm_1_t_conu_contributor_mfo_status->Row_Rendering();

// Delivery Unit
// Contributing Unit
// Participated MFO Count
// Not Started MFO Count
// In Progress MFO Count
// Completed Target MFO Count
// Remarks
// Call Row_Rendered event

$frm_1_t_conu_contributor_mfo_status->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_conu_contributor_mfo_status->Delivery_Unit->FldCaption() ?></td>
			<td<?php echo $frm_1_t_conu_contributor_mfo_status->Delivery_Unit->CellAttributes() ?>>
<div<?php echo $frm_1_t_conu_contributor_mfo_status->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_mfo_status->Delivery_Unit->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_conu_contributor_mfo_status->Contributing_Unit->FldCaption() ?></td>
			<td<?php echo $frm_1_t_conu_contributor_mfo_status->Contributing_Unit->CellAttributes() ?>>
<div<?php echo $frm_1_t_conu_contributor_mfo_status->Contributing_Unit->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_mfo_status->Contributing_Unit->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_conu_contributor_mfo_status->Participated_MFO_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_conu_contributor_mfo_status->Participated_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_conu_contributor_mfo_status->Participated_MFO_Count->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_mfo_status->Participated_MFO_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_conu_contributor_mfo_status->Not_Started_MFO_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_conu_contributor_mfo_status->Not_Started_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_conu_contributor_mfo_status->Not_Started_MFO_Count->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_mfo_status->Not_Started_MFO_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_conu_contributor_mfo_status->In_Progress_MFO_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_conu_contributor_mfo_status->In_Progress_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_conu_contributor_mfo_status->In_Progress_MFO_Count->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_mfo_status->In_Progress_MFO_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_conu_contributor_mfo_status->Completed_Target_MFO_Count->FldCaption() ?></td>
			<td<?php echo $frm_1_t_conu_contributor_mfo_status->Completed_Target_MFO_Count->CellAttributes() ?>>
<div<?php echo $frm_1_t_conu_contributor_mfo_status->Completed_Target_MFO_Count->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_mfo_status->Completed_Target_MFO_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_conu_contributor_mfo_status->Remarks->FldCaption() ?></td>
			<td<?php echo $frm_1_t_conu_contributor_mfo_status->Remarks->CellAttributes() ?>>
<div<?php echo $frm_1_t_conu_contributor_mfo_status->Remarks->ViewAttributes() ?>><?php echo $frm_1_t_conu_contributor_mfo_status->Remarks->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
