
function setAttributesandValues()
{
	document.getElementById("var_respondents").value=(1*document.getElementById("var_no_answer").value)+(1*document.getElementById("var_bad_rating").value)+(1*document.getElementById("var_fair_rating").value)+(1*document.getElementById("var_good_rating").value)+(1*document.getElementById("var_better_rating").value)+(1*document.getElementById("var_best_rating").value);
	
	document.getElementById("var_good_or_better").value=(1*document.getElementById("var_good_rating").value)+(1*document.getElementById("var_better_rating").value)+(1*document.getElementById("var_best_rating").value);
	
	// Convert and format number into thousands grouping (readonly fields)
	document.getElementById("var_respondents").value=parseInt(document.getElementById("var_respondents").value).toLocaleString();
	document.getElementById("var_good_or_better").value=parseInt(document.getElementById("var_good_or_better").value).toLocaleString();
	
	return true;
}

function isValidForm()
{
	var valid_nums=true;
	
	setAttributesandValues();
	
	// Validate the dates
	if (! isValidDate(document.getElementById("var_survey_date").value))
	{	
		document.getElementById("var_survey_date").focus();
		return false;
	}
	
	// Validate Survey Date must be this year (Note: #ChangeNextYear)
	var survey_date = Date.parse(document.getElementById("var_survey_date").value);
	var date1 = Date.parse("01/01/2016");
	var date2 = Date.parse("12/31/2016");
	var startdate = new Date(date1);
	var enddate = new Date(date2);
	var targetdate = new Date(survey_date);
		
	if ( !(targetdate >= startdate && targetdate <= enddate) )
	{
		alert("Date of Survey must fall within the current year only.");
		document.getElementById("var_survey_date").focus();
		return false;
	}
	
	if (1*document.getElementById("var_respondents").value == 0)
	{
		alert("Number of Students Surveyed must not be zero.");
		document.getElementById("var_respondents").focus();
		return false;
	}
	
	valid_nums=isMoreThan(document.getElementById("var_enrollment"), document.getElementById("var_respondents"), "Total Students Enrolled must be higher than or equal to the Total Students Surveyed");
	
	// sample size is 25% of population at least
	if (valid_nums)
	{
		var targetsamplesize=0.25*(document.getElementById("var_enrollment").value);
		targetsamplesize=Math.round(targetsamplesize);
		if (targetsamplesize > (1*document.getElementById("var_respondents").value))
		{
			alert("Number of Students Surveyed must be at least "+targetsamplesize+" or twenty-five percent (25%) of the Total Students Enrolled");
			valid_nums=false;
		}
	}
	
	return valid_nums;
}
