
			<table>
				<tr>
					<td width="155"><div align="right">Name of Examination</div></td>
					<td width="550"><input name="var_ref_prc_profession" type="text" id="var_ref_prc_profession" size="80" disabled value="<?php if (isset($var_ref_prc_profession)) echo $var_ref_prc_profession; ?>">
					</td>
				</tr>
				
				<tr>
					<td><div align="right">Date of Examination</div></td>
					<td><input name="var_ref_prc_exam_date" type="text" id="var_ref_prc_exam_date" size="11" disabled value="<?php if (isset($var_ref_prc_exam_date)) echo $var_ref_prc_exam_date; ?>">
					</td>
				</tr>

				<tr>
					<td><div align="right">Name of School</div></td>
					<td><input name="var_ref_prc_school" type="text" id="var_ref_prc_school" size="90" disabled value="<?php if (isset($var_ref_prc_school)) echo $var_ref_prc_school; ?>">
					</td>
				</tr>
			</table>
			
			<table>	
				<tr>
					<td width="155"></td>
					<td width="155"><hr/><b>UP First-time Takers</b></td>
					<td width="155"><hr/><b>National First-time Takers</b></td>
				</tr>
				
				<tr>
					<td width="155"><div align="right">Passed</div></td>
					<td width="155">
					<input type="text" style="text-align:right;" name="var_up_1time_pass" id="var_up_1time_pass" size="11" onfocus="this.select();" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($var_up_1time_pass)) echo $var_up_1time_pass; ?>">
					<input type="hidden" name="var_up_1time_pass_orig" id="var_up_1time_pass_orig" value="<?php if (isset($var_up_1time_pass_orig)) echo $var_up_1time_pass_orig; ?>"></td>
					<td width="155"><input type="text" style="text-align:right;" name="var_1time_pass" id="var_1time_pass" size="11" disabled value="<?php if (isset($var_1time_pass)) echo number_format($var_1time_pass); ?>">
					</td>
				</tr>

				<tr>
					<td width="155"><div align="right">Failed</div></td>
					<td width="155">
					<input type="text" style="text-align:right;" name="var_up_1time_fail" id="var_up_1time_fail" size="11" onfocus="this.select();" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($var_up_1time_fail)) echo $var_up_1time_fail; ?>">
					<input type="hidden" name="var_up_1time_fail_orig" id="var_up_1time_fail_orig" value="<?php if (isset($var_up_1time_fail_orig)) echo $var_up_1time_fail_orig; ?>">
					</td>
					<td width="155"><input type="text" style="text-align:right;" name="var_1time_fail" id="var_1time_fail" size="11" disabled value="<?php if (isset($var_1time_fail)) echo number_format($var_1time_fail); ?>"></td>
				</tr>

				<tr>
					<td><div align="right">Conditional</div></td>
					<td width="155">
					<input type="text" style="text-align:right;" name="var_up_1time_cond" id="var_up_1time_cond" size="11" onfocus="this.select();" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($var_up_1time_cond)) echo $var_up_1time_cond; ?>">
					<input type="hidden" name="var_up_1time_cond_orig" id="var_up_1time_cond_orig" value="<?php if (isset($var_up_1time_cond_orig)) echo $var_up_1time_cond_orig; ?>">
					</td>
					<td width="155"><input type="text" style="text-align:right;" name="var_1time_cond" id="var_1time_cond" size="11" disabled value="<?php if (isset($var_1time_cond)) echo number_format($var_1time_cond); ?>"></td>
				</tr>
				
				<tr>
					<td><div align="right">Total</div></td>
					<td>
					<input type="text" style="text-align:right;" name="var_up_1time_total" id="var_up_1time_total" size="11" disabled value="<?php if ( !isset($var_up_1time_total) || $var_up_1time_total == "") echo "0"; else echo number_format($var_up_1time_total); ?>">
					</td>
					<td><input type="text" style="text-align:right;" name="var_1time_total" id="var_1time_total" size="11" disabled value="<?php if (isset($var_1time_total)) echo number_format($var_1time_total); ?>"></td>
				</tr>

				<tr>
					<td><div align="right">% Passed</div></td>
					<td>
					<input type="text" style="text-align:right;" name="var_up_1time_passpct" id="var_up_1time_passpct" size="11" disabled value="<?php if ( !isset($var_up_1time_passpct) || $var_up_1time_passpct == "") echo "0.00"; else echo number_format($var_up_1time_passpct, 2); ?>">
					</td>
					<td><input type="text" style="text-align:right;" name="var_1time_passpct" id="var_1time_passpct" size="11" disabled value="<?php if (isset($var_1time_passpct)) echo number_format($var_1time_passpct, 2); ?>"></td>
				</tr>
				
				<tr>
					<td width="155"></td>
					<td><hr/><b>UP Repeaters</b></td>
					<td><hr/><b>National Repeaters</b></td>
				</tr>

				<tr>
					<td><div align="right">Passed</div></td>
					<td>
					<input type="text" style="text-align:right;" name="var_up_repeat_pass" id="var_up_repeat_pass" size="11" onfocus="this.select();" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($var_up_repeat_pass)) echo $var_up_repeat_pass; ?>">
					<input type="hidden" name="var_up_repeat_pass_orig" id="var_up_repeat_pass_orig" value="<?php if (isset($var_up_repeat_pass_orig)) echo $var_up_repeat_pass_orig; ?>">
					</td>
					<td><input type="text" style="text-align:right;" name="var_repeat_pass" id="var_repeat_pass" size="11" disabled value="<?php if (isset($var_repeat_pass)) echo number_format($var_repeat_pass); ?>"></td>
				</tr>

				<tr>
					<td><div align="right">Failed</div></td>
					<td>
					<input type="text" style="text-align:right;" name="var_up_repeat_fail" id="var_up_repeat_fail" size="11" onfocus="this.select();" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($var_up_repeat_fail)) echo $var_up_repeat_fail; ?>">
					<input type="hidden" name="var_up_repeat_fail_orig" id="var_up_repeat_fail_orig" value="<?php if (isset($var_up_repeat_fail_orig)) echo $var_up_repeat_fail_orig; ?>">
					</td>
					<td><input type="text" style="text-align:right;" name="var_repeat_fail" id="var_repeat_fail" size="11" disabled value="<?php if (isset($var_repeat_fail)) echo number_format($var_repeat_fail); ?>"></td>
				</tr>

				<tr>
					<td><div align="right">Conditional</div></td>
					<td>
					<input type="text" style="text-align:right;" name="var_up_repeat_cond" id="var_up_repeat_cond" size="11" onfocus="this.select();" onblur="checkban(this.id, 1) && setAttributesandValues()" maxlength="6" placeholder="0" value="<?php if (isset($var_up_repeat_cond)) echo $var_up_repeat_cond; ?>">
					<input type="hidden" name="var_up_repeat_cond_orig" id="var_up_repeat_cond_orig" value="<?php if (isset($var_up_repeat_cond_orig)) echo $var_up_repeat_cond_orig; ?>">
					</td>
					<td><input type="text" style="text-align:right;" name="var_repeat_cond" id="var_repeat_cond" size="11" disabled value="<?php if (isset($var_repeat_cond)) echo number_format($var_repeat_cond); ?>"></td>
				</tr>
				
				<tr>
					<td><div align="right">Total</div></td>
					<td>
						<input type="text" style="text-align:right;" name="var_up_repeat_total" id="var_up_repeat_total" size="11" disabled value="<?php if (!isset($var_up_repeat_total) || $var_up_repeat_total == "") echo "0"; else echo number_format($var_up_repeat_total); ?>">
					</td>
					<td><input type="text" style="text-align:right;" name="var_repeat_total" id="var_repeat_total" size="11" disabled value="<?php if (isset($var_repeat_total)) echo number_format($var_repeat_total); ?>"></td>
				</tr>

				<tr>
					<td><div align="right">% Passed</div></td>
					<td>
						<input type="text" style="text-align:right;" name="var_up_repeat_passpct" id="var_up_repeat_passpct" size="11" disabled value="<?php if (!isset($var_up_repeat_passpct) || $var_up_repeat_passpct == "") echo "0.00"; else echo number_format($var_up_repeat_passpct, 2); ?>">
					</td>
					<td><input type="text" style="text-align:right;" name="var_repeat_passpct" id="var_repeat_passpct" size="11" disabled value="<?php if (isset($var_repeat_passpct)) echo number_format($var_repeat_passpct, 2); ?>"></td>
				</tr>

				<tr>
					<td width="155"></td>
					<td><hr/><b>UP Overall</b></td>
					<td><hr/><b>National Overall</b></td>
				</tr>

				<tr>
					<td><div align="right">Passed</div></td>
					<td>
						<input type="text" style="text-align:right;" name="var_up_total_pass" id="var_up_total_pass" size="11" disabled value="<?php if (!isset($var_up_total_pass) || $var_up_total_pass == "") echo "0"; else echo number_format($var_up_total_pass); ?>">
					</td>
					<td><input type="text" style="text-align:right;" name="var_total_pass" id="var_total_pass" size="11" disabled value="<?php if (isset($var_total_pass)) echo number_format($var_total_pass); ?>"></td>
				</tr>

				<tr>
					<td><div align="right">Failed</div></td>
					<td>
						<input type="text" style="text-align:right;" name="var_up_total_fail" id="var_up_total_fail" size="11" disabled value="<?php if (!isset($var_up_total_fail) || $var_up_total_fail == "") echo "0"; else echo number_format($var_up_total_fail); ?>">
					</td>
					<td><input type="text" style="text-align:right;" name="var_total_fail" id="var_total_fail" size="11" disabled value="<?php if (isset($var_total_fail)) echo number_format($var_total_fail); ?>"></td>
				</tr>

				<tr>
					<td><div align="right">Conditional</div></td>
					<td>
						<input type="text" style="text-align:right;" name="var_up_total_cond" id="var_up_total_cond" size="11" disabled value="<?php if (!isset($var_up_total_cond) || $var_up_total_cond == "") echo "0"; else echo number_format($var_up_total_cond); ?>">
					</td>
					<td><input type="text" style="text-align:right;" name="var_total_cond" id="var_total_cond" size="11" disabled value="<?php if (isset($var_total_cond)) echo number_format($var_total_cond); ?>"></td>
				</tr>

				<tr>
					<td><div align="right">Total</div></td>
					<td>
						<input type="text" style="text-align:right;" name="var_up_total_total" id="var_up_total_total" size="11" disabled value="<?php if (!isset($var_up_total_total) || $var_up_total_total == "") echo "0"; else echo number_format($var_up_total_total); ?>">
					</td>
					<td><input type="text" style="text-align:right;" name="var_total_total" id="var_total_total" size="11" disabled value="<?php if (isset($var_total_total)) echo number_format($var_total_total); ?>"></td>
				</tr>

				<tr>
					<td><div align="right">% Passed</div></td>
					<td>
						<input type="text" style="text-align:right;" name="var_up_total_passpct" id="var_up_total_passpct" size="11" disabled value="<?php if (!isset($var_up_total_passpct) || $var_up_total_passpct == "") echo "0.00"; else echo number_format($var_up_total_passpct, 2); ?>">
					</td>
					<td><input type="text" style="text-align:right;" name="var_total_passpct" id="var_total_passpct" size="11" disabled value="<?php if (isset($var_total_passpct)) echo number_format($var_total_passpct, 2); ?>"></td>
				</tr>
				
				<tr><th scope="row"><p></p></th></tr>
			</table>
			
			<table>
				<tr>
					<td width="155"><div align="right">Source Document Link (PRC Website)</div></td>
					<td width="550"><input name="var_srclink" type="text" required id="var_srclink" size="49" maxlength="255" onfocus="this.select();" value="<?php if (isset($var_srclink)) echo $var_srclink; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><i>(For attachment below, use the PRC website link as indicated above to download the PRC official results in "Performance of Schools". For other source, please indicate in the above box other valid link.)</i>
					<p></p></td>
				</tr>

				<tr>
					<td><div align="right">Prescribed Attachment 1 Filename</div></td>
					<td><textarea name="var_attachmt1" id="var_attachmt1" readonly cols="50" rows="6" ><?php if (!isset($var_attachmt1) || $var_attachmt1=="") echo $prcfilename1; else echo $var_attachmt1; ?></textarea></td>
				</tr>

				<tr>
					<td></td>
					<td><i>(Copy the above prescribed filename to upload the PDF copy of the official results from PRC.  Extract the pages concerning UP results only, not the whole file.)</i>
					<p></p></td>
				</tr>

				<tr>
					<td align="right">File 1 to upload</td>
					<td><input type="file" name="highed_prcfile1" required id="highed_prcfile1" onblur="alertFilename(this.id, document.getElementById('var_attachmt1').value)"></td>
				</tr>

				<tr>
					<td></td>
					<td><i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit.)</i>
					<p></p></td>
				</tr>

				<tr>
					<td><div align="right">Prescribed Attachment 2 Filename</div></td>
					<td><textarea name="var_attachmt2" id="var_attachmt2" readonly cols="50" rows="6" ><?php if (!isset($var_attachmt2) || $var_attachmt2=="") echo $prcfilename2; else echo $var_attachmt2; ?></textarea></td>
				</tr>
				
				<tr>
					<td></td>
					<td><i>(Copy the above prescribed filename to upload the PDF copy of the exam results from source other than PRC.  Explanation for using other source should also be included.)</i>
					<p></p></td>
				</tr>
				
				<tr>
					<td align="right">File 2 to upload</td>
					<td><input type="file" name="highed_prcfile2" id="highed_prcfile2" <?php if (!isset($var_attachmt2) || $var_attachmt2=="") echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt2').value)"></td>
				</tr>

				<tr>
					<td></td>
					<td><i>(Select the file with the prescribed filename from your computer; PDF only with 5MB limit.)</i>
					<p></p></td>
				</tr>
				
			</table>
