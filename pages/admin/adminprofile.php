<?php include('admindata.php') ?>
<?php include('../function.php') ?>
<?php include('adminheader.php') ?>
<?php 
if (!isset($_SESSION['adminemail']))
{
    echo "<script>alert('Please Login');
                    window.location.assign('../signin.php');
        </script>"; 
}
if(isset($_SESSION['adminemail']))
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
            adphoneno='$adphnumber',
            adsalary='$adsalary',
            adexperience='$adexperience'
            where adminid='$adminid'";
    $run=mysqli_query($connect,$update);

    if ($run) 
    {
        echo "<script>alert('Update');
              window.location.assign('adminprofile.php')
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
      $folder= "assets/img/";
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
        window.location.assign('adminprofile.php')
        </script>";     
    }
    else
    {
        echo mysqli_error($connect);
    }

}



?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Justice For You - Lawyer Page</title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        
        <!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
        
        <!-- Datatables CSS -->
        <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <!-- Sidebar -->
          <div class="sidebar" id="sidebar" style='background-color: #1b5a90;'>
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title"> 
                                <span>Main</span>
                            </li>
                            <li> 
                                <a href="admindashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                            </li>
                            <li> 
                                <a href="appointment.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                            </li>
                            <li> 
                                <a href="specialities.php"><i class="fe fe-users"></i> <span>Specialities</span></a>
                            </li>
                            <li> 
                                <a href="lawyermanage.php"><i class="fe fe-user-plus"></i> <span>Lawyer</span></a>
                            </li>
                            <li> 
                                <a href="clientlist.php"><i class="fe fe-user"></i> <span>Clients</span></a>
                            </li>
                            <li> 
                                 <a href="timeslot.php"><img src='assets/img/icon-03.png' width='20px'>Time Slot</a>
                             </li>

                            <li> 
                                <a href="reviewdisplay.php"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                            </li>
                            <li> 
                                <a href="paymentlist.php"><i class="fe fe-activity"></i> <span>Transactions</span></a>
                            </li>
                            <li class="active"> 
                                <a href="adminprofile.php"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                            </li>
        
                            
                    </div>
                </div>
            </div>
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admindashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<figure class="figure col-md-2 col-sm-3 col-xs-12">
                                    <img class="img-rounded img-responsive" src="<?php echo $adavatar ?>" alt="<?php echo $adname ?>">
                                </figure>

									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?php echo $adname ?></h4>
										<h6 class="text-muted"><?php echo $ademail ?></h6>
										<div class="user-Location"><i class="fa fa-map-marker"></i> <?php echo $adaddress ?></div>
								</div>
							</div>
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-10"><?php echo $adname ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Age</p>
														<p class="col-sm-10"><?php echo $adage ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-10"><?php echo $ademail ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-10"><?php echo $adphnumber ?></p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
														<p class="col-sm-10 mb-0"><?php echo $adaddress ?>
													</p>
													</div>
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Profile Data</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															    <form class="form-horizontal" action='adminprofile.php' method='POST' enctype="multipart/form-data">
                        <input name='txtadminid' type='text' value='<?php echo $adminid  ?>' hidden>
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Personal Info</h3>
                            <div class="form-group avatar">
                                     <div class="form-group col-md-10 col-sm-9 col-xs-12">
                                    <input type="file" class="file-uploader pull-left" name='fileavatar'>
                                    <button type="submit" name='btnupload' class="btn btn-xs btn-light pull-left">Upload</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 col-sm-3 col-xs-12 control-label">User Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo $adname ?>" name='txtname'>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="col-md-5 col-sm-3 col-xs-12 control-label">NRC NUMBER</label>
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
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Salary</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo $adsalary ?>MMK" name='txtsalary' readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Experience</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" value="<?php echo $adexperience ?>" name='txtexperience' readonly>
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
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
							
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
</html>