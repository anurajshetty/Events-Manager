<?php
ob_start();
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if(!(isset($_SESSION['type']) && $_SESSION['type']==102))
{
header('Location: login.php');
exit();
}
?>
<html>
<head>
<link rel="stylesheet" type:"css/text" href="admin.css">
<script src="event.js"></script>
<title>Events</title>
</head>
<body onlcik="upses();">
<div id="body">
<div id="top">
<label style="margin-left:100px;color: yellow;font-size: 30px;"> Welcome</label>&nbsp;&nbsp;<label style="color: white;font-size: 20px;"><?php echo $_SESSION['name'] ?></label>
<div id="in" style="margin-top: -30px;"><div><input type="button" id="one"  style="margin-top: 60px;margin-left: 400px;width: 150px;font-size: 20px;border-radius: 6px;background-color: yellow;color: rgb(71, 60, 60);border: outset;"value="EVENT" onclick="showevent();"/>
<input type="button" id="two" style="margin-left: 40px;font-size: 20px;border-radius: 6px;background-color: yellow;color: rgb(90, 58, 58);border: outset;" value="SPECIAL EVENT" onclick="showevent1();"/>
<input type="button" id="three" style="margin-left: 40px;font-size: 20px;border-radius: 6px;background-color: yellow;color: rgb(90, 58, 58);border: outset;" value="EVENT CATEGORY" onclick="showevent2();"/>
<div style="display: inline-flex;">
<form  name='login' action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
<input type="submit" name="submit" id="four" style="margin-left: 90px;font-size: 15px;background-color: yellow;color: rgb(155, 11, 11);" value="LOGOUT"/>
</form>
</div>
</div></div></div>

<div id="main">
  <div id="sidebar">
   <div id="event1" style="display:none;">
   <br>
   <br>
  <a href="addevent.php" target="icontents" class="link">Add new Event</a><br><br><br>
<a href="updateevent.php" target="icontents" class="link">Update Event details</a><br><br><br>
<a href="deleteevent.php" target="icontents" class="link">Delete Event</a><br>
  </div>
  <div id="event2" style="display:none;">
  <div id="upevent">
   <br>
   <br>
  <a href="addspecial.php" target="icontents" class="link">Add Special Event</a><br><br><br>
<a href="updatespecial.php" target="icontents" class="link">Update Special Event details</a><br><br><br>
<a href="del_special.php" target="icontents" class="link">Delete Special Event</a><br>
   </div>
  <div id="delevent">
   <br>
   <br>
  <a href="addcategory.php" target="icontents" class="link">Add new Category</a><br><br><br>
<a href="update_category.php" target="icontents" class="link">Update Category</a><br><br><br>
<a href="delete_category.php" target="icontents" class="link">Delete Category</a><br>
   </div>
  </div>
  </div>
  <div id="page-wrap">
   <iframe src="" name="icontents" id="icontent"></iframe>
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

function showevent()
{
document.getElementById("event2").style.display="none";
document.getElementById("event1").style.display="block";
}
function showevent1()
{
document.getElementById("event2").style.display="block";
document.getElementById("event1").style.display="none";
document.getElementById("delevent").style.display="none";
document.getElementById("upevent").style.display="block";
}
function showevent2()
{
document.getElementById("event2").style.display="block";
document.getElementById("event1").style.display="none";
document.getElementById("upevent").style.display="none";
document.getElementById("delevent").style.display="block";
}
</script>
</body>
</html>
<?php ob_end_flush(); ?>
