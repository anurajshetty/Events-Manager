var form_check=[0,0,0,0,0,0,0,0,0,0,0,0];

function checkout()
{
document.getElementById('message').innerHTML="New Employee added successfully!!!";
    document.getElementById("newemp").style.display="none";
   document.getElementById("content").style.display="none";
  
}

function updatedesig()
{
var str="ok";
  var text;
  
 
  if (window.XMLHttpRequest) {
    
    xmlhttp=new XMLHttpRequest();
  } else { 
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
     text= xmlhttp.responseText;
       
      
    if(text=="")
       {
      document.getElementById('desiglb').innerHTML="could not load data";
      
       
       } 
       else
       {
       var list = text.split("|");
       var i=0;
       var val=[];
       var event2 = document.getElementById("desig");
       for(i=0;i<list.length-1;i++)
         {
          
          val= list[i].split(",");
          
          optElement = document.createElement( "option" );
	optElement.text = val[1];
	optElement.value = val[0];
         optElement.id = val[0];
	event2.add( optElement );
          }
       }
  }
  }
  xmlhttp.open("GET","getemptype.php?q="+str,true);
  xmlhttp.send();
}

function checkuser(x)
{ 
  
  var str=x;
  var text;
  var reg=/[^a-zA-Z]+/;
 if (str=="") {
    return;
  } 
   else if (str.match(reg))
     {
     document.getElementById("unlb").innerHTML="Enter valid User name";
    document.getElementById('unlb').style.display="block";
    form_check[8]=0;
     x.value="";
      }
  
  else
   { 
   
  if (window.XMLHttpRequest) {
    
    xmlhttp=new XMLHttpRequest();
  } else { 
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
     text= xmlhttp.responseText;
      
      
    if(text=="1")
       {
      document.getElementById('unlb').innerHTML="User name already exists";
      document.getElementById('unlb').style.display="block";
     form_check[8]=0;
       x.value="";
       
       }
      else if(text=="not")
      {
      document.getElementById('unlb').innerHTML="invalid Username";
      document.getElementById('unlb').style.display="block";
     form_check[8]=0;
       x.value="";
      } 
       else
       {
       document.getElementById('unlb').innerHTML="";
       form_check[8]=1;
       }
  }
  }
  xmlhttp.open("GET","getusername.php?q="+str,true);
  xmlhttp.send();
 }
}

function verifytext(x)
{

var i=0,flb;
var fname= x.value.trim();
flb=document.getElementById("namelb");
if(fname)
{
var name = fname.split(" ");
var str=/[^a-zA-Z]+/;
for(i=0;i<name.length;i++)
{
 if(name[i].match(str))
 {
flb.innerHTML="Enter valid Name";
flb.style.display="block";
flb.style.marginLeft="5px";
flb.style.visibility="visible";
 }
 else
 {
 
 form_check[0]=1;
 flb.style.display="none";
flb.style.visibility="hidden";
 }
}
}
else
{
flb.innerHTML="Name cannot be blank";
flb.style.display="block";
flb.style.marginLeft="5px";
flb.style.visibility="visible";
}
}

function verifyemail(x)
{
form_check[6]=0;
var elb;
var femail= x.value.trim();
elb=document.getElementById("elb");
if(femail)
{
var str=/^\w+@[a-zA-z]+\.[a-zA-Z]{2,3}$/;
 if(femail.match(str))
 {

  form_check[6]=1;
 elb.style.display="none";
elb.style.visibility="hidden";

 }
 else
 {
elb.innerHTML="Enter valid Email ID ";
elb.style.display="block";
elb.style.marginLeft="5px";
elb.style.visibility="visible";
 }
}
else
{
elb.innerHTML="Email id cannot be blank";
elb.style.display="block";
elb.style.marginLeft="5px";
elb.style.visibility="visible";
}
}

function verifyyear(x)
{
form_check[2]=0;
	  form_check[3]=0;
	   form_check[4]=0;
elb=document.getElementById("yearlb");
var mon=document.getElementById("month");
var month=mon.value;
var d=document.getElementById("day");
var day=d.value;
var year=x.value;
var len=year.length;
if(month==""|| day=="" || len==0 || len >4)
{
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
	elb.innerHTML="Enter valid year";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
	}
	else
	{
	if((month == 2 && day >= 29 && lep != 0) || (month ==2 && day > 29))
	{	
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
form_check[7]=0;
var elb=document.getElementById("nlb");
var pnumber=x.value.trim();
var length=pnumber.length;
var str=/[^0-9]+/;
if(pnumber.match(str))
{
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
 elb.innerHTML="Enter 10 digits phone number";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
 }
}
}

function verifyuname(x)
{

var i=0,flb;
var fname= x.value.trim();
var flb=document.getElementById("unlb");
if(fname)
{
var name = fname.split(" ");
if(name.length >1)
 {
 flb.innerHTML="User name cannot have spaces";
flb.style.display="block";
flb.style.marginLeft="5px";
flb.style.visibility="visible";
  }
 else
  {
  var str=/[^a-zA-Z]+/;

  if(name[i].match(str))
  {
 flb.innerHTML="User Name cannot have special charecters";
 flb.style.display="block";
 flb.style.marginLeft="5px";
 flb.style.visibility="visible";
 }
 else
 {
 
 form_check[8]=1;
 flb.style.display="none";


 checkuser(fname);
 }
}
}
else
{
flb.innerHTML="User Name cannot be blank";
flb.style.display="block";
flb.style.marginLeft="5px";
flb.style.visibility="visible";
}
}


function verifypass(x)
{
form_check[9]=0;
var elb=document.getElementById("plb");
var pass=x.value.trim();
var str1=/[^a-zA-z 0-9]/;
var str2=/[0-9]/;
var str3=/[a-zA-z]/;
var length=pass.length;
 if(length <6 || length >18)
 {
 elb.innerHTML="Password should be between 6 to 18 charecters";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
 }
 else if(!(pass.match(str1)))
 {
 elb.innerHTML="Password should have atleast one special charecter";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
 }
 else if(!(pass.match(str2)))
 {
 elb.innerHTML="Password should have atleast one Numeric charecter";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
 }
 else if(!(pass.match(str3)))
 {
 elb.innerHTML="Password should have atleast one Alphabhetical charecter";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
 }
else
 {
 elb.style.display="none";
elb.style.visibility="hidden";
 form_check[9]=1;
 }
}

function salarycheck(x)
{
form_check[11]=0;

var elb=document.getElementById("sallb");
var pass=x.value.trim();
var str1=/[^0-9]+/;

if(!(pass))
{
elb.innerHTML="Enter salary";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
}
else
{
if(pass.match(str1))
 {
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
form_check[5]=0;
var elb=document.getElementById("alb");
var pass=x.value.trim();
var str1=/[^a-zA-Z0-9\#\,\- ]+/;

if(!(pass))
{

elb.innerHTML="Address cannot be empty";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
}
else
{
if(pass.match(str1))
 {
 
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

