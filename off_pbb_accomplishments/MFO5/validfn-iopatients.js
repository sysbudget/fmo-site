$(document).ready(function()
{

$( "form:not(.filter) :input:visible:enabled:first" ).focus();

});

function getPercentAmount(num, denom)
{
	var avg=0.00;
	if (denom != 0)
		avg=100*(num/denom);
	
	return avg;
}

function setAttributesandValues()
{
	// First Quarter
	document.getElementById("var_op_attn_01count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_01count").value), (1*document.getElementById("var_op_01count").value));
	document.getElementById("var_op_attn_01count_pct").value=parseFloat(document.getElementById("var_op_attn_01count_pct").value).toFixed(2);
	
	document.getElementById("var_op_attn_02count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_02count").value), (1*document.getElementById("var_op_02count").value));
	document.getElementById("var_op_attn_02count_pct").value=parseFloat(document.getElementById("var_op_attn_02count_pct").value).toFixed(2);
	
	document.getElementById("var_op_attn_03count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_03count").value), (1*document.getElementById("var_op_03count").value));
	document.getElementById("var_op_attn_03count_pct").value=parseFloat(document.getElementById("var_op_attn_03count_pct").value).toFixed(2);
	
	document.getElementById("var_ip_q1count").value=(1*document.getElementById("var_ip_01count").value)+(1*document.getElementById("var_ip_02count").value)+(1*document.getElementById("var_ip_03count").value);
	document.getElementById("var_op_q1count").value=(1*document.getElementById("var_op_01count").value)+(1*document.getElementById("var_op_02count").value)+(1*document.getElementById("var_op_03count").value);
	document.getElementById("var_op_attn_q1count").value=(1*document.getElementById("var_op_attn_01count").value)+(1*document.getElementById("var_op_attn_02count").value)+(1*document.getElementById("var_op_attn_03count").value);
	document.getElementById("var_op_attn_q1count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_q1count").value), (1*document.getElementById("var_op_q1count").value));
	
	// Second Quarter
	document.getElementById("var_op_attn_04count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_04count").value), (1*document.getElementById("var_op_04count").value));
	document.getElementById("var_op_attn_04count_pct").value=parseFloat(document.getElementById("var_op_attn_04count_pct").value).toFixed(2);
	
	document.getElementById("var_op_attn_05count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_05count").value), (1*document.getElementById("var_op_05count").value));
	document.getElementById("var_op_attn_05count_pct").value=parseFloat(document.getElementById("var_op_attn_05count_pct").value).toFixed(2);
	
	document.getElementById("var_op_attn_06count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_06count").value), (1*document.getElementById("var_op_06count").value));
	document.getElementById("var_op_attn_06count_pct").value=parseFloat(document.getElementById("var_op_attn_06count_pct").value).toFixed(2);
	
	document.getElementById("var_ip_q2count").value=(1*document.getElementById("var_ip_04count").value)+(1*document.getElementById("var_ip_05count").value)+(1*document.getElementById("var_ip_06count").value);
	document.getElementById("var_op_q2count").value=(1*document.getElementById("var_op_04count").value)+(1*document.getElementById("var_op_05count").value)+(1*document.getElementById("var_op_06count").value);
	document.getElementById("var_op_attn_q2count").value=(1*document.getElementById("var_op_attn_04count").value)+(1*document.getElementById("var_op_attn_05count").value)+(1*document.getElementById("var_op_attn_06count").value);
	document.getElementById("var_op_attn_q2count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_q2count").value), (1*document.getElementById("var_op_q2count").value));
	
	// Third Quarter
	document.getElementById("var_op_attn_07count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_07count").value), (1*document.getElementById("var_op_07count").value));
	document.getElementById("var_op_attn_07count_pct").value=parseFloat(document.getElementById("var_op_attn_07count_pct").value).toFixed(2);
	
	document.getElementById("var_op_attn_08count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_08count").value), (1*document.getElementById("var_op_08count").value));
	document.getElementById("var_op_attn_08count_pct").value=parseFloat(document.getElementById("var_op_attn_08count_pct").value).toFixed(2);
	
	document.getElementById("var_op_attn_09count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_09count").value), (1*document.getElementById("var_op_09count").value));
	document.getElementById("var_op_attn_09count_pct").value=parseFloat(document.getElementById("var_op_attn_09count_pct").value).toFixed(2);
	
	document.getElementById("var_ip_q3count").value=(1*document.getElementById("var_ip_07count").value)+(1*document.getElementById("var_ip_08count").value)+(1*document.getElementById("var_ip_09count").value);
	document.getElementById("var_op_q3count").value=(1*document.getElementById("var_op_07count").value)+(1*document.getElementById("var_op_08count").value)+(1*document.getElementById("var_op_09count").value);
	document.getElementById("var_op_attn_q3count").value=(1*document.getElementById("var_op_attn_07count").value)+(1*document.getElementById("var_op_attn_08count").value)+(1*document.getElementById("var_op_attn_09count").value);
	document.getElementById("var_op_attn_q3count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_q3count").value), (1*document.getElementById("var_op_q3count").value));
	
	// Fourth Quarter
	document.getElementById("var_op_attn_10count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_10count").value), (1*document.getElementById("var_op_10count").value));
	document.getElementById("var_op_attn_10count_pct").value=parseFloat(document.getElementById("var_op_attn_10count_pct").value).toFixed(2);
	
	document.getElementById("var_op_attn_11count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_11count").value), (1*document.getElementById("var_op_11count").value));
	document.getElementById("var_op_attn_11count_pct").value=parseFloat(document.getElementById("var_op_attn_11count_pct").value).toFixed(2);
	
	document.getElementById("var_op_attn_12count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_12count").value), (1*document.getElementById("var_op_12count").value));
	document.getElementById("var_op_attn_12count_pct").value=parseFloat(document.getElementById("var_op_attn_12count_pct").value).toFixed(2);
	
	document.getElementById("var_ip_q4count").value=(1*document.getElementById("var_ip_10count").value)+(1*document.getElementById("var_ip_11count").value)+(1*document.getElementById("var_ip_12count").value);
	document.getElementById("var_op_q4count").value=(1*document.getElementById("var_op_10count").value)+(1*document.getElementById("var_op_11count").value)+(1*document.getElementById("var_op_12count").value);
	document.getElementById("var_op_attn_q4count").value=(1*document.getElementById("var_op_attn_10count").value)+(1*document.getElementById("var_op_attn_11count").value)+(1*document.getElementById("var_op_attn_12count").value);
	document.getElementById("var_op_attn_q4count_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_q4count").value), (1*document.getElementById("var_op_q4count").value));
	
	// Grand Total
	document.getElementById("var_ip_totalcount").value=(1*document.getElementById("var_ip_q1count").value)+(1*document.getElementById("var_ip_q2count").value)+(1*document.getElementById("var_ip_q3count").value)+(1*document.getElementById("var_ip_q4count").value);
	document.getElementById("var_op_totalcount").value=(1*document.getElementById("var_op_q1count").value)+(1*document.getElementById("var_op_q2count").value)+(1*document.getElementById("var_op_q3count").value)+(1*document.getElementById("var_op_q4count").value);
	document.getElementById("var_op_attn_totalcount").value=(1*document.getElementById("var_op_attn_q1count").value)+(1*document.getElementById("var_op_attn_q2count").value)+(1*document.getElementById("var_op_attn_q3count").value)+(1*document.getElementById("var_op_attn_q4count").value);
	document.getElementById("var_op_attn_totalcount_pct").value=getPercentAmount((1*document.getElementById("var_op_attn_totalcount").value), (1*document.getElementById("var_op_totalcount").value));

	// Convert numbers to format with commas or two decimal places
	document.getElementById("var_ip_q1count").value=parseInt(document.getElementById("var_ip_q1count").value).toLocaleString();
	document.getElementById("var_op_q1count").value=parseInt(document.getElementById("var_op_q1count").value).toLocaleString();
	document.getElementById("var_op_attn_q1count").value=parseInt(document.getElementById("var_op_attn_q1count").value).toLocaleString();
	document.getElementById("var_op_attn_q1count_pct").value=parseFloat(document.getElementById("var_op_attn_q1count_pct").value).toFixed(2);
	document.getElementById("var_ip_q2count").value=parseInt(document.getElementById("var_ip_q2count").value).toLocaleString();
	document.getElementById("var_op_q2count").value=parseInt(document.getElementById("var_op_q2count").value).toLocaleString();
	document.getElementById("var_op_attn_q2count").value=parseInt(document.getElementById("var_op_attn_q2count").value).toLocaleString();
	document.getElementById("var_op_attn_q2count_pct").value=parseFloat(document.getElementById("var_op_attn_q2count_pct").value).toFixed(2);
	document.getElementById("var_ip_q3count").value=parseInt(document.getElementById("var_ip_q3count").value).toLocaleString();
	document.getElementById("var_op_q3count").value=parseInt(document.getElementById("var_op_q3count").value).toLocaleString();
	document.getElementById("var_op_attn_q3count").value=parseInt(document.getElementById("var_op_attn_q3count").value).toLocaleString();
	document.getElementById("var_op_attn_q3count_pct").value=parseFloat(document.getElementById("var_op_attn_q3count_pct").value).toFixed(2);
	document.getElementById("var_ip_q4count").value=parseInt(document.getElementById("var_ip_q4count").value).toLocaleString();
	document.getElementById("var_op_q4count").value=parseInt(document.getElementById("var_op_q4count").value).toLocaleString();
	document.getElementById("var_op_attn_q4count").value=parseInt(document.getElementById("var_op_attn_q4count").value).toLocaleString();
	document.getElementById("var_op_attn_q4count_pct").value=parseFloat(document.getElementById("var_op_attn_q4count_pct").value).toFixed(2);
	document.getElementById("var_ip_totalcount").value=parseInt(document.getElementById("var_ip_totalcount").value).toLocaleString();
	document.getElementById("var_op_totalcount").value=parseInt(document.getElementById("var_op_totalcount").value).toLocaleString();
	document.getElementById("var_op_attn_totalcount").value=parseInt(document.getElementById("var_op_attn_totalcount").value).toLocaleString();
	document.getElementById("var_op_attn_totalcount_pct").value=parseFloat(document.getElementById("var_op_attn_totalcount_pct").value).toFixed(2);	

	return true;
}

function isValidForm()
{
	var valid_nums=true;

	setAttributesandValues();
	
	/* Put on-submit validation scripts here */
	valid_nums=isMoreThan(document.getElementById("var_op_01count"), document.getElementById("var_op_attn_01count"), "January Out-Patients managed must be higher than or equal to Out-Patients medically attended to within 2 hours")
		&& isMoreThan(document.getElementById("var_op_02count"), document.getElementById("var_op_attn_02count"), "February Out-Patients managed must be higher than or equal to Out-Patients medically attended to within 2 hours")
		&& isMoreThan(document.getElementById("var_op_03count"), document.getElementById("var_op_attn_03count"), "March Out-Patients managed must be higher than or equal to Out-Patients medically attended to within 2 hours")
		&& isMoreThan(document.getElementById("var_op_04count"), document.getElementById("var_op_attn_04count"), "April Out-Patients managed must be higher than or equal to Out-Patients medically attended to within 2 hours")
		&& isMoreThan(document.getElementById("var_op_05count"), document.getElementById("var_op_attn_05count"), "May Out-Patients managed must be higher than or equal to Out-Patients medically attended to within 2 hours")
		&& isMoreThan(document.getElementById("var_op_06count"), document.getElementById("var_op_attn_06count"), "June Out-Patients managed must be higher than or equal to Out-Patients medically attended to within 2 hours")
		&& isMoreThan(document.getElementById("var_op_07count"), document.getElementById("var_op_attn_07count"), "July Out-Patients managed must be higher than or equal to Out-Patients medically attended to within 2 hours")
		&& isMoreThan(document.getElementById("var_op_08count"), document.getElementById("var_op_attn_08count"), "August Out-Patients managed must be higher than or equal to Out-Patients medically attended to within 2 hours")
		&& isMoreThan(document.getElementById("var_op_09count"), document.getElementById("var_op_attn_09count"), "September Out-Patients managed must be higher than or equal to Out-Patients medically attended to within 2 hours")
		&& isMoreThan(document.getElementById("var_op_10count"), document.getElementById("var_op_attn_10count"), "October Out-Patients managed must be higher than or equal to Out-Patients medically attended to within 2 hours")
		&& isMoreThan(document.getElementById("var_op_11count"), document.getElementById("var_op_attn_11count"), "November Out-Patients managed must be higher than or equal to Out-Patients medically attended to within 2 hours")
		&& isMoreThan(document.getElementById("var_op_12count"), document.getElementById("var_op_attn_12count"), "December Out-Patients managed must be higher than or equal to Out-Patients medically attended to within 2 hours");

	return ( valid_nums );
}
