
$(document).ready(function()
{
	setAttributesandValues();
})

function setAttributesandValues()
{
	document.getElementById("var_up_1time_total").value=(1*document.getElementById("var_up_1time_pass").value)+(1*document.getElementById("var_up_1time_fail").value)+(1*document.getElementById("var_up_1time_cond").value);
	
	if ( document.getElementById("var_up_1time_total").value != 0 )
		document.getElementById("var_up_1time_passpct").value=100*((1*document.getElementById("var_up_1time_pass").value) / document.getElementById("var_up_1time_total").value);
	else document.getElementById("var_up_1time_passpct").value=0;

	document.getElementById("var_up_repeat_total").value=(1*document.getElementById("var_up_repeat_pass").value)+(1*document.getElementById("var_up_repeat_fail").value)+(1*document.getElementById("var_up_repeat_cond").value);

	if ( document.getElementById("var_up_repeat_total").value != 0 )
		document.getElementById("var_up_repeat_passpct").value=100*((1*document.getElementById("var_up_repeat_pass").value) / document.getElementById("var_up_repeat_total").value);
	else document.getElementById("var_up_repeat_passpct").value=0;

	document.getElementById("var_up_total_pass").value=(1*document.getElementById("var_up_1time_pass").value)+(1*document.getElementById("var_up_repeat_pass").value);
	document.getElementById("var_up_total_fail").value=(1*document.getElementById("var_up_1time_fail").value)+(1*document.getElementById("var_up_repeat_fail").value);
	document.getElementById("var_up_total_cond").value=(1*document.getElementById("var_up_1time_cond").value)+(1*document.getElementById("var_up_repeat_cond").value);
	document.getElementById("var_up_total_total").value=(1*document.getElementById("var_up_1time_total").value)+(1*document.getElementById("var_up_repeat_total").value);
	
	if ( document.getElementById("var_up_total_total").value != 0 )
		document.getElementById("var_up_total_passpct").value=100*((1*document.getElementById("var_up_total_pass").value) / document.getElementById("var_up_total_total").value);
	else document.getElementById("var_up_total_passpct").value=0;

	// Convert and format number into two decimal places
	document.getElementById("var_up_1time_passpct").value=parseFloat(document.getElementById("var_up_1time_passpct").value).toFixed(2);
	document.getElementById("var_up_repeat_passpct").value=parseFloat(document.getElementById("var_up_repeat_passpct").value).toFixed(2);
	document.getElementById("var_up_total_passpct").value=parseFloat(document.getElementById("var_up_total_passpct").value).toFixed(2);
	
	// Convert and format number into thousands grouping (readonly fields)
	document.getElementById("var_up_1time_total").value=parseInt(document.getElementById("var_up_1time_total").value).toLocaleString();
	document.getElementById("var_up_repeat_total").value=parseInt(document.getElementById("var_up_repeat_total").value).toLocaleString();
	document.getElementById("var_up_total_pass").value=parseInt(document.getElementById("var_up_total_pass").value).toLocaleString();
	document.getElementById("var_up_total_fail").value=parseInt(document.getElementById("var_up_total_fail").value).toLocaleString();
	document.getElementById("var_up_total_cond").value=parseInt(document.getElementById("var_up_total_cond").value).toLocaleString();
	document.getElementById("var_up_total_total").value=parseInt(document.getElementById("var_up_total_total").value).toLocaleString();

	// Compare PRC official results and user input
	var isofficial=(document.getElementById("var_up_1time_pass").value == document.getElementById("var_up_1time_pass_orig").value) && (document.getElementById("var_up_1time_cond").value == document.getElementById("var_up_1time_cond_orig").value) && (document.getElementById("var_up_1time_fail").value == document.getElementById("var_up_1time_fail_orig").value) && (document.getElementById("var_up_repeat_pass").value == document.getElementById("var_up_repeat_pass_orig").value) && (document.getElementById("var_up_repeat_cond").value == document.getElementById("var_up_repeat_cond_orig").value) && (document.getElementById("var_up_repeat_fail").value == document.getElementById("var_up_repeat_fail_orig").value);

	document.getElementById("highed_prcfile2").required = !isofficial;
	document.getElementById("highed_prcfile2").disabled = isofficial;
	if (isofficial)
		document.getElementById("highed_prcfile2").value="";
	
}

function showPRCexam(str)
{
    if (str == "")
	{
        document.getElementById("prc_exam").innerHTML = "<p></p>";
    }
	else
	{ 
        if (window.XMLHttpRequest)
		{
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
		else
		{
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
                document.getElementById("prc_exam").innerHTML = xmlhttp.responseText;
            }
        };
		
        xmlhttp.open("GET","getprcexam.php?id="+str,true);
        xmlhttp.send();
    }
	
	return true;
}

function isValidForm()
{
	setAttributesandValues();

	// Compare PRC official results and user input
	var isofficial=(document.getElementById("var_up_1time_pass").value == document.getElementById("var_up_1time_pass_orig").value) && (document.getElementById("var_up_1time_cond").value == document.getElementById("var_up_1time_cond_orig").value) && (document.getElementById("var_up_1time_fail").value == document.getElementById("var_up_1time_fail_orig").value) && (document.getElementById("var_up_repeat_pass").value == document.getElementById("var_up_repeat_pass_orig").value) && (document.getElementById("var_up_repeat_cond").value == document.getElementById("var_up_repeat_cond_orig").value) && (document.getElementById("var_up_repeat_fail").value == document.getElementById("var_up_repeat_fail_orig").value);

	if (!isofficial)
	{
		if (document.getElementById("highed_prcfile2").value=="")
		{
			alert("You have entered some data to change the PRC official results. Please attach file containing your explanation.");
			document.getElementById("highed_prcfile2").focus();
			return false;
		}
	}
	else
	{
		document.getElementById("highed_prcfile2").value="";
	}

	return true;
}
