<?php
	$theme_path = THEMEPATH;
?>

<!-- Footer starts -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <!-- Copyright info -->
          <!-- Lumar Motta - Change copyright - 05/19/2018 -->
            <p class="copy">Powered by <a href="webbt-sustemscorp.">Webbt Systems, Corp</a>. &copy; 2018 | All Rights Reserved . <a href="webbt-systemscorp.com/terms">Terms of Use </a> </p>
            <!-- <p class="copy">Copyright &copy; 2018 | <a href="#">Webbt-Systems</a> </p> -->
          <!-- End Lumar -->
      </div>
    </div>
  </div>
</footer> 	

<!-- Footer ends -->

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
<!--<script src="<?php echo $theme_path;?>js/jquery.noty.js"></script> <!-- jQuery Notify -->
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

    <!-- script tags
    ============================================================= -->
    <script src="<?php echo $theme_path;?>assets/js/jquery-2.1.1.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="<?php echo $theme_path;?>assets/js/gmaps.js"></script>
    <script src="<?php echo $theme_path;?>assets/js/smoothscroll.js"></script>
    <script src="<?php echo $theme_path;?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $theme_path;?>assets/js/custom.js"></script>
    <script src="<?php echo $theme_path;?>assets/asterplot/d3.v3.min.js"></script>
    <script src="<?php echo $theme_path;?>assets/asterplot/d3.tip.js"></script>
    <script src="<?php echo $theme_path;?>assets/js/site/plot.js"></script>
    <script src="<?php echo $theme_path;?>assets/js/site/home.js"></script>

<!-- Script for this page -->
<script type="text/javascript">
$(function () {

    /* Bar Chart starts */

    var d1 = [];
    for (var i = 0; i <= 20; i += 1)
        d1.push([i, parseInt(Math.random() * 30)]);

    var d2 = [];
    for (var i = 0; i <= 20; i += 1)
        d2.push([i, parseInt(Math.random() * 30)]);


    var stack = 0, bars = true, lines = false, steps = false;
    
    function plotWithOptions() {
        $.plot($("#bar-chart"), [ d1, d2 ], {
            series: {
                stack: stack,
                lines: { show: lines, fill: true, steps: steps },
                bars: { show: bars, barWidth: 0.8 }
            },
            grid: {
                borderWidth: 0, hoverable: true, color: "#777"
            },
            colors: ["#ff6c24", "#ff2424"],
            bars: {
                  show: true,
                  lineWidth: 0,
                  fill: true,
                  fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.8 } ] }
            }
        });
    }

    plotWithOptions();
    
    $(".stackControls input").click(function (e) {
        e.preventDefault();
        stack = $(this).val() == "With stacking" ? true : null;
        plotWithOptions();
    });
    $(".graphControls input").click(function (e) {
        e.preventDefault();
        bars = $(this).val().indexOf("Bars") != -1;
        lines = $(this).val().indexOf("Lines") != -1;
        steps = $(this).val().indexOf("steps") != -1;
        plotWithOptions();
    });

    /* Bar chart ends */

});


/* Curve chart starts */

$(function () {
    var sin = [], cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }

    var plot = $.plot($("#curve-chart"),
           [ { data: sin, label: "sin(x)"}, { data: cos, label: "cos(x)" } ], {
               series: {
                   lines: { show: true, fill: true},
                   points: { show: true }
               },
               grid: { hoverable: true, clickable: true, borderWidth:0 },
               yaxis: { min: -1.2, max: 1.2 },
               colors: ["#1eafed", "#1eafed"]
             });

    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 5,
            border: '1px solid #000',
            padding: '2px 8px',
            color: '#ccc',
            'background-color': '#000',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#curve-chart").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));

        if ($("#enableTooltip:checked").length > 0) {
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    
                    showTooltip(item.pageX, item.pageY, 
                                item.series.label + " of " + x + " = " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
        }
    }); 

    $("#curve-chart").bind("plotclick", function (event, pos, item) {
        if (item) {
            $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });

});

/* Curve chart ends */
</script>

</body>
</html>