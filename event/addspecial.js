var form_check=[0,0,0,0,0,0,0];





function showdata(x)
{

var str=x.id;


 document.getElementById('id1').value=str;
 
  document.getElementById('newemp').style.display="block";
   document.getElementById('search').style.display="none";
   document.getElementById('data').style.display="none";
  
}
function unset()
{
document.getElementById("newemp").style.display="block";
    document.getElementById("search").style.display="none";
}
function set()
{
document.getElementById("newemp").style.display="none";
    document.getElementById("search").style.display="block";
}

function checkout()
{

document.getElementById('message').innerHTML="Special Event details successfully!!!";
    document.getElementById("content").style.display="none";
    document.getElementById("search").style.display="none";

}

function verifyyearone(x)
{
form_check[4]=0;
	  form_check[5]=0;
	   form_check[6]=0;
elb=document.getElementById("yearlb1");
var mon=document.getElementById("month1");
var month=mon.value;
var d=document.getElementById("day1");
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
	
	
	 form_check[4]=1;
	  form_check[5]=1;
	   form_check[6]=1;
	elb.style.display="none";
	elb.style.visibility="hidden";	
	}
	}	
	}
}
}




function verifyyear(x)
{
form_check[1]=0;
	  form_check[2]=0;
	   form_check[3]=0;
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
	
	
	 form_check[1]=1;
	  form_check[2]=1;
	   form_check[3]=1;
	elb.style.display="none";
	elb.style.visibility="hidden";	
	}
	}	
	}
}
}


function salarycheck(x)
{
form_check[0]=0;

var elb=document.getElementById("sallb");
var pass=x.value.trim();
var str1=/[^0-9]+/;
if(!(pass))
{
elb.innerHTML="Enter discount fee";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
}
else
{
if(pass.match(str1))
 {
   elb.innerHTML="Enter valid discount fee";
	elb.style.display="block";
	elb.style.marginLeft="5px";
	elb.style.visibility="visible";
 }
 else
  {
  elb.style.display="none";
  elb.style.visibility="hidden";
 form_check[0]=1;
 
  }
}
}



function formcheck()
{

var flag=1;
var labels=["sallb","yearlb","yearlb","yearlb","yearlb1","yearlb1","yearlb1"];
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


