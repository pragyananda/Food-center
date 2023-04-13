<?php


header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
include("file:///C:/xampp/htdocs/food center/function.php");
include("file:///C:/xampp/htdocs/food center/config/constraint.php"); 


$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;


$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		//echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		$odi=$_POST['ORDERID'];
		$TXNID=$_POST['TXNID'];
		$_SESSION['order_id']=$odi;
		mysqli_query($conn ,"UPDATE dbl_order set payment_status='success',payment_id='$TXNID' where id=$odi");
		
		redirect(SITEURL.'successorder.php');
	}
	else {
	//	echo "<b>Transaction status is failure</b>" . "<br/>";
	$odi=$_POST['ORDERID'];
	$TXNID=$_POST['TXNID'];
	
	mysqli_query($conn ,"UPDATE   dbl_order set payment_status='failed',payment_id='$TXNID' where id=$odi");
	
	redirect(SITEURL.'errorpayment.php');
	}

}
else{
	$odi=$_POST['ORDERID'];
	$TXNID=$_POST['TXNID'];
	
	mysqli_query($conn ,"UPDATE  dbl_order set payment_status='failed',payment_id='$TXNID' where id=$odi");
	
	redirect(SITEURL.'errorpayment.php');
}

?>