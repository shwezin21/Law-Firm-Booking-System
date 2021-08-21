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
    $slottime1=$_POST['slot1'];
    $slottime2=$_POST['slot2'];
   $slotid=AutoID('availableslot','slotid','slot_',6);
   $slquery="SELECT * FROM availableslot
            WHERE slotstart='$slottime1'
            AND slotend='slottime2'";
   $slresult=mysqli_query($connect, $slquery);
   $row =mysqli_num_rows($slresult);
if($row>0)
   {
    echo "<script>alert('Slot time already exists.Please type another slot time')</script>";
     } 
      if(!$error)  
  {
    $insert="INSERT INTO availableslot
             (`slotid`,`slotstart`, `slotend`) VALUES ('$slotid','$slottime1','$slottime2')";
    $run=mysqli_query($connect,$insert);
    if ($run) {
      echo "<script>
         alert ('Successfully Upload');
         </script>";

    }
    else
    {
      echo mysqli_error($connect);
    }
  }
  }

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Time Slot</title>
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
</head>
<body>
  <?php include('adminheader.php') ?>
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
                            <li class="active"> 
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
      <!-- Page Wrapper -->
        <div class="main-wrapper">
    
      <!-- Header -->
 
      
      <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
        
          <!-- Page Header -->
          <div class="page-header">
            <div class="row">
              <div class="col-sm-7 col-auto">
                <h3 class="page-title">Time Slot</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="admindashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active">Time Slot</li>
                </ul>
              </div>
              <div class='col-sm-5 col'>
                <a href='#Add_Specialities_details' data-toggle='modal' class='btn btn-primary float-right mt-2'>Add</a>
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
                          <th>Slot Start</th>
                          <th>Slot End</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody id="table">
                      
                      <?php 
                                           
                                               
                                             
                                                    $Select = "SELECT * FROM availableslot";
                                              $run1 = mysqli_query($connect,$Select);
                                              $count=mysqli_num_rows($run1);
                                              for ($i=0; $i <$count ; $i++) { 
                                              $data = mysqli_fetch_array($run1);
                                              $slotid = $data[0];
                                              $slotstart= $data[1];
                                              $slotend=$data[2];
                                              echo "<tr>
                                              <td> $slotid </td>
                                              <td>$slotstart</td>
                                              <td>$slotend</td>
                                               
                                             <td class='text-right'>
                                               <div class='actions'>
                                                <a class='btn btn-sm bg-success-light'  href='slotedit.php?id=$slotid'>
                                            <i class='fe fe-pencil'></i> Edit
                                            </a>   
                                                 <a   href='slotdelete.php?id=$slotid' class='btn btn-sm bg-danger-light'>
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
      <div class='modal fade' id='Add_Specialities_details' aria-hidden='true' role='dialog'>
        <div class='modal-dialog modal-dialog-centered' role='document' >
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title'>Add Timeslot</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
                <form action='timeslot.php' method='POST' enctype='multipart/form-data'>
                <div class='row form-row'>
                   <div class="col-12 col-md-6">
                    <div class='form-group'>

                      <label>Start Time </label>
                       <input type='text' name='slot1' class='form-control' required>
                     </div>
                   </div>
                    <div class="col-12 col-md-6">
                     <div class='form-group'>
                        <label> End Time  </label>
                     <input type='text' name='slot2' class='form-control' required>
                    </div>
                     </div>
                </div>
                 <input type='submit' name='btnupload' value='Upload' class='btn btn-primary btn-block'>
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