<?php

// Call Row_Rendering event
$tbl_uporgchart_cu->Row_Rendering();

// shortName
// name
// Call Row_Rendered event

$tbl_uporgchart_cu->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $tbl_uporgchart_cu->shortName->FldCaption() ?></td>
			<td<?php echo $tbl_uporgchart_cu->shortName->CellAttributes() ?>>
<div<?php echo $tbl_uporgchart_cu->shortName->ViewAttributes() ?>><?php echo $tbl_uporgchart_cu->shortName->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $tbl_uporgchart_cu->name->FldCaption() ?></td>
			<td<?php echo $tbl_uporgchart_cu->name->CellAttributes() ?>>
<div<?php echo $tbl_uporgchart_cu->name->ViewAttributes() ?>><?php echo $tbl_uporgchart_cu->name->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
