<?php
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>
    <!-- Main bar -->
    <div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-home"></i> Create Coach Account</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Create Coach Account</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->
      <form class="form-horizontal" role="form" id="createSalesRep" name="createSalesRep" action="<?php echo $portal_path;?>account/createSalesAccount" method="POST">
      <!-- Matter -->
      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">Coachs</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">
                    <div class="form-group">
                      <label class="col-lg-3 control-label">First Name</label>
                     <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="First Name" name="fname" value="">
                      </div>
                    </div>
                    <?php echo form_error('fname');?>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Last Name</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Last Name" name="lname" value="">
                      </div>
                    </div>
                    <?php echo form_error('lname');?>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Email</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Customer Email" name="email">
                      </div>
                    </div>
                    <?php echo form_error('email');?>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-6">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>  
            </div>
          </div>
        </div>
    <!-- Bill To Matter ends -->
      </div>

    <!-- Matter ends -->