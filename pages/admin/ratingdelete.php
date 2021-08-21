<?php 
$connect=mysqli_connect('localhost','root','','justiceforyoudb');
$ratingid = $_GET['id'];
$delete = "DELETE FROM review WHERE ratingid ='$ratingid'";
$run = mysqli_query($connect,$delete);
if($run)
{
   echo "<script>alert ('Delete successfully');
   window.location.assign('reviewdisplay.php');
   </script>";

}
else
{
	echo mysqli_error($connect);
}

 ?>