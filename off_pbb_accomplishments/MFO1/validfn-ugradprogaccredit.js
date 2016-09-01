$(document).ready(function()
{
	/* If yes is the answer to Is an Accreditable Program?, do not accept Level */
	$("input[name='var_accreditable']").click(function(){
            var isyes = $("input[name='var_accreditable']:checked").val() == "1";
			if( isyes)
            	$("#var_accreditation_level").val("");
			
			$("#var_accreditation_level").prop("disabled", (isyes));
        });
});

function showUser(str)
{
    if (str == "")
	{
        document.getElementById("accreditation_classification_name").innerHTML = "";
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
                document.getElementById("accreditation_classification_name").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getaccreditationclass.php?id="+str,true);
        xmlhttp.send();
    }
	
	return true;
}

function isValidForm()
{
	//Validate the dates
	var isemptystart_date = document.getElementById("var_validity_start_date").value == "";
	
	if (isemptystart_date)
		document.getElementById("var_validity_end_date").value = "";
	else
	{
		if (! isValidDate(document.getElementById("var_validity_start_date").value) || isFuture(document.getElementById("var_validity_start_date").value) )
		{
			document.getElementById("var_validity_start_date").focus();
			return false;
		}

		if ( document.getElementById("var_validity_end_date").value != "" )
		{
			if ( ! isValidDate(document.getElementById("var_validity_end_date").value) )
			{
				document.getElementById("var_validity_end_date").focus();
				return false;
			}

			// Compare the dates
			var tempdate = Date.parse(document.getElementById("var_validity_start_date").value);
			var startdate = new Date(tempdate);
			
			tempdate = Date.parse(document.getElementById("var_validity_end_date").value);
			var enddate = new Date(tempdate);
			
			if (startdate > enddate)
			{
				alert("Start Date of validity must not be after the End Date.");
				document.getElementById("var_validity_start_date").focus();
				return false;
			}
			
			// Check if year of end date is 2016 (Note: #ChangeNextYear)
			if (enddate.getFullYear() < 2016)
			{
				alert("End Date of validity must be within or after 2016.");
				document.getElementById("var_validity_end_date").focus();
				return false;
			}
		}
	}
	
	return true;
}
