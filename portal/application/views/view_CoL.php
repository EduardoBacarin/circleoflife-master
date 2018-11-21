<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>
    <!-- Main bar -->
    <div class="mainbar">
      
      <!-- Page heading -->
      <div class="page-head">
        <!-- Page heading -->
        <h2 class="pull-left"><i class="fa fa-file-o"></i><?php echo " ".$CoL->description ?> - CoL Area</h2>
        </h2>


        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="fa fa-home"></i> View / Edit</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">CoL Area</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->


      <!-- Matter -->
      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">CoL Area Id <?php echo $CoL->id; ?></div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    <br />
                    <!-- Form starts.  -->
                    <form class="form-horizontal" role="form" id="editCoL" name="editCoL" action="<?php echo $portal_path;?>account/edit_col" method="POST">                                                
                        <div class="form-group">
                          <label class="col-lg-4 control-label">Description</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="CoL Name" id="description" name="description" value="<?php echo $CoL->description; ?>" >
                          </div>
                        </div>
                                
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-12">
                            <!-- Form Calls -->
                              <input  form="editCoL" type="hidden" name="user_type" value="Admin">
                              <input  form="editCoL" type="hidden" name="col_id"    value="<?php echo $CoL->id; ?>">
                              <button form="editCoL" id="editCoL" type="submit" name="editCoL"  value="editCoL"  class="btn btn-sm btn-primary">Update</button>
                              <button form="editCoL" id="editCoL" type="submit" name="DeactCoL" value="DeactCoL" class="btn btn-sm btn-danger">Deactivate</button>


                            <!--<button type="button" class="btn btn-sm btn-success">Success</button>
                            <button type="button" class="btn btn-sm btn-warning">Warning</button>
                            <button type="button" class="btn btn-sm btn-info">Info</button>
                            <button type="button" class="btn btn-sm btn-danger">Danger</button>-->
                          </div>
                        </div>    
                      </form>
                  </div>
                </div>
              </div>
            </div>


    <!-- Matter ends -->
          </div>
        </div>
          <!-- Mainbar ends -->
         <div class="clearfix"></div>
      </div>
      <!-- Content ends -->
      </div>