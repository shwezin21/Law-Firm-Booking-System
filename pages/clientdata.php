<?php 
session_start();
$connect=mysqli_connect('localhost','root','','justiceforyoudb');
if (!isset($_SESSION['clientemail']))
{
    echo "<script>alert('Please Login');
                    window.location.assign('signin.php');
        </script>"; 
}
else
{

    $Email=$_SESSION['clientemail'];
    $clientid=$_SESSION['userid'];
    $select="Select * from client where cemail='$Email'";
    $run=mysqli_query($connect,$select);
    $row=mysqli_fetch_array($run);
    $adminid=$row['clientid'];
    $adname=$row['clname'];
    $adnrcnumber=$row['cnrcnumber'];
    $adage=$row['cage'];
    $adphnumber=$row['cphoneno'];
    $ademail=$row['cemail'];
    $adaddress=$row['caddress'];
    $adavatar=$row['cavatar'];
}
?>