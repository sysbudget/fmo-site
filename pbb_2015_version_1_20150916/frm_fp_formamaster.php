<?php

// Call Row_Rendering event
$frm_fp_forma->Row_Rendering();

// CU Office
// MFO
// Question
// Participating Units Count
// Target
// Numerator (T)
// Denominator (T)
// Accomplishment
// Numerator (A)
// Denominator (A)
// Supporting Documents Count
// Rating
// Call Row_Rendered event

$frm_fp_forma->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_forma->CU_Office->FldCaption() ?></td>
			<td<?php echo $frm_fp_forma->CU_Office->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->CU_Office->ViewAttributes() ?>><?php echo $frm_fp_forma->CU_Office->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_forma->MFO->FldCaption() ?></td>
			<td<?php echo $frm_fp_forma->MFO->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->MFO->ViewAttributes() ?>><?php echo $frm_fp_forma->MFO->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_forma->Question->FldCaption() ?></td>
			<td<?php echo $frm_fp_forma->Question->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Question->ViewAttributes() ?>><?php echo $frm_fp_forma->Question->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_forma->Participating_Units_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_forma->Participating_Units_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Participating_Units_Count->ViewAttributes() ?>><?php echo $frm_fp_forma->Participating_Units_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_forma->Target->FldCaption() ?></td>
			<td<?php echo $frm_fp_forma->Target->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Target->ViewAttributes() ?>><?php echo $frm_fp_forma->Target->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_forma->Numerator_28T29->FldCaption() ?></td>
			<td<?php echo $frm_fp_forma->Numerator_28T29->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Numerator_28T29->ViewAttributes() ?>><?php echo $frm_fp_forma->Numerator_28T29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_forma->Denominator_28T29->FldCaption() ?></td>
			<td<?php echo $frm_fp_forma->Denominator_28T29->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Denominator_28T29->ViewAttributes() ?>><?php echo $frm_fp_forma->Denominator_28T29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_forma->Accomplishment->FldCaption() ?></td>
			<td<?php echo $frm_fp_forma->Accomplishment->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Accomplishment->ViewAttributes() ?>><?php echo $frm_fp_forma->Accomplishment->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_forma->Numerator_28A29->FldCaption() ?></td>
			<td<?php echo $frm_fp_forma->Numerator_28A29->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Numerator_28A29->ViewAttributes() ?>><?php echo $frm_fp_forma->Numerator_28A29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_forma->Denominator_28A29->FldCaption() ?></td>
			<td<?php echo $frm_fp_forma->Denominator_28A29->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Denominator_28A29->ViewAttributes() ?>><?php echo $frm_fp_forma->Denominator_28A29->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_forma->Supporting_Documents_Count->FldCaption() ?></td>
			<td<?php echo $frm_fp_forma->Supporting_Documents_Count->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Supporting_Documents_Count->ViewAttributes() ?>><?php echo $frm_fp_forma->Supporting_Documents_Count->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_fp_forma->Rating->FldCaption() ?></td>
			<td<?php echo $frm_fp_forma->Rating->CellAttributes() ?>>
<div<?php echo $frm_fp_forma->Rating->ViewAttributes() ?>><?php echo $frm_fp_forma->Rating->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
