<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

    </style>
            <script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>

  </head>
  <body>
    <div class = "map1" id="map"></div>
  
    <script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 11,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  });
  var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      
      var place1 = new google.maps.LatLng(39.958120, -74.980072);
      var place2 = new google.maps.LatLng(39.971898, -75.000591);
      var place3 = new google.maps.LatLng(39.991694, -75.004106);
      
      var userTrip = [pos, place1, place2, place3];
      var userPath = new google.maps.Polygon({
          path:userTrip,
          strokeColor:"#FF0000 ",
          strokeOpacity:0.5,
          strokeWidth:2,
          fillColor:"#FF0000",
          fillOpacity:0.5
      });

      userPath.setMap(map);
      map.setCenter(pos);

     // infoWindow.setPosition(pos);
     // infoWindow.setContent('Location found.');

    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });

  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASHj_0c7RUS7SYwxTBmKs5MpSF9ZO6MGw&signed_in=true&callback=initMap"
        async defer>
    </script>

  </body>
</html>