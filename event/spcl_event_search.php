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
var flag;
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
function formatdate(d,m,y)
{
 var reg=/[^0-9]+/;
 if(d==0 && m==0  && y=="")
 {
 return 0;
 }
 else if(d !=0 && m !=0 && y !="")
  {
   if(y.match(reg))
     {
	flag=2;
       return 0;
     }
  else
   {
   return y+"-"+m+"-"+d;
   }
  }
 else
  {
   return 0;
  }
}



function getuserdata() {
flag=1;
  var str=document.getElementById("desig").value.trim();
  var name=document.getElementById("name").value.trim();
   var sal1=document.getElementById("price1").value.trim();
   var sal2=document.getElementById("price2").value.trim();
   var day=document.getElementById("day").value.trim();
    var day1=document.getElementById("day1").value.trim();
    var month=document.getElementById("month").value.trim();
  var month1=document.getElementById("month1").value.trim();
   var year=document.getElementById("year").value.trim();
  var year1=document.getElementById("year1").value.trim();
  var text;
  var reg1=/[^a-zA-Z ]+/;
    var date1 = formatdate(day,month,year);
  var date2 = formatdate(day1,month1,year1);
  var reg=/[^0-9]+/;
  if(name=="")
  {
   name='0';
   }
  else if(name.match(reg1))
   {
   name='0';
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
if(flag==2)
{
document.getElementById("errordis").innerHTML="Invalid date";
}
if(flag==1)
{
if(str==0 && sal1 ==0 && sal2 == 0 && name =='0' && date1 == '0'&& date2 =='0' )
  {
 
  document.getElementById("errordis").innerHTML="";
  document.getElementById("errordis").innerHTML="Provide atleast one valid search criteria ";
  }
else
{

 var str3=str+","+name+","+sal1+","+sal2+","+date1+","+date2;

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
  
  xmlhttp.open("GET","search_spcl_event.php?q="+str3,true);
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
width: 250px;
background-color: rgb(97, 17, 17);
float:left;
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
margin-left: 0px;
font-size: 20px;
color: rgb(255, 254, 252);
}
#search{
margin-left:20px;
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
<label class="labels">Event category</label><br>
<select class="texts" id="desig" name="designation" onchange="updatetype();">
<option value="" selected></option>
</select>
<br><br>
<label class="labels">Event Name</label><br>
<input class="texts" type="text" id="name" name="name"><br>
<br>
<label class="labels">Event price range from</label><br>
<input class="texts" type="text" id="price1" name="price1"><br>
<br>
<label class="labels">Event price range to</label><br>
<input class="texts" type="text" id="price2" name="price2"><br>
<br>
<label class="labels">Start Date</label><br>
<select class="texts" id="month" name="month">
<option value="0" disabled selected>Month</option>
<option id="mon01" value="1">January</option>
<option id="mon02" value="2">February</option>
<option id="mon03" value="3">March</option>
<option id="mon04" value="4">April</option>
<option id="mon05" value="5">May</option>
<option id="mon06" value="6">June</option>
<option id="mon07" value="7">July</option>
<option id="mon08" value="8">August</option>
<option id="mon09" value="9">September</option>
<option id="mon10" value="10">October</option>
<option id="mon11" value="11">November</option>
<option id="mon12" value="12">December</option>
</select>
<select class="texts" id="day" name="day">
<option id="day0" value="0" disabled selected>Day</option>
<option id="day01" value="1">01</option>
<option id="day02" value="2">02</option>
<option id="day03" value="3">03</option>
<option id="day04" value="4">04</option>
<option id="day05" value="5">05</option>
<option id="day06" value="6">06</option>
<option id="day07" value="7">07</option>
<option id="day08" value="8">08</option>
<option id="day09" value="9">09</option>
<option id="day10" value="10">10</option>
<option id="day11" value="11">11</option>
<option id="day12" value="12">12</option>
<option id="day13" value="13">13</option>
<option id="day14" alue="14">14</option>
<option id="day15" value="15">15</option>
<option id="day16" value="16">16</option>
<option id="day17" value="17">17</option>
<option id="day18" value="18">18</option>
<option id="day19" value="19">19</option>
<option id="day20" value="20">20</option>
<option id="day21" value="21">21</option>
<option id="day22" value="22">22</option>
<option id="day23"  value="23">23</option>
<option id="day24" value="24">24</option>
<option id="day25" value="25">25</option>
<option id="day26" value="26">26</option>
<option id="day27" value="27">27</option>
<option id="day28" value="28">28</option>
<option id="day29" value="29">29</option>
<option id="day30" value="30">30</option>
<option id="day31" value="31">31</option>
</select>
<input class="texts" id="year" type="text" name="year" placeholder="year" onblur="verifyyear(this);"><br>
<label id="yearlb"><?php echo $doberr; ?></label>
<br><br>
<label class="labels">End Date</label><br>
<select class="texts" id="month1" name="month1">
<option value="0" disabled selected>Month</option>
<option id="mon101" value="1">January</option>
<option id="mon102" value="2">February</option>
<option id="mon103" value="3">March</option>
<option id="mon104" value="4">April</option>
<option id="mon105" value="5">May</option>
<option id="mon106" value="6">June</option>
<option id="mon107" value="7">July</option>
<option id="mon108" value="8">August</option>
<option id="mon109" value="9">September</option>
<option id="mon110" value="10">October</option>
<option id="mon111" value="11">November</option>
<option id="mon112" value="12">December</option>
</select>
<select class="texts" id="day1" name="day1">
<option id="day10" value="0" disabled selected>Day</option>
<option id="day101" value="1">01</option>
<option id="day102" value="2">02</option>
<option id="day103" value="3">03</option>
<option id="day104" value="4">04</option>
<option id="day105" value="5">05</option>
<option id="day106" value="6">06</option>
<option id="day107" value="7">07</option>
<option id="day108" value="8">08</option>
<option id="day109" value="9">09</option>
<option id="day110" value="10">10</option>
<option id="day111" value="11">11</option>
<option id="day112" value="12">12</option>
<option id="day113" value="13">13</option>
<option id="day114" alue="14">14</option>
<option id="day115" value="15">15</option>
<option id="day116" value="16">16</option>
<option id="day117" value="17">17</option>
<option id="day118" value="18">18</option>
<option id="day119" value="19">19</option>
<option id="day120" value="20">20</option>
<option id="day121" value="21">21</option>
<option id="day122" value="22">22</option>
<option id="day123"  value="23">23</option>
<option id="day124" value="24">24</option>
<option id="day125" value="25">25</option>
<option id="day126" value="26">26</option>
<option id="day127" value="27">27</option>
<option id="day128" value="28">28</option>
<option id="day129" value="29">29</option>
<option id="day130" value="30">30</option>
<option id="day131" value="31">31</option>
</select>
<input class="texts" id="year1" type="text" name="year1" placeholder="year" onblur="verifyyearone(this);"><br>
<input type="button" id="button2" onclick="getuserdata();" value="Search">
<br><br>

<label id="errordis"></label>
</form>
</div>
<div id="tab" style="margin-left: 280px;width: 800px;"></div>

</body>

</html>
