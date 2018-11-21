<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>
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
          <div class="widget-content">
            <div class="padd statement">
            <?php 
              if($user_type != "Reseller"){
                echo '
                <div class="row">
                <div class="col-md-4">
                  <div class="well">
                    <h2 align="right">$'.number_format($cm_earnings,2,".",",").'</h2>
                    <p align="center">Current Month Earnings</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="well">
                    <h2 align="right">$'.number_format($pm_earnings,2,".",",").'</h2>
                    <p align="center">Previous Month Earning</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="well">
                    <h2 align="right">$'.number_format($t_earnings,2,".",",").'</h2>
                    <p align="center">All Time Earning</p>
                  </div>
                </div>
              </div>
                ';

              }
            ?>  
              
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
                      
                      <div id="demo">
                        <style>
                          .tablesorter thead .disabled {
                              display:none;
                          }
                        </style>
                        <table> <!-- bootstrap classes added by the uitheme widget -->
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Status</th>
                              <th>Bill Company</th>
                              <th>Date</th>
                              <th>Total</th>
                              <th>Sales Rep</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>#</th>
                              <th>Status</th>
                              <th>Bill Company</th>
                              <th>Date</th>
                              <th>Total</th>
                              <th>Sales Rep</th>
                            </tr>
                            <tr>
                              <th colspan="6" class="ts-pager form-inline">
                                <div class="btn-group btn-group-sm" role="group">
                                  <button type="button" class="btn btn-default first"><span class="fa fa-fast-backward"></span></button>
                                  <button type="button" class="btn btn-default prev"><span class="fa fa-backward"></span></button>
                                </div>
                                <span class="pagedisplay"></span>
                                <div class="btn-group btn-group-sm" role="group">
                                  <button type="button" class="btn btn-default next"><span class="fa fa-forward"></span></button>
                                  <button type="button" class="btn btn-default last"><span class="fa fa-fast-forward"></span></button>
                                </div>
                                <select class="form-control input-sm pagesize" title="Select page size">
                                  <option selected="selected" value="10">10</option>
                                  <option value="20">20</option>
                                  <option value="30">30</option>
                                  <option value="all">All Rows</option>
                                </select>
                                <select class="form-control input-sm pagenum" title="Select page number"></select>
                              </th>
                            </tr>
                          </tfoot>
                          <tbody>
                            <?php
                              $i = 1;  
                              $mapIndex = 0;
                              foreach($orders['orders'] as $order){
                                echo "<tr>";
                                echo "<td class='clickable-td' data-href='".$portal_path."main/vieworder/".$order['id']."'>".$order['id']."</td>";
                                echo "<td class='clickable-td' data-href='".$portal_path."main/vieworder/".$order['id']."'>";
                                
                                if ($order['status'] == "Shipped"){
                                  echo "<span class='label label-success'>";
                                  echo $order['status']."</span></h4></td>";
                                }else if ($order['status'] == "Invoiced"){
                                  echo "<span class='label label-primary'>";
                                  echo $order['status']."</span></h4></td>";
                                }else if ($order['status'] == "New"){
                                  echo "<span class='label label-warning'>";
                                  echo $order['status']."</span></h4></td>";
                                }else if ($order['status'] == "Approved"){
                                  echo "<span class='label label-info'>";
                                  echo $order['status']."</span></h4></td>";
                                }else if ($order['status'] == "Cancelled"){
                                  echo "<span class='label label-danger'>";
                                  echo $order['status']."</span></h4></td>";
                                }
                                else{
                                  echo "<span>";
                                  echo $order['status']."</span></h4></td>";   
                                }
                                echo "<td class='clickable-td' data-href='".$portal_path."main/vieworder/".$order['id']."'>".$order['bill_company']."</td>";
                                echo "<td class='clickable-td' data-href='".$portal_path."main/vieworder/".$order['id']."'>".$order['date']."</td>";
                                echo "<td align='right' class='clickable-td' data-href='".$portal_path."main/vieworder/".$order['id']."'>".number_format($order['order_total'], 2, '.', ',')."</td>";
                                 echo "<td class='clickable-td' data-href='".$portal_path."main/vieworder/".$order['id']."'>".$order['salesRepName']."</td></tr>";
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- use the filter_reset : '.reset' option or include data-filter="" using the filter button demo code to reset the filters -->
                    <div class="bootstrap_buttons">
                      <button type="button" class="reset btn btn-primary" data-column="0" data-filter=""><i class="icon-white icon-refresh glyphicon glyphicon-refresh"></i> Reset filters</button>
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
