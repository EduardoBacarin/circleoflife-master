<?php
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>

<!-- Main bar -->
<div class="mainbar">
      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-o"></i><?php if(isset($header)){ echo $header['Page'];}else{ echo "View Customer";}  ?></h2>
        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a>
          <!-- Divider -->
          <span class="divider">/</span>
          <a href="#" class="bread-current"><?php if(isset($header)){ echo $header['Page'];}else{ echo "View Customer";}  ?> </a>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- Page heading ends -->
      <!-- Matter -->
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Customer Summary</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd invoice">
                    <div class="row">
                      <!-- Lumar Motta - Fixing " -->
                      <form class="form-horizontal" role="form" id="editAccount" name="editAccount" action="<?php echo $portal_path;?>account/edit_account" method="POST">
                      <!-- Lumar End -->
                        <input type="hidden" name="customer_id" value="<?php echo $customer->id; ?>"/>
                        <input type="hidden" name="salesRep_id" value="<?php echo $customer->sales_rep; ?>"/>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-5">
                              <input type="text" class="form-control" name="f_name" id="f_name" value="<?php echo $customer->f_name; ?>" placeholder="First Name" >
                              <?php echo '<font color="red">'.form_error('f_name').'</font>'; ?>
                            </div>
                            <div class="col-lg-5">
                              <input type="text" class="form-control" name="l_name" id="l_name" value="<?php echo $customer->l_name; ?>" placeholder="Last Name" >
                              <?php echo '<font color="red">'.form_error('l_name').'</font>'; ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                              <input type="text" class="form-control" name="email" id="email" value="<?php echo $customer->email; ?>" placeholder="First Name" >
                              <?php echo '<font color="red">'.form_error('email').'</font>'; ?>
                            </div>
                          </div>

                          <?php 
                          if($this->session->email === $customer->email){
                            echo '
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-3">
                              <input type="password" class="form-control" name="password" id="password" value="" placeholder="Current">
                            </div>        
                            <div class="col-lg-3">
                                  <input type="password" class="form-control" name="newpassword" id="newpassword" value="" placeholder="New">
                            </div>      
                            <div class="col-lg-3">
                              <input type="password" class="form-control" name="cpassword" id="cpassword" value="" placeholder="Reenter">
                            </div><font color="red">'.
                            form_error('password').'</font>     
                          </div>
                            ';
                          }
                          ?>
                        </div>
                        <button type="submit" name="editCustomer" value="editCustomer" class="btn btn-sm btn-info">Update</button> 
                      </form>
                      <form class="form-horizontal" role="form" id="placeOrder" name="placeOrder" action="<?php echo $portal_path; ?>main/placeorder/usa" method="POST">
                          <!--<input  form="placeOrder" type="hidden" name="customer_id" value="<?php echo $customer->id; ?>" />-->
                          <input  form="placeOrder" type="hidden" name="salesRep_id" value="<?php echo $customer->sales_rep; ?>" />
                          <button form="placeOrder" type="submit" name="placeOrder"  value="PlaceOrder" class="btn btn-sm btn-primary">Place Order</button>
                      </form>




                    <hr />  
                          <div class="col-md-12">
                            <div class="form-group">
                              <form class="form-horizontal" role="form" id="printNDA" name="printNDA" action="<?php echo $portal_path; ?>main/printNDA/usa" method="POST">
                                  <input  type="hidden" name="customer_id" value="<?php echo $customer->id; ?>"/>
                                  <button type="submit" name="PrintNDA"   value="PrintNDA" class="btn btn-sm btn-primary">Print NDA</button>
                                  <button type="submit" name="PrintAgree"  value="PrintAgree" class="btn btn-sm btn-primary">Print Agreement</button>
                              </form>
                            </div>
                          </div>  

                          <?php
                            $info  = "Click on Next Tab to see Contracts";
                            $nda1  = $contractNDA;
                            $agree1 = $contractAgree1 ;
                            $agree2 = $contractAgree2 ;
                          ?>


                          <?php  
                            if($user_type=="Admin" || $user_type=="Sales"){  
                              
                              echo '<div class="col-md-12">
                                <div class="form-group">
                                  <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#info" data-toggle="tab">Info</a></li>
                                    <li><a href="#nda1" data-toggle="tab">NDA</a></li>
                                    <li><a href="#agree1" data-toggle="tab">Agreement 1</a></li>
                                    <li><a href="#agree2" data-toggle="tab">Agreement 2</a></li>
                                  </ul>
                                  <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="info">
                                      <p>'.$info.'</p>
                                    </div>
                                    <div class="tab-pane fade" id="nda1">
                                      <p>
                                        <textarea style="resize:none" class="form-control" rows="25" id="nda" name="nda" align="center" readonly >'.$nda1.'
                                        </textarea>
                                      </p>
                                    </div>
                                    <div class="tab-pane fade" id="agree1">
                                      <p><textarea style="resize:none" class="form-control" rows="25" id="contract1" name="contract1" align="center" readonly >'.$agree1.'</textarea></p>
                                    </div>
                                    <div class="tab-pane fade" id="agree2">
                                      <p><textarea style="resize:none" class="form-control" rows="25" id="contract2" name="contract2" align="center" readonly >'. $agree2.'</textarea></p>
                                    </div>
                                  </div>
                                </div>
                              </div>';
                            }else {
                              echo '
                              <div class="col-md-12">
                                <div class="form-group">
                                  <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#info" data-toggle="tab">Info</a></li>
                                    <li><a href="#nda1" data-toggle="tab">NDA</a></li>
                                    <li><a href="#agree1" data-toggle="tab">Agreement</a></li>
                                  </ul>
                                  <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="info">
                                      <p>'.$info.'</p>
                                    </div>
                                    <div class="tab-pane fade" id="nda1">
                                      <p>
                                      <textarea style="resize:none" class="form-control" rows="25" id="nda" name="nda" align="center" readonly >'.$nda1.'</textarea>
                                      </p>
                                    </div>
                                    <div class="tab-pane fade" id="agree1">
                                      <p><textarea style="resize:none" class="form-control" rows="25" id="contract" name="contract" align="center" readonly >'.$agree1.'</textarea></p>
                                    </div>
                                  </div>
                                </div>
                              </div>';
                            }  
                          ?>  
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Lumar Motta Add Widget to Maps - 05/19/2018 -->              

            <div class="row">
              <div class="col-md-12">
                <div class="widget">
                  <div class="widget-head">
                    <div class="pull-left">Map  </div>
                      <div class="widget-icons pull-right">
                        <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                      <div class="padd invoice">
                        <div class="row">
                          <?php
                            if($customer_company->point != NULL && $customer_company->point != "" && $customer_company->point != ","){
                              $start = strpos($customer_company->point, ",");
                              $lng = substr($customer_company->point, 0, $start);
                              $end = strrpos($customer_company->point, ",");
                              $lat = substr($customer_company->point, $start+1, $end-($start+1));
                            }else{
                              //CURRENTLY WORKING HERE
                              //HERE ADD FUNCTION TO GEOLOCATE AND ADD POINT TO DATABASE
                            }
                          ?>
                          <div id="map">

                            <script>
                              function initMap() {
                                var uluru = {lat: <?php echo $lat; ?>, lng: <?php echo $lng;?>};
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  zoom: 15,
                                  center: uluru
                                });
                                var marker = new google.maps.Marker({
                                  position: uluru,
                                  map: map
                                });
                              }
                            </script>
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGYYE-fKAdzEErv_4Pu5Ic8pGEBsr0UK8&callback=initMap"></script>
                          </div>
                        </div>
                      </div>
                    </div>      
                  </div>
                </div>
              </div>
            </div>
            <!-- Lumar Motta Add Widget to Maps - 05/19/2018 -->              

            <div class="row">
              <div class="col-md-12">
                <div class="widget">
                  <div class="widget-head">
                    <div class="pull-left">Billing & Shipping Information  </div>
                      <div class="widget-icons pull-right">
                        <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                      <div class="padd invoice">
                        <div class="row">
                          <div class="col-md-6">
                            <form class="form-horizontal" role="form" id="editCompany" name="editCompany" action="<?php echo $portal_path;?>account/edit_Company" method="POST">
                            <input type="hidden" name="customer_id" value="<?php echo $customer->id; ?>"/>
                            <input type="hidden" name="salesRep_id" value="<?php echo $customer->sales_rep; ?>"/>
                            <div class="form-group">
                              <h4><strong>Billing Address</strong></h4>
                              <label class="col-lg-2 control-label">Company Name</label>
                              <div class="col-lg-5">
                                <input type="text" class="form-control" name="company" id="company" value="<?php echo $customer_company->name; ?>" placeholder="Company Name" >
                              </div>
                              <?php echo '<font color="red">'.form_error('company').'</font>'; ?>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Address</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="address1" id="address1" value="<?php echo $customer_company->address; ?>" placeholder="Address">
                                <?php echo '<font color="red">'.form_error('address1').'</font>'; ?>
                                <input type="text" class="form-control" name="address2" id="address2" value="<?php echo $customer_company->address2; ?>" placeholder="Address complement">
                                <?php echo '<font color="red">'.form_error('address2').'</font>'; ?>
                              </div>
                              <label class="col-lg-2 control-label">City</label>
                              <div class="col-lg-4">
                                <input type="text" class="form-control" name="city" id="city" value="<?php echo $customer_company->city; ?>" placeholder="City">
                                 <?php echo '<font color="red">'.form_error('city').'</font>'; ?>
                              </div>
                              <label class="col-lg-2 control-label">State</label>
                              <div class="col-lg-4">
                                <input type="text" class="form-control" name="state" id="state" value="<?php echo $customer_company->state; ?>" placeholder="State">
                                 <?php echo '<font color="red">'.form_error('state').'</font>'; ?>
                              </div>
                              <label class="col-lg-2 control-label">Zip</label>
                              <div class="col-lg-4">
                                <input type="text" class="form-control" name="zip" id="zip" value="<?php echo $customer_company->zip; ?>" placeholder="Zip Code">
                                 <?php echo '<font color="red">'.form_error('zip').'</font>'; ?>
                              </div>
                              <label class="col-lg-2 control-label">Country</label>
                              <div class="col-lg-4">
                                <select class="form-control" name="country" id="country">
                                <?php
                                  if($countries!=FALSE){
                                    foreach($countries->result_array() as $row){
                                      echo '<option value="'.$row['code'].'"';
                                      if($row['code'] == $customer_company->country) {echo 'selected="selected"';}
                                      else if(($customer_company->country == null || $customer_company->country == "") && $row['code'] == $geoplugin->countryCode){ echo 'selected="selected"';
                                    }
                                      echo '>'.$row['country'].'</option>';
                                    }  
                                  }
                                ?>
                                </select>
                                <?php echo '<font color="red">'.form_error('country').'</font>';?>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Phone</label>
                              <div class="col-lg-4">
                                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $customer_company->phone; ?>" placeholder="Phone">
                                <?php echo '<font color="red">'.form_error('phone').'</font>'; ?>
                              </div>
                              <label class="col-lg-2 control-label">Website</label>
                              <div class="col-lg-4">
                                <input type="text" class="form-control" name="website" id="website" value="<?php echo $customer_company->website; ?>" placeholder="Website">
                                <?php echo '<font color="red">'.form_error('website').'</font>'; ?>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-lg-2 control-label">RFC</label>
                              <div class="col-lg-4">
                                <input type="text" class="form-control" name="rfc" id="rfc" value="<?php echo $customer_company->rfc; ?>" placeholder="RFC">
                                <?php echo '<font color="red">'.form_error('rfc').'</font>'; ?>
                              </div>
                              <label class="col-lg-2 control-label">Tax ID</label>
                              <div class="col-lg-4">
                                <input type="text" class="form-control" name="taxid" id="taxid" value="<?php echo $customer_company->taxid; ?>" placeholder="Tax ID">
                                <?php echo '<font color="red">'.form_error('taxid').'</font>'; ?>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-lg-6 control-label">Use same Address for Shipping?
                                <input type="checkbox" name="copyShipping" id="copyShipping" value="yes">Yes
                              </label>
                            </div>

                            <div class="form-group">
                              <div class="col-lg-offset-2 col-lg-6">
                                <button type="submit" name="update" value="Update" class="btn btn-sm btn-info">Update</button>
                              </div>
                            </div>
                            <?php echo validation_errors();?>
                          </form>
                        </div>
                        <div class="col-md-6">
                          <form class="form-horizontal" role="form" id="editship" name="editship" action="<?php echo $portal_path;?>account/edit_shipping" method="POST">
                            <input type="hidden" name="customer_id" value="<?php echo $customer->id; ?>"/>
                            <input type="hidden" name="salesRep_id" value="<?php echo $customer->sales_rep; ?>"/>
                            <div class="form-group">
                              <h4><strong>Shipping Address</strong></h4>
                            </div>
                            <div class="form-group">
                              <label class="col-lg-2 control-label">Address</label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" name="address1" value="<?php echo $shipping_info->address; ?>" placeholder="Address">
                                <input type="text" class="form-control" name="address2" value="<?php echo $shipping_info->address2; ?>" placeholder="Address complement">
                              </div>
                              <label class="col-lg-2 control-label">City</label>
                              <div class="col-lg-4">
                                <input type="text" class="form-control" name="city" value="<?php echo $shipping_info->city; ?>" placeholder="City">
                              </div>
                              <label class="col-lg-2 control-label">State</label>
                              <div class="col-lg-4">
                                <input type="text" class="form-control" name="state" value="<?php echo $shipping_info->state; ?>" placeholder="State">
                              </div>
                              <label class="col-lg-2 control-label">Zip</label>
                              <div class="col-lg-4">
                                <input type="text" class="form-control" name="zip" value="<?php echo $shipping_info->zip; ?>" placeholder="Zip">
                              </div>
                              <label class="col-lg-2 control-label">Country</label>
                              <div class="col-lg-4">
                                <select class="form-control" name="country" id="country">

                                <?php

                                  if($countries!=FALSE){
                                    foreach($countries->result_array() as $row){
                                      echo '<option value="'.$row['code'].'"';
                                      if($row['code'] == $shipping_info->country) {echo 'selected="selected"';}
                                      else if(($shipping_info->country == null || $shipping_info->country == "") && $row['code'] == $geoplugin->countryCode){ echo 'selected="selected"';
                                    }
                                      echo '>'.$row['country'].'</option>';
                                    }
                                  }
                                ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-lg-2 control-label">Phone</label>
                              <div class="col-lg-4">
                                <input type="text" class="form-control" name="phone" value="<?php echo $shipping_info->phone; ?>" placeholder="Phone">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-lg-offset-2 col-lg-6">
                                <button type="submit" name="update" value="Update" class="btn btn-sm btn-info">Update</button>
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
            <!-- End Lumar Add Widget to Billing and Shipping - 05/19/2018 -->              








                    <div class="row">
                      <div class="col-md-12">
                        <div class="widget-content">
                          <div class="padd">
                            <div class="widget">
                              <div class="widget-head">
                                <div class="pull-left">Customer Order History</div>
                                <div class="widget-icons pull-right">
                                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                              <div class="widget-content">
                                <div class="padd">

                                  <div class="error-log">
                                    <ul>
                                    <?php
                                      if($log){
                                        foreach($log as $line){
                                          echo " <a href='".$portal_path."order/viewOrder/".$line['id']."'><li><b>Order #: ".$line['id']." - Date: ".$line['date']." - Total: $".$line['order_total']."  - Note: ".$line['notes']."</b></li></a>";
                                        }
                                      }
                                    ?>
                                      <!-- Use class "green" or "red" to add color -->
                                      <!--<li><span class="green">[Tue Jan 11 17:32:52 2013]</span> <span class="red">[error]</span> [google 123.124.2.2] client denied by server: /export/home/macadmin/testdoc</li>   -->
                                    </ul>
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
            </div>
            <div class="widget-foot">
              <div class="clearfix">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Matter ends -->
    <!-- Mainbar ends -->
   <div class="clearfix"></div>

<!-- Content ends -->

<!-- User JavaScript starts -->
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
$("#delete").click(function( event ) {
  var submit = confirm("Are you sure you want to delete this customer?");
  if( submit == false){
    event.preventDefault();
  }
});
</script>