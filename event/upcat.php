<?php
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if( !(isset($_SESSION['type'])))
 { 
echo "not";
  exit();
}
$q = $_GET['q'];
$arr=explode(",",$q);
if (!(preg_match("/^[a-zA-Z]*$/",$arr[1]) && preg_match("/^[0-9]*$/",$arr[0])) )
{
echo "not";
}
else
{
$con = mysqli_connect('localhost','root','gunner','event');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$stmt = mysqli_query($con,"UPDATE event_type SET type='$arr[1]' WHERE id='$arr[0]'");

mysqli_close($con);
}
?>
