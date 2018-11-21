<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>
  <div class="mainbar">
      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-o"></i>View Administrators</h2>
        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Get Started</a>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- Page heading ends -->


    <!-- Matter -->
      <div class="matter">
        <div class="container">
          <!-- Table -->
          <div class="row">
            <div class="col-md-12">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Get Started</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="table-responsive">
                    <div id="demo">




aqui

  <section class="team" id="start">
    <div class="container">
      <div class="row">
        <div class="team-heading text-center">
                     <br>
          <h2>Get Started</h2>
        </div>


        <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card">
              <div class="card-header" role="tab" id="headingOne">
                <h5 class="mb-0">
                  <h1 data-toggle="collapse" data-parent="#accordion">
                    Step 1 - Rating
                  </h1>
                </h5>
              </div>

              <div id="collapseOne" class="collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block">
              <h4>Rate your satisfaction in all 12 areas of the circle.</h4>

              <div align="center">

                  <div align="center" class="col-md-12" id="plot">
                    
                  </div>
                <div align="center" id="divScore" style="display:none;">
                  <div align="center" class="form-group row">
                    <h3 for="score" id="labelScore" class="col-sm-2 col-form-label">Exercise</h3>
                    <button id="btnPlus" style="margin-top:16px;" class="col-sm-1">(+)Increase my satisfaction<i class="fa fa-plus"></i></button>
                    <div class=" col-md-2" style="padding-top:14px;">
                      <input class="form-control" type="text" id="score" name="score" value="0"/>
                    </div>
                    <button id="btnMinus" style="margin-top:16px;" class="col-sm-1">(-)Decrease my satisfaction<i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="form-group row">
                  <button class="btn btn-primary" onclick="next(2)">Step 2 <i class="fa fa-chevron-right"></i></button>
                </div>
              </div>
              </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" role="tab" id="headingTwo">
                <h5 class="mb-0">
                  <h1 class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="false" aria-controls="collapseTwo">
                    Step 2 - Acknowledge Your Strengths (highest scores)
                  </h1>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-block">
              <h4>Whatever you focus on expands. Focusing on your strengths supports your remembrance of being capable, victorious and powerful. It is your strengths that will provide the ability and confidence to succeed in creating what you want in your life â€” happiness, financial freedom, radiant health, peace of mind. You will draw upon these strengths and apply them to the areas of your life that need support. </h4>
                  <div align="center" class="col-md-12" id="plotStep2"></div>
                  <div align="center">
                <div class="form-group row">
                  <button class="btn btn-primary" onclick="prev(1)"><i class="fa fa-chevron-left"></i> Step 1</button>
                  <button class="btn btn-primary" onclick="next(3)">Step 3 <i class="fa fa-chevron-right"></i></button>
                </div>
              </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" role="tab" id="headingThree">
                <h5 class="mb-0">
                  <h1 class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Step 3 - Consider The Areas of Your Life that Need Support (lowest scores)
                  </h1>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="card-block">
              <h4>It is important to review the areas of your life, without judgment, that have received lower scores. These areas of life can can drain your emotional or physical energy, having a negative impact on your health and on your life in general. Through this gentle, yet very effective process, you will discover ways to take doable, realistic action steps, that create positive change in the areas of your life that you may want improve.</h4>
                  <div align="center" class="col-md-12" id="plotStep3"></div>
                  <div align="center">
                <div class="form-group row">
                  <button class="btn btn-primary" onclick="prev(2)"><i class="fa fa-chevron-left"></i> Step 2</button>
                  <button class="btn btn-primary" onclick="next(4)">Step 4 <i class="fa fa-chevron-right"></i></button>
                </div>
              </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" role="tab" id="headingFour">
                <h5 class="mb-0">
                  <h1 class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Step 4 - Choose A Life Area To Focus On
                  </h1>
                </h5>
              </div>
              <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="card-block">
              <h4>Now that you've assessed your life, choose the area you want to focus on improving or changing.  It is not especially necessary for you to choose the areas of your lowest scores, but instead choose any area of your life that you feel motivated, willing, and capable of committing to addressing at this time.
                                <br>(Click on Exercice for <b>Setp 5</b>)
                            </h4>
                  <div align="center" class="col-md-12" id="plotStep4"></div>
                  <div align="center">
                <div class="form-group row">
                  <button class="btn btn-primary" onclick="prev(3)"><i class="fa fa-chevron-left"></i> Step 3</button>
                </div>
              </div>

                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" role="tab" id="headingFive">
                <h5 class="mb-0">
                  <h1 class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Step 5 - Assess Your Readiness for Change
                  </h1>
                </h5>
              </div>
              <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="card-block" id="divFormFocus">


                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" role="tab" id="headingFive1">
                <h5 class="mb-0">
                  <h1 class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive1" aria-expanded="false" aria-controls="collapseFive1">
                    Step 5.1 - Readiness For Change Score
                  </h1>
                </h5>
              </div>
              <div id="collapseFiveOne" class="collapse" role="tabpanel" aria-labelledby="headingFive1">
                <div class="card-block" id="">
                  <fieldset>

                    <legend><strong>Score Card</strong></legend>
              <p dir="ltr" style="MARGIN-RIGHT: 0px"><strong>Total Score from the Assessment Form</strong> </p>
                      <blockquote>
                        <p dir="ltr" style="MARGIN-RIGHT: 0px">TOTAL SCORE: <span class="style1" id="totalScore" style="font-size: 25px"></span></p>
                      </blockquote>

                      <p dir="ltr" style="MARGIN-RIGHT: 0px"><strong>If your total Score is: </strong> </p>
                      <ul>
                        <li><font face=Arial><font color=#333333><font size=5><span style="FONT-SIZE: 16px">If you received a </span></font></font><font size=5><span
              style="FONT-SIZE: 16px"><font color=#ff0000><b>RED light</b></font><font
              color=#333333>, STOP and REVIEW the reasons why it may not be a good time to move forward in this area now. You can still go forward with this goal, but you will need to review and address the low scoring questions in the Readiness for Change Assessment first, in order to assure progress on your goal. Or, carefully choose another area of your life which you are more ready to proceed with now, and come back to this goal at another point in time. <br>
              <br>
              If you received a </font><font color=#9a942a>YELLOW light</font><font color=#333333>, then proceed with CAUTION. You will need to review carefully the low scoring questions on the Readiness for Change. &nbsp;These need to be addressed and handled to optimize your readiness --- so that you can be successful in fulfilling your goal. A yellow light may mean that it will take longer to achieve this goal, or that you may need to do something else first before you can successfully accomplish this goal.<br>
              <br>
              If you received a </font><font color=#008000><b>GREEN light</b></font><font color=#333333>, then you are ready to go ahead, and you will benefit by reviewing any part of the Readiness for Change assessment that received a lower score in order to be more successful in fulfilling your goal. A green light means the time is right to &ldquo;go for it&rdquo;.<br>
              <br>
              </font></span></font></font></li>
                        </ul>
                      </fieldset>

                    <div align="center">
                    <div class="form-group row">

                      <button class="btn btn-primary" onclick="prev(5)"><i class="fa fa-chevron-left"></i> Step 5</button>
                      <button class="btn btn-primary" onclick="next(6)">Step 6 <i class="fa fa-chevron-right"></i></button>
                    </div>

                </div>

                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" role="tab" id="headingSix">
                <h5 class="mb-0">
                  <h1 class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Step 6 - Goal and Intention
                  </h1>
                </h5>
              </div>
              <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix">
                <div class="card-block" id="divGoalIntention">
                </div>
              </div>
            </div>


            <div class="card">
              <div class="card-header" role="tab" id="headingSeven">
                <h5 class="mb-0">
                  <h1 class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    Step 7 - Challenges
                  </h1>
                </h5>
              </div>
              <div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingSeven">
                <div class="card-block" id="divChallenges">



                </div>
              </div>
            </div>


            <div class="card">
              <div class="card-header" role="tab" id="headingEight">
                <h5 class="mb-0">
                  <h1 class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                    Step 8 - Affirmations
                  </h1>
                </h5>
              </div>
              <div id="collapseEight" class="collapse" role="tabpanel" aria-labelledby="headingEight">
                <div class="card-block" id="divAffirmations">



                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" role="tab" id="headingNine">
                <h5 class="mb-0">
                  <h1 class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                    Step 9 - Action Steps
                  </h1>
                </h5>
              </div>
              <div id="collapseNine" class="collapse" role="tabpanel" aria-labelledby="headingNine">
                <div class="card-block" id="divActionSteps">
                  


                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" role="tab" id="headingTen">
                <h5 class="mb-0">
                  <h1 class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                    Step 10 - Accountability
                  </h1>
                </h5>
              </div>
              <div id="collapseTen" class="collapse" role="tabpanel" aria-labelledby="headingTen">
                <div class="card-block" id="divAccountability">
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" role="tab" id="headingEleven">
                <h5 class="mb-0">
                  <h1 class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                    Step 11 - Find a Coach
                  </h1>
                </h5>
              </div>
              <div id="collapseEleven" class="collapse" role="tabpanel" aria-labelledby="headingEleven">
                <div class="card-block" id="divFindaCoach">
                </div>
              </div>
            </div>
        </div>

      </div>
    </div>
  </section><!-- end of team section -->


aqui end









                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  

<!-- Footer ends -->


<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>   
 </div>
   <!-- Mainbar ends -->
   <div class="clearfix"></div>
</div>
<!-- Content ends -->
<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 

<!-- JS -->
<script src="<?php echo $theme_path;?>js/jquery.js"></script> <!-- jQuery -->
<script src="<?php echo $theme_path;?>js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="<?php echo $theme_path;?>js/jquery-ui.min.js"></script> <!-- jQuery UI -->
<script src="<?php echo $theme_path;?>js/moment.min.js"></script> <!-- Moment js for full calendar -->
<script src="<?php echo $theme_path;?>js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="<?php echo $theme_path;?>js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="<?php echo $theme_path;?>js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="<?php echo $theme_path;?>js/jquery.slimscroll.min.js"></script> <!-- jQuery Slim Scroll -->
<script src="<?php echo $theme_path;?>js/jquery.dataTables.min.js"></script> <!-- Data tables -->

<!-- jQuery Flot -->
<script src="<?php echo $theme_path;?>js/excanvas.min.js"></script>
<script src="<?php echo $theme_path;?>js/jquery.flot.js"></script>
<script src="<?php echo $theme_path;?>js/jquery.flot.resize.js"></script>
<script src="<?php echo $theme_path;?>js/jquery.flot.pie.js"></script>
<script src="<?php echo $theme_path;?>js/jquery.flot.stack.js"></script>

<!-- jQuery Notification - Noty -->
<!-- <script src="<?php echo $theme_path;?>js/jquery.noty.js"></script> <!-- jQuery Notify -->
<script src="<?php echo $theme_path;?>js/themes/default.js"></script> <!-- jQuery Notify -->
<script src="<?php echo $theme_path;?>js/layouts/bottom.js"></script> <!-- jQuery Notify -->
<script src="<?php echo $theme_path;?>js/layouts/topRight.js"></script> <!-- jQuery Notify -->
<script src="<?php echo $theme_path;?>js/layouts/top.js"></script> <!-- jQuery Notify -->
<!-- jQuery Notification ends -->

<script src="<?php echo $theme_path;?>js/sparklines.js"></script> <!-- Sparklines -->
<script src="<?php echo $theme_path;?>js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="<?php echo $theme_path;?>js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="<?php echo $theme_path;?>js/jquery.onoff.min.js"></script> <!-- Bootstrap Toggle -->
<script src="<?php echo $theme_path;?>js/filter.js"></script> <!-- Filter for support page -->
<script src="<?php echo $theme_path;?>js/custom.js"></script> <!-- Custom codes -->
<script src="<?php echo $theme_path;?>js/charts.js"></script> <!-- Charts & Graphs -->


<!-- jQuery -->
  <!--<script src="<?php echo $theme_path;?>tablesorter/js/jquery-latest.js"></script>-->
  <!--<script src="<?php echo $theme_path;?>js/jquery.js"></script> <!-- jQuery -->

  <!-- Demo stuff -->
  <!--<link rel="stylesheet" href="<?php echo $theme_path;?>tablesorter/css/jq.css">
  <link rel="stylesheet" href="<?php echo $theme_path;?>tablesorter/css/bootstrap-v3.min.css">
  <link href="<?php echo $theme_path;?>tablesorter/css/prettify.css" rel="stylesheet">
  -->
  <script src="<?php echo $theme_path;?>tablesorter/js/prettify.js"></script>
  <script src="<?php echo $theme_path;?>tablesorter/js/docs.js"></script>

  <!-- Tablesorter: required for bootstrap -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>tablesorter/css/theme.bootstrap.css">
  <script src="<?php echo $theme_path;?>tablesorter/js/jquery.tablesorter.js"></script>
  <script src="<?php echo $theme_path;?>tablesorter/js/jquery.tablesorter.widgets.js"></script>

  <!-- Tablesorter: optional -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>tablesorter/addons/pager/jquery.tablesorter.pager.css">
  <script src="<?php echo $theme_path;?>tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGYYE-fKAdzEErv_4Pu5Ic8pGEBsr0UK8&callback=initMap"></script>
<script>
var markers  = [];
var map;
var bounds;

function initMap() {
  //var uluru = {lat: 27.56, lng: -81.453};
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: {lat: 27.56, lng: -81.453},
  });
  bounds = new google.maps.LatLngBounds();
}

jQuery(document).ready(function($) {

  $("#salesRepTable").tablesorter();
  $(".clickable-td").click(function() {
    window.location = $(this).data("href");
  });
});
</script>


  <script id="js">$(function() {
  // NOTE: $.tablesorter.theme.bootstrap is ALREADY INCLUDED in the jquery.tablesorter.widgets.js
  // file; it is included here to show how you can modify the default classes
  $.tablesorter.themes.bootstrap = {
    // these classes are added to the table. To see other table classes available,
    // look here: http://getbootstrap.com/css/#tables
    table        : 'table table-bordered table-striped',
    caption      : 'caption',
    // header class names
    header       : '', // give the header a gradient background (theme.bootstrap_2.css)
    sortNone     : '',
    sortAsc      : '',
    sortDesc     : '',
    active       : '', // applied when column is sorted
    hover        : '', // custom css required - a defined bootstrap style may not override other classes
    // icon class names
    icons        : '', // add "icon-white" to make them white; this icon class is added to the <i> in the header
    iconSortNone : 'bootstrap-icon-unsorted', // class name added to icon when column is not sorted
    iconSortAsc  : 'glyphicon glyphicon-chevron-up', // class name added to icon when column has ascending sort
    iconSortDesc : 'glyphicon glyphicon-chevron-down', // class name added to icon when column has descending sort
    filterRow    : '', // filter row class; use widgetOptions.filter_cssFilter for the input/select element
    footerRow    : '',
    footerCells  : '',
    even         : '', // even row zebra striping
    odd          : ''  // odd row zebra striping
  };

  // call the tablesorter plugin and apply the uitheme widget
  $("table").tablesorter({
    // this will apply the bootstrap theme if "uitheme" widget is included
    // the widgetOptions.uitheme is no longer required to be set
    theme : "bootstrap",

    widthFixed: true,

    headerTemplate : '', // new in v2.7. Needed to add the bootstrap icon!

    // widget code contained in the jquery.tablesorter.widgets.js file
    // use the zebra stripe widget if you plan on hiding any rows (filter widget)
    widgets : [ "uitheme", "filter", "columns", "zebra" ],

    widgetOptions : {
      // using the default zebra striping class name, so it actually isn't included in the theme variable above
      // this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
      zebra : ["even", "odd"],

      // class names added to columns when sorted
      columns: [ "primary", "secondary", "tertiary" ],

      // reset filters button
      filter_reset : ".reset",

      // extra css class name (string or array) added to the filter element (input or select)
      filter_cssFilter: "form-control",

      // set the uitheme widget to use the bootstrap theme class names
      // this is no longer required, if theme is set
      // ,uitheme : "bootstrap"

    }
  })
  .tablesorterPager({

    // target the pager markup - see the HTML block below
    container: $(".ts-pager"),

    // target the pager page select dropdown - choose a page
    cssGoto  : ".pagenum",

    // remove rows from the table to speed up the sort of large tables.
    // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
    removeRows: false,

    // output string - default is '{page}/{totalPages}';
    // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
    output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'

  });

});</script>

  <script>
  $(function(){

    // filter button demo code
    $('button.filter').click(function(){
      var col = $(this).data('column'),
        txt = $(this).data('filter');
      $('table').find('.tablesorter-filter').val('').eq(col).val(txt);
      $('table').trigger('search', false);
      return false;
    });

    // toggle zebra widget
    $('button.zebra').click(function(){
      var t = $(this).hasClass('btn-success');
//      if (t) {
        // removing classes applied by the zebra widget
        // you shouldn't ever need to use this code, it is only for this demo
//        $('table').find('tr').removeClass('odd even');
//      }
      $('table')
        .toggleClass('table-striped')[0]
        .config.widgets = (t) ? ["uitheme", "filter"] : ["uitheme", "filter", "zebra"];
      $(this)
        .toggleClass('btn-danger btn-success')
        .find('i')
        .toggleClass('icon-ok icon-remove glyphicon-ok glyphicon-remove').end()
        .find('span')
        .text(t ? 'disabled' : 'enabled');
      $('table').trigger('refreshWidgets', [false]);
      return false;
    });
  });
  </script>

</body>
</html>
