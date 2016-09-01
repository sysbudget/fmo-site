
$(document).ready(function()
{
	/* Assigned handler for document ready event and change events for Employment Status and Salary Increase */
	var evaluateImprovement =
		function()
		{
			/* Constants */
			var c_unemployed = "1";
			var c_selfemployed = "2";
			var c_employed = "3";
			var c_yes = "Y";
			var c_no = "N";
			
			/* Initialize some variables */
			var increased = $('#var_is_increase_y').is(':checked');
			var promoted = $('#var_is_promo_y').is(':checked');
			var statbefore = $("#var_stat_before_id").val();
			var statafter = $("#var_stat_after_id").val();
			var employedaftergrad = $("select[name='var_stat_after_id'] option:selected").val() > c_unemployed;
			var hired_date1 = Date.parse($("#var_hire_date").val());
			var grad_date1 = Date.parse($("#var_grad_date").val());

			/* Disable input to Date Hired and Monthly Income */
			$("#var_hire_date").prop("disabled", (!employedaftergrad));
			$("#var_income_id").prop("disabled", (!employedaftergrad));

			/* -------- Evaluation for Unemployed After Grad ----------- */
			if (!employedaftergrad)
			{
				/* Disable input to Questions about Increase and Promotion */
				$("input[name='var_is_increase']").prop("disabled", true);
				$("input[name='var_is_promo']").prop("disabled", true);

				/* Set a fixed No as the answer to Questions about Increase and Promotion */
				$("#var_is_increase_n").prop("checked", true);
				$("#var_is_promo_n").prop("checked", true);
				$("#hvar_is_increase").val(c_no);
				$("#hvar_is_promo").val(c_no);
				
				/* Set to empty values Date Hired and Monthly Income */
				$("input[name*='var_hire_date']").val("");
				$("select[name='var_income_id']").val("");
				$("input[name*='var_income_id']").val("");
				
				/* Disable input to % Increase in Income */
				$("input[name*='var_income_incr_pct']").val("");
				$("#var_income_incr_pct").prop("disabled", true);
			
				/* Set Evaluation Result: 3 - No Change or Improvement */
				$("#hvar_hired_improved_id").val("3");
				$("#var_hired_improved").val("No change or improvement");
			}

			/* -------- Evaluation for Employed/Self-Employed After Grad ----------- */
			else
			{
				/* -------- A. If Unemployed Prior Grad ----------- */
				if (statbefore <= c_unemployed)
				{
					/* Set a fixed Yes as the answer to the Question about Increase */
					$("input[name='var_is_increase']").prop("disabled", true);
					$("#var_is_increase_y").prop("checked", true);
					$("#hvar_is_increase").val(c_yes);

					/* Set a fixed No as the answer to the Question about Increase */
					$("input[name='var_is_promo']").prop("disabled", true);
					$("#var_is_promo_n").prop("checked", true);
					$("#hvar_is_promo").val(c_no);
					
					/* Set a fixed 100% to % Increase */
					$("#var_income_incr_pct").val("100").prop("disabled", true);
					$("#hvar_income_incr_pct").val("100");

					/* Check Graduation Date and Date Hired */
					if ( !isNaN(grad_date1) && !isNaN(hired_date1) )
					{
						var grad_date = new Date(grad_date1);
						var hired_date = new Date(hired_date1);
						
						/* Date at six months after graduation */
						var target_date = new Date(grad_date1);
						target_date.setMonth(target_date.getMonth() + 6);
						var after_grad_target_date = new Date(target_date);
						
						/* Compare ... */
						if ( hired_date <= after_grad_target_date && hired_date >= grad_date )
						{
							/* Set Evaluation Result: 1 - Employed within six months after grad */
							$("#hvar_hired_improved_id").val("1");
							$("#var_hired_improved").val("Gained employment within six months after graduation");
						}
						else
						{
							if ( hired_date < grad_date )
							{
								/* Set Evaluation Result: empty - No result. Error message will be displayed */
								$("#hvar_hired_improved_id").val("");
								$("#var_hired_improved").val("");
							}
							else
							{
								/* Set Evaluation Result: 2 - Employed more than six months after grad */
								$("#hvar_hired_improved_id").val("2");
								$("#var_hired_improved").val("Gained employment more than six months after graduation");
							}
						}
					}
					
					else
					{
						/* Set Evaluation Result: empty - No result.  Error message will be displayed */
						$("#hvar_hired_improved_id").val("");
						$("#var_hired_improved").val("");
					}
				}

				/* -------- B. If Employed/Self-Employed Prior Grad ----------- */
				else
				{
					
					$("input[name='var_is_increase']").prop("disabled", false);
					if (statbefore == c_employed && statafter == c_employed)
					{
						$("input[name='var_is_promo']").prop("disabled", false);
					}
					else
					{
						$("input[name='var_is_promo']").prop("disabled", true);
						$("#var_is_promo_n").prop("checked", true);
						$("#hvar_is_promo").val(c_no);
						promoted = false;
					}
					
					$("#var_income_incr_pct").prop("disabled", !increased);
					if (increased || promoted)
					{
						if (!increased)
						{
							$("input[name*='var_income_incr_pct']").val("");
							$("#hvar_income_incr_pct").val("");
						}

						/* Set Evaluation Result: 2 - Job improved */
						$("#hvar_hired_improved_id").val("2");
						$("#var_hired_improved").val("Job improved");
					}
					else
					{
						$("input[name*='var_income_incr_pct']").val("");
						$("#hvar_income_incr_pct").val("");
						
						/* Set Evaluation Result: 3 - No change or improvement */
						$("#hvar_hired_improved_id").val("3");
						$("#var_hired_improved").val("No change or improvement");
					}
				}
			}
		};

	/* On load DOM */
	$(document).ready(evaluateImprovement);
		
	/* On change Employment Status and Salary Increase */
	$("select[name*='var_stat']")
		.change(evaluateImprovement);
	
	$("input[name^='var_is_']")
		.change(evaluateImprovement);

	$("#var_grad_date")
		.change(evaluateImprovement);

	$("#var_hire_date")
		.change(evaluateImprovement);
	
	/* On submit form */
	$("form")
		.submit(function( event ){
				/* Trigger the assigned change event handler "evaluateImprovement" first to set the employment status improvement value */
				$("#var_grad_date").change();
			return isValidForm();
		});
})

function isValidForm()
{
	// Validate Tracer Study Date
	if (! isValidDate(document.getElementById("var_trace_date").value) || isFuture(document.getElementById("var_trace_date").value))
	{
		document.getElementById("var_trace_date").focus();
		return false;
	}

	// Validate Graduation Date
	if (! isValidDate(document.getElementById("var_grad_date").value))
	{
		document.getElementById("var_grad_date").focus();
		return false;
	}

	// Validate Graduation Date must be after July of previous year until ? of this year (Note: #ChangeNextYear)
	var grad_date = Date.parse(document.getElementById("var_grad_date").value);
	var date1 = Date.parse("07/01/2015");
	var date2 = Date.parse("11/30/2016");
	var startdate = new Date(date1);
	var enddate = new Date(date2);
	var targetdate = new Date(grad_date);
		
	if ( !(targetdate >= startdate && targetdate <= enddate) )
	{
		alert("Graduation Date must fall within July 1st of previous year and November of current year.");
		document.getElementById("var_grad_date").focus();
		return false;
	}

	// Validate Date Hired, if existing
	if (document.getElementById("var_hire_date").value != "")
	{
		if (! isValidDate(document.getElementById("var_hire_date").value) || isFuture(document.getElementById("var_hire_date").value))
		{
			document.getElementById("var_hire_date").focus();
			return false;
		}
		
		// Validate Date Hired must be on or after Graduation date when status before graduation is Unemployed
		var hire_datestr = Date.parse(document.getElementById("var_hire_date").value);
		var hire_date = new Date(hire_datestr);
		
		if ( document.getElementById("var_stat_before_id").value <= "1" )
		{
			if ( hire_date < grad_date )
			{
				alert("Date Hired for Current Job or Became Self-employed must be on or after Graduation Date when the employment status prior to graduation is Unemployed.");
				document.getElementById("var_hire_date").focus();
				return false;
			}
		}
	}
	
	return true;
}
