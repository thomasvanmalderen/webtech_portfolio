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
        /*initialize: function () {
            geocoder = new google.maps.Geocoder();
        },
        CodeLatLng: function (lat, lng) {
            var latlng = new google.maps.LatLng(lat, lng);
            geocoder.geocode({'latLng': latlng}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                console.log(results)
                if (results[1]) {
                //formatted address
                alert(results[0].formatted_address)
                //find country name
                   for (var i=0; i<results[0].address_components.length; i++) {
                    for (var b=0;b<results[0].address_components[i].types.length;b++) {
                      if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                          //this is the object you are looking for
                          city= results[0].address_components[i];
                          break;
                      }
                  }
              }
              //city data
              return (city.short_name + " " + city.long_name);
        
        
              } else {
                alert("No results found");
              }
            } else {
              alert("Geocoder failed due to: " + status);
            }
        });
        },*/
        getWeather: function () {
            // get weather info
            var url = "https://api.forecast.io/forecast/" + App.APIKEY + "/" + App.lat + "," + App.lng;
            
            //JSONP
            window.jQuery.ajax({
                url: url,
                dataType: "jsonp",
                success: function (data) {
                    console.log(data);
                    var $celsius = Math.round((data.currently.apparentTemperature - 32) * 5/9);
                    
                    var $windrichting = "N";
                    if(data.currently.windSpeed > 22.5){
                        $windrichting = "N";
                    } else if(data.currently.windSpeed > 67.5){
                        $windrichting = "NO";
                    } else if(data.currently.windSpeed > 112.5){
                        $windrichting = "O";
                    } else if(data.currently.windSpeed > 157.5){
                        $windrichting = "ZO";
                    } else if(data.currently.windSpeed > 202.5){
                        $windrichting = "Z";
                    } else if(data.currently.windSpeed > 247.5){
                        $windrichting = "ZW";
                    } else if(data.currently.windSpeed > 292.5){
                        $windrichting = "W";
                    } else if(data.currently.windSpeed > 90){
                        $windrichting = "NW";
                    } else {
                        $windrichting = "N";
                    }
                    
                    $(".temp").text($celsius + "°");
                    $(".weather-summary").text(data.currently.summary);
                    $(".rain").text(data.currently.precipProbability + "%");
                    $(".wind").text($windrichting + " " + data.currently.windSpeed + " Km/u");
                    $(".humid").text(data.currently.humidity + "%");
                    $(".pascal").text(data.currently.pressure + " pa");
                    
                    $(".smalltemp1").text(Math.round((data.daily.data[1].apparentTemperatureMax - 32) * 5/9) + "°");
                    $("#smallcon1").text(data.daily.data[1].icon);
                    $(".rain1").text(data.daily.data[1].precipProbability + " %");
                    
                    $(".smalltemp2").text(Math.round((data.daily.data[2].apparentTemperatureMax - 32) * 5/9) + "°");
                    $("#smallcon2").text(data.daily.data[2].icon);
                    $(".rain2").text(data.daily.data[2].precipProbability + " %");
                    
                    $(".smalltemp3").text(Math.round((data.daily.data[3].apparentTemperatureMax - 32) * 5/9) + "°");
                    $("#smallcon3").text(data.daily.data[3].icon);
                    $(".rain3").text(data.daily.data[3].precipProbability + " %");
                    
                    $(".smalltemp4").text(Math.round((data.daily.data[4].apparentTemperatureMax - 32) * 5/9) + "°");
                    $("#smallcon4").text(data.daily.data[4].icon);
                    $(".rain4").text(data.daily.data[4].precipProbability + " %");
                    
                    
                    /*$(".weather-summary-1").text(data.daily.data[1].summary);
                    $("#weather-icon-1").text(data.daily.data[1].icon);
                    $(".weather-temp-1").text(Math.floor((((data.daily.data[1].temperatureMax + data.daily.data[1].temperatureMin) / 2) - 32) / 1.8) + " °C");*/
                    
                    var skycons = new Skycons({"color": "White"});
                    skycons.add("weathericon", data.currently.icon);
                    var skycons2 = new Skycons({"color": "Black"});
                    skycons2.add("smallcon1", data.daily.data[1].icon);
                    skycons2.add("smallcon2", data.daily.data[2].icon);
                    skycons2.add("smallcon3", data.daily.data[3].icon);
                    skycons2.add("smallcon4", data.daily.data[4].icon);
                    skycons.play();
                    skycons2.play();
                    
                    
                    
                    
                }
            });
        }
        
    };
    
    App.init();
    
}());