<?php 
$connect=mysqli_connect('localhost','root','','justiceforyoudb');
$sectorid = $_GET['id'];
$delete = "DELETE FROM `sector` WHERE sectorid='$sectorid'";
$run = mysqli_query($connect,$delete);

if($run)
{
   echo "<script>alert ('Delete successfully');
   window.location.assign('specialities.php');
   </script>";

}
else
{
	echo mysqli_error($connect);
}

 ?>