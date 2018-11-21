<?php
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;

?>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
      <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span>Menu</span>
      </button>
      <!-- Site name for smallar screens -->
      <a href="#" class="navbar-brand hidden-lg"></a>
    </div>
      
      <!-- Navigation starts -->
      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

        <!-- Logo. -->
        <div class="logo">
          <h2>
            <!-- Add Logo Here
            <?php $company_logo="https://pioneerpro.us/pioneerpro/theme/img/logos/webbt.jpg"; ?>
            <img src="<php echo $company_logo; ?>" alt="Company Logo" width="120" height="50">
            -->  
            <!--<a href="#"> <?php print_r($company_name) ?></a>-->
            <!-- Links -->
            <ul class="nav navbar-nav pull-right">
              <li class="dropdown pull-right">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <!-- Lumar Motta - Add the email to Loged user - 05/18/2018 -->
                  <i class="fa fa-user"></i> <?php echo $email ?> <b class="caret"></b>
                <!-- End Lumar -->

                </a>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $portal_path;?>main/viewaccount/<?php echo $this->session->userdata('id');?>"><i class="fa fa-sign-out"></i>My Account</a></li>
                  <!--<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                  <li><a href="#"><i class="fa fa-cogs"></i> Settings</a></li>-->
                  <li><a href="<?php echo $portal_path;?>account/logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                </ul>
              </li>
            </ul>
          </h2>
          <a href="<?php echo $portal_path;?>account/logout"><i class="fa fa-sign-out"></i>Logout</a>
        </div>  
      </nav>
    </div>
  </div>


<!-- Header starts -->
  <header>
    <div class="container">
      <div class="row">

        <!-- User section -->
        <div class="col-md-8">
            <h3>
              <span class="bold"><?php print_r($company_name) ?></span>(<?php print_r($user_type) ?>)
            </h3>
            <!-- no need to repet the email
            <p class="meta"><?php print_r($email); ?></p>  
            -->
            <!-- Search form 
            <div class="form-group">
                <form class="navbar-form navbar-left" role="search">
                  <input type="text" class="form-control" placeholder="Search">
                  <input type="button" class="form-control" placeholder="Search" value="Search">
                </form>
            </div>
            -->
        </div>

        <!-- Button section -->
        <div class="col-md-4">

          <!-- Buttons -->
          <ul class="nav nav-pills">
              <?php  //echo $this->calendar->generate(); ?>
              <a href="<?php echo $portal_path?>main/calendar"><img src="<?php echo $theme_path;?>img/favicon/calendar.jpg" width="31" height="33" title="Calendar" alt="Calendar">  </a>
          </ul>
        </div>


      </div>
    </div>
  </header>
<!-- Header ends --4>