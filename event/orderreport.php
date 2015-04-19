<?php
ini_set('session.save_path','/home/scf-26/anurajsh/tmp');
session_start();
if( !(isset($_SESSION['type']) && $_SESSION['type']==101))
 { 
echo "session expired";
  exit();
}
?>
<html>
<head>
<style>
td{
background-color:white;
}
</style>
</head>
<?php
$flag=1;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
if(!(empty($_POST['ordername'])))
{
$ordername=test_input($_POST['ordername']);
if(!preg_match("/^[a-zA-Z ]+$/",$ordername))
{
$ordername="0";
}
}
else
{
$ordername="0";
}

if(!(empty($_POST['amountfrom'])))
{
$amountfrom=test_input($_POST['amountfrom']);
if(!preg_match("/^[0-9]+$/",$amountfrom))
{
$amountfrom=0;
}
}
else
{
$amountfrom=0;
}
if(!(empty($_POST['amountto'])))
{
$amountto=test_input($_POST['amountto']);
if(!preg_match("/^[0-9]+$/",$amountto))
{
$amountto=0;
}
else if($amountto < $amountfrom)
{
$amountto =0;
}
}
else
{
$amountto=0;
}


$month1=test_input($_POST['month1']);
$day1=test_input($_POST['day1']);
$year1=test_input($_POST['year1']);
if(empty($_POST['year1']))
{
$date1="0";
}
else
{
$curryear=date("Y");
if($year1 >= 2000 && $year1 <= $curryear)
{
$date1=$year1."-".$month1."-".$day1;
}
else
{
$date1="0";
}
}
$month2=test_input($_POST['month2']);
$day2=test_input($_POST['day2']);
$year2=test_input($_POST['year2']);
if(preg_match("/^[0-9]+$/",$year2))
{
$date2=$year2."-".$month2."-".$day2;
if(strtotime($date1) < strtotime($date2))
{
$date2=$year2."-".$month2."-".$day2;
}
else
{
$date2="0";
}
}
else
{
$date2="0";
}
$flags=1;
if($ordername == "0" && $amountfrom ==0 && $amountto==0 && $date1 =="0" && $date2=="0")
{
$flags=0;
}
if($flags)
{
$sql="";
$sql=$sql."select * from Customer inner join orders on Customer.id = orders.userid where ";
if($ordername != "0")
{
$sql=$sql."orders.ordername like '%".$ordername."%' ";
if($amountfrom !=0 || $amountto !=0 || $date1 != "0" || $date2 !="0")
{
$sql=$sql."and ";
}
}

if($amountfrom != 0)
{
$sql=$sql."orders.amount >=".$amountfrom." ";
if($amountto !=0 || $date1 != "0" || $date2 !="0")
{
$sql=$sql."and ";
}
}

if($amountto != 0)
{
$sql=$sql."orders.amount <=".$amountto." ";
if($date1 != "0" || $date2 !="0")
{
$sql=$sql."and ";
}
}

if($date1 != "0")
{
$sql=$sql."orders.orderdate >='".$date1."' ";
if($date2 !="0")
{
$sql=$sql."and ";
}
}

if($date2 != "0")
{
$sql=$sql."orders.orderdate <='".$date2."' ";

}
$sql=$sql.";";

$con=mysqli_connect("localhost","root","gunner","event");
if (mysqli_connect_errno()) 
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
             }
             else
             {
             $stmt= mysqli_query($con,$sql);
             $flag4=1;
            $text="";
            $amount=0;
             while($row = mysqli_fetch_array($stmt))
             {
             
             $amount=$amount+$row[11];
             if($flag4)
             {
             $text=$text."<table style='border: 2px solid grey;'><tr style='background-color:grey;'><th style='text-align: left;padding:10px'>Customer Name</th><th style='text-align: left;padding:10px'>Order Name</th><th style='text-align: left;padding:10px'>Shipping Address</th><th style='text-align: left;padding:10px'>Order Date</th><th style='text-align: left;padding:10px'>Amount</th></tr>";
             $flag4=0;
             }
             $text=$text."<tr><td style='padding:5px;'>".$row[1]."</td><td style='padding:10px;text-align:center'>".$row[8]."</td><td style='padding:10px;text-align:center'>".$row[10]."</td><td style='padding:10px;text-align:center'>".$row[9]."</td><td style='padding:10px;text-align:center'>$".$row[11]."</td></tr>";
             }
              if(!($flag4))
             {
             $text=$text."<tr><td style='border-top:2px solid grey;text-align:center'></td><td style='border-top:2px solid grey;text-align:center'></td><td style='border-top:2px solid grey;text-align:center'></td><td style='border-top:2px solid grey;text-align:center'>Total Amount</td><td style='padding:10px;border-top:2px solid grey;text-align:center;'>$".$amount."</td></tr></table>";
             }
             else
             {
             $text="<label style='font-size:25px;'>No data found</label>";
             }
             }
        }
        else
        {
        $text="<label style='font-size:25px;'>Provide atleast one search criteria</label>";
        }     
         
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<body onload="updatedesig();">
<div style="width:700px;height:300px;background-color: rgb(136, 9, 9);">
<br>
<form name='searchform' style="color:white;margin-left: 30px;" action="<?php echo $_SERVER['PHP_SELF'];?>" method='post'>
<label>Order Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='text' name='ordername'/> 
<br><br>
<label>Order Amount from</label>&nbsp;&nbsp;&nbsp;
<input type='text' name='amountfrom'/>
<br><br>
<label>Order Amount to</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='text' name='amountto'/> 
<br><br>
<label>Sale from</label>
<select class="texts" id="month" name="month1">
<option id="mon01" value="01">January</option>
<option id="mon02" value="02">February</option>
<option id="mon03" value="03">March</option>
<option id="mon04" value="04">April</option>
<option id="mon05" value="05">May</option>
<option id="mon06" value="06">June</option>
<option id="mon07" value="07">July</option>
<option id="mon08" value="08">August</option>
<option id="mon09" value="09">September</option>
<option id="mon10" value="10">October</option>
<option id="mon11" value="11">November</option>
<option id="mon12" value="12">December</option>
</select>
<select class="texts" id="day" name="day1">
<option id="day01" value="01">01</option>
<option id="day02" value="02">02</option>
<option id="day03" value="03">03</option>
<option id="day04" value="04">04</option>
<option id="day05" value="05">05</option>
<option id="day06" value="06">06</option>
<option id="day07" value="07">07</option>
<option id="day08" value="08">08</option>
<option id="day09" value="09">09</option>
<option id="day10" value="10">10</option>
<option id="day11" value="11">11</option>
<option id="day12" value="12">12</option>
<option id="day13" value="13">13</option>
<option id="day14" alue="14">14</option>
<option id="day15" value="15">15</option>
<option id="day16" value="16">16</option>
<option id="day17" value="17">17</option>
<option id="day18" value="18">18</option>
<option id="day19" value="19">19</option>
<option id="day20" value="20">20</option>
<option id="day21" value="21">21</option>
<option id="day22" value="22">22</option>
<option id="day23"  value="23">23</option>
<option id="day24" value="24">24</option>
<option id="day25" value="25">25</option>
<option id="day26" value="26">26</option>
<option id="day27" value="27">27</option>
<option id="day28" value="28">28</option>
<option id="day29" value="29">29</option>
<option id="day30" value="30">30</option>
<option id="day31" value="31">31</option>
</select>
<input class="texts" id="year" type="text" name="year1" placeholder="year" style="width:100px;" onblur="verifyyear(this);"><br><br>
<label>Sale to</label>&nbsp;&nbsp;&nbsp;&nbsp;
<select class="texts" id="month2" name="month2">
<option id="mon101" value="01">January</option>
<option id="mon102" value="02">February</option>
<option id="mon103" value="03">March</option>
<option id="mon104" value="04">April</option>
<option id="mon105" value="05">May</option>
<option id="mon106" value="06">June</option>
<option id="mon107" value="07">July</option>
<option id="mon108" value="08">August</option>
<option id="mon109" value="09">September</option>
<option id="mon110" value="10">October</option>
<option id="mon111" value="11">November</option>
<option id="mon112" value="12">December</option>
</select>
<select class="texts" id="day2" name="day2">
<option id="day101" value="01">01</option>
<option id="day102" value="02">02</option>
<option id="day103" value="03">03</option>
<option id="day104" value="04">04</option>
<option id="day105" value="05">05</option>
<option id="day106" value="06">06</option>
<option id="day107" value="07">07</option>
<option id="day108" value="08">08</option>
<option id="day109" value="09">09</option>
<option id="day110" value="10">10</option>
<option id="day111" value="11">11</option>
<option id="day112" value="12">12</option>
<option id="day113" value="13">13</option>
<option id="day114" alue="14">14</option>
<option id="day115" value="15">15</option>
<option id="day116" value="16">16</option>
<option id="day117" value="17">17</option>
<option id="day118" value="18">18</option>
<option id="day119" value="19">19</option>
<option id="day120" value="20">20</option>
<option id="day121" value="21">21</option>
<option id="day122" value="22">22</option>
<option id="day123"  value="23">23</option>
<option id="day124" value="24">24</option>
<option id="day125" value="25">25</option>
<option id="day126" value="26">26</option>
<option id="day127" value="27">27</option>
<option id="day128" value="28">28</option>
<option id="day129" value="29">29</option>
<option id="day130" value="30">30</option>
<option id="day131" value="31">31</option>
</select>
<input class="texts" id="year2" type="text" name="year2" placeholder="year" style="width:100px;" onblur="verifyyearone(this);"><br><br>
<input style='margin-left:80px;width:150px' type="submit" id="search" value="search" /><br><br>
</form>
</div>
<br><br>
<div style="width:800px;">
<?php echo $text; ?>
</div>
</body>
</html>
