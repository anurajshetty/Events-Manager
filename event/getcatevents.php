<?php
ob_start(); 
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
$q = $_GET['q'];
$con = mysqli_connect('localhost','root','gunner','event');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
if($q==0)
{
$stmt = mysqli_query($con,"SELECT id,name FROM event_details;");
}
else
{
$stmt = mysqli_query($con,"SELECT id,name FROM event_details where type_id=".$q.";");
}
echo "<option value='0' selected></option>";
while($row = mysqli_fetch_array($stmt)) {
  echo "<option value='".$row['id']."'>".$row['name']."</option>";
}


mysqli_close($con);
?>
