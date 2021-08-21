<?php 
$connect=mysqli_connect('localhost','root','','justiceforyoudb');
if(isset($_GET['id']))
{
   $clientid=$_GET['id'];
   $delete="DELETE * FROM client 
            WHERE clientid='$clientid'";
    $run=mysqli_query($connect.$delete);
    if($run)
    {
    	echo "<script>alert('Delete Sucessfully')</script>";
    }
}
 ?>
