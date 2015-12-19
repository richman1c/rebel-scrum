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
            
    <link rel="stylesheet" href="../css/csselements_mobile.css" />

  </head>
  <body>
    <div id="dvMap" style="width:300px;height:300px;"></div>
  <script type="text/javascript">
    var points = [];
    
    window.onload = function () {
    var mapOptions = {
        center: new google.maps.LatLng(39.958120, -74.980072),
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
 
    //Attach click event handler to the map.
    google.maps.event.addListener(map, 'click', function (e) {
 
        //Determine the location where the user has clicked.
        var location = e.latLng;
 
        //Create a marker and placed it on the map.
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
 
        //Attach click event handler to the marker.
        google.maps.event.addListener(marker, "click", function (e) {
            var infoWindow = new google.maps.InfoWindow({
                content: 'Latitude: ' + location.lat() + '<br />Longitude: ' + location.lng()
            });
            infoWindow.open(map, marker);
            
        });
        //add to point array
        points.push(location.lat());
        console.log("lat: " + location.lat());
        points.push(location.lng());
        console.log("lng: " + location.lng());
    });
};
</script>

    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASHj_0c7RUS7SYwxTBmKs5MpSF9ZO6MGw&signed_in=true&callback=initMap"
        async defer>
    </script>
    <br />
      <form action="../plan.php" method="post" target="_top">
            <button class="submit-button-long" type="submit">Plan Trip</button>
      </form>
  </body>
</html>