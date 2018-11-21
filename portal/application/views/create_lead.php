<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>
    <!-- Main bar -->
    <div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-home"></i> Create New Leads</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Create Leads</a>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- Page heading ends -->
      <!-- Matter -->

      <div class="matter">
        <div class="container">
          <div class="row">
            <!-- post sidebar -->
            <div class="col-md-4">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Import Leads</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    
          <form class="form" action="<?php echo $portal_path;?>upload/do_upload_leads" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <h4><b>Select KML File</b></h4>
            <input type="file" name="userfile" id="userfile">
            
            <select class="form-control" placeholder="Sales Representative" name="salesRep" id="salesRep" >
                <?php
                  if($salesRep!=FALSE){
                    if($salesRep->num_rows > 1){
                      echo "<option>Select Sales Representative</option>";
                    }
                    foreach($salesRep->result_array() as $row){
                      echo '<option value="'.$row['id'].'">'.$row['f_name'].' '.$row['l_name'].'</option>';
                    }
                  }
                ?>
            </select>

            <div class="clearfix"></div>
          
            <div class="buttons">
              <button class="btn btn-sm btn-primary" value="upload">Import Leads</button>
            </div>
          </form>
                  </div>
                  <div class="widget-foot">
                  </div>
                </div>
              </div>   
            </div>

            <div class="col-md-6">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Leads</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">

<?php
  if(isset($error)){
    echo $error;
  }            
  if(isset($upload_data)){
    //echo $upload_data['file_name'];
    $xml=simplexml_load_file("./uploads/".$upload_data['file_name']) or printf("Error: Cannot create object");
    foreach ($xml->Folder->Placemark as $dealer) {
      echo '<h3>', $dealer->name, '</h3>', 
      '<b>Address: </b>', $dealer->address, '<br>', 
      '<b>Phone: </b>', $dealer->phoneNumber, '<br>',
      '<b>Coordinates: </b>', $dealer->Point->coordinates, '<br> <hr>',
      PHP_EOL;
    }
  }
?>
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
    <!-- Matter ends -->