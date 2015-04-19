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

#search
{
background-color: rgb(119, 6, 6);
width: 400px;
text-align: center;
color: white;
}
</style>
<script>


function getuserdata() {

  var str=document.getElementById("event").value.trim();
  var text;
  var reg=/[^a-zA-Z]+/;
 
 if (str=="") {
    return;
  } 
  else if (str.match(reg))
     {
     
     document.getElementById("errordis").innerHTML="Enter valid Category name";
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
      
       document.getElementById("errordis").innerHTML="Could not add new category";
       } 
       else
       {
       document.getElementById("errordis").innerHTML="New Category added successfully";
       }
  }
  }
   
  xmlhttp.open("GET","addcat.php?q="+str,true);
  xmlhttp.send();
  }
}


</script>
</head>
<body>
<div id="top">
<label id="msg"></label>
<div id="search">
<label class="labels" style="font-size: 20px;">Enter New Event Category</label><br><input class="texts" type="text" id="event" name="username" style="width: 250px;"><br>
<input type="button" id="button1" onclick="getuserdata();" value="Add Category" style="width: 200px">
<br><br>
<label id="errordis"></label>
</div>
</div>
</body>

</html>
