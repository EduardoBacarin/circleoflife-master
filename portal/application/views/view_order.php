<?php 
	$theme_path = THEMEPATH;
	$portal_path = PORTALPATH;
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
    <div class="clearfix">
    </div>
  </div>
      <!-- Page heading ends -->
   <form  id="printlOrder" name="printlOrder" action="<?php echo $portal_path."order/viewOrder_pdf/".$order['order']->id; ?>" method="POST" target="_blank"></form>
	<!-- Matter -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="widget">
          <div class="widget-head">
            <div class="pull-left">Order # <?php echo $order['order']->id; ?> Summary
            </div>
            <div class="widget-icons pull-right">
             
              <button form="printlOrder" type="submit" name="print" id="print" value="Cancel" class="btn btn-sm btn-default">View PDF</button>
              <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
            </div>  
            <div class="clearfix">

            </div>
          </div>
          <div class="widget-content">
            <div class="padd invoice">
              <div class="row">
                <div class="col-md-4">
                  <h4><strong>Billing Address</strong></h4>
                  <p id="b_address">
                  <?php echo $order['order']->bill_company; ?> <BR>
                  <?php echo $order['order']->bill_address; ?> <BR>
                  <?php echo $order['order']->bill_address2; ?> <BR>
                  <?php echo $order['order']->bill_state.", ".$order['order']->bill_zip." - ".$order['order']->bill_country; ?> <BR>
                  </p>
                </div>
                <div class="col-md-4">
                  <h4><strong>Shipping Address</strong></h4>
                  <p id="s_address">
                  <?php echo $order['order']->ship_company; ?> <BR>
                  <?php echo $order['order']->ship_address; ?> <BR>
                  <?php echo $order['order']->ship_address2; ?> <BR>
                  <?php echo $order['order']->ship_state.", ".$order['order']->ship_zip." - ".$order['order']->ship_country; ?> <BR>
                  </p>                        
                </div>
                <div class="col-md-4">
                  <h4><strong>Order No. <?php echo $order['order']->id; ?> </strong></h4>
                  <p>
                  <?php
                    if(trim($order['order']->invoice)!=""){
                      echo "<strong>Invoice No</strong> : ".$order['order']->invoice.'<BR>';   
                    }else{
                      echo '<strong>Invoice No</strong> : <input type="text" form="invoiceOrder" id="invoiceNumber" name="invoiceNumber" placeholder="Invoice Number" ';
                      if(trim($order['order']->status) == "New"){
                        echo "readonly";
                      }
                      echo '></input><BR>'; 
                    }
                    echo '<font color="red">'.form_error('invoiceNumber').'</font>';
                  ?>
                  <?php
                    $date = $order['order']->date;
                    $date = new DateTime($date);
                    $date = $date->format('Y-m-d');
                  ?>
                  <strong>Date</strong> : <?php echo $date; ?><br>
                  <strong>Account No</strong> : <?php echo $order['order']->account_id; ?><br>
                  <strong>Status </strong> :
                  <?php
                    if ($order['order']->status == "Shipped"){
                      echo "<span class='label label-success'>";
                    }else if ($order['order']->status == "Invoiced"){
                      echo "<span class='label label-primary'>";
                    }else if ($order['order']->status == "Approved"){
                      echo "<span class='label label-info'>";
                    }else if ($order['order']->status == "New"){
                      echo "<span class='label label-warning'>";
                    }else if ($order['order']->status == "Cancelled"){
                      echo "<span class='label label-danger'>";
                    }else{
                      echo "<span class='label label-default'>";
                    }
                    echo $order['order']->status.'</span>';
                  ?>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong>Paid</strong>? :
                  <?php  
                    if ($order['order']->paid == false || $order['order']->paid == null){
                      echo "<span class='label label-danger'> No </span><br>";
                    }else{
                      echo "<span class='label label-success'> Yes </span><br>";
                    }
                  ?>
                  <?php
                    if(trim($order['order']->status) == "Shipped" ){
                      echo "<strong>Tracking # </strong>: ".$order['order']->tracking_num.'<BR>';
                    }else{
                      echo '<strong>Tracking # </strong>: '.'<input type="text" form="shipOrder" id="trackingNumber" name="trackingNumber" placeholder="Tracking Number" ';
                      if(trim($order['order']->status) == "New" || trim($order['order']->status) == "Approved" ){
                        echo "readonly";
                      }
                      echo '></input><BR>';
                      echo '<font color="red">'.form_error('trackingNumber').'</font>';
                    }
                  ?>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <hr/>
						        <div class="table-responsive">
                      <table class="table table-striped table-hover table-bordered" id="approveTable">
                        <thead>
								          <tr>
          								  <th>#</th>
          								  <th>Code</th>
          								  <th>Description</th>
                            <th>Quantity</th>
          								  <th>Price $</th>
          								  <th>Total $</th>
								          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $i = 1;
                          foreach($order['items'] as $item){
                            if(array_key_exists("standard_products_id", $item))
                            {
                              echo "<tr>";
                              echo "<td>".($i++)."</td>";
                              echo "<td>".$item['code']."</td>";
                              echo "<td>".$item['description']."</td>";
                              echo "<td align=right>".$item['qty']."</td>";
                              $pay = $item['unit_price'];
                              echo "<td align=right>".number_format($pay, 2, ".", ",")."</td>";
                              $total = $pay * $item['qty'];
                              echo "<td align=right>".number_format($total, 2, ".", ",")."</td>";
                              echo "</tr>";
                            }
                            if(array_key_exists("order_fees_id", $item))
                            {
                              echo "<tr>";
                              echo "<td>".($i++)."</td>";
                              echo "<td>".$item['code']."</td>";
                              echo "<td>".$item['description']."</td>";
                              echo "<td align=right>1</td>";
                              $pay = $item['price'];
                              echo "<td align=right>".number_format($pay, 2, ".", ",")."</td>";
                              $total = $pay;
                              echo "<td align=right>".number_format($total, 2, ".", ",")."</td>";
                              echo "</tr>";
                            }
                          }                
                        ?>
				                </tbody>    
                      <tfoot>                                                                             
								        <tr>
        								  <td colspan="5" align="right"><strong>Total</strong></td>
        								  <td align=right><strong id="totalApprove">$<?php echo number_format($order['order']->order_total, 2, ".", ","); ?></strong></td>
        								</tr>
                      </tfoot>
                    </table>
                    <form class="form" role="form" id="approveOrder" name="approveOrder" action="<?php echo $portal_path."order/approve/".$order['order']->id; ?>" method="POST"> </form>
                    <form class="form" role="form" id="editOrder" name="editOrder" action="<?php echo $portal_path."order/edit/".$order['order']->id; ?>" method="POST"> </form>
                    <form class="form" role="form" id="cancelOrder" name="cancelOrder" action="<?php echo $portal_path."order/cancel/".$order['order']->id; ?>" method="POST"> </form>
                    <form class="form" role="form" id="invoiceOrder" name="invoiceOrder" action="<?php echo $portal_path."order/invoice/".$order['order']->id; ?>" method="POST"> </form>
                    <form class="form" role="form" id="shipOrder" name="shipOrder" action="<?php echo $portal_path."order/ship/".$order['order']->id; ?>" method="POST"> </form>
                    <form class="form" role="form" id="payOrder" name="payOrder" action="<?php echo $portal_path."order/pay/".$order['order']->id; ?>" method="POST"> </form>
                    <div class="widget-content">
                      <div class="padd">
                        <div class="buttons">
                          <div class="row">  
                            <div class="col-md-12">  
                            <?php
                              echo '<font color="red">'.validation_errors().'</font>';
                              if($this->session->userdata("user_type") == "Admin"){
                                if ($order['order']->status == "New"){
                                  echo '<button form="cancelOrder" type="submit" name="cancel" id="cancel" value="Cancel" class="btn btn-sm btn-danger">Cancel It</button>';
                                  echo '<button form="approveOrder" class="btn btn-primary btn-sm" id="approveOrder" name="approveOrder">Approve Order</button>';
                                }else if ($order['order']->status == "Approved"){
                                  echo '<button form="cancelOrder" type="submit" name="cancel" id="cancel" value="Cancel" class="btn btn-sm btn-danger">Cancel It</button>';
                                  echo '<button form="invoiceOrder" class="btn btn-primary btn-sm" id="invoiceOrder" name="invoiceOrder">Mark as Invoiced</button>';
                                }else if($order['order']->status == "Invoiced"){
                                      echo '<button form="shipOrder" class="btn btn-success btn-sm" id="shipOrder" name="shipOrder">Mark as Shipped</button>';
                                }
                                if ($order['order']->paid == false || $order['order']->paid == null){
                                      echo '<button form="payOrder" class="btn btn-warning btn-sm" id="payOrder" name="shipOrder">Mark as Paid</button>';
                                }
                              }else if($this->session->userdata("user_type") == "Sales"){
                                if ($order['order']->status == "New"){
                                  echo '<button form="cancelOrder" type="submit" name="cancel" id="cancel" value="Cancel" class="btn btn-sm btn-danger">Cancel It</button>';
                                }else if ($order['order']->status == "Approved"){
                                  echo '<button form="payOrder" class="btn btn-warning btn-sm" id="payOrder" name="payOrder">Mark as Paid</button>';
                                  echo '<button form="cancelOrder" type="submit" name="delete" id="delete" value="Delete" class="btn btn-sm btn-danger">Cancel Order</button>';
                                }else if($order['order']->status == "Invoiced"){
                                  echo '<button form="shipOrder" class="btn btn-success btn-sm" id="shipOrder" name="shipOrder">Mark as Shipped</button>';
                                }
                              }else if($this->session->userdata("user_type") == "Reseller"){
                                if ($order['order']->status == "New"){
                                  echo '<button class="btn btn-default btn-sm" id="editOrder" name="editOrder">Edit</button>';
                                  echo '<button form="cancelOrder" type="submit" name="cancel" id="cancel" value="Cancel" class="btn btn-sm btn-danger">Cancel It</button>';
                                }else if ($order['order']->status == "Approved"){
                                  echo '<button class="btn btn-primary btn-sm" id="payOrder" name="payOrder">Pay Now</button>'; 
                                  echo '<button form="cancelOrder" type="submit" name="cancel" id="cancel" value="Cancel" class="btn btn-sm btn-danger">Cancel It</button>';
                                }
                              }
                            ?>
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
                          <div class="padd">    
                            <div class="error-log">
                            <?php
                              echo $order['order']->notes;
                            ?>
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
      </div>
    </div>
  </div>
	<!-- Matter ends -->

  
  <?php 
    if($user_type!="Reseller"){
      echo '
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-head">
                <div class="pull-left">Order Log</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>               
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">    
                    <div class="error-log">
                      <ul>';
      foreach ($log as $row){
                  echo '<li><span><b>'.$row['date'].'</b> ';
        if($row['status']=="Created"){
                  echo '<span>'.$row['status'].'</span> ';
        }else if($row['status']=="Cancelled"){
                  echo '<span class="red">'.$row['status'].'</span> ';
        }else{
                  echo '<span>'.$row['status'].'</span> ';
        }
                  echo 'by '.$row['name'];
                  echo '</span></li>';
      }
                echo '</ul>
                    </div>
                  </div>
                </div>
              </div>    
            </div>
          </div>
        </div>';
    }
  ?>
        <div class="widget-foot">
        <!-- Footer goes here -->
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
	  <!-- Matter Log -->
    <!-- Mainbar ends -->
   <div class="clearfix"></div>
</div>
<!-- Content ends -->

<!-- User JavaScript starts -->
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>                             
$("#delete").click(function( event ) {
  var submit = confirm("Are you sure you want to cancel this order?");
  if( submit == false){
    event.preventDefault();
  }
});
</script>