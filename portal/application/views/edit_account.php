<?php 
	$theme_path = THEMEPATH;
	$portal_path = PORTALPATH;
?>

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left"><i class="fa fa-file-o"></i> Edit Account Credentials</h2>
        </h2>


        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Change Email & Password</a>
        </div>

        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container">

          <div class="row">

            <div class="col-md-12">


              <div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Change Login Credentials</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <br />
                    <!-- Form starts.  -->
					<form class="form-horizontal" role="form" id="editAccount" action="<?php echo $portal_path;?>account/edit_account" method="POST">
                              
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">New Email</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Email" name="newEmail">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">New Password</label>
                                  <div class="col-lg-5">
                                    <input type="password" class="form-control" placeholder="Password" name="newPassword">
                                  </div>
                                </div>
								
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Confirm Password</label>
                                  <div class="col-lg-5">
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="newPassword2">
                                  </div>
                                </div>

								<div class="form-group">
                                  <label class="col-lg-2 control-label">Current Email: </label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Current Email" name="cEmail" id="m2mUser">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Current Password</label>
                                  <div class="col-lg-5">
                                    <input type="password" class="form-control" placeholder="Current Password" name="cPass" id="m2mPass">
                                  </div>
                                </div>
								                <?php echo (!empty($error) ? $error."<br/>" : "").validation_errors();?>
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>  

            </div>

          </div>

        </div>
		  </div>

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->
