<?php

// Call Row_Rendering event
$frm_sam_cu_executive_offices->Row_Rendering();

// focal_person_id
// cu_sequence
// cu_short_name
// focal_person_office
// Call Row_Rendered event

$frm_sam_cu_executive_offices->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_cu_executive_offices->focal_person_id->FldCaption() ?></td>
			<td<?php echo $frm_sam_cu_executive_offices->focal_person_id->CellAttributes() ?>>
<div<?php echo $frm_sam_cu_executive_offices->focal_person_id->ViewAttributes() ?>><?php echo $frm_sam_cu_executive_offices->focal_person_id->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_cu_executive_offices->cu_sequence->FldCaption() ?></td>
			<td<?php echo $frm_sam_cu_executive_offices->cu_sequence->CellAttributes() ?>>
<div<?php echo $frm_sam_cu_executive_offices->cu_sequence->ViewAttributes() ?>><?php echo $frm_sam_cu_executive_offices->cu_sequence->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_cu_executive_offices->cu_short_name->FldCaption() ?></td>
			<td<?php echo $frm_sam_cu_executive_offices->cu_short_name->CellAttributes() ?>>
<div<?php echo $frm_sam_cu_executive_offices->cu_short_name->ViewAttributes() ?>><?php echo $frm_sam_cu_executive_offices->cu_short_name->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_sam_cu_executive_offices->focal_person_office->FldCaption() ?></td>
			<td<?php echo $frm_sam_cu_executive_offices->focal_person_office->CellAttributes() ?>>
<div<?php echo $frm_sam_cu_executive_offices->focal_person_office->ViewAttributes() ?>><?php echo $frm_sam_cu_executive_offices->focal_person_office->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
