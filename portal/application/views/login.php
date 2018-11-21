<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>

<body>

<!-- Form area -->
<div class="admin-form">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <!-- Widget starts -->
            <div class="widget worange">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="fa fa-lock"></i> Login 
              </div>

              <div class="widget-content">
                <div class="padd">
                  <!-- Login form -->
                  <form action="<?php echo $portal_path;?>account/login_validation" method="POST" accept-charset="utf-8" class="form-horizontal">
                    <!-- Email -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputEmail">Email</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Password</label>
                      <div class="col-lg-9">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
                    </div>
					<?php echo validation_errors();?>
                    <!-- Remember me checkbox and sign in button -->
                    <div class="form-group">
					<div class="col-lg-9 col-lg-offset-3">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Remember me
                        </label>
						</div>
					</div>
					</div>
                        <div class="col-lg-9 col-lg-offset-3">
							<button type="submit" class="btn btn-info btn-sm">Sign in</button>
							<!--<button type="reset" class="btn btn-default btn-sm">Reset</button>-->
						</div>
                    <br />
                  </form>
				  
				</div>
                </div>
              
                <div class="widget-foot">
                  Not Registred? <a href="<?php echo $portal_path;?>account/register_account">Register here</a>
                <br />
                  Forgot Password? <a href="<?php echo $portal_path;?>account/recover">Recover here</a>
                </div>
            </div>  
      </div>
    </div>
  </div> 
</div>
