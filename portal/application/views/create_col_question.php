<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>
    <!-- Main bar -->
    <div class="mainbar">
      
      <!-- Page heading -->
      <div class="page-head">
        <!-- Page heading -->
        <h2 class="pull-left"><i class="fa fa-file-o"></i>CoL Question </h2>
        </h2>


        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="fa fa-home"></i> Create</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">CoL Question</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->


      <!-- Matter -->
      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">CoL Question  </div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    <br />
                    <!-- Form starts.  -->
                    <form class="form-horizontal" role="form" id="createCoL" name="createCoL" action="<?php echo $portal_path;?>account/create_col" method="POST">                                                
                        <div class="form-group">
                          <label class="col-lg-2 control-label">CoL Area</label>
                          <div class="col-lg-2">
                            <select class="form-control" id="description" name="description">
                              <?php
                                if($col_areas!=FALSE){
                                  foreach($col_areas->result_array() as $row){
                                    echo '<option value="'.$row['id'].'>'.$row['description'].'</option>';
                                  }  
                                }
                              ?>
                          </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Question Number</label>
                          <div class="col-lg-2">
                            <input type="text" class="form-control" placeholder="CoL Question #" id="description" name="description" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Question Description</label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Question Description" id="description" name="description">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Comments</label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="CoL Comments" id="notes" name="notes">
                          </div>
                        </div>
                                
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-12">
                            <!-- Form Calls -->
                              <input  form="createCoL" type="hidden" name="user_type" value="Admin">
                              <button form="createCoL" id="createCoL" type="submit" name="createCoL"  value="createCoL"  class="btn btn-sm btn-primary">Create</button>

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