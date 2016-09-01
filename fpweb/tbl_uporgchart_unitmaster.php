<?php

// Call Row_Rendering event
$tbl_uporgchart_unit->Row_Rendering();

// nameOfUnit
// Call Row_Rendered event

$tbl_uporgchart_unit->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $tbl_uporgchart_unit->nameOfUnit->FldCaption() ?></td>
			<td<?php echo $tbl_uporgchart_unit->nameOfUnit->CellAttributes() ?>>
<div<?php echo $tbl_uporgchart_unit->nameOfUnit->ViewAttributes() ?>><?php echo $tbl_uporgchart_unit->nameOfUnit->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
