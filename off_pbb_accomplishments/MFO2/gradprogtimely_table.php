	<table>
        <tr>
            <td width="155"><div align="right">Official Program Name</div></td>
            <td width="550"><input name="var_mfo2_forma_program_name" type="text" id="var_mfo2_forma_program_name" size="80" disabled value="<?php if (isset($var_mfo2_forma_program_name)) echo $var_mfo2_forma_program_name; ?>">
			<input name="var_mfo2_forma_program_id" type="hidden" id="hvar_mfo2_forma_program_id" value="<?php if (isset($var_mfo2_forma_program_id)) echo $var_mfo2_forma_program_id; ?>">
			</td>
		</tr>
		
        <tr>
            <td><div align="right">Survey Date</div></td>
            <td><input type="text" name="var_survey_date" required id="var_survey_date" size="11" onchange="checkban(this.id, 2)" value="<?php if ( !isset($var_survey_date) || $var_survey_date == "") echo ""; else echo date("m/d/Y", $var_survey_date); ?>"></td>
        </tr>

		<tr>
			<td></td>
			<td><i>(Click the top left or right corner of the calendar to navigate or press Esc key to hide calendar. Specify at least the month and year--set the day to 01, e.g., 06/01/2016.)</i><p></p></td>
		</tr>
		
		<tr>
            <td><div align="right">Survey Mode</div></td>
			<td>
            <input type="radio" name="var_survey_mode" value="1" <?php if (!isset($var_survey_mode) || $var_survey_mode != "2") echo "checked"; else echo ""; ?>>Conventional
            <input type="radio" name="var_survey_mode" value="2" <?php if (isset($var_survey_mode) && $var_survey_mode == "2") echo "checked"; else echo ""; ?>>Online
			</td>
		</tr>
		
        <tr>
            <td><div align="right">Total Students<br>Enrolled in Program<br>(as of Survey Date)</div></td>
            <td><input type="text" style="text-align:right;" name="var_enrollment" required id="var_enrollment" size="11" onblur="checkban(this.id, 1)" maxlength="6" placeholder="0"value="<?php if (isset($var_enrollment)) echo $var_enrollment; ?>"></td>
        </tr>
		
        <tr>
        	<td><div align="right"><hr/><b>Survey Responses on Timeliness of Education Service Delivery</b></div></td>
        </tr>

        <tr>
            <td><div align="right">No Answer</div></td>
            <td><input type="text" style="text-align:right;" name="var_no_answer" id="var_no_answer" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($var_no_answer)) echo $var_no_answer; ?>"></td>
        </tr>

        <tr>
            <td><div align="right">Poor/Below Fair</div></td>
            <td><input type="text" style="text-align:right;" name="var_bad_rating" id="var_bad_rating" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($var_bad_rating)) echo $var_bad_rating; ?>"></td>
        </tr>
		
        <tr>
            <td><div align="right">Fair</div></td>
            <td><input type="text" style="text-align:right;" name="var_fair_rating" id="var_fair_rating" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($var_fair_rating)) echo $var_fair_rating; ?>"></td>
        </tr>

        <tr>
            <td><div align="right">Good</div></td>
            <td><input type="text" style="text-align:right;" name="var_good_rating" id="var_good_rating" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($var_good_rating)) echo $var_good_rating; ?>"></td>
        </tr>

        <tr>
            <td><div align="right">Better</div></td>
            <td><input type="text" style="text-align:right;" name="var_better_rating" id="var_better_rating" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($var_better_rating)) echo $var_better_rating; ?>"></td>
        </tr>

        <tr>
            <td><div align="right">Best</div></td>
            <td><input type="text" style="text-align:right;" name="var_best_rating" id="var_best_rating" size="11" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($var_best_rating)) echo $var_best_rating; ?>"></td>
        </tr>
		
        <tr>
            <th><div align="right">Sub-Total of Good, Better<br>and Best</div></th>
            <td><input type="text" style="text-align:right;" name="var_good_or_better" id="var_good_or_better" size="11" disabled placeholder="0" value="<?php if (isset($var_good_or_better)) echo $var_good_or_better; ?>"></td>
        </tr>

        <tr>
            <th><div align="right">Total Number of Students Surveyed</div></th>
            <td><input type="text" style="text-align:right;" name="var_respondents" required id="var_respondents" size="11" disabled placeholder="0" value="<?php if (isset($var_respondents)) echo $var_respondents; ?>"></td>
        </tr>

		<tr>
			<td><div align="right">Prescribed Attachment 1 Filename</div></td>
			<td><textarea name="var_attachmt1" id="var_attachmt1" readonly cols="50" rows="6" ><?php if (!isset($var_attachmt1) || $var_attachmt1=="") echo $surveyfilename1; else echo $var_attachmt1; ?></textarea></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Copy the above prescribed filename to upload the PDF copy of the survey's tabulated results endorsed by the Head of Unit.)</i><p></p></td>
		</tr>

		<tr>
			<td align="right">File 1 to upload</td>
			<td><input type="file" name="adved_surveyfile1" required id="adved_surveyfile1" onblur="alertFilename(this.id, document.getElementById('var_attachmt1').value)"></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit.)</i><p></p></td>
		</tr>

		<tr>
			<td><div align="right">Prescribed Attachment 2 Filename</div></td>
			<td><textarea name="var_attachmt2" id="var_attachmt2" readonly cols="50" rows="6" ><?php if (!isset($var_attachmt2) || $var_attachmt2=="") echo $surveyfilename2; else echo $var_attachmt2; ?></textarea></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Copy the above prescribed filename to upload the PDF copy of a sample accomplished timeliness survey questionnaire.)</i><p></p></td>
		</tr>

		<tr>
			<td align="right">File 2 to upload</td>
			<td><input type="file" name="adved_surveyfile2" required id="adved_surveyfile2" onblur="alertFilename(this.id, document.getElementById('var_attachmt2').value)"></td>
		</tr>

		<tr>
			<td></td>
			<td><i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit.)</i><p></p></td>
		</tr>
	</table>
