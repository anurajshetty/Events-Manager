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
  echo $row[1].'|'.$row[2].'|'.$row[3].'|'.$row[4].'|'.$row[5].'|'.$row[6].'|'.$row[7].'|'.$row[8].'|'.$row[9].'|'.$row[10].'|'.$row[11].'|'.$row[0];
}
else
  {
   echo "not"; 
  }

mysqli_close($con);
}
?>
