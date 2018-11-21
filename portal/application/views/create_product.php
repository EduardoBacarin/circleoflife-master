  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left"><i class="fa fa-file-o"></i> Create Product</h2>
        </h2>


        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Create Product</a>
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
                  <div class="pull-left">Create Single Product</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    <br />
                    <!-- Form starts.  -->
                    <form class="form-horizontal" role="form" id="createProduct" name="createProduct" action="<?php echo PORTALPATH; ?>products/addStandardProductFromForm" method="POST">
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Product Code</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="code" placeholder="Product Code">
                        </div>
                      </div>
                      <?php echo form_error('code');?>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Type</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="type" placeholder="Product Type">
                        </div>
                      </div>
                      <?php echo form_error('type');?>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Price</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="price" placeholder="0.00">
                        </div>
                      </div>
                      <?php echo form_error('price');?>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Comission</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="commission" placeholder="0.00">
                        </div>
                      </div>
                      <?php echo form_error('commission');?>
                      <div class="form-group">
                        <label class="col-lg-4 control-label">Description</label>
                        <div class="col-lg-8">
                          <textarea class="form-control" rows="5" name="description" placeholder="Description"></textarea>
                        </div>
                      </div>    
                      <?php echo form_error('description');?>
                      <div class="form-group">
                        <div class="col-lg-offset-4 col-lg-6">
                          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="widget-foot">
                </div>
              </div>
            </div>  
            <div class="col-md-4">
              <div class="row">
                <div class="widget">
                  <div class="widget-head">
                    <div class="pull-left">Create Multiple Products</div>
                    <div class="widget-icons pull-right">
                      <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                    </div>  
                    <div class="clearfix"></div>
                  </div>
                  <div class="widget-content">
                    <div class="padd">  
                      <form class="form" action="<?php echo PORTALPATH;?>upload/do_upload_products" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <h4><b>Select CSV File</b></h4>
                        <input type="file" name="userfile" id="userfile">
                        <div class="clearfix"></div>
                        <div class="buttons">
                          <button class="btn btn-sm btn-primary" value="upload">Import Products</button>
                        </div>
                      </form>
                    </div>
                    <div class="widget-foot">
                    </div>
                  </div>
                </div>   
              </div>
              <div class="row">
                <div class="widget">
                  <div class="widget-head">
                    <div class="pull-left">Products</div>
                    <div class="widget-icons pull-right">
                      <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                    </div>  
                    <div class="clearfix"></div>
                  </div>
                  <div class="widget-content">
                    <div class="padd">  
                    <?php
                      if(isset($error)){
                        echo $error;
                      }else if(isset($upload_data)){
                        $handle = fopen("./uploads/".$upload_data['file_name'],'r');
                        while(!feof($handle)){
                          $csv = fgetcsv($handle);
                          if($csv[1]==1){
                            echo '<h3>', $csv[0], '</h3>', 
                            '<b>Type: </b>', $csv[2], '<br>',
                            '<b>Price: $</b>', $csv[3], '<br>', 
                            '<b>Commission: $</b>', $csv[4], '<br>',
                            '<b>Code: </b>', $csv[5], '<br> <hr>',
                            PHP_EOL;
                          }
                        }
                      }else if(isset($form_data)){
                        echo '<h3>', $this->input->post('code'), '</h3>', 
                        '<b>Type: </b>', $this->input->post('type'), '<br>',
                        '<b>Price: $</b>', $this->input->post('price'), '<br>', 
                        '<b>Commission: $</b>', $this->input->post('commission'), '<br>',
                        '<b>Code: </b>', $this->input->post('description'), '<br> <hr>',
                        PHP_EOL;
                      }  
                    
                    ?>
                    </div>
                    <div class="widget-foot">
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

   <!-- Mainbar ends -->	    	
  <div class="clearfix"></div>
</div>
<!-- Content ends -->