<?php

// Call Row_Rendering event
$view_tbl_uporgchart_cu_users->Row_Rendering();

// shortName
// name
// Call Row_Rendered event

$view_tbl_uporgchart_cu_users->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $view_tbl_uporgchart_cu_users->shortName->FldCaption() ?></td>
			<td<?php echo $view_tbl_uporgchart_cu_users->shortName->CellAttributes() ?>>
<div<?php echo $view_tbl_uporgchart_cu_users->shortName->ViewAttributes() ?>><?php echo $view_tbl_uporgchart_cu_users->shortName->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $view_tbl_uporgchart_cu_users->name->FldCaption() ?></td>
			<td<?php echo $view_tbl_uporgchart_cu_users->name->CellAttributes() ?>>
<div<?php echo $view_tbl_uporgchart_cu_users->name->ViewAttributes() ?>><?php echo $view_tbl_uporgchart_cu_users->name->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
