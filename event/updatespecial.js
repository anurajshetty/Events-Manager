var form_check=[0,0,0,0,0,0,0];



function getuserdata() {

  var str=document.getElementById("username1").value.trim();
  var text;
  var reg=/[^a-zA-Z ]+/;
  var reg1=/^[a-zA-Z]/;
  
 if (str=="") {
    return;
  } 
  else if (str.match(reg))
     {
    
     document.getElementById("errordis").innerHTML="Enter valid Event name";
     document.getElementById("username1").value="";
      }
  
  else
   { 
  
   if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
     text= xmlhttp.responseText;
     
     
      
    if(text=="not")
       {
      
       document.getElementById("errordis").innerHTML="Event name did not match any event";
       } 
       else
       {
       
       document.getElementById("search").style.display="none";
       var list = text.split(",");
       var i=0;
       var data;
      var index;
      
      var table = document.getElementById("report1");
      var header = table.createTHead();
      var row = header.insertRow(0);
          row.id="head";
        
      var cell = row.insertCell(0);
      var cell1 = row.insertCell(1);
	var cell2 = row.insertCell(2);
	var cell3 = row.insertCell(3);
	var cell4 = row.insertCell(4);
	cell.innerHTML = "<b>Name</b>";
	cell1.innerHTML = "<b>Discount Price</b>";
	cell2.innerHTML = "<b>Start date</b>";
	cell3.innerHTML = "<b>End Date</b>";
	cell4.innerHTML = "<b>Click to Edit</b>";
	var j=0;
       for(i=0;i<list.length-1;i++)
         {
          index=i+1;
          var row1=table.insertRow(index); 
         data=list[i].split("|");
         
          for(j=0;j<data.length-1;j++)
            {
             var cell1 = row1.insertCell(j);
 	    cell1.innerHTML=data[j+1];
             }
           cell1=row1.insertCell(4);
           cell1.innerHTML="<input style='height:40px;width:100px;' type='button' class='button_report1' id="+data[0]+" "+"value='Edit' onclick='showdata(this)'>" ;
         }
       
       }
  }
  }
   
  xmlhttp.open("GET","getspecialeve.php?q="+str,true);
  xmlhttp.send();
  }
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
if(document.getElementById("sal").value)
{
form_check[0]=1;
}
if(document.getElementById("day").value)
{
form_check[1]=1;
}
if(document.getElementById("month").value)
{
form_check[2]=1;
}
if(document.getElementById("year").value)
{
form_check[3]=1;
}
if(document.getElementById("day1").value)
{
form_check[4]=1;
}
if(document.getElementById("month1").value)
{
form_check[5]=1;
}
if(document.getElementById("yea1r").value)
{
form_check[6]=1;
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

return true;
}

}


