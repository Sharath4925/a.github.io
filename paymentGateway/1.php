<?php
$SenderPlatform=$_POST['SenderWalletorBank'];
$SenderNum=$_POST['SenderNumber'];
$ReceiverPlatform=$_POST['ReceiverWalletorBank'];
$ReceiverNum=$_POST['ReceiverNumber'];
$Amount=$_POST['amount'];
$usr='root';
$srvr='localhost';
$passwd='12345';
$db='paymentGateway';
$conn= mysqli_connect($srvr,$usr,$passwd,$db);
if($conn)
 echo Success;
$date=new DateTime();
$salt=$date->getTimestamp();
$str=$SenderNum.$SenderPlatform.$ReceiverNum.$ReceiverPlatform.$Amount;
$hash=md5($str.$salt);
$q="insert into transaction values($SenderNum,'$SenderPlatform',$ReceiverNum,'$ReceiverPlatform',$Amount,'$hash')";
if(mysqli_query($conn,$q))
 echo Success;
else
  echo failed;
mysqli_close($conn);
?>
