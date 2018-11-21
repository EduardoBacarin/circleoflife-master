<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>

<body>
<div class="admin-form">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Widget starts -->
            <div class="widget wred">
              <div class="widget-head">
                <i class="fa fa-lock"></i> Submit Email 
              </div>
              <div class="widget-content">
                <div class="padd">
                  
                  <form action="<?php echo $portal_path;?>account/verify_email_activation_code" method="POST" accept-charset="utf-8" class="form-horizontal">
                    <!-- Registration form starts -->
                                     
                                          <!-- Email -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-4" for="email">Email</label>
                                            <div class="col-lg-8">
                                              <input type="text" name="email" id="email" value="<?php echo $Email; ?>">
                                              <input type="text" class="form-control" id="key" name="key">
                                            </div>
                                          </div>
                                          <!-- Select box -->
                                          <!--
										  <div class="form-group">
                                            <label class="control-label col-lg-3">Drop Down</label>
                                            <div class="col-lg-4">                               
                                                <select class="form-control">
                                                <option>&nbsp;</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                </select>  
                                            </div>
                                          </div>
										  -->										  
                                        
                                          <!-- Accept box and button submit-->
                                          <div class="form-group">
                                            <div class="col-lg-9 col-lg-offset-3">
											  
                                              <button type="submit" class="btn btn-sm btn-info">Confirm</button>
                                              <!--<button type="reset" class="btn btn-sm btn-default">Reset</button>-->
                                            </div>
                                          </div>
                  </form>
					       <?php echo validation_errors();?>
                </div>
              </div>
                <div class="widget-foot">
                  Already Registred? <a href="<?php echo $portal_path;?>main">Login</a>
                </div>
            </div>  
      </div>
    </div>
  </div> 
</div>