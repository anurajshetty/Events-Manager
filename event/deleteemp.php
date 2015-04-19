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
#button1
{
margin-left: 100px;
}
#search
{
background-color: grey;
width: 400px;
}
#username1
{
margin-left: 40px;
width: 250px;
height: 30px;
font-size: 15px;
}
#button2
{
width: 200px;
margin-top: 20px;
font-size: 20px;
margin-left: 60px;
border-radius: 6px;
}
#errordis
{
margin-left: 95px;
font-size: 20px;
color: rgb(238, 236, 236);
}
</style>
<script>
var uname;
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

  var str=document.getElementById("username1").value.trim();
  var text;
   var res=[];
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
       res= text.split("|");
       uname=res[11];
       document.getElementById("uname").innerHTML=res[7];
       document.getElementById("name").innerHTML=res[0];
       document.getElementById("gender").innerHTML=res[1];
      document.getElementById("dob").innerHTML=res[2];
   
      
     
     document.getElementById("addr").innerHTML=res[4];
     document.getElementById("email").innerHTML=res[5];
    document.getElementById("num").innerHTML=res[6];
   
   
     getemp(res[9]);
     
    
    document.getElementById("sal").innerHTML=res[10];
    
      document.getElementById("u").value=res[11];
     document.getElementById("top").style.display="none";
    document.getElementById("content").style.display="block";
     
       }
  }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
  }
    

    
}

function getemp(str)
{

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
      var x=xmlhttp.responseText;
      x.trim();
     document.getElementById("desig").innerHTML= x;
   }
  }
  xmlhttp.open("GET","getemp.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>

<?php
$uname="";
$nameerr="";
 if(isset($_POST['submit']))
{
$flag=1;
}
else
{
$flag=1;
}
$dob="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{


 
 
  $uname = test_input($_POST["uname"]);
 
 


  if($flag==1)
   {
    

    $con=mysqli_connect("localhost","root","gunner","event");
   // Check connection
     if (mysqli_connect_errno()) 
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              $unameerr = "Employee delete was unsuccessful"; 
             }
     else
            {
              $extra="xvf";
               $sql = "UPDATE employee SET username='$uname.$extra', password='' WHERE id='$uname' ";
                
               if (!mysqli_query($con,$sql)) 
                                   {
                              die('Error: ' . mysqli_error($con));
                                 $unameerr = "Employee delete was unsuccessful"; 
                                       }
                   
               else
                 {
                       
                  $unameerr = "Employee delete was successful";       
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
<body onload="<?php if(isset($_POST['submit'])){echo 'set();';} ?>" >
<div id="top">
<label id="msg"><?php echo "$unameerr" ?></label>
<div id="search" style="background-color: rgb(117, 7, 7);">
<label class="labels" style="margin-left: 30px;font-size: 25px;color: white;">Employee user name</label><br><br><input class="texts" type="text"
id="username1" name="username"><br>
<input type="button" id="button2" onclick="getuserdata();" style="background-color: white;color: rgb(82, 13, 13);border: 2px solid yellow;"value="Search">
<br><br>
<label id="errordis"></label>
</div>
</div>
<div id="content" style="width: 600px;background-color: rgb(247, 250, 247);">
<label id="err"></label>
<label class="labels">Employee User Name:</label>&nbsp;&nbsp;<label id="uname"class="vals"></label><br><br>
<label class="labels" id="n1">Employee Name:</label>&nbsp;&nbsp;<label id="name"class="vals"></label><br><br>
<label class="labels" id="g1">Gender:</label>&nbsp;&nbsp;<label id="gender" class="vals"></label><br><br>
<label class="labels" id="d1">Date of Birth:</label>&nbsp;&nbsp;<label id="dob" class="vals"></label><br><br>
<label class="labels" id="a1">Address:</label>&nbsp;&nbsp;<label id="addr" class="vals"></label><br><br>
<label class="labels" id="e1">Email ID:</label>&nbsp;&nbsp;<label id="email" class="vals"></label><br><br>
<label class="labels" id="num1">Phone Number:</label>&nbsp;&nbsp;<label id="num" class="vals"></label><br><br>
<label class="labels" id="des">Designation:</label>&nbsp;&nbsp;<label id="desig" class="vals"></label><br><br>
<label class="labels" id="s1">Salary:</label>&nbsp;&nbsp;<label id="sal" class="vals"></label><br><br>
<form  id="delemp" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" onsubmit="return check();"> 
<input name="uname" id="u" type="text" />
<input type="submit" class="texts" style="width:200px;height: 30px;background-color: rgb(133, 3, 3);" name="submit" id="button1" value="Delete"> 
</form>
<br><br>
</div>
</body>

</html>
