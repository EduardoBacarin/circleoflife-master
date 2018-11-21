<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>
<!-- Footer starts -->
 <span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <!-- Copyright info -->
             <p class="copy">Powered by <a href="webbt-sustemscorp.">Webbt Systems, Corp</a>. &copy; 2018 | All Rights Reserved . <a href="webbt-systemscorp.com/terms">Terms of Use </a> </p>
      </div>
        
    </div>
  </div>
</footer>
<!-- Footer ends -->

<!-- Scroll to top -->

<!-- Content ends -->

</body>
</html>
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

<script>
jQuery(document).ready(function($) {

  $("#ordersTable").tablesorter();
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
