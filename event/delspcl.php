<?php
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if( !(isset($_SESSION['type'])))
 { 
echo "not";
  exit();
}
$q = $_GET['q'];
 if(!preg_match("/^[0-9]*$/",$q)) 
   {
   echo "not";
    }
else
{
$con = mysqli_connect('localhost','root','gunner','event');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$sql = "DELETE FROM special_events where id='$q'";

if (!mysqli_query($con,$sql)) 
                                   {
                              die('Error: ' . mysqli_error($con));
                                 
                                       }

else
{
echo "Special Event deleted successfully";
}


mysqli_close($con);
}
?>
