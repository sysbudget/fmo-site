<?php

// Call Row_Rendering event
$frm_1_t_fi_pbb_detail_delivery->Row_Rendering();

// a_cutOffDate_remarks
// Delivery Unit
// MFO
// Applicable
// Target
// Target Cut-Off Date
// Accomplishment
// Numerator
// Denominator
// Accomplishment Remarks
// Below 100% Performance Rating
// 100% to 120% Performance Rating
// Above 120% Performance Rating
// Call Row_Rendered event

$frm_1_t_fi_pbb_detail_delivery->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->a_cutOffDate_remarks->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->a_cutOffDate_remarks->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->a_cutOffDate_remarks->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->a_cutOffDate_remarks->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->Delivery_Unit->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->Delivery_Unit->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->Delivery_Unit->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->MFO->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->MFO->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->MFO->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->MFO->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->Applicable->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->Applicable->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->Applicable->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->Applicable->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->Target->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->Target->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->Target->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->Target->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->Target_Cut2DOff_Date->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->Target_Cut2DOff_Date->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->Target_Cut2DOff_Date->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->Target_Cut2DOff_Date->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->Accomplishment->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->Accomplishment->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->Accomplishment->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->Accomplishment->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->Numerator->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->Numerator->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->Numerator->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->Numerator->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->Denominator->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->Denominator->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->Denominator->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->Denominator->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->Accomplishment_Remarks->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->Accomplishment_Remarks->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->Accomplishment_Remarks->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->Accomplishment_Remarks->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->Below_10025_Performance_Rating->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->Below_10025_Performance_Rating->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->Below_10025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->Below_10025_Performance_Rating->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->z10025_to_12025_Performance_Rating->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_1_t_fi_pbb_detail_delivery->Above_12025_Performance_Rating->FldCaption() ?></td>
			<td<?php echo $frm_1_t_fi_pbb_detail_delivery->Above_12025_Performance_Rating->CellAttributes() ?>>
<div<?php echo $frm_1_t_fi_pbb_detail_delivery->Above_12025_Performance_Rating->ViewAttributes() ?>><?php echo $frm_1_t_fi_pbb_detail_delivery->Above_12025_Performance_Rating->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
