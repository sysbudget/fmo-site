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
	
	if ( (1*document.getElementById("var_dischrg_01count").value) == 0 || (1*document.getElementById("var_d_01count").value) == 0)
	{
		document.getElementById("var_d_01count").value=0;
		document.getElementById("var_dl48_01count").value=0;
	}
	document.getElementById("var_ndr_01count_pct").value=getPercentAmount((1*document.getElementById("var_d_01count").value)-(1*document.getElementById("var_dl48_01count").value), (1*document.getElementById("var_dischrg_01count").value)-(1*document.getElementById("var_dl48_01count").value));
	document.getElementById("var_ndr_01count_pct").value=parseFloat(document.getElementById("var_ndr_01count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_dischrg_02count").value) == 0 || (1*document.getElementById("var_d_02count").value) == 0)
	{
		document.getElementById("var_d_02count").value=0;
		document.getElementById("var_dl48_02count").value=0;
	}
	document.getElementById("var_ndr_02count_pct").value=getPercentAmount((1*document.getElementById("var_d_02count").value)-(1*document.getElementById("var_dl48_02count").value), (1*document.getElementById("var_dischrg_02count").value)-(1*document.getElementById("var_dl48_02count").value));
	document.getElementById("var_ndr_02count_pct").value=parseFloat(document.getElementById("var_ndr_02count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_dischrg_03count").value) == 0 || (1*document.getElementById("var_d_03count").value) == 0)
	{
		document.getElementById("var_d_03count").value=0;
		document.getElementById("var_dl48_03count").value=0;
	}
	document.getElementById("var_ndr_03count_pct").value=getPercentAmount((1*document.getElementById("var_d_03count").value)-(1*document.getElementById("var_dl48_03count").value), (1*document.getElementById("var_dischrg_03count").value)-(1*document.getElementById("var_dl48_03count").value));
	document.getElementById("var_ndr_03count_pct").value=parseFloat(document.getElementById("var_ndr_03count_pct").value).toFixed(2);
	
	if ( (1*document.getElementById("var_dischrg_04count").value) == 0 || (1*document.getElementById("var_d_04count").value) == 0)
	{
		document.getElementById("var_d_04count").value=0;
		document.getElementById("var_dl48_04count").value=0;
	}
	document.getElementById("var_ndr_04count_pct").value=getPercentAmount((1*document.getElementById("var_d_04count").value)-(1*document.getElementById("var_dl48_04count").value), (1*document.getElementById("var_dischrg_04count").value)-(1*document.getElementById("var_dl48_04count").value));
	document.getElementById("var_ndr_04count_pct").value=parseFloat(document.getElementById("var_ndr_04count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_dischrg_05count").value) == 0 || (1*document.getElementById("var_d_05count").value) == 0)
	{
		document.getElementById("var_d_05count").value=0;
		document.getElementById("var_dl48_05count").value=0;
	}
	document.getElementById("var_ndr_05count_pct").value=getPercentAmount((1*document.getElementById("var_d_05count").value)-(1*document.getElementById("var_dl48_05count").value), (1*document.getElementById("var_dischrg_05count").value)-(1*document.getElementById("var_dl48_05count").value));
	document.getElementById("var_ndr_05count_pct").value=parseFloat(document.getElementById("var_ndr_05count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_dischrg_06count").value) == 0 || (1*document.getElementById("var_d_06count").value) == 0)
	{
		document.getElementById("var_d_06count").value=0;
		document.getElementById("var_dl48_06count").value=0;
	}
	document.getElementById("var_ndr_06count_pct").value=getPercentAmount((1*document.getElementById("var_d_06count").value)-(1*document.getElementById("var_dl48_06count").value), (1*document.getElementById("var_dischrg_06count").value)-(1*document.getElementById("var_dl48_06count").value));
	document.getElementById("var_ndr_06count_pct").value=parseFloat(document.getElementById("var_ndr_06count_pct").value).toFixed(2);
	
	if ( (1*document.getElementById("var_dischrg_07count").value) == 0 || (1*document.getElementById("var_d_07count").value) == 0)
	{
		document.getElementById("var_d_07count").value=0;
		document.getElementById("var_dl48_07count").value=0;
	}
	document.getElementById("var_ndr_07count_pct").value=getPercentAmount((1*document.getElementById("var_d_07count").value)-(1*document.getElementById("var_dl48_07count").value), (1*document.getElementById("var_dischrg_07count").value)-(1*document.getElementById("var_dl48_07count").value));
	document.getElementById("var_ndr_07count_pct").value=parseFloat(document.getElementById("var_ndr_07count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_dischrg_08count").value) == 0 || (1*document.getElementById("var_d_08count").value) == 0)
	{
		document.getElementById("var_d_08count").value=0;
		document.getElementById("var_dl48_08count").value=0;
	}
	document.getElementById("var_ndr_08count_pct").value=getPercentAmount((1*document.getElementById("var_d_08count").value)-(1*document.getElementById("var_dl48_08count").value), (1*document.getElementById("var_dischrg_08count").value)-(1*document.getElementById("var_dl48_08count").value));
	document.getElementById("var_ndr_08count_pct").value=parseFloat(document.getElementById("var_ndr_08count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_dischrg_09count").value) == 0 || (1*document.getElementById("var_d_09count").value) == 0)
	{
		document.getElementById("var_d_09count").value=0;
		document.getElementById("var_dl48_09count").value=0;
	}
	document.getElementById("var_ndr_09count_pct").value=getPercentAmount((1*document.getElementById("var_d_09count").value)-(1*document.getElementById("var_dl48_09count").value), (1*document.getElementById("var_dischrg_09count").value)-(1*document.getElementById("var_dl48_09count").value));
	document.getElementById("var_ndr_09count_pct").value=parseFloat(document.getElementById("var_ndr_09count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_dischrg_10count").value) == 0 || (1*document.getElementById("var_d_10count").value) == 0)
	{
		document.getElementById("var_d_10count").value=0;
		document.getElementById("var_dl48_10count").value=0;
	}
	document.getElementById("var_ndr_10count_pct").value=getPercentAmount((1*document.getElementById("var_d_10count").value)-(1*document.getElementById("var_dl48_10count").value), (1*document.getElementById("var_dischrg_10count").value)-(1*document.getElementById("var_dl48_10count").value));
	document.getElementById("var_ndr_10count_pct").value=parseFloat(document.getElementById("var_ndr_10count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_dischrg_11count").value) == 0 || (1*document.getElementById("var_d_11count").value) == 0)
	{
		document.getElementById("var_d_11count").value=0;
		document.getElementById("var_dl48_11count").value=0;
	}
	document.getElementById("var_ndr_11count_pct").value=getPercentAmount((1*document.getElementById("var_d_11count").value)-(1*document.getElementById("var_dl48_11count").value), (1*document.getElementById("var_dischrg_11count").value)-(1*document.getElementById("var_dl48_11count").value));
	document.getElementById("var_ndr_11count_pct").value=parseFloat(document.getElementById("var_ndr_11count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_dischrg_12count").value) == 0 || (1*document.getElementById("var_d_12count").value) == 0)
	{
		document.getElementById("var_d_12count").value=0;
		document.getElementById("var_dl48_12count").value=0;
	}
	document.getElementById("var_ndr_12count_pct").value=getPercentAmount((1*document.getElementById("var_d_12count").value)-(1*document.getElementById("var_dl48_12count").value), (1*document.getElementById("var_dischrg_12count").value)-(1*document.getElementById("var_dl48_12count").value));
	document.getElementById("var_ndr_12count_pct").value=parseFloat(document.getElementById("var_ndr_12count_pct").value).toFixed(2);

	document.getElementById("var_dischrg_q1count").value=(1*document.getElementById("var_dischrg_01count").value)+(1*document.getElementById("var_dischrg_02count").value)+(1*document.getElementById("var_dischrg_03count").value);
	document.getElementById("var_dischrg_q2count").value=(1*document.getElementById("var_dischrg_04count").value)+(1*document.getElementById("var_dischrg_05count").value)+(1*document.getElementById("var_dischrg_06count").value);
	document.getElementById("var_dischrg_q3count").value=(1*document.getElementById("var_dischrg_07count").value)+(1*document.getElementById("var_dischrg_08count").value)+(1*document.getElementById("var_dischrg_09count").value);
	document.getElementById("var_dischrg_q4count").value=(1*document.getElementById("var_dischrg_10count").value)+(1*document.getElementById("var_dischrg_11count").value)+(1*document.getElementById("var_dischrg_12count").value);
	document.getElementById("var_dischrg_totalcount").value=(1*document.getElementById("var_dischrg_q1count").value)+(1*document.getElementById("var_dischrg_q2count").value)+(1*document.getElementById("var_dischrg_q3count").value)+(1*document.getElementById("var_dischrg_q4count").value);

	document.getElementById("var_d_q1count").value=(1*document.getElementById("var_d_01count").value)+(1*document.getElementById("var_d_02count").value)+(1*document.getElementById("var_d_03count").value);
	document.getElementById("var_d_q2count").value=(1*document.getElementById("var_d_04count").value)+(1*document.getElementById("var_d_05count").value)+(1*document.getElementById("var_d_06count").value);
	document.getElementById("var_d_q3count").value=(1*document.getElementById("var_d_07count").value)+(1*document.getElementById("var_d_08count").value)+(1*document.getElementById("var_d_09count").value);
	document.getElementById("var_d_q4count").value=(1*document.getElementById("var_d_10count").value)+(1*document.getElementById("var_d_11count").value)+(1*document.getElementById("var_d_12count").value);
	document.getElementById("var_d_totalcount").value=(1*document.getElementById("var_d_q1count").value)+(1*document.getElementById("var_d_q2count").value)+(1*document.getElementById("var_d_q3count").value)+(1*document.getElementById("var_d_q4count").value);
	
	document.getElementById("var_dl48_q1count").value=(1*document.getElementById("var_dl48_01count").value)+(1*document.getElementById("var_dl48_02count").value)+(1*document.getElementById("var_dl48_03count").value);
	document.getElementById("var_dl48_q2count").value=(1*document.getElementById("var_dl48_04count").value)+(1*document.getElementById("var_dl48_05count").value)+(1*document.getElementById("var_dl48_06count").value);
	document.getElementById("var_dl48_q3count").value=(1*document.getElementById("var_dl48_07count").value)+(1*document.getElementById("var_dl48_08count").value)+(1*document.getElementById("var_dl48_09count").value);
	document.getElementById("var_dl48_q4count").value=(1*document.getElementById("var_dl48_10count").value)+(1*document.getElementById("var_dl48_11count").value)+(1*document.getElementById("var_dl48_12count").value);
	document.getElementById("var_dl48_totalcount").value=(1*document.getElementById("var_dl48_q1count").value)+(1*document.getElementById("var_dl48_q2count").value)+(1*document.getElementById("var_dl48_q3count").value)+(1*document.getElementById("var_dl48_q4count").value);
	
	document.getElementById("var_ndr_q1count_pct").value=getPercentAmount((1*document.getElementById("var_d_q1count").value)-(1*document.getElementById("var_dl48_q1count").value), (1*document.getElementById("var_dischrg_q1count").value)-(1*document.getElementById("var_dl48_q1count").value));
	document.getElementById("var_ndr_q2count_pct").value=getPercentAmount((1*document.getElementById("var_d_q2count").value)-(1*document.getElementById("var_dl48_q2count").value), (1*document.getElementById("var_dischrg_q2count").value)-(1*document.getElementById("var_dl48_q2count").value));
	document.getElementById("var_ndr_q3count_pct").value=getPercentAmount((1*document.getElementById("var_d_q3count").value)-(1*document.getElementById("var_dl48_q3count").value), (1*document.getElementById("var_dischrg_q3count").value)-(1*document.getElementById("var_dl48_q3count").value));
	document.getElementById("var_ndr_q4count_pct").value=getPercentAmount((1*document.getElementById("var_d_q4count").value)-(1*document.getElementById("var_dl48_q4count").value), (1*document.getElementById("var_dischrg_q4count").value)-(1*document.getElementById("var_dl48_q4count").value));
	document.getElementById("var_ndr_totalcount_pct").value=getPercentAmount((1*document.getElementById("var_d_totalcount").value)-(1*document.getElementById("var_dl48_totalcount").value), (1*document.getElementById("var_dischrg_totalcount").value)-(1*document.getElementById("var_dl48_totalcount").value));
	
	// Convert numbers to format with commas
	document.getElementById("var_d_q1count").value=parseInt(document.getElementById("var_d_q1count").value).toLocaleString();
	document.getElementById("var_dischrg_q1count").value=parseInt(document.getElementById("var_dischrg_q1count").value).toLocaleString();
	document.getElementById("var_dl48_q1count").value=parseInt(document.getElementById("var_dl48_q1count").value).toLocaleString();
	document.getElementById("var_ndr_q1count_pct").value=parseFloat(document.getElementById("var_ndr_q1count_pct").value).toFixed(2);
	
	document.getElementById("var_d_q2count").value=parseInt(document.getElementById("var_d_q2count").value).toLocaleString();
	document.getElementById("var_dischrg_q2count").value=parseInt(document.getElementById("var_dischrg_q2count").value).toLocaleString();
	document.getElementById("var_dl48_q2count").value=parseInt(document.getElementById("var_dl48_q2count").value).toLocaleString();
	document.getElementById("var_ndr_q2count_pct").value=parseFloat(document.getElementById("var_ndr_q2count_pct").value).toFixed(2);
	
	document.getElementById("var_d_q3count").value=parseInt(document.getElementById("var_d_q3count").value).toLocaleString();
	document.getElementById("var_dischrg_q3count").value=parseInt(document.getElementById("var_dischrg_q3count").value).toLocaleString();
	document.getElementById("var_dl48_q3count").value=parseInt(document.getElementById("var_dl48_q3count").value).toLocaleString();
	document.getElementById("var_ndr_q3count_pct").value=parseFloat(document.getElementById("var_ndr_q3count_pct").value).toFixed(2);
	
	document.getElementById("var_d_q4count").value=parseInt(document.getElementById("var_d_q4count").value).toLocaleString();
	document.getElementById("var_dischrg_q4count").value=parseInt(document.getElementById("var_dischrg_q4count").value).toLocaleString();
	document.getElementById("var_dl48_q4count").value=parseInt(document.getElementById("var_dl48_q4count").value).toLocaleString();
	document.getElementById("var_ndr_q4count_pct").value=parseFloat(document.getElementById("var_ndr_q4count_pct").value).toFixed(2);
	
	document.getElementById("var_d_totalcount").value=parseInt(document.getElementById("var_d_totalcount").value).toLocaleString();
	document.getElementById("var_dischrg_totalcount").value=parseInt(document.getElementById("var_dischrg_totalcount").value).toLocaleString();
	document.getElementById("var_dl48_totalcount").value=parseInt(document.getElementById("var_dl48_totalcount").value).toLocaleString();
	document.getElementById("var_ndr_totalcount_pct").value=parseFloat(document.getElementById("var_ndr_totalcount_pct").value).toFixed(2);
	
	return true;
}

function isValidForm()
{
	var valid_nums=true;
	
	setAttributesandValues();

	/* Put on-submit validation scripts here */
	valid_nums=isMoreThan(document.getElementById("var_d_01count"), document.getElementById("var_dl48_01count"), "January Deaths must be higher than or equal to Deaths less than 48H")
		&& isMoreThan(document.getElementById("var_d_02count"), document.getElementById("var_dl48_02count"), "February Deaths must be higher than or equal to Deaths less than 48H")
		&& isMoreThan(document.getElementById("var_d_03count"), document.getElementById("var_dl48_03count"), "March Deaths must be higher than or equal to Deaths less than 48H")
		&& isMoreThan(document.getElementById("var_d_04count"), document.getElementById("var_dl48_04count"), "April Deaths must be higher than or equal to Deaths less than 48H")
		&& isMoreThan(document.getElementById("var_d_05count"), document.getElementById("var_dl48_05count"), "May Deaths must be higher than or equal to Deaths less than 48H")
		&& isMoreThan(document.getElementById("var_d_06count"), document.getElementById("var_dl48_06count"), "June Deaths must be higher than or equal to Deaths less than 48H")
		&& isMoreThan(document.getElementById("var_d_07count"), document.getElementById("var_dl48_07count"), "July Deaths must be higher than or equal to Deaths less than 48H")
		&& isMoreThan(document.getElementById("var_d_08count"), document.getElementById("var_dl48_08count"), "August Deaths must be higher than or equal to Deaths less than 48H")
		&& isMoreThan(document.getElementById("var_d_09count"), document.getElementById("var_dl48_09count"), "September Deaths must be higher than or equal to Deaths less than 48H")
		&& isMoreThan(document.getElementById("var_d_10count"), document.getElementById("var_dl48_10count"), "October Deaths must be higher than or equal to Deaths less than 48H")
		&& isMoreThan(document.getElementById("var_d_11count"), document.getElementById("var_dl48_11count"), "November Deaths must be higher than or equal to Deaths less than 48H")
		&& isMoreThan(document.getElementById("var_d_12count"), document.getElementById("var_dl48_12count"), "December Deaths must be higher than or equal to Deaths less than 48H");
		
	valid_nums=valid_nums && isMoreThan(document.getElementById("var_dischrg_01count"), document.getElementById("var_d_01count"), "January Discharges must be higher than or equal to Deaths")
		&& isMoreThan(document.getElementById("var_dischrg_02count"), document.getElementById("var_d_02count"), "February Discharges must be higher than or equal to Deaths")
		&& isMoreThan(document.getElementById("var_dischrg_03count"), document.getElementById("var_d_03count"), "March Discharges must be higher than or equal to Deaths")
		&& isMoreThan(document.getElementById("var_dischrg_04count"), document.getElementById("var_d_04count"), "April Discharges must be higher than or equal to Deaths")
		&& isMoreThan(document.getElementById("var_dischrg_05count"), document.getElementById("var_d_05count"), "May Discharges must be higher than or equal to Deaths")
		&& isMoreThan(document.getElementById("var_dischrg_06count"), document.getElementById("var_d_06count"), "June Discharges must be higher than or equal to Deaths")
		&& isMoreThan(document.getElementById("var_dischrg_07count"), document.getElementById("var_d_07count"), "July Discharges must be higher than or equal to Deaths")
		&& isMoreThan(document.getElementById("var_dischrg_08count"), document.getElementById("var_d_08count"), "August Discharges must be higher than or equal to Deaths")
		&& isMoreThan(document.getElementById("var_dischrg_09count"), document.getElementById("var_d_09count"), "September Discharges must be higher than or equal to Deaths")
		&& isMoreThan(document.getElementById("var_dischrg_10count"), document.getElementById("var_d_10count"), "October Discharges must be higher than or equal to Deaths")
		&& isMoreThan(document.getElementById("var_dischrg_11count"), document.getElementById("var_d_11count"), "November Discharges must be higher than or equal to Deaths")
		&& isMoreThan(document.getElementById("var_dischrg_12count"), document.getElementById("var_d_12count"), "December Discharges must be higher than or equal to Deaths");

	return ( valid_nums );
}
