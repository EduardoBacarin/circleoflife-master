<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>

<!-- Main bar -->
<div class="mainbar">
      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-o"></i><?php echo " ".$sales_rep_info->f_name." ".$sales_rep_info->l_name; ?> </h2>
        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">View Clients</a>
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
                  <div class="pull-left">Clients</div>
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
                <th>Coach</th>
                <th>Client</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  if($page == 1 ){
                    $i = $page;  
                  }else if ($page > 1){
                    $i = $rows * ($page-1) + 1;
                  }

                  foreach($customers['customers'] as $customer){
                    echo "<tr class='clickable-row' data-href='".$portal_path."main/viewcustomer/".$customer['id']."'>";
                    echo "<td>".($i++)."</td>";
                    echo "<td>".$customer['salesRepName']."</td>";
                    echo "<td>".$customer['companyName']."</td>";
                    echo "<td>".$customer['f_name']." ".$customer['l_name']."</td>";
                    echo "<td>".$customer['companyAddress']."</td>";
                    echo "<td>".$customer['companyPhone']."</td>";
                  }
                ?>
                </tbody>
            </table>
          </div>
          <div class="widget-foot">
            <ul class="pagination pagination-sm pull-right">

            <?php
              $numberOfPages = ceil($customers["NumberOfCustomers"] / $rows);
              if ($page > 1){
                echo '<li><a href="'.$portal_path."main/viewcustomers/".$type."/"."1"."/".$rows.'">First</a></li>';
                echo '<li><a href="'.$portal_path."main/viewcustomers/".$type."/".($page-1)."/".$rows.'"><-</a></li>';
              }
              $aux = 2;
              $first = $page - $aux;
              $last = $page + $aux;
              $limit = $aux*2+1;
              $count = 0;
              if(($page - $aux) > 0 && ($page + $aux) <= $numberOfPages){
                for($i = $first; $i <= $last; $i++){
                  if($i == $page){
                    echo '<li><a href="'.$portal_path."main/viewcustomers/".$type."/".($i)."/".$rows.'"><b>'.($i).'</b></a></li>';
                  }else{
                    echo '<li><a href="'.$portal_path."main/viewcustomers/".$type."/".($i)."/".$rows.'">'.($i).'</a></li>';
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
                      echo '<li><a href="'.$portal_path."main/viewcustomers/".$type."/".($i)."/".$rows.'"><b>'.($i).'</b></a></li>';
                    }else{
                      echo '<li><a href="'.$portal_path."main/viewcustomers/".$type."/".($i)."/".$rows.'">'.($i).'</a></li>';
                    }
                  } 
                }
              }
              if ($page < $numberOfPages){
                echo '<li><a href="'.$portal_path."main/viewcustomers/".$type."/".($page+1)."/".$rows.'">-></a></li>';
                echo '<li><a href="'.$portal_path."main/viewcustomers/".$type."/".($numberOfPages)."/".$rows.'">Last</a></li>';
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