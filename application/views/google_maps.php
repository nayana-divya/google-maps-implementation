<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<head>
<title>Map Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQBfEkIf4DxqWE2WYERFxwJDE9JlMIHdw&libraries=places&callback=initAutocomplete"
async defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
let map;
function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
        //  mapTypeId: 'roadmap',
          disableDefaultUI: true
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('destination-input');
        var inputDiv = document.getElementById('input_place');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputDiv);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m1.png',
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

          //  Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
          GetLatlong(map);
        });
        updateClustor(map)
      }
      function GetLatlong(map)
    {
        var geocoder = new google.maps.Geocoder();
        var address = document.getElementById('destination-input').value;

        geocoder.geocode({ 'address': address }, function (results, status) {
          var latitude="";
          var longitude="";
          var latlng ={}
            if (status == google.maps.GeocoderStatus.OK) {
                 latitude = results[0].geometry.location.lat();
                 longitude = results[0].geometry.location.lng();
            }
            getCityCountry(latitude, longitude, address, map);
        });
    }
   function getCityCountry(latitude, longitude, address, map){
     var latlng = {
              lat: latitude,
              lng: longitude
            }
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'location': latlng}, function(results, status) {
      let addressArr = results[results.length - 2].formatted_address.split(', ');
      putData(address,latitude, longitude,addressArr, map);
    })
   }
   function putData(address, latitude, longitude, addressArr, map){
    $.ajax({
            type: "POST",
            url: "/googlemaps/index.php/Welcome/searched_Data",
            data:{address,latitude,longitude,addressArr},
            success: function(data) {
              var updateStatus=jQuery.parseJSON(data);
              $('#no_of_countries').text(updateStatus[0].country);
              $('#no_of_cities').text(updateStatus[0].city);
              updateClustor(map);
            }
          })
   }
   function updateClustor(map){
    $.ajax({
    type: "GET",
    url: "/googlemaps/index.php/Welcome/cluster_Data",
    success: function(data) {
    var updatecluster=jQuery.parseJSON(data);
var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// Add some markers to the map.
// Note: The code uses the JavaScript Array.prototype.map() method to
// create an array of markers based on a given "locations" array.
// The map() method here has nothing to do with the Google Maps API.
var markers = updatecluster.map(function(location, i) {
  return new google.maps.Marker({
    position: {
      lat:parseFloat(location.lat),
      lng:parseFloat(location.lng)
    },
    label: labels[i % labels.length]
  });
});

// Add a marker clusterer to manage the markers.
var markerCluster = new MarkerClusterer(map, markers,
    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
  }
})
   }

</script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
<style>
    body{
        margin:0;
        padding:0;
    }
    #map-canvas{
        position: absolute;
        height: 100vh;
        width:100vw;
        top:0;
        left:0;
    } 
    .profile_img{
      width:100px;
      height:100px;
      border:1px solid #fff;
      border-radius:50%;
      margin-left:auto;
      margin-right:auto;
      display:block;
    }
    .input_place{
      max-width:800px;
      min-width: 320px;
      margin: 30px;
      width: 800px;
    }
    .capital{
      text-transform: uppercase;
      color:#ccc;
    }
    .card{
      width: 400px;
      padding:30px;
    }
    .cardlink{
      text-align:center;
      color:#000;
      text-decoration: none;
    }
    .map_overlays{
      width:400px;
      position: absolute;
      top:50%;
      transform: translateY(-50%);
      right:30px;
      z-index: 9;
      background: #fff;
    }
    .grey-color{
      color:#ccc;
    }
    .no_of_data{
     color: #337ab7;
     font-size: 27px;
     font-weight: 600;
     margin:0;
    }
</style>
</head>
<body>
<div class="map_overlays">

           <div class="card">
              <img src="./resources/images/profile.jpg" class="img-responsive profile_img"/>
               <h4 class="text-center">Abhi Govula</h4>
               <p class="text-center grey-color">Graduated From</p>
               <p class="text-center">St.Josephs College of Engineering</p>
                <p class="text-center grey-color">Graduated In</p>
                <p class="text-center">+ click to add</p>
                <p class="text-center">After Graduation, You travelled to</p>
                 <div class="row">
                   <div class="col-md-6">
                      <p id="no_of_countries"class="text-center no_of_data"><?php echo $count[0]['country'];?></p>
                      <p class="text-center capital">countries</p>
                   </div>
                   <div class="col-md-6">
                       <p id="no_of_cities" class="text-center no_of_data"><?php echo $count[0]['city'];?></p>
                      <p class="text-center capital">cities</p>
                    </div>
                  </div>
                  <div class="text-center">
                      <label class="radio-inline">
                          <input type="radio" name="optradio" checked>Cities
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="optradio">Countries
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="optradio">Both
                        </label>
                  </div>
                    
                   
            </div>
</div>

<div id="input_place" class="input_place">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">+</span>  
      <input type="text" class="form-control" id="destination-input" placeholder="Search by typing the city name to add to places you travelled" aria-describedby="basic-addon1">
    </div>
    </div>

    <div id="map-canvas"></div>
</body>
</html>