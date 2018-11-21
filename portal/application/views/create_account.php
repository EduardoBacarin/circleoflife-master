<?php
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>
    <!-- Main bar -->
    <div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-home"></i> Create Account</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Create Account</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->
      <form class="form-horizontal" role="form" id="placeOrder" name="placeOrder" action="<?php echo $portal_path;?>account/createAccount" method="POST">
      <input type="hidden" name="lead_id" value="<?php echo $lead['id']; ?>">
      <input type="hidden" name="salesRep_id" value="<?php echo $lead['salesRep_id']; ?>">
      <input type="hidden" name="lead_point" value="<?php echo $lead['point'] ?>" />
      <!-- Matter -->
	    <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">Legal Representative</div>
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
                        <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo $lead['fname']; ?>">
                      </div>
                    </div>
                    <?php echo form_error('fname');?>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Last Name</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $lead['lname']; ?>">
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
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>  

            </div>

            <div class="col-md-6">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">New Account Information</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Number of Branches</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Number of Branches" name="rfcNumber" value="">
                      </div>
                    </div>
                    <?php echo form_error('rfcNumber');?>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Tax ID Number</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Tax ID Number" name="taxNumber" value="">
                      </div>
                    </div>
                    <?php echo form_error('taxNumber');?>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">WebSite</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Website" name="website">
                      </div>
                    </div>
                    <?php echo form_error('website');?>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-6">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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

          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Company Information</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd invoice">
                    
                    <div class="row">

                      <div class="col-md-6">
                        <h4 align="center"> <strong>Billing Address</strong></h4>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Company Name</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Company Name" name="bcompany" id="bcompany" value="<?php echo $lead['name']; ?>">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address" name="baddress1" id="baddress1" value="<?php echo $lead['address']; ?>">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address Complement" name="baddress2" id="baddress2" value="">
                                  </div>
                                </div>  
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">City</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="City" name="bcity" id="bcity" value="<?php echo $lead['city']; ?>">
                                  </div>
                                  <label class="col-lg-2 control-label">State</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="State" name="bstate" id="bstate" value="<?php echo $lead['state']; ?>">
                                  </div>
                                </div>
                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">ZIP</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Zip Code" name="bzip" id="bzip" value="<?php echo $lead['zip']; ?>">
                                  </div>
                
                                  <label class="col-lg-2 control-label">Country</label>
                                  <div class="col-lg-4">
                                    <select class="form-control" name="bcountry" id="bcountry">
                                    <?php
                                      if($countries!=FALSE){
                                        foreach($countries->result_array() as $row){
                                          echo '<option value="'.$row['code'].'"';
                                          if($lead['country'] == $row['code']) echo " selected";
                                          echo'>'.$row['country'].'</option>';
                                        }
                                      }
                                    ?>
                                    </select>
                                  </div>
                                </div>
                                  
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Phone</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="bphone" id="bphone" value="<?php echo $lead['phone']; ?>" >
                                  </div>
                                  
                  
                                </div>
                      </div>

                      <div class="col-md-6">
                        <h4 align="center"> <strong>Shipping Address</strong></h4>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Company Name</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Company Name" name="scompany" id="scompany" value="<?php echo $lead['name']; ?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address" name="saddress1" id="saddress1" value="<?php echo $lead['address']; ?>">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address Complement" name="saddress2" id="saddress2" value="">
                                  </div>
                                </div>  
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">City</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="City" name="scity" id="scity" value="<?php echo $lead['city']; ?>">
                                  </div>
                                  
                                  <label class="col-lg-2 control-label">State</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="State" name="sstate" id="sstate" value="<?php echo $lead['state']; ?>">
                                  </div>
                                </div>
                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">ZIP</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Zip Code" name="szip" id="szip" value="<?php echo $lead['zip']; ?>">
                                  </div>
                
                                  <label class="col-lg-2 control-label">Country</label>
                                  <div class="col-lg-4">
                                    <select class="form-control" name="scountry" id="scountry">
                                      <?php
                                      if($countries!=FALSE){
                                        foreach($countries->result_array() as $row){
                                          echo '<option value="'.$row['code'].'"';
                                          if($lead['country'] == $row['code']) echo " selected";
                                          echo'>'.$row['country'].'</option>';
                                        }
                                      }
                                    ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Phone</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="sphone" id="sphone" value="<?php echo $lead['phone'] ?>">
                                  </div>
                                      
                                </div>                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>    
            </div>
          </div>
        </div>
    <!-- Bill To Matter ends -->
		  </div>

		<!-- Matter ends -->