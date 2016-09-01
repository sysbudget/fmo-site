<?php

// Call Row_Rendering event
$frm_9_m_sa_units_cu->Row_Rendering();

// cu_id
// focal_person_id
// cu_sequence
// cu_short_name
// focal_person_office
// Call Row_Rendered event

$frm_9_m_sa_units_cu->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $frm_9_m_sa_units_cu->cu_id->FldCaption() ?></td>
			<td<?php echo $frm_9_m_sa_units_cu->cu_id->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_cu->cu_id->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_cu->cu_id->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_9_m_sa_units_cu->focal_person_id->FldCaption() ?></td>
			<td<?php echo $frm_9_m_sa_units_cu->focal_person_id->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_cu->focal_person_id->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_cu->focal_person_id->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_9_m_sa_units_cu->cu_sequence->FldCaption() ?></td>
			<td<?php echo $frm_9_m_sa_units_cu->cu_sequence->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_cu->cu_sequence->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_cu->cu_sequence->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_9_m_sa_units_cu->cu_short_name->FldCaption() ?></td>
			<td<?php echo $frm_9_m_sa_units_cu->cu_short_name->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_cu->cu_short_name->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_cu->cu_short_name->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $frm_9_m_sa_units_cu->focal_person_office->FldCaption() ?></td>
			<td<?php echo $frm_9_m_sa_units_cu->focal_person_office->CellAttributes() ?>>
<div<?php echo $frm_9_m_sa_units_cu->focal_person_office->ViewAttributes() ?>><?php echo $frm_9_m_sa_units_cu->focal_person_office->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
