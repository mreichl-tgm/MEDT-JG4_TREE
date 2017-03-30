// OpenWeatherMap API Key:  ff0fe6fee6d3ee47461185cce7e15b4c

function initMap() {
    var pos = {
        lat: 48.236666666667,
        lng: 16.369444444444
    };

    var mapDiv = document.getElementById('map');
    var map = new google.maps.Map(mapDiv, {
        center: pos,
        zoom: 10
    });

    // Google Maps Info Window
    var infoWindow = new google.maps.InfoWindow({map: map});

    // HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
        }, function () {
            infoWindow.setPosition(map.getCenter());
            infoWindow.setContent('TGM - Wien');
        });
    }

    map.addListener('click', function(event) {
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();

        getWeather({lat: lat, lng: lng});
    });

    getWeather(pos);
}

function getWeather(pos) {
    $.getJSON("http://api.openweathermap.org/data/2.5/weather?lat="+pos.lat+"&lon="+pos.lng+"&APPID=ff0fe6fee6d3ee47461185cce7e15b4c", function (data) {
        console.log(data);

        $("#wind").find(".card-text").html(
            data.wind.speed + " m/s<br><small>"+data.wind.deg.toFixed(2)+" deg<br>&nbsp</small>");
        $("#temperature").find(".card-text").html(
            (data.main.temp / 10).toFixed(1) + " °C<br><small>min "+(data.main.temp_min / 10).toFixed(1)+"<br>max "+(data.main.temp_max / 10).toFixed(1)+"</small>");
        $("#clouds").find(".card-text").html(
            data.weather[0].main+"<br><small>Wolkenanteil "+data.clouds.all+"%<br>Luftfeuchte "+data.main.humidity+"%</small>");
        $("#position").find(".card-text").html(
            data.name+"<br><small>lat "+pos.lat.toFixed(2)+"<br>lng "+pos.lng.toFixed(2)+"</small>");
    });
}

