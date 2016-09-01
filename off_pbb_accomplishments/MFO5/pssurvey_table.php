
			<table>
				<tr>
					<td width="155"><div align="right">Delivery Unit</div></td>
					<td width="550"><input type="text" size="80" disabled value="<?php if (isset($var_unit_delivery_name_cu)) echo $var_unit_delivery_name_cu; ?>">
					<input type="hidden" name="var_unit_delivery_id" value="<?php if (isset($var_unit_delivery_id)) echo $var_unit_delivery_id; ?>">
					</td>
				</tr>
				
				<tr>
					<td><div align="right">Contributing Unit</div><p></p></td>
					<td><input type="text" size="80" disabled value="<?php if (isset($var_unit_contributor_name)) echo $var_unit_contributor_name; ?>">
					<input type="hidden" name="var_unit_contributor_id" value="<?php if (isset($var_unit_contributor_id)) echo $var_unit_contributor_id; ?>">
					<p></p></td>
				</tr>
			</table>
			
			<table>
				<tr>
					<th width="155"></th>
					<th width="155">Respondents<br>(A)</th>
					<th width="155">Respondents Who Rated Hospital Services As Satisfactory or Better<br>(B)</th>
					<th width="155">Satisfactory Rate (%)<br>(C)=(B/A)x100</th>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
				</tr>
				
				<tr>
					<th><p></p><div align="right">FIRST QUARTER</div></th>
				</tr>
				
				<tr>
					<th width="155"><div align="right">January</div></th>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_clients_01count" id="var_clients_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_clients_01count)) echo $var_clients_01count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_satisfactorybetter_01count" id="var_satisfactorybetter_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_satisfactorybetter_01count)) echo $var_satisfactorybetter_01count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_01count_pct" id="var_satisfactorybetter_01count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_01count_pct)) echo number_format($var_satisfactorybetter_01count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"><div align="right">February</div></th>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_clients_02count" id="var_clients_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_clients_02count)) echo $var_clients_02count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_satisfactorybetter_02count" id="var_satisfactorybetter_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_satisfactorybetter_02count)) echo $var_satisfactorybetter_02count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_02count_pct" id="var_satisfactorybetter_02count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_02count_pct)) echo number_format($var_satisfactorybetter_02count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"><div align="right">March</div></th>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_clients_03count" id="var_clients_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_clients_03count)) echo $var_clients_03count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_satisfactorybetter_03count" id="var_satisfactorybetter_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_satisfactorybetter_03count)) echo $var_satisfactorybetter_03count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_03count_pct" id="var_satisfactorybetter_03count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_03count_pct)) echo number_format($var_satisfactorybetter_03count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
				</tr>

				<tr>
					<td width="155"><div align="right">Sub-Total</div></td>
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_clients_q1count" id="var_clients_q1count" disabled placeholder="0" value="<?php if (isset($var_clients_q1count)) echo number_format($var_clients_q1count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_q1count" id="var_satisfactorybetter_q1count" disabled placeholder="0" value="<?php if (isset($var_satisfactorybetter_q1count)) echo number_format($var_satisfactorybetter_q1count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_q1count_pct" id="var_satisfactorybetter_q1count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_q1count_pct)) echo number_format($var_satisfactorybetter_q1count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">SECOND QUARTER</div></th>
				</tr>
				
				<tr>
					<th width="155"><div align="right">April</div></th>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_clients_04count" id="var_clients_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_clients_04count)) echo $var_clients_04count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_satisfactorybetter_04count" id="var_satisfactorybetter_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_satisfactorybetter_04count)) echo $var_satisfactorybetter_04count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_04count_pct" id="var_satisfactorybetter_04count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_04count_pct)) echo number_format($var_satisfactorybetter_04count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"><div align="right">May</div></th>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_clients_05count" id="var_clients_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_clients_05count)) echo $var_clients_05count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_satisfactorybetter_05count" id="var_satisfactorybetter_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_satisfactorybetter_05count)) echo $var_satisfactorybetter_05count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_05count_pct" id="var_satisfactorybetter_05count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_05count_pct)) echo number_format($var_satisfactorybetter_05count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"><div align="right">June</div></th>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_clients_06count" id="var_clients_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_clients_06count)) echo $var_clients_06count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_satisfactorybetter_06count" id="var_satisfactorybetter_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_satisfactorybetter_06count)) echo $var_satisfactorybetter_06count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_06count_pct" id="var_satisfactorybetter_06count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_06count_pct)) echo number_format($var_satisfactorybetter_06count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
				</tr>

				<tr>
					<td width="155"><div align="right">Sub-Total</div></td>
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_clients_q2count" id="var_clients_q2count" disabled placeholder="0" value="<?php if (isset($var_clients_q2count)) echo number_format($var_clients_q2count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_q2count" id="var_satisfactorybetter_q2count" disabled placeholder="0" value="<?php if (isset($var_satisfactorybetter_q2count)) echo number_format($var_satisfactorybetter_q2count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_q2count_pct" id="var_satisfactorybetter_q2count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_q2count_pct)) echo number_format($var_satisfactorybetter_q2count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">THIRD QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">July</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_clients_07count" id="var_clients_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_clients_07count)) echo $var_clients_07count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_satisfactorybetter_07count" id="var_satisfactorybetter_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_satisfactorybetter_07count)) echo $var_satisfactorybetter_07count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_07count_pct" id="var_satisfactorybetter_07count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_07count_pct)) echo number_format($var_satisfactorybetter_07count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">August</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_clients_08count" id="var_clients_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_clients_08count)) echo $var_clients_08count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_satisfactorybetter_08count" id="var_satisfactorybetter_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_satisfactorybetter_08count)) echo $var_satisfactorybetter_08count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_08count_pct" id="var_satisfactorybetter_08count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_08count_pct)) echo number_format($var_satisfactorybetter_08count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">September</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_clients_09count" id="var_clients_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_clients_09count)) echo $var_clients_09count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_satisfactorybetter_09count" id="var_satisfactorybetter_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_satisfactorybetter_09count)) echo $var_satisfactorybetter_09count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_09count_pct" id="var_satisfactorybetter_09count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_09count_pct)) echo number_format($var_satisfactorybetter_09count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
				</tr>

				<tr>
					<td width="155"><div align="right">Sub-Total</div></td>
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_clients_q3count" id="var_clients_q3count" disabled placeholder="0" value="<?php if (isset($var_clients_q3count)) echo number_format($var_clients_q3count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_q3count" id="var_satisfactorybetter_q3count" disabled placeholder="0" value="<?php if (isset($var_satisfactorybetter_q3count)) echo number_format($var_satisfactorybetter_q3count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_q3count_pct" id="var_satisfactorybetter_q3count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_q3count_pct)) echo number_format($var_satisfactorybetter_q3count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">FOURTH QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">October</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_clients_10count" id="var_clients_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_clients_10count)) echo $var_clients_10count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_satisfactorybetter_10count" id="var_satisfactorybetter_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_satisfactorybetter_10count)) echo $var_satisfactorybetter_10count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_10count_pct" id="var_satisfactorybetter_10count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_10count_pct)) echo number_format($var_satisfactorybetter_10count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">November</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_clients_11count" id="var_clients_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_clients_11count)) echo $var_clients_11count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_satisfactorybetter_11count" id="var_satisfactorybetter_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_satisfactorybetter_11count)) echo $var_satisfactorybetter_11count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_11count_pct" id="var_satisfactorybetter_11count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_11count_pct)) echo number_format($var_satisfactorybetter_11count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">December</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_clients_12count" id="var_clients_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_clients_12count)) echo $var_clients_12count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_satisfactorybetter_12count" id="var_satisfactorybetter_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_satisfactorybetter_12count)) echo $var_satisfactorybetter_12count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_12count_pct" id="var_satisfactorybetter_12count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_12count_pct)) echo number_format($var_satisfactorybetter_12count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
				</tr>

				<tr>
					<td width="155"><div align="right">Sub-Total</div></td>
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_clients_q4count" id="var_clients_q4count" disabled placeholder="0" value="<?php if (isset($var_clients_q4count)) echo number_format($var_clients_q4count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_q4count" id="var_satisfactorybetter_q4count" disabled placeholder="0" value="<?php if (isset($var_satisfactorybetter_q4count)) echo number_format($var_satisfactorybetter_q4count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_q4count_pct" id="var_satisfactorybetter_q4count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_q4count_pct)) echo number_format($var_satisfactorybetter_q4count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
				</tr>

				<tr>
					<th width="155"><div align="right">Grand Total</div></th>
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_clients_totalcount" id="var_clients_totalcount" disabled placeholder="0" value="<?php if (isset($var_clients_totalcount)) echo number_format($var_clients_totalcount); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_totalcount" id="var_satisfactorybetter_totalcount" disabled placeholder="0" value="<?php if (isset($var_satisfactorybetter_totalcount)) echo number_format($var_satisfactorybetter_totalcount); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_satisfactorybetter_totalcount_pct" id="var_satisfactorybetter_totalcount_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_satisfactorybetter_totalcount_pct)) echo number_format($var_satisfactorybetter_totalcount_pct, 2); ?>">
					</div></td>
				</tr>

			</table>
			
<!-- Attachments section -->
			<br><br>
			<p><b>File Attachments</b>: Upload the PDF copy of the <u>survey's tabulated results endorsed by the Head of Unit</u>. Files must be of Adobe PDF type (.pdf) with 5MB size limit. Before choosing the file from your computer, you must rename it into the prescribed attachment filename.</p>
			
			<table>
				<tr>
					<th width="155"></th>
					<th width="550">Prescribed Attachment Filename</th>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="550"><hr/></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">January</div></td>
					<td width="550"><textarea name="var_attachmt1" id="var_attachmt1" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt1) || $var_attachmt1=="") echo $file1_attachment; else echo $var_attachmt1; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file1" id="var_was_uploaded_file1" value="<?php if (isset($var_attachmt1)) echo $var_attachmt1; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile1" id="hosp_surveyfile1" <?php if (!isset($var_clients_01count) || $var_clients_01count=0) echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt1').value)"></td>
				</tr>
				
				<tr>
					<td width="155"><div align="right">February</div></td>
					<td><textarea name="var_attachmt2" id="var_attachmt2" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt2) || $var_attachmt2=="") echo $file2_attachment; else echo $var_attachmt2; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file2" id="var_was_uploaded_file2" value="<?php if (isset($var_attachmt2)) echo $var_attachmt2; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile2" id="hosp_surveyfile2" <?php if (!isset($var_clients_02count) || $var_clients_02count=0) echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt2').value)"></td>
				</tr>

				<tr>
					<td width="155"><div align="right">March</div></td>
					<td><textarea name="var_attachmt3" id="var_attachmt3" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt3) || $var_attachmt3=="") echo $file3_attachment; else echo $var_attachmt3; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file3" id="var_was_uploaded_file3" value="<?php if (isset($var_attachmt3)) echo $var_attachmt3; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile3" id="hosp_surveyfile3" <?php if (!isset($var_clients_03count) || $var_clients_03count=0) echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt3').value)"></td>
				</tr>

				<tr>
					<td width="155"><div align="right">April</div></td>
					<td><textarea name="var_attachmt4" id="var_attachmt4" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt4) || $var_attachmt4=="") echo $file4_attachment; else echo $var_attachmt4; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file4" id="var_was_uploaded_file4" value="<?php if (isset($var_attachmt4)) echo $var_attachmt4; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile4" id="hosp_surveyfile4" <?php if (!isset($var_clients_04count) || $var_clients_04count=0) echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt4').value)"></td>
				</tr>

				<tr>
					<td width="155"><div align="right">May</div></td>
					<td><textarea name="var_attachmt5" id="var_attachmt5" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt5) || $var_attachmt5=="") echo $file5_attachment; else echo $var_attachmt5; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file5" id="var_was_uploaded_file5" value="<?php if (isset($var_attachmt5)) echo $var_attachmt5; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile5" id="hosp_surveyfile5" <?php if (!isset($var_clients_05count) || $var_clients_05count=0) echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt5').value)"></td>
				</tr>

				<tr>
					<td width="155"><div align="right">June</div></td>
					<td><textarea name="var_attachmt6" id="var_attachmt6" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt6) || $var_attachmt6=="") echo $file6_attachment; else echo $var_attachmt6; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file6" id="var_was_uploaded_file6" value="<?php if (isset($var_attachmt6)) echo $var_attachmt6; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile6" id="hosp_surveyfile6" <?php if (!isset($var_clients_06count) || $var_clients_06count=0) echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt6').value)"></td>
				</tr>

				<tr>
					<td width="155"><div align="right">July</div></td>
					<td><textarea name="var_attachmt7" id="var_attachmt7" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt7) || $var_attachmt7=="") echo $file7_attachment; else echo $var_attachmt7; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file7" id="var_was_uploaded_file7" value="<?php if (isset($var_attachmt7)) echo $var_attachmt7; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile7" id="hosp_surveyfile7" <?php if (!isset($var_clients_07count) || $var_clients_07count=0) echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt7').value)"></td>
				</tr>

				<tr>
					<td width="155"><div align="right">August</div></td>
					<td><textarea name="var_attachmt8" id="var_attachmt8" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt8) || $var_attachmt8=="") echo $file8_attachment; else echo $var_attachmt8; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file8" id="var_was_uploaded_file8" value="<?php if (isset($var_attachmt8)) echo $var_attachmt8; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile8" id="hosp_surveyfile8" <?php if (!isset($var_clients_08count) || $var_clients_08count=0) echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt8').value)"></td>
				</tr>

				<tr>
					<td width="155"><div align="right">September</div></td>
					<td><textarea name="var_attachmt9" id="var_attachmt9" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt9) || $var_attachmt9=="") echo $file9_attachment; else echo $var_attachmt9; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file9" id="var_was_uploaded_file9" value="<?php if (isset($var_attachmt9)) echo $var_attachmt9; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile9" id="hosp_surveyfile9" <?php if (!isset($var_clients_09count) || $var_clients_09count=0) echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt9').value)"></td>
				</tr>

				<tr>
					<td width="155"><div align="right">October</div></td>
					<td><textarea name="var_attachmt10" id="var_attachmt10" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt10) || $var_attachmt10=="") echo $file10_attachment; else echo $var_attachmt10; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file10" id="var_was_uploaded_file10" value="<?php if (isset($var_attachmt10)) echo $var_attachmt10; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile10" id="hosp_surveyfile10" <?php if (!isset($var_clients_10count) || $var_clients_10count=0) echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt10').value)"></td>
				</tr>

				<tr>
					<td width="155"><div align="right">November</div></td>
					<td><textarea name="var_attachmt11" id="var_attachmt11" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt11) || $var_attachmt11=="") echo $file11_attachment; else echo $var_attachmt11; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file11" id="var_was_uploaded_file11" value="<?php if (isset($var_attachmt11)) echo $var_attachmt11; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile11" id="hosp_surveyfile11" <?php if (!isset($var_clients_11count) || $var_clients_11count=0) echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt11').value)"></td>
				</tr>

				<tr>
					<td width="155"><div align="right">December</div></td>
					<td><textarea name="var_attachmt12" id="var_attachmt12" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt12) || $var_attachmt12=="") echo $file12_attachment; else echo $var_attachmt12; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file12" id="var_was_uploaded_file12" value="<?php if (isset($var_attachmt12)) echo $var_attachmt12; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile12" id="hosp_surveyfile12" <?php if (!isset($var_clients_12count) || $var_clients_12count=0) echo "disabled"; ?> onblur="alertFilename(this.id, document.getElementById('var_attachmt12').value)"></td>
				</tr>

				<tr>
					<td width="155"><div align="right">Sample Accomplished Survey Questionnaire</div></td>
					<td><textarea name="var_attachmt13" id="var_attachmt13" readonly cols="80" rows="1" ><?php if (!isset($var_attachmt13) || $var_attachmt13=="") echo $sample_attachment; else echo $var_attachmt13; ?></textarea>
					<input type="hidden" name="var_was_uploaded_file13" id="var_was_uploaded_file13" value="<?php if (isset($var_attachmt13)) echo $var_attachmt13; ?>"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="file" name="hosp_surveyfile13" id="hosp_surveyfile13" onblur="alertFilename(this.id, document.getElementById('var_attachmt13').value)"></td>
				</tr>

			</table>
