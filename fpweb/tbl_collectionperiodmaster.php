<?php

// Call Row_Rendering event
$tbl_collectionperiod->Row_Rendering();

// collectionPeriod_ay
// collectionPeriod_sem
// collectionPeriod_cutOffDate
// collectionPeriod_status
// Call Row_Rendered event

$tbl_collectionperiod->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $tbl_collectionperiod->collectionPeriod_ay->FldCaption() ?></td>
			<td<?php echo $tbl_collectionperiod->collectionPeriod_ay->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->collectionPeriod_ay->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_ay->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $tbl_collectionperiod->collectionPeriod_sem->FldCaption() ?></td>
			<td<?php echo $tbl_collectionperiod->collectionPeriod_sem->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->collectionPeriod_sem->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_sem->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->FldCaption() ?></td>
			<td<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_cutOffDate->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $tbl_collectionperiod->collectionPeriod_status->FldCaption() ?></td>
			<td<?php echo $tbl_collectionperiod->collectionPeriod_status->CellAttributes() ?>>
<div<?php echo $tbl_collectionperiod->collectionPeriod_status->ViewAttributes() ?>><?php echo $tbl_collectionperiod->collectionPeriod_status->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
