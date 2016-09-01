<?php

// Call Row_Rendering event
$view_tbl_collectionperiod_admin->Row_Rendering();

// collectionPeriod_ay
// collectionPeriod_sem
// collectionPeriod_cutOffDate
// collectionPeriod_status
// Call Row_Rendered event

$view_tbl_collectionperiod_admin->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->FldCaption() ?></td>
			<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->CellAttributes() ?>>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_ay->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->FldCaption() ?></td>
			<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->CellAttributes() ?>>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_sem->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->FldCaption() ?></td>
			<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->CellAttributes() ?>>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_cutOffDate->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->FldCaption() ?></td>
			<td<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->CellAttributes() ?>>
<div<?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->ViewAttributes() ?>><?php echo $view_tbl_collectionperiod_admin->collectionPeriod_status->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
