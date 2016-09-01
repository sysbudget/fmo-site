<?php

// Call Row_Rendering event
$frm_sam_rep_a_monitor_above_100->Row_Rendering();

// Delivery Unit
// MFO
// Question
// Target
// Target Numerator (TN)
// Target Denominator (TD)
// Accomplishment
// Accomplishment Numerator (AN)
// Accomplishment Denominator (AD)
// Performance Rating (PR)
// PR Below 90%
// PR 90% and Above
// Over 110 Performance Rating
// Numerator Difference (AN - TN)
// AN is higher than TD (AN - TD)
// Call Row_Rendered event

$frm_sam_rep_a_monitor_above_100->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->Delivery_Unit->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->Delivery_Unit->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Delivery_Unit->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->MFO->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->MFO->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->MFO->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->MFO->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->Question->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->Question->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Question->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Question->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->Target->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->Target->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Target->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Target->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Target_Numerator_28TN29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Target_Denominator_28TD29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Numerator_28AN29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Accomplishment_Denominator_28AD29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Performance_Rating_28PR29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->PR_Below_9025->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->PR_Below_9025->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->PR_Below_9025->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->PR_Below_9025->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->PR_9025_and_Above->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Over_110_Performance_Rating->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->Numerator_Difference_28AN_2D_TN29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->FldCaption() ?></td>
			<td<?php echo $frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->CellAttributes() ?>>
<div<?php echo $frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->ViewAttributes() ?>><?php echo $frm_sam_rep_a_monitor_above_100->AN_is_higher_than_TD_28AN_2D_TD29->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
