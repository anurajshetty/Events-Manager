<?php
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if( !(isset($_SESSION['type'])))
 { 
echo "not";
  exit();
}
$q = $_GET['q'];
$arr=explode(",", $q);

$sql="SELECT  event_details.name, special_events.dis_price, special_events.offer_start,special_events.offer_end FROM event_details INNER JOIN special_events ON event_details.id=special_events.event_id where ";
$flag=1;

if($arr[0] != 0)
{
  if(!preg_match("/^[0-9]*$/",$arr[0]))
    {
    $flag=0;
    }
  else
   {
    if($arr[1]=='0' && $arr[2]==0 && $arr[3] ==0 && $arr[4]=='0' && $arr[5]=='0')
    {
   $sql=$sql."event_details.type_id='".$arr[0]."'";
    }
    else
    {
    $sql=$sql."event_details.type_id='".$arr[0]."' AND ";
    } 
  }
 
}

if($arr[1] != '0')
{
 
  if (!preg_match("/^[A-Za-z ]*$/",$arr[1]))
    {
     
    $flag=0;
    }
  else
   {
     
     if($arr[2]==0 && $arr[3] ==0 && $arr[4]==0 && $arr[5]==0)
    {
    
   $sql=$sql."event_details.name LIKE '%".$arr[1]."%'";
    }
    else
    {
    $sql=$sql."event_details.name LIKE '%".$arr[1]."%' AND ";
    } 
  }
 
}

if($arr[2] != 0)
{
  if(!preg_match("/^[0-9]*$/",$arr[2]))
    {
    $flag=0;
    }
  else
   {
     if($arr[3]==0 && $arr[4]==0 && $arr[5]==0 )
      {
   $sql=$sql." special_events.dis_price >'".$arr[2]."'";
      }
     else
      {
      $sql=$sql." special_events.dis_price >'".$arr[2]."' AND ";
      }
     }
 
}
if($arr[3] != 0)
{
  if(!preg_match("/^[0-9]*$/",$arr[3]))
    {
    $flag=0;
    }
  else
   {
    if($arr[4]==0 && $arr[5]==0 )
      {
   $sql=$sql." special_events.dis_price <'".$arr[3]."'";
      }
     else
      {
      $sql=$sql." special_events.dis_price <'".$arr[3]."' AND ";
      }
    }
 
}
if($arr[4] != '0')
{
  if (!preg_match("/^[0-9-]*$/",$arr[4]))
    {
    $flag=0;
    }
  else
   {
    if($arr[5]==0 )
      {
   $sql=$sql." special_events.offer_start >'".$arr[4]."'";
      }
     else
      {
      $sql=$sql." special_events.offer_start >'".$arr[4]."' AND ";
      }
    }
 
}
if($arr[5] != '0')
{
  if (!preg_match("/^[0-9-]*$/",$arr[5]))
    {
    $flag=0;
    }
  else
   {
    
   $sql=$sql." special_events.offer_start <'".$arr[5]."'";
     
    }
 
}

$sql=$sql.";";
if($flag)
{
   $con = mysqli_connect('localhost','root','gunner','event');
   if (!$con) {
   die('Could not connect: ' . mysqli_error($con));
          }
     $stmt = mysqli_query($con,$sql);
     $flag1 =0;

  while($row = mysqli_fetch_array($stmt)) {
   if($flag1==0)
   {
   echo "<table><tr><th>Event Name</th><th>Offer Price</th><th>Offer start date</th><th>Offer End date</th></tr>";
   echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
   $flag1=1;
  
   }
  else
  {
 echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
 } 
 }
if($flag1 ==0)
 {
  echo "not";
 }
else
{
echo "</table>";
}

mysqli_close($con);
}
else
{
echo "not";
}

?>
