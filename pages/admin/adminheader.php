	<?php 
      $connect=mysqli_connect('localhost','root','','justiceforyoudb');

	 ?>
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="adminprofile.php" class="logo">
						Justice For You
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="<?php echo $adavatar ?>" width="35px" alt="<?php echo $adname ?>"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img class="rounded-circle" src="<?php echo $adavatar ?>" width="45px" alt="<?php echo $adname ?>">
								</div>
								<div class="user-text">
									<h6><?php echo $adname ?></h6>
									<p class="text-muted mb-0"><?php echo $adposition ?></p>
								</div>
							</div>
							<a class="dropdown-item" href="adminprofile.php">My Profile</a>
							<a class="dropdown-item" href="adminchangepassword.php">Change Password</a>
							<a class="dropdown-item" href="../logout.php">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
		
			