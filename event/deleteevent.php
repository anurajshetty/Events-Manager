<?php
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if( !(isset($_SESSION['type']) && $_SESSION['type']==102))
 { 
echo "session expired";
  exit();
}
?>
<html>
<head>
<style>
#content
{
display:none;
}
#n1
{
margin-left: 35;
}
#g1
{
margin-left: 95px;
}
#d1
{
margin-left: 56px;
}
#a1
{
margin-left: 87px;
}
#e1
{
margin-left: 79px;
}
#num1
{
margin-left: 42px;
}
#des
{
margin-left: 62px;
}
#s1
{
margin-left: 98px;
}
#u
{
display:none;
}
.button_report1
{
background-color: rgb(126, 12, 12);
color: white;
}
#button1
{
background-color: white;
width: 200px;
font-size: 15px;
border-radius: 6px;
text-align: center;
color: rgb(119, 6, 6);
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
#search
{
background-color: rgb(119, 6, 6);
width: 400px;
text-align: center;
color: white;
}
</style>
<script>
var uname;
var sts;
function set()
{
document.getElementById("search").style.display="none";
document.getElementById("content").style.display="none";
}

function check()
{
var uname1 = document.getElementById("u").value;
if(uname1 != uname)
{
document.getElementById("err").innerHTML="Inavlid Username";
document.getElementById("err").style.display="block";
return false;
}
else
{
return true;
}

}
function getuserdata() {

  var str=document.getElementById("event").value.trim();
  var text;
  var reg=/[^a-zA-Z ]+/;
 
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
       document.getElementById("data").innerHTML="";
       document.getElementById("search").style.display="none";
       document.getElementById("data").innerHTML=text;
       }
  }
  }
   
  xmlhttp.open("GET","getevents.php?q="+str,true);
  xmlhttp.send();
  }
}

function delete_event(x)
{
var str =x.id;

if (str=="") {
    
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      var x = xmlhttp.responseText;
      document.getElementById("search").style.display="none";
       document.getElementById("data").style.display="none";
      document.getElementById("msg").innerHTML=x;
     
   }
  }
    
  xmlhttp.open("GET","deleventdetail.php?q="+str,true);
  xmlhttp.send();
}


</script>
</head>
<body onload="<?php if(isset($_POST['submit'])){echo 'set();';} ?>" >
<div id="top">
<label id="msg"></label>
<div id="search">
<label class="labels" style="font-size: 20px;">Enter event Name you want to delete</label><br><input class="texts" type="text" id="event" name="username" style="width: 250px;"><br>
<input type="button" id="button1" onclick="getuserdata();" value="Search" style="width: 200px">
<br><br>
<label id="errordis"></label>
</div>
</div>
<div id="data" style="width:850px">

</div>
</body>

</html>
