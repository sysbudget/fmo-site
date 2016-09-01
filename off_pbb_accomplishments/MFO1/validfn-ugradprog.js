$(document).ready(function()
{
	$("input[name^='var_q1_grad_']")
		.change(function() {
			$("#highed_gradfile1").prop("disabled", $(this).val()*1 <= 0);
			$("#highed_gradfile1").prop("required", $(this).val()*1 > 0);
			if ($(this).val()*1 <= 0)
				$("#highed_gradfile1").val("");
		});
		
	$("input[name^='var_q2_grad_']")
		.change(function() {
			$("#highed_gradfile2").prop("disabled", $(this).val()*1 <= 0);
			$("#highed_gradfile2").prop("required", $(this).val()*1 > 0);
			if ($(this).val()*1 <= 0)
				$("#highed_gradfile2").val("");
		});
		
	$("input[name^='var_q3_grad_']")
		.change(function() {
			$("#highed_gradfile3").prop("disabled", $(this).val()*1 <= 0);
			$("#highed_gradfile3").prop("required", $(this).val()*1 > 0);
			if ($(this).val()*1 <= 0)
				$("#highed_gradfile3").val("");
		});
		
	$("input[name^='var_q4_grad_']")
		.change(function() {
			$("#highed_gradfile4").prop("disabled", $(this).val()*1 <= 0);
			$("#highed_gradfile4").prop("required", $(this).val()*1 > 0);
			if ($(this).val()*1 <= 0)
				$("#highed_gradfile4").val("");
		});
		
})

function setAttributesandValues()
{
	document.getElementById("var_all_grad_total").value=(1*document.getElementById("var_q1_grad_total").value)+(1*document.getElementById("var_q2_grad_total").value)+(1*document.getElementById("var_q3_grad_total").value)+(1*document.getElementById("var_q4_grad_total").value);
	
	document.getElementById("var_all_grad_intime").value=(1*document.getElementById("var_q1_grad_intime").value)+(1*document.getElementById("var_q2_grad_intime").value)+(1*document.getElementById("var_q3_grad_intime").value)+(1*document.getElementById("var_q4_grad_intime").value);
	
	// Convert and format number into thousands grouping (readonly fields)
	document.getElementById("var_all_grad_total").value=parseInt(document.getElementById("var_all_grad_total").value).toLocaleString();
	document.getElementById("var_all_grad_intime").value=parseInt(document.getElementById("var_all_grad_intime").value).toLocaleString();
	
	return true;
}

function isValidForm()
{
	var valid_nums=true;

	setAttributesandValues();
	
	// Validate the date format
	if (! isValidDate(document.getElementById("var_bor_mtg_date").value) || isFuture(document.getElementById("var_bor_mtg_date").value))
	{	
		document.getElementById("var_bor_mtg_date").focus();
		return false;
	}
	
	// Validate diploma recipients - total must be not be less than those who graduated within prescribed timeframe
	// Validate total enrollment must not be less than total diploma recipients
	valid_nums=isMoreThan(document.getElementById("var_q1_grad_total"), document.getElementById("var_q1_grad_intime"), "Jan to Mar Total must be higher than or equal to the number for Graduated within Prescribed Timeframe")
		&& isMoreThan(document.getElementById("var_q2_grad_total"), document.getElementById("var_q2_grad_intime"), "Apr to Jun Total must be higher than or equal to the number for Graduated within Prescribed Timeframe")
		&& isMoreThan(document.getElementById("var_q3_grad_total"), document.getElementById("var_q3_grad_intime"), "Jul to Sep Total must be higher than or equal to the number for Graduated within Prescribed Timeframe")
		&& isMoreThan(document.getElementById("var_q4_grad_total"), document.getElementById("var_q4_grad_intime"), "Oct to Dec Total must be higher than or equal to the number for Graduated within Prescribed Timeframe");
		
	return ( valid_nums );
}
