var form_check=[1,1,1,1,1,1,1,1,1,1,1,1];

function verifytext(x)
{

var i=0,flb;
var fname= x.value.trim();
flb=document.getElementById("namelb");
if(fname)
{

var str=/[^a-zA-Z ]+/;
 if(fname.match(str))
 {
 form_check[0]=0;
flb.innerHTML="Enter valid Name";
flb.style.display="block";
flb.style.marginLeft="5px";
flb.style.visibility="visible";
 }
 else
 {
 
 
 flb.style.display="none";
flb.style.visibility="hidden";
 }
}

else
{
form_check[0]=0;
flb.innerHTML="Name cannot be blank";
flb.style.display="block";
flb.style.marginLeft="5px";
flb.style.visibility="visible";
}
}

function verifyemail(x)
{
var elb;
var femail= x.value.trim();
elb=document.getElementById("elb");
if(femail)
{
var str=/^\w+@[a-zA-z]+\.[a-zA-Z]{2,3}$/;
 if(femail.match(str))
 {

  
 elb.style.display="none";
elb.style.visibility="hidden";

 }
 else
 {
form_check[6]=0;
elb.innerHTML="Enter valid Email ID ";
elb.style.display="block";
elb.style.marginLeft="5px";
elb.style.visibility="visible";
 }
}
else
{
form_check[6]=0;
elb.innerHTML="Email id cannot be blank";
elb.style.display="block";
elb.style.marginLeft="5px";
elb.style.visibility="visible";
}
}

function verifyyear(x)
{

elb=document.getElementById("yearlb");
var mon=document.getElementById("month");
var month=mon.value;
var d=document.getElementById("day");
var day=d.value;
var year=x.value;
var len=year.length;
if(month==""|| day=="" || len==0 || len >4)
{
form_check[2]=0;
	  form_check[3]=0;
	   form_check[4]=0;
elb.innerHTML="Enter valid date of birth";
elb.style.display="block";
elb.style.marginLeft="5px";
elb.style.visibility="visible";
}
else
{
var str=/[^0-9]+/;
  if(year.match(str))
	{
         form_check[2]=0;
	  form_check[3]=0;
	   form_check[4]=0;
	elb.innerHTML="Enter valid year";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
	}
	else
	{
	var lep = year % 4;
	if(year < 1900 || year > 2014) 
	{
        form_check[2]=0;
	  form_check[3]=0;
	   form_check[4]=0;
	elb.innerHTML="Enter valid year";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
	}
	else
	{
	if((month == 2 && day >= 29 && lep != 0) || (month ==2 && day > 29))
	{
         form_check[2]=0;
	  form_check[3]=0;
	   form_check[4]=0;	
	elb.innerHTML="Enter valid date of date";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
	}	
	else
	{
	
	
	 form_check[2]=1;
	  form_check[3]=1;
	   form_check[4]=1;
	elb.style.display="none";
	elb.style.visibility="hidden";	
	}
	}	
	}
}
}

function verifynumber(x)
{

var elb=document.getElementById("nlb");
var pnumber=x.value.trim();
var length=pnumber.length;
var str=/[^0-9]+/;
if(pnumber.match(str))
{
 form_check[7]=0;
elb.innerHTML="Enter valid phone number";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
}
else
{
 
 if(length==10)
 {

  form_check[7]=1;
elb.style.display="none";
elb.style.visibility="hidden";
 }
 else
 {
 form_check[7]=0;
 elb.innerHTML="Enter 10 digits phone number";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
 }
}
}





function salarycheck(x)
{


var elb=document.getElementById("sallb");
var pass=x.value.trim();
var str1=/[^0-9]+/;

if(!(pass))
{
form_check[11]=0;
elb.innerHTML="Enter salary";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
}
else
{
if(pass.match(str1))
 {
  form_check[11]=0;
   elb.innerHTML="Enter valid salary";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
 }
 else
  {
  elb.style.display="none";
  elb.style.visibility="hidden";
 form_check[11]=1;
  }
}
}

function verifyaddr(x)
{

var elb=document.getElementById("alb");
var pass=x.value.trim();
var str1=/[^a-zA-Z0-9\#\,\- ]+/;

if(!(pass))
{
form_check[5]=0;
elb.innerHTML="Address cannot be empty";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
}
else
{
if(pass.match(str1))
 {
 form_check[5]=0;
   elb.innerHTML="Enter valid address";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
 }
 else
  {
  elb.style.display="none";
  elb.style.visibility="hidden";
 form_check[5]=1;
  }
}
}
function updatedesign()
{
form_check[10]=1;
}

function formcheck()
{

var flag=1;
var labels=["namelb","genlb","yearlb","yearlb","yearlb","alb","elb","nlb","unlb","plb","desiglb","sallb"];
var i=0;
var gender = document.getElementsByName("gender");
for(i=0;i<gender.length;i++)
{
if(gender[i].checked)
 {
  form_check[1]=1;
 }
}
updatedesign();
verifyaddr("address");
salarycheck("sal");
verifynumber("number");
verifyyear("year");
verifyemail("mailid");
verifytext("name");

for(i=0;i<form_check.length;i++)
 {
  if(form_check[i] ==0)
   {
    document.getElementById(labels[i]).innerHTML="This Field cannot be empty";
    document.getElementById(labels[i]).style.display="block";
    document.getElementById(labels[i]).style.marginLeft="5px";
   flag=0;
    }
 }
if(!(flag))
{
return false;
}
else
{
true;
}

}

