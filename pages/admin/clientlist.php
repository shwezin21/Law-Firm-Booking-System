<?php include('admindata.php') ?>
<?php include('../function.php') ?>
<?php include('adminheader.php') ?>
<?php 
$error=array(); 
if (!isset($_SESSION['adminemail']))
{
  echo "<script>alert('Please Login');
          window.location.assign('../signin.php');
    </script>"; 
}

 ?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/specialities.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Justice For You - Appointment</title>
		
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
							<li class="active"> 
								<a href="clientlist.php"><i class="fe fe-user"></i> <span>Clients</span></a>
							</li>
							<li>
                                <a href="timeslot.php"><img src='assets/img/icon-03.png' width='20px'> <span>Time Slot</span></a>
                            </li>
							<li> 
								<a href="reviewdisplay.php"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li>
							<li> 
								<a href="transactions-list.html"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li>
							<li> 
								<a href="adminprofile.php"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li>
								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>
        <div class="main-wrapper">
            <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Appointment</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admindashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Clients</li>
								</ul>
							</div>
							
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0" >
											<thead>
												<tr>
													<th>#</th>
													<th>ClientName</th>
													<th>ClientPhone NO</th>
													<th>Client Email</th>
													<th>Client Address</th>
													<th>Paid</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody id="table">
											
											<?php 
                                              $Select = "SELECT *,SUM(p.paymentfees) AS paymentfees
                                                           FROM payment p, client c, appointment b
                                                           WHERE c.clientid = b.clientid and p.bookingid=b.bookingid
                                                           GROUP BY c.clientid
                                                           ";
                                              $run1 = mysqli_query($connect,$Select);
                                              $count = mysqli_num_rows($run1);
                                              for ($i=0; $i <$count ; $i++) { 
                                              $data = mysqli_fetch_array($run1);
                                              $cname= $data['clname'];
                                              $cavatar=$data['cavatar'];
                                              $cphoneno=$data['cphoneno'];
                                              $caddress=$data['caddress'];
                                              $cemail=$data['cemail'];
                                              $clientid=$data['clientid'];
                                              $paymentfees=$data['paymentfees'];
                                              echo "<tr>
                                                      <td>$clientid</td>

													<td>
														<h2 class='table-avatar'>
															<a href='#' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='$cavatar' alt='$cname'></a>
															$cname
														</h2>
													</td>
													<td>$cphoneno</td>
													<td>$Email</td>
													<td>$caddress</td>
													<td>$$paymentfees</td>
			 	                                                    <td class='text-right'>
				                                                    <div class='actions'>
			                                                       <a  href='clientdelete.php?id=$clientid' class='btn btn-sm bg-danger-light'>
				                                                    <i class='fe fe-trash'></i> Delete
			                                                         </a>
			                                                        </div>
			                                                       </td>
                                                                   ";
    
                                            

													
                                  }  
                                              
                             ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>			
			</div>
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Specialities</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action='specialities.php' method='POST' enctype="multipart/form-data">
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Specialities</label>
											<input type="text" class="form-control" name='txtname'>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>Image</label>
											<input type="file"  class="form-control" name='fileavatar'>
										</div>
									</div>
									
								</div>
								<button type="submit" name='btnupload' class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Wrapper -->
				
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/specialities.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:51 GMT -->
</html>
