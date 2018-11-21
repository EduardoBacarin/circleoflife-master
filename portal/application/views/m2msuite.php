<?php 
	$theme_path = THEMEPATH;
	$portal_path = PORTALPATH;
?>

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
		<!-- Use class="fa fa-refresh fa-spin" to spin icon -->
	      <h2 class="pull-left"><i id="spinIcon_2" class="fa fa-refresh"></i> M2M Suite API</h2>
        </h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path;?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">M2M Suite API</a>
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
                  <div class="pull-left">Sync database with M2M Suite</div>
                  <div class="widget-icons pull-right">
                    <!-- <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> -->
                    <!-- <a href="#" class="wclose"><i class="fa fa-times"></i></a> -->
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <br />
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" id="m2mSync" action="<?php echo $portal_path;?>api/call_m2msuiteAPI" method="POST">
                              
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Please select date to process:</label>
                                  <div class="col-lg-5">
                                    <input type="date" class="form-control" name="date" id="date" value="" placeholder="mm/dd/yyyy">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Run Sync for every date: </label>
                                  <div class="col-lg-5">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" id="syncCheckbox" name="syncCheckbox" value="yes"> Yes
                                    </label>
                                  </div>
                                </div>

								<div class="form-group">
                                  <label class="col-lg-2 control-label">Username: </label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="M2M Suite Username" name="m2mUser" id="m2mUser">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Password</label>
                                  <div class="col-lg-5">
                                    <input type="password" class="form-control" placeholder="M2M Suite Password" name="m2mPass" id="m2mPass">
                                  </div>
                                </div>
								
								<?php echo validation_errors();?>
								
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                    <button type="submit" class="btn btn-sm btn-primary">Start Sync</button>
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

<!-- User JavaScript starts -->
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>

$("#m2mSync").submit(function( event ) {

	$("#spinIcon_1").attr("class", "fa fa-refresh fa-spin");
	$("#spinIcon_2").attr("class", "fa fa-refresh fa-spin");
	
	//event.preventDefault(); -> Stops submit form
});

</script>
<!-- User JavaScript ends -->