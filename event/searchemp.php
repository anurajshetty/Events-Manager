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

$sql="SELECT employee.name, employee.gender, employee.address, employee_type.name, employee.emailid, employee.phone, employee.salary  FROM employee INNER JOIN employee_type
ON employee.typeid=employee_type.id WHERE ";
$flag=1;
if($arr[0] != 0)
{
  if(!preg_match("/^[0-9]*$/",$arr[0]))
    {
    $flag=0;
    }
  else
   {
    if($arr[1]==0 && $arr[2]==0)
    {
   $sql=$sql."typeid='".$arr[0]."'";
    }
    else
    {
    $sql=$sql."typeid='".$arr[0]."' AND ";
    } 
  }
 
}
if($arr[1] != 0)
{
  if(!preg_match("/^[0-9]*$/",$arr[1]))
    {
    $flag=0;
    }
  else
   {
     if($arr[2]==0)
      {
   $sql=$sql." salary >'".$arr[1]."'";
      }
     else
      {
      $sql=$sql." salary >'".$arr[1]."' AND ";
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
   $sql=$sql." salary <'".$arr[2]."'";
    }
 
}


$sql=$sql.";";

if(flag)
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
   echo "<table><tr><th>Name</th><th>Gender</th><th>Address</th><th>Designation</th><th>Emailid</th><th>Phone number</th><th>Salary</th></tr>";
   echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
   $flag1=1;
  
   }
  else
  {
 echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
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
