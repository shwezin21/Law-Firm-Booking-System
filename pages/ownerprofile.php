<?php 
session_start();
$connect=mysqli_connect('localhost','root','','justiceforyoudb');
if (!isset($_SESSION['adminemail']))
{
    echo "<script>alert('Please Login');
                    window.location.assign('signin.php');
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
    $adeducation=$row['adeducation'];
}
if (isset($_POST['btnupdate'])) 
{
    $adminid =$_POST['txtadminid'];
    $adname=$_POST['txtname'];
    $adage=$_POST['txtage'];
    $adphnumber=$_POST['txtphnumber'];
    $adaddress=$_POST['txtaddress'];
    $update="Update admin
            set adname='$adname',
            adage='$adage',
            adaddress='$adaddress',
            adphoneno='$adphnumber'
            where adminid='$adminid'";
    $run=mysqli_query($connect,$update);

    if ($run) 
    {
        echo "<script>alert('Update');
              window.location.assign('ownerprofile.php')
        </script>";     
    }
    else
    {
        echo mysqli_error($connect);
    }

}
if (isset($_POST['btnupload'])) 
{
    $adminid=$_POST['txtadminid'];
    $avatar = $_FILES['fileavatar']['name']; 
  if($avatar)
     {
      $folder= "../image/";
       $filename=$folder.$avatar;
        $check=copy($_FILES['fileavatar']['tmp_name'],$filename);
   }  
    $update="Update admin
            set adavatar='$filename'
            where adminid='$adminid'";
    $run=mysqli_query($connect,$update);

    if ($run) 
    {
        echo "<script>alert('Update')
        window.location.assign('ownerprofile.php')
        </script>";     
    }
    else
    {
        echo mysqli_error($connect);
    }

}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Owner Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $("#newModal").modal("hide");
    $("#button1").click(function(){
      $("#newModal").modal("show");
    });
  });
</script>
</head>
<body>
<div class="container">
    <div class="view-account">
        <section class="module">
            <div class="module-inner">
                <div class="content-panel">
                    <h2 class="title">Profile<span class="pro-label label label-info"><?php echo $adname ?></span></h2>
                    <form class="form-horizontal" action='ownerprofile.php' method='POST' enctype="multipart/form-data">
                        <input name='txtadminid' type='text' value='<?php echo $adminid  ?>' hidden>
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Personal Info</h3>
                            <div class="form-group avatar">
                                <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                    <img class="img-rounded img-responsive" src="<?php echo $adavatar ?>" alt="<?php echo $adname ?>">
                                </figure>
                                <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                    <input type="file" class="file-uploader pull-left" name='fileavatar'>
                                    <button type="submit" name='btnupload' class="btn btn-sm btn-default-alt pull-left">Upload Photo</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">User Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo $adname ?>" name='txtname'>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">NRC NUMBER</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo $adnrcnumber ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Age</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo $adage ?>" name='txtage'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Position</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo $adposition ?>" name='txtposition' readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Education</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo $adeducation ?>" name='txteducation' readonly>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Contact Info</h3>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Email</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="email" class="form-control" value="<?php echo $ademail ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Phone Number</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name='txtphnumber' value="<?php echo $adphnumber ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Address</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <textarea  class="form-control" name='txtaddress' ><?php echo $adaddress ?></textarea> 
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <input class="btn btn-primary" type="submit" name='btnupdate' value="Update Profile">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
