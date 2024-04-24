<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

$paymentid=$_POST['payment_id'];
$productid=$_POST['product_id'];
$dt=date('Y-m-d');

$sql="insert into payment(pid,product_id,payment_id,date)values('".$productid."','".$paymentid."','".$dt."')";
$result=mysqli_query($con,$sql);
if($result){
    echo "done";
    $_SESSION['paymentid']=$paymentid;
}
else{
    echo "error" .$sql. "<br>" .mysqli_error($con); 
}

?>
