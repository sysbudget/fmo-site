
	<table>

		<tr>
            <td width="155"><div align="right">Program Level</div></td>
            <td><select name="var_prog_lev" required id="var_prog_lev" size="1">
			  <option <?php if (!isset($ref_program_level_id) || $ref_program_level_id == "") echo "selected"; ?> value="">Please Select :</option>
              <?php if (isset($array1)) { foreach($array1 as $option1) : ?>
					<option <?php if (isset($ref_program_level_id) && $option1->ref_program_level_id == $ref_program_level_id) echo "selected"; ?> value="<?php echo $option1->ref_program_level_id; ?>"><?php echo $option1->ref_program_level_name; ?></option>
			  <?php endforeach; } ?>
             </select></td>
        </tr>

        <tr>
            <td><div align="right">Official Program Name</div></td> 
            <td width="550"><textarea name="var_prog_name" required id="var_prog_name" cols="50" rows="6" maxlength="255"><?php if (isset($mfo1_forma_program_name)) echo $mfo1_forma_program_name; ?></textarea></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Use complete program name in its officially approved format such as spelling, punctuations, parentheses, hyphens, spacing, capitalization, etc.)</i>
			<p></p></td>
		</tr>

        <tr>
            <td><div align="right">Normal Program Length<br>(in Years)</div></td>
            <td><input type="number" name="var_len_yrs" required id="var_len_yrs" size="11" maxlength="2" min="1" max="10" step="1" onblur="checkban(this.id, 1)" value="<?php if (isset($mfo1_forma_program_normal_length)) echo $mfo1_forma_program_normal_length; ?>"></td>
        </tr>
 
		<tr>
			<td></td>
			<td><i>(Specify the required number of years of study in accordance with the curriculum.)</i>
			<p></p></td>
		</tr>

        <tr>
            <td><div align="right">RA 9500 Priority</div></td>
            <td>
			<input type="text" size="11" disabled value="Yes">
            <input type="hidden" name="var_9500_priority" value="1">
            </td>
        </tr>
    
        <tr>
            <td><div align="right">RA 9500 Mandated</div></td>
            <td>
			<input type="text" size="11" disabled value="Yes">
            <input type="hidden" name="var_9500_mandated" value="1">
            </td>
        </tr>
        
        <tr>
            <td><div align="right">RA 9500 Accrediting Body</div></td>
            <td>
			<input type="text" size="11" disabled value="UP BOR">
            <input type="hidden" name="var_9500_accredit_body" value="UP BOR">
			<input type="hidden" name="var_9500_accreditable" value="2">
            </td>
        </tr>
        
        <tr>
            <td><div align="right">RA 9500 Accreditation Level</div></td>
            <td>
			<input type="text" size="11" disabled value="4">
            <input type="hidden" name="var_9500_accredit_lev" value="4">
            </td>
        </tr>
        
        <tr>
            <td><div align="right">Board Approval - <br>BOR Meeting No.</div></td>
            <td><input type="text" name="var_bor_mtg_no" required id="var_bor_mtg_no" size="11" maxlength="5" onblur="checkban(this.id, 1)" value="<?php if (isset($mfo1_forma_program_ra_9500_bor_approval_meeting_no)) echo $mfo1_forma_program_ra_9500_bor_approval_meeting_no; ?>"></td>
        </tr>

		<tr>
			<td></td>
			<td><i>(Use 1 to 5 digits.)</i>
			<p></p></td>
		</tr>

        <tr>
            <td><div align="right">Date of BOR Meeting</div></td>
            <td><input type="text" name="var_bor_mtg_date" required id="var_bor_mtg_date" size="11" onchange="checkban(this.id, 2)" value="<?php if (!isset($mfo1_forma_program_ra_9500_bor_approval_meeting_date) || $mfo1_forma_program_ra_9500_bor_approval_meeting_date=="") echo ""; else echo date("m/d/Y", $mfo1_forma_program_ra_9500_bor_approval_meeting_date); ?>"></td>
        </tr>

		<tr>
			<td></td>
			<td><i>(Click the top left or right corner of the calendar to navigate or press esc key to hide calendar.)</i>
			<p></p></td>
		</tr>

        <tr>
            <td><div align="right">Total Students Enrolled<br>in the Terminal/Final Year (or in the last course credit units requirement during the year)</div></td>
            <td><input type="text" style="text-align:right;" name="var_enrollmt" required id="var_enrollmt" size="11" onblur="checkban(this.id, 1)" maxlength="6" placeholder="0" value="<?php if (isset($mfo1_forma_program_enrollment_in_terminal_year)) echo $mfo1_forma_program_enrollment_in_terminal_year; ?>"></td>
        </tr>

		<tr>
			<td></td>
			<td><i>(Note: Terminal/Final Year is the last year in the Normal Program Length.)</i>
			<p></p></td>
		</tr>
		
        <tr><th scope="row"><p></p></th></tr>
        
        <tr>
        	<td><hr/><div align="right"><b>January to March<br>Diploma Recipients</b></div></td>
        </tr>
        
        <tr>
            <td><div align="right">Total</div></td>
            <td><input type="text" style="text-align:right;" name="var_q1_grad_total" id="var_q1_grad_total" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($mfo1_forma_program_graduates_qtr1)) echo $mfo1_forma_program_graduates_qtr1; ?>"></td>
        </tr>
        
        <tr>
            <td><div align="right">Graduated within Prescribed Timeframe</div></td>
            <td><input type="text" style="text-align:right;" name="var_q1_grad_intime" id="var_q1_grad_intime" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($mfo1_forma_program_graduates_qtr1_within_timeframe)) echo $mfo1_forma_program_graduates_qtr1_within_timeframe; ?>"></td>
        </tr>
        
        <tr>
            <td><div align="right">Prescribed Attachment 1 Filename</div></td>
			<td><textarea name="var_attachmt1" id="var_attachmt1" readonly cols="50" rows="6" ><?php if (!isset($mfo1_forma_program_graduates_qtr1_attachment) || $mfo1_forma_program_graduates_qtr1_attachment=="") echo $qtr1_attachment; else echo $mfo1_forma_program_graduates_qtr1_attachment; ?></textarea></td>
        </tr>

		<tr>
			<td></td>
			<!-- <td><i>(Use the above prescribed filename to rename and upload the PDF copy of the University Council-approved List of Graduates in the period January to March.)</i> -->
			<td><i>(Copy the above prescribed filename to upload the PDF copy of the University Council-approved List of Graduates in the period January to March.)</i>
			<p></p></td>
		</tr>

		<tr>
			<td align="right">File 1 to upload</td>
			<td><input type="file" name="highed_gradfile1" <?php if (isset($mfo1_forma_program_graduates_qtr1) && $mfo1_forma_program_graduates_qtr1 > 0) echo ""; else echo "disabled"; ?> id="highed_gradfile1" onblur="alertFilename(this.id, document.getElementById('var_attachmt1').value)"></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit.)</i>
			<p></p></td>
		</tr>

        <tr>
        	<td><hr/><div align="right"><b>April to June<br>Diploma Recipients</b></div></td>
        </tr>
        
        <tr>
            <td><div align="right">Total</div></td>
            <td><input type="text" style="text-align:right;" name="var_q2_grad_total" id="var_q2_grad_total" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($mfo1_forma_program_graduates_qtr2)) echo $mfo1_forma_program_graduates_qtr2; ?>"></td>
        </tr>
        
        <tr>
            <td><div align="right">Graduated within Prescribed Timeframe</div></td>
            <td><input type="text" style="text-align:right;" name="var_q2_grad_intime" id="var_q2_grad_intime" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($mfo1_forma_program_graduates_qtr2_within_timeframe)) echo $mfo1_forma_program_graduates_qtr2_within_timeframe; ?>"></td>
        </tr>
        
        <tr>
            <td><div align="right">Prescribed Attachment 2 Filename</div></td>
			<td><textarea name="var_attachmt2" id="var_attachmt2" readonly cols="50" rows="6" ><?php if (!isset($mfo1_forma_program_graduates_qtr2_attachment) || $mfo1_forma_program_graduates_qtr2_attachment=="") echo $qtr2_attachment; else echo $mfo1_forma_program_graduates_qtr2_attachment; ?></textarea></td>
        </tr>

		<tr>
			<td></td>
			<td><i>(Copy the above prescribed filename to upload the PDF copy of the University Council-approved List of Graduates in the period April to June.)</i>
			<p></p></td>
		</tr>

		<tr>
			<td align="right">File 2 to upload</td>
			<td><input type="file" name="highed_gradfile2" <?php if (isset($mfo1_forma_program_graduates_qtr2) && $mfo1_forma_program_graduates_qtr2 > 0) echo ""; else echo "disabled"; ?> id="highed_gradfile2" onblur="alertFilename(this.id, document.getElementById('var_attachmt2').value)"></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit.)</i>
			<p></p></td>
		</tr>

        <tr>
        	<td><hr/><div align="right"><b>July to September<br>Diploma Recipients</b></div></td>
        </tr>
        
        <tr>
            <td><div align="right">Total</div></td>
            <td><input type="text" style="text-align:right;" name="var_q3_grad_total" id="var_q3_grad_total" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($mfo1_forma_program_graduates_qtr3)) echo $mfo1_forma_program_graduates_qtr3; ?>"></td>
        </tr>
        
        <tr>
            <td><div align="right">Graduated within Prescribed Timeframe</div></td>
            <td><input type="text" style="text-align:right;" name="var_q3_grad_intime" id="var_q3_grad_intime" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($mfo1_forma_program_graduates_qtr3_within_timeframe)) echo $mfo1_forma_program_graduates_qtr3_within_timeframe; ?>"></td>
        </tr>
        
        <tr>
            <td><div align="right">Prescribed Attachment 3 Filename</div></td>
			<td><textarea name="var_attachmt3" id="var_attachmt3" readonly cols="50" rows="6" ><?php if (!isset($mfo1_forma_program_graduates_qtr3_attachment) || $mfo1_forma_program_graduates_qtr3_attachment=="") echo $qtr3_attachment; else echo $mfo1_forma_program_graduates_qtr3_attachment; ?></textarea></td>
        </tr>

		<tr>
			<td></td>
			<td><i>(Copy the above prescribed filename to upload the PDF copy of the University Council-approved List of Graduates in the period July to September.)</i>
			<p></p></td>
		</tr>

		<tr>
			<td align="right">File 3 to upload</td>
			<td><input type="file" name="highed_gradfile3" <?php if (isset($mfo1_forma_program_graduates_qtr3) && $mfo1_forma_program_graduates_qtr3 > 0) echo ""; else echo "disabled"; ?> id="highed_gradfile3" onblur="alertFilename(this.id, document.getElementById('var_attachmt3').value)"></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit.)</i>
			<p></p></td>
		</tr>
		
        <tr>
        	<td><hr/><div align="right"><b>October to December<br>Diploma Recipients</b></div></td>
        </tr>
        
        <tr>
            <td><div align="right">Total</div></td>
            <td><input type="text" style="text-align:right;" name="var_q4_grad_total" id="var_q4_grad_total" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($mfo1_forma_program_graduates_qtr4)) echo $mfo1_forma_program_graduates_qtr4; ?>"></td>
        </tr>
        
        <tr>
            <td><div align="right">Graduated within Prescribed Timeframe</div></td>
            <td><input type="text" style="text-align:right;" name="var_q4_grad_intime" id="var_q4_grad_intime" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($mfo1_forma_program_graduates_qtr4_within_timeframe)) echo $mfo1_forma_program_graduates_qtr4_within_timeframe; ?>"></td>
        </tr>
        
        <tr>
            <td><div align="right">Prescribed Attachment 4 Filename</div></td>
			<td><textarea name="var_attachmt4" id="var_attachmt4" readonly cols="50" rows="6" ><?php if (!isset($mfo1_forma_program_graduates_qtr4_attachment) || $mfo1_forma_program_graduates_qtr4_attachment=="") echo $qtr4_attachment; else echo $mfo1_forma_program_graduates_qtr4_attachment; ?></textarea></td>
        </tr>

		<tr>
			<td></td>
			<td><i>(Copy the above prescribed filename to upload the PDF copy of the University Council-approved List of Graduates in the period October to December.)</i>
			<p></p></td>
		</tr>

		<tr>
			<td align="right">File 4 to upload</td>
			<td><input type="file" name="highed_gradfile4" <?php if (isset($mfo1_forma_program_graduates_qtr4) && $mfo1_forma_program_graduates_qtr4 > 0) echo ""; else echo "disabled"; ?> id="highed_gradfile4" onblur="alertFilename(this.id, document.getElementById('var_attachmt4').value)"></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit.)</i>
			<p></p></td>
		</tr>

        <tr>
        	<td><hr/><div align="right"><b>Total Diploma Recipients<br>for the Year</b></div></td>
        </tr>

        <tr>
            <td><div align="right">Grand Total</div></td>
            <td>
			<input type="text" style="text-align:right;" name="var_all_grad_total" id="var_all_grad_total" size="11" disabled placeholder="0" value="<?php if (isset($mfo1_forma_program_graduates_total)) echo number_format($mfo1_forma_program_graduates_total); ?>">
			</td>
		</tr>
        
        <tr>
            <td><div align="right">Graduated within Prescribed Timeframe</div></td>
            <td>
			<input type="text" style="text-align:right;" name="var_all_grad_intime" id="var_all_grad_intime" size="11" disabled placeholder="0" value="<?php if (isset($mfo1_forma_program_graduates_total_within_timeframe)) echo number_format($mfo1_forma_program_graduates_total_within_timeframe); ?>">
			</td>
		</tr>
        
        <tr>
            <td><div align="right">Prescribed Attachment 5 Filename</div></td>
			<td><textarea name="var_attachmt5" id="var_attachmt5" readonly cols="50" rows="6" ><?php if (!isset($mfo1_forma_program_curriculum_attachment) || $mfo1_forma_program_curriculum_attachment=="") echo $curriculum_attachment; else echo $mfo1_forma_program_curriculum_attachment; ?></textarea></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Copy the above prescribed filename to upload the PDF copy of the Curriculum Checklist.)</i>
			<p></p></td>
		</tr>

		<tr>
			<td align="right">File 5 to upload</td>
			<td><input type="file" name="highed_curriculumfile" required id="highed_curriculumfile" onblur="alertFilename(this.id, document.getElementById('var_attachmt5').value)"></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit.)</i>
			<p></p></td>
		</tr>

        <tr>
            <td><div align="right">Is this a professional/board degree program?</div></td>
            <td>
            <input type="radio" name="var_is_board" value="Y" <?php if (isset($mfo1_forma_program_with_board) && $mfo1_forma_program_with_board == "Y") echo "checked"; ?>>Yes
            <input type="radio" name="var_is_board" value="N" <?php if (!isset($mfo1_forma_program_with_board) || $mfo1_forma_program_with_board != "Y") echo "checked"; ?>>No
            </td>
        </tr>
		
	</table>
