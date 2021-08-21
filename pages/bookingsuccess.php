<?php 
$connect=mysqli_connect("localhost","root","","justiceforyoudb");
if(isset($_GET['paymentid']))
{
 $paymentid=$_GET['paymentid'];
   $select="SELECT * FROM payment p, appointment b, lawyer l, availableslot avs
            WHERE p.bookingid=b.bookingid and l.lawyerid=b.lawyerid AND avs.slotid=b.slotid AND p.paymentid='$paymentid'";
   $run=mysqli_query($connect,$select);
   $row=mysqli_fetch_array($run);
   $lname=$row['lname'];
   $slotstart=$row['slotstart'];
   $slotend=$row['slotend'];
   $appointmentdate=$row['appointmentdate'];
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<title>Justice For You</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php 
  include('header.php');
 ?>

 <div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content success-page-cont">
				<div class="container-fluid">
				
					<div class="row justify-content-center">
						<div class="col-lg-6">
						
							<!-- Success Card -->
							<div class="card success-card">
								<div class="card-body">
									<div class="success-cont">
										<i class="fas fa-check"></i>
										<h3>Appointment booked Successfully!</h3>
										<p>Appointment booked with <strong>Lawyer <?php echo $lname ?></strong><br> on <strong><?php echo $appointmentdate ?> at <?php echo $slotstart ?> -<?php echo $slotend ?>  </strong></p>
										<a href="invoiceview.php?paymentid=<?php echo $paymentid?>" class="btn btn-primary view-inv-btn">View Invoice</a>
									</div>
								</div>
							</div>
							<!-- /Success Card -->
							
						</div>
					</div>
					
				</div>
			</div>		
			<!-- /Page Content -->
			<?php include('footer.php') ?>
			<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
</body>
</html>