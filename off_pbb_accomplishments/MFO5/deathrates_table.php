
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
					<th width="155">Discharges<br>(A)</th>
					<th width="155">Deaths<br>(B)</th>
					<th width="155">Deaths<br>in less than 48 hours<br>(C)</th>
					<th width="155">Net Death Rate (%)<br>(D)=((B-C)/(A-C))x100</th>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="155"><hr/></th>
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
					<input type="number" style="text-align:right;" name="var_dischrg_01count" id="var_dischrg_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dischrg_01count)) echo $var_dischrg_01count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_d_01count" id="var_d_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_d_01count)) echo $var_d_01count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dl48_01count" id="var_dl48_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dl48_01count)) echo $var_dl48_01count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_01count_pct" id="var_ndr_01count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_01count_pct)) echo number_format($var_ndr_01count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">February</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dischrg_02count" id="var_dischrg_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dischrg_02count)) echo $var_dischrg_02count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_d_02count" id="var_d_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_d_02count)) echo $var_d_02count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dl48_02count" id="var_dl48_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dl48_02count)) echo $var_dl48_02count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_02count_pct" id="var_ndr_02count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_02count_pct)) echo number_format($var_ndr_02count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">March</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dischrg_03count" id="var_dischrg_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dischrg_03count)) echo $var_dischrg_03count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_d_03count" id="var_d_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_d_03count)) echo $var_d_03count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dl48_03count" id="var_dl48_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dl48_03count)) echo $var_dl48_03count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_03count_pct" id="var_ndr_03count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_03count_pct)) echo number_format($var_ndr_03count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
				</tr>

				<tr>
					<td width="155"><div align="right">Sub-Total</div></td>
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_dischrg_q1count" id="var_dischrg_q1count" disabled placeholder="0" value="<?php if (isset($var_dischrg_q1count)) echo number_format($var_dischrg_q1count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_d_q1count" id="var_d_q1count" disabled placeholder="0" value="<?php if (isset($var_d_q1count)) echo number_format($var_d_q1count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_dl48_q1count" id="var_dl48_q1count" disabled placeholder="0" value="<?php if (isset($var_dl48_q1count)) echo number_format($var_dl48_q1count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_q1count_pct" id="var_ndr_q1count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_q1count_pct)) echo number_format($var_ndr_q1count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">SECOND QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">April</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dischrg_04count" id="var_dischrg_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dischrg_04count)) echo $var_dischrg_04count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_d_04count" id="var_d_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_d_04count)) echo $var_d_04count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dl48_04count" id="var_dl48_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dl48_04count)) echo $var_dl48_04count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_04count_pct" id="var_ndr_04count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_04count_pct)) echo number_format($var_ndr_04count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">May</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dischrg_05count" id="var_dischrg_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dischrg_05count)) echo $var_dischrg_05count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_d_05count" id="var_d_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_d_05count)) echo $var_d_05count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dl48_05count" id="var_dl48_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dl48_05count)) echo $var_dl48_05count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_05count_pct" id="var_ndr_05count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_05count_pct)) echo number_format($var_ndr_05count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">June</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dischrg_06count" id="var_dischrg_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dischrg_06count)) echo $var_dischrg_06count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_d_06count" id="var_d_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_d_06count)) echo $var_d_06count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dl48_06count" id="var_dl48_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dl48_06count)) echo $var_dl48_06count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_06count_pct" id="var_ndr_06count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_06count_pct)) echo number_format($var_ndr_06count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
				</tr>

				<tr>
					<td width="155"><div align="right">Sub-Total</div></td>
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_dischrg_q2count" id="var_dischrg_q2count" disabled placeholder="0" value="<?php if (isset($var_dischrg_q2count)) echo number_format($var_dischrg_q2count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_d_q2count" id="var_d_q2count" disabled placeholder="0" value="<?php if (isset($var_d_q2count)) echo number_format($var_d_q2count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_dl48_q2count" id="var_dl48_q2count" disabled placeholder="0" value="<?php if (isset($var_dl48_q2count)) echo number_format($var_dl48_q2count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_q2count_pct" id="var_ndr_q2count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_q2count_pct)) echo number_format($var_ndr_q2count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">THIRD QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">July</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dischrg_07count" id="var_dischrg_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dischrg_07count)) echo $var_dischrg_07count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_d_07count" id="var_d_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_d_07count)) echo $var_d_07count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dl48_07count" id="var_dl48_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dl48_07count)) echo $var_dl48_07count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_07count_pct" id="var_ndr_07count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_07count_pct)) echo number_format($var_ndr_07count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">August</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dischrg_08count" id="var_dischrg_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dischrg_08count)) echo $var_dischrg_08count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_d_08count" id="var_d_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_d_08count)) echo $var_d_08count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dl48_08count" id="var_dl48_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dl48_08count)) echo $var_dl48_08count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_08count_pct" id="var_ndr_08count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_08count_pct)) echo number_format($var_ndr_08count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">September</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dischrg_09count" id="var_dischrg_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dischrg_09count)) echo $var_dischrg_09count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_d_09count" id="var_d_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_d_09count)) echo $var_d_09count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dl48_09count" id="var_dl48_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dl48_09count)) echo $var_dl48_09count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_09count_pct" id="var_ndr_09count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_09count_pct)) echo number_format($var_ndr_09count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
				</tr>

				<tr>
					<td width="155"><div align="right">Sub-Total</div></td>
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_dischrg_q3count" id="var_dischrg_q3count" disabled placeholder="0" value="<?php if (isset($var_dischrg_q3count)) echo number_format($var_dischrg_q3count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_d_q3count" id="var_d_q3count" disabled placeholder="0" value="<?php if (isset($var_d_q3count)) echo number_format($var_d_q3count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_dl48_q3count" id="var_dl48_q3count" disabled placeholder="0" value="<?php if (isset($var_dl48_q3count)) echo number_format($var_dl48_q3count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_q3count_pct" id="var_ndr_q3count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_q3count_pct)) echo number_format($var_ndr_q3count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">FOURTH QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">October</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dischrg_10count" id="var_dischrg_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dischrg_10count)) echo $var_dischrg_10count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_d_10count" id="var_d_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_d_10count)) echo $var_d_10count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dl48_10count" id="var_dl48_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dl48_10count)) echo $var_dl48_10count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_10count_pct" id="var_ndr_10count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_10count_pct)) echo number_format($var_ndr_10count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">November</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dischrg_11count" id="var_dischrg_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dischrg_11count)) echo $var_dischrg_11count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_d_11count" id="var_d_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_d_11count)) echo $var_d_11count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dl48_11count" id="var_dl48_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dl48_11count)) echo $var_dl48_11count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_11count_pct" id="var_ndr_11count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_11count_pct)) echo number_format($var_ndr_11count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">December</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dischrg_12count" id="var_dischrg_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dischrg_12count)) echo $var_dischrg_12count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_d_12count" id="var_d_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_d_12count)) echo $var_d_12count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_dl48_12count" id="var_dl48_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_dl48_12count)) echo $var_dl48_12count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_12count_pct" id="var_ndr_12count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_12count_pct)) echo number_format($var_ndr_12count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
				</tr>

				<tr>
					<td width="155"><div align="right">Sub-Total</div></td>
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_dischrg_q4count" id="var_dischrg_q4count" disabled placeholder="0" value="<?php if (isset($var_dischrg_q4count)) echo number_format($var_dischrg_q4count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_d_q4count" id="var_d_q4count" disabled placeholder="0" value="<?php if (isset($var_d_q4count)) echo number_format($var_d_q4count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_dl48_q4count" id="var_dl48_q4count" disabled placeholder="0" value="<?php if (isset($var_dl48_q4count)) echo number_format($var_dl48_q4count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_q4count_pct" id="var_ndr_q4count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_q4count_pct)) echo number_format($var_ndr_q4count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th width="155"></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
					<th width="155"><hr/></th>
				</tr>

				<tr>
					<th width="155"><div align="right">Grand Total</div></th>
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_dischrg_totalcount" id="var_dischrg_totalcount" disabled placeholder="0" value="<?php if (isset($var_dischrg_totalcount)) echo number_format($var_dischrg_totalcount); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_d_totalcount" id="var_d_totalcount" disabled placeholder="0" value="<?php if (isset($var_d_totalcount)) echo number_format($var_d_totalcount); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_dl48_totalcount" id="var_dl48_totalcount" disabled placeholder="0" value="<?php if (isset($var_dl48_totalcount)) echo number_format($var_dl48_totalcount); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ndr_totalcount_pct" id="var_ndr_totalcount_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_ndr_totalcount_pct)) echo number_format($var_ndr_totalcount_pct, 2); ?>">
					</div></td>
				</tr>

			</table>
			
