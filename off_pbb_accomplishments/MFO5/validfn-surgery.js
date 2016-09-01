$(document).ready(function()
{

$( "form:not(.filter) :input:visible:enabled:first" ).focus();

});

function setAttributesandValues()
{
	
	if (1*document.getElementById("var_elec_01count").value == 0)
		document.getElementById("var_elec_wait_01count").value=0;
	if (1*document.getElementById("var_elec_02count").value == 0)
		document.getElementById("var_elec_wait_02count").value=0;
	if (1*document.getElementById("var_elec_03count").value == 0)
		document.getElementById("var_elec_wait_03count").value=0;
	if (1*document.getElementById("var_elec_04count").value == 0)
		document.getElementById("var_elec_wait_04count").value=0;
	if (1*document.getElementById("var_elec_05count").value == 0)
		document.getElementById("var_elec_wait_05count").value=0;
	if (1*document.getElementById("var_elec_06count").value == 0)
		document.getElementById("var_elec_wait_06count").value=0;
	if (1*document.getElementById("var_elec_07count").value == 0)
		document.getElementById("var_elec_wait_07count").value=0;
	if (1*document.getElementById("var_elec_08count").value == 0)
		document.getElementById("var_elec_wait_08count").value=0;
	if (1*document.getElementById("var_elec_09count").value == 0)
		document.getElementById("var_elec_wait_09count").value=0;
	if (1*document.getElementById("var_elec_10count").value == 0)
		document.getElementById("var_elec_wait_10count").value=0;
	if (1*document.getElementById("var_elec_11count").value == 0)
		document.getElementById("var_elec_wait_11count").value=0;
	if (1*document.getElementById("var_elec_12count").value == 0)
		document.getElementById("var_elec_wait_12count").value=0;

	// First Quarter
	document.getElementById("var_emer_q1count").value=(1*document.getElementById("var_emer_01count").value)+(1*document.getElementById("var_emer_02count").value)+(1*document.getElementById("var_emer_03count").value);
	document.getElementById("var_elec_q1count").value=(1*document.getElementById("var_elec_01count").value)+(1*document.getElementById("var_elec_02count").value)+(1*document.getElementById("var_elec_03count").value);
	if (document.getElementById("var_elec_q1count").value != 0)
		document.getElementById("var_elec_wait_q1count").value=Math.floor( (((1*document.getElementById("var_elec_wait_01count").value)*(1*document.getElementById("var_elec_01count").value))+((1*document.getElementById("var_elec_wait_02count").value)*(1*document.getElementById("var_elec_02count").value))+((1*document.getElementById("var_elec_wait_03count").value)*(1*document.getElementById("var_elec_03count").value))) / document.getElementById("var_elec_q1count").value);
	else
		document.getElementById("var_elec_wait_q1count").value=0;
	
	// Second Quarter
	document.getElementById("var_emer_q2count").value=(1*document.getElementById("var_emer_04count").value)+(1*document.getElementById("var_emer_05count").value)+(1*document.getElementById("var_emer_06count").value);
	document.getElementById("var_elec_q2count").value=(1*document.getElementById("var_elec_04count").value)+(1*document.getElementById("var_elec_05count").value)+(1*document.getElementById("var_elec_06count").value);
	if (document.getElementById("var_elec_q2count").value != 0)
		document.getElementById("var_elec_wait_q2count").value=Math.floor( (((1*document.getElementById("var_elec_wait_04count").value)*(1*document.getElementById("var_elec_04count").value))+((1*document.getElementById("var_elec_wait_05count").value)*(1*document.getElementById("var_elec_05count").value))+((1*document.getElementById("var_elec_wait_06count").value)*(1*document.getElementById("var_elec_06count").value))) / document.getElementById("var_elec_q2count").value);
	else
		document.getElementById("var_elec_wait_q2count").value=0;
	
	// Third Quarter
	document.getElementById("var_emer_q3count").value=(1*document.getElementById("var_emer_07count").value)+(1*document.getElementById("var_emer_08count").value)+(1*document.getElementById("var_emer_09count").value);
	document.getElementById("var_elec_q3count").value=(1*document.getElementById("var_elec_07count").value)+(1*document.getElementById("var_elec_08count").value)+(1*document.getElementById("var_elec_09count").value);
	if (document.getElementById("var_elec_q3count").value != 0)
		document.getElementById("var_elec_wait_q3count").value=Math.floor( (((1*document.getElementById("var_elec_wait_07count").value)*(1*document.getElementById("var_elec_07count").value))+((1*document.getElementById("var_elec_wait_08count").value)*(1*document.getElementById("var_elec_08count").value))+((1*document.getElementById("var_elec_wait_09count").value)*(1*document.getElementById("var_elec_09count").value))) / document.getElementById("var_elec_q3count").value);
	else
		document.getElementById("var_elec_wait_q3count").value=0;
			
	// Fourth Quarter
	document.getElementById("var_emer_q4count").value=(1*document.getElementById("var_emer_10count").value)+(1*document.getElementById("var_emer_11count").value)+(1*document.getElementById("var_emer_12count").value);
	document.getElementById("var_elec_q4count").value=(1*document.getElementById("var_elec_10count").value)+(1*document.getElementById("var_elec_11count").value)+(1*document.getElementById("var_elec_12count").value);
	if (document.getElementById("var_elec_q4count").value != 0)
		document.getElementById("var_elec_wait_q4count").value=Math.floor( (((1*document.getElementById("var_elec_wait_10count").value)*(1*document.getElementById("var_elec_10count").value))+((1*document.getElementById("var_elec_wait_11count").value)*(1*document.getElementById("var_elec_11count").value))+((1*document.getElementById("var_elec_wait_12count").value)*(1*document.getElementById("var_elec_12count").value))) / document.getElementById("var_elec_q4count").value);
	else
		document.getElementById("var_elec_wait_q4count").value=0;
	
	// Grand Total
	document.getElementById("var_emer_totalcount").value=(1*document.getElementById("var_emer_q1count").value)+(1*document.getElementById("var_emer_q2count").value)+(1*document.getElementById("var_emer_q3count").value)+(1*document.getElementById("var_emer_q4count").value);
	
	document.getElementById("var_elec_totalcount").value=(1*document.getElementById("var_elec_q1count").value)+(1*document.getElementById("var_elec_q2count").value)+(1*document.getElementById("var_elec_q3count").value)+(1*document.getElementById("var_elec_q4count").value);
	
	if (document.getElementById("var_elec_totalcount").value != 0)
	{
		var x = (((1*document.getElementById("var_elec_wait_01count").value)*(1*document.getElementById("var_elec_01count").value))+((1*document.getElementById("var_elec_wait_02count").value)*(1*document.getElementById("var_elec_02count").value))+((1*document.getElementById("var_elec_wait_03count").value)*(1*document.getElementById("var_elec_03count").value)));
		x = x+(((1*document.getElementById("var_elec_wait_04count").value)*(1*document.getElementById("var_elec_04count").value))+((1*document.getElementById("var_elec_wait_05count").value)*(1*document.getElementById("var_elec_05count").value))+((1*document.getElementById("var_elec_wait_06count").value)*(1*document.getElementById("var_elec_06count").value)));
		x = x+(((1*document.getElementById("var_elec_wait_07count").value)*(1*document.getElementById("var_elec_07count").value))+((1*document.getElementById("var_elec_wait_08count").value)*(1*document.getElementById("var_elec_08count").value))+((1*document.getElementById("var_elec_wait_09count").value)*(1*document.getElementById("var_elec_09count").value)));
		x = x+(((1*document.getElementById("var_elec_wait_10count").value)*(1*document.getElementById("var_elec_10count").value))+((1*document.getElementById("var_elec_wait_11count").value)*(1*document.getElementById("var_elec_11count").value))+((1*document.getElementById("var_elec_wait_12count").value)*(1*document.getElementById("var_elec_12count").value)));
		document.getElementById("var_elec_wait_totalcount").value= x/document.getElementById("var_elec_totalcount").value;
	}
	else
		document.getElementById("var_elec_wait_totalcount").value=0;
		
	// Convert numbers to format with commas
	document.getElementById("var_emer_q1count").value=parseInt(document.getElementById("var_emer_q1count").value).toLocaleString();
	document.getElementById("var_elec_q1count").value=parseInt(document.getElementById("var_elec_q1count").value).toLocaleString();
	document.getElementById("var_elec_wait_q1count").value=parseInt(document.getElementById("var_elec_wait_q1count").value).toLocaleString();
	document.getElementById("var_emer_q2count").value=parseInt(document.getElementById("var_emer_q2count").value).toLocaleString();
	document.getElementById("var_elec_q2count").value=parseInt(document.getElementById("var_elec_q2count").value).toLocaleString();
	document.getElementById("var_elec_wait_q2count").value=parseInt(document.getElementById("var_elec_wait_q2count").value).toLocaleString();
	document.getElementById("var_emer_q3count").value=parseInt(document.getElementById("var_emer_q3count").value).toLocaleString();
	document.getElementById("var_elec_q3count").value=parseInt(document.getElementById("var_elec_q3count").value).toLocaleString();
	document.getElementById("var_elec_wait_q3count").value=parseInt(document.getElementById("var_elec_wait_q3count").value).toLocaleString();
	document.getElementById("var_emer_q4count").value=parseInt(document.getElementById("var_emer_q4count").value).toLocaleString();
	document.getElementById("var_elec_q4count").value=parseInt(document.getElementById("var_elec_q4count").value).toLocaleString();
	document.getElementById("var_elec_wait_q4count").value=parseInt(document.getElementById("var_elec_wait_q4count").value).toLocaleString();
	document.getElementById("var_emer_totalcount").value=parseInt(document.getElementById("var_emer_totalcount").value).toLocaleString();
	document.getElementById("var_elec_totalcount").value=parseInt(document.getElementById("var_elec_totalcount").value).toLocaleString();
	document.getElementById("var_elec_wait_totalcount").value=parseInt(document.getElementById("var_elec_wait_totalcount").value).toLocaleString();

	return true;
}

function isValidForm()
{
	setAttributesandValues();

	/* Put on-submit validation scripts here */
	
	return true;
}
