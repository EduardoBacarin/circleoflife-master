<?php
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>
    <!-- Main bar -->
    <div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-home"></i>Create CoL Areas</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Create CoL Areas</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->
      <form class="form-horizontal" role="form" id="createCol" name="createCoL" action="<?php echo $portal_path;?>account/createCoL" method="POST">
      <!-- Matter -->
      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">Circle of Live Areas</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Description</label>
                     <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="CoL Area Name" name="description" value="">
                      </div>
                    </div>
                    <?php echo form_error('fname');?>
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