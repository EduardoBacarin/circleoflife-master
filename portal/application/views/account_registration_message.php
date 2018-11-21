<?php 
	$theme_path = THEMEPATH;
	$portal_path = PORTALPATH;
?>

<body>
<!-- Form area -->
<div class="error-page">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <!-- Widget starts -->
            <div class="widget">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="fa fa-exclamation-circle"></i> <?php echo $Page; ?>
              </div>

              <div class="widget-content">
                <div class="padd error">
                  <?php 
					if($Error == 'EmailSent' || $Error == 'GetEmailKey'){
						echo '
							<h1>Please, enter the code you received via Email</h1>
							<p>If you didn\'t receive the email yet, try sending the email again and if you still don\'t receive an email with a verification code, contact support</p>
							<br /> 
							<div class="input-group input-group-width">
							<form action="'.$portal_path.'account/verify_email_activation_code" method="POST" accept-charset="utf-8" class="form-horizontal">
								<input type="text" class="form-control" name="email" id="email" value="'.$Email.'">
								<input type="text" class="form-control" id="key" name="key">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit" name="submit">Submit Code</button>
									'.''/*<button class="btn btn-default" type="submit" name="resend">Resend Code</button>
									<button class="btn btn-default" type="submit" name="support">Contact Support</button>*/.'
								</span>
							</form>
						  </div>
						  ';       
					}else if($Error == 'EmailErr'){
						echo '
							<h1>There was an error sending you the verification email</h1>
							<p>Try sending the email again and if you keep seeing this error contact your sales representative</p>
							<br /> 
							<div class="input-group input-group-width">
							<form action="'.$portal_path.'account/verify_email_activation_code" method="POST" accept-charset="utf-8" class="form-horizontal">
								<input type="text" class="form-control" name="email" id="email" value="'.$Email.'">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit" name="resend">Resend Code</button>
								</span>
							</form>
						  </div>
						  ';
					}else if($Error == 'AccErr'){
						echo '
							<h1>There was an error creating your account</h1>
							<p>Try registering again and if you keep seeing this error contact support</p>
							<br /> 
							<div class="input-group input-group-width">
							<form action="'.$portal_path.'account/verify_email_activation_code" method="POST" accept-charset="utf-8" class="form-horizontal">
								<input type="text" class="form-control" name="email" id="email" value="'.$Email.'">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit">Search</button>
								</span>
							</form>
						  </div>
						  ';
					}else if($Error == 'InvalidKey'){
						  echo '
							<h1>Invalid Key Entered</h1>
							<p>Verify the email key you received via email and try again or resend the key</p>
							<br /> 
							<div class="input-group input-group-width">
							<form action="'.$portal_path.'account/verify_email_activation_code" method="POST" accept-charset="utf-8" class="form-horizontal">
								<input type="text" class="form-control" name="email" id="email" value="'.$Email.'">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit" name="resend">Resend Code</button>
								</span>
							</form>
						  </div>
						  ';
					}else if($Error == 'ValidKey'){
						  echo '
							<h1>Your Account was Verified Successfully </h1>
							<p>You will now be assigned to a sales representative</p>
							<br /> 
							<div class="input-group input-group-width">
							<form action="'.$portal_path.'main/" method="POST" accept-charset="utf-8" class="form-horizontal">
								<input type="text" class="form-control" name="email" id="email" value="'.$Email.'">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit" name="edit">Edit Your Account</button>
								</span>
							</form>
						  </div>
						  ';
					}else if($Error == 'BadRequest'){
						  echo '
							<h1>BadRequest</h1>
							<p>If you are viewing this page it\'s because an error ocurred.</p>
							<br /> 
							<div class="input-group input-group-width">
							<form action="'.$portal_path.'main/" method="POST" accept-charset="utf-8" class="form-horizontal">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit" name="edit">Click Here</button>
								</span>
							</form>
						  </div>
						  ';
					}
				  ?>
                        
                 <br />
                 <div class="horizontal-links">
                  <!--<a href="index.html">Home</a> | <a href="#">About Us</a> | <a href="#">Contact us</a> | <a href="#">FAQ</a>-->
                 </div>
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
	
		

<!-- JS -->
<script src="<?php echo $theme_path;?>js/jquery.js"></script>
<script src="<?php echo $theme_path;?>js/bootstrap.min.js"></script>
</body>
</html>