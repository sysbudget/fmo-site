// JavaScript Document
var d = new Date();
var y = d.getFullYear();

function validateForm()
{

 var stdate = document.getElementById("start_date");
 var endate = document.getElementById("end_date");
 
 //Validate the format of the start date
 if(isValidDate(stdate.value)==false){
  return false;
 }
 //Validate the format of the end date
 if(isValidDate(endate.value)==false){
  return false;
 }

 var stdate = document.getElementById("prep_sdate");
 var endate = document.getElementById("prep_edate");
 
 //Validate the format of the start date
 if(isValidDate(stdate.value)==false){
  return false;
 }
 //Validate the format of the end date
 if(isValidDate(endate.value)==false){
  return false;
 }


var x=document.forms["input_extension_form"]["cu"].value;
if (x==null || x=="" || x=="Please Select :")
  {
  alert("Please select a campus");
  return false;
  }  

var x=document.forms["input_extension_form"]["unit"].value;
if (x==null || x=="")
  {
  alert("Please select a unit");
  return false;
  }  

var x=document.forms["input_extension_form"]["extension_title"].value;
if (x==null || x=="")
  {
  alert("Please enter the extension service title");
  return false;
  }  

var x=document.forms["input_extension_form"]["status"].value;
if (x==null || x=="")
  {
  alert("Please select the status of the extension service");
  return false;
  }  

var x=document.forms["input_extension_form"]["tot_train_days"].value;

if (x==null || x=="" || x<0)
  {
  alert("Total training days is not filled up, to low or not a number");
  return false;
  }  

var x=document.forms["input_extension_form"]["objective"].value;
if (x==null || x=="")
  {
  alert("Please enter the objective(s) of the extension service");
  return false;
  }  

var x=document.forms["input_extension_form"]["activity_type"].value;
if (x==null || x=="")
  {
  alert("Please select the type of activity being conducted");
  return false;
  }  

var x=document.forms["input_extension_form"]["prog_class"].value;
if (x==null || x=="")
  {
  alert("Please select the program classification");
  return false;
  }  

var x=document.forms["input_extension_form"]["out_imp"].value;
if (x==null || x=="")
  {
  alert("Please select the nature of output or impact");
  return false;
  }  

var x=document.forms["input_extension_form"]["interest_ext"].value;
if (x==null || x=="")
  {
  alert("Please select the main area of interest \n of the extension service");
  return false;
  }  

var x=document.forms["input_extension_form"]["client_type"].value;
if (x==null || x=="")
  {
  alert("Please select the type of client");
  return false;
  }  

var x=document.forms["input_extension_form"]["client_count"].value;

if (isNaN(x))
  {
  alert("Client count must be a number");
  return false;
  }  

var x=document.forms["input_extension_form"]["sponsor"].value;
if (x==null || x=="")
  {
  alert("Please enter the sponsor(s) of the extension service");
  return false;
  }  

var x=document.forms["input_extension_form"]["gen_fund"].value;

if (isNaN(x))
  {
  alert("U.P. General fund must be a number");
  return false;
  }  

var x=document.forms["input_extension_form"]["revolv_fund"].value;

if (isNaN(x))
  {
  alert("U.P. Revolving fund must be a number");
  return false;
  }  

var x=document.forms["input_extension_form"]["other_fund"].value;

if (isNaN(x))
  {
  alert("Other goverment fund must be a number");
  return false;
  }  

var x=document.forms["input_extension_form"]["priv_fund"].value;

if (isNaN(x))
  {
  alert("Private fund must be a number");
  return false;
  } 

var x=document.forms["input_extension_form"]["faculty"].value;
if (x==null || x=="")
  {
  alert("Please enter the name of the faculty");
  return false;
  }  

var sd=document.forms["input_extension_form"]["start_date"].value;
if (sd==null || sd=="" || sd=="MM/DD/YYYY")
  {
  alert("Start date must be filled out");
  return false;
  }

var ed=document.forms["input_extension_form"]["end_date"].value;
if (ed==null || ed=="" || ed=="MM/DD/YYYY")
  {
  alert("End date must be filled out");
  return false;
  }

//seperate the year,month and day for the first date
 var stryear1 = sd.substring(6);
 var strmth1  = sd.substring(0,2);
 var strday1  = sd.substring(5,3);
 var date1    = new Date(stryear1 ,strmth1 ,strday1);
 
 //seperate the year,month and day for the second date
 var stryear2 = ed.substring(6);
 var strmth2  = ed.substring(0,2);
 var strday2  = ed.substring(5,3);
 var date2    = new Date(stryear2 ,strmth2 ,strday2 );
 
 var datediffval = (date2 - date1 )/864e5;
 
 if(datediffval <= -1){
  alert("Start date must be prior to end date");
  return false;
 }
 return true;

}

function isValidDate(dateStr) {
 
 // Checks for the following valid date formats:
 // MM/DD/YYYY
 // Also separates date into month, day, and year variables
 var datePat = /^(\d{2,2})(\/)(\d{2,2})\2(\d{4}|\d{4})$/;
 
 var matchArray = dateStr.match(datePat); // is the format ok?
 if (matchArray == null) {
  alert("Date must be in MM/DD/YYYY format")
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
  alert("Month "+month+" doesn't have 31 days!")
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
