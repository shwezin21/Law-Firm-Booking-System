<?php 
$connect=mysqli_connect('localhost','root','','justiceforyoudb');
$slotid = $_GET['id'];
$delete = "Delete from availableslot where slotid ='$slotid'";
$run = mysqli_query($connect,$delete);

if($run)
{
   echo "<script>alert ('Delete successfully');
   window.location.assign('timeslot.php');
   </script>";

}
else
{
	echo mysqli_error($connect);
}

 ?>