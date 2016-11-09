<!-- Modal -->
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Map</h4>
      </div>
      <div class="modal-body">
            <div class ="row" align="center">
               <div id="map-canvas" class = "col-md-12" style="height:380px;">              
               </div>
            </div>
            <input id = "addid" type = "hidden" />
         
      </div>
      <div class="modal-footer">
     
      </div>
    </div>
  </div>


<script>

$( document ).ready(function() {
 
   var lat = <?php echo $lat ?>;
   var lng = <?php echo $longd ?>;
   var img = '<?php echo $img ?>';
  var myCenter=new google.maps.LatLng(lat,lng);

   var latlng = new google.maps.LatLng(lat, lng);
         
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {

                if (status == google.maps.GeocoderStatus.OK) {
                  
                    if (results[0]) {
                         address = results[0].formatted_address.toString();
                        
                         $('#addid').val(results[0].formatted_address.toString());
                    }
                }
            });



  function initialize() {

    
        var mapProp = {
        center:myCenter,
        zoom:5,
        mapTypeId:google.maps.MapTypeId.ROADMAP
  };
      var map = new google.maps.Map(document.getElementById("map-canvas"),mapProp);

         


  var marker = new google.maps.Marker({
      position:myCenter,
  });

  marker.setMap(map);
  
  var contentstring = '<div class="row">'+
                          '<div class="col-md-3">'+
                            '<a><img width="70px" height="70px" src="'+img+'"></a>'+
                          '</div>'+
                          '<div class="col-md-7" align="left">'+
                          '<label>Address:</label><span style="font-size:10px;">&nbsp;&nbsp;'+$('#addid').val()+'</span>'+
                          '</div>'+
                        '<div>';

  var infowindow = new google.maps.InfoWindow({
      content:contentstring,
       
    });

  google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
  });
  

}

setTimeout(function() {
      initialize();
}, 1000);

//google.maps.event.addDomListener(window, 'load', initialize);


});



</script>