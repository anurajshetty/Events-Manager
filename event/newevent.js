var form_check=[0,0,0,0,0,0,0,0,0];
function checkout()
{
document.getElementById('message').innerHTML="New Event added successfully!!!";
    document.getElementById("newemp").style.display="none";

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
  xmlhttp.open("GET","geteventtype.php?q="+str,true);
  xmlhttp.send();
}

function verifytext(x)
{

var i=0,flb;
var fname= x.value.trim();
flb=document.getElementById("namelb");
if(fname)
{

var str=/[^a-zA-Z0-9 ]+/;

 if(fname.match(str))
 {
flb.innerHTML="Enter valid event Name";
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
else
{
flb.innerHTML="Event Name cannot be blank";
flb.style.display="block";
flb.style.marginLeft="5px";
flb.style.visibility="visible";
}
}

function verifyaddr(x)
{
form_check[1]=0;
var elb=document.getElementById("alb");
var pass=x.value.trim();
var str1=/[^a-zA-Z0-9\#\,\- ]+/;

if(!(pass))
{

elb.innerHTML="Venue cannot be empty";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
}
else
{
if(pass.match(str1))
 {

   elb.innerHTML="Enter valid Venue detail";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
 }
 else
  {
  elb.style.display="none";
  elb.style.visibility="hidden";
 form_check[1]=1;
  }
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
elb.innerHTML="Enter valid date";
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
	if(year < 2014) 
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
	elb.innerHTML="Enter valid date";
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

function verifyuname(x)
{

var i=0,flb;
var fname= x.value.trim();
var flb=document.getElementById("unlb");
if(fname)
{
  var str=/[^a-zA-Z ]+/;

  if(fname.match(str))
  {
 flb.innerHTML="invalid charecters in organisers name";
 flb.style.display="block";
 flb.style.marginLeft="5px";
 flb.style.visibility="visible";
 }
 else
 {
 
 form_check[5]=1;
 flb.style.display="none";

 
 
 }

}
else
{
flb.innerHTML="organisers field cannot be blank";
flb.style.display="block";
flb.style.marginLeft="5px";
flb.style.visibility="visible";
}
}

function salarycheck(x)
{
form_check[7]=0;

var elb=document.getElementById("sallb");
var pass=x.value.trim();
var str1=/[^0-9]+/;
if(!(pass))
{
elb.innerHTML="Enter Entry fee";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
}
else
{
if(pass.match(str1))
 {
   elb.innerHTML="Enter valid Entry fee";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
 }
 else
  {
  elb.style.display="none";
  elb.style.visibility="hidden";
 form_check[7]=1;
  }
}
}

function verifypass(x)
{
var elb=document.getElementById("plb");
var pass=x.value.trim();
var str1=/[^a-zA-Z0-9\#\,\- ]+/;
if(!(pass))
{
elb.innerHTML="Other Details connot be empty";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
}
else
{
if(pass.match(str1))
{
elb.innerHTML="Invalid Charecters";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
}
 else
  {
  elb.style.display="none";
elb.style.visibility="hidden";
 form_check[8]=1;
  }
}
}
function updatetype()
{
form_check[6]=1;
}

function formcheck()
{

var flag=1;
var labels=["namelb","alb","yearlb","yearlb","yearlb","unlb","desiglb","sallb","plb"];
var i=0;




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
return true;
}

}


