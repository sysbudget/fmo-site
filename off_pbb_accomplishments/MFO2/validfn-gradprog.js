$(document).ready(function()
{
	$("input[name^='var_q1_grad_']")
		.change(function() {
			$("#adved_gradfile1").prop("disabled", $(this).val()*1 <= 0);
			$("#adved_gradfile1").prop("required", $(this).val()*1 > 0);
			if ($(this).val()*1 <= 0)
				$("#adved_gradfile1").val("");
			});
			
	$("input[name^='var_q2_grad_']")
		.change(function() {
			$("#adved_gradfile2").prop("disabled", $(this).val()*1 <= 0);
			$("#adved_gradfile2").prop("required", $(this).val()*1 > 0);
			if ($(this).val()*1 <= 0)
				$("#adved_gradfile2").val("");
		});
		
	$("input[name^='var_q3_grad_']")
		.change(function() {
			$("#adved_gradfile3").prop("disabled", $(this).val()*1 <= 0);
			$("#adved_gradfile3").prop("required", $(this).val()*1 > 0);
			if ($(this).val()*1 <= 0)
				$("#adved_gradfile3").val("");
		});
		
	$("input[name^='var_q4_grad_']")
		.change(function() {
			$("#adved_gradfile4").prop("disabled", $(this).val()*1 <= 0);
			$("#adved_gradfile4").prop("required", $(this).val()*1 > 0);
			if ($(this).val()*1 <= 0)
				$("#adved_gradfile4").val("");
		});
	
})

function setAttributesandValues()
{
	document.getElementById("var_all_grad_total").value=(1*document.getElementById("var_q1_grad_total").value)+(1*document.getElementById("var_q2_grad_total").value)+(1*document.getElementById("var_q3_grad_total").value)+(1*document.getElementById("var_q4_grad_total").value);

	// Convert and format number into thousands grouping (readonly fields)
	document.getElementById("var_all_grad_total").value=parseInt(document.getElementById("var_all_grad_total").value).toLocaleString();

	return true;
}

function isValidForm()
{
	setAttributesandValues();
	
	// Validate the date
	if (! isValidDate(document.getElementById("var_bor_mtg_date").value) || isFuture(document.getElementById("var_bor_mtg_date").value) )
	{	
		document.getElementById("var_bor_mtg_date").focus();
		return false;
	}
	
	return true;
}
