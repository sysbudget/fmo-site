
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
					<th width="155">Beds<br>(A)</th>
					<th width="155">In-Patient Care Days<br>(B)</th>
					<th width="155">Bed Days<br>(C)=(A) x Days in Month/Quarter</th>
					<th width="155">Bed Occupancy Rate (%)<br>(D)=(B/C)x100</th>
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
					<input type="number" style="text-align:right;" name="var_beds_01count" id="var_beds_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_beds_01count)) echo $var_beds_01count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ipdays_01count" id="var_ipdays_01count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ipdays_01count)) echo $var_ipdays_01count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_01count" id="var_bed_days_01count" disabled placeholder="0" value="<?php if (isset($var_bed_days_01count)) echo number_format($var_bed_days_01count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_01count_pct" id="var_bor_01count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_01count_pct)) echo number_format($var_bor_01count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">February</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_beds_02count" id="var_beds_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_beds_02count)) echo $var_beds_02count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ipdays_02count" id="var_ipdays_02count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ipdays_02count)) echo $var_ipdays_02count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_02count" id="var_bed_days_02count" disabled placeholder="0" value="<?php if (isset($var_bed_days_02count)) echo number_format($var_bed_days_02count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_02count_pct" id="var_bor_02count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_02count_pct)) echo number_format($var_bor_02count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">March</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_beds_03count" id="var_beds_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_beds_03count)) echo $var_beds_03count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ipdays_03count" id="var_ipdays_03count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ipdays_03count)) echo $var_ipdays_03count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_03count" id="var_bed_days_03count" disabled placeholder="0" value="<?php if (isset($var_bed_days_03count)) echo number_format($var_bed_days_03count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_03count_pct" id="var_bor_03count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_03count_pct)) echo number_format($var_bor_03count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_beds_q1count" id="var_beds_q1count" disabled placeholder="0" value="<?php if (isset($var_beds_q1count)) echo number_format($var_beds_q1count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ipdays_q1count" id="var_ipdays_q1count" disabled placeholder="0" value="<?php if (isset($var_ipdays_q1count)) echo number_format($var_ipdays_q1count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_q1count" id="var_bed_days_q1count" disabled placeholder="0" value="<?php if (isset($var_bed_days_q1count)) echo number_format($var_bed_days_q1count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_q1count_pct" id="var_bor_q1count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_q1count_pct)) echo number_format($var_bor_q1count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">SECOND QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">April</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_beds_04count" id="var_beds_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_beds_04count)) echo $var_beds_04count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ipdays_04count" id="var_ipdays_04count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ipdays_04count)) echo $var_ipdays_04count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_04count" id="var_bed_days_04count" disabled placeholder="0" value="<?php if (isset($var_bed_days_04count)) echo number_format($var_bed_days_04count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_04count_pct" id="var_bor_04count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_04count_pct)) echo number_format($var_bor_04count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">May</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_beds_05count" id="var_beds_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_beds_05count)) echo $var_beds_05count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ipdays_05count" id="var_ipdays_05count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ipdays_05count)) echo $var_ipdays_05count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_05count" id="var_bed_days_05count" disabled placeholder="0" value="<?php if (isset($var_bed_days_05count)) echo number_format($var_bed_days_05count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_05count_pct" id="var_bor_05count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_05count_pct)) echo number_format($var_bor_05count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">June</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_beds_06count" id="var_beds_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_beds_06count)) echo $var_beds_06count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ipdays_06count" id="var_ipdays_06count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ipdays_06count)) echo $var_ipdays_06count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_06count" id="var_bed_days_06count" disabled placeholder="0" value="<?php if (isset($var_bed_days_06count)) echo number_format($var_bed_days_06count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_06count_pct" id="var_bor_06count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_06count_pct)) echo number_format($var_bor_06count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_beds_q2count" id="var_beds_q2count" disabled placeholder="0" value="<?php if (isset($var_beds_q2count)) echo number_format($var_beds_q2count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ipdays_q2count" id="var_ipdays_q2count" disabled placeholder="0" value="<?php if (isset($var_ipdays_q2count)) echo number_format($var_ipdays_q2count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_q2count" id="var_bed_days_q2count" disabled placeholder="0" value="<?php if (isset($var_bed_days_q2count)) echo number_format($var_bed_days_q2count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_q2count_pct" id="var_bor_q2count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_q2count_pct)) echo number_format($var_bor_q2count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">THIRD QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">July</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_beds_07count" id="var_beds_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_beds_07count)) echo $var_beds_07count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ipdays_07count" id="var_ipdays_07count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ipdays_07count)) echo $var_ipdays_07count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_07count" id="var_bed_days_07count" disabled placeholder="0" value="<?php if (isset($var_bed_days_07count)) echo number_format($var_bed_days_07count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_07count_pct" id="var_bor_07count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_07count_pct)) echo number_format($var_bor_07count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">August</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_beds_08count" id="var_beds_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_beds_08count)) echo $var_beds_08count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ipdays_08count" id="var_ipdays_08count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ipdays_08count)) echo $var_ipdays_08count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_08count" id="var_bed_days_08count" disabled placeholder="0" value="<?php if (isset($var_bed_days_08count)) echo number_format($var_bed_days_08count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_08count_pct" id="var_bor_08count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_08count_pct)) echo number_format($var_bor_08count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">September</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_beds_09count" id="var_beds_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_beds_09count)) echo $var_beds_09count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ipdays_09count" id="var_ipdays_09count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ipdays_09count)) echo $var_ipdays_09count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_09count" id="var_bed_days_09count" disabled placeholder="0" value="<?php if (isset($var_bed_days_09count)) echo number_format($var_bed_days_09count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_09count_pct" id="var_bor_09count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_09count_pct)) echo number_format($var_bor_09count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_beds_q3count" id="var_beds_q3count" disabled placeholder="0" value="<?php if (isset($var_beds_q3count)) echo number_format($var_beds_q3count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ipdays_q3count" id="var_ipdays_q3count" disabled placeholder="0" value="<?php if (isset($var_ipdays_q3count)) echo number_format($var_ipdays_q3count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_q3count" id="var_bed_days_q3count" disabled placeholder="0" value="<?php if (isset($var_bed_days_q3count)) echo number_format($var_bed_days_q3count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_q3count_pct" id="var_bor_q3count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_q3count_pct)) echo number_format($var_bor_q3count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<th><p></p><div align="right">FOURTH QUARTER</div></th>
				</tr>
				
				<tr>
					<td width="155"><div align="right">October</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_beds_10count" id="var_beds_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_beds_10count)) echo $var_beds_10count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ipdays_10count" id="var_ipdays_10count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ipdays_10count)) echo $var_ipdays_10count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_10count" id="var_bed_days_10count" disabled placeholder="0" value="<?php if (isset($var_bed_days_10count)) echo number_format($var_bed_days_10count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_10count_pct" id="var_bor_10count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_10count_pct)) echo number_format($var_bor_10count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">November</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_beds_11count" id="var_beds_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_beds_11count)) echo $var_beds_11count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ipdays_11count" id="var_ipdays_11count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ipdays_11count)) echo $var_ipdays_11count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_11count" id="var_bed_days_11count" disabled placeholder="0" value="<?php if (isset($var_bed_days_11count)) echo number_format($var_bed_days_11count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_11count_pct" id="var_bor_11count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_11count_pct)) echo number_format($var_bor_11count_pct, 2); ?>">
					</div></td>
				</tr>

				<tr>
					<td width="155"><div align="right">December</div></td>
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_beds_12count" id="var_beds_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_beds_12count)) echo $var_beds_12count; ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="number" style="text-align:right;" name="var_ipdays_12count" id="var_ipdays_12count" size="11" min="0" max="700000000" step="1" onblur="checkban(this.id, 1) && setAttributesandValues()"  placeholder="0" value="<?php if (isset($var_ipdays_12count)) echo $var_ipdays_12count; ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_12count" id="var_bed_days_12count" disabled placeholder="0" value="<?php if (isset($var_bed_days_12count)) echo number_format($var_bed_days_12count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_12count_pct" id="var_bor_12count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_12count_pct)) echo number_format($var_bor_12count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_beds_q4count" id="var_beds_q4count" disabled placeholder="0" value="<?php if (isset($var_beds_q4count)) echo number_format($var_beds_q4count); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ipdays_q4count" id="var_ipdays_q4count" disabled placeholder="0" value="<?php if (isset($var_ipdays_q4count)) echo number_format($var_ipdays_q4count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_q4count" id="var_bed_days_q4count" disabled placeholder="0" value="<?php if (isset($var_bed_days_q4count)) echo number_format($var_bed_days_q4count); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_q4count_pct" id="var_bor_q4count_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_q4count_pct)) echo number_format($var_bor_q4count_pct, 2); ?>">
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
					<input type="text" style="text-align:right;" name="var_beds_totalcount" id="var_beds_totalcount" disabled placeholder="0" value="<?php if (isset($var_beds_totalcount)) echo number_format($var_beds_totalcount); ?>">
					</div></td>
					
					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_ipdays_totalcount" id="var_ipdays_totalcount" disabled placeholder="0" value="<?php if (isset($var_ipdays_totalcount)) echo number_format($var_ipdays_totalcount); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bed_days_totalcount" id="var_bed_days_totalcount" disabled placeholder="0" value="<?php if (isset($var_bed_days_totalcount)) echo number_format($var_bed_days_totalcount); ?>">
					</div></td>

					<td width="155"><div align="right">
					<input type="text" style="text-align:right;" name="var_bor_totalcount_pct" id="var_bor_totalcount_pct" size="11" disabled placeholder="0.00" value="<?php if (isset($var_bor_totalcount_pct)) echo number_format($var_bor_totalcount_pct, 2); ?>">
					</div></td>
				</tr>

			</table>
			
