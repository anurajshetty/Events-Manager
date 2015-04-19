<?php
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if( !(isset($_SESSION['type']) && $_SESSION['type']==101))
 { 
echo "session expired";
  exit();
}
?>
<html>
<head>
<script>
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




function getuserdata() {
var flag=1;
  var str=document.getElementById("desig").value.trim();
  var name=document.getElementById("name").value.trim();
   var sal1=document.getElementById("price1").value.trim();
   var sal2=document.getElementById("price2").value.trim();
  var text;
  var reg1=/[^a-zA-Z ]+/;

  
  var reg=/[^0-9]+/;
  if(name=="")
  {
   name=0;
   }
  else if(name.match(reg1))
   {
   name=0;
   flag=0
   }
 if (str=="") {
   str =0;
  } 
 if(sal1=="")
  {
  sal1=0;
  }
  if(sal2=="")
  {
  sal2=0;
  }
if(flag==1)
{
if(str==0 && sal1 ==0 && sal2 == 0 && name ==0 )
  {
 
  document.getElementById("errordis").innerHTML="";
  document.getElementById("errordis").innerHTML="Provide atleast one valid search criteria ";
  }
else
{

 var str3=str+","+name+","+sal1+","+sal2;

if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
     var text= xmlhttp.responseText;
     document.getElementById("tab").innerHTML="";
     
    if(text=="not")
       {
      
       document.getElementById("errordis").innerHTML="No data found";
       } 
       else
       {
        
       document.getElementById("errordis").innerHTML="";
       document.getElementById("tab").innerHTML=text;
       }
  }
  }
  
  xmlhttp.open("GET","search_event.php?q="+str3,true);
  xmlhttp.send();


}
}

else
{
document.getElementById("errordis").innerHTML="";
  document.getElementById("errordis").innerHTML="Provide valid event name";
}
  
}
</script>
<style>
#content{
width: 800px;
background-color: rgb(97, 17, 17);
display:block;
}
#newemp
{
margin-left: 30;

}
#message
{
display:block;
}
body
{
margin: 0;
}
#lb1
{
margin-left: 100px;
font-size: 20px;
}
#username1
{
margin-left: 100px;
width: 250px;
height: 30px;
font-size: 15px;
}
#button2
{
margin-left: 10px;
height: 30px;
width: 150px;
margin-top: 20px;
}
#button1
{
margin-left: 40px;
height: 30px;
width: 150px;
margin-top: 20px;
}
#message
{
margin-left: 50px;
font-size: 30px;
}
#errordis
{
margin-left: 60px;
font-size: 20px;
color: rgb(255, 254, 252);
}
#search{
margin-left:60px;
}
table,td,th
{
border:1px solid black;
border-collapse: collapse;
}
tr
{
background-color: white;
}
th
{
background-color: rgb(151, 7, 7);
color: white;
}
td
{
padding: 4px;

text-align: center;

}
.labels
{
color: rgb(255, 254, 252);
}
</style>
<title>Search Product</title>

</head>  
<body onload="updatedesig();">
<div id="content">
<form id="search">
<label class="labels">Event category</label><label class="labels" style="margin-left: 150px;">Event Name</label><br>
<select class="texts" id="desig" name="designation" onchange="updatetype();" style="font-size: 15px;width: 150px;">
<option value="" selected></option>
</select>
<input class="texts" type="text" id="name" name="name" style="margin-left: 90px;"><br><br>

<label class="labels">Event price range from</label><label class="labels" style="margin-left: 100px;">Event price range to</label><br>
<input class="texts" type="text" id="price1" name="price1">

<input class="texts" type="text" id="price2" name="price2" style="margin-left: 70px;"><br>
<br>
<input type="button" id="button2" onclick="getuserdata();" value="Search">
<br><br>

<label id="errordis"></label>
</form>
</div>
<div id="tab" style="width: 800px;"></div>

</body>

</html>
