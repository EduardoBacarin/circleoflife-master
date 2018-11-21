<?php 
  $theme_path = THEMEPATH;
  $portal_path = PORTALPATH;
?>


<!-- Main bar -->
<div class="mainbar">
      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-file-o"></i>View Leads</h2>
        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?php echo $portal_path; ?>main/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">View Leads</a>
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
                  <div class="pull-left">Leads</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
          <div class="table-responsive">
            <table class="tablesorter table table-bordered table-hover" id="leadsTable" name="leadsTable">
              <thead>
              <tr>
                <th>#</th>
                <th><i class="fa fa-eye" aria-hidden="true"></th>
                <th>Status</th>
                <th>Dealership</th>
                <th>Zip Code</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Results</th>
                <th>Sales Rep</th>
              </tr>
              </thead>
              <tbody>

                <?php
                  if($page == 1 ){
                    $i = $page;  
                  }else if ($page > 1){
                    $i = $rows * ($page-1) + 1;
                  }
                  $mapIndex = 0;
                  foreach($leads['leads'] as $lead){
                    echo "<tr>";
                    echo "<td class='clickable-td' data-href='".$portal_path."main/viewlead/".$lead['id']."'>".($i++)."</td>";
                    echo "<td><input type='checkbox' name='view' id='view' value='".($mapIndex++).",".preg_replace('/[^A-Za-z0-9\- ]/', '', $lead['name']).",".$lead['point']."'></td>";
                    echo "<td class='clickable-td' data-href='".$portal_path."main/viewlead/".$lead['id']."'><h4>";
                    
                    if ($lead['status'] == "New"){
                      echo "<span class='label label-success'>";
                    }else if ($lead['status'] == "Visited"){
                      echo "<span class='label label-primary'>";
                    }else if ($lead['status'] == "Pending"){
                      echo "<span class='label label-warning'>";
                    }else if ($lead['status'] == "Other"){
                      echo "<span class='label label-info'>";
                    }
                    
                    echo $lead['status']."</span></h3></td>";
                    
                    echo "<td class='clickable-td' data-href='".$portal_path."main/viewlead/".$lead['id']."'>".$lead['name']."</td>";
                    echo "<td class='clickable-td' data-href='".$portal_path."main/viewlead/".$lead['id']."'>".$lead['zip']."</td>";
                    echo "<td class='clickable-td' data-href='".$portal_path."main/viewlead/".$lead['id']."'>".$lead['address'].", ".$lead['city'].", ".$lead['state']." ".$lead['zip']."</td>";
                    echo "<td class='clickable-td' data-href='".$portal_path."main/viewlead/".$lead['id']."'>".$lead['phone']."</td>";
                    echo "<td class='clickable-td' data-href='".$portal_path."main/viewlead/".$lead['id']."'>".$lead['search']."</td>";
                    echo "<td class='clickable-td' data-href='".$portal_path."main/viewlead/".$lead['id']."'>".$lead['salesRepName']."</td></tr>";
                    
                  }
                ?>
                </tbody>
            </table>
          </div>
          <div class="widget-foot">
            <ul class="pagination pagination-sm pull-right">
            <?php
              $numberOfPages = ceil($leads["NumberOfLeads"] / $rows);
              if ($page > 1){
                echo '<li><a href="'.$portal_path."main/viewleads/".$type."/"."1"."/".$rows.'">First</a></li>';
                echo '<li><a href="'.$portal_path."main/viewleads/".$type."/".($page-1)."/".$rows.'"><-</a></li>';
              }
              $aux = 2;
              $first = $page - $aux;
              $last = $page + $aux;
              $limit = $aux*2+1;
              $count = 0;
              if(($page - $aux) > 0 && ($page + $aux) <= $numberOfPages){
                for($i = $first; $i <= $last; $i++){
                  if($i == $page){
                    echo '<li><a href="'.$portal_path."main/viewleads/".$type."/".($i)."/".$rows.'"><b>'.($i).'</b></a></li>';
                  }else{
                    echo '<li><a href="'.$portal_path."main/viewleads/".$type."/".($i)."/".$rows.'">'.($i).'</a></li>';
                  }
                }
              }else{
                $excess=0;
                for($a=$page; $a<$numberOfPages; $a++){
                  $excess++;
                }
                if($page == $numberOfPages){
                  $excess = 2;
                }
                for($i = $first-$excess; $i <= $numberOfPages; $i++){
                  if($i > 0 && $count < $limit){
                    $count++;
                    if($i == $page){
                      echo '<li><a href="'.$portal_path."main/viewleads/".$type."/".($i)."/".$rows.'"><b>'.($i).'</b></a></li>';
                    }else{
                      echo '<li><a href="'.$portal_path."main/viewleads/".$type."/".($i)."/".$rows.'">'.($i).'</a></li>';
                    }
                  } 
                }
              }
              if ($page < $numberOfPages){
                echo '<li><a href="'.$portal_path."main/viewleads/".$type."/".($page+1)."/".$rows.'">-></a></li>';
                echo '<li><a href="'.$portal_path."main/viewleads/".$type."/".($numberOfPages)."/".$rows.'">Last</a></li>';
              }
            ?>
            </ul>
            <div class="clearfix"></div> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
   <div class="col-md-12">
      <div class="widget">
        <div class="widget-head">
          <div class="pull-left">Map</div>
          <div class="widget-icons pull-right">
            <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
          </div>  
          <div class="clearfix"></div>
        </div>
        <div class="widget-content">
        <div id="map"></div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGYYE-fKAdzEErv_4Pu5Ic8pGEBsr0UK8&callback=initMap"></script>
  
  </div>

    <!-- Matter ends -->
</div>
   <!-- Mainbar ends -->
   <div class="clearfix"></div>
</div>
<!-- Content ends -->

<!-- User JavaScript starts -->

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

  $("#leadsTable").tablesorter();
  $(".clickable-td").click(function() {
    window.location = $(this).data("href");
  });

  $("input[name=view]").click(function( event ) {
    var value = $( this ).val();
    value = value.replace(/[`~!@#$%^&*()_|+\=?;:'"<>\{\}\[\]\\\/]/gi, '');
    var values = value.split(",");
    var index = values[0];
    var info = values[1];
    var lng = values[2];
    var lat = values[3];

    if($(this). prop("checked") == true){
      markers[index] = new google.maps.Marker({
        position: {lat: parseFloat(lat) , lng: parseFloat(lng) },
        map: map
      });

      google.maps.event.addListener(markers[index], "click", function (e) {
        var content = values[1];
        var infoWindow = new google.maps.InfoWindow({
          content: content
        });
        infoWindow.open(map, markers[index]);
      });

      for (var i = 0; i < markers.length; i++) {
        if(typeof markers[i] !== 'undefined'){
          bounds.extend(markers[i].getPosition());
        }
      }
      map.fitBounds(bounds);
    
    }else if($(this). prop("checked") == false){
      markers[index].setMap(null)
    }
  });
});
</script>