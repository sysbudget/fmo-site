$(document).ready(function()
{

$( "form:not(.filter) :input:visible:enabled:first" ).focus();

});

function getBedOccupancyRate(bed_days, ipdays)
{
	var rate = 0.00;
	if (bed_days != 0)
		rate = (ipdays/bed_days)*100;

	return rate;
}

function setAttributesandValues()
{
	// #Changenextyear
	var year = 2016;
	var date1 = new Date();
	var days = 0;
	var beds_total = 0;
	var months_total = 0;
	var days_total = 0;
	var months_in_qtr = 0;
	var days_in_qtr = 0;
	
	// First Quarter
	if (1*document.getElementById("var_beds_01count").value == 0)
	{
		document.getElementById("var_ipdays_01count").value=0;
		document.getElementById("var_bed_days_01count").value=0;
	}
	else
	{
		date1.setFullYear(year, 1, 0);
		days = date1.getDate();
		document.getElementById("var_bed_days_01count").value=(1*document.getElementById("var_beds_01count").value)*days;
		days_in_qtr = days_in_qtr + days;
		months_in_qtr++;
	}
	document.getElementById("var_bor_01count_pct").value=getBedOccupancyRate((1*document.getElementById("var_bed_days_01count").value), (1*document.getElementById("var_ipdays_01count").value));
	document.getElementById("var_bor_01count_pct").value=parseFloat(document.getElementById("var_bor_01count_pct").value).toFixed(2);
	
	if (1*document.getElementById("var_beds_02count").value == 0)
	{
		document.getElementById("var_ipdays_02count").value=0;
		document.getElementById("var_bed_days_02count").value=0;
	}
	else
	{
		date1.setFullYear(year, 2, 0);
		days = date1.getDate();
		document.getElementById("var_bed_days_02count").value=document.getElementById("var_beds_02count").value*days;
		days_in_qtr = days_in_qtr + days;
		months_in_qtr++;
	}
	document.getElementById("var_bor_02count_pct").value=getBedOccupancyRate(document.getElementById("var_bed_days_02count").value, (1*document.getElementById("var_ipdays_02count").value));
	document.getElementById("var_bor_02count_pct").value=parseFloat(document.getElementById("var_bor_02count_pct").value).toFixed(2);
	
	if (1*document.getElementById("var_beds_03count").value == 0)
	{
		document.getElementById("var_ipdays_03count").value=0;
		document.getElementById("var_bed_days_03count").value=0;
	}
	else
	{
		date1.setFullYear(year, 3, 0);
		days = date1.getDate();
		document.getElementById("var_bed_days_03count").value=document.getElementById("var_beds_03count").value*days;
		days_in_qtr = days_in_qtr + days;
		months_in_qtr++;
	}
	document.getElementById("var_bor_03count_pct").value=getBedOccupancyRate(document.getElementById("var_bed_days_03count").value, (1*document.getElementById("var_ipdays_03count").value));
	document.getElementById("var_bor_03count_pct").value=parseFloat(document.getElementById("var_bor_03count_pct").value).toFixed(2);
	
	
	if (months_in_qtr > 0)
		document.getElementById("var_beds_q1count").value=Math.ceil(((1*document.getElementById("var_beds_01count").value)+(1*document.getElementById("var_beds_02count").value)+(1*document.getElementById("var_beds_03count").value))/months_in_qtr);
	else
		document.getElementById("var_beds_q1count").value=0;

	// document.getElementById("var_bed_days_q1count").value=(1*document.getElementById("var_bed_days_01count").value)+(1*document.getElementById("var_bed_days_02count").value)+(1*document.getElementById("var_bed_days_03count").value);	
	document.getElementById("var_bed_days_q1count").value=(1*document.getElementById("var_beds_q1count").value)*days_in_qtr;
	
	document.getElementById("var_ipdays_q1count").value=(1*document.getElementById("var_ipdays_01count").value)+(1*document.getElementById("var_ipdays_02count").value)+(1*document.getElementById("var_ipdays_03count").value);

	document.getElementById("var_bor_q1count_pct").value=getBedOccupancyRate(document.getElementById("var_bed_days_q1count").value, (1*document.getElementById("var_ipdays_q1count").value));

	beds_total=beds_total+((1*document.getElementById("var_beds_01count").value)+(1*document.getElementById("var_beds_02count").value)+(1*document.getElementById("var_beds_03count").value));
	months_total=months_total+months_in_qtr;
	days_total=days_total+days_in_qtr;
	
	// Second Quarter
	months_in_qtr = 0;
	days_in_qtr = 0;
	if (1*document.getElementById("var_beds_04count").value == 0)
	{
		document.getElementById("var_ipdays_04count").value=0;
		document.getElementById("var_bed_days_04count").value=0;
	}
	else
	{
		date1.setFullYear(year, 4, 0);
		days = date1.getDate();
		document.getElementById("var_bed_days_04count").value=document.getElementById("var_beds_04count").value*days;
		days_in_qtr = days_in_qtr + days;
		months_in_qtr++;
	}
	document.getElementById("var_bor_04count_pct").value=getBedOccupancyRate(document.getElementById("var_bed_days_04count").value, (1*document.getElementById("var_ipdays_04count").value));
	document.getElementById("var_bor_04count_pct").value=parseFloat(document.getElementById("var_bor_04count_pct").value).toFixed(2);
	
	if (1*document.getElementById("var_beds_05count").value == 0)
	{
		document.getElementById("var_ipdays_05count").value=0;
		document.getElementById("var_bed_days_05count").value=0;
	}
	else
	{
		date1.setFullYear(year, 5, 0);
		days = date1.getDate();
		document.getElementById("var_bed_days_05count").value=document.getElementById("var_beds_05count").value*days;
		days_in_qtr = days_in_qtr + days;
		months_in_qtr++;
	}
	document.getElementById("var_bor_05count_pct").value=getBedOccupancyRate(document.getElementById("var_bed_days_05count").value, (1*document.getElementById("var_ipdays_05count").value));
	document.getElementById("var_bor_05count_pct").value=parseFloat(document.getElementById("var_bor_05count_pct").value).toFixed(2);
	
	if (1*document.getElementById("var_beds_06count").value == 0)
	{
		document.getElementById("var_ipdays_06count").value=0;
		document.getElementById("var_bed_days_06count").value=0;
	}
	else
	{
		date1.setFullYear(year, 6, 0);
		days = date1.getDate();
		document.getElementById("var_bed_days_06count").value=document.getElementById("var_beds_06count").value*days;
		days_in_qtr = days_in_qtr + days;
		months_in_qtr++;
	}
	document.getElementById("var_bor_06count_pct").value=getBedOccupancyRate(document.getElementById("var_bed_days_06count").value, (1*document.getElementById("var_ipdays_06count").value));
	document.getElementById("var_bor_06count_pct").value=parseFloat(document.getElementById("var_bor_06count_pct").value).toFixed(2);
	
	
	if (months_in_qtr > 0)
		document.getElementById("var_beds_q2count").value=Math.ceil(((1*document.getElementById("var_beds_04count").value)+(1*document.getElementById("var_beds_05count").value)+(1*document.getElementById("var_beds_06count").value))/months_in_qtr);
	else
		document.getElementById("var_beds_q2count").value=0;

	// document.getElementById("var_bed_days_q2count").value=(1*document.getElementById("var_bed_days_04count").value)+(1*document.getElementById("var_bed_days_05count").value)+(1*document.getElementById("var_bed_days_06count").value);	
	document.getElementById("var_bed_days_q2count").value=(1*document.getElementById("var_beds_q2count").value)*days_in_qtr;
	
	document.getElementById("var_ipdays_q2count").value=(1*document.getElementById("var_ipdays_04count").value)+(1*document.getElementById("var_ipdays_05count").value)+(1*document.getElementById("var_ipdays_06count").value);

	document.getElementById("var_bor_q2count_pct").value=getBedOccupancyRate(document.getElementById("var_bed_days_q2count").value, (1*document.getElementById("var_ipdays_q2count").value));

	beds_total=beds_total+((1*document.getElementById("var_beds_04count").value)+(1*document.getElementById("var_beds_05count").value)+(1*document.getElementById("var_beds_06count").value));
	months_total=months_total+months_in_qtr;
	days_total=days_total+days_in_qtr;
	
	// Third Quarter
	months_in_qtr = 0;
	days_in_qtr = 0;
	if (1*document.getElementById("var_beds_07count").value == 0)
	{
		document.getElementById("var_ipdays_07count").value=0;
		document.getElementById("var_bed_days_07count").value=0;
	}
	else
	{
		date1.setFullYear(year, 7, 0);
		days = date1.getDate();
		document.getElementById("var_bed_days_07count").value=(1*document.getElementById("var_beds_07count").value)*days;
		days_in_qtr = days_in_qtr + days;
		months_in_qtr++;
	}
	document.getElementById("var_bor_07count_pct").value=getBedOccupancyRate((1*document.getElementById("var_bed_days_07count").value), (1*document.getElementById("var_ipdays_07count").value));
	document.getElementById("var_bor_07count_pct").value=parseFloat(document.getElementById("var_bor_07count_pct").value).toFixed(2);
	
	if (1*document.getElementById("var_beds_08count").value == 0)
	{
		document.getElementById("var_ipdays_08count").value=0;
		document.getElementById("var_bed_days_08count").value=0;
	}
	else
	{
		date1.setFullYear(year, 8, 0);
		days = date1.getDate();
		document.getElementById("var_bed_days_08count").value=(1*document.getElementById("var_beds_08count").value)*days;
		days_in_qtr = days_in_qtr + days;
		months_in_qtr++;
	}
	document.getElementById("var_bor_08count_pct").value=getBedOccupancyRate((1*document.getElementById("var_bed_days_08count").value), (1*document.getElementById("var_ipdays_08count").value));
	document.getElementById("var_bor_08count_pct").value=parseFloat(document.getElementById("var_bor_08count_pct").value).toFixed(2);
	
	if (1*document.getElementById("var_beds_09count").value == 0)
	{
		document.getElementById("var_ipdays_09count").value=0;
		document.getElementById("var_bed_days_09count").value=0;
	}
	else
	{
		date1.setFullYear(year, 9, 0);
		days = date1.getDate();
		document.getElementById("var_bed_days_09count").value=(1*document.getElementById("var_beds_09count").value)*days;
		days_in_qtr = days_in_qtr + days;
		months_in_qtr++;
	}
	document.getElementById("var_bor_09count_pct").value=getBedOccupancyRate((1*document.getElementById("var_bed_days_09count").value), (1*document.getElementById("var_ipdays_09count").value));
	document.getElementById("var_bor_09count_pct").value=parseFloat(document.getElementById("var_bor_09count_pct").value).toFixed(2);
	
	
	if (months_in_qtr > 0)
		document.getElementById("var_beds_q3count").value=Math.ceil(((1*document.getElementById("var_beds_07count").value)+(1*document.getElementById("var_beds_08count").value)+(1*document.getElementById("var_beds_09count").value))/months_in_qtr);
	else
		document.getElementById("var_beds_q3count").value=0;

	document.getElementById("var_bed_days_q3count").value=(1*document.getElementById("var_beds_q3count").value)*days_in_qtr;
	
	document.getElementById("var_ipdays_q3count").value=(1*document.getElementById("var_ipdays_07count").value)+(1*document.getElementById("var_ipdays_08count").value)+(1*document.getElementById("var_ipdays_09count").value);

	document.getElementById("var_bor_q3count_pct").value=getBedOccupancyRate((1*document.getElementById("var_bed_days_q3count").value), (1*document.getElementById("var_ipdays_q3count").value));

	beds_total=beds_total+((1*document.getElementById("var_beds_07count").value)+(1*document.getElementById("var_beds_08count").value)+(1*document.getElementById("var_beds_09count").value));
	months_total=months_total+months_in_qtr;
	days_total=days_total+days_in_qtr;
	
	// Fourth Quarter
	months_in_qtr = 0;
	days_in_qtr = 0;
	if (1*document.getElementById("var_beds_10count").value == 0)
	{
		document.getElementById("var_ipdays_10count").value=0;
		document.getElementById("var_bed_days_10count").value=0;
	}
	else
	{
		date1.setFullYear(year, 10, 0);
		days = date1.getDate();
		document.getElementById("var_bed_days_10count").value=document.getElementById("var_beds_10count").value*days;
		days_in_qtr = days_in_qtr + days;
		months_in_qtr++;
	}
	document.getElementById("var_bor_10count_pct").value=getBedOccupancyRate(document.getElementById("var_bed_days_10count").value, (1*document.getElementById("var_ipdays_10count").value));
	document.getElementById("var_bor_10count_pct").value=parseFloat(document.getElementById("var_bor_10count_pct").value).toFixed(2);
	
	if (1*document.getElementById("var_beds_11count").value == 0)
	{
		document.getElementById("var_ipdays_11count").value=0;
		document.getElementById("var_bed_days_11count").value=0;
	}
	else
	{
		date1.setFullYear(year, 11, 0);
		days = date1.getDate();
		document.getElementById("var_bed_days_11count").value=1*document.getElementById("var_beds_11count").value*days;
		days_in_qtr = days_in_qtr + days;
		months_in_qtr++;
	}
	document.getElementById("var_bor_11count_pct").value=getBedOccupancyRate(document.getElementById("var_bed_days_11count").value, (1*document.getElementById("var_ipdays_11count").value));
	document.getElementById("var_bor_11count_pct").value=parseFloat(document.getElementById("var_bor_11count_pct").value).toFixed(2);
	
	if (1*document.getElementById("var_beds_12count").value == 0)
	{
		document.getElementById("var_ipdays_12count").value=0;
		document.getElementById("var_bed_days_12count").value=0;
	}
	else
	{
		date1.setFullYear(year, 12, 0);
		days = date1.getDate();
		document.getElementById("var_bed_days_12count").value=document.getElementById("var_beds_12count").value*days;
		days_in_qtr = days_in_qtr + days;
		months_in_qtr++;
	}
	document.getElementById("var_bor_12count_pct").value=getBedOccupancyRate(document.getElementById("var_bed_days_12count").value, (1*document.getElementById("var_ipdays_12count").value));
	document.getElementById("var_bor_12count_pct").value=parseFloat(document.getElementById("var_bor_12count_pct").value).toFixed(2);
	
	
	if (months_in_qtr > 0)
		document.getElementById("var_beds_q4count").value=Math.ceil(((1*document.getElementById("var_beds_10count").value)+(1*document.getElementById("var_beds_11count").value)+(1*document.getElementById("var_beds_12count").value))/months_in_qtr);
	else
		document.getElementById("var_beds_q4count").value=0;

	// document.getElementById("var_bed_days_q4count").value=(1*document.getElementById("var_bed_days_10count").value)+(1*document.getElementById("var_bed_days_11count").value)+(1*document.getElementById("var_bed_days_12count").value);	
	document.getElementById("var_bed_days_q4count").value=(1*document.getElementById("var_beds_q4count").value)*days_in_qtr;
	
	document.getElementById("var_ipdays_q4count").value=(1*document.getElementById("var_ipdays_10count").value)+(1*document.getElementById("var_ipdays_11count").value)+(1*document.getElementById("var_ipdays_12count").value);

	document.getElementById("var_bor_q4count_pct").value=getBedOccupancyRate(document.getElementById("var_bed_days_q4count").value, (1*document.getElementById("var_ipdays_q4count").value));

	beds_total=beds_total+((1*document.getElementById("var_beds_10count").value)+(1*document.getElementById("var_beds_11count").value)+(1*document.getElementById("var_beds_12count").value));
	months_total=months_total+months_in_qtr;
	days_total=days_total+days_in_qtr;
	
	// Grand Total
	document.getElementById("var_beds_totalcount").value=Math.ceil(beds_total/months_total);
	document.getElementById("var_ipdays_totalcount").value=(1*document.getElementById("var_ipdays_q1count").value)+(1*document.getElementById("var_ipdays_q2count").value)+(1*document.getElementById("var_ipdays_q3count").value)+(1*document.getElementById("var_ipdays_q4count").value);
	// document.getElementById("var_bed_days_totalcount").value=(1*document.getElementById("var_bed_days_q1count").value)+(1*document.getElementById("var_bed_days_q2count").value)+(1*document.getElementById("var_bed_days_q3count").value)+(1*document.getElementById("var_bed_days_q4count").value);
	document.getElementById("var_bed_days_totalcount").value=(1*document.getElementById("var_beds_totalcount").value)*days_total;
	document.getElementById("var_bor_totalcount_pct").value=getBedOccupancyRate(document.getElementById("var_bed_days_totalcount").value, (1*document.getElementById("var_ipdays_totalcount").value));

	// Convert numbers to format with commas or two decimal places
	document.getElementById("var_bed_days_01count").value=parseInt(document.getElementById("var_bed_days_01count").value).toLocaleString();
	document.getElementById("var_bed_days_02count").value=parseInt(document.getElementById("var_bed_days_02count").value).toLocaleString();
	document.getElementById("var_bed_days_03count").value=parseInt(document.getElementById("var_bed_days_03count").value).toLocaleString();
	document.getElementById("var_bed_days_04count").value=parseInt(document.getElementById("var_bed_days_04count").value).toLocaleString();
	document.getElementById("var_bed_days_05count").value=parseInt(document.getElementById("var_bed_days_05count").value).toLocaleString();
	document.getElementById("var_bed_days_06count").value=parseInt(document.getElementById("var_bed_days_06count").value).toLocaleString();
	document.getElementById("var_bed_days_07count").value=parseInt(document.getElementById("var_bed_days_07count").value).toLocaleString();
	document.getElementById("var_bed_days_08count").value=parseInt(document.getElementById("var_bed_days_08count").value).toLocaleString();
	document.getElementById("var_bed_days_09count").value=parseInt(document.getElementById("var_bed_days_09count").value).toLocaleString();
	document.getElementById("var_bed_days_10count").value=parseInt(document.getElementById("var_bed_days_10count").value).toLocaleString();
	document.getElementById("var_bed_days_11count").value=parseInt(document.getElementById("var_bed_days_11count").value).toLocaleString();
	document.getElementById("var_bed_days_12count").value=parseInt(document.getElementById("var_bed_days_12count").value).toLocaleString();
	document.getElementById("var_beds_q1count").value=parseInt(document.getElementById("var_beds_q1count").value).toLocaleString();
	document.getElementById("var_ipdays_q1count").value=parseInt(document.getElementById("var_ipdays_q1count").value).toLocaleString();
	document.getElementById("var_bed_days_q1count").value=parseInt(document.getElementById("var_bed_days_q1count").value).toLocaleString();
	document.getElementById("var_bor_q1count_pct").value=parseFloat(document.getElementById("var_bor_q1count_pct").value).toFixed(2);
	document.getElementById("var_beds_q2count").value=parseInt(document.getElementById("var_beds_q2count").value).toLocaleString();
	document.getElementById("var_ipdays_q2count").value=parseInt(document.getElementById("var_ipdays_q2count").value).toLocaleString();
	document.getElementById("var_bed_days_q2count").value=parseInt(document.getElementById("var_bed_days_q2count").value).toLocaleString();
	document.getElementById("var_bor_q2count_pct").value=parseFloat(document.getElementById("var_bor_q2count_pct").value).toFixed(2);
	document.getElementById("var_beds_q3count").value=parseInt(document.getElementById("var_beds_q3count").value).toLocaleString();
	document.getElementById("var_ipdays_q3count").value=parseInt(document.getElementById("var_ipdays_q3count").value).toLocaleString();
	document.getElementById("var_bed_days_q3count").value=parseInt(document.getElementById("var_bed_days_q3count").value).toLocaleString();
	document.getElementById("var_bor_q3count_pct").value=parseFloat(document.getElementById("var_bor_q3count_pct").value).toFixed(2);
	document.getElementById("var_beds_q4count").value=parseInt(document.getElementById("var_beds_q4count").value).toLocaleString();
	document.getElementById("var_ipdays_q4count").value=parseInt(document.getElementById("var_ipdays_q4count").value).toLocaleString();
	document.getElementById("var_bed_days_q4count").value=parseInt(document.getElementById("var_bed_days_q4count").value).toLocaleString();
	document.getElementById("var_bor_q4count_pct").value=parseFloat(document.getElementById("var_bor_q4count_pct").value).toFixed(2);
	document.getElementById("var_beds_totalcount").value=parseInt(document.getElementById("var_beds_totalcount").value).toLocaleString();
	document.getElementById("var_ipdays_totalcount").value=parseInt(document.getElementById("var_ipdays_totalcount").value).toLocaleString();
	document.getElementById("var_bed_days_totalcount").value=parseInt(document.getElementById("var_bed_days_totalcount").value).toLocaleString();
	document.getElementById("var_bor_totalcount_pct").value=parseFloat(document.getElementById("var_bor_totalcount_pct").value).toFixed(2);	

	return true;
}

function isValidForm()
{
	setAttributesandValues();
	
	/* Put on-submit validation scripts here */
	
	return true;
}
