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

#u
{
display:none;
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
#event
{
width: 200px;
margin-left: 90px;
}
#search
{
background-color: rgb(119, 6, 6);
width: 700px;
text-align: center;
color: white;
}
</style>
<script>
function getcategory()
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
      document.getElementById('errordis').innerHTML="could not load data";
      
       
       } 
       else
       {
       var list = text.split("|");
       var i=0;
       var val=[];
       var event2 = document.getElementById("cat");
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

  var str=document.getElementById("event").value.trim();
  var str1=document.getElementById("cat").value.trim();
  var text;
  var reg=/[^a-zA-Z]+/;
 
 if (str=="") {
   document.getElementById("errordis").innerHTML="Enter Category name";
    return;
  } 
 else  if (str1=="") {
   document.getElementById("errordis").innerHTML="Select Category to update";
    return;
  } 
  else if (str.match(reg))
     {
     
     document.getElementById("errordis").innerHTML="Enter valid Category name";
     document.getElementById("username1").value="";
      }
  
  else
   { 
     str=str1+","+str;
  
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
      
       document.getElementById("errordis").innerHTML="Could not update category";
       } 
       else
       {
       document.getElementById("errordis").innerHTML="Category updated successfully";
       }
  }
  }
   
  xmlhttp.open("GET","upcat.php?q="+str,true);
  xmlhttp.send();
  }
}


</script>
</head>
<body onload="getcategory();">
<div id="top">
<div id="search">
<label class="labels" style="font-size: 20px;">Select Event Category</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="labels" style="font-size: 20px;">Enter New Event Category</label><br>
<select class="texts" id="cat" name="categoty" style="width: 120px;"><option value="" disabled selected></option></select><input class="texts" type="text" id="event" name="username" style="width: 200px;"><br><br>
<input type="button" id="button1" onclick="getuserdata();" value="Update" style="width: 200px">
<br><br>
<label id="errordis"></label>
</div>
</div>
</body>

</html>
