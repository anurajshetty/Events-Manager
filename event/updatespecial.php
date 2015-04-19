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
<script src="updatespecial.js"></script>
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
#content{

}
#search
{
display: block;
background-color: rgb(133, 8, 8);
width: 500px;
text-align: center;
}
#newemp
{
display: block;
background-color: rgb(109, 1, 1);
width: 400px;
color: white;
margin-left: 30;

}
#message
{
display:;
}
.texts,.labels
{
margin-left:30px;
}
body
{
margin: 0;
}

</style>

<title>New Event</title>
</head>


<?php
// define variables and set to empty values
$err= array();
$name=$gender=$month=$day=$year=$addr=$email=$uname=$password=$designation=$salary=$number="";
$nameerr=$gendererr=$doberr=$adderr=$emailerr=$unameerr=$passerr=$desigerr=$salerr=$numerr="";
$flag=1;
$dob="";
$dob1="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

 if (empty($_POST["id"]))
 { 
 $doberr = "Invalid"; 
 array_push($err,$doberr);
 }
 else
  {
  $id = test_input($_POST["id"]);
 
  if(!preg_match("/^[0-9]*$/",$id))
   {
  $doberr = ""; 
  array_push($err,$doberr);
   }
   
  
 }
 


 
  $salary = test_input($_POST["salary"]);
 
  if(!preg_match("/^[0-9]*$/",$salary))
   {
  $salerr = "invalid Entry Fee"; 
  array_push($err,$salerr);
   }
  
  



   if (empty($_POST["month"]))
 { 
   $doberr = "Invalid date "; 
   array_push($err,$doberr);
 }
 else
  {
   $month = test_input($_POST["month"]);
 
   if(!preg_match("/^[0-9]*$/",$month))
   {
    $doberr = "Enter valid date"; 
    array_push($err,$doberr);
   }
   else
   {
   if($month > 12 or $month < 1)
     {
      $doberr = "Enter valid month"; 
      array_push($err,$doberr);
      }
   }
  }
if (empty($_POST["day"]))
 { 
 $doberr = "Invalid date"; 
 array_push($err,$doberr);
 }
 else
  {
  $day = test_input($_POST["day"]);
 
  if(!preg_match("/^[0-9]*$/",$day))
   {
  $doberr = "Enter valid date"; 
  array_push($err,$doberr);
   }
   else
   {
   if($day > 31 or $day < 1)
     {
      $doberr = "Enter valid month"; 
      array_push($err,$doberr);
      }
   }
  
 }
 if (empty($_POST["year"]))
 { 
 $doberr = "Invalid date"; 
 array_push($err,$doberr);
 }
 else
  {
  $year = test_input($_POST["year"]);
 
  if(!preg_match("/^[0-9]*$/",$year))
   {
  $doberr = "Enter valid date"; 
  array_push($err,$doberr);
   }
   else
   {
   if($year < date("Y"))
     {
      $doberr = "Enter valid year"; 
      array_push($err,$doberr);
      }
   }
  
 }


 if (empty($_POST["year1"]))
 { 
 $doberr1 = "Invalid date"; 
 array_push($err,$doberr1);
 }
 else
  {
  $year1 = test_input($_POST["year1"]);
 
  if(!preg_match("/^[0-9]*$/",$year1))
   {
  $doberr1 = "Enter valid date"; 
  array_push($err,$doberr1);
   }
   else
   {
   if($year1 < date("Y"))
     {
      $doberr1 = "Enter valid year"; 
      array_push($err,$doberr1);
      }
   }
  
 }
 
  if (empty($_POST["month1"]))
 { 
   $doberr1 = "Invalid date "; 
   array_push($err,$doberr);
 }
 else
  {
   $month1 = test_input($_POST["month1"]);
 
   if(!preg_match("/^[0-9]*$/",$month1))
   {
    $doberr1 = "Enter valid date"; 
    array_push($err,$doberr);
   }
   else
   {
   if($month1 > 12 or $month1 < 1)
     {
      $doberr1 = "Enter valid month"; 
      array_push($err,$doberr);
      }
   }
  }
if (empty($_POST["day1"]))
 { 
 $doberr1 = "Invalid date"; 
 array_push($err,$doberr1);
 }
 else
  {
  $day1 = test_input($_POST["day1"]);
 
  if(!preg_match("/^[0-9]*$/",$day1))
   {
  $doberr1 = "Enter valid date"; 
  array_push($err,$doberr1);
   }
   else
   {
   if($day1 > 31 or $day1 < 1)
     {
      $doberr1 = "Enter valid day"; 
      array_push($err,$doberr1);
      }
   }
  
 }
 
 if($year1 < $year)
   {
   $doberr1="Invalid year";
   array_push($err,$doberr1);
   }
 else if($year1 == $year)
   {
      if($month1 < $month)
       {
	$doberr1= "invalid month";
	 array_push($err,$doberr1);
       }
      else if($month1 == $month)
       {
         if($day1 < $day)
         {
	$doberr1= "invalid day";
	 array_push($err,$doberr1);
          }
       }
      
   }


 
 
   
 

$len=sizeof($err);

$i=0;
$flag=1;
for($i=0;$i<$len;$i++)
 {
  if($err[$i])
   {
   $flag=2;
   }
  }



  if($flag==1)
   {
    $dob=$year."-".$month."-".$day;
     $dob1=$year1."-".$month1."-".$day1;

    $con=mysqli_connect("localhost","root","gunner","event");
   // Check connection
     if (mysqli_connect_errno()) 
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
             }
     else
            {
               $sql = "UPDATE special_events SET dis_price='$salary', offer_start='$dob', offer_end='$dob1' WHERE id='$id' ";
                
               if (!mysqli_query($con,$sql)) 
                                   {
                              die('Error: ' . mysqli_error($con));
                                       }

               else
                 {
                      
                 }

              mysqli_close($con); 
            }
    }
}
else
{

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>   


<body onload="<?php if(isset($_POST['submit']) && $flag==1){echo 'checkout();';}else if(isset($_POST['submit']) && $flag==2){echo 'unset();';}else{echo 'set();';} ?>">

<div id="message"></div>
<div id="content">
<form id="search">
<label class="labels" style="font-size: 20px;color: white;">Enter Special Event name to update</label><br><input class="texts" type="text" id="username1" name="username" style="width: 250px;"><br>
<input type="button" id="button1" onclick="getuserdata();" value="Search" style="width: 100px;">
<br><br>
<label id="errordis" style="color: white;"></label>
</form>
<div id="data" style="width:850px;">
<table id="report1">
</table>
</div>
<br><br>
<form name="newemp" id="newemp" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" onsubmit="return formcheck()">
<label class="labels">Special Entry Fee</label><br><input class="texts" id="sal" type="text" value="<?php echo $salary; ?>" name="salary" onblur="salarycheck(this);"><br>
<label id="sallb"><?php echo $salerr; ?></label>
<br><br>
<label class="labels">Start Date</label><br>
<select class="texts" id="month" name="month">
<option value="" disabled selected>Month</option>
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
<option id="day0" value="" disabled selected>Day</option>
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
<option value="" disabled selected>Month</option>
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
<option id="day10" value="" disabled selected>Day</option>
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
<label id="yearlb1"><?php echo $doberr1; ?></label>
<br><br>
<input class="texts" id="id1" type="text" value ="<?php echo $id; ?>" name="id" style="display:none;" >

<input type="submit"  class="texts"  id="button1" value="Submit" name="submit">
</form>
</div>
<script>
function unset()
{

<?php if(isset($_POST['day'])){
if($_POST['day'] < 10)
 {
 $con="day0".$_POST['day'];
 }
else
{
  $con="day".$_POST['day'];
}


echo 'document.getElementById("'.$con.'").selected="true";';
if($_POST['month'] < 10)
 {
 $con="mon0".$_POST['month'];
 }
else
{
  $con="mon".$_POST['month'];
}
if($_POST['day'] < 10)
 {
 $con="day10".$_POST['day1'];
 }
else
{
  $con="day1".$_POST['day1'];
}


echo 'document.getElementById("'.$con.'").selected="true";';
if($_POST['month1'] < 10)
 {
 $con="mon10".$_POST['month1'];
 }
else
{
  $con="mon1".$_POST['month1'];
}


}
?>


document.getElementById("newemp").style.display="block";
    document.getElementById("search").style.display="none";
}

function showdata(x)
{
var str=x.id;
  var text;
 document.getElementById("id1").value=str;
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
      
       document.getElementById("errordis").innerHTML="User name not found";
       } 
       else
       {

       var res= text.split("|");
      var dob = res[1].split("-");
      var dob1 = res[2].split("-");
       var month="mon"+dob[1];
   var day="day"+dob1[2];
    var month1="mon1"+dob1[1];
   var day1="day1"+dob[2];
       document.getElementById("sal").value=res[0];
     
     document.getElementById("year").value=dob[0];
     document.getElementById(month).selected="true";
      document.getElementById(day).selected="true"; 
      document.getElementById("year1").value=dob1[0]; 
      document.getElementById(month1).selected="true";
     
      document.getElementById(day1).selected="true";  
     
       
      
       
      
      
      
      document.getElementById("search").style.display="none";
      document.getElementById("data").style.display="none";
    document.getElementById("newemp").style.display="block";

   
       }
  }
  }
  xmlhttp.open("GET","specialdetail.php?q="+str,true);
  xmlhttp.send();
}
</script>

</body>
</html>
