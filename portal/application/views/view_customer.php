<?php

  $theme_path = THEMEPATH;

  $portal_path = PORTALPATH;

?>



<!-- Main bar -->

<div class="mainbar">

      <!-- Page heading -->

      <div class="page-head">

        <h2 class="pull-left"><i class="fa fa-file-o"></i><?php if(isset($header)){ echo $header['Page'];}else{ echo "View Client";}  ?></h2>

        <!-- Breadcrumb -->

        <div class="bread-crumb pull-right">

          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a>

          <!-- Divider -->

          <span class="divider">/</span>

          <a href="#" class="bread-current"><?php if(isset($header)){ echo $header['Page'];}else{ echo "View Customer";}  ?> </a>

        </div>

        <div class="clearfix"></div>

      </div>

      <!-- Page heading ends -->

      <!-- Matter -->

        <div class="container">

          <div class="row">

            <div class="col-md-12">

              <div class="widget">

                <div class="widget-head">

                  <div class="pull-left">Client Summary</div>

                  <div class="widget-icons pull-right">

                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>

                  </div>

                  <div class="clearfix"></div>

                </div>



                <!-- Form to update Name Email and Salesrep -->  

                <form class="form-horizontal" role="form" id="editCustomer" name="editCustomer" action="<?php echo $portal_path;?>account/edit_customer" method="POST">

                </form>



                <!-- Form to Add New order -->  

                <form class="form-horizontal" role="form" id="placeOrder" name="placeOrder" action="<?php echo $portal_path; ?>main/placeorder/usa/<?php echo $customer->id; ?>" method="POST">

                </form>  



                <div class="widget-content">

                  <div class="padd invoice">

                    <div class="row">

                      <input form="editCustomer" type="hidden" name="customer_id" value="<?php echo $customer->id; ?>"/>

                      <input form="editCustomer" type="hidden" name="salesRep_id" value="<?php echo $customer->sales_rep; ?>"/>

                      <div class="col-md-6">

                        <div class="form-group">

                          <label class="col-lg-2 control-label">Name</label>

                          <div class="col-lg-5">

                            <input form="editCustomer" type="text" class="form-control" name="f_name" id="f_name" value="<?php echo $customer->f_name; ?>" placeholder="First Name" <?php if($user_type!="Admin") echo "readonly"?> >

                            <?php echo '<font color="red">'.form_error('f_name').'</font>'; ?>

                          </div>

                          <div class="col-lg-5">

                            <input form="editCustomer" type="text" class="form-control" name="l_name" id="l_name" value="<?php echo $customer->l_name; ?>" placeholder="Last Name" <?php if($user_type!="Admin") echo "readonly"?> >

                            <?php echo '<font color="red">'.form_error('l_name').'</font>'; ?>

                          </div>

                          <?php

                            if($user_type!="Reseller"){

                              echo '<div class="padd">';

                              echo '<b>Notes: </b>';

                              echo '<br>';

                              echo '<textarea form="editCustomer" rows="4" cols="77" name="notes" id="notes" style="resize:none" class="form-control">';

                              echo $customer->notes;

                              echo "</textarea>";

                              echo '</div>';

                            }

                          ?>

                        </div>

                      </div>  

                      <div class="col-md-6">

                        <div class="form-group">

                          <label class="col-lg-2 control-label">Email</label>

                          <div class="col-lg-10">

                            <input form="editCustomer" type="text" class="form-control" name="email" id="email" value="<?php echo $customer->email; ?>" placeholder="First Name" <?php if($user_type!="Admin") echo "readonly"?> >

                              <?php echo '<font color="red">'.form_error('email').'</font>'; ?>

                          </div>

                        </div>

                        <div class="form-group">

                          <!-- Admin Cahnge Sales Person Request to Sign NDA and Agreement -->

                        <?php

                          if($user_type=="Admin"){

                            echo '<label class="col-lg-2 control-label">Coach</label>';

                            echo '<div class="col-lg-10">';

                            if($salesRep!=FALSE){

                              if($salesRep->num_rows > 0){

                                echo '<select form="editCustomer" class="form-control" placeholder="Sales Representative" name="salesRep" id="salesRep" >

                                  <option>Select Coach</option>';

                                foreach($salesRep->result_array() as $row){

                                  echo '<option value="'.$row['id'].'"';

                                  if($row['id'] == $customer->sales_rep ){echo 'selected="selected"';}

                                    echo '>'.trim($row['f_name']).' '.trim($row['l_name']).'</option>';

                                }

                                echo '</select><font color="red">'.form_error("salesRep_id").'</font>';

                              }

                            }

                            echo "</div>";

                          }

                        ?>

                        </div> 

                        <div class="form-group">

                          <label class="col-lg-2 control-label">Type</label>

                          <?php 

                            if(trim($customer->user_type=="Reseller")){

                              echo "Client";

                            }else if(trim($customer->user_type=="Sales")){

                              echo "Coach";

                            }else{

                              echo "Administrator";

                          }  

                        ?>

                        </div>

                      </div>       

                    </div>         

                  </div>            

                </div>  

              <hr />    

              <div class="row">

                <div class="col-md-6" align="center">

                  <button form="editCustomer" id="editCustomer" type="submit" name="editCustomer" value="editCustomer" class="btn btn-sm btn-info">Update Summary</button>

                </div>

                <div class="col-md-6">

                  <div class="form-group">

                    <div class="col-lg-offset-2 col-lg-6">

                      <input form="placeOrder" type="hidden" name="customer_id" value="<?php echo $customer->id; ?>" />

                      <input form="placeOrder" type="hidden" name="salesRep_id" value="<?php echo $customer->sales_rep; ?>" />

                      <!--  

                      <button form="placeOrder" type="submit" name="placeOrder" value="PlaceOrder" class="btn btn-sm btn-primary">Place Order</button>

                    -->

                    </div>

                  </div>  

                </div>

              </div>

            </div> 

          </div>

        </div> 


        <div class="row">

            <div class="col-md-12">

              <div class="widget">

                <div class="widget-head">

                  <div class="pull-left">Billing & SHipping Information  </div>

                    <div class="widget-icons pull-right">

                      <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>

                    </div>

                    <div class="clearfix"></div>

                  </div>

                  <div class="widget-content">

                    <div class="padd invoice">

                      <div class="row">

                        <div class="col-md-6">

                          <form class="form-horizontal" role="form" id="editCompany" name="editCompany" action="<?php echo $portal_path;?>account/edit_customerCompany" method="POST">

                          <input type="hidden" name="customer_id" value="<?php echo $customer->id; ?>"/>

                          <input type="hidden" name="salesRep_id" value="<?php echo $customer->sales_rep; ?>"/>

                          <div class="form-group">

                            <h4><strong>Billing Address</strong></h4>

                            <label class="col-lg-2 control-label">Company Name</label>

                            <div class="col-lg-5">

                              <input type="text" class="form-control" name="company" id="company" value="<?php echo $customer_company->name; ?>" placeholder="Company Name" >

                            </div>

                            <?php echo '<font color="red">'.form_error('company').'</font>'; ?>

                          </div>

                          <div class="form-group">

                            <label class="col-lg-2 control-label">Address</label>

                            <div class="col-lg-10">

                              <input type="text" class="form-control" name="address1" id="address1" value="<?php echo $customer_company->address; ?>" placeholder="Address">

                              <?php echo '<font color="red">'.form_error('address1').'</font>'; ?>

                              <input type="text" class="form-control" name="address2" id="address2" value="<?php echo $customer_company->address2; ?>" placeholder="Address complement">

                              <?php echo '<font color="red">'.form_error('address2').'</font>'; ?>

                            </div>

                            <label class="col-lg-2 control-label">City</label>

                            <div class="col-lg-4">

                              <input type="text" class="form-control" name="city" id="city" value="<?php echo $customer_company->city; ?>" placeholder="City">

                              <?php echo '<font color="red">'.form_error('city').'</font>'; ?>

                            </div>

                            <label class="col-lg-2 control-label">State</label>

                            <div class="col-lg-4">

                              <input type="text" class="form-control" name="state" id="state" value="<?php echo $customer_company->state; ?>" placeholder="State">

                              <?php echo '<font color="red">'.form_error('state').'</font>'; ?>

                            </div>

                            <label class="col-lg-2 control-label">Zip</label>

                            <div class="col-lg-4">


                              <input type="text" class="form-control" name="zip" id="zip" value="<?php echo $customer_company->zip; ?>" placeholder="Zip Code">


                              <?php echo '<font color="red">'.form_error('zip').'</font>'; ?>

                            </div>

                            <label class="col-lg-2 control-label">Country</label>

                            <div class="col-lg-4">

                              <select class="form-control" name="country" id="country">

                              <?php

                                if($countries!=FALSE){

                                  foreach($countries->result_array() as $row){

                                    echo '<option value="'.$row['code'].'"';

                                    if($row['code'] == $customer_company->country) {echo 'selected="selected"';}

                                    else if(($customer_company->country == null || $customer_company->country == "") && $row['code'] == $geoplugin->countryCode){ echo 'selected="selected"';

                                    }

                                    echo '>'.$row['country'].'</option>';

                                  }  

                                }

                              ?>

                              </select>

                              <?php echo '<font color="red">'.form_error('country').'</font>';?>

                            </div>

                            <label class="col-lg-2 control-label">Phone</label>

                            <div class="col-lg-4">

                              <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $customer_company->phone; ?>" placeholder="Phone">

                              <?php echo '<font color="red">'.form_error('phone').'</font>'; ?>

                            </div>

                            <label class="col-lg-2 control-label">Website</label>

                            <div class="col-lg-4">

                              <input type="text" class="form-control" name="website" id="website" value="<?php echo $customer_company->website; ?>" placeholder="Website">

                              <?php echo '<font color="red">'.form_error('website').'</font>'; ?>

                            </div>

                            <!--

                            <label class="col-lg-2 control-label">RFC</label>

                            <div class="col-lg-4">

                              <input type="text" class="form-control" name="rfc" id="rfc" value="<?php echo $customer_company->rfc; ?>" placeholder="RFC">

                              <?php echo '<font color="red">'.form_error('rfc').'</font>'; ?>

                            </div>

                            <label class="col-lg-2 control-label">Tax ID</label>

                            <div class="col-lg-4">

                              <input type="text" class="form-control" name="taxid" id="taxid" value="<?php echo $customer_company->taxid; ?>" placeholder="Tax ID">

                              <?php echo '<font color="red">'.form_error('taxid').'</font>'; ?>

                            </div>

                            -->

                            <label class="col-lg-10 control-label">Use same Address for Shipping?

                              <input type="checkbox" name="copyShipping" id="copyShipping" value="yes" checked>Yes

                            </label>

                            <div class="col-lg-offset-2 col-lg-6">

                              <button type="submit" name="update" value="Update" class="btn btn-sm btn-info">Update Billing</button>

                            </div>

                          </div>

                        </form>

                      </div>

                      <div class="col-md-6">

                        <form class="form-horizontal" role="form" id="editship" name="editship" action="<?php echo $portal_path;?>account/editCustomerPersonal" method="POST">

                          <input type="hidden" name="customer_id" value="<?php echo $customer->id; ?>"/>

                          <input type="hidden" name="salesRep_id" value="<?php echo $customer->sales_rep; ?>"/>

                          <div class="form-group">

                            <h4><strong>Personal Info</strong></h4>

                          </div>

                          <div class="form-group">

                            <label class="col-lg-2 control-label">Date of Birthday</label>

                            <div class="col-lg-5">

                              <input type="hidden" class="form-control" name="shipAddress" value="<?php echo $shipping_info->address; ?>" placeholder="Address">
                              <input type="date" class="form-control" name="bithday" value="<?php echo $personal_info->birthday; ?>" placeholder="Birthday">

                              <input type="hidden" class="form-control" name="shipAddress2" value="<?php echo $shipping_info->address2; ?>" placeholder="Address complement">

                            </div>
                          </div>
                                     
                          <div class="form-group">

                              <label class="col-lg-2 control-label">Birth Sign</label>

                              <div class="col-lg-4">

                                <input type="hidden" class="form-control" name="shipCity" value="<?php echo $shipping_info->city; ?>" placeholder="City">

                                <input type="text" class="form-control" name="bith_sign" value="<?php echo $personal_info->birth_sign; ?>" placeholder="Birth Sign">

                              </div>

                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Profession</label>

                            <div class="col-lg-8">

                              <input type="hidden" class="form-control" name="shipState" value="<?php echo $shipping_info->state; ?>" placeholder="State">

                              <input type="text" class="form-control" name="profession" value="<?php echo $personal_info->profession; ?>" placeholder="Profession">

                            </div>
                          </div>

                          <div class="form-group">

                            <label class="col-lg-2 control-label">Favorite Ethnic Food</label>

                            <div class="col-lg-8">

                              <input type="text" class="form-control" name="favorite_ethnic_food" value="<?php echo $personal_info->favorite_ethnic_food; ?>" placeholder="Zip">


                              <input type="hidden" class="form-control" name="shipZip" value="<?php echo $shipping_info->zip; ?>" placeholder="Zip">

                            </div>

                          </div>

                          <div class="form-group">

                            <label class="col-lg-2 control-label">Favorite Music General</label>

                            <div class="col-lg-8">


                              <input type="text" class="form-control" name="favorite_music_general" value="<?php echo $personal_info->favorite_music_general; ?>" placeholder="Favorite Ethnic Food">

                              <input type="hidden" class="form-control" name="favorite_music_general" value="USA" placeholder="">

                              <!--  
                              <select class="form-control" name="shipCountry" id="shipCountry">
                              -->
                              <?php
                                /*
                                if($countries!=FALSE){

                                  foreach($countries->result_array() as $row){

                                    echo '<option value="'.$row['code'].'"';

                                    if($row['code'] == $shipping_info->country) {echo 'selected="selected"';}

                                    else if(($shipping_info->country == null || $shipping_info->country == "") && $row['code'] == $geoplugin->countryCode){ echo 'selected="selected"';

                                    }

                                    echo '>'.$row['country'].'</option>';

                                  }

                                }
                                */
                              ?>

                              <!--
                              </select>
                              -->
                            </div>

                          </div>

                          <div class="form-group">



                            <label class="col-lg-2 control-label">Share a Brief Philosophy of Life Statement</label>


                            <div class="col-lg-8">
                              <textarea rows="4" cols="80"><?php echo $personal_info->philosophy_life_statement; ?></textarea>
                            </div>  
                            <div class="col-lg-4">

                              <input type="hidden" class="form-control" name="shipPhone" value="<?php echo $personal_info->philosophy_life_statement; ?>" placeholder="Phone">

                            </div>

                            <div class="col-lg-offset-2 col-lg-6">

                              <button type="submit" name="update" value="Update" class="btn btn-sm btn-info">Update Personal</button>

                            </div>

                          </div>

                        </form>

                      </div>

                    </div>

                  </div>

                </div>      

              </div>

            </div>




        <div class="row">

          <div class="col-md-12">

            <div class="widget">

              <div class="widget-head">

                <div class="pull-left">Contracts Info</div>

                  <div class="widget-icons pull-right">

                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>

                  </div>

                  <div class="clearfix"></div>

                </div>

                <div class="widget-content">

                  <div class="padd invoice">

                    <div class="row">

                      <div class="col-md-12">

                        <div class="form-group">

                        <!-- Customer change Password -->  

                        <?php 

                          if($this->session->email === $customer->email){

                            echo '<div class="form-group">';

                            echo '  <label class="col-lg-2 control-label">Password</label>';

                            echo '  <div class="col-lg-3">';

                            echo '    <input form="editCustomer" type="password" class="form-control" name="oldpassword" id="oldpassword" value="" placeholder="Current" >';

                            echo '  </div>';        

                            echo ' <div class="col-lg-3">';

                            echo '       <input form="editCustomer" type="password" class="form-control" name="newpassword" id="newpassword" value="" placeholder="New">';

                            echo '  </div>';      

                            echo '  <div class="col-lg-3">';

                            echo '    <input form="editCustomer" type="password" class="form-control" name="repassword" id="repassword" value="" placeholder="Reenter">';

                            echo '  </div>';

                            echo '<font color="red">'.form_error("password").'</font>';     

                            echo '</div>';

                          }

                        ?>

                        </div>

                        <?php 

                          echo '<div class="btn-group">';

                          echo '<label class="col-lg-8 control-label">NDA Status</lable>'; 

                          if($customer->nda == 0){

                            echo '<div class="sw-lblue">';

                            echo '<input form="editCustomer" type="checkbox" name="nda" id="nda" class="toggleBtn" readonly />';

                            echo '<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action<span class="caret"></span></button>';

                            echo '<ul class="dropdown-menu">';

                            echo '<li><a href="#">No Action</a></li>';

                            echo '<li><a href="#">Email to sign NDA</a></li>';

                            echo '</ul>';

                            echo '</div>';

                          } else {

                            echo '<div class="sw-lblue">';

                            echo '<input type="checkbox" name="nda" id="nda" class="toggleBtn" checked disable />';

                            echo '<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action<span class="caret"></span></button>';                                 

                            echo '<ul class="dropdown-menu">';

                            echo '<li><a href="#">No Action</a></li>';

                            echo '<li><a href="#">Print NDA</a></li>';

                            echo '<li><a href="#">Email NDA</a></li>';

                            echo '</ul>';

                            echo '</div>';

                          }

                          echo '</div>';

                          echo '<div class="btn-group">';

                          echo '<label class="col-lg-8 control-label">Agreement Status</lable>'; 

                          if($customer->agreement == 0){

                            echo '<div class="sw-green">';

                            echo '<input form="editCustomer" type="checkbox" name="agreement" id="agreement" class="toggleBtn" readonly  />';

                            echo '<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action<span class="caret"></span></button>';

                            echo '<ul class="dropdown-menu">';

                            echo '<li><a href="#">No Action</a></li>';

                            echo '<li><a href="#">Email to sign Gurtam Price Agreement</a></li>';

                            echo '<li><a href="#">Email to sign Direct Price Agreement</a></li>';

                            echo '</ul>';

                            echo '</div>';

                          } else {

                            echo '<div class="sw-green">';

                            echo '<input type="checkbox" name="agreement" id="nda" class="toggleBtn" checked disable />';

                            echo '<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action<span class="caret"></span></button>';

                            echo '<ul class="dropdown-menu">';

                            echo '<li><a href="#">No Action</a></li>';

                            echo '<li><a href="#">Print Agreement</a></li>';

                            echo '<li><a href="#">Email Agreement</a></li>';

                            echo '</ul>';

                            echo '</div>';

                          }

                          echo '</div>';

                        ?>

                        <hr />  

                        <div class="col-md-12">

                          <div class="form-group">

                            <form class="form-horizontal" role="form" id="printNDA" name="printNDA" action="<?php echo $portal_path; ?>main/printNDA/usa" method="POST">

                              <input type="hidden" name="customer_id" value="<?php echo $customer->id; ?>"/>

                              <button type="submit" name="PrintNDA" value="PrintNDA" class="btn btn-sm btn-primary">Print NDA</button>

                              <button type="submit" name="PrintAgree" value="PrintAgree" class="btn btn-sm btn-primary">Print Agreement</button>  

                              <button type="file" name="Signed_pdf" value="PrintAgree" class="btn btn-sm btn-primary">Download Signed PDF

                              </button>

                            </form>

                          </div>

                        </div>  

                        <div class="col-md-12">

                          <div class="form-group">

                          <?php

                            $info  = 'Here we need to add Info if the customer need to sign an contract and it must be short sentence';

                            $nda1   = $contractNDA;

                            $agree1 = $contractAgree1 ;

                          ?>

                          <ul id="myTab" class="nav nav-tabs">

                            <li class="active"><a href="#info" data-toggle="tab">Info</a></li>

                            <li><a href="#nda1" data-toggle="tab">NDA</a></li>

                            <li><a href="#agree1" data-toggle="tab">Agreement (A)</a></li>

                          </ul>

                          <div id="myTabContent" class="tab-content">

                            <div class="tab-pane fade in active" id="info">

                              <p><?php echo $info; ?></p>

                            </div>

                            <div class="tab-pane fade" id="nda1">

                              <p><?php echo $nda1; ?></p>

                            </div>

                            <div class="tab-pane fade" id="agree1">

                              <p><?php echo $agree1; ?></p>

                            </div>

                          </div>

                        </div>

                      </div>    

                    </div> 

                  </div>    

                </div>

              </div>

            </div>

          </div>

        </div>  

        <div class="row">

          <div class="col-md-12">

            <div class="widget">

              <div class="widget-head">

                <div class="pull-left">Map  </div>

                  <div class="widget-icons pull-right">

                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>

                  </div>

                  <div class="clearfix"></div>

                </div>

                <div class="widget-content">

                  <div class="padd invoice">

                    <div class="row">

                    <?php

                      if($customer_company->point != NULL && $customer_company->point != "" && $customer_company->point != ","){

                        $start = strpos($customer_company->point, ",");

                        $lng = substr($customer_company->point, 0, $start);

                        $end = strrpos($customer_company->point, ",");

                        $lat = substr($customer_company->point, $start+1, $end-($start+1));

                      }else{

                        //CURRENTLY WORKING HERE

                        //HERE ADD FUNCTION TO GEOLOCATE AND ADD POINT TO DATABASE

                      }

                    ?>

                      <div id="map">

                        <script>

                          function initMap() {

                            var uluru = {lat: <?php echo $lat; ?>, lng: <?php echo $lng;?>};

                            var map = new google.maps.Map(document.getElementById('map'), {

                              zoom: 15,

                              center: uluru

                            });

                            var marker = new google.maps.Marker({

                              position: uluru,

                              map: map

                            });

                          }

                        </script>

                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGYYE-fKAdzEErv_4Pu5Ic8pGEBsr0UK8&callback=initMap"></script>

                      </div>

                    </div>

                  </div>

                </div>      

              </div>

            </div>

          </div>

          

        </div>

        <div class="row">

          <div class="col-md-12">

            <div class="widget-content">

              <div class="padd">

                <div class="widget">

                  <div class="widget-head">

                    <div class="pull-left">Client Circle of Life Hitory</div>

                      <div class="widget-icons pull-right">

                        <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>

                      </div>

                      <div class="clearfix"></div>

                    </div>

                    <div class="widget-content">

                      <div class="padd">

                        <div class="error-log">

                          <ul>

                          <?php

                            if($log){

                              foreach($log as $line){

                                echo " <a href='".$portal_path."order/viewOrder/".$line['id']."'><li><b>Order #: ".$line['id']." - Date: ".$line['date']." - Total: $".$line['order_total']."  - Note: ".$line['notes']."</b></li></a>";

                              }

                            }

                          ?>

                          <!-- Use class "green" or "red" to add color -->

                          <!--<li><span class="green">[Tue Jan 11 17:32:52 2013]</span> <span class="red">[error]</span> [google 123.124.2.2] client denied by server: /export/home/macadmin/testdoc</li>   -->

                          </ul>



























                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="widget-foot">

      <div class="clearfix">

    </div>

  </div>

</div>

</div>

</div>

</div>

    <!-- Matter ends -->

    <!-- Mainbar ends -->

<div class="clearfix"></div>



<!-- Content ends -->



<!-- User JavaScript starts -->

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script>

$("#delete").click(function( event ) {

  var submit = confirm("Are you sure you want to delete this customer?");

  if( submit == false){

    event.preventDefault();

  }

});

</script>