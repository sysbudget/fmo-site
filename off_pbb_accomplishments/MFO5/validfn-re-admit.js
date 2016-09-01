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
		document.getElementById("var_readmit_01count").value=0;
	}
	document.getElementById("var_readmit_01count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_01count").value), (1*document.getElementById("var_patients_01count").value));
	document.getElementById("var_readmit_01count_pct").value=parseFloat(document.getElementById("var_readmit_01count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_02count").value) == 0)
	{
		document.getElementById("var_readmit_02count").value=0;
	}
	document.getElementById("var_readmit_02count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_02count").value), (1*document.getElementById("var_patients_02count").value));
	document.getElementById("var_readmit_02count_pct").value=parseFloat(document.getElementById("var_readmit_02count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_03count").value) == 0)
	{
		document.getElementById("var_readmit_03count").value=0;
	}
	document.getElementById("var_readmit_03count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_03count").value), (1*document.getElementById("var_patients_03count").value));
	document.getElementById("var_readmit_03count_pct").value=parseFloat(document.getElementById("var_readmit_03count_pct").value).toFixed(2);
	
	if ( (1*document.getElementById("var_patients_04count").value) == 0)
	{
		document.getElementById("var_readmit_04count").value=0;
	}
	document.getElementById("var_readmit_04count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_04count").value), (1*document.getElementById("var_patients_04count").value));
	document.getElementById("var_readmit_04count_pct").value=parseFloat(document.getElementById("var_readmit_04count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_05count").value) == 0 )
	{
		document.getElementById("var_readmit_05count").value=0;
	}
	document.getElementById("var_readmit_05count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_05count").value), (1*document.getElementById("var_patients_05count").value));
	document.getElementById("var_readmit_05count_pct").value=parseFloat(document.getElementById("var_readmit_05count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_06count").value) == 0 )
	{
		document.getElementById("var_readmit_06count").value=0;
	}
	document.getElementById("var_readmit_06count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_06count").value), (1*document.getElementById("var_patients_06count").value));
	document.getElementById("var_readmit_06count_pct").value=parseFloat(document.getElementById("var_readmit_06count_pct").value).toFixed(2);
	
	if ( (1*document.getElementById("var_patients_07count").value) == 0 )
	{
		document.getElementById("var_readmit_07count").value=0;
	}
	document.getElementById("var_readmit_07count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_07count").value), (1*document.getElementById("var_patients_07count").value));
	document.getElementById("var_readmit_07count_pct").value=parseFloat(document.getElementById("var_readmit_07count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_08count").value) == 0 )
	{
		document.getElementById("var_readmit_08count").value=0;
	}
	document.getElementById("var_readmit_08count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_08count").value), (1*document.getElementById("var_patients_08count").value));
	document.getElementById("var_readmit_08count_pct").value=parseFloat(document.getElementById("var_readmit_08count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_09count").value) == 0 )
	{
		document.getElementById("var_readmit_09count").value=0;
	}
	document.getElementById("var_readmit_09count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_09count").value), (1*document.getElementById("var_patients_09count").value));
	document.getElementById("var_readmit_09count_pct").value=parseFloat(document.getElementById("var_readmit_09count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_10count").value) == 0 )
	{
		document.getElementById("var_readmit_10count").value=0;
	}
	document.getElementById("var_readmit_10count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_10count").value), (1*document.getElementById("var_patients_10count").value));
	document.getElementById("var_readmit_10count_pct").value=parseFloat(document.getElementById("var_readmit_10count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_11count").value) == 0 )
	{
		document.getElementById("var_readmit_11count").value=0;
	}
	document.getElementById("var_readmit_11count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_11count").value), (1*document.getElementById("var_patients_11count").value));
	document.getElementById("var_readmit_11count_pct").value=parseFloat(document.getElementById("var_readmit_11count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_patients_12count").value) == 0 )
	{
		document.getElementById("var_readmit_12count").value=0;
	}
	document.getElementById("var_readmit_12count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_12count").value), (1*document.getElementById("var_patients_12count").value));
	document.getElementById("var_readmit_12count_pct").value=parseFloat(document.getElementById("var_readmit_12count_pct").value).toFixed(2);

	document.getElementById("var_patients_q1count").value=(1*document.getElementById("var_patients_01count").value)+(1*document.getElementById("var_patients_02count").value)+(1*document.getElementById("var_patients_03count").value);
	document.getElementById("var_patients_q2count").value=(1*document.getElementById("var_patients_04count").value)+(1*document.getElementById("var_patients_05count").value)+(1*document.getElementById("var_patients_06count").value);
	document.getElementById("var_patients_q3count").value=(1*document.getElementById("var_patients_07count").value)+(1*document.getElementById("var_patients_08count").value)+(1*document.getElementById("var_patients_09count").value);
	document.getElementById("var_patients_q4count").value=(1*document.getElementById("var_patients_10count").value)+(1*document.getElementById("var_patients_11count").value)+(1*document.getElementById("var_patients_12count").value);
	document.getElementById("var_patients_totalcount").value=(1*document.getElementById("var_patients_q1count").value)+(1*document.getElementById("var_patients_q2count").value)+(1*document.getElementById("var_patients_q3count").value)+(1*document.getElementById("var_patients_q4count").value);

	document.getElementById("var_readmit_q1count").value=(1*document.getElementById("var_readmit_01count").value)+(1*document.getElementById("var_readmit_02count").value)+(1*document.getElementById("var_readmit_03count").value);
	document.getElementById("var_readmit_q2count").value=(1*document.getElementById("var_readmit_04count").value)+(1*document.getElementById("var_readmit_05count").value)+(1*document.getElementById("var_readmit_06count").value);
	document.getElementById("var_readmit_q3count").value=(1*document.getElementById("var_readmit_07count").value)+(1*document.getElementById("var_readmit_08count").value)+(1*document.getElementById("var_readmit_09count").value);
	document.getElementById("var_readmit_q4count").value=(1*document.getElementById("var_readmit_10count").value)+(1*document.getElementById("var_readmit_11count").value)+(1*document.getElementById("var_readmit_12count").value);
	document.getElementById("var_readmit_totalcount").value=(1*document.getElementById("var_readmit_q1count").value)+(1*document.getElementById("var_readmit_q2count").value)+(1*document.getElementById("var_readmit_q3count").value)+(1*document.getElementById("var_readmit_q4count").value);
	
	document.getElementById("var_readmit_q1count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_q1count").value), (1*document.getElementById("var_patients_q1count").value));
	document.getElementById("var_readmit_q2count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_q2count").value), (1*document.getElementById("var_patients_q2count").value));
	document.getElementById("var_readmit_q3count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_q3count").value), (1*document.getElementById("var_patients_q3count").value));
	document.getElementById("var_readmit_q4count_pct").value=getPercentAmount((1*document.getElementById("var_readmit_q4count").value), (1*document.getElementById("var_patients_q4count").value));
	document.getElementById("var_readmit_totalcount_pct").value=getPercentAmount((1*document.getElementById("var_readmit_totalcount").value), (1*document.getElementById("var_patients_totalcount").value));
	
	// Convert numbers to format with commas
	document.getElementById("var_readmit_q1count").value=parseInt(document.getElementById("var_readmit_q1count").value).toLocaleString();
	document.getElementById("var_patients_q1count").value=parseInt(document.getElementById("var_patients_q1count").value).toLocaleString();
	document.getElementById("var_readmit_q1count_pct").value=parseFloat(document.getElementById("var_readmit_q1count_pct").value).toFixed(2);
	
	document.getElementById("var_readmit_q2count").value=parseInt(document.getElementById("var_readmit_q2count").value).toLocaleString();
	document.getElementById("var_patients_q2count").value=parseInt(document.getElementById("var_patients_q2count").value).toLocaleString();
	document.getElementById("var_readmit_q2count_pct").value=parseFloat(document.getElementById("var_readmit_q2count_pct").value).toFixed(2);
	
	document.getElementById("var_readmit_q3count").value=parseInt(document.getElementById("var_readmit_q3count").value).toLocaleString();
	document.getElementById("var_patients_q3count").value=parseInt(document.getElementById("var_patients_q3count").value).toLocaleString();
	document.getElementById("var_readmit_q3count_pct").value=parseFloat(document.getElementById("var_readmit_q3count_pct").value).toFixed(2);
	
	document.getElementById("var_readmit_q4count").value=parseInt(document.getElementById("var_readmit_q4count").value).toLocaleString();
	document.getElementById("var_patients_q4count").value=parseInt(document.getElementById("var_patients_q4count").value).toLocaleString();
	document.getElementById("var_readmit_q4count_pct").value=parseFloat(document.getElementById("var_readmit_q4count_pct").value).toFixed(2);
	
	document.getElementById("var_readmit_totalcount").value=parseInt(document.getElementById("var_readmit_totalcount").value).toLocaleString();
	document.getElementById("var_patients_totalcount").value=parseInt(document.getElementById("var_patients_totalcount").value).toLocaleString();
	document.getElementById("var_readmit_totalcount_pct").value=parseFloat(document.getElementById("var_readmit_totalcount_pct").value).toFixed(2);
	
	return true;
}

function isValidForm()
{
	var valid_nums=true;
	
	setAttributesandValues();

	/* Put on-submit validation scripts here */
	valid_nums=valid_nums && isMoreThan(document.getElementById("var_patients_01count"), document.getElementById("var_readmit_01count"), "January Patients Discharged must be higher than or equal to Patients Re-Admitted")
		&& isMoreThan(document.getElementById("var_patients_02count"), document.getElementById("var_readmit_02count"), "February Patients Discharged must be higher than or equal to Patients Re-Admitted")
		&& isMoreThan(document.getElementById("var_patients_03count"), document.getElementById("var_readmit_03count"), "March Patients Discharged must be higher than or equal to Patients Re-Admitted")
		&& isMoreThan(document.getElementById("var_patients_04count"), document.getElementById("var_readmit_04count"), "April Patients Discharged must be higher than or equal to Patients Re-Admitted")
		&& isMoreThan(document.getElementById("var_patients_05count"), document.getElementById("var_readmit_05count"), "May Patients Discharged must be higher than or equal to Patients Re-Admitted")
		&& isMoreThan(document.getElementById("var_patients_06count"), document.getElementById("var_readmit_06count"), "June Patients Discharged must be higher than or equal to Patients Re-Admitted")
		&& isMoreThan(document.getElementById("var_patients_07count"), document.getElementById("var_readmit_07count"), "July Patients Discharged must be higher than or equal to Patients Re-Admitted")
		&& isMoreThan(document.getElementById("var_patients_08count"), document.getElementById("var_readmit_08count"), "August Patients Discharged must be higher than or equal to Patients Re-Admitted")
		&& isMoreThan(document.getElementById("var_patients_09count"), document.getElementById("var_readmit_09count"), "September Patients Discharged must be higher than or equal to Patients Re-Admitted")
		&& isMoreThan(document.getElementById("var_patients_10count"), document.getElementById("var_readmit_10count"), "October Patients Discharged must be higher than or equal to Patients Re-Admitted")
		&& isMoreThan(document.getElementById("var_patients_11count"), document.getElementById("var_readmit_11count"), "November Patients Discharged must be higher than or equal to Patients Re-Admitted")
		&& isMoreThan(document.getElementById("var_patients_12count"), document.getElementById("var_readmit_12count"), "December Patients Discharged must be higher than or equal to Patients Re-Admitted");

	return ( valid_nums );
}
