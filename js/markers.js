/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var infoGlobal = null;
$(function () {

    //  var cen = {lat: 42.359899, lng: -71.058299};
    var randomLat = (Math.floor(Math.random() * 14) + 1) * (Math.floor(Math.random() * 2) === 1 ? 1 : -1);
    var randomLng = (Math.floor(Math.random() * 14) + 1) * (Math.floor(Math.random() * 2) === 1 ? 1 : -1);

    var lat = 42.359899+randomLat;
    var long = -71.058299+randomLng;
    var link;
    var title;
    var desc = "My name is...";
    addMarker({lat: lat, lng: long}, '', link, title, desc);

});
function addMarker(location, source, link, title, desc) {

    var marker = new google.maps.Marker({
        position: location,
        map: map
                //icon: image
    });
    markers.push(marker);

    var infowindow = new google.maps.InfoWindow({
        content: "<p>" + desc + "</p>"
    });

    marker.addListener('click', function () {
        if (infoGlobal === null) {
            infoGlobal = infowindow;
        }
        else {
            infoGlobal.close();
            infoGlobal = infowindow;
        }

        infowindow.open(map, marker);
    });

};