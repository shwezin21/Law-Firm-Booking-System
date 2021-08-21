<?php 
session_start();
$connect=mysqli_connect('localhost','root','','justiceforyoudb');
if (!isset($_SESSION['lawyeremail']))
{
    echo "<script>alert('Please Login');
                    window.location.assign('signin.php');
        </script>"; 
}
else
{

    $Email=$_SESSION['lawyeremail'];
    $lawyerid=$_SESSION['userid'];
    $select="Select * from lawyer where lemail='$Email'";
    $run=mysqli_query($connect,$select);
    $row=mysqli_fetch_array($run);
    $adminid=$row['lawyerid'];
    $adname=$row['lname'];
    $adnrcnumber=$row['lnrcnumber'];
    $adage=$row['lage'];
    $adphnumber=$row['lphoneno'];
    $ademail=$row['lemail'];
    $adaddress=$row['laddress'];
    $adavatar=$row['lavatar'];
    $adposition=$row['lposition'];
    $adsalary=$row['lsalary'];
    $adexperience=$row['lexperience'];
    $adeducation=$row['leducation'];
}
?>