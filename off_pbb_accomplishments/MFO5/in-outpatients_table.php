
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
					<th width="155"></th>
					<th width="155"></th>
					<th width="310">Out-Patients Medically Attended to within Two Hours after Registration<hr/></th>
				</tr>
			<table>
			
			<table>
				<tr>
					<th width="155"></th>
					<th width="155">Number of In-Patients Managed<br>(A)</th>
					<th width="155">Number of Out-Patients Managed<br>(B)</th>
					<th width="155">Number<br>(C)</th>
					<th width="155">Rate (%)<br>(D)=(C/B)x100</th>
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
					<input type="number" style="text-align:right;" name="var_ip_01count" id="var_ip_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ip_01count)) echo $var_ip_01count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_01count" id="var_op_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_01count)) echo $var_op_01count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_attn_01count" id="var_op_attn_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_attn_01count)) echo $var_op_attn_01count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_01count_pct" id="var_op_attn_01count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_01count_pct)) echo number_format($var_op_attn_01count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">February</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ip_02count" id="var_ip_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ip_02count)) echo $var_ip_02count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_02count" id="var_op_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_02count)) echo $var_op_02count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_attn_02count" id="var_op_attn_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_attn_02count)) echo $var_op_attn_02count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_02count_pct" id="var_op_attn_02count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_02count_pct)) echo number_format($var_op_attn_02count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">March</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ip_03count" id="var_ip_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ip_03count)) echo $var_ip_03count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_03count" id="var_op_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_03count)) echo $var_op_03count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_attn_03count" id="var_op_attn_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_attn_03count)) echo $var_op_attn_03count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_03count_pct" id="var_op_attn_03count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_03count_pct)) echo number_format($var_op_attn_03count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_ip_q1count" id="var_ip_q1count" disabled placeholder="0" value="<?php if (isset($var_ip_q1count)) echo number_format($var_ip_q1count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_q1count" id="var_op_q1count" disabled placeholder="0" value="<?php if (isset($var_op_q1count)) echo number_format($var_op_q1count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_q1count" id="var_op_attn_q1count" disabled placeholder="0" value="<?php if (isset($var_op_attn_q1count)) echo number_format($var_op_attn_q1count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_q1count_pct" id="var_op_attn_q1count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_q1count_pct)) echo number_format($var_op_attn_q1count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">SECOND QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">April</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ip_04count" id="var_ip_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ip_04count)) echo $var_ip_04count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_04count" id="var_op_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_04count)) echo $var_op_04count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_attn_04count" id="var_op_attn_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_attn_04count)) echo $var_op_attn_04count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_04count_pct" id="var_op_attn_04count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_04count_pct)) echo number_format($var_op_attn_04count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">May</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ip_05count" id="var_ip_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ip_05count)) echo $var_ip_05count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_05count" id="var_op_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_05count)) echo $var_op_05count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_attn_05count" id="var_op_attn_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_attn_05count)) echo $var_op_attn_05count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_05count_pct" id="var_op_attn_05count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_05count_pct)) echo number_format($var_op_attn_05count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">June</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ip_06count" id="var_ip_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ip_06count)) echo $var_ip_06count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_06count" id="var_op_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_06count)) echo $var_op_06count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_attn_06count" id="var_op_attn_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_attn_06count)) echo $var_op_attn_06count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_06count_pct" id="var_op_attn_06count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_06count_pct)) echo number_format($var_op_attn_06count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_ip_q2count" id="var_ip_q2count" disabled placeholder="0" value="<?php if (isset($var_ip_q2count)) echo number_format($var_ip_q2count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_q2count" id="var_op_q2count" disabled placeholder="0" value="<?php if (isset($var_op_q2count)) echo number_format($var_op_q2count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_q2count" id="var_op_attn_q2count" disabled placeholder="0" value="<?php if (isset($var_op_attn_q2count)) echo number_format($var_op_attn_q2count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_q2count_pct" id="var_op_attn_q2count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_q2count_pct)) echo number_format($var_op_attn_q2count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">THIRD QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">July</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ip_07count" id="var_ip_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ip_07count)) echo $var_ip_07count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_07count" id="var_op_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_07count)) echo $var_op_07count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_attn_07count" id="var_op_attn_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_attn_07count)) echo $var_op_attn_07count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_07count_pct" id="var_op_attn_07count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_07count_pct)) echo number_format($var_op_attn_07count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">August</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ip_08count" id="var_ip_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ip_08count)) echo $var_ip_08count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_08count" id="var_op_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_08count)) echo $var_op_08count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_attn_08count" id="var_op_attn_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_attn_08count)) echo $var_op_attn_08count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_08count_pct" id="var_op_attn_08count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_08count_pct)) echo number_format($var_op_attn_08count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">September</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ip_09count" id="var_ip_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ip_09count)) echo $var_ip_09count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_09count" id="var_op_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_09count)) echo $var_op_09count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_attn_09count" id="var_op_attn_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_attn_09count)) echo $var_op_attn_09count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_09count_pct" id="var_op_attn_09count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_09count_pct)) echo number_format($var_op_attn_09count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_ip_q3count" id="var_ip_q3count" disabled placeholder="0" value="<?php if (isset($var_ip_q3count)) echo number_format($var_ip_q3count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_q3count" id="var_op_q3count" disabled placeholder="0" value="<?php if (isset($var_op_q3count)) echo number_format($var_op_q3count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_q3count" id="var_op_attn_q3count" disabled placeholder="0" value="<?php if (isset($var_op_attn_q3count)) echo number_format($var_op_attn_q3count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_q3count_pct" id="var_op_attn_q3count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_q3count_pct)) echo number_format($var_op_attn_q3count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">FOURTH QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">October</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ip_10count" id="var_ip_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ip_10count)) echo $var_ip_10count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_10count" id="var_op_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_10count)) echo $var_op_10count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_attn_10count" id="var_op_attn_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_attn_10count)) echo $var_op_attn_10count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_10count_pct" id="var_op_attn_10count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_10count_pct)) echo number_format($var_op_attn_10count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">November</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ip_11count" id="var_ip_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ip_11count)) echo $var_ip_11count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_11count" id="var_op_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_11count)) echo $var_op_11count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_attn_11count" id="var_op_attn_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_attn_11count)) echo $var_op_attn_11count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_11count_pct" id="var_op_attn_11count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_11count_pct)) echo number_format($var_op_attn_11count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">December</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ip_12count" id="var_ip_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ip_12count)) echo $var_ip_12count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_12count" id="var_op_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_12count)) echo $var_op_12count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_op_attn_12count" id="var_op_attn_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_op_attn_12count)) echo $var_op_attn_12count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_12count_pct" id="var_op_attn_12count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_12count_pct)) echo number_format($var_op_attn_12count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_ip_q4count" id="var_ip_q4count" disabled placeholder="0" value="<?php if (isset($var_ip_q4count)) echo number_format($var_ip_q4count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_q4count" id="var_op_q4count" disabled placeholder="0" value="<?php if (isset($var_op_q4count)) echo number_format($var_op_q4count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_q4count" id="var_op_attn_q4count" disabled placeholder="0" value="<?php if (isset($var_op_attn_q4count)) echo number_format($var_op_attn_q4count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_q4count_pct" id="var_op_attn_q4count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_q4count_pct)) echo number_format($var_op_attn_q4count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_ip_totalcount" id="var_ip_totalcount" disabled placeholder="0" value="<?php if (isset($var_ip_totalcount)) echo number_format($var_ip_totalcount); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_totalcount" id="var_op_totalcount" disabled placeholder="0" value="<?php if (isset($var_op_totalcount)) echo number_format($var_op_totalcount); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_totalcount" id="var_op_attn_totalcount" disabled placeholder="0" value="<?php if (isset($var_op_attn_totalcount)) echo number_format($var_op_attn_totalcount); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_op_attn_totalcount_pct" id="var_op_attn_totalcount_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_op_attn_totalcount_pct)) echo number_format($var_op_attn_totalcount_pct, 2); ?>">
					</div></td>
				</tr>

			</table>
			
