<?php 
	$theme_path = THEMEPATH;
	$portal_path = PORTALPATH;
?>

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left"><i class="fa fa-file-o"></i>Company Information</h2>
        </h2>


        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Edit Company Information</a>
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
                  <div class="pull-left">Edit Company Contact Information</div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <br />
					<!-- Form starts.  -->
					<form class="form-horizontal" role="form" id="editCompany" action="<?php echo $portal_path;?>account/edit_company" method="POST">
                              
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Company Name</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Company Name" name="company" id="company" value="<?php echo $company->row()->name; ?>">
                                  </div>
								  <?php echo form_error('company'); ?>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Address" name="address1" id="address1" value="<?php echo $company->row()->address; ?>">
                                  </div>
								  <?php echo form_error('address1'); ?>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Address Complement" name="address2" id="address2" value="<?php echo $company->row()->address2; ?>">
                                  </div>
                  <?php echo form_error('address2'); ?> 
                                </div>               

								                <div class="form-group">
                                  <label class="col-lg-2 control-label">City</label>
                                  <div class="col-lg-2">
                                    <input type="text" class="form-control" placeholder="City" name="city" id="city" value="<?php echo $company->row()->city; ?>">
                                  <?php echo form_error('city'); ?> 
                                  </div>
								                  <label class="col-lg-1 control-label">State</label>
                                  <div class="col-lg-2">
                                    <input type="text" class="form-control" placeholder="State" name="state" id="state" value="<?php echo $company->row()->state; ?>">
                                    <?php echo form_error('state'); ?> 
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">ZIP</label>
                                  <div class="col-lg-2">
                                    <input type="text" class="form-control" placeholder="Zip Code" name="zip" id="zip" value="<?php echo $company->row()->zip; ?>">
                                  </div>
								
                                  <label class="col-lg-1 control-label">Country</label>
                                  <div class="col-lg-2">
                                    <select class="form-control" name="country" id="country">
									<?php
                    if($countries!=FALSE){
                      foreach($countries->result_array() as $row){
                        echo '<option value="'.$row['code'].'"';
                        if($row['code'] == $company->row()->country) {echo 'selected="selected"';}
                        else if(($company->row()->country == null || $company->row()->country == "") && $row['code'] == $geoplugin){ echo 'selected="selected"';}
                        echo '>'.$row['country'].'</option>';
                      }  
                    }
									?>
                                    </select>
                                  </div>
                                </div>
																	
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Phone</label>
                                  <div class="col-lg-2">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone" id="phone" value="<?php echo $company->row()->phone;?>">
                                  </div>
								  <label class="col-lg-1 control-label">Website</label>
                                  <div class="col-lg-2">
                                    <input type="text" class="form-control" placeholder="Website" name="website" id="website" value="<?php echo $company->row()->website;?>">
                                  </div>
                                </div>
								
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">Use same address for shipping?</label>
                                  <div class="col-lg-5">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" name="copyShipping" id="copyShipping" value="yes"> Yes
                                    </label>
                                  </div>
                                </div>                          
                                <?php echo validation_errors();?>
                                <div class="form-group">
                                  <div class="col-lg-offset-4 col-lg-6">
                                    <button type="submit" id="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
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

