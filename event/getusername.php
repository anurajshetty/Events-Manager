<?php
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if( !(isset($_SESSION['type'])))
 { 
echo "not";
  exit();
}
$q = $_GET['q'];
if (!preg_match("/^[a-zA-Z ]*$/",$q))
{
echo "not";
}
else
{
$con = mysqli_connect('localhost','root','gunner','event');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$stmt = mysqli_query($con,"SELECT * FROM employee where username='$q'");

if($row = mysqli_fetch_array($stmt)) {
  echo "1";
}
else
  {
   echo "0"; 
  }

mysqli_close($con);
}
?>
