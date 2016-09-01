$(document).ready(function()
{

/* $( "form:not(.filter) :input:visible:enabled:first" ).focus(); */

/* Datepicker handler on all date fields */
$( "input[name$='_date']" ).datepicker();

/* Select or highlight whole text or number when input field is in focus */
$( "input[type='text'], input[type='number']" )
	.focus(function() {
		this.select();
	});

});

function isValidDate(dateStr)
{
 
 // Checks for the following valid date formats:
 // MM/DD/YYYY
 // Also separates date into month, day, and year variables
 var datePat = /^(\d{2,2})(\/)(\d{2,2})\2(\d{4}|\d{4})$/;
 
 var matchArray = dateStr.match(datePat); // is the format ok?
 if (matchArray == null) {
  alert("Date must be in MM/DD/YYYY format");
  return false;
 }
 
 month = matchArray[1]; // parse date into variables
 day = matchArray[3];
 year = matchArray[4];
 if (month < 1 || month > 12) { // check month range
  alert("Month must be between 1 and 12");
  return false;
 }
 if (day < 1 || day > 31) {
  alert("Day must be between 1 and 31");
  return false;
 }
 if ((month==4 || month==6 || month==9 || month==11) && day==31) {
  alert("Month "+month+" doesn't have 31 days!");
  return false;
 }
 if (month == 2) { // check for february 29th
  var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
  if (day>29 || (day==29 && !isleap)) {
   alert("February " + year + " doesn't have " + day + " days!");
   return false;
    }
 }
 return true;  // date is valid
}

function isNumeral(txtid)
{
    // Is the inputted text composed of positive numbers only?
	
    var ok=0;
	var a=document.getElementById(txtid).value;
	
      for(var i=0;i<=a.length-1;i++)
      {
        var j=a.charCodeAt(i);
           for(var k=48;k<=57;k++)
        {
          ok=0;
          if (k==j)
          {
            ok=1;
            break ;
          }
        }
        if (ok==0) {break;}
      }
	  
	  // Allow empty string
      if ( (a.length > 0) && (ok==0) )
      {
        alert("Please input positive whole numbers only");
        document.getElementById(txtid).value="";
        for(var i=0;i<a.length;i++)
        {
         var j=a.charCodeAt(i);
           for(var k=48;k<=57;k++)
        {
          ok=0;
          if(k==j)
          {
           document.getElementById(txtid).value+=a.charAt(i);
           }
         } 
        }
		document.getElementById(txtid).focus();
      }
	  
	  return true;
}

function isDecimal(txtid)
{
    
    var ok=0;
	var a=document.getElementById(txtid).value;
	var pointcnt=0;
	
      for(var i=0;i<=a.length-1;i++)
      {
		if (a.charAt(i)!=".")
		{
			var j=a.charCodeAt(i);
			   for(var k=48;k<=57;k++)
			{
			  ok=0;
			  if (k==j)
			  {
				ok=1;
				break ;
			  }
			}
        } else {
				pointcnt=pointcnt+1;
			}
        if (ok==0 || pointcnt>1)  {break;}
      }
	  
	  // Allow empty string
      if ( (a.length > 0) && (ok==0 || pointcnt>1) )
      {
        alert("Please input number in valid decimal format");
        document.getElementById(txtid).value="";
        for(var i=0;i<a.length;i++)
        {
			if (a.charAt(i)!=".")
			{
				 var j=a.charCodeAt(i);
				   for(var k=48;k<=57;k++)
				{
				  ok=0;
				  if(k==j)
				  {
				   document.getElementById(txtid).value+=a.charAt(i);
				   }
				}
			} else {
				if (pointcnt<=1) {document.getElementById(txtid).value+=a.charAt(i);}
			}
        }
		document.getElementById(txtid).focus();
      }
	  
	  return true;
}
	
function checkban(txtid, datatype)
{
	// Validates the correct data type of inputted text
	if (document.layers||document.all||document.getElementById)
		switch (datatype)
		{
			case 1:
				return ( isNumeral(txtid) );
				break;
			case 2:
				if (!isValidDate(document.getElementById(txtid).value))
				{	
					document.getElementById(txtid).focus();
					return false;
				}
				break;
			case 3:
				return ( isDecimal(txtid) );
				break;
			default:
				break;
		}

	return true;
}

function isMoreThan(txtid1, txtid2, error_msg)
{
	if ( (1*txtid1.value) < (1*txtid2.value) )
	{
		alert( error_msg );
		txtid1.focus();
		return false;
	}
	
	return true;
}

function isFuture(datestr)
{
	// Compare target date and today's date
	var someday = Date.parse(datestr);
	var today = new Date();
	var targetdate = new Date(someday);
		
	if (targetdate > today)
	{
		alert("Date must not be after today"); 
		return true;
	}

	return false;
}

function alertFilename(txtid, targetfilenamestr)
{

// file upload
var file_name = "";
var file_size = "";
var file_ext = "";
var file_name_sample = "";
var file_name = document.getElementById(txtid).files[0].name;
var file_ext = file_name.substring(file_name.lastIndexOf('.')+1);
var file_size = document.getElementById(txtid).files[0].size;

var file_name_sample = targetfilenamestr;
var file_name_sample = file_name_sample + ".pdf";

	if (file_name != file_name_sample)
	{
		alert("Use the prescribed filename. " + file_name + " is not valid.");
		document.getElementById(txtid).value="";
		document.getElementById(txtid).focus();
		return false;
	}

	if (file_size >= 5242880)
	{
		alert("File size exceeds 5MB! Action to take: Upload the first page of the pdf file, then send the full pdf via e-mail to sysbudget@up.edu.ph with the prescribed filename entered in the Subject line. ");
		document.getElementById(txtid).value="";
		document.getElementById(txtid).focus();
		return false;
	}
		
	return true;
}
