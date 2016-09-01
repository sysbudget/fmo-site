<?php

// Call Row_Rendering event
$ref_disciplinechedcodes_major->Row_Rendering();

// disCHED_discipline_id
// disCHED_discipline_code
// disCHED_discipline_name
// disCHED_discipline_acronym
// Call Row_Rendered event

$ref_disciplinechedcodes_major->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_id->FldCaption() ?></td>
			<td<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_id->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_id->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_id->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_code->FldCaption() ?></td>
			<td<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_code->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_code->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_code->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_name->FldCaption() ?></td>
			<td<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_name->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_name->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_name->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_acronym->FldCaption() ?></td>
			<td<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_acronym->CellAttributes() ?>>
<div<?php echo $ref_disciplinechedcodes_major->disCHED_discipline_acronym->ViewAttributes() ?>><?php echo $ref_disciplinechedcodes_major->disCHED_discipline_acronym->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
