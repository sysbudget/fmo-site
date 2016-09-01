		<table>

        <tr>
            <td width="155"><div align="right">Official Program Name</div></td>
            <td width="550"><input name="var_mfo2_forma_program_name" type="text" id="var_mfo2_forma_program_name" size="80" disabled value="<?php if (isset($var_forma_program_name)) echo $var_forma_program_name; ?>">
			<input name="var_forma_program_id" type="hidden" id="hvar_forma_program_id" value="<?php if (isset($var_forma_program_id)) echo $var_forma_program_id; ?>">
			</td>
		</tr>

        <tr>
        	<td><div align="right"><hr/><b>Name of Diploma Recipient</b></div></td>
		</tr>
		
        <tr>
            <td><div align="right">Last Name</div></td> 
            <td><input name="var_last_name" type="text" style="text-transform:uppercase;" required id="var_last_name" size="80" maxlength="100" value="<?php if ( isset($var_last_name)) echo $var_last_name; ?>"></td>
		</tr>
		
        <tr>
            <td><div align="right">First Name</div></td> 
            <td><input name="var_first_name" type="text" style="text-transform:uppercase;" required id="var_first_name" size="80" maxlength="100" value="<?php if ( isset($var_first_name)) echo $var_first_name; ?>"></td>
		</tr>

        <tr>
            <td><div align="right"><hr/>Graduation Date</div></td>
            <td><br><input type="text" name="var_grad_date" required id="var_grad_date" size="11" onchange="checkban(this.id, 2)" value="<?php if ( !isset($var_grad_date) || $var_grad_date == "") echo ""; else echo date("m/d/Y", $var_grad_date); ?>"></td>
        </tr>
		
		<tr>
			<td></td>
			<td><i>(Click the top left or right corner of the calendar to navigate or press Esc key to hide calendar. Specify date within July 1st of previous year until November 30th of current year only.)</i><p></p></td>
		</tr>
		
		<tr>
            <td><div align="right">Date of Graduate Tracer Study</div></td>
            <td><input type="text" name="var_trace_date" required id="var_trace_date" size="11" onchange="checkban(this.id, 2)" value="<?php if ( !isset($var_trace_date) || $var_trace_date == "") echo ""; else echo date("m/d/Y", $var_trace_date); ?>"></td>
        </tr>
		
		<tr>
			<td></td>
			<td><i>(Click the top left or right corner of the calendar to navigate or press Esc key to hide calendar. Specify at least the month and year--set the day to 01, e.g., 06/01/2016.)</i><p></p></td>
		</tr>
		
		<tr>
            <td><div align="right">Was he/she awarded a scholarship?</div></td>
			<td>
            <input type="radio" name="var_is_scholar" value="Y" <?php if (isset($var_is_scholar) && $var_is_scholar == "Y") echo "checked"; else echo ""; ?>>Yes
            <input type="radio" name="var_is_scholar" value="N" <?php if (!isset($var_is_scholar) || $var_is_scholar != "Y") echo "checked"; else echo ""; ?>>No
			</td>
		</tr>
		
        <tr>
            <td><div align="right">Employment Status<br>Prior to Graduation</div></td>
			<td>
			<select name="var_stat_before_id" required id="var_stat_before_id" size="1">
				<option <?php if (! isset($var_stat_before_id) || $var_stat_before_id == "") echo "selected"; ?> value="">Please Select :</option>
				<option <?php if ( isset($var_stat_before_id) && $var_stat_before_id=="1") echo "selected"; ?> value="1">Unemployed</option>
				<option <?php if ( isset($var_stat_before_id) && $var_stat_before_id=="2") echo "selected"; ?> value="2">Self-employed</option>
				<option <?php if ( isset($var_stat_before_id) && $var_stat_before_id=="3") echo "selected"; ?> value="3">Employed</option>
             </select></td>
        </tr>

        <tr>
            <td><div align="right"><hr/>Employment Status<br>After Graduation</div></td>
			<td><br>
			<select name="var_stat_after_id" required id="var_stat_after_id" size="1">
				<option <?php if (! isset($var_stat_after_id) || $var_stat_after_id == "") echo "selected"; ?> value="">Please Select :</option>
				<option <?php if ( isset($var_stat_after_id) && $var_stat_after_id=="1") echo "selected"; ?> value="1">Unemployed</option>
				<option <?php if ( isset($var_stat_after_id) && $var_stat_after_id=="2") echo "selected"; ?> value="2">Self-employed</option>
				<option <?php if ( isset($var_stat_after_id) && $var_stat_after_id=="3") echo "selected"; ?> value="3">Employed</option>
            </select></td>
        </tr>

		<tr>
            <td><div align="right">Did his/her income increase?</div></td>
			<td>
            <input type="radio" name="var_is_increase" id="var_is_increase_y" value="Y" <?php if (isset($var_is_increase) && $var_is_increase == "Y") echo "checked"; else echo ""; ?>>Yes
			
            <input type="radio" name="var_is_increase" id="var_is_increase_n" value="N" <?php if (!isset($var_is_increase) || $var_is_increase != "Y") echo "checked"; else echo ""; ?>>No

			<input type="hidden" name="hvar_is_increase" id="hvar_is_increase" value="<?php if (isset($var_is_increase)) echo $var_is_increase; ?>">
			</td>
		</tr>

		<tr>
            <td><div align="right">Was he/she promoted in rank?</div></td>
			<td>
            <input type="radio" name="var_is_promo" id="var_is_promo_y" value="Y" <?php if (isset($var_is_promo) && $var_is_promo == "Y") echo "checked"; else echo ""; ?>>Yes
			
            <input type="radio" name="var_is_promo" id="var_is_promo_n" value="N" <?php if (!isset($var_is_promo) || $var_is_promo != "Y") echo "checked"; else echo ""; ?>>No

			<input type="hidden" name="hvar_is_promo" id="hvar_is_promo" value="<?php if (isset($var_is_promo)) echo $var_is_promo; ?>">
			</td>
		</tr>

        <tr>
            <td><div align="right">Date Hired for Current Job/Became Self-Employed</div></td>
            <td>
			<input type="text" name="var_hire_date" required id="var_hire_date" size="11" onchange="checkban(this.id, 2)" value="<?php if ( !isset($var_hire_date) || $var_hire_date == "") echo ""; else echo date("m/d/Y", $var_hire_date); ?>">
			
			<input type="hidden" name="hvar_hire_date" id="hvar_hire_date" value="<?php if (isset($var_hire_date)) echo $var_hire_date; ?>">
			</td>
        </tr>

		<tr>
			<td></td>
			<td><i>(Click the top left or right corner of the calendar to navigate or press Esc key to hide calendar.)</i><p></p></td>
		</tr>

        <tr>
            <td><div align="right">Average Monthly Income</div></td>
			<td><span>PhP <select name="var_income_id" required id="var_income_id" size="1">
			  <option <?php if (! isset($var_income_id) || $var_income_id == "") echo "selected"; ?> value="">Please Select :</option>
              <?php if (isset($array2)) { foreach($array2 as $option1) : ?>
              <option <?php if ( isset($var_income_id) && $option1->income_scale_id == $var_income_id) echo "selected"; ?> value="<?php echo $option1->income_scale_id; ?>"><?php echo $option1->income_scale_monthly; ?></option>
              <?php endforeach; } ?>
            </select></span>
			<input type="hidden" name="hvar_income_id" id="hvar_income_id" value="<?php if (isset($var_income_id)) echo $var_income_id; ?>">
			</td>
        </tr>
		
		<tr>
			<td><div align="right">% Increase in Income</div></td>
			<td>
			<span><input type="text" style="text-align:right;" name="var_income_incr_pct" required id="var_income_incr_pct" size="11" placeholder="0.00" onblur="checkban(this.id, 3)" value="<?php if ( !isset($var_income_incr_pct) || $var_income_incr_pct == "") echo ""; else echo number_format($var_income_incr_pct, 2); ?>">%</span>
			<input type="hidden" name="hvar_income_incr_pct" id="hvar_income_incr_pct" value="<?php if (isset($var_income_incr_pct)) echo $var_income_incr_pct; ?>">
			</td>
		</tr>

		<tr>
			<td><div align="right">Employment Status Improvement</div></td>
			<td><input type="text" disabled name="var_hired_improved" size="80" id="var_hired_improved" value="">
				<input type="hidden" name="var_hired_improved_id" id="hvar_hired_improved_id" value="<?php if (isset($var_hired_improved_id)) echo $var_hired_improved_id; ?>">
			</td>
		</tr>
		
		<!-- Removed attachments.  Specs changed July 18, 2016 -->
		
		</table>
