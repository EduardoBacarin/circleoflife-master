<?php
	$theme_path = THEMEPATH;
	$portal_path = PORTALPATH;
?>


<!-- Main content starts -->
<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
        <ul id="nav">
          <!-- Main menu with font awesome icon -->
          <li class="open"><a href="<?php echo $portal_path;?>main/"><i class="fa fa-home"></i> Dashboard</a>
          </li>
          <li class="has_sub">
			      <a href="#"><i class="fa fa-list-alt"></i>Client Circle<span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <!--<li><a href=<?php echo $portal_path ?>main/getstarted>Get Started</a></li>-->
              <li><a href="http://iiqtc.us/CoLWithGit/#start" target="CoL">My Circle of Life</a></li>
              <li><a href="http://localhost/CoLWithGit/#headingFive">Assess Readness</a></li>
              <li><a href="http://localhost/CoLWithGit/#headingTwo">Your Strengths</a></li>
              <li><a href="http://localhost/CoLWithGit/#headingThree">Need Support</a></li>
              <li><a href="http://localhost/CoLWithGit/#headingFour">Focus on</a></li>
              <li><a href="http://localhost/CoLWithGit/#headingSixOne">Purpose/Intention</a></li>
              <li><a href="http://localhost/CoLWithGit/#headingSix">Goal</a></li>
              <li><a href="http://localhost/CoLWithGit/#headingSeven">Challenges</a></li>
              <li><a href="http://localhost/CoLWithGit/#headingNine">Affirmation</a></li>
              <li><a href="http://localhost/CoLWithGit/#headingTen">Action Steps</a></li>
              <li><a href="http://localhost/CoLWithGit/#headingEleven">Find Coach</a></li>
            </ul>
          </li>

           <?php if($user_type != "Reseller") { ?>
          <li class="has_sub">
           <a href="#"><i class="fa fa-bar-chart"></i>Pre-Set Data<span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <li><a href="<?php echo $portal_path;?>main/createcol">New  Area CoL</a></li>
              <li><a href="<?php echo $portal_path;?>main/viewcol_all">View  Area CoL</a></li>
              <li><a href="<?php echo $portal_path;?>main/createcolquestion">New CoL Questions</a></li>
              <li><a href="<?php echo $portal_path;?>main/viewcolquestions_all">View CoL Questions</a></li>
            </ul>
          </li>
            <?php } ?>


          <?php

            if($user_type == "Admin"){
              echo '
              <li class="has_sub">
               <a href="#"><i class="fa fa-users"></i>Coach Team<span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
                <ul>
                  <li><a href="'.$portal_path.'main/createsalesrep">New Coach</a></li>
                  <li><a href="'.$portal_path.'main/viewsalesrep_all">View Coachs</a></li>
                  <li><a href="'.$portal_path.'main/viewadmins_all">View Admin</a></li>
                </ul>
              </li>
                  ';
                }

            if($user_type != "Reseller"){
              echo '
               <li class="has_sub">
               <a href="#"><i class="fa fa-user"></i>Clients<span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
                <ul>
                  <li><a href="'.$portal_path.'main/createcustomer">New Clients</a></li>
                  <li><a href="'.$portal_path.'main/viewcustomers_all">View Clients</a></li>
                </ul>
              </li>

              <!--
              <li class="has_sub">
              <a href="#"><i class="fa fa-thumb-tack"></i>Leads<span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
                <ul>
                  <li><a href="'.$portal_path.'main/createlead">New Lead</a></li>
                  <li><a href="'.$portal_path.'main/viewleads_all">View Leads</a></li>
                </ul>
              </li>
              -->
              ';
            }

            if($user_type == "Admin"){
              echo '
              <li class="has_sub">
               <a href="#"><i class="fa fa-barcode"></i>Knowledge Base<span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
                <ul>
                  <li><a href="#">New Question</a></li>
                  <li><a href="#">View Questions</a></li>
                </ul>
              </li>
                  ';
            }

            echo '
              <!--
              <li class="has_sub">
               <a href="#"><i class="fa fa-support"></i>Support & Help<span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
                <ul>
                  <li><a href="'.$portal_path.'main/createsuppticket">New Request</a></li>
                  <li><a href="'.$portal_path.'main/viewsuppticket_all">View Requests</a></li>
                </ul>
              </li>
              -->
            ';

            ?>


    <!-- Lumar Motta - Removed to Move to Logged Area - 05/19/2018

		  <li class="has_sub"><a href="#"><i class="fa fa-file-o"></i> My Account <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
    END LUMAR-->
              <!--<li><a href="<?php echo $portal_path;?>main/edit_account">Change Email/Password</a></li>-->
    <!-- Lumar Motta - Removed to Move to Logged Area - 05/19/2018
              <li><a href="<?php echo $portal_path;?>main/edit_company">Company Information</a></li>
              <li><a href="<?php echo $portal_path;?>main/edit_shipping">Shipping Address</a></li>
            </ul>
          </li>
    End Lumar -->
        </ul>
    </div>
    <!-- Sidebar ends -->
</div>