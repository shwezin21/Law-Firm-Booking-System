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
if(isset($_GET['lawyerid']))
{
	$lawyerid=$_GET['lawyerid'];
	$delete="DELETE FROM lawyer
	         WHERE lawyerid='$lawyerid'";
	$deletequery=mysqli_query($connect,$delete);
	if($deletequery)
	{
		echo "<script>alert('Delete Sucessfully')</script>";
	}
}
  if(isset($_POST['btnupload']))
  {
    $name=$_POST['txtname'];
     $sectorid=AutoID('sector','sectorid','sector_',6);
  $avatar = $_FILES['fileavatar']['name']; 
  if($avatar)
     {
      $folder= "assets/img/";
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
        <title>Justice For You - Lawyer Page</title>
	
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
							<li class="active"> 
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
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
 
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Lawyer</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="admindashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">lawyermanage</li>
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
													<th>LawyerName</th>
													<th>Speciality</th>
									                <th>Rating</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
	
                                          <?php 
                                                            
                                                                  $Select = "SELECT * FROM 
                                                                  sector s RIGHT OUTER JOIN lawyer l
                                                                  on s.sectorid=l.sectorid";
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
			                                                   
			                                                       
                     
			                                                       
                     


                     
                                                                echo "<td class='text-right'>
				                                                    <div class='actions'>
				                                                    <a class='btn btn-sm bg-success-light'  href='sectormanage.php?id=$lawyerid'>
				                                                    <img src='assets/img/manageicon.png' width='30px'>Manage
				                                                    </a>
			                                                       <a  href='lawyermanage.php?lawyerid=$lawyerid' class='btn btn-sm bg-danger-light'>
				                                                    <i class='fe fe-trash'></i> Delete
			                                                         </a>
			                                                        </div>
			                                                       </td>
                                                                   </tr>";

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

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/specialities.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:51 GMT -->                                                </html>
s