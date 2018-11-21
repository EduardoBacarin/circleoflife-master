<?php 
  $theme_path = THEMEPATH;
?>
  <!-- Stylesheets -->
  <link href="<?php echo $theme_path;?>css/bootstrap.min.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>css/font-awesome.min.css"> 
  <!-- jQuery UI -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>css/jquery-ui.css"> 
  <!-- Calendar -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>css/fullcalendar.css">
  <!-- prettyPhoto -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>css/prettyPhoto.css">  
  <!-- Star rating -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>css/rateit.css">
  <!-- Date picker -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>css/bootstrap-datetimepicker.min.css">
  <!-- CLEditor -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>css/jquery.cleditor.css"> 
  <!-- Data tables -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>css/jquery.dataTables.css"> 
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>css/jquery.onoff.css">
  <!-- Main stylesheet -->
  <link href="<?php echo $theme_path;?>css/style.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="<?php echo $theme_path;?>css/widgets.css" rel="stylesheet">   
  
  <script src="<?php echo $theme_path;?>js/respond.min.js"></script>
  <!--[if lt IE 9]>
  <script src="<?php echo $theme_path;?>js/html5shiv.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo $theme_path;?>img/favicon/favicon.png">
    <style>
       #map {
        height: <?php echo $height; ?>;
        width: <?php echo $width ?>;
       }
    </style>

  <link rel="stylesheet" href="<?php echo $theme_path;?>css/font-awesome.min.css"> 

  <!-- jQuery -->
  <script src="<?php echo $theme_path;?>tablesorter/js/jquery-latest.js"></script>

  <!-- Demo stuff -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>tablesorter/css/jq.css">
  <link rel="stylesheet" href="<?php echo $theme_path;?>tablesorter/css/bootstrap-v3.min.css">
  <link href="<?php echo $theme_path;?>tablesorter/css/prettify.css" rel="stylesheet">
  <script src="<?php echo $theme_path;?>tablesorter/js/prettify.js"></script>
  <script src="<?php echo $theme_path;?>tablesorter/js/docs.js"></script>

  <!-- Tablesorter: required for bootstrap -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>tablesorter/css/theme.bootstrap.css">
  <script src="<?php echo $theme_path;?>tablesorter/js/jquery.tablesorter.js"></script>
  <script src="<?php echo $theme_path;?>tablesorter/js/jquery.tablesorter.widgets.js"></script>

  <!-- Tablesorter: optional -->
  <link rel="stylesheet" href="<?php echo $theme_path;?>tablesorter/addons/pager/jquery.tablesorter.pager.css">
  <script src="<?php echo $theme_path;?>tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>

  <script id="js">$(function() {

  

  // NOTE: $.tablesorter.theme.bootstrap is ALREADY INCLUDED in the jquery.tablesorter.widgets.js
  // file; it is included here to show how you can modify the default classes
  $.tablesorter.themes.bootstrap = {
    // these classes are added to the table. To see other table classes available,
    // look here: http://getbootstrap.com/css/#tables
    table        : 'table table-bordered table-striped',
    caption      : 'caption',
    // header class names
    header       : 'bootstrap-header', // give the header a gradient background (theme.bootstrap_2.css)
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

    headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!

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

</head>