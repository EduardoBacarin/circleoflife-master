<?php
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>
    <!-- Main bar -->
    <div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-home"></i> Create Customer Account</h2>

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
      <form class="form-horizontal" role="form" id="createCustomerAcc" name="createCustomerAcc" action="<?php echo $portal_path;?>account/createCustomerAccount" method="POST">
      <?php
      $fname = "";
      $lname = "";
      $country = "";
      $phone = "";

      if(isset($lead['id']))
      {
        echo '<input type="hidden" name="lead_id" value="'.$lead['id'].'">';
        echo '<input type="hidden" name="salesRep_id" value="'.$lead['salesRep_id'].'">';
        echo '<input type="hidden" name="lead_point" value="'.$lead['point'].'" />';
        $fname = $lead['fname'];
        $lname = $lead['lname'];
        $country = $lead['country'];
        $phone = $lead['phone'];
      }else if ($user_type == "Sales"){
         echo '<input type="hidden" name="salesRep_id" value="'.$id.'">';
      }
      ?>
      <!-- Matter -->
      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">Personal Information</div>
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
                        <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo $fname; ?>">
                        <?php echo form_error('fname');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Last Name</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>">
                        <?php echo form_error('lname');?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Email</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Customer Email" name="email">
                        <?php echo form_error('email');?>
                      </div>
                    </div>

                    <!-- Lumar Motta - Addin Field Password 05/19/2018 -->
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Password</label>
                      <div class="col-lg-9">
                         New
                        <input type="password" class="form-control" placeholder="Password" name="password">
                         reenter
                        <input type="password" class="form-control" placeholder="Password" name="repassword">
                        <?php echo form_error('password');?>
                      </div>
                    </div>
                    <!-- End Lumar -->

                    <?php
                    if($user_type=="Admin"){
                      if($salesRep!=FALSE){
                        if($salesRep->num_rows > 1){
                          echo '
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Sales Rep</label>
                        <div class="col-lg-9">
                        <select class="form-control" placeholder="Sales Representative" name="salesRep_id" id="salesRep_id" >
                          <option>Select Sales Representative</option>';
                          foreach($salesRep->result_array() as $row){
                            echo '<option value="'.$row['id'].'">'.$row['f_name'].' '.$row['l_name'].'</option>';
                          }
                          echo '
                        </select>'.form_error('rfcNumber').'
                        </div>
                      </div>';
                        }
                      }
                    }
                    ?>
                  </div>
                </div>    
              </div>  
            </div>
            <!--
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
                        <input type="text" class="form-control" placeholder="Tax ID Number" name="taxid" value="">
                      </div>
                    </div>
                    <?php echo form_error('taxid');?>
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
              </div>  
            </div>
            -->
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
                                    <input type="text" class="form-control" placeholder="Company Name" name="bcompany" id="bcompany" value="">
                                    <?php echo form_error('bcompany');?>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address" name="baddress1" id="baddress1" value="">
                                    <?php echo form_error('baddress1');?>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address Complement" name="baddress2" id="baddress2" value="">
                                    <?php echo form_error('baddress2');?>
                                  </div>
                                </div>  
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">City</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="City" name="bcity" id="bcity" value="">
                                    <?php echo form_error('bcity');?>
                                  </div>
                                  <label class="col-lg-2 control-label">State</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="State" name="bstate" id="bstate" value="">
                                    <?php echo form_error('bstate');?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">ZIP</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Zip Code" name="bzip" id="bzip" value="">
                                    <?php echo form_error('bzip');?>
                                  </div>
                
                                  <label class="col-lg-2 control-label">Country</label>
                                  <div class="col-lg-4">
                                    <select class="form-control" name="bcountry" id="bcountry">
                                    <?php
                                      if($countries!=FALSE){
                                        foreach($countries->result_array() as $row){
                                          echo '<option value="'.$row['code'].'"';
                                          if($row['code'] == $geoplugin){ echo 'selected="selected"';
                                        }
                                          echo '>'.$row['country'].'</option>';
                                        }  
                                      }
                                    ?>
                                    </select>
                                    <?php echo form_error('bcountry');?>
                                  </div>
                                </div>
                                
                                <label class="col-lg-2 control-label">Phone</label>
                                <div class="col-lg-4">
                                  <input type="text" class="form-control" placeholder="Phone Number" name="bphone" id="bphone" value="" >
                                  <?php echo form_error('bphone');?>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-5 control-label">Use same address for shipping?</label>
                                  <div class="col-lg-1">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" name="copyShipping" id="copyShipping" value="yes"> Yes
                                    </label>
                                  </div>
                                </div>
                      </div>

                      <div class="col-md-6">
                        <h4 align="center"> <strong>Shipping Address</strong></h4>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address" name="saddress1" id="saddress1" value="">
                                    <?php echo form_error('saddress1');?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address Complement" name="saddress2" id="saddress2" value="">
                                    <?php echo form_error('saddress2');?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">City</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="City" name="scity" id="scity" value="">
                                    <?php echo form_error('scity');?>
                                  </div>
                                  <label class="col-lg-2 control-label">State</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="State" name="sstate" id="sstate" value="">
                                    <?php echo form_error('sstate');?>
                                  </div>
                                </div>
                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">ZIP</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Zip Code" name="szip" id="szip" value="">
                                    <?php echo form_error('szip');?>
                                  </div>
                
                                  <label class="col-lg-2 control-label">Country</label>
                                  <div class="col-lg-4">
                                    <select class="form-control" name="scountry" id="scountry">
                                      <?php
                                      if($countries!=FALSE){
                                        foreach($countries->result_array() as $row){
                                          echo '<option value="'.$row['code'].'"';
                                          if($geoplugin == $row['code']) echo " selected";
                                          echo'>'.$row['country'].'</option>';
                                        }
                                      }
                                    ?>
                                    </select>
                                    <?php echo form_error('scountry');?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Phone</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="sphone" id="sphone" value="<?php echo $phone; ?>">
                                    <?php echo form_error('sphone');?>
                                  </div>
                                </div>  
                              </div>
                              <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-6">
                                  <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                              </div>
                            </form>                       
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