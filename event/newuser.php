<?php
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if( !(isset($_SESSION['type']) && $_SESSION['type']==100))
 { 
echo "session expired";
  exit();
}
?>
<html>
<head>
<script src="newemp.js"></script>
<style>
#content{
width: 500px;
background-color: #660606;
}
#newemp
{
margin-left: 30;
color: white;

}
#message
{
display:;
}
body
{
margin: 0;
}
#button1
{
width: 200px;
height: 33px;
font-size: 20;
border-radius: 5px;
color: rgb(77, 5, 5);
margin-left: 10px;
}
#errordis
{
margin-left: 60px;
font-size: 20px;
}
</style>

<title>New user</title>
</head>


<?php
// define variables and set to empty values
$err= array();
$name=$gender=$month=$day=$year=$addr=$email=$uname=$password=$designation=$salary=$number="";
$nameerr=$gendererr=$doberr=$adderr=$emailerr=$unameerr=$passerr=$desigerr=$salerr=$numerr="";
$flag=1;
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
  if (empty($_POST["password"]))
 { 
 $passerr = "password cant be empty"; 
 array_push($err,$passerr); 
 }
 else
  {
  $password = test_input($_POST["password"]);
 
  if (preg_match("/[='\" ]/",$password)) 
   {
  $passerr = "password cannot have = ' \" or space"; 
 array_push($err,$passerr); 
   }
  
  }
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
 
  if (!preg_match("/^[0-9]*$/",$salary))
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
    array_push($err,$numerr);
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
               $sql = "INSERT INTO employee (name, gender, dob, address, emailid, phone, username, password, typeid, salary) VALUES ('$name','$gender','$dob','$addr','$email','$number','$uname',PASSWORD('$password'),'$designation','$salary')";
                
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


<body onload="updatedesig();<?php if(isset($_POST['submit']) && $flag==1){echo 'checkout();';} ?>">
<div id="message" style="font-size: 30px;"></div>
<div id="content">
<br>
<form name="newemp" id="newemp" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" onsubmit="return formcheck()">
<br><br>
<label class="labels">Employee Name</label><br><input class="texts" id="name" type="text" style="width: 250px;" name="name" onblur="verifytext(this)"><br>
<label id="namelb"><?php echo $nameerr; ?></label><br>
<label class="labels">Gender</label><br>
<input  type="radio" id="male" value="male" name="gender" >Male &nbsp;&nbsp;
<input  type="radio" id="female" value="female" name="gender">Female &nbsp;&nbsp;
<input  type="radio" id="other" value="Other" name="gender">Other &nbsp;&nbsp;
<label id="genlb"><?php echo $gendererr; ?></label>
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
<input class="texts" id="year" type="text" name="year" placeholder="year" style="width: 100px;"onblur="verifyyear(this);"><br>
<label id="yearlb"><?php echo $doberr; ?></label>
<br><br>
<label class="labels">Address</label><br><input class="texts" id="address" type="text" name="address" style="width: 300px;" onblur="verifyaddr(this);"><br>
<label id="alb"><?php echo $adderr; ?></label>
<br><br>
<label class="labels">Email ID</label><br><input class="texts" id="mailid" type="text" name="emailid" onblur="verifyemail(this);"><br>
<label id="elb"><?php echo $emailerr; ?></label>
<br><br>
<label class="labels">Phone Number</label><br><input class="texts" id="number" type="text" name="number" onblur="verifynumber(this)"><br>
<label id="nlb"><?php echo $numerr; ?></label>
<br><br>
<label class="labels">User Name</label><br><input class="texts" id="uname" type="text" name="uname" onblur="verifyuname(this);"><br>
<label id="unlb"><?php echo $unameerr; ?></label>
<br><br>
<label class="labels">Password</label><br><input class="texts" id="pass" type="text" name="password" onblur="verifypass(this);"><br>
<label id="plb"><?php echo $passerr; ?></label>
<br><br>
<label class="labels">Designation</label><br>
<select class="texts" id="desig" name="designation" onchange="updatedesign();">
<option value="" disabled selected></option>
</select><br>
<label id="desiglb"><?php echo $desigerr; ?></label>
<br><br>
<label class="labels">Salary</label><br><input class="texts" id="sal" type="text" name="salary" onblur="salarycheck(this);"><br>
<label id="sallb"><?php echo $salerr; ?></label>
<br><br>
<input type="submit" class="texts"  id="button1" value="SUBMIT" name="submit">
</form>
<br><br>
</div>


</body>
</html>
