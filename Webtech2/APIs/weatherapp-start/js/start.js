/*global  $, Skycons*/
(function () {
    'use strict';
    
    var App = {
        
        APIKEY: "f6c2bdb4792660480aaa87955b0d994c",
        lat: "",
        lng: "",
        geocoder: "",
        
        
        
        init: function () {
            // start de app
            App.getLocation();
        },
        getLocation: function () {
            // get current user position
            navigator.geolocation.getCurrentPosition(App.foundPosition);
        },
        
        foundPosition: function ( pos ) {
            // found current user position
            App.lat = pos.coords.latitude;
            App.lng = pos.coords.longitude;
            //App.lat = 11.036684;
            //App.lng = 28.479060;
            App.getWeather();
            
        },
        initialize: function () {
            geocoder = new google.maps.Geocoder();
        },
        
        getWeather: function () {
            // get weather info
            var url = "https://api.forecast.io/forecast/" + App.APIKEY + "/" + App.lat + "," + App.lng;
            
            //JSONP
            window.jQuery.ajax({
                url: url,
                dataType: "jsonp",
                success: function (data) {
                    console.log(data);
                    $(".weather-summary").text(data.currently.summary);
                    
                    var skycons = new Skycons({"color": "white"});
                    skycons.add("weather-icon", data.currently.icon);
                    
                    skycons.play();
                }
            });
        }
        
    };
    
    App.init();
    
}());