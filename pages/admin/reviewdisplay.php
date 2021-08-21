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
  if(isset($_POST['btnupload']))
  {
    $name=$_POST['txtname'];
     $sectorid=AutoID('sector','sectorid','sector_',6);
  $avatar = $_FILES['fileavatar']['name']; 
  if($avatar)
     {
      $folder= "../sectorimage/";
       $filename=$folder.$avatar;
        $check=copy($_FILES['fileavatar']['tmp_name'],$filename);
   }
   $slquery="SELECT * FROM sector
            WHERE sectorname='$name'";
   $slresult=mysqli_query($connect, $slquery);
   $row =mysqli_num_rows($slresult);
if($row>0)
   {
    echo "<script>alert('Sector name already exists.Please type another sector name')</script>";
     array_push($error,"Sector name already exists.Please type another sector name.");
     } 
      if(!$error)  
  {
    $insert="INSERT INTO sector
   (`sectorid`,`sectorimage`,`sectorname`)
    VALUES('$sectorid','$filename','$name')";
    $run=mysqli_query($connect,$insert);
    if ($run) {
      echo "<script>
         alert ('Successfully Upload');
         window.location.assign('specialities.php');
         </script>";

    }
    else
    {
      echo mysqli_error($connect);
    }
  }
  }
  if(isset($_POST['btnupdate']))
{
  $sectorid = $_POST['txtid'];
    $sname = $_POST['txtname'];
     $description = $_POST['txtDescription'];
  $update = "Update sector Set sectorname = '$sname ',  Description ='$description'
  where sectorid = '$sectorid' ";
  $run= mysqli_query($connect,$update);
  if ($run)
  {
  	echo "<script>alert ('Update successfully');
  	window.location.assign('specialities.php');
   </script>";
  }
  else
  {
  	mysqli_error($connect);
  }
}

 ?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/specialities.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Justice For You - Specialities Page</title>
		
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
							<li> 
								<a href="clientlist.php"><i class="fe fe-user"></i> <span>Clients</span></a>
							</li>
							<li> 
                             <a href="timeslot.php"><img src='assets/img/icon-03.png' width='20px'>Time Slot</a>
                            </li>
							<li class="active"> 
								<a href="reviewdisplay.php"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li>
							<li> 
								<a href="paymentlist.php"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li>
							<li> 
								<a href="adminprofile.php"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li>
		
							
					</div>
                </div>
            </div>
        <div class="main-wrapper">
		
			<!-- Header -->
 
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Reviews</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admindashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Reviews</li>
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
													
													
													<th>Client Name</th>
													<th>Lawyer Name</th>
													<th>Rating Number</th>
													<th>Descriptions</th>
													<th>Date</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody id="table">
												<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length"><form method='POST' action='#'><label>Rows <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm"><option value="5">5</option><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> <button name='btnshow' class='btn btn-xs btn-primary'>Show</button></label></form></div></div>
											
											<?php 
                                              $Select = "SELECT * FROM review r, lawyer l, client c
                                                         WHERE r.clientid=c.clientid AND l.lawyerid = r.lawyerid";
                                              $run1 = mysqli_query($connect,$Select);
                                              $count2=mysqli_num_rows($run1);
                                               
                                             if(isset($_POST['btnshow']))
                                              {
                                              		$count=$_POST['DataTables_Table_0_length'];
                                              	if ($count<$count2)
                                              	{
                                              		 	$Select = "SELECT * FROM review r, lawyer l, client c
                                                                    WHERE r.clientid=c.clientid AND l.lawyerid = r.lawyerid";
                                              $run1 = mysqli_query($connect,$Select);
                                              $count=$_POST['DataTables_Table_0_length'];
                                              $_SESSION['count']=$count;
                                              for ($i=0; $i <$count ; $i++) { 
                                              $data = mysqli_fetch_array($run1);
                                             $lname=$data['lname'];
                                             $lavatar=$data['lavatar'];
                                             $cname=$data['clname'];
                                             $cavatar=$data['cavatar'];
                                             $review=$data['review'];
                                             $ratingnumber=$data['ratingnumber'];
                                             $ratingdate=$data['ratingdate'];
                                             $ratingid=$data['ratingid'];
                                              echo "
												<tr>
													<td>
														<h2 class='table-avatar'>
															<a href='#' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='$cavatar' alt='$cname'></a>
															<a href='#'>$cname </a>
														</h2>
													</td>
													<td>
														<h2 class='table-avatar'>
															<a href='#' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='$lavatar' alt='$lname'></a>
															<a href='#'>$lname</a>
														</h2>
													</td>";
													  if($ratingnumber==1)
                                                                     {
                                                                     echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star-o text-secondary'></i>
														<i class='fe fe-star-o text-secondary'></i>
														<i class='fe fe-star-o text-secondary'></i>
														<i class='fe fe-star-o text-secondary'></i>
													</td>"	;
                                                                     }
                                                                     else if($ratingnumber==2)
                                                                     {
                                                                     	echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star-o text-secondary'></i>
														<i class='fe fe-star-o text-secondary'></i>
														<i class='fe fe-star-o text-secondary'></i>
													</td>";
                                                                     }
                                                                      else if($ratingnumber==3)
                                                                     {
                                                                     	echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star-o text-secondary'></i>
														<i class='fe fe-star-o text-secondary'></i>
													</td>";
                                                                     }
                                                                       else if($ratingnumber==4)
                                                                     {
                                                                     echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star-o text-secondary'></i>
													</td>";
                                                                     }
                                                                    
                                                                    else if($ratingnumber==5)
                                                                     {
                                                                     	echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														
													</td>";
                                                                     }
                                                                     
                                                        
													
													
													
												echo "<td>
														$review
													</td>
														<td>$ratingdate</td>
													<td class='text-right'>
														<div class='actions'>
															<a href='ratingdelete.php?id=$ratingid' class='btn btn-sm bg-danger-light'>
																<i class='fe fe-trash'></i> Delete
															</a>
															
														</div>
													</td>
												</tr>";
                                              }
}
                                             
                                   
                                             else if($count>$count2)
                                             {
                                                      $count = mysqli_num_rows($run1);
                                                      $_SESSION['count']=$count;
                                              for ($i=0; $i <$count ; $i++) { 
                                              $data = mysqli_fetch_array($run1);
                                              $lname=$data['lname'];
                                             $lavatar=$data['lavatar'];
                                             $cname=$data['clname'];
                                             $cavatar=$data['cavatar'];
                                             $review=$data['review'];
                                             $ratingnumber=$data['ratingnumber'];
                                             $ratingdate=$data['ratingdate'];
                                             $ratingid=$data['ratingid'];
                                              echo "
												<tr>
													<td>
														<h2 class='table-avatar'>
															<a href='profile.html' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='$cavatar' alt='$cname'></a>
															<a href='#'>$cname </a>
														</h2>
													</td>
													<td>
														<h2 class='table-avatar'>
															<a href='#' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='$lavatar' alt='$lname'></a>
															<a href='#'>$lname</a>
														</h2>
													</td>";
													  if($ratingnumber==1)
                                                                     {
                                                                     echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-secondary'></i>
														<i class='fe fe-star text-secondary'></i>
														<i class='fe fe-star text-secondary'></i>
														<i class='fe fe-star-o text-secondary'></i>
													</td>"	;
                                                                     }
                                                                     else if($ratingnumber==2)
                                                                     {
                                                                     	echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-secondary'></i>
														<i class='fe fe-star text-secondary'></i>
														<i class='fe fe-star-o text-secondary'></i>
													</td>";
                                                                     }
                                                                      else if($ratingnumber==3)
                                                                     {
                                                                     	echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-secondary'></i>
														<i class='fe fe-star-o text-secondary'></i>
													</td>";
                                                                     }
                                                                       else if($ratingnumber==4)
                                                                     {
                                                                     echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star-o text-secondary'></i>
													</td>";
                                                                     }
                                                                    
                                                                    else if($ratingnumber==5)
                                                                     {
                                                                     	echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														
													</td>";
                                                                     }
                                                                     
                                                        
													
													
													
												echo "<td>
														$review
													</td>
														<td>$ratingdate</td>
													<td class='text-right'>
														<div class='actions'>
															<a href='ratingdelete.php?id=$ratingid' class='btn btn-sm bg-danger-light'>
																<i class='fe fe-trash'></i> Delete
															</a>
															
														</div>
													</td>
												</tr>";
                                              
                                  }
                                              }


                                          }
                                                    
                                               else
                                              {
                                              	 $count = mysqli_num_rows($run1);
                                              	 $_SESSION['count']=$count;
                                              for ($i=0; $i <$count ; $i++) { 
                                              $data = mysqli_fetch_array($run1);
                                               $lname=$data['lname'];
                                             $lavatar=$data['lavatar'];
                                             $cname=$data['clname'];
                                             $cavatar=$data['cavatar'];
                                             $review=$data['review'];
                                             $ratingnumber=$data['ratingnumber'];
                                             $ratingdate=$data['ratingdate'];
                                             $ratingid=$data['ratingid'];
                                              echo "
												<tr>
													<td>
														<h2 class='table-avatar'>
															<a href='profile.html' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='$cavatar' alt='$cname'></a>
															<a href='#'>$cname </a>
														</h2>
													</td>
													<td>
														<h2 class='table-avatar'>
															<a href='#' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='$lavatar' alt='$lname'></a>
															<a href='#'>$lname</a>
														</h2>
													</td>";
													  if($ratingnumber==1)
                                                                     {
                                                                     echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-secondary'></i>
														<i class='fe fe-star text-secondary'></i>
														<i class='fe fe-star text-secondary'></i>
														<i class='fe fe-star-o text-secondary'></i>
													</td>"	;
                                                                     }
                                                                     else if($ratingnumber==2)
                                                                     {
                                                                     	echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-secondary'></i>
														<i class='fe fe-star text-secondary'></i>
														<i class='fe fe-star-o text-secondary'></i>
													</td>";
                                                                     }
                                                                      else if($ratingnumber==3)
                                                                     {
                                                                     	echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-secondary'></i>
														<i class='fe fe-star-o text-secondary'></i>
													</td>";
                                                                     }
                                                                       else if($ratingnumber==4)
                                                                     {
                                                                     echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star-o text-secondary'></i>
													</td>";
                                                                     }
                                                                    
                                                                    else if($ratingnumber==5)
                                                                     {
                                                                     	echo "<td>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														<i class='fe fe-star text-warning'></i>
														
													</td>";
                                                                     }
                                                                     
                                                        
													
													
													
												echo "<td>
														$review
													</td>
														<td>$ratingdate</td>
													<td class='text-right'>
														<div class='actions'>
															<a href='ratingdelete.php?id=$ratingid' class='btn btn-sm bg-danger-light'>
																<i class='fe fe-trash'></i> Delete
															</a>
															
														</div>
													</td>
												</tr>";
                                  }
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
