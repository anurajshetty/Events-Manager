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
$stmt = mysqli_query($con,"SELECT event_details.id, event_details.name,event_details.venue,event_details.date,event_details.organiser,event_type.type,event_details.price,event_details.details FROM event_details INNER JOIN event_type ON event_details.type_id=event_type.id where event_details.name LIKE '%".$q."%'");
$flag1 =0;
while($row = mysqli_fetch_array($stmt)) {
    if($flag1==0)
   {
   echo "<table><tr><th>Event Name</th><th>Venue</th><th>Event Date</th><th>Organiser</th><th>Event Type</th><th>Price</th><th>Details</th><th>Action</th></tr>";
   echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td><input style='height:40px;width:100px;' type='button' class='button_report1' id='$row[0]' value='Delete' onclick='delete_event(this)'></td></tr>";
   $flag1=1;
  
   }
  else
  {
 echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td><input style='height:40px;width:100px;' type='button' class='button_report1' id='$row[0]' value='Delete' onclick='delete_event(this)'></td></tr>";
 } 
}
if($flag1 ==0)
 {
  echo "not";
 }
mysqli_close($con);
}
?>
