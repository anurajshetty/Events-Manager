<?php
ob_start();
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if(!(isset($_SESSION['type']) && $_SESSION['type']==101))
{
header('Location: login.php');
exit();
}
?>
<html>
<head>
<link rel="stylesheet" type:"css/text" href="admin.css">

<title>Events</title>
</head>
<body onclick ="upses();">
<div id="body">
<div id="top">
<br><br><br>
<label style="margin-left:100px;color: yellow;font-size: 30px;"> Welcome</label>&nbsp;&nbsp;<label style="color: white;font-size: 20px;"><?php echo $_SESSION['name'] ?></label>
<div style="display: inline-flex;">
<form  name='login' action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
<input type="submit" name="submit" id="four" style="margin-left: 1100;margin-top: -20px;font-size: 15px;background-color: yellow;color: rgb(155, 11, 11);" value="LOGOUT"/>
</form>
</div>
</div>

<div id="main">
  <div id="sidebar">
   <br>
   <br>
  <a href="search_emp.php" target="icontents" class="link">Employee Details</a><br><br><br>
<a href="Product_search.php" target="icontents" class="link">Event Details</a><br><br><br>
<a href="spcl_event_search.php" target="icontents" class="link">Special events Details</a><br><br><br>
<a href="salereport.php" target="icontents" class="link">Sale Report</a><br><br><br><br>
<a href="orderreport.php" target="icontents" class="link">Order Report</a><br>
  </div>
  <div id="page-wrap">
   <iframe src="" name="icontents" id="icontent"></iframe>
  </div>
 

</div>
<script>
function upses()
{ 
  var str="i";
   
  if (window.XMLHttpRequest) {
    
    xmlhttp=new XMLHttpRequest();
  } else { 
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
     text= xmlhttp.responseText;
    if(text=="expire")
      {
         window.location.assign("logout.html");
       }
      
   
  }
  }
  xmlhttp.open("GET","upses.php?q="+str,true);
  xmlhttp.send();
 
}

</script>
</div>
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
if (isset($_POST["submit"]))
{
session_unset();
session_destroy();
header('Location: logout.html');
exit();
}
}
?>
</body>
</html>
<?php ob_end_flush(); ?>
