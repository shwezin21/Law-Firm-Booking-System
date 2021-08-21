             <?php include('admindata.php') ?>
             <?php include('adminheader.php') ?>
          <?php 
            $select="SELECT COUNT(lawyerid) AS totallawyer 
                     FROM lawyer";
            $run=mysqli_query($connect,$select);
            $array=mysqli_fetch_array($run);
            $totallawyer=$array['totallawyer']; 
            $select1="SELECT COUNT(b.bookingid) AS totalbooking
                     FROM client c, appointment b, payment p
                     WHERE b.clientid=c.clientid and p.bookingid=b.bookingid";
            $run1=mysqli_query($connect,$select1);
            $array1=mysqli_fetch_array($run1);
            $totalbooking=$array1['totalbooking'];
             $select3="SELECT SUM(paymentfees) AS paymentfees
                     FROM  payment";
            $run2=mysqli_query($connect,$select3);
            $array2=mysqli_fetch_array($run2);
            $totalbooking=$array1['totalbooking'];
            $paymentfees=$array2['paymentfees'];
            $select2="SELECT COUNT(c.clientid) AS totalclient
                      FROM client c, appointment b, payment p
                      WHERE c.clientid=b.clientid and p.bookingid=b.bookingid";
            $run2=mysqli_query($connect,$select2);
            $row=mysqli_fetch_array($run2);
            $totalclient=$row['totalclient'];
            if(isset($_POST['btnpending']))
{
	$appointmentid=$_POST['txtid'];
	$update="UPDATE appointment SET
	         status='Confirmed'
	         WHERE bookingid='$appointmentid'";
	$query=mysqli_query($connect,$update);
	if($query)
	{
		echo "<script>alert('Confirm Sucessfully')
		      </script>";
	}

}
           ?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Justice For You-Admin Dashboard</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="main-wrapper">

			<!-- Sidebar -->
            <div class="sidebar" id="sidebar" style='background-color: #1b5a90;'>
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="active"> 
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
							<li> 
								<a href="adminprofile.php"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li>
		
							
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>

										<div class="dash-count">
											<h3><?php echo $totallawyer ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										<h6 class="text-muted">Lawyer</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo  $totalclient ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Client</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
										<div class="dash-count">
											<h3><?php echo $totalbooking ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Appointment</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon text-warning border-warning">
											<i class="fe fe-folder"></i>
										</span>
										<div class="dash-count">
											<h3>$<?php echo $paymentfees ?></h3>
										</div>
									</div>
									<div class="dash-widget-info">
										
										<h6 class="text-muted">Revenue</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 d-flex">
						
							<!-- Recent Orders -->
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Lawyer List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Lawyer Name</th>
													<th>Speciality</th>
													<th>Rating</th>
												</tr>
											</thead>
											<tbody>
												  <?php 
                                                                  $Select = "SELECT * FROM 
                                                                  sector s RIGHT OUTER JOIN lawyer l
                                                                  on s.sectorid=l.sectorid
                                                                 ";
                                                                 $run1 = mysqli_query($connect,$Select);
                                              	                $count = mysqli_num_rows($run1);
                                                                for ($i=0; $i <$count ; $i++) { 
                                                                $data = mysqli_fetch_array($run1);
                                                                $lawyerid=$data['lawyerid'];
                                                                $sectorname=$data['sectorname'];
                                                                $lavatar=$data['lavatar'];
                                                                $lname=$data['lname'];
                                                                 $SELECT="SELECT  
                                                                          CAST(AVG(r.ratingnumber) AS DECIMAL(10,0)) As avgrating
                                                                           FROM  review r, lawyer l
                                                                          WHERE l.lawyerid='$lawyerid' and l.lawyerid=r.lawyerid";
                                                                           $selectquery=mysqli_query($connect,$SELECT);
                                                                           $selectrow=mysqli_fetch_array($selectquery);
                                                                          $ratingnumber=$selectrow['avgrating'];

                                                                echo "
                                                                      <tr>
			                                                           <td>
				                                                       <h2 class='table-avatar'>
				                                                      <a href='profile.html' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='$lavatar' alt='$lname'></a>
	                                                                 <a href='profile.html'>$lname</a>
			                                                        </h2>
			                                                        </td>
			                                                        <td>$sectorname</td>";

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
                                                                     
                                                        
                                                                   echo "</tr>";

                                  }
                                                      ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
						<div class="col-md-6 d-flex">
						
							<!-- Feed Activity -->
							<div class="card  card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Clients List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>													
													<th>Client Name</th>
													<th>Phone</th>
													<th>Paid</th>													
												</tr>
											</thead>
											<tbody>
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

													<td>
														<h2 class='table-avatar'>
															<a href='#' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='$cavatar' alt='$cname'></a>
															$cname
														</h2>
													</td>
													<td>$cphoneno</td>
													<td>$$paymentfees</td>";

													
                                  }
                                             
                                
                                   
                                              
                             ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Feed Activity -->
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">Appointment List</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Lawyer Name</th>
													<th>Speciality</th>
													<th>Client Name</th>
													<th>Apointment Time</th>
													<th>Status</th>
													<th class="text-right">Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php 
										     $Select = "SELECT * FROM lawyer l, appointment b, client c, availableslot avs, sector s, payment p
                                                         WHERE l.lawyerid=b.lawyerid AND c.clientid=b.clientid AND avs.slotid=b.slotid
                                                         AND s.sectorid=l.sectorid AND p.bookingid=b.bookingid";
                                              $run1 = mysqli_query($connect,$Select);
                                              $count2=mysqli_num_rows($run1);
											 $run1 = mysqli_query($connect,$Select);
                                              	 $count = mysqli_num_rows($run1);
                                              for ($i=0; $i <$count ; $i++) { 
                                              $data = mysqli_fetch_array($run1);
                                              $lname = $data['lname'];
                                              $cname= $data['clname'];
                                              $sectorname=$data['sectorname'];
                                              $slotstart=$data['slotstart'];
                                              $slotend=$data['slotend'];
                                              $lavatar=$data['lavatar'];
                                              $status=$data['status'];
                                              $cavatar=$data['cavatar'];
                                              $paymentfees=$data['paymentfees'];
                                              $appointmentdate=$data['appointmentdate'];
                                               $appointmentid=$data['bookingid'];
                                              echo "<form method='POST'><tr>
                                              <input type='text' name='txtid' value='$appointmentid' hidden>
													<td>
														<h2 class='table-avatar'>
															<a href='#' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='$lavatar' alt='User Image'></a>
															<a href='#'>$lname</a>
														</h2>
													</td>
													<td>$sectorname</td>
													<td>
														<h2 class='table-avatar'>
															<a href='#' class='avatar avatar-sm mr-2'><img class='avatar-img rounded-circle' src='$cavatar' alt='$cavatar'></a>
															<a href='#'>$cname</a>
														</h2>
													</td>
													<td>$appointmentdate<span class='text-primary d-block'>$slotstart-$slotend</span></td>
													<td>";
														if($status=='Pending')
													{
														echo "
														        <button name='btnpending' class='btn btn-primary'>Confirm</button>
														       ";
													}
                                                    else
                                                    {
                                                    	echo  "<button class='btn btn-default' disabled>Confirmed</button>";
                                                    }
													echo "</td>
													<td class='text-right'>
														$$paymentfees
													</td>
												</tr>
												</form>";
                                  }
                                   ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
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
		
		<script src="assets/plugins/raphael/raphael.min.js"></script>    
		<script src="assets/plugins/morris/morris.min.js"></script>  
		<script src="assets/js/chart.morris.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->
</html>