
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
					<th width="155">Emergency Surgeries</th>
					<th width="155">Elective Surgeries</th>
					<th width="155">Average Waiting Period Per Elective Surgery<br>(in Weeks)*</th>
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
					<input type="number" style="text-align:right;" name="var_emer_01count" id="var_emer_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_emer_01count)) echo $var_emer_01count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_01count" id="var_elec_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_01count)) echo $var_elec_01count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_wait_01count" id="var_elec_wait_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()" placeholder="0" value="<?php if (isset($var_elec_wait_01count)) echo $var_elec_wait_01count; ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">February</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_emer_02count" id="var_emer_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_emer_02count)) echo $var_emer_02count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_02count" id="var_elec_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_02count)) echo $var_elec_02count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_wait_02count" id="var_elec_wait_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_wait_02count)) echo $var_elec_wait_02count; ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">March</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_emer_03count" id="var_emer_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_emer_03count)) echo $var_emer_03count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_03count" id="var_elec_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_03count)) echo $var_elec_03count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_wait_03count" id="var_elec_wait_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_wait_03count)) echo $var_elec_wait_03count; ?>">
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
					<input type="text" style="text-align:right;" name="var_emer_q1count" id="var_emer_q1count" disabled placeholder="0" value="<?php if (isset($var_emer_q1count)) echo number_format($var_emer_q1count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_elec_q1count" id="var_elec_q1count" disabled placeholder="0" value="<?php if (isset($var_elec_q1count)) echo number_format($var_elec_q1count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_elec_wait_q1count" id="var_elec_wait_q1count" disabled placeholder="0" value="<?php if (isset($var_elec_wait_q1count)) echo number_format($var_elec_wait_q1count); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">SECOND QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">April</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_emer_04count" id="var_emer_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_emer_04count)) echo $var_emer_04count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_04count" id="var_elec_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_04count)) echo $var_elec_04count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_wait_04count" id="var_elec_wait_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_wait_04count)) echo $var_elec_wait_04count; ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">May</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_emer_05count" id="var_emer_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_emer_05count)) echo $var_emer_05count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_05count" id="var_elec_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_05count)) echo $var_elec_05count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_wait_05count" id="var_elec_wait_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_wait_05count)) echo $var_elec_wait_05count; ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">June</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_emer_06count" id="var_emer_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_emer_06count)) echo $var_emer_06count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_06count" id="var_elec_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_06count)) echo $var_elec_06count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_wait_06count" id="var_elec_wait_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_wait_06count)) echo $var_elec_wait_06count; ?>">
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
					<input type="text" style="text-align:right;" name="var_emer_q2count" id="var_emer_q2count" disabled placeholder="0" value="<?php if (isset($var_emer_q2count)) echo number_format($var_emer_q2count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_elec_q2count" id="var_elec_q2count" disabled placeholder="0" value="<?php if (isset($var_elec_q2count)) echo number_format($var_elec_q2count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_elec_wait_q2count" id="var_elec_wait_q2count" disabled placeholder="0" value="<?php if (isset($var_elec_wait_q2count)) echo number_format($var_elec_wait_q2count); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">THIRD QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">July</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_emer_07count" id="var_emer_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_emer_07count)) echo $var_emer_07count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_07count" id="var_elec_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_07count)) echo $var_elec_07count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_wait_07count" id="var_elec_wait_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_wait_07count)) echo $var_elec_wait_07count; ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">August</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_emer_08count" id="var_emer_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_emer_08count)) echo $var_emer_08count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_08count" id="var_elec_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_08count)) echo $var_elec_08count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_wait_08count" id="var_elec_wait_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_wait_08count)) echo $var_elec_wait_08count; ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">September</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_emer_09count" id="var_emer_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_emer_09count)) echo $var_emer_09count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_09count" id="var_elec_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_09count)) echo $var_elec_09count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_wait_09count" id="var_elec_wait_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_wait_09count)) echo $var_elec_wait_09count; ?>">
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
					<input type="text" style="text-align:right;" name="var_emer_q3count" id="var_emer_q3count" disabled placeholder="0" value="<?php if (isset($var_emer_q3count)) echo number_format($var_emer_q3count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_elec_q3count" id="var_elec_q3count" disabled placeholder="0" value="<?php if (isset($var_elec_q3count)) echo number_format($var_elec_q3count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_elec_wait_q3count" id="var_elec_wait_q3count" disabled placeholder="0" value="<?php if (isset($var_elec_wait_q3count)) echo number_format($var_elec_wait_q3count); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">FOURTH QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">October</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_emer_10count" id="var_emer_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_emer_10count)) echo $var_emer_10count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_10count" id="var_elec_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_10count)) echo $var_elec_10count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_wait_10count" id="var_elec_wait_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_wait_10count)) echo $var_elec_wait_10count; ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">November</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_emer_11count" id="var_emer_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_emer_11count)) echo $var_emer_11count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_11count" id="var_elec_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_11count)) echo $var_elec_11count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_wait_11count" id="var_elec_wait_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_wait_11count)) echo $var_elec_wait_11count; ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">December</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_emer_12count" id="var_emer_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_emer_12count)) echo $var_emer_12count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_12count" id="var_elec_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_12count)) echo $var_elec_12count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_elec_wait_12count" id="var_elec_wait_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_elec_wait_12count)) echo $var_elec_wait_12count; ?>">
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
					<input type="text" style="text-align:right;" name="var_emer_q4count" id="var_emer_q4count" disabled placeholder="0" value="<?php if (isset($var_emer_q4count)) echo number_format($var_emer_q4count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_elec_q4count" id="var_elec_q4count" disabled placeholder="0" value="<?php if (isset($var_elec_q4count)) echo number_format($var_elec_q4count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_elec_wait_q4count" id="var_elec_wait_q4count" disabled placeholder="0" value="<?php if (isset($var_elec_wait_q4count)) echo number_format($var_elec_wait_q4count); ?>">
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
					<input type="text" style="text-align:right;" name="var_emer_totalcount" id="var_emer_totalcount" disabled placeholder="0" value="<?php if (isset($var_emer_totalcount)) echo number_format($var_emer_totalcount); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_elec_totalcount" id="var_elec_totalcount" disabled placeholder="0" value="<?php if (isset($var_elec_totalcount)) echo number_format($var_elec_totalcount); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_elec_wait_totalcount" id="var_elec_wait_totalcount" disabled placeholder="0" value="<?php if (isset($var_elec_wait_totalcount)) echo number_format($var_elec_wait_totalcount); ?>">
					</div></td>
				</tr>

			</table>
			
			<p>*Zero = Less than one (1) week<br></p>