function initMap() {
    var mapDiv = document.getElementById('map');
    var map = new google.maps.Map(mapDiv, {
        center: {lat: 48.236666666667, lng: 16.369444444444},    // 48.2365913,16.3676092
        zoom: 18
    });

    // Google Maps Info Window
    var infoWindow = new google.maps.InfoWindow({map: map});

    infoWindow.setPosition(map.getCenter());
    infoWindow.setContent('TGM - Wien');
}