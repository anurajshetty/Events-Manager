<?php
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if( !(isset($_SESSION['type'])))
 { 
echo "not";
  exit();
}
$q = $_GET['q'];
if (!preg_match("/^[0-9]*$/",$q))
{
echo "not";
}
else
{
$con = mysqli_connect('localhost','root','gunner','event');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$stmt = mysqli_query($con,"SELECT * FROM special_events where id='$q'");
$flag =0;
while($row = mysqli_fetch_array($stmt)) {
   $flag=1;
  echo $row[2].'|'.$row[3].'|'.$row[4];
}
if($flag ==0)
 {
  echo "not";
 }
mysqli_close($con);
}
?>
