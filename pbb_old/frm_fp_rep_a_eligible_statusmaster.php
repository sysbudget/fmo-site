<?php

// Call Row_Rendering event
$frm_fp_rep_a_eligible_status->Row_Rendering();

// focal_person_office
// Participated: Unit Count
// Participated: Personnel Count
// Not Eligible: Unit Count
// Not Eligible: % Unit Count
// Not Eligible: Personnel Count
// Eligible: Unit Count
// Eligible: % Unit Count
// Eligible: Personnel Count
// Call Row_Rendered event

$frm_fp_rep_a_eligible_status->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status->focal_person_office->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status->focal_person_office->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status->focal_person_office->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status->focal_person_office->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status->Participated3A_Unit_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status->Participated3A_Unit_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status->Participated3A_Unit_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status->Participated3A_Unit_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status->Participated3A_Personnel_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status->Participated3A_Personnel_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status->Participated3A_Personnel_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status->Participated3A_Personnel_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status->Not_Eligible3A_Unit_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status->Not_Eligible3A_Unit_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status->Not_Eligible3A_Unit_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status->Not_Eligible3A_Unit_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status->Not_Eligible3A_25_Unit_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status->Not_Eligible3A_25_Unit_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status->Not_Eligible3A_25_Unit_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status->Not_Eligible3A_25_Unit_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status->Not_Eligible3A_Personnel_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status->Not_Eligible3A_Personnel_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status->Not_Eligible3A_Personnel_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status->Not_Eligible3A_Personnel_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status->Eligible3A_Unit_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status->Eligible3A_Unit_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status->Eligible3A_Unit_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status->Eligible3A_Unit_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status->Eligible3A_25_Unit_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status->Eligible3A_25_Unit_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status->Eligible3A_25_Unit_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status->Eligible3A_25_Unit_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_a_eligible_status->Eligible3A_Personnel_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_a_eligible_status->Eligible3A_Personnel_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_a_eligible_status->Eligible3A_Personnel_Count->ViewAttributes() ?>><?php echo $frm_fp_rep_a_eligible_status->Eligible3A_Personnel_Count->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
