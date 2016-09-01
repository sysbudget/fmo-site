
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
					<th width="155">Patients Under Surveillance<br>(A)</th>
					<th width="155">Patients with HAI<br>(B)</th>
					<th width="155">Infection Rate (%)<br>(C)=(B/A)x100</th>
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
					<td width="155"><div align="right">January</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patients_01count" id="var_patients_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patients_01count)) echo $var_patients_01count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patientshai_01count" id="var_patientshai_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patientshai_01count)) echo $var_patientshai_01count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_01count_pct" id="var_hai_01count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_01count_pct)) echo number_format($var_hai_01count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">February</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patients_02count" id="var_patients_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patients_02count)) echo $var_patients_02count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patientshai_02count" id="var_patientshai_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patientshai_02count)) echo $var_patientshai_02count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_02count_pct" id="var_hai_02count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_02count_pct)) echo number_format($var_hai_02count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">March</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patients_03count" id="var_patients_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patients_03count)) echo $var_patients_03count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patientshai_03count" id="var_patientshai_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patientshai_03count)) echo $var_patientshai_03count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_03count_pct" id="var_hai_03count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_03count_pct)) echo number_format($var_hai_03count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_patients_q1count" id="var_patients_q1count" disabled placeholder="0" value="<?php if (isset($var_patients_q1count)) echo number_format($var_patients_q1count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_patientshai_q1count" id="var_patientshai_q1count" disabled placeholder="0" value="<?php if (isset($var_patientshai_q1count)) echo number_format($var_patientshai_q1count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_q1count_pct" id="var_hai_q1count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_q1count_pct)) echo number_format($var_hai_q1count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">SECOND QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">April</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patients_04count" id="var_patients_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patients_04count)) echo $var_patients_04count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patientshai_04count" id="var_patientshai_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patientshai_04count)) echo $var_patientshai_04count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_04count_pct" id="var_hai_04count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_04count_pct)) echo number_format($var_hai_04count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">May</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patients_05count" id="var_patients_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patients_05count)) echo $var_patients_05count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patientshai_05count" id="var_patientshai_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patientshai_05count)) echo $var_patientshai_05count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_05count_pct" id="var_hai_05count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_05count_pct)) echo number_format($var_hai_05count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">June</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patients_06count" id="var_patients_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patients_06count)) echo $var_patients_06count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patientshai_06count" id="var_patientshai_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patientshai_06count)) echo $var_patientshai_06count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_06count_pct" id="var_hai_06count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_06count_pct)) echo number_format($var_hai_06count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_patients_q2count" id="var_patients_q2count" disabled placeholder="0" value="<?php if (isset($var_patients_q2count)) echo number_format($var_patients_q2count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_patientshai_q2count" id="var_patientshai_q2count" disabled placeholder="0" value="<?php if (isset($var_patientshai_q2count)) echo number_format($var_patientshai_q2count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_q2count_pct" id="var_hai_q2count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_q2count_pct)) echo number_format($var_hai_q2count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">THIRD QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">July</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patients_07count" id="var_patients_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patients_07count)) echo $var_patients_07count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patientshai_07count" id="var_patientshai_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patientshai_07count)) echo $var_patientshai_07count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_07count_pct" id="var_hai_07count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_07count_pct)) echo number_format($var_hai_07count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">August</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patients_08count" id="var_patients_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patients_08count)) echo $var_patients_08count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patientshai_08count" id="var_patientshai_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patientshai_08count)) echo $var_patientshai_08count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_08count_pct" id="var_hai_08count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_08count_pct)) echo number_format($var_hai_08count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">September</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patients_09count" id="var_patients_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patients_09count)) echo $var_patients_09count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patientshai_09count" id="var_patientshai_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patientshai_09count)) echo $var_patientshai_09count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_09count_pct" id="var_hai_09count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_09count_pct)) echo number_format($var_hai_09count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_patients_q3count" id="var_patients_q3count" disabled placeholder="0" value="<?php if (isset($var_patients_q3count)) echo number_format($var_patients_q3count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_patientshai_q3count" id="var_patientshai_q3count" disabled placeholder="0" value="<?php if (isset($var_patientshai_q3count)) echo number_format($var_patientshai_q3count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_q3count_pct" id="var_hai_q3count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_q3count_pct)) echo number_format($var_hai_q3count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">FOURTH QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">October</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patients_10count" id="var_patients_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patients_10count)) echo $var_patients_10count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patientshai_10count" id="var_patientshai_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patientshai_10count)) echo $var_patientshai_10count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_10count_pct" id="var_hai_10count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_10count_pct)) echo number_format($var_hai_10count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">November</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patients_11count" id="var_patients_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patients_11count)) echo $var_patients_11count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patientshai_11count" id="var_patientshai_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patientshai_11count)) echo $var_patientshai_11count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_11count_pct" id="var_hai_11count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_11count_pct)) echo number_format($var_hai_11count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">December</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patients_12count" id="var_patients_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patients_12count)) echo $var_patients_12count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_patientshai_12count" id="var_patientshai_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_patientshai_12count)) echo $var_patientshai_12count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_12count_pct" id="var_hai_12count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_12count_pct)) echo number_format($var_hai_12count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_patients_q4count" id="var_patients_q4count" disabled placeholder="0" value="<?php if (isset($var_patients_q4count)) echo number_format($var_patients_q4count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_patientshai_q4count" id="var_patientshai_q4count" disabled placeholder="0" value="<?php if (isset($var_patientshai_q4count)) echo number_format($var_patientshai_q4count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_q4count_pct" id="var_hai_q4count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_q4count_pct)) echo number_format($var_hai_q4count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_patients_totalcount" id="var_patients_totalcount" disabled placeholder="0" value="<?php if (isset($var_patients_totalcount)) echo number_format($var_patients_totalcount); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_patientshai_totalcount" id="var_patientshai_totalcount" disabled placeholder="0" value="<?php if (isset($var_patientshai_totalcount)) echo number_format($var_patientshai_totalcount); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_hai_totalcount_pct" id="var_hai_totalcount_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_hai_totalcount_pct)) echo number_format($var_hai_totalcount_pct, 2); ?>">
					</div></td>
				</tr>

			</table>
			
