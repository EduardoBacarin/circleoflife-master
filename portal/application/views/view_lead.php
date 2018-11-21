<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>

<!-- Main bar -->
<div class="mainbar">
      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-o"></i>View Lead</h2>
        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">View Lead</a>
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
                  <div class="pull-left">Lead Summary</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd invoice">
                    <div class="row">
                      <div class="col-md-6">
                        <h4><strong><?php echo $lead['name']; ?></strong></h4>
                        <p id="lead_info">
                        <?php echo "<b>Address: </b>".$lead['address']; ?> 
                        <BR>
                        <?php echo "<b>Contact Name: </b>".$lead['fname']." ".$lead['lname']; ?> <BR>
                        <?php echo "<b>Phone: </b>".$lead['phone']; ?> <BR>
                        <BR>
                        </p>
                        <?php
                          $start = strpos($lead['point'], ",");
                          $lng = substr($lead['point'], 0, $start);
                          $end = strrpos($lead['point'], ",");
                          $lat = substr($lead['point'], $start+1, $end-($start+1));
                        ?>
                        <div id="map"></div>
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
                      <div class="col-md-6"> 
                        <form class="form-horizontal" role="form" id="editLead" name="editLead" action="<?php echo $portal_path;?>lead/edit" method="POST">
                        <input type="hidden" name="lead_id" value="<?php echo $lead['id'] ?>"/>
                        <input type="hidden" name="salesRep_id" value="<?php echo $lead['salesRep_id'] ?>"/>
                        <input type="hidden" name="lead_point" value="<?php echo $lead['point'] ?>" />
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Dealership Name</label>
                          <div class="col-lg-5">
                          <input type="text" class="form-control" name="leadName" placeholder="<?php if($lead['name']!=""){echo $lead['name'];}else{ echo "First Name";} ?>" >
                          </div>
                        </div>
                                
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Address</label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" name="leadAddress" placeholder="<?php echo $lead['address']; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Contact Name</label>
                          <div class="col-lg-5">
                            <input type="text" class="form-control" name="leadFirstName" placeholder="<?php if($lead['fname']!=""){echo $lead['fname'];}else{ echo "First Name";} ?>">
                          </div>
                          <div class="col-lg-5">
                            <input type="text" class="form-control" name="leadLastName" placeholder="<?php if($lead['lname']!=""){echo $lead['lname'];}else{ echo "Last Name";} ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Phone</label>
                          <div class="col-lg-5">
                            <input type="text" class="form-control" name="leadPhone" placeholder="<?php echo $lead['phone']; ?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label">Notes</label>
                          <div class="col-lg-10">
                            <textarea class="form-control" rows="5" name="leadNotes" placeholder="Textarea"><?php echo $lead['notes']; ?></textarea>
                          </div>
                        </div>
                                
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-5">
                            <select class="form-control" name="leadStatus">
                              <option <?php if($lead['status']=="New") echo "selected"; ?>>New</option>
                              <option <?php if($lead['status']=="Visited") echo "selected"; ?>>Visited</option>
                              <option <?php if($lead['status']=="Pending") echo "selected"; ?>>Pending</option>
                              <option <?php if($lead['status']=="Other") echo "selected"; ?>>Other</option>
                              <option <?php if($lead['status']=="Not Interested") echo "selected"; ?>>Not Interested</option>
                            </select>
                          </div>
                        </div>
                                
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-6">
                            <button type="submit" name="update" value="Update" class="btn btn-sm btn-info">Update</button>
                            <button type="submit" name="create" value="Create Customer" class="btn btn-sm btn-primary">Create Customer</button>
                            <button type="submit" name="delete" id="delete" value="Delete" class="btn btn-sm btn-danger">Delete</button>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="widget-content">
                        <div class="padd">
                          <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Activity Log</div>
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
                            echo "<li><b>".$line['status']." at ".$line['date']." Note: ".$line['notes']."</b></li>";
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
<!-- -->
              </div>
              </div>
            </div>
            <br>
            <div class="col-md-6">
              <form class="form-horizontal" role="form" id="logLead" name="logLead" action="<?php echo $portal_path;?>lead/log" method="POST">
              <input type="hidden" name="lead_id" value="<?php echo $lead['id'] ?>"/>
              <input type="hidden" name="salesRep_id" value="<?php echo $lead['salesRep_id'] ?>"/>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Action Item</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="leadLogComment" placeholder="">
                  </div>
                </div>
              <div class="form-group">
              <label class="col-lg-2 control-label">Schedule Date/Time</label>
                <div class="col-lg-5">
                  <input type="date" class="form-control" name="leadLogDate" placeholder="">
                  <input type="time" class="form-control" name="leadLogTime" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Action Item Type</label>
                <div class="col-lg-5">
                  <select class="form-control" name="logStatus">
                    <option>Schedule Call</option>
                    <option>Schedule Visit</option>
                    <option>Call Comments</option>
                    <option>Visit Commetns</option>
                    <option>Other</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-6">
                  <button type="submit" name="updateLog" value="UpdateLog" class="btn btn-sm btn-info">Update Log</button>
                </div>
              </div>       
            </form>
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
</div>
    <!-- Matter ends --> 
    <!-- Mainbar ends -->
  
   <div class="clearfix"></div>
</div>
<!-- Content ends -->

<!-- User JavaScript starts -->
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>                             
$("#delete").click(function( event ) {
  var submit = confirm("Are you sure you want to delete this lead?");
  if( submit == false){
    event.preventDefault();
  }
});
</script>