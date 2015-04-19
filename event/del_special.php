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
.button_report1
{
background-color: rgb(126, 12, 12);
color: white;
}
#head
{
background-color: rgb(150, 9, 9);
color: white;
}
#content
{
display:none;
}
#search
{
display: block;
background-color: rgb(133, 8, 8);
width: 500px;
text-align: center;
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
     alert("in");
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
           cell1.innerHTML="<input style='height:40px;width:100px;' type='button' class='button_report1' id="+data[0]+" "+"value='Delete' onclick='delete_event(this)'>" ;
         }
       
       }
  }
  }
   
  xmlhttp.open("GET","getoffereve.php?q="+str,true);
  xmlhttp.send();
  }
}

function delete_event(x)
{
var str =x.id;
str=str.trim();
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
    
  xmlhttp.open("GET","delspcl.php?q="+str,true);
  xmlhttp.send();
}

</script>
</head>
<body onload="<?php if(isset($_POST['submit'])){echo 'set();';} ?>" >
<div id="top">
<label id="msg"></label>
<div id="search">
<label class="labels" style="font-size: 20px;color: white;">Enter Special event you want to delete</label><br><input class="texts" type="text" id="event" name="username" style="width: 250px;"><br>
<input type="button" id="button1" onclick="getuserdata();" value="Search" style="width: 100px;">
<br><br>
<label id="errordis" style="color: white;"></label>
</div>
</div>
<div id="data" style="width:850px;">
<table id="report1">
</table>
</div>
</body>

</html>
