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
$stmt = mysqli_query($con,"SELECT special_events.id, event_details.name, special_events.dis_price, special_events.offer_start,special_events.offer_end FROM event_details INNER JOIN special_events ON event_details.id=special_events.event_id where name LIKE '%".$q."%'");
$flag =0;
while($row = mysqli_fetch_array($stmt)) {
   $flag=1;
  echo $row[0].'|'.$row[1].'|'.$row[2].'|'.$row[3].'|'.$row[4].',';
}
if($flag ==0)
 {
  echo "not";
 }
mysqli_close($con);
}
?>
