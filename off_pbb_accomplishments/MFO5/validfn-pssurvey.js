$(document).ready(function()
{

	$( "form:not(.filter) :input:visible:enabled:first" ).focus();

	$("input[name^='var_clients_']")
		.blur(function() {
			
			$("#hosp_surveyfile1").prop("disabled", $("#var_clients_01count").val()*1 <= 0);
			$("#hosp_surveyfile1").prop("required", $("#var_clients_01count").val()*1 > 0 && $("#var_was_uploaded_file1").val() == "");
			if ($("#var_clients_01count").val()*1 <= 0)
				$("#hosp_surveyfile1").val("");
			
			$("#hosp_surveyfile2").prop("disabled", $("#var_clients_02count").val()*1 <= 0);
			$("#hosp_surveyfile2").prop("required", $("#var_clients_02count").val()*1 > 0 && $("#var_was_uploaded_file2").val() == "");
			if ($("#var_clients_02count").val()*1 <= 0)
				$("#hosp_surveyfile2").val("");

			$("#hosp_surveyfile3").prop("disabled", $("#var_clients_03count").val()*1 <= 0);
			$("#hosp_surveyfile3").prop("required", $("#var_clients_03count").val()*1 > 0 && $("#var_was_uploaded_file3").val() == "");
			if ($("#var_clients_03count").val()*1 <= 0)
				$("#hosp_surveyfile3").val("");
			
			$("#hosp_surveyfile4").prop("disabled", $("#var_clients_04count").val()*1 <= 0);
			$("#hosp_surveyfile4").prop("required", $("#var_clients_04count").val()*1 > 0 && $("#var_was_uploaded_file4").val() == "");
			if ($("#var_clients_04count").val()*1 <= 0)
				$("#hosp_surveyfile4").val("");
			
			$("#hosp_surveyfile5").prop("disabled", $("#var_clients_05count").val()*1 <= 0);
			$("#hosp_surveyfile5").prop("required", $("#var_clients_05count").val()*1 > 0 && $("#var_was_uploaded_file5").val() == "");
			if ($("#var_clients_05count").val()*1 <= 0)
				$("#hosp_surveyfile5").val("");

			$("#hosp_surveyfile6").prop("disabled", $("#var_clients_06count").val()*1 <= 0);
			$("#hosp_surveyfile6").prop("required", $("#var_clients_06count").val()*1 > 0 && $("#var_was_uploaded_file6").val() == "");
			if ($("#var_clients_06count").val()*1 <= 0)
				$("#hosp_surveyfile6").val("");

			$("#hosp_surveyfile7").prop("disabled", $("#var_clients_07count").val()*1 <= 0);
			$("#hosp_surveyfile7").prop("required", $("#var_clients_07count").val()*1 > 0 && $("#var_was_uploaded_file7").val() == "");
			if ($("#var_clients_07count").val()*1 <= 0)
				$("#hosp_surveyfile7").val("");

			$("#hosp_surveyfile8").prop("disabled", $("#var_clients_08count").val()*1 <= 0);
			$("#hosp_surveyfile8").prop("required", $("#var_clients_08count").val()*1 > 0 && $("#var_was_uploaded_file8").val() == "");
			if ($("#var_clients_08count").val()*1 <= 0)
				$("#hosp_surveyfile8").val("");

			$("#hosp_surveyfile9").prop("disabled", $("#var_clients_09count").val()*1 <= 0);
			$("#hosp_surveyfile9").prop("required", $("#var_clients_09count").val()*1 > 0 && $("#var_was_uploaded_file9").val() == "");
			if ($("#var_clients_09count").val()*1 <= 0)
				$("#hosp_surveyfile9").val("");

			$("#hosp_surveyfile10").prop("disabled", $("#var_clients_10count").val()*1 <= 0);
			$("#hosp_surveyfile10").prop("required", $("#var_clients_10count").val()*1 > 0 && $("#var_was_uploaded_file10").val() == "");
			if ($("#var_clients_10count").val()*1 <= 0)
				$("#hosp_surveyfile10").val("");

			$("#hosp_surveyfile11").prop("disabled", $("#var_clients_11count").val()*1 <= 0);
			$("#hosp_surveyfile11").prop("required", $("#var_clients_11count").val()*1 > 0 && $("#var_was_uploaded_file11").val() == "");
			if ($("#var_clients_11count").val()*1 <= 0)
				$("#hosp_surveyfile11").val("");

			$("#hosp_surveyfile12").prop("disabled", $("#var_clients_12count").val()*1 <= 0);
			$("#hosp_surveyfile12").prop("required", $("#var_clients_12count").val()*1 > 0 && $("#var_was_uploaded_file12").val() == "");
			if ($("#var_clients_12count").val()*1 <= 0)
				$("#hosp_surveyfile12").val("");
		});
		
	$("#hosp_surveyfile13").prop("required", $("#var_was_uploaded_file13").val() == "");

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
	
	if ( (1*document.getElementById("var_clients_01count").value) == 0)
	{
		document.getElementById("var_satisfactorybetter_01count").value=0;
	}
	document.getElementById("var_satisfactorybetter_01count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_01count").value), (1*document.getElementById("var_clients_01count").value));
	document.getElementById("var_satisfactorybetter_01count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_01count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_clients_02count").value) == 0)
	{
		document.getElementById("var_satisfactorybetter_02count").value=0;
	}
	document.getElementById("var_satisfactorybetter_02count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_02count").value), (1*document.getElementById("var_clients_02count").value));
	document.getElementById("var_satisfactorybetter_02count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_02count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_clients_03count").value) == 0)
	{
		document.getElementById("var_satisfactorybetter_03count").value=0;
	}
	document.getElementById("var_satisfactorybetter_03count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_03count").value), (1*document.getElementById("var_clients_03count").value));
	document.getElementById("var_satisfactorybetter_03count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_03count_pct").value).toFixed(2);
	
	if ( (1*document.getElementById("var_clients_04count").value) == 0)
	{
		document.getElementById("var_satisfactorybetter_04count").value=0;
	}
	document.getElementById("var_satisfactorybetter_04count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_04count").value), (1*document.getElementById("var_clients_04count").value));
	document.getElementById("var_satisfactorybetter_04count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_04count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_clients_05count").value) == 0 )
	{
		document.getElementById("var_satisfactorybetter_05count").value=0;
	}
	document.getElementById("var_satisfactorybetter_05count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_05count").value), (1*document.getElementById("var_clients_05count").value));
	document.getElementById("var_satisfactorybetter_05count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_05count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_clients_06count").value) == 0 )
	{
		document.getElementById("var_satisfactorybetter_06count").value=0;
	}
	document.getElementById("var_satisfactorybetter_06count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_06count").value), (1*document.getElementById("var_clients_06count").value));
	document.getElementById("var_satisfactorybetter_06count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_06count_pct").value).toFixed(2);
	
	if ( (1*document.getElementById("var_clients_07count").value) == 0 )
	{
		document.getElementById("var_satisfactorybetter_07count").value=0;
	}
	document.getElementById("var_satisfactorybetter_07count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_07count").value), (1*document.getElementById("var_clients_07count").value));
	document.getElementById("var_satisfactorybetter_07count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_07count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_clients_08count").value) == 0 )
	{
		document.getElementById("var_satisfactorybetter_08count").value=0;
	}
	document.getElementById("var_satisfactorybetter_08count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_08count").value), (1*document.getElementById("var_clients_08count").value));
	document.getElementById("var_satisfactorybetter_08count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_08count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_clients_09count").value) == 0 )
	{
		document.getElementById("var_satisfactorybetter_09count").value=0;
	}
	document.getElementById("var_satisfactorybetter_09count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_09count").value), (1*document.getElementById("var_clients_09count").value));
	document.getElementById("var_satisfactorybetter_09count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_09count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_clients_10count").value) == 0 )
	{
		document.getElementById("var_satisfactorybetter_10count").value=0;
	}
	document.getElementById("var_satisfactorybetter_10count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_10count").value), (1*document.getElementById("var_clients_10count").value));
	document.getElementById("var_satisfactorybetter_10count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_10count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_clients_11count").value) == 0 )
	{
		document.getElementById("var_satisfactorybetter_11count").value=0;
	}
	document.getElementById("var_satisfactorybetter_11count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_11count").value), (1*document.getElementById("var_clients_11count").value));
	document.getElementById("var_satisfactorybetter_11count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_11count_pct").value).toFixed(2);

	if ( (1*document.getElementById("var_clients_12count").value) == 0 )
	{
		document.getElementById("var_satisfactorybetter_12count").value=0;
	}
	document.getElementById("var_satisfactorybetter_12count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_12count").value), (1*document.getElementById("var_clients_12count").value));
	document.getElementById("var_satisfactorybetter_12count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_12count_pct").value).toFixed(2);

	document.getElementById("var_clients_q1count").value=(1*document.getElementById("var_clients_01count").value)+(1*document.getElementById("var_clients_02count").value)+(1*document.getElementById("var_clients_03count").value);
	document.getElementById("var_clients_q2count").value=(1*document.getElementById("var_clients_04count").value)+(1*document.getElementById("var_clients_05count").value)+(1*document.getElementById("var_clients_06count").value);
	document.getElementById("var_clients_q3count").value=(1*document.getElementById("var_clients_07count").value)+(1*document.getElementById("var_clients_08count").value)+(1*document.getElementById("var_clients_09count").value);
	document.getElementById("var_clients_q4count").value=(1*document.getElementById("var_clients_10count").value)+(1*document.getElementById("var_clients_11count").value)+(1*document.getElementById("var_clients_12count").value);
	document.getElementById("var_clients_totalcount").value=(1*document.getElementById("var_clients_q1count").value)+(1*document.getElementById("var_clients_q2count").value)+(1*document.getElementById("var_clients_q3count").value)+(1*document.getElementById("var_clients_q4count").value);

	document.getElementById("var_satisfactorybetter_q1count").value=(1*document.getElementById("var_satisfactorybetter_01count").value)+(1*document.getElementById("var_satisfactorybetter_02count").value)+(1*document.getElementById("var_satisfactorybetter_03count").value);
	document.getElementById("var_satisfactorybetter_q2count").value=(1*document.getElementById("var_satisfactorybetter_04count").value)+(1*document.getElementById("var_satisfactorybetter_05count").value)+(1*document.getElementById("var_satisfactorybetter_06count").value);
	document.getElementById("var_satisfactorybetter_q3count").value=(1*document.getElementById("var_satisfactorybetter_07count").value)+(1*document.getElementById("var_satisfactorybetter_08count").value)+(1*document.getElementById("var_satisfactorybetter_09count").value);
	document.getElementById("var_satisfactorybetter_q4count").value=(1*document.getElementById("var_satisfactorybetter_10count").value)+(1*document.getElementById("var_satisfactorybetter_11count").value)+(1*document.getElementById("var_satisfactorybetter_12count").value);
	document.getElementById("var_satisfactorybetter_totalcount").value=(1*document.getElementById("var_satisfactorybetter_q1count").value)+(1*document.getElementById("var_satisfactorybetter_q2count").value)+(1*document.getElementById("var_satisfactorybetter_q3count").value)+(1*document.getElementById("var_satisfactorybetter_q4count").value);
	
	document.getElementById("var_satisfactorybetter_q1count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_q1count").value), (1*document.getElementById("var_clients_q1count").value));
	document.getElementById("var_satisfactorybetter_q2count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_q2count").value), (1*document.getElementById("var_clients_q2count").value));
	document.getElementById("var_satisfactorybetter_q3count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_q3count").value), (1*document.getElementById("var_clients_q3count").value));
	document.getElementById("var_satisfactorybetter_q4count_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_q4count").value), (1*document.getElementById("var_clients_q4count").value));
	document.getElementById("var_satisfactorybetter_totalcount_pct").value=getPercentAmount((1*document.getElementById("var_satisfactorybetter_totalcount").value), (1*document.getElementById("var_clients_totalcount").value));
	
	// Convert numbers to format with commas
	document.getElementById("var_satisfactorybetter_q1count").value=parseInt(document.getElementById("var_satisfactorybetter_q1count").value).toLocaleString();
	document.getElementById("var_clients_q1count").value=parseInt(document.getElementById("var_clients_q1count").value).toLocaleString();
	document.getElementById("var_satisfactorybetter_q1count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_q1count_pct").value).toFixed(2);
	
	document.getElementById("var_satisfactorybetter_q2count").value=parseInt(document.getElementById("var_satisfactorybetter_q2count").value).toLocaleString();
	document.getElementById("var_clients_q2count").value=parseInt(document.getElementById("var_clients_q2count").value).toLocaleString();
	document.getElementById("var_satisfactorybetter_q2count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_q2count_pct").value).toFixed(2);
	
	document.getElementById("var_satisfactorybetter_q3count").value=parseInt(document.getElementById("var_satisfactorybetter_q3count").value).toLocaleString();
	document.getElementById("var_clients_q3count").value=parseInt(document.getElementById("var_clients_q3count").value).toLocaleString();
	document.getElementById("var_satisfactorybetter_q3count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_q3count_pct").value).toFixed(2);
	
	document.getElementById("var_satisfactorybetter_q4count").value=parseInt(document.getElementById("var_satisfactorybetter_q4count").value).toLocaleString();
	document.getElementById("var_clients_q4count").value=parseInt(document.getElementById("var_clients_q4count").value).toLocaleString();
	document.getElementById("var_satisfactorybetter_q4count_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_q4count_pct").value).toFixed(2);
	
	document.getElementById("var_satisfactorybetter_totalcount").value=parseInt(document.getElementById("var_satisfactorybetter_totalcount").value).toLocaleString();
	document.getElementById("var_clients_totalcount").value=parseInt(document.getElementById("var_clients_totalcount").value).toLocaleString();
	document.getElementById("var_satisfactorybetter_totalcount_pct").value=parseFloat(document.getElementById("var_satisfactorybetter_totalcount_pct").value).toFixed(2);
	
	return true;
}

function isValidForm()
{
	var valid_nums=true;
	
	setAttributesandValues();

	/* Put on-submit validation scripts here */
	valid_nums=valid_nums && isMoreThan(document.getElementById("var_clients_01count"), document.getElementById("var_satisfactorybetter_01count"), "January No. of Respondents must be higher than or equal to No. of Satisfactory or Better Responses")
		&& isMoreThan(document.getElementById("var_clients_02count"), document.getElementById("var_satisfactorybetter_02count"), "February No. of Respondents must be higher than or equal to No. of Satisfactory or Better Responses")
		&& isMoreThan(document.getElementById("var_clients_03count"), document.getElementById("var_satisfactorybetter_03count"), "March No. of Respondents must be higher than or equal to No. of Satisfactory or Better Responses")
		&& isMoreThan(document.getElementById("var_clients_04count"), document.getElementById("var_satisfactorybetter_04count"), "April No. of Respondents must be higher than or equal to No. of Satisfactory or Better Responses")
		&& isMoreThan(document.getElementById("var_clients_05count"), document.getElementById("var_satisfactorybetter_05count"), "May No. of Respondents must be higher than or equal to No. of Satisfactory or Better Responses")
		&& isMoreThan(document.getElementById("var_clients_06count"), document.getElementById("var_satisfactorybetter_06count"), "June No. of Respondents must be higher than or equal to No. of Satisfactory or Better Responses")
		&& isMoreThan(document.getElementById("var_clients_07count"), document.getElementById("var_satisfactorybetter_07count"), "July No. of Respondents must be higher than or equal to No. of Satisfactory or Better Responses")
		&& isMoreThan(document.getElementById("var_clients_08count"), document.getElementById("var_satisfactorybetter_08count"), "August No. of Respondents must be higher than or equal to No. of Satisfactory or Better Responses")
		&& isMoreThan(document.getElementById("var_clients_09count"), document.getElementById("var_satisfactorybetter_09count"), "September No. of Respondents must be higher than or equal to No. of Satisfactory or Better Responses")
		&& isMoreThan(document.getElementById("var_clients_10count"), document.getElementById("var_satisfactorybetter_10count"), "October No. of Respondents must be higher than or equal to No. of Satisfactory or Better Responses")
		&& isMoreThan(document.getElementById("var_clients_11count"), document.getElementById("var_satisfactorybetter_11count"), "November No. of Respondents must be higher than or equal to No. of Satisfactory or Better Responses")
		&& isMoreThan(document.getElementById("var_clients_12count"), document.getElementById("var_satisfactorybetter_12count"), "December No. of Respondents must be higher than or equal to No. of Satisfactory or Better Responses");

	return ( valid_nums );
}
