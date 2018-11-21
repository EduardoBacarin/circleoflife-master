<?php 
	$theme_path = THEMEPATH;
	$portal_path = PORTALPATH;

  /*echo "<pre>";
  print_r($order->result()); echo "</pre>";exit;*/
?>


<!-- Main bar -->
<div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-o"></i>View Order</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">View Order</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->

    <form class="form-horizontal" role="form" id="placeOrder" name="placeOrder" action="<?php echo $portal_path;?>order/placeorderlocal" method="POST">
	    <!-- Lease Plans Matter -->
      <input type="hidden" name="account_id" id="account_id" value="<?php echo $account->row()->id; ?>"/>
      <input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id; ?>"/>
		 <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Order</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd invoice">
                    <div class="row">
                      <div class="col-md-4">
                        
                        <div class="form-group">
                          <label class="col-lg-4 control-label">Status:</label>
                          <div class="col-lg-4">
                            <select class="btn btn-sm btn-primary btn-lg" id="order_status_update" name="order_status_update">
                              <option value="Pending Approval" <?php echo ($order->row()->status == "Pending Approval" ? "selected": "") ?>>Pending Approval</option> 
                              <option value="Approved" <?php echo ($order->row()->status == "Approved" ? "selected": "") ?>>Approved</option>
                              <option value="Invoiced" <?php echo ($order->row()->status == "Invoiced" ? "selected": "") ?>>Invoiced</option>
                              <option value="Fulfilled" <?php echo ($order->row()->status == "Fulfilled" ? "selected": "") ?>>Fulfilled</option>
                              <option value="Pending IMEIs" <?php echo ($order->row()->status == "Pending IMEIs" ? "selected": "") ?>>Pending IMEIs</option>
                              <option value="Shipped" <?php echo ($order->row()->status == "Shipped" ? "selected": "") ?>>Shipped</option>
                              <option value="Cancelled" <?php echo ($order->row()->status == "Cancelled" ? "selected": "") ?>>Cancelled</option>
                            </select>
                          </div>
                        </div>
                        

                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="col-lg-4 control-label"></label>
                          <div class="col-lg-4">
                            <select class="btn btn-sm btn-primary btn-lg" id="order_status_payment" name="order_status_payment">
                              <option value="No Status"> No Pay Status</option>
                              <option value="Pending Payment"> Not Paid</option>
                              <option value="Paid"> Paid </option>
                              <option value="Terms"> Net Terms   </option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="col-lg-4 control-label"></label>
                          <div class="col-lg-4">
                           <a name="btn_sales_update_order" id="btn_sales_update_order" class="btn btn-sm btn-primary btn-lg" >Update Status</a>
                          </div>
                        </div>
                      </div>

                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-4" align="center">
                            <div class="form-group">
                              <label class="col-lg-4 control-label">PO Number:</label>
                              <div class="col-lg-4">
                                <spam class="form-control"><?php echo $order_id; ?></spam>
                              </div>
                            </div>

                        </div>
                        <div class="col-md-4" align="center">
                            <div class="form-group">
                              <label class="col-lg-4 control-label">SO Number:</label>
                              <div class="col-lg-4">
                                <input type="text" name="so_number" id="so_number" value=""/>
                              </div>
                            </div>

                        </div>
                        <div class="col-md-4" align="center">
                            <div class="form-group">
                              <label class="col-lg-4 control-label">Invoice:</label>
                              <div class="col-lg-4">
                                <input type="text" name="invoice_number" id="invoice_number" value=""/>
                              </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" align="center">
                            <div class="form-group">
                              <label class="col-lg-6 control-label">Order Placed On (UTC Time):</label>
                              <div class="col-lg-6">
                                <spam class="form-control"><?php echo $order->row()->date; ?></spam>
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

                      <div class="col-md-6" align="center">
                        <h4><strong>Billing Address</strong></h4>
                              
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Company Name</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Company Name" name="bcompany" id="bcompany" value="<?php echo $order->row()->bill_company; ?>">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address" name="baddress1" id="baddress1" onblur="attBillingAddress()" value="<?php echo $order->row()->bill_address; ?>">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address Complement" name="baddress2" id="baddress2" onblur="attBillingAddress()" value="<?php echo $order->row()->bill_address2; ?>">
                                  </div>
                                </div>  
                                
								<div class="form-group">
                                  <label class="col-lg-2 control-label">City</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="City" name="bcity" id="bcity" onblur="attBillingAddress()" value="<?php echo $order->row()->bill_city; ?>">
                                  </div>
								  <label class="col-lg-2 control-label">State</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="State" name="bstate" id="bstate" onblur="attBillingAddress()" value="<?php echo $order->row()->bill_state; ?>">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">ZIP</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Zip Code" name="bzip" id="bzip" onblur="attBillingAddress()" value="<?php echo $order->row()->bill_zip; ?>">
                                  </div>
								
                                  <label class="col-lg-2 control-label">Country</label>
                                  <div class="col-lg-4">
                                    <select class="form-control" name="bcountry" id="bcountry" onchange="attBillingAddress()">
									<?php
										foreach($countries->result_array() as $row){
											echo '<option value="'.$row['code'].'"';
											if($row['code'] == $order->row()->bill_country) {echo 'selected="selected"'; $billingcountry = $row['country'];}
											else if(($order->row()->bill_country == null || $order->row()->bill_country == "") && $row['code'] == $geoplugin){ echo 'selected="selected"'; $billingcountry = $row['country'];}
											echo '>'.$row['country'].'</option>';
										}
									?>
                                    </select>
                                  </div>
                                </div>
																	
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Phone</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="bphone" id="bphone" value="<?php echo $company->row()->phone;?>">
                                  </div>
                                  <label class="col-lg-2 control-label">Attention to</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Attention To" name="attention" id="attentiton" value="">
                                  </div>
								  
                                </div>
                      </div>

                      <div class="col-md-6" align="center">
                        <h4><strong>Shipping Address</strong></h4>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Company Name</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Company Name" name="scompany" id="scompany" value="<?php echo $order->row()->ship_company; ?>">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address" name="saddress1" id="saddress1" onblur="attShippingAddress()" value="<?php echo $order->row()->ship_address; ?>">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Address</label>
                                  <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="Address Complement" name="saddress2" id="saddress2" onblur="attShippingAddress()" value="<?php echo $order->row()->ship_address2; ?>">
                                  </div>
                                </div>  
                                
								<div class="form-group">
                                  <label class="col-lg-2 control-label">City</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="City" name="scity" id="scity" onblur="attShippingAddress()" value="<?php echo $order->row()->ship_city; ?>">
                                  </div>
								  <label class="col-lg-2 control-label">State</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="State" name="sstate" id="sstate" onblur="attShippingAddress()" value="<?php echo $order->row()->ship_state; ?>">
                                  </div>
                                </div>
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">ZIP</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Zip Code" name="szip" id="szip" onblur="attShippingAddress()" value="<?php echo $order->row()->ship_zip; ?>">
                                  </div>
								
                                  <label class="col-lg-2 control-label">Country</label>
                                  <div class="col-lg-4">
                                    <select class="form-control" name="scountry" id="scountry" onchange="attShippingAddress()">
									<?php
										foreach($countries->result_array() as $row){
											echo '<option value="'.$row['code'].'"';
											if($row['code'] == $order->row()->ship_country) {echo 'selected="selected"'; $shippingcountry = $row['country'];}
											else if(($order->row()->ship_country == null || $order->row()->ship_country == "") && $row['code'] == $geoplugin){ echo 'selected="selected"'; $shippingcountry = $row['country'];}
											echo '>'.$row['country'].'</option>';
										}
									?>
                                    </select>
                                  </div>
                                </div>
																	
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Phone</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="sphone" id="sphone" value="<?php echo $shipping->row()->phone;?>">
                                  </div>
								  <label class="col-lg-2 control-label">Email</label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Email" name="semail" id="semail" value="">
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
                  <div class="pull-left">Payment Method</div>
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
                        <input class="form-control" id="payment_method" name="payment_method" value="<?php echo $order->row()->pay_method; ?>"></input>
                      </div>

                     
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <h4><strong>Tax Amount (IVA)</strong></h4>
                        <input type="text" name="tax_charge" class="form-control" id="tax_charge" value="<?php echo $order->row()->tax_amount; ?>">
                        <h4><strong>Payment Terms</strong></h4>
                        <input class="form-control" id="payment_terms" name="payment_terms" value="<?php echo $order->row()->pay_terms; ?>"></input>
                      </div>

                    </div>

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
                        <h4><strong>Carrier</strong></h4>
                        <input class="form-control" id="order_ship_carrier" name="order_ship_carrier" value="<?php echo $order->row()->ship_carrier; ?>"></input>
                      </div>

                      <div class="col-md-6">
                        <h4><strong>Tracking Number</strong></h4>
                        <input class="form-control" id="track_number" name="track_number" value=""></input>
                      </div>

                     
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <h4><strong>Shipping Type</strong></h4>
                        <input class="form-control" id="ship_type" name="ship_type" value="<?php echo $order->row()->ship_type; ?>"></input>
                      </div>
                      
                      <div class="col-md-6">
                        <h4><strong>Air Way Bill</strong></h4>
                        <input class="form-control" id="air_way_bill" name="air_way_bill" value=""></input>
                      </div>

                     
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                      <h4><strong>Freight Amount</strong></h4>
                      <input type="text" class="form-control" name="fedex_charge" id="fedex_charge" value="<?php echo $order->row()->ship_freight; ?>""/>
                      </div>

                      <div class="col-md-6">
                      <h4><strong>Account Number</strong></h4>
                      <input type="text" class="form-control" name="shipping_account_number" id="shipping_account_number" value=""/>
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
                       <textarea name="order_notes" id="order_notes" rows="4" cols="50"><?php echo $order->row()->notes; ?></textarea>
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
                  <div class="pull-left">Order Items</div>
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
              <table class="table table-striped table-hover table-bordered" id="approveTable">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Tax</th>
                  <th>Total</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $total = 0;
                    /*echo "<pre>";
                    print_r($order->result()); echo "</pre>";exit;*/
                    foreach ($order->result() as $key => $row) {
                        echo "<tr>
                                <td>".($key+1)."</td>
                                <td>".$row->description."</td>
                                <td>".form_input(array("type"=>"number","name"=>"qtd","class"=>"form-control","value"=>$row->qty))."</td>
                                <td>".form_input(array("type"=>"text","name"=>"qtd","class"=>"form-control","value"=>$row->unit_price))."</td>
                                <td>0.00</td>
                                <td>".$row->recurring_price."</td>
                                <td align='center'>".form_button("btnUpdateGrid","<i class='fa fa-check'></i>",array("class"=>"btn btn-xs btn-default","style"=>"color: blue;")).form_button("btnReset","<i class='fa fa-close'></i>",array("class"=>"btn btn-xs btn-default",'style'=>"color: red;"))."</td>
                              </tr>";
                        $total += $row->recurring_price;
                    }
                  ?>
                </tbody>    
                <tfoot>                                                                                                           
                <tr>  
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><strong>Total</strong></td>
                  <td><strong id="totalApprove"><?php echo $order->row()->items_total; ?></strong></td>
                  <td></td>
                </tr>
                </tfoot>
              </table>

              <div id="approveItens">
                
              </div>

            </div>
              
                      </div>

                    </div>

                  </div>
                  <div class="widget-foot">
          <div class="pull-right">
            <input type="submit" class="btn btn-primary btn-sm" value="Update Order"></input> &nbsp; 
            <a href="<?php echo $portal_path;?>main" class="btn btn-danger btn-sm">Cancel</a>
          </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>  
              
            </div>
          </div>
        </div>

        
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Log</div>
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
							<table class="table table-striped table-hover table-bordered" id="approveTable">
							  <thead>
								<tr>
								  <th>#</th>
								  <th>UTC Date and Time</th>
								  <th>Status Change</th>
								  <th>Legal Representative</th>
								</tr>
							  </thead>
							  <tbody>
								  <?php 
                    $total = 0;
                    foreach ($log->result() as $key => $row) {
                        echo "<tr>
                                <td>".($key+1)."</td>
                                <td>".$row->date."</td>
                                <td>".$row->status."</td>
                                <td>".$row->f_name." ".$row->l_name."</td>
                              </tr>";
                    }
                  ?>
				        </tbody>    
							</table>

						</div>
							
                      </div>

                    </div>

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

$(document).ready(function(){
  $("#btn_sales_update_order").click(function(){
      $.ajax({
      url: "<?php echo $portal_path;?>order/updateStatusOrder",
      type: 'POST',
      data: {order: $("#order_id").val(), status : $("#order_status_update option:selected").val(), payment: $("#order_status_payment option:selected").val(), account: $("#account_id").val()},
      dataType : 'json',
      success: function(data){

        if(data.response == true){
            location.reload();
        }
      },
      error: function(){
      }
    });


  })

})






</script>

<!-- User JavaScript ends -->
