<?php

// Call Row_Rendering event
$frm_fp_rep_ta_form_a_1_iatf_header->Row_Rendering();

// Delivery Unit
// Call Row_Rendered event

$frm_fp_rep_ta_form_a_1_iatf_header->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_rep_ta_form_a_1_iatf_header->Delivery_Unit->FldCaption() ?></td>
			<td<?php echo $frm_fp_rep_ta_form_a_1_iatf_header->Delivery_Unit->CellAttributes() ?>>
<div<?php echo $frm_fp_rep_ta_form_a_1_iatf_header->Delivery_Unit->ViewAttributes() ?>><?php echo $frm_fp_rep_ta_form_a_1_iatf_header->Delivery_Unit->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
