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
       <?php if(isset($_POST['designation'])){echo 'document.getElementById('.$_POST["designation"].').selected="true";';} ?>
       }
  }
  }
  xmlhttp.open("GET","getemptype.php?q="+str,true);
  xmlhttp.send();
}


function checkout()
{
document.getElementById('message').innerHTML="Employee data updated successfully";
document.getElementById("search").style.display="none";
    document.getElementById("newemp").style.display="none";
}

function set()
{

document.getElementById("search").style.display="block";
    document.getElementById("newemp").style.display="none";
}
function unset()
{


document.getElementById("search").style.display="none";
    document.getElementById("newemp").style.display="block";
}
function getuserdata() {
var flag=1;
  var str=document.getElementById("desig").value.trim();
   var sal1=document.getElementById("salary1").value.trim();
   var sal2=document.getElementById("salary2").value.trim();
  var text;
  var reg=/[^a-zA-Z]+/;
  var reg=/[^0-9]+/;
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
if(str==0 && sal1 ==0 && sal2 == 0)
  {
  flag=0;
  document.getElementById("errordis").innerHTML="";
  document.getElementById("errordis").innerHTML="Provide atleast one search criteria";
  }
else
{

 var str3=str+","+sal1+","+sal2;

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
  
  xmlhttp.open("GET","searchemp.php?q="+str3,true);
  xmlhttp.send();


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
<title>Search Employee</title>

</head>  
<body onload="updatedesig();">
<div id="content">
<form id="search">
<label class="labels" style="margin-left:20px;">Designation</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="labels" style="margin-left:80px;">Salary Range from</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="labels" style="margin-left:85px;">Salary Range To</label><br>
<select class="texts" id="desig" name="designation" style="width: 150px;font-size: 15px;">
<option value="" selected></option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input class="texts" type="text" id="salary1" name="salary1" style="ont-size: 15px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input class="texts" type="text" id="salary2" name="salary2" style="ont-size: 15px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" id="button2" onclick="getuserdata();" value="Search" style="margin-left: 150px;">
<br><br>

<label id="errordis"></label>
</form>
</div>
<div id="tab" style="width: 800px;"></div>

</body>

</html>
