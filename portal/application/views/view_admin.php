<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>
    <!-- Main bar -->
    <div class="mainbar">
      
      <!-- Page heading -->
      <div class="page-head">
        <!-- Page heading -->
        <h2 class="pull-left"><i class="fa fa-file-o"></i><?php echo " ".$admin_info->f_name." ".$admin_info->l_name; ?> - Administrator</h2>
        </h2>


        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="fa fa-home"></i> View / Edit</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Administrator</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->


      <!-- Matter -->
      <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">Information</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    <br />
                    <!-- Form starts.  -->
                    <form class="form-horizontal" role="form" id="editUserType" name="editUserType" action="<?php echo $portal_path;?>account/edit_usertype" method="POST">                                                <div class="form-group">
                          <label class="col-lg-4 control-label">First Name</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="First Name" id="f_name" name="f_name" value="<?php echo $admin_info->f_name; ?>" readonly>
                          </div>
                        </div>
                                
                        <div class="form-group">
                          <label class="col-lg-4 control-label">Last Name</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Last Name" id="l_name" name="l_name" value="<?php echo $admin_info->l_name; ?>" readonly>
                          </div>
                        </div>
                      
                        <div class="form-group">
                          <label class="col-lg-4 control-label">Email</label>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="<?php echo $admin_info->email ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-12">
                            <!--
                            <button type="button" class="btn btn-sm btn-default" >Edit</button>-->
                            <!-- Lumar Motta - Add Option to Promote tp Admin  05/30/2018 -->
                            <!-- Form Calls -->

                              <input form="editUserType" type="hidden" name="user_type" value="Sales">
                              <input form="editUserType" type="hidden" name="user_id" value="<?php echo $admin_info->id; ?>">
                              <button form="editUserType" id="editUserType" type="submit" name="editUserType" value="editUserType" class="btn btn-sm btn-primary">Assign as Coach</button>
                            <!--<button type="button" class="btn btn-sm btn-success">Success</button>
                            <button type="button" class="btn btn-sm btn-info">Info</button>
                            <button type="button" class="btn btn-sm btn-warning">Warning</button>
                            <button type="button" class="btn btn-sm btn-danger">Danger</button>-->
                          </div>
                        </div>    
                      </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Statement</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd statement">  
                    <div class="row">
                      <div class="col-md-4">
                        <div class="well">
                          <h2 align='right'>$<?php echo number_format($cm_earnings,2,".",","); ?></h2>
                          <p align="center">Current Month Earnings</p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="well">
                          <h2 align='right'>$<?php echo number_format($pm_earnings,2,".",","); ?></h2>
                          <p align="center">Previous Month Earning</p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="well">
                          <h2 align='right'>$<?php echo number_format($t_earnings,2,".",","); ?></h2>
                          <p align="center">All Time Earning</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <hr />
                        <div class="table-responsive">
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
                                <th>Coach</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Bill Company</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Coach</th>
                              </tr>
                              <tr>
                                <th colspan="6" class="ts-pager form-inline">
                                  <div class="btn-group btn-group-sm" role="group">
                                    <button type="button" class="btn btn-default first"><span class="fa fa-fast-backward" ></span></button>
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
                              /*
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
                                */
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
    <!-- Matter ends -->
          </div>
        </div>
          <!-- Mainbar ends -->
         <div class="clearfix"></div>
      </div>
      <!-- Content ends -->
      </div>