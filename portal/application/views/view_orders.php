<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>

<!-- Main bar -->
<div class="mainbar">
      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-o"></i>View Orders</h2>
        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">View Orders</a>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- Page heading ends -->

    <!-- Matter -->
      <div class="matter">
        <div class="container">
          <!-- Table -->
          <div class="row">
              <div class="col-md-12">
                <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Orders</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <thead>
              <tr>
                <th>#</th>
                <th>Status</th>
                <th>Order ID</th>
                <th>Account #</th>
                <th>Sales Rep #</th>
                <th>Bill Company</th>
                <th>Ship Company</th>
                <th>Date</th>
                <th>Total $</th>
              </tr>
              </thead>
              <tbody>

                <?php
                  if($page == 1 ){
                    $i = $page;  
                  }else if ($page > 1){
                    $i = $rows * ($page-1) + 1;
                  }

                  foreach($orders['orders'] as $order){
                    echo "<tr class='clickable-row' data-href='".$portal_path."main/vieworder/".$order['id']."'>";
                    echo "<td>".($i++)."</td>";
                    echo "<td><h4>";
                    if ($order['status'] == "Fulfilled"){
                      echo "<span class='label label-success'>";
                    }else if ($order['status'] == "Approved"){
                      echo "<span class='label label-primary'>";
                    }else if ($order['status'] == "Pending Approval"){
                      echo "<span class='label label-default'>";
                    }else if ($order['status'] == "Pending IMEIs"){
                      echo "<span class='label label-info'>";
                    }else if ($order['status'] == "Pending Contract"){
                      echo "<span class='label label-warning'>";
                    }else if ($order['status'] == "Pending Payment"){
                      echo "<span class='label label-danger'>";
                    }

                    echo $order['status']."</span></h3></td>";
                    echo "<td>".$order['id']."</td>";
                    echo "<td>".$order['account_id']."</td>";
                    echo "<td>".$order['sales_rep_id']."</td>";
                    echo "<td>".$order['bill_company']."</td>";
                    echo "<td>".$order['ship_company']."</td>";
                    echo "<td>".$order['date']."</td>";
                    echo "<td>".$order['order_total']."</td>";  
                  }

                ?>

                </tbody>
            </table>
          </div>
          <div class="widget-foot">
            <ul class="pagination pagination-sm pull-right">

            <?php
              $numberOfPages = ceil($orders["NumberOfOrders"] / $rows);
              if ($page > 1){
                echo '<li><a href="'.$portal_path."main/vieworders/".$type."/"."1"."/".$rows.'">First</a></li>';
                echo '<li><a href="'.$portal_path."main/vieworders/".$type."/".($page-1)."/".$rows.'"><-</a></li>';
              }
              $aux = 2;
              $first = $page - $aux;
              $last = $page + $aux;
              $limit = $aux*2+1;
              $count = 0;
              if(($page - $aux) > 0 && ($page + $aux) <= $numberOfPages){
                for($i = $first; $i <= $last; $i++){
                  if($i == $page){
                    echo '<li><a href="'.$portal_path."main/vieworders/".$type."/".($i)."/".$rows.'"><b>'.($i).'</b></a></li>';
                  }else{
                    echo '<li><a href="'.$portal_path."main/vieworders/".$type."/".($i)."/".$rows.'">'.($i).'</a></li>';
                  }
                }
              }else{
                $excess=0;
                for($a=$page; $a<$numberOfPages; $a++){
                  $excess++;
                }
                if($page == $numberOfPages){
                  $excess = 2;
                }
                for($i = $first-$excess; $i <= $numberOfPages; $i++){
                  if($i > 0 && $count < $limit){
                    $count++;
                    if($i == $page){
                      echo '<li><a href="'.$portal_path."main/vieworders/".$type."/".($i)."/".$rows.'"><b>'.($i).'</b></a></li>';
                    }else{
                      echo '<li><a href="'.$portal_path."main/vieworders/".$type."/".($i)."/".$rows.'">'.($i).'</a></li>';
                    }
                  } 
                }
              }
              if ($page < $numberOfPages){
                echo '<li><a href="'.$portal_path."main/vieworders/".$type."/".($page+1)."/".$rows.'">-></a></li>';
                echo '<li><a href="'.$portal_path."main/vieworders/".$type."/".($numberOfPages)."/".$rows.'">Last</a></li>';
              }
            ?>

            </ul>
            <div class="clearfix"></div> 
          </div>
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

<!-- User JavaScript starts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});
</script>