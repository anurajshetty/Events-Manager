<?php
ob_start(); 
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if(isset($_SESSION['set']))
  {
session_unset();
session_destroy();
header('Location: logout.html');
exit();
  
  }
?>
<html>
<head>
<link rel="stylesheet" type:"css/text" href="login.css">
<title>USC Events management login</title>
</head>
<body>
<div id="top"><div style="width: 440px;height: 100px;float:left;background-image:url('USC-logo.jpg');background-size: cover;"></div><div style="margin-left: 400px;"><br><br><label style="color: rgb(248, 221, 22);font-size: 50px;margin-left: 50px;">USC</label>&nbsp;&nbsp;&nbsp;<label style="color: white;font-size: 30px;">Event Management Portal</label></div></div>
<div id="main">

<div id="deco">
 <div style="box-shadow: 10px 10px 10px #1F0A03;">
  <div class="imagediv" id="sideimage1"><div class="imagelabel"><label class="inside_label">University of Sports Champions</label></div><div class="image1div" style=""></div>
  </div>
  <div class="imagediv" id="sideimage2"><div class="imagelabel"><label class="inside_label">Jazz Orchestra Performs Next Generation Jazz</label></div><div class="image1div" style=""></div>
  </div>
  <div class="imagediv" id="sideimage3"><div class="imagelabel"><label class="inside_label">USC Thornton School of Music</label></div><div class="image1div" style=""></div>
  </div>
  <div class="imagediv" id="sideimage4"><div class="imagelabel"><label class="inside_label">NCAA Football,UCLA Bruins at USC Trojans</label></div><div class="image1div" style=""></div>
  </div>
  
  
  </div>
</div>
<div>
<div id="logindiv">
<br><br>
<form id='loginform' name='login' action="<?php echo $_SERVER['PHP_SELF'];?>" method='post' onsubmit="return checkinput()">
<label>username</label>&nbsp;&nbsp;<input type='text' name='username' id='uname' onblur="validateuname(this);">
<label id="errname"></label>
<br>
<br>
<label>password</label>&nbsp;&nbsp;<input type='password' name='password' id='pass' onblur="validatepass(this);">
<label id="errpass"></label>
<br><br>
<input type='submit' id ="button1" name='submit_login' value='LOGIN'>
</form>
<?php
// define variables and set to empty values
$uname=$passwd="";
$flag=1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $uname = test_input($_POST["username"]);
   if (empty($_POST["username"]))
 { 

 $flag =0; 
 }
   
 else if (!preg_match("/^[a-zA-Z]*$/",$uname))
   {
 
 $flag =0;
   }
  $passwd = test_input($_POST["password"]);
  if (empty($_POST["password"]))
 { 

 $flag =0; 
 }
 
else if (preg_match("/[='\" ]/",$password)) 
   {
  
  $flag =0;
  }
if($flag ==1)
{
  $con=mysqli_connect("localhost","root","gunner","event");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT name,username,password,typeid FROM employee where username='$uname' and password=PASSWORD('$passwd')");



if($row = mysqli_fetch_array($result)) {
   $_SESSION['name']=$row['name'];
   $_SESSION['username']=$row['username'];
    $_SESSION['type']=$row['typeid'];
    $_SESSION['set']=1;
    $_SESSION['time']=time()+300;
     mysqli_close($con);
   if($_SESSION['type']==100)
    {
header('Location: admin.php');
  exit();
    }
 else if($_SESSION['type']==101)
    {
header('Location: manager.php');
  exit();
    }
  else if($_SESSION['type']==102)
    {
header('Location: salemanager.php');
  exit();
    }
}

else
{
echo '<label id="error">invalid username or password</label>';
}


 }
else
{

session_destroy();

 echo "<label id='errordis'>invalid username or password</label>";
 }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<br><br><br>
</div>
</div>
<script>
form_check=[0,0];
function validateuname(x)
{

var str=/[^a-zA-Z]+/;
var uname=x.value.trim();
if(!(uname))
 {
 document.getElementById("errname").style.display="block";
 document.getElementById("errname").innerHTML="User name Cannot be empty";
 }
else if(uname.match(str))
 {
  document.getElementById("errname").style.display="block";
  document.getElementById("errname").innerHTML="Invalid charecters in username Field";
 }
else
 {
  document.getElementById("errname").style.display="none";
  document.getElementById("errname").innerHTML="";
  form_check[0]=1;
 }
}
function validatepass(x)
{
var pass=x.value.trim();
if(!(pass))
 {
 document.getElementById("errpass").style.display="block";
 document.getElementById("errpass").innerHTML="Password Cannot be empty";
 }
else
 {
  document.getElementById("errpass").style.display="none";
  document.getElementById("errpass").innerHTML="";
  form_check[1]=1;
 }
}
function checkinput()
{
validateuname(document.getElementById("uname"));
validatepass(document.getElementById("pass"));

if(form_check[0]==0)
  {
   document.getElementById("errname").style.display="block";
   document.getElementById("errname").innerHTML="Enter valid user name";
   return false;
  }
  else if(form_check[1]==0)
  {
   document.getElementById("errpass").style.display="block";
   document.getElementById("errpass").innerHTML="Password cannot be blank";
   return false;
  }
 else
  {
  return true;
  }
}
</script>
</div>
</body>
</html>
