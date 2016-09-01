<?php

// Call Row_Rendering event
$tbl_faculty->Row_Rendering();

// faculty_name
// faculty_birthDate
// gender_ID
// faculty_highestDegreeListed
// degreelevelFaculty_ID
// Call Row_Rendered event

$tbl_faculty->Row_Rendered();
?>
<table cellspacing="0" class="upGrid"><tr><td class="upGridContent">
<div class="upGridMiddlePanel">
<table cellspacing="0" class="upTable upTableSeparate">
	<tbody>
		<tr>
			<td class="upTableHeader"><?php echo $tbl_faculty->faculty_name->FldCaption() ?></td>
			<td<?php echo $tbl_faculty->faculty_name->CellAttributes() ?>>
<div<?php echo $tbl_faculty->faculty_name->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_name->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $tbl_faculty->faculty_birthDate->FldCaption() ?></td>
			<td<?php echo $tbl_faculty->faculty_birthDate->CellAttributes() ?>>
<div<?php echo $tbl_faculty->faculty_birthDate->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_birthDate->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $tbl_faculty->gender_ID->FldCaption() ?></td>
			<td<?php echo $tbl_faculty->gender_ID->CellAttributes() ?>>
<div<?php echo $tbl_faculty->gender_ID->ViewAttributes() ?>><?php echo $tbl_faculty->gender_ID->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $tbl_faculty->faculty_highestDegreeListed->FldCaption() ?></td>
			<td<?php echo $tbl_faculty->faculty_highestDegreeListed->CellAttributes() ?>>
<div<?php echo $tbl_faculty->faculty_highestDegreeListed->ViewAttributes() ?>><?php echo $tbl_faculty->faculty_highestDegreeListed->ListViewValue() ?></div></td>
		</tr>
		<tr>
			<td class="upTableHeader"><?php echo $tbl_faculty->degreelevelFaculty_ID->FldCaption() ?></td>
			<td<?php echo $tbl_faculty->degreelevelFaculty_ID->CellAttributes() ?>>
<div<?php echo $tbl_faculty->degreelevelFaculty_ID->ViewAttributes() ?>><?php echo $tbl_faculty->degreelevelFaculty_ID->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
