
	<table>
	
        <tr>
            <td width="155"><div align="right">Official Program Name</div></td>
            <td width="550"><input name="var_mfo1_forma_program_name" type="text" size="80" id="var_mfo1_forma_program_name" disabled value="<?php if (isset($var_mfo1_forma_program_name)) echo $var_mfo1_forma_program_name; ?>">
			<input name="var_mfo1_forma_program_id" type="hidden" id="hvar_mfo1_forma_program_id" value="<?php if (isset($var_mfo1_forma_program_id)) echo $var_mfo1_forma_program_id; ?>">
			</td>
		</tr>
			 
		<tr>
            <td><div align="right">RA 9500 Priority</div></td>
            <td><input name="var_9500_priority" type="text" id="var_9500_priority" disabled size="11" value="<?php if (!isset($var_9500_priority) || ($var_9500_priority == "1")) echo "Yes"; else echo "No"; ?>">
            <input name="var_9500_priority" type="hidden" id="hvar_var_9500_priority" value="<?php if (isset($var_9500_priority)) echo $var_9500_priority; ?>">
			</td>
        </tr>
    
        <tr>
            <td><div align="right">RA 9500 Mandated</div></td>
			<td><input name="var_9500_mandated" type="text" id="var_9500_mandated" disabled size="11" value="<?php if (!isset($var_9500_mandated) || ($var_9500_mandated == "1")) echo "Yes"; else echo "No"; ?>">
            <input name="var_9500_mandated" type="hidden" id="hvar_var_9500_mandated" value="<?php if (isset($var_9500_mandated)) echo $var_9500_mandated; ?>">
			</td>
        </tr>

        <tr>
            <td><div align="right">Is an Accreditable Program?</div></td>
            <td>
            <input type="radio" name="var_accreditable" required id="var_accreditable" value="1" <?php if (!isset($var_accreditable) || ($var_accreditable == "1") || ($var_accreditable == "")) echo "checked"; ?>>Yes, program was granted Candidate status.
			</td>
		</tr>
		
		<tr>
			<td></td>
			<td><input type="radio" name="var_accreditable" required id="var_accreditable" value="0" <?php if (isset($var_accreditable) && ($var_accreditable != "1")) echo "checked"; ?>>No, program has been awarded an Accreditation Level.
            </td>
        </tr>

		<tr>
			<td></td>
			<td><i>(An Accreditable Program is a program granted "Candidate" status after the first evaluation by the accrediting body.)</i>
			<p></p></td>
		</tr>

		<tr>
			<td><div align="right">Accreditation Level</div></td>
            <td><select name="var_accreditation_level" required id="var_accreditation_level" <?php if ( !isset($var_accreditable) || ($var_accreditable == "1") || ($var_accreditable == "") ) echo "disabled"; ?> size="1">
            <option <?php if ( isset($var_accreditation_level_id) && $var_accreditation_level_id == "" ) echo "selected"; ?> value="" >Please Select :</option>
              <?php if (isset($array3)) { foreach($array3 as $option3) : ?>
              <option value="<?php echo $option3->ref_accreditation_level_id ?>" <?php if (isset($var_accreditation_level_id) && ($var_accreditation_level_id == $option3->ref_accreditation_level_id)) echo "selected"; ?>><?php echo $option3->ref_accreditation_level_name; ?></option>
              <?php endforeach; } ?>
             </select>
			 </td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Specify the level as indicated in the Certificate of Accreditation.)</i>
			<p></p></td>
		</tr>

		<tr>
			<td><div align="right">Accrediting Body</div></td>
            <td><select name="var_accrediting_body_id" required id="var_accrediting_body_id" size="1" onchange="showUser(this.value)">
            <option <?php if ( isset($var_accrediting_body_id) &&  $var_accrediting_body_id == "" ) echo "selected"; ?> value="" >Please Select :</option>
              <?php if (isset($array2)) { foreach($array2 as $option2) : ?>
              <option value="<?php echo $option2->ref_accrediting_body_id; ?>" <?php if (isset($var_accrediting_body_id) && ($var_accrediting_body_id == $option2->ref_accrediting_body_id)) echo "selected"; ?>><?php echo $option2->ref_accrediting_body_name; ?></option>
              <?php endforeach; } ?>
             </select>
			 </td>
		</tr>

		<tr>
			<td></td>
			<td><i><!-- (If not in the selection, please write a letter to the Vice-President for Planning and Finance requesting for an external accrediting body to be officially included.  Also, using the File Upload button at the bottom of this page, provide a copy of the Levelling Scheme used by that accrediting body.) -->
			(If not in the list, please transmit a letter-request to the Vice-President for Planning and Finance to include officially other external accrediting body. Also, attach the copy of the Levelling Scheme used by that accrediting body in the File Upload button at the bottom of this page.)
			</i><p></p></td>
		</tr>

		<tr>
			<td><div align="right">Type of Accrediting Body</div></td>
            <td><div id="accreditation_classification_name">
			<input name="var_accreditation_classification_name" type="text" id="var_accreditation_classification_name" disabled size="50" value="<?php if (isset($var_accreditation_classification_name)) echo $var_accreditation_classification_name; ?>">
			</div>
			</td>
		</tr>

		<tr>
			<td><div align="right">Start Date of Validity</div></td>
			<td><input type="text" name="var_validity_start_date" required id="var_validity_start_date" size="11" onchange="checkban(this.id, 2)" value="<?php if (isset($var_validity_start_date) && $var_validity_start_date != '') echo date("m/d/Y", $var_validity_start_date); ?>"></td>
        </tr>

		<tr>
			<td></td>
			<td><i>(Click the top left or right corner of the calendar to navigate or press Esc key to hide calendar.)</i>
			<p></p></td>
		</tr>
		
		<tr>
			<td><div align="right">End Date of Validity</div></td>
			<td><input type="text" name="var_validity_end_date" required id="var_validity_end_date" size="11" onchange="checkban(this.id, 2)" value="<?php if (isset($var_validity_end_date) && $var_validity_end_date != '') echo date("m/d/Y", $var_validity_end_date); ?>"></td>
        </tr>

		<tr>
			<td></td>
			<td><i>(Click the top left or right corner of the calendar to navigate or press Esc key to hide calendar.)</i>
			<p></p></td>
		</tr>
		
		<tr>
			<td><div align="right">Prescribed Attachment 1 Filename</div></td>
			<td><textarea name="var_attachmt1" id="var_attachmt1" readonly cols="50" rows="6" ><?php if (!isset($var_attachmt1) || $var_attachmt1=="") echo $accreditfilename1; else echo $var_attachmt1; ?></textarea></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Copy the above prescribed filename to upload the PDF copy of the Certificate of Accreditation.)</i>
			<p></p></td>
		</tr>

		<tr>
			<td align="right">File 1 to upload</td>
			<td><input type="file" name="highed_accreditfile1" required id="highed_accreditfile1" onblur="alertFilename(this.id, document.getElementById('var_attachmt').value)"></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit.)</i>
			<p></p></td>
		</tr>

		<tr>
			<td><div align="right">Prescribed Attachment 2 Filename</div></td>
			<td><textarea name="var_attachmt2" id="var_attachmt2" readonly cols="50" rows="6" ><?php if (!isset($var_attachmt2) || $var_attachmt2=="") echo $accreditfilename2; else echo $var_attachmt2; ?></textarea></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Copy the above prescribed filename to upload the PDF copy of the Levelling Scheme used.)</i>
			<p></p></td>
		</tr>

		<tr>
			<td align="right">File 2 to upload</td>
			<td><input type="file" name="highed_accreditfile2" required id="highed_accreditfile2" onblur="alertFilename(this.id, document.getElementById('var_attachmt2').value)"></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit.)</i>
			<p></p></td>
		</tr>

	</table>