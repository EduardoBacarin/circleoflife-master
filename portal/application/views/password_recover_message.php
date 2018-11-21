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
							<h1>your password has been sended to your email</h1>
							<br /> 
							<div class="input-group input-group-width">
							
						  </div>
						  ';       
					}else if($Error == 'EmailErr'){
						echo '
							<h1>There was an error sending you the Account Password</h1>
							<p>Try sending the email again and if you keep seeing this error contact support</p>
							<br /> 
							
						  ';
					}else if($Error == 'WrongEmail'){
						echo '
							<h1>We can\'t find your email in our Database</h1>
							<p>Try sending the email again and if you keep seeing this error contact support</p>
							<br /> 
							
						  ';
					}else if($Error == 'InvalidKey'){
						  echo '
							<h1>Invalid Key Entered</h1>
							<p>Verify the email key you received via email and try again or resend the key</p>
							<br /> 
							<div class="input-group input-group-width">
							<form action="'.$portal_path.'account/verify_email_activation_code" method="POST" accept-charset="utf-8" class="form-horizontal">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit" name="resend">Resend Code</button>
								</span>
								<input type="hidden" name="email" id="email" value="'.$Email.'">
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
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit" name="edit">Edit Your Account</button>
								</span>
								<input type="hidden" name="email" id="email" value="'.$Email.'">
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