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
<script src="newevent.js"></script>
<style>
#content{
width: 500px;
background-color: #E4E1E1;
}
#newemp
{
margin-left: 30;

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
height: 30px;
border-radius: 6px;
border: 2px solid yellow;
font-size: 20px;
color: rgb(117, 4, 4);
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
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

if (empty($_POST["name"]))
  { 
    $nameerr = "Event Name is required"; 
    array_push($err,$nameerr);
  }
 else
  {
    $name = test_input($_POST["name"]);
 
    if (!preg_match("/^[a-zA-Z0-9- ]*$/",$name)) 
   {
     $nameerr = "Enter valid Event name"; 
     array_push($err,$nameerr);
   }
  
 }


   if (empty($_POST["month"]))
 { 
   $doberr = "Invalid date "; 
   array_push($err,$doberr);
 }
 else
  {
   $month = test_input($_POST["month"]);
 
   if (!preg_match("/^[0-9]*$/",$month)) 
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
 
  if (!preg_match("/^[0-9]*$/",$day)) 
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
 
  if (!preg_match("/^[0-9]*$/",$year)) 
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
 if (empty($_POST["address"]))
 { 
 $adderr = "Venue cant be empty";
 array_push($err,$adderr); 
 }
 else
  {
  $addr = test_input($_POST["address"]);
 
  if (preg_match("/[=]/",$addr)) 
   {
  $adderr = "Enter valid venue details"; 
  array_push($err,$adderr); 
   }
  
 }

 if (empty($_POST["uname"]))
 { 
 $unameerr = "organisers field cant be empty"; 
 array_push($err,$unameerr); 
 }
 else
  {
  $uname = test_input($_POST["uname"]);
 
  if (!preg_match("/^[a-zA-Z ]*$/",$uname))
   {
  $unameerr = "Enter valid organisers name"; 
 array_push($err,$unameerr); 
   }
  else
   {
   
   


   }

 }
  if (empty($_POST["password"]))
 { 
 $passerr = "Other details cant be empty"; 
 array_push($err,$passerr); 
 }
 else
  {
  $password = test_input($_POST["password"]);
 
  if (preg_match("/[=]/",$password)) 
   {
  $passerr = "Other details cannot have = charecter"; 
 array_push($err,$passerr); 
   }
  
  }
  $designation = test_input($_POST["designation"]);
if (empty($_POST["designation"]))
 { 
 $desigerr = "Event category cant be empty"; 
array_push($err,$desigerr); 
 }
 else if(!preg_match("/^[0-9]*$/",$designation)) 
   {
  $desigerr = "Enter valid category name"; 
 array_push($err,$unameerr); 
   }
 else
  {
  $designation = test_input($_POST["designation"]);
  
 }
 
  $salary = test_input($_POST["salary"]);
 
  if(!preg_match("/^[0-9]*$/",$salary)) 
   {
  $salerr = "invalid Entry Fee"; 
  array_push($err,$salerr);
   }
   $entry = test_input($_POST["entry"]);
 
  if(!preg_match("/^[0-9]*$/",$entry)) 
   {
  $entryerr = "invalid number of entries"; 
  array_push($err,$entryerr);
   }
   
   #image 1 upload
   if($_FILES["image1"]["name"] != "")
   {
  $allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["image1"]["name"]);
$extension = end($temp);

if ((($_FILES["image1"]["type"] == "image/gif")
|| ($_FILES["image1"]["type"] == "image/jpeg")
|| ($_FILES["image1"]["type"] == "image/jpg")
|| ($_FILES["image1"]["type"] == "image/pjpeg")
|| ($_FILES["image1"]["type"] == "image/x-png")
|| ($_FILES["image1"]["type"] == "image/png"))
&& ($_FILES["image1"]["size"] < 200000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["image1"]["error"] > 0) {
    $filerr="Invalid file";
  } else {
          $newname= time().'.'.$extension;
    if (file_exists("/home/scf-26/anurajsh/apache/directory/htdocs/events/upload/" . $newname)) {
      $filerr="File already exits";
    } else {
      move_uploaded_file($_FILES["image1"]["tmp_name"],
      "/home/scf-26/anurajsh/apache/directory/htdocs/events/upload/" . $newname);
       $image1="upload/".$newname;
    }
  }
} else {
   $filerr="Invalid file";
}
}
else
 {
  $passerr="not image";
  array_push($err,$passerr); 
  $image1="";
 }
//image upload 1 end

   
 

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
               $sql = "INSERT INTO event_details (name, venue, date, organiser, type_id, price, details, entries, image1, image2) VALUES ('$name','$addr','$dob','$uname','$designation','$salary','$password',$entry,'$image1','kkk')";
                
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
<div id="message"></div>
<div id="content"style="background-color: rgb(121, 10, 10);color: white;">
<br><br>
<form name="newemp" id="newemp" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" onsubmit="return formcheck();" enctype="multipart/form-data">
<label class="labels">Event Title</label><br><input class="texts" style="width: 350px;" id="name" type="text"  name="name" onblur="verifytext(this)"><br>
<label id="namelb"><?php echo $nameerr; ?></label><br>
<label class="labels">Venue</label><br><input class="texts" id="address" type="text" name="address" onblur="verifyaddr(this);"><br>
<label id="alb"><?php echo $adderr; ?></label>
<br><br>
<label class="labels">Event Date</label><br>
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
<input class="texts" id="year" type="text" name="year" placeholder="year" style="width:100px;" onblur="verifyyear(this);"><br>
<label id="yearlb"><?php echo $doberr; ?></label>
<br><br>
<label class="labels">Organiser</label><br><input class="texts" id="uname" type="text" name="uname" onblur="verifyuname(this);"><br>
<label id="unlb"><?php echo $unameerr; ?></label>
<br><br>
<label class="labels">Event category</label><br>
<select class="texts" id="desig" name="designation" onchange="updatetype();">
<option value="" disabled selected></option>
</select><br>
<label id="desiglb"><?php echo $desigerr; ?></label>
<br><br>
<label class="labels">Entry Fee</label><br><input class="texts" id="sal" type="text" name="salary" onblur="salarycheck(this);"><br>
<label id="sallb"><?php echo $salerr; ?></label>
<br><br>
<label class="labels">Number of entries</label><br><input class="texts" id="entry" type="text" name="entry" onblur="entrycheck(this);"><br>
<label id="entrylb"><?php echo $entryerr; ?></label>
<br><br>
<label class="labels">Other details</label><br><input class="texts" id="pass" type="text" name="password" style="width: 400px;" onblur="verifypass(this);"><br>
<label id="plb"><?php echo $passerr; ?></label>
<br><br>
<label for="image1">image1:</label><br>
<input type="file" name="image1" id="file1"><br><br>
<input type="submit" class="texts"  id="button1" value="Submit" name="submit">
</form>
<br>
<br>
</div>


</body>
</html>
