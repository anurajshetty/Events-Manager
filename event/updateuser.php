<?php 
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if( !(isset($_SESSION['type']) && $_SESSION['type']==100))
 { 
echo "Session expired";
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

<?php if(isset($_POST['designation'])){
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


echo 'document.getElementById("'.$con.'").selected="true";';
}
?>

document.getElementById("search").style.display="none";
    document.getElementById("newemp").style.display="block";
}
function getuserdata() {

  var str=document.getElementById("username1").value.trim();
  var text;
  var reg=/[^a-zA-Z]+/;
 if (str=="") {
    return;
  } 
  else if (str.match(reg))
     {
     document.getElementById("errordis").innerHTML="Enter valid User name";
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
      
       document.getElementById("errordis").innerHTML="User name not found";
       } 
       else
       {
       var res= text.split("|");
       document.getElementById("name").value=res[0];
    document.getElementById(res[1]).checked="true";
     var dob = res[2].split("-");
    
    var month="mon"+dob[1];
   var day="day"+dob[2];
   
     document.getElementById("year").value=dob[0];
     document.getElementById(month).selected="true";
      document.getElementById(day).selected="true";  
     document.getElementById("address").value=res[4];
     document.getElementById("mailid").value=res[5];
   document.getElementById("number").value=res[6];
    document.getElementById("uname").value=res[7];
   
    document.getElementById("sal").value=res[10];
     document.getElementById(res[9]).selected="true";
      document.getElementById("search").style.display="none";
    document.getElementById("newemp").style.display="block";
       }
  }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
  }
}
</script>
<style>
#content{
width: 500px;
background-color: #660606;
}
#newemp
{
margin-left: 30;
color: white;
display:none;
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
margin-left: 120px;
height: 30px;
width: 150px;
margin-top: 20px;
}
#button1
{
width: 200px;
height: 33px;
font-size: 20;
border-radius: 5px;
color: rgb(77, 5, 5);
margin-left: 10px;
margin-top: 20px;
}
#message
{
margin-left: 50px;
font-size: 30px;
}
#errordis
{
margin-left: 95px;
font-size: 20px;
color: rgb(238, 236, 236);
}
</style>
<title>Update user</title>

</head>

<?php
// define variables and set to empty values

$err= array();
$name=$gender=$month=$day=$year=$addr=$email=$uname=$password=$designation=$salary=$number="";
$nameerr=$gendererr=$doberr=$adderr=$emailerr=$unameerr=$passerr=$desigerr=$salerr=$numerr="";
 if(isset($_POST['submit']))
{

}
else
{
$flag=0;
}
$dob="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

if (empty($_POST["name"]))
  { 
    $nameerr = "Name is required"; 
    array_push($err,$nameerr);
  }
 else
  {
    $name = test_input($_POST["name"]);
 
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
   {
     $nameerr = "Enter valid name"; 
     array_push($err,$nameerr);
   }
  
 }

 if (empty($_POST["gender"]))
 { 
   $gendererr = "gender is required"; 
   array_push($err,$gendererr);
 }
 else
 {
     $gender = test_input($_POST["gender"]);
 
     if ($gender == 'male' or $gender == 'female' or $gender == 'other') 
     { 
      
     }
     else
     {
     $gendererr = "Enter valid gender"; 
      array_push($err,$gendererr);
      }
  
 }
 
   if (empty($_POST["month"]))
 { 
   $doberr = "Invalid date of birth"; 
   array_push($err,$doberr);
 }
 else
  {
   $month = test_input($_POST["month"]);
 
   if(!preg_match("/^[0-9]*$/",$month))
   {
    $doberr = "Enter valid date of birth"; 
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
 $doberr = "Invalid date of birth"; 
 array_push($err,$doberr);
 }
 else
  {
  $day = test_input($_POST["day"]);
 
  if(!preg_match("/^[0-9]*$/",$day))
   {
  $doberr = "Enter valid date of birth"; 
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
 $doberr = "Invalid date of birth"; 
 array_push($err,$doberr);
 }
 else
  {
  $year = test_input($_POST["year"]);
 
  if(!preg_match("/^[0-9]*$/",$year))
   {
  $doberr = "Enter valid date of birth"; 
  array_push($err,$doberr);
   }
   else
   {
   if($year > date("Y") or $year < 1920)
     {
      $doberr = "Enter valid year"; 
      array_push($err,$doberr);
      }
    
    
   }
  
 }
 if (empty($_POST["address"]))
 { 
 $adderr = "Address cant be empty";
 array_push($err,$adderr); 
 }
 else
  {
  $addr = test_input($_POST["address"]);
 
  if (preg_match("/[=]/",$addr)) 
   {
  $adderr = "Enter valid address"; 
  array_push($err,$adderr); 
   }
  
 }
if (empty($_POST["emailid"]))
 { 
 $emailerr = "emailid cant be empty"; 
 array_push($err,$emailerr); 
 }
 else
  {
  $email = test_input($_POST["emailid"]);
 
  if(!preg_match("/^([a-zA-Z0-9_\.-]+)@([\da-zA-Z\.-]+)\.([a-zA-Z\.]{2,6})$/",$email)) 
   {
  $emailerr = "Enter valid emailid"; 
  array_push($err,$emailerr); 
   }
  
 }

  if (empty($_POST["uname"]))
 { 
 $unameerr = "username cant be empty"; 
 array_push($err,$unameerr); 
 }
 else
  {
  $uname = test_input($_POST["uname"]);
 
  if (!preg_match("/^[a-zA-Z]*$/",$uname))
   {
  $unameerr = "Enter valid username"; 
 array_push($err,$unameerr); 
   }
  
 }

 /*if (empty($_POST["uname"]))
 { 
 $unameerr = "username cant be empty"; 
 array_push($err,$unameerr); 
 }
 else
  {
  $uname = test_input($_POST["uname"]);
 
  if (!preg_match("/^[a-zA-Z ]*$/",$uname))
   {
  $unameerr = "Enter valid username"; 
 array_push($err,$unameerr); 
   }
  else
   {
   
   $con=mysqli_connect("localhost","root","gunner","event");

   if (mysqli_connect_errno()) {
  $unameerr= "Failed to connect to MySQL: " . mysqli_connect_error();
    }

   $result = mysqli_query($con,"SELECT * FROM employee where username='$uname'");

  if($row = mysqli_fetch_array($result)) {
     $unameerr="Username already exists";
    }
    mysqli_close($con);


   }
 }
  */
if (empty($_POST["designation"]))
 { 
 $desigerr = "designation cant be empty"; 
array_push($err,$desigerr); 
 }
 else
  {
  $designation = test_input($_POST["designation"]);
  
 }
 if (empty($_POST["salary"]))
 { 
 $salerr = "salary cant be empty"; 
 array_push($err,$salerr); 
 }
 else
  {
  $salary = test_input($_POST["salary"]);
 
  if(!preg_match("/^[0-9]*$/",$salary))
   {
  $salerr = "invalid salary"; 
  array_push($err,$salerr);
   }
  
  }

  if (empty($_POST["number"]))
 { 
 $numerr = "phone number cant be empty"; 
 array_push($err,$numerr); 
 }
 else
  {
  $number = test_input($_POST["number"]);
 
  if(!preg_match("/^[0-9]*$/",$number))
   {
  $numerr = "invalid Phone number"; 
  array_push($err,$numerr);
   }
   else if(strlen($number) != 10)
   {
   $numerr = "invalid Phone number"; 
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

    $con=mysqli_connect("localhost","root","gunner","event");
   // Check connection
     if (mysqli_connect_errno()) 
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
             }
     else
            {
               $sql = "UPDATE employee SET name='$name', gender='$gender', dob='$dob', address='$addr', emailid='$email', phone='$number',typeid='$designation', salary='$salary' WHERE username='$uname' ";
                
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
<body onload="updatedesig();<?php if(isset($_POST['submit']) && $flag==2){echo 'unset();';}else{if(isset($_POST['submit']) && $flag==1){echo 'checkout();';}else{echo 'set();';}} ?>">
<div id="content" style="background-color: #660606;">
<form id="search">
<label class="labels" id="lb1" style="color: white;">Employee user name</label><br><br><input class="texts" type="text" id="username1" name="username"><br>
<input type="button" id="button2" onclick="getuserdata();" value="Search">
<br><br>
<label id="errordis"></label>
</form>
<p id="message"></p>

<form name="newemp" id="newemp" style="color: white;" action='<?php echo $_SERVER["PHP_SELF"];?>' method="post">
<br>
<label class="labels">Employee Name</label><br><input class="texts" id="name" style="width: 250px;" type="text" value="<?php echo $name; ?>" name="name" onblur="verifytext(this)"><br>
<label id="namelb"><?php echo $nameerr; ?></label><br>
<label class="labels">Gender</label><br>
<input  type="radio" id="male" value="male" name="gender" <?php echo ($_POST['gender']=='male' ? 'checked="checked"' : '');?>/>Male &nbsp;&nbsp;
<input  type="radio" id="female" value="female" name="gender" <?php echo ($_POST['gender']=='female' ? 'checked="checked"' : '');?>/>Female &nbsp;&nbsp;
<input  type="radio" id="other" value="Other" name="gender"<?php echo ($_POST['gender']=='other' ? 'checked="checked"' : '');?>/>Other &nbsp;&nbsp;
<label id="namelb"><?php echo $gendererr; ?></label>
<br><br>
<label class="labels">Date Of Birth</label><br>
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
<input class="texts" id="year" type="text" name="year" style="width: 100px;" onblur="verifyyear(this);" value="<?php echo $year; ?>" placeholder="year"><br>
<label id="yearlb"><?php echo $doberr; ?></label>
<br><br>
<label class="labels">Address</label><br><input class="texts" id="address" type="text" style="width: 300px;" value="<?php echo $addr; ?>" onblur="verifyaddr(this);" name="address"><br>
<label id="alb"><?php echo $adderr; ?></label>
<br><br>
<label class="labels">Email ID</label><br><input class="texts" id="mailid" type="text" value="<?php echo $email; ?>" onblur="verifyemail(this);" name="emailid"><br>
<label id="elb"><?php echo $emailerr; ?></label>
<br><br>
<label class="labels">Phone Number</label><br><input class="texts" id="number" type="text" value="<?php echo $number; ?>" onblur="verifynumber(this)" name="number"><br>
<label id="nlb"><?php echo $numerr; ?></label>
<br><br>
<label class="labels">User Name</label><br><input class="texts" id="uname" type="text" value="<?php echo $uname; ?>" name="uname" readonly><br>
<label id="unlb"><?php echo $unameerr; ?></label>
<br><br>

<label class="labels">Designation</label><br>
<select class="texts" id="desig" name="designation">
<option value="" disabled selected></option>
</select><br>
<label id="desiglb"><?php echo $desigerr; ?></label>
<br><br>
<label class="labels">Salary</label><br><input class="texts" id="sal" type="text" value="<?php echo $salary; ?>" onblur="salarycheck(this);" name="salary"><br>
<label id="sallb"><?php echo $salerr; ?></label>
<br><br>
<input type="submit" class="texts" style="width:200px;height: 30px;background-color: rgb(245, 232, 232);" name="submit" id="button1" value="UPDATE" onclick="keep();">
</form>
<br>
</div>
<script src="updateuser.js"></script>

</body>

</html>
