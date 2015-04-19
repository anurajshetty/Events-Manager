<?php
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
$q = $_GET['q'];
$tim=time();
if($_SESSION['time'] < $tim)
{
session_unset();
session_destroy();
echo "expire";
}
else
{
$_SESSION['time']=$_SESSION['time']+300;
}
?>
