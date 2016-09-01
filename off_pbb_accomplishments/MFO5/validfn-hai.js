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
	
	if ( (1*document.getElementById("var_patients_01count").value) == 0)
	{
		document.getElementById("var_patientshai_01count").value=0;
	}
	document.getElementById("var_hai_01count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_01count").value), (1*document.getElementById("var_patients_01count").value));
	document.getElementById("var_hai_01count_pct").value=parseFloat(document.getElementById("var_hai_01count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_02count").value) == 0)
	{
		document.getElementById("var_patientshai_02count").value=0;
	}
	document.getElementById("var_hai_02count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_02count").value), (1*document.getElementById("var_patients_02count").value));
	document.getElementById("var_hai_02count_pct").value=parseFloat(document.getElementById("var_hai_02count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_03count").value) == 0)
	{
		document.getElementById("var_patientshai_03count").value=0;
	}
	document.getElementById("var_hai_03count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_03count").value), (1*document.getElementById("var_patients_03count").value));
	document.getElementById("var_hai_03count_pct").value=parseFloat(document.getElementById("var_hai_03count_pct").value).toFixed(2);
	
	if ( (1*document.getElementById("var_patients_04count").value) == 0)
	{
		document.getElementById("var_patientshai_04count").value=0;
	}
	document.getElementById("var_hai_04count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_04count").value), (1*document.getElementById("var_patients_04count").value));
	document.getElementById("var_hai_04count_pct").value=parseFloat(document.getElementById("var_hai_04count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_05count").value) == 0 )
	{
		document.getElementById("var_patientshai_05count").value=0;
	}
	document.getElementById("var_hai_05count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_05count").value), (1*document.getElementById("var_patients_05count").value));
	document.getElementById("var_hai_05count_pct").value=parseFloat(document.getElementById("var_hai_05count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_06count").value) == 0 )
	{
		document.getElementById("var_patientshai_06count").value=0;
	}
	document.getElementById("var_hai_06count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_06count").value), (1*document.getElementById("var_patients_06count").value));
	document.getElementById("var_hai_06count_pct").value=parseFloat(document.getElementById("var_hai_06count_pct").value).toFixed(2);
	
	if ( (1*document.getElementById("var_patients_07count").value) == 0 )
	{
		document.getElementById("var_patientshai_07count").value=0;
	}
	document.getElementById("var_hai_07count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_07count").value), (1*document.getElementById("var_patients_07count").value));
	document.getElementById("var_hai_07count_pct").value=parseFloat(document.getElementById("var_hai_07count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_08count").value) == 0 )
	{
		document.getElementById("var_patientshai_08count").value=0;
	}
	document.getElementById("var_hai_08count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_08count").value), (1*document.getElementById("var_patients_08count").value));
	document.getElementById("var_hai_08count_pct").value=parseFloat(document.getElementById("var_hai_08count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_09count").value) == 0 )
	{
		document.getElementById("var_patientshai_09count").value=0;
	}
	document.getElementById("var_hai_09count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_09count").value), (1*document.getElementById("var_patients_09count").value));
	document.getElementById("var_hai_09count_pct").value=parseFloat(document.getElementById("var_hai_09count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_10count").value) == 0 )
	{
		document.getElementById("var_patientshai_10count").value=0;
	}
	document.getElementById("var_hai_10count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_10count").value), (1*document.getElementById("var_patients_10count").value));
	document.getElementById("var_hai_10count_pct").value=parseFloat(document.getElementById("var_hai_10count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_11count").value) == 0 )
	{
		document.getElementById("var_patientshai_11count").value=0;
	}
	document.getElementById("var_hai_11count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_11count").value), (1*document.getElementById("var_patients_11count").value));
	document.getElementById("var_hai_11count_pct").value=parseFloat(document.getElementById("var_hai_11count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_12count").value) == 0 )
	{
		document.getElementById("var_patientshai_12count").value=0;
	}
	document.getElementById("var_hai_12count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_12count").value), (1*document.getElementById("var_patients_12count").value));
	document.getElementById("var_hai_12count_pct").value=parseFloat(document.getElementById("var_hai_12count_pct").value).toFixed(2);

	document.getElementById("var_patients_q1count").value=(1*document.getElementById("var_patients_01count").value)+(1*document.getElementById("var_patients_02count").value)+(1*document.getElementById("var_patients_03count").value);
	document.getElementById("var_patients_q2count").value=(1*document.getElementById("var_patients_04count").value)+(1*document.getElementById("var_patients_05count").value)+(1*document.getElementById("var_patients_06count").value);
	document.getElementById("var_patients_q3count").value=(1*document.getElementById("var_patients_07count").value)+(1*document.getElementById("var_patients_08count").value)+(1*document.getElementById("var_patients_09count").value);
	document.getElementById("var_patients_q4count").value=(1*document.getElementById("var_patients_10count").value)+(1*document.getElementById("var_patients_11count").value)+(1*document.getElementById("var_patients_12count").value);
	document.getElementById("var_patients_totalcount").value=(1*document.getElementById("var_patients_q1count").value)+(1*document.getElementById("var_patients_q2count").value)+(1*document.getElementById("var_patients_q3count").value)+(1*document.getElementById("var_patients_q4count").value);

	document.getElementById("var_patientshai_q1count").value=(1*document.getElementById("var_patientshai_01count").value)+(1*document.getElementById("var_patientshai_02count").value)+(1*document.getElementById("var_patientshai_03count").value);
	document.getElementById("var_patientshai_q2count").value=(1*document.getElementById("var_patientshai_04count").value)+(1*document.getElementById("var_patientshai_05count").value)+(1*document.getElementById("var_patientshai_06count").value);
	document.getElementById("var_patientshai_q3count").value=(1*document.getElementById("var_patientshai_07count").value)+(1*document.getElementById("var_patientshai_08count").value)+(1*document.getElementById("var_patientshai_09count").value);
	document.getElementById("var_patientshai_q4count").value=(1*document.getElementById("var_patientshai_10count").value)+(1*document.getElementById("var_patientshai_11count").value)+(1*document.getElementById("var_patientshai_12count").value);
	document.getElementById("var_patientshai_totalcount").value=(1*document.getElementById("var_patientshai_q1count").value)+(1*document.getElementById("var_patientshai_q2count").value)+(1*document.getElementById("var_patientshai_q3count").value)+(1*document.getElementById("var_patientshai_q4count").value);
	
	document.getElementById("var_hai_q1count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_q1count").value), (1*document.getElementById("var_patients_q1count").value));
	document.getElementById("var_hai_q2count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_q2count").value), (1*document.getElementById("var_patients_q2count").value));
	document.getElementById("var_hai_q3count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_q3count").value), (1*document.getElementById("var_patients_q3count").value));
	document.getElementById("var_hai_q4count_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_q4count").value), (1*document.getElementById("var_patients_q4count").value));
	document.getElementById("var_hai_totalcount_pct").value=getPercentAmount((1*document.getElementById("var_patientshai_totalcount").value), (1*document.getElementById("var_patients_totalcount").value));
	
	// Convert numbers to format with commas
	document.getElementById("var_patientshai_q1count").value=parseInt(document.getElementById("var_patientshai_q1count").value).toLocaleString();
	document.getElementById("var_patients_q1count").value=parseInt(document.getElementById("var_patients_q1count").value).toLocaleString();
	document.getElementById("var_hai_q1count_pct").value=parseFloat(document.getElementById("var_hai_q1count_pct").value).toFixed(2);
	
	document.getElementById("var_patientshai_q2count").value=parseInt(document.getElementById("var_patientshai_q2count").value).toLocaleString();
	document.getElementById("var_patients_q2count").value=parseInt(document.getElementById("var_patients_q2count").value).toLocaleString();
	document.getElementById("var_hai_q2count_pct").value=parseFloat(document.getElementById("var_hai_q2count_pct").value).toFixed(2);
	
	document.getElementById("var_patientshai_q3count").value=parseInt(document.getElementById("var_patientshai_q3count").value).toLocaleString();
	document.getElementById("var_patients_q3count").value=parseInt(document.getElementById("var_patients_q3count").value).toLocaleString();
	document.getElementById("var_hai_q3count_pct").value=parseFloat(document.getElementById("var_hai_q3count_pct").value).toFixed(2);
	
	document.getElementById("var_patientshai_q4count").value=parseInt(document.getElementById("var_patientshai_q4count").value).toLocaleString();
	document.getElementById("var_patients_q4count").value=parseInt(document.getElementById("var_patients_q4count").value).toLocaleString();
	document.getElementById("var_hai_q4count_pct").value=parseFloat(document.getElementById("var_hai_q4count_pct").value).toFixed(2);
	
	document.getElementById("var_patientshai_totalcount").value=parseInt(document.getElementById("var_patientshai_totalcount").value).toLocaleString();
	document.getElementById("var_patients_totalcount").value=parseInt(document.getElementById("var_patients_totalcount").value).toLocaleString();
	document.getElementById("var_hai_totalcount_pct").value=parseFloat(document.getElementById("var_hai_totalcount_pct").value).toFixed(2);
	
	return true;
}

function isValidForm()
{
	var valid_nums=true;
	
	setAttributesandValues();

	/* Put on-submit validation scripts here */
	valid_nums=valid_nums && isMoreThan(document.getElementById("var_patients_01count"), document.getElementById("var_patientshai_01count"), "January Patients must be higher than or equal to Patients with HAI")
		&& isMoreThan(document.getElementById("var_patients_02count"), document.getElementById("var_patientshai_02count"), "February Patients must be higher than or equal to Patients with HAI")
		&& isMoreThan(document.getElementById("var_patients_03count"), document.getElementById("var_patientshai_03count"), "March Patients must be higher than or equal to Patients with HAI")
		&& isMoreThan(document.getElementById("var_patients_04count"), document.getElementById("var_patientshai_04count"), "April Patients must be higher than or equal to Patients with HAI")
		&& isMoreThan(document.getElementById("var_patients_05count"), document.getElementById("var_patientshai_05count"), "May Patients must be higher than or equal to Patients with HAI")
		&& isMoreThan(document.getElementById("var_patients_06count"), document.getElementById("var_patientshai_06count"), "June Patients must be higher than or equal to Patients with HAI")
		&& isMoreThan(document.getElementById("var_patients_07count"), document.getElementById("var_patientshai_07count"), "July Patients must be higher than or equal to Patients with HAI")
		&& isMoreThan(document.getElementById("var_patients_08count"), document.getElementById("var_patientshai_08count"), "August Patients must be higher than or equal to Patients with HAI")
		&& isMoreThan(document.getElementById("var_patients_09count"), document.getElementById("var_patientshai_09count"), "September Patients must be higher than or equal to Patients with HAI")
		&& isMoreThan(document.getElementById("var_patients_10count"), document.getElementById("var_patientshai_10count"), "October Patients must be higher than or equal to Patients with HAI")
		&& isMoreThan(document.getElementById("var_patients_11count"), document.getElementById("var_patientshai_11count"), "November Patients must be higher than or equal to Patients with HAI")
		&& isMoreThan(document.getElementById("var_patients_12count"), document.getElementById("var_patientshai_12count"), "December Patients must be higher than or equal to Patients with HAI");

	return ( valid_nums );
}
