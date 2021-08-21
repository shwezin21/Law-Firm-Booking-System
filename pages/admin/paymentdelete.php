<?php 
 $connect=mysqli_connect('localhost','root','','justiceforyoudb');
 if(isset($_GET['paymentid']))
 {
 	$paymentid=$_GET['paymentid'];
 	$delete="DELETE FROM payment
 	         WHERE paymentid='$paymentid'";
 	$run=mysqli_query($connect,$delete);
 	if($run)
 	{
 		echo "<script>alert('Delete Sucessfully')
 		              window.location.assign('paymentlist.php')</script>";
 	}

 }
 ?>