<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Map Page</title>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB64AmAkv_Ua9qJyYmLsapmfyolVSilEOo&callback=initMap"
async defer></script>
<script type="text/javascript">
let map;
function initMap() {
        map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8
    });
}
</script>
<style>
    #map-canvas{
        height: 100vh
    } 
</style>
</head>
<body>
    <div id="map-canvas"></div>
</body>
</html>