<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;

  if($user_type=="Admin"){
    $readOnly = "false";
  }else if($user_type=="Sales"){
    $readOnly = "false";
  }else if($user_type=="Reseller"){
    $readOnly = "true";
  }

?>

<!-- Main bar -->
<div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-o"></i>Place Order From <?php echo ucfirst($warehouse); ?> Warehouse</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Place Order From <?php echo ucfirst($warehouse); ?> Warehouse</a>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- Page heading ends -->

    <form class="form-horizontal" role="form" id="placeOrder" name="placeOrder" action="<?php echo $portal_path;?>order/placeorder" method="POST">
    
      <!-- Lease Plans Matter -->
      <input type="hidden" name="account_id" id="account_id" value=""/>
      <input type="hidden" name="company_name" id="company_name" value=""/>
      <input type="hidden" name="order_ship_from" value="<?php echo $warehouse ?>"/>
      <div class="matter">

        <input type="hidden" id="LeaseItemsTotal" name="LeaseItemsTotal" value="0" />

        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1> Work in Progress....
              </h1>
              <p>We're working to finish it as soon as possible.</p>
              
            </div>
          </div>
        </div>


  </form>
   <!-- Mainbar ends -->
   <div class="clearfix"></div>
</div>
<!-- Content ends -->

<!-- User JavaScript starts -->
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

