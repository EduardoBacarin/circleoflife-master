<?php 
	$theme_path = THEMEPATH;
	$portal_path = PORTALPATH;
?>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script src="<?php echo $portal_path;?>assets/js/site/angular-chart.min.js"></script>

<?php $portal_path2 = PORTALPATH2; ?>
<script src="<?php echo $portal_path2;?>assets/js/site/circleOfLifeChart2.js"></script>

<!-- <script src="<?php echo $portal_path;?>assets/js/site/circleOfLifeChart.js"></script>-->



<link rel="stylesheet" type="text/css" href="<?php echo $portal_path;?>assets/css/site/slider.css">

<!-- Main content starts -->
 	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
	      <h2 class="pull-left"><i class="fa fa-home"></i> Dashboard</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Dashboard</a>
        </div>
        <div class="clearfix"></div>
	    </div>
          <!-- Dashboard Graph starts -->
          <div class="row">
            <div class="col-md-6">
                <div class="widget">

                <div class="widget-head">
                  <div class="pull-left">Rate your satisfaction in all 12 areas of the circle.</div>
                    <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>

                    <input id="userId" style="display: none;" value="<?php echo $this->session->userdata('id')?>">

                  <div class="widget-content" ng-app="app">
                    <div class="padd" ng-controller="BaseCtrl">
                        <button id="gamb" ng-click="gambButtonClick()" style="display: none;"></button>
                        <canvas id="base" class="chart-base" chart-type="type"
                                chart-data="data" chart-labels="labels" chart-click="onClick">
                        </canvas>
                        <br/>
                        <span><b>Selected Area:</b></span> {{selectedAreaLabel}}
                        <div class="slidecontainer">
                            <input id="slider" ng-change="updateSelectedArea()" ng-model="slider" type="range" min="1" max="10" step="1" class="slider" id="myRange">
                        </div>
                        {{slider}}
                        <button id="savebutton" style="margin-right:5%; margin-left: 90%;" ng-click="saveCircleChanges()">Save</button>
                    </div>
                  </div>
                </div>
                <div id="assessment" class="widget" style="display: none;">
                    <div class="widget-head">
                        Assessment Form - {{selectedAreaLabel}}
                    </div>
                    <div class="widget-content">
                        1) How satisfied are you with this area of your life right now?
                        <div class="slidecontainer">
                            <input type="range" min="1" max="10" step="1" class="slider">
                        </div>
                        2) Do the Pros outweigh the Cons at this time in your life?
                        <div class="slidecontainer">
                            <input type="range" min="1" max="10" step="1" class="slider">
                        </div>
                        3) Has your emotional, mental, physical pain or stress level reached the point where you are ready to change?
                        <div class="slidecontainer">
                            <input type="range" min="1" max="10" step="1" class="slider">
                        </div>
                    </div>
                </div>
                <!-- Pie chart ends -->

              <!--
              </div>
            -->
            </div>

            <div class="col-md-4">

              <div class="widget">

                <div class="widget-head">
                  <div class="pull-left">

                  <?php if($user_type != "Reseller") {  
                          echo 'Your Customers';
                        }else{
                          echo 'Your Progress';
                        }   
                  ?>

                  </div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>             

                <div class="widget-content">
                  <div class="padd">


                    <!-- Visitors, pageview, bounce rate, etc., Sparklines plugin used -->
                    <ul class="current-status">

                      <!-- Aqui colocar o LOOP do aquivo circle_of_life -->

                      <?php 
                        if($user_type != "Reseller") {

                          if($customers!=FALSE){

                            foreach($customers->result_array() as $row){
                                        echo '
                                        <li>
                                           <span class="bold">';
                                        echo $row["f_name"] . ' ' . $row["l_name"];
                                       
                                        echo '</span></li>';

                              }  

                            }

                          } 

                        if($user_type != "Admin" and $user_type != "Sales") {

                          if($circleoflifeareas!=FALSE) {
                              foreach($circleoflifeareas->result_array() as $row){
                                        echo '
                                        <li>
                                         <span id="status12"></span><span class="bold">';
                                        echo $row["description"];
                                       
                                        echo '</span></li>';

                              }  
                            }
                          } 
                      ?>                                       

                    </ul>

                  </div>
                </div>

              </div>
            </div>
          </div>

    </div>

   <!-- Mainbar ends -->
   <div class="clearfix"></div>

</div>
<!-- Content ends -->
