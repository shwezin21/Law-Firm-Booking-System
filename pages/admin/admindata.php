<?php 
session_start();
$connect=mysqli_connect('localhost','root','','justiceforyoudb');
if (!isset($_SESSION['adminemail']))
{
    echo "<script>alert('Please Login');
                    window.location.assign('../signin.php');
        </script>"; 
}
else
{

    $Email=$_SESSION['adminemail'];
    $adminid=$_SESSION['userid'];
    $select="Select * from admin where ademail='$Email'";
    $run=mysqli_query($connect,$select);
    $row=mysqli_fetch_array($run);
    $adminid=$row['adminid'];
    $adname=$row['adname'];
    $adnrcnumber=$row['adnrcnumber'];
    $adage=$row['adage'];
    $adphnumber=$row['adphoneno'];
    $ademail=$row['ademail'];
    $adaddress=$row['adaddress'];
    $adavatar=$row['adavatar'];
    $adposition=$row['adposition'];
    $adsalary=$row['adsalary'];
    $adexperience=$row['adexperience'];
    $adeducation=$row['adeducation'];
}
?>