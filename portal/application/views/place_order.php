<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;



  if($user_type=="Admin"){
    $readOnly = "";
    $hidden = "";
  }else if($user_type=="Sales"){
    $readOnly = "";
    $hidden = "";
  }else if($user_type=="Reseller"){
    $readOnly = "readonly";
    $hidden = "hidden";
  }
?>

<!-- Main bar -->
<div class="mainbar">
      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-o"></i>Place Order <?php //echo ucfirst($warehouse); ?>
        </h2>
        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i>Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Place Order <?php //echo ucfirst($warehouse); ?> </a>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- Page heading ends -->

    <form class="form-horizontal" role="form" id="placeOrder" name="placeOrder" action="<?php echo $portal_path;?>order/placeorder" method="POST">
    <input type="hidden" name="account_id" id="account_id" value=""/>
    <input type="hidden" name="company_name" id="company_name" value=""/>
    <input type="hidden" name="order_ship_from" value="<?php echo $warehouse ?>"/>
      <!-- Lease Plans Matter -->
      <!-- 
      <div class="matter">
        <input type="hidden" id="LeaseItemsTotal" name="LeaseItemsTotal" value="0" />
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Lease Plans</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd invoice">
                    <div class="row">
                      <div class="col-md-12">
                        <hr />
                        <div class="table-responsive">
                          <table class="table table-striped table-hover table-bordered" id="leaseTable" name="leaseTable">
                            <thead>
                            <tr>
                              <th><input type="checkbox" name="selectall_lease_cbox" id="selectall_lease_cbox" value="selectall"></th>
                              <th>Plan Type</th>
                              <th>Data Limit</th>
                              <th>Carrier Option</th>
                              <th>Lease Type</th>
                              <th>Quantity</th>
                              <th>Activation Fee $</th>
                              <th>Recurring Cost $</th>
                              <th>First Payment Quantity</th>
                              <th>First Payment Total $</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>  
                              <td colspan="8"></td>
                              <td align="right"><strong>Total</strong></td>
                              <td align="right"><strong id="totalLease">$0.00</strong></td>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="widget-foot">
                    <div class="pull-right">
                      <button class="btn btn-info btn-sm" id="addLease" name="addLease" >Add Item</button> &nbsp; 
                      <button class="btn btn-default btn-sm" id="removeLease" name="removeLease" >Remove Selected</button>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        -->
    <!-- Lease Plans Matter ends -->
    
    <!-- Standard Purchase Matter -->
        <?php //echo validation_errors();?>
        <input type="hidden" id="StandardItemsTotal" name="StandardItemsTotal" value="0" />
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Standard Purchase</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd invoice">

                    <div class="row">

                      <div class="col-md-12">
                        <?php echo '<font color="red">'.form_error('StandardItemsTotal').'</font>';?>
                        <hr />
                        <div class="table-responsive">
                          <table class="table table-striped table-hover table-bordered" id="standardTable" name="standardTable">
                            <thead>
                            <tr>
                              <th><input type="checkbox" name="selectall_standard_cbox" id="selectall_standard_cbox" value="selectall"></th>
                              <th>Product Type</th>
                              <th>Item</th>
                              <th>Quantity</th>
                              <th>Unit Price $</th>
                              <th>Row Total $</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>  
                              <td colspan="4"></td>
                              <td align="right"><strong>Total</strong></td>
                              <td align="right"><strong id="totalStandard">$0.00</strong></td>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>

                    </div>

                  </div>
                  <div class="widget-foot">
                    <div class="pull-right">
                      <button class="btn btn-info btn-sm" id="addStandard" name="addStandard" >Add Item</button> &nbsp; 
                      <button class="btn btn-default btn-sm" id="removeStandard" name="removeStandard" onClick="return false;" >Remove Selected</button>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>  
              
            </div>
          </div>
        </div>

    <!-- Standard Purchase Matter ends -->
    
    <!-- Standard Purchase Matter -->
    <!--
        <input type="hidden" id="ConnectItemsTotal" name="ConnectItemsTotal" value="0" />
    
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Oigo Connect Data Plans</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd invoice">

                    <div class="row">

                      <div class="col-md-12">
                        <hr />
                        <div class="table-responsive">
                          <table class="table table-striped table-hover table-bordered" id="connectTable" name="connectTable">
                            <thead>
                            <tr>
                              <th><input type="checkbox" name="selectall_connect_cbox" id="selectall_connect_cbox" value="selectall"></th>
                              <th>Plan Type</th>
                              <th>Data Limit</th>
                              <th>Carrier Option</th>
                              <th>Billing Period</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Row Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>  
                              <td colspan="6"></td>
                              <td align="right"><strong>Total</strong></td>
                              <td align="right"><strong id="totalConnect">$0.00</strong></td>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>

                    </div>

                  </div>
                  <div class="widget-foot">
                    <div class="pull-right">
                      <button class="btn btn-info btn-sm" id="addConnect" name="addConnect" >Add Item</button> &nbsp; 
                      <button class="btn btn-default btn-sm" id="removeConnect" name="removeConnect" onClick="return false;">Remove Selected</button>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>  
              
            </div>
          </div>
        </div>

    <!-- Standard Purchase Matter ends -->
    
    <!-- Special Deals Matter -->
        <!--<div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Oigo Special Deals & Promotions</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> f
                    
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd invoice">

                    <div class="row">

                      <div class="col-md-12">
                        <hr />
                        <div class="table-responsive">
                          <table class="table table-striped table-hover table-bordered" id="specialTable" name="specialTable">
                            <thead>
                            <tr>
                              <th><input type="checkbox" name="selectall_special_cbox" id="selectall_special_cbox" value="selectall"></th>
                              <th>Plan Type</th>
                              <th>Data Limit</th>
                              <th>Carrier Option</th>
                              <th>Billing Period</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Row Total</th>
                            </tr>
                            </thead>
                             <tbody>
                            </tbody>
                            <tfoot>
                            <tr>  
                              <td colspan="5"></td>
                              <td align="right"><strong>Total</strong></td>
                              <td align="right"><strong id="totalSpecial">$0.00</strong></td>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>

                    </div>

                  </div>
                  <div class="widget-foot">
                    <div class="pull-right">
                      <button class="btn btn-info btn-sm" id="addSpecial" name="addSpecial" >Add Item</button> &nbsp; 
                      <button class="btn btn-default btn-sm" id="removeSpecial" name="removeSpecial" onClick="return false;" >Remove Selected</button>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>  
              
            </div>
          </div>
        </div>
    -->
    <!-- Special Deals Matter ends -->
    
     <!-- Bill To Matter -->
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Billing & Shipping Address</div>
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
                                    <select class="form-control" placeholder="Company Name" name="bcompany" id="bcompany" <?php if ($user_type=="Reseller"){ /*echo 'disabled="true"';*/} ?>>
                                      <option>Select Customer</option>
                                      <?php
                                        if($companies!=FALSE){
                                          foreach($companies->result_array() as $row){
                                            if($user_type == "Reseller"){
                                              echo '<option value="'.$row['account_id'].'" selected >'.$row['name'].'</option>';  
                                            }else{
                                              echo '<option value="'.$row['account_id'].'" '; if($customer_id==$row['account_id']){ echo "selected"; }  echo ' >'.$row['name'].'</option>';
                                            }
                                          }
                                        }
                                      ?>
                                    </select>
                                    <?php echo '<font color="red">'.form_error('bcompany').'</font>';?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address" name="baddress1" id="baddress1" onblur="addBillingAddress()" value="">
                                    <?php echo '<font color="red">'.form_error('baddress1').'</font>';?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address Complement" name="baddress2" id="baddress2" onblur="addBillingAddress()" value="">
                                    <?php echo '<font color="red">'.form_error('baddress2').'</font>';?>
                                  </div>
                                </div>  
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">City</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="City" name="bcity" id="bcity" onblur="addBillingAddress()" value="">
                                    <?php echo '<font color="red">'.form_error('bcity').'</font>';?>
                                  </div>
                                  <label class="col-lg-2 control-label">State</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="State" name="bstate" id="bstate" onblur="addBillingAddress()" value="">
                                    <?php echo '<font color="red">'.form_error('bstate').'</font>';?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">ZIP</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Zip Code" name="bzip" id="bzip" onblur="addBillingAddress()" value="">
                                    <?php echo '<font color="red">'.form_error('bzip').'</font>';?>
                                  </div>
                                  <label class="col-lg-2 control-label">Country</label>
                                  <div class="col-lg-4">
                                    <select class="form-control" name="bcountry" id="bcountry" onchange="setFees(); makeOrderTable(); addBillingAddress()">
                                    <?php
                                      if($countries!=FALSE){
                                        foreach($countries->result_array() as $row){
                                          echo '<option value="'.$row['code'].'">'.$row['country'].'</option>';
                                        }
                                      }
                                    ?>
                                    </select>
                                    <?php echo '<font color="red">'.form_error('bcountry').'</font>';?>
                                  </div>
                                </div>
                                  
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Phone</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="bphone" id="bphone" value="">
                                    <?php echo '<font color="red">'.form_error('bphone').'</font>';?>
                                  </div>
                                  <label class="col-lg-2 control-label">Attention to</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Attention To" name="attention" id="attentiton" value="">
                                    <?php echo '<font color="red">'.form_error('attention').'</font>';?>
                                  </div>
                                </div>
                              </div>
                      <div class="col-md-6">
                        <h4 align="center"> <strong>Shipping Address</strong></h4>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Company Name</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Company Name" name="scompany" id="scompany" value="">
                                    <?php echo '<font color="red">'.form_error('scompany').'</font>';?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address" name="saddress1" id="saddress1" onblur="addShippingAddress()" value="">
                                    <?php echo '<font color="red">'.form_error('saddress1').'</font>';?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address Complement" name="saddress2" id="saddress2" onblur="addShippingAddress()" value="">
                                    <?php echo '<font color="red">'.form_error('saddress2').'</font>';?>
                                  </div>
                                </div>  
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">City</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="City" name="scity" id="scity" onblur="addShippingAddress()" value="">
                                    <?php echo '<font color="red">'.form_error('scity').'</font>';?>
                                  </div>
                                  <label class="col-lg-2 control-label">State</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="State" name="sstate" id="sstate" onblur="addShippingAddress()" value="">
                                    <?php echo '<font color="red">'.form_error('sstate').'</font>';?>
                                  </div>
                                </div>
                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">ZIP</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Zip Code" name="szip" id="szip" onblur="addShippingAddress()" value="">
                                    <?php echo '<font color="red">'.form_error('szip').'</font>';?>
                                  </div>
                
                                  <label class="col-lg-2 control-label">Country</label>
                                  <div class="col-lg-4">
                                    <select class="form-control" name="scountry" id="scountry" onchange="addShippingAddress()">
                                      <?php
                                        if($countries!=FALSE){
                                          foreach($countries->result_array() as $row){
                                            echo '<option value="'.$row['code'].'">'.$row['country'].'</option>';
                                          }
                                        }
                                      ?>
                                    </select>
                                    <?php echo '<font color="red">'.form_error('scountry').'</font>';?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Phone</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="sphone" id="sphone" value="">
                                    <?php echo '<font color="red">'.form_error('sphone').'</font>';?>
                                  </div>
                                      <label class="col-lg-2 control-label">Email</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Email" name="semail" id="semail" value="">
                                    <?php echo '<font color="red">'.form_error('semail').'</font>';?>
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

    <!-- Payment Method -->
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Payment Method & Fees</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd invoice">
                    <div class="row">
                      <div class="col-md-6">
                        <h4><strong>Payment Method</strong></h4>
                        <select name="order_payment_method" id="order_payment_method" class="form-control" onChange="setFees(); makeOrderTable()">
                          <option value="Credit">Credit Card</option>
                          <option value="Wire">Wire Transfer</option>
                          <option value="Cash" >Check</option>
                          <option value="MoneyOrder">Money Order</option>
                          <option value="PayPal">PayPal</option>
                        </select>
                        <h4><strong>Payment Terms</strong></h4>
                        <select name="order_payment_terms" id="order_payment_terms" class="form-control" onChange="setFees(); makeOrderTable()">
                          <option value="Pre Payment">Pre Payment</option>
                          <option value="Net 7 Days">Net 7 Days</option>
                          <option value="Net 15 Days">Net 15 Days</option>
                          <option value="Net 30 Days">Net 30 Days</option>
                          <option value="Net 45 Days">Net 45 Days</option>
                          <option value="C.O.D.">C.O.D</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <h4><strong>Order Fees</strong></h4>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Processing: $</label>
                          <div class="col-lg-4">
                            <input type="number" min="0.00" step="0.01" class="form-control" name="feeProc" id="feeProc" onChange="makeOrderTable()" value="0.00" <?php echo $readOnly; ?> >
                          </div>
                          <div class="col-lg-1">
                            <label class="control-label" <?php echo $hidden; ?> >Waive</label>
                          </div>
                          <div class="col-lg-1">
                            <input type="checkbox" class="" name="feeProcWaive" id="feeProcWaive" onChange="makeOrderTable()" <?php echo $hidden; ?> checked>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Convenience: $</label>
                          <div class="col-lg-4">
                            <input type="number" min="0.00" step="0.01" class="form-control" name="feeConv" id="feeConv" onChange="makeOrderTable()" value="0.00" <?php echo $readOnly; ?> >
                          </div>
                          <div class="col-lg-1">
                            <label class="control-label" <?php echo $hidden; ?> >Waive</label>
                          </div>
                          <div class="col-lg-1">
                            <input type="checkbox" class="" name="feeConvWaive" id="feeConvWaive" onChange="makeOrderTable()" <?php echo $hidden; ?> checked>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Shipping: $</label>
                          <div class="col-lg-4">
                            <input type="number" min="0.00" step="0.01" class="form-control" name="feeShip" id="feeShip" onChange="makeOrderTable()" value="0.00" <?php echo $readOnly; ?> >
                          </div>
                          <div class="col-lg-1">
                            <label class="control-label" <?php echo $hidden; ?> >Waive</label>
                          </div>
                          <div class="col-lg-1">
                            <input type="checkbox" class="" name="feeShipWaive" id="feeShipWaive" onChange="makeOrderTable()" <?php echo $hidden; ?> >
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- 
                    <div class="row">
                      <div class="col-md-6">
                        <h4><strong>Payment Terms</strong></h4>
                        <select name="order_payment_terms" id="order_payment_terms" class="form-control"">
                          <option value="Pre Payment">Pre Payment</option>
                          <option value="Net 7 Days">Net 7 Days</option>
                          <option value="Net 15 Days">Net 15 Days</option>
                          <option value="Net 30 Days">Net 30 Days</option>
                          <option value="Net 45 Days">Net 45 Days</option>
                          <option value="C.O.D.">C.O.D</option>
                        </select>
                      </div>
                    </div>
                    -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- Payment Method ends -->
    
    <!-- Shipping Method -->
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Shipping Method</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd invoice">
                    <div class="row">
                      <div class="col-md-6">
                        <h4><strong>Shipping Method</strong></h4>
                          <input type="radio" name="order_ship_account" id="order_ship_account" value="customer" checked onClick="generateCustomerShipInputs()"> Check here to use Customer's Carrier Account <br>
                          <input type="radio" name="order_ship_account" id="order_ship_account" value="oigo" onClick="generateOigoShipInputs()"> Check here to use <?php echo $company_name; ?> Carrier Account <br>
                      </div>
                    </div>
                    <div class="row">
                      <div id="shipping_carrier" class="col-md-6">
                          <select name="order_ship_carrier" id="order_ship_carrier" class="form-control">
                            <option value="FedEx">FedEx</option>
                            <option value="UPS">UPS</option>
                            <option value="DHL">DHL</option>
                            <option value="USPS">USPS</option>
                            <option value="Pick Up">Pick Up</option>
                            <option value="Other">Other</option>
                          </select>
                      </div>
                    </div>
                    <div class="row">
                      <div id="shipping_destination" class="col-md-6">
                        <input type="radio" name="order_ship_dest" id="order_ship_dest" value="domestic" checked onClick="generateOigoShipInputs()">Domestic<br>
                        <input type="radio" name="order_ship_dest" id="order_ship_dest" value="international"  onClick="generateOigoShipInputs()">International<br>
                      </div>
                    </div>
                    <div class="row">
                      <div id="shipping_type" class="col-md-6">
                        <select name="order_ship_type" id="order_ship_type" class="form-control">
                          <option value="Saver">Saver</option>
                          <option value="Ground">Ground</option>
                          <option value=">2 Day">2 Day</option>
                          <option value="2 Day AM">2 Day AM</option>
                          <option value="Standard Overnight">Standard Overnight</option>
                          <option value="Priority Overnight">Priority Overnight</option>
                          <option value="First Overnight">First Overnight</option>
                          <option value="AirBW">Air Best way</option></select>
                      </div>
                    </div>
                    <div class="row">
                      <div id="shipping_number" class="col-md-6">
                        Account Number<input type="text" name="order_ship_account_number" id="order_ship_account_number" class="form-control" >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    <!-- Matter ends -->
  
    <!-- Shipping Method -->
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Notes</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd invoice">
                    
                    <div class="row">

                      <div class="col-md-6">
                        <h4><strong>Notes</strong></h4>
                       <textarea name="order_notes" id="order_notes" rows="4" cols="50"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
    <!-- Matter ends -->
    
    <!-- Matter -->
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Review & Approve Order</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd invoice">
                    <div class="row">
                      <div class="col-md-4">
                        <h4><strong>Billing Address</strong></h4>
                        <p id="b_address">
                        </p>
                      </div>
                      <div class="col-md-4">
                        <h4><strong>Shipping Address</strong></h4>
                        <p id="s_address">
                        </p>                        
                      </div>
                      <div class="col-md-4">
                        <!--<h4><strong>Invoice</strong></h4>
                        <p>
                          <strong>Invoice No</strong> : 52322<br>
                          <strong>Date</strong> : <?php //echo date('m/d/Y') ?><br>
                          <strong>Account No</strong> : 4290293203
                        </p>-->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr />
                          <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="orderTable">
                              <thead>
                              <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                              </tr>
                              </thead>
                              <tbody>
                              </tbody>    
                              <tfoot>                                                                                                           
                              <tr>
                                <td colspan="5" align="right"><strong>Order Total</strong></td>
                                <td><strong id="totalOrder">$0.00</strong></td>
                              </tr>
                              </tfoot>
                            </table>
                          <div id="orderItems"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="widget-foot">
          <div class="pull-right">
            <input type="submit" class="btn btn-primary btn-sm" value="Place Order"></input> &nbsp; 
            <a href="<?php echo $portal_path;?>main" class="btn btn-danger btn-sm">Cancel</a>
          </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>  
              
            </div>
          </div>
        </div>

    <!-- Matter ends -->
  
    </div>
  </form>
   <!-- Mainbar ends -->
   <div class="clearfix"></div>
</div>
<!-- Content ends -->

<!-- User JavaScript starts -->
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script>
$(function() {
  loadAddress();
});
$('#bcompany').change(function(){
  loadAddress();
});
function loadAddress() {
  $.ajax({
    url: "<?php echo $portal_path;?>account/getCompanyAndShippingInfo",
    method: "POST",
    data: {id : $("#bcompany").val()},
    dataType: "json",
    success: function(data){
      if(data.return == true){
        $('#account_id').val($("#bcompany").val());
        $('#company_name').val(data.company.name);
        $('#hdbcompany').val(data.company.name);
        $('#baddress1').val(data.company.address);
        $('#baddress2').val(data.company.address2);
        $('#bcity').val(data.company.city);
        $('#bstate').val(data.company.state);
        $('#bzip').val(data.company.zip);
        $('#bcountry').val(data.company.country);
        $('#bphone').val(data.company.phone);
         
        $('#scompany').val(data.company.name);
        $('#saddress1').val(data.shipping.address);
        $('#saddress2').val(data.shipping.address2);
        $('#scity').val(data.shipping.city);
        $('#sstate').val(data.shipping.state);
        $('#szip').val(data.shipping.zip);
        $('#scountry').val(data.shipping.country);
        $('#sphone').val(data.shipping.phone);
        addShippingAddress();
        addBillingAddress();
      }
    },
    error: function(e){
      console.log(e);
    }
  })
}

var approve_counter = 0;
var lease_counter = 0;
var standard_counter = 0;
var connect_counter = 0;
var special_counter = 0;
var lease_limit = 10;
var standard_limit = 10;
var connect_limit = 10;
var special_limit = 10;
/*
$("#removeLease").unbind().click(function( event ){
   if(lease_counter > 0)
  {
      $("[id='lease_cbox']").each(function(){
        if($(this).prop('checked'))
        {
            $(this).closest('tr').remove();
            lease_counter--;
        }
      })

      $("#LeaseItemsTotal").val(lease_counter);
      renameLeaseInputs();
      updateLeaseTotal();
      setFees(); 
      makeOrderTable();
  }
  event.preventDefault();
})

function renameLeaseInputs(){
  var i = 0;
  $("[id='lease_cbox']").each(function(){
    $(this).attr('name', "lease_cbox"+(i++));
  })
  i = 0;
  $("[id='leasePlan']").each(function(){
    $(this).attr('name', "leasePlan"+(i++));
  })
  i = 0;
  $("[id='leaseData']").each(function(){
    $(this).attr('name', "leaseData"+(i++));
  })
  i = 0;
  $("[id='leaseCarrier']").each(function(){
    $(this).attr('name', "leaseCarrier"+(i++));
  })
  i = 0;
  $("[id='leaseQuantity']").each(function(){
    $(this).attr('name', "leaseQuantity"+(i++));
  })
  i = 0;
  $("[id='leaseType']").each(function(){
    $(this).attr('name', "leaseType"+(i++));
  })
  i = 0;
  $("[id='activationFee']").each(function(){
    $(this).attr('name', "activationFee"+(i++));
  })
  i = 0;
  $("[id='recurringCost']").each(function(){
    $(this).attr('name', "recurringCost"+(i++));
  })
  i = 0;
  $("[id='firstPayQty']").each(function(){
    $(this).attr('name', "firstPayQty"+(i++));
  })
  i = 0;
  $("[id='firstPayTotal']").each(function(){
    $(this).attr('name', "firstPayTotal"+(i++));
  })
  i = 0;
  $("[id='leaseInfo']").each(function(){
    $(this).attr('name', "leaseInfo"+(i++));
  })
  lease_counter = i;
}

$("#addLease").unbind().click(function( event ) {

  if(lease_counter < lease_limit){

    $.ajax({
      url: "<?php echo$portal_path;?>products/getLeasePlans",
      type: 'POST',
      dataType : 'json',
      success: function(data){
        if(data.return == true){
          $("#leaseTable").find('tbody')
            .append($('<tr>')
              .append($('<td>')
                .append($('<input type="checkbox">')
                  .attr('name', "lease_cbox"+lease_counter)
                  .attr('id', "lease_cbox")
                )
              )
              .append($('<td>')
                .append($('<select>')
                  .attr('class', "form-control")
                  .attr('name', "leasePlan"+lease_counter)
                  .attr('id', "leasePlan")
                  .attr('onChange','getLeaseDatas(this)')
                  .append(data.plans)
                )
              ).append($('<td>')
                .append($('<select>')
                  .attr('class', "form-control")
                  .attr('name', "leaseData"+lease_counter)
                  .attr('id', "leaseData")
                  .attr('onChange','getLeaseCarriers(this)')
                  .append("<option value=''>Select Plan Type</option>")
                )
              ).append($('<td>')
                .append($('<select>')
                  .attr('class', "form-control")
                  .attr('name', "leaseCarrier"+lease_counter)
                  .attr('id', "leaseCarrier")
                  .attr('onChange','getLeaseTypes(this)')
                  .append("<option value=''>Select Plan Type</option>")
                  
                )
              ).append($('<td>')
                .append($('<select>')
                  .attr('class', "form-control")
                  .attr('name', "leaseType"+lease_counter)
                  .attr('id', "leaseType")
                  .attr('onChange','getLeaseFull(this)')
                  .append("<option value=''>Select Plan Type</option>")
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('class', "form-control")
                  .attr('name', "leaseQuantity"+lease_counter)
                  .attr('id', "leaseQuantity")
                  .attr('type', "number")
                  .attr('min', "1")
                  .attr('readonly', true)
                  .attr('onChange', 'updateLeaseRowCost(this)')
                  .attr('value', "1")
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('class', "form-control")
                  .attr('type', "number")
                  .attr('min', "0.00")
                  .attr('step', "0.01")
                  .attr('name', "activationFee"+lease_counter)
                  .attr('id', "activationFee")
                  .attr('readonly', true)
                  .attr('onChange', 'updateLeaseRowCost(this)')
                  .attr('value', "0.00")
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('class', "form-control")
                  .attr('type', "number")
                  .attr('min', "0.00")
                  .attr('step', "0.01")
                  .attr('name', "recurringCost"+lease_counter)
                  .attr('id', "recurringCost")
                  .attr('readonly', true)
                  .attr('onChange', 'updateLeaseRowCost(this)')
                  .attr('value', "0.00")
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('class', "form-control")
                  .attr('type', "number")
                  .attr('min', "0")
                  .attr('step', "1")
                  .attr('name', "firstPayQty"+lease_counter)
                  .attr('id', "firstPayQty")
                  .attr('readonly', true)
                  .attr('onChange', 'updateLeaseRowCost(this)')
                  .attr('value', "1")
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('class', "form-control")
                  .attr('type', "number")
                  .attr('min', "0")
                  .attr('name', "firstPayTotal"+lease_counter)
                  .attr('id', "firstPayTotal")
                  .attr('readonly', true)
                  .attr('value', "0.00")
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('type', "hidden")
                  .attr('name', "leaseInfo"+lease_counter)
                  .attr('id', "leaseInfo")
                  .data('code', "")
                  .data('description', "")
                )
              )
            );
          lease_counter++;
          $("#LeaseItemsTotal").val(lease_counter);
        }
      },
      error: function(){
      }
    });
  }else{
    alert("Can't add any more items of this type");
  }
  event.preventDefault();
});

function getLeaseDatas(event)
{
  $.ajax({
    url: "<?php echo $portal_path;?>products/getLeaseDatas",
    type: 'POST',
    data: {plans : $(event).val()},
    dataType : 'json',
    success: function(data){
      if(data.return == true)
      {
        $(event).closest('tr').find("#leaseData").html(data.datas);
        $(event).closest('tr').find("#leaseCarrier").html("<option value=''>Select Data Limit</option>");
        $(event).closest('tr').find("#leaseType").html("<option value=''>Select Data Limit</option>");
        $(event).closest('tr').find("#leaseQuantity").val("1").attr('readonly', true);
        $(event).closest('tr').find("#activationFee").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("#recurringCost").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("#firstPayQty").val("1").attr('readonly', true);
        $(event).closest('tr').find("#firstPayTotal").val("0.00").attr('readonly', true);;
        $(event).closest('tr').find("#leaseInfo").data('code', "").data('description', "").val("");
        updateLeaseRowCost(event);
      }
    },
    error: function(e){
      $(event).closest('tr').find("#leaseData").html("<option value=''>Select Plan Type</option>");
      $(event).closest('tr').find("#leaseCarrier").html("<option value=''>Select Plan Type</option>");
      $(event).closest('tr').find("#leaseType").html("<option value=''>Select Select Plan Type</option>");
      $(event).closest('tr').find("#leaseQuantity").val("1").attr('readonly', true);
      $(event).closest('tr').find("#activationFee").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("#recurringCost").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("#firstPayQty").val("1").attr('readonly', true);
      $(event).closest('tr').find("#firstPayTotal").val("0.00").attr('readonly', true);;
      $(event).closest('tr').find("#leaseInfo").data('code', "").data('description', "").val("");
      updateLeaseRowCost(event);
      console.log(e);
    }
  });
}

function getLeaseCarriers(event)
{
  $.ajax({
    url: "<?php echo $portal_path;?>products/getLeaseCarriers",
    type: 'POST',
    data: {datas : $(event).val(), plans:$(event).closest("tr").find("#leasePlan").val()},
    dataType : 'json',
    success: function(data){
      if(data.return == true)
      {
        $(event).closest('tr').find("#leaseCarrier").html(data.carriers);
        $(event).closest('tr').find("#leaseType").html("<option value=''>Select Carrier Option</option>");
        $(event).closest('tr').find("#leaseQuantity").val("1").attr('readonly', true);
        $(event).closest('tr').find("#activationFee").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("#recurringCost").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("#firstPayQty").val("1").attr('readonly', true);
        $(event).closest('tr').find("#firstPayTotal").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("#leaseInfo").data('code', "").data('description', "").val("");
        updateLeaseRowCost(event);
      }
    },
    error: function(e){
      $(event).closest('tr').find("#leaseCarrier").html("<option value=''>Select Data Limit</option>");
      $(event).closest('tr').find("#leaseType").html("<option value=''>Select Data Limit</option>");
      $(event).closest('tr').find("#leaseQuantity").val("1").attr('readonly', true);
      $(event).closest('tr').find("#activationFee").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("#recurringCost").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("#firstPayQty").val("1").attr('readonly', true);
      $(event).closest('tr').find("#firstPayTotal").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("#leaseInfo").data('code', "").data('description', "").val("");
      updateLeaseRowCost(event);
      console.log(e);
    }
  });
}

function getLeaseTypes(event)
{
  $.ajax({
    url: "<?php echo $portal_path;?>products/getLeaseTypes",
    type: 'POST',
    data: {carriers : $(event).val(), datas:$(event).closest("tr").find("#leaseData").val(), plans:$(event).closest("tr").find("#leasePlan").val()},
    dataType : 'json',
    success: function(data){
      if(data.return == true)
      {
        $(event).closest('tr').find("#leaseType").html(data.types);
        $(event).closest('tr').find("#leaseQuantity").val("1").attr('readonly', true);
        $(event).closest('tr').find("#activationFee").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("#recurringCost").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("#firstPayQty").val("1").attr('readonly', true);
        $(event).closest('tr').find("#firstPayTotal").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("#leaseInfo").data('code', "").data('description', "").val("");
        updateLeaseRowCost(event);
      }
    },
    error: function(e){
      $(event).closest('tr').find("#leaseType").html("<option value=''>Select Carrier Option</option>");
      $(event).closest('tr').find("#leaseQuantity").val("1").attr('readonly', true);
      $(event).closest('tr').find("#activationFee").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("#recurringCost").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("#firstPayQty").val("1").attr('readonly', true).attr('readonly', true);
      $(event).closest('tr').find("#firstPayTotal").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("#leaseInfo").data('code', "").data('description', "").val("");
      updateLeaseRowCost(event);
      console.log(e);
    }
  });
}

function getLeaseFull(event)
{
  $.ajax({
    url: "<?php echo $portal_path;?>products/getLeaseFull",
    type: 'POST',
    data: {types : $(event).val(), carriers:$(event).closest("tr").find("#leaseCarrier").val(), datas:$(event).closest("tr").find("#leaseData").val(), plans:$(event).closest("tr").find("#leasePlan").val()},
    dataType : 'json',
    success: function(data){
      if(data.return == true)
      {
        var qty = $(event).closest('tr').find("#leaseQuantity").val();
        var total = parseFloat(qty) * (parseFloat(data.full.price) + parseFloat(data.full.recurring_price) * parseFloat(data.full.first_pay_qty));

        $(event).closest('tr').find("#leaseQuantity").attr('readonly', false);
        $(event).closest('tr').find("#activationFee").val(data.full.price).attr('readonly', <?php echo $readOnly;?>);
        $(event).closest('tr').find("#recurringCost").val(data.full.recurring_price).attr('readonly', <?php echo $readOnly;?>);
        $(event).closest('tr').find("#firstPayQty").val(data.full.first_pay_qty).attr('readonly', <?php echo $readOnly;?>);
        $(event).closest('tr').find("#firstPayTotal").val(total.toFixed(2)).attr('readonly', true);
        $(event).closest('tr').find("#leaseInfo").data('code', data.full.code).data('description', data.full.description).val(data.full.id);
        updateLeaseRowCost(event);
      }
    },
    error: function(e){
      $(event).closest('tr').find("#leaseQuantity").val("1").attr('readonly', true);
      $(event).closest('tr').find("#activationFee").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("#recurringCost").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("#firstPayQty").val("1").attr('readonly', true);
      $(event).closest('tr').find("#firstPayTotal").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("#leaseInfo").data('code', "").data('description', "").val("");
      updateLeaseRowCost(event);
      console.log(e);
    }
  });
}

function updateLeaseRowCost(event){

  var qty = parseFloat($(event).closest('tr').find("#leaseQuantity").val());
  var activationFee =  parseFloat($(event).closest('tr').find("#activationFee").val());
  var recurringCost =  parseFloat($(event).closest('tr').find("#recurringCost").val());
  var firstPayQty = parseFloat($(event).closest('tr').find("#firstPayQty").val());
  var total = qty * (activationFee + recurringCost * firstPayQty);
 
  $(event).closest('tr').find("#firstPayTotal").val(total.toFixed(2));

  updateLeaseTotal();
  setFees();
  makeOrderTable();
}

function updateLeaseTotal(){
  var total = 0.00;
  $("[id='firstPayTotal']").each(function(){
    total += parseFloat($(this).closest('tr').find("#firstPayTotal").val());
  })
  $("#totalLease").html("$" + total.toFixed(2));
}
*/

//***************************************************************************************************************************************//
$("#removeStandard").unbind().click(function(){
    if(standard_counter > 0)
    {
        $("[id='standard_cbox']").each(function(){
          if($(this).prop('checked'))
          {
              $(this).closest('tr').remove();
              standard_counter--;
          }
        })
        $("#StandardItemsTotal").val(standard_counter);
        renameStandardInputs();
        updateStandardTotal();
        setFees();
        makeOrderTable();
    }
})

function renameStandardInputs(){
  var i = 0;
  $("#standard_cbox").each(function(){
    $(this).attr('name', "standard_cbox"+(i++));
  })
  i = 0;
  $("#standardType").each(function(){
    $(this).attr('name', "standardType"+(i++));
  })
  i = 0;
  $("#standardItem").each(function(){
    $(this).attr('name', "standardItem"+(i++));
  })
  i = 0;
  $("#standardQuantity").each(function(){
    $(this).attr('name', "standardQuantity"+(i++));
  })
  i = 0;
  $("#standardPrice").each(function(){
    $(this).attr('name', "standardPrice"+(i++));
  })
  i = 0;
  $("#standardPriceTotal").each(function(){
    $(this).attr('name', "standardPriceTotal"+(i++));
  })
  i = 0;
  $("#standardInfo").each(function(){
    $(this).attr('name', "standardInfo"+(i++));
  })
  standard_counter = i;
}

$("#addStandard").click(function( event ) {

  if(standard_counter < standard_limit){

    $.ajax({
      url: "<?php echo $portal_path;?>products/getStandardType",
      type: 'POST',
      dataType : 'json',
      success: function(data){

        if(data.return == true){
          $("#standardTable").find('tbody')
            .append($('<tr>')
              .append($('<td>')
                .append($('<input type="checkbox">')
                  .attr('name', "standard_cbox"+standard_counter)
                  .attr('id', "standard_cbox")
                )
              ).append($('<td>')
                .append($('<select>')
                  .attr('class', "form-control")
                  .attr('name', "standardType"+standard_counter)
                  .attr('id', "standardType")
                  .attr('onChange', "getStandardDescription(this)")
                  .append(data.types)
                )
              ).append($('<td>')
                .append($('<select>')
                  .attr('class', "form-control")
                  .attr('name', "standardItem"+standard_counter)
                  .attr('id', "standardItem")
                  .attr('onChange', "getStandardProduct(this)")
                  .append("<option value=''>Select Product Type</option>")
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('class', "form-control")
                  .attr('name', "standardQuantity"+standard_counter)
                  .attr('id', "standardQuantity")
                  .attr('type', "number")
                  .attr('min', "1")
                  .attr('readonly', true)
                  .attr('onChange', 'updateStandardRowCost(this)')
                  .attr('value', "1")
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('class', "form-control")
                  .attr('type', "number")
                  .attr('min', "0.00")
                  .attr('step', "0.01")
                  .attr('name', "standardPrice"+standard_counter)
                  .attr('id', "standardPrice")
                  .attr('readonly', true)
                  .attr('onChange', 'updateStandardRowCost(this)')
                  .attr('value', "0.00")
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('class', "form-control")
                  .attr('type', "number")
                  .attr('min', "0.00")
                  .attr('step', "0.01")
                  .attr('name', "standardPriceTotal"+standard_counter)
                  .attr('id', "standardPriceTotal")
                  .attr('readonly', true)
                  .attr('value', "0.00")
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('type', "hidden")
                  .attr('class', "form-control")
                  .attr('name', "standardInfo"+standard_counter)
                  .attr('id', "standardInfo")
                  .data('code', "")
                  .data('description', "")
                )
              )
            );
          standard_counter++;
          $("#StandardItemsTotal").val(standard_counter);
        }
      },
      error: function(){
      }
    });
  }else{
    alert("Can't add any more items of this type");
  }
  event.preventDefault();
});

function getStandardDescription(event)
{
  $.ajax({
    url: "<?php echo $portal_path;?>products/getStandardItem",
    type: 'POST',
    data: {type : $(event).val()},
    dataType : 'json',
    success: function(data){
      if(data.return == true)
      {
        $(event).closest('tr').find("[id='standardItem']").html(data.item);
        $(event).closest('tr').find("[id='standardQuantity']").val("1").attr('readonly', true);
        $(event).closest('tr').find("[id='standardPrice']").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("[id='standardPriceTotal']").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("[id='standardInfo']").data('code', "").data('description', "").val("");
        updateStandardRowCost(event);
      }
    },
    error: function(e){
      $(event).closest('tr').find("[id='standardItem']").html("<option value=''>Select Product Type</option>");
      $(event).closest('tr').find("[id='standardQuantity']").val("1").attr('readonly', true);
      $(event).closest('tr').find("[id='standardPrice']").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("[id='standardPriceTotal']").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("[id='standardInfo']").data('code', "").data('description', "").val("");
      updateStandardRowCost(event);
      console.log(e);
    }
  });
}

function getStandardProduct(event)
{
  $.ajax({
    url: "<?php echo $portal_path;?>products/getStandardProduct",
    type: 'POST',
    data: {code : $(event).val()},
    dataType : 'json',
    success: function(data){
      if(data.return == true)
      {
        var qty = $(event).closest('tr').find("[id='standardQuantity']").val();
        var total = qty * data.standard.price;
        
        $(event).closest('tr').find("[id='standardQuantity']").attr('readonly', false);
        $(event).closest('tr').find("[id='standardPrice']").val(data.standard.price).attr('readonly', <?php if($readOnly!='')echo 'true';else echo 'false';?>);
        $(event).closest('tr').find("[id='standardPriceTotal']").val(total.toFixed(2)).attr('readonly', true);
        $(event).closest('tr').find("[id='standardInfo']").data('code', data.standard.code).data('description', data.standard.description).val(data.standard.id);
        updateStandardRowCost(event);
      }
    },
    error: function(e){
      $(event).closest('tr').find("[id='standardQuantity']").val("1").attr('readonly', true);
      $(event).closest('tr').find("[id='standardPrice']").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("[id='standardPriceTotal']").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("[id='standardInfo']").data('code', "").data('description', "").val("");
      updateStandardRowCost(event);
      console.log(e);
    }
  });
}

function updateStandardRowCost(event){

  var qty = parseFloat($(event).closest('tr').find("[id='standardQuantity']").val());
  var unitPrice = parseFloat($(event).closest('tr').find("[id='standardPrice']").val());
  var total = parseFloat(qty * unitPrice);

  $(event).closest('tr').find("[id='standardPriceTotal']").val(total.toFixed(2)).data('standardPriceTotal', total.toFixed(2));
  $(event).closest('tr').find("[id='standardPrice']").data('standardPrice', unitPrice.toFixed(2));
  updateStandardTotal();
  setFees();
  makeOrderTable();
}

function updateStandardTotal(){
  var total = 0.00;
  $("[id='standardPriceTotal']").each(function(){
    total += parseFloat($(this).closest('tr').find("[id='standardPriceTotal']").val());
  })
  $("#totalStandard").html("$" + total.toFixed(2));
}

//***************************************************************************************************************************************//
/*
$("#removeConnect").unbind().click(function(){
    if(connect_counter > 0)
    {
        $("[id='connect_cbox']").each(function(){
          if($(this).prop('checked'))
          {
              $(this).closest('tr').remove();
              connect_counter--;
          }
        })
        $("#ConnectItemsTotal").val(connect_counter);
        renameConnectInputs();
        updateConnectTotal();
        setFees();
        makeOrderTable();
    }
})

function renameConnectInputs(){
  var i = 0;
  $("[id='connect_cbox']").each(function(){
    $(this).attr('name', "connect_cbox"+(i++));
  })
  i = 0;
  $("[id='connectPlan']").each(function(){
    $(this).attr('name', "connectPlan"+(i++));
  })
  i = 0;
  $("[id='connectData']").each(function(){
    $(this).attr('name', "connectData"+(i++));
  })
  i = 0;
  $("[id='connectCarrier']").each(function(){
    $(this).attr('name', "connectCarrier"+(i++));
  })
  i = 0;
  $("[id='connectRecurring']").each(function(){
    $(this).attr('name', "connectRecurring"+(i++));
  })
  i = 0;
  $("[id='connectQuantity']").each(function(){
    $(this).attr('name', "connectQuantity"+(i++));
  })
  i = 0;
  $("[id='connectPrice']").each(function(){
    $(this).attr('name', "connectPrice"+(i++));
  })
  i = 0;
  $("[id='connectPriceTotal']").each(function(){
    $(this).attr('name', "connectPriceTotal"+(i++));
  })
  i = 0;
  $("[id='connectInfo']").each(function(){
    $(this).attr('name', "connectInfo"+(i++));
  })
  connect_counter = i;
}


$("#addConnect").click(function( event ) {

  if(connect_counter < connect_limit){
    $.ajax({
      url: "<?php echo $portal_path;?>products/getConnectPlans",
      type: 'POST',
      dataType : 'json',
      success: function(data){

        if(data.return == true){
          $("#connectTable").find('tbody')
            .append($('<tr>')
              .append($('<td>')
                .append($('<input type="checkbox">')
                  .attr('name', "connect_cbox"+connect_counter)
                  .attr('id', "connect_cbox")
                )
              )
              .append($('<td>')
                .append($('<select>')
                  .attr('class', "form-control")
                  .attr('name', "connectPlan"+connect_counter)
                  .attr('id', "connectPlan")
                  .attr('onChange','getConnectDatas(this)')
                  .append(data.plans)
                )
              ).append($('<td>')
                .append($('<select>')
                  .attr('class', "form-control")
                  .attr('name', "connectData"+connect_counter)
                  .attr('id', "connectData")
                  .attr('onChange','getConnectCarriers(this)')
                  .append("<option value=''>Select Plan Type</option>")
                )
              ).append($('<td>')
                .append($('<select>')
                  .attr('class', "form-control")
                  .attr('name', "connectCarrier"+connect_counter)
                  .attr('id', "connectCarrier")
                  .attr('onChange','getConnectRecurring(this)')
                  .append("<option value=''>Select Plan Type</option>")
                  
                )
              ).append($('<td>')
                .append($('<select>')
                  .attr('class', "form-control")
                  .attr('name', "connectRecurring"+connect_counter)
                  .attr('id', "connectRecurring")
                  .attr('onChange','getConnectFull(this)')
                  .append("<option value=''>Select Plan Type</option>")
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('class', "form-control")
                  .attr('name', "connectQuantity"+connect_counter)
                  .attr('id', "connectQuantity")
                  .attr('type', "number")
                  .attr('min', "1")
                  .attr('onChange', 'updateConnectRowCost(this)')
                  .attr('value', "1")
                  .attr('readonly', true)
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('class', "form-control")
                  .attr('name', "connectPrice"+connect_counter)
                  .attr('id', "connectPrice")
                  .attr('type', "number")
                  .attr('min', "0.00")
                  .attr('step', "0.01")
                  .attr('onChange', 'updateConnectRowCost(this)')
                  .attr('value', '0.00')
                  .attr('readonly', true)
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('class', "form-control")
                  .attr('name', "connectPriceTotal"+connect_counter)
                  .attr('id', "connectPriceTotal")
                  .attr('type', "number")
                  .attr('min', "0.00")
                  .attr('step', "0.01")
                  .attr('readonly', true)
                  .attr('value', "0.00")
                )
              ).append($('<td>')
                .append($('<input>')
                  .attr('type', "hidden")
                  .attr('class', "form-control")
                  .attr('name', "connectInfo"+connect_counter)
                  .attr('id', "connectInfo")
                  .data('code', "")
                  .data('description', "")
                )
              )
            );
            connect_counter++;
            $("#ConnectItemsTotal").val(connect_counter);
        }
      },
      error: function(){
      }
    });
  }else{
    alert("Can't add any more items of this type");
  }
  event.preventDefault();
});

function getConnectDatas(event)
{
  $.ajax({
    url: "<?php echo $portal_path;?>products/getConnectDatas",
    type: 'POST',
    data: {plans : $(event).val()},
    dataType : 'json',
    success: function(data){
      if(data.return == true)
      {
        $(event).closest('tr').find("[id='connectData']").html(data.datas);
        $(event).closest('tr').find("[id='connectCarrier']").html("<option value=''>Select Data Limit</option>");
        $(event).closest('tr').find("[id='connectRecurring']").html("<option value=''>Select Data Limit</option>");
        $(event).closest('tr').find("[id='connectQuantity']").val("1").attr('readonly', true);
        $(event).closest('tr').find("[id='connectPrice']").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("[id='connectPriceTotal']").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("[id='connectInfo']").data('code',"").data('description',"").val("");
        updateConnectRowCost(event)
      }
    },
    error: function(e){
      $(event).closest('tr').find("[id='connectData']").html("<option value=''>Select Plan Type</option>");
      $(event).closest('tr').find("[id='connectCarrier']").html("<option value=''>Select Plan Type</option>");
      $(event).closest('tr').find("[id='connectRecurring']").html("<option value=''>Select Plan Type</option>");
      $(event).closest('tr').find("[id='connectQuantity']").val("1").attr('readonly', true);
      $(event).closest('tr').find("[id='connectPrice']").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("[id='connectPriceTotal']").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("[id='connectInfo']").data('code',"").data('description',"").val("");
      updateConnectRowCost(event)
      console.log(e);
    }
  });
}

function getConnectCarriers(event)
{
  $.ajax({
    url: "<?php echo $portal_path;?>products/getConnectCarriers",
    type: 'POST',
    data: {datas : $(event).val(), plans:$(event).closest("tr").find("[id='connectPlan']").val()},
    dataType : 'json',
    success: function(data){
      if(data.return == true)
      {
        $(event).closest('tr').find("[id='connectCarrier']").html(data.carriers);
        $(event).closest('tr').find("[id='connectRecurring']").html("<option value=''>Select Carrier Option</option>");
        $(event).closest('tr').find("[id='connectQuantity']").val("1").attr('readonly', true);
        $(event).closest('tr').find("[id='connectPrice']").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("[id='connectPriceTotal']").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("[id='connectInfo']").data('code',"").data('description',"").val("");
        updateConnectRowCost(event)
      }
    },
    error: function(e){
      $(event).closest('tr').find("[id='connectCarrier']").html("<option value=''>Select Data Limit</option>");
      $(event).closest('tr').find("[id='connectRecurring']").html("<option value=''>Select Data Limit</option>");
      $(event).closest('tr').find("[id='connectQuantity']").val("1").attr('readonly', true);
      $(event).closest('tr').find("[id='connectPrice']").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("[id='connectPriceTotal']").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("[id='connectInfo']").data('code',"").data('description',"").val("");
      updateConnectRowCost(event)
      console.log(e);
    }
  });
}

function getConnectRecurring(event)
{
  $.ajax({
    url: "<?php echo $portal_path;?>products/getConnectRecurring",
    type: 'POST',
    data: {carriers : $(event).val(), datas:$(event).closest("tr").find("[id='connectData']").val(), plans:$(event).closest("tr").find("[id='connectPlan']").val()},
    dataType : 'json',
    success: function(data){
      if(data.return == true)
      {
        $(event).closest('tr').find("[id='connectRecurring']").html(data.types);
        $(event).closest('tr').find("[id='connectQuantity']").val("1").attr('readonly', true);
        $(event).closest('tr').find("[id='connectPrice']").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("[id='connectPriceTotal']").val("0.00").attr('readonly', true);
        $(event).closest('tr').find("[id='connectInfo']").data('code',"").data('description',"").val("");
        updateConnectRowCost(event)
      }
    },
    error: function(e){
      $(event).closest('tr').find("[id='connectRecurring']").html("<option value=''>Select Carrier Option</option>");
      $(event).closest('tr').find("[id='connectQuantity']").val("1").attr('readonly', true);
      $(event).closest('tr').find("[id='connectPrice']").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("[id='connectPriceTotal']").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("[id='connectInfo']").data('code',"").data('description',"").val("");
      updateConnectRowCost(event)
      console.log(e);
    }
  });
}

function getConnectFull(event)
{
  $.ajax({
    url: "<?php echo $portal_path;?>products/getConnectFull",
    type: 'POST',
    data: {types : $(event).val(), carriers:$(event).closest("tr").find("[id='connectCarrier']").val(), datas:$(event).closest("tr").find("[id='connectData']").val(), plans:$(event).closest("tr").find("[id='connectPlan']").val()},
    dataType : 'json',
    success: function(data){
      if(data.return == true)
      {
        var qty = $(event).closest('tr').find("[id='connectQuantity']").val();
        var total = qty * data.full.price;
        $(event).closest('tr').find("[id='connectQuantity']").val("1").attr('readonly', false);
        $(event).closest('tr').find("[id='connectPrice']").val(data.full.price).attr('readonly', <?php echo $readOnly;?>);
        $(event).closest('tr').find("[id='connectPriceTotal']").val(total).attr('readonly', true);
        $(event).closest('tr').find("[id='connectInfo']").data('code',data.full.code).data('description',data.full.description).val(data.full.id);
        updateConnectRowCost(event);
      }
    },
    error: function(e){
      $(event).closest('tr').find("[id='connectQuantity']").val("1").attr('readonly', true);
      $(event).closest('tr').find("[id='connectPrice']").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("[id='connectPriceTotal']").val("0.00").attr('readonly', true);
      $(event).closest('tr').find("[id='connectInfo']").data('code',"").data('description',"").val("");
      updateConnectRowCost(event)
      console.log(e);
    }
  });
}

function updateConnectRowCost(event){

  var qty = parseFloat($(event).closest('tr').find("[id='connectQuantity']").val());
  var unitPrice = parseFloat($(event).closest('tr').find("[id='connectPrice']").val());
  var total = parseFloat(qty * unitPrice);

  $(event).closest('tr').find("[id='connectPriceTotal']").val(total.toFixed(2));
  
  updateConnectTotal();
  setFees();
  makeOrderTable();
}

function updateConnectTotal(){
  var total = 0.00;
  $("[id='connectPriceTotal']").each(function(){
    total += parseFloat($(this).closest('tr').find("[id='connectPriceTotal']").val());
  })
  $("#totalConnect").html("$" + total.toFixed(2));
}
*/
//***************************************************************************************************************************************//

function makeOrderTable(){
  
  var itens_counter = 0;
  var qty = 0;
  var price = 0.00;
  var total = 0.00;
  var code = "";
  var itemsTotal = 0.00;
  var orderTotal = 0.00;

  $("#orderTable").find("tbody").html("");
  $("#orderItems").html("");
  
  for(var i=0; i < lease_counter; i++){
    code = $("[name='leaseInfo"+i+"']").data("code");
    if(code != "" && code != null){
      qty = $("[name='leaseQuantity"+i+"']").val();
      price = parseFloat($("[name='recurringCost"+i+"']").val()) * parseFloat($("[name='firstPayQty"+i+"']").val()) + parseFloat($("[name='activationFee"+i+"']").val());
      total = parseFloat($("[name='firstPayTotal"+i+"']").val());
      itemsTotal += total;
      $("#orderTable").find("tbody")
        .append($("<tr>")
          .append($("<td>")
            .html(++itens_counter)
          )
          .append($("<td>")
            .html(code)
          )
          .append($("<td>")
            .html($("[name='leaseInfo"+i+"']").data("description"))
          )
          .append($("<td>")
            .html(qty)
          )
          .append($("<td>")
            .html("$"+(price.toFixed(2)))
          )
          .append($("<td>")
            .html("$"+(total.toFixed(2)))
          )
        )
    }
  }

  for(var i=0; i < standard_counter; i++){

    code = $("[name='standardInfo"+i+"']").data("code");
    if(code != "" && code != null){
      qty = $("[name='standardQuantity"+i+"']").val();
      price = parseFloat($("[name='standardPrice"+i+"']").val());
      total = parseFloat($("[name='standardPriceTotal"+i+"']").val());
      itemsTotal += total;

      $("#orderTable").find("tbody")
        .append($("<tr>")
          .append($("<td>")
            .html(++itens_counter)
          )
          .append($("<td>")
            .html(code)
          )
          .append($("<td>")
            .html($("[name='standardInfo"+i+"']").data("description"))
          )
          .append($("<td>")
            .html(qty)
          )
          .append($("<td>")
            .html("$"+(price.toFixed(2)))
          )
          .append($("<td>")
            .html("$"+(total.toFixed(2)))
          )
        )
    }
  }

  for(var i=0; i < connect_counter; i++){

    code = $("[name='connectInfo"+i+"']").data("code");
    if(code != "" && code != null){
      qty = $("[name='connectQuantity"+i+"']").val();
      price = parseFloat($("[name='connectPrice"+i+"']").val());
      total = parseFloat($("[name='connectPriceTotal"+i+"']").val());
      itemsTotal += total;

      $("#orderTable").find("tbody")
        .append($("<tr>")
          .append($("<td>")
            .html(++itens_counter)
          )
          .append($("<td>")
            .html(code)
          )
          .append($("<td>")
            .html($("[name='connectInfo"+i+"']").data("description"))
          )
          .append($("<td>")
            .html(qty)
          )
          .append($("<td>")
            .html("$"+(price.toFixed(2)))
          )
          .append($("<td>")
            .html("$"+(total.toFixed(2)))
          )
        )
    }
  }

  var fee = 0.00;
  if(itemsTotal>0){
    if(!($('#feeProcWaive').prop('checked')) && $('#feeProc').val()!="0.00"){
      
      fee = parseFloat($('#feeProc').val());
      
      itemsTotal += fee;
      $("#orderTable").find("tbody")
          .append($("<tr>")
            .append($("<td>")
              .html(++itens_counter)
            )
            .append($("<td>")
              .html("FEE_00")
            )
            .append($("<td>")
              .html("Processing Fee")
            )
            .append($("<td>")
              .html("1")
            )
            .append($("<td>")
              .html("$"+(fee.toFixed(2)))
            )
            .append($("<td>")
              .html("$"+(fee.toFixed(2)))
            )
          )
    }

    if(!($('#feeConvWaive').prop('checked')) && $('#feeConv').val()!="0.00"){
      
      fee = parseFloat($('#feeConv').val());
      
      itemsTotal += fee;
      $("#orderTable").find("tbody")
          .append($("<tr>")
            .append($("<td>")
              .html(++itens_counter)
            )
            .append($("<td>")
              .html("FEE_04")
            )
            .append($("<td>")
              .html("Convenience Fee")
            )
            .append($("<td>")
              .html("1")
            )
            .append($("<td>")
              .html("$"+(fee.toFixed(2)))
            )
            .append($("<td>")
              .html("$"+(fee.toFixed(2)))
            )
          )
    }

    if(!($('#feeShipWaive').prop('checked')) && $('#feeShip').val()!="0.00"){
      
      fee = parseFloat($('#feeShip').val());
      
      itemsTotal += fee;
      $("#orderTable").find("tbody")
          .append($("<tr>")
            .append($("<td>")
              .html(++itens_counter)
            )
            .append($("<td>")
              .html("FEE_03")
            )
            .append($("<td>")
              .html("Shipping Fee")
            )
            .append($("<td>")
              .html("1")
            )
            .append($("<td>")
              .html("$"+(fee.toFixed(2)))
            )
            .append($("<td>")
              .html("$"+(fee.toFixed(2)))
            )
          )
    }
  }

  orderTotal = itemsTotal;  
  $("#totalOrder").html("$" + parseFloat(orderTotal).toFixed(2));
  $("#totalOrder").data("total", parseFloat(orderTotal).toFixed(2));
}


function setFees(){

  var orderItemsTotal = getOrderTotalItems();
  var pfee = 0.00;
  var cfee = 0.00;

  if(orderItemsTotal > 0){
    if(orderItemsTotal < 500){
      pfee = 40.00;
      $('#feeProc').val(pfee.toFixed(2));
    }else{
      $('#feeProc').val(pfee.toFixed(2));
    }

    if($('#order_payment_method').val() == "Credit"){
      cfee = 0.03;
      cfee = orderItemsTotal * cfee;
      $('#feeConv').val(cfee.toFixed(2));

    } else if($('#order_payment_method').val() == "Wire"){
      var country = $("#bcountry option:selected").val();
      if(country == "US" || country == "CA"){
        cfee = 15.00;
      }else if(country == "MX"){
        cfee = 25.00;
      }else{
        cfee = 40.00;
      }
      $('#feeConv').val(cfee.toFixed(2));
    }else if($('#order_payment_method').val() == "Cash"){
      cfee = 0.00;
      $('#feeConv').val(cfee.toFixed(2));
      
    }else if($('#order_payment_method').val() == "MoneyOrder"){
      cfee = 0.00;
      $('#feeConv').val(cfee.toFixed(2));
    }else if($('#order_payment_method').val() == "PayPal"){
      cfee = 0.03;
      cfee = orderItemsTotal * cfee;
      $('#feeConv').val(cfee.toFixed(2));
    }
  }
}

function getOrderTotalItems(){

  var qty = 0;
  var price = 0.00;
  var total = 0.00;
  var code = "";
  var itemsTotal = 0.00;

  for(var i=0; i < lease_counter; i++){
    code = $("[name='leaseInfo"+i+"']").data("code");
    if(code != "" && code != null){
      qty = $("[name='leaseQuantity"+i+"']").val();
      price = parseFloat($("[name='recurringCost"+i+"']").val()) * parseFloat($("[name='firstPayQty"+i+"']").val()) + parseFloat($("[name='activationFee"+i+"']").val());
      total = parseFloat($("[name='firstPayTotal"+i+"']").val());
      itemsTotal += total;
    }
  }

  for(var i=0; i < standard_counter; i++){
    code = $("[name='standardInfo"+i+"']").data("code");
    if(code != "" && code != null){
      qty = $("[name='standardQuantity"+i+"']").val();
      price = parseFloat($("[name='standardPrice"+i+"']").val())
      total = parseFloat($("[name='standardPriceTotal"+i+"']").val());
      itemsTotal += total;
    }
  }

  for(var i=0; i < connect_counter; i++){
    code = $("[name='connectInfo"+i+"']").data("code");
    if(code != "" && code != null){
      qty = $("[name='connectQuantity"+i+"']").val();
      price = parseFloat($("[name='connectPrice"+i+"']").val())
      total = parseFloat($("[name='connectPriceTotal"+i+"']").val());
      itemsTotal += total;
    }
  }

  return itemsTotal;

}

function addBillingAddress()
{
      var bcompany = $("#bcompany").val();
      var baddress1 = $("#baddress1").val();
      var baddress2 = $("#baddress2").val();
      var bcity = $("#bcity").val();
      var bstate = $("#bstate").val();
      var bzip = $("#bzip").val();
      var bcountry = $("#bcountry option:selected").html();


      $("#b_address").html(baddress1+"<br/>"+
                           baddress2+"<br/>"+
                           bcity+", "+
                           bstate+" - "+
                           bzip+"<br/>"+
                           bcountry);
} 

function addShippingAddress()
{
      var bcompany = $("#scompany").val();
      var baddress1 = $("#saddress1").val();
      var baddress2 = $("#saddress2").val();
      var bcity = $("#scity").val();
      var bstate = $("#sstate").val();
      var bzip = $("#szip").val();
      var bcountry = $("#scountry option:selected").html();


      $("#s_address").html(baddress1+"<br/>"+
                           baddress2+"<br/>"+
                           bcity+", "+
                           bstate+" - "+
                           bzip+"<br/>"+
                           bcountry);
}

function generateCustomerShipInputs(){
  $('#order_ship_carrier option[value="Air"]').remove();
  $('#order_ship_carrier').children('option:not(:first)').remove();
  $("#order_ship_carrier").append('<option value="UPS">UPS</option>');
  $("#order_ship_carrier").append('<option value="DHL">DHL</option>');
  $("#order_ship_carrier").append('<option value="USPS">USPS</option>');
  $("#order_ship_carrier").append('<option value="Pick Up">Pick Up</option>');
  $("#order_ship_carrier").append('<option value="Other">Other</option>');

  $("#shipping_destination").hide();
  $("#order_ship_type").hide();
  $("#shipping_number").show();
}

function generateOigoShipInputs(){

  $("#order_ship_carrier").children('option:not(:first)').remove();
  $("#order_ship_carrier").append('<option value="Air">Air</option>');

  $("#shipping_destination").show();
  $("#order_ship_type").show();
  $("#shipping_number").hide();

  if($('input[name=order_ship_dest]:checked').val() == "domestic"){

    $('#order_ship_type').children('option').remove();
    $("#order_ship_type").append('<option value="Saver">Saver</option>');
    $("#order_ship_type").append('<option value="2Day">2 Day</option>');
    $("#order_ship_type").append('<option value="2DayAM">2 Day AM</option>');
    $("#order_ship_type").append('<option value="Standard">Standard Overnight</option>');
    $("#order_ship_type").append('<option value="Priority">Priority Overnight</option>');
    $("#order_ship_type").append('<option value="First">First Overnight</option>');
    $("#order_ship_type").append('<option value="AirBW">Air Best Way</option>');


  }else if($('input[name=order_ship_dest]:checked').val() == "international"){
    $('#order_ship_type').children('option').remove();
    $("#order_ship_type").append('<option value="IntEconomy">Int`l Economy</option>');
    $("#order_ship_type").append('<option value="IntPriority">Int`l Priority</option>');
    $("#order_ship_type").append('<option value="IntNextFlight">Int`l Next Flight</option>');
  }
}

$(document).ready(function(){

  $("#shipping_destination").hide();
  $("#order_ship_type").hide();

});
</script>
<!-- User JavaScript ends -->
