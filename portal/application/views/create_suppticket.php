<?php
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>
    <!-- Main bar -->
    <div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-home"></i> Create Support Ticket</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Create Support Ticket</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->
      <form class="form-horizontal" role="form" id="createSuppTicket" name="createSuppTicket" action="<?php echo $portal_path;?>account/createSalesAccount" method="POST">
      <!-- Matter -->
      <div class="matter">

        <!-- Container -->
        <div class="container">


          <div class="row">

            <!-- Start Create Support Ticket -->
            <div class="col-md-4">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">Support Ticket</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Date</label>
                     <div class="col-lg-9">
                        <?php $date = date("m/d/Y"); ?>
                        <input type="date" class="form-control" placeholder="Date" name="date" value="<?php echo $date; ?>">
                      </div>
                    </div>
                    <?php echo form_error('date');?>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Severity</label>
                      <div class="col-lg-9">
                        <div class="btn-group">
                          <button name="Severity" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li><a href="#">Low</a></li>
                            <li><a href="#">Medium</a></li>
                            <li><a href="#">High</a></li>
                          </ul>
                        </div>

                      </div>
                    </div>
                    <?php echo form_error('severity');?>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Issue Type</label>
                      <div class="col-lg-9">
                        <div class="btn-group">
                          <button name="type" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li><a href="#">Field from table Supp Ticket Type 1</a></li>
                            <li><a href="#">Field from table Supp Ticket Type 2</a></li>
                            <li><a href="#">Field from table Supp Ticket Type 3</a></li>
                            <li><a href="#">Field from table Supp Ticket Type 4</a></li>
                            <li><a href="#">Field from table Supp Ticket Type 5</a></li>
                          </ul>
                        </div>

                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Customer Comments</label>
                      <div class="col-lg-5">
                        <textarea name="description" class="form-control" rows="5" placeholder="Textarea"></textarea>
                      </div>
                    </div>    

                    <input type="file" >

                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-6">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- end div col SUpport Ticket --> 
          




          <!--</div>  End Row was here -->

          


            <!-- Start FAQ -->
            <div class="col-md-4">
              <!-- Widget -->
              <div class="widget">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left">FAQ</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <!-- Widget content -->
                  <div class="padd">
                    <div class="support-faq">
                                <h5>Type to Filter:</h5>
                                <!-- Below line creates form -->
                                <div id="form"></div>
                                <hr />
                                <div class="clearfix"></div>
                                  <!-- Lists -->
                                  <ol id="slist">
                                      <!-- List #1 -->
                                      <li>
                                         <!-- Title. Link title is used for filteration. -->
                                         <a href="#">Sed eu leo orci condimentum grvid metus</a>
                                         <!-- Para -->
                                         <p>Fusce imperdiet, risus eget viverra faucibus, diam mi vestibulum libero, ut vestibulum tellus magna nec enim. Nunc dapibus varius interdum. Phasellus at lorem ut lectus fermentum convallis. Sed diam nisi, pulvinar vitae molestie hendrerit, venenatis eget mauris. Integer porta erat ac eros porta ultrices. Proin porttitor eros a ante molestie gravida commodo dui adipiscing.</p>
                                      </li>
                                      <!-- List #2 and so on.... -->
                                      <li>
                                         <a href="#">Fusce imperdiet risus eget viverr</a>
                                         <p>Fusce imperdiet, risus eget viverra faucibus, diam mi vestibulum libero, ut vestibulum tellus magna nec enim. Nunc dapibus varius interdum. Phasellus at lorem ut lectus fermentum convallis. Sed diam nisi, pulvinar vitae molestie hendrerit, venenatis eget mauris. Integer porta erat ac eros porta ultrices. Proin porttitor eros a ante molestie gravida commodo dui adipiscing.</p>
                                      </li>
                                      <li>
                                         <a href="#">Dimmi vestibulum libero ut vestibulum</a>
                                         <p>Fusce imperdiet, risus eget viverra faucibus, diam mi vestibulum libero, ut vestibulum tellus magna nec enim. Nunc dapibus varius interdum. Phasellus at lorem ut lectus fermentum convallis. Sed diam nisi, pulvinar vitae molestie hendrerit, venenatis eget mauris. Integer porta erat ac eros porta ultrices. Proin porttitor eros a ante molestie gravida commodo dui adipiscing.</p>
                                      </li>
                                      <li>
                                         <a href="#">Aeros a ante molestie gravida commodo</a>
                                         <p>Fusce imperdiet, risus eget viverra faucibus, diam mi vestibulum libero, ut vestibulum tellus magna nec enim. Nunc dapibus varius interdum. Phasellus at lorem ut lectus fermentum convallis. Sed diam nisi, pulvinar vitae molestie hendrerit, venenatis eget mauris. Integer porta erat ac eros porta ultrices. Proin porttitor eros a ante molestie gravida commodo dui adipiscing.</p>
                                      </li>
                                      <li>
                                         <a href="#">Integer porta erat ac eros porta</a>
                                         <p>Fusce imperdiet, risus eget viverra faucibus, diam mi vestibulum libero, ut vestibulum tellus magna nec enim. Nunc dapibus varius interdum. Phasellus at lorem ut lectus fermentum convallis. Sed diam nisi, pulvinar vitae molestie hendrerit, venenatis eget mauris. Integer porta erat ac eros porta ultrices. Proin porttitor eros a ante molestie gravida commodo dui adipiscing.</p>
                                      </li>
                                      <li>
                                         <a href="#">Molestie gravida commodo dui adipiscing</a>
                                         <p>Fusce imperdiet, risus eget viverra faucibus, diam mi vestibulum libero, ut vestibulum tellus magna nec enim. Nunc dapibus varius interdum. Phasellus at lorem ut lectus fermentum convallis. Sed diam nisi, pulvinar vitae molestie hendrerit, venenatis eget mauris. Integer porta erat ac eros porta ultrices. Proin porttitor eros a ante molestie gravida commodo dui adipiscing.</p>
                                      </li>                                    
                                 </ol>
                             </div>
                  </div>
                  <!-- Widget footer -->
                  <div class="widget-foot">
                    <p>Vivamus diam diam, fermentum sed dapibus eget, consectetur adipiscing elit.</p>
                  </div>
                </div>
              </div> 
            </div> <!-- End col FAQ -->
                        

            
            <!-- Contact -->
            <div class="col-md-4">
              <!-- Widget -->
              <div class="widget">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left">Contact</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <!-- Widget content -->
                  <div class="padd">
                                               <!-- Contact box -->
                             <div class="support-contact">
                                <!-- Phone, email and address with font awesome icon -->
                                <p>Praesent at tellus porttitor nisl porttitor sagittis. Mauris in massa ligula, a tempor nulla.</p>
                <hr />
                                <p><i class="fa fa-phone"></i>&nbsp; Phone<strong>:</strong> 123-456-7890</p>
                                <hr />
                                <p><i class="fa fa-envelope"></i>&nbsp; Email<strong>:</strong> something@gmail.com</p>
                                <hr />
                                <p><i class="fa fa-home"></i>&nbsp; Address<strong>:</strong> 12, Srtington Street, NY, USA </p>
                <hr />
                                <!-- Button -->
                                <a href="contact.html" class="btn btn-danger btn-sm">Contact Us</a> &nbsp; <a href="faq.html" class="btn btn-info btn-sm">Check out FAQ</a>
                             </div>
                  </div>
                </div>
              </div> 
            </div>
          </div> <!-- End Div Row moved here -->
        </div> <!-- End Div Container -->         
      </div>
    </div>

    <!-- Matter ends -->


    <!-- Matter ends -->